<?php

/**
 * Net Primary Productivity Calculator
 * /biology/net-primary-productivity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Net Primary Productivity Calculator',
    'meta' => ['title' => 'Net Primary Productivity Calculator — Biology', 'description' => 'Enter Gross primary production and Plant respiration into Net Primary Productivity and the answer comes back as Net primary productivity and Per hectare.', 'h1' => 'Net Primary Productivity Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'gpp',
                            'label' => 'Gross primary production',
                            'type' => 'number',
                            'suffix' => 'g C/m²/yr',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2200',
                        ],
                        [
                            'name' => 'respiration',
                            'label' => 'Plant respiration',
                            'type' => 'number',
                            'suffix' => 'g C/m²/yr',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '900',
                        ],
                        [
                            'name' => 'npp',
                            'label' => 'Net primary productivity',
                            'type' => 'number',
                            'suffix' => 'g C/m²/yr',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_ha',
                            'label' => 'Per hectare',
                            'type' => 'number',
                            'suffix' => 'kg C/ha/yr',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'biomass',
                            'label' => 'Dry biomass equivalent',
                            'type' => 'number',
                            'suffix' => 'g/m²/yr',
                            'help' => 'About 2.2 g biomass per g C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'energy',
                            'label' => 'Energy equivalent',
                            'type' => 'number',
                            'suffix' => 'MJ/m²/yr',
                            'help' => 'About 39 kJ per g dry biomass',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'nep',
                            'label' => 'Net ecosystem production (less 10% heterotroph)',
                            'type' => 'number',
                            'suffix' => 'g C/m²/yr',
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
            'title' => 'Productivity',
            'results' => [
                'npp' => 'gpp-respiration',
                'per_ha' => '(gpp-respiration)*10',
                'biomass' => '(gpp-respiration)*2.2',
                'energy' => '(gpp-respiration)*2.2*39/1000',
                'nep' => '(gpp-respiration)*0.9',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Gross primary production and Plant respiration into Net Primary Productivity and the answer comes back as Net primary productivity and Per hectare. There is no hidden constant here: change Net primary productivity and Gross primary production moves with it. The main result, Net primary productivity, is reported in g C/m²/yr.
        TXT,
        'sections' => [
            ['title' => 'How the Net Primary Productivity calculator works', 'html' => <<<'TXT'
            <p>The Net Primary Productivity calculator applies one relationship to 2 numbers and reports Net primary productivity, Per hectare and Dry biomass equivalent.</p><p>In the form&#039;s own words, Net primary productivity = Gross primary production − Plant respiration.</p><p>The answers are Net primary productivity, Per hectare, Dry biomass equivalent and Energy equivalent; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Gross primary production</strong> — in g C/m²/yr</li><li><strong>Plant respiration</strong> — in g C/m²/yr</li></ul><p>The result boxes are Net primary productivity in g C/m²/yr, Per hectare in kg C/ha/yr, Dry biomass equivalent in g/m²/yr, Energy equivalent in MJ/m²/yr, Net ecosystem production (less 10% heterotroph) in g C/m²/yr; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Gross primary production = 2200 g C/m²/yr and Plant respiration = 900 g C/m²/yr; the answers are &lt;strong&gt;Net primary productivity&lt;/strong&gt; = 1300 g C/m²/yr, &lt;strong&gt;Per hectare&lt;/strong&gt; = 13000 kg C/ha/yr, &lt;strong&gt;Dry biomass equivalent&lt;/strong&gt; = 2860 g/m²/yr, &lt;strong&gt;Energy equivalent&lt;/strong&gt; = 112 MJ/m²/yr and &lt;strong&gt;Net ecosystem production (less 10% heterotroph)&lt;/strong&gt; = 1170 g C/m²/yr.</p><ul><li><strong>Net primary productivity</strong> = 1300 g C/m²/yr</li><li><strong>Per hectare</strong> = 13000 kg C/ha/yr</li><li><strong>Dry biomass equivalent</strong> = 2860 g/m²/yr</li><li><strong>Energy equivalent</strong> = 112 MJ/m²/yr</li><li><strong>Net ecosystem production (less 10% heterotroph)</strong> = 1170 g C/m²/yr</li></ul><p>The line behind those figures is <strong>Net primary productivity</strong> = <code>Gross primary production − Plant respiration</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Net primary productivity&lt;/strong&gt; = 1300, &lt;strong&gt;Per hectare&lt;/strong&gt; = 13000, &lt;strong&gt;Dry biomass equivalent&lt;/strong&gt; = 2860, &lt;strong&gt;Energy equivalent&lt;/strong&gt; = 112 and &lt;strong&gt;Net ecosystem production (less 10% heterotroph)&lt;/strong&gt; = 1170. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Net primary productivity is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Net primary productivity</strong> = <code>Gross primary production − Plant respiration</code></li><li><strong>Per hectare</strong> = <code>(Gross primary production − Plant respiration) × 10</code></li><li><strong>Dry biomass equivalent</strong> = <code>(Gross primary production − Plant respiration) × 2.2</code></li><li><strong>Energy equivalent</strong> = <code>(Gross primary production − Plant respiration) × 2.2 × 39 ÷ 1000</code></li><li><strong>Net ecosystem production (less 10% heterotroph)</strong> = <code>(Gross primary production − Plant respiration) × 0.9</code></li></ul><p>Any one of Net primary productivity, Per hectare and Dry biomass equivalent can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Gross primary production from 2200 to 4400, leaving every other box alone. The panel moves from &lt;strong&gt;Net primary productivity&lt;/strong&gt; 1300 g C/m²/yr, &lt;strong&gt;Per hectare&lt;/strong&gt; 13000 kg C/ha/yr, &lt;strong&gt;Dry biomass equivalent&lt;/strong&gt; 2860 g/m²/yr, &lt;strong&gt;Energy equivalent&lt;/strong&gt; 112 MJ/m²/yr and &lt;strong&gt;Net ecosystem production (less 10% heterotroph)&lt;/strong&gt; 1170 g C/m²/yr to &lt;strong&gt;Net primary productivity&lt;/strong&gt; 3500 g C/m²/yr, &lt;strong&gt;Per hectare&lt;/strong&gt; 35000 kg C/ha/yr, &lt;strong&gt;Dry biomass equivalent&lt;/strong&gt; 7700 g/m²/yr, &lt;strong&gt;Energy equivalent&lt;/strong&gt; 300 MJ/m²/yr and &lt;strong&gt;Net ecosystem production (less 10% heterotroph)&lt;/strong&gt; 3150 g C/m²/yr.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Net primary productivity, Per hectare and Dry biomass equivalent are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Gross primary production to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Gross primary production and Plant respiration and the number you are missing is Net primary productivity and Per hectare.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/catculator">Catculator</a>, <a href="/biology/cattle-per-acre">Cattle per acre Calculator</a> and <a href="/biology/cell-counting-calculator">Cell Counting Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Net Primary Productivity calculator work out?', 'a' => <<<'TXT'
            Net primary productivity, Per hectare, Dry biomass equivalent and Energy equivalent, from Gross primary production and Plant respiration. The relationship is Net primary productivity = Gross primary production − Plant respiration.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Gross primary production (g C/m²/yr), Plant respiration (g C/m²/yr). With gpp and respiration in place, Net primary productivity can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Net primary productivity, Per hectare, Dry biomass equivalent and Energy equivalent blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Net primary productivity = 1300 g C/m²/yr, Per hectare = 13000 kg C/ha/yr, Dry biomass equivalent = 2860 g/m²/yr, Energy equivalent = 112 MJ/m²/yr and Net ecosystem production (less 10% heterotroph) = 1170 g C/m²/yr. That comes from the page's own defaults, entered in Gross primary production; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Net primary productivity is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Gross primary production left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Net primary productivity keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/catculator', 'name' => 'Catculator'],
            ['path' => '/biology/cattle-per-acre', 'name' => 'Cattle per acre Calculator'],
            ['path' => '/biology/cell-counting-calculator', 'name' => 'Cell Counting Calculator'],
        ],
        'authors' => [],
    ],
];
