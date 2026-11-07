<?php

/**
 * Cell dilution
 * /biology/cell-dilution
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cell dilution',
    'meta' => ['title' => 'Cell dilution Calculator — Formula & Results', 'description' => 'Cell dilution: Enter Initial concentration, Final concentration and Final volume into Cell dilution and the answer comes back as Volume for suspension.', 'h1' => 'Cell dilution Calculator', 'updated' => '2026-08-10'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'concentrationInitial',
                            'label' => 'Initial concentration',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'suspensionVolume',
                            'label' => 'Volume for suspension',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'concentrationFinal',
                            'label' => 'Final concentration',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'volumeFinal',
                            'label' => 'Final volume',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'concentrationInitial*suspensionVolume=concentrationFinal*volumeFinal',
            'results' => ['suspensionVolume' => 'concentrationFinal*volumeFinal/concentrationInitial', 'concentrationInitial' => 'concentrationFinal*volumeFinal/suspensionVolume', 'volumeFinal' => 'concentrationInitial*suspensionVolume/concentrationFinal', 'concentrationFinal' => 'concentrationInitial*suspensionVolume/volumeFinal'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Initial concentration, Final concentration and Final volume into Cell dilution and the answer comes back as Volume for suspension. Nothing is looked up on this page: Volume for suspension is computed from Initial concentration and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Volume for suspension is opened in milliliters; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Cell dilution calculator works', 'html' => <<<'TXT'
            <p>The Cell dilution calculator applies one relationship to 3 numbers and reports Volume for suspension.</p><p>In the form&#039;s own words, Volume for suspension = Final concentration × Final volume ÷ Initial concentration.</p><p>The result panel carries Volume for suspension, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Initial concentration</strong> — in milliliters</li><li><strong>Final concentration</strong> — in milliliters</li><li><strong>Final volume</strong> — in milliliters</li></ul><p>The result box is Volume for suspension in milliliters. It fills in as soon as the inputs allow it, and it is updated rather than accumulated — change a number and the answer changes with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Initial concentration = 10 ml, Final concentration = 100 ml and Final volume = 1000 ml; the answers are &lt;strong&gt;Volume for suspension&lt;/strong&gt; = 10000 ml.</p><ul><li><strong>Volume for suspension</strong> = 10000 ml</li></ul><p>That is <strong>Volume for suspension</strong> = <code>Final concentration × Final volume ÷ Initial concentration</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Volume for suspension&lt;/strong&gt; = 10000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Volume for suspension lists 40 options and opens on milliliters. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Volume for suspension</strong> = <code>Final concentration × Final volume ÷ Initial concentration</code></li><li><strong>Initial concentration</strong> = <code>Final concentration × Final volume ÷ Volume for suspension</code></li><li><strong>Final volume</strong> = <code>Initial concentration × Volume for suspension ÷ Final concentration</code></li><li><strong>Final concentration</strong> = <code>Initial concentration × Volume for suspension ÷ Final volume</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Volume for suspension</strong> = <code>Final concentration × Final volume ÷ Initial concentration</code> — the form to use when Final concentration, Final volume and Initial concentration are the values you have.</li><li><strong>Initial concentration</strong> = <code>Final concentration × Final volume ÷ Volume for suspension</code> — the form to use when Final concentration, Final volume and Volume for suspension are the values you have.</li><li><strong>Final volume</strong> = <code>Initial concentration × Volume for suspension ÷ Final concentration</code> — the form to use when Initial concentration, Volume for suspension and Final concentration are the values you have.</li><li><strong>Final concentration</strong> = <code>Initial concentration × Volume for suspension ÷ Final volume</code> — the form to use when Initial concentration, Volume for suspension and Final volume are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Volume for suspension, Initial concentration and Final volume can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Initial concentration, from 10 to 20 — and the answers go from &lt;strong&gt;Volume for suspension&lt;/strong&gt; 10000 ml to &lt;strong&gt;Volume for suspension&lt;/strong&gt; 5000 ml.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Initial concentration, Final concentration and Final volume carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Volume for suspension is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Initial concentration left as a guess.</strong> Anything typed into Initial concentration is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Final concentration left as a guess.</strong> Anything typed into Final concentration is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Initial concentration and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Initial concentration</strong> is a milliliters quantity: the page opens it in ml and converts anything else you pick before the formula runs. Change it and Volume for suspension, Final volume and Final concentration changes with it. Have it to hand before you start: Initial concentration is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Final concentration</strong> is a milliliters quantity: the page opens it in ml and converts anything else you pick before the formula runs. Change it and Volume for suspension, Initial concentration and Final volume changes with it. Have it to hand before you start: Final concentration is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Final volume</strong> is a milliliters quantity: the page opens it in ml and converts anything else you pick before the formula runs. Change it and Volume for suspension, Initial concentration and Final concentration changes with it. Have it to hand before you start: Final volume is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Volume for suspension</strong> is a milliliters figure and the page's own defaults put it at 10000 ml. It is computed from Final concentration, Final volume and Initial concentration, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Volume for suspension</th></tr></thead><tbody><tr><td><strong>Initial concentration</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Final concentration</strong> +10%</td><td>+10%</td></tr><tr><td><strong>Final volume</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Final concentration: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Initial concentration = 5 ml, Final concentration = 50 ml and Final volume = 500 ml, the answer is <strong>Volume for suspension</strong> = 5000 ml.</li><li>With Initial concentration = 30 ml, Final concentration = 100 ml and Final volume = 1000 ml, the answer is <strong>Volume for suspension</strong> = 3333 ml.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>milliliters</strong> — 40 units. It opens in <em>ml</em>, and the chip also carries m³, cu ft, US fl oz, L, dm³ and cu in. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Volume for suspension is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are milliliters and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Initial concentration, Final concentration and Final volume are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Initial concentration, Final concentration and Final volume and the number you are missing is Volume for suspension.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/medullary-index">Medullary Index Calculator</a>, <a href="/biology/metacam-dosage-cat">Metacam dosage for cats</a> and <a href="/biology/mic-zone-of-inhibition">MIC and Zone of Inhibition Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Cell dilution calculator work out?', 'a' => <<<'TXT'
            Volume for suspension, from Final concentration, Final volume and Initial concentration. The relationship is Volume for suspension = Final concentration × Final volume ÷ Initial concentration.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Initial concentration (milliliters), Final concentration (milliliters), Final volume (milliliters). Fill concentrationInitial, concentrationFinal and volumeFinal and leave Volume for suspension empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Volume for suspension, Initial concentration, Final volume and Final concentration can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Volume for suspension = 10000 ml. That comes from the page\'s own defaults, entered in Initial concentration; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Volume for suspension is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Initial concentration left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Volume for suspension keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/medullary-index', 'name' => 'Medullary Index Calculator'],
            ['path' => '/biology/metacam-dosage-cat', 'name' => 'Metacam dosage for cats'],
            ['path' => '/biology/mic-zone-of-inhibition', 'name' => 'MIC and Zone of Inhibition Calculator'],
        ],
        'authors' => [],
    ],
];
