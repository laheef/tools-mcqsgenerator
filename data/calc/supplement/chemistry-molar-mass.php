<?php
/**
 * Molar mass — the total and the tidy formula, neither of which could land.
 *
 * The script summed element mass × count into `totalgmol` and joined a formula
 * string into `chemicalFormulaPretty`; both names are undeclared, so the page
 * computed the answer, published it into nothing, and left the panel empty —
 * Calculate then said "Every field already has a value, so there is nothing
 * left to work out".
 *
 * The repair declares both rows and tidies the formula: the page marks
 * subscripts with `==2==`, a convention its own front end understood and ours
 * prints literally, so the braces are turned into real subscript characters.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'totalgmol'             => ['label' => 'Molar mass, g/mol', 'precision' => '4'],
        'chemicalFormulaPretty' => ['label' => 'Chemical formula'],
    ],
    'js' => <<<'JS'
/* "H==2==O" -> "H₂O"; the page's own subscript markup, decoded for display. */
function mmFormula(text) {
  var sub = {'0': '₀', '1': '₁', '2': '₂', '3': '₃', '4': '₄', '5': '₅', '6': '₆', '7': '₇', '8': '₈', '9': '₉'};
  return String(text || '').replace(/==(\d+)==/g, function (all, digits) {
    return digits.split('').map(function (d) { return sub[d] || d; }).join('');
  });
}

omni.onResult(['A1'], function (ctx, values) {
  var mass = Number(values.totalgmol);
  if (!isFinite(mass) || mass <= 0) {
    ctx.exportValue('totalgmol', null);
    ctx.exportValue('chemicalFormulaPretty', null);
    ctx.addUnmetCondition('Enter the atomic mass and the atom count for at least one element.');
    return;
  }
  var formula = mmFormula(values.chemicalFormulaPretty);
  ctx.exportValue('chemicalFormulaPretty', formula);

  /* only count an atom whose element was actually chosen: the count lists
     keep their first entry ("1") even when the element beside them is blank */
  var atoms = 0;
  for (var i = 1; i <= 6; i++) {
    var chosen = document.querySelector('.calc-widget select[data-var="A' + i + '"]');
    var q = Number(values['Q' + i]);
    if (chosen && chosen.value && isFinite(q) && q > 0) { atoms += q; }
  }
  ctx.addHtml('<p><strong>' + (formula ? sesc(formula) + ' — ' : '') + snum(mass, 4) + ' g/mol</strong></p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Formula', formula || '—'],
    ['Molar mass', snum(mass, 4) + ' g/mol'],
    ['Atoms in the formula', snum(atoms, 0)],
    ['Mass of one molecule', (mass / 6.02214076e23).toExponential(4) + ' g'],
    ['Mass of 1 mmol', snum(mass / 1000, 6) + ' g']
  ]));
  ctx.addHtml('<p class="calc-note">The molar mass is the sum of every atom\'s atomic weight in the formula, so '
    + 'it is a property of the formula and not of the sample. The weights are the standard average values, '
    + 'which is why water\'s mass is not a whole number: natural hydrogen and oxygen are '
    + 'mixtures of isotopes. A millimole is a thousandth of a mole, and one molecule\'s mass divides by '
    + 'Avogadro\'s number, 6.02214076 × 10²³ per mole.</p>');
});
JS,
];
