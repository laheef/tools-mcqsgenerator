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
    'meta' => ['title' => 'Fuzzy Protein Search Calculator — Formula & Results', 'description' => 'Fuzzy Protein Search turns Protein sequence, Pattern to find and Mismatches allowed into Matches found and Fewest mismatches in a hit. The answer typed back in.', 'h1' => 'Fuzzy Protein Search Calculator', 'updated' => '2026-10-29'],
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
        Fuzzy Protein Search turns Protein sequence, Pattern to find and Mismatches allowed into Matches found and Fewest mismatches in a hit. The arithmetic is the whole method: Matches found is worked out from Protein sequence by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Fuzzy Protein Search calculator works', 'html' => <<<'TXT'
            <p>Fuzzy Protein Search answers one question from 3 numbers, and the answer is Matches found, Fewest mismatches in a hit and Residues searched.</p><p>The result panel carries Matches found, Fewest mismatches in a hit and Residues searched, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Protein sequence</strong> — a plain number, no unit. Paste the protein; FASTA headers and non-letter characters are ignored</li><li><strong>Pattern to find</strong> — a plain number, no unit. Amino-acid letters, X for any residue, B = D/N, Z = E/Q, J = I/L</li><li><strong>Mismatches allowed</strong> — a plain number, no unit. 0 = exact, but X still matches any residue</li></ul><p>What you get back is Matches found, Fewest mismatches in a hit, Residues searched, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Matches found takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Matches found, Fewest mismatches in a hit and Residues searched are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Protein sequence is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Protein sequence, Pattern to find and Mismatches allowed and the number you are missing is Matches found and Fewest mismatches in a hit.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/photosynthesis-rate">Photosynthesis Rate Calculator</a>, <a href="/biology/pig-weight">Pig Weight Calculator</a> and <a href="/biology/pine-straw">Pine straw</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which values do I need before I start?', 'a' => 'Protein sequence, Pattern to find, Mismatches allowed. With protein, pattern and mismatch in place, Matches found can stay blank and the page will work it out.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Matches found is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Matches found, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Matches found keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/photosynthesis-rate', 'name' => 'Photosynthesis Rate Calculator'],
            ['path' => '/biology/pig-weight', 'name' => 'Pig Weight Calculator'],
            ['path' => '/biology/pine-straw', 'name' => 'Pine straw'],
        ],
        'authors' => [],
    ],
];
