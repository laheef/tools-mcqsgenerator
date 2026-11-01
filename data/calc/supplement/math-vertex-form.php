<?php
/**
 * Vertex form ↔ standard form.
 *
 * a(x − h)² + k expands to ax² − 2ah·x + (ah² + k); going the other way the
 * vertex sits at h = −b/2a with k = c − b²/4a. Roots come from the completed
 * square in both directions.
 */
return [
    'vars' => [
        'out_a' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'out_b' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'out_c' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'out_h' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'out_k' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'root_x1' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'root_x2' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'out_a', 'vt' => 'dependent', 'l' => 'a']]]],
            ['FR1', [[['t' => 'v', 'n' => 'out_b', 'vt' => 'dependent', 'l' => 'b']]]],
            ['FR1', [[['t' => 'v', 'n' => 'out_c', 'vt' => 'dependent', 'l' => 'c']]]],
            ['FR1', [[['t' => 'v', 'n' => 'out_h', 'vt' => 'dependent', 'l' => 'Vertex x (h)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'out_k', 'vt' => 'dependent', 'l' => 'Vertex y (k)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'root_x1', 'vt' => 'dependent', 'l' => 'First root']]]],
            ['FR1', [[['t' => 'v', 'n' => 'root_x2', 'vt' => 'dependent', 'l' => 'Second root']]]],
        ],
    ]],
    'showIf' => [
        'a_vertex' => 'options_VS == 1', 'h' => 'options_VS == 1', 'k' => 'options_VS == 1',
        'a_standard' => 'options_VS == 2', 'b' => 'options_VS == 2', 'c' => 'options_VS == 2',
    ],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var fromVertex = Math.round(Number(v.options_VS)) === 1;
  var a, b, c, h, k;

  if (fromVertex) {
    a = Number(v.a_vertex); h = Number(v.h); k = Number(v.k);
    if (v.a_vertex === '' || v.h === '' || v.k === '' || !isFinite(a) || !isFinite(h) || !isFinite(k)) {
      ctx.addUnmetCondition('Enter a, h and k from y = a(x − h)² + k.');
      return;
    }
    b = -2 * a * h;
    c = a * h * h + k;
  } else {
    a = Number(v.a_standard); b = Number(v.b); c = Number(v.c);
    if (v.a_standard === '' || v.b === '' || v.c === '' || !isFinite(a) || !isFinite(b) || !isFinite(c)) {
      ctx.addUnmetCondition('Enter a, b and c from y = ax² + bx + c.');
      return;
    }
    h = -b / (2 * a);
    k = c - (b * b) / (4 * a);
  }

  if (a === 0) {
    ctx.addUnmetCondition('a cannot be zero — a parabola needs an x² term.');
    return;
  }

  ctx.exportValue('out_a', sround(a, 6));
  ctx.exportValue('out_b', sround(b, 6));
  ctx.exportValue('out_c', sround(c, 6));
  ctx.exportValue('out_h', sround(h, 6));
  ctx.exportValue('out_k', sround(k, 6));

  var disc = b * b - 4 * a * c;
  if (disc >= 0) {
    var s = Math.sqrt(disc);
    ctx.exportValue('root_x1', sround((-b + s) / (2 * a), 6));
    ctx.exportValue('root_x2', sround((-b - s) / (2 * a), 6));
  }

  ctx.addHtml('<p><strong>y = ' + snum(a, 6) + '(x ' + (h < 0 ? '+ ' : '− ') + snum(Math.abs(h), 6)
    + ')² ' + (k < 0 ? '− ' : '+ ') + snum(Math.abs(k), 6) + ' &nbsp;=&nbsp; y = ' + snum(a, 6) + 'x² '
    + (b < 0 ? '− ' : '+ ') + snum(Math.abs(b), 6) + 'x ' + (c < 0 ? '− ' : '+ ') + snum(Math.abs(c), 6)
    + '</strong></p>');
  var rows = [
    ['Standard form', snum(a, 6) + 'x² ' + (b < 0 ? '− ' : '+ ') + snum(Math.abs(b), 6) + 'x '
      + (c < 0 ? '− ' : '+ ') + snum(Math.abs(c), 6)],
    ['Vertex form', snum(a, 6) + '(x ' + (h < 0 ? '+ ' : '− ') + snum(Math.abs(h), 6) + ')² '
      + (k < 0 ? '− ' : '+ ') + snum(Math.abs(k), 6)],
    ['Vertex', '(' + snum(h, 6) + ', ' + snum(k, 6) + ')'],
    ['Axis of symmetry', 'x = ' + snum(h, 6)],
    ['Discriminant', snum(disc, 6)]
  ];
  if (disc >= 0) {
    var s2 = Math.sqrt(disc);
    rows.push(['Roots', snum((-b + s2) / (2 * a), 6) + ' and ' + snum((-b - s2) / (2 * a), 6)]);
  } else {
    rows.push(['Roots', 'none real — the vertex sits ' + (a * k > 0 ? 'above' : 'below') + ' the x-axis']);
  }
  ctx.addHtml(stable(['Quantity', 'Value'], rows));
});
JS,
];
