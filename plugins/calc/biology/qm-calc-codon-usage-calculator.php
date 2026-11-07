<?php

/**
 * Codon Usage Calculator
 * /biology/codon-usage-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Codon Usage Calculator',
    'meta' => ['title' => 'Codon Usage Calculator: Formula, Steps & Results', 'description' => 'Codon usage is how often each of the 61 sense codons appears in a coding sequence. It returns complete codons, gc at the third position, stop codons…', 'h1' => 'Codon Usage Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'sequence' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGAAATTTGGGCCCAAATTT', 'c' => null],
                ],
            ],
            'frame' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'frame-1', 'c' => null],
                ],
                'ds' => 'ds-frame',
            ],
            'codons' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gc3' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'stops' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'distinct' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rare' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-codon-usage-calculator',
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
                                    'l' => 'Coding sequence',
                                    'h' => 'Paste DNA; FASTA headers, spaces and digits are ignored',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'frame',
                                    'l' => 'Reading frame',
                                    'h' => 'Frame 1 starts at the first base',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-frame',
                                    'opts' => [
                                        ['frame-1', 'Frame 1', '0'],
                                        ['frame-2', 'Frame 2', '1'],
                                        ['frame-3', 'Frame 3', '2'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'codons',
                                    'l' => 'Complete codons',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gc3',
                                    'l' => 'GC at the third position',
                                    'h' => 'A high GC3 usually means a GC-rich organism',
                                    'suf' => '%',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'stops',
                                    'l' => 'Stop codons',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'distinct',
                                    'l' => 'Different codons used',
                                    'suf' => 'of 64',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'rare',
                                    'l' => 'Rare codons',
                                    'h' => 'Under 10% within a family that appears at least five times — candidates for codon optimisation',
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
            'ds-frame' => [
                'name' => 'Reading frame',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'frame-1', 'label' => 'Frame 1', 'value' => '0'],
                    ['uid' => 'frame-2', 'label' => 'Frame 2', 'value' => '1'],
                    ['uid' => 'frame-3', 'label' => 'Frame 3', 'value' => '2'],
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
        
          omni.onResult(['sequence', 'frame'], function (ctx) {
            var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
            // the select's slug is "frame-2" for the second frame
            var frameSlug = String(ctx.getRawInput('frame') || '');
            var frame = parseInt(frameSlug.replace(/\D/g, ''), 10) - 1;
            if (!isFinite(frame) || frame < 0 || frame > 2) frame = 0;
            if (seq.length < 3) {
              ctx.addHtml(block('Codon usage', '—', 'Paste a coding sequence of at least three bases.'));
              return;
            }
            var counts = {}, total = 0, stops = 0, gc3 = 0, aaCount = {}, aaSyn = {};
            eachCodon(seq, frame, function (codon) {
              var aa = aaOf(codon);
              if (!aa) return;
              total++;
              if (aa === '*') { stops++; return; }
              counts[codon] = (counts[codon] || 0) + 1;
              aaCount[aa] = (aaCount[aa] || 0) + 1;
              if (codon.charAt(2) === 'G' || codon.charAt(2) === 'C') gc3++;
            });
            if (!total) {
              ctx.addHtml(block('Codon usage', '—', 'No complete codon in this frame.'));
              return;
            }
            // Degeneracy of each amino acid in the standard code. It is a property of the
            // code, not of this sequence: counting the distinct codons *used* would give
            // a family of one for any amino acid the gene spells only one way, and RSCU
            // would then be wrong by the missing synonyms.
            var DEGEN = {F: 2, L: 6, S: 6, Y: 2, C: 2, W: 1, P: 4, H: 2, Q: 2, R: 6, I: 3,
                         T: 4, N: 2, K: 2, M: 1, V: 4, A: 4, D: 2, E: 2, G: 4};
            aaSyn = DEGEN;
        
            var rare = 0;
            var rows = Object.keys(counts).sort(function (a, b) { return counts[b] - counts[a]; })
              .map(function (c) {
                var aa = aaOf(c);
                var family = aaCount[aa] || 1, syn = aaSyn[aa] || 1;
                var rscu = (counts[c] * syn) / family;
                var share = counts[c] / family;
                // Only meaningful where the amino acid appears often enough for a share
                // to mean anything: one occurrence in a family is always 100%.
                if (family >= 5 && share < 0.10 && syn > 1) rare++;
                return [c, aa, String(counts[c]), pct1(share * 100) + '%', rscu.toFixed(2)];
              });
        
            ctx.exportValue('codons', total - stops);
            ctx.exportValue('gc3', Math.round(gc3 / total * 1000) / 10);
            ctx.exportValue('stops', stops);
            ctx.exportValue('distinct', Object.keys(counts).length);
            ctx.exportValue('rare', rare);
        
            ctx.addHtml(block('Summary',
              (total - stops) + ' sense codons · ' + (stops ? stops + ' stop codon' + (stops > 1 ? 's' : '')
                : 'no stop codon in frame ' + (frame + 1))
              + '\nGC3 ' + pct1(gc3 / total * 100) + '% · ' + Object.keys(counts).length + ' different codons used',
              'RSCU above 1 means the codon is used more often than a flat distribution within its family.'));
            ctx.addHtml(table('Codons in this sequence', ['Codon', 'AA', 'Count', 'Share in family', 'RSCU'],
              rows.slice(0, 40),
              rows.length > 40 ? 'Showing the 40 most used of ' + rows.length + ' codons.' : ''));
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Codon usage is how often each of the 61 sense codons appears in a coding sequence. It returns complete codons, gc at the third position, stop codons, different codons used and rare codons, and the panel shows all of them at once.
        
        Because several codons stand for the same amino acid, the pattern shows which synonyms a gene prefers — the first thing to check before expressing a gene in E. coli, yeast or CHO cells, where rare codons stall the ribosome.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Codon Usage', 'html' => <<<'TXT'
            <p>RSCU = observed count of a codon ÷ (count of its amino acid ÷ number of its synonyms). GC3 = codons ending in G or C ÷ complete codons × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/codon-usage-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Codon Usage Calculator — Codons available for one amino acid" title="Codon Usage Calculator"><figcaption>Codons available for one amino acid</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>RSCU</code></td><td>relative synonymous codon usage; 1.0 = no preference</td><td>—</td></tr><tr><td><code>GC3</code></td><td>GC content at the third codon position</td><td>%</td></tr><tr><td><code>CDS</code></td><td>coding sequence, in frame from the start codon</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Codon Usage?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>RSCU &gt; 1.5</td><td><strong>Strongly preferred</strong></td><td>the codon is used far more than chance in this gene</td></tr><tr><td>RSCU 0.8 – 1.5</td><td><strong>Neutral</strong></td><td>no meaningful preference</td></tr><tr><td>RSCU &lt; 0.5</td><td><strong>Avoided</strong></td><td>a candidate rare codon if the host also dislikes it</td></tr><tr><td>GC3 &gt; 70%</td><td><strong>GC-rich coding sequence</strong></td><td>common in Streptomyces, Mycobacterium, some plants</td></tr></tbody></table>
            <ul><li><p>RSCU normalises for family size: serine has six codons, methionine and tryptophan have one, so raw counts cannot be compared without it.</p></li><li><p>The rare-codon count only looks at families that appear at least five times. In a short sequence most amino acids occur once, so every codon is trivially 100% of its family and a plain 10% cut-off would report nothing.</p></li><li><p>Codon usage is species-specific. A codon that is common in humans can be rare in E. coli, which is why a human cDNA often expresses poorly in bacteria.</p></li><li><p>Rare codons do not always slow translation — clusters of them, especially at the 5′ end, are the ones that matter.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Analysing the sequence in the wrong frame, which turns every codon into noise.</li><li>Including the stop codon in the GC3 figure while excluding it from the codon table.</li><li>Comparing a gene's usage with a host table built from highly expressed genes rather than from the whole genome.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/reverse-translate">Reverse translate</a>. <a href="/biology/dna-to-protein">DNA to protein</a>. <a href="/biology/gc-content-sequence">GC content</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a good GC3 value?', 'a' => 'There is no good or bad value — it is a fingerprint of the organism. E. coli sits near 55%, human genes near 60%, and Plasmodium near 25%.'],
            ['q' => 'Why does codon usage matter for expression?', 'a' => <<<'TXT'
            Rare codons can exhaust the matching tRNA, cause ribosome stalling and lower yield. Codon optimisation replaces them with common synonyms without changing the protein.
            TXT],
            ['q' => 'Should I include the stop codon?', 'a' => 'Analyse it separately. Stops carry no amino acid, so they have no RSCU within a family.'],
            ['q' => 'What does the Codon Usage actually calculate?', 'a' => <<<'TXT'
            It returns complete codons, gc at the third position, stop codons, different codons used and rare codons. Each one is derived by the formula on this page, so you can check any figure by hand.
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
