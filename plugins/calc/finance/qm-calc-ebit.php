<?php

/**
 * EBIT
 * /finance/ebit
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'EBIT',
    'meta' => ['title' => 'EBIT Calculator — Free, With Worked Examples', 'description' => 'Enter revenue and operating expenses and get EBIT back. Any box can be the unknown. A worked example walks through the arithmetic with this page\'s own numbers.', 'h1' => 'EBIT Calculator', 'updated' => '2026-09-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'revenue',
                            'label' => 'Revenue',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'operating_expenses',
                            'label' => 'Operating expenses',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'EBIT',
                            'label' => 'EBIT',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'EBIT = revenue - operating_expenses ',
            'results' => ['revenue' => 'EBIT + operating_expenses', 'operating_expenses' => '-EBIT + revenue', 'EBIT' => '-operating_expenses + revenue'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        EBIT turns Revenue and Operating expenses into EBIT. Nothing is looked up on this page: EBIT is computed from revenue and the other boxes, so an unusual pair of values gives an honest answer rather than an error. EBIT is opened in USD; the chip beside it switches to any unit of the same quantity.
        TXT,
        'sections' => [
            ['title' => 'How the EBIT calculator works', 'html' => <<<'TXT'
            <p>EBIT answers one question from 2 numbers, and the answer is EBIT.</p><p>In the form&#039;s own words, EBIT = − Operating expenses + Revenue.</p><p>The answers are EBIT; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Revenue</strong> — in USD</li><li><strong>Operating expenses</strong> — in USD</li></ul><p>The answer comes back as EBIT in USD. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Revenue = 10 USD and Operating expenses = 100 USD — through the same formula and the panel reports <strong>EBIT</strong> = -90 USD.</p><ul><li><strong>EBIT</strong> = -90 USD</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>EBIT</strong> = <code>− Operating expenses + Revenue</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>EBIT</strong> = -90 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: EBIT takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>EBIT</strong> = <code>− Operating expenses + Revenue</code></li><li><strong>Revenue</strong> = <code>EBIT + Operating expenses</code></li><li><strong>Operating expenses</strong> = <code>− EBIT + Revenue</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>EBIT</strong> = <code>− Operating expenses + Revenue</code> — the form to use when Operating expenses and Revenue are the values you have.</li><li><strong>Revenue</strong> = <code>EBIT + Operating expenses</code> — the form to use when EBIT and Operating expenses are the values you have.</li><li><strong>Operating expenses</strong> = <code>− EBIT + Revenue</code> — the form to use when EBIT and Revenue are the values you have.</li></ul><p>Any one of EBIT, Revenue and Operating expenses can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Revenue, from 10 to 20 — and the answers go from <strong>EBIT</strong> -90 USD to <strong>EBIT</strong> -80 USD.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with EBIT is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Revenue left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Revenue is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Operating expenses left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Operating expenses is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Revenue is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Revenue</strong> takes a plain number with no unit attached. The page reads it when it works out Operating expenses and EBIT. Have it to hand before you start: Revenue is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Operating expenses</strong> takes a plain number with no unit attached. The page reads it when it works out Revenue and EBIT. Have it to hand before you start: Operating expenses is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>EBIT</strong> is a plain number and the page's own defaults put it at -90. It is worked out from Operating expenses and Revenue. Read it as an order of magnitude first and a decimal second: a result that is out by a factor of ten usually means a unit or a decimal point, not a formula that has stopped working. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>EBIT</th></tr></thead><tbody><tr><td><strong>Revenue</strong> +10%</td><td>+1.11%</td></tr><tr><td><strong>Operating expenses</strong> +10%</td><td>-11.11%</td></tr></tbody></table><p>Ranked by leverage, Operating expenses sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Revenue = 5 USD and Operating expenses = 50 USD, the answer is <strong>EBIT</strong> = -45 USD.</li><li>With Revenue = 30 USD and Operating expenses = 100 USD, the answer is <strong>EBIT</strong> = -70 USD.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Revenue and Operating expenses. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Revenue into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare EBIT in USD with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> EBIT follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Revenue and Operating expenses is what you already know and EBIT is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/gst-qst">GST/QST Calculator</a>, <a href="/finance/hedge-ratio">Hedge ratio Calculator</a> and <a href="/finance/heloc">HELOC Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what EBIT is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Revenue and Operating expenses beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the EBIT calculator work out?', 'a' => 'EBIT, from Operating expenses and Revenue. The relationship is EBIT = − Operating expenses + Revenue.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Revenue (USD), Operating expenses (USD). Fill revenue and operating expenses and leave EBIT empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of EBIT, Revenue and Operating expenses blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'What answer do the default values give?', 'a' => 'EBIT = -90 USD. Those are the defaults written into the form — move Revenue and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            EBIT is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Revenue left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. EBIT keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/gst-qst', 'name' => 'GST/QST Calculator'],
            ['path' => '/finance/hedge-ratio', 'name' => 'Hedge ratio Calculator'],
            ['path' => '/finance/heloc', 'name' => 'HELOC Calculator'],
        ],
        'authors' => [],
    ],
];
