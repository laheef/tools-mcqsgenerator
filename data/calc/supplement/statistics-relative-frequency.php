<?php
/**
 * Relative frequency table.
 *
 * Ungrouped: each distinct value, how often it occurs, and that count over the
 * sample size. Grouped: the same for class intervals built from the starting
 * value and the group size. Cumulative mode adds the counts up as it goes.
 */
return [
    'vars' => [
        'sample_count' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'modal_value' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'sample_count', 'vt' => 'dependent',
                       'l' => 'Numbers in the sample']]]],
            ['FR1', [[['t' => 'v', 'n' => 'modal_value', 'vt' => 'dependent',
                       'l' => 'Highest relative frequency']]]],
        ],
    ]],
    'showIf' => [
        'n_1' => 'sample_size >= 1',
        'n_2' => 'sample_size >= 2',
        'n_3' => 'sample_size >= 3',
        'n_4' => 'sample_size >= 4',
        'n_5' => 'sample_size >= 5',
        'n_6' => 'sample_size >= 6',
        'n_7' => 'sample_size >= 7',
        'n_8' => 'sample_size >= 8',
        'n_9' => 'sample_size >= 9',
        'n_10' => 'sample_size >= 10',
        'n_11' => 'sample_size >= 11',
        'n_12' => 'sample_size >= 12',
        'n_13' => 'sample_size >= 13',
        'n_14' => 'sample_size >= 14',
        'n_15' => 'sample_size >= 15',
        'n_16' => 'sample_size >= 16',
        'n_17' => 'sample_size >= 17',
        'n_18' => 'sample_size >= 18',
        'n_19' => 'sample_size >= 19',
        'n_20' => 'sample_size >= 20',
        'n_21' => 'sample_size >= 21',
        'n_22' => 'sample_size >= 22',
        'n_23' => 'sample_size >= 23',
        'n_24' => 'sample_size >= 24',
        'n_25' => 'sample_size >= 25',
        'n_26' => 'sample_size >= 26',
        'n_27' => 'sample_size >= 27',
        'n_28' => 'sample_size >= 28',
        'n_29' => 'sample_size >= 29',
        'n_30' => 'sample_size >= 30',
        'n_31' => 'sample_size >= 31',
        'n_32' => 'sample_size >= 32',
        'n_33' => 'sample_size >= 33',
        'n_34' => 'sample_size >= 34',
        'n_35' => 'sample_size >= 35',
        'n_36' => 'sample_size >= 36',
        'n_37' => 'sample_size >= 37',
        'n_38' => 'sample_size >= 38',
        'n_39' => 'sample_size >= 39',
        'n_40' => 'sample_size >= 40',
        'n_41' => 'sample_size >= 41',
        'n_42' => 'sample_size >= 42',
        'n_43' => 'sample_size >= 43',
        'n_44' => 'sample_size >= 44',
        'n_45' => 'sample_size >= 45',
        'n_46' => 'sample_size >= 46',
        'n_47' => 'sample_size >= 47',
        'n_48' => 'sample_size >= 48',
        'n_49' => 'sample_size >= 49',
        'n_50' => 'sample_size >= 50',
        'starting_value' => 'relative_frequency_type == 0',
        'group_size' => 'relative_frequency_type == 0',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var nums = snumbers(v, 'n_%d', 50).map(function (o) { return o.n; });
  if (!nums.length) {
    ctx.addUnmetCondition('Enter at least one number.');
    return;
  }
  var grouped = String(v.relative_frequency_type) === '0';
  var cumulative = String(v.graph) === '2';
  var start = Number(v.starting_value);
  var size = Number(v.group_size);
  if (grouped && (!isFinite(start) || !isFinite(size) || size <= 0)) {
    ctx.addUnmetCondition('For a grouped distribution, enter a starting value and a group size above zero.');
    return;
  }

  var buckets = [], index = {};
  nums.forEach(function (n) {
    var key, label;
    if (grouped) {
      var k = Math.floor((n - start) / size);
      key = 'g' + k;
      label = snum(start + k * size, 4) + ' – ' + snum(start + (k + 1) * size, 4);
    } else {
      key = 'v' + n;
      label = snum(n, 4);
    }
    if (!(key in index)) { index[key] = buckets.length; buckets.push({ label: label, n: 0, sort: grouped ? 0 : n }); }
    buckets[index[key]].n++;
  });
  if (grouped) buckets.sort(function (a, b) { return parseFloat(a.label) - parseFloat(b.label); });
  else buckets.sort(function (a, b) { return a.sort - b.sort; });

  var total = nums.length;
  ctx.exportValue('sample_count', total);
  var best = buckets.reduce(function (a, b) { return b.n > a.n ? b : a; }, buckets[0]);
  ctx.exportValue('modal_value', sround(best.n / total, 4));

  var running = 0, rows = [];
  buckets.forEach(function (b) {
    running += b.n;
    var shown = cumulative ? running : b.n;
    rows.push([b.label, snum(shown, 0), snum(shown / total, 4), snum(shown / total * 100, 2) + ' %']);
  });
  var head = ['Value', cumulative ? 'Cumulative frequency' : 'Frequency', 'Relative frequency', 'Percentage'];
  if (grouped) head[0] = 'Class';
  ctx.addHtml(stable(head, rows, ['Total', snum(cumulative ? total : total, 0), '1', '100 %']));
  ctx.addHtml('<p class="calc-unmet">' + total + ' numbers, ' + buckets.length + ' '
    + (grouped ? 'classes' : 'distinct values') + '. The most frequent one is '
    + best.label + ' with a relative frequency of ' + snum(best.n / total, 4) + '.</p>');
});
JS,
];
