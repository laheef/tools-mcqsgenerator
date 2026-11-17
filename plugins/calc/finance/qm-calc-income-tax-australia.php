<?php

/**
 * Income tax Australia
 * /finance/income-tax-australia
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Income tax Australia',
    'meta' => ['title' => 'Income tax Australia: Formula, Steps & Results', 'description' => 'Income tax Australia works out whichever of Taxable income for the year (A$), Income tax on the scale (A$) and Low income tax offset (A$) is left blank.', 'h1' => 'Income tax Australia Calculator', 'updated' => '2025-10-08'],
    'raw' => [
        'vars' => [
            'taxable_income' => ['type' => 'numerical'],
            'au_gross' => [
                'type' => 'dependent',
                'rnd' => ['standard', '0'],
            ],
            'au_tax' => [
                'type' => 'dependent',
                'rnd' => ['standard', '0'],
            ],
            'au_lito' => [
                'type' => 'dependent',
                'rnd' => ['standard', '0'],
            ],
            'au_medicare' => [
                'type' => 'dependent',
                'rnd' => ['standard', '0'],
            ],
            'au_total_tax' => [
                'type' => 'dependent',
                'rnd' => ['standard', '0'],
            ],
            'au_net' => [
                'type' => 'dependent',
                'rnd' => ['standard', '0'],
            ],
            'au_weekly' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
            ],
            'au_effective' => [
                'type' => 'dependent',
                'rnd' => ['standard', '2'],
            ],
            'au_marginal' => [
                'type' => 'dependent',
                'rnd' => ['standard', '0'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'xG7dbZ28y-Xw9oJD57tCE',
                'title' => '',
                'desc' => '',
                'm' => [],
            ],
            [
                'uid' => 'supp-au-tax-income',
                'title' => 'Your income',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'taxable_income', 'vt' => 'numerical', 'l' => 'Taxable income for the year (A$)'],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'supp-au-tax-results',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'au_gross', 'vt' => 'dependent', 'l' => 'Income tax on the scale (A$)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'au_lito', 'vt' => 'dependent', 'l' => 'Low income tax offset (A$)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'au_medicare', 'vt' => 'dependent', 'l' => 'Medicare levy (A$)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'au_total_tax', 'vt' => 'dependent', 'l' => 'Total tax and levy (A$)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'au_net', 'vt' => 'dependent', 'l' => 'Take-home pay for the year (A$)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'au_weekly', 'vt' => 'dependent', 'l' => 'Take-home pay a week (A$)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'au_effective', 'vt' => 'dependent', 'l' => 'Effective tax rate (%)'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'au_marginal', 'vt' => 'dependent', 'l' => 'Marginal rate (% — the rate on the next dollar)'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [],
        'datasets' => [],
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
        
        function money(x) { return 'A$' + Math.round(x).toLocaleString(); }
        
        function scaleTax(income) {
          if (income <= 18200) { return 0; }
          if (income <= 45000) { return (income - 18200) * 0.16; }
          if (income <= 135000) { return 4288 + (income - 45000) * 0.30; }
          if (income <= 190000) { return 31288 + (income - 135000) * 0.37; }
          return 51638 + (income - 190000) * 0.45;
        }
        
        function marginalRate(income) {
          if (income <= 18200) { return 0; }
          if (income <= 45000) { return 16; }
          if (income <= 135000) { return 30; }
          if (income <= 190000) { return 37; }
          return 45;
        }
        
        function lito(income) {
          if (income <= 37500) { return 700; }
          if (income <= 45000) { return 700 - (income - 37500) * 0.05; }
          if (income <= 66667) { return Math.max(0, 325 - (income - 45000) * 0.015); }
          return 0;
        }
        
        function medicare(income) {
          if (income <= 26000) { return 0; }
          if (income <= 32574) { return (income - 26000) * 0.10; }
          return income * 0.02;
        }
        
        omni.onResult(['taxable_income'], function (ctx, v) {
          var income = num('taxable_income');
          if (income === null || income < 0) {
            ctx.addUnmetCondition('Enter your taxable income for the year.');
            return;
          }
        
          var tax = scaleTax(income);
          var offset = Math.min(lito(income), tax);
          var levy = medicare(income);
          var total = tax - offset + levy;
          var net = income - total;
          var effective = income > 0 ? total / income * 100 : 0;
        
          ctx.exportValue('au_gross', Math.round(tax));
          ctx.exportValue('au_lito', Math.round(offset));
          ctx.exportValue('au_medicare', Math.round(levy));
          ctx.exportValue('au_total_tax', Math.round(total));
          ctx.exportValue('au_net', Math.round(net));
          ctx.exportValue('au_weekly', sround(net / 52, 2));
          ctx.exportValue('au_effective', sround(effective, 2));
          ctx.exportValue('au_marginal', marginalRate(income));
        
          ctx.addHtml('<p><strong>On ' + money(income) + ' the income tax is ' + money(tax) + ', less the '
            + money(offset) + ' low income offset, plus ' + money(levy) + ' of Medicare levy — '
            + money(total) + ' in all, leaving ' + money(net) + '.</strong></p>');
        
          /* the band the income falls in, with what the band itself costs */
          var band, bandTax;
          if (income <= 18200) { band = 'Tax-free threshold (0 – 18,200)'; bandTax = 0; }
          else if (income <= 45000) { band = '18,201 – 45,000 at 16 %'; bandTax = tax; }
          else if (income <= 135000) { band = '45,001 – 135,000 at 30 %'; bandTax = tax - 4288; }
          else if (income <= 190000) { band = '135,001 – 190,000 at 37 %'; bandTax = tax - 31288; }
          else { band = 'Over 190,000 at 45 %'; bandTax = tax - 51638; }
        
          ctx.addHtml(stable(['Item', 'Value'], [
            ['Taxable income', money(income)],
            ['Tax before offsets', money(tax)],
            ['Low income tax offset', '−' + money(offset)],
            ['Medicare levy', money(levy)],
            ['Total tax', money(total)],
            ['Take-home for the year', money(net)],
            ['Take-home a month', money(net / 12)],
            ['Take-home a fortnight', money(net / 26)],
            ['Take-home a week', money(net / 52)],
            ['Effective rate', snum(effective, 2) + ' %'],
            ['Marginal rate', marginalRate(income) + ' %'],
            ['Band you are in', band],
            ['Tax charged inside that band', money(bandTax)],
            ['Tax-free threshold', 'A$18,200']
          ]));
        
          /* the tax at round incomes either side, to show the shape of the scale */
          var rows = [0, 18200, 30000, 45000, 60000, 90000, 120000, 135000, 180000, 200000, 250000]
            .map(function (x) {
              var t = scaleTax(x);
              var o = Math.min(lito(x), t);
              var m = medicare(x);
              return [money(x), money(t), '−' + money(o), money(m), money(t - o + m)];
            });
          ctx.addHtml('<p>Resident scale at other incomes:</p>');
          ctx.addHtml(stable(['Taxable income', 'Tax', 'Offset', 'Levy', 'Total tax'], rows));
        
          ctx.addHtml('<p class="calc-unmet">These are the resident rates from 1 July 2024 and they assume the '
            + 'tax-free threshold is claimed in full and that the income is ordinary taxable income — salary, '
            + 'wages, interest — with no deductions to subtract first and no HELP, student or private health '
            + 'adjustments. Enter the income after deductions. The Medicare levy is the standard 2 %, shaded in '
            + 'between A$26,000 and A$32,574 for a single person with no dependants; the low income offset is the '
            + 'A$700 version, and it can only reduce tax to zero, never pay anything back. A foreign resident is '
            + 'taxed from the first dollar at 30 %, with no threshold, no offset and no levy — those figures are '
            + 'not this scale. The Medicare levy surcharge, if you have no private hospital cover and earn above '
            + 'the surcharge threshold, is a further 1 – 1.5 % and is not included.</p>');
        });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Taxable income for the year (A$) into Income tax Australia and the answer comes back as Income tax on the scale (A$) and Low income tax offset (A$). There is no hidden constant here: change income tax on the scale (A$) and taxable income for the year (A$) moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Income tax Australia calculator works', 'html' => <<<'TXT'
            <p>The Income tax Australia calculator applies one relationship to 1 number and reports Income tax on the scale (A$), Low income tax offset (A$) and Medicare levy (A$).</p><p>The result panel carries Income tax on the scale (A$), Low income tax offset (A$), Medicare levy (A$) and Total tax and levy (A$), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Taxable income for the year (A$)</strong> — a plain number, no unit</li></ul><p>The answers come back as Income tax on the scale (A$), Low income tax offset (A$), Medicare levy (A$), Total tax and levy (A$), Take-home pay for the year (A$), Take-home pay a week (A$), Effective tax rate (%), Marginal rate (% — the rate on the next dollar). Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Income tax on the scale (A$) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Income tax on the scale (A$), Low income tax offset (A$) and Medicare levy (A$) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Taxable income for the year (A$) left as a guess.</strong> Anything typed into Taxable income for the year (A$) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Taxable income for the year (A$) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Taxable income for the year (A$)</strong> takes a plain number with no unit attached. Have it to hand before you start: Taxable income for the year (A$) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Income tax on the scale (A$)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Low income tax offset (A$)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Medicare levy (A$)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total tax and levy (A$)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Take-home pay for the year (A$)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Take-home pay a week (A$)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Effective tax rate (%)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Marginal rate (% — the rate on the next dollar)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Income tax Australia is not a single equation with a single answer. It reads Taxable income for the year (A$), applies the analysis the page is built around, and reports Income tax on the scale (A$), Low income tax offset (A$), Medicare levy (A$) and Total tax and levy (A$).</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Income tax on the scale (A$), Low income tax offset (A$), Medicare levy (A$) and Total tax and levy (A$). They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Taxable income for the year (A$). Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Taxable income for the year (A$) into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Income tax on the scale (A$) with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Income tax on the scale (A$) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Taxable income for the year (A$) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Taxable income for the year (A$) measured, Income tax on the scale (A$) and Low income tax offset (A$) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/commercial-lease">Commercial lease</a>, <a href="/finance/commission">Commission</a> and <a href="/finance/comparative-advantage">Comparative advantage Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Income tax Australia calculator work out?', 'a' => 'Income tax on the scale (A$), Low income tax offset (A$), Medicare levy (A$) and Total tax and levy (A$).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Taxable income for the year (A$). Fill taxable income for the year (A$) and leave Income tax on the scale (A$) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Income tax on the scale (A$) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Income tax on the scale (A$), so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Income tax on the scale (A$) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/commercial-lease', 'name' => 'Commercial lease'],
            ['path' => '/finance/commission', 'name' => 'Commission'],
            ['path' => '/finance/comparative-advantage', 'name' => 'Comparative advantage Calculator'],
        ],
        'authors' => [],
    ],
];
