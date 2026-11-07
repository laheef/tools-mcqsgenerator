<?php

/**
 * Cheng-Prusoff Equation Calculator
 * /biology/cheng-prusoff-equation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cheng-Prusoff Equation Calculator',
    'meta' => ['title' => 'Cheng-Prusoff Equation Calculator — Formula & Results', 'description' => 'Cheng-Prusoff Equation turns IC50, Substrate concentration and Km of the substrate into Ki and Km apparent at this [S]. There is no hidden constant here…', 'h1' => 'Cheng-Prusoff Equation Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'ic50',
                            'label' => 'IC50',
                            'type' => 'number',
                            'suffix' => 'nM',
                            'help' => 'From the competition assay',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                        [
                            'name' => 's',
                            'label' => 'Substrate concentration',
                            'type' => 'number',
                            'suffix' => '× Km',
                            'help' => 'Radiometric assays often run at 1 × Km',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'km',
                            'label' => 'Km of the substrate',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'help' => 'Not needed when the substrate box is in Km units',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'mode',
                            'label' => 'Inhibition type',
                            'type' => 'select',
                            'options' => ['Competitive' => '1', 'Non-competitive' => '2', 'Uncompetitive' => '3'],
                            'default' => 'Competitive',
                        ],
                        [
                            'name' => 'ki',
                            'label' => 'Ki',
                            'type' => 'number',
                            'suffix' => 'nM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'km_app',
                            'label' => 'Km apparent at this [S]',
                            'type' => 'number',
                            'suffix' => 'µM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Ki',
            'results' => ['ki' => 'if_else(mode==1, ic50/(1+s), if_else(mode==2, ic50, ic50/(1+1/s)))', 'km_app' => 'km*(1+s)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Cheng-Prusoff Equation turns IC50, Substrate concentration and Km of the substrate into Ki and Km apparent at this [S]. There is no hidden constant here: change Ki and IC50 moves with it. The main result, Ki, is reported in nM.
        TXT,
        'sections' => [
            ['title' => 'How the Cheng-Prusoff Equation calculator works', 'html' => <<<'TXT'
            <p>The Cheng-Prusoff Equation calculator applies one relationship to 4 numbers and reports Ki and Km apparent at this [S].</p><p>The relationship it solves reads Ki = if_else(Inhibition type==1, IC50 ÷ (1 + Substrate concentration), if_else(Inhibition type==2, IC50, IC50 ÷ (1 + 1 ÷ Substrate concentration))).</p><p>The answers are Ki and Km apparent at this [S]; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>IC50</strong> — in nM. From the competition assay</li><li><strong>Substrate concentration</strong> — in × Km. Radiometric assays often run at 1 × Km</li><li><strong>Km of the substrate</strong> — in µM. Not needed when the substrate box is in Km units</li><li><strong>Inhibition type</strong> — a plain number, no unit</li></ul><p>The answers come back as Ki in nM, Km apparent at this [S] in µM. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — IC50 = 120 nM, Substrate concentration = 1 × Km, Km of the substrate = 1 µM and Inhibition type = 1 — through the same formula and the panel reports &lt;strong&gt;Ki&lt;/strong&gt; = 60 nM and &lt;strong&gt;Km apparent at this [S]&lt;/strong&gt; = 2 µM.</p><ul><li><strong>Ki</strong> = 60 nM</li><li><strong>Km apparent at this [S]</strong> = 2 µM</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Ki</strong> = <code>if_else(Inhibition type==1, IC50 ÷ (1 + Substrate concentration), if_else(Inhibition type==2, IC50, IC50 ÷ (1 + 1 ÷ Substrate concentration)))</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Ki&lt;/strong&gt; = 60 and &lt;strong&gt;Km apparent at this [S]&lt;/strong&gt; = 2 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Ki takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Ki</strong> = <code>if_else(Inhibition type==1, IC50 ÷ (1 + Substrate concentration), if_else(Inhibition type==2, IC50, IC50 ÷ (1 + 1 ÷ Substrate concentration)))</code></li><li><strong>Km apparent at this [S]</strong> = <code>Km of the substrate × (1 + Substrate concentration)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Ki</strong> = <code>if_else(Inhibition type==1, IC50 ÷ (1 + Substrate concentration), if_else(Inhibition type==2, IC50, IC50 ÷ (1 + 1 ÷ Substrate concentration)))</code> — the form to use when Inhibition type, IC50 and Substrate concentration are the values you have.</li><li><strong>Km apparent at this [S]</strong> = <code>Km of the substrate × (1 + Substrate concentration)</code> — the form to use when Km of the substrate and Substrate concentration are the values you have.</li></ul><p>Any one of Ki and Km apparent at this [S] can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double IC50 from 120 to 240, leaving every other box alone. The panel moves from &lt;strong&gt;Ki&lt;/strong&gt; 60 nM and &lt;strong&gt;Km apparent at this [S]&lt;/strong&gt; 2 µM to &lt;strong&gt;Ki&lt;/strong&gt; 120 nM and &lt;strong&gt;Km apparent at this [S]&lt;/strong&gt; 2 µM.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Ki and Km apparent at this [S] are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>IC50 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If IC50 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Substrate concentration left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Substrate concentration is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Km of the substrate left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Km of the substrate is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in IC50 and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Cheng-Prusoff Equation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>IC50</strong> is measured in nM. From the competition assay. Change it and Ki changes with it. Fill it from a measurement rather than a memory — IC50 is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Substrate concentration</strong> is measured in × Km. Radiometric assays often run at 1 × Km. Change it and Ki and Km apparent at this [S] changes with it. Fill it from a measurement rather than a memory — Substrate concentration is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Km of the substrate</strong> is measured in µM. Not needed when the substrate box is in Km units. Change it and Km apparent at this [S] changes with it. Fill it from a measurement rather than a memory — Km of the substrate is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Inhibition type</strong> takes a plain number with no unit attached. Change it and Ki changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Inhibition type is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Ki</strong> is a plain number and the page's own defaults put it at 60. It is worked out from Inhibition type, IC50 and Substrate concentration. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Km apparent at this [S]</strong> is a plain number and the page's own defaults put it at 2. It is worked out from Km of the substrate and Substrate concentration. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Ki</th><th>Km apparent at this [S]</th></tr></thead><tbody><tr><td><strong>IC50</strong> +10%</td><td>+10%</td><td>+0%</td></tr><tr><td><strong>Substrate concentration</strong> +10%</td><td>-4.76%</td><td>+5%</td></tr><tr><td><strong>Km of the substrate</strong> +10%</td><td>+0%</td><td>+10%</td></tr><tr><td><strong>Inhibition type</strong> +10%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>Ranked by leverage, Km of the substrate sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. By contrast, Inhibition type barely move the answers at all, so a rough figure there costs you little.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in IC50 = 60 nM, Substrate concentration = 0.5 × Km, Km of the substrate = 0.5 µM and Inhibition type = 0.5 and the page reports <strong>Ki</strong> = 20 nM and <strong>Km apparent at this [S]</strong> = 0.75 µM.</li><li>Feed in IC50 = 360 nM, Substrate concentration = 1 × Km, Km of the substrate = 1 µM and Inhibition type = 1 and the page reports <strong>Ki</strong> = 180 nM and <strong>Km apparent at this [S]</strong> = 2 µM.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Ki follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: IC50, Substrate concentration and Km of the substrate measured, Ki and Km apparent at this [S] wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/net-reproductive-rate">Net Reproductive Rate (R₀) Calculator</a>, <a href="/biology/npk-fertilizer-blend">NPK Fertilizer Blend Calculator</a> and <a href="/biology/od260-nucleic-acid-concentration">OD260 to Nucleic Acid Concentration Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cheng-Prusoff Equation calculator work out?', 'a' => <<<'TXT'
            Ki and Km apparent at this [S], from Inhibition type, IC50 and Substrate concentration. The relationship is Ki = if_else(Inhibition type==1, IC50 ÷ (1 + Substrate concentration), if_else(Inhibition type==2, IC50, IC50 ÷ (1 + 1 ÷ Substrate concentration))).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            IC50 (nM), Substrate concentration (× Km), Km of the substrate (µM), Inhibition type. Fill ic50, s and km and leave Ki empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Ki and Km apparent at this [S] blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Ki = 60 nM and Km apparent at this [S] = 2 µM. That comes from the page\'s own defaults, entered in IC50; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Ki is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave IC50 blank and the page solves for it, reporting Ki instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Ki keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/net-reproductive-rate', 'name' => 'Net Reproductive Rate (R₀) Calculator'],
            ['path' => '/biology/npk-fertilizer-blend', 'name' => 'NPK Fertilizer Blend Calculator'],
            ['path' => '/biology/od260-nucleic-acid-concentration', 'name' => 'OD260 to Nucleic Acid Concentration Calculator'],
        ],
        'authors' => [],
    ],
];
