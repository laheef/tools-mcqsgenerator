<?php

declare(strict_types=1);

/**
 * Export harvested calculators to their own files.
 *
 *   php tools/export_calc_files.php --cat=biology [--only=slug] [--force] [--raw] [--rewrite]
 *
 * For every published calculator in the category this writes
 *
 *   plugins/calc/<cat>/qm-calc-<slug>.php
 *
 * holding the name, the SEO metadata, the form, the formulas and the article.
 * The form and formulas are written in the readable shorthand when the page
 * survives the round trip unchanged — same fields, same order, same widths,
 * same options, same equations, and the same answers for a set of sample
 * inputs. Anything the shorthand cannot express exactly is written as the
 * engine's own arrays in a `raw` block instead, so a converted page is never a
 * worse calculator than the page it replaced.
 *
 * --force    overwrite files that exist (an edited file is left alone otherwise)
 * --raw      skip the shorthand entirely and write every page as `raw`
 * --rewrite  replace the article with one written from the page's own record
 */

require_once __DIR__ . '/../config.php';

use Onim\CalcFile;
use Onim\CalcSeo;
use Onim\CalcExample;
use Onim\ContentClean;
use Onim\Data;
use Onim\Expr;
use Onim\Solver;
use Onim\Supplement;
use Onim\Units;

$opts = [];
foreach (array_slice($argv, 1) as $arg) {
    if (preg_match('~^--([a-z-]+)(?:=(.*))?$~', $arg, $m)) {
        $opts[$m[1]] = $m[2] ?? true;
    }
}
$cat   = (string) ($opts['cat'] ?? 'biology');
$only  = isset($opts['only']) ? (string) $opts['only'] : '';
$force = isset($opts['force']);
$rawOnly = isset($opts['raw']);
$rewrite = isset($opts['rewrite']);
$fromShard = isset($opts['from-shard']);

$units = Data::units();
$rows  = array_values(array_filter(
    Data::allRows(),
    static fn (array $r): bool => ($r['cat'] ?? '') === $cat
        && ($r['status'] ?? 'published') === 'published'
        && !isset($r['customId'])
        && ($only === '' || ($r['slug'] ?? '') === $only)
));

echo 'exporting ' . count($rows) . ' calculators from ' . $cat . "\n";

/*
 * Internal links, decided once per category: three neighbours for every page,
 * taken from the same category and chosen by the page's own slug so the choice
 * is stable across runs (a link that moves every rebuild is a link that means
 * nothing). The page's existing `related` rows are kept as the first choice.
 */
$peerPool = [];
foreach ($rows as $r) {
    $peerPool[] = ['path' => (string) ($r['path'] ?? ''), 'name' => (string) ($r['name'] ?? '')];
}
$peersFor = static function (string $slug, int $want = 3) use ($peerPool): array {
    $count = count($peerPool);
    if ($count < 2) {
        return [];
    }
    $start = abs((int) crc32($slug)) % $count;
    $out = [];
    for ($i = 0; $i < $count && count($out) < $want; $i++) {
        $peer = $peerPool[($start + $i) % $count];
        if (str_ends_with($peer['path'], '/' . $slug) || $peer['path'] === '') {
            continue;
        }
        $out[] = $peer;
    }
    return $out;
};

/* --------------------------------------------------------------- the shard */

/** The raw record for a catalogue row, with any supplement merged in. */
function raw_record(array $row): ?array
{
    $m    = Data::allRows();             // warms the manifest
    $file = __DIR__ . '/../data/calc/manifest.json';
    $manifest = json_decode((string) file_get_contents($file), true);
    $shard = $manifest['shards'][(int) $row['shard']] ?? null;
    if ($shard === null) {
        return null;
    }
    $fh = @fopen(__DIR__ . '/../data/calc/' . $shard, 'rb');
    if ($fh === false) {
        return null;
    }
    fseek($fh, (int) $row['offset']);
    $line = fread($fh, max(1, (int) $row['length']));
    fclose($fh);
    $rec = is_string($line) ? json_decode($line, true) : null;
    if (!is_array($rec)) {
        return null;
    }
    return Supplement::apply((string) ($rec['path'] ?? ''), $rec);
}

/* ------------------------------------------------------- raw -> shorthand */

/**
 * A record as shorthand, or null when the shorthand would lose something.
 *
 * @return array{0:array|null,1:string} [definition, reason]
 */
