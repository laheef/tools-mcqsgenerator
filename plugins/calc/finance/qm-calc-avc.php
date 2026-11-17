<?php

/**
 * Average variable cost
 * /finance/avc
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Average variable cost',
    'meta' => ['title' => 'Average variable cost Calculator: Free, With Steps', 'description' => 'Average variable cost turns variable Costs (VC) and Total Output (Q) into average Variable Cost (AVC). The formula is printed in the form\'s own words.', 'h1' => 'Average variable cost Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'variableCost',
                            'label' => 'Variable Costs (VC)',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            E.g., electricity, labor. These are the costs that change with the quantity of goods manufactured. To get the value, add up the marginal costs over all units produced.
                            TXT,
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'totalOutput',
                            'label' => 'Total Output (Q)',
                            'type' => 'number',
                            'help' => 'The quantity of goods or services produced over a given time period.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'averageVarCost',
                            'label' => 'Average Variable Cost (AVC)',
                            'type' => 'number',
                            'help' => 'Please note that our caluclator works any way - inputting any two variables will give you the third!',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'averageVarCost = variableCost / totalOutput',
            'results' => ['totalOutput' => 'variableCost/averageVarCost', 'variableCost' => 'averageVarCost*totalOutput', 'averageVarCost' => 'variableCost/totalOutput'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Average variable cost takes Variable Costs (VC) and Total Output (Q) and returns Average Variable Cost (AVC). It is a single relationship that reads average Variable Cost (AVC) out of variable Costs (VC), not a table of canned results keyed by them. Units for Average Variable Cost (AVC) default to USD and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Average variable cost calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Average variable cost: it takes 2 numbers and reports Average Variable Cost (AVC).</p><p>In the form&#039;s own words, Average Variable Cost (AVC) = Variable Costs (VC) ÷ Total Output (Q).</p><p>The result panel carries Average Variable Cost (AVC), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Variable Costs (VC)</strong> — in USD. E.g., electricity, labor. These are the costs that change with the quantity of goods manufactured. To get the value, add up the marginal costs over all units produced.</li><li><strong>Total Output (Q)</strong> — a plain number, no unit. The quantity of goods or services produced over a given time period.</li></ul><p>The answer comes back as Average Variable Cost (AVC) in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Variable Costs (VC) = 10 USD and Total Output (Q) = 100; the answers are <strong>Average Variable Cost (AVC)</strong> = 0.1 USD.</p><ul><li><strong>Average Variable Cost (AVC)</strong> = 0.1 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Average Variable Cost (AVC)</strong> = <code>Variable Costs (VC) ÷ Total Output (Q)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Average Variable Cost (AVC)</strong> = 0.1 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Average Variable Cost (AVC) takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Average Variable Cost (AVC)</strong> = <code>Variable Costs (VC) ÷ Total Output (Q)</code></li><li><strong>Total Output (Q)</strong> = <code>Variable Costs (VC) ÷ Average Variable Cost (AVC)</code></li><li><strong>Variable Costs (VC)</strong> = <code>Average Variable Cost (AVC) × Total Output (Q)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Average Variable Cost (AVC)</strong> = <code>Variable Costs (VC) ÷ Total Output (Q)</code> — the form to use when Variable Costs (VC) and Total Output (Q) are the values you have.</li><li><strong>Total Output (Q)</strong> = <code>Variable Costs (VC) ÷ Average Variable Cost (AVC)</code> — the form to use when Variable Costs (VC) and Average Variable Cost (AVC) are the values you have.</li><li><strong>Variable Costs (VC)</strong> = <code>Average Variable Cost (AVC) × Total Output (Q)</code> — the form to use when Average Variable Cost (AVC) and Total Output (Q) are the values you have.</li></ul><p>Any one of Average Variable Cost (AVC), Total Output (Q) and Variable Costs (VC) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Variable Costs (VC) from 10 to 20, leaving every other box alone. The panel moves from <strong>Average Variable Cost (AVC)</strong> 0.1 USD to <strong>Average Variable Cost (AVC)</strong> 0.2 USD.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Average Variable Cost (AVC) is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Variable Costs (VC) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Variable Costs (VC) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total Output (Q) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total Output (Q) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Variable Costs (VC) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Average variable cost form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Variable Costs (VC)</strong> takes a plain number with no unit attached. E.g., electricity, labor. These are the costs that change with the quantity of goods manufactured. To get the value, add up the marginal costs over all units produced. The page reads it when it works out Total Output (Q) and Average Variable Cost (AVC). Fill it from a measurement rather than a memory — Variable Costs (VC) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total Output (Q)</strong> takes a plain number with no unit attached. The quantity of goods or services produced over a given time period. The page reads it when it works out Variable Costs (VC) and Average Variable Cost (AVC). Fill it from a measurement rather than a memory — Total Output (Q) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Average Variable Cost (AVC)</strong> is a plain number and the page's own defaults put it at 0.1. The value follows from Variable Costs (VC) and Total Output (Q). Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Average Variable Cost (AVC)</th></tr></thead><tbody><tr><td><strong>Variable Costs (VC)</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Total Output (Q)</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Variable Costs (VC) sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Variable Costs (VC) = 5 USD and Total Output (Q) = 50 and the page reports <strong>Average Variable Cost (AVC)</strong> = 0.1 USD.</li><li>Feed in Variable Costs (VC) = 30 USD and Total Output (Q) = 100 and the page reports <strong>Average Variable Cost (AVC)</strong> = 0.3 USD.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Variable Costs (VC) and Total Output (Q) ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Variable Costs (VC) — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Average Variable Cost (AVC) in USD against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Average Variable Cost (AVC) follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Variable Costs (VC) and Total Output (Q) are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Variable Costs (VC) and Total Output (Q) is what you already know and Average Variable Cost (AVC) is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/finance/post-office-monthly-income-scheme">Post Office Monthly Income Scheme</a>, <a href="/finance/powerball">Powerball</a> and <a href="/finance/ppf">PPF (India) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Average variable cost calculator work out?', 'a' => <<<'TXT'
            Average Variable Cost (AVC), from Variable Costs (VC) and Total Output (Q). The relationship is Average Variable Cost (AVC) = Variable Costs (VC) ÷ Total Output (Q).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Variable Costs (VC) (USD), Total Output (Q). Enter variable Costs (VC) and total Output (Q); Average Variable Cost (AVC) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Average Variable Cost (AVC), Total Output (Q) and Variable Costs (VC) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Average Variable Cost (AVC) = 0.1 USD. The figures come from Variable Costs (VC) as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Average Variable Cost (AVC) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Variable Costs (VC) blank and the page solves for it, reporting Average Variable Cost (AVC) instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Average Variable Cost (AVC) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/post-office-monthly-income-scheme', 'name' => 'Post Office Monthly Income Scheme'],
            ['path' => '/finance/powerball', 'name' => 'Powerball'],
            ['path' => '/finance/ppf', 'name' => 'PPF (India) Calculator'],
        ],
        'authors' => [],
    ],
];
