<?php
/**
 * /physics/coulombs-law — the force between two charges, stated.
 *
 * The harvested form pairs a "same or different charge" picker with five
 * overlapping boxes and equations that reference variables the form does not
 * offer, so Calculate answered nothing. Two charges, a distance and a
 * permittivity are enough:
 *
 *     F = k·q₁·q₂ / (ε_r·r²)          k = 8.9875517923 × 10⁹ N·m²/C²
 *     E = F / q₂
 */
require_once __DIR__ . '/_builder.php';

return [
    'replaceGroups' => true,
    'replaceJs' => true,
    'hideTexts' => true,
    'vars' => [
        'force_n' => ['type' => 'numerical', 'rnd' => ['standard', '6']],
        'field_e' => ['type' => 'numerical', 'rnd' => ['standard', '6']],
    ],
    'groups' => [
        sup_group('supp-coulomb-in', '', [
            sup_field(sup_num('charge1', 'Charge 1 (C)')),
            sup_field(sup_num('charge2', 'Charge 2 (C)')),
            sup_field(sup_num('distance', 'Distance between them (m)')),
            sup_field(sup_num('relative_permittivity', 'Relative permittivity εr (1 for vacuum)')),
        ]),
    ],
    'outputs' => [
        'force_n' => 'Force between the charges (N)',
        'field_e' => 'Field of charge 1 at charge 2 (V/m)',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  var K = 8.9875517923e9;
  var q1 = Number(ctx.getInput('charge1'));
  var q2 = Number(ctx.getInput('charge2'));
  var r = Number(ctx.getInput('distance'));
  var er = Number(ctx.getInput('relative_permittivity'));
  if (!isFinite(er) || er <= 0) { er = 1; }
  if (!isFinite(q1) || !isFinite(q2) || !isFinite(r) || r <= 0) { return; }
  var f = K * q1 * q2 / (er * r * r);
  ctx.exportValue('force_n', sround(f, 6));
  ctx.exportValue('field_e', sround(K * q1 / (er * r * r), 6));
  if (f < 0) {
    ctx.addUnmetCondition('The force is negative: the charges have opposite signs and attract.');
  }
});
JS,
];
