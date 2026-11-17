<?php

/**
 * Uncooked to cooked rice
 * /food/uncooked-to-cooked-rice
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Uncooked to cooked rice',
    'meta' => ['title' => 'Uncooked to cooked rice Calculator: Free, With Steps', 'description' => 'Estimate cooked rice from an uncooked amount or solve for the amount you need. Check units and follow the recipe or package directions.', 'h1' => 'Uncooked to cooked rice Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'uncookedRice',
                            'label' => 'Uncooked rice',
                            'type' => 'number',
                            'unit' => '605',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cookedRice',
                            'label' => 'Cooked rice',
                            'type' => 'number',
                            'unit' => '605',
                            'unit_default' => 'g',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'cookedRice = uncookedRice * 3',
            'results' => ['cookedRice' => '3*uncookedRice', 'uncookedRice' => '(1/3)*cookedRice'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Uncooked to cooked rice turns Uncooked rice into Cooked rice. It is a single relationship that reads cooked rice out of uncooked rice, not a table of canned results keyed by them. Units for Cooked rice default to grams and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Uncooked to cooked rice calculator works', 'html' => <<<'TXT'
            <p>The Uncooked to cooked rice calculator applies one relationship to 1 number and reports Cooked rice.</p><p>The relationship it solves reads Cooked rice = 3 × Uncooked rice.</p><p>The answers are Cooked rice; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 1 box, and nothing else.</p><ul><li><strong>Uncooked rice</strong> — in grams</li></ul><p>The answer comes back as Cooked rice in grams. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Uncooked rice = 10 g gives <strong>Cooked rice</strong> = 30 g.</p><ul><li><strong>Cooked rice</strong> = 30 g</li></ul><p>That is <strong>Cooked rice</strong> = <code>3 × Uncooked rice</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Cooked rice</strong> = 30 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Cooked rice offers 3 units and opens on grams, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Cooked rice</strong> = <code>3 × Uncooked rice</code></li><li><strong>Uncooked rice</strong> = <code>(1 ÷ 3) × Cooked rice</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Cooked rice</strong> = <code>3 × Uncooked rice</code> — the form to use when Uncooked rice are the values you have.</li><li><strong>Uncooked rice</strong> = <code>(1 ÷ 3) × Cooked rice</code> — the form to use when Cooked rice are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Cooked rice and Uncooked rice can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Uncooked rice from 10 to 20, leaving every other box alone. The panel moves from <strong>Cooked rice</strong> 30 g to <strong>Cooked rice</strong> 60 g.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Uncooked rice is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cooked rice is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Uncooked rice left as a guess.</strong> If Uncooked rice is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> If Uncooked rice is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Uncooked to cooked rice form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Uncooked rice</strong> is a grams quantity: the page opens it in g and converts anything else you pick before the formula runs. It feeds Cooked rice. Fill it from a measurement rather than a memory — Uncooked rice is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Cooked rice</strong> is a grams figure and the page's own defaults put it at 30 g. It is worked out from Uncooked rice. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Cooked rice</th></tr></thead><tbody><tr><td><strong>Uncooked rice</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Uncooked rice sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Uncooked rice = 5 g and the page reports <strong>Cooked rice</strong> = 15 g.</li><li>Feed in Uncooked rice = 30 g and the page reports <strong>Cooked rice</strong> = 90 g.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Uncooked to cooked rice actually offers.</p><ul><li><strong>grams</strong> — opens in <em>g</em>, and the chip also carries cups and kg. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Uncooked rice ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Uncooked rice — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Cooked rice in g against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Cooked rice follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover grams. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Uncooked rice measured, Cooked rice wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/rice-water-ratio">Rice to water ratio</a>, <a href="/food/dry-to-cooked-pasta">Dry to cooked pasta</a> and <a href="/food/cooking-measurement">Cooking measurement</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Uncooked to cooked rice calculator work out?', 'a' => 'Cooked rice, from Uncooked rice. The relationship is Cooked rice = 3 × Uncooked rice.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Uncooked rice (grams). Fill uncooked rice and leave Cooked rice empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Cooked rice and Uncooked rice can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'Are the Uncooked to cooked rice results exact?', 'a' => 'It uses the values and assumptions represented in the form. Real ingredients and conditions can vary, so check units and follow the recipe, product label or safety instructions that apply.'],
            ['q' => 'How precise is the result?', 'a' => 'Internally Cooked rice is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Uncooked rice blank and the page solves for it, reporting Cooked rice instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Cooked rice keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/food/rice-water-ratio', 'name' => 'Rice to water ratio'],
            ['path' => '/food/dry-to-cooked-pasta', 'name' => 'Dry to cooked pasta'],
            ['path' => '/food/cooking-measurement', 'name' => 'Cooking measurement']
        ],
    ],
];
