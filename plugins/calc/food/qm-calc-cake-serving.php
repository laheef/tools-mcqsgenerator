<?php

/**
 * Cake serving
 * /food/cake-serving
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cake serving',
    'meta' => ['title' => 'Cake serving Calculator — Formula & Results', 'description' => 'Estimate cake dimensions or servings from guest count, shape and slice size. Use as a planning guide; adjust for your guests and menu.', 'h1' => 'Cake serving Calculator', 'updated' => '2026-08-04'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'people_number',
                            'label' => 'People at the party',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR3_FR1',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'cake_shape_VS',
                            'label' => 'I would like to have',
                            'type' => 'select',
                            'options' => ['round' => '0', 'square' => '1'],
                            'dataset' => 'shape_cake',
                            'control' => 'DROPDOWN',
                            'suffix' => 'cake',
                            'default' => 'round',
                        ],
                        ['type' => 'image', 'url' => '/cake-round-pink.svg'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'custom_slices_sizes_checkbox',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Input your own slices\' sizes' => '1', '' => '0'],
                            'dataset' => 'custom_slices_sizes_DS',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'slice_finger_area',
                            'label' => 'Finger size slice',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'rounding' => ['omni', '0.001'],
                            'defaults' => [
                                ['value' => '6.45', 'when' => null],
                                ['value' => '1', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'slice_small_area',
                            'label' => 'Small slice',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'rounding' => ['omni', '0.001'],
                            'defaults' => [
                                ['value' => '12.9', 'when' => null],
                                ['value' => '2', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'slice_medium_area',
                            'label' => 'Standard slice',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'rounding' => ['omni', '0.001'],
                            'defaults' => [
                                ['value' => '19.35', 'when' => null],
                                ['value' => '3', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'slice_big_area',
                            'label' => 'Big slice',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'cm2',
                            'rounding' => ['omni', '0.001'],
                            'defaults' => [
                                ['value' => '25.8', 'when' => null],
                                ['value' => '4', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tier_diameter_difference_VS',
                            'label' => 'Difference between tiers',
                            'type' => 'select',
                            'options' => ['2 in (5 cm)' => '1', '3 in (7.5 cm)' => '1.5'],
                            'dataset' => 'layers_dif',
                            'control' => 'DROPDOWN',
                            'default' => '2 in (5 cm)',
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
                    'columns' => 3,
                    'place' => [0, 0, 1, 2],
                    'fields' => [
                        [
                            'name' => 'diameter_finger',
                            'label' => 'Diameter finger',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                        [
                            'name' => 'diameter_medium',
                            'label' => 'Diameter medium',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diameter_small',
                            'label' => 'Diameter small',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diameter_big',
                            'label' => 'Diameter big',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 4,
                    'place' => [0, 1, 2, 3],
                    'fields' => [
                        [
                            'name' => 'tier_finger',
                            'label' => 'Tier finger',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tier_small',
                            'label' => 'Tier small',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tier_medium',
                            'label' => 'Tier medium',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tier_big',
                            'label' => 'Tier big',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [
                        0,
                        0,
                        0,
                        0,
                        1,
                        1,
                        1,
                        1,
                    ],
                    'fields' => [
                        [
                            'name' => 'diameter_finger_ceil_in',
                            'label' => 'Diameter finger ceil in',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diameter_small_ceil_in',
                            'label' => 'Diameter small ceil in',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diameter_medium_ceil_in',
                            'label' => 'Diameter medium ceil in',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diameter_big_ceil_in',
                            'label' => 'Diameter big ceil in',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diameter_finger_ceil_cm',
                            'label' => 'Diameter finger ceil cm',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diameter_small_ceil_cm',
                            'label' => 'Diameter small ceil cm',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diameter_medium_ceil_cm',
                            'label' => 'Diameter medium ceil cm',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'diameter_big_ceil_cm',
                            'label' => 'Diameter big ceil cm',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 0, 1, 1],
                    'fields' => [
                        [
                            'name' => 'tier_finger_top_ceil_in',
                            'label' => 'Tier finger top ceil in',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tier_finger_bottom_ceil_in',
                            'label' => 'Tier finger bottom ceil in',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tier_finger_top_ceil_cm',
                            'label' => 'Tier finger top ceil cm',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tier_finger_bottom_ceil_cm',
                            'label' => 'Tier finger bottom ceil cm',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 0, 1, 1],
                    'fields' => [
                        [
                            'name' => 'tier_small_top_ceil_in',
                            'label' => 'Tier small top ceil in',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tier_small_bottom_ceil_in',
                            'label' => 'Tier small bottom ceil in',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tier_small_top_ceil_cm',
                            'label' => 'Tier small top ceil cm',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tier_small_bottom_ceil_cm',
                            'label' => 'Tier small bottom ceil cm',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 0, 1, 1],
                    'fields' => [
                        [
                            'name' => 'tier_medium_top_ceil_in',
                            'label' => 'Tier medium top ceil in',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tier_medium_bottom_ceil_in',
                            'label' => 'Tier medium bottom ceil in',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tier_medium_top_ceil_cm',
                            'label' => 'Tier medium top ceil cm',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tier_medium_bottom_ceil_cm',
                            'label' => 'Tier medium bottom ceil cm',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 0, 1, 1],
                    'fields' => [
                        [
                            'name' => 'tier_big_top_ceil_in',
                            'label' => 'Tier big top ceil in',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tier_big_bottom_ceil_in',
                            'label' => 'Tier big bottom ceil in',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tier_big_top_ceil_cm',
                            'label' => 'Tier big top ceil cm',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tier_big_bottom_ceil_cm',
                            'label' => 'Tier big bottom ceil cm',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1, 1],
                    'fields' => [
                        [
                            'name' => 'square_side_finger',
                            'label' => 'Square side finger',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'square_side_finger_ceil_in',
                            'label' => 'Square side finger ceil in',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'square_side_finger_ceil_cm',
                            'label' => 'Square side finger ceil cm',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1, 1],
                    'fields' => [
                        [
                            'name' => 'square_side_small',
                            'label' => 'Square side small',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'square_side_small_ceil_in',
                            'label' => 'Square side small ceil in',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'square_side_small_ceil_cm',
                            'label' => 'Square side small ceil cm',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1, 1],
                    'fields' => [
                        [
                            'name' => 'square_side_medium',
                            'label' => 'Square side medium',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'square_side_medium_ceil_in',
                            'label' => 'Square side medium ceil in',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'square_side_medium_ceil_cm',
                            'label' => 'Square side medium ceil cm',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1, 1],
                    'fields' => [
                        [
                            'name' => 'square_side_big',
                            'label' => 'Square side big',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'square_side_big_ceil_in',
                            'label' => 'Square side big ceil in',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'square_side_big_ceil_cm',
                            'label' => 'Square side big ceil cm',
                            'type' => 'presentation',
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
                            'name' => 'cake_diameter_cm',
                            'label' => 'Round cake diameter (cm)',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cake_side_cm',
                            'label' => 'Square cake side (cm)',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'slice_area_cm2',
                            'label' => 'Slice area used (cm²)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_area_cm2',
                            'label' => 'Cake area needed (cm²)',
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
    
    /* the usual slice sizes, in square centimetres of cake surface */
    var SLICES = { finger: 12, small: 30, medium: 60, big: 90 };
    
    omni.onResult([], function (ctx, v) {
      var people = Number(v.people_number);
      if (v.people_number === '' || !isFinite(people) || people < 1) {
        ctx.addUnmetCondition('How many people are coming?');
        return;
      }
      people = Math.ceil(people);
      var square = Math.round(Number(v.cake_shape_VS)) === 1;
      var custom = String(v.custom_slices_sizes_checkbox) === '1';
    
      var areas = { finger: SLICES.finger, small: SLICES.small, medium: SLICES.medium, big: SLICES.big };
      if (custom) {
        var keys = ['finger', 'small', 'medium', 'big'];
        for (var i = 0; i < keys.length; i++) {
          var raw = v['slice_' + keys[i] + '_area'];
          if (raw === '' || raw === undefined || !isFinite(Number(raw)) || Number(raw) <= 0) {
            ctx.addUnmetCondition('Each custom slice size needs a positive area in cm².');
            return;
          }
          areas[keys[i]] = Number(raw);
        }
      }
    
      /* the party is fed by the standard dessert slice unless the visitor says otherwise */
      var used = custom ? (areas.medium || SLICES.medium) : SLICES.medium;
      var total = people * used;
      var diameter = 2 * Math.sqrt(total / Math.PI);
      var side = Math.sqrt(total);
    
      ctx.exportValue('slice_area_cm2', sround(used, 0));
      ctx.exportValue('total_area_cm2', sround(total, 0));
      ctx.exportValue('cake_diameter_cm', sround(diameter, 1));
      ctx.exportValue('cake_side_cm', sround(side, 1));
    
      var rows = Object.keys(areas).map(function (k) {
        var need = people * areas[k];
        return [k.charAt(0).toUpperCase() + k.slice(1) + ' slice (' + snum(areas[k], 0) + ' cm²)',
                snum(need / Math.PI, 0) ? snum(2 * Math.sqrt(need / Math.PI), 1) + ' cm round'
                  : '', snum(Math.sqrt(need), 1) + ' cm square'];
      });
    
      ctx.addHtml('<p><strong>For ' + people + ' people you need about ' + snum(total, 0) + ' cm² of cake — a '
        + snum(diameter, 1) + ' cm round tin or a ' + snum(side, 1) + ' cm square one.</strong></p>');
      ctx.addHtml(stable(['Slice size', 'Round cake', 'Square cake'], rows));
      ctx.addHtml('<p class="calc-unmet">' + (square ? 'You chose a square cake, so the side is the figure to '
        + 'order. ' : 'You chose a round cake, so the diameter is the figure to order. ')
        + 'A standard dessert slice is about 60 cm²; finger food is a quarter of that and a generous party slice '
        + 'half again as big. For a tiered cake each tier is ' + snum(Number(v.tier_diameter_difference_VS) === 1 ? 5 : 7.5, 1)
        + ' cm smaller than the one below, and the sizes above apply to the largest tier.</p>');
    });
    TXT,
    'showIf' => ['slice_finger_area' => 'custom_slices_sizes_checkbox == 1', 'slice_small_area' => 'custom_slices_sizes_checkbox == 1', 'slice_medium_area' => 'custom_slices_sizes_checkbox == 1', 'slice_big_area' => 'custom_slices_sizes_checkbox == 1'],
    'article' => [
        'intro' => <<<'TXT'
        Enter People at the party, I would like to have and Finger size slice into Cake serving and the answer comes back as Round cake diameter (cm) and Square cake side (cm). Nothing is looked up on this page: round cake diameter (cm) is computed from people at the party and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Cake serving calculator works', 'html' => <<<'TXT'
            <p>The Cake serving calculator applies one relationship to 51 numbers and reports Round cake diameter (cm), Square cake side (cm) and Slice area used (cm²).</p><p>The answers are Round cake diameter (cm), Square cake side (cm), Slice area used (cm²) and Cake area needed (cm²); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 51 boxes, and nothing else.</p><ul><li><strong>People at the party</strong> — a plain number, no unit</li><li><strong>I would like to have</strong> — in cake</li><li><strong>Finger size slice</strong> — in square centimeters</li><li><strong>Small slice</strong> — in square centimeters</li><li><strong>Standard slice</strong> — in square centimeters</li><li><strong>Big slice</strong> — in square centimeters</li><li><strong>Difference between tiers</strong> — a plain number, no unit</li><li><strong>Diameter finger</strong> — a plain number, no unit</li><li><strong>Diameter medium</strong> — a plain number, no unit</li><li><strong>Diameter small</strong> — a plain number, no unit</li><li><strong>Diameter big</strong> — a plain number, no unit</li><li><strong>Tier finger</strong> — a plain number, no unit</li><li><strong>Tier small</strong> — a plain number, no unit</li><li><strong>Tier medium</strong> — a plain number, no unit</li><li><strong>Tier big</strong> — a plain number, no unit</li><li><strong>Diameter finger ceil in</strong> — a plain number, no unit</li><li><strong>Diameter small ceil in</strong> — a plain number, no unit</li><li><strong>Diameter medium ceil in</strong> — a plain number, no unit</li><li><strong>Diameter big ceil in</strong> — a plain number, no unit</li><li><strong>Diameter finger ceil cm</strong> — a plain number, no unit</li><li><strong>Diameter small ceil cm</strong> — a plain number, no unit</li><li><strong>Diameter medium ceil cm</strong> — a plain number, no unit</li><li><strong>Diameter big ceil cm</strong> — a plain number, no unit</li><li><strong>Tier finger top ceil in</strong> — a plain number, no unit</li><li><strong>Tier finger bottom ceil in</strong> — a plain number, no unit</li><li><strong>Tier finger top ceil cm</strong> — a plain number, no unit</li><li><strong>Tier finger bottom ceil cm</strong> — a plain number, no unit</li><li><strong>Tier small top ceil in</strong> — a plain number, no unit</li><li><strong>Tier small bottom ceil in</strong> — a plain number, no unit</li><li><strong>Tier small top ceil cm</strong> — a plain number, no unit</li><li><strong>Tier small bottom ceil cm</strong> — a plain number, no unit</li><li><strong>Tier medium top ceil in</strong> — a plain number, no unit</li><li><strong>Tier medium bottom ceil in</strong> — a plain number, no unit</li><li><strong>Tier medium top ceil cm</strong> — a plain number, no unit</li><li><strong>Tier medium bottom ceil cm</strong> — a plain number, no unit</li><li><strong>Tier big top ceil in</strong> — a plain number, no unit</li><li><strong>Tier big bottom ceil in</strong> — a plain number, no unit</li><li><strong>Tier big top ceil cm</strong> — a plain number, no unit</li><li><strong>Tier big bottom ceil cm</strong> — a plain number, no unit</li><li><strong>Square side finger</strong> — a plain number, no unit</li><li><strong>Square side finger ceil in</strong> — a plain number, no unit</li><li><strong>Square side finger ceil cm</strong> — a plain number, no unit</li><li><strong>Square side small</strong> — a plain number, no unit</li><li><strong>Square side small ceil in</strong> — a plain number, no unit</li><li><strong>Square side small ceil cm</strong> — a plain number, no unit</li><li><strong>Square side medium</strong> — a plain number, no unit</li><li><strong>Square side medium ceil in</strong> — a plain number, no unit</li><li><strong>Square side medium ceil cm</strong> — a plain number, no unit</li><li><strong>Square side big</strong> — a plain number, no unit</li><li><strong>Square side big ceil in</strong> — a plain number, no unit</li><li><strong>Square side big ceil cm</strong> — a plain number, no unit</li></ul><p>The result boxes are Round cake diameter (cm), Square cake side (cm), Slice area used (cm²), Cake area needed (cm²); they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Finger size slice, Small slice and Standard slice carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Round cake diameter (cm), Square cake side (cm) and Slice area used (cm²) are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>People at the party left as a guess.</strong> Anything typed into People at the party is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>I would like to have left as a guess.</strong> Anything typed into I would like to have is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> If People at the party is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Cake serving is not a single equation with a single answer. It reads People at the party, I would like to have, Finger size slice and Small slice, applies the analysis the page is built around, and reports Round cake diameter (cm), Square cake side (cm), Slice area used (cm²) and Cake area needed (cm²).</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Round cake diameter (cm), Square cake side (cm), Slice area used (cm²) and Cake area needed (cm²). They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need People at the party, I would like to have, Finger size slice and Small slice. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type People at the party into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Round cake diameter (cm) with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Round cake diameter (cm) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are square centimeters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes People at the party, I would like to have and Finger size slice are measured, independent and in the unit the chip says. </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: People at the party, I would like to have and Finger size slice measured, Round cake diameter (cm) and Square cake side (cm) wanted.</p><p>If the result seems unexpected, recheck the inputs and units before using it.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/taco-bar">Taco bar Calculator</a>, <a href="/food/thanksgiving-calories">Thanksgiving Calories</a> and <a href="/food/thanksgiving">Thanksgiving</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cake serving calculator work out?', 'a' => 'Round cake diameter (cm), Square cake side (cm), Slice area used (cm²) and Cake area needed (cm²).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            People at the party, I would like to have (cake), Finger size slice (square centimeters), Small slice (square centimeters), Standard slice (square centimeters). Fill people at the party, i would like to have and finger size slice and leave Round cake diameter (cm) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Round cake diameter (cm) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Round cake diameter (cm), so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Round cake diameter (cm) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/cake-pans', 'name' => 'Cake pan'],
            ['path' => '/food/cake-pricing', 'name' => 'Cake pricing'],
            ['path' => '/food/thanksgiving', 'name' => 'Thanksgiving']
        ],
    ],
];
