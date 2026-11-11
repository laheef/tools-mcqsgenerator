<?php

/**
 * Compression Ratio to PSI Calculator
 * /everyday-life/compression-ratio-to-psi
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Compression Ratio to PSI Calculator',
    'meta' => ['title' => 'Compression Ratio to PSI — What the Gauge Should Read', 'description' => 'A cranking compression gauge reads roughly nineteen pounds for every point of compression ratio: the rule, the number it gives, and how a camshaft moves it.', 'h1' => 'Compression Ratio to PSI Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'ratio',
                    'label' => 'Compression ratio',
                    'type' => 'number',
                    'suffix' => ':1',
                    'default' => '10.95',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'psi_point',
                    'label' => 'Pounds per point of ratio',
                    'type' => 'number',
                    'suffix' => 'psi',
                    'default' => '19',
                    'help' => 'Nineteen is the usual rule of thumb at sea level with a warm engine and the throttle open. Cold, closed-throttle and high altitude all read lower.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'cam',
                    'label' => 'Camshaft adjustment',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '0',
                    'help' => 'A long-duration cam bleeds compression at low speed. Ten to fifteen per cent is ordinary for a performance cam.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'psi',
                    'label' => 'Cranking pressure',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'psi',
                ],
                [
                    'name' => 'adjusted',
                    'label' => 'With the cam',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'psi',
                ],
                [
                    'name' => 'per_point',
                    'label' => 'Per point of ratio',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'psi',
                ],
                [
                    'name' => 'ratio_from',
                    'label' => 'Ratio from 180 psi',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => ':1',
                ],
            ],
        ],
    ],
    'formula' => ['psi' => 'ratio * psi_point', 'adjusted' => 'ratio * psi_point * (1 - cam / 100)', 'per_point' => 'psi_point', 'ratio_from' => '180 / psi_point'],
    'article' => [
        'intro' => 'The cranking compression a given ratio should produce, and what a change of ratio or a bigger camshaft does to the reading on the gauge.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A compression gauge measures the pressure the piston builds at cranking speed, and for ordinary engines it lands near nineteen pounds for every point of compression ratio. Ten and a half to one reads about 200 psi.</p><p>The rule is a rule. A big camshaft holds the inlet valve open into the stroke and bleeds pressure, so the same engine reads 170; a cold engine, a throttle that is not held open and a mile of altitude all read low as well, and none of them is a fault.</p><p>The answer is <strong>cranking pressure and with the cam and per point of ratio and ratio from 180 psi</strong>, worked out from compression ratio and pounds per point of ratio and camshaft adjustment. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>psi</strong></td><td><code>Compression ratio × Pounds per point of ratio</code></td></tr><tr><td><strong>adjusted</strong></td><td><code>Compression ratio × Pounds per point of ratio × (1 - Camshaft adjustment ÷ 100)</code></td></tr><tr><td><strong>per_point</strong></td><td><code>Pounds per point of ratio</code></td></tr><tr><td><strong>ratio_from</strong></td><td><code>180 ÷ Pounds per point of ratio</code></td></tr></tbody></table><p>Ratio times nineteen gives the cranking pressure. The cam adjustment takes a percentage off, and the reverse figure divides a measured 180 psi by the same constant to give a ratio back.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill. It reports cranking pressure and with the cam and per point of ratio and ratio from 180 psi.</p><ul><li><strong>Compression ratio</strong> — :1.</li><li><strong>Pounds per point of ratio</strong> — psi. Nineteen is the usual rule of thumb at sea level with a warm engine and the throttle open. Cold, closed-throttle and high altitude all read lower.</li><li><strong>Camshaft adjustment</strong> — %. A long-duration cam bleeds compression at low speed. Ten to fifteen per cent is ordinary for a performance cam.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Cranking pressure</strong> — psi.</li><li><strong>With the cam</strong> — psi.</li><li><strong>Per point of ratio</strong> — psi.</li><li><strong>Ratio from 180 psi</strong> — :1.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put compression ratio = 10.95 :1, pounds per point of ratio = 19 psi, camshaft adjustment = 0 % into the form and the panel reads:</p><ul><li><strong>Cranking pressure</strong> = <code>Compression ratio × Pounds per point of ratio</code> = <strong>208.05 psi</strong></li><li><strong>With the cam</strong> = <code>Compression ratio × Pounds per point of ratio × (1 - Camshaft adjustment ÷ 100)</code> = <strong>208.05 psi</strong></li><li><strong>Per point of ratio</strong> = <code>Pounds per point of ratio</code> = <strong>19 psi</strong></li><li><strong>Ratio from 180 psi</strong> = <code>180 ÷ Pounds per point of ratio</code> = <strong>9.474 :1</strong></li></ul><p>Consistency matters more than the absolute number: four cylinders within ten per cent of each other are healthy whatever the gauge says.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>10.95 × 19</code>, which comes to <strong>208.05 psi</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>10.95 to one at nineteen pounds a point is 208 psi, or 177 with a cam that bleeds fifteen per cent. A gauge reading of 180 implies a ratio of 9.5.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Cranking pressure</th><th>With the cam</th><th>Per point of ratio</th><th>Ratio from 180 psi</th></tr></thead><tbody><tr><td><strong>Compression ratio</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Pounds per point of ratio</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Camshaft adjustment</strong> +10 %</td><td>+0 %</td><td>−0.1 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Pounds per point of ratio</strong>. <strong>Camshaft adjustment</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Compression ratio</strong> opens at 10.95 :1</li><li><strong>Pounds per point of ratio</strong> opens at 19 psi — Nineteen is the usual rule of thumb at sea level with a warm engine and the throttle open. Cold, closed-throttle and high altitude all read lower.</li><li><strong>Camshaft adjustment</strong> opens at 0 % — A long-duration cam bleeds compression at low speed. Ten to fifteen per cent is ordinary for a performance cam.</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Compression ratio</th><th>Cranking pressure</th><th>With the cam</th><th>Per point of ratio</th><th>Ratio from 180 psi</th></tr></thead><tbody><tr><td>5.475 :1</td><td>104.025</td><td>104.025</td><td>19</td><td>9.474</td></tr><tr><td>10.95 :1</td><td>208.05</td><td>208.05</td><td>19</td><td>9.474</td></tr><tr><td>21.9 :1</td><td>416.1</td><td>416.1</td><td>19</td><td>9.474</td></tr><tr><td>54.75 :1</td><td>1 040.25</td><td>1 040.25</td><td>19</td><td>9.474</td></tr><tr><td>109.5 :1</td><td>2 080.5</td><td>2 080.5</td><td>19</td><td>9.474</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set compression ratio = 9.5, pounds per point of ratio = 19, camshaft adjustment = 0: <strong>Cranking pressure</strong> = 180.5 psi, <strong>With the cam</strong> = 180.5 psi, <strong>Per point of ratio</strong> = 19 psi, <strong>Ratio from 180 psi</strong> = 9.474 :1. 9.5 to one at the same nineteen a point is 180.5 psi — the figure most older V8s quote, and why a modern 11:1 engine reads much higher.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Testing a cold engine.</strong> Cold rings do not seal and the reading is thirty to fifty pounds low. Warm it up, hold the throttle open and use a screw-in gauge.</li><li><strong>Reading altitude as a fault.</strong> Three per cent per thousand feet is ordinary, so a car at 5 000 feet reads fifteen per cent below its sea-level figure.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Rule of thumb.</strong> The relation depends on valve timing and camshaft duration. It predicts a healthy range, not a diagnosis.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need compression ratio and pounds per point of ratio and camshaft adjustment. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Cranking pressure and with the cam and per point of ratio and ratio from 180 psi should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Checking an engine against its specified ratio before buying.</li></li><li><li>Working out whether a low gauge reading is the ratio or a fault.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/compression-ratio">Compression ratio</a> <a href="/everyday-life/horsepower">Horsepower</a> <a href="/everyday-life/turbo-size">Turbo size</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Compression ratio</strong> ×10</td><td>208.05</td><td>2 080.5</td><td>ten times larger</td></tr><tr><td><strong>Pounds per point of ratio</strong> ×10</td><td>208.05</td><td>2 080.5</td><td>ten times larger</td></tr><tr><td><strong>Camshaft adjustment</strong> ×10</td><td>208.05</td><td>208.05</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Compression Ratio to PSI calculator work out?', 'a' => <<<'TXT'
            It returns cranking pressure and with the cam and per point of ratio and ratio from 180 psi from compression ratio and pounds per point of ratio and camshaft adjustment. The relationship is Compression ratio × Pounds per point of ratio.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Compression ratio (:1), Pounds per point of ratio (psi), Camshaft adjustment (%). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: compression ratio in :1; pounds per point of ratio in psi; camshaft adjustment in %. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why nineteen pounds a point?', 'a' => <<<'TXT'
            Because atmospheric pressure is 14.7 psi and the compression is roughly adiabatic, so each point of ratio adds about nineteen pounds at cranking speed. The constant is empirical.
            TXT],
            ['q' => 'Should the throttle be open?', 'a' => 'Wide open for a valid reading, yes. Closed throttle reads a fraction of the pressure because the cylinder cannot fill on the inlet stroke.'],
            ['q' => 'What difference do the rings make?', 'a' => 'A lot. A worn engine reads low and unevenly, which is exactly what the test is for: the spread across cylinders matters more than the absolute figure.'],
        ],
        'related' => [
            ['path' => '/everyday-life/compression-ratio', 'name' => 'Compression ratio'],
            ['path' => '/everyday-life/horsepower', 'name' => 'Horsepower'],
            ['path' => '/everyday-life/turbo-size', 'name' => 'Turbo size'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
