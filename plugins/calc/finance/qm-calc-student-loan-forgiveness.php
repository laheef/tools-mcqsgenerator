<?php

/**
 * Student loan forgiveness
 * /finance/student-loan-forgiveness
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Student loan forgiveness',
    'meta' => ['title' => 'Student loan forgiveness — Free Online Calculator', 'description' => 'Student loan forgiveness works out its answer from the values you enter. Every box can be solved for, not only the one in the title. Any box can be the unknown.', 'h1' => 'Student loan forgiveness Calculator', 'updated' => '2026-10-01'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'filing_status',
                            'label' => 'Your filing status...',
                            'type' => 'select',
                            'options' => ['Single' => '0', 'Married' => '1'],
                            'dataset' => 'Filing status',
                            'default' => 'Single',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annual_income',
                            'label' => 'Your annual income...',
                            'type' => 'number',
                            'suffix' => '$',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pell_grant',
                            'label' => 'Did you receive Pell Grants?',
                            'type' => 'select',
                            'options' => ['Yes' => '1', '' => '0'],
                            'dataset' => 'Pell grant',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'student_debt_outstanding',
                            'label' => 'Your outstanding student debt...',
                            'type' => 'number',
                            'suffix' => '$',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monthly_payment',
                            'label' => 'Monthly payment on an income-driven plan',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'forgiveness_months',
                            'label' => 'Payments before the rest is forgiven',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_paid',
                            'label' => 'Paid out of your own pocket over that time',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'amount_forgiven',
                            'label' => 'Amount forgiven at the end',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'debt_after_10',
                            'label' => 'Balance left after 10 years',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'debt_after_20',
                            'label' => 'Balance left after 20 years',
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
    
    /* 2025 federal poverty guidelines, 48 contiguous states, by household size */
    var FPL = { 1: 15650, 2: 21150 };
    
    omni.onResult(['annual_income', 'student_debt_outstanding', 'filing_status', 'pell_grant'],
      function (ctx, v) {
      var income = Number(v.annual_income);
      var debt = Number(v.student_debt_outstanding);
      if (!isFinite(income) || income < 0) {
        ctx.addUnmetCondition('Enter your annual income.');
        return;
      }
      if (!isFinite(debt) || debt <= 0) {
        ctx.addUnmetCondition('Enter the balance you still owe.');
        return;
      }
      if (debt > 1000000) {
        ctx.addUnmetCondition('That is ' + snum(debt, 0) + ' — check the figure (no thousands separators, please).');
        return;
      }
      if (income > 2000000) {
        ctx.addUnmetCondition('That income is outside the range this rule covers — check the figure.');
        return;
      }
    
      var married = Math.round(Number(v.filing_status)) === 1;
      var pell = String(v.pell_grant) === '1' || Number(v.pell_grant) === 1;
      var household = married ? 2 : 1;
    
      /* discretionary income: what is left above 225 % of the poverty guideline */
      var protectedIncome = 2.25 * FPL[household];
      var discretionary = Math.max(0, income - protectedIncome);
    
      /* SAVE charges 5 % of discretionary income for undergraduate loans; the older
         plans (and any graduate loans) charge 10 % */
      var pay5 = discretionary * 0.05 / 12;
      var pay10 = discretionary * 0.10 / 12;
      var payment = pay5;
    
      /*
       * How long forgiveness takes. The 12 000 rule is on the *original* principal;
       * the balance entered here is used as the best available stand-in.
       */
      var months = 120;
      if (debt > 12000) {
        months = 120 + Math.ceil((debt - 12000) / 1000) * 12;
      }
      months = Math.min(months, 240);
    
      /* a Pell grant earned at least 12 months of credit toward forgiveness */
      if (pell) { months = Math.max(120, months - 12); }
    
      var years = months / 12;
      var totalPaid = payment * months;
      var forgiven = Math.max(0, debt - totalPaid);
    
      /* the balance at the 10- and 20-year marks, interest ignored for simplicity */
      var at10 = Math.max(0, debt - payment * 120);
      var at20 = Math.max(0, debt - payment * 240);
    
      ctx.exportValue('monthly_payment', sround(payment, 2));
      ctx.exportValue('forgiveness_months', months);
      ctx.exportValue('total_paid', sround(totalPaid, 0));
      ctx.exportValue('amount_forgiven', sround(forgiven, 0));
      ctx.exportValue('debt_after_10', sround(at10, 0));
      ctx.exportValue('debt_after_20', sround(at20, 0));
    
      var money = function (x) { return '$' + snum(x, 0).replace(/\B(?=(\d{3})+(?!\d))/g, ','); };
      var date = new Date();
      date.setMonth(date.getMonth() + Math.round(months));
      var when = date.toLocaleDateString('en-GB', { month: 'long', year: 'numeric' });
    
      ctx.addHtml('<p><strong>On ' + money(payment) + ' a month, ' + snum(months, 0)
        + ' payments (' + snum(years, 1) + ' years, ending around ' + when + ') clear the rest: you pay '
        + money(totalPaid) + ' of the ' + money(debt) + ' and ' + money(forgiven) + ' is forgiven.</strong></p>');
    
      var rows = [
        ['Household size used', household + (married ? ' (married)' : ' (single)')],
        ['Income protected (225 % of the guideline)', money(protectedIncome)],
        ['Discretionary income', money(discretionary)],
        ['Monthly payment at 5 % (SAVE, undergraduate)', money(pay5)],
        ['Monthly payment at 10 % (older plans, graduate loans)', money(pay10)],
        ['Payments before forgiveness', snum(months, 0) + ' (' + snum(years, 1) + ' years)'],
        ['Total paid', money(totalPaid)],
        ['Forgiven at the end', money(forgiven)],
        ['Balance after 10 years', money(at10)],
        ['Balance after 20 years', money(at20)],
        ['Pell grant credit applied', pell ? 'yes — 12 months off the timeline' : 'no']
      ];
      ctx.addHtml(stable(['Item', 'Value'], rows));
    
      /* the same balance at a few incomes, so the shape of the rule is visible */
      var bands = [0.5, 0.75, 1, 1.25, 1.5].map(function (k) {
        var inc = Math.round(income * k);
        var disc = Math.max(0, inc - protectedIncome);
        var m = disc * 0.05 / 12;
        var cover = m * months;
        return [money(inc), money(m), money(cover), money(Math.max(0, debt - cover))];
      });
      ctx.addHtml('<p>What this plan would cost at other incomes, with the same balance:</p>');
      ctx.addHtml(stable(['Income', 'Monthly payment', 'Paid before forgiveness', 'Forgiven'], bands));
    
      var taxable = forgiven > 0
        ? 'Whether the forgiven amount is taxed depends on the programme: the federal exemption for '
          + 'income-driven repayment forgiveness ran to the end of 2025, Public Service Loan Forgiveness '
          + 'has never been taxed federally, and a handful of states tax discharged debt.'
        : 'Nothing is left to forgive at this payment level — the balance is clear before the plan ends.';
      ctx.addHtml('<p>' + taxable + '</p>');
    
      ctx.addHtml('<p class="calc-unmet">This is the SAVE and income-driven arithmetic, not an offer. '
        + 'Three things move the answer in real life: the poverty guideline is updated every January, each '
        + 'year\'s payment is recalculated from that year\'s income (so a raise shortens the timeline), and '
        + 'interest is charged on the balance while you pay — SAVE waives unpaid interest, older plans do not, '
        + 'which is why a balance can grow even while you are making every payment. Working for a qualifying '
        + 'public-service employer clears the balance after 120 payments whatever it is, and that route '
        + 'requires the right employer and the right plan from the first payment. Married filing separately '
        + 'can lower the payment; it usually raises the tax bill. Check your own numbers in the '
        + 'Loan Simulator on studentaid.gov before relying on any of this.</p>');
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Your filing status…, Your annual income… and Did you receive Pell Grants? into Student loan forgiveness and the answer comes back as Monthly payment on an income-driven plan and Payments before the rest is forgiven. The arithmetic is the whole method: monthly payment on an income-driven plan is worked out from your filing status… by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Student loan forgiveness calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Student loan forgiveness: it takes 4 numbers and reports Monthly payment on an income-driven plan, Payments before the rest is forgiven and Paid out of your own pocket over that time.</p><p>The answers are Monthly payment on an income-driven plan, Payments before the rest is forgiven, Paid out of your own pocket over that time and Amount forgiven at the end; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Your filing status…</strong> — a plain number, no unit</li><li><strong>Your annual income…</strong> — in $</li><li><strong>Did you receive Pell Grants?</strong> — a plain number, no unit</li><li><strong>Your outstanding student debt…</strong> — in $</li></ul><p>The answers come back as Monthly payment on an income-driven plan, Payments before the rest is forgiven, Paid out of your own pocket over that time, Amount forgiven at the end, Balance left after 10 years, Balance left after 20 years. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Monthly payment on an income-driven plan is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Monthly payment on an income-driven plan, Payments before the rest is forgiven and Paid out of your own pocket over that time are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Your filing status… left as a guess.</strong> Anything typed into Your filing status… is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Your annual income… left as a guess.</strong> Anything typed into Your annual income… is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Did you receive Pell Grants? left as a guess.</strong> Anything typed into Did you receive Pell Grants? is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Your filing status... is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Student loan forgiveness form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Your filing status…</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Your filing status… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Your annual income…</strong> is measured in $. Fill it from a measurement rather than a memory — Your annual income… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Did you receive Pell Grants?</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Did you receive Pell Grants? is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Your outstanding student debt…</strong> is measured in $. Fill it from a measurement rather than a memory — Your outstanding student debt… is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Monthly payment on an income-driven plan</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Payments before the rest is forgiven</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Paid out of your own pocket over that time</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Amount forgiven at the end</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Balance left after 10 years</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Balance left after 20 years</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes Student loan forgiveness, works through it, and the panel lists Your filing status…, Your annual income…, Did you receive Pell Grants? and Your outstanding student debt….</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is Monthly payment on an income-driven plan, Payments before the rest is forgiven, Paid out of your own pocket over that time and Amount forgiven at the end — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Monthly payment on an income-driven plan is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Your filing status…, Your annual income… and Did you receive Pell Grants? are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Your filing status…, Your annual income… and Did you receive Pell Grants? and the number you are missing is Monthly payment on an income-driven plan and Payments before the rest is forgiven.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/lumpsum">Lumpsum (India)</a>, <a href="/finance/lumpsum-plus-sip">Lumpsum plus SIP</a> and <a href="/finance/magi">MAGI Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Student loan forgiveness calculator work out?', 'a' => 'Monthly payment on an income-driven plan, Payments before the rest is forgiven, Paid out of your own pocket over that time and Amount forgiven at the end.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Your filing status…, Your annual income… ($), Did you receive Pell Grants?, Your outstanding student debt… ($). Fill your filing status…, your annual income… and did you receive Pell Grants? and leave Monthly payment on an income-driven plan empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Monthly payment on an income-driven plan is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The page needs every box filled: Monthly payment on an income-driven plan is fixed as the value it works out, so there is nothing to solve for when an input is missing.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Monthly payment on an income-driven plan at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/lumpsum', 'name' => 'Lumpsum (India)'],
            ['path' => '/finance/lumpsum-plus-sip', 'name' => 'Lumpsum plus SIP'],
            ['path' => '/finance/magi', 'name' => 'MAGI Calculator'],
        ],
        'authors' => [],
    ],
];
