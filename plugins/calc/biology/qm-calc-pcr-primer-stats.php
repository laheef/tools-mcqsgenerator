<?php

/**
 * PCR Primer Stats Calculator
 * /biology/pcr-primer-stats
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PCR Primer Stats Calculator',
    'engine' => 'script',
    'engine_note' => 'reads a primer pair and works out length, GC content, melting temperature, hairpins and dimers',
    'meta' => ['title' => 'PCR Primer Stats Calculator: Tm, GC Content and Annealing', 'description' => 'Paste a primer pair and read each primer\'s length, GC content and melting temperature, plus the annealing temperature and the gap between the two primers.', 'h1' => 'PCR Primer Stats Calculator', 'updated' => '2026-10-29'],
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
                        0,
                        1,
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
                            'help' => 'Paste the primer as ordered',
                            'default' => 'CTATCGGGCACCCTTTCAG',
                        ],
                        [
                            'name' => 'fwd_len',
                            'label' => 'Forward length',
                            'type' => 'result',
                            'suffix' => 'nt',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fwd_gc',
                            'label' => 'Forward GC',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fwd_tm',
                            'label' => 'Forward Tm',
                            'type' => 'result',
                            'suffix' => '°C',
                            'help' => 'Wallace under 14 nt, GC rule to 40 nt, then the long form',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rev_len',
                            'label' => 'Reverse length',
                            'type' => 'result',
                            'suffix' => 'nt',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rev_gc',
                            'label' => 'Reverse GC',
                            'type' => 'result',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rev_tm',
                            'label' => 'Reverse Tm',
                            'type' => 'result',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ta',
                            'label' => 'Suggested annealing temperature',
                            'type' => 'result',
                            'suffix' => '°C',
                            'help' => 'About the lower primer Tm minus 5',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dtm',
                            'label' => 'Difference in Tm',
                            'type' => 'result',
                            'suffix' => '°C',
                            'help' => 'Under 5 °C is the usual target',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dimer',
                            'label' => 'Longest 3′ complementary run',
                            'type' => 'result',
                            'suffix' => 'bases',
                            'help' => '3 or more risks primer dimers',
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
    
      function primerStats(p) {
        var n = p.length, gc = gcOf(p), at = n - gc;
        return {n: n, gc: gc, pct: n ? gc / n * 100 : 0, tm: n ? tmOf(n, n ? gc / n * 100 : 0, at, gc) : 0,
                clamp: /[GC]$/.test(p)};
      }
      function maxComplementaryRun(a, b) {
        // Longest stretch where a[i..] pairs with the reverse of b[..]. The search is
        // quadratic, so it is capped: nothing legitimate is longer than an oligo, and
        // an uncapped loop lets a pasted 20 kb sequence freeze the page.
        a = a.slice(0, 80); b = b.slice(0, 80);
        var best = 0;
        for (var i = 0; i < a.length; i++) {
          for (var j = 0; j < b.length; j++) {
            var k = 0;
            while (i + k < a.length && j - k >= 0 && (COMP[a.charAt(i + k)] === b.charAt(j - k))) k++;
            if (k > best) best = k;
          }
        }
        return best;
      }
      function tailRun(a, b) {
        // longest run that involves the 3' end of either primer
        var best = 0;
        for (var k = 1; k <= Math.min(a.length, b.length); k++) {
          if (COMP[a.charAt(a.length - 1 - (k - 1))] === b.charAt(b.length - k)) best = k; else break;
        }
        var best2 = 0;
        for (var k2 = 1; k2 <= Math.min(a.length, b.length); k2++) {
          if (COMP[b.charAt(b.length - 1 - (k2 - 1))] === a.charAt(a.length - k2)) best2 = k2; else break;
        }
        return Math.max(best, best2);
      }
      function longestHomopolymer(s) {
        var best = 1, run = 1;
        for (var i = 1; i < s.length; i++) {
          if (s.charAt(i) === s.charAt(i - 1)) { run++; if (run > best) best = run; } else run = 1;
        }
        return s.length ? best : 0;
      }
      omni.onResult(['forward', 'reverse'], function (ctx) {
        var f = cleanSeq(ctx.getRawInput('forward'), 'dna');
        var r = cleanSeq(ctx.getRawInput('reverse'), 'dna');
        var tooLong = (f.length > 200 || r.length > 200);
        if (f.length > 200) f = f.slice(0, 200);
        if (r.length > 200) r = r.slice(0, 200);
        if (!f && !r) {
          ctx.addHtml(block('Primer stats', '—', 'Paste a forward or reverse primer, or both.'));
          return;
        }
        var sf = f ? primerStats(f) : null;
        var sr = r ? primerStats(r) : null;
    
        if (sf) {
          ctx.exportValue('fwd_len', sf.n);
          ctx.exportValue('fwd_gc', Math.round(sf.pct * 10) / 10);
          ctx.exportValue('fwd_tm', Math.round(sf.tm * 10) / 10);
        }
        if (sr) {
          ctx.exportValue('rev_len', sr.n);
          ctx.exportValue('rev_gc', Math.round(sr.pct * 10) / 10);
          ctx.exportValue('rev_tm', Math.round(sr.tm * 10) / 10);
        }
        if (sf && sr) {
          var lower = Math.min(sf.tm, sr.tm);
          var dtm = Math.abs(sf.tm - sr.tm);
          var dimer = Math.max(tailRun(f, r), tailRun(f, f), tailRun(r, r));
          ctx.exportValue('ta', Math.round((lower - 5) * 10) / 10);
          ctx.exportValue('dtm', Math.round(dtm * 10) / 10);
          ctx.exportValue('dimer', dimer);
        }
    
        var rows = [];
        if (sf) rows.push(['Forward', f, String(sf.n), pct1(sf.pct) + '%', pct1(sf.tm),
                           sf.clamp ? 'yes' : 'no', String(longestHomopolymer(f)),
                           String(maxComplementaryRun(f, f))]);
        if (sr) rows.push(['Reverse', r, String(sr.n), pct1(sr.pct) + '%', pct1(sr.tm),
                           sr.clamp ? 'yes' : 'no', String(longestHomopolymer(r)),
                           String(maxComplementaryRun(r, r))]);
        ctx.addHtml(table('Primer by primer',
          ['Primer', 'Sequence', 'Length', 'GC', 'Tm', 'GC clamp', 'Longest run', 'Self-complement'],
          rows, 'Tm uses the length-appropriate approximation at 50 mM Na⁺.'));
    
        if (tooLong) {
          ctx.addHtml(block('That is not a primer',
            'A primer longer than 200 nt is not something a synthesiser will make, so only the first '
            + '200 bases were analysed. Paste a single primer of 18–30 nt for a meaningful answer.'));
        }
        if (sf && sr) {
          var warn = [];
          if (Math.abs(sf.tm - sr.tm) > 5) warn.push('the two Tm values differ by more than 5 °C');
          if (tailRun(f, r) >= 3) warn.push('the 3′ ends can pair, which risks primer dimers');
          if (longestHomopolymer(f) >= 5 || longestHomopolymer(r) >= 5) warn.push('a homopolymer run of 5 or more invites slippage');
          if (Math.abs(f.length - r.length) > 6) warn.push('the primers are very different in length');
          ctx.addHtml(block('Pair check',
            'Annealing temperature about ' + pct1(Math.min(sf.tm, sr.tm) - 5) + ' °C'
            + '\nTm difference ' + pct1(Math.abs(sf.tm - sr.tm)) + ' °C'
            + '\n3′ complementary run ' + tailRun(f, r) + ' base' + (tailRun(f, r) === 1 ? '' : 's'),
            warn.length ? 'Watch: ' + warn.join('; ') + '.' : 'No obvious pairing or balance problems.'));
        }
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Before a primer pair goes into a reaction, four numbers decide whether it will work: length, GC content, melting temperature and how closely the two melting temperatures match. This page reports all four for both primers and the annealing temperature that follows.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It describes a primer pair the way a thermocycler needs to see it, and flags the two pair-level problems that single-primer tools miss: a large difference between the two melting temperatures, and a pair that would rather bind to itself.</p><p>Each primer is cleaned to letters and its length and GC content counted. The melting temperature is estimated from length and composition using the standard rules: the Wallace rule for very short primers, the GC-percentage form for typical ones, and a thermodynamic approximation for longer ones. The annealing temperature is derived from the pair, and the temperature gap is the difference between the two melting points — the figure that decides whether one annealing step can serve both primers.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 things to fill in, and the order does not matter:</p><ul><li><strong>Forward primer (5′→3′)</strong> — a text box. Paste the primer.</li><li><strong>Reverse primer (5′→3′)</strong> — a text box. Paste the primer as ordered.</li></ul><p>The answer comes back as 9 boxes: Forward length (nt), Forward GC (%), Forward Tm (°C), Reverse length (nt), Reverse GC (%), Reverse Tm (°C), Suggested annealing temperature (°C), Difference in Tm (°C), Longest 3′ complementary run (bases). They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>Forward primer (5′→3′)</strong> is a text box. Paste the primer Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Reverse primer (5′→3′)</strong> is a text box. Paste the primer as ordered Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>Forward primer (5′→3′)</th><td>ATGGCCATTGTAATGGGCC</td></tr><tr><th>Reverse primer (5′→3′)</th><td>GCTGAAAGGGTGCCCGATAG</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Forward length</th><td>19 nt</td></tr><tr><th>Forward GC</th><td>52.6 %</td></tr><tr><th>Forward Tm</th><td>51.1 °C</td></tr><tr><th>Reverse length</th><td>20 nt</td></tr><tr><th>Reverse GC</th><td>60 %</td></tr><tr><th>Reverse Tm</th><td>55.9 °C</td></tr><tr><th>Suggested annealing temperature</th><td>46.1 °C</td></tr><tr><th>Difference in Tm</th><td>4.8 °C</td></tr><tr><th>Longest 3′ complementary run</th><td>1 bases</td></tr></tbody></table><p>A 19-mer at 52.6 per cent GC melts at 51.1 °C; the 20-mer at 60 per cent melts at 55.9 °C. The 4.8 °C gap is wide enough to matter, and the annealing temperature of 46.1 °C sits below both so that neither primer is asked to anneal above its own melting point.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>Forward primer (5′→3′)</th><td>CGGATCCGTCGACCTGCAG</td></tr><tr><th>Reverse primer (5′→3′)</th><td>AAGCTTGTCGACCTGCAGG</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Forward length</th><td>19</td></tr><tr><th>Forward GC</th><td>68.4</td></tr><tr><th>Forward Tm</th><td>57.6</td></tr><tr><th>Reverse length</th><td>19</td></tr><tr><th>Reverse GC</th><td>57.9</td></tr><tr><th>Reverse Tm</th><td>53.2</td></tr><tr><th>Suggested annealing temperature</th><td>48.2</td></tr><tr><th>Difference in Tm</th><td>4.3</td></tr><tr><th>Longest 3′ complementary run</th><td>0</td></tr></tbody></table><p>8 of the 9 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Forward length</strong> — bases in the forward primer.</li><li><strong>Forward GC</strong> — the percentage of G and C in the forward primer.</li><li><strong>Forward Tm</strong> — the estimated melting temperature of the forward primer on its own.</li><li><strong>Annealing temperature</strong> — the suggested annealing step for the pair, below the lower melting point.</li><li><strong>Temperature gap</strong> — the difference between the two melting temperatures.</li><li><strong>Pair Tm</strong> — the melting point of the two primers as a pair, which is what the annealing step is really about.</li></ul><p>A well-matched pair is within about 2 °C on melting temperature. A gap of five degrees or more means one primer will anneal while the other is still coming off, and the product will be weak or absent. The annealing temperature is a starting point, not a guarantee: the first few cycles of a gradient will tell you more than any formula.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Use the Wallace rule on a primer under twenty bases: two degrees for every A or T and four for every G or C. A 19-mer with 10 GC gives about 56 °C by that rule, and the page's more careful estimate is usually a few degrees below it. If your hand figure is far off, count the GC content again.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Pasting the reverse primer reversed</strong> — The reverse primer is written 5′ to 3′ as ordered. Pasting its complement, or its reverse, changes the melting figure.</li><li><strong>Short primers</strong> — Under about eighteen bases the melting estimate is sensitive to length and the figures move in steps.</li><li><strong>Stocks versus order</strong> — The numbers describe the primer sequence, not the concentration you resuspend it to.</li></ul><p>Nothing here is pasted from a file: every box is short enough to type, and the choice lists mean the answer depends on which entry is selected rather than on how it is spelled.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Composition-based Tm</strong> — Salt, magnesium, dNTPs and primer concentration all move the real melting point and none of them is a box here.</li><li><strong>No product check</strong> — The page scores the primers; it does not check whether they point at each other or amplify one product.</li><li><strong>No specificity</strong> — Whether the primers match the genome you are using is a separate search.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>PCR Primer Stats Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Primer statistics are checked when ordering a new pair, when explaining why one reaction in a plate worked and another did not, and when deciding whether to redesign the weaker primer of a pair rather than change the whole protocol.</p><p>The pair figures are the ones to act on. If the two melting temperatures disagree by more than a couple of degrees, changing the shorter primer shifts the annealing temperature of the whole reaction, whereas changing the longer one usually does not. When the temperature gap is already small, the useful next check is the pair's tendency to form dimers, which is a separate page.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why is the annealing temperature lower than both melting points?', 'a' => <<<'TXT'
            Because the published rules describe the temperature at which half the primer is bound. Annealing at that temperature gives weak priming; five degrees below it gives specific product.
            TXT],
            ['q' => 'How close should the two melting temperatures be?', 'a' => 'Within about two degrees. Beyond that the pair is really two primers designed for different reactions.'],
            ['q' => 'Does PCR Primer Stats Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/cephalic-index', 'name' => 'Cephalic Index Calculator'],
            ['path' => '/biology/cfu-g-calculator', 'name' => 'CFU/g Calculator'],
            ['path' => '/biology/cfu-ml-calculator', 'name' => 'CFU/mL Calculator'],
        ],
        'authors' => [],
    ],
];
