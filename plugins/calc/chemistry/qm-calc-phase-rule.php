<?php

/**
 * Gibbs Phase Rule Calculator
 * /chemistry/phase-rule
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Gibbs Phase Rule Calculator',
    'meta' => ['title' => 'Gibbs Phase Rule Calculator: Degrees of Freedom', 'description' => 'Work out how many variables you can set independently in a system, from its number of components and the number of phases that are present in equilibrium.', 'h1' => 'Gibbs Phase Rule Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'components',
                    'label' => 'Independent components',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Water is one component; a water–sugar solution is two',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'phases',
                    'label' => 'Phases present',
                    'type' => 'number',
                    'default' => '1',
                    'help' => 'Ice alone is one; ice and water together are two',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'freedom',
                    'label' => 'Degrees of freedom',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'at_fixed_pressure',
                    'label' => 'Degrees of freedom at fixed pressure',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'max_phases',
                    'label' => 'Most phases possible for these components',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Gibbs Phase Rule',
            'results' => [
                'freedom' => 'components-phases+2',
                'at_fixed_pressure' => 'components-phases+1',
                'max_phases' => 'components+2',
                'components' => 'freedom+phases-2',
                'phases' => 'components+2-freedom',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The phase rule counts freedom: <strong>F = C − P + 2</strong>, where C is the number of components and P the number of phases in equilibrium. The two at the end are temperature and pressure, which is why holding one of them constant removes one degree of freedom.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>The phase rule is the reason a phase diagram has the shape it has. It says how many lines can meet at a point, why pure water has one boiling temperature at a given pressure, and why a eutectic sits at a single composition.</p><p>The page reports <strong>degrees of freedom and degrees of freedom at fixed pressure and most phases possible for these components</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Degrees of freedom</strong></td><td><code>Independent components-Phases present+2</code></td></tr><tr><td><strong>Degrees of freedom at fixed pressure</strong></td><td><code>Independent components-Phases present+1</code></td></tr><tr><td><strong>Most phases possible for these components</strong></td><td><code>Independent components+2</code></td></tr><tr><td><strong>Independent components</strong></td><td><code>Degrees of freedom+Phases present-2</code></td></tr><tr><td><strong>Phases present</strong></td><td><code>Independent components+2-Degrees of freedom</code></td></tr></tbody></table><p><p>Each phase in equilibrium adds a constraint that ties the phases' compositions together, and each constraint removes one variable. Subtract enough and the count reaches zero — a triple point, where nothing is free at all.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports degrees of freedom and degrees of freedom at fixed pressure and most phases possible for these components.</p><ul><li><strong>Independent components</strong>. Water is one component; a water–sugar solution is two</li><li><strong>Phases present</strong>. Ice alone is one; ice and water together are two</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Degrees of freedom</strong></li><li><strong>Degrees of freedom at fixed pressure</strong></li><li><strong>Most phases possible for these components</strong></li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Independent components = 1, Phases present = 1 — and the results panel reads:</p><ul><li><strong>Degrees of freedom</strong> = <code>Independent components-Phases present+2</code> = <strong>2</strong></li><li><strong>Degrees of freedom at fixed pressure</strong> = <code>Independent components-Phases present+1</code> = <strong>1</strong></li><li><strong>Most phases possible for these components</strong> = <code>Independent components+2</code> = <strong>3</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1-1+2 = 2</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Pure water as a single liquid: C = 1, P = 1, so F = 2 — you can choose a temperature and a pressure independently. At the boiling point, liquid and vapour coexist, P = 2 and F = 1 — choose the pressure and the temperature follows.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>A result of zero means the system is invariant: every variable is fixed by the phases present. A negative result means those phases cannot coexist at all at equilibrium — the page will return it rather than hide it.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Degrees of freedom</th><th>Degrees of freedom at fixed pressure</th><th>Most phases possible for these components</th></tr></thead><tbody><tr><td><strong>Independent components</strong> +10 %</td><td>+5 %</td><td>+10 %</td><td>+3.33 %</td></tr><tr><td><strong>Phases present</strong> +10 %</td><td>−5 %</td><td>−10 %</td><td>+0 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Independent components</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Phases present</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Independent components = 2, Phases present = 1, the page reports <strong>Degrees of freedom</strong> = 3, <strong>Degrees of freedom at fixed pressure</strong> = 2, <strong>Most phases possible for these components</strong> = 4. A two-component solution: three degrees of freedom — temperature, pressure and composition.</li><li>With Independent components = 1, Phases present = 3, the page reports <strong>Degrees of freedom</strong> = 0, <strong>Degrees of freedom at fixed pressure</strong> = -1, <strong>Most phases possible for these components</strong> = 3. The triple point of water: zero degrees of freedom at exactly 273.16 K and 611.7 Pa.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Components counted as substances.</strong> A mixture of water and salt where the salt is fully dissociated has three species but is still a two-component system by convention.</li><li><strong>Constituent phases confused with phases present.</strong> Ice and water are two phases; two pieces of ice are one.</li><li><strong>The plus-two dropped.</strong> At constant pressure the expression becomes C − P + 1, which is the version most metallurgy problems use.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Degrees of freedom, Degrees of freedom at fixed pressure, Most phases possible for these components.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Everything here is a count, so no units appear. The two in the expression is the number of intensive variables — temperature and pressure — that a one-phase system leaves free.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need independent components and phases present. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Degrees of freedom and degrees of freedom at fixed pressure and most phases possible for these components should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Independent components</strong> ×10</td><td>2</td><td>11</td><td>×5.5</td></tr><tr><td><strong>Phases present</strong> ×10</td><td>2</td><td>-7</td><td>×-3.5</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It counts, it does not explain.</strong> The rule says how many variables are free, not what their values are.</li><li><strong>It assumes equilibrium.</strong> A supercooled liquid or a glass is not at equilibrium and can hold phases the rule says should be gone.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Reading a phase diagram's degrees of freedom.</li></li><li><li>Checking whether a proposed equilibrium is possible.</li></li><li><li>Sizing a distillation's specification variables.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/raoults-law">Raoult&#x27;s law</a> <a href="/chemistry/boiling-point">Boiling point</a> <a href="/chemistry/mole-fraction">Mole fraction</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Gibbs Phase Rule calculator work out?', 'a' => <<<'TXT'
            It returns degrees of freedom and degrees of freedom at fixed pressure and most phases possible for these components from independent components and phases present. The relationship is Independent components-Phases present+2.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Independent components, Phases present. Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => 'It matters that every box is in the unit printed beside it: . The page converts nothing on its own, so a mixed set of units is the most common wrong answer.'],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why plus two?', 'a' => <<<'TXT'
            Because temperature and pressure are the two intensive variables that can be varied independently in a system with one phase. Fix one of them and the rule becomes C − P + 1.
            TXT],
            ['q' => 'What does a negative number mean?', 'a' => 'That the combination of phases cannot coexist in equilibrium: too many phases for the components available.'],
        ],
        'related' => [
            ['path' => '/chemistry/raoults-law', 'name' => 'Raoult\'s law'],
            ['path' => '/chemistry/boiling-point', 'name' => 'Boiling point'],
            ['path' => '/chemistry/mole-fraction', 'name' => 'Mole fraction'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
