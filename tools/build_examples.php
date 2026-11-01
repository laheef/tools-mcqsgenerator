<?php
/**
 * build_examples.php — capture a concrete worked example for every calculator.
 *
 * Pass 1 uses the page's own pre-filled values (the "dfl" entries in the
 * harvested definition) so the quoted numbers are exactly what a visitor sees
 * on first load. Pass 2, for the roughly half of the catalogue that ships with
 * no pre-fill, seeds the input fields with a scale-appropriate value (5 m, 70 kg,
 * 30 days, …), solves, and keeps the numbers only when every output is finite
 * and humanly readable.
 *
 *   php tools/build_examples.php [--limit=N]
 *
 * Output: php-clone/data/examples.json
 *   { "/math/area": { "inputs":  [{"kind","label","value","unit"}],
 *                     "outputs": [{"label","value","unit"}],
 *                     "missing": ["label", …],
 *                     "source":  "defaults"|"synthetic" } }
 */

declare(strict_types=1);

require_once __DIR__ . '/../php-clone/config.php';

use Onim\Data;
use Onim\Format;
use Onim\Solver;
use Onim\Widget;

$limit = 0;
foreach ($argv as $arg) {
    if (str_starts_with($arg, '--limit=')) {
        $limit = (int) substr($arg, 8);
    }
}

$units    = Data::units();
$manifest = Data::all();
if ($limit > 0) {
    $manifest = array_slice($manifest, 0, $limit);
}

/** A plausible magnitude for a freshly seeded input, by physical quantity. */
function guessFor(?string $unitName, string $label): float
{
    $u = mb_strtolower($unitName ?? '');
    $l = mb_strtolower($label);
    foreach ([
        'length' => 5, 'distance' => 5, 'height' => 175,
        'mass' => 70, 'weight' => 70,
        'time' => 30, 'duration' => 30, 'age' => 30,
        'temperature' => 20,
        'volume' => 2, 'area' => 10, 'speed' => 60, 'velocity' => 60,
        'energy' => 100, 'power' => 100, 'force' => 100, 'pressure' => 2,
        'angle' => 30, 'data' => 100, 'currency' => 1000, 'money' => 1000,
        'percent' => 10, 'ratio' => 2, 'frequency' => 10, 'current' => 2,
        'voltage' => 12, 'resistance' => 10, 'amount' => 2, 'concentration' => 1,
    ] as $needle => $value) {
        if ($u !== '' && str_contains($u, $needle)) {
            return (float) $value;
        }
    }
    if (preg_match('/\b(day|week|month|year|hour|minute)s?\b/', $l)) {
        return 30.0;
    }
    if (preg_match('/\b(price|cost|salary|income|budget|payment|loan|amount)\b/', $l)) {
        return 1000.0;
    }
    if (preg_match('/\b(percent|rate|interest|discount|tax|tip)\b/', $l)) {
        return 10.0;
    }
    return 10.0;
}

/**
 * Render one solved calculator into the example shape.
 * @return array{inputs:array,outputs:array,missing:array}
 */
