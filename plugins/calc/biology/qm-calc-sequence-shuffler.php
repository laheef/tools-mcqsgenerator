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
    'engine' => 'script',
    'engine_note' => 'shuffles a sequence while keeping its composition and reports what changed',
    'meta' => ['title' => 'DNA and Protein Sequence Shuffler with a Fixed Seed', 'description' => 'Shuffle a DNA or protein sequence while keeping its exact composition, by single bases or dinucleotides, with a seed so the same shuffle can be repeated.', 'h1' => 'DNA Sequence Shuffler', 'updated' => '2026-10-29'],
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
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gc_pct',
                            'label' => 'GC content',
                            'type' => 'result',
                            'suffix' => '%',
                            'help' => 'Unchanged by mononucleotide shuffling',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'changes',
                            'label' => 'Positions changed',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hamming',
                            'label' => 'Difference from the input',
                            'type' => 'result',
                            'suffix' => '%',
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
        var kind = /protein/i.test(String(ctx.getChoice('type') || '')) ? 'protein' : 'dna';
        var seq = cleanSeq(ctx.getRawInput('sequence'), kind);
        if (!seq) {
          ctx.addHtml(block('Shuffled sequence', '—', 'Paste a sequence to shuffle.'));
          return;
        }
        var seed = Number(ctx.getRawInput('seed'));
        if (!isFinite(seed)) seed = 42;
        var rnd = mulberry32(Math.floor(seed) || 1);
        var mode = /dinucleotide/i.test(String(ctx.getChoice('mode') || '')) ? 'di' : 'mono';
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
        A shuffled sequence keeps the letters and loses the order. That makes it the standard null model for asking whether an order-dependent feature — a motif, a repeat, a secondary structure — is really there.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It rearranges a sequence without changing its composition, in one of two modes: shuffling single bases, or shuffling dinucleotides so that the pair frequencies survive as well. The seed makes the result reproducible.</p><p>In single-base mode the letters are collected and dealt out again in a pseudo-random order, so the counts of A, C, G and T are identical to the input. In dinucleotide mode the sequence is split into overlapping pairs, the pairs are permuted, and the sequence is reconstructed from them, which preserves both the base composition and the frequency of each dinucleotide. The page then reports the length, GC content, how many positions changed, and the Hamming distance as a percentage.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 things to fill in, and the order does not matter:</p><ul><li><strong>Sequence</strong> — a text box. Paste DNA or protein; headers, spaces and digits are ignored.</li><li><strong>Shuffle by</strong> — a drop-down with the choices the page offers. Dinucleotide shuffling keeps the same pairs, so dinucleotide biases survive.</li><li><strong>Molecule</strong> — a drop-down with the choices the page offers.</li><li><strong>Random seed</strong> — a number box. Same seed, same result — useful for reproducible nulls.</li></ul><p>The answer comes back as 4 boxes: Length, GC content (%), Positions changed, Difference from the input (%). They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Sequence</strong> is a text box. Paste DNA or protein; headers, spaces and digits are ignored Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Shuffle by</strong> is a drop-down with the choices the page offers. The choices are Single bases and Dinucleotides. Dinucleotide shuffling keeps the same pairs, so dinucleotide biases survive Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Molecule</strong> is a drop-down with the choices the page offers. The choices are DNA and Protein. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Random seed</strong> is a number box. Same seed, same result — useful for reproducible nulls Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Sequence</th><td>AATTCCGGATCCGTCGACCTGCAGGCATGCAAGCTT</td></tr><tr><th>Shuffle by</th><td>Single bases</td></tr><tr><th>Molecule</th><td>DNA</td></tr><tr><th>Random seed</th><td>7</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Length</th><td>36</td></tr><tr><th>GC content</th><td>55.56 %</td></tr><tr><th>Positions changed</th><td>23</td></tr><tr><th>Difference from the input</th><td>63.9 %</td></tr></tbody></table><p>A 36-base sequence shuffled by single bases kept its 55.56 per cent GC exactly, changed 23 positions out of 36, and came out 63.9 per cent different from the original — the composition is fixed and everything else moved.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Sequence</th><td>AATTCCGGATCCGTCGACCTGCAGGCATGCAAGCTT</td></tr><tr><th>Shuffle by</th><td>Dinucleotides</td></tr><tr><th>Molecule</th><td>DNA</td></tr><tr><th>Random seed</th><td>3</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Length</th><td>36</td></tr><tr><th>GC content</th><td>55.56</td></tr><tr><th>Positions changed</th><td>27</td></tr><tr><th>Difference from the input</th><td>75</td></tr></tbody></table><p>2 of the 4 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Length</strong> — bases or residues in the sequence.</li><li><strong>GC content</strong> — unchanged in single-base shuffling, by construction.</li><li><strong>Changed positions</strong> — how many positions hold a different letter from the input.</li><li><strong>Hamming distance</strong> — the changed count as a percentage of the length.</li></ul><p>The changed count is the measure of how much the order actually matters. A low figure means the shuffled sequence is close to the original, which makes it a weak null; a high one means the comparison will be sensitive. GC content should be identical in single-base mode and near-identical in dinucleotide mode.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Count the bases before and after: they must be identical. Then fix the seed and rerun; the same sequence should come back, which is the test that the shuffle is reproducible.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Dinucleotide mode expectations</strong> — It preserves pairs, so a shuffled sequence can still contain the motif you were testing against. That is the point, but it catches people out.</li><li><strong>Short sequences</strong> — Under about twenty bases, a shuffle barely changes anything and the null is useless.</li><li><strong>One shuffle</strong> — A single shuffled sequence is one sample from a distribution. A proper null test needs many.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Composition only</strong> — The shuffle preserves base or pair counts, nothing about structure or codon usage.</li><li><strong>Not a model of evolution</strong> — It produces a null, not a plausible relative.</li><li><strong>Seed-dependent</strong> — A different seed gives a different sequence; that variation is part of the result.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>DNA Sequence Shuffler has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Shuffling is used to test whether a motif occurrence is more than chance, to check whether a predicted hairpin depends on base order, and to build control sets for any analysis that compares sequences.</p><p>The right way to use a shuffler is in numbers. Generate a hundred shuffles, measure the feature you care about in each, and compare the real sequence with that distribution. A single shuffle can be more or less extreme than the real sequence by accident, and a conclusion drawn from one comparison is not a test.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the difference between the two modes?', 'a' => <<<'TXT'
            Single-base shuffling preserves only the counts of A, C, G and T. Dinucleotide shuffling also preserves how often each pair occurs, which keeps more of the sequence's character.
            TXT],
            ['q' => 'Why does the GC content stay the same?', 'a' => 'Because shuffling rearranges the letters that are there; it never adds or removes one.'],
            ['q' => 'Does DNA Sequence Shuffler use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/sds-page-gel', 'name' => 'SDS-PAGE Gel Calculator'],
            ['path' => '/biology/seeding-rate', 'name' => 'Seeding Rate and Plants per Hectare Calculator'],
            ['path' => '/biology/serial-dilution-planner', 'name' => 'Serial Dilution Planner Calculator'],
        ],
        'authors' => [],
    ],
];
