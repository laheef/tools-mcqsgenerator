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
    'engine' => 'script',
    'engine_note' => 'searches a sequence for the recognition site of every enzyme and reports which ones cut and how often',
    'meta' => ['title' => 'Restriction Enzyme Finder: Unique Cutters and Non-Cutters', 'description' => 'Scan a DNA sequence against a panel of restriction enzymes and read which ones cut, which cut exactly once, and which have no site at all, linear or circular.', 'h1' => 'Restriction Enzyme Finder Calculator', 'updated' => '2026-10-29'],
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
                        1,
                        1,
                    ],
                    'fields' => [
                        [
                            'name' => 'sequence',
                            'label' => 'DNA sequence',
                            'type' => 'text',
                            'help' => 'Paste the plasmid or the amplicon; FASTA headers are ignored',
                            'default' => 'ATGGCCATTGTAATGGGCCGCTGAAAGGGTGCCCGATAGGAATTCGGATCCAAGCTT',
                        ],
                        [
                            'name' => 'circular',
                            'label' => 'Treat the molecule as circular (plasmid)',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'help' => 'Sites that span the origin are counted too',
                            'default' => 'Yes',
                        ],
                        [
                            'name' => 'cutters',
                            'label' => 'Enzymes that cut',
                            'type' => 'result',
                            'help' => 'Out of the panel',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'unique',
                            'label' => 'Unique cutters',
                            'type' => 'result',
                            'help' => 'Exactly one site',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'nocut',
                            'label' => 'Enzymes that do not cut',
                            'type' => 'result',
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
        var circular = /true|yes|1/i.test(String(ctx.getChoice('circular') || ''));
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
    'article' => [
        'intro' => <<<'TXT'
        Before choosing an enzyme for a digest, you need to know which ones cut your sequence at all. This page scans a DNA sequence against a panel of enzymes and sorts them into cutters, unique cutters and non-cutters.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It tells you which enzymes in the panel have sites in your sequence, how many cut exactly once, and how many do not cut at all — the list you want when choosing an enzyme for a diagnostic digest or a cloning strategy.</p><p>The sequence is cleaned and each enzyme in the panel is searched for its recognition site, on both strands where the site is not palindromic. A site that spans the origin counts when the molecule is marked circular. Enzymes are then grouped by how many sites they have: none, one, or more than one. A unique cutter is the useful kind for linearising a plasmid.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 things to fill in, and the order does not matter:</p><ul><li><strong>DNA sequence</strong> — a text box. Paste the plasmid or the amplicon; FASTA headers are ignored.</li><li><strong>Treat the molecule as circular (plasmid)</strong> — a drop-down with the choices the page offers. Sites that span the origin are counted too.</li></ul><p>The answer comes back as 3 boxes: Enzymes that cut, Unique cutters, Enzymes that do not cut. They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>DNA sequence</strong> is a text box. Paste the plasmid or the amplicon; FASTA headers are ignored Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Treat the molecule as circular (plasmid)</strong> is a drop-down with the choices the page offers. The choices are Yes and No. Sites that span the origin are counted too Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>DNA sequence</th><td>AATTCCGGATCCGTCGACCTGCAGGCATGCAAGCTTCCGGATCCAAGC… (73 characters)</td></tr><tr><th>Treat the molecule as circular (plasmid)</th><td>No</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Enzymes that cut</th><td>5</td></tr><tr><th>Unique cutters</th><td>0</td></tr><tr><th>Enzymes that do not cut</th><td>21</td></tr></tbody></table><p>Twenty-six enzymes in the panel, five of them cutting this 36-base fragment, none of them exactly once, and twenty-one with no site at all — a short sequence gives a lot of non-cutters.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>DNA sequence</th><td>GAATTCGGATCCGTCGACCTGCAGGCATGCAAGCTT</td></tr><tr><th>Treat the molecule as circular (plasmid)</th><td>Yes</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Enzymes that cut</th><td>6</td></tr><tr><th>Unique cutters</th><td>6</td></tr><tr><th>Enzymes that do not cut</th><td>20</td></tr></tbody></table><p>3 of the 3 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Enzymes that cut</strong> — panel members with at least one site.</li><li><strong>Unique cutters</strong> — enzymes with exactly one site.</li><li><strong>No site</strong> — enzymes in the panel with none.</li></ul><p>Unique cutters are the ones that linearise a plasmid in one place. Enzymes with several sites are for diagnostic digests; enzymes with none are the ones a cloning strategy has to avoid. The proportion matters too: a short sequence will always show many non-cutters.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Pick one enzyme from the cutter list and find its recognition sequence in the paste by eye. The count you find should match the page, and for a circular molecule remember to check across the join as well.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Circular versus linear</strong> — A site spanning the origin exists only on a circle. Marking the molecule wrongly changes the unique-cutters list.</li><li><strong>Methylation</strong> — Dam and Dcm methylation block some enzymes, and the page cannot see it.</li><li><strong>Panel limits</strong> — An enzyme missing from the panel looks like a non-cutter; it is just not modelled.</li></ul><p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, spaces and lower case are the four things that change an answer without any warning: a FASTA description line in front of the bases is read as sequence unless it is removed, the numbers down the left of a viewer are read as letters, and case means whatever the page says it means. Paste the bare letters, check the first and last few characters in the box, and only then press Calculate.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Fixed panel</strong> — Only the enzymes listed are searched.</li><li><strong>No isoschizomers</strong> — Enzymes that recognise the same site but come from different organisms are separate entries only when listed.</li><li><strong>No star activity</strong> — The scan finds exact sites and says nothing about near-cognate cutting.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Restriction Enzyme Finder Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>It is used to choose a linearising enzyme for a plasmid, to check that a cloning site is unique, to plan a diagnostic digest that distinguishes two constructs, and to avoid an enzyme that would cut an insert in half.</p><p>The list of enzymes with no site is as useful as the list with sites. Every enzyme on it is a candidate for a step later in the workflow — a site to add by PCR, a position that will not be cut when the construct is checked — and checking that list before designing primers saves a redesign, because it tells you which recognition sequences are already absent from the sequence you are working with. It is also the list to check before adding a site by PCR: a second copy of that site elsewhere in the plasmid will cut the construct you have just built. The same list also tells you which enzymes are safe for a diagnostic digest later, when the construct is finished and you want to prove it is what you think. On a small sequence the list will be long, and that is not a problem: what matters is that at least one enzyme has exactly the number of sites you need.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why do I have no unique cutters?', 'a' => <<<'TXT'
            Because at least two enzymes in the panel have sites, and none of them exactly one. On a small fragment that is normal; on a plasmid it usually means the panel has several common sites.
            TXT],
            ['q' => 'Does a circular molecule find more sites?', 'a' => 'Yes. A site that spans the origin exists only when the sequence is joined end to end.'],
            ['q' => 'Does Restriction Enzyme Finder Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/amino-acid-composition', 'name' => 'Amino Acid Composition Calculator'],
            ['path' => '/biology/animal-mortality-rate', 'name' => 'Animal mortality rate'],
            ['path' => '/biology/annealing-temperature', 'name' => 'Annealing temperature Calculator'],
        ],
        'authors' => [],
    ],
];
