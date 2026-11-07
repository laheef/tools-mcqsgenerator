<?php

/**
 * Dry Matter Intake Calculator
 * /biology/dry-matter-intake
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dry Matter Intake Calculator',
    'meta' => ['title' => 'Dry Matter Intake Calculator — Formula & Results', 'description' => <<<'TXT'
    Dry Matter Intake works out Dry matter intake and Intake as % of body weight from Body weight, Feed type and Dry matter of the feed. Dry matter intake, Intake…
    TXT, 'h1' => 'Dry Matter Intake Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'weight',
                            'label' => 'Body weight',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'feed',
                            'label' => 'Feed type',
                            'type' => 'select',
                            'options' => ['Pasture / forage' => '1', 'Hay' => '2', 'Silage' => '3', 'Concentrate' => '4'],
                            'default' => 'Hay',
                        ],
                        [
                            'name' => 'dm',
                            'label' => 'Dry matter of the feed',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Hay ~88%, silage ~35%, grain ~88%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '88',
                        ],
                        [
                            'name' => 'asfed',
                            'label' => 'Feed offered',
                            'type' => 'number',
                            'suffix' => 'kg/day',
                            'help' => 'Weight as it comes out of the bag or bale',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '14',
                        ],
                        [
                            'name' => 'intake',
                            'label' => 'Dry matter intake',
                            'type' => 'number',
                            'suffix' => 'kg/day',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pct_bw',
                            'label' => 'Intake as % of body weight',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'target',
                            'label' => 'Target intake',
                            'type' => 'number',
                            'suffix' => 'kg/day',
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
            'title' => 'Intake',
            'results' => ['intake' => 'asfed*dm/100', 'pct_bw' => 'asfed*dm/100/weight*100', 'target' => 'weight*if_else(feed==1, 0.025, if_else(feed==2, 0.022, if_else(feed==3, 0.020, 0.018)))', 'asfed' => 'intake*100/dm'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Dry Matter Intake works out Dry matter intake and Intake as % of body weight from Body weight, Feed type and Dry matter of the feed. It is a single relationship that reads Dry matter intake out of Body weight, not a table of canned results keyed by them. Units for Dry matter intake default to kg/day and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Dry Matter Intake calculator works', 'html' => <<<'TXT'
            <p>Dry Matter Intake answers one question from 4 numbers, and the answer is Dry matter intake, Intake as % of body weight and Target intake.</p><p>In the form&#039;s own words, Dry matter intake = Feed offered × Dry matter of the feed ÷ 100.</p><p>The result panel carries Dry matter intake, Intake as % of body weight and Target intake, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Body weight</strong> — in kg</li><li><strong>Feed type</strong> — a plain number, no unit</li><li><strong>Dry matter of the feed</strong> — in %. Hay ~88%, silage ~35%, grain ~88%</li><li><strong>Feed offered</strong> — in kg/day. Weight as it comes out of the bag or bale</li></ul><p>What you get back is Dry matter intake in kg/day, Intake as % of body weight in %, Target intake in kg/day, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Body weight = 500 kg, Feed type = 2 and Dry matter of the feed = 88 % gives &lt;strong&gt;Target intake&lt;/strong&gt; = 11 kg/day.</p><ul><li><strong>Target intake</strong> = 11 kg/day</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Dry matter intake</strong> = <code>Feed offered × Dry matter of the feed ÷ 100</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Target intake&lt;/strong&gt; = 11. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Dry matter intake is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Dry matter intake</strong> = <code>Feed offered × Dry matter of the feed ÷ 100</code></li><li><strong>Intake as % of body weight</strong> = <code>Feed offered × Dry matter of the feed ÷ 100 ÷ Body weight × 100</code></li><li><strong>Target intake</strong> = <code>Body weight × if_else(Feed type==1, 0.025, if_else(Feed type==2, 0.022, if_else(Feed type==3, 0.020, 0.018)))</code></li><li><strong>Feed offered</strong> = <code>Dry matter intake × 100 ÷ Dry matter of the feed</code></li></ul><p>Any one of Dry matter intake, Intake as % of body weight and Target intake can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Body weight from 500 to 1000, leaving every other box alone. The panel moves from &lt;strong&gt;Target intake&lt;/strong&gt; 11 kg/day to &lt;strong&gt;Target intake&lt;/strong&gt; 22 kg/day.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Dry matter intake, Intake as % of body weight and Target intake are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Body weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Body weight, Feed type and Dry matter of the feed is what you already know and Dry matter intake and Intake as % of body weight is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/reverse-translate">Reverse Translate Calculator</a>, <a href="/biology/sds-page-gel">SDS-PAGE Gel Calculator</a> and <a href="/biology/seeding-rate">Seeding Rate and Plants per Hectare Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dry Matter Intake calculator work out?', 'a' => <<<'TXT'
            Dry matter intake, Intake as % of body weight and Target intake, from Feed offered and Dry matter of the feed. The relationship is Dry matter intake = Feed offered × Dry matter of the feed ÷ 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Body weight (kg), Feed type, Dry matter of the feed (%), Feed offered (kg/day). Fill weight, feed and dm and leave Dry matter intake empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Dry matter intake, Intake as % of body weight, Target intake and Feed offered blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Target intake = 11 kg/day. Those are the defaults written into the form — move Body weight and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Dry matter intake is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Body weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Dry matter intake keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/reverse-translate', 'name' => 'Reverse Translate Calculator'],
            ['path' => '/biology/sds-page-gel', 'name' => 'SDS-PAGE Gel Calculator'],
            ['path' => '/biology/seeding-rate', 'name' => 'Seeding Rate and Plants per Hectare Calculator'],
        ],
        'authors' => [],
    ],
];
