<?php

/**
 * Phenotypic Ratio Calculator
 * /biology/phenotypic-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Phenotypic Ratio Calculator',
    'meta' => ['title' => 'Phenotypic Ratio Calculator: Units & Formula', 'description' => 'Phenotypic Ratio Calculator turns class 1 count, class 2 count and class 3 count into total scored and ratio to the smallest class. It returns total scored.', 'h1' => 'Phenotypic Ratio Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'a',
                            'label' => 'Class 1 count',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '180',
                        ],
                        [
                            'name' => 'b',
                            'label' => 'Class 2 count',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '62',
                        ],
                        [
                            'name' => 'c',
                            'label' => 'Class 3 count',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '58',
                        ],
                        [
                            'name' => 'd',
                            'label' => 'Class 4 count',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total scored',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Ratio to the smallest class',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pct1',
                            'label' => 'Class 1 share',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'chi',
                            'label' => 'Chi-square vs 9:3:3:1',
                            'type' => 'number',
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
            'title' => 'Ratio',
            'results' => ['total' => 'a+b+c+d', 'ratio' => '(a+b+c+d)/min(min(a,b),min(c,d))', 'pct1' => 'a/(a+b+c+d)*100', 'chi' => 'pow(a-(a+b+c+d)*9/16,2)/((a+b+c+d)*9/16)+pow(b-(a+b+c+d)*3/16,2)/((a+b+c+d)*3/16)+pow(c-(a+b+c+d)*3/16,2)/((a+b+c+d)*3/16)+pow(d-(a+b+c+d)/16,2)/((a+b+c+d)/16)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Phenotypic Ratio works out Total scored and Ratio to the smallest class from Class 1 count, Class 2 count and Class 3 count. There is no hidden constant here: change total scored and class 1 count moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Phenotypic Ratio calculator works', 'html' => <<<'TXT'
            <p>Phenotypic Ratio answers one question from 4 numbers, and the answer is Total scored, Ratio to the smallest class and Class 1 share.</p><p>The relationship it solves reads Total scored = Class 1 count + Class 2 count + Class 3 count + Class 4 count.</p><p>The result panel carries Total scored, Ratio to the smallest class, Class 1 share and Chi-square vs 9:3:3:1, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Class 1 count</strong> — a plain number, no unit</li><li><strong>Class 2 count</strong> — a plain number, no unit</li><li><strong>Class 3 count</strong> — a plain number, no unit</li><li><strong>Class 4 count</strong> — a plain number, no unit</li></ul><p>The result boxes are Total scored, Ratio to the smallest class, Class 1 share in %, Chi-square vs 9:3:3:1; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Class 1 count = 180, Class 2 count = 62, Class 3 count = 58 and Class 4 count = 20 gives <strong>Total scored</strong> = 320, <strong>Ratio to the smallest class</strong> = 16, <strong>Class 1 share</strong> = 56.25 % and <strong>Chi-square vs 9:3:3:1</strong> = 0.1333.</p><ul><li><strong>Total scored</strong> = 320</li><li><strong>Ratio to the smallest class</strong> = 16</li><li><strong>Class 1 share</strong> = 56.25 %</li><li><strong>Chi-square vs 9:3:3:1</strong> = 0.1333</li></ul><p>The line behind those figures is <strong>Total scored</strong> = <code>Class 1 count + Class 2 count + Class 3 count + Class 4 count</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Total scored</strong> = 320, <strong>Ratio to the smallest class</strong> = 16, <strong>Class 1 share</strong> = 56.25 and <strong>Chi-square vs 9:3:3:1</strong> = 0.1333. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Total scored is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Total scored</strong> = <code>Class 1 count + Class 2 count + Class 3 count + Class 4 count</code></li><li><strong>Ratio to the smallest class</strong> = <code>(Class 1 count + Class 2 count + Class 3 count + Class 4 count) ÷ min(min(Class 1 count,Class 2 count),min(Class 3 count,Class 4 count))</code></li><li><strong>Class 1 share</strong> = <code>Class 1 count ÷ (Class 1 count + Class 2 count + Class 3 count + Class 4 count) × 100</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Total scored</strong> = <code>Class 1 count + Class 2 count + Class 3 count + Class 4 count</code> — the form to use when Class 1 count, Class 2 count, Class 3 count and Class 4 count are the values you have.</li><li><strong>Ratio to the smallest class</strong> = <code>(Class 1 count + Class 2 count + Class 3 count + Class 4 count) ÷ min(min(Class 1 count,Class 2 count),min(Class 3 count,Class 4 count))</code> — the form to use when Class 1 count, Class 2 count, Class 3 count and Class 4 count are the values you have.</li><li><strong>Class 1 share</strong> = <code>Class 1 count ÷ (Class 1 count + Class 2 count + Class 3 count + Class 4 count) × 100</code> — the form to use when Class 1 count, Class 2 count, Class 3 count and Class 4 count are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Total scored, Ratio to the smallest class and Class 1 share can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Class 1 count from 180 to 360, leaving every other box alone. The panel moves from <strong>Total scored</strong> 320, <strong>Ratio to the smallest class</strong> 16, <strong>Class 1 share</strong> 56.25 % and <strong>Chi-square vs 9:3:3:1</strong> 0.1333 to <strong>Total scored</strong> 500, <strong>Ratio to the smallest class</strong> 25, <strong>Class 1 share</strong> 72 % and <strong>Chi-square vs 9:3:3:1</strong> 50.49.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Total scored, Ratio to the smallest class and Class 1 share are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Class 1 count left as a guess.</strong> Anything typed into Class 1 count is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Class 2 count left as a guess.</strong> Anything typed into Class 2 count is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Class 3 count left as a guess.</strong> Anything typed into Class 3 count is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Class 1 count to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Phenotypic Ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Class 1 count</strong> takes a plain number with no unit attached. Change it and Total scored, Ratio to the smallest class and Class 1 share changes with it. Fill it from a measurement rather than a memory — Class 1 count is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Class 2 count</strong> takes a plain number with no unit attached. Change it and Total scored, Ratio to the smallest class and Class 1 share changes with it. Fill it from a measurement rather than a memory — Class 2 count is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Class 3 count</strong> takes a plain number with no unit attached. Change it and Total scored, Ratio to the smallest class and Class 1 share changes with it. Fill it from a measurement rather than a memory — Class 3 count is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Class 4 count</strong> takes a plain number with no unit attached. Change it and Total scored, Ratio to the smallest class and Class 1 share changes with it. Fill it from a measurement rather than a memory — Class 4 count is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total scored</strong> is a plain number and the page's own defaults put it at 320. It is worked out from Class 1 count, Class 2 count, Class 3 count and Class 4 count. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Ratio to the smallest class</strong> is a plain number and the page's own defaults put it at 16. It is worked out from Class 1 count, Class 2 count, Class 3 count and Class 4 count. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Class 1 share</strong> is a plain number and the page's own defaults put it at 56.25. It is worked out from Class 1 count, Class 2 count, Class 3 count and Class 4 count. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Chi-square vs 9:3:3:1</strong> is a plain number and the page's own defaults put it at 0.1333. It is worked out from Class 1 count, Class 2 count, Class 3 count and Class 4 count. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total scored</th><th>Ratio to the smallest class</th><th>Class 1 share</th><th>Chi-square vs 9:3:3:1</th></tr></thead><tbody><tr><td><strong>Class 1 count</strong> +10%</td><td>+5.63%</td><td>+5.62%</td><td>+4.14%</td><td>+554%</td></tr><tr><td><strong>Class 2 count</strong> +10%</td><td>+1.94%</td><td>+1.94%</td><td>-1.9%</td><td>+685%</td></tr><tr><td><strong>Class 3 count</strong> +10%</td><td>+1.81%</td><td>+1.81%</td><td>-1.78%</td><td>+48.96%</td></tr><tr><td><strong>Class 4 count</strong> +10%</td><td>+0.63%</td><td>-8.52%</td><td>-0.62%</td><td>+139%</td></tr></tbody></table><p>The steepest column belongs to Class 2 count: ten per cent there moves an answer by about 685 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Class 1 count = 90, Class 2 count = 31, Class 3 count = 29 and Class 4 count = 10 and the page reports <strong>Total scored</strong> = 160, <strong>Ratio to the smallest class</strong> = 16, <strong>Class 1 share</strong> = 56.25 % and <strong>Chi-square vs 9:3:3:1</strong> = 0.0667.</li><li>Feed in Class 1 count = 540, Class 2 count = 62, Class 3 count = 58 and Class 4 count = 20 and the page reports <strong>Total scored</strong> = 680, <strong>Ratio to the smallest class</strong> = 34, <strong>Class 1 share</strong> = 79.41 % and <strong>Chi-square vs 9:3:3:1</strong> = 148.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Total scored is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Class 1 count, Class 2 count and Class 3 count is what you already know and Total scored and Ratio to the smallest class is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/plasmid-copy-number">Plasmid Copy Number Calculator</a>, <a href="/biology/plasmid-molar-ratio">Plasmid Molar Ratio Calculator</a> and <a href="/biology/potting-soil-calculator">Potting soil Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Phenotypic Ratio calculator work out?', 'a' => <<<'TXT'
            Total scored, Ratio to the smallest class, Class 1 share and Chi-square vs 9:3:3:1, from Class 1 count, Class 2 count, Class 3 count and Class 4 count. The relationship is Total scored = Class 1 count + Class 2 count + Class 3 count + Class 4 count.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Class 1 count, Class 2 count, Class 3 count, Class 4 count. With class 1 count, class 2 count and class 3 count in place, Total scored can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Total scored, Ratio to the smallest class, Class 1 share and Chi-square vs 9:3:3:1 can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total scored = 320, Ratio to the smallest class = 16, Class 1 share = 56.25 % and Chi-square vs 9:3:3:1 = 0.1333. That comes from the page's own defaults, entered in Class 1 count; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Total scored is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Class 1 count blank and the page solves for it, reporting Total scored instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Total scored keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/plasmid-copy-number', 'name' => 'Plasmid Copy Number Calculator'],
            ['path' => '/biology/plasmid-molar-ratio', 'name' => 'Plasmid Molar Ratio Calculator'],
            ['path' => '/biology/potting-soil-calculator', 'name' => 'Potting soil Calculator'],
        ],
        'authors' => [],
    ],
];
