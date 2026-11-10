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
    'engine' => 'script',
    'engine_note' => 'reads a protein sequence and finds the pH at which its net charge is zero',
    'meta' => ['title' => 'Protein Isoelectric Point Calculator with Net Charge', 'description' => 'Paste a protein to find its isoelectric point and net charge at a chosen pH, with length, mass, acidic and basic residue counts and GRAVY reported alongside.', 'h1' => 'Protein Isoelectric Point Calculator', 'updated' => '2026-10-29'],
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
                        0,
                        0,
                        1,
                        1,
                        1,
                        1,
                    ],
                    'fields' => [
                        [
                            'name' => 'protein',
                            'label' => 'Protein sequence',
                            'type' => 'text',
                            'help' => 'Single-letter code; headers, spaces and digits are ignored',
                            'default' => 'MKTAYIAKQRQISFVKSHFSRQLEERLGLIEVQAPILSRVGDGTQDNLSGAEKAVQVKVKAL',
                        ],
                        [
                            'name' => 'ph',
                            'label' => 'pH for the charge calculation',
                            'type' => 'number',
                            'suffix' => 'pH',
                            'help' => 'Net charge is reported at this pH',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '7.0',
                        ],
                        [
                            'name' => 'pi',
                            'label' => 'Isoelectric point',
                            'type' => 'result',
                            'suffix' => 'pH',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'charge',
                            'label' => 'Net charge at the given pH',
                            'type' => 'result',
                            'suffix' => 'e',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'result',
                            'suffix' => 'aa',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mw_kda',
                            'label' => 'Molecular weight',
                            'type' => 'result',
                            'suffix' => 'kDa',
                            'help' => 'Average residue masses, no PTMs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'acidic',
                            'label' => 'Acidic residues (D + E)',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'basic',
                            'label' => 'Basic residues (K + R + H)',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gravy',
                            'label' => 'GRAVY (hydrophobicity)',
                            'type' => 'result',
                            'help' => 'Positive means hydrophobic',
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
    'article' => [
        'intro' => <<<'TXT'
        The isoelectric point is the pH at which a protein carries no net charge. This page finds it by titration: it computes the charge at a chosen pH from the sequence, then searches for the pH where that charge crosses zero.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It reports the pH at which the protein is neutral, the charge it carries at the pH you specify, and the composition figures that explain both: length, mass, acidic and basic residue counts, and GRAVY.</p><p>Every ionisable group in the sequence — the carboxylates of aspartate and glutamate, the amines of lysine and arginine, histidine's imidazole, the termini, and cysteine and tyrosine where present — is given a pKa. At a given pH each group's charge follows from the Henderson-Hasselbalch relation, and the charges are summed. The page evaluates the sum across the pH range and finds the point where it crosses zero: that is the isoelectric point. The charge at your chosen pH is the same sum evaluated once.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 things to fill in, and the order does not matter:</p><ul><li><strong>Protein sequence</strong> — a text box. Single-letter code; headers, spaces and digits are ignored.</li><li><strong>pH for the charge calculation</strong> — a number box. Net charge is reported at this pH.</li></ul><p>The answer comes back as 7 boxes: Isoelectric point (pH), Net charge at the given pH (e), Length (aa), Molecular weight (kDa), Acidic residues (D + E), Basic residues (K + R + H), GRAVY (hydrophobicity). They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Protein sequence</strong> is a text box. Single-letter code; headers, spaces and digits are ignored Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>pH for the charge calculation</strong> is a number box. Net charge is reported at this pH Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Protein sequence</th><td>MKTAYIAKQRQISFVKSHFSRQDILDLWQ</td></tr><tr><th>pH for the charge calculation</th><td>7</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Isoelectric point</th><td>10.41 pH</td></tr><tr><th>Net charge at the given pH</th><td>3.03 e</td></tr><tr><th>Length</th><td>29 aa</td></tr><tr><th>Molecular weight</th><td>3.56 kDa</td></tr><tr><th>Acidic residues (D + E)</th><td>2</td></tr><tr><th>Basic residues (K + R + H)</th><td>6</td></tr><tr><th>GRAVY (hydrophobicity)</th><td>-0.476</td></tr></tbody></table><p>A 29-residue peptide with two acidic and six basic residues gives a pI of 10.41 and a charge of +3.03 at pH 7 — strongly basic, as the residue counts predict. GRAVY of −0.476 says it is hydrophilic anyway, which is the combination that keeps small basic peptides soluble.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Protein sequence</th><td>MDDDDKKKEEEEDDDDK</td></tr><tr><th>pH for the charge calculation</th><td>7</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Isoelectric point</th><td>3.6</td></tr><tr><th>Net charge at the given pH</th><td>-8.05</td></tr><tr><th>Length</th><td>17</td></tr><tr><th>Molecular weight</th><td>2.12</td></tr><tr><th>Acidic residues (D + E)</th><td>12</td></tr><tr><th>Basic residues (K + R + H)</th><td>4</td></tr><tr><th>GRAVY (hydrophobicity)</th><td>-3.276</td></tr></tbody></table><p>7 of the 7 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Isoelectric point</strong> — the pH where the summed charge is zero.</li><li><strong>Net charge</strong> — the sum of all group charges at the pH you entered.</li><li><strong>Acidic residues</strong> — aspartate and glutamate — negative at neutral pH.</li><li><strong>Basic residues</strong> — lysine, arginine and histidine — positive at neutral pH.</li><li><strong>GRAVY</strong> — average hydropathy; a positive value means the chain is hydrophobic overall.</li></ul><p>The pI is a single number with a large practical effect: below it the protein is positive and binds cation exchangers, above it the protein is negative and binds anion exchangers. A pI far from 7 also means the protein carries a strong net charge at physiological pH, which affects how it runs on a gel and how it behaves in a buffer.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Count the acidic and basic residues: a protein with many more basic than acidic residues must have a pI above 7, and the further the counts diverge, the further from 7 it goes. For the charge at a chosen pH, remember that a residue counts as fully charged only when the pH is two units away from its pKa.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Terminal charges</strong> — The N- and C-termini are charged too. On a short peptide they matter as much as any residue.</li><li><strong>Cysteines and tyrosines</strong> — Their pKa values are high and their contribution depends on whether they are protonated, which the sequence does not say.</li><li><strong>Modifications</strong> — Phosphorylation adds negative charge that no residue count will show.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Model pKa values</strong> — The pKa of a group depends on its local environment in a folded protein; a sequence-based calculation cannot see that.</li><li><strong>No structure</strong> — Buried groups titrate differently from exposed ones, and this page treats them alike.</li><li><strong>Standard residues only</strong> — Unusual residues and modified termini are not modelled.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Protein Isoelectric Point Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The pI is used to choose a buffer for ion-exchange chromatography, to choose the pH of a gel, to predict whether a protein will precipitate at low salt, and to explain why a protein sticks to one column and not another.</p><p>The practical use of a calculated pI is not the number itself but the margin you leave around it. Running an ion-exchange column at a pH within half a unit of the pI gives a protein that is neither reliably positive nor reliably negative, so it binds badly and elutes in a broad peak. Two units away, the behaviour is predictable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why does my calculated pI differ from the one in a database?', 'a' => 'Because databases use different pKa sets and sometimes different terminal handling. A difference of a few tenths is normal.'],
            ['q' => 'What pH should I run an ion-exchange column at?', 'a' => 'At least one unit away from the pI, on the side that gives the protein the charge the column wants.'],
            ['q' => 'Does Protein Isoelectric Point Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/compost-application-rate', 'name' => 'Compost Application Rate Calculator'],
            ['path' => '/biology/compost', 'name' => 'Compost Calculator'],
            ['path' => '/biology/corn-yield', 'name' => 'Corn yield Calculator'],
        ],
        'authors' => [],
    ],
];
