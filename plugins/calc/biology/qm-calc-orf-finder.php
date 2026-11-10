<?php

/**
 * ORF Finder
 * /biology/orf-finder
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'ORF Finder',
    'engine' => 'script',
    'engine_note' => 'finds every open reading frame in a sequence and reports their count and the longest one',
    'meta' => ['title' => 'ORF Finder for DNA: Six Frames, Both Strands, Longest ORF', 'description' => 'Paste a DNA sequence to find every open reading frame above a length you set, on the forward and reverse strands, and see the longest and the stop count.', 'h1' => 'ORF Finder', 'updated' => '2026-10-29'],
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
                            'label' => 'DNA sequence',
                            'type' => 'text',
                            'help' => 'Paste DNA; FASTA headers and digits are ignored',
                            'default' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGAAATTTGGGCCCAAATTTTAATGA',
                        ],
                        [
                            'name' => 'min_aa',
                            'label' => 'Minimum protein length',
                            'type' => 'number',
                            'suffix' => 'aa',
                            'help' => 'Shorter ORFs are ignored',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'starts',
                            'label' => 'Count as a start',
                            'type' => 'select',
                            'options' => ['ATG only' => 'atg', 'ATG, GTG and TTG (bacterial)' => 'bacterial'],
                            'default' => 'ATG only',
                        ],
                        [
                            'name' => 'orfs',
                            'label' => 'Open reading frames',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'longest',
                            'label' => 'Longest ORF',
                            'type' => 'result',
                            'suffix' => 'aa',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'forward',
                            'label' => 'On the forward strand',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'reverse',
                            'label' => 'On the reverse strand',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'stops',
                            'label' => 'Stop codons in frame',
                            'type' => 'result',
                            'help' => 'All six frames together',
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
      var COMP = {A:'T',T:'A',G:'C',C:'G',U:'A',R:'Y',Y:'R',S:'S',W:'W',K:'M',M:'K',
                  B:'V',V:'B',D:'H',H:'D',N:'N'};
      function revcomp(s) {
        var out = '';
        for (var i = s.length - 1; i >= 0; i--) out += COMP[s.charAt(i)] || 'N';
        return out;
      }
    
      var CODON_TABLE = 'FFLLSSSSYY**CC*WLLLLPPPPHHQQRRRRIIIMTTTTNNKKSSRRVVVVAAAADDEEGGGG';
      var BASES = 'TCAG';
      function aaOf(codon) {
        var i1 = BASES.indexOf(codon.charAt(0)), i2 = BASES.indexOf(codon.charAt(1)),
            i3 = BASES.indexOf(codon.charAt(2));
        if (i1 < 0 || i2 < 0 || i3 < 0) return null;
        return CODON_TABLE.charAt(16 * i1 + 4 * i2 + i3);
      }
      function findOrfs(seq, frame, starts, minAa, strand) {
        var found = [], start = -1, stops = 0, i, codon, aa;
        for (i = frame; i + 3 <= seq.length; i += 3) {
          codon = seq.substr(i, 3);
          aa = aaOf(codon);
          if (aa === null) { start = -1; continue; }
          if (aa === '*') {
            stops++;
            if (start >= 0 && (i - start) / 3 >= minAa) {
              found.push({start: start, end: i + 3, aa: (i - start) / 3, strand: strand, frame: frame + 1});
            }
            start = -1;
            continue;
          }
          if (start < 0 && starts.indexOf(codon) >= 0) start = i;
        }
        // an ORF running to the end of the pasted sequence has no stop yet
        if (start >= 0 && (seq.length - start) / 3 >= minAa) {
          found.push({start: start, end: seq.length, aa: Math.floor((seq.length - start) / 3),
                      strand: strand, frame: frame + 1, open: true});
        }
        return {orfs: found, stops: stops};
      }
      omni.onResult(['sequence', 'min_aa', 'starts'], function (ctx) {
        var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
        var minAa = Number(ctx.getRawInput('min_aa'));
        if (!isFinite(minAa) || minAa < 1) minAa = 30;
        if (seq.length < 12) {
          ctx.addHtml(block('Open reading frames', '—', 'Paste at least a dozen bases.'));
          return;
        }
        var starts = /bacterial/i.test(String(ctx.getChoice('starts') || ''))
          ? ['ATG', 'GTG', 'TTG'] : ['ATG'];
        var rc = revcomp(seq);
        var all = [], stops = 0, i;
        for (i = 0; i < 3; i++) {
          var f = findOrfs(seq, i, starts, minAa, 'forward');
          all = all.concat(f.orfs); stops += f.stops;
          var r = findOrfs(rc, i, starts, minAa, 'reverse');
          all = all.concat(r.orfs); stops += r.stops;
        }
        all.sort(function (a, b) { return b.aa - a.aa; });
        var longest = all.length ? all[0].aa : 0;
        var fwd = all.filter(function (o) { return o.strand === 'forward'; }).length;
    
        ctx.exportValue('orfs', all.length);
        ctx.exportValue('longest', longest);
        ctx.exportValue('forward', fwd);
        ctx.exportValue('reverse', all.length - fwd);
        ctx.exportValue('stops', stops);
    
        if (!all.length) {
          ctx.addHtml(block('Open reading frames',
            'None of at least ' + minAa + ' aa',
            'No start codon in the six frames is followed by ' + minAa
            + ' codons without a stop. Lower the minimum length, or try the bacterial start set.'));
          return;
        }
        ctx.addHtml(block('Longest open reading frame',
          'Frame ' + (all[0].strand === 'forward' ? '+' : '−') + all[0].frame
          + ' · ' + all[0].aa + ' aa · ' + all[0].start + '–' + all[0].end + ' bp'
          + (all[0].open ? ' (runs to the end of the sequence)' : ''),
          all.length + ' ORF' + (all.length === 1 ? '' : 's') + ' of at least ' + minAa
          + ' aa · ' + fwd + ' on the forward strand, ' + (all.length - fwd) + ' on the reverse.'));
        ctx.addHtml(table('Open reading frames', ['Frame', 'From', 'To', 'Length (aa)', 'Start'],
          all.slice(0, 20).map(function (o) {
            return [(o.strand === 'forward' ? '+' : '−') + o.frame, String(o.start + 1),
                    String(o.end), String(o.aa), o.open ? 'no stop yet' : 'stop'];
          }),
          all.length > 20 ? 'Showing the 20 longest of ' + all.length + '.' : ''));
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        An open reading frame is a run of codons with no stop in it, read from a start codon. This page finds all of them on a sequence, on both strands, above whatever minimum length you set.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It scans a DNA sequence for every stretch that could encode a protein: start codon, then codons, then a stop. It reports how many there are, which strand they sit on, how long the longest is, and how many stops the sequence contains.</p><p>The sequence is cleaned and read in all three forward frames and all three reverse frames. In each frame the page looks for the start codons it has been told to accept — ATG alone, or ATG, GTG and TTG in bacterial mode — and follows each one until the next stop codon. Runs shorter than the minimum length you set are discarded. The reverse strand is built as the reverse complement and read the same way, with each ORF reported back in the coordinates of the strand you pasted.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 things to fill in, and the order does not matter:</p><ul><li><strong>DNA sequence</strong> — a text box. Paste DNA; FASTA headers and digits are ignored.</li><li><strong>Minimum protein length</strong> — a number box. Shorter ORFs are ignored.</li><li><strong>Count as a start</strong> — a drop-down with the choices the page offers.</li></ul><p>The answer comes back as 5 boxes: Open reading frames, Longest ORF (aa), On the forward strand, On the reverse strand, Stop codons in frame. They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>DNA sequence</strong> is a text box. Paste DNA; FASTA headers and digits are ignored Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Minimum protein length</strong> is a number box. Shorter ORFs are ignored Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Count as a start</strong> is a drop-down with the choices the page offers. The choices are ATG only and ATG, GTG and TTG (bacterial). Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>DNA sequence</th><td>ATGAAACCCGGGTTTAAACCCGGGTTTAAACCCGGGTAA</td></tr><tr><th>Minimum protein length</th><td>3</td></tr><tr><th>Count as a start</th><td>ATG only</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Open reading frames</th><td>1</td></tr><tr><th>Longest ORF</th><td>12 aa</td></tr><tr><th>On the forward strand</th><td>1</td></tr><tr><th>On the reverse strand</th><td>0</td></tr><tr><th>Stop codons in frame</th><td>6</td></tr></tbody></table><p>One ORF of twelve residues, on the forward strand, with six stop codons in the sequence overall: a single short open frame in a paste that is mostly stops, which is what an unselected sequence looks like.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>DNA sequence</th><td>TTTAAACCCGGGTTTAAACAT</td></tr><tr><th>Minimum protein length</th><td>3</td></tr><tr><th>Count as a start</th><td>ATG only</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Open reading frames</th><td>1</td></tr><tr><th>Longest ORF</th><td>7</td></tr><tr><th>On the forward strand</th><td>0</td></tr><tr><th>On the reverse strand</th><td>1</td></tr><tr><th>Stop codons in frame</th><td>4</td></tr></tbody></table><p>4 of the 5 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Open reading frames</strong> — start-to-stop runs above the minimum length.</li><li><strong>Longest ORF</strong> — the residue count of the longest one found.</li><li><strong>Forward</strong> — ORFs on the strand as pasted.</li><li><strong>Reverse</strong> — ORFs on the reverse complement.</li><li><strong>Stops</strong> — stop codons in the sequence, in all frames.</li></ul><p>Strand matters. A high proportion of real genes sit on the reverse strand, and an ORF finder that only reads forward will report nothing for half of all bacterial genes. The stop count is context: many stops with few ORFs means a sequence with no coding pressure at all.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Find the first ATG by eye, read triplets until a stop, and count them. That is one ORF; if it is above your minimum, the page should list it. Then write out the reverse complement of the first twenty bases and check that an ORF on that strand appears in the reverse list.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Minimum length</strong> — A minimum of twenty residues hides every short peptide. Lower it when the question is whether anything could be encoded here.</li><li><strong>Start codons</strong> — Bacterial genes often begin with GTG or TTG. Eukaryotic ones almost always begin with ATG.</li><li><strong>Nested frames</strong> — Reading the same sequence in frame 2 shifts every codon; an ORF in one frame is a stop-rich mess in another.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>No scoring</strong> — Every ORF is reported as equal; there is no ribosomal binding site, promoter or codon-bias weighting.</li><li><strong>Contiguous sequence only</strong> — Introns and spliced genes are read as one continuous frame.</li><li><strong>Six frames, one code</strong> — The standard genetic code is used; mitochondrial codes are not.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>ORF Finder has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>ORF finding is used to look for genes in an unknown sequence, to check whether a cloned fragment could encode a peptide, to confirm that a construct is in frame, and to find the second gene that a small plasmid is quietly carrying.</p><p>A useful habit is to run the same sequence with two different minimum lengths. If the list changes shape between them, the shorter ORFs are noise; if a single long frame survives both, that is the candidate worth following up. On a plasmid, the one that matters is usually the longest, not the first one reported.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why do I get ORFs in all six frames?', 'a' => 'Because three frames on each strand are possible and the page reports all of them; only one frame is the real coding frame for any given gene.'],
            ['q' => 'Should I include GTG and TTG as starts?', 'a' => 'For bacterial sequences, yes. For eukaryotic ones, ATG alone is right.'],
            ['q' => 'Does ORF Finder use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/water-soluble-fertilizer', 'name' => 'Water soluble fertilizer Calculator'],
            ['path' => '/biology/watterson-estimator', 'name' => 'Watterson Estimator Calculator'],
            ['path' => '/biology/western-blot-loading', 'name' => 'Western Blot Protein Loading Calculator'],
        ],
        'authors' => [],
    ],
];
