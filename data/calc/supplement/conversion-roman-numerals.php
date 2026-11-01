<?php
/**
 * Roman numerals — both directions, including the one the page could not take.
 *
 * The page's script published `roman`, `summation`, `steps`, `summary` and
 * `arabic_result`; the definition declares none of them, so the answers were
 * computed and dropped and the panel stayed empty. `arabic_result` was worse
 * than empty even where a row existed — it published the id of a drop-down
 * option instead of a number. And the Roman box was typed as a number, so
 * "MCMXC" could not be typed into it at all.
 *
 * The repair declares the rows, makes the Roman box a text box, and does the
 * two conversions here: a number to its numerals, a numeral back to a number,
 * with the classic subtractive pairs (IV, IX, XL, XC, CD, CM) handled.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'roman_numeral' => ['type' => 'text'],
    ],
    'outputs' => [
        'roman'         => ['label' => 'Roman numeral'],
        'arabic_result' => ['label' => 'Number', 'precision' => '0'],
        'summation'     => ['label' => 'Where the number comes from'],
        'valid'         => ['label' => 'Is it a valid Roman numeral'],
    ],
    'js' => <<<'JS'
var ROMAN_PAIRS = [
  [1000, 'M'], [900, 'CM'], [500, 'D'], [400, 'CD'], [100, 'C'], [90, 'XC'],
  [50, 'L'], [40, 'XL'], [10, 'X'], [9, 'IX'], [5, 'V'], [4, 'IV'], [1, 'I']
];
var ROMAN_VALUE = {I: 1, V: 5, X: 10, L: 50, C: 100, D: 500, M: 1000};

function rnBox(name) {
  var el = document.querySelector('.calc-widget input[data-var="' + name + '"], '
    + '.calc-widget textarea[data-var="' + name + '"]');
  return el ? String(el.value).trim() : '';
}

function rnToRoman(n) {
  var out = '';
  for (var i = 0; i < ROMAN_PAIRS.length; i++) {
    while (n >= ROMAN_PAIRS[i][0]) {
      out += ROMAN_PAIRS[i][1];
      n -= ROMAN_PAIRS[i][0];
    }
  }
  return out;
}

/* Strict: only the seven letters, and only the forms that are actually used —
   IIII, VX and IIX are all rejected rather than quietly read as something. */
function rnFromRoman(text) {
  var s = String(text).toUpperCase().replace(/[\s.]/g, '');
  if (!s || !/^[IVXLCDM]+$/.test(s)) { return null; }
  var total = 0;
  for (var i = 0; i < s.length; i++) {
    var v = ROMAN_VALUE[s[i]];
    var next = i + 1 < s.length ? ROMAN_VALUE[s[i + 1]] : 0;
    total += v < next ? -v : v;
  }
  if (total <= 0 || total > 3999) { return null; }
  if (rnToRoman(total) !== s) { return null; }   // rejects IIII, VX, CMCM …
  return total;
}

omni.onResult([], function (ctx, values) {
  var word = rnBox('roman_numeral');
  var digits = rnBox('arabic');

  if (word !== '') {
    var back = rnFromRoman(word);
    if (back === null) {
      ctx.exportValue('roman', null);
      ctx.exportValue('arabic_result', null);
      ctx.exportValue('valid', 'No');
      ctx.addUnmetCondition('"' + word + '" is not a Roman numeral this page can read — use I, V, X, L, C, D '
        + 'and M in the usual forms, up to MMMCMXCIX (3 999).');
      return;
    }
    ctx.exportValue('roman', rnToRoman(back));
    ctx.exportValue('arabic_result', back);
    ctx.exportValue('valid', 'Yes');
    ctx.addHtml('<p><strong>' + sesc(rnToRoman(back)) + ' = ' + snum(back, 0) + '</strong></p>');
    rnExplain(ctx, back);
    return;
  }

  if (digits !== '') {
    var n = Number(digits.replace(/\s/g, ''));
    if (!isFinite(n) || Math.floor(n) !== n) {
      ctx.exportValue('roman', null);
      ctx.exportValue('arabic_result', null);
      ctx.addUnmetCondition('Roman numerals are whole numbers only — drop the decimal part.');
      return;
    }
    if (n < 1 || n > 3999) {
      ctx.exportValue('roman', null);
      ctx.exportValue('arabic_result', null);
      ctx.addUnmetCondition('The Romans wrote 1 to 3 999 with these letters; ' + snum(n, 0)
        + ' is outside that range.');
      return;
    }
    ctx.exportValue('roman', rnToRoman(n));
    ctx.exportValue('arabic_result', n);
    ctx.exportValue('valid', 'Yes');
    ctx.addHtml('<p><strong>' + snum(n, 0) + ' = ' + rnToRoman(n) + '</strong></p>');
    rnExplain(ctx, n);
    return;
  }

  ctx.exportValue('roman', null);
  ctx.exportValue('arabic_result', null);
  ctx.addUnmetCondition('Enter a number in one box, or Roman numerals in the other.');
});

/* How the number is built, in the order the letters are added. */
function rnExplain(ctx, n) {
  var left = n, parts = [];
  for (var i = 0; i < ROMAN_PAIRS.length; i++) {
    var value = ROMAN_PAIRS[i][0], letter = ROMAN_PAIRS[i][1];
    while (left >= value) {
      parts.push(letter + ' (' + value + ')');
      left -= value;
    }
  }
  ctx.addHtml(stable(['Letters, in order', 'Running total'], (function () {
    var rows = [], running = 0;
    parts.forEach(function (p) {
      running += Number(p.replace(/[^0-9]/g, ''));
      rows.push([p, String(running)]);
    });
    return rows;
  })()));
  ctx.addHtml('<p class="calc-note">Roman numerals are written largest-first and simply added, except for the '
    + 'six subtractive pairs: IV and IX, XL and XC, CD and CM. That is why 4 is IV and not IIII, and why 1990 '
    + 'is MCMXC. The letters only reach 3 999; anything larger needs the overline convention, which this page '
    + 'does not use.</p>');
}
JS,
];
