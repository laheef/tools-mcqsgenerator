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
    'meta' => ['title' => 'Restriction Enzyme Finder Calculator — Biology', 'description' => 'Paste a DNA sequence and the finder checks it against a panel of 26 common enzymes. It returns enzymes that cut, unique cutters and enzymes that do not cut…', 'h1' => 'Restriction Enzyme Finder Calculator', 'updated' => '2026-10-29'],
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
        Paste a DNA sequence and the finder checks it against a panel of 26 common enzymes. It returns enzymes that cut, unique cutters and enzymes that do not cut, and the panel shows all of them at once.
        
        It also reports the cut position, the overhang each enzyme leaves and whether the site crosses the origin of a circular plasmid.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Restriction Enzyme Finder', 'html' => <<<'TXT'
            <p>A site is a match of the enzyme's recognition sequence on either strand; a unique cutter has exactly one match</p>
            <figure class="calc-figure"><img src="/uploads/biology/restriction-enzyme-finder.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Restriction Enzyme Finder Calculator — 26 enzymes screened against a 4 kb plasmid" title="Restriction Enzyme Finder Calculator"><figcaption>26 enzymes screened against a 4 kb plasmid</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>recognition site</code></td><td>the 6–8 bp sequence the enzyme binds</td><td>bp</td></tr><tr><td><code>cut offset</code></td><td>where the phosphodiester bond breaks, from the 5′ end of the site</td><td>bp</td></tr><tr><td><code>overhang</code></td><td>the single-stranded end left behind</td><td>5′, 3′ or blunt</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Restriction Enzyme Finder?', 'html' => <<<'TXT'
            <ol><li>Paste the sequence — plasmid map coordinates are not needed, the page counts from the first base.</li><li>Tick circular if it is a plasmid, so a site spanning the origin is found.</li><li>Start from the unique-cutter list: a single site per enzyme is what you need for a clean single-insert ligation, and a pair of unique sites with different overhangs is what you need for a directional one.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1 site</td><td><strong>Unique cutter</strong></td><td>the cloning workhorse — one cut, one linear product</td></tr><tr><td>2 sites</td><td><strong>Double cutter</strong></td><td>useful for dropping a cassette out, or for a double digest</td></tr><tr><td>3+ sites</td><td><strong>Frequent cutter</strong></td><td>avoid unless you want the fragment pattern</td></tr><tr><td>0 sites</td><td><strong>Non-cutter</strong></td><td>useful when you must leave the sequence untouched</td></tr></tbody></table>
            <ul><li><p>Both strands are searched, so a non-palindromic site on the bottom strand is reported at its top-strand coordinate rather than being missed.</p></li><li><p>For a circular molecule the sequence is searched against itself with an overlap of one site length, so a site straddling base 1 is found.</p></li><li><p>Overhang matters more than the cut position for cloning: two enzymes that leave the same cohesive end can be ligated together, and a blunt-end enzyme can go into any blunt site.</p></li><li><p>Dam and Dcm methylation of E. coli DNA blocks some sites (Dam: GATC; Dcm: CCWGG). If a site is absent from a plasmid prepped from a dam+ strain, that is usually why.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Searching a circular plasmid as linear and concluding an enzyme does not cut when its site spans the origin.</li><li>Choosing a unique site without checking its position: 3 bp from the end of the insert is unique but useless.</li><li>Forgetting that two different enzymes can leave the same overhang — BamHI (G^GATCC), BglII (A^GATCT), BclI and Sau3AI all produce a GATC 5′ overhang.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a unique restriction site?', 'a' => <<<'TXT'
            A site that occurs exactly once in the molecule, so digesting with that enzyme linearises a plasmid in one place. That is the standard position for cloning a single insert.
            TXT],
            ['q' => 'Why does an enzyme I expected cut nothing?', 'a' => <<<'TXT'
            Three reasons cover almost every case. The site spans the origin of a circular plasmid, the DNA is methylated at that site, or a star activity buffer was assumed where the standard buffer does not support the enzyme.
            TXT],
            ['q' => 'Can I use two enzymes with different overhangs?', 'a' => 'Yes — that is a directional clone, and it stops the insert going in backwards. Check that the two buffers are compatible, or digest sequentially.'],
            ['q' => 'Does this page give fragment sizes?', 'a' => 'The digest page does. This one is the screening step: which enzymes are worth taking forward, and where they cut.'],
            ['q' => 'What does the Restriction Enzyme Finder actually calculate?', 'a' => 'It returns enzymes that cut, unique cutters and enzymes that do not cut. Each one is derived by the formula on this page, so you can check any figure by hand.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
        ],
        'related' => [],
    ],
];
