<?php
/**
 * COVID-19 waste — how much PPE a population gets through in a stretch of time.
 *
 * The page arrived as an article with no form: one empty group, nothing to fill
 * in. The repair turns the article's subject into the arithmetic it never had:
 *
 *   masks   = population × days × masks per person a day
 *   gloves  = population × days × gloves per person a day
 *   weight  = masks × grams a mask + gloves × grams a glove
 *
 * The weights are per item, so the answer is in kilograms and tonnes, which is
 * how waste is counted at a landfill gate rather than at a bathroom bin.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'population' => ['type' => 'numerical'],
        'days' => ['type' => 'numerical'],
        'masks_per_day' => ['type' => 'numerical'],
        'grams_per_mask' => ['type' => 'numerical'],
        'gloves_per_day' => ['type' => 'numerical'],
        'grams_per_glove' => ['type' => 'numerical'],
        'cw_masks' => sup_dep('0'),
        'cw_gloves' => sup_dep('0'),
        'cw_mask_kg' => sup_dep('1'),
        'cw_glove_kg' => sup_dep('1'),
        'cw_total_kg' => sup_dep('1'),
        'cw_tonnes' => sup_dep('2'),
        'cw_per_person' => sup_dep('2'),
    ],
    'groups' => [
        sup_group('supp-covid-waste-inputs', 'The population and the stretch of time', [
            sup_field(sup_num('population', 'People in the group')),
            sup_field(sup_num('days', 'Days the measures last')),
        ]),
        sup_group('supp-covid-waste-ppe', 'What each person uses in a day', [
            sup_field(sup_num('masks_per_day', 'Masks per person per day')),
            sup_field(sup_num('grams_per_mask', 'Weight of one mask (grams)')),
            sup_field(sup_num('gloves_per_day', 'Gloves per person per day (leave empty for none)')),
            sup_field(sup_num('grams_per_glove', 'Weight of one glove (grams)')),
        ]),
        sup_group('supp-covid-waste-results', 'Results', [
            sup_field(sup_out('cw_masks', 'Masks used')),
            sup_field(sup_out('cw_gloves', 'Gloves used')),
            sup_field(sup_out('cw_mask_kg', 'Weight of the masks (kg)')),
            sup_field(sup_out('cw_glove_kg', 'Weight of the gloves (kg)')),
            sup_field(sup_out('cw_total_kg', 'Total PPE waste (kg)')),
            sup_field(sup_out('cw_tonnes', 'Total PPE waste (tonnes)')),
            sup_field(sup_out('cw_per_person', 'Waste per person (kg)')),
        ]),
    ],
    'js' => <<<'JS'
function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

omni.onResult(['population', 'days', 'masks_per_day', 'grams_per_mask'], function (ctx, v) {
  var population = num('population');
  var days = num('days');
  var masksPerDay = num('masks_per_day');
  var gramsPerMask = num('grams_per_mask');
  var glovesPerDay = num('gloves_per_day');
  var gramsPerGlove = num('grams_per_glove');

  if (population === null || population <= 0) {
    ctx.addUnmetCondition('Enter how many people the group has.');
    return;
  }
  if (days === null || days <= 0) {
    ctx.addUnmetCondition('Enter how many days the measures last.');
    return;
  }
  if (masksPerDay === null || masksPerDay < 0) {
    ctx.addUnmetCondition('Enter how many masks one person uses in a day.');
    return;
  }
  if (gramsPerMask === null || gramsPerMask <= 0) {
    ctx.addUnmetCondition('Enter the weight of one mask, in grams.');
    return;
  }
  if (glovesPerDay === null) { glovesPerDay = 0; }
  if (gramsPerGlove === null) { gramsPerGlove = 0; }
  if (glovesPerDay < 0 || gramsPerGlove < 0) {
    ctx.addUnmetCondition('Glove numbers cannot be negative.');
    return;
  }

  var masks = population * days * masksPerDay;
  var gloves = population * days * glovesPerDay;
  var maskKg = masks * gramsPerMask / 1000;
  var gloveKg = gloves * gramsPerGlove / 1000;
  var totalKg = maskKg + gloveKg;
  var perPerson = totalKg / population;

  ctx.exportValue('cw_masks', Math.round(masks));
  ctx.exportValue('cw_gloves', Math.round(gloves));
  ctx.exportValue('cw_mask_kg', sround(maskKg, 1));
  ctx.exportValue('cw_glove_kg', sround(gloveKg, 1));
  ctx.exportValue('cw_total_kg', sround(totalKg, 1));
  ctx.exportValue('cw_tonnes', sround(totalKg / 1000, 2));
  ctx.exportValue('cw_per_person', sround(perPerson, 2));

  ctx.addHtml('<p><strong>' + Math.round(population).toLocaleString() + ' people over ' + Math.round(days)
    + ' days get through ' + Math.round(masks).toLocaleString() + ' masks'
    + (gloves > 0 ? ' and ' + Math.round(gloves).toLocaleString() + ' gloves' : '')
    + ' — about ' + snum(totalKg / 1000, 2) + ' tonnes of waste, or '
    + snum(perPerson, 2) + ' kg each.</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['People', Math.round(population).toLocaleString()],
    ['Days', Math.round(days).toLocaleString()],
    ['Masks per person a day', snum(masksPerDay, 2)],
    ['One mask weighs', snum(gramsPerMask, 1) + ' g'],
    ['Masks used', Math.round(masks).toLocaleString()],
    ['Gloves used', Math.round(gloves).toLocaleString()],
    ['Weight of masks', snum(maskKg, 1) + ' kg'],
    ['Weight of gloves', snum(gloveKg, 1) + ' kg'],
    ['Total weight', snum(totalKg, 1) + ' kg'],
    ['In tonnes', snum(totalKg / 1000, 3)],
    ['Waste per person per day', snum(perPerson / days, 3) + ' kg'],
    ['Ten-litre buckets it would fill (at 100 g a litre)', Math.round(totalKg / 1).toLocaleString()]
  ]));

  /* the same habit at three mask budgets, to show what the choice of item does */
  var rates = [0.5, 1, 2, 3].map(function (m) {
    var kg = population * days * m * gramsPerMask / 1000 + gloveKg;
    return [snum(m, 1) + ' masks a day', Math.round(population * days * m).toLocaleString(),
      snum(kg / 1000, 2) + ' tonnes'];
  });
  ctx.addHtml('<p>If the mask habit changed, the rest of the calculation unchanged:</p>');
  ctx.addHtml(stable(['Masks per person a day', 'Masks used', 'Total waste'], rates));

  ctx.addHtml('<p class="calc-unmet">This is a counting exercise, not a life-cycle assessment. It weighs the '
    + 'items themselves and nothing else — not the plastic film they are packed in, not the boxes the boxes '
    + 'came in, and not the transport to the bin. Surgical masks are usually quoted at three to four grams '
    + 'and a cloth mask at ten to fifteen, an N95 at around ten; a nitrile glove is about four grams. Nor '
    + 'does it say where the waste ends up: masks in a household bin go to landfill or incineration, while '
    + 'a clinical setting may treat the same mask as infectious waste, which changes the tonnage handled but '
    + 'not the arithmetic here. Treat the figures as an order of magnitude to plan a supply or a bin '
    + 'collection around, not as a measurement.</p>');
});
JS,
];
