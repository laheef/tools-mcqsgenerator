<?php

/**
 * Codon Adaptation Index Calculator
 * /biology/codon-adaptation-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Codon Adaptation Index Calculator',
    'engine' => 'script',
    'engine_note' => 'reads a coding sequence and works out the codon adaptation index from the reference usage table',
    'meta' => ['title' => 'Codon Adaptation Index Calculator: Score a Gene for Its Host', 'description' => 'Paste a coding sequence, choose a host, and read its codon adaptation index, rare codon count and third-position GC content. All worked out in your browser.', 'h1' => 'Codon Adaptation Index Calculator', 'updated' => '2026-10-29'],
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
                            'name' => 'sequence',
                            'label' => 'Coding sequence (DNA)',
                            'type' => 'text',
                            'help' => 'Paste the open reading frame; the first codon is read as the start',
                            'default' => 'ATGGCTAAAGGTGAAGAACTGTTCACTGGTGTTGTACCAATCTTAGTTGAACTGGATGGTGATGTTAACGGTCATAAATTT',
                        ],
                        [
                            'name' => 'host',
                            'label' => 'Reference host',
                            'type' => 'select',
                            'options' => ['E. coli K-12' => 'ecoli', 'Human (Homo sapiens)' => 'human', 'Yeast (S. cerevisiae)' => 'yeast'],
                            'help' => 'The codon usage table the weights come from',
                            'default' => 'E. coli K-12',
                        ],
                        [
                            'name' => 'cai',
                            'label' => 'Codon adaptation index',
                            'type' => 'result',
                            'help' => 'Geometric mean of the weights',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'codons',
                            'label' => 'Codons scored',
                            'type' => 'result',
                            'help' => 'Met, Trp and stops are excluded',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rare',
                            'label' => 'Rare codons (w ≤ 0.2)',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gc3',
                            'label' => 'GC at third position',
                            'type' => 'result',
                            'suffix' => '%',
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
    
      var CODON_W = {
        ecoli: {
          TTT: 0.57, TTC: 1.00, TTA: 0.13, TTG: 0.13, CTT: 0.10, CTC: 0.10, CTA: 0.04, CTG: 1.00,
          ATT: 0.51, ATC: 1.00, ATA: 0.08, ATG: 1.00,
          GTT: 0.60, GTC: 0.42, GTA: 0.27, GTG: 1.00,
          TCT: 0.60, TCC: 0.60, TCA: 0.14, TCG: 0.14, AGT: 0.31, AGC: 1.00,
          CCT: 0.35, CCC: 0.22, CCA: 0.35, CCG: 1.00,
          ACT: 0.49, ACC: 1.00, ACA: 0.13, ACG: 0.27,
          GCT: 0.53, GCC: 0.58, GCA: 0.45, GCG: 1.00,
          TAT: 0.57, TAC: 1.00, CAT: 0.57, CAC: 1.00, CAA: 0.34, CAG: 1.00,
          AAT: 0.49, AAC: 1.00, AAA: 1.00, AAG: 0.25, GAT: 0.63, GAC: 1.00,
          GAA: 0.68, GAG: 1.00, TGT: 0.46, TGC: 1.00, TGG: 1.00,
          CGT: 1.00, CGC: 0.55, CGA: 0.06, CGG: 0.03, AGA: 0.03, AGG: 0.02,
          GGT: 1.00, GGC: 0.74, GGA: 0.19, GGG: 0.15
        },
        human: {
          TTT: 0.93, TTC: 1.00, TTA: 0.29, TTG: 0.50, CTT: 0.53, CTC: 0.79, CTA: 0.28, CTG: 1.00,
          ATT: 0.74, ATC: 0.87, ATA: 0.35, ATG: 1.00,
          GTT: 0.60, GTC: 0.79, GTA: 0.46, GTG: 1.00,
          TCT: 0.75, TCC: 0.88, TCA: 0.58, TCG: 0.22, AGT: 0.67, AGC: 1.00,
          CCT: 0.83, CCC: 1.00, CCA: 0.83, CCG: 0.28,
          ACT: 0.82, ACC: 1.00, ACA: 0.90, ACG: 0.38,
          GCT: 0.79, GCC: 1.00, GCA: 0.73, GCG: 0.29,
          TAT: 0.87, TAC: 1.00, CAT: 0.83, CAC: 1.00, CAA: 0.51, CAG: 1.00,
          AAT: 0.88, AAC: 1.00, AAA: 0.86, AAG: 1.00, GAT: 0.93, GAC: 1.00,
          GAA: 0.84, GAG: 1.00, TGT: 0.87, TGC: 1.00, TGG: 1.00,
          CGT: 0.48, CGC: 0.63, CGA: 0.31, CGG: 1.00, AGA: 0.62, AGG: 0.65,
          GGT: 0.62, GGC: 0.83, GGA: 1.00, GGG: 0.79
        },
        yeast: {
          TTT: 0.60, TTC: 1.00, TTA: 0.29, TTG: 1.00, CTT: 0.13, CTC: 0.06, CTA: 0.14, CTG: 0.11,
          ATT: 0.99, ATC: 1.00, ATA: 0.39, ATG: 1.00,
          GTT: 1.00, GTC: 0.62, GTA: 0.44, GTG: 0.28,
          TCT: 1.00, TCC: 0.74, TCA: 0.51, TCG: 0.15, AGT: 0.51, AGC: 0.33,
          CCT: 1.00, CCC: 0.30, CCA: 0.79, CCG: 0.09,
          ACT: 1.00, ACC: 0.79, ACA: 0.62, ACG: 0.26,
          GCT: 1.00, GCC: 0.52, GCA: 0.71, GCG: 0.19,
          TAT: 0.87, TAC: 1.00, CAT: 0.73, CAC: 1.00, CAA: 1.00, CAG: 0.31,
          AAT: 1.00, AAC: 0.83, AAA: 1.00, AAG: 0.58, GAT: 1.00, GAC: 0.72,
          GAA: 1.00, GAG: 0.45, TGT: 1.00, TGC: 0.63, TGG: 1.00,
          CGT: 0.14, CGC: 0.06, CGA: 0.07, CGG: 0.04, AGA: 1.00, AGG: 0.66,
          GGT: 1.00, GGC: 0.39, GGA: 0.31, GGG: 0.24
        }
      };
      var DEGENERATE = { A: 'GCN', C: 'TGY', D: 'GAY', E: 'GAR', F: 'TTY', G: 'GGN',
                         H: 'CAY', I: 'ATH', K: 'AAR', L: 'YTN', M: 'ATG', N: 'AAY',
                         P: 'CCN', Q: 'CAR', R: 'MGN', S: 'WSN', T: 'ACN', V: 'GTN',
                         W: 'TGG', Y: 'TAY', '*': 'TAR' };
    
      omni.onResult(['sequence', 'host'], function (ctx) {
        var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
        var key = resolve(ctx.getChoice('host'), { ecoli: 'ecoli', human: 'human', yeast: 'yeast' }, 'ecoli');
        var W = CODON_W[key] || CODON_W.ecoli;
        if (seq.length < 3) {
          ctx.addHtml(block('Codon adaptation index', '—', 'Paste a coding sequence of at least 3 bp.'));
          ctx.exportValue('cai', 0); ctx.exportValue('codons', 0);
          ctx.exportValue('rare', 0); ctx.exportValue('gc3', 0);
          return;
        }
        var usable = Math.floor(seq.length / 3);
        if (usable * 3 !== seq.length) {
          seq = seq.slice(0, usable * 3);
        }
        var sumLn = 0, scored = 0, rare = 0, gc3 = 0, gc3n = 0, unknown = 0;
        var counts = {}, rareList = [];
        for (var i = 0; i + 3 <= seq.length; i += 3) {
          var cod = seq.substr(i, 3);
          var aa = aaOf(cod);
          if (aa === null) { unknown++; continue; }
          if (aa === '*' || cod === 'ATG' || cod === 'TGG') continue;
          var w = W[cod];
          if (w === undefined) { unknown++; continue; }
          counts[cod] = (counts[cod] || 0) + 1;
          scored++;
          // a zero weight would make ln() infinite; the tables have none, but guard anyway
          sumLn += Math.log(Math.max(w, 0.005));
          gc3n++;
          if (cod.charAt(2) === 'G' || cod.charAt(2) === 'C') gc3++;
          if (w <= 0.2) {
            rare++;
            if (rareList.length < 12) rareList.push(cod + ' (w ' + w.toFixed(2) + ', position ' + (i + 1) + ')');
          }
        }
        var cai = scored ? Math.exp(sumLn / scored) : 0;
        var pct3 = gc3n ? gc3 / gc3n * 100 : 0;
        ctx.exportValue('cai', Math.round(cai * 10000) / 10000);
        ctx.exportValue('codons', scored);
        ctx.exportValue('rare', rare);
        ctx.exportValue('gc3', Math.round(pct3 * 100) / 100);
    
        var verdict = cai >= 0.8 ? 'well adapted for this host'
          : cai >= 0.6 ? 'moderately adapted — a native gene expressed at a modest level'
          : cai >= 0.4 ? 'poorly adapted — codon optimisation is worth considering'
          : 'very poorly adapted — expect a low yield as it stands';
        var rows = [];
        var order = Object.keys(counts).sort(function (a, b) { return counts[b] - counts[a]; });
        for (var k = 0; k < order.length && k < 15; k++) {
          var c = order[k];
          rows.push([c, aaOf(c) || '?', String(counts[c]), W[c].toFixed(2)]);
        }
        var html = block('Codon adaptation index (' + key + ')',
          'CAI                ' + cai.toFixed(4) + '\n'
          + 'Codons scored      ' + scored + '\n'
          + 'Rare codons (w≤0.2) ' + rare + '\n'
          + 'GC at third base   ' + pct3.toFixed(1) + ' %',
          'Reading: ' + verdict + '.');
        html += table('Most used codons in this sequence', ['Codon', 'Amino acid', 'Count', 'w'], rows);
        html += block('Rare codons', rare ? rareList.join('\n') : 'None below w = 0.2.',
          unknown ? unknown + ' codon(s) skipped as ambiguous or incomplete.' : '');
        ctx.addHtml(html);
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        The codon adaptation index scores how well a coding sequence matches the codons a host uses in its own highly expressed genes. Paste an open reading frame, pick the host, and the page reports CAI, the number of codons read, how many of them are rare, and GC3s.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It scores a coding sequence against a host's codon usage table, so you can see whether the same protein will translate smoothly in E. coli, in yeast or in a human cell line. It also reports the practical figures behind that score: how many complete codons were read, how many were rare, and how GC-rich the third position is.</p><p>The sequence is cleaned to letters, split into codons from the first base, and each codon is looked up in the chosen host table. A codon that the host uses often in highly expressed genes gets a weight near 1; a rare codon gets a weight near 0. The CAI is the geometric mean of those weights across the sequence, so a few rare codons pull the score down more than their share of the length suggests. Third-position GC is computed on the same codon split, which is why changing the frame changes it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 things to fill in, and the order does not matter:</p><ul><li><strong>Coding sequence (DNA)</strong> — a text box. Paste the open reading frame; the first codon is read as the start.</li><li><strong>Reference host</strong> — a drop-down with the choices the page offers. The codon usage table the weights come from.</li></ul><p>The answer comes back as 4 boxes: Codon adaptation index, Codons scored, Rare codons (w ≤ 0.2), GC at third position (%). They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Coding sequence (DNA)</strong> is a text box. Paste the open reading frame; the first codon is read as the start Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Reference host</strong> is a drop-down with the choices the page offers. The choices are E. coli K-12, Human (Homo sapiens) and Yeast (S. cerevisiae). The codon usage table the weights come from Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Coding sequence (DNA)</th><td>ATGGCTGCTAAAATTGAACGTCTGAAACGTCTGGAAGATCTGAAACGTGCT</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Codon adaptation index</th><td>0.788</td></tr><tr><th>Codons scored</th><td>16</td></tr><tr><th>Rare codons (w ≤ 0.2)</th><td>0</td></tr><tr><th>GC at third position</th><td>18.75 %</td></tr></tbody></table><p>A 48-base reading frame gives 16 codons and a CAI of 0.788 in E. coli K-12: mostly well-used codons, no rare ones, and a low GC3s of 18.75 per cent, since the sequence is written with the AT-ending codons E. coli prefers. The same sequence scores differently in human or yeast because the tables differ.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Coding sequence (DNA)</th><td>ATGAGGCGGTTAAGGCTTAGGCTAAGGAGGCGG</td></tr><tr><th>Reference host</th><td>E. coli K-12</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Codon adaptation index</th><td>0.033</td></tr><tr><th>Codons scored</th><td>10</td></tr><tr><th>Rare codons (w ≤ 0.2)</th><td>10</td></tr><tr><th>GC at third position</th><td>70</td></tr></tbody></table><p>4 of the 4 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>CAI</strong> — the geometric mean of relative adaptiveness over all codons, on a scale from 0 to 1.</li><li><strong>Codons</strong> — complete codons after the frame split; a trailing one or two bases cannot form a codon and is not counted.</li><li><strong>Rare codons</strong> — codons whose relative adaptiveness falls below the threshold the page uses — the ones most likely to slow translation.</li><li><strong>GC3s</strong> — the GC percentage at the third codon position, often used as a proxy for codon bias in bacteria.</li></ul><p>A CAI near 1 means the sequence uses the codons the host leans on in its fastest-translated genes; a score below about 0.5 usually means a heterologous gene that may benefit from resynthesis. The rare-codon count matters more for expression than the score itself: a single rare codon cluster can stall a ribosome even when the average looks good.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Pick three codons from your sequence, look each up in the host table, and multiply their relative adaptiveness values; the cube root of that product is the CAI those three codons contribute. Doing this for the whole sequence by hand is tedious but possible, and the first few codons will tell you whether the score is in the right region.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Not an open reading frame</strong> — If the sequence has no start codon, or begins mid-gene, every codon is shifted and the score describes the wrong reading frame.</li><li><strong>Wrong host</strong> — The index is relative to a table. A score of 0.8 in E. coli says nothing about the same gene in CHO cells.</li><li><strong>Short sequences</strong> — Under about 20 codons the geometric mean is dominated by single outliers, and the score swings wildly.</li><li><strong>Internal stops</strong> — A stop codon inside the frame is a warning about the sequence, not about the host; the page will still score it.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>One table per host</strong> — The page offers a small set of reference tables. A strain with a different codon usage — or a gene expressed at a different growth rate — will score slightly differently in reality.</li><li><strong>No tRNA model</strong> — CAI assumes codon usage is a proxy for tRNA availability. It knows nothing about tRNA charging, modification or the position of a rare codon in the transcript.</li><li><strong>Expression is more than codons</strong> — mRNA structure, ribosome binding, promoter strength and protein folding all matter more than CAI in most expression experiments.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Codon Adaptation Index Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>CAI is a screening number. It is used to decide whether a synthetic gene needs redesigning before it goes into an expression vector, to compare two versions of a construct, and to flag a sequence that looks fine on a gel but translates poorly.</p><p>A second use of the index is comparison. Score the same gene against E. coli, yeast and human tables before choosing an expression system: a gene that scores well in two of the three is a safer construct than one that is excellent in a single host and poor in the others, because it leaves you room to change systems without redesigning the sequence.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What CAI should I aim for before synthesising a gene?', 'a' => 'Most suppliers and protocols aim for at least 0.8 in the chosen host. Below about 0.5, resynthesis with host-optimised codons usually pays for itself.'],
            ['q' => 'Does a high CAI guarantee high expression?', 'a' => 'No. It removes one common obstacle. Promoter, copy number, mRNA structure and the protein itself decide the rest.'],
            ['q' => 'Why does the codon count change when I trim one base?', 'a' => <<<'TXT'
            Trimming shifts the reading frame by one, so every codon after the cut is different. The count is of complete codons in the frame, and the frame starts at the first base you paste.
            TXT],
            ['q' => 'Does Codon Adaptation Index Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/guinea-pig-age', 'name' => 'Guinea pig years to human years'],
            ['path' => '/biology/gypsum-application-rate', 'name' => 'Gypsum Application Rate Calculator'],
            ['path' => '/biology/hamster-age', 'name' => 'Hamster age Calculator'],
        ],
        'authors' => [],
    ],
];
