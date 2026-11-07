<?php

/**
 * Restriction Enzyme Finder Calculator
 * /biology/restriction-enzyme-finder
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Restriction Enzyme Finder Calculator',
    'meta' => ['title' => 'Restriction Enzyme Finder Calculator — Biology', 'description' => 'Restriction Enzyme Finder Calculator works out enzymes that cut from DNA sequence and treat the molecule as circular (plasmid). A worked example follows.', 'h1' => 'Restriction Enzyme Finder Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'sequence' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGGAATTCGGATCCAAGCTT', 'c' => null],
                ],
            ],
            'circular' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'yes', 'c' => null],
                ],
                'ds' => 'ds-circular',
            ],
            'cutters' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'unique' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'nocut' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-restriction-enzyme-finder',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'sequence',
                                    'l' => 'DNA sequence',
                                    'h' => 'Paste the plasmid or the amplicon; FASTA headers are ignored',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'circular',
                                    'l' => 'Treat the molecule as circular (plasmid)',
                                    'h' => 'Sites that span the origin are counted too',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-circular',
                                    'opts' => [
                                        ['yes', 'Yes', '1'],
                                        ['no', 'No', '0'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'cutters',
                                    'l' => 'Enzymes that cut',
                                    'h' => 'Out of the panel',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'unique',
                                    'l' => 'Unique cutters',
                                    'h' => 'Exactly one site',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'nocut',
                                    'l' => 'Enzymes that do not cut',
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
            'ds-circular' => [
                'name' => 'Treat the molecule as circular (plasmid)',
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
        
          // name, recognition site, cut offset on the top strand, overhang
          var PANEL = [
            ['EcoRI', 'GAATTC', 1, '5′'], ['BamHI', 'GGATCC', 1, '5′'], ['HindIII', 'AAGCTT', 1, '5′'],
            ['NotI', 'GCGGCCGC', 2, '5′'], ['XhoI', 'CTCGAG', 1, '5′'], ['SalI', 'GTCGAC', 1, '5′'],
            ['PstI', 'CTGCAG', 5, '3′'], ['XbaI', 'TCTAGA', 1, '5′'], ['KpnI', 'GGTACC', 5, '3′'],
            ['SmaI', 'CCCGGG', 3, 'blunt'], ['SacI', 'GAGCTC', 5, '3′'], ['NcoI', 'CCATGG', 1, '5′'],
            ['NdeI', 'CATATG', 2, '5′'], ['EcoRV', 'GATATC', 3, 'blunt'], ['ScaI', 'AGTACT', 3, 'blunt'],
            ['PvuII', 'CAGCTG', 3, 'blunt'], ['HpaI', 'GTTAAC', 3, 'blunt'], ['NruI', 'TCGCGA', 3, 'blunt'],
            ['ApaI', 'GGGCCC', 5, '3′'], ['BglII', 'AGATCT', 1, '5′'], ['SpeI', 'ACTAGT', 1, '5′'],
            ['NheI', 'GCTAGC', 1, '5′'], ['AgeI', 'ACCGGT', 1, '5′'], ['AscI', 'GGCGCGCC', 2, '5′'],
            ['MluI', 'ACGCGT', 1, '5′'], ['SphI', 'GCATGC', 5, '3′']
          ];
          var COMP2 = { A: 'T', T: 'A', G: 'C', C: 'G', N: 'N' };
          function comp(s) {
            var o = '';
            for (var i = s.length - 1; i >= 0; i--) o += COMP2[s.charAt(i)] || 'N';
            return o;
          }
          function sitesOf(seq, site, cut, circular) {
            var hits = [], i, len = site.length;
            var hay = circular ? seq + seq.substring(0, Math.min(len, seq.length)) : seq;
            for (i = 0; i + len <= hay.length; i++) {
              if (hay.substr(i, len) === site) {
                var p = i + cut;
                if (circular) p = ((p % seq.length) + seq.length) % seq.length;
                hits.push(p);
              }
            }
            var rcSite = comp(site);
            if (rcSite !== site) {
              for (i = 0; i + len <= hay.length; i++) {
                if (hay.substr(i, len) === rcSite) {
                  var q = i + (len - cut);
                  if (circular) q = ((q % seq.length) + seq.length) % seq.length;
                  hits.push(q);
                }
              }
            }
            hits.sort(function (a, b) { return a - b; });
            var out = [];
            for (i = 0; i < hits.length; i++) if (out.indexOf(hits[i]) < 0) out.push(hits[i]);
            return out;
          }
          omni.onResult(['sequence', 'circular'], function (ctx) {
            var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
            if (seq.length < 8) {
              ctx.addHtml(block('Enzyme screen', '—', 'Paste at least 8 bp of DNA.'));
              ctx.exportValue('cutters', 0); ctx.exportValue('unique', 0); ctx.exportValue('nocut', 0);
              return;
            }
            var circular = /true|yes|1/i.test(String(ctx.getRawInput('circular') || ''));
            var unique = [], multi = [], none = [];
            for (var i = 0; i < PANEL.length; i++) {
              var enz = PANEL[i];
              var hits = sitesOf(seq, enz[1], enz[2], circular);
              if (hits.length === 1) unique.push([enz[0], enz[1], String(hits[0] + 1) + ' bp', enz[3]]);
              else if (hits.length > 1) multi.push([enz[0], enz[1], hits.length + ' sites: ' + hits.map(function (p) { return p + 1; }).join(', '), enz[3]]);
              else none.push([enz[0], enz[1], '—', enz[3]]);
            }
            ctx.exportValue('cutters', unique.length + multi.length);
            ctx.exportValue('unique', unique.length);
            ctx.exportValue('nocut', none.length);
            var html = block('Enzyme screen (' + seq.length + ' bp, ' + (circular ? 'circular' : 'linear') + ')',
              'Unique cutters   ' + unique.length + '\nMulti cutters    ' + multi.length
              + '\nNo site          ' + none.length,
              unique.length ? 'Start from the unique cutters — one cut per enzyme.'
                            : 'No unique cutter in this panel; widen the enzyme list.');
            html += table('Unique cutters', ['Enzyme', 'Site', 'Cut at', 'Overhang'],
                          unique.length ? unique : [['none', '—', '—', '—']]);
            html += table('Enzymes that cut more than once', ['Enzyme', 'Site', 'Positions', 'Overhang'],
                          multi.length ? multi.slice(0, 14) : [['none', '—', '—', '—']],
                          multi.length > 14 ? 'First 14 shown.' : '');
            html += table('No site in this sequence', ['Enzyme', 'Site', 'Cut at', 'Overhang'], none.slice(0, 14),
                          none.length > 14 ? 'First 14 shown — useful as enzymes that will leave the sequence intact.' : '');
            ctx.addHtml(html);
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Restriction Enzyme Finder works out Enzymes that cut and Unique cutters from DNA sequence and Treat the molecule as circular (plasmid). It is a single relationship that reads enzymes that cut out of DNA sequence, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Restriction Enzyme Finder calculator works', 'html' => <<<'TXT'
            <p>The Restriction Enzyme Finder calculator applies one relationship to 2 numbers and reports Enzymes that cut, Unique cutters and Enzymes that do not cut.</p><p>What comes back is Enzymes that cut, Unique cutters and Enzymes that do not cut — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>DNA sequence</strong> — a plain number, no unit. Paste the plasmid or the amplicon; FASTA headers are ignored</li><li><strong>Treat the molecule as circular (plasmid)</strong> — a plain number, no unit. Sites that span the origin are counted too</li></ul><p>The answers come back as Enzymes that cut, Unique cutters, Enzymes that do not cut. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Enzymes that cut is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Enzymes that cut, Unique cutters and Enzymes that do not cut are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>DNA sequence left as a guess.</strong> Anything typed into DNA sequence is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Treat the molecule as circular (plasmid) left as a guess.</strong> Anything typed into Treat the molecule as circular (plasmid) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert DNA sequence to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>DNA sequence</strong> takes a plain number with no unit attached. Paste the plasmid or the amplicon; FASTA headers are ignored. Have it to hand before you start: DNA sequence is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Treat the molecule as circular (plasmid)</strong> takes a plain number with no unit attached. Sites that span the origin are counted too. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Treat the molecule as circular (plasmid) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Enzymes that cut</strong> is a plain number. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Unique cutters</strong> is a plain number. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Enzymes that do not cut</strong> is a plain number. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Pasting the sequence correctly', 'html' => <<<'TXT'
            <p>The box labelled <strong>DNA sequence</strong> is the input the whole page is built around. It holds characters, and the page reads every one of them.</p><ul><li><strong>No header line.</strong> If the text was copied out of a file, check that the first line is not a description. Anything before the first real base or residue is counted as data.</li><li><strong>No spaces or line numbers.</strong> Sequence viewers wrap the text and number the lines. The numbers are not part of the sequence, and a paste that includes them will fail or, worse, half-succeed.</li><li><strong>Case is a choice you make.</strong> Many tools treat upper and lower case as the same letters and others do not. Paste the sequence in the case that carries the meaning you intend.</li><li><strong>Ambiguous characters are not rare.</strong> An N in a sequence, an X in a protein, or an IUPAC code standing for two possible bases is a real value, not a typo. The page will count it; interpret the answer with that in mind.</li></ul><p>Paste once, check the first and last few characters of what landed in the box, and then read Enzymes that cut, Unique cutters and Enzymes that do not cut. If one of those figures is impossible — a length that does not match the text, a count larger than the sequence — the paste is the thing to look at first, not the formula.</p>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Restriction Enzyme Finder is not a single equation with a single answer. It reads DNA sequence and Treat the molecule as circular (plasmid), applies the analysis the page is built around, and reports Enzymes that cut, Unique cutters and Enzymes that do not cut.</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Enzymes that cut, Unique cutters and Enzymes that do not cut. They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need DNA sequence and Treat the molecule as circular (plasmid). Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type DNA sequence into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Enzymes that cut with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Enzymes that cut is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: DNA sequence and Treat the molecule as circular (plasmid) measured, Enzymes that cut and Unique cutters wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/amino-acid-composition">Amino Acid Composition Calculator</a>, <a href="/biology/animal-mortality-rate">Animal mortality rate</a> and <a href="/biology/annealing-temperature">Annealing temperature Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Restriction Enzyme Finder calculator work out?', 'a' => 'Enzymes that cut, Unique cutters and Enzymes that do not cut.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            DNA sequence, Treat the molecule as circular (plasmid). With DNA sequence and treat the molecule as circular (plasmid) in place, Enzymes that cut can stay blank and the page will work it out.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Enzymes that cut is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Enzymes that cut, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Enzymes that cut keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/amino-acid-composition', 'name' => 'Amino Acid Composition Calculator'],
            ['path' => '/biology/animal-mortality-rate', 'name' => 'Animal mortality rate'],
            ['path' => '/biology/annealing-temperature', 'name' => 'Annealing temperature Calculator'],
        ],
        'authors' => [],
    ],
];
