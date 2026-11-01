<?php
/**
 * Is ax² + bx + c a perfect square trinomial?
 *
 * It is exactly when the discriminant vanishes and a and c are perfect squares
 * with matching signs: then ax² + bx + c = (√a x ± √c)². Checking b² = 4ac is
 * the quick test; factoring is what confirms it.
 */
return [
    'vars' => [
        'ps_delta' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'ps_root' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'ps_is_perfect' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'ps_delta', 'vt' => 'dependent',
                       'l' => 'Discriminant b² − 4ac']]]],
            ['FR1', [[['t' => 'v', 'n' => 'ps_root', 'vt' => 'dependent',
                       'l' => 'Repeated root −b / 2a']]]],
            ['FR1', [[['t' => 'v', 'n' => 'ps_is_perfect', 'vt' => 'dependent',
                       'l' => 'Perfect square trinomial? (1 = yes, 0 = no)']]]],
        ],
    ]],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var a = Number(v.a), b = Number(v.b), c = Number(v.c);
  if ([a, b, c].some(function (x) { return !isFinite(x); })
      || v.a === '' || v.b === '' || v.c === '') {
    ctx.addUnmetCondition('Enter a, b and c for ax² + bx + c.');
    return;
  }
  if (a === 0) {
    ctx.addUnmetCondition('a cannot be zero — that is a straight line, not a trinomial.');
    return;
  }
  var delta = b * b - 4 * a * c;
  var root = -b / (2 * a);
  var sqrtA = Math.sqrt(Math.abs(a)), sqrtC = Math.sqrt(Math.abs(c));
  var squaresFit = Math.abs(sqrtA - Math.round(sqrtA)) < 1e-9
    && Math.abs(sqrtC - Math.round(sqrtC)) < 1e-9;
  var perfect = Math.abs(delta) < 1e-9 && squaresFit && a > 0 && c >= 0;

  ctx.exportValue('ps_delta', sround(delta, 6));
  ctx.exportValue('ps_root', sround(root, 6));
  ctx.exportValue('ps_is_perfect', perfect ? 1 : 0);

  if (perfect) {
    var sign = b < 0 ? '−' : '+';
    ctx.addHtml('<p><strong>Yes, it is a perfect square:</strong> ' + snum(a, 6) + 'x² '
      + (b < 0 ? '− ' : '+ ') + snum(Math.abs(b), 6) + 'x + ' + snum(c, 6) + ' = ('
      + snum(sqrtA, 6) + 'x ' + sign + ' ' + snum(sqrtC, 6) + ')².</p>');
  } else {
    ctx.addHtml('<p><strong>No, it is not a perfect square trinomial.</strong> '
      + (Math.abs(delta) > 1e-9
          ? 'The discriminant is ' + snum(delta, 6) + ', not zero, so the two roots differ.'
          : 'The discriminant is zero but a or c is not a perfect square, so the factors are not whole numbers.')
      + '</p>');
  }
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['b²', snum(b * b, 6)],
    ['4ac', snum(4 * a * c, 6)],
    ['b² − 4ac', snum(delta, 6)],
    ['Root −b/2a', snum(root, 6)],
  ]));
});
JS,
];
