<?php
/**
 * Coffee kick — how much caffeine is still in you at bedtime.
 *
 * The harvested page asked for a wake-up time, how long you slept, and up to
 * five drinks with a time, a type and a number of servings, then answered
 * nothing: the surviving helper (`tooBigDoseCheck`) takes all seventeen of those
 * values and nothing called it, and the five concentration and volume boxes it
 * wanted were blank.
 *
 * Caffeine is eliminated with a half-life of about five hours, so the amount at
 * any moment is the sum over the drinks of
 *
 *   mg · 0.5 ^ (hours since that drink / 5)
 *
 * which is what this repair computes. Two numbers matter for sleep: the level at
 * bedtime (30 mg is roughly a quarter of a cup of coffee, and the level below
 * which most people fall asleep normally) and the clock time at which the level
 * finally drops under that.
 */
return [
    'hideTexts' => true,
    'remove' => ['concetration1', 'concetration2', 'concetration3', 'concetration4', 'concetration5',
                 'volume1', 'volume2', 'volume3', 'volume4', 'volume5',
                 'dose1', 'dose2', 'dose3', 'dose4', 'dose5', 'too_big_dose'],
    'vars' => [
        'total_mg' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'at_bedtime' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'bedtime' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'clear_time' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'drinks' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'peak_mg' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-coffee-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'total_mg', 'vt' => 'dependent', 'l' => 'Caffeine drunk today (mg)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'peak_mg', 'vt' => 'dependent', 'l' => 'Highest level in your blood (mg, one drink on top of another)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'at_bedtime', 'vt' => 'dependent', 'l' => 'Still in you at bedtime (mg)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'clear_time', 'vt' => 'dependent', 'l' => 'Hour of the day it falls under 30 mg (24+ means after midnight)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'bedtime', 'vt' => 'dependent', 'l' => 'Your bedtime (hour of the day, 24+ after midnight)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'drinks', 'vt' => 'dependent', 'l' => 'Drinks counted']]]],
        ],
    ]],
    'js' => <<<'JS'
var HALF_LIFE = 5;          /* hours */
var SLEEP_LIMIT = 30;       /* mg — roughly a quarter of a cup of coffee */

/* a control's raw text ("07:30"), turned into hours after midnight */
function clockHours(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el) { return null; }
  var raw = el.value || '';
  var m = raw.match(/^(\d{1,2}):(\d{2})/);
  if (!m) { return null; }
  return Number(m[1]) + Number(m[2]) / 60;
}

/* the text of the chosen option of a choice field, and its value */
function choice(name) {
  var sel = document.querySelector('select[data-var="' + name + '"]');
  if (sel && sel.selectedIndex >= 0) {
    return { text: (sel.options[sel.selectedIndex].text || '').trim(), value: sel.value };
  }
  var radios = document.querySelectorAll('input[type="radio"][name="' + name + '"]');
  for (var i = 0; i < radios.length; i++) {
    if (radios[i].checked) {
      var host = radios[i].closest('label') || radios[i].parentNode;
      return { text: (host.innerText || '').trim(), value: radios[i].value };
    }
  }
  return { text: '', value: '' };
}

/* the servings in a drink row: 1 unless the visitor typed another number */
function servings(i) {
  var el = document.querySelector('input[data-var="no_servings' + i + '"]');
  var n = el ? Number(el.value) : 1;
  return isFinite(n) && n > 0 ? n : 1;
}

/* how many drinks the form is showing — the picker says "One" ... "Five" */
var WORDS = { one: 1, two: 2, three: 3, four: 4, five: 5 };

function drinkCount() {
  var chosen = choice('number_of_drinks');
  var text = (chosen.text || '').toLowerCase();
  if (WORDS[text]) { return WORDS[text]; }
  var digits = Number((text.match(/\d+/) || [])[0]);
  return isFinite(digits) && digits >= 1 && digits <= 5 ? digits : 1;
}

/*
 * Caffeine per millilitre for each drink on the page, in the order the picker
 * lists them. The option ids in the served markup are opaque, so the numbers
 * cannot be read back from the <option> value; these are the figures the page
 * shipped with, keyed by position.
 */
