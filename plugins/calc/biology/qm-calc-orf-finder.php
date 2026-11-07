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
    'meta' => ['title' => 'ORF Finder for Biology — Formula, Steps & Results', 'description' => 'ORF Finder turns DNA sequence and minimum protein length into open reading frames. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'ORF Finder', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'sequence' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGAAATTTGGGCCCAAATTTTAATGA', 'c' => null],
                ],
            ],
            'min_aa' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '30', 'c' => null],
                ],
            ],
            'starts' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'atg-only', 'c' => null],
                ],
                'ds' => 'ds-starts',
            ],
            'orfs' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'longest' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'forward' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'reverse' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'stops' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-orf-finder',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'sequence',
                                    'l' => 'DNA sequence',
                                    'h' => 'Paste DNA; FASTA headers and digits are ignored',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'min_aa',
                                    'l' => 'Minimum protein length',
                                    'h' => 'Shorter ORFs are ignored',
                                    'suf' => 'aa',
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'starts',
                                    'l' => 'Count as a start',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-starts',
                                    'opts' => [
                                        ['atg-only', 'ATG only', 'atg'],
                                        ['atg-gtg-and-ttg-bacterial', 'ATG, GTG and TTG (bacterial)', 'bacterial'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'orfs',
                                    'l' => 'Open reading frames',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'longest',
                                    'l' => 'Longest ORF',
                                    'suf' => 'aa',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'forward',
                                    'l' => 'On the forward strand',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'reverse',
                                    'l' => 'On the reverse strand',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'stops',
                                    'l' => 'Stop codons in frame',
                                    'h' => 'All six frames together',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [],
        'datasets' => [
            'ds-starts' => [
                'name' => 'Count as a start',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'atg-only', 'label' => 'ATG only', 'value' => 'atg'],
                    ['uid' => 'atg-gtg-and-ttg-bacterial', 'label' => 'ATG, GTG and TTG (bacterial)', 'value' => 'bacterial'],
                ],
            ],
        ],
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
            var starts = /bacterial/i.test(String(ctx.getRawInput('starts') || ''))
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
    ],
    'article' => [
        'intro' => <<<'TXT'
        ORF Finder takes DNA sequence, Minimum protein length and Count as a start and returns Open reading frames and Longest ORF. Nothing is looked up on this page: open reading frames is computed from DNA sequence and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the ORF Finder calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind ORF Finder: it takes 3 numbers and reports Open reading frames, Longest ORF and On the forward strand.</p><p>The answers are Open reading frames, Longest ORF, On the forward strand and On the reverse strand; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>DNA sequence</strong> — a plain number, no unit. Paste DNA; FASTA headers and digits are ignored</li><li><strong>Minimum protein length</strong> — in aa. Shorter ORFs are ignored</li><li><strong>Count as a start</strong> — a plain number, no unit</li></ul><p>The answers come back as Open reading frames, Longest ORF in aa, On the forward strand, On the reverse strand, Stop codons in frame. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Open reading frames takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Open reading frames, Longest ORF and On the forward strand are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>DNA sequence left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If DNA sequence is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Minimum protein length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Minimum protein length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Count as a start left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Count as a start is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert DNA sequence to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the ORF Finder form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>DNA sequence</strong> takes a plain number with no unit attached. Paste DNA; FASTA headers and digits are ignored. Fill it from a measurement rather than a memory — DNA sequence is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Minimum protein length</strong> is measured in aa. Shorter ORFs are ignored. Fill it from a measurement rather than a memory — Minimum protein length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Count as a start</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Count as a start is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Open reading frames</strong> is a plain number. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Longest ORF</strong> is a plain number. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>On the forward strand</strong> is a plain number. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>On the reverse strand</strong> is a plain number. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Stop codons in frame</strong> is a plain number. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Pasting the sequence correctly', 'html' => <<<'TXT'
            <p><strong>DNA sequence</strong> takes text, not a number, so the way it is pasted decides whether the analysis is right.</p><ul><li><strong>No header line.</strong> A FASTA file starts with a line that begins with &quot;&gt;&quot; — a name, not a sequence. Paste from the line below it, or that line is read as characters of its own.</li><li><strong>No spaces or line numbers.</strong> Nucleotide and protein text is often printed in blocks of sixty or eighty characters. Line breaks are usually fine; spaces, tabs and the numbers down the side are not.</li><li><strong>Case is a choice you make.</strong> Upper-case is the convention, but lower-case is often used to mark a region such as soft-masked repeats. Whether the page folds case or respects it is part of what it is telling you, so keep the case you mean.</li><li><strong>Ambiguous characters are not rare.</strong> Sites where the read was uncertain are usually written as N or as a degenerate code. They are counted like any other character, which is right, but it means the answer describes the text as written rather than the molecule as it is.</li></ul><p>The quick check is always the same: does the reported length match the text you pasted? If Open reading frames, Longest ORF, On the forward strand and On the reverse strand disagree with what you can count by eye, the box is holding something you did not intend to give it.</p>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes ORF Finder, works through it, and the panel lists DNA sequence, Minimum protein length and Count as a start.</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is Open reading frames, Longest ORF, On the forward strand and On the reverse strand — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have DNA sequence, Minimum protein length and Count as a start ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with DNA sequence — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Open reading frames against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Open reading frames follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: DNA sequence, Minimum protein length and Count as a start measured, Open reading frames and Longest ORF wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/water-soluble-fertilizer">Water soluble fertilizer Calculator</a>, <a href="/biology/watterson-estimator">Watterson Estimator Calculator</a> and <a href="/biology/western-blot-loading">Western Blot Protein Loading Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the ORF Finder calculator work out?', 'a' => 'Open reading frames, Longest ORF, On the forward strand and On the reverse strand.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            DNA sequence, Minimum protein length (aa), Count as a start. Fill DNA sequence, minimum protein length and count as a start and leave Open reading frames empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Open reading frames is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Open reading frames is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Open reading frames keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/water-soluble-fertilizer', 'name' => 'Water soluble fertilizer Calculator'],
            ['path' => '/biology/watterson-estimator', 'name' => 'Watterson Estimator Calculator'],
            ['path' => '/biology/western-blot-loading', 'name' => 'Western Blot Protein Loading Calculator'],
        ],
        'authors' => [],
    ],
];
