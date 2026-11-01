<?php
/**
 * Lost Wages Assistance (LWA) — the $300 federal top-up and the state match.
 *
 * The page had no form. The repair adds the arithmetic the programme used:
 *
 *   LWA a week    = $300 federal + $100 state match (if the state paid one)
 *   LWA in total  = LWA a week × weeks certified
 *
 * LWA ran for six weeks and was paid on top of the state's own weekly benefit,
 * so the two are shown side by side rather than merged into one figure.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'weekly_benefit' => ['type' => 'numerical'],
        'weeks' => ['type' => 'numerical'],
        'state_match' => ['type' => 'valueSelect'],
        'lwa_week' => sup_dep('0'),
        'lwa_total' => sup_dep('0'),
        'benefit_total' => sup_dep('0'),
        'combined_week' => sup_dep('0'),
        'combined_total' => sup_dep('0'),
        'replacement' => sup_dep('1'),
    ],
    'groups' => [
        sup_group('supp-lwa-benefit', 'Your benefit', [
            sup_field(sup_num('weekly_benefit', 'State weekly benefit ($)')),
            sup_field(sup_num('weeks', 'Weeks you were certified for LWA (up to 6)')),
            sup_field(sup_sel('state_match', 'Did your state pay the $100 match?', [
                ['lwa-match-yes', 'Yes — $400 a week in all', '1'],
                ['lwa-match-no', 'No — $300 a week', '0'],
            ], 'LWA state match', 'RADIO')),
        ]),
        sup_group('supp-lwa-results', 'Results', [
            sup_field(sup_out('lwa_week', 'Lost Wages Assistance a week ($)')),
            sup_field(sup_out('lwa_total', 'Lost Wages Assistance in total ($)')),
            sup_field(sup_out('benefit_total', 'State benefit over the same weeks ($)')),
            sup_field(sup_out('combined_week', 'Everything, a week ($)')),
            sup_field(sup_out('combined_total', 'Everything, over the weeks ($)')),
            sup_field(sup_out('replacement', 'Top-up as a share of the state benefit (%)')),
        ]),
    ],
    'datasets' => sup_datasets(),
    'js' => <<<'JS'
function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

/* the text of the option chosen in a picker, whether it is a select or radios */
function chosenText(name) {
  var sel = document.querySelector('select[data-var="' + name + '"]');
  if (sel && sel.selectedIndex >= 0) { return (sel.options[sel.selectedIndex].text || '').trim(); }
  var r = document.querySelector('input[type="radio"][name="' + name + '"]:checked');
  if (r) {
    var host = r.closest('label') || r.parentNode;
    return (host.innerText || host.textContent || '').replace(/\s+/g, ' ').trim();
  }
  return '';
}

function money(x) { return '$' + Math.round(x).toLocaleString(); }

omni.onResult(['weekly_benefit', 'weeks', 'state_match'], function (ctx, v) {
  var benefit = num('weekly_benefit');
  var weeks = num('weeks');
  var answer = chosenText('state_match');
  var match = answer === '' ? null : (answer.charAt(0).toUpperCase() === 'Y' ? '1' : '0');

  if (benefit === null || benefit < 0) {
    ctx.addUnmetCondition('Enter your state weekly benefit.');
    return;
  }
  if (weeks === null || weeks <= 0 || weeks > 6) {
    ctx.addUnmetCondition('Enter between 1 and 6 weeks — LWA ran for six.');
    return;
  }
  if (match === null || match === '') {
    ctx.addUnmetCondition('Say whether your state paid the $100 match.');
    return;
  }

  var weekly = 300 + (String(match) === '1' ? 100 : 0);
  var lwaTotal = weekly * weeks;
  var benefitTotal = benefit * weeks;
  var combinedWeek = benefit + weekly;

  ctx.exportValue('lwa_week', weekly);
  ctx.exportValue('lwa_total', Math.round(lwaTotal));
  ctx.exportValue('benefit_total', Math.round(benefitTotal));
  ctx.exportValue('combined_week', Math.round(combinedWeek));
  ctx.exportValue('combined_total', Math.round(benefitTotal + lwaTotal));
  ctx.exportValue('replacement', benefit > 0 ? sround(weekly / benefit * 100, 1) : 0);

  ctx.addHtml('<p><strong>LWA paid ' + money(weekly) + ' a week on top of ' + money(benefit)
    + ' of state benefit: ' + money(combinedWeek) + ' a week for ' + snum(weeks, 0) + ' weeks is '
    + money(benefitTotal + lwaTotal) + ', of which ' + money(lwaTotal) + ' is the federal money.</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['State weekly benefit', money(benefit)],
    ['Federal LWA', '$300 a week'],
    ['State match', String(match) === '1' ? '$100 a week' : 'none'],
    ['LWA a week', money(weekly)],
    ['Weeks', snum(weeks, 0)],
    ['LWA in total', money(lwaTotal)],
    ['State benefit in total', money(benefitTotal)],
    ['Combined a week', money(combinedWeek)],
    ['Combined in total', money(benefitTotal + lwaTotal)],
    ['Top-up as a share of the state benefit', (benefit > 0 ? snum(weekly / benefit * 100, 1) : '—') + ' %'],
    ['Maximum LWA over the full six weeks', money(weekly * 6)]
  ]));

  var rows = [1, 2, 4, 6].map(function (w) {
    return [w + ' week' + (w === 1 ? '' : 's'), money(weekly * w), money(benefit * w),
      money((weekly + benefit) * w)];
  });
  ctx.addHtml('<p>If you were certified for a different number of weeks:</p>');
  ctx.addHtml(stable(['Weeks', 'LWA', 'State benefit', 'Together'], rows));

  ctx.addHtml('<p class="calc-unmet">Lost Wages Assistance was a fixed $300 a week from FEMA, with states '
    + 'that chose to add $100 of their own. It was not a percentage of your old wage and it did not depend '
    + 'on the size of your state benefit — a person on $180 a week and a person on $500 a week received the '
    + 'same $300. It ran for six weeks in the second half of 2020, covering weeks of unemployment that fell '
    + 'between the start of August and early September depending on the state, and it required the claimant '
    + 'to certify that the unemployment was caused by the pandemic. Money paid under LWA was taxable as '
    + 'federal income but is shown here gross, before any withholding. It has ended; nothing here is '
    + 'claimable now, and no later federal programme used exactly these terms.</p>');
});
JS,
];
