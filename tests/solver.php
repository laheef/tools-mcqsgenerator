<?php
/**
 * Solver regression tests.
 *
 * Each case is a headline example taken from the calculator's own article on
 * the reference site, fed through our PHP engine. Values are supplied in base
 * units (metres, seconds, decimals for percentages), which is what the solver
 * works in and what the client converts to/from.
 *
 * Run:  php tests/solver.php
 */

declare(strict_types=1);

require_once __DIR__ . '/../config.php';

use Onim\Data;
use Onim\Expr;
use Onim\Format;
use Onim\Solver;
use Onim\Units;

$units = Data::units();

/** @var array<int,array{calc:string,inputs:array,expect:array,note:string}> */
$cases = [
    // --- percentage family --------------------------------------------------
    ['calc' => 'math--percentage', 'inputs' => ['p' => 0.25, 'd' => 200], 'expect' => ['n' => 50],
     'note' => '25% of 200 = 50'],
    ['calc' => 'math--percentage', 'inputs' => ['n' => 50, 'd' => 200], 'expect' => ['p' => 0.25],
     'note' => '50 is 25% of 200'],
    ['calc' => 'math--percentage', 'inputs' => ['n' => 50, 'p' => 0.25], 'expect' => ['d' => 200],
     'note' => '50 is 25% of what -> 200'],
    ['calc' => 'math--percentage-increase', 'inputs' => ['number' => 100, 'percent_increase' => 0.2],
     'expect' => ['result' => 120, 'difference' => 20], 'note' => '100 increased by 20% = 120'],
    ['calc' => 'finance--sales-tax', 'inputs' => ['net' => 100, 'tax' => 0.08],
     'expect' => ['gross' => 108, 'tax_amount' => 8], 'note' => 'net 100 + 8% tax'],

    // --- geometry -----------------------------------------------------------
    ['calc' => 'math--circumference', 'inputs' => ['r' => 5],
     'expect' => ['d' => 10, 'circumference' => 31.41592653589793, 'area' => 78.53981633974483],
     'note' => 'radius 5 -> diameter 10, c = 2 pi r, area = pi r^2'],
    ['calc' => 'math--pythagorean-theorem', 'inputs' => ['side_a' => 3, 'side_b' => 4],
     'expect' => ['side_c' => 5, 'area' => 6, 'perimeter' => 12],
     'note' => '3-4-5 triangle'],
    ['calc' => 'math--triangle-area', 'inputs' => ['base' => 10, 'height' => 6],
     'expect' => ['area_bh' => 30], 'note' => 'area = 1/2 b h'],
    ['calc' => 'math--slope', 'inputs' => ['x1' => 1, 'y1' => 2, 'x2' => 3, 'y2' => 6],
     'expect' => ['slope' => 2, 'distance' => 4.47213595499958, 'delta_x' => 2, 'delta_y' => 4],
     'note' => '(1,2)-(3,6): m = 2, distance = sqrt(20)'],

    // --- arithmetic ---------------------------------------------------------
    ['calc' => 'math--square-root', 'inputs' => ['number' => 9],
     'expect' => ['square_root' => 3, 'square_root_neg' => -3], 'note' => 'sqrt 9 = ±3'],
    ['calc' => 'math--log', 'inputs' => ['x' => 100, 'base' => 10],
     'expect' => ['logarithm' => 2], 'note' => 'log10(100) = 2'],
    ['calc' => 'math--exponent', 'inputs' => ['base' => 2, 'exponent' => 10],
     'expect' => ['power' => 1024], 'note' => '2^10 = 1024'],

    // --- physics ------------------------------------------------------------
    ['calc' => 'physics--ohms-law', 'inputs' => ['current' => 2, 'resistance' => 6],
     'expect' => ['voltage' => 12, 'power' => 24], 'note' => 'V = IR, P = VI'],
    ['calc' => 'physics--ohms-law', 'inputs' => ['voltage' => 12, 'power' => 24],
     'expect' => ['current' => 2, 'resistance' => 6], 'note' => 'solve the other way round'],
    ['calc' => 'everyday-life--speed', 'inputs' => ['distance' => 100, 'time' => 10],
     'expect' => ['speed' => 10], 'note' => '100 m in 10 s = 10 m/s'],

    // --- health -------------------------------------------------------------
    ['calc' => 'health--bmi', 'inputs' => ['mass' => 70, 'height' => 1.75],
     'expect' => ['bmi' => 22.857142857142858], 'note' => '70 kg, 1.75 m'],

    // --- finance ------------------------------------------------------------
    // real definition: 200 000 at 6% APR over 30 years, monthly
    ['calc' => 'finance--loan-payment', // solver inputs are base units: the field shows 6 %, the base is 0.06
     'inputs' => ['Amount' => 200000, 'Annual_rate' => 0.06, 'Years' => 30, 'Payments_in_year' => 12],
     'expect' => ['numberOfInstallments' => 360, 'Loan_Payment_periodic' => 1199.1010503],
     'note' => 'monthly payment on a 30-year loan'],
    ['calc' => 'finance--mortgage', 'inputs' => ['loan_amount' => 300000, 'int_rate' => 0.06, 'term' => 30],
     'expect' => [], 'note' => 'smoke: solves without error'],
    // 95% CI for a mean of 10, sd 2, n 100 -> 10 +/- 1.96*0.2
    ['calc' => 'statistics--confidence-interval',
     'inputs' => ['mean_value' => 10, 'standard_deviation' => 2, 'sample_size' => 100,
                  'confidence_level' => 0.95],
     'expect' => ['standard_error' => 0.2, 'z' => 1.9599639845, 'margin_of_error' => 0.3919927969,
                  'lower_bound' => 9.6080072031, 'upper_bound' => 10.3919927969],
     'note' => '95% confidence interval'],
    ['calc' => 'statistics--p-value', 'inputs' => ['score' => 1.96],
     'expect' => ['pvalue' => 0.04999579029644], 'note' => 'z = 1.96 two-tailed p'],
    ['calc' => 'other--test-grade', 'inputs' => ['nr_right' => 18, 'nr_wrong' => 2],
     'expect' => ['total_questions' => 20, 'percentage' => 90], 'note' => '18 right, 2 wrong = 90%'],
    ['calc' => 'construction--square-footage', 'inputs' => ['length' => 5, 'width' => 4, 'quantity' => 2],
     'expect' => ['area_rec' => 40], 'note' => '5 x 4 ft, two rooms'],
    ['calc' => 'health--ideal-weight', 'inputs' => ['height' => 1.8],
     'expect' => ['Robinson_men' => 72.64566929133858], 'note' => 'Robinson formula at 1.8 m'],
    ['calc' => 'math--scientific-notation', 'inputs' => ['decimal' => 1500],
     'expect' => ['sci_not' => 1500], 'note' => 'identity equation passes value through'],
];

