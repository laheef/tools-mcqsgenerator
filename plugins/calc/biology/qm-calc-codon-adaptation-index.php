<?php

/**
 * Codon Adaptation Index Calculator
 * /biology/codon-adaptation-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Codon Adaptation Index Calculator',
    'meta' => ['title' => 'Codon Adaptation Index Calculator — Formula & Results', 'description' => 'The codon adaptation index scores how well a coding sequence uses the codons its host prefers. It returns codon adaptation index, codons scored, rare codons…', 'h1' => 'Codon Adaptation Index Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'sequence' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ATGGCTAAAGGTGAAGAACTGTTCACTGGTGTTGTACCAATCTTAGTTGAACTGGATGGTGATGTTAACGGTCATAAATTT', 'c' => null],
                ],
            ],
            'host' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'e-coli-k-12', 'c' => null],
                ],
                'ds' => 'ds-host',
            ],
            'cai' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'codons' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rare' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gc3' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-codon-adaptation-index',
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
                                    'l' => 'Coding sequence (DNA)',
                                    'h' => 'Paste the open reading frame; the first codon is read as the start',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'host',
                                    'l' => 'Reference host',
                                    'h' => 'The codon usage table the weights come from',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-host',
                                    'opts' => [
                                        ['e-coli-k-12', 'E. coli K-12', 'ecoli'],
                                        ['human-homo-sapiens', 'Human (Homo sapiens)', 'human'],
                                        ['yeast-s-cerevisiae', 'Yeast (S. cerevisiae)', 'yeast'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'cai',
                                    'l' => 'Codon adaptation index',
                                    'h' => 'Geometric mean of the weights',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'codons',
                                    'l' => 'Codons scored',
                                    'h' => 'Met, Trp and stops are excluded',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'rare',
                                    'l' => 'Rare codons (w ≤ 0.2)',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gc3',
                                    'l' => 'GC at third position',
                                    'suf' => '%',
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
            'ds-host' => [
                'name' => 'Reference host',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'e-coli-k-12', 'label' => 'E. coli K-12', 'value' => 'ecoli'],
                    ['uid' => 'human-homo-sapiens', 'label' => 'Human (Homo sapiens)', 'value' => 'human'],
                    ['uid' => 'yeast-s-cerevisiae', 'label' => 'Yeast (S. cerevisiae)', 'value' => 'yeast'],
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
          // A select arrives here as the option *uid* the panel generated from the label,
          // not as its value, so resolve by normalised containment and take the longest
          // match (otherwise "hindiii" would be caught by a shorter key like "hin").
          function resolve(raw, map, fallback) {
            var n = String(raw || '').toLowerCase().replace(/[^a-z0-9]/g, '');
            if (Object.prototype.hasOwnProperty.call(map, raw)) return map[raw];
            var keys = Object.keys(map).sort(function (a, b) { return b.length - a.length; });
            for (var i = 0; i < keys.length; i++) {
              var k = keys[i].toLowerCase().replace(/[^a-z0-9]/g, '');
              if (k && n.indexOf(k) >= 0) return map[keys[i]];
            }
            return fallback;
          }
          var BASES = 'TCAG';
          var AA_ORDER = 'FFLLSSSSYY**CC*WLLLLPPPPHHQQRRRRIIIMTTTTNNKKSSRRVVVVAAAADDEEGGGG';
          function aaOf(codon) {
            var i1 = BASES.indexOf(codon.charAt(0)), i2 = BASES.indexOf(codon.charAt(1)),
                i3 = BASES.indexOf(codon.charAt(2));
            if (i1 < 0 || i2 < 0 || i3 < 0) return null;
            return AA_ORDER.charAt(i1 * 16 + i2 * 4 + i3);
          }
          var STOPS = { TAA: 1, TAG: 1, TGA: 1 };
          var MASS = { A: 71.0788, R: 156.1875, N: 114.1038, D: 115.0886, C: 103.1388,
                       E: 129.1155, Q: 128.1307, G: 57.0519, H: 137.1411, I: 113.1594,
                       L: 113.1594, K: 128.1741, M: 131.1926, F: 147.1766, P: 97.1167,
                       S: 87.0782, T: 101.1051, W: 186.2132, Y: 163.1760, V: 99.1326 };
          function peptideMass(s) {
            var m = 0, n = 0;
            for (var i = 0; i < s.length; i++) {
              var x = MASS[s.charAt(i)];
              if (x) { m += x; n++; }
            }
            return n ? m + 18.01524 : 0;
          }
        
          var CODON_W = {
            ecoli: {
              TTT: 0.57, TTC: 1.00, TTA: 0.13, TTG: 0.13, CTT: 0.10, CTC: 0.10, CTA: 0.04, CTG: 1.00,
              ATT: 0.51, ATC: 1.00, ATA: 0.08, ATG: 1.00,
              GTT: 0.60, GTC: 0.42, GTA: 0.27, GTG: 1.00,
              TCT: 0.60, TCC: 0.60, TCA: 0.14, TCG: 0.14, AGT: 0.31, AGC: 1.00,
              CCT: 0.35, CCC: 0.22, CCA: 0.35, CCG: 1.00,
              ACT: 0.49, ACC: 1.00, ACA: 0.13, ACG: 0.27,
              GCT: 0.53, GCC: 0.58, GCA: 0.45, GCG: 1.00,
              TAT: 0.57, TAC: 1.00, CAT: 0.57, CAC: 1.00, CAA: 0.34, CAG: 1.00,
              AAT: 0.49, AAC: 1.00, AAA: 1.00, AAG: 0.25, GAT: 0.63, GAC: 1.00,
              GAA: 0.68, GAG: 1.00, TGT: 0.46, TGC: 1.00, TGG: 1.00,
              CGT: 1.00, CGC: 0.55, CGA: 0.06, CGG: 0.03, AGA: 0.03, AGG: 0.02,
              GGT: 1.00, GGC: 0.74, GGA: 0.19, GGG: 0.15
            },
            human: {
              TTT: 0.93, TTC: 1.00, TTA: 0.29, TTG: 0.50, CTT: 0.53, CTC: 0.79, CTA: 0.28, CTG: 1.00,
              ATT: 0.74, ATC: 0.87, ATA: 0.35, ATG: 1.00,
              GTT: 0.60, GTC: 0.79, GTA: 0.46, GTG: 1.00,
              TCT: 0.75, TCC: 0.88, TCA: 0.58, TCG: 0.22, AGT: 0.67, AGC: 1.00,
              CCT: 0.83, CCC: 1.00, CCA: 0.83, CCG: 0.28,
              ACT: 0.82, ACC: 1.00, ACA: 0.90, ACG: 0.38,
              GCT: 0.79, GCC: 1.00, GCA: 0.73, GCG: 0.29,
              TAT: 0.87, TAC: 1.00, CAT: 0.83, CAC: 1.00, CAA: 0.51, CAG: 1.00,
              AAT: 0.88, AAC: 1.00, AAA: 0.86, AAG: 1.00, GAT: 0.93, GAC: 1.00,
              GAA: 0.84, GAG: 1.00, TGT: 0.87, TGC: 1.00, TGG: 1.00,
              CGT: 0.48, CGC: 0.63, CGA: 0.31, CGG: 1.00, AGA: 0.62, AGG: 0.65,
              GGT: 0.62, GGC: 0.83, GGA: 1.00, GGG: 0.79
            },
            yeast: {
              TTT: 0.60, TTC: 1.00, TTA: 0.29, TTG: 1.00, CTT: 0.13, CTC: 0.06, CTA: 0.14, CTG: 0.11,
              ATT: 0.99, ATC: 1.00, ATA: 0.39, ATG: 1.00,
              GTT: 1.00, GTC: 0.62, GTA: 0.44, GTG: 0.28,
              TCT: 1.00, TCC: 0.74, TCA: 0.51, TCG: 0.15, AGT: 0.51, AGC: 0.33,
              CCT: 1.00, CCC: 0.30, CCA: 0.79, CCG: 0.09,
              ACT: 1.00, ACC: 0.79, ACA: 0.62, ACG: 0.26,
              GCT: 1.00, GCC: 0.52, GCA: 0.71, GCG: 0.19,
              TAT: 0.87, TAC: 1.00, CAT: 0.73, CAC: 1.00, CAA: 1.00, CAG: 0.31,
              AAT: 1.00, AAC: 0.83, AAA: 1.00, AAG: 0.58, GAT: 1.00, GAC: 0.72,
              GAA: 1.00, GAG: 0.45, TGT: 1.00, TGC: 0.63, TGG: 1.00,
              CGT: 0.14, CGC: 0.06, CGA: 0.07, CGG: 0.04, AGA: 1.00, AGG: 0.66,
              GGT: 1.00, GGC: 0.39, GGA: 0.31, GGG: 0.24
            }
          };
          var DEGENERATE = { A: 'GCN', C: 'TGY', D: 'GAY', E: 'GAR', F: 'TTY', G: 'GGN',
                             H: 'CAY', I: 'ATH', K: 'AAR', L: 'YTN', M: 'ATG', N: 'AAY',
                             P: 'CCN', Q: 'CAR', R: 'MGN', S: 'WSN', T: 'ACN', V: 'GTN',
                             W: 'TGG', Y: 'TAY', '*': 'TAR' };
        
          omni.onResult(['sequence', 'host'], function (ctx) {
            var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
            var key = resolve(ctx.getRawInput('host'), { ecoli: 'ecoli', human: 'human', yeast: 'yeast' }, 'ecoli');
            var W = CODON_W[key] || CODON_W.ecoli;
            if (seq.length < 3) {
              ctx.addHtml(block('Codon adaptation index', '—', 'Paste a coding sequence of at least 3 bp.'));
              ctx.exportValue('cai', 0); ctx.exportValue('codons', 0);
              ctx.exportValue('rare', 0); ctx.exportValue('gc3', 0);
              return;
            }
            var usable = Math.floor(seq.length / 3);
            if (usable * 3 !== seq.length) {
              seq = seq.slice(0, usable * 3);
            }
            var sumLn = 0, scored = 0, rare = 0, gc3 = 0, gc3n = 0, unknown = 0;
            var counts = {}, rareList = [];
            for (var i = 0; i + 3 <= seq.length; i += 3) {
              var cod = seq.substr(i, 3);
              var aa = aaOf(cod);
              if (aa === null) { unknown++; continue; }
              if (aa === '*' || cod === 'ATG' || cod === 'TGG') continue;
              var w = W[cod];
              if (w === undefined) { unknown++; continue; }
              counts[cod] = (counts[cod] || 0) + 1;
              scored++;
              // a zero weight would make ln() infinite; the tables have none, but guard anyway
              sumLn += Math.log(Math.max(w, 0.005));
              gc3n++;
              if (cod.charAt(2) === 'G' || cod.charAt(2) === 'C') gc3++;
              if (w <= 0.2) {
                rare++;
                if (rareList.length < 12) rareList.push(cod + ' (w ' + w.toFixed(2) + ', position ' + (i + 1) + ')');
              }
            }
            var cai = scored ? Math.exp(sumLn / scored) : 0;
            var pct3 = gc3n ? gc3 / gc3n * 100 : 0;
            ctx.exportValue('cai', Math.round(cai * 10000) / 10000);
            ctx.exportValue('codons', scored);
            ctx.exportValue('rare', rare);
            ctx.exportValue('gc3', Math.round(pct3 * 100) / 100);
        
            var verdict = cai >= 0.8 ? 'well adapted for this host'
              : cai >= 0.6 ? 'moderately adapted — a native gene expressed at a modest level'
              : cai >= 0.4 ? 'poorly adapted — codon optimisation is worth considering'
              : 'very poorly adapted — expect a low yield as it stands';
            var rows = [];
            var order = Object.keys(counts).sort(function (a, b) { return counts[b] - counts[a]; });
            for (var k = 0; k < order.length && k < 15; k++) {
              var c = order[k];
              rows.push([c, aaOf(c) || '?', String(counts[c]), W[c].toFixed(2)]);
            }
            var html = block('Codon adaptation index (' + key + ')',
              'CAI                ' + cai.toFixed(4) + '\n'
              + 'Codons scored      ' + scored + '\n'
              + 'Rare codons (w≤0.2) ' + rare + '\n'
              + 'GC at third base   ' + pct3.toFixed(1) + ' %',
              'Reading: ' + verdict + '.');
            html += table('Most used codons in this sequence', ['Codon', 'Amino acid', 'Count', 'w'], rows);
            html += block('Rare codons', rare ? rareList.join('\n') : 'None below w = 0.2.',
              unknown ? unknown + ' codon(s) skipped as ambiguous or incomplete.' : '');
            ctx.addHtml(html);
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        The codon adaptation index scores how well a coding sequence uses the codons its host prefers. It returns codon adaptation index, codons scored, rare codons (w ≤ 0.2) and gc at third position, and the panel shows all of them at once.
        
        Every codon is weighted by how often that host uses it within its amino-acid family, the weights are averaged geometrically, and the result runs from 0 to 1 — above about 0.8 means the gene is already tuned for that host, below 0.5 means it is poorly adapted and is a candidate for resynthesis.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Codon Adaptation Index', 'html' => <<<'TXT'
            <p>CAI = exp( (1/L) · Σ ln w_i ), w_i = f(codon) ÷ f(most used codon of the same amino acid)</p>
            <figure class="calc-figure"><img src="/uploads/biology/codon-adaptation-index.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Codon Adaptation Index Calculator — The same gene read against three hosts" title="Codon Adaptation Index Calculator"><figcaption>The same gene read against three hosts</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>w_i</code></td><td>relative adaptiveness of codon i in the host</td><td>0 – 1</td></tr><tr><td><code>L</code></td><td>codons scored (Met, Trp and stop codons left out)</td><td>codons</td></tr><tr><td><code>f</code></td><td>usage frequency within the amino-acid family</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Codon Adaptation Index?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Paste the coding sequence — DNA, no spaces needed, FASTA headers are ignored.</li><li>Pick the host you intend to express in; the weights change with the reference set.</li><li>Read the CAI and then look at the rare-codon list: a single cluster of w < 0.2 codons is what stalls a ribosome, and a good average can hide it.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0.80 – 1.00</td><td><strong>Well adapted</strong></td><td>codon-optimised or a highly expressed native gene</td></tr><tr><td>0.60 – 0.80</td><td><strong>Moderately adapted</strong></td><td>typical of a native gene expressed at a low level</td></tr><tr><td>0.40 – 0.60</td><td><strong>Poorly adapted</strong></td><td>heterologous expression usually benefits from resynthesis</td></tr><tr><td>below 0.40</td><td><strong>Very poorly adapted</strong></td><td>expect low yield; check for rare-codon clusters</td></tr></tbody></table>
            <ul><li><p>CAI is a geometric mean, so one codon with a very low weight pulls the score down much harder than an arithmetic average would — that is deliberate, because translation is limited by the slowest step.</p></li><li><p>The weights are relative adaptiveness values: the most-used codon of each amino acid is 1.00 and the others are scaled against it. They are tabulated to two decimals here, which is enough for a two-decimal CAI.</p></li><li><p>CAI says nothing about mRNA structure, GC content or internal ribosome entry — a gene can score 0.9 and still fold badly at the start. Check the 5′ end separately.</p></li><li><p>Met, Trp and the three stop codons are excluded because they have no synonymous choice; including them would push every score toward 1.0.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Feeding in a genomic sequence with introns: the frame is lost after the first intron and every downstream codon is misread.</li><li>Comparing a CAI computed against E. coli with one computed against human — the scales are not comparable.</li><li>Reading only the average: a 0.75 CAI with five consecutive rare Arg codons will express worse than a 0.68 gene with the same codons spread out.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/codon-usage-calculator">Codon usage</a>. <a href="/biology/multi-reverse-translate">Multi reverse translate</a>. <a href="/biology/gc-content-calculator">GC content</a>. <a href="/biology/dna-to-protein">DNA to protein</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a good codon adaptation index?', 'a' => <<<'TXT'
            Above 0.8 is well adapted for the host; 0.6–0.8 is typical of a native gene at modest expression; below 0.5 usually justifies codon optimisation before you try expression.
            TXT],
            ['q' => 'Does a high CAI guarantee high protein yield?', 'a' => <<<'TXT'
            No. CAI only measures codon choice. mRNA secondary structure, GC content at the 5′ end, rare-codon clusters and the tRNA pool under the growth condition all matter as much.
            TXT],
            ['q' => 'Why is my CAI different from a supplier\'s optimisation report?', 'a' => <<<'TXT'
            Because the weight tables differ. Suppliers use their own proprietary usage sets; this page uses the standard published relative adaptiveness values, so expect the same shape and a slightly different number.
            TXT],
            ['q' => 'Can I use CAI for a bacterial gene expressed in human cells?', 'a' => 'Yes — that is exactly the heterologous case it is for. Read the score against the human table, not the bacterial one.'],
            ['q' => 'What does the Codon Adaptation Index actually calculate?', 'a' => <<<'TXT'
            It returns codon adaptation index, codons scored, rare codons (w ≤ 0.2) and gc at third position. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
        ],
        'related' => [],
    ],
];