function to_shorthand(array $rec): array
{
    /**
     * The var record for a field: rounding and the value it opens with.
     */
    $varOf = static function (string $name) use ($rec): array {
        return is_array($rec['vars'][$name] ?? null) ? $rec['vars'][$name] : [];
    };

    /** An option's label for its uid, so a default is written as words. */
    $labelOf = static function (string $dsUid, string $uid) use ($rec): ?string {
        foreach ($rec['datasets'][$dsUid]['options'] ?? [] as $o) {
            if ((string) ($o['uid'] ?? '') === $uid) {
                return (string) ($o['label'] ?? '');
            }
        }
        return null;
    };

    $sections = [];
    foreach ($rec['groups'] ?? [] as $g) {
        $blocks = [];
        foreach ($g['m'] ?? [] as $matrix) {
            $columns = $matrix[1] ?? [];
            $count   = count($columns);
            if ($count < 1) {
                continue;
            }
            /* The matrix's own name for its layout, carried through as it is:
               the page shows the columns, and this string is how the record
               remembers them. */
            $grid = (string) ($matrix[0] ?? '');
            $fields = [];
            $places = [];                       // which column each field sits in
            foreach ($columns as $ci => $column) {
                foreach ((is_array($column) ? $column : []) as $f) {
                    $places[] = (int) $ci;
                    if (!is_array($f)) {
                        return [null, 'odd field'];
                    }
                    $type = (string) ($f['t'] ?? '');
                    if ($type === 'x') {
                        /* A note is either one unconditional line or several
                           that take turns behind conditions. */
                        $chunks = $f['c'] ?? [];
                        $cases  = [];
                        $plain  = true;
                        foreach ($chunks as $chunk) {
                            if (!is_array($chunk)) {
                                continue;
                            }
                            $when = $chunk[0] ?? null;
                            $text = (string) ($chunk[1] ?? '');
                            if ($when !== null) {
                                $plain = false;
                            }
                            $cases[] = ['when' => $when === null ? null : (string) $when, 'text' => $text];
                        }
                        if ($cases === []) {
                            continue;
                        }
                        if ($plain && count($cases) === 1) {
                            $fields[] = ['type' => 'note', 'text' => $cases[0]['text']];
                        } else {
                            $fields[] = ['type' => 'note', 'cases' => $cases];
                        }
                        continue;
                    }
                    if ($type === 'i') {
                        $urls = array_values(array_filter(array_map('strval', (array) ($f['u'] ?? []))));
                        if ($urls === []) {
                            continue;
                        }
                        $fields[] = ['type' => 'image', 'url' => count($urls) === 1 ? $urls[0] : $urls];
                        continue;
                    }
                    if ($type !== 'v') {
                        return [null, 'field type ' . $type];
                    }
                    $vt   = (string) ($f['vt'] ?? 'numerical');
                    $name = (string) ($f['n'] ?? '');
                    $out  = ['name' => $name, 'label' => (string) ($f['l'] ?? '')];
                    $dsUid = (string) ($f['ds'] ?? '');
                    if ($vt === 'valueSelect') {
                        $out['type']    = 'select';
                        $out['options'] = [];
                        foreach ($f['opts'] ?? [] as $o) {
                            $out['options'][(string) $o[1]] = $o[2];
                        }
                        $ds = $rec['datasets'][$dsUid] ?? [];
                        if (isset($ds['name']) && (string) $ds['name'] !== (string) ($f['l'] ?? '')) {
                            $out['dataset'] = (string) $ds['name'];
                        }
                        if (isset($ds['uiType']) && (string) $ds['uiType'] !== 'RADIO') {
                            $out['control'] = (string) $ds['uiType'];
                        }
                    } elseif ($vt === 'dependent') {
                        $out['type'] = 'result';
                    } elseif ($vt === 'numerical') {
                        $out['type'] = 'number';
                    } elseif ($vt === 'text') {
                        $out['type'] = 'text';
                    } elseif ($vt === 'date') {
                        $out['type'] = 'date';
                    } elseif ($vt === 'presentation') {
                        $out['type'] = 'presentation';
                    } else {
                        return [null, 'control ' . $vt];
                    }
                    foreach (['pre' => 'prefix', 'suf' => 'suffix', 'h' => 'help', 'us' => 'unit', 'du' => 'unit_default'] as $from => $to) {
                        if (isset($f[$from]) && (string) $f[$from] !== '') {
                            $out[$to] = $f[$from];
                        }
                    }
                    if (!empty($f['oo'])) {
                        $out['readonly'] = true;
                    }
                    $var = $varOf($name);
                    if (is_array($var['rnd'] ?? null)) {
                        $out['rounding'] = array_values($var['rnd']);
                    }
                    if (isset($var['min']) && is_numeric($var['min'])) {
                        $out['min'] = 0 + $var['min'];
                    }
                    /*
                     * The value the box opens with. One default is `default`;
                     * several are `defaults`, each with the condition that makes
                     * it the right one — the harvested refill rules.
                     */
                    $dfl = $var['dfl'] ?? [];
                    if (count($dfl) === 1 && ($dfl[0]['c'] ?? null) === null) {
                        $value = $dfl[0]['v'] ?? null;
                        if ($value !== null) {
                            if ($vt === 'valueSelect') {
                                $label = $labelOf($dsUid, (string) $value);
                                if ($label === null) {
                                    return [null, 'default outside its options'];
                                }
                                $out['default'] = $label;
                            } else {
                                $out['default'] = $value;
                            }
                        }
                    } elseif (count($dfl) > 0) {
                        $list = [];
                        foreach ($dfl as $d) {
                            $value = $d['v'] ?? null;
                            if ($value === null) {
                                continue;
                            }
                            if ($vt === 'valueSelect') {
                                $label = $labelOf($dsUid, (string) $value);
                                if ($label === null) {
                                    return [null, 'default outside its options'];
                                }
                                $value = $label;
                            }
                            $when = $d['c'] ?? null;
                            $list[] = ['value' => $value, 'when' => $when === null ? null : (string) $when];
                        }
                        if ($list !== []) {
                            $out['defaults'] = $list;
                        }
                    }
                    $fields[] = $out;
                }
            }
            if ($fields !== []) {
                /*
                 * `place` is written whenever the layout is not the plain one
                 * (several columns, or a column holding more than one box), so
                 * the page keeps the matrix it was harvested with. A form
                 * written by hand does not need it: the columns are dealt out.
                 */
                $block = ['columns' => $count];
                /* Only when it says something the default cannot. */
                if ($grid !== '' && $grid !== implode('_', array_fill(0, $count, 'FR1'))) {
                    $block['grid'] = $grid;
                }
                $plain = $count === 1
                    && count(array_filter($places, static fn (int $p): bool => $p !== 0)) === 0
                    && count($columns[0] ?? []) <= 1;
                if (!$plain) {
                    $block['place'] = $places;
                }
                $block['fields'] = $fields;
                $blocks[] = $block;
            }
        }
        $sections[] = [
            'title'  => (string) ($g['title'] ?? ''),
            'note'   => (string) ($g['desc'] ?? ''),
            'blocks' => $blocks,
        ];
    }

    $passes = [];
    foreach ($rec['eq'] ?? [] as $entry) {
        $results = [];
        foreach ($entry['var'] ?? [] as $v) {
            $results[(string) ($v['l'] ?? '')] = (string) ($v['f'] ?? '');
        }
        $passes[] = ['title' => (string) ($entry['formula'] ?? ''), 'results' => $results];
    }

    $def = [
        'name'     => (string) ($rec['name'] ?? ''),
        'sections' => $sections,
        'formula'  => count($passes) === 1 && $passes[0]['title'] === ''
            ? $passes[0]['results']
            : $passes,
    ];
    if (trim((string) ($rec['js'] ?? '')) !== '') {
        $def['js'] = (string) $rec['js'];
    }
    if (!empty($rec['showIf'])) {
        $def['showIf'] = $rec['showIf'];
    }
    if (!empty($rec['checks'])) {
        $def['checks'] = $rec['checks'];
    }
    return [$def, ''];
}

