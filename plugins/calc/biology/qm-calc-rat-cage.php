<?php

/**
 * Rat cage
 * /biology/rat-cage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rat cage',
    'meta' => ['title' => 'Rat cage Calculator: Formula, Steps & Examples', 'description' => 'Rat cage works out cage volume and can fit at most from height and length. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Rat cage Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'height' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'length' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
            'rats' => [
                'type' => 'numerical',
                'rnd' => ['standard', '0'],
            ],
            'ratspace' => [
                'type' => 'valueSelect',
                'rnd' => null,
                'dfl' => [
                    ['v' => 'yPH2XpJMRKQ8kjlYusMJZ', 'c' => null],
                ],
                'ds' => 'vkeAWlKTSA9LNrvtWpDwB',
            ],
            'ratspaceunit' => [
                'type' => 'dependent',
                'rnd' => ['omni', '0.0001'],
            ],
            'volume' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.1'],
            ],
            'width' => [
                'type' => 'numerical',
                'rnd' => ['omni', '0.0001'],
            ],
        ],
        'groups' => [
            [
                'uid' => 'PriAG9RgdazW5INMUieCV',
                'title' => 'Cage Size',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'height',
                                    'vt' => 'numerical',
                                    'l' => 'Height',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'length',
                                    'vt' => 'numerical',
                                    'l' => 'Length',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'width',
                                    'vt' => 'numerical',
                                    'l' => 'Width',
                                    'us' => '4',
                                    'du' => 'cm',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'volume',
                                    'vt' => 'numerical',
                                    'l' => 'Cage volume',
                                    'us' => '20',
                                    'du' => 'liters',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'Y-D1WB17-euyC2CxrXATf',
                'title' => 'Recommendation',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'ratspace',
                                    'vt' => 'valueSelect',
                                    'l' => 'Space per rat',
                                    'ds' => 'vkeAWlKTSA9LNrvtWpDwB',
                                    'opts' => [
                                        ['31iQG4uboPcvBvfTwzVI2', '2 cu ft (57 liters)', '1'],
                                        ['yPH2XpJMRKQ8kjlYusMJZ', '2.5 cu ft (71 liters)', '2'],
                                        ['4bSuxZUT_t8p0udbaX-7C', 'Custom', '0'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'ratspaceunit',
                                    'vt' => 'dependent',
                                    'l' => 'Space per rat (custom)',
                                    'us' => '20',
                                    'du' => 'liters',
                                ],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'v',
                                    'n' => 'rats',
                                    'vt' => 'numerical',
                                    'l' => 'Can fit at most',
                                    'suf' => 'rat(s)',
                                    'h' => 'Getting 0 means you might need a larger cage for your rat(s)!',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'volume = length * width * height',
                'var' => [
                    [
                        'l' => 'volume',
                        'f' => 'height*length*width',
                        'r' => ['length', 'height', 'width'],
                    ],
                    [
                        'l' => 'length',
                        'f' => 'volume/(height*width)',
                        'r' => ['volume', 'height', 'width'],
                    ],
                    [
                        'l' => 'height',
                        'f' => 'volume/(length*width)',
                        'r' => ['volume', 'length', 'width'],
                    ],
                    [
                        'l' => 'width',
                        'f' => 'volume/(height*length)',
                        'r' => ['volume', 'length', 'height'],
                    ],
                ],
            ],
            [
                'formula' => 'floor(volume / ratspaceunit) = rats',
                'var' => [
                    [
                        'l' => 'rats',
                        'f' => 'floor(volume/ratspaceunit)',
                        'r' => ['ratspaceunit', 'volume'],
                    ],
                ],
            ],
        ],
        'datasets' => [
            'vkeAWlKTSA9LNrvtWpDwB' => [
                'name' => 'rat_spaceDS',
                'uiType' => 'RADIO',
                'options' => [
                    ['uid' => '31iQG4uboPcvBvfTwzVI2', 'label' => '2 cu ft (57 liters)', 'value' => '1'],
                    ['uid' => 'yPH2XpJMRKQ8kjlYusMJZ', 'label' => '2.5 cu ft (71 liters)', 'value' => '2'],
                    ['uid' => '4bSuxZUT_t8p0udbaX-7C', 'label' => 'Custom', 'value' => '0'],
                ],
            ],
        ],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Rat cage works out Space per rat (custom) from Height, Length and Width. The arithmetic is the whole method: space per rat (custom) is worked out from height by one formula, applied once. Space per rat (custom) comes back in liters unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Rat cage calculator works', 'html' => <<<'TXT'
            <p>The Rat cage calculator applies one relationship to 6 numbers and reports Space per rat (custom).</p><p>The relationship it solves reads Cage volume = Height × Length × Width.</p><p>What comes back is Space per rat (custom) — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 6 boxes, and nothing else.</p><ul><li><strong>Height</strong> — in centimeters</li><li><strong>Length</strong> — in centimeters</li><li><strong>Width</strong> — in centimeters</li><li><strong>Cage volume</strong> — in liters</li><li><strong>Space per rat</strong> — a plain number, no unit</li><li><strong>Can fit at most</strong> — in rat(s). Getting 0 means you might need a larger cage for your rat(s)!</li></ul><p>What you get back is Space per rat (custom) in liters, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Space per rat (custom) lists 40 options and opens on liters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Cage volume</strong> = <code>Height × Length × Width</code></li><li><strong>Length</strong> = <code>Cage volume ÷ (Height × Width)</code></li><li><strong>Height</strong> = <code>Cage volume ÷ (Length × Width)</code></li><li><strong>Width</strong> = <code>Cage volume ÷ (Height × Length)</code></li><li><strong>Can fit at most</strong> = <code>floor(Cage volume ÷ Space per rat (custom))</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Cage volume</strong> = <code>Height × Length × Width</code> — the form to use when Length, Height and Width are the values you have.</li><li><strong>Length</strong> = <code>Cage volume ÷ (Height × Width)</code> — the form to use when Cage volume, Height and Width are the values you have.</li><li><strong>Height</strong> = <code>Cage volume ÷ (Length × Width)</code> — the form to use when Cage volume, Length and Width are the values you have.</li><li><strong>Width</strong> = <code>Cage volume ÷ (Height × Length)</code> — the form to use when Cage volume, Length and Height are the values you have.</li><li><strong>Can fit at most</strong> = <code>floor(Cage volume ÷ Space per rat (custom))</code> — the form to use when Space per rat (custom) and Cage volume are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Cage volume, Length and Height can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Height, Length and Width carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Space per rat (custom) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Height left as a guess.</strong> Anything typed into Height is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Length left as a guess.</strong> Anything typed into Length is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Height and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Rat cage form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Height</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. The page reads it when it works out Cage volume, Length and Width. Fill it from a measurement rather than a memory — Height is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Length</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. The page reads it when it works out Cage volume, Height and Width. Fill it from a measurement rather than a memory — Length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Width</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. The page reads it when it works out Cage volume, Length and Height. Fill it from a measurement rather than a memory — Width is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Cage volume</strong> is a liters quantity: the page opens it in liters and converts anything else you pick before the formula runs. The page reads it when it works out Length, Height and Width. Fill it from a measurement rather than a memory — Cage volume is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Space per rat</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Space per rat is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Can fit at most</strong> is measured in rat(s). Getting 0 means you might need a larger cage for your rat(s)!. Fill it from a measurement rather than a memory — Can fit at most is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Space per rat (custom)</strong> is a liters figure. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Rat cage actually offers.</p><ul><li><strong>liters</strong> — 40 units. It opens in <em>liters</em>, and the chip also carries m³, cu ft, US fl oz, L, dm³ and cu in. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>centimeters</strong> — 31 units. It opens in <em>cm</em>, and the chip also carries in, m, ft, Å, nm and pm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Height, Length, Width and Cage volume ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Height — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Space per rat (custom) in liters against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Space per rat (custom) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are liters and centimeters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Height, Length and Width are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Height, Length and Width measured, Space per rat (custom) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/vine-density">Vine Density Calculator</a>, <a href="/biology/wastewater">Wastewater Calculator</a> and <a href="/biology/water-potential">Water potential Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rat cage calculator work out?', 'a' => 'Space per rat (custom), from Length, Height and Width. The relationship is Cage volume = Height × Length × Width.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Height (centimeters), Length (centimeters), Width (centimeters), Cage volume (liters), Space per rat. Enter height, length and width; Space per rat (custom) is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Cage volume, Length, Height and Width can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Space per rat (custom) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Height blank and the page solves for it, reporting Space per rat (custom) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Space per rat (custom) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/vine-density', 'name' => 'Vine Density Calculator'],
            ['path' => '/biology/wastewater', 'name' => 'Wastewater Calculator'],
            ['path' => '/biology/water-potential', 'name' => 'Water potential Calculator'],
        ],
        'authors' => [],
    ],
];
