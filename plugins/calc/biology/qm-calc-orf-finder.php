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
    'meta' => ['title' => 'ORF Finder for Biology — Formula, Steps & Results', 'description' => <<<'TXT'
    An ORF finder lists every open reading frame in a sequence: each stretch between a start and a stop codon. It returns open reading frames, longest orf, on the…
    TXT, 'h1' => 'ORF Finder', 'updated' => '2026-10-29'],
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
        An ORF finder lists every open reading frame in a sequence: each stretch between a start and a stop codon. It returns open reading frames, longest orf, on the forward strand, on the reverse strand and stop codons in frame, and the panel shows all of them at once.
        
        It is how you decide which frame to express, whether a cloned insert is intact, and where a sequencing read's protein should start.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the ORF Finder', 'html' => <<<'TXT'
            <p>An ORF runs from a start codon to the first in-frame stop. Length in aa = (stop − start) ÷ 3. Six frames = three on the forward strand and three on its reverse complement</p>
            <figure class="calc-figure"><img src="/uploads/biology/orf-finder.svg" width="720" height="300" loading="lazy" alt="Animated diagram: ORF Finder — Open reading frames are read from six registers" title="ORF Finder"><figcaption>Open reading frames are read from six registers</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>ORF</code></td><td>open reading frame</td><td>—</td></tr><tr><td><code>frame</code></td><td>one of the three registers a sequence can be read in</td><td>—</td></tr><tr><td><code>aa</code></td><td>amino acid</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the ORF Finder?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>under 100 aa</td><td><strong>Short ORF</strong></td><td>often a false call in a random sequence</td></tr><tr><td>100 – 300 aa</td><td><strong>Typical protein</strong></td><td>most bacterial proteins fall here</td></tr><tr><td>above 500 aa</td><td><strong>Large protein</strong></td><td>check for a fused or unfused tag</td></tr></tbody></table>
            <ul><li><p>In a random DNA sequence an ORF of 100 codons appears by chance roughly once per 60 kb, so a short ORF on its own proves nothing.</p></li><li><p>The longest ORF is not automatically the gene: in a bacterial operon the first gene may be shorter than a downstream one, and on the reverse strand there may be an equally long frame.</p></li><li><p>The bacterial start set (ATG, GTG, TTG) is worth using on prokaryotic sequence; eukaryotic scans should stay with ATG.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Reporting an ORF that starts mid-gene because the real start codon is upstream of the pasted region.</li><li>Forgetting the reverse strand — a gene can be on either strand.</li><li>Assuming the first ATG is the start; in eukaryotes the first ATG in a good Kozak context is the better guess.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is an open reading frame?', 'a' => 'A stretch with no stop codon in a given frame, usually counted from a start codon to the next in-frame stop.'],
            ['q' => 'Why six frames?', 'a' => 'DNA is double-stranded, and each strand can be read in three registers, so a sequence has six possible protein products.'],
            ['q' => 'How long must an ORF be to be believable?', 'a' => 'In bacteria, 100 codons or more; in eukaryotes, longer, because introns break the frame.'],
            ['q' => 'What does the ORF Finder actually calculate?', 'a' => <<<'TXT'
            It returns open reading frames, longest orf, on the forward strand, on the reverse strand and stop codons in frame. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];
