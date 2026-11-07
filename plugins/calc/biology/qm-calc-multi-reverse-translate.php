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
    'meta' => ['title' => 'Multi Reverse Translate Calculator — Biology', 'description' => 'Multi Reverse Translate Calculator works out sequences translated and residues translated and reports both. The formula is printed in the form\'s own words.', 'h1' => 'Multi Reverse Translate Calculator', 'updated' => '2026-10-29'],
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
        Multi Reverse Translate takes Protein sequences (one or more), Codon choice and Add a stop codon at the end and returns Sequences translated and Residues translated. It is a single relationship that reads sequences translated out of protein sequences (one or more), not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Multi Reverse Translate calculator works', 'html' => <<<'TXT'
            <p>The Multi Reverse Translate calculator applies one relationship to 3 numbers and reports Sequences translated, Residues translated and GC content of the output.</p><p>What comes back is Sequences translated, Residues translated and GC content of the output — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Protein sequences (one or more)</strong> — a plain number, no unit. One sequence per line, FASTA headers allowed — every sequence is translated separately</li><li><strong>Codon choice</strong> — a plain number, no unit. Host-preferred codons, or one degenerate codon per residue</li><li><strong>Add a stop codon at the end</strong> — a plain number, no unit. Uses the host&#039;s preferred stop</li></ul><p>The result boxes are Sequences translated, Residues translated, GC content of the output in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Sequences translated takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Sequences translated, Residues translated and GC content of the output are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Protein sequences (one or more) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Protein sequences (one or more) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Codon choice left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Codon choice is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Add a stop codon at the end left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Add a stop codon at the end is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Protein sequences (one or more) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Protein sequences (one or more)</strong> takes a plain number with no unit attached. One sequence per line, FASTA headers allowed — every sequence is translated separately. Have it to hand before you start: Protein sequences (one or more) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Codon choice</strong> takes a plain number with no unit attached. Host-preferred codons, or one degenerate codon per residue. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Codon choice is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Add a stop codon at the end</strong> takes a plain number with no unit attached. Uses the host&#039;s preferred stop. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Add a stop codon at the end is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Sequences translated</strong> is a plain number. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Residues translated</strong> is a plain number. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>GC content of the output</strong> is a plain number. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Pasting the sequence correctly', 'html' => <<<'TXT'
            <p>The box labelled <strong>Protein sequences (one or more)</strong> is the input the whole page is built around. It holds characters, and the page reads every one of them.</p><ul><li><strong>No header line.</strong> If the text was copied out of a file, check that the first line is not a description. Anything before the first real base or residue is counted as data.</li><li><strong>No spaces or line numbers.</strong> Sequence viewers wrap the text and number the lines. The numbers are not part of the sequence, and a paste that includes them will fail or, worse, half-succeed.</li><li><strong>Case is a choice you make.</strong> Many tools treat upper and lower case as the same letters and others do not. Paste the sequence in the case that carries the meaning you intend.</li><li><strong>Ambiguous characters are not rare.</strong> An N in a sequence, an X in a protein, or an IUPAC code standing for two possible bases is a real value, not a typo. The page will count it; interpret the answer with that in mind.</li></ul><p>Paste once, check the first and last few characters of what landed in the box, and then read Sequences translated, Residues translated and GC content of the output. If one of those figures is impossible — a length that does not match the text, a count larger than the sequence — the paste is the thing to look at first, not the formula.</p>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Multi Reverse Translate is not a single equation with a single answer. It reads Protein sequences (one or more), Codon choice and Add a stop codon at the end, applies the analysis the page is built around, and reports Sequences translated, Residues translated and GC content of the output.</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Sequences translated, Residues translated and GC content of the output. They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Protein sequences (one or more), Codon choice and Add a stop codon at the end. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Protein sequences (one or more) into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Sequences translated with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Sequences translated follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Protein sequences (one or more), Codon choice and Add a stop codon at the end are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Protein sequences (one or more), Codon choice and Add a stop codon at the end measured, Sequences translated and Residues translated wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/logistic-population-growth">Logistic Population Growth Calculator</a>, <a href="/biology/mark-recapture">Mark-Recapture Population Calculator</a> and <a href="/biology/mark-recapture-population">Mark–Recapture Population (Lincoln–Petersen) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Multi Reverse Translate calculator work out?', 'a' => 'Sequences translated, Residues translated and GC content of the output.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Protein sequences (one or more), Codon choice, Add a stop codon at the end. Enter protein sequences (one or more), codon choice and add a stop codon at the end; Sequences translated is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Sequences translated is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Sequences translated, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Sequences translated at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/logistic-population-growth', 'name' => 'Logistic Population Growth Calculator'],
            ['path' => '/biology/mark-recapture', 'name' => 'Mark-Recapture Population Calculator'],
            ['path' => '/biology/mark-recapture-population', 'name' => 'Mark–Recapture Population (Lincoln–Petersen) Calculator'],
        ],
        'authors' => [],
    ],
];
