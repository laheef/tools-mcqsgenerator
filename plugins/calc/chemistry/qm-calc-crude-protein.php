<?php

/**
 * Crude Protein Calculator
 * /chemistry/crude-protein
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Crude Protein Calculator',
    'meta' => ['title' => 'Crude Protein Calculator: Kjeldahl Nitrogen', 'description' => 'Convert a Kjeldahl nitrogen percentage into crude protein with the standard conversion factor, and see the nitrogen mass that sits behind the declared figure.', 'h1' => 'Crude Protein Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'nitrogen_percent',
                    'label' => 'Nitrogen by mass',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '3.2',
                    'help' => 'From a Kjeldahl or Dumas determination',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'factor',
                    'label' => 'Conversion factor',
                    'type' => 'number',
                    'default' => '6.25',
                    'help' => '6.25 for food and feed; 5.7 for wheat, 6.38 for milk',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'sample_mass',
                    'label' => 'Sample mass',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '100',
                    'help' => 'The portion the percentages refer to',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'protein_percent',
                    'label' => 'Crude protein',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => '%',
                ],
                [
                    'name' => 'protein_mass',
                    'label' => 'Protein in the sample',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
                [
                    'name' => 'nitrogen_mass',
                    'label' => 'Nitrogen in the sample',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'g',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Crude Protein',
            'results' => [
                'protein_percent' => 'nitrogen_percent*factor',
                'protein_mass' => 'sample_mass*nitrogen_percent*factor/100',
                'nitrogen_mass' => 'sample_mass*nitrogen_percent/100',
                'nitrogen_percent' => 'protein_percent/factor',
                'factor' => 'protein_percent/nitrogen_percent',
                'sample_mass' => 'protein_mass*100/(nitrogen_percent*factor)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Crude protein is nitrogen multiplied by a factor that assumes a protein is about 16 per cent nitrogen: <strong>% protein = % N × 6.25</strong>. The page also reports the nitrogen and protein masses in a sample of the size you specify.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>Protein is expensive, so its declared content is regulated. The Kjeldahl method measures nitrogen and multiplies — which is why the figure is called crude: it counts the nitrogen in nucleic acids, urea and anything else as if it were protein.</p><p>The page reports <strong>crude protein and protein in the sample and nitrogen in the sample</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Crude protein</strong></td><td><code>Nitrogen by mass × Conversion factor</code></td></tr><tr><td><strong>Protein in the sample</strong></td><td><code>Sample mass × Nitrogen by mass × Conversion factor ÷ 100</code></td></tr><tr><td><strong>Nitrogen in the sample</strong></td><td><code>Sample mass × Nitrogen by mass ÷ 100</code></td></tr><tr><td><strong>Nitrogen by mass</strong></td><td><code>Crude protein ÷ Conversion factor</code></td></tr><tr><td><strong>Conversion factor</strong></td><td><code>Crude protein ÷ Nitrogen by mass</code></td></tr><tr><td><strong>Sample mass</strong></td><td><code>Protein in the sample × 100 ÷ (Nitrogen by mass × Conversion factor)</code></td></tr></tbody></table><p><p>The factor is the reciprocal of the nitrogen fraction: 16 per cent gives 6.25. Because different proteins have different nitrogen contents, the factor is chosen for the material — 5.7 for wheat, 6.25 for meat and feed, 6.38 for dairy.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports crude protein and protein in the sample and nitrogen in the sample.</p><ul><li><strong>Nitrogen by mass</strong> — in %. From a Kjeldahl or Dumas determination</li><li><strong>Conversion factor</strong>. 6.25 for food and feed; 5.7 for wheat, 6.38 for milk</li><li><strong>Sample mass</strong> — in g. The portion the percentages refer to</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Crude protein</strong> — in %</li><li><strong>Protein in the sample</strong> — in g</li><li><strong>Nitrogen in the sample</strong> — in g</li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Nitrogen by mass = 3.2 %, Conversion factor = 6.25, Sample mass = 100 g — and the results panel reads:</p><ul><li><strong>Crude protein</strong> = <code>Nitrogen by mass × Conversion factor</code> = <strong>20 %</strong></li><li><strong>Protein in the sample</strong> = <code>Sample mass × Nitrogen by mass × Conversion factor ÷ 100</code> = <strong>20 g</strong></li><li><strong>Nitrogen in the sample</strong> = <code>Sample mass × Nitrogen by mass ÷ 100</code> = <strong>3.2 g</strong></li></ul><p>With the numbers written into the formula, the first result is <code>3.2 × 6.25 = 20</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>3.2 per cent nitrogen times 6.25 is 20 per cent crude protein, which in a 100 g sample is 20 g of protein and 3.2 g of nitrogen. A feed labelled 20 per cent protein is making exactly that claim.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Compare the protein figure with the feed's other components: percentages should sum to a hundred with fat, fibre, ash and moisture. A figure that leaves no room for the rest means the nitrogen was overstated.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Crude protein</th><th>Protein in the sample</th><th>Nitrogen in the sample</th></tr></thead><tbody><tr><td><strong>Nitrogen by mass</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td></tr><tr><td><strong>Conversion factor</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+0 %</td></tr><tr><td><strong>Sample mass</strong> +10 %</td><td>+0 %</td><td>+10 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Nitrogen by mass</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Sample mass</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Nitrogen by mass = 5, Conversion factor = 5.7, Sample mass = 100, the page reports <strong>Crude protein</strong> = 28.5 %, <strong>Protein in the sample</strong> = 28.5 g, <strong>Nitrogen in the sample</strong> = 5 g. Wheat at 5.0 per cent nitrogen gives 28.5 per cent protein with the 5.7 factor. Using 6.25 would overstate it by 3 points.</li><li>With Nitrogen by mass = 0.52, Conversion factor = 6.38, Sample mass = 250, the page reports <strong>Crude protein</strong> = 3.318 %, <strong>Protein in the sample</strong> = 8.294 g, <strong>Nitrogen in the sample</strong> = 1.3 g. Milk at 0.52 per cent nitrogen and the dairy factor is 3.3 per cent — its protein content, not its solids.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The wrong factor.</strong> Using 6.25 for wheat overstates protein by about 10 per cent.</li><li><strong>Crude read as true protein.</strong> Non-protein nitrogen is counted, which matters in silage and in adulterated samples — melamine was added to milk precisely because it is nitrogen-rich.</li><li><strong>Nitrogen reported on a dry basis and used wet.</strong> Check which basis the laboratory used before comparing with a specification.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Crude protein (%), Protein in the sample (g), Nitrogen in the sample (g).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Percentages are by mass and the sample is in grams, so the masses come back in grams. The factor is dimensionless and differs by product — it is a field, not a constant.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need nitrogen by mass and conversion factor and sample mass. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Crude protein and protein in the sample and nitrogen in the sample should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Nitrogen by mass</strong> ×10</td><td>20</td><td>200</td><td>ten times larger</td></tr><tr><td><strong>Conversion factor</strong> ×10</td><td>20</td><td>200</td><td>ten times larger</td></tr><tr><td><strong>Sample mass</strong> ×10</td><td>20</td><td>20</td><td>unchanged</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It measures nitrogen, not protein.</strong> Any other nitrogen source inflates the result.</li><li><strong>It assumes a nitrogen content.</strong> A protein with an unusual amino acid composition needs its own factor.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Converting a Kjeldahl result into a declared protein figure.</li></li><li><li>Checking a feed label against a laboratory certificate.</li></li><li><li>Sizing a ration from a feed's protein content.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/percent-composition">Percent composition</a> <a href="/chemistry/molar-mass">Molar mass</a> <a href="/chemistry/enzyme-activity">Enzyme activity</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Crude Protein calculator work out?', 'a' => <<<'TXT'
            It returns crude protein and protein in the sample and nitrogen in the sample from nitrogen by mass and conversion factor and sample mass. The relationship is Nitrogen by mass × Conversion factor.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Nitrogen by mass (%), Conversion factor, Sample mass (g). The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: nitrogen by mass in %; sample mass in g. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why is it called crude protein?', 'a' => 'Because it is nitrogen times a factor, not a measurement of protein. Non-protein nitrogen counts as protein under this calculation.'],
            ['q' => 'Which factor should I use?', 'a' => '6.25 unless the regulation for that product says otherwise: 5.7 for wheat and cereals, 5.95 for rice, 6.38 for dairy.'],
        ],
        'related' => [
            ['path' => '/chemistry/percent-composition', 'name' => 'Percent composition'],
            ['path' => '/chemistry/molar-mass', 'name' => 'Molar mass'],
            ['path' => '/chemistry/enzyme-activity', 'name' => 'Enzyme activity'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
