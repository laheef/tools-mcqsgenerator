<?php
/**
 * Decimal ↔ scientific notation.
 *
 * Scientific notation is d × 10ⁿ with 1 ≤ |d| < 10, engineering notation uses
 * an exponent that is a multiple of three, and "adjust significant figures"
 * rounds the mantissa to the figure count the visitor asks for.
 */
return [
    'vars' => [
        'sci_mantissa' => ['type' => 'dependent', 'rnd' => ['standard', '8']],
        'sci_exponent' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'sci_mantissa', 'vt' => 'dependent', 'l' => 'Mantissa']]]],
            ['FR1', [[['t' => 'v', 'n' => 'sci_exponent', 'vt' => 'dependent', 'l' => 'Exponent']]]],
        ],
    ]],
    'js' => <<<'JS'
function superscript(n) {
  var map = { '0': '⁰', '1': '¹', '2': '²', '3': '³', '4': '⁴', '5': '⁵', '6': '⁶', '7': '⁷',
              '8': '⁸', '9': '⁹', '-': '⁻' };
  return String(n).split('').map(function (c) { return map[c] || c; }).join('');
}

omni.onResult([], function (ctx, v) {
  var raw = String(v.input_decimal === undefined || v.input_decimal === null ? '' : v.input_decimal).trim();
  if (raw === '') {
    ctx.addUnmetCondition('Enter a number to convert.');
    return;
  }
  var x = Number(raw);
  if (!isFinite(x)) {
    ctx.addUnmetCondition('"' + raw + '" is not a number. Use digits, a decimal point and an optional minus sign.');
    return;
  }
  if (x === 0) {
    ctx.exportValue('sci_mantissa', 0);
    ctx.exportValue('sci_exponent', 0);
    ctx.addHtml('<p><strong>Zero is zero in every notation.</strong></p>');
    return;
  }

  var adjust = String(v.sigfig_checkbox) === '10';
  var figs = Number(v.significant_figures);
  if (!isFinite(figs) || figs < 1) figs = 6;
  figs = Math.min(Math.round(figs), 15);

  var exp = Math.floor(Math.log10(Math.abs(x)));
  var man = x / Math.pow(10, exp);

  var digits = figs;
  if (adjust) {
    /* keep asking for one more digit until the mantissa actually carries it */
    man = Number(man.toPrecision(digits));
    if (Math.abs(man) >= 10) { man = man / 10; exp += 1; }
    if (Math.abs(man) < 1) { man = man * 10; exp -= 1; }
  } else {
    man = Number(man.toPrecision(12));
  }

  var engExp = Math.floor(exp / 3) * 3;
  var engMan = Number((x / Math.pow(10, engExp)).toPrecision(adjust ? figs : 12));

  var sciText = snum(man, 12).replace(/0+$/, '').replace(/\.$/, '') + ' × 10' + superscript(exp);
  var engText = snum(engMan, 12).replace(/0+$/, '').replace(/\.$/, '') + ' × 10' + superscript(engExp);

  ctx.exportValue('sci_mantissa', man);
  ctx.exportValue('sci_exponent', exp);

  ctx.addHtml('<p><strong>' + raw + ' = ' + sciText + '</strong> (engineering: ' + engText + ')</p>');
  ctx.addHtml(stable(['Notation', 'Value'], [
    ['Scientific', sciText],
    ['Engineering', engText],
    ['Mantissa', snum(man, 12)],
    ['Exponent', String(exp)],
    ['Significant figures used', adjust ? String(figs) : 'not adjusted'],
  ]));
});
JS,
];
