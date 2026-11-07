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
    'meta' => ['title' => 'Hunting Tooth Ratio Calculator: Steps & Units', 'description' => 'Hunting Tooth Ratio Calculator works out gear ratio and hunting tooth number from teeth on the driver (or upper molar) and teeth on the driven (or lower molar).', 'h1' => 'Hunting Tooth Ratio Calculator', 'updated' => '2026-10-29'],
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
        Hunting Tooth Ratio turns Teeth on the driver (or upper molar), Teeth on the driven (or lower molar) and Driver revolutions observed into Gear ratio and Hunting tooth number. Nothing is looked up on this page: gear ratio is computed from teeth on the driver (or upper molar) and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Gear ratio is opened in :1; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Hunting Tooth Ratio calculator works', 'html' => <<<'TXT'
            <p>The Hunting Tooth Ratio calculator applies one relationship to 3 numbers and reports Gear ratio, Hunting tooth number and Share of one wear cycle per revolution.</p><p>Written with the labels from the form, Gear ratio = Teeth on the driven (or lower molar) ÷ Teeth on the driver (or upper molar).</p><p>What comes back is Gear ratio, Hunting tooth number and Share of one wear cycle per revolution — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Teeth on the driver (or upper molar)</strong> — a plain number, no unit</li><li><strong>Teeth on the driven (or lower molar)</strong> — a plain number, no unit</li><li><strong>Driver revolutions observed</strong> — a plain number, no unit</li></ul><p>What you get back is Gear ratio in :1, Hunting tooth number in revolutions, Share of one wear cycle per revolution in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Teeth on the driver (or upper molar) = 21, Teeth on the driven (or lower molar) = 34 and Driver revolutions observed = 100 gives <strong>Gear ratio</strong> = 1.62 :1, <strong>Hunting tooth number</strong> = 714 revolutions and <strong>Share of one wear cycle per revolution</strong> = 14.01 %.</p><ul><li><strong>Gear ratio</strong> = 1.62 :1</li><li><strong>Hunting tooth number</strong> = 714 revolutions</li><li><strong>Share of one wear cycle per revolution</strong> = 14.01 %</li></ul><p>That is <strong>Gear ratio</strong> = <code>Teeth on the driven (or lower molar) ÷ Teeth on the driver (or upper molar)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Gear ratio</strong> = 1.62, <strong>Hunting tooth number</strong> = 714 and <strong>Share of one wear cycle per revolution</strong> = 14.01 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Gear ratio takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Gear ratio</strong> = <code>Teeth on the driven (or lower molar) ÷ Teeth on the driver (or upper molar)</code></li><li><strong>Hunting tooth number</strong> = <code>Teeth on the driver (or upper molar) × Teeth on the driven (or lower molar) ÷ gcd(Teeth on the driver (or upper molar),Teeth on the driven (or lower molar))</code></li><li><strong>Share of one wear cycle per revolution</strong> = <code>Driver revolutions observed ÷ (Teeth on the driver (or upper molar) × Teeth on the driven (or lower molar) ÷ gcd(Teeth on the driver (or upper molar),Teeth on the driven (or lower molar))) × 100</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Gear ratio</strong> = <code>Teeth on the driven (or lower molar) ÷ Teeth on the driver (or upper molar)</code> — the form to use when Teeth on the driven (or lower molar) and Teeth on the driver (or upper molar) are the values you have.</li><li><strong>Hunting tooth number</strong> = <code>Teeth on the driver (or upper molar) × Teeth on the driven (or lower molar) ÷ gcd(Teeth on the driver (or upper molar),Teeth on the driven (or lower molar))</code> — the form to use when Teeth on the driver (or upper molar) and Teeth on the driven (or lower molar) are the values you have.</li><li><strong>Share of one wear cycle per revolution</strong> = <code>Driver revolutions observed ÷ (Teeth on the driver (or upper molar) × Teeth on the driven (or lower molar) ÷ gcd(Teeth on the driver (or upper molar),Teeth on the driven (or lower molar))) × 100</code> — the form to use when Driver revolutions observed, Teeth on the driver (or upper molar) and Teeth on the driven (or lower molar) are the values you have.</li></ul><p>Any one of Gear ratio, Hunting tooth number and Share of one wear cycle per revolution can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Teeth on the driver (or upper molar), from 21 to 42 — and the answers go from <strong>Gear ratio</strong> 1.62 :1, <strong>Hunting tooth number</strong> 714 revolutions and <strong>Share of one wear cycle per revolution</strong> 14.01 % to <strong>Gear ratio</strong> 0.8095 :1, <strong>Hunting tooth number</strong> 714 revolutions and <strong>Share of one wear cycle per revolution</strong> 14.01 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Gear ratio, Hunting tooth number and Share of one wear cycle per revolution are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Teeth on the driver (or upper molar) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Teeth on the driver (or upper molar) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Teeth on the driven (or lower molar) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Teeth on the driven (or lower molar) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Driver revolutions observed left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Driver revolutions observed is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Teeth on the driver (or upper molar) and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Teeth on the driver (or upper molar)</strong> takes a plain number with no unit attached. It feeds Gear ratio, Hunting tooth number and Share of one wear cycle per revolution. Have it to hand before you start: Teeth on the driver (or upper molar) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Teeth on the driven (or lower molar)</strong> takes a plain number with no unit attached. It feeds Gear ratio, Hunting tooth number and Share of one wear cycle per revolution. Have it to hand before you start: Teeth on the driven (or lower molar) is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Driver revolutions observed</strong> takes a plain number with no unit attached. It feeds Share of one wear cycle per revolution. Have it to hand before you start: Driver revolutions observed is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Gear ratio</strong> is a plain number and the page's own defaults put it at 1.62. The value follows from Teeth on the driven (or lower molar) and Teeth on the driver (or upper molar). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Hunting tooth number</strong> is a plain number and the page's own defaults put it at 714. The value follows from Teeth on the driver (or upper molar) and Teeth on the driven (or lower molar). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Share of one wear cycle per revolution</strong> is a plain number and the page's own defaults put it at 14.01. The value follows from Driver revolutions observed, Teeth on the driver (or upper molar) and Teeth on the driven (or lower molar). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Gear ratio</th><th>Hunting tooth number</th><th>Share of one wear cycle per revolution</th></tr></thead><tbody><tr><td><strong>Teeth on the driver (or upper molar)</strong> +10%</td><td>-9.09%</td><td>+10%</td><td>-9.09%</td></tr><tr><td><strong>Teeth on the driven (or lower molar)</strong> +10%</td><td>+10%</td><td>+10%</td><td>-9.09%</td></tr><tr><td><strong>Driver revolutions observed</strong> +10%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Teeth on the driven (or lower molar) sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Teeth on the driver (or upper molar) = 10.5, Teeth on the driven (or lower molar) = 17 and Driver revolutions observed = 50, the answer is <strong>Gear ratio</strong> = 1.62 :1, <strong>Hunting tooth number</strong> = 179 revolutions and <strong>Share of one wear cycle per revolution</strong> = 28.01 %.</li><li>With Teeth on the driver (or upper molar) = 63, Teeth on the driven (or lower molar) = 34 and Driver revolutions observed = 100, the answer is <strong>Gear ratio</strong> = 0.5397 :1, <strong>Hunting tooth number</strong> = 2142 revolutions and <strong>Share of one wear cycle per revolution</strong> = 4.67 %.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Gear ratio follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Teeth on the driver (or upper molar), Teeth on the driven (or lower molar) and Driver revolutions observed are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
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
            Teeth on the driver (or upper molar), Teeth on the driven (or lower molar), Driver revolutions observed. Fill teeth on the driver (or upper molar), teeth on the driven (or lower molar) and driver revolutions observed and leave Gear ratio empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Gear ratio, Hunting tooth number and Share of one wear cycle per revolution blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Gear ratio = 1.62 :1, Hunting tooth number = 714 revolutions and Share of one wear cycle per revolution = 14.01 %. That comes from the page's own defaults, entered in Teeth on the driver (or upper molar); change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Gear ratio is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
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
