<?php

/**
 * Dog Coat Colour Calculator
 * /biology/dog-coat-color
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog Coat Colour Calculator',
    'engine' => 'script',
    'engine_note' => 'reads the genotype at each coat locus and reports which loci were answered and what the combination produces',
    'meta' => ['title' => 'Dog Coat Colour Calculator: Genotypes at E, K, B and D', 'description' => 'Choose the genotype at the E, K, B and D coat loci, add ticking if the dog has it, and read the coat colour those loci produce, with each locus explained.', 'h1' => 'Dog Coat Colour Calculator', 'updated' => '2026-10-29'],
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
                        1,
                    ],
                    'fields' => [
                        [
                            'name' => 'e_locus',
                            'label' => 'E locus (extension)',
                            'type' => 'select',
                            'options' => ['E/E — black allowed' => 'EE', 'E/e — black allowed, carries red' => 'Ee', 'e/e — no black, red or yellow' => 'ee'],
                            'default' => 'E/e — black allowed, carries red',
                        ],
                        [
                            'name' => 'k_locus',
                            'label' => 'K locus (dominant black / brindle)',
                            'type' => 'select',
                            'options' => ['K^B — solid black' => 'KB', 'K^br — brindle' => 'KBR', 'k^y/k^y — lets the A locus show' => 'ky'],
                            'default' => 'k^y/k^y — lets the A locus show',
                        ],
                        [
                            'name' => 'b_locus',
                            'label' => 'B locus (brown)',
                            'type' => 'select',
                            'options' => ['B/B — black pigment' => 'BB', 'B/b — black, carries brown' => 'Bb', 'b/b — brown (chocolate)' => 'bb'],
                            'default' => 'B/b — black, carries brown',
                        ],
                        [
                            'name' => 'd_locus',
                            'label' => 'D locus (dilution)',
                            'type' => 'select',
                            'options' => ['D/D — full colour' => 'DD', 'D/d — full colour, carries dilute' => 'Dd', 'd/d — diluted (blue, lilac)' => 'dd'],
                            'default' => 'D/d — full colour, carries dilute',
                        ],
                        [
                            'name' => 'ticking',
                            'label' => 'Ticking or roan spotting (T locus)',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'help' => 'Small coloured flecks on white areas',
                            'default' => 'No',
                        ],
                        ['name' => 'coat', 'label' => 'Predicted coat colour', 'type' => 'result'],
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
    
      function norm(raw) { return String(raw || '').toLowerCase().replace(/[^a-z0-9]/g, ''); }
      /*
       * The panel stores a choice as a uid derived from the option *label*, so every
       * genotype label for one locus begins with the same letters ("e-e-...", "b-b-...").
       * Reading the letters back out would always pick the first option, so each locus
       * is read from the words that actually distinguish its options.
       */
      function pickE(raw) {
        var n = norm(raw);
        if (n.indexOf('noblack') >= 0) return 'ee';
        if (n.indexOf('carries') >= 0) return 'Ee';
        return 'EE';
      }
      function pickK(raw) {
        var n = norm(raw);
        if (n.indexOf('brindle') >= 0) return 'KBR';
        if (n.indexOf('solid') >= 0) return 'KB';
        return 'ky';
      }
      function pickB(raw) {
        var n = norm(raw);
        if (n.indexOf('chocolate') >= 0 || n.indexOf('brownbrown') >= 0) return 'bb';
        if (n.indexOf('carries') >= 0) return 'Bb';
        return 'BB';
      }
      function pickD(raw) {
        var n = norm(raw);
        if (n.indexOf('diluted') >= 0 || n.indexOf('lilac') >= 0) return 'dd';
        if (n.indexOf('carries') >= 0) return 'Dd';
        return 'DD';
      }
      var E_MAP = { ee: 'red/yellow', Ee: 'has black', EE: 'has black' };
      var B_MAP = { BB: 'black', Bb: 'black (carries brown)', bb: 'brown' };
      var D_MAP = { DD: 'full', Dd: 'full (carries dilute)', dd: 'dilute' };
      function colourOf(e, k, b, d) {
        // e/e: no black pigment at all — the other loci cannot put colour back
        if (e === 'ee') {
          return d === 'dd' ? 'cream (dilute red)' : 'red / yellow / golden';
        }
        // K^B makes the dog solid black whatever A would otherwise do
        if (k === 'KB') {
          if (d === 'dd') return 'blue (dilute black)';
          return 'solid black';
        }
        if (k === 'KBR') {
          if (d === 'dd') return 'blue brindle (dilute brindle)';
          return 'brindle';
        }
        // k^y/k^y: the A locus shows; we do not model A, so both pigment states appear
        if (b === 'bb') {
          if (d === 'dd') return 'lilac / isabella (dilute chocolate)';
          if (k === 'ky') return 'chocolate (or agouti-patterned brown)';
          return 'chocolate';
        }
        if (d === 'dd') return k === 'ky' ? 'blue, or blue agouti' : 'blue';
        return k === 'ky' ? 'black, or the agouti pattern (sable, tan points)' : 'black';
      }
      omni.onResult(['e_locus', 'k_locus', 'b_locus', 'd_locus', 'ticking'], function (ctx) {
        var e = pickE(ctx.getChoice('e_locus'));
        var k = pickK(ctx.getChoice('k_locus'));
        var b = pickB(ctx.getChoice('b_locus'));
        var d = pickD(ctx.getChoice('d_locus'));
        var ticking = /true|yes|1/i.test(String(ctx.getChoice('ticking') || ''));
        var colour = colourOf(e, k, b, d);
        if (ticking) colour += ', with ticking';
        ctx.exportValue('coat', colour);
        var rows = [
          ['E (extension)', e, E_MAP[e] || ''],
          ['K (dominant black)', k === 'KB' ? 'K^B' : (k === 'KBR' ? 'K^br' : 'k^y/k^y'), k === 'KB' ? 'solid black' : (k === 'KBR' ? 'brindle' : 'lets agouti show')],
          ['B (brown)', b, B_MAP[b] || ''],
          ['D (dilution)', d, D_MAP[d] || ''],
          ['T (ticking)', ticking ? 'T/-' : 't/t', ticking ? 'flecks on white' : 'no ticking']
        ];
        var html = block('Predicted coat colour',
          'Genotype   E: ' + e + '   K: ' + (k === 'KB' ? 'K^B' : (k === 'KBR' ? 'K^br' : 'k^y/k^y'))
          + '   B: ' + b + '   D: ' + d + '\nPhenotype  ' + colour,
          e === 'ee'
            ? 'With e/e no black pigment is made, so the B, K and D loci cannot darken the dog — this is why two yellow Labradors never produce a black puppy.'
            : 'The loci act in the order E then K then A then B then D; the first one that decides the outcome wins.');
        html += table('What each locus is doing', ['Locus', 'Genotype', 'Effect'], rows);
        ctx.addHtml(html);
      });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Coat colour in dogs comes from a short list of loci that act in order. Choose the genotype at E, K, B and D, say whether ticking is present, and the page names the colour and shows what each locus is doing.
        TXT,
        'sections' => [
            ['title' => 'How this calculator works', 'html' => <<<'TXT'
            <p>It turns a genotype into a coat description by applying the known epistatic order: extension first, then dominant black, then brown, then dilution. The answer is a phrase you can check against the dog in front of you.</p><p>Each choice is read as a genotype — E/E, E/e, e/e and so on. The page applies the loci in a fixed order. E/e and E/E allow black pigment, e/e forbids it entirely, which is why a red dog can carry black but not show it. K^B forces solid black over anything the agouti locus would otherwise do, K^br gives brindle, and k^y/k^y lets the agouti pattern show. B decides black against brown pigment, and D decides whether that pigment is diluted. The first locus that settles the outcome wins, and the ones after it only modify what is left.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 things to fill in, and the order does not matter:</p><ul><li><strong>E locus (extension)</strong> — a drop-down with the choices the page offers.</li><li><strong>K locus (dominant black / brindle)</strong> — a drop-down with the choices the page offers.</li><li><strong>B locus (brown)</strong> — a drop-down with the choices the page offers.</li><li><strong>D locus (dilution)</strong> — a drop-down with the choices the page offers.</li><li><strong>Ticking or roan spotting (T locus)</strong> — a drop-down with the choices the page offers. Small coloured flecks on white areas.</li></ul><p>The answer comes back as 1 boxes: Predicted coat colour. They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>
            TXT],
            ['title' => 'Using it in a hurry', 'html' => <<<'TXT'
            <ol><li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, without a header line, and check the first and last few characters of what landed.</li><li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones that do not describe your case before you press anything.</li><li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. Nothing is submitted and nothing is uploaded.</li><li><strong>Read the figures in the order they are listed</strong> — the first one is the headline and the rest qualify it. A figure that looks impossible is almost always a paste problem, not a calculation problem.</li><li><strong>Change one thing to check it.</strong> Move a single input and watch which figures move. That tells you what the answer is actually built from.</li></ol><p>The whole page is those five steps. There is no account, no upload and no second screen.</p>
            TXT],
            ['title' => 'The form, box by box', 'html' => <<<'TXT'
            <p><strong>E locus (extension)</strong> is a drop-down with the choices the page offers. The choices are E/E — black allowed, E/e — black allowed, carries red and e/e — no black, red or yellow. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>K locus (dominant black / brindle)</strong> is a drop-down with the choices the page offers. The choices are K^B — solid black, K^br — brindle and k^y/k^y — lets the A locus show. Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>B locus (brown)</strong> is a drop-down with the choices the page offers. The choices are B/B — black pigment, B/b — black, carries brown and b/b — brown (chocolate). Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>D locus (dilution)</strong> is a drop-down with the choices the page offers. The choices are D/D — full colour, D/d — full colour, carries dilute and d/d — diluted (blue, lilac). Leave it empty only if you mean to — a blank box is not a zero.</p><p><strong>Ticking or roan spotting (T locus)</strong> is a drop-down with the choices the page offers. The choices are Yes and No. Small coloured flecks on white areas Leave it empty only if you mean to — a blank box is not a zero.</p>
            TXT],
            ['title' => 'A worked example on this page', 'html' => <<<'TXT'
            <p>These are real values produced by this page in a browser, not numbers chosen to look tidy. The boxes were filled like this:</p><table><tbody><tr><th>E locus (extension)</th><td>E/e — black allowed, carries red</td></tr><tr><th>K locus (dominant black / brindle)</th><td>k^y/k^y — lets the A locus show</td></tr><tr><th>B locus (brown)</th><td>B/b — black, carries brown</td></tr><tr><th>D locus (dilution)</th><td>d/d — diluted (blue, lilac)</td></tr><tr><th>Ticking or roan spotting (T locus)</th><td>No</td></tr></tbody></table><p>and the page reported:</p><table><tbody><tr><th>Predicted coat colour</th><td>blue, or blue agouti</td></tr></tbody></table><p>E/e with k^y/k^y, B/b and d/d gives "blue, or blue agouti": black pigment is allowed, the agouti locus is free to show, brown is carried but not expressed, and dilution turns the black to blue. The same dog with D/D would be black or agouti-patterned.</p>
            TXT],
            ['title' => 'A second run, and what moved', 'html' => <<<'TXT'
            <p>The same page run a second time, with different text in the boxes, is the quickest way to see what the answer is actually made of. This time the inputs were:</p><table><tbody><tr><th>E locus (extension)</th><td>e/e — no black, red or yellow</td></tr><tr><th>K locus (dominant black / brindle)</th><td>k^y/k^y — lets the A locus show</td></tr><tr><th>B locus (brown)</th><td>B/B — black pigment</td></tr><tr><th>D locus (dilution)</th><td>D/D — full colour</td></tr><tr><th>Ticking or roan spotting (T locus)</th><td>Yes</td></tr></tbody></table><p>and the panel returned:</p><table><tbody><tr><th>Predicted coat colour</th><td>red / yellow / golden, with ticking</td></tr></tbody></table><p>1 of the 1 figures moved. That is the point of the exercise: a figure that changes when the paste changes is being computed from it, and a figure that stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <ul><li><strong>Predicted coat colour</strong> — the pigmentation the chosen combination produces, in words, with ticking added if you said so.</li></ul><p>Read the answer as the base colour the loci allow, not as the whole appearance. White markings, ticking, merle and harlequin come from other loci and are layered on top; the phrase this page returns describes the pigment the dog can make.</p><p>Every figure in the panel is worked out from the same input at the same moment, so they belong together: reading one without the others is how a plausible number gets mistaken for a right one. The figures carry the units shown beside them, and no unit is converted behind your back — a length is the length of the sequence in the box, a percentage is a percentage of that same sequence.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Work the loci in order yourself: ask whether black is allowed (E), whether it is forced (K), whether the pattern shows, then whether the pigment is brown (B) and diluted (D). If your order differs from the page, one of you has the epistasis wrong — it is E, then K, then A, then B, then D.</p>
            TXT],
            ['title' => 'Where the answer usually goes wrong', 'html' => <<<'TXT'
            <p>Three things account for most wrong answers on a page like this:</p><ul><li><strong>Confusing genotype with appearance</strong> — A black dog can carry red at E, and a red dog can carry black. Choose the genotype, not the colour you see.</li><li><strong>Ticking is separate</strong> — Ticking adds flecks to white areas; it does not change the base pigment and should not be used to explain a colour.</li><li><strong>Labelling</strong> — Breeders sometimes use different letters for the same locus. Match the description, not the letter.</li></ul><p>Nothing here is pasted from a file: every box is short enough to type, and the choice lists mean the answer depends on which entry is selected rather than on how it is spelled.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Four loci only</strong> — Merle, harlequin, and the full agouti series are not modelled, so a merle dog will be described by its base colour.</li><li><strong>Puppy prediction</strong> — The page describes one genotype. A cross needs the parents' genotypes at every locus and a probability calculation.</li><li><strong>Not a breed test</strong> — This is a teaching model of known epistasis, not a substitute for a DNA test.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>Dog Coat Colour Calculator has no formula box, and that is deliberate. Its working is a string transformation — letters in, letters out — and a string transformation does not reduce to arithmetic on numbers. The page carries a script instead of an expression, and the script is the calculator: it reads the boxes above, does the work in your browser, and writes each answer into the box that carries its name.</p><p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a formula page you can type a result back in and solve for a missing input, but a script cannot be run backwards, so the result boxes here are read-only by design.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Work through these in order; on a page like this one of them usually explains it.</p><ul><li><strong>The paste is not what you think</strong> — a header line, a line number or a lower-case block changes the input without any visible sign. Clear the box, paste again, and look at the first and last characters before pressing Calculate.</li><li><strong>The choice is still on its default</strong> — every drop-down and radio starts on the most common option. If your case is any other one, set it deliberately.</li><li><strong>A box was left empty</strong> — an empty box is not a zero. Fill it or leave the whole question alone; half a set of inputs produces half an answer, or none.</li><li><strong>The input is too short</strong> — below a few dozen characters most of these figures describe the fragment rather than the molecule. Re-run on the full length.</li><li><strong>The sequence is the wrong molecule</strong> — DNA read as protein, protein read as DNA, RNA pasted into a DNA box — the letters overlap enough that nothing complains, and the numbers are simply about something else.</li></ul><p>If none of that explains it, the useful next step is the second-run section above: change one input, read the panel again, and see which figures move. A figure that moves is computed from your input; a figure that does not is reporting a setting.</p>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>It is used to explain why two black Labradors can produce a yellow puppy, to check whether a breeder's genotype call is consistent with the dog, and to work out what a litter could contain before a mating is planned.</p><p>The order the loci act in is the whole model, and it explains most of the surprises. Extension comes first: an e/e dog makes no black pigment at all, which is why a red dog can carry black, chocolate and dilution without showing any of them. Dominant black comes next and overrides the agouti pattern entirely, and only when both of those have had their say do brown and dilution get to change the shade.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why can two yellow Labradors never produce a black puppy?', 'a' => 'Because yellow is e/e: no black pigment is made at all, whatever the other loci say. Both parents can only pass e.'],
            ['q' => 'What does dilution do?', 'a' => 'It lightens black to blue and brown to lilac or isabella, without changing which pigment the dog is making.'],
            ['q' => 'Does Dog Coat Colour Calculator use a formula I can read?', 'a' => <<<'TXT'
            No. The working is a script that handles the letters themselves, so there is no single expression to print. What you can check is the output: every result box is named, and every one of them is produced by the script from the inputs above it.
            TXT],
            ['q' => 'Is the sequence I paste uploaded anywhere?', 'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab and the text is gone.'],
        ],
        'related' => [
            ['path' => '/biology/multi-reverse-translate', 'name' => 'Multi Reverse Translate Calculator'],
            ['path' => '/biology/mushroom-yield', 'name' => 'Mushroom Yield Calculator'],
            ['path' => '/biology/mutation-frequency', 'name' => 'Mutation frequency'],
        ],
        'authors' => [],
    ],
];
