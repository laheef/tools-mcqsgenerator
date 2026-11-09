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
    'meta' => ['title' => 'Reverse Complement Calculator: Steps & Units', 'description' => 'Reverse Complement Calculator turns sequence and alphabet into length. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Reverse Complement Calculator', 'updated' => '2026-10-29'],
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
                            'type' => 'number',
                            'suffix' => 'bp',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gc',
                            'label' => 'GC content',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tm',
                            'label' => 'Melting temperature of the duplex',
                            'type' => 'number',
                            'suffix' => '°C',
                            'help' => 'Wallace under 14 nt, GC rule to 40 nt, long-duplex form above',
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
        var kind = /rna/i.test(String(ctx.getRawInput('alphabet') || '')) ? 'rna' : 'dna';
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
        Reverse Complement works out Length and GC content from Sequence, Alphabet and Base pairs per line. The arithmetic is the whole method: length is worked out from sequence by one formula, applied once. Length comes back in bp unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Reverse Complement calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Reverse Complement: it takes 3 numbers and reports Length, GC content and Melting temperature of the duplex.</p><p>What comes back is Length, GC content and Melting temperature of the duplex — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Sequence</strong> — a plain number, no unit. Paste DNA; spaces, line breaks and FASTA headers are ignored</li><li><strong>Alphabet</strong> — a plain number, no unit</li><li><strong>Base pairs per line</strong> — a plain number, no unit. 0 for one line</li></ul><p>What you get back is Length in bp, GC content in %, Melting temperature of the duplex in °C, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Length is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Length, GC content and Melting temperature of the duplex are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Sequence left as a guess.</strong> Anything typed into Sequence is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Alphabet left as a guess.</strong> Anything typed into Alphabet is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Base pairs per line left as a guess.</strong> Anything typed into Base pairs per line is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Sequence to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Sequence</strong> takes a plain number with no unit attached. Paste DNA; spaces, line breaks and FASTA headers are ignored. Have it to hand before you start: Sequence is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Alphabet</strong> takes a plain number with no unit attached. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Alphabet is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Base pairs per line</strong> takes a plain number with no unit attached. 0 for one line. Have it to hand before you start: Base pairs per line is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Length</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>GC content</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Melting temperature of the duplex</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Pasting the sequence correctly', 'html' => <<<'TXT'
            <p>The box labelled <strong>Sequence</strong> is the input the whole page is built around. It holds characters, and the page reads every one of them.</p><ul><li><strong>No header line.</strong> If the text was copied out of a file, check that the first line is not a description. Anything before the first real base or residue is counted as data.</li><li><strong>No spaces or line numbers.</strong> Sequence viewers wrap the text and number the lines. The numbers are not part of the sequence, and a paste that includes them will fail or, worse, half-succeed.</li><li><strong>Case is a choice you make.</strong> Many tools treat upper and lower case as the same letters and others do not. Paste the sequence in the case that carries the meaning you intend.</li><li><strong>Ambiguous characters are not rare.</strong> An N in a sequence, an X in a protein, or an IUPAC code standing for two possible bases is a real value, not a typo. The page will count it; interpret the answer with that in mind.</li></ul><p>Paste once, check the first and last few characters of what landed in the box, and then read Length, GC content and Melting temperature of the duplex. If one of those figures is impossible — a length that does not match the text, a count larger than the sequence — the paste is the thing to look at first, not the formula.</p>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Reverse Complement is not a single equation with a single answer. It reads Sequence, Alphabet and Base pairs per line, applies the analysis the page is built around, and reports Length, GC content and Melting temperature of the duplex.</p><p>That work happens in your browser, on the text you paste, and nothing is sent anywhere to be analysed. Close the tab and the sequence is gone; there is no record of it on the server and no account attached to it.</p><p>What that means in practice is that the answer is only as good as the text you give it. A stray character, a line break in the wrong place or a lower-case where the format expects upper-case will change the result, and the page has no way to know which of those happened — it analyses exactly what it is handed.</p><p>The results to look at are Length, GC content and Melting temperature of the duplex. They are reported together because they describe the same input from different angles, and reading one without the others is how a plausible number gets mistaken for a good one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Sequence, Alphabet and Base pairs per line. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Sequence into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Length in bp with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Length is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Sequence, Alphabet and Base pairs per line and the number you are missing is Length and GC content.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Reverse Complement is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Sequence, Alphabet and Base pairs per line beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Reverse Complement calculator work out?', 'a' => 'Length, GC content and Melting temperature of the duplex.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Sequence, Alphabet, Base pairs per line. With sequence, alphabet and base pairs per line in place, Length can stay blank and the page will work it out.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Length is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'Every box has to have a number in it. What this page returns is Length, so an empty input simply leaves the result blank rather than choosing a new unknown.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Length keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/enzyme-specific-activity-yield', 'name' => 'Enzyme Kinetics: Specific Activity and Yield Calculator'],
            ['path' => '/biology/enzyme-unit-converter', 'name' => 'Enzyme Unit Converter (U/mg, kcat) Calculator'],
            ['path' => '/biology/exponential-population-growth', 'name' => 'Exponential Population Growth Calculator'],
        ],
        'authors' => [],
    ],
];