/** Compare two records on everything that decides behaviour, ignoring uids. */
function same_record(array $a, array $b): array
{
    $norm = static function (array $rec): array {
        $dsName = static function (array $rec, string $uid): string {
            $ds = $rec['datasets'][$uid] ?? null;
            if (!is_array($ds)) {
                return '?' . $uid;
            }
            $labels = [];
            foreach ($ds['options'] ?? [] as $o) {
                $labels[] = (string) ($o['label'] ?? '') . '=' . (string) ($o['value'] ?? '');
            }
            return (string) ($ds['name'] ?? '') . '|' . (string) ($ds['uiType'] ?? '') . '|' . implode(',', $labels);
        };

        /* A default is stored as the option's uid, which the shorthand
           regenerates: compare what the option *says*, not its address. */
        $defaultText = static function (array $rec, string $name) use ($dsName): string {
            $var = $rec['vars'][$name] ?? [];
            $dsUid = (string) ($var['ds'] ?? '');
            $out = [];
            foreach ($var['dfl'] ?? [] as $d) {
                $label = '';
                foreach ($rec['datasets'][$dsUid]['options'] ?? [] as $o) {
                    if ((string) ($o['uid'] ?? '') === (string) ($d['v'] ?? '')) {
                        $label = (string) ($o['label'] ?? '') . '=' . (string) ($o['value'] ?? '');
                        break;
                    }
                }
                $out[] = $label !== '' ? $label : (string) ($d['v'] ?? '');
            }
            return implode(',', $out);
        };

        /* Where a var names no dataset, the field's own list is what the record
           means: the control renders from it either way. */
        $fieldOpts = [];
        $fieldDs   = [];
        foreach ($rec['groups'] ?? [] as $g) {
            foreach ($g['m'] ?? [] as $matrix) {
                foreach ($matrix[1] ?? [] as $column) {
                    foreach ($column ?? [] as $f) {
                        if (($f['t'] ?? '') === 'v' && isset($f['ds'])) {
                            $fieldDs[(string) ($f['n'] ?? '')] = (string) $f['ds'];
                        }
                        if (($f['t'] ?? '') === 'v' && isset($f['opts']) && is_array($f['opts'])) {
                            $labels = [];
                            foreach ($f['opts'] as $o) {
                                $labels[] = (string) $o[1] . '=' . (string) $o[2];
                            }
                            $fieldOpts[(string) ($f['n'] ?? '')] = implode(',', $labels);
                        }
                    }
                }
            }
        }

        $vars = [];
        foreach ($rec['vars'] ?? [] as $name => $v) {
            $vars[(string) $name] = [
                'type' => (string) ($v['type'] ?? ''),
                'rnd'  => json_encode($v['rnd'] ?? null),
                'dfl'  => $defaultText($rec, (string) $name),
                'ds'   => isset($v['ds'])
                    ? $dsName($rec, (string) $v['ds'])
                    : (isset($fieldDs[(string) $name])
                        ? $dsName($rec, $fieldDs[(string) $name])
                        : ($fieldOpts[(string) $name] ?? '')),
            ];
        }
        ksort($vars);          // the order of `vars` decides nothing
        $groups = [];
        foreach ($rec['groups'] ?? [] as $g) {
            $fields = [];
            foreach ($g['m'] ?? [] as $matrix) {
                $row = [];
                foreach ($matrix[1] ?? [] as $column) {
                    foreach ($column ?? [] as $f) {
                        $t = (string) ($f['t'] ?? '');
                        if ($t === 'x') {
                            $row[] = 'x|' . json_encode($f['c'] ?? null);
                            continue;
                        }
                        if ($t === 'i') {
                            $row[] = 'i|' . json_encode($f['u'] ?? null);
                            continue;
                        }
                        $opts = [];
                        foreach ($f['opts'] ?? [] as $o) {
                            $opts[] = (string) $o[1] . '=' . (string) $o[2];
                        }
                        $row[] = implode('|', [
                            'v',
                            (string) ($f['n'] ?? ''),
                            (string) ($f['l'] ?? ''),
                            (string) ($f['vt'] ?? ''),
                            (string) ($f['pre'] ?? ''),
                            (string) ($f['suf'] ?? ''),
                            (string) ($f['h'] ?? ''),
                            (string) ($f['us'] ?? ''),
                            (string) ($f['du'] ?? ''),
                            (string) ($f['oo'] ?? ''),
                            implode(',', $opts),
                        ]);
                    }
                }
                $fields[] = count($matrix[1] ?? []) . 'col[' . implode(' / ', $row) . ']';
            }
            if ($fields === [] && trim((string) ($g['title'] ?? '')) === '' && trim((string) ($g['desc'] ?? '')) === '') {
                continue;      // an empty group renders nothing
            }
            $groups[] = (string) ($g['title'] ?? '') . '|' . (string) ($g['desc'] ?? '') . '|' . implode(' + ', $fields);
        }
        $eq = [];
        foreach ($rec['eq'] ?? [] as $entry) {
            $variants = [];
            foreach ($entry['var'] ?? [] as $v) {
                /* `r` names the values an equation reads, and the solver only
                   asks whether each is known: the list is a set, and a record
                   that names one twice reads the same. */
                $rhs = array_values(array_unique(array_map('strval', $v['r'] ?? [])));
                sort($rhs);
                $variants[] = (string) ($v['l'] ?? '') . '=' . (string) ($v['f'] ?? '') . ':' . implode('+', $rhs);
            }
            $eq[] = (string) ($entry['formula'] ?? '') . '[' . implode(' ; ', $variants) . ']';
        }
        /* The script, the conditional notes and the cross-field rules are part
           of the page's behaviour: a conversion that drops one has changed the
           calculator, whatever the form looks like. */
        return [
            'vars'   => $vars,
            'groups' => $groups,
            'eq'     => $eq,
            'js'     => (string) ($rec['js'] ?? ''),
            'showIf' => json_encode($rec['showIf'] ?? null),
            'checks' => json_encode($rec['checks'] ?? null),
        ];
    };

    $A = $norm($a);
    $B = $norm($b);
    $diff = [];
    foreach ($A as $key => $value) {
        if ($value !== $B[$key]) {
            $diff[] = $key;
            if (getenv('CALC_DEBUG')) {
                if ($key === 'vars') {
                    foreach ($value as $name => $v) {
                        $other = $B['vars'][$name] ?? null;
                        if ($other !== $v) {
                            echo "    var $name: ", json_encode($v), ' != ', json_encode($other), "\n";
                        }
                    }
                    foreach (array_diff_key($B['vars'], $value) as $name => $_) {
                        echo "    extra var $name\n";
                    }
                } elseif ($key === 'groups') {
                    foreach ($value as $i => $g) {
                        $other = $B['groups'][$i] ?? null;
                        if ($other !== $g) {
                            echo "    group $i:\n      A ", substr($g, 0, 400), "\n      B ", substr((string) $other, 0, 400), "\n";
                        }
                    }
                } else {
                    foreach ($value as $i => $e) {
                        $other = $B['eq'][$i] ?? null;
                        if ($other !== $e) {
                            echo "    eq $i: ", substr($e, 0, 300), ' != ', substr((string) $other, 0, 300), "\n";
                        }
                    }
                }
            }
        }
    }
    return $diff;
}

