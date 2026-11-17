<?php

/**
 * Student Loan Repayment - Covid
 * /finance/student-loan-repayment-us
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Student Loan Repayment - Covid',
    'meta' => ['title' => 'Student Loan Repayment - Covid — Formula & Results', 'description' => 'Student Loan Repayment - Covid works out its answer from the values you enter. Any box can be the unknown. The formula is printed in the form\'s own words.', 'h1' => 'Student Loan Repayment - Covid Calculator', 'updated' => '2026-10-01'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [],
        ],
        [
            'title' => 'The loan',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'loan_balance', 'label' => 'Balance owed ($)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'loan_rate', 'label' => 'Interest rate (% a year)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'loan_years', 'label' => 'Term of the plan (years)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'loan_extra', 'label' => 'Extra paid each month ($, 0 for none)', 'type' => 'number'],
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
                            'name' => 'sloan_payment',
                            'label' => 'Scheduled monthly payment ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sloan_interest',
                            'label' => 'Interest over the plan ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sloan_total',
                            'label' => 'Total paid over the plan ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sloan_months',
                            'label' => 'Months to clear the balance with the extra',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sloan_saved',
                            'label' => 'Interest saved by the extra ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'sloan_payoff', 'label' => 'Date the balance clears', 'type' => 'date'],
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
    
    function money(x) { return '$' + Math.round(x).toLocaleString(); }
    
    /* total interest when paying `payment` a month, paying off exactly at the end */
    function schedule(balance, monthlyRate, payment, cap) {
      var b = balance, interest = 0, months = 0;
      while (b > 0 && months < cap) {
        var due = b * monthlyRate;
        interest += due;
        b = b + due - payment;
        months++;
        if (b < 0) { b = 0; }
      }
      return { months: months, interest: interest, cleared: b <= 0 };
    }
    
    omni.onResult(['loan_balance', 'loan_rate', 'loan_years', 'loan_extra'], function (ctx, v) {
      var balance = num('loan_balance');
      var rate = num('loan_rate');
      var years = num('loan_years');
      var extra = num('loan_extra');
    
      if (balance === null || balance <= 0) {
        ctx.addUnmetCondition('Enter the balance you owe.');
        return;
      }
      if (rate === null || rate < 0) {
        ctx.addUnmetCondition('Enter the interest rate — 0 is allowed for a subsidised loan.');
        return;
      }
      if (years === null || years <= 0 || years > 40) {
        ctx.addUnmetCondition('Enter the term in years — the standard plan is 10.');
        return;
      }
      if (extra === null) { extra = 0; }
      if (extra < 0) {
        ctx.addUnmetCondition('An extra payment cannot be negative.');
        return;
      }
    
      var i = rate / 100 / 12;
      var n = Math.round(years * 12);
      var payment = i > 0 ? balance * i / (1 - Math.pow(1 + i, -n)) : balance / n;
      var baseTotal = payment * n;
      var baseInterest = baseTotal - balance;
    
      var withExtra = schedule(balance, i, payment + extra, 1200);
      /*
       * The first payment falls a month from today, so the walk starts there and
       * steps one calendar month at a time — more honest than multiplying by an
       * average month, which drifts about a week over a ten-year term.
       */
      var now = new Date();
      var pd = new Date(Date.UTC(now.getUTCFullYear(), now.getUTCMonth() + 1, 1));
      pd.setUTCMonth(pd.getUTCMonth() + withExtra.months);
      var payoff = pd.getTime();
    
      ctx.exportValue('sloan_payment', sround(payment, 2));
      ctx.exportValue('sloan_interest', Math.round(baseInterest));
      ctx.exportValue('sloan_total', Math.round(baseTotal));
      ctx.exportValue('sloan_months', withExtra.months);
      ctx.exportValue('sloan_saved', Math.round(baseInterest - withExtra.interest));
      ctx.exportValue('sloan_payoff', payoff);
    
      var saved = baseInterest - withExtra.interest;
      var monthsSaved = n - withExtra.months;
    
      ctx.addHtml('<p><strong>' + money(payment) + ' a month clears ' + money(balance) + ' at '
        + snum(rate, 2) + ' % in ' + n + ' payments, costing ' + money(baseInterest) + ' of interest. '
        + (extra > 0
            ? 'Paying ' + money(extra) + ' extra clears it in ' + withExtra.months + ' months — '
              + monthsSaved + ' sooner — and saves ' + money(Math.max(0, saved)) + '.'
            : 'Add an extra payment to see what it would save.')
        + '</strong></p>');
    
      ctx.addHtml(stable(['Item', 'Value'], [
        ['Balance', money(balance)],
        ['Rate', snum(rate, 2) + ' % a year (' + snum(i * 100, 4) + ' % a month)'],
        ['Term', years + ' years (' + n + ' payments)'],
        ['Scheduled payment', money(payment)],
        ['Interest over the plan', money(baseInterest)],
        ['Total paid', money(baseTotal)],
        ['Extra each month', money(extra)],
        ['Paid each month in all', money(payment + extra)],
        ['Months to clear with the extra', String(withExtra.months)],
        ['Interest with the extra', money(withExtra.interest)],
        ['Interest saved', money(Math.max(0, saved))],
        ['Months saved', String(Math.max(0, monthsSaved))],
        ['First payment interest share', snum(i * balance / payment * 100, 1) + ' % of the first payment']
      ]));
    
      /* the same balance at other extra payments */
      var rows = [0, 25, 50, 100, 200, 500].map(function (x) {
        var s = schedule(balance, i, payment + x, 1200);
        return [money(x), String(s.months), money(Math.max(0, baseInterest - s.interest))];
      });
      ctx.addHtml('<p>What different extra payments would do:</p>');
      ctx.addHtml(stable(['Extra a month', 'Months to clear', 'Interest saved'], rows));
    
      ctx.addHtml('<p class="calc-unmet">This is the standard fixed-payment plan: one instalment, every month, '
        + 'for the whole term. It is not an income-driven plan, which recalculates the payment from your income '
        + 'each year and can end in forgiveness rather than a zero balance, and it is not the graduated plan, '
        + 'whose payment steps up in stages. Interest is charged monthly on the balance at rate ÷ 12, which is '
        + 'how federal servicers do it, and the schedule assumes the first payment falls one month from today '
        + 'with no grace period and no fees. During the pandemic payment pause interest was set to zero and '
        + 'months of non-payment still counted towards forgiveness; a loan that sat through it behaves as '
        + 'though those months never happened, which is why the payoff date above is a projection from today '
        + 'rather than a fact about your account. Check the balance and rate on your servicer’s statement — '
        + 'the one on the plan page is often a year old.</p>');
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Student Loan Repayment - Covid turns Balance owed ($), Interest rate (% a year) and Term of the plan (years) into Scheduled monthly payment ($) and Interest over the plan ($). It is a single relationship that reads scheduled monthly payment ($) out of balance owed ($), not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Student Loan Repayment - Covid calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Student Loan Repayment - Covid: it takes 5 numbers and reports Scheduled monthly payment ($), Interest over the plan ($) and Total paid over the plan ($).</p><p>The answers are Scheduled monthly payment ($), Interest over the plan ($), Total paid over the plan ($) and Months to clear the balance with the extra; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Balance owed ($)</strong> — a plain number, no unit</li><li><strong>Interest rate (% a year)</strong> — a plain number, no unit</li><li><strong>Term of the plan (years)</strong> — a plain number, no unit</li><li><strong>Extra paid each month ($, 0 for none)</strong> — a plain number, no unit</li><li><strong>Date the balance clears</strong> — a plain number, no unit, entered as a date</li></ul><p>The answers come back as Scheduled monthly payment ($), Interest over the plan ($), Total paid over the plan ($), Months to clear the balance with the extra, Interest saved by the extra ($). Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Scheduled monthly payment ($) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Scheduled monthly payment ($), Interest over the plan ($) and Total paid over the plan ($) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Balance owed ($) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Balance owed ($) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Interest rate (% a year) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Interest rate (% a year) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Term of the plan (years) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Term of the plan (years) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Balance owed ($) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Student Loan Repayment - Covid form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Balance owed ($)</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Balance owed ($) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Interest rate (% a year)</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Interest rate (% a year) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Term of the plan (years)</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Term of the plan (years) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Extra paid each month ($, 0 for none)</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Extra paid each month ($, 0 for none) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Date the balance clears</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Date the balance clears is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Scheduled monthly payment ($)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Interest over the plan ($)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Total paid over the plan ($)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Months to clear the balance with the extra</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Interest saved by the extra ($)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes Student Loan Repayment - Covid, works through it, and the panel lists Balance owed ($), Interest rate (% a year), Term of the plan (years) and Extra paid each month ($, 0 for none).</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is Scheduled monthly payment ($), Interest over the plan ($), Total paid over the plan ($) and Months to clear the balance with the extra — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Scheduled monthly payment ($) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It counts in whole days.</strong> Dates are compared as calendar days, not as moments: two dates that differ by a few hours on the same day give the same answer, and there is no time-of-day input to set.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Balance owed ($), Interest rate (% a year) and Term of the plan (years) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Balance owed ($), Interest rate (% a year) and Term of the plan (years) and the number you are missing is Scheduled monthly payment ($) and Interest over the plan ($).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/nav">Net asset value (NAV)</a>, <a href="/finance/net-debt">Net debt Calculator</a> and <a href="/finance/net-effective-rent">Net effective rent Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Student Loan Repayment - Covid is a number to act on, so the useful question is what to do with Scheduled monthly payment ($), Interest over the plan ($) and Total paid over the plan ($) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Balance owed ($), Interest rate (% a year), Term of the plan (years) and Extra paid each month ($, 0 for none) alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Student Loan Repayment - Covid calculator work out?', 'a' => 'Scheduled monthly payment ($), Interest over the plan ($), Total paid over the plan ($) and Months to clear the balance with the extra.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Balance owed ($), Interest rate (% a year), Term of the plan (years), Extra paid each month ($, 0 for none), Date the balance clears. Enter balance owed ($), interest rate (% a year) and term of the plan (years); Scheduled monthly payment ($) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Scheduled monthly payment ($) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Scheduled monthly payment ($) is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Scheduled monthly payment ($) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/nav', 'name' => 'Net asset value (NAV)'],
            ['path' => '/finance/net-debt', 'name' => 'Net debt Calculator'],
            ['path' => '/finance/net-effective-rent', 'name' => 'Net effective rent Calculator'],
        ],
        'authors' => [],
    ],
];
