<?php
/**
 * Bag footprint — how often a bag has to be reused before it is the greener one.
 *
 * The harvested page asked for a bag type, how many times you would use it and
 * how many bags you throw away each week, then answered nothing. The numbers a
 * bag has to beat come from the life-cycle study the whole argument rests on
 * (Environment Agency, 2011, carrier bags): a paper bag has to be used 3 times
 * to have a lower carbon footprint than a single-use HDPE bag, a heavier
 * reusable plastic bag 4 times, a non-woven polypropylene one 11 times and a
 * cotton bag 131 times.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'break_even' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'uses_needed' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'bags_a_year' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'saved_a_year' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
    ],
    'groups' => [[
        'uid' => 'supp-bag-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'break_even', 'vt' => 'dependent', 'l' => 'Uses this bag needs to beat a single-use bag']]]],
            ['FR1', [[['t' => 'v', 'n' => 'uses_needed', 'vt' => 'dependent', 'l' => 'Extra uses you still need (0 = already ahead)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'bags_a_year', 'vt' => 'dependent', 'l' => 'Bags of this type you will use in a year']]]],
            ['FR1', [[['t' => 'v', 'n' => 'saved_a_year', 'vt' => 'dependent', 'l' => 'Single-use bags avoided in a year']]]],
        ],
    ]],
    'js' => <<<'JS'
/* Environment Agency (2011) carrier-bag life-cycle study: uses needed to beat one HDPE bag */
var BAGS = [
  { name: 'plastic bag',          reuse: 1,   note: 'the single-use HDPE bag everything is measured against' },
  { name: 'paper bag',            reuse: 3,   note: 'paper is heavier to make and to ship, but it is used again quickly' },
  { name: 'reusable plastic bag', reuse: 4,   note: 'the thicker LDPE "bag for life"' },
  { name: 'cotton / material bag', reuse: 131, note: 'growing and dyeing cotton costs a great deal, so it takes a lot of trips to pay back' }
];

omni.onResult(['bag_type', 'times', 'thrown'], function (ctx, v) {
  var type = Math.round(Number(v.bag_type));
  var uses = Number(v.times);
  var perWeek = Number(v.thrown);
  if (!isFinite(type) || !BAGS[type]) {
    ctx.addUnmetCondition('Choose the type of bag you use.');
    return;
  }
  if (!isFinite(uses) || uses < 1) {
    ctx.addUnmetCondition('Enter how many times you will use the bag — at least 1.');
    return;
  }
  if (!isFinite(perWeek) || perWeek < 0) {
    ctx.addUnmetCondition('Enter how many bags you throw away in a week (0 is allowed).');
    return;
  }
  if (uses > 2000) {
    ctx.addUnmetCondition('That is ' + snum(uses, 0) + ' uses — a realistic number is under 1 000.');
    return;
  }

  var bag = BAGS[type];
  var need = bag.reuse;
  var short = Math.max(0, need - Math.round(uses));

  /* one reusable bag replaces `uses` single-use ones over its life */
  var bagsPerYear = perWeek * 52 / Math.max(1, uses);
  var saved = perWeek * 52 - bagsPerYear;

  ctx.exportValue('break_even', need);
  ctx.exportValue('uses_needed', short);
  ctx.exportValue('bags_a_year', sround(bagsPerYear, 1));
  ctx.exportValue('saved_a_year', sround(saved, 1));

  var verdict = (type === 0)
    ? 'A single-use plastic bag is the baseline: it is used once and thrown away, so there is nothing to pay back.'
    : (short === 0
        ? 'Used ' + snum(uses, 0) + ' times, this bag is already the greener choice — it clears the '
          + need + '-use break-even point.'
        : 'Used ' + snum(uses, 0) + ' times this bag is still worse than single-use: it needs '
          + short + ' more trip' + (short === 1 ? '' : 's') + ' to pay back what it took to make.');

  ctx.addHtml('<p><strong>' + verdict + '</strong></p>');

  var rows = BAGS.map(function (b, i) {
    return [b.name, b.reuse === 1 ? 'baseline' : b.reuse + ' uses', b.note];
  });
  ctx.addHtml(stable(['Bag', 'Uses to break even', 'Why'], rows));

  ctx.addHtml('<p>Your own bag, used ' + snum(uses, 0) + ' time' + (Math.round(uses) === 1 ? '' : 's')
    + ': if you take home ' + snum(perWeek, 1) + ' bag' + (perWeek === 1 ? '' : 's')
    + ' a week, that is ' + snum(perWeek * 52, 0) + ' trips a year, so you would need '
    + snum(bagsPerYear, 1) + ' of them — and you would avoid '
    + snum(saved, 1) + ' single-use bags over the year.</p>');

  ctx.addHtml('<p class="calc-unmet">The break-even figures are for the global-warming impact of making, '
    + 'shipping and disposing of each bag, from the UK Environment Agency life-cycle study of carrier bags '
    + '(2011), which is the source most reuse advice still quotes. Litter and marine plastic are a separate '
    + 'argument that does not show up in a carbon figure, and a bag reused for shopping then used for bin '
    + 'liners is doing two jobs at once.</p>');
});
JS,
];
