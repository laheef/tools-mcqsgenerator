<?php
/**
 * Unemployment benefit — CARES Act: the state cheque plus the $600 federal top-up.
 *
 * The page had no form. The repair adds the two streams the Act created:
 *
 *   a week   = state weekly benefit + $600 Federal Pandemic Unemployment Compensation
 *   in total = that week × weeks claimed
 *
 * The two are kept apart as well as added, because only the state part is the
 * insurance benefit — the $600 was a flat federal supplement to anyone eligible.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'weekly_benefit' => ['type' => 'numerical'],
        'weeks' => ['type' => 'numerical'],
        'fpuc_week' => ['type' => 'numerical'],
        'car_week' => sup_dep('0'),
        'car_state_total' => sup_dep('0'),
        'car_fpuc_total' => sup_dep('0'),
        'car_total' => sup_dep('0'),
        'car_uplift' => sup_dep('1'),
        'car_monthly' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-cares-benefit', 'Your benefit', [
            sup_field(sup_num('weekly_benefit', 'State weekly benefit ($)')),
            sup_field(sup_num('weeks', 'Weeks you claim (1 to 39)')),
            sup_field(sup_num('fpuc_week', 'Federal top-up a week ($600 under the CARES Act)')),
        ]),
        sup_group('supp-cares-results', 'Results', [
            sup_field(sup_out('car_week', 'A week, both streams ($)')),
            sup_field(sup_out('car_monthly', 'A month at 4.33 weeks ($)')),
            sup_field(sup_out('car_state_total', 'State benefit in total ($)')),
            sup_field(sup_out('car_fpuc_total', 'Federal top-up in total ($)')),
            sup_field(sup_out('car_total', 'Everything ($)')),
            sup_field(sup_out('car_uplift', 'Top-up as a share of the state benefit (%)')),
        ]),
    ],
    'js' => <<<'JS'
function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : false;
}

function money(x) { return '$' + Math.round(x).toLocaleString(); }

omni.onResult(['weekly_benefit', 'weeks', 'fpuc_week'], function (ctx, v) {
  var benefit = num('weekly_benefit');
  var weeks = num('weeks');
  var fpuc = num('fpuc_week');

  if (benefit === null || benefit < 0) {
    ctx.addUnmetCondition('Enter your state weekly benefit.');
    return;
  }
  if (weeks === null || weeks <= 0 || weeks > 39) {
    ctx.addUnmetCondition('Enter between 1 and 39 weeks.');
    return;
  }
  if (fpuc === null || fpuc < 0) {
    ctx.addUnmetCondition('Enter the federal top-up a week — $600 under the CARES Act.');
    return;
  }

  var week = benefit + fpuc;
  var stateTotal = benefit * weeks;
  var fpucTotal = fpuc * weeks;

  ctx.exportValue('car_week', Math.round(week));
  ctx.exportValue('car_monthly', Math.round(week * 4.33));
  ctx.exportValue('car_state_total', Math.round(stateTotal));
  ctx.exportValue('car_fpuc_total', Math.round(fpucTotal));
  ctx.exportValue('car_total', Math.round(stateTotal + fpucTotal));
  ctx.exportValue('car_uplift', benefit > 0 ? sround(fpuc / benefit * 100, 1) : 0);

  ctx.addHtml('<p><strong>' + money(benefit) + ' of state benefit plus ' + money(fpuc)
    + ' of federal money is ' + money(week) + ' a week — ' + money(stateTotal + fpucTotal) + ' over '
    + snum(weeks, 0) + ' weeks.</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['State weekly benefit', money(benefit)],
    ['Federal top-up (FPUC)', money(fpuc) + ' a week'],
    ['A week in all', money(week)],
    ['A fortnight', money(week * 2)],
    ['A month (4.33 weeks)', money(week * 4.33)],
    ['Weeks claimed', snum(weeks, 0)],
    ['From the state', money(stateTotal)],
    ['From the federal top-up', money(fpucTotal)],
    ['In total', money(stateTotal + fpucTotal)],
    ['Top-up as a share of the state benefit', (benefit > 0 ? snum(fpuc / benefit * 100, 1) : '—') + ' %'],
    ['State benefit replacement of a $600-a-week job', snum(benefit / 600 * 100, 1) + ' % of $600']
  ]));

  var rows = [1, 4, 13, 26, 39].map(function (w) {
    return [w + ' week' + (w === 1 ? '' : 's'), money(benefit * w), money(fpuc * w),
      money((benefit + fpuc) * w)];
  });
  ctx.addHtml('<p>The same week over other lengths of claim:</p>');
  ctx.addHtml(stable(['Weeks', 'State benefit', 'Federal top-up', 'Together'], rows));

  ctx.addHtml('<p class="calc-unmet">The Federal Pandemic Unemployment Compensation was $600 a week for '
    + 'everyone eligible for any state or federal unemployment payment, decided nationally rather than per '
    + 'state — so the state column is the one that varies. It ran from the end of March 2020 to the end of '
    + 'July 2020; a claim that straddled that date received $600 for the weeks up to the cut-off and the '
    + 'state amount alone afterwards, which this single figure cannot show. Everything here is gross: '
    + 'federal income tax may be withheld at 10 % if you asked for it, and some states withhold their own. '
    + 'The $600 was not charged against the state’s trust fund and did not shorten the 39 weeks of regular '
    + 'benefit that sit underneath it. Pandemic Emergency Unemployment Compensation, the 13 extra weeks, is '
    + 'a separate programme and is not counted here.</p>');
});
JS,
];
