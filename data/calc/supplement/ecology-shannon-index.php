<?php
/**
 * Shannon index — diversity worked out and then thrown away, over a row of
 * boxes that counts the empty ones.
 *
 * Two faults met here. The script published its five answers as `av`, `sum`,
 * `count`, `shannon` and `evenness` — none of them declared, so the panel was
 * empty and Calculate said "Every field already has a value, so there is
 * nothing left to work out". And it built its sample from the `_ref` bag, where
 * a box the visitor never touched arrives as null-or-zero rather than missing,
 * so it read all 40 slots as species and divided by 40.
 *
 * The repair declares the five rows and takes the sample from the boxes
 * themselves, so only the abundances the visitor typed are counted.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'shannon'  => ['label' => 'Shannon index H', 'precision' => '4'],
        'evenness' => ['label' => 'Pielou evenness J', 'precision' => '4'],
        'count'    => ['label' => 'Species in the sample', 'precision' => '0'],
        'sum'      => ['label' => 'Total individuals', 'precision' => '0'],
        'av'       => ['label' => 'Mean individuals per species', 'precision' => '4'],
    ],
    'js' => <<<'JS'
function shBox(name) {
  var el = document.querySelector('.calc-widget input[data-var="' + name + '"]');
  if (!el) { return null; }
  var raw = String(el.value).trim();
  if (raw === '') { return null; }
  var n = Number(raw.replace(/\s/g, '').replace(',', '.'));
  return isFinite(n) && n > 0 ? n : null;
}

omni.onResult(['a1'], function (ctx, values) {
  var sample = [];
  for (var i = 1; i <= 40; i++) {
    var v = shBox('a' + i);
    if (v !== null) { sample.push(v); }
  }
  var names = ['shannon', 'evenness', 'count', 'sum', 'av'];
  if (!sample.length) {
    names.forEach(function (n) { ctx.exportValue(n, null); });
    ctx.addUnmetCondition('Enter the number of individuals of each species — one box per species.');
    return;
  }

  var N = 0, S = sample.length, H = 0;
  sample.forEach(function (v) { N += v; });
  /* the page lets the visitor pick the log base; natural when the picker is blank */
  var base = 2.718281828459;
  if (Number(values.base_vs) !== 1) {
    var picked = Number(values.log_base);
    if (isFinite(picked) && picked > 1) { base = picked; }
  }
  var ln = function (x) { return Math.log(x); };
  sample.forEach(function (v) {
    var p = v / N;
    H -= p * ln(p) / ln(base);
  });
  var evenness = S > 1 ? H / (ln(S) / ln(base)) : NaN;
  var dp = Number(values.rounding);
  if (!isFinite(dp) || dp < 0 || dp > 8) { dp = 4; }

  ctx.exportValue('shannon', sround(H, dp));
  ctx.exportValue('evenness', isFinite(evenness) ? sround(evenness, dp) : null);
  ctx.exportValue('count', S);
  ctx.exportValue('sum', N);
  ctx.exportValue('av', sround(N / S, dp));

  var richest = 0;
  sample.forEach(function (v) { richest = Math.max(richest, v / N); });
  ctx.addHtml('<p><strong>H = ' + snum(H, dp) + '</strong> across ' + S + ' species and ' + snum(N, 0)
    + ' individuals' + (isFinite(evenness) ? ', evenness J = ' + snum(evenness, dp) : '') + '.</p>');
  ctx.addHtml(stable(['Item', 'Value'], [
    ['Species in the sample', String(S)],
    ['Individuals counted', snum(N, 0)],
    ['Most abundant share', snum(richest * 100, 2) + ' %'],
    ['Shannon index H', snum(H, dp)],
    ['Pielou evenness J', isFinite(evenness) ? snum(evenness, dp) : 'undefined for one species']
  ]));
  ctx.addHtml('<p class="calc-note">H is the entropy of the sample in natural units (or in whatever base the '
    + 'picker names): largest when every species holds an equal share, zero when one species holds them all. '
    + 'J divides H by ln S, so it runs from 0 to 1 and lets you compare samples of different species counts. '
    + 'A sample with one species has H = 0 and J undefined — there is nothing to be even between. Leave a box '
    + 'empty for a species you did not find: a zero entered by hand is read as "not present" rather than '
    + 'dragging the mean down.</p>');
});
JS,
];
