<?php
/**
 * Expanding logarithms.
 *
 * The three product, quotient and power rules, each worked out with the numbers
 * the visitor supplies: logₙ(ab) = logₙa + logₙb, logₙ(a/b) = logₙa − logₙb and
 * logₙ(aᵏ) = k·logₙa.
 */
return [
    'vars' => [
        'log_first' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'log_second' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'log_result' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'log_first', 'vt' => 'dependent', 'l' => 'First logarithm']]]],
            ['FR1', [[['t' => 'v', 'n' => 'log_second', 'vt' => 'dependent', 'l' => 'Second logarithm']]]],
            ['FR1', [[['t' => 'v', 'n' => 'log_result', 'vt' => 'dependent',
                       'l' => 'Sum / difference / multiple']]]],
        ],
    ]],
    'showIf' => [
        'aMult' => 'operation == 1', 'bMult' => 'operation == 1',
        'aDiv' => 'operation == 2', 'bDiv' => 'operation == 2',
        'aPow' => 'operation == 3', 'kPow' => 'operation == 3',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var base = Number(v.n);
  if (!isFinite(base) || base <= 0 || base === 1) {
    ctx.addUnmetCondition('The base n has to be positive and not 1.');
    return;
  }
  var L = function (x) { return Math.log(x) / Math.log(base); };
  var operation = Number(v.operation);

  if (operation === 1) {
    var a = Number(v.aMult), b = Number(v.bMult);
    if (!(a > 0) || !(b > 0)) { ctx.addUnmetCondition('Both a and b have to be greater than zero.'); return; }
    ctx.exportValue('log_first', sround(L(a), 6));
    ctx.exportValue('log_second', sround(L(b), 6));
    ctx.exportValue('log_result', sround(L(a) + L(b), 6));
    ctx.addHtml('<p><strong>log<sub>' + snum(base, 6) + '</sub>(' + snum(a, 6) + ' × '
      + snum(b, 6) + ') = log<sub>' + snum(base, 6) + '</sub>' + snum(a, 6) + ' + log<sub>'
      + snum(base, 6) + '</sub>' + snum(b, 6) + ' = ' + snum(L(a), 6) + ' + ' + snum(L(b), 6)
      + ' = ' + snum(L(a) + L(b), 6) + '</strong></p>');
    ctx.addHtml(stable(['Term', 'Value'], [
      ['log(' + snum(a, 6) + ')', snum(L(a), 6)],
      ['log(' + snum(b, 6) + ')', snum(L(b), 6)],
      ['log(' + snum(a * b, 6) + ') — the check', snum(L(a * b), 6)],
    ]));
    return;
  }

  if (operation === 2) {
    var ad = Number(v.aDiv), bd = Number(v.bDiv);
    if (!(ad > 0) || !(bd > 0)) { ctx.addUnmetCondition('Both a and b have to be greater than zero.'); return; }
    ctx.exportValue('log_first', sround(L(ad), 6));
    ctx.exportValue('log_second', sround(L(bd), 6));
    ctx.exportValue('log_result', sround(L(ad) - L(bd), 6));
    ctx.addHtml('<p><strong>log<sub>' + snum(base, 6) + '</sub>(' + snum(ad, 6) + ' ÷ '
      + snum(bd, 6) + ') = log<sub>' + snum(base, 6) + '</sub>' + snum(ad, 6) + ' − log<sub>'
      + snum(base, 6) + '</sub>' + snum(bd, 6) + ' = ' + snum(L(ad), 6) + ' − ' + snum(L(bd), 6)
      + ' = ' + snum(L(ad) - L(bd), 6) + '</strong></p>');
    ctx.addHtml(stable(['Term', 'Value'], [
      ['log(' + snum(ad, 6) + ')', snum(L(ad), 6)],
      ['log(' + snum(bd, 6) + ')', snum(L(bd), 6)],
      ['log(' + snum(ad / bd, 6) + ') — the check', snum(L(ad / bd), 6)],
    ]));
    return;
  }

  var ap = Number(v.aPow), k = Number(v.kPow);
  if (!(ap > 0)) { ctx.addUnmetCondition('a has to be greater than zero.'); return; }
  if (!isFinite(k)) { ctx.addUnmetCondition('Enter the power k.'); return; }
  ctx.exportValue('log_first', sround(L(ap), 6));
  ctx.exportValue('log_second', sround(k, 6));
  ctx.exportValue('log_result', sround(k * L(ap), 6));
  ctx.addHtml('<p><strong>log<sub>' + snum(base, 6) + '</sub>(' + snum(ap, 6) + '<sup>'
    + snum(k, 6) + '</sup>) = ' + snum(k, 6) + ' × log<sub>' + snum(base, 6) + '</sub>'
    + snum(ap, 6) + ' = ' + snum(k, 6) + ' × ' + snum(L(ap), 6) + ' = '
    + snum(k * L(ap), 6) + '</strong></p>');
  ctx.addHtml(stable(['Term', 'Value'], [
    ['log(' + snum(ap, 6) + ')', snum(L(ap), 6)],
    ['k', snum(k, 6)],
    ['log(' + snum(Math.pow(ap, k), 6) + ') — the check', snum(L(Math.pow(ap, k)), 6)],
  ]));
});
JS,
];
