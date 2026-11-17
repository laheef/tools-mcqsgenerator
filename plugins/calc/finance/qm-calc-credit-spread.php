<?php

/**
 * Credit spread
 * /finance/credit-spread
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Credit spread',
    'meta' => ['title' => 'Credit spread Calculator — Formula, Units & Example', 'description' => 'Enter corporate bond yield and government bond yield and get credit spread back. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Credit spread Calculator', 'updated' => '2026-09-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'corporate_yield',
                            'label' => 'Corporate bond yield',
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
                            'name' => 'government_yield',
                            'label' => 'Government bond yield',
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
                            'name' => 'credit_spread',
                            'label' => 'Credit spread',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'basis-point',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'credit_spread = corporate_yield - government_yield',
            'results' => ['corporate_yield' => 'credit_spread + government_yield', 'credit_spread' => 'corporate_yield - government_yield', 'government_yield' => 'corporate_yield - credit_spread'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Credit spread turns Corporate bond yield and Government bond yield into Credit spread. The arithmetic is the whole method: credit spread is worked out from corporate bond yield by one formula, applied once. Credit spread comes back in basis point unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Credit spread calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Credit spread: it takes 2 numbers and reports Credit spread.</p><p>The relationship it solves reads Credit spread = Corporate bond yield − Government bond yield.</p><p>The answers are Credit spread; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Corporate bond yield</strong> — in percent</li><li><strong>Government bond yield</strong> — in percent</li></ul><p>The answer comes back as Credit spread in basis point. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Corporate bond yield = 10 perc and Government bond yield = 100 perc gives <strong>Credit spread</strong> = -90 basis-point.</p><ul><li><strong>Credit spread</strong> = -90 basis-point</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Credit spread</strong> = <code>Corporate bond yield − Government bond yield</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Credit spread</strong> = -90 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>Units are handled before the formula runs: Credit spread offers 6 units and opens on basis point, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Credit spread</strong> = <code>Corporate bond yield − Government bond yield</code></li><li><strong>Corporate bond yield</strong> = <code>Credit spread + Government bond yield</code></li><li><strong>Government bond yield</strong> = <code>Corporate bond yield − Credit spread</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Credit spread</strong> = <code>Corporate bond yield − Government bond yield</code> — the form to use when Corporate bond yield and Government bond yield are the values you have.</li><li><strong>Corporate bond yield</strong> = <code>Credit spread + Government bond yield</code> — the form to use when Credit spread and Government bond yield are the values you have.</li><li><strong>Government bond yield</strong> = <code>Corporate bond yield − Credit spread</code> — the form to use when Corporate bond yield and Credit spread are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Credit spread, Corporate bond yield and Government bond yield can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Corporate bond yield, from 10 to 20 — and the answers go from <strong>Credit spread</strong> -90 basis-point to <strong>Credit spread</strong> -80 basis-point.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Corporate bond yield and Government bond yield is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Credit spread is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Corporate bond yield left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Corporate bond yield is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Government bond yield left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Government bond yield is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Corporate bond yield is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Corporate bond yield</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Credit spread and Government bond yield. Have it to hand before you start: Corporate bond yield is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Government bond yield</strong> is a percent quantity: the page opens it in perc and converts anything else you pick before the formula runs. It feeds Corporate bond yield and Credit spread. Have it to hand before you start: Government bond yield is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Credit spread</strong> is a basis point figure and the page's own defaults put it at -90 basis-point. It is worked out from Corporate bond yield and Government bond yield. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Credit spread</th></tr></thead><tbody><tr><td><strong>Corporate bond yield</strong> +10%</td><td>+1.11%</td></tr><tr><td><strong>Government bond yield</strong> +10%</td><td>-11.11%</td></tr></tbody></table><p>Ranked by leverage, Government bond yield sits at the top — a ten per cent error in that box shows up as roughly 11.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>One example proves the page computes. Two more show what it does when the inputs change, which is what a reader usually wants to know before trusting it:</p><ul><li>With Corporate bond yield = 5 perc and Government bond yield = 50 perc, the answer is <strong>Credit spread</strong> = -45 basis-point.</li><li>With Corporate bond yield = 30 perc and Government bond yield = 100 perc, the answer is <strong>Credit spread</strong> = -70 basis-point.</li></ul><p>Read the three runs side by side and the shape of the relationship is visible without reading the formula: halving every input does not halve the answer, because the inputs do not all sit in the numerator.</p>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>basis point</strong> — opens in <em>basis-point</em>, and the chip also carries %/yr, bps, ‱ and ‰. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Corporate bond yield and Government bond yield. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Corporate bond yield into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Credit spread in basis-point with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Credit spread follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover basis point. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Corporate bond yield and Government bond yield measured, Credit spread wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Two more from the same section come up alongside this one: <a href="/finance/ebitda-margin">EBITDA margin Calculator</a>, <a href="/finance/ebitda-multiple">EBITDA multiple</a> and <a href="/finance/economic-injury-disaster-loan">Economic Injury Disaster Loan Emergency Advance … Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Credit spread calculator work out?', 'a' => 'Credit spread, from Corporate bond yield and Government bond yield. The relationship is Credit spread = Corporate bond yield − Government bond yield.'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Corporate bond yield (percent), Government bond yield (percent). Fill corporate bond yield and government bond yield and leave Credit spread empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Credit spread, Corporate bond yield and Government bond yield can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Credit spread = -90 basis-point. The figures come from Corporate bond yield as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Credit spread is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Corporate bond yield left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Credit spread keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/ebitda-margin', 'name' => 'EBITDA margin Calculator'],
            ['path' => '/finance/ebitda-multiple', 'name' => 'EBITDA multiple'],
            ['path' => '/finance/economic-injury-disaster-loan', 'name' => 'Economic Injury Disaster Loan Emergency Advance … Calculator'],
        ],
        'authors' => [],
    ],
];
