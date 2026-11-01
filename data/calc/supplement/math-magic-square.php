<?php
/**
 * Magic square — build one and print it.
 *
 * The page had a single "size" box and no group to put it in, so it rendered
 * "nothing to calculate here". The repair places the box, computes the magic
 * constant and prints the square itself, using the algorithm that suits the size:
 *
 *   odd order          the Siamese method (start in the middle of the top row,
 *                      move up and right, wrap, drop one row when blocked)
 *   doubly even (4k)   the cross method (count 1..n² in order, then reflect the
 *                      cells on the two diagonals in the centre)
 *   singly even (4k+2) Strachey's method (four odd-order squares, then a
 *                      patterned exchange of columns between them)
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'magic_constant' => sup_dep('0'),
        'magic_kind' => sup_dep('0'),
        'magic_order' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-magic-inputs', 'The square', [
            sup_field(sup_num('size', 'How many rows and columns? (3 to 20)')),
        ]),
        sup_group('supp-magic-results', 'Results', [
            sup_field(sup_out('magic_order', 'Order of the square (rows = columns)')),
            sup_field(sup_out('magic_constant', 'Magic constant — the sum of every row, column and diagonal')),
            sup_field(sup_out('magic_kind', 'Method used (1 odd, 2 doubly even, 3 singly even)')),
        ]),
    ],
    'js' => <<<'JS'
function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

function blank(n) {
  var g = [];
  for (var i = 0; i < n; i++) { g.push(new Array(n).fill(0)); }
  return g;
}

/* odd order: the Siamese method */
function oddSquare(n) {
  var g = blank(n);
  var r = 0, c = Math.floor(n / 2);
  for (var k = 1; k <= n * n; k++) {
    g[r][c] = k;
    var nr = (r - 1 + n) % n;
    var nc = (c + 1) % n;
    if (g[nr][nc] !== 0) { nr = (r + 1) % n; nc = c; }
    r = nr; c = nc;
  }
  return g;
}

/* doubly even: count in order, then reflect the diagonals through the centre */
function doublyEvenSquare(n) {
  var g = blank(n);
  var k = 1;
  for (var r = 0; r < n; r++) {
    for (var c = 0; c < n; c++) {
      g[r][c] = k++;
    }
  }
  var top = n * n + 1;
  for (var i = 0; i < n; i++) {
    for (var j = 0; j < n; j++) {
      var onDiag = (i % 4 === j % 4) || ((i % 4) + (j % 4) === 3);
      if (onDiag) { g[i][j] = top - g[i][j]; }
    }
  }
  return g;
}

/*
 * singly even: Strachey's method.
 *
 * Four odd-order squares of size m = n/2 are stacked as quadrants, each carrying
 * a different block of the numbers (the bottom-right takes the middle block).
 * Two patterned exchanges of columns then even out the rows, and the middle row
 * is shifted by one column — the shift is what makes the diagonals come out
 * right, and leaving it out gives a square whose rows do not add up.
 */
function singlyEvenSquare(n) {
  var m = n / 2;
  var base = oddSquare(m);
  var g = blank(n);
  var blocks = { tl: 0, tr: 2 * m * m, bl: 3 * m * m, br: m * m };
  for (var i = 0; i < m; i++) {
    for (var j = 0; j < m; j++) {
      g[i][j] = base[i][j] + blocks.tl;
      g[i][j + m] = base[i][j] + blocks.tr;
      g[i + m][j] = base[i][j] + blocks.bl;
      g[i + m][j + m] = base[i][j] + blocks.br;
    }
  }
  var k = (n - 2) / 4;
  /* the left-hand exchange, with the middle row shifted one column to the right */
  for (var r = 0; r < m; r++) {
    for (var c = 0; c < k; c++) {
      var col = c + (r === (m - 1) / 2 ? 1 : 0);
      if (col >= m) { continue; }
      var t = g[r][col]; g[r][col] = g[r + m][col]; g[r + m][col] = t;
    }
  }
  /* the right-hand exchange, over the last k-1 columns */
  for (var r2 = 0; r2 < m; r2++) {
    for (var c2 = 0; c2 < k - 1; c2++) {
      var col2 = n - 1 - c2;
      var t2 = g[r2][col2]; g[r2][col2] = g[r2 + m][col2]; g[r2 + m][col2] = t2;
    }
  }
  return g;
}

