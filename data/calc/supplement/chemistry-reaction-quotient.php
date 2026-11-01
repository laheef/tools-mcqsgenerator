<?php
/**
 * Reaction quotient — Q from the concentrations and coefficients you enter.
 *
 * The page shipped a script that computed the right number and wrote it into two
 * variables the definition does not have (`quotient` and `reaction`), so nothing
 * appeared: the panel opened empty and the one sentence it did print stopped at
 * "Q = ". The repair gives the answer somewhere to live:
 *
 *   Q = (products, each raised to its coefficient) ÷ (the same for reactants)
 *
 * Six reactant rows and six product rows, each a species with a coefficient and
 * a concentration; a row left blank is simply not part of the reaction.
 */
require_once __DIR__ . '/_builder.php';

$vars = [
    'precision' => ['type' => 'valueSelect'],
    'quotient' => sup_dep('4'),
    'reactants_used' => sup_dep('0'),
    'products_used' => sup_dep('0'),
    'log_q' => sup_dep('3'),
];
$rows = [];
for ($i = 1; $i <= 6; $i++) {
    $vars['r' . $i . '_s'] = ['type' => 'numerical'];
    $vars['r' . $i . '_c'] = ['type' => 'numerical'];
    $vars['p' . $i . '_s'] = ['type' => 'numerical'];
    $vars['p' . $i . '_c'] = ['type' => 'numerical'];
    $rows[] = sup_field(sup_row(
        sup_num('r' . $i . '_s', 'Reactant ' . $i . ' coefficient'),
        sup_num('r' . $i . '_c', 'Reactant ' . $i . ' concentration (mol/L)'),
        sup_num('p' . $i . '_s', 'Product ' . $i . ' coefficient'),
        sup_num('p' . $i . '_c', 'Product ' . $i . ' concentration (mol/L)')
    ));
}

return [
    'hideTexts' => true,
    'vars' => $vars,
    'groups' => [
        sup_group('supp-q-rows', 'Each species: coefficient and concentration', $rows,
            'Fill in as many rows as the reaction has. A blank row is ignored.'),
        sup_group('supp-q-results', 'Results', [
            sup_field(sup_out('quotient', 'Reaction quotient Q')),
            sup_field(sup_out('log_q', 'log₁₀ Q')),
            sup_field(sup_out('reactants_used', 'Reactant rows counted')),
            sup_field(sup_out('products_used', 'Product rows counted')),
        ]),
    ],
    'js' => <<<'JS'
function readRow(prefix, i) {
  var s = document.querySelector('input[data-var="' + prefix + i + '_s"]');
  var c = document.querySelector('input[data-var="' + prefix + i + '_c"]');
  if (!s || !c) { return null; }
  var sv = String(s.value || '').trim(), cv = String(c.value || '').trim();
  if (sv === '' || cv === '') { return null; }
  var sn = Number(sv), cn = Number(cv);
  if (!isFinite(sn) || !isFinite(cn) || sn <= 0 || cn < 0) { return null; }
  return { coef: sn, conc: cn };
}

omni.onResult([], function (ctx) {
  var reactants = [], products = [], i;
  for (i = 1; i <= 6; i++) {
    var r = readRow('r', i);
    if (r) { reactants.push(r); }
    var p = readRow('p', i);
    if (p) { products.push(p); }
  }

  if (!reactants.length) {
    ctx.addUnmetCondition('Enter at least one reactant — a coefficient and a concentration.');
    return;
  }
  if (!products.length) {
    ctx.addUnmetCondition('Enter at least one product — a coefficient and a concentration.');
    return;
  }

  var num = 1, den = 1;
  reactants.forEach(function (r) { den *= Math.pow(r.conc, r.coef); });
  products.forEach(function (p) { num *= Math.pow(p.conc, p.coef); });

  if (!isFinite(num) || !isFinite(den) || den === 0) {
    ctx.addUnmetCondition('Those concentrations give a quotient of zero or infinity — check the rows.');
    return;
  }

  var q = num / den;
  ctx.exportValue('quotient', q);
  ctx.exportValue('log_q', Math.log(q) / Math.LN10);
  ctx.exportValue('reactants_used', reactants.length);
  ctx.exportValue('products_used', products.length);

  /* the reaction as a line of text, species lettered A, B, C … */
  var letters = 'ABCDEFGHIJKL';
  var left = reactants.map(function (r, k) {
    return snum(r.coef, 0) + '[' + letters[k] + ']';
  }).join(' + ');
  var right = products.map(function (p, k) {
    return snum(p.coef, 0) + '[' + letters[k + reactants.length] + ']';
  }).join(' + ');

  ctx.addHtml('<p><strong>Q = ' + snum(q, 4) + '</strong> for ' + left + ' ⇌ ' + right + '.</p>');

  var table = [['Species', 'Side', 'Coefficient', 'Concentration (mol/L)', 'Raised term']];
  reactants.forEach(function (r, k) {
    table.push([letters[k], 'reactant', snum(r.coef, 0), snum(r.conc, 4),
      snum(Math.pow(r.conc, r.coef), 4)]);
  });
  products.forEach(function (p, k) {
    table.push([letters[k + reactants.length], 'product', snum(p.coef, 0), snum(p.conc, 4),
      snum(Math.pow(p.conc, p.coef), 4)]);
  });
  ctx.addHtml(stable(table[0], table.slice(1)));

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Product term', snum(num, 6)],
    ['Reactant term', snum(den, 6)],
    ['Q', snum(q, 6)],
    ['log₁₀ Q', snum(Math.log(q) / Math.LN10, 3)],
    ['Reactant rows used', String(reactants.length)],
    ['Product rows used', String(products.length)],
    ['Q if every concentration were doubled', snum(Math.pow(2, products.reduce(function (t, p) {
      return t + p.coef; }, 0) - reactants.reduce(function (t, r) { return t + r.coef; }, 0)), 4)]
  ]));

  ctx.addHtml('<p class="calc-unmet">Q is a snapshot: it says what the mixture is doing right now, while '
    + 'the equilibrium constant K says where it would settle. Q below K means the forward reaction is '
    + 'favoured, Q above K means the reverse, Q equal to K means the mixture is already at equilibrium — '
    + 'this page has no K, so make that comparison with the K for your conditions. Coefficients become '
    + 'exponents, and only species you list take part: a solvent or a solid is left out of the expression '
    + 'entirely, because its activity is one. Concentrations must be in mol/L and, for gases, partial '
    + 'pressures use a separate convention — do not mix the two in one quotient. A zero concentration for a '
    + 'product makes Q zero and the log undefined; the calculator refuses that row rather than returning '
    + '−∞.</p>');
});
JS,
];
