<?php

/**
 * Real rate of return
 * /finance/real-rate-of-return
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Real rate of return',
    'meta' => ['title' => 'Real rate of return Calculator: Free, With Steps', 'description' => 'Enter nominal rate of return and inflation rate and get real rate of return back. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Real rate of return Calculator', 'updated' => '2026-09-27'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'NomRate',
                            'label' => 'Nominal rate of return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'InflRate',
                            'label' => 'Inflation rate',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'RealRate',
                            'label' => 'Real rate of return',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'RealRate = (1 + NomRate) / (1 + InflRate) - 1',
            'results' => ['RealRate' => '(-InflRate + NomRate)/(InflRate + 1)', 'InflRate' => '(NomRate - RealRate)/(RealRate + 1)', 'NomRate' => 'InflRate*RealRate + InflRate + RealRate'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Real rate of return works out Real rate of return from Nominal rate of return and Inflation rate. Nothing is looked up on this page: real rate of return is computed from nominal rate of return and the other boxes, so an unusual pair of values gives an honest answer rather than an error. Real rate of return is opened in percent; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the Real rate of return calculator works', 'html' => <<<'TXT'
            <p>The Real rate of return calculator applies one relationship to 2 numbers and reports Real rate of return.</p><p>The relationship it solves reads Real rate of return = ( − Inflation rate + Nominal rate of return) ÷ (Inflation rate + 1).</p><p>What comes back is Real rate of return — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Nominal rate of return</strong> — in percent</li><li><strong>Inflation rate</strong> — in percent</li></ul><p>The answer comes back as Real rate of return in percent. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Nominal rate of return = 10 perc and Inflation rate = 100 perc gives <strong>Real rate of return</strong> = -0.8911 perc.</p><ul><li><strong>Real rate of return</strong> = -0.8911 perc</li></ul><p>That is <strong>Real rate of return</strong> = <code>( − Inflation rate + Nominal rate of return) ÷ (Inflation rate + 1)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Real rate of return</strong> = -0.8911. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Real rate of return lists 6 options and opens on percent. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Real rate of return</strong> = <code>( − Inflation rate + Nominal rate of return) ÷ (Inflation rate + 1)</code></li><li><strong>Inflation rate</strong> = <code>(Nominal rate of return − Real rate of return) ÷ (Real rate of return + 1)</code></li><li><strong>Nominal rate of return</strong> = <code>Inflation rate × Real rate of return + Inflation rate + Real rate of return</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Real rate of return</strong> = <code>( − Inflation rate + Nominal rate of return) ÷ (Inflation rate + 1)</code> — the form to use when Inflation rate and Nominal rate of return are the values you have.</li><li><strong>Inflation rate</strong> = <code>(Nominal rate of return − Real rate of return) ÷ (Real rate of return + 1)</code> — the form to use when Nominal rate of return and Real rate of return are the values you have.</li><li><strong>Nominal rate of return</strong> = <code>Inflation rate × Real rate of return + Inflation rate + Real rate of return</code> — the form to use when Inflation rate and Real rate of return are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Real rate of return, Inflation rate and Nominal rate of return can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Nominal rate of return, from 10 to 20 — and the answers go from <strong>Real rate of return</strong> -0.8911 perc to <strong>Real rate of return</strong> -0.7921 perc.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Nominal rate of return and Inflation rate carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> Real rate of return is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Nominal rate of return left as a guess.</strong> Anything typed into Nominal rate of return is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Inflation rate left as a guess.</strong> Anything typed into Inflation rate is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Nominal rate of return and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Nominal rate of return</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Real rate of return and Inflation rate changes with it. Have it to hand before you start: Nominal rate of return is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Inflation rate</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. Change it and Real rate of return and Nominal rate of return changes with it. Have it to hand before you start: Inflation rate is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Real rate of return</strong> is a percent figure and the page's own defaults put it at -0.8911 perc. It is computed from Inflation rate and Nominal rate of return, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Real rate of return</th></tr></thead><tbody><tr><td><strong>Nominal rate of return</strong> +10%</td><td>+1.11%</td></tr><tr><td><strong>Inflation rate</strong> +10%</td><td>-1.1%</td></tr></tbody></table><p>The steepest column belongs to Nominal rate of return: ten per cent there moves an answer by about 1.1 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Nominal rate of return = 5 perc and Inflation rate = 50 perc, the answer is <strong>Real rate of return</strong> = -0.8824 perc.</li><li>With Nominal rate of return = 30 perc and Inflation rate = 100 perc, the answer is <strong>Real rate of return</strong> = -0.6931 perc.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>percent</strong> — opens in <em>perc</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Real rate of return is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Nominal rate of return and Inflation rate measured, Real rate of return wanted.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/peg-ratio">PEG ratio</a>, <a href="/finance/pence-to-pounds">Pence to pounds converter Calculator</a> and <a href="/finance/percent-off">Percent off Calculator</a>.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Real rate of return is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Nominal rate of return and Inflation rate beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Real rate of return calculator work out?', 'a' => <<<'TXT'
            Real rate of return, from Inflation rate and Nominal rate of return. The relationship is Real rate of return = ( − Inflation rate + Nominal rate of return) ÷ (Inflation rate + 1).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Nominal rate of return (percent), Inflation rate (percent). Fill nominal rate of return and inflation rate and leave Real rate of return empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Real rate of return, Inflation rate and Nominal rate of return can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Real rate of return = -0.8911 perc. That comes from the page's own defaults, entered in Nominal rate of return; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Real rate of return is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Nominal rate of return left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'No — the rounding you see is formatting applied to Real rate of return at the moment it is drawn.'],
        ],
        'related' => [
            ['path' => '/finance/peg-ratio', 'name' => 'PEG ratio'],
            ['path' => '/finance/pence-to-pounds', 'name' => 'Pence to pounds converter Calculator'],
            ['path' => '/finance/percent-off', 'name' => 'Percent off Calculator'],
        ],
        'authors' => [],
    ],
];
