<?php

/**
 * Mass to Molarity Converter
 * /biology/mass-molarity-conversion
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Mass to Molarity Converter',
    'meta' => ['title' => 'Mass to Molarity Converter — Formula & Results', 'description' => 'Enter Molecular weight, Mass and Volume into Mass to Molarity and the answer comes back as Concentration and Concentration. The page has no way to flag an…', 'h1' => 'Mass to Molarity Converter', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'mw',
                            'label' => 'Molecular weight',
                            'type' => 'number',
                            'suffix' => 'g/mol',
                            'help' => 'Also called molar mass or relative molecular mass',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'mass_mg',
                            'label' => 'Mass',
                            'type' => 'number',
                            'suffix' => 'mg',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'volume_ml',
                            'label' => 'Volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'conc_mm',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'mM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'conc_mg_ml',
                            'label' => 'Concentration',
                            'type' => 'number',
                            'suffix' => 'mg/mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'moles_umol',
                            'label' => 'Amount of substance',
                            'type' => 'number',
                            'suffix' => 'µmol',
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
            'results' => ['moles_umol' => 'mass_mg*1000/mw', 'mass_mg' => 'moles_umol*mw/1000', 'conc_mm' => 'moles_umol/volume_ml', 'conc_mg_ml' => 'mass_mg/volume_ml'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Enter Molecular weight, Mass and Volume into Mass to Molarity and the answer comes back as Concentration and Concentration. It is a single relationship that reads Concentration out of Molecular weight, not a table of canned results keyed by them. Units for Concentration default to mM and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Mass to Molarity calculator works', 'html' => <<<'TXT'
            <p>Mass to Molarity answers one question from 3 numbers, and the answer is Concentration, Concentration and Amount of substance.</p><p>Written with the labels from the form, Amount of substance = Mass × 1000 ÷ Molecular weight.</p><p>The result panel carries Concentration, Concentration and Amount of substance, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 3 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Molecular weight</strong> — in g/mol. Also called molar mass or relative molecular mass</li><li><strong>Mass</strong> — in mg</li><li><strong>Volume</strong> — in mL</li></ul><p>The result boxes are Concentration in mM, Concentration in mg/mL, Amount of substance in µmol; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>As far as Concentration is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Amount of substance</strong> = <code>Mass × 1000 ÷ Molecular weight</code></li><li><strong>Mass</strong> = <code>Amount of substance × Molecular weight ÷ 1000</code></li><li><strong>Concentration</strong> = <code>Amount of substance ÷ Volume</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Amount of substance</strong> = <code>Mass × 1000 ÷ Molecular weight</code> — the form to use when Mass and Molecular weight are the values you have.</li><li><strong>Mass</strong> = <code>Amount of substance × Molecular weight ÷ 1000</code> — the form to use when Amount of substance and Molecular weight are the values you have.</li><li><strong>Concentration</strong> = <code>Amount of substance ÷ Volume</code> — the form to use when Amount of substance and Volume are the values you have.</li><li><strong>Concentration</strong> = <code>Mass ÷ Volume</code> — the form to use when Mass and Volume are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Amount of substance, Mass and Concentration can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Concentration, Concentration and Amount of substance are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Molecular weight left as a guess.</strong> Anything typed into Molecular weight is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Mass left as a guess.</strong> Anything typed into Mass is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Volume left as a guess.</strong> Anything typed into Volume is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Molecular weight to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Molecular weight</strong> is measured in g/mol. Also called molar mass or relative molecular mass. The page reads it when it works out Amount of substance and Mass. Have it to hand before you start: Molecular weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Mass</strong> is measured in mg. The page reads it when it works out Amount of substance and Concentration. Have it to hand before you start: Mass is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Volume</strong> is measured in mL. The page reads it when it works out Concentration and Concentration. Have it to hand before you start: Volume is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Concentration</strong> is a plain number. It is computed from Amount of substance and Volume, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Concentration</strong> is a plain number. It is computed from Mass and Volume, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>Amount of substance</strong> is a plain number. It is computed from Mass and Molecular weight, so it changes the moment any of them does. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Molecular weight, Mass and Volume. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Molecular weight into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Concentration in mM with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Concentration is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Molecular weight, Mass and Volume measured, Concentration and Concentration wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/hardy-weinberg-recessive-allele">Hardy–Weinberg from the Recessive Allele Frequency Calculator</a>, <a href="/biology/hardy-weinberg-recessive-homozygote">Hardy–Weinberg from the Recessive Homozygote Frequency Calcula</a> and <a href="/biology/hatch-rate">Hatch Rate Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Mass to Molarity is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Molecular weight, Mass and Volume beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Mass to Molarity calculator work out?', 'a' => <<<'TXT'
            Concentration, Concentration and Amount of substance, from Mass and Molecular weight. The relationship is Amount of substance = Mass × 1000 ÷ Molecular weight.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Molecular weight (g/mol), Mass (mg), Volume (mL). Enter mw, mass_mg and volume_ml; Concentration is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Amount of substance, Mass, Concentration and Concentration can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Concentration is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Molecular weight left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Concentration keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/hardy-weinberg-recessive-allele', 'name' => 'Hardy–Weinberg from the Recessive Allele Frequency Calculator'],
            ['path' => '/biology/hardy-weinberg-recessive-homozygote', 'name' => 'Hardy–Weinberg from the Recessive Homozygote Frequency Calcula'],
            ['path' => '/biology/hatch-rate', 'name' => 'Hatch Rate Calculator'],
        ],
        'authors' => [],
    ],
];
