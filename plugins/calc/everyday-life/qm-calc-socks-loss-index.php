<?php

/**
 * Lost socks
 * /everyday-life/socks-loss-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Lost socks',
    'meta' => ['title' => 'Lost socks Calculator: Formula, Steps & Examples', 'description' => 'Lost socks works out chance of losing a sock and socks lost from people in household, precautions taken and types of washes. Every figure is computed.', 'h1' => 'Lost socks Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => 'Laundry habits',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'People_household',
                            'label' => 'People in household',
                            'type' => 'number',
                            'help' => 'Number of people in your household, including kids',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Precautions',
                            'label' => 'Precautions taken',
                            'type' => 'number',
                            'help' => 'Total number of precautions taken at the start of each wash, such as checking pockets, unrolling sleeves, turning clothes the right way and unrolling socks',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Types_washes',
                            'label' => 'Types of washes',
                            'type' => 'number',
                            'suffix' => '/week',
                            'help' => 'Number of types of washes you do that involve socks, such as white washes, dark washes etc.',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Washes_weekly',
                            'label' => 'Number of washes',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Positivity',
                            'label' => 'Attitude towards doing laundry',
                            'type' => 'select',
                            'options' => [
                                'I love it' => '5',
                                'I like it' => '4',
                                'Neither like or dislike' => '3',
                                'I don\'t like it' => '2',
                                'I hate it' => '1',
                            ],
                            'dataset' => 'Positivity',
                            'control' => 'DROPDOWN',
                            'default' => 'I like it',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Amount_socks',
                            'label' => 'Total socks washed',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'wk',
                            'rounding' => ['omni', '0.000001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Socks lost',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Probability',
                            'label' => 'Chance of losing a sock',
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
                            'name' => 'Socks_lost_monthly',
                            'label' => 'Socks lost',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'You lose {{Socks_lost_monthly.formattedValue}} socks a month!'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'https://uploads-cdn.omnicalculator.com/images/gif-socks.gif'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Money lost on socks',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Sock_price',
                            'label' => 'Socks price',
                            'type' => 'number',
                            'suffix' => '/pair',
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
                            'name' => 'Money_lost',
                            'label' => 'Money lost',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            We assume for each sock you lose you buy a new pair. If you have multiple socks in the same colour and after losing 2 you also buy 1 pair, this amount will be a bit lower for you than displayed.
                            TXT,
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
                            'name' => 'Lifetime_loss',
                            'label' => 'Lifetime money lost',
                            'type' => 'number',
                            'help' => <<<'TXT'
                            We assume here you lose socks at similar frequency during your whole life. For the purpose of calculation we used here global life expectancy, numbers might vary depending on your country.
                            TXT,
                            'unit' => '663',
                            'unit_default' => 'USD',
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
                            'name' => 'image_val',
                            'label' => 'Image val',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Probability = 0.38 + (0.005 * People_household * Washes_weekly * 7) + (0.0012 * Types_washes * Amount_socks * 7) - (0.0159 * Positivity * Precautions)',
            'results' => [
                'Washes_weekly' => '(1/350)*(-84*Amount_socks*Types_washes + 159*Positivity*Precautions + 10000*Probability - 3800)/People_household',
                'Positivity' => '(2/159)*(42*Amount_socks*Types_washes + 175*People_household*Washes_weekly - 5000*Probability + 1900)/Precautions',
                'Types_washes' => '(1/84)*(-350*People_household*Washes_weekly + 159*Positivity*Precautions + 10000*Probability - 3800)/Amount_socks',
                'Precautions' => '(2/159)*(42*Amount_socks*Types_washes + 175*People_household*Washes_weekly - 5000*Probability + 1900)/Positivity',
                'People_household' => '(1/350)*(-84*Amount_socks*Types_washes + 159*Positivity*Precautions + 10000*Probability - 3800)/Washes_weekly',
                'Probability' => '(21/2500)*Amount_socks*Types_washes + (7/200)*People_household*Washes_weekly - 159/10000*Positivity*Precautions + 19/50',
                'Amount_socks' => '(1/84)*(-350*People_household*Washes_weekly + 159*Positivity*Precautions + 10000*Probability - 3800)/Types_washes',
            ],
        ],
        [
            'title' => 'Socks_lost_monthly = Probability / 7',
            'results' => ['Socks_lost_monthly' => '(1/7)*Probability', 'Probability' => '7*Socks_lost_monthly'],
        ],
        [
            'title' => 'Money_lost = Socks_lost_monthly * Sock_price',
            'results' => ['Money_lost' => 'Sock_price*Socks_lost_monthly', 'Sock_price' => 'Money_lost/Socks_lost_monthly', 'Socks_lost_monthly' => 'Money_lost/Sock_price'],
        ],
        [
            'title' => 'Lifetime_loss =71 * Money_lost * 365.25',
            'results' => ['Money_lost' => '(4/103731)*Lifetime_loss', 'Lifetime_loss' => '(103731/4)*Money_lost'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_random_value",function(Socks_lost_monthly){if(Socks_lost_monthly!==undefined&&Socks_lost_monthly!==null){var i=Math.random();return i}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Give the Lost socks calculator the people in household, the precautions taken, the types of washes and the total socks washed and it returns <strong>number of washes</strong>.
        TXT,
        'sections' => [
            ['title' => 'How does the Lost socks calculator work?', 'html' => <<<'TXT'
            <p>The Lost socks calculator takes the values in the form, applies the relationship described below and reports <strong>number of washes</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the attitude towards doing laundry); then you type in the people in household, the precautions taken, the types of washes and the total socks washed.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A plain number with no unit attached.</li><li>A plain number with no unit attached.</li><li>A number, expressed in /week.</li><li>Pick the option that matches your case — 5 options, such as I love it, I like it and neither like or dislike. </li><li>A measured quantity, entered by default in weeks. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in percent. The unit chip switches it to any of the 6 supported units.</li><li>A measured quantity, entered by default in US Dollar. The unit chip switches it to any of the 113 supported units.</li></ul><p>One field on this form is a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>People in household</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Precautions taken</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Types of washes</strong></td><td>A number stated in /week.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Number of washes</strong></td><td>A measured quantity, 27 units available.</td><td>weeks</td><td>Calculated</td></tr><tr><td><strong>Attitude towards doing laundry</strong></td><td>One of 5 options, such as I love it, I like it and neither like or dislike.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Total socks washed</strong></td><td>A measured quantity, 27 units available.</td><td>weeks</td><td>You supply it</td></tr><tr><td><strong>Chance of losing a sock</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>You supply it</td></tr><tr><td><strong>Socks lost</strong></td><td>A measured quantity, 27 units available.</td><td>months</td><td>Calculated</td></tr><tr><td><strong>Socks price</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>You supply it</td></tr><tr><td><strong>Money lost</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr><tr><td><strong>Lifetime money lost</strong></td><td>A measured quantity, 113 units available.</td><td>US Dollar</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Lost socks calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Number of washes</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 350) × (-84 × total socks washed × types of washes + 159 × attitude towards doing laundry × precautions taken + 10000 × chance of losing a sock − 3800) ÷ people in household</span></div><div class="formula-row"><span class="formula-lhs">Socks lost</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 7) × chance of losing a sock</span></div><div class="formula-row"><span class="formula-lhs">Money lost</span><span class="formula-eq">=</span><span class="formula-rhs">socks price × socks lost</span></div><div class="formula-row"><span class="formula-lhs">Money lost</span><span class="formula-eq">=</span><span class="formula-rhs">(4 ÷ 103731) × lifetime money lost</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in weeks, and convertible to any of the 27 units on that chip.</li><li>Shown in months, and convertible to any of the 27 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li><li>Shown in US Dollar, and convertible to any of the 113 units on that chip.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in weeks</li><li>Time, opening in weeks</li><li>%, opening in percent</li><li>Time, opening in months</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li><li>Currency, opening in US Dollar</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Lost socks calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Any time the same 4 figures keep coming back — the people in household, the precautions taken and the types of washes — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/eu-us-shoe-size">EU to US shoe size converter</a>, <a href="/everyday-life/eui">Energy use intensity</a> and <a href="/everyday-life/every-second">Every second</a>.</p>
            TXT],
            ['title' => 'How to read a playful lost-socks estimate', 'html' => <<<'TXT'
            <p>The Lost socks calculator combines household size, washing habits, precautions and attitude inputs to estimate a probability and related cost figures. Its formula is a simplified model, not a measured law of laundry and not evidence that a particular household will lose a fixed number of socks. Use the output as a lighthearted prompt to compare assumptions, not as a financial forecast or a scientific risk score.</p>
            <p>Enter the household and washing information as the form requests. Keep weekly wash frequency in weeks rather than entering a monthly count without converting it, and distinguish the number of socks washed from the number of pairs if the field labels do so. A mismatch between socks and pairs changes the scale. Precautions and preference choices are model inputs; they are not objective measurements of how carefully someone handles laundry.</p>
            <p>The calculator’s estimated probability is driven by its built-in coefficients and selected inputs. Those coefficients are fixed in the page and do not adapt to your washing machine, laundry basket, room layout, sock color, household routines or actual records. A displayed percentage should not be interpreted as a calibrated forecast for an individual home. If you want a real estimate for your household, track matched pairs over many loads and compare the observed count with the number washed.</p>
            <p>Money outputs also depend on the sock price you enter and the calculator’s assumptions about loss over time. They cannot account for replacement discounts, multipacks, socks that wear out normally, or the possibility that an unmatched sock turns up later. Keep the unit basis consistent: a price per sock differs from a price per pair. If the lifetime estimate seems surprisingly high, check that input first.</p>
            <p>You can use the page to compare hypothetical routines. Hold the household, wash frequency and sock price fixed, then change one precaution or washing option at a time. That shows how the model responds, but it does not prove that the choice causes a particular loss rate. Avoid drawing conclusions about another person’s habits from a playful calculator output.</p>
            <p>For a practical laundry routine, label socks, use a mesh bag for small items or match pairs before putting them away. Those are ordinary organizational ideas, not guarantees against loss. If a sock is missing, check the machine seal, bedding, laundry basket and places where clothes are sorted before assuming it is gone permanently.</p>
            <p>The index is best understood as an entertaining, assumption-driven estimate. Record the inputs if you want to compare runs, and remember that only actual household observations can tell you what has happened in your laundry. The calculator does not diagnose a washing machine problem or predict future losses with scientific certainty.</p>
            TXT],
            ['title' => 'Use household tracking for a real comparison', 'html' => <<<'TXT'
            <p>If you want to compare the playful estimate with your own experience, choose a tracking window and define what counts as “lost”: a single missing sock after one wash, or a pair that remains unmatched after a set period. Count the number of loads and the number of items washed using the same unit throughout. A two-week sample may be dominated by chance, so avoid drawing a firm conclusion from a few unmatched items. The calculator’s formula remains a model; your record is a separate observation.</p><p>When comparing a mesh bag or sorting routine, keep the observation method and wash load roughly consistent. A household’s mix of sock sizes, colors, shared laundry and storage habits can change the outcome. Use the exercise to improve organization if it is helpful, not to assign blame based on a percentage.</p>
            TXT],
            ['title' => 'Keep playful outputs in perspective', 'html' => <<<'TXT'
            <p>A probability or cost number can look authoritative because it is formatted precisely, but the output inherits the model’s assumptions and coefficients. It does not know whether your washing machine traps clothing, whether socks are sorted together or how often a missing item turns up later. Treat those results as a conversation starter rather than a household performance score.</p><p>If the estimate is high, try changing a single assumption and observe how the number moves. Then decide whether the suggested routine is practical for your laundry. Simple organization may be worthwhile regardless of the model’s output, but the calculator cannot prove that one precaution will cause a particular reduction.</p>
            TXT],
            ['title' => 'Compare model assumptions, not people', 'html' => <<<'TXT'
            <p>Households differ in load size, sorting habits and how long unmatched socks are kept. A comparison between homes is not meaningful unless those definitions match, and the model cannot control for them. Use the calculator for a light personal experiment, not to judge another household’s routines.</p>
            TXT],
            ['title' => 'Save the inputs if you revisit the estimate', 'html' => <<<'TXT'
            <p>Record the household size, wash frequency, sock-price basis and selections alongside the result. If you rerun the calculator later, you can see whether the change came from a new input or simply from comparing different assumptions.</p>
            TXT],
            ['title' => 'Use the estimate for curiosity, not certainty', 'html' => <<<'TXT'
            <p>The percentage and money figures are outputs of the page’s fixed model. They can be useful for seeing how an input changes the estimate, but they do not establish the real probability or cost for your household. Treat the result as entertainment unless you have independent observations to support a practical decision.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Lost socks calculator work out?', 'a' => 'It returns number of washes, derived from the people in household, the precautions taken and the types of washes.'],
            ['q' => 'What do I need to enter to use the Lost socks calculator?', 'a' => 'The form asks for the people in household, the precautions taken, the types of washes and the total socks washed, which is 7 fields in total.'],
            ['q' => 'Can I enter number of washes in a different unit?', 'a' => 'Yes. Number of washes opens in weeks and the chip beside it offers 27 units.'],
        ],
        'related' => [
            ['path' => '/everyday-life/eu-us-shoe-size', 'name' => 'EU to US shoe size converter'],
            ['path' => '/everyday-life/eui', 'name' => 'Energy use intensity'],
            ['path' => '/everyday-life/every-second', 'name' => 'Every second'],
        ],
    ],
];
