<?php

/**
 * Jacket size
 * /everyday-life/jacket-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Jacket size',
    'meta' => ['title' => 'Jacket size Calculator: Formula, Steps & Examples', 'description' => 'Jacket size works out US jacket size and EU jacket size from sex and height. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Jacket size Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'jacketsizenobg.png'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sex',
                            'label' => 'Sex',
                            'type' => 'select',
                            'options' => ['Male' => '1.000000000000000', 'Female' => '2.000000000000000'],
                            'dataset' => 'sex',
                            'default' => 'Male',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'height_male',
                            'label' => 'Height',
                            'type' => 'number',
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
                            'name' => 'chest_male',
                            'label' => 'Chest width',
                            'type' => 'number',
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
                            'name' => 'chestF',
                            'label' => 'Chest width',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            To measure chest width, stand up straight and wrap measuring tape around your chest. Remember to leave a little room to move around (max 1&nbsp;in / 2.5&nbsp;cm).
                            TXT,
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
                            'name' => 'hipF',
                            'label' => 'Hips width',
                            'type' => 'number',
                            'help' => 'To measure your hips, wrap a measuring tape around them at the widest part of the buttocks.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Result',
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
                            'name' => 'string_or',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'or' => '1',
                                'Body height:' => '2',
                                'Chest width:' => '3',
                                'Hip width:' => '4',
                                '* Oh no! We\'re afraid we **couldn\'t find a standard size** that fits your measurements. Don\'t worry — you can get a custom size at a tailor\'s ' => '5',
                            ],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => 'or',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'string_height',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'or' => '1',
                                'Body height:' => '2',
                                'Chest width:' => '3',
                                'Hip width:' => '4',
                                '* Oh no! We\'re afraid we **couldn\'t find a standard size** that fits your measurements. Don\'t worry — you can get a custom size at a tailor\'s ' => '5',
                            ],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => 'Body height:',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'string_chest',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'or' => '1',
                                'Body height:' => '2',
                                'Chest width:' => '3',
                                'Hip width:' => '4',
                                '* Oh no! We\'re afraid we **couldn\'t find a standard size** that fits your measurements. Don\'t worry — you can get a custom size at a tailor\'s ' => '5',
                            ],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => 'Chest width:',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'string_hip',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'or' => '1',
                                'Body height:' => '2',
                                'Chest width:' => '3',
                                'Hip width:' => '4',
                                '* Oh no! We\'re afraid we **couldn\'t find a standard size** that fits your measurements. Don\'t worry — you can get a custom size at a tailor\'s ' => '5',
                            ],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => 'Hip width:',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'string_custom',
                            'label' => '',
                            'type' => 'select',
                            'options' => [
                                'or' => '1',
                                'Body height:' => '2',
                                'Chest width:' => '3',
                                'Hip width:' => '4',
                                '* Oh no! We\'re afraid we **couldn\'t find a standard size** that fits your measurements. Don\'t worry — you can get a custom size at a tailor\'s ' => '5',
                            ],
                            'dataset' => 'strings',
                            'control' => 'DROPDOWN',
                            'default' => '* Oh no! We\'re afraid we **couldn\'t find a standard size** that fits your measurements. Don\'t worry — you can get a custom size at a tailor\'s ',
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
                        ['name' => 'us_jacket_size_result', 'label' => 'US jacket size', 'type' => 'number', 'readonly' => true],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['name' => 'eu_jacket_size_result', 'label' => 'EU jacket size', 'type' => 'number', 'readonly' => true],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
    'js' => <<<'TXT'
    "use strict";omni.onResult([],function(ctx,_ref){var sex=_ref.sex,height_male=_ref.height_male,chest_male=_ref.chest_male,chestF=_ref.chestF,hipF=_ref.hipF;sex=Number(sex);var or_string=ctx.getRawInput("string_or");ctx.exportValue("us_jacket_size_result",ctx.getRawInput("string_custom"));ctx.exportValue("eu_jacket_size_result","");if(sex===1){var height=mathjs.round(Number(height_male));var chestM=mathjs.round(Number(chest_male));if(height<=0||chestM<=0){return}var US_size_height=Array.from(new Set(checkHeight_in(height)[0].map(JSON.stringify))).map(JSON.parse);var EU_size_height=checkHeight_in(height)[1];var US_size_chestM=checkChestM_in(chestM)[0];var EU_size_chestM=checkChestM_in(chestM)[1];var US_size=compareArrays(US_size_height,US_size_chestM).join(" ".concat(or_string," "));var EU_size=compareArrays(EU_size_height,EU_size_chestM).join(" ".concat(or_string," "));if(US_size!==""&&EU_size!==""){ctx.exportValue("us_jacket_size_result","* **".concat(US_size,"**"));ctx.exportValue("eu_jacket_size_result","* **".concat(EU_size,"**"))}else if(US_size_chestM[0]!==undefined&&US_size_height[0]!==undefined&&EU_size_chestM[0]!==undefined&&EU_size_height[0]!==undefined){ctx.exportValue("us_jacket_size_result","* ".concat(ctx.getRawInput("string_height")," **").concat(US_size_height.join(" ".concat(or_string," ")),"**\n* ").concat(ctx.getRawInput("string_chest")," **").concat(US_size_chestM.join(" ".concat(or_string," ")),"**"));ctx.exportValue("eu_jacket_size_result","* ".concat(ctx.getRawInput("string_height")," **").concat(EU_size_height.join(" ".concat(or_string," ")),"**\n* ").concat(ctx.getRawInput("string_chest")," **").concat(EU_size_chestM.join(" ".concat(or_string," ")),"**"))}}if(sex===2){chestF=mathjs.round(Number(chestF));hipF=mathjs.round(Number(hipF));if(chestF<=0||hipF<=0){return}var US_size_chestF=Array.from(new Set(checkChestF_in(chestF)[0].map(JSON.stringify))).map(JSON.parse);var EU_size_chestF=checkChestF_in(chestF)[1];var US_size_hipF=checkHipF_in(hipF)[0];var EU_size_hipF=checkHipF_in(hipF)[1];var _US_size=compareArrays(US_size_chestF,US_size_hipF).join(" ".concat(or_string," "));var _EU_size=compareArrays(EU_size_chestF,EU_size_hipF).join(" ".concat(or_string," "));if(_US_size!==""&&_EU_size!==""){ctx.exportValue("us_jacket_size_result","* **".concat(_US_size,"**"));ctx.exportValue("eu_jacket_size_result","* **".concat(_EU_size,"**"))}else if(US_size_chestF[0]!==undefined&&US_size_hipF[0]!==undefined&&EU_size_chestF[0]!==undefined&&EU_size_hipF[0]!==undefined){ctx.exportValue("us_jacket_size_result","* ".concat(ctx.getRawInput("string_chest")," **").concat(US_size_chestF.join(" ".concat(or_string," ")),"**\n* ").concat(ctx.getRawInput("string_hip")," **").concat(US_size_hipF.join(" ".concat(or_string," ")),"**"));ctx.exportValue("eu_jacket_size_result","* ".concat(ctx.getRawInput("string_chest")," **").concat(EU_size_chestF.join(" ".concat(or_string," ")),"**\n* ").concat(ctx.getRawInput("string_hip")," **").concat(EU_size_hipF.join(" ".concat(or_string," ")),"**"))}}});function compareArrays(array1,array2){var i,j;var result=[];for(i=0;i<array1.length;i++){for(j=0;j<array2.length;j++){if(array1[i][0]==array2[j][0]&&!result.includes(array1[i][0])){result.push(array1[i][0])}}}if(result[0]===undefined){return[""]}return result}function checkHeight_in(height){var US=[];var EU=[];if(height>=63&&height<=64){US.push(["XXXS"]);EU.push(["40"])}if(height>=64&&height<=65){US.push(["XXS"]);EU.push(["42"])}if(height>=65&&height<=66){US.push(["XS"]);EU.push(["44"])}if(height>=66&&height<=68){US.push(["S"]);EU.push(["46"])}if(height>=67&&height<=68){US.push(["M"]);EU.push(["48"])}if(height>=68&&height<=69){US.push(["L"]);EU.push(["50"])}if(height>=69&&height<=70){US.push(["L"]);EU.push(["52"])}if(height>=70&&height<=71){US.push(["XL"]);EU.push(["54"])}if(height>=71&&height<=72){US.push(["XL"]);EU.push(["56"])}if(height>=72&&height<=73){US.push(["XXL"]);EU.push(["58"])}if(height>=73&&height<=74){US.push(["XXL"]);EU.push(["60"])}if(height>=74&&height<=75){US.push(["3XL"]);EU.push(["62"])}if(height>=75&&height<=76){US.push(["3XL"]);EU.push(["64"])}if(height>=76&&height<=77){US.push(["4XL"]);EU.push(["66"])}if(height>=77&&height<=78){US.push(["5XL"]);EU.push(["68"])}if(height>=78&&height<=79){US.push(["5XL"]);EU.push(["70"])}if(height>=79&&height<=80){US.push(["6XL"]);EU.push(["72"])}return[US,EU]}function checkChestM_in(chestM){var US=[];var EU=[];if(chestM>=30&&chestM<=32){US.push(["XXXS"]);EU.push(["40"])}if(chestM>=32&&chestM<=34){US.push(["XXS"]);EU.push(["42"])}if(chestM>=34&&chestM<=36){US.push(["XS"]);EU.push(["44"])}if(chestM>=36&&chestM<=38){US.push(["S"]);EU.push(["46"])}if(chestM>=38&&chestM<=40){US.push(["M"]);EU.push(["48"])}if(chestM>=40&&chestM<=42){US.push(["L"]);EU.push(["50"])}if(chestM>=42&&chestM<=44){US.push(["L"]);EU.push(["52"])}if(chestM>=44&&chestM<=45){US.push(["XL"]);EU.push(["54"])}if(chestM>=44&&chestM<=45){US.push(["XL"]);EU.push(["56"])}if(chestM>=45&&chestM<=46){US.push(["XXL"]);EU.push(["58"])}if(chestM>=46&&chestM<=47){US.push(["XXL"]);EU.push(["60"])}if(chestM>=47&&chestM<=48){US.push(["3XL"]);EU.push(["62"])}if(chestM>=48&&chestM<=49){US.push(["3XL"]);EU.push(["64"])}if(chestM>=49&&chestM<=50){US.push(["4XL"]);EU.push(["66"])}if(chestM>=50&&chestM<=51){US.push(["5XL"]);EU.push(["68"])}if(chestM>=51&&chestM<=52){US.push(["5XL"]);EU.push(["70"])}if(chestM>=52&&chestM<=53){US.push(["6XL"]);EU.push(["72"])}return[US,EU]}function checkHipF_in(hipF){var US=[];var EU=[];if(hipF>=33&&hipF<=34){US.push(["XXS"]);EU.push(["32"])}if(hipF>=35&&hipF<=36){US.push(["XS"]);EU.push(["34"])}if(hipF>=36&&hipF<=37){US.push(["S"]);EU.push(["36"])}if(hipF>=37&&hipF<=38){US.push(["M"]);EU.push(["38"])}if(hipF>=39&&hipF<=40){US.push(["L"]);EU.push(["40"])}if(hipF>=40&&hipF<=41){US.push(["L"]);EU.push(["42"])}if(hipF>=41&&hipF<=42){US.push(["XL"]);EU.push(["44"])}if(hipF>=43&&hipF<=44){US.push(["XL"]);EU.push(["46"])}if(hipF>=45&&hipF<=46){US.push(["XXL"]);EU.push(["48"])}if(hipF>=47&&hipF<=48){US.push(["XXL"]);EU.push(["50"])}if(hipF>=48&&hipF<=49){US.push(["3XL"]);EU.push(["52"])}if(hipF>=50&&hipF<=51){US.push(["3XL"]);EU.push(["54"])}if(hipF>=52&&hipF<=53){US.push(["4XL"]);EU.push(["56"])}if(hipF>=54&&hipF<=55){US.push(["4XL"]);EU.push(["58"])}if(hipF>=56&&hipF<=58){US.push(["5XL"]);EU.push(["60"])}if(hipF>=59&&hipF<=60){US.push(["5XL"]);EU.push(["62"])}return[US,EU]}function checkChestF_in(chestF){var US=[];var EU=[];if(chestF>=29&&chestF<=30){US.push(["XXS"]);EU.push(["32"])}if(chestF>=31&&chestF<=32){US.push(["XS"]);EU.push(["34"])}if(chestF>=32&&chestF<=33){US.push(["S"]);EU.push(["36"])}if(chestF>=33&&chestF<=34){US.push(["M"]);EU.push(["38"])}if(chestF>=34&&chestF<=36){US.push(["L"]);EU.push(["40"])}if(chestF>=37&&chestF<=38){US.push(["L"]);EU.push(["42"])}if(chestF>=38&&chestF<=39){US.push(["XL"]);EU.push(["44"])}if(chestF>=40&&chestF<=41){US.push(["XL"]);EU.push(["46"])}if(chestF>=42&&chestF<=43){US.push(["XXL"]);EU.push(["48"])}if(chestF>=44&&chestF<=46){US.push(["XXL"]);EU.push(["50"])}if(chestF>=47&&chestF<=48){US.push(["3XL"]);EU.push(["52"])}if(chestF>=49&&chestF<=50){US.push(["3XL"]);EU.push(["54"])}if(chestF>=50&&chestF<=52){US.push(["4XL"]);EU.push(["56"])}if(chestF>=53&&chestF<=54){US.push(["4XL"]);EU.push(["58"])}if(chestF>=55&&chestF<=57){US.push(["5XL"]);EU.push(["60"])}if(chestF>=58&&chestF<=60){US.push(["5XL"]);EU.push(["62"])}return[US,EU]}//# sourceURL=customJs.js
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

    function jacketInches(value, unit) {
      var factors = { inch: 1, in: 1, cm: 1 / 2.54, mm: 1 / 25.4,
                      m: 100 / 2.54, ft: 12, yd: 36, microm: 1 / 25400 };
      var factor = factors[String(unit || 'cm').toLowerCase()];
      return Number(value) * (factor || (1 / 2.54));
    }

    /* The harvested chart is in inches, while the form defaults to centimetres.
       Normalize the active sex's two measurements before calling its chart. */
    omni.onResult([], function (ctx, values) {
      ctx.exportValue('us_jacket_size_result', null);
      ctx.exportValue('eu_jacket_size_result', null);
      var sex = Number(values.sex);
      var separator = ctx.getChoice('string_or') || 'or';
      var custom = ctx.getChoice('string_custom') || 'No standard size found for these measurements.';
      var usText = custom, euText = '';
      function uniqueRows(rows) {
        var seen = {};
        return rows.filter(function (row) {
          var key = row[0];
          if (seen[key]) return false;
          seen[key] = true;
          return true;
        });
      }
      function names(rows) {
        return rows.map(function (row) { return row[0]; }).join(' ' + separator + ' ');
      }
      function labeled(label, rows) {
        return '* ' + label + ' **' + names(rows) + '**';
      }

      if (sex === 1) {
        var height = jacketInches(values.height_male, ctx.getUnit('height_male'));
        var chest = jacketInches(values.chest_male, ctx.getUnit('chest_male'));
        if (!(height > 0 && chest > 0)) return;
        var h = checkHeight_in(height), c = checkChestM_in(chest);
        h[0] = uniqueRows(h[0]);
        c[0] = uniqueRows(c[0]);
        var us = compareArrays(h[0], c[0]).join(' ' + separator + ' ');
        var eu = compareArrays(h[1], c[1]).join(' ' + separator + ' ');
        if (us && eu) {
          usText = '* **' + us + '**';
          euText = '* **' + eu + '**';
        } else if (h[0].length && c[0].length && h[1].length && c[1].length) {
          usText = labeled(ctx.getChoice('string_height') || 'Height:', h[0]) + '\n'
            + labeled(ctx.getChoice('string_chest') || 'Chest width:', c[0]);
          euText = labeled(ctx.getChoice('string_height') || 'Height:', h[1]) + '\n'
            + labeled(ctx.getChoice('string_chest') || 'Chest width:', c[1]);
        }
      } else if (sex === 2) {
        var chestF = jacketInches(values.chestF, ctx.getUnit('chestF'));
        var hipF = jacketInches(values.hipF, ctx.getUnit('hipF'));
        if (!(chestF > 0 && hipF > 0)) return;
        var cf = checkChestF_in(chestF), hf = checkHipF_in(hipF);
        cf[0] = uniqueRows(cf[0]);
        hf[0] = uniqueRows(hf[0]);
        var _us = compareArrays(cf[0], hf[0]).join(' ' + separator + ' ');
        var _eu = compareArrays(cf[1], hf[1]).join(' ' + separator + ' ');
        if (_us && _eu) {
          usText = '* **' + _us + '**';
          euText = '* **' + _eu + '**';
        } else if (cf[0].length && hf[0].length && cf[1].length && hf[1].length) {
          usText = labeled(ctx.getChoice('string_chest') || 'Chest width:', cf[0]) + '\n'
            + labeled(ctx.getChoice('string_hip') || 'Hips width:', hf[0]);
          euText = labeled(ctx.getChoice('string_chest') || 'Chest width:', cf[1]) + '\n'
            + labeled(ctx.getChoice('string_hip') || 'Hips width:', hf[1]);
        }
      }
      ctx.exportValue('us_jacket_size_result', usText);
      ctx.exportValue('eu_jacket_size_result', euText);
    });

    /* The page hook has already run by the time this one does, so the values
       below are its results: tidy the reference site's markup out of them
       before they reach the panel. */
    omni.onResult([], function (ctx, values) {
      var rows = [
        'us_jacket_size_result',
        'eu_jacket_size_result'
      ];
      rows.forEach(function (name) {
        var v = values[name];
        if (typeof v !== 'string' || v.trim() === '') { return; }
        var text = sclean(sdelabel(v)).replace(/\*+/g, '').trim();
        ctx.exportValue(name, text === '' ? null : text);
      });
    });
    TXT,
    'showIf' => ['height_male' => 'sex == 1', 'chest_male' => 'sex == 1', 'chestF' => 'sex == 2', 'hipF' => 'sex == 2'],
    'article' => [
        'intro' => 'Supply the height, the chest width and the hips width and the Jacket size calculator solves for the answer.',
        'sections' => [
            ['title' => 'How does the Jacket size calculator work?', 'html' => <<<'TXT'
            <p>The Jacket size calculator takes the values in the form, applies the relationships described below and reports every result it can derive from them.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the sex); then you type in the height, the chest width, the chest width (2) and the hips width.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 2 options, such as male and female. </li><li>Pick the option that matches your case — 5 options, such as or, body height: and chest width:. </li><li>Pick the option that matches your case — 5 options, such as or, body height: and chest width:. </li><li>Pick the option that matches your case — 5 options, such as or, body height: and chest width:. </li><li>Pick the option that matches your case — 5 options, such as or, body height: and chest width:. </li><li>Pick the option that matches your case — 5 options, such as or, body height: and chest width:. </li></ul><p>6 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Sex</strong></td><td>One of 2 options, such as male and female.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Height</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Chest width</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Chest width (2)</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Hips width</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Jacket size calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Any time the same 3 figures keep coming back — the height, the chest width and the hips width — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/bathroom-mirror-size">Bathroom mirror size</a>, <a href="/everyday-life/battery-charge-time">Battery charge time</a> and <a href="/everyday-life/bc-to-ad">BC to AD</a>.</p>
            TXT],
            ['title' => 'Using measurements to narrow jacket sizes', 'html' => <<<'TXT'
            <p>The Jacket size calculator combines the selected chart pathway with measurements such as height, chest and hips to return US or EU size labels. Choose the category and measurement fields that match the garment chart you are comparing. The available categories are simplified sizing pathways; they do not represent every body, brand or unisex fit. Use the manufacturer’s chart for the specific jacket as the final reference.</p>
            <p>Measure chest around the fullest part with the tape level, over the clothing layer you expect to wear beneath the jacket. Keep the tape comfortably snug without compressing the body. Height should be entered in the unit shown by the form. If a measurement is in centimeters but a field expects inches, convert before entering or select the supported unit. Check the output label to ensure you are reading US or EU sizing.</p>
            <p>For some pathways, the calculator uses height and chest together; other pathways use chest and hip measurements. A jacket’s fit depends on shoulder width, sleeve length, torso length, posture and intended layering as well as the fields included here. A label can narrow the size range but cannot confirm that shoulders align or sleeves reach the right point.</p>
            <p>Brand sizing is not standardized. One maker’s medium may differ from another’s, and a slim-fit jacket will feel different from a relaxed cut. Fabric, lining, insulation and tailoring allowance also affect how much room is available. If the brand publishes garment dimensions, compare them with a jacket that fits well and follow the brand’s measurement method.</p>
            <p>When the result offers more than one size or the chest and height suggest different rows, consider the jacket’s purpose and the alterations possible. A tailor can often adjust sleeve length or waist suppression, but shoulder and armhole changes may be complex. Check the retailer’s return and alteration policy before ordering a non-returnable jacket.</p>
            <p>Try the actual jacket with the clothing and posture you expect to use. Button it, reach forward, sit and move your arms. It should allow the intended range of motion without pulling excessively, and sleeve length should suit the design. For protective or specialized outerwear, follow the maker’s fit and safety guidance rather than a general size conversion.</p>
            <p>Record the raw measurements, units, selected pathway and brand. This makes it easier to compare another chart without repeatedly converting a rounded label. The calculator helps identify a likely starting size; it does not guarantee fit or assess the quality or safety of a jacket.</p>
            TXT],
            ['title' => 'How to handle conflicting measurement recommendations', 'html' => <<<'TXT'
            <p>The calculator may return US and EU labels from separate lookup tables. If the height-based result and chest-based result do not agree, the page may display alternatives or a combined recommendation. That is a signal to check the brand chart and garment measurements, not a reason to assume one measurement is wrong. Different jackets prioritize different proportions.</p><p>For a men’s chart, height and chest are only part of fit; shoulder width, sleeve length and torso shape can change the correct choice. For a women’s chart, the calculator may use chest and hip measurements, but waist, shoulders and garment cut also matter. The form’s categories are simplified chart pathways and do not represent every gender identity, body type or unisex model.</p><p>When measurements fall on a boundary, repeat them and check whether the tool rounds inputs to whole units. A small difference can move a value into an adjacent size interval. Compare the exact brand’s chart, especially if the jacket is tailored, slim-fit, oversized, insulated or designed for layering.</p><p>Use garment measurements where possible. Lay a well-fitting jacket flat and compare chest width, shoulder seam, sleeve length and back length with the new product’s chart. Follow the seller’s measurement diagram because some specify circumference and others a flat width. Do not double or halve a value without confirming the definition.</p><p>Try the jacket with the clothing layers you expect to wear. Button it, reach forward and sit. If the shoulders pull or the sleeves are wrong, a different size or cut may be better than simply sizing up. Alteration options vary, so check them before buying a non-returnable garment.</p><p>The result is a starting point from a limited chart. It cannot guarantee fit, and it should not be used to judge a body or make health conclusions.</p>
            TXT],
            ['title' => 'Product charts and fit conventions vary', 'html' => <<<'TXT'
            <p>US and EU jacket labels are not universal measurements. Some brands use chest circumference, others use a numeric size with a particular fit model, and letter sizes can cover a range. A calculator’s conversion table may give a useful starting label but cannot represent every product line. Always compare with the chart attached to the exact jacket.</p><p>Check whether the chart lists body measurements or finished garment measurements. Body measurements indicate the wearer; garment measurements include ease for movement and layering. Comparing the two directly without accounting for that difference can make a jacket appear much too large or small.</p><p>For formalwear, shoulder fit is often difficult to alter. If the chest result suggests one size but shoulder width or sleeve length suggests another, try the jacket or seek a tailor’s advice before purchase. For outdoor clothing, consider the layers you will wear beneath it and the garment’s intended insulation or mobility.</p><p>Some sizes are designed around specific body proportions or height ranges. The calculator’s selected category and measurements may not represent a unisex cut or an individual’s preferred fit. Do not treat its categories as a judgment about gender or body shape; they are pathways into a simplified size chart.</p><p>Use the output to narrow options, then inspect the product’s construction, return policy and alteration possibilities. If the garment is protective equipment, use its certified fit instructions and do not rely on a fashion-size converter.</p>
            TXT],
            ['title' => 'Try the complete garment before deciding', 'html' => <<<'TXT'
            <p>Once you have a candidate size, try the jacket with the shirt, sweater or base layer you expect to wear. Fasten it, raise your arms and reach forward. Check whether the shoulders stay in place, the chest closes without pulling and the sleeves allow movement. A measurement-based recommendation is only useful if the garment works in the intended situation.</p><p>If two sizes both appear plausible, compare the jacket’s cut and the ease you prefer. A tailored style may be designed to sit closer to the body than an outdoor shell. Read the product description and ask the seller about garment measurements when the chart does not resolve the choice.</p><p>Keep the measurement method and size chart with your notes. A later jacket from a different brand may use a different standard, even if it carries the same label.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the Jacket size calculator?', 'a' => 'The form asks for the height, the chest width and the hips width, which is 10 fields in total.'],
            ['q' => 'Can I enter height in a different unit?', 'a' => 'Yes. Height opens in centimeters and the chip beside it offers 34 units.'],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => 'There are several choices to make (6 in total), and each one selects a different case rather than scaling the result.'],
        ],
        'related' => [
            ['path' => '/everyday-life/bathroom-mirror-size', 'name' => 'Bathroom mirror size'],
            ['path' => '/everyday-life/battery-charge-time', 'name' => 'Battery charge time'],
            ['path' => '/everyday-life/bc-to-ad', 'name' => 'BC to AD'],
        ],
    ],
];
