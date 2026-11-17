<?php

/**
 * Taxable equivalent yield
 * /finance/taxable-equivalent-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Taxable equivalent yield',
    'meta' => ['title' => 'Taxable equivalent yield Calculator: Free, With Steps', 'description' => 'Enter bond yield and marginal tax rate and get taxable equivalent yield back. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Taxable equivalent yield Calculator', 'updated' => '2024-07-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bond_yield',
                            'label' => 'Bond yield',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'marginal_tax_rate',
                            'label' => 'Marginal tax rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'taxable_equivalent_yield',
                            'label' => 'Taxable equivalent yield',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'taxable_equivalent_yield = bond_yield / (1 - marginal_tax_rate)',
            'results' => ['bond_yield' => 'taxable_equivalent_yield*(1 - marginal_tax_rate)', 'marginal_tax_rate' => '(-bond_yield + taxable_equivalent_yield)/taxable_equivalent_yield', 'taxable_equivalent_yield' => '-bond_yield/(marginal_tax_rate - 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Taxable equivalent yield turns Bond yield and Marginal tax rate into Taxable equivalent yield. Nothing is looked up on this page: taxable equivalent yield is computed from bond yield and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Taxable equivalent yield is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Taxable equivalent yield calculator works', 'html' => <<<'TXT'
            <p>The Taxable equivalent yield calculator applies one relationship to 2 numbers and reports Taxable equivalent yield.</p><p>The relationship it solves reads Taxable equivalent yield = − Bond yield ÷ (Marginal tax rate − 1).</p><p>What comes back is Taxable equivalent yield — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Bond yield</strong> — in percent</li><li><strong>Marginal tax rate</strong> — in percent</li></ul><p>The result box is Taxable equivalent yield in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Bond yield = 10 perc and Marginal tax rate = 100 perc — through the same formula and the panel reports <strong>Taxable equivalent yield</strong> = -0.101 perc.</p><ul><li><strong>Taxable equivalent yield</strong> = -0.101 perc</li></ul><p>That is <strong>Taxable equivalent yield</strong> = <code>− Bond yield ÷ (Marginal tax rate − 1)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Taxable equivalent yield</strong> = -0.101 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Taxable equivalent yield offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Taxable equivalent yield</strong> = <code>− Bond yield ÷ (Marginal tax rate − 1)</code></li><li><strong>Bond yield</strong> = <code>Taxable equivalent yield × (1 − Marginal tax rate)</code></li><li><strong>Marginal tax rate</strong> = <code>( − Bond yield + Taxable equivalent yield) ÷ Taxable equivalent yield</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Taxable equivalent yield</strong> = <code>− Bond yield ÷ (Marginal tax rate − 1)</code> — the form to use when Bond yield and Marginal tax rate are the values you have.</li><li><strong>Bond yield</strong> = <code>Taxable equivalent yield × (1 − Marginal tax rate)</code> — the form to use when Taxable equivalent yield and Marginal tax rate are the values you have.</li><li><strong>Marginal tax rate</strong> = <code>( − Bond yield + Taxable equivalent yield) ÷ Taxable equivalent yield</code> — the form to use when Bond yield and Taxable equivalent yield are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Taxable equivalent yield, Bond yield and Marginal tax rate can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Bond yield, from 10 to 20 — and the answers go from <strong>Taxable equivalent yield</strong> -0.101 perc to <strong>Taxable equivalent yield</strong> -0.202 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Bond yield and Marginal tax rate is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Taxable equivalent yield is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Bond yield left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Bond yield is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Marginal tax rate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Marginal tax rate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Bond yield is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Taxable equivalent yield form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Bond yield</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Marginal tax rate and Taxable equivalent yield. Fill it from a measurement rather than a memory — Bond yield is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Marginal tax rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Bond yield and Taxable equivalent yield. Fill it from a measurement rather than a memory — Marginal tax rate is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Taxable equivalent yield</strong> is a percent figure and the page's own defaults put it at -0.101 perc. The value follows from Bond yield and Marginal tax rate. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Taxable equivalent yield</th></tr></thead><tbody><tr><td><strong>Bond yield</strong> +10%</td><td>-10%</td></tr><tr><td><strong>Marginal tax rate</strong> +10%</td><td>+9.17%</td></tr></tbody></table><p>Ranked by leverage, Bond yield sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Bond yield = 5 perc and Marginal tax rate = 50 perc and the page reports <strong>Taxable equivalent yield</strong> = -0.102 perc.</li><li>Feed in Bond yield = 30 perc and Marginal tax rate = 100 perc and the page reports <strong>Taxable equivalent yield</strong> = -0.303 perc.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Taxable equivalent yield actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Bond yield and Marginal tax rate ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Bond yield — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Taxable equivalent yield in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Taxable equivalent yield follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Bond yield and Marginal tax rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Bond yield and Marginal tax rate is what you already know and Taxable equivalent yield is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/georgia-overtime">Georgia overtime</a>, <a href="/finance/gift-of-equity">Gift of equity Calculator</a> and <a href="/finance/gini-coefficient">Gini coefficient Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Taxable equivalent yield calculator work out?', 'a' => 'Taxable equivalent yield, from Bond yield and Marginal tax rate. The relationship is Taxable equivalent yield = − Bond yield ÷ (Marginal tax rate − 1).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Bond yield (percent), Marginal tax rate (percent). Fill bond yield and marginal tax rate and leave Taxable equivalent yield empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Taxable equivalent yield, Bond yield and Marginal tax rate can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Taxable equivalent yield = -0.101 perc. Those are the defaults written into the form — move Bond yield and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Taxable equivalent yield is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Bond yield blank and the page solves for it, reporting Taxable equivalent yield instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Taxable equivalent yield keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/georgia-overtime', 'name' => 'Georgia overtime'],
            ['path' => '/finance/gift-of-equity', 'name' => 'Gift of equity Calculator'],
            ['path' => '/finance/gini-coefficient', 'name' => 'Gini coefficient Calculator'],
        ],
        'authors' => [],
    ],
];
