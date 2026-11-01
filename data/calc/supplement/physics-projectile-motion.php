<?php
/**
 * /physics/projectile-motion — the launch speed is a box, the rest is worked out.
 *
 * The harvest bound the box labelled "Velocity" to the variable `Velocity`
 * (the speed *at time t*), while every equation in the definition starts from
 * `InitialVelocity`. The page therefore had no way to be told the one number it
 * needs, and Calculate answered "the values entered do not settle the remaining
 * boxes" on a form filled with sensible numbers. The kinematics are short
 * enough to state directly, in degrees, the way the label reads.
 */
require_once __DIR__ . '/_builder.php';

return [
    'replaceGroups' => true,
    'replaceJs' => true,
    'hideTexts' => true,
    'vars' => [
        'InitialVelocity' => ['type' => 'numerical'],
        'angle' => ['type' => 'numerical'],
        'InitialHeight' => ['type' => 'numerical'],
        'g' => ['type' => 'numerical'],
        'InitialHorizontalVelocity' => ['type' => 'numerical', 'rnd' => ['standard', '4']],
        'InitialVerticalVelocity' => ['type' => 'numerical', 'rnd' => ['standard', '4']],
        'TotalTime' => ['type' => 'numerical', 'rnd' => ['standard', '4']],
        'Distance' => ['type' => 'numerical', 'rnd' => ['standard', '4']],
        'MaximumHeight' => ['type' => 'numerical', 'rnd' => ['standard', '4']],
    ],
    'groups' => [
        sup_group('supp-proj-in', '', [
            sup_field(sup_num('InitialVelocity', 'Launch speed (m/s)')),
            sup_field(sup_num('angle', 'Angle of launch (degrees)')),
            sup_field(sup_num('InitialHeight', 'Height at launch (m)')),
            sup_field(sup_num('g', 'Gravitational acceleration (m/s²)')),
        ]),
    ],
    'outputs' => [
        'InitialHorizontalVelocity' => 'Horizontal velocity (m/s)',
        'InitialVerticalVelocity' => 'Vertical velocity (m/s)',
        'TotalTime' => 'Time of flight (s)',
        'Distance' => 'Range (m)',
        'MaximumHeight' => 'Maximum height (m)',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  var v = Number(ctx.getInput('InitialVelocity'));
  var deg = Number(ctx.getInput('angle'));
  var h0 = Number(ctx.getInput('InitialHeight'));
  var g = Number(ctx.getInput('g'));
  if (!isFinite(g) || g <= 0) { g = 9.80665; }
  if (!isFinite(h0)) { h0 = 0; }
  if (!isFinite(v) || !isFinite(deg)) { return; }
  var rad = deg * Math.PI / 180;
  var vx = v * Math.cos(rad);
  var vy = v * Math.sin(rad);
  var t = (vy + Math.sqrt(vy * vy + 2 * g * h0)) / g;
  ctx.exportValue('InitialHorizontalVelocity', sround(vx, 4));
  ctx.exportValue('InitialVerticalVelocity', sround(vy, 4));
  ctx.exportValue('TotalTime', sround(t, 4));
  ctx.exportValue('Distance', sround(vx * t, 4));
  ctx.exportValue('MaximumHeight', sround(h0 + vy * vy / (2 * g), 4));
});
JS,
];