$pass = 0;
/*
 * Dates and durations.
 *
 * A date reaches the formulas as a day number and a duration as days too, so
 * "due date = mating date + 63" is 63 days and "shift end = start + duration −
 * breaks" is a clock time. These three cases are the ones that were wrong when
 * the two conventions collided (a date in milliseconds plus 63 added 63 ms).
 */
$datenote = 'date arithmetic in days, not milliseconds';

$dog = Data::calculator('biology--dog-pregnancy.json');
$ds = Solver::solve($dog, ['matingDate' => 1773100800000], $units);   // 2026-03-10
$due = isset($ds->values['dueDate']) ? gmdate('Y-m-d', (int) round($ds->values['dueDate'] / 1000)) : 'blank';
$ok = $due === '2026-05-12';
printf("  %s  %-34s %-46s %s\n", $ok ? 'PASS' : 'FAIL', 'biology--dog-pregnancy', $datenote, $due);
$ok ? $pass++ : $fail++;

$shift = Data::calculator('everyday-life--8-hour-shift.json');
$ss = Solver::solve($shift, ['startOfShift' => 28800000, 'timeOfShift' => 28800,
                             'breakDuration' => 1800], $units);        // 08:00, 8 h, 30 min
$end = isset($ss->values['endOfShift']) ? gmdate('H:i', (int) round($ss->values['endOfShift'] / 1000)) : 'blank';
$ok = $end === '16:30';
printf("  %s  %-34s %-46s %s\n", $ok ? 'PASS' : 'FAIL', 'everyday-life--8-hour-shift', 'shift end after a break', $end);
$ok ? $pass++ : $fail++;

$ybd = Data::calculator('everyday-life--years-between-dates.json');
$ys = Solver::solve($ybd, ['date1' => 1773100800000, 'date2' => 1578182400000], $units);
$days = isset($ys->values['time_between']) ? $ys->values['time_between'] / 86400 : NAN;
$years = $ys->values['years_between'] ?? NAN;
$ok = close_enough($days, -2256.0, 1e-6) && close_enough($years, -6.1766, 1e-4);
printf("  %s  %-34s %-46s %.0f days / %.4f years\n", $ok ? 'PASS' : 'FAIL',
       'everyday-life--years-between-dates', 'days and years from two dates', $days, $years);
