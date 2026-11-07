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
    'meta' => ['title' => 'Reverse Complement Calculator — Formula & Results', 'description' => <<<'TXT'
    The reverse complement is the other strand of a DNA molecule written 5′ to 3′: read the sequence backwards and swap every base for its partner (A↔T, G↔C).
    TXT, 'h1' => 'Reverse Complement Calculator', 'updated' => '2026-10-29'],
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
        The reverse complement is the other strand of a DNA molecule written 5′ to 3′: read the sequence backwards and swap every base for its partner (A↔T, G↔C). It returns length, gc content and melting temperature of the duplex, and the panel shows all of them at once.
        
        It is the first step of primer design, of checking that a sequencing read maps to the strand you expect, and of turning a gene's coding sequence into the template you will actually order.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Reverse Complement', 'html' => <<<'TXT'
            <p>Reverse complement: read 3′→5′ and pair A·T, G·C. GC% = (G + C) ÷ length × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/reverse-complement.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Reverse Complement Calculator — Hydrogen bonds per base pair" title="Reverse Complement Calculator"><figcaption>Hydrogen bonds per base pair</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>5′</code></td><td>the end with a free phosphate</td><td>—</td></tr><tr><td><code>3′</code></td><td>the end with a free hydroxyl</td><td>—</td></tr><tr><td><code>revcomp</code></td><td>the opposite strand, written 5′→3′</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Reverse Complement?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>A ↔ T</td><td><strong>DNA pairing</strong></td><td>two hydrogen bonds</td></tr><tr><td>G ↔ C</td><td><strong>DNA pairing</strong></td><td>three hydrogen bonds, which is why GC-rich duplexes melt higher</td></tr><tr><td>A ↔ U</td><td><strong>RNA pairing</strong></td><td>RNA has uracil where DNA has thymine</td></tr></tbody></table>
            <ul><li><p>A reverse complement is not a palindrome: the reverse complement of ATGC is GCAT, and the reverse alone would be CGTA.</p></li><li><p>Ambiguity codes are handled properly — R (A or G) pairs with Y (C or T), S with S, W with W, K with M, B with V, D with H, and N with N.</p></li><li><p>The translation tools on this site take the reverse complement as input when you need the protein from the opposite strand.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Reversing without complementing (or the other way round) — both are common and both give a sequence that looks plausible.</li><li>Forgetting that a primer is written 5′→3′ and its template binding site is the reverse complement of the primer.</li><li>Pasting an alignment with gaps into a tool that does not strip them.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the reverse complement of ATGGCC?', 'a' => 'GGCCAT — read backwards (CCGGTA) and swap each base for its partner.'],
            ['q' => 'Why is the reverse complement used instead of the reverse?', 'a' => 'Because DNA is antiparallel: the other strand runs in the opposite direction, so its sequence must be both reversed and complemented to be written 5′→3′.'],
            ['q' => 'How do I get the protein from the opposite strand?', 'a' => 'Take the reverse complement, then translate it in frame 1.'],
            ['q' => 'What does the Reverse Complement actually calculate?', 'a' => 'It returns length, gc content and melting temperature of the duplex. Each one is derived by the formula on this page, so you can check any figure by hand.'],
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
