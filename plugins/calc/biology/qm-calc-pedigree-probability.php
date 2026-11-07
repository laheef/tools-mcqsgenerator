<?php

/**
 * Pedigree Probability Calculator
 * /biology/pedigree-probability
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pedigree Probability Calculator',
    'meta' => ['title' => 'Pedigree Probability Calculator — Formula & Results', 'description' => 'Pedigree Probability turns Chance the parent is a carrier, Chance the partner is a carrier and Transmission if both are carriers into Chance of an affected…', 'h1' => 'Pedigree Probability Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'carrier_prob',
                            'label' => 'Chance the parent is a carrier',
                            'type' => 'number',
                            'help' => 'From the pedigree',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.667',
                        ],
                        [
                            'name' => 'partner_carrier',
                            'label' => 'Chance the partner is a carrier',
                            'type' => 'number',
                            'help' => 'Population frequency',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.04',
                        ],
                        [
                            'name' => 'transmission',
                            'label' => 'Transmission if both are carriers',
                            'type' => 'number',
                            'help' => '0.25 for a recessive trait',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.25',
                        ],
                        [
                            'name' => 'joint',
                            'label' => 'Chance of an affected child',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'odds',
                            'label' => 'Odds against',
                            'type' => 'number',
                            'suffix' => ':1',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'one_in',
                            'label' => 'Expressed as 1 in',
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
            'title' => 'Probability',
            'results' => ['joint' => 'carrier_prob*partner_carrier*transmission*100', 'odds' => '(1-carrier_prob*partner_carrier*transmission)/(carrier_prob*partner_carrier*transmission)', 'one_in' => '1/(carrier_prob*partner_carrier*transmission)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Pedigree Probability turns Chance the parent is a carrier, Chance the partner is a carrier and Transmission if both are carriers into Chance of an affected child and Odds against. It is a single relationship that reads Chance of an affected child out of Chance the parent is a carrier, not a table of canned results keyed by them. Units for Chance of an affected child default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Pedigree Probability calculator works', 'html' => <<<'TXT'
            <p>The Pedigree Probability calculator applies one relationship to 3 numbers and reports Chance of an affected child, Odds against and Expressed as 1 in.</p><p>The relationship it solves reads Chance of an affected child = Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers × 100.</p><p>The result panel carries Chance of an affected child, Odds against and Expressed as 1 in, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Chance the parent is a carrier</strong> — a plain number, no unit. From the pedigree</li><li><strong>Chance the partner is a carrier</strong> — a plain number, no unit. Population frequency</li><li><strong>Transmission if both are carriers</strong> — a plain number, no unit. 0.25 for a recessive trait</li></ul><p>What you get back is Chance of an affected child in %, Odds against in:1, Expressed as 1 in, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Chance the parent is a carrier = 0.667, Chance the partner is a carrier = 0.04 and Transmission if both are carriers = 0.25; the answers are &lt;strong&gt;Chance of an affected child&lt;/strong&gt; = 0.667 %, &lt;strong&gt;Odds against&lt;/strong&gt; = 149:1 and &lt;strong&gt;Expressed as 1 in&lt;/strong&gt; = 150.</p><ul><li><strong>Chance of an affected child</strong> = 0.667 %</li><li><strong>Odds against</strong> = 149:1</li><li><strong>Expressed as 1 in</strong> = 150</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Chance of an affected child</strong> = <code>Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers × 100</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Chance of an affected child&lt;/strong&gt; = 0.667, &lt;strong&gt;Odds against&lt;/strong&gt; = 149 and &lt;strong&gt;Expressed as 1 in&lt;/strong&gt; = 150 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Chance of an affected child takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Chance of an affected child</strong> = <code>Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers × 100</code></li><li><strong>Odds against</strong> = <code>(1 − Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers) ÷ (Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers)</code></li><li><strong>Expressed as 1 in</strong> = <code>1 ÷ (Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers)</code></li></ul><p>Any one of Chance of an affected child, Odds against and Expressed as 1 in can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Chance the parent is a carrier from 0.667 to 1.33, leaving every other box alone. The panel moves from &lt;strong&gt;Chance of an affected child&lt;/strong&gt; 0.667 %, &lt;strong&gt;Odds against&lt;/strong&gt; 149:1 and &lt;strong&gt;Expressed as 1 in&lt;/strong&gt; 150 to &lt;strong&gt;Chance of an affected child&lt;/strong&gt; 1.33 %, &lt;strong&gt;Odds against&lt;/strong&gt; 73.96:1 and &lt;strong&gt;Expressed as 1 in&lt;/strong&gt; 74.96.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Chance of an affected child, Odds against and Expressed as 1 in are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Chance the parent is a carrier is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Chance the parent is a carrier, Chance the partner is a carrier and Transmission if both are carriers and the number you are missing is Chance of an affected child and Odds against.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/acid-base-balance">Acid–Base Balance (ABG) Calculator</a>, <a href="/biology/acres-per-hour">Acres per hour Calculator</a> and <a href="/biology/specimen-size-from-image">Actual Specimen Size from Image Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pedigree Probability calculator work out?', 'a' => <<<'TXT'
            Chance of an affected child, Odds against and Expressed as 1 in, from Chance the parent is a carrier, Chance the partner is a carrier and Transmission if both are carriers. The relationship is Chance of an affected child = Chance the parent is a carrier × Chance the partner is a carrier × Transmission if both are carriers × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Chance the parent is a carrier, Chance the partner is a carrier, Transmission if both are carriers. With carrier_prob, partner_carrier and transmission in place, Chance of an affected child can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Chance of an affected child, Odds against and Expressed as 1 in blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Chance of an affected child = 0.667 %, Odds against = 149:1 and Expressed as 1 in = 150. The figures come from Chance the parent is a carrier as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Chance of an affected child is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Chance the parent is a carrier left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Chance of an affected child keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/acid-base-balance', 'name' => 'Acid–Base Balance (ABG) Calculator'],
            ['path' => '/biology/acres-per-hour', 'name' => 'Acres per hour Calculator'],
            ['path' => '/biology/specimen-size-from-image', 'name' => 'Actual Specimen Size from Image Calculator'],
        ],
        'authors' => [],
    ],
];
