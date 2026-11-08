<?php

/**
 * Farm Pond Fish Stocking Calculator
 * /biology/farm-pond-fish-stocking
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Farm Pond Fish Stocking Calculator',
    'meta' => ['title' => 'Farm Pond Fish Stocking Calculator: Units & Formula', 'description' => 'Farm Pond Fish Stocking Calculator turns pond surface area, stocking rate and predator share into total fish to stock and predators. Every figure is computed.', 'h1' => 'Farm Pond Fish Stocking Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Pond surface area',
                            'type' => 'number',
                            'suffix' => 'hectares',
                            'help' => '1 acre = 0.405 ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.4',
                        ],
                        [
                            'name' => 'rate',
                            'label' => 'Stocking rate',
                            'type' => 'number',
                            'suffix' => 'fish/ha',
                            'help' => 'Typical fertilised pond: 2,500–5,000/ha',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2500',
                        ],
                        [
                            'name' => 'predator',
                            'label' => 'Predator share',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Bass or equivalent, typically 10–25%',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'pests',
                            'label' => 'Presence of wild fish (1 = yes, 0 = no)',
                            'type' => 'number',
                            'help' => 'Stock heavier if wild fish are present',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total fish to stock',
                            'type' => 'number',
                            'suffix' => 'fish',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'predators',
                            'label' => 'Predators',
                            'type' => 'number',
                            'suffix' => 'fish',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'forage',
                            'label' => 'Forage fish',
                            'type' => 'number',
                            'suffix' => 'fish',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_ha',
                            'label' => 'Fish per hectare',
                            'type' => 'number',
                            'suffix' => 'fish/ha',
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
            'title' => 'Stocking',
            'results' => [
                'total' => 'area*rate*(1+0.1*pests)',
                'predators' => 'area*rate*(1+0.1*pests)*predator/100',
                'forage' => 'area*rate*(1+0.1*pests)*(1-predator/100)',
                'per_ha' => 'total/area',
                'area' => 'total/(rate*(1+0.1*pests))',
                'rate' => 'total/(area*(1+0.1*pests))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Farm Pond Fish Stocking turns Pond surface area, Stocking rate and Predator share into Total fish to stock and Predators. The arithmetic is the whole method: total fish to stock is worked out from pond surface area by one formula, applied once. Total fish to stock comes back in fish unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Farm Pond Fish Stocking calculator works', 'html' => <<<'TXT'
            <p>The Farm Pond Fish Stocking calculator applies one relationship to 4 numbers and reports Total fish to stock, Predators and Forage fish.</p><p>The relationship it solves reads Total fish to stock = Pond surface area × Stocking rate × (1 + 0.1 × Presence of wild fish (1 = yes, 0 = no)).</p><p>The result panel carries Total fish to stock, Predators, Forage fish and Fish per hectare, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Pond surface area</strong> — in hectares. 1 acre = 0.405 ha</li><li><strong>Stocking rate</strong> — in fish/ha. Typical fertilised pond: 2,500–5,000/ha</li><li><strong>Predator share</strong> — in %. Bass or equivalent, typically 10–25%</li><li><strong>Presence of wild fish (1 = yes, 0 = no)</strong> — a plain number, no unit. Stock heavier if wild fish are present</li></ul><p>The result boxes are Total fish to stock in fish, Predators in fish, Forage fish in fish, Fish per hectare in fish/ha; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>None of the boxes on this page carries a unit chip: Total fish to stock takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total fish to stock</strong> = <code>Pond surface area × Stocking rate × (1 + 0.1 × Presence of wild fish (1 = yes, 0 = no))</code></li><li><strong>Predators</strong> = <code>Pond surface area × Stocking rate × (1 + 0.1 × Presence of wild fish (1 = yes, 0 = no)) × Predator share ÷ 100</code></li><li><strong>Forage fish</strong> = <code>Pond surface area × Stocking rate × (1 + 0.1 × Presence of wild fish (1 = yes, 0 = no)) × (1 − Predator share ÷ 100)</code></li><li><strong>Fish per hectare</strong> = <code>Total fish to stock ÷ Pond surface area</code></li><li><strong>Pond surface area</strong> = <code>Total fish to stock ÷ (Stocking rate × (1 + 0.1 × Presence of wild fish (1 = yes, 0 = no)))</code></li><li><strong>Stocking rate</strong> = <code>Total fish to stock ÷ (Pond surface area × (1 + 0.1 × Presence of wild fish (1 = yes, 0 = no)))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total fish to stock</strong> = <code>Pond surface area × Stocking rate × (1 + 0.1 × Presence of wild fish (1 = yes, 0 = no))</code> — the form to use when Pond surface area, Stocking rate and Presence of wild fish (1 = yes, 0 = no) are the values you have.</li><li><strong>Predators</strong> = <code>Pond surface area × Stocking rate × (1 + 0.1 × Presence of wild fish (1 = yes, 0 = no)) × Predator share ÷ 100</code> — the form to use when Pond surface area, Stocking rate, Presence of wild fish (1 = yes, 0 = no) and Predator share are the values you have.</li><li><strong>Forage fish</strong> = <code>Pond surface area × Stocking rate × (1 + 0.1 × Presence of wild fish (1 = yes, 0 = no)) × (1 − Predator share ÷ 100)</code> — the form to use when Pond surface area, Stocking rate, Presence of wild fish (1 = yes, 0 = no) and Predator share are the values you have.</li><li><strong>Fish per hectare</strong> = <code>Total fish to stock ÷ Pond surface area</code> — the form to use when Total fish to stock and Pond surface area are the values you have.</li><li><strong>Pond surface area</strong> = <code>Total fish to stock ÷ (Stocking rate × (1 + 0.1 × Presence of wild fish (1 = yes, 0 = no)))</code> — the form to use when Total fish to stock, Stocking rate and Presence of wild fish (1 = yes, 0 = no) are the values you have.</li><li><strong>Stocking rate</strong> = <code>Total fish to stock ÷ (Pond surface area × (1 + 0.1 × Presence of wild fish (1 = yes, 0 = no)))</code> — the form to use when Total fish to stock, Pond surface area and Presence of wild fish (1 = yes, 0 = no) are the values you have.</li></ul><p>Any one of Total fish to stock, Predators and Forage fish can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box cannot be typed into: the results are worked out from the inputs above, and a past answer has to be entered as one of those inputs instead.</li><li><strong>Pond surface area left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Pond surface area is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Stocking rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Stocking rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Predator share left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Predator share is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Pond surface area to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Farm Pond Fish Stocking form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Pond surface area</strong> is measured in hectares. 1 acre = 0.405 ha. The page reads it when it works out Total fish to stock, Predators and Forage fish. Fill it from a measurement rather than a memory — Pond surface area is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Stocking rate</strong> is measured in fish/ha. Typical fertilised pond: 2,500–5,000/ha. The page reads it when it works out Total fish to stock, Predators and Forage fish. Fill it from a measurement rather than a memory — Stocking rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Predator share</strong> is measured in %. Bass or equivalent, typically 10–25%. The page reads it when it works out Predators and Forage fish. Fill it from a measurement rather than a memory — Predator share is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Presence of wild fish (1 = yes, 0 = no)</strong> takes a plain number with no unit attached. Stock heavier if wild fish are present. The page reads it when it works out Total fish to stock, Predators and Forage fish. Fill it from a measurement rather than a memory — Presence of wild fish (1 = yes, 0 = no) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total fish to stock</strong> is a plain number. It is computed from Pond surface area, Stocking rate and Presence of wild fish (1 = yes, 0 = no), so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Predators</strong> is a plain number. It is computed from Pond surface area, Stocking rate, Presence of wild fish (1 = yes, 0 = no) and Predator share, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Forage fish</strong> is a plain number. It is computed from Pond surface area, Stocking rate, Presence of wild fish (1 = yes, 0 = no) and Predator share, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Fish per hectare</strong> is a plain number. It is computed from Total fish to stock and Pond surface area, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Total fish to stock follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Pond surface area, Stocking rate and Predator share is what you already know and Total fish to stock and Predators is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dry-matter-intake">Dry Matter Intake Calculator</a>, <a href="/biology/dsdna-ug-to-pmol">dsDNA µg to pmol Calculator</a> and <a href="/biology/dsdna-ug-to-pmol-converter">dsDNA µg to pmol Converter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Farm Pond Fish Stocking calculator work out?', 'a' => <<<'TXT'
            Total fish to stock, Predators, Forage fish and Fish per hectare, from Pond surface area, Stocking rate and Presence of wild fish (1 = yes, 0 = no). The relationship is Total fish to stock = Pond surface area × Stocking rate × (1 + 0.1 × Presence of wild fish (1 = yes, 0 = no)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Pond surface area (hectares), Stocking rate (fish/ha), Predator share (%), Presence of wild fish (1 = yes, 0 = no). With pond surface area, stocking rate and predator share in place, Total fish to stock can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total fish to stock, Predators, Forage fish and Fish per hectare blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Total fish to stock is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Pond surface area blank and the page solves for it, reporting Total fish to stock instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Total fish to stock at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/dry-matter-intake', 'name' => 'Dry Matter Intake Calculator'],
            ['path' => '/biology/dsdna-ug-to-pmol', 'name' => 'dsDNA µg to pmol Calculator'],
            ['path' => '/biology/dsdna-ug-to-pmol-converter', 'name' => 'dsDNA µg to pmol Converter Calculator'],
        ],
        'authors' => [],
    ],
];
