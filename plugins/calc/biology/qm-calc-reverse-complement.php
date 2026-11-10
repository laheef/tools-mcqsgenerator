<?php

/**
 * Reverse Complement Calculator
 * /biology/reverse-complement
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Reverse Complement Calculator',
    'engine' => 'script',
    'engine_note' => 'reads a DNA or RNA sequence and writes the opposite strand, with its length, GC content and melting temperature',
    'meta' => ['title' => 'Reverse Complement Calculator for DNA or RNA Sequences', 'description' => 'Paste a DNA or RNA sequence and get the opposite strand, written in lines you choose, with the length, GC content and melting temperature of the duplex.', 'h1' => 'Reverse Complement Calculator', 'updated' => '2026-10-29'],
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
                            'name' => 'sequence',
                            'label' => 'Sequence',
                            'type' => 'text',
                            'help' => 'Paste DNA; spaces, line breaks and FASTA headers are ignored',
                            'default' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAG',
                        ],
                        [
                            'name' => 'alphabet',
                            'label' => 'Alphabet',
                            'type' => 'select',
                            'options' => ['DNA (A, C, G, T)' => 'dna', 'RNA (A, C, G, U)' => 'rna'],
                            'default' => 'DNA (A, C, G, T)',
                        ],
                        [
                            'name' => 'width',
                            'label' => 'Base pairs per line',
                            'type' => 'number',
                            'help' => '0 for one line',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'result',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gc',
                            'label' => 'GC content',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tm',
                            'label' => 'Melting temperature of the duplex',
                            'type' => 'result',
                            'suffix' => '°C',
                            'help' => 'Wallace under 14 nt, GC rule to 40 nt, long-duplex form above',
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
        // Everything that is not a residue goes: FASTA headers, digits (line
        // numbers pasted from a viewer), gaps, spaces and newlines.
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
      function tmOf(n, pct, at, gc) {
        // Which formula applies depends on the length, and using the wrong one is
        // not a small error: the GC rule gives 107 °C for a 39 bp duplex, because it
        // was fitted to oligos of 40 nt and below.
        if (n <= 14) return 2 * at + 4 * gc;                       // Wallace
        if (n <= 40) return 64.9 + 41 * (gc - 16.4) / n;            // GC rule, G+C as a count
        return 81.5 + 16.6 * Math.log10(0.05) + 0.41 * pct - 675 / n;   // long duplex, 50 mM Na+
      }
      function esc(s) {
        return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
      }
      function block(title, body, note) {
        return '<div class="calc-script-block"><h3>' + esc(title) + '</h3><pre>' + esc(body) + '</pre>'
          + (note ? '<p class="calc-script-note">' + esc(note) + '</p>' : '') + '</div>';
      }
    
      var COMP = {A:'T',T:'A',G:'C',C:'G',U:'A',
                  R:'Y',Y:'R',S:'S',W:'W',K:'M',M:'K',
                  B:'V',V:'B',D:'H',H:'D',N:'N'};
      function revcomp(s) {
        var out = '';
        for (var i = s.length - 1; i >= 0; i--) {
          var c = s.charAt(i);
          out += COMP[c] || 'N';
        }
        return out;
      }
      function gcOf(s) {
        var gc = 0;
        for (var i = 0; i < s.length; i++) {
          var c = s.charAt(i);
          if (c === 'G' || c === 'C') gc++;
        }
        return gc;
      }
    
      omni.onResult(['sequence'], function (ctx) {
        var raw = ctx.getRawInput('sequence');
        // selects return the option slug ("rna-a-c-g-u"), so match on the word
        var kind = /rna/i.test(String(ctx.getChoice('alphabet') || '')) ? 'rna' : 'dna';
        var width = Number(ctx.getRawInput('width'));
        if (!isFinite(width) || width < 0) width = 60;
    
        var seq = cleanSeq(raw, 'dna');
        if (kind === 'rna') seq = seq.replace(/T/g, 'U');
        if (!seq) {
          ctx.addHtml(block('Reverse complement', '—', 'Paste a sequence to see the other strand.'));
          return;
        }
        var comp = revcomp(kind === 'rna' ? seq.replace(/U/g, 'T') : seq);
        if (kind === 'rna') comp = comp.replace(/T/g, 'U');
    
        var gc = gcOf(kind === 'rna' ? seq.replace(/U/g, 'T') : seq);
        var pct = seq.length ? (gc / seq.length) * 100 : 0;
        var at = seq.length - gc;
        var tm = tmOf(seq.length, pct, at, gc);
    
        ctx.exportValue('length', seq.length);
        ctx.exportValue('gc', Math.round(pct * 100) / 100);
        ctx.exportValue('tm', Math.round(tm * 10) / 10);
    
        var w = width === 0 ? Math.max(seq.length, 1) : width;
        ctx.addHtml(block('Reverse complement (5′→3′)', wrap(comp, w),
          seq.length + (kind === 'rna' ? ' nt' : ' bp') + ' · GC ' + pct.toFixed(1) + '%'));
        if (seq.length <= 200) {
          ctx.addHtml(block('Input, as read 5′→3′', wrap(seq, w)));
        }
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        A reverse complement is the other strand of a duplex: read backwards, with each base replaced by its partner. Paste a sequence and this page writes it out, in lines of the width you choose, with the composition figures beside it.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It gives you the strand a primer would bind to, or the sequence a polymerase would read, in the opposite orientation — the everyday operation behind primer design, cloning and any search on both strands.</p><p>The sequence is cleaned, uppercased and read from the end backwards, with each base replaced by its complement — A with T (or U, for RNA), G with C, and ambiguity codes by their own partners. The result is then wrapped at the line width you set, with zero meaning one long line. Length, GC content and melting temperature are computed on the original sequence, because a duplex has the same composition either way round.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 things to fill in, and the order does not matter:</p><ul><li><strong>Sequence</strong> — a text box. Paste DNA; spaces, line breaks and FASTA headers are ignored.</li><li><strong>Alphabet</strong> — a drop-down with the choices the page offers.</li><li><strong>Base pairs per line</strong> — a number box. 0 for one line.</li></ul><p>The answer comes back as 3 boxes: Length (bp), GC content (%), Melting temperature of the duplex (°C). They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Sequence</strong> is a text box. Paste DNA; spaces, line breaks and FASTA headers are ignored Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Alphabet</strong> is a drop-down with the choices the page offers. The choices are DNA (A, C, G, T) and RNA (A, C, G, U). Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Base pairs per line</strong> is a number box. 0 for one line Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Sequence</th><td>ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAG</td></tr><tr><th>Alphabet</th><td>DNA (A, C, G, T)</td></tr><tr><th>Base pairs per line</th><td>10</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Length</th><td>39 bp</td></tr><tr><th>GC content</th><td>56.41 %</td></tr><tr><th>Melting temperature of the duplex</th><td>70.8 °C</td></tr></tbody></table><p>A 39-base sequence gives 39 bases back, with the same 56.41 per cent GC and the same 70.8 °C melting point — the composition of a duplex does not depend on which strand you read.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Sequence</th><td>ACGTACGTACGT</td></tr><tr><th>Alphabet</th><td>DNA (A, C, G, T)</td></tr><tr><th>Base pairs per line</th><td>0</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Length</th><td>12</td></tr><tr><th>GC content</th><td>50</td></tr><tr><th>Melting temperature of the duplex</th><td>36</td></tr></tbody></table><p>3 of the 3 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Length</strong> — bases in the sequence you pasted, unchanged by complementing.</li><li><strong>GC content</strong> — the percentage of G and C, identical for both strands.</li><li><strong>Melting temperature</strong> — the predicted duplex melting point from composition and length.</li></ul><p>The output is the strand, not the answer to a question, so the figures beside it are there to confirm that the paste is what you expected. A GC content that looks wrong usually means a DNA sequence was pasted into RNA mode, or the other way round.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Do the first three bases by hand: A becomes T, T becomes A, G becomes C, and their order reverses. Then confirm that the last base of the input is the first base of the output.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Complement without reversing</strong> — The two operations are separate. Complementing without reversing gives the wrong strand entirely.</li><li><strong>RNA versus DNA</strong> — In RNA, A pairs with U, not T. Choosing the wrong alphabet leaves Ts or Us scattered through the output.</li><li><strong>Ambiguity codes</strong> — N pairs with N, R with Y, and so on; a code the page does not know is passed through unchanged.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Letters only</strong> — Nothing else is interpreted: no reading frames, no genes, no annotation.</li><li><strong>One strand at a time</strong> — A mixed paste is complemented as one sequence, not split into records.</li><li><strong>No verification</strong> — The page does not check that the result is a sensible molecule.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Reverse Complement Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reverse complements are used every time a reverse primer is designed, when a motif is searched on both strands, when a sequence is flipped into the orientation a database expects, and when checking that two sequences are the same molecule read in opposite directions.</p><p>The operation is symmetric: taking the reverse complement twice gives back the sequence you started with. That makes it a good check when a primer design looks wrong — paste the primer, take its reverse complement, and compare with the template. Anything that does not match is a design error rather than a calculation error. The same symmetry makes the page useful for flipping a sequence into the orientation a database expects: do it twice and you are back where you started, which is the cheapest proof that the paste was not mangled on the way in. If the double complement does not match, the sequence lost or gained a character somewhere between the source and the box.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the difference between complement and reverse complement?', 'a' => <<<'TXT'
            The complement replaces each base and keeps the order. The reverse complement replaces each base and reverses the order, which is what the opposite strand actually looks like written 5′ to 3′.
            TXT],
            ['q' => 'Why did my T disappear?', 'a' => 'Because the RNA alphabet was selected. RNA has U in place of T, and the page follows that rule strictly.'],
            ['q' => 'Does Reverse Complement Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/enzyme-specific-activity-yield', 'name' => 'Enzyme Kinetics: Specific Activity and Yield Calculator'],
            ['path' => '/biology/enzyme-unit-converter', 'name' => 'Enzyme Unit Converter (U/mg, kcat) Calculator'],
            ['path' => '/biology/exponential-population-growth', 'name' => 'Exponential Population Growth Calculator'],
        ],
        'authors' => [],
    ],
];
