<?php
/**
 * The four trigonometry pages share one machine.
 *
 * `/math/trig-degree`, `/math/trig-function`, `/math/trigonometric-functions`
 * and `/math/exact-value-of-trig-functions` all take one angle and answer with
 * the six functions of it. Every one of them arrived with the same fault: the
 * six answers are declared (`sin_print`, `cos_print`, … ) and derived by the
 * equations, but not one has a box, so Calculate derived six numbers and put
 * none of them anywhere. The only sentence that could have carried them lost
 * its value slots in the harvest — `sin(°) =   cos(°) =   tan(°) = …`.
 *
 * One builder, four thin files: each page keeps its own title and its own note,
 * and two of them print the exact radical form beside the decimal.
 *
 *   angle → sin, cos, tan, cot, sec, csc
 *
 * The angle is read in the unit the visitor chose on the chip, reduced to the
 * first turn, and the functions are taken from that. A function that has no
 * value there (tan 90°, cot 0°) is reported in words and left out of the panel
 * rather than printed as a 16-digit artefact of floating point.
 */
require_once __DIR__ . '/_builder.php';

/**
 * @param  array{exact?:bool,title?:string,note?:string,precision?:string} $opts
 * @return array<string,mixed>
 */
function trig_supplement(array $opts = []): array
{
    $exact = !empty($opts['exact']);
    $prec  = (string) ($opts['precision'] ?? '6');
    $note  = (string) ($opts['note'] ?? '');

    $outputs = [];
    foreach ([
        'sin_print' => 'sin θ',
        'cos_print' => 'cos θ',
        'tan_print' => 'tan θ',
        'cot_print' => 'cot θ',
        'sec_print' => 'sec θ',
        'csc_print' => 'csc θ',
    ] as $name => $label) {
        $outputs[$name] = ['label' => $label, 'precision' => $prec];
    }

    $js = <<<'JS'
/* The unit the angle was typed in: the chip beside the box, "deg" by default. */
function trigUnit() {
  var sel = document.querySelector('select.calc-unit[data-unit-select="angle"]');
  return sel && sel.value ? sel.value : 'deg';
}
function trigToDegrees(x, unit) {
  if (unit === 'rad') { return x * 180 / Math.PI; }
  if (unit === 'grad') { return x * 0.9; }
  if (unit === 'turn') { return x * 360; }
  if (unit === 'arcmin') { return x / 60; }
  if (unit === 'arcsec') { return x / 3600; }
  return x;
}

/* Exact forms at the reference angles; the other quadrants are these with signs. */
var TRIG_REF = {
  '0':  { sin: '0', cos: '1', tan: '0', cot: 'undefined', sec: '1', csc: 'undefined' },
  '30': { sin: '1/2', cos: '√3/2', tan: '√3/3', cot: '√3', sec: '2√3/3', csc: '2' },
  '45': { sin: '√2/2', cos: '√2/2', tan: '1', cot: '1', sec: '√2', csc: '√2' },
  '60': { sin: '√3/2', cos: '1/2', tan: '√3', cot: '√3/3', sec: '2', csc: '2√3/3' },
  '90': { sin: '1', cos: '0', tan: 'undefined', cot: '0', sec: 'undefined', csc: '1' }
};
function trigNeg(v) {
  if (v === 'undefined' || v === '0') { return v; }
  return '−' + v;
}
/* Quadrant by quadrant: the reference angle plus which functions flip sign. */
function trigExact(deg) {
  var a = ((deg % 360) + 360) % 360;
  var ref, flipSin, flipCos;
  if (a <= 90) { ref = a; flipSin = false; flipCos = false; }
  else if (a <= 180) { ref = 180 - a; flipSin = false; flipCos = true; }
  else if (a <= 270) { ref = a - 180; flipSin = true; flipCos = true; }
  else { ref = 360 - a; flipSin = true; flipCos = false; }
  var row = TRIG_REF[String(Math.round(ref * 1000) / 1000)];
  if (!row) { return null; }
  var sin = flipSin ? trigNeg(row.sin) : row.sin;
  var cos = flipCos ? trigNeg(row.cos) : row.cos;
  /* tan and cot invert with the quadrant, sec follows cos, csc follows sin */
  var tan = (row.tan === 'undefined' || row.tan === '0') ? row.tan
    : ((flipSin !== flipCos) ? trigNeg(row.tan) : row.tan);
  var cot = (row.cot === 'undefined' || row.cot === '0') ? row.cot
    : ((flipSin !== flipCos) ? trigNeg(row.cot) : row.cot);
  var sec = flipCos ? trigNeg(row.sec) : row.sec;
  var csc = flipSin ? trigNeg(row.csc) : row.csc;
  return { sin: sin, cos: cos, tan: tan, cot: cot, sec: sec, csc: csc };
}

omni.onResult(['angle'], function (ctx, values) {
  var raw = values.angle;
  if (raw === null || raw === undefined || raw === '') {
    ['sin_print', 'cos_print', 'tan_print', 'cot_print', 'sec_print', 'csc_print']
      .forEach(function (n) { ctx.exportValue(n, null); });
    ctx.addUnmetCondition('Enter an angle to see its six trigonometric functions.');
    return;
  }
  var deg = trigToDegrees(Number(raw), trigUnit());
  if (!isFinite(deg)) {
    ctx.addUnmetCondition('That angle could not be read — enter a number.');
    return;
  }
  var a = ((deg % 360) + 360) % 360;
  var rad = deg * Math.PI / 180;
  var s = Math.sin(rad), c = Math.cos(rad);
  var tiny = 1e-12;
  var values6 = {
    sin: s,
    cos: c,
    tan: Math.abs(c) < tiny ? null : s / c,
    cot: Math.abs(s) < tiny ? null : c / s,
    sec: Math.abs(c) < tiny ? null : 1 / c,
    csc: Math.abs(s) < tiny ? null : 1 / s
  };
  var names = { sin: 'sin_print', cos: 'cos_print', tan: 'tan_print',
                cot: 'cot_print', sec: 'sec_print', csc: 'csc_print' };
  Object.keys(names).forEach(function (k) {
    ctx.exportValue(names[k], values6[k] === null ? null : sround(values6[k], 10));
  });

  /* one line per function: the decimal, and the exact form where there is one */
  var exact = TRIG_SHOW_EXACT ? trigExact(deg) : null;
  var parts = [];
  ['sin', 'cos', 'tan', 'cot', 'sec', 'csc'].forEach(function (k) {
    var v = values6[k];
    var shown = v === null ? 'undefined' : snum(v, 6);
    var extra = '';
    if (exact && exact[k] && exact[k] !== 'undefined' && Math.abs(v) > 1e-12) {
      if (exact[k] !== shown) { extra = ' = ' + exact[k]; }
    }
    parts.push(k + ' ' + snum(deg, 4) + '° = ' + shown + extra);
  });
  ctx.addHtml('<p><strong>' + parts.join('; ') + '</strong></p>');

  ctx.addHtml(stable(['Function', 'Value at ' + snum(deg, 4) + '°', 'Exact form'], [
    ['sin θ', values6.sin === null ? 'undefined' : snum(values6.sin, 6), exact ? exact.sin : '—'],
    ['cos θ', values6.cos === null ? 'undefined' : snum(values6.cos, 6), exact ? exact.cos : '—'],
    ['tan θ', values6.tan === null ? 'undefined' : snum(values6.tan, 6), exact ? exact.tan : '—'],
    ['cot θ', values6.cot === null ? 'undefined' : snum(values6.cot, 6), exact ? exact.cot : '—'],
    ['sec θ', values6.sec === null ? 'undefined' : snum(values6.sec, 6), exact ? exact.sec : '—'],
    ['csc θ', values6.csc === null ? 'undefined' : snum(values6.csc, 6), exact ? exact.csc : '—']
  ]));

  ctx.addHtml('<p class="calc-note">The angle is read in the unit on the chip beside the box and reduced to '
    + 'the first turn, so 400° answers exactly as 40° does. Tangent and secant have no value at 90° and 270°, '
    + 'cotangent and cosecant none at 0° and 180° — those are left blank in the panel and printed as '
    + '"undefined" here, because a very large floating-point number is not the same thing as an undefined one.'
    + (TRIG_SHOW_EXACT ? ' The exact column gives the radical form at the sixteen reference angles (multiples of 30° and '
    + '45°); anywhere else the decimal is the answer.' : '')
    + '</p>');
});
JS;

    return [
        'hideTexts' => true,
        'outputs'   => $outputs,
        'js'        => 'var TRIG_SHOW_EXACT = ' . ($exact ? 'true' : 'false') . ";\n"
                       . $js . ($note !== '' ? "\n/* {$note} */\n" : ''),
    ];
}
