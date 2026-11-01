<?php
/**
 * Vaccine production — how long a plant needs to make enough doses.
 *
 * The page had no form. The repair adds the plant's output and the population it
 * has to serve:
 *
 *   doses a day   = batches a day × doses a batch
 *   doses needed  = population × doses a person
 *   days          = doses needed ÷ doses a day
 *   completion    = start date + days
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'doses_per_batch' => ['type' => 'numerical'],
        'batches_per_day' => ['type' => 'numerical'],
        'start' => ['type' => 'date'],
        'population' => ['type' => 'numerical'],
        'doses_per_person' => ['type' => 'numerical'],
        'vp_per_day' => sup_dep('0'),
        'vp_needed' => sup_dep('0'),
        'vp_days' => sup_dep('1'),
        'vp_weeks' => sup_dep('1'),
        'vp_months' => sup_dep('1'),
        'vp_finish' => ['type' => 'date'],
        'vp_per_week' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-vaxprod-plant', 'The plant', [
            sup_field(sup_num('doses_per_batch', 'Doses in one production batch')),
            sup_field(sup_num('batches_per_day', 'Batches the plant finishes in a day')),
            sup_field(sup_date('start', 'Date production starts')),
        ]),
        sup_group('supp-vaxprod-need', 'Who it is for', [
            sup_field(sup_num('population', 'People to be vaccinated')),
            sup_field(sup_num('doses_per_person', 'Doses each person needs (1 or 2)')),
        ]),
        sup_group('supp-vaxprod-results', 'Results', [
            sup_field(sup_out('vp_per_day', 'Doses a day')),
            sup_field(sup_out('vp_per_week', 'Doses a week')),
            sup_field(sup_out('vp_needed', 'Doses needed')),
            sup_field(sup_out('vp_days', 'Days of production')),
            sup_field(sup_out('vp_weeks', 'Weeks of production')),
            sup_field(sup_out('vp_months', 'Months of production (approximate)')),
            sup_field(['t' => 'v', 'n' => 'vp_finish', 'vt' => 'date', 'l' => 'Date the last dose is made']),
        ]),
    ],
    'js' => <<<'JS'
var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July',
              'August', 'September', 'October', 'November', 'December'];

function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

function dateMs(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || !el.value) { return null; }
  var m = /^(\d{4})-(\d{2})-(\d{2})/.exec(el.value);
  return m ? Date.UTC(+m[1], +m[2] - 1, +m[3]) : null;
}

omni.onResult(['doses_per_batch', 'batches_per_day', 'start', 'population', 'doses_per_person'],
function (ctx, v) {
  var perBatch = num('doses_per_batch');
  var batches = num('batches_per_day');
  var start = dateMs('start');
  var population = num('population');
  var perPerson = num('doses_per_person');

  if (perBatch === null || perBatch <= 0) {
    ctx.addUnmetCondition('Enter how many doses one batch holds.');
    return;
  }
  if (batches === null || batches <= 0) {
    ctx.addUnmetCondition('Enter how many batches the plant finishes in a day.');
    return;
  }
  if (start === null) {
    ctx.addUnmetCondition('Choose the date production starts.');
    return;
  }
  if (population === null || population <= 0) {
    ctx.addUnmetCondition('Enter how many people are to be vaccinated.');
    return;
  }
  if (perPerson === null || perPerson <= 0) {
    ctx.addUnmetCondition('Enter how many doses each person needs.');
    return;
  }

  var perDay = perBatch * batches;
  var needed = population * perPerson;
  var days = needed / perDay;
  var finish = start + Math.ceil(days) * 86400000;

  ctx.exportValue('vp_per_day', Math.round(perDay));
  ctx.exportValue('vp_per_week', Math.round(perDay * 7));
  ctx.exportValue('vp_needed', Math.round(needed));
  ctx.exportValue('vp_days', sround(days, 1));
  ctx.exportValue('vp_weeks', sround(days / 7, 1));
  ctx.exportValue('vp_months', sround(days / 30.44, 1));
  ctx.exportValue('vp_finish', finish);   /* epoch milliseconds, the date box's own unit */

  var fd = new Date(finish);
  var finishText = fd.getUTCDate() + ' ' + MONTHS[fd.getUTCMonth()] + ' ' + fd.getUTCFullYear();

  ctx.addHtml('<p><strong>' + Math.round(perDay).toLocaleString() + ' doses a day for '
    + Math.round(needed).toLocaleString() + ' doses takes ' + snum(days, 1) + ' days — the last dose '
    + 'would be made on ' + finishText + '.</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Doses a batch', Math.round(perBatch).toLocaleString()],
    ['Batches a day', snum(batches, 2)],
    ['Doses a day', Math.round(perDay).toLocaleString()],
    ['Doses a week', Math.round(perDay * 7).toLocaleString()],
    ['Doses a month (30.44 days)', Math.round(perDay * 30.44).toLocaleString()],
    ['People', Math.round(population).toLocaleString()],
    ['Doses a person', snum(perPerson, 1)],
    ['Doses needed', Math.round(needed).toLocaleString()],
    ['Days', snum(days, 2)],
    ['Weeks', snum(days / 7, 2)],
    ['Months', snum(days / 30.44, 2)],
    ['Batches in total', Math.ceil(needed / perBatch).toLocaleString()],
    ['Last dose made', finishText]
  ]));

  /* how the finish date moves with the batch size */
  var rows = [perBatch * 0.5, perBatch, perBatch * 2, perBatch * 4].map(function (b) {
    var d = needed / (b * batches);
    var f = new Date(start + Math.ceil(d) * 86400000);
    return [Math.round(b).toLocaleString() + ' doses a batch', snum(d, 1) + ' days',
      f.getUTCDate() + ' ' + MONTHS[f.getUTCMonth()] + ' ' + f.getUTCFullYear()];
  });
  ctx.addHtml('<p>What the batch size does to the schedule:</p>');
  ctx.addHtml(stable(['Batch size', 'Production time', 'Last dose made'], rows));

  ctx.addHtml('<p class="calc-unmet">Production is not delivery, and this calculator stops at the factory '
    + 'door: the doses still have to be filled, released batch by batch by the regulator, shipped cold and '
    + 'injected. Release testing alone routinely takes weeks after a batch is made, so a plant that can '
    + 'fill its quota by a given date has not necessarily put a single dose in an arm by then. The '
    + 'arithmetic also assumes the line runs every day at the stated rate — no changeovers, no contamination '
    + 'holds, no shortage of the vials, filters or adjuvants the process needs. Real plants lose a '
    + 'percentage of every batch to quality control, which is why the days figure is best read as a floor '
    + 'for a plant working perfectly.</p>');
});
JS,
];
