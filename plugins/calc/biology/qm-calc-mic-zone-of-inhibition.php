<?php

/**
 * MIC and Zone of Inhibition Calculator
 * /biology/mic-zone-of-inhibition
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'MIC and Zone of Inhibition Calculator',
    'meta' => ['title' => 'MIC and Zone of Inhibition Calculator — Biology', 'description' => 'Convert a measured zone of inhibition into a minimum inhibitory concentration, and work out how much of it you actually achieved. It returns zone per log₂…', 'h1' => 'MIC and Zone of Inhibition Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'zone_mm',
                            'label' => 'Zone of inhibition',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Diameter, including the disc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '22',
                        ],
                        [
                            'name' => 'disc_ug',
                            'label' => 'Antibiotic per disc',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'help' => 'Disk potency',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '30',
                        ],
                        [
                            'name' => 'cal_zone_high',
                            'label' => 'Calibration zone, low MIC',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'From a reference strain',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'cal_mic_high',
                            'label' => 'Reference MIC for that zone',
                            'type' => 'number',
                            'suffix' => 'µg/mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'cal_zone_low',
                            'label' => 'Calibration zone, high MIC',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'The second reference point',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'cal_mic_low',
                            'label' => 'Reference MIC for that zone',
                            'type' => 'number',
                            'suffix' => 'µg/mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'mic',
                            'label' => 'Estimated MIC',
                            'type' => 'number',
                            'suffix' => 'µg/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'slope',
                            'label' => 'Zone per log₂ MIC',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'susceptibility',
                            'label' => 'Susceptibility ratio',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => 'MIC over the breakpoint you entered',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'breakpoint',
                            'label' => 'Breakpoint MIC',
                            'type' => 'number',
                            'suffix' => 'µg/mL',
                            'help' => 'CLSI/EUCAST breakpoint for the organism',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'plate_ug_ml',
                            'label' => 'Drug concentration in the well',
                            'type' => 'number',
                            'suffix' => 'µg/mL',
                            'help' => 'From the disc load and the well volume',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'well_ul',
                            'label' => 'Well volume',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'help' => '100 µL for a 96-well MIC plate',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'MIC',
            'results' => ['slope' => '(cal_zone_high-cal_zone_low)/log2(cal_mic_low/cal_mic_high)', 'mic' => 'cal_mic_high*2^((cal_zone_high-zone_mm)/((cal_zone_high-cal_zone_low)/log2(cal_mic_low/cal_mic_high)))', 'susceptibility' => 'cal_mic_high*2^((cal_zone_high-zone_mm)/((cal_zone_high-cal_zone_low)/log2(cal_mic_low/cal_mic_high)))/breakpoint', 'plate_ug_ml' => 'disc_ug/(well_ul/1000)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Convert a measured zone of inhibition into a minimum inhibitory concentration, and work out how much of it you actually achieved. It returns zone per log₂ MIC, estimated MIC, susceptibility ratio and drug concentration in the well, and the panel shows all of them at once.
        
        The zone diameter falls roughly linearly with the log of the MIC, so two calibration points from a known strain are enough to read an unknown one.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the MIC and Zone of Inhibition', 'html' => <<<'TXT'
            <p>MIC = MIC_ref × 2^((Zone_ref − Zone) ÷ slope), with slope = (Zone_ref − Zone_lo) ÷ log₂(MIC_lo ÷ MIC_ref). Concentration in a well (µg/mL) = disc µg ÷ volume (mL)</p>
            <figure class="calc-figure"><img src="/uploads/biology/mic-zone-of-inhibition.svg" width="720" height="300" loading="lazy" alt="Animated diagram: MIC and Zone of Inhibition Calculator — Zone of inhibition against the log of the MIC" title="MIC and Zone of Inhibition Calculator"><figcaption>Zone of inhibition against the log of the MIC</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>MIC</code></td><td>minimum inhibitory concentration</td><td>µg/mL</td></tr><tr><td><code>zone</code></td><td>diameter of the clear ring around the disc</td><td>mm</td></tr><tr><td><code>breakpoint</code></td><td>the MIC above which the organism is called resistant</td><td>µg/mL</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the MIC and Zone of Inhibition?', 'html' => <<<'TXT'
            <ol><li>Measure the clear zone around the disc in millimetres.</li><li>Enter the two calibration points from a reference strain and the breakpoint for the organism.</li><li>Read the estimated MIC and whether it sits above or below the breakpoint.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: zone of inhibition of <strong>22</strong> mm, antibiotic per disc of <strong>30</strong> µg, calibration zone, low mic of <strong>25</strong> mm, reference mic for that zone of <strong>1</strong> µg/mL, calibration zone, high mic of <strong>15</strong> mm, reference mic for that zone of <strong>8</strong> µg/mL, breakpoint mic of <strong>4</strong> µg/mL, well volume of <strong>200</strong> µL.</p>
            <p>Substituting them into the formula gives zone per log₂ mic of <strong>3.33</strong> mm, estimated mic of <strong>1.87</strong> µg/mL, susceptibility ratio of <strong>0.4665</strong> ×, drug concentration in the well of <strong>150</strong> µg/mL.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>ratio under 0.5</td><td><strong>Susceptible</strong></td><td>the drug works at a normal dose</td></tr><tr><td>ratio 0.5 – 2</td><td><strong>Intermediate</strong></td><td>close to the breakpoint; check the method</td></tr><tr><td>ratio above 2</td><td><strong>Resistant</strong></td><td>the MIC exceeds the breakpoint</td></tr></tbody></table>
            <ul><li><p>The relationship is logarithmic, not linear: doubling the MIC changes the zone by a fixed number of millimetres, set by the drug's diffusion through the agar.</p></li><li><p>Zone size depends on the agar depth, the inoculum density and the diffusion rate of the drug, which is why the calibration points must come from the same protocol.</p></li><li><p>MIC is a laboratory value. Whether a dose works in a patient also depends on protein binding, tissue penetration and the drug's pharmacokinetics.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Measuring the disc itself as well as the zone, or reading the zone with a ruler laid across the wrong axis.</li><li>Comparing zones from different media — Mueller-Hinton is the standard for a reason.</li><li>Calling an organism resistant from a zone alone without the breakpoint table for that species.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does a 20 mm zone mean?', 'a' => 'It depends on the drug and the disc load: for a 30 µg disc of a well-diffusing antibiotic it usually means susceptible.'],
            ['q' => 'Why is the scale logarithmic?', 'a' => 'Because diffusion creates a concentration gradient, and the zone edge marks the concentration equal to the MIC — a log relationship.'],
            ['q' => 'Can I use this for fungi?', 'a' => 'Yes, with antifungal discs and the species-appropriate breakpoints.'],
            ['q' => 'What does the MIC and Zone of Inhibition actually calculate?', 'a' => <<<'TXT'
            It returns zone per log₂ MIC, estimated MIC, susceptibility ratio and drug concentration in the well. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];
