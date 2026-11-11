<?php

/**
 * Pleated Skirt Calculator
 * /everyday-life/pleated-skirt
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Pleated Skirt Calculator',
    'meta' => ['title' => 'Pleated Skirt — Fullness, Pleats and Fabric', 'description' => 'A pleated skirt is the waist times the fullness, so a 76 cm waist at three times fullness is 228 cm of fabric before a single pleat is folded into it.', 'h1' => 'Pleated Skirt Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'waist',
                    'label' => 'Waist measurement',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '76',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fullness',
                    'label' => 'Fullness',
                    'type' => 'number',
                    'suffix' => 'x',
                    'default' => '3',
                    'help' => 'Two is a light skirt, three is a standard pleated skirt, four or more is a costume.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'pleat',
                    'label' => 'Pleat width',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'length',
                    'label' => 'Finished length',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '60',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'allowance',
                    'label' => 'Hem and seam',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '5',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'fabric_width',
                    'label' => 'Fabric across',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
                [
                    'name' => 'pleats',
                    'label' => 'Pleats',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'pleats',
                ],
                [
                    'name' => 'cut_length',
                    'label' => 'Cut length',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'cm',
                ],
                [
                    'name' => 'area',
                    'label' => 'Fabric area',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm²',
                ],
            ],
        ],
    ],
    'formula' => ['fabric_width' => 'waist * fullness', 'pleats' => 'floor(waist * fullness / pleat)', 'cut_length' => 'length + allowance', 'area' => 'waist * fullness * (length + allowance) / 10000'],
    'article' => [
        'intro' => 'The fabric width a pleated skirt needs at a given fullness, how many pleats that makes at a chosen pleat width, and the fabric area including seams and hem.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>Pleats are fabric folded onto itself, so the skirt needs more fabric than it covers. A 76 cm waist at three times fullness is 228 cm of fabric, which in practice is two widths of a 150 cm bolt joined at a seam.</p><p>The pleat width then decides the count: 228 cm at 5 cm a pleat is 45 pleats, and the number has to be close to a whole one before the pleats meet at the seam. That is why patterns give a pleat count rather than a fabric width.</p><p>The answer is <strong>fabric across and pleats and cut length and fabric area</strong>, worked out from waist measurement and fullness and pleat width and finished length and hem and seam. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>fabric_width</strong></td><td><code>Waist measurement × Fullness</code></td></tr><tr><td><strong>pleats</strong></td><td><code>floor(Waist measurement × Fullness ÷ Pleat width)</code></td></tr><tr><td><strong>cut_length</strong></td><td><code>Finished length + Hem and seam</code></td></tr><tr><td><strong>area</strong></td><td><code>Waist measurement × Fullness × (Finished length + Hem and seam) ÷ 10000</code></td></tr></tbody></table><p>Waist times fullness gives the fabric across. Divided by the pleat width and rounded down, that gives the pleats that fit, and the area is the width times the cut length in metres.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill. It reports fabric across and pleats and cut length and fabric area.</p><ul><li><strong>Waist measurement</strong> — cm.</li><li><strong>Fullness</strong> — x. Two is a light skirt, three is a standard pleated skirt, four or more is a costume.</li><li><strong>Pleat width</strong> — cm.</li><li><strong>Finished length</strong> — cm.</li><li><strong>Hem and seam</strong> — cm.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Fabric across</strong> — cm.</li><li><strong>Pleats</strong> — pleats.</li><li><strong>Cut length</strong> — cm.</li><li><strong>Fabric area</strong> — m².</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put waist measurement = 76 cm, fullness = 3 x, pleat width = 5 cm, finished length = 60 cm, hem and seam = 5 cm into the form and the panel reads:</p><ul><li><strong>Fabric across</strong> = <code>Waist measurement × Fullness</code> = <strong>228 cm</strong></li><li><strong>Pleats</strong> = <code>floor(Waist measurement × Fullness ÷ Pleat width)</code> = <strong>45 pleats</strong></li><li><strong>Cut length</strong> = <code>Finished length + Hem and seam</code> = <strong>65 cm</strong></li><li><strong>Fabric area</strong> = <code>Waist measurement × Fullness × (Finished length + Hem and seam) ÷ 10000</code> = <strong>1.482 m²</strong></li></ul><p>At four times fullness the skirt takes 304 cm and 60 pleats, which is the difference between a school skirt and a costume.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>76 × 3</code>, which comes to <strong>228 cm</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>76 cm at three times fullness is 228 cm across, 45 pleats of 5 cm, a 65 cm cut length and 1.48 square metres of fabric.</p>'],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Fabric across</th><th>Pleats</th><th>Cut length</th><th>Fabric area</th></tr></thead><tbody><tr><td><strong>Waist measurement</strong> +10 %</td><td>+10 %</td><td>+11.11 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Fullness</strong> +10 %</td><td>+10 %</td><td>+11.11 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Pleat width</strong> +10 %</td><td>+0 %</td><td>−8.89 %</td><td>+0 %</td><td>+0 %</td></tr><tr><td><strong>Finished length</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+9.23 %</td><td>+9.23 %</td></tr><tr><td><strong>Hem and seam</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0.77 %</td><td>+0.77 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Waist measurement</strong>. <strong>Hem and seam</strong> barely moves it at all. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Waist measurement</strong> opens at 76 cm</li><li><strong>Fullness</strong> opens at 3 x — Two is a light skirt, three is a standard pleated skirt, four or more is a costume.</li><li><strong>Pleat width</strong> opens at 5 cm</li><li><strong>Finished length</strong> opens at 60 cm</li><li><strong>Hem and seam</strong> opens at 5 cm</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Waist measurement</th><th>Fabric across</th><th>Pleats</th><th>Cut length</th><th>Fabric area</th></tr></thead><tbody><tr><td>38 cm</td><td>114</td><td>22</td><td>65</td><td>0.741</td></tr><tr><td>76 cm</td><td>228</td><td>45</td><td>65</td><td>1.482</td></tr><tr><td>152 cm</td><td>456</td><td>91</td><td>65</td><td>2.964</td></tr><tr><td>380 cm</td><td>1 140</td><td>228</td><td>65</td><td>7.41</td></tr><tr><td>760 cm</td><td>2 280</td><td>456</td><td>65</td><td>14.82</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set waist measurement = 76, fullness = 4, pleat width = 5, finished length = 60, hem and seam = 5: <strong>Fabric across</strong> = 304 cm, <strong>Pleats</strong> = 60 pleats, <strong>Cut length</strong> = 65 cm, <strong>Fabric area</strong> = 1.976 m². Four times fullness is 304 cm, 60 pleats and 1.98 square metres of fabric — a third again for a fuller skirt.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Forgetting that pleats overlap.</strong> Each pleat folds three thicknesses of fabric at the fold if it is a box pleat, and the width calculation only counts the flat width.</li><li><strong>Cutting before the pleat count is settled.</strong> Pleats must divide the seam evenly or the skirt hangs crooked. Decide the count, then cut.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Even pleats only.</strong> Knife, box and accordion pleats all use the same fabric but different folding, and the count for a knife pleat is not the count for a box pleat of the same width.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need waist measurement and fullness and pleat width and finished length and hem and seam. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Fabric across and pleats and cut length and fabric area should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Buying fabric for a school or uniform skirt.</li></li><li><li>Working out how many pleats fit a bolt.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/circle-skirt">Circle skirt</a> <a href="/everyday-life/fabric">Fabric conversion</a> <a href="/everyday-life/quilt-binding">Quilt binding</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Waist measurement</strong> ×10</td><td>228</td><td>2 280</td><td>ten times larger</td></tr><tr><td><strong>Fullness</strong> ×10</td><td>228</td><td>2 280</td><td>ten times larger</td></tr><tr><td><strong>Pleat width</strong> ×10</td><td>228</td><td>228</td><td>unchanged</td></tr><tr><td><strong>Finished length</strong> ×10</td><td>228</td><td>228</td><td>unchanged</td></tr><tr><td><strong>Hem and seam</strong> ×10</td><td>228</td><td>228</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Pleated Skirt calculator work out?', 'a' => <<<'TXT'
            It returns fabric across and pleats and cut length and fabric area from waist measurement and fullness and pleat width and finished length and hem and seam. The relationship is Waist measurement × Fullness.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Waist measurement (cm), Fullness (x), Pleat width (cm), Finished length (cm), Hem and seam (cm). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: waist measurement in cm; fullness in x; pleat width in cm; finished length in cm; hem and seam in cm. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'How much fabric does a pleated skirt need?', 'a' => 'The waist times the fullness, plus seams. At three times fullness an adult skirt is 2.2 to 2.5 metres of 150 cm fabric.'],
            ['q' => 'Why does fullness come in whole numbers?', 'a' => <<<'TXT'
            Because the pleats have to divide evenly. Two-and-a-half times fullness works, but it leaves a half pleat to absorb at the seam, and a seam that eats a half pleat shows.
            TXT],
            ['q' => 'Do knife and box pleats use the same amount?', 'a' => 'The same fabric for the same fullness, and a box pleat looks fuller from the outside because it shows two flat faces rather than one.'],
        ],
        'related' => [
            ['path' => '/everyday-life/circle-skirt', 'name' => 'Circle skirt'],
            ['path' => '/everyday-life/fabric', 'name' => 'Fabric conversion'],
            ['path' => '/everyday-life/quilt-binding', 'name' => 'Quilt binding'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
