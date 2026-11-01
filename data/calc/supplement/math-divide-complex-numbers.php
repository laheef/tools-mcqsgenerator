<?php
/**
 * Dividing two complex numbers.
 *
 * z₁ / z₂ multiplies top and bottom by the conjugate of z₂, which makes the
 * denominator real: (a₁ + b₁i)(a₂ − b₂i) / (a₂² + b₂²). In polar form the
 * magnitudes divide and the phases are subtracted.
 */
return [
    'vars' => [
        'quot_re' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'quot_im' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'quot_mag' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'quot_phase' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'quot_re', 'vt' => 'dependent', 'l' => 'Real part of the quotient']]]],
            ['FR1', [[['t' => 'v', 'n' => 'quot_im', 'vt' => 'dependent', 'l' => 'Imaginary part of the quotient']]]],
            ['FR1', [[['t' => 'v', 'n' => 'quot_mag', 'vt' => 'dependent', 'l' => 'Magnitude of the quotient']]]],
            ['FR1', [[['t' => 'v', 'n' => 'quot_phase', 'vt' => 'dependent', 'l' => 'Phase of the quotient (rad)']]]],
        ],
    ]],
    'showIf' => [
        'a1' => 'form1 == 1', 'b1' => 'form1 == 1',
        'magnitude1' => 'form1 == 0', 'phase1' => 'form1 == 0',
        'a2' => 'form2 == 1', 'b2' => 'form2 == 1',
        'magnitude2' => 'form2 == 0', 'phase2' => 'form2 == 0',
    ],
    'js' => <<<'JS'
function readComplex(v, suffix, form) {
  if (String(form) === '1') {
    var a = Number(v['a' + suffix]), b = Number(v['b' + suffix]);
    if (v['a' + suffix] === '' || v['b' + suffix] === '' || !isFinite(a) || !isFinite(b)) return null;
    return { re: a, im: b };
  }
  var r = Number(v['magnitude' + suffix]), phi = Number(v['phase' + suffix]);
  if (v['magnitude' + suffix] === '' || v['phase' + suffix] === '' || !isFinite(r) || !isFinite(phi)) return null;
  return { re: r * Math.cos(phi), im: r * Math.sin(phi) };
}

omni.onResult([], function (ctx, v) {
  var z1 = readComplex(v, '1', v.form1);
  var z2 = readComplex(v, '2', v.form2);
  if (!z1 || !z2) {
    ctx.addUnmetCondition('Fill in both numbers — each one needs every box its form asks for.');
    return;
  }
  var den = z2.re * z2.re + z2.im * z2.im;
  if (den === 0) {
    ctx.addUnmetCondition('The second number is zero, so the quotient is undefined.');
    return;
  }
  var re = (z1.re * z2.re + z1.im * z2.im) / den;
  var im = (z1.im * z2.re - z1.re * z2.im) / den;
  var mag = Math.sqrt(re * re + im * im);
  var phase = Math.atan2(im, re);

  ctx.exportValue('quot_re', sround(re, 6));
  ctx.exportValue('quot_im', sround(im, 6));
  ctx.exportValue('quot_mag', sround(mag, 6));
  ctx.exportValue('quot_phase', sround(phase, 6));

  ctx.addHtml('<p><strong>(' + cplx(z1.re, z1.im) + ') ÷ (' + cplx(z2.re, z2.im) + ') = '
    + cplx(re, im) + '</strong></p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['a₂² + b₂² (the denominator)', snum(den, 6)],
    ['Rectangular form', cplx(re, im)],
    ['Magnitude r₁/r₂', snum(mag, 6)],
    ['Phase φ₁ − φ₂ (rad)', snum(phase, 6)],
  ]));

  function cplx(re2, im2) {
    var r = snum(re2, 6);
    if (Math.abs(im2) < 1e-12) return r;
    return r + (im2 < 0 ? ' − ' : ' + ') + (Math.abs(Math.abs(im2) - 1) < 1e-12 ? '' : snum(Math.abs(im2), 6)) + 'i';
  }
});
JS,
];
