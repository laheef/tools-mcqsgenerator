<?php
/**
 * /physics/flyback-converter — a design sheet that could not be filled in.
 *
 * The harvested form asked for five numbers and worked out six, but its
 * formulas were left as bare expressions with the wrong subjects: the duty
 * cycle came out of an equation that already contained the duty cycle, so
 * nothing could ever start, and the winding ratio — the number every other
 * result depends on — had no way in. Pressing Calculate on it answered "the
 * values entered do not settle the remaining boxes" whatever was typed.
 *
 * The design relations used here are the standard discontinuous-mode ones, from
 * the quantities the page actually asks for. `V_rect` is the reverse voltage the
 * secondary rectifier must stand off, which pins the winding ratio:
 *
 *   N   = (V_rect - V_out) / V_in          secondary turns per primary turn
 *   D   = V_out / (V_in·N + V_out)         from V_out = V_in·N·D/(1-D)
 *   I_pk(sec) = 2·I_out/(1 - D)            triangular current, average I_out
 *   L_s = V_out·(1 - D)/(I_pk·f)           the secondary inductance that sizes it
 *   I_pk(pri) = N·I_pk(sec),  L_p = N²·L_s
 */
require_once __DIR__ . '/_builder.php';

return [
    'replaceGroups' => true,
    'replaceEq' => true,
    'replaceJs' => true,
    'hideTexts' => true,
    'vars' => [
        'V_in' => ['type' => 'numerical'],
        'V_out' => ['type' => 'numerical'],
        'V_rect' => ['type' => 'numerical'],
        'I_out' => ['type' => 'numerical'],
        'frequency_s' => ['type' => 'numerical'],
        'windings_ratio' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'duty_cycle' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'peak_current_s' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'inductance_s' => ['type' => 'dependent', 'rnd' => ['standard', '3']],
        'peak_current_p' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'inductance_p' => ['type' => 'dependent', 'rnd' => ['standard', '3']],
    ],
    'groups' => [
        sup_group('supp-fly-in', 'Your design', [
            sup_field(sup_num('V_in', 'Input voltage (V)')),
            sup_field(sup_num('V_out', 'Output voltage (V)')),
            sup_field(sup_num('V_rect', 'Voltage the rectifier must stand off (V)')),
            sup_field(sup_num('I_out', 'Output current (A)')),
            sup_field(sup_num('frequency_s', 'Switching frequency (Hz)')),
        ]),
    ],
    'outputs' => [
        'windings_ratio' => 'Secondary-to-primary turns ratio',
        'duty_cycle' => 'Duty cycle',
        'peak_current_s' => 'Peak secondary current (A)',
        'inductance_s' => 'Secondary inductance (µH)',
        'peak_current_p' => 'Peak primary current (A)',
        'inductance_p' => 'Primary inductance (µH)',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  var vin = Number(ctx.getInput('V_in'));
  var vout = Number(ctx.getInput('V_out'));
  var vrect = Number(ctx.getInput('V_rect'));
  var iout = Number(ctx.getInput('I_out'));
  var f = Number(ctx.getInput('frequency_s'));
  if (!isFinite(vin) || !isFinite(vout) || !isFinite(vrect) || !isFinite(iout) || !isFinite(f)) { return; }
  if (vin <= 0 || vout <= 0 || f <= 0 || iout <= 0) { return; }
  var N = (vrect - vout) / vin;
  if (!(N > 0)) { return; }                     // the rectifier has to stand off more than the output
  var D = vout / (vin * N + vout);
  if (!(D > 0 && D < 1)) { return; }
  var ipkS = 2 * iout / (1 - D);
  var Ls = vout * (1 - D) / (ipkS * f);   // henries
  ctx.exportValue('windings_ratio', sround(N, 4));
  ctx.exportValue('duty_cycle', sround(D, 4));
  ctx.exportValue('peak_current_s', sround(ipkS, 4));
  ctx.exportValue('inductance_s', sround(Ls * 1e6, 3));
  ctx.exportValue('peak_current_p', sround(ipkS * N, 4));
  ctx.exportValue('inductance_p', sround(Ls * N * N * 1e6, 3));
});
JS,
];
