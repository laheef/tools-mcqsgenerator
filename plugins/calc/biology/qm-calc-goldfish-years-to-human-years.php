<?php

/**
 * Goldfish Years to Human Years Calculator
 * /biology/goldfish-years-to-human-years
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Goldfish Years to Human Years Calculator',
    'meta' => ['title' => 'Goldfish Years to Human Years Calculator — Biology', 'description' => 'Enter goldfish age and Goldfish Years to Human Years Calculator returns human-equivalent age and share of a 20-year lifespan. It returns human-equivalent age.', 'h1' => 'Goldfish Years to Human Years Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Goldfish age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'Use 0.5 for six months',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
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
                            'label' => 'Share of a 20-year lifespan',
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
            'results' => ['human' => 'if_else(years<=1, years*16.5, 16.5+(years-1)*4)', 'lifespan' => 'years/20*100', 'years' => 'if_else(human<=16.5, human/16.5, 1+(human-16.5)/4)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Goldfish Years to Human Years works out Human-equivalent age and Share of a 20-year lifespan from Goldfish age. It is a single relationship that reads human-equivalent age out of goldfish age, not a table of canned results keyed by them. Units for Human-equivalent age default to years and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Goldfish Years to Human Years calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Goldfish Years to Human Years: it takes 1 number and reports Human-equivalent age and Share of a 20-year lifespan.</p><p>In the form&#039;s own words, Human-equivalent age = if_else(Goldfish age&lt;=1, Goldfish age × 16.5, 16.5 + (Goldfish age − 1) × 4).</p><p>The result panel carries Human-equivalent age and Share of a 20-year lifespan, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Goldfish age</strong> — in years. Use 0.5 for six months</li></ul><p>The answers come back as Human-equivalent age in years, Share of a 20-year lifespan in %. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Goldfish age = 3 years gives <strong>Human-equivalent age</strong> = 24.5 years and <strong>Share of a 20-year lifespan</strong> = 15 %.</p><ul><li><strong>Human-equivalent age</strong> = 24.5 years</li><li><strong>Share of a 20-year lifespan</strong> = 15 %</li></ul><p>That is <strong>Human-equivalent age</strong> = <code>if_else(Goldfish age&lt;=1, Goldfish age × 16.5, 16.5 + (Goldfish age − 1) × 4)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Human-equivalent age</strong> = 24.5 and <strong>Share of a 20-year lifespan</strong> = 15. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Human-equivalent age is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Human-equivalent age</strong> = <code>if_else(Goldfish age&lt;=1, Goldfish age × 16.5, 16.5 + (Goldfish age − 1) × 4)</code></li><li><strong>Share of a 20-year lifespan</strong> = <code>Goldfish age ÷ 20 × 100</code></li><li><strong>Goldfish age</strong> = <code>if_else(Human-equivalent age&lt;=16.5, Human-equivalent age ÷ 16.5, 1 + (Human-equivalent age − 16.5) ÷ 4)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Human-equivalent age</strong> = <code>if_else(Goldfish age&lt;=1, Goldfish age × 16.5, 16.5 + (Goldfish age − 1) × 4)</code> — the form to use when Goldfish age are the values you have.</li><li><strong>Share of a 20-year lifespan</strong> = <code>Goldfish age ÷ 20 × 100</code> — the form to use when Goldfish age are the values you have.</li><li><strong>Goldfish age</strong> = <code>if_else(Human-equivalent age&lt;=16.5, Human-equivalent age ÷ 16.5, 1 + (Human-equivalent age − 16.5) ÷ 4)</code> — the form to use when Human-equivalent age are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Human-equivalent age, Share of a 20-year lifespan and Goldfish age can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Goldfish age from 3 to 6, leaving every other box alone. The panel moves from <strong>Human-equivalent age</strong> 24.5 years and <strong>Share of a 20-year lifespan</strong> 15 % to <strong>Human-equivalent age</strong> 36.5 years and <strong>Share of a 20-year lifespan</strong> 30 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Human-equivalent age and Share of a 20-year lifespan are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Goldfish age left as a guess.</strong> Anything typed into Goldfish age is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Goldfish age is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Goldfish age</strong> is measured in years. Use 0.5 for six months. The page reads it when it works out Human-equivalent age and Share of a 20-year lifespan. Have it to hand before you start: Goldfish age is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Human-equivalent age</strong> is a plain number and the page's own defaults put it at 24.5. The value follows from Goldfish age. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Share of a 20-year lifespan</strong> is a plain number and the page's own defaults put it at 15. The value follows from Goldfish age. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Human-equivalent age</th><th>Share of a 20-year lifespan</th></tr></thead><tbody><tr><td><strong>Goldfish age</strong> +10%</td><td>+4.9%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Goldfish age: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Goldfish age = 1.5 years, the answer is <strong>Human-equivalent age</strong> = 18.5 years and <strong>Share of a 20-year lifespan</strong> = 7.5 %.</li><li>With Goldfish age = 9 years, the answer is <strong>Human-equivalent age</strong> = 48.5 years and <strong>Share of a 20-year lifespan</strong> = 45 %.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Goldfish age. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Goldfish age into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Human-equivalent age in years with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Human-equivalent age is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Goldfish age and the number you are missing is Human-equivalent age and Share of a 20-year lifespan.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/cheng-prusoff-equation">Cheng-Prusoff Equation Calculator</a>, <a href="/biology/chi-square-genetics-test">Chi-Square Test for Genetics Calculator</a> and <a href="/biology/chicken-density">Chicken Density Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Goldfish Years to Human Years calculator work out?', 'a' => <<<'TXT'
            Human-equivalent age and Share of a 20-year lifespan, from Goldfish age. The relationship is Human-equivalent age = if_else(Goldfish age<=1, Goldfish age × 16.5, 16.5 + (Goldfish age − 1) × 4).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Goldfish age (years). Enter goldfish age; Human-equivalent age is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Human-equivalent age, Share of a 20-year lifespan and Goldfish age can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Human-equivalent age = 24.5 years and Share of a 20-year lifespan = 15 %. That comes from the page's own defaults, entered in Goldfish age; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Human-equivalent age is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Goldfish age left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Human-equivalent age keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/cheng-prusoff-equation', 'name' => 'Cheng-Prusoff Equation Calculator'],
            ['path' => '/biology/chi-square-genetics-test', 'name' => 'Chi-Square Test for Genetics Calculator'],
            ['path' => '/biology/chicken-density', 'name' => 'Chicken Density Calculator'],
        ],
        'authors' => [],
    ],
];
