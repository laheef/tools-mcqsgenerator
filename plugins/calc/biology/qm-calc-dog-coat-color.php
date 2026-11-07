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
    'meta' => ['title' => 'Dog Coat Colour Calculator — Formula & Results', 'description' => 'Dog Coat Colour takes E locus (extension), K locus (dominant black / brindle) and B locus (brown) and returns Loci answered. Dog Coat Colour answers one…', 'h1' => 'Dog Coat Colour Calculator', 'updated' => '2026-10-29'],
    'raw' => [
        'vars' => [
            'e_locus' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'e-e-black-allowed-carries-red', 'c' => null],
                ],
                'ds' => 'ds-e_locus',
            ],
            'k_locus' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'k-y-k-y-lets-the-a-locus-show', 'c' => null],
                ],
                'ds' => 'ds-k_locus',
            ],
            'b_locus' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'b-b-black-carries-brown', 'c' => null],
                ],
                'ds' => 'ds-b_locus',
            ],
            'd_locus' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'd-d-full-colour-carries-dilute', 'c' => null],
                ],
                'ds' => 'ds-d_locus',
            ],
            'ticking' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'no', 'c' => null],
                ],
                'ds' => 'ds-ticking',
            ],
            'loci' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'custom-dog-coat-color',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR2',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'e_locus',
                                    'l' => 'E locus (extension)',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-e_locus',
                                    'opts' => [
                                        ['e-e-black-allowed', 'E/E — black allowed', 'EE'],
                                        ['e-e-black-allowed-carries-red', 'E/e — black allowed, carries red', 'Ee'],
                                        ['e-e-no-black-red-or-yellow', 'e/e — no black, red or yellow', 'ee'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'k_locus',
                                    'l' => 'K locus (dominant black / brindle)',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-k_locus',
                                    'opts' => [
                                        ['k-b-solid-black', 'K^B — solid black', 'KB'],
                                        ['k-br-brindle', 'K^br — brindle', 'KBR'],
                                        ['k-y-k-y-lets-the-a-locus-show', 'k^y/k^y — lets the A locus show', 'ky'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'b_locus',
                                    'l' => 'B locus (brown)',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-b_locus',
                                    'opts' => [
                                        ['b-b-black-pigment', 'B/B — black pigment', 'BB'],
                                        ['b-b-black-carries-brown', 'B/b — black, carries brown', 'Bb'],
                                        ['b-b-brown-chocolate', 'b/b — brown (chocolate)', 'bb'],
                                    ],
                                ],
                            ],
                            [
                                [
                                    't' => 'v',
                                    'n' => 'd_locus',
                                    'l' => 'D locus (dilution)',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-d_locus',
                                    'opts' => [
                                        ['d-d-full-colour', 'D/D — full colour', 'DD'],
                                        ['d-d-full-colour-carries-dilute', 'D/d — full colour, carries dilute', 'Dd'],
                                        ['d-d-diluted-blue-lilac', 'd/d — diluted (blue, lilac)', 'dd'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'ticking',
                                    'l' => 'Ticking or roan spotting (T locus)',
                                    'h' => 'Small coloured flecks on white areas',
                                    'vt' => 'valueSelect',
                                    'ds' => 'ds-ticking',
                                    'opts' => [
                                        ['yes', 'Yes', '1'],
                                        ['no', 'No', '0'],
                                    ],
                                ],
                                [
                                    't' => 'v',
                                    'n' => 'loci',
                                    'l' => 'Loci answered',
                                    'h' => 'Always 4',
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
            'ds-e_locus' => [
                'name' => 'E locus (extension)',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'e-e-black-allowed', 'label' => 'E/E — black allowed', 'value' => 'EE'],
                    ['uid' => 'e-e-black-allowed-carries-red', 'label' => 'E/e — black allowed, carries red', 'value' => 'Ee'],
                    ['uid' => 'e-e-no-black-red-or-yellow', 'label' => 'e/e — no black, red or yellow', 'value' => 'ee'],
                ],
            ],
            'ds-k_locus' => [
                'name' => 'K locus (dominant black / brindle)',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'k-b-solid-black', 'label' => 'K^B — solid black', 'value' => 'KB'],
                    ['uid' => 'k-br-brindle', 'label' => 'K^br — brindle', 'value' => 'KBR'],
                    ['uid' => 'k-y-k-y-lets-the-a-locus-show', 'label' => 'k^y/k^y — lets the A locus show', 'value' => 'ky'],
                ],
            ],
            'ds-b_locus' => [
                'name' => 'B locus (brown)',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'b-b-black-pigment', 'label' => 'B/B — black pigment', 'value' => 'BB'],
                    ['uid' => 'b-b-black-carries-brown', 'label' => 'B/b — black, carries brown', 'value' => 'Bb'],
                    ['uid' => 'b-b-brown-chocolate', 'label' => 'b/b — brown (chocolate)', 'value' => 'bb'],
                ],
            ],
            'ds-d_locus' => [
                'name' => 'D locus (dilution)',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => 'd-d-full-colour', 'label' => 'D/D — full colour', 'value' => 'DD'],
                    ['uid' => 'd-d-full-colour-carries-dilute', 'label' => 'D/d — full colour, carries dilute', 'value' => 'Dd'],
                    ['uid' => 'd-d-diluted-blue-lilac', 'label' => 'd/d — diluted (blue, lilac)', 'value' => 'dd'],
                ],
            ],
            'ds-ticking' => [
                'name' => 'Ticking or roan spotting (T locus)',
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
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dog Coat Colour takes E locus (extension), K locus (dominant black / brindle) and B locus (brown) and returns Loci answered. The arithmetic is the whole method: Loci answered is worked out from E locus (extension) by one formula, applied once.
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
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Loci answered is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If E locus (extension) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: E locus (extension), K locus (dominant black / brindle) and B locus (brown) measured, Loci answered wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/multi-reverse-translate">Multi Reverse Translate Calculator</a>, <a href="/biology/mushroom-yield">Mushroom Yield Calculator</a> and <a href="/biology/mutation-frequency">Mutation frequency</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            E locus (extension), K locus (dominant black / brindle), B locus (brown), D locus (dilution), Ticking or roan spotting (T locus). Fill e_locus, k_locus and b_locus and leave Loci answered empty if you would rather have that one solved instead.
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
