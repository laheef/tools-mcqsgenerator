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
    'meta' => ['title' => 'DNA Sequence Shuffler Calculator — Formula & Results', 'description' => 'DNA Sequence Shuffler works out Length and GC content from Sequence, Shuffle by and Molecule. DNA Sequence Shuffler answers one question from 4 numbers, and…', 'h1' => 'DNA Sequence Shuffler', 'updated' => '2026-10-29'],
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
        DNA Sequence Shuffler works out Length and GC content from Sequence, Shuffle by and Molecule. Nothing is looked up on this page: Length is computed from Sequence and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the DNA Sequence Shuffler calculator works', 'html' => <<<'TXT'
            <p>DNA Sequence Shuffler answers one question from 4 numbers, and the answer is Length, GC content and Positions changed.</p><p>The answers are Length, GC content, Positions changed and Difference from the input; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Sequence</strong> — a plain number, no unit. Paste DNA or protein; headers, spaces and digits are ignored</li><li><strong>Shuffle by</strong> — a plain number, no unit. Dinucleotide shuffling keeps the same pairs, so dinucleotide biases survive</li><li><strong>Molecule</strong> — a plain number, no unit</li><li><strong>Random seed</strong> — a plain number, no unit. Same seed, same result — useful for reproducible nulls</li></ul><p>The answers come back as Length, GC content in %, Positions changed, Difference from the input in %. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Length is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Length, GC content and Positions changed are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Sequence to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Sequence, Shuffle by and Molecule is what you already know and Length and GC content is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/sds-page-gel">SDS-PAGE Gel Calculator</a>, <a href="/biology/seeding-rate">Seeding Rate and Plants per Hectare Calculator</a> and <a href="/biology/serial-dilution-planner">Serial Dilution Planner Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DNA Sequence Shuffler calculator work out?', 'a' => 'Length, GC content, Positions changed and Difference from the input.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Sequence, Shuffle by, Molecule, Random seed. Enter sequence, mode and type; Length is the box to leave alone unless it is the value you came for.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Length is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'Every box has to have a number in it. What this page returns is Length, so an empty input simply leaves the result blank rather than choosing a new unknown.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Length at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/sds-page-gel', 'name' => 'SDS-PAGE Gel Calculator'],
            ['path' => '/biology/seeding-rate', 'name' => 'Seeding Rate and Plants per Hectare Calculator'],
            ['path' => '/biology/serial-dilution-planner', 'name' => 'Serial Dilution Planner Calculator'],
        ],
        'authors' => [],
    ],
];
