<?php
/**
 * The associative property.
 *
 * Addition and multiplication both survive regrouping — (a + b) + c is a + (b + c)
 * and the same holds for × — which is exactly what this page sets out to show.
 * The two sides are computed separately so the visitor can see they agree.
 */
return [
    'vars' => [
        'assoc_left' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'assoc_right' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'assoc_result' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'assoc_left', 'vt' => 'dependent',
                       'l' => 'Grouped as (a ∘ b) ∘ c']]]],
            ['FR1', [[['t' => 'v', 'n' => 'assoc_right', 'vt' => 'dependent',
                       'l' => 'Grouped as a ∘ (b ∘ c)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'assoc_result', 'vt' => 'dependent',
                       'l' => 'Result (both groupings agree)']]]],
        ],
    ]],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var a = Number(v.a), b = Number(v.b), c = Number(v.c);
  if (![a, b, c].every(function (x) { return isFinite(x); }) ||
      v.a === '' || v.b === '' || v.c === '') {
    ctx.addUnmetCondition('Enter all three numbers a, b and c.');
    return;
  }
  var multiply = Number(v.operation) === 1;
  var op = multiply ? '×' : '+';
  var left = multiply ? (a * b) * c : (a + b) + c;
  var right = multiply ? a * (b * c) : a + (b + c);

  ctx.exportValue('assoc_left', sround(left, 6));
  ctx.exportValue('assoc_right', sround(right, 6));
  ctx.exportValue('assoc_result', sround(left, 6));

  var name = multiply ? 'multiplication' : 'addition';
  ctx.addHtml('<p><strong>(' + snum(a, 6) + ' ' + op + ' ' + snum(b, 6) + ') ' + op + ' '
    + snum(c, 6) + ' = ' + snum(left, 6) + '</strong> and <strong>' + snum(a, 6) + ' ' + op
    + ' (' + snum(b, 6) + ' ' + op + ' ' + snum(c, 6) + ') = ' + snum(right, 6)
    + '</strong> — the same answer, so ' + name + ' is associative.</p>');
  ctx.addHtml(stable(['Grouping', 'Worked out', 'Value'], [
    ['(a ' + op + ' b) ' + op + ' c',
     '(' + snum(a, 6) + ' ' + op + ' ' + snum(b, 6) + ') ' + op + ' ' + snum(c, 6), snum(left, 6)],
    ['a ' + op + ' (b ' + op + ' c)',
     snum(a, 6) + ' ' + op + ' (' + snum(b, 6) + ' ' + op + ' ' + snum(c, 6) + ')', snum(right, 6)],
  ]));
});
JS,
];
