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
    'meta' => ['title' => 'Double Digest Buffer Compatibility Calculator', 'description' => 'Two enzymes usually want different salt conditions, and the wrong buffer quietly costs you most of your digest. It returns buffers that suit both, best…', 'h1' => 'Double Digest Buffer Compatibility Calculator', 'updated' => '2026-10-29'],
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
        Two enzymes usually want different salt conditions, and the wrong buffer quietly costs you most of your digest. It returns buffers that suit both, best combined activity and enzymes that need their own buffer, and the panel shows all of them at once.
        
        This page models each enzyme's salt class against the four standard buffers, shows the predicted activity of both enzymes in every buffer, and says whether to co-digest in one buffer or to digest sequentially with a clean-up step in between.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Double Digest Buffer Compatibility', 'html' => <<<'TXT'
            <p>activity 100 % at the enzyme's rated salt class, 60 % one class away, 20 % two classes away; co-digest needs ≥ 75 % for both</p>
            <figure class="calc-figure"><img src="/uploads/biology/restriction-buffer-compatibility.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Double Digest Buffer Compatibility Calculator — Modelled activity of two enzymes across four buffers" title="Double Digest Buffer Compatibility Calculator"><figcaption>Modelled activity of two enzymes across four buffers</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>salt class</code></td><td>monovalent salt the enzyme is rated at: 0, 50 or 100 mM NaCl</td><td>mM</td></tr><tr><td><code>CutSmart</code></td><td>the acetate-based universal buffer most suppliers ship</td><td>—</td></tr><tr><td><code>steps away</code></td><td>how many salt classes separate buffer and enzyme</td><td>classes</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Double Digest Buffer Compatibility?', 'html' => <<<'TXT'
            <ol><li>Pick the two enzymes from the panel; the salt classes come from the classic low / medium / high classification.</li><li>Read the buffer table: the column with the highest minimum across the two enzymes is your co-digest buffer.</li><li>If the best combined activity is below about 75 %, digest sequentially instead — the page prints the protocol, including the dilution arithmetic.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>100 % both</td><td><strong>Co-digest</strong></td><td>one buffer, one tube, one incubation</td></tr><tr><td>75 % both</td><td><strong>Co-digest, longer</strong></td><td>double the enzyme or the time to recover the loss</td></tr><tr><td>50 – 74 %</td><td><strong>Sequential</strong></td><td>digest, heat-inactivate or column-purify, then digest again</td></tr><tr><td>below 50 %</td><td><strong>Sequential, two buffers</strong></td><td>no single buffer is acceptable for both</td></tr></tbody></table>
            <ul><li><p>The activity figures here are a salt-class model, not a measured table: 100 % at the enzyme's rated class, 60 % one class away, 20 % two classes away. Published supplier charts are measured per enzyme and should win wherever they disagree.</p></li><li><p>A CutSmart-type buffer is formulated to support nearly every common enzyme at 100 %, which is why it is the default in most kits and why the page rates it at 100 % for the whole panel. Untick it if your kit only has the classic low / medium / high salt buffers — that is the case where the ordering of the two digests actually matters.</p></li><li><p>Glycerol matters as much as salt. Two enzymes both supplied in 50 % glycerol push the reaction above 5 % glycerol, which causes star activity; keep the enzyme volume at or below one tenth of the reaction.</p></li><li><p>If the enzymes need different temperatures, co-digestion is not possible at all: run them one after the other.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Assuming any two enzymes co-digest because they are both 'common'.</li><li>Adding both enzymes neat and pushing the glycerol over 5 % of the reaction volume.</li><li>Heat-inactivating between digests at a temperature that also denatures the DNA or the second enzyme — check the inactivation table, not the incubation temperature.</li><li>Forgetting the methylation status of the template, which can make one enzyme look inactive and be blamed on the buffer.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Can I do a double digest in one buffer?', 'a' => <<<'TXT'
            Yes when both enzymes are rated at least 75 % in the same buffer — the page names that buffer. Otherwise digest sequentially: the second enzyme's own buffer is restored by adding salt or by a column clean-up.
            TXT],
            ['q' => 'What is CutSmart buffer?', 'a' => <<<'TXT'
            A universal buffer (Tris-acetate, potassium acetate, magnesium acetate, BSA) formulated so that the large majority of common enzymes work at full activity in it. It makes most double digests single-tube.
            TXT],
            ['q' => 'Why does my double digest show undigested plasmid?', 'a' => <<<'TXT'
            Usually buffer incompatibility for one of the two enzymes, too much glycerol, or a methylated site. Run each enzyme alone as a control — the one that fails alone is the problem, and it is not the buffer.
            TXT],
            ['q' => 'How do I fix salt between sequential digests?', 'a' => <<<'TXT'
            Either heat-inactivate and dilute 5–10 fold into the second buffer, or purify the DNA on a column. Dilution is fine when the DNA is concentrated; a column is safer when it is not.
            TXT],
            ['q' => 'What does the Double Digest Buffer Compatibility actually calculate?', 'a' => <<<'TXT'
            It returns buffers that suit both, best combined activity and enzymes that need their own buffer. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
        ],
        'related' => [],
    ],
];