/**
 * The same answers for the same inputs.
 *
 * A record can survive the structural comparison and still solve differently —
 * variant order matters to the solver. Every result that the page shows is
 * computed once from each record with sample inputs and the numbers compared.
 *
 * @return array<int,string> differences, empty when they agree
 */
function same_answers(array $a, array $b, Units $units): array
{
    $visible = Solver::visibleInputs($a);
    $inputs  = [];
    $n = 0;
    foreach ($visible as $name => $_) {
        $n++;
        $inputs[$name] = (float) (1 + ($n % 7));
    }
    if ($inputs === []) {
        return [];
    }
    $sa = Solver::solve($a, $inputs, $units);
    $sb = Solver::solve($b, $inputs, $units);
    $diff = [];
    foreach ($a['variables'] ?? [] as $name => $v) {
        if (($v['type'] ?? '') !== 'dependent' && empty($visible[$name])) {
            continue;
        }
        $x = $sa->values[$name] ?? null;
        $y = $sb->values[$name] ?? null;
        if ($x === null && $y === null) {
            continue;
        }
        if ($x === null || $y === null || abs($x - $y) > 1e-9 * max(1.0, abs($x))) {
            $diff[] = $name;
        }
    }
    return $diff;
}

/* ---------------------------------------------------------------- the loop */

