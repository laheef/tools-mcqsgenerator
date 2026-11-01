<?php
/**
 * Corner point — the optimal corner of a two-variable linear program.
 *
 * The harvested page asked for up to five constraints, an objective Pₓx + Pᵧy and
 * whether to maximise or minimise, then answered nothing: the two surviving
 * helpers (`getValue`, `getConstraints`) only echoed their argument back.
 *
 * The method is the graphical one, done exactly:
 *
 *   1. every constraint aᵢx + bᵢy ⋛ cᵢ is a line, and so are x = 0 and y = 0
 *   2. every pair of lines meets in a point, unless they are parallel
 *   3. a point is a corner of the feasible region when it satisfies every
 *      constraint (equality counts as satisfied)
 *   4. the objective is evaluated at each corner, and the largest or smallest
 *      value is the answer
 *
 * If no point is feasible the page says so instead of inventing one, and if the
 * region is unbounded it says that too.
 */
return [
    'hideTexts' => true,
    'remove' => ['n_Constraints', 'b1_abs', 'b2_abs', 'b3_abs', 'b4_abs', 'b5_abs',
                 'py_abs', 'ineq1', 'ineq2', 'ineq3', 'ineq4', 'ineq5'],
    'vars' => [
        'opt_x' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'opt_y' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'opt_value' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'corners' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-corner-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'opt_x', 'vt' => 'dependent', 'l' => 'Optimal x']]]],
            ['FR1', [[['t' => 'v', 'n' => 'opt_y', 'vt' => 'dependent', 'l' => 'Optimal y']]]],
            ['FR1', [[['t' => 'v', 'n' => 'opt_value', 'vt' => 'dependent', 'l' => 'Value of the objective there']]]],
            ['FR1', [[['t' => 'v', 'n' => 'corners', 'vt' => 'dependent', 'l' => 'Corner points found']]]],
        ],
    ]],
    'js' => <<<'JS'
/*
 * How many constraints the visitor asked for. The picker's option values are the
 * counts themselves, and its label is the number, so either reads correctly.
 */
function constraintCount() {
  var sel = document.querySelector('select[data-var="n_constraints"]');
  if (sel && sel.selectedIndex >= 0) {
    var n = Number(sel.options[sel.selectedIndex].text);
    if (isFinite(n) && n >= 2 && n <= 5) { return n; }
  }
  var radios = document.querySelectorAll('input[type="radio"][name="n_constraints"]');
  for (var i = 0; i < radios.length; i++) {
    if (radios[i].checked) {
      var host = radios[i].closest('label') || radios[i].parentNode;
      var m = (host.innerText || '').match(/(\d+)/);
      if (m) { return Number(m[1]); }
    }
  }
  return null;
}

/* the relation of one row: 0 is <=, 1 is >=, 2 is = */
function relation(i) {
  var name = 'i' + i;
  var radios = document.querySelectorAll('input[type="radio"][name="' + name + '"]');
  for (var k = 0; k < radios.length; k++) {
    if (radios[k].checked) {
      var host = radios[k].closest('label') || radios[k].parentNode;
      var t = (host.innerText || '').trim();
      if (t === '≤') { return 0; }
      if (t === '≥') { return 1; }
      if (t === '=') { return 2; }
      return Math.round(Number(radios[k].value)) || 0;
    }
  }
  var sel = document.querySelector('select[data-var="' + name + '"]');
  if (sel && sel.selectedIndex >= 0) {
    var text = (sel.options[sel.selectedIndex].text || '').trim();
    if (text === '≤') { return 0; }
    if (text === '≥') { return 1; }
    if (text === '=') { return 2; }
  }
  return 0;
}

function solve2(a1, b1, c1, a2, b2, c2) {
  var det = a1 * b2 - a2 * b1;
  if (Math.abs(det) < 1e-12) { return null; }         /* parallel */
  return [(c1 * b2 - c2 * b1) / det, (a1 * c2 - a2 * c1) / det];
}

