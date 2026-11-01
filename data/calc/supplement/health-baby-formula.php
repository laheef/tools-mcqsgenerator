<?php
/**
 * Baby formula — how much to make, per feed and per day.
 *
 * The harvested page asked for the baby's age and weight and then answered
 * nothing. The two numbers every formula tin and every paediatric handout uses
 * are the same: a baby takes about 150 mL (2.5 fl oz) of formula per kilogram
 * (per pound) per day, split over the number of feeds that age usually wants.
 * The page works both out and keeps the daily total inside the range the
 * manufacturers print on the tin.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'feeds_a_day' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'daily_ml' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'feed_ml' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'daily_oz' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'feed_oz' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
    ],
    'groups' => [[
        'uid' => 'supp-formula-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'feeds_a_day', 'vt' => 'dependent', 'l' => 'Feeds a day at this age']]]],
            ['FR1', [[['t' => 'v', 'n' => 'daily_ml', 'vt' => 'dependent', 'l' => 'Formula for a whole day (mL)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'feed_ml', 'vt' => 'dependent', 'l' => 'Formula per feed (mL)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'daily_oz', 'vt' => 'dependent', 'l' => 'Formula for a whole day (fl oz)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'feed_oz', 'vt' => 'dependent', 'l' => 'Formula per feed (fl oz)']]]],
        ],
    ]],
    'js' => <<<'JS'
/* the age box carries a unit picker; everything below works in months */
var AGE_UNITS = { min: 1 / 43800, fifteen: 1 / 2920, hrs: 1 / 730, days: 1 / 30.44,
                  wk: 1 / 4.348, mos: 1, yrs: 12 };
var WEIGHT_UNITS = { kg: 1, g: 0.001, mg: 0.000001, t: 1000, lb: 0.45359237,
                     oz: 0.0283495231, ng: 1e-12 };

function unitOf(name, fallback) {
  var sel = document.querySelector('select[data-unit-select="' + name + '"]');
  return sel && sel.value ? sel.value : fallback;
}

/* how many feeds a day babies of each age tend to want */
function feedsFor(months) {
  if (months < 1) { return 8; }
  if (months < 2) { return 7; }
  if (months < 4) { return 6; }
  if (months < 6) { return 5; }
  if (months < 9) { return 5; }
  return 4;
}

omni.onResult(['age', 'weight'], function (ctx, v) {
  var ageUnit = unitOf('age', 'mos');
  var weightUnit = unitOf('weight', 'kg');
  var months = Number(v.age) * (AGE_UNITS[ageUnit] || 1);
  var kg = Number(v.weight) * (WEIGHT_UNITS[weightUnit] || 1);

  if (!isFinite(months) || months <= 0) {
    ctx.addUnmetCondition('Enter the baby\'s age.');
    return;
  }
  if (!isFinite(kg) || kg <= 0) {
    ctx.addUnmetCondition('Enter the baby\'s weight.');
    return;
  }
  if (months > 24) {
    ctx.addUnmetCondition('That is ' + snum(months / 12, 1) + ' years — this calculator is for babies '
      + 'under two. Check the age unit next to the box.');
    return;
  }
  if (kg < 1.5 || kg > 20) {
    ctx.addUnmetCondition('A weight of ' + snum(kg, 2) + ' kg is outside the range this rule covers '
      + '(1.5-20 kg). Check the weight unit next to the box.');
    return;
  }

  /* 150 mL per kg per day is the standard figure; 2.5 fl oz per pound is the same rule */
  var dailyMl = 150 * kg;
  var feeds = feedsFor(months);
  var feedMl = dailyMl / feeds;
  var dailyOz = dailyMl / 29.5735296;

  ctx.exportValue('feeds_a_day', feeds);
  ctx.exportValue('daily_ml', Math.round(dailyMl));
  ctx.exportValue('feed_ml', Math.round(feedMl));
  ctx.exportValue('daily_oz', sround(dailyOz, 1));
  ctx.exportValue('feed_oz', sround(dailyOz / feeds, 1));

  ctx.addHtml('<p><strong>A ' + snum(kg, 2) + ' kg baby of ' + snum(months, 1) + ' months needs about '
    + snum(dailyMl, 0) + ' mL (' + snum(dailyOz, 1) + ' fl oz) of formula a day, which is '
    + feeds + ' feeds of roughly ' + snum(feedMl, 0) + ' mL (' + snum(feedMl / 29.5735296, 1)
    + ' fl oz).</strong></p>');

  var rows = [
    ['Weight used', snum(kg, 2) + ' kg (' + snum(kg / 0.45359237, 1) + ' lb)'],
    ['Age used', snum(months, 1) + ' months (' + snum(months * 30.44, 0) + ' days)'],
    ['Formula a day', snum(dailyMl, 0) + ' mL = ' + snum(dailyOz, 1) + ' fl oz'],
    ['Formula a feed', snum(feedMl, 0) + ' mL = ' + snum(feedMl / 29.5735296, 1) + ' fl oz'],
    ['Feeds a day', String(feeds) + ' (about every ' + snum(24 / feeds, 1) + ' hours)'],
    ['Scoops, at 1 scoop per 30 mL', snum(dailyMl / 30, 0) + ' scoops a day, ' + snum(feedMl / 30, 1) + ' a feed']
  ];
  ctx.addHtml(stable(['Item', 'Value'], rows));

  var bands = [[0, 1, 8], [1, 2, 7], [2, 4, 6], [4, 6, 5], [6, 12, 4], [12, 24, 3]];
  var bandRows = bands.map(function (band) {
    return [band[0] + '-' + band[1] + ' months', String(band[2]),
      snum(dailyMl / band[2], 0) + ' mL',
      snum(dailyMl / band[2] / 29.5735296, 1) + ' fl oz'];
  });
  ctx.addHtml('<p>The same daily total split the way each age usually feeds:</p>');
  ctx.addHtml(stable(['Age', 'Feeds a day', 'Per feed', 'Per feed (oz)'], bandRows));

  ctx.addHtml('<p class="calc-unmet">Formula is made up at one level scoop to 30 mL (1 fl oz) of water and '
    + 'the water is boiled and cooled first; never add extra powder to "strengthen" a feed. 150 mL/kg/day is '
    + 'the figure paediatric guidelines use, and it should stay under about 1 000 mL (32 fl oz) a day for a '
    + 'baby over six months — from six months solids take over part of the intake, so the number of feeds '
    + 'falls while the weight rises. Feed on demand rather than to the millilitre: a baby who drains every '
    + 'bottle and still roots is telling you to move up, and one who leaves a third of each feed is telling '
    + 'you to move down. Ask your health visitor or paediatrician before changing anything for a baby who '
    + 'is not putting on weight.</p>');
});
JS,
];