$written = ['shorthand' => 0, 'raw' => 0, 'skipped' => 0, 'failed' => 0];
$reasons = [];
$pending = [];

/* ------------------------------------------------------------------ cleaning */

/*
 * Boilerplate is a property of the category, not of a page: a sentence is only
 * noise because it appears everywhere. So every page's article is read first,
 * the shared sentences are counted, and the filter is applied before any file is
 * written. Pages are also deduplicated by their own sentence count, so the same
 * paragraph written twice inside one page goes too.
 */
$rawArticles = [];
foreach ($rows as $row) {
    $path = (string) $row['path'];
    $c    = explode('/', trim($path, '/'))[0];
    $content = Data::content($c, basename($path)) ?? [];
    $article = [
        'intro'    => (string) ($content['summary'] ?? ''),
        'sections' => array_values(array_filter(array_map(
            static fn ($s): array => ['title' => (string) ($s['title'] ?? ''), 'html' => (string) ($s['html'] ?? '')],
            (array) ($content['sections'] ?? [])
        ), static fn (array $s): bool => $s['html'] !== '')),
        'faq'      => array_values(array_map(
            static fn ($q): array => ['q' => (string) ($q['q'] ?? ''), 'a' => (string) ($q['a'] ?? '')],
            (array) ($content['faq'] ?? [])
        )),
        'related'  => array_values(array_filter(array_map(
            static fn ($r): array => is_array($r)
                ? ['path' => (string) ($r['path'] ?? ''), 'name' => (string) ($r['name'] ?? '')]
                : ['path' => (string) $r, 'name' => ''],
            (array) ($content['related'] ?? [])
        ), static fn (array $r): bool => str_starts_with($r['path'], '/'))),
    ];
    $rawArticles[$path] = $article;
}
$freq  = ContentClean::frequencies($rawArticles);
$boiler = ContentClean::boilerplate($freq);
echo 'boilerplate: ' . count($boiler) . ' sentences repeated on 5+ pages'
    . ' (' . array_sum(array_intersect_key($freq, $boiler)) . " occurrences)\n";

