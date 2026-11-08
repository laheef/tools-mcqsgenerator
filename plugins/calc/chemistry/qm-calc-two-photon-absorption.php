<?php

/**
 * Two-photon absorption
 * /chemistry/two-photon-absorption
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Two-photon absorption',
    'meta' => ['title' => 'Two-Photon Absorption Calculator: Excitation Rate', 'description' => 'Estimate how often a fluorophore is excited by two photons at once, from its cross-section, the laser power, the pulse timing and the size of the focus.', 'h1' => 'Two-photon absorption', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'cross_section',
                    'label' => 'Two-photon cross-section',
                    'type' => 'number',
                    'suffix' => 'GM',
                    'default' => '50',
                    'help' => '1 GM is 10⁻⁵⁰ cm⁴·s/photon; dyes run from 1 to 1 000',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'average_power',
                    'label' => 'Average laser power',
                    'type' => 'number',
                    'suffix' => 'mW',
                    'default' => '10',
                    'help' => 'Measured at the sample',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'repetition_rate',
                    'label' => 'Pulse repetition rate',
                    'type' => 'number',
                    'suffix' => 'MHz',
                    'default' => '80',
                    'help' => '80 MHz for a typical Ti:sapphire oscillator',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pulse_width',
                    'label' => 'Pulse duration',
                    'type' => 'number',
                    'suffix' => 'fs',
                    'default' => '100',
                    'help' => 'Full width at half maximum',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'beam_area',
                    'label' => 'Focal spot area',
                    'type' => 'number',
                    'suffix' => 'µm²',
                    'default' => '0.3',
                    'help' => 'The diffraction-limited area, roughly π·r²',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'wavelength',
                    'label' => 'Wavelength',
                    'type' => 'number',
                    'suffix' => 'nm',
                    'default' => '800',
                    'help' => 'Twice the single-photon absorption wavelength',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pulse_energy',
                    'label' => 'Energy per pulse',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'µJ',
                ],
                [
                    'name' => 'peak_power',
                    'label' => 'Peak power',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'W',
                ],
                [
                    'name' => 'intensity',
                    'label' => 'Peak intensity',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'GW/cm²',
                ],
                [
                    'name' => 'photon_flux',
                    'label' => 'Peak photon flux',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'photons/(cm²·s)',
                ],
                [
                    'name' => 'excitation_rate',
                    'label' => 'Excitation rate per molecule',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's⁻¹',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Two-photon absorption',
            'results' => [
                'pulse_energy' => 'average_power/repetition_rate*0.001',
                'peak_power' => 'average_power/(repetition_rate*pulse_width)*pow(10,6)',
                'intensity' => 'average_power/(repetition_rate*pulse_width)*pow(10,6)/(beam_area*pow(10,-8))/pow(10,9)',
                'photon_flux' => 'intensity*pow(10,9)*wavelength*pow(10,-7)/pow(10,-23)/1.9878',
                'excitation_rate' => 'cross_section*pow(10,-50)*pow(photon_flux,2)*pulse_width*pow(10,-15)*repetition_rate*pow(10,6)',
                'average_power' => 'pulse_energy*repetition_rate*1000',
                'beam_area' => 'average_power/(repetition_rate*pulse_width)*pow(10,6)/(intensity*pow(10,9))/pow(10,-8)',
                'wavelength' => 'photon_flux*pow(10,-23)*1.9878/(intensity*pow(10,9))/pow(10,-7)',
                'cross_section' => 'excitation_rate/(pow(10,-50)*pow(photon_flux,2)*pulse_width*pow(10,-15)*repetition_rate*pow(10,6))',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Two-photon absorption is proportional to the square of the intensity. For a pulsed laser the rate per molecule is <strong>R = σ₂·Φ²</strong>, where σ₂ is the cross-section in Goeppert-Mayer units and Φ the photon flux during a pulse.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Two-photon microscopy excites a fluorophore with two infrared photons instead of one visible one, which confines excitation to the focal volume and lets you image deep into scattering tissue. The rate calculation says whether a given dye, laser and focus will give enough signal and not too much photobleaching.</p><p>The page reports <strong>energy per pulse and peak power and peak intensity and peak photon flux and excitation rate per molecule</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Energy per pulse</strong></td><td><code>Average laser power ÷ Pulse repetition rate × 0.001</code></td></tr><tr><td><strong>Peak power</strong></td><td><code>Average laser power ÷ (Pulse repetition rate × Pulse duration) × (10)^6</code></td></tr><tr><td><strong>Peak intensity</strong></td><td><code>Average laser power ÷ (Pulse repetition rate × Pulse duration) × (10)^6 ÷ (Focal spot area × (10)^-8) ÷ (10)^9</code></td></tr><tr><td><strong>Peak photon flux</strong></td><td><code>Peak intensity × (10)^9 × Wavelength × (10)^-7 ÷ (10)^-23 ÷ 1.9878</code></td></tr><tr><td><strong>Excitation rate per molecule</strong></td><td><code>Two-photon cross-section × (10)^-50 × (Peak photon flux)^2 × Pulse duration × (10)^-15 × Pulse repetition rate × (10)^6</code></td></tr><tr><td><strong>Average laser power</strong></td><td><code>Energy per pulse × Pulse repetition rate × 1000</code></td></tr><tr><td><strong>Focal spot area</strong></td><td><code>Average laser power ÷ (Pulse repetition rate × Pulse duration) × (10)^6 ÷ (Peak intensity × (10)^9) ÷ (10)^-8</code></td></tr><tr><td><strong>Wavelength</strong></td><td><code>Peak photon flux × (10)^-23 × 1.9878 ÷ (Peak intensity × (10)^9) ÷ (10)^-7</code></td></tr><tr><td><strong>Two-photon cross-section</strong></td><td><code>Excitation rate per molecule ÷ ((10)^-50 × (Peak photon flux)^2 × Pulse duration × (10)^-15 × Pulse repetition rate × (10)^6)</code></td></tr></tbody></table><p><p>The intensity depends on the square of the peak power over the area, and only the pulse peak matters — the average power is spread over the duty cycle. Because the rate goes as the square of the flux, doubling the power quadruples the excitation.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 6 boxes and the page has everything it needs. It reports energy per pulse and peak power and peak intensity and peak photon flux and excitation rate per molecule.</p><ul><li><strong>Two-photon cross-section</strong> — in GM. 1 GM is 10⁻⁵⁰ cm⁴·s/photon; dyes run from 1 to 1 000</li><li><strong>Average laser power</strong> — in mW. Measured at the sample</li><li><strong>Pulse repetition rate</strong> — in MHz. 80 MHz for a typical Ti:sapphire oscillator</li><li><strong>Pulse duration</strong> — in fs. Full width at half maximum</li><li><strong>Focal spot area</strong> — in µm². The diffraction-limited area, roughly π·r²</li><li><strong>Wavelength</strong> — in nm. Twice the single-photon absorption wavelength</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Energy per pulse</strong> — in µJ</li><li><strong>Peak power</strong> — in W</li><li><strong>Peak intensity</strong> — in GW/cm²</li><li><strong>Peak photon flux</strong> — in photons/(cm²·s)</li><li><strong>Excitation rate per molecule</strong> — in s⁻¹</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Two-photon cross-section = 50 GM, Average laser power = 10 mW, Pulse repetition rate = 80 MHz, Pulse duration = 100 fs, Focal spot area = 0.3 µm², Wavelength = 800 nm — and the results panel reads:</p><ul><li><strong>Energy per pulse</strong> = <code>Average laser power ÷ Pulse repetition rate × 0.001</code> = <strong>0.000125 µJ</strong></li><li><strong>Peak power</strong> = <code>Average laser power ÷ (Pulse repetition rate × Pulse duration) × (10)^6</code> = <strong>1 250 W</strong></li><li><strong>Peak intensity</strong> = <code>Average laser power ÷ (Pulse repetition rate × Pulse duration) × (10)^6 ÷ (Focal spot area × (10)^-8) ÷ (10)^9</code> = <strong>416.667 GW/cm²</strong></li><li><strong>Peak photon flux</strong> = <code>Peak intensity × (10)^9 × Wavelength × (10)^-7 ÷ (10)^-23 ÷ 1.9878</code> = <strong>1.677 × 10<sup>30</sup> photons/(cm²·s)</strong></li><li><strong>Excitation rate per molecule</strong> = <code>Two-photon cross-section × (10)^-50 × (Peak photon flux)^2 × Pulse duration × (10)^-15 × Pulse repetition rate × (10)^6</code> = <strong>1.125 × 10<sup>7</sup> s⁻¹</strong></li></ul><p>With the numbers written into the formula, the first result is <code>10 ÷ 80 × 0.001 = 0.000125</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>10 mW at 80 MHz is 0.125 nJ per pulse; squeezed into 100 fs that is 1.25 kW of peak power, which over a 0.3 µm² spot is about 420 GW/cm². With a 50 GM cross-section and a duty cycle set by the pulse train, the excitation rate is around 1.1 × 10⁷ per second — useful signal, and enough to bleach if it is sustained.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare the rate with the fluorophore's lifetime: at 1.1 × 10⁷ per second and a three-nanosecond lifetime the product is 0.03, comfortably below saturation. Push it toward one and the signal stops scaling with power.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Energy per pulse</th><th>Peak power</th><th>Peak intensity</th><th>Peak photon flux</th><th>Excitation rate per molecule</th></tr></thead><tbody><tr><td><strong>Two-photon cross-section</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Average laser power</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>+21 %</td></tr><tr><td><strong>Pulse repetition rate</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Pulse duration</strong> +10 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Focal spot area</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−17.36 %</td></tr><tr><td><strong>Wavelength</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td><td>+21 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Wavelength</strong>: a ten per cent move there shifts the result by about 21 per cent. The least sensitive is <strong>Pulse duration</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Two-photon cross-section = 10, Average laser power = 5, Pulse repetition rate = 80, Pulse duration = 200, Focal spot area = 0.5, Wavelength = 900, the page reports <strong>Energy per pulse</strong> = 6.25 × 10<sup>-5</sup> µJ, <strong>Peak power</strong> = 312.5 W, <strong>Peak intensity</strong> = 62.5 GW/cm², <strong>Peak photon flux</strong> = 2.83 × 10<sup>29</sup> photons/(cm²·s), <strong>Excitation rate per molecule</strong> = 128 120.806 s⁻¹. A weaker dye, a quarter of the peak intensity and a longer wavelength: the rate falls to about 1.3 × 10⁵ per second, some ninety times lower.</li><li>With Two-photon cross-section = 100, Average laser power = 20, Pulse repetition rate = 80, Pulse duration = 100, Focal spot area = 0.3, Wavelength = 800, the page reports <strong>Energy per pulse</strong> = 0.00025 µJ, <strong>Peak power</strong> = 2 500 W, <strong>Peak intensity</strong> = 833.333 GW/cm², <strong>Peak photon flux</strong> = 3.354 × 10<sup>30</sup> photons/(cm²·s), <strong>Excitation rate per molecule</strong> = 8.998 × 10<sup>7</sup> s⁻¹. Better dye and twice the power: the flux squares to four and the cross-section doubles, so the rate is about eight times higher.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Average power used as peak power.</strong> With 100 fs pulses at 80 MHz the peak power is five orders of magnitude higher, and the rate depends on it.</li><li><strong>The spot area estimated from the wavelength alone.</strong> A real objective's focus is diffraction-limited but not perfect; measuring the area with a bead scan is better.</li><li><strong>Units of the cross-section.</strong> A goeppert-mayer is 10⁻⁵⁰ cm⁴·s/photon, not 10⁻⁵⁰ cm² — the fourth power of length is what makes it a two-photon quantity.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Energy per pulse (µJ), Peak power (W), Peak intensity (GW/cm²), Peak photon flux (photons/(cm²·s)), Excitation rate per molecule (s⁻¹).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Power in milliwatts, repetition rate in megahertz and pulse width in femtoseconds give pulse energy in microjoules and peak power in watts. The spot area is entered in square micrometres and converted to square centimetres, which is what the intensity needs.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need two-photon cross-section and average laser power and pulse repetition rate and pulse duration and focal spot area and wavelength. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Energy per pulse and peak power and peak intensity and peak photon flux and excitation rate per molecule should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Two-photon cross-section</strong> ×10</td><td>0.000125</td><td>0.000125</td><td>unchanged</td></tr><tr><td><strong>Average laser power</strong> ×10</td><td>0.000125</td><td>0.001</td><td>ten times larger</td></tr><tr><td><strong>Pulse repetition rate</strong> ×10</td><td>0.000125</td><td>1.25 × 10<sup>-5</sup></td><td>ten times smaller</td></tr><tr><td><strong>Pulse duration</strong> ×10</td><td>0.000125</td><td>0.000125</td><td>unchanged</td></tr><tr><td><strong>Focal spot area</strong> ×10</td><td>0.000125</td><td>0.000125</td><td>unchanged</td></tr><tr><td><strong>Wavelength</strong> ×10</td><td>0.000125</td><td>0.000125</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>A simplified model.</strong> It ignores the pulse's temporal shape and the beam's Gaussian profile; both reduce the true rate by a factor of order one.</li><li><strong>No saturation.</strong> At high rates the ground state depletes and the measured rate falls below the square law.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Comparing dyes for a two-photon microscope.</li></li><li><li>Checking whether a laser setting will saturate a fluorophore.</li></li><li><li>Estimating bleaching before a long time-lapse.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/beer-lambert-law">Beer-Lambert law</a> <a href="/chemistry/rate-constant">Rate constant</a> <a href="/chemistry/activation-energy">Activation energy</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Two-photon absorption calculator work out?', 'a' => <<<'TXT'
            It returns energy per pulse and peak power and peak intensity and peak photon flux and excitation rate per molecule from two-photon cross-section and average laser power and pulse repetition rate and pulse duration and focal spot area and wavelength. The relationship is Average laser power ÷ Pulse repetition rate × 0.001.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Two-photon cross-section (GM), Average laser power (mW), Pulse repetition rate (MHz), Pulse duration (fs), Focal spot area (µm²), Wavelength (nm). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: two-photon cross-section in GM; average laser power in mW; pulse repetition rate in MHz; pulse duration in fs; focal spot area in µm²; wavelength in nm. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why does two-photon absorption need pulsed lasers?', 'a' => <<<'TXT'
            Because the rate goes as the square of the intensity. Short pulses pack the same average power into a tiny fraction of the time, raising the peak intensity enormously.
            TXT],
            ['q' => 'What is a goeppert-mayer?', 'a' => 'The unit of two-photon cross-section, 10⁻⁵⁰ cm⁴·s per photon, named after the physicist who predicted the effect.'],
        ],
        'related' => [
            ['path' => '/chemistry/beer-lambert-law', 'name' => 'Beer-Lambert law'],
            ['path' => '/chemistry/rate-constant', 'name' => 'Rate constant'],
            ['path' => '/chemistry/activation-energy', 'name' => 'Activation energy'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
