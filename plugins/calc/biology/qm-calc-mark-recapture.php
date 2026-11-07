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
    'meta' => ['title' => 'Mark-Recapture Population Calculator — Biology', 'description' => 'Mark-Recapture Population turns Marked in the first sample, Total caught in the second sample and Of those, already marked into Population estimate and…', 'h1' => 'Mark-Recapture Population Calculator', 'updated' => '2026-10-29'],
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
        Mark-Recapture Population turns Marked in the first sample, Total caught in the second sample and Of those, already marked into Population estimate and Chapman estimate. There is no hidden constant here: change Population estimate and Marked in the first sample moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Mark-Recapture Population calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Mark-Recapture Population: it takes 3 numbers and reports Population estimate, Chapman estimate and 95% confidence, lower.</p><p>Written with the labels from the form, Population estimate = Marked in the first sample × Total caught in the second sample ÷ Of those, already marked.</p><p>What comes back is Population estimate, Chapman estimate, 95% confidence, lower and 95% confidence, upper — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Marked in the first sample</strong> — a plain number, no unit. M</li><li><strong>Total caught in the second sample</strong> — a plain number, no unit. C</li><li><strong>Of those, already marked</strong> — a plain number, no unit. R</li></ul><p>The result boxes are Population estimate, Chapman estimate, 95% confidence, lower, 95% confidence, upper, Share marked in the second sample in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Marked in the first sample = 80, Total caught in the second sample = 100 and Of those, already marked = 20; the answers are &lt;strong&gt;Population estimate&lt;/strong&gt; = 400, &lt;strong&gt;Chapman estimate&lt;/strong&gt; = 389, &lt;strong&gt;Share marked in the second sample&lt;/strong&gt; = 20 %, &lt;strong&gt;95% confidence, lower&lt;/strong&gt; = 264 and &lt;strong&gt;95% confidence, upper&lt;/strong&gt; = 513.</p><ul><li><strong>Population estimate</strong> = 400</li><li><strong>Chapman estimate</strong> = 389</li><li><strong>Share marked in the second sample</strong> = 20 %</li><li><strong>95% confidence, lower</strong> = 264</li><li><strong>95% confidence, upper</strong> = 513</li></ul><p>That is <strong>Population estimate</strong> = <code>Marked in the first sample × Total caught in the second sample ÷ Of those, already marked</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Population estimate&lt;/strong&gt; = 400, &lt;strong&gt;Chapman estimate&lt;/strong&gt; = 389, &lt;strong&gt;Share marked in the second sample&lt;/strong&gt; = 20, &lt;strong&gt;95% confidence, lower&lt;/strong&gt; = 264 and &lt;strong&gt;95% confidence, upper&lt;/strong&gt; = 513 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Population estimate takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Population estimate</strong> = <code>Marked in the first sample × Total caught in the second sample ÷ Of those, already marked</code></li><li><strong>Chapman estimate</strong> = <code>(Marked in the first sample + 1) × (Total caught in the second sample + 1) ÷ (Of those, already marked + 1) − 1</code></li><li><strong>Share marked in the second sample</strong> = <code>Of those, already marked ÷ Total caught in the second sample × 100</code></li></ul><p>Any one of Population estimate, Chapman estimate and Share marked in the second sample can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Marked in the first sample from 80 to 160, leaving every other box alone. The panel moves from &lt;strong&gt;Population estimate&lt;/strong&gt; 400, &lt;strong&gt;Chapman estimate&lt;/strong&gt; 389, &lt;strong&gt;Share marked in the second sample&lt;/strong&gt; 20 %, &lt;strong&gt;95% confidence, lower&lt;/strong&gt; 264 and &lt;strong&gt;95% confidence, upper&lt;/strong&gt; 513 to &lt;strong&gt;Population estimate&lt;/strong&gt; 800, &lt;strong&gt;Chapman estimate&lt;/strong&gt; 773, &lt;strong&gt;Share marked in the second sample&lt;/strong&gt; 20 %, &lt;strong&gt;95% confidence, lower&lt;/strong&gt; 505 and &lt;strong&gt;95% confidence, upper&lt;/strong&gt; 1042.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Population estimate, Chapman estimate and 95% confidence, lower are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Marked in the first sample is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
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
            Marked in the first sample, Total caught in the second sample, Of those, already marked. Fill marked, second and recaptured and leave Population estimate empty if you would rather have that one solved instead.
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
