<?php

/**
 * Spindle speed
 * /construction/spindle-speed
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Spindle speed',
    'meta' => ['title' => 'Spindle Speed Calculator: RPM from Cutting Speed', 'description' => 'Convert a cutting speed in surface feet per minute into spindle RPM for a given tool diameter, with the metric surface speed. The formula and units are shown.', 'h1' => 'Spindle speed', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'sfm',
                    'label' => 'Cutting speed',
                    'type' => 'number',
                    'suffix' => 'ft/min',
                    'default' => '300',
                    'help' => 'Surface speed for the material',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'diameter',
                    'label' => 'Tool diameter',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.5',
                    'help' => 'Cutter or drill',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rpm',
                    'label' => 'Spindle speed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'rpm',
                ],
                [
                    'name' => 'surface_m_min',
                    'label' => 'Cutting speed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm/min',
                ],
                [
                    'name' => 'rpm_per_sfm',
                    'label' => 'RPM per SFM',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'rpm',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Spindle speed',
            'results' => [
                'rpm' => '12*sfm/(pi*diameter)',
                'surface_m_min' => 'sfm*0.3048',
                'rpm_per_sfm' => '12/(pi*diameter)',
                'sfm' => 'pi*diameter*rpm/12',
                'diameter' => '12*sfm/(pi*rpm)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>RPM = 12 × SFM ÷ (π × diameter)</strong>.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Cutting speed is a property of the material and the tool, and it is quoted at the cutting edge, in feet per minute. The spindle turns at revolutions per minute, so a small cutter has to turn much faster than a large one to give the edge the same surface speed.</p><p>The page reports <strong>spindle speed and cutting speed and rPM per SFM</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Spindle speed</strong></td><td><code>12 × Cutting speed ÷ (pi × Tool diameter)</code></td></tr><tr><td><strong>Cutting speed</strong></td><td><code>Cutting speed × 0.3048</code></td></tr><tr><td><strong>RPM per SFM</strong></td><td><code>12 ÷ (pi × Tool diameter)</code></td></tr><tr><td><strong>Cutting speed</strong></td><td><code>pi × Tool diameter × Spindle speed ÷ 12</code></td></tr><tr><td><strong>Tool diameter</strong></td><td><code>12 × Cutting speed ÷ (pi × Spindle speed)</code></td></tr></tbody></table><p><p>The circumference of the tool is pi times the diameter in inches, so twelve inches of travel per foot divide through: revolutions a minute is twelve times the surface speed divided by the circumference in inches. Halving the diameter doubles the RPM for the same cut.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports spindle speed and cutting speed and rPM per SFM.</p><ul><li><strong>Cutting speed</strong> — in ft/min. Surface speed for the material</li><li><strong>Tool diameter</strong> — in in. Cutter or drill</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Spindle speed</strong> — in rpm</li><li><strong>Cutting speed</strong> — in m/min</li><li><strong>RPM per SFM</strong> — in rpm</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Cutting speed = 300 ft/min, Tool diameter = 0.5 in — and the results panel reads:</p><ul><li><strong>Spindle speed</strong> = <code>12 × Cutting speed ÷ (pi × Tool diameter)</code> = <strong>2 291.831 rpm</strong></li><li><strong>Cutting speed</strong> = <code>Cutting speed × 0.3048</code> = <strong>91.44 m/min</strong></li><li><strong>RPM per SFM</strong> = <code>12 ÷ (pi × Tool diameter)</code> = <strong>7.639 rpm</strong></li></ul><p>With the numbers written into the formula, the first result is <code>12 × 300 ÷ (pi × 0.5) = 2 291.831</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 0.5 in cutter at 300 ft/min runs at 2 291.831 rpm, which is 91.44 m/min in metric terms — about 7.639 revolutions for every foot a minute of surface speed.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the RPM against the machine's maximum: a small end mill in aluminium often wants more speed than a manual mill can give. Burning the edge rather than cutting it is the sign that the surface speed is too high.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Spindle speed</th><th>Cutting speed</th><th>RPM per SFM</th></tr></thead><tbody><tr><td><strong>Cutting speed</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Tool diameter</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Cutting speed</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Tool diameter</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Cutting speed = 100, Tool diameter = 1, the page reports <strong>Spindle speed</strong> = 381.972 rpm, <strong>Cutting speed</strong> = 30.48 m/min, <strong>RPM per SFM</strong> = 3.82 rpm. Mild steel with a one inch cutter: a slow, steady speed.</li><li>With Cutting speed = 500, Tool diameter = 0.25, the page reports <strong>Spindle speed</strong> = 7 639.437 rpm, <strong>Cutting speed</strong> = 152.4 m/min, <strong>RPM per SFM</strong> = 15.279 rpm. Aluminium with a quarter inch cutter: a high spindle speed.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Diameter in millimetres.</strong> The form wants inches.</li><li><strong>Feed confused with speed.</strong> Feed is inches a minute.</li><li><strong>Tool runout ignored.</strong> It limits the speed in practice.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Spindle speed (rpm), Cutting speed (m/min), RPM per SFM (rpm).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Cutting speed in feet per minute and metres per minute, diameter in inches, spindle speed in revolutions per minute.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need cutting speed and tool diameter. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Spindle speed and cutting speed and rpm per sfm should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Cutting speed</strong> ×10</td><td>2 291.831</td><td>22 918.312</td><td>ten times larger</td></tr><tr><td><strong>Tool diameter</strong> ×10</td><td>2 291.831</td><td>229.183</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Nominal speed.</strong> Rigidity and coolant decide the real limit.</li><li><strong>No feed calculation.</strong> Chip load is a separate sheet.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Setting a mill or a drill press.</li></li><li><li>Converting a tool supplier's chart.</li></li><li><li>Checking a machinist's numbers.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/material-removal-rate">Material removal rate</a> <a href="/construction/taper">Taper</a> <a href="/construction/k-factor">K-factor</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Spindle speed calculator work out?', 'a' => <<<'TXT'
            It returns spindle speed and cutting speed and rPM per SFM from cutting speed and tool diameter. The relationship is 12 × Cutting speed ÷ (pi × Tool diameter).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Cutting speed (ft/min), Tool diameter (in). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: cutting speed in ft/min; tool diameter in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What RPM for a half inch drill in steel?', 'a' => 'About two thousand three hundred at three hundred surface feet a minute.'],
            ['q' => 'Why does a smaller cutter need more RPM?', 'a' => 'Because the surface speed is set at the edge, and a smaller circle has less circumference.'],
        ],
        'related' => [
            ['path' => '/construction/material-removal-rate', 'name' => 'Material removal rate'],
            ['path' => '/construction/taper', 'name' => 'Taper'],
            ['path' => '/construction/k-factor', 'name' => 'K-factor'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
