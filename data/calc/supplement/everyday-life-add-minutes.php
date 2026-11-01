<?php
/**
 * Add minutes — adding up a list of times.
 *
 * The page holds twenty boxes and marks every one of them required, so a
 * visitor with two times to add could not press Calculate at all: "19 fields
 * still need a value". Its answers were published as `time`, `time2` and
 * `time3`, none of them a declared row, so even a fully filled form had nowhere
 * to put the sum.
 *
 * The repair makes the extra boxes optional, adds the times that were actually
 * entered, and reports the total in whichever unit the picker names — as a
 * single number, or as a mixed "hours / minutes / seconds" reading.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'replaceJs' => true,
    'vars' => [
        'm2' => ['type' => 'numerical', 'required' => False],
        'm3' => ['type' => 'numerical', 'required' => False],
        'm4' => ['type' => 'numerical', 'required' => False],
        'm5' => ['type' => 'numerical', 'required' => False],
        'm6' => ['type' => 'numerical', 'required' => False],
        'm7' => ['type' => 'numerical', 'required' => False],
        'm8' => ['type' => 'numerical', 'required' => False],
        'm9' => ['type' => 'numerical', 'required' => False],
        'm10' => ['type' => 'numerical', 'required' => False],
        'm11' => ['type' => 'numerical', 'required' => False],
        'm12' => ['type' => 'numerical', 'required' => False],
        'm13' => ['type' => 'numerical', 'required' => False],
        'm14' => ['type' => 'numerical', 'required' => False],
        'm15' => ['type' => 'numerical', 'required' => False],
        'm16' => ['type' => 'numerical', 'required' => False],
        'm17' => ['type' => 'numerical', 'required' => False],
        'm18' => ['type' => 'numerical', 'required' => False],
        'm19' => ['type' => 'numerical', 'required' => False],
        'm20' => ['type' => 'numerical', 'required' => False],
    ],
    'outputs' => [
        'time'        => ['label' => 'Total', 'precision' => '4'],
        'time2'       => ['label' => 'Next unit down', 'precision' => '0'],
        'time3'       => ['label' => 'Smallest unit', 'precision' => '0'],
        'total_min'   => ['label' => 'Total minutes', 'precision' => '2'],
        'times_added' => ['label' => 'Times you entered', 'precision' => '0'],
    ],
    'js' => <<<'JS'
/* seconds in each unit the picker can name */
var AM_UNIT = {0: 0.001, 1: 1, 2: 60, 3: 3600, 4: 86400, 5: 604800, 6: 2592000, 7: 31536000};
/* the mixed readings, largest unit first */
var AM_CHAIN = {
  8: [2, 1], 9: [3, 2], 10: [3, 2, 1], 11: [7, 6], 12: [7, 6, 4], 13: [5, 4], 14: [4, 3], 15: [4, 3, 2]
};

function amPick(ctx) {
  var lab = String(sdelabel(ctx.getRawInput('result_unit')) || '').toLowerCase();
  var has = function (text) { return lab.indexOf(text) >= 0; };
  /* longest phrases first: "hours / minutes / seconds" contains
     "minutes / seconds" and must not be read as the shorter one */
  if (has('hours / minutes / seconds')) { return 10; }
  if (has('days / hours / minutes')) { return 15; }
  if (has('years / months / days')) { return 12; }
  if (has('minutes / seconds')) { return 8; }
  if (has('hours / minutes')) { return 9; }
  if (has('years / months')) { return 11; }
  if (has('weeks / days')) { return 13; }
  if (has('days / hours')) { return 14; }
  if (has('millisecond')) { return 0; }
  if (has('second')) { return 1; }
  if (has('minute')) { return 2; }
  if (has('hour')) { return 3; }
  if (has('week')) { return 5; }
  if (has('month')) { return 6; }
  if (has('year')) { return 7; }
  if (has('day')) { return 4; }
  return 10;   /* the page opens on hours / minutes / seconds */
}

omni.onResult([], function (ctx, values) {
  var nums = [], blank = 0;
  for (var i = 1; i <= 20; i++) {
    var raw = String(ctx.getRawInput('m' + i) || '').trim();
    if (raw === '') { blank++; continue; }
    var n = Number(raw.replace(/\s/g, '').replace(',', '.'));
    if (isFinite(n)) { nums.push(n); }
  }
  var clear = function () {
    ['time', 'time2', 'time3', 'total_min', 'times_added'].forEach(function (n) {
      ctx.exportValue(n, null);
    });
  };
  if (!nums.length) {
    clear();
    ctx.addUnmetCondition('Type at least one time in minutes — the other boxes can stay empty.');
    return;
  }

  var totalMin = 0;
  nums.forEach(function (n) { totalMin += n; });
  var seconds = totalMin * 60;
  var mode = amPick(ctx);

  ctx.exportValue('times_added', nums.length);
  ctx.exportValue('total_min', sround(totalMin, 4));

  var reading;
  if (AM_CHAIN[mode]) {
    var chain = AM_CHAIN[mode], left = seconds, parts = [];
    for (var k = 0; k < chain.length; k++) {
      var size = AM_UNIT[chain[k]];
      var whole = k === chain.length - 1 ? sround(left / size, 4) : Math.floor(left / size);
      parts.push(whole);
      left -= whole * size;
    }
    ctx.exportValue('time', parts[0]);
    ctx.exportValue('time2', parts.length > 1 ? parts[1] : null);
    ctx.exportValue('time3', parts.length > 2 ? parts[2] : null);
    reading = parts.map(function (v, idx) { return snum(v, 4) + ' ' + AM_NAME[chain[idx]]; }).join(', ');
  } else {
    var single = seconds / AM_UNIT[mode];
    ctx.exportValue('time', sround(single, 4));
    ctx.exportValue('time2', null);
    ctx.exportValue('time3', null);
    reading = snum(single, 4) + ' ' + AM_NAME[mode];
  }

  ctx.addHtml('<p><strong>' + nums.length + ' time' + (nums.length === 1 ? '' : 's') + ' add up to '
    + reading + '</strong></p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Times entered', String(nums.length)],
    ['Total minutes', snum(totalMin, 4)],
    ['Total hours', snum(totalMin / 60, 4)],
    ['Total seconds', snum(seconds, 2)],
    ['As shown above', reading]
  ]));
  ctx.addHtml('<p class="calc-note">Every box is read as a number of minutes, and the boxes you leave empty '
    + 'are simply not added — only one of them has to be filled. The picker decides how the total is written: '
    + 'a single unit, or a mixed reading where each part rolls over at the size of the unit above it (60 '
    + 'seconds to a minute, 60 minutes to an hour, 24 hours to a day). A month here is 30 days and a year 365, '
    + 'so a total of "months" is an average length, not a calendar span.</p>');
});

var AM_NAME = {0: 'ms', 1: 's', 2: 'min', 3: 'h', 4: 'days', 5: 'weeks', 6: 'months', 7: 'years'};
JS,
];
