<?php

declare(strict_types=1);

/**
 * Verify a converted calculator file against the one it replaced.
 *
 *   php tools/verify_conversion.php biology allele-frequency dog-age …
 *   php tools/verify_conversion.php biology --all
 *
 * Compares the working-tree file with the version at HEAD (the harvested `raw`
 * record) on everything that decides behaviour:
 *
 *   • the form — every field, its label, type, units, prefixes, options,
 *     defaults, conditions and the width of its column;
 *   • the equations — every variant, in order;
 *   • the page script, the conditional notes and the cross-field rules;
 *   • the answers — the solver run on several input vectors, compared value by
 *     value.
 *
 * A file that passes is a different spelling of the same calculator, not a
 * different calculator.
 */

require_once __DIR__ . '/../config.php';

use Onim\CalcFile;
use Onim\Data;
use Onim\Shape;
use Onim\Solver;
use Onim\Units;

$cat   = (string) ($argv[1] ?? 'biology');
$rest  = array_slice($argv, 2);
$slugs = $rest === ['--all'] || $rest === []
    ? array_map(
        static fn (string $f): string => substr(basename($f, '.php'), 8),
        glob(CalcFile::absolute(CalcFile::DIR . '/' . $cat . '/qm-calc-*.php')) ?: []
    )
    : $rest;

$units = Data::units();
$tmp   = sys_get_temp_dir() . '/verify-' . getmypid() . '.php';

/** A record with every decision-bearing value, uid-free where uids are internal. */
function canon(array $rec): array
{
    $dsLabels = static function (array $rec, string $uid): array {
        $out = [];
        foreach ($rec['datasets'][$uid]['options'] ?? [] as $o) {
            $out[] = (string) ($o['label'] ?? '') . '=' . (string) ($o['value'] ?? '');
        }
        return $out;
    };
    $defaults = static function (array $rec, string $name) use ($dsLabels): array {
        $var = $rec['vars'][$name] ?? [];
        $ds  = (string) ($var['ds'] ?? '');
        $out = [];
        foreach ($var['dfl'] ?? [] as $d) {
            $value = $d['v'] ?? null;
            if ($ds !== '' && $value !== null) {
                foreach ($rec['datasets'][$ds]['options'] ?? [] as $o) {
                    if ((string) ($o['uid'] ?? '') === (string) $value) {
                        $value = (string) ($o['label'] ?? '');
                        break;
                    }
                }
            }
            $out[] = ['v' => $value, 'c' => $d['c'] ?? null];
        }
        return $out;
    };

    /* A harvested var can be `{"type":"valueSelect"}` with the options living
       only in the field's `opts` and the dataset name on the field: the control
       renders, but the record has nothing that seeds a value from it. Where the
       var names no dataset, the field's own list is what the record means. */
    $fieldOpts = [];
    $fieldDs   = [];
    foreach ($rec['groups'] ?? [] as $g) {
        foreach ($g['m'] ?? [] as $m) {
            foreach ($m[1] ?? [] as $column) {
                foreach ($column ?? [] as $f) {
                    if (($f['t'] ?? '') === 'v' && isset($f['ds'])) {
                        $fieldDs[(string) ($f['n'] ?? '')] = (string) $f['ds'];
                    }
                    if (($f['t'] ?? '') === 'v' && isset($f['opts']) && is_array($f['opts'])) {
                        $fieldOpts[(string) ($f['n'] ?? '')] = array_map(
                            static fn ($o): string => (string) $o[1] . '=' . (string) $o[2],
                            $f['opts']
                        );
                    }
                }
            }
        }
    }

    $groups = [];
    foreach ($rec['groups'] ?? [] as $g) {
        $cols = [];
        foreach ($g['m'] ?? [] as $m) {
            $fieldRows = [];
            foreach ($m[1] ?? [] as $column) {
                $row = [];
                foreach ($column ?? [] as $f) {
                    $t = (string) ($f['t'] ?? '');
                    if ($t === 'x') {
                        $row[] = 'note:' . json_encode($f['c'] ?? null);
                        continue;
                    }
                    if ($t === 'i') {
                        $row[] = 'image:' . implode(',', (array) ($f['u'] ?? []));
                        continue;
                    }
                    $vt = (string) ($f['vt'] ?? '');
                    if ((string) ($rec['vars'][(string) ($f['n'] ?? '')]['type'] ?? '') === 'text') {
                        $vt = 'text';           // the box holds text, whatever the matrix says
                    }
                    $row[] = 'field:' . json_encode([
                        'n' => $f['n'] ?? '', 'l' => $f['l'] ?? '', 'vt' => $vt,
                        'pre' => $f['pre'] ?? '', 'suf' => $f['suf'] ?? '', 'h' => $f['h'] ?? '',
                        'us' => $f['us'] ?? '', 'du' => $f['du'] ?? '', 'oo' => $f['oo'] ?? '',
                        /* Option and dataset uids are internal addresses: the
                           same control compiled twice has two different ones. */
                        'opts' => array_map(static fn ($o): string => $o[1] . '=' . $o[2], $f['opts'] ?? []),
                        'ds' => isset($f['ds']) ? ($rec['datasets'][(string) $f['ds']]['name'] ?? '')
                            . '|' . ($rec['datasets'][(string) $f['ds']]['uiType'] ?? '')
                            . '|' . implode(',', $dsLabels($rec, (string) $f['ds'])) : '',
                    ], JSON_UNESCAPED_UNICODE);
                }
                $fieldRows[] = $row;
            }
            $cols[] = ['grid' => (string) ($m[0] ?? ''), 'cols' => $fieldRows];
        }
        /* A group with no form in it renders nothing; it is not a layout. */
        if ($cols === [] && trim((string) ($g['title'] ?? '')) === '' && trim((string) ($g['desc'] ?? '')) === '') {
            continue;
        }
        $groups[] = ['title' => $g['title'] ?? '', 'note' => $g['desc'] ?? '', 'm' => $cols];   // uid is an address
    }

    $vars = [];
    foreach ($rec['vars'] ?? [] as $name => $v) {
        $vars[(string) $name] = [
            'type' => (string) ($v['type'] ?? ''),
            'rnd'  => json_encode($v['rnd'] ?? null),
            'min'  => json_encode($v['min'] ?? null),
            'dfl'  => $defaults($rec, (string) $name),
            'ds'   => isset($v['ds'])
                ? $dsLabels($rec, (string) $v['ds'])
                : (isset($fieldDs[(string) $name]) ? $dsLabels($rec, $fieldDs[(string) $name]) : ($fieldOpts[(string) $name] ?? [])),
        ];
    }
    ksort($vars);

    $eq = [];
    foreach ($rec['eq'] ?? [] as $entry) {
        $varsOut = [];
        foreach ($entry['var'] ?? [] as $v) {
            $rhs = array_values(array_unique(array_map('strval', $v['r'] ?? [])));
            sort($rhs);
            $varsOut[] = ['l' => $v['l'] ?? '', 'f' => $v['f'] ?? '', 'r' => $rhs];
        }
        $eq[] = ['formula' => $entry['formula'] ?? '', 'var' => $varsOut];
    }

    return [
        'name'    => $rec['name'] ?? '',
        'vars'    => $vars,
        'groups'  => $groups,
        'eq'      => $eq,
        'js'      => (string) ($rec['js'] ?? ''),
        'showIf'  => json_encode($rec['showIf'] ?? null),
        'checks'  => json_encode($rec['checks'] ?? null),
    ];
}

