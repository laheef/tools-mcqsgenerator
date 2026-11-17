<?php

/**
 * Capital gains tax UK
 * /finance/capital-gains-tax-uk
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Capital gains tax UK',
    'meta' => ['title' => 'Capital gains tax UK Calculator: Free, With Steps', 'description' => 'Capital gains tax UK takes tax year and returns total annual income. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'Capital gains tax UK Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tax_year',
                            'label' => 'Tax year',
                            'type' => 'select',
                            'options' => ['2023/24' => '1', '2022/23' => '0'],
                            'default' => '2023/24',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Capital gains',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'capital_gains',
                            'label' => 'Capital gains',
                            'type' => 'number',
                            'prefix' => '£',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'asset_type',
                            'label' => 'Asset type',
                            'type' => 'select',
                            'options' => ['Shares' => '0', 'Property' => '1', 'Crypto' => '2', 'Other' => '3'],
                            'dataset' => 'Asset Type',
                            'default' => 'Shares',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'trust',
                            'label' => 'Are the assets in a trust?',
                            'type' => 'select',
                            'options' => ['No' => '0', 'Yes' => '1'],
                            'dataset' => 'Trust',
                            'default' => 'No',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Total annual income',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'annual_income',
                            'label' => 'Annual income',
                            'type' => 'number',
                            'prefix' => '£',
                            'help' => 'Income from your main job or employment.',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'other_income',
                            'label' => 'Other income',
                            'type' => 'number',
                            'prefix' => '£',
                            'help' => 'Do you have other income sources, e.g., rental income?',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_annual_income',
                            'label' => 'Total annual income',
                            'type' => 'number',
                            'prefix' => '£',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
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
                            'name' => 'capital_gains_tax',
                            'label' => 'Capital gains tax',
                            'type' => 'number',
                            'prefix' => '£',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The capital gains tax of your investment is £{{capital_gains_tax.formattedValue}}, and your profit after tax is £{{profit_after_tax.formattedValue}}. '],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'profit_after_tax',
                            'label' => 'Profit after tax',
                            'type' => 'number',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'total_annual_income = annual_income + other_income',
            'results' => ['total_annual_income' => 'annual_income + other_income', 'other_income' => '-annual_income + total_annual_income', 'annual_income' => '-other_income + total_annual_income'],
        ],
        [
            'title' => 'capital_gains_tax = capg_tax(total_annual_income, capital_gains, asset_type, trust, tax_year)',
            'results' => ['capital_gains_tax' => 'capg_tax(total_annual_income, capital_gains, asset_type, trust, tax_year)'],
        ],
        [
            'title' => 'profit_after_tax = capital_gains - capg_tax(total_annual_income, capital_gains, asset_type, trust, tax_year)',
            'results' => ['profit_after_tax' => 'capital_gains - capg_tax(total_annual_income, capital_gains, asset_type, trust, tax_year)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("capg_tax",function(total_annual_income,capital_gains,asset_type,trust,tax_year){var rate_dict={0:[0.1,0.2],1:[0.18,0.28],2:[0.1,0.2],3:[0.1,0.2]};var taxable_profit=0;var cg_tax=0;if(tax_year===0){if(trust===0){taxable_profit=capital_gains-12300}else{taxable_profit=capital_gains-6150}}else if(tax_year===1){if(trust===0){taxable_profit=capital_gains-6000}else{taxable_profit=capital_gains-3000}}if(taxable_profit>0){if(total_annual_income<=12570){if(taxable_profit<37700){cg_tax=taxable_profit*rate_dict[asset_type][0]}else{cg_tax=37700*rate_dict[asset_type][0]+(taxable_profit-37700)*rate_dict[asset_type][1]}}else if(total_annual_income<=50270){if(taxable_profit<50270-total_annual_income){cg_tax=taxable_profit*rate_dict[asset_type][0]}else{cg_tax=(50270-total_annual_income)*rate_dict[asset_type][0]+(taxable_profit-(50270-total_annual_income))*rate_dict[asset_type][1]}}else{cg_tax=taxable_profit*rate_dict[asset_type][1]}}else{taxable_profit=0}if(cg_tax<0){cg_tax=0}return cg_tax});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Capital gains tax UK works out Total annual income and Capital gains tax from Annual income and Other income. There is no hidden constant here: change total annual income and annual income moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Capital gains tax UK calculator works', 'html' => <<<'TXT'
            <p>The Capital gains tax UK calculator applies one relationship to 2 numbers and reports Total annual income, Capital gains tax and Profit after tax.</p><p>In the form&#039;s own words, Total annual income = Annual income + Other income.</p><p>The result panel carries Total annual income, Capital gains tax and Profit after tax, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Annual income</strong> — a plain number, no unit. Income from your main job or employment.</li><li><strong>Other income</strong> — a plain number, no unit. Do you have other income sources, e.g., rental income?</li></ul><p>The result boxes are Total annual income, Capital gains tax, Profit after tax; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Total annual income is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total annual income</strong> = <code>Annual income + Other income</code></li><li><strong>Other income</strong> = <code>− Annual income + Total annual income</code></li><li><strong>Annual income</strong> = <code>− Other income + Total annual income</code></li><li><strong>Capital gains tax</strong> = <code>capg_tax(Total annual income, Capital gains, Asset type, Are the assets in a trust?, Tax year)</code></li><li><strong>Profit after tax</strong> = <code>Capital gains − capg_tax(Total annual income, Capital gains, Asset type, Are the assets in a trust?, Tax year)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total annual income</strong> = <code>Annual income + Other income</code> — the form to use when Annual income and Other income are the values you have.</li><li><strong>Other income</strong> = <code>− Annual income + Total annual income</code> — the form to use when Annual income and Total annual income are the values you have.</li><li><strong>Annual income</strong> = <code>− Other income + Total annual income</code> — the form to use when Other income and Total annual income are the values you have.</li><li><strong>Capital gains tax</strong> = <code>capg_tax(Total annual income, Capital gains, Asset type, Are the assets in a trust?, Tax year)</code> — the form to use when Total annual income, Capital gains, Asset type and Are the assets in a trust? are the values you have.</li><li><strong>Profit after tax</strong> = <code>Capital gains − capg_tax(Total annual income, Capital gains, Asset type, Are the assets in a trust?, Tax year)</code> — the form to use when Capital gains, Total annual income, Asset type and Are the assets in a trust? are the values you have.</li></ul><p>Any one of Total annual income, Other income and Annual income can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Total annual income, Capital gains tax and Profit after tax are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Annual income left as a guess.</strong> Anything typed into Annual income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Other income left as a guess.</strong> Anything typed into Other income is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Annual income to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Capital gains tax UK form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Annual income</strong> takes a plain number with no unit attached. Income from your main job or employment. Change it and Total annual income and Other income changes with it. Fill it from a measurement rather than a memory — Annual income is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Other income</strong> takes a plain number with no unit attached. Do you have other income sources, e.g., rental income?. Change it and Total annual income and Annual income changes with it. Fill it from a measurement rather than a memory — Other income is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total annual income</strong> is a plain number. The value follows from Annual income and Other income. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Capital gains tax</strong> is a plain number. The value follows from Total annual income, Capital gains, Asset type and Are the assets in a trust?. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Profit after tax</strong> is a plain number. The value follows from Capital gains, Total annual income, Asset type and Are the assets in a trust?. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Annual income and Other income ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Annual income — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Total annual income against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Total annual income is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Annual income and Other income is what you already know and Total annual income and Capital gains tax is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/roi">ROI Calculator</a>, <a href="/finance/roth-ira">Roth IRA Calculator</a> and <a href="/finance/rule-of-72">Rule of 72</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Capital gains tax UK is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Capital gains tax UK calculator work out?', 'a' => <<<'TXT'
            Total annual income, Capital gains tax and Profit after tax, from Annual income and Other income. The relationship is Total annual income = Annual income + Other income.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Annual income, Other income. Fill annual income and other income and leave Total annual income empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total annual income, Other income, Annual income and Capital gains tax blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Total annual income is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Annual income blank and the page solves for it, reporting Total annual income instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Total annual income keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/roi', 'name' => 'ROI Calculator'],
            ['path' => '/finance/roth-ira', 'name' => 'Roth IRA Calculator'],
            ['path' => '/finance/rule-of-72', 'name' => 'Rule of 72'],
        ],
        'authors' => [],
    ],
];
