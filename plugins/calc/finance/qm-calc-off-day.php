<?php

/**
 * Off days
 * /finance/off-day
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Off days',
    'meta' => ['title' => 'Off days Calculator: Formula, Steps & Examples', 'description' => 'Off days works out whichever of country, contract and hours per week is left blank. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Off days Calculator', 'updated' => '2026-09-22'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'country',
                            'label' => 'Country',
                            'type' => 'select',
                            'options' => ['United States' => '0', 'United Kingdom' => '1', 'Poland' => '2'],
                            'default' => 'United States',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'contract',
                            'label' => 'Contract',
                            'type' => 'select',
                            'options' => ['Full-time' => '0', 'Part-time' => '1', 'Freelance / Contract' => '2'],
                            'default' => 'Full-time',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hours_per_week',
                            'label' => 'Hours per week',
                            'type' => 'number',
                            'unit' => '124',
                            'unit_default' => 'hour',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
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
                            'name' => 'hoursPercentage',
                            'label' => 'Hours percentage',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hoursPerPer',
                            'label' => 'Hours per per',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hoursPer10',
                            'label' => 'Hours per10',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hoursPer15',
                            'label' => 'Hours per15',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hoursPer20',
                            'label' => 'Hours per20',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hoursPer26',
                            'label' => 'Hours per26',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
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
                            'name' => 'leave_days',
                            'label' => 'Paid holiday you are entitled to (days)',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'leave_hours',
                            'label' => 'The same entitlement in hours',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'leave_weeks',
                            'label' => 'That is this many working weeks',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'day_hours',
                            'label' => 'Length of one of your working days (hours)',
                            'type' => 'result',
                            'rounding' => ['standard', '2'],
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
    
    /* statutory minimum paid holiday, in days of a five-day week */
    var RULES = {
      /* United States: no federal minimum at all; 10 days is the private-sector average after a year (BLS) */
      0: { days: 10, name: 'United States', legal: false,
           note: 'The United States has no federal statutory holiday at all — 10 days is the average private-sector '
               + 'entitlement after a year of service, and about a quarter of workers get none.' },
      /* United Kingdom: 5.6 weeks = 28 days for a five-day week, bank holidays included */
      1: { days: 28, name: 'United Kingdom', legal: true,
           note: 'UK law gives 5.6 weeks (28 days for a five-day week) including the eight bank holidays, '
               + 'pro-rated for the hours you actually work.' },
      /* Poland: 20 days under 10 years of service, 26 days after */
      2: { days: 26, name: 'Poland', legal: true,
           note: 'Poland gives 20 days below 10 years of service and 26 days after it; 26 is used here. '
               + 'The entitlement is in days, not hours, so a part-timer still gets 26 of their own short days.' }
    };
    
    omni.onResult(['country', 'contract', 'hours_per_week'], function (ctx, v) {
      var country = Math.round(Number(v.country));
      var contract = Math.round(Number(v.contract));
      var hours = Number(v.hours_per_week);
      if (!isFinite(country) || !RULES[country]) {
        ctx.addUnmetCondition('Choose the country you work in.');
        return;
      }
      if (!isFinite(hours) || hours <= 0) {
        ctx.addUnmetCondition('Enter the hours you work in a normal week.');
        return;
      }
      if (hours > 90) {
        ctx.addUnmetCondition('That is ' + snum(hours, 1) + ' hours a week — check the number.');
        return;
      }
    
      var rule = RULES[country];
      var dayHours = hours / 5;
      var days = rule.days;
      var freelance = contract === 2;
    
      ctx.exportValue('leave_days', sround(days, 1));
      ctx.exportValue('leave_hours', sround(days * dayHours, 1));
      ctx.exportValue('leave_weeks', sround(days / 5, 2));
      ctx.exportValue('day_hours', sround(dayHours, 2));
    
      var headline = freelance
        ? 'As a freelancer or contractor nobody owes you paid holiday — the ' + snum(days, 0)
          + ' days below are what a salaried ' + rule.name + ' worker would get on the same hours.'
        : 'A ' + (contract === 1 ? 'part-time' : 'full-time') + ' worker on ' + snum(hours, 1)
          + ' hours a week in ' + rule.name + ' is entitled to ' + snum(days, 0) + ' days, which is '
          + snum(days * dayHours, 1) + ' hours.';
    
      ctx.addHtml('<p><strong>' + headline + '</strong></p>');
      ctx.addHtml('<p>' + rule.note
        + (rule.legal
            ? ' A part-timer gets the same number of days, not the same number of hours: a day is simply shorter.'
            : '')
        + '</p>');
    
      var rows = [
        ['Working days a week', '5 (the basis for the division)'],
        ['One working day', snum(dayHours, 2) + ' h'],
        ['Holiday entitlement', snum(days, 0) + ' days = ' + snum(days * dayHours, 1) + ' h'],
        ['Of which bank / public holidays', rule.legal && country === 1 ? '8 days are inside the 28' : 'included in the days above']
      ];
      rows.push(['Holiday as a share of the year', snum(days / 260 * 100, 1) + '% of 260 working days']);
      ctx.addHtml(stable(['Item', 'Value'], rows));
    
      /* the same entitlement at the usual weekly hours, so a part-timer can see theirs */
      var bands = [10, 15, 20, 26, 30, 37.5, 40];
      var bandRows = bands.map(function (h) {
        return [snum(h, 1) + ' h / week', snum(h / 5, 2) + ' h a day', snum(days * h / 5, 1) + ' h of leave'];
      });
      ctx.addHtml('<p>What the same ' + snum(days, 0) + ' days is worth at other weekly hours:</p>');
      ctx.addHtml(stable(['Hours a week', 'One day', 'Paid holiday'], bandRows));
    
      if (freelance) {
        var uplift = days / 5 / 52 * 100;
        ctx.addHtml('<p class="calc-unmet">If you want to build the same days off into your own rate, '
          + 'add about ' + snum(uplift, 1) + '% to the hours you bill: ' + snum(days, 0) + ' days out of 260 '
          + 'working days is ' + snum(days / 260 * 100, 1) + '% of the year. Freelance rates have to carry it, '
          + 'because no employer does.</p>');
      }
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Off days works out Paid holiday you are entitled to (days) and The same entitlement in hours from Country, Contract and Hours per week. There is no hidden constant here: change paid holiday you are entitled to (days) and country moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Off days calculator works', 'html' => <<<'TXT'
            <p>The Off days calculator applies one relationship to 9 numbers and reports Paid holiday you are entitled to (days), The same entitlement in hours and That is this many working weeks.</p><p>The result panel carries Paid holiday you are entitled to (days), The same entitlement in hours, That is this many working weeks and Length of one of your working days (hours), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 9 boxes, and nothing else.</p><ul><li><strong>Country</strong> — a plain number, no unit</li><li><strong>Contract</strong> — a plain number, no unit</li><li><strong>Hours per week</strong> — in hours</li><li><strong>Hours percentage</strong> — a plain number, no unit</li><li><strong>Hours per per</strong> — a plain number, no unit</li><li><strong>Hours per10</strong> — a plain number, no unit</li><li><strong>Hours per15</strong> — a plain number, no unit</li><li><strong>Hours per20</strong> — a plain number, no unit</li><li><strong>Hours per26</strong> — a plain number, no unit</li></ul><p>The result boxes are Paid holiday you are entitled to (days), The same entitlement in hours, That is this many working weeks, Length of one of your working days (hours); they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Hours per week lists 4 options and opens on hours. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Hours per week carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Paid holiday you are entitled to (days), The same entitlement in hours and That is this many working weeks are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Country left as a guess.</strong> Anything typed into Country is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Contract left as a guess.</strong> Anything typed into Contract is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Country to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Country</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Country is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Contract</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Contract is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hours per week</strong> is a hours quantity: the page opens it in hour and converts anything else you pick before the formula runs. Have it to hand before you start: Hours per week is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hours percentage</strong> takes a plain number with no unit attached. Have it to hand before you start: Hours percentage is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hours per per</strong> takes a plain number with no unit attached. Have it to hand before you start: Hours per per is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hours per10</strong> takes a plain number with no unit attached. Have it to hand before you start: Hours per10 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hours per15</strong> takes a plain number with no unit attached. Have it to hand before you start: Hours per15 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hours per20</strong> takes a plain number with no unit attached. Have it to hand before you start: Hours per20 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Hours per26</strong> takes a plain number with no unit attached. Have it to hand before you start: Hours per26 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Paid holiday you are entitled to (days)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>The same entitlement in hours</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>That is this many working weeks</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Length of one of your working days (hours)</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Off days is not a single equation with a single answer. It reads Country, Contract, Hours per week and Hours percentage, applies the analysis the page is built around, and reports Paid holiday you are entitled to (days), The same entitlement in hours, That is this many working weeks and Length of one of your working days (hours).</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Paid holiday you are entitled to (days), The same entitlement in hours, That is this many working weeks and Length of one of your working days (hours). They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>hours</strong> — opens in <em>hour</em>, and the chip also carries weeks, days and months. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Paid holiday you are entitled to (days) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are hours and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Country, Contract and Hours per week are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Country, Contract and Hours per week is what you already know and Paid holiday you are entitled to (days) and The same entitlement in hours is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/loan-payment">Loan payment Calculator</a>, <a href="/finance/loan-repayment">Loan repayment Calculator</a> and <a href="/finance/long-term-care">Long term care</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Off days calculator work out?', 'a' => 'Paid holiday you are entitled to (days), The same entitlement in hours, That is this many working weeks and Length of one of your working days (hours).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Country, Contract, Hours per week (hours), Hours percentage, Hours per per. Fill country, contract and hours per week and leave Paid holiday you are entitled to (days) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Paid holiday you are entitled to (days) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Paid holiday you are entitled to (days), so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Paid holiday you are entitled to (days) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/loan-payment', 'name' => 'Loan payment Calculator'],
            ['path' => '/finance/loan-repayment', 'name' => 'Loan repayment Calculator'],
            ['path' => '/finance/long-term-care', 'name' => 'Long term care'],
        ],
        'authors' => [],
    ],
];
