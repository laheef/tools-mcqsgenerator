<?php

/**
 * Diffusion Coefficient Calculator
 * /chemistry/diffusion-coefficient
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Diffusion Coefficient Calculator',
    'meta' => ['title' => 'Diffusion Coefficient Calculator: Stokes-Einstein', 'description' => 'Use the Stokes-Einstein relation to get a particle\'s diffusion coefficient from the temperature, the viscosity of the liquid and the particle\'s radius.', 'h1' => 'Diffusion Coefficient Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'columns' => 2,
            'fields' => [
                [
                    'name' => 'temperature',
                    'label' => 'Temperature',
                    'type' => 'number',
                    'suffix' => 'K',
                    'default' => '298.15',
                    'help' => 'Absolute temperature: 25 °C is 298.15 K',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'viscosity',
                    'label' => 'Viscosity of the liquid',
                    'type' => 'number',
                    'suffix' => 'mPa·s',
                    'default' => '0.89',
                    'help' => 'Water at 25 °C is 0.89 mPa·s, which is 0.89 centipoise',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'radius',
                    'label' => 'Particle radius',
                    'type' => 'number',
                    'suffix' => 'nm',
                    'default' => '5',
                    'help' => 'Hydrodynamic radius; a 10 nm diameter particle has a radius of 5 nm',
                    'rounding' => ['omni', '0.0001'],
                ],
                [
                    'name' => 'diffusion_coefficient',
                    'label' => 'Diffusion coefficient D',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'm²/s',
                ],
                [
                    'name' => 'd_um2_s',
                    'label' => 'Diffusion coefficient',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 'µm²/s',
                ],
                [
                    'name' => 'time_one_um',
                    'label' => 'Time to diffuse 1 µm',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'suffix' => 's',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Diffusion Coefficient',
            'results' => [
                'diffusion_coefficient' => '0.00000000000000000000001380649*temperature/(6*pi*viscosity*0.001*radius*0.000000001)',
                'd_um2_s' => '0.00000000000000000000001380649*temperature/(6*pi*viscosity*0.001*radius*0.000000001)*1000000000000',
                'time_one_um' => '2*pow(0.000001,2)/(0.00000000000000000000001380649*temperature/(6*pi*viscosity*0.001*radius*0.000000001))',
                'temperature' => 'diffusion_coefficient*6*pi*viscosity*0.001*radius*0.000000001/0.00000000000000000000001380649',
                'viscosity' => '0.00000000000000000000001380649*temperature/(6*pi*diffusion_coefficient*0.001*radius*0.000000001)',
                'radius' => '0.00000000000000000000001380649*temperature/(6*pi*viscosity*0.001*diffusion_coefficient*0.000000001)',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The Stokes–Einstein relation links a particle's random walk to the fluid dragging on it: <strong>D = k<sub>B</sub>T ÷ (6πηr)</strong>. The page reports D in square metres per second, in square micrometres per second, and the time it takes to diffuse one micrometre.</p>
        TXT,
        'sections' => [
            ['title' => 'What this calculator works out', 'html' => <<<'TXT'
            <p>D sets the timescale of everything that moves by diffusion rather than by flow: how fast a drug reaches a cell, how a protein finds its partner, how long a stain takes to spread through a gel. It is the single most useful number in transport at small scales.</p><p>The page reports <strong>diffusion coefficient D and diffusion coefficient and time to diffuse 1 µm</strong> from the boxes above it. Every line of the formula table below is the same relationship rearranged, which is why leaving a different box empty changes the question rather than breaking the page.</p>
            TXT],
            ['title' => 'The formula, and every way round it', 'html' => <<<'TXT'
            <p>One relationship drives the page. Each line below is the same relationship arranged for a different unknown, which is what lets the calculator answer from either end.</p><table class="calc-table"><thead><tr><th>Solving for</th><th>Expression</th></tr></thead><tbody><tr><td><strong>Diffusion coefficient D</strong></td><td><code>0.1.381 × 10<sup>6< ÷ sup> × Temperature ÷ (6 × pi × Viscosity of the liquid × 0.001 × Particle radius × 0.000000001)</code></td></tr><tr><td><strong>Diffusion coefficient</strong></td><td><code>0.1.381 × 10<sup>6< ÷ sup> × Temperature ÷ (6 × pi × Viscosity of the liquid × 0.001 × Particle radius × 0.000000001) × 1 × 10<sup>12< ÷ sup></code></td></tr><tr><td><strong>Time to diffuse 1 µm</strong></td><td><code>2 × (0.000001)^2 ÷ (0.1.381 × 10<sup>6< ÷ sup> × Temperature ÷ (6 × pi × Viscosity of the liquid × 0.001 × Particle radius × 0.000000001))</code></td></tr><tr><td><strong>Temperature</strong></td><td><code>Diffusion coefficient D × 6 × pi × Viscosity of the liquid × 0.001 × Particle radius × 0.000000001 ÷ 0.1.381 × 10<sup>6< ÷ sup></code></td></tr><tr><td><strong>Viscosity of the liquid</strong></td><td><code>0.1.381 × 10<sup>6< ÷ sup> × Temperature ÷ (6 × pi × Diffusion coefficient D × 0.001 × Particle radius × 0.000000001)</code></td></tr><tr><td><strong>Particle radius</strong></td><td><code>0.1.381 × 10<sup>6< ÷ sup> × Temperature ÷ (6 × pi × Viscosity of the liquid × 0.001 × Diffusion coefficient D × 0.000000001)</code></td></tr></tbody></table><p><p>Boltzmann's constant over six pi is the geometry of a sphere in a viscous fluid; the rest is the drag. Because the radius sits in the denominator, doubling the particle halves D and quadruples the time to cross a given distance.</p></p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs. It reports diffusion coefficient D and diffusion coefficient and time to diffuse 1 µm.</p><ul><li><strong>Temperature</strong> — in K. Absolute temperature: 25 °C is 298.15 K</li><li><strong>Viscosity of the liquid</strong> — in mPa·s. Water at 25 °C is 0.89 mPa·s, which is 0.89 centipoise</li><li><strong>Particle radius</strong> — in nm. Hydrodynamic radius; a 10 nm diameter particle has a radius of 5 nm</li></ul><p>The results are the boxes you leave alone:</p><ul><li><strong>Diffusion coefficient D</strong> — in m²/s</li><li><strong>Diffusion coefficient</strong> — in µm²/s</li><li><strong>Time to diffuse 1 µm</strong> — in s</li></ul><p>The last box you fill in is the one the page answers from: it reads whatever is present, works out which value is missing, and solves for that.</p><p>Two boxes may be left empty, and then the page answers for both if the formulas allow it — a rearrangement that needs a value it does not have stays blank rather than guessing. That is the difference between a calculator and a spreadsheet that has been filled down: nothing here is carried over from a previous run, so a blank result always means a missing input.</p>
            TXT],
            ['title' => 'A worked example you can reproduce', 'html' => <<<'TXT'
            <p>Enter the values the page is built around — Temperature = 298.15 K, Viscosity of the liquid = 0.89 mPa·s, Particle radius = 5 nm — and the results panel reads:</p><ul><li><strong>Diffusion coefficient D</strong> = <code>0.1.381 × 10<sup>6< ÷ sup> × Temperature ÷ (6 × pi × Viscosity of the liquid × 0.001 × Particle radius × 0.000000001)</code> = <strong>4.907 × 10<sup>-11</sup> m²/s</strong></li><li><strong>Diffusion coefficient</strong> = <code>0.1.381 × 10<sup>6< ÷ sup> × Temperature ÷ (6 × pi × Viscosity of the liquid × 0.001 × Particle radius × 0.000000001) × 1 × 10<sup>12< ÷ sup></code> = <strong>49.075 µm²/s</strong></li><li><strong>Time to diffuse 1 µm</strong> = <code>2 × (0.000001)^2 ÷ (0.1.381 × 10<sup>6< ÷ sup> × Temperature ÷ (6 × pi × Viscosity of the liquid × 0.001 × Particle radius × 0.000000001))</code> = <strong>0.041 s</strong></li></ul><p>With the numbers written into the formula, the first result is <code>0.1.381 × 10<sup>6< ÷ sup> × 298.15 ÷ (6 × pi × 0.89 × 0.001 × 5 × 0.000000001) = 4.907 × 10<sup>-11</sup></code>. Nothing is rounded between steps: the arithmetic is done at full precision and only the display is shortened.</p><p><p>A 5 nm particle in water at 25 °C: k<sub>B</sub>T is 4.12 × 10⁻²¹ J, the drag term 6πηr is 8.39 × 10⁻¹¹ kg/s, and D comes out at 4.91 × 10⁻¹¹ m²/s — 49 µm²/s. One micrometre takes about 0.04 seconds.</p></p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p><p>Diffusion time grows as the square of distance. A small molecule crosses a micrometre in milliseconds, a cell in seconds, a millimetre in minutes and a centimetre in hours — which is why organisms above a certain size need a circulatory system.</p></p><p>There is no fixed band to read this number against: it is a quantity in its own right, and whether it is right for you depends on the case. Use the worked example above as the sanity check.</p><p>A useful habit is to predict the answer before pressing anything. Even a rough estimate — this should be somewhere near a tenth, or a few hundred — catches the errors that a plausible-looking result would otherwise hide.</p>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Take the values above, raise one box by ten per cent and re-solve. The percentage is how far each result moves:</p><table class="calc-table"><thead><tr><th>Change</th><th>Diffusion coefficient D</th><th>Diffusion coefficient</th><th>Time to diffuse 1 µm</th></tr></thead><tbody><tr><td><strong>Temperature</strong> +10 %</td><td>+10 %</td><td>+10 %</td><td>−9.09 %</td></tr><tr><td><strong>Viscosity of the liquid</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td></tr><tr><td><strong>Particle radius</strong> +10 %</td><td>−9.09 %</td><td>−9.09 %</td><td>+10 %</td></tr></tbody></table><p>The point of the table is not the exact percentages — they are a property of the formula at these particular values — but which box the answer is most exposed to. That is the number to measure twice.</p><p>The box this answer is most exposed to is <strong>Particle radius</strong>: a ten per cent move there shifts the result by about 10 per cent. The least sensitive is <strong>Temperature</strong>, at 10 per cent for the same change. That ranking is what to keep in mind when you have to estimate one number rather than measure it.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example shows the page computes. Two more show how it behaves away from the values above:</p><ul><li>With Temperature = 310.15, Viscosity of the liquid = 1, Particle radius = 3, the page reports <strong>Diffusion coefficient D</strong> = 7.572 × 10<sup>-11</sup> m²/s, <strong>Diffusion coefficient</strong> = 75.724 µm²/s, <strong>Time to diffuse 1 µm</strong> = 0.026 s. A 3 nm particle in plasma-like viscosity at body temperature: 7.6 × 10⁻¹¹ m²/s, slower than in water because the fluid is thicker.</li><li>With Temperature = 298.15, Viscosity of the liquid = 1, Particle radius = 50, the page reports <strong>Diffusion coefficient D</strong> = 4.368 × 10<sup>-12</sup> m²/s, <strong>Diffusion coefficient</strong> = 4.368 µm²/s, <strong>Time to diffuse 1 µm</strong> = 0.458 s. A 50 nm particle diffuses ten times slower than a 5 nm one — 4.9 µm²/s.</li></ul>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Centipoise entered as pascal-seconds.</strong> Water is 0.00089 Pa·s, which is 0.89 mPa·s; the box wants mPa·s, so 0.00089 is three orders out.</li><li><strong>Diameter used as radius.</strong> Halving the number doubles the answer — a factor of two error that looks small on the page and large in a model.</li><li><strong>The result read as speed.</strong> D has units of area per second; the distance travelled grows as √t, not linearly.</li><li><strong>A unit entered against the wrong row.</strong> Each box says what it expects; a milligram typed where grams are asked for is out by a factor of a thousand, and the answer still looks plausible.</li><li><strong>A past answer typed back in.</strong> The result boxes are results: putting a previous answer into one turns the calculation round and solves for whichever box is empty instead.</li></ul>
            TXT],
            ['title' => 'Units and precision', 'html' => <<<'TXT'
            <p>Each box carries its unit beside it, and the result is reported in the unit named with it: Diffusion coefficient D (m²/s), Diffusion coefficient (µm²/s), Time to diffuse 1 µm (s).</p><p>No answer on this site is printed with more than three decimals, and values far from everyday size are shown in scientific notation so the significant figures stay readable. Display rounding never feeds back into the calculation: the value behind the number keeps its full precision until the next input changes.</p><p>Units in a formula behave like ordinary algebra. A mass in grams divided by a molar mass in grams per mole leaves moles; a concentration in moles per litre multiplied by a volume in litres leaves moles. If a result comes out with the wrong order of magnitude, writing the units of each box into the formula is usually enough to show which one was entered on the wrong scale.</p><p><p>Temperature in kelvin, viscosity in millipascal-seconds, radius in nanometres. Those units convert to metres, kilograms and seconds inside the expression, so the answer is in square metres per second — 4.9 × 10⁻¹¹ for a small molecule in water.</p></p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need temperature and viscosity of the liquid and particle radius. Note the unit each one is in before you type, because the page cannot tell a value entered in the wrong unit from a correct one.</li><li><strong>Enter them.</strong> Type into the boxes; the panel updates as soon as it has enough to answer. Leave the box you are solving for empty.</li><li><strong>Read the result against the worked example.</strong> Diffusion coefficient d and diffusion coefficient and time to diffuse 1 µm should be of the same order of magnitude as the figure above for inputs of the same order.</li><li><strong>Change one box to check the direction.</strong> Move a single input and confirm the result moves the way the formula says it should. When it does, the number is yours to use.</li></ol><p>Write the answer down with its unit and the values that produced it. A bare number copied into a report later is exactly where units get lost, and a result that cannot be traced back to its inputs cannot be checked by anyone else — including you, a fortnight later.</p>
            TXT],
            ['title' => 'When one input is out by a factor of ten', 'html' => <<<'TXT'
            <p>A decimal slip is the commonest arithmetic error in a lab, and it tends to leave an answer that still looks like an answer. Here is what the first result does if each box in turn is typed ten times too large:</p><table class="calc-table"><thead><tr><th>Change</th><th>Result</th><th>Becomes</th><th>Effect</th></tr></thead><tbody><tr><td><strong>Temperature</strong> ×10</td><td>4.907 × 10<sup>-11</sup></td><td>4.907 × 10<sup>-10</sup></td><td>ten times larger</td></tr><tr><td><strong>Viscosity of the liquid</strong> ×10</td><td>4.907 × 10<sup>-11</sup></td><td>4.907 × 10<sup>-12</sup></td><td>ten times smaller</td></tr><tr><td><strong>Particle radius</strong> ×10</td><td>4.907 × 10<sup>-11</sup></td><td>4.907 × 10<sup>-12</sup></td><td>ten times smaller</td></tr></tbody></table><p>Read the last column two ways. Where it says ten times larger or smaller, the relationship is linear in that box and a unit slip goes straight through to the answer. Where the effect is weaker than that, the box sits inside a logarithm, a power or a sum, and the mistake is partly absorbed — which is more dangerous, not less, because the result then looks reasonable.</p>
            TXT],
            ['title' => 'What the page does before it answers', 'html' => <<<'TXT'
            <p>Nothing is submitted and nothing is stored: the arithmetic runs in the browser each time an input changes. A result stays blank until every value it needs is present and finite, so an empty box in the panel means a missing input rather than an error. Zero is accepted as an input, but a formula that would divide by it reports no result instead of infinity.</p><p>Values are carried at full precision between the formula and the display, and the three-decimal limit is applied only at the end. If you type a value into a result box, the page treats it as known and solves for whichever input is then empty — the same calculation, run backwards.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>Spheres in a continuum.</strong> Real proteins are not spheres, and near a membrane or a pore the continuum breaks down.</li><li><strong>It ignores charge and interaction.</strong> A charged particle in an electrolyte experiences a different drag, which is what the Debye length and electrophoresis are about.</li><li><strong>It computes the relationship, not your case.</strong> Nothing here corrects for measurement error, impurities or conditions outside the range the relationship was written for. Those are assumptions you bring; the arithmetic does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <ul><li><li>Estimating how long a molecule takes to cross a cell.</li></li><li><li>Finding a particle radius from a measured diffusion coefficient.</li></li><li><li>Sizing a diffusion-limited reaction's rate.</li></li></ul><p>If the answer you need is one step further on, these pages pick up where this one stops: <a href="/chemistry/grahams-law-of-diffusion">Graham&#x27;s law</a> <a href="/chemistry/osmotic-pressure">Osmotic pressure</a> <a href="/chemistry/activity-coefficient">Activity coefficient</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Diffusion Coefficient calculator work out?', 'a' => <<<'TXT'
            It returns diffusion coefficient D and diffusion coefficient and time to diffuse 1 µm from temperature and viscosity of the liquid and particle radius. The relationship is 0.1.381 × 10<sup>6< ÷ sup> × Temperature ÷ (6 × pi × Viscosity of the liquid × 0.001 × Particle radius × 0.000000001).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Temperature (K), Viscosity of the liquid (mPa·s), Particle radius (nm). Leave the result boxes alone unless one of them is the value you are solving for.'],
            ['q' => 'Can I use it backwards?', 'a' => <<<'TXT'
            Yes. Every line of the formula table is an arrangement of the same relationship, so filling in a result and leaving an input empty makes the page solve for that input instead.
            TXT],
            ['q' => 'Does it matter which unit I type in?', 'a' => <<<'TXT'
            It matters that every box is in the unit printed beside it: temperature in K; viscosity of the liquid in mPa·s; particle radius in nm. The page converts nothing on its own, so a mixed set of units is the most common wrong answer.
            TXT],
            ['q' => 'How precise is the answer?', 'a' => <<<'TXT'
            Results are computed at full precision and printed with at most three decimals, with scientific notation for very large or small values. Copy the number out if you need it later — nothing is saved.
            TXT],
            ['q' => 'Is it free, and is my data sent anywhere?', 'a' => 'Yes, and no. There is no account and no limit, and the arithmetic runs in your browser: the values you type are not uploaded or stored.'],
            ['q' => 'Why does the time go as the square of distance?', 'a' => 'Because random motion accumulates: after N steps the distance is only proportional to √N. Doubling the distance takes four times as long.'],
            ['q' => 'What is the diffusion coefficient of water itself?', 'a' => 'About 2.3 × 10⁻⁹ m²/s at 25 °C. A small ion such as sodium is around 1.3 × 10⁻⁹ m²/s.'],
        ],
        'related' => [
            ['path' => '/chemistry/grahams-law-of-diffusion', 'name' => 'Graham\'s law'],
            ['path' => '/chemistry/osmotic-pressure', 'name' => 'Osmotic pressure'],
            ['path' => '/chemistry/activity-coefficient', 'name' => 'Activity coefficient'],
        ],
        'authors' => [
            ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
        ],
    ],
];
