<?php
/**
 * Triathlon training — how many months the plan needs.
 *
 * The page script survived with its whole answer inside it: `getMonths()` holds a
 * 4 × 3 × 3 table of months, indexed by [distance][background][goal]. Nothing
 * ever called it, so the page rendered a form, a Calculate button and no answer.
 * This repair calls the function the page already had and adds the weekly shape
 * of the plan around it.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'trainingMonths' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'weekly_hours' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'weeks' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'peak_week' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
    ],
    'groups' => [[
        'uid' => 'supp-tri-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'trainingMonths', 'vt' => 'dependent', 'l' => 'Months of training you need']]]],
            ['FR1', [[['t' => 'v', 'n' => 'weeks', 'vt' => 'dependent', 'l' => 'That is this many weeks']]]],
            ['FR1', [[['t' => 'v', 'n' => 'weekly_hours', 'vt' => 'dependent', 'l' => 'Average training hours a week']]]],
            ['FR1', [[['t' => 'v', 'n' => 'peak_week', 'vt' => 'dependent', 'l' => 'Hours in your biggest week']]]],
        ],
    ]],
    'js' => <<<'JS'
var DISTANCES = [
  { name: 'Sprint',       swim: 0.75, bike: 20,  run: 5,  label: '750 m swim, 20 km bike, 5 km run' },
  { name: 'Olympic',      swim: 1.5,  bike: 40,  run: 10, label: '1.5 km swim, 40 km bike, 10 km run' },
  { name: 'Half-Ironman', swim: 1.9,  bike: 90,  run: 21.1, label: '1.9 km swim, 90 km bike, 21.1 km run' },
  { name: 'Ironman',      swim: 3.8,  bike: 180, run: 42.2, label: '3.8 km swim, 180 km bike, 42.2 km run' }
];
/*
 * The plan table the page script came with, copied here because omni.define()
 * registers a helper for the equation engine and not in the page scope, so a
 * hook cannot call it by name. Order: [distance][background][goal].
 */
var PLAN = [
  [[3, 9, 24], [3, 6, 18], [3, 3, 3]],
  [[6, 12, 24], [4, 9, 18], [3, 3, 3]],
  [[9, 24, 48], [6, 18, 36], [3, 6, 6]],
  [[12, 24, 48], [12, 24, 48], [4, 9, 18]]
];
var BACKGROUND = ['no athletic background', 'a modest background', 'an elite background'];
var GOALS = ['just finish', 'finish feeling strong', 'compete'];

omni.onResult(['target_distance', 'athletic_background', 'race_goal'], function (ctx, v) {
  var d = Math.round(Number(v.target_distance));
  var b = Math.round(Number(v.athletic_background));
  var g = Math.round(Number(v.race_goal));
  if (!isFinite(d) || !isFinite(b) || !isFinite(g)) {
    ctx.addUnmetCondition('Choose the distance, your background and your goal.');
    return;
  }
  if (!DISTANCES[d] || b < 0 || b > 2 || g < 0 || g > 2) {
    ctx.addUnmetCondition('Those choices are outside the table — pick one option in each row.');
    return;
  }


  var months = PLAN[d][b][g];
  if (!isFinite(months) || months <= 0) {
    ctx.addUnmetCondition('The plan table has no entry for that combination.');
    return;
  }

  var race = DISTANCES[d];
  var weeks = Math.round(months * 4.345);

  /*
   * Rough weekly volume: the biggest week is about the race distance expressed
   * in hours, and the average is two-thirds of that because the plan builds.
   */
  var swimH = race.swim / 2.0;          /* ~2 km/h in open water */
  var bikeH = race.bike / 28;           /* ~28 km/h */
  var runH  = race.run / 10;            /* ~10 km/h */
  var peak = (swimH + bikeH + runH) * (g === 2 ? 1.8 : (g === 1 ? 1.5 : 1.25));
  var average = peak * 0.66;

  ctx.exportValue('trainingMonths', months);
  ctx.exportValue('weeks', weeks);
  ctx.exportValue('weekly_hours', sround(average, 1));
  ctx.exportValue('peak_week', sround(peak, 1));

  ctx.addHtml('<p><strong>For ' + (race.name === 'Olympic' || race.name === 'Ironman' ? 'an ' : 'a ') + race.name + ' (' + race.label + '), starting from '
    + BACKGROUND[b] + ' and aiming to ' + GOALS[g] + ', plan on ' + months + ' months — '
    + weeks + ' weeks.</strong> That is around ' + snum(average, 1) + ' hours a week on average, '
    + 'rising to about ' + snum(peak, 1) + ' hours in the biggest weeks.</p>');

  var rows = [
    ['Race', race.label],
    ['Background', BACKGROUND[b]],
    ['Goal', GOALS[g]],
    ['Months', String(months)],
    ['Weeks', String(weeks)],
    ['Average week', snum(average, 1) + ' h'],
    ['Biggest week', snum(peak, 1) + ' h'],
    ['Longest ride', snum(race.bike * (g === 2 ? 0.9 : 0.75), 0) + ' km'],
    ['Longest run', snum(race.run * (g === 2 ? 0.95 : 0.8), 1) + ' km'],
    ['Longest swim', snum(race.swim * (g === 2 ? 1.1 : 0.9), 2) + ' km']
  ];
  ctx.addHtml(stable(['Item', 'Value'], rows));

  /* the whole table, so the cost of a bigger goal is visible */
  var tableRows = [];
  [0, 1, 2, 3].forEach(function (dd) {
    [0, 1, 2].forEach(function (bb) {
      var cells = [DISTANCES[dd].name, BACKGROUND[bb]];
      [0, 1, 2].forEach(function (gg) {
        cells.push(PLAN[dd][bb][gg] + ' mo');
      });
      tableRows.push(cells);
    });
  });
  ctx.addHtml('<p>Every combination on the page, in months (finish / strong / compete):</p>');
  ctx.addHtml(stable(['Distance', 'Background', 'Finish', 'Strong', 'Compete'], tableRows));

  ctx.addHtml('<p class="calc-unmet">The month counts come from the plan table this page shipped with; the '
    + 'hour figures are a rough volume for that race, not a schedule. Three things matter more than the '
    + 'total: build the bike first, because it is the longest leg and the one that decides your day; keep '
    + 'one rest day; and never increase weekly volume by more than about 10 %, which is what the long '
    + 'build-up in these numbers is for. A sprint from no background is three months because the distances '
    + 'are short enough to finish on fitness alone — an Ironman from the same start is two years, and the '
    + 'table says so.</p>');
});
JS,
];
