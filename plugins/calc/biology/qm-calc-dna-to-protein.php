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
    'meta' => ['title' => 'DNA to Protein Translation Calculator — Biology', 'description' => 'Enter DNA sequence and Frame handling into DNA to Protein Translation and the answer comes back as Coding length and Amino acids in the longest frame.', 'h1' => 'DNA to Protein Translation Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'sequence' => ['type' => 'text', 'rnd' => null],
            'start' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'all-six-frames', 'c' => null],
                ],
                'ds' => 'ds-start',
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'aa_count' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'stop_codons' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'mw' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-dna-to-protein',
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
                                    'h' => 'Paste DNA; headers and numbers are removed',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'start',
                                    'l' => 'Frame handling',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-start',
                                    'opts' => [
                                        ['all-six-frames', 'All six frames', 'six'],
                                        ['frame-1-only', 'Frame 1 only', 'one'],
                                        ['stop-at-the-first-stop-codon', 'Stop at the first stop codon', 'orf'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'length',
                                    'l' => 'Coding length',
                                    'suf' => 'bp',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'aa_count',
                                    'l' => 'Amino acids in the longest frame',
                                    'suf' => 'aa',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'stop_codons',
                                    'l' => 'Stop codons in frame 1',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'mw',
                                    'l' => 'Mass of the frame-1 protein',
                                    'suf' => 'kDa',
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
            'ds-start' => [
                'name' => 'Frame handling',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'all-six-frames', 'label' => 'All six frames', 'value' => 'six'],
                    ['uid' => 'frame-1-only', 'label' => 'Frame 1 only', 'value' => 'one'],
                    ['uid' => 'stop-at-the-first-stop-codon', 'label' => 'Stop at the first stop codon', 'value' => 'orf'],
                ],
            ],
        ],
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
            var startSlug = String(ctx.getRawInput('start') || '');
            // slugs: all-six-frames / frame-1-only / stop-at-the-first-stop-codon
            var mode = /first-stop|stop-at/i.test(startSlug) ? 'orf'
              : /frame-1-only|one/i.test(startSlug) ? 'one' : 'six';
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
        
            ctx.exportValue('length', seq.length);
            ctx.exportValue('aa_count', f1.replace(/\*/g, '').length);
            ctx.exportValue('stop_codons', stops);
            ctx.exportValue('mw', Math.round(massOf(f1.replace(/\*/g, '')) * 100) / 100);
        
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
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter DNA sequence and Frame handling into DNA to Protein Translation and the answer comes back as Coding length and Amino acids in the longest frame. It is a single relationship that reads Coding length out of DNA sequence, not a table of canned results keyed by them. Units for Coding length default to bp and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the DNA to Protein Translation calculator works', 'html' => <<<'TXT'
            <p>DNA to Protein Translation answers one question from 2 numbers, and the answer is Coding length, Amino acids in the longest frame and Stop codons in frame 1.</p><p>The result panel carries Coding length, Amino acids in the longest frame, Stop codons in frame 1 and Mass of the frame-1 protein, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>DNA sequence</strong> — a plain number, no unit. Paste DNA; headers and numbers are removed</li><li><strong>Frame handling</strong> — a plain number, no unit</li></ul><p>What you get back is Coding length in bp, Amino acids in the longest frame in aa, Stop codons in frame 1, Mass of the frame-1 protein in kDa, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Coding length is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Coding length, Amino acids in the longest frame and Stop codons in frame 1 are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in DNA sequence and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are DNA sequence and Frame handling and the number you are missing is Coding length and Amino acids in the longest frame.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/tree-diameter">Tree diameter Calculator</a>, <a href="/biology/tree-height">Tree height</a> and <a href="/biology/tree-spacing">Tree spacing</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DNA to Protein Translation calculator work out?', 'a' => 'Coding length, Amino acids in the longest frame, Stop codons in frame 1 and Mass of the frame-1 protein.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'DNA sequence, Frame handling. With sequence and start in place, Coding length can stay blank and the page will work it out.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Coding length is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Coding length, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Coding length keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/tree-diameter', 'name' => 'Tree diameter Calculator'],
            ['path' => '/biology/tree-height', 'name' => 'Tree height'],
            ['path' => '/biology/tree-spacing', 'name' => 'Tree spacing'],
        ],
        'authors' => [],
    ],
];
