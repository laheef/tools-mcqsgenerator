<?php

/**
 * Reverse Translate Calculator
 * /biology/reverse-translate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Reverse Translate Calculator',
    'meta' => ['title' => 'Reverse Translate Calculator — Formula & Results', 'description' => 'Reverse translation turns a protein sequence back into a DNA sequence that would encode it. It returns protein length, dna length, gc content of the dna…', 'h1' => 'Reverse Translate Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'protein' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'MKTAYIAKQRQISFVKSHFSRQLEERLGLIEVQAPILSRVGDGTQDNLSGAEKAVQV', 'c' => null],
                ],
            ],
            'strategy' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'e-coli-most-used-codon', 'c' => null],
                ],
                'ds' => 'ds-strategy',
            ],
            'tail' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'yes', 'c' => null],
                ],
                'ds' => 'ds-tail',
            ],
            'length_aa' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gc_pct' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'codons' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'tm' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-reverse-translate',
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
                                    'h' => 'Single-letter code; spaces, digits and FASTA headers are ignored',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'strategy',
                                    'l' => 'Codon choice',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-strategy',
                                    'opts' => [
                                        ['e-coli-most-used-codon', 'E. coli, most used codon', 'ecoli'],
                                        ['human-most-used-codon', 'Human, most used codon', 'human'],
                                        ['gc-balanced-50', 'GC-balanced (50%)', 'gc'],
                                        ['avoid-rare-codons-gc-rich-hosts', 'Avoid rare codons (GC-rich hosts)', 'gchost'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'tail',
                                    'l' => 'Add a stop codon',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-tail',
                                    'opts' => [
                                        ['yes', 'Yes', 'yes'],
                                        ['no', 'No', 'no'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'length_aa',
                                    'l' => 'Protein length',
                                    'suf' => 'aa',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'length',
                                    'l' => 'DNA length',
                                    'suf' => 'nt',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gc_pct',
                                    'l' => 'GC content of the DNA',
                                    'suf' => '%',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'codons',
                                    'l' => 'Codons',
                                    'h' => 'Includes the stop codon when one is added',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'tm',
                                    'l' => 'Melting temperature of the duplex',
                                    'h' => 'At 50 mM monovalent salt',
                                    'suf' => '°C',
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
            'ds-strategy' => [
                'name' => 'Codon choice',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'e-coli-most-used-codon', 'label' => 'E. coli, most used codon', 'value' => 'ecoli'],
                    ['uid' => 'human-most-used-codon', 'label' => 'Human, most used codon', 'value' => 'human'],
                    ['uid' => 'gc-balanced-50', 'label' => 'GC-balanced (50%)', 'value' => 'gc'],
                    ['uid' => 'avoid-rare-codons-gc-rich-hosts', 'label' => 'Avoid rare codons (GC-rich hosts)', 'value' => 'gchost'],
                ],
            ],
            'ds-tail' => [
                'name' => 'Add a stop codon',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'yes', 'label' => 'Yes', 'value' => 'yes'],
                    ['uid' => 'no', 'label' => 'No', 'value' => 'no'],
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
        
          // Codon preference lists, most used first, per host. Only the relative order
          // matters here; it reproduces the ordering of the Kazusa usage tables closely
          // enough for a design starting point.
          var ECOL = {
            A: ['GCG','GCA','GCT','GCC'], R: ['CGT','CGC','CGG','CGA','AGA','AGG'],
            N: ['AAC','AAT'], D: ['GAT','GAC'], C: ['TGC','TGT'], Q: ['CAG','CAA'],
            E: ['GAA','GAG'], G: ['GGC','GGT','GGG','GGA'], H: ['CAT','CAC'],
            I: ['ATT','ATC','ATA'], L: ['CTG','TTA','TTA','CTT','CTC','TTA','TTG','TTA'],
            K: ['AAA','AAG'], M: ['ATG'], F: ['TTT','TTC'], P: ['CCG','CCA','CCT','CCC'],
            S: ['AGC','TCT','TCC','TCG','AGT','TCA'], T: ['ACC','ACG','ACT','ACA'],
            W: ['TGG'], Y: ['TAT','TAC'], V: ['GTG','GTT','GTC','GTA'], '*': ['TAA','TGA','TAG']
          };
          var HUMAN = {
            A: ['GCC','GCT','GCA','GCG'], R: ['AGG','AGA','CGG','CGC','CGT','CGA'],
            N: ['AAC','AAT'], D: ['GAC','GAT'], C: ['TGC','TGT'], Q: ['CAG','CAA'],
            E: ['GAG','GAA'], G: ['GGC','GGG','GGA','GGT'], H: ['CAC','CAT'],
            I: ['ATC','ATT','ATA'], L: ['CTG','CTC','TTG','CTT','TTA','CTA'],
            K: ['AAG','AAA'], M: ['ATG'], F: ['TTC','TTT'], P: ['CCC','CCG','CCA','CCT'],
            S: ['AGC','TCC','TCT','TCG','AGT','TCA'], T: ['ACC','ACA','ACT','ACG'],
            W: ['TGG'], Y: ['TAC','TAT'], V: ['GTG','GTC','GTT','GTA'], '*': ['TGA','TAA','TAG']
          };
          function gcCount(c) { return (c === 'G' || c === 'C') ? 1 : 0; }
          function pickCodon(aa, strategy) {
            var table = strategy === 'human' ? HUMAN : ECOL;
            var list = table[aa];
            if (!list || !list.length) return null;
            if (strategy === 'ecoli' || strategy === 'human') return list[0];
            // GC-balanced or GC-rich host: choose by how close the codon sits to 50% GC
            var best = list[0], bestScore = 9;
            for (var i = 0; i < list.length; i++) {
              var g = gcCount(list[i].charAt(0)) + gcCount(list[i].charAt(1)) + gcCount(list[i].charAt(2));
              var score = Math.abs(g - (strategy === 'gc' ? 1.5 : 2.4));
              if (score < bestScore) { bestScore = score; best = list[i]; }
            }
            return best;
          }
          omni.onResult(['protein', 'strategy', 'tail'], function (ctx) {
            var raw = String(ctx.getRawInput('protein') || '').replace(/^>.*$/gm, '')
              .replace(/[^A-Za-z]/g, '').toUpperCase();
            if (!raw) {
              ctx.addHtml(block('Reverse translation', '—', 'Paste a protein sequence to back-translate.'));
              return;
            }
            var stratSlug = String(ctx.getRawInput('strategy') || '');
            var strategy = /human/i.test(stratSlug) ? 'human'
              : /gc-balanced/i.test(stratSlug) ? 'gc'
              : /avoid/i.test(stratSlug) ? 'gchost' : 'ecoli';
            var addStop = !/^no/i.test(String(ctx.getRawInput('tail') || 'yes').trim());
            var dna = '', unknown = [], residues = 0;
            for (var i = 0; i < raw.length; i++) {
              var aa = raw.charAt(i);
              if (aa === '*') { dna += 'TAA'; continue; }
              var codon = pickCodon(aa, strategy);
              if (!codon) { unknown.push(aa); dna += 'NNN'; continue; }
              dna += codon;
              residues++;
            }
            if (addStop) dna += pickCodon('*', strategy);
            var n = dna.length, gc = gcOf(dna.replace(/N/g, ''));
            var pct = n ? gc / n * 100 : 0;
            ctx.exportValue('length_aa', residues);
            ctx.exportValue('length', n);
            ctx.exportValue('gc_pct', Math.round(pct * 100) / 100);
            ctx.exportValue('codons', Math.floor(n / 3));
            ctx.exportValue('tm', Math.round(tmOf(n, pct, n - gc, gc) * 10) / 10);
        
            ctx.addHtml(block('Reverse-translated DNA (5′→3′)', wrap(dna, 60),
              n + ' nt · ' + Math.floor(n / 3) + ' codons · GC ' + pct1(pct) + '%'
              + (unknown.length ? ' · unrecognised letters replaced by NNN: '
                 + Array.from(new Set(unknown)).join(' ') : '')));
            if (unknown.length) {
              ctx.addHtml(block('Check your input',
                'These characters are not amino acid codes: ' + Array.from(new Set(unknown)).join(' ')
                + '\nThey were written as NNN, which a synthesiser will not accept.'));
            }
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Reverse translation turns a protein sequence back into a DNA sequence that would encode it. It returns protein length, dna length, gc content of the dna, codons and melting temperature of the duplex, and the panel shows all of them at once.
        
        Every amino acid except methionine and tryptophan has several codons, so there is no single right answer — this tool offers the codons a host actually uses, the GC-balanced choice, and the rare-codon-avoiding choice.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Reverse Translate', 'html' => <<<'TXT'
            <p>Each residue is replaced by a codon from the host's preferred set; DNA length = 3 × (residues + stop). GC% = (G + C) ÷ length × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/reverse-translate.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Reverse Translate Calculator — Codons a residue can use" title="Reverse Translate Calculator"><figcaption>Codons a residue can use</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>aa</code></td><td>amino acid residue</td><td>—</td></tr><tr><td><code>nt</code></td><td>nucleotide</td><td>—</td></tr><tr><td><code>codon</code></td><td>three bases that specify one residue</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Reverse Translate?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>rare codons kept</td><td><strong>Risk of poor expression</strong></td><td>especially clusters near the 5′ end</td></tr><tr><td>GC 40 – 60%</td><td><strong>Comfortable range</strong></td><td>synthesis and PCR both behave well</td></tr><tr><td>GC above 70%</td><td><strong>Hard to synthesise</strong></td><td>secondary structure and mispriming become likely</td></tr></tbody></table>
            <ul><li><p>A back-translated sequence is a design proposal, not a recovered gene. Silent codons are lost forever when you translate forward, so the original DNA cannot be reconstructed.</p></li><li><p>The most-used codon is not always the best choice: runs of the same rare tRNA demand, strong secondary structure at the ribosome binding site, and hidden restriction sites all matter. Treat the output as a starting point for codon optimisation.</p></li><li><p>GC-balanced output is the safest default when the DNA will be chemically synthesised, because synthesis fails most often on extreme GC.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Assuming the reverse-translated sequence will match the original gene — it will not.</li><li>Ignoring the host: a codon set chosen for E. coli can be poor for Pichia or CHO.</li><li>Forgetting the stop codon, which truncates translation if it is missing in an expression construct.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Can I recover the original DNA from a protein?', 'a' => 'No. Most amino acids map to several codons and that information is lost in translation; you can only propose a new sequence.'],
            ['q' => 'Which codon table should I use?', 'a' => 'The host you will express in. E. coli for bacterial work, human for mammalian cells, GC-balanced if the sequence is being synthesised.'],
            ['q' => 'Why does the tool avoid rare codons?', 'a' => 'Clusters of rare codons deplete the matching tRNA and stall the ribosome, which lowers yield and can cause truncation.'],
            ['q' => 'What does the Reverse Translate actually calculate?', 'a' => <<<'TXT'
            It returns protein length, dna length, gc content of the dna, codons and melting temperature of the duplex. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];
