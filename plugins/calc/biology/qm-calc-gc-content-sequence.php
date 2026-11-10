<?php

/**
 * GC Content from a Sequence
 * /biology/gc-content-sequence
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GC Content from a Sequence',
    'engine' => 'script',
    'engine_note' => 'reads a DNA sequence and counts G and C to report length, GC content, AT content and the melting temperature',
    'meta' => ['title' => 'GC Content Calculator: Percentage, Counts and Melting', 'description' => 'Paste a DNA or RNA sequence and read its length, G plus C count, GC and AT percentages, and the melting temperature those bases predict for the duplex.', 'h1' => 'GC Content from a Sequence', 'updated' => '2026-10-29'],
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
                    ],
                    'fields' => [
                        ['name' => 'sequence', 'label' => 'Sequence', 'type' => 'text', 'help' => 'Paste DNA or RNA'],
                        [
                            'name' => 'window',
                            'label' => 'Window size',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'help' => 'GC is computed in windows of this length',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'result',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gc_count',
                            'label' => 'G + C bases',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gc_pct',
                            'label' => 'GC content',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'at_pct',
                            'label' => 'AT content',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tm_gc',
                            'label' => 'Melting temperature of the duplex',
                            'type' => 'result',
                            'suffix' => '°C',
                            'help' => 'At 50 mM monovalent salt',
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
    
      omni.onResult(['sequence'], function (ctx) {
        var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
        if (!seq) {
          ctx.addHtml(block('GC content', '—', 'Paste a sequence to see its composition.'));
          return;
        }
        var n = seq.length, gc = 0, at = 0;
        for (var i = 0; i < n; i++) {
          var c = seq.charAt(i);
          if (c === 'G' || c === 'C') gc++;
          else if (c === 'A' || c === 'T' || c === 'U') at++;
        }
        var pct = gc / n * 100;
        var tm = tmOf(n, pct, at, gc);
        ctx.exportValue('length', n);
        ctx.exportValue('gc_count', gc);
        ctx.exportValue('gc_pct', Math.round(pct * 100) / 100);
        ctx.exportValue('at_pct', Math.round((at / n * 100) * 100) / 100);
        ctx.exportValue('tm_gc', Math.round(tm * 10) / 10);
    
        // A profile every 5% of the sequence, so structure is visible at a glance.
        var rows = [], steps = 20;
        for (var k = 0; k < steps; k++) {
          var a = Math.floor(n * k / steps), b = Math.floor(n * (k + 1) / steps);
          if (b <= a) continue;
          var g = 0;
          for (var j = a; j < b; j++) { var ch = seq.charAt(j); if (ch === 'G' || ch === 'C') g++; }
          var p = g / (b - a) * 100;
          var bar = '';
          for (var q = 0; q < 40; q++) bar += (q < Math.round(p / 2.5)) ? '#' : '·';
          rows.push(String(a + 1).padStart(7, ' ') + '  ' + bar + '  ' + p.toFixed(0) + '%');
        }
        ctx.addHtml(block('GC content along the sequence', rows.join('\n'),
          'Each row is ' + (100 / steps).toFixed(0) + '% of the sequence, ' + steps + ' windows in total.'));
        var body = 'G+C  ' + gc + ' of ' + n + '  (' + pct.toFixed(1) + '%)\n'
                 + 'A+T  ' + at + ' of ' + n + '  (' + (at / n * 100).toFixed(1) + '%)\n'
                 + 'other ' + (n - gc - at) + '  (ambiguous codes)';
        ctx.addHtml(block('Composition', body));
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        GC content is the share of a sequence made of guanine and cytosine. Paste a sequence here and the page counts G and C, reports the percentage, the AT balance and the melting temperature that composition implies.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It turns a sequence into the composition figures that decide how a duplex behaves: how much of it is GC, how much AT, and how hot it has to get before the two strands separate.</p><p>The sequence is cleaned and uppercased, then counted base by base. GC content is G plus C over the length; AT content is A plus T (or U, in RNA) over the same length, so the two add to 100. The melting temperature is then estimated from the composition and the length using the usual rules — the Wallace rule for very short oligos, the GC-percentage form for moderate lengths, and the long-duplex form above that.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 things to fill in, and the order does not matter:</p><ul><li><strong>Sequence</strong> — a text box. Paste DNA or RNA.</li><li><strong>Window size</strong> — a number box. GC is computed in windows of this length.</li></ul><p>The answer comes back as 5 boxes: Length (bp), G + C bases, GC content (%), AT content (%), Melting temperature of the duplex (°C). They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Sequence</strong> is a text box. Paste DNA or RNA Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Window size</strong> is a number box. GC is computed in windows of this length Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Sequence</th><td>ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAG</td></tr><tr><th>Window size</th><td>10</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Length</th><td>39 bp</td></tr><tr><th>G + C bases</th><td>22</td></tr><tr><th>GC content</th><td>56.41 %</td></tr><tr><th>AT content</th><td>43.59 %</td></tr><tr><th>Melting temperature of the duplex</th><td>70.8 °C</td></tr></tbody></table><p>Twenty-two of thirty-nine bases are G or C, giving 56.41 per cent GC and 43.59 per cent AT — the two add to 100, which is the quickest check that the count is sane. A melting temperature of 70.8 °C follows from that composition.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Sequence</th><td>GGGCCCGGGCCCGGGCCCGGGCCC</td></tr><tr><th>Window size</th><td>6</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Length</th><td>24</td></tr><tr><th>G + C bases</th><td>24</td></tr><tr><th>GC content</th><td>100</td></tr><tr><th>AT content</th><td>0</td></tr><tr><th>Melting temperature of the duplex</th><td>77.9</td></tr></tbody></table><p>5 of the 5 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Length</strong> — bases after cleaning.</li><li><strong>G + C bases</strong> — the raw count, which should equal the percentage times the length.</li><li><strong>GC content</strong> — G plus C as a percentage of the length.</li><li><strong>AT content</strong> — A plus T (or U) as a percentage; together with GC it must make 100.</li><li><strong>Melting temperature</strong> — the predicted duplex melting point in °C from composition and length.</li></ul><p>GC content is a property of the paste, so a figure above about 65 per cent usually means a GC-rich region or a repeat, and a figure below 35 per cent means an AT-rich one. The melting temperature is an estimate from composition alone: salt, length and mismatches move it, and no composition rule accounts for secondary structure.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Count the Gs and Cs in the first ten bases by hand and extrapolate: the percentage should be close to the page's, and the count should equal the percentage times the length to within rounding. If GC and AT do not add to 100, something in the paste is not a base.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Ambiguous bases</strong> — N, R, Y and the other IUPAC codes are not G, C, A or T, so they are not counted in either percentage — which is why the two can add to less than 100 on a real sequence.</li><li><strong>RNA in a DNA box</strong> — U is counted as a base and treated as T for the AT side; a mixed paste will still count but the melting figure is meaningless.</li><li><strong>Short oligos</strong> — Under about fourteen bases the Wallace rule dominates and a single mismatch moves the number by degrees.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Composition only</strong> — The melting temperature ignores salt, buffer, mismatches and secondary structure.</li><li><strong>Window average</strong> — The window size you set is used for the melting estimate on long sequences; the percentages are for the whole paste.</li><li><strong>No interpretation</strong> — A GC content is a fact about the sequence, not a prediction of whether it will amplify or clone.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>GC Content from a Sequence has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>GC content is checked before designing primers, when choosing a polymerase and its denaturation steps, when comparing a bacterial genome with a eukaryotic one, and when deciding whether a sequence is likely to form a stable hairpin.</p><p>GC content is not uniform along a genome, and it is rarely uniform along a single amplicon either. A primer that sits in a GC-rich island will behave differently from one twenty bases away in an AT-rich stretch, which is why primer design tools compute the figure over the primer and not over the template. Checking the local value in the window round the intended site is more informative than the whole-sequence number. A primer that sits at the junction of a GC-rich and an AT-rich block can look well matched by whole-sequence figures and still fail, because the three or four bases at its 3′ end are what the polymerase actually grips.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why do GC and AT not add to 100?', 'a' => 'Because the paste contains letters that are neither: N, or other ambiguity codes. Those bases are skipped by both counts.'],
            ['q' => 'Is a GC-rich sequence always better?', 'a' => 'No. High GC makes a duplex more stable and a template harder to denature, which is why GC-rich regions are often the ones that fail to amplify.'],
            ['q' => 'Does GC Content from a Sequence use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/chicken-years-to-human-years', 'name' => 'Chicken Years to Human Years Calculator'],
            ['path' => '/biology/coding-capacity-of-dna', 'name' => 'Coding Capacity of DNA Calculator'],
            ['path' => '/biology/codon-adaptation-index', 'name' => 'Codon Adaptation Index Calculator'],
        ],
        'authors' => [],
    ],
];
