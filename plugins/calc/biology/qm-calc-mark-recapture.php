<?php

/**
 * Mark-Recapture Population Calculator
 * /biology/mark-recapture
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mark-Recapture Population Calculator',
    'meta' => ['title' => 'Mark-Recapture Population Calculator: Steps & Units', 'description' => 'Mark-Recapture Population Calculator turns marked in the first sample and total caught in the second sample into population estimate and chapman estimate.', 'h1' => 'Mark-Recapture Population Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'marked',
                            'label' => 'Marked in the first sample',
                            'type' => 'number',
                            'help' => 'M',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '80',
                        ],
                        [
                            'name' => 'second',
                            'label' => 'Total caught in the second sample',
                            'type' => 'number',
                            'help' => 'C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'recaptured',
                            'label' => 'Of those, already marked',
                            'type' => 'number',
                            'help' => 'R',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'estimate',
                            'label' => 'Population estimate',
                            'type' => 'number',
                            'help' => 'Lincoln–Petersen',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'chapman',
                            'label' => 'Chapman estimate',
                            'type' => 'number',
                            'help' => 'Less biased for small samples',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ci_low',
                            'label' => '95% confidence, lower',
                            'type' => 'number',
                            'help' => 'On the Chapman estimate',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ci_high',
                            'label' => '95% confidence, upper',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'marked_share',
                            'label' => 'Share marked in the second sample',
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
            'title' => 'Estimate',
            'results' => [
                'estimate' => 'marked*second/recaptured',
                'chapman' => '(marked+1)*(second+1)/(recaptured+1)-1',
                'marked_share' => 'recaptured/second*100',
                'ci_low' => '(marked+1)*(second+1)/(recaptured+1)-1-1.96*sqrt((marked+1)*(second+1)*(marked-recaptured)*(second-recaptured)/((recaptured+1)^2*(recaptured+2)))',
                'ci_high' => '(marked+1)*(second+1)/(recaptured+1)-1+1.96*sqrt((marked+1)*(second+1)*(marked-recaptured)*(second-recaptured)/((recaptured+1)^2*(recaptured+2)))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Mark-Recapture Population turns Marked in the first sample, Total caught in the second sample and Of those, already marked into Population estimate and Chapman estimate. There is no hidden constant here: change population estimate and marked in the first sample moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Mark-Recapture Population calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Mark-Recapture Population: it takes 3 numbers and reports Population estimate, Chapman estimate and 95% confidence, lower.</p><p>Written with the labels from the form, Population estimate = Marked in the first sample × Total caught in the second sample ÷ Of those, already marked.</p><p>What comes back is Population estimate, Chapman estimate, 95% confidence, lower and 95% confidence, upper — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Marked in the first sample</strong> — a plain number, no unit. M</li><li><strong>Total caught in the second sample</strong> — a plain number, no unit. C</li><li><strong>Of those, already marked</strong> — a plain number, no unit. R</li></ul><p>The result boxes are Population estimate, Chapman estimate, 95% confidence, lower, 95% confidence, upper, Share marked in the second sample in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Marked in the first sample = 80, Total caught in the second sample = 100 and Of those, already marked = 20; the answers are <strong>Population estimate</strong> = 400, <strong>Chapman estimate</strong> = 389, <strong>Share marked in the second sample</strong> = 20 %, <strong>95% confidence, lower</strong> = 264 and <strong>95% confidence, upper</strong> = 513.</p><ul><li><strong>Population estimate</strong> = 400</li><li><strong>Chapman estimate</strong> = 389</li><li><strong>Share marked in the second sample</strong> = 20 %</li><li><strong>95% confidence, lower</strong> = 264</li><li><strong>95% confidence, upper</strong> = 513</li></ul><p>That is <strong>Population estimate</strong> = <code>Marked in the first sample × Total caught in the second sample ÷ Of those, already marked</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Population estimate</strong> = 400, <strong>Chapman estimate</strong> = 389, <strong>Share marked in the second sample</strong> = 20, <strong>95% confidence, lower</strong> = 264 and <strong>95% confidence, upper</strong> = 513 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Population estimate takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Population estimate</strong> = <code>Marked in the first sample × Total caught in the second sample ÷ Of those, already marked</code></li><li><strong>Chapman estimate</strong> = <code>(Marked in the first sample + 1) × (Total caught in the second sample + 1) ÷ (Of those, already marked + 1) − 1</code></li><li><strong>Share marked in the second sample</strong> = <code>Of those, already marked ÷ Total caught in the second sample × 100</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Population estimate</strong> = <code>Marked in the first sample × Total caught in the second sample ÷ Of those, already marked</code> — the form to use when Marked in the first sample, Total caught in the second sample and Of those, already marked are the values you have.</li><li><strong>Chapman estimate</strong> = <code>(Marked in the first sample + 1) × (Total caught in the second sample + 1) ÷ (Of those, already marked + 1) − 1</code> — the form to use when Marked in the first sample, Total caught in the second sample and Of those, already marked are the values you have.</li><li><strong>Share marked in the second sample</strong> = <code>Of those, already marked ÷ Total caught in the second sample × 100</code> — the form to use when Of those, already marked and Total caught in the second sample are the values you have.</li></ul><p>Any one of Population estimate, Chapman estimate and Share marked in the second sample can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Marked in the first sample from 80 to 160, leaving every other box alone. The panel moves from <strong>Population estimate</strong> 400, <strong>Chapman estimate</strong> 389, <strong>Share marked in the second sample</strong> 20 %, <strong>95% confidence, lower</strong> 264 and <strong>95% confidence, upper</strong> 513 to <strong>Population estimate</strong> 800, <strong>Chapman estimate</strong> 773, <strong>Share marked in the second sample</strong> 20 %, <strong>95% confidence, lower</strong> 505 and <strong>95% confidence, upper</strong> 1042.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box cannot be typed into: the results are worked out from the inputs above, and a past answer has to be entered as one of those inputs instead.</li><li><strong>Marked in the first sample left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Marked in the first sample is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total caught in the second sample left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total caught in the second sample is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Of those, already marked left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Of those, already marked is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Marked in the first sample is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Marked in the first sample</strong> takes a plain number with no unit attached. Change it and Population estimate, Chapman estimate and 95% confidence, lower changes with it. Have it to hand before you start: Marked in the first sample is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Total caught in the second sample</strong> takes a plain number with no unit attached. Change it and Population estimate, Chapman estimate and Share marked in the second sample changes with it. Have it to hand before you start: Total caught in the second sample is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Of those, already marked</strong> takes a plain number with no unit attached. Change it and Population estimate, Chapman estimate and Share marked in the second sample changes with it. Have it to hand before you start: Of those, already marked is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Population estimate</strong> is a plain number and the page's own defaults put it at 400. The value follows from Marked in the first sample, Total caught in the second sample and Of those, already marked. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Chapman estimate</strong> is a plain number and the page's own defaults put it at 389. The value follows from Marked in the first sample, Total caught in the second sample and Of those, already marked. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>95% confidence, lower</strong> is a plain number and the page's own defaults put it at 264. The value follows from Marked in the first sample, Total caught in the second sample and Of those, already marked. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>95% confidence, upper</strong> is a plain number and the page's own defaults put it at 513. The value follows from Marked in the first sample, Total caught in the second sample and Of those, already marked. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Share marked in the second sample</strong> is a plain number and the page's own defaults put it at 20. The value follows from Of those, already marked and Total caught in the second sample. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Population estimate</th><th>Chapman estimate</th><th>Share marked in the second sample</th><th>95% confidence, lower</th><th>95% confidence, upper</th></tr></thead><tbody><tr><td><strong>Marked in the first sample</strong> +10%</td><td>+10%</td><td>+9.9%</td><td>+0%</td><td>+9.1%</td><td>+10.31%</td></tr><tr><td><strong>Total caught in the second sample</strong> +10%</td><td>+10%</td><td>+9.93%</td><td>-9.09%</td><td>+9.33%</td><td>+10.23%</td></tr><tr><td><strong>Of those, already marked</strong> +10%</td><td>-9.09%</td><td>-8.72%</td><td>+10%</td><td>-5.69%</td><td>-10.28%</td></tr></tbody></table><p>Ranked by leverage, Marked in the first sample sits at the top — a ten per cent error in that box shows up as roughly 10.3 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Marked in the first sample = 40, Total caught in the second sample = 50 and Of those, already marked = 10, the answer is <strong>Population estimate</strong> = 200, <strong>Chapman estimate</strong> = 189, <strong>Share marked in the second sample</strong> = 20 %, <strong>95% confidence, lower</strong> = 108 and <strong>95% confidence, upper</strong> = 271.</li><li>With Marked in the first sample = 240, Total caught in the second sample = 100 and Of those, already marked = 20, the answer is <strong>Population estimate</strong> = 1200, <strong>Chapman estimate</strong> = 1158, <strong>Share marked in the second sample</strong> = 20 %, <strong>95% confidence, lower</strong> = 746 and <strong>95% confidence, upper</strong> = 1570.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Population estimate is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Marked in the first sample, Total caught in the second sample and Of those, already marked and the number you are missing is Population estimate and Chapman estimate.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/autosomal-recessive-risk">Autosomal Recessive Inheritance Risk Calculator</a>, <a href="/biology/bacteria-growth">Bacteria growth Calculator</a> and <a href="/biology/bacterial-concentration-calculator">Bacterial Concentration Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mark-Recapture Population calculator work out?', 'a' => <<<'TXT'
            Population estimate, Chapman estimate, 95% confidence, lower and 95% confidence, upper, from Marked in the first sample, Total caught in the second sample and Of those, already marked. The relationship is Population estimate = Marked in the first sample × Total caught in the second sample ÷ Of those, already marked.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Marked in the first sample, Total caught in the second sample, Of those, already marked. Fill marked in the first sample, total caught in the second sample and of those, already marked and leave Population estimate empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Population estimate, Chapman estimate, Share marked in the second sample and 95% confidence, lower blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Population estimate = 400, Chapman estimate = 389, Share marked in the second sample = 20 %, 95% confidence, lower = 264 and 95% confidence, upper = 513. The figures come from Marked in the first sample as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Population estimate is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Marked in the first sample left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Population estimate keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/autosomal-recessive-risk', 'name' => 'Autosomal Recessive Inheritance Risk Calculator'],
            ['path' => '/biology/bacteria-growth', 'name' => 'Bacteria growth Calculator'],
            ['path' => '/biology/bacterial-concentration-calculator', 'name' => 'Bacterial Concentration Calculator'],
        ],
        'authors' => [],
    ],
];
