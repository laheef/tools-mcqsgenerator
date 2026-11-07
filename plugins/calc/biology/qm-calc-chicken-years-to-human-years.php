<?php

/**
 * Chicken Years to Human Years Calculator
 * /biology/chicken-years-to-human-years
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Chicken Years to Human Years Calculator',
    'meta' => ['title' => 'Chicken Years to Human Years Calculator — Biology', 'description' => 'Chicken Years to Human Years Calculator works out human-equivalent age. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Chicken Years to Human Years Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'years',
                            'label' => 'Chicken age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'Use 0.5 for six months',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'human',
                            'label' => 'Human-equivalent age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'lifespan',
                            'label' => 'Share of a 10-year lifespan',
                            'type' => 'number',
                            'suffix' => '%',
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
            'title' => 'Conversion',
            'results' => ['human' => 'years*5.33', 'lifespan' => 'years/10*100', 'years' => 'human/5.33'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Chicken Years to Human Years turns Chicken age into Human-equivalent age and Share of a 10-year lifespan. It is a single relationship that reads human-equivalent age out of chicken age, not a table of canned results keyed by them. Units for Human-equivalent age default to years and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Chicken Years to Human Years calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Chicken Years to Human Years: it takes 1 number and reports Human-equivalent age and Share of a 10-year lifespan.</p><p>The relationship it solves reads Human-equivalent age = Chicken age × 5.33.</p><p>The result panel carries Human-equivalent age and Share of a 10-year lifespan, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Chicken age</strong> — in years. Use 0.5 for six months</li></ul><p>The answers come back as Human-equivalent age in years, Share of a 10-year lifespan in %. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Chicken age = 2 years gives <strong>Human-equivalent age</strong> = 10.66 years and <strong>Share of a 10-year lifespan</strong> = 20 %.</p><ul><li><strong>Human-equivalent age</strong> = 10.66 years</li><li><strong>Share of a 10-year lifespan</strong> = 20 %</li></ul><p>The line behind those figures is <strong>Human-equivalent age</strong> = <code>Chicken age × 5.33</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Human-equivalent age</strong> = 10.66 and <strong>Share of a 10-year lifespan</strong> = 20 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Human-equivalent age takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Human-equivalent age</strong> = <code>Chicken age × 5.33</code></li><li><strong>Share of a 10-year lifespan</strong> = <code>Chicken age ÷ 10 × 100</code></li><li><strong>Chicken age</strong> = <code>Human-equivalent age ÷ 5.33</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Human-equivalent age</strong> = <code>Chicken age × 5.33</code> — the form to use when Chicken age are the values you have.</li><li><strong>Share of a 10-year lifespan</strong> = <code>Chicken age ÷ 10 × 100</code> — the form to use when Chicken age are the values you have.</li><li><strong>Chicken age</strong> = <code>Human-equivalent age ÷ 5.33</code> — the form to use when Human-equivalent age are the values you have.</li></ul><p>Any one of Human-equivalent age, Share of a 10-year lifespan and Chicken age can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Chicken age from 2 to 4, leaving every other box alone. The panel moves from <strong>Human-equivalent age</strong> 10.66 years and <strong>Share of a 10-year lifespan</strong> 20 % to <strong>Human-equivalent age</strong> 21.32 years and <strong>Share of a 10-year lifespan</strong> 40 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Human-equivalent age and Share of a 10-year lifespan are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Chicken age left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Chicken age is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Chicken age to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Chicken Years to Human Years form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Chicken age</strong> is measured in years. Use 0.5 for six months. Change it and Human-equivalent age and Share of a 10-year lifespan changes with it. Fill it from a measurement rather than a memory — Chicken age is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Human-equivalent age</strong> is a plain number and the page's own defaults put it at 10.66. It is worked out from Chicken age. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Share of a 10-year lifespan</strong> is a plain number and the page's own defaults put it at 20. It is worked out from Chicken age. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Human-equivalent age</th><th>Share of a 10-year lifespan</th></tr></thead><tbody><tr><td><strong>Chicken age</strong> +10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Chicken age sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Chicken age = 1 years and the page reports <strong>Human-equivalent age</strong> = 5.33 years and <strong>Share of a 10-year lifespan</strong> = 10 %.</li><li>Feed in Chicken age = 6 years and the page reports <strong>Human-equivalent age</strong> = 31.98 years and <strong>Share of a 10-year lifespan</strong> = 60 %.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Chicken age ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Chicken age — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Human-equivalent age in years against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Human-equivalent age follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Chicken age and the number you are missing is Human-equivalent age and Share of a 10-year lifespan.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/trypan-blue-cell-viability">Trypan Blue Cell Viability Calculator</a>, <a href="/biology/turtle-tank">Turtle tank Calculator</a> and <a href="/biology/vapor-pressure-deficit">Vapor pressure deficit Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Chicken Years to Human Years is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Chicken Years to Human Years calculator work out?', 'a' => 'Human-equivalent age and Share of a 10-year lifespan, from Chicken age. The relationship is Human-equivalent age = Chicken age × 5.33.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Chicken age (years). With chicken age in place, Human-equivalent age can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Human-equivalent age, Share of a 10-year lifespan and Chicken age blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Human-equivalent age = 10.66 years and Share of a 10-year lifespan = 20 %. That comes from the page's own defaults, entered in Chicken age; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Human-equivalent age is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Chicken age blank and the page solves for it, reporting Human-equivalent age instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Human-equivalent age keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/trypan-blue-cell-viability', 'name' => 'Trypan Blue Cell Viability Calculator'],
            ['path' => '/biology/turtle-tank', 'name' => 'Turtle tank Calculator'],
            ['path' => '/biology/vapor-pressure-deficit', 'name' => 'Vapor pressure deficit Calculator'],
        ],
        'authors' => [],
    ],
];
