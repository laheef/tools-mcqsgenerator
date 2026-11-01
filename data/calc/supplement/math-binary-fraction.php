<?php
/**
 * Binary fraction — a decimal fraction written in binary, and back.
 *
 * The page shipped a conversion routine and published its answer through
 * `ctx.exportValue("res", …)`; the definition has no `res`, so the string was
 * computed and dropped and Calculate ended with nothing on screen. The sentence
 * that would have said "Binary fraction: " lost its value in the harvest too.
 *
 * The repair does the conversion itself and prints it: the binary expansion for
 * a decimal fraction, the decimal for a binary one, and what the digits shown
 * are worth, because a fraction that does not terminate is only ever shown
 * truncated.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'decimal_value'  => ['label' => 'Decimal value', 'precision' => '10'],
        'digits_shown'   => ['label' => 'Binary digits shown', 'precision' => '0'],
        'truncation_gap' => ['label' => 'Value lost by truncating', 'precision' => '10'],
    ],
    'js' => <<<'JS'
/* "Display" carries the digit count itself; 0 is the Custom entry, which then
   reads the "Number of digits" box. */
function binaryDigitCount(values) {
  var rep = Number(values.bit_rep);
  if (rep > 0) { return Math.round(rep); }
  return Math.round(Number(values.digits || 0));
}

omni.onResult(['convert'], function (ctx, values) {
  /* 0 = decimal → binary, 1 = binary → decimal */
  var mode = Number(values.convert);
  var clear = function () {
    ['decimal_value', 'digits_shown', 'truncation_gap'].forEach(function (n) { ctx.exportValue(n, null); });
  };
  if (mode !== 0 && mode !== 1) {
    clear();
    ctx.addUnmetCondition('Choose a direction: from decimal to binary, or from binary to decimal.');
    return;
  }
  var places = binaryDigitCount(values);
  if (!(places > 0)) {
    clear();
    ctx.addUnmetCondition('Choose how many binary digits to show — 4, 8, 12, 16, or a custom number.');
    return;
  }
  if (places > 64) { places = 64; }

  if (mode === 0) {
    var raw = String(values.deci === undefined ? '' : values.deci).trim();
    if (raw === '') {
      clear();
      ctx.addUnmetCondition('Enter a decimal fraction between 0 and 1.');
      return;
    }
    var d = Number(raw);
    if (!isFinite(d) || d <= 0 || d >= 1) {
      clear();
      ctx.addUnmetCondition('A binary fraction here must be strictly between 0 and 1 — enter something like 0.375.');
      return;
    }
    /* multiply by two, take the carry, repeat */
    var bits = '', rest = d, guard = 0;
    while (bits.length < places && guard++ < 200 && rest > 0) {
      rest *= 2;
      if (rest >= 1) { bits += '1'; rest -= 1; } else { bits += '0'; }
    }
    while (bits.length < places) { bits += '0'; }
    var value = parseInt(bits, 2) / Math.pow(2, bits.length);
    ctx.exportValue('decimal_value', sround(value, 12));
    ctx.exportValue('digits_shown', bits.length);
    ctx.exportValue('truncation_gap', sround(d - value, 12));

    ctx.addHtml('<p><strong>0.' + bits + '₂ = ' + snum(value, 10) + '</strong> (the decimal fraction you entered was '
      + snum(d, 10) + ').</p>');
    var rows = [[String(1), '0.5', bits.charAt(0) === '1' ? '1' : '0'],
                [String(2), '0.25', bits.charAt(1) === '1' ? '1' : '0'],
                [String(3), '0.125', bits.charAt(2) === '1' ? '1' : '0'],
                [String(4), '0.0625', bits.charAt(3) === '1' ? '1' : '0']];
    ctx.addHtml(stable(['Bit', 'Place value', 'Digit'], rows));
    ctx.addHtml('<p class="calc-note">Each binary place is worth half the one before it, so 0.1011₂ is '
      + '1/2 + 1/8 + 1/16 = 0.6875. A decimal fraction terminates in binary only when it is a whole number of '
      + 'halves — 0.5, 0.25, 0.375 do; 0.1 does not, because one tenth has no finite binary expansion, and the '
      + 'page therefore shows it truncated at the number of digits you chose and says how much was lost. '
      + 'Rounding the last digit would be wrong here: the value shown must be the value of exactly the digits '
      + 'printed.</p>');
    return;
  }

  /* binary → decimal */
  var braw = String(values.bina === undefined ? '' : values.bina).trim().replace(/^0\./, '');
  if (braw === '') {
    clear();
    ctx.addUnmetCondition('Enter a binary fraction after the point — for example 1011.');
    return;
  }
  if (!/^[01]+$/.test(braw)) {
    clear();
    ctx.addUnmetCondition('A binary fraction holds only 0 and 1 — the digits you entered include something else.');
    return;
  }
  var dec = 0;
  for (var i = 0; i < braw.length; i++) {
    dec += (braw.charAt(i) === '1' ? 1 : 0) / Math.pow(2, i + 1);
  }
  ctx.exportValue('decimal_value', sround(dec, 12));
  ctx.exportValue('digits_shown', braw.length);
  ctx.exportValue('truncation_gap', 0);

  var table = braw.split('').map(function (bit, idx) {
    return [String(idx + 1), bit, bit === '1' ? snum(1 / Math.pow(2, idx + 1), 10) : '0'];
  });
  ctx.addHtml('<p><strong>0.' + braw + '₂ = ' + snum(dec, 10) + '</strong>.</p>');
  ctx.addHtml(stable(['Bit', 'Digit', 'Worth'], table));
  ctx.addHtml('<p class="calc-note">Each place after the binary point is worth 2⁻¹, 2⁻², 2⁻³ … so the digits '
    + 'are summed as 1/2, 1/4, 1/8 and so on. Only 0 and 1 are allowed; anything else is refused with a note '
    + 'naming the rule rather than silently converted.</p>');
});
JS,
];
