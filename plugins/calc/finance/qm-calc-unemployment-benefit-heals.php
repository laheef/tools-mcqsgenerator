<?php

/**
 * Unemployment benefit - HEALS vs. HEROES
 * /finance/unemployment-benefit-heals
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Unemployment benefit - HEALS vs. HEROES',
    'meta' => ['title' => 'Unemployment benefit - HEALS vs. HEROES Calculator', 'description' => 'Compare the HEALS and HEROES benefit proposals by changing inputs and viewing estimated payments. This page models proposals, not current eligibility.', 'h1' => 'Unemployment benefit - HEALS vs. HEROES Calculator', 'updated' => '2025-11-04'],
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
                        ['name' => 'weeks', 'label' => 'Weeks you would claim', 'type' => 'number'],
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
                            'name' => 'heals_week',
                            'label' => 'HEALS: a week ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'heroes_week',
                            'label' => 'HEROES: a week ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'heals_total',
                            'label' => 'HEALS: in total ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'heroes_total',
                            'label' => 'HEROES: in total ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gap_week',
                            'label' => 'Difference a week ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gap_total',
                            'label' => 'Difference in total ($)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gap_share',
                            'label' => 'HEROES pays this much more (%)',
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
    
    function money(x) { return '$' + Math.round(x).toLocaleString(); }
    
    omni.onResult(['weekly_benefit', 'weeks'], function (ctx, v) {
      var benefit = num('weekly_benefit');
      var weeks = num('weeks');
    
      if (benefit === null || benefit < 0) {
        ctx.addUnmetCondition('Enter your state weekly benefit.');
        return;
      }
      if (weeks === null || weeks <= 0) {
        ctx.addUnmetCondition('Enter how many weeks you would claim.');
        return;
      }
    
      var healsWeek = benefit + 200;
      var heroesWeek = benefit + 600;
      var gapWeek = heroesWeek - healsWeek;
    
      ctx.exportValue('heals_week', Math.round(healsWeek));
      ctx.exportValue('heroes_week', Math.round(heroesWeek));
      ctx.exportValue('heals_total', Math.round(healsWeek * weeks));
      ctx.exportValue('heroes_total', Math.round(heroesWeek * weeks));
      ctx.exportValue('gap_week', Math.round(gapWeek));
      ctx.exportValue('gap_total', Math.round(gapWeek * weeks));
      ctx.exportValue('gap_share', sround(gapWeek / healsWeek * 100, 1));
    
      ctx.addHtml('<p><strong>On ' + money(benefit) + ' a week of state benefit, HEALS would have paid '
        + money(healsWeek) + ' a week and HEROES ' + money(heroesWeek) + ' — ' + money(gapWeek)
        + ' apart, or ' + money(gapWeek * weeks) + ' over ' + snum(weeks, 0) + ' weeks.</strong></p>');
    
      ctx.addHtml(stable(['Item', 'HEALS', 'HEROES'], [
        ['State benefit', money(benefit), money(benefit)],
        ['Federal top-up', '$200 a week', '$600 a week'],
        ['A week', money(healsWeek), money(heroesWeek)],
        ['A month (4.33 weeks)', money(healsWeek * 4.33), money(heroesWeek * 4.33)],
        ['Over ' + snum(weeks, 0) + ' weeks', money(healsWeek * weeks), money(heroesWeek * weeks)],
        ['Top-up as a share of the state benefit',
          (benefit > 0 ? snum(200 / benefit * 100, 1) : '—') + ' %',
          (benefit > 0 ? snum(600 / benefit * 100, 1) : '—') + ' %']
      ]));
    
      var rows = [4, 13, 26, 39].map(function (w) {
        return [w + ' weeks', money(healsWeek * w), money(heroesWeek * w), money(gapWeek * w)];
      });
      ctx.addHtml('<p>Over other lengths of claim:</p>');
      ctx.addHtml(stable(['Claim length', 'HEALS', 'HEROES', 'Difference'], rows));
    
      ctx.addHtml('<p class="calc-unmet">These are proposals, not law, and the difference between them is '
        + 'mostly the size of the federal top-up: HEALS proposed $200 a week, HEROES $600. In practice the two '
        + 'bills differed in more than that — HEALS would have phased its $200 into a wage-replacement formula '
        + 'once states had the systems to administer it, capped total benefits at a share of the lost wage, and '
        + 'tied the extension to a rehiring bonus; HEROES extended the $600 and the eviction moratorium '
        + 'outright. Neither figure here includes the separate $1,200 stimulus payment, state-level supplements '
        + 'or back-rent adjustments, and both are gross of tax. Use the comparison as an order of magnitude for '
        + 'what a weekly difference of $400 means over a claim, not as a forecast of what anyone was paid.</p>');
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Unemployment benefit - HEALS vs. HEROES takes State weekly benefit ($) and Weeks you would claim and returns HEALS: a week ($) and HEROES: a week ($). Nothing is looked up on this page: HEALS: a week ($) is computed from state weekly benefit ($) and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Unemployment benefit - HEALS vs. HEROES calculator works', 'html' => <<<'TXT'
            <p>The Unemployment benefit - HEALS vs. HEROES calculator applies one relationship to 2 numbers and reports HEALS: a week ($), HEROES: a week ($) and HEALS: in total ($).</p><p>The result panel carries HEALS: a week ($), HEROES: a week ($), HEALS: in total ($) and HEROES: in total ($), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>State weekly benefit ($)</strong> — a plain number, no unit</li><li><strong>Weeks you would claim</strong> — a plain number, no unit</li></ul><p>What you get back is HEALS: a week ($), HEROES: a week ($), HEALS: in total ($), HEROES: in total ($), Difference a week ($), Difference in total ($), HEROES pays this much more (%), shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: HEALS: a week ($) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with HEALS: a week ($), HEROES: a week ($) and HEALS: in total ($) are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>State weekly benefit ($) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If State weekly benefit ($) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Weeks you would claim left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Weeks you would claim is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If State weekly benefit ($) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Unemployment benefit - HEALS vs. HEROES form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>State weekly benefit ($)</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — State weekly benefit ($) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Weeks you would claim</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Weeks you would claim is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>HEALS: a week ($)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>HEROES: a week ($)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>HEALS: in total ($)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>HEROES: in total ($)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Difference a week ($)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Difference in total ($)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>HEROES pays this much more (%)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes Unemployment benefit - HEALS vs. HEROES, works through it, and the panel lists State weekly benefit ($) and Weeks you would claim.</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is HEALS: a week ($), HEROES: a week ($), HEALS: in total ($) and HEROES: in total ($) — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have State weekly benefit ($) and Weeks you would claim ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with State weekly benefit ($) — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check HEALS: a week ($) against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> HEALS: a week ($) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: State weekly benefit ($) and Weeks you would claim measured, HEALS: a week ($) and HEROES: a week ($) wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/rent-increase">Rent increase Calculator</a>, <a href="/finance/rent-or-buy">Rent or buy</a> and <a href="/finance/rent-split">Rent split Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Unemployment benefit - HEALS vs. HEROES calculator work out?', 'a' => 'HEALS: a week ($), HEROES: a week ($), HEALS: in total ($) and HEROES: in total ($).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            State weekly benefit ($), Weeks you would claim. Enter state weekly benefit ($) and weeks you would claim; HEALS: a week ($) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of HEALS: a week ($) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: HEALS: a week ($) is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of HEALS: a week ($) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/rent-increase', 'name' => 'Rent increase Calculator'],
            ['path' => '/finance/rent-or-buy', 'name' => 'Rent or buy'],
            ['path' => '/finance/rent-split', 'name' => 'Rent split Calculator'],
        ],
        'authors' => [],
    ],
];
