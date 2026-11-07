<?php

/**
 * Restriction Enzyme Finder Calculator
 * /biology/restriction-enzyme-finder
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Restriction Enzyme Finder Calculator',
    'meta' => ['title' => 'Restriction Enzyme Finder Calculator — Biology', 'description' => 'Restriction Enzyme Finder works out Enzymes that cut and Unique cutters from DNA sequence and Treat the molecule as circular (plasmid).', 'h1' => 'Restriction Enzyme Finder Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'sequence' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGGAATTCGGATCCAAGCTT', 'c' => null],
                ],
            ],
            'circular' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'yes', 'c' => null],
                ],
                'ds' => 'ds-circular',
            ],
            'cutters' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'unique' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'nocut' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-restriction-enzyme-finder',
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
                                    'h' => 'Paste the plasmid or the amplicon; FASTA headers are ignored',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'circular',
                                    'l' => 'Treat the molecule as circular (plasmid)',
                                    'h' => 'Sites that span the origin are counted too',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-circular',
                                    'opts' => [
                                        ['yes', 'Yes', '1'],
                                        ['no', 'No', '0'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'cutters',
                                    'l' => 'Enzymes that cut',
                                    'h' => 'Out of the panel',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'unique',
                                    'l' => 'Unique cutters',
                                    'h' => 'Exactly one site',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'nocut',
                                    'l' => 'Enzymes that do not cut',
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
            'ds-circular' => [
                'name' => 'Treat the molecule as circular (plasmid)',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'yes', 'label' => 'Yes', 'value' => '1'],
                    ['uid' => 'no', 'label' => 'No', 'value' => '0'],
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
        
          // name, recognition site, cut offset on the top strand, overhang
          var PANEL = [
            ['EcoRI', 'GAATTC', 1, '5′'], ['BamHI', 'GGATCC', 1, '5′'], ['HindIII', 'AAGCTT', 1, '5′'],
            ['NotI', 'GCGGCCGC', 2, '5′'], ['XhoI', 'CTCGAG', 1, '5′'], ['SalI', 'GTCGAC', 1, '5′'],
            ['PstI', 'CTGCAG', 5, '3′'], ['XbaI', 'TCTAGA', 1, '5′'], ['KpnI', 'GGTACC', 5, '3′'],
            ['SmaI', 'CCCGGG', 3, 'blunt'], ['SacI', 'GAGCTC', 5, '3′'], ['NcoI', 'CCATGG', 1, '5′'],
            ['NdeI', 'CATATG', 2, '5′'], ['EcoRV', 'GATATC', 3, 'blunt'], ['ScaI', 'AGTACT', 3, 'blunt'],
            ['PvuII', 'CAGCTG', 3, 'blunt'], ['HpaI', 'GTTAAC', 3, 'blunt'], ['NruI', 'TCGCGA', 3, 'blunt'],
            ['ApaI', 'GGGCCC', 5, '3′'], ['BglII', 'AGATCT', 1, '5′'], ['SpeI', 'ACTAGT', 1, '5′'],
            ['NheI', 'GCTAGC', 1, '5′'], ['AgeI', 'ACCGGT', 1, '5′'], ['AscI', 'GGCGCGCC', 2, '5′'],
            ['MluI', 'ACGCGT', 1, '5′'], ['SphI', 'GCATGC', 5, '3′']
          ];
          var COMP2 = { A: 'T', T: 'A', G: 'C', C: 'G', N: 'N' };
          function comp(s) {
            var o = '';
            for (var i = s.length - 1; i >= 0; i--) o += COMP2[s.charAt(i)] || 'N';
            return o;
          }
          function sitesOf(seq, site, cut, circular) {
            var hits = [], i, len = site.length;
            var hay = circular ? seq + seq.substring(0, Math.min(len, seq.length)) : seq;
            for (i = 0; i + len <= hay.length; i++) {
              if (hay.substr(i, len) === site) {
                var p = i + cut;
                if (circular) p = ((p % seq.length) + seq.length) % seq.length;
                hits.push(p);
              }
            }
            var rcSite = comp(site);
            if (rcSite !== site) {
              for (i = 0; i + len <= hay.length; i++) {
                if (hay.substr(i, len) === rcSite) {
                  var q = i + (len - cut);
                  if (circular) q = ((q % seq.length) + seq.length) % seq.length;
                  hits.push(q);
                }
              }
            }
            hits.sort(function (a, b) { return a - b; });
            var out = [];
            for (i = 0; i < hits.length; i++) if (out.indexOf(hits[i]) < 0) out.push(hits[i]);
            return out;
          }
          omni.onResult(['sequence', 'circular'], function (ctx) {
            var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
            if (seq.length < 8) {
              ctx.addHtml(block('Enzyme screen', '—', 'Paste at least 8 bp of DNA.'));
              ctx.exportValue('cutters', 0); ctx.exportValue('unique', 0); ctx.exportValue('nocut', 0);
              return;
            }
            var circular = /true|yes|1/i.test(String(ctx.getRawInput('circular') || ''));
            var unique = [], multi = [], none = [];
            for (var i = 0; i < PANEL.length; i++) {
              var enz = PANEL[i];
              var hits = sitesOf(seq, enz[1], enz[2], circular);
              if (hits.length === 1) unique.push([enz[0], enz[1], String(hits[0] + 1) + ' bp', enz[3]]);
              else if (hits.length > 1) multi.push([enz[0], enz[1], hits.length + ' sites: ' + hits.map(function (p) { return p + 1; }).join(', '), enz[3]]);
              else none.push([enz[0], enz[1], '—', enz[3]]);
            }
            ctx.exportValue('cutters', unique.length + multi.length);
            ctx.exportValue('unique', unique.length);
            ctx.exportValue('nocut', none.length);
            var html = block('Enzyme screen (' + seq.length + ' bp, ' + (circular ? 'circular' : 'linear') + ')',
              'Unique cutters   ' + unique.length + '\nMulti cutters    ' + multi.length
              + '\nNo site          ' + none.length,
              unique.length ? 'Start from the unique cutters — one cut per enzyme.'
                            : 'No unique cutter in this panel; widen the enzyme list.');
            html += table('Unique cutters', ['Enzyme', 'Site', 'Cut at', 'Overhang'],
                          unique.length ? unique : [['none', '—', '—', '—']]);
            html += table('Enzymes that cut more than once', ['Enzyme', 'Site', 'Positions', 'Overhang'],
                          multi.length ? multi.slice(0, 14) : [['none', '—', '—', '—']],
                          multi.length > 14 ? 'First 14 shown.' : '');
            html += table('No site in this sequence', ['Enzyme', 'Site', 'Cut at', 'Overhang'], none.slice(0, 14),
                          none.length > 14 ? 'First 14 shown — useful as enzymes that will leave the sequence intact.' : '');
            ctx.addHtml(html);
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Restriction Enzyme Finder works out Enzymes that cut and Unique cutters from DNA sequence and Treat the molecule as circular (plasmid). It is a single relationship that reads Enzymes that cut out of DNA sequence, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Restriction Enzyme Finder calculator works', 'html' => <<<'TXT'
            <p>The Restriction Enzyme Finder calculator applies one relationship to 2 numbers and reports Enzymes that cut, Unique cutters and Enzymes that do not cut.</p><p>What comes back is Enzymes that cut, Unique cutters and Enzymes that do not cut — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>DNA sequence</strong> — a plain number, no unit. Paste the plasmid or the amplicon; FASTA headers are ignored</li><li><strong>Treat the molecule as circular (plasmid)</strong> — a plain number, no unit. Sites that span the origin are counted too</li></ul><p>The answers come back as Enzymes that cut, Unique cutters, Enzymes that do not cut. </p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Enzymes that cut is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Enzymes that cut, Unique cutters and Enzymes that do not cut are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert DNA sequence to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: DNA sequence and Treat the molecule as circular (plasmid) measured, Enzymes that cut and Unique cutters wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/amino-acid-composition">Amino Acid Composition Calculator</a>, <a href="/biology/animal-mortality-rate">Animal mortality rate</a> and <a href="/biology/annealing-temperature">Annealing temperature Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which values do I need before I start?', 'a' => 'DNA sequence, Treat the molecule as circular (plasmid). With sequence and circular in place, Enzymes that cut can stay blank and the page will work it out.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Enzymes that cut is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Enzymes that cut, so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Enzymes that cut keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/amino-acid-composition', 'name' => 'Amino Acid Composition Calculator'],
            ['path' => '/biology/animal-mortality-rate', 'name' => 'Animal mortality rate'],
            ['path' => '/biology/annealing-temperature', 'name' => 'Annealing temperature Calculator'],
        ],
        'authors' => [],
    ],
];
