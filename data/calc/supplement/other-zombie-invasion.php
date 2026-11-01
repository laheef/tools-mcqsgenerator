<?php
/**
 * Zombie invasion — day-by-day model of humans against the undead.
 *
 * The harvested page collected every input the model needs and then printed
 * nothing: the four boxes that should have held the survivors, the horde, and
 * the day the outbreak ended were blank presentation fields, and the old inline
 * script only ran on a button that no longer exists. This repair runs the
 * simulation on Calculate and reports the outcome, the timeline and the reason
 * the outbreak ended the way it did.
 *
 * The model is the standard zombie-apocalypse bookkeeping:
 *
 *   encounters  = attack frequency × zombies, capped by the humans available
 *   the humans who flee are caught with the zombie's speed probability, the
 *   ones who stand and fight kill a zombie with skills/(skills + speed), the
 *   dead humans rise again at the transformation probability, and zombies that
 *   have nothing to eat starve at the chosen rate.
 */
return [
    'hideTexts' => true,
    'remove' => ['remaining_people', 'remaining_zombies', 'time_human_won',
                 'time_zombie_won', 'repeat_button'],
    'vars' => [
        'final_humans' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'final_zombies' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'days_to_end' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'outcome' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'humans_lost_pct' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'peak_zombies' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-zombie-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'final_humans', 'vt' => 'dependent', 'l' => 'Humans left when it ended (0 if the zombies won)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'final_zombies', 'vt' => 'dependent', 'l' => 'Zombies left when it ended (0 if the humans won)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'days_to_end', 'vt' => 'dependent', 'l' => 'Days until it ended (3650 = still going after ten years)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'outcome', 'vt' => 'dependent', 'l' => 'Who won: 1 = humans, 2 = zombies, 3 = still going']]]],
            ['FR1', [[['t' => 'v', 'n' => 'humans_lost_pct', 'vt' => 'dependent', 'l' => 'Share of humanity lost, %']]]],
            ['FR1', [[['t' => 'v', 'n' => 'peak_zombies', 'vt' => 'dependent', 'l' => 'Largest horde reached']]]],
        ],
    ]],
    'js' => <<<'JS'
var HORIZON = 3650;            /* ten years; after that the answer is "still going" */

/* the fighting value of the chosen zombie speed, in the same 0-100 scale as human skills */
function speedOf(label) {
  if (!label) { return 25; }
  if (label.indexOf('Fast') === 0) { return 50; }
  if (label.indexOf('Moderate') === 0) { return 25; }
  return 5;
}

function starveOf(label) {
  if (!label) { return 0; }
  if (label.indexOf('quickly') >= 0) { return 20; }
  if (label.indexOf('slowly') >= 0) { return 10; }
  return 0;
}

/* the chosen label, whether the widget drew a dropdown or a row of radios */
function labelOf(name) {
  var sel = document.querySelector('select[data-var="' + name + '"]');
  if (sel) {
    return sel.options[sel.selectedIndex].text.replace(/\s+/g, ' ').trim();
  }
  var checked = document.querySelector('input[type="radio"][name="' + name + '"]:checked');
  if (checked) {
    var span = checked.parentNode && checked.parentNode.querySelector('span');
    if (span) { return span.textContent.replace(/\s+/g, ' ').trim(); }
    var lbl = checked.parentNode && checked.parentNode.textContent;
    return lbl ? lbl.replace(/\s+/g, ' ').trim() : null;
  }
  return null;
}

/* the numeric value behind the chosen option, as the editor stored it */
var CHOICE_VALUES = {
  human_defense_stance: { 'Always flee': 100, 'Mostly flee': 75, 'Flee half the time': 50,
                          'Try to fight zombies': 25, 'Get all the zombies!': 0 },
  human_fighting_skills: { 'Alice: 10/10': 100, 'Joel: 9.5/10': 95, 'Tallahassee: 9/10': 90,
                           'Robert Neville: 8.5/10': 85, 'Ellie: 8/10': 80, 'Shaun Riley: 7/10': 70,
                           'Gerry Lane: 6/10': 60, 'Peter Washington: 5/10': 50, 'Jim: 4/10': 40,
                           'Wade: 3/10': 30, 'Seok Woo: 2.5/10': 25, 'Frank: 2/10': 20,
                           'Micheal Jackson: 1/10': 10 },
  zombie_speed: { 'Fast': 50, 'Moderate': 25, 'Slow': 5 },
  zombie_starvation_rate: { 'Yes (quickly)': 20, 'Yes (slowly)': 10, 'No': 0 }
};

