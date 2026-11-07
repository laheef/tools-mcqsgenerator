<?php

declare(strict_types=1);

/**
 * Export harvested calculators to their own files.
 *
 *   php tools/export_calc_files.php --cat=biology [--only=slug] [--force] [--raw]
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
 * --force  overwrite files that exist (an edited file is left alone otherwise)
 * --raw    skip the shorthand entirely and write every page as `raw`
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

$units = Data::units();
$rows  = array_values(array_filter(
    Data::allRows(),
    static fn (array $r): bool => ($r['cat'] ?? '') === $cat
        && ($r['status'] ?? 'published') === 'published'
        && !isset($r['customId'])
        && ($only === '' || ($r['slug'] ?? '') === $only)
));

echo 'exporting ' . count($rows) . ' calculators from ' . $cat . "\n";

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
    if (trim((string) ($rec['js'] ?? '')) !== '') {
        return [null, 'page script'];
    }

    /** The var record for a field: rounding and the value it opens with. */
    $varOf = static function (string $name) use ($rec): array {
        return is_array($rec['vars'][$name] ?? null) ? $rec['vars'][$name] : [];
    };
    $defaultOf = static function (string $name, array $field) use ($varOf, $rec): string {
        $var = $varOf($name);
        $v = $var['dfl'][0]['v'] ?? null;
        if ($v === null) {
            return '__none__';
        }
        if ((string) ($field['vt'] ?? '') === 'valueSelect') {
            $ds = (string) ($field['ds'] ?? '');
            foreach ($rec['datasets'][$ds]['options'] ?? [] as $o) {
                if ((string) ($o['uid'] ?? '') === (string) $v) {
                    return (string) ($o['label'] ?? '');
                }
            }
            return '__none__';
        }
        return (string) $v;
    };

    $sections = [];
    foreach ($rec['groups'] ?? [] as $g) {
        $blocks = [];
        foreach ($g['m'] ?? [] as $matrix) {
            $columns = $matrix[1] ?? [];
            $count   = count($columns);
            if ($count > 3) {
                return [null, 'matrix with ' . $count . ' columns'];
            }
            $fields = [];
            foreach ($columns as $column) {
                foreach ((is_array($column) ? $column : []) as $f) {
                    if (!is_array($f)) {
                        return [null, 'odd field'];
                    }
                    $type = (string) ($f['t'] ?? '');
                    if ($type === 'x') {
                        $chunks = $f['c'] ?? [];
                        if (count($chunks) !== 1 || ($chunks[0][0] ?? null) !== null) {
                            return [null, 'conditional note'];
                        }
                        $fields[] = ['type' => 'note', 'text' => (string) ($chunks[0][1] ?? '')];
                        continue;
                    }
                    if ($type === 'i') {
                        $urls = $f['u'] ?? [];
                        if (count($urls) !== 1) {
                            return [null, 'image set'];
                        }
                        $fields[] = ['type' => 'image', 'url' => (string) $urls[0]];
                        continue;
                    }
                    if ($type !== 'v') {
                        return [null, 'field type ' . $type];
                    }
                    $vt   = (string) ($f['vt'] ?? 'numerical');
                    $name = (string) ($f['n'] ?? '');
                    $out  = ['name' => $name, 'label' => (string) ($f['l'] ?? '')];
                    if ($vt === 'valueSelect') {
                        $out['type']    = 'select';
                        $out['options'] = [];
                        foreach ($f['opts'] ?? [] as $o) {
                            $out['options'][(string) $o[1]] = $o[2];
                        }
                        $dsUid = (string) ($f['ds'] ?? '');
                        $ds    = $rec['datasets'][$dsUid] ?? [];
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
                    /* A second default is a refill rule ("when the unit chip
                       changes, refill with this"), and the shorthand has no
                       way to say it. */
                    if (count($var['dfl'] ?? []) > 1) {
                        return [null, 'several defaults'];
                    }
                    foreach ($var['dfl'] ?? [] as $d) {
                        if (($d['c'] ?? null) !== null) {
                            return [null, 'conditional default'];
                        }
                    }
                    $default = $defaultOf($name, $f);
                    if ($default !== '__none__') {
                        $out['default'] = $default;
                    }
                    $fields[] = $out;
                }
            }
            if ($fields !== []) {
                $blocks[] = ['columns' => $count, 'fields' => $fields];
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
    if (!empty($rec['showIf'])) {
        $def['showIf'] = $rec['showIf'];
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

        $vars = [];
        foreach ($rec['vars'] ?? [] as $name => $v) {
            $vars[(string) $name] = [
                'type' => (string) ($v['type'] ?? ''),
                'rnd'  => json_encode($v['rnd'] ?? null),
                'dfl'  => $defaultText($rec, (string) $name),
                'ds'   => isset($v['ds']) ? $dsName($rec, (string) $v['ds']) : '',
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
            $groups[] = (string) ($g['title'] ?? '') . '|' . (string) ($g['desc'] ?? '') . '|' . implode(' + ', $fields);
        }
        $eq = [];
        foreach ($rec['eq'] ?? [] as $entry) {
            $variants = [];
            foreach ($entry['var'] ?? [] as $v) {
                $rhs = array_map('strval', $v['r'] ?? []);
                sort($rhs);
                $variants[] = (string) ($v['l'] ?? '') . '=' . (string) ($v['f'] ?? '') . ':' . implode('+', $rhs);
            }
            $eq[] = (string) ($entry['formula'] ?? '') . '[' . implode(' ; ', $variants) . ']';
        }
        return ['vars' => $vars, 'groups' => $groups, 'eq' => $eq];
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

    $rec = raw_record($row);
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
        $written['raw']++;
        $reasons[$why] = ($reasons[$why] ?? 0) + 1;
    } else {
        $written['shorthand']++;
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

    $pending[] = [
        'path' => $path, 'cat' => $c, 'slug' => $slug, 'abs' => $abs, 'def' => $def,
        'name' => (string) ($rec['name'] ?? ''), 'content' => $content,
        'updated' => (string) ($rec['updated'] ?? date('Y-m-d')),
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
    if ($len < CalcSeo::DESC_MIN || $len > CalcSeo::DESC_MAX || !preg_match('~[.!?]$~u', $oldDesc)
        || preg_match('~free [a-z &-]{0,30}calculator|formula, units and a worked~iu', $oldDesc) === 1) {
        [$desc] = CalcSeo::description($item['name'], $article);
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
