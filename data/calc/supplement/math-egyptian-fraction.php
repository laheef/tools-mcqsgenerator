<?php
/**
 * Egyptian fraction — a fraction written as unit fractions.
 *
 * The page script runs the greedy algorithm and publishes the expansion as
 * `result`, a name the definition does not declare, so the answer was computed
 * and dropped. Its input box was typed as a number, so "5/7" could not be
 * typed into it either; and the companion `error` row printed a stray invisible
 * character when there was no error to report.
 *
 * The repair makes the box a text box, declares the expansion, retires the
 * error row, and checks the input before the script sees it.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'a' => ['type' => 'text'],
    ],
    'outputs' => [
        'result'         => ['label' => 'Egyptian fraction'],
        'terms'          => ['label' => 'Number of unit fractions', 'precision' => '0'],
        'check'          => ['label' => 'Adds back to'],
    ],
    'js' => <<<'JS'
/* the expansion the page's own greedy algorithm produced */
omni.onResult([], function (ctx, values) {
  var raw = String(ctx.getRawInput('a') || '').trim();
  if (raw === '') {
    ctx.exportValue('result', null);
    ctx.exportValue('terms', null);
    ctx.exportValue('check', null);
    ctx.addUnmetCondition('Type a fraction as a / b — for example 5/7 — or a decimal such as 0.7143.');
    return;
  }

  var text = sclean(sdelabel(String(values.result || '')));
  if (!text || !/[0-9]/.test(text)) {
    ctx.exportValue('result', null);
    ctx.addUnmetCondition('That is not a fraction this page can expand — use whole numbers, a numerator '
      + 'smaller than the denominator, and no zero denominator.');
    return;
  }

  ctx.exportValue('result', text);
  var terms = text.split('+').length;
  ctx.exportValue('terms', terms);

  /* add the unit fractions back up, exactly, with a common denominator */
  var parts = text.split('+');
  var num = 0, den = 1;
  parts.forEach(function (part) {
    var m = String(part).match(/(\d+)\s*\/\s*(\d+)/);
    if (!m) { return; }
    var d = Number(m[2]), n = Number(m[1]);
    num = num * d + n * den;
    den = den * d;
  });
  if (den > 0) {
    var g = sgcd(num, den);
    num = num / g;
    den = den / g;
    ctx.exportValue('check', snum(num, 6) + '/' + snum(den, 6));
  }

  ctx.addHtml('<p><strong>' + sesc(raw) + ' = ' + sesc(text) + '</strong>, in ' + terms + ' term'
    + (terms === 1 ? '' : 's') + '.</p>');
  ctx.addHtml(stable(['Item', 'Value'], [
    ['Your fraction', raw],
    ['Egyptian form', text],
    ['Unit fractions', String(terms)],
    ['Adds back to', snum(num, 6) + '/' + snum(den, 6) + ' = ' + snum(num / den, 6)]
  ]));
  ctx.addHtml('<p class="calc-note">An Egyptian fraction writes a fraction as a sum of unit fractions — '
    + '1/2 + 1/5 + 1/70 for 5/7 — with no fraction repeated. The greedy method takes the largest unit fraction '
    + 'that fits each time, which always terminates but does not always give the shortest expansion: for some '
    + 'fractions a hand-picked set uses fewer terms. Denominators grow fast, which is why the last one can '
    + 'look absurd; the value is exact, not a rounding.</p>');
});
JS,
];
