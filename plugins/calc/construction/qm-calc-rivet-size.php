<?php

/**
 * Rivet size
 * /construction/rivet-size
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Rivet size',
    'meta' => ['title' => 'Rivet Size Calculator: Diameter, Edge and Pitch', 'description' => 'Pick a rivet diameter from the plate thickness, with the edge distance and rivet pitch that go with it for a sound joint. The formula and units are shown.', 'h1' => 'Rivet size', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'thickness',
                    'label' => 'Plate thickness',
                    'type' => 'number',
                    'suffix' => 'in',
                    'default' => '0.125',
                    'help' => 'Thinner sheet of the joint',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rivet_factor',
                    'label' => 'Diameter factor',
                    'type' => 'number',
                    'default' => '1.2',
                    'help' => 'One point two for a standard joint',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'rivet_diameter',
                    'label' => 'Rivet diameter',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'edge_distance',
                    'label' => 'Edge distance',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'pitch',
                    'label' => 'Rivet pitch',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'in',
                ],
                [
                    'name' => 'rivets_per_ft',
                    'label' => 'Rivets per foot',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Rivet size',
            'results' => [
                'rivet_diameter' => 'rivet_factor*sqrt(thickness)',
                'edge_distance' => '2*rivet_factor*sqrt(thickness)',
                'pitch' => '3*rivet_factor*sqrt(thickness)',
                'rivets_per_ft' => '12/(3*rivet_factor*sqrt(thickness))+1',
                'thickness' => 'pow(rivet_diameter/rivet_factor,2)',
                'rivet_factor' => 'rivet_diameter/sqrt(thickness)',
            ],
        ],
    ],
    'article' => [
        'intro' => '<p><strong>Rivet diameter = 1.2 × √thickness</strong>; edge distance is twice the diameter and pitch three times.</p>',
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>A rivet that is too small for the plate tears out; one that is too large needs a punch the sheet cannot take without distorting. The rule that links the two is that the rivet diameter should be a little larger than the square root of the plate thickness.</p><p>The page reports <strong>rivet diameter and edge distance and rivet pitch and rivets per foot</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, so the working can be followed from whichever quantity you already have.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what you need when the quantity you already know is not the one this page reports.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Rivet diameter</strong></td><td><code>Diameter factor × √(Plate thickness)</code></td></tr><tr><td><strong>Edge distance</strong></td><td><code>2 × Diameter factor × √(Plate thickness)</code></td></tr><tr><td><strong>Rivet pitch</strong></td><td><code>3 × Diameter factor × √(Plate thickness)</code></td></tr><tr><td><strong>Rivets per foot</strong></td><td><code>12 ÷ (3 × Diameter factor × √(Plate thickness))+1</code></td></tr><tr><td><strong>Plate thickness</strong></td><td><code>(Rivet diameter ÷ Diameter factor)^2</code></td></tr><tr><td><strong>Diameter factor</strong></td><td><code>Rivet diameter ÷ √(Plate thickness)</code></td></tr></tbody></table><p><p>Take the square root of the thickness in inches and multiply by about one and a fifth. Everything else follows from that diameter: the edge distance is twice it, so the plate does not tear out, and the pitch is three times it, so the seam neither buckles nor leaks.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs. It reports rivet diameter and edge distance and rivet pitch and rivets per foot.</p><ul><li><strong>Plate thickness</strong> — in in. Thinner sheet of the joint</li><li><strong>Diameter factor</strong>. One point two for a standard joint</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Rivet diameter</strong> — in in</li><li><strong>Edge distance</strong> — in in</li><li><strong>Rivet pitch</strong> — in in</li><li><strong>Rivets per foot</strong></li></ul><p>Every input needs a value before the page can answer: it reads the boxes you filled in, runs the formula and prints each result. Nothing is carried over from a previous run, so a result that stays blank means an input is missing rather than that the page has kept an older number.</p><p>The result boxes are read-only and are recomputed from the inputs, so the page always works forwards. To go the other way, the table above gives the rearrangement for each unknown.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Plate thickness = 0.125 in, Diameter factor = 1.2 — and the results panel reads:</p><ul><li><strong>Rivet diameter</strong> = <code>Diameter factor × √(Plate thickness)</code> = <strong>0.424 in</strong></li><li><strong>Edge distance</strong> = <code>2 × Diameter factor × √(Plate thickness)</code> = <strong>0.849 in</strong></li><li><strong>Rivet pitch</strong> = <code>3 × Diameter factor × √(Plate thickness)</code> = <strong>1.273 in</strong></li><li><strong>Rivets per foot</strong> = <code>12 ÷ (3 × Diameter factor × √(Plate thickness))+1</code> = <strong>10.428</strong></li></ul><p>With the numbers written into the formula, the first result is <code>1.2 × sqrt(0.125) = 0.424</code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>0.125 in plate takes a 0.424 in rivet, set 0.849 in from the edge and 1.273 in apart, which is 10.428 rivets to the foot.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Read the diameter against the thickness: the ratio should be about four to one. A rivet less than three times the thickness is likely to tear out; more than six times and the punch load becomes the problem.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Rivet diameter</th><th>Edge distance</th><th>Rivet pitch</th><th>Rivets per foot</th></tr></thead><tbody><tr><td><strong>Plate thickness</strong> +10 %</td><td>+4.88 %</td><td>+4.88 %</td><td>+4.88 %</td><td>−4.21 %</td></tr><tr><td><strong>Diameter factor</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>+10 %</td><td>−8.22 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Diameter factor</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Plate thickness</strong>, at 4.9 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Plate thickness = 0.25, the page reports <strong>Rivet diameter</strong> = 0.6 in, <strong>Edge distance</strong> = 1.2 in, <strong>Rivet pitch</strong> = 1.8 in, <strong>Rivets per foot</strong> = 7.667. Quarter plate: a heavier rivet and a wider pitch.</li><li>With Plate thickness = 0.048, Diameter factor = 1, the page reports <strong>Rivet diameter</strong> = 0.219 in, <strong>Edge distance</strong> = 0.438 in, <strong>Rivet pitch</strong> = 0.657 in, <strong>Rivets per foot</strong> = 19.257. Thin sheet with a finer factor: a small, close-set rivet.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Thickness in gauge.</strong> Convert it to inches first.</li><li><strong>Edge distance from the hole edge.</strong> It is from the rivet centre.</li><li><strong>Pitch used as edge distance.</strong> The two rules differ.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are read-only, so a previous answer cannot be entered there; it has to be worked back through the inputs.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Rivet diameter (in), Edge distance (in), Rivet pitch (in), Rivets per foot.</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A length in feet multiplied by a width in feet leaves square feet; a square footage multiplied by a thickness in inches and divided by twelve leaves cubic feet, and a cubic footage divided by twenty-seven leaves cubic yards. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Thickness, diameter, edge distance and pitch in inches, rivets per foot as a count.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need plate thickness and diameter factor. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates when you press Calculate and again as you change a value. Fill every box the page asks for.</li><li><strong>Read the result against the worked example.</strong> Rivet diameter and edge distance and rivet pitch and rivets per foot should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error on a takeoff, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Plate thickness</strong> ×10</td><td>0.424</td><td>1.342</td><td>×3.162</td></tr><tr><td><strong>Diameter factor</strong> ×10</td><td>0.424</td><td>4.243</td><td>ten times larger</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. The result boxes are read-only: they are recomputed from the inputs, never typed into, so a number in the panel always belongs to the values above it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Static lap joint.</strong> Fatigue and pressure vessels need a design check.</li><li><strong>Solid rivets.</strong> Blind rivets follow the maker's data.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Laying out a riveted patch.</li></li><li><li>Choosing a rivet for a repair.</li></li><li><li>Checking a drawing's pitch.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/construction/punch-force">Punch force</a> <a href="/construction/bolt-circle">Bolt circle</a> <a href="/construction/clearance-hole">Clearance hole</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Rivet size calculator work out?', 'a' => <<<'TXT'
            It returns rivet diameter and edge distance and rivet pitch and rivets per foot from plate thickness and diameter factor. The relationship is Diameter factor × √(Plate thickness).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Plate thickness (in), Diameter factor. The result boxes need no input of their own: they are computed.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Not from the page itself: the results are read-only and the arithmetic always runs from the inputs. The formula table lists the rearrangement for each unknown, so the same relationship can be worked the other way by hand.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: plate thickness in in. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'How do I choose a rivet diameter?', 'a' => 'About one point two times the square root of the plate thickness in inches.'],
            ['q' => 'What is the usual rivet pitch?', 'a' => 'Three times the rivet diameter, with twice the diameter at the edges.'],
        ],
        'related' => [
            ['path' => '/construction/punch-force', 'name' => 'Punch force'],
            ['path' => '/construction/bolt-circle', 'name' => 'Bolt circle'],
            ['path' => '/construction/clearance-hole', 'name' => 'Clearance hole'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
