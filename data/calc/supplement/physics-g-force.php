<?php
/**
 * /physics/g-force — the g-force the inputs describe, both ways.
 *
 * The harvested page carries five boxes and a set of equations keyed on
 * variables that are not among them, so pressing Calculate produced nothing
 * whatever the visitor typed. The two g-forces a visitor comes here for are
 * stated directly: the centripetal one from the speed and the radius, and the
 * tangential one from the change of speed over the time it took.
 *
 *     a_c = v²/r                a_t = (v₁ − v₀)/t
 *     g   = a / 9.80665         F = m·a
 */
require_once __DIR__ . '/_builder.php';

return [
    'replaceJs' => true,
    'hideTexts' => true,
    'vars' => [
        'mass' => ['type' => 'numerical'],
        'radius' => ['type' => 'numerical'],
        'velocity0' => ['type' => 'numerical'],
        'velocity1' => ['type' => 'numerical'],
        'time' => ['type' => 'numerical'],
        'accel_centripetal' => ['type' => 'numerical', 'rnd' => ['standard', '4']],
        'gforce_centripetal' => ['type' => 'numerical', 'rnd' => ['standard', '4']],
        'accel_tangential' => ['type' => 'numerical', 'rnd' => ['standard', '4']],
        'gforce_tangential' => ['type' => 'numerical', 'rnd' => ['standard', '4']],
        'force' => ['type' => 'numerical', 'rnd' => ['standard', '2']],
    ],
    'outputs' => [
        'accel_centripetal' => 'Centripetal acceleration (m/s²)',
        'gforce_centripetal' => 'Centripetal g-force (g)',
        'accel_tangential' => 'Tangential acceleration (m/s²)',
        'gforce_tangential' => 'Tangential g-force (g)',
        'force' => 'Force on the body (N)',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  var G0 = 9.80665;
  var m = Number(ctx.getInput('mass'));
  var r = Number(ctx.getInput('radius'));
  var v0 = Number(ctx.getInput('velocity0'));
  var v1 = Number(ctx.getInput('velocity1'));
  var t = Number(ctx.getInput('time'));

  if (isFinite(v1) && isFinite(r) && r > 0) {
    var ac = v1 * v1 / r;
    ctx.exportValue('accel_centripetal', sround(ac, 4));
    ctx.exportValue('gforce_centripetal', sround(ac / G0, 4));
    if (isFinite(m) && m > 0) { ctx.exportValue('force', sround(m * ac, 2)); }
  }
  if (isFinite(v0) && isFinite(v1) && isFinite(t) && t > 0) {
    var at = (v1 - v0) / t;
    ctx.exportValue('accel_tangential', sround(at, 4));
    ctx.exportValue('gforce_tangential', sround(at / G0, 4));
  }
});
JS,
];
