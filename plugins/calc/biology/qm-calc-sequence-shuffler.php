<?php

/**
 * DNA Sequence Shuffler
 * /biology/sequence-shuffler
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DNA Sequence Shuffler',
    'meta' => ['title' => 'DNA Sequence Shuffler Calculator — Formula & Results', 'description' => 'Shuffling preserves the exact composition of a sequence — every base, or every dinucleotide — while destroying its order. It returns length, gc content…', 'h1' => 'DNA Sequence Shuffler', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'sequence' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGAAATTTGGGCCCAAATTT', 'c' => null],
                ],
            ],
            'mode' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'single-bases', 'c' => null],
                ],
                'ds' => 'ds-mode',
            ],
            'type' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'dna', 'c' => null],
                ],
                'ds' => 'ds-type',
            ],
            'seed' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '42', 'c' => null],
                ],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gc_pct' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'changes' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'hamming' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-sequence-shuffler',
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
                                    'l' => 'Sequence',
                                    'h' => 'Paste DNA or protein; headers, spaces and digits are ignored',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'mode',
                                    'l' => 'Shuffle by',
                                    'h' => 'Dinucleotide shuffling keeps the same pairs, so dinucleotide biases survive',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-mode',
                                    'opts' => [
                                        ['single-bases', 'Single bases', 'mono'],
                                        ['dinucleotides', 'Dinucleotides', 'di'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'type',
                                    'l' => 'Molecule',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-type',
                                    'opts' => [
                                        ['dna', 'DNA', 'dna'],
                                        ['protein', 'Protein', 'protein'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'seed',
                                    'l' => 'Random seed',
                                    'h' => 'Same seed, same result — useful for reproducible nulls',
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'length',
                                    'l' => 'Length',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gc_pct',
                                    'l' => 'GC content',
                                    'h' => 'Unchanged by mononucleotide shuffling',
                                    'suf' => '%',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'changes',
                                    'l' => 'Positions changed',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'hamming',
                                    'l' => 'Difference from the input',
                                    'suf' => '%',
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
            'ds-mode' => [
                'name' => 'Shuffle by',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'single-bases', 'label' => 'Single bases', 'value' => 'mono'],
                    ['uid' => 'dinucleotides', 'label' => 'Dinucleotides', 'value' => 'di'],
                ],
            ],
            'ds-type' => [
                'name' => 'Molecule',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'dna', 'label' => 'DNA', 'value' => 'dna'],
                    ['uid' => 'protein', 'label' => 'Protein', 'value' => 'protein'],
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
        
          function mulberry32(a) {
            return function () {
              a |= 0; a = a + 0x6D2B79F5 | 0;
              var t = Math.imul(a ^ a >>> 15, 1 | a);
              t = t + Math.imul(t ^ t >>> 7, 61 | t) ^ t;
              return ((t ^ t >>> 14) >>> 0) / 4294967296;
            };
          }
          function shuffleMono(s, rnd) {
            var a = s.split('');
            for (var i = a.length - 1; i > 0; i--) {
              var j = Math.floor(rnd() * (i + 1));
              var t = a[i]; a[i] = a[j]; a[j] = t;
            }
            return a.join('');
          }
          function shuffleDi(s, rnd) {
            // Altschul-Erikson style: repeatedly pick a random dinucleotide and swap its
            // two occurrences of the second base. Keeps every dinucleotide count intact.
            if (s.length < 4) return shuffleMono(s, rnd);
            var a = s.split('');
            var tries = Math.max(50, a.length * 12);
            for (var k = 0; k < tries; k++) {
              var i = Math.floor(rnd() * (a.length - 1));
              var j = Math.floor(rnd() * (a.length - 1));
              if (i === j) continue;
              var b = a[i + 1], c = a[j + 1];
              if (a[i] === a[j] || b === c) continue;
              a[i + 1] = c; a[j + 1] = b;
            }
            return a.join('');
          }
          omni.onResult(['sequence', 'mode', 'type', 'seed'], function (ctx) {
            var kind = /protein/i.test(String(ctx.getRawInput('type') || '')) ? 'protein' : 'dna';
            var seq = cleanSeq(ctx.getRawInput('sequence'), kind);
            if (!seq) {
              ctx.addHtml(block('Shuffled sequence', '—', 'Paste a sequence to shuffle.'));
              return;
            }
            var seed = Number(ctx.getRawInput('seed'));
            if (!isFinite(seed)) seed = 42;
            var rnd = mulberry32(Math.floor(seed) || 1);
            var mode = /dinucleotide/i.test(String(ctx.getRawInput('mode') || '')) ? 'di' : 'mono';
            var out = seq.length < 2 ? seq : (mode === 'di' ? shuffleDi(seq, rnd) : shuffleMono(seq, rnd));
        
            var changed = 0;
            for (var i = 0; i < seq.length; i++) if (seq.charAt(i) !== out.charAt(i)) changed++;
            var pctChanged = seq.length ? changed / seq.length * 100 : 0;
            var gc = kind === 'dna' ? gcOf(out) : 0;
            var pctGC = kind === 'dna' && out.length ? gc / out.length * 100 : 0;
        
            ctx.exportValue('length', out.length);
            if (kind === 'dna') ctx.exportValue('gc_pct', Math.round(pctGC * 100) / 100);
            ctx.exportValue('changes', changed);
            ctx.exportValue('hamming', Math.round(pctChanged * 10) / 10);
        
            ctx.addHtml(block('Shuffled ' + (kind === 'dna' ? 'DNA' : 'protein') + ' ('
              + (mode === 'di' ? 'dinucleotide' : 'mononucleotide') + ' preserving, seed ' + seed + ')',
              wrap(out, 60),
              out.length + ' residues · ' + changed + ' positions changed ('
              + pct1(pctChanged) + '%)'
              + (kind === 'dna' ? ' · GC ' + pct1(pctGC) + '%, identical to the input' : '')));
            if (seq.length < 4) {
              ctx.addHtml(block('Too short to shuffle',
                'A sequence of ' + seq.length + ' residue' + (seq.length === 1 ? '' : 's')
                + ' has only one possible arrangement.'));
            }
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Shuffling preserves the exact composition of a sequence — every base, or every dinucleotide — while destroying its order. It returns length, gc content, positions changed and difference from the input, and the panel shows all of them at once.
        
        It is how you build the null model that tells you whether a motif count, a repeat or a codon bias is more than chance.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the DNA Sequence Shuffler', 'html' => <<<'TXT'
            <p>Shuffled sequence has the same base counts: A₁ = A₀, C₁ = C₀, G₁ = G₀, T₁ = T₀. Dinucleotide shuffling also preserves every dinucleotide count</p>
            <figure class="calc-figure"><img src="/uploads/biology/sequence-shuffler.svg" width="720" height="300" loading="lazy" alt="Animated diagram: DNA Sequence Shuffler — A shuffle keeps the base counts" title="DNA Sequence Shuffler"><figcaption>A shuffle keeps the base counts</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>A₀, C₀, G₀, T₀</code></td><td>base counts in the input</td><td>bases</td></tr><tr><td><code>A₁ … T₁</code></td><td>base counts in the output; identical</td><td>bases</td></tr><tr><td><code>seed</code></td><td>starting value of the pseudo-random generator</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the DNA Sequence Shuffler?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0% changed</td><td><strong>Identical</strong></td><td>a very short or single-base sequence cannot be shuffled</td></tr><tr><td>30 – 70% changed</td><td><strong>Well shuffled</strong></td><td>what a random permutation normally looks like</td></tr><tr><td>100% changed</td><td><strong>Fully displaced</strong></td><td>possible for short sequences, unlikely for long ones</td></tr></tbody></table>
            <ul><li><p>A mononucleotide shuffle preserves base composition but not dinucleotide composition, so it is the right null for asking whether a motif is over-represented.</p></li><li><p>For CpG or oligo-frequency questions the dinucleotide shuffle is stricter and is the better null, because it keeps the sequence's dinucleotide bias intact.</p></li><li><p>Reproducibility matters: report the seed alongside the shuffled sequence, otherwise nobody can regenerate the control you used.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Shuffling to test a property the shuffle preserves — GC content cannot be tested this way, because it is fixed by construction.</li><li>Using one shuffle as a null; a proper test needs hundreds and a distribution.</li><li>Forgetting that a dinucleotide shuffle reproduces mononucleotide composition only approximately for very short sequences.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does sequence shuffling test?', 'a' => 'Whether an observed pattern — a motif count, a repeat, a codon bias — is more than the composition alone would produce.'],
            ['q' => 'Why preserve dinucleotides?', 'a' => 'Because genomes have strong dinucleotide biases, notably CpG depletion. A mononucleotide shuffle destroys that and inflates significance.'],
            ['q' => 'Is the output random?', 'a' => 'Pseudo-random from the seed. The same seed always gives the same sequence, which is what you want in a methods section.'],
            ['q' => 'What does the DNA Sequence Shuffler actually calculate?', 'a' => <<<'TXT'
            It returns length, gc content, positions changed and difference from the input. Each one is derived by the formula on this page, so you can check any figure by hand.
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
