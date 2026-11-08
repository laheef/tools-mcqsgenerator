<?php

/**
 * Buffer Capacity Calculator
 * /chemistry/buffer-capacity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Buffer Capacity Calculator',
    'meta' => ['title' => 'Buffer Capacity Calculator: Moles per pH Unit', 'description' => 'Measure how much acid or base a buffer can absorb for each unit of pH change — the number that says whether a buffer is really doing its job well enough.', 'h1' => 'Buffer Capacity Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'moles_added',
                    'label' => 'Moles of strong acid or base added',
                    'type' => 'number',
                    'suffix' => 'mol',
                    'default' => '0.01',
                    'help' => 'The amount added to the buffer, per litre of it',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'ph_change',
                    'label' => 'pH change observed (ΔpH)',
                    'type' => 'number',
                    'default' => '0.05',
                    'help' => 'Final pH minus starting pH, as a positive number',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'volume',
                    'label' => 'Volume of buffer',
                    'type' => 'number',
                    'suffix' => 'L',
                    'default' => '1',
                    'help' => 'The volume the moles were added to',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'capacity',
                    'label' => 'Buffer capacity (β)',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/L',
                ],
                [
                    'name' => 'capacity_per_ph',
                    'label' => 'Capacity per pH unit',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mol/L per pH',
                ],
                [
                    'name' => 'moles_per_litre',
                    'label' => 'Moles added per litre of buffer',
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
            'title' => 'Buffer Capacity',
            'results' => [
                'capacity' => 'moles_added/volume/ph_change',
                'capacity_per_ph' => 'moles_added/volume/ph_change',
                'moles_per_litre' => 'moles_added/volume',
                'moles_added' => 'capacity*volume*ph_change',
                'ph_change' => 'moles_added/(capacity*volume)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Buffer capacity is the amount of strong base (or acid) a litre of buffer can absorb per unit change in pH: <strong>β = n ÷ ΔpH</strong>, in mol per litre per pH unit. It is the number that answers <em>how much abuse will this buffer take?</em></p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Capacity is what separates a buffer that works from a buffer that merely has the right pH. A 1 mmol/L buffer at pH 7.4 and a 100 mmol/L buffer at pH 7.4 read the same on a meter and behave nothing alike when a reaction produces acid.</p><p>The page reports <strong>buffer capacity (β) and capacity per pH unit and moles added per litre of buffer</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Buffer capacity (β)</strong></td><td><code>Moles of strong acid or base added ÷ Volume of buffer ÷ pH change observed (ΔpH)</code></td></tr><tr><td><strong>Capacity per pH unit</strong></td><td><code>Moles of strong acid or base added ÷ Volume of buffer ÷ pH change observed (ΔpH)</code></td></tr><tr><td><strong>Moles added per litre of buffer</strong></td><td><code>Moles of strong acid or base added ÷ Volume of buffer</code></td></tr><tr><td><strong>Moles of strong acid or base added</strong></td><td><code>Buffer capacity (β) × Volume of buffer × pH change observed (ΔpH)</code></td></tr><tr><td><strong>pH change observed (ΔpH)</strong></td><td><code>Moles of strong acid or base added ÷ (Buffer capacity (β) × Volume of buffer)</code></td></tr></tbody></table><p><p>Strictly, capacity is the differential dn/dpH and it peaks at the pKa. Measuring it over a small interval, as this page does, is the practical version: keep ΔpH below about 0.1 and the answer is close to the differential value.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports buffer capacity (β) and capacity per pH unit and moles added per litre of buffer.</p><ul><li><strong>Moles of strong acid or base added</strong> — in mol. The amount added to the buffer, per litre of it</li><li><strong>pH change observed (ΔpH)</strong>. Final pH minus starting pH, as a positive number</li><li><strong>Volume of buffer</strong> — in L. The volume the moles were added to</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Buffer capacity (β)</strong> — in mol/L</li><li><strong>Capacity per pH unit</strong> — in mol/L per pH</li><li><strong>Moles added per litre of buffer</strong> — in mol/L</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Moles of strong acid or base added = 0.01 mol, pH change observed (ΔpH) = 0.05, Volume of buffer = 1 L — and the results panel reads:</p><ul><li><strong>Buffer capacity (β)</strong> = <code>Moles of strong acid or base added ÷ Volume of buffer ÷ pH change observed (ΔpH)</code> = <strong>0.2 mol/L</strong></li><li><strong>Capacity per pH unit</strong> = <code>Moles of strong acid or base added ÷ Volume of buffer ÷ pH change observed (ΔpH)</code> = <strong>0.2 mol/L per pH</strong></li><li><strong>Moles added per litre of buffer</strong> = <code>Moles of strong acid or base added ÷ Volume of buffer</code> = <strong>0.01 mol/L</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.01 ÷ 1 ÷ 0.05 = 0.2</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>Adding 10 mmol of strong base to a litre of buffer raises the pH by 0.05, so the capacity is 10 ÷ 0.05 = 200 mmol per litre per pH unit. That is a strong, well-made buffer; below about 10 mmol/L per pH unit, the buffer is thin.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Interpret the capacity against the demand. A tissue-culture medium buffered with 25 mmol/L bicarbonate has a capacity of roughly 25 mmol per pH unit near its pKa, which is why it is kept in a 5 % CO₂ atmosphere. Capacity falls away as the buffer is used up, so the same measurement late in a reaction gives a lower number.</p></p><table class="calc-table"><thead><tr><th>Range</th><th>What it means</th></tr></thead><tbody><tr><td><strong>Above 100 mmol/L per pH</strong></td><td>Strong: suitable for a reaction that produces substantial acid.</td></tr><tr><td><strong>20–100 mmol/L per pH</strong></td><td>Typical: the range most biochemical buffers are designed for.</td></tr><tr><td><strong>Below 10 mmol/L per pH</strong></td><td>Thin: the pH will move noticeably under modest load.</td></tr></tbody></table>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Buffer capacity (β)</th><th>Capacity per pH unit</th><th>Moles added per litre of buffer</th></tr></thead><tbody><tr><td><strong>Moles of strong acid or base added</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>pH change observed (ΔpH)</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+0 %</td></tr><tr><td><strong>Volume of buffer</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>−9.09 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Moles of strong acid or base added</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>pH change observed (ΔpH)</strong>, at 9.1 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Moles of strong acid or base added = 0.001, pH change observed (ΔpH) = 0.02, Volume of buffer = 0.1, the page reports <strong>Buffer capacity (β)</strong> = 0.5 mol/L, <strong>Capacity per pH unit</strong> = 0.5 mol/L per pH, <strong>Moles added per litre of buffer</strong> = 0.01 mol/L. A small volume of a strong buffer: 10 mmol/L added to 100 mL over 0.02 pH units gives 0.5 mol per litre per pH unit.</li><li>With Moles of strong acid or base added = 0.05, pH change observed (ΔpH) = 0.5, Volume of buffer = 1, the page reports <strong>Buffer capacity (β)</strong> = 0.1 mol/L, <strong>Capacity per pH unit</strong> = 0.1 mol/L per pH, <strong>Moles added per litre of buffer</strong> = 0.05 mol/L. A weak buffer: 50 mmol moves the pH half a unit, so capacity is 0.1 mol per pH.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Moles added to the aliquot, not per litre.</strong> Adding 1 mmol to 100 mL is 10 mmol/L; entering the 1 makes the capacity ten times too small.</li><li><strong>ΔpH signed.</strong> Adding acid lowers the pH; use the magnitude, or the capacity comes out negative.</li><li><strong>A large ΔpH treated as a small one.</strong> Beyond about 0.2 units the relationship is no longer linear and the single division understates the true capacity.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Buffer capacity (β) (mol/L), Capacity per pH unit (mol/L per pH), Moles added per litre of buffer (mol/L).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Capacity is reported in mol/L per pH unit, sometimes written as equivalents per litre per pH unit. pH itself is a logarithm and carries no unit, so the capacity inherits the concentration's.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need moles of strong acid or base added and pH change observed (ΔpH) and volume of buffer. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Buffer capacity (β) and capacity per ph unit and moles added per litre of buffer should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Moles of strong acid or base added</strong> ×10</td><td>0.2</td><td>2</td><td>ten times larger</td></tr><tr><td><strong>pH change observed (ΔpH)</strong> ×10</td><td>0.2</td><td>0.02</td><td>ten times smaller</td></tr><tr><td><strong>Volume of buffer</strong> ×10</td><td>0.2</td><td>0.02</td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It is an empirical number.</strong> The result depends on the interval you measured over, the temperature and what else is dissolved in the buffer.</li><li><strong>It says nothing about the buffer's range.</strong> A high capacity two pH units from the pKa is a measurement of an exhausted buffer, not a good one.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Deciding whether a buffer is strong enough for a reaction that produces acid.</li></li><li><li>Comparing two buffer recipes at the same pH.</li></li><li><li>Estimating how much base a fermentation or a cell culture can absorb.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/buffer-ph">Buffer pH</a> <a href="/chemistry/pka">pKa</a> <a href="/chemistry/henderson-hasselbalch">Henderson–Hasselbalch</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Buffer Capacity calculator work out?', 'a' => <<<'TXT'
            It returns buffer capacity (β) and capacity per pH unit and moles added per litre of buffer from moles of strong acid or base added and pH change observed (ΔpH) and volume of buffer. The relationship is Moles of strong acid or base added ÷ Volume of buffer ÷ pH change observed (ΔpH).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Moles of strong acid or base added (mol), pH change observed (ΔpH), Volume of buffer (L). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: moles of strong acid or base added in mol; volume of buffer in L. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'What is a good buffer capacity?', 'a' => <<<'TXT'
            There is no universal number. It has to exceed the acid or base the system will produce, divided by the pH change you are willing to tolerate. 20–50 mmol per pH unit is a common working target.
            TXT],
            ['q' => 'Why does capacity peak at the pKa?', 'a' => 'Because that is where both the acid and its conjugate base are present in equal amounts, so either direction of disturbance finds something to react with.'],
        ],
        'related' => [
            ['path' => '/chemistry/buffer-ph', 'name' => 'Buffer pH'],
            ['path' => '/chemistry/pka', 'name' => 'pKa'],
            ['path' => '/chemistry/henderson-hasselbalch', 'name' => 'Henderson–Hasselbalch'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
