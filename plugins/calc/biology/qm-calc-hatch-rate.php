<?php

/**
 * Hatch Rate Calculator
 * /biology/hatch-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hatch Rate Calculator',
    'meta' => ['title' => 'Hatch Rate Calculator: Formula, Steps & Results', 'description' => 'Hatch rate is the share of fertile eggs that actually hatch, and hatchability is the share of all eggs set. It returns hatch rate (of fertile), hatchability…', 'h1' => 'Hatch Rate Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'eggs_set',
                            'label' => 'Eggs set',
                            'type' => 'number',
                            'suffix' => 'eggs',
                            'help' => 'Everything that went into the incubator',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '48',
                        ],
                        [
                            'name' => 'fertile',
                            'label' => 'Fertile eggs',
                            'type' => 'number',
                            'suffix' => 'eggs',
                            'help' => 'From candling at day 7–10',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'hatched',
                            'label' => 'Chicks hatched',
                            'type' => 'number',
                            'suffix' => 'chicks',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '34',
                        ],
                        [
                            'name' => 'hatch_rate',
                            'label' => 'Hatch rate (of fertile)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hatchability',
                            'label' => 'Hatchability (of set)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'infertile',
                            'label' => 'Infertile eggs',
                            'type' => 'number',
                            'suffix' => 'eggs',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dead_in_shell',
                            'label' => 'Died after candling',
                            'type' => 'number',
                            'suffix' => 'eggs',
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
            'title' => 'Hatch',
            'results' => [
                'hatch_rate' => 'hatched/fertile*100',
                'hatchability' => 'hatched/eggs_set*100',
                'infertile' => 'eggs_set-fertile',
                'dead_in_shell' => 'fertile-hatched',
                'hatched' => 'hatch_rate*fertile/100',
                'fertile' => 'hatched/hatch_rate*100',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Hatch rate is the share of fertile eggs that actually hatch, and hatchability is the share of all eggs set. It returns hatch rate (of fertile), hatchability (of set), infertile eggs and died after candling, and the panel shows all of them at once.
        
        The two numbers answer different questions — one measures the incubator, the other the flock — and this calculator reports both plus the total losses.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Hatch Rate', 'html' => <<<'TXT'
            <p>Hatch rate = hatched ÷ fertile × 100; hatchability = hatched ÷ eggs set × 100</p>
            <figure class="calc-figure"><img src="/uploads/biology/hatch-rate.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Hatch Rate Calculator — Eggs set, fertile eggs and chicks give two different percentages." title="Hatch Rate Calculator"><figcaption>Eggs set, fertile eggs and chicks give two different percentages.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>set</code></td><td>eggs placed in the incubator</td><td>eggs</td></tr><tr><td><code>fertile</code></td><td>eggs with a visible embryo at candling</td><td>eggs</td></tr><tr><td><code>hatched</code></td><td>chicks that emerged</td><td>chicks</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Hatch Rate?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: eggs set of <strong>48</strong> eggs.</p>
            <p>Substituting them into the formula gives hatch rate (of fertile) of <strong>85</strong>%, hatchability (of set) of <strong>70.83</strong>%, infertile eggs of <strong>8</strong> eggs, died after candling of <strong>6</strong> eggs, chicks hatched of <strong>34</strong> chicks, fertile eggs of <strong>40</strong> eggs.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>85% and above</td><td><strong>Good</strong></td><td>commercial hatchery performance</td></tr><tr><td>70 – 85%</td><td><strong>Fair</strong></td><td>check turning, temperature and humidity</td></tr><tr><td>below 70%</td><td><strong>Poor</strong></td><td>look at fertility, storage and incubation first</td></tr></tbody></table>
            <ul><li><p>A low hatch rate with good fertility points at incubation; a low hatchability with poor fertility points at the breeding flock, the cockerel ratio or egg storage.</p></li><li><p>Candling at day 7 removes the infertiles, which is why both numbers are worth reporting: they separate two different problems.</p></li><li><p>Stored eggs lose about 1% of hatchability per day after day seven.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Dividing by eggs set and calling it hatch rate — that is hatchability, and it makes a fertility problem look like an incubator problem.</li><li>Candling too early, before day 7, and counting live embryos as infertile.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a good hatch rate for chickens?', 'a' => '85% of fertile eggs is the commercial benchmark; backyard hatches often run 70–85%.'],
            ['q' => 'What is the difference between hatch rate and hatchability?', 'a' => 'Hatch rate is chicks over fertile eggs; hatchability is chicks over all eggs set. The gap between them is the infertile count.'],
            ['q' => 'What does the Hatch Rate actually calculate?', 'a' => <<<'TXT'
            It returns hatch rate (of fertile), hatchability (of set), infertile eggs and died after candling. Each one is derived by the formula on this page, so you can check any figure by hand.
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
