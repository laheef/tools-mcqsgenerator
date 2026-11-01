<?php
/**
 * Pie chart — how each group's value splits a whole.
 *
 * The harvested page kept the twenty `group_A…group_T` boxes but lost the
 * equation list, so the form answered nothing. The arithmetic is trivial and
 * lives here: total, each group's share, and the angle that share subtends.
 */
return [
    'vars' => [
        'total' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'group_count' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results',
        'title' => 'Results',
        'desc' => '',
        'm' => [
            ['FR1', [[[
                't' => 'v', 'n' => 'total', 'vt' => 'dependent',
                'l' => 'Total of all groups',
            ]]]],
            ['FR1', [[[
                't' => 'v', 'n' => 'group_count', 'vt' => 'dependent',
                'l' => 'Groups with a value',
            ]]]],
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
function pieGroups(values) {
  var letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  var out = [];
  for (var i = 0; i < 20; i++) {
    var key = 'group_' + letters.charAt(i);
    var raw = values[key];
    if (raw === undefined || raw === null || raw === '') continue;
    var n = Number(raw);
    if (!isFinite(n) || n <= 0) continue;
    out.push({ name: letters.charAt(i), value: n });
  }
  return out;
}

omni.onResult([], function (ctx, values) {
  var groups = pieGroups(values);
  if (!groups.length) {
    ctx.addUnmetCondition('Enter a value for at least one group.');
    return;
  }
  var total = 0;
  groups.forEach(function (g) { total += g.value; });
  if (!(total > 0)) {
    ctx.addUnmetCondition('The values add up to zero, so there is no pie to draw.');
    return;
  }
  ctx.exportValue('total', total);
  ctx.exportValue('group_count', groups.length);

  var html = '<table><thead><tr><th>Group</th><th>Value</th><th>Share</th><th>Angle</th></tr></thead><tbody>';
  groups.forEach(function (g) {
    var share = g.value / total * 100;
    var angle = g.value / total * 360;
    html += '<tr><td>' + g.name + '</td><td>' + trim(g.value) + '</td><td>'
      + share.toFixed(1) + '&nbsp;%</td><td>' + angle.toFixed(1) + '&deg;</td></tr>';
  });
  html += '<tr><th>Total</th><th>' + trim(total) + '</th><th>100&nbsp;%</th><th>360&deg;</th></tr>';
  html += '</tbody></table>';
  ctx.addHtml(html);

  function trim(n) {
    return Math.abs(n - Math.round(n)) < 1e-9 ? String(Math.round(n)) : String(+n.toFixed(4));
  }
});
JS,
];
