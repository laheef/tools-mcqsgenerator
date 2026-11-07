<?php

/**
 * CpG Island Finder
 * /biology/cpg-island-finder
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CpG Island Finder',
    'meta' => ['title' => 'CpG Island Finder Calculator — Formula & Results', 'description' => 'Enter Sequence, Window and Minimum GC in the window into CpG Island Finder and the answer comes back as GC content of the sequence and CpG dinucleotides…', 'h1' => 'CpG Island Finder', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'sequence' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGCGCGCGCGGCCGCGGATCGCGATCGCCGCG', 'c' => null],
                ],
            ],
            'window' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '200', 'c' => null],
                ],
            ],
            'gc_min' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '50', 'c' => null],
                ],
            ],
            'oe_min' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '0.6', 'c' => null],
                ],
            ],
            'gc_pct' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'cpg_obs' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'cpg_oe' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'islands' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'longest' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-cpg-island-finder',
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
                                    'h' => 'Paste DNA; 200 bp or more gives a meaningful answer',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'window',
                                    'l' => 'Window',
                                    'h' => 'Gardiner-Garden uses 200 bp',
                                    'suf' => 'bp',
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gc_min',
                                    'l' => 'Minimum GC in the window',
                                    'suf' => '%',
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'oe_min',
                                    'l' => 'Minimum observed/expected CpG',
                                    'h' => '0.6 is the classical cut-off',
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gc_pct',
                                    'l' => 'GC content of the sequence',
                                    'suf' => '%',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'cpg_obs',
                                    'l' => 'CpG dinucleotides observed',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'cpg_oe',
                                    'l' => 'Observed / expected CpG',
                                    'h' => 'Below 0.6 suggests the CG has been methylated and lost',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'islands',
                                    'l' => 'CpG islands found',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'longest',
                                    'l' => 'Longest island',
                                    'suf' => 'bp',
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
        
          function oecpg(s) {
            var n = s.length, c = 0, g = 0, cpg = 0;
            for (var i = 0; i < n; i++) {
              var ch = s.charAt(i);
              if (ch === 'C') { c++; if (s.charAt(i + 1) === 'G') cpg++; }
              else if (ch === 'G') g++;
            }
            return {n: n, c: c, g: g, cpg: cpg, oe: (c && g) ? cpg / ((c * g) / n) : 0};
          }
          omni.onResult(['sequence', 'window', 'gc_min', 'oe_min'], function (ctx) {
            var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
            var w = Math.max(20, Math.min(5000, Number(ctx.getRawInput('window')) || 200));
            var gcMin = Number(ctx.getRawInput('gc_min')); if (!isFinite(gcMin)) gcMin = 50;
            var oeMin = Number(ctx.getRawInput('oe_min')); if (!isFinite(oeMin)) oeMin = 0.6;
        
            if (seq.length < 20) {
              ctx.addHtml(block('CpG islands', '—', 'Paste at least a few hundred bases to scan.'));
              return;
            }
            var whole = oecpg(seq);
            ctx.exportValue('gc_pct', Math.round(gcOf(seq) / seq.length * 1000) / 10);
            ctx.exportValue('cpg_obs', whole.cpg);
            ctx.exportValue('cpg_oe', Math.round(whole.oe * 100) / 100);
        
            // slide a window, keep every window that passes, then merge overlaps
            var step = Math.max(1, Math.floor(seq.length / 4000));
            var hits = [];
            for (var i = 0; i + w <= seq.length; i += step) {
              var win = seq.substr(i, w);
              var gc = gcOf(win) / w * 100;
              if (gc < gcMin) continue;
              var o = oecpg(win);
              if (o.oe >= oeMin) hits.push({s: i, e: i + w, gc: gc, oe: o.oe});
            }
            var merged = [];
            hits.forEach(function (h) {
              var last = merged[merged.length - 1];
              if (last && h.s <= last.e) {
                last.e = Math.max(last.e, h.e);
                last.gc = Math.max(last.gc, h.gc);
                last.oe = Math.max(last.oe, h.oe);
              } else merged.push({s: h.s, e: h.e, gc: h.gc, oe: h.oe});
            });
            var longest = 0;
            merged.forEach(function (m) { longest = Math.max(longest, m.e - m.s); });
            ctx.exportValue('islands', merged.length);
            ctx.exportValue('longest', longest);
        
            if (!merged.length) {
              ctx.addHtml(block('CpG islands', 'No island found',
                'GC ' + pct1(gcOf(seq) / seq.length * 100) + '% over ' + seq.length + ' bp · O/E '
                + pct2(whole.oe) + '. Lower the thresholds if you expect a weak island, or paste a longer '
                + 'region — a window of ' + w + ' bp needs at least that much sequence.'));
              return;
            }
            ctx.addHtml(table('Islands found',
              ['From', 'To', 'Length', 'GC', 'CpG O/E', 'Sequence'],
              merged.map(function (m) {
                var sub = seq.substring(m.s, m.e);
                return [(m.s + 1) + ' bp', m.e + ' bp', (m.e - m.s) + ' bp', pct1(m.gc) + '%',
                        m.oe.toFixed(2), sub.length > 40 ? sub.slice(0, 37) + '…' : sub];
              }),
              'Coordinates are 1-based on the pasted sequence. ' + merged.length + ' island'
              + (merged.length > 1 ? 's' : '') + ', longest ' + longest + ' bp.'));
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Sequence, Window and Minimum GC in the window into CpG Island Finder and the answer comes back as GC content of the sequence and CpG dinucleotides observed. Nothing is looked up on this page: GC content of the sequence is computed from Sequence and the other boxes, so an unusual pair of values gives an honest answer rather than an error. GC content of the sequence is opened in %; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the CpG Island Finder calculator works', 'html' => <<<'TXT'
            <p>CpG Island Finder answers one question from 4 numbers, and the answer is GC content of the sequence, CpG dinucleotides observed and Observed / expected CpG.</p><p>The answers are GC content of the sequence, CpG dinucleotides observed, Observed / expected CpG and CpG islands found; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Sequence</strong> — a plain number, no unit. Paste DNA; 200 bp or more gives a meaningful answer</li><li><strong>Window</strong> — in bp. Gardiner-Garden uses 200 bp</li><li><strong>Minimum GC in the window</strong> — in %</li><li><strong>Minimum observed/expected CpG</strong> — a plain number, no unit. 0.6 is the classical cut-off</li></ul><p>The answers come back as GC content of the sequence in %, CpG dinucleotides observed, Observed / expected CpG, CpG islands found, Longest island in bp. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as GC content of the sequence is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> GC content of the sequence, CpG dinucleotides observed and Observed / expected CpG are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Sequence to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Sequence, Window and Minimum GC in the window and the number you are missing is GC content of the sequence and CpG dinucleotides observed.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/enzyme-specific-activity-yield">Enzyme Kinetics: Specific Activity and Yield Calculator</a>, <a href="/biology/enzyme-unit-converter">Enzyme Unit Converter (U/mg, kcat) Calculator</a> and <a href="/biology/exponential-population-growth">Exponential Population Growth Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the CpG Island Finder calculator work out?', 'a' => 'GC content of the sequence, CpG dinucleotides observed, Observed / expected CpG and CpG islands found.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Sequence, Window (bp), Minimum GC in the window (%), Minimum observed/expected CpG. With sequence, window and gc_min in place, GC content of the sequence can stay blank and the page will work it out.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of GC content of the sequence is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is GC content of the sequence, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. GC content of the sequence keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/enzyme-specific-activity-yield', 'name' => 'Enzyme Kinetics: Specific Activity and Yield Calculator'],
            ['path' => '/biology/enzyme-unit-converter', 'name' => 'Enzyme Unit Converter (U/mg, kcat) Calculator'],
            ['path' => '/biology/exponential-population-growth', 'name' => 'Exponential Population Growth Calculator'],
        ],
        'authors' => [],
    ],
];
