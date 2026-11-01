<?php
/**
 * Linear independence of a set of vectors.
 *
 * The vectors are the rows of a matrix; they are independent exactly when the
 * matrix has full row rank. Rank comes from Gaussian elimination with partial
 * pivoting, so no determinant shortcut is needed for the 3×3 and 4×4 cases.
 */
return [
    'vars' => [
        'vector_rank' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'linearly_independent' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'vector_count' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'vector_count', 'vt' => 'dependent', 'l' => 'Vectors given']]]],
            ['FR1', [[['t' => 'v', 'n' => 'vector_rank', 'vt' => 'dependent', 'l' => 'Rank of the set']]]],
            ['FR1', [[['t' => 'v', 'n' => 'linearly_independent', 'vt' => 'dependent',
                       'l' => 'Linearly independent? (1 = yes, 0 = no)']]]],
        ],
    ]],
    'showIf' => [
        'a3' => 'noOfColumns >= 3', 'a4' => 'noOfColumns >= 4',
        'b1' => 'noOfRows >= 2', 'b2' => 'noOfRows >= 2',
        'b3' => 'noOfRows >= 2 and noOfColumns >= 3',
        'b4' => 'noOfRows >= 2 and noOfColumns >= 4',
        'c1' => 'noOfRows >= 3', 'c2' => 'noOfRows >= 3',
        'c3' => 'noOfRows >= 3 and noOfColumns >= 3',
        'c4' => 'noOfRows >= 3 and noOfColumns >= 4',
        'd1' => 'noOfRows >= 4', 'd2' => 'noOfRows >= 4',
        'd3' => 'noOfRows >= 4 and noOfColumns >= 3',
        'd4' => 'noOfRows >= 4 and noOfColumns >= 4',
    ],
    'js' => <<<'JS'
function rank(rows) {
  var m = rows.map(function (r) { return r.slice(); });
  var r = 0;
  var cols = m[0] ? m[0].length : 0;
  for (var c = 0; c < cols && r < m.length; c++) {
    var pivot = -1, best = 1e-12;
    for (var i = r; i < m.length; i++) {
      if (Math.abs(m[i][c]) > best) { best = Math.abs(m[i][c]); pivot = i; }
    }
    if (pivot === -1) continue;
    var tmp = m[r]; m[r] = m[pivot]; m[pivot] = tmp;
    for (var j = r + 1; j < m.length; j++) {
      var f = m[j][c] / m[r][c];
      for (var k = c; k < cols; k++) m[j][k] -= f * m[r][k];
    }
    r++;
  }
  return r;
}

omni.onResult([], function (ctx, v) {
  var count = Math.round(Number(v.noOfRows));
  var dims = Math.round(Number(v.noOfColumns));
  if (!isFinite(count) || !isFinite(dims)) {
    ctx.addUnmetCondition('Choose how many vectors and how many coordinates each has.');
    return;
  }
  var letters = ['a', 'b', 'c', 'd'];
  var rows = [];
  for (var i = 0; i < count; i++) {
    var row = [];
    for (var j = 0; j < dims; j++) {
      var raw = v[letters[i] + (j + 1)];
      if (raw === undefined || raw === null || raw === '') {
        ctx.addUnmetCondition('Enter every coordinate: vector ' + (i + 1) + ' still has a blank box.');
        return;
      }
      var n = Number(raw);
      if (!isFinite(n)) {
        ctx.addUnmetCondition('Vector ' + (i + 1) + ' has a coordinate that is not a number.');
        return;
      }
      row.push(n);
    }
    rows.push(row);
  }
  var r = rank(rows);
  var independent = r === count;
  ctx.exportValue('vector_count', count);
  ctx.exportValue('vector_rank', r);
  ctx.exportValue('linearly_independent', independent ? 1 : 0);

  ctx.addHtml('<p><strong>' + (independent
    ? 'The ' + count + ' vectors are linearly independent.'
    : 'The ' + count + ' vectors are linearly dependent.')
    + '</strong> The set spans a ' + r + '-dimensional space'
    + (independent ? ', one dimension per vector.' : ' — fewer dimensions than vectors, so at least one '
       + 'vector is a combination of the others.') + '</p>');
  var body = rows.map(function (row, idx) {
    return ['v' + (idx + 1), '(' + row.map(function (x) { return snum(x, 6); }).join(', ') + ')'];
  });
  body.push(['Rank', String(r)]);
  ctx.addHtml(stable(['Vector', 'Coordinates'], body));
});
JS,
];
