<?php
/**
 * Average share price across several buys.
 *
 * The cost basis of a position is the money spent divided by the shares held,
 * not the average of the prices paid — 10 shares at $10 and 1 share at $100 is
 * $18.18 average, not $55. Each buy contributes q × p to the total.
 */
return [
    'vars' => [
        'total_shares' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'total_cost' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'average_price' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'position_value' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'profit_loss' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'profit_percent' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'total_shares', 'vt' => 'dependent', 'l' => 'Shares held']]]],
            ['FR1', [[['t' => 'v', 'n' => 'total_cost', 'vt' => 'dependent', 'l' => 'Total cost']]]],
            ['FR1', [[['t' => 'v', 'n' => 'average_price', 'vt' => 'dependent',
                       'l' => 'Average price per share']]]],
            ['FR1', [[['t' => 'v', 'n' => 'position_value', 'vt' => 'dependent',
                       'l' => 'Value at the current price']]]],
            ['FR1', [[['t' => 'v', 'n' => 'profit_loss', 'vt' => 'dependent', 'l' => 'Profit / loss']]]],
            ['FR1', [[['t' => 'v', 'n' => 'profit_percent', 'vt' => 'dependent',
                       'l' => 'Profit / loss (%)', 'suf' => '%']]]],
        ],
    ]],
    'showIf' => [
        'q2' => 'hasValue(q1)', 'p2' => 'hasValue(q1)',
        'q3' => 'hasValue(q2)', 'p3' => 'hasValue(q2)',
        'q4' => 'hasValue(q3)', 'p4' => 'hasValue(q3)',
        'q5' => 'hasValue(q4)', 'p5' => 'hasValue(q4)',
        'q6' => 'hasValue(q5)', 'p6' => 'hasValue(q5)',
        'q7' => 'hasValue(q6)', 'p7' => 'hasValue(q6)',
        'q8' => 'hasValue(q7)', 'p8' => 'hasValue(q7)',
        'q9' => 'hasValue(q8)', 'p9' => 'hasValue(q8)',
        'q10' => 'hasValue(q9)', 'p10' => 'hasValue(q9)',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var rows = [], shares = 0, cost = 0;
  for (var i = 1; i <= 10; i++) {
    var q = Number(v['q' + i]), p = Number(v['p' + i]);
    var hasQ = v['q' + i] !== undefined && v['q' + i] !== '';
    var hasP = v['p' + i] !== undefined && v['p' + i] !== '';
    if (!hasQ || !hasP || !isFinite(q) || !isFinite(p) || q <= 0) continue;
    rows.push({ n: i, q: q, p: p, spent: q * p });
    shares += q;
    cost += q * p;
  }
  if (!rows.length || shares <= 0) {
    ctx.addUnmetCondition('Enter the number of shares and the price paid, for at least one buy.');
    return;
  }
  var average = cost / shares;
  ctx.exportValue('total_shares', sround(shares, 4));
  ctx.exportValue('total_cost', sround(cost, 2));
  ctx.exportValue('average_price', sround(average, 4));

  var body = rows.map(function (r) {
    return ['Buy ' + r.n, snum(r.q, 4), snum(r.p, 4), snum(r.spent, 2)];
  });
  body.push(['Average', snum(shares, 4), snum(average, 4), snum(cost, 2)]);
  ctx.addHtml(stable(['Buy', 'Shares', 'Price', 'Spent'], body));

  var current = Number(v.cp);
  if (isFinite(current) && current > 0 && v.cp !== '') {
    var value = shares * current;
    var pl = value - cost;
    ctx.exportValue('position_value', sround(value, 2));
    ctx.exportValue('profit_loss', sround(pl, 2));
    ctx.exportValue('profit_percent', sround(pl / cost * 100, 2));
    ctx.addHtml('<p class="calc-unmet">At ' + snum(current, 4) + ' per share the position is worth '
      + snum(value, 2) + ', a ' + (pl >= 0 ? 'profit' : 'loss') + ' of ' + snum(Math.abs(pl), 2)
      + ' (' + snum(Math.abs(pl / cost * 100), 2) + ' %).</p>');
  } else {
    ctx.addHtml('<p class="calc-unmet">Average price paid: ' + snum(average, 4)
      + ' across ' + snum(shares, 4) + ' shares. Add a current price to see the profit or loss.</p>');
  }
});
JS,
];
