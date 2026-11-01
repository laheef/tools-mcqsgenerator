<?php
/**
 * What size boiler a house needs.
 *
 * Heating output is estimated from the number of bedrooms and the age of the
 * property (older homes leak more heat per room), and the hot-water output from
 * the number of bathrooms, which is what decides whether one combi can run two
 * showers. The figures are the ones installers quote as a starting point.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'heating_kw' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'boiler_kw_low' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'boiler_kw_high' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'hot_water_lpm' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'heating_kw', 'vt' => 'dependent', 'l' => 'Heating output needed (kW)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'boiler_kw_low', 'vt' => 'dependent', 'l' => 'Boiler size, lower end (kW)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'boiler_kw_high', 'vt' => 'dependent', 'l' => 'Boiler size, upper end (kW)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'hot_water_lpm', 'vt' => 'dependent', 'l' => 'Hot water flow (litres per minute)']]]],
        ],
    ]],
    'showIf' => [
        'bedroomBaths' => 'boiler == 1',
        'bedrooms' => 'boiler >= 2',
    ],
    'js' => <<<'JS'
/* heating kW per bedroom, by how well the property is insulated */
var PER_BEDROOM = { '1': 4.5, '2': 4.0, '3': 3.4, '4': 2.9, '5': 2.5 };
/* hot water: litres per minute from the number of bathrooms */
var LPM = { '1': 9, '2': 9, '3': 12, '4': 12, '5': 12, '6': 12, '7': 15, '8': 15 };

omni.onResult([], function (ctx, v) {
  var kind = Math.round(Number(v.boiler));
  var age = Math.round(Number(v.age));
  if (!isFinite(kind) || !age) {
    ctx.addUnmetCondition('Choose the boiler type and the age of the property.');
    return;
  }
  var perRoom = PER_BEDROOM[String(age)];
  var bedrooms, baths, lpm;

  if (kind === 1) {
    var combo = Math.round(Number(v.bedroomBaths));
    if (!isFinite(combo)) { ctx.addUnmetCondition('Choose how many bedrooms and bathrooms there are.'); return; }
    /* 1: 1bed+1bath … 8: 5bed+2bath */
    bedrooms = combo <= 1 ? 1 : (combo <= 2 ? 2 : (combo <= 4 ? 3 : (combo <= 6 ? 4 : 5)));
    baths = (combo === 3 || combo === 5 || combo === 7 || combo === 8) ? 2 : 1;
    lpm = LPM[String(combo)] || 9;
  } else {
    var rooms = Math.round(Number(v.bedrooms));
    if (!isFinite(rooms)) { ctx.addUnmetCondition('Choose the number of bedrooms.'); return; }
    bedrooms = rooms;
    baths = rooms >= 4 ? 2 : 1;
    lpm = 9 + (baths - 1) * 3;
  }

  var heating = bedrooms * perRoom;
  /* a combi is sized a little above the heating load; a heat-only or system boiler sits at it */
  var low = kind === 1 ? Math.ceil((heating + 4) / 2) * 2 : Math.ceil(heating / 2) * 2;
  var high = kind === 1 ? low + 4 : low + 4;

  ctx.exportValue('heating_kw', sround(heating, 1));
  ctx.exportValue('boiler_kw_low', low);
  ctx.exportValue('boiler_kw_high', high);
  ctx.exportValue('hot_water_lpm', lpm);

  ctx.addHtml('<p><strong>' + low + '–' + high + ' kW</strong> for a ' + bedrooms + '-bedroom house of that '
    + 'age, with a heating load of about ' + snum(heating, 1) + ' kW and ' + lpm
    + ' litres of hot water a minute.</p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Boiler type', ['', 'Combi', 'Heat only', 'System'][kind]],
    ['Bedrooms', String(bedrooms)],
    ['Bathrooms', String(baths)],
    ['Heating load', snum(heating, 1) + ' kW'],
    ['Recommended size', low + '–' + high + ' kW'],
    ['Hot water', lpm + ' L/min']
  ]));
  ctx.addHtml('<p class="calc-unmet">' + (kind === 1
    ? 'A combi serves hot water on demand, so its size is the larger of the heating load and the hot-water '
      + 'rate: one bathroom needs about 9 L/min, two simultaneous showers about 12–15.'
    : 'A heat-only or system boiler is sized on the heating load alone; the hot water cylinder is chosen '
      + 'separately.') + ' A proper heat-loss survey always beats a table like this one.</p>');
});
JS,
];
