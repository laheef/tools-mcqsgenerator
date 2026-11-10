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
    'engine' => 'script',
    'engine_note' => 'finds every cut site for the chosen enzymes and reports the fragments the digest produces',
    'meta' => ['title' => 'Restriction Digest Calculator: Cut Sites and Fragments', 'description' => 'Paste DNA, choose one or two enzymes and a linear or circular molecule, and read the cut sites, the number of fragments and their largest and smallest sizes.', 'h1' => 'Restriction Digest Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'DNA sequence',
                            'type' => 'text',
                            'help' => 'Paste the plasmid or the whole amplicon; FASTA headers are ignored',
                            'default' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGGAATTCGGATCCAAGCTTGTCGACTCTAGAGGTACC',
                        ],
                        [
                            'name' => 'enzyme1',
                            'label' => 'Enzyme 1',
                            'type' => 'select',
                            'options' => [
                                'EcoRI (G^AATTC)' => 'ecori',
                                'BamHI (G^GATCC)' => 'bamhi',
                                'HindIII (A^AGCTT)' => 'hindiii',
                                'NotI (GC^GGCCGC)' => 'noti',
                                'XhoI (C^TCGAG)' => 'xhoi',
                                'SalI (G^TCGAC)' => 'sali',
                                'PstI (CTGCA^G)' => 'psti',
                                'XbaI (T^CTAGA)' => 'xbai',
                                'KpnI (GGTAC^C)' => 'kpni',
                                'SmaI (CCC^GGG)' => 'smai',
                            ],
                            'control' => 'SELECT',
                            'default' => 'EcoRI (G^AATTC)',
                        ],
                        [
                            'name' => 'enzyme2',
                            'label' => 'Enzyme 2',
                            'type' => 'select',
                            'options' => [
                                'None' => 'none',
                                'BamHI (G^GATCC)' => 'bamhi',
                                'HindIII (A^AGCTT)' => 'hindiii',
                                'NotI (GC^GGCCGC)' => 'noti',
                                'XhoI (C^TCGAG)' => 'xhoi',
                                'SalI (G^TCGAC)' => 'sali',
                                'XbaI (T^CTAGA)' => 'xbai',
                                'NcoI (C^CATGG)' => 'ncoi',
                                'NdeI (CA^TATG)' => 'ndei',
                                'SacI (GAGCT^C)' => 'saci',
                            ],
                            'control' => 'SELECT',
                            'default' => 'None',
                        ],
                        [
                            'name' => 'topology',
                            'label' => 'Molecule',
                            'type' => 'select',
                            'options' => ['Linear' => 'linear', 'Circular (plasmid)' => 'circular'],
                            'default' => 'Linear',
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Sequence length',
                            'type' => 'result',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sites',
                            'label' => 'Cut sites',
                            'type' => 'result',
                            'help' => 'Both enzymes together',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fragments',
                            'label' => 'Fragments',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'largest',
                            'label' => 'Largest fragment',
                            'type' => 'result',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'smallest',
                            'label' => 'Smallest fragment',
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
        var circular = /circular/i.test(String(ctx.getChoice('topology') || ''));
        /*
         * The choice hands back the label the visitor reads — "BamHI (G^GATCC)" —
         * so the key is found by looking for the enzyme's own name inside it,
         * not by splitting on a hyphen that only the harvested slug had.
         */
        function enzymeKey(raw, fallback) {
          var n = String(raw || '').toLowerCase();
          if (/^none/.test(n)) { return 'none'; }
          for (var k in ENZYMES) {
            if (Object.prototype.hasOwnProperty.call(ENZYMES, k)
                && n.indexOf(ENZYMES[k].name.toLowerCase()) === 0) { return k; }
          }
          return fallback;
        }
        var key1 = enzymeKey(ctx.getChoice('enzyme1'), 'ecori');
        var key2 = enzymeKey(ctx.getChoice('enzyme2'), 'none');
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
    'article' => [
        'intro' => <<<'TXT'
        A restriction digest turns a sequence into fragment sizes. Paste the DNA, choose the enzymes, say whether the molecule is linear or circular, and the page reports where it cuts and what the gel would show.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It predicts the fragments a digest will produce: how many sites each enzyme has, how many pieces result, and how big the largest and smallest are.</p><p>Each enzyme has a recognition sequence and a cut position within it. The page scans the sequence for both, on the forward strand and, for non-palindromic sites, on the reverse complement, converting each hit back to a top-strand coordinate. If the molecule is circular, the sequence is scanned across the origin as well, so a site spanning the join is found. The cut coordinates are sorted, and the distances between them are the fragments — with the closing distance added for a circle, and the two end pieces added for a line.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 things to fill in, and the order does not matter:</p><ul><li><strong>DNA sequence</strong> — a text box. Paste the plasmid or the whole amplicon; FASTA headers are ignored.</li><li><strong>Enzyme 1</strong> — a drop-down with the choices the page offers.</li><li><strong>Enzyme 2</strong> — a drop-down with the choices the page offers.</li><li><strong>Molecule</strong> — a drop-down with the choices the page offers.</li></ul><p>The answer comes back as 5 boxes: Sequence length (bp), Cut sites, Fragments, Largest fragment (bp), Smallest fragment (bp). They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>DNA sequence</strong> is a text box. Paste the plasmid or the whole amplicon; FASTA headers are ignored Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Enzyme 1</strong> is a drop-down with the choices the page offers. The choices are EcoRI (G^AATTC), BamHI (G^GATCC), HindIII (A^AGCTT), NotI (GC^GGCCGC), XhoI (C^TCGAG), SalI (G^TCGAC), PstI (CTGCA^G) and XbaI (T^CTAGA). Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Enzyme 2</strong> is a drop-down with the choices the page offers. The choices are None, BamHI (G^GATCC), HindIII (A^AGCTT), NotI (GC^GGCCGC), XhoI (C^TCGAG), SalI (G^TCGAC), XbaI (T^CTAGA) and NcoI (C^CATGG). Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Molecule</strong> is a drop-down with the choices the page offers. The choices are Linear and Circular (plasmid). Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>DNA sequence</th><td>GAATTCGGATCCGTCGACCTGCAGGCATGCAAGCTTGAATTCGGATCC… (72 characters)</td></tr><tr><th>Enzyme 1</th><td>EcoRI</td></tr><tr><th>Enzyme 2</th><td>HindIII</td></tr><tr><th>Molecule</th><td>Linear</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Sequence length</th><td>72 bp</td></tr><tr><th>Cut sites</th><td>4</td></tr><tr><th>Fragments</th><td>5</td></tr><tr><th>Largest fragment</th><td>30 bp</td></tr><tr><th>Smallest fragment</th><td>1 bp</td></tr></tbody></table><p>Seventy-two bases with two EcoRI sites and two HindIII sites give four cuts and five fragments: the largest is 30 bases and the smallest is a single base, which is the fragment between two cuts that fall one base apart.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>DNA sequence</th><td>GAATTCGGATCCGTCGACCTGCAGGCATGCAAGCTTGAATTCGGATCC… (72 characters)</td></tr><tr><th>Enzyme 1</th><td>EcoRI</td></tr><tr><th>Enzyme 2</th><td>HindIII</td></tr><tr><th>Molecule</th><td>Circular</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Sequence length</th><td>72</td></tr><tr><th>Cut sites</th><td>4</td></tr><tr><th>Fragments</th><td>4</td></tr><tr><th>Largest fragment</th><td>30</td></tr><tr><th>Smallest fragment</th><td>6</td></tr></tbody></table><p>2 of the 5 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Sequence length</strong> — bases after cleaning.</li><li><strong>Cut sites</strong> — positions where the chosen enzymes cut, counting both enzymes together.</li><li><strong>Fragments</strong> — pieces produced, one more than the cuts on a line and equal to the cuts on a circle.</li><li><strong>Largest</strong> — the biggest fragment, in bases.</li><li><strong>Smallest</strong> — the smallest fragment — often the one that runs off the gel.</li></ul><p>Fragment sizes are what a gel reports, so they are the figures to compare with a picture. The site count is diagnostic: one site in a circular plasmid gives one fragment the size of the plasmid, which looks like nothing happened on a gel unless you compare it with the uncut lane.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Count the recognition sites by eye and add one for a linear molecule, or leave the count as it is for a circle. Then check that the fragment sizes add up to the sequence length for a line, and to the same length for a circle.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Wrong topology</strong> — A circular plasmid with two sites gives two fragments, not three. Choosing linear changes the answer completely.</li><li><strong>Methylation</strong> — A methylated site is not cut in a real reaction, and the page cannot see methylation.</li><li><strong>Partial digests</strong> — The page predicts a complete digest. Fewer, larger fragments on the gel usually mean the enzyme did not finish.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A fixed enzyme panel</strong> — Only the enzymes listed are modelled. Others need a different tool or a hand search.</li><li><strong>Exact matches only</strong> — The page looks for the exact recognition sequence; degenerate isoschizomes are separate entries.</li><li><strong>No gel physics</strong> — It reports sizes, not how they will resolve or run.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Restriction Digest Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Digest prediction is used to design a diagnostic digest, to check that a clone has the insert in the right orientation, to choose enzymes for a double digest, and to explain a gel that shows more bands than expected.</p><p>The number of bands is not the number of fragments on a gel: two fragments of the same size run as one band, so a predicted five-fragment digest can show four. That is the commonest reason a correct prediction looks wrong on a photograph.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why does my digest show fewer bands than predicted?', 'a' => 'Co-migrating fragments of similar size, a partial digest, or a fragment too small to see. Compare the sizes before assuming a problem.'],
            ['q' => 'Why does circular DNA give fewer fragments?', 'a' => 'Because the two ends are joined. With the same number of cuts a circle always gives one fewer piece than a line.'],
            ['q' => 'Does Restriction Digest Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/puppy-adult-weight-predictor', 'name' => 'Puppy Adult Weight Predictor Calculator'],
            ['path' => '/biology/q10-temperature-coefficient', 'name' => 'Q10 Temperature Coefficient Calculator'],
            ['path' => '/biology/qpcr-efficiency', 'name' => 'qPCR efficiency Calculator'],
        ],
        'authors' => [],
    ],
];
