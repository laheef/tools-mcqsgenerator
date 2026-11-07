<?php

/**
 * Goldfish Years to Human Years Calculator
 * /biology/goldfish-years-to-human-years
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Goldfish Years to Human Years Calculator',
    'meta' => ['title' => 'Goldfish Years to Human Years Calculator — Biology', 'description' => 'A goldfish in a bowl lives a couple of years; the same fish in a large, filtered tank can reach twenty. It returns human-equivalent age, share of a 20-year…', 'h1' => 'Goldfish Years to Human Years Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Goldfish age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'Use 0.5 for six months',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
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
                            'label' => 'Share of a 20-year lifespan',
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
            'results' => ['human' => 'if_else(years<=1, years*16.5, 16.5+(years-1)*4)', 'lifespan' => 'years/20*100', 'years' => 'if_else(human<=16.5, human/16.5, 1+(human-16.5)/4)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A goldfish in a bowl lives a couple of years; the same fish in a large, filtered tank can reach twenty. It returns human-equivalent age, share of a 20-year lifespan and goldfish age, and the panel shows all of them at once.
        
        This calculator converts its age to a human-equivalent using the usual published rule of thumb — 16.5 years at age one, then 4 years per fish year — and shows how far through a typical lifespan it is.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Goldfish Years to Human Years', 'html' => <<<'TXT'
            <p>Human-equivalent age = 16.5 + (goldfish age − 1) × 4, with 16.5 × age for the first year</p>
            <figure class="calc-figure"><img src="/uploads/biology/goldfish-years-to-human-years.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Goldfish Years to Human Years Calculator — Fish years against human-equivalent years." title="Goldfish Years to Human Years Calculator"><figcaption>Fish years against human-equivalent years.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>years</code></td><td>the fish's age</td><td>years</td></tr><tr><td><code>human</code></td><td>human-equivalent age</td><td>years</td></tr><tr><td><code>lifespan</code></td><td>age as a share of a 20-year lifespan</td><td>%</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Goldfish Years to Human Years?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Substituting them into the formula gives human-equivalent age of <strong>24.5</strong> years, share of a 20-year lifespan of <strong>15</strong>%, goldfish age of <strong>3</strong> years.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0 – 0.25</td><td><strong>Fry</strong></td><td>first months, high mortality</td></tr><tr><td>0.5 – 1</td><td><strong>Juvenile</strong></td><td>body shape still developing</td></tr><tr><td>2 – 8</td><td><strong>Adult</strong></td><td>the long healthy middle</td></tr><tr><td>10 and over</td><td><strong>Old</strong></td><td>growth has stopped, colour fades</td></tr></tbody></table>
            <ul><li><p>The number is a comparison, not a forecast. Housing decides goldfish lifespan far more than genetics: 40 litres for the first fish plus 20 per additional one, filtered and cycled.</p></li><li><p>Growth rings on scales can be read like tree rings to age a fish properly; the conversion here starts from that age.</p></li><li><p>Fancy varieties with rounded bodies generally live shorter lives than common goldfish.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Entering months as years for a young fish, which exaggerates the equivalent age enormously.</li><li>Reading the human-equivalent age as a lifespan prediction from a bowl — in a bowl, the fish rarely reaches the years the conversion assumes.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>Most real jobs need two or three of these together:</p><p><a href="/biology/fish-density">Fish density</a>. <a href="/biology/fish-condition-factor">Fish condition factor</a>. <a href="/biology/chicken-years-to-human-years">Chicken years to human years</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How long do goldfish live?', 'a' => 'Ten to twenty years in adequate housing, and often two to five in an unfiltered bowl.'],
            ['q' => 'Does tank size change the conversion?', 'a' => 'It changes the expected lifespan, which is the second number the calculator shows; the conversion factor itself stays the same.'],
            ['q' => 'What does the Goldfish Years to Human Years actually calculate?', 'a' => <<<'TXT'
            It returns human-equivalent age, share of a 20-year lifespan and goldfish age. Each one is derived by the formula on this page, so you can check any figure by hand.
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
