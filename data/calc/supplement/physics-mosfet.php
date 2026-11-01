<?php
/**
 * /physics/mosfet — the drain current, at last.
 *
 * The harvested page carried seven inputs and four results, and none of its
 * seven formulas could run: three of them name variables the record does not
 * contain (`area`, `resistance`, `voltage_volts`), two call helpers with the
 * wrong arguments, and the two that could run produce a K parameter from a
 * current that is itself a result. Nothing settled, so Calculate always
 * answered that the numbers were not enough.
 *
 * The textbook relations are short. With Cox the oxide capacitance per unit
 * area, W and L the channel dimensions and µn the electron mobility:
 *
 *   K = µn·Cox·W/L
 *   triode:      I_D = K·[(V_GS - V_T)·V_DS - V_DS²/2]      when V_DS < V_GS - V_T
 *   saturation:  I_D = (K/2)·(V_GS - V_T)²                   when V_DS ≥ V_GS - V_T
 */
require_once __DIR__ . '/_builder.php';

return [
    'replaceGroups' => true,
    'replaceEq' => true,
    'replaceJs' => true,
    'hideTexts' => true,
    'vars' => [
        'V_threshold' => ['type' => 'numerical'],
        'V_gate_source' => ['type' => 'numerical'],
        'V_drain_source' => ['type' => 'numerical'],
        'capacitance_oxide' => ['type' => 'numerical'],
        'width' => ['type' => 'numerical'],
        'length' => ['type' => 'numerical'],
        'electron_mobility' => ['type' => 'numerical'],
        'KMos' => ['type' => 'dependent', 'rnd' => ['standard', '8']],
        'I_triode' => ['type' => 'dependent', 'rnd' => ['standard', '8']],
        'I_saturation' => ['type' => 'dependent', 'rnd' => ['standard', '8']],
        'I_cut_off' => ['type' => 'dependent', 'rnd' => ['standard', '8']],
    ],
    'groups' => [
        sup_group('supp-mos-in', 'The device', [
            sup_field(sup_num('V_threshold', 'Threshold voltage V_T (V)')),
            sup_field(sup_num('V_gate_source', 'Gate-source voltage V_GS (V)')),
            sup_field(sup_num('V_drain_source', 'Drain-source voltage V_DS (V)')),
        ]),
        sup_group('supp-mos-geo', 'Its geometry', [
            sup_field(sup_num('capacitance_oxide', 'Oxide capacitance per unit area C_ox (F/m²)')),
            sup_field(sup_num('width', 'Channel width W (m)')),
            sup_field(sup_num('length', 'Channel length L (m)')),
            sup_field(sup_num('electron_mobility', 'Electron mobility µ_n (m²/V·s)')),
        ]),
    ],
    'outputs' => [
        'KMos' => 'K parameter (A/V²)',
        'I_triode' => 'Drain current, triode formula (A)',
        'I_saturation' => 'Drain current, saturation formula (A)',
        'I_cut_off' => 'Drain current in this bias (A)',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  var vt = Number(ctx.getInput('V_threshold'));
  var vgs = Number(ctx.getInput('V_gate_source'));
  var vds = Number(ctx.getInput('V_drain_source'));
  var cox = Number(ctx.getInput('capacitance_oxide'));
  var w = Number(ctx.getInput('width'));
  var l = Number(ctx.getInput('length'));
  var mu = Number(ctx.getInput('electron_mobility'));
  if (!isFinite(vt) || !isFinite(vgs) || !isFinite(vds) || !isFinite(cox) || !isFinite(w) || !isFinite(l) || !isFinite(mu)) { return; }
  if (l <= 0 || w <= 0 || cox <= 0 || mu <= 0) { return; }
  var vov = vgs - vt;
  if (vov <= 0) {                       // below threshold: the channel never forms
    ctx.exportValue('KMos', sround(mu * cox * w / l, 8));
    ctx.exportValue('I_triode', 0);
    ctx.exportValue('I_saturation', 0);
    ctx.exportValue('I_cut_off', 0);
    return;
  }
  var K = mu * cox * w / l;
  var iTri = K * (vov * vds - vds * vds / 2);
  var iSat = K * vov * vov / 2;
  ctx.exportValue('KMos', sround(K, 8));
  ctx.exportValue('I_saturation', sround(iSat, 8));
  ctx.exportValue('I_triode', sround(iTri > 0 ? iTri : 0, 8));
  ctx.exportValue('I_cut_off', sround(vds >= vov ? iSat : (iTri > 0 ? iTri : 0), 8));
});
JS,
];
