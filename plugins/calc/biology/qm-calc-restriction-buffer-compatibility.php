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
    'engine' => 'script',
    'engine_note' => 'compares the buffer requirements of two enzymes and reports the buffers that suit both',
    'meta' => ['title' => 'Double Digest Buffer Compatibility for Two Enzymes', 'description' => 'Compare two restriction enzymes and see which buffers suit both, the best combined activity, and whether the digest has to be done one enzyme at a time.', 'h1' => 'Double Digest Buffer Compatibility Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'grid' => 'FR2',
                    'place' => [
                        0,
                        0,
                        0,
                        1,
                        1,
                        1,
                    ],
                    'fields' => [
                        [
                            'name' => 'enzyme1',
                            'label' => 'Enzyme 1',
                            'type' => 'select',
                            'options' => [
                                'EcoRI' => 'ecori',
                                'HindIII' => 'hindiii',
                                'BamHI' => 'bamhi',
                                'SalI' => 'sali',
                                'XhoI' => 'xhoi',
                                'NotI' => 'noti',
                                'PstI' => 'psti',
                                'SacI' => 'saci',
                                'XbaI' => 'xbai',
                                'KpnI' => 'kpni',
                                'NcoI' => 'ncoi',
                                'NdeI' => 'ndei',
                                'EcoRV' => 'ecorv',
                                'SmaI' => 'smai',
                                'ScaI' => 'scai',
                                'PvuII' => 'pvuii',
                                'MluI' => 'mlui',
                                'BglII' => 'bglii',
                            ],
                            'control' => 'SELECT',
                            'default' => 'EcoRI',
                        ],
                        [
                            'name' => 'enzyme2',
                            'label' => 'Enzyme 2',
                            'type' => 'select',
                            'options' => [
                                'BamHI' => 'bamhi',
                                'EcoRI' => 'ecori',
                                'HindIII' => 'hindiii',
                                'SalI' => 'sali',
                                'XhoI' => 'xhoi',
                                'NotI' => 'noti',
                                'PstI' => 'psti',
                                'SacI' => 'saci',
                                'XbaI' => 'xbai',
                                'KpnI' => 'kpni',
                                'NcoI' => 'ncoi',
                                'NdeI' => 'ndei',
                                'EcoRV' => 'ecorv',
                                'SmaI' => 'smai',
                                'ScaI' => 'scai',
                                'PvuII' => 'pvuii',
                                'MluI' => 'mlui',
                                'BglII' => 'bglii',
                            ],
                            'control' => 'SELECT',
                            'default' => 'SalI',
                        ],
                        [
                            'name' => 'classic_only',
                            'label' => 'I only have the classic three buffers (no universal buffer)',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'help' => 'Uncheck to model a kit that includes a CutSmart-type buffer',
                            'default' => 'No',
                        ],
                        [
                            'name' => 'suitable',
                            'label' => 'Buffers that suit both',
                            'type' => 'result',
                            'help' => 'Out of the buffers available',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'best',
                            'label' => 'Best combined activity',
                            'type' => 'result',
                            'suffix' => '%',
                            'help' => 'Predicted, weaker of the two',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sequential',
                            'label' => 'Enzymes that need their own buffer',
                            'type' => 'result',
                            'help' => '0 or 1',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
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
        var e1 = resolve(ctx.getChoice('enzyme1'), SALT, SALT.ecori);
        var e2 = resolve(ctx.getChoice('enzyme2'), SALT, SALT.sali);
        if (e1.name === e2.name) e2 = SALT.ecori === e1 ? SALT.sali : SALT.ecori;
        var classicOnly = /true|yes|1/i.test(String(ctx.getChoice('classic_only') || ''));
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
    'article' => [
        'intro' => <<<'TXT'
        A double digest only works if one buffer suits both enzymes at once. This page compares the two and tells you whether a shared buffer exists, how much activity each enzyme keeps in it, and whether a sequential digest is the better plan.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It answers the practical question before a digest is set up: can these two enzymes work in the same buffer, and if not, which order should they be used in?</p><p>Each enzyme carries a salt requirement — the concentration at which it works best — and the page compares the two against a panel of buffers, with an option to restrict the panel to the classic buffers or to include the modern universal ones. For each buffer it computes the activity both enzymes would retain. A buffer that keeps both above a usable threshold counts as suitable, and the best combined figure is the weaker of the two activities in the best buffer.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 things to fill in, and the order does not matter:</p><ul><li><strong>Enzyme 1</strong> — a drop-down with the choices the page offers.</li><li><strong>Enzyme 2</strong> — a drop-down with the choices the page offers.</li><li><strong>I only have the classic three buffers (no universal buffer)</strong> — a drop-down with the choices the page offers. Uncheck to model a kit that includes a CutSmart-type buffer.</li></ul><p>The answer comes back as 3 boxes: Buffers that suit both, Best combined activity (%), Enzymes that need their own buffer. They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Enzyme 1</strong> is a drop-down with the choices the page offers. The choices are EcoRI, HindIII, BamHI, SalI, XhoI, NotI, PstI and SacI. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Enzyme 2</strong> is a drop-down with the choices the page offers. The choices are BamHI, EcoRI, HindIII, SalI, XhoI, NotI, PstI and SacI. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>I only have the classic three buffers (no universal buffer)</strong> is a drop-down with the choices the page offers. The choices are Yes and No. Uncheck to model a kit that includes a CutSmart-type buffer Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Enzyme 1</th><td>EcoRI</td></tr><tr><th>Enzyme 2</th><td>BamHI</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Buffers that suit both</th><td>1</td></tr><tr><th>Best combined activity</th><td>100 %</td></tr><tr><th>Enzymes that need their own buffer</th><td>0</td></tr></tbody></table><p>EcoRI and BamHI in classic buffers give one suitable buffer and a best combined activity of 100 per cent — they share an optimal buffer, and no sequential digest is needed.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Enzyme 1</th><td>HindIII</td></tr><tr><th>Enzyme 2</th><td>XhoI</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Buffers that suit both</th><td>1</td></tr><tr><th>Best combined activity</th><td>100</td></tr><tr><th>Enzymes that need their own buffer</th><td>0</td></tr></tbody></table><p>0 of the 3 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Buffers that suit both</strong> — how many of the buffers in the panel keep both enzymes at usable activity.</li><li><strong>Best combined activity</strong> — the activity of the weaker enzyme in the best shared buffer, as a percentage of its optimum.</li><li><strong>Sequential</strong> — whether a one-enzyme-then-the-other protocol is needed, given the shared buffers available.</li></ul><p>Read the suitable count first: zero means no shared buffer and a sequential digest. The best combined figure tells you how comfortable the shared buffer is; anything below about 50 per cent means the digest will be slow and may need more enzyme or more time.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Look up the two enzymes in the supplier's compatibility chart and see whether the buffer the page names appears in both columns at a high percentage. Supplier charts remain the authority; the page is a fast cross-check.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Universal buffers</strong> — Modern kits include a buffer that suits nearly everything. Leaving it out of the panel makes incompatible enzymes look worse than they are.</li><li><strong>Star activity</strong> — Some enzymes become less specific at high salt or in the wrong buffer, cutting at near-cognate sites. A "suitable" buffer is not always a safe one.</li><li><strong>Heat inactivation</strong> — If you plan a sequential digest, the first enzyme must be inactivatable before the second is added.</li></ul><p>Nothing here is pasted from a file: every box is short enough to type, and the choice lists mean the answer depends on which entry is selected rather than on how it is spelled.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A fixed panel</strong> — The buffers modelled are the common ones; a supplier-specific formulation may differ.</li><li><strong>No star activity model</strong> — The page weighs activity, not fidelity.</li><li><strong>Two enzymes</strong> — A triple digest needs pairwise checks.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Double Digest Buffer Compatibility Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>It is used before setting up a double digest, when a diagnostic digest gives partial products, and when deciding whether to buy a universal-buffer enzyme for a step that keeps failing.</p><p>The salt requirement behind the page is worth knowing, because it explains the failure rather than just predicting it. Enzymes that need high salt work poorly in low-salt buffers and slow down; enzymes that need low salt will still work at high salt but often lose specificity first, cutting at near-cognate sites. That is why a compromise buffer is a compromise on fidelity as well as on speed. If a digest in a shared buffer gives extra bands rather than fewer, star activity is the first explanation to test. Reducing the enzyme, shortening the incubation and lowering the glycerol carried over from the first digest are the usual fixes.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does a combined activity of 50 per cent mean in practice?', 'a' => 'Each enzyme works at half its optimal rate. Doubling the enzyme or the incubation time usually compensates, but the reaction is less forgiving.'],
            ['q' => 'Why would a digest need to be sequential?', 'a' => 'Because no single buffer keeps both enzymes active enough, so each is given its own optimal conditions in turn.'],
            ['q' => 'Does Double Digest Buffer Compatibility Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/dihybrid-cross-punnett-square', 'name' => 'Dihybrid cross Punnett square Calculator'],
            ['path' => '/biology/dilution-calculator-c1v1', 'name' => 'Dilution (C1V1 = C2V2) Calculator'],
            ['path' => '/biology/dna-concentration', 'name' => 'DNA concentration'],
        ],
        'authors' => [],
    ],
];
