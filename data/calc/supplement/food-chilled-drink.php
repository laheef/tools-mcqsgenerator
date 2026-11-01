<?php
/**
 * Chilled drink — how long a bottle takes to reach the temperature you want.
 *
 * The harvested page kept its whole answer inside `main_function()`, a lumped-
 * capacitance cooling model that nothing ever called, and it carried forty
 * per-drink variables that were never wired to the form. The visible form was a
 * drink picker, an initial-temperature picker and an ambient picker.
 *
 * The model here is the same physics, written out so the page can run it:
 *
 *   heat capacity  C = m · (4186 · (1 − a) + 2400 · a)      a = alcohol fraction
 *   surface area   A ≈ 7 · V^(2/3)                          a bottle or can
 *   heat transfer  h ≈ 10 W/m²K in air, 300 in water or ice
 *   time constant  τ = C / (h · A)
 *   cooling time   t = τ · ln((T₀ − Tₐ) / (T − Tₐ))
 *
 * which is Newton's law of cooling with the drink treated as one lump — accurate
 * for a bottle, and the reason the answer is a good estimate rather than a
 * promise.
 */
return [
    'hideTexts' => true,
    'showIf' => [
        'container_type_beer_VS' => 'drink_type_VS == 4',
        'desired_temperature_beer_VS' => 'drink_type_VS == 4',
        'container_type_wine_VS' => 'drink_type_VS == 3',
        'desired_temperature_wine_VS' => 'drink_type_VS == 3',
        'container_type_spirit_VS' => 'drink_type_VS == 5',
        'desired_temperature_spirit_VS' => 'drink_type_VS == 5',
        'container_type_water_VS' => 'drink_type_VS == 0',
        'desired_temperature_water_VS' => 'drink_type_VS == 0',
        'container_type_soft_or_juice_VS' => 'drink_type_VS == 1 or drink_type_VS == 2',
        'desired_temperature_soft_drinks_VS' => 'drink_type_VS == 1',
        'desired_temperature_juice_VS' => 'drink_type_VS == 2',
    ],
    'vars' => [
        'custom_initial_C' => ['type' => 'numerical', 'label' => 'Initial temperature, only if you chose Custom (°C)'],
        'custom_ambient_C' => ['type' => 'numerical', 'label' => 'Ambient temperature, only if you chose Custom (°C)'],
        'custom_desired_C' => ['type' => 'numerical', 'label' => 'Drinking temperature, only if you chose Custom (°C)'],
        'cool_minutes' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'cool_minutes_water' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'volume_litres' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'tau_minutes' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'warm_minutes' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-chill-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'cool_minutes', 'vt' => 'dependent', 'l' => 'Minutes to reach your temperature in air (fridge, freezer, room)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'cool_minutes_water', 'vt' => 'dependent', 'l' => 'Minutes in water or an ice bath']]]],
            ['FR1', [[['t' => 'v', 'n' => 'warm_minutes', 'vt' => 'dependent', 'l' => 'Minutes if the drink is colder than its surroundings']]]],
            ['FR1', [[['t' => 'v', 'n' => 'volume_litres', 'vt' => 'dependent', 'l' => 'Volume of the container (litres)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'tau_minutes', 'vt' => 'dependent', 'l' => 'Cooling time constant (minutes)']]]],
        ],
    ]],
    'js' => <<<'JS'
/* the six drinks, in the order the picker lists them */
var DRINKS = [
  { name: 'Water',      alcohol: 0,     volume: 'container_type_water_VS',          want: 'desired_temperature_water_VS' },
  { name: 'Soft drinks', alcohol: 0,    volume: 'container_type_soft_or_juice_VS',  want: 'desired_temperature_soft_drinks_VS' },
  { name: 'Iced coffee / juice / tea', alcohol: 0, volume: 'container_type_soft_or_juice_VS', want: 'desired_temperature_juice_VS' },
  { name: 'Wine',       alcohol: 0.135, volume: 'container_type_wine_VS',          want: 'desired_temperature_wine_VS' },
  { name: 'Beer',       alcohol: 0.06,  volume: 'container_type_beer_VS',          want: 'desired_temperature_beer_VS' },
  { name: 'Spirit',     alcohol: 0.40,  volume: 'container_type_spirit_VS',        want: 'desired_temperature_spirit_VS' }
];

/*
 * A choice field is a drop-down when it has many options and a row of radio
 * buttons when it has few, and the radio values are opaque ids rather than the
 * numbers behind them. Both kinds are therefore read the same way: take the
 * text of the option that is chosen and pick the numbers out of it.
 */
function chosenText(name) {
  var sel = document.querySelector('select[data-var="' + name + '"]');
  if (sel && sel.selectedIndex >= 0) {
    return (sel.options[sel.selectedIndex].text || '').trim();
  }
  var radios = document.querySelectorAll('input[type="radio"][name="' + name + '"]');
  for (var i = 0; i < radios.length; i++) {
    if (radios[i].checked) {
      var host = radios[i].closest('label') || radios[i].parentNode;
      return (host.innerText || host.textContent || '').replace(/\s+/g, ' ').trim();
    }
  }
  return '';
}

/* "(330 ml)", "(0.5L)" or "(12 oz)" -> litres */
function volumeFrom(text) {
  var m = text.match(/\(([\d.]+)\s*ml/i);
  if (m) { return Number(m[1]) / 1000; }
  m = text.match(/([\d.]+)\s*L\b/);
  if (m) { return Number(m[1]); }
  m = text.match(/([\d.]+)\s*oz/i);
  if (m) { return Number(m[1]) * 0.0295735; }
  return null;
}

/* the first "(-6 °C" in a label, in celsius */
function tempFrom(text) {
  var m = text.match(/(-?[\d.]+)\s*°C/);
  return m ? Number(m[1]) : null;
}

/* the model: minutes to move from t0 to t in an environment of ta */
function coolMinutes(volumeM3, alcohol, t0, ta, t, hOut) {
  var mass = volumeM3 * 1000;                      /* kg, the drink is mostly water */
  var capacity = mass * (4186 * (1 - alcohol) + 2400 * alcohol);   /* J/K */
  var area = 7 * Math.pow(volumeM3, 2 / 3);        /* m², a bottle or a can */
  var tau = capacity / (hOut * area);              /* seconds */
  var ratio = (t0 - ta) / (t - ta);
  if (!isFinite(ratio) || ratio <= 0) { return null; }
  return tau * Math.log(ratio) / 60;
}

omni.onResult(['drink_type_VS', 'initial_temperature_VS', 'ambient_temperature_VS'], function (ctx, v) {
  /*
   * The drink picker's option values are alcohol percentages, and three of the
   * six drinks share the value 0, so the chosen drink is identified by its
   * position in the list rather than by its value.
   */
  var drinkText = chosenText('drink_type_VS');
  var d = -1;
  for (var i = 0; i < DRINKS.length; i++) {
    if (drinkText.toLowerCase().indexOf(DRINKS[i].name.split(' ')[0].toLowerCase()) === 0) { d = i; }
  }
  if (d < 0) {
    ctx.addUnmetCondition('Choose what is in the bottle.');
    return;
  }
  var drink = DRINKS[d];

  var t0 = tempFrom(chosenText('initial_temperature_VS'));
  if (t0 === null) {
    var c0 = Number(v.custom_initial_C);
    t0 = v.custom_initial_C !== '' && isFinite(c0) ? c0 : null;
  }
  var ambientText = chosenText('ambient_temperature_VS');
  var ta = tempFrom(ambientText);
  if (ta === null) {
    var ca = Number(v.custom_ambient_C);
    ta = v.custom_ambient_C !== '' && isFinite(ca) ? ca : null;
  }
  /* the two "Custom" surroundings differ in what the drink is standing in */
  var ambientWet = /water/i.test(ambientText);
  if (t0 === null) {
    ctx.addUnmetCondition('Choose the temperature the drink starts at (or type it in the Custom box).');
    return;
  }
  if (ta === null) {
    ctx.addUnmetCondition('Choose where the drink is cooling (or type the air temperature in the Custom box).');
    return;
  }

  /* the label gives litres; the model works in cubic metres */
  var volume = volumeFrom(chosenText(drink.volume));
  if (volume !== null) { volume = volume / 1000; }
  if (volume === null || volume <= 0) {
    ctx.addUnmetCondition('Choose the container the drink is in.');
    return;
  }
  var t = tempFrom(chosenText(drink.want));
  if (t === null) {
    var cd = Number(v.custom_desired_C);
    t = v.custom_desired_C !== '' && isFinite(cd) ? cd : null;
  }
  if (t === null || !isFinite(t)) {
    ctx.addUnmetCondition('Choose the temperature you want to drink it at.');
    return;
  }

  var inAir = coolMinutes(volume, drink.alcohol, t0, ta, t, 10);
  var inWater = coolMinutes(volume, drink.alcohol, t0, ta, t, 300);
  if (ambientWet && inWater !== null && inWater > 0) { inAir = inWater; }

  if (inAir === null || inWater === null) {
    ctx.addUnmetCondition('Those temperatures never meet — the drink cannot reach ' + snum(t, 1)
      + ' °C in surroundings of ' + snum(ta, 1) + ' °C. Pick a colder place, or a warmer target.');
    return;
  }

  /* negative means the drink is going to warm up rather than chill */
  var warming = inAir < 0;
  var air = Math.abs(inAir), water = Math.abs(inWater);

  var mass = volume * 1000;
  var capacity = mass * (4186 * (1 - drink.alcohol) + 2400 * drink.alcohol);
  var area = 7 * Math.pow(volume, 2 / 3);
  var tauMin = capacity / (10 * area) / 60;

  ctx.exportValue('cool_minutes', Math.round(air));
  ctx.exportValue('cool_minutes_water', Math.round(water));
  ctx.exportValue('warm_minutes', warming ? Math.round(air) : 0);
  ctx.exportValue('volume_litres', sround(volume * 1000, 2));
  ctx.exportValue('tau_minutes', sround(tauMin, 1));

  var hours = function (min) {
    return min >= 120 ? snum(min / 60, 1) + ' hours (' + snum(min, 0) + ' min)' : snum(min, 0) + ' min';
  };

  ctx.addHtml('<p><strong>' + snum(volume * 1000, 2) + ' L of ' + drink.name.toLowerCase() + ', from '
    + snum(t0, 1) + ' °C down to ' + snum(t, 1) + ' °C in ' + snum(ta, 1) + ' °C surroundings: about '
    + hours(air) + ' in air, or ' + hours(water) + ' standing in water or an ice bath.</strong>'
    + (warming ? ' The drink is already colder than its surroundings, so what happens is the opposite: it '
      + 'warms up, and the same physics gives that time.' : '') + '</p>');

  var rows = [
    ['Drink', drink.name],
    ['Volume', snum(volume * 1000, 2) + ' L (' + snum(volume * 33814, 0) + ' fl oz)'],
    ['Alcohol', snum(drink.alcohol * 100, 1) + ' % by volume'],
    ['Mass', snum(mass, 2) + ' kg'],
    ['Surface area', snum(area, 4) + ' m²'],
    ['Heat capacity', snum(capacity, 0) + ' J/K'],
    ['Time constant', snum(tauMin, 1) + ' min in air'],
    ['In air (h = 10 W/m²K)', hours(air)],
    ['In water or ice (h = 300 W/m²K)', hours(water)],
    ['Speed-up from water', 'about ' + snum(air / water, 1) + '× faster']
  ];
  ctx.addHtml(stable(['Item', 'Value'], rows));

  /* the same bottle at the other surroundings on the page */
  var places = [
    ['Fridge (4 °C)', 4], ['Freezer (-18 °C)', -18], ['Wine cellar (15 °C)', 15],
    ['Ice bath (0 °C, in water)', 0], ['Ice + salt bath (-6 °C, in water)', -6],
    ['Room (20 °C)', 20]
  ];
  var placeRows = places.map(function (p) {
    var wet = /bath/i.test(p[0]);
    var mins = coolMinutes(volume, drink.alcohol, t0, p[1], t, wet ? 300 : 10);
    if (mins === null || mins < 0) {
      return [p[0], 'cannot reach ' + snum(t, 1) + ' °C', '—'];
    }
    return [p[0], hours(Math.abs(mins)), wet ? 'water' : 'air'];
  });
  ctx.addHtml('<p>This container in every place the page offers:</p>');
  ctx.addHtml(stable(['Where', 'Time to ' + snum(t, 1) + ' °C', 'Contact'], placeRows));

  ctx.addHtml('<p class="calc-unmet">Newton\'s law of cooling says the drink approaches the temperature of '
    + 'its surroundings exponentially, and the time constant above is how long it takes to close about '
    + '63 % of the gap. That is why the last couple of degrees take as long as the first ten, and why a '
    + 'drink can never go below the temperature of the room it is standing in. The model treats the bottle '
    + 'as one lump: in reality the outside cools first, a glass conducts better than a thin can, a can '
    + 'cooled in air on a shelf cools more slowly than one on a wire rack, and a drink with ice in it is a '
    + 'different problem again. Standing the drink in a bowl of water, with ice and a spoonful of salt, is '
    + 'roughly fifteen minutes for a standard bottle and is the fastest of the methods here.</p>');
});
JS,
];
