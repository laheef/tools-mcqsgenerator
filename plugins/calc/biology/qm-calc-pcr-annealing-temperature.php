<?php

/**
 * PCR Annealing Temperature Calculator
 * /biology/pcr-annealing-temperature
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'PCR Annealing Temperature Calculator',
    'meta' => ['title' => 'PCR Annealing Temperature Calculator — Biology', 'description' => <<<'TXT'
    It is a single relationship that reads Annealing temperature out of Forward primer Tm, not a table of canned results keyed by them. 3–5 °C is standardProduct…
    TXT, 'h1' => 'PCR Annealing Temperature Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'tm_f',
                            'label' => 'Forward primer Tm',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'tm_r',
                            'label' => 'Reverse primer Tm',
                            'type' => 'number',
                            'suffix' => '°C',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '60',
                        ],
                        [
                            'name' => 'offset',
                            'label' => 'Offset below the lower Tm',
                            'type' => 'number',
                            'suffix' => '°C',
                            'help' => '3–5 °C is standard',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                        [
                            'name' => 'product',
                            'label' => 'Product length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '400',
                        ],
                        [
                            'name' => 'ta',
                            'label' => 'Annealing temperature',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gradient_low',
                            'label' => 'Gradient low',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gradient_high',
                            'label' => 'Gradient high',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tm_gap',
                            'label' => 'Tm difference',
                            'type' => 'number',
                            'suffix' => '°C',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'extension_s',
                            'label' => 'Extension time (Taq, 1 min per kb)',
                            'type' => 'number',
                            'suffix' => 's',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cycles_time',
                            'label' => 'Cycling time for 30 cycles',
                            'type' => 'number',
                            'suffix' => 'min',
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
            'title' => 'Annealing',
            'results' => [
                'ta' => 'min(tm_f,tm_r)-offset',
                'gradient_low' => 'min(tm_f,tm_r)-offset-3',
                'gradient_high' => 'min(tm_f,tm_r)-offset+3',
                'tm_gap' => 'max(tm_f,tm_r)-min(tm_f,tm_r)',
                'extension_s' => 'max(15,product/1000*60)',
                'cycles_time' => '30*(max(tm_f,tm_r)-min(tm_f,tm_r)+max(15,product/1000*60))/60',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Forward primer Tm, Reverse primer Tm and Offset below the lower Tm into PCR Annealing Temperature and the answer comes back as Annealing temperature and Gradient low. It is a single relationship that reads Annealing temperature out of Forward primer Tm, not a table of canned results keyed by them. Units for Annealing temperature default to °C and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the PCR Annealing Temperature calculator works', 'html' => <<<'TXT'
            <p>PCR Annealing Temperature answers one question from 4 numbers, and the answer is Annealing temperature, Gradient low and Gradient high.</p><p>Written with the labels from the form, Annealing temperature = min(Forward primer Tm,Reverse primer Tm) − Offset below the lower Tm.</p><p>What comes back is Annealing temperature, Gradient low, Gradient high and Tm difference — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Forward primer Tm</strong> — in °C</li><li><strong>Reverse primer Tm</strong> — in °C</li><li><strong>Offset below the lower Tm</strong> — in °C. 3–5 °C is standard</li><li><strong>Product length</strong> — in bp</li></ul><p>The answers come back as Annealing temperature in °C, Gradient low in °C, Gradient high in °C, Tm difference in °C, Extension time (Taq, 1 min per kb) in s, Cycling time for 30 cycles in min. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Forward primer Tm = 60 °C, Reverse primer Tm = 60 °C, Offset below the lower Tm = 5 °C and Product length = 400 bp; the answers are &lt;strong&gt;Annealing temperature&lt;/strong&gt; = 55 °C, &lt;strong&gt;Gradient low&lt;/strong&gt; = 52 °C, &lt;strong&gt;Gradient high&lt;/strong&gt; = 58 °C, &lt;strong&gt;Tm difference&lt;/strong&gt; = 0 °C, &lt;strong&gt;Extension time (Taq, 1 min per kb)&lt;/strong&gt; = 24 s and &lt;strong&gt;Cycling time for 30 cycles&lt;/strong&gt; = 12 min.</p><ul><li><strong>Annealing temperature</strong> = 55 °C</li><li><strong>Gradient low</strong> = 52 °C</li><li><strong>Gradient high</strong> = 58 °C</li><li><strong>Tm difference</strong> = 0 °C</li><li><strong>Extension time (Taq, 1 min per kb)</strong> = 24 s</li><li><strong>Cycling time for 30 cycles</strong> = 12 min</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Annealing temperature</strong> = <code>min(Forward primer Tm,Reverse primer Tm) − Offset below the lower Tm</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Annealing temperature&lt;/strong&gt; = 55, &lt;strong&gt;Gradient low&lt;/strong&gt; = 52, &lt;strong&gt;Gradient high&lt;/strong&gt; = 58, &lt;strong&gt;Tm difference&lt;/strong&gt; = 0, &lt;strong&gt;Extension time (Taq, 1 min per kb)&lt;/strong&gt; = 24 and &lt;strong&gt;Cycling time for 30 cycles&lt;/strong&gt; = 12. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Annealing temperature is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Annealing temperature</strong> = <code>min(Forward primer Tm,Reverse primer Tm) − Offset below the lower Tm</code></li><li><strong>Gradient low</strong> = <code>min(Forward primer Tm,Reverse primer Tm) − Offset below the lower Tm − 3</code></li><li><strong>Gradient high</strong> = <code>min(Forward primer Tm,Reverse primer Tm) − Offset below the lower Tm + 3</code></li><li><strong>Tm difference</strong> = <code>max(Forward primer Tm,Reverse primer Tm) − min(Forward primer Tm,Reverse primer Tm)</code></li><li><strong>Extension time (Taq, 1 min per kb)</strong> = <code>max(15,Product length ÷ 1000 × 60)</code></li><li><strong>Cycling time for 30 cycles</strong> = <code>30 × (max(Forward primer Tm,Reverse primer Tm) − min(Forward primer Tm,Reverse primer Tm) + max(15,Product length ÷ 1000 × 60)) ÷ 60</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Annealing temperature</strong> = <code>min(Forward primer Tm,Reverse primer Tm) − Offset below the lower Tm</code> — the form to use when Forward primer Tm, Reverse primer Tm and Offset below the lower Tm are the values you have.</li><li><strong>Gradient low</strong> = <code>min(Forward primer Tm,Reverse primer Tm) − Offset below the lower Tm − 3</code> — the form to use when Forward primer Tm, Reverse primer Tm and Offset below the lower Tm are the values you have.</li><li><strong>Gradient high</strong> = <code>min(Forward primer Tm,Reverse primer Tm) − Offset below the lower Tm + 3</code> — the form to use when Forward primer Tm, Reverse primer Tm and Offset below the lower Tm are the values you have.</li><li><strong>Tm difference</strong> = <code>max(Forward primer Tm,Reverse primer Tm) − min(Forward primer Tm,Reverse primer Tm)</code> — the form to use when Forward primer Tm and Reverse primer Tm are the values you have.</li><li><strong>Extension time (Taq, 1 min per kb)</strong> = <code>max(15,Product length ÷ 1000 × 60)</code> — the form to use when Product length are the values you have.</li><li><strong>Cycling time for 30 cycles</strong> = <code>30 × (max(Forward primer Tm,Reverse primer Tm) − min(Forward primer Tm,Reverse primer Tm) + max(15,Product length ÷ 1000 × 60)) ÷ 60</code> — the form to use when Forward primer Tm, Reverse primer Tm and Product length are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Annealing temperature, Gradient low and Gradient high can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Forward primer Tm from 60 to 120, leaving every other box alone. The panel moves from &lt;strong&gt;Annealing temperature&lt;/strong&gt; 55 °C, &lt;strong&gt;Gradient low&lt;/strong&gt; 52 °C, &lt;strong&gt;Gradient high&lt;/strong&gt; 58 °C, &lt;strong&gt;Tm difference&lt;/strong&gt; 0 °C, &lt;strong&gt;Extension time (Taq, 1 min per kb)&lt;/strong&gt; 24 s and &lt;strong&gt;Cycling time for 30 cycles&lt;/strong&gt; 12 min to &lt;strong&gt;Annealing temperature&lt;/strong&gt; 55 °C, &lt;strong&gt;Gradient low&lt;/strong&gt; 52 °C, &lt;strong&gt;Gradient high&lt;/strong&gt; 58 °C, &lt;strong&gt;Tm difference&lt;/strong&gt; 60 °C, &lt;strong&gt;Extension time (Taq, 1 min per kb)&lt;/strong&gt; 24 s and &lt;strong&gt;Cycling time for 30 cycles&lt;/strong&gt; 42 min.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Annealing temperature, Gradient low and Gradient high are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Forward primer Tm left as a guess.</strong> Anything typed into Forward primer Tm is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Reverse primer Tm left as a guess.</strong> Anything typed into Reverse primer Tm is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Offset below the lower Tm left as a guess.</strong> Anything typed into Offset below the lower Tm is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Forward primer Tm and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the PCR Annealing Temperature form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Forward primer Tm</strong> is measured in °C. Change it and Annealing temperature, Gradient low and Gradient high changes with it. Fill it from a measurement rather than a memory — Forward primer Tm is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Reverse primer Tm</strong> is measured in °C. Change it and Annealing temperature, Gradient low and Gradient high changes with it. Fill it from a measurement rather than a memory — Reverse primer Tm is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Offset below the lower Tm</strong> is measured in °C. 3–5 °C is standard. Change it and Annealing temperature, Gradient low and Gradient high changes with it. Fill it from a measurement rather than a memory — Offset below the lower Tm is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Product length</strong> is measured in bp. Change it and Extension time (Taq, 1 min per kb) and Cycling time for 30 cycles changes with it. Fill it from a measurement rather than a memory — Product length is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Annealing temperature is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Forward primer Tm, Reverse primer Tm and Offset below the lower Tm measured, Annealing temperature and Gradient low wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/mitotic-index">Mitotic Index Calculator</a>, <a href="/biology/mlvss">Mixed liquor volatile suspended solids Calculator</a> and <a href="/biology/mouse-to-human-age">Mouse to Human Age Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what PCR Annealing Temperature is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Forward primer Tm, Reverse primer Tm, Offset below the lower Tm and Product length beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the PCR Annealing Temperature calculator work out?', 'a' => <<<'TXT'
            Annealing temperature, Gradient low, Gradient high and Tm difference, from Forward primer Tm, Reverse primer Tm and Offset below the lower Tm. The relationship is Annealing temperature = min(Forward primer Tm,Reverse primer Tm) − Offset below the lower Tm.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Forward primer Tm (°C), Reverse primer Tm (°C), Offset below the lower Tm (°C), Product length (bp). Fill tm_f, tm_r and offset and leave Annealing temperature empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Annealing temperature, Gradient low, Gradient high and Tm difference can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Annealing temperature = 55 °C, Gradient low = 52 °C, Gradient high = 58 °C, Tm difference = 0 °C, Extension time (Taq, 1 min per kb) = 24 s and Cycling time for 30 cycles = 12 min. The figures come from Forward primer Tm as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Annealing temperature is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Forward primer Tm blank and the page solves for it, reporting Annealing temperature instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Annealing temperature keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/mitotic-index', 'name' => 'Mitotic Index Calculator'],
            ['path' => '/biology/mlvss', 'name' => 'Mixed liquor volatile suspended solids Calculator'],
            ['path' => '/biology/mouse-to-human-age', 'name' => 'Mouse to Human Age Calculator'],
        ],
        'authors' => [],
    ],
];
