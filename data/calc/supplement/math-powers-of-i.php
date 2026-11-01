<?php
/**
 * Powers of the imaginary unit.
 *
 * i² = −1, so the powers repeat with period four: i⁰ = 1, i¹ = i, i² = −1,
 * i³ = −i. Everything else is that cycle read at n mod 4.
 */
return [
    'vars' => [
        'remainder' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'i_power' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'remainder', 'vt' => 'dependent',
                       'l' => 'n mod 4']]]],
            ['FR1', [[['t' => 'v', 'n' => 'i_power', 'vt' => 'dependent',
                       'l' => 'iⁿ as a real part (the imaginary part is shown below)']]]],
        ],
    ]],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var n = Number(v.n);
  if (!isFinite(n)) {
    ctx.addUnmetCondition('Enter the exponent n.');
    return;
  }
  n = Math.round(n);
  var r = ((n % 4) + 4) % 4;
  var names = ['1', 'i', '−1', '−i'];
  var real = [1, 0, -1, 0][r];
  var imag = [0, 1, 0, -1][r];
  ctx.exportValue('remainder', r);
  ctx.exportValue('i_power', real);
  ctx.addHtml('<p><strong>i<sup>' + n + '</sup> = ' + names[r] + '</strong> — the exponent leaves '
    + r + ' when divided by 4, and the powers repeat every fourth step.</p>');
  ctx.addHtml(stable(['Power', 'Value'], [
    ['i<sup>0</sup>', '1'], ['i<sup>1</sup>', 'i'], ['i<sup>2</sup>', '−1'], ['i<sup>3</sup>', '−i'],
    ['i<sup>' + n + '</sup>', names[r] + ' &nbsp;(real ' + real + ', imaginary ' + imag + ')'],
  ]));
});
JS,
];
