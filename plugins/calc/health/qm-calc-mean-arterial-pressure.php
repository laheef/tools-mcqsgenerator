<?php

/**
 * Mean arterial pressure
 * /health/mean-arterial-pressure
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mean arterial pressure',
    'meta' => ['title' => 'Mean Arterial Pressure Calculator: Formula & Ranges', 'description' => 'Mean arterial pressure from a systolic and a diastolic reading: (SBP + 2 × DBP) ÷ 3, with pulse pressure and the distance to the 65 mmHg perfusion floor.', 'h1' => 'Mean arterial pressure Calculator', 'updated' => '2026-11-10'],
    'sections' => [
        [
            'title' => 'Blood pressure readings',
            'note' => 'Enter the two numbers from a cuff reading. The four results are worked out from them and cannot be typed into.',
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'sbp',
                    'label' => 'Systolic pressure',
                    'type' => 'number',
                    'rounding' => ['omni', '0.01'],
                    'suffix' => 'mmHg',
                    'default' => '120',
                ],
                [
                    'name' => 'dbp',
                    'label' => 'Diastolic pressure',
                    'type' => 'number',
                    'rounding' => ['omni', '0.01'],
                    'suffix' => 'mmHg',
                    'default' => '80',
                ],
                [
                    'name' => 'map_mmhg',
                    'label' => 'Mean arterial pressure',
                    'type' => 'result',
                    'rounding' => ['omni', '0.01'],
                    'suffix' => 'mmHg',
                    'readonly' => true,
                ],
                [
                    'name' => 'pulse',
                    'label' => 'Pulse pressure',
                    'type' => 'result',
                    'rounding' => ['omni', '0.01'],
                    'suffix' => 'mmHg',
                    'readonly' => true,
                ],
                [
                    'name' => 'hypo',
                    'label' => 'Distance above the 65 mmHg perfusion floor',
                    'type' => 'result',
                    'rounding' => ['omni', '0.01'],
                    'suffix' => 'mmHg',
                    'readonly' => true,
                ],
                [
                    'name' => 'rate_pressure',
                    'label' => 'Rate-pressure product',
                    'type' => 'result',
                    'rounding' => ['omni', '0.01'],
                    'readonly' => true,
                ],
            ],
        ],
    ],
    'formula' => ['map_mmhg' => '(sbp+2*dbp)/3', 'pulse' => 'sbp-dbp', 'hypo' => '(sbp+2*dbp)/3-65', 'rate_pressure' => 'sbp*70'],
    'article' => [
        'intro' => <<<'TXT'
        Mean arterial pressure is the average pressure driving blood through the organs across the cardiac cycle. Because diastole lasts about twice as long as systole it sits closer to the diastolic value, which is why MAP ≈ (SBP + 2 × DBP) ÷ 3.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the mean arterial pressure', 'html' => <<<'TXT'
            <p>MAP = (SBP + 2 × DBP) ÷ 3</p><figure class="calc-figure"><img src="/uploads/biology/mean-arterial-pressure.svg" width="720" height="300" loading="lazy" alt="Animated diagram: systolic and diastolic pressures entering the weighted average that gives mean arterial pressure" title="Mean arterial pressure"><figcaption>Systolic, diastolic, and the mean that drives perfusion.</figcaption></figure><p>The one-line formula is a weighted average. Systolic pressure is counted once and diastolic pressure twice, because diastole lasts roughly twice as long as systole: at a resting heart rate of 70, the heart spends about two-thirds of every beat relaxed and filling, and only one-third contracted. The mean is therefore pulled towards the diastolic number, which is why 120/80 gives 93 mmHg rather than the 100 a plain average would give.</p><table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>SBP</code></td><td>systolic pressure</td><td>mmHg</td></tr><tr><td><code>DBP</code></td><td>diastolic pressure</td><td>mmHg</td></tr><tr><td><code>MAP</code></td><td>mean arterial pressure</td><td>mmHg</td></tr></tbody></table><p><strong>Where the relationship comes from.</strong> The (SBP + 2·DBP)/3 approximation is the standard clinical estimate of mean arterial pressure; the exact mean is the area under the arterial waveform divided by the cycle length, which needs a pressure trace rather than two cuff numbers.</p>
            TXT],
            ['title' => 'What each reading is, and what the page does with it', 'html' => <<<'TXT'
            <p><strong>Systolic pressure</strong> is the peak of the arterial waveform, reached while the left ventricle is ejecting. <strong>Diastolic pressure</strong> is the trough, at the end of filling. <strong>Pulse pressure</strong> is the difference between them and is reported as its own result, because it carries information the mean loses: a wide pulse pressure with a normal mean is a stiff aorta, not a healthy one.</p><p>The page reads the two numbers you have and returns four:</p><ul><li><strong>Mean arterial pressure</strong> — the weighted average above, in mmHg.</li><li><strong>Pulse pressure</strong> — SBP − DBP, in mmHg.</li><li><strong>Distance above the 65 mmHg floor</strong> — how much headroom the mean has over the perfusion target used in critical care. A negative number is a mean below the floor, not an error.</li><li><strong>Rate-pressure product</strong> — systolic pressure × 70 beats per minute, the resting estimate of myocardial oxygen demand; the same quantity is usually called the double product.</li></ul>
            TXT],
            ['title' => 'A worked example with the numbers on this page', 'html' => <<<'TXT'
            <p>Take a resting adult reading of 120/80 mmHg, the example this page opens with:</p><ol><li>MAP = (120 + 2 × 80) ÷ 3 = 280 ÷ 3 = <strong>93.33 mmHg</strong>.</li><li>Pulse pressure = 120 − 80 = <strong>40.00 mmHg</strong>.</li><li>Headroom above 65 = 93.33 − 65 = <strong>28.33 mmHg</strong>.</li><li>Rate-pressure product = 120 × 70 = <strong>8,400</strong>.</li></ol><p>A plain average of the same two numbers would give 100 mmHg, seven points higher than the weighted answer — enough to turn a reading that is only just adequate into one that looks comfortable. That is the whole reason for the weighting.</p>
            TXT],
            ['title' => 'What the number means, in bands', 'html' => <<<'TXT'
            <p>MAP is read against the perfusion it buys, not against the population average:</p><table><caption>Ranges and what they mean</caption><thead><tr><th>MAP</th><th>Reading</th><th>What it means</th></tr></thead><tbody><tr><td>below 65 mmHg</td><td>Inadequate perfusion</td><td>organ hypoperfusion; the usual resuscitation target is 65</td></tr><tr><td>65 – 70</td><td>Minimum target</td><td>accepted in most critically ill adults</td></tr><tr><td>70 – 100</td><td>Normal</td><td>typical resting range</td></tr><tr><td>above 100</td><td>Elevated</td><td>hypertension or increased vascular resistance</td></tr></tbody></table><p>MAP is what organs actually see. A systolic of 90 with a diastolic of 60 gives a MAP of 70, which is adequate; 160/50 gives 87, a similar mean with very different physiology — a wide pulse pressure on a stiff circulation rather than a narrow one on a failing pump. The mean alone cannot tell those apart, so the page reports the pulse pressure beside it.</p>
            TXT],
            ['title' => 'How do I use the calculator?', 'html' => <<<'TXT'
            <ol><li>Enter the systolic pressure — the first number of a reading written 120/80.</li><li>Enter the diastolic pressure — the second number.</li><li>Press <strong>Calculate</strong>. The four results fill in together and follow every edit afterwards, with no page to reload.</li><li>Read the mean against the bands above, then read the pulse pressure beside it.</li></ol><p>Both boxes accept decimals and either unit convention; nothing is rounded before the arithmetic, and the results are shown to two decimals.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Averaging systolic and diastolic with equal weight.</strong> The result runs several mmHg high, always in the same direction, and the error grows as the pulse pressure widens.</li><li><strong>A cuff that is too small.</strong> It overestimates both pressures — often the systolic more — so the mean, the pulse pressure and the headroom above 65 are all wrong together.</li><li><strong>Treating MAP as a substitute for clinical assessment.</strong> A number above 65 says the arithmetic is satisfied; it does not say the organs are perfused.</li></ul><p>An irregular rhythm is the fourth trap: with atrial fibrillation the beat-to-beat interval varies, so two cuff readings taken minutes apart can differ by more than the formula's own approximation error. Take several readings and work from the average rather than from one.</p>
            TXT],
            ['title' => 'MAP in practice', 'html' => <<<'TXT'
            <p>In critical care the mean is the number that gets treated. Sepsis guidelines target a MAP of at least 65 mmHg after fluids, and that single threshold comes from the same weighted average this page computes. In neurocritical care the target is often higher — 80 to 90 mmHg — because cerebral perfusion pressure is calculated as MAP minus intracranial pressure, so every point of mean is a point of cerebral perfusion.</p><p>In obstetrics the mean matters in the other direction. A rise in average MAP early in pregnancy is one of the signals used when pre-eclampsia is suspected, and the mid-pregnancy mean is read against the woman's own earlier readings rather than against a population band.</p><p>Outside hospital the mean is the reason a blood pressure can look alarming and be adequate: 85/55 gives a MAP of 65, exactly at the floor, while 150/95 gives 113 and sits well into the elevated band. The two numbers on the cuff are not interchangeable, and the mean is the one that describes what the organs receive.</p>
            TXT],
            ['title' => 'Using the mean with the rest of the chart', 'html' => <<<'TXT'
            <p>The mean is one number on an observation chart, and it is most useful next to the others. With a heart rate it gives the shock index (rate ÷ systolic); with a lactate it separates a low mean that is being compensated from one that is not; with a urine output it turns a pressure into evidence that the pressure is reaching the kidney. None of those combinations is a formula this page can run for you, because each needs a second measurement from a different instrument.</p><p>Two related arithmetic steps are worth having in mind. Cerebral perfusion pressure is MAP minus intracranial pressure, so a MAP of 70 against an intracranial pressure of 20 leaves 50 mmHg of perfusion — the number a head-injury protocol actually targets. The shock index divides heart rate by systolic pressure, and a value above 0.9 alongside a low mean is the pattern that gets a patient seen quickly.</p><p>For the reading itself, sit quietly for five minutes before the cuff goes on, keep the arm supported at heart level, and take two readings a minute apart. The mean of the two is what belongs in this calculator; a single reading taken straight after climbing stairs is a measurement of the stairs.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li>The formula is an approximation of the waveform, not a physical average. In a vasodilated septic circulation the diastolic decay is faster than the model assumes, and the estimate drifts high.</li><li>It assumes a regular rhythm. In atrial fibrillation the true mean must be averaged over many beats.</li><li>A cuff measures the brachial artery; the aorta and the cerebral circulation see slightly different pressures, and in the elderly the difference between central and peripheral systolic pressure can be 10 mmHg or more.</li><li>The rate-pressure product on this page uses a fixed rate of 70 beats per minute. It is an estimate of myocardial demand at rest, not a measurement — for a real value, multiply the systolic pressure by the actual heart rate.</li><li>No calculator replaces a clinician. A number in the normal band is not a diagnosis, and a number outside it is a reason to look, not a conclusion.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a normal MAP?', 'a' => 'About 70–100 mmHg at rest; 65 mmHg is the usual floor for organ perfusion.'],
            ['q' => 'Why not use the true average?', 'a' => 'It requires the arterial waveform; the weighted formula is close enough for clinical use.'],
            ['q' => 'How is mean arterial pressure different from blood pressure?', 'a' => <<<'TXT'
            A blood pressure reading is two numbers — the peak and the trough. The mean is the average pressure across the whole cycle, weighted towards the trough, and it is the pressure the organs are actually perfused at.
            TXT],
            ['q' => 'What does a MAP below 65 mmHg mean?', 'a' => <<<'TXT'
            It means the average pressure driving blood into the capillary beds is below the level usually needed to keep organs perfused. It is a threshold for action, not a diagnosis: the cause can be blood loss, sepsis, heart failure or a drug effect.
            TXT],
            ['q' => 'Can I get MAP from a single systolic reading?', 'a' => <<<'TXT'
            No. The formula needs both numbers. An estimate that assumes a diastolic value assumes a pulse pressure, and a wrong assumption of 40 mmHg moves the mean by about 13 mmHg.
            TXT],
            ['q' => 'Why is the pulse pressure reported separately?', 'a' => <<<'TXT'
            Because two people can share a mean and have very different circulations. A wide pulse pressure points to a stiff aorta or a leaking valve; a narrow one to a low stroke volume.
            TXT],
            ['q' => 'Is the rate-pressure product the same as the double product?', 'a' => <<<'TXT'
            Yes — systolic pressure multiplied by heart rate. This page uses a resting rate of 70 beats per minute, so treat its value as a resting estimate and multiply by the real rate when you have one.
            TXT],
            ['q' => 'Does this work for children or animals?', 'a' => <<<'TXT'
            The arithmetic does, the bands do not. Normal values for children, infants and animals differ by age and species, so read the mean against the range for the patient in front of you.
            TXT],
        ],
        'related' => [
            ['path' => '/health/blood-pressure', 'name' => 'Blood pressure'],
            ['path' => '/biology/acid-base-balance', 'name' => 'Acid-base balance'],
            ['path' => '/health/ecg-heart-rate', 'name' => 'ECG heart rate'],
        ],
    ],
];
