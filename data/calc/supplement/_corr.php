<?php
/**
 * Shared arithmetic for the two correlation pages.
 *
 * Both pages shipped a script that read thirty `x`/`y` slots, dropped the ones
 * that were `null`, and then treated every *undefined* slot as a point. In the
 * browser all thirty slots answer `undefined` when untouched, so the coefficient
 * was computed over twenty-two pairs of nothing as well as the four the visitor
 * typed. The repair reads the boxes itself and counts only pairs with a number
 * in both halves.
 */
require_once __DIR__ . '/_builder.php';

/** The JavaScript every correlation repair starts from. */
function corr_js(): string
{
    return <<<'JS'
/* The pairs the visitor actually entered: both halves must hold a number. */
function corrPairs() {
  var xs = [], ys = [];
  for (var i = 1; i <= 30; i++) {
    var xEl = document.querySelector('.calc-widget input[data-var="x' + i + '"]');
    var yEl = document.querySelector('.calc-widget input[data-var="y' + i + '"]');
    var xr = xEl ? String(xEl.value).trim() : '';
    var yr = yEl ? String(yEl.value).trim() : '';
    if (xr === '' || yr === '') { continue; }
    var x = Number(xr), y = Number(yr);
    if (!isFinite(x) || !isFinite(y)) { continue; }
    xs.push(x); ys.push(y);
  }
  return { xs: xs, ys: ys, n: xs.length };
}

function corrMeans(p) {
  var sx = 0, sy = 0;
  for (var i = 0; i < p.n; i++) { sx += p.xs[i]; sy += p.ys[i]; }
  return { x: sx / p.n, y: sy / p.n };
}

function corrPearson(p) {
  var m = corrMeans(p), sxy = 0, sxx = 0, syy = 0;
  for (var i = 0; i < p.n; i++) {
    var dx = p.xs[i] - m.x, dy = p.ys[i] - m.y;
    sxy += dx * dy; sxx += dx * dx; syy += dy * dy;
  }
  if (sxx === 0 || syy === 0) { return NaN; }
  return sxy / Math.sqrt(sxx * syy);
}

/* Ranks 1…n, ties sharing the average of the ranks they cover. */
function corrRanks(list) {
  var idx = list.map(function (v, i) { return i; });
  idx.sort(function (a, b) { return list[a] - list[b]; });
  var ranks = new Array(list.length);
  var i = 0;
  while (i < idx.length) {
    var j = i;
    while (j + 1 < idx.length && list[idx[j + 1]] === list[idx[i]]) { j++; }
    var avg = (i + j) / 2 + 1;
    for (var k = i; k <= j; k++) { ranks[idx[k]] = avg; }
    i = j + 1;
  }
  return ranks;
}

function corrSpearman(p) {
  var rx = corrRanks(p.xs), ry = corrRanks(p.ys);
  return corrPearson({ xs: rx, ys: ry, n: p.n });
}

/* Kendall's tau-b: pair counts corrected for ties. */
function corrKendall(p) {
  var conc = 0, disc = 0, tieX = 0, tieY = 0;
  for (var i = 0; i < p.n; i++) {
    for (var j = i + 1; j < p.n; j++) {
      var dx = p.xs[i] - p.xs[j], dy = p.ys[i] - p.ys[j];
      if (dx === 0 && dy === 0) { continue; }
      if (dx === 0) { tieX++; continue; }
      if (dy === 0) { tieY++; continue; }
      if ((dx > 0) === (dy > 0)) { conc++; } else { disc++; }
    }
  }
  var den = Math.sqrt((conc + disc + tieX) * (conc + disc + tieY));
  return {
    tau: den === 0 ? NaN : (conc - disc) / den,
    concordant: conc, discordant: disc, tiedX: tieX, tiedY: tieY
  };
}

function corrWord(r) {
  if (!isFinite(r)) { return ''; }
  var a = Math.abs(r);
  if (a === 0) { return 'no correlation'; }
  var strength = a === 1 ? 'a perfect' : a >= 0.8 ? 'a very strong' : a >= 0.6 ? 'a strong'
    : a >= 0.4 ? 'a moderate' : a >= 0.2 ? 'a weak' : 'a very weak';
  return strength + ' ' + (r > 0 ? 'positive' : 'negative') + ' correlation';
}
JS;
}
