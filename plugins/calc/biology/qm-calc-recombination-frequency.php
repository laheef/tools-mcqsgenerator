<?php

/**
 * Recombination Frequency Calculator
 * /biology/recombination-frequency
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Recombination Frequency Calculator',
    'meta' => ['title' => 'Recombination Frequency Calculator: Units & Formula', 'description' => 'Enter recombinant offspring and total offspring and Recombination Frequency Calculator returns map distance and parental offspring. Every figure is computed.', 'h1' => 'Recombination Frequency Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'recombinant',
                            'label' => 'Recombinant offspring',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '84',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total offspring',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '400',
                        ],
                        [
                            'name' => 'rf',
                            'label' => 'Recombination frequency',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cm',
                            'label' => 'Map distance',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'parental',
                            'label' => 'Parental offspring',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Recombinant : parental',
                            'type' => 'number',
                            'suffix' => ':1',
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
            'title' => 'Recombination',
            'results' => ['rf' => 'recombinant/total*100', 'cm' => 'recombinant/total*100', 'parental' => 'total-recombinant', 'ratio' => 'recombinant/(total-recombinant)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Recombination Frequency turns Recombinant offspring and Total offspring into Recombination frequency and Map distance. Nothing is looked up on this page: recombination frequency is computed from recombinant offspring and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Recombination frequency is opened in %; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Recombination Frequency calculator works', 'html' => <<<'TXT'
            <p>The Recombination Frequency calculator applies one relationship to 2 numbers and reports Recombination frequency, Map distance and Parental offspring.</p><p>In the form&#039;s own words, Recombination frequency = Recombinant offspring ÷ Total offspring × 100.</p><p>What comes back is Recombination frequency, Map distance, Parental offspring and Recombinant : parental — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Recombinant offspring</strong> — in individuals</li><li><strong>Total offspring</strong> — in individuals</li></ul><p>The result boxes are Recombination frequency in %, Map distance in cM, Parental offspring in individuals, Recombinant : parental in :1; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Recombinant offspring = 84 individuals and Total offspring = 400 individuals; the answers are <strong>Recombination frequency</strong> = 21 %, <strong>Map distance</strong> = 21 cM, <strong>Parental offspring</strong> = 316 individuals and <strong>Recombinant : parental</strong> = 0.2658 :1.</p><ul><li><strong>Recombination frequency</strong> = 21 %</li><li><strong>Map distance</strong> = 21 cM</li><li><strong>Parental offspring</strong> = 316 individuals</li><li><strong>Recombinant : parental</strong> = 0.2658 :1</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Recombination frequency</strong> = <code>Recombinant offspring ÷ Total offspring × 100</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Recombination frequency</strong> = 21, <strong>Map distance</strong> = 21, <strong>Parental offspring</strong> = 316 and <strong>Recombinant : parental</strong> = 0.2658 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Recombination frequency takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Recombination frequency</strong> = <code>Recombinant offspring ÷ Total offspring × 100</code></li><li><strong>Map distance</strong> = <code>Recombinant offspring ÷ Total offspring × 100</code></li><li><strong>Parental offspring</strong> = <code>Total offspring − Recombinant offspring</code></li><li><strong>Recombinant : parental</strong> = <code>Recombinant offspring ÷ (Total offspring − Recombinant offspring)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Recombination frequency</strong> = <code>Recombinant offspring ÷ Total offspring × 100</code> — the form to use when Recombinant offspring and Total offspring are the values you have.</li><li><strong>Map distance</strong> = <code>Recombinant offspring ÷ Total offspring × 100</code> — the form to use when Recombinant offspring and Total offspring are the values you have.</li><li><strong>Parental offspring</strong> = <code>Total offspring − Recombinant offspring</code> — the form to use when Total offspring and Recombinant offspring are the values you have.</li><li><strong>Recombinant : parental</strong> = <code>Recombinant offspring ÷ (Total offspring − Recombinant offspring)</code> — the form to use when Recombinant offspring and Total offspring are the values you have.</li></ul><p>Any one of Recombination frequency, Map distance and Parental offspring can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Recombinant offspring, from 84 to 168 — and the answers go from <strong>Recombination frequency</strong> 21 %, <strong>Map distance</strong> 21 cM, <strong>Parental offspring</strong> 316 individuals and <strong>Recombinant : parental</strong> 0.2658 :1 to <strong>Recombination frequency</strong> 42 %, <strong>Map distance</strong> 42 cM, <strong>Parental offspring</strong> 232 individuals and <strong>Recombinant : parental</strong> 0.7241 :1.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box cannot be typed into: the results are worked out from the inputs above, and a past answer has to be entered as one of those inputs instead.</li><li><strong>Recombinant offspring left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Recombinant offspring is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Total offspring left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Total offspring is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Recombinant offspring and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Recombination Frequency form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Recombinant offspring</strong> is measured in individuals. It feeds Recombination frequency, Map distance and Parental offspring. Fill it from a measurement rather than a memory — Recombinant offspring is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Total offspring</strong> is measured in individuals. It feeds Recombination frequency, Map distance and Parental offspring. Fill it from a measurement rather than a memory — Total offspring is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Recombination frequency</strong> is a plain number and the page's own defaults put it at 21. It is worked out from Recombinant offspring and Total offspring. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Map distance</strong> is a plain number and the page's own defaults put it at 21. It is worked out from Recombinant offspring and Total offspring. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Parental offspring</strong> is a plain number and the page's own defaults put it at 316. It is worked out from Total offspring and Recombinant offspring. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Recombinant : parental</strong> is a plain number and the page's own defaults put it at 0.2658. It is worked out from Recombinant offspring and Total offspring. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Recombination frequency</th><th>Map distance</th><th>Parental offspring</th><th>Recombinant : parental</th></tr></thead><tbody><tr><td><strong>Recombinant offspring</strong> +10%</td><td>+10%</td><td>+10%</td><td>-2.66%</td><td>+13%</td></tr><tr><td><strong>Total offspring</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>+12.66%</td><td>-11.24%</td></tr></tbody></table><p>Ranked by leverage, Recombinant offspring sits at the top — a ten per cent error in that box shows up as roughly 13 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Recombinant offspring = 42 individuals and Total offspring = 200 individuals and the page reports <strong>Recombination frequency</strong> = 21 %, <strong>Map distance</strong> = 21 cM, <strong>Parental offspring</strong> = 158 individuals and <strong>Recombinant : parental</strong> = 0.2658 :1.</li><li>Feed in Recombinant offspring = 252 individuals and Total offspring = 400 individuals and the page reports <strong>Recombination frequency</strong> = 63 %, <strong>Map distance</strong> = 63 cM, <strong>Parental offspring</strong> = 148 individuals and <strong>Recombinant : parental</strong> = 1.7 :1.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Recombinant offspring and Total offspring ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Recombinant offspring — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Recombination frequency in % against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Recombination frequency follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Recombinant offspring and Total offspring measured, Recombination frequency and Map distance wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/hunting-tooth-ratio">Hunting Tooth Ratio Calculator</a>, <a href="/biology/ideal-fish-tank-size">Ideal Fish Tank Size Calculator</a> and <a href="/biology/in-vivo-formulation">In Vivo Formulation Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Recombination Frequency calculator work out?', 'a' => <<<'TXT'
            Recombination frequency, Map distance, Parental offspring and Recombinant : parental, from Recombinant offspring and Total offspring. The relationship is Recombination frequency = Recombinant offspring ÷ Total offspring × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Recombinant offspring (individuals), Total offspring (individuals). Fill recombinant offspring and total offspring and leave Recombination frequency empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Recombination frequency, Map distance, Parental offspring and Recombinant : parental blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Recombination frequency = 21 %, Map distance = 21 cM, Parental offspring = 316 individuals and Recombinant : parental = 0.2658 :1. Those are the defaults written into the form — move Recombinant offspring and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Recombination frequency is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Recombinant offspring blank and the page solves for it, reporting Recombination frequency instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Recombination frequency at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/hunting-tooth-ratio', 'name' => 'Hunting Tooth Ratio Calculator'],
            ['path' => '/biology/ideal-fish-tank-size', 'name' => 'Ideal Fish Tank Size Calculator'],
            ['path' => '/biology/in-vivo-formulation', 'name' => 'In Vivo Formulation Calculator'],
        ],
        'authors' => [],
    ],
];
