<?php

/**
 * Encounter Rate Calculator
 * /biology/encounter-rate
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Encounter Rate Calculator',
    'meta' => ['title' => 'Encounter Rate Calculator: Formula & Example', 'description' => 'Encounter Rate Calculator works out encounters per hour from encounters recorded and search time. Free to use, with the working shown beside the answer.', 'h1' => 'Encounter Rate Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'encounters',
                            'label' => 'Encounters recorded',
                            'type' => 'number',
                            'suffix' => 'events',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '48',
                        ],
                        [
                            'name' => 'time',
                            'label' => 'Search time',
                            'type' => 'number',
                            'suffix' => 'hours',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'distance',
                            'label' => 'Distance travelled',
                            'type' => 'number',
                            'suffix' => 'km',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '12',
                        ],
                        [
                            'name' => 'detect',
                            'label' => 'Detection radius',
                            'type' => 'number',
                            'suffix' => 'm',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'rate_time',
                            'label' => 'Encounters per hour',
                            'type' => 'number',
                            'suffix' => '/h',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rate_distance',
                            'label' => 'Encounters per km',
                            'type' => 'number',
                            'suffix' => '/km',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Implied prey density',
                            'type' => 'number',
                            'suffix' => '/km²',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'encounter_all',
                            'label' => 'Encounter rate (model)',
                            'type' => 'number',
                            'suffix' => '/h',
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
            'title' => 'Encounter',
            'results' => ['rate_time' => 'encounters/time', 'rate_distance' => 'encounters/distance', 'density' => 'encounters/distance/detect*1000', 'encounter_all' => 'encounters/distance/detect*1000*2*detect/1000*time'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Encounter Rate works out Encounters per hour and Encounters per km from Encounters recorded, Search time and Distance travelled. It is a single relationship that reads encounters per hour out of encounters recorded, not a table of canned results keyed by them. Units for Encounters per hour default to /h and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Encounter Rate calculator works', 'html' => <<<'TXT'
            <p>Encounter Rate answers one question from 4 numbers, and the answer is Encounters per hour, Encounters per km and Implied prey density.</p><p>In the form&#039;s own words, Encounters per hour = Encounters recorded ÷ Search time.</p><p>The result panel carries Encounters per hour, Encounters per km, Implied prey density and Encounter rate (model), each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Encounters recorded</strong> — in events</li><li><strong>Search time</strong> — in hours</li><li><strong>Distance travelled</strong> — in km</li><li><strong>Detection radius</strong> — in m</li></ul><p>The answers come back as Encounters per hour in /h, Encounters per km in /km, Implied prey density in /km², Encounter rate (model) in /h. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Encounters recorded = 48 events, Search time = 6 hours, Distance travelled = 12 km and Detection radius = 25 m — through the same formula and the panel reports <strong>Encounters per hour</strong> = 8 /h, <strong>Encounters per km</strong> = 4 /km, <strong>Implied prey density</strong> = 160 /km² and <strong>Encounter rate (model)</strong> = 48 /h.</p><ul><li><strong>Encounters per hour</strong> = 8 /h</li><li><strong>Encounters per km</strong> = 4 /km</li><li><strong>Implied prey density</strong> = 160 /km²</li><li><strong>Encounter rate (model)</strong> = 48 /h</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Encounters per hour</strong> = <code>Encounters recorded ÷ Search time</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Encounters per hour</strong> = 8, <strong>Encounters per km</strong> = 4, <strong>Implied prey density</strong> = 160 and <strong>Encounter rate (model)</strong> = 48. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Encounters per hour is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Encounters per hour</strong> = <code>Encounters recorded ÷ Search time</code></li><li><strong>Encounters per km</strong> = <code>Encounters recorded ÷ Distance travelled</code></li><li><strong>Implied prey density</strong> = <code>Encounters recorded ÷ Distance travelled ÷ Detection radius × 1000</code></li><li><strong>Encounter rate (model)</strong> = <code>Encounters recorded ÷ Distance travelled ÷ Detection radius × 1000 × 2 × Detection radius ÷ 1000 × Search time</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Encounters per hour</strong> = <code>Encounters recorded ÷ Search time</code> — the form to use when Encounters recorded and Search time are the values you have.</li><li><strong>Encounters per km</strong> = <code>Encounters recorded ÷ Distance travelled</code> — the form to use when Encounters recorded and Distance travelled are the values you have.</li><li><strong>Implied prey density</strong> = <code>Encounters recorded ÷ Distance travelled ÷ Detection radius × 1000</code> — the form to use when Encounters recorded, Distance travelled and Detection radius are the values you have.</li><li><strong>Encounter rate (model)</strong> = <code>Encounters recorded ÷ Distance travelled ÷ Detection radius × 1000 × 2 × Detection radius ÷ 1000 × Search time</code> — the form to use when Encounters recorded, Distance travelled, Detection radius and Search time are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Encounters per hour, Encounters per km and Implied prey density can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Encounters recorded from 48 to 96, leaving every other box alone. The panel moves from <strong>Encounters per hour</strong> 8 /h, <strong>Encounters per km</strong> 4 /km, <strong>Implied prey density</strong> 160 /km² and <strong>Encounter rate (model)</strong> 48 /h to <strong>Encounters per hour</strong> 16 /h, <strong>Encounters per km</strong> 8 /km, <strong>Implied prey density</strong> 320 /km² and <strong>Encounter rate (model)</strong> 96 /h.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Encounters per hour, Encounters per km and Implied prey density are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Encounters recorded left as a guess.</strong> Anything typed into Encounters recorded is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Search time left as a guess.</strong> Anything typed into Search time is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Distance travelled left as a guess.</strong> Anything typed into Distance travelled is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Encounters recorded to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Encounters recorded</strong> is measured in events. It feeds Encounters per hour, Encounters per km and Implied prey density. Have it to hand before you start: Encounters recorded is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Search time</strong> is measured in hours. It feeds Encounters per hour and Encounter rate (model). Have it to hand before you start: Search time is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Distance travelled</strong> is measured in km. It feeds Encounters per km, Implied prey density and Encounter rate (model). Have it to hand before you start: Distance travelled is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Detection radius</strong> is measured in m. It feeds Implied prey density and Encounter rate (model). Have it to hand before you start: Detection radius is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Encounters per hour</strong> is a plain number and the page's own defaults put it at 8. It is worked out from Encounters recorded and Search time. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Encounters per km</strong> is a plain number and the page's own defaults put it at 4. It is worked out from Encounters recorded and Distance travelled. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Implied prey density</strong> is a plain number and the page's own defaults put it at 160. It is worked out from Encounters recorded, Distance travelled and Detection radius. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Encounter rate (model)</strong> is a plain number and the page's own defaults put it at 48. It is worked out from Encounters recorded, Distance travelled, Detection radius and Search time. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Encounters per hour</th><th>Encounters per km</th><th>Implied prey density</th><th>Encounter rate (model)</th></tr></thead><tbody><tr><td><strong>Encounters recorded</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Search time</strong> +10%</td><td>-9.09%</td><td>+0%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Distance travelled</strong> +10%</td><td>+0%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td></tr><tr><td><strong>Detection radius</strong> +10%</td><td>+0%</td><td>+0%</td><td>-9.09%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to Encounters recorded: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Encounters recorded = 24 events, Search time = 3 hours, Distance travelled = 6 km and Detection radius = 12.5 m, the answer is <strong>Encounters per hour</strong> = 8 /h, <strong>Encounters per km</strong> = 4 /km, <strong>Implied prey density</strong> = 320 /km² and <strong>Encounter rate (model)</strong> = 24 /h.</li><li>With Encounters recorded = 144 events, Search time = 6 hours, Distance travelled = 12 km and Detection radius = 25 m, the answer is <strong>Encounters per hour</strong> = 24 /h, <strong>Encounters per km</strong> = 12 /km, <strong>Implied prey density</strong> = 480 /km² and <strong>Encounter rate (model)</strong> = 144 /h.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Encounters per hour is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Encounters recorded, Search time and Distance travelled and the number you are missing is Encounters per hour and Encounters per km.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/cell-surface-area-volume-ratio">Cell Surface Area to Volume Ratio Calculator — Formula &amp; Resul</a>, <a href="/biology/centimorgan-to-percentage">Centimorgan to Percentage Calculator</a> and <a href="/biology/centrifuge-rcf-rpm">Centrifuge RCF to RPM Converter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Encounter Rate calculator work out?', 'a' => <<<'TXT'
            Encounters per hour, Encounters per km, Implied prey density and Encounter rate (model), from Encounters recorded and Search time. The relationship is Encounters per hour = Encounters recorded ÷ Search time.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Encounters recorded (events), Search time (hours), Distance travelled (km), Detection radius (m). Fill encounters recorded, search time and distance travelled and leave Encounters per hour empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Encounters per hour, Encounters per km, Implied prey density and Encounter rate (model) can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Encounters per hour = 8 /h, Encounters per km = 4 /km, Implied prey density = 160 /km² and Encounter rate (model) = 48 /h. That comes from the page's own defaults, entered in Encounters recorded; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Encounters per hour is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Encounters recorded left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Encounters per hour at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/cell-surface-area-volume-ratio', 'name' => 'Cell Surface Area to Volume Ratio Calculator — Formula & Resul'],
            ['path' => '/biology/centimorgan-to-percentage', 'name' => 'Centimorgan to Percentage Calculator'],
            ['path' => '/biology/centrifuge-rcf-rpm', 'name' => 'Centrifuge RCF to RPM Converter Calculator'],
        ],
        'authors' => [],
    ],
];
