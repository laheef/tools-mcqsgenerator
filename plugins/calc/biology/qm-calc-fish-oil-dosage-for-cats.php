<?php

/**
 * Fish oil dosage for cats
 * /biology/fish-oil-dosage-for-cats
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fish oil dosage for cats',
    'meta' => ['title' => 'Fish oil dosage for cats Calculator: Free, With Steps', 'description' => 'Fish oil dosage for cats takes your cat\'s weight 🐈 and returns fish oil dosage. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Fish oil dosage for cats Calculator', 'updated' => '2026-05-25'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kg',
                            'label' => 'Your cat\'s weight 🐈',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mg',
                            'label' => 'Fish oil dosage',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'mg = 40 * kg',
            'results' => ['kg' => '(1/40)*mg', 'mg' => '40*kg'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fish oil dosage for cats works out Your cat's weight 🐈 from Fish oil dosage. Nothing is looked up on this page: your cat's weight 🐈 is computed from fish oil dosage and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Your cat's weight 🐈 is opened in kilograms; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Fish oil dosage for cats calculator works', 'html' => <<<'TXT'
            <p>Fish oil dosage for cats answers one question from 1 number, and the answer is Your cat&#039;s weight 🐈.</p><p>In the form&#039;s own words, Your cat&#039;s weight 🐈 = (1 ÷ 40) × Fish oil dosage.</p><p>What comes back is Your cat&#039;s weight 🐈 — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Fish oil dosage</strong> — in milligrams</li></ul><p>What you get back is Your cat&#039;s weight 🐈 in kilograms, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Take the values the form starts on, Fish oil dosage = 10 mg; the answers are <strong>Your cat&amp;#039;s weight 🐈</strong> = 0.25 kg.</p><ul><li><strong>Your cat&#039;s weight 🐈</strong> = 0.25 kg</li></ul><p>That is <strong>Your cat&#039;s weight 🐈</strong> = <code>(1 ÷ 40) × Fish oil dosage</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Your cat&amp;#039;s weight 🐈</strong> = 0.25. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Your cat&#039;s weight 🐈 lists 27 options and opens on kilograms. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Your cat&#039;s weight 🐈</strong> = <code>(1 ÷ 40) × Fish oil dosage</code></li><li><strong>Fish oil dosage</strong> = <code>40 × Your cat&#039;s weight 🐈</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Your cat&#039;s weight 🐈</strong> = <code>(1 ÷ 40) × Fish oil dosage</code> — the form to use when Fish oil dosage are the values you have.</li><li><strong>Fish oil dosage</strong> = <code>40 × Your cat&#039;s weight 🐈</code> — the form to use when Your cat&#039;s weight 🐈 are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Your cat&#039;s weight 🐈 and Fish oil dosage can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Fish oil dosage, from 10 to 20 — and the answers go from <strong>Your cat&amp;#039;s weight 🐈</strong> 0.25 kg to <strong>Your cat&amp;#039;s weight 🐈</strong> 0.5 kg.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Fish oil dosage carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Your cat&#039;s weight 🐈 is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Fish oil dosage left as a guess.</strong> Anything typed into Fish oil dosage is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Fish oil dosage is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Fish oil dosage for cats form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Fish oil dosage</strong> is a milligrams quantity: the page opens it in mg and converts anything else you pick before the formula runs. The page reads it when it works out Your cat's weight 🐈. Fill it from a measurement rather than a memory — Fish oil dosage is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Your cat&#039;s weight 🐈</strong> is a kilograms figure and the page's own defaults put it at 0.25 kg. It is worked out from Fish oil dosage. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Your cat&#039;s weight 🐈</th></tr></thead><tbody><tr><td><strong>Fish oil dosage</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to Fish oil dosage: ten per cent there moves an answer by about 10 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Fish oil dosage = 5 mg and the page reports <strong>Your cat&#039;s weight 🐈</strong> = 0.125 kg.</li><li>Feed in Fish oil dosage = 30 mg and the page reports <strong>Your cat&#039;s weight 🐈</strong> = 0.75 kg.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Fish oil dosage for cats actually offers.</p><ul><li><strong>milligrams</strong> — 27 units. It opens in <em>mg</em>, and the chip also carries lb, mg, g, oz, t and ng. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Fish oil dosage ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Fish oil dosage — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Your cat&amp;#039;s weight 🐈 in kg against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Your cat&#039;s weight 🐈 is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are milligrams and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Fish oil dosage are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Fish oil dosage measured, Your cat&#039;s weight 🐈 wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/biology/hatch-rate">Hatch Rate Calculator</a>, <a href="/biology/height-to-finger-length">Height to Finger Length Calculator</a> and <a href="/biology/hemocytometer-cell-counter">Hemocytometer Cell Counter (cells/mL) Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Fish oil dosage for cats is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fish oil dosage for cats calculator work out?', 'a' => 'Your cat\'s weight 🐈, from Fish oil dosage. The relationship is Your cat\'s weight 🐈 = (1 ÷ 40) × Fish oil dosage.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Fish oil dosage (milligrams). Fill fish oil dosage and leave Your cat\'s weight 🐈 empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. Your cat\'s weight 🐈 and Fish oil dosage can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Your cat\'s weight 🐈 = 0.25 kg. That comes from the page\'s own defaults, entered in Fish oil dosage; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Your cat's weight 🐈 is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Fish oil dosage blank and the page solves for it, reporting Your cat\'s weight 🐈 instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Your cat\'s weight 🐈 keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/hatch-rate', 'name' => 'Hatch Rate Calculator'],
            ['path' => '/biology/height-to-finger-length', 'name' => 'Height to Finger Length Calculator'],
            ['path' => '/biology/hemocytometer-cell-counter', 'name' => 'Hemocytometer Cell Counter (cells/mL) Calculator'],
        ],
        'authors' => [],
    ],
];
