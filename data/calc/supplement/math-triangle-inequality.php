<?php
/**
 * Triangle inequality.
 *
 * Three lengths form a triangle exactly when each one is shorter than the other
 * two added together. The check is done on all three sides, so the answer is
 * never "yes" for a shape that closes only one way round.
 */
return [
    'vars' => [
        'valid' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'perimeter' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'longest_side' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'valid', 'vt' => 'dependent',
                       'l' => 'Can these sides form a triangle? (1 = yes, 0 = no)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'perimeter', 'vt' => 'dependent',
                       'l' => 'Perimeter if they can']]]],
            ['FR1', [[['t' => 'v', 'n' => 'longest_side', 'vt' => 'dependent',
                       'l' => 'Longest side']]]],
        ],
    ]],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var a = Number(v.side_length_a), b = Number(v.side_length_b), c = Number(v.side_length_c);
  if (![a, b, c].every(function (x) { return isFinite(x) && x > 0; })) {
    ctx.addUnmetCondition('Enter all three side lengths, each above zero.');
    return;
  }
  var sides = [a, b, c].sort(function (x, y) { return x - y; });
  var longest = sides[2], rest = sides[0] + sides[1];
  var ok = rest > longest;
  ctx.exportValue('valid', ok ? 1 : 0);
  ctx.exportValue('longest_side', sround(longest, 4));
  ctx.exportValue('perimeter', ok ? sround(a + b + c, 4) : 0);

  var p = a + b + c;
  var s = p / 2;
  var area = ok ? Math.sqrt(s * (s - a) * (s - b) * (s - c)) : 0;
  var kind = !ok ? 'not a triangle'
    : (a === b && b === c ? 'equilateral' : (a === b || b === c || a === c ? 'isosceles' : 'scalene'));
  ctx.addHtml('<p><strong>' + (ok ? 'Yes, these sides close a triangle.' : 'No, these sides cannot form a triangle.')
    + '</strong> ' + snum(sides[0], 4) + ' + ' + snum(sides[1], 4) + ' = ' + snum(rest, 4)
    + (ok ? ' is more than ' : ' is not more than ') + snum(longest, 4)
    + ', the longest side.</p>');
  if (ok) {
    ctx.addHtml(stable(['Quantity', 'Value'], [
      ['Type', kind],
      ['Perimeter', snum(p, 4)],
      ['Area (Heron\u2019s formula)', snum(area, 4)],
    ]));
  }
});
JS,
];
