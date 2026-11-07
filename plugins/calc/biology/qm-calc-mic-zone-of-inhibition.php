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
    'meta' => ['title' => 'MIC and Zone of Inhibition Calculator — Biology', 'description' => <<<'TXT'
    MIC and Zone of Inhibition Calculator works out estimated MIC and Zone per log₂ MIC from zone of inhibition, antibiotic per disc and Calibration zone, low MIC.
    TXT, 'h1' => 'MIC and Zone of Inhibition Calculator', 'updated' => '2026-10-29'],
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
        MIC and Zone of Inhibition turns Zone of inhibition, Antibiotic per disc and Calibration zone, low MIC into Estimated MIC and Zone per log₂ MIC. There is no hidden constant here: change estimated MIC and zone of inhibition moves with it. The main result, Estimated MIC, is reported in µg/mL.
        TXT,
        'sections' => [
            ['title' => 'How the MIC and Zone of Inhibition calculator works', 'html' => <<<'TXT'
            <p>The MIC and Zone of Inhibition calculator applies one relationship to 8 numbers and reports Estimated MIC, Zone per log₂ MIC and Susceptibility ratio.</p><p>Written with the labels from the form, Zone per log₂ MIC = (Calibration zone, low MIC − Calibration zone, high MIC) ÷ log2(Reference MIC for that zone ÷ Reference MIC for that zone).</p><p>The answers are Estimated MIC, Zone per log₂ MIC, Susceptibility ratio and Drug concentration in the well; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 8 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Zone of inhibition</strong> — in mm. Diameter, including the disc</li><li><strong>Antibiotic per disc</strong> — in µg. Disk potency</li><li><strong>Calibration zone, low MIC</strong> — in mm. From a reference strain</li><li><strong>Reference MIC for that zone</strong> — in µg/mL</li><li><strong>Calibration zone, high MIC</strong> — in mm. The second reference point</li><li><strong>Reference MIC for that zone</strong> — in µg/mL</li><li><strong>Breakpoint MIC</strong> — in µg/mL. CLSI/EUCAST breakpoint for the organism</li><li><strong>Well volume</strong> — in µL. 100 µL for a 96-well MIC plate</li></ul><p>The result boxes are Estimated MIC in µg/mL, Zone per log₂ MIC in mm, Susceptibility ratio in ×, Drug concentration in the well in µg/mL; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Zone of inhibition = 22 mm, Antibiotic per disc = 30 µg, Calibration zone, low MIC = 25 mm, Reference MIC for that zone = 1 µg/mL, Calibration zone, high MIC = 15 mm, Reference MIC for that zone = 8 µg/mL, Breakpoint MIC = 4 µg/mL and Well volume = 200 µL — through the same formula and the panel reports <strong>Zone per log₂ MIC</strong> = 3.33 mm, <strong>Estimated MIC</strong> = 1.87 µg/mL, <strong>Susceptibility ratio</strong> = 0.4665 × and <strong>Drug concentration in the well</strong> = 150 µg/mL.</p><ul><li><strong>Zone per log₂ MIC</strong> = 3.33 mm</li><li><strong>Estimated MIC</strong> = 1.87 µg/mL</li><li><strong>Susceptibility ratio</strong> = 0.4665 ×</li><li><strong>Drug concentration in the well</strong> = 150 µg/mL</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Zone per log₂ MIC</strong> = <code>(Calibration zone, low MIC − Calibration zone, high MIC) ÷ log2(Reference MIC for that zone ÷ Reference MIC for that zone)</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Zone per log₂ MIC</strong> = 3.33, <strong>Estimated MIC</strong> = 1.87, <strong>Susceptibility ratio</strong> = 0.4665 and <strong>Drug concentration in the well</strong> = 150 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Estimated MIC takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Zone per log₂ MIC</strong> = <code>(Calibration zone, low MIC − Calibration zone, high MIC) ÷ log2(Reference MIC for that zone ÷ Reference MIC for that zone)</code></li><li><strong>Estimated MIC</strong> = <code>Reference MIC for that zone × 2 ^ ((Calibration zone, low MIC − Zone of inhibition) ÷ ((Calibration zone, low MIC − Calibration zone, high MIC) ÷ log2(Reference MIC for that zone ÷ Reference MIC for that zone)))</code></li><li><strong>Susceptibility ratio</strong> = <code>Reference MIC for that zone × 2 ^ ((Calibration zone, low MIC − Zone of inhibition) ÷ ((Calibration zone, low MIC − Calibration zone, high MIC) ÷ log2(Reference MIC for that zone ÷ Reference MIC for that zone))) ÷ Breakpoint MIC</code></li><li><strong>Drug concentration in the well</strong> = <code>Antibiotic per disc ÷ (Well volume ÷ 1000)</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Zone per log₂ MIC</strong> = <code>(Calibration zone, low MIC − Calibration zone, high MIC) ÷ log2(Reference MIC for that zone ÷ Reference MIC for that zone)</code> — the form to use when Calibration zone, low MIC, Calibration zone, high MIC, Reference MIC for that zone and Reference MIC for that zone are the values you have.</li><li><strong>Estimated MIC</strong> = <code>Reference MIC for that zone × 2 ^ ((Calibration zone, low MIC − Zone of inhibition) ÷ ((Calibration zone, low MIC − Calibration zone, high MIC) ÷ log2(Reference MIC for that zone ÷ Reference MIC for that zone)))</code> — the form to use when Reference MIC for that zone, Calibration zone, low MIC, Zone of inhibition and Calibration zone, high MIC are the values you have.</li><li><strong>Susceptibility ratio</strong> = <code>Reference MIC for that zone × 2 ^ ((Calibration zone, low MIC − Zone of inhibition) ÷ ((Calibration zone, low MIC − Calibration zone, high MIC) ÷ log2(Reference MIC for that zone ÷ Reference MIC for that zone))) ÷ Breakpoint MIC</code> — the form to use when Reference MIC for that zone, Calibration zone, low MIC, Zone of inhibition and Calibration zone, high MIC are the values you have.</li><li><strong>Drug concentration in the well</strong> = <code>Antibiotic per disc ÷ (Well volume ÷ 1000)</code> — the form to use when Antibiotic per disc and Well volume are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Zone per log₂ MIC, Estimated MIC and Susceptibility ratio can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Zone of inhibition from 22 to 44, leaving every other box alone. The panel moves from <strong>Zone per log₂ MIC</strong> 3.33 mm, <strong>Estimated MIC</strong> 1.87 µg/mL, <strong>Susceptibility ratio</strong> 0.4665 × and <strong>Drug concentration in the well</strong> 150 µg/mL to <strong>Zone per log₂ MIC</strong> 3.33 mm, <strong>Estimated MIC</strong> 0.0192 µg/mL, <strong>Susceptibility ratio</strong> 0.0048 × and <strong>Drug concentration in the well</strong> 150 µg/mL.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Estimated MIC, Zone per log₂ MIC and Susceptibility ratio are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Zone of inhibition left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Zone of inhibition is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Antibiotic per disc left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Antibiotic per disc is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Calibration zone, low MIC left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Calibration zone, low MIC is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Zone of inhibition is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Zone of inhibition</strong> is measured in mm. Diameter, including the disc. The page reads it when it works out Estimated MIC and Susceptibility ratio. Have it to hand before you start: Zone of inhibition is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Antibiotic per disc</strong> is measured in µg. The page reads it when it works out Drug concentration in the well. Have it to hand before you start: Antibiotic per disc is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Calibration zone, low MIC</strong> is measured in mm. From a reference strain. The page reads it when it works out Zone per log₂ MIC, Estimated MIC and Susceptibility ratio. Have it to hand before you start: Calibration zone, low MIC is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Reference MIC for that zone</strong> is measured in µg/mL. The page reads it when it works out Zone per log₂ MIC, Estimated MIC and Susceptibility ratio. Have it to hand before you start: Reference MIC for that zone is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Calibration zone, high MIC</strong> is measured in mm. The second reference point. The page reads it when it works out Zone per log₂ MIC, Estimated MIC and Susceptibility ratio. Have it to hand before you start: Calibration zone, high MIC is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Reference MIC for that zone</strong> is measured in µg/mL. The page reads it when it works out Zone per log₂ MIC, Estimated MIC and Susceptibility ratio. Have it to hand before you start: Reference MIC for that zone is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Breakpoint MIC</strong> is measured in µg/mL. CLSI/EUCAST breakpoint for the organism. The page reads it when it works out Susceptibility ratio. Have it to hand before you start: Breakpoint MIC is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Well volume</strong> is measured in µL. 100 µL for a 96-well MIC plate. The page reads it when it works out Drug concentration in the well. Have it to hand before you start: Well volume is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Estimated MIC is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Zone of inhibition, Antibiotic per disc and Calibration zone, low MIC are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Zone of inhibition, Antibiotic per disc and Calibration zone, low MIC measured, Estimated MIC and Zone per log₂ MIC wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/dna-pattern-finder">DNA Pattern Finder Calculator</a>, <a href="/biology/dna-percentage">DNA Percentage Calculator</a> and <a href="/biology/sequence-shuffler">DNA Sequence Shuffler Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the MIC and Zone of Inhibition calculator work out?', 'a' => <<<'TXT'
            Estimated MIC, Zone per log₂ MIC, Susceptibility ratio and Drug concentration in the well, from Calibration zone, low MIC, Calibration zone, high MIC, Reference MIC for that zone and Reference MIC for that zone. The relationship is Zone per log₂ MIC = (Calibration zone, low MIC − Calibration zone, high MIC) ÷ log2(Reference MIC for that zone ÷ Reference MIC for that zone).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Zone of inhibition (mm), Antibiotic per disc (µg), Calibration zone, low MIC (mm), Reference MIC for that zone (µg/mL), Calibration zone, high MIC (mm). Fill zone of inhibition, antibiotic per disc and calibration zone, low MIC and leave Estimated MIC empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Zone per log₂ MIC, Estimated MIC, Susceptibility ratio and Drug concentration in the well can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Zone per log₂ MIC = 3.33 mm, Estimated MIC = 1.87 µg/mL, Susceptibility ratio = 0.4665 × and Drug concentration in the well = 150 µg/mL. Those are the defaults written into the form — move Zone of inhibition and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Estimated MIC is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Zone of inhibition left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Estimated MIC at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/dna-pattern-finder', 'name' => 'DNA Pattern Finder Calculator'],
            ['path' => '/biology/dna-percentage', 'name' => 'DNA Percentage Calculator'],
            ['path' => '/biology/sequence-shuffler', 'name' => 'DNA Sequence Shuffler Calculator'],
        ],
        'authors' => [],
    ],
];