function exampleShape(array $calc, $units, array $inputs): array
{
    $solver = Solver::solve($calc, $inputs, $units);
    $widget = new Widget($calc, $units, $solver, []);
    $groups = $widget->groups();

    $in = $out = $labels = [];
    foreach ($groups as $group) {
        foreach ($group['matrices'] as $matrix) {
            foreach ($matrix['columns'] as $column) {
                foreach ($column as $field) {
                    $kind  = $field['kind'] ?? '';
                    $name  = (string) ($field['name'] ?? '');
                    $label = trim((string) ($field['label'] ?? ''));
                    if ($name !== '' && $label !== '' && !isset($labels[$name])) {
                        $labels[$name] = $label;
                    }
                    if ($kind === 'select') {
                        if (empty($field['value']) || $label === '') {
                            continue;
                        }
                        $optLabel = '';
                        foreach ($field['options'] as $opt) {
                            if ((string) $opt['uid'] === (string) $field['value']) {
                                $optLabel = (string) $opt['label'];
                                break;
                            }
                        }
                        if ($optLabel !== '') {
                            $in[] = ['kind' => 'select', 'label' => $label,
                                     'value' => $optLabel, 'unit' => '', 'name' => $name];
                        }
                        continue;
                    }
                    if ($kind !== 'number' || (string) ($field['value'] ?? '') === '') {
                        continue;
                    }
                    $item = ['kind' => 'number', 'label' => $label,
                             'value' => (string) $field['value'],
                             'unit' => (string) ($field['unitLabel'] ?? ''), 'name' => $name];
                    if (!empty($field['computed']) || !empty($field['outputOnly'])) {
                        $out[] = $item;
                    } else {
                        $in[] = $item;
                    }
                }
            }
        }
    }

    $dedupe = static function (array $rows): array {
        $seen = $keep = [];
        foreach ($rows as $r) {
            $k = mb_strtolower(trim((string) $r['label']));
            if ($k === '' || isset($seen[$k])) {
                continue;
            }
            $seen[$k] = true;
            $keep[]   = $r;
        }
        return $keep;
    };

    $missingLabels = [];
    foreach ($solver->missing($calc) as $name) {
        if (($labels[$name] ?? '') !== '') {
            $missingLabels[] = $labels[$name];
        }
    }

    return [
        'inputs'  => array_slice($dedupe($in), 0, 6),
        'outputs' => array_slice($dedupe($out), 0, 6),
        'missing' => array_slice(array_values(array_unique($missingLabels)), 0, 6),
    ];
}

/**
 * Are the quoted numbers something a reader would accept on a page?
 *
 * This is deliberately strict. A worked example whose answer is 0 or
 * 66,666,666 cm does more harm than no example at all, so the result has to be
 * the same order of magnitude as the numbers that produced it.
 */
function believable(array $outputs, array $inputs = [], bool $strict = false): bool
{
    if ($outputs === []) {
        return false;
    }
    $scale = 0.0;
    foreach ($inputs as $i) {
        $raw = str_replace([',', ' '], '', (string) $i['value']);
        if (is_numeric($raw)) {
            $scale = max($scale, abs((float) $raw));
        }
    }

    foreach ($outputs as $o) {
        $raw = str_replace([',', ' '], '', (string) $o['value']);
        if (!is_numeric($raw)) {
            continue;
        }
        $v = abs((float) $raw);
        if ($v === 0.0) {
            return false;                   // a zero tells the reader nothing
        }
        if ($v < 1e-6 || $v > 1e12) {
            return false;
        }
        if ($scale > 0) {
            $ratio = $v / $scale;
            $lo = $strict ? 1e-2 : 1e-3;
            $hi = $strict ? 1e2 : 1e5;
            if ($ratio < $lo || $ratio > $hi) {
                return false;               // correct maths, absurd proportions
            }
        }
    }
    return true;
}


/**
 * Seed only the dependencies of one self-contained equation, so the solver has
 * something real to produce. The most compact relationship wins: it needs the
 * fewest invented numbers, which keeps the example easy to follow.
 */
function dependencySeed(array $calc, $units): array
{
    $candidates = [];
    foreach ($calc['equations'] as $index => $eq) {
        foreach ($eq['variants'] as $variant) {
            $lhs = trim((string) ($variant['lhs'] ?? ''));
            $rhs = array_values(array_filter(array_map('strval', $variant['rhs'] ?? []),
                static fn ($d) => $d !== ''));
            if ($lhs === '' || $rhs === [] || count($rhs) > 4) {
                continue;
            }
            $ok = true;
            foreach ($rhs as $dep) {
                $def = $calc['variables'][$dep] ?? null;
                if ($def === null || ($def['type'] ?? '') === 'valueSelect'
                    || ($def['type'] ?? '') === 'presentation') {
                    $ok = false;
                    break;
                }
            }
            // a bare `lhs = dep` is a unit conversion, not a calculation: the
            // two boxes hold the same quantity, so there is nothing to show
            $bare = trim((string) ($variant['formula'] ?? ''));
            if (count($rhs) === 1 && $bare === $rhs[0]) {
                continue;
            }
            if ($ok) {
                $candidates[] = [$index, $rhs];
            }
        }
    }
    usort($candidates, static fn ($a, $b) => [$a[0], count($a[1])] <=> [$b[0], count($b[1])]);

    foreach ($candidates as [, $rhs]) {
        $seed = [];
        foreach ($rhs as $dep) {
            $def = $calc['variables'][$dep];
            $key = $def['unitKey'] ?? null;
            if ($key !== null && $units->supported((string) $key)) {
                $defUnit = $units->defaultUnit((string) $key);
                $seed[$dep] = $units->toBase(
                    guessFor($units->fullName((string) $key, $defUnit), $dep),
                    (string) $key, $defUnit);
            } else {
                $seed[$dep] = guessFor(null, $dep);
            }
        }
        return $seed;
    }
    return [];
}

