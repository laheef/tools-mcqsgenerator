<?php
/**
 * How long to cook a steak, and to what internal temperature.
 *
 * Grilling is timed from the thickness: each side takes the minutes in the
 * table, and the total is twice that. A sear-roast sears both sides and then
 * finishes in a 150 °C oven. The internal temperature is what actually decides
 * doneness, so it is reported alongside the clock.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'minutes_per_side' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'total_minutes' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'target_core_c' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'oven_minutes' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'minutes_per_side', 'vt' => 'dependent', 'l' => 'Minutes per side']]]],
            ['FR1', [[['t' => 'v', 'n' => 'total_minutes', 'vt' => 'dependent', 'l' => 'Total cooking time (min)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'target_core_c', 'vt' => 'dependent', 'l' => 'Internal temperature when done (°C)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'oven_minutes', 'vt' => 'dependent', 'l' => 'Oven time for a sear roast (min)']]]],
        ],
    ]],
    'showIf' => [
        'donesear' => 'method == 2', 'thicksear' => 'method == 2',
        'doneness' => 'method == 1', 'thickness' => 'method == 1',
    ],
    'js' => <<<'JS'
/* minutes per side by thickness (1/2 inch steps) and doneness (rare … well done) */
var GRILL = {
  '1': [1.5, 2.0, 2.5, 3.5],   /* 1/2 in  */
  '2': [2.0, 2.5, 3.0, 4.0],   /* 3/4 in  */
  '3': [2.5, 3.0, 3.5, 4.5],
  '4': [3.0, 3.5, 4.0, 5.0],
  '5': [3.5, 4.0, 4.5, 5.5],
  '6': [4.0, 4.5, 5.0, 6.0],
  '7': [4.5, 5.0, 5.5, 6.5],
  '8': [5.0, 5.5, 6.0, 7.0]
};
/* oven minutes at 150 °C for a seared roast, same thickness steps */
var OVEN = { '1': 6, '2': 9, '3': 12, '4': 15, '5': 18, '6': 21 };

/* pull a steak a few degrees early: it keeps cooking while it rests */
var CORE = { '1': 49, '2': 54, '3': 60, '4': 68 };
var CORE_F = { '1': 120, '2': 130, '3': 140, '4': 155 };

omni.onResult([], function (ctx, v) {
  var method = Math.round(Number(v.method));
  if (!isFinite(method)) { ctx.addUnmetCondition('Choose grilling or a sear roast.'); return; }

  if (method === 1) {
    var doneness = Math.round(Number(v.doneness));
    var thick = Math.round(Number(v.thickness));
    if (!GRILL[String(thick)] || !isFinite(doneness)) {
      ctx.addUnmetCondition('Choose the thickness and the doneness.');
      return;
    }
    var per = GRILL[String(thick)][doneness - 1];
    var core = CORE[String(doneness)], coreF = CORE_F[String(doneness)];
    ctx.exportValue('minutes_per_side', per);
    ctx.exportValue('total_minutes', sround(per * 2, 1));
    ctx.exportValue('target_core_c', core);
    ctx.addHtml('<p><strong>' + snum(per, 1) + ' minutes on each side — ' + snum(per * 2, 1)
      + ' minutes in total</strong> for a ' + snum(thick * 0.635, 2) + ' cm steak at that doneness.</p>');
    ctx.addHtml(stable(['Quantity', 'Value'], [
      ['Thickness', snum(thick * 0.635, 2) + ' cm'],
      ['Minutes per side', snum(per, 1)],
      ['Total', snum(per * 2, 1) + ' min'],
      ['Pull it at', core + ' °C (' + coreF + ' °F)'],
      ['Rest it for', '5–10 minutes, loosely covered']
    ]));
    ctx.addHtml('<p class="calc-unmet">Timings assume a room-temperature steak on a grill preheated to 230 °C. '
      + 'The internal temperature is the real test: a probe thermometer beats the clock every time, and the '
      + 'core keeps rising 3–5 °C while the meat rests.</p>');
    return;
  }

  var ds = Math.round(Number(v.donesear));
  var ts = Math.round(Number(v.thicksear));
  if (!OVEN[String(ts)] || !isFinite(ds)) {
    ctx.addUnmetCondition('Choose the thickness and the doneness for the roast.');
    return;
  }
  /* the oven phase mostly depends on thickness; doneness shifts it a little */
  var base = (OVEN[String(ts)] - 3) * (ts - 1);
  var oven = Math.round(base * (1 + (ds - 1) * 0.18));
  var core2 = CORE[String(ds)];
  ctx.exportValue('minutes_per_side', 2);
  ctx.exportValue('total_minutes', oven + 4);
  ctx.exportValue('target_core_c', core2);
  ctx.exportValue('oven_minutes', oven);
  ctx.addHtml('<p><strong>Sear 2 minutes on each side, then ' + oven + ' minutes in a 150 °C oven</strong> — '
    + (oven + 4) + ' minutes altogether.</p>');
  ctx.addHtml(stable(['Step', 'Time'], [
    ['Sear, first side', '2 min on high heat'],
    ['Sear, second side', '2 min'],
    ['Oven at 150 °C', oven + ' min'],
    ['Pull it at', core2 + ' °C'],
    ['Rest', '10 minutes, loosely covered']
  ]));
  ctx.addHtml('<p class="calc-unmet">A roast this thick cooks from both the pan and the oven, so the oven '
    + 'time is the larger uncertainty — start checking 5 minutes before the estimate and trust the probe.</p>');
});
JS,
];
