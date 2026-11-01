<?php
/**
 * Expression audit: evaluate every equation variant of every calculator with
 * dummy values. Anything that throws is a formula the engine cannot handle —
 * those calculators would silently refuse to solve in the browser.
 *
 *   php tools/audit_expr.php [--limit=N] [--verbose]
 */

declare(strict_types=1);

require_once __DIR__ . '/../php-clone/config.php';

use Omni\Data;
use Omni\Expr;
use Omni\Shape;

$limit   = 0;
$verbose = false;
foreach ($argv as $arg) {
    if (str_starts_with($arg, '--limit=')) {
        $limit = (int) substr($arg, 8);
    }
    if ($arg === '--verbose') {
        $verbose = true;
    }
}

$manifest = Data::all();
if ($limit > 0) {
    $manifest = array_slice($manifest, 0, $limit);
}

$support = [];
$failures = [];
$unknownFns = [];
$scripted = 0;
$byMessage = [];
$variants = 0;
$ok = 0;
$noEq = 0;

foreach ($manifest as $row) {
    $calc = Data::calculator((string) $row['path']);
    if ($calc === null) {
        $failures[$row['path']][] = 'definition missing';
        continue;
    }
    if ($calc['equations'] === []) {
        $noEq++;
        // no equations at all: the page script is the whole calculation
        $support[$row['path']] = $calc['js'] !== null ? 'script' : 'none';
        continue;
    }
    // helpers this page's own script defines, e.g. omni.define("get_bmi", …)
    $scriptFns = [];
    if (!empty($calc['js'])) {
        if (preg_match_all('/define\(\s*["\']([A-Za-z_][A-Za-z0-9_]*)["\']/', $calc['js'], $mm)) {
            $scriptFns = array_flip($mm[1]);
        }
        if (preg_match_all('/function\s+([A-Za-z_][A-Za-z0-9_]*)\s*\(/', $calc['js'], $mm)) {
            $scriptFns += array_flip($mm[1]);
        }
    }
    $eqOk = 0;
    $eqTotal = 0;
    foreach ($calc['equations'] as $eq) {
        $thisEqOk = false;
        $eqTotal++;
        foreach ($eq['variants'] as $variant) {
            $variants++;
            $formula = (string) $variant['formula'];
            if (trim($formula) === '') {
                continue;
            }
            // Try several distinct value sets before calling a formula broken:
            // identical dummy values make `a - b` zero, so `1/(a-b)` would look
            // like a broken formula when it is merely a coincidence of the probe.
            $seeds = [[2.0, 1.37], [0.7, 1.9], [12.0, 3.1]];
            $lastError = null;
            $worked = false;
            $nonFinite = false;
            $scriptFn = null;          // helper the page's own script defines
            foreach ($seeds as [$start, $step]) {
                $values = [];
                $v0 = $start;
                $i = 0;
                foreach ($variant['rhs'] as $dep) {
                    // spread the values so no two dependencies collide
                    $values[$dep] = $v0 + $i * 0.31;
                    $v0 += $step;
                    $i++;
                }
                foreach (['e', 'pi', 'g', 'c'] as $const) {
                    $values[$const] ??= 1.0;
                }
                try {
                    $v = Expr::evaluate($formula, $values);
                    if (is_finite($v)) {
                        $worked = true;
                        break;
                    }
                    $nonFinite = true;
                } catch (\Throwable $e) {
                    $lastError = $e->getMessage();
                    if (preg_match("/unsupported function '([^']+)'/", $e->getMessage(), $mm)) {
                        if (isset($scriptFns[$mm[1]])) {
                            // the page ships this helper in its own script, so the
                            // browser can evaluate it even though PHP cannot
                            $scriptFn = $mm[1];
                            break;
                        }
                        $unknownFns[$mm[1]] = ($unknownFns[$mm[1]] ?? 0) + 1;
                    }
                }
            }
            if ($scriptFn !== null) {
                $scripted++;
                $thisEqOk = true;
                continue;
            }
            if ($worked) {
                $ok++;
                $thisEqOk = true;
            } else {
                $msg = $lastError ?? ($nonFinite ? 'non-finite' : 'unknown');
                $failures[$row['path']][] = $msg . ': ' . $formula;
                $key = preg_replace('/\d+/', 'N', $msg) ?: $msg;
                $byMessage[$key][] = $row['path'] . ' :: ' . $formula;
            }
        }
        if ($thisEqOk) {
            $eqOk++;
        }
    }
    $support[$row['path']] = $eqOk === $eqTotal ? 'full' : ($eqOk === 0 ? 'none' : 'partial');
}

@mkdir(dirname(__DIR__ . '/php-clone/data/calc/x'), 0777, true);
file_put_contents(
    __DIR__ . '/../php-clone/data/calc/support.json',
    json_encode($support, JSON_UNESCAPED_SLASHES)
);
$tally = array_count_values($support);
printf("\nsupport: %s\n", json_encode($tally));
printf("variants resolved by the page's own script: %d\n", $scripted);
if ($unknownFns !== []) {
    arsort($unknownFns);
    echo "unknown functions (no PHP and no page script):\n";
    foreach (array_slice($unknownFns, 0, 25, true) as $fn => $n) {
        printf("  %5d  %s\n", $n, $fn);
    }
}

printf("calculators %d · variants %d · evaluated %d · failed %d · no equations %d\n",
    count($manifest), $variants, $ok, array_sum(array_map('count', $failures)), $noEq);

echo "\nfailure kinds:\n";
uasort($byMessage, static fn ($a, $b) => count($b) <=> count($a));
foreach ($byMessage as $msg => $examples) {
    printf("  %5d  %s\n", count($examples), $msg);
    if ($verbose) {
        foreach (array_slice($examples, 0, 3) as $ex) {
            echo "           " . $ex . "\n";
        }
    }
}

if ($failures !== []) {
    $file = __DIR__ . '/../php-clone/docs/expr-failures.txt';
    $lines = [];
    foreach ($failures as $path => $msgs) {
        $lines[] = $path . "\t" . implode(' | ', array_unique($msgs));
    }
    @mkdir(dirname($file), 0777, true);
    file_put_contents($file, implode("\n", $lines) . "\n");
    echo "\nfull list: " . $file . "\n";
}

exit($failures === [] ? 0 : 1);
