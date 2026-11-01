<?php
/**
 * Unemployment benefit — HEALS against HEROES.
 *
 * Two bills, two top-ups, one state cheque. The page had no form; the repair
 * lays the two proposals side by side so the difference is a number:
 *
 *   HEALS   state benefit + $200 a week
 *   HEROES  state benefit + $600 a week
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'weekly_benefit' => ['type' => 'numerical'],
        'weeks' => ['type' => 'numerical'],
        'heals_week' => sup_dep('0'),
        'heroes_week' => sup_dep('0'),
        'heals_total' => sup_dep('0'),
        'heroes_total' => sup_dep('0'),
        'gap_week' => sup_dep('0'),
        'gap_total' => sup_dep('0'),
        'gap_share' => sup_dep('1'),
    ],
    'groups' => [
        sup_group('supp-heals-benefit', 'Your benefit', [
            sup_field(sup_num('weekly_benefit', 'State weekly benefit ($)')),
            sup_field(sup_num('weeks', 'Weeks you would claim')),
        ]),
        sup_group('supp-heals-results', 'Results', [
            sup_field(sup_out('heals_week', 'HEALS: a week ($)')),
            sup_field(sup_out('heroes_week', 'HEROES: a week ($)')),
            sup_field(sup_out('heals_total', 'HEALS: in total ($)')),
            sup_field(sup_out('heroes_total', 'HEROES: in total ($)')),
            sup_field(sup_out('gap_week', 'Difference a week ($)')),
            sup_field(sup_out('gap_total', 'Difference in total ($)')),
            sup_field(sup_out('gap_share', 'HEROES pays this much more (%)')),
        ]),
    ],
    'js' => <<<'JS'
function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

function money(x) { return '$' + Math.round(x).toLocaleString(); }

omni.onResult(['weekly_benefit', 'weeks'], function (ctx, v) {
  var benefit = num('weekly_benefit');
  var weeks = num('weeks');

  if (benefit === null || benefit < 0) {
    ctx.addUnmetCondition('Enter your state weekly benefit.');
    return;
  }
  if (weeks === null || weeks <= 0) {
    ctx.addUnmetCondition('Enter how many weeks you would claim.');
    return;
  }

  var healsWeek = benefit + 200;
  var heroesWeek = benefit + 600;
  var gapWeek = heroesWeek - healsWeek;

  ctx.exportValue('heals_week', Math.round(healsWeek));
  ctx.exportValue('heroes_week', Math.round(heroesWeek));
  ctx.exportValue('heals_total', Math.round(healsWeek * weeks));
  ctx.exportValue('heroes_total', Math.round(heroesWeek * weeks));
  ctx.exportValue('gap_week', Math.round(gapWeek));
  ctx.exportValue('gap_total', Math.round(gapWeek * weeks));
  ctx.exportValue('gap_share', sround(gapWeek / healsWeek * 100, 1));

  ctx.addHtml('<p><strong>On ' + money(benefit) + ' a week of state benefit, HEALS would have paid '
    + money(healsWeek) + ' a week and HEROES ' + money(heroesWeek) + ' — ' + money(gapWeek)
    + ' apart, or ' + money(gapWeek * weeks) + ' over ' + snum(weeks, 0) + ' weeks.</strong></p>');

  ctx.addHtml(stable(['Item', 'HEALS', 'HEROES'], [
    ['State benefit', money(benefit), money(benefit)],
    ['Federal top-up', '$200 a week', '$600 a week'],
    ['A week', money(healsWeek), money(heroesWeek)],
    ['A month (4.33 weeks)', money(healsWeek * 4.33), money(heroesWeek * 4.33)],
    ['Over ' + snum(weeks, 0) + ' weeks', money(healsWeek * weeks), money(heroesWeek * weeks)],
    ['Top-up as a share of the state benefit',
      (benefit > 0 ? snum(200 / benefit * 100, 1) : '—') + ' %',
      (benefit > 0 ? snum(600 / benefit * 100, 1) : '—') + ' %']
  ]));

  var rows = [4, 13, 26, 39].map(function (w) {
    return [w + ' weeks', money(healsWeek * w), money(heroesWeek * w), money(gapWeek * w)];
  });
  ctx.addHtml('<p>Over other lengths of claim:</p>');
  ctx.addHtml(stable(['Claim length', 'HEALS', 'HEROES', 'Difference'], rows));

  ctx.addHtml('<p class="calc-unmet">These are proposals, not law, and the difference between them is '
    + 'mostly the size of the federal top-up: HEALS proposed $200 a week, HEROES $600. In practice the two '
    + 'bills differed in more than that — HEALS would have phased its $200 into a wage-replacement formula '
    + 'once states had the systems to administer it, capped total benefits at a share of the lost wage, and '
    + 'tied the extension to a rehiring bonus; HEROES extended the $600 and the eviction moratorium '
    + 'outright. Neither figure here includes the separate $1,200 stimulus payment, state-level supplements '
    + 'or back-rent adjustments, and both are gross of tax. Use the comparison as an order of magnitude for '
    + 'what a weekly difference of $400 means over a claim, not as a forecast of what anyone was paid.</p>');
});
JS,
];
