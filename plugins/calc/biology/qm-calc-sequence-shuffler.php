<?php

/**
 * DNA Sequence Shuffler
 * /biology/sequence-shuffler
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DNA Sequence Shuffler',
    'meta' => ['title' => 'DNA Sequence Shuffler Calculator: Steps & Units', 'description' => 'DNA Sequence Shuffler works out length and GC content from sequence and shuffle by. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'DNA Sequence Shuffler', 'updated' => '2026-10-29'],
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
                        0,
                        1,
                        1,
                        1,
                        1,
                    ],
                    'fields' => [
                        [
                            'name' => 'sequence',
                            'label' => 'Sequence',
                            'type' => 'text',
                            'help' => 'Paste DNA or protein; headers, spaces and digits are ignored',
                            'default' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGAAATTTGGGCCCAAATTT',
                        ],
                        [
                            'name' => 'mode',
                            'label' => 'Shuffle by',
                            'type' => 'select',
                            'options' => ['Single bases' => 'mono', 'Dinucleotides' => 'di'],
                            'help' => 'Dinucleotide shuffling keeps the same pairs, so dinucleotide biases survive',
                            'default' => 'Single bases',
                        ],
                        [
                            'name' => 'type',
                            'label' => 'Molecule',
                            'type' => 'select',
                            'options' => ['DNA' => 'dna', 'Protein' => 'protein'],
                            'default' => 'DNA',
                        ],
                        [
                            'name' => 'seed',
                            'label' => 'Random seed',
                            'type' => 'number',
                            'help' => 'Same seed, same result — useful for reproducible nulls',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '42',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gc_pct',
                            'label' => 'GC content',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Unchanged by mononucleotide shuffling',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'changes',
                            'label' => 'Positions changed',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hamming',
                            'label' => 'Difference from the input',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
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
    
      function mulberry32(a) {
        return function () {
          a |= 0; a = a + 0x6D2B79F5 | 0;
          var t = Math.imul(a ^ a >>> 15, 1 | a);
          t = t + Math.imul(t ^ t >>> 7, 61 | t) ^ t;
          return ((t ^ t >>> 14) >>> 0) / 4294967296;
        };
      }
      function shuffleMono(s, rnd) {
        var a = s.split('');
        for (var i = a.length - 1; i > 0; i--) {
          var j = Math.floor(rnd() * (i + 1));
          var t = a[i]; a[i] = a[j]; a[j] = t;
        }
        return a.join('');
      }
      function shuffleDi(s, rnd) {
        // Altschul-Erikson style: repeatedly pick a random dinucleotide and swap its
        // two occurrences of the second base. Keeps every dinucleotide count intact.
        if (s.length < 4) return shuffleMono(s, rnd);
        var a = s.split('');
        var tries = Math.max(50, a.length * 12);
        for (var k = 0; k < tries; k++) {
          var i = Math.floor(rnd() * (a.length - 1));
          var j = Math.floor(rnd() * (a.length - 1));
          if (i === j) continue;
          var b = a[i + 1], c = a[j + 1];
          if (a[i] === a[j] || b === c) continue;
          a[i + 1] = c; a[j + 1] = b;
        }
        return a.join('');
      }
      omni.onResult(['sequence', 'mode', 'type', 'seed'], function (ctx) {
        var kind = /protein/i.test(String(ctx.getRawInput('type') || '')) ? 'protein' : 'dna';
        var seq = cleanSeq(ctx.getRawInput('sequence'), kind);
        if (!seq) {
          ctx.addHtml(block('Shuffled sequence', '—', 'Paste a sequence to shuffle.'));
          return;
        }
        var seed = Number(ctx.getRawInput('seed'));
        if (!isFinite(seed)) seed = 42;
        var rnd = mulberry32(Math.floor(seed) || 1);
        var mode = /dinucleotide/i.test(String(ctx.getRawInput('mode') || '')) ? 'di' : 'mono';
        var out = seq.length < 2 ? seq : (mode === 'di' ? shuffleDi(seq, rnd) : shuffleMono(seq, rnd));
    
        var changed = 0;
        for (var i = 0; i < seq.length; i++) if (seq.charAt(i) !== out.charAt(i)) changed++;
        var pctChanged = seq.length ? changed / seq.length * 100 : 0;
        var gc = kind === 'dna' ? gcOf(out) : 0;
        var pctGC = kind === 'dna' && out.length ? gc / out.length * 100 : 0;
    
        ctx.exportValue('length', out.length);
        if (kind === 'dna') ctx.exportValue('gc_pct', Math.round(pctGC * 100) / 100);
        ctx.exportValue('changes', changed);
        ctx.exportValue('hamming', Math.round(pctChanged * 10) / 10);
    
        ctx.addHtml(block('Shuffled ' + (kind === 'dna' ? 'DNA' : 'protein') + ' ('
          + (mode === 'di' ? 'dinucleotide' : 'mononucleotide') + ' preserving, seed ' + seed + ')',
          wrap(out, 60),
          out.length + ' residues · ' + changed + ' positions changed ('
          + pct1(pctChanged) + '%)'
          + (kind === 'dna' ? ' · GC ' + pct1(pctGC) + '%, identical to the input' : '')));
        if (seq.length < 4) {
          ctx.addHtml(block('Too short to shuffle',
            'A sequence of ' + seq.length + ' residue' + (seq.length === 1 ? '' : 's')
            + ' has only one possible arrangement.'));
        }
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        DNA Sequence Shuffler works out Length and GC content from Sequence, Shuffle by and Molecule. Nothing is looked up on this page: length is computed from sequence and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the DNA Sequence Shuffler calculator works', 'html' => <<<'TXT'
            <p>DNA Sequence Shuffler answers one question from 4 numbers, and the answer is Length, GC content and Positions changed.</p><p>The answers are Length, GC content, Positions changed and Difference from the input; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Sequence</strong> — a plain number, no unit. Paste DNA or protein; headers, spaces and digits are ignored</li><li><strong>Shuffle by</strong> — a plain number, no unit. Dinucleotide shuffling keeps the same pairs, so dinucleotide biases survive</li><li><strong>Molecule</strong> — a plain number, no unit</li><li><strong>Random seed</strong> — a plain number, no unit. Same seed, same result — useful for reproducible nulls</li></ul><p>The answers come back as Length, GC content in %, Positions changed, Difference from the input in %. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Length is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Length, GC content and Positions changed are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Sequence left as a guess.</strong> Anything typed into Sequence is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Shuffle by left as a guess.</strong> Anything typed into Shuffle by is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Molecule left as a guess.</strong> Anything typed into Molecule is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Sequence to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Sequence</strong> takes a plain number with no unit attached. Paste DNA or protein; headers, spaces and digits are ignored. Have it to hand before you start: Sequence is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Shuffle by</strong> takes a plain number with no unit attached. Dinucleotide shuffling keeps the same pairs, so dinucleotide biases survive. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Shuffle by is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Molecule</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Molecule is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Random seed</strong> takes a plain number with no unit attached. Same seed, same result — useful for reproducible nulls. Have it to hand before you start: Random seed is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Length</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>GC content</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Positions changed</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Difference from the input</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Pasting the sequence correctly', 'html' => <<<'TXT'
            <p>The box labelled <strong>Sequence</strong> is the input the whole page is built around. It holds characters, and the page reads every one of them.</p><ul><li><strong>No header line.</strong> If the text was copied out of a file, check that the first line is not a description. Anything before the first real base or residue is counted as data.</li><li><strong>No spaces or line numbers.</strong> Sequence viewers wrap the text and number the lines. The numbers are not part of the sequence, and a paste that includes them will fail or, worse, half-succeed.</li><li><strong>Case is a choice you make.</strong> Many tools treat upper and lower case as the same letters and others do not. Paste the sequence in the case that carries the meaning you intend.</li><li><strong>Ambiguous characters are not rare.</strong> An N in a sequence, an X in a protein, or an IUPAC code standing for two possible bases is a real value, not a typo. The page will count it; interpret the answer with that in mind.</li></ul><p>Paste once, check the first and last few characters of what landed in the box, and then read Length, GC content, Positions changed and Difference from the input. If one of those figures is impossible — a length that does not match the text, a count larger than the sequence — the paste is the thing to look at first, not the formula.</p>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>DNA Sequence Shuffler is not a single equation with a single answer. It reads Sequence, Shuffle by, Molecule and Random seed, applies the analysis the page is built around, and reports Length, GC content, Positions changed and Difference from the input.</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Length, GC content, Positions changed and Difference from the input. They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Sequence, Shuffle by, Molecule and Random seed. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Sequence into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Length with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Length is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Sequence, Shuffle by and Molecule is what you already know and Length and GC content is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the DNA Sequence Shuffler calculator work out?', 'a' => 'Length, GC content, Positions changed and Difference from the input.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Sequence, Shuffle by, Molecule, Random seed. Enter sequence, shuffle by and molecule; Length is the box to leave alone unless it is the value you came for.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Length is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'Every box has to have a number in it. What this page returns is Length, so an empty input simply leaves the result blank rather than choosing a new unknown.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Length at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/sds-page-gel', 'name' => 'SDS-PAGE Gel Calculator'],
            ['path' => '/biology/seeding-rate', 'name' => 'Seeding Rate and Plants per Hectare Calculator'],
            ['path' => '/biology/serial-dilution-planner', 'name' => 'Serial Dilution Planner Calculator'],
        ],
        'authors' => [],
    ],
];
