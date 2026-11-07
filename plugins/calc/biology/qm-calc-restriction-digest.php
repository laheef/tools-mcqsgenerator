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
    'meta' => ['title' => 'Restriction Digest Calculator — Formula & Results', 'description' => 'Work out where a restriction enzyme cuts a DNA sequence and how big the fragments will be. It returns sequence length, cut sites, fragments, largest fragment…', 'h1' => 'Restriction Digest Calculator', 'updated' => '2026-10-29'],
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
        Work out where a restriction enzyme cuts a DNA sequence and how big the fragments will be. It returns sequence length, cut sites, fragments, largest fragment and smallest fragment, and the panel shows all of them at once.
        
        Paste a plasmid or a PCR product, choose one enzyme or two, and the map gives every cut site, the fragment sizes in base pairs and what the gel will look like — the check you want before committing a digest.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Restriction Digest', 'html' => <<<'TXT'
            <p>Distance between adjacent cut sites gives each fragment; for a circular molecule the last fragment wraps from the final site back to the first. Σ fragments = sequence length</p>
            <figure class="calc-figure"><img src="/uploads/biology/restriction-digest.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Restriction Digest Calculator — A typical double digest on a 3 kb plasmid" title="Restriction Digest Calculator"><figcaption>A typical double digest on a 3 kb plasmid</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>^</code></td><td>where the enzyme cuts, on the top strand</td><td>—</td></tr><tr><td><code>bp</code></td><td>base pair</td><td>—</td></tr><tr><td><code>site</code></td><td>a recognition sequence, usually 4–8 bp and palindromic</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Restriction Digest?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1 fragment</td><td><strong>No cut</strong></td><td>the enzyme does not cut, or cuts once on a circle</td></tr><tr><td>2 – 4 fragments</td><td><strong>Diagnostic</strong></td><td>a good check on a clone's identity</td></tr><tr><td>more than 6</td><td><strong>Frequent cutter</strong></td><td>hard to read on a gel; use a different enzyme</td></tr></tbody></table>
            <ul><li><p>A circular molecule cut once gives one linear fragment; cut twice it gives two fragments whose sizes add up to the plasmid length.</p></li><li><p>Fragment sizes are what a gel will show. Two fragments of similar size appear as one thick band, which is why a double digest that gives 1 200 and 1 250 bp is a poor diagnostic.</p></li><li><p>Methylation blocks many enzymes in vivo: Dam methylation stops MboI and ClaI, Dcm stops EcoRII. A site that exists in the sequence may still not cut in a plasmid prepared from E. coli.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Pasting only the insert when the question is about the plasmid map.</li><li>Forgetting that a PCR product is linear while the template was circular.</li><li>Assuming a single-cutter is unique in the whole construct when only part of it was pasted.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many fragments does a circular plasmid give with two cuts?', 'a' => 'Two — the plasmid is split at both sites and the two arcs add up to the full length.'],
            ['q' => 'Why does an enzyme not cut a site that is in the sequence?', 'a' => 'Usually methylation (Dam or Dcm), supercoiling, or a buffer that does not suit the enzyme.'],
            ['q' => 'How do I pick a diagnostic digest?', 'a' => 'Choose an enzyme that gives two or three clearly differently sized fragments, nothing within 15% of another.'],
            ['q' => 'What does the Restriction Digest actually calculate?', 'a' => <<<'TXT'
            It returns sequence length, cut sites, fragments, largest fragment and smallest fragment. Each one is derived by the formula on this page, so you can check any figure by hand.
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
