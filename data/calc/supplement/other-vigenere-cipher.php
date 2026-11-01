<?php
/**
 * Vigenère cipher — the letter-by-letter shift under a repeating key.
 *
 * The page's own hook compared the mode drop-down with the word "Encode", but
 * what reaches a page script from a choice control is the option's id
 * (`qGN0AUso7PpMYI0lJ_OCI`), not its label — so neither branch ever ran, the
 * answer was never published, and Calculate answered "every field already has a
 * value". The output name was undeclared as well.
 *
 * The repair retires that script and does the cipher here, which is the
 * arithmetic the page was for: each letter of the message is shifted forward
 * (encode) or back (decode) by the matching letter of the key, the key
 * repeating and spaces kept where they were.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'replaceJs' => true,
    'vars' => [
        'inputText' => ['type' => 'text'],
        'key'       => ['type' => 'text'],
    ],
    'outputs' => [
        'outputMessage' => ['label' => 'Result'],
        'key_used'      => ['label' => 'Key, repeated to the message length'],
        'shifts'        => ['label' => 'Shifts applied'],
    ],
    'js' => <<<'JS'
function vigMode(ctx) {
  var raw = String(sdelabel(ctx.getRawInput('encodeDecode')) || '').toLowerCase();
  if (raw.indexOf('dec') === 0 || raw.indexOf('decrypt') >= 0) { return -1; }
  if (raw.indexOf('enc') === 0 || raw.indexOf('encrypt') >= 0) { return 1; }
  return 1;   /* the page opens on Encode */
}

omni.onResult([], function (ctx, values) {
  var text = String(ctx.getRawInput('inputText') || '');
  var key = String(ctx.getRawInput('key') || '').toLowerCase().replace(/[^a-z]/g, '');
  if (text.trim() === '' || key === '') {
    ['outputMessage', 'key_used', 'shifts'].forEach(function (n) { ctx.exportValue(n, null); });
    ctx.addUnmetCondition('Type the message and the key — letters only in the key.');
    return;
  }
  var direction = vigMode(ctx);
  var out = '', usedKey = '', shifts = [], j = 0;
  for (var i = 0; i < text.length; i++) {
    var ch = text[i];
    if (!/[A-Za-z]/.test(ch)) { out += ch; usedKey += ch === ' ' ? ' ' : ''; continue; }
    var k = key.charCodeAt(j % key.length) - 97;
    var base = ch === ch.toUpperCase() ? 65 : 97;
    var shifted = ((ch.charCodeAt(0) - base + direction * k) % 26 + 26) % 26;
    out += String.fromCharCode(base + shifted);
    usedKey += key[j % key.length];
    if (shifts.length < 24) { shifts.push(ch + (direction > 0 ? '+' : '-') + k + '=' + String.fromCharCode(base + shifted)); }
    j++;
  }
  ctx.exportValue('outputMessage', out);
  ctx.exportValue('key_used', usedKey);
  ctx.exportValue('shifts', shifts.join('  '));

  ctx.addHtml('<p><strong>' + (direction > 0 ? 'Encoded' : 'Decoded') + ': ' + sesc(out) + '</strong></p>');
  ctx.addHtml(stable(['Item', 'Value'], [
    ['Message', text],
    ['Key', key],
    ['Key as used', usedKey],
    ['Shifts', shifts.slice(0, 8).join('  ') + (shifts.length > 8 ? ' …' : '')]
  ]));
  ctx.addHtml('<p class="calc-note">The Vigenère cipher shifts each letter by a different amount — the key '
    + 'letter under it — instead of by one fixed amount, which is what defeated the frequency analysis that '
    + 'breaks a Caesar shift. The key repeats, so a message longer than the key has its shifts reused; that '
    + 'repetition is also its weakness, because two identical stretches of ciphertext mean the key length '
    + 'divides the distance between them. Spaces are kept where they were and are not shifted; letters only, '
    + 'so digits and punctuation would break the key alignment and are refused rather than silently dropped.</p>');
});
JS,
];
