<?php

/**
 * Hydraulic retention time
 * /chemistry/hydraulic-retention-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hydraulic retention time',
    'meta' => ['title' => 'Hydraulic Retention Time Calculator: With Recycle', 'description' => 'Find the hydraulic retention time of an aeration tank once the sludge return is taken into account, with the effective flow, the hours and the days all shown.', 'h1' => 'Hydraulic retention time', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'volume',
                    'label' => 'Aeration tank volume',
                    'type' => 'number',
                    'suffix' => 'm³',
                    'default' => '2000',
                    'help' => 'The working volume of the biological tank',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'influent_flow',
                    'label' => 'Influent flow',
                    'type' => 'number',
                    'suffix' => 'm³/d',
                    'default' => '10000',
                    'help' => 'The wastewater entering the works',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'recycle_ratio',
                    'label' => 'Return sludge ratio',
                    'type' => 'number',
                    'default' => '0.5',
                    'help' => '0.5 means half the influent flow is returned',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'effective_flow',
                    'label' => 'Flow through the tank',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm³/d',
                ],
                [
                    'name' => 'hrt_hours',
                    'label' => 'Hydraulic retention time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'h',
                ],
                [
                    'name' => 'hrt_days',
                    'label' => 'Hydraulic retention time',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'd',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Hydraulic retention time',
            'results' => [
                'effective_flow' => 'influent_flow*(1+recycle_ratio)',
                'hrt_hours' => 'volume/(influent_flow*(1+recycle_ratio))*24',
                'hrt_days' => 'volume/(influent_flow*(1+recycle_ratio))',
                'volume' => 'influent_flow*(1+recycle_ratio)*hrt_days',
                'influent_flow' => 'volume/((1+recycle_ratio)*hrt_days)',
                'recycle_ratio' => 'volume/(influent_flow*hrt_days)-1',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>In an activated-sludge tank the water does not leave at the influent flow alone — the return sludge adds to it: <strong>HRT = V ÷ (Q·(1 + R))</strong>, with R the recycle ratio.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Hydraulic retention time is how long the water spends in the aeration tank, and it is different from sludge age, which is how long the organisms do. HRT decides whether the tank is big enough for the flow; sludge age decides whether the biology can nitrify.</p><p>The page reports <strong>flow through the tank and hydraulic retention time (h) and hydraulic retention time (d)</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Flow through the tank</strong></td><td><code>Influent flow × (1+Return sludge ratio)</code></td></tr><tr><td><strong>Hydraulic retention time (h)</strong></td><td><code>Aeration tank volume ÷ (Influent flow × (1+Return sludge ratio)) × 24</code></td></tr><tr><td><strong>Hydraulic retention time (d)</strong></td><td><code>Aeration tank volume ÷ (Influent flow × (1+Return sludge ratio))</code></td></tr><tr><td><strong>Aeration tank volume</strong></td><td><code>Influent flow × (1+Return sludge ratio) × Hydraulic retention time (d)</code></td></tr><tr><td><strong>Influent flow</strong></td><td><code>Aeration tank volume ÷ ((1+Return sludge ratio) × Hydraulic retention time (d))</code></td></tr><tr><td><strong>Return sludge ratio</strong></td><td><code>Aeration tank volume ÷ (Influent flow × Hydraulic retention time (d))-1</code></td></tr></tbody></table><p><p>The recycle adds its own flow to the tank's throughput, so the effective flow is the influent multiplied by one plus the ratio. A recycle of 0.5 raises the flow by half, which shortens the retention time by a third.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports flow through the tank and hydraulic retention time (h) and hydraulic retention time (d).</p><ul><li><strong>Aeration tank volume</strong> — in m³. The working volume of the biological tank</li><li><strong>Influent flow</strong> — in m³/d. The wastewater entering the works</li><li><strong>Return sludge ratio</strong>. 0.5 means half the influent flow is returned</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Flow through the tank</strong> — in m³/d</li><li><strong>Hydraulic retention time</strong> — in h</li><li><strong>Hydraulic retention time</strong> — in d</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Aeration tank volume = 2 000 m³, Influent flow = 10 000 m³/d, Return sludge ratio = 0.5 — and the results panel reads:</p><ul><li><strong>Flow through the tank</strong> = <code>Influent flow × (1+Return sludge ratio)</code> = <strong>15 000 m³/d</strong></li><li><strong>Hydraulic retention time</strong> = <code>Aeration tank volume ÷ (Influent flow × (1+Return sludge ratio)) × 24</code> = <strong>3.2 h</strong></li><li><strong>Hydraulic retention time</strong> = <code>Aeration tank volume ÷ (Influent flow × (1+Return sludge ratio))</code> = <strong>0.133 d</strong></li></ul><p>With the numbers written into the formula, the first result is <code>10 000 × (1+0.5) = 15 000</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>2 000 m³ of aeration volume at 10 000 m³ a day with a recycle ratio of 0.5: the tank sees 15 000 m³ a day, so HRT is 0.133 days — 3.2 hours. At a recycle of 1.0 the same tank falls to 2.4 hours.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Municipal activated sludge usually runs between 4 and 8 hours of HRT; a high-rate plant can go below 2. Short HRT with a long sludge age is possible precisely because the recycle keeps the biomass in the tank.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Flow through the tank</th><th>Hydraulic retention time</th><th>Hydraulic retention time</th></tr></thead><tbody><tr><td><strong>Aeration tank volume</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Influent flow</strong> +10 %</td><td>+10 %</td><td>−9.09 %</td><td>−9.09 %</td></tr><tr><td><strong>Return sludge ratio</strong> +10 %</td><td>+3.33 %</td><td>−3.23 %</td><td>−3.23 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Aeration tank volume</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Return sludge ratio</strong>, at 3.3 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Aeration tank volume = 3 000, Influent flow = 12 000, Return sludge ratio = 1, the page reports <strong>Flow through the tank</strong> = 24 000 m³/d, <strong>Hydraulic retention time</strong> = 3 h, <strong>Hydraulic retention time</strong> = 0.125 d. A full recycle doubles the flow: 24 000 m³ a day, 3 hours of HRT.</li><li>With Aeration tank volume = 4 000, Influent flow = 8 000, Return sludge ratio = 0, the page reports <strong>Flow through the tank</strong> = 8 000 m³/d, <strong>Hydraulic retention time</strong> = 12 h, <strong>Hydraulic retention time</strong> = 0.5 d. No recycle at all: HRT is 12 hours, the plain volume-over-flow case.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Recycle left out.</strong> Using influent flow alone overstates the retention time and the tank looks bigger than it is.</li><li><strong>HRT confused with sludge age.</strong> They differ by the ratio of solids to suspended solids in the effluent and can be an order of magnitude apart.</li><li><strong>Peak flow ignored.</strong> At storm flow the HRT collapses, and that is when solids wash out.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Flow through the tank (m³/d), Hydraulic retention time (h), Hydraulic retention time (d).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>The volume is in cubic metres and the flow in cubic metres per day, so the retention time is in days and the page shows it in hours as well. The recycle ratio is a plain fraction and carries no units.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need aeration tank volume and influent flow and return sludge ratio. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Flow through the tank and hydraulic retention time (h) and hydraulic retention time (d) should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Aeration tank volume</strong> ×10</td><td>15 000</td><td>15 000</td><td>unchanged</td></tr><tr><td><strong>Influent flow</strong> ×10</td><td>15 000</td><td>150 000</td><td>ten times larger</td></tr><tr><td><strong>Return sludge ratio</strong> ×10</td><td>15 000</td><td>60 000</td><td>×4</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It assumes complete mixing.</strong> Real tanks short-circuit and the actual time for some of the water is shorter.</li><li><strong>It ignores the clarifier.</strong> The return sludge's own travel time is not included.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Sizing an aeration tank.</li></li><li><li>Checking a plant's HRT at its design flow.</li></li><li><li>Seeing how much the recycle ratio shortens the retention time.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/detention-time">Detention time</a> <a href="/chemistry/hydraulic-retention-time">Hydraulic retention time</a> <a href="/chemistry/dilution-factor">Dilution factor</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Hydraulic retention time calculator work out?', 'a' => <<<'TXT'
            It returns flow through the tank and hydraulic retention time (h) and hydraulic retention time (d) from aeration tank volume and influent flow and return sludge ratio. The relationship is Influent flow × (1+Return sludge ratio).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Aeration tank volume (m³), Influent flow (m³/d), Return sludge ratio. Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: aeration tank volume in m³; influent flow in m³/d. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How is HRT different from SRT?', 'a' => 'HRT is how long the water stays; solids retention time is how long the sludge stays. A plant can have a 6-hour HRT and a 15-day SRT.'],
            ['q' => 'Does recycle really shorten the retention time?', 'a' => 'Yes — the same water passes through the tank more than once per day, so the flow through the tank is higher than the influent flow.'],
        ],
        'related' => [
            ['path' => '/chemistry/detention-time', 'name' => 'Detention time'],
            ['path' => '/chemistry/hydraulic-retention-time', 'name' => 'Hydraulic retention time'],
            ['path' => '/chemistry/dilution-factor', 'name' => 'Dilution factor'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
