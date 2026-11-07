<?php

/**
 * Multi Reverse Translate Calculator
 * /biology/multi-reverse-translate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Multi Reverse Translate Calculator',
    'meta' => ['title' => 'Multi Reverse Translate Calculator — Biology', 'description' => 'Back-translate several protein sequences at once into DNA, either with the codons a chosen host prefers or with a fully degenerate codon for every residue.', 'h1' => 'Multi Reverse Translate Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'proteins' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => <<<'TXT'
                    >example
                    MKWVTFISLLFLFSSAYSR
                    >second
                    GVFRQESK
                    TXT, 'c' => null],
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
            'stop' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'yes', 'c' => null],
                ],
                'ds' => 'ds-stop',
            ],
            'sequences' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'residues' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'gc' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-multi-reverse-translate',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'proteins',
                                    'l' => 'Protein sequences (one or more)',
                                    'h' => 'One sequence per line, FASTA headers allowed — every sequence is translated separately',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'host',
                                    'l' => 'Codon choice',
                                    'h' => 'Host-preferred codons, or one degenerate codon per residue',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-host',
                                    'opts' => [
                                        ['e-coli-k-12', 'E. coli K-12', 'ecoli'],
                                        ['human-homo-sapiens', 'Human (Homo sapiens)', 'human'],
                                        ['yeast-s-cerevisiae', 'Yeast (S. cerevisiae)', 'yeast'],
                                        ['degenerate-iupac', 'Degenerate (IUPAC)', 'degenerate'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'stop',
                                    'l' => 'Add a stop codon at the end',
                                    'h' => 'Uses the host\'s preferred stop',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-stop',
                                    'opts' => [
                                        ['yes', 'Yes', '1'],
                                        ['no', 'No', '0'],
                                    ],
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'sequences',
                                    'l' => 'Sequences translated',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'residues',
                                    'l' => 'Residues translated',
                                    'h' => 'Stop characters excluded',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gc',
                                    'l' => 'GC content of the output',
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
                'name' => 'Codon choice',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'e-coli-k-12', 'label' => 'E. coli K-12', 'value' => 'ecoli'],
                    ['uid' => 'human-homo-sapiens', 'label' => 'Human (Homo sapiens)', 'value' => 'human'],
                    ['uid' => 'yeast-s-cerevisiae', 'label' => 'Yeast (S. cerevisiae)', 'value' => 'yeast'],
                    ['uid' => 'degenerate-iupac', 'label' => 'Degenerate (IUPAC)', 'value' => 'degenerate'],
                ],
            ],
            'ds-stop' => [
                'name' => 'Add a stop codon at the end',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'yes', 'label' => 'Yes', 'value' => '1'],
                    ['uid' => 'no', 'label' => 'No', 'value' => '0'],
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
        
          var ALL_CODONS = Object.keys(CODON_W.ecoli);
          var PREFERRED = {}, PREFERRED_STOP = {};
          function buildPreferred(key) {
            var out = {}, best = {};
            var table = CODON_W[key] || CODON_W.ecoli;
            for (var i = 0; i < ALL_CODONS.length; i++) {
              var cod = ALL_CODONS[i], aa = aaOf(cod);
              if (!aa || aa === '*') continue;
              var w = table[cod];
              if (w === undefined) continue;
              if (best[aa] === undefined || w > best[aa]) { best[aa] = w; out[aa] = cod; }
            }
            // the preferred stop codon is TAA in bacteria, TGA in eukaryotes
            out['*'] = key === 'ecoli' ? 'TAA' : 'TGA';
            return out;
          }
          var PREF = { ecoli: buildPreferred('ecoli'), human: buildPreferred('human'), yeast: buildPreferred('yeast') };
          function records(raw) {
            var lines = String(raw || '').split(/\r?\n/), out = [], cur = null;
            for (var i = 0; i < lines.length; i++) {
              var line = lines[i].trim();
              if (!line) continue;
              if (line.charAt(0) === '>') {
                cur = { name: line.slice(1).trim() || ('sequence ' + (out.length + 1)), seq: '' };
                out.push(cur);
              } else {
                if (!cur) { cur = { name: 'sequence 1', seq: '' }; out.push(cur); }
                cur.seq += line.replace(/[^A-Za-z]/g, '');
              }
            }
            return out;
          }
          omni.onResult(['proteins', 'host', 'stop'], function (ctx) {
            var recs = records(ctx.getRawInput('proteins'));
            var mode = resolve(ctx.getRawInput('host'), { ecoli: 'ecoli', human: 'human', yeast: 'yeast', degenerate: 'degenerate' }, 'ecoli');
            var addStop = /true|yes|1/i.test(String(ctx.getRawInput('stop') || ''));
            if (!recs.length) {
              ctx.addHtml(block('Reverse translation', '—', 'Paste at least one protein sequence.'));
              ctx.exportValue('sequences', 0); ctx.exportValue('residues', 0); ctx.exportValue('gc', 0);
              return;
            }
            var html = '', done = 0, residues = 0, gc = 0, at = 0, problems = [];
            for (var r = 0; r < recs.length && r < 20; r++) {
              var pep = recs[r].seq.toUpperCase().replace(/[^A-Z*]/g, '');
              if (!pep) { problems.push(recs[r].name + ': no residues'); continue; }
              var dna = '', i, unknown = [];
              for (i = 0; i < pep.length; i++) {
                var aa = pep.charAt(i);
                if (aa === '*') { if (i === pep.length - 1 && addStop) dna += (PREF[mode] || PREF.ecoli)['*']; continue; }
                var cod;
                if (mode === 'degenerate') cod = DEGENERATE[aa];
                else cod = (PREF[mode] || PREF.ecoli)[aa];
                if (!cod) { unknown.push(aa + '@' + (i + 1)); continue; }
                dna += cod;
                residues++;
              }
              if (addStop && dna.length && pep.charAt(pep.length - 1) !== '*' && mode !== 'degenerate') {
                dna += (PREF[mode] || PREF.ecoli)['*'];
              }
              for (i = 0; i < dna.length; i++) {
                var ch = dna.charAt(i);
                at++;
                if (ch === 'G' || ch === 'C') gc++;
              }
              done++;
              html += block('> ' + recs[r].name + '  (' + pep.length + ' aa → ' + dna.length + ' nt)',
                wrap(dna, 60), unknown.length ? 'Unreadable characters: ' + unknown.join(', ') : '');
            }
            var pct = at ? gc / at * 100 : 0;
            ctx.exportValue('sequences', done);
            ctx.exportValue('residues', residues);
            ctx.exportValue('gc', Math.round(pct * 100) / 100);
            var head = block('Reverse translation summary',
              'Sequences   ' + done + '\nResidues    ' + residues + '\nCodon set   ' + mode
              + '\nGC content  ' + pct.toFixed(1) + ' %',
              pct > 70 ? 'Above 70 % GC: expect synthesis difficulty and secondary structure.'
                       : pct < 30 ? 'Below 30 % GC: check that the reading frame and host are what you meant.'
                       : 'GC within the comfortable 30–70 % range.');
            ctx.addHtml(head + html + (problems.length ? block('Skipped', problems.join('\n')) : ''));
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Back-translate several protein sequences at once into DNA, either with the codons a chosen host prefers or with a fully degenerate codon for every residue. It returns sequences translated, residues translated and gc content of the output, and the panel shows all of them at once.
        
        Paste a multi-FASTA of proteins, pick the host, and every sequence comes back as DNA with its own length, GC content and rare-codon count — the starting point for a synthetic construct or a primer design.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Multi Reverse Translate', 'html' => <<<'TXT'
            <p>one codon per residue: argmax w(codon) for the host, or the IUPAC codon covering every synonym</p>
            <figure class="calc-figure"><img src="/uploads/biology/multi-reverse-translate.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Multi Reverse Translate Calculator — Codons needed for the same peptide under two hosts" title="Multi Reverse Translate Calculator"><figcaption>Codons needed for the same peptide under two hosts</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>w</code></td><td>relative adaptiveness of a codon for the host</td><td>0 – 1</td></tr><tr><td><code>IUPAC codon</code></td><td>a three-letter code with ambiguity, e.g. YTN for leucine</td><td>—</td></tr><tr><td><code>*</code></td><td>stop</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Multi Reverse Translate?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Paste the proteins, each on its own line or under a FASTA header.</li><li>Pick the expression host — the page takes the most-used codon of each amino acid from that host's table — or choose degenerate to keep every synonymous option.</li><li>Copy the DNA out, keeping the wrap at 60 columns so it drops straight into a cloning tool.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>Host-preferred</td><td><strong>One defined sequence</strong></td><td>best for expression; the sequence is fixed</td></tr><tr><td>Degenerate</td><td><strong>A codon family per residue</strong></td><td>best for primer design and for unknown host bias</td></tr><tr><td>GC 40 – 60 %</td><td><strong>Comfortable range</strong></td><td>synthesis and PCR both behave well</td></tr><tr><td>GC above 70 %</td><td><strong>Hard to synthesise</strong></td><td>secondary structure and synthesis cost both rise</td></tr></tbody></table>
            <ul><li><p>Host-preferred back-translation is not codon optimisation: it uses each host's single most frequent codon everywhere, which maximises CAI but can create repeats and hairpins. A real optimisation algorithm also scans for those — this page gives you the honest starting point.</p></li><li><p>Degenerate codons are the right output when the DNA is a hybridisation probe or a primer mix: YTN for leucine means four codons in one synthesis.</p></li><li><p>Every protein is translated in its own frame; a sequence containing a character that is not an amino acid is reported rather than silently dropped.</p></li><li><p>The GC content reported is of the DNA you would order, so it is the number a synthesis quote depends on.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Pasting DNA by mistake: it is read as protein and every letter becomes a codon.</li><li>Forgetting that removing the stop codon is required for a C-terminal fusion.</li><li>Assuming the host-preferred sequence is also the highest-expressing one — mRNA structure at the 5′ end often dominates.</li><li>Using E. coli codons for a mammalian host and then wondering why expression is poor.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/reverse-translate">Reverse translate (single)</a>. <a href="/biology/codon-adaptation-index">Codon adaptation index</a>. <a href="/biology/codon-usage-calculator">Codon usage</a>. <a href="/biology/oligo-tm-calculator">Oligo Tm</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the difference between reverse translation and codon optimisation?', 'a' => <<<'TXT'
            Reverse translation picks one codon per residue — here, the host's most-used one. Codon optimisation additionally avoids repeats, extreme GC, cryptic splice sites and hairpins, and often mixes synonymous codons on purpose.
            TXT],
            ['q' => 'Why does the page use the most frequent codon everywhere?', 'a' => <<<'TXT'
            Because it is deterministic and reproducible: the same protein always gives the same DNA, which is what you want when comparing constructs. Add synonymous variation yourself where the output has runs of the same codon.
            TXT],
            ['q' => 'Can I get several sequences in one run?', 'a' => 'Yes. Paste them one per line or with FASTA headers; each is translated separately and numbered in the output.'],
            ['q' => 'Is the degenerate output usable for ordering a primer?', 'a' => 'Yes — that is its main use. Order it as a degenerate oligo and the synthesiser will make the mixture the IUPAC code describes.'],
            ['q' => 'What does the Multi Reverse Translate actually calculate?', 'a' => <<<'TXT'
            It returns sequences translated, residues translated and gc content of the output. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
        ],
        'related' => [],
    ],
];
