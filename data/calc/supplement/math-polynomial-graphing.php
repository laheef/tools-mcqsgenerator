<?php
/**
 * What a polynomial looks like when you graph it.
 *
 * With no plotting library on the page we give the things a graph is read for:
 * the intercepts, the end behaviour (leading term and degree), and every real
 * root found by scanning the interval plus a bisection pass to tighten each one.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'y_intercept' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'real_roots' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'leading_coefficient' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'y_intercept', 'vt' => 'dependent', 'l' => 'y-intercept']]]],
            ['FR1', [[['t' => 'v', 'n' => 'real_roots', 'vt' => 'dependent',
                       'l' => 'Real roots in the interval']]]],
            ['FR1', [[['t' => 'v', 'n' => 'leading_coefficient', 'vt' => 'dependent',
                       'l' => 'Leading coefficient']]]],
        ],
    ]],
    'showIf' => [
        'a4' => 'degP >= 4', 'a3' => 'degP >= 3', 'a2' => 'degP >= 2', 'a1' => 'degP >= 1',
        'intStart' => 'customInterval == 1', 'intEnd' => 'customInterval == 1',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var deg = Math.round(Number(v.degP));
  if (!isFinite(deg) || deg < 0) {
    ctx.addUnmetCondition('Choose the degree of the polynomial.');
    return;
  }
  var coef = [];
  for (var i = 0; i <= deg; i++) {
    var key = 'a' + i;
    if (v[key] === '' || v[key] === undefined || !isFinite(Number(v[key]))) {
      ctx.addUnmetCondition('Enter every coefficient — a' + i + ' is still blank.');
      return;
    }
    coef[i] = Number(v[key]);
  }
  if (deg >= 1 && coef[deg] === 0) {
    ctx.addUnmetCondition('The leading coefficient a' + deg + ' is zero, so this is really a degree-'
      + (deg - 1) + ' polynomial. Lower the degree or change the coefficient.');
    return;
  }

  var lo = -10, hi = 10;
  if (Math.round(Number(v.customInterval)) === 1) {
    var s = Number(v.intStart), e = Number(v.intEnd);
    if (v.intStart === '' || v.intEnd === '' || !isFinite(s) || !isFinite(e)) {
      ctx.addUnmetCondition('Give both ends of the interval.');
      return;
    }
    if (e <= s) {
      ctx.addUnmetCondition('The interval has to end above where it begins.');
      return;
    }
    lo = s; hi = e;
  }

  var f = function (x) {
    var total = 0;
    for (var k = 0; k <= deg; k++) total += coef[k] * Math.pow(x, k);
    return total;
  };

  /* bracket every sign change, then bisect — enough for a graph-sized answer */
  var roots = [];
  var steps = 2000;
  var prevX = lo, prevY = f(lo);
  for (var n = 1; n <= steps; n++) {
    var x = lo + (hi - lo) * n / steps;
    var y = f(x);
    if (Math.abs(prevY) < 1e-12) {
      /* an exact hit on the grid: the root is the point itself, not a bracket */
      if (!roots.some(function (q) { return Math.abs(q - prevX) < 1e-6; })) roots.push(prevX);
      prevX = x; prevY = y;
      continue;
    }
    if ((prevY < 0) !== (y < 0)) {
      var a = prevX, b = x;
      for (var it = 0; it < 80; it++) {
        var mid = (a + b) / 2;
        if ((f(a) < 0) !== (f(mid) < 0)) b = mid; else a = mid;
      }
      var r = (a + b) / 2;
      if (Math.abs(f(r)) < 1e-4 && !roots.some(function (q) { return Math.abs(q - r) < 1e-6; })) roots.push(r);
    }
    prevX = x; prevY = y;
  }
  if (Math.abs(prevY) < 1e-12 && !roots.some(function (q) { return Math.abs(q - hi) < 1e-6; })) roots.push(hi);
  roots.sort(function (p, q) { return p - q; });

  var lead = coef[deg];
  var endText;
  if (deg === 0) endText = 'A constant — a horizontal line.';
  else if (deg % 2 === 1) endText = lead > 0 ? 'Down on the left, up on the right.' : 'Up on the left, down on the right.';
  else endText = lead > 0 ? 'Up on both ends.' : 'Down on both ends.';

  ctx.exportValue('y_intercept', sround(coef[0], 6));
  ctx.exportValue('real_roots', roots.length);
  ctx.exportValue('leading_coefficient', sround(lead, 6));

  ctx.addHtml('<p><strong>Degree ' + deg + ', leading coefficient ' + snum(lead, 6) + '.</strong> '
    + endText + (roots.length
      ? ' It crosses or touches the axis at ' + roots.map(function (r) { return snum(r, 4); }).join(', ') + '.'
      : ' It has no real root in ' + snum(lo, 4) + ' … ' + snum(hi, 4) + '.') + '</p>');

  var rows = [
    ['Polynomial', poly(coef, deg)],
    ['y-intercept', '(' + snum(0, 6) + ', ' + snum(coef[0], 6) + ')'],
    ['End behaviour', endText],
    ['Interval shown', '[' + snum(lo, 4) + ', ' + snum(hi, 4) + ']']
  ];
  roots.forEach(function (r, idx) {
    rows.push(['Root ' + (idx + 1), 'x = ' + snum(r, 6) + ' (y = ' + snum(f(r), 6) + ')']);
  });
  ctx.addHtml(stable(['Quantity', 'Value'], rows));

  var sample = [];
  for (var t = 0; t <= 4; t++) {
    var xs = lo + (hi - lo) * t / 4;
    sample.push([snum(xs, 3), snum(f(xs), 4)]);
  }
  ctx.addHtml('Readings across the interval:' + stable(['x', 'y'], sample));

  function poly(cf, d) {
    var out = '';
    for (var k = d; k >= 0; k--) {
      var term = cf[k];
      if (term === 0) continue;
      var sign = out === '' ? (term < 0 ? '−' : '') : (term < 0 ? ' − ' : ' + ');
      var mag = Math.abs(term);
      out += sign + (mag === 1 && k > 0 ? '' : snum(mag, 6)) + (k === 0 ? '' : (k === 1 ? 'x' : 'x^' + k));
    }
    return out === '' ? '0' : out;
  }
});
JS,
];
