<?php
/**
 * Benford's law — do the leading digits of this sample follow it?
 *
 * Benford's law says a digit d leads with probability log10(1 + 1/d), which is
 * about 30 % for 1 and under 5 % for 9. The test here compares the observed
 * counts with that, reports the chi-square statistic and the mean absolute
 * deviation (the usual "close enough" measure, under 0.015 for a good fit).
 */
return [
    'vars' => [
        'sample_size' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'chi_square' => ['type' => 'dependent', 'rnd' => ['standard', '3']],
        'mean_absolute_deviation' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'sample_size', 'vt' => 'dependent',
                       'l' => 'Numbers in the sample']]]],
            ['FR1', [[['t' => 'v', 'n' => 'chi_square', 'vt' => 'dependent',
                       'l' => 'Chi-square statistic (8 degrees of freedom)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'mean_absolute_deviation', 'vt' => 'dependent',
                       'l' => 'Mean absolute deviation']]]],
        ],
    ]],
    'showIf' => [
        'a0' => 'numbers >= 1',
        'a1' => 'numbers >= 2',
        'a2' => 'numbers >= 3',
        'a3' => 'numbers >= 4',
        'a4' => 'numbers >= 5',
        'a5' => 'numbers >= 6',
        'a6' => 'numbers >= 7',
        'a7' => 'numbers >= 8',
        'a8' => 'numbers >= 9',
        'a9' => 'numbers >= 10',
        'a10' => 'numbers >= 11',
        'a11' => 'numbers >= 12',
        'a12' => 'numbers >= 13',
        'a13' => 'numbers >= 14',
        'a14' => 'numbers >= 15',
        'a15' => 'numbers >= 16',
        'a16' => 'numbers >= 17',
        'a17' => 'numbers >= 18',
        'a18' => 'numbers >= 19',
        'a19' => 'numbers >= 20',
        'a20' => 'numbers >= 21',
        'a21' => 'numbers >= 22',
        'a22' => 'numbers >= 23',
        'a23' => 'numbers >= 24',
        'a24' => 'numbers >= 25',
        'a25' => 'numbers >= 26',
        'a26' => 'numbers >= 27',
        'a27' => 'numbers >= 28',
        'a28' => 'numbers >= 29',
        'a29' => 'numbers >= 30',
        'a30' => 'numbers >= 31',
        'a31' => 'numbers >= 32',
        'a32' => 'numbers >= 33',
        'a33' => 'numbers >= 34',
        'a34' => 'numbers >= 35',
        'a35' => 'numbers >= 36',
        'a36' => 'numbers >= 37',
        'a37' => 'numbers >= 38',
        'a38' => 'numbers >= 39',
        'a39' => 'numbers >= 40',
        'a40' => 'numbers >= 41',
        'a41' => 'numbers >= 42',
        'a42' => 'numbers >= 43',
        'a43' => 'numbers >= 44',
        'a44' => 'numbers >= 45',
        'a45' => 'numbers >= 46',
        'a46' => 'numbers >= 47',
        'a47' => 'numbers >= 48',
        'a48' => 'numbers >= 49',
        'a49' => 'numbers >= 50',
        'b0' => 'model == 2',
        'b1' => 'model == 2',
        'b2' => 'model == 2',
        'b3' => 'model == 2',
        'b4' => 'model == 2',
        'b5' => 'model == 2',
        'b6' => 'model == 2',
        'b7' => 'model == 2',
        'b8' => 'model == 2',
        'a0' => 'model != 2',
        'a1' => 'model != 2',
        'a2' => 'model != 2',
        'a3' => 'model != 2',
        'a4' => 'model != 2',
        'a5' => 'model != 2',
        'a6' => 'model != 2',
        'a7' => 'model != 2',
        'a8' => 'model != 2',
        'a9' => 'model != 2',
        'a10' => 'model != 2',
        'a11' => 'model != 2',
        'a12' => 'model != 2',
        'a13' => 'model != 2',
        'a14' => 'model != 2',
        'a15' => 'model != 2',
        'a16' => 'model != 2',
        'a17' => 'model != 2',
        'a18' => 'model != 2',
        'a19' => 'model != 2',
        'a20' => 'model != 2',
        'a21' => 'model != 2',
        'a22' => 'model != 2',
        'a23' => 'model != 2',
        'a24' => 'model != 2',
        'a25' => 'model != 2',
        'a26' => 'model != 2',
        'a27' => 'model != 2',
        'a28' => 'model != 2',
        'a29' => 'model != 2',
        'a30' => 'model != 2',
        'a31' => 'model != 2',
        'a32' => 'model != 2',
        'a33' => 'model != 2',
        'a34' => 'model != 2',
        'a35' => 'model != 2',
        'a36' => 'model != 2',
        'a37' => 'model != 2',
        'a38' => 'model != 2',
        'a39' => 'model != 2',
        'a40' => 'model != 2',
        'a41' => 'model != 2',
        'a42' => 'model != 2',
        'a43' => 'model != 2',
        'a44' => 'model != 2',
        'a45' => 'model != 2',
        'a46' => 'model != 2',
        'a47' => 'model != 2',
        'a48' => 'model != 2',
        'a49' => 'model != 2',
    ],
    'js' => <<<'JS'
