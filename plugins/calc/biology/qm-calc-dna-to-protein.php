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
    'meta' => ['title' => 'DNA to Protein Translation Calculator — Biology', 'description' => 'Translation reads a nucleotide sequence three bases at a time and writes the amino acids it encodes. It returns coding length, amino acids in the longest…', 'h1' => 'DNA to Protein Translation Calculator', 'updated' => '2026-10-29'],
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
        Translation reads a nucleotide sequence three bases at a time and writes the amino acids it encodes. It returns coding length, amino acids in the longest frame, stop codons in frame 1 and mass of the frame-1 protein, and the panel shows all of them at once.
        
        Because the reading frame is not marked in the sequence, the same DNA gives three completely different proteins — this calculator shows all six frames, three from each strand, which is how a real open reading frame is found.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the DNA to Protein Translation', 'html' => <<<'TXT'
            <p>Each codon of three bases maps to one amino acid; the standard genetic code is used</p>
            <figure class="calc-figure"><img src="/uploads/biology/dna-to-protein.svg" width="720" height="300" loading="lazy" alt="Animated diagram: DNA to Protein Translation Calculator — Codons that mean something, and codons that stop" title="DNA to Protein Translation Calculator"><figcaption>Codons that mean something, and codons that stop</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>frame</code></td><td>which base the reading starts on (1, 2 or 3)</td><td>—</td></tr><tr><td><code>ORF</code></td><td>open reading frame: start codon to stop codon</td><td>—</td></tr><tr><td><code>aa</code></td><td>amino acid</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the DNA to Protein Translation?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>ATG</td><td><strong>Start</strong></td><td>methionine, and the usual start of an ORF</td></tr><tr><td>TAA, TAG, TGA</td><td><strong>Stop</strong></td><td>do not encode an amino acid</td></tr><tr><td>3 frames per strand</td><td><strong>Six in total</strong></td><td>only one is normally the real gene</td></tr></tbody></table>
            <ul><li><p>The reverse strand is read as its reverse complement, which is why a gene can be on either strand of a chromosome.</p></li><li><p>A long open reading frame — a hundred codons or more with no stop — is the strongest sequence-level evidence that a region is protein-coding.</p></li><li><p>The mass uses average residue masses, so it matches what a mass spectrometer reports rather than the monoisotopic mass.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Translating a sequence that still contains introns and wondering why there are stops every few codons.</li><li>Assuming frame 1 is the gene: roughly half of human genes are on the reverse strand.</li><li>Pasting an alignment with gaps, which shifts every downstream codon.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I find the reading frame of a gene?', 'a' => 'Translate all six frames and look for the long open reading frame that starts with ATG and ends with a stop codon.'],
            ['q' => 'Why does my translation have so many stops?', 'a' => 'Almost always the wrong frame, or a genomic sequence where a cDNA was expected.'],
            ['q' => 'What does the DNA to Protein Translation actually calculate?', 'a' => <<<'TXT'
            It returns coding length, amino acids in the longest frame, stop codons in frame 1 and mass of the frame-1 protein. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [],
    ],
];
