<?php
/**
 * Bike gear calculator.
 *
 * A derailleur drive is a ratio: chainring teeth over sprocket teeth. Multiply
 * that ratio by the wheel's circumference and you have the distance one turn of
 * the cranks covers ("development"); multiply by cadence and you have speed.
 * The harvested page kept the boxes and lost the arithmetic.
 */
return [
    'vars' => [
        'gear_ratio_min' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'gear_ratio_max' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'development_min' => ['type' => 'dependent', 'rnd' => ['standard', '2'], 'du' => 'm'],
        'development_max' => ['type' => 'dependent', 'rnd' => ['standard', '2'], 'du' => 'm'],
        'speed_min' => ['type' => 'dependent', 'rnd' => ['standard', '1'], 'du' => 'kmh'],
        'speed_max' => ['type' => 'dependent', 'rnd' => ['standard', '1'], 'du' => 'kmh'],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'gear_ratio_min', 'vt' => 'dependent',
                       'l' => 'Easiest gear ratio (chainring ÷ cog)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'gear_ratio_max', 'vt' => 'dependent',
                       'l' => 'Hardest gear ratio (chainring ÷ cog)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'development_min', 'vt' => 'dependent',
                       'l' => 'Development, easiest gear', 'du' => 'm']]]],
            ['FR1', [[['t' => 'v', 'n' => 'development_max', 'vt' => 'dependent',
                       'l' => 'Development, hardest gear', 'du' => 'm']]]],
            ['FR1', [[['t' => 'v', 'n' => 'speed_min', 'vt' => 'dependent',
                       'l' => 'Speed at 90 rpm, easiest gear', 'du' => 'kmh']]]],
            ['FR1', [[['t' => 'v', 'n' => 'speed_max', 'vt' => 'dependent',
                       'l' => 'Speed at 90 rpm, hardest gear', 'du' => 'kmh']]]],
        ],
    ]],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var ringMin = Number(v.chainring_min), ringMax = Number(v.chainring_max);
  var cogMin = Number(v.cog_min), cogMax = Number(v.cog_max);
  var wheel = Number(v.wheel_diameter);   // diameter, in the unit the box shows
  var given = ['chainring_min', 'chainring_max', 'cog_min', 'cog_max', 'wheel_diameter']
    .filter(function (k) { return v[k] !== undefined && v[k] !== '' && isFinite(Number(v[k])); });
  if (given.length < 4) {
    ctx.addUnmetCondition('Enter the smallest and largest chainring, the smallest and largest cog, and the wheel diameter.');
    return;
  }
  if (!isFinite(wheel) || wheel <= 0) wheel = 622;   // a 700c wheel in millimetres
  if (!isFinite(ringMin)) ringMin = ringMax;
  if (!isFinite(ringMax)) ringMax = ringMin;
  if (!isFinite(cogMin)) cogMin = cogMax;
  if (!isFinite(cogMax)) cogMax = cogMin;
  if (ringMin <= 0 || ringMax <= 0 || cogMin <= 0 || cogMax <= 0) {
    ctx.addUnmetCondition('Teeth counts have to be above zero.');
    return;
  }

  /* smallest chainring with the largest cog is the easiest gear and vice versa */
  var ratioMin = Math.min(ringMin, ringMax) / Math.max(cogMin, cogMax);
  var ratioMax = Math.max(ringMin, ringMax) / Math.min(cogMin, cogMax);
  var circumference = Math.PI * wheel / 1000;      // metres per wheel turn
  var cadence = 90;

  ctx.exportValue('gear_ratio_min', sround(ratioMin, 2));
  ctx.exportValue('gear_ratio_max', sround(ratioMax, 2));
  ctx.exportValue('development_min', sround(ratioMin * circumference, 2));
  ctx.exportValue('development_max', sround(ratioMax * circumference, 2));
  ctx.exportValue('speed_min', sround(ratioMin * circumference * cadence * 60 / 1000, 1));
  ctx.exportValue('speed_max', sround(ratioMax * circumference * cadence * 60 / 1000, 1));

  var rows = [];
  for (var r = Math.min(ringMin, ringMax); r <= Math.max(ringMin, ringMax); r++) {
    for (var c = Math.min(cogMin, cogMax); c <= Math.max(cogMin, cogMax); c++) {
      var ratio = r / c;
      rows.push([snum(r, 0), snum(c, 0), snum(ratio, 2),
                 snum(ratio * circumference, 2) + ' m',
                 snum(ratio * circumference * cadence * 60 / 1000, 1) + ' km/h']);
    }
  }
  if (rows.length <= 600) {
    ctx.addHtml(stable(['Chainring', 'Cog', 'Ratio', 'Development', 'Speed at 90 rpm'], rows));
  } else {
    ctx.addHtml('<p class="calc-unmet">That range holds ' + rows.length
      + ' gears — too many to list. The ratios and speeds above cover the easiest and hardest of them.</p>');
  }
});
JS,
];
