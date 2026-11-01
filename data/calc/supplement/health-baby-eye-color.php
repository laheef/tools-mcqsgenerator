<?php
/**
 * Baby eye colour — the chance of brown, green and blue eyes from the parents'.
 *
 * The harvested page asked for the mother's and father's eye colour and then
 * eighteen empty genotype boxes that nobody can fill, and answered nothing: the
 * surviving helpers (`baby_brown`, `baby_green`, `baby_blue`) take those
 * eighteen probabilities as arguments and nothing ever supplied them.
 *
 * This repair replaces them with the model the page was built around, worked
 * out from the parents' colours alone:
 *
 *   locus 1 (OCA2)  B dominant    B_ = not blue        bb = no brown
 *   locus 2 (HERC2) G dominant    bb G_ = green        bb gg = blue
 *
 * Each parent's genotype at each locus is drawn from the population under
 * Hardy-Weinberg and then conditioned on the colour they actually have, so a
 * brown-eyed parent may be BB or Bb, and how likely each is depends on the
 * allele frequencies. The child's two loci are then crossed independently.
 *
 * Allele frequencies used: B = 0.62, b = 0.38, G = 0.70, g = 0.30 — close to
 * the European figures the published models assume.
 */
return [
    'hideTexts' => true,
    'remove' => ['blue', 'brown', 'green',
                 'f_B_bb', 'f_B_bg', 'f_B_bu', 'f_G_bg', 'f_G_gg', 'f_G_gu',
                 'f_U_bu', 'f_U_gu', 'f_U_uu',
                 'm_B_bb', 'm_B_bg', 'm_B_bu', 'm_G_bg', 'm_G_gg', 'm_G_gu',
                 'm_U_bu', 'm_U_gu', 'm_U_uu'],
    'vars' => [
        'p_brown' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'p_green' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'p_blue' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'most_likely' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-eye-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'p_brown', 'vt' => 'dependent', 'l' => 'Chance of brown eyes (%)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'p_green', 'vt' => 'dependent', 'l' => 'Chance of green or hazel eyes (%)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'p_blue', 'vt' => 'dependent', 'l' => 'Chance of blue eyes (%)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'most_likely', 'vt' => 'dependent', 'l' => 'Most likely colour (1 brown, 2 green, 3 blue)']]]],
        ],
    ]],
    'js' => <<<'JS'
/* allele frequencies at the two loci */
var F_B = 0.62, F_G = 0.70;

/* Hardy-Weinberg genotype frequencies at one locus */
function hw(p) {
  var q = 1 - p;
  return { AA: p * p, Aa: 2 * p * q, aa: q * q };
}

/*
 * Genotypes conditional on the colour the parent has. `phenotype` is 1 brown,
 * 2 green, 3 blue. Brown masks locus 2, so a brown parent is any genotype with
 * at least one B at locus 1, and their locus 2 is untouched by the condition.
 */
function genotypeFor(phenotype) {
  var b = hw(F_B);
  var g = hw(F_G);
  var hasB = b.AA + b.Aa;               /* not bb */
  var notBlue2 = g.AA + g.Aa;           /* at least one G */

  var locus1, locus2;
  if (phenotype === 1) {                /* brown: locus 1 has a B, locus 2 free */
    locus1 = { AA: b.AA / hasB, Aa: b.Aa / hasB, aa: 0 };
    locus2 = { AA: g.AA, Aa: g.Aa, aa: g.aa };
  } else if (phenotype === 2) {         /* green: bb, and at least one G */
    locus1 = { AA: 0, Aa: 0, aa: 1 };
    locus2 = { AA: g.AA / notBlue2, Aa: g.Aa / notBlue2, aa: 0 };
  } else {                              /* blue: bb and gg */
    locus1 = { AA: 0, Aa: 0, aa: 1 };
    locus2 = { AA: 0, Aa: 0, aa: 1 };
  }
  return [locus1, locus2];
}

/* the child's genotype distribution at one locus from two parents */
function cross(m, f) {
  var keys = ['AA', 'Aa', 'aa'];
  /* gametes: AA -> A, Aa -> half A half a, aa -> a */
  var gamete = function (g) {
    return { A: (g.AA || 0) + 0.5 * (g.Aa || 0), a: (g.aa || 0) + 0.5 * (g.Aa || 0) };
  };
  var gm = gamete(m), gf = gamete(f);
  var out = {
    AA: gm.A * gf.A,
    Aa: gm.A * gf.a + gm.a * gf.A,
    aa: gm.a * gf.a
  };
  var total = out.AA + out.Aa + out.aa;
  if (total > 0) { out.AA /= total; out.Aa /= total; out.aa /= total; }
  return out;
}

