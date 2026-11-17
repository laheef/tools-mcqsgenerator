<?php

/**
 * GDP per capita
 * /finance/gdp-per-capita
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GDP per capita',
    'meta' => ['title' => 'GDP per capita Calculator: Free, With Steps', 'description' => 'Enter Real GDP and population and get GDP per capita back. The answer is shown in USD. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'GDP per capita Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Real_GDP',
                            'label' => 'Real GDP',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Population',
                            'label' => 'Population',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'GDP_per_capita',
                            'label' => 'GDP per capita',
                            'type' => 'number',
                            'suffix' => 'per capita',
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
            'title' => 'GDP_per_capita = Real_GDP / Population',
            'results' => ['GDP_per_capita' => 'Real_GDP/Population', 'Real_GDP' => 'GDP_per_capita*Population', 'Population' => 'Real_GDP/GDP_per_capita'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        GDP per capita works out GDP per capita from Real GDP and Population. There is no hidden constant here: change GDP per capita and real GDP moves with it. The main result, GDP per capita, is reported in per capita.
        TXT,
        'sections' => [
            ['title' => 'How the GDP per capita calculator works', 'html' => <<<'TXT'
            <p>GDP per capita answers one question from 2 numbers, and the answer is GDP per capita.</p><p>Written with the labels from the form, GDP per capita = Real GDP ÷ Population.</p><p>The answers are GDP per capita; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Real GDP</strong> — in USD</li><li><strong>Population</strong> — in millions</li></ul><p>What you get back is GDP per capita in per capita, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Real GDP = 10 USD and Population = 100 million; the answers are <strong>GDP per capita</strong> = 0.1 per capita.</p><ul><li><strong>GDP per capita</strong> = 0.1 per capita</li></ul><p>That is <strong>GDP per capita</strong> = <code>Real GDP ÷ Population</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>GDP per capita</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Population lists 3 options and opens on millions. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>GDP per capita</strong> = <code>Real GDP ÷ Population</code></li><li><strong>Real GDP</strong> = <code>GDP per capita × Population</code></li><li><strong>Population</strong> = <code>Real GDP ÷ GDP per capita</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>GDP per capita</strong> = <code>Real GDP ÷ Population</code> — the form to use when Real GDP and Population are the values you have.</li><li><strong>Real GDP</strong> = <code>GDP per capita × Population</code> — the form to use when GDP per capita and Population are the values you have.</li><li><strong>Population</strong> = <code>Real GDP ÷ GDP per capita</code> — the form to use when Real GDP and GDP per capita are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of GDP per capita, Real GDP and Population can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Real GDP from 10 to 20, leaving every other box alone. The panel moves from <strong>GDP per capita</strong> 0.1 per capita to <strong>GDP per capita</strong> 0.2 per capita.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Population carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> GDP per capita is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Real GDP left as a guess.</strong> Anything typed into Real GDP is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Population left as a guess.</strong> Anything typed into Population is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Real GDP is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the GDP per capita form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Real GDP</strong> takes a plain number with no unit attached. It feeds GDP per capita and Population. Fill it from a measurement rather than a memory — Real GDP is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Population</strong> is a millions quantity: the page opens it in million and converts anything else you pick before the formula runs. It feeds GDP per capita and Real GDP. Fill it from a measurement rather than a memory — Population is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>GDP per capita</strong> is a plain number and the page's own defaults put it at 0.1. The value follows from Real GDP and Population. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>GDP per capita</th></tr></thead><tbody><tr><td><strong>Real GDP</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Population</strong> +10%</td><td>-9.09%</td></tr></tbody></table><p>The steepest column belongs to Real GDP: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Real GDP = 5 USD and Population = 50 million and the page reports <strong>GDP per capita</strong> = 0.1 per capita.</li><li>Feed in Real GDP = 30 USD and Population = 100 million and the page reports <strong>GDP per capita</strong> = 0.3 per capita.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on GDP per capita actually offers.</p><ul><li><strong>millions</strong> — opens in <em>million</em>, and the chip also carries million and thousand. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Real GDP and Population ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Real GDP — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check GDP per capita in per capita against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind GDP per capita is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are millions and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Real GDP and Population are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Real GDP and Population is what you already know and GDP per capita is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/price-quantity">Price / quantity Calculator</a>, <a href="/finance/price-elasticity-demand">Price elasticity of demand Calculator</a> and <a href="/finance/price-elasticity-supply">Price elasticity of supply Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from GDP per capita is a number to act on, so the useful question is what to do with GDP per capita (per capita) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Real GDP and Population alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the GDP per capita calculator work out?', 'a' => 'GDP per capita, from Real GDP and Population. The relationship is GDP per capita = Real GDP ÷ Population.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Real GDP (USD), Population (millions). Fill real GDP and population and leave GDP per capita empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. GDP per capita, Real GDP and Population can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'GDP per capita = 0.1 per capita. The figures come from Real GDP as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            GDP per capita is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Real GDP blank and the page solves for it, reporting GDP per capita instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. GDP per capita keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/price-quantity', 'name' => 'Price / quantity Calculator'],
            ['path' => '/finance/price-elasticity-demand', 'name' => 'Price elasticity of demand Calculator'],
            ['path' => '/finance/price-elasticity-supply', 'name' => 'Price elasticity of supply Calculator'],
        ],
        'authors' => [],
    ],
];
