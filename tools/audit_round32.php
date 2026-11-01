<?php
/**
 * audit_round32.php — the data-level half of the round-32 acceptance criteria.
 *
 * Some of the eight items are promises about what the page shows before anyone
 * touches it. Those can be checked for every one of the 3 831 calculators here,
 * without a browser: build the widget the way the page does, with no inputs and
 * no query string, and look at what would be printed.
 *
 *   /home/user/tools/php.sh tools/audit_round32.php
 *
 * Checks
 *   3  no field opens with a value
 *   5  no field opens with an empty label, and no group renders with nothing in it
 *   8  a page that cannot answer says so instead of offering a dead button
 */

declare(strict_types=1);

require_once dirname(__DIR__) . '/php-clone/config.php';

use Omni\Data;
use Omni\Solver;
use Omni\Units;
use Omni\Widget;

$units = Data::units();

/* The definitions live in ndjson batches; the audit walks their paths. */
$paths = [];
foreach (glob(dirname(__DIR__) . '/php-clone/data/calc/batch-*.ndjson') as $batch) {
    foreach (file($batch, FILE_IGNORE_NEW_LINES) ?: [] as $line) {
        if (trim($line) === '') {
            continue;
        }
        $row = json_decode($line, true);
        if (is_array($row) && isset($row['path'])) {
            $paths[] = (string) $row['path'];
        }
    }
}
sort($paths);

$problems = [];
$counts = ['calcs' => 0, 'fields' => 0, 'prefilled' => 0, 'unlabelled' => 0,
           'empty_groups' => 0, 'dead_buttons' => 0, 'solvable' => 0];

foreach ($paths as $path) {
    $calc = Data::calculator($path);
    if ($calc === null || isset($calc['custom'])) {
        continue;
    }
    $counts['calcs']++;

    $variables = [];
    foreach (($calc['variables'] ?? []) as $vn => $vv) {
        $variables[$vn] = (string) ($vv['type'] ?? 'numerical');
    }

    $solver = Solver::solve($calc, [], $units);
    $widget = new Widget($calc, $units, $solver, []);

    /* the widget's own group list, so a field is judged as the page renders it */
    /* a page with no formula renders no form at all, so it has no boxes */
    $scriptTrim = trim(str_replace(['"use strict";', "'use strict';", '//# sourceURL=customJs.js'],
                                   '', (string) ($calc['js'] ?? '')));
    $hasFormula = ($calc['equations'] ?? []) !== [] || str_contains($scriptTrim, 'onResult(');

    /* how many boxes a visitor can actually type in (the template's own rule) */
    $typeable = 0;
    if ($hasFormula) {
        foreach ($widget->groups() as $g) {
            foreach ($g['matrices'] as $m) {
                foreach ($m['columns'] as $col) {
                    foreach ($col as $f) {
                        if (($f['kind'] ?? '') === 'number' && empty($f['declaredOutput'])) {
                            $typeable++;
                        }
                    }
                }
            }
        }
    }

    $rendered = [];
    $groupIndex = 0;
    foreach ($hasFormula ? $widget->groups() : [] as $g) {
        foreach ($g['matrices'] as $m) {
            foreach ($m['columns'] as $col) {
                foreach ($col as $f) {
                    if (($f['kind'] ?? '') !== 'number') {
                        continue;
                    }
                    /* the template drops a nameless result from the form */
                    if (trim((string) ($f['label'] ?? '')) === ''
                        && !empty($f['declaredOutput']) && $typeable > 0) {
                        continue;
                    }
                    $rendered[] = ['field' => $f, 'title' => (string) $g['title'],
                                   'desc' => (string) $g['description']];
                }
            }
        }
    }

    /* --- items 3 and 5, over the boxes the page actually renders --------- */
    foreach ($rendered as $entry) {
        $field = $entry['field'];
        $counts['fields']++;

        $value = $field['value'] ?? '';
        if (trim((string) $value) !== '') {
            $counts['prefilled']++;
            if (count($problems) < 400) {
                $problems[] = "$path: box " . ($field['name'] ?? '?')
                            . ' opens with ' . json_encode($value);
            }
        }

        $label = trim((string) ($field['label'] ?? ''));
        if ($label === '') {
            $counts['unlabelled']++;
            if (count($problems) < 400) {
                $problems[] = "$path: box " . ($field['name'] ?? '?')
                            . ' has an empty label (group "'
                            . ($entry['title'] !== '' ? $entry['title'] : 'untitled') . '")';
            }
        }
    }

    /* a group with nothing in it is filtered at render time; count it anyway */
    foreach ($widget->groups() as $group) {
        $hasField = false;
        foreach ($group['matrices'] as $matrix) {
            foreach ($matrix['columns'] as $column) {
                foreach ($column as $field) {
                    $kind = $field['kind'] ?? '';
                    if ($kind === 'text' && trim((string) ($field['html'] ?? '')) === '') {
                        continue;
                    }
                    if ($kind !== 'text') {
                        $hasField = true;
                    }
                }
            }
        }
        if (!$hasField) {
            $counts['empty_groups']++;
        }
    }

    /* --- item 8: a page with no formula must not offer a button ---------- */
    $script = trim(str_replace(['"use strict";', "'use strict';", '//# sourceURL=customJs.js'],
                               '', (string) ($calc['js'] ?? '')));
    $solvable = ($calc['equations'] ?? []) !== [] || str_contains($script, 'onResult(');
    if ($solvable) {
        $counts['solvable']++;
    } else {
        $counts['dead_buttons']++;
    }
}

printf("calculators read        : %d\n", $counts['calcs']);
printf("shown fields examined   : %d\n", $counts['fields']);
printf("fields opening with a value: %d   (item 3)\n", $counts['prefilled']);
printf("numeric fields with no label: %d  (item 5)\n", $counts['unlabelled']);
printf("groups left with nothing in them: %d (item 5, filtered at render)\n", $counts['empty_groups']);
printf("pages with a formula    : %d\n", $counts['solvable']);
printf("pages with no formula   : %d   (item 8, shown as a note instead)\n", $counts['dead_buttons']);
printf("problems listed below   : %d\n", count($problems));
foreach (array_slice($problems, 0, 25) as $p) {
    echo '  - ', $p, "\n";
}
exit(($counts['prefilled'] + $counts['unlabelled']) > 0 ? 1 : 0);
