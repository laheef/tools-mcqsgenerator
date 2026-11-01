<?php
/**
 * Rabbit colour — what colours a litter can be, from the parents' genes.
 *
 * The page carried a large set of gene drop-downs and a script full of helper
 * functions, but nothing ever computed: the helpers were defined and never
 * called, so Calculate produced no answer. The repair replaces the form with the
 * five loci that actually decide coat colour and works out the offspring:
 *
 *   A  agouti banding    A_ agouti, aa self
 *   B  black or brown    B_ black, bb chocolate
 *   C  colour            C_ coloured, cc albino (recessive, hides the rest)
 *   D  density           D_ dense, dd dilute
 *   E  extension         E_ normal, ee red/fawn/tortoiseshell
 *
 * Each parent's locus is entered as the number of dominant alleles it carries —
 * 2 for a homozygote, 1 for a carrier, 0 for a double recessive. The twenty-odd
 * checkbox lists on the old page were cosmetic variants of these five.
 */
require_once __DIR__ . '/_builder.php';

$loci = [
    'A' => 'Agouti banding (A dominant over a)',
    'B' => 'Black or chocolate (B dominant over b)',
    'C' => 'Full colour (C dominant over c)',
    'D' => 'Dense colour (D dominant over d)',
    'E' => 'Extension (E dominant over e)',
];

$vars = [];
$groups = [];
foreach ($loci as $locus => $label) {
    $vars['sire_' . $locus] = ['type' => 'numerical'];
    $vars['dam_' . $locus] = ['type' => 'numerical'];
}
$vars += [
    'rb_albino' => sup_dep('1'),
    'rb_nonext' => sup_dep('1'),
    'rb_chestnut' => sup_dep('1'),
    'rb_agouti_other' => sup_dep('1'),
    'rb_self_black' => sup_dep('1'),
    'rb_self_other' => sup_dep('1'),
    'rb_coloured' => sup_dep('1'),
    'rb_top' => sup_dep('1'),
];

$sireRows = [];
$damRows = [];
foreach ($loci as $locus => $label) {
    $sireRows[] = sup_field(sup_num('sire_' . $locus, 'Sire, ' . $label . ' — dominant alleles (0, 1 or 2)'));
    $damRows[] = sup_field(sup_num('dam_' . $locus, 'Dam, ' . $label . ' — dominant alleles (0, 1 or 2)'));
}