omni.onResult(['mother', 'father'], function (ctx, v) {
  var mother = Math.round(Number(v.mother));
  var father = Math.round(Number(v.father));
  if (!mother || !father) {
    ctx.addUnmetCondition('Choose the eye colour of both parents.');
    return;
  }
  if (mother < 1 || mother > 3 || father < 1 || father > 3) {
    ctx.addUnmetCondition('Eye colour has to be brown, green or blue.');
    return;
  }

  var mm = genotypeFor(mother), ff = genotypeFor(father);

  /* locus 1 decides brown vs not; locus 2 decides green vs blue within "not brown" */
  var l1 = cross(mm[0], ff[0]);
  var l2 = cross(mm[1], ff[1]);

  var pNotBrown = l1.aa;                       /* bb at locus 1 */
  var pGreen = pNotBrown * (l2.AA + l2.Aa);    /* bb and at least one G */
  var pBlue = pNotBrown * l2.aa;               /* bb and gg */
  var pBrown = 1 - pNotBrown;

  var names = { 1: 'brown', 2: 'green', 3: 'blue' };
  var best = pBrown >= pGreen && pBrown >= pBlue ? 1 : (pGreen >= pBlue ? 2 : 3);

  ctx.exportValue('p_brown', sround(pBrown * 100, 1));
  ctx.exportValue('p_green', sround(pGreen * 100, 1));
  ctx.exportValue('p_blue', sround(pBlue * 100, 1));
  ctx.exportValue('most_likely', best);

  ctx.addHtml('<p><strong>A ' + names[mother] + '-eyed mother and a ' + names[father] + '-eyed father have a '
    + snum(pBrown * 100, 1) + ' % chance of a brown-eyed baby, ' + snum(pGreen * 100, 1)
    + ' % of green, and ' + snum(pBlue * 100, 1) + ' % of blue — ' + names[best]
    + ' is the most likely.</strong></p>');

  var rows = [
    ['Mother', names[mother]],
    ['Father', names[father]],
    ['Brown', snum(pBrown * 100, 1) + ' %'],
    ['Green or hazel', snum(pGreen * 100, 1) + ' %'],
    ['Blue', snum(pBlue * 100, 1) + ' %'],
    ['Odds', 'about 1 in ' + snum(1 / Math.max(pBrown, pGreen, pBlue), 1) + ' for the most likely colour']
  ];
  ctx.addHtml(stable(['Item', 'Value'], rows));

  /* the four parent combinations, so the pattern is visible */
  var combos = [];
  [1, 2, 3].forEach(function (mo) {
    [1, 2, 3].forEach(function (fa) {
      var a = genotypeFor(mo), b = genotypeFor(fa);
      var c1 = cross(a[0], b[0]), c2 = cross(a[1], b[1]);
      var br = 1 - c1.aa, gr = c1.aa * (c2.AA + c2.Aa), bl = c1.aa * c2.aa;
      combos.push([names[mo] + ' + ' + names[fa], snum(br * 100, 1) + ' %',
        snum(gr * 100, 1) + ' %', snum(bl * 100, 1) + ' %']);
    });
  });
  ctx.addHtml('<p>All nine parent combinations on this model:</p>');
  ctx.addHtml(stable(['Parents', 'Brown', 'Green', 'Blue'], combos));

  ctx.addHtml('<p class="calc-unmet">Two genes is a simplification. Eye colour is a continuous trait '
    + 'controlled by at least eight genes, mostly OCA2 and HERC2, and the real inheritance has green and '
    + 'hazel sitting between brown and blue rather than in clean steps — two blue-eyed parents very '
    + 'occasionally have a brown-eyed child. The percentages above assume a European population with the '
    + 'allele frequencies B = 0.62, G = 0.70, and they are a probability for an individual child, not a '
    + 'statement about a family: a 25 % chance means one child in four on average, and each child is a '
    + 'fresh roll. A baby\'s eyes can also darken over the first year, because melanin production keeps '
    + 'increasing after birth.</p>');
});
JS,
];
