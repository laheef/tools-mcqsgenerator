<?php
declare(strict_types=1);

require_once __DIR__ . '/../config.php';

use Onim\CalcFile;
use Onim\Data;
use Onim\Solver;

$units = Data::units();
$pass = 0;
$fail = 0;
$check = static function (bool $ok, string $label) use (&$pass, &$fail): void {
    if ($ok) { $pass++; return; }
    $fail++;
    fwrite(STDERR, "FAIL  {$label}\n");
};
$run = static function (string $slug, array $input) use ($units): array {
    $calc = Data::calculator('ecology--' . $slug);
    if ($calc === null) { throw new RuntimeException('Missing ecology calculator: ' . $slug); }
    return Solver::solve($calc, $input, $units)->values;
};
$near = static fn (?float $actual, float $expected, float $tol = 1e-6): bool => $actual !== null && is_finite($actual) && abs($actual - $expected) <= $tol;

$v = $run('global-plastic-policy', ['production'=>400,'recycling_now'=>9,'recycling_target'=>50,'growth'=>0,'years'=>10]);
$check($near($v['cumulative'] ?? null, 4000), 'plastic-policy cumulative production at zero growth');
$v = $run('solar-panel-wattage', ['daily_kwh'=>10,'sun_hours'=>3.5,'losses'=>15,'panel_watt'=>400]);
$check($near($v['panels'] ?? null, 9), 'solar wattage rounds panel count up');
$check($near($v['annual_kwh'] ?? null, 3909.15), 'solar generation follows rounded panel count and losses');
$v = $run('plastic-footprint', ['weekly_kg'=>2,'recycled_share'=>30,'incinerated_share'=>25]);
$check($near($v['landfill_kg'] ?? null, 46.8), 'plastic fate split default landfill output');
$checks = CalcFile::record('ecology--plastic-footprint')['checks'] ?? [];
$check(count($checks) > 0 && ($checks[0]['limit'] ?? null) === 100, 'plastic fate split has combined-share constraint');
$plasticVars = CalcFile::record('ecology--plastic-footprint')['vars'] ?? [];
$check(($plasticVars['recycled_share']['min'] ?? null) === 0 && ($plasticVars['recycled_share']['max'] ?? null) === 100, 'plastic shares store inclusive bounds in the calculator record');
$clientVars = Data::calculator('ecology--plastic-footprint')['variables'] ?? [];
$check(($clientVars['recycled_share']['min'] ?? null) === 0 && ($clientVars['recycled_share']['max'] ?? null) === 100, 'plastic share bounds reach the browser payload');
$v = $run('carrying-capacity', ['population'=>500,'growth_rate'=>.4,'annual_change'=>50]);
$check($near($v['years_to_ceiling'] ?? null, 8.7412689, 1e-5), 'logistic time to 99 percent of carrying capacity');
$v = $run('carrying-capacity', ['population'=>500,'growth_rate'=>.4,'annual_change'=>0]);
$check($near($v['carrying_capacity'] ?? null, 500) && $near($v['years_to_ceiling'] ?? null, 0), 'zero observed change avoids undefined time');
$v = $run('wind-turbine-profit', ['capacity'=>2000,'capacity_factor'=>35,'price'=>1,'capex'=>2400000,'opex'=>30000,'years'=>20]);
$check($near($v['payback'] ?? null, 0), 'wind project with nonpositive net has no-payback sentinel');
$v = $run('solar-panel', ['kwp'=>4,'yield'=>950,'self_use'=>50,'cost'=>6000,'price'=>0,'export_price'=>0]);
$check($near($v['payback'] ?? null, 0), 'solar project with zero savings has no-payback sentinel');
$v = $run('zero-waste-christmas-tree', ['tree'=>40,'years'=>10,'trip_km'=>8,'trips'=>2]);
$check($near($v['annual_co2'] ?? null, 4.192) && $near($v['real_co2'] ?? null, 5.42), 'artificial-tree acquisition transport annualized once');
$v = $run('fish-mercury', ['body_weight'=>70,'portion_size'=>150,'mercury'=>0,'portions_per_week'=>2]);
$check($near($v['safe_portions'] ?? null, 0), 'zero fish-mercury concentration does not divide by zero');
$v = $run('shannon-index', ['count_a'=>30,'count_b'=>20,'count_c'=>10,'count_d'=>5,'count_e'=>0]);
$check($near($v['shannon'] ?? null, 1.2047933, 1e-6), 'Shannon index remains finite for nonempty sample');
$checks = CalcFile::record('ecology--shannon-index')['checks'] ?? [];
$check(count($checks) > 0, 'Shannon calculator rejects an empty sample before evaluating indices');
$carryChecks = CalcFile::record('ecology--carrying-capacity')['checks'] ?? [];
$check(count($carryChecks) > 0 && isset($carryChecks[0]['expr']), 'carrying capacity rejects an impossible positive-growth combination');

printf("Ecology edge regressions: %d passed, %d failed\n", $pass, $fail);
exit($fail === 0 ? 0 : 1);