$ok ? $pass++ : $fail++;

$fail = 0;
$tolerance = 1e-6;

function close_enough(float $a, float $b, float $tol = 1e-6): bool
{
    if (is_infinite($a) || is_nan($a)) {
        return false;
    }
    $scale = max(1.0, abs($a), abs($b));
    return abs($a - $b) <= $tol * $scale;
}

echo "Solver regression tests\n";
echo str_repeat('=', 74), "\n";

foreach ($cases as $case) {
    $calc = Data::calculator($case['calc'] . '.json');
    if ($calc === null) {
        printf("  FAIL  %-34s missing data file\n", $case['calc']);
        $fail++;
        continue;
    }
    $solver = Solver::solve($calc, $case['inputs'], $units);

    if ($case['expect'] === []) {
        // smoke test: at least one variable must have been derived
        $derived = count($solver->computed);
        $ok = $derived > 0;
        printf("  %s %-34s %-46s (%d derived)\n", $ok ? 'PASS' : 'FAIL', $case['calc'], $case['note'], $derived);
        $ok ? $pass++ : $fail++;
        continue;
    }

    foreach ($case['expect'] as $name => $want) {
        $got = $solver->value($name);
        $ok = $got !== null && close_enough($got, (float) $want, $tolerance);
        if ($ok) {
            $pass++;
            printf("  PASS  %-34s %-16s = %-14s %s\n", $case['calc'], $name, Format::number($got, '0.000001'), $case['note']);
        } else {
            $fail++;
            printf(
                "  FAIL  %-34s %-16s got %s, want %s   %s\n",
                $case['calc'],
                $name,
                $got === null ? 'null' : (string) round($got, 10),
                (string) $want,
                $case['note']
            );
        }
    }
}

/* ------------------------------------------------------- unit conversions */
echo "\nUnit conversions\n", str_repeat('=', 74), "\n";
$unitCases = [
    // switcher key is discovered from the data; use the circumference radius one
    ['file' => 'math--circumference.json', 'var' => 'r', 'shown' => 100, 'unit' => 'cm', 'base' => 1.0],
    ['file' => 'math--circumference.json', 'var' => 'r', 'shown' => 12, 'unit' => 'inch', 'base' => 0.3048],
    ['file' => 'math--circumference.json', 'var' => 'r', 'shown' => 1750, 'unit' => 'mm', 'base' => 1.75],
];

foreach ($unitCases as $uc) {
    $calc = Data::calculator($uc['file']);
    $key = null;
    foreach ($calc['groups'] as $g) {
        foreach ($g['matrices'] as $m) {
            foreach ($m['columns'] as $col) {
                foreach ($col as $f) {
                    if (($f['var'] ?? null) === $uc['var'] && !empty($f['unitSwitcher'])) {
                        $key = $f['unitSwitcher'];
                    }
                }
            }
        }
    }
    if ($key === null) {
        echo "  FAIL  no unit switcher for {$uc['var']}\n";
        $fail++;
        continue;
    }
    $base = $units->toBase((float) $uc['shown'], $key, $uc['unit']);
    $back = $units->toDisplay($base, $key, $uc['unit']);
    $ok = close_enough($base, (float) $uc['base'], 1e-9) && close_enough($back, (float) $uc['shown'], 1e-9);
    printf(
        "  %s  %s %s -> %s m (round trip %s)\n",
        $ok ? 'PASS' : 'FAIL',
        $uc['shown'],
        $uc['unit'],
        round($base, 6),
        round($back, 6)
    );
    $ok ? $pass++ : $fail++;
}

/* --------------------------------------------------------------- percent */
$percKey = null;
$calc = Data::calculator('math--percentage.json');
foreach ($calc['groups'] as $g) {
    foreach ($g['matrices'] as $m) {
        foreach ($m['columns'] as $col) {
            foreach ($col as $f) {
                if (($f['var'] ?? null) === 'p' && !empty($f['unitSwitcher'])) {
                    $percKey = $f['unitSwitcher'];
                }
            }
        }
    }
}
$base = $units->toBase(25.0, $percKey, 'perc');
$ok = close_enough($base, 0.25, 1e-12);
printf("  %s  25 %% -> %s (base decimal)\n", $ok ? 'PASS' : 'FAIL', $base);
$ok ? $pass++ : $fail++;

