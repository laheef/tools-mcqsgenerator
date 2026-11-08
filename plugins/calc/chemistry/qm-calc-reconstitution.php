<?php

/**
 * Reconstitution Calculator
 * /chemistry/reconstitution
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Reconstitution Calculator',
    'meta' => ['title' => 'Reconstitution Calculator: mg per mL and Dose Volume', 'description' => 'After adding a diluent to a vial of powder, work out the concentration it makes and the volume you need to draw to deliver a prescribed dose in millilitres.', 'h1' => 'Reconstitution Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'vial_mass',
                    'label' => 'Drug mass in the vial',
                    'type' => 'number',
                    'suffix' => 'mg',
                    'default' => '500',
                    'help' => 'As printed on the label, in terms of the salt or the base — use one throughout',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'diluent_volume',
                    'label' => 'Volume of diluent added',
                    'type' => 'number',
                    'suffix' => 'mL',
                    'default' => '10',
                    'help' => 'The volume you actually added, not the nominal fill volume',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'dose',
                    'label' => 'Dose to administer',
                    'type' => 'number',
                    'suffix' => 'mg',
                    'default' => '250',
                    'help' => 'The prescribed mass for this patient',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'concentration',
                    'label' => 'Concentration after reconstitution',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mg/mL',
                ],
                [
                    'name' => 'draw_volume',
                    'label' => 'Volume to draw',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mL',
                ],
                [
                    'name' => 'remaining_volume',
                    'label' => 'Volume left in the vial',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mL',
                ],
                [
                    'name' => 'remaining_mass',
                    'label' => 'Mass left in the vial',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mg',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Reconstitution',
            'results' => [
                'concentration' => 'vial_mass/diluent_volume',
                'draw_volume' => 'dose/(vial_mass/diluent_volume)',
                'remaining_volume' => 'diluent_volume-dose/(vial_mass/diluent_volume)',
                'remaining_mass' => 'vial_mass-dose',
                'vial_mass' => 'concentration*diluent_volume',
                'diluent_volume' => 'vial_mass/concentration',
                'dose' => 'draw_volume*concentration',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A vial holds a fixed mass of drug; the diluent you add sets its concentration. <strong>Concentration = mass ÷ volume</strong>, and the volume to draw is <strong>dose ÷ concentration</strong>. This page reports both, together with what is left in the vial.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Reconstitution arithmetic is the last step before a drug reaches a patient, and it is done under time pressure by hand. Knowing the concentration the vial now holds — and what that means in millilitres — is the difference between a correct dose and a ten-fold error.</p><p>The page reports <strong>concentration after reconstitution and volume to draw and volume left in the vial and mass left in the vial</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Concentration after reconstitution</strong></td><td><code>Drug mass in the vial ÷ Volume of diluent added</code></td></tr><tr><td><strong>Volume to draw</strong></td><td><code>Dose to administer ÷ (Drug mass in the vial ÷ Volume of diluent added)</code></td></tr><tr><td><strong>Volume left in the vial</strong></td><td><code>Volume of diluent added-Dose to administer ÷ (Drug mass in the vial ÷ Volume of diluent added)</code></td></tr><tr><td><strong>Mass left in the vial</strong></td><td><code>Drug mass in the vial-Dose to administer</code></td></tr><tr><td><strong>Drug mass in the vial</strong></td><td><code>Concentration after reconstitution × Volume of diluent added</code></td></tr><tr><td><strong>Volume of diluent added</strong></td><td><code>Drug mass in the vial ÷ Concentration after reconstitution</code></td></tr><tr><td><strong>Dose to administer</strong></td><td><code>Volume to draw × Concentration after reconstitution</code></td></tr></tbody></table><p><p>The diluent volume, not the final volume, is what divides the mass, because powder contributes almost no volume. A 500 mg vial brought to 10 mL is 50 mg/mL; the same vial brought to 10 mL *final* volume, with the powder displacing some of that, is slightly stronger.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports concentration after reconstitution and volume to draw and volume left in the vial and mass left in the vial.</p><ul><li><strong>Drug mass in the vial</strong> — in mg. As printed on the label, in terms of the salt or the base — use one throughout</li><li><strong>Volume of diluent added</strong> — in mL. The volume you actually added, not the nominal fill volume</li><li><strong>Dose to administer</strong> — in mg. The prescribed mass for this patient</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Concentration after reconstitution</strong> — in mg/mL</li><li><strong>Volume to draw</strong> — in mL</li><li><strong>Volume left in the vial</strong> — in mL</li><li><strong>Mass left in the vial</strong> — in mg</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Drug mass in the vial = 500 mg, Volume of diluent added = 10 mL, Dose to administer = 250 mg — and the results panel reads:</p><ul><li><strong>Concentration after reconstitution</strong> = <code>Drug mass in the vial ÷ Volume of diluent added</code> = <strong>50 mg/mL</strong></li><li><strong>Volume to draw</strong> = <code>Dose to administer ÷ (Drug mass in the vial ÷ Volume of diluent added)</code> = <strong>5 mL</strong></li><li><strong>Volume left in the vial</strong> = <code>Volume of diluent added-Dose to administer ÷ (Drug mass in the vial ÷ Volume of diluent added)</code> = <strong>5 mL</strong></li><li><strong>Mass left in the vial</strong> = <code>Drug mass in the vial-Dose to administer</code> = <strong>250 mg</strong></li></ul><p>With the numbers written into the formula, the first result is <code>500 ÷ 10 = 50</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>500 mg in 10 mL is 50 mg/mL. A 250 mg dose is 5 mL drawn; 250 mg stays in the vial, which is half the contents and half the volume. If the label says the powder displaces 0.5 mL, the concentration is 52.6 mg/mL instead.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check the concentration against what the label or the protocol expects before drawing anything. A figure ten times too high is usually a milligram/gram slip; the weight of an error that gets through is not measured in millilitres.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Concentration after reconstitution</th><th>Volume to draw</th><th>Volume left in the vial</th><th>Mass left in the vial</th></tr></thead><tbody><tr><td><strong>Drug mass in the vial</strong> +10 %</td><td>+10 %</td><td>−9.09 %</td><td>+9.09 %</td><td>+20 %</td></tr><tr><td><strong>Volume of diluent added</strong> +10 %</td><td>−9.09 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Dose to administer</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>−10 %</td><td>−10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Drug mass in the vial</strong>: a ten per cent move there shifts the result by about 20 per cent. The least sensitive is <strong>Dose to administer</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Drug mass in the vial = 1 000, Volume of diluent added = 20, Dose to administer = 125, the page reports <strong>Concentration after reconstitution</strong> = 50 mg/mL, <strong>Volume to draw</strong> = 2.5 mL, <strong>Volume left in the vial</strong> = 17.5 mL, <strong>Mass left in the vial</strong> = 875 mg. 1 g in 20 mL is 50 mg/mL, so 125 mg is 2.5 mL — the familiar pattern of a 1 g vial and a paediatric dose.</li><li>With Drug mass in the vial = 250, Volume of diluent added = 5, Dose to administer = 50, the page reports <strong>Concentration after reconstitution</strong> = 50 mg/mL, <strong>Volume to draw</strong> = 1 mL, <strong>Volume left in the vial</strong> = 4 mL, <strong>Mass left in the vial</strong> = 200 mg. 250 mg in 5 mL is 50 mg/mL and a 50 mg dose is exactly 1 mL.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Final volume used as diluent volume.</strong> If the label says bring the total to 10 mL, the powder occupies part of it and the concentration is higher than mass ÷ 10.</li><li><strong>Salt against base.</strong> 500 mg of a hydrochloride salt is not 500 mg of the free base; use the form the prescription names.</li><li><strong>Dead volume ignored.</strong> A vial's overfill and the needle's hold-up mean the last dose is short — never plan to the last drop.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Concentration after reconstitution (mg/mL), Volume to draw (mL), Volume left in the vial (mL), Mass left in the vial (mg).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Milligrams and millilitres throughout, giving milligrams per millilitre. If the vial is labelled in grams or units, convert once at the start rather than mixing scales in the boxes.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need drug mass in the vial and volume of diluent added and dose to administer. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Concentration after reconstitution and volume to draw and volume left in the vial and mass left in the vial should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Drug mass in the vial</strong> ×10</td><td>50</td><td>500</td><td>ten times larger</td></tr><tr><td><strong>Volume of diluent added</strong> ×10</td><td>50</td><td>5</td><td>ten times smaller</td></tr><tr><td><strong>Dose to administer</strong> ×10</td><td>50</td><td>50</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes complete dissolution.</strong> Powder that will not fully dissolve leaves the concentration lower and the dose unreliable.</li><li><strong>It is arithmetic, not pharmacy.</strong> Stability, compatibility with the diluent and expiry after reconstitution are separate questions with real answers.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Working out the concentration after adding a diluent.</li></li><li><li>Converting a prescribed dose into a draw volume.</li></li><li><li>Checking a colleague's reconstitution calculation.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/resuspension">Resuspension</a> <a href="/chemistry/mass-concentration-to-molar-concentration">Mass to molar concentration</a> <a href="/chemistry/molarity">Molarity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Reconstitution calculator work out?', 'a' => <<<'TXT'
            It returns concentration after reconstitution and volume to draw and volume left in the vial and mass left in the vial from drug mass in the vial and volume of diluent added and dose to administer. The relationship is Drug mass in the vial ÷ Volume of diluent added.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Drug mass in the vial (mg), Volume of diluent added (mL), Dose to administer (mg). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: drug mass in the vial in mg; volume of diluent added in mL; dose to administer in mg. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why not divide by the final volume?', 'a' => <<<'TXT'
            Because you do not know it until the powder is in. Most labels quote the diluent volume for exactly this reason; if the label quotes a final volume, the concentration is higher than mass ÷ that figure by the volume the powder displaces.
            TXT],
            ['q' => 'Does the concentration change with temperature?', 'a' => 'Slightly, by thermal expansion of the liquid. For a dose calculation at room temperature the effect is far below the accuracy of a syringe.'],
        ],
        'related' => [
            ['path' => '/chemistry/resuspension', 'name' => 'Resuspension'],
            ['path' => '/chemistry/mass-concentration-to-molar-concentration', 'name' => 'Mass to molar concentration'],
            ['path' => '/chemistry/molarity', 'name' => 'Molarity'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
