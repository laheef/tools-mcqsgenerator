<?php

/**
 * Resuspension Calculator
 * /chemistry/resuspension
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Resuspension Calculator',
    'meta' => ['title' => 'Resuspension Calculator: Solvent Volume to Add', 'description' => 'For a lyophilised powder, find the volume of solvent that gives the concentration you want, or the concentration that a given volume of solvent produces.', 'h1' => 'Resuspension Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'powder_mass',
                    'label' => 'Mass of lyophilised powder',
                    'type' => 'number',
                    'suffix' => 'mg',
                    'default' => '10',
                    'help' => 'Mass of protein or compound in the vial',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'target_conc',
                    'label' => 'Target concentration',
                    'type' => 'number',
                    'suffix' => 'mg/mL',
                    'default' => '1',
                    'help' => 'What the assay protocol asks for',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'solvent_volume',
                    'label' => 'Volume of solvent to add',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mL',
                ],
                [
                    'name' => 'conc_ug_ul',
                    'label' => 'Concentration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'µg/µL',
                ],
                [
                    'name' => 'total_aliquot_1ml',
                    'label' => 'Aliquots of 100 µL at this concentration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Resuspension',
            'results' => [
                'solvent_volume' => 'powder_mass/target_conc',
                'conc_ug_ul' => 'target_conc',
                'total_aliquot_1ml' => 'powder_mass/target_conc*10',
                'powder_mass' => 'solvent_volume*target_conc',
                'target_conc' => 'powder_mass/solvent_volume',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Resuspending a lyophilised powder is the reverse of reconstituting a drug vial: you choose the concentration and the page tells you how much liquid to add, <strong>V = mass ÷ concentration</strong>. It reports the volume in millilitres and the concentration in both mg/mL and µg/µL, which are the same number.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Every lyophilised protein comes with a mass and no volume. The concentration is whatever you make it, so the solvent volume is a decision rather than a measurement — and it is the decision that sets every dilution downstream.</p><p>The page reports <strong>volume of solvent to add and concentration and aliquots of 100 µL at this concentration</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Volume of solvent to add</strong></td><td><code>Mass of lyophilised powder ÷ Target concentration</code></td></tr><tr><td><strong>Concentration</strong></td><td><code>Target concentration</code></td></tr><tr><td><strong>Aliquots of 100 µL at this concentration</strong></td><td><code>Mass of lyophilised powder ÷ Target concentration × 10</code></td></tr><tr><td><strong>Mass of lyophilised powder</strong></td><td><code>Volume of solvent to add × Target concentration</code></td></tr><tr><td><strong>Target concentration</strong></td><td><code>Mass of lyophilised powder ÷ Volume of solvent to add</code></td></tr></tbody></table><p><p>mg/mL and µg/µL are the same unit written twice: one milligram per millilitre is one microgram per microlitre. A protocol that asks for 1 µg/µL wants 1 mg/mL, and no conversion is needed.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports volume of solvent to add and concentration and aliquots of 100 µL at this concentration.</p><ul><li><strong>Mass of lyophilised powder</strong> — in mg. Mass of protein or compound in the vial</li><li><strong>Target concentration</strong> — in mg/mL. What the assay protocol asks for</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Volume of solvent to add</strong> — in mL</li><li><strong>Concentration</strong> — in µg/µL</li><li><strong>Aliquots of 100 µL at this concentration</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Mass of lyophilised powder = 10 mg, Target concentration = 1 mg/mL — and the results panel reads:</p><ul><li><strong>Volume of solvent to add</strong> = <code>Mass of lyophilised powder ÷ Target concentration</code> = <strong>10 mL</strong></li><li><strong>Concentration</strong> = <code>Target concentration</code> = <strong>1 µg/µL</strong></li><li><strong>Aliquots of 100 µL at this concentration</strong> = <code>Mass of lyophilised powder ÷ Target concentration × 10</code> = <strong>100</strong></li></ul><p>With the numbers written into the formula, the first result is <code>10 ÷ 1 = 10</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>10 mg of powder at 1 mg/mL takes 10 mL of solvent, and makes twenty 100 µL aliquots. At 2 mg/mL the same vial takes 5 mL and makes ten aliquots — the same material, half the handling.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Choose the concentration from the assay's working range, not from convenience. A stock that is too dilute forces large volumes into a small well; too concentrated and the freeze-thaw aliquots are too small to pipette accurately.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Volume of solvent to add</th><th>Concentration</th><th>Aliquots of 100 µL at this concentration</th></tr></thead><tbody><tr><td><strong>Mass of lyophilised powder</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>+10 %</td></tr><tr><td><strong>Target concentration</strong> +10 %</td><td>−9.09 %</td><td>+10 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Target concentration</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Mass of lyophilised powder</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Mass of lyophilised powder = 25, Target concentration = 2.5, the page reports <strong>Volume of solvent to add</strong> = 10 mL, <strong>Concentration</strong> = 2.5 µg/µL, <strong>Aliquots of 100 µL at this concentration</strong> = 100. 25 mg at 2.5 mg/mL is 10 mL — a common working stock for an antibody.</li><li>With Mass of lyophilised powder = 1, Target concentration = 0.5, the page reports <strong>Volume of solvent to add</strong> = 2 mL, <strong>Concentration</strong> = 0.5 µg/µL, <strong>Aliquots of 100 µL at this concentration</strong> = 20. 1 mg at 0.5 mg/mL is 2 mL, and the same 0.5 µg/µL in the protocol's units.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Adding to the powder instead of the powder to the solvent.</strong> Either works for dissolution, but adding liquid to a dry cake wets it more evenly than tipping powder into a tube wall.</li><li><strong>Centrifuging before opening.</strong> Powder on the cap or the seal is a real fraction of a small vial; spin it down first.</li><li><strong>Ignoring the salt and the counter-ion.</strong> A stated mass may include counter-ions, so the active mass is lower than the number on the label.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Volume of solvent to add (mL), Concentration (µg/µL), Aliquots of 100 µL at this concentration.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Milligrams and millilitres give milligrams per millilitre, which is the same as micrograms per microlitre. The aliquot count assumes 100 µL aliquots; recalculate for a different size.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need mass of lyophilised powder and target concentration. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Volume of solvent to add and concentration and aliquots of 100 µl at this concentration should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Mass of lyophilised powder</strong> ×10</td><td>10</td><td>100</td><td>ten times larger</td></tr><tr><td><strong>Target concentration</strong> ×10</td><td>10</td><td>1</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes full solubility.</strong> Many proteins need a specific buffer and will not reach the target concentration at all.</li><li><strong>It says nothing about stability.</strong> Freeze-thaw cycles and the choice of buffer decide how long the stock lasts.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Making up a protein stock to a protocol's concentration.</li></li><li><li>Planning how many aliquots a vial will give.</li></li><li><li>Converting a target concentration into a volume to pipette.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/reconstitution">Reconstitution</a> <a href="/chemistry/concentration">Concentration</a> <a href="/chemistry/dilution-factor">Dilution factor</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Resuspension calculator work out?', 'a' => <<<'TXT'
            It returns volume of solvent to add and concentration and aliquots of 100 µL at this concentration from mass of lyophilised powder and target concentration. The relationship is Mass of lyophilised powder ÷ Target concentration.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Mass of lyophilised powder (mg), Target concentration (mg/mL). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: mass of lyophilised powder in mg; target concentration in mg/mL. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Is µg/µL the same as mg/mL?', 'a' => 'Yes, exactly: 1 µg/µL = 1 mg/mL. The two are the same concentration written with different prefixes, which is why protocols use them interchangeably.'],
            ['q' => 'Should I resuspend the whole vial?', 'a' => 'Usually yes. Dissolving part of a lyophilised cake is impossible to do reproducibly; resuspend everything and aliquot the result.'],
        ],
        'related' => [
            ['path' => '/chemistry/reconstitution', 'name' => 'Reconstitution'],
            ['path' => '/chemistry/concentration', 'name' => 'Concentration'],
            ['path' => '/chemistry/dilution-factor', 'name' => 'Dilution factor'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
