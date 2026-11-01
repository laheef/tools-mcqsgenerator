<?php
/**
 * Interval notation ↔ inequality notation.
 *
 * Both directions are the same dictionary: a round bracket is a strict
 * inequality, a square bracket a non-strict one, and an unbounded side is the
 * infinity sign. A compound pair is simplified honestly — an "and" is an
 * intersection, an "or" a union, and either can collapse to a single inequality
 * or to every real number.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'out_low' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'out_high' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'out_low', 'vt' => 'dependent', 'l' => 'Lower end of the answer']]]],
            ['FR1', [[['t' => 'v', 'n' => 'out_high', 'vt' => 'dependent', 'l' => 'Upper end of the answer']]]],
        ],
    ]],
    'showIf' => [
        'sides' => 'type == 1',
        'one_sided' => 'type == 1 and sides == 1',
        'a_var' => 'type == 1 and sides == 1',
        'two_sided' => 'type == 1 and sides == 2',
        'aa_var' => 'type == 1 and sides == 2',
        'bb_var' => 'type == 1 and sides == 2',
        'ineq1' => 'type == 1 and sides == 3',
        'operator' => 'type == 1 and sides == 3',
        'ineq2' => 'type == 1 and sides == 3',
        'aaa_var' => 'type == 1 and sides == 3',
        'bbb_var' => 'type == 1 and sides == 3',
        'interval' => 'type == 2',
        'a_int' => 'type == 2',
        'b_int' => 'type == 2',
    ],
    'js' => <<<'JS'
var LE = ' ≤ ', GE = ' ≥ ', LT = ' < ', GT = ' > ';

/* (value, closed, direction) — direction −1 means "x on the low side" */
function bound(text) {
  if (text === '-∞' || text === '−∞') return { v: -Infinity, closed: false, low: true };
  if (text === '∞') return { v: Infinity, closed: false, low: false };
  return text;
}

function readOne(kind, a) {
  /* kind: 1 x<a, 2 x≤a, 3 x>a, 4 x≥a */
  switch (kind) {
    case 1: return { op: '<', hi: a, hiClosed: false };
    case 2: return { op: '≤', hi: a, hiClosed: true };
    case 3: return { op: '>', lo: a, loClosed: false };
    default: return { op: '≥', lo: a, loClosed: true };
  }
}

function show(v, closed) {
  return (closed ? '[' : '(') + v + (closed ? ']' : ')');
}

