<?php

/**
 * Random Sequence Generator Calculator
 * /biology/random-sequence-generator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Random Sequence Generator Calculator',
    'engine' => 'script',
    'engine_note' => 'generates a random sequence at the requested length and composition and reports its GC content',
    'meta' => ['title' => 'Random DNA and RNA Sequence Generator with a Fixed Seed', 'description' => 'Generate a random DNA or RNA sequence of any length with a target GC content, a fixed seed so the result repeats, and an optional start codon at the front.', 'h1' => 'Random Sequence Generator Calculator', 'updated' => '2026-10-29'],
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
                            'name' => 'kind',
                            'label' => 'Alphabet',
                            'type' => 'select',
                            'options' => ['DNA (ACGT)' => 'dna', 'RNA (ACGU)' => 'rna'],
                            'default' => 'DNA (ACGT)',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Length',
                            'type' => 'number',
                            'suffix' => 'residues',
                            'help' => '1 to 100 000',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'gc',
                            'label' => 'Target GC content',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'DNA and RNA only',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'seed',
                            'label' => 'Seed',
                            'type' => 'number',
                            'help' => 'Same seed, same sequence — any whole number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '42',
                        ],
                        [
                            'name' => 'gc_actual',
                            'label' => 'GC content of the output',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'start',
                            'label' => 'Make the sequence start with ATG',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'help' => 'DNA only — gives you a start codon',
                            'default' => 'No',
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
    
      function mulberry32(a) {
        return function () {
          a |= 0; a = (a + 0x6D2B79F5) | 0;
          var t = Math.imul(a ^ (a >>> 15), 1 | a);
          t = (t + Math.imul(t ^ (t >>> 7), 61 | t)) ^ t;
          return ((t ^ (t >>> 14)) >>> 0) / 4294967296;
        };
      }
      omni.onResult(['kind', 'length', 'gc', 'seed', 'start'], function (ctx) {
        var kind = resolve(ctx.getChoice('kind'), { dna: 'dna', rna: 'rna', protein: 'protein' }, 'dna');
        var n = Math.round(Number(ctx.getRawInput('length')) || 0);
        if (!(n > 0)) n = 0;
        n = Math.min(n, 100000);
        var gcTarget = Math.max(0, Math.min(100, Number(ctx.getRawInput('gc')) || 0));
        var seed = Math.round(Number(ctx.getRawInput('seed')) || 0);
        var start = /true|yes|1/i.test(String(ctx.getChoice('start') || ''));
        if (!n) {
          ctx.addHtml(block('Random sequence', '—', 'Enter a length between 1 and 100 000.'));
          ctx.exportValue('gc_actual', 0);
          return;
        }
        var rnd = mulberry32(seed);
        var seq = '', counts = {}, i, ch;
        var seqAlpha = kind === 'protein' ? 'ACDEFGHIKLMNPQRSTVWY' : (kind === 'rna' ? 'ACGU' : 'ACGT');
        var gcPair = kind === 'rna' ? ['G', 'C'] : ['G', 'C'];
        for (i = 0; i < n; i++) {
          if (kind === 'protein') ch = seqAlpha.charAt(Math.floor(rnd() * seqAlpha.length) % seqAlpha.length);
          else {
            var r = rnd() * 100;
            if (r < gcTarget / 2) ch = gcPair[0];
            else if (r < gcTarget) ch = gcPair[1];
            else ch = (rnd() < 0.5 ? 'A' : (kind === 'rna' ? 'U' : 'T'));
          }
          seq += ch;
          counts[ch] = (counts[ch] || 0) + 1;
        }
        if (kind !== 'protein' && start && n >= 3) {
          seq = 'ATG' + seq.slice(3);
          counts = {};
          for (i = 0; i < seq.length; i++) { ch = seq.charAt(i); counts[ch] = (counts[ch] || 0) + 1; }
        }
        var gcN = (counts.G || 0) + (counts.C || 0);
        var pct = kind === 'protein' ? 0 : gcN / n * 100;
        ctx.exportValue('gc_actual', Math.round(pct * 100) / 100);
        var rows = [];
        var keys = Object.keys(counts).sort();
        for (i = 0; i < keys.length; i++) {
          rows.push([keys[i], String(counts[keys[i]]), (counts[keys[i]] / n * 100).toFixed(2) + ' %']);
        }
        var kindName = kind === 'protein' ? 'protein' : (kind === 'rna' ? 'RNA' : 'DNA');
        var head = block('Random ' + kindName + ' sequence — seed ' + seed,
          'Length      ' + n + '\nSeed        ' + seed
          + (kind === 'protein' ? '\nAlphabet    20 standard residues, uniform'
                                : '\nTarget GC   ' + gcTarget + ' %\nRealised GC ' + pct.toFixed(2) + ' %')
          + (start && kind !== 'protein' ? '\nStart       ATG forced at position 1' : ''),
          'Reuse the seed and the length to get this exact sequence again.');
        ctx.addHtml(head + block('Sequence', wrap(seq, 60)) + table('Composition', ['Symbol', 'Count', 'Share'], rows));
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Random sequences are the null hypothesis of molecular biology: if a motif appears in one, it appeared by chance. This page generates them to a chosen length and GC content, reproducibly, with an optional start codon at the front.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It builds a DNA or RNA sequence at the length you ask for, drawing bases so that the GC content lands near your target rather than drifting, and reports what GC content it actually produced.</p><p>The page splits the requested length into the number of G and C bases and the number of A and T bases that match your target percentage, then shuffles those bases with a pseudo-random generator seeded from the number you supply. A seed makes the run reproducible: the same seed and the same settings always give the same sequence. If you ask for a start codon, the first three bases are set to ATG and the rest of the sequence is drawn around it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 things to fill in, and the order does not matter:</p><ul><li><strong>Alphabet</strong> — a drop-down with the choices the page offers.</li><li><strong>Length</strong> — a number box. 1 to 100 000.</li><li><strong>Target GC content</strong> — a number box. DNA and RNA only.</li><li><strong>Seed</strong> — a number box. Same seed, same sequence — any whole number.</li><li><strong>Make the sequence start with ATG</strong> — a drop-down with the choices the page offers. DNA only — gives you a start codon.</li></ul><p>The answer comes back as 1 boxes: GC content of the output (%). They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Alphabet</strong> is a drop-down with the choices the page offers. The choices are DNA (ACGT) and RNA (ACGU). Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Length</strong> is a number box. 1 to 100 000 Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Target GC content</strong> is a number box. DNA and RNA only Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Seed</strong> is a number box. Same seed, same sequence — any whole number Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Make the sequence start with ATG</strong> is a drop-down with the choices the page offers. The choices are Yes and No. DNA only — gives you a start codon Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Length</th><td>60</td></tr><tr><th>Target GC content</th><td>50</td></tr><tr><th>Seed</th><td>7</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>GC content of the output</th><td>48.33 %</td></tr></tbody></table><p>Sixty bases at a requested 50 per cent GC came out at 48.33 per cent: with a fixed count of G and C there are only so many positions, and the page reports the achieved figure rather than the requested one.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Length</th><td>120</td></tr><tr><th>Target GC content</th><td>35</td></tr><tr><th>Seed</th><td>42</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>GC content of the output</th><td>40</td></tr></tbody></table><p>1 of the 1 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>GC content of the output</strong> — the GC percentage actually present in the generated sequence, which can differ from the target by rounding.</li></ul><p>The achieved GC content is the figure to quote. Because the page fixes the counts before shuffling, the achieved value is always close to the request, but it is the achieved value that describes the sequence on screen.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Count the Gs and Cs in the generated sequence and divide by the length; the result should match the reported percentage. Regenerate with the same seed and the same sequence should come back — that is the check that the seed is being honoured.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Assuming the target is exact</strong> — A fixed number of bases cannot always express a percentage exactly, so the achieved figure is the one to use.</li><li><strong>Comparing unseeded runs</strong> — Two random sequences differ by definition. Fix the seed when you need to compare two downstream results.</li><li><strong>Start codons</strong> — Asking for a start codon removes three bases from the random draw, which shifts the composition slightly.</li></ul><p>Nothing here is pasted from a file: every box is short enough to type, and the choice lists mean the answer depends on which entry is selected rather than on how it is spelled.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Uniform composition only</strong> — The generator matches GC content, not dinucleotide frequencies. Real genomes have structure that this does not reproduce.</li><li><strong>Not cryptographic</strong> — The pseudo-random generator is reproducible by design and is not suitable for anything security-related.</li><li><strong>Sequence only</strong> — It produces letters; it does not make a plausible gene, a promoter or a repeat.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Random Sequence Generator Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Random sequences are used as negative controls in motif searches, as null models when asking whether an observed GC content is unusual, as filler DNA in a construct, and as test input when checking that a pipeline handles sequence it has never seen.</p><p>A start codon is worth adding when the random sequence is going into a construct that will be translated: without one, the sequence is only useful as filler or as a null model, not as an open reading frame someone might express. The start codon is added after the rest of the sequence is drawn, so the GC content reported includes it and can sit a little away from the target when the length is short.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why is the GC content not exactly what I asked for?', 'a' => 'Because the number of bases is a whole number. The page builds as close as the length allows and reports what it made.'],
            ['q' => 'What is the seed for?', 'a' => 'Reproducibility. The same seed and settings always produce the same sequence, so two people can compare results on identical input.'],
            ['q' => 'Does Random Sequence Generator Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/atp-cellular-respiration-energy-yield', 'name' => 'ATP / Cellular Respiration Energy Yield Calculator'],
            ['path' => '/biology/autosomal-dominant-pedigree', 'name' => 'Autosomal Dominant Pedigree Analyzer Calculator'],
            ['path' => '/biology/autosomal-recessive-risk', 'name' => 'Autosomal Recessive Inheritance Risk Calculator'],
        ],
        'authors' => [],
    ],
];