foreach ($rows as $row) {
    $path = (string) $row['path'];
    $slug = basename($path);
    $c    = explode('/', trim($path, '/'))[0];
    $file = CalcFile::path($c, $slug);
    $abs  = CalcFile::absolute($file);

    if (is_file($abs) && !$force) {
        $written['skipped']++;
        continue;
    }

    /*
     * What the page renders today is the source of truth.
     *
     * A file that already holds a `raw` block is the record the site serves —
     * supplements are applied to the shard, never to a file — so converting
     * from the shard could quietly add a unit chip or an equation the live page
     * does not have. The file's own record is converted instead.
     */
    $rec = null;
    if (!$fromShard && is_file($abs)) {
        $existing = CalcFile::read($file);
        if ($existing['ok'] && isset($existing['def']['raw']) && is_array($existing['def']['raw'])) {
            $old = $existing['def'];
            $raw = $old['raw'];
            $rec = [
                'path'     => $path,
                'slug'     => $slug,
                'cat'      => $c,
                'name'     => (string) ($old['name'] ?? ''),
                'title'    => (string) ($old['meta']['title'] ?? ''),
                'desc'     => (string) ($old['meta']['description'] ?? ''),
                'updated'  => (string) ($old['meta']['updated'] ?? ''),
                'vars'     => (array) ($raw['vars'] ?? []),
                'groups'   => (array) ($raw['groups'] ?? []),
                'eq'       => (array) ($raw['eq'] ?? []),
                'datasets' => (array) ($raw['datasets'] ?? []),
            ];
            foreach (['js', 'showIf', 'checks'] as $extra) {
                if (!empty($raw[$extra])) {
                    $rec[$extra] = $raw[$extra];
                }
            }
        }
    }
    if ($rec === null) {
        $rec = raw_record($row);
    }
    if ($rec === null) {
        $written['failed']++;
        echo "  ! no record for $path\n";
        continue;
    }

    $content = Data::content($c, $slug) ?? [];
    $cleaned = ContentClean::clean($rawArticles[$path] ?? ['intro' => '', 'sections' => []], $boiler);
    $article = $cleaned['article'];
    $removedWords = $cleaned['removed'];

    $def = null;
    $why = '';
    if ($rawOnly) {
        $why = 'forced';
    } else {
        [$candidate, $why] = to_shorthand($rec);
        if ($candidate !== null) {
            $candidate['name'] = $rec['name'];
            $candidate['article'] = $article;
            $built = CalcFile::compile($candidate, $path);
            $diff  = same_record($rec, $built);
            if ($diff === []) {
                $shapedA = \Onim\Shape::fromRecord($rec, null);
                $shapedB = \Onim\Shape::fromRecord($built, null);
                $answers = same_answers($shapedA, $shapedB, $units);
                if ($answers === []) {
                    $def = $candidate;
                } else {
                    $why = 'answers differ: ' . implode(',', array_slice($answers, 0, 3));
                }
            } else {
                $why = 'record differs: ' . implode(',', $diff);
            }
        }
    }

    if ($def === null) {
        $def = [
            'name'    => (string) ($rec['name'] ?? ''),
            'raw'     => [
                'vars'     => $rec['vars'] ?? [],
                'groups'   => $rec['groups'] ?? [],
                'eq'       => $rec['eq'] ?? [],
                'datasets' => $rec['datasets'] ?? [],
            ],
            'article' => $article,
        ];
        if (!empty($rec['js'])) {
            $def['raw']['js'] = (string) $rec['js'];
        }
        if (!empty($rec['showIf'])) {
            $def['raw']['showIf'] = (array) $rec['showIf'];
        }
        /* readings that cannot be true together, checked before the formula runs */
        if (!empty($rec['checks'])) {
            $def['raw']['checks'] = (array) $rec['checks'];
        }
        $written['raw']++;
        $reasons[$why] = ($reasons[$why] ?? 0) + 1;
    } else {
        $written['shorthand']++;
    }

    /*
     * The article, written from the page rather than around it: its own labels,
     * its own units, its own formulas, its own numbers. See lib/CalcArticle.php.
     */
    if ($rewrite) {
        $built  = CalcFile::compile($def + ['meta' => []], $path);
        $shaped = \Onim\Shape::fromRecord($built, null);
        $def['article'] = \Onim\CalcArticle::build(
            $shaped,
            $units,
            $peersFor($slug, 3),
            $def['article']
        );
    }

    /*
     * A unit chip is a promise that the same quantity gives the same answer
     * whichever unit it is shown in. On three kinds of box it cannot keep that
     * promise — see lib/UnitGuard.php — and those boxes lose the chip rather
     * than keep a switch that changes the answer.
     */
    if ($rewrite) {
        $built  = CalcFile::compile($def + ['meta' => []], $path);
        $shaped = \Onim\Shape::fromRecord($built, null);
        $bad    = \Onim\UnitGuard::audit($shaped, $units);
        if ($bad !== []) {
            $def = \Onim\UnitGuard::drop($def, array_keys($bad));
            foreach ($bad as $var => $info) {
                echo '  unit chip removed: ' . $slug . ' · ' . $info['label'] . ' — ' . $info['reason'] . "\n";
            }
            $written['chips'] = ($written['chips'] ?? 0) + count($bad);
        }
    }

    /*
     * A page that came out of the boilerplate filter thin gets a worked example
     * computed from its own formulas — the one paragraph nobody else can copy,
     * because the numbers are this page's numbers.
     */
    $words = ContentClean::words($def['article']);
    $hasExample = false;
    foreach ($def['article']['sections'] as $section) {
        if (preg_match('~worked example|example~i', $section['title']) === 1) {
            $hasExample = true;
            break;
        }
    }
    if ($words < 450 && !$hasExample) {
        $built  = CalcFile::compile($def + ['meta' => []], $path);
        $shaped = \Onim\Shape::fromRecord($built, null);
        foreach (CalcExample::sections($shaped, $units) as $extra) {
            $def['article']['sections'][] = $extra;
        }
    }

    /* The facts the description is written from: what the reader enters and
       what comes back, read off the same record the page renders. */
    $facts = [];
    try {
        $facts = CalcSeo::factsFromShape(\Onim\Shape::fromRecord($rec, null));
    } catch (\Throwable $e) {
        $facts = [];
    }

    $pending[] = [
        'path' => $path, 'cat' => $c, 'slug' => $slug, 'abs' => $abs, 'def' => $def,
        'name' => (string) ($rec['name'] ?? ''), 'content' => $content,
        'updated' => (string) ($rec['updated'] ?? date('Y-m-d')),
        'facts' => $facts,
    ];
}

