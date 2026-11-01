<?php
/**
 * /physics/mixed-air — mixing streams, in psychrometric terms.
 *
 * The harvested page had seven inputs, three of them volumetric flow rates and
 * three dry-bulb temperatures, and a chain of forty formulas that could not run
 * in any order: it begins with a humidity ratio and works backwards to a vapour
 * pressure that only a relative humidity can give, and no box anywhere on the
 * page asks for one. Calculate could only report that the values did not settle
 * the remaining boxes.
 *
 * The mixing itself is conservation of dry air, of water vapour and of energy,
 * with the saturation pressure from the Magnus form. Two or three streams; leave
 * a flow rate at zero and that stream takes no part.
 */
require_once __DIR__ . '/_builder.php';

return [
    'replaceGroups' => true,
    'replaceEq' => true,
    'replaceJs' => true,
    'hideTexts' => true,
    'vars' => [
        'pressure_mix' => ['type' => 'numerical'],
        'flow_rate1' => ['type' => 'numerical'],
        'dry_bulb_temperature1' => ['type' => 'numerical'],
        'relative_humidity1' => ['type' => 'numerical'],
        'flow_rate2' => ['type' => 'numerical'],
        'Dry_bulb_T2' => ['type' => 'numerical'],
        'relative_humidity2' => ['type' => 'numerical'],
        'flow_rate3' => ['type' => 'numerical'],
        'dry_bulb_T3' => ['type' => 'numerical'],
        'relative_humidity3' => ['type' => 'numerical'],
        'humidity_mix' => ['type' => 'dependent', 'rnd' => ['standard', '5']],
        'dry_bulb_mix' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'dew_point_mix' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'enthalpy_mix' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
        'mass_flow_mix' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
    ],
    'groups' => [
        sup_group('supp-air-a', 'The mixing pressure', [
            sup_field(sup_num('pressure_mix', 'Pressure of the mixture (Pa)')),
        ]),
        sup_group('supp-air-1', 'Stream 1', [
            sup_field(sup_num('flow_rate1', 'Volumetric flow rate (m³/s)')),
            sup_field(sup_num('dry_bulb_temperature1', 'Dry-bulb temperature (°C)')),
            sup_field(sup_num('relative_humidity1', 'Relative humidity (%)')),
        ]),
        sup_group('supp-air-2', 'Stream 2', [
            sup_field(sup_num('flow_rate2', 'Volumetric flow rate (m³/s)')),
            sup_field(sup_num('Dry_bulb_T2', 'Dry-bulb temperature (°C)')),
            sup_field(sup_num('relative_humidity2', 'Relative humidity (%)')),
        ]),
        sup_group('supp-air-3', 'Stream 3 (leave the flow at zero to ignore it)', [
            sup_field(sup_num('flow_rate3', 'Volumetric flow rate (m³/s)')),
            sup_field(sup_num('dry_bulb_T3', 'Dry-bulb temperature (°C)')),
            sup_field(sup_num('relative_humidity3', 'Relative humidity (%)')),
        ]),
    ],
    'outputs' => [
        'humidity_mix' => 'Humidity ratio of the mixture (kg/kg dry air)',
        'dry_bulb_mix' => 'Dry-bulb temperature of the mixture (°C)',
        'dew_point_mix' => 'Dew point of the mixture (°C)',
        'enthalpy_mix' => 'Specific enthalpy of the mixture (kJ/kg dry air)',
        'mass_flow_mix' => 'Dry-air mass flow of the mixture (kg/s)',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  var P = Number(ctx.getInput('pressure_mix'));
  if (!isFinite(P) || P <= 0) { P = 101325; }
  var names = [
    ['flow_rate1', 'dry_bulb_temperature1', 'relative_humidity1'],
    ['flow_rate2', 'Dry_bulb_T2', 'relative_humidity2'],
    ['flow_rate3', 'dry_bulb_T3', 'relative_humidity3']
  ];
  /* saturation pressure, Magnus form (Pa); temperatures in °C */
  function psat(t) { return 611.2 * Math.exp(17.62 * t / (243.12 + t)); }
  var mAir = 0, wMix = 0, hMix = 0, any = false;
  for (var i = 0; i < names.length; i++) {
    var flow = Number(ctx.getInput(names[i][0]));
    var t = Number(ctx.getInput(names[i][1]));
    var rh = Number(ctx.getInput(names[i][2]));
    if (flow === null || !isFinite(flow) || flow <= 0) { continue; }
    if (!isFinite(t) || !isFinite(rh)) { continue; }
    if (rh < 0) { rh = 0; }
    if (rh > 100) { rh = 100; }
    var pv = rh / 100 * psat(t);
    if (pv >= P) { return; }
    var w = 0.621945 * pv / (P - pv);          // kg water per kg dry air
    var h = 1.006 * t + w * (2501 + 1.86 * t); // kJ per kg dry air
    var tk = t + 273.15;
    var rho = P / (287.042 * tk);              // dry-air density, kg/m³
    var m = flow * rho;                        // kg/s of dry air
    mAir += m;
    wMix += m * w;
    hMix += m * h;
    any = true;
  }
  if (!any || mAir <= 0) { return; }
  wMix = wMix / mAir;
  hMix = hMix / mAir;
  var tMix = (hMix - 2501 * wMix) / (1.006 + 1.86 * wMix);
  var pvMix = P * wMix / (0.621945 + wMix);
  var tdp = 243.12 * Math.log(pvMix / 611.2) / (17.62 - Math.log(pvMix / 611.2));
  ctx.exportValue('humidity_mix', sround(wMix, 5));
  ctx.exportValue('dry_bulb_mix', sround(tMix, 2));
  ctx.exportValue('dew_point_mix', sround(tdp, 2));
  ctx.exportValue('enthalpy_mix', sround(hMix, 2));
  ctx.exportValue('mass_flow_mix', sround(mAir, 4));
});
JS,
];
