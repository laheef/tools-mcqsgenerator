<?php

/**
 * Relative strength index (RSI)
 * /finance/rsi
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Relative strength index (RSI)',
    'meta' => ['title' => 'Relative strength index (RSI) — Formula & Results', 'description' => 'Relative strength index (RSI) works out the missing figure from period (usually 14 days), price 1, price 2, price 3 and price 4. Every figure is computed.', 'h1' => 'Relative strength index (RSI) Calculator', 'updated' => '2026-09-18'],
    'sections' => [
        [
            'title' => 'Closing price of security',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'period', 'label' => 'Period', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p1', 'label' => 'Price 1', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p2', 'label' => 'Price 2', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p3', 'label' => 'Price 3', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p4', 'label' => 'Price 4', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p5', 'label' => 'Price 5', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p6', 'label' => 'Price 6', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p7', 'label' => 'Price 7', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p8', 'label' => 'Price 8', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p9', 'label' => 'Price 9', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p10', 'label' => 'Price 10', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p11', 'label' => 'Price 11', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p12', 'label' => 'Price 12', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p13', 'label' => 'Price 13', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p14', 'label' => 'Price 14', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p15', 'label' => 'Price 15', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p16', 'label' => 'Price 16', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p17', 'label' => 'Price 17', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p18', 'label' => 'Price 18', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p19', 'label' => 'Price 19', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p20', 'label' => 'Price 20', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p21', 'label' => 'Price 21', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p22', 'label' => 'Price 22', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p23', 'label' => 'Price 23', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p24', 'label' => 'Price 24', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p25', 'label' => 'Price 25', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p26', 'label' => 'Price 26', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p27', 'label' => 'Price 27', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p28', 'label' => 'Price 28', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p29', 'label' => 'Price 29', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p30', 'label' => 'Price 30', 'type' => 'number'],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'minNumPrices',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'The period',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'period', 'label' => 'Period (usually 14 days)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p1', 'label' => 'Price 1', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p2', 'label' => 'Price 2', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p3', 'label' => 'Price 3', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p4', 'label' => 'Price 4', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p5', 'label' => 'Price 5', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p6', 'label' => 'Price 6', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p7', 'label' => 'Price 7', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p8', 'label' => 'Price 8', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p9', 'label' => 'Price 9', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p10', 'label' => 'Price 10', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p11', 'label' => 'Price 11', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p12', 'label' => 'Price 12', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p13', 'label' => 'Price 13', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p14', 'label' => 'Price 14', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p15', 'label' => 'Price 15', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p16', 'label' => 'Price 16', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p17', 'label' => 'Price 17', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p18', 'label' => 'Price 18', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p19', 'label' => 'Price 19', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p20', 'label' => 'Price 20', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p21', 'label' => 'Price 21', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p22', 'label' => 'Price 22', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p23', 'label' => 'Price 23', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p24', 'label' => 'Price 24', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p25', 'label' => 'Price 25', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p26', 'label' => 'Price 26', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p27', 'label' => 'Price 27', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p28', 'label' => 'Price 28', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p29', 'label' => 'Price 29', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'p30', 'label' => 'Price 30', 'type' => 'number'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rsi_value',
                            'label' => 'Relative strength index (0 to 100)',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rsi_gain',
                            'label' => 'Average gain over the period',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rsi_loss',
                            'label' => 'Average loss over the period',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rsi_rs',
                            'label' => 'Relative strength (gain ÷ loss)',
                            'type' => 'result',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rsi_signal',
                            'label' => 'Signal (1 = overbought, −1 = oversold, 0 = neither)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
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
    
    function num(name) {
      var el = document.querySelector('input[data-var="' + name + '"]');
      if (!el || String(el.value).trim() === '') { return null; }
      var n = Number(el.value);
      return isFinite(n) ? n : null;
    }
    
    omni.onResult(['period'], function (ctx, v) {
      var period = num('period');
    
      if (period === null || period < 1) {
        ctx.addUnmetCondition('Enter the period — 14 is the usual choice.');
        return;
      }
      if (period > 29) {
        ctx.addUnmetCondition('The form holds 30 prices, so the period can be at most 29.');
        return;
      }
    
      var prices = [], i;
      for (i = 1; i <= period + 1; i++) {
        var p = num('p' + i);
        if (p === null) {
          ctx.addUnmetCondition('Enter price ' + i + ' — a period of ' + period
            + ' needs ' + (period + 1) + ' prices.');
          return;
        }
        prices.push(p);
      }
    
      var gains = 0, losses = 0, rows = [], changes = [];
      for (i = 1; i < prices.length; i++) {
        var change = prices[i] - prices[i - 1];
        changes.push(change);
        if (change > 0) { gains += change; } else { losses -= change; }
        rows.push(['Price ' + (i + 1), snum(prices[i], 4), snum(change, 4)]);
      }
      var avgGain = gains / period;
      var avgLoss = losses / period;
    
      /* Wilder's smoothing, change by change past the first period */
      for (i = period; i < changes.length; i++) {
        var g = changes[i] > 0 ? changes[i] : 0;
        var l = changes[i] < 0 ? -changes[i] : 0;
        avgGain = (avgGain * (period - 1) + g) / period;
        avgLoss = (avgLoss * (period - 1) + l) / period;
      }
    
      var rs = avgLoss === 0 ? Infinity : avgGain / avgLoss;
      var rsi = avgLoss === 0 ? 100 : 100 - 100 / (1 + rs);
      var signal = rsi >= 70 ? 1 : (rsi <= 30 ? -1 : 0);
    
      ctx.exportValue('rsi_value', sround(rsi, 2));
      ctx.exportValue('rsi_gain', sround(avgGain, 4));
      ctx.exportValue('rsi_loss', sround(avgLoss, 4));
      ctx.exportValue('rsi_rs', sround(rs === Infinity ? 0 : rs, 3));
      ctx.exportValue('rsi_signal', signal);
    
      var verdict = signal === 1 ? 'above 70 — usually read as overbought'
        : signal === -1 ? 'below 30 — usually read as oversold'
        : 'between 30 and 70 — no overbought or oversold reading';
    
      ctx.addHtml('<p><strong>An RSI of ' + snum(rsi, 2) + ' over ' + period + ' periods: ' + verdict
        + '.</strong></p>');
    
      ctx.addHtml(stable(['Item', 'Value'], [
        ['Period', String(period)],
        ['Prices used', String(prices.length)],
        ['First price', snum(prices[0], 4)],
        ['Last price', snum(prices[prices.length - 1], 4)],
        ['Net change', snum(prices[prices.length - 1] - prices[0], 4)],
        ['Average gain', snum(avgGain, 4)],
        ['Average loss', snum(avgLoss, 4)],
        ['Relative strength', avgLoss === 0 ? 'infinite (no losing periods)' : snum(rs, 3)],
        ['RSI', snum(rsi, 2)],
        ['Reading', verdict]
      ]));
    
      ctx.addHtml('<p>The prices you entered, and the change each one made:</p>');
      ctx.addHtml(stable(['Price', 'Value', 'Change'], rows));
    
      ctx.addHtml('<p class="calc-unmet">The index measures the size of recent gains against recent losses, '
        + 'not the price itself: a stock that has risen steadily from a low base and one that has fallen '
        + 'steadily from a high one can both sit in the middle of the scale. The first average is a plain '
        + 'mean of the period’s changes; every later change is folded in with Wilder’s smoothing, which '
        + 'gives the newest change a 1/period weight and keeps the rest — that is the original 1978 recipe '
        + 'and the one most charting software draws. A period of 14 is convention; 7 reacts faster and 21 '
        + 'slower. Do not read 70 and 30 as buy and sell instructions: in a strong trend the index can sit '
        + 'above 70 for weeks, and it says nothing about when a move will end. Prices must be in the same '
        + 'series and in time order.</p>');
    });
    TXT,
    'showIf' => [
        'p2' => 'period >= 1',
        'p3' => 'period >= 2',
        'p4' => 'period >= 3',
        'p5' => 'period >= 4',
        'p6' => 'period >= 5',
        'p7' => 'period >= 6',
        'p8' => 'period >= 7',
        'p9' => 'period >= 8',
        'p10' => 'period >= 9',
        'p11' => 'period >= 10',
        'p12' => 'period >= 11',
        'p13' => 'period >= 12',
        'p14' => 'period >= 13',
        'p15' => 'period >= 14',
        'p16' => 'period >= 15',
        'p17' => 'period >= 16',
        'p18' => 'period >= 17',
        'p19' => 'period >= 18',
        'p20' => 'period >= 19',
        'p21' => 'period >= 20',
        'p22' => 'period >= 21',
        'p23' => 'period >= 22',
        'p24' => 'period >= 23',
        'p25' => 'period >= 24',
        'p26' => 'period >= 25',
        'p27' => 'period >= 26',
        'p28' => 'period >= 27',
        'p29' => 'period >= 28',
        'p30' => 'period >= 29',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Relative strength index (RSI) turns Period (usually 14 days), Price 1 and Price 2 into Relative strength index (0 to 100) and Average gain over the period. It is a single relationship that reads relative strength index (0 to 100) out of period (usually 14 days), not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Relative strength index (RSI) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Relative strength index (RSI): it takes 31 numbers and reports Relative strength index (0 to 100), Average gain over the period and Average loss over the period.</p><p>The result panel carries Relative strength index (0 to 100), Average gain over the period, Average loss over the period and Relative strength (gain ÷ loss), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 31 boxes, and nothing else.</p><ul><li><strong>Period (usually 14 days)</strong> — a plain number, no unit</li><li><strong>Price 1</strong> — a plain number, no unit</li><li><strong>Price 2</strong> — a plain number, no unit</li><li><strong>Price 3</strong> — a plain number, no unit</li><li><strong>Price 4</strong> — a plain number, no unit</li><li><strong>Price 5</strong> — a plain number, no unit</li><li><strong>Price 6</strong> — a plain number, no unit</li><li><strong>Price 7</strong> — a plain number, no unit</li><li><strong>Price 8</strong> — a plain number, no unit</li><li><strong>Price 9</strong> — a plain number, no unit</li><li><strong>Price 10</strong> — a plain number, no unit</li><li><strong>Price 11</strong> — a plain number, no unit</li><li><strong>Price 12</strong> — a plain number, no unit</li><li><strong>Price 13</strong> — a plain number, no unit</li><li><strong>Price 14</strong> — a plain number, no unit</li><li><strong>Price 15</strong> — a plain number, no unit</li><li><strong>Price 16</strong> — a plain number, no unit</li><li><strong>Price 17</strong> — a plain number, no unit</li><li><strong>Price 18</strong> — a plain number, no unit</li><li><strong>Price 19</strong> — a plain number, no unit</li><li><strong>Price 20</strong> — a plain number, no unit</li><li><strong>Price 21</strong> — a plain number, no unit</li><li><strong>Price 22</strong> — a plain number, no unit</li><li><strong>Price 23</strong> — a plain number, no unit</li><li><strong>Price 24</strong> — a plain number, no unit</li><li><strong>Price 25</strong> — a plain number, no unit</li><li><strong>Price 26</strong> — a plain number, no unit</li><li><strong>Price 27</strong> — a plain number, no unit</li><li><strong>Price 28</strong> — a plain number, no unit</li><li><strong>Price 29</strong> — a plain number, no unit</li><li><strong>Price 30</strong> — a plain number, no unit</li></ul><p>What you get back is Relative strength index (0 to 100), Average gain over the period, Average loss over the period, Relative strength (gain ÷ loss), Signal (1 = overbought, −1 = oversold, 0 = neither), shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Relative strength index (0 to 100) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Relative strength index (0 to 100), Average gain over the period and Average loss over the period are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Period (usually 14 days) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Period (usually 14 days) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Price 1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Price 1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Price 2 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Price 2 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Period (usually 14 days) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Period (usually 14 days)</strong> takes a plain number with no unit attached. Have it to hand before you start: Period (usually 14 days) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 1</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 2</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 3</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 3 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 4</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 4 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 5</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 5 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 6</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 6 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 7</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 7 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 8</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 8 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 9</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 9 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 10</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 10 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 11</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 11 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 12</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 12 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 13</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 13 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 14</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 14 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 15</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 15 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 16</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 16 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 17</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 17 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 18</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 18 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 19</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 19 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 20</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 20 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 21</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 21 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 22</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 22 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 23</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 23 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 24</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 24 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 25</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 25 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 26</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 26 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 27</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 27 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 28</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 28 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 29</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 29 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Price 30</strong> takes a plain number with no unit attached. Have it to hand before you start: Price 30 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Relative strength index (RSI) is not a single equation with a single answer. It reads Period (usually 14 days), Price 1, Price 2 and Price 3, applies the analysis the page is built around, and reports Relative strength index (0 to 100), Average gain over the period, Average loss over the period and Relative strength (gain ÷ loss).</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Relative strength index (0 to 100), Average gain over the period, Average loss over the period and Relative strength (gain ÷ loss). They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Relative strength index (0 to 100) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Period (usually 14 days), Price 1 and Price 2 and the number you are missing is Relative strength index (0 to 100) and Average gain over the period.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/debt">Debt Calculator</a>, <a href="/finance/debt-consolidation">Debt consolidation</a> and <a href="/finance/debt-payoff">Debt payoff Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Relative strength index (RSI) calculator work out?', 'a' => 'Relative strength index (0 to 100), Average gain over the period, Average loss over the period and Relative strength (gain ÷ loss).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Period (usually 14 days), Price 1, Price 2, Price 3, Price 4. Fill period (usually 14 days), price 1 and price 2 and leave Relative strength index (0 to 100) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Relative strength index (0 to 100) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Relative strength index (0 to 100), so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Relative strength index (0 to 100) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/debt', 'name' => 'Debt Calculator'],
            ['path' => '/finance/debt-consolidation', 'name' => 'Debt consolidation'],
            ['path' => '/finance/debt-payoff', 'name' => 'Debt payoff Calculator'],
        ],
        'authors' => [],
    ],
];
