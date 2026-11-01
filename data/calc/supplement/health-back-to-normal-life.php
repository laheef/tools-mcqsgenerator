<?php
/**
 * Reopening — the four numbers a reopening decision is argued over.
 *
 * The page had no form. It now scores the four indicators public-health
 * documents used for a phased reopening, each on a 25-point scale:
 *
 *   incidence     new cases per 100,000 over 14 days   25 at ≤10, 0 at ≥200
 *   positivity    share of tests that come back positive 25 at ≤2 %, 0 at ≥10 %
 *   hospital load ICU beds occupied                    25 at ≤60 %, 0 at ≥90 %
 *   coverage      share of the population fully vaccinated 25 at ≥70 %, 0 at 0 %
 *
 * The score is the sum, out of 100. It is a way to see which of the four is
 * holding a place back — not a permission slip.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'new_cases' => ['type' => 'numerical'],
        'population' => ['type' => 'numerical'],
        'positivity' => ['type' => 'numerical'],
        'icu_use' => ['type' => 'numerical'],
        'vaccinated' => ['type' => 'numerical'],
        'reo_incidence' => sup_dep('1'),
        'reo_score' => sup_dep('0'),
        'reo_s_incidence' => sup_dep('1'),
        'reo_s_positivity' => sup_dep('1'),
        'reo_s_icu' => sup_dep('1'),
        'reo_s_vaccine' => sup_dep('1'),
        'reo_band' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-reopen-numbers', 'Your four numbers', [
            sup_field(sup_num('new_cases', 'New cases in the last 14 days')),
            sup_field(sup_num('population', 'Population of the area')),
            sup_field(sup_num('positivity', 'Share of tests that were positive (%)')),
            sup_field(sup_num('icu_use', 'ICU beds occupied (%)')),
            sup_field(sup_num('vaccinated', 'Share of people fully vaccinated (%)')),
        ]),
        sup_group('supp-reopen-results', 'Results', [
            sup_field(sup_out('reo_incidence', 'Cases per 100,000 over 14 days')),
            sup_field(sup_out('reo_s_incidence', 'Incidence points (out of 25)')),
            sup_field(sup_out('reo_s_positivity', 'Positivity points (out of 25)')),
            sup_field(sup_out('reo_s_icu', 'Hospital points (out of 25)')),
            sup_field(sup_out('reo_s_vaccine', 'Coverage points (out of 25)')),
            sup_field(sup_out('reo_score', 'Total readiness score (out of 100)')),
            sup_field(sup_out('reo_band', 'Band (4 = hold, 3 = cautious, 2 = open with care, 1 = open)')),
        ]),
    ],
    'js' => <<<'JS'
function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

/* 25 points at `good`, none at `bad`, straight line between */
function points(value, good, bad) {
  if (value <= good) { return 25; }
  if (value >= bad) { return 0; }
  return 25 * (bad - value) / (bad - good);
}

omni.onResult(['new_cases', 'population', 'positivity', 'icu_use', 'vaccinated'], function (ctx, v) {
  var cases = num('new_cases');
  var population = num('population');
  var positive = num('positivity');
  var icu = num('icu_use');
  var vaccinated = num('vaccinated');

  if (cases === null || cases < 0) {
    ctx.addUnmetCondition('Enter the number of new cases in the last 14 days.');
    return;
  }
  if (population === null || population <= 0) {
    ctx.addUnmetCondition('Enter the population of the area.');
    return;
  }
  if (positive === null || positive < 0 || positive > 100) {
    ctx.addUnmetCondition('Enter the positive test rate as a percentage, 0 to 100.');
    return;
  }
  if (icu === null || icu < 0 || icu > 100) {
    ctx.addUnmetCondition('Enter ICU occupancy as a percentage, 0 to 100.');
    return;
  }
  if (vaccinated === null || vaccinated < 0 || vaccinated > 100) {
    ctx.addUnmetCondition('Enter the share fully vaccinated as a percentage, 0 to 100.');
    return;
  }

  var incidence = cases / population * 100000;
  var sIncidence = points(incidence, 10, 200);
  var sPositive = points(positive, 2, 10);
  var sIcu = points(icu, 60, 90);
  var sVaccine = 25 * Math.min(1, vaccinated / 70);
  var total = sIncidence + sPositive + sIcu + sVaccine;
  var band = total >= 85 ? 1 : (total >= 65 ? 2 : (total >= 45 ? 3 : 4));

  ctx.exportValue('reo_incidence', sround(incidence, 1));
  ctx.exportValue('reo_s_incidence', sround(sIncidence, 1));
  ctx.exportValue('reo_s_positivity', sround(sPositive, 1));
  ctx.exportValue('reo_s_icu', sround(sIcu, 1));
  ctx.exportValue('reo_s_vaccine', sround(sVaccine, 1));
  ctx.exportValue('reo_score', sround(total, 0));
  ctx.exportValue('reo_band', band);

  var verdict = band === 1 ? 'the four indicators are all near their best — a reopening at this point is '
      + 'as well supported as the numbers can make it'
    : band === 2 ? 'most indicators are in good shape; the weakest one is worth watching for a fortnight '
      + 'before a further step'
    : band === 3 ? 'one or more indicators is only partly met — reopen the least risky things first and '
      + 'keep the rest shut'
    : 'the indicators do not support a reopening yet; the weakest of the four is the one to work on';

  ctx.addHtml('<p><strong>A readiness score of ' + snum(total, 0) + ' out of 100: ' + verdict
    + '.</strong></p>');

  /* which indicator is holding it back */
  var parts = [
    ['Incidence', incidence, sIncidence, 'cases per 100,000 over 14 days'],
    ['Test positivity', positive, sPositive, '% of tests positive'],
    ['Hospital load', icu, sIcu, '% of ICU beds occupied'],
    ['Vaccination', vaccinated, sVaccine, '% fully vaccinated']
  ];
  function names(x, u) { return snum(x, 1) + ' ' + u; }
  var worst = parts[0];
  parts.forEach(function (p) { if (p[2] < worst[2]) { worst = p; } });

  ctx.addHtml(stable(['Indicator', 'Your figure', 'Points out of 25'], parts.map(function (p) {
    return [p[0], names(p[1], p[3].replace('% ', '').replace('cases per 100,000 over 14 days', 'per 100,000')),
      snum(p[2], 1)];
  }).concat([[ '<strong>Total</strong>', '', '<strong>' + snum(total, 0) + '</strong>' ]])));

  ctx.addHtml('<p>The weakest indicator here is <strong>' + worst[0].toLowerCase()
    + '</strong>, at ' + snum(worst[2], 1) + ' of 25 points — that is the one a reopening argument has to '
    + 'answer first.</p>');

  ctx.addHtml('<p class="calc-unmet">The thresholds are the ones the published guidance used, rounded: '
    + 'roughly 10 new cases per 100,000 people over a fortnight for a low level of transmission, a test '
    + 'positivity below 2 % to believe the case count, under 60 % of ICU beds occupied to leave room for a '
    + 'surge, and 70 % of the population fully vaccinated. They are policy choices dressed as numbers and '
    + 'different agencies drew them in different places. A territory with a tiny population swings wildly: '
    + 'ten cases in a town of 20,000 is 50 per 100,000, which is a genuine signal; ten cases in a city of '
    + 'one million is 1 per 100,000, which is noise, and the formula cannot tell the two apart. Nor does it '
    + 'know anything about the variant in circulation, how fast the count is rising, or whether cases are '
    + 'concentrated in care homes. Use it to compare two places on the same day, or one place over time, '
    + 'and not as a decision on its own.</p>');
});
JS,
];
