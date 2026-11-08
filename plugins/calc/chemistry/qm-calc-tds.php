<?php

/**
 * TDS Calculator
 * /chemistry/tds
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'TDS Calculator',
    'meta' => ['title' => 'TDS Calculator: From Electrical Conductivity', 'description' => 'Convert a water sample\'s electrical conductivity into total dissolved solids in milligrams per litre, using the conversion factor your water type calls for.', 'h1' => 'TDS Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'conductivity',
                    'label' => 'Electrical conductivity',
                    'type' => 'number',
                    'suffix' => 'µS/cm',
                    'default' => '500',
                    'help' => 'Measured at 25 °C, temperature-corrected',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'factor',
                    'label' => 'Conversion factor k',
                    'type' => 'number',
                    'default' => '0.64',
                    'help' => '0.55 for high-sodium water, 0.65 for mixed, 0.7 for chloride-rich',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'tds',
                    'label' => 'Total dissolved solids',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'mg/L',
                ],
                [
                    'name' => 'tds_g_per_l',
                    'label' => 'Total dissolved solids',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g/L',
                ],
                [
                    'name' => 'grains_per_gallon',
                    'label' => 'Hardness as grains per gallon',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'gpg',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'TDS',
            'results' => [
                'tds' => 'conductivity*factor',
                'tds_g_per_l' => 'conductivity*factor/1000',
                'grains_per_gallon' => 'conductivity*factor/17.118',
                'conductivity' => 'tds/factor',
                'factor' => 'tds/conductivity',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Dissolved ions conduct electricity, so conductivity is a proxy for total dissolved solids: <strong>TDS = k × EC</strong>, with EC in microsiemens per centimetre and k between about 0.5 and 0.7 depending on the water's chemistry.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Conductivity is cheap, instant and continuous, which is why nearly every water treatment plant logs it. TDS is what the specification is written in, so the conversion between them is a number a plant uses every shift.</p><p>The page reports <strong>total dissolved solids (mg/L) and total dissolved solids (g/L) and hardness as grains per gallon</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Total dissolved solids (mg per L)</strong></td><td><code>Electrical conductivity × Conversion factor k</code></td></tr><tr><td><strong>Total dissolved solids (g per L)</strong></td><td><code>Electrical conductivity × Conversion factor k ÷ 1000</code></td></tr><tr><td><strong>Hardness as grains per gallon</strong></td><td><code>Electrical conductivity × Conversion factor k ÷ 17.118</code></td></tr><tr><td><strong>Electrical conductivity</strong></td><td><code>Total dissolved solids (mg per L) ÷ Conversion factor k</code></td></tr><tr><td><strong>Conversion factor k</strong></td><td><code>Total dissolved solids (mg per L) ÷ Electrical conductivity</code></td></tr></tbody></table><p><p>The factor is not a constant of nature: it depends on which ions carry the current. Sodium and chloride are poor conductors per milligram, calcium and sulfate are better, so the same conductivity can mean a different mass of dissolved solids. That is why the box lets you set it.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports total dissolved solids (mg/L) and total dissolved solids (g/L) and hardness as grains per gallon.</p><ul><li><strong>Electrical conductivity</strong> — in µS/cm. Measured at 25 °C, temperature-corrected</li><li><strong>Conversion factor k</strong>. 0.55 for high-sodium water, 0.65 for mixed, 0.7 for chloride-rich</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Total dissolved solids</strong> — in mg/L</li><li><strong>Total dissolved solids</strong> — in g/L</li><li><strong>Hardness as grains per gallon</strong> — in gpg</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Electrical conductivity = 500 µS/cm, Conversion factor k = 0.64 — and the results panel reads:</p><ul><li><strong>Total dissolved solids</strong> = <code>Electrical conductivity × Conversion factor k</code> = <strong>320 mg/L</strong></li><li><strong>Total dissolved solids</strong> = <code>Electrical conductivity × Conversion factor k ÷ 1000</code> = <strong>0.32 g/L</strong></li><li><strong>Hardness as grains per gallon</strong> = <code>Electrical conductivity × Conversion factor k ÷ 17.118</code> = <strong>18.694 gpg</strong></li></ul><p>With the numbers written into the formula, the first result is <code>500 × 0.64 = 320</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>500 µS/cm at 0.65 is 325 mg/L. Drinking water is usually held under 500 mg/L, seawater is around 35 000, and irrigation guidelines sit near 1 000 for sensitive crops.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>For a first estimate use 0.5 to 0.55 for water dominated by sodium chloride, and 0.65 to 0.7 where calcium and magnesium sulfates dominate. For most municipal supplies 0.65 is close enough to keep a plant inside its specification.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Total dissolved solids</th><th>Total dissolved solids</th><th>Hardness as grains per gallon</th></tr></thead><tbody><tr><td><strong>Electrical conductivity</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Conversion factor k</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Conversion factor k</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Electrical conductivity</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Electrical conductivity = 2 000, Conversion factor k = 0.55, the page reports <strong>Total dissolved solids</strong> = 1 100 mg/L, <strong>Total dissolved solids</strong> = 1.1 g/L, <strong>Hardness as grains per gallon</strong> = 64.26 gpg. Brackish, sodium-rich water: 1 100 mg/L, not the 1 300 a 0.65 factor would suggest.</li><li>With Electrical conductivity = 342, Conversion factor k = 0.65, the page reports <strong>Total dissolved solids</strong> = 222.3 mg/L, <strong>Total dissolved solids</strong> = 0.222 g/L, <strong>Hardness as grains per gallon</strong> = 12.986 gpg. A clean municipal supply reads about 222 mg/L — well inside the 500 mg/L guideline.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The factor used as a constant.</strong> A plant that changes its raw water source without re-deriving k reports the wrong TDS.</li><li><strong>Temperature uncorrected.</strong> Conductivity rises about 2 per cent per degree; an uncorrected 30 °C reading overstates TDS by around a tenth.</li><li><strong>TDS treated as salinity.</strong> Conductivity sees only charged species, so uncharged dissolved organics and silica are invisible to it.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Total dissolved solids (mg/L), Total dissolved solids (g/L), Hardness as grains per gallon (gpg).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Microsiemens per centimetre times a dimensionless factor gives milligrams per litre, which is numerically the same as parts per million in water this dilute. The third result converts to grains per gallon, the unit US water softeners are sold in.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need electrical conductivity and conversion factor k. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Total dissolved solids (mg/l) and total dissolved solids (g/l) and hardness as grains per gallon should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Electrical conductivity</strong> ×10</td><td>320</td><td>3 200</td><td>ten times larger</td></tr><tr><td><strong>Conversion factor k</strong> ×10</td><td>320</td><td>3 200</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It cannot see non-conductors.</strong> Sugars, alcohols and many organics dissolve without adding TDS by this method.</li><li><strong>It over-reads at high concentration.</strong> Above about 10 000 mg/L the relation between conductivity and mass bends.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Estimating TDS from a conductivity meter reading.</li></li><li><li>Setting a softener's regeneration schedule.</li></li><li><li>Checking irrigation water against a crop's tolerance.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/water-hardness">Water hardness</a> <a href="/chemistry/chemical-oxygen-demand">COD</a> <a href="/chemistry/ppm-to-molarity">PPM to molarity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the TDS calculator work out?', 'a' => <<<'TXT'
            It returns total dissolved solids (mg/L) and total dissolved solids (g/L) and hardness as grains per gallon from electrical conductivity and conversion factor k. The relationship is Electrical conductivity × Conversion factor k.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Electrical conductivity (µS/cm), Conversion factor k. The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: electrical conductivity in µS/cm. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Is TDS the same as salinity?', 'a' => <<<'TXT'
            No. Salinity is a measure of dissolved salts specifically, while TDS counts every dissolved solid the conductivity sees. For seawater the two are close; for a sugary drink they are not.
            TXT],
            ['q' => 'Why does my meter read TDS directly?', 'a' => 'Because it is a conductivity meter with this multiplication built in, and it uses a fixed factor. If your water is unusual, the lab\'s own factor is better.'],
        ],
        'related' => [
            ['path' => '/chemistry/water-hardness', 'name' => 'Water hardness'],
            ['path' => '/chemistry/chemical-oxygen-demand', 'name' => 'COD'],
            ['path' => '/chemistry/ppm-to-molarity', 'name' => 'PPM to molarity'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
