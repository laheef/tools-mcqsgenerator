<?php

/**
 * Boost horsepower
 * /everyday-life/boost-horsepower
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Boost horsepower',
    'meta' => ['title' => 'Boost horsepower — Formula, Steps & Examples', 'description' => 'Boost horsepower works out boosted engine power from current engine power. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Boost horsepower Calculator', 'updated' => '2026-08-22'],
    'sections' => [
        [
            'title' => 'Horsepower boost',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'currentPower',
                            'label' => 'Current engine power',
                            'type' => 'number',
                            'help' => 'The power currently produced by your naturally aspirated engine.',
                            'unit' => '13',
                            'unit_default' => 'hp_m',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'psi',
                            'label' => 'Boost added',
                            'type' => 'number',
                            'help' => 'The boost you want your supercharger to produce.',
                            'unit' => '46',
                            'unit_default' => 'psi',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'boostedPower',
                            'label' => 'Boosted engine power',
                            'type' => 'number',
                            'help' => 'The power produced by your engine with supercharger.',
                            'unit' => '13',
                            'unit_default' => 'hp_m',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'boostedPower = currentPower * ((psi + 14.7) / 14.7)',
            'results' => ['psi' => '(147/10)*(boostedPower - currentPower)/currentPower', 'boostedPower' => '(1/147)*currentPower*(10*psi + 147)', 'currentPower' => '147*boostedPower/(10*psi + 147)'],
        ],
    ],
    'article' => [
        'intro' => 'Give the Boost horsepower calculator the current engine power and the boosted engine power and it returns <strong>boost added</strong>.',
        'sections' => [
            ['title' => 'How does the Boost horsepower calculator work?', 'html' => <<<'TXT'
            <p>The Boost horsepower calculator takes the values in the form, applies the relationship described below and reports <strong>boost added</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in the current engine power and the boosted engine power.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in mechanical horsepowers. The unit chip switches it to any of the 21 supported units.</li><li>A measured quantity, entered by default in mechanical horsepowers. The unit chip switches it to any of the 21 supported units.</li></ul>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Current engine power</strong></td><td>A measured quantity, 21 units available.</td><td>mechanical horsepowers</td><td>You supply it</td></tr><tr><td><strong>Boost added</strong></td><td>A measured quantity, 28 units available.</td><td>pounds per square inch</td><td>Calculated</td></tr><tr><td><strong>Boosted engine power</strong></td><td>A measured quantity, 21 units available.</td><td>mechanical horsepowers</td><td>You supply it</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Boost horsepower calculator', 'html' => <<<'TXT'
            <p>One relationship drives the whole page:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Boost added</span><span class="formula-eq">=</span><span class="formula-rhs">(147 ÷ 10) × (boosted engine power − current engine power) ÷ current engine power</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in pounds per square inch, and convertible to any of the 28 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Power, opening in mechanical horsepowers</li><li>Pressure, opening in pounds per square inch</li><li>Power, opening in mechanical horsepowers</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Boost horsepower calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Any time the same 2 figures keep coming back — the current engine power and the boosted engine power — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Boost horsepower calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — current engine power for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/shoe-size-conversion">Shoe size conversion</a>, <a href="/everyday-life/shoelace-length">Shoelace length</a> and <a href="/everyday-life/shower-cost">Shower cost</a>.</p>
            TXT],
            ['title' => 'What the boost-to-power relationship assumes', 'html' => <<<'TXT'
            <p>The Boost horsepower calculator estimates boosted engine power from current power and gauge boost using a simple pressure-ratio relationship. The page’s formula treats absolute manifold pressure as atmospheric pressure plus gauge boost, then scales the current power in proportion to that ratio. It uses a nominal atmospheric pressure of 14.7 psi. This is an idealized estimate, not a dyno prediction.</p>
            <p>Gauge boost is pressure above local atmospheric pressure, while the engine responds to absolute pressure. That is why the formula adds atmospheric pressure before forming a ratio. The 14.7 psi constant represents a standard sea-level approximation; actual atmospheric pressure changes with altitude and weather. If the calculator does not accept local atmospheric pressure, its result may differ from an estimate based on the site where the vehicle operates.</p>
            <p>Real engines do not convert every increase in manifold pressure into proportional power. Compressor heating, intercooler efficiency, volumetric efficiency, ignition timing, fuel supply, exhaust backpressure, engine speed and mechanical limits all affect output. Detonation, charge temperature and tuning can constrain usable boost. The formula does not model turbocharger efficiency, engine breathing or safety margins.</p>
            <p>Use the calculator to understand the pressure-ratio idea or compare theoretical scenarios, not to choose a boost target. A change in boost can require changes to fueling, cooling, ignition, hardware and calibration. Increasing boost without verifying the engine and fuel system can cause damage or unsafe operation.</p>
            <p>Keep current horsepower and boosted horsepower on the same basis—both crankshaft or both wheel horsepower. Do not compare a wheel figure with a crank estimate as if the only difference were boost. If the input power came from a dyno, note the test conditions and whether corrections were applied.</p>
            <p>For a modified vehicle, rely on a qualified tuner, suitable instrumentation and manufacturer limits. This calculator does not predict exact horsepower, verify engine durability, approve a tune or guarantee emissions compliance. Treat the output as a simplified mathematical estimate whose assumptions must be checked before any real-world change.</p>
            TXT],
            ['title' => 'Why a theoretical estimate differs from a dyno', 'html' => <<<'TXT'
            <p>The pressure-ratio equation assumes that power changes in proportion to absolute intake pressure while other engine characteristics remain constant. That is a simplifying assumption. In practice, compressor discharge temperature, intercooling, exhaust restriction, engine speed, cam timing and volumetric efficiency change with operating conditions. Combustion limits and ignition timing can prevent the engine from using all of the extra air suggested by the pressure ratio.</p><p>Current horsepower should come from a reliable source and use the same measurement basis as the target. Dyno type, correction method, gear, tire, ambient conditions and drivetrain losses affect reported values. Comparing a crankshaft rating from a manufacturer with wheel horsepower from a chassis dyno introduces a difference unrelated to boost.</p><p>Atmospheric pressure is not always 14.7 psi. Altitude and weather change the reference, and gauge boost is relative to local ambient pressure. The calculator’s fixed constant is convenient for a standard approximation but does not model every location. Do not use the output to set a boost controller or bypass engine protections.</p><p>If evaluating a build, work with a qualified tuner to assess fuel delivery, charge temperature, knock control, exhaust pressure and hardware limits. The formula can illustrate a relationship, but an engine’s safe operating envelope is determined by its components and calibration, not by the calculator alone.</p>
            TXT],
            ['title' => 'Treat boost as one input, not a tuning plan', 'html' => <<<'TXT'
            <p>Use the estimate to understand a simplified relationship, not to decide a safe boost level. The page does not know the engine’s compression ratio, knock margin, fuel octane, cooling system, turbocharger map, exhaust temperature or component condition. Any of these can limit a real setup before the theoretical power estimate is reached.</p><p>Keep the gauge-pressure unit consistent. If converting from bar or kilopascals, verify the unit selector and whether the value is gauge or absolute pressure. The formula adds atmospheric pressure to gauge boost, so entering an absolute pressure as if it were gauge pressure double-counts the reference.</p><p>For any real modification, consult a qualified tuner and the engine or component manufacturer. Use data logging and appropriate safeguards. The calculator’s equation is not a substitute for testing, calibration or a safety review.</p>
            TXT],
            ['title' => 'Compare estimates only on matching power bases', 'html' => <<<'TXT'
            <p>When you compare two scenarios, keep current power, fuel assumptions and pressure reference consistent. Change only the boost input so the result reflects the model’s pressure-ratio relationship. If you also change the horsepower source or dyno correction, the difference no longer isolates boost.</p><p>Label the result as theoretical. Do not represent it as a tested output or a guarantee of engine performance.</p>
            TXT],
            ['title' => 'Use the equation as a first-principles illustration', 'html' => <<<'TXT'
            <p>The calculator’s pressure ratio helps explain why boost pressure is considered relative to atmospheric pressure. It is a useful way to understand an idealized change, but it assumes the engine can use the extra air without additional losses. In real operation, temperature, flow restrictions and combustion limits change the outcome.</p><p>If a displayed estimate is being used in a discussion, include the current power basis, boost value and 14.7 psi reference assumption. Without those details, the number can be mistaken for a measured result.</p><p>Do not change engine settings based solely on the output. A qualified tuner and vehicle-specific data are needed for any practical calibration.</p>
            TXT],
            ['title' => 'Understand that pressure is not a direct power guarantee', 'html' => <<<'TXT'
            <p>Boost pressure is one operating condition, not a direct promise of output. Two engines at the same gauge pressure can produce different power because their airflow, temperature, efficiency and calibration differ. Use the equation to explore a simplified ratio only.</p><p>Any real-world power figure should come from appropriate testing under documented conditions. This calculator does not replace a dyno measurement.</p>
            TXT],
            ['title' => 'Verify the pressure reference', 'html' => <<<'TXT'
            <p>Check whether the boost value is gauge pressure before using it. The formula adds an atmospheric reference, so entering an absolute manifold pressure as though it were gauge pressure will distort the estimate.</p><p>Keep the units consistent and confirm the displayed pressure label before comparing scenarios.</p>
            TXT],
            ['title' => 'Keep the estimate in context', 'html' => <<<'TXT'
            <p>Record the engine, power source and pressure assumption with the result. That context prevents an idealized calculation from being confused with a measured dyno result when it is shared later.</p>
            TXT],
            ['title' => 'Do not use a theoretical result as a limit', 'html' => <<<'TXT'
            <p>A model estimate does not identify the safe limit for an engine. Follow the manufacturer’s operating guidance and get qualified calibration advice before changing boost.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Boost horsepower calculator work out?', 'a' => 'It returns boost added, derived from the current engine power and the boosted engine power.'],
            ['q' => 'What do I need to enter to use the Boost horsepower calculator?', 'a' => 'The form asks for the current engine power and the boosted engine power, which is 2 fields in total.'],
            ['q' => 'Can I enter current engine power in a different unit?', 'a' => 'Yes. Current engine power opens in mechanical horsepowers and the chip beside it offers 21 units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/shoe-size-conversion', 'name' => 'Shoe size conversion'],
            ['path' => '/everyday-life/shoelace-length', 'name' => 'Shoelace length'],
            ['path' => '/everyday-life/shower-cost', 'name' => 'Shower cost'],
        ],
    ],
];
