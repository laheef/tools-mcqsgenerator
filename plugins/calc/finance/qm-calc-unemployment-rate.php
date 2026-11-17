<?php

/**
 * Unemployment rate
 * /finance/unemployment-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Unemployment rate',
    'meta' => ['title' => 'Unemployment rate: Formula, Steps & Results', 'description' => 'Unemployment rate turns employed people, unemployed people and adult population into labor force and labor force participation. A worked example follows.', 'h1' => 'Unemployment rate Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Employed',
                            'label' => 'Employed people',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'thousand',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Unemployed',
                            'label' => 'Unemployed people',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'thousand',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Labor_force',
                            'label' => 'Labor force',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'thousand',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Unemployment_rate',
                            'label' => 'Unemployment rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Labor force participation',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Adult_population',
                            'label' => 'Adult population',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'thousand',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Labor_force_participation',
                            'label' => 'Labor force participation',
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
            'title' => 'Unemployment_rate = Unemployed / Labor_force',
            'results' => ['Unemployed' => 'Labor_force*Unemployment_rate', 'Unemployment_rate' => 'Unemployed/Labor_force', 'Labor_force' => 'Unemployed/Unemployment_rate'],
        ],
        [
            'title' => 'Labor_force = Employed + Unemployed',
            'results' => ['Unemployed' => '-Employed + Labor_force', 'Employed' => 'Labor_force - Unemployed', 'Labor_force' => 'Employed + Unemployed'],
        ],
        [
            'title' => 'Labor_force_participation = Labor_force / Adult_population',
            'results' => ['Labor_force_participation' => 'Labor_force/Adult_population', 'Adult_population' => 'Labor_force/Labor_force_participation', 'Labor_force' => 'Adult_population*Labor_force_participation'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Unemployment rate works out Employed people and Unemployment rate from Unemployed people and Labor force. The arithmetic is the whole method: employed people is worked out from unemployed people by one formula, applied once. Employed people comes back in thousands unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Unemployment rate calculator works', 'html' => <<<'TXT'
            <p>Unemployment rate answers one question from 2 numbers, and the answer is Employed people, Unemployment rate and Adult population.</p><p>The relationship it solves reads Unemployment rate = Unemployed people ÷ Labor force.</p><p>What comes back is Employed people, Unemployment rate, Adult population and Labor force participation — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Unemployed people</strong> — in thousands</li><li><strong>Labor force</strong> — in thousands</li></ul><p>What you get back is Employed people in thousands, Unemployment rate in percent, Adult population in thousands, Labor force participation in percent, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Employed people = 10 thousand, Unemployed people = 100 thousand, Labor force = 1000 thousand, Adult population = 10 thousand and Labor force participation = 100 perc — through the same formula and the panel reports <strong>Unemployment rate</strong> = 0.1 perc.</p><ul><li><strong>Unemployment rate</strong> = 0.1 perc</li></ul><p>The line behind those figures is <strong>Unemployment rate</strong> = <code>Unemployed people ÷ Labor force</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Unemployment rate</strong> = 0.1. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Employed people lists 4 options and opens on thousands. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Unemployment rate</strong> = <code>Unemployed people ÷ Labor force</code></li><li><strong>Unemployed people</strong> = <code>Labor force × Unemployment rate</code></li><li><strong>Labor force</strong> = <code>Unemployed people ÷ Unemployment rate</code></li><li><strong>Employed people</strong> = <code>Labor force − Unemployed people</code></li><li><strong>Labor force participation</strong> = <code>Labor force ÷ Adult population</code></li><li><strong>Adult population</strong> = <code>Labor force ÷ Labor force participation</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Unemployment rate</strong> = <code>Unemployed people ÷ Labor force</code> — the form to use when Unemployed people and Labor force are the values you have.</li><li><strong>Unemployed people</strong> = <code>Labor force × Unemployment rate</code> — the form to use when Labor force and Unemployment rate are the values you have.</li><li><strong>Labor force</strong> = <code>Unemployed people ÷ Unemployment rate</code> — the form to use when Unemployed people and Unemployment rate are the values you have.</li><li><strong>Labor force</strong> = <code>Employed people + Unemployed people</code> — the form to use when Employed people and Unemployed people are the values you have.</li><li><strong>Unemployed people</strong> = <code>− Employed people + Labor force</code> — the form to use when Employed people and Labor force are the values you have.</li><li><strong>Employed people</strong> = <code>Labor force − Unemployed people</code> — the form to use when Labor force and Unemployed people are the values you have.</li><li><strong>Labor force participation</strong> = <code>Labor force ÷ Adult population</code> — the form to use when Labor force and Adult population are the values you have.</li><li><strong>Adult population</strong> = <code>Labor force ÷ Labor force participation</code> — the form to use when Labor force and Labor force participation are the values you have.</li></ul><p>Any one of Unemployment rate, Unemployed people and Labor force can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Employed people, from 10 to 20 — and the answers go from <strong>Unemployment rate</strong> 0.1 perc to <strong>Unemployment rate</strong> 0.1 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Unemployed people and Labor force carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Employed people, Unemployment rate and Adult population are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Unemployed people left as a guess.</strong> Anything typed into Unemployed people is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Labor force left as a guess.</strong> Anything typed into Labor force is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Unemployed people is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Unemployed people</strong> is a thousands quantity: the page opens it in thousand and converts anything else you pick before the formula runs. The page reads it when it works out Unemployment rate, Labor force and Employed people. Have it to hand before you start: Unemployed people is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Labor force</strong> is a thousands quantity: the page opens it in thousand and converts anything else you pick before the formula runs. The page reads it when it works out Unemployed people, Unemployment rate and Employed people. Have it to hand before you start: Labor force is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Employed people</strong> is a thousands figure. It is worked out from Labor force and Unemployed people. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Unemployment rate</strong> is a percent figure and the page's own defaults put it at 0.1 perc. It is worked out from Unemployed people and Labor force. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Adult population</strong> is a thousands figure. It is worked out from Labor force and Labor force participation. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Labor force participation</strong> is a percent figure. It is worked out from Labor force and Adult population. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Unemployment rate</th></tr></thead><tbody><tr><td><strong>Employed people</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Unemployed people</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Labor force</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Adult population</strong> +10%</td><td>+0%</td></tr><tr><td><strong>Labor force participation</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Unemployed people: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. By contrast, Employed people, Adult population and Labor force participation barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Employed people = 5 thousand, Unemployed people = 50 thousand, Labor force = 500 thousand, Adult population = 5 thousand and Labor force participation = 50 perc, the answer is <strong>Unemployment rate</strong> = 0.1 perc.</li><li>With Employed people = 30 thousand, Unemployed people = 100 thousand, Labor force = 1000 thousand, Adult population = 10 thousand and Labor force participation = 100 perc, the answer is <strong>Unemployment rate</strong> = 0.1 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>thousands</strong> — opens in <em>thousand</em>, and the chip also carries million, thousand and hundred. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Employed people is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are thousands and percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Unemployed people and Labor force are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Unemployed people and Labor force measured, Employed people and Unemployment rate wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/yield-to-call">Yield to call Calculator</a>, <a href="/finance/yield-to-maturity">Yield to maturity</a> and <a href="/finance/youtube-money">YouTube money Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Unemployment rate calculator work out?', 'a' => <<<'TXT'
            Employed people, Unemployment rate, Adult population and Labor force participation, from Unemployed people and Labor force. The relationship is Unemployment rate = Unemployed people ÷ Labor force.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Unemployed people (thousands), Labor force (thousands). Enter unemployed people and labor force; Employed people is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Unemployment rate, Unemployed people, Labor force and Employed people blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Unemployment rate = 0.1 perc. The figures come from Unemployed people as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Employed people is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Unemployed people left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Employed people keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/yield-to-call', 'name' => 'Yield to call Calculator'],
            ['path' => '/finance/yield-to-maturity', 'name' => 'Yield to maturity'],
            ['path' => '/finance/youtube-money', 'name' => 'YouTube money Calculator'],
        ],
        'authors' => [],
    ],
];
