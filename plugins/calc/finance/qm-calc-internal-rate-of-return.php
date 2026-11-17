<?php

/**
 * IRR
 * /finance/internal-rate-of-return
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'IRR',
    'meta' => ['title' => 'IRR Calculator — Free, With Worked Examples', 'description' => 'IRR takes initial investment and returns internal rate of return, % per year. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'IRR Calculator', 'updated' => '2026-09-26'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_0',
                            'label' => 'Initial investment',
                            'type' => 'number',
                            'help' => 'Enter the total amount you invested at the start of the project (use a positive number).',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Input the annual cash flows (up&nbsp;to&nbsp;30&nbsp;years)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_1',
                            'label' => 'Year 1',
                            'type' => 'number',
                            'help' => 'Enter how much you earned (or spent) in the first year. Repeat the same for the following years.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_2',
                            'label' => 'Year 2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_3',
                            'label' => 'Year 3',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_4',
                            'label' => 'Year 4',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_5',
                            'label' => 'Year 5',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_6',
                            'label' => 'Year 6',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_7',
                            'label' => 'Year 7',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_8',
                            'label' => 'Year 8',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_9',
                            'label' => 'Year 9',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_10',
                            'label' => 'Year 10',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_11',
                            'label' => 'Year 11',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_12',
                            'label' => 'Year 12',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_13',
                            'label' => 'Year 13',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_14',
                            'label' => 'Year 14',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_15',
                            'label' => 'Year 15',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_16',
                            'label' => 'Year 16',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_17',
                            'label' => 'Year 17',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_18',
                            'label' => 'Year 18',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_19',
                            'label' => 'Year 19',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_20',
                            'label' => 'Year 20',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_21',
                            'label' => 'Year 21',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_22',
                            'label' => 'Year 22',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_23',
                            'label' => 'Year 23',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_24',
                            'label' => 'Year 24',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_26',
                            'label' => 'Year 26',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_25',
                            'label' => 'Year 25',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_27',
                            'label' => 'Year 27',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_28',
                            'label' => 'Year 28',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_29',
                            'label' => 'Year 29',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'c_30',
                            'label' => 'Year 30',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Internal rate of return',
            'note' => '',
            'blocks' => [],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'not_calculable_msg',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['not calculable' => '1'],
                            'dataset' => 'error strings',
                            'control' => 'DROPDOWN',
                            'default' => 'not calculable',
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
                            'name' => 'irr',
                            'label' => 'Internal rate of return, % per year',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_outflow',
                            'label' => 'Money invested (year 0)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_inflow',
                            'label' => 'Money returned',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'net_gain',
                            'label' => 'Net gain',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";omni.onResult(["c_0"],function(ctx,_ref){var c_0=_ref.c_0,c_1=_ref.c_1,c_2=_ref.c_2,c_3=_ref.c_3,c_4=_ref.c_4,c_5=_ref.c_5,c_6=_ref.c_6,c_7=_ref.c_7,c_8=_ref.c_8,c_9=_ref.c_9,c_10=_ref.c_10,c_11=_ref.c_11,c_12=_ref.c_12,c_13=_ref.c_13,c_14=_ref.c_14,c_15=_ref.c_15,c_16=_ref.c_16,c_17=_ref.c_17,c_18=_ref.c_18,c_19=_ref.c_19,c_20=_ref.c_20,c_21=_ref.c_21,c_22=_ref.c_22,c_23=_ref.c_23,c_24=_ref.c_24,c_25=_ref.c_25,c_26=_ref.c_26,c_27=_ref.c_27,c_28=_ref.c_28,c_29=_ref.c_29,c_30=_ref.c_30;c_0=Number(c_0);var raw=[-mathjs.abs(c_0),c_1,c_2,c_3,c_4,c_5,c_6,c_7,c_8,c_9,c_10,c_11,c_12,c_13,c_14,c_15,c_16,c_17,c_18,c_19,c_20,c_21,c_22,c_23,c_24,c_25,c_26,c_27,c_28,c_29,c_30];var values=[];for(var i=0;i<raw.length;i++){if(raw[i]!=null){values.push(raw[i])}}var guess=-0.5;function IRR(values,guess){var irrResult=function irrResult(values,dates,rate){var r=rate+1;var result=values[0];for(var _i=1;_i<values.length;_i++){result+=values[_i]/Math.pow(r,(dates[_i]-dates[0])/365)}return result};var irrResultDeriv=function irrResultDeriv(values,dates,rate){var r=rate+1;var result=0;for(var _i2=1;_i2<values.length;_i2++){var frac=(dates[_i2]-dates[0])/365;result-=frac*values[_i2]/Math.pow(r,frac+1)}return result};var dates=[];var positive=false,negative=false;for(var _i3=0;_i3<values.length;_i3++){dates[_i3]=_i3===0?0:dates[_i3-1]+365;if(values[_i3]>0){positive=true}if(values[_i3]<0){negative=true}}if(!positive||!negative){return NaN}var resultRate=guess;var epsMax=1e-10;var iterMax=10000;var iteration=0;var contLoop=true;do{var value=irrResult(values,dates,resultRate);var deriv=irrResultDeriv(values,dates,resultRate);var newRate=resultRate-value/deriv;var epsRate=Math.abs(newRate-resultRate);resultRate=newRate;contLoop=epsRate>epsMax&&Math.abs(value)>epsMax}while(contLoop&&++iteration<iterMax);return contLoop?NaN:resultRate}var irrValue=IRR(values,guess)*100;if(isNaN(irrValue)||mathjs.abs(irrValue===Infinity)){ctx.exportValue("irr",ctx.getRawInput("not_calculable_msg"))}else{ctx.exportValue("irr",mathjs.round(irrValue,2)+"%")}});//# sourceURL=customJs.js
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
    
    function irrFlow(name) {
      var el = document.querySelector('.calc-widget input[data-var="' + name + '"]');
      if (!el || String(el.value).trim() === '') { return null; }
      var n = Number(String(el.value).trim());
      return isFinite(n) ? n : null;
    }
    
    omni.onResult(['c_0'], function (ctx, values) {
      /* the rate the page's own bisection found */
      var rate = typeof values.irr === 'number' ? values.irr : Number(values.irr);
      var out = irrFlow('c_0') || 0;
      var inflow = 0, count = 0;
      for (var i = 1; i <= 30; i++) {
        var v = irrFlow('c_' + i);
        if (v !== null && v > 0) { inflow += v; count++; }
      }
      var paid = Math.abs(out);
      ctx.exportValue('total_outflow', paid > 0 ? sround(paid, 2) : null);
      ctx.exportValue('total_inflow', inflow > 0 ? sround(inflow, 2) : null);
      ctx.exportValue('net_gain', inflow > 0 ? sround(inflow - paid, 2) : null);
    
      if (!isFinite(rate)) {
        ctx.exportValue('irr', null);
        if (paid > 0 || inflow > 0) {
          ctx.addUnmetCondition('These cash flows have no internal rate of return: the money never comes back, '
            + 'or every flow has the same sign.');
        }
        return;
      }
      ctx.addHtml('<p><strong>IRR = ' + snum(rate, 4) + '% a year</strong>'
        + (inflow ? ' — ' + snum(paid, 2) + ' paid out and ' + snum(inflow, 2) + ' returned' : '') + '.</p>');
      ctx.addHtml(stable(['Item', 'Value'], [
        ['Money invested at year 0', snum(paid, 2)],
        ['Years with a return', String(count)],
        ['Money returned', snum(inflow, 2)],
        ['Net gain', snum(inflow - paid, 2)],
        ['IRR, % per year', snum(rate, 4)]
      ]));
      ctx.addHtml('<p class="calc-note">The IRR is the discount rate at which the sum of the discounted cash flows '
        + 'is zero — the annual rate the project earns on the money still tied up in it. It assumes every flow '
        + 'happens at the end of its year and that returns are reinvested at the same rate, which is the usual '
        + 'convention and the usual criticism of the measure. Cash flows can be negative in later years; the page '
        + 'solves for the rate numerically, and says so when no real rate exists rather than printing a stray '
        + 'number.</p>');
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        IRR turns Initial investment, Year 1 and Year 2 into Internal rate of return, % per year and Money invested (year 0). There is no hidden constant here: change internal rate of return, % per year and initial investment moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the IRR calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind IRR: it takes 31 numbers and reports Internal rate of return, % per year, Money invested (year 0) and Money returned.</p><p>The result panel carries Internal rate of return, % per year, Money invested (year 0), Money returned and Net gain, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 31 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Initial investment</strong> — in USD. Enter the total amount you invested at the start of the project (use a positive number).</li><li><strong>Year 1</strong> — in USD. Enter how much you earned (or spent) in the first year. Repeat the same for the following years.</li><li><strong>Year 2</strong> — in USD</li><li><strong>Year 3</strong> — in USD</li><li><strong>Year 4</strong> — in USD</li><li><strong>Year 5</strong> — in USD</li><li><strong>Year 6</strong> — in USD</li><li><strong>Year 7</strong> — in USD</li><li><strong>Year 8</strong> — in USD</li><li><strong>Year 9</strong> — in USD</li><li><strong>Year 10</strong> — in USD</li><li><strong>Year 11</strong> — in USD</li><li><strong>Year 12</strong> — in USD</li><li><strong>Year 13</strong> — in USD</li><li><strong>Year 14</strong> — in USD</li><li><strong>Year 15</strong> — in USD</li><li><strong>Year 16</strong> — in USD</li><li><strong>Year 17</strong> — in USD</li><li><strong>Year 18</strong> — in USD</li><li><strong>Year 19</strong> — in USD</li><li><strong>Year 20</strong> — in USD</li><li><strong>Year 21</strong> — in USD</li><li><strong>Year 22</strong> — in USD</li><li><strong>Year 23</strong> — in USD</li><li><strong>Year 24</strong> — in USD</li><li><strong>Year 26</strong> — in USD</li><li><strong>Year 25</strong> — in USD</li><li><strong>Year 27</strong> — in USD</li><li><strong>Year 28</strong> — in USD</li><li><strong>Year 29</strong> — in USD</li><li><strong>Year 30</strong> — in USD</li></ul><p>The result boxes are Internal rate of return, % per year, Money invested (year 0), Money returned, Net gain; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Internal rate of return, % per year takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Internal rate of return, % per year, Money invested (year 0) and Money returned are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Initial investment left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Initial investment is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Year 1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Year 1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Year 2 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Year 2 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Initial investment is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the IRR form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Initial investment</strong> takes a plain number with no unit attached. Enter the total amount you invested at the start of the project (use a positive number). Fill it from a measurement rather than a memory — Initial investment is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 1</strong> takes a plain number with no unit attached. Enter how much you earned (or spent) in the first year. Repeat the same for the following years. Fill it from a measurement rather than a memory — Year 1 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 2</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 2 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 3</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 3 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 4</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 4 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 5</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 5 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 6</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 6 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 7</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 7 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 8</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 8 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 9</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 9 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 10</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 10 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 11</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 11 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 12</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 12 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 13</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 13 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 14</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 14 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 15</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 15 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 16</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 16 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 17</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 17 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 18</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 18 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 19</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 19 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 20</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 20 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 21</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 21 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 22</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 22 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 23</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 23 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 24</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 24 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 26</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 26 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 25</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 25 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 27</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 27 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 28</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 28 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 29</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 29 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Year 30</strong> takes a plain number with no unit attached. Fill it from a measurement rather than a memory — Year 30 is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes IRR, works through it, and the panel lists Initial investment, Year 1, Year 2 and Year 3.</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is Internal rate of return, % per year, Money invested (year 0), Money returned and Net gain — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Internal rate of return, % per year follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial investment, Year 1 and Year 2 are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Initial investment, Year 1 and Year 2 measured, Internal rate of return, % per year and Money invested (year 0) wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/net-effective-rent">Net effective rent Calculator</a>, <a href="/finance/net-income">Net income</a> and <a href="/finance/net-operating-assets">Net operating assets Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the IRR calculator work out?', 'a' => 'Internal rate of return, % per year, Money invested (year 0), Money returned and Net gain.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial investment (USD), Year 1 (USD), Year 2 (USD), Year 3 (USD), Year 4 (USD). Fill initial investment, year 1 and year 2 and leave Internal rate of return, % per year empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Internal rate of return, % per year is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The page needs every box filled: Internal rate of return, % per year is fixed as the value it works out, so there is nothing to solve for when an input is missing.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Internal rate of return, % per year at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/net-effective-rent', 'name' => 'Net effective rent Calculator'],
            ['path' => '/finance/net-income', 'name' => 'Net income'],
            ['path' => '/finance/net-operating-assets', 'name' => 'Net operating assets Calculator'],
        ],
        'authors' => [],
    ],
];
