<?php
/**
 * Pie chart from percentages — each group is entered as a percentage of the
 * whole, and the page reports the angle that percentage subtends. Harvested
 * without its equation list; the conversion lives here.
 */
return [
    'vars' => [
        'total_percentage' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'total_angle' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'total_percentage', 'vt' => 'dependent',
                       'l' => 'Total percentage', 'suf' => '%']]]],
            ['FR1', [[['t' => 'v', 'n' => 'total_angle', 'vt' => 'dependent',
                       'l' => 'Total angle', 'suf' => '°']]]],
        ],
    ]],
    'showIf' => [
        'group_A' => 'number >= 1',
        'group_B' => 'number >= 2',
        'group_C' => 'number >= 3',
        'group_D' => 'number >= 4',
        'group_E' => 'number >= 5',
        'group_F' => 'number >= 6',
        'group_G' => 'number >= 7',
        'group_H' => 'number >= 8',
        'group_I' => 'number >= 9',
        'group_J' => 'number >= 10',
        'group_K' => 'number >= 11',
        'group_L' => 'number >= 12',
        'group_M' => 'number >= 13',
        'group_N' => 'number >= 14',
        'group_O' => 'number >= 15',
        'group_P' => 'number >= 16',
        'group_Q' => 'number >= 17',
        'group_R' => 'number >= 18',
        'group_S' => 'number >= 19',
        'group_T' => 'number >= 20',
        'group_U' => 'number >= 21',
        'group_V' => 'number >= 22',
        'group_W' => 'number >= 23',
        'group_X' => 'number >= 24',
        'group_Y' => 'number >= 25',
        'group_Z' => 'number >= 26',
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
  if (!rows.length || total <= 0) {
    ctx.addUnmetCondition('Enter the percentage of at least one group.');
    return;
  }
  ctx.exportValue('total_percentage', sround(total, 2));
  ctx.exportValue('total_angle', sround(total / 100 * 360, 2));
  var body = rows.map(function (r) {
    return [r[0], snum(r[1], 2) + ' %', snum(r[1] / 100 * 360, 2) + '°'];
  });
  ctx.addHtml(stable(['Group', 'Percentage', 'Angle'], body,
    ['Total', snum(total, 2) + ' %', snum(total / 100 * 360, 2) + '°']));
  if (Math.abs(total - 100) > 0.01) {
    ctx.addHtml('<p class="calc-unmet">The percentages add up to ' + snum(total, 2)
      + ' %, not 100 %. The angles below scale that whole to a full circle, so they are only a pie '
      + 'chart if the total is 100 %.</p>');
  }
});
JS,
];
