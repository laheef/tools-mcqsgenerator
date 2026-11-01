<?php
/**
 * /physics/watts-to-heat — how long a heater takes, and how much it raises the
 * temperature.
 *
 * The harvested page asks for a mass, a substance, a specific heat and a time,
 * but never for the power that gives the page its name, so nothing could be
 * worked out from a filled form. With the power added, the two things a
 * visitor wants are one multiplication and one division:
 *
 *     Q = P·t        ΔT = Q / (m·c)
 */
require_once __DIR__ . '/_builder.php';

return [
    'replaceGroups' => true,
    'replaceJs' => true,
    'hideTexts' => true,
    'vars' => [
        'heater_power' => ['type' => 'numerical', 'rnd' => ['standard', '0']],
        'energy_j' => ['type' => 'numerical', 'rnd' => ['standard', '0']],
        'delta_t' => ['type' => 'numerical', 'rnd' => ['standard', '4']],
    ],
    'groups' => [
        sup_group('supp-heat-in', '', [
            sup_field(sup_num('heater_power', 'Heater power (W)')),
            sup_field(sup_num('time', 'Time switched on (s)')),
            sup_field(sup_num('mass', 'Mass being heated (kg)')),
            sup_field(sup_num('specific_heat_c', 'Specific heat capacity (J/(kg·K))')),
        ]),
    ],
    'outputs' => [
        'energy_j' => 'Heat delivered (J)',
        'delta_t' => 'Temperature rise (K)',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  var p = Number(ctx.getInput('heater_power'));
  var t = Number(ctx.getInput('time'));
  var m = Number(ctx.getInput('mass'));
  var c = Number(ctx.getInput('specific_heat_c'));
  if (!isFinite(p) || !isFinite(t)) { return; }
  var q = p * t;
  ctx.exportValue('energy_j', sround(q, 0));
  if (isFinite(m) && isFinite(c) && m > 0 && c > 0) {
    ctx.exportValue('delta_t', sround(q / (m * c), 4));
  }
});
JS,
];
