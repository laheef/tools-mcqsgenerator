<?php

/**
 * Random Sequence Generator Calculator
 * /biology/random-sequence-generator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Random Sequence Generator Calculator',
    'meta' => ['title' => 'Random Sequence Generator Calculator: Units & Formula', 'description' => 'Random Sequence Generator Calculator works out GC content of the output. Free to use, and the working stays on the page beside the answer. No sign-up.', 'h1' => 'Random Sequence Generator Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'kind' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'dna-acgt', 'c' => null],
                ],
                'ds' => 'ds-kind',
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '1000', 'c' => null],
                ],
            ],
            'gc' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '50', 'c' => null],
                ],
            ],
            'seed' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
                'dfl' => [
                    ['v' => '42', 'c' => null],
                ],
            ],
            'gc_actual' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'start' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'no', 'c' => null],
                ],
                'ds' => 'ds-start',
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-random-sequence-generator',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'kind',
                                    'l' => 'Alphabet',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-kind',
                                    'opts' => [
                                        ['dna-acgt', 'DNA (ACGT)', 'dna'],
                                        ['rna-acgu', 'RNA (ACGU)', 'rna'],
                                        ['protein-20-aa', 'Protein (20 aa)', 'protein'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'length',
                                    'l' => 'Length',
                                    'h' => '1 to 100 000',
                                    'suf' => 'residues',
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gc',
                                    'l' => 'Target GC content',
                                    'h' => 'DNA and RNA only',
                                    'suf' => '%',
                                    'vt' => 'numerical',
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'seed',
                                    'l' => 'Seed',
                                    'h' => 'Same seed, same sequence — any whole number',
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'gc_actual',
                                    'l' => 'GC content of the output',
                                    'suf' => '%',
                                    'oo' => 1,
                                    'vt' => 'numerical',
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'start',
                                    'l' => 'Make the sequence start with ATG',
                                    'h' => 'DNA only — gives you a start codon',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-start',
                                    'opts' => [
                                        ['yes', 'Yes', '1'],
                                        ['no', 'No', '0'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [],
        'datasets' => [
            'ds-kind' => [
                'name' => 'Alphabet',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'dna-acgt', 'label' => 'DNA (ACGT)', 'value' => 'dna'],
                    ['uid' => 'rna-acgu', 'label' => 'RNA (ACGU)', 'value' => 'rna'],
                    ['uid' => 'protein-20-aa', 'label' => 'Protein (20 aa)', 'value' => 'protein'],
                ],
            ],
            'ds-start' => [
                'name' => 'Make the sequence start with ATG',
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
        
          function mulberry32(a) {
            return function () {
              a |= 0; a = (a + 0x6D2B79F5) | 0;
              var t = Math.imul(a ^ (a >>> 15), 1 | a);
              t = (t + Math.imul(t ^ (t >>> 7), 61 | t)) ^ t;
              return ((t ^ (t >>> 14)) >>> 0) / 4294967296;
            };
          }
          omni.onResult(['kind', 'length', 'gc', 'seed', 'start'], function (ctx) {
            var kind = resolve(ctx.getRawInput('kind'), { dna: 'dna', rna: 'rna', protein: 'protein' }, 'dna');
            var n = Math.round(Number(ctx.getRawInput('length')) || 0);
            if (!(n > 0)) n = 0;
            n = Math.min(n, 100000);
            var gcTarget = Math.max(0, Math.min(100, Number(ctx.getRawInput('gc')) || 0));
            var seed = Math.round(Number(ctx.getRawInput('seed')) || 0);
            var start = /true|yes|1/i.test(String(ctx.getRawInput('start') || ''));
            if (!n) {
              ctx.addHtml(block('Random sequence', '—', 'Enter a length between 1 and 100 000.'));
              ctx.exportValue('gc_actual', 0);
              return;
            }
            var rnd = mulberry32(seed);
            var seq = '', counts = {}, i, ch;
            var seqAlpha = kind === 'protein' ? 'ACDEFGHIKLMNPQRSTVWY' : (kind === 'rna' ? 'ACGU' : 'ACGT');
            var gcPair = kind === 'rna' ? ['G', 'C'] : ['G', 'C'];
            for (i = 0; i < n; i++) {
              if (kind === 'protein') ch = seqAlpha.charAt(Math.floor(rnd() * seqAlpha.length) % seqAlpha.length);
              else {
                var r = rnd() * 100;
                if (r < gcTarget / 2) ch = gcPair[0];
                else if (r < gcTarget) ch = gcPair[1];
                else ch = (rnd() < 0.5 ? 'A' : (kind === 'rna' ? 'U' : 'T'));
              }
              seq += ch;
              counts[ch] = (counts[ch] || 0) + 1;
            }
            if (kind !== 'protein' && start && n >= 3) {
              seq = 'ATG' + seq.slice(3);
              counts = {};
              for (i = 0; i < seq.length; i++) { ch = seq.charAt(i); counts[ch] = (counts[ch] || 0) + 1; }
            }
            var gcN = (counts.G || 0) + (counts.C || 0);
            var pct = kind === 'protein' ? 0 : gcN / n * 100;
            ctx.exportValue('gc_actual', Math.round(pct * 100) / 100);
            var rows = [];
            var keys = Object.keys(counts).sort();
            for (i = 0; i < keys.length; i++) {
              rows.push([keys[i], String(counts[keys[i]]), (counts[keys[i]] / n * 100).toFixed(2) + ' %']);
            }
            var kindName = kind === 'protein' ? 'protein' : (kind === 'rna' ? 'RNA' : 'DNA');
            var head = block('Random ' + kindName + ' sequence — seed ' + seed,
              'Length      ' + n + '\nSeed        ' + seed
              + (kind === 'protein' ? '\nAlphabet    20 standard residues, uniform'
                                    : '\nTarget GC   ' + gcTarget + ' %\nRealised GC ' + pct.toFixed(2) + ' %')
              + (start && kind !== 'protein' ? '\nStart       ATG forced at position 1' : ''),
              'Reuse the seed and the length to get this exact sequence again.');
            ctx.addHtml(head + block('Sequence', wrap(seq, 60)) + table('Composition', ['Symbol', 'Count', 'Share'], rows));
          });
        TXT,
    ],
    'article' => [
        'intro' => <<<'TXT'
        Random Sequence Generator takes Alphabet, Length and Target GC content and returns GC content of the output. It is a single relationship that reads GC content of the output out of alphabet, not a table of canned results keyed by them. Units for GC content of the output default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Random Sequence Generator calculator works', 'html' => <<<'TXT'
            <p>Random Sequence Generator answers one question from 5 numbers, and the answer is GC content of the output.</p><p>The answers are GC content of the output; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 5 boxes, and nothing else.</p><ul><li><strong>Alphabet</strong> — a plain number, no unit</li><li><strong>Length</strong> — in residues. 1 to 100 000</li><li><strong>Target GC content</strong> — in %. DNA and RNA only</li><li><strong>Seed</strong> — a plain number, no unit. Same seed, same sequence — any whole number</li><li><strong>Make the sequence start with ATG</strong> — a plain number, no unit. DNA only — gives you a start codon</li></ul><p>The result box is GC content of the output in %. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: GC content of the output takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with GC content of the output is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Alphabet left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Alphabet is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Target GC content left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Target GC content is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Alphabet is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Random Sequence Generator form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Alphabet</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Alphabet is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Length</strong> is measured in residues. Fill it from a measurement rather than a memory — Length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Target GC content</strong> is measured in %. DNA and RNA only. Fill it from a measurement rather than a memory — Target GC content is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Seed</strong> takes a plain number with no unit attached. Same seed, same sequence — any whole number. Fill it from a measurement rather than a memory — Seed is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Make the sequence start with ATG</strong> takes a plain number with no unit attached. DNA only — gives you a start codon. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Make the sequence start with ATG is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>GC content of the output</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes Random Sequence Generator, works through it, and the panel lists Alphabet, Length, Target GC content and Seed.</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is GC content of the output — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Alphabet, Length, Target GC content and Seed ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Alphabet — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check GC content of the output in % against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> GC content of the output follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Alphabet, Length and Target GC content measured, GC content of the output wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/atp-cellular-respiration-energy-yield">ATP / Cellular Respiration Energy Yield Calculator</a>, <a href="/biology/autosomal-dominant-pedigree">Autosomal Dominant Pedigree Analyzer Calculator</a> and <a href="/biology/autosomal-recessive-risk">Autosomal Recessive Inheritance Risk Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Random Sequence Generator is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Random Sequence Generator is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Alphabet, Length, Target GC content and Seed beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Random Sequence Generator calculator work out?', 'a' => 'GC content of the output.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Alphabet, Length (residues), Target GC content (%), Seed, Make the sequence start with ATG. Fill alphabet, length and target GC content and leave GC content of the output empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of GC content of the output is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: GC content of the output is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to GC content of the output at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/atp-cellular-respiration-energy-yield', 'name' => 'ATP / Cellular Respiration Energy Yield Calculator'],
            ['path' => '/biology/autosomal-dominant-pedigree', 'name' => 'Autosomal Dominant Pedigree Analyzer Calculator'],
            ['path' => '/biology/autosomal-recessive-risk', 'name' => 'Autosomal Recessive Inheritance Risk Calculator'],
        ],
        'authors' => [],
    ],
];
