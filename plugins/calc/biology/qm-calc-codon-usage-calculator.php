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
    'meta' => ['title' => 'Codon Usage Calculator: Formula, Steps & Results', 'description' => 'Codon Usage turns Coding sequence and Reading frame into Complete codons and GC at the third position. The arithmetic is the whole method: Complete codons is…', 'h1' => 'Codon Usage Calculator', 'updated' => '2026-10-29'],
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
        Codon Usage turns Coding sequence and Reading frame into Complete codons and GC at the third position. The arithmetic is the whole method: Complete codons is worked out from Coding sequence by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Codon Usage calculator works', 'html' => <<<'TXT'
            <p>The Codon Usage calculator applies one relationship to 2 numbers and reports Complete codons, GC at the third position and Stop codons.</p><p>What comes back is Complete codons, GC at the third position, Stop codons and Different codons used — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Coding sequence</strong> — a plain number, no unit. Paste DNA; FASTA headers, spaces and digits are ignored</li><li><strong>Reading frame</strong> — a plain number, no unit. Frame 1 starts at the first base</li></ul><p>What you get back is Complete codons, GC at the third position in %, Stop codons, Different codons used in of 64, Rare codons, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Complete codons takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Complete codons, GC at the third position and Stop codons are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Coding sequence to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Coding sequence and Reading frame measured, Complete codons and GC at the third position wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/solids-retention-time">Solids Retention Time (SRT) Calculator</a>, <a href="/biology/solute-potential">Solute Potential Calculator</a> and <a href="/biology/species-richness">Species Richness Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Codon Usage calculator work out?', 'a' => 'Complete codons, GC at the third position, Stop codons and Different codons used.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Coding sequence, Reading frame. Enter sequence and frame; Complete codons is the box to leave alone unless it is the value you came for.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Complete codons is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Complete codons is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Complete codons keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/solids-retention-time', 'name' => 'Solids Retention Time (SRT) Calculator'],
            ['path' => '/biology/solute-potential', 'name' => 'Solute Potential Calculator'],
            ['path' => '/biology/species-richness', 'name' => 'Species Richness Calculator'],
        ],
        'authors' => [],
    ],
];
