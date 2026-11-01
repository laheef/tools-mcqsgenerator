<?php
/**
 * Standard deviation of grouped data.
 *
 * Each range contributes its midpoint and its frequency; the mean is the
 * frequency-weighted mean of those midpoints and the variance is the weighted
 * mean of the squared deviations.
 */
return [
    'vars' => [
        'total_frequency' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'grouped_mean' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'grouped_sd_sample' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'grouped_sd_population' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'total_frequency', 'vt' => 'dependent',
                       'l' => 'Total frequency (n)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'grouped_mean', 'vt' => 'dependent', 'l' => 'Mean']]]],
            ['FR1', [[['t' => 'v', 'n' => 'grouped_sd_sample', 'vt' => 'dependent',
                       'l' => 'Standard deviation (sample)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'grouped_sd_population', 'vt' => 'dependent',
                       'l' => 'Standard deviation (population)']]]],
        ],
    ]],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var rows = [], n = 0, sumFX = 0;
  for (var i = 1; i <= 25; i++) {
    var lo = Number(v['r' + i]), hi = Number(v['r' + i + 'max']), f = Number(v['f' + i]);
    var hasLo = v['r' + i] !== undefined && v['r' + i] !== '';
    var hasHi = v['r' + i + 'max'] !== undefined && v['r' + i + 'max'] !== '';
    if (!hasLo || !hasHi || !isFinite(lo) || !isFinite(hi)) continue;
    if (!isFinite(f) || f <= 0) continue;
    var mid = (lo + hi) / 2;
    rows.push({ lo: lo, hi: hi, mid: mid, f: f });
    n += f;
    sumFX += f * mid;
  }
  if (!rows.length) {
    ctx.addUnmetCondition('Enter the minimum, maximum and frequency of at least one range.');
    return;
  }
  var mean = sumFX / n;
  var sumFD2 = rows.reduce(function (acc, r) {
    return acc + r.f * Math.pow(r.mid - mean, 2);
  }, 0);
  var varSample = n > 1 ? sumFD2 / (n - 1) : 0;
  var varPop = sumFD2 / n;

  ctx.exportValue('total_frequency', n);
  ctx.exportValue('grouped_mean', sround(mean, 4));
  ctx.exportValue('grouped_sd_sample', sround(Math.sqrt(varSample), 4));
  ctx.exportValue('grouped_sd_population', sround(Math.sqrt(varPop), 4));

  var body = rows.map(function (r) {
    return [snum(r.lo, 4) + ' – ' + snum(r.hi, 4), snum(r.mid, 4), snum(r.f, 0),
            snum(r.f * r.mid, 4), snum(r.f * Math.pow(r.mid - mean, 2), 4)];
  });
  ctx.addHtml(stable(['Range', 'Midpoint', 'Frequency', 'f · x', 'f · (x − mean)²'], body,
    ['Total', '', snum(n, 0), snum(sumFX, 4), snum(sumFD2, 4)]));
  ctx.addHtml('<p class="calc-unmet">Mean = ' + snum(mean, 4) + ', sample SD = '
    + snum(Math.sqrt(varSample), 4) + ', population SD = ' + snum(Math.sqrt(varPop), 4) + '.</p>');
});
JS,
];
