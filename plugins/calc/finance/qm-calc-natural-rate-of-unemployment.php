<?php

/**
 * Natural rate of unemployment
 * /finance/natural-rate-of-unemployment
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Natural rate of unemployment',
    'meta' => ['title' => 'Natural rate of unemployment — Formula & Results', 'description' => 'Enter frictionally unemployed and structurally unemployed and get natural rate of unemployment back. Every box can be solved for, not only the one in the title.', 'h1' => 'Natural rate of unemployment Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'frictionally_unemployed',
                            'label' => 'Frictionally unemployed',
                            'type' => 'number',
                            'help' => 'Total number of individuals temporarily between jobs or entering the workforce.',
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
                            'name' => 'structurally_unemployed',
                            'label' => 'Structurally unemployed',
                            'type' => 'number',
                            'suffix' => 'people',
                            'help' => 'Total number of individuals unemployed due to changes in industries or job skills.',
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
                            'name' => 'labor_force',
                            'label' => 'Total labor force',
                            'type' => 'number',
                            'suffix' => 'people',
                            'help' => 'Total number of people who are working or actively seeking employment.',
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
                            'name' => 'natural_rate_unemployment',
                            'label' => 'Natural rate of unemployment',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'hasValue(structurally_unemployed_rate)', 'text' => 'Frictional unemployment rate = {{frictionally_unemployed_rate.formattedValue}}% Structural unemployment rate = {{structurally_unemployed_rate.formattedValue}}%'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'frictionally_unemployed_rate',
                            'label' => 'Fu rate',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'structurally_unemployed_rate',
                            'label' => 'Su rate',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'natural_rate_unemployment=(frictionally_unemployed+structurally_unemployed)/labor_force',
            'results' => ['labor_force' => '(frictionally_unemployed + structurally_unemployed)/natural_rate_unemployment', 'natural_rate_unemployment' => '(frictionally_unemployed + structurally_unemployed)/labor_force', 'structurally_unemployed' => '-frictionally_unemployed + labor_force*natural_rate_unemployment', 'frictionally_unemployed' => 'labor_force*natural_rate_unemployment - structurally_unemployed'],
        ],
        [
            'title' => 'frictionally_unemployed_rate=frictionally_unemployed/labor_force*100',
            'results' => ['labor_force' => '100*frictionally_unemployed/frictionally_unemployed_rate', 'frictionally_unemployed' => '(1/100)*frictionally_unemployed_rate*labor_force', 'frictionally_unemployed_rate' => '100*frictionally_unemployed/labor_force'],
        ],
        [
            'title' => 'structurally_unemployed_rate=structurally_unemployed/labor_force*100',
            'results' => ['labor_force' => '100*structurally_unemployed/structurally_unemployed_rate', 'structurally_unemployed' => '(1/100)*labor_force*structurally_unemployed_rate', 'structurally_unemployed_rate' => '100*structurally_unemployed/labor_force'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Natural rate of unemployment takes Frictionally unemployed, Structurally unemployed and Total labor force and returns Natural rate of unemployment and Fu rate. The arithmetic is the whole method: natural rate of unemployment is worked out from frictionally unemployed by one formula, applied once. Natural rate of unemployment comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Natural rate of unemployment calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Natural rate of unemployment: it takes 3 numbers and reports Natural rate of unemployment, Fu rate and Su rate.</p><p>Written with the labels from the form, Natural rate of unemployment = (Frictionally unemployed + Structurally unemployed) ÷ Total labor force.</p><p>The answers are Natural rate of unemployment, Fu rate and Su rate; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Frictionally unemployed</strong> — in millions. Total number of individuals temporarily between jobs or entering the workforce.</li><li><strong>Structurally unemployed</strong> — in people. Total number of individuals unemployed due to changes in industries or job skills.</li><li><strong>Total labor force</strong> — in people. Total number of people who are working or actively seeking employment.</li></ul><p>The answers come back as Natural rate of unemployment in percent, Fu rate, Su rate. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Frictionally unemployed = 10 million, Structurally unemployed = 100 people and Total labor force = 1000 people — through the same formula and the panel reports <strong>Natural rate of unemployment</strong> = 0.11 perc, <strong>Fu rate</strong> = 1 and <strong>Su rate</strong> = 10.</p><ul><li><strong>Natural rate of unemployment</strong> = 0.11 perc</li><li><strong>Fu rate</strong> = 1</li><li><strong>Su rate</strong> = 10</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Natural rate of unemployment</strong> = <code>(Frictionally unemployed + Structurally unemployed) ÷ Total labor force</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Natural rate of unemployment</strong> = 0.11, <strong>Fu rate</strong> = 1 and <strong>Su rate</strong> = 10 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Natural rate of unemployment offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Natural rate of unemployment</strong> = <code>(Frictionally unemployed + Structurally unemployed) ÷ Total labor force</code></li><li><strong>Total labor force</strong> = <code>(Frictionally unemployed + Structurally unemployed) ÷ Natural rate of unemployment</code></li><li><strong>Structurally unemployed</strong> = <code>− Frictionally unemployed + Total labor force × Natural rate of unemployment</code></li><li><strong>Frictionally unemployed</strong> = <code>Total labor force × Natural rate of unemployment − Structurally unemployed</code></li><li><strong>Fu rate</strong> = <code>100 × Frictionally unemployed ÷ Total labor force</code></li><li><strong>Su rate</strong> = <code>100 × Structurally unemployed ÷ Total labor force</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Natural rate of unemployment</strong> = <code>(Frictionally unemployed + Structurally unemployed) ÷ Total labor force</code> — the form to use when Frictionally unemployed, Structurally unemployed and Total labor force are the values you have.</li><li><strong>Total labor force</strong> = <code>(Frictionally unemployed + Structurally unemployed) ÷ Natural rate of unemployment</code> — the form to use when Frictionally unemployed, Structurally unemployed and Natural rate of unemployment are the values you have.</li><li><strong>Structurally unemployed</strong> = <code>− Frictionally unemployed + Total labor force × Natural rate of unemployment</code> — the form to use when Frictionally unemployed, Total labor force and Natural rate of unemployment are the values you have.</li><li><strong>Frictionally unemployed</strong> = <code>Total labor force × Natural rate of unemployment − Structurally unemployed</code> — the form to use when Total labor force, Natural rate of unemployment and Structurally unemployed are the values you have.</li><li><strong>Fu rate</strong> = <code>100 × Frictionally unemployed ÷ Total labor force</code> — the form to use when Frictionally unemployed and Total labor force are the values you have.</li><li><strong>Total labor force</strong> = <code>100 × Frictionally unemployed ÷ Fu rate</code> — the form to use when Frictionally unemployed and Fu rate are the values you have.</li><li><strong>Frictionally unemployed</strong> = <code>(1 ÷ 100) × Fu rate × Total labor force</code> — the form to use when Fu rate and Total labor force are the values you have.</li><li><strong>Su rate</strong> = <code>100 × Structurally unemployed ÷ Total labor force</code> — the form to use when Structurally unemployed and Total labor force are the values you have.</li></ul><p>Any one of Natural rate of unemployment, Total labor force and Structurally unemployed can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Frictionally unemployed, from 10 to 20 — and the answers go from <strong>Natural rate of unemployment</strong> 0.11 perc, <strong>Fu rate</strong> 1 and <strong>Su rate</strong> 10 to <strong>Natural rate of unemployment</strong> 0.12 perc, <strong>Fu rate</strong> 2 and <strong>Su rate</strong> 10.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Frictionally unemployed, Structurally unemployed and Total labor force is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Natural rate of unemployment, Fu rate and Su rate are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Frictionally unemployed left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Frictionally unemployed is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Structurally unemployed left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Structurally unemployed is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Frictionally unemployed to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Natural rate of unemployment form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Frictionally unemployed</strong> is a millions quantity: the page opens it in million and converts anything else you pick before the formula runs. Total number of individuals temporarily between jobs or entering the workforce. The page reads it when it works out Total labor force, Natural rate of unemployment and Structurally unemployed. Fill it from a measurement rather than a memory — Frictionally unemployed is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Structurally unemployed</strong> is a millions quantity: the page opens it in people and converts anything else you pick before the formula runs. Total number of individuals unemployed due to changes in industries or job skills. The page reads it when it works out Total labor force, Natural rate of unemployment and Frictionally unemployed. Fill it from a measurement rather than a memory — Structurally unemployed is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total labor force</strong> is a millions quantity: the page opens it in people and converts anything else you pick before the formula runs. Total number of people who are working or actively seeking employment. The page reads it when it works out Natural rate of unemployment, Structurally unemployed and Frictionally unemployed. Fill it from a measurement rather than a memory — Total labor force is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Natural rate of unemployment</strong> is a percent figure and the page's own defaults put it at 0.11 perc. It is computed from Frictionally unemployed, Structurally unemployed and Total labor force, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Fu rate</strong> is a plain number and the page's own defaults put it at 1. It is computed from Frictionally unemployed and Total labor force, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Su rate</strong> is a plain number and the page's own defaults put it at 10. It is computed from Structurally unemployed and Total labor force, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Natural rate of unemployment</th><th>Fu rate</th><th>Su rate</th></tr></thead><tbody><tr><td><strong>Frictionally unemployed</strong> +10%</td><td>+0.91%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Structurally unemployed</strong> +10%</td><td>+9.09%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Total labor force</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Structurally unemployed sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Natural rate of unemployment actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>millions</strong> — opens in <em>million</em>, and the chip also carries million and thousand. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Natural rate of unemployment follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover percent and millions. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Frictionally unemployed, Structurally unemployed and Total labor force and the number you are missing is Natural rate of unemployment and Fu rate.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/labor-cost">Labor cost Calculator</a>, <a href="/finance/labor-force-participation-rate">Labor force participation rate Calculator</a> and <a href="/finance/land-loan-payment">Land loan</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Natural rate of unemployment calculator work out?', 'a' => <<<'TXT'
            Natural rate of unemployment, Fu rate and Su rate, from Frictionally unemployed, Structurally unemployed and Total labor force. The relationship is Natural rate of unemployment = (Frictionally unemployed + Structurally unemployed) ÷ Total labor force.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Frictionally unemployed (millions), Structurally unemployed (people), Total labor force (people). Enter frictionally unemployed, structurally unemployed and total labor force; Natural rate of unemployment is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Natural rate of unemployment, Total labor force, Structurally unemployed and Frictionally unemployed blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Natural rate of unemployment = 0.11 perc, Fu rate = 1 and Su rate = 10. The figures come from Frictionally unemployed as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Natural rate of unemployment is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            The empty box becomes the unknown: leave Frictionally unemployed blank and the page solves for it, reporting Natural rate of unemployment instead of the usual answer.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Natural rate of unemployment keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/labor-cost', 'name' => 'Labor cost Calculator'],
            ['path' => '/finance/labor-force-participation-rate', 'name' => 'Labor force participation rate Calculator'],
            ['path' => '/finance/land-loan-payment', 'name' => 'Land loan'],
        ],
        'authors' => [],
    ],
];
