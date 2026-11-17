<?php

/**
 * Yield to maturity
 * /finance/yield-to-maturity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Yield to maturity',
    'meta' => ['title' => 'Yield to maturity: Formula, Steps & Results', 'description' => 'Enter face value and bond price and get Yield to maturity (YTM) back. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Yield to maturity Calculator', 'updated' => '2025-07-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'face_value',
                            'label' => 'Face value',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bond_price',
                            'label' => 'Bond price',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coupon_rate',
                            'label' => 'Annual coupon rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coupon_frequency',
                            'label' => 'Coupon frequency',
                            'type' => 'select',
                            'options' => [
                                'Annually' => '1',
                                'Semi-annually' => '2',
                                'Quarterly' => '4',
                                'Monthly' => '12',
                                'Weekly' => '52',
                                'Daily' => '365',
                            ],
                            'control' => 'DROPDOWN',
                            'default' => 'Annually',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'years',
                            'label' => 'Years to maturity',
                            'type' => 'number',
                            'suffix' => 'year(s)',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bond_yield',
                            'label' => 'Yield to maturity (YTM)',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'We cannot calculate the bond yield of your inputs. Please double-check them.'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'bond_yield = bondYield(face_value, years, bond_price, coupon_rate, coupon_frequency)',
            'results' => ['bond_yield' => 'bondYield(face_value, years, bond_price, coupon_rate, coupon_frequency)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";function IRR(values,_guess){var irrResult=function irrResult(values,dates,rate){var r=rate+1;var result=values[0];for(var i=1;i<values.length;i++){result+=values[i]/Math.pow(r,(dates[i]-dates[0])/365)}return result};var irrResultDeriv=function irrResultDeriv(values,dates,rate){var r=rate+1;var result=0;for(var i=1;i<values.length;i++){var frac=(dates[i]-dates[0])/365;result-=frac*values[i]/Math.pow(r,frac+1)}return result};var dates=[];var positive=false;var negative=false;for(var i=0;i<values.length;i++){dates[i]=i===0?0:dates[i-1]+365;if(values[i]>0){positive=true}if(values[i]<0){negative=true}}if(!positive||!negative){return Number.NaN}var guess=_guess===null?0.1:_guess;var resultRate=guess;var epsMax=1e-10;var iterMax=10000;var newRate,epsRate,resultValue;var iteration=0;var contLoop=true;do{resultValue=irrResult(values,dates,resultRate);newRate=resultRate-resultValue/irrResultDeriv(values,dates,resultRate);epsRate=Math.abs(newRate-resultRate);resultRate=newRate;contLoop=epsRate>epsMax&&Math.abs(resultValue)>epsMax}while(contLoop&&++iteration<iterMax);if(contLoop){return Number.NaN}return resultRate}omni.define("bondYield",function(par,n,price,coup_rate,freq){var cf=[-price];var period=n*freq;var coupon=coup_rate*par/freq;for(var i=0;i<period-1;i++){cf.push(coupon)}cf.push(coupon+par);var guess=-0.5;return IRR(cf,guess)*freq});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Face value, Bond price and Annual coupon rate into Yield to maturity and the answer comes back as Yield to maturity (YTM). It is a single relationship that reads yield to maturity (YTM) out of face value, not a table of canned results keyed by them. Units for Yield to maturity (YTM) default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Yield to maturity calculator works', 'html' => <<<'TXT'
            <p>Yield to maturity answers one question from 5 numbers, and the answer is Yield to maturity (YTM).</p><p>The relationship it solves reads Yield to maturity (YTM) = bondYield(Face value, Years to maturity, Bond price, Annual coupon rate, Coupon frequency).</p><p>The answers are Yield to maturity (YTM); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Face value</strong> — in USD</li><li><strong>Bond price</strong> — in USD</li><li><strong>Annual coupon rate</strong> — in percent</li><li><strong>Coupon frequency</strong> — a plain number, no unit</li><li><strong>Years to maturity</strong> — in year(s)</li></ul><p>The answer comes back as Yield to maturity (YTM) in percent. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Yield to maturity (YTM) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Yield to maturity (YTM)</strong> = <code>bondYield(Face value, Years to maturity, Bond price, Annual coupon rate, Coupon frequency)</code></li></ul>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Annual coupon rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Yield to maturity (YTM) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Face value left as a guess.</strong> Anything typed into Face value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Bond price left as a guess.</strong> Anything typed into Bond price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Face value to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Face value</strong> takes a plain number with no unit attached. The page reads it when it works out Yield to maturity (YTM). Have it to hand before you start: Face value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Bond price</strong> takes a plain number with no unit attached. The page reads it when it works out Yield to maturity (YTM). Have it to hand before you start: Bond price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Annual coupon rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Yield to maturity (YTM). Have it to hand before you start: Annual coupon rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Coupon frequency</strong> takes a plain number with no unit attached. The page reads it when it works out Yield to maturity (YTM). It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Coupon frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Years to maturity</strong> is measured in year(s). The page reads it when it works out Yield to maturity (YTM). Have it to hand before you start: Years to maturity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Yield to maturity (YTM)</strong> is a percent figure. It is worked out from Face value, Years to maturity, Bond price and Annual coupon rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Face value, Bond price, Annual coupon rate and Coupon frequency. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Face value into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Yield to maturity (YTM) in perc with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Yield to maturity (YTM) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Face value, Bond price and Annual coupon rate measured, Yield to maturity (YTM) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/savings-plan">Savings plan Calculator</a>, <a href="/finance/savings-withdrawal">Savings withdrawal</a> and <a href="/finance/savings">Savings</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Yield to maturity is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Face value, Bond price, Annual coupon rate and Coupon frequency beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Yield to maturity calculator work out?', 'a' => <<<'TXT'
            Yield to maturity (YTM), from Face value, Years to maturity, Bond price and Annual coupon rate. The relationship is Yield to maturity (YTM) = bondYield(Face value, Years to maturity, Bond price, Annual coupon rate, Coupon frequency).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Face value (USD), Bond price (USD), Annual coupon rate (percent), Coupon frequency, Years to maturity (year(s)). Fill face value, bond price and annual coupon rate and leave Yield to maturity (YTM) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Yield to maturity (YTM) is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Yield to maturity (YTM), so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Yield to maturity (YTM) at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/savings-plan', 'name' => 'Savings plan Calculator'],
            ['path' => '/finance/savings-withdrawal', 'name' => 'Savings withdrawal'],
            ['path' => '/finance/savings', 'name' => 'Savings'],
        ],
        'authors' => [],
    ],
];
