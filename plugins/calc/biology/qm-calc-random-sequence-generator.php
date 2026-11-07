<?php

/**
 * Random Sequence Generator Calculator
 * /biology/random-sequence-generator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Random Sequence Generator Calculator',
    'meta' => ['title' => 'Random Sequence Generator Calculator — Biology', 'description' => 'Generate a random DNA, RNA or protein sequence of any length with a target GC content, and get the same sequence back every time from the same seed.', 'h1' => 'Random Sequence Generator Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'kind' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'dna-acgt', 'c' => null],
                ],
                'ds' => 'ds-kind',
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '1000', 'c' => null],
                ],
            ],
            'gc' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '50', 'c' => null],
                ],
            ],
            'seed' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '42', 'c' => null],
                ],
            ],
            'gc_actual' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'start' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'no', 'c' => null],
                ],
                'ds' => 'ds-start',
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-random-sequence-generator',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'kind',
                                    'l' => 'Alphabet',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-kind',
                                    'opts' => [
                                        ['dna-acgt', 'DNA (ACGT)', 'dna'],
                                        ['rna-acgu', 'RNA (ACGU)', 'rna'],
                                        ['protein-20-aa', 'Protein (20 aa)', 'protein'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'length',
                                    'l' => 'Length',
                                    'h' => '1 to 100 000',
                                    'suf' => 'residues',
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gc',
                                    'l' => 'Target GC content',
                                    'h' => 'DNA and RNA only',
                                    'suf' => '%',
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'seed',
                                    'l' => 'Seed',
                                    'h' => 'Same seed, same sequence — any whole number',
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gc_actual',
                                    'l' => 'GC content of the output',
                                    'suf' => '%',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'start',
                                    'l' => 'Make the sequence start with ATG',
                                    'h' => 'DNA only — gives you a start codon',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-start',
                                    'opts' => [
                                        ['yes', 'Yes', '1'],
                                        ['no', 'No', '0'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [],
        'datasets' => [
            'ds-kind' => [
                'name' => 'Alphabet',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'dna-acgt', 'label' => 'DNA (ACGT)', 'value' => 'dna'],
                    ['uid' => 'rna-acgu', 'label' => 'RNA (ACGU)', 'value' => 'rna'],
                    ['uid' => 'protein-20-aa', 'label' => 'Protein (20 aa)', 'value' => 'protein'],
                ],
            ],
            'ds-start' => [
                'name' => 'Make the sequence start with ATG',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'yes', 'label' => 'Yes', 'value' => '1'],
                    ['uid' => 'no', 'label' => 'No', 'value' => '0'],
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
        
          function mulberry32(a) {
            return function () {
              a |= 0; a = (a + 0x6D2B79F5) | 0;
              var t = Math.imul(a ^ (a >>> 15), 1 | a);
              t = (t + Math.imul(t ^ (t >>> 7), 61 | t)) ^ t;
              return ((t ^ (t >>> 14)) >>> 0) / 4294967296;
            };
          }
          omni.onResult(['kind', 'length', 'gc', 'seed', 'start'], function (ctx) {
            var kind = resolve(ctx.getRawInput('kind'), { dna: 'dna', rna: 'rna', protein: 'protein' }, 'dna');
            var n = Math.round(Number(ctx.getRawInput('length')) || 0);
            if (!(n > 0)) n = 0;
            n = Math.min(n, 100000);
            var gcTarget = Math.max(0, Math.min(100, Number(ctx.getRawInput('gc')) || 0));
            var seed = Math.round(Number(ctx.getRawInput('seed')) || 0);
            var start = /true|yes|1/i.test(String(ctx.getRawInput('start') || ''));
            if (!n) {
              ctx.addHtml(block('Random sequence', '—', 'Enter a length between 1 and 100 000.'));
              ctx.exportValue('gc_actual', 0);
              return;
            }
            var rnd = mulberry32(seed);
            var seq = '', counts = {}, i, ch;
            var seqAlpha = kind === 'protein' ? 'ACDEFGHIKLMNPQRSTVWY' : (kind === 'rna' ? 'ACGU' : 'ACGT');
            var gcPair = kind === 'rna' ? ['G', 'C'] : ['G', 'C'];
            for (i = 0; i < n; i++) {
              if (kind === 'protein') ch = seqAlpha.charAt(Math.floor(rnd() * seqAlpha.length) % seqAlpha.length);
              else {
                var r = rnd() * 100;
                if (r < gcTarget / 2) ch = gcPair[0];
                else if (r < gcTarget) ch = gcPair[1];
                else ch = (rnd() < 0.5 ? 'A' : (kind === 'rna' ? 'U' : 'T'));
              }
              seq += ch;
              counts[ch] = (counts[ch] || 0) + 1;
            }
            if (kind !== 'protein' && start && n >= 3) {
              seq = 'ATG' + seq.slice(3);
              counts = {};
              for (i = 0; i < seq.length; i++) { ch = seq.charAt(i); counts[ch] = (counts[ch] || 0) + 1; }
            }
            var gcN = (counts.G || 0) + (counts.C || 0);
            var pct = kind === 'protein' ? 0 : gcN / n * 100;
            ctx.exportValue('gc_actual', Math.round(pct * 100) / 100);
            var rows = [];
            var keys = Object.keys(counts).sort();
            for (i = 0; i < keys.length; i++) {
              rows.push([keys[i], String(counts[keys[i]]), (counts[keys[i]] / n * 100).toFixed(2) + ' %']);
            }
            var kindName = kind === 'protein' ? 'protein' : (kind === 'rna' ? 'RNA' : 'DNA');
            var head = block('Random ' + kindName + ' sequence — seed ' + seed,
              'Length      ' + n + '\nSeed        ' + seed
              + (kind === 'protein' ? '\nAlphabet    20 standard residues, uniform'
                                    : '\nTarget GC   ' + gcTarget + ' %\nRealised GC ' + pct.toFixed(2) + ' %')
              + (start && kind !== 'protein' ? '\nStart       ATG forced at position 1' : ''),
              'Reuse the seed and the length to get this exact sequence again.');
            ctx.addHtml(head + block('Sequence', wrap(seq, 60)) + table('Composition', ['Symbol', 'Count', 'Share'], rows));
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Generate a random DNA, RNA or protein sequence of any length with a target GC content, and get the same sequence back every time from the same seed. It returns gc content of the output, and the panel shows all of them at once.
        
        It is the negative control you need for a motif search, a composition baseline for a GC calculator, or a training example for a pipeline.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Random Sequence Generator', 'html' => <<<'TXT'
            <p>each base is drawn from a seeded 32-bit generator, with G and C chosen with probability GC/2 each</p>
            <figure class="calc-figure"><img src="/uploads/biology/random-sequence-generator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Random Sequence Generator Calculator — Base composition of a 1 000-base draw at 50 % GC" title="Random Sequence Generator Calculator"><figcaption>Base composition of a 1 000-base draw at 50 % GC</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>seed</code></td><td>the integer that fixes the pseudo-random stream</td><td>—</td></tr><tr><td><code>GC</code></td><td>target fraction of G + C</td><td>%</td></tr><tr><td><code>n</code></td><td>length of the sequence</td><td>bases</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Random Sequence Generator?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Choose the alphabet, the length and — for DNA or RNA — the GC content you want.</li><li>Keep the seed if you need the same sequence again, change it for a different draw.</li><li>Copy the output: it is wrapped at 60 columns and the seed is printed with it, so anyone can reproduce exactly what you used.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: length of <strong>1,000</strong> residues, target gc content of <strong>50</strong>%, seed of <strong>42</strong>, make the sequence start with atg of <strong>0</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>20 – 40 % GC</td><td><strong>AT-rich</strong></td><td>typical of a bacterial genome's variable regions and of some promoters</td></tr><tr><td>40 – 60 % GC</td><td><strong>Balanced</strong></td><td>the usual null model for a mammalian sequence</td></tr><tr><td>60 – 80 % GC</td><td><strong>GC-rich</strong></td><td>like a CpG island or a GC3-rich coding sequence</td></tr></tbody></table>
            <ul><li><p>The random draw is deterministic from the seed: the same seed and length always give the same sequence, which is what makes a 'random' control reproducible in a paper.</p></li><li><p>GC is applied as a target, so the achieved value wobbles around it by the binomial sampling error — for 1 000 bases at 50 %, expect about ±1.6 points.</p></li><li><p>A protein draw uses the 20 standard residues with equal probability, not the natural amino-acid frequencies; that is what you want for a shuffled control, and it is stated in the output rather than assumed.</p></li><li><p>Nothing here is cryptographically random. For keys or identifiers use a proper CSPRNG.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Using a random sequence as a statistical null without matching its GC content to the real sequence — composition dominates most motif statistics.</li><li>Assuming two different seeds give unrelated sequences: they do, but a short sequence can happen to look similar, which is the point of the test.</li><li>Generating a 'random' protein with natural frequencies and calling it a shuffled control.</li><li>Losing the seed and then being unable to reproduce a figure.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/sequence-shuffler">Sequence shuffler</a>. <a href="/biology/gc-content-calculator">GC content</a>. <a href="/biology/dna-pattern-finder">DNA pattern finder</a>. <a href="/biology/reverse-complement">Reverse complement</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Is the sequence truly random?', 'a' => 'It is pseudo-random and deterministic from the seed: statistically uniform, perfectly reproducible, and not suitable for anything security-related.'],
            ['q' => 'Why does the GC content not exactly match what I asked for?', 'a' => <<<'TXT'
            Because each base is drawn independently, so the realised count fluctuates around the target — more bases means a smaller wobble. The page reports what it actually produced.
            TXT],
            ['q' => 'Can I regenerate the same sequence later?', 'a' => 'Yes — keep the seed and the length. The output block prints the seed for exactly that reason.'],
            ['q' => 'Does the protein mode use natural amino-acid frequencies?', 'a' => <<<'TXT'
            No. It draws the 20 residues uniformly, which is the right control for a shuffled sequence. Use a composition-matched generator if your null model needs natural frequencies.
            TXT],
            ['q' => 'What does the Random Sequence Generator actually calculate?', 'a' => 'It returns gc content of the output. Each one is derived by the formula on this page, so you can check any figure by hand.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
        ],
        'related' => [],
    ],
];
