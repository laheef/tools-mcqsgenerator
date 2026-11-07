<?php

/**
 * Net Reproductive Rate Calculator (R₀)
 * /biology/net-reproductive-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Net Reproductive Rate Calculator (R₀)',
    'meta' => ['title' => 'Net Reproductive Rate Calculator (R₀) — Biology', 'description' => 'The net reproductive rate is the number of daughters a female leaves over her whole life, and it is the single number that says whether a population will grow.', 'h1' => 'Net Reproductive Rate Calculator (R₀)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'survival',
                            'label' => 'Probability a newborn reaches breeding age',
                            'type' => 'number',
                            'help' => '0–1',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.6',
                        ],
                        [
                            'name' => 'fecundity',
                            'label' => 'Daughters per female per season',
                            'type' => 'number',
                            'suffix' => 'daughters',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3.2',
                        ],
                        [
                            'name' => 'seasons',
                            'label' => 'Breeding seasons per lifetime',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'interval',
                            'label' => 'Age at first reproduction',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'r0',
                            'label' => 'Net reproductive rate',
                            'type' => 'number',
                            'suffix' => 'daughters',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'generation',
                            'label' => 'Generation time',
                            'type' => 'number',
                            'suffix' => 'years',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'r',
                            'label' => 'Intrinsic rate of increase',
                            'type' => 'number',
                            'suffix' => 'per year',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'doubling',
                            'label' => 'Doubling time',
                            'type' => 'number',
                            'suffix' => 'years',
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
            'title' => 'Life table',
            'results' => ['r0' => 'survival*fecundity*seasons', 'generation' => 'interval+(seasons-1)*interval/2', 'r' => 'ln(max(0.000001,survival*fecundity*seasons))/max(0.5,interval)', 'doubling' => 'ln(2)/(ln(max(0.000001,survival*fecundity*seasons))/max(0.5,interval))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The net reproductive rate is the number of daughters a female leaves over her whole life, and it is the single number that says whether a population will grow. It returns net reproductive rate, generation time, intrinsic rate of increase and doubling time, and the panel shows all of them at once.
        
        Enter age-specific survival and fertility and it returns R₀, generation time and the per-generation change.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Net Reproductive Rate (R₀)', 'html' => <<<'TXT'
            <p>R₀ = Σ l(x)·m(x); r ≈ ln R₀ ÷ T; doubling time = ln 2 ÷ r</p>
            <figure class="calc-figure"><img src="/uploads/biology/net-reproductive-rate.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Net Reproductive Rate Calculator (R₀) — Survival times fertility, summed over the lifetime." title="Net Reproductive Rate Calculator (R₀)"><figcaption>Survival times fertility, summed over the lifetime.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>l(x)</code></td><td>survival to age x</td><td>probability</td></tr><tr><td><code>m(x)</code></td><td>daughters produced at age x</td><td>daughters</td></tr><tr><td><code>R₀</code></td><td>net reproductive rate</td><td>daughters per female</td></tr><tr><td><code>T</code></td><td>generation time</td><td>years</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Net Reproductive Rate (R₀)?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: probability a newborn reaches breeding age of <strong>0.6</strong>, daughters per female per season of <strong>3.2</strong> daughters, breeding seasons per lifetime of <strong>2</strong>, age at first reproduction of <strong>1</strong> years.</p>
            <p>Substituting them into the formula gives net reproductive rate of <strong>3.84</strong> daughters, generation time of <strong>1.5</strong> years, intrinsic rate of increase of <strong>1.35</strong> per year, doubling time of <strong>0.5152</strong> years.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>R₀ &lt; 1</td><td><strong>Declining</strong></td><td>each female is replaced by less than one daughter</td></tr><tr><td>R₀ = 1</td><td><strong>Stable</strong></td><td>exact replacement</td></tr><tr><td>1 &lt; R₀ &lt; 2</td><td><strong>Slow growth</strong></td><td>typical of long-lived vertebrates</td></tr><tr><td>R₀ &gt; 2</td><td><strong>Fast growth</strong></td><td>insects, weeds, invasive species</td></tr></tbody></table>
            <ul><li><p>R₀ is a lifetime figure, so it compares across lifespans in a way that r does not; r is the per-year rate and is the one that goes into exponential growth models.</p></li><li><p>The approximation r ≈ ln R₀ / T is exact only in a stable age distribution. When the age structure is disturbed — after a drought or a cull — the realised rate differs for years.</p></li><li><p>A species with R₀ of 1.1 but a generation time of 15 years is effectively static on any management timescale.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Counting offspring rather than daughters — sons do not add to R₀.</li><li>Using the mean age at reproduction when reproduction is spread over several seasons.</li><li>Treating R₀ as a projection: it is an average over the whole life, not next year's growth.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does R₀ = 1 mean?', 'a' => 'The population replaces itself exactly; every female is replaced by one daughter on average.'],
            ['q' => 'How is R₀ different from the intrinsic rate r?', 'a' => 'R₀ is per generation and ignores timing; r is per unit time and includes it. A fast-breeding species can have the same R₀ as a slow one but a much larger r.'],
            ['q' => 'What does the Net Reproductive Rate (R₀) actually calculate?', 'a' => <<<'TXT'
            It returns net reproductive rate, generation time, intrinsic rate of increase and doubling time. Each one is derived by the formula on this page, so you can check any figure by hand.
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
