<?php
/**
 * Greater than / less than.
 *
 * Two numbers and the relation between them, which is the whole question the
 * page asks — plus the distance between them, since that is the next thing
 * anybody wants to know.
 */
return [
    'vars' => [
        'comparison' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'difference' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'comparison', 'vt' => 'dependent',
                       'l' => 'Comparison (−1 = a < b, 0 = equal, 1 = a > b)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'difference', 'vt' => 'dependent',
                       'l' => 'Distance between them']]]],
        ],
    ]],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var a = Number(v.first_number), b = Number(v.second_number);
  if (!isFinite(a) || !isFinite(b) || v.first_number === '' || v.second_number === '') {
    ctx.addUnmetCondition('Enter both numbers.');
    return;
  }
  var cmp = a > b ? 1 : (a < b ? -1 : 0);
  ctx.exportValue('comparison', cmp);
  ctx.exportValue('difference', sround(Math.abs(a - b), 6));
  var sentence = cmp === 0
    ? snum(a, 6) + ' = ' + snum(b, 6) + ': the two numbers are equal.'
    : (cmp > 0
        ? snum(a, 6) + ' > ' + snum(b, 6) + ': the first number is the greater one, by '
          + snum(Math.abs(a - b), 6) + '.'
        : snum(a, 6) + ' < ' + snum(b, 6) + ': the second number is the greater one, by '
          + snum(Math.abs(a - b), 6) + '.');
  ctx.addHtml('<p><strong>' + sentence + '</strong></p>');
});
JS,
];
