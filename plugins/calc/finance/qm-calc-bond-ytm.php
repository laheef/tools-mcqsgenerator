<?php

/**
 * Bond YTM
 * /finance/bond-ytm
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bond YTM',
    'meta' => ['title' => 'Bond YTM Calculator: Formula, Steps & Examples', 'description' => 'Bond YTM takes face value, bond price and annual coupon rate and returns yield to maturity (YTM). Every box can be solved for, not only the one in the title.', 'h1' => 'Bond YTM Calculator', 'updated' => '2026-09-14'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'value',
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
                            'name' => 'price',
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
                            'name' => 'coup_rate',
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
                            'name' => 'freq',
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
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'bond_yield = bondYield(value, years, price, coup_rate, freq)',
            'results' => ['bond_yield' => 'bondYield(value, years, price, coup_rate, freq)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";function IRR(values,guess){var irrResult=function irrResult(values,dates,rate){var r=rate+1;var result=values[0];for(var i=1;i<values.length;i++){result+=values[i]/Math.pow(r,(dates[i]-dates[0])/365)}return result};var irrResultDeriv=function irrResultDeriv(values,dates,rate){var r=rate+1;var result=0;for(var i=1;i<values.length;i++){var frac=(dates[i]-dates[0])/365;result-=frac*values[i]/Math.pow(r,frac+1)}return result};var dates=[];var positive=false;var negative=false;for(var i=0;i<values.length;i++){dates[i]=i===0?0:dates[i-1]+365;if(values[i]>0)positive=true;if(values[i]<0)negative=true}if(!positive||!negative){return Number.NaN}guess=guess===null?0.1:guess;var resultRate=guess;var epsMax=1e-10;var iterMax=10000;var newRate,epsRate,resultValue;var iteration=0;var contLoop=true;do{resultValue=irrResult(values,dates,resultRate);newRate=resultRate-resultValue/irrResultDeriv(values,dates,resultRate);epsRate=Math.abs(newRate-resultRate);resultRate=newRate;contLoop=epsRate>epsMax&&Math.abs(resultValue)>epsMax}while(contLoop&&++iteration<iterMax);if(contLoop){return Number.NaN}return resultRate}omni.define("bondYield",function(par,n,price,coup_rate,freq){var cf=[-price];var period=n*freq;var coupon=coup_rate*par/freq;for(var i=0;i<period-1;i++){cf.push(coupon)}cf.push(coupon+par);var guess=-0.5;return IRR(cf,guess)*freq});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter Face value, Bond price and Annual coupon rate into Bond YTM and the answer comes back as Yield to maturity (YTM). Nothing is looked up on this page: yield to maturity (YTM) is computed from face value and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Yield to maturity (YTM) is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Bond YTM calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Bond YTM: it takes 5 numbers and reports Yield to maturity (YTM).</p><p>The relationship it solves reads Yield to maturity (YTM) = bondYield(Face value, Years to maturity, Bond price, Annual coupon rate, Coupon frequency).</p><p>The answers are Yield to maturity (YTM); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs.</p><ul><li><strong>Face value</strong> — in USD</li><li><strong>Bond price</strong> — in USD</li><li><strong>Annual coupon rate</strong> — in percent</li><li><strong>Coupon frequency</strong> — a plain number, no unit</li><li><strong>Years to maturity</strong> — in year(s)</li></ul><p>The result box is Yield to maturity (YTM) in percent. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Yield to maturity (YTM) lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Yield to maturity (YTM)</strong> = <code>bondYield(Face value, Years to maturity, Bond price, Annual coupon rate, Coupon frequency)</code></li></ul>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Annual coupon rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Yield to maturity (YTM) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Face value left as a guess.</strong> Anything typed into Face value is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Bond price left as a guess.</strong> Anything typed into Bond price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Face value is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Face value</strong> takes a plain number with no unit attached. The page reads it when it works out Yield to maturity (YTM). Have it to hand before you start: Face value is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Bond price</strong> takes a plain number with no unit attached. The page reads it when it works out Yield to maturity (YTM). Have it to hand before you start: Bond price is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Annual coupon rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. The page reads it when it works out Yield to maturity (YTM). Have it to hand before you start: Annual coupon rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Coupon frequency</strong> takes a plain number with no unit attached. The page reads it when it works out Yield to maturity (YTM). It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: Coupon frequency is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Years to maturity</strong> is measured in year(s). The page reads it when it works out Yield to maturity (YTM). Have it to hand before you start: Years to maturity is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Yield to maturity (YTM)</strong> is a percent figure. It is worked out from Face value, Years to maturity, Bond price and Annual coupon rate. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Face value, Bond price, Annual coupon rate and Coupon frequency. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Face value into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Yield to maturity (YTM) in perc with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Yield to maturity (YTM) is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are percent and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Face value, Bond price and Annual coupon rate are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Face value, Bond price and Annual coupon rate measured, Yield to maturity (YTM) wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/present-value">Present value Calculator</a>, <a href="/finance/annuity-present-value">Present value of annuity</a> and <a href="/finance/pvgo">Present value of growth opportunities (PVGO) Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from Bond YTM is a number to act on, so the useful question is what to do with Yield to maturity (YTM) (perc) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Face value, Bond price, Annual coupon rate and Coupon frequency alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bond YTM calculator work out?', 'a' => <<<'TXT'
            Yield to maturity (YTM), from Face value, Years to maturity, Bond price and Annual coupon rate. The relationship is Yield to maturity (YTM) = bondYield(Face value, Years to maturity, Bond price, Annual coupon rate, Coupon frequency).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Face value (USD), Bond price (USD), Annual coupon rate (percent), Coupon frequency, Years to maturity (year(s)). With face value, bond price and annual coupon rate in place, Yield to maturity (YTM) can stay blank and the page will work it out.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Yield to maturity (YTM) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            Every box has to have a number in it. What this page returns is Yield to maturity (YTM), so an empty input simply leaves the result blank rather than choosing a new unknown.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Yield to maturity (YTM) keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/present-value', 'name' => 'Present value Calculator'],
            ['path' => '/finance/annuity-present-value', 'name' => 'Present value of annuity'],
            ['path' => '/finance/pvgo', 'name' => 'Present value of growth opportunities (PVGO) Calculator'],
        ],
        'authors' => [],
    ],
];
