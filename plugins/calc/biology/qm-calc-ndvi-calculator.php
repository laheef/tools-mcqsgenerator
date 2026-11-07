<?php

/**
 * NDVI Calculator (Normalised Difference Vegetation Index)
 * /biology/ndvi-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'NDVI Calculator (Normalised Difference Vegetation Index)',
    'meta' => ['title' => 'NDVI Calculator (Normalised Difference Vegetation', 'description' => 'Enter Near-infrared reflectance and Red reflectance into NDVI Calculator (Normalised Difference Vegetation Index) and the answer comes back as NDVI and EVI…', 'h1' => 'NDVI Calculator (Normalised Difference Vegetation Index)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'nir',
                            'label' => 'Near-infrared reflectance',
                            'type' => 'number',
                            'help' => '0 to 1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.42',
                        ],
                        [
                            'name' => 'red',
                            'label' => 'Red reflectance',
                            'type' => 'number',
                            'help' => '0 to 1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.08',
                        ],
                        [
                            'name' => 'ndvi',
                            'label' => 'NDVI',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'evi',
                            'label' => 'EVI approximation',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cover',
                            'label' => 'Estimated fractional cover',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'class_no',
                            'label' => 'Surface class (0 water … 6 very dense)',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Vegetation',
            'results' => ['ndvi' => '(nir-red)/(nir+red)', 'evi' => '2.5*(nir-red)/(nir+6*red+1)', 'cover' => 'pow(max(0,(nir-red)/(nir+red)),0.6)*100', 'class_no' => <<<'TXT'
            if_else((nir+red)==0,-1,if_else((nir-red)/(nir+red)<0,0,if_else((nir-red)/(nir+red)<0.1,1,if_else((nir-red)/(nir+red)<0.2,2,if_else((nir-red)/(nir+red)<0.4,3,if_else((nir-red)/(nir+red)<0.6,4,if_else((nir-red)/(nir+red)<0.8,5,6)))))))
            TXT],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Near-infrared reflectance and Red reflectance into NDVI Calculator (Normalised Difference Vegetation Index) and the answer comes back as NDVI and EVI approximation. The arithmetic is the whole method: NDVI is worked out from Near-infrared reflectance by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the NDVI Calculator (Normalised Difference Vegetation Index) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind NDVI Calculator (Normalised Difference Vegetation Index): it takes 2 numbers and reports NDVI, EVI approximation and Estimated fractional cover.</p><p>Written with the labels from the form, NDVI = (Near-infrared reflectance − Red reflectance) ÷ (Near-infrared reflectance + Red reflectance).</p><p>The result panel carries NDVI, EVI approximation, Estimated fractional cover and Surface class (0 water … 6 very dense), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Near-infrared reflectance</strong> — a plain number, no unit. 0 to 1</li><li><strong>Red reflectance</strong> — a plain number, no unit. 0 to 1</li></ul><p>What you get back is NDVI, EVI approximation, Estimated fractional cover in %, Surface class (0 water … 6 very dense), shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Near-infrared reflectance = 0.42 and Red reflectance = 0.08; the answers are &lt;strong&gt;NDVI&lt;/strong&gt; = 0.68, &lt;strong&gt;EVI approximation&lt;/strong&gt; = 0.4474, &lt;strong&gt;Estimated fractional cover&lt;/strong&gt; = 79.34 % and &lt;strong&gt;Surface class (0 water … 6 very dense)&lt;/strong&gt; = 5.</p><ul><li><strong>NDVI</strong> = 0.68</li><li><strong>EVI approximation</strong> = 0.4474</li><li><strong>Estimated fractional cover</strong> = 79.34 %</li><li><strong>Surface class (0 water … 6 very dense)</strong> = 5</li></ul><p>The line behind those figures is <strong>NDVI</strong> = <code>(Near-infrared reflectance − Red reflectance) ÷ (Near-infrared reflectance + Red reflectance)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;NDVI&lt;/strong&gt; = 0.68, &lt;strong&gt;EVI approximation&lt;/strong&gt; = 0.4474, &lt;strong&gt;Estimated fractional cover&lt;/strong&gt; = 79.34 and &lt;strong&gt;Surface class (0 water … 6 very dense)&lt;/strong&gt; = 5. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as NDVI is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>NDVI</strong> = <code>(Near-infrared reflectance − Red reflectance) ÷ (Near-infrared reflectance + Red reflectance)</code></li><li><strong>EVI approximation</strong> = <code>2.5 × (Near-infrared reflectance − Red reflectance) ÷ (Near-infrared reflectance + 6 × Red reflectance + 1)</code></li><li><strong>Estimated fractional cover</strong> = <code>(max(0,(Near-infrared reflectance − Red reflectance) ÷ (Near-infrared reflectance + Red reflectance)))^(0.6) × 100</code></li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of NDVI, EVI approximation and Estimated fractional cover can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Near-infrared reflectance, from 0.42 to 0.84 — and the answers go from &lt;strong&gt;NDVI&lt;/strong&gt; 0.68, &lt;strong&gt;EVI approximation&lt;/strong&gt; 0.4474, &lt;strong&gt;Estimated fractional cover&lt;/strong&gt; 79.34 % and &lt;strong&gt;Surface class (0 water … 6 very dense)&lt;/strong&gt; 5 to &lt;strong&gt;NDVI&lt;/strong&gt; 0.8261, &lt;strong&gt;EVI approximation&lt;/strong&gt; 0.819, &lt;strong&gt;Estimated fractional cover&lt;/strong&gt; 89.17 % and &lt;strong&gt;Surface class (0 water … 6 very dense)&lt;/strong&gt; 6.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> NDVI, EVI approximation and Estimated fractional cover are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Near-infrared reflectance to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Near-infrared reflectance and Red reflectance measured, NDVI and EVI approximation wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/tajimas-d">Tajima&#039;s D Calculator</a>, <a href="/biology/tff-membrane-area">TFF Membrane Area and Flux Calculator</a> and <a href="/biology/thousand-seed-weight">Thousand Seed Weight Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the NDVI Calculator (Normalised Difference Vegetation Index) calculator work out?', 'a' => <<<'TXT'
            NDVI, EVI approximation, Estimated fractional cover and Surface class (0 water … 6 very dense), from Near-infrared reflectance and Red reflectance. The relationship is NDVI = (Near-infrared reflectance − Red reflectance) ÷ (Near-infrared reflectance + Red reflectance).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Near-infrared reflectance, Red reflectance. With nir and red in place, NDVI can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. NDVI, EVI approximation, Estimated fractional cover and Surface class (0 water … 6 very dense) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            NDVI = 0.68, EVI approximation = 0.4474, Estimated fractional cover = 79.34 % and Surface class (0 water … 6 very dense) = 5. Those are the defaults written into the form — move Near-infrared reflectance and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of NDVI is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Near-infrared reflectance left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. NDVI keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/tajimas-d', 'name' => 'Tajima\'s D Calculator'],
            ['path' => '/biology/tff-membrane-area', 'name' => 'TFF Membrane Area and Flux Calculator'],
            ['path' => '/biology/thousand-seed-weight', 'name' => 'Thousand Seed Weight Calculator'],
        ],
        'authors' => [],
    ],
];
