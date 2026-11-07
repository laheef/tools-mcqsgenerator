<?php

/**
 * dsDNA µg to pmol Calculator
 * /biology/dsdna-ug-to-pmol
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'dsDNA µg to pmol Calculator',
    'meta' => ['title' => 'dsDNA µg to pmol Calculator — Formula & Results', 'description' => <<<'TXT'
    dsDNA µg to pmol Calculator works out amount and number of molecules and reports both. Each figure is computed from the boxes you fill, never read from a table.
    TXT, 'h1' => 'dsDNA µg to pmol Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'length',
                            'label' => 'Fragment length',
                            'type' => 'number',
                            'suffix' => 'bp',
                            'help' => 'The length of the dsDNA molecule',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1000',
                        ],
                        [
                            'name' => 'mass_ug',
                            'label' => 'Mass',
                            'type' => 'number',
                            'suffix' => 'µg',
                            'help' => 'Leave the other box blank to solve from it instead',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'pmol',
                            'label' => 'Amount',
                            'type' => 'number',
                            'suffix' => 'pmol',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'molecules',
                            'label' => 'Number of molecules',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'ng',
                            'label' => 'Mass',
                            'type' => 'number',
                            'suffix' => 'ng',
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
            'title' => 'Convert',
            'results' => ['pmol' => 'mass_ug*1000000/(660*length)', 'mass_ug' => 'pmol*660*length/1000000', 'ng' => 'mass_ug*1000', 'molecules' => 'mass_ug*912445569696970/length'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        dsDNA µg to pmol takes Fragment length and returns Amount and Number of molecules. It is a single relationship that reads amount out of fragment length, not a table of canned results keyed by them. Units for Amount default to pmol and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the dsDNA µg to pmol calculator works', 'html' => <<<'TXT'
            <p>dsDNA µg to pmol answers one question from 2 numbers, and the answer is Amount, Number of molecules and Mass.</p><p>Written with the labels from the form, Amount = Mass × 1000000 ÷ (660 × Fragment length).</p><p>The answers are Amount, Number of molecules and Mass; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Fragment length</strong> — in bp. The length of the dsDNA molecule</li><li><strong>Mass</strong> — in µg. Leave the other box blank to solve from it instead</li></ul><p>What you get back is Amount in pmol, Number of molecules, Mass in ng, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Amount takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Amount</strong> = <code>Mass × 1000000 ÷ (660 × Fragment length)</code></li><li><strong>Mass</strong> = <code>Amount × 660 × Fragment length ÷ 1000000</code></li><li><strong>Number of molecules</strong> = <code>Mass × 912445569696970 ÷ Fragment length</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Amount</strong> = <code>Mass × 1000000 ÷ (660 × Fragment length)</code> — the form to use when Mass and Fragment length are the values you have.</li><li><strong>Mass</strong> = <code>Amount × 660 × Fragment length ÷ 1000000</code> — the form to use when Amount and Fragment length are the values you have.</li><li><strong>Mass</strong> = <code>Mass × 1000</code> — the form to use when Mass are the values you have.</li><li><strong>Number of molecules</strong> = <code>Mass × 912445569696970 ÷ Fragment length</code> — the form to use when Mass and Fragment length are the values you have.</li></ul><p>Any one of Amount, Mass and Mass can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Amount, Number of molecules and Mass are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Fragment length left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Fragment length is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Mass left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Mass is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Fragment length is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the dsDNA µg to pmol form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Fragment length</strong> is measured in bp. The length of the dsDNA molecule. Change it and Amount, Mass and Number of molecules changes with it. Fill it from a measurement rather than a memory — Fragment length is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Mass</strong> is measured in µg. Leave the other box blank to solve from it instead. Change it and Amount, Mass and Number of molecules changes with it. Fill it from a measurement rather than a memory — Mass is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Amount</strong> is a plain number. It is worked out from Mass and Fragment length. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Number of molecules</strong> is a plain number. It is worked out from Mass and Fragment length. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Mass</strong> is a plain number. It is worked out from Mass. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Fragment length and Mass ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Fragment length — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Amount in pmol against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Amount follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Fragment length and Mass are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Fragment length and Mass is what you already know and Amount and Number of molecules is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/how-big-will-my-cat-get">How big will my cat get Calculator</a>, <a href="/biology/huglin-index">Huglin Index Calculator</a> and <a href="/biology/hunting-tooth-ratio">Hunting Tooth Ratio Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>dsDNA µg to pmol is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
            ['title' => 'Where this fits among the other calculators', 'html' => <<<'TXT'
            <p>A criterion for choosing between these pages: dsDNA µg to pmol answers a different question from the one above, even where the two share a sentence of explanation.</p><p>The nearest are <a href="/biology/how-big-will-my-cat-get">How big will my cat get Calculator</a>, <a href="/biology/huglin-index">Huglin Index Calculator</a> and <a href="/biology/hunting-tooth-ratio">Hunting Tooth Ratio Calculator</a>. Each takes its own inputs and reports its own answer, and none of them shares a stored value with this page — open two in separate tabs and they will not interfere.</p><p>If the value you need is not the one reported here but a step before or after it, one of those pages probably reports it directly rather than making you convert by hand.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>An answer from dsDNA µg to pmol is a number to act on, so the useful question is what to do with Amount (pmol), Number of molecules and Mass (ng) once the panel shows it.</p><ul><li><strong>Record the inputs with the answer.</strong> A number on its own is not reproducible. Write down Fragment length and Mass alongside it — a week later the answer is checkable and the reasoning is not.</li><li><strong>Re-run it when a measurement changes.</strong> The page keeps nothing between visits, which is a feature: every figure is worked out from the numbers in front of it, so updating one input and pressing Calculate again gives a fresh answer rather than an average of the old and the new.</li><li><strong>Keep the formula with the figure.</strong> A number from a page like this one travels better than a number from a spreadsheet cell, because the formula that produced it is visible on the same page and does not depend on a file being kept.</li><li><strong>Compare rather than convert.</strong> Run it once for the case in front of you and once for a case you understand well. The gap between the two answers tells you more about your own situation than either number does on its own.</li></ul><p>The page is a calculator, not a system of record. Copy what you need out of it, keep it with the inputs that produced it, and come back with different numbers whenever the inputs change.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the dsDNA µg to pmol calculator work out?', 'a' => 'Amount, Number of molecules and Mass, from Mass and Fragment length. The relationship is Amount = Mass × 1000000 ÷ (660 × Fragment length).'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Fragment length (bp), Mass (µg). With fragment length and mass in place, Amount can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Amount, Mass, Mass and Number of molecules blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Amount is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Fragment length blank and the page solves for it, reporting Amount instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Amount keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/how-big-will-my-cat-get', 'name' => 'How big will my cat get Calculator'],
            ['path' => '/biology/huglin-index', 'name' => 'Huglin Index Calculator'],
            ['path' => '/biology/hunting-tooth-ratio', 'name' => 'Hunting Tooth Ratio Calculator'],
        ],
        'authors' => [],
    ],
];
