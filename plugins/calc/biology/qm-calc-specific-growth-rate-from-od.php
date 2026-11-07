<?php

/**
 * Specific Growth Rate from OD Readings
 * /biology/specific-growth-rate-from-od
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Specific Growth Rate from OD Readings',
    'meta' => ['title' => 'Specific Growth Rate from OD Readings Calculator', 'description' => 'Enter OD at start, OD at end and Time between readings into Specific Growth Rate from OD Readings and the answer comes back as Specific growth rate and…', 'h1' => 'Specific Growth Rate from OD Readings', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'od_start',
                            'label' => 'OD at start',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.05',
                        ],
                        [
                            'name' => 'od_end',
                            'label' => 'OD at end',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0.9',
                        ],
                        [
                            'name' => 'hours',
                            'label' => 'Time between readings',
                            'type' => 'number',
                            'suffix' => 'h',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3',
                        ],
                        [
                            'name' => 'mu',
                            'label' => 'Specific growth rate',
                            'type' => 'number',
                            'suffix' => 'h⁻¹',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'doubling_h',
                            'label' => 'Doubling time',
                            'type' => 'number',
                            'suffix' => 'h',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'generations',
                            'label' => 'Generations',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cells_end',
                            'label' => 'Cell density at the end',
                            'type' => 'number',
                            'suffix' => 'cells/mL',
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
            'title' => 'Rate',
            'results' => ['mu' => '(log(od_end)-log(od_start))/hours', 'doubling_h' => '0.6931471805599453/((log(od_end)-log(od_start))/hours)', 'generations' => '(log(od_end)-log(od_start))/0.6931471805599453', 'cells_end' => 'od_end*800000000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter OD at start, OD at end and Time between readings into Specific Growth Rate from OD Readings and the answer comes back as Specific growth rate and Doubling time. There is no hidden constant here: change Specific growth rate and OD at start moves with it. The main result, Specific growth rate, is reported in h⁻¹.
        TXT,
        'sections' => [
            ['title' => 'How the Specific Growth Rate from OD Readings calculator works', 'html' => <<<'TXT'
            <p>The Specific Growth Rate from OD Readings calculator applies one relationship to 3 numbers and reports Specific growth rate, Doubling time and Generations.</p><p>In the form&#039;s own words, Specific growth rate = (ln(OD at end) − ln(OD at start)) ÷ Time between readings.</p><p>The answers are Specific growth rate, Doubling time, Generations and Cell density at the end; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>OD at start</strong> — a plain number, no unit</li><li><strong>OD at end</strong> — a plain number, no unit</li><li><strong>Time between readings</strong> — in h</li></ul><p>The result boxes are Specific growth rate in h⁻¹, Doubling time in h, Generations, Cell density at the end in cells/mL; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — OD at start = 0.05, OD at end = 0.9 and Time between readings = 3 h — through the same formula and the panel reports &lt;strong&gt;Specific growth rate&lt;/strong&gt; = 0.9635 h⁻¹, &lt;strong&gt;Doubling time&lt;/strong&gt; = 0.7194 h, &lt;strong&gt;Generations&lt;/strong&gt; = 4.17 and &lt;strong&gt;Cell density at the end&lt;/strong&gt; = 7.200e+8 cells/mL.</p><ul><li><strong>Specific growth rate</strong> = 0.9635 h⁻¹</li><li><strong>Doubling time</strong> = 0.7194 h</li><li><strong>Generations</strong> = 4.17</li><li><strong>Cell density at the end</strong> = 7.200e+8 cells/mL</li></ul><p>That is <strong>Specific growth rate</strong> = <code>(ln(OD at end) − ln(OD at start)) ÷ Time between readings</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Specific growth rate&lt;/strong&gt; = 0.9635, &lt;strong&gt;Doubling time&lt;/strong&gt; = 0.7194, &lt;strong&gt;Generations&lt;/strong&gt; = 4.17 and &lt;strong&gt;Cell density at the end&lt;/strong&gt; = 7.200e+8. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Specific growth rate is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Specific growth rate</strong> = <code>(ln(OD at end) − ln(OD at start)) ÷ Time between readings</code></li><li><strong>Doubling time</strong> = <code>0.6931471805599453 ÷ ((ln(OD at end) − ln(OD at start)) ÷ Time between readings)</code></li><li><strong>Generations</strong> = <code>(ln(OD at end) − ln(OD at start)) ÷ 0.6931471805599453</code></li><li><strong>Cell density at the end</strong> = <code>OD at end × 800000000</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Specific growth rate</strong> = <code>(ln(OD at end) − ln(OD at start)) ÷ Time between readings</code> — the form to use when OD at end, OD at start and Time between readings are the values you have.</li><li><strong>Doubling time</strong> = <code>0.6931471805599453 ÷ ((ln(OD at end) − ln(OD at start)) ÷ Time between readings)</code> — the form to use when OD at end, OD at start and Time between readings are the values you have.</li><li><strong>Generations</strong> = <code>(ln(OD at end) − ln(OD at start)) ÷ 0.6931471805599453</code> — the form to use when OD at end and OD at start are the values you have.</li><li><strong>Cell density at the end</strong> = <code>OD at end × 800000000</code> — the form to use when OD at end are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Specific growth rate, Doubling time and Generations can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double OD at start from 0.05 to 0.1, leaving every other box alone. The panel moves from &lt;strong&gt;Specific growth rate&lt;/strong&gt; 0.9635 h⁻¹, &lt;strong&gt;Doubling time&lt;/strong&gt; 0.7194 h, &lt;strong&gt;Generations&lt;/strong&gt; 4.17 and &lt;strong&gt;Cell density at the end&lt;/strong&gt; 7.200e+8 cells/mL to &lt;strong&gt;Specific growth rate&lt;/strong&gt; 0.7324 h⁻¹, &lt;strong&gt;Doubling time&lt;/strong&gt; 0.9464 h, &lt;strong&gt;Generations&lt;/strong&gt; 3.17 and &lt;strong&gt;Cell density at the end&lt;/strong&gt; 7.200e+8 cells/mL.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Specific growth rate, Doubling time and Generations are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>OD at start left as a guess.</strong> Anything typed into OD at start is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>OD at end left as a guess.</strong> Anything typed into OD at end is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Time between readings left as a guess.</strong> Anything typed into Time between readings is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in OD at start and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>OD at start</strong> takes a plain number with no unit attached. It feeds Specific growth rate, Doubling time and Generations. Have it to hand before you start: OD at start is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>OD at end</strong> takes a plain number with no unit attached. It feeds Specific growth rate, Doubling time and Generations. Have it to hand before you start: OD at end is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Time between readings</strong> is measured in h. It feeds Specific growth rate and Doubling time. Have it to hand before you start: Time between readings is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Specific growth rate</strong> is a plain number and the page's own defaults put it at 0.9635. It is computed from OD at end, OD at start and Time between readings, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Doubling time</strong> is a plain number and the page's own defaults put it at 0.7194. It is computed from OD at end, OD at start and Time between readings, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Generations</strong> is a plain number and the page's own defaults put it at 4.17. It is computed from OD at end and OD at start, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Cell density at the end</strong> is a plain number and the page's own defaults put it at 7.200e+8. It is computed from OD at end, so it changes the moment any of them does. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Specific growth rate</th><th>Doubling time</th><th>Generations</th><th>Cell density at the end</th></tr></thead><tbody><tr><td><strong>OD at start</strong> +10%</td><td>-3.3%</td><td>+3.41%</td><td>-3.3%</td><td>+0%</td></tr><tr><td><strong>OD at end</strong> +10%</td><td>+3.3%</td><td>-3.19%</td><td>+3.3%</td><td>+10%</td></tr><tr><td><strong>Time between readings</strong> +10%</td><td>-9.09%</td><td>+10%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to OD at end: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With OD at start = 0.025, OD at end = 0.45 and Time between readings = 1.5 h, the answer is <strong>Specific growth rate</strong> = 1.93 h⁻¹, <strong>Doubling time</strong> = 0.3597 h, <strong>Generations</strong> = 4.17 and <strong>Cell density at the end</strong> = 3.600e+8 cells/mL.</li><li>With OD at start = 0.15, OD at end = 0.9 and Time between readings = 3 h, the answer is <strong>Specific growth rate</strong> = 0.5973 h⁻¹, <strong>Doubling time</strong> = 1.16 h, <strong>Generations</strong> = 2.58 and <strong>Cell density at the end</strong> = 7.200e+8 cells/mL.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Specific growth rate is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes OD at start, OD at end and Time between readings are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: OD at start, OD at end and Time between readings measured, Specific growth rate and Doubling time wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/base-pair-to-kda">Base Pair to kDa Calculator</a>, <a href="/biology/bca-assay-calculator">BCA Assay (standard curve) Calculator</a> and <a href="/biology/beer-lambert-a280-protein-concentration">Beer-Lambert A280 Protein Concentration Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Specific Growth Rate from OD Readings calculator work out?', 'a' => <<<'TXT'
            Specific growth rate, Doubling time, Generations and Cell density at the end, from OD at end, OD at start and Time between readings. The relationship is Specific growth rate = (ln(OD at end) − ln(OD at start)) ÷ Time between readings.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'OD at start, OD at end, Time between readings (h). With od_start, od_end and hours in place, Specific growth rate can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Specific growth rate, Doubling time, Generations and Cell density at the end can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Specific growth rate = 0.9635 h⁻¹, Doubling time = 0.7194 h, Generations = 4.17 and Cell density at the end = 7.200e+8 cells/mL. That comes from the page's own defaults, entered in OD at start; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Specific growth rate is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With OD at start left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Specific growth rate keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/base-pair-to-kda', 'name' => 'Base Pair to kDa Calculator'],
            ['path' => '/biology/bca-assay-calculator', 'name' => 'BCA Assay (standard curve) Calculator'],
            ['path' => '/biology/beer-lambert-a280-protein-concentration', 'name' => 'Beer-Lambert A280 Protein Concentration Calculator'],
        ],
        'authors' => [],
    ],
];
