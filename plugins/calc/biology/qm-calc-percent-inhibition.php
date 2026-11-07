<?php

/**
 * Percent Inhibition Calculator
 * /biology/percent-inhibition
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Percent Inhibition Calculator',
    'meta' => ['title' => 'Percent Inhibition Calculator — Formula & Results', 'description' => 'Percent inhibition compares a treated sample with an untreated control, and there are two conventions in use: relative to the control signal, and relative to', 'h1' => 'Percent Inhibition Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'control',
                            'label' => 'Control signal',
                            'type' => 'number',
                            'suffix' => 'AU',
                            'help' => 'Untreated wells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1.2',
                        ],
                        [
                            'name' => 'sample',
                            'label' => 'Sample signal',
                            'type' => 'number',
                            'suffix' => 'AU',
                            'help' => 'Treated wells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.45',
                        ],
                        [
                            'name' => 'blank',
                            'label' => 'Blank / background',
                            'type' => 'number',
                            'suffix' => 'AU',
                            'help' => 'No-enzyme or no-cell wells',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.05',
                        ],
                        [
                            'name' => 'inhibition',
                            'label' => 'Percent inhibition',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'remaining',
                            'label' => 'Percent of control remaining',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'window',
                            'label' => 'Percent of signal window',
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
            'title' => 'Inhibition',
            'results' => ['inhibition' => '(control-sample)/(control-blank)*100', 'remaining' => 'sample/control*100', 'window' => '(sample-blank)/(control-blank)*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Percent Inhibition takes Control signal, Sample signal and Blank / background and returns Percent inhibition and Percent of control remaining. Nothing is looked up on this page: Percent inhibition is computed from Control signal and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Percent inhibition is opened in %; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Percent Inhibition calculator works', 'html' => <<<'TXT'
            <p>Percent Inhibition answers one question from 3 numbers, and the answer is Percent inhibition, Percent of control remaining and Percent of signal window.</p><p>Written with the labels from the form, Percent inhibition = (Control signal − Sample signal) ÷ (Control signal − Blank / background) × 100.</p><p>What comes back is Percent inhibition, Percent of control remaining and Percent of signal window — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Control signal</strong> — in AU. Untreated wells</li><li><strong>Sample signal</strong> — in AU. Treated wells</li><li><strong>Blank / background</strong> — in AU. No-enzyme or no-cell wells</li></ul><p>The answers come back as Percent inhibition in %, Percent of control remaining in %, Percent of signal window in %. </p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Control signal = 1.2 AU, Sample signal = 0.45 AU and Blank / background = 0.05 AU; the answers are &lt;strong&gt;Percent inhibition&lt;/strong&gt; = 65.22 %, &lt;strong&gt;Percent of control remaining&lt;/strong&gt; = 37.5 % and &lt;strong&gt;Percent of signal window&lt;/strong&gt; = 34.78 %.</p><ul><li><strong>Percent inhibition</strong> = 65.22 %</li><li><strong>Percent of control remaining</strong> = 37.5 %</li><li><strong>Percent of signal window</strong> = 34.78 %</li></ul><p>That is <strong>Percent inhibition</strong> = <code>(Control signal − Sample signal) ÷ (Control signal − Blank / background) × 100</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Percent inhibition&lt;/strong&gt; = 65.22, &lt;strong&gt;Percent of control remaining&lt;/strong&gt; = 37.5 and &lt;strong&gt;Percent of signal window&lt;/strong&gt; = 34.78 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Percent inhibition takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Percent inhibition</strong> = <code>(Control signal − Sample signal) ÷ (Control signal − Blank / background) × 100</code></li><li><strong>Percent of control remaining</strong> = <code>Sample signal ÷ Control signal × 100</code></li><li><strong>Percent of signal window</strong> = <code>(Sample signal − Blank / background) ÷ (Control signal − Blank / background) × 100</code></li></ul><p>Any one of Percent inhibition, Percent of control remaining and Percent of signal window can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Control signal, from 1.2 to 2.4 — and the answers go from &lt;strong&gt;Percent inhibition&lt;/strong&gt; 65.22 %, &lt;strong&gt;Percent of control remaining&lt;/strong&gt; 37.5 % and &lt;strong&gt;Percent of signal window&lt;/strong&gt; 34.78 % to &lt;strong&gt;Percent inhibition&lt;/strong&gt; 82.98 %, &lt;strong&gt;Percent of control remaining&lt;/strong&gt; 18.75 % and &lt;strong&gt;Percent of signal window&lt;/strong&gt; 17.02 %.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Percent inhibition, Percent of control remaining and Percent of signal window are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> If Control signal is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Control signal, Sample signal and Blank / background measured, Percent inhibition and Percent of control remaining wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/bod-load">BOD Load Calculator</a>, <a href="/biology/bone-length-to-body-height">Bone Length to Body Height Calculator</a> and <a href="/biology/bradford-assay-calculator">Bradford Assay (standard curve) Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Percent Inhibition calculator work out?', 'a' => <<<'TXT'
            Percent inhibition, Percent of control remaining and Percent of signal window, from Control signal, Sample signal and Blank / background. The relationship is Percent inhibition = (Control signal − Sample signal) ÷ (Control signal − Blank / background) × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Control signal (AU), Sample signal (AU), Blank / background (AU). Fill control, sample and blank and leave Percent inhibition empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Percent inhibition, Percent of control remaining and Percent of signal window blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Percent inhibition = 65.22 %, Percent of control remaining = 37.5 % and Percent of signal window = 34.78 %. Those are the defaults written into the form — move Control signal and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Percent inhibition is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Control signal blank and the page solves for it, reporting Percent inhibition instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Percent inhibition at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/bod-load', 'name' => 'BOD Load Calculator'],
            ['path' => '/biology/bone-length-to-body-height', 'name' => 'Bone Length to Body Height Calculator'],
            ['path' => '/biology/bradford-assay-calculator', 'name' => 'Bradford Assay (standard curve) Calculator'],
        ],
        'authors' => [],
    ],
];
