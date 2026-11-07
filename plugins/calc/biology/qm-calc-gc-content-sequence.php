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
    'meta' => ['title' => 'GC Content from a Sequence — Sliding Window', 'description' => 'GC Content from a Sequence works out Length and G + C bases from Sequence and Window size. There is no hidden constant here: change Length and Sequence moves…', 'h1' => 'GC Content from a Sequence', 'updated' => '2026-10-29'],
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
        GC Content from a Sequence works out Length and G + C bases from Sequence and Window size. There is no hidden constant here: change Length and Sequence moves with it. The main result, Length, is reported in bp.
        TXT,
        'sections' => [
            ['title' => 'How the GC Content from a Sequence calculator works', 'html' => <<<'TXT'
            <p>The GC Content from a Sequence calculator applies one relationship to 2 numbers and reports Length, G + C bases and GC content.</p><p>What comes back is Length, G + C bases, GC content and AT content — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Sequence</strong> — a plain number, no unit. Paste DNA or RNA</li><li><strong>Window size</strong> — in bp. GC is computed in windows of this length</li></ul><p>The answers come back as Length in bp, G + C bases, GC content in %, AT content in %, Melting temperature of the duplex in °C. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Length is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Length, G + C bases and GC content are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> If Sequence is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Sequence and Window size and the number you are missing is Length and G + C bases.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/chicken-years-to-human-years">Chicken Years to Human Years Calculator</a>, <a href="/biology/coding-capacity-of-dna">Coding Capacity of DNA Calculator</a> and <a href="/biology/codon-adaptation-index">Codon Adaptation Index Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the GC Content from a Sequence calculator work out?', 'a' => 'Length, G + C bases, GC content and AT content.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Sequence, Window size (bp). Enter sequence and window; Length is the box to leave alone unless it is the value you came for.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Length is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'Every box has to have a number in it. What this page returns is Length, so an empty input simply leaves the result blank rather than choosing a new unknown.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Length keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/chicken-years-to-human-years', 'name' => 'Chicken Years to Human Years Calculator'],
            ['path' => '/biology/coding-capacity-of-dna', 'name' => 'Coding Capacity of DNA Calculator'],
            ['path' => '/biology/codon-adaptation-index', 'name' => 'Codon Adaptation Index Calculator'],
        ],
        'authors' => [],
    ],
];
