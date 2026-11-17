<?php

/**
 * Check digit
 * /finance/gtin-check-digit
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Check digit',
    'meta' => ['title' => 'Check digit Calculator: Formula, Steps & Examples', 'description' => 'Check digit reports digits. The formula is printed in the form\'s own words. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'Check digit Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'leading_zeros',
                            'label' => 'Number of leading zeros',
                            'type' => 'select',
                            'options' => [
                                '0',
                                '1',
                                '2',
                                '3',
                                '4',
                                '5',
                                '6',
                                '7',
                                '8',
                                '9',
                                '10',
                            ],
                            'dataset' => 'leading_zeros',
                            'control' => 'DROPDOWN',
                            'help' => 'Example: 0001234 has 3 leading zeros.',
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'code',
                            'label' => 'Code (without check digit or leading zeros)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'digits == -1', 'text' => 'It doesn\'t look like any format we know. Enter 7, 11, 12, 13, 16, or 17 digits (including the number of leading zeros) to see a result.'],
                                ['when' => 'digits == 7', 'text' => 'Your code without check digit has 7 digits. Looks like it\'s GTIN-8 format. Check digit: {{check_digit.formattedValue}}'],
                                ['when' => 'digits == 11', 'text' => 'Your code without check digit has 11 digits. Looks like it\'s GTIN-12 format. Check digit: {{check_digit.formattedValue}}'],
                                ['when' => 'digits == 12', 'text' => 'Your code without check digit has 12 digits. Looks like it\'s GTIN-13 format. Check digit: {{check_digit.formattedValue}}'],
                                ['when' => 'digits == 13', 'text' => 'Your code without check digit has 13 digits. Looks like it\'s GTIN-14 format. Check digit: {{check_digit.formattedValue}}'],
                                ['when' => 'digits == 16', 'text' => 'Your code without check digit has 16 digits. Looks like it\'s GSIN format. Check digit: {{check_digit.formattedValue}}'],
                                ['when' => 'digits == 17', 'text' => 'Your code without check digit has 17 digits. Looks like it\'s SSCC format. Check digit: {{check_digit.formattedValue}}'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'check_digit',
                            'label' => 'Check digit',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'digits',
                            'label' => 'Digits',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'check_digit = calculateCheckDigit(code, leading_zeros, 1)',
            'results' => ['check_digit' => 'calculateCheckDigit(code, leading_zeros, 1)'],
        ],
        [
            'title' => 'digits = calculateCheckDigit(code, leading_zeros, 0)',
            'results' => ['digits' => 'calculateCheckDigit(code, leading_zeros, 0)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var result={"res":"","digit":""};omni.define("calculateCheckDigit",function(code,leading_zeros,option){var rawA="0".repeat(leading_zeros)+code.toString();var n=rawA.length;if(n===7){var digit3_7=parseInt((""+rawA)[0])+parseInt((""+rawA)[2])+parseInt((""+rawA)[4])+parseInt((""+rawA)[6]);var digit1_7=parseInt((""+rawA)[1])+parseInt((""+rawA)[3])+parseInt((""+rawA)[5]);var result_7=10-(digit1_7+3*digit3_7)%10;if(result_7===10){result_7=0}result.res=7;result.digit=result_7}else if(n===11){var digit3_11=parseInt((""+rawA)[0])+parseInt((""+rawA)[2])+parseInt((""+rawA)[4])+parseInt((""+rawA)[6])+parseInt((""+rawA)[8])+parseInt((""+rawA)[10]);var digit1_11=parseInt((""+rawA)[1])+parseInt((""+rawA)[3])+parseInt((""+rawA)[5])+parseInt((""+rawA)[7])+parseInt((""+rawA)[9]);var result_11=10-(digit1_11+3*digit3_11)%10;if(result_11===10){result_11=0}result.res=11;result.digit=result_11}else if(n===12){var digit3_12=parseInt((""+rawA)[1])+parseInt((""+rawA)[3])+parseInt((""+rawA)[5])+parseInt((""+rawA)[7])+parseInt((""+rawA)[9])+parseInt((""+rawA)[11]);var digit1_12=parseInt((""+rawA)[0])+parseInt((""+rawA)[2])+parseInt((""+rawA)[4])+parseInt((""+rawA)[6])+parseInt((""+rawA)[8])+parseInt((""+rawA)[10]);var result_12=10-(digit1_12+3*digit3_12)%10;if(result_12===10){result_12=0}result.res=12;result.digit=result_12}else if(n===13){var digit3_13=parseInt((""+rawA)[0])+parseInt((""+rawA)[2])+parseInt((""+rawA)[4])+parseInt((""+rawA)[6])+parseInt((""+rawA)[8])+parseInt((""+rawA)[10])+parseInt((""+rawA)[12]);var digit1_13=parseInt((""+rawA)[1])+parseInt((""+rawA)[3])+parseInt((""+rawA)[5])+parseInt((""+rawA)[7])+parseInt((""+rawA)[9])+parseInt((""+rawA)[11]);var result_13=10-(digit1_13+3*digit3_13)%10;if(result_13===10){result_13=0}result.res=13;result.digit=result_13}else if(n===16){var digit3_16=parseInt((""+rawA)[1])+parseInt((""+rawA)[3])+parseInt((""+rawA)[5])+parseInt((""+rawA)[7])+parseInt((""+rawA)[9])+parseInt((""+rawA)[11])+parseInt((""+rawA)[13])+parseInt((""+rawA)[15]);var digit1_16=parseInt((""+rawA)[0])+parseInt((""+rawA)[2])+parseInt((""+rawA)[4])+parseInt((""+rawA)[6])+parseInt((""+rawA)[8])+parseInt((""+rawA)[10])+parseInt((""+rawA)[12])+parseInt((""+rawA)[14]);var result_16=10-(digit1_16+3*digit3_16)%10;if(result_16===10){result_16=0}result.res=16;result.digit=result_16}else if(n===17){var digit3_17=parseInt((""+rawA)[0])+parseInt((""+rawA)[2])+parseInt((""+rawA)[4])+parseInt((""+rawA)[6])+parseInt((""+rawA)[8])+parseInt((""+rawA)[10])+parseInt((""+rawA)[12])+parseInt((""+rawA)[14])+parseInt((""+rawA)[16]);var digit1_17=parseInt((""+rawA)[1])+parseInt((""+rawA)[3])+parseInt((""+rawA)[5])+parseInt((""+rawA)[7])+parseInt((""+rawA)[9])+parseInt((""+rawA)[11])+parseInt((""+rawA)[13])+parseInt((""+rawA)[15]);var result_17=10-(digit1_17+3*digit3_17)%10;if(result_17===10){result_17=0}result.res=17;result.digit=result_17}else if(n===1){result.res=-1;result.digit=-1}else{result.res=-1;result.digit=-1}return option?result.digit:result.res});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Check digit turns Number of leading zeros and Code (without check digit or leading zeros) into Check digit and Digits. It is a single relationship that reads check digit out of number of leading zeros, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Check digit calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Check digit: it takes 2 numbers and reports Check digit and Digits.</p><p>In the form&#039;s own words, Check digit = calculateCheckDigit(Code (without check digit or leading zeros), Number of leading zeros, 1).</p><p>The answers are Check digit and Digits; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Number of leading zeros</strong> — a plain number, no unit. Example: 0001234 has 3 leading zeros.</li><li><strong>Code (without check digit or leading zeros)</strong> — a plain number, no unit</li></ul><p>The answers come back as Check digit, Digits. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Check digit takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Check digit</strong> = <code>calculateCheckDigit(Code (without check digit or leading zeros), Number of leading zeros, 1)</code></li><li><strong>Digits</strong> = <code>calculateCheckDigit(Code (without check digit or leading zeros), Number of leading zeros, 0)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Check digit</strong> = <code>calculateCheckDigit(Code (without check digit or leading zeros), Number of leading zeros, 1)</code> — the form to use when Code (without check digit or leading zeros) and Number of leading zeros are the values you have.</li><li><strong>Digits</strong> = <code>calculateCheckDigit(Code (without check digit or leading zeros), Number of leading zeros, 0)</code> — the form to use when Code (without check digit or leading zeros) and Number of leading zeros are the values you have.</li></ul><p>Any one of Check digit and Digits can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Check digit and Digits are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Number of leading zeros left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of leading zeros is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Code (without check digit or leading zeros) left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Code (without check digit or leading zeros) is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Number of leading zeros is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Check digit form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Number of leading zeros</strong> takes a plain number with no unit attached. Example: 0001234 has 3 leading zeros. It feeds Check digit and Digits. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Number of leading zeros is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Code (without check digit or leading zeros)</strong> takes a plain number with no unit attached. It feeds Check digit and Digits. Fill it from a measurement rather than a memory — Code (without check digit or leading zeros) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Check digit</strong> is a plain number. It is worked out from Code (without check digit or leading zeros) and Number of leading zeros. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Digits</strong> is a plain number. It is worked out from Code (without check digit or leading zeros) and Number of leading zeros. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Number of leading zeros and Code (without check digit or leading zeros) ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Number of leading zeros — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Check digit against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Check digit follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Number of leading zeros and Code (without check digit or leading zeros) is what you already know and Check digit and Digits is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/carried-interest">Carried interest Calculator</a>, <a href="/finance/carry-trade">Carry trade Calculator</a> and <a href="/finance/cash-act-2020">CASH Act of 2020</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Check digit is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Check digit is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Number of leading zeros and Code (without check digit or leading zeros) beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Check digit calculator work out?', 'a' => <<<'TXT'
            Check digit and Digits, from Code (without check digit or leading zeros) and Number of leading zeros. The relationship is Check digit = calculateCheckDigit(Code (without check digit or leading zeros), Number of leading zeros, 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Number of leading zeros, Code (without check digit or leading zeros). Fill number of leading zeros and code (without check digit or leading zeros) and leave Check digit empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Check digit and Digits blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Check digit is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Number of leading zeros blank and the page solves for it, reporting Check digit instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Check digit at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/carried-interest', 'name' => 'Carried interest Calculator'],
            ['path' => '/finance/carry-trade', 'name' => 'Carry trade Calculator'],
            ['path' => '/finance/cash-act-2020', 'name' => 'CASH Act of 2020'],
        ],
        'authors' => [],
    ],
];
