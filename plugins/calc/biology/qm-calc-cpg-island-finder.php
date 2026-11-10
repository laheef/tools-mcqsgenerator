<?php

/**
 * CpG Island Finder
 * /biology/cpg-island-finder
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CpG Island Finder',
    'engine' => 'script',
    'engine_note' => 'scans a sequence for CpG islands and reports GC content, observed and expected CpG and the island count',
    'meta' => ['title' => 'CpG Island Finder: GC Content and Observed/Expected CpG', 'description' => 'Paste a DNA sequence and find CpG islands by the Gardiner-Garden rule: the window size, minimum GC content and minimum observed over expected CpG you set.', 'h1' => 'CpG Island Finder', 'updated' => '2026-10-29'],
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
                            'help' => 'Paste DNA; 200 bp or more gives a meaningful answer',
                            'default' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGCGCGCGCGGCCGCGGATCGCGATCGCCGCG',
                        ],
                        [
                            'name' => 'window',
                            'label' => 'Window',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'help' => 'Gardiner-Garden uses 200 bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                        [
                            'name' => 'gc_min',
                            'label' => 'Minimum GC in the window',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50',
                        ],
                        [
                            'name' => 'oe_min',
                            'label' => 'Minimum observed/expected CpG',
                            'type' => 'number',
                            'help' => '0.6 is the classical cut-off',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.6',
                        ],
                        [
                            'name' => 'gc_pct',
                            'label' => 'GC content of the sequence',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cpg_obs',
                            'label' => 'CpG dinucleotides observed',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cpg_oe',
                            'label' => 'Observed / expected CpG',
                            'type' => 'result',
                            'help' => 'Below 0.6 suggests the CG has been methylated and lost',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'islands',
                            'label' => 'CpG islands found',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'longest',
                            'label' => 'Longest island',
                            'type' => 'result',
                            'suffix' => 'bp',
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
    
      function oecpg(s) {
        var n = s.length, c = 0, g = 0, cpg = 0;
        for (var i = 0; i < n; i++) {
          var ch = s.charAt(i);
          if (ch === 'C') { c++; if (s.charAt(i + 1) === 'G') cpg++; }
          else if (ch === 'G') g++;
        }
        return {n: n, c: c, g: g, cpg: cpg, oe: (c && g) ? cpg / ((c * g) / n) : 0};
      }
      omni.onResult(['sequence', 'window', 'gc_min', 'oe_min'], function (ctx) {
        var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
        var w = Math.max(20, Math.min(5000, Number(ctx.getRawInput('window')) || 200));
        var gcMin = Number(ctx.getRawInput('gc_min')); if (!isFinite(gcMin)) gcMin = 50;
        var oeMin = Number(ctx.getRawInput('oe_min')); if (!isFinite(oeMin)) oeMin = 0.6;
    
        if (seq.length < 20) {
          ctx.addHtml(block('CpG islands', '—', 'Paste at least a few hundred bases to scan.'));
          return;
        }
        var whole = oecpg(seq);
        ctx.exportValue('gc_pct', Math.round(gcOf(seq) / seq.length * 1000) / 10);
        ctx.exportValue('cpg_obs', whole.cpg);
        ctx.exportValue('cpg_oe', Math.round(whole.oe * 100) / 100);
    
        // slide a window, keep every window that passes, then merge overlaps
        var step = Math.max(1, Math.floor(seq.length / 4000));
        var hits = [];
        for (var i = 0; i + w <= seq.length; i += step) {
          var win = seq.substr(i, w);
          var gc = gcOf(win) / w * 100;
          if (gc < gcMin) continue;
          var o = oecpg(win);
          if (o.oe >= oeMin) hits.push({s: i, e: i + w, gc: gc, oe: o.oe});
        }
        var merged = [];
        hits.forEach(function (h) {
          var last = merged[merged.length - 1];
          if (last && h.s <= last.e) {
            last.e = Math.max(last.e, h.e);
            last.gc = Math.max(last.gc, h.gc);
            last.oe = Math.max(last.oe, h.oe);
          } else merged.push({s: h.s, e: h.e, gc: h.gc, oe: h.oe});
        });
        var longest = 0;
        merged.forEach(function (m) { longest = Math.max(longest, m.e - m.s); });
        ctx.exportValue('islands', merged.length);
        ctx.exportValue('longest', longest);
    
        if (!merged.length) {
          ctx.addHtml(block('CpG islands', 'No island found',
            'GC ' + pct1(gcOf(seq) / seq.length * 100) + '% over ' + seq.length + ' bp · O/E '
            + pct2(whole.oe) + '. Lower the thresholds if you expect a weak island, or paste a longer '
            + 'region — a window of ' + w + ' bp needs at least that much sequence.'));
          return;
        }
        ctx.addHtml(table('Islands found',
          ['From', 'To', 'Length', 'GC', 'CpG O/E', 'Sequence'],
          merged.map(function (m) {
            var sub = seq.substring(m.s, m.e);
            return [(m.s + 1) + ' bp', m.e + ' bp', (m.e - m.s) + ' bp', pct1(m.gc) + '%',
                    m.oe.toFixed(2), sub.length > 40 ? sub.slice(0, 37) + '…' : sub];
          }),
          'Coordinates are 1-based on the pasted sequence. ' + merged.length + ' island'
          + (merged.length > 1 ? 's' : '') + ', longest ' + longest + ' bp.'));
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        A CpG island is a stretch of DNA that is GC-rich and carries more CG dinucleotides than chance would put there. This page scans a sequence in windows and reports where those conditions hold, how many islands it finds and how long the longest one is.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It finds CpG islands by the classical definition and reports the numbers behind the search: the overall GC content, how many CpG dinucleotides are actually present, the observed-to-expected ratio, the island count and the length of the longest island.</p><p>Two counting passes run over the sequence. The first counts G and C for the overall GC percentage and counts CG dinucleotides, comparing the count with what the base composition predicts — that is the observed over expected ratio, or CpG O/E. The second slides a window of the chosen size across the sequence, and a window counts as island material only if its GC content clears your minimum and its CpG O/E clears yours. Overlapping qualifying windows are joined, so an island is reported once.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 things to fill in, and the order does not matter:</p><ul><li><strong>Sequence</strong> — a text box. Paste DNA; 200 bp or more gives a meaningful answer.</li><li><strong>Window</strong> — a number box. Gardiner-Garden uses 200 bp.</li><li><strong>Minimum GC in the window</strong> — a number box.</li><li><strong>Minimum observed/expected CpG</strong> — a number box. 0.6 is the classical cut-off.</li></ul><p>The answer comes back as 5 boxes: GC content of the sequence (%), CpG dinucleotides observed, Observed / expected CpG, CpG islands found, Longest island (bp). They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Sequence</strong> is a text box. Paste DNA; 200 bp or more gives a meaningful answer Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Window</strong> is a number box. Gardiner-Garden uses 200 bp Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Minimum GC in the window</strong> is a number box. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Minimum observed/expected CpG</strong> is a number box. 0.6 is the classical cut-off Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Sequence</th><td>CGCGATCGCCGGCGCCGATCGCGCGCGATCGCCGGCGCCGATCGCGCG… (460 characters)</td></tr><tr><th>Window</th><td>50</td></tr><tr><th>Minimum GC in the window</th><td>60</td></tr><tr><th>Minimum observed/expected CpG</th><td>0.6</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>GC content of the sequence</th><td>82.6 %</td></tr><tr><th>CpG dinucleotides observed</th><td>160</td></tr><tr><th>Observed / expected CpG</th><td>2.04</td></tr><tr><th>CpG islands found</th><td>1</td></tr><tr><th>Longest island</th><td>460 bp</td></tr></tbody></table><p>A GC-rich synthetic repeat gives an overall GC of 82.6 per cent, 160 CpG dinucleotides against an expectation of about 78 (O/E 2.04) and one long island of 460 bases. Note the overall ratio is not the island rule: it is the sequence-wide figure, while islands are judged window by window.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Sequence</th><td>AAATTTAAATTTAAATTTAAATTTAAATTTAAATTTAAATTTAAATTTAAATTTAAATTT</td></tr><tr><th>Window</th><td>50</td></tr><tr><th>Minimum GC in the window</th><td>50</td></tr><tr><th>Minimum observed/expected CpG</th><td>0.6</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>GC content of the sequence</th><td>0</td></tr><tr><th>CpG dinucleotides observed</th><td>0</td></tr><tr><th>Observed / expected CpG</th><td>0</td></tr><tr><th>CpG islands found</th><td>0</td></tr><tr><th>Longest island</th><td>0</td></tr></tbody></table><p>5 of the 5 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>GC content</strong> — the percentage of G and C across the whole sequence.</li><li><strong>CpG observed</strong> — how many CG dinucleotides are actually present in the sequence.</li><li><strong>CpG O/E</strong> — observed CpG divided by the number expected from the G and C frequencies. Above 1 means CpG is enriched; the classical island threshold is 0.6.</li><li><strong>Islands</strong> — windows that meet all three criteria, with overlaps merged into one island.</li><li><strong>Longest island</strong> — the length of the longest merged island, in bases.</li></ul><p>The island count is sensitive to the three settings and should never be quoted without them. The Gardiner-Garden defaults — 200 bp window, 50 per cent GC, 0.6 O/E — are the ones most published work means, and a page that reports no islands at those settings is saying something quite specific.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take a candidate island and count its G and C by hand: the percentage should clear your threshold. Then count CG dinucleotides and compare with the expectation computed from the G and C counts in the same window. Both have to hold for the window to count.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Overlap double counting</strong> — Sliding windows overlap by design; a page that counted each qualifying window separately would report dozens of islands where there is one. This page merges them.</li><li><strong>Non-overlapping expectation</strong> — The expected CpG count is the product of the G and C fractions times the window length. Using a different denominator makes the O/E ratio meaningless.</li><li><strong>Short sequences</strong> — Under a few hundred bases, a window rarely fills and the island count is dominated by how much sequence you pasted.</li><li><strong>Case and line breaks</strong> — Lower-case soft-masked sequence is read as ordinary letters. If you meant to exclude repeats, mask them before pasting.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Sequence, not annotation</strong> — The page finds composition patterns. Whether an island is a promoter depends on what is near it, which a sequence cannot tell you.</li><li><strong>One rule set</strong> — Gardiner-Garden is the classical definition; some annotation pipelines use a stricter 500 bp, 55 per cent, 0.65 rule and will report fewer islands.</li><li><strong>No repeat masking</strong> — A repeat rich in CG will be reported as island material unless you mask it yourself.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>CpG Island Finder has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>CpG islands are used to find candidate promoters, to check whether a gene has a methylation-prone regulatory region, and to make sense of bisulfite sequencing: the regions worth interrogating are the ones this page points at.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why does my sequence have a high CpG O/E but no islands?', 'a' => <<<'TXT'
            The island rule is applied per window. A sequence can be CpG-rich overall and still have no window that clears all three thresholds at once — usually because the windows are too long for the sequence.
            TXT],
            ['q' => 'What window should I use?', 'a' => 'Two hundred bases is the classical Gardiner-Garden value. Short windows find small islands; long windows demand a long uninterrupted GC-rich stretch.'],
            ['q' => 'What does an O/E below 1 mean?', 'a' => 'CG dinucleotides are depleted, which is the usual state of most vertebrate DNA outside islands, because methylated CpG mutates to TpG over time.'],
            ['q' => 'Does CpG Island Finder use a formula I can read?', 'a' => <<<'TXT'
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
