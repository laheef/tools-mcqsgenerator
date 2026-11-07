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
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Enzyme 1</strong> — a plain number, no unit</li><li><strong>Enzyme 2</strong> — a plain number, no unit</li><li><strong>I only have the classic three buffers (no universal buffer)</strong> — a plain number, no unit. Uncheck to model a kit that includes a CutSmart-type buffer</li></ul><p>The answers come back as Buffers that suit both, Best combined activity in %, Enzymes that need their own buffer. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Buffers that suit both takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Buffers that suit both, Best combined activity and Enzymes that need their own buffer are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Enzyme 1 is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Enzyme 1, Enzyme 2 and I only have the classic three buffers (no universal buffer) and the number you are missing is Buffers that suit both and Best combined activity.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dihybrid-cross-punnett-square">Dihybrid cross Punnett square Calculator</a>, <a href="/biology/dilution-calculator-c1v1">Dilution (C1V1 = C2V2) Calculator</a> and <a href="/biology/dna-concentration">DNA concentration</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Double Digest Buffer Compatibility calculator work out?', 'a' => 'Buffers that suit both, Best combined activity and Enzymes that need their own buffer.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Enzyme 1, Enzyme 2, I only have the classic three buffers (no universal buffer). Fill enzyme1, enzyme2 and classic_only and leave Buffers that suit both empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Buffers that suit both is not rounded at all; the figure you read is formatted for legibility.'],
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
