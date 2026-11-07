<?php

/**
 * Double Digest Buffer Compatibility Calculator
 * /biology/restriction-buffer-compatibility
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Double Digest Buffer Compatibility Calculator',
    'meta' => ['title' => 'Double Digest Buffer Compatibility Calculator', 'description' => <<<'TXT'
    Double Digest Buffer Compatibility takes Enzyme 1, Enzyme 2 and I only have the classic three buffers (no universal buffer) and returns Buffers that suit both…
    TXT, 'h1' => 'Double Digest Buffer Compatibility Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'enzyme1' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ecori', 'c' => null],
                ],
                'ds' => 'ds-enzyme1',
            ],
            'enzyme2' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'sali', 'c' => null],
                ],
                'ds' => 'ds-enzyme2',
            ],
            'classic_only' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'no', 'c' => null],
                ],
                'ds' => 'ds-classic_only',
            ],
            'suitable' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'best' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'sequential' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-restriction-buffer-compatibility',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'enzyme1',
                                    'l' => 'Enzyme 1',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-enzyme1',
                                    'opts' => [
                                        ['ecori', 'EcoRI', 'ecori'],
                                        ['hindiii', 'HindIII', 'hindiii'],
                                        ['bamhi', 'BamHI', 'bamhi'],
                                        ['sali', 'SalI', 'sali'],
                                        ['xhoi', 'XhoI', 'xhoi'],
                                        ['noti', 'NotI', 'noti'],
                                        ['psti', 'PstI', 'psti'],
                                        ['saci', 'SacI', 'saci'],
                                        ['xbai', 'XbaI', 'xbai'],
                                        ['kpni', 'KpnI', 'kpni'],
                                        ['ncoi', 'NcoI', 'ncoi'],
                                        ['ndei', 'NdeI', 'ndei'],
                                        ['ecorv', 'EcoRV', 'ecorv'],
                                        ['smai', 'SmaI', 'smai'],
                                        ['scai', 'ScaI', 'scai'],
                                        ['pvuii', 'PvuII', 'pvuii'],
                                        ['mlui', 'MluI', 'mlui'],
                                        ['bglii', 'BglII', 'bglii'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'enzyme2',
                                    'l' => 'Enzyme 2',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-enzyme2',
                                    'opts' => [
                                        ['bamhi', 'BamHI', 'bamhi'],
                                        ['ecori', 'EcoRI', 'ecori'],
                                        ['hindiii', 'HindIII', 'hindiii'],
                                        ['sali', 'SalI', 'sali'],
                                        ['xhoi', 'XhoI', 'xhoi'],
                                        ['noti', 'NotI', 'noti'],
                                        ['psti', 'PstI', 'psti'],
                                        ['saci', 'SacI', 'saci'],
                                        ['xbai', 'XbaI', 'xbai'],
                                        ['kpni', 'KpnI', 'kpni'],
                                        ['ncoi', 'NcoI', 'ncoi'],
                                        ['ndei', 'NdeI', 'ndei'],
                                        ['ecorv', 'EcoRV', 'ecorv'],
                                        ['smai', 'SmaI', 'smai'],
                                        ['scai', 'ScaI', 'scai'],
                                        ['pvuii', 'PvuII', 'pvuii'],
                                        ['mlui', 'MluI', 'mlui'],
                                        ['bglii', 'BglII', 'bglii'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'classic_only',
                                    'l' => 'I only have the classic three buffers (no universal buffer)',
                                    'h' => 'Uncheck to model a kit that includes a CutSmart-type buffer',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-classic_only',
                                    'opts' => [
                                        ['yes', 'Yes', '1'],
                                        ['no', 'No', '0'],
                                    ],
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'suitable',
                                    'l' => 'Buffers that suit both',
                                    'h' => 'Out of the buffers available',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'best',
                                    'l' => 'Best combined activity',
                                    'h' => 'Predicted, weaker of the two',
                                    'suf' => '%',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'sequential',
                                    'l' => 'Enzymes that need their own buffer',
                                    'h' => '0 or 1',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [],
        'datasets' => [
            'ds-enzyme1' => [
                'name' => 'Enzyme 1',
                'uiType' => 'SELECT',
                'options' => [
                    ['uid' => 'ecori', 'label' => 'EcoRI', 'value' => 'ecori'],
                    ['uid' => 'hindiii', 'label' => 'HindIII', 'value' => 'hindiii'],
                    ['uid' => 'bamhi', 'label' => 'BamHI', 'value' => 'bamhi'],
                    ['uid' => 'sali', 'label' => 'SalI', 'value' => 'sali'],
                    ['uid' => 'xhoi', 'label' => 'XhoI', 'value' => 'xhoi'],
                    ['uid' => 'noti', 'label' => 'NotI', 'value' => 'noti'],
                    ['uid' => 'psti', 'label' => 'PstI', 'value' => 'psti'],
                    ['uid' => 'saci', 'label' => 'SacI', 'value' => 'saci'],
                    ['uid' => 'xbai', 'label' => 'XbaI', 'value' => 'xbai'],
                    ['uid' => 'kpni', 'label' => 'KpnI', 'value' => 'kpni'],
                    ['uid' => 'ncoi', 'label' => 'NcoI', 'value' => 'ncoi'],
                    ['uid' => 'ndei', 'label' => 'NdeI', 'value' => 'ndei'],
                    ['uid' => 'ecorv', 'label' => 'EcoRV', 'value' => 'ecorv'],
                    ['uid' => 'smai', 'label' => 'SmaI', 'value' => 'smai'],
                    ['uid' => 'scai', 'label' => 'ScaI', 'value' => 'scai'],
                    ['uid' => 'pvuii', 'label' => 'PvuII', 'value' => 'pvuii'],
                    ['uid' => 'mlui', 'label' => 'MluI', 'value' => 'mlui'],
                    ['uid' => 'bglii', 'label' => 'BglII', 'value' => 'bglii'],
                ],
            ],
            'ds-enzyme2' => [
                'name' => 'Enzyme 2',
                'uiType' => 'SELECT',
                'options' => [
                    ['uid' => 'bamhi', 'label' => 'BamHI', 'value' => 'bamhi'],
                    ['uid' => 'ecori', 'label' => 'EcoRI', 'value' => 'ecori'],
                    ['uid' => 'hindiii', 'label' => 'HindIII', 'value' => 'hindiii'],
                    ['uid' => 'sali', 'label' => 'SalI', 'value' => 'sali'],
                    ['uid' => 'xhoi', 'label' => 'XhoI', 'value' => 'xhoi'],
                    ['uid' => 'noti', 'label' => 'NotI', 'value' => 'noti'],
                    ['uid' => 'psti', 'label' => 'PstI', 'value' => 'psti'],
                    ['uid' => 'saci', 'label' => 'SacI', 'value' => 'saci'],
                    ['uid' => 'xbai', 'label' => 'XbaI', 'value' => 'xbai'],
                    ['uid' => 'kpni', 'label' => 'KpnI', 'value' => 'kpni'],
                    ['uid' => 'ncoi', 'label' => 'NcoI', 'value' => 'ncoi'],
                    ['uid' => 'ndei', 'label' => 'NdeI', 'value' => 'ndei'],
                    ['uid' => 'ecorv', 'label' => 'EcoRV', 'value' => 'ecorv'],
                    ['uid' => 'smai', 'label' => 'SmaI', 'value' => 'smai'],
                    ['uid' => 'scai', 'label' => 'ScaI', 'value' => 'scai'],
                    ['uid' => 'pvuii', 'label' => 'PvuII', 'value' => 'pvuii'],
                    ['uid' => 'mlui', 'label' => 'MluI', 'value' => 'mlui'],
                    ['uid' => 'bglii', 'label' => 'BglII', 'value' => 'bglii'],
                ],
            ],
            'ds-classic_only' => [
                'name' => 'I only have the classic three buffers (no universal buffer)',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'yes', 'label' => 'Yes', 'value' => '1'],
                    ['uid' => 'no', 'label' => 'No', 'value' => '0'],
                ],
            ],
        ],
        'js' => <<<'TXT'
        function cleanSeq(raw, kind) {
            var s = String(raw || '').replace(/^>.*$/gm, '');
            s = s.replace(/[^A-Za-z]/g, '');
            return kind === 'protein' ? s.toUpperCase() : s.toUpperCase().replace(/U/g, 'T');
          }
          function wrap(s, width) {
            width = width || 60;
            var out = [];
            for (var i = 0; i < s.length; i += width) out.push(s.slice(i, i + width));
            return out.join('\n');
          }
          function esc(s) {
            return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
          }
          function block(title, body, note) {
            return '<div class="calc-script-block"><h3>' + esc(title) + '</h3><pre>' + esc(body) + '</pre>'
              + (note ? '<p class="calc-script-note">' + esc(note) + '</p>' : '') + '</div>';
          }
          function table(title, head, rows, note) {
            var h = '<tr>' + head.map(function (c) { return '<th>' + esc(c) + '</th>'; }).join('') + '</tr>';
            var b = rows.map(function (r) {
              return '<tr>' + r.map(function (c) { return '<td>' + esc(c) + '</td>'; }).join('') + '</tr>';
            }).join('');
            return '<div class="calc-script-block"><h3>' + esc(title) + '</h3>'
              + '<div class="calc-script-scroll"><table class="calc-script-table">' + h + b + '</table></div>'
              + (note ? '<p class="calc-script-note">' + esc(note) + '</p>' : '') + '</div>';
          }
          // A select arrives here as the option *uid* the panel generated from the label,
          // not as its value, so resolve by normalised containment and take the longest
          // match (otherwise "hindiii" would be caught by a shorter key like "hin").
          function resolve(raw, map, fallback) {
            var n = String(raw || '').toLowerCase().replace(/[^a-z0-9]/g, '');
            if (Object.prototype.hasOwnProperty.call(map, raw)) return map[raw];
            var keys = Object.keys(map).sort(function (a, b) { return b.length - a.length; });
            for (var i = 0; i < keys.length; i++) {
              var k = keys[i].toLowerCase().replace(/[^a-z0-9]/g, '');
              if (k && n.indexOf(k) >= 0) return map[keys[i]];
            }
            return fallback;
          }
          var BASES = 'TCAG';
          var AA_ORDER = 'FFLLSSSSYY**CC*WLLLLPPPPHHQQRRRRIIIMTTTTNNKKSSRRVVVVAAAADDEEGGGG';
          function aaOf(codon) {
            var i1 = BASES.indexOf(codon.charAt(0)), i2 = BASES.indexOf(codon.charAt(1)),
                i3 = BASES.indexOf(codon.charAt(2));
            if (i1 < 0 || i2 < 0 || i3 < 0) return null;
            return AA_ORDER.charAt(i1 * 16 + i2 * 4 + i3);
          }
          var STOPS = { TAA: 1, TAG: 1, TGA: 1 };
          var MASS = { A: 71.0788, R: 156.1875, N: 114.1038, D: 115.0886, C: 103.1388,
                       E: 129.1155, Q: 128.1307, G: 57.0519, H: 137.1411, I: 113.1594,
                       L: 113.1594, K: 128.1741, M: 131.1926, F: 147.1766, P: 97.1167,
                       S: 87.0782, T: 101.1051, W: 186.2132, Y: 163.1760, V: 99.1326 };
          function peptideMass(s) {
            var m = 0, n = 0;
            for (var i = 0; i < s.length; i++) {
              var x = MASS[s.charAt(i)];
              if (x) { m += x; n++; }
            }
            return n ? m + 18.01524 : 0;
          }
        
          // Classic low / medium / high salt classes (mM NaCl at which the enzyme is rated).
          var SALT = {
            ecori: { name: 'EcoRI', salt: 50 }, hindiii: { name: 'HindIII', salt: 50 },
            bamhi: { name: 'BamHI', salt: 100 }, sali: { name: 'SalI', salt: 100 },
            xhoi: { name: 'XhoI', salt: 100 }, noti: { name: 'NotI', salt: 100 },
            psti: { name: 'PstI', salt: 50 }, saci: { name: 'SacI', salt: 50 },
            xbai: { name: 'XbaI', salt: 50 }, kpni: { name: 'KpnI', salt: 50 },
            ncoi: { name: 'NcoI', salt: 50 }, ndei: { name: 'NdeI', salt: 50 },
            ecorv: { name: 'EcoRV', salt: 0 }, smai: { name: 'SmaI', salt: 0 },
            scai: { name: 'ScaI', salt: 0 }, pvuii: { name: 'PvuII', salt: 0 },
            mlui: { name: 'MluI', salt: 100 }, bglii: { name: 'BglII', salt: 50 }
          };
          var BUFFERS = [
            { name: 'Buffer 1 (low salt)', salt: 0 },
            { name: 'Buffer 2 (medium salt)', salt: 50 },
            { name: 'Buffer 3 (high salt)', salt: 100 },
            { name: 'CutSmart (universal)', salt: -1 }
          ];
          function activity(buffer, enzyme) {
            if (buffer.salt < 0) return 100;              // universal buffer, supplier-rated
            var steps = Math.abs(buffer.salt - enzyme.salt) / 50;
            return steps === 0 ? 100 : steps === 1 ? 60 : 20;
          }
          omni.onResult(['enzyme1', 'enzyme2', 'classic_only'], function (ctx) {
            var e1 = resolve(ctx.getRawInput('enzyme1'), SALT, SALT.ecori);
            var e2 = resolve(ctx.getRawInput('enzyme2'), SALT, SALT.sali);
            if (e1.name === e2.name) e2 = SALT.ecori === e1 ? SALT.sali : SALT.ecori;
            var classicOnly = /true|yes|1/i.test(String(ctx.getRawInput('classic_only') || ''));
            var list = classicOnly ? BUFFERS.slice(0, 3) : BUFFERS;
            var rows = [], bestName = '', bestMin = -1, suitable = 0;
            for (var i = 0; i < list.length; i++) {
              var a1 = activity(list[i], e1), a2 = activity(list[i], e2);
              var lo = Math.min(a1, a2);
              if (lo >= 75) suitable++;
              if (lo > bestMin) { bestMin = lo; bestName = list[i].name; }
              rows.push([list[i].name, a1 + ' %', a2 + ' %', lo >= 75 ? 'use it' : lo >= 50 ? 'marginal' : 'no']);
            }
            var needSeq = bestMin < 75 ? 1 : 0;
            ctx.exportValue('suitable', suitable);
            ctx.exportValue('best', bestMin);
            ctx.exportValue('sequential', needSeq);
            var html = table('Predicted activity', ['Buffer', e1.name, e2.name, 'Verdict'], rows,
              'Modelled from salt class: 100 % at the rated class, 60 % one class away, 20 % two away.');
            if (needSeq === 0) {
              html += block('Recommendation: co-digest', 'Buffer        ' + bestName
                + '\nActivity      ' + bestMin + ' % for both'
                + '\nGlycerol      keep total enzyme ≤ 1/10 of the reaction volume',
                bestMin === 100 ? 'One tube, one buffer, one incubation.'
                                : 'Compensate for the loss: double the enzyme or extend the incubation to 2 hours.');
            } else {
              html += block('Recommendation: digest sequentially',
                'Step 1   digest ' + e1.name + ' in its own buffer (salt class ' + e1.salt + ' mM)\n'
                + 'Step 2   heat-inactivate if the enzyme allows, or purify on a column\n'
                + 'Step 3   digest ' + e2.name + ' in its own buffer (salt class ' + e2.salt + ' mM)\n'
                + 'Step 4   if you dilute instead of purifying, dilute 5× to drop the carried salt',
                'No single buffer reaches 75 % for both enzymes'
                + (classicOnly ? ' — a universal buffer would make this a single tube.' : '.'));
            }
            ctx.addHtml(html);
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Double Digest Buffer Compatibility takes Enzyme 1, Enzyme 2 and I only have the classic three buffers (no universal buffer) and returns Buffers that suit both and Best combined activity. There is no hidden constant here: change Buffers that suit both and Enzyme 1 moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Double Digest Buffer Compatibility calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Double Digest Buffer Compatibility: it takes 3 numbers and reports Buffers that suit both, Best combined activity and Enzymes that need their own buffer.</p><p>What comes back is Buffers that suit both, Best combined activity and Enzymes that need their own buffer — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Enzyme 1</strong> — a plain number, no unit</li><li><strong>Enzyme 2</strong> — a plain number, no unit</li><li><strong>I only have the classic three buffers (no universal buffer)</strong> — a plain number, no unit. Uncheck to model a kit that includes a CutSmart-type buffer</li></ul><p>The answers come back as Buffers that suit both, Best combined activity in %, Enzymes that need their own buffer. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Buffers that suit both takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Buffers that suit both, Best combined activity and Enzymes that need their own buffer are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Enzyme 1 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Enzyme 1 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Enzyme 2 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Enzyme 2 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>I only have the classic three buffers (no universal buffer) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If I only have the classic three buffers (no universal buffer) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Enzyme 1 is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Enzyme 1</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Enzyme 1 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Enzyme 2</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Enzyme 2 is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>I only have the classic three buffers (no universal buffer)</strong> takes a plain number with no unit attached. Uncheck to model a kit that includes a CutSmart-type buffer. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: I only have the classic three buffers (no universal buffer) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Buffers that suit both</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Best combined activity</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Enzymes that need their own buffer</strong> is a plain number. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Double Digest Buffer Compatibility is not a single equation with a single answer. It reads Enzyme 1, Enzyme 2 and I only have the classic three buffers (no universal buffer), applies the analysis the page is built around, and reports Buffers that suit both, Best combined activity and Enzymes that need their own buffer.</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Buffers that suit both, Best combined activity and Enzymes that need their own buffer. They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Enzyme 1, Enzyme 2 and I only have the classic three buffers (no universal buffer). Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Enzyme 1 into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Buffers that suit both with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Buffers that suit both follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Enzyme 1, Enzyme 2 and I only have the classic three buffers (no universal buffer) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Enzyme 1, Enzyme 2 and I only have the classic three buffers (no universal buffer) and the number you are missing is Buffers that suit both and Best combined activity.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dihybrid-cross-punnett-square">Dihybrid cross Punnett square Calculator</a>, <a href="/biology/dilution-calculator-c1v1">Dilution (C1V1 = C2V2) Calculator</a> and <a href="/biology/dna-concentration">DNA concentration</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Double Digest Buffer Compatibility calculator work out?', 'a' => 'Buffers that suit both, Best combined activity and Enzymes that need their own buffer.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Enzyme 1, Enzyme 2, I only have the classic three buffers (no universal buffer). Fill enzyme1, enzyme2 and classic_only and leave Buffers that suit both empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Buffers that suit both is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Buffers that suit both, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Buffers that suit both keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dihybrid-cross-punnett-square', 'name' => 'Dihybrid cross Punnett square Calculator'],
            ['path' => '/biology/dilution-calculator-c1v1', 'name' => 'Dilution (C1V1 = C2V2) Calculator'],
            ['path' => '/biology/dna-concentration', 'name' => 'DNA concentration'],
        ],
        'authors' => [],
    ],
];