/** Several input vectors, so a formula that only differs on one branch shows up. */
function vectors(array $rec, Units $units): array
{
    $visible = Solver::visibleInputs($rec);
    $out = [];
    foreach ([[2.0, 3.0], [1.0, 1.0], [7.0, 4.0], [0.5, 0.25]] as $i => [$a, $b]) {
        $in = [];
        $n = 0;
        foreach ($visible as $name => $_) {
            $type = (string) ($rec['variables'][$name]['type'] ?? 'numerical');
            if ($type === 'numerical') {
                $in[$name] = $n % 2 === 0 ? $a : $b;
            } elseif ($type === 'valueSelect') {
                $value = Solver::selectValue($rec, $name, $rec['variables'][$name], null);
                if ($value !== null) {
                    $in[$name] = $value + $i * 0;      // the control's own opening value
                }
            }
            $n++;
        }
        $out[] = $in;
    }
    return $out;
}

$ok = 0;
$bad = 0;
foreach ($slugs as $slug) {
    $rel  = CalcFile::path($cat, $slug);            // plugins/calc/<cat>/qm-calc-<slug>.php
    $path = '/' . $cat . '/' . $slug;
    $abs  = CalcFile::absolute($rel);
    if (!is_file($abs)) {
        echo 'MISSING  ' . $slug . "\n";
        $bad++;
        continue;
    }
    $base = getenv('CALC_BASE_REF') ?: 'HEAD';
    $head = shell_exec('cd ' . escapeshellarg(dirname(__DIR__)) . ' && git show ' . escapeshellarg($base . ':' . $rel) . ' 2>/dev/null');
    if (!is_string($head) || trim($head) === '') {
        echo 'NO-HEAD  ' . $slug . " (nothing to compare with)\n";
        $bad++;
        continue;
    }
    file_put_contents($tmp, $head);
    $old = include $tmp;
    @unlink($tmp);
    $new = include $abs;
    if (!is_array($old) || !is_array($new)) {
        echo 'UNREADABLE  ' . $slug . "\n";
        $bad++;
        continue;
    }
    $a = CalcFile::compile($old, $path);
    $b = CalcFile::compile($new, $path);

    $ca = canon($a);
    $cb = canon($b);
    $problems = [];
    foreach ($ca as $key => $value) {
        if ($value !== $cb[$key]) {
            $problems[] = $key;
        }
    }
    if ($problems === []) {
        $sa = Shape::fromRecord($a, null);
        $sb = Shape::fromRecord($b, null);
        foreach (vectors($a, $units) as $i => $inputs) {
            $ra = Solver::solve($sa, $inputs, $units);
            $rb = Solver::solve($sb, $inputs, $units);
            $names = array_unique(array_merge(array_keys($ra->values), array_keys($rb->values)));
            foreach ($names as $name) {
                $x = $ra->values[$name] ?? null;
                $y = $rb->values[$name] ?? null;
                if ($x === null && $y === null) {
                    continue;
                }
                if ($x === null || $y === null || abs((float) $x - (float) $y) > 1e-9 * max(1.0, abs((float) $x))) {
                    $problems[] = 'answer ' . $name . ' (input set ' . ($i + 1) . ')';
                    break 2;
                }
            }
        }
    }
    if ($problems === []) {
        $ok++;
    } else {
        $bad++;
        echo 'DIFF  ' . $slug . ' — ' . implode(', ', array_slice($problems, 0, 4)) . "\n";
    }
}

echo "\n" . $ok . ' identical, ' . $bad . " different\n";
exit($bad === 0 ? 0 : 1);
