<?php

/**
 * Solids Retention Time Calculator (SRT)
 * /biology/solids-retention-time
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Solids Retention Time Calculator (SRT)',
    'meta' => ['title' => 'Solids Retention Time Calculator (SRT) — Biology', 'description' => 'Solids retention time, or sludge age, is how long a bacterium stays in the system, and it decides which organisms survive there. Free solids retention time (s', 'h1' => 'Solids Retention Time Calculator (SRT)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'volume',
                            'label' => 'Aeration tank volume',
                            'type' => 'number',
                            'suffix' => 'm³',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '750',
                        ],
                        [
                            'name' => 'mlss',
                            'label' => 'MLSS',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '3000',
                        ],
                        [
                            'name' => 'waste',
                            'label' => 'Waste sludge flow',
                            'type' => 'number',
                            'suffix' => 'm³/day',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'waste_mlss',
                            'label' => 'Waste sludge MLSS',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8000',
                        ],
                        [
                            'name' => 'effluent',
                            'label' => 'Effluent flow',
                            'type' => 'number',
                            'suffix' => 'm³/day',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '500',
                        ],
                        [
                            'name' => 'effluent_tss',
                            'label' => 'Effluent suspended solids',
                            'type' => 'number',
                            'suffix' => 'mg/L',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'target',
                            'label' => 'Target SRT',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'srt',
                            'label' => 'Solids retention time',
                            'type' => 'number',
                            'suffix' => 'days',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'sludge_age_mass',
                            'label' => 'Solids inventory',
                            'type' => 'number',
                            'suffix' => 'kg',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'waste_needed',
                            'label' => 'Wasting rate for the target SRT',
                            'type' => 'number',
                            'suffix' => 'm³/day',
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
            'title' => 'Retention',
            'results' => ['sludge_age_mass' => 'volume*mlss/1000', 'srt' => '(volume*mlss/1000)/(waste*waste_mlss/1000+effluent*effluent_tss/1000)', 'waste_needed' => '((volume*mlss/1000)/target-effluent*effluent_tss/1000)/(waste_mlss/1000)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Solids Retention Time Calculator (SRT) turns Aeration tank volume, MLSS and Waste sludge flow into Solids retention time and Solids inventory. The arithmetic is the whole method: Solids retention time is worked out from Aeration tank volume by one formula, applied once. Solids retention time comes back in days unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Solids Retention Time Calculator (SRT) calculator works', 'html' => <<<'TXT'
            <p>The Solids Retention Time Calculator (SRT) calculator applies one relationship to 7 numbers and reports Solids retention time, Solids inventory and Wasting rate for the target SRT.</p><p>In the form&#039;s own words, Solids inventory = Aeration tank volume × MLSS ÷ 1000.</p><p>The result panel carries Solids retention time, Solids inventory and Wasting rate for the target SRT, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 7 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>Aeration tank volume</strong> — in m³</li><li><strong>MLSS</strong> — in mg/L</li><li><strong>Waste sludge flow</strong> — in m³/day</li><li><strong>Waste sludge MLSS</strong> — in mg/L</li><li><strong>Effluent flow</strong> — in m³/day</li><li><strong>Effluent suspended solids</strong> — in mg/L</li><li><strong>Target SRT</strong> — in days</li></ul><p>What you get back is Solids retention time in days, Solids inventory in kg, Wasting rate for the target SRT in m³/day, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Aeration tank volume = 750 m³, MLSS = 3000 mg/L, Waste sludge flow = 25 m³/day, Waste sludge MLSS = 8000 mg/L, Effluent flow = 500 m³/day, Effluent suspended solids = 15 mg/L and Target SRT = 15 days — through the same formula and the panel reports &lt;strong&gt;Solids inventory&lt;/strong&gt; = 2250 kg, &lt;strong&gt;Solids retention time&lt;/strong&gt; = 10.84 days and &lt;strong&gt;Wasting rate for the target SRT&lt;/strong&gt; = 17.81 m³/day.</p><ul><li><strong>Solids inventory</strong> = 2250 kg</li><li><strong>Solids retention time</strong> = 10.84 days</li><li><strong>Wasting rate for the target SRT</strong> = 17.81 m³/day</li></ul><p>The line behind those figures is <strong>Solids inventory</strong> = <code>Aeration tank volume × MLSS ÷ 1000</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Solids inventory&lt;/strong&gt; = 2250, &lt;strong&gt;Solids retention time&lt;/strong&gt; = 10.84 and &lt;strong&gt;Wasting rate for the target SRT&lt;/strong&gt; = 17.81 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Solids retention time takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Solids inventory</strong> = <code>Aeration tank volume × MLSS ÷ 1000</code></li><li><strong>Solids retention time</strong> = <code>(Aeration tank volume × MLSS ÷ 1000) ÷ (Waste sludge flow × Waste sludge MLSS ÷ 1000 + Effluent flow × Effluent suspended solids ÷ 1000)</code></li><li><strong>Wasting rate for the target SRT</strong> = <code>((Aeration tank volume × MLSS ÷ 1000) ÷ Target SRT − Effluent flow × Effluent suspended solids ÷ 1000) ÷ (Waste sludge MLSS ÷ 1000)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Solids inventory</strong> = <code>Aeration tank volume × MLSS ÷ 1000</code> — the form to use when Aeration tank volume and MLSS are the values you have.</li><li><strong>Solids retention time</strong> = <code>(Aeration tank volume × MLSS ÷ 1000) ÷ (Waste sludge flow × Waste sludge MLSS ÷ 1000 + Effluent flow × Effluent suspended solids ÷ 1000)</code> — the form to use when Aeration tank volume, MLSS, Waste sludge flow and Waste sludge MLSS are the values you have.</li><li><strong>Wasting rate for the target SRT</strong> = <code>((Aeration tank volume × MLSS ÷ 1000) ÷ Target SRT − Effluent flow × Effluent suspended solids ÷ 1000) ÷ (Waste sludge MLSS ÷ 1000)</code> — the form to use when Aeration tank volume, MLSS, Target SRT and Effluent flow are the values you have.</li></ul><p>Any one of Solids inventory, Solids retention time and Wasting rate for the target SRT can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Aeration tank volume, from 750 to 1500 — and the answers go from &lt;strong&gt;Solids inventory&lt;/strong&gt; 2250 kg, &lt;strong&gt;Solids retention time&lt;/strong&gt; 10.84 days and &lt;strong&gt;Wasting rate for the target SRT&lt;/strong&gt; 17.81 m³/day to &lt;strong&gt;Solids inventory&lt;/strong&gt; 4500 kg, &lt;strong&gt;Solids retention time&lt;/strong&gt; 21.69 days and &lt;strong&gt;Wasting rate for the target SRT&lt;/strong&gt; 36.56 m³/day.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Solids retention time, Solids inventory and Wasting rate for the target SRT are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Aeration tank volume left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Aeration tank volume is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>MLSS left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If MLSS is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Waste sludge flow left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Waste sludge flow is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Aeration tank volume to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Solids Retention Time Calculator (SRT) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Aeration tank volume</strong> is measured in m³. It feeds Solids inventory, Solids retention time and Wasting rate for the target SRT. Fill it from a measurement rather than a memory — Aeration tank volume is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>MLSS</strong> is measured in mg/L. It feeds Solids inventory, Solids retention time and Wasting rate for the target SRT. Fill it from a measurement rather than a memory — MLSS is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Waste sludge flow</strong> is measured in m³/day. It feeds Solids retention time. Fill it from a measurement rather than a memory — Waste sludge flow is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Waste sludge MLSS</strong> is measured in mg/L. It feeds Solids retention time and Wasting rate for the target SRT. Fill it from a measurement rather than a memory — Waste sludge MLSS is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Effluent flow</strong> is measured in m³/day. It feeds Solids retention time and Wasting rate for the target SRT. Fill it from a measurement rather than a memory — Effluent flow is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Effluent suspended solids</strong> is measured in mg/L. It feeds Solids retention time and Wasting rate for the target SRT. Fill it from a measurement rather than a memory — Effluent suspended solids is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Target SRT</strong> is measured in days. It feeds Wasting rate for the target SRT. Fill it from a measurement rather than a memory — Target SRT is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Solids retention time</strong> is a plain number and the page's own defaults put it at 10.84. It is worked out from Aeration tank volume, MLSS, Waste sludge flow and Waste sludge MLSS. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Solids inventory</strong> is a plain number and the page's own defaults put it at 2250. It is worked out from Aeration tank volume and MLSS. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Wasting rate for the target SRT</strong> is a plain number and the page's own defaults put it at 17.81. It is worked out from Aeration tank volume, MLSS, Target SRT and Effluent flow. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Solids inventory</th><th>Solids retention time</th><th>Wasting rate for the target SRT</th></tr></thead><tbody><tr><td><strong>Aeration tank volume</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10.53%</td></tr><tr><td><strong>MLSS</strong> +10%</td><td>+10%</td><td>+10%</td><td>+10.53%</td></tr><tr><td><strong>Waste sludge flow</strong> +10%</td><td>+0%</td><td>-8.79%</td><td>+0%</td></tr><tr><td><strong>Waste sludge MLSS</strong> +10%</td><td>+0%</td><td>-8.79%</td><td>-9.09%</td></tr><tr><td><strong>Effluent flow</strong> +10%</td><td>+0%</td><td>-0.36%</td><td>-0.53%</td></tr><tr><td><strong>Effluent suspended solids</strong> +10%</td><td>+0%</td><td>-0.36%</td><td>-0.53%</td></tr><tr><td><strong>Target SRT</strong> +10%</td><td>+0%</td><td>+0%</td><td>-9.57%</td></tr></tbody></table><p>Ranked by leverage, Aeration tank volume sits at the top — a ten per cent error in that box shows up as roughly 10.5 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Solids retention time follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Aeration tank volume, MLSS and Waste sludge flow are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Aeration tank volume, MLSS and Waste sludge flow is what you already know and Solids retention time and Solids inventory is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/biology/dna-pattern-finder">DNA Pattern Finder Calculator</a>, <a href="/biology/dna-percentage">DNA Percentage Calculator</a> and <a href="/biology/sequence-shuffler">DNA Sequence Shuffler Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Solids Retention Time Calculator (SRT) calculator work out?', 'a' => <<<'TXT'
            Solids retention time, Solids inventory and Wasting rate for the target SRT, from Aeration tank volume and MLSS. The relationship is Solids inventory = Aeration tank volume × MLSS ÷ 1000.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Aeration tank volume (m³), MLSS (mg/L), Waste sludge flow (m³/day), Waste sludge MLSS (mg/L), Effluent flow (m³/day). Enter volume, mlss and waste; Solids retention time is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Solids inventory, Solids retention time and Wasting rate for the target SRT blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Solids inventory = 2250 kg, Solids retention time = 10.84 days and Wasting rate for the target SRT = 17.81 m³/day. That comes from the page's own defaults, entered in Aeration tank volume; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Solids retention time is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Aeration tank volume blank and the page solves for it, reporting Solids retention time instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Solids retention time keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/dna-pattern-finder', 'name' => 'DNA Pattern Finder Calculator'],
            ['path' => '/biology/dna-percentage', 'name' => 'DNA Percentage Calculator'],
            ['path' => '/biology/sequence-shuffler', 'name' => 'DNA Sequence Shuffler Calculator'],
        ],
        'authors' => [],
    ],
];
