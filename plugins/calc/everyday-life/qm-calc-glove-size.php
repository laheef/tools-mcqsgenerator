<?php

/**
 * Glove size
 * /everyday-life/glove-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Glove size',
    'meta' => ['title' => 'Glove size Calculator: Formula, Steps & Examples', 'description' => 'Glove size solves for any one of style of glove, hand circumference and for men\'s or unisex glove size of..., given the rest. Any box can be the unknown.', 'h1' => 'Glove size Calculator', 'updated' => '2024-11-08'],
    'raw' => [
        'vars' => [
            'chooseSize_men' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => 'IJpGpbKidK_NDbMyYp8QO'],
            'chooseSize_women' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => 'l69Yr_yq0DPnSGxl5bkr4'],
            'first_men' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'first_women' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'gender' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'IvNxaEfANugeuiRn4qWeo', 'c' => null],
                ],
                'ds' => '2734',
            ],
            'hand_circumference' => ['type' => 'valueSelect', 'rnd' => null, 'ds' => '2nHUUvbX5t6bJV3_SWkPq'],
            'last_men' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'last_women' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'max_men_cm' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'max_men_in' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'max_women_cm' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'max_women_in' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'men_size' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'min_men_cm' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'min_men_in' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'min_women_cm' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'min_women_in' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'numerical' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'women_size' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'glove_size' => [
                'type' => 'dependent',
                'rnd' => ['standard', '1'],
            ],
            'hand_cm' => [
                'type' => 'dependent',
                'rnd' => ['standard', '1'],
            ],
            'letter_size' => [
                'type' => 'dependent',
                'rnd' => ['standard', '0'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'ejGoDiCerYUNA0KwcU6kO',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'gender',
                                    'vt' => 'valueSelect',
                                    'l' => 'Style of glove',
                                    'ds' => '2734',
                                    'opts' => [
                                        ['uJUAcIxu_A2gEXoYMp728', ' Man / Unisex', '0'],
                                        ['IvNxaEfANugeuiRn4qWeo', ' Woman', '1'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'i3xWw1ldd1rYGM_Dn2SGq',
                'title' => 'Hand measurement ',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'i',
                                    'u' => ['gloves/hand-width-measurement.png'],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'hand_circumference',
                                    'vt' => 'valueSelect',
                                    'l' => 'Hand circumference',
                                    'ds' => '2nHUUvbX5t6bJV3_SWkPq',
                                    'opts' => [
                                        ['AMe8xpTnk99I3WAB9AV4K', '6.0 in or 15.0 cm', '1'],
                                        ['Gr5BNgzerEygsB9Rb6sad', '6.5 in or 16.5 cm', '2'],
                                        ['vOFIhU72rqrAdt1J15He7', '7.0 in or 18.0 cm', '3'],
                                        ['LdpyTlgX6-YQD4q_A-4um', '7.5 in or 19.0 cm', '4'],
                                        ['yVkrn0WyzzGtgO9RLy2WE', '8.0 in or 20.5 cm', '5'],
                                        ['bc1eXYcHh_knO2WNNLZ2n', '8.5 in or 21.5 cm', '6'],
                                        ['8YailXFgCBMGzKNq73cvZ', '9.0 in or 23.0 cm', '7'],
                                        ['D1MXFXdAeoLsA5BlK0IFG', '9.5 in or 24.0 cm', '8'],
                                        ['SjotmCDPL_Aj58lN35o16', '10.0 in or 26.0 cm', '9'],
                                        ['hha6_dInltzcdEp7pw5h5', '10.5 in or 27.0 cm', '10'],
                                        ['qmQDc-MhcDJfDbvFucRPT', '11.0 in or 28.5 cm', '11'],
                                        ['7-knS22v_uDXYG2VnckCn', '11.5 in or 29.5 cm', '12'],
                                        ['zNAPsR77CFqnmU9sbtTj8', '12.0 in or 30.5 cm', '13'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'HNZnhA-esc3LSQkcRb5rN',
                'title' => 'Glove size ',
                'desc' => '',
                'm' => [],
            ],
            [
                'uid' => 'YLlC8Rlir7IfKnjvSn8lC',
                'title' => 'Glove size to hand measurement ',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'chooseSize_men',
                                    'vt' => 'valueSelect',
                                    'l' => 'For men\'s or unisex glove size of...',
                                    'ds' => 'IJpGpbKidK_NDbMyYp8QO',
                                    'opts' => [
                                        ['JZnd1dO-36lCZIgWvIWSI', 'XS or sizes 7 to 7.5', '1'],
                                        ['_QoWDQpfEuaoc6kP_XSLB', 'S or sizes 7.5 to 8.5', '2'],
                                        ['KpmkAFzQ1ljKANOUkaZI6', 'M or sizes 8.5 to 9.5', '3'],
                                        ['2S6IiV9hGz45mq-d7dk_P', 'L or sizes 9.5 to 10.5', '4'],
                                        ['nErWogt79GBTx5rU7DCNN', 'XL or sizes 10.5 to 11.5', '5'],
                                        ['IckXIM4dRybBikT2RIpm8', 'XXL or sizes 11.5 to 12', '6'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'chooseSize_women',
                                    'vt' => 'valueSelect',
                                    'l' => 'For women\'s glove size of...',
                                    'ds' => 'l69Yr_yq0DPnSGxl5bkr4',
                                    'opts' => [
                                        ['qcT2Xul0-dY4-CM4Wtjkf', 'XS or sizes 6 to 6.5', '1'],
                                        ['mUe1c-ETpZx1C9lvCJaWB', 'S or size 6.5', '2'],
                                        ['vsOVZxawd9eXpSs_SdUMo', 'M or sizes 7 to 7.5', '3'],
                                        ['mOiE4gtdQzYyTg40nM3_L', 'L or sizes 7.5 - 8', '4'],
                                        ['HM2hbuWdTYU4kgWLB6U_l', 'XL or sizes 8 to 8.5', '5'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'JbNfdp1B0vcHl8TiO7MyV',
                'title' => 'Hidden variables',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'min_men_in',
                                    'vt' => 'dependent',
                                    'l' => '',
                                    'us' => '4',
                                    'du' => 'inch',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'max_men_in',
                                    'vt' => 'dependent',
                                    'l' => '',
                                    'us' => '4',
                                    'du' => 'inch',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'min_women_in',
                                    'vt' => 'dependent',
                                    'l' => '',
                                    'us' => '4',
                                    'du' => 'inch',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'max_women_in',
                                    'vt' => 'dependent',
                                    'l' => '',
                                    'us' => '4',
                                    'du' => 'inch',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'min_men_cm', 'vt' => 'dependent', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'max_men_cm', 'vt' => 'dependent', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'min_women_cm', 'vt' => 'dependent', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'max_women_cm', 'vt' => 'dependent', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'first_men', 'vt' => 'dependent', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'first_women', 'vt' => 'dependent', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'men_size', 'vt' => 'dependent', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'women_size', 'vt' => 'dependent', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'last_men', 'vt' => 'dependent', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'last_women', 'vt' => 'dependent', 'l' => ''],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'numerical', 'vt' => 'dependent', 'l' => ''],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'supp-results',
                'title' => 'Results',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'glove_size', 'vt' => 'dependent', 'l' => 'Glove size'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'hand_cm', 'vt' => 'dependent', 'l' => 'Hand circumference (cm)'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [],
        'datasets' => [
            '2734' => [
                'name' => 'sex',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'uJUAcIxu_A2gEXoYMp728', 'label' => ' Man / Unisex', 'value' => '0'],
                    ['uid' => 'IvNxaEfANugeuiRn4qWeo', 'label' => ' Woman', 'value' => '1'],
                ],
            ],
            'IJpGpbKidK_NDbMyYp8QO' => [
                'name' => 'Size to width (men)',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'JZnd1dO-36lCZIgWvIWSI', 'label' => 'XS or sizes 7 to 7.5', 'value' => '1'],
                    ['uid' => '_QoWDQpfEuaoc6kP_XSLB', 'label' => 'S or sizes 7.5 to 8.5', 'value' => '2'],
                    ['uid' => 'KpmkAFzQ1ljKANOUkaZI6', 'label' => 'M or sizes 8.5 to 9.5', 'value' => '3'],
                    ['uid' => '2S6IiV9hGz45mq-d7dk_P', 'label' => 'L or sizes 9.5 to 10.5', 'value' => '4'],
                    ['uid' => 'nErWogt79GBTx5rU7DCNN', 'label' => 'XL or sizes 10.5 to 11.5', 'value' => '5'],
                    ['uid' => 'IckXIM4dRybBikT2RIpm8', 'label' => 'XXL or sizes 11.5 to 12', 'value' => '6'],
                ],
            ],
            'l69Yr_yq0DPnSGxl5bkr4' => [
                'name' => 'Size to width (women)',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'qcT2Xul0-dY4-CM4Wtjkf', 'label' => 'XS or sizes 6 to 6.5', 'value' => '1'],
                    ['uid' => 'mUe1c-ETpZx1C9lvCJaWB', 'label' => 'S or size 6.5', 'value' => '2'],
                    ['uid' => 'vsOVZxawd9eXpSs_SdUMo', 'label' => 'M or sizes 7 to 7.5', 'value' => '3'],
                    ['uid' => 'mOiE4gtdQzYyTg40nM3_L', 'label' => 'L or sizes 7.5 - 8', 'value' => '4'],
                    ['uid' => 'HM2hbuWdTYU4kgWLB6U_l', 'label' => 'XL or sizes 8 to 8.5', 'value' => '5'],
                ],
            ],
            '2nHUUvbX5t6bJV3_SWkPq' => [
                'name' => 'Width to size',
                'uiType' => 'DROPDOWN',
                'options' => [
                    ['uid' => 'AMe8xpTnk99I3WAB9AV4K', 'label' => '6.0 in or 15.0 cm', 'value' => '1'],
                    ['uid' => 'Gr5BNgzerEygsB9Rb6sad', 'label' => '6.5 in or 16.5 cm', 'value' => '2'],
                    ['uid' => 'vOFIhU72rqrAdt1J15He7', 'label' => '7.0 in or 18.0 cm', 'value' => '3'],
                    ['uid' => 'LdpyTlgX6-YQD4q_A-4um', 'label' => '7.5 in or 19.0 cm', 'value' => '4'],
                    ['uid' => 'yVkrn0WyzzGtgO9RLy2WE', 'label' => '8.0 in or 20.5 cm', 'value' => '5'],
                    ['uid' => 'bc1eXYcHh_knO2WNNLZ2n', 'label' => '8.5 in or 21.5 cm', 'value' => '6'],
                    ['uid' => '8YailXFgCBMGzKNq73cvZ', 'label' => '9.0 in or 23.0 cm', 'value' => '7'],
                    ['uid' => 'D1MXFXdAeoLsA5BlK0IFG', 'label' => '9.5 in or 24.0 cm', 'value' => '8'],
                    ['uid' => 'SjotmCDPL_Aj58lN35o16', 'label' => '10.0 in or 26.0 cm', 'value' => '9'],
                    ['uid' => 'hha6_dInltzcdEp7pw5h5', 'label' => '10.5 in or 27.0 cm', 'value' => '10'],
                    ['uid' => 'qmQDc-MhcDJfDbvFucRPT', 'label' => '11.0 in or 28.5 cm', 'value' => '11'],
                    ['uid' => '7-knS22v_uDXYG2VnckCn', 'label' => '11.5 in or 29.5 cm', 'value' => '12'],
                    ['uid' => 'zNAPsR77CFqnmU9sbtTj8', 'label' => '12.0 in or 30.5 cm', 'value' => '13'],
                ],
            ],
        ],
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

        /* the picker's option id (1 … 8) maps to a circumference in inches */
        var INCHES = { '1': 6.0, '2': 6.5, '3': 7.0, '4': 7.5, '5': 8.0, '6': 8.5, '7': 9.0, '8': 9.5 };

        var MEN = [
          { from: 0, to: 7.75, name: 'XS' },
          { from: 7.75, to: 8.75, name: 'S' },
          { from: 8.75, to: 9.75, name: 'M' },
          { from: 9.75, to: 10.75, name: 'L' },
          { from: 10.75, to: 11.75, name: 'XL' },
          { from: 11.75, to: 99, name: 'XXL' }
        ];
        var WOMEN = [
          { from: 0, to: 6.6, name: 'XS' },
          { from: 6.6, to: 7.2, name: 'S' },
          { from: 7.2, to: 7.9, name: 'M' },
          { from: 7.9, to: 8.6, name: 'L' },
          { from: 8.6, to: 99, name: 'XL' }
        ];

        function band(list, value) {
          for (var i = 0; i < list.length; i++) {
            if (value < list[i].to) return list[i];
          }
          return list[list.length - 1];
        }

        omni.onResult([], function (ctx, v) {
          var men = Math.round(Number(v.gender)) === 0;
          var raw = v.hand_circumference;
          if (raw === '' || raw === undefined) {
            ctx.addUnmetCondition('Pick your hand circumference from the list.');
            return;
          }
          var inches = INCHES[String(Math.round(Number(raw)))];
          if (inches === undefined) {
            ctx.addUnmetCondition('That circumference is not one of the choices.');
            return;
          }
          var table = men ? MEN : WOMEN;
          var hit = band(table, inches);

          ctx.exportValue('glove_size', sround(inches, 1));
          ctx.exportValue('hand_cm', sround(inches * 2.54, 1));
          ctx.exportValue('letter_size', hit.name);

          ctx.addHtml('<p><strong>' + (men ? "Men's" : "Women's") + ' glove size ' + snum(inches, 1)
            + ' — ' + hit.name + '</strong>, for a hand of ' + snum(inches, 1) + ' in ('
            + snum(inches * 2.54, 1) + ' cm) around the palm.</p>');
          var rows = table.map(function (b) {
            return [b.name, (b.from ? snum(b.from, 2) : 'below ' + snum(b.to, 2)) + (b.to < 99 ? ' to ' + snum(b.to, 2) : ' and up'),
                    b.name === hit.name ? '← you' : ''];
          });
          ctx.addHtml(stable(['Letter size', 'Hand circumference (in)', ''], rows));
          ctx.addHtml('<p class="calc-unmet">Glove sizing is not standardised: a size 8 from one maker can fit like a '
            + '7.5 from another, and a leather glove should be bought snug while a lined winter glove needs a little '
            + 'room.</p>');
        });
        TXT,
        'showIf' => ['chooseSize_men' => 'gender == 0', 'chooseSize_women' => 'gender == 1'],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Glove size calculator takes the numbers you enter and reports the result immediately.

         Nothing repaints underneath you: edit a field, press Calculate, and the new answer appears. That is how you find out which input the result is sensitive to.
        TXT,
        'sections' => [
            ['title' => 'How does the Glove size calculator work?', 'html' => <<<'TXT'
            <p>The Glove size calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the style of glove and the hand circumference).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <table><caption>What you supply, field by field</caption><thead><tr><th>Field</th><th>Units and meaning</th></tr></thead><tbody><tr><td>Style of glove</td><td>pick the option that matches your case — 2 options, such as man / Unisex and woman. </td></tr><tr><td>Hand circumference</td><td>pick the option that matches your case — 13 options, such as 6.0 in or 15.0 cm, 6.5 in or 16.5 cm and 7.0 in or 18.0 cm. </td></tr><tr><td>For men's or unisex glove size of</td><td>pick the option that matches your case — 6 options, such as XS or sizes 7 to 7.5, s or sizes 7.5 to 8.5 and m or sizes 8.5 to 9.5. </td></tr><tr><td>For women's glove size of</td><td>pick the option that matches your case — 5 options, such as XS or sizes 6 to 6.5, s or size 6.5 and m or sizes 7 to 7.5. </td></tr></tbody></table><p>4 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in inches, and convertible to any of the 34 units on that chip.</li><li>Shown in inches, and convertible to any of the 34 units on that chip.</li><li>Shown in inches, and convertible to any of the 34 units on that chip.</li><li>Shown in inches, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in inches</li><li>Length, opening in inches</li><li>Length, opening in inches</li><li>Length, opening in inches</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Glove size calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/add-days">Add days</a>, <a href="/everyday-life/add-minutes">Add minutes</a> and <a href="/everyday-life/add-time">Add time</a>.</p>
            TXT],
            ['title' => 'Measuring hand circumference for glove size', 'html' => <<<'TXT'
            <p>This calculator uses hand circumference and a selected sizing category to suggest a glove label. Measure the dominant hand or the hand specified by the manufacturer, wrapping a flexible tape around the widest part of the palm below the knuckles. Keep the tape snug but do not compress the hand. Do not include the thumb unless the product’s instructions specifically say to do so. Enter the unit shown by the field and check the chip before interpreting the result.</p>
            <p>Glove charts differ by brand, product and intended use. Some use palm circumference, others use hand length or a combination. Work gloves, dress gloves, cycling gloves and insulated winter gloves can have different fit allowances. A size that works for a thin liner may feel too tight over another layer. Check the product-specific chart and read whether the measurement refers to the palm, hand length or a nominal size.</p>
            <p>Measure both hands if one is noticeably larger, and use the manufacturer’s recommendation for which hand to size. Hand circumference alone does not describe finger length, palm width, knuckle shape or the desired amount of dexterity. A glove may fit the palm but leave fingers too long or short. For precision work, try the specific glove and check that you can grip and move comfortably.</p>
            <p>Material affects fit. Leather may soften or conform with use, while coated work gloves or waterproof shells may have limited stretch. Liners and insulation add bulk. Do not rely on a size conversion alone for protective equipment; follow the manufacturer’s sizing guidance and any workplace safety requirements. A calculator cannot verify cut resistance, chemical compatibility, thermal protection or certification.</p>
            <p>If your measurement lies between sizes, consider the intended task. A close fit can help dexterity but should not restrict circulation or movement; a loose glove can snag or reduce control in some activities. Check the product’s advice and return policy, and try the glove with any liner you plan to use.</p>
            <p>Keep the measurement, hand used, unit, selected chart and glove model together. If comparing another brand, measure again using that maker’s method rather than assuming the labels match. The result is a starting size estimate; comfort, finger fit and the actual product requirements determine whether the glove is suitable.</p>
            TXT],
            ['title' => 'Choose a size for the task and material', 'html' => <<<'TXT'
            <p>For cold-weather gloves, allow for a liner only if the manufacturer’s size chart tells you how to measure with one. A thick liner can reduce dexterity and make the fingertips feel tight. For work gloves, check the task and product-specific requirements; a close fit may be important for control, while a loose fit can catch on equipment. The calculator cannot decide whether a glove is safe for a particular job.</p><p>Protective ratings are separate from size. A glove-size estimate does not verify cut, puncture, chemical, electrical or thermal protection. Read the product’s markings and documentation, and follow workplace rules. If chemicals are involved, use compatibility information for the exact substance and glove material rather than assuming any glove of the right size is suitable.</p><p>Leather, knit, coated and waterproof gloves behave differently. Some stretch or soften, while others retain a fixed shape. If your palm measure is near a boundary, try the exact model and test the grip or movement needed for the activity. Check finger length and thumb position as well as palm circumference; a nominal size cannot represent every hand proportion.</p><p>For a pair of gloves with a liner or removable insulation, compare the package’s size guidance for each layer. The outer shell may be intentionally roomier than a thin glove. Record the model and use case alongside the measurement so you do not assume another brand’s sizing chart is equivalent.</p>
            TXT],
            ['title' => 'Repeat the measurement consistently', 'html' => <<<'TXT'
            <p>Take the circumference measurement with the fingers relaxed and together, not clenched into a fist or spread widely. A tight tape can understate the size, while a loose wrap can overstate it. Repeat the measurement once and note whether both readings are close. If one hand is larger, check the maker’s advice about sizing for the dominant hand.</p><p>For a glove used in a safety-critical task, choose the exact certified product and follow its fit test. This calculator only estimates a size; it does not verify protective performance, certification or compatibility with a work hazard.</p><p>If the result falls between labels, compare the specific glove’s chart and the movement you need. A slightly different fit can affect dexterity, grip and comfort. Try the product with the same liner or clothing layer you will use in practice.</p>
            TXT],
            ['title' => 'Separate fit from protection', 'html' => <<<'TXT'
            <p>A glove that fits well is not necessarily the correct protective glove. Check hazard-specific ratings, materials and workplace procedures independently. The size estimate only helps identify a starting size and cannot confirm that a glove is suitable for chemicals, heat, impact or electrical hazards.</p><p>Even within one manufacturer, insulated, waterproof and precision models can fit differently. Use the size chart for the exact model and test movement in the actual glove before using it for a task.</p>
            TXT],
            ['title' => 'Check glove fit in the intended working position', 'html' => <<<'TXT'
            <p>When trying a glove, make a fist, spread the fingers and grip the tool or object you will use. The palm should not pull tight across the knuckles, and the fingertips should not bunch so much that they reduce control. These checks help identify fit issues that a circumference measurement alone cannot reveal.</p><p>If gloves are worn in pairs with liners, try the full combination. A liner may change the fit at the fingertips and wrist. Follow the maker’s instructions for the glove and liner rather than forcing a size based on the calculator’s output.</p><p>For gloves used in a workplace, consult the safety data and employer procedures. Fit is only one part of selection; protection ratings, material compatibility and condition checks are essential.</p>
            TXT],
            ['title' => 'Keep the label tied to the model', 'html' => <<<'TXT'
            <p>Glove labels are not standardized across brands, and the same size name may fit differently between models. Keep the product name and chart alongside the measurement. If the glove is a gift or replacement, compare with a pair that fits from the same maker and model when possible.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the Glove size calculator?', 'a' => 'The form asks for a few values, which is 4 fields in total.'],
            ['q' => 'Can I enter min men in in a different unit?', 'a' => 'Yes. Min men in opens in inches and the chip beside it offers 34 units.'],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => 'There are several choices to make (4 in total), and each one selects a different case rather than scaling the result.'],
        ],
        'related' => [
            ['path' => '/everyday-life/add-days', 'name' => 'Add days'],
            ['path' => '/everyday-life/add-minutes', 'name' => 'Add minutes'],
            ['path' => '/everyday-life/add-time', 'name' => 'Add time'],
        ],
    ],
];