return [
    'hideTexts' => true,
    'vars' => $vars,
    'groups' => [
        sup_group('supp-rabbit-sire', 'The sire (father)', $sireRows),
        sup_group('supp-rabbit-dam', 'The dam (mother)', $damRows),
        sup_group('supp-rabbit-results', 'Results — chance of each colour in a kitten', [
            sup_field(sup_out('rb_albino', 'Albino (ruby-eyed white) %')),
            sup_field(sup_out('rb_nonext', 'Non-extension — red, fawn, tortoiseshell %')),
            sup_field(sup_out('rb_chestnut', 'Agouti, black-based — chestnut %')),
            sup_field(sup_out('rb_agouti_other', 'Agouti in chocolate, opal, cinnamon or lilac %')),
            sup_field(sup_out('rb_self_black', 'Self black %')),
            sup_field(sup_out('rb_self_other', 'Self in chocolate, blue or lilac %')),
            sup_field(sup_out('rb_coloured', 'Not albino %')),
            sup_field(sup_out('rb_top', 'Most likely colour class — chance %')),
        ]),
    ],
    'js' => <<<'JS'
var LOCI = ['A', 'B', 'C', 'D', 'E'];

function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

/* offspring dominant-allele count: 0, 1 or 2 with its probability */
function cross(sire, dam) {
  var qs = sire / 2, qd = dam / 2;
  return [
    { k: 2, p: qs * qd },
    { k: 1, p: qs * (1 - qd) + (1 - qs) * qd },
    { k: 0, p: (1 - qs) * (1 - qd) }
  ];
}

/* the coat a set of five counts describes */
function coat(g) {
  if (g.C === 0) { return 'Albino (ruby-eyed white)'; }
  if (g.E === 0) {
    return g.A === 0 ? 'Tortoiseshell (non-extension, self)' : 'Red / fawn (non-extension, agouti)';
  }
  var base = g.B === 0 ? 'chocolate' : 'black';
  var dilute = g.D === 0;
  var agouti = g.A > 0;
  if (agouti) {
    if (base === 'black') { return dilute ? 'Opal (agouti, blue)' : 'Chestnut (agouti, black)'; }
    return dilute ? 'Lilac agouti' : 'Cinnamon (agouti, chocolate)';
  }
  if (base === 'black') { return dilute ? 'Blue (self, dilute black)' : 'Black (self)'; }
  return dilute ? 'Lilac (self, dilute chocolate)' : 'Chocolate (self)';
}

function group(name) {
  if (name.indexOf('Albino') === 0) { return 'albino'; }
  if (name.indexOf('Tortoiseshell') === 0 || name.indexOf('Red / fawn') === 0) { return 'nonext'; }
  if (name.indexOf('Chestnut') === 0) { return 'chestnut'; }
  if (name.indexOf('Opal') === 0 || name.indexOf('Cinnamon') === 0 || name.indexOf('Lilac agouti') === 0) {
    return 'agoutiOther';
  }
  if (name.indexOf('Black') === 0) { return 'selfBlack'; }
  return 'selfOther';
}

omni.onResult(['sire_A', 'dam_A'], function (ctx, v) {
  var sire = {}, dam = {}, i, k;
  for (i = 0; i < LOCI.length; i++) {
    var locus = LOCI[i];
    var s = num('sire_' + locus);
    var d = num('dam_' + locus);
    if (s === null || d === null) {
      ctx.addUnmetCondition('Fill in both parents at every locus — A, B, C, D and E.');
      return;
    }
    if (s < 0 || s > 2 || d < 0 || d > 2 || Math.round(s) !== s || Math.round(d) !== d) {
      ctx.addUnmetCondition('Each locus takes 0, 1 or 2 — the number of dominant alleles.');
      return;
    }
    sire[locus] = s;
    dam[locus] = d;
  }

  /* every combination of the three possible outcomes at the five loci */
  var dist = {};
  var idx = [0, 0, 0, 0, 0];
  for (var a = 0; a < 3; a++) {
    for (var b = 0; b < 3; b++) {
      for (var c = 0; c < 3; c++) {
        for (var dd = 0; dd < 3; dd++) {
          for (var e = 0; e < 3; e++) {
            var counts = { A: [2, 1, 0][a], B: [2, 1, 0][b], C: [2, 1, 0][c],
                           D: [2, 1, 0][dd], E: [2, 1, 0][e] };
            var p = 1;
            var order = [a, b, c, dd, e];
            for (k = 0; k < 5; k++) {
              var out = cross(sire[LOCI[k]], dam[LOCI[k]])[order[k]];
              p *= out.p;
            }
            if (p <= 0) { continue; }
            var name = coat(counts);
            dist[name] = (dist[name] || 0) + p;
          }
        }
      }
    }
  }

  var sums = { albino: 0, nonext: 0, chestnut: 0, agoutiOther: 0, selfBlack: 0, selfOther: 0 };
  var names = Object.keys(dist);
  for (i = 0; i < names.length; i++) {
    sums[group(names[i])] += dist[names[i]];
  }
  var coloured = 1 - sums.albino;

  var best = names[0];
  for (i = 0; i < names.length; i++) { if (dist[names[i]] > dist[best]) { best = names[i]; } }

  ctx.exportValue('rb_albino', sround(sums.albino * 100, 1));
  ctx.exportValue('rb_nonext', sround(sums.nonext * 100, 1));
  ctx.exportValue('rb_chestnut', sround(sums.chestnut * 100, 1));
  ctx.exportValue('rb_agouti_other', sround(sums.agoutiOther * 100, 1));
  ctx.exportValue('rb_self_black', sround(sums.selfBlack * 100, 1));
  ctx.exportValue('rb_self_other', sround(sums.selfOther * 100, 1));
  ctx.exportValue('rb_coloured', sround(coloured * 100, 1));
  ctx.exportValue('rb_top', sround(dist[best] * 100, 1));

  ctx.addHtml('<p><strong>The likeliest single colour is ' + best.toLowerCase() + ', at '
    + snum(dist[best] * 100, 1) + ' % of kittens; ' + snum(coloured * 100, 1)
    + ' % of the litter will have some colour and ' + snum(sums.albino * 100, 1)
    + ' % will be ruby-eyed whites.</strong></p>');

  /* the full list, biggest first */
  names.sort(function (x, y) { return dist[y] - dist[x]; });
  var rows = names.map(function (nm) {
    return [nm, snum(dist[nm] * 100, 1) + ' %', '1 in ' + (dist[nm] > 0 ? snum(1 / dist[nm], 1) : '—')];
  });
  ctx.addHtml('<p>Every colour the cross can produce:</p>');
  ctx.addHtml(stable(['Colour', 'Chance', 'Odds'], rows));

  ctx.addHtml(stable(['Genes', 'Sire', 'Dam'], LOCI.map(function (l) {
    return [l, String(sire[l]) + ' dominant allele' + (sire[l] === 1 ? '' : 's'),
      String(dam[l]) + ' dominant allele' + (dam[l] === 1 ? '' : 's')];
  })));

  ctx.addHtml('<p class="calc-unmet">Five loci, two alleles each, is the skeleton of rabbit colour genetics, '
    + 'not the whole animal. The C locus alone has a series — full colour, chinchilla, seal, sable-point, '
    + 'himalayan, albino — and this calculator folds all but albino into "coloured", so a chinchilla × '
    + 'chinchilla cross that should throw chinchillas will come back as chestnut or black. The E locus has '
    + 'the harlequin allele between E and e, the D locus interacts with silvering and the wideband gene, '
    + 'and the B locus with the Vienna blue-eyed-white complex and Dutch markings, none of which is here. '
    + 'Crossing-over, the steel gene and the fact that spotting patterns are polygenic are all ignored. '
    + 'Each locus is treated as independent, which is true of genes on different chromosomes and close '
    + 'enough to true for these five. Use the percentages as the shape of a litter rather than a '
    + 'prediction: a 25 % chance means one kitten in four, and a litter of four can easily be all one '
    + 'colour.</p>');
});
JS,
];
