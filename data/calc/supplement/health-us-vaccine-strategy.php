<?php
/**
 * US vaccine strategy — how far down the priority list a supply of doses reaches.
 *
 * The page had no form. The repair reproduces the allocation question the
 * strategy documents pose: given a population, a stock of doses and a
 * two-dose schedule, who is covered before the supply runs out?
 *
 *   people coverable = doses ÷ doses a person
 *   tier 1           = population × share in the priority group
 *   tier 2           = population × share of essential workers
 *   the rest walks down the list into the general population
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'population' => ['type' => 'numerical'],
        'doses_available' => ['type' => 'numerical'],
        'doses_per_person' => ['type' => 'numerical'],
        'priority_share' => ['type' => 'numerical'],
        'essential_share' => ['type' => 'numerical'],
        'vx_people' => sup_dep('0'),
        'vx_share_pop' => sup_dep('1'),
        'vx_tier1' => sup_dep('0'),
        'vx_tier2' => sup_dep('0'),
        'vx_after1' => sup_dep('0'),
        'vx_after2' => sup_dep('0'),
        'vx_general' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-vx-supply', 'Population and supply', [
            sup_field(sup_num('population', 'People in the country')),
            sup_field(sup_num('doses_available', 'Doses you have to allocate')),
            sup_field(sup_num('doses_per_person', 'Doses each person needs (1 or 2)')),
        ]),
        sup_group('supp-vx-tiers', 'The priority lists', [
            sup_field(sup_num('priority_share', 'Share in the first priority group (%)')),
            sup_field(sup_num('essential_share', 'Share of essential workers (%)')),
        ]),
        sup_group('supp-vx-results', 'Results', [
            sup_field(sup_out('vx_people', 'People who can be fully vaccinated')),
            sup_field(sup_out('vx_share_pop', 'Share of the population covered (%)')),
            sup_field(sup_out('vx_tier1', 'People in the first priority group')),
            sup_field(sup_out('vx_tier2', 'People in the essential-worker group')),
            sup_field(sup_out('vx_after1', 'Doses left after the first group')),
            sup_field(sup_out('vx_after2', 'Doses left after the essential workers')),
            sup_field(sup_out('vx_general', 'People in the general population reached')),
        ]),
    ],
    'js' => <<<'JS'
function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

omni.onResult(['population', 'doses_available', 'doses_per_person', 'priority_share', 'essential_share'],
function (ctx, v) {
  var population = num('population');
  var doses = num('doses_available');
  var perPerson = num('doses_per_person');
  var priority = num('priority_share');
  var essential = num('essential_share');

  if (population === null || population <= 0) {
    ctx.addUnmetCondition('Enter the population.');
    return;
  }
  if (doses === null || doses <= 0) {
    ctx.addUnmetCondition('Enter how many doses you have.');
    return;
  }
  if (perPerson === null || perPerson <= 0) {
    ctx.addUnmetCondition('Enter how many doses each person needs.');
    return;
  }
  if (priority === null || priority < 0 || priority > 100) {
    ctx.addUnmetCondition('Enter the first priority group as a percentage, 0 to 100.');
    return;
  }
  if (essential === null || essential < 0 || essential > 100) {
    ctx.addUnmetCondition('Enter the essential-worker share as a percentage, 0 to 100.');
    return;
  }
  if (priority + essential > 100) {
    ctx.addUnmetCondition('The two groups together cannot be more than the whole population.');
    return;
  }

  var people = doses / perPerson;
  var tier1 = population * priority / 100;
  var tier2 = population * essential / 100;
  var general = Math.max(0, population - tier1 - tier2);

  var after1 = Math.max(0, people - tier1);
  var after2 = Math.max(0, after1 - tier2);
  var generalReached = Math.min(general, after2);

  ctx.exportValue('vx_people', Math.round(people));
  ctx.exportValue('vx_share_pop', sround(Math.min(100, people / population * 100), 1));
  ctx.exportValue('vx_tier1', Math.round(tier1));
  ctx.exportValue('vx_tier2', Math.round(tier2));
  ctx.exportValue('vx_after1', Math.round(after1 * perPerson));
  ctx.exportValue('vx_after2', Math.round(after2 * perPerson));
  ctx.exportValue('vx_general', Math.round(generalReached));

  var headline;
  if (people >= population) {
    headline = 'The supply covers the whole population with ' + Math.round(doses - population * perPerson)
      + ' doses to spare.';
  } else if (people >= tier1 + tier2) {
    headline = 'The supply covers both priority groups and still reaches '
      + Math.round(generalReached).toLocaleString() + ' people in the general population — '
      + snum(people / population * 100, 1) + ' % of everyone.';
  } else if (people >= tier1) {
    headline = 'The supply covers the first priority group and '
      + Math.round(Math.min(tier2, after1)).toLocaleString() + ' essential workers, but not all of them — '
      + snum(people / population * 100, 1) + ' % of the population.';
  } else {
    headline = 'The supply does not cover the first priority group: '
      + Math.round(people).toLocaleString() + ' people out of ' + Math.round(tier1).toLocaleString()
      + ' — ' + snum(people / population * 100, 1) + ' % of the country.';
  }
  ctx.addHtml('<p><strong>' + headline + '</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Population', Math.round(population).toLocaleString()],
    ['Doses available', Math.round(doses).toLocaleString()],
    ['Doses a person', snum(perPerson, 1)],
    ['People who can be fully vaccinated', Math.round(people).toLocaleString()],
    ['Share of the population', snum(people / population * 100, 1) + ' %'],
    ['First priority group', Math.round(tier1).toLocaleString() + ' (' + snum(priority, 1) + ' %)'],
    ['Essential workers', Math.round(tier2).toLocaleString() + ' (' + snum(essential, 1) + ' %)'],
    ['General population', Math.round(general).toLocaleString()],
    ['Doses left after the first group', Math.round(after1 * perPerson).toLocaleString()],
    ['Doses left after essential workers', Math.round(after2 * perPerson).toLocaleString()],
    ['Partially covered group', Math.round(Math.min(tier1, people)).toLocaleString()
      + ' people in the tier the supply runs out in'],
    ['Doses short of covering everyone', Math.max(0, Math.round(population * perPerson - doses)).toLocaleString()]
  ]));

  /* where the supply stops at half and double the stock */
  var rows = [0.5, 1, 2, 4].map(function (k) {
    var d2 = doses * k;
    var p2 = d2 / perPerson;
    var reaches = p2 >= tier1 + tier2 ? 'general population'
      : (p2 >= tier1 ? 'essential workers' : 'first priority group');
    return [Math.round(d2).toLocaleString() + ' doses', Math.round(p2).toLocaleString(),
      snum(Math.min(100, p2 / population * 100), 1) + ' %', reaches];
  });
  ctx.addHtml('<p>Where the queue stops at other sizes of supply:</p>');
  ctx.addHtml(stable(['Supply', 'People', 'Share of population', 'Furthest group reached'], rows));

  ctx.addHtml('<p class="calc-unmet">This is a queue, not an epidemic model: it says nothing about how '
    + 'many doses a week arrive, whether people accept them, or whether a first dose held back for a '
    + 'second leaves fewer people with any protection at all. The strategy documents it follows put health '
    + 'workers and care-home residents first, then other essential workers, then the general population by '
    + 'age and risk — the two percentages above stand in for that whole list, so treat the answer as a '
    + 'ceiling. Doses also expire, and a dose that arrives after the group it was meant for has been '
    + 'vaccinated by another route is not interchangeable with one that arrives in time. The arithmetic is '
    + 'exact; the allocation it describes is a policy, and policies change by the week.</p>');
});
JS,
];
