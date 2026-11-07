<?php

/**
 * Chicken Years to Human Years Calculator
 * /biology/chicken-years-to-human-years
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Chicken Years to Human Years Calculator',
    'meta' => ['title' => 'Chicken Years to Human Years Calculator — Biology', 'description' => 'A chicken year is about 5.3 human years, so a one-year-old hen is already fully grown. It returns human-equivalent age, share of a 10-year lifespan and…', 'h1' => 'Chicken Years to Human Years Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'years',
                            'label' => 'Chicken age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'Use 0.5 for six months',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
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
                            'name' => 'lifespan',
                            'label' => 'Share of a 10-year lifespan',
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
            'results' => ['human' => 'years*5.33', 'lifespan' => 'years/10*100', 'years' => 'human/5.33'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A chicken year is about 5.3 human years, so a one-year-old hen is already fully grown. It returns human-equivalent age, share of a 10-year lifespan and chicken age, and the panel shows all of them at once.
        
        This calculator converts a chicken's age into a human-equivalent age using the usual rule of thumb that one chicken year is about 5.3 human years, and shows where the bird sits against its expected lifespan.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Chicken Years to Human Years', 'html' => <<<'TXT'
            <p>Human-equivalent age ≈ chicken age × 5.33</p>
            <figure class="calc-figure"><img src="/uploads/biology/chicken-years-to-human-years.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Chicken Years to Human Years Calculator — Chicken years beside their human equivalent." title="Chicken Years to Human Years Calculator"><figcaption>Chicken years beside their human equivalent.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>years</code></td><td>the bird's age in years</td><td>years</td></tr><tr><td><code>human</code></td><td>human-equivalent age</td><td>years</td></tr><tr><td><code>lifespan</code></td><td>age as a fraction of a typical 10-year lifespan</td><td>%</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Chicken Years to Human Years?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Substituting them into the formula gives human-equivalent age of <strong>10.66</strong> years, share of a 10-year lifespan of <strong>20</strong>%, chicken age of <strong>2</strong> years.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0 – 0.25</td><td><strong>Chick</strong></td><td>first months, still under heat</td></tr><tr><td>0.5 – 1</td><td><strong>Point of lay</strong></td><td>sexual maturity, first eggs at 18–22 weeks</td></tr><tr><td>2 – 5</td><td><strong>Prime laying</strong></td><td>peak production years</td></tr><tr><td>6 and over</td><td><strong>Senior</strong></td><td>declining lay, watch for arthritis and egg issues</td></tr></tbody></table>
            <ul><li><p>The multiplier is a rule of thumb, not a biological law: chickens mature in months and then age slowly, so a linear factor overstates the difference at both ends.</p></li><li><p>Backyard hybrids typically live 5–8 years; heritage breeds can reach 10–12, which is where the lifespan share becomes more useful than the raw conversion.</p></li><li><p>Production lifespan is much shorter than biological lifespan — commercial layers are retired at around 72–80 weeks.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Entering months as years (a 20-week bird is 0.38 years, not 20).</li><li>Reading the human-equivalent age as a health prediction; it is a comparison, not a prognosis.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>Most real jobs need two or three of these together:</p><p><a href="/biology/chicken-hatch-date">Chicken hatch date</a>. <a href="/biology/goat-years-to-human-years">Goat years to human years</a>. <a href="/biology/goldfish-years-to-human-years">Goldfish years to human years</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How long do chickens live?', 'a' => 'Five to eight years for most backyard hybrids, ten or more for some heritage breeds; commercial layers are kept for about 80 weeks.'],
            ['q' => 'Is 5.33 right for every breed?', 'a' => 'It is an average across breeds. Small bantams tend to age more slowly, fast-growing broilers much faster.'],
            ['q' => 'What does the Chicken Years to Human Years actually calculate?', 'a' => <<<'TXT'
            It returns human-equivalent age, share of a 10-year lifespan and chicken age. Each one is derived by the formula on this page, so you can check any figure by hand.
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
