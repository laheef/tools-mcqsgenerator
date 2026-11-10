<?php

/**
 * DNA Pattern Finder
 * /biology/dna-pattern-finder
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'DNA Pattern Finder',
    'engine' => 'script',
    'engine_note' => 'searches a sequence for a pattern on both strands and reports every match and the spacing between them',
    'meta' => ['title' => 'DNA Pattern Finder with IUPAC Codes and Both Strands', 'description' => 'Search a DNA sequence for a motif, including IUPAC codes, on the forward strand, the reverse strand or both, and see every match counted position by position.', 'h1' => 'DNA Pattern Finder', 'updated' => '2026-10-29'],
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
                            'label' => 'Sequence',
                            'type' => 'text',
                            'help' => 'Paste DNA; headers, spaces and digits are ignored',
                            'default' => 'TTTGAATTCTTGGATCCAAGCTTAAAGAATTCAAGCTTGATATCGAATTCCCC',
                        ],
                        [
                            'name' => 'pattern',
                            'label' => 'Pattern (IUPAC allowed)',
                            'type' => 'text',
                            'help' => 'N = any base, R = A/G, Y = C/T, W = A/T, S = G/C, K = G/T, M = A/C',
                            'default' => 'GAATTC',
                        ],
                        [
                            'name' => 'strand',
                            'label' => 'Strand',
                            'type' => 'select',
                            'options' => ['Both strands' => 'both', 'Forward only' => 'forward'],
                            'default' => 'Both strands',
                        ],
                        [
                            'name' => 'matches_fwd',
                            'label' => 'Matches, forward strand',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'matches_rev',
                            'label' => 'Matches, reverse strand',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total sites',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'spacing',
                            'label' => 'Average spacing',
                            'type' => 'result',
                            'suffix' => 'bp',
                            'help' => 'Blank when there is only one site',
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
    
      var IUPAC = {A:'A', C:'C', G:'G', T:'T', U:'T', R:'[AG]', Y:'[CT]', S:'[GC]', W:'[AT]',
                   K:'[GT]', M:'[AC]', B:'[CGT]', D:'[AGT]', H:'[ACT]', V:'[ACG]', N:'[ACGT]'};
      function patternToRegex(p) {
        var out = '';
        for (var i = 0; i < p.length; i++) {
          var c = p.charAt(i);
          if (!IUPAC[c]) return null;
          out += IUPAC[c];
        }
        return out;
      }
      function findAll(hay, re) {
        var g = new RegExp(re, 'g'), hits = [], m;
        while ((m = g.exec(hay)) !== null) {
          hits.push(m.index + 1);
          if (m.index === g.lastIndex) g.lastIndex++;
          if (hits.length > 5000) break;
        }
        return hits;
      }
      omni.onResult(['sequence', 'pattern', 'strand'], function (ctx) {
        var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
        var raw = String(ctx.getRawInput('pattern') || '').replace(/[^A-Za-z]/g, '').toUpperCase()
          .replace(/U/g, 'T');
        if (!seq) {
          ctx.addHtml(block('Pattern search', '—', 'Paste a sequence to search.'));
          return;
        }
        if (!raw) {
          ctx.addHtml(block('Pattern search', '—', 'Type the motif to look for, for example GAATTC.'));
          return;
        }
        var re = patternToRegex(raw);
        if (!re) {
          ctx.addHtml(block('Pattern search', 'Not a valid pattern',
            'Use only A, C, G, T and the IUPAC codes R Y S W K M B D H V N.'));
          return;
        }
        var fwd = findAll(seq, re);
        var rev = [];
        if (!/forward-only/i.test(String(ctx.getChoice('strand') || ''))) {
          var rc = revcomp(seq);
          findAll(rc, re).forEach(function (p) {
            var start = seq.length - (p - 1) - raw.length + 1;
            if (fwd.indexOf(start) < 0) rev.push(start);
          });
        }
        var all = fwd.concat(rev).sort(function (a, b) { return a - b; });
        ctx.exportValue('matches_fwd', fwd.length);
        ctx.exportValue('matches_rev', rev.length);
        ctx.exportValue('total', all.length);
        if (all.length > 1 && all[all.length - 1] > all[0]) {
          ctx.exportValue('spacing', Math.round((all[all.length - 1] - all[0]) / (all.length - 1)));
        } else {
          ctx.exportValue('spacing', '');
        }
    
        ctx.addHtml(block('Pattern found',
          all.length + ' site' + (all.length === 1 ? '' : 's') + ' for ' + raw
          + (rev.length ? ' (' + fwd.length + ' forward, ' + rev.length + ' reverse)' : '')
          + ' in ' + seq.length + ' bp\n'
          + (all.length ? 'Positions: ' + all.slice(0, 60).join(', ') + (all.length > 60 ? ' …' : '') : '—'),
          all.length ? 'Positions are 1-based on the forward strand.' : 'No site found.'));
        if (all.length) {
          var rows = all.slice(0, 30).map(function (p) {
            var ctxs = seq.substr(Math.max(0, p - 6), raw.length + 10);
            return [String(p), p + raw.length - 1 > seq.length ? '—' : String(p + raw.length - 1),
                    (fwd.indexOf(p) >= 0 ? 'forward' : 'reverse'), ctxs];
          });
          ctx.addHtml(table('First sites', ['Start', 'End', 'Strand', 'Context ±5 bp'], rows));
        }
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Paste a sequence and a motif and this page tells you how often the motif appears, on the forward strand and on the reverse, with IUPAC codes accepted so "GGWCC" finds both GGACC and GGTCC.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It finds a pattern in a DNA sequence rather than a literal string. Ambiguity codes are expanded into the letters they stand for, and the search runs over the complement too, because a recognition site is a site whichever strand carries the text.</p><p>The sequence and the pattern are both cleaned and uppercased. Each IUPAC character is translated into a set of bases — N is anything, R is A or G, Y is C or T, W is A or T, S is G or C, K is G or T, M is A or C. Every position is tested against the expanded pattern, which makes the search a scan with one comparison per base rather than a substring match. When both strands are requested, the reverse complement is scanned the same way and the two counts are reported separately as well as together.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 things to fill in, and the order does not matter:</p><ul><li><strong>Sequence</strong> — a text box. Paste DNA; headers, spaces and digits are ignored.</li><li><strong>Pattern (IUPAC allowed)</strong> — a text box. N = any base, R = A/G, Y = C/T, W = A/T, S = G/C, K = G/T, M = A/C.</li><li><strong>Strand</strong> — a drop-down with the choices the page offers.</li></ul><p>The answer comes back as 4 boxes: Matches, forward strand, Matches, reverse strand, Total sites, Average spacing (bp). They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Sequence</strong> is a text box. Paste DNA; headers, spaces and digits are ignored Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Pattern (IUPAC allowed)</strong> is a text box. N = any base, R = A/G, Y = C/T, W = A/T, S = G/C, K = G/T, M = A/C Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Strand</strong> is a drop-down with the choices the page offers. The choices are Both strands and Forward only. Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Sequence</th><td>GAATTCGGATCCGTCGACCTGCAGGCATGCAAGCTT</td></tr><tr><th>Pattern (IUPAC allowed)</th><td>GAATTC</td></tr><tr><th>Strand</th><td>Both strands</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Matches, forward strand</th><td>1</td></tr><tr><th>Matches, reverse strand</th><td>0</td></tr><tr><th>Total sites</th><td>1</td></tr></tbody></table><p>One match on the forward strand and none on the reverse: the 36-base sequence contains GAATTC once, and its reverse complement GAATTC appears nowhere else. Total one.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Sequence</th><td>TTAGGACCGGATCCTAGGTCCTAGGTCC</td></tr><tr><th>Pattern (IUPAC allowed)</th><td>GGWCC</td></tr><tr><th>Strand</th><td>Both strands</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Matches, forward strand</th><td>3</td></tr><tr><th>Matches, reverse strand</th><td>0</td></tr><tr><th>Total sites</th><td>3</td></tr><tr><th>Average spacing</th><td>10</td></tr></tbody></table><p>3 of the 4 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Matches, forward</strong> — occurrences of the pattern as written.</li><li><strong>Matches, reverse</strong> — occurrences of the pattern read on the complementary strand.</li><li><strong>Total</strong> — the two added together — the number of physical sites when the motif is asymmetric, twice the number when it is palindromic.</li></ul><p>The forward and reverse counts are reported separately on purpose. A palindromic site such as GAATTC is found on both strands, so a both-strands count of two means one site, not two. Non-palindromic motifs appear on one strand only, and the split tells you which.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Count the motif by eye in the paste, then count it in the reverse complement written out by hand. Palindromes should appear in both; anything else in one.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Overlapping matches</strong> — A motif like ATAT in ATATAT occurs twice, not once, because the scan advances one base at a time.</li><li><strong>Ambiguity codes</strong> — A pattern of all N matches every position of a sequence long enough, which is correct and useless.</li><li><strong>Uracil</strong> — RNA is read as DNA here, with U taken as T. That is usually what you want; it is worth knowing.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>No mismatches</strong> — Every position must satisfy the pattern. A one-mismatch search is a different tool.</li><li><strong>Length floor</strong> — A pattern shorter than about four bases will match by chance many times in any real sequence.</li><li><strong>Plain text only</strong> — Regular expressions and position weight matrices are not accepted.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>DNA Pattern Finder has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Pattern searches are used to count restriction sites, to check whether a primer site is unique in a plasmid, to look for regulatory motifs, and to confirm that a synthesised construct still contains the sequence it was designed around.</p><p>When a search returns more hits than you expected, the useful next step is to look at where they fall rather than at the count. Two hits a few bases apart are a cluster and often mean a repeated element; hits spread evenly through a long sequence usually mean a short motif and a large sequence, which is arithmetic rather than biology.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why does a palindromic site count twice on both strands?', 'a' => 'Because it is its own reverse complement. The site exists once in the duplex, but the text appears on both strands, and the page counts the text.'],
            ['q' => 'Can I search for a degenerate restriction site?', 'a' => 'Yes. Write it in IUPAC codes, for example GGWCC for a BamHI-family site with either base at the third position.'],
            ['q' => 'Does DNA Pattern Finder use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/goat-years-to-human-years', 'name' => 'Goat Years to Human Years Calculator'],
            ['path' => '/biology/goldfish-years-to-human-years', 'name' => 'Goldfish Years to Human Years Calculator'],
            ['path' => '/biology/ghk-membrane-potential', 'name' => 'Goldman–Hodgkin–Katz Membrane Potential Calculator'],
        ],
        'authors' => [],
    ],
];
