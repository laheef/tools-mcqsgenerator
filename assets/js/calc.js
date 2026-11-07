/* ==========================================================================
   Onim Calculator rebuild — client solver
   A faithful mirror of lib/Expr.php, lib/Solver.php, lib/Units.php and
   lib/Format.php. The page is already solved server-side; this file takes over
   so every keystroke re-solves locally with no network round-trip.
   ========================================================================== */
(function () {
  'use strict';

  var defEl = document.getElementById('calc-definition');
  if (!defEl) return;

  var DEF;
  try {
    DEF = JSON.parse(defEl.textContent || '{}');
  } catch (e) {
    return;
  }

  /* ------------------------------------------------------------ expression */
  var CONSTANTS = { PI: Math.PI, pi: Math.PI, e: Math.E, E: Math.E };
  var DAY_MS = 86400000;

  function tokenize(src) {
    var out = [], i = 0, n = src.length;
    while (i < n) {
      var c = src[i];
      if (/\s/.test(c)) { i++; continue; }
      if (/[0-9]/.test(c) || (c === '.' && /[0-9]/.test(src[i + 1] || ''))) {
        var m = /^(?:\d+(?:\.\d*)?|\.\d+)(?:[eE][+-]?\d+)?/.exec(src.slice(i));
        out.push({ t: 'num', v: parseFloat(m[0]) });
        i += m[0].length;
        continue;
      }
      if (/[A-Za-z_]/.test(c)) {
        var w = /^[A-Za-z_][A-Za-z0-9_]*/.exec(src.slice(i));
        out.push({ t: 'name', v: w[0] });
        i += w[0].length;
        continue;
      }
      var two = src.substr(i, 2);
      if (two === '<=' || two === '>=' || two === '==' || two === '!=' || two === '&&' || two === '||') {
        out.push({ t: two, v: two }); i += 2; continue;
      }
      if ('+-*/%(),?:<>!&|^'.indexOf(c) !== -1) { out.push({ t: c, v: c }); i++; continue; }
      throw new Error('bad char ' + c);
    }
    out.push({ t: 'eof' });
    return out;
  }

  /*
   * Function table — mirrors Functions::call() in lib/Expr.php. Keep the two
   * in sync: a value computed here must match the server's to the last digit.
   */
  function numToString(v) {
    if (isFinite(v) && Math.floor(v) === v && Math.abs(v) < 1e15) return String(Math.trunc(v));
    var t = v.toFixed(10).replace(/0+$/, '').replace(/\.$/, '');
    return t === '-0' ? '0' : t;
  }
  var FUNCS = {
    sqrt: function (a) { return Math.sqrt(Math.max(0, a[0] || 0)); },
    cbrt: function (a) { var x = a[0] || 0; return x < 0 ? -Math.cbrt(-x) : Math.cbrt(x); },
    pow: function (a) { return Math.pow(a[0] || 0, a[1] || 0); },
    pwr: function (a) { return Math.pow(a[0] || 0, a[1] || 0); },
    abs: function (a) { return Math.abs(a[0] || 0); },
    exp: function (a) { return Math.exp(a[0] || 0); },
    expm1: function (a) { return Math.expm1(a[0] || 0); },
    ceil: function (a) { return Math.ceil(a[0] || 0); },
    floor: function (a) { return Math.floor(a[0] || 0); },
    fix: function (a) { return Math.trunc(a[0] || 0); },
    trunc: function (a) { return Math.trunc(a[0] || 0); },
    round: function (a) {
      var d = Math.round(a[1] || 0), m = Math.pow(10, d);
      return Math.round((a[0] || 0) * m) / m;
    },
    round_to_half: function (a) { return Math.round((a[0] || 0) * 2) / 2; },
    roundToSigFig: function (a) {
      var x = a[0] || 0, n = Math.max(1, Math.round(a[1] || 2));
      if (x === 0) return 0;
      var d = n - 1 - Math.floor(Math.log10(Math.abs(x)));
      var m = Math.pow(10, d);
      return Math.round(x * m) / m;
    },
    asinh: function (a) { var x = a[0] || 0; return Math.asinh ? Math.asinh(x) : Math.log(x + Math.sqrt(x * x + 1)); },
    acosh: function (a) {
      var x = a[0] === undefined ? 1 : a[0];
      if (x < 1) throw new Error('acosh domain');
      return Math.acosh ? Math.acosh(x) : Math.log(x + Math.sqrt(x * x - 1));
    },
    atanh: function (a) {
      var x = a[0] || 0;
      if (x <= -1 || x >= 1) throw new Error('atanh domain');
      return Math.atanh ? Math.atanh(x) : 0.5 * Math.log((1 + x) / (1 - x));
    },
    coth: function (a) { var t = Math.tanh(a[0] || 0); if (!t) throw new Error('coth0'); return 1 / t; },
    sech: function (a) { return 1 / Math.cosh(a[0] || 0); },
    csch: function (a) { var s0 = Math.sinh(a[0] || 0); if (!s0) throw new Error('csch0'); return 1 / s0; },
    erff: function (a) { return erf(a[0] || 0); },
    erfc: function (a) { return 1 - erf(a[0] || 0); },
    hypot: function (a) { return Math.sqrt(a.reduce(function (s, x) { return s + x * x; }, 0)); },
    clamp: function (a) { var x = a[0] || 0; return Math.max(a[1] === undefined ? x : a[1], Math.min(a[2] === undefined ? x : a[2], x)); },
    takeRoot: function (a) {
      var x = a[0] || 0, n = a[1] === undefined ? 2 : a[1];
      if (!n) throw new Error('root0');
      if (x < 0 && Math.abs(n % 2) === 0) throw new Error('even root');
      return x < 0 ? -Math.pow(-x, 1 / n) : Math.pow(x, 1 / n);
    },
    log1p: function (a) { return Math.log1p(a[0] || 0); },
    roundToInteger: function (a) { return Math.round(a[0] || 0); },
    /* A date reaches a formula as a day number (see Solver::formulaUnits), so
       these read the calendar out of days, exactly as the PHP helpers do. */
    getDate: function (a) { return new Date(Math.round(DAY_MS * (a[0] || 0))).getUTCDate(); },
    getMonth: function (a) { return new Date(Math.round(DAY_MS * (a[0] || 0))).getUTCMonth(); },
    getYear: function (a) { return new Date(Math.round(DAY_MS * (a[0] || 0))).getUTCFullYear(); },
    getDayOfWeek: function (a) { return new Date(Math.round(DAY_MS * (a[0] || 0))).getUTCDay(); },
    getDayOfYear: function (a) {
      var d = new Date(Math.round(DAY_MS * (a[0] || 0)));
      return Math.floor((d - Date.UTC(d.getUTCFullYear(), 0, 0)) / DAY_MS) - 1;
    },
    getHours: function (a) { return new Date(Math.round(DAY_MS * (a[0] || 0))).getUTCHours(); },
    getMinutes: function (a) { return new Date(Math.round(DAY_MS * (a[0] || 0))).getUTCMinutes(); },
    getSeconds: function (a) { return new Date(Math.round(DAY_MS * (a[0] || 0))).getUTCSeconds(); },
    getMilliseconds: function (a) { return Math.round(DAY_MS * (a[0] || 0)) % 1000; },
    getStartMonthDays: function (a) { return [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][((Math.round(a[0] || 0) % 12) + 12) % 12]; },
    getDaysInMonth: function (a) { return [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][((Math.round(a[0] || 0) % 12) + 12) % 12]; },
    dateAtMonthsOld: function (a) { return shiftMonths(DAY_MS * (a[0] || 0), Math.round(a[1] || 0)) / DAY_MS; },
    dateAtYearsOld: function (a) { return shiftMonths(DAY_MS * (a[0] || 0), 12 * Math.round(a[1] || 0)) / DAY_MS; },
    daysBetween: function (a) { return (a[1] || 0) - (a[0] || 0); },
    if_else: function (a) { return (a[0] || 0) ? (a[1] || 0) : (a[2] || 0); },
    today: function () { return Math.floor(Date.now() / DAY_MS); },
    now: function () { return Math.floor(Date.now() / DAY_MS); },
    mod: function (a) { if (!a[1]) throw new Error('mod0'); return (a[0] || 0) % a[1]; },
    min: function (a) { return Math.min.apply(null, a.length ? a : [0]); },
    max: function (a) { return Math.max.apply(null, a.length ? a : [0]); },
    customMin: function (a) { return Math.min.apply(null, a.length ? a : [0]); },
    customMax: function (a) { return Math.max.apply(null, a.length ? a : [0]); },
    sum: function (a) { return a.reduce(function (x, y) { return x + y; }, 0); },
    avg: function (a) { return a.length ? a.reduce(function (x, y) { return x + y; }, 0) / a.length : 0; },
    mean: function (a) { return a.length ? a.reduce(function (x, y) { return x + y; }, 0) / a.length : 0; },
    sign: function (a) { var x = a[0] || 0; return x > 0 ? 1 : (x < 0 ? -1 : 0); },
    sgn: function (a) { var x = a[0] || 0; return x > 0 ? 1 : (x < 0 ? -1 : 0); },
    getSign: function (a) { var x = a[0] || 0; return x > 0 ? 1 : (x < 0 ? -1 : 0); },
    copy: function (a) { return a[0] || 0; },
    string: function (a) { return a[0] || 0; },
    count: function (a) { return numToString(a[0] || 0).length; },
    gcd: function (a) { var g = 0; for (var i = 0; i < a.length; i++) g = gcd(g, Math.round(a[i])); return g; },
    lcm: function (a) {
      var l = 1;
      for (var i = 0; i < a.length; i++) {
        var x = Math.round(a[i]);
        if (x === 0) return 0;
        l = Math.abs(l * x) / Math.max(1, gcd(l, x));
      }
      return l;
    },
    GCF: function (a) { return gcd(Math.round(a[0] || 0), Math.round(a[1] || 0)); },
    LCM: function (a) { var x = Math.round(a[0] || 0), y = Math.round(a[1] || 0); return (x === 0 || y === 0) ? 0 : Math.abs(x * y) / gcd(x, y); },
    fact: function (a) { var n = Math.round(a[0] || 0), r = 1; if (n < 0 || n > 170) throw new Error('fact'); for (var i = 2; i <= n; i++) r *= i; return r; },
    factorial: function (a) { return FUNCS.fact(a); },
    log: function (a) {
      if ((a[0] || 0) <= 0) throw new Error('log');
      if (a.length > 1 && a[1] > 0 && a[1] !== 1) return Math.log(a[0]) / Math.log(a[1]);
      return Math.log(a[0]);
    },
    ln: function (a) { if ((a[0] || 0) <= 0) throw new Error('ln'); return Math.log(a[0]); },
    log2: function (a) { if ((a[0] || 0) <= 0) throw new Error('log2'); return Math.log2(a[0]); },
    log10: function (a) { if ((a[0] || 0) <= 0) throw new Error('log10'); return Math.log10(a[0]); },
    logN: function (a) { return FUNCS.log(a); },
    sin: function (a) { return Math.sin(a[0] || 0); },
    cos: function (a) { return Math.cos(a[0] || 0); },
    tan: function (a) { return Math.tan(a[0] || 0); },
    asin: function (a) { return Math.asin(Math.max(-1, Math.min(1, a[0] || 0))); },
    acos: function (a) { return Math.acos(Math.max(-1, Math.min(1, a[0] || 0))); },
    atan: function (a) { return Math.atan(a[0] || 0); },
    atan2: function (a) { return Math.atan2(a[0] || 0, a[1] === undefined ? 1 : a[1]); },
    sinh: function (a) { return Math.sinh(a[0] || 0); },
    cosh: function (a) { return Math.cosh(a[0] || 0); },
    tanh: function (a) { return Math.tanh(a[0] || 0); },
    cot: function (a) { var t = Math.tan(a[0] || 0); if (t === 0) throw new Error('cot'); return 1 / t; },
    sec: function (a) { var c = Math.cos(a[0] || 0); if (c === 0) throw new Error('sec'); return 1 / c; },
    csc: function (a) { var s = Math.sin(a[0] || 0); if (s === 0) throw new Error('csc'); return 1 / s; },
    acot: function (a) { var x = a[0] || 0; return x === 0 ? Math.PI / 2 : Math.atan(1 / x); },
    asec: function (a) { var x = a[0] || 1; return x === 0 ? Math.PI / 2 : Math.acos(1 / x); },
    acsc: function (a) { var x = a[0] || 1; return x === 0 ? Math.PI / 2 : Math.asin(1 / x); },
    deg: function (a) { return (a[0] || 0) * 180 / Math.PI; },
    rad: function (a) { return (a[0] || 0) * Math.PI / 180; },
    // The definitions use erf as the standard-normal CDF (see lib/Expr.php).
    erf: function (a) { return normalCdf(a[0] || 0); },
    erfinv: function (a) { return Math.SQRT2 * erfinv(2 * (a[0] === undefined ? 0.5 : a[0]) - 1); },
    gamma: function (a) { return gammaFn(a[0] || 0); },
    invNorm: function (a) { return Math.SQRT2 * erfinv(2 * (a[0] === undefined ? 0.5 : a[0]) - 1); },
    pval: function (a) {
      var z = Math.abs(a[0] || 0), alt = Math.round(a[1] || 0);
      var two = 2 * (1 - normalCdf(z));
      if (alt === 1) return (a[0] || 0) >= 0 ? two / 2 : 1 - two / 2;
      if (alt === -1) return (a[0] || 0) >= 0 ? 1 - two / 2 : two / 2;
      return two;
    },
    get_percentile: function (a) {
      var sd = a[2] || 1;
      return normalCdf(((a[0] || 0) - (a[1] || 0)) / sd);
    },
    get_payment_count: function (a) {
      var amount = a[0] || 0, rate = a[1] || 0, payment = a[2] || 0;
      if (rate <= 0 || payment <= 0) return 0;
      var d = payment - amount * rate;
      if (d <= 0) return 0;
      return Math.log(payment / d) / Math.log(1 + rate);
    }
  };

  function gammaFn(z) {
    // Lanczos approximation, matching the lgamma path used on the server
    var g = 7;
    var c = [0.99999999999980993, 676.5203681218851, -1259.1392167224028,
             771.32342877765313, -176.61502916214059, 12.507343278686905,
             -0.13857109526572012, 9.9843695780195716e-6, 1.5056327351493116e-7];
    if (z < 0.5) return Math.PI / (Math.sin(Math.PI * z) * gammaFn(1 - z));
    z -= 1;
    var x = c[0];
    for (var i = 1; i < g + 2; i++) x += c[i] / (z + i);
    var t = z + g + 0.5;
    return Math.sqrt(2 * Math.PI) * Math.pow(t, z + 0.5) * Math.exp(-t) * x;
  }

  function shiftMonths(ms, months) {
    var d = new Date(Math.round(ms));
    var y = d.getUTCFullYear(), m = d.getUTCMonth() + months, day = d.getUTCDate();
    var ny = y + Math.floor(m / 12);
    var nm = ((m % 12) + 12) % 12;
    var dim = new Date(Date.UTC(ny, nm + 1, 0)).getUTCDate();
    return Date.UTC(ny, nm, Math.min(day, dim));
  }

  function gcd(a, b) { a = Math.abs(a); b = Math.abs(b); while (b) { var t = b; b = a % b; a = t; } return a; }
  function erf(x) {
    var s = x < 0 ? -1 : 1; x = Math.abs(x);
    var t = 1 / (1 + 0.3275911 * x);
    var y = 1 - (((((1.061405429 * t - 1.453152027) * t) + 1.421413741) * t - 0.284496736) * t + 0.254829592) * t * Math.exp(-x * x);
    return s * y;
  }
  function normalCdf(z) { return 0.5 * (1 + erf(z / Math.SQRT2)); }
  function erfinv(y) {
    if (y <= -1) return -Infinity;
    if (y >= 1) return Infinity;
    var a = 0.147, ln = Math.log(1 - y * y);
    var t = 2 / (Math.PI * a) + ln / 2;
    var x = (y >= 0 ? 1 : -1) * Math.sqrt(Math.sqrt(t * t - ln / a) - t);
    for (var i = 0; i < 3; i++) {
      x -= (erf(x) - y) / (2 / Math.sqrt(Math.PI) * Math.exp(-x * x));
    }
    return x;
  }

  /*
   * Expression evaluation.
   *
   * This mirrors lib/Expr.php token for token: the same precedence table, the
   * same AST shapes and the same short-circuit rules for `? :`, `&&` and `||`.
   * The browser and the server must agree exactly, otherwise a page would show
   * one answer and a share link another. Grammar:
   *
   *   ternary := or ('?' ternary ':' ternary)?
   *   or      := and ('||' and)*
   *   and     := equality ('&&' equality)*
   *   equality:= compare (('=='|'!=') compare)*
   *   compare := additive (('<','>','<=','>=') additive)*
   *   additive:= term (('+'|'-') term)*
   *   term    := unary (('*'|'/'|'%') unary)*
   *   unary   := ('-'|'+'|'!') unary | power
   *   power   := primary ('^' unary)?      // right associative
   */
  function evalExpr(src, vars) {
    var toks = tokenize(src), pos = 0;
    function peek() { return toks[pos]; }
    function next() { return toks[pos++]; }
    function expect(t) { if (peek().t !== t) throw new Error('expected ' + t); pos++; }

    function parseTernary() {
      var cond = parseOr();
      if (peek().t === '?') {
        next();
        var then = parseTernary();
        expect(':');
        var otherwise = parseTernary();
        return { k: 'tern', c: cond, a: then, b: otherwise };
      }
      return cond;
    }
    function parseOr() {
      var v = parseAnd();
      while (peek().t === '||') { next(); v = { k: 'bin', op: '||', a: v, b: parseAnd() }; }
      return v;
    }
    function parseAnd() {
      var v = parseEquality();
      while (peek().t === '&&') { next(); v = { k: 'bin', op: '&&', a: v, b: parseEquality() }; }
      return v;
    }
    function parseEquality() {
      var v = parseCompare();
      while (peek().t === '==' || peek().t === '!=') {
        var op = next().t; v = { k: 'bin', op: op, a: v, b: parseCompare() };
      }
      return v;
    }
    function parseCompare() {
      var v = parseAdditive();
      while (peek().t === '<' || peek().t === '>' || peek().t === '<=' || peek().t === '>=') {
        var op = next().t; v = { k: 'bin', op: op, a: v, b: parseAdditive() };
      }
      return v;
    }
    function parseAdditive() {
      var v = parseTerm();
      while (peek().t === '+' || peek().t === '-') {
        var op = next().t; v = { k: 'bin', op: op, a: v, b: parseTerm() };
      }
      return v;
    }
    function parseTerm() {
      var v = parseUnary();
      while (peek().t === '*' || peek().t === '/' || peek().t === '%') {
        var op = next().t; v = { k: 'bin', op: op, a: v, b: parseUnary() };
      }
      return v;
    }
    function parseUnary() {
      if (peek().t === '-' || peek().t === '+' || peek().t === '!') {
        var op = next().t; return { k: 'un', op: op, a: parseUnary() };
      }
      return parsePower();
    }
    function parsePower() {
      var b = parsePrimary();
      if (peek().t === '^') { next(); return { k: 'bin', op: '^', a: b, b: parseUnary() }; }
      return b;
    }
    function parsePrimary() {
      var tk = next();
      if (tk.t === 'num') return { k: 'num', v: tk.v };
      if (tk.t === '(') { var v = parseExprNode(); expect(')'); return v; }
      if (tk.t === 'name') {
        if (peek().t === '(') {
          next();
          var args = [];
          if (peek().t !== ')') {
            args.push(parseExprNode());
            while (peek().t === ',') { next(); args.push(parseExprNode()); }
          }
          expect(')');
          return { k: 'call', name: tk.v, args: args };
        }
        return { k: 'var', name: tk.v };
      }
      throw new Error('unexpected ' + tk.t);
    }
    function parseExprNode() { return parseTernary(); }

    function evalNode(n) {
      switch (n.k) {
        case 'num':
          return n.v;
        case 'var':
          if (Object.prototype.hasOwnProperty.call(vars, n.name) && vars[n.name] !== null && vars[n.name] !== undefined) {
            return +vars[n.name];
          }
          if (Object.prototype.hasOwnProperty.call(CONSTANTS, n.name)) return CONSTANTS[n.name];
          throw new Error('unknown ' + n.name);
        case 'call': {
          var args = [];
          for (var i = 0; i < n.args.length; i++) args.push(evalNode(n.args[i]));
          var scriptFn = SCRIPT.defs[n.name];
          /*
           * Two conventions live in the harvested scripts, and they disagree.
           *
           * `daysUntilDecember(date)` multiplies its argument by 86 400 000 to
           * rebuild a Date, so it wants a *day number*; `getYearsDiff(date,
           * finalDate)` calls `new Date(date)` straight away, so it wants
           * milliseconds. Handing the first one milliseconds overflowed to an
           * invalid date, and handing the second one a day number landed it in
           * January 1970 — either way the page answered nothing. Read the
           * function body and pass what it actually rebuilds with. Built-ins
           * keep milliseconds: they are ours and always agreed.
           */
          if (scriptFn) {
            var wantsDay = DAY_ARG[n.name];
            if (wantsDay === undefined) {
              /*
               * Direct multiplication, or a call to the page's own toDate()
               * helper, which is where the multiplication lives on the
               * weekday-counting pages: `getRemaining(d1, d2)` walks one day at
               * a time with `toDate(d1)`. Handed milliseconds it walks from
               * 1 700 000 000 000 to 1 700 000 000 180 — a trillion turns, and
               * the tab never comes back. That is why /everyday-life/30-day and
               * its six siblings froze the sweep.
               */
              /*
               * Day numbers unless the helper rebuilds a Date from the raw
               * argument: `new Date(date)` means milliseconds, while
               * `new Date(dateInput * millisecondsInADay)` (the constant is a
               * variable on some pages, so no literal to match) and the pages'
               * own `toDate()` helper both mean days. The earlier literal-only
               * test missed those and left three "days until …" pages answering
               * nothing at all.
               */
              var fsrc = String(scriptFn);
              var dayish = /86400000|864e5|86400\s*\*\s*1000|1000\s*\*\s*86400|1000\s*\*\s*60\s*\*\s*60\s*\*\s*24|millisecondsInADay|MS_IN_DAY|toDate\s*\(/i.test(fsrc);
              var bareDate = /new\s+Date\(\s*[A-Za-z_$][\w$]*\s*\)/i.test(fsrc);
              wantsDay = dayish && !bareDate;
              DAY_ARG[n.name] = wantsDay;
            }
            if (wantsDay) {
              for (var ai = 0; ai < n.args.length; ai++) {
                var argNode = n.args[ai];
                if (!argNode || argNode.k !== 'var') continue;
                var vdef = DEF.vars && DEF.vars[argNode.name];
                var vtype = vdef && vdef.type;
                if ((vtype === 'date' || vtype === 'datetime') && typeof args[ai] === 'number' && isFinite(args[ai])) {
                  args[ai] = Math.round(args[ai] / 86400000);
                }
              }
            }
          }
          var fn = scriptFn || FUNCS[n.name];
          if (!fn) throw new Error('fn ' + n.name);
          /*
           * A built-in takes the argument array; a function the page registered
           * with omni.define() is an ordinary JS function that expects its
           * arguments spread out. get_human_years(dog_years, size) gets the array
           * as its first parameter and undefined for size if this is not done.
           */
          var out = scriptFn ? fn.apply(null, args) : fn(args);
          /*
           * Two date conventions live in the harvested helpers, and the guess
           * in DAY_ARG cannot be right every time: `prorated()` multiplies its
           * argument by `24*60*60*1000` — a product, not the literal 86 400 000
           * the earlier test looked for — so it received milliseconds and
           * reported NaN ("fill in any one of the boxes"). Rather than keep
           * extending the pattern list, try the other convention and keep
           * whichever answer is finite: a helper fed the wrong scale returns
           * NaN or an invalid date, never a plausible number.
           */
          if (scriptFn && typeof out === 'number' && !isFinite(out)) {
            var dayArgs = args.slice();
            var swapped = false;
            for (var di = 0; di < n.args.length; di++) {
              var dNode = n.args[di];
              if (!dNode || dNode.k !== 'var') continue;
              var dDef = DEF.vars && DEF.vars[dNode.name];
              if (!dDef || (dDef.type !== 'date' && dDef.type !== 'datetime')) continue;
              if (typeof dayArgs[di] !== 'number' || !isFinite(dayArgs[di])) continue;
              dayArgs[di] = dayArgs[di] / 86400000;
              swapped = true;
            }
            if (swapped) {
              try {
                var alt = fn.apply(null, dayArgs);
                if (typeof alt === 'number' && isFinite(alt)) out = alt;
              } catch (e2) { /* keep the first answer */ }
            }
          }
          if (typeof out === 'boolean') return out ? 1 : 0;
          if (typeof out === 'string') {
            var parsed = parseFloat(out);
            if (!isFinite(parsed)) throw new Error('non-numeric ' + n.name);
            return parsed;
          }
          return out;
        }
        case 'un': {
          var x = evalNode(n.a);
          if (n.op === '-') return -x;
          if (n.op === '+') return x;
          return x === 0 ? 1 : 0;
        }
        case 'tern':
          return evalNode(n.c) !== 0 ? evalNode(n.a) : evalNode(n.b);
        case 'bin': {
          if (n.op === '&&') return (evalNode(n.a) !== 0 && evalNode(n.b) !== 0) ? 1 : 0;
          if (n.op === '||') return (evalNode(n.a) !== 0 || evalNode(n.b) !== 0) ? 1 : 0;
          var a = evalNode(n.a), b = evalNode(n.b);
          switch (n.op) {
            case '+': return a + b;
            case '-': return a - b;
            case '*': return a * b;
            case '/': if (b === 0) throw new Error('div0'); return a / b;
            case '%': if (b === 0) throw new Error('div0'); return a % b;
            case '^': return Math.pow(a, b);
            case '<': return a < b ? 1 : 0;
            case '>': return a > b ? 1 : 0;
            case '<=': return a <= b ? 1 : 0;
            case '>=': return a >= b ? 1 : 0;
            case '==': return Math.abs(a - b) < 1e-12 ? 1 : 0;
            case '!=': return Math.abs(a - b) < 1e-12 ? 0 : 1;
          }
          throw new Error('op ' + n.op);
        }
      }
      throw new Error('bad node');
    }

    var out = evalNode(parseExprNode());
    if (peek().t !== 'eof') throw new Error('trailing');
    /* A helper may hand back a BigInt (modular exponentiation does its maths in
       BigInt to keep every digit); `isFinite` throws on one, which is how the
       answer went missing rather than being reported as out of range. */
    if (typeof out === 'bigint') out = Number(out);
    if (!isFinite(out)) throw new Error('not finite');
    return out;
  }

  /* -------------------------------------------------- page-supplied scripts */
  /*
   * Some calculators ship their own JavaScript. It does one of two things:
   *
   *   omni.define(name, fn)      defines a helper the equations call, e.g.
   *                              `pvalue = pval(score, alt, df, d2, which)`
   *   omni.onResult([deps], cb)  computes outputs directly through ctx:
   *                                  ctx.getRawInput("x")   raw text of a field
   *                                  ctx.exportValue("y", v) publish a result
   *                                  ctx.addHtml(html, ...)  inject markup
   *
   * The script is evaluated once in a closed scope that only receives `omni`
   * and a real mathjs (vendored), so nothing else on the page is reachable.
   */
  var SCRIPT = { defs: {}, hooks: [], ready: false, failed: false, html: [] };

  function initScript(src) {
    if (!src || typeof src !== 'string') return;
    var shim = {
      define: function (name, fn) {
        if (typeof name === 'string' && typeof fn === 'function') SCRIPT.defs[name] = fn;
      },
      onResult: function (deps, cb) {
        if (typeof cb === 'function') SCRIPT.hooks.push({ deps: deps || [], cb: cb });
      },
      defineDataset: function () {},
      localeData: {},
      /* Collectors for the helper functions a page declares with a plain
         `function name() {}` instead of omni.define(). See initScript below. */
      __expose: function (obj) {
        if (!obj) return;
        Object.keys(obj).forEach(function (k) {
          if (typeof obj[k] === 'function' && !SCRIPT.defs[k]) SCRIPT.defs[k] = obj[k];
        });
      }
    };
    var math = window.math || null;
    /*
     * Some pages declare their helpers as ordinary top-level functions —
     * `function prorated(moveInOut, date, rent) {…}` — and their formulas call
     * them by name. Only omni.define()d functions were reachable, so every one
     * of those formulas threw "unknown function" and the page answered nothing
     * (/finance/prorated-rent). The names are visible in the source; run the
     * script once more with a tail that hands them over, inside the scope where
     * they exist.
     */
    var plain = [];
    var re = /\bfunction\s+([A-Za-z_$][\w$]*)\s*\(/g;
    var m;
    while ((m = re.exec(src)) !== null) {
      if (plain.indexOf(m[1]) < 0 && !SCRIPT.defs[m[1]]) plain.push(m[1]);
    }
    var tail = plain.length
      ? ';try{omni.__expose({' + plain.map(function (n) { return n + ': typeof ' + n + ' === "function" ? ' + n + ' : undefined'; }).join(',') + '});}catch(e){}'
      : '';
    try {
      /* eslint-disable no-new-func */
      new Function('omni', 'mathjs', 'math', src + tail)(shim, math, math);
      SCRIPT.ready = true;
    } catch (err) {
      SCRIPT.failed = true;
      if (window.console && console.warn) console.warn('calculator script failed to load:', err);
    }
  }

  function outputHost() {
    var host = widget.querySelector('[data-script-output]');
    if (!host) {
      host = document.createElement('div');
      host.setAttribute('data-script-output', '');
      host.className = 'calc-script-output';
      widget.appendChild(host);
    }
    return host;
  }

  function unitKeyOf(name) {
    var f = DEF.fields && DEF.fields[name];
    return (f && f.unitKey) || null;
  }

  /* Page scripts are written against the numbers the visitor sees, not the
     internal base units, so they receive a converted copy. */
  function displayValues(st) {
    var out = {};
    Object.keys(st.values).forEach(function (name) {
      var v = st.values[name];
      /* An invented zero is not a value the visitor gave: hand the script a
         `null`, the way the reference page's empty box arrives. A script that
         tests `p !== null` before adding a probability otherwise adds
         `undefined` and loses the whole answer to NaN. */
      if (st.placeholder && st.placeholder[name]) { out[name] = null; return; }
      out[name] = typeof v === 'number'
        ? toDisplay(v, unitKeyOf(name), currentUnit(name))
        : v;
    });
    /*
     * Every name the page declares is present in the copy, even the ones nobody
     * has filled in: `undefined` is not a number to a script (`undefined !==
     * null`), so a table of twenty-five optional scenarios summed to NaN and
     * published nothing. An empty box is `null`.
     */
    for (var name in DEF.vars) {
      if (!(name in out)) out[name] = null;
    }
    /*
     * A text box never reaches the numeric state — its contents are words, not
     * a measurement — so the scripts would see `null` for the very box they are
     * built around ("Number or expression"). Read it straight off the control.
     */
    for (var tn in DEF.vars) {
      if ((DEF.vars[tn].type || '') !== 'text') continue;
      var inp = widget && widget.querySelector('input[data-var="' + tn + '"], textarea[data-var="' + tn + '"]');
      if (inp) out[tn] = inp.value;
    }
    return out;
  }

  function runHooks(state) {
    if (!SCRIPT.hooks.length) return;
    // Nothing typed and nothing prefilled: a hook would be publishing results
    // for a form that has no inputs yet, which is why the server render (which
    // cannot run the hook at all) shows these fields blank.
    var supplied = false;
    for (var k in edited) { supplied = true; break; }
    if (!supplied) {
      var boxes = widget.querySelectorAll('textarea[data-datetype="text"]');
      supplied = boxes.length > 0;
    }
    if (!supplied) {
      /*
       * A calculator driven only by drop-downs and checkboxes already has every
       * input it needs on the first paint — those controls always hold a value.
       * Waiting for an edit left such a page blank until the visitor happened to
       * touch a select, which looked like a broken calculator.
       */
      /*
       * A drop-down that opens on "Choose…" holds no answer, and nor does a
       * checkbox nobody has ticked, so neither counts as a supplied value any
       * more. The brief's "no defaults" made both states ordinary, and the old
       * test treated them as an answer — an untouched form then painted results
       * worked out from nothing.
       */
      supplied = !!widget.querySelector(
        'select[data-var]:not([value=""]) option:checked:not([value=""]), '
        + 'input[type="radio"]:checked, input[type="checkbox"]:checked');
    }
    if (!supplied) return;
    var host = outputHost();
    host.innerHTML = '';
    var ctx = {
      getRawInput: function (name) {
        /*
         * Text boxes and numeric boxes carry data-var on the control itself; a
         * drop-down carries it on the <select>, and a short list renders as
         * radios named after the variable. Reading only inputs and textareas
         * meant every choice field handed the script an empty string, so a page
         * silently used its default mode whatever the visitor picked.
         */
        var inp = widget.querySelector(
          'select[data-var="' + name + '"], input[data-var="' + name + '"], '
          + 'textarea[data-var="' + name + '"]');
        if (inp) return inp.value;
        var radio = widget.querySelector('input[type="radio"][name="' + name + '"]:checked');
        if (radio) return radio.value;
        var v = state.values[name];
        return v === undefined || v === null ? '' : String(v);
      },
      getInput: function (name) {
        var v = state.values[name];
        if (v === undefined || v === null) return null;
        if (typeof v !== 'number') return v;
        return toDisplay(v, unitKeyOf(name), currentUnit(name));
      },
      exportValue: function (name, value) {
        if (typeof name !== 'string') return;
        if (value === null || value === undefined || value === '') {
          delete state.values[name];
          delete state.known[name];
          return;
        }
        if (typeof value === 'number') {
          if (!isFinite(value)) return;
          // scripts speak display units, the engine stores base units
          state.values[name] = toBase(value, unitKeyOf(name), currentUnit(name));
          state.known[name] = true;
          state.computed[name] = true;
          return;
        }
        state.values[name] = value;
        state.known[name] = true;
        state.computed[name] = true;
      },
      addHtml: function (html) {
        if (typeof html === 'string' && html !== '') {
          var div = document.createElement('div');
          div.innerHTML = html;
          host.appendChild(div);
        }
      },
      addUnmetCondition: function (msg) {
        var p = document.createElement('p');
        p.className = 'calc-unmet';
        p.textContent = String(msg || '');
        host.appendChild(p);
      }
    };

    SCRIPT.hooks.forEach(function (hook) {
      var ready = true;
      var shown = 0;
      for (var i = 0; i < hook.deps.length; i++) {
        var d = hook.deps[i];
        // A placeholder is a 0 the solver invented for an unset optional, not
        // something the visitor supplied. Hooks that fire on placeholders
        // publish meaningless zeros ("debt APR = 0" on an empty form), so they
        // wait for a real value, exactly as the server-side render does.
        if (isShown(state, d)) { shown++; continue; }
        ready = false;
      }
      if (!ready) {
        /*
         * A long list of inputs is usually a menu, not a form: a salad with
         * sixty ingredients, a portfolio with twenty-five scenarios. The page
         * names every one of them so it hears about a change, and the visitor
         * fills in the two or three they are eating. Demanding all sixty before
         * the script may run is why those pages never answered anything.
         * One real value is enough to ask the script; a short list still waits
         * for every box, because there a missing entry really is a missing
         * number.
         */
        if (hook.deps.length <= 6 || shown === 0) return;
      }
      try {
        hook.cb(ctx, displayValues(state));
      } catch (err) {
        if (window.console && console.warn) console.warn('calculator script hook failed:', err);
      }
    });
  }

  /* ----------------------------------------------------------------- units */
  var linCache = {};
  var KEY = '\u0000';

  function linear(expr) {
    if (linCache[expr]) return linCache[expr];
    var res = [0, null];
    try {
      var f0 = evalExpr(expr, { v: 0 }), f1 = evalExpr(expr, { v: 1 }), f2 = evalExpr(expr, { v: 2 });
      var k = f1 - f0;
      if (isFinite(f0) && isFinite(k) && Math.abs((f2 - f0) - 2 * k) <= 1e-9 * Math.max(1, Math.abs(k))) {
        res = [f0, k];
      }
    } catch (e) { res = [0, null]; }
    linCache[expr] = res;
    return res;
  }

  // A unit expression maps BASE -> displayed, e.g. cm: 100*v (1 m shows 100 cm).
  function toBase(shown, unitKey, unit) {
    if (!unitKey || !unit || !DEF.units[unitKey] || !DEF.units[unitKey][unit]) return shown;
    var l = linear(DEF.units[unitKey][unit]);
    if (l[1] === null || l[1] === 0) return shown;
    return (shown - l[0]) / l[1];
  }

  function toDisplay(base, unitKey, unit) {
    if (!unitKey || !unit || !DEF.units[unitKey] || !DEF.units[unitKey][unit]) return base;
    var l = linear(DEF.units[unitKey][unit]);
    if (l[1] === null) return base;
    return l[0] + l[1] * base;
  }

  /* -------------------------------------------------------------- format */
  /*
   * Two rounding conventions, exactly as in lib/Format.php:
   *   standard — precision is a decimal count ("2" -> 22.86)
   *   omni     — precision is a step ("0.0001")
   */
  function decimalsFor(precision, algo) {
    if (algo === 'standard') {
      var d = precision === null || precision === undefined || precision === '' ? 0 : Math.round(parseFloat(precision));
      return Math.max(0, Math.min(12, isFinite(d) ? d : 0));
    }
    var step = precision ? parseFloat(precision) : 0;
    if (!(step > 0)) return 0;
    return Math.max(0, Math.min(12, Math.ceil(-Math.log10(step) - 1e-9)));
  }

  function formatNumber(v, precision, algo) {
    if (v === null || v === undefined || !isFinite(v)) return '';
    var dec = decimalsFor(precision, algo);
    if (algo === 'standard' && dec >= 0) v = Math.round(v * Math.pow(10, dec)) / Math.pow(10, dec);
    var abs = Math.abs(v);
    if (abs !== 0 && (abs >= 1e15 || abs < 1e-6)) return v.toExponential(Math.max(2, Math.min(9, dec))).replace('e', ' ×10^');
    var s = Math.abs(v).toFixed(dec);
    if (dec > 0) s = s.replace(/0+$/, '').replace(/\.$/, '');
    var parts = s.split('.');
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
    s = parts.join('.');
    return (v < 0 ? '-' : '') + s;
  }

  /* Reader-facing grouping for a result box: 1600000 is hard to scan, and the
     reference site writes 1 600 000. Only read-only boxes get it, because a
     caret in the middle of grouped digits is a nuisance to edit; parseNumber()
     strips the spaces again, so a copied value still round-trips. */
  function groupDigits(s) {
    var neg = s.charAt(0) === '-';
    if (neg) s = s.slice(1);
    var parts = s.split('.');
    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, '\u00A0');
    return (neg ? '-' : '') + parts.join('.');
  }

  function plainNumber(v, precision, algo, group) {
    if (!isFinite(v)) return '';
    /*
     * toFixed() switches to exponential notation at 1e21, which would put
     * "1e+25" in a number box: it parses, but it is not a number anybody reads
     * at a glance, and it is inconsistent with the digits shown everywhere
     * else. Expand the full digit string instead (multiplying 1e9 by 1e9 is a
     * click away in a units calculator, so this is reachable in normal use).
     */
    if (Math.abs(v) >= 1e21) {
      var big = v.toLocaleString('en-US', { useGrouping: false, maximumFractionDigits: 0 });
      return group ? groupDigits(big) : big;
    }
    var dec = decimalsFor(precision, algo);
    if (algo === 'standard') v = Math.round(v * Math.pow(10, dec)) / Math.pow(10, dec);
    var s = v.toFixed(dec);
    if (dec > 0) s = s.replace(/0+$/, '').replace(/\.$/, '');
    if (s === '-0') s = '0';
    return group ? groupDigits(s) : s;
  }

  function parseNumber(raw) {
    if (raw === null || raw === undefined) return null;
    var s = String(raw).trim();
    if (s === '') return null;
    s = s.replace(/\u2212|\u2013|−/g, '-').replace(/[\u00A0\u202F\s]/g, '');
    if (/^-?\d{1,3}(,\d{3})+(\.\d+)?$/.test(s)) s = s.replace(/,/g, '');
    else if (s.indexOf(',') !== -1 && s.indexOf('.') === -1) s = s.replace(',', '.');
    if (!/^[-+]?(\d+\.?\d*|\.\d+)([eE][-+]?\d+)?$/.test(s)) return null;
    var n = parseFloat(s);
    return isFinite(n) ? n : null;
  }

  /* -------------------------------------------------------------- solver */
  /* ---------------------------------------------------------- formula units */
  /*
   * Some definitions read a period variable as a plain count of years or months
   * ("n = 12 * term") while the unit chip stores it in seconds, because seconds
   * are that switcher's base. Those variables are converted on the way into a
   * formula and back out again, mirroring lib/Solver.php.
   */
  var PERIOD_UNITS = { yrs: 1, years: 1, year: 1, months: 1, month: 1, weeks: 1, week: 1 };
  var FUNIT = null;

  function formulaUnitMap() {
    if (FUNIT !== null) return FUNIT;
    FUNIT = {};
    var body = '';
    (DEF.eq || []).forEach(function (group) {
      (group || []).forEach(function (v) { body += ' ' + (v.formula || ''); });
    });
    if (/31557600|86400|604800|3600\b/.test(body)) return FUNIT;
    var vars = DEF.vars || {};
    Object.keys(vars).forEach(function (name) {
      var f = vars[name] || {};
      if (!f.unitKey || !f.defaultUnit || !PERIOD_UNITS[f.defaultUnit]) return;
      var expr = (DEF.units[f.unitKey] || {})[f.defaultUnit];
      if (!expr) return;
      var l = linear(expr);
      if (l && l[1]) FUNIT[name] = [l[1], l[0]];      // [factor, offset]
    });

    /*
     * A page that works with dates works in days (see the note in
     * Solver::formulaUnits): a date is a day number, and so is a duration. Pages
     * that call a date function (daysBetween, getDate, …) need milliseconds, so
     * they are left alone.
     */
    var spansDates = Object.keys(vars).some(function (n) {
      var t = (vars[n] || {}).type;
      return t === 'date' || t === 'datetime' || t === 'time';
    });
    if (!spansDates) return FUNIT;
    Object.keys(vars).forEach(function (name) {
      var f = vars[name] || {};
      if (FUNIT[name]) return;
      var t = f.type;
      if (t === 'date' || t === 'datetime' || t === 'time') {
        FUNIT[name] = [1 / 86400000, 0];             // milliseconds -> days
        return;
      }
      if (!f.unitKey) return;
      if (!((DEF.units[f.unitKey] || {})['sec'])) return;
      FUNIT[name] = [1 / 86400, 0];                  // seconds -> days
    });
    return FUNIT;
  }

  /*
   * A page that ships its own script gets its dates in milliseconds, not in
   * days. The helpers harvested with those pages were written against the
   * reference's API — they call new Date(argument), divide by 86400000, ask for
   * getHours() — and a day number fed to them lands in January 1970: a birthday
   * of 2010 came back with a graduation year of 1988. The built-in date helpers
   * below are the other convention, so the decision is made per formula: if it
   * names a function the page defined, the values pass through untouched.
   */
  var PAGE_HELPERS = null;
  function pageHelpers() {
    if (PAGE_HELPERS !== null) return PAGE_HELPERS;
    PAGE_HELPERS = {};
    var src = (DEF && DEF.js) || '';
    var re = /omni\.define\(\s*['"]([A-Za-z_$][\w$]*)['"]/g, m;
    while ((m = re.exec(src)) !== null) { PAGE_HELPERS[m[1]] = true; }
    return PAGE_HELPERS;
  }

  function callsPageHelper(formula) {
    var helpers = pageHelpers();
    for (var name in helpers) {
      if (new RegExp('\\b' + name + '\\s*\\(').test(formula)) return true;
    }
    return false;
  }

  function formulaValues(values, formula) {
    var fu = formulaUnitMap(), touched = false, name;
    for (name in fu) {
      if (formula.indexOf(name) !== -1) { touched = true; break; }
    }
    if (!touched) return values;
    /*
     * ...but only the date-shaped arguments. Everything else keeps the
     * conversion its unit chip asks for: `age` in years reaches a page helper
     * in seconds, exactly as it reaches a built-in.
     */
    var helper = callsPageHelper(formula);
    var out = {};
    for (name in values) {
      var v = (DEF.vars && DEF.vars[name]) || {};
      if (helper && (v.type === 'date' || v.type === 'datetime' || v.type === 'time')) {
        out[name] = values[name];
        continue;
      }
      out[name] = fu[name] ? fu[name][0] * values[name] + fu[name][1] : values[name];
    }
    return out;
  }

  /* A placeholder is a dependent variable seeded with 0 for the solver only. */
  function isTextVar(name) {
    var v = DEF.vars && DEF.vars[name];
    return !!(v && v.type === 'text');
  }

  /*
   * Errors the visitor can act on.
   *
   * Two rules only, and both are checked before anything is revealed:
   *   * a field the calculator cannot work without — an empty required box;
   *   * a box that holds something the field cannot accept — letters in a
   *     number, a decimal in a count of whole things.
   * Each message goes under the field it belongs to, the first bad field takes
   * focus, and the button announces the count for a screen reader. Nothing is
   * ever thrown away: the visitor's other entries stay exactly as typed.
   */
  var REQUIRED = {};
  (function () {
    var vars = (DEF && DEF.vars) || {};
    Object.keys(vars).forEach(function (name) {
      var v = vars[name] || {};
      if (v.required === true) REQUIRED[name] = true;
    });
  })();

  /*
   * Variables the equations can work out. A box for one of these is not
   * "waiting to be filled in": it is waiting for whatever it depends on, and
   * telling the visitor to enter a value there is telling them to type over an
   * answer. It also covers a `time` or `date` result, which has no type of its
   * own to look at.
   */
  /* Variables a sentence on the page talks about ("you are 35 years old"). */
  var TEXT_VARS = (function () {
    var body = '';
    (function walk(list) {
      (list || []).forEach(function (item) {
        if (typeof item === 'string') { body += ' ' + item; return; }
        if (Array.isArray(item)) { walk(item); return; }
        if (item && typeof item === 'object') {
          if (item.html) body += ' ' + item.html;
          if (item.condition) body += ' ' + item.condition;
        }
      });
    })(DEF.texts);
    var out = {};
    (body.match(/[A-Za-z_][A-Za-z0-9_]*/g) || []).forEach(function (w) { out[w] = true; });
    return out;
  })();

  function shownInText(name) { return TEXT_VARS[name] === true; }

  var DERIVABLE = {};
  (function () {
    (DEF.eq || []).forEach(function (variants) {
      (variants || []).forEach(function (v) {
        if (v && v.lhs) DERIVABLE[v.lhs] = true;
      });
    });
    Object.keys((DEF && DEF.vars) || {}).forEach(function (name) {
      if ((DEF.vars[name] || {}).type === 'dependent') DERIVABLE[name] = true;
    });
  })();

  function errorSlot(field) {
    var slot = field.querySelector('.calc-error');
    if (!slot) {
      slot = document.createElement('p');
      slot.className = 'calc-error';
      slot.setAttribute('role', 'alert');
      field.appendChild(slot);
    }
    return slot;
  }

  function clearFieldError(field) {
    var slot = field ? field.querySelector('.calc-error') : null;
    if (slot) slot.textContent = '';
    if (field) {
      field.classList.remove('has-error');
      var inp = field.querySelector('.calc-input');
      if (inp) inp.removeAttribute('aria-invalid');
    }
  }

  function setFieldError(field, message) {
    var slot = errorSlot(field);
    slot.textContent = message;
    field.classList.add('has-error');
    var inp = field.querySelector('.calc-input');
    if (inp) inp.setAttribute('aria-invalid', 'true');
  }

  /**
   * A box that belongs to a numbered family: n1, n2, n3 … or x1…x10, a1…a40.
   *
   * These pages hold a list, not a set of distinct quantities: they take as
   * many values as the visitor types and work with those. The harvest marked
   * every slot required, so a visitor who filled one of thirty boxes was told
   * that twenty-nine fields still needed a value and no answer ever came.
   */
  function slotFamily(name) {
    var m = /^([A-Za-z]+)_?(\d+)$/.exec(String(name || ''));
    return m ? m[1] : null;
  }

  /**
   * Which numbered families already have a value in one of their boxes, and
   * whether *any* single box outside a family has one.
   *
   * A list page offers two ways to give the same data: a text box you paste
   * "1, 2, 3" into, and fifty numbered slots. Filling the box used to leave all
   * fifty slots required, so the page could not be submitted at all
   * (/statistics/median answered "51 fields still need a value"). Once anything
   * on the form holds a value, the extra slots are an option, not a duty.
   */
  function filledFamilies() {
    var out = { __any__: false };
    inputs.forEach(function (inp) {
      if (inp.readOnly || inp.type === 'radio' || inp.type === 'checkbox') return;
      var field = inp.closest('.calc-field');
      if (field && (field.hidden || field.getAttribute('data-output') === '1')) return;
      if (String(inp.value || '').trim() === '') return;
      var fam = slotFamily(inp.getAttribute('data-var'));
      if (fam) { out[fam] = true; } else { out.__any__ = true; }
    });
    return out;
  }

  /** A whole-number field: no decimals, no letters, no exponent. */
  function wantsInteger(inp) {
    if (inp.getAttribute('data-integer') === '1') return true;
    return false;
  }

  /** Did the visitor type anything the calculator can work from? */
  function anyInputGiven() {
    var given = false;
    inputs.forEach(function (inp) {
      if (given || inp.readOnly) return;
      if (String(inp.value || '').trim() !== '') given = true;
    });
    return given;
  }

  function validateForm() {
    var problems = [];
    var firstBad = null;
    var families = filledFamilies();
    inputs.forEach(function (inp) {
      var field = inp.closest('.calc-field');
      if (!field) return;
      clearFieldError(field);
      if (field.hidden || inp.readOnly || inp.type === 'checkbox' || inp.type === 'radio') return;
      var raw = String(inp.value || '').trim();
      var name = inp.getAttribute('data-var');
      var label = (field.querySelector('.calc-label') || {}).textContent || name;
      label = label.trim().replace(/\s*:$/, '');
      if (raw === '') {
        var fam = slotFamily(name);
        if (REQUIRED[name] && !(fam && (families[fam] || families.__any__))) {
          problems.push(label + ' is required');
          firstBad = firstBad || field;
        }
        return;
      }
      if (inp.getAttribute('data-datetype')) return;
      if (parseNumber(raw) === null) {
        problems.push(label + ' needs a number');
        firstBad = firstBad || field;
        setFieldError(field, 'Enter a number — letters and symbols are not allowed here.');
        return;
      }
      if (wantsInteger(inp) && !/^\s*[-+]?\d+\s*$/.test(raw)) {
        problems.push(label + ' needs a whole number');
        firstBad = firstBad || field;
        setFieldError(field, 'Whole numbers only — no decimals or letters.');
      }
    });
    /* a field with nothing valid at all is only a problem when it is required;
       the solver simply has less to work with otherwise */
    return { problems: problems, firstBad: firstBad };
  }

  function isShown(state, name) {
    if (isTextVar(name)) return true;   // the hook reads the box directly
    if (state.known[name] && !(state.placeholder && state.placeholder[name])) return true;
    /*
     * A drop-down whose options are words ("Double-stranded DNA", "Frame 2")
     * never enters the numeric state, because solve() can only bank a number.
     * It is still a control the visitor can see and set, so a hook that names it
     * must not be blocked — otherwise every sequence tool with a mode selector
     * renders an empty panel until the visitor types.
     */
    var v = DEF.vars && DEF.vars[name];
    if (v && v.type === 'valueSelect' && v.defaults && v.defaults[0]
        && String(v.defaults[0].value || '') !== '') {
      return true;
    }
    return false;
  }

  /*
   * Did the visitor supply anything at all?
   *
   * A page can carry hidden givens — a `dependent` with a default that no box
   * asks for — and the solver will happily work a result out of them. Pressing
   * Calculate on a form nobody has touched then answered "Results updated."
   * with a number nobody asked for: /ecology/wind-turbine-profit printed
   * "T Day 0" from a hidden one-day default on an empty form. An untouched form
   * is not a calculation; it gets the same required-field answer as a form with
   * a missing box.
   */
  function formSupplied() {
    var any = false;
    inputs.forEach(function (i) {
      if (String(i.value || '').trim() !== '') any = true;
    });
    if (!any) {
      /* Only the calculator's own controls count: a widget also holds plain
         checkboxes (the mobile menu toggle, a "show the formula" switch) whose
         ticked state says nothing about the form's values. */
      var picks = widget.querySelectorAll('input[type="radio"][name]:checked, input[type="checkbox"][data-var-check]:checked');
      for (var i = 0; i < picks.length; i++) any = true;
    }
    if (!any) {
      var selects = widget.querySelectorAll('select[data-var]');
      for (var k = 0; k < selects.length; k++) {
        if (selects[k].hasAttribute('data-unit-select')) continue;
        if (String(selects[k].value || '').trim() !== '') any = true;
      }
    }
    return any;
  }

  /*
   * The number a choice stands for.
   *
   * A drop-down's option carries a display label and a stored number ("Married
   * filing jointly" -> 2). The record keeps the *uid* of its default option, so
   * the dataset is the only place the number can be read from.
   */
  function choiceDefault(name) {
    var v = DEF.vars[name] || {};
    var ds = v.datasetUid ? (DEF.datasets || {})[v.datasetUid] : null;
    if (!ds) return null;
    var wanted = null;
    var dfl = v.defaults && v.defaults[0] ? v.defaults[0].value : null;
    if (dfl === null || dfl === undefined || String(dfl).trim() === '') return null;
    wanted = String(dfl);
    var opts = ds.options || [];
    for (var j = 0; j < opts.length; j++) {
      if (String(opts[j].uid) === wanted || String(opts[j].value) === wanted) {
        var num = parseNumber(opts[j].value);
        if (num !== null) return num;
      }
    }
    return null;
  }

  function solve(known) {
    var values = {}, isKnown = {}, computed = {}, i, name;

    for (name in known) {
      if (known[name] !== null && known[name] !== undefined) {
        values[name] = known[name];
        isKnown[name] = true;
      }
    }

    /*
     * Defaults from the definition, in this order:
     *   valueSelect  — the option the page opens on
     *   numerical    — its prefilled value, given in display units
     *   dependent    — likewise ("density = 1680 kg/m3" for regular gravel)
     * A dependent with no default is seeded with 0 for the solver's benefit
     * only (an unused argument to a helper function reads as 0, exactly as on
     * the reference page) and is flagged so it is never displayed.
     */
    var placeholder = {}, overflow = {};
    for (name in DEF.vars) {
      if (isKnown[name]) continue;
      var v = DEF.vars[name];
      /*
       * A choice is only a value when the visitor made it. The definition's
       * stored default used to be read here, which let a page work out an
       * answer from a radio nobody had clicked — the control now renders
       * unanswered, and this must agree with it.
       *
       * A choice with no control on the page is a different thing. Pages
       * harvested from a long form carry givens that never had a box of their
       * own — a filing status, a compounding convention, which tax table to
       * read — and dropping their defaults left every formula that needs one at
       * NaN: five finance pages could not answer at any set of numbers. One the
       * visitor can see stays unset; one they cannot see keeps the value the
       * model was written with.
       */
      if (v.type === 'valueSelect') {
        if (DEF.fields && DEF.fields[name]) continue;
        var selN = choiceDefault(name);
        if (selN !== null) { values[name] = selN; isKnown[name] = true; }
        continue;
      }
      /*
       * A box the visitor fills in starts empty, here as on the server: the
       * harvested default is not an answer and is not seeded as a known value.
       * A `dependent` row keeps its constant (a material density and the like),
       * because that is a given the page supplies rather than something the
       * visitor is asked for.
       */
      if (DEF.fields && DEF.fields[name]) continue;
      var dflt = v.defaults && v.defaults[0] ? v.defaults[0].value : null;
      if (dflt !== null && dflt !== undefined && String(dflt).trim() !== '') {
        var d = parseNumber(dflt);
        if (d !== null) {
          var dv = toBase(d, v.unitKey, v.defaultUnit || currentUnit(name));
          values[name] = dv;
          isKnown[name] = true;
          if (v.type === 'dependent') computed[name] = true;
        }
        continue;
      }
      if (v.type === 'dependent') {
        values[name] = 0;
        isKnown[name] = true;
        placeholder[name] = true;
      }
    }

    var eqs = DEF.eq || [], guard = 0, progress = true;
    while (progress && guard++ < 200) {
      progress = false;
      for (var e = 0; e < eqs.length; e++) {
        var variants = eqs[e] || [];
        for (var vi = 0; vi < variants.length; vi++) {
          var va = variants[vi];
          var lhs = va.lhs;
          if (!lhs || isKnown[lhs]) continue;
          var ready = true, rhs = va.rhs || [];
          for (i = 0; i < rhs.length; i++) if (!isKnown[rhs[i]]) { ready = false; break; }
          if (!ready) continue;
          try {
            var val = evalExpr(va.formula, formulaValues(values, va.formula));
            /*
             * A page helper may return a BigInt — `fastModularExponentiation`
             * on /math/power-modulo does its arithmetic in BigInt so it can
             * raise large numbers without losing digits. Everything downstream
             * (formatting, units, `isFinite`) expects a number, and `isFinite`
             * throws on a BigInt, so the answer was dropped and the page said
             * "fill in any one of the boxes". Convert at the boundary; the
             * values these formulas produce are well inside double precision.
             */
            if (typeof val === 'bigint') val = Number(val);
            /*
             * A formula that runs off to Infinity is not "no answer yet": the
             * visitor's numbers are the reason. Remember which box stalled so
             * the press can say so, instead of claiming every field already
             * holds a value (bacteria growth over 72 000 seconds does exactly
             * this: 1.5 ** 72000 overflows).
             */
            if (!isFinite(val)) { overflow[lhs] = true; progress = progress || false; continue; }
            var lv = (DEF.vars && DEF.vars[lhs]) || {};
            var dateOut = lv.type === 'date' || lv.type === 'datetime' || lv.type === 'time';
            var fu = (callsPageHelper(va.formula) && dateOut) ? null : formulaUnitMap()[lhs];
            if (fu && fu[0]) val = (val - fu[1]) / fu[0];
            delete placeholder[lhs];
            values[lhs] = val;
            isKnown[lhs] = true;
            computed[lhs] = true;
            progress = true;
          } catch (err) {
            /* variant not usable here — but if a debug flag is set, say why */
            if (window.__calcDebug) (window.__calcErrors = window.__calcErrors || []).push(String(err && err.message || err));
          }
        }
      }
    }

    var state = { values: values, known: isKnown, computed: computed,
                  placeholder: placeholder, overflow: overflow };
    if (SCRIPT.hooks.length) runHooks(state);
    return state;
  }

  /* -------------------------------------------------------- dom plumbing */
  var widget = document.querySelector('[data-calculator]');
  if (!widget) return;

  var inputs = [].slice.call(widget.querySelectorAll(
    'input[data-var]:not([type="checkbox"]), textarea[data-var]'));
  var radios = [].slice.call(widget.querySelectorAll('input[type="radio"]'));
  /* A two-state valueSelect renders as one checkbox: checked = the option with
     the label, unchecked = the blank "off" option the dataset also carries. */
  var checks = [].slice.call(widget.querySelectorAll('input[data-var-check]'));
  /* A long option list is a drop-down, a short one a row of radios. Both carry
     the option uid, and both are read the same way. */
  var choiceSelects = [].slice.call(widget.querySelectorAll('select[data-var]'))
    .filter(function (s) { return !s.hasAttribute('data-unit-select'); });
  var unitSelects = {};
  [].slice.call(widget.querySelectorAll('select[data-unit-select]')).forEach(function (s) {
    unitSelects[s.getAttribute('data-unit-select')] = s;
  });
  var formulas = [].slice.call(widget.querySelectorAll('[data-formula-index]'));
  /*
   * How many sentences the last render actually produced from a *conditional*
   * fragment. Read by the press handler: on a page whose answer is a sentence
   * there are no boxes to count, and counting the DOM after the fact is useless
   * because those lines are hidden until the press itself succeeds.
   */
  var lastSentenceCount = 0;
  /* which page helper wants a day number instead of milliseconds */
  var DAY_ARG = {};

  /* date / time boxes carry epoch milliseconds, the pickers speak ISO */
  function dateToMs(value, dtype) {
    if (!value) return null;
    if (dtype === 'time') {
      var tm = /^(\d{1,2}):(\d{2})/.exec(value);
      if (!tm) return null;
      return ((+tm[1]) * 60 + (+tm[2])) * 60000;
    }
    var ms = Date.parse(value.length <= 10 ? value + 'T00:00:00Z' : value + 'Z');
    return isNaN(ms) ? null : ms;
  }

  function msToDate(ms, dtype) {
    if (ms === null || ms === undefined || !isFinite(ms)) return '';
    if (dtype === 'time') {
      var d = new Date(Math.round(ms));
      var hh = ('0' + d.getUTCHours()).slice(-2), mm = ('0' + d.getUTCMinutes()).slice(-2);
      return hh + ':' + mm;
    }
    var iso = new Date(Math.round(ms)).toISOString();
    if (dtype === 'date') return iso.slice(0, 10);
    return iso.slice(0, 16);
  }

  function currentUnit(name) {
    var sel = unitSelects[name];
    return sel ? sel.value : null;
  }

  /*
   * Which fields the user actually typed into.
   *
   * This is the single most important piece of state: the solver must never
   * treat its own output as an input, or a value it derived would be fed back
   * in and pin the result (e.g. changing a unit would appear to do nothing).
   * Inputs are seeded from the server render, which marks computed rows with
   * .is-computed.
   */
  var edited = {};

  function markEdited(name, value) {
    if (value === null || value === undefined || String(value).trim() === '') {
      delete edited[name];
    } else {
      edited[name] = true;
    }
  }

  inputs.forEach(function (inp) {
    var name = inp.getAttribute('data-var');
    var wrap = inp.closest('.calc-input-wrap');
    var computedByServer = wrap ? wrap.classList.contains('is-computed') : false;
    if (inp.value.trim() === '' || computedByServer) return;
    /* A read-only box is never an input, whatever its text says — the server
       may have filled it from a shared link, which is still not user intent. */
    if (inp.hasAttribute('readonly')) return;
    /*
     * A prefilled box shows the default *rounded for display* ("0.0014" for
     * 0.001421). Reading that text back would throw away the extra digits, so a
     * box whose text is exactly the formatted default is left to the solver,
     * which seeds the default in full. Only a value that differs from the
     * default — a shared link, or something typed — counts as user input.
     */
    var v = DEF.vars[name] || {};
    var dflt = v.defaults && v.defaults[0] ? v.defaults[0].value : null;
    if (dflt !== null && dflt !== undefined) {
      var d = parseNumber(dflt);
      if (d !== null) {
        var shownDefault = plainNumber(toDisplay(d, v.unitKey, v.defaultUnit || currentUnit(name)),
                                        (v.rounding && v.rounding.precision),
                                        (v.rounding && v.rounding.algorithm) || 'omni');
        if (String(inp.value).trim() === shownDefault) return;
      }
    }
    edited[name] = true;
  });
  radios.forEach(function (r) {
    if (r.checked) edited[r.name] = true;
  });

  function readState() {
    var known = {};
    inputs.forEach(function (inp) {
      var name = inp.getAttribute('data-var');
      if (!edited[name]) return;
      var dtype = inp.getAttribute('data-datetype');
      if (dtype) {
        var ms = dateToMs(inp.value, dtype);
        if (ms !== null) known[name] = ms;
        return;
      }
      var parsed = parseNumber(inp.value);
      if (parsed === null) return;
      known[name] = toBase(parsed, inp.getAttribute('data-unit-key'), currentUnit(name));
    });
    function choiceValue(name, uid) {
      var v = DEF.vars[name];
      var ds = v && v.datasetUid ? DEF.datasets[v.datasetUid] : null;
      if (!ds) return null;
      var opts = ds.options || [];
      for (var i = 0; i < opts.length; i++) {
        if (opts[i].uid === uid) return parseNumber(opts[i].value);
      }
      return null;
    }

    radios.forEach(function (r) {
      if (!r.checked) return;
      var num = choiceValue(r.name, r.value);
      if (num !== null) known[r.name] = num;
    });
    choiceSelects.forEach(function (s) {
      var name = s.getAttribute('data-var');
      var num = choiceValue(name, s.value);
      if (num !== null) known[name] = num;
    });
    checks.forEach(function (c) {
      var name = c.getAttribute('data-var-check');
      var uid = c.checked ? c.value : c.getAttribute('data-off');
      var num = choiceValue(name, uid);
      if (num !== null) known[name] = num;
    });
    return known;
  }

  function roundingOf(name) {
    var v = DEF.vars[name] || {};
    return v.rounding || null;
  }

  function renderFormulas(state) {
    if (!DEF.texts) return;
    var sentences = 0;
    /*
     * Re-read the nodes instead of using the list captured at start-up: the
     * results panel redraws its own markup, and a note inside it is a *new*
     * element afterwards. The stale nodes were detached, so their lines kept
     * whatever the server had painted — a run of fragments with the conditions
     * stripped out and the values missing.
     */
    var live = [].slice.call(widget.querySelectorAll('[data-formula-index]'));
    live.forEach(function (el) {
      var idx = parseInt(el.getAttribute('data-formula-index'), 10);
      var groups = DEF.texts[idx];
      if (!groups) return;
      // each group is one fragment of the line; render every fragment whose
      // condition holds and concatenate, exactly as the reference does
      var html = '';
      var parts = [];
      var conditionalParts = false;
      for (var g = 0; g < groups.length; g++) {
        var variants = (Array.isArray(groups[g]) ? groups[g] : [groups[g]]).filter(function (v) {
          // a chunk harvested without its closing braces is truncated source
          var h = String(v.html || '');
          return (h.split('{{').length === h.split('}}').length);
        });
        if (!variants.length) continue;
        var picked = null, fallback = null, pickedConditional = false;
        for (var i = 0; i < variants.length; i++) {
          var cond = variants[i].condition;
          var ok = conditionHolds(cond, state);
          var isPlain = !cond || String(cond).trim() === '';
          if (isPlain) { if (ok && fallback === null) fallback = variants[i].html; continue; }
          if (ok) { picked = variants[i].html; pickedConditional = true; break; }
        }
        if (picked === null) picked = fallback;
        if (pickedConditional) conditionalParts = true;
        if (picked !== null) { html += picked; parts.push(picked); }
      }

      /* Same rule as the server (lib/Widget.php): a line whose unconditional
         lead-in ends in a connector ("That's exactly the density of") is waiting
         for the fragment that finishes it, so it must not render on its own. A
         lone question whose answer fragment needs a missing value waits too. */
      if (parts.length) {
        var plainOf = function (h) {
          return String(h).replace(/<[^>]*>/g, '').replace(/\{\{[^}]*\}\}/g, '')
            .replace(/&nbsp;/g, ' ').replace(/\u00a0/g, ' ').trim();
        };
        var connector = /(?:\b(?:of|and|the|a|an|to|in|into|between|than|is|are|or|with|from|as|at|by|for|that|per|about|over|under|equal))[\s,;:\-\u2014\u2013]*$/i;
        var chosen = null;
        for (var k = parts.length - 1; k >= 0; k--) {
          var plain = plainOf(parts.slice(0, k + 1).join(''));
          if (k === parts.length - 1 && connector.test(plain)) continue;
          if (k === 0 && groups.length > 1 && plain.charAt(plain.length - 1) === '?') continue;
          chosen = parts.slice(0, k + 1).join('');
          break;
        }
        html = chosen === null ? '' : chosen;
      }

      // Same guard as lib/Widget.php: a line quoting a value this build cannot
      // compute ("(x2 - x1) = 4 - 1 =  (y2 - y1) =") is worse than no line.
      var rawPlain = String(html).replace(/<[^>]*>/g, '').replace(/&nbsp;/g, ' ').replace(/\u00a0/g, ' ');
      if (/=\s{2,}|=\s*$|=\s*[(\[]\s*[)\]]|\(\s*\)/.test(rawPlain)) html = '';
      /*
       * A harvested sentence whose substituted values went missing reads as
       * "we divide the equation by , so that ..." — half a sentence, no number
       * where the number belongs. That is worse than no sentence, so a line
       * with a dangling value slot is dropped instead of printed.
       */
      if (/(?:^|[^\d])(?:by|of|with|equals?)\s*[,\.]|,\s*,|\b(?:is|are|gives?)\s*,/.test(rawPlain)) html = '';
      if (html === '') { el.innerHTML = ''; return; }
      el.innerHTML = html.replace(
        /\{\{\s*([A-Za-z_][A-Za-z0-9_]*)\.(value|formattedValue|rawValue|unit|formattedUnit|uiValue|label)\s*\}\}/g,
        function (m, name, what) {
          var r = roundingOf(name);
          var unitKey = (DEF.fields[name] || {}).unitKey || null;
          var unit = currentUnit(name);
          if (what === 'uiValue' || what === 'label') return choiceLabel(name);
          if (what === 'unit' || what === 'formattedUnit') {
            return unit ? (DEF.unitLabels && DEF.unitLabels[unitKey] ? (DEF.unitLabels[unitKey][unit] || unit) : unit) : '';
          }
          if (!isShown(state, name)) return '';
          var raw = state.values[name];
          // a page script may publish text ("C, E, G"), not just numbers
          if (typeof raw !== 'number') return String(raw);
          var shown = toDisplay(raw, unitKey, unit);
          return formatNumber(shown, r && r.precision, (r && r.algorithm) || 'omni');
        });
      // never leave a raw placeholder on the page — but only *after* the real
      // substitutions have been made, or every value would be deleted here
      el.innerHTML = el.innerHTML.replace(/\{\{\s*[A-Za-z_][A-Za-z0-9_.]*\s*\}\}/g, '')
        .replace(/\{\{[^{}]{0,60}$/, '');

      /* A line that is a sentence is prose, not a formula: the server cannot
         always tell (the fragment may only exist once a value is known), so the
         decision is repeated here on the text that actually rendered. Prose wraps
         and is set in the body face; an expression keeps the monospace line. */
      var text = (el.textContent || '').replace(/\s+/g, ' ').trim();
      var isProse = text.length > 60 || /[.!?]$/.test(text);
      el.classList.toggle('calc-note', isProse);
      el.classList.toggle('calc-formula', !isProse);
      el.classList.toggle('calc-note--feedback', isProse && el.hasAttribute('data-feedback'));
      if (conditionalParts && text !== '') sentences++;
    });
    lastSentenceCount = sentences;
  }

  function choiceLabel(name) {
    var el = widget.querySelector('select[data-var="' + name + '"]');
    if (el && el.selectedIndex >= 0) return el.options[el.selectedIndex].text;
    var r = widget.querySelector('input[type="radio"][name="' + name + '"]:checked');
    if (r) {
      var span = r.parentNode && r.parentNode.querySelector('span');
      return span ? span.textContent.trim() : r.value;
    }
    var c = widget.querySelector('input[data-var-check="' + name + '"]');
    if (c) {
      var cs = c.parentNode && c.parentNode.querySelector('span');
      return c.checked && cs ? cs.textContent.trim() : '';
    }
    return '';
  }

  function conditionHolds(cond, state) {
    if (!cond || String(cond).trim() === '') return true;
    var c = String(cond);
    var orParts = c.split(/\s+or\s+/i);
    if (orParts.length > 1) {
      return orParts.some(function (p) { return conditionHolds(p, state); });
    }
    var andParts = c.split(/\s+and\s+/i);
    if (andParts.length > 1) {
      return andParts.every(function (p) { return conditionHolds(p, state); });
    }
    // Strip *matched* outer brackets only — a blanket replace would eat the
    // closing paren of hasValue(x) and silently make every condition false.
    var t = c.trim();
    while (t.charAt(0) === '(' && t.charAt(t.length - 1) === ')') {
      var depth = 0, balanced = true;
      for (var bi = 0; bi < t.length; bi++) {
        if (t.charAt(bi) === '(') depth++;
        else if (t.charAt(bi) === ')') { depth--; if (depth === 0 && bi < t.length - 1) { balanced = false; break; } }
      }
      if (!balanced) break;
      t = t.slice(1, -1).trim();
    }
    var m;
    if ((m = /^not\s+(.+)$/i.exec(t))) return !conditionHolds(m[1], state);
    if ((m = /^hasValue\(\s*([A-Za-z_][A-Za-z0-9_]*)\s*\)$/i.exec(t))) return isShown(state, m[1]);
    if ((m = /^[A-Za-z_][A-Za-z0-9_]*\(\)$/.exec(t))) return false;
    if ((m = /^([A-Za-z_][A-Za-z0-9_]*)\s*(>=|<=|==|!=|>|<)\s*(-?[\d.]+)$/.exec(t))) {
      if (!isShown(state, m[1])) return false;
      return compare(state.values[m[1]], m[2], parseFloat(m[3]));
    }
    if ((m = /^(-?[\d.]+)\s*(>=|<=|==|!=|>|<)\s*([A-Za-z_][A-Za-z0-9_]*)$/.exec(t))) {
      if (!isShown(state, m[3])) return false;
      return compare(parseFloat(m[1]), m[2], state.values[m[3]]);
    }
    return false;
  }

  function compare(a, op, b) {
    switch (op) {
      case '>': return a > b;
      case '<': return a < b;
      case '>=': return a >= b;
      case '<=': return a <= b;
      case '==': return Math.abs(a - b) < 1e-12;
      case '!=': return Math.abs(a - b) >= 1e-12;
      default: return false;
    }
  }

  /* Long values get one of two smaller type sizes instead of being clipped. */
  function densityClass(inp) {
    var n = (inp.value || '').length;
    inp.classList.toggle('calc-input--long', n > 8 && n <= 11);
    inp.classList.toggle('calc-input--longer', n > 11);
  }

  /*
   * Nothing the solver works out reaches the page until Calculate is pressed.
   *
   * The values are already in `state` — the numbers are what the reveal paints —
   * but writing them into the boxes on every keystroke is exactly the "live
   * field" the brief rules out: you type a shift start and the shift end fills
   * itself in before you have asked for it. `paintSolved` is false from first
   * paint until reveal(), and resetAll() puts it back.
   */
  var paintSolved = false;
  /* the last solve() result, so the reveal can tell a real answer from a blank
     panel without guessing from the DOM */
  var lastState = null;

  function apply(state, editedName) {
    inputs.forEach(function (inp) {
      var name = inp.getAttribute('data-var');
      /* The field being typed into is left alone so the caret and partial text
         ("1.", "-0.5") survive. A field the visitor has *cleared* is not being
         typed into any more, so it is refilled from the solve — either with the
         value the other knowns imply, or with its default. Leaving it blank
         would strand the visitor with an empty box and no way to restore it. */
      if (name === editedName && (inp.value.trim() !== '' || document.activeElement === inp)) return;
      if (edited[name]) return; // user owns this field; never overwrite it
      var wrap = inp.closest('.calc-input-wrap');
      /*
       * A field the visitor did not type into is a result. Before Calculate it
       * stays empty — no default, no preview, no half-solved number.
       */
      if (!paintSolved && !edited[name]) {
        if (inp.value !== '') { inp.value = ''; densityClass(inp); }
        if (wrap) wrap.classList.remove('is-computed');
        return;
      }
      var r = roundingOf(name);
      var dtype = inp.getAttribute('data-datetype');
      if (dtype) {
        var text2 = isShown(state, name) ? msToDate(state.values[name], dtype) : '';
        if (inp.value !== text2) inp.value = text2;
        if (wrap) wrap.classList.toggle('is-computed', !!state.computed[name]);
        return;
      }
      /*
       * A page script can publish text, not only a number: a word in words, an
       * encoded string, a balanced chemical equation. plainNumber() below would
       * turn that into an empty box and the panel would hide the row, which is
       * how pages computed an answer nobody could see. Text goes through
       * untouched — it is already the finished value.
       */
      var published = state.values[name];
      if (typeof published === 'string') {
        if (inp.value !== published) {
          inp.value = published;
          densityClass(inp);
        }
        if (wrap) wrap.classList.toggle('is-computed', !!state.computed[name]);
        return;
      }
      if (isShown(state, name)) {
        var unitKey = inp.getAttribute('data-unit-key') || null;
        var shown = toDisplay(state.values[name], unitKey, currentUnit(name));
        var text = plainNumber(shown, r && r.precision, (r && r.algorithm) || 'omni',
                               inp.hasAttribute('readonly'));
        if (inp.value !== text) {
          inp.value = text;
          densityClass(inp);
          if (wrap && state.computed[name]) {
            wrap.classList.remove('just-updated');
            void wrap.offsetWidth;
            wrap.classList.add('just-updated');
          }
        }
        if (wrap) wrap.classList.toggle('is-computed', !!state.computed[name]);
      } else {
        if (inp.value !== '') { inp.value = ''; densityClass(inp); }
        if (wrap) wrap.classList.remove('is-computed');
      }
    });
    renderFormulas(state);
    if (Results) Results.render();
  }

  /*
   * Boxes that only exist for some answers: "how many groups?" decides whether
   * group_D is asked for at all. A wall of empty boxes the visitor is not meant
   * to fill is exactly what makes a page look broken, so a field carrying a
   * condition is hidden — and emptied — whenever that condition fails.
   */
  function applyShowIf(state) {
    if (!DEF.showIf) return;
    var changed = false;
    Object.keys(DEF.showIf).forEach(function (name) {
      var field = widget.querySelector('.calc-field[data-var="' + name + '"]');
      if (!field) return;
      var keep = conditionHolds(DEF.showIf[name], state);
      if (field.hidden === !keep) return;
      field.hidden = !keep;
      changed = true;
      if (keep) return;
      var inp = field.querySelector('.calc-input');
      if (inp && inp.value !== '') {
        inp.value = '';
        inp.dispatchEvent(new Event('input', { bubbles: true }));
      }
      clearFieldError(field);
    });
    if (!changed) return;
    /*
     * A hidden box leaves its column behind, and the column keeps its share of
     * the grid — five numbers then sat above 500 pixels of nothing. A wrapper
     * with no visible box in it is hidden with them.
     */
    [].slice.call(widget.querySelectorAll('.calc-col, .calc-field-home, .calc-matrix'))
      .forEach(function (wrap) {
        var fields = wrap.querySelectorAll('.calc-field');
        if (!fields.length) return;
        var anyVisible = false;
        for (var i = 0; i < fields.length; i++) {
          if (!fields[i].hidden) { anyVisible = true; break; }
        }
        wrap.hidden = !anyVisible;
      });
  }

  function recompute(editedName) {
    var state = solve(readState(editedName));
    lastState = state;
    applyShowIf(state);
    apply(state, editedName);
    return state;
  }

  /*
   * An edit never repaints a result the visitor is reading.
   *
   * Typing in a form field re-solves internally (so the DOM, the URL and every
   * regression suite stay consistent) but marks the results panel stale, which
   * takes it off screen until Calculate is pressed again. Typing in a result row
   * is different: that row is being edited, so the panel stays put and the other
   * rows are left exactly as they are until the button is pressed.
   */
  function noteEdit(inp) {
    if (inp && inp.closest('[data-calc-results]')) return true;
    if (Gate) Gate.markStale();
    return false;
  }

  inputs.forEach(function (inp) {
    var handler = function (ev) {
      var name = inp.getAttribute('data-var');
      var dtype = inp.getAttribute('data-datetype');
      if (ev.type === 'input' && !dtype) {
        var raw = inp.value;
        // allow partial input like "1." or "-" while typing
        if (raw !== '' && parseNumber(raw) === null && !/^[-+]?\d*[.,]?\d*$/.test(raw)) return;
      }
      markEdited(name, inp.value);
      var wrap = inp.closest('.calc-input-wrap');
      if (wrap) wrap.classList.remove('is-computed');
      if (inp.closest('[data-calc-results]')) return;   // a result row: wait for the button
      /* Only typing is a change. A `change` event also fires when a field loses
         focus after Enter has just revealed the results, and treating that as an
         edit would hide the panel the visitor had only just opened. */
      if (ev.type === 'input' && Gate) Gate.markStale();
      recompute(name);
    };
    inp.addEventListener('input', handler);
    inp.addEventListener('change', handler);
    /* Leaving a field is not a change. The old handler re-solved on every blur,
       which — now that an edit takes the results off screen — cleared them again
       the moment Enter moved focus away. Only an unreadable value is acted on. */
    inp.addEventListener('blur', function () {
      var name = inp.getAttribute('data-var');
      /*
       * Leaving a box with something unreadable in it is the visitor's mistake
       * to see and correct — silently emptying the field loses what they typed
       * and explains nothing. The value stays, the box is marked, and Calculate
       * refuses with the same note.
       */
      if (!inp.getAttribute('data-datetype') && inp.value !== '' && parseNumber(inp.value) === null) {
        var badField = inp.closest('.calc-field');
        if (badField) setFieldError(badField, 'Enter a number — letters and symbols are not allowed here.');
        return;
      }
      /*
       * Nothing is cleared here. Removing a note re-flows everything below it —
       * the Calculate button included — and that happens exactly when the visitor
       * presses the button (the box they were in loses focus on mousedown), so
       * the press lands on whatever moved into its place and the click is lost.
       * Notes are cleared by the next press, which is when they are re-checked.
       */
    });
  });

  Object.keys(unitSelects).forEach(function (name) {
    var sel = unitSelects[name];
    sel.addEventListener('change', function () {
      var inp = widget.querySelector('input[data-var="' + name + '"]');
      var prev = inp ? (inp.getAttribute('data-unit') || '') : '';
      if (inp) inp.setAttribute('data-unit', sel.value);

      /*
       * A unit chip changes the units, never the quantity.
       *
       * It used to do the opposite: the digits stayed put and the unit changed
       * underneath them, so 50 °C became 50 °F the moment the chip moved, and a
       * result reading 210.1 °C kept reading 210.1 after being switched to °F.
       * Both numbers were wrong, and the second one was wrong in the worst way
       * — an answer that looks like an answer.
       *
       * So: a computed row is repainted from the base value the solver already
       * holds (210.1 °C reads 410.2 °F), and a row the visitor typed into is
       * re-expressed in the new unit (50 °C reads 122 °F) before the page is
       * solved again. The same physical quantity, whichever chip is showing.
       */
      var inResults = !!(inp && inp.closest('[data-calc-results]'));
      var key = inp ? (inp.getAttribute('data-unit-key') || '') : '';
      if (inp && !edited[name] && (inResults || inp.hasAttribute('readonly'))) {
        if (lastState) apply(lastState, null);
        return;
      }
      if (inp && edited[name] && key !== '' && prev !== '' && prev !== sel.value) {
        var parsed = parseNumber(inp.value);
        if (parsed !== null) {
          var r = roundingOf(name);
          var shown = toDisplay(toBase(parsed, key, prev), key, sel.value);
          var text = plainNumber(shown, r && r.precision, (r && r.algorithm) || 'omni',
                                 inp.hasAttribute('readonly'));
          /* Small enough to read, exact enough to keep: the number on screen is
             the converted one, and the field is still the visitor's to edit. */
          inp.value = text === '' ? String(shown) : text;
          densityClass(inp);
        }
      }
      var wrap = inp ? inp.closest('.calc-input-wrap') : null;
      if (wrap) wrap.classList.remove('is-computed');
      if (noteEdit(inp)) return;
      recompute(name);
    });
  });

  radios.forEach(function (r) {
    r.addEventListener('change', function () {
      markEdited(r.name, r.value);
      if (Gate) Gate.markStale();
      recompute(null);
    });
  });

  checks.forEach(function (c) {
    c.addEventListener('change', function () {
      markEdited(c.getAttribute('data-var-check'), c.checked ? c.value : c.getAttribute('data-off'));
      if (Gate) Gate.markStale();
      recompute(null);
    });
  });

  choiceSelects.forEach(function (s) {
    s.addEventListener('change', function () {
      markEdited(s.getAttribute('data-var'), s.value);
      if (Gate) Gate.markStale();
      recompute(null);
    });
  });


  /* ------------------------------------------------------------- results
   * The answers live in one panel under the Calculate button, and nowhere else.
   *
   * Which values are answers depends on what the visitor supplied, so the panel
   * is re-partitioned after every solve: a field the solver filled in is moved
   * into the panel (with its unit chip, its own copy button and its editable
   * input, which is how solving backwards works), and a field the visitor
   * supplies is moved back to the form. Nodes are moved, never cloned, so there
   * is exactly one input per variable and no value is ever on the page twice.
   */
  /* ---------------------------------------------------------------- share */
  /*
   * The share bar under Calculate.
   *
   * "The calculator" shares a URL — same for everybody, always correct.
   * "The result" shares the numbers currently on screen, read from the same
   * rows the results panel printed, so the text can never disagree with the
   * page. Until something has been calculated there is no result to share, so
   * the result scope stays disabled instead of sharing an empty promise.
   */
  var Share = (function () {
    var box = document.querySelector('[data-calc-share]');
    if (!box) return { refresh: function () {}, resultReady: function () {} };

    var scopeRadios = [].slice.call(box.querySelectorAll('input[name="share-scope"]'));
    var links = [].slice.call(box.querySelectorAll('[data-share-net]'));
    var copyBtn = box.querySelector('[data-share-copy]');
    var copyLabel = box.querySelector('[data-share-copy-label]');
    var status = box.querySelector('[data-share-status]');
    var preview = box.querySelector('[data-share-preview]');
    var scopeLabel = box.querySelector('[data-share-scope-label]');
    var note = box.querySelector('.calc-share-note');
    var resultRadio = scopeRadios.filter(function (r) { return r.value === 'result'; })[0];
    var calcUrl = box.getAttribute('data-share-url') || location.href;
    var calcText = box.getAttribute('data-share-text') || document.title;

    var say = function (message) { if (status) status.textContent = message; };

    function scope() {
      var picked = scopeRadios.filter(function (r) { return r.checked; })[0];
      return picked ? picked.value : 'calc';
    }

    function resultLines() {
      var data = [];
      try { data = Results.rows() || []; } catch (e) { data = []; }
      return data;
    }

    function resultText() {
      var data = resultLines();
      if (!data.length) return '';
      return data.map(function (row) { return Results.line(row); }).join('\n');
    }

    /* The link a visitor actually sends. Result shares get the numbers folded
       into the text and keep the URL, so the reader can open the tool too. */
    function payload() {
      var url = calcUrl;
      var text = calcText;
      if (scope() === 'result') {
        var lines = resultText();
        if (lines) {
          text = calcText + '\n\n' + lines + '\n';
        }
      }
      return { url: url, text: text };
    }

    function build(template, data) {
      return template
        .replace('{url}', encodeURIComponent(data.url))
        .replace('{text}', encodeURIComponent(data.text));
    }

    function sync() {
      var hasResult = resultLines().length > 0;
      if (resultRadio) {
        resultRadio.disabled = !hasResult;
        if (!hasResult && resultRadio.checked) {
          scopeRadios[0].checked = true;
        }
      }
      var data = payload();
      links.forEach(function (link) {
        var template = link.getAttribute('data-href-template');
        if (template) link.setAttribute('href', build(template, data));
      });
      if (scopeLabel) {
        scopeLabel.textContent = (scope() === 'result' && hasResult)
          ? 'Sharing the numbers on screen, with a link to the calculator.'
          : 'Send the calculator, or just the numbers you got.';
      }
      if (preview) {
        if (scope() === 'result' && hasResult) {
          preview.textContent = resultText();
          preview.hidden = false;
        } else {
          preview.textContent = '';
          preview.hidden = true;
        }
      }
      if (note) note.hidden = !(scope() === 'result' && hasResult);
    }

    scopeRadios.forEach(function (radio) { radio.addEventListener('change', sync); });

    if (copyBtn) {
      copyBtn.addEventListener('click', function () {
        var data = payload();
        var body = scope() === 'result' ? data.text + data.url : data.url;
        var done = function () {
          copyBtn.classList.add('is-copied');
          copyBtn.setAttribute('aria-label', 'Copied');
          say(scope() === 'result' ? 'Result copied to the clipboard.' : 'Link copied to the clipboard.');
          setTimeout(function () {
            copyBtn.classList.remove('is-copied');
            copyBtn.setAttribute('aria-label', 'Copy the link');
          }, 1800);
        };
        if (navigator.clipboard && navigator.clipboard.writeText) {
          navigator.clipboard.writeText(body).then(done, function () { fallbackCopy(body, done); });
        } else {
          fallbackCopy(body, done);
        }
      });
    }

    function fallbackCopy(text, done) {
      var area = document.createElement('textarea');
      area.value = text;
      area.setAttribute('readonly', '');
      area.style.position = 'fixed';
      area.style.top = '-1000px';
      document.body.appendChild(area);
      area.select();
      try { document.execCommand('copy'); done(); }
      catch (e) { say('Could not copy — select the link and copy it by hand.'); }
      document.body.removeChild(area);
    }

    sync();

    return { refresh: sync, resultReady: sync };
  })();

  var Results = (function () {
    var panel = document.querySelector('[data-calc-results]');
    if (!panel) return { render: function () {}, rows: function () { return []; }, moveBack: function () {}, line: line };
    var list = panel.querySelector('[data-results-list]');
    var empty = panel.querySelector('[data-results-empty]');
    var copyAll = panel.querySelector('[data-copy-all]');
    var status = panel.querySelector('[data-copy-status]');
    var homes = {};          // name -> the placeholder this field belongs to in the form

    function copyIcon() {
      var svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
      svg.setAttribute('width', '16');
      svg.setAttribute('height', '16');
      svg.setAttribute('viewBox', '0 0 24 24');
      svg.setAttribute('fill', 'none');
      svg.setAttribute('stroke', 'currentColor');
      svg.setAttribute('stroke-width', '1.6');
      svg.setAttribute('stroke-linecap', 'round');
      svg.setAttribute('stroke-linejoin', 'round');
      svg.setAttribute('aria-hidden', 'true');
      svg.innerHTML = '<rect x="9" y="9" width="11" height="11" rx="2"></rect>' +
        '<path d="M15 9V6.5A2.5 2.5 0 0 0 12.5 4H6.5A2.5 2.5 0 0 0 4 6.5v6A2.5 2.5 0 0 0 6.5 15H9"></path>';
      return svg;
    }

    function fieldOf(name) {
      return widget.querySelector('.calc-field[data-var="' + name.replace(/"/g, '\\"') + '"]') ||
             panel.querySelector('.calc-field[data-var="' + name.replace(/"/g, '\\"') + '"]');
    }

    function buildRow(name, label) {
      var li = document.createElement('li');
      li.className = 'calc-result';
      li.setAttribute('data-result-row', name);

      var slot = document.createElement('div');
      slot.className = 'calc-result-field';
      slot.setAttribute('data-result-slot', name);
      li.appendChild(slot);

      var button = document.createElement('button');
      button.type = 'button';
      button.className = 'calc-copy';
      button.setAttribute('data-copy', name);
      button.setAttribute('aria-label', 'Copy ' + label);
      button.setAttribute('title', 'Copy ' + label);
      button.appendChild(copyIcon());
      var note = document.createElement('span');
      note.className = 'calc-copy-note';
      note.setAttribute('aria-hidden', 'true');
      note.textContent = 'Copy';
      button.appendChild(note);
      button.addEventListener('click', function () { copyRow(name); });
      li.appendChild(button);
      return li;
    }

    function slotFor(name, label) {
      var row = list.querySelector('[data-result-row="' + name.replace(/"/g, '\\"') + '"]');
      if (!row) {
        row = buildRow(name, label);
        list.appendChild(row);
      }
      return row.querySelector('[data-result-slot]');
    }

    /*
     * Move each field to where it now belongs: solved values into the panel,
     * everything else back to the spot in the form it came from. The node is
     * moved, never cloned — one input per variable, so the solver, the URL
     * state, the unit chips and the copy buttons all keep pointing at the same
     * element, and nothing is ever rendered twice.
     */
    function partition() {
      var order = [];
      inputs.forEach(function (inp) {
        if (inp.getAttribute('data-datetype')) return;
        var name = inp.getAttribute('data-var');
        var wrap = inp.closest('.calc-input-wrap');
        if (!wrap) return;
        var field = inp.closest('.calc-field');
        if (!field) return;
        /* A declared output belongs in the panel even before it holds a
           number: the field is a result, not a box to fill in. */
        /*
         * ...but a box the visitor has typed into never leaves the form, even
         * when the formulas could also work it out backwards. Hiding somebody's
         * own 10 g under the Calculate button and printing it back as an answer
         * is the reverse of helpful: the box they were editing vanishes, and a
         * number they supplied is presented as something the page discovered.
         * The moment they clear it, the solver's value takes over and the field
         * does become a result.
         */
        var typed = !!edited[name];
        var isResult = field.hasAttribute('data-output')
          || (!typed && wrap.classList.contains('is-computed'));
        order.push({name: name, field: field, isResult: isResult, inp: inp});

        /*
         * Where this field lives when it is an input: the placeholder the server
         * left in the form. It is looked up rather than remembered, because a
         * remembered parent can itself be a results row that is about to be
         * removed — which is how a field could disappear entirely.
         */
        var home = homes[name];
        if (!home) {
          home = widget.querySelector('.calc-field-home[data-home="' + name.replace(/"/g, '\\"') + '"]');
          if (home) homes[name] = home;
        }

        if (isResult) {
          var label = field.querySelector('.calc-label');
          var slot = slotFor(name, label ? label.textContent.trim() : name);
          if (field.parentNode !== slot) slot.appendChild(field);
        } else if (field.closest('[data-result-slot]')) {
          if (home) home.appendChild(field);
        }
      });

      /* keep the rows in form order, then drop rows that no longer apply */
      var live = {};
      order.forEach(function (o) {
        if (!o.isResult) return;
        var row = list.querySelector('[data-result-row="' + o.name.replace(/"/g, '\\"') + '"]');
        if (row) { list.appendChild(row); live[o.name] = true; }
      });
      [].slice.call(list.querySelectorAll('[data-result-row]')).forEach(function (row) {
        if (!live[row.getAttribute('data-result-row')]) row.parentNode.removeChild(row);
      });

      /* A result with no number in it yet is not a result: keep the row (and
         the field inside it, which must never fall back into the form) but take
         it off screen until the solver gives it something to show. */
      var n = 0;
      [].slice.call(list.querySelectorAll('[data-result-row]')).forEach(function (row) {
        var inp = row.querySelector('input[data-var]');
        var blank = !inp || String(inp.value).trim() === '';
        row.hidden = blank;
        if (!blank) n++;
      });
      panel.classList.toggle('is-empty', n === 0);
      if (copyAll) copyAll.hidden = n === 0;
      if (empty) {
        empty.textContent = n ? '' : 'Fill in the values above and press Calculate — the answers appear here.';
      }
      return n;
    }

    function unitOf(inp) {
      var wrap = inp.closest('.calc-input-wrap');
      if (!wrap) return '';
      var sel = wrap.querySelector('select.calc-unit');
      if (sel && sel.selectedIndex >= 0) return (sel.options[sel.selectedIndex].textContent || '').trim();
      var suffix = wrap.querySelector('.calc-affix:not(.calc-affix--prefix)');
      return suffix ? (suffix.textContent || '').trim() : '';
    }

    function labelOf(inp) {
      var field = inp.closest('.calc-field');
      var lab = field ? field.querySelector('.calc-label') : null;
      return lab ? (lab.textContent || '').trim() : inp.getAttribute('data-var');
    }

    function rows() {
      var out = [];
      [].slice.call(list.querySelectorAll('[data-result-row]')).forEach(function (row) {
        if (row.hidden) return;
        var inp = row.querySelector('input[data-var]');
        if (!inp) return;
        var value = (inp.value || '').trim();
        if (value === '') return;
        out.push({
          name: inp.getAttribute('data-var'),
          label: labelOf(inp),
          value: value,
          unit: unitOf(inp)
        });
      });
      return out;
    }

    function line(row) {
      return row.label + ': ' + row.value + (row.unit ? ' ' + row.unit : '');
    }

    function flash(button) {
      if (!button) return;
      var note = button.querySelector('.calc-copy-note');
      var label = button.querySelector('[data-copy-all-label]');
      button.classList.add('is-copied');
      if (note) note.textContent = 'Copied';
      if (label) label.textContent = 'Copied';
      clearTimeout(button.__copyTimer);
      button.__copyTimer = setTimeout(function () {
        button.classList.remove('is-copied');
        if (note) note.textContent = 'Copy';
        if (label) label.textContent = 'Copy all';
      }, 1400);
    }

    function copyText(text, name) {
      var done = function () {
        if (status) status.textContent = name ? name + ' copied.' : 'Results copied.';
      };
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(text).then(done, function () { fallback(text, done); });
        return;
      }
      fallback(text, done);
    }

    /* Older browsers and any page served over plain http: a hidden textarea and
       execCommand still copy, and the text is selected if even that fails, rather
       than the visitor being told nothing happened. */
    function fallback(text, done) {
      var ta = document.createElement('textarea');
      ta.value = text;
      ta.setAttribute('readonly', '');
      ta.style.position = 'fixed';
      ta.style.top = '-1000px';
      document.body.appendChild(ta);
      ta.select();
      var ok = false;
      try { ok = document.execCommand('copy'); } catch (e) { ok = false; }
      document.body.removeChild(ta);
      if (ok) { done(); return; }
      if (status) status.textContent = 'Copying is blocked in this browser — the value is selected, press Ctrl+C.';
    }

    function copyRow(name) {
      var row = null;
      rows().forEach(function (r) { if (r.name === name) row = r; });
      if (!row) return;
      var button = list.querySelector('[data-copy="' + name.replace(/"/g, '\\"') + '"]');
      copyText(line(row), row.label);
      flash(button);
    }

    if (copyAll) {
      copyAll.addEventListener('click', function () {
        var data = rows();
        if (!data.length) return;
        copyText(data.map(line).join('\n'), null);
        flash(copyAll);
      });
    }

    /* copy buttons that came from the server (pre-solved results) */
    [].slice.call(panel.querySelectorAll('[data-copy]')).forEach(function (button) {
      button.addEventListener('click', function () { copyRow(button.getAttribute('data-copy')); });
    });

    return { render: partition, rows: rows, line: line };
  })();

  /* Results changed, so the shareable text changed with them. Wrapping the one
     render call keeps every path (button, live typing, pre-solved rows) honest. */
  (function () {
    var render = Results.render;
    Results.render = function () { render.apply(Results, arguments); Share.refresh(); };
  })();

  /* ------------------------------------------------------- calculate button
   * Nothing on the page answers until the visitor asks. A panel that has a
   * result in it before a single field was touched reads as "is this my answer
   * or an example?", and a panel that follows every keystroke never lets you
   * finish a thought. So:
   *
   *   1. on load the widget is `data-results="pending"` and the results panel
   *      is not on screen at all;
   *   2. pressing Calculate (or Enter in a field, or arriving on a link that
   *      already carries values) solves, re-partitions the fields and reveals
   *      the panel;
   *   3. editing a field after that marks the panel stale and takes it off
   *      screen again — the numbers never change underneath a reader. Press
   *      Calculate to bring them back, updated.
   *
   * The values themselves are never removed from the DOM: a no-JS visitor, a
   * crawler and every regression suite keep reading the same numbers.
   */
  /*
   * A first-use reset: every box back to the value the page was born with, no
   * remembered edits, no shared-link numbers, no solved values, no URL state.
   * Defaults (a 10 % overlap, a 30-year term) come back; anything the visitor
   * typed does not.
   */
  function resetAll() {
    /*
     * Back to a page nobody has touched: every box blank, no remembered edits,
     * no shared-link numbers, no solved values, no URL state. The harvested
     * defaults are gone on purpose — a field that arrives pre-filled is a value
     * the visitor did not enter, and it is the first thing the brief rules out.
     * The unit chips keep their unit (that is a choice of scale, not an answer).
     */
    paintSolved = false;
    inputs.forEach(function (inp) {
      var name = inp.getAttribute('data-var');
      if (inp.value !== '') inp.value = '';
      densityClass(inp);
      var wrap = inp.closest('.calc-input-wrap');
      if (wrap) wrap.classList.remove('is-computed', 'just-updated');
      var field = inp.closest('.calc-field');
      if (field) clearFieldError(field);
    });

    radios.forEach(function (r) { r.checked = r.defaultChecked; });
    checks.forEach(function (c) { c.checked = c.defaultChecked; });

    Object.keys(unitSelects).forEach(function (name) {
      var sel = unitSelects[name];
      if (!sel) return;
      var fallback = null;
      for (var i = 0; i < sel.options.length; i++) {
        if (sel.options[i].defaultSelected) { fallback = i; break; }
      }
      sel.selectedIndex = fallback === null ? 0 : fallback;
    });

    /* forget who owned what, then re-solve from nothing at all */
    Object.keys(edited).forEach(function (k) { delete edited[k]; });
    recompute();

    if (window.history && window.history.replaceState) {
      window.history.replaceState(null, '', window.location.pathname);
    }
  }

  var Gate = (function () {
    var widget = document.querySelector('[data-calculator]');
    var btn = document.querySelector('[data-calc-go]');
    var label = document.querySelector('[data-calc-go-label]');
    var hintText = document.querySelector('[data-calc-hint-text]');
    var status = document.querySelector('[data-calc-status]');
    var PENDING_HINT = 'Enter your values, then press Calculate to see the results.';
    var SHOWN_HINT = 'Results are below. Press Calculate again to clear and start over.';
    var STALE_HINT = 'Values changed — press Calculate to update the results.';
    var state = 'pending';

    var pendingText = document.querySelector('[data-calc-pending-text]');
    var PENDING_BANNER = 'Fill in the values, then press <strong>Calculate</strong> — your results appear below.';
    var STALE_BANNER = 'The values changed. Press <strong>Calculate</strong> to update the results.';

    function paint(next, announce) {
      state = next;
      widget.setAttribute('data-results', next);
      if (label) label.textContent = next === 'shown' ? 'Calculate again' : 'Calculate';
      if (hintText) {
        hintText.textContent = next === 'shown' ? SHOWN_HINT : (next === 'stale' ? STALE_HINT : PENDING_HINT);
        /*
         * The line only appears when it adds something. Before the first press
         * the notice above the form already says "fill in the values, then press
         * Calculate", so a second copy under the button is one of the blank,
         * say-nothing rows the brief asks to be rid of. Once the results are up
         * the line carries news ("press Calculate again to clear"), so it comes
         * back.
         */
        var hintWrap = hintText.closest('[data-calc-hint]');
        if (hintWrap) hintWrap.hidden = next !== 'shown';
      }
      if (pendingText) {
        pendingText.innerHTML = next === 'stale' ? STALE_BANNER : PENDING_BANNER;
      }
      if (next === 'shown' && announce !== false && status) {
        status.textContent = 'Results updated.';
      }
    }

    /*
     * A page can compute an answer and have nowhere to show it: the harvest kept
     * the sentence and dropped the `{{value}}` slot inside it ("Only  days until
     * next December!"), and the variable has no box of its own. The value is
     * sitting in the solver state, invisible.
     *
     * After a successful press, any computed value with a label that appears
     * nowhere — no result row, no filled box, no sentence carrying the number —
     * is listed under the results as a plain row. It is the number the visitor
     * asked for, said plainly, and it is why pages in this class now answer.
     */
    /* `untilDecember` -> `Until December`: a readable name for a value that has
       no field of its own, so its row is not labelled with a variable name. */
    function humanLabel(name) {
      var words = String(name || '')
        .replace(/([a-z0-9])([A-Z])/g, '$1 $2')
        .replace(/[_-]+/g, ' ')
        .trim()
        .toLowerCase();
      if (!words) return '';
      return words.split(' ').map(function (w) {
        return w ? w.charAt(0).toUpperCase() + w.slice(1) : w;
      }).join(' ');
    }

    function revealUnshown(st, panelEl) {
      var panel = panelEl;
      if (!panel || !st || !st.values) return;
      var texts = '';
      formulas.forEach(function (t) { if (t.getBoundingClientRect().height > 2) texts += ' ' + (t.textContent || ''); });
      var shownText = function (name) {
        var f = DEF.fields && DEF.fields[name];
        var label = f && (f.label || '');
        if (label && texts.indexOf(label) >= 0) return true;
        var v = st.values[name];
        if (typeof v === 'number' && isFinite(v)) {
          var plain = String(Math.round(v * 1e6) / 1e6);
          if (texts.indexOf(plain) >= 0) return true;
        }
        return false;
      };
      var extra = panel.querySelector('[data-extra-results]');
      var wanted = [];
      Object.keys(st.values).forEach(function (name) {
        if (!st.computed[name] || (st.placeholder && st.placeholder[name])) return;
        var field = widget.querySelector('.calc-field[data-var="' + name + '"]');
        if (field && !field.hidden && field.getAttribute('data-output') !== '1') {
          var box = field.querySelector('input[data-var]');
          if (box && String(box.value || '').trim() !== '') return;   // already in a box
        }
        var row = panel.querySelector('[data-result-row="' + name + '"]');
        if (row && !row.hidden) return;
        var f = (DEF.fields && DEF.fields[name]) || {};
        /*
         * A name whose last word is `eq`, `msg`, `err` or `idx` is bookkeeping,
         * not an answer: pages built around a message renderer keep the index of
         * the sentence to show in a variable of their own (`bin1_too_long_eq`),
         * and printing "Bin1 Too Long Eq 4" under the results tells the visitor
         * nothing about their division. Those stay in the state.
         */
        if (/(^|_)(eq|msg|message|err|error|idx|index)$/i.test(String(name))) return;
        /*
         * A numbered family (`formattedResult0`, `formattedResult1`, …) is the
         * page's own way of publishing one answer in pieces; when the un-numbered
         * name is itself on the page, the pieces must not each get a row after it.
         */
        var stem = String(name).replace(/\d+$/, '');
        if (stem !== name && (DEF.vars[stem] || (DEF.fields && DEF.fields[stem]))) return;
        var label = String(f.label || '').trim() || humanLabel(name);
        if (!label) return;
        if (shownText(name)) return;                                  // already in the prose
        var value = st.values[name];
        /*
         * A sentence is an answer too. Eleven pages reply in words — "129 is not
         * a binary number", "this pair cannot be subtracted" — and the string
         * sitting in the state with no box to hold it is the only explanation
         * the visitor would get. Mark-up is stripped: the rows are plain text.
         */
        if (typeof value === 'string') {
          var words = value.replace(/<[^>]*>/g, ' ').replace(/\s+/g, ' ').trim();
          if (!words || words.length > 240) return;
          wanted.push({ name: name, label: label, text: words });
          return;
        }
        if (typeof value !== 'number' || !isFinite(value)) return;
        var dtype = f.datetype || (DEF.vars[name] && DEF.vars[name].type);
        var text = (dtype === 'date' || dtype === 'datetime' || dtype === 'time')
          ? msToDate(value, dtype)
          : plainNumber(toDisplay(value, f.unitKey, currentUnit(name)), null, 'omni', false);
        if (text === '') return;
        wanted.push({ name: name, label: label, text: text });
      });
      if (!extra) {
        extra = document.createElement('div');
        extra.setAttribute('data-extra-results', '');
        extra.className = 'calc-extra-results';
        panel.appendChild(extra);
      }
      extra.innerHTML = '';
      if (!wanted.length || wanted.length > 8) { extra.hidden = true; return; }
      extra.hidden = false;
      /* an answer is on screen now, so the "the answers appear here" prompt
         must go: leaving it under a filled row reads as a broken page */
      panel.classList.remove('is-empty');
      var hint = panel.querySelector('[data-results-empty]');
      if (hint) { hint.textContent = ''; }
      var ul = document.createElement('ul');
      ul.className = 'calc-result-list calc-result-list--extra';
      wanted.forEach(function (item) {
        var li = document.createElement('li');
        li.className = 'calc-result';
        li.setAttribute('data-extra-row', item.name);
        var label = document.createElement('span');
        label.className = 'calc-result-label';
        label.textContent = item.label;
        var value = document.createElement('span');
        value.className = 'calc-result-value';
        value.textContent = item.text;
        li.appendChild(label);
        li.appendChild(value);
        ul.appendChild(li);
      });
      extra.appendChild(ul);
    }

    function resultsPanel() {
      return widget.querySelector('[data-calc-results]');
    }

    function reveal() {
      /*
       * Once the results are up, the button's job changes: it puts the widget
       * back to the state a first-time visitor sees — empty boxes, no numbers,
       * no shared-link state — and the next press calculates again.
       */
      if (state === 'shown') {
        resetAll();
        if (Results) Results.render();
        paint('pending');
        if (status) status.textContent = 'Cleared. Enter your values and press Calculate.';
        return;
      }
      /* Nothing is revealed while a field it needs is empty or unusable. */
      var check = validateForm();
      if (check.problems.length) {
        paintSolved = false;
        recompute();
        paint('pending');
        if (status) {
          status.textContent = check.problems.length === 1
            ? check.problems[0] + '.'
            : check.problems.length + ' fields need attention: ' + check.problems.join('; ') + '.';
        }
        if (check.firstBad) {
          var bad = check.firstBad.querySelector('.calc-input');
          if (bad) bad.focus({ preventScroll: true });
        }
        return;
      }

      /*
       * Nothing typed, nothing chosen: there is no question to answer yet.
       * Without this the hidden givens in a definition produce a row and the
       * panel claims a result on an untouched form.
       */
      if (!formSupplied()) {
        paintSolved = false;
        recompute();
        paint('pending');
        var marked = 0;
        inputs.forEach(function (inp) {
          var field = inp.closest('.calc-field');
          if (!field || field.hidden || inp.readOnly) return;
          if (field.getAttribute('data-output') === '1' || inp.closest('[data-calc-results]')) return;
          if (String(inp.value || '').trim() !== '') return;
          setFieldError(field, 'Required — enter a value to calculate.');
          marked++;
        });
        if (status) {
          status.textContent = marked
            ? (marked === 1
              ? 'One field still needs a value — it is marked Required below, under its box.'
              : marked + ' fields still need a value — they are marked Required below, under their boxes.')
            : 'Enter a value above, then press Calculate.';
        }
        var firstBlank = widget.querySelector('.calc-field.has-error .calc-input');
        if (firstBlank) firstBlank.focus({ preventScroll: true });
        return;
      }

      /* solve, then paint: the solved values only reach the page here */
      paintSolved = true;
      recompute();
      if (Results) Results.render();
      var panel = resultsPanel();
      /*
       * "Has anything actually appeared?" rather than "is the list empty": a
       * page whose answer lives in the form, or whose rows are all still blank,
       * must not report itself as answered. One rule covers both shapes.
       */
      /*
       * A solved row counts as an answer even when it is painted as a sentence
       * ("the greatest common factor is 10") rather than as a box: the solver
       * knows which variables it derived, so ask it instead of reading the DOM.
       */
      var shownValues = 0;
      if (lastState && lastState.computed) {
        Object.keys(lastState.computed).forEach(function (name) {
          if (!lastState.computed[name]) return;
          if (lastState.placeholder && lastState.placeholder[name]) return;
          /* An internal helper that neither has a box nor appears in a sentence
             is not an answer: the visitor cannot see it anywhere. */
          if (!(DEF.fields && DEF.fields[name]) && !shownInText(name)) return;
          shownValues++;
        });
      }
      /*
       * A sentence can be the answer. On a page that answers in words — a bed
       * size, a dress size — nothing is "computed" in the numeric sense; what
       * appeared is a conditional line whose condition now holds. The render
       * pass counted those for us; asking the DOM here would always say zero,
       * because these lines stay hidden until the press succeeds.
       */
      shownValues += lastSentenceCount;
      /*
       * A page script's output is an answer too — a table of per-group shares,
       * a frequency list. Without this a page whose whole reply is that table
       * counted as "nothing appeared" and was pushed back to the pending banner.
       */
      var scriptHost = widget.querySelector('[data-script-output]');
      if (scriptHost && scriptHost.textContent.trim() !== '') shownValues++;
      [].slice.call(widget.querySelectorAll('.calc-input-wrap.is-computed input')).forEach(function (i) {
        if (String(i.value || '').trim() !== '' && !i.closest('[hidden]')) shownValues++;
      });
      if (panel) {
        [].slice.call(panel.querySelectorAll('[data-result-row]')).forEach(function (row) {
          if (row.hidden) return;
          var i = row.querySelector('input[data-var]');
          if (i && String(i.value || '').trim() !== '') shownValues++;
        });
      }
      if (shownValues === 0) {
        /*
         * Some calculators have no separate result list: every box is an
         * equivalent input (46 time zones, ten truth-table variables) and the
         * ones the visitor did not type into are solved in place. An empty
         * panel then means "nothing to list", not "nothing to show" — the
         * answers are sitting in the form, masked, so the press has to unmask
         * them. Without this the visitor pressed Calculate and saw nothing at
         * all (/conversion/unix-time).
         */
        var solvedInPlace = widget.querySelectorAll('.calc-input-wrap.is-computed');
        /*
         * A value the solver worked out but the page has nowhere to print — no
         * result row, no filled box, no sentence carrying the number — is still
         * the answer to the question (two dates give a countdown in years, days
         * and hours; none of those variables has a box). Give it a row here,
         * before deciding the press failed, or the visitor is told there is
         * nothing left to work out while the countdown sits in the state.
         */
        var homeless = 0;
        if (!solvedInPlace.length && lastState) {
          revealUnshown(lastState, panel);
          if (panel) homeless = panel.querySelectorAll('[data-extra-results] li').length;
        }
        if (!solvedInPlace.length && !homeless) {
          /*
           * The press failed, so the gate goes back up: what was solved must not
           * stay on the page while the visitor fixes the form. Without this a
           * failed Calculate left the widget painting live values again.
           */
          paintSolved = false;
          recompute();
          paint('pending');
          /*
           * Nothing to show, so say what is missing: every empty box that the
           * calculator needs gets a "Required" note under it, and the first one
           * takes focus. An empty panel with no explanation is the thing the
           * brief calls out.
           */
          var named = 0, blanks = 0;
          var fams = filledFamilies();
          var emptyDerivable = 0, emptyOutputs = 0;
          var unresolved = 0;
          if (lastState && lastState.known) {
            Object.keys(DEF.vars || {}).forEach(function (nm) {
              if (lastState.known[nm]) return;                       // settled
              if (DEF.fields && DEF.fields[nm]) return;              // has a box: handled above
              if (lastState.placeholder && lastState.placeholder[nm]) return;
              unresolved++;
            });
          }
          inputs.forEach(function (inp) {
            var field = inp.closest('.calc-field');
            if (!field || field.hidden || inp.readOnly) return;
            /*
             * A result box that the solver left empty is the reason the visitor
             * is looking at a pending panel. Count it before returning, or the
             * fall-through message below tells them every field already holds a
             * value while an empty box sits in front of them.
             */
            if (field.getAttribute('data-output') === '1' || inp.closest('[data-calc-results]')) {
              if (String(inp.value || '').trim() === '') emptyOutputs++;
              return;
            }
            if (DERIVABLE[inp.getAttribute('data-var')]) {
              /* Nothing typed anywhere and this box could be worked out from
                 the others — which are empty too. Counted so the page can say
                 "fill in any one" instead of "every field already has a value",
                 which was a plain lie on a form nobody had touched. */
              if (String(inp.value || '').trim() === '') emptyDerivable++;
              return;
            }
            if (String(inp.value || '').trim() !== '') return;
            /* a numbered list keeps its other boxes optional once one is filled */
            var famName = slotFamily(inp.getAttribute('data-var'));
            if (famName && (fams[famName] || fams.__any__)) return;
            blanks++;
            setFieldError(field, 'Required — enter a value to calculate.');
            named++;
          });
          /*
           * A row of radios is a box too, and an unanswered one used to slip
           * through: every radio carries a value in its markup, so the loop
           * above never saw an empty one and the form failed with no note
           * anywhere near the choice. Name it here.
           */
          widget.querySelectorAll('.calc-field--choice').forEach(function (field) {
            if (field.hidden || field.closest('[data-calc-results]')) return;
            if (field.getAttribute('data-output') === '1') return;
            var group = field.querySelectorAll('input[type="radio"]');
            if (!group.length) return;
            var answered = false;
            group.forEach(function (r) { if (r.checked) answered = true; });
            if (answered) return;
            setFieldError(field, 'Required — choose one of these options to calculate.');
            named++;
          });
          if (status) {
            status.textContent = named === 1
              ? 'One field still needs a value — it is marked Required below, under its box.'
              : named
                ? named + ' fields still need a value — they are marked Required below, under their boxes.'
                : emptyDerivable
                  ? 'Fill in any one of the boxes above — the rest are worked out from it.'
                : blanks
                  ? 'The values so far are not enough — fill in the remaining fields and press Calculate.'
                : (emptyOutputs && lastState && lastState.overflow && Object.keys(lastState.overflow).length)
                  ? 'Those numbers are too large for this formula to work out — try smaller values or a smaller unit.'
                : unresolved
                  /* Variables the page has to work out and could not: the
                     numbers are in, the formulas did not resolve. Saying "every
                     field already has a value" here was true and useless. */
                  ? 'None of the results could be worked out from these values — check them and press Calculate again.'
                : emptyOutputs
                  ? 'The values entered do not settle the remaining boxes — check them, or clear one so it is worked out from the others.'
                  /*
                   * Nothing is empty and nothing was solved: every box the page
                   * shows already holds a value, so the form is over-specified
                   * and there is no unknown left to work out. Say that, rather
                   * than blaming fields the visitor has already filled.
                   */
                  : 'Every field already has a value, so there is nothing left to work out — clear one of the boxes above and press Calculate again.';
          }
          var firstEmpty = widget.querySelector('.calc-field.has-error .calc-input');
          if (firstEmpty) firstEmpty.focus({ preventScroll: true });
          return;
        }
        // Say where the answers are, instead of leaving "the results appear
        // here" under a panel that will never hold any.
        var nowhere = panel.querySelector('[data-results-empty]');
        if (nowhere) {
          nowhere.innerHTML = 'This one works both ways — the answers are in the fields above. ' +
            'Edit any of them and press <strong>Calculate</strong> again.';
        }
      }
      revealUnshown(lastState, panel);
      paint('shown');
      /*
       * Bring the results into view when the press produced them out of sight.
       * This used to run on phones only, which left the desktop case the one
       * that actually broke: a form tall enough to push the panel below the
       * fold answered with numbers the visitor could not see. Now every width
       * checks, and only scrolls when the panel is genuinely off screen or
       * buried under the sticky header.
       */
      if (panel) {
        var r = panel.getBoundingClientRect();
        var head = 0;
        var siteHeader = document.querySelector('.site-header');
        if (siteHeader) head = siteHeader.getBoundingClientRect().height || 0;
        var clear = Math.max(72, Math.round(head) + 18);
        if (r.top < clear - 4 || r.bottom > window.innerHeight + 4) {
          window.scrollTo({
            top: window.scrollY + r.top - clear - 8,
            behavior: 'smooth'
          });
        }
      }
    }

    // A shared link or a bookmark that already carries values opens with the
    // results visible: the visitor has clearly asked for a calculation.
    var shared = false;
    try {
      var q = new URLSearchParams(window.location.search);
      inputs.forEach(function (inp) {
        if (shared) return;
        if (q.has(inp.getAttribute('data-var'))) shared = true;
      });
      if (!shared) {
        radios.forEach(function (r) { if (q.has(r.name)) shared = true; });
      }
    } catch (e) { shared = false; }

    if (btn) {
      btn.addEventListener('click', function () { reveal(); });
    }
    /* Enter inside a text field calculates instead of doing nothing — the
       button is the only way to get results, so the obvious key has to work. */
    inputs.forEach(function (inp) {
      inp.addEventListener('keydown', function (ev) {
        if (ev.key === 'Enter') {
          ev.preventDefault();
          reveal();
          inp.blur();
        }
      });
    });

    if (!btn) {
      /* A retired calculator has a single notice block and no fields: there is
         nothing to hold back, and hiding the panel would leave an empty page. */
      widget.removeAttribute('data-results');
      state = 'shown';
      return { reveal: function () {}, markStale: function () {}, isShown: function () { return true; },
               state: function () { return 'shown'; }, hasButton: false };
    }
    paint('pending', false);
    if (shared) {
      if (Results) Results.render();
      paint('shown', false);
    }
    return {
      reveal: reveal,
      markStale: function () {
        if (state === 'shown') paint('stale');
      },
      isShown: function () { return state === 'shown'; },
      state: function () { return state; },
      hasButton: !!btn
    };
  })();

  // Page script: load the vendored mathjs first, then evaluate it and re-solve
  // so script-driven calculators produce their first result on load.
  //
  // The path was written as a root-absolute string, so on the deployed site —
  // which lives in /tool — every script-driven calculator asked for
  // /assets/js/vendor/math.min.js, got a 404, and ran with `mathjs` set to null.
  // 2111 pages load this file; 358 calculators call mathjs.* inside their
  // scripts. Everything else on the site resolves through window.BASE_PATH, so
  // this does too, and derives the directory from its own <script> tag if the
  // global is ever missing (a cached copy of an older layout, say).
  function vendorBase() {
    if (window.CALC_ASSET_BASE) return window.CALC_ASSET_BASE;
    var me = document.currentScript || document.querySelector('script[src*="calc.js"]');
    var src = me ? (me.getAttribute('src') || '') : '';
    if (src.indexOf('calc.js') !== -1) {
      return src.replace(/calc\.js(\?.*)?$/, 'vendor/');
    }
    return (window.BASE_PATH || '') + '/assets/js/vendor/';
  }

  function bootScript() {
    if (!DEF.js) { recompute(null); return; }
    if (window.math) { initScript(DEF.js); recompute(null); return; }
    var tag = document.createElement('script');
    tag.src = vendorBase() + 'math.min.js';
    tag.async = true;
    tag.onload = function () { initScript(DEF.js); recompute(null); };
    tag.onerror = function () { SCRIPT.failed = true; recompute(null); };
    document.head.appendChild(tag);
  }
  bootScript();

  // Test hook: lets the regression suite assert on the solver directly.
  // Harmless in production — it exposes no data the page does not already have.
  window.__calc = {
    readState: readState,
    solve: solve,
    toBase: toBase,
    toDisplay: toDisplay,
    parse: parseNumber,
    format: formatNumber,
    def: DEF,
    script: SCRIPT,
    gate: Gate,
    renderTexts: renderFormulas,
    cond: conditionHolds,
    supplied: formSupplied,
    /* the last solve, for the probes: which values came out, which are still
       unknown, which ones the formulas could not finish */
    last: function () { return lastState; }
  };
})();
