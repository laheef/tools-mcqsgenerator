<?php

/**
 * DNA Pattern Finder
 * /biology/dna-pattern-finder
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DNA Pattern Finder',
    'meta' => ['title' => 'DNA Pattern Finder Calculator — Formula & Results', 'description' => <<<'TXT'
    DNA Pattern Finder turns Sequence, Pattern (IUPAC allowed) and Strand into Matches, forward strand and Matches, reverse strand. DNA Pattern Finder answers one…
    TXT, 'h1' => 'DNA Pattern Finder', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'sequence' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'TTTGAATTCTTGGATCCAAGCTTAAAGAATTCAAGCTTGATATCGAATTCCCC', 'c' => null],
                ],
            ],
            'pattern' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'GAATTC', 'c' => null],
                ],
            ],
            'strand' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'both-strands', 'c' => null],
                ],
                'ds' => 'ds-strand',
            ],
            'matches_fwd' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'matches_rev' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'spacing' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-dna-pattern-finder',
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
                                    'h' => 'Paste DNA; headers, spaces and digits are ignored',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'pattern',
                                    'l' => 'Pattern (IUPAC allowed)',
                                    'h' => 'N = any base, R = A/G, Y = C/T, W = A/T, S = G/C, K = G/T, M = A/C',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'strand',
                                    'l' => 'Strand',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-strand',
                                    'opts' => [
                                        ['both-strands', 'Both strands', 'both'],
                                        ['forward-only', 'Forward only', 'forward'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'matches_fwd',
                                    'l' => 'Matches, forward strand',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'matches_rev',
                                    'l' => 'Matches, reverse strand',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'total',
                                    'l' => 'Total sites',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'spacing',
                                    'l' => 'Average spacing',
                                    'h' => 'Blank when there is only one site',
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
        'datasets' => [
            'ds-strand' => [
                'name' => 'Strand',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'both-strands', 'label' => 'Both strands', 'value' => 'both'],
                    ['uid' => 'forward-only', 'label' => 'Forward only', 'value' => 'forward'],
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
        
          var IUPAC = {A:'A', C:'C', G:'G', T:'T', U:'T', R:'[AG]', Y:'[CT]', S:'[GC]', W:'[AT]',
                       K:'[GT]', M:'[AC]', B:'[CGT]', D:'[AGT]', H:'[ACT]', V:'[ACG]', N:'[ACGT]'};
          function patternToRegex(p) {
            var out = '';
            for (var i = 0; i < p.length; i++) {
              var c = p.charAt(i);
              if (!IUPAC[c]) return null;
              out += IUPAC[c];
            }
            return out;
          }
          function findAll(hay, re) {
            var g = new RegExp(re, 'g'), hits = [], m;
            while ((m = g.exec(hay)) !== null) {
              hits.push(m.index + 1);
              if (m.index === g.lastIndex) g.lastIndex++;
              if (hits.length > 5000) break;
            }
            return hits;
          }
          omni.onResult(['sequence', 'pattern', 'strand'], function (ctx) {
            var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
            var raw = String(ctx.getRawInput('pattern') || '').replace(/[^A-Za-z]/g, '').toUpperCase()
              .replace(/U/g, 'T');
            if (!seq) {
              ctx.addHtml(block('Pattern search', '—', 'Paste a sequence to search.'));
              return;
            }
            if (!raw) {
              ctx.addHtml(block('Pattern search', '—', 'Type the motif to look for, for example GAATTC.'));
              return;
            }
            var re = patternToRegex(raw);
            if (!re) {
              ctx.addHtml(block('Pattern search', 'Not a valid pattern',
                'Use only A, C, G, T and the IUPAC codes R Y S W K M B D H V N.'));
              return;
            }
            var fwd = findAll(seq, re);
            var rev = [];
            if (!/forward-only/i.test(String(ctx.getRawInput('strand') || ''))) {
              var rc = revcomp(seq);
              findAll(rc, re).forEach(function (p) {
                var start = seq.length - (p - 1) - raw.length + 1;
                if (fwd.indexOf(start) < 0) rev.push(start);
              });
            }
            var all = fwd.concat(rev).sort(function (a, b) { return a - b; });
            ctx.exportValue('matches_fwd', fwd.length);
            ctx.exportValue('matches_rev', rev.length);
            ctx.exportValue('total', all.length);
            if (all.length > 1 && all[all.length - 1] > all[0]) {
              ctx.exportValue('spacing', Math.round((all[all.length - 1] - all[0]) / (all.length - 1)));
            } else {
              ctx.exportValue('spacing', '');
            }
        
            ctx.addHtml(block('Pattern found',
              all.length + ' site' + (all.length === 1 ? '' : 's') + ' for ' + raw
              + (rev.length ? ' (' + fwd.length + ' forward, ' + rev.length + ' reverse)' : '')
              + ' in ' + seq.length + ' bp\n'
              + (all.length ? 'Positions: ' + all.slice(0, 60).join(', ') + (all.length > 60 ? ' …' : '') : '—'),
              all.length ? 'Positions are 1-based on the forward strand.' : 'No site found.'));
            if (all.length) {
              var rows = all.slice(0, 30).map(function (p) {
                var ctxs = seq.substr(Math.max(0, p - 6), raw.length + 10);
                return [String(p), p + raw.length - 1 > seq.length ? '—' : String(p + raw.length - 1),
                        (fwd.indexOf(p) >= 0 ? 'forward' : 'reverse'), ctxs];
              });
              ctx.addHtml(table('First sites', ['Start', 'End', 'Strand', 'Context ±5 bp'], rows));
            }
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        DNA Pattern Finder turns Sequence, Pattern (IUPAC allowed) and Strand into Matches, forward strand and Matches, reverse strand. Nothing is looked up on this page: Matches, forward strand is computed from Sequence and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the DNA Pattern Finder calculator works', 'html' => <<<'TXT'
            <p>DNA Pattern Finder answers one question from 3 numbers, and the answer is Matches, forward strand, Matches, reverse strand and Total sites.</p><p>The answers are Matches, forward strand, Matches, reverse strand, Total sites and Average spacing; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Sequence</strong> — a plain number, no unit. Paste DNA; headers, spaces and digits are ignored</li><li><strong>Pattern (IUPAC allowed)</strong> — a plain number, no unit. N = any base, R = A/G, Y = C/T, W = A/T, S = G/C, K = G/T, M = A/C</li><li><strong>Strand</strong> — a plain number, no unit</li></ul><p>What you get back is Matches, forward strand, Matches, reverse strand, Total sites, Average spacing in bp, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Matches, forward strand takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Matches, forward strand, Matches, reverse strand and Total sites are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Sequence to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Sequence, Pattern (IUPAC allowed) and Strand measured, Matches, forward strand and Matches, reverse strand wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/goat-years-to-human-years">Goat Years to Human Years Calculator</a>, <a href="/biology/goldfish-years-to-human-years">Goldfish Years to Human Years Calculator</a> and <a href="/biology/ghk-membrane-potential">Goldman–Hodgkin–Katz Membrane Potential Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which values do I need before I start?', 'a' => 'Sequence, Pattern (IUPAC allowed), Strand. With sequence, pattern and strand in place, Matches, forward strand can stay blank and the page will work it out.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Matches, forward strand is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Matches, forward strand, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Matches, forward strand at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/goat-years-to-human-years', 'name' => 'Goat Years to Human Years Calculator'],
            ['path' => '/biology/goldfish-years-to-human-years', 'name' => 'Goldfish Years to Human Years Calculator'],
            ['path' => '/biology/ghk-membrane-potential', 'name' => 'Goldman–Hodgkin–Katz Membrane Potential Calculator'],
        ],
        'authors' => [],
    ],
];
