<?php
/**
 * Probability as a fraction — counts per outcome in, probability out.
 *
 * P(A) = count(A) / total counts, shown as a fraction, a decimal and a
 * percentage. The harvested page kept the twenty outcome boxes but no formula.
 */
return [
    'vars' => [
        'total_outcomes' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'most_likely' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'total_outcomes', 'vt' => 'dependent',
                       'l' => 'Total number of outcomes']]]],
            ['FR1', [[['t' => 'v', 'n' => 'most_likely', 'vt' => 'dependent',
                       'l' => 'Highest probability']]]],
        ],
    ]],
    'showIf' => [
        'group_A' => 'groups >= 1',
        'group_B' => 'groups >= 2',
        'group_C' => 'groups >= 3',
        'group_D' => 'groups >= 4',
        'group_E' => 'groups >= 5',
        'group_F' => 'groups >= 6',
        'group_G' => 'groups >= 7',
        'group_H' => 'groups >= 8',
        'group_I' => 'groups >= 9',
        'group_J' => 'groups >= 10',
        'group_K' => 'groups >= 11',
        'group_L' => 'groups >= 12',
        'group_M' => 'groups >= 13',
        'group_N' => 'groups >= 14',
        'group_O' => 'groups >= 15',
        'group_P' => 'groups >= 16',
        'group_Q' => 'groups >= 17',
        'group_R' => 'groups >= 18',
        'group_S' => 'groups >= 19',
        'group_T' => 'groups >= 20',
        'group_U' => 'groups >= 21',
        'group_V' => 'groups >= 22',
        'group_W' => 'groups >= 23',
        'group_X' => 'groups >= 24',
        'group_Y' => 'groups >= 25',
        'group_Z' => 'groups >= 26',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var rows = [], total = 0;
  'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('').forEach(function (letter) {
    var raw = v['group_' + letter];
    if (raw === undefined || raw === null || raw === '') return;
    var n = Number(raw);
    if (!isFinite(n) || n <= 0) return;
    rows.push([letter, n]);
    total += n;
  });
  if (!rows.length) {
    ctx.addUnmetCondition('Enter how many times each outcome happened.');
    return;
  }
  ctx.exportValue('total_outcomes', total);
  var best = rows.reduce(function (a, b) { return b[1] > a[1] ? b : a; }, rows[0]);
  ctx.exportValue('most_likely', sround(best[1] / total, 4));
  var body = rows.map(function (r) {
    var p = r[1] / total;
    return [r[0], snum(r[1], 0), sfrac(r[1], total), snum(p, 4), snum(p * 100, 2) + ' %'];
  });
  ctx.addHtml(stable(['Outcome', 'Count', 'Probability', 'Decimal', 'Percentage'], body,
    ['Total', snum(total, 0), '1', '1', '100 %']));
  ctx.addHtml('<p class="calc-unmet">The most likely outcome is ' + best[0] + ', with a probability of '
    + sfrac(best[1], total) + ' (about ' + snum(best[1] / total * 100, 1) + ' %).</p>');
});
JS,
];
