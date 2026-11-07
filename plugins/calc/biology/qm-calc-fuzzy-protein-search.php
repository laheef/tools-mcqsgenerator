<?php

/**
 * Fuzzy Protein Search Calculator
 * /biology/fuzzy-protein-search
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fuzzy Protein Search Calculator',
    'meta' => ['title' => 'Fuzzy Protein Search Calculator — Formula & Results', 'description' => 'A fuzzy protein search finds an approximate motif: X matches any residue, B, Z and J their ambiguous pairs. It returns matches found, fewest mismatches in a…', 'h1' => 'Fuzzy Protein Search Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'protein' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'MKWVTFISLLFLFSSAYSRGVFRRDAHKSEVAHRFKDLGEENFKALVLIAFAQYLQQCPFEDHVKLVNEVTEFAKTCVADESAENCDKS', 'c' => null],
                ],
            ],
            'pattern' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'TCXAD', 'c' => null],
                ],
            ],
            'mismatch' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '0', 'c' => null],
                ],
            ],
            'hits' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'best' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'total' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-fuzzy-protein-search',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'protein',
                                    'l' => 'Protein sequence',
                                    'h' => 'Paste the protein; FASTA headers and non-letter characters are ignored',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'pattern',
                                    'l' => 'Pattern to find',
                                    'h' => 'Amino-acid letters, X for any residue, B = D/N, Z = E/Q, J = I/L',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'mismatch',
                                    'l' => 'Mismatches allowed',
                                    'h' => '0 = exact, but X still matches any residue',
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'hits',
                                    'l' => 'Matches found',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'best',
                                    'l' => 'Fewest mismatches in a hit',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'total',
                                    'l' => 'Residues searched',
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
        
          // What each ambiguity code will accept.
          var COVERS = {
            B: 'DN', Z: 'EQ', J: 'IL', X: 'ACDEFGHIKLMNPQRSTVWY',
            A: 'A', C: 'C', D: 'D', E: 'E', F: 'F', G: 'G', H: 'H', I: 'I', K: 'K', L: 'L',
            M: 'M', N: 'N', P: 'P', Q: 'Q', R: 'R', S: 'S', T: 'T', V: 'V', W: 'W', Y: 'Y'
          };
          omni.onResult(['protein', 'pattern', 'mismatch'], function (ctx) {
            var seq = cleanSeq(ctx.getRawInput('protein'), 'protein');
            var pat = cleanSeq(ctx.getRawInput('pattern'), 'protein');
            var allowed = Math.max(0, Math.min(10, Math.round(Number(ctx.getRawInput('mismatch')) || 0)));
            if (!seq.length || !pat.length) {
              ctx.addHtml(block('Fuzzy protein search', '—', 'Paste both a protein and a pattern.'));
              ctx.exportValue('hits', 0); ctx.exportValue('best', 0); ctx.exportValue('total', 0);
              return;
            }
            var bad = [];
            for (var q = 0; q < pat.length; q++) if (!COVERS[pat.charAt(q)]) bad.push(pat.charAt(q));
            if (bad.length) {
              ctx.addHtml(block('Fuzzy protein search', '—',
                'The pattern contains characters that are not amino acids: ' + bad.join(' ')));
              ctx.exportValue('hits', 0); ctx.exportValue('best', 0); ctx.exportValue('total', seq.length);
              return;
            }
            var rows = [], hits = 0, best = null, m, n;
            var wild = 0;
            for (var w = 0; w < pat.length; w++) if (pat.charAt(w) === 'X') wild++;
            for (var i = 0; i + pat.length <= seq.length; i++) {
              m = 0;
              for (var j = 0; j < pat.length; j++) {
                var set = COVERS[pat.charAt(j)] || 'X';
                if (set.indexOf(seq.charAt(i + j)) < 0) m++;
                if (m > allowed) break;
              }
              if (m <= allowed) {
                hits++;
                if (best === null || m < best) best = m;
                if (rows.length < 15) {
                  var piece = seq.substr(i, pat.length);
                  rows.push([String(i + 1), piece, String(m), peptideMass(piece).toFixed(2)]);
                }
              }
            }
            ctx.exportValue('hits', hits);
            ctx.exportValue('best', best === null ? 0 : best);
            ctx.exportValue('total', seq.length);
            var head = block('Fuzzy protein search',
              'Pattern            ' + pat + '\nLength searched    ' + seq.length + ' residues\n'
              + 'Mismatches allowed ' + allowed + '\nMatches found      ' + hits,
              wild ? wild + ' wildcard position(s) in the pattern — a pattern of all X matches everywhere.'
                           : 'Positions are 1-based.');
            var html = head + table('Hits', ['Position', 'Match', 'Mismatches', 'Mass (Da)'],
              rows.length ? rows : [['—', 'no match', '—', '—']],
              rows.length > 15 ? 'First 15 shown.' : '');
            ctx.addHtml(html);
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        A fuzzy protein search finds an approximate motif: X matches any residue, B, Z and J their ambiguous pairs. It returns matches found, fewest mismatches in a hit and residues searched, and the panel shows all of them at once.
        
        Every hit is reported with its position, its mass and how many positions it missed — the quick way to find a motif in a protein whose exact sequence you are not sure of.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Fuzzy Protein Search', 'html' => <<<'TXT'
            <p>a window of length |P| matches when the number of positions where P[i] does not cover S[i] is ≤ the allowed mismatches</p>
            <figure class="calc-figure"><img src="/uploads/biology/fuzzy-protein-search.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Fuzzy Protein Search Calculator — Hits for a six-residue motif at three mismatch allowances" title="Fuzzy Protein Search Calculator"><figcaption>Hits for a six-residue motif at three mismatch allowances</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>S</code></td><td>the protein sequence</td><td>residues</td></tr><tr><td><code>P</code></td><td>the pattern</td><td>residues</td></tr><tr><td><code>X, B, Z, J</code></td><td>any residue; Asp/Asn; Glu/Gln; Ile/Leu</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Fuzzy Protein Search?', 'html' => <<<'TXT'
            <ol><li>Paste the protein and the motif. Case does not matter.</li><li>Allow a mismatch or two if the sequence comes from a different isoform or a related species.</li><li>Read the positions and the reported masses: the mass tells you at a glance whether the hit is the peptide you expect or an unrelated stretch.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0 mismatches</td><td><strong>Exact motif</strong></td><td>the pattern is present as written</td></tr><tr><td>1 mismatch</td><td><strong>Conservative hit</strong></td><td>usually a point mutation or a species difference</td></tr><tr><td>2+ mismatches</td><td><strong>Loose hit</strong></td><td>raise the allowance only if you expect divergence</td></tr></tbody></table>
            <ul><li><p>X matches any residue, so a pattern full of X matches almost anywhere — count the X positions before trusting a hit.</p></li><li><p>The search is a sliding window over the forward sequence only; report both strands only makes sense for DNA, and this page is for protein.</p></li><li><p>Masses are average residue masses plus one water, the same convention as a peptide mass calculator, so they will be a few hundredths off a monoisotopic mass.</p></li><li><p>Positions are 1-based, the convention in protein databases.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Searching a nucleotide sequence with a protein pattern — every window will look like noise.</li><li>Treating B and Z as literal letters; they are ambiguity codes for Asp/Asn and Glu/Gln.</li><li>Allowing three mismatches on a six-residue pattern, which matches everything.</li><li>Comparing a hit's average mass with a monoisotopic mass from a mass spectrometer and expecting them to agree to the last decimal.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does a fuzzy search do that an exact search does not?', 'a' => 'It lets a pattern match when a few positions differ, and it understands the IUPAC ambiguity letters (B, Z, J, X) that protein databases use.'],
            ['q' => 'Why do I get a hit in a protein that should not contain the motif?', 'a' => 'Because you allowed mismatches — check the mismatch count on the hit. With a short pattern and two allowed mismatches, random matches are common.'],
            ['q' => 'Are the masses monoisotopic or average?', 'a' => 'Average, using the standard residue masses plus H₂O for the intact peptide. For a mass spectrometry match, compare the monoisotopic mass instead.'],
            ['q' => 'Can I search several patterns at once?', 'a' => 'Run them one after another; the page reports every window of the one pattern you paste.'],
            ['q' => 'What does the Fuzzy Protein Search actually calculate?', 'a' => <<<'TXT'
            It returns matches found, fewest mismatches in a hit and residues searched. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
        ],
        'related' => [],
    ],
];
