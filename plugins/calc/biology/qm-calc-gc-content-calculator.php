<?php

/**
 * GC Content Calculator
 * /biology/gc-content-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GC Content Calculator',
    'meta' => ['title' => 'GC Content Calculator: Formula, Steps & Results', 'description' => 'GC Content Calculator takes guanine (G), Cytosine (C) and Adenine (A) and returns GC content and AT content. The answer, aT content, is worked out in one step.', 'h1' => 'GC Content Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'g',
                            'label' => 'Guanine (G)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '220',
                        ],
                        [
                            'name' => 'c',
                            'label' => 'Cytosine (C)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '180',
                        ],
                        [
                            'name' => 'a',
                            'label' => 'Adenine (A)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '300',
                        ],
                        [
                            'name' => 't',
                            'label' => 'Thymine (T)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '300',
                        ],
                        [
                            'name' => 'gc',
                            'label' => 'GC content',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'at',
                            'label' => 'AT content',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Sequence length',
                            'type' => 'number',
                            'suffix' => 'nt',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tm',
                            'label' => 'Estimated Tm (GC rule)',
                            'type' => 'number',
                            'suffix' => '°C',
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
            'title' => 'Content',
            'results' => ['gc' => '(g+c)/(g+c+a+t)*100', 'at' => '(a+t)/(g+c+a+t)*100', 'length' => 'g+c+a+t', 'tm' => '64.9+41*((g+c)-16.4)/(g+c+a+t)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        GC Content takes Guanine (G), Cytosine (C) and Adenine (A) and returns GC content and AT content. It is a single relationship that reads GC content out of guanine (G), not a table of canned results keyed by them. Units for GC content default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the GC Content calculator works', 'html' => <<<'TXT'
            <p>GC Content answers one question from 4 numbers, and the answer is GC content, AT content and Sequence length.</p><p>Written with the labels from the form, GC content = (Guanine (G) + Cytosine (C)) ÷ (Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T)) × 100.</p><p>The answers are GC content, AT content, Sequence length and Estimated Tm (GC rule); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Guanine (G)</strong> — a plain number, no unit</li><li><strong>Cytosine (C)</strong> — a plain number, no unit</li><li><strong>Adenine (A)</strong> — a plain number, no unit</li><li><strong>Thymine (T)</strong> — a plain number, no unit</li></ul><p>The result boxes are GC content in %, AT content in %, Sequence length in nt, Estimated Tm (GC rule) in °C; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Guanine (G) = 220, Cytosine (C) = 180, Adenine (A) = 300 and Thymine (T) = 300 — through the same formula and the panel reports <strong>GC content</strong> = 40 %, <strong>AT content</strong> = 60 %, <strong>Sequence length</strong> = 1000 nt and <strong>Estimated Tm (GC rule)</strong> = 80.63 °C.</p><ul><li><strong>GC content</strong> = 40 %</li><li><strong>AT content</strong> = 60 %</li><li><strong>Sequence length</strong> = 1000 nt</li><li><strong>Estimated Tm (GC rule)</strong> = 80.63 °C</li></ul><p>The line behind those figures is <strong>GC content</strong> = <code>(Guanine (G) + Cytosine (C)) ÷ (Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T)) × 100</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>GC content</strong> = 40, <strong>AT content</strong> = 60, <strong>Sequence length</strong> = 1000 and <strong>Estimated Tm (GC rule)</strong> = 80.63 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: GC content takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>GC content</strong> = <code>(Guanine (G) + Cytosine (C)) ÷ (Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T)) × 100</code></li><li><strong>AT content</strong> = <code>(Adenine (A) + Thymine (T)) ÷ (Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T)) × 100</code></li><li><strong>Sequence length</strong> = <code>Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T)</code></li><li><strong>Estimated Tm (GC rule)</strong> = <code>64.9 + 41 × ((Guanine (G) + Cytosine (C)) − 16.4) ÷ (Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>GC content</strong> = <code>(Guanine (G) + Cytosine (C)) ÷ (Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T)) × 100</code> — the form to use when Guanine (G), Cytosine (C), Adenine (A) and Thymine (T) are the values you have.</li><li><strong>AT content</strong> = <code>(Adenine (A) + Thymine (T)) ÷ (Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T)) × 100</code> — the form to use when Adenine (A), Thymine (T), Guanine (G) and Cytosine (C) are the values you have.</li><li><strong>Sequence length</strong> = <code>Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T)</code> — the form to use when Guanine (G), Cytosine (C), Adenine (A) and Thymine (T) are the values you have.</li><li><strong>Estimated Tm (GC rule)</strong> = <code>64.9 + 41 × ((Guanine (G) + Cytosine (C)) − 16.4) ÷ (Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T))</code> — the form to use when Guanine (G), Cytosine (C), Adenine (A) and Thymine (T) are the values you have.</li></ul><p>Any one of GC content, AT content and Sequence length can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Guanine (G) from 220 to 440, leaving every other box alone. The panel moves from <strong>GC content</strong> 40 %, <strong>AT content</strong> 60 %, <strong>Sequence length</strong> 1000 nt and <strong>Estimated Tm (GC rule)</strong> 80.63 °C to <strong>GC content</strong> 50.82 %, <strong>AT content</strong> 49.18 %, <strong>Sequence length</strong> 1220 nt and <strong>Estimated Tm (GC rule)</strong> 85.18 °C.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with GC content, AT content and Sequence length are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Guanine (G) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Guanine (G) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Cytosine (C) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cytosine (C) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Adenine (A) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Adenine (A) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Guanine (G) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the GC Content form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Guanine (G)</strong> takes a plain number with no unit attached. Change it and GC content, AT content and Sequence length changes with it. Fill it from a measurement rather than a memory — Guanine (G) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cytosine (C)</strong> takes a plain number with no unit attached. Change it and GC content, AT content and Sequence length changes with it. Fill it from a measurement rather than a memory — Cytosine (C) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Adenine (A)</strong> takes a plain number with no unit attached. Change it and GC content, AT content and Sequence length changes with it. Fill it from a measurement rather than a memory — Adenine (A) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Thymine (T)</strong> takes a plain number with no unit attached. Change it and GC content, AT content and Sequence length changes with it. Fill it from a measurement rather than a memory — Thymine (T) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>GC content</strong> is a plain number and the page's own defaults put it at 40. The value follows from Guanine (G), Cytosine (C), Adenine (A) and Thymine (T). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>AT content</strong> is a plain number and the page's own defaults put it at 60. The value follows from Adenine (A), Thymine (T), Guanine (G) and Cytosine (C). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Sequence length</strong> is a plain number and the page's own defaults put it at 1000. The value follows from Guanine (G), Cytosine (C), Adenine (A) and Thymine (T). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Estimated Tm (GC rule)</strong> is a plain number and the page's own defaults put it at 80.63. The value follows from Guanine (G), Cytosine (C), Adenine (A) and Thymine (T). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>GC content</th><th>AT content</th><th>Sequence length</th><th>Estimated Tm (GC rule)</th></tr></thead><tbody><tr><td><strong>Guanine (G)</strong> +10%</td><td>+3.23%</td><td>-2.15%</td><td>+2.2%</td><td>+0.67%</td></tr><tr><td><strong>Cytosine (C)</strong> +10%</td><td>+2.65%</td><td>-1.77%</td><td>+1.8%</td><td>+0.55%</td></tr><tr><td><strong>Adenine (A)</strong> +10%</td><td>-2.91%</td><td>+1.94%</td><td>+3%</td><td>-0.57%</td></tr><tr><td><strong>Thymine (T)</strong> +10%</td><td>-2.91%</td><td>+1.94%</td><td>+3%</td><td>-0.57%</td></tr></tbody></table><p>Ranked by leverage, Guanine (G) sits at the top — a ten per cent error in that box shows up as roughly 3.2 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Guanine (G) = 110, Cytosine (C) = 90, Adenine (A) = 150 and Thymine (T) = 150 and the page reports <strong>GC content</strong> = 40 %, <strong>AT content</strong> = 60 %, <strong>Sequence length</strong> = 500 nt and <strong>Estimated Tm (GC rule)</strong> = 79.96 °C.</li><li>Feed in Guanine (G) = 660, Cytosine (C) = 180, Adenine (A) = 300 and Thymine (T) = 300 and the page reports <strong>GC content</strong> = 58.33 %, <strong>AT content</strong> = 41.67 %, <strong>Sequence length</strong> = 1440 nt and <strong>Estimated Tm (GC rule)</strong> = 88.35 °C.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> GC content follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Guanine (G), Cytosine (C) and Adenine (A) measured, GC content and AT content wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/animal-mortality-rate">Animal mortality rate</a>, <a href="/biology/annealing-temperature">Annealing temperature Calculator</a> and <a href="/biology/aquarium-water-volume">Aquarium Water Volume Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the GC Content calculator work out?', 'a' => <<<'TXT'
            GC content, AT content, Sequence length and Estimated Tm (GC rule), from Guanine (G), Cytosine (C), Adenine (A) and Thymine (T). The relationship is GC content = (Guanine (G) + Cytosine (C)) ÷ (Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T)) × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Guanine (G), Cytosine (C), Adenine (A), Thymine (T). Fill guanine (G), cytosine (C) and adenine (A) and leave GC content empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of GC content, AT content, Sequence length and Estimated Tm (GC rule) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            GC content = 40 %, AT content = 60 %, Sequence length = 1000 nt and Estimated Tm (GC rule) = 80.63 °C. That comes from the page's own defaults, entered in Guanine (G); change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally GC content is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Guanine (G) blank and the page solves for it, reporting GC content instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of GC content keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/animal-mortality-rate', 'name' => 'Animal mortality rate'],
            ['path' => '/biology/annealing-temperature', 'name' => 'Annealing temperature Calculator'],
            ['path' => '/biology/aquarium-water-volume', 'name' => 'Aquarium Water Volume Calculator'],
        ],
        'authors' => [],
    ],
];