var DRINKS = [
  { name: 'Espresso',        mg: 45,  ml: 30 },
  { name: 'Filter coffee',   mg: 142, ml: 236 },
  { name: 'Instant coffee',  mg: 94,  ml: 236 },
  { name: 'Latte',           mg: 45,  ml: 236 },
  { name: 'Mocha',           mg: 45,  ml: 210 },
  { name: 'Flat white',      mg: 90,  ml: 190 },
  { name: 'Americano',       mg: 45,  ml: 180 },
  { name: 'Cappuccino',      mg: 45,  ml: 170 },
  { name: 'Decaf',           mg: 9,   ml: 236 },
  { name: 'Covfefe',         mg: 90,  ml: 30 },
  { name: 'Black tea',       mg: 35,  ml: 236 },
  { name: 'Green tea',       mg: 21,  ml: 236 },
  { name: 'Yerba mate',      mg: 71,  ml: 236 },
  { name: 'Energy drink',    mg: 109, ml: 330 },
  { name: 'Yerba mate drink', mg: 109, ml: 330 },
  { name: 'Energy shot',     mg: 198, ml: 60 },
  { name: 'Coke',            mg: 33,  ml: 330 },
  { name: 'Diet Coke',       mg: 43,  ml: 330 }
];

/* the caffeine in one serving of the drink chosen in row i */
function doseFor(i) {
  var sel = document.querySelector('select[data-var="drink_type' + i + '"]');
  if (!sel || sel.selectedIndex < 0) { return null; }
  var index = sel.selectedIndex;
  if (index >= DRINKS.length) {
    /* the last option is "Custom": the visitor types the milligrams themselves */
    var el = document.querySelector('input[data-var="concetration' + i + '"]')
          || document.querySelector('input[data-var="volume' + i + '"]');
    var typed = el ? Number(el.value) : NaN;
    return isFinite(typed) && typed > 0 ? { name: 'Custom', mg: typed, ml: null } : null;
  }
  var d = DRINKS[index];
  return { name: d.name, mg: d.mg, ml: d.ml, text: (sel.options[index].text || '').trim() };
}

/* "Espresso (1 fl oz / 30 mL)" -> 30 mL */
function volumeFrom(text) {
  var m = text.match(/([\d.]+)\s*ml/i);
  if (m) { return Number(m[1]); }
  m = text.match(/([\d.]+)\s*fl\s*oz/i);
  if (m) { return Number(m[1]) * 29.5735; }
  return null;
}