omni.onResult(['px', 'py', 'min_max', 'n_constraints'], function (ctx, v) {
  var px = Number(v.px);
  var py = Number(v.py);
  if (!isFinite(px) || !isFinite(py) || (px === 0 && py === 0)) {
    ctx.addUnmetCondition('Enter the two coefficients of the objective — Pₓ and Pᵧ cannot both be zero.');
    return;
  }

  var count = constraintCount();
  if (count === null) {
    ctx.addUnmetCondition('Choose how many constraints there are.');
    return;
  }

  /* read the constraints that are actually switched on */
  var lines = [];
  for (var i = 1; i <= count; i++) {
    var a = Number(v['a' + i]), b = Number(v['b' + i]), c = Number(v['c' + i]);
    if (v['a' + i] === '' || v['b' + i] === '' || v['c' + i] === '') {
      ctx.addUnmetCondition('Fill in A' + i + ', B' + i + ' and C' + i + ' for constraint ' + i + '.');
      return;
    }
    if (!isFinite(a) || !isFinite(b) || !isFinite(c)) {
      ctx.addUnmetCondition('Constraint ' + i + ' has a value that is not a number.');
      return;
    }
    if (a === 0 && b === 0) {
      ctx.addUnmetCondition('Constraint ' + i + ' has A and B both zero, so it is not a line.');
      return;
    }
    lines.push({ a: a, b: b, c: c, rel: relation(i), label: fmt(a) + 'x + ' + fmt(b) + 'y ' + REL[relation(i)] + ' ' + fmt(c) });
  }

  /* the two non-negativity lines close the region */
  lines.push({ a: 1, b: 0, c: 0, rel: 1, label: 'x ≥ 0', hidden: true });
  lines.push({ a: 0, b: 1, c: 0, rel: 1, label: 'y ≥ 0', hidden: true });

  /* every intersection, kept when it satisfies every constraint */
  var points = [];
  var seen = {};
  for (var p = 0; p < lines.length; p++) {
    for (var q = p + 1; q < lines.length; q++) {
      var pt = solve2(lines[p].a, lines[p].b, lines[p].c, lines[q].a, lines[q].b, lines[q].c);
      if (pt === null) { continue; }
      var x = pt[0], y = pt[1];
      if (Math.abs(x) < 1e-9) { x = 0; }
      if (Math.abs(y) < 1e-9) { y = 0; }
      var key = x.toFixed(9) + '|' + y.toFixed(9);
      if (seen[key]) { continue; }
      var ok = true;
      for (var k = 0; k < lines.length && ok; k++) {
        var lhs = lines[k].a * x + lines[k].b * y;
        var slack = lhs - lines[k].c;
        var scale = Math.max(1, Math.abs(lines[k].c));
        if (lines[k].rel === 0 && slack > 1e-9 * scale) { ok = false; }        /* <= */
        if (lines[k].rel === 1 && slack < -1e-9 * scale) { ok = false; }       /* >= */
        if (lines[k].rel === 2 && Math.abs(slack) > 1e-9 * scale) { ok = false; } /* = */
      }
      if (!ok) { continue; }
      seen[key] = true;
      points.push({ x: x, y: y, value: px * x + py * y });
    }
  }

  if (points.length === 0) {
    ctx.addHtml('<p><strong>No point satisfies all of those constraints at once</strong>, so the region is '
      + 'empty and there is nothing to optimise. Check the direction of each inequality: switching one '
      + 'from ≤ to ≥ usually turns an empty region into a real one.</p>');
    ctx.addUnmetCondition('No feasible region — the constraints contradict each other.');
    return;
  }

  var maximise = Math.round(Number(v.min_max)) === 0;
  var best = points[0];
  for (var m = 1; m < points.length; m++) {
    var better = maximise ? points[m].value > best.value : points[m].value < best.value;
    if (better) { best = points[m]; }
  }

  ctx.exportValue('opt_x', sround(best.x, 4));
  ctx.exportValue('opt_y', sround(best.y, 4));
  ctx.exportValue('opt_value', sround(best.value, 4));
  ctx.exportValue('corners', points.length);

  ctx.addHtml('<p><strong>' + (maximise ? 'Maximum' : 'Minimum') + ' of P = ' + fmt(px) + 'x + ' + fmt(py)
    + 'y is ' + snum(best.value, 4) + ', at x = ' + snum(best.x, 4) + ', y = ' + snum(best.y, 4)
    + '.</strong> That is one of ' + points.length + ' corner point' + (points.length === 1 ? '' : 's')
    + ' the constraints allow.</p>');

  var rows = lines.filter(function (l) { return !l.hidden; }).map(function (l, idx) {
    return [String(idx + 1), l.label];
  });
  ctx.addHtml('<p>The constraints, as entered (with x ≥ 0 and y ≥ 0 added because the variables cannot be negative):</p>');
  ctx.addHtml(stable(['#', 'Constraint'], rows));

  var pointRows = points.map(function (pt) {
    var mark = pt === best ? ' &larr; best' : '';
    return ['(' + snum(pt.x, 4) + ', ' + snum(pt.y, 4) + ')', snum(pt.value, 4) + mark];
  });
  ctx.addHtml(stable(['Corner point', 'P there'], pointRows, ['Best', snum(best.value, 4)]));

  ctx.addHtml('<p class="calc-unmet">Why the corners are enough: a linear objective over a polygon of '
    + 'constraints reaches its best value at a corner (or along a whole edge, when two corners tie), so '
    + 'listing the corners and evaluating P at each one is the whole method — there is no interior point '
    + 'to check. An edge tie shows up here as two corners with the same P. If the feasible region is '
    + 'unbounded in the direction the objective improves, the linear program has no maximum at all; the '
    + 'corners printed above are still the corners, but the value can be driven arbitrarily high along '
    + 'the open direction. Fractions are shown rounded to four places.</p>');
});

/* a number as it should read in an equation */
function fmt(n) {
  if (Math.abs(n - Math.round(n)) < 1e-12) { return String(Math.round(n)); }
  return snum(n, 4);
}
var REL = ['≤', '≥', '='];
JS,
];
