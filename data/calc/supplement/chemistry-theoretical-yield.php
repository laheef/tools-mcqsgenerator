<?php
/**
 * /chemistry/theoretical-yield — a seed for the chain.
 *
 * Every equation in the harvested definition is a stage that needs the stage
 * before it, and the two values that could start the chain (the limiting mass
 * and the desired yield) are marked as results — so the traversal had nothing
 * to begin from and the page asked for a value it never offered a box for.
 * The arithmetic of a theoretical yield is four lines:
 *
 *     n(limiting) = m / M            n(desired) = n(limiting)·ν_desired/ν_limiting
 *     m(desired)  = n(desired)·M_desired
 */
require_once __DIR__ . '/_builder.php';

return [
    'replaceGroups' => true,
    'replaceEq' => true,
    'replaceJs' => true,
    'hideTexts' => true,
    'vars' => [
        'limitingMass' => ['type' => 'numerical'],
        'limitingMolecularWeight' => ['type' => 'numerical'],
        'limitingStoichiometry' => ['type' => 'numerical'],
        'desiredStoichiometry' => ['type' => 'numerical'],
        'desiredMolecularWeight' => ['type' => 'numerical'],
        'limitingMole' => ['type' => 'numerical', 'rnd' => ['standard', '6']],
        'desiredMole' => ['type' => 'numerical', 'rnd' => ['standard', '6']],
        'desiredYield' => ['type' => 'numerical', 'rnd' => ['standard', '4']],
    ],
    'groups' => [
        sup_group('supp-yield-lim', 'The limiting reagent', [
            sup_field(sup_num('limitingMass', 'Mass of the limiting reagent (g)')),
            sup_field(sup_num('limitingMolecularWeight', 'Its molecular weight (g/mol)')),
            sup_field(sup_num('limitingStoichiometry', 'Its coefficient in the equation')),
        ]),
        sup_group('supp-yield-des', 'The product you want', [
            sup_field(sup_num('desiredStoichiometry', 'Its coefficient in the equation')),
            sup_field(sup_num('desiredMolecularWeight', 'Its molecular weight (g/mol)')),
        ]),
    ],
    'outputs' => [
        'limitingMole' => 'Moles of limiting reagent',
        'desiredMole' => 'Moles of product',
        'desiredYield' => 'Theoretical yield (g)',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx) {
  var m = Number(ctx.getInput('limitingMass'));
  var M = Number(ctx.getInput('limitingMolecularWeight'));
  var nuL = Number(ctx.getInput('limitingStoichiometry'));
  var nuD = Number(ctx.getInput('desiredStoichiometry'));
  var Md = Number(ctx.getInput('desiredMolecularWeight'));
  if (!isFinite(nuL) || nuL <= 0) { nuL = 1; }
  if (!isFinite(nuD) || nuD <= 0) { nuD = 1; }
  if (!isFinite(m) || !isFinite(M) || M <= 0) { return; }
  var nL = m / M;
  var nD = nL * nuD / nuL;
  ctx.exportValue('limitingMole', sround(nL, 6));
  ctx.exportValue('desiredMole', sround(nD, 6));
  if (isFinite(Md) && Md > 0) { ctx.exportValue('desiredYield', sround(nD * Md, 4)); }
});
JS,
];