/* ------------------------------------------------------------------ metadata */

/*
 * Title and description are decided for the whole category in one pass, so
 * uniqueness is a property of the run rather than of a page in isolation.
 */
$titles = [];
$descs  = [];
foreach ($pending as $i => $item) {
    $content = $item['content'];
    $article = $item['def']['article'];

    $oldTitle = (string) ($content['seoTitle'] ?? '');
    $oldLen   = mb_strlen($oldTitle, 'UTF-8') + CalcSeo::BRAND_LEN;
    $doubled  = preg_match('~\b(calculator|converter|generator)\b[^—:]{0,12}\b\1\b~iu', $oldTitle) === 1;
    $title    = $oldTitle;
    if ($doubled || $oldLen < CalcSeo::TITLE_MIN || $oldLen > CalcSeo::TITLE_MAX) {
        [$title] = CalcSeo::title($item['name'], $item['cat'], $article);
    }
    $titles[$i] = $title;

    $oldDesc = (string) ($content['seoDesc'] ?? '');
    $desc    = $oldDesc;
    $len     = mb_strlen($oldDesc, 'UTF-8');
    /* An in-range description is still worth replacing when it opens on the
       interface ("the results leave the screen…") or on the frame the old
       generator put on every page. */
    $ui   = '~\b(press calculate|click calculate|results leave the screen|edit a field|grey box|the panel|this free|free [a-z &-]{0,30}calculator)\b~iu';
    $real = preg_match($ui, $oldDesc) === 1;
    /* The frame the old generator put on every page never survives a rewrite,
       even when it is the only line long enough to fill the window. */
    $banned = preg_match('~free [a-z &-]{0,30}calculator|formula, units and a worked~iu', $oldDesc) === 1;
    /* A description that stops mid-sentence ("…and the answer") is broken
       whatever its length; it is rewritten with the page's own facts. */
    $clipped = str_ends_with(rtrim($oldDesc), '…');
    if ($rewrite || $real || $banned || $clipped || $len < CalcSeo::DESC_MIN || $len > CalcSeo::DESC_MAX || !preg_match('~[.!?]$~u', $oldDesc)) {
        [$fresh] = CalcSeo::description($item['name'], $article, $item['facts'] ?? []);
        $freshLen = mb_strlen($fresh, 'UTF-8');
        if ($banned) {
            $desc = $fresh;
        } elseif ($freshLen >= CalcSeo::DESC_MIN && $freshLen <= CalcSeo::DESC_MAX) {
            $desc = $fresh;
        } elseif ($len >= CalcSeo::DESC_MIN && $len <= CalcSeo::DESC_MAX) {
            $desc = $oldDesc;
        } else {
            $desc = $freshLen > $len ? $fresh : $oldDesc;
        }
    }
    $descs[$i] = $desc;
}

