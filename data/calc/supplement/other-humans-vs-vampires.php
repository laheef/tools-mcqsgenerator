<?php
/**
 * Humans vs vampires — the predator-prey model behind the page.
 *
 * The harvested page carried the six rate pickers, the initial populations, an
 * "advanced mode" switch and a dozen dependent boxes, and answered nothing: the
 * old script only reacted to a chart it no longer drew, and every result box was
 * a blank presentation field.
 *
 * This repair integrates the model the page describes, day by day:
 *
 *   attacks      = a · humans · vampires          (a, how often vampires hunt)
 *   new vampires = b · attacks                     (b, the transformation chance)
 *   slayer kills = c · (slayers + 2 % of humans) · vampires
 *   humans grow  = (k + d) · humans
 *   vampires die = e · vampires                    (e, annihilation / exposure)
 *
 * The slayers are a standing force that does not grow; the 2 % of ordinary
 * humans is the part of the crowd that fights back when cornered, which is what
 * keeps the outcome from being decided by the slayers alone.
 */
return [
    'hideTexts' => true,
    'remove' => ['advanced_mode', 'b2_scale', 'preset', 'show_scenario_details',
                 'text_result_code', 'human_time', 'vampire_time',
                 'human_scale_time', 'vampire_scale_time',
                 '_chart_scale', '_human_special', '_human_special_number',
                 '_slayer_special', '_slayer_special_number',
                 '_vampire_special', '_vampire_special_number',
                 'a_scale_number', 'c_scale_number', 'd_scale_number',
                 'e_scale_number', 'k_scale_number'],
    'vars' => [
        'humans_end' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'vampires_end' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'days_end' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'winner' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'peak_vampires' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'humans_lost' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
    ],
    'groups' => [[
        'uid' => 'supp-vampire-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'humans_end', 'vt' => 'dependent', 'l' => 'Humans left']]]],
            ['FR1', [[['t' => 'v', 'n' => 'vampires_end', 'vt' => 'dependent', 'l' => 'Vampires left']]]],
            ['FR1', [[['t' => 'v', 'n' => 'days_end', 'vt' => 'dependent', 'l' => 'Days until it was decided (73 048 = still going after 200 years)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'winner', 'vt' => 'dependent', 'l' => 'Outcome: 1 = humans, 2 = vampires, 3 = coexistence']]]],
            ['FR1', [[['t' => 'v', 'n' => 'peak_vampires', 'vt' => 'dependent', 'l' => 'Largest vampire population']]]],
            ['FR1', [[['t' => 'v', 'n' => 'humans_lost', 'vt' => 'dependent', 'l' => 'Share of humanity lost, %']]]],
        ],
    ]],
    'js' => <<<'JS'
var HORIZON_DAYS = 365.2425 * 200;    /* two centuries */
var YEAR = 365.2425;

/* attack rates per vampire-human pair per day, from the picker's labels */
var A_RATE = { 'Hunting': 0.01, 'Frequent attacks': 0.0001, 'Common attacks': 0.000001,
               'Rare attacks': 0.00000002, 'No attacks': 0 };

/* how hard the slayers hunt, per pair per day */
var C_RATE = { 'Devote life to kill vampires': 0.1, 'Hunting': 0.005,
               'Regular attacks': 0.00001, 'Sporadic attacks': 0.0000005, 'No attacks': 0 };

/* vampires lost to exposure, starvation and accidents, per day */
var E_RATE = { 'Slayers annihilation': 0.001, 'Aggressive attacks': 0.00002,
               'Constant attacks': 0.0000001, 'Cautious attacks': 0.000000002, 'No attacks': 0 };

/* annual growth or recruitment, read from the labels and divided into days */
var YEARLY = { 'No growth': 0, 'No recruitment': 0,
               'Current (1% per year)': 0.01, 'Slow (1% per year)': 0.01,
               'Quick (10% per year)': 0.10, 'Mobilization (10% per year)': 0.10,
               'Doubles every year': Math.LN2 };

function chosenLabel(name) {
  var sel = document.querySelector('select[data-var="' + name + '"]');
  if (sel) { return sel.options[sel.selectedIndex].text.replace(/\s+/g, ' ').trim(); }
  var checked = document.querySelector('input[type="radio"][name="' + name + '"]:checked');
  if (!checked) { return null; }
  var span = checked.parentNode && checked.parentNode.querySelector('span');
  return (span ? span.textContent : checked.parentNode.textContent || '').replace(/\s+/g, ' ').trim();
}

function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

omni.onResult(['initial_human', 'initial_vampire', 'b_scale', 'a_scale', 'c_scale',
               'd_scale', 'e_scale', 'k_scale'], function (ctx, v) {
  var H = num('initial_human');
  var V = num('initial_vampire');
  var S = num('initial_slayer');
  var bRaw = num('b_scale');

  var missing = [];
  if (H === null || H <= 0) { missing.push('the number of humans'); }
  if (V === null || V <= 0) { missing.push('the number of vampires'); }
  if (bRaw === null || bRaw < 0) { missing.push('the transformation probability'); }
  if (missing.length) {
    ctx.addUnmetCondition('Still needed: ' + missing.join('; ') + '.');
    return;
  }
  if (S === null || S < 0) { S = 0; }

  var aLabel = chosenLabel('a_scale');
  var cLabel = chosenLabel('c_scale');
  var dLabel = chosenLabel('d_scale');
  var eLabel = chosenLabel('e_scale');
  var kLabel = chosenLabel('k_scale');

  var a = A_RATE[aLabel];
  var c = C_RATE[cLabel];
  var e = E_RATE[eLabel];
  var d = (YEARLY[dLabel] || 0) / YEAR;
  var k = (YEARLY[kLabel] || 0) / YEAR;
  if (a === undefined || c === undefined || e === undefined) {
    ctx.addUnmetCondition('Choose one option from each of the rate lists.');
    return;
  }

  /*
   * The transformation box is a percentage: "100" means every attacked human
   * rises again. A number at or below 1 is read as a fraction, so both 0.5 and
   * 50 mean half.
   */
  var b = bRaw > 1 ? bRaw / 100 : bRaw;
  if (b > 1) { b = 1; }

  var humans = H, vampires = V;
  var peak = V;
  var day = 0;
  var dt = 0.1;
  var lost = 0;
  var sample = [];
  var decided = 3;

  while (day < HORIZON_DAYS && humans > 0.5 && vampires > 0.5) {
    /* a human can be attacked once a day, however many vampires there are */
    var attacks = Math.min(humans, a * humans * vampires);
    var newVampires = b * attacks;
    var hunters = S + 0.02 * humans;
    var slayerKills = c * hunters * vampires;
    var vampireDeaths = e * vampires;

    var dH = (k + d) * humans - attacks;
    var dV = newVampires - slayerKills - vampireDeaths;

    humans += dH * dt;
    vampires += dV * dt;
    if (humans < 0) { lost += -humans; humans = 0; }
    if (vampires < 0) { vampires = 0; }
    if (vampires > peak) { peak = vampires; }

    day += dt;
    if (day % 365.2425 < dt) {
      sample.push([Math.round(day / YEAR), Math.round(humans), Math.round(vampires)]);
    }
  }
  decided = humans <= 0.5 ? 2 : (vampires <= 0.5 ? 1 : 3);
  /* a fraction of a person at the end is still a person */
  if (decided === 3) { humans = Math.max(1, humans); vampires = Math.max(1, vampires); }

  ctx.exportValue('humans_end', Math.round(humans));
  ctx.exportValue('vampires_end', Math.round(vampires));
  ctx.exportValue('days_end', Math.max(1, Math.round(day)));
  ctx.exportValue('winner', decided);
  ctx.exportValue('peak_vampires', Math.round(peak));
  ctx.exportValue('humans_lost', Math.min(100, Math.round((1 - humans / H) * 1000) / 10));

  var days = Math.max(1, Math.round(day));
  var when = days >= 730
    ? days.toLocaleString() + ' days (about ' + snum(day / YEAR, 1) + ' years)'
    : days.toLocaleString() + ' ' + (days === 1 ? 'day' : 'days');
  var headline;
  if (decided === 1) {
    headline = 'The humans win after ' + when + '. ' + Math.round(humans).toLocaleString()
      + ' people are left, and the last vampire is destroyed.';
  } else if (decided === 2) {
    headline = 'The vampires win after ' + when + '. Every human is dead or turned, and '
      + Math.round(vampires).toLocaleString() + ' vampires remain.';
  } else {
    headline = 'Neither side wins: after 200 years ' + Math.round(humans).toLocaleString()
      + ' people and ' + Math.round(vampires).toLocaleString() + ' vampires are still standing, in a '
      + 'balance that neither can break.';
  }
  ctx.addHtml('<p><strong>' + headline + '</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Starting humans', H.toLocaleString()],
    ['Starting vampires', V.toLocaleString()],
    ['Slayers', Math.round(S).toLocaleString()],
    ['Vampire attacks', aLabel + ' (' + a + ' per pair per day)'],
    ['Transformation probability', snum(b * 100, 2) + ' %'],
    ['Slayer effectiveness', cLabel + ' (' + c + ' per pair per day)'],
    ['Vampire losses', eLabel + ' (' + snum(e * 100, 8) + ' % per day)'],
    ['Human growth', kLabel + ' — ' + snum(k * YEAR, 4) + ' per year, compounded daily'],
    ['Recruitment', dLabel + ' — ' + snum(d * YEAR, 4) + ' per year, compounded daily'],
    ['Humans at the end', Math.round(humans).toLocaleString()],
    ['Vampires at the end', Math.round(vampires).toLocaleString()],
    ['Largest vampire population', Math.round(peak).toLocaleString()],
    ['Decided after', when]
  ]));

  var rows = sample.filter(function (r, i, all) { return i % Math.max(1, Math.ceil(all.length / 18)) === 0; })
    .slice(0, 18).map(function (r) {
      return ['Year ' + r[0], r[1].toLocaleString(), r[2].toLocaleString()];
    });
  ctx.addHtml('<p>A sample of the run, year by year:</p>');
  ctx.addHtml(stable(['Year', 'Humans', 'Vampires'], rows));
  ctx.addHtml('<p>The chart is a balance of two forces. Vampires grow with the number of attacks '
    + '(a × humans × vampires × transformation chance) and shrink with the slayers and with their own '
    + 'death rate. Humans grow at the growth rate and shrink by the attacks. Whichever product is larger '
    + 'wins in the end, which is why a small change in the attack rate or in the transformation chance '
    + 'can flip the result completely.</p>');

  ctx.addHtml('<p class="calc-unmet">Two centuries are simulated in steps of a tenth of a day, and the '
    + 'model is deliberately simple: vampires and humans mix freely (no geography, no quarantine), the '
    + 'slayers never die or recruit, and the transformation chance is the same for every victim. Real '
    + 'outbreaks of anything spread on a network, not in a well-mixed population, and the first hundred '
    + 'cases decide the outcome far more than the last million. The human growth rate is compounded '
    + 'continuously, and the "doubles every year" option is a growth rate of ln 2 per year, which is what '
    + 'doubling once a year actually means. Preset scenarios were part of the old page and are not '
    + 'reproduced here: choose the six rates yourself, or leave the defaults the page ships with, which '
    + 'are the Stoker-King ones.</p>');
});
JS,
];
