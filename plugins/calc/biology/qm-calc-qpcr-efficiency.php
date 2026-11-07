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
    'meta' => ['title' => 'qPCR efficiency Calculator — Formula, Units & Example', 'description' => <<<'TXT'
    The qPCR efficiency calculator returns <strong>slope</strong> from the field on the form. The qPCR efficiency calculator takes the values in the form, applies…
    TXT, 'h1' => 'qPCR efficiency Calculator', 'updated' => '2026-08-10'],
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
        'intro' => 'The qPCR efficiency calculator returns <strong>slope</strong> from the field on the form.',
        'sections' => [
            ['title' => 'How does the qPCR efficiency calculator work?', 'html' => <<<'TXT'
            <p>The qPCR efficiency calculator takes the values in the form, applies the relationship described below and reports <strong>slope</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the QPCR efficiency.</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Slope</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Amplification factor</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>QPCR efficiency</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the qPCR efficiency calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Slope</span><span class="formula-eq">=</span><span class="formula-rhs">the natural log of (10) ÷ the natural log of (1 ÷ (QPCR efficiency + 1))</span></div><div class="formula-row"><span class="formula-lhs">Amplification factor</span><span class="formula-eq">=</span><span class="formula-rhs">(10 ^ -1 ÷ slope)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>%, opening in percent</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The qPCR efficiency calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Putting a biological quantity into a scale you can picture</li><li>Comparing two organisms, populations or processes</li><li>Supporting a lesson, a lecture or a field note</li><li>Any time the same 1 figures keep coming back — the QPCR efficiency — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the qPCR efficiency calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — QPCR efficiency for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these biology calculators cover the neighbouring steps: <a href="/biology/rabbit-cage-size">Rabbit cage size</a>, <a href="/biology/rabbit-color">Rabbit color</a> and <a href="/biology/rabbit-gestation">Rabbit gestation</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the qPCR efficiency calculator work out?', 'a' => <<<'TXT'
            It returns slope, derived from the QPCR efficiency. Every field in the form feeds the same relationship: press Calculate once and changing any of them updates the result immediately, with no page reload.
            TXT],
            ['q' => 'What do I need to enter to use the qPCR efficiency calculator?', 'a' => <<<'TXT'
            The form asks for the QPCR efficiency, which is a single field. Each one is labelled with what it means and, where relevant, the unit it expects. Anything you leave blank is treated as the value to solve for.
            TXT],
            ['q' => 'Can I enter QPCR efficiency in a different unit?', 'a' => <<<'TXT'
            Yes. QPCR efficiency opens in percent and the chip beside it offers 6 units. The number you typed keeps its magnitude and only its label changes; the calculation itself happens in a common base unit, so mixing systems in one form is safe.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Each variable in the relationship can be the one being solved for: fill in the answer you are aiming at, leave the field you want empty, and the calculator inverts the equation for you.
            TXT],
            ['q' => 'What is a typical result?', 'a' => <<<'TXT'
            With the values the page starts from, the calculator reports Slope = -24.1589. Treat that as a reference point rather than a recommendation: it exists so you can tell at a glance whether your own inputs are on the same scale.
            TXT],
            ['q' => 'Is the qPCR efficiency calculator free to use?', 'a' => 'Yes — no account, no sign-up and no limit on how many times you run it. The arithmetic happens in your browser, so the values you type are not sent anywhere.'],
        ],
        'related' => [
            ['path' => '/biology/rabbit-cage-size', 'name' => 'Rabbit cage size'],
            ['path' => '/biology/rabbit-color', 'name' => 'Rabbit color'],
            ['path' => '/biology/rabbit-gestation', 'name' => 'Rabbit gestation'],
        ],
    ],
];
