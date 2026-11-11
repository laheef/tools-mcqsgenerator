<?php

/**
 * Decimal to Octal Converter
 * /conversion/decimal-to-octal
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'authored' => true,
    'name' => 'Decimal to Octal Converter',
    'meta' => [
        'title' => 'Decimal to Octal Converter: Convert, Check and Copy',
        'description' => 'Base eight survives in file permissions and in a few old interfaces. The page converts a decimal count into octal, binary and hexadecimal at once. Exact.',
        'h1' => 'Decimal to Octal Converter',
        'updated' => '2026-11-11',
    ],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'number',
                    'label' => 'Decimal number',
                    'type' => 'text',
                    'default' => '64',
                ],
                [
                    'name' => 'octal',
                    'label' => 'Octal',
                    'type' => 'result',
                ],
                [
                    'name' => 'binary',
                    'label' => 'Binary',
                    'type' => 'result',
                ],
                [
                    'name' => 'hex',
                    'label' => 'Hexadecimal',
                    'type' => 'result',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Decimal to Octal Converter',
            'results' => [
            ],
        ],
    ],
    'article' => [
        'intro' => 'Base eight survives in file permissions and in a few old interfaces. The page converts a decimal count into octal, binary and hexadecimal at once.',
        'sections' => [
            [
                'title' => 'What this calculator works out',
                'html' => '<p>Base eight survives in file permissions and in a few old interfaces. The page converts a decimal count into octal, binary and hexadecimal at once.</p><p>The formula table is deliberately empty, because this page does not solve an equation: it applies a fixed set of rules to what you type. An empty table with an explanation is honest, and a made-up formula would not be.</p><p>The page reports <strong>octal, binary and hexadecimal</strong> from the boxes above it. It applies a fixed set of rules to what you type, which is why the formula table is empty and the script below it is the calculator. Every line of the table below is that same relationship arranged for a different unknown, so the working can be followed from whichever quantity you already have.</p>',
            ],
            [
                'title' => 'The formula, and every way round it',
                'html' => '<p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody></tbody></table><p>There is no algebraic relationship to rearrange here, which is why the table is empty. The script on the page is the calculator, and the rules it applies are listed in the article below it.</p>',
            ],
            [
                'title' => 'What to enter, and what comes back',
                'html' => '<p>Fill in 1 box and the page has everything it needs. It reports octal, binary and hexadecimal.</p><ul><li><strong>Decimal number</strong>.</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Octal</strong></li><li><strong>Binary</strong></li><li><strong>Hexadecimal</strong></li></ul><p>Every input needs a value before the page can answer. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number. The result boxes are read-only and recomputed from the inputs, so the page always works forwards; to go the other way the table above gives the rearrangement.</p>',
            ],
            [
                'title' => 'A worked example you can reproduce',
                'html' => '<p>Enter the values the page is built around — Decimal number = 64 — and the results panel reads:</p><ul></ul><p>Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p>Reproduce this on a calculator and you should land on the same figures, give or take the last decimal. If you land a factor of ten away, the value you entered was in a different unit from the one the box names, and no amount of care with the arithmetic will fix that.</p>',
            ],
            [
                'title' => 'Reading the answer',
                'html' => '<p>Read the answer with its unit, not on its own. A bare number carried into a report is where conversions go wrong months later. The panel keeps the unit beside every figure for that reason, and the table above repeats it.</p><p>Ask whether the size is plausible before you use it. One acre is smaller than a football pitch; a kilogram is a little over two pounds; a litre of water weighs a kilogram. Comparison with something you can picture catches most slips faster than rechecking the arithmetic.</p><p>Base eight survives in file permissions and in a few old interfaces. The answer arrives in the boxes beside the form, and every box is written by the same script, so a figure that appears in one and not another means the input it needed was empty.</p><p>Copy what you need before you change the input: nothing on the page is saved, and the previous answer is gone the moment the next one is computed. Where the output is text, it is copied character for character, including any spacing the rules add.</p><p>Octal, binary and hexadecimal should land in the range you expected before you pressed anything. A figure ten times out, or a thousand times out, is the usual shape of a unit slip and not of a calculation error.</p>',
            ],
            [
                'title' => 'How much each input moves the answer',
                'html' => '<p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>octal</th><th>binary</th><th>hexadecimal</th></tr></thead><tbody></tbody></table><p>A ten per cent nudge is used because it is the size of error a person makes when they measure roughly. Where the table shows ten per cent in and ten per cent out, the relationship is proportional in that box and the accuracy of your measurement is the accuracy of the answer.</p>',
            ],
            [
                'title' => 'Two more scenarios, worked through',
                'html' => '<p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul></ul><p>Neither scenario is exotic. The small one is what a quick estimate looks like; the large one is what a real job looks like. Both are computed by the same lines of arithmetic as the example above, which is the point.</p>',
            ],
            [
                'title' => 'Where the numbers usually go wrong',
                'html' => '<ul><li><strong><strong>Converting twice.</strong></strong> A figure already in feet converted to metres and then to feet again comes back wrong, and nothing in the display says so.</li><li><strong><strong>Using a rounded factor and a rounded answer.</strong></strong> Each rounding is small; the product of several is not. Keep precision in the middle and round only at the end.</li><li><strong><strong>Assuming both sides use the same word the same way.</strong></strong> A US gallon, an imperial gallon, a dry gallon and a metric gallon are four different volumes sharing one name.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer has to be worked back through the inputs.</li></ul>',
            ],
            [
                'title' => 'Units and precision',
                'html' => '<p>Each box carries its unit beside it, and each result is reported in the unit named with it: octal, binary, hexadecimal.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until an input changes.</p><p>Units in a formula behave like ordinary algebra: feet times feet leaves square feet, and a square footage times a thickness divided by twelve leaves cubic feet. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula usually shows which one was entered on the wrong scale.</p><p>Unit names are written in full in the article and abbreviated on the form, so a box labelled metres can never be mistaken for one labelled millimetres. Where two systems use the same word for different sizes, the article names the system: a US gallon is 3.785 litres and an imperial gallon is 4.546, and a recipe that crosses that line is out by twenty per cent.</p>',
            ],
            [
                'title' => 'Getting an answer, step by step',
                'html' => '<ol><li><strong>Collect the inputs.</strong> You need decimal number. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes and press Calculate; the panel updates as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Octal, binary and hexadecimal should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should.</li></ol><p>Write the answer down with its unit and the values that produced it.</p>',
            ],
            [
                'title' => 'When one input is out by a factor of ten',
                'html' => '<p>A decimal slip is the commonest arithmetic error in a conversion, and it leaves an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker, the box sits inside a logarithm, a power or a sum and the mistake is partly absorbed — which is more dangerous, because the result then looks reasonable.</p>',
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
                'q' => 'What does the Decimal to Octal Converter work out?',
                'a' => 'It returns octal, binary and hexadecimal from decimal number. It applies a fixed set of rules to what you type, which is why the formula table is empty and the script below it is the calculator.',
            ],
            [
                'q' => 'Which values do I need before I start?',
                'a' => 'Decimal number. The result boxes need no input of their own: they are computed.',
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
function toBase(n, base) {
  if (!isFinite(n)) return "";
  var neg = n < 0;
  n = Math.abs(Math.trunc(n));
  if (n === 0) return "0";
  var digits = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ", s = "";
  while (n > 0) { s = digits.charAt(n % base) + s; n = Math.floor(n / base); }
  return (neg ? "-" : "") + s;
}

omni.onResult(["number"], function (ctx) {
  var n = Number(String(ctx.getRawInput("number")).replace(/[^0-9.\-]/g, ""));
  ctx.exportValue("octal", isFinite(n) ? toBase(n, 8) : "");
  ctx.exportValue("binary", isFinite(n) ? toBase(n, 2) : "");
  ctx.exportValue("hex", isFinite(n) ? toBase(n, 16) : "");
});
TXT,
]
;
