<?php
/**
 * solve_audit.php — look for calculators that are *silently* not solving.
 *
 * The expression audit (tools/audit_expr.php) proves that each formula can be
 * evaluated with invented numbers. This one does the complementary job: it runs
 * the real solver on the real defaults and asks whether anything that should
 * have been derived was left blank.
 *
 * A variant whose every dependency is known but which still yields no value is
 * always a defect — an overflow, a division by zero on real data, or a formula
 * whose units disagree with the values it is given. Exactly that happened to the
 * mortgage calculator, where a term stored in seconds made `pow(...)` infinite
 * and the payment quietly disappeared.
 *
 *   php tools/solve_audit.php [--limit=N] [--verbose]
 *
 * Output: docs/solve-audit.json + a summary on stdout.
 */

declare(strict_types=1);

require_once __DIR__ . '/../php-clone/config.php';

use Onim\Data;
use Onim\Format;
use Onim\Solver;
use Onim\Widget;

$limit = 0;
$verbose = false;
foreach ($argv as $arg) {
    if (str_starts_with($arg, '--limit=')) {
        $limit = (int) substr($arg, 8);
    }
    if ($arg === '--verbose') {
        $verbose = true;
    }
}

$units = Data::units();
$manifest = Data::all();
if ($limit > 0) {
    $manifest = array_slice($manifest, 0, $limit);
}

$report = [];
$byReason = [];
$absurd = [];
$clean = 0;

foreach ($manifest as $row) {
    $path = (string) $row['path'];
    $calc = Data::calculator($path);
    if ($calc === null) {
        continue;
    }

    $solver = Solver::solve($calc, [], $units);
    $misses = $solver->misses($calc);
    $problems = [];

    foreach ($misses as $m) {
        $problems[] = ['kind' => 'unsolved', 'var' => $m['lhs'],
                       'formula' => $m['formula'], 'reason' => $m['reason']];
        $key = preg_replace('/\d+/', 'N', $m['reason']);
        $byReason[$key][] = $path . ' :: ' . $m['lhs'] . ' = ' . $m['formula'];
    }

    // magnitudes that no reader would accept, on values the page derives itself
    $widget = new Widget($calc, $units, $solver, []);
    $shown = $widget->shown ?? [];
    foreach ($calc['variables'] as $name => $var) {
        if (!isset($solver->computed[$name], $shown[$name])) {
            continue;
        }
        $v = (float) $shown[$name];
        if (!is_finite($v)) {
            $problems[] = ['kind' => 'non-finite', 'var' => $name, 'value' => (string) $v];
            $byReason['non-finite display'][] = $path . ' :: ' . $name;
            continue;
        }
        if ($v !== 0.0 && (abs($v) > 1e12 || abs($v) < 1e-9)) {
            $problems[] = ['kind' => 'absurd', 'var' => $name,
                           'value' => Format::number($v, null, 'omni')];
            $absurd[$path][] = $name . ' = ' . Format::number($v, null, 'omni');
        }
    }

    if ($problems === []) {
        $clean++;
        continue;
    }
    $report[$path] = $problems;
}

$dest = __DIR__ . '/../php-clone/docs/solve-audit.json';
@mkdir(dirname($dest), 0777, true);
file_put_contents($dest, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n");

printf("calculators %d · clean %d · flagged %d\n", count($manifest), $clean, count($report));
printf("detail: %s\n", $dest);

if ($byReason !== []) {
    echo "\nwhy a variant did not produce a value (defaults in place):\n";
    uasort($byReason, static fn ($a, $b) => count($b) <=> count($a));
    foreach ($byReason as $reason => $examples) {
        printf("  %5d  %s\n", count($examples), $reason);
        if ($verbose) {
            foreach (array_slice($examples, 0, 4) as $ex) {
                echo '           ' . $ex . "\n";
            }
        }
    }
}

if ($absurd !== []) {
    printf("\nimplausible magnitudes: %d page(s)\n", count($absurd));
    foreach (array_slice($absurd, 0, 15, true) as $path => $items) {
        printf("  %-40s %s\n", $path, implode(', ', array_slice($items, 0, 3)));
    }
}
