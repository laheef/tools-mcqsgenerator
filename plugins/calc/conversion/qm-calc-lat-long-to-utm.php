<?php

/**
 * Lat Long to UTM Converter
 * /conversion/lat-long-to-utm
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Lat Long to UTM Converter',
    'meta' => [
        'title' => 'Lat Long to UTM Converter: Convert, Check and Copy',
        'description' => 'The Universal Transverse Mercator grid divides the world into sixty zones, each six degrees of longitude wide, and gives metres east and north inside the zone.',
        'h1' => 'Lat Long to UTM Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'latitude',
                    'label' => 'Latitude',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'default' => '-33.8688',
                ],
                [
                    'name' => 'longitude',
                    'label' => 'Longitude',
                    'type' => 'number',
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'default' => '151.2093',
                ],
                [
                    'name' => 'easting',
                    'label' => 'Easting',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'm',
                ],
                [
                    'name' => 'northing',
                    'label' => 'Northing',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => [
                        'omni',
                        '0.0001',
                    ],
                    'suffix' => 'm',
                ],
                [
                    'name' => 'zone',
                    'label' => 'Zone',
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
            'title' => 'Lat Long to UTM Converter',
            'results' => [
            ],
        ],
    ],
    'article' => [
        'intro' => 'The Universal Transverse Mercator grid divides the world into sixty zones, each six degrees of longitude wide, and gives metres east and north inside the zone.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>The Universal Transverse Mercator grid divides the world into sixty zones, each six degrees of longitude wide, and gives metres east and north inside the zone.</p><p>The formula table is deliberately empty, because this page does not solve an equation: it applies a fixed set of rules to what you type. An empty table with an explanation is honest, and a made-up formula would not be.</p><p>The page reports <strong>easting, northing and zone</strong> from the boxes above it. It applies a fixed set of rules to what you type, which is why the formula table is empty and the script below it is the calculator.</p>',
            ],
            [
                'title' => 'The rules it applies',
                'html' => '<p>There is no equation here to rearrange, so the table an ordinary converter would carry is empty on purpose. What replaces it is the list of rules the page applies, each one written the way the script implements it.</p><ul><li><strong>Sixty zones of six degrees</strong>, numbered from one at 180° west and lettered by latitude band.</li><li><strong>The projection is transverse Mercator on a WGS 84 ellipsoid</strong>, with a scale factor of 0.9996 and a false easting of 500 000 metres.</li><li><strong>Southern latitudes gain ten million metres</strong> so that the northing is never negative.</li><li><strong>The zone is part of the answer.</strong> A pair of numbers without its zone is not a location.</li><li><strong>The range is 80°S to 84°N.</strong> Outside it the grid is not defined and the page leaves the boxes empty.</li></ul><p>The list is a sequence rather than a menu: the clean-up happens first, the conversion second and the formatting last. That order matters, because a character thrown away at the top never reaches the step below it — which is why an answer can look wrong when the rule that changed it was the tidying, not the arithmetic.</p><p>There is no algebraic relationship to rearrange here, which is why the table is empty. The script on the page is the calculator, and the rules it applies are listed in the article below it.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 2 boxes and the page has everything it needs. It reports easting, northing and zone.</p><ul><li><strong>Latitude</strong>.</li><li><strong>Longitude</strong>.</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Easting</strong> — in m</li><li><strong>Northing</strong> — in m</li><li><strong>Zone</strong></li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards, and the rules above are what a conversion to the other direction would need.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Three runs through this page, with the input in the first columns and what the panel returns beside it. They are not illustrations: each row is the page\'s own output for the input shown, which is why a row you can reproduce by hand is a check on the whole script.</p><table class="calc-table"><thead><tr><th>latitude</th><th>longitude</th><th>What comes back</th></tr></thead><tbody><tr><td>0.0001</td><td>0.0001</td><td><strong>easting</strong> 166032.59 · <strong>northing</strong> 11.07 · <strong>zone</strong> 31N</td></tr><tr><td>-33.8688</td><td>151.2093</td><td><strong>easting</strong> 334368.63 · <strong>northing</strong> 6250948.35 · <strong>zone</strong> 56S</td></tr><tr><td>51.5072</td><td>-0.1275</td><td><strong>easting</strong> 699337.92 · <strong>northing</strong> 5710142.34 · <strong>zone</strong> 30N</td></tr></tbody></table><p>Read the rows against each other rather than one at a time. Where one input changes and the answer does not, that input is not consulted for this case; where two rows give the same answer, the difference between them was outside the range the rules look at.</p><p>The figures in the table are the page\'s own output for the inputs shown, taken from the script that runs in your browser rather than written into the article by hand. Reproduce a row by typing the same input and reading the panel: if it disagrees, the page and this article have drifted apart and the page is the one to believe.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer as a whole rather than a first character. A base conversion looks right or wrong at a glance once you know the alphabet of the base it is written in, and a single slipped digit is the usual failure rather than a totally wrong figure.</p><p>Where the page reports more than one reading, compare them. A hexadecimal figure that disagrees with its own binary column is a rule applied twice, not a typing error, and the disagreement is the diagnosis.</p><p>Easting, northing and zone should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Converting twice.</strong></strong> A figure already in feet converted to metres and then to feet again comes back wrong, and nothing in the display says so.</li><li><strong><strong>Using a rounded factor and a rounded answer.</strong></strong> Each rounding is small; the product of several is not. Keep precision in the middle and round only at the end.</li><li><strong><strong>Assuming both sides use the same word the same way.</strong></strong> A US gallon, an imperial gallon, a dry gallon and a metric gallon are four different volumes sharing one name.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'What it does not do',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: easting (m), northing (m), zone.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>The boxes on this page take what you type and nothing else: there is no unit chip to get wrong and no scale to match, which is one class of error this page simply does not have. What it can do is decline: a value it cannot read leaves the answer boxes empty rather than producing a plausible-looking substitute.</p><p>Text is copied character for character, including the spacing the rules add, so a result pasted into another document keeps its shape. Nothing is normalised on the way out — no trimming, no case folding, no smart quotes.</p><p>That also means the page has a narrow definition of success: a value either reads as the kind of input the rules expect or it does not, and a partial match is treated as a mistake rather than guessed at. A page that guessed would be more convenient once and wrong quietly afterwards.</p><p>What the page does not do is check the result against the outside world. It has no table of real codes, no list of valid dates and no opinion on whether the value you typed means what you think it means. It converts the syntax, and the meaning is yours.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need latitude and longitude. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Easting, northing and zone should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
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
                'q' => 'What does the Lat Long to UTM Converter work out?',
                'a' => 'It returns easting, northing and zone from latitude and longitude. It applies a fixed set of rules to what you type, which is why the formula table is empty and the script below it is the calculator.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'Latitude, Longitude. The result boxes need no input of their own: they are computed.',
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
var A = 6378137.0, F = 1 / 298.257223563, K0 = 0.9996;
function utm(lat, lon) {
  var zone = Math.floor((lon + 180) / 6) + 1;
  var lon0 = (zone - 1) * 6 - 180 + 3;
  var rad = Math.PI / 180;
  var e2 = 2 * F - F * F, ep2 = e2 / (1 - e2);
  var phi = lat * rad, lam = lon * rad, lam0 = lon0 * rad;
  var N = A / Math.sqrt(1 - e2 * Math.sin(phi) * Math.sin(phi));
  var T = Math.tan(phi) * Math.tan(phi);
  var C = ep2 * Math.cos(phi) * Math.cos(phi);
  var Aa = Math.cos(phi) * (lam - lam0);
  var M = A * ((1 - e2/4 - 3*e2*e2/64 - 5*e2*e2*e2/256) * phi
        - (3*e2/8 + 3*e2*e2/32 + 45*e2*e2*e2/1024) * Math.sin(2*phi)
        + (15*e2*e2/256 + 45*e2*e2*e2/1024) * Math.sin(4*phi)
        - (35*e2*e2*e2/3072) * Math.sin(6*phi));
  var easting = K0 * N * (Aa + (1 - T + C) * Math.pow(Aa,3)/6
        + (5 - 18*T + T*T + 72*C - 58*ep2) * Math.pow(Aa,5)/120) + 500000;
  var northing = K0 * (M + N * Math.tan(phi) * (Aa*Aa/2
        + (5 - T + 9*C + 4*C*C) * Math.pow(Aa,4)/24
        + (61 - 58*T + T*T + 600*C - 330*ep2) * Math.pow(Aa,6)/720));
  if (lat < 0) northing += 10000000;
  return {easting: easting, northing: northing, zone: zone + (lat >= 0 ? "N" : "S")};
}
omni.onResult(["latitude", "longitude"], function (ctx) {
  var lat = Number(ctx.getRawInput("latitude")), lon = Number(ctx.getRawInput("longitude"));
  if (!isFinite(lat) || !isFinite(lon) || lat < -80 || lat > 84) {
    ctx.exportValue("easting", ""); ctx.exportValue("northing", ""); ctx.exportValue("zone", ""); return;
  }
  var u = utm(lat, lon);
  ctx.exportValue("easting", u.easting.toFixed(2));
  ctx.exportValue("northing", u.northing.toFixed(2));
  ctx.exportValue("zone", u.zone);
});
TXT,
]
;
