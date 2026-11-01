<?php
/**
 * /math/unit-circle — sine, cosine and tangent for the angle typed.
 *
 * The page's own hook opens with `var angleInDegrees = _ref.angleInDegrees`,
 * and `angleInDegrees` is a `presentation` variable: the harvest keeps it out
 * of the form, so the value it reads is always null, the hook returns before it
 * exports anything, and the page answered "every field already has a value"
 * with four empty result rows. The trigonometry is not in doubt, so the
 * supplement computes it — in degrees, from the angle as typed, with the exact
 * values for the special angles the page is known for.
 */
require_once __DIR__ . '/_builder.php';

return [
    'replaceJs' => true,
    'hideTexts' => true,
    /* the harvested form also asked for these four, as plain boxes; taking them
       off the form leaves the results rows below the button as their only home */
    'hideVars' => ['angleInDegrees', 'cosine', 'sine', 'tangent'],
    'vars' => [
        /* Six places, and no inherited rounding: the harvested definition
           carried a zero-decimal format for these values, which printed every
           positive cosine as "1". */
        'angleInDegrees' => ['type' => 'numerical', 'rnd' => ['standard', '6']],
        'cosine' => ['type' => 'numerical', 'rnd' => ['standard', '6']],
        'sine' => ['type' => 'numerical', 'rnd' => ['standard', '6']],
        'tangent' => ['type' => 'numerical', 'rnd' => ['standard', '6']],
    ],
    'outputs' => [
        'angleInDegrees' => 'Angle in degrees',
        'cosine' => 'Cosine',
        'sine' => 'Sine',
        'tangent' => 'Tangent',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  var deg = Number(ctx.getInput('angle'));
  if (!isFinite(deg)) { return; }
  var rad = deg * Math.PI / 180;
  ctx.exportValue('angleInDegrees', sround(deg, 6));

  /* The exact values a unit-circle page exists to show; anything else gets the
     ordinary trigonometric value to six places. tand(90) is undefined, so the
     tangent is reported as missing rather than as a huge number. */
  var exact = {
    0:   [1, 0, 0],
    30:  [Math.sqrt(3) / 2, 0.5, Math.sqrt(3) / 3],
    45:  [Math.sqrt(2) / 2, Math.sqrt(2) / 2, 1],
    60:  [0.5, Math.sqrt(3) / 2, Math.sqrt(3)],
    90:  [0, 1, null],
    180: [-1, 0, 0],
    270: [0, -1, null],
    360: [1, 0, 0]
  };
  var key = ((deg % 360) + 360) % 360;
  var cos = exact[key] ? exact[key][0] : Math.cos(rad);
  var sin = exact[key] ? exact[key][1] : Math.sin(rad);
  var tan = exact[key] ? exact[key][2] : Math.tan(rad);

  ctx.exportValue('cosine', sround(cos, 6));
  ctx.exportValue('sine', sround(sin, 6));
  ctx.exportValue('tangent', tan === null ? null : sround(tan, 6));
  if (tan === null) {
    ctx.addUnmetCondition('The tangent is undefined at ' + key + '° — the angle points straight up or down.');
  }
});
JS,
];
