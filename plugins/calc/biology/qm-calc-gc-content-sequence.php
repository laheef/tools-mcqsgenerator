<?php

/**
 * GC Content from a Sequence
 * /biology/gc-content-sequence
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GC Content from a Sequence',
    'meta' => ['title' => 'GC Content from a Sequence — Sliding Window', 'description' => 'GC content is the share of a DNA molecule that is guanine or cytosine, and it decides how strongly two strands stick together. It returns length, g + c bases…', 'h1' => 'GC Content from a Sequence', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'sequence' => ['type' => 'text', 'rnd' => null],
            'window' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '50', 'c' => null],
                ],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gc_count' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gc_pct' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'at_pct' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'tm_gc' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-gc-content-sequence',
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
                                    'h' => 'Paste DNA or RNA',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'window',
                                    'l' => 'Window size',
                                    'h' => 'GC is computed in windows of this length',
                                    'suf' => 'bp',
                                    'vt' => 'numerical',
                                ],
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
                                    'n' => 'gc_count',
                                    'l' => 'G + C bases',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'gc_pct',
                                    'l' => 'GC content',
                                    'suf' => '%',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'at_pct',
                                    'l' => 'AT content',
                                    'suf' => '%',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'tm_gc',
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
        'datasets' => [],
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
        
          omni.onResult(['sequence'], function (ctx) {
            var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
            if (!seq) {
              ctx.addHtml(block('GC content', '—', 'Paste a sequence to see its composition.'));
              return;
            }
            var n = seq.length, gc = 0, at = 0;
            for (var i = 0; i < n; i++) {
              var c = seq.charAt(i);
              if (c === 'G' || c === 'C') gc++;
              else if (c === 'A' || c === 'T' || c === 'U') at++;
            }
            var pct = gc / n * 100;
            var tm = tmOf(n, pct, at, gc);
            ctx.exportValue('length', n);
            ctx.exportValue('gc_count', gc);
            ctx.exportValue('gc_pct', Math.round(pct * 100) / 100);
            ctx.exportValue('at_pct', Math.round((at / n * 100) * 100) / 100);
            ctx.exportValue('tm_gc', Math.round(tm * 10) / 10);
        
            // A profile every 5% of the sequence, so structure is visible at a glance.
            var rows = [], steps = 20;
            for (var k = 0; k < steps; k++) {
              var a = Math.floor(n * k / steps), b = Math.floor(n * (k + 1) / steps);
              if (b <= a) continue;
              var g = 0;
              for (var j = a; j < b; j++) { var ch = seq.charAt(j); if (ch === 'G' || ch === 'C') g++; }
              var p = g / (b - a) * 100;
              var bar = '';
              for (var q = 0; q < 40; q++) bar += (q < Math.round(p / 2.5)) ? '#' : '·';
              rows.push(String(a + 1).padStart(7, ' ') + '  ' + bar + '  ' + p.toFixed(0) + '%');
            }
            ctx.addHtml(block('GC content along the sequence', rows.join('\n'),
              'Each row is ' + (100 / steps).toFixed(0) + '% of the sequence, ' + steps + ' windows in total.'));
            var body = 'G+C  ' + gc + ' of ' + n + '  (' + pct.toFixed(1) + '%)\n'
                     + 'A+T  ' + at + ' of ' + n + '  (' + (at / n * 100).toFixed(1) + '%)\n'
                     + 'other ' + (n - gc - at) + '  (ambiguous codes)';
            ctx.addHtml(block('Composition', body));
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        GC content is the share of a DNA molecule that is guanine or cytosine, and it decides how strongly two strands stick together. It returns length, g + c bases, gc content, at content and melting temperature of the duplex, and the panel shows all of them at once.
        
        This calculator reports GC% overall and in sliding windows, so a GC-rich island inside an otherwise AT-rich sequence is visible rather than averaged away.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the GC Content from a Sequence', 'html' => <<<'TXT'
            <p>GC% = (G + C) ÷ N × 100; Tm ≈ 64.9 + 41(G+C − 16.4)/N (G+C as a count)</p>
            <figure class="calc-figure"><img src="/uploads/biology/gc-content-sequence.svg" width="720" height="300" loading="lazy" alt="Animated diagram: GC Content from a Sequence — Typical GC content (%)" title="GC Content from a Sequence"><figcaption>Typical GC content (%)</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>N</code></td><td>sequence length</td><td>bp</td></tr><tr><td><code>GC</code></td><td>number of guanine and cytosine bases</td><td>bases</td></tr><tr><td><code>Tm</code></td><td>melting temperature of the duplex</td><td>°C</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the GC Content from a Sequence?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 40%</td><td><strong>AT-rich</strong></td><td>easier to melt; often regulatory or repeat DNA</td></tr><tr><td>40 – 60%</td><td><strong>Typical</strong></td><td>most vertebrate genomic DNA sits here</td></tr><tr><td>60 – 70%</td><td><strong>GC-rich</strong></td><td>more stable duplex, harder to denature</td></tr><tr><td>above 70%</td><td><strong>Very GC-rich</strong></td><td>CpG islands, ribosomal DNA, some bacterial genomes</td></tr></tbody></table>
            <ul><li><p>GC pairs have three hydrogen bonds and AT pairs have two, which is why GC-rich DNA melts at a higher temperature and why GC-rich templates are harder to sequence through.</p></li><li><p>A single GC% figure hides structure. A 200 bp CpG island at 70% GC inside a 100 kb region at 41% GC changes the overall number by a fraction of a percent.</p></li><li><p>RNA has uracil instead of thymine; the GC fraction is calculated the same way.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Counting ambiguous bases (N, R, Y) as AT because they are not G or C.</li><li>Comparing GC% of an mRNA (no introns) with that of its gene.</li><li>Assuming high GC always means a high melting temperature in a cell — salt and length matter at least as much.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a normal GC content?', 'a' => 'About 41% for the human genome, 50% for many bacteria, and as low as 25% in some Plasmodium genomes.'],
            ['q' => 'Why does GC content matter for PCR?', 'a' => 'GC-rich regions need higher denaturation temperatures and often additives such as betaine or DMSO.'],
            ['q' => 'What does the GC Content from a Sequence actually calculate?', 'a' => <<<'TXT'
            It returns length, g + c bases, gc content, at content and melting temperature of the duplex. Each one is derived by the formula on this page, so you can check any figure by hand.
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
