<?php
/**
 * Decimal to hexadecimal — the binary row and the hex row.
 *
 * The page script builds both strings and publishes them as `binary` and
 * `hex`, names the definition does not declare, so nothing landed in the
 * panel; and its own conversion ran through a helper that does not survive
 * the trip, so what it published was a row of zeros and a stray "A".
 *
 * The repair declares the two rows and does the base conversion here: the
 * number is written in binary at the width chosen in the drop-down, padded
 * with leading zeros, and the same bits are grouped four at a time into hex.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'binary' => ['label' => 'Binary'],
        'hex'    => ['label' => 'Hexadecimal'],
        'bits'   => ['label' => 'Width of the row, bits', 'precision' => '0'],
    ],
    'js' => <<<'JS'
function d2hInput(name) {
  var el = document.querySelector('.calc-widget input[data-var="' + name + '"], '
    + '.calc-widget select[data-var="' + name + '"]');
  return el ? String(el.value).trim() : '';
}

/* A short choice list renders as radios whose value is the option's id, so the
   width has to be read off the option's own text: "16-bit" -> 16. */
function d2hWidth() {
  var sel = document.querySelector('.calc-widget select[data-var="binary_representation"]');
  if (sel && sel.selectedIndex >= 0) {
    return (sel.options[sel.selectedIndex].textContent || '').trim();
  }
  var radio = document.querySelector('.calc-widget input[name="binary_representation"]:checked');
  if (radio) {
    var lab = radio.closest('label') || radio.parentNode;
    return (lab.textContent || '').trim();
  }
  return '';
}

omni.onResult(['number'], function (ctx, values) {
  var raw = d2hInput('number');
  if (raw === '') {
    ctx.exportValue('binary', null);
    ctx.exportValue('hex', null);
    ctx.addUnmetCondition('Type the decimal number you want written in binary and hex.');
    return;
  }
  var n = Number(raw.replace(/\s/g, '').replace(',', '.'));
  if (!isFinite(n) || Math.floor(n) !== n) {
    ctx.exportValue('binary', null);
    ctx.exportValue('hex', null);
    ctx.addUnmetCondition('Only whole numbers can be written in binary — drop the decimal part.');
    return;
  }

  /* the width picked in the drop-down; "Other" (0) falls back to 32 */
  var pick = d2hWidth();
  var width = Number(String(pick).replace(/[^0-9.]/g, ''));
  if (!isFinite(width) || width <= 0) { width = 32; }
  var digits = Math.floor(n).toString(2);
  if (digits.length > width) {
    /* grow the row rather than lie about the value */
    width = Math.ceil(digits.length / 4) * 4;
  }
  var negative = n < 0;
  if (negative) {
    /* two's complement inside the chosen width */
    var mod = Math.pow(2, width);
    var unsigned = ((n % mod) + mod) % mod;
    digits = unsigned.toString(2);
  }
  while (digits.length < width) { digits = '0' + digits; }

  var hexDigits = Math.ceil(width / 4);
  var hex = '';
  for (var i = 0; i < width; i += 4) {
    hex += parseInt(digits.substr(i, 4), 2).toString(16).toUpperCase();
  }
  while (hex.length < hexDigits) { hex = '0' + hex; }

  /* four bits per group, so a long row can be read */
  var groups = [];
  for (var j = 0; j < digits.length; j += 4) { groups.push(digits.substr(j, 4)); }

  ctx.exportValue('binary', groups.join(' '));
  ctx.exportValue('hex', hex);
  ctx.exportValue('bits', width);

  ctx.addHtml('<p><strong>' + snum(n, 0) + ' = ' + groups.join(' ') + '₂ = ' + hex + '₁₆</strong></p>');
  ctx.addHtml(stable(['Base', 'Written as'], [
    ['Decimal', snum(n, 0)],
    ['Binary, ' + width + ' bits', groups.join(' ')],
    ['Hexadecimal', hex],
    ['Octal', Math.abs(n).toString(8)]
  ]));
  ctx.addHtml('<p class="calc-note">Hexadecimal exists because four binary digits fit exactly into one hex '
    + 'digit, so a 16-bit word is four hex characters and nothing is lost in the shorthand. The leading zeros '
    + 'are part of the answer here: the width you picked is what makes a 4-bit nybble different from a 16-bit '
    + 'word holding the same value. A negative number is written in two\'s complement — flip every bit of its '
    + 'magnitude and add one — which is why -1 shows as all ones.</p>');
});
JS,
];
