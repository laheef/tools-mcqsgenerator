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
    'meta' => ['title' => 'Respiratory Quotient Calculator — Formula & Results', 'description' => 'Respiratory Quotient Calculator reports non-protein RQ, energy equivalent and fat share of fuel. Every box can be solved for, not only the one in the title.', 'h1' => 'Respiratory Quotient Calculator', 'updated' => '2026-10-29'],
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
        Respiratory Quotient works out Respiratory quotient and Non-protein RQ from CO₂ produced and O₂ consumed. There is no hidden constant here: change respiratory quotient and CO₂ produced moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Respiratory Quotient calculator works', 'html' => <<<'TXT'
            <p>The Respiratory Quotient calculator applies one relationship to 2 numbers and reports Respiratory quotient, Non-protein RQ and Energy equivalent.</p><p>In the form&#039;s own words, Respiratory quotient = CO₂ produced ÷ O₂ consumed.</p><p>The answers are Respiratory quotient, Non-protein RQ, Energy equivalent and Fat share of fuel; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>CO₂ produced</strong> — in mL/min</li><li><strong>O₂ consumed</strong> — in mL/min</li></ul><p>The result boxes are Respiratory quotient, Non-protein RQ, Energy equivalent in kcal/L O₂, Fat share of fuel in %; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, CO₂ produced = 200 mL/min and O₂ consumed = 250 mL/min gives <strong>Respiratory quotient</strong> = 0.8, <strong>Non-protein RQ</strong> = 0.8, <strong>Energy equivalent</strong> = 4.04 kcal/L O₂ and <strong>Fat share of fuel</strong> = 66.67 %.</p><ul><li><strong>Respiratory quotient</strong> = 0.8</li><li><strong>Non-protein RQ</strong> = 0.8</li><li><strong>Energy equivalent</strong> = 4.04 kcal/L O₂</li><li><strong>Fat share of fuel</strong> = 66.67 %</li></ul><p>The line behind those figures is <strong>Respiratory quotient</strong> = <code>CO₂ produced ÷ O₂ consumed</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Respiratory quotient</strong> = 0.8, <strong>Non-protein RQ</strong> = 0.8, <strong>Energy equivalent</strong> = 4.04 and <strong>Fat share of fuel</strong> = 66.67. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Respiratory quotient is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Respiratory quotient</strong> = <code>CO₂ produced ÷ O₂ consumed</code></li><li><strong>Non-protein RQ</strong> = <code>CO₂ produced ÷ O₂ consumed</code></li><li><strong>Energy equivalent</strong> = <code>5.047 × CO₂ produced ÷ O₂ consumed</code></li><li><strong>Fat share of fuel</strong> = <code>(1 − (CO₂ produced ÷ O₂ consumed − 0.7) ÷ 0.3) × 100</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Respiratory quotient</strong> = <code>CO₂ produced ÷ O₂ consumed</code> — the form to use when CO₂ produced and O₂ consumed are the values you have.</li><li><strong>Non-protein RQ</strong> = <code>CO₂ produced ÷ O₂ consumed</code> — the form to use when CO₂ produced and O₂ consumed are the values you have.</li><li><strong>Energy equivalent</strong> = <code>5.047 × CO₂ produced ÷ O₂ consumed</code> — the form to use when CO₂ produced and O₂ consumed are the values you have.</li><li><strong>Fat share of fuel</strong> = <code>(1 − (CO₂ produced ÷ O₂ consumed − 0.7) ÷ 0.3) × 100</code> — the form to use when CO₂ produced and O₂ consumed are the values you have.</li></ul><p>Any one of Respiratory quotient, Non-protein RQ and Energy equivalent can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double CO₂ produced from 200 to 400, leaving every other box alone. The panel moves from <strong>Respiratory quotient</strong> 0.8, <strong>Non-protein RQ</strong> 0.8, <strong>Energy equivalent</strong> 4.04 kcal/L O₂ and <strong>Fat share of fuel</strong> 66.67 % to <strong>Respiratory quotient</strong> 1.6, <strong>Non-protein RQ</strong> 1.6, <strong>Energy equivalent</strong> 8.08 kcal/L O₂ and <strong>Fat share of fuel</strong> -200 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Respiratory quotient, Non-protein RQ and Energy equivalent are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>CO₂ produced left as a guess.</strong> Anything typed into CO₂ produced is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>O₂ consumed left as a guess.</strong> Anything typed into O₂ consumed is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in CO₂ produced and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Respiratory Quotient form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>CO₂ produced</strong> is measured in mL/min. The page reads it when it works out Respiratory quotient, Non-protein RQ and Energy equivalent. Fill it from a measurement rather than a memory — CO₂ produced is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>O₂ consumed</strong> is measured in mL/min. The page reads it when it works out Respiratory quotient, Non-protein RQ and Energy equivalent. Fill it from a measurement rather than a memory — O₂ consumed is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 4 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Respiratory quotient</strong> is a plain number and the page's own defaults put it at 0.8. The value follows from CO₂ produced and O₂ consumed. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Non-protein RQ</strong> is a plain number and the page's own defaults put it at 0.8. The value follows from CO₂ produced and O₂ consumed. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Energy equivalent</strong> is a plain number and the page's own defaults put it at 4.04. The value follows from CO₂ produced and O₂ consumed. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Fat share of fuel</strong> is a plain number and the page's own defaults put it at 66.67. The value follows from CO₂ produced and O₂ consumed. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Respiratory quotient</th><th>Non-protein RQ</th><th>Energy equivalent</th><th>Fat share of fuel</th></tr></thead><tbody><tr><td><strong>CO₂ produced</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10%</td><td>-40%</td></tr><tr><td><strong>O₂ consumed</strong> +10%</td><td>-9.09%</td><td>-9.09%</td><td>-9.09%</td><td>+36.36%</td></tr></tbody></table><p>The steepest column belongs to CO₂ produced: ten per cent there moves an answer by about 40 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in CO₂ produced = 100 mL/min and O₂ consumed = 125 mL/min and the page reports <strong>Respiratory quotient</strong> = 0.8, <strong>Non-protein RQ</strong> = 0.8, <strong>Energy equivalent</strong> = 4.04 kcal/L O₂ and <strong>Fat share of fuel</strong> = 66.67 %.</li><li>Feed in CO₂ produced = 600 mL/min and O₂ consumed = 250 mL/min and the page reports <strong>Respiratory quotient</strong> = 2.4, <strong>Non-protein RQ</strong> = 2.4, <strong>Energy equivalent</strong> = 12.11 kcal/L O₂ and <strong>Fat share of fuel</strong> = -467 %.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have CO₂ produced and O₂ consumed ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with CO₂ produced — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Respiratory quotient against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Respiratory quotient is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: CO₂ produced and O₂ consumed measured, Respiratory quotient and Non-protein RQ wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/transpiration-rate">Transpiration Rate Calculator</a>, <a href="/biology/tree-age">Tree age</a> and <a href="/biology/tree-diameter">Tree diameter Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Respiratory Quotient calculator work out?', 'a' => <<<'TXT'
            Respiratory quotient, Non-protein RQ, Energy equivalent and Fat share of fuel, from CO₂ produced and O₂ consumed. The relationship is Respiratory quotient = CO₂ produced ÷ O₂ consumed.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            CO₂ produced (mL/min), O₂ consumed (mL/min). With CO₂ produced and o₂ consumed in place, Respiratory quotient can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Respiratory quotient, Non-protein RQ, Energy equivalent and Fat share of fuel blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Respiratory quotient = 0.8, Non-protein RQ = 0.8, Energy equivalent = 4.04 kcal/L O₂ and Fat share of fuel = 66.67 %. Those are the defaults written into the form — move CO₂ produced and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Respiratory quotient is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
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
