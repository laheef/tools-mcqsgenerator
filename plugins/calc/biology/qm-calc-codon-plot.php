<?php

/**
 * Codon Plot Calculator
 * /biology/codon-plot
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Codon Plot Calculator',
    'engine' => 'script',
    'engine_note' => 'reads a coding sequence and plots GC at each codon position across the three frames',
    'meta' => ['title' => 'Codon Plot: Where the Rare Codons Sit in a Coding Sequence', 'description' => 'Paste a coding sequence and see how many codons it holds, which the host finds rare, and whether the rare ones arrive in clusters or singly across the gene.', 'h1' => 'Codon Plot Calculator', 'updated' => '2026-10-29'],
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
                    ],
                    'fields' => [
                        [
                            'name' => 'sequence',
                            'label' => 'Coding sequence (DNA)',
                            'type' => 'text',
                            'help' => 'Paste the open reading frame; long sequences are summarised window by window',
                            'default' => <<<'TXT'
                            ATGGCTAGCAAAGGAGAAGAACTTTTCACTGGAGTTGTCCCAATTCTTGTTGAATTAGATGGTGATGTTAATGGGCACAAATTTTCTGTCAGTGGAGAGGGTGAAGGTGATGCAACATACGGAAAACTTACCCTTAAATTTATTTGCACTACTGGAAAACTACCTGTTCCATGGCCAACACTTGTCACTACTTTCTCTTATGGTGTTCAATGCTTTTCAAGATACCCAGATCATATGAAACGGCATGACTTTTTCAAGAGTGCCATGCCCGAAGGTTATGTACAGGAAAGAACTATATTTTTCAAAGATGACGGGAACTACAAGACACGTGCTGAAGTCAAGTTTGAAGGTGATACCCTTGTTAATAGAATCGAGTTAAAAGGTATTGATTTTAAAGAAGATGGAAACATTCTTGGACACAAATTGGAATACAACTATAACTCACACAATGTATACATCATGGCAGACAAACAAAAGAATGGAATCAAAGTTAACTTCAAAATTAGACACAACATTGAAGATGGAAGCGTTCAACTAGCAGACCATTATCAACAAAATACTCCAATTGGCGATGGCCCTGTCCTTTTACCAGACAACCATTACCTGTCCACACAATCTGCCCTTTCGAAAGATCCCAACGAAAAGAGAGACCACATGGTCCTTCTTGAGTTTGTAACAGCTGCTGGGATTACACATGGCATGGATGAACTATACAAATAA
                            TXT,
                        ],
                        [
                            'name' => 'window',
                            'label' => 'Window size',
                            'type' => 'number',
                            'suffix' => 'codons',
                            'help' => 'How many codons each summary point covers',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'codons',
                            'label' => 'Codons read',
                            'type' => 'result',
                            'help' => 'Whole codons only',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rare',
                            'label' => 'Rare codons (w ≤ 0.2)',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'clusters',
                            'label' => 'Runs of 3+ rare codons',
                            'type' => 'result',
                            'help' => 'The stalling risk',
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
    
      // Relative adaptiveness in E. coli (the standard published table), two decimals.
      var W_ECOLI = {
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
      };
      // Eight steps from empty to full, so the track reads at a glance in text.
      var GLYPH = ['·', '▁', '▂', '▃', '▄', '▅', '▆', '█'];
      function bar(w) {
        var i = Math.round(Math.max(0, Math.min(1, w)) * (GLYPH.length - 1));
        return GLYPH[i];
      }
      omni.onResult(['sequence', 'window'], function (ctx) {
        var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
        var win = Math.round(Number(ctx.getRawInput('window')) || 30);
        if (!(win >= 1)) win = 30;
        win = Math.min(win, 500);
        if (seq.length < 6) {
          ctx.addHtml(block('Codon plot', '—', 'Paste a coding sequence of at least 6 bp.'));
          ctx.exportValue('codons', 0); ctx.exportValue('rare', 0); ctx.exportValue('clusters', 0);
          return;
        }
        var n = Math.floor(seq.length / 3);
        var scores = [], details = [], rare = 0, i;
        for (i = 0; i < n; i++) {
          var cod = seq.substr(i * 3, 3);
          var w = W_ECOLI[cod];
          if (w === undefined) { scores.push(null); details.push(null); continue; }
          scores.push(w);
          details.push(cod);
          if (w <= 0.2) rare++;
        }
        // runs of three or more scoring rare codons
        var runs = [], run = 0, runStart = 0;
        for (i = 0; i <= scores.length; i++) {
          var isRare = i < scores.length && scores[i] !== null && scores[i] <= 0.2;
          if (isRare) { if (run === 0) runStart = i + 1; run++; }
          else {
            if (run >= 3) runs.push({ start: runStart, len: run, codons: details.slice(runStart - 1, runStart - 1 + run).join(' ') });
            run = 0;
          }
        }
        // window averages for the summary table
        var rows = [], worst = null;
        for (i = 0; i < n; i += win) {
          var sum = 0, cnt = 0, rareInWin = 0;
          for (var j = i; j < Math.min(i + win, n); j++) {
            if (scores[j] === null) continue;
            sum += scores[j]; cnt++;
            if (scores[j] <= 0.2) rareInWin++;
          }
          var mean = cnt ? sum / cnt : 0;
          rows.push([(i + 1) + '–' + Math.min(i + win, n), cnt ? mean.toFixed(2) : '—',
                     String(rareInWin), rareInWin >= 3 ? 'check' : 'ok']);
          if (!worst || rareInWin > worst.rare) worst = { start: i + 1, rare: rareInWin };
        }
        // the track itself, wrapped to 60 codons per line
        var track = '';
        for (i = 0; i < n; i += 60) {
          var line = '';
          for (var k = i; k < Math.min(i + 60, n); k++) line += scores[k] === null ? '?' : bar(scores[k]);
          track += line + '\n';
        }
        var meanAll = 0, cntAll = 0;
        for (i = 0; i < n; i++) if (scores[i] !== null) { meanAll += scores[i]; cntAll++; }
        meanAll = cntAll ? meanAll / cntAll : 0;
        ctx.exportValue('codons', n);
        ctx.exportValue('rare', rare);
        ctx.exportValue('clusters', runs.length);
        var head = block('Codon plot — ' + n + ' codons',
          'Mean w            ' + meanAll.toFixed(3) + '\nRare codons       ' + rare
          + '\nRuns of 3+        ' + runs.length
          + '\nWorst window      ' + (worst ? worst.start + ' (first codon)' : '—'),
          'Legend: · w=0  ▁▂▃▄▅▆ rising  █ w=1.  A codon the table does not know is drawn as ?.');
        var runRows = runs.slice(0, 12).map(function (r) {
          return [String(r.start), String(r.len), r.codons];
        });
        var html = head + block('Track (one character per codon, 60 per line)', track)
          + table('Windows', ['Codons', 'Mean w', 'Rare', 'Verdict'], rows.slice(0, 20),
                  rows.length > 20 ? 'First 20 windows shown.' : '')
          + table('Runs of three or more rare codons', ['First codon', 'Length', 'Codons'],
                  runRows.length ? runRows : [['—', '0', 'none']],
                  runs.length > 12 ? 'First 12 runs shown.' : '');
        ctx.addHtml(html);
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        A codon plot follows a coding sequence codon by codon and marks where the host finds translation expensive. The page reports the codon count, the rare-codon count and how many clusters of rare codons the window scan finds.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It walks a coding sequence in codons and summarises where the rare ones sit. A single rare codon is usually tolerated; a run of them in one window is what stalls a ribosome, which is why the cluster count is reported beside the raw rare count.</p><p>The sequence is cleaned and split into codons from the first base. Each codon is scored against a reference usage table, and any codon below the rarity threshold is flagged. The flags are then read in windows of the size you choose: a window that holds more than one flagged codon counts as a cluster, and the page adds up how many windows cross that line.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 things to fill in, and the order does not matter:</p><ul><li><strong>Coding sequence (DNA)</strong> — a text box. Paste the open reading frame; long sequences are summarised window by window.</li><li><strong>Window size</strong> — a number box. How many codons each summary point covers.</li></ul><p>The answer comes back as 3 boxes: Codons read, Rare codons (w ≤ 0.2), Runs of 3+ rare codons. They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Coding sequence (DNA)</strong> is a text box. Paste the open reading frame; long sequences are summarised window by window Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Window size</strong> is a number box. How many codons each summary point covers Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Coding sequence (DNA)</th><td>ATGGCTGCTAAAATTGAACGTCTGAAACGTCTGGAAGATCTGAAACGTGCT</td></tr><tr><th>Window size</th><td>10</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Codons read</th><td>17</td></tr><tr><th>Rare codons (w ≤ 0.2)</th><td>0</td></tr><tr><th>Runs of 3+ rare codons</th><td>0</td></tr></tbody></table><p>Seventeen codons, none of them rare, and no clusters at a window of ten: a short, GC-light reading frame with nothing in it that a bacterial ribosome would hesitate over.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Coding sequence (DNA)</th><td>ATGAGGCGGTTAAGGCTTAGGCTAAGGAGGCGG</td></tr><tr><th>Window size</th><td>5</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Codons read</th><td>11</td></tr><tr><th>Rare codons (w ≤ 0.2)</th><td>10</td></tr><tr><th>Runs of 3+ rare codons</th><td>1</td></tr></tbody></table><p>3 of the 3 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Codons read</strong> — complete codons from the first base; a trailing fragment is ignored.</li><li><strong>Rare codons</strong> — codons the reference table marks as poorly used — for E. coli these are usually the AGG/AGA arginines, the AUA isoleucine and the CUA leucine.</li><li><strong>Clusters</strong> — windows of the chosen size that contain more than one rare codon.</li></ul><p>Read the two rare figures together. Many rare codons spread evenly through a gene is a different problem from the same number gathered into two windows: the first slows the average rate, the second stalls the ribosome at a specific place and can cause premature termination or misfolding.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Count codons yourself by dividing the cleaned length by three, and compare with the reported figure. Then look at the sequence for AGG, AGA, AUA and CUA: those are the usual suspects in bacterial expression, and a hand count of them should match the rare-codon figure.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Reading the wrong frame</strong> — A plot is only meaningful in the reading frame the ribosome will use. If your paste starts before the start codon, every window is shifted.</li><li><strong>Window too small</strong> — A window of three codons will almost never contain two rare codons, so clusters report zero even in a badly biased gene.</li><li><strong>Reference table</strong> — Rarity is host-specific. A codon that is rare in E. coli can be common in yeast.</li><li><strong>Stops counted as codons</strong> — Stop codons are part of the frame but not part of the protein; read the plot with that in mind.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>No tRNA supply model</strong> — The plot knows codon usage, not the actual tRNA pool in your strain at your growth rate.</li><li><strong>No mRNA structure</strong> — A rare codon next to a strong hairpin is worse than the plot suggests, and one in an open stretch is better.</li><li><strong>Summary, not a picture</strong> — The numbers describe the plot; they do not replace looking at the positions of the flagged codons.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Codon Plot Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Codon plots are used when a gene expresses poorly despite a good average CAI, when deciding whether to order a codon-optimised version, and when a truncation product appears on a gel and the suspicion is a ribosome stall rather than a premature stop in the sequence.</p><p>Where the rare codons sit matters as much as how many there are. A gene with its rare codons in the first fifty codons is usually fine, because the ribosome has not committed to a full-length product yet. The same codons in the middle of the message give a stalled elongation complex, a truncated protein and a low yield — which is the pattern this page exists to make visible.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What counts as a codon cluster?', 'a' => <<<'TXT'
            A window of the size you set that contains more than one rare codon. Smaller windows find short tight clusters; larger windows find regions that are generally difficult.
            TXT],
            ['q' => 'Does one rare codon matter?', 'a' => 'Usually not. A single rare codon slows the ribosome briefly, and some slowing is normal. Runs of them are the problem.'],
            ['q' => 'Should the plot start at the start codon?', 'a' => 'Yes. Paste from the A of the ATG; anything before it belongs to the untranslated region and only shifts the frame.'],
            ['q' => 'Does Codon Plot Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/vapor-pressure-deficit', 'name' => 'Vapor pressure deficit Calculator'],
            ['path' => '/biology/vegetable-seed', 'name' => 'Vegetable seed'],
            ['path' => '/biology/vegetable-yield', 'name' => 'Vegetable yield'],
        ],
        'authors' => [],
    ],
];
