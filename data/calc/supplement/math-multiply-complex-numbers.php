<?php
/**
 * Multiplying two complex numbers.
 *
 * In rectangular form (a₁ + b₁i)(a₂ + b₂i) = (a₁a₂ − b₁b₂) + (a₁b₂ + b₁a₂)i;
 * in polar form the magnitudes multiply and the phases add. Both forms are
 * accepted per number, so the working is shown for whichever the visitor chose.
 */
return [
    'vars' => [
        'prod_re' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'prod_im' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'prod_mag' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'prod_phase' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'prod_re', 'vt' => 'dependent', 'l' => 'Real part of the product']]]],
            ['FR1', [[['t' => 'v', 'n' => 'prod_im', 'vt' => 'dependent', 'l' => 'Imaginary part of the product']]]],
            ['FR1', [[['t' => 'v', 'n' => 'prod_mag', 'vt' => 'dependent', 'l' => 'Magnitude of the product']]]],
            ['FR1', [[['t' => 'v', 'n' => 'prod_phase', 'vt' => 'dependent', 'l' => 'Phase of the product (rad)']]]],
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
  return { re: r * Math.cos(phi), im: r * Math.sin(phi), r: r, phi: phi };
}

omni.onResult([], function (ctx, v) {
  var z1 = readComplex(v, '1', v.form1);
  var z2 = readComplex(v, '2', v.form2);
  if (!z1 || !z2) {
    ctx.addUnmetCondition('Fill in both numbers — each one needs every box its form asks for.');
    return;
  }
  var re = z1.re * z2.re - z1.im * z2.im;
  var im = z1.re * z2.im + z1.im * z2.re;
  var mag = Math.sqrt(re * re + im * im);
  var phase = Math.atan2(im, re);

  ctx.exportValue('prod_re', sround(re, 6));
  ctx.exportValue('prod_im', sround(im, 6));
  ctx.exportValue('prod_mag', sround(mag, 6));
  ctx.exportValue('prod_phase', sround(phase, 6));
  ctx.exportValue('prod_a_11', sround(re, 6));
  ctx.exportValue('prod_b_11', sround(im, 6));

  ctx.addHtml('<p><strong>(' + cplx(z1.re, z1.im) + ') × (' + cplx(z2.re, z2.im) + ') = '
    + cplx(re, im) + '</strong></p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Rectangular form', cplx(re, im)],
    ['Magnitude r₁r₂', snum(mag, 6)],
    ['Phase φ₁ + φ₂ (rad)', snum(phase, 6)],
    ['Phase (degrees)', snum(phase * 180 / Math.PI, 4)],
  ]));

  function cplx(re2, im2) {
    var r = snum(re2, 6);
    if (Math.abs(im2) < 1e-12) return r;
    return r + (im2 < 0 ? ' − ' : ' + ') + (Math.abs(Math.abs(im2) - 1) < 1e-12 ? '' : snum(Math.abs(im2), 6)) + 'i';
  }
});
JS,
];
