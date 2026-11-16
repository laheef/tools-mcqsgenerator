<?php

/**
 * Dress size
 * /everyday-life/dress-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dress size',
    'meta' => ['title' => 'Dress size Calculator: Formula, Steps & Examples', 'description' => 'Dress size works out the missing figure from bust, waist, hips, european size and US size. Every box can be solved for, not only the one in the title.', 'h1' => 'Dress size Calculator', 'updated' => '2026-10-05'],
    'sections' => [
        [
            'title' => 'Your measurements ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bust',
                            'label' => 'Bust',
                            'type' => 'select',
                            'options' => [
                                '<74 cm (29 in)' => '30',
                                '74-77 cm (29-30 in)' => '32',
                                '78-81 cm (31-32 in)' => '34',
                                '82-85 cm (32-33.5 in)' => '36',
                                '86-89 cm (33.5-35 in)' => '38',
                                '90-93 cm (35-36.5 in)' => '40',
                                '94-97 cm (36.5-38 in)' => '42',
                                '98-102 cm (38-40 in)' => '44',
                                '103-107 cm (40-42 in)' => '46',
                                '108-113 cm (42-44.5 in)' => '48',
                                '114-119 cm (44.5-47 in)' => '50',
                                '120-125 cm (47-49 in)' => '52',
                                '126-131 cm (49-51.5 in)' => '54',
                                '>131 cm (>51.5 in)' => '56',
                            ],
                            'dataset' => 'bust',
                            'control' => 'DROPDOWN',
                            'default' => '94-97 cm (36.5-38 in)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'waist',
                            'label' => 'Waist',
                            'type' => 'select',
                            'options' => [
                                '<58 cm (<23 in)' => '30',
                                '58-61 cm (23-24 in)' => '32',
                                '62-64 cm (24-25 in)' => '34',
                                '65-68 cm (25-26.5 in)' => '36',
                                '69-72 cm (26.5-28 in)' => '38',
                                '73-77 cm (28-30 in)' => '40',
                                '78-81 cm (30-32 in)' => '42',
                                '82-85 cm (32-33.5 in)' => '44',
                                '86-90 cm (33.5-35.5 in)' => '46',
                                '91-95 cm (35.5-37.5 in)' => '48',
                                '96-102 cm (37.5-40 in)' => '50',
                                '103-108 cm (40-42.5 in)' => '52',
                                '109-114 cm (42.5-45 in)' => '54',
                                '>114 cm (>45 in)' => '56',
                            ],
                            'dataset' => 'waist',
                            'control' => 'DROPDOWN',
                            'default' => '78-81 cm (30-32 in)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'hips',
                            'label' => 'Hips',
                            'type' => 'select',
                            'options' => [
                                '<80 cm (<31.5 in)' => '30',
                                '80-84 cm (31.5-33 in)' => '32',
                                '85-89 cm (33-35 in)' => '34',
                                '90-94 cm (35-37 in)' => '36',
                                '95-97 cm (37-38 in)' => '38',
                                '98-101 cm (38-40 in)' => '40',
                                '102-104 cm (40-41 in)' => '42',
                                '105-108 cm (41-42.5 in)' => '44',
                                '109-112 cm (42.5-44 in)' => '46',
                                '113-116 cm (44-45.5 in)' => '48',
                                '117-122 cm (45.5-48 in)' => '50',
                                '123-128 cm (48-50 in)' => '52',
                                '129-134 cm (50-53 in)' => '54',
                                '>134 cm (>53 in)' => '56',
                            ],
                            'dataset' => 'hips',
                            'control' => 'DROPDOWN',
                            'default' => '102-104 cm (40-41 in)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'bust == waist == hips and bust < 56', 'text' => <<<'TXT'
                                Women's clothing sizes: USA: {{US_hips.uiValue}} UK: {{UK_hips.formattedValue}} Europe (DE/AT/NL/SE/DK): {{hips.formattedValue}} International: {{International_hips.uiValue}}&nbsp;
                                TXT],
                                ['when' => '(bust == 56 and waist == 56 and hips == 56) or ((bust != waist or bust != hips or hips != waist) and (bust >= 56 or waist >= 56 or hips >= 56))', 'text' => <<<'TXT'
                                Sorry, we couldn't calculate a dress size based on your measurements. Check the catalog or manufacturer before buying your dress, or try it on if you can .&nbsp;
                                TXT],
                                ['when' => '(bust != waist or bust != hips or hips != waist) and not(bust >= 56 or waist >= 56 or hips >= 56)', 'text' => <<<'TXT'
                                Looks like your measurements fall into different size categories (as shown in the table below). Check the detailed dress size chart in the article to assess which size should fit you best.
                                TXT],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Disclaimer  Please be aware that these categories are approximations. Check if your brand has its own clothing sizes before buying your perfect dress .'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'US_bust',
                            'label' => 'US bust',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'US_waist',
                            'label' => 'US waist',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'US_hips',
                            'label' => 'US hips',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'UK_bust',
                            'label' => 'UK bust',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'UK_waist',
                            'label' => 'UK waist',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'UK_hips',
                            'label' => 'UK hips',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'International_bust',
                            'label' => 'International bust',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'International_waist',
                            'label' => 'International waist',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'International_hips',
                            'label' => 'International hips',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'dress_size_eu',
                            'label' => 'European size',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dress_size_us',
                            'label' => 'US size',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dress_size_uk',
                            'label' => 'UK size',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dress_size_int',
                            'label' => 'International size (1 = XXS … 6 = XXL)',
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

    var INT_NAMES = ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL'];

    omni.onResult([], function (ctx, v) {
      var need = [['bust', 'bust'], ['waist', 'waist'], ['hips', 'hips']];
      var sizes = [];
      for (var i = 0; i < need.length; i++) {
        var raw = v[need[i][0]];
        if (raw === '' || raw === undefined || !isFinite(Number(raw))) {
          ctx.addUnmetCondition('Choose your ' + need[i][1] + ' measurement.');
          return;
        }
        sizes.push(Math.round(Number(raw)));
      }
      var eu = Math.max.apply(null, sizes);       /* the widest part decides the size */
      var us = eu - 32;                            /* EU 38 = US 6 */
      var uk = eu - 28;                            /* EU 38 = UK 10 */
      var intIndex = Math.max(0, Math.min(6, Math.round((eu - 32) / 2)));

      ctx.exportValue('dress_size_eu', eu);
      ctx.exportValue('dress_size_us', us);
      ctx.exportValue('dress_size_uk', uk);
      ctx.exportValue('dress_size_int', intIndex + 1);

      ctx.addHtml('<p><strong>European ' + eu + ', US ' + us + ', UK ' + uk + ' — '
        + INT_NAMES[intIndex] + '</strong>. Your largest measurement sets the size, so a garment will be loose '
        + 'where it is not the deciding one.</p>');
      ctx.addHtml(stable(['System', 'Size'], [
        ['Europe (DE/AT/NL/SE)', String(eu)],
        ['US', String(us)],
        ['UK', String(uk)],
        ['International', INT_NAMES[intIndex]],
        ['Bust band chosen', String(sizes[0])],
        ['Waist band chosen', String(sizes[1])],
        ['Hips band chosen', String(sizes[2])]
      ]));
      ctx.addHtml('<p class="calc-unmet">Sizes are not interchangeable between brands — the table is a starting '
        + 'point for a first fitting, not a guarantee.</p>');
    });
    TXT,
    'article' => [
        'intro' => 'The Dress size calculator returns your result from the 3 fields on the form.',
        'sections' => [
            ['title' => 'How does the Dress size calculator work?', 'html' => <<<'TXT'
            <p>The Dress size calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the bust, the waist and the hips).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 14 options, such as &lt;74 cm (29 in), 74-77 cm (29-30 in) and 78-81 cm (31-32 in). </li><li>Pick the option that matches your case — 14 options, such as &lt;58 cm (&lt;23 in), 58-61 cm (23-24 in) and 62-64 cm (24-25 in). </li><li>Pick the option that matches your case — 14 options, such as &lt;80 cm (&lt;31.5 in), 80-84 cm (31.5-33 in) and 85-89 cm (33-35 in). </li></ul><p>3 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Bust</strong></td><td>One of 14 options, such as &lt;74 cm (29 in), 74-77 cm (29-30 in) and 78-81 cm (31-32 in).</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Waist</strong></td><td>One of 14 options, such as &lt;58 cm (&lt;23 in), 58-61 cm (23-24 in) and 62-64 cm (24-25 in).</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Hips</strong></td><td>One of 14 options, such as &lt;80 cm (&lt;31.5 in), 80-84 cm (31.5-33 in) and 85-89 cm (33-35 in).</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>US bust</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>US waist</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>US hips</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>UK bust</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>UK waist</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>UK hips</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>International bust</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>International waist</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>International hips</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dress size calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li><li>If a field is empty the result waits rather than guessing: no zero is quietly substituted in the background.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Dress size calculator, these are the ones that matter:</p>
            <ul><li>The 3 drop-downs on this page offer a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li><li>There is nothing to invert here: the result is produced in one direction only, from the values you supply.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/wedding-countdown">Wedding countdown</a>, <a href="/everyday-life/week">Week</a> and <a href="/everyday-life/weighted-blanket">Weighted blanket</a>.</p>
            TXT],
            ['title' => 'Measuring for a dress-size comparison', 'html' => <<<'TXT'
            <p>The calculator uses bust, waist and hip measurements to return size labels in several regional systems. Measure in the unit selected on the page and keep the tape level. Bust is measured around the fullest part, waist at the measurement point the chart specifies, and hips around the fullest part of the seat. Clothing, posture and tape tension affect the reading, so use a flexible tape over light clothing or against the body as the brand instructs. Do not tighten the tape until it compresses tissue.</p>
            <p>Dress-size labels are not standardized across all brands. A US, UK or EU label is a chart reference, not a universal physical measurement. Manufacturers may use different fit models, ease, grading and garment cuts. If the retailer publishes a size chart for the specific dress, use that chart for the final decision and check whether it recommends selecting size based on the largest measurement.</p>
            <p>When bust, waist and hip measurements point to different size rows, the best choice depends on the garment’s cut and fabric. A woven dress with little stretch may need more room in the largest measurement; a knit or adjustable style may behave differently. The calculator cannot assess seam allowance, stretch, lining, ease, shoulder fit or the intended silhouette. Consider tailoring where the garment allows it.</p>
            <p>Regional size systems can differ in numbering and rounding. Select the destination chart before interpreting the result, and avoid chaining a rounded size through multiple regions. Keep the raw measurements and convert them directly each time. If a result lands near a boundary, repeat the measurement and compare the brand’s guidance rather than assuming the displayed label is exact.</p>
            <p>Fit is personal and changes with design. Two dresses in the same nominal size can have different bust depth, waist placement, sleeve shape and length. Reviews may mention whether an item runs large or small, but those comments are subjective and can reflect a different body shape or preferred fit. Use them as supporting clues, not as a replacement for measurements.</p>
            <p>For a purchase, measure close to the time you order and check the seller’s return or alteration policy. For a special occasion or a non-returnable garment, a professional fitting or garment-specific chart may be worth the extra step. The calculator helps translate measurements into a starting label; it cannot guarantee that a specific dress will fit or feel comfortable.</p>
            TXT],
            ['title' => 'Compare measurements with the garment’s chart', 'html' => <<<'TXT'
            <p>Measure as close as practical to the time you order, and use the same unit for bust, waist and hip. Keep the tape parallel to the floor where appropriate and avoid measuring over bulky clothes. If someone helps, stand naturally and breathe normally; holding a posture or pulling the tape tight can change the value. Record the measurements to the precision your tape supports instead of rounding them to a preferred size before consulting a chart.</p><p>Read the product chart’s notes. Some brands recommend choosing the size that matches the largest of the three measurements; others explain when a garment is designed with ease or stretch. A size chart for a woven occasion dress may differ from one for a knit garment. If a garment is fitted, has no stretch or cannot be returned, contacting the seller or a tailor with the raw measurements can be more reliable than relying on a general conversion.</p><p>If your bust, waist and hips correspond to different rows, consider the specific cut. A seamstress may be able to alter a waist or hem, while changing the shoulders or bust can be more complex. The calculator cannot judge which alteration is feasible, nor how much wearing ease the designer intended. Use garment measurements, construction details and return terms alongside the size label.</p><p>When comparing sizes across countries, convert directly from your body measurements each time. Do not use a rounded US label as the input to a second conversion and assume the result is exact. Retain the measurement, selected region, chart date and product name so you know which size recommendation applied to which garment.</p>
            TXT],
            ['title' => 'Use the size label as a search filter', 'html' => <<<'TXT'
            <p>When browsing, treat the calculated label as a filter for likely sizes, then inspect the actual garment measurements and fit notes. If a retailer offers free returns, ordering two neighboring sizes may be practical; if it does not, ask for product-specific guidance before purchase. Keep the return terms and alteration costs in the decision, especially for a non-refundable or made-to-order item.</p><p>A size number is not a measure of quality or a judgment about the wearer. It is a chart label that helps match a garment to measurements.</p>
            TXT],
            ['title' => 'Check the garment’s construction', 'html' => <<<'TXT'
            <p>Before choosing a size, look for information about stretch, lining, closures and whether the dress is intended to fit close to the body. Those details affect how much room the garment provides. Measurements and a regional label are most useful when read alongside the construction of the actual item.</p>
            TXT],
            ['title' => 'Keep your measurements private and useful', 'html' => <<<'TXT'
            <p>Store only the measurements needed for the clothing comparison and share them only with a retailer or fitter when you choose. The calculator’s result is a sizing aid, not an assessment of health or body composition.</p>
            TXT],
            ['title' => 'Follow the specific chart when it is available', 'html' => <<<'TXT'
            <p>If the product page gives a garment-specific chart, use it over a generic conversion. The maker’s chart is more likely to reflect the cut, ease and fit model of that dress.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What measurements does the dress-size tool use?', 'a' => 'Enter or select the bust, waist and hip measurements requested by the form, using its displayed measurement system. The calculator compares those values with its built-in size ranges.'],
            ['q' => 'Why can a size differ between brands?', 'a' => 'Sizing charts and garment cuts are not universal. Use the result as a guide, then compare your measurements with the specific brand’s chart and the garment’s fit notes.'],
            ['q' => 'What if my measurements fall across different sizes?', 'a' => 'That can happen because body proportions and chart ranges differ. Consider the garment style and the brand’s advice, and use the measurement that matters most for that cut rather than treating one label as definitive.'],
        ],
        'related' => [
            ['path' => '/everyday-life/wedding-countdown', 'name' => 'Wedding countdown'],
            ['path' => '/everyday-life/week', 'name' => 'Week'],
            ['path' => '/everyday-life/weighted-blanket', 'name' => 'Weighted blanket'],
        ],
    ],
];
