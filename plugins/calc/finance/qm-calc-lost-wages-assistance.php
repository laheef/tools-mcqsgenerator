<?php

/**
 * Unemployment benefit - Lost Wages Assistance (LWA)
 * /finance/lost-wages-assistance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Unemployment benefit - Lost Wages Assistance (LWA)',
    'meta' => ['title' => 'Unemployment benefit - Lost Wages Assistance (LWA)', 'description' => 'Unemployment benefit - Lost Wages Assistance (LWA) works out its answer from the values you enter. A worked example follows. Every figure is computed.', 'h1' => 'Unemployment benefit - Lost Wages Assistance (LWA) Calculator', 'updated' => '2025-12-31'],
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
                        ['name' => 'weeks', 'label' => 'Weeks you were certified for LWA (up to 6)', 'type' => 'number'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'state_match',
                            'label' => 'Did your state pay the $100 match?',
                            'type' => 'select',
                            'options' => ['Yes — $400 a week in all' => '1', 'No — $300 a week' => '0'],
                            'dataset' => 'LWA state match',
                        ],
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
                            'name' => 'lwa_week',
                            'label' => 'Lost Wages Assistance a week ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lwa_total',
                            'label' => 'Lost Wages Assistance in total ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'benefit_total',
                            'label' => 'State benefit over the same weeks ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'combined_week',
                            'label' => 'Everything, a week ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'combined_total',
                            'label' => 'Everything, over the weeks ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'replacement',
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
      return isFinite(n) ? n : null;
    }
    
    /* the text of the option chosen in a picker, whether it is a select or radios */
    function chosenText(name) {
      var sel = document.querySelector('select[data-var="' + name + '"]');
      if (sel && sel.selectedIndex >= 0) { return (sel.options[sel.selectedIndex].text || '').trim(); }
      var r = document.querySelector('input[type="radio"][name="' + name + '"]:checked');
      if (r) {
        var host = r.closest('label') || r.parentNode;
        return (host.innerText || host.textContent || '').replace(/\s+/g, ' ').trim();
      }
      return '';
    }
    
    function money(x) { return '$' + Math.round(x).toLocaleString(); }
    
    omni.onResult(['weekly_benefit', 'weeks', 'state_match'], function (ctx, v) {
      var benefit = num('weekly_benefit');
      var weeks = num('weeks');
      var answer = chosenText('state_match');
      var match = answer === '' ? null : (answer.charAt(0).toUpperCase() === 'Y' ? '1' : '0');
    
      if (benefit === null || benefit < 0) {
        ctx.addUnmetCondition('Enter your state weekly benefit.');
        return;
      }
      if (weeks === null || weeks <= 0 || weeks > 6) {
        ctx.addUnmetCondition('Enter between 1 and 6 weeks — LWA ran for six.');
        return;
      }
      if (match === null || match === '') {
        ctx.addUnmetCondition('Say whether your state paid the $100 match.');
        return;
      }
    
      var weekly = 300 + (String(match) === '1' ? 100 : 0);
      var lwaTotal = weekly * weeks;
      var benefitTotal = benefit * weeks;
      var combinedWeek = benefit + weekly;
    
      ctx.exportValue('lwa_week', weekly);
      ctx.exportValue('lwa_total', Math.round(lwaTotal));
      ctx.exportValue('benefit_total', Math.round(benefitTotal));
      ctx.exportValue('combined_week', Math.round(combinedWeek));
      ctx.exportValue('combined_total', Math.round(benefitTotal + lwaTotal));
      ctx.exportValue('replacement', benefit > 0 ? sround(weekly / benefit * 100, 1) : 0);
    
      ctx.addHtml('<p><strong>LWA paid ' + money(weekly) + ' a week on top of ' + money(benefit)
        + ' of state benefit: ' + money(combinedWeek) + ' a week for ' + snum(weeks, 0) + ' weeks is '
        + money(benefitTotal + lwaTotal) + ', of which ' + money(lwaTotal) + ' is the federal money.</strong></p>');
    
      ctx.addHtml(stable(['Item', 'Value'], [
        ['State weekly benefit', money(benefit)],
        ['Federal LWA', '$300 a week'],
        ['State match', String(match) === '1' ? '$100 a week' : 'none'],
        ['LWA a week', money(weekly)],
        ['Weeks', snum(weeks, 0)],
        ['LWA in total', money(lwaTotal)],
        ['State benefit in total', money(benefitTotal)],
        ['Combined a week', money(combinedWeek)],
        ['Combined in total', money(benefitTotal + lwaTotal)],
        ['Top-up as a share of the state benefit', (benefit > 0 ? snum(weekly / benefit * 100, 1) : '—') + ' %'],
        ['Maximum LWA over the full six weeks', money(weekly * 6)]
      ]));
    
      var rows = [1, 2, 4, 6].map(function (w) {
        return [w + ' week' + (w === 1 ? '' : 's'), money(weekly * w), money(benefit * w),
          money((weekly + benefit) * w)];
      });
      ctx.addHtml('<p>If you were certified for a different number of weeks:</p>');
      ctx.addHtml(stable(['Weeks', 'LWA', 'State benefit', 'Together'], rows));
    
      ctx.addHtml('<p class="calc-unmet">Lost Wages Assistance was a fixed $300 a week from FEMA, with states '
        + 'that chose to add $100 of their own. It was not a percentage of your old wage and it did not depend '
        + 'on the size of your state benefit — a person on $180 a week and a person on $500 a week received the '
        + 'same $300. It ran for six weeks in the second half of 2020, covering weeks of unemployment that fell '
        + 'between the start of August and early September depending on the state, and it required the claimant '
        + 'to certify that the unemployment was caused by the pandemic. Money paid under LWA was taxable as '
        + 'federal income but is shown here gross, before any withholding. It has ended; nothing here is '
        + 'claimable now, and no later federal programme used exactly these terms.</p>');
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Unemployment benefit - Lost Wages Assistance (LWA) works out Lost Wages Assistance a week ($) and Lost Wages Assistance in total ($) from State weekly benefit ($), Weeks you were certified for LWA (up to 6) and Did your state pay the $100 match?. It is a single relationship that reads lost Wages Assistance a week ($) out of state weekly benefit ($), not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Unemployment benefit - Lost Wages Assistance (LWA) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Unemployment benefit - Lost Wages Assistance (LWA): it takes 3 numbers and reports Lost Wages Assistance a week ($), Lost Wages Assistance in total ($) and State benefit over the same weeks ($).</p><p>The result panel carries Lost Wages Assistance a week ($), Lost Wages Assistance in total ($), State benefit over the same weeks ($) and Everything, a week ($), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>State weekly benefit ($)</strong> — a plain number, no unit</li><li><strong>Weeks you were certified for LWA (up to 6)</strong> — a plain number, no unit</li><li><strong>Did your state pay the $100 match?</strong> — a plain number, no unit</li></ul><p>The result boxes are Lost Wages Assistance a week ($), Lost Wages Assistance in total ($), State benefit over the same weeks ($), Everything, a week ($), Everything, over the weeks ($), Top-up as a share of the state benefit (%); they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Lost Wages Assistance a week ($) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Lost Wages Assistance a week ($), Lost Wages Assistance in total ($) and State benefit over the same weeks ($) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>State weekly benefit ($) left as a guess.</strong> Anything typed into State weekly benefit ($) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Weeks you were certified for LWA (up to 6) left as a guess.</strong> Anything typed into Weeks you were certified for LWA (up to 6) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Did your state pay the $100 match? left as a guess.</strong> Anything typed into Did your state pay the $100 match? is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert State weekly benefit ($) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>State weekly benefit ($)</strong> takes a plain number with no unit attached. Have it to hand before you start: State weekly benefit ($) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Weeks you were certified for LWA (up to 6)</strong> takes a plain number with no unit attached. Have it to hand before you start: Weeks you were certified for LWA (up to 6) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Did your state pay the $100 match?</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Did your state pay the $100 match? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 6 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Lost Wages Assistance a week ($)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Lost Wages Assistance in total ($)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>State benefit over the same weeks ($)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Everything, a week ($)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Everything, over the weeks ($)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Top-up as a share of the state benefit (%)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Unemployment benefit - Lost Wages Assistance (LWA) is not a single equation with a single answer. It reads State weekly benefit ($), Weeks you were certified for LWA (up to 6) and Did your state pay the $100 match?, applies the analysis the page is built around, and reports Lost Wages Assistance a week ($), Lost Wages Assistance in total ($), State benefit over the same weeks ($) and Everything, a week ($).</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Lost Wages Assistance a week ($), Lost Wages Assistance in total ($), State benefit over the same weeks ($) and Everything, a week ($). They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Lost Wages Assistance a week ($) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are State weekly benefit ($), Weeks you were certified for LWA (up to 6) and Did your state pay the $100 match? and the number you are missing is Lost Wages Assistance a week ($) and Lost Wages Assistance in total ($).</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/vat">VAT Calculator</a>, <a href="/finance/velocity-of-money">Velocity of money</a> and <a href="/finance/wacc">WACC</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Unemployment benefit - Lost Wages Assistance (LWA) calculator work out?', 'a' => 'Lost Wages Assistance a week ($), Lost Wages Assistance in total ($), State benefit over the same weeks ($) and Everything, a week ($).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            State weekly benefit ($), Weeks you were certified for LWA (up to 6), Did your state pay the $100 match?. Enter state weekly benefit ($), weeks you were certified for LWA (up to 6) and did your state pay the $100 match?; Lost Wages Assistance a week ($) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Lost Wages Assistance a week ($) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Lost Wages Assistance a week ($), so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Lost Wages Assistance a week ($) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/vat', 'name' => 'VAT Calculator'],
            ['path' => '/finance/velocity-of-money', 'name' => 'Velocity of money'],
            ['path' => '/finance/wacc', 'name' => 'WACC'],
        ],
        'authors' => [],
    ],
];
