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
    'meta' => ['title' => 'PCR Primer Stats Calculator — Formula & Results', 'description' => <<<'TXT'
    PCR Primer Stats turns Forward primer (5′→3′) and Reverse primer (5′→3′) into Forward length and Forward GC. The arithmetic is the whole method: Forward…
    TXT, 'h1' => 'PCR Primer Stats Calculator', 'updated' => '2026-10-29'],
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
        PCR Primer Stats turns Forward primer (5′→3′) and Reverse primer (5′→3′) into Forward length and Forward GC. The arithmetic is the whole method: Forward length is worked out from Forward primer (5′→3′) by one formula, applied once. Forward length comes back in nt unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the PCR Primer Stats calculator works', 'html' => <<<'TXT'
            <p>PCR Primer Stats answers one question from 2 numbers, and the answer is Forward length, Forward GC and Forward Tm.</p><p>What comes back is Forward length, Forward GC, Forward Tm and Reverse length — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Forward primer (5′→3′)</strong> — a plain number, no unit. Paste the primer</li><li><strong>Reverse primer (5′→3′)</strong> — a plain number, no unit. Paste the primer as ordered</li></ul><p>The result boxes are Forward length in nt, Forward GC in %, Forward Tm in °C, Reverse length in nt, Reverse GC in %, Reverse Tm in °C, Suggested annealing temperature in °C, Difference in Tm in °C, Longest 3′ complementary run in bases; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Forward length takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Forward length, Forward GC and Forward Tm are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Forward primer (5′→3′) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Forward primer (5′→3′) and Reverse primer (5′→3′) measured, Forward length and Forward GC wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/cephalic-index">Cephalic Index Calculator</a>, <a href="/biology/cfu-g-calculator">CFU/g Calculator</a> and <a href="/biology/cfu-ml-calculator">CFU/mL Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which values do I need before I start?', 'a' => 'Forward primer (5′→3′), Reverse primer (5′→3′). With forward and reverse in place, Forward length can stay blank and the page will work it out.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Forward length is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Forward length, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Forward length keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cephalic-index', 'name' => 'Cephalic Index Calculator'],
            ['path' => '/biology/cfu-g-calculator', 'name' => 'CFU/g Calculator'],
            ['path' => '/biology/cfu-ml-calculator', 'name' => 'CFU/mL Calculator'],
        ],
        'authors' => [],
    ],
];
