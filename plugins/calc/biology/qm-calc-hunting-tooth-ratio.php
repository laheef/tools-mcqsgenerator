<?php

/**
 * Hunting Tooth Ratio Calculator
 * /biology/hunting-tooth-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hunting Tooth Ratio Calculator',
    'meta' => ['title' => 'Hunting Tooth Ratio Calculator — Formula & Results', 'description' => 'Hunting Tooth Ratio turns Teeth on the driver (or upper molar), Teeth on the driven (or lower molar) and Driver revolutions observed into Gear ratio and…', 'h1' => 'Hunting Tooth Ratio Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'driver',
                            'label' => 'Teeth on the driver (or upper molar)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '21',
                        ],
                        [
                            'name' => 'driven',
                            'label' => 'Teeth on the driven (or lower molar)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '34',
                        ],
                        [
                            'name' => 'revolutions',
                            'label' => 'Driver revolutions observed',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Gear ratio',
                            'type' => 'number',
                            'suffix' => ':1',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hunting',
                            'label' => 'Hunting tooth number',
                            'type' => 'number',
                            'suffix' => 'revolutions',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'hunting_pct',
                            'label' => 'Share of one wear cycle per revolution',
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
            'title' => 'Ratio',
            'results' => ['ratio' => 'driven/driver', 'hunting' => 'driver*driven/gcd(driver,driven)', 'hunting_pct' => 'revolutions/(driver*driven/gcd(driver,driven))*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Hunting Tooth Ratio turns Teeth on the driver (or upper molar), Teeth on the driven (or lower molar) and Driver revolutions observed into Gear ratio and Hunting tooth number. Nothing is looked up on this page: Gear ratio is computed from Teeth on the driver (or upper molar) and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Gear ratio is opened in:1; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Hunting Tooth Ratio calculator works', 'html' => <<<'TXT'
            <p>The Hunting Tooth Ratio calculator applies one relationship to 3 numbers and reports Gear ratio, Hunting tooth number and Share of one wear cycle per revolution.</p><p>Written with the labels from the form, Gear ratio = Teeth on the driven (or lower molar) ÷ Teeth on the driver (or upper molar).</p><p>What comes back is Gear ratio, Hunting tooth number and Share of one wear cycle per revolution — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Teeth on the driver (or upper molar)</strong> — a plain number, no unit</li><li><strong>Teeth on the driven (or lower molar)</strong> — a plain number, no unit</li><li><strong>Driver revolutions observed</strong> — a plain number, no unit</li></ul><p>What you get back is Gear ratio in:1, Hunting tooth number in revolutions, Share of one wear cycle per revolution in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Teeth on the driver (or upper molar) = 21, Teeth on the driven (or lower molar) = 34 and Driver revolutions observed = 100 gives &lt;strong&gt;Gear ratio&lt;/strong&gt; = 1.62:1, &lt;strong&gt;Hunting tooth number&lt;/strong&gt; = 714 revolutions and &lt;strong&gt;Share of one wear cycle per revolution&lt;/strong&gt; = 14.01 %.</p><ul><li><strong>Gear ratio</strong> = 1.62:1</li><li><strong>Hunting tooth number</strong> = 714 revolutions</li><li><strong>Share of one wear cycle per revolution</strong> = 14.01 %</li></ul><p>That is <strong>Gear ratio</strong> = <code>Teeth on the driven (or lower molar) ÷ Teeth on the driver (or upper molar)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Gear ratio&lt;/strong&gt; = 1.62, &lt;strong&gt;Hunting tooth number&lt;/strong&gt; = 714 and &lt;strong&gt;Share of one wear cycle per revolution&lt;/strong&gt; = 14.01 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Gear ratio takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Gear ratio</strong> = <code>Teeth on the driven (or lower molar) ÷ Teeth on the driver (or upper molar)</code></li><li><strong>Hunting tooth number</strong> = <code>Teeth on the driver (or upper molar) × Teeth on the driven (or lower molar) ÷ gcd(Teeth on the driver (or upper molar),Teeth on the driven (or lower molar))</code></li><li><strong>Share of one wear cycle per revolution</strong> = <code>Driver revolutions observed ÷ (Teeth on the driver (or upper molar) × Teeth on the driven (or lower molar) ÷ gcd(Teeth on the driver (or upper molar),Teeth on the driven (or lower molar))) × 100</code></li></ul><p>Any one of Gear ratio, Hunting tooth number and Share of one wear cycle per revolution can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Teeth on the driver (or upper molar), from 21 to 42 — and the answers go from &lt;strong&gt;Gear ratio&lt;/strong&gt; 1.62:1, &lt;strong&gt;Hunting tooth number&lt;/strong&gt; 714 revolutions and &lt;strong&gt;Share of one wear cycle per revolution&lt;/strong&gt; 14.01 % to &lt;strong&gt;Gear ratio&lt;/strong&gt; 0.8095:1, &lt;strong&gt;Hunting tooth number&lt;/strong&gt; 714 revolutions and &lt;strong&gt;Share of one wear cycle per revolution&lt;/strong&gt; 14.01 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Gear ratio, Hunting tooth number and Share of one wear cycle per revolution are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in Teeth on the driver (or upper molar) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Teeth on the driver (or upper molar), Teeth on the driven (or lower molar) and Driver revolutions observed is what you already know and Gear ratio and Hunting tooth number is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/daily-light-integral-dli">Daily light integral (DLI) Calculator</a>, <a href="/biology/days-to-maturity">Days to Maturity Calculator</a> and <a href="/biology/dihybrid-cross">Dihybrid Cross (9:3:3:1) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hunting Tooth Ratio calculator work out?', 'a' => <<<'TXT'
            Gear ratio, Hunting tooth number and Share of one wear cycle per revolution, from Teeth on the driven (or lower molar) and Teeth on the driver (or upper molar). The relationship is Gear ratio = Teeth on the driven (or lower molar) ÷ Teeth on the driver (or upper molar).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Teeth on the driver (or upper molar), Teeth on the driven (or lower molar), Driver revolutions observed. Fill driver, driven and revolutions and leave Gear ratio empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Gear ratio, Hunting tooth number and Share of one wear cycle per revolution blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Gear ratio = 1.62:1, Hunting tooth number = 714 revolutions and Share of one wear cycle per revolution = 14.01 %. That comes from the page's own defaults, entered in Teeth on the driver (or upper molar); change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Gear ratio is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Teeth on the driver (or upper molar) left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Gear ratio at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/daily-light-integral-dli', 'name' => 'Daily light integral (DLI) Calculator'],
            ['path' => '/biology/days-to-maturity', 'name' => 'Days to Maturity Calculator'],
            ['path' => '/biology/dihybrid-cross', 'name' => 'Dihybrid Cross (9:3:3:1) Calculator'],
        ],
        'authors' => [],
    ],
];