$out = $synt = $deflt = $rel = 0;
$result = [];

foreach ($manifest as $row) {
    $path = (string) $row['path'];
    $calc = Data::calculator($path);
    if ($calc === null) {
        continue;
    }

    [$inputs] = [null];
    $data = exampleShape($calc, $units, []);
    $source = 'defaults';

    if (!believable($data['outputs'], $data['inputs'])) {
        // pass 2: seed the input side with scale-appropriate values
        // Only the genuinely free variables get a seed: anything that stands
        // alone on one side of an equation is what the solver is meant to
        // produce, and seeding it would leave nothing to compute.
        $targets = [];
        foreach ($calc['equations'] as $eq) {
            foreach ($eq['variants'] as $variant) {
                // each variant is "lhs = formula", already rearranged for that target
                $lhs = trim((string) ($variant['lhs'] ?? ''));
                if ($lhs !== '') {
                    $targets[$lhs] = true;
                }
            }
        }
        $seed = [];
        foreach ($calc['variables'] as $name => $v) {
            $type = (string) ($v['type'] ?? 'numerical');
            if ($type === 'dependent' || $type === 'valueSelect' || isset($targets[$name])) {
                continue;
            }
            $key = $v['unitKey'] ?? null;
            if ($key !== null && $units->supported((string) $key)) {
                $defUnit = $units->defaultUnit((string) $key);
                $seed[$name] = $units->toBase(guessFor($units->fullName((string) $key, $defUnit), $name),
                                              (string) $key, $defUnit);
            } else {
                $seed[$name] = guessFor(null, $name);
            }
        }
        $alt = exampleShape($calc, $units, $seed);
        if (believable($alt['outputs'], $alt['inputs'])) {
            $data   = $alt;
            $source = 'synthetic';
            $synt++;
        } else {
            /*
             * Pass 3 — the shape sits too many variables away for a blanket
             * seed (area of a triangle, a unit conversion, a loan schedule).
             * Pick one real relationship, fill only its dependencies, and let
             * the solver produce that equation's own target. The example is
             * then true by construction because it is one line of the formula.
             */
            $alt = exampleShape($calc, $units, dependencySeed($calc, $units));
            // a hand-built relationship has to be plausible to be worth quoting
            if (believable($alt['outputs'], $alt['inputs'], true)) {
                $data   = $alt;
                $source = 'relation';
                $rel++;
            } else {
                $deflt += $data['outputs'] === [] ? 0 : 1;
                $source = $data['outputs'] === [] ? 'none' : 'defaults';
            }
        }
    } else {
        $deflt++;
    }

    $data['source'] = $source;
    $data['eqCount']  = count($calc['equations']);
    $data['varCount'] = count($calc['variables']);
    $result[$path] = $data;
    if ($data['outputs'] !== [] && $data['inputs'] !== []) {
        $out++;
    }
}

$dest = __DIR__ . '/../php-clone/data/examples.json';
file_put_contents($dest, json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
printf("examples: %d entries, %d with inputs+outputs (defaults %d, synthetic %d, relation %d), %s (%.1f MB)\n",
    count($result), $out, $deflt, $synt, $rel, $dest, filesize($dest) / 1048576);
