<?php

/**
 * Sulfur
 * /food/sulfur
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sulfur',
    'meta' => ['title' => 'Sulfur Calculator — Formula, Units & Example', 'description' => 'Estimate molecular sulfur dioxide from wine pH and free SO₂, or find the free SO₂ needed for a target. Check units and follow the recipe or package directions.', 'h1' => 'Sulfur Calculator', 'updated' => '2026-07-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'winePH',
                            'label' => 'Wine pH',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'freeSO2',
                            'label' => 'Free sulfur dioxide (SO₂)',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'mgpL',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'molecularSulfur',
                            'label' => 'Molecular sulfur in wine',
                            'type' => 'number',
                            'unit' => '21',
                            'unit_default' => 'mgpL',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'molecularSulfur = freeSO2 / (1 + 10^(winePH - 1.8))',
            'results' => ['winePH' => '(log((freeSO2 - molecularSulfur)/molecularSulfur) + (1/5)*log(1000000000))/log(10)', 'freeSO2' => '(1/100)*molecularSulfur*(pow(10, winePH + 1/5) + 100)', 'molecularSulfur' => '100*freeSO2/(pow(10, winePH + 1/5) + 100)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Sulfur turns Wine pH and Free sulfur dioxide (SO₂) into Molecular sulfur in wine. It is a single relationship that reads molecular sulfur in wine out of wine pH, not a table of canned results keyed by them. Units for Molecular sulfur in wine default to milligrams per liter and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Sulfur calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Sulfur: it takes 2 numbers and reports Molecular sulfur in wine.</p><p>The relationship it solves reads Molecular sulfur in wine = 100 × Free sulfur dioxide (SO₂) ÷ ((10)^(Wine pH + 1 ÷ 5) + 100).</p><p>The answers are Molecular sulfur in wine; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Wine pH</strong> — a plain number, no unit</li><li><strong>Free sulfur dioxide (SO₂)</strong> — in milligrams per liter</li></ul><p>The answer comes back as Molecular sulfur in wine in milligrams per liter. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Wine pH = 10 and Free sulfur dioxide (SO₂) = 100 mgpL — through the same formula and the panel reports <strong>Molecular sulfur in wine</strong> = 6.310e-7 mgpL.</p><ul><li><strong>Molecular sulfur in wine</strong> = 6.310e-7 mgpL</li></ul><p>That is <strong>Molecular sulfur in wine</strong> = <code>100 × Free sulfur dioxide (SO₂) ÷ ((10)^(Wine pH + 1 ÷ 5) + 100)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Molecular sulfur in wine</strong> = 6.310e-7 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Molecular sulfur in wine offers 14 units and opens on milligrams per liter, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Molecular sulfur in wine</strong> = <code>100 × Free sulfur dioxide (SO₂) ÷ ((10)^(Wine pH + 1 ÷ 5) + 100)</code></li><li><strong>Wine pH</strong> = <code>(ln((Free sulfur dioxide (SO₂) − Molecular sulfur in wine) ÷ Molecular sulfur in wine) + (1 ÷ 5) × ln(1000000000)) ÷ ln(10)</code></li><li><strong>Free sulfur dioxide (SO₂)</strong> = <code>(1 ÷ 100) × Molecular sulfur in wine × ((10)^(Wine pH + 1 ÷ 5) + 100)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Molecular sulfur in wine</strong> = <code>100 × Free sulfur dioxide (SO₂) ÷ ((10)^(Wine pH + 1 ÷ 5) + 100)</code> — the form to use when Free sulfur dioxide (SO₂) and Wine pH are the values you have.</li><li><strong>Wine pH</strong> = <code>(ln((Free sulfur dioxide (SO₂) − Molecular sulfur in wine) ÷ Molecular sulfur in wine) + (1 ÷ 5) × ln(1000000000)) ÷ ln(10)</code> — the form to use when Free sulfur dioxide (SO₂) and Molecular sulfur in wine are the values you have.</li><li><strong>Free sulfur dioxide (SO₂)</strong> = <code>(1 ÷ 100) × Molecular sulfur in wine × ((10)^(Wine pH + 1 ÷ 5) + 100)</code> — the form to use when Molecular sulfur in wine and Wine pH are the values you have.</li></ul><p>Any one of Molecular sulfur in wine, Wine pH and Free sulfur dioxide (SO₂) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Wine pH from 10 to 20, leaving every other box alone. The panel moves from <strong>Molecular sulfur in wine</strong> 6.310e-7 mgpL to <strong>Molecular sulfur in wine</strong> 6.310e-17 mgpL.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Free sulfur dioxide (SO₂) is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Molecular sulfur in wine is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Wine pH left as a guess.</strong> If Wine pH is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Free sulfur dioxide (SO₂) left as a guess.</strong> If Free sulfur dioxide (SO₂) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> If Wine pH is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Wine pH</strong> takes a plain number with no unit attached. The page reads it when it works out Free sulfur dioxide (SO₂) and Molecular sulfur in wine. Check the field label and unit before calculating.</li><li><strong>Free sulfur dioxide (SO₂)</strong> is a milligrams per liter quantity: the page opens it in mgpL and converts anything else you pick before the formula runs. The page reads it when it works out Wine pH and Molecular sulfur in wine. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Molecular sulfur in wine</strong> is a milligrams per liter figure and the page's own defaults put it at 6.310e-7 mgpL. It is computed from Free sulfur dioxide (SO₂) and Wine pH, so it changes the moment any of them does. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Molecular sulfur in wine</th></tr></thead><tbody><tr><td><strong>Wine pH</strong> +10%</td><td>-90%</td></tr><tr><td><strong>Free sulfur dioxide (SO₂)</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Wine pH sits at the top — a ten per cent error in that box shows up as roughly 90 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Wine pH = 5 and Free sulfur dioxide (SO₂) = 50 mgpL, the answer is <strong>Molecular sulfur in wine</strong> = 0.0315 mgpL.</li><li>With Wine pH = 30 and Free sulfur dioxide (SO₂) = 100 mgpL, the answer is <strong>Molecular sulfur in wine</strong> = 6.310e-27 mgpL.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p> The tables, with the unit each box opens in:</p><ul><li><strong>milligrams per liter</strong> — opens in <em>mgpL</em>, and the chip also carries µg/mL, g/L, mg/L, kg/m³, mg/mL and lb/cu yd. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. </p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Molecular sulfur in wine is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover milligrams per liter. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Wine pH and Free sulfur dioxide (SO₂) measured, Molecular sulfur in wine wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/bbq-grill-size">BBQ grill size Calculator</a>, <a href="/food/bbq-party">BBQ party Calculator</a> and <a href="/food/beer-pong">Beer pong Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sulfur calculator work out?', 'a' => <<<'TXT'
            Molecular sulfur in wine, from Free sulfur dioxide (SO₂) and Wine pH. The relationship is Molecular sulfur in wine = 100 × Free sulfur dioxide (SO₂) ÷ ((10)^(Wine pH + 1 ÷ 5) + 100).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Wine pH, Free sulfur dioxide (SO₂) (milligrams per liter). Fill wine pH and free sulfur dioxide (SO₂) and leave Molecular sulfur in wine empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Molecular sulfur in wine, Wine pH and Free sulfur dioxide (SO₂) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'Are the Sulfur results exact?', 'a' => 'It follows the selected inputs and displayed relationship, but ingredients and process conditions vary. Check units, measure carefully and follow a tested recipe or relevant brewing guidance.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Molecular sulfur in wine is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Wine pH left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Molecular sulfur in wine keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/food/molecular-so2', 'name' => 'Molecular SO2'],
            ['path' => '/food/alcohol-by-volume', 'name' => 'ABV'],
            ['path' => '/food/priming-sugar', 'name' => 'Priming sugar']
        ],
    ],
];
