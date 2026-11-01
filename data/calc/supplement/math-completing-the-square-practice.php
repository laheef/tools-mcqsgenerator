<?php
/**
 * Completing the square.
 *
 * ax² + bx + c = a(x + b/2a)² + (c − b²/4a), so the vertex sits at
 * h = −b/2a and k = (4ac − b²)/4a, and the discriminant b² − 4ac decides how
 * many real roots there are. With the complex switch on, a negative
 * discriminant gives a conjugate pair instead of "no real roots".
 */
return [
    'hideTexts' => true,
    'vars' => [
        'vertex_h' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'vertex_k' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'discriminant' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'root_1' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'root_2' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'vertex_h', 'vt' => 'dependent', 'l' => 'Vertex x (h)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'vertex_k', 'vt' => 'dependent', 'l' => 'Vertex y (k)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'discriminant', 'vt' => 'dependent', 'l' => 'Discriminant b² − 4ac']]]],
            ['FR1', [[['t' => 'v', 'n' => 'root_1', 'vt' => 'dependent', 'l' => 'First root']]]],
            ['FR1', [[['t' => 'v', 'n' => 'root_2', 'vt' => 'dependent', 'l' => 'Second root']]]],
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
    ctx.addUnmetCondition('a cannot be zero — without it there is no x² term and the equation is a straight line.');
    return;
  }
  var p = Number(v.precision);
  if (!isFinite(p) || p < 0) p = 4;
  p = Math.min(Math.round(p), 10);

  var complex = String(v.complex) === '1';
  var h = -b / (2 * a);
  var k = c - (b * b) / (4 * a);
  var disc = b * b - 4 * a * c;

  var form = snum(a, p) + '(x ' + (h < 0 ? '+ ' : '− ') + snum(Math.abs(h), p) + ')² '
    + (k < 0 ? '− ' : '+ ') + snum(Math.abs(k), p);

  ctx.exportValue('vertex_h', sround(h, p));
  ctx.exportValue('vertex_k', sround(k, p));
  ctx.exportValue('discriminant', sround(disc, p));

  var rootsText, rows;
  if (disc > 0) {
    var r1 = (-b + Math.sqrt(disc)) / (2 * a);
    var r2 = (-b - Math.sqrt(disc)) / (2 * a);
    ctx.exportValue('root_1', sround(r1, p));
    ctx.exportValue('root_2', sround(r2, p));
    rootsText = 'Two distinct real roots: x = ' + snum(r1, p) + ' and x = ' + snum(r2, p) + '.';
    rows = [['Root 1', snum(r1, p)], ['Root 2', snum(r2, p)]];
  } else if (disc === 0) {
    ctx.exportValue('root_1', sround(h, p));
    ctx.exportValue('root_2', sround(h, p));
    rootsText = 'A repeated root at x = ' + snum(h, p) + ' — the curve just touches the axis at the vertex.';
    rows = [['Repeated root', snum(h, p)]];
  } else if (complex) {
    var re = -b / (2 * a), im = Math.sqrt(-disc) / (2 * Math.abs(a));
    ctx.exportValue('root_1', sround(re, p));
    ctx.exportValue('root_2', sround(re, p));
    rootsText = 'No real roots. The pair is x = ' + snum(re, p) + ' ± ' + snum(im, p) + 'i.';
    rows = [['Real part', snum(re, p)], ['Imaginary part', '± ' + snum(im, p) + 'i']];
  } else {
    rootsText = 'No real roots: the discriminant is negative, so the parabola never crosses the x-axis. '
      + 'Turn on complex numbers to see the pair.';
    rows = [['Discriminant', snum(disc, p)]];
  }

  ctx.addHtml('<p><strong>' + snum(a, p) + 'x² ' + (b < 0 ? '− ' : '+ ') + snum(Math.abs(b), p) + 'x '
    + (c < 0 ? '− ' : '+ ') + snum(Math.abs(c), p) + ' = ' + form + '</strong></p>');
  ctx.addHtml('<p>' + rootsText + '</p>');
  ctx.addHtml(stable(['Step', 'Value'], [
    ['b / 2a', snum(b / (2 * a), p)],
    ['(b / 2a)²', snum((b / (2 * a)) * (b / (2 * a)), p)],
    ['Vertex (h, k)', '(' + snum(h, p) + ', ' + snum(k, p) + ')'],
    ['Axis of symmetry', 'x = ' + snum(h, p)]
  ].concat(rows)));
});
JS,
];
