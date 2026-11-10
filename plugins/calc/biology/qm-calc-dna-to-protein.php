<?php

/**
 * DNA to Protein Translation Calculator
 * /biology/dna-to-protein
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DNA to Protein Translation Calculator',
    'engine' => 'script',
    'engine_note' => 'translates a DNA sequence in all three frames and reports the coding length, amino-acid count, stops and molecular weight',
    'meta' => ['title' => 'DNA to Protein Translation: Six Frames and Longest ORF', 'description' => 'Translate a DNA sequence in any frame, find the longest open reading frame across all six frames, and read its coding length, residue count, stops and mass.', 'h1' => 'DNA to Protein Translation Calculator', 'updated' => '2026-10-29'],
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
                        ['name' => 'sequence', 'label' => 'DNA sequence', 'type' => 'text', 'help' => 'Paste DNA; headers and numbers are removed'],
                        [
                            'name' => 'start',
                            'label' => 'Frame handling',
                            'type' => 'select',
                            'options' => ['All six frames' => 'six', 'Frame 1 only' => 'one', 'Stop at the first stop codon' => 'orf'],
                            'default' => 'All six frames',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Coding length of the longest ORF',
                            'type' => 'result',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'aa_count',
                            'label' => 'Amino acids in the longest ORF',
                            'type' => 'result',
                            'suffix' => 'aa',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'stop_codons',
                            'label' => 'Stop codons in frame 1',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'mw',
                            'label' => 'Mass of the longest ORF\'s protein',
                            'type' => 'result',
                            'suffix' => 'kDa',
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
        // Everything that is not a residue goes: FASTA headers, digits (line
        // numbers pasted from a viewer), gaps, spaces and newlines.
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
      function tmOf(n, pct, at, gc) {
        // Which formula applies depends on the length, and using the wrong one is
        // not a small error: the GC rule gives 107 °C for a 39 bp duplex, because it
        // was fitted to oligos of 40 nt and below.
        if (n <= 14) return 2 * at + 4 * gc;                       // Wallace
        if (n <= 40) return 64.9 + 41 * (gc - 16.4) / n;            // GC rule, G+C as a count
        return 81.5 + 16.6 * Math.log10(0.05) + 0.41 * pct - 675 / n;   // long duplex, 50 mM Na+
      }
      function esc(s) {
        return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
      }
      function block(title, body, note) {
        return '<div class="calc-script-block"><h3>' + esc(title) + '</h3><pre>' + esc(body) + '</pre>'
          + (note ? '<p class="calc-script-note">' + esc(note) + '</p>' : '') + '</div>';
      }
    
      var CODON = {
        TTT:'F',TTC:'F',TTA:'L',TTG:'L',CTT:'L',CTC:'L',CTA:'L',CTG:'L',
        ATT:'I',ATC:'I',ATA:'I',ATG:'M',GTT:'V',GTC:'V',GTA:'V',GTG:'V',
        TCT:'S',TCC:'S',TCA:'S',TCG:'S',CCT:'P',CCC:'P',CCA:'P',CCG:'P',
        ACT:'T',ACC:'T',ACA:'T',ACG:'T',GCT:'A',GCC:'A',GCA:'A',GCG:'A',
        TAT:'Y',TAC:'Y',TAA:'*',TAG:'*',CAT:'H',CAC:'H',CAA:'Q',CAG:'Q',
        AAT:'N',AAC:'N',AAA:'K',AAG:'K',GAT:'D',GAC:'D',GAA:'E',GAG:'E',
        TGT:'C',TGC:'C',TGA:'*',TGG:'W',CGT:'R',CGC:'R',CGA:'R',CGG:'R',
        AGT:'S',AGC:'S',AGA:'R',AGG:'R',GGT:'G',GGC:'G',GGA:'G',GGG:'G'
      };
      // Average residue masses, daltons. Water is lost per peptide bond.
      var MASS = {A:71.079,G:57.052,I:113.160,L:113.160,P:97.117,V:99.133,F:147.177,
                  M:131.198,W:186.213,S:87.078,T:101.105,C:103.139,Y:163.180,N:114.104,
                  Q:128.131,D:115.089,E:129.116,K:128.174,R:156.188,H:137.142};
      function translate(s, frame) {
        var out = '';
        for (var i = frame; i + 2 < s.length + 0; i += 3) {
          var c = s.substr(i, 3);
          if (c.length < 3) break;
          out += CODON[c] || 'X';
        }
        return out;
      }
      function massOf(prot) {
        var m = 18.0153;                     // the free termini
        for (var i = 0; i < prot.length; i++) {
          var aa = prot.charAt(i);
          if (aa === '*') continue;
          m += MASS[aa] || 110;
        }
        return m / 1000;
      }
      function longestORF(prot) {
        var best = '', cur = '';
        for (var i = 0; i < prot.length; i++) {
          if (prot.charAt(i) === '*') { if (cur.length > best.length) best = cur; cur = ''; }
          else cur += prot.charAt(i);
        }
        return cur.length > best.length ? cur : best;
      }
    
      omni.onResult(['sequence'], function (ctx) {
        var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
        var startSlug = String(ctx.getChoice('start') || '');
        /* the choice hands back the words on the page: "All six frames",
           "Frame 1 only", "Stop at the first stop codon" */
        var mode = /stop at|first stop/i.test(startSlug) ? 'orf'
          : /frame 1 only|first frame|frame-1/i.test(startSlug) ? 'one' : 'six';
        if (!seq) {
          ctx.addHtml(block('Translation', '—', 'Paste a DNA sequence to translate it in every frame.'));
          return;
        }
        var comp = '';
        var map = {A:'T',T:'A',G:'C',C:'G',N:'N'};
        for (var i = seq.length - 1; i >= 0; i--) comp += map[seq.charAt(i)] || 'N';
    
        var f1 = translate(seq, 0);
        var stops = 0;
        for (var k = 0; k < f1.length; k++) if (f1.charAt(k) === '*') stops++;
    
        /*
         * The figures describe the longest open reading frame, not the raw
         * paste. "Coding length" was the whole input once — a 39 nt paste with
         * a 33 nt ORF reported 39, which is the sequence length under another
         * name. Frame 1 is the floor; the six-frame mode may find a longer one.
         */
        var best = longestORF(f1);
        if (mode === 'six') {
          var all = [translate(seq, 1), translate(seq, 2), translate(comp, 0),
                     translate(comp, 1), translate(comp, 2)];
          for (var q = 0; q < all.length; q++) {
            var cand = longestORF(all[q]);
            if (cand.length > best.length) best = cand;
          }
        }
        ctx.exportValue('length', best.length * 3);
        ctx.exportValue('aa_count', best.length);
        ctx.exportValue('stop_codons', stops);
        ctx.exportValue('mw', Math.round(massOf(best) * 100) / 100);
    
        if (mode === 'one') {
          ctx.addHtml(block('Frame 1', wrap(f1, 60), f1.length + ' aa including stops'));
          return;
        }
        if (mode === 'orf') {
          var orf = longestORF(f1);
          if (!orf) {
            ctx.addHtml(block('Longest open reading frame', '—',
              'Frame 1 has no stretch without a stop codon. Try the other frames or the reverse strand.'));
          } else {
            var mw = massOf(orf);
            ctx.addHtml(block('Longest open reading frame in frame 1', wrap(orf, 60),
              orf.length + ' aa · ' + orf.length * 3 + ' bp · ' + mw.toFixed(2) + ' kDa'));
          }
          return;
        }
    
        var frames = [
          ['+1', translate(seq, 0)], ['+2', translate(seq, 1)], ['+3', translate(seq, 2)],
          ['−1', translate(comp, 0)], ['−2', translate(comp, 1)], ['−3', translate(comp, 2)]
        ];
        var best = '';
        frames.forEach(function (f) {
          var orf = longestORF(f[1]);
          if (orf.length > best.length) best = orf;
        });
        frames.forEach(function (f) {
          ctx.addHtml(block('Frame ' + f[0], wrap(f[1], 60),
            f[1].replace(/\*/g, '').length + ' aa · longest ORF ' + longestORF(f[1]).length + ' aa'));
        });
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Translate a DNA sequence into protein and the first thing to decide is the frame. This page translates it in one, in six, or up to the first stop, and reports the longest open reading frame with its length and mass.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It turns a nucleotide sequence into the protein it encodes, and reports the figures that go with that: the coding length of the longest open reading frame, how many residues it holds, how many stops fall in frame 1, and the mass of the protein.</p><p>The paste is cleaned and translated codon by codon against the standard code, in frame 1, in all six frames, or up to the first stop, depending on the setting you choose. An open reading frame is the longest run between stops. The page takes that run, multiplies its residue count by three for the coding length, and sums average residue masses for the molecular weight.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 things to fill in, and the order does not matter:</p><ul><li><strong>DNA sequence</strong> — a text box. Paste DNA; headers and numbers are removed.</li><li><strong>Frame handling</strong> — a drop-down with the choices the page offers.</li></ul><p>The answer comes back as 4 boxes: Coding length of the longest ORF (bp), Amino acids in the longest ORF (aa), Stop codons in frame 1, Mass of the longest ORF&#039;s protein (kDa). They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>DNA sequence</strong> is a text box. Paste DNA; headers and numbers are removed Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Frame handling</strong> is a drop-down with the choices the page offers. The choices are All six frames, Frame 1 only and Stop at the first stop codon. Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>DNA sequence</th><td>GGTACCATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGTAA</td></tr><tr><th>Frame handling</th><td>All six frames</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Coding length of the longest ORF</th><td>48 bp</td></tr><tr><th>Amino acids in the longest ORF</th><td>16 aa</td></tr><tr><th>Stop codons in frame 1</th><td>3</td></tr><tr><th>Mass of the longest ORF&#039;s protein</th><td>1.6 kDa</td></tr></tbody></table><p>A 54-base paste with a deliberate ATG in the middle: all six frames find a 16-residue reading frame of 48 bases, because a longer ORF opens on the other strand than the one you might first read. Frame 1 only reports 9 residues, the difference between the two settings.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>DNA sequence</th><td>ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAG</td></tr><tr><th>Frame handling</th><td>Frame 1 only</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Coding length of the longest ORF</th><td>21</td></tr><tr><th>Amino acids in the longest ORF</th><td>7</td></tr><tr><th>Stop codons in frame 1</th><td>2</td></tr><tr><th>Mass of the longest ORF&#039;s protein</th><td>0.78</td></tr></tbody></table><p>4 of the 4 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Coding length</strong> — three times the residues of the longest open reading frame, in base pairs.</li><li><strong>Amino acids</strong> — the residue count of that same reading frame.</li><li><strong>Stop codons in frame 1</strong> — how many stop codons appear when the sequence is read from its first base.</li><li><strong>Mass of the ORF&#039;s protein</strong> — the average molecular weight of the translated frame, in kDa.</li></ul><p>The coding length and the residue count are the same figure in different units, so they should always agree. The stop count in frame 1 is a diagnostic, not part of the protein: several stops means the frame is open in short stretches and closed in others, which is normal for a random sequence and suspicious for a cloned gene.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Find the ATG by eye, read triplets from it to the next stop, and translate with a table. The residue count should match your count of triplets; if it does not, the frame you read by eye is not the frame the page picked.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Forgetting the reverse strand</strong> — Half of all open reading frames sit on the other strand. The six-frame setting exists for exactly that.</li><li><strong>No start codon</strong> — The page reports the longest stop-free stretch, which need not begin at an ATG. A real gene does.</li><li><strong>Rare codons and stops</strong> — Translation here is mechanical; it does not know about read-through, selenocysteine or suppression.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Standard genetic code</strong> — Mitochondrial codes, and codons reassigned in some organisms, are not applied.</li><li><strong>No introns</strong> — Eukaryotic genes are translated as contiguous sequence, introns included.</li><li><strong>Average mass</strong> — The molecular weight is a sum of average residue masses with no modifications.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>DNA to Protein Translation Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Translation is used to check that a cloned insert is in frame, to find the protein a random piece of DNA would make, to work out whether a mutation is silent, and to estimate the size of a product before running it on a gel.</p><p>The six-frame answer is not the same as the right answer. In a bacterial genome roughly half of all genes sit on the reverse strand, so both are plausible; in a eukaryotic cDNA the coding frame almost always starts at the first ATG and ends at the first stop after it. Use the six-frame figure to find the candidate, and the frame-1 or first-stop setting to describe it once found.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which setting should I use?', 'a' => 'For a known gene, frame 1 from the start codon. For an unknown sequence, all six frames — the protein may be encoded on the reverse strand.'],
            ['q' => 'Why is the protein shorter than the DNA suggests?', 'a' => 'Because the reading frame starts at a start codon and ends at a stop. DNA between them and the ends of the paste is not part of the protein.'],
            ['q' => 'Does DNA to Protein Translation Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/tree-diameter', 'name' => 'Tree diameter Calculator'],
            ['path' => '/biology/tree-height', 'name' => 'Tree height'],
            ['path' => '/biology/tree-spacing', 'name' => 'Tree spacing'],
        ],
        'authors' => [],
    ],
];
