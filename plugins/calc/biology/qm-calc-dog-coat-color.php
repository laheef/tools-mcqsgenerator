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
    'meta' => ['title' => 'Dog Coat Colour Calculator — Formula & Results', 'description' => 'Dog coat colour comes from four genes acting in a fixed order: E, K, B and D. It returns loci answered, and the panel shows all of them at once.', 'h1' => 'Dog Coat Colour Calculator', 'updated' => '2026-10-29'],
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
        Dog coat colour comes from four genes acting in a fixed order: E, K, B and D. It returns loci answered, and the panel shows all of them at once.
        
        This page takes the genotype at those four loci and returns the colour you would see, the full gene order, and what each locus is doing.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Dog Coat Colour', 'html' => <<<'TXT'
            <p>E → K → B → D, in that order: E decides if black is made, K overrides the agouti pattern, B sets black vs brown, D dilutes whatever pigment is left</p>
            <figure class="calc-figure"><img src="/uploads/biology/dog-coat-color.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Dog Coat Colour Calculator — Phenotype counts in a litter of 8 from a typical cross" title="Dog Coat Colour Calculator"><figcaption>Phenotype counts in a litter of 8 from a typical cross</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>E</code></td><td>extension — e/e blocks all black pigment</td><td>locus</td></tr><tr><td><code>K</code></td><td>dominant black: K^B solid, K^br brindle, k^y allows agouti</td><td>locus</td></tr><tr><td><code>B</code></td><td>b/b turns black pigment brown</td><td>locus</td></tr><tr><td><code>D</code></td><td>d/d dilutes black to blue and brown to lilac</td><td>locus</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Dog Coat Colour?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the genotype at each locus — a dog can only be E/E or E/e if it shows any black at all.</li><li>Tick ticking if the dog has flecks on its white areas; that is the T locus and it is not part of the four-locus colour model.</li><li>Read the predicted colour, then the gene-order explanation: it tells you which locus is actually responsible, which is what matters if you are planning a litter.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>e/e</td><td><strong>Red, yellow or cream</strong></td><td>no black pigment can be made, whatever the other loci say</td></tr><tr><td>E/- + K^B</td><td><strong>Solid black</strong></td><td>dominant black overrides the agouti pattern</td></tr><tr><td>E/- + k^y/k^y + B/-</td><td><strong>Black, or agouti if A allows</strong></td><td>the A locus decides the pattern</td></tr><tr><td>b/b</td><td><strong>Chocolate or liver</strong></td><td>black pigment turned brown</td></tr><tr><td>d/d</td><td><strong>Blue, lilac or isabella</strong></td><td>dilution of whatever the dog would otherwise be</td></tr></tbody></table>
            <ul><li><p>The order matters and is the whole point of the page: a b/b dog that is also e/e is not chocolate, because with no black pigment there is nothing for B to turn brown. Epistasis runs E over K over A over B over D.</p></li><li><p>Dilution is a pigment-density effect, not a colour: d/d turns black into blue and brown into lilac, and dilutes red to a paler cream.</p></li><li><p>Two loci that often surprise people are missing from this model on purpose — the A (agouti) pattern, which needs a full allele series to be useful, and the merle locus, which is incompletely dominant and often unhealthy in homozygotes.</p></li><li><p>Locus notation varies by author (E, EXT; K, CBD103; B, TYRP1; D, MLPH). The phenotype is the same; the letters are convention.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Naming a colour from the B locus alone: a b/b dog with no black pigment is red, not chocolate.</li><li>Assuming two chocolate parents give only chocolate puppies — they do, at the B locus, but E and K still decide whether any black pigment exists to be browned.</li><li>Breeding two merle dogs because the colours look interesting; double merle causes deafness and eye defects, which is why merle is not offered here.</li><li>Reading K^br as "any brindle pattern": brindle needs black pigment to stripe, so an e/e dog cannot be brindled.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/rabbit-color">Rabbit colour genetics</a>. <a href="/biology/dog-size">Dog size</a>. <a href="/biology/punnett-square">Punnett square</a>. <a href="/biology/dihybrid-cross">Dihybrid cross</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How is dog coat colour inherited?', 'a' => <<<'TXT'
            Through a small set of loci acting in a fixed order. E decides whether black pigment is produced at all; K overrides the agouti pattern with solid black or brindle; A sets the pattern; B makes black pigment brown; D dilutes the result.
            TXT],
            ['q' => 'Can two black Labradors have yellow puppies?', 'a' => 'Yes — if both parents are E/e. The puppies that inherit e from both sides cannot make black pigment and are yellow, whatever their B and K loci say.'],
            ['q' => 'What makes a dog chocolate instead of black?', 'a' => 'Two copies of b at the TYRP1 locus, plus at least one E so that black pigment is actually being made. Without E, the B locus has nothing to act on.'],
            ['q' => 'Is this a DNA test?', 'a' => <<<'TXT'
            No. It predicts a phenotype from a genotype you enter. The loci are real and commercially tested, but a prediction from a pedigree is only as good as the assumed genotypes.
            TXT],
            ['q' => 'What does the Dog Coat Colour actually calculate?', 'a' => 'It returns loci answered. Each one is derived by the formula on this page, so you can check any figure by hand.'],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
        ],
        'related' => [],
    ],
];
