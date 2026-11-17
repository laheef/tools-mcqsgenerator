<?php

/**
 * Bond yield
 * /finance/bond-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bond yield',
    'meta' => ['title' => 'Bond yield Calculator: Formula, Steps & Examples', 'description' => 'Enter face value and bond price and get bond yield back. Any box can be the unknown. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Bond yield Calculator', 'updated' => '2026-07-31'],
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
                                'Annually' => '1.000000000000000',
                                'Semi-annually' => '2.000000000000000',
                                'Quarterly' => '4.000000000000000',
                                'Monthly' => '12.000000000000000',
                                'Weekly' => '52.000000000000000',
                                'Daily' => '365.000000000000000',
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
                            'label' => 'Bond yield',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['standard', '2'],
                        ],
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
        Enter Face value, Bond price and Annual coupon rate into Bond yield and the answer comes back as Bond yield. It is a single relationship that reads bond yield out of face value, not a table of canned results keyed by them. Units for Bond yield default to percent and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Bond yield calculator works', 'html' => <<<'TXT'
            <p>The Bond yield calculator applies one relationship to 5 numbers and reports Bond yield.</p><p>In the form&#039;s own words, Bond yield = bondYield(Face value, Years to maturity, Bond price, Annual coupon rate, Coupon frequency).</p><p>The answers are Bond yield; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Face value</strong> — in USD</li><li><strong>Bond price</strong> — in USD</li><li><strong>Annual coupon rate</strong> — in percent</li><li><strong>Coupon frequency</strong> — a plain number, no unit</li><li><strong>Years to maturity</strong> — in year(s)</li></ul><p>The result box is Bond yield in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>The unit chip on Bond yield lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Bond yield</strong> = <code>bondYield(Face value, Years to maturity, Bond price, Annual coupon rate, Coupon frequency)</code></li></ul>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Annual coupon rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Bond yield is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Face value left as a guess.</strong> Anything typed into Face value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Bond price left as a guess.</strong> Anything typed into Bond price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Face value to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Bond yield form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Face value</strong> takes a plain number with no unit attached. Change it and Bond yield changes with it. Fill it from a measurement rather than a memory — Face value is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Bond price</strong> takes a plain number with no unit attached. Change it and Bond yield changes with it. Fill it from a measurement rather than a memory — Bond price is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Annual coupon rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Bond yield changes with it. Fill it from a measurement rather than a memory — Annual coupon rate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Coupon frequency</strong> takes a plain number with no unit attached. Change it and Bond yield changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Coupon frequency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Years to maturity</strong> is measured in year(s). Change it and Bond yield changes with it. Fill it from a measurement rather than a memory — Years to maturity is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Bond yield</strong> is a percent figure. The value follows from Face value, Years to maturity, Bond price and Annual coupon rate. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Bond yield actually offers.</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Face value, Bond price, Annual coupon rate and Coupon frequency ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Face value — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Bond yield in perc against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Bond yield is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Face value, Bond price and Annual coupon rate measured, Bond yield wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/software-contract-value">Software contract value Calculator</a>, <a href="/finance/sortino-ratio">Sortino ratio Calculator</a> and <a href="/finance/spending-multiplier">Spending multiplier</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Bond yield is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Bond yield is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Face value, Bond price, Annual coupon rate and Coupon frequency beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bond yield calculator work out?', 'a' => <<<'TXT'
            Bond yield, from Face value, Years to maturity, Bond price and Annual coupon rate. The relationship is Bond yield = bondYield(Face value, Years to maturity, Bond price, Annual coupon rate, Coupon frequency).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Face value (USD), Bond price (USD), Annual coupon rate (percent), Coupon frequency, Years to maturity (year(s)). With face value, bond price and annual coupon rate in place, Bond yield can stay blank and the page will work it out.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Bond yield is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Bond yield is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Bond yield at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/software-contract-value', 'name' => 'Software contract value Calculator'],
            ['path' => '/finance/sortino-ratio', 'name' => 'Sortino ratio Calculator'],
            ['path' => '/finance/spending-multiplier', 'name' => 'Spending multiplier'],
        ],
        'authors' => [],
    ],
];