function leadingDigit(raw) {
  var s = String(raw).trim().replace(/^[−-]/, '').replace(/[^0-9.eE]/g, '');
  if (s === '') return null;
  var n = Math.abs(Number(s));
  if (!isFinite(n) || n === 0) return null;
  var mantissa = n / Math.pow(10, Math.floor(Math.log10(n)));
  var d = Math.floor(mantissa + 1e-9);
  return d >= 1 && d <= 9 ? d : null;
}

omni.onResult([], function (ctx, v) {
  var counts = [0, 0, 0, 0, 0, 0, 0, 0, 0];   // index 0 = digit 1
  var total = 0, model = Number(v.model);
  if (model === 2) {
    for (var i = 0; i < 9; i++) {
      var c = Number(v['b' + i]);
      if (!isFinite(c) || c < 0) continue;
      counts[i] = c;
      total += c;
    }
  } else {
    for (var j = 0; j < 50; j++) {
      var raw = v['a' + j];
      if (raw === undefined || raw === null || raw === '') continue;
      var d = leadingDigit(raw);
      if (d === null) continue;
      counts[d - 1]++;
      total++;
    }
  }
  if (total === 0) {
    ctx.addUnmetCondition(model === 2
      ? 'Enter how many numbers start with each digit.'
      : 'Enter the numbers you want to test.');
    return;
  }

  var chi = 0, mad = 0, rows = [];
  for (var d2 = 1; d2 <= 9; d2++) {
    var expected = Math.log10(1 + 1 / d2);
    var observed = counts[d2 - 1] / total;
    chi += Math.pow(counts[d2 - 1] - expected * total, 2) / (expected * total);
    mad += Math.abs(observed - expected);
    rows.push([String(d2), String(counts[d2 - 1]),
               snum(observed * 100, 2) + ' %', snum(expected * 100, 2) + ' %',
               snum((observed - expected) * 100, 2)]);
  }
  mad /= 9;

  ctx.exportValue('sample_size', total);
  ctx.exportValue('chi_square', sround(chi, 3));
  ctx.exportValue('mean_absolute_deviation', sround(mad, 4));

  ctx.addHtml(stable(['Leading digit', 'Count', 'Observed', 'Expected by Benford', 'Gap (p.p.)'], rows,
    ['Total', String(total), '100 %', '100 %', '']));
  var verdict = mad < 0.006 ? 'a close fit' : (mad < 0.015 ? 'a reasonable fit' : 'not a good fit');
  ctx.addHtml('<p class="calc-unmet">Mean absolute deviation ' + snum(mad, 4) + ' — ' + verdict
    + '. Chi-square ' + snum(chi, 3) + ' with 8 degrees of freedom; the 5 % critical value is 15.51.</p>');
});
JS,
];