/* ------------------------------------------------------- displayed numbers */
echo "\nRendered values\n", str_repeat('=', 74), "\n";

/* The number written into an input box must match what calc.js writes, so the
   two rounding conventions are exercised directly. */
$renderCases = [
    // value, precision, algorithm, expected text
    [204978.4, '2', 'standard', '204978.4'],
    [854.0839, '2', 'standard', '854.08'],
    [22.857142857, '0.0001', 'omni', '22.8571'],
    [0.049995, '0.0001', 'omni', '0.05'],
    [1500.0, '0', 'standard', '1500'],
];
$plain = new ReflectionMethod(Onim\Widget::class, 'plainNumber');
$plain->setAccessible(true);
foreach ($renderCases as [$value, $precision, $algo, $want]) {
    $widget = new Onim\Widget(Data::calculator('math--percentage.json'), $units,
        Solver::solve(Data::calculator('math--percentage.json'), [], $units), []);
    $got = (string) $plain->invoke($widget, (float) $value, $precision, $algo);
    $ok = $got === $want;
    printf("  %s  %-12s %-8s %-6s -> %s\n", $ok ? 'PASS' : 'FAIL', $value, $precision, $algo, $got);
    $ok ? $pass++ : $fail++;
}

/* A value the visitor can see never opens with a harvested default: the page
   starts blank whether the default was a number ("1680" for regular gravel) or
   nothing at all. A helper the form does not show keeps its constant. */
$gravel = Data::calculator('construction--gravel.json');
$gs = Solver::solve($gravel, [], $units);
$gw = new Onim\Widget($gravel, $units, $gs, []);
$density = $gw->shown['density'] ?? null;
$ok = $density === null;
printf("  %s  gravel density opens blank, not at its harvested 1680 kg/m3\n", $ok ? 'PASS' : 'FAIL');
$ok ? $pass++ : $fail++;

$wave = Data::calculator('physics--wave-velocity.json');
$ws = Solver::solve($wave, [], $units);
$ok = !isset($ws->values['velocity']) || isset($ws->placeholder['velocity']);
printf("  %s  wave velocity waits for its inputs instead of showing 0\n", $ok ? 'PASS' : 'FAIL');
$ok ? $pass++ : $fail++;

/* ------------------------------------------------------------- expression */
echo "\nExpression parser\n", str_repeat('=', 74), "\n";
$exprCases = [
    ['2*PI*r', ['r' => 1], 2 * M_PI],
    ['pow(2,10)', [], 1024],
    ['sqrt(16)/2', [], 2],
    ['-3 + 4 * 2 ^ 2', [], 13],
    ['(1/2)*base*height', ['base' => 10, 'height' => 3], 15],
    ['log(exp(3))', [], 3],
    ['abs(-7.5)', [], 7.5],
    ['GCF(48, 18)', [], 6],
    ['2 ^ 3 ^ 2', [], 512], // right associative
];

foreach ($exprCases as [$src, $vars, $want]) {
    try {
        $got = Expr::evaluate($src, $vars);
        $ok = close_enough($got, (float) $want, 1e-9);
    } catch (Throwable $e) {
        $got = $e->getMessage();
        $ok = false;
    }
    printf("  %s  %-24s = %s\n", $ok ? 'PASS' : 'FAIL', $src, is_float($got) ? round($got, 10) : $got);
    $ok ? $pass++ : $fail++;
}

/* -------------------------------------------------------------- formatting */
echo "\nNumber formatting\n", str_repeat('=', 74), "\n";
$fmtCases = [
    [1234.5678, '0.0001', 'omni', '1 234.5678'],
    [1234.0, '0.0001', 'omni', '1 234'],
    [0.25, '0.000001', 'omni', '0.25'],
    [22.857142857, '0.0001', 'omni', '22.8571'],
    [1e6, '0.0001', 'omni', '1 000 000'],
];
foreach ($fmtCases as [$v, $p, $a, $want]) {
    $got = Format::number($v, $p, $a);
    $ok = $got === $want;
    printf("  %s  %-12s -> %-14s (want %s)\n", $ok ? 'PASS' : 'FAIL', (string) $v, $got, $want);
    $ok ? $pass++ : $fail++;
}

echo "\n", str_repeat('=', 74), "\n";
printf("%d passed, %d failed\n", $pass, $fail);
exit($fail === 0 ? 0 : 1);
