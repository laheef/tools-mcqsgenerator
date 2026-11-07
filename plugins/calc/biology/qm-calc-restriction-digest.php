<?php

/**
 * Restriction Digest Calculator
 * /biology/restriction-digest
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Restriction Digest Calculator',
    'meta' => ['title' => 'Restriction Digest Calculator — Formula & Results', 'description' => <<<'TXT'
    Restriction Digest turns DNA sequence, Enzyme 1 and Enzyme 2 into Sequence length and Cut sites. It is a single relationship that reads Sequence length out of…
    TXT, 'h1' => 'Restriction Digest Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'sequence' => [
                'type' => 'text',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGGAATTCGGATCCAAGCTTGTCGACTCTAGAGGTACC', 'c' => null],
                ],
            ],
            'enzyme1' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'ecori-g-aattc', 'c' => null],
                ],
                'ds' => 'ds-enzyme1',
            ],
            'enzyme2' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'none', 'c' => null],
                ],
                'ds' => 'ds-enzyme2',
            ],
            'topology' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'linear', 'c' => null],
                ],
                'ds' => 'ds-topology',
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'sites' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'fragments' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'largest' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'smallest' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-restriction-digest',
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
                                    'h' => 'Paste the plasmid or the whole amplicon; FASTA headers are ignored',
                                    'vt' => 'text',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'enzyme1',
                                    'l' => 'Enzyme 1',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-enzyme1',
                                    'opts' => [
                                        ['ecori-g-aattc', 'EcoRI (G^AATTC)', 'ecori'],
                                        ['bamhi-g-gatcc', 'BamHI (G^GATCC)', 'bamhi'],
                                        ['hindiii-a-agctt', 'HindIII (A^AGCTT)', 'hindiii'],
                                        ['noti-gc-ggccgc', 'NotI (GC^GGCCGC)', 'noti'],
                                        ['xhoi-c-tcgag', 'XhoI (C^TCGAG)', 'xhoi'],
                                        ['sali-g-tcgac', 'SalI (G^TCGAC)', 'sali'],
                                        ['psti-ctgca-g', 'PstI (CTGCA^G)', 'psti'],
                                        ['xbai-t-ctaga', 'XbaI (T^CTAGA)', 'xbai'],
                                        ['kpni-ggtac-c', 'KpnI (GGTAC^C)', 'kpni'],
                                        ['smai-ccc-ggg', 'SmaI (CCC^GGG)', 'smai'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'enzyme2',
                                    'l' => 'Enzyme 2',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-enzyme2',
                                    'opts' => [
                                        ['none', 'None', 'none'],
                                        ['bamhi-g-gatcc', 'BamHI (G^GATCC)', 'bamhi'],
                                        ['hindiii-a-agctt', 'HindIII (A^AGCTT)', 'hindiii'],
                                        ['noti-gc-ggccgc', 'NotI (GC^GGCCGC)', 'noti'],
                                        ['xhoi-c-tcgag', 'XhoI (C^TCGAG)', 'xhoi'],
                                        ['sali-g-tcgac', 'SalI (G^TCGAC)', 'sali'],
                                        ['xbai-t-ctaga', 'XbaI (T^CTAGA)', 'xbai'],
                                        ['ncoi-c-catgg', 'NcoI (C^CATGG)', 'ncoi'],
                                        ['ndei-ca-tatg', 'NdeI (CA^TATG)', 'ndei'],
                                        ['saci-gagct-c', 'SacI (GAGCT^C)', 'saci'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'topology',
                                    'l' => 'Molecule',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-topology',
                                    'opts' => [
                                        ['linear', 'Linear', 'linear'],
                                        ['circular-plasmid', 'Circular (plasmid)', 'circular'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'length',
                                    'l' => 'Sequence length',
                                    'suf' => 'bp',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'sites',
                                    'l' => 'Cut sites',
                                    'h' => 'Both enzymes together',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'fragments',
                                    'l' => 'Fragments',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'largest',
                                    'l' => 'Largest fragment',
                                    'suf' => 'bp',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'smallest',
                                    'l' => 'Smallest fragment',
                                    'suf' => 'bp',
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
            'ds-enzyme1' => [
                'name' => 'Enzyme 1',
                'uiType' => 'SELECT',
                'options' => [
                    ['uid' => 'ecori-g-aattc', 'label' => 'EcoRI (G^AATTC)', 'value' => 'ecori'],
                    ['uid' => 'bamhi-g-gatcc', 'label' => 'BamHI (G^GATCC)', 'value' => 'bamhi'],
                    ['uid' => 'hindiii-a-agctt', 'label' => 'HindIII (A^AGCTT)', 'value' => 'hindiii'],
                    ['uid' => 'noti-gc-ggccgc', 'label' => 'NotI (GC^GGCCGC)', 'value' => 'noti'],
                    ['uid' => 'xhoi-c-tcgag', 'label' => 'XhoI (C^TCGAG)', 'value' => 'xhoi'],
                    ['uid' => 'sali-g-tcgac', 'label' => 'SalI (G^TCGAC)', 'value' => 'sali'],
                    ['uid' => 'psti-ctgca-g', 'label' => 'PstI (CTGCA^G)', 'value' => 'psti'],
                    ['uid' => 'xbai-t-ctaga', 'label' => 'XbaI (T^CTAGA)', 'value' => 'xbai'],
                    ['uid' => 'kpni-ggtac-c', 'label' => 'KpnI (GGTAC^C)', 'value' => 'kpni'],
                    ['uid' => 'smai-ccc-ggg', 'label' => 'SmaI (CCC^GGG)', 'value' => 'smai'],
                ],
            ],
            'ds-enzyme2' => [
                'name' => 'Enzyme 2',
                'uiType' => 'SELECT',
                'options' => [
                    ['uid' => 'none', 'label' => 'None', 'value' => 'none'],
                    ['uid' => 'bamhi-g-gatcc', 'label' => 'BamHI (G^GATCC)', 'value' => 'bamhi'],
                    ['uid' => 'hindiii-a-agctt', 'label' => 'HindIII (A^AGCTT)', 'value' => 'hindiii'],
                    ['uid' => 'noti-gc-ggccgc', 'label' => 'NotI (GC^GGCCGC)', 'value' => 'noti'],
                    ['uid' => 'xhoi-c-tcgag', 'label' => 'XhoI (C^TCGAG)', 'value' => 'xhoi'],
                    ['uid' => 'sali-g-tcgac', 'label' => 'SalI (G^TCGAC)', 'value' => 'sali'],
                    ['uid' => 'xbai-t-ctaga', 'label' => 'XbaI (T^CTAGA)', 'value' => 'xbai'],
                    ['uid' => 'ncoi-c-catgg', 'label' => 'NcoI (C^CATGG)', 'value' => 'ncoi'],
                    ['uid' => 'ndei-ca-tatg', 'label' => 'NdeI (CA^TATG)', 'value' => 'ndei'],
                    ['uid' => 'saci-gagct-c', 'label' => 'SacI (GAGCT^C)', 'value' => 'saci'],
                ],
            ],
            'ds-topology' => [
                'name' => 'Molecule',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'linear', 'label' => 'Linear', 'value' => 'linear'],
                    ['uid' => 'circular-plasmid', 'label' => 'Circular (plasmid)', 'value' => 'circular'],
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
        
          // Recognition sequence, cut offset on the top strand, and the enzyme name.
          // The offsets are the published ones for these enzymes.
          var ENZYMES = {
            ecori:   {name: 'EcoRI',   site: 'GAATTC',   cut: 1},
            bamhi:   {name: 'BamHI',   site: 'GGATCC',   cut: 1},
            hindiii: {name: 'HindIII', site: 'AAGCTT',   cut: 1},
            noti:    {name: 'NotI',    site: 'GCGGCCGC', cut: 2},
            xhoi:    {name: 'XhoI',    site: 'CTCGAG',   cut: 1},
            sali:    {name: 'SalI',    site: 'GTCGAC',   cut: 1},
            psti:    {name: 'PstI',    site: 'CTGCAG',   cut: 5},
            xbai:    {name: 'XbaI',    site: 'TCTAGA',   cut: 1},
            kpni:    {name: 'KpnI',    site: 'GGTACC',   cut: 5},
            smai:    {name: 'SmaI',    site: 'CCCGGG',   cut: 3},
            ncoi:    {name: 'NcoI',    site: 'CCATGG',   cut: 1},
            ndei:    {name: 'NdeI',    site: 'CATATG',   cut: 2},
            saci:    {name: 'SacI',    site: 'GAGCTC',   cut: 5}
          };
          function sitesOf(seq, enz, circular) {
            // search both strands: a palindromic site is found once, a non-palindromic
            // one (BsaI and friends) can appear on either strand
            var hits = [], i, hay = seq, len = enz.site.length;
            for (i = 0; i + len <= hay.length; i++) {
              if (hay.substr(i, len) === enz.site) hits.push(i + enz.cut);
            }
            var rc = revcomp(seq), rcSite = revcomp(enz.site);
            if (rcSite !== enz.site) {
              for (i = 0; i + len <= rc.length; i++) {
                if (rc.substr(i, len) === rcSite) {
                  // convert a position on the bottom strand to the top-strand coordinate
                  hits.push(seq.length - (i + len) + (len - enz.cut));
                }
              }
            }
            if (circular) {
              // a circular molecule also has the site spanning the origin
              var doubled = seq + seq.substring(0, Math.min(len, seq.length));
              for (i = seq.length; i + len <= doubled.length; i++) {
                if (doubled.substr(i, len) === enz.site) hits.push(i + enz.cut - seq.length);
              }
              hits = hits.map(function (p) { return ((p % seq.length) + seq.length) % seq.length; });
            }
            hits.sort(function (a, b) { return a - b; });
            var out = [];
            hits.forEach(function (p) { if (out.indexOf(p) < 0) out.push(p); });
            return out;
          }
          function fragmentsOf(cuts, n, circular) {
            if (!cuts.length) return [];
            var frs = [];
            for (var i = 1; i < cuts.length; i++) frs.push(cuts[i] - cuts[i - 1]);
            if (circular) frs.push(n - cuts[cuts.length - 1] + cuts[0]);
            else {
              if (cuts[0] > 0) frs.unshift(cuts[0]);
              if (cuts[cuts.length - 1] < n) frs.push(n - cuts[cuts.length - 1]);
            }
            return frs;
          }
          omni.onResult(['sequence', 'enzyme1', 'enzyme2', 'topology'], function (ctx) {
            var seq = cleanSeq(ctx.getRawInput('sequence'), 'dna');
            if (seq.length < 8) {
              ctx.addHtml(block('Restriction map', '—', 'Paste a DNA sequence of at least 8 bp.'));
              return;
            }
            var circular = /circular/i.test(String(ctx.getRawInput('topology') || ''));
            // the option slug is "<key>-<site>", e.g. "bamhi-g-gatcc", so the key is the
            // part before the first hyphen
            var key1 = String(ctx.getRawInput('enzyme1') || 'ecori').split('-')[0];
            var key2 = String(ctx.getRawInput('enzyme2') || 'none').split('-')[0];
            var e1 = ENZYMES[key1] || ENZYMES.ecori;
            var e2 = key2 === 'none' ? null : (ENZYMES[key2] || null);
            if (e2 && e2.name === e1.name) e2 = null;
        
            var cuts1 = sitesOf(seq, e1, circular);
            var cuts2 = e2 ? sitesOf(seq, e2, circular) : [];
            var all = [];
            cuts1.forEach(function (p) { all.push({p: p, e: e1.name, off: 0}); });
            cuts2.forEach(function (p) { all.push({p: p, e: e2.name, off: 0}); });
            all.sort(function (a, b) { return a.p - b.p; });
            var positions = [];
            all.forEach(function (c) { if (positions.indexOf(c.p) < 0) positions.push(c.p); });
        
            var frs = fragmentsOf(positions, seq.length, circular);
            ctx.exportValue('length', seq.length);
            ctx.exportValue('sites', all.length);
            ctx.exportValue('fragments', frs.length);
            ctx.exportValue('largest', frs.length ? Math.max.apply(null, frs) : 0);
            ctx.exportValue('smallest', frs.length ? Math.min.apply(null, frs) : 0);
        
            ctx.addHtml(block('Cut sites',
              seq.length + ' bp ' + (circular ? 'circular' : 'linear') + ' molecule\n'
              + e1.name + ': ' + (cuts1.length ? cuts1.map(function (p) { return p + 1; }).join(', ') : 'no site')
              + (e2 ? '\n' + e2.name + ': ' + (cuts2.length ? cuts2.map(function (p) { return p + 1; }).join(', ')
                : 'no site') : '')
              + '\nEnzymes used: ' + all.length + ' · fragments: ' + frs.length,
              'Cut positions are 1-based and mark the first base of the downstream fragment.'));
        
            if (frs.length) {
              var sorted = frs.slice().sort(function (a, b) { return b - a; });
              ctx.addHtml(table('Fragments', ['Fragment', 'Size (bp)', 'Share of the molecule'],
                sorted.map(function (f, i) {
                  return [String(i + 1), String(f), (f / seq.length * 100).toFixed(1) + '%'];
                }),
                'Sorted largest first, the order a gel shows them. Fragments within 10% of each other '
                + 'will run as a single band.'));
            } else {
              ctx.addHtml(block('Fragments', 'The sequence is not cut',
                'Neither enzyme has a site here. Check the topology — a single cut on a circle gives one '
                + 'linear fragment, not two.'));
            }
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Restriction Digest turns DNA sequence, Enzyme 1 and Enzyme 2 into Sequence length and Cut sites. It is a single relationship that reads Sequence length out of DNA sequence, not a table of canned results keyed by them. Units for Sequence length default to bp and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Restriction Digest calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Restriction Digest: it takes 4 numbers and reports Sequence length, Cut sites and Fragments.</p><p>What comes back is Sequence length, Cut sites, Fragments and Largest fragment — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>DNA sequence</strong> — a plain number, no unit. Paste the plasmid or the whole amplicon; FASTA headers are ignored</li><li><strong>Enzyme 1</strong> — a plain number, no unit</li><li><strong>Enzyme 2</strong> — a plain number, no unit</li><li><strong>Molecule</strong> — a plain number, no unit</li></ul><p>What you get back is Sequence length in bp, Cut sites, Fragments, Largest fragment in bp, Smallest fragment in bp, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Sequence length takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Sequence length, Cut sites and Fragments are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If DNA sequence is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: DNA sequence, Enzyme 1 and Enzyme 2 measured, Sequence length and Cut sites wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/puppy-adult-weight-predictor">Puppy Adult Weight Predictor Calculator</a>, <a href="/biology/q10-temperature-coefficient">Q10 Temperature Coefficient Calculator</a> and <a href="/biology/qpcr-efficiency">qPCR efficiency Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which values do I need before I start?', 'a' => 'DNA sequence, Enzyme 1, Enzyme 2, Molecule. Fill sequence, enzyme1 and enzyme2 and leave Sequence length empty if you would rather have that one solved instead.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Sequence length is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Sequence length is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Sequence length at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/puppy-adult-weight-predictor', 'name' => 'Puppy Adult Weight Predictor Calculator'],
            ['path' => '/biology/q10-temperature-coefficient', 'name' => 'Q10 Temperature Coefficient Calculator'],
            ['path' => '/biology/qpcr-efficiency', 'name' => 'qPCR efficiency Calculator'],
        ],
        'authors' => [],
    ],
];
