<?php

/**
 * Unemployment benefit - CARES Act
 * /finance/unemployment-benefit
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Unemployment benefit - CARES Act',
    'meta' => ['title' => 'Unemployment benefit - CARES Act Calculator', 'description' => 'Unemployment benefit - CARES Act works out its answer from the values you enter. Any box can be the unknown. The formula is printed in the form\'s own words.', 'h1' => 'Unemployment benefit - CARES Act Calculator', 'updated' => '2025-11-04'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [],
        ],
        [
            'title' => 'Your benefit',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'weekly_benefit', 'label' => 'State weekly benefit ($)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'weeks', 'label' => 'Weeks you claim (1 to 39)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'fpuc_week', 'label' => 'Federal top-up a week ($600 under the CARES Act)', 'type' => 'number'],
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
                            'name' => 'car_week',
                            'label' => 'A week, both streams ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'car_monthly',
                            'label' => 'A month at 4.33 weeks ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'car_state_total',
                            'label' => 'State benefit in total ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'car_fpuc_total',
                            'label' => 'Federal top-up in total ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'car_total',
                            'label' => 'Everything ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'car_uplift',
                            'label' => 'Top-up as a share of the state benefit (%)',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
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
      return isFinite(n) ? n : false;
    }
    
    function money(x) { return '$' + Math.round(x).toLocaleString(); }
    
    omni.onResult(['weekly_benefit', 'weeks', 'fpuc_week'], function (ctx, v) {
      var benefit = num('weekly_benefit');
      var weeks = num('weeks');
      var fpuc = num('fpuc_week');
    
      if (benefit === null || benefit < 0) {
        ctx.addUnmetCondition('Enter your state weekly benefit.');
        return;
      }
      if (weeks === null || weeks <= 0 || weeks > 39) {
        ctx.addUnmetCondition('Enter between 1 and 39 weeks.');
        return;
      }
      if (fpuc === null || fpuc < 0) {
        ctx.addUnmetCondition('Enter the federal top-up a week — $600 under the CARES Act.');
        return;
      }
    
      var week = benefit + fpuc;
      var stateTotal = benefit * weeks;
      var fpucTotal = fpuc * weeks;
    
      ctx.exportValue('car_week', Math.round(week));
      ctx.exportValue('car_monthly', Math.round(week * 4.33));
      ctx.exportValue('car_state_total', Math.round(stateTotal));
      ctx.exportValue('car_fpuc_total', Math.round(fpucTotal));
      ctx.exportValue('car_total', Math.round(stateTotal + fpucTotal));
      ctx.exportValue('car_uplift', benefit > 0 ? sround(fpuc / benefit * 100, 1) : 0);
    
      ctx.addHtml('<p><strong>' + money(benefit) + ' of state benefit plus ' + money(fpuc)
        + ' of federal money is ' + money(week) + ' a week — ' + money(stateTotal + fpucTotal) + ' over '
        + snum(weeks, 0) + ' weeks.</strong></p>');
    
      ctx.addHtml(stable(['Item', 'Value'], [
        ['State weekly benefit', money(benefit)],
        ['Federal top-up (FPUC)', money(fpuc) + ' a week'],
        ['A week in all', money(week)],
        ['A fortnight', money(week * 2)],
        ['A month (4.33 weeks)', money(week * 4.33)],
        ['Weeks claimed', snum(weeks, 0)],
        ['From the state', money(stateTotal)],
        ['From the federal top-up', money(fpucTotal)],
        ['In total', money(stateTotal + fpucTotal)],
        ['Top-up as a share of the state benefit', (benefit > 0 ? snum(fpuc / benefit * 100, 1) : '—') + ' %'],
        ['State benefit replacement of a $600-a-week job', snum(benefit / 600 * 100, 1) + ' % of $600']
      ]));
    
      var rows = [1, 4, 13, 26, 39].map(function (w) {
        return [w + ' week' + (w === 1 ? '' : 's'), money(benefit * w), money(fpuc * w),
          money((benefit + fpuc) * w)];
      });
      ctx.addHtml('<p>The same week over other lengths of claim:</p>');
      ctx.addHtml(stable(['Weeks', 'State benefit', 'Federal top-up', 'Together'], rows));
    
      ctx.addHtml('<p class="calc-unmet">The Federal Pandemic Unemployment Compensation was $600 a week for '
        + 'everyone eligible for any state or federal unemployment payment, decided nationally rather than per '
        + 'state — so the state column is the one that varies. It ran from the end of March 2020 to the end of '
        + 'July 2020; a claim that straddled that date received $600 for the weeks up to the cut-off and the '
        + 'state amount alone afterwards, which this single figure cannot show. Everything here is gross: '
        + 'federal income tax may be withheld at 10 % if you asked for it, and some states withhold their own. '
        + 'The $600 was not charged against the state’s trust fund and did not shorten the 39 weeks of regular '
        + 'benefit that sit underneath it. Pandemic Emergency Unemployment Compensation, the 13 extra weeks, is '
        + 'a separate programme and is not counted here.</p>');
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter State weekly benefit ($), Weeks you claim (1 to 39) and Federal top-up a week ($600 under the CARES Act) into Unemployment benefit - CARES Act and the answer comes back as A week, both streams ($) and A month at 4.33 weeks ($). It is a single relationship that reads a week, both streams ($) out of state weekly benefit ($), not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Unemployment benefit - CARES Act calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Unemployment benefit - CARES Act: it takes 3 numbers and reports A week, both streams ($), A month at 4.33 weeks ($) and State benefit in total ($).</p><p>The result panel carries A week, both streams ($), A month at 4.33 weeks ($), State benefit in total ($) and Federal top-up in total ($), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>State weekly benefit ($)</strong> — a plain number, no unit</li><li><strong>Weeks you claim (1 to 39)</strong> — a plain number, no unit</li><li><strong>Federal top-up a week ($600 under the CARES Act)</strong> — a plain number, no unit</li></ul><p>The answers come back as A week, both streams ($), A month at 4.33 weeks ($), State benefit in total ($), Federal top-up in total ($), Everything ($), Top-up as a share of the state benefit (%). Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as A week, both streams ($) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A week, both streams ($), A month at 4.33 weeks ($) and State benefit in total ($) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>State weekly benefit ($) left as a guess.</strong> Anything typed into State weekly benefit ($) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Weeks you claim (1 to 39) left as a guess.</strong> Anything typed into Weeks you claim (1 to 39) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Federal top-up a week ($600 under the CARES Act) left as a guess.</strong> Anything typed into Federal top-up a week ($600 under the CARES Act) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert State weekly benefit ($) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Unemployment benefit - CARES Act form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>State weekly benefit ($)</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — State weekly benefit ($) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Weeks you claim (1 to 39)</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Weeks you claim (1 to 39) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Federal top-up a week ($600 under the CARES Act)</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Federal top-up a week ($600 under the CARES Act) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>A week, both streams ($)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>A month at 4.33 weeks ($)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>State benefit in total ($)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Federal top-up in total ($)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Everything ($)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Top-up as a share of the state benefit (%)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes Unemployment benefit - CARES Act, works through it, and the panel lists State weekly benefit ($), Weeks you claim (1 to 39) and Federal top-up a week ($600 under the CARES Act).</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is A week, both streams ($), A month at 4.33 weeks ($), State benefit in total ($) and Federal top-up in total ($) — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind A week, both streams ($) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes State weekly benefit ($), Weeks you claim (1 to 39) and Federal top-up a week ($600 under the CARES Act) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when State weekly benefit ($), Weeks you claim (1 to 39) and Federal top-up a week ($600 under the CARES Act) is what you already know and A week, both streams ($) and A month at 4.33 weeks ($) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/salary-inflation">Salary inflation Calculator</a>, <a href="/finance/salary-to-hourly">Salary to hourly</a> and <a href="/finance/salary-with-overtime">Salary with overtime</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Unemployment benefit - CARES Act is a number to act on, so the useful question is what to do with A week, both streams ($), A month at 4.33 weeks ($) and State benefit in total ($) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down State weekly benefit ($), Weeks you claim (1 to 39) and Federal top-up a week ($600 under the CARES Act) alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Unemployment benefit - CARES Act calculator work out?', 'a' => 'A week, both streams ($), A month at 4.33 weeks ($), State benefit in total ($) and Federal top-up in total ($).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            State weekly benefit ($), Weeks you claim (1 to 39), Federal top-up a week ($600 under the CARES Act). With state weekly benefit ($), weeks you claim (1 to 39) and federal top-up a week ($600 under the CARES Act) in place, A week, both streams ($) can stay blank and the page will work it out.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            A week, both streams ($) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: A week, both streams ($) is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. A week, both streams ($) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/salary-inflation', 'name' => 'Salary inflation Calculator'],
            ['path' => '/finance/salary-to-hourly', 'name' => 'Salary to hourly'],
            ['path' => '/finance/salary-with-overtime', 'name' => 'Salary with overtime'],
        ],
        'authors' => [],
    ],
];
