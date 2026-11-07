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
    'meta' => ['title' => 'DNA Pattern Finder Calculator — Formula & Results', 'description' => 'Search a DNA sequence for a motif written in IUPAC code and get every position on both strands. It returns matches, forward strand, matches, reverse strand…', 'h1' => 'DNA Pattern Finder', 'updated' => '2026-10-29'],
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
        Search a DNA sequence for a motif written in IUPAC code and get every position on both strands. It returns matches, forward strand, matches, reverse strand, total sites and average spacing, and the panel shows all of them at once.
        
        It is the quickest way to count a regulatory element or check whether a cloning site is unique.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the DNA Pattern Finder', 'html' => <<<'TXT'
            <p>A pattern of length k has N − k + 1 possible start positions. Each IUPAC letter is expanded to the set of bases it stands for</p>
            <figure class="calc-figure"><img src="/uploads/biology/dna-pattern-finder.svg" width="720" height="300" loading="lazy" alt="Animated diagram: DNA Pattern Finder — Start positions a pattern can have" title="DNA Pattern Finder"><figcaption>Start positions a pattern can have</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>N</code></td><td>sequence length</td><td>bp</td></tr><tr><td><code>k</code></td><td>pattern length</td><td>bp</td></tr><tr><td><code>IUPAC</code></td><td>the standard degenerate base alphabet</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the DNA Pattern Finder?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1 site</td><td><strong>Unique</strong></td><td>usable as a single-cutter cloning site</td></tr><tr><td>2 – 5 sites</td><td><strong>A few</strong></td><td>check fragment sizes before digesting</td></tr><tr><td>more than 5</td><td><strong>Frequent</strong></td><td>poor choice for a unique site</td></tr></tbody></table>
            <ul><li><p>Positions are 1-based and count from the first base of the pasted sequence, on the strand as written. Reverse-strand hits are reported at the position of the equivalent forward site so the two lists line up.</p></li><li><p>Palindromic patterns (GAATTC, most type II restriction sites) match both strands at the same coordinates and are therefore counted once, not twice.</p></li><li><p>Overlapping matches are counted, which matters for repeats such as ATATAT.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Forgetting that a reverse-strand hit means the motif is on the other strand — the protein or enzyme still binds there.</li><li>Typing a pattern with a space or a digit in it; both are stripped, which can silently change the motif.</li><li>Assuming a unique site is unique in the whole plasmid when only an insert was pasted.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does N mean in a DNA pattern?', 'a' => 'Any base. It is the IUPAC wildcard, so NNNN finds any four bases.'],
            ['q' => 'How do I find a restriction site?', 'a' => 'Type the recognition sequence, e.g. GAATTC for EcoRI or AAGCTT for HindIII, and search both strands.'],
            ['q' => 'Does the search handle overlapping matches?', 'a' => 'Yes — ATATAT contains ATATAT twice in an ATATATAT run, and both are reported.'],
            ['q' => 'What does the DNA Pattern Finder actually calculate?', 'a' => <<<'TXT'
            It returns matches, forward strand, matches, reverse strand, total sites and average spacing. Each one is derived by the formula on this page, so you can check any figure by hand.
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
