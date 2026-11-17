<?php

/**
 * Earnings per share (EPS) growth
 * /finance/eps-growth
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Earnings per share (EPS) growth',
    'meta' => ['title' => 'Earnings per share (EPS) growth — Formula & Results', 'description' => 'Earnings per share (EPS) growth works out total growth in EPS from initial EPS and Final EPS. Every box can be solved for, not only the one in the title.', 'h1' => 'Earnings per share (EPS) growth Calculator', 'updated' => '2026-09-18'],
    'sections' => [
        [
            'title' => 'Earnings per share growth',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'initial_eps',
                            'label' => 'Initial EPS',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                        ],
                        [
                            'name' => 'final_eps',
                            'label' => 'Final EPS',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['omni', '0.0001'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_growth_in_eps',
                            'label' => 'Total growth in EPS',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number_of_periods',
                            'label' => 'Number of periods',
                            'type' => 'number',
                            'help' => 'Number of full years (for example, 1st Jan 2016 until 1st Jan 2020 is 4 full calendar years).',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eps_growth_rate',
                            'label' => 'EPS growth rate',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Compound annual growth rate.',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => '100*((final_eps/ initial_eps )^(1/number_of_periods) -1 ) = eps_growth_rate',
            'results' => ['eps_growth_rate' => '100*pow(final_eps/initial_eps, 1/number_of_periods) - 100', 'final_eps' => 'initial_eps*pow((1/100)*eps_growth_rate + 1, number_of_periods)', 'initial_eps' => 'pow(100, number_of_periods)*final_eps*pow(eps_growth_rate + 100, -number_of_periods)', 'number_of_periods' => 'log(final_eps/initial_eps)/log((1/100)*eps_growth_rate + 1)'],
        ],
        [
            'title' => 'total_growth_in_eps = 100 * (final_eps - initial_eps)/initial_eps',
            'results' => ['total_growth_in_eps' => '100*final_eps/initial_eps - 100', 'final_eps' => '(1/100)*initial_eps*(total_growth_in_eps + 100)', 'initial_eps' => '100*final_eps/(total_growth_in_eps + 100)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter Initial EPS and Final EPS into Earnings per share (EPS) growth and the answer comes back as Total growth in EPS and Number of periods. There is no hidden constant here: change total growth in EPS and initial EPS moves with it. The main result, Total growth in EPS, is reported in %.
        TXT,
        'sections' => [
            ['title' => 'How the Earnings per share (EPS) growth calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Earnings per share (EPS) growth: it takes 2 numbers and reports Total growth in EPS, Number of periods and EPS growth rate.</p><p>Written with the labels from the form, EPS growth rate = 100 × (Final EPS ÷ Initial EPS)^(1 ÷ Number of periods) − 100.</p><p>What comes back is Total growth in EPS, Number of periods and EPS growth rate — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Initial EPS</strong> — in USD</li><li><strong>Final EPS</strong> — in USD</li></ul><p>The answers come back as Total growth in EPS in %, Number of periods, EPS growth rate in %. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Initial EPS = 10 USD, Final EPS = 100 USD, Number of periods = 1000 and EPS growth rate = 10 % — through the same formula and the panel reports <strong>Total growth in EPS</strong> = 900 %.</p><ul><li><strong>Total growth in EPS</strong> = 900 %</li></ul><p>The line behind those figures is <strong>EPS growth rate</strong> = <code>100 × (Final EPS ÷ Initial EPS)^(1 ÷ Number of periods) − 100</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Total growth in EPS</strong> = 900. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Total growth in EPS is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>EPS growth rate</strong> = <code>100 × (Final EPS ÷ Initial EPS)^(1 ÷ Number of periods) − 100</code></li><li><strong>Final EPS</strong> = <code>Initial EPS × ((1 ÷ 100) × EPS growth rate + 1)^(Number of periods)</code></li><li><strong>Initial EPS</strong> = <code>(100)^(Number of periods) × Final EPS × (EPS growth rate + 100)^(− Number of periods)</code></li><li><strong>Number of periods</strong> = <code>ln(Final EPS ÷ Initial EPS) ÷ ln((1 ÷ 100) × EPS growth rate + 1)</code></li><li><strong>Total growth in EPS</strong> = <code>100 × Final EPS ÷ Initial EPS − 100</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>EPS growth rate</strong> = <code>100 × (Final EPS ÷ Initial EPS)^(1 ÷ Number of periods) − 100</code> — the form to use when Final EPS, Initial EPS and Number of periods are the values you have.</li><li><strong>Final EPS</strong> = <code>Initial EPS × ((1 ÷ 100) × EPS growth rate + 1)^(Number of periods)</code> — the form to use when Initial EPS, EPS growth rate and Number of periods are the values you have.</li><li><strong>Initial EPS</strong> = <code>(100)^(Number of periods) × Final EPS × (EPS growth rate + 100)^(− Number of periods)</code> — the form to use when Number of periods, Final EPS and EPS growth rate are the values you have.</li><li><strong>Number of periods</strong> = <code>ln(Final EPS ÷ Initial EPS) ÷ ln((1 ÷ 100) × EPS growth rate + 1)</code> — the form to use when Final EPS, Initial EPS and EPS growth rate are the values you have.</li><li><strong>Total growth in EPS</strong> = <code>100 × Final EPS ÷ Initial EPS − 100</code> — the form to use when Final EPS and Initial EPS are the values you have.</li><li><strong>Final EPS</strong> = <code>(1 ÷ 100) × Initial EPS × (Total growth in EPS + 100)</code> — the form to use when Initial EPS and Total growth in EPS are the values you have.</li><li><strong>Initial EPS</strong> = <code>100 × Final EPS ÷ (Total growth in EPS + 100)</code> — the form to use when Final EPS and Total growth in EPS are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of EPS growth rate, Final EPS and Initial EPS can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Initial EPS from 10 to 20, leaving every other box alone. The panel moves from <strong>Total growth in EPS</strong> 900 % to <strong>Total growth in EPS</strong> 400 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Total growth in EPS, Number of periods and EPS growth rate are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial EPS left as a guess.</strong> Anything typed into Initial EPS is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Final EPS left as a guess.</strong> Anything typed into Final EPS is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Initial EPS is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Earnings per share (EPS) growth form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Initial EPS</strong> takes a plain number with no unit attached. The page reads it when it works out EPS growth rate, Final EPS and Number of periods. Fill it from a measurement rather than a memory — Initial EPS is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Final EPS</strong> takes a plain number with no unit attached. The page reads it when it works out EPS growth rate, Initial EPS and Number of periods. Fill it from a measurement rather than a memory — Final EPS is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Total growth in EPS</strong> is a plain number and the page's own defaults put it at 900. The value follows from Final EPS and Initial EPS. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Number of periods</strong> is a plain number. The value follows from Final EPS, Initial EPS and EPS growth rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>EPS growth rate</strong> is a plain number. The value follows from Final EPS, Initial EPS and Number of periods. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total growth in EPS</th></tr></thead><tbody><tr><td><strong>Initial EPS</strong> +10%</td><td>-10.1%</td></tr><tr><td><strong>Final EPS</strong> +10%</td><td>+11.11%</td></tr><tr><td><strong>Number of periods</strong> +10%</td><td>+0%</td></tr><tr><td><strong>EPS growth rate</strong> +10%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Final EPS: ten per cent there moves an answer by about 11.1 per cent, which is why that is the number to measure twice. By contrast, Number of periods and EPS growth rate barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Initial EPS = 5 USD, Final EPS = 50 USD, Number of periods = 500 and EPS growth rate = 5 % and the page reports <strong>Total growth in EPS</strong> = 900 %.</li><li>Feed in Initial EPS = 30 USD, Final EPS = 100 USD, Number of periods = 1000 and EPS growth rate = 10 % and the page reports <strong>Total growth in EPS</strong> = 233 %.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Total growth in EPS is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial EPS and Final EPS are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Initial EPS and Final EPS is what you already know and Total growth in EPS and Number of periods is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/smokers-ctc">Smoker&#039;s CTC (cost to company) Calculator</a>, <a href="/finance/software-contract-value">Software contract value Calculator</a> and <a href="/finance/sortino-ratio">Sortino ratio Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Earnings per share (EPS) growth calculator work out?', 'a' => <<<'TXT'
            Total growth in EPS, Number of periods and EPS growth rate, from Final EPS, Initial EPS and Number of periods. The relationship is EPS growth rate = 100 × (Final EPS ÷ Initial EPS)^(1 ÷ Number of periods) − 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Initial EPS (USD), Final EPS (USD). Fill initial EPS and final EPS and leave Total growth in EPS empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. EPS growth rate, Final EPS, Initial EPS and Number of periods can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Total growth in EPS = 900 %. Those are the defaults written into the form — move Initial EPS and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Total growth in EPS is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Initial EPS blank and the page solves for it, reporting Total growth in EPS instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Total growth in EPS at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/smokers-ctc', 'name' => 'Smoker\'s CTC (cost to company) Calculator'],
            ['path' => '/finance/software-contract-value', 'name' => 'Software contract value Calculator'],
            ['path' => '/finance/sortino-ratio', 'name' => 'Sortino ratio Calculator'],
        ],
        'authors' => [],
    ],
];
