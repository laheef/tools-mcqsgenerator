<?php

/**
 * Goat Years to Human Years Calculator
 * /biology/goat-years-to-human-years
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Goat Years to Human Years Calculator',
    'meta' => ['title' => 'Goat Years to Human Years Calculator — Biology', 'description' => 'A goat\'s first year is about 18 human years and each later year adds around 2.5. It returns human-equivalent age, share of an 18-year lifespan and goat age…', 'h1' => 'Goat Years to Human Years Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Goat age',
                            'type' => 'number',
                            'suffix' => 'years',
                            'help' => 'Use decimals for months, e.g. 0.5 for six months',
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
                            'label' => 'Share of an 18-year lifespan',
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
            'results' => ['human' => 'if_else(years<=1, years*18, 18+(years-1)*2.5)', 'lifespan' => 'years/18*100', 'years' => 'if_else(human<=18, human/18, 1+(human-18)/2.5)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A goat's first year is about 18 human years and each later year adds around 2.5. It returns human-equivalent age, share of an 18-year lifespan and goat age, and the panel shows all of them at once.
        
        This calculator uses the widely quoted schedule — the first goat year is about 18 human years and each later year adds around 2.5 — and shows the animal's life stage as well.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Goat Years to Human Years', 'html' => <<<'TXT'
            <p>Human-equivalent age = 18 × goat age for the first year, then 18 + 2.5 × (goat age − 1)</p>
            <figure class="calc-figure"><img src="/uploads/biology/goat-years-to-human-years.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Goat Years to Human Years Calculator — The first year converts steeply; later years add a little at a time." title="Goat Years to Human Years Calculator"><figcaption>The first year converts steeply; later years add a little at a time.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>years</code></td><td>the goat's age</td><td>years</td></tr><tr><td><code>human</code></td><td>human-equivalent age</td><td>years</td></tr><tr><td><code>lifespan</code></td><td>age as a share of an 18-year lifespan</td><td>%</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Goat Years to Human Years?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Substituting them into the formula gives human-equivalent age of <strong>23</strong> years, share of an 18-year lifespan of <strong>16.67</strong>%, goat age of <strong>3</strong> years.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0 – 0.5</td><td><strong>Kid</strong></td><td>weaning at about 10 weeks</td></tr><tr><td>0.5 – 1</td><td><strong>Young stock</strong></td><td>growth and first breeding decisions</td></tr><tr><td>2 – 7</td><td><strong>Adult</strong></td><td>prime productive years</td></tr><tr><td>8 and over</td><td><strong>Senior</strong></td><td>teeth wear is the usual limiting factor</td></tr></tbody></table>
            <ul><li><p>A six-month-old goat is roughly nine human years old by this schedule, which is why kids are weaned and breeding-ready so much sooner than a mammal of human size would be.</p></li><li><p>Dairy goats are usually productive to 8–10 years; after that, worn incisors decide more than age does.</p></li><li><p>Different sources use 2.5 to 4.7 human years per goat year after maturity. The schedule here is the conservative middle of that range.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Applying the first-year rate to an adult goat, which makes a five-year-old read as ninety.</li><li>Confusing a goat's age with its kidding history, which is not linear in age.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>Most real jobs need two or three of these together:</p><p><a href="/biology/chicken-years-to-human-years">Chicken years to human years</a>. <a href="/biology/goldfish-years-to-human-years">Goldfish years to human years</a>. <a href="/biology/goat-gestation">Goat gestation</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How long do goats live?', 'a' => 'Twelve to eighteen years for pets and dairy stock, with most reaching 12–15.'],
            ['q' => 'Why is the first year different?', 'a' => 'Because maturity is fast: a year-old goat is sexually and physically mature, which no human is.'],
            ['q' => 'What does the Goat Years to Human Years actually calculate?', 'a' => <<<'TXT'
            It returns human-equivalent age, share of an 18-year lifespan and goat age. Each one is derived by the formula on this page, so you can check any figure by hand.
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
