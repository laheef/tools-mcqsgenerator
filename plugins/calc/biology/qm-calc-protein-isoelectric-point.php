<?php

/**
 * Protein Isoelectric Point Calculator
 * /biology/protein-isoelectric-point
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Protein Isoelectric Point Calculator',
    'meta' => ['title' => 'Protein Isoelectric Point Calculator: Steps & Units', 'description' => 'Protein Isoelectric Point Calculator reports net charge at the given pH and length. Nothing is stored between visits, and the working stays on the page.', 'h1' => 'Protein Isoelectric Point Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'protein' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'MKTAYIAKQRQISFVKSHFSRQLEERLGLIEVQAPILSRVGDGTQDNLSGAEKAVQVKVKAL', 'c' => null],
                ],
            ],
            'ph' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '7.0', 'c' => null],
                ],
            ],
            'pi' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'charge' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mw_kda' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'acidic' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'basic' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gravy' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-protein-isoelectric-point',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'protein',
                                    'l' => 'Protein sequence',
                                    'h' => 'Single-letter code; headers, spaces and digits are ignored',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'ph',
                                    'l' => 'pH for the charge calculation',
                                    'h' => 'Net charge is reported at this pH',
                                    'suf' => 'pH',
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'pi',
                                    'l' => 'Isoelectric point',
                                    'suf' => 'pH',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'charge',
                                    'l' => 'Net charge at the given pH',
                                    'suf' => 'e',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'length',
                                    'l' => 'Length',
                                    'suf' => 'aa',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'mw_kda',
                                    'l' => 'Molecular weight',
                                    'h' => 'Average residue masses, no PTMs',
                                    'suf' => 'kDa',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'acidic',
                                    'l' => 'Acidic residues (D + E)',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'basic',
                                    'l' => 'Basic residues (K + R + H)',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gravy',
                                    'l' => 'GRAVY (hydrophobicity)',
                                    'h' => 'Positive means hydrophobic',
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
        'datasets' => [],
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
          function gcOf(s) {
            var gc = 0;
            for (var i = 0; i < s.length; i++) { var c = s.charAt(i); if (c === 'G' || c === 'C') gc++; }
            return gc;
          }
          function tmOf(n, pct, at, gc) {
            if (n <= 14) return 2 * at + 4 * gc;
            if (n <= 40) return 64.9 + 41 * (gc - 16.4) / n;
            return 81.5 + 16.6 * Math.log10(0.05) + 0.41 * pct - 675 / n;
          }
          function pct1(x) { return (Math.round(x * 10) / 10).toFixed(1); }
          function pct2(x) { return (Math.round(x * 100) / 100).toFixed(2); }
          var COMP = {A:'T',T:'A',G:'C',C:'G',U:'A',R:'Y',Y:'R',S:'S',W:'W',K:'M',M:'K',
                      B:'V',V:'B',D:'H',H:'D',N:'N'};
          function revcomp(s) {
            var out = '';
            for (var i = s.length - 1; i >= 0; i--) out += COMP[s.charAt(i)] || 'N';
            return out;
          }
          // NCBI standard genetic code: bases ordered T, C, A, G for each position
          var CODON_TABLE = 'FFLLSSSSYY**CC*WLLLLPPPPHHQQRRRRIIIMTTTTNNKKSSRRVVVVAAAADDEEGGGG';
          var BASES = 'TCAG';
          function aaOf(codon) {
            var i1 = BASES.indexOf(codon.charAt(0)), i2 = BASES.indexOf(codon.charAt(1)),
                i3 = BASES.indexOf(codon.charAt(2));
            if (i1 < 0 || i2 < 0 || i3 < 0) return null;
            return CODON_TABLE.charAt(16 * i1 + 4 * i2 + i3);
          }
          function eachCodon(seq, frame, fn) {
            for (var i = (frame || 0); i + 3 <= seq.length; i += 3) {
              fn(seq.substr(i, 3), i);
            }
          }
        
          var PKA = {D: 3.65, E: 4.25, C: 8.18, Y: 10.07, H: 6.00, K: 10.53, R: 12.48,
                     nterm: 8.20, cterm: 3.65};
          var MASS = {A: 89.09, R: 174.20, N: 132.12, D: 133.10, C: 121.16, E: 147.13, Q: 146.15,
                      G: 75.07, H: 155.16, I: 131.17, L: 131.17, K: 146.19, M: 149.21, F: 165.19,
                      P: 115.13, S: 105.09, T: 119.12, W: 204.23, Y: 181.19, V: 117.15};
          var HYDRO = {A: 1.8, R: -4.5, N: -3.5, D: -3.5, C: 2.5, E: -3.5, Q: -3.5, G: -0.4,
                       H: -3.2, I: 4.5, L: 3.8, K: -3.9, M: 1.9, F: 2.8, P: -1.6, S: -0.8,
                       T: -0.7, W: -0.9, Y: -1.3, V: 4.2};
          function netCharge(counts, n, ph) {
            var pos = counts.K / (1 + Math.pow(10, ph - PKA.K))
                    + counts.R / (1 + Math.pow(10, ph - PKA.R))
                    + counts.H / (1 + Math.pow(10, ph - PKA.H))
                    + 1 / (1 + Math.pow(10, ph - PKA.nterm));
            var neg = counts.D / (1 + Math.pow(10, PKA.D - ph))
                    + counts.E / (1 + Math.pow(10, PKA.E - ph))
                    + counts.C / (1 + Math.pow(10, PKA.C - ph))
                    + counts.Y / (1 + Math.pow(10, PKA.Y - ph))
                    + 1 / (1 + Math.pow(10, PKA.cterm - ph));
            return pos - neg;
          }
          omni.onResult(['protein', 'ph'], function (ctx) {
            var p = String(ctx.getRawInput('protein') || '').replace(/^>.*$/gm, '')
              .replace(/[^A-Za-z*]/g, '').toUpperCase().replace(/\*/g, '');
            if (!p) {
              ctx.addHtml(block('Isoelectric point', '—', 'Paste a protein sequence.'));
              return;
            }
            var counts = {D: 0, E: 0, C: 0, Y: 0, H: 0, K: 0, R: 0};
            var mass = 0, hydro = 0, known = 0;
            for (var i = 0; i < p.length; i++) {
              var aa = p.charAt(i);
              if (counts.hasOwnProperty(aa)) counts[aa]++;
              if (MASS[aa]) { mass += MASS[aa]; hydro += HYDRO[aa]; known++; }
            }
            mass = mass - (known - 1) * 18.015 + 18.015;   // peptide bonds, plus terminal water
            var ph = Number(ctx.getRawInput('ph'));
            if (!isFinite(ph)) ph = 7;
        
            var lo = 0, hi = 14;
            for (var k = 0; k < 60; k++) {
              var mid = (lo + hi) / 2;
              if (netCharge(counts, p.length, mid) > 0) lo = mid; else hi = mid;
            }
            var pi = (lo + hi) / 2;
            var charge = netCharge(counts, p.length, ph);
            var gravy = known ? hydro / known : 0;
        
            ctx.exportValue('pi', Math.round(pi * 100) / 100);
            ctx.exportValue('charge', Math.round(charge * 100) / 100);
            ctx.exportValue('length', p.length);
            ctx.exportValue('mw_kda', Math.round(mass / 1000 * 100) / 100);
            ctx.exportValue('acidic', counts.D + counts.E);
            ctx.exportValue('basic', counts.K + counts.R + counts.H);
            ctx.exportValue('gravy', Math.round(gravy * 1000) / 1000);
        
            ctx.addHtml(block('Isoelectric point',
              'pI = ' + pi.toFixed(2) + '\nNet charge at pH ' + ph.toFixed(1) + ' = '
              + (charge >= 0 ? '+' : '') + charge.toFixed(2) + ' e'
              + '\nLength ' + p.length + ' aa · mass ' + (mass / 1000).toFixed(2) + ' kDa'
              + '\nGRAVY ' + gravy.toFixed(3) + ' (' + (gravy > 0 ? 'hydrophobic' : 'hydrophilic') + ')',
              'Calculated with solution pKa values; PTMs and bound ions are not included.'));
            ctx.addHtml(table('Ionisable groups', ['Group', 'pKa', 'Residues', 'State at pH ' + ph.toFixed(1)],
              [['Asp (D)', '3.65', String(counts.D), counts.D ? (ph > 3.65 ? 'deprotonated (−)' : 'protonated (0)') : '—'],
               ['Glu (E)', '4.25', String(counts.E), counts.E ? (ph > 4.25 ? 'deprotonated (−)' : 'protonated (0)') : '—'],
               ['Cys (C)', '8.18', String(counts.C), counts.C ? (ph > 8.18 ? 'deprotonated (−)' : 'protonated (0)') : '—'],
               ['Tyr (Y)', '10.07', String(counts.Y), counts.Y ? (ph > 10.07 ? 'deprotonated (−)' : 'protonated (0)') : '—'],
               ['His (H)', '6.00', String(counts.H), counts.H ? (ph < 6 ? 'protonated (+)' : 'neutral') : '—'],
               ['Lys (K)', '10.53', String(counts.K), counts.K ? (ph < 10.53 ? 'protonated (+)' : 'neutral') : '—'],
               ['Arg (R)', '12.48', String(counts.R), counts.R ? (ph < 12.48 ? 'protonated (+)' : 'neutral') : '—'],
               ['N-terminus', '8.20', '1', ph < 8.2 ? 'protonated (+)' : 'neutral'],
               ['C-terminus', '3.65', '1', ph > 3.65 ? 'deprotonated (−)' : 'neutral']]));
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Protein sequence and pH for the charge calculation into Protein Isoelectric Point and the answer comes back as Isoelectric point and Net charge at the given pH. There is no hidden constant here: change isoelectric point and protein sequence moves with it. The main result, Isoelectric point, is reported in pH.
        TXT,
        'sections' => [
            ['title' => 'How the Protein Isoelectric Point calculator works', 'html' => <<<'TXT'
            <p>The Protein Isoelectric Point calculator applies one relationship to 2 numbers and reports Isoelectric point, Net charge at the given pH and Length.</p><p>The answers are Isoelectric point, Net charge at the given pH, Length and Molecular weight; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Protein sequence</strong> — a plain number, no unit. Single-letter code; headers, spaces and digits are ignored</li><li><strong>pH for the charge calculation</strong> — in pH. Net charge is reported at this pH</li></ul><p>The result boxes are Isoelectric point in pH, Net charge at the given pH in e, Length in aa, Molecular weight in kDa, Acidic residues (D + E), Basic residues (K + R + H), GRAVY (hydrophobicity); they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Isoelectric point is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Isoelectric point, Net charge at the given pH and Length are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Protein sequence left as a guess.</strong> Anything typed into Protein sequence is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>pH for the charge calculation left as a guess.</strong> Anything typed into pH for the charge calculation is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Protein sequence is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Protein sequence</strong> takes a plain number with no unit attached. Single-letter code; headers, spaces and digits are ignored. Have it to hand before you start: Protein sequence is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>pH for the charge calculation</strong> is measured in pH. Net charge is reported at this pH. Have it to hand before you start: pH for the charge calculation is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 7 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Isoelectric point</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Net charge at the given pH</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Length</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Molecular weight</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Acidic residues (D + E)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Basic residues (K + R + H)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>GRAVY (hydrophobicity)</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Pasting the sequence correctly', 'html' => <<<'TXT'
            <p>The box labelled <strong>Protein sequence</strong> is the input the whole page is built around. It holds characters, and the page reads every one of them.</p><ul><li><strong>No header line.</strong> If the text was copied out of a file, check that the first line is not a description. Anything before the first real base or residue is counted as data.</li><li><strong>No spaces or line numbers.</strong> Sequence viewers wrap the text and number the lines. The numbers are not part of the sequence, and a paste that includes them will fail or, worse, half-succeed.</li><li><strong>Case is a choice you make.</strong> Many tools treat upper and lower case as the same letters and others do not. Paste the sequence in the case that carries the meaning you intend.</li><li><strong>Ambiguous characters are not rare.</strong> An N in a sequence, an X in a protein, or an IUPAC code standing for two possible bases is a real value, not a typo. The page will count it; interpret the answer with that in mind.</li></ul><p>Paste once, check the first and last few characters of what landed in the box, and then read Isoelectric point, Net charge at the given pH, Length and Molecular weight. If one of those figures is impossible — a length that does not match the text, a count larger than the sequence — the paste is the thing to look at first, not the formula.</p>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Protein Isoelectric Point is not a single equation with a single answer. It reads Protein sequence and pH for the charge calculation, applies the analysis the page is built around, and reports Isoelectric point, Net charge at the given pH, Length and Molecular weight.</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Isoelectric point, Net charge at the given pH, Length and Molecular weight. They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Isoelectric point is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Protein sequence and pH for the charge calculation and the number you are missing is Isoelectric point and Net charge at the given pH.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/compost-application-rate">Compost Application Rate Calculator</a>, <a href="/biology/compost">Compost Calculator</a> and <a href="/biology/corn-yield">Corn yield Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Protein Isoelectric Point calculator work out?', 'a' => 'Isoelectric point, Net charge at the given pH, Length and Molecular weight.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Protein sequence, pH for the charge calculation (pH). Fill protein sequence and pH for the charge calculation and leave Isoelectric point empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Isoelectric point is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Isoelectric point, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Isoelectric point keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/compost-application-rate', 'name' => 'Compost Application Rate Calculator'],
            ['path' => '/biology/compost', 'name' => 'Compost Calculator'],
            ['path' => '/biology/corn-yield', 'name' => 'Corn yield Calculator'],
        ],
        'authors' => [],
    ],
];
