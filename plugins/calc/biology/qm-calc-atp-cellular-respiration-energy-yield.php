<?php

/**
 * ATP / Cellular Respiration Energy Yield Calculator
 * /biology/atp-cellular-respiration-energy-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'ATP / Cellular Respiration Energy Yield Calculator',
    'meta' => ['title' => 'ATP / Cellular Respiration Energy Yield Calculator', 'description' => <<<'TXT'
    ATP / Cellular Respiration Energy Yield works out Total ATP and Energy captured from Fuel, NADH produced and FADH₂ produced. Total ATP and Energy captured are…
    TXT, 'h1' => 'ATP / Cellular Respiration Energy Yield Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'fuel',
                            'label' => 'Fuel',
                            'type' => 'select',
                            'options' => [
                                'Glucose (aerobic)' => '1',
                                'Glucose (anaerobic)' => '2',
                                'Palmitate (C16)' => '3',
                                'Lactate' => '4',
                                'Glutamate' => '5',
                            ],
                            'control' => 'SELECT',
                            'default' => 'Glucose (aerobic)',
                        ],
                        [
                            'name' => 'nadh',
                            'label' => 'NADH produced',
                            'type' => 'number',
                            'help' => 'From glycolysis, pyruvate oxidation and the cycle',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'fadh2',
                            'label' => 'FADH₂ produced',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                        [
                            'name' => 'atp_sub',
                            'label' => 'ATP (or GTP) made directly',
                            'type' => 'number',
                            'help' => 'Substrate-level phosphorylation',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4',
                        ],
                        [
                            'name' => 'atp_total',
                            'label' => 'Total ATP',
                            'type' => 'number',
                            'suffix' => 'ATP',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'energy',
                            'label' => 'Energy captured',
                            'type' => 'number',
                            'suffix' => 'kJ/mol',
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
            'title' => 'Yield',
            'results' => ['atp_total' => 'if_else(fuel==2, atp_sub*2, atp_sub+nadh*2.5+fadh2*1.5)', 'energy' => '(atp_sub+nadh*2.5+fadh2*1.5)*30.5'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        ATP / Cellular Respiration Energy Yield works out Total ATP and Energy captured from Fuel, NADH produced and FADH₂ produced. There is no hidden constant here: change Total ATP and Fuel moves with it. The main result, Total ATP, is reported in ATP.
        TXT,
        'sections' => [
            ['title' => 'How the ATP / Cellular Respiration Energy Yield calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind ATP / Cellular Respiration Energy Yield: it takes 4 numbers and reports Total ATP and Energy captured.</p><p>The relationship it solves reads Total ATP = if_else(Fuel==2, ATP (or GTP) made directly × 2, ATP (or GTP) made directly + NADH produced × 2.5 + FADH₂ produced × 1.5).</p><p>The answers are Total ATP and Energy captured; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 4 boxes, and nothing else.</p><ul><li><strong>Fuel</strong> — a plain number, no unit</li><li><strong>NADH produced</strong> — a plain number, no unit. From glycolysis, pyruvate oxidation and the cycle</li><li><strong>FADH₂ produced</strong> — a plain number, no unit</li><li><strong>ATP (or GTP) made directly</strong> — a plain number, no unit. Substrate-level phosphorylation</li></ul><p>What you get back is Total ATP in ATP, Energy captured in kJ/mol, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Fuel = 1, NADH produced = 10, FADH₂ produced = 2 and ATP (or GTP) made directly = 4 gives &lt;strong&gt;Total ATP&lt;/strong&gt; = 32 ATP and &lt;strong&gt;Energy captured&lt;/strong&gt; = 976 kJ/mol.</p><ul><li><strong>Total ATP</strong> = 32 ATP</li><li><strong>Energy captured</strong> = 976 kJ/mol</li></ul><p>The line behind those figures is <strong>Total ATP</strong> = <code>if_else(Fuel==2, ATP (or GTP) made directly × 2, ATP (or GTP) made directly + NADH produced × 2.5 + FADH₂ produced × 1.5)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Total ATP&lt;/strong&gt; = 32 and &lt;strong&gt;Energy captured&lt;/strong&gt; = 976. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Total ATP is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total ATP</strong> = <code>if_else(Fuel==2, ATP (or GTP) made directly × 2, ATP (or GTP) made directly + NADH produced × 2.5 + FADH₂ produced × 1.5)</code></li><li><strong>Energy captured</strong> = <code>(ATP (or GTP) made directly + NADH produced × 2.5 + FADH₂ produced × 1.5) × 30.5</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total ATP</strong> = <code>if_else(Fuel==2, ATP (or GTP) made directly × 2, ATP (or GTP) made directly + NADH produced × 2.5 + FADH₂ produced × 1.5)</code> — the form to use when Fuel, ATP (or GTP) made directly, NADH produced and FADH₂ produced are the values you have.</li><li><strong>Energy captured</strong> = <code>(ATP (or GTP) made directly + NADH produced × 2.5 + FADH₂ produced × 1.5) × 30.5</code> — the form to use when ATP (or GTP) made directly, NADH produced and FADH₂ produced are the values you have.</li></ul><p>Any one of Total ATP and Energy captured can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Fuel from 1 to 2, leaving every other box alone. The panel moves from &lt;strong&gt;Total ATP&lt;/strong&gt; 32 ATP and &lt;strong&gt;Energy captured&lt;/strong&gt; 976 kJ/mol to &lt;strong&gt;Total ATP&lt;/strong&gt; 8 ATP and &lt;strong&gt;Energy captured&lt;/strong&gt; 976 kJ/mol.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Total ATP and Energy captured are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Fuel left as a guess.</strong> Anything typed into Fuel is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>NADH produced left as a guess.</strong> Anything typed into NADH produced is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>FADH₂ produced left as a guess.</strong> Anything typed into FADH₂ produced is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Fuel is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the ATP / Cellular Respiration Energy Yield form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Fuel</strong> takes a plain number with no unit attached. Change it and Total ATP changes with it. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Fuel is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>NADH produced</strong> takes a plain number with no unit attached. From glycolysis, pyruvate oxidation and the cycle. Change it and Total ATP and Energy captured changes with it. Fill it from a measurement rather than a memory — NADH produced is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>FADH₂ produced</strong> takes a plain number with no unit attached. Change it and Total ATP and Energy captured changes with it. Fill it from a measurement rather than a memory — FADH₂ produced is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>ATP (or GTP) made directly</strong> takes a plain number with no unit attached. Substrate-level phosphorylation. Change it and Total ATP and Energy captured changes with it. Fill it from a measurement rather than a memory — ATP (or GTP) made directly is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 2 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Total ATP</strong> is a plain number and the page's own defaults put it at 32. The value follows from Fuel, ATP (or GTP) made directly, NADH produced and FADH₂ produced. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Energy captured</strong> is a plain number and the page's own defaults put it at 976. The value follows from ATP (or GTP) made directly, NADH produced and FADH₂ produced. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Total ATP</th><th>Energy captured</th></tr></thead><tbody><tr><td><strong>Fuel</strong> +10%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>NADH produced</strong> +10%</td><td>+7.81%</td><td>+7.81%</td></tr><tr><td><strong>FADH₂ produced</strong> +10%</td><td>+0.94%</td><td>+0.94%</td></tr><tr><td><strong>ATP (or GTP) made directly</strong> +10%</td><td>+1.25%</td><td>+1.25%</td></tr></tbody></table><p>The steepest column belongs to NADH produced: ten per cent there moves an answer by about 7.8 per cent, which is why that is the number to measure twice. By contrast, Fuel barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Fuel = 0.5, NADH produced = 5, FADH₂ produced = 1 and ATP (or GTP) made directly = 2 and the page reports <strong>Total ATP</strong> = 16 ATP and <strong>Energy captured</strong> = 488 kJ/mol.</li><li>Feed in Fuel = 3, NADH produced = 10, FADH₂ produced = 2 and ATP (or GTP) made directly = 4 and the page reports <strong>Total ATP</strong> = 32 ATP and <strong>Energy captured</strong> = 976 kJ/mol.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Total ATP is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Fuel, NADH produced and FADH₂ produced is what you already know and Total ATP and Energy captured is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/protein-gravy-calculator">Protein GRAVY (Hydropathy) Calculator</a>, <a href="/biology/protein-hydrodynamic-radius">Protein Hydrodynamic Radius Calculator</a> and <a href="/biology/protein-isoelectric-point">Protein Isoelectric Point Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the ATP / Cellular Respiration Energy Yield calculator work out?', 'a' => <<<'TXT'
            Total ATP and Energy captured, from Fuel, ATP (or GTP) made directly, NADH produced and FADH₂ produced. The relationship is Total ATP = if_else(Fuel==2, ATP (or GTP) made directly × 2, ATP (or GTP) made directly + NADH produced × 2.5 + FADH₂ produced × 1.5).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Fuel, NADH produced, FADH₂ produced, ATP (or GTP) made directly. Enter fuel, nadh and fadh2; Total ATP is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Total ATP and Energy captured blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Total ATP = 32 ATP and Energy captured = 976 kJ/mol. That comes from the page's own defaults, entered in Fuel; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Total ATP is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Fuel blank and the page solves for it, reporting Total ATP instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Total ATP at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/biology/protein-gravy-calculator', 'name' => 'Protein GRAVY (Hydropathy) Calculator'],
            ['path' => '/biology/protein-hydrodynamic-radius', 'name' => 'Protein Hydrodynamic Radius Calculator'],
            ['path' => '/biology/protein-isoelectric-point', 'name' => 'Protein Isoelectric Point Calculator'],
        ],
        'authors' => [],
    ],
];
