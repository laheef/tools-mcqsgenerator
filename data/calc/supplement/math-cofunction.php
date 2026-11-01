<?php
/**
 * Cofunction — f(θ) and its cofunction at 90° − θ.
 *
 * The page published only `special_case`; the two answers it exists for,
 * `function_result` and `cofunction_result`, were declared as variables but
 * never written, and the script's hook waits on `angle_display`, a
 * presentation field that never enters the solver state — so it never ran at
 * all. Calculate answered "every field already has a value".
 *
 * The repair computes both values here, with the exact values for the angles
 * that have them (sin 30° is 0.5, not 0.49999999999999994).
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'function_result'   => ['label' => 'Value of the function', 'precision' => '6'],
        'cofunction_result' => ['label' => 'Value of its cofunction', 'precision' => '6'],
        'cofunction_angle'  => ['label' => 'Cofunction angle, degrees', 'precision' => '4'],
        'special_case'      => ['label' => 'This is a special angle (1 = yes)', 'precision' => '0'],
    ],
    'js' => <<<'JS'
var CF_NAMES = {1: 'sin', 2: 'cos', 3: 'tan', 4: 'cot', 5: 'sec', 6: 'csc'};
var CF_PARTNER = {1: 2, 2: 1, 3: 4, 4: 3, 5: 6, 6: 5};
/* exact values at the angles that have them, keyed by function id and degrees */
var CF_EXACT = {
  1: {0: 0, 30: 0.5, 45: Math.SQRT1_2, 60: Math.sqrt(3) / 2, 90: 1},
  2: {0: 1, 30: Math.sqrt(3) / 2, 45: Math.SQRT1_2, 60: 0.5, 90: 0},
  3: {0: 0, 30: Math.sqrt(3) / 3, 45: 1, 60: Math.sqrt(3), 90: Infinity},
  4: {0: Infinity, 30: Math.sqrt(3), 45: 1, 60: Math.sqrt(3) / 3, 90: 0},
  5: {0: 1, 30: 2 / Math.sqrt(3), 45: Math.SQRT2, 60: 2, 90: Infinity},
  6: {0: Infinity, 30: 2, 45: Math.SQRT2, 60: 2 / Math.sqrt(3), 90: 1}
};

function cfFunction(id, degrees) {
  var key = ((degrees % 360) + 360) % 360;
  var exact = CF_EXACT[id] && CF_EXACT[id][key];
  if (exact !== undefined) { return exact; }
  var r = degrees * Math.PI / 180;
  switch (Number(id)) {
    case 1: return Math.sin(r);
    case 2: return Math.cos(r);
    case 3: return Math.tan(r);
    case 4: return 1 / Math.tan(r);
    case 5: return 1 / Math.cos(r);
    case 6: return 1 / Math.sin(r);
  }
  return NaN;
}

/* The picker arrives either as a drop-down (whose value is an option id) or as
   a radio row; sdelabel turns the id back into the words on the option. */
function cfPick(ctx) {
  var text = String(sdelabel(ctx.getRawInput('whichFunction')) || '').toLowerCase();
  var order = ['sin', 'cos', 'tan', 'cot', 'sec', 'csc'];
  for (var i = 0; i < order.length; i++) {
    if (text.indexOf(order[i]) === 0) { return i + 1; }
  }
  var num = Number(String(ctx.getRawInput('whichFunction')).match(/\d/));
  return num >= 1 && num <= 6 ? num : 0;
}

omni.onResult([], function (ctx, values) {
  var raw = String(ctx.getRawInput('angle') || '').trim();
  if (raw === '') {
    ctx.addUnmetCondition('Enter the angle in degrees.');
    return;
  }
  var angle = Number(raw.replace(',', '.'));
  if (!isFinite(angle)) {
    ctx.addUnmetCondition('That is not an angle — digits, a minus sign and a decimal point only.');
    return;
  }
  var id = cfPick(ctx);
  if (!id) {
    ctx.addUnmetCondition('Choose which function you are starting from.');
    return;
  }
  var partner = CF_PARTNER[id];
  var value = cfFunction(id, angle);
  var coAngle = 90 - angle;
  var coValue = cfFunction(partner, coAngle);

  var finiteValue = isFinite(value);
  var finiteCo = isFinite(coValue);
  ctx.exportValue('function_result', finiteValue ? sround(value, 10) : null);
  ctx.exportValue('cofunction_result', finiteCo ? sround(coValue, 10) : null);
  ctx.exportValue('cofunction_angle', sround(coAngle, 4));
  ctx.exportValue('special_case', CF_EXACT[id] && CF_EXACT[id][((angle % 360) + 360) % 360] !== undefined ? 1 : 0);

  ctx.addHtml('<p><strong>' + CF_NAMES[id] + ' ' + snum(angle, 4) + '° = '
    + (finiteValue ? snum(value, 6) : 'undefined') + ', and ' + CF_NAMES[partner] + ' '
    + snum(coAngle, 4) + '° = ' + (finiteCo ? snum(coValue, 6) : 'undefined') + '</strong></p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    [CF_NAMES[id] + ' ' + snum(angle, 4) + '°', finiteValue ? snum(value, 6) : 'undefined'],
    ['Cofunction angle 90° − θ', snum(coAngle, 4) + '°'],
    [CF_NAMES[partner] + ' ' + snum(coAngle, 4) + '°', finiteCo ? snum(coValue, 6) : 'undefined'],
    ['The identity', CF_NAMES[id] + ' θ = ' + CF_NAMES[partner] + ' (90° − θ)']
  ]));
  ctx.addHtml('<p class="calc-note">A cofunction of θ is the same function of the angle that completes it to '
    + '90°: sin and cos pair off, tan and cot, sec and csc. That is why the pairs are equal at 45° and swap '
    + 'places at 30° and 60°. Where a value is undefined — tan 90°, or any sec or csc at a zero of its '
    + 'reciprocal — the row says so instead of printing a huge number.</p>');
});
JS,
];