function choiceNum(name, fallback) {
  var label = labelOf(name);
  if (label && CHOICE_VALUES[name] && CHOICE_VALUES[name][label] !== undefined) {
    return CHOICE_VALUES[name][label];
  }
  return fallback;
}

function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el) { return null; }
  var v = String(el.value).trim();
  if (v === '') { return null; }
  var n = Number(v);
  return isFinite(n) ? n : null;
}

omni.onResult(['initial_humans', 'initial_zombies', 'attack_frequency',
               'human_conversion_rate', 'zombie_resurrection_rate'], function (ctx, v) {
  var H = num('initial_humans');
  var Z = num('initial_zombies');
  var freq = num('attack_frequency');
  var conv = num('human_conversion_rate');
  var rise = num('zombie_resurrection_rate');

  var missing = [];
  if (H === null || H <= 0) { missing.push('the initial number of humans'); }
  if (Z === null || Z <= 0) { missing.push('the initial number of zombies'); }
  if (freq === null || freq < 0) { missing.push('how often a zombie attacks, per day'); }
  if (conv === null || conv < 0 || conv > 100) { missing.push('the transformation probability (0–100 %)'); }
  if (rise === null || rise < 0 || rise > 100) { missing.push('the resurrection rate (0–100 %)'); }
  if (missing.length) {
    ctx.addUnmetCondition('Still needed: ' + missing.join('; ') + '.');
    return;
  }

  var stance = choiceNum('human_defense_stance', 100);      /* % of encounters the human flees */
  var skills = choiceNum('human_fighting_skills', 50);      /* 0–100 */
  var speed = choiceNum('zombie_speed', 25);                /* 0–100 zombie edge */
  var starve = choiceNum('zombie_starvation_rate', 0);      /* % per hungry day */

  var caughtWhenFleeing = speed / 100;                      /* a fast zombie catches half of them */
  var pKill = skills / (skills + speed);                    /* skills against speed */
  var pFight = 1 - stance / 100;

  /*
   * The populations are carried as fractions of a person: the model gives the
   * expected outcome of each day, not a roll of the dice. Rounding inside the
   * loop would let the last survivor die and come back every day forever, so the
   * rounding happens once, at the end, for display.
   */
  var humans = H, zombies = Z;
  var peak = Z;
  var day = 0;
  var timeline = [];
  var starvedTotal = 0, risenTotal = 0, eatenTotal = 0, killedTotal = 0;

  while (day < HORIZON && humans > 0 && zombies > 0) {
    day++;
    /*
     * One zombie meets at most `freq` humans a day. It dies the moment one of
     * them wins a fight, so the later meetings of a dead zombie never happen:
     * with a chance q of surviving a single meeting, the expected number of
     * meetings a zombie gets through is 1 + q + q² + … up to freq.
     */
    var q = 1 - pFight * pKill;                       /* a zombie survives one meeting */
    var survival = Math.pow(q, freq);
    var meetings = q >= 1 - 1e-12 ? freq : (1 - survival) / (1 - q);
    var perMeeting = pFight * (1 - pKill) + (1 - pFight) * caughtWhenFleeing;

    var killedHumans = Math.min(humans, zombies * meetings * perMeeting);
    var killedZombies = zombies * (1 - survival);

    /* the dead come back as zombies, at the chosen conversion probability */
    var risen = killedHumans * conv / 100;
    var newZombies = risen;

    /* a zombie that meets nobody that day is a hungry zombie */
    var hungry = Math.max(0, zombies - Math.min(zombies, humans / Math.max(meetings, 1e-9)));
    var starved = Math.min(zombies, hungry * starve / 100);

    humans = humans - killedHumans;
    zombies = zombies - killedZombies * (1 - rise / 100) - starved + newZombies;
    if (zombies < 0) { zombies = 0; }
    if (humans < 0) { humans = 0; }

    eatenTotal += killedHumans;
    killedTotal += killedZombies;
    starvedTotal += starved;
    risenTotal += risen;
    if (zombies > peak) { peak = zombies; }

    /* the timeline keeps the first fortnight and then a dozen samples */
    if (day <= 14 || day % Math.max(1, Math.round(HORIZON / 12)) === 0) {
      timeline.push([day, Math.round(humans), Math.round(zombies)]);
    }

    if (zombies < 0.5) { zombies = 0; break; }
    if (humans < 0.5) { humans = 0; break; }
  }

  /* a run that ends with a fraction under one person has found its last survivor */
  var outcome = humans <= 0 ? 2 : (zombies <= 0 ? 1 : 3);
  if (outcome === 2) { humans = 0; }
  if (outcome === 1) { zombies = 0; }
  humans = Math.round(humans);
  zombies = Math.round(zombies);

  ctx.exportValue('final_humans', humans);
  ctx.exportValue('final_zombies', zombies);
  ctx.exportValue('days_to_end', outcome === 3 ? HORIZON : day);
  ctx.exportValue('outcome', outcome);
  ctx.exportValue('humans_lost_pct', Math.min(100, Math.round((eatenTotal / H) * 1000) / 10));
  ctx.exportValue('peak_zombies', peak);

  function plural(n, one, many) { return n === 1 ? one : many; }
  var headline;
  if (outcome === 1) {
    headline = 'The humans win after ' + day + ' ' + plural(day, 'day', 'days') + '. '
      + humans.toLocaleString() + ' ' + plural(humans, 'person is', 'people are') + ' left out of '
      + H.toLocaleString() + '.';
  } else if (outcome === 2) {
    headline = 'The zombies win after ' + day + ' ' + plural(day, 'day', 'days') + '. The last of the '
      + H.toLocaleString() + ' people is gone.';
  } else {
    headline = 'After ten years (3 650 days) neither side has won: ' + humans.toLocaleString() + ' '
      + plural(humans, 'person is', 'people are') + ' holding out against ' + zombies.toLocaleString()
      + ' ' + plural(zombies, 'zombie', 'zombies') + '.';
  }
  ctx.addHtml('<p><strong>' + headline + '</strong></p>');

  var stanceWord = labelOf('human_defense_stance');
  var skillWord = labelOf('human_fighting_skills');
  var speedWord = labelOf('zombie_speed');
  var starveWord = labelOf('zombie_starvation_rate');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Starting humans', H.toLocaleString()],
    ['Starting zombies', Z.toLocaleString()],
    ['Attacks per zombie per day', freq],
    ['Transformation probability', conv + ' %'],
    ['Resurrection rate', rise + ' %'],
    ['Human behaviour in an encounter', stanceWord + ' — ' + pFight * 100 + ' % of encounters are fought'],
    ['Human fighting skills', skillWord + ' (' + skills + ' of 100)'],
    ['Zombie speed', speedWord + ' (catches ' + Math.round(caughtWhenFleeing * 100) + ' % of the humans who flee)'],
    ['Chance a fighting human destroys a zombie', Math.round(pKill * 1000) / 10 + ' %'],
    ['Zombie starvation', starveWord + ' — ' + starve + ' % of unfed zombies die each day'],
    ['Day it ended', outcome === 3 ? 'not within ten years' : String(day)],
    ['Humans at the end', humans.toLocaleString()],
    ['Zombies at the end', zombies.toLocaleString()],
    ['Humans killed', Math.round(eatenTotal).toLocaleString()],
    ['Of them turned into zombies', Math.round(risenTotal).toLocaleString()],
    ['Zombies destroyed by humans', Math.round(killedTotal).toLocaleString()],
    ['Zombies that starved', Math.round(starvedTotal).toLocaleString()],
    ['Largest horde', peak.toLocaleString()]
  ]));

  var rows = timeline.slice(0, 14).map(function (r) {
    return ['Day ' + r[0], r[1].toLocaleString(), r[2].toLocaleString()];
  });
  ctx.addHtml('<p>The simulation, day by day (a sample of the run):</p>');
  ctx.addHtml(stable(['Day', 'Humans', 'Zombies'], rows));

  ctx.addHtml('<p class="calc-unmet">This is a deterministic model, not a dice game: every attack is '
    + 'counted as its expected outcome rather than rolled one by one, so the same inputs always give the same '
    + 'answer. Real outbreaks are lumpy — a single bad night can wipe out a group — and this page cannot show that. '
    + 'The numbers are rounded to whole people. A run stops when one side reaches zero, at ten years, or (usually) '
    + 'when the two sides settle into a balance where the horde destroys no more humans than it loses.</p>');
});
JS,
];
