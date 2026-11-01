<?php
/**
 * Ordering numbers — sort the list, then read the summary off it.
 *
 * Ascending or descending, plus the count, smallest, largest, median, mean and
 * range, which is what the ordering answer is actually used for.
 */
return [
    'vars' => [
        'count' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'smallest' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'largest' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'median' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'mean' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'count', 'vt' => 'dependent', 'l' => 'How many numbers']]]],
            ['FR1', [[['t' => 'v', 'n' => 'smallest', 'vt' => 'dependent', 'l' => 'Smallest']]]],
            ['FR1', [[['t' => 'v', 'n' => 'largest', 'vt' => 'dependent', 'l' => 'Largest']]]],
            ['FR1', [[['t' => 'v', 'n' => 'median', 'vt' => 'dependent', 'l' => 'Median']]]],
            ['FR1', [[['t' => 'v', 'n' => 'mean', 'vt' => 'dependent', 'l' => 'Mean']]]],
        ],
    ]],
    'showIf' => [
        'course_1' => 'how_many >= 1',
        'course_2' => 'how_many >= 2',
        'course_3' => 'how_many >= 3',
        'course_4' => 'how_many >= 4',
        'course_5' => 'how_many >= 5',
        'course_6' => 'how_many >= 6',
        'course_7' => 'how_many >= 7',
        'course_8' => 'how_many >= 8',
        'course_9' => 'how_many >= 9',
        'course_10' => 'how_many >= 10',
        'course_11' => 'how_many >= 11',
        'course_12' => 'how_many >= 12',
        'course_13' => 'how_many >= 13',
        'course_14' => 'how_many >= 14',
        'course_15' => 'how_many >= 15',
        'course_16' => 'how_many >= 16',
        'course_17' => 'how_many >= 17',
        'course_18' => 'how_many >= 18',
        'course_19' => 'how_many >= 19',
        'course_20' => 'how_many >= 20',
        'course_21' => 'how_many >= 21',
        'course_22' => 'how_many >= 22',
        'course_23' => 'how_many >= 23',
        'course_24' => 'how_many >= 24',
        'course_25' => 'how_many >= 25',
        'course_26' => 'how_many >= 26',
        'course_27' => 'how_many >= 27',
        'course_28' => 'how_many >= 28',
        'course_29' => 'how_many >= 29',
        'course_30' => 'how_many >= 30',
        'course_31' => 'how_many >= 31',
        'course_32' => 'how_many >= 32',
        'course_33' => 'how_many >= 33',
        'course_34' => 'how_many >= 34',
        'course_35' => 'how_many >= 35',
        'course_36' => 'how_many >= 36',
        'course_37' => 'how_many >= 37',
        'course_38' => 'how_many >= 38',
        'course_39' => 'how_many >= 39',
        'course_40' => 'how_many >= 40',
        'course_41' => 'how_many >= 41',
        'course_42' => 'how_many >= 42',
        'course_43' => 'how_many >= 43',
        'course_44' => 'how_many >= 44',
        'course_45' => 'how_many >= 45',
        'course_46' => 'how_many >= 46',
        'course_47' => 'how_many >= 47',
        'course_48' => 'how_many >= 48',
        'course_49' => 'how_many >= 49',
        'course_50' => 'how_many >= 50',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var nums = snumbers(v, 'course_%d', 50).map(function (o) { return o.n; });
  if (!nums.length) {
    ctx.addUnmetCondition('Enter at least two numbers to order.');
    return;
  }
  var descending = String(v.order) === '2';
  var sorted = nums.slice().sort(function (a, b) { return a - b; });
  var shown = descending ? sorted.slice().reverse() : sorted;
  var n = sorted.length;
  var mid = n % 2 ? sorted[(n - 1) / 2] : (sorted[n / 2 - 1] + sorted[n / 2]) / 2;
  var sum = sorted.reduce(function (a, b) { return a + b; }, 0);

  ctx.exportValue('count', n);
  ctx.exportValue('smallest', sround(sorted[0], 4));
  ctx.exportValue('largest', sround(sorted[n - 1], 4));
  ctx.exportValue('median', sround(mid, 4));
  ctx.exportValue('mean', sround(sum / n, 4));

  ctx.addHtml('<p><strong>' + (descending ? 'Descending' : 'Ascending') + ':</strong> '
    + shown.map(function (x) { return snum(x, 4); }).join(', ') + '</p>');
  ctx.addHtml(stable(['Summary', 'Value'], [
    ['How many numbers', snum(n, 0)],
    ['Smallest', snum(sorted[0], 4)],
    ['Largest', snum(sorted[n - 1], 4)],
    ['Median', snum(mid, 4)],
    ['Mean', snum(sum / n, 4)],
    ['Range', snum(sorted[n - 1] - sorted[0], 4)],
  ]));
});
JS,
];
