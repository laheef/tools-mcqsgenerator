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
    'meta' => ['title' => 'CpG Island Finder Calculator — Formula & Results', 'description' => 'A CpG island finder scans a sequence for windows that are GC-rich and CpG-dense against expectation. It returns gc content of the sequence, cpg dinucleotides…', 'h1' => 'CpG Island Finder', 'updated' => '2026-10-29'],
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
        A CpG island finder scans a sequence for windows that are GC-rich and CpG-dense against expectation. It returns gc content of the sequence, cpg dinucleotides observed, observed / expected cpg, cpg islands found and longest island, and the panel shows all of them at once.
        
        By the classic definition an island is 200 bp or more with GC ≥ 50% and observed over expected CpG ≥ 0.6.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the CpG Island Finder', 'html' => <<<'TXT'
            <p>Expected CpG = (C count × G count) ÷ N. Observed/expected = CpG observed ÷ expected. An island needs GC ≥ 50%, O/E ≥ 0.6 across a window of 200 bp</p>
            <figure class="calc-figure"><img src="/uploads/biology/cpg-island-finder.svg" width="720" height="300" loading="lazy" alt="Animated diagram: CpG Island Finder — CpG observed / expected" title="CpG Island Finder"><figcaption>CpG observed / expected</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>CpG</code></td><td>a cytosine followed by a guanine on the same strand</td><td>—</td></tr><tr><td><code>O/E</code></td><td>observed divided by expected CpG count</td><td>—</td></tr><tr><td><code>N</code></td><td>number of bases examined</td><td>bp</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the CpG Island Finder?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: window of <strong>200</strong> bp, minimum gc in the window of <strong>50</strong>%, minimum observed/expected cpg of <strong>0.6</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>O/E &gt; 1.0</td><td><strong>CpG-rich</strong></td><td>unusual outside promoters and repeats</td></tr><tr><td>O/E 0.6 – 1.0</td><td><strong>Candidate island</strong></td><td>island criteria met if GC is also ≥ 50%</td></tr><tr><td>O/E &lt; 0.6</td><td><strong>Depleted</strong></td><td>the normal state of vertebrate DNA, where CpG is methylated and mutates to TpG</td></tr></tbody></table>
            <ul><li><p>About 70–80% of human gene promoters sit in a CpG island, which is why a predicted island is used as a first pass at finding promoters in an unknown sequence.</p></li><li><p>Vertebrate genomes are CpG-depleted overall (O/E near 0.25) because methylated cytosine deaminates to thymine. Islands stay unmethylated and therefore keep their CpGs.</p></li><li><p>Methylation of an island silences the gene beneath it — the mechanism behind X inactivation and many tumour suppressors.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Running the finder on a sequence shorter than the window: every window then fails and the answer looks like 'no islands' rather than 'sequence too short'.</li><li>Treating a predicted island as a proven promoter — it is a hypothesis that needs a transcription start site or a ChIP signal.</li><li>Forgetting that GC-rich repeats also score as islands.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What defines a CpG island?', 'a' => 'Historically 200 bp or more with GC ≥ 50% and observed over expected CpG ≥ 0.6. Modern genome annotations use slightly relaxed thresholds.'],
            ['q' => 'How many CpG islands does a human genome have?', 'a' => 'About 28 000, roughly one per gene, plus many in repeats.'],
            ['q' => 'Why is CpG depleted in vertebrates?', 'a' => 'Cytosine in a CpG is methylated, and methylcytosine deaminates to thymine, so CG slowly mutates away to TG.'],
            ['q' => 'What does the CpG Island Finder actually calculate?', 'a' => <<<'TXT'
            It returns gc content of the sequence, cpg dinucleotides observed, observed / expected cpg, cpg islands found and longest island. Each one is derived by the formula on this page, so you can check any figure by hand.
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