/* A duplicate title is a duplicate page as far as a search engine is concerned:
   the second and later pages get their category appended, then a numeral. */
$seen = [];
foreach ($titles as $i => $title) {
    $key = mb_strtolower($title, 'UTF-8');
    if (!isset($seen[$key])) {
        $seen[$key] = $i;
        continue;
    }
    $alt = $title . ' — ' . CalcSeo::catName($pending[$i]['cat']);
    $n = 2;
    while (in_array(mb_strtolower($alt, 'UTF-8'), array_keys($seen), true)) {
        $alt = $title . ' (' . $n . ')';
        $n++;
    }
    $titles[$i] = $alt;
    $seen[mb_strtolower($alt, 'UTF-8')] = $i;
}

/*
 * A sentence repeated across a section is not content, however true it is.
 * After the rewrite the pages are swept once more: whatever still appears on
 * five or more of them is removed from all of them, and the emptied tags are
 * tidied. The pages keep their own arithmetic, their own numbers and their own
 * labels; they lose the shared furniture.
 */
if (!$rewrite && count($pending) > 4) {
    $pool = [];
    foreach ($pending as $item) {
        $pool[] = $item['def']['article'];
    }
    $shared = ContentClean::shared($pool, 5, 40);
    $dropped = 0;
    foreach ($pending as $i => $item) {
        $before = $item['def']['article'];
        $cleaned = ContentClean::clean($before, $shared, 4);
        /* A page that the sweep leaves too thin keeps its article: shared
           sentences are a smaller problem than a page with nothing on it. */
        if (ContentClean::words($cleaned['article']) < 320) {
            continue;
        }
        $pending[$i]['def']['article'] = $cleaned['article'];
        $dropped += (int) ($cleaned['removed'] ?? 0);
    }
    echo 'second sweep: ' . count($shared) . ' shared sentences, ' . $dropped . " removals\n";
}

$fits = ['title' => 0, 'desc' => 0];
$gaps = [];

foreach ($pending as $i => $item) {
    $def  = $item['def'];
    $meta = [
        'title'       => $titles[$i],
        'description' => $descs[$i],
        'h1'          => (string) ($item['content']['h1'] ?? $item['name']),
        'updated'     => $item['updated'],
    ];
    /* The h1 is the page's name, not a keyword paragraph. */
    if (trim($meta['h1']) === '') {
        $meta['h1'] = $item['name'];
    }
    $def = ['name' => $def['name'], 'meta' => $meta] + $def;

    $dir = dirname($item['abs']);
    if (!is_dir($dir) && !mkdir($dir, 0775, true) && !is_dir($dir)) {
        echo "  ! cannot create $dir\n";
        $written['failed']++;
        continue;
    }
    file_put_contents($item['abs'], CalcFile::render($def, $item['path']));

    $tl = mb_strlen($meta['title'], 'UTF-8') + CalcSeo::BRAND_LEN;
    $dl = mb_strlen($meta['description'], 'UTF-8');
    if ($tl >= CalcSeo::TITLE_MIN && $tl <= CalcSeo::TITLE_MAX) {
        $fits['title']++;
    } else {
        $gaps[] = sprintf('title %d  %s', $tl, $item['path']);
    }
    if ($dl >= CalcSeo::DESC_MIN && $dl <= CalcSeo::DESC_MAX) {
        $fits['desc']++;
    } else {
        $gaps[] = sprintf('desc  %d  %s', $dl, $item['path']);
    }
}

CalcFile::flush();
echo "\n";
foreach ($written as $k => $v) {
    echo str_pad($k, 12) . $v . "\n";
}
if ($reasons !== []) {
    arsort($reasons);
    echo "\nwhy raw:\n";
    foreach ($reasons as $why => $count) {
        echo '  ' . str_pad((string) $count, 5, ' ', STR_PAD_LEFT) . '  ' . $why . "\n";
    }
}
echo "\nmetadata in range: " . $fits['title'] . ' titles, ' . $fits['desc'] . " descriptions of " . count($pending) . "\n";
foreach (array_slice($gaps, 0, 12) as $gap) {
    echo '  ' . $gap . "\n";
}