omni.onResult([], function (ctx, v) {
  var type = Math.round(Number(v.type));
  if (!isFinite(type)) { ctx.addUnmetCondition('Choose what you want to convert.'); return; }

  /* ---------------------------------------------------------------- ineq → interval */
  if (type === 1) {
    var sides = Math.round(Number(v.sides));
    if (!isFinite(sides)) { ctx.addUnmetCondition('Choose the inequality type.'); return; }

    if (sides === 1) {
      var kind = Math.round(Number(v.one_sided));
      var a = Number(v.a_var);
      if (!isFinite(kind) || v.a_var === '' || !isFinite(a)) {
        ctx.addUnmetCondition('Enter a and pick the inequality.');
        return;
      }
      var out;
      if (kind === 1) out = { text: 'x < ' + snum(a, 6), int: '(−∞, ' + snum(a, 6) + ')', lo: -Infinity, hi: a };
      else if (kind === 2) out = { text: 'x ≤ ' + snum(a, 6), int: '(−∞, ' + snum(a, 6) + ']', lo: -Infinity, hi: a };
      else if (kind === 3) out = { text: 'x > ' + snum(a, 6), int: '(' + snum(a, 6) + ', ∞)', lo: a, hi: Infinity };
      else out = { text: 'x ≥ ' + snum(a, 6), int: '[' + snum(a, 6) + ', ∞)', lo: a, hi: Infinity };
      if (isFinite(out.lo)) ctx.exportValue('out_low', sround(out.lo, 6));
      if (isFinite(out.hi)) ctx.exportValue('out_high', sround(out.hi, 6));
      ctx.addHtml('<p><strong>' + out.text + ' &nbsp;=&nbsp; ' + out.int + '</strong></p>');
      ctx.addHtml(stable(['Notation', 'Answer'], [['Inequality', out.text], ['Interval', out.int]]));
      return;
    }

    if (sides === 2) {
      var pick = Math.round(Number(v.two_sided));
      var lo = Number(v.aa_var), hi = Number(v.bb_var);
      if (!isFinite(pick) || v.aa_var === '' || v.bb_var === '' || !isFinite(lo) || !isFinite(hi)) {
        ctx.addUnmetCondition('Enter a and b and pick the inequality.');
        return;
      }
      if (hi <= lo) {
        ctx.addUnmetCondition('b has to be greater than a — otherwise the interval is empty.');
        return;
      }
      var loC = pick >= 2, hiC = pick === 3 || pick === 4;
      var text2 = snum(lo, 6) + (pick === 2 || pick === 4 ? ' ≤ ' : ' < ') + 'x'
        + (pick === 1 || pick === 2 ? ' < ' : ' ≤ ') + snum(hi, 6);
      var int2 = (loC ? '[' : '(') + snum(lo, 6) + ', ' + snum(hi, 6) + (hiC ? ']' : ')');
      ctx.exportValue('out_low', sround(lo, 6));
      ctx.exportValue('out_high', sround(hi, 6));
      ctx.addHtml('<p><strong>' + text2 + ' &nbsp;=&nbsp; ' + int2 + '</strong></p>');
      ctx.addHtml(stable(['Notation', 'Answer'], [['Inequality', text2], ['Interval', int2]]));
      return;
    }

    /* compound: two inequalities joined by and / or */
    var k1 = Math.round(Number(v.ineq1)), k2 = Math.round(Number(v.ineq2));
    var op = Math.round(Number(v.operator));
    var a1 = Number(v.aaa_var), b1 = Number(v.bbb_var);
    if (!isFinite(k1) || !isFinite(k2) || v.aaa_var === '' || v.bbb_var === '' || !isFinite(a1) || !isFinite(b1)) {
      ctx.addUnmetCondition('Fill in both inequalities, their numbers and the operator.');
      return;
    }
    var one = readOne(k1, a1), two = readOne(k2, b1);
    var firstText = 'x' + one.op + snum(a1, 6), secondText = 'x' + two.op + snum(b1, 6);
    var joined = firstText + (op === 1 ? ' and ' : ' or ') + secondText;

    var result, rows;
    if (op === 1) {
      /* intersection: the tighter of the two bounds on each side wins */
      var loV = -Infinity, hiV = Infinity, loC = true, hiC = true, desc;
      if (one.lo !== undefined && two.lo !== undefined) {
        loV = Math.max(one.lo, two.lo); loC = (one.lo === loV ? one.loClosed : two.loClosed);
        var biggest = Math.max(a1, b1);
        result = { text: 'x > ' + snum(biggest, 6), int: '(' + snum(biggest, 6) + ', ∞)' };
        if (one.loClosed || two.loClosed) result = { text: 'x ≥ ' + snum(biggest, 6), int: '[' + snum(biggest, 6) + ', ∞)' };
      } else if (one.hi !== undefined && two.hi !== undefined) {
        var smallest = Math.min(a1, b1);
        result = { text: 'x < ' + snum(smallest, 6), int: '(−∞, ' + snum(smallest, 6) + ')' };
        if (one.hiClosed || two.hiClosed) result = { text: 'x ≤ ' + snum(smallest, 6), int: '(−∞, ' + snum(smallest, 6) + ']' };
      } else {
        var lowB = one.lo !== undefined ? one : two;
        var highB = one.hi !== undefined ? one : two;
        var lv = lowB.lo, hv = highB.hi;
        if (hv <= lv) result = { text: 'no solution', int: '∅' };
        else result = {
          text: snum(lv, 6) + (lowB.loClosed ? ' ≤ ' : ' < ') + 'x' + (highB.hiClosed ? ' ≤ ' : ' < ') + snum(hv, 6),
          int: (lowB.loClosed ? '[' : '(') + snum(lv, 6) + ', ' + snum(hv, 6) + (highB.hiClosed ? ']' : ')')
        };
      }
    } else {
      /* union: keeps the looser bound; same-direction pairs collapse */
      if ((one.lo !== undefined && two.lo !== undefined) || (one.hi !== undefined && two.hi !== undefined)) {
        var bothLow = one.lo !== undefined && two.lo !== undefined;
        var val = bothLow ? Math.min(a1, b1) : Math.max(a1, b1);
        result = bothLow
          ? { text: 'x > ' + snum(val, 6), int: '(' + snum(val, 6) + ', ∞)' }
          : { text: 'x < ' + snum(val, 6), int: '(−∞, ' + snum(val, 6) + ')' };
      } else {
        result = { text: 'every real number', int: '(−∞, ∞)' };
      }
    }

    var lowOut = result.int.indexOf('−∞') === 0 ? '' : (result.int.split(',')[0] || '').replace(/[\[(]/, '');
    if (isFinite(parseFloat(lowOut))) ctx.exportValue('out_low', parseFloat(lowOut));
    ctx.addHtml('<p><strong>' + joined + ' &nbsp;gives&nbsp; ' + result.text + ' &nbsp;=&nbsp; '
      + result.int + '</strong></p>');
    ctx.addHtml(stable(['Notation', 'Answer'], [
      ['Compound inequality', joined],
      ['Simplified inequality', result.text],
      ['Interval', result.int]
    ]));
    return;
  }

  /* ---------------------------------------------------------------- interval → ineq */
  var pickI = Math.round(Number(v.interval));
  var aI = Number(v.a_int), bI = Number(v.b_int);
  if (!isFinite(pickI)) { ctx.addUnmetCondition('Choose the interval type.'); return; }
  var needsBoth = pickI >= 1 && pickI <= 4;
  if ((needsBoth && (v.a_int === '' || v.b_int === '')) || (!needsBoth && v.a_int === '')
      || !isFinite(aI) || (needsBoth && !isFinite(bI))) {
    ctx.addUnmetCondition(needsBoth ? 'Enter both ends of the interval.' : 'Enter the end of the interval.');
    return;
  }
  if (needsBoth && bI <= aI) {
    ctx.addUnmetCondition('The right-hand end has to be larger than the left-hand one.');
    return;
  }

  var textI, intI;
  switch (pickI) {
    case 1: textI = snum(aI, 6) + ' < x < ' + snum(bI, 6); intI = '(' + snum(aI, 6) + ', ' + snum(bI, 6) + ')'; break;
    case 2: textI = snum(aI, 6) + ' < x ≤ ' + snum(bI, 6); intI = '(' + snum(aI, 6) + ', ' + snum(bI, 6) + ']'; break;
    case 3: textI = snum(aI, 6) + ' ≤ x < ' + snum(bI, 6); intI = '[' + snum(aI, 6) + ', ' + snum(bI, 6) + ')'; break;
    case 4: textI = snum(aI, 6) + ' ≤ x ≤ ' + snum(bI, 6); intI = '[' + snum(aI, 6) + ', ' + snum(bI, 6) + ']'; break;
    case 5: textI = 'x > ' + snum(aI, 6); intI = '(' + snum(aI, 6) + ', ∞)'; break;
    case 6: textI = 'x ≥ ' + snum(aI, 6); intI = '[' + snum(aI, 6) + ', ∞)'; break;
    case 7: textI = 'x < ' + snum(aI, 6); intI = '(−∞, ' + snum(aI, 6) + ')'; break;
    default: textI = 'x ≤ ' + snum(aI, 6); intI = '(−∞, ' + snum(aI, 6) + ']';
  }
  if (pickI <= 6) ctx.exportValue('out_low', sround(aI, 6));
  if (needsBoth) ctx.exportValue('out_high', sround(bI, 6));
  ctx.addHtml('<p><strong>' + intI + ' &nbsp;=&nbsp; ' + textI + '</strong></p>');
  ctx.addHtml(stable(['Notation', 'Answer'], [['Interval', intI], ['Inequality', textI]]));
});
JS,
];
