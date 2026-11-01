<?php
/**
 * Gamma function — Γ(x) for a real argument, Γ(a + bi) for a complex one.
 *
 * The page's own equations asked a `gam(x, prec)` helper for the answer and put
 * it in `res1`; `res1` has no box, so the value was computed and dropped. The
 * sentence beside it — "Γ() = " — lost the argument and the value in the
 * harvest, leaving a line that said nothing at all.
 *
 * The repair asks the math library the page already ships for the answer
 * (mathjs has a gamma for real and complex arguments), prints it in the panel,
 * and writes the working out in words. The complex branch reports the magnitude
 * and the argument, because a complex number cannot sit in a number box.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'res1'             => ['label' => 'Γ(x)', 'precision' => '6'],
        'gamma_magnitude'  => ['label' => '|Γ(a + bi)|', 'precision' => '6'],
        'gamma_argument'   => ['label' => 'arg Γ(a + bi), radians', 'precision' => '6'],
    ],
    'js' => <<<'JS'
omni.onResult(['type'], function (ctx, values) {
  var type = Number(values.type || 0);
  var clear = function () {
    ['res1', 'gamma_magnitude', 'gamma_argument'].forEach(function (n) { ctx.exportValue(n, null); });
  };
  if (!type) {
    clear();
    ctx.addUnmetCondition('Choose a real or a complex argument.');
    return;
  }

  if (type === 1) {
    var x = Number(values.x);
    if (values.x === '' || !isFinite(x)) {
      clear();
      ctx.addUnmetCondition('Enter the argument x — the gamma function is defined for every real number except 0, −1, −2, …');
      return;
    }
    var g;
    try {
      g = mathjs.gamma(x);
    } catch (err) {
      clear();
      ctx.addUnmetCondition('Γ has a pole at that argument: the value is infinite, not a number.');
      return;
    }
    if (!isFinite(g)) {
      clear();
      ctx.addUnmetCondition('Γ(' + snum(x, 6) + ') is infinite — the gamma function has a pole at zero and at every negative integer.');
      return;
    }
    ctx.exportValue('gamma_magnitude', null);
    ctx.exportValue('gamma_argument', null);
    ctx.exportValue('res1', sround(g, 10));

    var factorial = '';
    if (x > 0 && Math.abs(x - Math.round(x)) < 1e-12) {
      var k = Math.round(x);
      factorial = ' Γ(' + k + ') = (' + (k - 1) + ')! = ' + snum(g, 0) + '.';
    }
    ctx.addHtml('<p><strong>Γ(' + snum(x, 6) + ') = ' + snum(g, 8) + '</strong>.</p>');
    ctx.addHtml(stable(['Argument', 'Γ(x)', 'x·Γ(x) = Γ(x+1)'], [
      [snum(x, 6), snum(g, 8), snum(x * g, 8)],
      [snum(x + 1, 6), snum(x * g, 8), snum((x + 1) * x * g, 8)]
    ]));
    ctx.addHtml('<p class="calc-note">The gamma function is the factorial with the whole numbers taken out: '
      + 'Γ(n) = (n−1)! for a positive integer, so Γ(5) = 24 and Γ(1) = 0! = 1.' + factorial
      + ' It is defined for every real number except 0 and the negative integers, where it has poles — the '
      + 'page says so instead of returning Infinity. Γ(x+1) = xΓ(x), the identity the table checks, and the '
      + 'Lanczos approximation behind the value is accurate to about fourteen significant digits. For a '
      + 'negative non-integer argument the reflection formula is used, so the value is exact in sign and '
      + 'magnitude but not in the last couple of digits.</p>');
    return;
  }

  /* complex: Γ(a + bi) */
  var a = Number(values.a), b = Number(values.b);
  if (values.a === '' || values.b === '' || !isFinite(a) || !isFinite(b)) {
    clear();
    ctx.addUnmetCondition('Enter the real part a and the imaginary part b.');
    return;
  }
  var z, cg;
  try {
    z = mathjs.complex(a, b);
    cg = mathjs.gamma(z);
  } catch (err) {
    clear();
    ctx.addUnmetCondition('Γ has a pole at that complex argument.');
    return;
  }
  var re = cg.re, im = cg.im;
  if (!isFinite(re) || !isFinite(im)) {
    clear();
    ctx.addUnmetCondition('That argument is a pole of Γ, so the value is infinite.');
    return;
  }
  var mag = Math.sqrt(re * re + im * im);
  var arg = Math.atan2(im, re);
  ctx.exportValue('res1', null);
  ctx.exportValue('gamma_magnitude', sround(mag, 10));
  ctx.exportValue('gamma_argument', sround(arg, 10));

  ctx.addHtml('<p><strong>Γ(' + snum(a, 6) + (b >= 0 ? ' + ' : ' − ') + snum(Math.abs(b), 6) + 'i) = '
    + snum(re, 6) + (im >= 0 ? ' + ' : ' − ') + snum(Math.abs(im), 6) + 'i</strong>, magnitude '
    + snum(mag, 6) + ' at an argument of ' + snum(arg, 6) + ' radians.</p>');
  ctx.addHtml(stable(['Item', 'Value'], [
    ['Real part', snum(re, 8)],
    ['Imaginary part', snum(im, 8)],
    ['Magnitude |Γ(z)|', snum(mag, 8)],
    ['Argument, radians', snum(arg, 8)],
    ['Argument, degrees', snum(arg * 180 / Math.PI, 6)]
  ]));
  ctx.addHtml('<p class="calc-note">A complex argument needs two boxes and gives two numbers back, so the '
    + 'panel reports the magnitude and the angle instead of a single figure; the rectangular form is printed '
    + 'above. Γ is analytic everywhere except at 0 and the negative integers, and along the negative real '
    + 'axis it is multi-valued in the strict sense — this page takes the principal branch, which is what the '
    + 'reflection formula returns.</p>');
});
JS,
];
