<?php
/**
 * Parrondo's paradox — two losing games that win when they are played in turn.
 *
 * The harvested page asked how many games and how many runs and offered five
 * orderings, then answered nothing: the simulation functions survived in the
 * page script but nothing called them, and their parameters did not match the
 * form.
 *
 * The games are the classic Parrondo pair, with capital that moves by ±1:
 *
 *   Game A   win 1 with probability 0.495, lose 1 with 0.505 — a losing game.
 *   Game B   if the capital is a multiple of 3: win 1 with probability 0.095;
 *            otherwise: win 1 with probability 0.745. Also a losing game.
 *
 * Played alternately — or in pairs, or at random — the two drift upwards, which
 * is the paradox. The page simulates exactly that, with a seeded generator so
 * the same inputs always give the same answer.
 */
return [
    'hideTexts' => true,
    /* the harvested result boxes carried camelCase labels the page never used */
    'remove' => ['averageEndCap', 'gameOrder', 'runsGamesJs'],
    'vars' => [
        'avg_end_capital' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'order_used' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'games_simulated' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'win_rate' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
    ],
    'groups' => [[
        'uid' => 'supp-parrondo-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'avg_end_capital', 'vt' => 'dependent', 'l' => 'Average capital at the end of a run']]]],
            ['FR1', [[['t' => 'v', 'n' => 'win_rate', 'vt' => 'dependent', 'l' => 'Runs that ended ahead (%)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'games_simulated', 'vt' => 'dependent', 'l' => 'Games simulated (runs x games)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'order_used', 'vt' => 'dependent', 'l' => 'Order used (0 A, 1 B, 2 ABAB, 3 AABB, 4 random)']]]],
        ],
    ]],
    'js' => <<<'JS'
/* ---- the two games ------------------------------------------------------ */
var P_A = 0.495;
var P_B_THREE = 0.095;     /* capital divisible by 3 — the bad branch */
var P_B_OTHER = 0.745;

/* a small deterministic generator, so the same form gives the same numbers */
function rng(seed) {
  var s = seed >>> 0;
  return function () {
    s = (s + 0x6D2B79F5) >>> 0;
    var t = s;
    t = Math.imul(t ^ (t >>> 15), t | 1);
    t ^= t + Math.imul(t ^ (t >>> 7), t | 61);
    return ((t ^ (t >>> 14)) >>> 0) / 4294967296;
  };
}

function playA(rand) {
  return rand() < P_A ? 1 : -1;
}
function playB(rand, capital) {
  var p = (capital % 3 === 0) ? P_B_THREE : P_B_OTHER;
  return rand() < p ? 1 : -1;
}

/* which game is next, for each ordering */
function pick(order, index, rand) {
  if (order === 0) { return 'A'; }
  if (order === 1) { return 'B'; }
  if (order === 2) { return index % 2 === 0 ? 'A' : 'B'; }
  if (order === 3) { return Math.floor(index / 2) % 2 === 0 ? 'A' : 'B'; }
  return rand() < 0.5 ? 'A' : 'B';
}

var ORDERS = ['Only game A', 'Only game B', 'A, B, A, B, ...', 'A, A, B, B, ...', 'Random'];

/* one run of `games` games; returns the final capital */
function run(order, games, seed) {
  var rand = rng(seed);
  var capital = 0;
  for (var i = 0; i < games; i++) {
    var g = pick(order, i, rand);
    capital += (g === 'A') ? playA(rand) : playB(rand, capital);
  }
  return capital;
}

omni.onResult(['order', 'numberOfGames', 'totalRuns'], function (ctx, v) {
  var order = Math.round(Number(v.order));
  var games = Math.round(Number(v.numberOfGames));
  var runs = Math.round(Number(v.totalRuns));

  if (!isFinite(order)) {
    ctx.addUnmetCondition('Choose the order to play the two games in.');
    return;
  }
  if (!isFinite(games) || games < 1) {
    ctx.addUnmetCondition('Enter how many games each run should have.');
    return;
  }
  if (!isFinite(runs) || runs < 1) {
    ctx.addUnmetCondition('Enter how many runs to simulate.');
    return;
  }
  if (games > 200000 || runs > 100000) {
    ctx.addUnmetCondition('That is more than this page simulates in one go — keep games under 200 000 '
      + 'and runs under 100 000.');
    return;
  }

  var total = 0, wins = 0, best = -Infinity, worst = Infinity;
  for (var r = 0; r < runs; r++) {
    var end = run(order, games, 1234567 + r * 7919);
    total += end;
    if (end > 0) { wins++; }
    if (end > best) { best = end; }
    if (end < worst) { worst = end; }
  }
  var average = total / runs;

  ctx.exportValue('avg_end_capital', sround(average, 2));
  ctx.exportValue('win_rate', sround(wins / runs * 100, 1));
  ctx.exportValue('games_simulated', runs * games);
  ctx.exportValue('order_used', order);

  var verdict = average > 0
    ? 'ends <strong>ahead</strong>'
    : (average < 0 ? 'ends <strong>behind</strong>' : 'ends level');
  ctx.addHtml('<p><strong>' + ORDERS[order] + ', ' + runs + ' run' + (runs === 1 ? '' : 's') + ' of '
    + games + ' game' + (games === 1 ? '' : 's') + ' each: the average capital ' + verdict + ' at '
    + snum(average, 2) + '</strong> (best run ' + snum(best, 0) + ', worst ' + snum(worst, 0) + ', '
    + snum(wins / runs * 100, 1) + ' % of runs finished ahead).</p>');

  /* the same run lengths at every ordering, so the paradox is on one screen */
  var rows = ORDERS.map(function (name, o) {
    var sum = 0;
    for (var k = 0; k < runs; k++) { sum += run(o, games, 1234567 + k * 7919); }
    var avg = sum / runs;
    return [name, snum(avg, 2), avg > 0 ? 'ahead' : (avg < 0 ? 'behind' : 'level')];
  });
  ctx.addHtml('<p>All five orderings, same run length, same number of runs:</p>');
  ctx.addHtml(stable(['Order', 'Average capital', 'Verdict'], rows));

  ctx.addHtml('<p>The two games on their own: A wins 49.5 % of the time, and B wins 9.5 % when the '
    + 'capital is a multiple of three and 74.5 % otherwise — both drift downwards. Alternating them '
    + 'drifts upwards because B\'s bad branch needs the capital to be divisible by three, and game A '
    + 'moves the capital off those values.</p>');

  ctx.addHtml('<p class="calc-unmet">Every run starts from a capital of 0 and each game moves it by one '
    + 'unit, so a hundred games can only reach plus or minus a hundred. The simulation is seeded, which '
    + 'is why the same inputs always give the same answer; the average settles down as the number of '
    + 'runs goes up (a few thousand is plenty, a few dozen is noise). Parrondo\'s paradox is a real '
    + 'feature of this pair of games, not a rounding artefact — it has been built in physical systems '
    + 'and appears in population models — but real games rarely have such a clean structure, and any '
    + 'house edge or fee destroys it.</p>');
});
JS,
];
