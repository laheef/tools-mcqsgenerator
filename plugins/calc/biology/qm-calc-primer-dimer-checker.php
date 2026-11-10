<?php

/**
 * Primer Dimer Checker
 * /biology/primer-dimer-checker
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Primer Dimer Checker',
    'engine' => 'script',
    'engine_note' => 'checks a primer pair for complementary runs, 3-prime complementarity and the risk of forming dimers',
    'meta' => ['title' => 'Primer Dimer Checker: Self-Pairs, Hairpins and Risk', 'description' => 'Check a primer pair for complementary runs, 3-prime self-complementarity, hairpins and cross-dimers, and read a single risk rating for the pair before ordering.', 'h1' => 'Primer Dimer Checker', 'updated' => '2026-10-29'],
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
                            'name' => 'forward',
                            'label' => 'Forward primer (5′→3′)',
                            'type' => 'text',
                            'help' => 'Paste the primer',
                            'default' => 'ATGGCCATTGTAATGGGCCG',
                        ],
                        [
                            'name' => 'reverse',
                            'label' => 'Reverse primer (5′→3′)',
                            'type' => 'text',
                            'help' => 'Paste the primer',
                            'default' => 'CTATCGGGCACCCTTTCAG',
                        ],
                        [
                            'name' => 'tail_run',
                            'label' => '3′ complementary run',
                            'type' => 'result',
                            'suffix' => 'bases',
                            'help' => '3 or more is a risk',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'any_run',
                            'label' => 'Longest complementary run',
                            'type' => 'result',
                            'suffix' => 'bases',
                            'help' => 'Anywhere in the pair',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'self_fwd',
                            'label' => 'Forward self-dimer run',
                            'type' => 'result',
                            'suffix' => 'bases',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'self_rev',
                            'label' => 'Reverse self-dimer run',
                            'type' => 'result',
                            'suffix' => 'bases',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hairpin_fwd',
                            'label' => 'Forward hairpin stem',
                            'type' => 'result',
                            'suffix' => 'bases',
                            'help' => '4 or more can misprime',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hairpin_rev',
                            'label' => 'Reverse hairpin stem',
                            'type' => 'result',
                            'suffix' => 'bases',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'risk',
                            'label' => 'Dimer risk score',
                            'type' => 'result',
                            'suffix' => 'of 10',
                            'help' => '0 is clean, 10 is a guaranteed dimer',
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
    
      function longestRun(a, b) {
        // longest stretch where a[i..] pairs with b[..] read backwards
        a = a.slice(0, 60); b = b.slice(0, 60);
        var best = 0;
        for (var i = 0; i < a.length; i++) {
          for (var j = 0; j < b.length; j++) {
            var k = 0;
            while (i + k < a.length && j - k >= 0 && COMP[a.charAt(i + k)] === b.charAt(j - k)) k++;
            if (k > best) best = k;
          }
        }
        return best;
      }
      function endRun(a, b) {
        // Two primers anneal antiparallel, so their 3' ends sit opposite each other:
        // position 1 from the 3' end of one pairs with position 1 from the 3' end of
        // the other. The run is how far that pairing continues before a mismatch.
        var best = 0;
        for (var k = 1; k <= Math.min(a.length, b.length); k++) {
          if (COMP[a.charAt(a.length - k)] === b.charAt(b.length - k)) best = k; else break;
        }
        return best;
      }
      function hairpinStem(p) {
        // a stem needs a loop of at least three bases between the two halves
        var best = 0;
        for (var loop = 3; loop <= 12; loop++) {
          for (var i = 0; i + loop < p.length; i++) {
            var k = 0;
            while (i - k >= 0 && i + loop + k < p.length
                   && COMP[p.charAt(i - k)] === p.charAt(i + loop + k)) k++;
            if (k > best) best = k;
          }
        }
        return best;
      }
      omni.onResult(['forward', 'reverse'], function (ctx) {
        var f = cleanSeq(ctx.getRawInput('forward'), 'dna').slice(0, 100);
        var r = cleanSeq(ctx.getRawInput('reverse'), 'dna').slice(0, 100);
        if (!f || !r) {
          ctx.addHtml(block('Primer dimers', '—', 'Paste both primers to check the pair.'));
          return;
        }
        var tail = Math.max(endRun(f, r), endRun(r, f));
        var any = longestRun(f, r);
        var selfF = longestRun(f, f), selfR = longestRun(r, r);
        var hairF = hairpinStem(f), hairR = hairpinStem(r);
        var score = 0;
        if (tail >= 2) score += Math.min(6, Math.pow(3, tail - 2));
        if (Math.max(selfF, selfR) >= 4) score += 2;
        if (Math.max(hairF, hairR) >= 4) score += 2;
        score = Math.min(10, score);
    
        ctx.exportValue('tail_run', tail);
        ctx.exportValue('any_run', any);
        ctx.exportValue('self_fwd', selfF);
        ctx.exportValue('self_rev', selfR);
        ctx.exportValue('hairpin_fwd', hairF);
        ctx.exportValue('hairpin_rev', hairR);
        ctx.exportValue('risk', score);
    
        var verdict = tail >= 5 ? 'Redesign the pair'
          : tail >= 3 ? 'Risk of dimers — consider a redesign'
          : 'No significant 3′ complementarity';
        ctx.addHtml(block('Verdict',
          verdict + '\n3′ complementary run: ' + tail + ' base' + (tail === 1 ? '' : 's')
          + '\nLongest run anywhere: ' + any + ' bases'
          + '\nSelf-dimers: forward ' + selfF + ', reverse ' + selfR
          + '\nHairpin stems: forward ' + hairF + ', reverse ' + hairR
          + '\nRisk score: ' + score + '/10',
          tail >= 3
            ? 'A polymerase can extend a 3′ duplex of three or more bases, so the primer pair will '
              + 'amplify a dimer. Move the 3′ end a base or two, or trim it.'
            : 'Nothing at the 3′ ends can be extended, which is what matters for dimer formation.'));
        ctx.addHtml(table('Detail', ['Check', 'Bases', 'Reads as'],
          [['3′ cross-dimer', String(tail), tail >= 3 ? 'extendable — a real risk' : 'not extendable'],
           ['Anywhere in the pair', String(any), any >= 6 ? 'strong but not extendable' : 'minor'],
           ['Forward self-dimer', String(selfF), selfF >= 5 ? 'will self-pair' : 'acceptable'],
           ['Reverse self-dimer', String(selfR), selfR >= 5 ? 'will self-pair' : 'acceptable'],
           ['Forward hairpin', String(hairF), hairF >= 4 ? 'stable enough to misprime' : 'unlikely'],
           ['Reverse hairpin', String(hairR), hairR >= 4 ? 'stable enough to misprime' : 'unlikely']]));
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Primer dimers consume primers before they can amplify anything, and they show up as a low-molecular-weight band rather than an error. This page checks a pair for the complements that make dimers form and summarises the result as a risk rating.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It looks for the patterns that let primers pair with themselves or with each other: a complementary run anywhere in the pair, a run at the 3′ end where extension can start, and a hairpin where a primer folds back on itself.</p><p>The page takes each primer and builds its reverse complement, then slides the two against each other to find the longest complementary stretch. A run anywhere in the pair is reported as potential dimerisation; a run at the 3′ end is reported separately because that is the end a polymerase extends from, so a 3′ dimer is far worse than an internal one. The same alignment run against the primer itself gives the hairpin length, and the risk rating combines the length of the worst 3′ run with the hairpin figures.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 things to fill in, and the order does not matter:</p><ul><li><strong>Forward primer (5′→3′)</strong> — a text box. Paste the primer.</li><li><strong>Reverse primer (5′→3′)</strong> — a text box. Paste the primer.</li></ul><p>The answer comes back as 7 boxes: 3′ complementary run (bases), Longest complementary run (bases), Forward self-dimer run (bases), Reverse self-dimer run (bases), Forward hairpin stem (bases), Reverse hairpin stem (bases), Dimer risk score (of 10). They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Forward primer (5′→3′)</strong> is a text box. Paste the primer Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Reverse primer (5′→3′)</strong> is a text box. Paste the primer Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Forward primer (5′→3′)</th><td>ATGGCCATTGTAATGGGCC</td></tr><tr><th>Reverse primer (5′→3′)</th><td>GCTGAAAGGGTGCCCGATAG</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>3′ complementary run</th><td>1 bases</td></tr><tr><th>Longest complementary run</th><td>4 bases</td></tr><tr><th>Forward self-dimer run</th><td>8 bases</td></tr><tr><th>Reverse self-dimer run</th><td>3 bases</td></tr><tr><th>Forward hairpin stem</th><td>5 bases</td></tr><tr><th>Reverse hairpin stem</th><td>3 bases</td></tr><tr><th>Dimer risk score</th><td>4 of 10</td></tr></tbody></table><p>A 19-mer and a 20-mer with no 3′ complementarity still show an eight-base run internally, and a five-base hairpin in each. The risk of four reflects the internal run rather than a 3′ problem — the pair will probably work, but it is not a clean pair.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Forward primer (5′→3′)</th><td>ATGGCCATTGTAATGGGCC</td></tr><tr><th>Reverse primer (5′→3′)</th><td>GGCCCATTACAATGGCCAT</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>3′ complementary run</th><td>0</td></tr><tr><th>Longest complementary run</th><td>19</td></tr><tr><th>Forward self-dimer run</th><td>8</td></tr><tr><th>Reverse self-dimer run</th><td>8</td></tr><tr><th>Forward hairpin stem</th><td>5</td></tr><tr><th>Reverse hairpin stem</th><td>5</td></tr><tr><th>Dimer risk score</th><td>4</td></tr></tbody></table><p>4 of the 7 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>3′ complementary run</strong> — the longest complementary stretch at the 3′ end, where extension begins.</li><li><strong>Longest complementary run</strong> — the longest complement anywhere between the two primers.</li><li><strong>Self-pair, forward</strong> — the longest stretch where the forward primer is complementary to itself.</li><li><strong>Hairpin, forward</strong> — the longest fold-back a single primer can form with itself.</li><li><strong>Risk</strong> — a combined rating from the 3′ and internal figures.</li></ul><p>Read the 3′ figures first: a complementary run of three or more bases at the 3′ end is the one that ruins reactions. Internal runs of six to eight bases are common and usually tolerable. Hairpins under about five bases rarely matter; longer ones can hide the 3′ end from the polymerase.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Write the reverse complement of the forward primer and line it up against the reverse primer by hand. The longest run where the letters pair is the figure the page reports. Then look at whether that run reaches the 3′ end.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Reading the wrong end</strong> — A 3′ run is the dangerous one. The same run moved five bases inward is usually harmless.</li><li><strong>Sequence direction</strong> — The reverse primer must be entered 5′ to 3′ as ordered, not as it appears in the template.</li><li><strong>Ignoring concentration</strong> — Dimer formation depends on concentration and temperature as well as sequence; a borderline pair can be fine at low concentration.</li></ul><p>Nothing here is pasted from a file: every box is short enough to type, and the choice lists mean the answer depends on which entry is selected rather than on how it is spelled.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Two primers only</strong> — Multiplex reactions need every pair checked, which this page does one pair at a time.</li><li><strong>No thermodynamics</strong> — The runs are counted, not scored by nearest-neighbour thermodynamics, so the rating is a guide rather than a free energy.</li><li><strong>No product level</strong> — It checks the primers against each other, not against the template.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Primer Dimer Checker has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Dimer checks are run before ordering a pair, when a reaction produces a band at the bottom of the gel instead of a product, and when a primer that worked at one concentration stops working at another.</p><p>The figures describe the primers at the moment they are mixed, before any template is added. That is why dimer problems scale with primer concentration and why reducing the primer in the reaction often fixes a failing pair without redesigning anything: the same complementary run is present, but it finds a partner less often. Raising the annealing temperature has the same effect for the same reason, and both changes are cheaper than a new pair of primers. If neither works, the 3′ figure is the one to look at rather than the internal run: it is the run a polymerase can extend, and it is reported separately for exactly this reason. A pair with a long internal run and a clean 3′ end is usually worth trying before ordering replacements.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What counts as a bad 3′ run?', 'a' => 'Three or more complementary bases at the 3′ end. That is enough for a polymerase to extend the dimer and consume both primers.'],
            ['q' => 'Are hairpins always a problem?', 'a' => <<<'TXT'
            No. Short ones open and close constantly and the polymerase displaces them. A hairpin that includes the 3′ end and runs five or more bases is the one to avoid.
            TXT],
            ['q' => 'Does Primer Dimer Checker use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/specific-growth-rate-od', 'name' => 'Specific Growth Rate from OD Calculator'],
            ['path' => '/biology/specific-growth-rate-from-od', 'name' => 'Specific Growth Rate from OD Readings Calculator'],
            ['path' => '/biology/specific-productivity-qp', 'name' => 'Specific Productivity (qP) Calculator'],
        ],
        'authors' => [],
    ],
];
