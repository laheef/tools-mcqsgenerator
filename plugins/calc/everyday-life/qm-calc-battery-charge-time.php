<?php

/**
 * Battery Charge Time Calculator
 * /everyday-life/battery-charge-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Battery Charge Time Calculator',
    'meta' => ['title' => 'Battery Charge Time — Hours to Fill a Battery', 'description' => 'How long a battery takes to charge from a given depth of discharge, with the charger\'s current and the losses of the charging itself taken into account.', 'h1' => 'Battery Charge Time Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'capacity',
                    'label' => 'Battery capacity',
                    'type' => 'number',
                    'suffix' => 'Ah',
                    'default' => '100',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'current',
                    'label' => 'Charger current',
                    'type' => 'number',
                    'suffix' => 'A',
                    'default' => '10',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'depth',
                    'label' => 'How empty it is',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '50',
                    'help' => 'Half empty is 50. A battery discharged to 20 % remaining needs 80.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'efficiency',
                    'label' => 'Charging efficiency',
                    'type' => 'select',
                    'options' => ['90 %, lead acid' => 90, '95 %, AGM' => 95, '99 %, lithium' => 99],
                    'control' => 'SELECT',
                    'default' => '90 %, lead acid',
                ],
                [
                    'name' => 'hours',
                    'label' => 'Time on charge',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'ah_needed',
                    'label' => 'Charge to put back',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'Ah',
                ],
                [
                    'name' => 'hours_flat',
                    'label' => 'Time from completely flat',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
            ],
        ],
    ],
    'formula' => ['ah_needed' => 'capacity * depth / 100', 'hours' => 'capacity * depth / 100 / (current * efficiency / 100)', 'hours_flat' => 'capacity / (current * efficiency / 100)'],
    'article' => [
        'intro' => <<<'TXT'
        Capacity, current, how empty the battery is and how efficient the charger is, turned into hours on charge. The efficiency is the part that makes the answer realistic.
        TXT,
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A hundred-amp-hour battery and a ten-amp charger is ten hours, except that it is not. Two things lengthen it: the battery is rarely empty, and the charging itself loses energy to heat. A lead-acid battery loses about a tenth, an AGM rather less, lithium very little.</p><p>The page takes the depth you actually discharged to, so a battery at half gives five hours rather than ten, and divides by the efficiency as well. The flat line is there for the case where the battery is new and the question is the charger's real capacity.</p><p>The answer is <strong>time on charge and charge to put back and time from completely flat</strong>, worked out from battery capacity and charger current and how empty it is and charging efficiency. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>ah_needed</strong></td><td><code>Battery capacity × How empty it is ÷ 100</code></td></tr><tr><td><strong>hours</strong></td><td><code>Battery capacity × How empty it is ÷ 100 ÷ (Charger current × Charging efficiency ÷ 100)</code></td></tr><tr><td><strong>hours_flat</strong></td><td><code>Battery capacity ÷ (Charger current × Charging efficiency ÷ 100)</code></td></tr></tbody></table><p>Charge to put back is capacity times depth over a hundred. Time is that figure divided by the charger's current and by the efficiency, since only that fraction of the current ends up stored.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 4 boxes to fill. It reports time on charge and charge to put back and time from completely flat.</p><ul><li><strong>Battery capacity</strong> — Ah.</li><li><strong>Charger current</strong> — A.</li><li><strong>How empty it is</strong> — %. Half empty is 50. A battery discharged to 20 % remaining needs 80.</li><li><strong>Charging efficiency</strong>. A choice: 90 %, lead acid, 95 %, AGM, 99 %, lithium.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Time on charge</strong> — h.</li><li><strong>Charge to put back</strong> — Ah.</li><li><strong>Time from completely flat</strong> — h.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put battery capacity = 100 Ah, charger current = 10 A, how empty it is = 50 %, charging efficiency = 90 into the form and the panel reads:</p><ul><li><strong>Time on charge</strong> = <code>Battery capacity × How empty it is ÷ 100 ÷ (Charger current × Charging efficiency ÷ 100)</code> = <strong>5.556 h</strong></li><li><strong>Charge to put back</strong> = <code>Battery capacity × How empty it is ÷ 100</code> = <strong>50 Ah</strong></li><li><strong>Time from completely flat</strong> = <code>Battery capacity ÷ (Charger current × Charging efficiency ÷ 100)</code> = <strong>11.111 h</strong></li></ul><p>The last ten per cent takes as long as the first thirty on lead-acid, which is why the calculated figure is a floor rather than a promise.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>100 × 50 ÷ 100 ÷ (10 × 90 ÷ 100)</code>, which comes to <strong>5.556 h</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>A 100 Ah battery half empty, charged at 10 A at 90 per cent efficiency, takes 5.56 hours and puts back 50 Ah. From flat it would take 11.1 hours.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Time on charge</th><th>Charge to put back</th><th>Time from completely flat</th></tr></thead><tbody><tr><td><strong>Battery capacity</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Charger current</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td></tr><tr><td><strong>How empty it is</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Charging efficiency</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Battery capacity</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Battery capacity</strong> opens at 100 Ah</li><li><strong>Charger current</strong> opens at 10 A</li><li><strong>How empty it is</strong> opens at 50 % — Half empty is 50. A battery discharged to 20 % remaining needs 80.</li><li><strong>Charging efficiency</strong> opens at 90</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Battery capacity</th><th>Time on charge</th><th>Charge to put back</th><th>Time from completely flat</th></tr></thead><tbody><tr><td>50 Ah</td><td>2.778</td><td>25</td><td>5.556</td></tr><tr><td>100 Ah</td><td>5.556</td><td>50</td><td>11.111</td></tr><tr><td>200 Ah</td><td>11.111</td><td>100</td><td>22.222</td></tr><tr><td>500 Ah</td><td>27.778</td><td>250</td><td>55.556</td></tr><tr><td>1 000 Ah</td><td>55.556</td><td>500</td><td>111.111</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set battery capacity = 100, charger current = 20, how empty it is = 50, charging efficiency = 99: <strong>Time on charge</strong> = 2.525 h, <strong>Charge to put back</strong> = 50 Ah, <strong>Time from completely flat</strong> = 5.051 h. Doubling the current halves the time on a lithium battery: 2.53 hours, which is what makes fast charging possible.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Charging too fast.</strong> Lead-acid wants about a tenth of capacity in amps, so 10 A for 100 Ah; lithium tolerates more and needs a different profile.</li><li><strong>Ignoring the tail.</strong> A charger's bulk phase ends at about eighty per cent and the rest is slow, so add time rather than trusting the division.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Constant current assumed.</strong> Real chargers taper, and the last part of the charge takes longer than the arithmetic says.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need battery capacity and charger current and how empty it is and charging efficiency. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Time on charge and charge to put back and time from completely flat should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Timing a charge from a solar panel or a boat charger.</li></li><li><li>Checking whether an overnight charge is enough.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/generator-wattage">Generator wattage</a> <a href="/everyday-life/appliance-wattage">Appliance wattage</a> <a href="/everyday-life/tesla-charging-cost">EV charging cost</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Battery capacity</strong> ×10</td><td>5.556</td><td>55.556</td><td>ten times larger</td></tr><tr><td><strong>Charger current</strong> ×10</td><td>5.556</td><td>0.556</td><td>ten times smaller</td></tr><tr><td><strong>How empty it is</strong> ×10</td><td>5.556</td><td>55.556</td><td>ten times larger</td></tr><tr><td><strong>Charging efficiency</strong> ×10</td><td>5.556</td><td>0.556</td><td>ten times smaller</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Battery Charge Time calculator work out?', 'a' => <<<'TXT'
            It returns time on charge and charge to put back and time from completely flat from battery capacity and charger current and how empty it is and charging efficiency. The relationship is Battery capacity × How empty it is ÷ 100.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Battery capacity (Ah), Charger current (A), How empty it is (%), Charging efficiency. Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: battery capacity in Ah; charger current in A; how empty it is in %. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why does efficiency lengthen the time?', 'a' => 'Because some of the current becomes heat rather than stored charge. Dividing by the efficiency is the same as saying you need more amp-hours in than come out.'],
            ['q' => 'Can I charge a 100 Ah battery at 50 A?', 'a' => 'On lead-acid, no: half the capacity in amps is too fast for the chemistry. Lithium handles it and specifies its own maximum.'],
            ['q' => 'Does the depth of discharge mean what is left or what is gone?', 'a' => 'What is gone. A battery at 50 per cent depth has half its capacity to put back.'],
        ],
        'related' => [
            ['path' => '/everyday-life/generator-wattage', 'name' => 'Generator wattage'],
            ['path' => '/everyday-life/appliance-wattage', 'name' => 'Appliance wattage'],
            ['path' => '/everyday-life/tesla-charging-cost', 'name' => 'EV charging cost'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
