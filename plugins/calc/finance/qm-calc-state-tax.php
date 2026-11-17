<?php

/**
 * State tax
 * /finance/state-tax
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'State tax',
    'meta' => ['title' => 'State tax Calculator: Formula, Steps & Examples', 'description' => 'State tax works out whichever of where do you live?, taxable income for the year ($) and top marginal state rate (%) is left blank. A worked example follows.', 'h1' => 'State tax Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'state',
                            'label' => 'Where do you live?',
                            'type' => 'select',
                            'options' => [
                                'Alabama' => '1',
                                'Alaska' => '2',
                                'Arizona' => '3',
                                'Arkansas' => '4',
                                'California' => '5',
                                'Colorado' => '6',
                                'Connecticut' => '7',
                                'Delaware' => '8',
                                'Florida' => '9',
                                'Georgia' => '10',
                                'Hawaii' => '11',
                                'Idaho' => '12',
                                'Illinois' => '13',
                                'Indiana' => '14',
                                'Iowa' => '15',
                                'Kansas' => '16',
                                'Kentucky' => '17',
                                'Louisiana' => '18',
                                'Maine' => '19',
                                'Maryland' => '20',
                                'Massachusetts' => '21',
                                'Michigan' => '22',
                                'Minnesota' => '23',
                                'Mississippi' => '24',
                                'Missouri' => '25',
                                'Montana' => '26',
                                'Nebraska' => '27',
                                'Nevada' => '28',
                                'New Hampshire' => '29',
                                'New Jersey' => '30',
                                'New Mexico' => '31',
                                'New York' => '32',
                                'North Carolina' => '33',
                                'North Dakota' => '34',
                                'Ohio' => '35',
                                'Oklahoma' => '36',
                                'Oregon' => '37',
                                'Pennsylvania' => '38',
                                'Rhode Island' => '39',
                                'South Carolina' => '40',
                                'South Dakota' => '41',
                                'Tennessee' => '42',
                                'Texas' => '43',
                                'Utah' => '44',
                                'Vermont' => '45',
                                'Virginia' => '46',
                                'Washington' => '47',
                                'West Virginia' => '48',
                                'Wisconsin' => '49',
                                'Wyoming' => '50',
                                'Washington, D.C.' => '51',
                            ],
                            'dataset' => 'state',
                            'control' => 'DROPDOWN',
                            'default' => 'Alabama',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Your income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'income', 'label' => 'Taxable income for the year ($)', 'type' => 'number'],
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
                            'name' => 'st_rate',
                            'label' => 'Top marginal state rate (%)',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'st_tax',
                            'label' => 'State tax at that rate ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'st_share',
                            'label' => 'Share of income (%)',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'st_take_home',
                            'label' => 'Left after state tax ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'st_rank',
                            'label' => 'Rank of the rate among the 51 (1 = highest)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'st_taxes',
                            'label' => 'State taxes wage income (1 = yes, 0 = no)',
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
    "use strict";//# sourceURL=customJs.js
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
    
    /* top marginal rate for a single filer, 2024 tax year; 0 = no tax on wages */
    var STATES = {
      'Alabama': 5.00, 'Alaska': 0, 'Arizona': 2.50, 'Arkansas': 4.40, 'California': 13.30,
      'Colorado': 4.40, 'Connecticut': 6.99, 'Delaware': 6.60, 'District of Columbia': 10.75,
      'Florida': 0, 'Georgia': 5.39, 'Hawaii': 11.00, 'Idaho': 5.695, 'Illinois': 4.95,
      'Indiana': 3.05, 'Iowa': 5.70, 'Kansas': 5.70, 'Kentucky': 4.00, 'Louisiana': 4.25,
      'Maine': 7.15, 'Maryland': 5.75, 'Massachusetts': 5.00, 'Michigan': 4.25, 'Minnesota': 9.85,
      'Mississippi': 4.70, 'Missouri': 4.80, 'Montana': 5.90, 'Nebraska': 5.84, 'Nevada': 0,
      'New Hampshire': 0, 'New Jersey': 10.75, 'New Mexico': 5.90, 'New York': 10.90,
      'North Carolina': 4.50, 'North Dakota': 2.50, 'Ohio': 3.50, 'Oklahoma': 4.75, 'Oregon': 9.90,
      'Pennsylvania': 3.07, 'Rhode Island': 5.99, 'South Carolina': 6.20, 'South Dakota': 0,
      'Tennessee': 0, 'Texas': 0, 'Utah': 4.55, 'Vermont': 8.75, 'Virginia': 5.75,
      'Washington': 0, 'West Virginia': 4.82, 'Wisconsin': 7.65, 'Wyoming': 0
    };
    
    function num(name) {
      var el = document.querySelector('input[data-var="' + name + '"]');
      if (!el || String(el.value).trim() === '') { return null; }
      var n = Number(el.value);
      return isFinite(n) ? n : null;
    }
    
    function chosenState() {
      var sel = document.querySelector('select[data-var="state"]');
      if (!sel || sel.selectedIndex < 0) { return ''; }
      var opt = sel.options[sel.selectedIndex];
      if (!opt || !opt.value) { return ''; }
      return (opt.text || '').replace(/\s+/g, ' ').trim();
    }
    
    function money(x) { return '$' + Math.round(x).toLocaleString(); }
    
    omni.onResult(['income'], function (ctx, v) {
      var income = num('income');
      var state = chosenState();
    
      if (income === null || income < 0) {
        ctx.addUnmetCondition('Enter your income for the year.');
        return;
      }
      if (state === '') {
        ctx.addUnmetCondition('Choose the state you live in.');
        return;
      }
      var rate = STATES[state];
      if (rate === undefined) {
        ctx.addUnmetCondition('That state is not in the table — pick one of the fifty.');
        return;
      }
    
      var tax = income * rate / 100;
      var names = Object.keys(STATES);
      var higher = 0;
      for (var i = 0; i < names.length; i++) {
        if (STATES[names[i]] > rate) { higher++; }
      }
      var rank = higher + 1;
    
      ctx.exportValue('st_rate', sround(rate, 2));
      ctx.exportValue('st_tax', Math.round(tax));
      ctx.exportValue('st_share', sround(income > 0 ? tax / income * 100 : 0, 2));
      ctx.exportValue('st_take_home', Math.round(income - tax));
      ctx.exportValue('st_rank', rank);
      ctx.exportValue('st_taxes', rate > 0 ? 1 : 0);
    
      if (rate === 0) {
        ctx.addHtml('<p><strong>' + state + ' does not tax wage income, so a salary of ' + money(income)
          + ' pays no state income tax. Federal tax, sales tax and property tax still apply.</strong></p>');
      } else {
        ctx.addHtml('<p><strong>' + state + '’s top rate is ' + snum(rate, 2) + ' %. Charged on the whole of '
          + money(income) + ' that would be ' + money(tax) + ' — ' + snum(tax / income * 100, 2)
          + ' % of the income. For a progressive state that figure is a ceiling, not a bill.</strong></p>');
      }
    
      ctx.addHtml(stable(['Item', 'Value'], [
        ['State', state],
        ['Income', money(income)],
        ['Top marginal rate', snum(rate, 2) + ' %'],
        ['Rank of that rate (1 = highest)', String(rank) + ' of ' + names.length],
        ['Tax if the whole income were taxed at the top rate', money(tax)],
        ['Share of income', (income > 0 ? snum(tax / income * 100, 2) : '0') + ' %'],
        ['Left after that', money(income - tax)],
        ['States that charge nothing', '9 (Alaska, Florida, Nevada, New Hampshire, South Dakota, '
          + 'Tennessee, Texas, Washington, Wyoming)'],
        ['Highest top rate', 'California, 13.30 %'],
        ['Lowest non-zero top rate', 'North Dakota, 2.50 %']
      ]));
    
      /* the same income in the states at either end of the table */
      var sorted = names.slice().sort(function (a, b) { return STATES[b] - STATES[a]; });
      var picks = sorted.slice(0, 3).concat([state], sorted.slice(-3));
      var rows = [], seen = {};
      for (var k = 0; k < picks.length; k++) {
        var nm = picks[k];
        if (seen[nm]) { continue; }
        seen[nm] = true;
        rows.push([nm, snum(STATES[nm], 2) + ' %', money(income * STATES[nm] / 100)]);
      }
      ctx.addHtml('<p>The highest, the lowest and yours, on ' + money(income) + ':</p>');
      ctx.addHtml(stable(['State', 'Top rate', 'At that rate'], rows));
    
      ctx.addHtml('<p class="calc-unmet">One number per state cannot be a tax return. The figure above is the '
        + 'top marginal rate — the rate charged on the last slice of a large income — applied to the whole '
        + 'income, which overstates the bill in every state that uses brackets: New York charges 10.9 % only '
        + 'above roughly $25 million of taxable income, and a New Yorker on $100,000 pays an effective rate '
        + 'nearer 5 %. Flat-rate states are much closer, but even they subtract a standard deduction and grant '
        + 'credits before the rate applies. Nine states charge nothing on wages, though New Hampshire taxed '
        + 'interest and dividends until 2025 and Washington has a capital-gains tax. Rates are set yearly by '
        + 'each legislature, so treat the table as the 2024 position and check the state’s own instructions '
        + 'before relying on a number. Local income taxes — city and county, which matter in New York City, '
        + 'Philadelphia and Ohio — are not in the table at all.</p>');
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        State tax takes Where do you live? and Taxable income for the year ($) and returns Top marginal state rate (%) and State tax at that rate ($). The arithmetic is the whole method: top marginal state rate (%) is worked out from where do you live? by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the State tax calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind State tax: it takes 2 numbers and reports Top marginal state rate (%), State tax at that rate ($) and Share of income (%).</p><p>What comes back is Top marginal state rate (%), State tax at that rate ($), Share of income (%) and Left after state tax ($) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Where do you live?</strong> — a plain number, no unit</li><li><strong>Taxable income for the year ($)</strong> — a plain number, no unit</li></ul><p>What you get back is Top marginal state rate (%), State tax at that rate ($), Share of income (%), Left after state tax ($), Rank of the rate among the 51 (1 = highest), State taxes wage income (1 = yes, 0 = no), shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Top marginal state rate (%) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Top marginal state rate (%), State tax at that rate ($) and Share of income (%) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Where do you live? left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Where do you live? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Taxable income for the year ($) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Taxable income for the year ($) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Where do you live? to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the State tax form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Where do you live?</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Where do you live? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Taxable income for the year ($)</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Taxable income for the year ($) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 6 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Top marginal state rate (%)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>State tax at that rate ($)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Share of income (%)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Left after state tax ($)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Rank of the rate among the 51 (1 = highest)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>State taxes wage income (1 = yes, 0 = no)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes State tax, works through it, and the panel lists Where do you live? and Taxable income for the year ($).</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is Top marginal state rate (%), State tax at that rate ($), Share of income (%) and Left after state tax ($) — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Where do you live? and Taxable income for the year ($) ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Where do you live? — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Top marginal state rate (%) against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Top marginal state rate (%) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Where do you live? and Taxable income for the year ($) measured, Top marginal state rate (%) and State tax at that rate ($) wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/stimulus-check-heals">Stimulus check - HEALS Act Calculator</a>, <a href="/finance/stimulus-payment">Stimulus payment Calculator</a> and <a href="/finance/stock-average">Stock average Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>State tax is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the State tax calculator work out?', 'a' => 'Top marginal state rate (%), State tax at that rate ($), Share of income (%) and Left after state tax ($).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Where do you live?, Taxable income for the year ($). Fill where do you live? and taxable income for the year ($) and leave Top marginal state rate (%) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Top marginal state rate (%) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Top marginal state rate (%) is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Top marginal state rate (%) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/stimulus-check-heals', 'name' => 'Stimulus check - HEALS Act Calculator'],
            ['path' => '/finance/stimulus-payment', 'name' => 'Stimulus payment Calculator'],
            ['path' => '/finance/stock-average', 'name' => 'Stock average Calculator'],
        ],
        'authors' => [],
    ],
];
