<?php

/**
 * Fish Density Calculator
 * /biology/fish-density
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fish Density Calculator',
    'meta' => ['title' => 'Fish Density Calculator — Formula & Results', 'description' => 'Fish Density works out Fish per litre and Litres per fish from Number of fish, Water volume and Average fish weight. It is a single relationship that reads…', 'h1' => 'Fish Density Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'fish',
                            'label' => 'Number of fish',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Water volume',
                            'type' => 'number',
                            'suffix' => 'L',
                            'help' => 'Net water volume, not the tank\'s outside size',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                        [
                            'name' => 'weight',
                            'label' => 'Average fish weight',
                            'type' => 'number',
                            'suffix' => 'g',
                            'help' => 'Optional: adds a biomass figure',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'density',
                            'label' => 'Fish per litre',
                            'type' => 'number',
                            'suffix' => 'fish/L',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'per_fish',
                            'label' => 'Litres per fish',
                            'type' => 'number',
                            'suffix' => 'L/fish',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'biomass',
                            'label' => 'Biomass density',
                            'type' => 'number',
                            'suffix' => 'g/L',
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
            'title' => 'Density',
            'results' => [
                'density' => 'fish/volume',
                'per_fish' => 'volume/fish',
                'biomass' => 'fish*weight/volume',
                'fish' => 'density*volume',
                'volume' => 'fish/density',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Fish Density works out Fish per litre and Litres per fish from Number of fish, Water volume and Average fish weight. It is a single relationship that reads Fish per litre out of Number of fish, not a table of canned results keyed by them. Units for Fish per litre default to fish/L and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Fish Density calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Fish Density: it takes 3 numbers and reports Fish per litre, Litres per fish and Biomass density.</p><p>The relationship it solves reads Fish per litre = Number of fish ÷ Water volume.</p><p>What comes back is Fish per litre, Litres per fish and Biomass density — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Number of fish</strong> — a plain number, no unit</li><li><strong>Water volume</strong> — in L. Net water volume, not the tank&#039;s outside size</li><li><strong>Average fish weight</strong> — in g. Optional: adds a biomass figure</li></ul><p>What you get back is Fish per litre in fish/L, Litres per fish in L/fish, Biomass density in g/L, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Fish per litre is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Fish per litre</strong> = <code>Number of fish ÷ Water volume</code></li><li><strong>Litres per fish</strong> = <code>Water volume ÷ Number of fish</code></li><li><strong>Biomass density</strong> = <code>Number of fish × Average fish weight ÷ Water volume</code></li><li><strong>Number of fish</strong> = <code>Fish per litre × Water volume</code></li><li><strong>Water volume</strong> = <code>Number of fish ÷ Fish per litre</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Fish per litre</strong> = <code>Number of fish ÷ Water volume</code> — the form to use when Number of fish and Water volume are the values you have.</li><li><strong>Litres per fish</strong> = <code>Water volume ÷ Number of fish</code> — the form to use when Water volume and Number of fish are the values you have.</li><li><strong>Biomass density</strong> = <code>Number of fish × Average fish weight ÷ Water volume</code> — the form to use when Number of fish, Average fish weight and Water volume are the values you have.</li><li><strong>Number of fish</strong> = <code>Fish per litre × Water volume</code> — the form to use when Fish per litre and Water volume are the values you have.</li><li><strong>Water volume</strong> = <code>Number of fish ÷ Fish per litre</code> — the form to use when Number of fish and Fish per litre are the values you have.</li></ul><p>Any one of Fish per litre, Litres per fish and Biomass density can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Fish per litre, Litres per fish and Biomass density are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Number of fish left as a guess.</strong> Anything typed into Number of fish is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Water volume left as a guess.</strong> Anything typed into Water volume is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Average fish weight left as a guess.</strong> Anything typed into Average fish weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Number of fish and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Number of fish</strong> takes a plain number with no unit attached. It feeds Fish per litre, Litres per fish and Biomass density. Have it to hand before you start: Number of fish is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Water volume</strong> is measured in L. Net water volume, not the tank&#039;s outside size. It feeds Fish per litre, Litres per fish and Biomass density. Have it to hand before you start: Water volume is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Average fish weight</strong> is measured in g. Optional: adds a biomass figure. It feeds Biomass density. Have it to hand before you start: Average fish weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Fish per litre</strong> is a plain number. It is worked out from Number of fish and Water volume. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Litres per fish</strong> is a plain number. It is worked out from Water volume and Number of fish. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Biomass density</strong> is a plain number. It is worked out from Number of fish, Average fish weight and Water volume. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Number of fish, Water volume and Average fish weight. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Number of fish into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Fish per litre in fish/L with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Fish per litre is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Number of fish, Water volume and Average fish weight and the number you are missing is Fish per litre and Litres per fish.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/hamster-age">Hamster age Calculator</a>, <a href="/biology/hardy-weinberg-equilibrium">Hardy-Weinberg equilibrium Calculator</a> and <a href="/biology/hardy-weinberg-dominant-allele">Hardy–Weinberg from the Dominant Allele Frequency Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Fish Density calculator work out?', 'a' => 'Fish per litre, Litres per fish and Biomass density, from Number of fish and Water volume. The relationship is Fish per litre = Number of fish ÷ Water volume.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Number of fish, Water volume (L), Average fish weight (g). With fish, volume and weight in place, Fish per litre can stay blank and the page will work it out.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Fish per litre, Litres per fish, Biomass density and Number of fish blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Fish per litre is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Number of fish left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Fish per litre at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/hamster-age', 'name' => 'Hamster age Calculator'],
            ['path' => '/biology/hardy-weinberg-equilibrium', 'name' => 'Hardy-Weinberg equilibrium Calculator'],
            ['path' => '/biology/hardy-weinberg-dominant-allele', 'name' => 'Hardy–Weinberg from the Dominant Allele Frequency Calculator'],
        ],
        'authors' => [],
    ],
];
