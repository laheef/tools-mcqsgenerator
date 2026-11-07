<?php

/**
 * PCR Primer Stats Calculator
 * /biology/pcr-primer-stats
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PCR Primer Stats Calculator',
    'meta' => ['title' => 'PCR Primer Stats Calculator — Formula & Results', 'description' => 'A primer pair is worth checking on eight counts before you order it. It returns forward length, forward gc, forward tm, reverse length, reverse gc, reverse…', 'h1' => 'PCR Primer Stats Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'forward' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ATGGCCATTGTAATGGGCCG', 'c' => null],
                ],
            ],
            'reverse' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'CTATCGGGCACCCTTTCAG', 'c' => null],
                ],
            ],
            'fwd_len' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fwd_gc' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fwd_tm' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rev_len' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rev_gc' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rev_tm' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'ta' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'dtm' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'dimer' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-pcr-primer-stats',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'forward',
                                    'l' => 'Forward primer (5′→3′)',
                                    'h' => 'Paste the primer',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'reverse',
                                    'l' => 'Reverse primer (5′→3′)',
                                    'h' => 'Paste the primer as ordered',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'fwd_len',
                                    'l' => 'Forward length',
                                    'suf' => 'nt',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'fwd_gc',
                                    'l' => 'Forward GC',
                                    'suf' => '%',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'fwd_tm',
                                    'l' => 'Forward Tm',
                                    'h' => 'Wallace under 14 nt, GC rule to 40 nt, then the long form',
                                    'suf' => '°C',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'rev_len',
                                    'l' => 'Reverse length',
                                    'suf' => 'nt',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'rev_gc',
                                    'l' => 'Reverse GC',
                                    'suf' => '%',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'rev_tm',
                                    'l' => 'Reverse Tm',
                                    'suf' => '°C',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'ta',
                                    'l' => 'Suggested annealing temperature',
                                    'h' => 'About the lower primer Tm minus 5',
                                    'suf' => '°C',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'dtm',
                                    'l' => 'Difference in Tm',
                                    'h' => 'Under 5 °C is the usual target',
                                    'suf' => '°C',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'dimer',
                                    'l' => 'Longest 3′ complementary run',
                                    'h' => '3 or more risks primer dimers',
                                    'suf' => 'bases',
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
        
          function primerStats(p) {
            var n = p.length, gc = gcOf(p), at = n - gc;
            return {n: n, gc: gc, pct: n ? gc / n * 100 : 0, tm: n ? tmOf(n, n ? gc / n * 100 : 0, at, gc) : 0,
                    clamp: /[GC]$/.test(p)};
          }
          function maxComplementaryRun(a, b) {
            // Longest stretch where a[i..] pairs with the reverse of b[..]. The search is
            // quadratic, so it is capped: nothing legitimate is longer than an oligo, and
            // an uncapped loop lets a pasted 20 kb sequence freeze the page.
            a = a.slice(0, 80); b = b.slice(0, 80);
            var best = 0;
            for (var i = 0; i < a.length; i++) {
              for (var j = 0; j < b.length; j++) {
                var k = 0;
                while (i + k < a.length && j - k >= 0 && (COMP[a.charAt(i + k)] === b.charAt(j - k))) k++;
                if (k > best) best = k;
              }
            }
            return best;
          }
          function tailRun(a, b) {
            // longest run that involves the 3' end of either primer
            var best = 0;
            for (var k = 1; k <= Math.min(a.length, b.length); k++) {
              if (COMP[a.charAt(a.length - 1 - (k - 1))] === b.charAt(b.length - k)) best = k; else break;
            }
            var best2 = 0;
            for (var k2 = 1; k2 <= Math.min(a.length, b.length); k2++) {
              if (COMP[b.charAt(b.length - 1 - (k2 - 1))] === a.charAt(a.length - k2)) best2 = k2; else break;
            }
            return Math.max(best, best2);
          }
          function longestHomopolymer(s) {
            var best = 1, run = 1;
            for (var i = 1; i < s.length; i++) {
              if (s.charAt(i) === s.charAt(i - 1)) { run++; if (run > best) best = run; } else run = 1;
            }
            return s.length ? best : 0;
          }
          omni.onResult(['forward', 'reverse'], function (ctx) {
            var f = cleanSeq(ctx.getRawInput('forward'), 'dna');
            var r = cleanSeq(ctx.getRawInput('reverse'), 'dna');
            var tooLong = (f.length > 200 || r.length > 200);
            if (f.length > 200) f = f.slice(0, 200);
            if (r.length > 200) r = r.slice(0, 200);
            if (!f && !r) {
              ctx.addHtml(block('Primer stats', '—', 'Paste a forward or reverse primer, or both.'));
              return;
            }
            var sf = f ? primerStats(f) : null;
            var sr = r ? primerStats(r) : null;
        
            if (sf) {
              ctx.exportValue('fwd_len', sf.n);
              ctx.exportValue('fwd_gc', Math.round(sf.pct * 10) / 10);
              ctx.exportValue('fwd_tm', Math.round(sf.tm * 10) / 10);
            }
            if (sr) {
              ctx.exportValue('rev_len', sr.n);
              ctx.exportValue('rev_gc', Math.round(sr.pct * 10) / 10);
              ctx.exportValue('rev_tm', Math.round(sr.tm * 10) / 10);
            }
            if (sf && sr) {
              var lower = Math.min(sf.tm, sr.tm);
              var dtm = Math.abs(sf.tm - sr.tm);
              var dimer = Math.max(tailRun(f, r), tailRun(f, f), tailRun(r, r));
              ctx.exportValue('ta', Math.round((lower - 5) * 10) / 10);
              ctx.exportValue('dtm', Math.round(dtm * 10) / 10);
              ctx.exportValue('dimer', dimer);
            }
        
            var rows = [];
            if (sf) rows.push(['Forward', f, String(sf.n), pct1(sf.pct) + '%', pct1(sf.tm),
                               sf.clamp ? 'yes' : 'no', String(longestHomopolymer(f)),
                               String(maxComplementaryRun(f, f))]);
            if (sr) rows.push(['Reverse', r, String(sr.n), pct1(sr.pct) + '%', pct1(sr.tm),
                               sr.clamp ? 'yes' : 'no', String(longestHomopolymer(r)),
                               String(maxComplementaryRun(r, r))]);
            ctx.addHtml(table('Primer by primer',
              ['Primer', 'Sequence', 'Length', 'GC', 'Tm', 'GC clamp', 'Longest run', 'Self-complement'],
              rows, 'Tm uses the length-appropriate approximation at 50 mM Na⁺.'));
        
            if (tooLong) {
              ctx.addHtml(block('That is not a primer',
                'A primer longer than 200 nt is not something a synthesiser will make, so only the first '
                + '200 bases were analysed. Paste a single primer of 18–30 nt for a meaningful answer.'));
            }
            if (sf && sr) {
              var warn = [];
              if (Math.abs(sf.tm - sr.tm) > 5) warn.push('the two Tm values differ by more than 5 °C');
              if (tailRun(f, r) >= 3) warn.push('the 3′ ends can pair, which risks primer dimers');
              if (longestHomopolymer(f) >= 5 || longestHomopolymer(r) >= 5) warn.push('a homopolymer run of 5 or more invites slippage');
              if (Math.abs(f.length - r.length) > 6) warn.push('the primers are very different in length');
              ctx.addHtml(block('Pair check',
                'Annealing temperature about ' + pct1(Math.min(sf.tm, sr.tm) - 5) + ' °C'
                + '\nTm difference ' + pct1(Math.abs(sf.tm - sr.tm)) + ' °C'
                + '\n3′ complementary run ' + tailRun(f, r) + ' base' + (tailRun(f, r) === 1 ? '' : 's'),
                warn.length ? 'Watch: ' + warn.join('; ') + '.' : 'No obvious pairing or balance problems.'));
            }
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        A primer pair is worth checking on eight counts before you order it. It returns forward length, forward gc, forward tm, reverse length, reverse gc, reverse tm, suggested annealing temperature, difference in tm and longest 3′ complementary run, and the panel shows all of them at once.
        
        A pair that differs by more than 5 °C, or that can dimerise at its 3′ end, will amplify badly no matter how good the polymerase is.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the PCR Primer Stats', 'html' => <<<'TXT'
            <p>Tm = 2(A+T) + 4(G+C) up to 14 nt; 64.9 + 41(G+C − 16.4)/N from 15 to 40 nt; 81.5 + 16.6·log₁₀[Na⁺] + 0.41(GC%) − 675/N above 40 nt. Ta ≈ Tm(lower) − 5</p>
            <figure class="calc-figure"><img src="/uploads/biology/pcr-primer-stats.svg" width="720" height="300" loading="lazy" alt="Animated diagram: PCR Primer Stats Calculator — Melting temperature by primer length (°C)" title="PCR Primer Stats Calculator"><figcaption>Melting temperature by primer length (°C)</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>Tm</code></td><td>melting temperature of the primer-template duplex</td><td>°C</td></tr><tr><td><code>Ta</code></td><td>annealing temperature for the PCR programme</td><td>°C</td></tr><tr><td><code>GC clamp</code></td><td>a G or C at the 3′ end</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the PCR Primer Stats?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>18 – 22 nt</td><td><strong>Ideal length</strong></td><td>specific and cheap to synthesise</td></tr><tr><td>40 – 60%</td><td><strong>Ideal GC</strong></td><td>balanced stability</td></tr><tr><td>difference over 5 °C</td><td><strong>Mismatched pair</strong></td><td>the cooler primer sets the annealing temperature</td></tr><tr><td>3′ run of 4+</td><td><strong>Dimer risk</strong></td><td>primers will amplify each other instead of the target</td></tr></tbody></table>
            <ul><li><p>The annealing temperature is set by the less stable primer, so a big Tm difference wastes the better one. Aim for a pair within 2–5 °C.</p></li><li><p>Complementarity at the 3′ end is the dangerous kind: a polymerase will extend from it, so even two or three paired bases there produce primer dimers.</p></li><li><p>These Tm values are length-banded approximations. For a critical assay use a nearest-neighbour calculation with your real salt and primer concentrations.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Entering the reverse primer as it appears in the template rather than as it is ordered (the order is the reverse complement).</li><li>Choosing a primer with a 3′ T — it is a poor clamp and misprimes more often.</li><li>Running all 40 cycles at the Tm of the higher primer, which lets the lower one misprime.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a good Tm difference for a primer pair?', 'a' => 'Under 5 °C, ideally 2–3 °C.'],
            ['q' => 'How long should a primer be?', 'a' => '18–22 nt for routine PCR; longer for high GC or for adding restriction tails.'],
            ['q' => 'Why is my primer dimerising?', 'a' => 'Complementary 3′ ends, or a long self-complementary run. Check the 3′ complementary run in the table above.'],
            ['q' => 'What does the PCR Primer Stats actually calculate?', 'a' => <<<'TXT'
            It returns forward length, forward gc, forward tm, reverse length, reverse gc, reverse tm, suggested annealing temperature, difference in tm and longest 3′ complementary run. Each one is derived by the formula on this page, so you can check any figure by hand.
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
