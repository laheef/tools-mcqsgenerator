<?php

/**
 * Codon Usage Calculator
 * /biology/codon-usage-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Codon Usage Calculator',
    'engine' => 'script',
    'engine_note' => 'reads a coding sequence and counts every codon, then reports GC3s, start and stop codons and the number of distinct codons',
    'meta' => ['title' => 'Codon Usage Calculator for DNA: GC3, Stops, Rare Codons', 'description' => 'Paste a coding sequence and read its codon count, GC content at third positions, stop codons, distinct codons used and rare codons in the chosen frame.', 'h1' => 'Codon Usage Calculator', 'updated' => '2026-10-29'],
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
                        [
                            'name' => 'sequence',
                            'label' => 'Coding sequence',
                            'type' => 'text',
                            'help' => 'Paste DNA; FASTA headers, spaces and digits are ignored',
                            'default' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGAAATTTGGGCCCAAATTT',
                        ],
                        [
                            'name' => 'frame',
                            'label' => 'Reading frame',
                            'type' => 'select',
                            'options' => ['Frame 1' => '0', 'Frame 2' => '1', 'Frame 3' => '2'],
                            'help' => 'Frame 1 starts at the first base',
                            'default' => 'Frame 1',
                        ],
                        [
                            'name' => 'codons',
                            'label' => 'Complete codons',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gc3',
                            'label' => 'GC at the third position',
                            'type' => 'result',
                            'suffix' => '%',
                            'help' => 'A high GC3 usually means a GC-rich organism',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'stops',
                            'label' => 'Stop codons',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'distinct',
                            'label' => 'Different codons used',
                            'type' => 'result',
                            'suffix' => 'of 64',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rare',
                            'label' => 'Rare codons',
                            'type' => 'result',
                            'help' => 'Under 10% within a family that appears at least five times — candidates for codon optimisation',
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
    
      omni.onResult(['sequence', 'frame'], function (ctx) {
        var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
        // the select's slug is "frame-2" for the second frame
        var frameSlug = String(ctx.getChoice('frame') || '');
        var frame = parseInt(frameSlug.replace(/\D/g, ''), 10) - 1;
        if (!isFinite(frame) || frame < 0 || frame > 2) frame = 0;
        if (seq.length < 3) {
          ctx.addHtml(block('Codon usage', '—', 'Paste a coding sequence of at least three bases.'));
          return;
        }
        var counts = {}, total = 0, stops = 0, gc3 = 0, aaCount = {}, aaSyn = {};
        eachCodon(seq, frame, function (codon) {
          var aa = aaOf(codon);
          if (!aa) return;
          total++;
          if (aa === '*') { stops++; return; }
          counts[codon] = (counts[codon] || 0) + 1;
          aaCount[aa] = (aaCount[aa] || 0) + 1;
          if (codon.charAt(2) === 'G' || codon.charAt(2) === 'C') gc3++;
        });
        if (!total) {
          ctx.addHtml(block('Codon usage', '—', 'No complete codon in this frame.'));
          return;
        }
        // Degeneracy of each amino acid in the standard code. It is a property of the
        // code, not of this sequence: counting the distinct codons *used* would give
        // a family of one for any amino acid the gene spells only one way, and RSCU
        // would then be wrong by the missing synonyms.
        var DEGEN = {F: 2, L: 6, S: 6, Y: 2, C: 2, W: 1, P: 4, H: 2, Q: 2, R: 6, I: 3,
                     T: 4, N: 2, K: 2, M: 1, V: 4, A: 4, D: 2, E: 2, G: 4};
        aaSyn = DEGEN;
    
        var rare = 0;
        var rows = Object.keys(counts).sort(function (a, b) { return counts[b] - counts[a]; })
          .map(function (c) {
            var aa = aaOf(c);
            var family = aaCount[aa] || 1, syn = aaSyn[aa] || 1;
            var rscu = (counts[c] * syn) / family;
            var share = counts[c] / family;
            // Only meaningful where the amino acid appears often enough for a share
            // to mean anything: one occurrence in a family is always 100%.
            if (family >= 5 && share < 0.10 && syn > 1) rare++;
            return [c, aa, String(counts[c]), pct1(share * 100) + '%', rscu.toFixed(2)];
          });
    
        ctx.exportValue('codons', total - stops);
        ctx.exportValue('gc3', Math.round(gc3 / total * 1000) / 10);
        ctx.exportValue('stops', stops);
        ctx.exportValue('distinct', Object.keys(counts).length);
        ctx.exportValue('rare', rare);
    
        ctx.addHtml(block('Summary',
          (total - stops) + ' sense codons · ' + (stops ? stops + ' stop codon' + (stops > 1 ? 's' : '')
            : 'no stop codon in frame ' + (frame + 1))
          + '\nGC3 ' + pct1(gc3 / total * 100) + '% · ' + Object.keys(counts).length + ' different codons used',
          'RSCU above 1 means the codon is used more often than a flat distribution within its family.'));
        ctx.addHtml(table('Codons in this sequence', ['Codon', 'AA', 'Count', 'Share in family', 'RSCU'],
          rows.slice(0, 40),
          rows.length > 40 ? 'Showing the 40 most used of ' + rows.length + ' codons.' : ''));
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        The codon usage calculator counts what a coding sequence is actually made of: how many codons it holds, how many distinct ones it uses, how GC-rich the third position is, and whether any stops fall inside the frame.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It gives you the raw composition of a coding sequence in codons rather than in bases: the total, the number of different codons, the GC3s value that bacterial gene-finders rely on, and the stop codons that should not be there.</p><p>The paste is cleaned and cut into codons from the frame you choose — frame 1 starts at the first base, frame 2 at the second, frame 3 at the third. Each codon is counted, the third base of each is tested for G or C, and stop codons are tallied separately. The distinct count is the number of different codons that appear at least once.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 things to fill in, and the order does not matter:</p><ul><li><strong>Coding sequence</strong> — a text box. Paste DNA; FASTA headers, spaces and digits are ignored.</li><li><strong>Reading frame</strong> — a drop-down with the choices the page offers. Frame 1 starts at the first base.</li></ul><p>The answer comes back as 5 boxes: Complete codons, GC at the third position (%), Stop codons, Different codons used (of 64), Rare codons. They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Coding sequence</strong> is a text box. Paste DNA; FASTA headers, spaces and digits are ignored Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Reading frame</strong> is a drop-down with the choices the page offers. The choices are Frame 1, Frame 2 and Frame 3. Frame 1 starts at the first base Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Coding sequence</th><td>ATGGCTGCTAAAATTGAACGTCTGAAACGTCTGGAAGATCTGAAACGTGCT</td></tr><tr><th>Reading frame</th><td>Frame 1</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Complete codons</th><td>17</td></tr><tr><th>GC at the third position</th><td>23.5 %</td></tr><tr><th>Stop codons</th><td>0</td></tr><tr><th>Different codons used</th><td>8 of 64</td></tr><tr><th>Rare codons</th><td>0</td></tr></tbody></table><p>Choosing frame 3 on the same 33-base paste leaves only three complete codons and catches one stop: exactly the kind of difference a frame choice makes. In frame 1 the same sequence reads as eleven codons with no stops at all.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Coding sequence</th><td>ATGTTTAAACCCGGGTTTAAAGGGCCC</td></tr><tr><th>Reading frame</th><td>Frame 2</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Complete codons</th><td>8</td></tr><tr><th>GC at the third position</th><td>50</td></tr><tr><th>Stop codons</th><td>0</td></tr><tr><th>Different codons used</th><td>7</td></tr><tr><th>Rare codons</th><td>0</td></tr></tbody></table><p>3 of the 5 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Codons</strong> — complete codons in the chosen frame.</li><li><strong>GC3s</strong> — the GC percentage at the third position of each codon, the classic signal for bacterial coding regions.</li><li><strong>Stops</strong> — stop codons inside the frame. In a real gene this should be one, at the end.</li><li><strong>Distinct codons</strong> — how many different codons appear; a 64-codon maximum, 61 for coding sequence.</li><li><strong>Rare codons</strong> — codons the reference table marks as poorly used in the chosen host.</li></ul><p>A high distinct count with a low codon count means a varied sequence; a low distinct count in a long gene means heavy repetition, which is worth knowing before you try to synthesise it. The GC3s figure is the one gene-finding tools compare against their thresholds, and an internal stop is an error to fix before anything else.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Divide the cleaned sequence length by three and compare with the codon count. Then count the stops by eye: TAA, TAG and TGA in frame should appear exactly once, at the end, for a complete gene.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>The frame selector</strong> — Frame 2 and frame 3 read the same paste in a different register. For a gene, frame 1 is almost always the one you want.</li><li><strong>Untrimmed flanks</strong> — Sequence before the start codon belongs to the 5′ UTR and shifts everything after it.</li><li><strong>Gel-purified fragments</strong> — A trace of a second product can add codons that are not really in your clone.</li><li><strong>Stops in the middle</strong> — One internal stop means a frameshift, a sequencing error or the wrong frame — not a rare event worth ignoring.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Counts only</strong> — The page does not tell you how well the sequence is expressed, only what it contains.</li><li><strong>One frame at a time</strong> — The figures describe the frame you selected; the other two are not shown.</li><li><strong>Threshold-dependent</strong> — The rare-codon count depends on the host table and its cut-off, so two tools can disagree about a borderline codon.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Codon Usage Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Codon usage comes up in cloning: confirming that an open reading frame is really open, checking a synthetic construct against the supplier's sequence, deciding whether a gene looks bacterial, and spotting the internal stop that explains why a protein never appeared.</p><p>The distinct-codon figure is the one people underuse. A 300-codon gene that uses only 25 different codons is repetitive, and repeat-rich genes are hard to synthesise and hard to assemble: the same short string occurs many times, which is exactly what recombination and synthesis errors like. A look at that number before ordering a gene can save a failed build.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why is GC3s used to find genes?', 'a' => <<<'TXT'
            Bacterial coding regions have a characteristic bias at the third position that non-coding DNA does not share, which makes it a useful signal for gene-finding algorithms.
            TXT],
            ['q' => 'My sequence has one internal stop — is the gene broken?', 'a' => 'Usually yes. Check for a frameshift or a sequencing error before anything else; a genuine read-through is rare and would need a specific context.'],
            ['q' => 'Why do the codon counts differ between tools?', 'a' => <<<'TXT'
            Because they cut the sequence at different starting points. A tool that trims to the first ATG and one that starts at the first pasted base will report different totals.
            TXT],
            ['q' => 'Does Codon Usage Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/solids-retention-time', 'name' => 'Solids Retention Time (SRT) Calculator'],
            ['path' => '/biology/solute-potential', 'name' => 'Solute Potential Calculator'],
            ['path' => '/biology/species-richness', 'name' => 'Species Richness Calculator'],
        ],
        'authors' => [],
    ],
];
