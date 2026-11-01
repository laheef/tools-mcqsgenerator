<?php
/**
 * Ugly duckling theorem — counting the predicates that tell two objects apart.
 *
 * The page had one field (a "show the table" toggle) and no arithmetic. The
 * theorem's machinery is combinatorial, so that is what the repair computes.
 * A predicate is a conjunction over n Boolean features where each feature may
 * appear as-is, appear negated, or be left out — 3^n predicates in all:
 *
 *   predicates that separate two objects differing in d features = 2^d · 3^(n−d)
 *   predicates that treat them alike                            = 3^n − that
 *
 * The point of the theorem is the shape of that second formula: it depends on
 * how many features differ and never on which ones. No feature outweighs
 * another, so "ugly" is not in the object; it is in the choice of features.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'remove' => ['showTable'],
    'vars' => [
        'features' => ['type' => 'numerical'],
        'differences' => ['type' => 'numerical'],
        'ud_predicates' => sup_dep('0'),
        'ud_subsets' => sup_dep('0'),
        'ud_separate' => sup_dep('0'),
        'ud_alike' => sup_dep('0'),
        'ud_share' => sup_dep('2'),
        'ud_log10' => sup_dep('1'),
    ],
    'groups' => [
        sup_group('supp-ud-inputs', 'The two objects', [
            sup_field(sup_num('features', 'Number of features describing them')),
            sup_field(sup_num('differences', 'How many of those features they differ in')),
        ]),
        sup_group('supp-ud-results', 'Results', [
            sup_field(sup_out('ud_predicates', 'Predicates in all (3 to the n)')),
            sup_field(sup_out('ud_subsets', 'Predicates made only of positive features (2 to the n)')),
            sup_field(sup_out('ud_separate', 'Predicates that tell the two apart')),
            sup_field(sup_out('ud_alike', 'Predicates that treat them the same')),
            sup_field(sup_out('ud_share', 'Share of predicates telling them apart (%)')),
            sup_field(sup_out('ud_log10', 'Size of the predicate set (log10)')),
        ]),
    ],
    'js' => <<<'JS'
function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

omni.onResult(['features', 'differences'], function (ctx, v) {
  var n = num('features');
  var d = num('differences');

  if (n === null || n < 1 || n > 60 || Math.round(n) !== n) {
    ctx.addUnmetCondition('Enter a whole number of features between 1 and 60.');
    return;
  }
  if (d === null || d < 0 || d > n || Math.round(d) !== d) {
    ctx.addUnmetCondition('Enter a whole number of differing features — no more than the features there are.');
    return;
  }

  var predicates = Math.pow(3, n);
  var subsets = Math.pow(2, n);
  var separate = Math.pow(2, d) * Math.pow(3, n - d);
  var alike = predicates - separate;
  var share = separate / predicates * 100;

  ctx.exportValue('ud_predicates', predicates);
  ctx.exportValue('ud_subsets', subsets);
  ctx.exportValue('ud_separate', separate);
  ctx.exportValue('ud_alike', alike);
  ctx.exportValue('ud_share', sround(share, 2));
  ctx.exportValue('ud_log10', sround(Math.log(predicates) / Math.LN10, 1));

  ctx.addHtml('<p><strong>With ' + n + ' features there are ' + predicates.toLocaleString()
    + ' predicates. Two objects that differ in ' + d + ' of them are told apart by '
    + separate.toLocaleString() + ' of those predicates — ' + snum(share, 2) + ' % — and treated alike by '
    + alike.toLocaleString() + '.</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Features', String(n)],
    ['Features the pair differs in', String(d)],
    ['Predicates in all (3 to the n)', predicates.toLocaleString()],
    ['Plain subsets (2 to the n)', subsets.toLocaleString()],
    ['Separating predicates', separate.toLocaleString()],
    ['Predicates treating them alike', alike.toLocaleString()],
    ['Share separating', snum(share, 2) + ' %'],
    ['Ratio alike to separating', snum(alike / Math.max(1, separate), 2) + ' : 1'],
    ['Order of magnitude of the predicate set', '10 to the ' + snum(Math.log(predicates) / Math.LN10, 1)]
  ]));

  /* the same pair of objects, feature by feature: the count never asks which */
  var rows = [];
  for (var k = 0; k <= n; k++) {
    var sep = Math.pow(2, k) * Math.pow(3, n - k);
    rows.push([String(k), sep.toLocaleString(), (predicates - sep).toLocaleString(),
      snum(sep / predicates * 100, 2) + ' %']);
  }
  ctx.addHtml('<p>Every possible number of differing features, for ' + n + ' features:</p>');
  ctx.addHtml(stable(['Features differing', 'Separating predicates', 'Treating them alike', 'Share'],
    rows));

  ctx.addHtml('<p class="calc-unmet">This is the counting behind Watanabe’s theorem. A predicate here is '
    + 'any conjunction of features and their negations — "has feathers and does not quack" is one — and '
    + 'the count 2^d · 3^(n−d) says that whether two objects are separated depends only on how many '
    + 'features differ, not on which. That is the theorem: without weighting the features beforehand, no '
    + 'pair of distinct objects is more similar than any other pair, so a duckling and a swan are exactly '
    + 'as alike as a duckling and a duck. The numbers show why the argument has bite — with ten features '
    + 'the count of predicates is already 59,049, and the pair that differs in one feature is separated by '
    + 'only two thirds of them. The theorem does not say similarity is meaningless; it says similarity is '
    + 'something you choose by choosing features, and any claim that one thing is uglier than another has '
    + 'already smuggled a weighting in.</p>');
});
JS,
];
