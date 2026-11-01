<?php
/**
 * Grade curve.
 *
 * Four schemes, each applied to the whole class and then checked against the
 * highest possible grade:
 *
 *   linear, to the highest   add (max − highest score) to everybody
 *   linear, fixed points     add the same number of points to everybody
 *   linear, target mean      add (target mean − current mean)
 *   ratios                   multiply by highest ÷ best score
 *   bell curve               standardise, then re-centre on the target mean
 *   square root              √g × k, with k chosen by the chosen option
 *
 * Every curved grade is clipped to 0…highest, so no scheme invents a 104 %.
 */
return [
    'vars' => [
        'class_mean' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'class_mean_after' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'class_sd' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'students' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'students', 'vt' => 'dependent', 'l' => 'Students graded']]]],
            ['FR1', [[['t' => 'v', 'n' => 'class_mean', 'vt' => 'dependent', 'l' => 'Class mean, as entered']]]],
            ['FR1', [[['t' => 'v', 'n' => 'class_mean_after', 'vt' => 'dependent', 'l' => 'Class mean after curving']]]],
            ['FR1', [[['t' => 'v', 'n' => 'class_sd', 'vt' => 'dependent', 'l' => 'Standard deviation, as entered']]]],
        ],
    ]],
    'showIf' => [
        'linear_scale_option_VS' => 'method_VS == 1',
        'linear_scale_extra_points' => 'method_VS == 1 and linear_scale_option_VS == 2',
        'linear_scale_mean' => 'method_VS == 1 and linear_scale_option_VS == 3',
        'bell_curve_mean' => 'method_VS == 3',
        'bell_curve_std_dev' => 'method_VS == 3',
        'square_root_option_VS' => 'method_VS == 4',
        'square_root_multiplier' => 'method_VS == 4 and square_root_option_VS == 1',
        'highest_grade' => 'method_VS != 3',
        'grade2' => 'hasValue(grade1)',
        'grade3' => 'hasValue(grade2)',
        'grade4' => 'hasValue(grade3)',
        'grade5' => 'hasValue(grade4)',
        'grade6' => 'hasValue(grade5)',
        'grade7' => 'hasValue(grade6)',
        'grade8' => 'hasValue(grade7)',
        'grade9' => 'hasValue(grade8)',
        'grade10' => 'hasValue(grade9)',
        'grade11' => 'hasValue(grade10)',
        'grade12' => 'hasValue(grade11)',
        'grade13' => 'hasValue(grade12)',
        'grade14' => 'hasValue(grade13)',
        'grade15' => 'hasValue(grade14)',
        'grade16' => 'hasValue(grade15)',
        'grade17' => 'hasValue(grade16)',
        'grade18' => 'hasValue(grade17)',
        'grade19' => 'hasValue(grade18)',
        'grade20' => 'hasValue(grade19)',
        'grade21' => 'hasValue(grade20)',
        'grade22' => 'hasValue(grade21)',
        'grade23' => 'hasValue(grade22)',
        'grade24' => 'hasValue(grade23)',
        'grade25' => 'hasValue(grade24)',
        'grade26' => 'hasValue(grade25)',
        'grade27' => 'hasValue(grade26)',
        'grade28' => 'hasValue(grade27)',
        'grade29' => 'hasValue(grade28)',
        'grade30' => 'hasValue(grade29)',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var grades = [];
  for (var i = 1; i <= 30; i++) {
    var raw = v['grade' + i];
    if (raw === undefined || raw === null || raw === '') continue;
    var g = Number(raw);
    if (!isFinite(g)) continue;
    grades.push(g);
  }
  if (!grades.length) {
    ctx.addUnmetCondition('Enter at least one grade.');
    return;
  }
  var n = grades.length;
  var mean = grades.reduce(function (a, b) { return a + b; }, 0) / n;
  var sd = Math.sqrt(grades.reduce(function (a, g) { return a + Math.pow(g - mean, 2); }, 0) / n);
  var max = Math.max.apply(null, grades);
  var top = Number(v.highest_grade);
  if (!isFinite(top) || top <= 0) top = 100;

  var method = Number(v.method_VS);
  var curved, description;

  if (method === 1) {
    var option = Number(v.linear_scale_option_VS);
    if (option === 2) {
      var extra = Number(v.linear_scale_extra_points);
      if (!isFinite(extra)) { ctx.addUnmetCondition('Enter how many points to add.'); return; }
      curved = grades.map(function (g) { return g + extra; });
      description = 'adding ' + snum(extra, 2) + ' points to every grade';
    } else if (option === 3) {
      var target = Number(v.linear_scale_mean);
      if (!isFinite(target)) { ctx.addUnmetCondition('Enter the target mean grade.'); return; }
      curved = grades.map(function (g) { return g + (target - mean); });
      description = 'shifting the class so the mean becomes ' + snum(target, 2);
    } else {
      curved = grades.map(function (g) { return g + (top - max); });
      description = 'adding ' + snum(top - max, 2) + ' points, which lifts the best grade to '
        + snum(top, 2);
    }
  } else if (method === 2) {
    var k = max > 0 ? top / max : 1;
    curved = grades.map(function (g) { return g * k; });
    description = 'multiplying every grade by ' + snum(k, 4) + ' (the best grade becomes ' + snum(top, 2) + ')';
  } else if (method === 3) {
    var bmean = Number(v.bell_curve_mean), bsd = Number(v.bell_curve_std_dev);
    if (!isFinite(bmean) || !isFinite(bsd) || bsd <= 0) {
      ctx.addUnmetCondition('Enter the target mean and a standard deviation above zero.');
      return;
    }
    if (sd === 0) {
      ctx.addUnmetCondition('Every grade is the same, so there is no spread to curve into a bell shape.');
      return;
    }
    curved = grades.map(function (g) { return bmean + ((g - mean) / sd) * bsd; });
    description = 're-centring the standardised scores on a mean of ' + snum(bmean, 2)
      + ' with a standard deviation of ' + snum(bsd, 2);
  } else {
    var squareOption = Number(v.square_root_option_VS);
    if (squareOption === 1) {
      var multiplier = Number(v.square_root_multiplier);
      if (!isFinite(multiplier)) { ctx.addUnmetCondition('Enter the multiplier.'); return; }
      curved = grades.map(function (g) { return Math.sqrt(Math.max(0, g)) * multiplier; });
      description = 'taking the square root of each grade and multiplying by ' + snum(multiplier, 4);
    } else {
      var kk = max > 0 ? top / Math.sqrt(max) : 1;
      curved = grades.map(function (g) { return Math.sqrt(Math.max(0, g)) * kk; });
      description = 'taking the square root of each grade and scaling it so the best grade becomes '
        + snum(top, 2);
    }
  }

  curved = curved.map(function (g) { return Math.min(top, Math.max(0, g)); });
  var newMean = curved.reduce(function (a, b) { return a + b; }, 0) / n;

  ctx.exportValue('students', n);
  ctx.exportValue('class_mean', sround(mean, 2));
  ctx.exportValue('class_mean_after', sround(newMean, 2));
  ctx.exportValue('class_sd', sround(sd, 2));

  ctx.addHtml(stable(['Student', 'Grade', 'Curved', 'Change'],
    grades.map(function (g, idx) {
      var d = curved[idx] - g;
      return [String(idx + 1), snum(g, 2), snum(curved[idx], 2),
              (d >= 0 ? '+' : '−') + snum(Math.abs(d), 2)];
    }),
    ['Mean', snum(mean, 2), snum(newMean, 2),
     (newMean - mean >= 0 ? '+' : '−') + snum(Math.abs(newMean - mean), 2)]));
  ctx.addHtml('<p class="calc-unmet">Curved by ' + description + '. Grades are clipped to 0–'
    + snum(top, 2) + ', so nobody scores above the maximum.</p>');
});
JS,
];
