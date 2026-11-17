<?php

/**
 * Steak cook time
 * /food/steak-cook-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Steak cook time',
    'meta' => ['title' => 'Steak Cook Time Calculator — Grill & Sear-Roast Guide', 'description' => 'Estimate steak grilling or sear-roasting times from thickness and doneness. Follow safe-handling directions and verify doneness with a thermometer.', 'h1' => 'Steak Cook Time Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'method',
                            'label' => 'Method',
                            'type' => 'select',
                            'options' => ['Grill' => '1', 'Sear roast' => '2'],
                            'dataset' => 'method',
                            'default' => 'Grill',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'doneness',
                            'label' => 'Doneness',
                            'type' => 'select',
                            'options' => ['Rare' => '1', 'Medium Rare' => '2', 'Medium' => '3', 'Well Done' => '4'],
                            'dataset' => 'doneness',
                            'default' => 'Rare',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'thickness',
                            'label' => 'Thickness',
                            'type' => 'select',
                            'options' => [
                                '1/2" (1.27cm)' => '1',
                                '3/4" (1.9 cm)' => '2',
                                '1" (2.54 cm)' => '3',
                                '1 1/4" (3.17 cm)' => '4',
                                '1 1/2"  (3.81 cm)' => '5',
                                '1 3/4" (4.45 cm)' => '6',
                                '2" (5.08 cm)' => '7',
                                '2 1/4" (5.7 cm)' => '8',
                            ],
                            'control' => 'DROPDOWN',
                            'default' => '1/2" (1.27cm)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'donesear',
                            'label' => 'Doneness for sear roast',
                            'type' => 'select',
                            'options' => ['Rare' => '1', 'Medium Rare' => '2', 'Medium' => '3', 'Well Done' => '4'],
                            'default' => 'Rare',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'thicksear',
                            'label' => 'Thickness for sear roast',
                            'type' => 'select',
                            'options' => [
                                '1"	(2.54 cm)' => '1',
                                '1 1/4"	(3.17 cm)' => '2',
                                '1 1/2"	(3.81 cm)' => '3',
                                '1 3/4"	(4.45 cm)' => '4',
                                '2"	(5.08 cm)' => '5',
                                '2 1/4"   (5.7 cm)' => '6',
                            ],
                            'control' => 'DROPDOWN',
                            'default' => '1"	(2.54 cm)',
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
                            'name' => 'minutes_per_side',
                            'label' => 'Minutes per side',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_minutes',
                            'label' => 'Total cooking time (min)',
                            'type' => 'result',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'target_core_c',
                            'label' => 'Approximate pull temperature for selected doneness (°C)',
                            'type' => 'result',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'oven_minutes',
                            'label' => 'Oven time for a sear roast (min)',
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
    
    /* minutes per side by thickness (1/2 inch steps) and doneness (rare … well done) */
    var GRILL = {
      '1': [1.5, 2.0, 2.5, 3.5],   /* 1/2 in  */
      '2': [2.0, 2.5, 3.0, 4.0],   /* 3/4 in  */
      '3': [2.5, 3.0, 3.5, 4.5],
      '4': [3.0, 3.5, 4.0, 5.0],
      '5': [3.5, 4.0, 4.5, 5.5],
      '6': [4.0, 4.5, 5.0, 6.0],
      '7': [4.5, 5.0, 5.5, 6.5],
      '8': [5.0, 5.5, 6.0, 7.0]
    };
    /* oven minutes at 150 °C for a seared roast, same thickness steps */
    var OVEN = { '1': 6, '2': 9, '3': 12, '4': 15, '5': 18, '6': 21 };
    
    /* pull a steak a few degrees early: it keeps cooking while it rests */
    var CORE = { '1': 49, '2': 54, '3': 60, '4': 68 };
    var CORE_F = { '1': 120, '2': 130, '3': 140, '4': 155 };
    
    omni.onResult([], function (ctx, v) {
      var method = Math.round(Number(v.method));
      if (!isFinite(method)) { ctx.addUnmetCondition('Choose grilling or a sear roast.'); return; }
    
      if (method === 1) {
        var doneness = Math.round(Number(v.doneness));
        var thick = Math.round(Number(v.thickness));
        if (!GRILL[String(thick)] || !isFinite(doneness)) {
          ctx.addUnmetCondition('Choose the thickness and the doneness.');
          return;
        }
        var per = GRILL[String(thick)][doneness - 1];
        var core = CORE[String(doneness)], coreF = CORE_F[String(doneness)];
        ctx.exportValue('minutes_per_side', per);
        ctx.exportValue('total_minutes', sround(per * 2, 1));
        ctx.exportValue('target_core_c', core);
        ctx.addHtml('<p><strong>' + snum(per, 1) + ' minutes on each side — ' + snum(per * 2, 1)
          + ' minutes in total</strong> for a ' + snum((thick + 1) * 0.635, 2) + ' cm steak at that doneness.</p>');
        ctx.addHtml(stable(['Quantity', 'Value'], [
          ['Thickness', snum((thick + 1) * 0.635, 2) + ' cm'],
          ['Minutes per side', snum(per, 1)],
          ['Total', snum(per * 2, 1) + ' min'],
          ['Pull it at', core + ' °C (' + coreF + ' °F)'],
          ['Rest it for', '5–10 minutes, loosely covered']
        ]));
        ctx.addHtml('<p class="calc-unmet">Timings assume a room-temperature steak on a grill preheated to 230 °C; thickness, starting temperature and grill heat change the result. Use a probe thermometer rather than the clock. These doneness pull temperatures are culinary preferences, not food-safety minima: USDA recommends whole beef steaks reach 63 °C (145 °F) and rest at least 3 minutes. See <a href="https://www.fsis.usda.gov/food-safety/safe-food-handling-and-preparation/food-safety-basics/steps-keep-food-safe">USDA FSIS safe cooking temperatures</a>.</p>');
        return;
      }
    
      var ds = Math.round(Number(v.donesear));
      var ts = Math.round(Number(v.thicksear));
      if (!OVEN[String(ts)] || !isFinite(ds)) {
        ctx.addUnmetCondition('Choose the thickness and the doneness for the roast.');
        return;
      }
      /* the oven phase mostly depends on thickness; doneness shifts it a little */
        var oven = Math.round(OVEN[String(ts)] * (1 + (ds - 1) * 0.18));
      var core2 = CORE[String(ds)];
      ctx.exportValue('minutes_per_side', 2);
      ctx.exportValue('total_minutes', oven + 4);
      ctx.exportValue('target_core_c', core2);
      ctx.exportValue('oven_minutes', oven);
      ctx.addHtml('<p><strong>Sear 2 minutes on each side, then ' + oven + ' minutes in a 150 °C oven</strong> — '
        + (oven + 4) + ' minutes altogether.</p>');
      ctx.addHtml(stable(['Step', 'Time'], [
        ['Sear, first side', '2 min on high heat'],
        ['Sear, second side', '2 min'],
        ['Oven at 150 °C', oven + ' min'],
        ['Pull it at', core2 + ' °C'],
        ['Rest', '10 minutes, loosely covered']
      ]));
      ctx.addHtml('<p class="calc-unmet">A roast this thick cooks from both the pan and the oven, so the oven time is uncertain; start checking early and use a probe. The listed doneness pull temperature is not a safety target. USDA recommends whole beef steaks reach 63 °C (145 °F) and rest at least 3 minutes; see <a href="https://www.fsis.usda.gov/food-safety/safe-food-handling-and-preparation/food-safety-basics/steps-keep-food-safe">USDA FSIS safe cooking temperatures</a>.</p>');
    });
    TXT,
    'showIf' => ['donesear' => 'method == 2', 'thicksear' => 'method == 2', 'doneness' => 'method == 1', 'thickness' => 'method == 1'],
    'article' => [
        'intro' => <<<'TXT'
        This page estimates cooking time for a steak on a hot grill or by searing it before finishing in a 150 °C oven. Choose the method, thickness and preferred doneness to see a time estimate and an approximate pull temperature. Time cannot establish food safety: use a thermometer and follow the USDA minimum-temperature guidance below.
        TXT,
        'sections' => [
            ['title' => 'What the steak cook-time calculator does', 'html' => <<<'TXT'
            <p>The calculator has two distinct routes. <strong>Grill</strong> uses a table keyed by steak thickness and doneness. It returns minutes per side and the total grill time. <strong>Sear roast</strong> estimates a short, hot sear on both sides, followed by an oven phase at 150 °C (302 °F). That route returns the oven estimate and the combined sear-plus-oven time.</p>
            <p>It is a guide for planning, not a live temperature sensor or a promise that a steak will be done at a precise minute. The time table is built into this page. It is not a calculation from a thermal model, and the underlying time estimates are not independently validated for every cut, pan, grill or oven. A thinner steak can cook faster than the estimate; a cold steak or a grill that has lost heat can take longer.</p>
            <p>The temperature shown is an approximate pull temperature associated with the selected doneness. “Pull” means remove the meat from the heat. Carryover cooking may raise its temperature while it rests, but the amount varies. The label is deliberately not “safe temperature”: rare and medium-rare preferences fall below the USDA safe minimum for whole beef steaks.</p>
            TXT],
            ['title' => 'Choose the cooking method and enter only its fields', 'html' => <<<'TXT'
            <p>Start with <strong>Method</strong>. For <strong>Grill</strong>, choose <strong>Doneness</strong> and <strong>Thickness</strong>. The thickness choices run from ½ inch to 2¼ inches. For <strong>Sear roast</strong>, choose <strong>Doneness for sear roast</strong> and <strong>Thickness for sear roast</strong>; those choices run from 1 inch to 2¼ inches. Fields for the inactive method are hidden.</p>
            <p>Use the steak’s thickest point, not its length or width. If the thickness sits between two options, choose the next thicker setting for a more cautious time estimate and begin checking early with a thermometer. This does not guarantee the steak is cooked safely; temperature is the check that matters.</p>
            <p>The result panel is specific to the selected method. A grill result reports minutes on each side, twice that for total grill time, and the approximate pull temperature. A sear-roast result reports a two-minute sear per side, an oven estimate and the sum of those stages. Do not add the grill time to the oven time: they are alternate methods, not consecutive steps.</p>
            TXT],
            ['title' => 'Grill time estimates in the table', 'html' => <<<'TXT'
            <p>For grilling, the calculator looks up minutes per side. These are the exact table values currently built into the tool; they are estimates, not universal cooking standards. The result doubles the per-side time for its total, assuming you turn the steak once.</p>
            <table><thead><tr><th>Thickness</th><th>Rare</th><th>Medium rare</th><th>Medium</th><th>Well done</th></tr></thead><tbody>
            <tr><td>½ in</td><td>1.5 min</td><td>2 min</td><td>2.5 min</td><td>3.5 min</td></tr>
            <tr><td>¾ in</td><td>2 min</td><td>2.5 min</td><td>3 min</td><td>4 min</td></tr>
            <tr><td>1 in</td><td>2.5 min</td><td>3 min</td><td>3.5 min</td><td>4.5 min</td></tr>
            <tr><td>1¼ in</td><td>3 min</td><td>3.5 min</td><td>4 min</td><td>5 min</td></tr>
            <tr><td>1½ in</td><td>3.5 min</td><td>4 min</td><td>4.5 min</td><td>5.5 min</td></tr>
            <tr><td>1¾ in</td><td>4 min</td><td>4.5 min</td><td>5 min</td><td>6 min</td></tr>
            <tr><td>2 in</td><td>4.5 min</td><td>5 min</td><td>5.5 min</td><td>6.5 min</td></tr>
            <tr><td>2¼ in</td><td>5 min</td><td>5.5 min</td><td>6 min</td><td>7 min</td></tr>
            </tbody></table>
            <p>For example, a 1-inch steak set to medium returns 3.5 minutes per side and 7 minutes total. That example explains the page’s arithmetic; it is not a guarantee of a medium center. The grill temperature, cut, marbling and starting temperature all affect the result.</p>
            TXT],
            ['title' => 'How the sear-roast estimate is formed', 'html' => <<<'TXT'
            <p>The sear-roast route assumes a two-minute sear on each side, then an oven set to 150 °C (302 °F). Its base oven estimates increase with the selected thickness: 6, 9, 12, 15, 18 or 21 minutes for the six thickness choices. The page adjusts that base estimate upward as you select a more-done preference. It adds four minutes for the two seared sides to show total time.</p>
            <p>Those figures are simple planning estimates supplied by the calculator, not a published USDA cooking chart. The oven can differ from its dial setting, pans hold heat differently, and thickness does not describe the steak’s shape or starting temperature. The result is most useful for deciding when to begin checking, not for deciding when the meat is safe or finished.</p>
            <p>Start checking before the displayed oven time is up. Insert an instant-read thermometer into the center of the thickest part, entering from the side when that helps the probe reach the middle. Avoid touching the pan or bone, which can distort the reading.</p>
            TXT],
            ['title' => 'Doneness preference and food safety are different', 'html' => <<<'TXT'
            <p>The calculator associates its doneness choices with approximate pull temperatures: rare 49 °C (120 °F), medium rare 54 °C (130 °F), medium 60 °C (140 °F) and well done 68 °C (155 °F). These are culinary targets in the tool, not food-safety thresholds. They can be below the USDA recommendation, especially for rare and medium-rare results.</p>
            <p>For safety, USDA FSIS advises cooking beef steaks, chops and roasts to at least 145 °F (63 °C), measured with a food thermometer, then resting them for at least three minutes. That guidance applies to whole cuts; ground beef has a different minimum. If you choose a lower doneness preference, the result from this calculator should not be read as confirmation that the steak meets USDA guidance.</p>
            <p>The program’s pull temperature is intended to account for some carryover heat, but carryover is not constant. A thin steak, a hot pan, a warm plate and a long rest can change the rise. Check the actual temperature and follow official food-safety guidance rather than relying on the displayed doneness word.</p>
            <p>This is a forward estimate, not an equation solver. It does not work backward from a target time or temperature to infer thickness, and it does not adapt its lookup table after one field changes. If you need a different thickness, choose the closest listed option and monitor the steak directly.</p>
            <p>See the <a href="https://www.fsis.usda.gov/food-safety/safe-food-handling-and-preparation/food-safety-basics/steps-keep-food-safe">USDA FSIS safe food handling and cooking-temperature guidance</a> for current recommendations.</p>
            TXT],
            ['title' => 'A practical way to use the estimate', 'html' => <<<'TXT'
            <ol><li><strong>Measure thickness.</strong> Check the thickest section and choose the nearest listed value.</li><li><strong>Select the method.</strong> Pick Grill or Sear roast, then set the relevant doneness and thickness fields.</li><li><strong>Preheat and prepare.</strong> For the grill estimate, the script assumes a hot grill around 230 °C and a steak brought toward room temperature. Those assumptions may not match your equipment or food.</li><li><strong>Set a timer, but stay nearby.</strong> Use the time as a first check. Turn the steak as directed by your method and check temperature before the estimated end if it looks close.</li><li><strong>Rest and verify.</strong> Let the steak rest as your recipe directs. For safety, check the USDA minimum with a thermometer and observe the recommended rest period.</li></ol>
            <p>Do not leave raw steak at room temperature for an extended period just to match the calculator’s assumption. Keep perishable food refrigerated until preparation, and handle raw meat separately from ready-to-eat food.</p>
            TXT],
            ['title' => 'Why actual cooking time varies', 'html' => <<<'TXT'
            <p><strong>Thickness matters more than weight here.</strong> A steak twice as thick needs more time for heat to reach its center, even if the steaks weigh the same. A bone, fat cap or irregular shape also changes heat flow; the calculator has no fields for those details.</p>
            <p><strong>Heat at the cooking surface changes.</strong> A grill that is not fully preheated, wind, opening the lid and crowding the grate can lower the effective heat. On the sear-roast route, oven calibration and the pan’s retained heat matter. The page does not measure any of these.</p>
            <p><strong>Starting temperature varies.</strong> A steak straight from the refrigerator has a different center temperature from one that has been out briefly. “Room temperature” is not a precise starting condition and does not mean it is safe to leave meat out for long. Use refrigeration and safe food handling practices.</p>
            <p><strong>Resting changes the final reading.</strong> The steak may continue to rise after you remove it from the heat. The page’s single pull-temperature estimate cannot model the exact rise for your cut or equipment. A thermometer is still needed.</p>
            TXT],
            ['title' => 'What this calculator does not establish', 'html' => <<<'TXT'
            <p>This tool does not measure the center temperature, confirm that a grill is 230 °C, test an oven’s accuracy, or know the steak’s cut, shape, bone or initial temperature. Its grill schedule is a lookup table and its sear-roast schedule is a rough estimate. Decimals in the result describe arithmetic precision, not cooking certainty.</p>
            <p>It also cannot guarantee that a steak is safe to eat. The result label names a doneness preference; it is not a food-safety approval. Use a thermometer, follow USDA minimum-temperature advice, and rest the meat for the recommended time. People at higher risk from foodborne illness should take particular care and follow public-health guidance.</p>
            <p>If your steak is thicker or thinner than the options, use a reliable recipe designed for that cut and method, and check temperature as it cooks. Avoid extending the estimate blindly: undercooking and overcooking can both result when a generic time is treated as exact.</p>
            TXT],
            ['title' => 'Source and related cooking tools', 'html' => <<<'TXT'
            <p>The time tables and doneness temperatures above describe the values currently encoded in this calculator. They are not presented as USDA timing recommendations. The food-safety statement is based on USDA FSIS guidance for whole beef steaks and roasts: minimum 145 °F (63 °C) followed by a three-minute rest.</p>
            <p>For other meal planning, see the related <a href="/food/air-fryer">air fryer</a>, <a href="/food/ham-cooking">ham cooking time</a> and <a href="/food/turkey-cooking-time">turkey cooking time</a> calculators. Their time estimates should also be checked against food temperature and current safety guidance.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How does the steak cook-time calculator work?', 'a' => 'Choose Grill or Sear roast, then select thickness and doneness. Grill time comes from a built-in table; the sear-roast route uses an oven-time estimate.'],
            ['q' => 'Are the times exact?', 'a' => 'No. The times are estimates and depend on the meat and equipment. Start checking early and use a thermometer.'],
            ['q' => 'What temperature is safe for a steak?', 'a' => 'USDA FSIS recommends whole beef steaks reach at least 145 °F (63 °C), measured with a food thermometer, followed by a rest of at least three minutes.'],
            ['q' => 'Are the rare and medium-rare temperatures safe minimums?', 'a' => 'No. The temperatures shown for preferred doneness are culinary pull targets in this tool; they are not USDA minimum safe temperatures.'],
            ['q' => 'What does “minutes per side” mean?', 'a' => 'It is the table estimate for one side of a steak on the grill. The displayed total doubles that estimate and assumes one turn.'],
            ['q' => 'Does the sear-roast total include the sear?', 'a' => 'Yes. It adds the two-minute sear on each side to the estimated oven time. The oven and grill routes are alternatives.'],
        ],
        'related' => [
            ['path' => '/food/air-fryer', 'name' => 'Air fryer Calculator'],
            ['path' => '/food/ham-cooking', 'name' => 'Ham cooking time Calculator'],
            ['path' => '/food/turkey-cooking-time', 'name' => 'Turkey cooking time Calculator']
        ],
    ],
];
