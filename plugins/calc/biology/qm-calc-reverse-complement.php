<?php

/**
 * Reverse Complement Calculator
 * /biology/reverse-complement
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Reverse Complement Calculator',
    'meta' => ['title' => 'Reverse Complement Calculator — Formula & Results', 'description' => 'Reverse Complement works out Length and GC content from Sequence, Alphabet and Base pairs per line. The arithmetic is the whole method: Length is worked out…', 'h1' => 'Reverse Complement Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'sequence' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAG', 'c' => null],
                ],
            ],
            'alphabet' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'dna-a-c-g-t', 'c' => null],
                ],
                'ds' => 'ds-alphabet',
            ],
            'width' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '60', 'c' => null],
                ],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gc' => [
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
                'uid' => 'custom-reverse-complement',
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
                                    'h' => 'Paste DNA; spaces, line breaks and FASTA headers are ignored',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'alphabet',
                                    'l' => 'Alphabet',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-alphabet',
                                    'opts' => [
                                        ['dna-a-c-g-t', 'DNA (A, C, G, T)', 'dna'],
                                        ['rna-a-c-g-u', 'RNA (A, C, G, U)', 'rna'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'width',
                                    'l' => 'Base pairs per line',
                                    'h' => '0 for one line',
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'length',
                                    'l' => 'Length',
                                    'suf' => 'bp',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gc',
                                    'l' => 'GC content',
                                    'suf' => '%',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'tm',
                                    'l' => 'Melting temperature of the duplex',
                                    'h' => 'Wallace under 14 nt, GC rule to 40 nt, long-duplex form above',
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
            'ds-alphabet' => [
                'name' => 'Alphabet',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'dna-a-c-g-t', 'label' => 'DNA (A, C, G, T)', 'value' => 'dna'],
                    ['uid' => 'rna-a-c-g-u', 'label' => 'RNA (A, C, G, U)', 'value' => 'rna'],
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
        
          var COMP = {A:'T',T:'A',G:'C',C:'G',U:'A',
                      R:'Y',Y:'R',S:'S',W:'W',K:'M',M:'K',
                      B:'V',V:'B',D:'H',H:'D',N:'N'};
          function revcomp(s) {
            var out = '';
            for (var i = s.length - 1; i >= 0; i--) {
              var c = s.charAt(i);
              out += COMP[c] || 'N';
            }
            return out;
          }
          function gcOf(s) {
            var gc = 0;
            for (var i = 0; i < s.length; i++) {
              var c = s.charAt(i);
              if (c === 'G' || c === 'C') gc++;
            }
            return gc;
          }
        
          omni.onResult(['sequence'], function (ctx) {
            var raw = ctx.getRawInput('sequence');
            // selects return the option slug ("rna-a-c-g-u"), so match on the word
            var kind = /rna/i.test(String(ctx.getRawInput('alphabet') || '')) ? 'rna' : 'dna';
            var width = Number(ctx.getRawInput('width'));
            if (!isFinite(width) || width < 0) width = 60;
        
            var seq = cleanSeq(raw, 'dna');
            if (kind === 'rna') seq = seq.replace(/T/g, 'U');
            if (!seq) {
              ctx.addHtml(block('Reverse complement', '—', 'Paste a sequence to see the other strand.'));
              return;
            }
            var comp = revcomp(kind === 'rna' ? seq.replace(/U/g, 'T') : seq);
            if (kind === 'rna') comp = comp.replace(/T/g, 'U');
        
            var gc = gcOf(kind === 'rna' ? seq.replace(/U/g, 'T') : seq);
            var pct = seq.length ? (gc / seq.length) * 100 : 0;
            var at = seq.length - gc;
            var tm = tmOf(seq.length, pct, at, gc);
        
            ctx.exportValue('length', seq.length);
            ctx.exportValue('gc', Math.round(pct * 100) / 100);
            ctx.exportValue('tm', Math.round(tm * 10) / 10);
        
            var w = width === 0 ? Math.max(seq.length, 1) : width;
            ctx.addHtml(block('Reverse complement (5′→3′)', wrap(comp, w),
              seq.length + (kind === 'rna' ? ' nt' : ' bp') + ' · GC ' + pct.toFixed(1) + '%'));
            if (seq.length <= 200) {
              ctx.addHtml(block('Input, as read 5′→3′', wrap(seq, w)));
            }
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Reverse Complement works out Length and GC content from Sequence, Alphabet and Base pairs per line. The arithmetic is the whole method: Length is worked out from Sequence by one formula, applied once. Length comes back in bp unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Reverse Complement calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Reverse Complement: it takes 3 numbers and reports Length, GC content and Melting temperature of the duplex.</p><p>What comes back is Length, GC content and Melting temperature of the duplex — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Sequence</strong> — a plain number, no unit. Paste DNA; spaces, line breaks and FASTA headers are ignored</li><li><strong>Alphabet</strong> — a plain number, no unit</li><li><strong>Base pairs per line</strong> — a plain number, no unit. 0 for one line</li></ul><p>What you get back is Length in bp, GC content in %, Melting temperature of the duplex in °C, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Length is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Length, GC content and Melting temperature of the duplex are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Sequence to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Sequence, Alphabet and Base pairs per line and the number you are missing is Length and GC content.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/enzyme-specific-activity-yield">Enzyme Kinetics: Specific Activity and Yield Calculator</a>, <a href="/biology/enzyme-unit-converter">Enzyme Unit Converter (U/mg, kcat) Calculator</a> and <a href="/biology/exponential-population-growth">Exponential Population Growth Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Reverse Complement calculator work out?', 'a' => 'Length, GC content and Melting temperature of the duplex.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Sequence, Alphabet, Base pairs per line. With sequence, alphabet and width in place, Length can stay blank and the page will work it out.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Length is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'Every box has to have a number in it. What this page returns is Length, so an empty input simply leaves the result blank rather than choosing a new unknown.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Length keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/enzyme-specific-activity-yield', 'name' => 'Enzyme Kinetics: Specific Activity and Yield Calculator'],
            ['path' => '/biology/enzyme-unit-converter', 'name' => 'Enzyme Unit Converter (U/mg, kcat) Calculator'],
            ['path' => '/biology/exponential-population-growth', 'name' => 'Exponential Population Growth Calculator'],
        ],
        'authors' => [],
    ],
];
