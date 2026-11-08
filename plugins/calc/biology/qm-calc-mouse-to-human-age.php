<?php

/**
 * Mouse to Human Age Calculator
 * /biology/mouse-to-human-age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mouse to Human Age Calculator',
    'meta' => ['title' => 'Mouse to Human Age Calculator: Steps & Units', 'description' => 'Mouse to Human Age Calculator works out human-equivalent age from mouse age. Press Calculate once and every figure on the page is refreshed together. Free.', 'h1' => 'Mouse to Human Age Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'months',
                            'label' => 'Mouse age',
                            'type' => 'number',
                            'suffix' => 'months',
                            'help' => '3 weeks = 0.7 months; 126 days = 4.1 months',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
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
                            'name' => 'weeks',
                            'label' => 'Mouse age',
                            'type' => 'number',
                            'suffix' => 'weeks',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'lifespan',
                            'label' => 'Share of a 2-year lifespan',
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
            'results' => ['weeks' => 'months*4.345', 'human' => <<<'TXT'
            if_else(months<=2, months*8, if_else(months<=10, 16+(months-2)*2.75, if_else(months<=15, 38+(months-10)*1.8, if_else(months<=18, 47+(months-15)*3, if_else(months<=24, 56+(months-18)*2.167, 69+(months-24)*2.2)))))
            TXT, 'lifespan' => 'months/24*100', 'months' => 'weeks/4.345'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Mouse to Human Age reads one of human-equivalent age and mouse age from the other, so either can be the value you fill in. Human-equivalent age is opened in years; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Mouse to Human Age calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Mouse to Human Age: it takes 1 number and reports Human-equivalent age, Mouse age and Share of a 2-year lifespan.</p><p>Written with the labels from the form, Mouse age = Mouse age × 4.345.</p><p>The answers are Human-equivalent age, Mouse age and Share of a 2-year lifespan; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 1 box and the page has everything it needs.</p><ul><li><strong>Mouse age</strong> — in months. 3 weeks = 0.7 months; 126 days = 4.1 months</li></ul><p>The answers come back as Human-equivalent age in years, Mouse age in weeks, Share of a 2-year lifespan in %. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Mouse age = 4 months; the answers are <strong>Mouse age</strong> = 17.38 weeks, <strong>Human-equivalent age</strong> = 21.5 years and <strong>Share of a 2-year lifespan</strong> = 16.67 %.</p><ul><li><strong>Mouse age</strong> = 17.38 weeks</li><li><strong>Human-equivalent age</strong> = 21.5 years</li><li><strong>Share of a 2-year lifespan</strong> = 16.67 %</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Mouse age</strong> = <code>Mouse age × 4.345</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Mouse age</strong> = 17.38, <strong>Human-equivalent age</strong> = 21.5 and <strong>Share of a 2-year lifespan</strong> = 16.67 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Human-equivalent age takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Mouse age</strong> = <code>Mouse age × 4.345</code></li><li><strong>Share of a 2-year lifespan</strong> = <code>Mouse age ÷ 24 × 100</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Mouse age</strong> = <code>Mouse age × 4.345</code> — the form to use when Mouse age are the values you have.</li><li><strong>Share of a 2-year lifespan</strong> = <code>Mouse age ÷ 24 × 100</code> — the form to use when Mouse age are the values you have.</li><li><strong>Mouse age</strong> = <code>Mouse age ÷ 4.345</code> — the form to use when Mouse age are the values you have.</li></ul><p>Any one of Mouse age, Human-equivalent age and Share of a 2-year lifespan can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Mouse age, from 4 to 8 — and the answers go from <strong>Mouse age</strong> 17.38 weeks, <strong>Human-equivalent age</strong> 21.5 years and <strong>Share of a 2-year lifespan</strong> 16.67 % to <strong>Mouse age</strong> 34.76 weeks, <strong>Human-equivalent age</strong> 32.5 years and <strong>Share of a 2-year lifespan</strong> 33.33 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box cannot be typed into: the results are worked out from the inputs above, and a past answer has to be entered as one of those inputs instead.</li><li><strong>Mouse age left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Mouse age is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Mouse age to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Mouse to Human Age form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Mouse age</strong> is measured in months. 3 weeks = 0.7 months; 126 days = 4.1 months. Change it and Mouse age, Human-equivalent age and Share of a 2-year lifespan changes with it. Fill it from a measurement rather than a memory — Mouse age is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Human-equivalent age</strong> is a plain number and the page's own defaults put it at 21.5. The value follows from Mouse age. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Mouse age</strong> is a plain number and the page's own defaults put it at 17.38. The value follows from Mouse age. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Share of a 2-year lifespan</strong> is a plain number and the page's own defaults put it at 16.67. The value follows from Mouse age. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Mouse age</th><th>Human-equivalent age</th><th>Share of a 2-year lifespan</th></tr></thead><tbody><tr><td><strong>Mouse age</strong> +10%</td><td>+10%</td><td>+5.12%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Mouse age sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Mouse age = 2 months and the page reports <strong>Mouse age</strong> = 8.69 weeks, <strong>Human-equivalent age</strong> = 16 years and <strong>Share of a 2-year lifespan</strong> = 8.33 %.</li><li>Feed in Mouse age = 12 months and the page reports <strong>Mouse age</strong> = 52.14 weeks, <strong>Human-equivalent age</strong> = 41.6 years and <strong>Share of a 2-year lifespan</strong> = 50 %.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Mouse age ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Mouse age — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Human-equivalent age in years against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Human-equivalent age follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Mouse age are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Mouse age is what you already know and Human-equivalent age and Mouse age is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/bacterial-concentration-calculator">Bacterial Concentration Calculator</a>, <a href="/biology/bacterial-growth-curve">Bacterial Growth Curve (generation time) Calculator</a> and <a href="/biology/basal-area">Basal area Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Mouse to Human Age is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mouse to Human Age calculator work out?', 'a' => 'Human-equivalent age, Mouse age and Share of a 2-year lifespan, from Mouse age. The relationship is Mouse age = Mouse age × 4.345.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mouse age (months). Fill mouse age and leave Human-equivalent age empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Mouse age, Human-equivalent age, Share of a 2-year lifespan and Mouse age blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Mouse age = 17.38 weeks, Human-equivalent age = 21.5 years and Share of a 2-year lifespan = 16.67 %. Those are the defaults written into the form — move Mouse age and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Human-equivalent age is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Mouse age blank and the page solves for it, reporting Human-equivalent age instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Human-equivalent age at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/bacterial-concentration-calculator', 'name' => 'Bacterial Concentration Calculator'],
            ['path' => '/biology/bacterial-growth-curve', 'name' => 'Bacterial Growth Curve (generation time) Calculator'],
            ['path' => '/biology/basal-area', 'name' => 'Basal area Calculator'],
        ],
        'authors' => [],
    ],
];
