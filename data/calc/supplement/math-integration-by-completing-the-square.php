<?php
/**
 * ∫ dx / (ax² + bx + c) by completing the square.
 *
 * Completing the square turns the denominator into a((x + b/2a)² + q) with
 * q = (4ac − b²)/4a². If q > 0 the integral is an arctangent, if q < 0 it is a
 * logarithm of a ratio, and if q = 0 it is a plain 1/(x + b/2a) power.
 */
return [
    'vars' => [
        'sqrt_term' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'sqrt_term', 'vt' => 'dependent', 'l' => '√|q| (from the shift)']]]],
        ],
    ]],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var a = Number(v.a), b = Number(v.b), c = Number(v.c);
  if (v.a === '' || v.b === '' || v.c === '' || !isFinite(a) || !isFinite(b) || !isFinite(c)) {
    ctx.addUnmetCondition('Enter a, b and c from ax² + bx + c.');
    return;
  }
  if (a === 0) {
    ctx.addUnmetCondition('a cannot be zero — the denominator would be linear, not quadratic.');
    return;
  }
  var p = Number(v.precision);
  if (!isFinite(p) || p < 0) p = 4;
  p = Math.min(Math.round(p), 10);

  var h = -b / (2 * a);
  var k = (4 * a * c - b * b) / (4 * a);          /* value of the quadratic at x = h */
  var q = k / a;                                   /* (x + h)² + q inside the bracket */

  var form = snum(a, p) + '[(x ' + (h < 0 ? '+ ' : '− ') + snum(Math.abs(h), p) + ')² '
    + (q < 0 ? '− ' : '+ ') + snum(Math.abs(q), p) + ']';

  var text, result;
  if (Math.abs(q) < 1e-12) {
    result = '−1 / (' + snum(a, p) + '(x ' + (h < 0 ? '+ ' : '− ') + snum(Math.abs(h), p) + ')) + C';
    text = 'The bracket collapses to zero, so the integrand is a single power of (x + h).';
    ctx.exportValue('sqrt_term', 0);
  } else if (q > 0) {
    var s = Math.sqrt(q);
    ctx.exportValue('sqrt_term', sround(s, p));
    result = '(1 / (' + snum(a, p) + '·' + snum(s, p) + ')) · arctan((x ' + (h < 0 ? '+ ' : '− ')
      + snum(Math.abs(h), p) + ') / ' + snum(s, p) + ') + C';
    text = 'The bracket is a sum of squares, which integrates to an arctangent.';
  } else {
    var s2 = Math.sqrt(-q);
    ctx.exportValue('sqrt_term', sround(s2, p));
    result = '(1 / (' + snum(2 * a * s2, p) + ')) · ln|(x ' + (h < 0 ? '+ ' : '− ') + snum(Math.abs(h), p)
      + ' − ' + snum(s2, p) + ') / (x ' + (h < 0 ? '+ ' : '− ') + snum(Math.abs(h), p) + ' + '
      + snum(s2, p) + ')| + C';
    text = 'The bracket is a difference of squares, so the result is a logarithm of a ratio.';
  }

  ctx.addHtml('<p><strong>ax² + bx + c = ' + form + '</strong> with a = ' + snum(a, p)
    + ', shift ' + snum(h, p) + '.</p>');
  ctx.addHtml('<p>' + text + '</p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Shift h = −b/2a', snum(h, p)],
    ['Quadratic at h', snum(k, p)],
    ['Bracket constant q', snum(q, p)],
    ['Antiderivative', result]
  ]));
});
JS,
];
