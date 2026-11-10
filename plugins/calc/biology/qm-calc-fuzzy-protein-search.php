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
    'engine' => 'script',
    'engine_note' => 'searches a protein sequence against a set of patterns and reports the hits and the closest match',
    'meta' => ['title' => 'Fuzzy Protein Search: Motif Matching with Mismatches', 'description' => 'Search a protein for a motif allowing a set number of mismatches, with X matching any residue, and read the hits, the best mismatch count and positions tested.', 'h1' => 'Fuzzy Protein Search Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'grid' => 'FR2',
                    'place' => [
                        0,
                        0,
                        0,
                        1,
                        1,
                        1,
                    ],
                    'fields' => [
                        [
                            'name' => 'protein',
                            'label' => 'Protein sequence',
                            'type' => 'text',
                            'help' => 'Paste the protein; FASTA headers and non-letter characters are ignored',
                            'default' => 'MKWVTFISLLFLFSSAYSRGVFRRDAHKSEVAHRFKDLGEENFKALVLIAFAQYLQQCPFEDHVKLVNEVTEFAKTCVADESAENCDKS',
                        ],
                        [
                            'name' => 'pattern',
                            'label' => 'Pattern to find',
                            'type' => 'text',
                            'help' => 'Amino-acid letters, X for any residue, B = D/N, Z = E/Q, J = I/L',
                            'default' => 'TCXAD',
                        ],
                        [
                            'name' => 'mismatch',
                            'label' => 'Mismatches allowed',
                            'type' => 'number',
                            'help' => '0 = exact, but X still matches any residue',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'hits',
                            'label' => 'Matches found',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'best',
                            'label' => 'Fewest mismatches in a hit',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Residues searched',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [],
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
    'article' => [
        'intro' => <<<'TXT'
        Exact motif searches miss the interesting hits. This page finds a protein motif allowing a set number of mismatches, with X standing for any residue, and reports how many hits it found, how close the best one was, and how many positions were searched.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It locates a short amino-acid pattern in a protein sequence even when one or two residues differ, which is how you find a family member that is not identical, or a motif that has drifted.</p><p>The protein and the pattern are cleaned to letters. At every position the page lines the pattern up against the sequence, counts the positions that disagree, and treats X in the pattern as a free match. A position is a hit if the mismatch count is within the allowance you set. The best figure is the smallest mismatch count among the hits, which is 0 when an exact copy of the motif is present.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 things to fill in, and the order does not matter:</p><ul><li><strong>Protein sequence</strong> — a text box. Paste the protein; FASTA headers and non-letter characters are ignored.</li><li><strong>Pattern to find</strong> — a text box. Amino-acid letters, X for any residue, B = D/N, Z = E/Q, J = I/L.</li><li><strong>Mismatches allowed</strong> — a number box. 0 = exact, but X still matches any residue.</li></ul><p>The answer comes back as 3 boxes: Matches found, Fewest mismatches in a hit, Residues searched. They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Protein sequence</strong> is a text box. Paste the protein; FASTA headers and non-letter characters are ignored Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Pattern to find</strong> is a text box. Amino-acid letters, X for any residue, B = D/N, Z = E/Q, J = I/L Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Mismatches allowed</strong> is a number box. 0 = exact, but X still matches any residue Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Protein sequence</th><td>MKTAYIAKQRQISFVKSHFSRQDILDLWQ</td></tr><tr><th>Pattern to find</th><td>MKTAYIAKQ</td></tr><tr><th>Mismatches allowed</th><td>1</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Matches found</th><td>1</td></tr><tr><th>Fewest mismatches in a hit</th><td>0</td></tr><tr><th>Residues searched</th><td>29</td></tr></tbody></table><p>One hit with zero mismatches in a 29-residue protein: the pattern is the first nine residues of the sequence itself, so an exact match exists. The total of 29 is the number of positions tested, which is the protein length minus the pattern length plus one.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Protein sequence</th><td>MKWVTFISLLFLFSSAYSRGVFRRDTHKSEIAHRFKDLGEEHFK</td></tr><tr><th>Pattern to find</th><td>MKWVTF</td></tr><tr><th>Mismatches allowed</th><td>2</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Matches found</th><td>1</td></tr><tr><th>Fewest mismatches in a hit</th><td>0</td></tr><tr><th>Residues searched</th><td>44</td></tr></tbody></table><p>1 of the 3 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Matches found</strong> — positions where the pattern fits within the mismatch allowance.</li><li><strong>Fewest mismatches</strong> — the smallest disagreement count among those positions; zero means an exact copy.</li><li><strong>Total positions</strong> — how many alignments were tested; a 100-residue protein and a 6-residue pattern give 95.</li></ul><p>The hit count rises fast as the allowance rises, especially for short motifs: with a two-mismatch allowance a six-residue pattern matches almost anything. Read the best figure first — zero means the motif is present exactly, and anything else means you are looking at a relative.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Slide the pattern along the first twenty residues by hand and count disagreements at each position. Your hit count over that stretch should match the page's, and your best should be the same as the page's.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Allowance too generous</strong> — Two mismatches in a six-residue motif is a third of it. Hits become meaningless before the count becomes large.</li><li><strong>X in the sequence</strong> — An X in the protein stands for an unknown residue; here only X in the pattern is a wildcard.</li><li><strong>Case</strong> — Lower-case residues are read as the same letters. A soft-masked sequence is not treated as unreliable.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>No scoring matrix</strong> — Substitutions are counted as differences, not weighted by similarity. A conservative change and a radical one cost the same.</li><li><strong>No gaps</strong> — The pattern must align without insertions or deletions.</li><li><strong>One pattern at a time</strong> — A library of motifs has to be searched one after another.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Fuzzy Protein Search Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>It is used to find a signal peptide in a divergent protein, to check whether a point mutant still carries its motif, and to pull candidate family members out of a list when the sequences are related but not identical.</p><p>A good way to decide the allowance is to run the same search at zero, one and two mismatches and watch how the hit count grows. If it doubles at one mismatch and doubles again at two, the motif is short and the results describe chance. If it stays small and the best mismatch count is zero or one, the hits are likely real relatives.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does X mean in the pattern?', 'a' => 'Any residue at all. It costs nothing and is the usual way to allow the one position that varies between family members.'],
            ['q' => 'Should I allow mismatches at all?', 'a' => 'For a well-conserved motif, one is usually plenty. If you need two in a short pattern you are probably describing chance rather than biology.'],
            ['q' => 'Does Fuzzy Protein Search Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/photosynthesis-rate', 'name' => 'Photosynthesis Rate Calculator'],
            ['path' => '/biology/pig-weight', 'name' => 'Pig Weight Calculator'],
            ['path' => '/biology/pine-straw', 'name' => 'Pine straw'],
        ],
        'authors' => [],
    ],
];
