<?php

/**
 * Sunscreen Amount Calculator
 * /everyday-life/sunscreen-amount
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sunscreen Amount Calculator',
    'meta' => ['title' => 'Sunscreen Amount — 2 mg per Square Centimetre', 'description' => 'The dose sunscreen is tested at, 2 mg per square centimetre, applied to the body area you are covering: millilitres per application and bottles a summer.', 'h1' => 'Sunscreen Amount Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'area_m2',
                    'label' => 'Skin area to cover',
                    'type' => 'number',
                    'suffix' => 'm²',
                    'default' => '1.8',
                    'help' => 'An adult body is about 1.8 square metres. Face, neck and arms is nearer 0.5 and the legs add another 0.6.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'dose',
                    'label' => 'Dose',
                    'type' => 'number',
                    'suffix' => 'mg/cm²',
                    'default' => '2',
                    'help' => 'Two milligrams per square centimetre is the rate sunscreen is tested at, and the rate the SPF number refers to.',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'bottle_ml',
                    'label' => 'Bottle size',
                    'type' => 'number',
                    'suffix' => 'ml',
                    'default' => '200',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'applications_day',
                    'label' => 'Applications a day',
                    'type' => 'number',
                    'suffix' => 'times',
                    'default' => '2',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'days',
                    'label' => 'Days of use',
                    'type' => 'number',
                    'suffix' => 'days',
                    'default' => '90',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ml_app',
                    'label' => 'Sunscreen per application',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'ml',
                ],
                [
                    'name' => 'applications',
                    'label' => 'Applications per bottle',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'times',
                ],
                [
                    'name' => 'bottle_days',
                    'label' => 'Days a bottle lasts',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'days',
                ],
                [
                    'name' => 'bottles',
                    'label' => 'Bottles for the period',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'bottles',
                ],
            ],
        ],
    ],
    'formula' => ['ml_app' => 'area_m2 * 10000 * dose / 1000', 'applications' => 'bottle_ml / (area_m2 * 10000 * dose / 1000)', 'bottle_days' => 'bottle_ml / (area_m2 * 10000 * dose / 1000) / applications_day', 'bottles' => 'days * applications_day / (bottle_ml / (area_m2 * 10000 * dose / 1000))'],
    'article' => [
        'intro' => 'How much sunscreen an application takes at the tested dose, how many applications a bottle gives, and how many bottles a summer of daily use needs.',
        'sections' => [
            ['title' => 'What this calculator gives you', 'html' => <<<'TXT'
            <p>A square metre is 10 000 square centimetres, and testing a sunscreen at two milligrams on each of them means 20 grams a square metre. For an adult body of 1.8 square metres that is 36 millilitres — a sixth of a 200 ml bottle, per application.</p><p>That is why the bottle in the bathroom cabinet lasts a season and the bottle in the holiday bag lasts three days. Most people apply a quarter of the tested dose, which is why they burn with a factor 50 on.</p><p>The answer is <strong>sunscreen per application and applications per bottle and days a bottle lasts and bottles for the period</strong>, worked out from skin area to cover and dose and bottle size and applications a day and days of use. Everything is computed from the boxes on this page. Nothing is looked up in a table and nothing is fetched from the internet.</p>
            TXT],
            ['title' => 'The arithmetic, written out', 'html' => <<<'TXT'
            <p>One line states the whole calculation. Everything else on the page is that line being evaluated.</p><table class="calc-table"><thead><tr><th>Result</th><th>Expression</th></tr></thead><tbody><tr><td><strong>ml_app</strong></td><td><code>Skin area to cover × 10000 × Dose ÷ 1000</code></td></tr><tr><td><strong>applications</strong></td><td><code>Bottle size ÷ (Skin area to cover × 10000 × Dose ÷ 1000)</code></td></tr><tr><td><strong>bottle_days</strong></td><td><code>Bottle size ÷ (Skin area to cover × 10000 × Dose ÷ 1000) ÷ Applications a day</code></td></tr><tr><td><strong>bottles</strong></td><td><code>Days of use × Applications a day ÷ (Bottle size ÷ (Skin area to cover × 10000 × Dose ÷ 1000))</code></td></tr></tbody></table><p>Area in square metres times 10 000 gives square centimetres; times the dose and divided by a thousand gives millilitres. A bottle divides by that figure for the application count, and the period divides again by the applications in a day.</p>
            TXT],
            ['title' => 'What to type, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill. It reports sunscreen per application and applications per bottle and days a bottle lasts and bottles for the period.</p><ul><li><strong>Skin area to cover</strong> — m². An adult body is about 1.8 square metres. Face, neck and arms is nearer 0.5 and the legs add another 0.6.</li><li><strong>Dose</strong> — mg/cm². Two milligrams per square centimetre is the rate sunscreen is tested at, and the rate the SPF number refers to.</li><li><strong>Bottle size</strong> — ml.</li><li><strong>Applications a day</strong> — times.</li><li><strong>Days of use</strong> — days.</li></ul><p>These are the boxes you read rather than type into:</p><ul><li><strong>Sunscreen per application</strong> — ml.</li><li><strong>Applications per bottle</strong> — times.</li><li><strong>Days a bottle lasts</strong> — days.</li><li><strong>Bottles for the period</strong> — bottles.</li></ul><p>A result stays blank until every value it needs has arrived. A blank box in the panel is a missing input, not an error, and it is never filled with an old answer from a previous visit.</p>
            TXT],
            ['title' => 'A worked example you can rerun', 'html' => <<<'TXT'
            <p>Put skin area to cover = 1.8 m², dose = 2 mg/cm², bottle size = 200 ml, applications a day = 2 times, days of use = 90 days into the form and the panel reads:</p><ul><li><strong>Sunscreen per application</strong> = <code>Skin area to cover × 10000 × Dose ÷ 1000</code> = <strong>36 ml</strong></li><li><strong>Applications per bottle</strong> = <code>Bottle size ÷ (Skin area to cover × 10000 × Dose ÷ 1000)</code> = <strong>5.556 times</strong></li><li><strong>Days a bottle lasts</strong> = <code>Bottle size ÷ (Skin area to cover × 10000 × Dose ÷ 1000) ÷ Applications a day</code> = <strong>2.778 days</strong></li><li><strong>Bottles for the period</strong> = <code>Days of use × Applications a day ÷ (Bottle size ÷ (Skin area to cover × 10000 × Dose ÷ 1000))</code> = <strong>32.4 bottles</strong></li></ul><p>Face, neck and arms at half a square metre is only 10 ml, so the same bottle lasts twenty applications — which is why the face bottle is not the one that disappears.</p><p>The arithmetic keeps full precision between steps. Only the last step is shortened for display, so a number copied from the panel is the rounded value, not a value that has already been rounded twice.</p>
            TXT],
            ['title' => 'Checking it on paper', 'html' => <<<'TXT'
            <p>Written out with the numbers in it, the first line of the table is <code>1.8 × 10000 × 2 ÷ 1000</code>, which comes to <strong>36 ml</strong>. Nothing is rounded before that last step, so a person reproducing it on paper should keep the intermediate figures in full and only round at the end.</p><p>Do the divisions last. A calculator that rounds a division before multiplying it back up loses a digit that a person working with a pencil keeps, which is why two answers that differ in the third decimal are usually both right.</p><p>If your figure disagrees in the first digit, the problem is upstream of the arithmetic: a unit, a date, or a box holding a different quantity from the one its label asks for.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>1.8 square metres at 2 mg per square centimetre is 36 ml an application, so a 200 ml bottle gives 5.6 applications and lasts 2.8 days at twice a day. A ninety-day summer needs 32.4 bottles.</p>
            TXT],
            ['title' => 'How much each box moves the answer', 'html' => <<<'TXT'
            <p>Change one box at a time and watch what happens to the results. A date is moved by a day and a clock time by an hour, because ten per cent of a date means nothing.</p><table class="calc-table"><thead><tr><th>Change</th><th>Sunscreen per application</th><th>Applications per bottle</th><th>Days a bottle lasts</th><th>Bottles for the period</th></tr></thead><tbody><tr><td><strong>Skin area to cover</strong> +10 %</td><td>+10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Dose</strong> +10 %</td><td>+10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Bottle size</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Applications a day</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Days of use</strong> +10 %</td><td>+0 %</td><td>+0 %</td><td>+0 %</td><td>+10 %</td></tr></tbody></table><p>The box the answer leans on hardest is <strong>Skin area to cover</strong>. If you only get one number right, make it the first one.</p>
            TXT],
            ['title' => 'Where the default values come from', 'html' => <<<'TXT'
            <ul><li><strong>Skin area to cover</strong> opens at 1.8 m² — An adult body is about 1.8 square metres. Face, neck and arms is nearer 0.5 and the legs add another 0.6.</li><li><strong>Dose</strong> opens at 2 mg/cm² — Two milligrams per square centimetre is the rate sunscreen is tested at, and the rate the SPF number refers to.</li><li><strong>Bottle size</strong> opens at 200 ml</li><li><strong>Applications a day</strong> opens at 2 times</li><li><strong>Days of use</strong> opens at 90 days</li></ul><p>They are a typical case, not a recommendation. Loading a page with a worked example already in the boxes means the first thing you see is arithmetic you can check; replacing each value with your own is the next step, and the panel follows as you type.</p><p>Keeping the defaults is also how to compare this page with another tool. If the other calculator accepts the same six numbers, put the same six in and compare the answers; if it does not accept them, it is computing something else.</p><p>The example is deliberately dated rather than set to today, so the numbers quoted in this article can be reproduced months after it was written. On a page that counts from a date, change the second box to today and the answer moves with it.</p>
            TXT],
            ['title' => 'The same calculation at other values', 'html' => <<<'TXT'
            <p>The same calculation at five sizes of the first box, everything else left alone. Read down a column to see whether the answer grows in step, and across a row to see which readings move together.</p><table class="calc-table"><thead><tr><th>Skin area to cover</th><th>Sunscreen per application</th><th>Applications per bottle</th><th>Days a bottle lasts</th><th>Bottles for the period</th></tr></thead><tbody><tr><td>0.9 m²</td><td>18</td><td>11.111</td><td>5.556</td><td>16.2</td></tr><tr><td>1.8 m²</td><td>36</td><td>5.556</td><td>2.778</td><td>32.4</td></tr><tr><td>3.6 m²</td><td>72</td><td>2.778</td><td>1.389</td><td>64.8</td></tr><tr><td>9 m²</td><td>180</td><td>1.111</td><td>0.556</td><td>162</td></tr><tr><td>18 m²</td><td>360</td><td>0.556</td><td>0.278</td><td>324</td></tr></tbody></table><p>Where a column doubles as the first box doubles, the relationship is proportional. Where it lags or leads, something in the formula is doing more than multiplying.</p>
            TXT],
            ['title' => 'Two other cases, worked through', 'html' => <<<'TXT'
            <ul><li>Set skin area to cover = 0.5, dose = 2, bottle size = 200, applications a day = 2, days of use = 90: <strong>Sunscreen per application</strong> = 10 ml, <strong>Applications per bottle</strong> = 20 times, <strong>Days a bottle lasts</strong> = 10 days, <strong>Bottles for the period</strong> = 9 bottles. Half a square metre — face, neck and arms — takes 10 ml, so the bottle gives twenty applications, ten days, and a ninety-day summer needs nine bottles.</li></ul>
            TXT],
            ['title' => 'Where people get this wrong', 'html' => <<<'TXT'
            <ul><li><strong>Applying once.</strong> Sunscreen is tested for two hours of exposure at that dose. A day at the beach is four to six applications, not one.</li><li><strong>Trusting water resistance.</strong> "Very water resistant" means forty minutes of swimming to the same standard. It is a longer interval, not a licence to skip the second application.</li><li><strong>A unit typed into the wrong box.</strong> Each box carries its own unit beside it. Mixing minutes with hours, or centimetres with inches, still produces a number that looks reasonable.</li><li><strong>A copied answer used as an input.</strong> The result boxes cannot be typed into, so a previous answer has to go back through the inputs to be reused.</li></ul>
            TXT],
            ['title' => 'What this page does not do', 'html' => <<<'TXT'
            <ul><li><li><strong>Body surface only.</strong> Hats, shirts and shade do the work this page cannot price, and covering up is more reliable than any application rate.</li></li><li><strong>It does not know your circumstances.</strong> The calculation is arithmetic on the numbers you supply. It cannot check them for you, and a wrong input produces a confidently wrong answer.</li></ul>
            TXT],
            ['title' => 'Units and rounding', 'html' => <<<'TXT'
            <p>Each box states the unit it wants, and each result carries the unit it is in. Results print with at most three decimals above one, four significant figures below one, and in scientific notation below a thousandth. Display rounding never feeds back into the calculation.</p>
            TXT],
            ['title' => 'Getting the answer without a calculator', 'html' => <<<'TXT'
            <ol><li><strong>Collect the numbers.</strong> You need skin area to cover and dose and bottle size and applications a day and days of use. Write each one with its unit before you type it.</li><li><strong>Put them in.</strong> Press Calculate when the boxes are full; the panel updates again if you change a value.</li><li><strong>Sanity-check the size.</strong> Sunscreen per application and applications per bottle and days a bottle lasts and bottles for the period should be in the range you expected before you pressed anything. Ten times out is a unit slip; twice out is usually a wrong assumption.</li><li><strong>Change one thing.</strong> Move a single input and confirm the answer moves the way the formula says it should. Then the number is yours to use.</li></ol><ul><li><li>Buying the right number of bottles for a holiday.</li></li><li><li>Understanding why a factor 50 fails when people apply it thinly.</li></li></ul><p>Close neighbours on this site: <a href="/everyday-life/toothpaste">Toothpaste</a> <a href="/everyday-life/microwave-wattage">Microwave wattage</a> <a href="/everyday-life/price-per-ounce">Price per ounce</a>.</p>
            TXT],
            ['title' => 'If the answer looks wrong', 'html' => <<<'TXT'
            <p>Check the size first, then the units, then the inputs. A number that is out by exactly ten or a hundred is a unit slip; a number that is out by two is usually an assumption, such as counting both ends of a date range or treating an average as a constant. Only after those two checks is it worth suspecting the arithmetic, which is one line long and has been checked against the worked example above.</p><p>If you are comparing this page with another tool and the figures differ slightly, the difference is usually rounding: this page computes at full precision and shortens only for display, while a hand calculation often rounds at every step and drifts.</p>
            TXT],
            ['title' => 'When one number is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip leaves an answer that still looks like an answer. Here is what the first result does when each box is exaggerated:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Skin area to cover</strong> ×10</td><td>36</td><td>360</td><td>ten times larger</td></tr><tr><td><strong>Dose</strong> ×10</td><td>36</td><td>360</td><td>ten times larger</td></tr><tr><td><strong>Bottle size</strong> ×10</td><td>36</td><td>36</td><td>unchanged</td></tr><tr><td><strong>Applications a day</strong> ×10</td><td>36</td><td>36</td><td>unchanged</td></tr><tr><td><strong>Days of use</strong> ×10</td><td>36</td><td>36</td><td>unchanged</td></tr></tbody></table><p>Where the effect column says ten times larger, that box feeds the answer directly, so a slip passes straight through. Where the effect is smaller, the box sits inside a sum or a ratio and the mistake is partly absorbed. That is worse, not better: the answer then looks believable.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sunscreen Amount calculator work out?', 'a' => <<<'TXT'
            It returns sunscreen per application and applications per bottle and days a bottle lasts and bottles for the period from skin area to cover and dose and bottle size and applications a day and days of use. The relationship is Skin area to cover × 10000 × Dose ÷ 1000.
            TXT],
            ['q' => 'Which numbers do I need before I start?', 'a' => 'Skin area to cover (m²), Dose (mg/cm²), Bottle size (ml), Applications a day (times), Days of use (days). Everything else is computed.'],
            ['q' => 'Can I work it backwards from the answer?', 'a' => <<<'TXT'
            Not in the panel: the result boxes are read-only, and the arithmetic always runs from the inputs. The table in the arithmetic section gives the same relationship arranged for each unknown, which is what you need to go back the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I use?', 'a' => <<<'TXT'
            It matters that each box is in the unit printed beside it: skin area to cover in m²; dose in mg/cm²; bottle size in ml; applications a day in times; days of use in days. The page converts nothing on its own.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Computed at full precision, printed with at most three decimals above one and four significant figures below one. Copy the number if you need it later; nothing is stored.
            TXT],
            ['q' => 'Why does the page show several results rather than one?', 'a' => <<<'TXT'
            Because one quantity is rarely read in one unit. The same answer in a second unit is a check on the first: if the two do not agree, one of them was computed from a different input.
            TXT],
            ['q' => 'Is it free, and is anything sent anywhere?', 'a' => 'It is free, there is no account, and the arithmetic runs in your browser. The values you type are not uploaded.'],
            ['q' => 'Why 2 mg per square centimetre?', 'a' => 'Because that is the application rate the international SPF test uses. Applying less gives less protection than the number on the bottle, in proportion.'],
            ['q' => 'How much is a teaspoon?', 'a' => <<<'TXT'
            About 5 ml. The old advice of a teaspoon for the face and a shot glass for the body is roughly 5 and 30 ml, which sits either side of the 36 ml figure for a whole body.
            TXT],
            ['q' => 'Does the bottle really not last?', 'a' => <<<'TXT'
            A 200 ml bottle at 36 ml a go is five and a half full-body applications. Nobody uses that much on a normal day, which is why the number is surprising rather than wrong.
            TXT],
        ],
        'related' => [
            ['path' => '/everyday-life/toothpaste', 'name' => 'Toothpaste'],
            ['path' => '/everyday-life/microwave-wattage', 'name' => 'Microwave wattage'],
            ['path' => '/everyday-life/price-per-ounce', 'name' => 'Price per ounce'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
