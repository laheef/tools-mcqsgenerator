<?php

/**
 * Fold Change Calculator
 * /biology/fold-change
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fold Change Calculator',
    'meta' => ['title' => 'Fold Change Calculator: Formula, Steps & Results', 'description' => <<<'TXT'
    Enter Treated value and Control value into Fold Change and the answer comes back as Fold change and log₂ fold change. The arithmetic is the whole method: Fold…
    TXT, 'h1' => 'Fold Change Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'treated',
                            'label' => 'Treated value',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '240',
                        ],
                        [
                            'name' => 'control',
                            'label' => 'Control value',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'fold',
                            'label' => 'Fold change',
                            'type' => 'number',
                            'suffix' => '×',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'log2fc',
                            'label' => 'log₂ fold change',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'pct',
                            'label' => 'Percent change',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'inverse',
                            'label' => 'Reciprocal fold change',
                            'type' => 'number',
                            'suffix' => '×',
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
            'title' => 'Fold change',
            'results' => ['fold' => 'treated/control', 'log2fc' => 'log2(treated/control)', 'pct' => '(treated/control-1)*100', 'inverse' => 'control/treated'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Treated value and Control value into Fold Change and the answer comes back as Fold change and log₂ fold change. The arithmetic is the whole method: Fold change is worked out from Treated value by one formula, applied once. Fold change comes back in × unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Fold Change calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Fold Change: it takes 2 numbers and reports Fold change, log₂ fold change and Percent change.</p><p>The relationship it solves reads Fold change = Treated value ÷ Control value.</p><p>What comes back is Fold change, log₂ fold change, Percent change and Reciprocal fold change — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Treated value</strong> — a plain number, no unit</li><li><strong>Control value</strong> — a plain number, no unit</li></ul><p>The answers come back as Fold change in ×, log₂ fold change, Percent change in %, Reciprocal fold change in ×. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Treated value = 240 and Control value = 100 gives &lt;strong&gt;Fold change&lt;/strong&gt; = 2.4 ×, &lt;strong&gt;log₂ fold change&lt;/strong&gt; = 1.26, &lt;strong&gt;Percent change&lt;/strong&gt; = 140 % and &lt;strong&gt;Reciprocal fold change&lt;/strong&gt; = 0.4167 ×.</p><ul><li><strong>Fold change</strong> = 2.4 ×</li><li><strong>log₂ fold change</strong> = 1.26</li><li><strong>Percent change</strong> = 140 %</li><li><strong>Reciprocal fold change</strong> = 0.4167 ×</li></ul><p>The line behind those figures is <strong>Fold change</strong> = <code>Treated value ÷ Control value</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Fold change&lt;/strong&gt; = 2.4, &lt;strong&gt;log₂ fold change&lt;/strong&gt; = 1.26, &lt;strong&gt;Percent change&lt;/strong&gt; = 140 and &lt;strong&gt;Reciprocal fold change&lt;/strong&gt; = 0.4167. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Fold change is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Fold change</strong> = <code>Treated value ÷ Control value</code></li><li><strong>log₂ fold change</strong> = <code>log2(Treated value ÷ Control value)</code></li><li><strong>Percent change</strong> = <code>(Treated value ÷ Control value − 1) × 100</code></li><li><strong>Reciprocal fold change</strong> = <code>Control value ÷ Treated value</code></li></ul><p>Any one of Fold change, log₂ fold change and Percent change can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Treated value, from 240 to 480 — and the answers go from &lt;strong&gt;Fold change&lt;/strong&gt; 2.4 ×, &lt;strong&gt;log₂ fold change&lt;/strong&gt; 1.26, &lt;strong&gt;Percent change&lt;/strong&gt; 140 % and &lt;strong&gt;Reciprocal fold change&lt;/strong&gt; 0.4167 × to &lt;strong&gt;Fold change&lt;/strong&gt; 4.8 ×, &lt;strong&gt;log₂ fold change&lt;/strong&gt; 2.26, &lt;strong&gt;Percent change&lt;/strong&gt; 380 % and &lt;strong&gt;Reciprocal fold change&lt;/strong&gt; 0.2083 ×.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Fold change, log₂ fold change and Percent change are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Convert Treated value to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Treated value and Control value and the number you are missing is Fold change and log₂ fold change.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/fish-condition-factor">Fish Condition Factor Calculator</a>, <a href="/biology/fish-density">Fish Density Calculator</a> and <a href="/biology/fish-oil-dosage-for-cats">Fish oil dosage for cats Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fold Change calculator work out?', 'a' => <<<'TXT'
            Fold change, log₂ fold change, Percent change and Reciprocal fold change, from Treated value and Control value. The relationship is Fold change = Treated value ÷ Control value.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Treated value, Control value. Enter treated and control; Fold change is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Fold change, log₂ fold change, Percent change and Reciprocal fold change blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Fold change = 2.4 ×, log₂ fold change = 1.26, Percent change = 140 % and Reciprocal fold change = 0.4167 ×. The figures come from Treated value as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Fold change is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Treated value blank and the page solves for it, reporting Fold change instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Fold change keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/fish-condition-factor', 'name' => 'Fish Condition Factor Calculator'],
            ['path' => '/biology/fish-density', 'name' => 'Fish Density Calculator'],
            ['path' => '/biology/fish-oil-dosage-for-cats', 'name' => 'Fish oil dosage for cats Calculator'],
        ],
        'authors' => [],
    ],
];
