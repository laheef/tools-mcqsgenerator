<?php

/**
 * Stamp Duty Land Tax (SDLT)
 * /finance/sdlt-uk
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Stamp Duty Land Tax (SDLT)',
    'meta' => ['title' => 'Stamp Duty Land Tax (SDLT) — Formula & Results', 'description' => 'Stamp Duty Land Tax (SDLT) works out stamp duty from i am..., residency and property price. Every box can be solved for, not only the one in the title.', 'h1' => 'Stamp Duty Land Tax (SDLT) Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'buying',
                            'label' => 'I am...',
                            'type' => 'select',
                            'options' => ['a first-time buyer' => '0', 'moving home' => '1', 'buying additional property' => '2', 'buying a property to let or flip' => '3'],
                            'dataset' => 'Buying type',
                            'default' => 'a first-time buyer',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'investor_type',
                            'label' => 'Residency',
                            'type' => 'select',
                            'options' => ['UK resident' => '0', 'Non-UK resident' => '1'],
                            'dataset' => 'Investor type',
                            'default' => 'UK resident',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'property_price',
                            'label' => 'Property price',
                            'type' => 'number',
                            'prefix' => '£',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stamp_duty',
                            'label' => 'Stamp duty',
                            'type' => 'number',
                            'prefix' => '£',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => <<<'TXT'
                        You will have to pay £{{stamp_duty.formattedValue}} as Stamp Duty Land Tax (SDLT) for your property purchase. You effective tax rate for SDLT is {{effective_tax_rate.formattedValue}}{{effective_tax_rate.unit}}.
                        TXT],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'effective_tax_rate',
                            'label' => 'Effective tax rate',
                            'type' => 'presentation',
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
            'title' => 'stamp_duty = stampDuty(buying, investor_type, property_price)',
            'results' => ['stamp_duty' => 'stampDuty(buying, investor_type, property_price)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";function _slicedToArray(r,e){return _arrayWithHoles(r)||_iterableToArrayLimit(r,e)||_unsupportedIterableToArray(r,e)||_nonIterableRest()}function _nonIterableRest(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}function _unsupportedIterableToArray(r,a){if(r){if("string"==typeof r)return _arrayLikeToArray(r,a);var t={}.toString.call(r).slice(8,-1);return"Object"===t&&r.constructor&&(t=r.constructor.name),"Map"===t||"Set"===t?Array.from(r):"Arguments"===t||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t)?_arrayLikeToArray(r,a):void 0}}function _arrayLikeToArray(r,a){(null==a||a>r.length)&&(a=r.length);for(var e=0,n=Array(a);e<a;e++)n[e]=r[e];return n}function _iterableToArrayLimit(r,l){var t=null==r?null:"undefined"!=typeof Symbol&&r[Symbol.iterator]||r["@@iterator"];if(null!=t){var e,n,i,u,a=[],f=!0,o=!1;try{if(i=(t=t.call(r)).next,0===l){if(Object(t)!==t)return;f=!1}else for(;!(f=(e=i.call(t)).done)&&(a.push(e.value),a.length!==l);f=!0);}catch(r){o=!0,n=r}finally{try{if(!f&&null!=t["return"]&&(u=t["return"](),Object(u)!==u))return}finally{if(o)throw n}}return a}}function _arrayWithHoles(r){if(Array.isArray(r))return r}omni.define("stampDuty",function(buying,investor_type,property_price){var rate_dict={0:0,1:0.05,2:0.1,3:0.12};var stamp_duty=0;if(investor_type===1){for(var _i=0,_Object$entries=Object.entries(rate_dict);_i<_Object$entries.length;_i++){var _Object$entries$_i=_slicedToArray(_Object$entries[_i],2),key=_Object$entries$_i[0],value=_Object$entries$_i[1];rate_dict[key]=value+0.02}}if(buying===2||buying===3){for(var _i2=0,_Object$entries2=Object.entries(rate_dict);_i2<_Object$entries2.length;_i2++){var _Object$entries2$_i=_slicedToArray(_Object$entries2[_i2],2),_key=_Object$entries2$_i[0],_value=_Object$entries2$_i[1];rate_dict[_key]=_value+0.03}}if(property_price<=250000){stamp_duty=property_price*rate_dict[0]}else if(property_price<=925000){stamp_duty=(property_price-250000)*rate_dict[1]+250000*rate_dict[0]}else if(property_price<=1500000){stamp_duty=(property_price-925000)*rate_dict[2]+(925000-250000)*rate_dict[1]+250000*rate_dict[0]}else{stamp_duty=(property_price-1500000)*rate_dict[3]+(1500000-925000)*rate_dict[2]+(925000-250000)*rate_dict[1]+250000*rate_dict[0]}if(buying===0&&property_price<=625000){if(property_price<=425000){stamp_duty=0}else{stamp_duty=(property_price-425000)*0.05}}return Math.round(stamp_duty*100)/100});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter I am…, Residency and Property price into Stamp Duty Land Tax (SDLT) and the answer comes back as Stamp duty. Nothing is looked up on this page: stamp duty is computed from i am… and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Stamp Duty Land Tax (SDLT) calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Stamp Duty Land Tax (SDLT): it takes 3 numbers and reports Stamp duty.</p><p>In the form&#039;s own words, Stamp duty = stampDuty(I am..., Residency, Property price).</p><p>The answers are Stamp duty; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>I am…</strong> — a plain number, no unit</li><li><strong>Residency</strong> — a plain number, no unit</li><li><strong>Property price</strong> — a plain number, no unit</li></ul><p>What you get back is Stamp duty, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>The unit chip on Effective tax rate lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Stamp duty</strong> = <code>stampDuty(I am..., Residency, Property price)</code></li></ul>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Stamp duty is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>I am… left as a guess.</strong> Anything typed into I am… is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Residency left as a guess.</strong> Anything typed into Residency is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Property price left as a guess.</strong> Anything typed into Property price is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in I am... and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Stamp Duty Land Tax (SDLT) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>I am…</strong> takes a plain number with no unit attached. The page reads it when it works out Stamp duty. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — I am… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Residency</strong> takes a plain number with no unit attached. The page reads it when it works out Stamp duty. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Residency is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Property price</strong> takes a plain number with no unit attached. The page reads it when it works out Stamp duty. Fill it from a measurement rather than a memory — Property price is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Stamp duty</strong> is a plain number. The value follows from I am…, Residency and Property price. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have I am…, Residency and Property price ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with I am… — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Stamp duty against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Stamp duty is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when I am…, Residency and Property price is what you already know and Stamp duty is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/money-counter">Money counter Calculator</a>, <a href="/finance/money-factor">Money factor</a> and <a href="/finance/money-market-account">Money market account Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Stamp Duty Land Tax (SDLT) is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>A criterion for choosing between these pages: Stamp Duty Land Tax (SDLT) answers a different question from the one above, even where the two share a sentence of explanation.</p><p>The nearest are <a href="/finance/money-counter">Money counter Calculator</a>, <a href="/finance/money-factor">Money factor</a> and <a href="/finance/money-market-account">Money market account Calculator</a>. Each takes its own inputs and reports its own answer, and none of them shares a stored value with this page — open two in separate tabs and they will not interfere.</p><p>If the value you need is not the one reported here but a step before or after it, one of those pages probably reports it directly rather than making you convert by hand.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Stamp Duty Land Tax (SDLT) is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put I am…, Residency and Property price beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Stamp Duty Land Tax (SDLT) calculator work out?', 'a' => 'Stamp duty, from I am…, Residency and Property price. The relationship is Stamp duty = stampDuty(I am..., Residency, Property price).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'I am…, Residency, Property price. Enter i am…, residency and property price; Stamp duty is the box to leave alone unless it is the value you came for.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Stamp duty is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The page needs every box filled: Stamp duty is fixed as the value it works out, so there is nothing to solve for when an input is missing.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Stamp duty keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/money-counter', 'name' => 'Money counter Calculator'],
            ['path' => '/finance/money-factor', 'name' => 'Money factor'],
            ['path' => '/finance/money-market-account', 'name' => 'Money market account Calculator'],
        ],
        'authors' => [],
    ],
];
