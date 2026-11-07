<?php

/**
 * Mark–Recapture Population Calculator (Lincoln–Petersen)
 * /biology/mark-recapture-population
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mark–Recapture Population Calculator (Lincoln–Petersen)',
    'meta' => ['title' => 'Mark–Recapture Population Calculator — Biology', 'description' => 'Mark a sample, release it, catch a second sample and count how many are marked: the share of marked animals in the second sample estimates the share of the…', 'h1' => 'Mark–Recapture Population Calculator (Lincoln–Petersen)', 'updated' => '2026-10-29'],
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
                            'label' => 'Animals marked and released (M)',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 'second',
                            'label' => 'Animals in the second sample (C)',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'recaptured',
                            'label' => 'Marked animals recaptured (R)',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '22',
                        ],
                        [
                            'name' => 'estimate',
                            'label' => 'Population estimate (Lincoln–Petersen)',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'chapman',
                            'label' => 'Chapman-corrected estimate',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'se',
                            'label' => 'Standard error',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'low',
                            'label' => '95% lower bound',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'high',
                            'label' => '95% upper bound',
                            'type' => 'number',
                            'suffix' => 'individuals',
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
                'se' => '(marked+1)*(second+1)/(recaptured+1)-1*sqrt((marked-recaptured+1)*(second-recaptured+1)/((recaptured+1)*(recaptured+2)))',
                'low' => <<<'TXT'
                (marked+1)*(second+1)/(recaptured+1)-1-1.96*(marked+1)*(second+1)/(recaptured+1)*sqrt((marked-recaptured+1)*(second-recaptured+1)/((recaptured+1)*(recaptured+2)))
                TXT,
                'high' => <<<'TXT'
                (marked+1)*(second+1)/(recaptured+1)-1+1.96*(marked+1)*(second+1)/(recaptured+1)*sqrt((marked-recaptured+1)*(second-recaptured+1)/((recaptured+1)*(recaptured+2)))
                TXT,
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Mark a sample, release it, catch a second sample and count how many are marked: the share of marked animals in the second sample estimates the share of the whole population. It returns population estimate (Lincoln–Petersen), chapman-corrected estimate, standard error and 95% lower bound, and the panel shows all of them at once.
        
        This calculator gives the Lincoln–Petersen estimate, the Chapman small-sample correction and a confidence interval.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Mark–Recapture Population (Lincoln–Petersen)', 'html' => <<<'TXT'
            <p>N ≈ (M × C) ÷ R, with Chapman's correction N = [(M+1)(C+1) ÷ (R+1)] − 1</p>
            <figure class="calc-figure"><img src="/uploads/biology/mark-recapture-population.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Mark–Recapture Population Calculator (Lincoln–Petersen) — Marked animals, second sample and recaptures give the population size." title="Mark–Recapture Population Calculator (Lincoln–Petersen)"><figcaption>Marked animals, second sample and recaptures give the population size.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>M</code></td><td>marked and released in the first sample</td><td>individuals</td></tr><tr><td><code>C</code></td><td>total caught in the second sample</td><td>individuals</td></tr><tr><td><code>R</code></td><td>marked individuals in the second sample</td><td>individuals</td></tr><tr><td><code>N</code></td><td>estimated population size</td><td>individuals</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Mark–Recapture Population (Lincoln–Petersen)?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: animals marked and released (m) of <strong>120</strong> individuals, animals in the second sample (c) of <strong>100</strong> individuals, marked animals recaptured (r) of <strong>22</strong> individuals.</p>
            <p>Substituting them into the formula gives population estimate (lincoln–petersen) of <strong>545.45</strong> individuals, chapman-corrected estimate of <strong>530.35</strong> individuals, standard error of <strong>527.58</strong> individuals, 95% lower bound of <strong>-3,389.75</strong> individuals, 95% upper bound of <strong>4,450.44</strong> individuals.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>R above 20</td><td><strong>Reliable</strong></td><td>the estimate is stable and the interval is narrow</td></tr><tr><td>R 5 – 20</td><td><strong>Use the correction</strong></td><td>Chapman's version removes most of the bias</td></tr><tr><td>R below 5</td><td><strong>Poor</strong></td><td>collect another sample; the interval is wider than the estimate</td></tr></tbody></table>
            <ul><li><p>The method assumes a closed population (no births, deaths, immigration or emigration between samples), equal catchability and that marks are not lost.</p></li><li><p>Trapshy animals violate equal catchability and inflate the estimate; baited traps and trap-happy animals deflate it.</p></li><li><p>The Chapman estimator is less biased than the plain ratio at the sample sizes field biologists actually achieve.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Sampling too soon after marking, before the animals have mixed back into the population.</li><li>Marking only the largest individuals, which makes them easier to recapture.</li><li>Reporting a point estimate with no interval, which overstates what a single sample can say.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/quadrat-sampling-density">Quadrat sampling density</a>. <a href="/biology/catch-per-unit-effort">Catch per unit effort</a>. <a href="/biology/logistic-population-growth">Logistic growth</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Why is my recapture rate so low?', 'a' => 'Either the population is large or the second sample was small; the estimator needs at least five to twenty recaptures to be meaningful.'],
            ['q' => 'What if marked animals die from handling?', 'a' => 'That violates the closure assumption and biases the estimate; use a model that allows for losses on capture (Cormack–Jolly–Seber).'],
            ['q' => 'What does the Mark–Recapture Population (Lincoln–Petersen) actually calculate?', 'a' => <<<'TXT'
            It returns population estimate (Lincoln–Petersen), chapman-corrected estimate, standard error and 95% lower bound. Each one is derived by the formula on this page, so you can check any figure by hand.
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
