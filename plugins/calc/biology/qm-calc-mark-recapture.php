<?php

/**
 * Mark-Recapture Population Calculator
 * /biology/mark-recapture
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mark-Recapture Population Calculator',
    'meta' => ['title' => 'Mark-Recapture Population Calculator — Biology', 'description' => 'Estimate how many animals are in a population from two visits: mark a sample, release them, then count how many marked individuals turn up in a second sample.', 'h1' => 'Mark-Recapture Population Calculator', 'updated' => '2026-10-29'],
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
                            'label' => 'Marked in the first sample',
                            'type' => 'number',
                            'help' => 'M',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '80',
                        ],
                        [
                            'name' => 'second',
                            'label' => 'Total caught in the second sample',
                            'type' => 'number',
                            'help' => 'C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'recaptured',
                            'label' => 'Of those, already marked',
                            'type' => 'number',
                            'help' => 'R',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'estimate',
                            'label' => 'Population estimate',
                            'type' => 'number',
                            'help' => 'Lincoln–Petersen',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'chapman',
                            'label' => 'Chapman estimate',
                            'type' => 'number',
                            'help' => 'Less biased for small samples',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ci_low',
                            'label' => '95% confidence, lower',
                            'type' => 'number',
                            'help' => 'On the Chapman estimate',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ci_high',
                            'label' => '95% confidence, upper',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'marked_share',
                            'label' => 'Share marked in the second sample',
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
            'title' => 'Estimate',
            'results' => [
                'estimate' => 'marked*second/recaptured',
                'chapman' => '(marked+1)*(second+1)/(recaptured+1)-1',
                'marked_share' => 'recaptured/second*100',
                'ci_low' => '(marked+1)*(second+1)/(recaptured+1)-1-1.96*sqrt((marked+1)*(second+1)*(marked-recaptured)*(second-recaptured)/((recaptured+1)^2*(recaptured+2)))',
                'ci_high' => '(marked+1)*(second+1)/(recaptured+1)-1+1.96*sqrt((marked+1)*(second+1)*(marked-recaptured)*(second-recaptured)/((recaptured+1)^2*(recaptured+2)))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Estimate how many animals are in a population from two visits: mark a sample, release them, then count how many marked individuals turn up in a second sample. It returns population estimate, chapman estimate, share marked in the second sample and 95% confidence, lower, and the panel shows all of them at once.
        
        The Lincoln–Petersen estimator is the simple proportion, and the Chapman correction makes it usable when samples are small.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Mark-Recapture Population', 'html' => <<<'TXT'
            <p>N ≈ (M × C) ÷ R. Chapman: N = (M+1)(C+1)/(R+1) − 1</p>
            <figure class="calc-figure"><img src="/uploads/biology/mark-recapture.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Mark-Recapture Population Calculator — The estimate tightens as recaptures rise" title="Mark-Recapture Population Calculator"><figcaption>The estimate tightens as recaptures rise</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>M</code></td><td>animals marked and released in the first sample</td><td>animals</td></tr><tr><td><code>C</code></td><td>animals caught in the second sample</td><td>animals</td></tr><tr><td><code>R</code></td><td>of those, how many carry a mark</td><td>animals</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Mark-Recapture Population?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter how many animals you marked and released (M).</li><li>Enter the size of the second sample (C) and how many of them were already marked (R).</li><li>Read the estimate, the Chapman-corrected value and the confidence interval.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: marked in the first sample of <strong>80</strong>, total caught in the second sample of <strong>100</strong>, of those, already marked of <strong>20</strong>.</p>
            <p>Substituting them into the formula gives population estimate of <strong>400</strong>, chapman estimate of <strong>388.57</strong>, share marked in the second sample of <strong>20</strong>%, 95% confidence, lower of <strong>263.88</strong>, 95% confidence, upper of <strong>513.27</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> Here is the scale that goes with this one:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>R ≥ 20</td><td><strong>Reliable</strong></td><td>the estimate is stable and the interval is tight</td></tr><tr><td>R 5 – 20</td><td><strong>Usable with care</strong></td><td>use the Chapman correction; expect a wide interval</td></tr><tr><td>R under 5</td><td><strong>Unreliable</strong></td><td>the interval will be enormous — mark more animals</td></tr></tbody></table>
            <ul><li><p>The method assumes a closed population: no births, deaths, immigration or emigration between the two samples, and marks that do not fall off or change behaviour.</p></li><li><p>The Lincoln–Petersen estimate is biased high when R is small — it cannot even return a value below M plus the unmarked animals you saw. The Chapman correction exists for exactly this.</p></li><li><p>The confidence interval depends almost entirely on R. Twelve recaptures is the practical minimum for a number you would publish.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Comparing samples taken in different seasons, when the population is not closed.</li><li>Marking only conspicuous animals, which are then more likely to be caught again.</li><li>Reporting the point estimate without the interval — it can easily be ±40%.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does mark-recapture assume?', 'a' => 'A closed population, equal catchability of marked and unmarked animals, and marks that are neither lost nor harmful.'],
            ['q' => 'Why use the Chapman correction?', 'a' => 'The plain Lincoln–Petersen estimator is biased upward for small samples; Chapman\'s version is close to unbiased.'],
            ['q' => 'How many recaptures do I need?', 'a' => 'At least twenty for a useful interval, and never fewer than five for a number worth reporting.'],
            ['q' => 'What does the Mark-Recapture Population actually calculate?', 'a' => <<<'TXT'
            It returns population estimate, chapman estimate, share marked in the second sample and 95% confidence, lower. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];
