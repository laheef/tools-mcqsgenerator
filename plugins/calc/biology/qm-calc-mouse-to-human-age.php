<?php

/**
 * Mouse to Human Age Calculator
 * /biology/mouse-to-human-age
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mouse to Human Age Calculator',
    'meta' => ['title' => 'Mouse to Human Age Calculator — Formula & Results', 'description' => 'Mice age about forty times faster than people, but not evenly: the first months compress decades. It returns mouse age, human-equivalent age, share of a…', 'h1' => 'Mouse to Human Age Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'months',
                            'label' => 'Mouse age',
                            'type' => 'number',
                            'suffix' => 'months',
                            'help' => '3 weeks = 0.7 months; 126 days = 4.1 months',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'human',
                            'label' => 'Human-equivalent age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'weeks',
                            'label' => 'Mouse age',
                            'type' => 'number',
                            'suffix' => 'weeks',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'lifespan',
                            'label' => 'Share of a 2-year lifespan',
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
            'title' => 'Conversion',
            'results' => ['weeks' => 'months*4.345', 'human' => <<<'TXT'
            if_else(months<=2, months*8, if_else(months<=10, 16+(months-2)*2.75, if_else(months<=15, 38+(months-10)*1.8, if_else(months<=18, 47+(months-15)*3, if_else(months<=24, 56+(months-18)*2.167, 69+(months-24)*2.2)))))
            TXT, 'lifespan' => 'months/24*100', 'months' => 'weeks/4.345'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Mice age about forty times faster than people, but not evenly: the first months compress decades. It returns mouse age, human-equivalent age, share of a 2-year lifespan and mouse age, and the panel shows all of them at once.
        
        This calculator converts a mouse age in months to a human-equivalent using the published life-stage anchors (16 human years at two months, 38 at ten, 69 at two years) and names the developmental stage.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Mouse to Human Age', 'html' => <<<'TXT'
            <p>Piecewise linear between the standard life-stage anchors: 2 months ≈ 16 human years, 10 months ≈ 38, 15 months ≈ 47, 18 months ≈ 56, 24 months ≈ 69</p>
            <figure class="calc-figure"><img src="/uploads/biology/mouse-to-human-age.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Mouse to Human Age Calculator — The conversion is a curve, not a straight line: early months move fast." title="Mouse to Human Age Calculator"><figcaption>The conversion is a curve, not a straight line: early months move fast.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>months</code></td><td>the animal's age</td><td>months</td></tr><tr><td><code>human</code></td><td>human-equivalent age</td><td>years</td></tr><tr><td><code>lifespan</code></td><td>age as a share of the ~24-month median lifespan</td><td>%</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Mouse to Human Age?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Substituting them into the formula gives mouse age of <strong>17.38</strong> weeks, human-equivalent age of <strong>21.5</strong> years, share of a 2-year lifespan of <strong>16.67</strong>%, mouse age of <strong>4</strong> months.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>3 – 6 weeks</td><td><strong>Weanling</strong></td><td>independent, still growing</td></tr><tr><td>6 weeks – 6 months</td><td><strong>Young adult</strong></td><td>the standard experimental window</td></tr><tr><td>6 – 12 months</td><td><strong>Mature adult</strong></td><td>equivalent to roughly 30–40 human years</td></tr><tr><td>18 – 24 months</td><td><strong>Old</strong></td><td>the usual 'aged' cohort in ageing studies</td></tr></tbody></table>
            <ul><li><p>Ageing studies quote cohorts in months because the mapping to human life stages is nonlinear: a two-month difference at six months is worth decades, at eighteen months barely a few years.</p></li><li><p>Strain matters. C57BL/6J, BALB/c and FVB have different median lifespans, so the lifespan share is indicative.</p></li><li><p>The conversion is a communication device for comparing cohorts, not a biological claim that the two species age identically.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Converting in years rather than months for a young animal.</li><li>Using the linear 40× rule for a mouse younger than six months, which understates the early life-stage equivalence dramatically.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'How old is a 1-year-old mouse in human years?', 'a' => 'About 42 human years by these anchors — early adulthood, not old age.'],
            ['q' => 'Why are there different conversion tables?', 'a' => 'Because the species differ in more than one dimension: lifespan, developmental milestones and disease onset do not all scale by the same factor.'],
            ['q' => 'What does the Mouse to Human Age actually calculate?', 'a' => <<<'TXT'
            It returns mouse age, human-equivalent age, share of a 2-year lifespan and mouse age. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [],
    ],
];