omni.onResult(['size'], function (ctx, v) {
  var n = num('size');
  if (n === null) {
    ctx.addUnmetCondition('Enter how many rows the square should have.');
    return;
  }
  if (n < 3) {
    ctx.addUnmetCondition('A magic square needs at least three rows — with two there is only one arrangement.');
    return;
  }
  if (Math.round(n) !== n) {
    ctx.addUnmetCondition('The order has to be a whole number.');
    return;
  }
  if (n > 20) {
    ctx.addUnmetCondition('This page builds squares up to 20 × 20.');
    return;
  }

  var kind = n % 2 === 1 ? 1 : (n % 4 === 0 ? 2 : 3);
  var g = kind === 1 ? oddSquare(n) : (kind === 2 ? doublyEvenSquare(n) : singlyEvenSquare(n));
  var constant = n * (n * n + 1) / 2;

  /* prove it rather than assert it */
  var rowsOk = true, colsOk = true, d1 = 0, d2 = 0;
  for (var i = 0; i < n; i++) {
    var rowSum = 0, colSum = 0;
    for (var j = 0; j < n; j++) { rowSum += g[i][j]; colSum += g[j][i]; }
    if (rowSum !== constant) { rowsOk = false; }
    if (colSum !== constant) { colsOk = false; }
    d1 += g[i][i];
    d2 += g[i][n - 1 - i];
  }

  ctx.exportValue('magic_order', n);
  ctx.exportValue('magic_constant', constant);
  ctx.exportValue('magic_kind', kind);

  var kindName = kind === 1 ? 'odd order, Siamese method'
    : kind === 2 ? 'doubly even order, cross method'
    : 'singly even order, Strachey’s method';

  ctx.addHtml('<p><strong>A ' + n + ' × ' + n + ' magic square of order ' + n + ' — ' + kindName
    + '. Every row, every column and both diagonals add up to ' + constant
    + '. Checked: rows ' + (rowsOk ? 'yes' : 'no') + ', columns ' + (colsOk ? 'yes' : 'no')
    + ', diagonals ' + (d1 === constant && d2 === constant ? 'yes' : 'no') + '.</strong></p>');

  var code = outlineSafe(g);
  ctx.addHtml('<pre class="calc-table-pre">' + code + '</pre>');
  ctx.addHtml(stable(['Row', 'Values', 'Sum'], g.map(function (row, idx) {
    return [String(idx + 1), row.join('  '), String(row.reduce(function (a, b) { return a + b; }, 0))];
  })));

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Order', String(n)],
    ['Cells', String(n * n)],
    ['Magic constant', String(constant)],
    ['Method', kindName],
    ['Smallest number', '1'],
    ['Largest number', String(n * n)],
    ['Sum of all cells', String(n * n * (n * n + 1) / 2)]
  ]));

  ctx.addHtml('<p class="calc-unmet">The magic constant is fixed by the order: the cells hold every number '
    + 'from 1 to n² exactly once, so their total is n²(n²+1)/2, and each of the n rows must carry an equal '
    + 'share of it — n(n²+1)/2. That is why ' + n + ' × ' + n + ' always comes to ' + constant
    + ', whatever arrangement the method produces. The squares above are normal magic squares (1 to n², no '
    + 'repeats). A square counts as magic on the rows and columns alone; this one also has equal diagonals, '
    + 'which makes it a *pan*-diagonal square only if every broken diagonal sums correctly too — that needs '
    + 'a stricter method than the one used here.</p>');
});

/* draw the square as a grid of fixed-width numbers, so the columns line up */
function outlineSafe(g) {
  var n = g.length;
  var width = String(n * n).length;
  var lines = [];
  for (var i = 0; i < n; i++) {
    var cells = g[i].map(function (x) {
      var s = String(x);
      while (s.length < width) { s = ' ' + s; }
      return s;
    });
    lines.push(cells.join('  '));
  }
  return lines.join('\n');
}
JS,
];
