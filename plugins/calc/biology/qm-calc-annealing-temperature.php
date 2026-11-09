<?php

/**
 * Annealing temperature
 * /biology/annealing-temperature
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Annealing temperature',
    'meta' => ['title' => 'Annealing temperature Calculator: Steps & Units', 'description' => 'Enter primer melting temperature and target melting temperature and get Annealing temperature (Tₐ) back. The formula is printed in the form\'s own words.', 'h1' => 'Annealing temperature Calculator', 'updated' => '2026-07-23'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temp_primer',
                            'label' => 'Primer melting temperature',
                            'type' => 'number',
                            'help' => 'Consider the less stable primer.',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temp_product',
                            'label' => 'Target melting temperature',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annealing_temp',
                            'label' => 'Annealing temperature (Tₐ)',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'annealing_temp>65  or annealing_temp < 50', 'text' => 'The annealing temperature is out of the suggested range of 50 to 65 °C.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'annealing_temp=(0.3*temp_primer)+(0.7*temp_product)-14.9',
            'results' => ['temp_product' => '(10/7)*annealing_temp - 3/7*temp_primer + 149/7', 'temp_primer' => '(10/3)*annealing_temp - 7/3*temp_product + 149/3', 'annealing_temp' => '(3/10)*temp_primer + (7/10)*temp_product - 149/10'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Annealing temperature turns Primer melting temperature and Target melting temperature into Annealing temperature (Tₐ). It is a single relationship that reads annealing temperature (Tₐ) out of primer melting temperature, not a table of canned results keyed by them. Units for Annealing temperature (Tₐ) default to Celsius and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Annealing temperature calculator works', 'html' => <<<'TXT'
            <p>The Annealing temperature calculator applies one relationship to 2 numbers and reports Annealing temperature (Tₐ).</p><p>The relationship it solves reads Annealing temperature (Tₐ) = (3 ÷ 10) × Primer melting temperature + (7 ÷ 10) × Target melting temperature − 149 ÷ 10.</p><p>What comes back is Annealing temperature (Tₐ) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Primer melting temperature</strong> — in Celsius. Consider the less stable primer.</li><li><strong>Target melting temperature</strong> — in Celsius</li></ul><p>What you get back is Annealing temperature (Tₐ) in Celsius, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Primer melting temperature = 10 C and Target melting temperature = 100 C gives <strong>Annealing temperature (Tₐ)</strong> = 58.1 C.</p><ul><li><strong>Annealing temperature (Tₐ)</strong> = 58.1 C</li></ul><p>That is <strong>Annealing temperature (Tₐ)</strong> = <code>(3 ÷ 10) × Primer melting temperature + (7 ÷ 10) × Target melting temperature − 149 ÷ 10</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Annealing temperature (Tₐ)</strong> = 58.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Annealing temperature (Tₐ) offers 4 units and opens on Celsius, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Annealing temperature (Tₐ)</strong> = <code>(3 ÷ 10) × Primer melting temperature + (7 ÷ 10) × Target melting temperature − 149 ÷ 10</code></li><li><strong>Target melting temperature</strong> = <code>(10 ÷ 7) × Annealing temperature (Tₐ) − 3 ÷ 7 × Primer melting temperature + 149 ÷ 7</code></li><li><strong>Primer melting temperature</strong> = <code>(10 ÷ 3) × Annealing temperature (Tₐ) − 7 ÷ 3 × Target melting temperature + 149 ÷ 3</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Annealing temperature (Tₐ)</strong> = <code>(3 ÷ 10) × Primer melting temperature + (7 ÷ 10) × Target melting temperature − 149 ÷ 10</code> — the form to use when Primer melting temperature and Target melting temperature are the values you have.</li><li><strong>Target melting temperature</strong> = <code>(10 ÷ 7) × Annealing temperature (Tₐ) − 3 ÷ 7 × Primer melting temperature + 149 ÷ 7</code> — the form to use when Annealing temperature (Tₐ) and Primer melting temperature are the values you have.</li><li><strong>Primer melting temperature</strong> = <code>(10 ÷ 3) × Annealing temperature (Tₐ) − 7 ÷ 3 × Target melting temperature + 149 ÷ 3</code> — the form to use when Annealing temperature (Tₐ) and Target melting temperature are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Annealing temperature (Tₐ), Target melting temperature and Primer melting temperature can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Primer melting temperature from 10 to 20, leaving every other box alone. The panel moves from <strong>Annealing temperature (Tₐ)</strong> 58.1 C to <strong>Annealing temperature (Tₐ)</strong> 61.1 C.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Primer melting temperature and Target melting temperature is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Annealing temperature (Tₐ) is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Primer melting temperature left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Primer melting temperature is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Target melting temperature left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Target melting temperature is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Primer melting temperature to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Primer melting temperature</strong> is a celsius quantity: the page opens it in C and converts anything else you pick before the formula runs. Consider the less stable primer. It feeds Target melting temperature and Annealing temperature (Tₐ). Have it to hand before you start: Primer melting temperature is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Target melting temperature</strong> is a celsius quantity: the page opens it in C and converts anything else you pick before the formula runs. It feeds Primer melting temperature and Annealing temperature (Tₐ). Have it to hand before you start: Target melting temperature is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Annealing temperature (Tₐ)</strong> is a celsius figure and the page's own defaults put it at 58.1 C. It is worked out from Primer melting temperature and Target melting temperature. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Annealing temperature (Tₐ)</th></tr></thead><tbody><tr><td><strong>Primer melting temperature</strong> +10%</td><td>+0.52%</td></tr><tr><td><strong>Target melting temperature</strong> +10%</td><td>+12.05%</td></tr></tbody></table><p>Ranked by leverage, Target melting temperature sits at the top — a ten per cent error in that box shows up as roughly 12 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Primer melting temperature = 5 C and Target melting temperature = 50 C, the answer is <strong>Annealing temperature (Tₐ)</strong> = 21.6 C.</li><li>With Primer melting temperature = 30 C and Target melting temperature = 100 C, the answer is <strong>Annealing temperature (Tₐ)</strong> = 64.1 C.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>Celsius</strong> — opens in <em>C</em>, and the chip also carries °F, K and °R. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Primer melting temperature and Target melting temperature. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Primer melting temperature into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Annealing temperature (Tₐ) in C with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Annealing temperature (Tₐ) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover Celsius. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Primer melting temperature and Target melting temperature and the number you are missing is Annealing temperature (Tₐ).</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Annealing temperature calculator work out?', 'a' => <<<'TXT'
            Annealing temperature (Tₐ), from Primer melting temperature and Target melting temperature. The relationship is Annealing temperature (Tₐ) = (3 ÷ 10) × Primer melting temperature + (7 ÷ 10) × Target melting temperature − 149 ÷ 10.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Primer melting temperature (Celsius), Target melting temperature (Celsius). Fill primer melting temperature and target melting temperature and leave Annealing temperature (Tₐ) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Annealing temperature (Tₐ), Target melting temperature and Primer melting temperature can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Annealing temperature (Tₐ) = 58.1 C. The figures come from Primer melting temperature as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Annealing temperature (Tₐ) is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Primer melting temperature left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Annealing temperature (Tₐ) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/plant-population', 'name' => 'Plant population Calculator'],
            ['path' => '/biology/plants', 'name' => 'Plant spacing Calculator'],
            ['path' => '/biology/plants-per-hectare', 'name' => 'Plants Per Hectare Calculator'],
        ],
        'authors' => [],
    ],
];
