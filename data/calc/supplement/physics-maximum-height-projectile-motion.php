<?php
/**
 * /physics/maximum-height-projectile-motion — the velocity box is back.
 *
 * The harvested form kept only the angle and the launch height, and marked the
 * velocity as a result, so the page could never be asked its question: maximum
 * height needs a speed. The equations are the reference page's own; this
 * supplement puts the three values it actually takes into the form and the
 * derived quantities into the results.
 */
require_once __DIR__ . '/_builder.php';

return [
    'replaceGroups' => true,
    'replaceJs' => true,
    'hideTexts' => true,
    'groups' => [
        sup_group('supp-mh-inputs', '', [
            sup_field(sup_num('angle', 'Launch angle')),
            sup_field(sup_num('velocity', 'Initial velocity')),
            sup_field(sup_num('initial_height', 'Height at launch')),
        ]),
    ],
    'outputs' => [
        'velocity_x' => 'Horizontal velocity',
        'velocity_y' => 'Vertical velocity',
        'height_max' => 'Maximum height',
    ],
    'js' => <<<'JS'
/*
 * The harvested equations read the angle as a plain number and pass it to
 * cos()/sin(), which are radians — while the box asks for degrees. Typing 45
 * evaluated cos(45 rad) = 0.525, and the "maximum height" formula carried the
 * reference site's special-case branches on top of that. The physics is short
 * enough to state honestly:
 *
 *   vx = v·cos θ    vy = v·sin θ    h = h0 + v²·sin²θ / (2g)
 */
omni.onResult([], function (ctx) {
  var deg = Number(ctx.getInput('angle'));
  var v = Number(ctx.getInput('velocity'));
  var h0 = Number(ctx.getInput('initial_height'));
  if (!isFinite(deg) || !isFinite(v) || deg === 0) { return; }
  if (!isFinite(h0)) { h0 = 0; }
  var rad = deg * Math.PI / 180;
  var g = 9.80665;
  ctx.exportValue('velocity_x', sround(v * Math.cos(rad), 4));
  ctx.exportValue('velocity_y', sround(v * Math.sin(rad), 4));
  ctx.exportValue('height_max', sround(h0 + v * v * Math.sin(rad) * Math.sin(rad) / (2 * g), 4));
});
JS,
];
