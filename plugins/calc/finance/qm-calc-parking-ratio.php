<?php

/**
 * Parking ratio
 * /finance/parking-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Parking ratio',
    'meta' => ['title' => 'Parking ratio Calculator — Formula & Results', 'description' => 'Enter rentable area and parking spots and get parking ratio back. Every box can be solved for, not only the one in the title. A worked example follows.', 'h1' => 'Parking ratio Calculator', 'updated' => '2026-09-28'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rentable_area',
                            'label' => 'Rentable area',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'm2',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'parking_spots',
                            'label' => 'Parking spots',
                            'type' => 'number',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'parking_ratio',
                            'label' => 'Parking ratio',
                            'type' => 'number',
                            'suffix' => ': 1000',
                            'help' => 'The result shows the number of parking spots per 1000 square feet.',
                            'rounding' => ['omni', '0.1'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'parking_ratio =  1000 * parking_spots / rentable_area',
            'results' => ['rentable_area' => '1000*parking_spots/parking_ratio', 'parking_ratio' => '1000*parking_spots/rentable_area', 'parking_spots' => '(1/1000)*parking_ratio*rentable_area'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Parking ratio takes Rentable area and Parking spots and returns Parking ratio. Nothing is looked up on this page: parking ratio is computed from rentable area and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Parking ratio is opened in : 1000; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Parking ratio calculator works', 'html' => <<<'TXT'
            <p>The Parking ratio calculator applies one relationship to 2 numbers and reports Parking ratio.</p><p>In the form&#039;s own words, Parking ratio = 1000 × Parking spots ÷ Rentable area.</p><p>What comes back is Parking ratio — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Rentable area</strong> — in square meters</li><li><strong>Parking spots</strong> — a plain number, no unit</li></ul><p>The answer comes back as Parking ratio in : 1000. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Rentable area = 10 m2 and Parking spots = 100 — through the same formula and the panel reports <strong>Parking ratio</strong> = 10000 : 1000.</p><ul><li><strong>Parking ratio</strong> = 10000 : 1000</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Parking ratio</strong> = <code>1000 × Parking spots ÷ Rentable area</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Parking ratio</strong> = 10000 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Rentable area offers 7 units and opens on square meters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Parking ratio</strong> = <code>1000 × Parking spots ÷ Rentable area</code></li><li><strong>Rentable area</strong> = <code>1000 × Parking spots ÷ Parking ratio</code></li><li><strong>Parking spots</strong> = <code>(1 ÷ 1000) × Parking ratio × Rentable area</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Parking ratio</strong> = <code>1000 × Parking spots ÷ Rentable area</code> — the form to use when Parking spots and Rentable area are the values you have.</li><li><strong>Rentable area</strong> = <code>1000 × Parking spots ÷ Parking ratio</code> — the form to use when Parking spots and Parking ratio are the values you have.</li><li><strong>Parking spots</strong> = <code>(1 ÷ 1000) × Parking ratio × Rentable area</code> — the form to use when Parking ratio and Rentable area are the values you have.</li></ul><p>Any one of Parking ratio, Rentable area and Parking spots can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Rentable area, from 10 to 20 — and the answers go from <strong>Parking ratio</strong> 10000 : 1000 to <strong>Parking ratio</strong> 5000 : 1000.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Rentable area is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Parking ratio is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Rentable area left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Rentable area is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Parking spots left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Parking spots is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Rentable area to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Parking ratio form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Rentable area</strong> is a square meters quantity: the page opens it in m2 and converts anything else you pick before the formula runs. It feeds Parking ratio and Parking spots. Fill it from a measurement rather than a memory — Rentable area is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Parking spots</strong> takes a plain number with no unit attached. It feeds Rentable area and Parking ratio. Fill it from a measurement rather than a memory — Parking spots is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Parking ratio</strong> is a plain number and the page's own defaults put it at 10000. The value follows from Parking spots and Rentable area. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Parking ratio</th></tr></thead><tbody><tr><td><strong>Rentable area</strong> +10%</td><td>-9.09%</td></tr><tr><td><strong>Parking spots</strong> +10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Parking spots sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Rentable area = 5 m2 and Parking spots = 50 and the page reports <strong>Parking ratio</strong> = 10000 : 1000.</li><li>Feed in Rentable area = 30 m2 and Parking spots = 100 and the page reports <strong>Parking ratio</strong> = 3333 : 1000.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>A unit chip is only useful if the conversion behind it is the right one, so here is what each chip on Parking ratio actually offers.</p><ul><li><strong>square meters</strong> — opens in <em>m2</em>, and the chip also carries m², in², ft², yd², ac and ha. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>Two things follow. First, the unit you pick changes the label and the conversion, never the formula: 2 metres and 200 centimetres take exactly the same path through the arithmetic. Second, a unit that is not in the table cannot be entered — if your measurement is in something else, convert it once, by hand, before typing it in.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Rentable area and Parking spots ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Rentable area — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Parking ratio in : 1000 against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Parking ratio follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover square meters. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Rentable area and Parking spots is what you already know and Parking ratio is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/defensive-interval-ratio">Defensive interval ratio Calculator</a>, <a href="/finance/deferred-annuity">Deferred annuity Calculator</a> and <a href="/finance/deferred-payment-loan">Deferred payment loan Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Parking ratio calculator work out?', 'a' => 'Parking ratio, from Parking spots and Rentable area. The relationship is Parking ratio = 1000 × Parking spots ÷ Rentable area.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Rentable area (square meters), Parking spots. Fill rentable area and parking spots and leave Parking ratio empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Parking ratio, Rentable area and Parking spots blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'Parking ratio = 10000 : 1000. The figures come from Rentable area as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Parking ratio is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Rentable area blank and the page solves for it, reporting Parking ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Parking ratio keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/defensive-interval-ratio', 'name' => 'Defensive interval ratio Calculator'],
            ['path' => '/finance/deferred-annuity', 'name' => 'Deferred annuity Calculator'],
            ['path' => '/finance/deferred-payment-loan', 'name' => 'Deferred payment loan Calculator'],
        ],
        'authors' => [],
    ],
];
