<?php

/**
 * Economic Injury Disaster Loan Emergency Advance (EIDL)
 * /finance/economic-injury-disaster-loan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Economic Injury Disaster Loan Emergency Advance (EIDL)',
    'meta' => ['title' => 'Economic Injury Disaster Loan Emergency Advance', 'description' => 'Economic Injury Disaster Loan Emergency Advance (EIDL) works out its answer from the values you enter. A worked example follows. Every figure is computed.', 'h1' => 'Economic Injury Disaster Loan Emergency Advance (EIDL) Calculator', 'updated' => '2026-10-01'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [],
        ],
        [
            'title' => 'The business',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'monthly_payroll', 'label' => 'Average monthly payroll ($)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'gross_receipts', 'label' => 'Gross receipts for the reference year ($)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'cogs', 'label' => 'Cost of goods sold for that year ($, 0 if none)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'employees', 'label' => 'Employees on the payroll', 'type' => 'number'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'The loan you are testing',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'rate', 'label' => 'Interest rate (% a year — 3.75 for most small businesses)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'years', 'label' => 'Term in years (30 is the programme standard)', 'type' => 'number'],
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
                            'name' => 'eidl_payroll_max',
                            'label' => 'Limit by payroll (2.5 × monthly payroll)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eidl_revenue_max',
                            'label' => 'Limit by revenue (2 × receipts minus costs)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eidl_max',
                            'label' => 'Loan you can ask for',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eidl_binding',
                            'label' => 'Which limit decided it (1 = payroll, 2 = revenue)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eidl_advance',
                            'label' => 'Emergency advance ($10,000 cap, $1,000 a employee)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eidl_monthly',
                            'label' => 'Monthly payment',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eidl_interest',
                            'label' => 'Interest over the whole term',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eidl_total',
                            'label' => 'Total repaid',
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
    
    var CAP = 2000000;
    
    function num(name) {
      var el = document.querySelector('input[data-var="' + name + '"]');
      if (!el || String(el.value).trim() === '') { return null; }
      var n = Number(el.value);
      return isFinite(n) ? n : null;
    }
    
    function money(x) {
      return '$' + Math.round(x).toLocaleString();
    }
    
    omni.onResult(['monthly_payroll', 'gross_receipts', 'cogs', 'employees', 'rate', 'years'], function (ctx, v) {
      var payroll = num('monthly_payroll');
      var receipts = num('gross_receipts');
      var cogs = num('cogs');
      var employees = num('employees');
      var rate = num('rate');
      var years = num('years');
    
      if (payroll === null || payroll < 0) {
        ctx.addUnmetCondition('Enter the average monthly payroll.');
        return;
      }
      if (receipts === null || receipts < 0) {
        ctx.addUnmetCondition('Enter gross receipts for the reference year.');
        return;
      }
      if (cogs === null) { cogs = 0; }
      if (cogs < 0 || cogs > receipts) {
        ctx.addUnmetCondition('Cost of goods sold cannot be negative or greater than receipts.');
        return;
      }
      if (employees === null || employees < 0) {
        ctx.addUnmetCondition('Enter how many employees there are.');
        return;
      }
      if (rate === null || rate < 0) {
        ctx.addUnmetCondition('Enter the interest rate.');
        return;
      }
      if (years === null || years <= 0) {
        ctx.addUnmetCondition('Enter the term in years.');
        return;
      }
    
      var payrollMax = Math.min(CAP, 2.5 * payroll);
      var revenueMax = Math.min(CAP, 2 * (receipts - cogs));
      var max = Math.min(payrollMax, revenueMax);
      var binding = payrollMax <= revenueMax ? 1 : 2;
      var advance = Math.min(10000, 1000 * employees);
    
      var i = rate / 100 / 12;
      var n = Math.round(years * 12);
      var monthly = i > 0 ? max * i / (1 - Math.pow(1 + i, -n)) : max / n;
      var total = monthly * n;
    
      ctx.exportValue('eidl_payroll_max', Math.round(payrollMax));
      ctx.exportValue('eidl_revenue_max', Math.round(revenueMax));
      ctx.exportValue('eidl_max', Math.round(max));
      ctx.exportValue('eidl_binding', binding);
      ctx.exportValue('eidl_advance', Math.round(advance));
      ctx.exportValue('eidl_monthly', sround(monthly, 2));
      ctx.exportValue('eidl_interest', Math.round(total - max));
      ctx.exportValue('eidl_total', Math.round(total));
    
      var why = binding === 1
        ? 'The payroll route is the tighter one: 2.5 × ' + money(payroll) + ' = ' + money(2.5 * payroll)
        : 'The revenue route is the tighter one: 2 × (' + money(receipts) + ' − ' + money(cogs) + ') = '
          + money(2 * (receipts - cogs));
    
      ctx.addHtml('<p><strong>You could ask for ' + money(max) + ', repayable at ' + money(monthly)
        + ' a month for ' + n + ' months. ' + why + '.</strong></p>');
    
      ctx.addHtml(stable(['Item', 'Value'], [
        ['Average monthly payroll', money(payroll)],
        ['2.5 × monthly payroll', money(2.5 * payroll)],
        ['Gross receipts', money(receipts)],
        ['Cost of goods sold', money(cogs)],
        ['Gross profit', money(receipts - cogs)],
        ['2 × gross profit', money(2 * (receipts - cogs))],
        ['Statutory cap', money(CAP)],
        ['Limit by payroll', money(payrollMax)],
        ['Limit by revenue', money(revenueMax)],
        ['Loan you can ask for', money(max)],
        ['Employees', String(Math.round(employees))],
        ['Emergency advance ($1,000 a employee, $10,000 cap)', money(advance)],
        ['Interest rate', snum(rate, 2) + ' % a year'],
        ['Term', snum(years, 0) + ' years (' + n + ' payments)'],
        ['Monthly payment', money(monthly)],
        ['Total interest', money(total - max)],
        ['Total repaid', money(total)],
        ['Interest as a share of the loan', snum((total - max) / max * 100, 1) + ' %']
      ]));
    
      /* what the same loan looks like over other terms */
      var terms = [10, 15, 20, 30].map(function (y) {
        var k = y * 12;
        var m = i > 0 ? max * i / (1 - Math.pow(1 + i, -k)) : max / k;
        return [y + ' years', money(m), money(m * k - max), money(m * k)];
      });
      ctx.addHtml('<p>The same ' + money(max) + ' at ' + snum(rate, 2) + ' % over other terms:</p>');
      ctx.addHtml(stable(['Term', 'Monthly payment', 'Interest', 'Total repaid'], terms));
    
      ctx.addHtml('<p class="calc-unmet">The two limits are the ones the programme published: 2.5 × average '
        + 'monthly payroll, and 2 × gross receipts less cost of goods sold, both under a $2,000,000 ceiling, '
        + 'with the lower figure governing. Whether a particular business qualifies, and whether it is the '
        + 'payroll figure or the revenue figure that its paperwork supports, is a question for the lender — '
        + 'this is the arithmetic the form behind the application uses. The emergency advance is a grant, not '
        + 'part of the loan, and was only open while funds lasted. Interest accrues from the date of '
        + 'disbursement; the payment above assumes the first instalment falls a month after the money arrives '
        + 'and that every payment is made on time. A deferral, if one is granted, lowers nothing — it moves the '
        + 'same interest to the end.</p>');
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Economic Injury Disaster Loan Emergency Advance (EIDL) takes Average monthly payroll ($), Gross receipts for the reference year ($) and Cost of goods sold for that year ($, 0 if none) and returns Limit by payroll (2.5 × monthly payroll) and Limit by revenue (2 × receipts minus costs). There is no hidden constant here: change limit by payroll (2.5 × monthly payroll) and average monthly payroll ($) moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Economic Injury Disaster Loan Emergency Advance (EIDL) calculator works', 'html' => <<<'TXT'
            <p>Economic Injury Disaster Loan Emergency Advance (EIDL) answers one question from 6 numbers, and the answer is Limit by payroll (2.5 × monthly payroll), Limit by revenue (2 × receipts minus costs) and Loan you can ask for.</p><p>The result panel carries Limit by payroll (2.5 × monthly payroll), Limit by revenue (2 × receipts minus costs), Loan you can ask for and Which limit decided it (1 = payroll, 2 = revenue), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 6 boxes, and nothing else.</p><ul><li><strong>Average monthly payroll ($)</strong> — a plain number, no unit</li><li><strong>Gross receipts for the reference year ($)</strong> — a plain number, no unit</li><li><strong>Cost of goods sold for that year ($, 0 if none)</strong> — a plain number, no unit</li><li><strong>Employees on the payroll</strong> — a plain number, no unit</li><li><strong>Interest rate (% a year — 3.75 for most small businesses)</strong> — a plain number, no unit</li><li><strong>Term in years (30 is the programme standard)</strong> — a plain number, no unit</li></ul><p>What you get back is Limit by payroll (2.5 × monthly payroll), Limit by revenue (2 × receipts minus costs), Loan you can ask for, Which limit decided it (1 = payroll, 2 = revenue), Emergency advance ($10,000 cap, $1,000 a employee), Monthly payment, Interest over the whole term, Total repaid, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Limit by payroll (2.5 × monthly payroll) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Limit by payroll (2.5 × monthly payroll), Limit by revenue (2 × receipts minus costs) and Loan you can ask for are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Average monthly payroll ($) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Average monthly payroll ($) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Gross receipts for the reference year ($) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Gross receipts for the reference year ($) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Cost of goods sold for that year ($, 0 if none) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cost of goods sold for that year ($, 0 if none) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Average monthly payroll ($) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Average monthly payroll ($)</strong> takes a plain number with no unit attached. Have it to hand before you start: Average monthly payroll ($) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Gross receipts for the reference year ($)</strong> takes a plain number with no unit attached. Have it to hand before you start: Gross receipts for the reference year ($) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Cost of goods sold for that year ($, 0 if none)</strong> takes a plain number with no unit attached. Have it to hand before you start: Cost of goods sold for that year ($, 0 if none) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Employees on the payroll</strong> takes a plain number with no unit attached. Have it to hand before you start: Employees on the payroll is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Interest rate (% a year — 3.75 for most small businesses)</strong> takes a plain number with no unit attached. Have it to hand before you start: Interest rate (% a year — 3.75 for most small businesses) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Term in years (30 is the programme standard)</strong> takes a plain number with no unit attached. Have it to hand before you start: Term in years (30 is the programme standard) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Limit by payroll (2.5 × monthly payroll)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Limit by revenue (2 × receipts minus costs)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Loan you can ask for</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Which limit decided it (1 = payroll, 2 = revenue)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Emergency advance ($10,000 cap, $1,000 a employee)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Monthly payment</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Interest over the whole term</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total repaid</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Economic Injury Disaster Loan Emergency Advance (EIDL) is not a single equation with a single answer. It reads Average monthly payroll ($), Gross receipts for the reference year ($), Cost of goods sold for that year ($, 0 if none) and Employees on the payroll, applies the analysis the page is built around, and reports Limit by payroll (2.5 × monthly payroll), Limit by revenue (2 × receipts minus costs), Loan you can ask for and Which limit decided it (1 = payroll, 2 = revenue).</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Limit by payroll (2.5 × monthly payroll), Limit by revenue (2 × receipts minus costs), Loan you can ask for and Which limit decided it (1 = payroll, 2 = revenue). They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Limit by payroll (2.5 × monthly payroll) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Average monthly payroll ($), Gross receipts for the reference year ($) and Cost of goods sold for that year ($, 0 if none) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Average monthly payroll ($), Gross receipts for the reference year ($) and Cost of goods sold for that year ($, 0 if none) is what you already know and Limit by payroll (2.5 × monthly payroll) and Limit by revenue (2 × receipts minus costs) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/put-call-parity">Put-call parity Calculator</a>, <a href="/finance/pvifa">PVIFA</a> and <a href="/finance/quick-ratio">Quick ratio</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Economic Injury Disaster Loan Emergency Advance (EIDL) calculator work out?', 'a' => <<<'TXT'
            Limit by payroll (2.5 × monthly payroll), Limit by revenue (2 × receipts minus costs), Loan you can ask for and Which limit decided it (1 = payroll, 2 = revenue).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Average monthly payroll ($), Gross receipts for the reference year ($), Cost of goods sold for that year ($, 0 if none), Employees on the payroll, Interest rate (% a year — 3.75 for most small businesses). Fill average monthly payroll ($), gross receipts for the reference year ($) and cost of goods sold for that year ($, 0 if none) and leave Limit by payroll (2.5 × monthly payroll) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Limit by payroll (2.5 × monthly payroll) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Limit by payroll (2.5 × monthly payroll), so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Limit by payroll (2.5 × monthly payroll) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/put-call-parity', 'name' => 'Put-call parity Calculator'],
            ['path' => '/finance/pvifa', 'name' => 'PVIFA'],
            ['path' => '/finance/quick-ratio', 'name' => 'Quick ratio'],
        ],
        'authors' => [],
    ],
];
