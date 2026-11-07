<?php

/**
 * Respiratory Quotient Calculator
 * /biology/respiratory-quotient
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Respiratory Quotient Calculator',
    'meta' => ['title' => 'Respiratory Quotient Calculator — Formula & Results', 'description' => <<<'TXT'
    Respiratory Quotient works out Respiratory quotient and Non-protein RQ from CO₂ produced and O₂ consumed. There is no hidden constant here: change Respiratory…
    TXT, 'h1' => 'Respiratory Quotient Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'co2',
                            'label' => 'CO₂ produced',
                            'type' => 'number',
                            'suffix' => 'mL/min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                        [
                            'name' => 'o2',
                            'label' => 'O₂ consumed',
                            'type' => 'number',
                            'suffix' => 'mL/min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '250',
                        ],
                        [
                            'name' => 'rq',
                            'label' => 'Respiratory quotient',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fuel',
                            'label' => 'Non-protein RQ',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'energy',
                            'label' => 'Energy equivalent',
                            'type' => 'number',
                            'suffix' => 'kcal/L O₂',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fat_pct',
                            'label' => 'Fat share of fuel',
                            'type' => 'number',
                            'suffix' => '%',
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
            'title' => 'Gas exchange',
            'results' => ['rq' => 'co2/o2', 'fuel' => 'co2/o2', 'energy' => '5.047*co2/o2', 'fat_pct' => '(1-(co2/o2-0.7)/0.3)*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Respiratory Quotient works out Respiratory quotient and Non-protein RQ from CO₂ produced and O₂ consumed. There is no hidden constant here: change Respiratory quotient and CO₂ produced moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Respiratory Quotient calculator works', 'html' => <<<'TXT'
            <p>The Respiratory Quotient calculator applies one relationship to 2 numbers and reports Respiratory quotient, Non-protein RQ and Energy equivalent.</p><p>In the form&#039;s own words, Respiratory quotient = CO₂ produced ÷ O₂ consumed.</p><p>The answers are Respiratory quotient, Non-protein RQ, Energy equivalent and Fat share of fuel; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>CO₂ produced</strong> — in mL/min</li><li><strong>O₂ consumed</strong> — in mL/min</li></ul><p>The result boxes are Respiratory quotient, Non-protein RQ, Energy equivalent in kcal/L O₂, Fat share of fuel in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, CO₂ produced = 200 mL/min and O₂ consumed = 250 mL/min gives &lt;strong&gt;Respiratory quotient&lt;/strong&gt; = 0.8, &lt;strong&gt;Non-protein RQ&lt;/strong&gt; = 0.8, &lt;strong&gt;Energy equivalent&lt;/strong&gt; = 4.04 kcal/L O₂ and &lt;strong&gt;Fat share of fuel&lt;/strong&gt; = 66.67 %.</p><ul><li><strong>Respiratory quotient</strong> = 0.8</li><li><strong>Non-protein RQ</strong> = 0.8</li><li><strong>Energy equivalent</strong> = 4.04 kcal/L O₂</li><li><strong>Fat share of fuel</strong> = 66.67 %</li></ul><p>The line behind those figures is <strong>Respiratory quotient</strong> = <code>CO₂ produced ÷ O₂ consumed</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Respiratory quotient&lt;/strong&gt; = 0.8, &lt;strong&gt;Non-protein RQ&lt;/strong&gt; = 0.8, &lt;strong&gt;Energy equivalent&lt;/strong&gt; = 4.04 and &lt;strong&gt;Fat share of fuel&lt;/strong&gt; = 66.67. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Respiratory quotient is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Respiratory quotient</strong> = <code>CO₂ produced ÷ O₂ consumed</code></li><li><strong>Non-protein RQ</strong> = <code>CO₂ produced ÷ O₂ consumed</code></li><li><strong>Energy equivalent</strong> = <code>5.047 × CO₂ produced ÷ O₂ consumed</code></li><li><strong>Fat share of fuel</strong> = <code>(1 − (CO₂ produced ÷ O₂ consumed − 0.7) ÷ 0.3) × 100</code></li></ul><p>Any one of Respiratory quotient, Non-protein RQ and Energy equivalent can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double CO₂ produced from 200 to 400, leaving every other box alone. The panel moves from &lt;strong&gt;Respiratory quotient&lt;/strong&gt; 0.8, &lt;strong&gt;Non-protein RQ&lt;/strong&gt; 0.8, &lt;strong&gt;Energy equivalent&lt;/strong&gt; 4.04 kcal/L O₂ and &lt;strong&gt;Fat share of fuel&lt;/strong&gt; 66.67 % to &lt;strong&gt;Respiratory quotient&lt;/strong&gt; 1.6, &lt;strong&gt;Non-protein RQ&lt;/strong&gt; 1.6, &lt;strong&gt;Energy equivalent&lt;/strong&gt; 8.08 kcal/L O₂ and &lt;strong&gt;Fat share of fuel&lt;/strong&gt; -200 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Respiratory quotient, Non-protein RQ and Energy equivalent are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Measurements mixed across scales.</strong> Keep full precision in CO₂ produced and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: CO₂ produced and O₂ consumed measured, Respiratory quotient and Non-protein RQ wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/transpiration-rate">Transpiration Rate Calculator</a>, <a href="/biology/tree-age">Tree age</a> and <a href="/biology/tree-diameter">Tree diameter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Respiratory Quotient calculator work out?', 'a' => <<<'TXT'
            Respiratory quotient, Non-protein RQ, Energy equivalent and Fat share of fuel, from CO₂ produced and O₂ consumed. The relationship is Respiratory quotient = CO₂ produced ÷ O₂ consumed.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'CO₂ produced (mL/min), O₂ consumed (mL/min). With co2 and o2 in place, Respiratory quotient can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Respiratory quotient, Non-protein RQ, Energy equivalent and Fat share of fuel blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Respiratory quotient = 0.8, Non-protein RQ = 0.8, Energy equivalent = 4.04 kcal/L O₂ and Fat share of fuel = 66.67 %. Those are the defaults written into the form — move CO₂ produced and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally Respiratory quotient is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave CO₂ produced blank and the page solves for it, reporting Respiratory quotient instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Respiratory quotient keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/transpiration-rate', 'name' => 'Transpiration Rate Calculator'],
            ['path' => '/biology/tree-age', 'name' => 'Tree age'],
            ['path' => '/biology/tree-diameter', 'name' => 'Tree diameter Calculator'],
        ],
        'authors' => [],
    ],
];
