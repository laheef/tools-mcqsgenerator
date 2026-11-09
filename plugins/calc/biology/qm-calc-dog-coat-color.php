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
    'meta' => ['title' => 'Dog Coat Colour Calculator: Units & Formula', 'description' => 'Dog Coat Colour Calculator takes e locus (extension) and returns loci answered. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Dog Coat Colour Calculator', 'updated' => '2026-10-29'],
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
                        [
                            'name' => 'loci',
                            'label' => 'Loci answered',
                            'type' => 'number',
                            'help' => 'Always 4',
                            'readonly' => true,
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
        var e = pickE(ctx.getRawInput('e_locus'));
        var k = pickK(ctx.getRawInput('k_locus'));
        var b = pickB(ctx.getRawInput('b_locus'));
        var d = pickD(ctx.getRawInput('d_locus'));
        var ticking = /true|yes|1/i.test(String(ctx.getRawInput('ticking') || ''));
        var colour = colourOf(e, k, b, d);
        if (ticking) colour += ', with ticking';
        ctx.exportValue('loci', 4);
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
        Dog Coat Colour takes E locus (extension), K locus (dominant black / brindle) and B locus (brown) and returns Loci answered. The arithmetic is the whole method: loci answered is worked out from e locus (extension) by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Dog Coat Colour calculator works', 'html' => <<<'TXT'
            <p>Dog Coat Colour answers one question from 5 numbers, and the answer is Loci answered.</p><p>The answers are Loci answered; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>E locus (extension)</strong> — a plain number, no unit</li><li><strong>K locus (dominant black / brindle)</strong> — a plain number, no unit</li><li><strong>B locus (brown)</strong> — a plain number, no unit</li><li><strong>D locus (dilution)</strong> — a plain number, no unit</li><li><strong>Ticking or roan spotting (T locus)</strong> — a plain number, no unit. Small coloured flecks on white areas</li></ul><p>What you get back is Loci answered, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Loci answered takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Loci answered is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>E locus (extension) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If E locus (extension) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>K locus (dominant black / brindle) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If K locus (dominant black / brindle) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>B locus (brown) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If B locus (brown) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If E locus (extension) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Dog Coat Colour form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>E locus (extension)</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — E locus (extension) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>K locus (dominant black / brindle)</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — K locus (dominant black / brindle) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>B locus (brown)</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — B locus (brown) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>D locus (dilution)</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — D locus (dilution) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Ticking or roan spotting (T locus)</strong> takes a plain number with no unit attached. Small coloured flecks on white areas. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Ticking or roan spotting (T locus) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Loci answered</strong> is a plain number. It is produced by the page's own calculation, which reads the form rather than one equation. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How the page computes', 'html' => <<<'TXT'
            <p>The calculation on this page is a procedure rather than one formula: it takes Dog Coat Colour, works through it, and the panel lists E locus (extension), K locus (dominant black / brindle), B locus (brown) and D locus (dilution).</p><p>The processing runs locally: the text you enter stays in the page, the script reads it, and the results are printed beside it. Nothing about your input is stored after you leave.</p><p>Because the script works on exactly what it is given, the usual failure is not arithmetic but input: trailing spaces, a header line from a FASTA file, an ambiguous base in the middle of a sequence. Check that the box holds the characters you meant and nothing else.</p><p>What comes back is Loci answered — the same input described several ways, which is why the panel lists them side by side rather than picking one.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have E locus (extension), K locus (dominant black / brindle), B locus (brown) and D locus (dilution) ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with E locus (extension) — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Loci answered against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Loci answered follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes E locus (extension), K locus (dominant black / brindle) and B locus (brown) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: E locus (extension), K locus (dominant black / brindle) and B locus (brown) measured, Loci answered wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Dog Coat Colour is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog Coat Colour calculator work out?', 'a' => 'Loci answered.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            E locus (extension), K locus (dominant black / brindle), B locus (brown), D locus (dilution), Ticking or roan spotting (T locus). Fill e locus (extension), k locus (dominant black / brindle) and b locus (brown) and leave Loci answered empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Loci answered is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Loci answered is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Loci answered at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/multi-reverse-translate', 'name' => 'Multi Reverse Translate Calculator'],
            ['path' => '/biology/mushroom-yield', 'name' => 'Mushroom Yield Calculator'],
            ['path' => '/biology/mutation-frequency', 'name' => 'Mutation frequency'],
        ],
        'authors' => [],
    ],
];
