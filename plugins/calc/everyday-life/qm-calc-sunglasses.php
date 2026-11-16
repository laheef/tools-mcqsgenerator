<?php

/**
 * Sunglasses size
 * /everyday-life/sunglasses
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sunglasses size',
    'meta' => ['title' => 'Sunglasses size — Formula, Steps & Examples', 'description' => 'Sunglasses size solves for any one of sex, forehead width and cheeks width, given the rest. Every box can be solved for, not only the one in the title.', 'h1' => 'Sunglasses size Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => 'All about you ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gender',
                            'label' => 'Sex',
                            'type' => 'select',
                            'options' => ['Female ' => '0', 'Male ' => '1'],
                            'dataset' => 'Gender',
                            'default' => 'Female ',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'knows_how_to',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['I know how to measure my face' => '1', '' => '0'],
                            'dataset' => 'Yes/No',
                            'control' => 'CHECKBOX',
                            'default' => 'I know how to measure my face',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/sunglasses-size/v5/measure/MeasureM.png'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'forehead_width',
                            'label' => 'Forehead width',
                            'type' => 'number',
                            'help' => 'The width of your forehead\'s widest region, usually halfway between your hairline and your eyebrows.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cheeks_width',
                            'label' => 'Cheeks width',
                            'type' => 'number',
                            'help' => 'The width of your cheeks, usually the distance between the outer corners of your eyes.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'jawline_length',
                            'label' => 'Jawline length',
                            'type' => 'number',
                            'help' => 'The length of your jawline, from your chin to the outer edge of your ear.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'face_length',
                            'label' => 'Face length',
                            'type' => 'number',
                            'help' => 'The length of your face, from the start of your hairline to the tip of your chin.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sharpness',
                            'label' => 'How sharp are your features?',
                            'type' => 'select',
                            'options' => ['Sharp' => '1', 'In the middle' => '0.5', 'Round' => '0'],
                            'dataset' => 'Sharpness',
                            'help' => <<<'TXT'
                            Sharp features include chiseled jaws and pointed chins, and generally consist of straight lines. Rounder faces have softer lines, and include curved jawlines and soft chins.
                            TXT,
                            'defaults' => [
                                ['value' => 'In the middle', 'when' => null],
                                ['value' => 'In the middle', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Try these frames ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/sunglasses-size/v5/with-sunglasses/Oval_M.png'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Try these sizes ',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/sunglasses-size/v5/sizing.png'],
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
                            'name' => 'face_shape',
                            'label' => 'Face shape (1 oval, 2 round, 3 square, 4 heart, 5 oblong)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'frame_width',
                            'label' => 'Frame width to look for (mm)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'lens_width',
                            'label' => 'Lens width (mm)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bridge_width',
                            'label' => 'Bridge width (mm)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temple_length',
                            'label' => 'Temple (arm) length (mm)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'face_ratio',
                            'label' => 'Face length ÷ width',
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
    "use strict";omni.define("get_face_shape",function(forehead_width,cheeks_width,jawline_length,face_length,sharpness){function dims2ratios(dims){var ratios=[];for(var i=0;i<4;i++){for(var j=i+1;j<4;j++){ratios.push(dims[i]/dims[j])}}ratios.push(dims[4]);return ratios}var faces_database=[[5,6,5,8.5,0],[5.5,7,5,8.5,0],[6,6,6,8,0.5],[7,7,6,8.5,0.5],[6,6,6,7,1],[4,5,5,6,1],[5,5.5,6,7,0.5]];var faces_ratios_database=faces_database.map(function(fcjl){return dims2ratios(fcjl)});var user_face_ratios=dims2ratios([forehead_width,cheeks_width,jawline_length/1,face_length,sharpness]);var user_neg_ratio_dists=faces_ratios_database.map(function(ratioarr){return-manhattan_distance(user_face_ratios,ratioarr)});return argmax(user_neg_ratio_dists)+1});omni.define("f",function(value){return Math.round((value-76.2)*(29-27)/(254-76.2)+27)});function manhattan_distance(arr1,arr2){var d=0;for(var i=0;i<arr1.length;i++){d+=Math.abs(arr1[i]-arr2[i])}return d}function argmax(arr){if(arr.length===0){return-1}var index_of_max=0,the_max=arr[0];for(var i=1;i<arr.length;i++){if(the_max<arr[i]){index_of_max=i;the_max=arr[i]}}return index_of_max}//# sourceURL=customJs.js
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

    var SHAPES = {
      1: { name: 'oval', fits: 'Most frames suit an oval face — rectangular, round, aviator, wayfarer.',
           avoid: 'Frames that are wider than the cheekbones, which make an oval face look narrow.' },
      2: { name: 'round', fits: 'Angular and rectangular frames add the definition a round face lacks; wayfarers and cat-eyes work too.',
           avoid: 'Small round frames, which emphasise the roundness.' },
      3: { name: 'square', fits: 'Round, oval and aviator frames soften a strong jawline.',
           avoid: 'Sharp rectangular frames, which repeat the angles of the jaw.' },
      4: { name: 'heart (inverted triangle)', fits: 'Bottom-heavy, rimless and light-coloured frames, or a straight top line with a rounded bottom.',
           avoid: 'Heavy decorated top bars and wide temples, which add weight where the face is already widest.' },
      5: { name: 'oblong', fits: 'Deep lenses and frames with a little height — aviators, oversized squares, round frames with depth.',
           avoid: 'Narrow letterbox frames, which make a long face look longer.' }
    };

    function toMm(value, unit) {
      var factors = { mm: 1, cm: 10, m: 1000, inch: 25.4, ft: 304.8, yd: 914.4, microm: 0.001 };
      var factor = factors[String(unit || 'cm').toLowerCase()];
      return Number(value) * (factor || 10);
    }

    function shapeFrom(forehead, cheek, jaw, length, sharpness) {
      var ratio = length / cheek;
      var sharp = Number(sharpness) > 0.7;
      var soft  = Number(sharpness) < 0.3;

      if (forehead > cheek * 1.03 && cheek > jaw * 1.03) { return { id: 4, ratio: ratio }; }
      if (ratio > 1.4) { return { id: 5, ratio: ratio }; }
      if (Math.abs(forehead - cheek) / cheek < 0.05 && Math.abs(cheek - jaw) / cheek < 0.05) {
        return { id: sharp ? 3 : (soft ? 2 : 1), ratio: ratio };
      }
      if (soft) { return { id: 2, ratio: ratio }; }
      return { id: 1, ratio: ratio };
    }

    omni.onResult(['forehead_width', 'cheeks_width', 'jawline_length', 'face_length', 'sharpness',
                   'gender'], function (ctx, v) {
      /* Page hooks receive display-unit values. This rule's thresholds and frame
         dimensions are in millimetres, so normalize all four measurements first. */
      var forehead = toMm(v.forehead_width, ctx.getUnit('forehead_width'));
      var cheek = toMm(v.cheeks_width, ctx.getUnit('cheeks_width'));
      var jaw = toMm(v.jawline_length, ctx.getUnit('jawline_length'));
      var length = toMm(v.face_length, ctx.getUnit('face_length'));

      var missing = [forehead, cheek, jaw, length].some(function (n) { return !isFinite(n) || n <= 0; });
      if (missing) {
        ctx.addUnmetCondition('Enter all four measurements of the face.');
        return;
      }
      if (cheek < 80 || cheek > 220) {
        ctx.addUnmetCondition('A face ' + snum(cheek, 0) + ' mm wide is outside the range this rule covers '
          + '(80-220 mm) — measure in millimetres.');
        return;
      }
      if (length < 100 || length > 280) {
        ctx.addUnmetCondition('A face ' + snum(length, 0) + ' mm long is outside the range this rule covers — '
          + 'measure from the hairline to the bottom of the chin, in millimetres.');
        return;
      }

      var shape = shapeFrom(forehead, cheek, jaw, length, v.sharpness);
      var info = SHAPES[shape.id];
      var male = Math.round(Number(v.gender)) === 1;

      /*
       * Frame width: as wide as the widest part of the head. The arms sit just
       * outside the temples, so the frame is a few millimetres wider than the
       * cheekbones — and a little wider again on a man's heavier head.
       */
      var widest = Math.max(forehead, cheek, jaw);
      var frameWidth = widest + (male ? 4 : 2);
      /* a standard bridge, nudged by the width of the face */
      var bridge = (male ? 18 : 16) + Math.round((cheek - 140) / 40);
      bridge = Math.max(13, Math.min(24, bridge));
      /* the printed size is lens + bridge + lens; the rim adds about 10 mm a side */
      var lens = Math.round((frameWidth - bridge) / 2 - 10);
      lens = Math.max(38, Math.min(62, lens));
      /* arms: about three-quarters of the length of the face, in the usual band */
      var temple = Math.round(length * 0.78 / 5) * 5;
      temple = Math.max(130, Math.min(155, temple));

      ctx.exportValue('face_shape', shape.id);
      ctx.exportValue('frame_width', frameWidth);
      ctx.exportValue('lens_width', lens);
      ctx.exportValue('bridge_width', bridge);
      ctx.exportValue('temple_length', temple);
      ctx.exportValue('face_ratio', sround(shape.ratio, 2));

      ctx.addHtml('<p><strong>Your face is ' + info.name + ' (length ' + snum(length, 0) + ' mm against a '
        + snum(cheek, 0) + ' mm width, a ratio of ' + snum(shape.ratio, 2) + '). Look for a frame about '
        + frameWidth + ' mm wide, printed as ' + lens + '&#9633;' + bridge + '&#8211;' + temple
        + '.</strong></p>');

      ctx.addHtml('<p>' + info.fits + ' ' + info.avoid + '</p>');

      var rows = [
        ['Forehead', snum(forehead, 0) + ' mm'],
        ['Cheekbones', snum(cheek, 0) + ' mm'],
        ['Jawline', snum(jaw, 0) + ' mm'],
        ['Face length', snum(length, 0) + ' mm'],
        ['Face shape', info.name],
        ['Frame width', frameWidth + ' mm'],
        ['Lens width', lens + ' mm'],
        ['Bridge', bridge + ' mm'],
        ['Temple length', temple + ' mm'],
        ['That is printed as', lens + '&#9633;' + bridge + '&#8211;' + temple],
        ['Typical lens width for a ' + (male ? 'man' : 'woman'), (male ? '54-58' : '50-54') + ' mm'],
        ['Typical total width', (male ? '140-150' : '130-140') + ' mm']
      ];
      ctx.addHtml(stable(['Measurement', 'Your face'], rows));

      /* the ratio test, so a near miss is visible */
      var checks = [
        ['Forehead wider than the cheekbones by more than 3 %', forehead > cheek * 1.03 ? 'yes' : 'no'],
        ['Cheekbones wider than the jawline by more than 3 %', cheek > jaw * 1.03 ? 'yes' : 'no'],
        ['Forehead and cheekbones within 5 %', Math.abs(forehead - cheek) / cheek < 0.05 ? 'yes' : 'no'],
        ['Cheekbones and jawline within 5 %', Math.abs(cheek - jaw) / cheek < 0.05 ? 'yes' : 'no'],
        ['Length more than 1.4 × the width', shape.ratio > 1.4 ? 'yes' : 'no']
      ];
      ctx.addHtml('<p>How the shape was decided:</p>');
      ctx.addHtml(stable(['Test', 'Result'], checks));

      ctx.addHtml('<p class="calc-unmet">Measure across the widest part of the forehead, across the '
        + 'cheekbones, across the jaw at its widest point, and from the hairline to the bottom of the chin, '
        + 'all in millimetres and all on the same head. The three numbers printed inside the arm of any pair '
        + 'of glasses are lens&#9633;bridge&#8211;temple, so the size above can be compared with a pair you '
        + 'already own: within 2 mm in any of the three is close enough. Two people with the same face shape '
        + 'still differ in which frame they like, and the fit that actually matters is the arm length and '
        + 'where the bridge sits on the nose — try the pair on if you can. Prescription lenses, wrap frames '
        + 'and very curved styles change the fit, so ask the optician when you order.</p>');
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        The answer is what the Sunglasses size calculator works out, and it gets there from the forehead width, the cheeks width, the jawline length and the face length.
        TXT,
        'sections' => [
            ['title' => 'How does the Sunglasses size calculator work?', 'html' => <<<'TXT'
            <p>The Sunglasses size calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the sex); then you type in the forehead width, the cheeks width, the jawline length and the face length.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as female and male. </li><li>A single on/off switch — tick it for &ldquo;I know how to measure my face&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>Pick the option that matches your case — 3 options, such as sharp, in the middle and round. </li></ul><p>3 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Sex</strong></td><td>One of 2 options, such as female and male.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Forehead width</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Cheeks width</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Jawline length</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Face length</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Sunglasses size calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 4 figures keep coming back — the forehead width, the cheeks width and the jawline length — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Sunglasses size calculator, these are the ones that matter:</p>
            <ul><li>The 3 drop-downs on this page offer a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li><li>There is nothing to invert here: the result is produced in one direction only, from the values you supply.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/fuel-distance">Fuel distance</a>, <a href="/everyday-life/fuel-injector">Fuel injector</a> and <a href="/everyday-life/fuel-mileage">Fuel mileage</a>.</p>
            TXT],
            ['title' => 'Using face measurements to narrow frame options', 'html' => <<<'TXT'
            <p>The Sunglasses size calculator uses face measurements and a face-shape classification to suggest frame dimensions or style guidance. Measure the forehead, cheek area, jawline and face length as the form describes, using a soft tape or a ruler with a mirror. Keep the tape level, avoid pulling it tight and record the units. These measurements help compare proportions; they do not determine which frame will feel comfortable or suit every preference.</p>
            <p>Frame width, lens width, bridge width and temple length describe different parts of eyewear. A frame can match face width but still slip at the nose or press at the temples. Compare the calculator’s outputs with the measurements printed inside a pair that fits well, often shown as lens width, bridge width and temple length. Those numbers are a useful starting reference but do not capture every curve or material.</p>
            <p>Face-shape categories are simplifications. People may not fit one category cleanly, and the calculator’s style suggestions are not rules about what someone should wear. Choose frames based on comfort, vision needs, personal taste and the intended activity. Try them on when possible, check that the bridge rests securely and make sure the frame does not interfere with eyelashes or peripheral vision.</p>
            <p>Sunglasses protection is separate from frame size and style. A size calculator cannot verify UV protection, lens quality, polarization, impact resistance or compliance with a safety standard. Check product labeling and manufacturer documentation for the protection you need. For prescription eyewear or a medical concern, consult an optician or eye-care professional.</p>
            <p>Measurement conditions can affect results: hair, facial expression, tape placement and whether the face is measured straight-on all matter. If a number seems inconsistent with your current glasses, verify the unit and repeat the measurement. A frame’s actual fit also depends on lens curvature, nose pads, hinge angle and material flexibility.</p>
            <p>Use the output to filter a broad selection, then test the actual frame. A comfortable pair should stay in place without painful pressure and suit the task. The calculator offers a sizing and style starting point, not a guarantee of fit, appearance or eye protection.</p>
            TXT],
            ['title' => 'Check frame dimensions against a pair that fits', 'html' => <<<'TXT'
            <p>If you own sunglasses that sit comfortably, note the numbers printed on the inside of the temple. They often describe lens width, bridge width and temple length. Use them as a comparison, not as a perfect blueprint: frame curvature, nose pads, hinge position and material can make two frames with the same numbers feel different.</p><p>Check that the frame width does not pinch at the temples or slide down the nose. The bridge should rest securely, and the lenses should cover the area needed for the activity without obstructing peripheral vision. A wider lens or different bridge shape may suit the same face measurements better than changing every dimension.</p><p>For sports or driving, frame stability and lens choice may matter as much as appearance. Use eyewear designed for the intended activity and follow product safety information. A style or size suggestion from this calculator does not establish impact resistance or suitability for protective use.</p><p>Lens protection should be confirmed separately from size. Look for clear manufacturer information about ultraviolet protection and any optical standards relevant to your location. A dark tint alone does not prove UV filtering. If you need prescription sunglasses or have an eye condition, ask an optician or eye-care professional.</p>
            TXT],
            ['title' => 'Treat face-shape guidance as optional', 'html' => <<<'TXT'
            <p>Face-shape labels are broad style categories, not a requirement for choosing eyewear. If the calculator suggests a shape or dimension that you dislike, choose a different frame. Color, material, coverage, weight and personal style may matter more than matching a generalized proportion rule.</p><p>For prescription lenses, lens height, frame curvature and the optical center can affect whether a frame can be fitted correctly. Ask an optician to confirm compatibility for the prescription and lens type. The calculator does not assess optical fit or make a prescription recommendation.</p><p>For children or sports, fit and product-specific safety standards deserve priority over style. Confirm that frames stay in place and meet the maker’s intended-use guidance before relying on them.</p>
            TXT],
            ['title' => 'Confirm fit in person where possible', 'html' => <<<'TXT'
            <p>Try the frame on and check the bridge, temple pressure and lens coverage. A measurement-based suggestion cannot reproduce the feel of the frame or account for individual comfort. If you buy online, verify the return policy and product dimensions before ordering.</p><p>Confirm UV and impact claims from manufacturer documentation, not from the frame size or lens tint. Protection is a separate product specification.</p>
            TXT],
            ['title' => 'Use the result alongside optical and safety needs', 'html' => <<<'TXT'
            <p>If you need prescription lenses, confirm that the frame size and shape can accommodate the prescription with an optician. Lens thickness, wrap angle and optical alignment can affect the final fit. A face-measurement tool cannot validate those properties.</p><p>For outdoor use, check the product’s UV information and choose a lens appropriate for the activity. Tint darkness alone does not establish ultraviolet protection. For impact protection, verify the product’s specified standard and intended use.</p><p>The calculator can help you search by dimensions, but comfort, optical fit and verified protection should guide the final selection.</p>
            TXT],
            ['title' => 'Check measurements in the seller’s own units', 'html' => <<<'TXT'
            <p>Frame dimensions may be listed in millimeters, while face measurements may have been taken in centimeters or inches. Convert carefully and verify that each number refers to the same part of the frame before comparing. Keep the original unit visible in your notes.</p><p>If a frame feels uncomfortable despite matching the numbers, try another bridge shape or temple design. The physical fit is more informative than a numerical match.</p>
            TXT],
            ['title' => 'Check the frame before relying on the suggestion', 'html' => <<<'TXT'
            <p>Confirm that the frame sits securely without pinching or slipping, and check that the lenses provide the coverage you want. A size match does not establish comfort or protection; inspect the actual product and its documentation.</p>
            TXT],
            ['title' => 'Style suggestions remain optional', 'html' => <<<'TXT'
            <p>Face-shape labels are broad categories and may not describe every person. Choose a frame that feels comfortable and suits your taste, even if it differs from the calculator’s suggestion.</p>
            TXT],
            ['title' => 'Use an optician for prescription fit', 'html' => <<<'TXT'
            <p>If the glasses need prescription lenses, have an optician confirm frame compatibility and optical alignment. The calculator only estimates dimensions and style; it cannot verify prescription fit.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which face measurements should I enter?', 'a' => 'Measure the forehead, cheek, jawline and face dimensions requested by the form, and choose the listed options that describe you. Keep the measurement units consistent with the unit controls.'],
            ['q' => 'What does the sunglasses-size result tell me?', 'a' => 'It provides a sizing or style estimate from the entered measurements and choices. Use it to narrow options, then compare the actual frame dimensions with glasses you already find comfortable.'],
            ['q' => 'Does the result guarantee that a frame will fit?', 'a' => 'No. Frame shape, bridge width, temple length and brand sizing also affect fit. The calculator is a guide, not a substitute for checking the manufacturer’s measurements or trying the frame.'],
        ],
        'related' => [
            ['path' => '/everyday-life/fuel-distance', 'name' => 'Fuel distance'],
            ['path' => '/everyday-life/fuel-injector', 'name' => 'Fuel injector'],
            ['path' => '/everyday-life/fuel-mileage', 'name' => 'Fuel mileage'],
        ],
    ],
];
