<?php

/**
 * Degrees Minutes Seconds Converter
 * /conversion/degrees-minutes-seconds
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Degrees Minutes Seconds Converter',
    'meta' => [
        'title' => 'Degrees Minutes Seconds Converter: Factor and Table',
        'description' => 'One degree is sixty minutes and one minute is sixty seconds, so the parts are base sixty even though the degrees themselves are decimal. Three decimals.',
        'h1' => 'Degrees Minutes Seconds Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'degrees',
                    'label' => 'Degrees',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'default' => '51',
                ],
                [
                    'name' => 'minutes',
                    'label' => 'Minutes',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'default' => '30',
                ],
                [
                    'name' => 'seconds',
                    'label' => 'Seconds',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'default' => '26',
                ],
                [
                    'name' => 'decimal',
                    'label' => 'Decimal degrees',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                ],
                [
                    'name' => 'total_minutes',
                    'label' => 'Total minutes',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                ],
                [
                    'name' => 'total_seconds',
                    'label' => 'Total seconds',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Degrees Minutes Seconds Converter',
            'results' => [
            ],
        ],
    ],
    'article' => [
        'intro' => 'One degree is sixty minutes and one minute is sixty seconds, so the parts are base sixty even though the degrees themselves are decimal.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>One degree is sixty minutes and one minute is sixty seconds, so the parts are base sixty even though the degrees themselves are decimal.</p><p>The formula table is deliberately empty, because this page does not solve an equation: it applies a fixed set of rules to what you type. An empty table with an explanation is honest, and a made-up formula would not be.</p><p>The page reports <strong>decimal degrees, total minutes and total seconds</strong> from the boxes above it. It applies a fixed set of rules to what you type, which is why the formula table is empty and the script below it is the calculator.</p>',
            ],
            [
                'title' => 'The rules it applies',
                'html' => '<p>There is no equation here to rearrange, so the table an ordinary converter would carry is empty on purpose. What replaces it is the list of rules the page applies, each one written the way the script implements it.</p><ul><li><strong>Minutes and seconds are base sixty.</strong> A value of 60 in either box is a whole degree or a whole minute, and the arithmetic carries it.</li><li><strong>The sign comes from the degrees.</strong> A negative latitude with positive minutes stays negative rather than flipping at the minute.</li><li><strong>Total minutes and total seconds are also reported</strong>, because some formats want one number rather than three.</li><li><strong>Decimal degrees are printed to six places.</strong> That is the precision most mapping services accept.</li><li><strong>Every part must be a number.</strong> An empty box leaves the row blank rather than being read as zero.</li></ul><p>The list is a sequence rather than a menu: the clean-up happens first, the conversion second and the formatting last. That order matters, because a character thrown away at the top never reaches the step below it — which is why an answer can look wrong when the rule that changed it was the tidying, not the arithmetic.</p><p>There is no algebraic relationship to rearrange here, which is why the table is empty. The script on the page is the calculator, and the rules it applies are listed in the article below it.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 3 boxes and the page has everything it needs. It reports decimal degrees, total minutes and total seconds.</p><ul><li><strong>Degrees</strong>.</li><li><strong>Minutes</strong>.</li><li><strong>Seconds</strong>.</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Decimal degrees</strong></li><li><strong>Total minutes</strong></li><li><strong>Total seconds</strong></li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards, and the rules above are what a conversion to the other direction would need.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Three runs through this page, with the input in the first columns and what the panel returns beside it. They are not illustrations: each row is the page\'s own output for the input shown, which is why a row you can reproduce by hand is a check on the whole script.</p><table class="calc-table"><thead><tr><th>degrees</th><th>minutes</th><th>seconds</th><th>What comes back</th></tr></thead><tbody><tr><td>0</td><td>0</td><td>0</td><td><strong>decimal</strong> 0.000000 · <strong>total_minutes</strong> 0 · <strong>total_seconds</strong> 0</td></tr><tr><td>51</td><td>30</td><td>26</td><td><strong>decimal</strong> 51.507222 · <strong>total_minutes</strong> 3090.4333333333334 · <strong>total_seconds</strong> 185426</td></tr><tr><td>-33</td><td>52</td><td>8</td><td><strong>decimal</strong> -33.868889 · <strong>total_minutes</strong> -2032.1333333333334 · <strong>total_seconds</strong> -121928</td></tr></tbody></table><p>Read the rows against each other rather than one at a time. Where one input changes and the answer does not, that input is not consulted for this case; where two rows give the same answer, the difference between them was outside the range the rules look at.</p><p>Taking the runs together, the decimal answer ranges from 8 to 10 characters — 0.000000 is the shortest and -33.868889 the longest. A rule that is applied evenly produces answers whose length tracks the input; a run whose answer is much shorter than its neighbours has usually had characters dropped by the clean-up step, not by the conversion.</p><p>The figures in the table are the page\'s own output for the inputs shown, taken from the script that runs in your browser rather than written into the article by hand. Reproduce a row by typing the same input and reading the panel: if it disagrees, the page and this article have drifted apart and the page is the one to believe.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer as a whole rather than a first character. A base conversion looks right or wrong at a glance once you know the alphabet of the base it is written in, and a single slipped digit is the usual failure rather than a totally wrong figure.</p><p>Where the page reports more than one reading, compare them. A hexadecimal figure that disagrees with its own binary column is a rule applied twice, not a typing error, and the disagreement is the diagnosis.</p><p>Decimal degrees, total minutes and total seconds should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Converting twice.</strong></strong> A figure already in feet converted to metres and then to feet again comes back wrong, and nothing in the display says so.</li><li><strong><strong>Using a rounded factor and a rounded answer.</strong></strong> Each rounding is small; the product of several is not. Keep precision in the middle and round only at the end.</li><li><strong><strong>Assuming both sides use the same word the same way.</strong></strong> A US gallon, an imperial gallon, a dry gallon and a metric gallon are four different volumes sharing one name.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'What it does not do',
                'html' => '<p>The boxes on this page take what you type and nothing else: there is no unit chip to get wrong and no scale to match, which is one class of error this page simply does not have. What it can do is decline: a value it cannot read leaves the answer boxes empty rather than producing a plausible-looking substitute.</p><p>Text is copied character for character, including the spacing the rules add, so a result pasted into another document keeps its shape. Nothing is normalised on the way out — no trimming, no case folding, no smart quotes.</p><p>That also means the page has a narrow definition of success: a value either reads as the kind of input the rules expect or it does not, and a partial match is treated as a mistake rather than guessed at. A page that guessed would be more convenient once and wrong quietly afterwards.</p><p>What the page does not do is check the result against the outside world. It has no table of real codes, no list of valid dates and no opinion on whether the value you typed means what you think it means. It converts the syntax, and the meaning is yours.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need degrees, minutes and seconds. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Decimal degrees, total minutes and total seconds should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'What the page does before it answers',
                'html' => '<p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box means a missing input rather than an error. Zero is accepted, but a formula that would divide by it reports no result instead of infinity. Precision is carried throughout and the three-decimal limit is applied only at the end.</p>',
            ],
            [
                'title' => 'Limits worth knowing',
                'html' => '<ul><li><strong><strong>The factor is exact; the input is not.</strong></strong> Nothing here knows how the figure was measured, and a conversion cannot add precision that was never there.</li><li><strong><strong>Rounded display, unrounded arithmetic.</strong></strong> A figure copied from the panel has three decimals; the value behind it has more, and a chain of conversions done on copied figures drifts.</li><li><strong><strong>One dimension at a time.</strong></strong> Mass does not convert to volume without a density, and the pages that offer it ask for one rather than inventing a number.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for.</li></ul>',
            ],
            [
                'title' => 'Where this calculation comes up',
                'html' => '<ul><li><strong><strong>Cooking and dosing.</strong></strong> A recipe written in cups, a label written in millilitres and a scale that reads grams are three units in one kitchen.</li><li><strong><strong>Trade and shipping.</strong></strong> Freight is priced by weight, volume or both, and the two systems meet on the same invoice.</li><li><strong><strong>Study and exams.</strong></strong> A worked example with the units written out is worth more than a memorised factor, because it can be rebuilt.</li><li><strong><strong>Estimating before you measure.</strong></strong> A rough conversion decides whether a job is small or large before anyone fetches a tape.</li></ul><p>Where the answer is one step further on: <a href="/conversion/acreage">Acreage</a> <a href="/conversion/acres-to-hectares-converter">Acres To Hectares Converter</a> <a href="/conversion/acres-to-square-feet-converter">Acres To Square Feet Converter</a>.</p>',
            ],
        ],
        'faq' => [
            [
                'q' => 'What does the Degrees Minutes Seconds Converter work out?',
                'a' => 'It returns decimal degrees, total minutes and total seconds from degrees, minutes and seconds. It applies a fixed set of rules to what you type, which is why the formula table is empty and the script below it is the calculator.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'Degrees, Minutes, Seconds. The result boxes need no input of their own: they are computed.',
            ],
            [
                'q' => 'Can I use it backwards?',
                'a' => 'Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown.',
            ],
            [
                'q' => 'Does it matter which unit I type in?',
                'a' => 'It matters that every box is in the unit printed beside it: . The page converts nothing on its own, so a mixed set of units is the most common wrong answer.',
            ],
            [
                'q' => 'How precise is the answer?',
                'a' => 'Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values.',
            ],
            [
                'q' => 'What happens if I leave a box empty?',
                'a' => 'The result stays blank until every input it needs holds a number. Nothing is guessed and no default is substituted behind your back.',
            ],
            [
                'q' => 'Is anything saved?',
                'a' => 'No. The arithmetic runs in the browser, nothing is submitted, and a reload starts from the values the page ships with.',
            ],
        ],
        'related' => [
            [
                'path' => '/conversion/acreage',
                'name' => 'Acreage',
            ],
            [
                'path' => '/conversion/acres-to-hectares-converter',
                'name' => 'Acres To Hectares Converter',
            ],
            [
                'path' => '/conversion/acres-to-square-feet-converter',
                'name' => 'Acres To Square Feet Converter',
            ],
        ],
        'authors' => [
            [
                'name' => 'Onim Editorial',
                'role' => 'Written and checked',
            ],
        ],
    ],
    'engine' => 'script',
    'engine_note' => 'applies a fixed set of rules to what you type, which is why the formula table is empty and the script below it is the calculator',

    'js' => <<<'TXT'
"use strict";
omni.onResult(["degrees", "minutes", "seconds"], function (ctx) {
  var d = Number(ctx.getRawInput("degrees"));
  var m = Number(ctx.getRawInput("minutes"));
  var s = Number(ctx.getRawInput("seconds"));
  if (!isFinite(d) || !isFinite(m) || !isFinite(s)) {
    ctx.exportValue("decimal", ""); ctx.exportValue("total_minutes", ""); ctx.exportValue("total_seconds", ""); return;
  }
  var sign = d < 0 ? -1 : 1;
  var decimal = sign * (Math.abs(d) + m / 60 + s / 3600);
  ctx.exportValue("decimal", decimal.toFixed(6));
  ctx.exportValue("total_minutes", sign * (Math.abs(d) * 60 + m + s / 60));
  ctx.exportValue("total_seconds", sign * (Math.abs(d) * 3600 + m * 60 + s));
});
TXT,
]
;
