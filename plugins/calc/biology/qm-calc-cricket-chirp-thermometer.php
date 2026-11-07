<?php

/**
 * Crickets chirping thermometer
 * /biology/cricket-chirp-thermometer
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Crickets chirping thermometer',
    'meta' => ['title' => 'Crickets chirping thermometer — Formula & Results', 'description' => 'Crickets chirping thermometer works out temperature from formula and cricket chirps. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Crickets chirping thermometer Calculator', 'updated' => '2025-12-18'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'formula',
                            'label' => 'Formula',
                            'type' => 'select',
                            'options' => ['Basic' => '0', 'Field cricket' => '1', 'Snowy tree cricket' => '2', 'Common true katydid' => '3'],
                            'dataset' => 'formula',
                            'default' => 'Basic',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'chirps_per_min',
                            'label' => 'Cricket chirps',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'fifteen',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temperature',
                            'label' => 'Temperature',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temperature2',
                            'label' => 'Temperature',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'temperature3',
                            'label' => 'Temperature',
                            'type' => 'number',
                            'unit' => '40',
                            'unit_default' => 'C',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Crickets don\'t chirp below 50 °F (10 °C).'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'temperature = 50 +  (chirps_per_min - 40)/4 ',
            'results' => ['temperature' => '(1/4)*chirps_per_min + 40', 'chirps_per_min' => '4*temperature - 160'],
        ],
        [
            'title' => 'temperature2 = 50 +  (chirps_per_min - 92)/4.7 ',
            'results' => ['temperature2' => '(10/47)*chirps_per_min + 1430/47', 'chirps_per_min' => '(47/10)*temperature2 - 143'],
        ],
        [
            'title' => 'temperature3 = 60 +  (chirps_per_min - 19)/3',
            'results' => ['temperature3' => '(1/3)*chirps_per_min + 161/3', 'chirps_per_min' => '3*temperature3 - 161'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Crickets chirping thermometer turns Cricket chirps into Temperature and Temperature. Nothing is looked up on this page: temperature is computed from cricket chirps and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Temperature is opened in Celsius; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Crickets chirping thermometer calculator works', 'html' => <<<'TXT'
            <p>Crickets chirping thermometer answers one question from 1 number, and the answer is Temperature, Temperature and Temperature.</p><p>Written with the labels from the form, Temperature = (1 ÷ 4) × Cricket chirps + 40.</p><p>What comes back is Temperature, Temperature and Temperature — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Cricket chirps</strong> — in fifteen seconds</li></ul><p>What you get back is Temperature in Celsius, Temperature in Celsius, Temperature in Celsius, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Temperature offers 28 units and opens on Celsius, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Temperature</strong> = <code>(1 ÷ 4) × Cricket chirps + 40</code></li><li><strong>Cricket chirps</strong> = <code>4 × Temperature − 160</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Temperature</strong> = <code>(1 ÷ 4) × Cricket chirps + 40</code> — the form to use when Cricket chirps are the values you have.</li><li><strong>Cricket chirps</strong> = <code>4 × Temperature − 160</code> — the form to use when Temperature are the values you have.</li><li><strong>Temperature</strong> = <code>(10 ÷ 47) × Cricket chirps + 1430 ÷ 47</code> — the form to use when Cricket chirps are the values you have.</li><li><strong>Cricket chirps</strong> = <code>(47 ÷ 10) × Temperature − 143</code> — the form to use when Temperature are the values you have.</li><li><strong>Temperature</strong> = <code>(1 ÷ 3) × Cricket chirps + 161 ÷ 3</code> — the form to use when Cricket chirps are the values you have.</li><li><strong>Cricket chirps</strong> = <code>3 × Temperature − 161</code> — the form to use when Temperature are the values you have.</li></ul><p>Any one of Temperature, Cricket chirps and Temperature can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Cricket chirps is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Temperature, Temperature and Temperature are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Cricket chirps left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Cricket chirps is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Cricket chirps is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Crickets chirping thermometer form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Cricket chirps</strong> is a fifteen seconds quantity: the page opens it in fifteen and converts anything else you pick before the formula runs. It feeds Temperature, Temperature and Temperature. Fill it from a measurement rather than a memory — Cricket chirps is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Temperature</strong> is a celsius figure. It is computed from Cricket chirps, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Temperature</strong> is a celsius figure. It is computed from Cricket chirps, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Temperature</strong> is a celsius figure. It is computed from Cricket chirps, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Crickets chirping thermometer actually offers.</p><ul><li><strong>Celsius</strong> — 28 units. It opens in <em>C</em>, and the chip also carries °F, K, °R, °De, °N and °Ré. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>fifteen seconds</strong> — 18 units. It opens in <em>fifteen</em>, and the chip also carries yrs, min, 15 sec, days, wks and mos. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Cricket chirps ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Cricket chirps — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Temperature in C against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Temperature follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The unit tables here are Celsius and fifteen seconds and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Cricket chirps are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Cricket chirps and the number you are missing is Temperature and Temperature.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/ligation-calculator">Ligation Calculator</a>, <a href="/biology/ligation-molar-ratio">Ligation Molar Ratio (Insert : Vector) Calculator</a> and <a href="/biology/ligation">Ligation</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Crickets chirping thermometer is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Crickets chirping thermometer calculator work out?', 'a' => 'Temperature, Temperature and Temperature, from Cricket chirps. The relationship is Temperature = (1 ÷ 4) × Cricket chirps + 40.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Cricket chirps (fifteen seconds). Fill cricket chirps and leave Temperature empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Temperature, Cricket chirps, Temperature and Temperature blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Temperature is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Cricket chirps blank and the page solves for it, reporting Temperature instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Temperature at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/ligation-calculator', 'name' => 'Ligation Calculator'],
            ['path' => '/biology/ligation-molar-ratio', 'name' => 'Ligation Molar Ratio (Insert : Vector) Calculator'],
            ['path' => '/biology/ligation', 'name' => 'Ligation'],
        ],
        'authors' => [],
    ],
];
