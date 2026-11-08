<?php

/**
 * Neutralization Calculator
 * /chemistry/neutralization
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Neutralization Calculator',
    'meta' => ['title' => 'Neutralization Calculator: Acid, Base and Mass', 'description' => 'Work out the mass of base needed to neutralise a given volume of acid, or the mass of acid an alkali will take, from the equivalents and the molar mass.', 'h1' => 'Neutralization Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'acid_conc',
                    'label' => 'Acid concentration',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '1',
                    'help' => 'Strength of the acid solution',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'acid_volume',
                    'label' => 'Volume of acid',
                    'type' => 'number',
                    'suffix' => 'L',
                    'default' => '0.25',
                    'help' => 'How much is to be neutralised',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'acid_equivalents',
                    'label' => 'Acid equivalents per mole (n)',
                    'type' => 'number',
                    'default' => '2',
                    'help' => '1 for HCl, 2 for H₂SO₄, 3 for H₃PO₄',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'base_equivalents',
                    'label' => 'Base equivalents per mole (n)',
                    'type' => 'number',
                    'default' => '1',
                    'help' => '1 for NaOH and KOH, 2 for Ca(OH)₂',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'base_molar_mass',
                    'label' => 'Molar mass of the base',
                    'type' => 'number',
                    'suffix' => 'g/mol',
                    'default' => '40.0',
                    'help' => '40.00 for NaOH, 56.11 for KOH, 74.09 for Ca(OH)₂',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'base_mass',
                    'label' => 'Mass of base needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
                [
                    'name' => 'equivalents',
                    'label' => 'Equivalents to neutralise',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'eq',
                ],
                [
                    'name' => 'base_moles',
                    'label' => 'Moles of base needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Neutralization',
            'results' => [
                'base_mass' => 'acid_conc*acid_volume*acid_equivalents*base_molar_mass/base_equivalents',
                'equivalents' => 'acid_conc*acid_volume*acid_equivalents',
                'base_moles' => 'acid_conc*acid_volume*acid_equivalents/base_equivalents',
                'acid_conc' => 'base_moles*base_equivalents/(acid_volume*acid_equivalents)',
                'acid_volume' => 'base_moles*base_equivalents/(acid_conc*acid_equivalents)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Neutralising an acid means supplying the same number of equivalents of base. With equivalents matched, <strong>m<sub>base</sub> = c<sub>acid</sub>V<sub>acid</sub>n<sub>acid</sub> × M<sub>base</sub> ÷ n<sub>base</sub></strong> gives the mass that has to be weighed out.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>This is the calculation behind every spill kit and every waste-neutralisation record. It answers a question asked in the middle of a job: given this much acid, how much soda ash do I add, and how will I know to stop?</p><p>The page reports <strong>mass of base needed and equivalents to neutralise and moles of base needed</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Mass of base needed</strong></td><td><code>Acid concentration × Volume of acid × Acid equivalents per mole (n) × Molar mass of the base ÷ Base equivalents per mole (n)</code></td></tr><tr><td><strong>Equivalents to neutralise</strong></td><td><code>Acid concentration × Volume of acid × Acid equivalents per mole (n)</code></td></tr><tr><td><strong>Moles of base needed</strong></td><td><code>Acid concentration × Volume of acid × Acid equivalents per mole (n) ÷ Base equivalents per mole (n)</code></td></tr><tr><td><strong>Acid concentration</strong></td><td><code>Moles of base needed × Base equivalents per mole (n) ÷ (Volume of acid × Acid equivalents per mole (n))</code></td></tr><tr><td><strong>Volume of acid</strong></td><td><code>Moles of base needed × Base equivalents per mole (n) ÷ (Acid concentration × Acid equivalents per mole (n))</code></td></tr></tbody></table><p><p>Equivalents rather than moles is the whole idea. One equivalent of acid neutralises one equivalent of base whatever the formulae, and the n factors are what convert between the two bookkeeping systems.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 5 boxes and the page has everything it needs. It reports mass of base needed and equivalents to neutralise and moles of base needed.</p><ul><li><strong>Acid concentration</strong> — in mol/L. Strength of the acid solution</li><li><strong>Volume of acid</strong> — in L. How much is to be neutralised</li><li><strong>Acid equivalents per mole (n)</strong>. 1 for HCl, 2 for H₂SO₄, 3 for H₃PO₄</li><li><strong>Base equivalents per mole (n)</strong>. 1 for NaOH and KOH, 2 for Ca(OH)₂</li><li><strong>Molar mass of the base</strong> — in g/mol. 40.00 for NaOH, 56.11 for KOH, 74.09 for Ca(OH)₂</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Mass of base needed</strong> — in g</li><li><strong>Equivalents to neutralise</strong> — in eq</li><li><strong>Moles of base needed</strong> — in mol</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Acid concentration = 1 mol/L, Volume of acid = 0.25 L, Acid equivalents per mole (n) = 2, Base equivalents per mole (n) = 1, Molar mass of the base = 40 g/mol — and the results panel reads:</p><ul><li><strong>Mass of base needed</strong> = <code>Acid concentration × Volume of acid × Acid equivalents per mole (n) × Molar mass of the base ÷ Base equivalents per mole (n)</code> = <strong>20 g</strong></li><li><strong>Equivalents to neutralise</strong> = <code>Acid concentration × Volume of acid × Acid equivalents per mole (n)</code> = <strong>0.5 eq</strong></li><li><strong>Moles of base needed</strong> = <code>Acid concentration × Volume of acid × Acid equivalents per mole (n) ÷ Base equivalents per mole (n)</code> = <strong>0.5 mol</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1 × 0.25 × 2 × 40 ÷ 1 = 20</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>250 mL of 1 mol/L sulfuric acid carries 0.5 equivalents. Sodium hydroxide supplies one equivalent per mole and weighs 40.00 g/mol, so 20.0 g neutralises the lot — 0.5 mol of base for 0.25 mol of a diprotic acid.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check the equivalents result against the acid: a 1 mol/L diprotic acid has twice the equivalents of a monoprotic one at the same strength. If the mass looks small, the acid equivalents are probably still on 1.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Mass of base needed</th><th>Equivalents to neutralise</th><th>Moles of base needed</th></tr></thead><tbody><tr><td><strong>Acid concentration</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Volume of acid</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Acid equivalents per mole (n)</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Base equivalents per mole (n)</strong> +10 %</td><td>−9.09 %</td><td>+0 %</td><td>−9.09 %</td></tr><tr><td><strong>Molar mass of the base</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Acid concentration</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Base equivalents per mole (n)</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Acid concentration = 1, Volume of acid = 1, Acid equivalents per mole (n) = 1, Base equivalents per mole (n) = 1, Molar mass of the base = 40, the page reports <strong>Mass of base needed</strong> = 40 g, <strong>Equivalents to neutralise</strong> = 1 eq, <strong>Moles of base needed</strong> = 1 mol. One litre of 1 M HCl takes 40 g of NaOH — one mole of each.</li><li>With Acid concentration = 0.5, Volume of acid = 2, Acid equivalents per mole (n) = 3, Base equivalents per mole (n) = 2, Molar mass of the base = 74.09, the page reports <strong>Mass of base needed</strong> = 111.135 g, <strong>Equivalents to neutralise</strong> = 3 eq, <strong>Moles of base needed</strong> = 1.5 mol. 2 L of 0.5 M phosphoric acid is 3 equivalents; calcium hydroxide supplies 2 per mole, so 1.5 mol — 111.1 g — is needed.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Equivalents left at 1 for a polyprotic acid.</strong> Sulfuric acid then needs half the base it really does, and the mixture stays acidic.</li><li><strong>Molar mass of the anhydrous base used for a hydrate.</strong> Calcium hydroxide and soda ash both carry water in some forms.</li><li><strong>Neutralisation read as a target pH of 7.</strong> Exact neutrality is a knife edge; in practice a slight excess of base is used and the endpoint confirmed with a meter.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Mass of base needed (g), Equivalents to neutralise (eq), Moles of base needed (mol).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The acid volume is in litres on this page, not millilitres. A 250 mL beaker of acid is 0.25 L; entering 250 asks for a thousand times too much base.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need acid concentration and volume of acid and acid equivalents per mole (n) and base equivalents per mole (n) and molar mass of the base. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Mass of base needed and equivalents to neutralise and moles of base needed should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Acid concentration</strong> ×10</td><td>20</td><td>200</td><td>ten times larger</td></tr><tr><td><strong>Volume of acid</strong> ×10</td><td>20</td><td>200</td><td>ten times larger</td></tr><tr><td><strong>Acid equivalents per mole (n)</strong> ×10</td><td>20</td><td>200</td><td>ten times larger</td></tr><tr><td><strong>Base equivalents per mole (n)</strong> ×10</td><td>20</td><td>2</td><td>ten times smaller</td></tr><tr><td><strong>Molar mass of the base</strong> ×10</td><td>20</td><td>200</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes complete reaction.</strong> A weak acid neutralised to its salt still leaves a solution that is not neutral in pH.</li><li><strong>It ignores heat.</strong> Neutralisation is exothermic, and a concentrated spill can boil; the arithmetic says nothing about rate.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Working out how much reagent a spill or a waste stream needs.</li></li><li><li>Planning a batch neutralisation with a weighed solid base.</li></li><li><li>Converting between normalities without going through molarity twice.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/titration">Titration</a> <a href="/chemistry/normality">Normality</a> <a href="/chemistry/ph">pH</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Neutralization calculator work out?', 'a' => <<<'TXT'
            It returns mass of base needed and equivalents to neutralise and moles of base needed from acid concentration and volume of acid and acid equivalents per mole (n) and base equivalents per mole (n) and molar mass of the base. The relationship is Acid concentration × Volume of acid × Acid equivalents per mole (n) × Molar mass of the base ÷ Base equivalents per mole (n).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Acid concentration (mol/L), Volume of acid (L), Acid equivalents per mole (n), Base equivalents per mole (n), Molar mass of the base (g/mol). The result boxes need no input of their own: they are computed.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: acid concentration in mol/L; volume of acid in L; molar mass of the base in g/mol. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why use equivalents instead of moles?', 'a' => <<<'TXT'
            Because one equivalent of acid always neutralises one equivalent of base, whatever the formulae. Moles need the stoichiometric coefficients, and those are easy to get wrong.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/titration', 'name' => 'Titration'],
            ['path' => '/chemistry/normality', 'name' => 'Normality'],
            ['path' => '/chemistry/ph', 'name' => 'pH'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
