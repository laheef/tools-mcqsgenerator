<?php
/**
 * /everyday-life/jacket-size — the rows its script already publishes.
 *
 * The scan in docs/export-mismatch.json found the page script calling
 * ctx.exportValue() for these names and the definition declaring none of
 * them: the answer was computed correctly and then dropped, so the panel
 * stayed empty. This supplement declares the rows and tidies the text the
 * page publishes — the arithmetic is the page's own.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    /* Ask only for the measurements used by the selected fit; otherwise the
       form's required-field check blocks a calculation on the hidden sex's
       empty measurements. */
    'showIf' => [
        'height_male' => 'sex == 1',
        'chest_male' => 'sex == 1',
        'chestF' => 'sex == 2',
        'hipF' => 'sex == 2',
    ],
    'outputs' => [
        'us_jacket_size_result' => 'US jacket size',
        'eu_jacket_size_result' => 'EU jacket size',
    ],
    'js' => <<<'JS'
function jacketInches(value, unit) {
  var factors = { inch: 1, in: 1, cm: 1 / 2.54, mm: 1 / 25.4,
                  m: 100 / 2.54, ft: 12, yd: 36, microm: 1 / 25400 };
  var factor = factors[String(unit || 'cm').toLowerCase()];
  return Number(value) * (factor || (1 / 2.54));
}

/* The harvested chart is in inches, while the form defaults to centimetres.
   Normalize the active sex's two measurements before calling its chart. */
omni.onResult([], function (ctx, values) {
  ctx.exportValue('us_jacket_size_result', null);
  ctx.exportValue('eu_jacket_size_result', null);
  var sex = Number(values.sex);
  var separator = ctx.getChoice('string_or') || 'or';
  var custom = ctx.getChoice('string_custom') || 'No standard size found for these measurements.';
  var usText = custom, euText = '';
  function uniqueRows(rows) {
    var seen = {};
    return rows.filter(function (row) {
      var key = row[0];
      if (seen[key]) return false;
      seen[key] = true;
      return true;
    });
  }
  function names(rows) {
    return rows.map(function (row) { return row[0]; }).join(' ' + separator + ' ');
  }
  function labeled(label, rows) {
    return '* ' + label + ' **' + names(rows) + '**';
  }

  if (sex === 1) {
    var height = jacketInches(values.height_male, ctx.getUnit('height_male'));
    var chest = jacketInches(values.chest_male, ctx.getUnit('chest_male'));
    if (!(height > 0 && chest > 0)) return;
    var h = checkHeight_in(height), c = checkChestM_in(chest);
    h[0] = uniqueRows(h[0]);
    c[0] = uniqueRows(c[0]);
    var us = compareArrays(h[0], c[0]).join(' ' + separator + ' ');
    var eu = compareArrays(h[1], c[1]).join(' ' + separator + ' ');
    if (us && eu) {
      usText = '* **' + us + '**';
      euText = '* **' + eu + '**';
    } else if (h[0].length && c[0].length && h[1].length && c[1].length) {
      usText = labeled(ctx.getChoice('string_height') || 'Height:', h[0]) + '\n'
        + labeled(ctx.getChoice('string_chest') || 'Chest width:', c[0]);
      euText = labeled(ctx.getChoice('string_height') || 'Height:', h[1]) + '\n'
        + labeled(ctx.getChoice('string_chest') || 'Chest width:', c[1]);
    }
  } else if (sex === 2) {
    var chestF = jacketInches(values.chestF, ctx.getUnit('chestF'));
    var hipF = jacketInches(values.hipF, ctx.getUnit('hipF'));
    if (!(chestF > 0 && hipF > 0)) return;
    var cf = checkChestF_in(chestF), hf = checkHipF_in(hipF);
    cf[0] = uniqueRows(cf[0]);
    hf[0] = uniqueRows(hf[0]);
    var _us = compareArrays(cf[0], hf[0]).join(' ' + separator + ' ');
    var _eu = compareArrays(cf[1], hf[1]).join(' ' + separator + ' ');
    if (_us && _eu) {
      usText = '* **' + _us + '**';
      euText = '* **' + _eu + '**';
    } else if (cf[0].length && hf[0].length && cf[1].length && hf[1].length) {
      usText = labeled(ctx.getChoice('string_chest') || 'Chest width:', cf[0]) + '\n'
        + labeled(ctx.getChoice('string_hip') || 'Hips width:', hf[0]);
      euText = labeled(ctx.getChoice('string_chest') || 'Chest width:', cf[1]) + '\n'
        + labeled(ctx.getChoice('string_hip') || 'Hips width:', hf[1]);
    }
  }
  ctx.exportValue('us_jacket_size_result', usText);
  ctx.exportValue('eu_jacket_size_result', euText);
});

/* The page hook has already run by the time this one does, so the values
   below are its results: tidy the reference site's markup out of them
   before they reach the panel. */
omni.onResult([], function (ctx, values) {
  var rows = [
    'us_jacket_size_result',
    'eu_jacket_size_result'
  ];
  rows.forEach(function (name) {
    var v = values[name];
    if (typeof v !== 'string' || v.trim() === '') { return; }
    var text = sclean(sdelabel(v)).replace(/\*+/g, '').trim();
    ctx.exportValue(name, text === '' ? null : text);
  });
});
JS,
];