omni.onResult(['wake_up_time', 'sleep_length', 'number_of_drinks', 'drink_type1', 'dose_time1'],
  function (ctx, v) {
  var wake = clockHours('wake_up_time');
  if (wake === null) {
    ctx.addUnmetCondition('Enter the time you woke up.');
    return;
  }

  /* how long you slept, from the label */
  var sleepChoice = choice('sleep_length');
  var hours = /sleepless/i.test(sleepChoice.text)
    ? 0
    : Number((sleepChoice.text.match(/([\d.]+)\s*hour/) || [])[1]);
  if (!isFinite(hours)) {
    ctx.addUnmetCondition('Choose how long you slept.');
    return;
  }

  /* bedtime is a full day after waking, minus the hours slept */
  var bedtime = wake + (24 - hours);

  var count = drinkCount();
  var doses = [];
  for (var i = 1; i <= count; i++) {
    var when = clockHours('dose_time' + i);
    if (when === null) {
      ctx.addUnmetCondition('Enter the time of drink ' + i + '.');
      return;
    }
    /* a drink after midnight is entered as a small hour of the same day */
    if (when < wake - 6) { when += 24; }
    var drinkType = doseFor(i);
    if (drinkType === null) {
      ctx.addUnmetCondition('Choose what drink ' + i + ' was (or type its caffeine in the Custom boxes).');
      return;
    }
    doses.push({ at: when, mg: drinkType.mg * servings(i), name: drinkType.name });
  }

  var total = doses.reduce(function (sum, d) { return sum + d.mg; }, 0);

  /* the level at any hour, summing the decaying contribution of each drink */
  function levelAt(t) {
    var sum = 0;
    for (var k = 0; k < doses.length; k++) {
      if (t >= doses[k].at) {
        sum += doses[k].mg * Math.pow(0.5, (t - doses[k].at) / HALF_LIFE);
      }
    }
    return sum;
  }

  /* the peak: just after the last drink, or earlier if that drink was small */
  var peak = 0, peakAt = 0;
  for (var t = 0; t <= 48; t += 0.05) {
    var lv = levelAt(t);
    if (lv > peak) { peak = lv; peakAt = t; }
  }

  /* when the level first falls under the sleep threshold after the peak */
  var clear = null;
  for (var u = peakAt; u <= peakAt + 72; u += 0.05) {
    if (levelAt(u) < SLEEP_LIMIT) { clear = u; break; }
  }
  if (clear === null) { clear = peakAt + 72; }

  var atBed = levelAt(bedtime);

  ctx.exportValue('total_mg', Math.round(total));
  ctx.exportValue('peak_mg', Math.round(peak));
  ctx.exportValue('at_bedtime', Math.round(atBed));
  ctx.exportValue('clear_time', sround(clear, 2));
  ctx.exportValue('bedtime', sround(bedtime, 2));
  ctx.exportValue('drinks', doses.length);

  var hhmm = function (h) {
    var t = ((h % 24) + 24) % 24;
    var hh = Math.floor(t);
    var mm = Math.round((t - hh) * 60);
    if (mm === 60) { hh += 1; mm = 0; }
    return (hh < 10 ? '0' : '') + hh + ':' + (mm < 10 ? '0' : '') + mm
      + (h >= 24 ? ' the next day' : '');
  };

  var verdict = atBed < SLEEP_LIMIT
    ? 'By ' + hhmm(bedtime) + ' you are down to ' + snum(atBed, 0) + ' mg, under the 30 mg that'
      + ' usually leaves sleep alone.'
    : 'At ' + hhmm(bedtime) + ' you still have ' + snum(atBed, 0) + ' mg in you — about '
      + snum(atBed / 95, 1) + ' cups of coffee. That is enough to make falling asleep harder and to '
      + 'lighten the second half of the night.';

  ctx.addHtml('<p><strong>' + snum(total, 0) + ' mg of caffeine in ' + doses.length + ' drink'
    + (doses.length === 1 ? '' : 's') + ', peaking at ' + snum(peak, 0) + ' mg around '
    + hhmm(peakAt) + '. ' + verdict + '</strong></p>');

  var rows = doses.map(function (d, idx) {
    return [String(idx + 1), hhmm(d.at), d.name, snum(d.mg, 0) + ' mg',
      snum(levelAt(bedtime), 0) + ' mg at bedtime'];
  });
  ctx.addHtml(stable(['#', 'Time', 'Drink', 'Caffeine', 'Left at bedtime'], rows));

  var summary = [
    ['Woke up', hhmm(wake)],
    ['Slept', hours === 0 ? 'a sleepless night' : snum(hours, 0) + ' hours'],
    ['Bedtime', hhmm(bedtime)],
    ['Total caffeine', snum(total, 0) + ' mg'],
    ['Peak', snum(peak, 0) + ' mg at ' + hhmm(peakAt)],
    ['At bedtime', snum(atBed, 0) + ' mg'],
    ['Under 30 mg at', hhmm(clear)],
    ['Half-life used', HALF_LIFE + ' hours']
  ];
  ctx.addHtml(stable(['Item', 'Value'], summary));

  /* the decay curve, hour by hour from the first drink */
  var curve = [];
  for (var h = Math.floor(doses[0].at); h <= Math.ceil(clear) && curve.length < 26; h++) {
    curve.push([hhmm(h), snum(levelAt(h), 0) + ' mg']);
  }
  ctx.addHtml('<p>The level hour by hour:</p>');
  ctx.addHtml(stable(['Hour', 'Caffeine in you'], curve));

  if (total > 400) {
    ctx.addHtml('<p><strong>That is more than the 400 mg a day that most health authorities treat as '
      + 'the safe upper limit for a healthy adult.</strong></p>');
  }
  if (doses.length && peak > 200) {
    ctx.addHtml('<p>A single peak above about 200 mg is enough to make some people jittery, and it '
      + 'does nothing extra for alertness — spreading the same total over more, smaller drinks keeps '
      + 'the level flat instead.</p>');
  }

  ctx.addHtml('<p class="calc-unmet">Caffeine is cleared by an enzyme in the liver whose speed varies '
    + 'enormously between people: the five-hour half-life here is the average for a healthy adult, and '
    + 'it is closer to two or three hours in smokers, six or more in the last months of pregnancy, and '
    + 'longer again with some medicines and in liver disease. The model treats each drink as arriving '
    + 'instantly; in reality the level rises for about 45 minutes first, so a drink taken at bedtime '
    + 'is not at full strength when you lie down. 400 mg a day is the usual safe ceiling for a healthy '
    + 'adult, 200 mg in pregnancy, and children should have much less — the sleep figures here assume '
    + 'an adult. Caffeine also masks tiredness rather than removing it: the adenosine it blocks is '
    + 'still there when it wears off, which is why the crash arrives all at once.</p>');
});
JS,
];
