<?php

/**
 * qPCR efficiency
 * /biology/qpcr-efficiency
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'qPCR efficiency',
    'meta' => ['title' => 'qPCR efficiency Calculator — Formula, Units & Example', 'description' => 'A value of 3.322 would equal precisely 100% PCR efficiency.Amplification factor — a plain number, no unit. This is the PCR efficiency expressed as a ratio.', 'h1' => 'qPCR efficiency Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'slope',
                            'label' => 'Slope',
                            'type' => 'number',
                            'help' => 'This is the slope of the standard curve of the dilution you run. A value of 3.322 would equal precisely 100% PCR efficiency.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Amplification_factor',
                            'label' => 'Amplification factor',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            This is the PCR efficiency expressed as a ratio. A value of two equals 100% efficiency because DNA has two strands, and at maximum, a target sequence can double each cycle.&nbsp;
                            TXT,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Efficiency',
                            'label' => 'qPCR efficiency',
                            'type' => 'number',
                            'help' => 'PCR performance as a percentage. 100% equals full efficiency, meaning the doubling of the target DNA at each PCR cycle (-1/log(2)).',
                            'unit' => '37',
                            'unit_default' => 'perc',
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
            'title' => 'Efficiency = -1 + 10^(-1/slope)',
            'results' => ['slope' => 'log(10)/log(1/(Efficiency + 1))', 'Efficiency' => '-1 + pow(10, -1/slope)'],
        ],
        [
            'title' => 'Amplification_factor = 10^(-1/slope)',
            'results' => ['Amplification_factor' => 'pow(10, -1/slope)', 'slope' => 'log(10)/log(1/Amplification_factor)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        qPCR efficiency turns Slope and Amplification factor into qPCR efficiency. The arithmetic is the whole method: qPCR efficiency is worked out from Slope by one formula, applied once. qPCR efficiency comes back in percent unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the qPCR efficiency calculator works', 'html' => <<<'TXT'
            <p>qPCR efficiency answers one question from 2 numbers, and the answer is qPCR efficiency.</p><p>The relationship it solves reads Slope = ln(10) ÷ ln(1 ÷ (qPCR efficiency + 1)).</p><p>The answers are qPCR efficiency; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 2 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Slope</strong> — a plain number, no unit. This is the slope of the standard curve of the dilution you run. A value of 3.322 would equal precisely 100% PCR efficiency.</li><li><strong>Amplification factor</strong> — a plain number, no unit. This is the PCR efficiency expressed as a ratio. A value of two equals 100% efficiency because DNA has two strands, and at maximum, a target sequence can double each cycle.&amp;nbsp;</li></ul><p>The result box is qPCR efficiency in percent. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Slope = 10 gives &lt;strong&gt;qPCR efficiency&lt;/strong&gt; = -0.2057 perc and &lt;strong&gt;Amplification factor&lt;/strong&gt; = 0.7943.</p><ul><li><strong>qPCR efficiency</strong> = -0.2057 perc</li><li><strong>Amplification factor</strong> = 0.7943</li></ul><p>That is <strong>Slope</strong> = <code>ln(10) ÷ ln(1 ÷ (qPCR efficiency + 1))</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;qPCR efficiency&lt;/strong&gt; = -0.2057 and &lt;strong&gt;Amplification factor&lt;/strong&gt; = 0.7943 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: qPCR efficiency offers 6 units and opens on percent, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Slope</strong> = <code>ln(10) ÷ ln(1 ÷ (qPCR efficiency + 1))</code></li><li><strong>qPCR efficiency</strong> = <code>− 1 + (10)^(− 1 ÷ Slope)</code></li><li><strong>Amplification factor</strong> = <code>(10)^(− 1 ÷ Slope)</code></li></ul><p>Any one of Slope, qPCR efficiency and Amplification factor can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Slope, from 10 to 20 — and the answers go from &lt;strong&gt;qPCR efficiency&lt;/strong&gt; -0.2057 perc and &lt;strong&gt;Amplification factor&lt;/strong&gt; 0.7943 to &lt;strong&gt;qPCR efficiency&lt;/strong&gt; -0.1087 perc and &lt;strong&gt;Amplification factor&lt;/strong&gt; 0.8913.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with qPCR efficiency is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Slope is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Slope and Amplification factor is what you already know and qPCR efficiency is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dry-matter">Dry matter Calculator</a>, <a href="/biology/dry-matter-intake">Dry Matter Intake Calculator</a> and <a href="/biology/dsdna-ug-to-pmol">dsDNA µg to pmol Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the qPCR efficiency calculator work out?', 'a' => 'qPCR efficiency, from qPCR efficiency. The relationship is Slope = ln(10) ÷ ln(1 ÷ (qPCR efficiency + 1)).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Slope, Amplification factor. With slope and Amplification_factor in place, qPCR efficiency can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Slope, qPCR efficiency and Amplification factor blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            qPCR efficiency = -0.2057 perc and Amplification factor = 0.7943. That comes from the page's own defaults, entered in Slope; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally qPCR efficiency is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Slope blank and the page solves for it, reporting qPCR efficiency instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to qPCR efficiency at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/dry-matter', 'name' => 'Dry matter Calculator'],
            ['path' => '/biology/dry-matter-intake', 'name' => 'Dry Matter Intake Calculator'],
            ['path' => '/biology/dsdna-ug-to-pmol', 'name' => 'dsDNA µg to pmol Calculator'],
        ],
        'authors' => [],
    ],
];
