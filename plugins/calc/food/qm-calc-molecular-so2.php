<?php

/**
 * Molecular SO2
 * /food/molecular-so2
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Molecular SO2',
    'meta' => ['title' => 'Molecular SO2 Calculator — Formula & Results', 'description' => <<<'TXT'
    Estimate molecular sulfur dioxide from wine pH and free SO₂, or solve for a target value. Check units and follow the recipe or package directions.
    TXT, 'h1' => 'Molecular SO2 Calculator', 'updated' => '2026-07-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FSO2',
                            'label' => 'Free SO₂',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ph',
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
                            'name' => 'molecularSO2',
                            'label' => 'Molecular SO₂',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'desiredSO2',
                            'label' => 'Desired molecular SO₂ ',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'help' => 'The level of SO₂ to provide an antimicrobial protection is usually 0.8-1.5 mg/L for whites and more than 0.6 mg/L for reds.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.8',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'requiredSO2',
                            'label' => 'Required free SO₂',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'help' => 'Amount of free SO₂ to reach the desired molecular SO2.',
                            'rounding' => ['omni', '0.001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'place' => [0, 0],
                    'fields' => [
                        ['type' => 'note', 'text' => 'The current content of molecular SO2 in your wine is {{molecularSO2.value}}&nbsp;mg/L.'],
                        ['type' => 'note', 'text' => 'If you want to reach the level of {{desiredSO2.value}}&nbsp;mg/L of molecular SO2, you need to aim for {{requiredSO2.value}}&nbsp;mg/L of free SO2.'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'molecularSO2=one_way(FSO2/(1+10^(ph-1.81)))',
            'results' => ['molecularSO2' => '(100*FSO2/(pow(10, ph + 19/100) + 100))'],
        ],
        [
            'title' => 'requiredSO2=one_way(desiredSO2 * (1 + 10^(ph-1.81)))',
            'results' => ['requiredSO2' => '((1/100)*desiredSO2*(pow(10, ph + 19/100) + 100))'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Molecular SO2 turns Free SO₂ and Wine pH into Molecular SO₂ and Required free SO₂. It is a single relationship that reads molecular SO₂ out of free SO₂, not a table of canned results keyed by them. Units for Molecular SO₂ default to mg/L and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Molecular SO2 calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Molecular SO2: it takes 2 numbers and reports Molecular SO₂ and Required free SO₂.</p><p>The relationship it solves reads Molecular SO₂ = (100 × Free SO₂ ÷ ((10)^(Wine pH + 19 ÷ 100) + 100)).</p><p>What comes back is Molecular SO₂ and Required free SO₂ — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Free SO₂</strong> — in mg/L</li><li><strong>Wine pH</strong> — a plain number, no unit</li></ul><p>What you get back is Molecular SO₂ in mg/L, Required free SO₂ in mg/L, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Free SO₂ = 3 mg/L, Wine pH = 4 and Desired molecular SO₂ = 0.8 mg/L gives <strong>Molecular SO₂</strong> = 0.0192 mg/L and <strong>Required free SO₂</strong> = 125 mg/L.</p><ul><li><strong>Molecular SO₂</strong> = 0.0192 mg/L</li><li><strong>Required free SO₂</strong> = 125 mg/L</li></ul><p>The line behind those figures is <strong>Molecular SO₂</strong> = <code>(100 × Free SO₂ ÷ ((10)^(Wine pH + 19 ÷ 100) + 100))</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Molecular SO₂</strong> = 0.0192 and <strong>Required free SO₂</strong> = 125 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Molecular SO₂ takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Molecular SO₂</strong> = <code>(100 × Free SO₂ ÷ ((10)^(Wine pH + 19 ÷ 100) + 100))</code></li><li><strong>Required free SO₂</strong> = <code>((1 ÷ 100) × Desired molecular SO₂ × ((10)^(Wine pH + 19 ÷ 100) + 100))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Molecular SO₂</strong> = <code>(100 × Free SO₂ ÷ ((10)^(Wine pH + 19 ÷ 100) + 100))</code> — the form to use when Free SO₂ and Wine pH are the values you have.</li><li><strong>Required free SO₂</strong> = <code>((1 ÷ 100) × Desired molecular SO₂ × ((10)^(Wine pH + 19 ÷ 100) + 100))</code> — the form to use when Desired molecular SO₂ and Wine pH are the values you have.</li></ul><p>Any one of Molecular SO₂ and Required free SO₂ can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Free SO₂ from 3 to 6, leaving every other box alone. The panel moves from <strong>Molecular SO₂</strong> 0.0192 mg/L and <strong>Required free SO₂</strong> 125 mg/L to <strong>Molecular SO₂</strong> 0.0385 mg/L and <strong>Required free SO₂</strong> 125 mg/L.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Molecular SO₂ and Required free SO₂ are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Free SO₂ left as a guess.</strong> If Free SO₂ is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Wine pH left as a guess.</strong> If Wine pH is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Free SO₂ and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Free SO₂</strong> is measured in mg/L. Change it and Molecular SO₂ changes with it. Check the field label and unit before calculating.</li><li><strong>Wine pH</strong> takes a plain number with no unit attached. Change it and Molecular SO₂ and Required free SO₂ changes with it. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Molecular SO₂</strong> is a plain number and the page's own defaults put it at 0.0192. It is computed from Free SO₂ and Wine pH, so it changes the moment any of them does. </li><li><strong>Required free SO₂</strong> is a plain number and the page's own defaults put it at 125. It is computed from Desired molecular SO₂ and Wine pH, so it changes the moment any of them does. </li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p> The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Molecular SO₂</th><th>Required free SO₂</th></tr></thead><tbody><tr><td><strong>Free SO₂</strong> +10%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Wine pH</strong> +10%</td><td>-60.03%</td><td>+150%</td></tr><tr><td><strong>Desired molecular SO₂</strong> +10%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Wine pH sits at the top — a ten per cent error in that box shows up as roughly 150 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. </p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Free SO₂ = 1.5 mg/L, Wine pH = 2 and Desired molecular SO₂ = 0.4 mg/L, the answer is <strong>Molecular SO₂</strong> = 0.5885 mg/L and <strong>Required free SO₂</strong> = 1.02 mg/L.</li><li>With Free SO₂ = 9 mg/L, Wine pH = 4 and Desired molecular SO₂ = 0.8 mg/L, the answer is <strong>Molecular SO₂</strong> = 0.0577 mg/L and <strong>Required free SO₂</strong> = 125 mg/L.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Free SO₂ and Wine pH. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Free SO₂ into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Molecular SO₂ in mg/L with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Molecular SO₂ is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Free SO₂ and Wine pH is what you already know and Molecular SO₂ and Required free SO₂ is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related calculators: <a href="/food/sulfur">Sulfur</a>, <a href="/food/alcohol-by-volume">ABV</a> and <a href="/food/priming-sugar">Priming sugar</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Molecular SO2 is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Free SO₂ and Wine pH beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. </p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Molecular SO2 calculator work out?', 'a' => <<<'TXT'
            Molecular SO₂ and Required free SO₂, from Free SO₂ and Wine pH. The relationship is Molecular SO₂ = (100 × Free SO₂ ÷ ((10)^(Wine pH + 19 ÷ 100) + 100)).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Free SO₂ (mg/L), Wine pH. Fill free SO₂ and wine pH and leave Molecular SO₂ empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Molecular SO₂ and Required free SO₂ blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'Are the Molecular SO2 results exact?', 'a' => 'It follows the selected inputs and displayed relationship, but ingredients and process conditions vary. Check units, measure carefully and follow a tested recipe or relevant brewing guidance.'],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Molecular SO₂ is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Free SO₂ left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Molecular SO₂ keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/food/sulfur', 'name' => 'Sulfur'],
            ['path' => '/food/alcohol-by-volume', 'name' => 'ABV'],
            ['path' => '/food/priming-sugar', 'name' => 'Priming sugar']
        ],
    ],
];
