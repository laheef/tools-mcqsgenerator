<?php

/**
 * Buffer pH Calculator
 * /chemistry/buffer-ph
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Buffer pH Calculator',
    'meta' => ['title' => 'Buffer pH Calculator: Henderson–Hasselbalch', 'description' => 'Work out the pH of a buffer from its pKa and the ratio of conjugate base to acid, and see the ratio that the recipe implies at the pH you are aiming for.', 'h1' => 'Buffer pH Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'pka',
                    'label' => 'pKa of the weak acid',
                    'type' => 'number',
                    'default' => '4.76',
                    'help' => 'Acetic acid is 4.76 at 25 °C',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'base_conc',
                    'label' => 'Conjugate base concentration [A⁻]',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.1',
                    'help' => 'For an acetate buffer, this is the salt',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'acid_conc',
                    'label' => 'Weak acid concentration [HA]',
                    'type' => 'number',
                    'suffix' => 'mol/L',
                    'default' => '0.1',
                    'help' => 'The undissociated acid',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ph',
                    'label' => 'pH of the buffer',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ratio',
                    'label' => 'Base to acid ratio [A⁻] ÷ [HA]',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'h_conc',
                    'label' => 'Hydrogen ion concentration',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/L',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Buffer pH',
            'results' => [
                'ph' => 'pka+log10(base_conc/acid_conc)',
                'ratio' => 'base_conc/acid_conc',
                'h_conc' => 'pow(10,-(pka+log10(base_conc/acid_conc)))',
                'pka' => 'ph-log10(base_conc/acid_conc)',
                'base_conc' => 'pow(10,ph-pka)*acid_conc',
                'acid_conc' => 'base_conc/pow(10,ph-pka)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The pH of a buffer follows the Henderson–Hasselbalch relationship: <strong>pH = pKa + log₁₀([A⁻] ÷ [HA])</strong>. Enter the pKa and the concentrations of the conjugate base and the weak acid, and the page returns the pH and the ratio it came from.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A buffer holds pH steady because the weak acid absorbs added base and the conjugate base absorbs added acid. The Henderson–Hasselbalch equation is the statement of where that balance sits, and it is how every buffer recipe in every protocol was arrived at.</p><p>The page reports <strong>pH of the buffer and base to acid ratio [A⁻] ÷ [HA] and hydrogen ion concentration</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>pH of the buffer</strong></td><td><code>pKa of the weak acid+log₁₀(Conjugate base concentration [A⁻] ÷ Weak acid concentration [HA])</code></td></tr><tr><td><strong>Base to acid ratio [A⁻] ÷ [HA]</strong></td><td><code>Conjugate base concentration [A⁻] ÷ Weak acid concentration [HA]</code></td></tr><tr><td><strong>Hydrogen ion concentration</strong></td><td><code>pow(10,-(pKa of the weak acid+log₁₀(Conjugate base concentration [A⁻] ÷ Weak acid concentration [HA])))</code></td></tr><tr><td><strong>pKa of the weak acid</strong></td><td><code>pH of the buffer-log₁₀(Conjugate base concentration [A⁻] ÷ Weak acid concentration [HA])</code></td></tr><tr><td><strong>Conjugate base concentration [A⁻]</strong></td><td><code>(10)^pH of the buffer-pKa of the weak acid × Weak acid concentration [HA]</code></td></tr><tr><td><strong>Weak acid concentration [HA]</strong></td><td><code>Conjugate base concentration [A⁻] ÷ (10)^pH of the buffer-pKa of the weak acid</code></td></tr></tbody></table><p><p>The equation is exact only when the concentrations are the amounts put in, which holds while the buffer is well away from the extremes of its range. That is why a buffer is used within about one pH unit of its pKa, where neither partner has been used up.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports pH of the buffer and base to acid ratio [A⁻] ÷ [HA] and hydrogen ion concentration.</p><ul><li><strong>pKa of the weak acid</strong>. Acetic acid is 4.76 at 25 °C</li><li><strong>Conjugate base concentration [A⁻]</strong> — in mol/L. For an acetate buffer, this is the salt</li><li><strong>Weak acid concentration [HA]</strong> — in mol/L. The undissociated acid</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>pH of the buffer</strong></li><li><strong>Base to acid ratio [A⁻] ÷ [HA]</strong></li><li><strong>Hydrogen ion concentration</strong> — in mol/L</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — pKa of the weak acid = 4.76, Conjugate base concentration [A⁻] = 0.1 mol/L, Weak acid concentration [HA] = 0.1 mol/L — and the results panel reads:</p><ul><li><strong>pH of the buffer</strong> = <code>pKa of the weak acid+log₁₀(Conjugate base concentration [A⁻] ÷ Weak acid concentration [HA])</code> = <strong>4.76</strong></li><li><strong>Base to acid ratio [A⁻] ÷ [HA]</strong> = <code>Conjugate base concentration [A⁻] ÷ Weak acid concentration [HA]</code> = <strong>1</strong></li><li><strong>Hydrogen ion concentration</strong> = <code>pow(10,-(pKa of the weak acid+log₁₀(Conjugate base concentration [A⁻] ÷ Weak acid concentration [HA])))</code> = <strong>1.738 × 10<sup>-5</sup> mol/L</strong></li></ul><p>With the numbers written into the formula, the first result is <code>4.76+log10(0.1 ÷ 0.1) = 4.76</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>With pKa 4.76 and equal concentrations of acetate and acetic acid, the logarithm is zero and the pH is exactly the pKa, 4.76. Doubling the salt to 0.2 mol/L while the acid stays at 0.1 gives pH 5.06 — a tenth of a unit for a doubling, which is the signature of a logarithm.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Check the ratio result first. A ratio between 0.1 and 10 is a usable buffer; outside that the pH will move sharply the moment anything is added, and the recipe should be reconsidered or a different pKa chosen.</p></p><table class="calc-table"><thead><tr><th>Range</th><th>What it means</th></tr></thead><tbody><tr><td><strong>Ratio 10:1</strong></td><td>pH = pKa + 1 — the top of the useful range, about 91 % base.</td></tr><tr><td><strong>Ratio 1:1</strong></td><td>pH = pKa — the centre, equal acid and base, maximum capacity.</td></tr><tr><td><strong>Ratio 1:10</strong></td><td>pH = pKa − 1 — the bottom of the useful range, about 91 % acid.</td></tr></tbody></table>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>pH of the buffer</th><th>Base to acid ratio [A⁻] ÷ [HA]</th><th>Hydrogen ion concentration</th></tr></thead><tbody><tr><td><strong>pKa of the weak acid</strong> +10 %</td><td>+10 %</td><td>+0 %</td><td>−66.58 %</td></tr><tr><td><strong>Conjugate base concentration [A⁻]</strong> +10 %</td><td>+0.87 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Weak acid concentration [HA]</strong> +10 %</td><td>−0.87 %</td><td>−9.09 %</td><td>+10 %</td></tr></tbody></table><p><p>A doubling of the salt moves the pH by 0.3, and a doubling of the acid moves it the other way by the same amount — because both enter as a ratio inside a logarithm.</p></p><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>pKa of the weak acid</strong>: a ten per cent move there shifts the result by about 66.6 per cent. The least sensitive is <strong>Conjugate base concentration [A⁻]</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With pKa of the weak acid = 7.2, Conjugate base concentration [A⁻] = 0.05, Weak acid concentration [HA] = 0.1, the page reports <strong>pH of the buffer</strong> = 6.899, <strong>Base to acid ratio [A⁻] ÷ [HA]</strong> = 0.5, <strong>Hydrogen ion concentration</strong> = 1.262 × 10<sup>-7</sup> mol/L. A phosphate buffer weighted to the acid side: pH 6.90.</li><li>With pKa of the weak acid = 9.25, Conjugate base concentration [A⁻] = 0.2, Weak acid concentration [HA] = 0.1, the page reports <strong>pH of the buffer</strong> = 9.551, <strong>Base to acid ratio [A⁻] ÷ [HA]</strong> = 2, <strong>Hydrogen ion concentration</strong> = 2.812 × 10<sup>-10</sup> mol/L. An ammonium buffer at twice the base: pH 9.55.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Moles entered where concentrations were wanted.</strong> The ratio is what matters, so equal volumes make the two interchangeable — mixed volumes do not.</li><li><strong>The acid and the salt swapped.</strong> Putting the salt underneath gives the reciprocal ratio and a pH the same distance on the wrong side of the pKa.</li><li><strong>Activity ignored.</strong> Above about 0.1 mol/L the calculated pH drifts from the measured one; calibrate the meter and trust it for the final figure.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: pH of the buffer, Base to acid ratio [A⁻] ÷ [HA], Hydrogen ion concentration (mol/L).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The two concentrations cancel in the ratio, so any consistent unit works — mol/L, mmol/L or even grams if both are in grams and the molar masses match. Mixing units between the two boxes does not.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need pKa of the weak acid and conjugate base concentration [A⁻] and weak acid concentration [HA]. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Ph of the buffer and base to acid ratio [a⁻] ÷ [ha] and hydrogen ion concentration should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>pKa of the weak acid</strong> ×10</td><td>4.76</td><td>47.6</td><td>ten times larger</td></tr><tr><td><strong>Conjugate base concentration [A⁻]</strong> ×10</td><td>4.76</td><td>5.76</td><td>×1.21</td></tr><tr><td><strong>Weak acid concentration [HA]</strong> ×10</td><td>4.76</td><td>3.76</td><td>×0.79</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes the buffer components do not interact.</strong> At high ionic strength the activity coefficients of the two partners differ and the pH shifts.</li><li><strong>It ignores dilution.</strong> A buffer diluted tenfold keeps its pH but loses capacity — the ratio is unchanged, the number of moles is not.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Designing a buffer to sit at a stated pH.</li></li><li><li>Checking an existing recipe before use.</li></li><li><li>Working out how far a buffer can be pushed before it stops buffering.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/henderson-hasselbalch">Henderson–Hasselbalch</a> <a href="/chemistry/pka">pKa</a> <a href="/chemistry/buffer-capacity">Buffer capacity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Buffer pH calculator work out?', 'a' => <<<'TXT'
            It returns pH of the buffer and base to acid ratio [A⁻] ÷ [HA] and hydrogen ion concentration from pKa of the weak acid and conjugate base concentration [A⁻] and weak acid concentration [HA]. The relationship is pKa of the weak acid+log₁₀(Conjugate base concentration [A⁻] ÷ Weak acid concentration [HA]).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            pKa of the weak acid, Conjugate base concentration [A⁻] (mol/L), Weak acid concentration [HA] (mol/L). Leave the result boxes alone unless one of them is the value you are solving for.
            TXT],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: conjugate base concentration [A⁻] in mol/L; weak acid concentration [HA] in mol/L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why does the pH equal the pKa when the concentrations are equal?', 'a' => 'Because the logarithm of 1 is zero. The Henderson–Hasselbalch equation then reduces to pH = pKa, which is the definition of the half-dissociation point.'],
            ['q' => 'Does diluting a buffer change its pH?', 'a' => <<<'TXT'
            Barely — the ratio of acid to base is unchanged, which is why buffers are diluted rather than reconstituted. The capacity does fall in proportion to the dilution.
            TXT],
        ],
        'related' => [
            ['path' => '/chemistry/henderson-hasselbalch', 'name' => 'Henderson–Hasselbalch'],
            ['path' => '/chemistry/pka', 'name' => 'pKa'],
            ['path' => '/chemistry/buffer-capacity', 'name' => 'Buffer capacity'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
