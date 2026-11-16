<?php

/**
 * Headphone power
 * /everyday-life/headphone-power
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Headphone power',
    'meta' => ['title' => 'Headphone power — Formula, Steps & Examples', 'description' => 'Headphone power turns impedance (R) and dBSPL @ 1 V RMS into dBSPL @ 1 mW and Voltage (RMS). Results come back in mW, with any other unit a click away.', 'h1' => 'Headphone power Calculator', 'updated' => '2026-08-18'],
    'sections' => [
        [
            'title' => 'Headphone specifications',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'impedance',
                            'label' => 'Impedance (R)',
                            'type' => 'number',
                            'unit' => '78',
                            'unit_default' => 'ohm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dB1mW',
                            'label' => 'dBSPL @ 1 mW',
                            'type' => 'number',
                            'suffix' => 'dBSPL',
                            'help' => 'Headphone sensitivity. How loud the headphone is when driven at 1 milliwatt.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dB1V',
                            'label' => 'dBSPL @ 1 V RMS',
                            'type' => 'number',
                            'suffix' => 'dBSPL',
                            'help' => 'Headphone sensitivity. How loud the headphone is when driven at 1 volt (RMS).',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Output loudness',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'loudness',
                            'label' => 'Loudness (dBSPL)',
                            'type' => 'number',
                            'suffix' => 'dBSPL',
                            'help' => 'Maximum loudness. Keep in mind the real value may be higher or lower depending on the dynamic range of the sound you play through the headphones.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Amplifier parameters',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'power',
                            'label' => 'Power (average)',
                            'type' => 'number',
                            'unit' => '13',
                            'unit_default' => 'mW',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'voltage',
                            'label' => 'Voltage (RMS)',
                            'type' => 'number',
                            'unit' => '109',
                            'unit_default' => 'volt',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'current',
                            'label' => 'Current (RMS)',
                            'type' => 'number',
                            'unit' => '84',
                            'unit_default' => 'mA',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ampImpedance',
                            'label' => 'Amp impedance should be less than ',
                            'type' => 'number',
                            'help' => 'For impedance matching.',
                            'unit' => '78',
                            'unit_default' => 'ohm',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'voltage = one_way(sqrt(power*impedance/1000))',
            'results' => ['voltage' => '((1/100)*sqrt(10)*sqrt(impedance*(pow(10, -1/10*dB1mW + (1/10)*loudness))))'],
        ],
        [
            'title' => 'power = one_way(10^((loudness-dB1mW)/10))',
            'results' => ['power' => '(pow(10, -1/10*dB1mW + (1/10)*loudness))'],
        ],
        [
            'title' => 'dB1mW = dB1V + 10 * log10(impedance/1000)',
            'results' => ['dB1mW' => 'dB1V + 10*log10((1/1000)*impedance)', 'dB1V' => 'dB1mW - 10*log10((1/1000)*impedance)'],
        ],
        [
            'title' => 'current = one_way(voltage / impedance)',
            'results' => ['current' => '(((1/100)*sqrt(10)*sqrt(impedance*(pow(10, -1/10*dB1mW + (1/10)*loudness))))/impedance)'],
        ],
        [
            'title' => 'ampImpedance = one_way(impedance/8)',
            'results' => ['ampImpedance' => '((1/8)*impedance)'],
        ],
    ],
    'article' => [
        'intro' => '<strong>voltage (RMS)</strong> is what the Headphone power calculator works out, and it gets there from the impedance, the DBSPL @ 1 V RMS and the loudness.',
        'sections' => [
            ['title' => 'How does the Headphone power calculator work?', 'html' => <<<'TXT'
            <p>The Headphone power calculator takes the values in the form, applies the relationship described below and reports <strong>voltage (RMS)</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the impedance (R), the DBSPL @ 1 V RMS and the loudness (dBSPL).</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in ohms. The unit chip switches it to any of the 5 supported units.</li><li>A number, expressed in dBSPL.</li><li>A number, expressed in dBSPL.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Impedance (R)</strong></td><td>A measured quantity, 5 units available.</td><td>ohms</td><td>You supply it</td></tr><tr><td><strong>DBSPL @ 1 mW</strong></td><td>A number stated in dBSPL.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>DBSPL @ 1 V RMS</strong></td><td>A number stated in dBSPL.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Loudness (dBSPL)</strong></td><td>A number stated in dBSPL.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Power (average)</strong></td><td>A measured quantity, 21 units available.</td><td>milliwatts</td><td>Calculated</td></tr><tr><td><strong>Voltage (RMS)</strong></td><td>A measured quantity, 6 units available.</td><td>volts</td><td>Calculated</td></tr><tr><td><strong>Current (RMS)</strong></td><td>A measured quantity, 3 units available.</td><td>milliamperes</td><td>Calculated</td></tr><tr><td><strong>Amp impedance should be less than</strong></td><td>A measured quantity, 5 units available.</td><td>ohms</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Headphone power calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Voltage (RMS)</span><span class="formula-eq">=</span><span class="formula-rhs">((1 ÷ 100) × the square root of (10) × the square root of (impedance (R) × ((10, -1 ÷ 10 × DBSPL @ 1 mW + (1 ÷ 10) × loudness (dBSPL)))))</span></div><div class="formula-row"><span class="formula-lhs">Power (average)</span><span class="formula-eq">=</span><span class="formula-rhs">((10, -1 ÷ 10 × DBSPL @ 1 mW + (1 ÷ 10) × loudness (dBSPL)))</span></div><div class="formula-row"><span class="formula-lhs">DBSPL @ 1 mW</span><span class="formula-eq">=</span><span class="formula-rhs">DBSPL @ 1 V RMS + 10 × ((1 ÷ 1000) × impedance (R))</span></div><div class="formula-row"><span class="formula-lhs">Current (RMS)</span><span class="formula-eq">=</span><span class="formula-rhs">(((1 ÷ 100) × the square root of (10) × the square root of (impedance (R) × ((10, -1 ÷ 10 × DBSPL @ 1 mW + (1 ÷ 10) × loudness (dBSPL))))) ÷ impedance (R))</span></div><div class="formula-row"><span class="formula-lhs">Amp impedance should be less than</span><span class="formula-eq">=</span><span class="formula-rhs">((1 ÷ 8) × impedance (R))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Impedance (R)</strong> = 10 Ω and <strong>Loudness (dBSPL)</strong> = 10. The calculator returns <strong>Amp impedance should be less than</strong> = 1 Ω.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Amp impedance should be less than</strong> = 1 Ω should be roughly the size you expected from <strong>Impedance (R)</strong> = 10 Ω and <strong>Loudness (dBSPL)</strong> = 10.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in volts, and convertible to any of the 6 units on that chip.</li><li>Shown in milliwatts, and convertible to any of the 21 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in milliamperes, and convertible to any of the 3 units on that chip.</li><li>Shown in ohms, and convertible to any of the 5 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Resistance – ohms, opening in ohms</li><li>Power, opening in milliwatts</li><li>Voltage, opening in volts</li><li>Electric current – ampere, opening in milliamperes</li><li>Resistance – ohms, opening in ohms</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Headphone power calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 3 figures keep coming back — the impedance, the DBSPL @ 1 V RMS and the loudness — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/age-in-months">Age in months</a>, <a href="/everyday-life/age-in-seconds">Age in seconds</a> and <a href="/everyday-life/age-in-weeks">Age in weeks</a>.</p>
            TXT],
            ['title' => 'Estimating voltage and current for headphones', 'html' => <<<'TXT'
            <p>This calculator estimates electrical requirements from headphone impedance, sensitivity and a target sound-pressure level. Check which sensitivity basis the input uses: decibels SPL per milliwatt and decibels SPL per volt are different specifications. The page can convert between them using impedance, so entering a value under the wrong sensitivity label changes the result. Read the manufacturer’s data sheet carefully and note the test frequency and conditions if they are given.</p>
            <p>The target loudness input is a desired sound-pressure level, not the amplifier’s volume-knob position. The output voltage and power are derived from the sensitivity and impedance assumptions. A higher target level requires substantially more power because decibels are logarithmic. Use a realistic target for brief peaks and remember that recorded audio has dynamic variation; a single loudness value cannot describe every track.</p>
            <p>Headphone impedance is frequency-dependent, so a nominal value is an approximation. Actual amplifier output impedance, maximum voltage, current limits and distortion also affect whether a headphone can reach the calculated level cleanly. The page’s amplifier-impedance comparison is a rule of thumb, not proof that every amplifier and headphone combination will behave identically.</p>
            <p>RMS voltage and current are useful electrical quantities, but they do not guarantee perceived loudness. Fit, seal, ear anatomy, equalization, music dynamics and measurement method all influence the result. Sensitivity ratings from different manufacturers may not be directly comparable if their measurement standards differ. If a specification is missing or ambiguous, contact the maker rather than guessing.</p>
            <p>Do not treat a calculated maximum sound level as a recommended listening level. The calculator does not measure exposure duration, peaks, hearing protection or a user’s susceptibility to sound. Keep listening volume comfortable, take breaks and follow current hearing-health guidance. If you experience ringing, pain or hearing changes, stop listening and seek appropriate advice.</p>
            <p>For a practical check, compare the calculated voltage with the amplifier’s published output at the headphone’s impedance, not just its maximum power into a different load. Confirm that the device can supply the required voltage and current without clipping. Portable devices, desktop amplifiers and balanced outputs may have different limits.</p>
            <p>Use this result for a first-pass compatibility estimate, then verify the equipment specifications and listen at a safe level. It does not assess sound quality, amplifier compatibility in every condition or hearing safety.</p>
            TXT],
            ['title' => 'Read sensitivity units before comparing headphones', 'html' => <<<'TXT'
            <p>Manufacturers may quote sensitivity as dB SPL per milliwatt or dB SPL per volt. These figures cannot be compared directly without accounting for impedance. The calculator includes a conversion relationship between the two, so choose the field that matches the exact specification and unit printed on the manufacturer’s sheet. If the source only says “sensitivity” without stating its reference, do not assume which basis it uses.</p><p>For a given headphone, the requested sound-pressure level is compared with sensitivity to estimate the electrical power needed. Because decibel relationships are logarithmic, a small increase in target level can require a much larger power increase. This explains why a headphone that reaches a moderate level from a phone may need a different voltage for louder peaks. It does not mean that listening at that higher target is advisable.</p><p>Impedance is not a fixed value at every frequency for many headphones. A nominal impedance helps with a first-pass calculation, but the real load can vary across the audio spectrum. Amplifier output impedance, current capability, noise and clipping behavior also affect the practical result. Compare the calculator’s voltage and current with the amplifier’s specifications at the relevant load, not a marketing maximum measured under different conditions.</p><p>The output can help identify whether a source is likely to have enough voltage or power headroom, but it does not predict sound quality. Equalization, fit, seal and recording dynamics change perceived loudness. A target SPL entered into the form is an electrical calculation input, not a safe listening recommendation. Keep listening levels comfortable and consider duration and breaks.</p><p>When choosing between amplifiers, compare continuous output ratings and conditions, and check whether the manufacturer lists RMS voltage, peak voltage, power into a stated impedance or some other measure. Do not infer compatibility from the “amp impedance should be less than” rule alone; it is a guideline in the calculator, not a full analysis of output impedance, damping or noise.</p>
            TXT],
            ['title' => 'A careful compatibility workflow', 'html' => <<<'TXT'
            <p>Start with the headphone’s nominal impedance and the sensitivity specification that clearly states its reference. Enter the desired peak level only as a calculation scenario, then compare the required RMS voltage and current with the source’s documented output at that load. If the amplifier publishes only power into a different impedance, do not assume the rating transfers unchanged.</p><p>Check for manufacturer guidance on minimum load, balanced connections and output limits. A source may provide more voltage from one output than another, while current capability can constrain a low-impedance headphone. The calculator does not know those device-specific limits unless you include them in the form.</p><p>For listening, use a comfortable level and do not turn up volume to chase a number. The result is an electrical estimate based on sensitivity, not a measurement at the ear. Music peaks, equalization and fit can change exposure, so hearing safety requires more context than this page collects.</p>
            TXT],
            ['title' => 'Do not infer a safe level from the estimate', 'html' => <<<'TXT'
            <p>The calculator cannot account for listening duration, ear sensitivity or the level actually reaching the ear. Treat its sound-pressure target as a mathematical input only, and follow hearing-health guidance for everyday listening.</p>
            TXT],
            ['title' => 'Check published ratings at the correct load', 'html' => <<<'TXT'
            <p>Amplifier ratings depend on load impedance and output type. Compare the manufacturer’s figure at the headphone’s impedance, and avoid treating a maximum rating as a recommended everyday setting.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Headphone power calculator work out?', 'a' => 'It returns voltage (RMS), derived from the impedance, the DBSPL @ 1 V RMS and the loudness.'],
            ['q' => 'What do I need to enter to use the Headphone power calculator?', 'a' => 'The form asks for the impedance, the DBSPL @ 1 V RMS and the loudness, which is 3 fields in total.'],
            ['q' => 'Can I enter impedance (R) in a different unit?', 'a' => 'Yes. Impedance (R) opens in ohms and the chip beside it offers 5 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Amp impedance should be less than = 1 Ω.'],
        ],
        'related' => [
            ['path' => '/everyday-life/age-in-months', 'name' => 'Age in months'],
            ['path' => '/everyday-life/age-in-seconds', 'name' => 'Age in seconds'],
            ['path' => '/everyday-life/age-in-weeks', 'name' => 'Age in weeks'],
        ],
    ],
];
