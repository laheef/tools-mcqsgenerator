<?php

/**
 * Herfindahl-Hirschman index (HHI)
 * /finance/hhi
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Herfindahl-Hirschman index (HHI)',
    'meta' => ['title' => 'Herfindahl-Hirschman index (HHI) Calculator', 'description' => 'Herfindahl-Hirschman index (HHI) works out message from firm 1 and firm 2. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Herfindahl-Hirschman index (HHI) Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => 'Market shares (up to 15 numbers)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firm_1',
                            'label' => 'Firm 1',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firm_2',
                            'label' => 'Firm 2',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firm_3',
                            'label' => 'Firm 3',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firm_4',
                            'label' => 'Firm 4',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firm_5',
                            'label' => 'Firm 5',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firm_6',
                            'label' => 'Firm 6',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firm_7',
                            'label' => 'Firm 7',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firm_8',
                            'label' => 'Firm 8',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firm_9',
                            'label' => 'Firm 9',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firm_10',
                            'label' => 'Firm 10',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firm_11',
                            'label' => 'Firm 11',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firm_12',
                            'label' => 'Firm 12',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firm_13',
                            'label' => 'Firm 13',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firm_14',
                            'label' => 'Firm 14',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'firm_15',
                            'label' => 'Firm 15',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
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
                            'name' => 'interpretation_0',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['This indicates a **highly competitive industry**.' => '0', 'This indicates an **un-concentrated industry**.' => '1', 'This indicates a **moderate market concentration**.' => '2', 'This indicates a **high market concentration**.' => '3'],
                            'dataset' => 'interpretations',
                            'control' => 'DROPDOWN',
                            'default' => 'This indicates a **highly competitive industry**.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interpretation_1',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['This indicates a **highly competitive industry**.' => '0', 'This indicates an **un-concentrated industry**.' => '1', 'This indicates a **moderate market concentration**.' => '2', 'This indicates a **high market concentration**.' => '3'],
                            'dataset' => 'interpretations',
                            'control' => 'DROPDOWN',
                            'default' => 'This indicates an **un-concentrated industry**.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interpretation_2',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['This indicates a **highly competitive industry**.' => '0', 'This indicates an **un-concentrated industry**.' => '1', 'This indicates a **moderate market concentration**.' => '2', 'This indicates a **high market concentration**.' => '3'],
                            'dataset' => 'interpretations',
                            'control' => 'DROPDOWN',
                            'default' => 'This indicates a **moderate market concentration**.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'interpretation_3',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['This indicates a **highly competitive industry**.' => '0', 'This indicates an **un-concentrated industry**.' => '1', 'This indicates a **moderate market concentration**.' => '2', 'This indicates a **high market concentration**.' => '3'],
                            'dataset' => 'interpretations',
                            'control' => 'DROPDOWN',
                            'default' => 'This indicates a **high market concentration**.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'results_msg_0',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['The value of HHI is' => '0', 'The sum of market shares is' => '1', 'To calculate HHI, market shares should sum up to **100%**.' => '2'],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => 'The value of HHI is',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'results_msg_1',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['The value of HHI is' => '0', 'The sum of market shares is' => '1', 'To calculate HHI, market shares should sum up to **100%**.' => '2'],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => 'The sum of market shares is',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'results_msg_2',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['The value of HHI is' => '0', 'The sum of market shares is' => '1', 'To calculate HHI, market shares should sum up to **100%**.' => '2'],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => 'To calculate HHI, market shares should sum up to **100%**.',
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
                        ['name' => 'result_message', 'label' => 'Message', 'type' => 'number', 'readonly' => true],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";omni.onResult([],function(ctx,_ref){var firm_1=_ref.firm_1,firm_2=_ref.firm_2,firm_3=_ref.firm_3,firm_4=_ref.firm_4,firm_5=_ref.firm_5,firm_6=_ref.firm_6,firm_7=_ref.firm_7,firm_8=_ref.firm_8,firm_9=_ref.firm_9,firm_10=_ref.firm_10,firm_11=_ref.firm_11,firm_12=_ref.firm_12,firm_13=_ref.firm_13,firm_14=_ref.firm_14,firm_15=_ref.firm_15;var shares=[firm_1,firm_2,firm_3,firm_4,firm_5,firm_6,firm_7,firm_8,firm_9,firm_10,firm_11,firm_12,firm_13,firm_14,firm_15].filter(function(v){return v!=null}).map(Number);var sumMarketShare=shares.reduce(function(acc,v){return acc+v},0);var hhi=shares.reduce(function(acc,v){return acc+v*v},0);var interpretation;if(hhi<100){interpretation="".concat(ctx.getRawInput("interpretation_0"))}else if(hhi<1500){interpretation="".concat(ctx.getRawInput("interpretation_1"))}else if(hhi<2500){interpretation="".concat(ctx.getRawInput("interpretation_2"))}else{interpretation="".concat(ctx.getRawInput("interpretation_3"))}var message;if(sumMarketShare===100){message="".concat(ctx.getRawInput("results_msg_0")," **").concat(hhi,"**. ").concat(interpretation)}else{message="".concat(ctx.getRawInput("results_msg_1")," **").concat(sumMarketShare,"%**. ").concat(ctx.getRawInput("results_msg_2"))}ctx.exportValue("result_message",message)});//# sourceURL=customJs.js
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
    
    /* The page hook has already run by the time this one does, so the values
       below are its results: tidy the reference site's markup out of them
       before they reach the panel. */
    omni.onResult([], function (ctx, values) {
      var rows = [
        'result_message'
      ];
      rows.forEach(function (name) {
        var v = values[name];
        if (typeof v !== 'string' || v.trim() === '') { return; }
        var text = sclean(sdelabel(v));
        ctx.exportValue(name, text === '' ? null : text);
      });
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Herfindahl-Hirschman index (HHI) takes Firm 1, Firm 2 and Firm 3 and returns Message. Nothing is looked up on this page: message is computed from firm 1 and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Herfindahl-Hirschman index (HHI) calculator works', 'html' => <<<'TXT'
            <p>Herfindahl-Hirschman index (HHI) answers one question from 15 numbers, and the answer is Message.</p><p>The answers are Message; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 15 boxes, and nothing else.</p><ul><li><strong>Firm 1</strong> — in %</li><li><strong>Firm 2</strong> — in %</li><li><strong>Firm 3</strong> — in %</li><li><strong>Firm 4</strong> — in %</li><li><strong>Firm 5</strong> — in %</li><li><strong>Firm 6</strong> — in %</li><li><strong>Firm 7</strong> — in %</li><li><strong>Firm 8</strong> — in %</li><li><strong>Firm 9</strong> — in %</li><li><strong>Firm 10</strong> — in %</li><li><strong>Firm 11</strong> — in %</li><li><strong>Firm 12</strong> — in %</li><li><strong>Firm 13</strong> — in %</li><li><strong>Firm 14</strong> — in %</li><li><strong>Firm 15</strong> — in %</li></ul><p>What you get back is Message, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Message takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Message is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Firm 1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Firm 1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Firm 2 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Firm 2 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Firm 3 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Firm 3 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Firm 1 to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Firm 1</strong> is measured in %. Have it to hand before you start: Firm 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Firm 2</strong> is measured in %. Have it to hand before you start: Firm 2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Firm 3</strong> is measured in %. Have it to hand before you start: Firm 3 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Firm 4</strong> is measured in %. Have it to hand before you start: Firm 4 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Firm 5</strong> is measured in %. Have it to hand before you start: Firm 5 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Firm 6</strong> is measured in %. Have it to hand before you start: Firm 6 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Firm 7</strong> is measured in %. Have it to hand before you start: Firm 7 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Firm 8</strong> is measured in %. Have it to hand before you start: Firm 8 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Firm 9</strong> is measured in %. Have it to hand before you start: Firm 9 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Firm 10</strong> is measured in %. Have it to hand before you start: Firm 10 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Firm 11</strong> is measured in %. Have it to hand before you start: Firm 11 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Firm 12</strong> is measured in %. Have it to hand before you start: Firm 12 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Firm 13</strong> is measured in %. Have it to hand before you start: Firm 13 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Firm 14</strong> is measured in %. Have it to hand before you start: Firm 14 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Firm 15</strong> is measured in %. Have it to hand before you start: Firm 15 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Message</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Herfindahl-Hirschman index (HHI) is not a single equation with a single answer. It reads Firm 1, Firm 2, Firm 3 and Firm 4, applies the analysis the page is built around, and reports Message.</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Message. They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Firm 1, Firm 2, Firm 3 and Firm 4. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Firm 1 into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Message with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Message follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Firm 1, Firm 2 and Firm 3 are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Firm 1, Firm 2 and Firm 3 measured, Message wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/taxable-equivalent-yield">Taxable equivalent yield Calculator</a>, <a href="/finance/taylor-rule">Taylor rule Calculator</a> and <a href="/finance/tds-interest">TDS interest Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Herfindahl-Hirschman index (HHI) calculator work out?', 'a' => 'Message.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Firm 1 (%), Firm 2 (%), Firm 3 (%), Firm 4 (%), Firm 5 (%). With firm 1, firm 2 and firm 3 in place, Message can stay blank and the page will work it out.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Message is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'Every box has to have a number in it. What this page returns is Message, so an empty input simply leaves the result blank rather than choosing a new unknown.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Message at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/taxable-equivalent-yield', 'name' => 'Taxable equivalent yield Calculator'],
            ['path' => '/finance/taylor-rule', 'name' => 'Taylor rule Calculator'],
            ['path' => '/finance/tds-interest', 'name' => 'TDS interest Calculator'],
        ],
        'authors' => [],
    ],
];
