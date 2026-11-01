/*
 * Shared helpers for the hand-written repairs in data/calc/supplement/.
 *
 * Every supplement script is evaluated in its own closed scope, so anything the
 * repairs have in common has to travel with each one. Supplement::apply()
 * prepends this file to every page script it merges.
 */

/**
 * The numbers in one free-text box: "1, 2, 3", "1 2 3", "1;2;3" or one per line.
 *
 * A statistics page that asked for fifty separate boxes now asks for one, and
 * the visitor types a list the way they would in a spreadsheet cell. Anything
 * that is not a number is ignored rather than turned into NaN — a stray comma
 * or an accidental letter must not poison the whole set.
 */
function snumlist(text) {
  if (typeof text !== 'string' || text.trim() === '') return [];
  var out = [];
  text.split(/[\s,;]+/).forEach(function (piece) {
    if (piece === '') return;
    var n = Number(piece.replace(/(\d),(?=\d{3}\b)/g, '$1'));
    if (isFinite(n)) out.push(n);
  });
  return out;
}

/** Median of an already sorted array of numbers. */
function smedian(sorted) {
  var n = sorted.length;
  if (!n) return NaN;
  var mid = Math.floor(n / 2);
  return n % 2 ? sorted[mid] : (sorted[mid - 1] + sorted[mid]) / 2;
}

/** The numbers a visitor actually typed, in field order, skipping blanks. */
function snumbers(values, pattern, limit) {
  var out = [];
  for (var i = 1; i <= limit; i++) {
    var key = pattern.replace('%d', i);
    var raw = values[key];
    if (raw === undefined || raw === null || raw === '') continue;
    var n = Number(raw);
    if (!isFinite(n)) continue;
    out.push({ key: key, n: n });
  }
  return out;
}

/** A plain number, no trailing zeros, at most `d` decimals. */
function snum(n, d) {
  if (!isFinite(n)) return '—';
  var v = Number(n.toFixed(d === undefined ? 4 : d));
  return String(v);
}

/** Round to `d` decimals but keep it a number. */
function sround(n, d) {
  var f = Math.pow(10, d === undefined ? 2 : d);
  return Math.round(n * f) / f;
}

/** Greatest common divisor of two whole numbers. */
function sgcd(x, y) {
  x = Math.abs(Math.round(x));
  y = Math.abs(Math.round(y));
  return y === 0 ? x : sgcd(y, x % y);
}

/** "10" / "1/3" — a fraction reduced to lowest terms. */
function sfrac(part, whole) {
  if (!whole) return '—';
  var a = Math.round(part), b = Math.round(whole);
  var g = sgcd(a, b) || 1;
  if (g > 1) { a = a / g; b = b / g; }
  return b === 1 ? String(a) : a + '/' + b;
}

/** Minimal escape for text that came out of the definition or a label. */
function sesc(s) {
  return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
}

/**
 * A table from a header list and rows of cells. Cells are printed as they are
 * given, so a caller can pass a pre-formatted string.
 */
function stable(head, rows, foot) {
  var html = '<table><thead><tr>';
  head.forEach(function (h) { html += '<th>' + h + '</th>'; });
  html += '</tr></thead><tbody>';
  rows.forEach(function (r) {
    html += '<tr>';
    r.forEach(function (c) { html += '<td>' + c + '</td>'; });
    html += '</tr>';
  });
  if (foot) {
    html += '<tr>';
    foot.forEach(function (c) { html += '<th>' + c + '</th>'; });
    html += '</tr>';
  }
  return html + '</tbody></table>';
}

/** Turn a list of [label, value] pairs into "A: 3, B: 4" style prose. */
function slist(pairs) {
  return pairs.map(function (p) { return p[0] + ': ' + p[1]; }).join(', ');
}

/**
 * Tidy a value a page script published.
 *
 * The harvested scripts speak the reference site's front-end dialect: `==2==`
 * for a subscript, `**bold**`, `<br>` between lines, and often a trailing
 * comma or a dangling colon left where a second half of a sentence used to
 * follow. Our panel prints the string as plain text, so those markers would
 * land on screen as punctuation soup. This turns them into something readable
 * without changing the value itself.
 */
function sclean(value) {
  var s = value === null || value === undefined ? '' : String(value);
  var sub = {'0': '₀', '1': '₁', '2': '₂', '3': '₃', '4': '₄',
             '5': '₅', '6': '₆', '7': '₇', '8': '₈', '9': '₉'};
  s = s.replace(/==(\d+)==/g, function (all, d) {
    return d.split('').map(function (c) { return sub[c] || c; }).join('');
  });
  /* the same convention for superscripts: "^^+^^" is a charge, "^^2^^" an index */
  var sup = {'0': '⁰', '1': '¹', '2': '²', '3': '³', '4': '⁴',
             '5': '⁵', '6': '⁶', '7': '⁷', '8': '⁸', '9': '⁹',
             '+': '⁺', '-': '⁻'};
  s = s.replace(/\^\^([0-9+-]+)\^\^/g, function (all, d) {
    return d.split('').map(function (c) { return sup[c] || c; }).join('');
  });
  s = s.replace(/\*\*(.+?)\*\*/g, '$1');
  s = s.replace(/<br\s*\/?>/gi, ' ');
  s = s.replace(/<\/(p|div|li)>/gi, ' ');
  s = s.replace(/<[^>]+>/g, '');
  s = s.replace(/&nbsp;/g, ' ').replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&amp;/g, '&');
  /* invisible characters the reference used as "this line is blank": an Arabic
     letter mark, a zero-width space, a byte-order mark. They render as nothing
     and would otherwise keep an empty row looking filled. */
  s = s.replace(/[\u061C\u200B\u200C\u200D\uFEFF\u00AD]/g, '');
  s = s.replace(/\s+/g, ' ').trim();
  s = s.replace(/[,;:\-–—]\s*$/, '').trim();
  return s;
}

/**
 * Turn a drop-down option's id back into its label.
 *
 * Several harvested scripts publish `ctx.getRawInput("…")` of a select, which
 * is the option's uid (`z3nTqAbVhlMSz-B46c7Xk`) and not the words the visitor
 * picked. The uid is in the page markup as an option value or a radio value,
 * so the label is one lookup away.
 */
function sdelabel(value) {
  if (typeof value !== 'string' || !/[A-Za-z0-9_-]{20,28}/.test(value)) { return value; }
  var one = function (id) {
    if (!/^[A-Za-z0-9_-]{20,28}$/.test(id)) { return id; }
    var el = document.querySelector('[value="' + id + '"]');
    if (!el) { return id; }
    if (el.tagName === 'OPTION') { return (el.textContent || '').trim() || id; }
    var lab = el.closest ? el.closest('label') : null;
    return lab ? ((lab.textContent || '').trim() || id) : id;
  };
  /* a published value can be several ids joined by commas ("Possibilities,
     MD4, NTLM"), so map each piece rather than the whole string */
  return value.split(/\s*,\s*/).map(one).join(', ');
}
