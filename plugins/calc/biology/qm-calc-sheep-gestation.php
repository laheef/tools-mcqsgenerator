<?php

/**
 * Sheep gestation
 * /biology/sheep-gestation
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sheep gestation',
    'meta' => ['title' => 'Sheep gestation — Formula, Steps & Examples', 'description' => <<<'TXT'
    Sheep gestation takes lambing date 🐏 and returns mating date 🐑 and initialLambing. Each box lists the units it accepts, and the answer converts between them.
    TXT, 'h1' => 'Sheep gestation Calculator', 'updated' => '2026-08-06'],
    'raw' => [
        'vars' => [
            'finalLambing' => ['type' => 'date', 'rnd' => null],
            'initialLambing' => ['type' => 'date', 'rnd' => null],
            'lambing_date' => ['type' => 'date', 'rnd' => null],
            'mating_date' => ['type' => 'date', 'rnd' => null],
        ],
        'groups' => [
            [
                'uid' => 'sxJ_GOM1d0su0YcNkxLAH',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'mating_date', 'vt' => 'date', 'l' => 'Mating date 🐑'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'lambing_date', 'vt' => 'date', 'l' => 'Lambing date 🐏'],
                            ],
                        ],
                    ],
                    [
                        'FR1',
                        [
                            [
                                [
                                    't' => 'x',
                                    'c' => [
                                        [null, 'You may expect the lamb to be born between {{initialLambing.longValue}} and {{finalLambing.longValue}}.'],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'uid' => 'EvK-ryZpHEtWGrvIFuNFH',
                'title' => '',
                'desc' => '',
                'm' => [
                    [
                        'FR1_FR1',
                        [
                            [
                                ['t' => 'v', 'n' => 'initialLambing', 'vt' => 'date', 'l' => ''],
                            ],
                            [
                                ['t' => 'v', 'n' => 'finalLambing', 'vt' => 'date', 'l' => ''],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'eq' => [
            [
                'formula' => 'lambing_date = mating_date + 147',
                'var' => [
                    [
                        'l' => 'mating_date',
                        'f' => 'lambing_date - 147',
                        'r' => ['lambing_date'],
                    ],
                    [
                        'l' => 'lambing_date',
                        'f' => 'mating_date + 147',
                        'r' => ['mating_date'],
                    ],
                ],
            ],
            [
                'formula' => 'initialLambing = mating_date + 142',
                'var' => [
                    [
                        'l' => 'mating_date',
                        'f' => 'initialLambing - 142',
                        'r' => ['initialLambing'],
                    ],
                    [
                        'l' => 'initialLambing',
                        'f' => 'mating_date + 142',
                        'r' => ['mating_date'],
                    ],
                ],
            ],
            [
                'formula' => 'finalLambing = mating_date + 152',
                'var' => [
                    [
                        'l' => 'mating_date',
                        'f' => 'finalLambing - 152',
                        'r' => ['finalLambing'],
                    ],
                    [
                        'l' => 'finalLambing',
                        'f' => 'mating_date + 152',
                        'r' => ['mating_date'],
                    ],
                ],
            ],
        ],
        'datasets' => [],
        'js' => '"use strict";//# sourceURL=customJs.js',
    ],
    'article' => [
        'intro' => <<<'TXT'
        Sheep gestation takes Lambing date 🐏 and returns Mating date 🐑 and initialLambing. The arithmetic is the whole method: mating date 🐑 is worked out from lambing date 🐏 by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Sheep gestation calculator works', 'html' => <<<'TXT'
            <p>Sheep gestation answers one question from 1 number, and the answer is Mating date 🐑, initialLambing and finalLambing.</p><p>The relationship it solves reads Mating date 🐑 = Lambing date 🐏 − 147.</p><p>What comes back is Mating date 🐑, initialLambing and finalLambing — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 1 box to fill in; every one of them is used by the formula.</p><ul><li><strong>Lambing date 🐏</strong> — a plain number, no unit, entered as a date</li></ul><p>The answers come back as Mating date 🐑, initialLambing, finalLambing. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>With the defaults in place, Lambing date 🐏 = 1.772e+12 gives <strong>Mating date 🐑</strong> = 1.760e+12, <strong>initialLambing</strong> = 1.772e+12 and <strong>finalLambing</strong> = 1.773e+12.</p><ul><li><strong>Mating date 🐑</strong> = 1.760e+12</li><li><strong>initialLambing</strong> = 1.772e+12</li><li><strong>finalLambing</strong> = 1.773e+12</li></ul><p>The line behind those figures is <strong>Mating date 🐑</strong> = <code>Lambing date 🐏 − 147</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Mating date 🐑</strong> = 1.760e+12, <strong>initialLambing</strong> = 1.772e+12 and <strong>finalLambing</strong> = 1.773e+12 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Mating date 🐑 takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Mating date 🐑</strong> = <code>Lambing date 🐏 − 147</code></li><li><strong>Lambing date 🐏</strong> = <code>Mating date 🐑 + 147</code></li><li><strong>initialLambing</strong> = <code>Mating date 🐑 + 142</code></li><li><strong>finalLambing</strong> = <code>Mating date 🐑 + 152</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Mating date 🐑</strong> = <code>Lambing date 🐏 − 147</code> — the form to use when Lambing date 🐏 are the values you have.</li><li><strong>Lambing date 🐏</strong> = <code>Mating date 🐑 + 147</code> — the form to use when Mating date 🐑 are the values you have.</li><li><strong>Mating date 🐑</strong> = <code>initialLambing − 142</code> — the form to use when initialLambing are the values you have.</li><li><strong>initialLambing</strong> = <code>Mating date 🐑 + 142</code> — the form to use when Mating date 🐑 are the values you have.</li><li><strong>Mating date 🐑</strong> = <code>finalLambing − 152</code> — the form to use when finalLambing are the values you have.</li><li><strong>finalLambing</strong> = <code>Mating date 🐑 + 152</code> — the form to use when Mating date 🐑 are the values you have.</li></ul><p>Any one of Mating date 🐑, Lambing date 🐏 and initialLambing can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Lambing date 🐏, from 1.772e+12 to 3.545e+12 — and the answers go from <strong>Mating date 🐑</strong> 1.760e+12, <strong>initialLambing</strong> 1.772e+12 and <strong>finalLambing</strong> 1.773e+12 to <strong>Mating date 🐑</strong> 3.532e+12, <strong>initialLambing</strong> 3.544e+12 and <strong>finalLambing</strong> 3.545e+12.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Mating date 🐑, initialLambing and finalLambing are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Lambing date 🐏 left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Lambing date 🐏 is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Entering a rounded value is fine; rounding twice is not. Keep full precision in Lambing date 🐏 and let the panel round the answer once.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Sheep gestation form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Lambing date 🐏</strong> takes a plain number with no unit attached. The page reads it when it works out Mating date 🐑. Fill it from a measurement rather than a memory — Lambing date 🐏 is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 3 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Mating date 🐑</strong> is a plain number and the page's own defaults put it at 1.760e+12. The value follows from Lambing date 🐏. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>initialLambing</strong> is a plain number and the page's own defaults put it at 1.772e+12. The value follows from Mating date 🐑. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>finalLambing</strong> is a plain number and the page's own defaults put it at 1.773e+12. The value follows from Mating date 🐑. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Mating date 🐑</th><th>initialLambing</th><th>finalLambing</th></tr></thead><tbody><tr><td><strong>Lambing date 🐏</strong> +10%</td><td>+10.07%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Lambing date 🐏 sits at the top — a ten per cent error in that box shows up as roughly 10.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Lambing date 🐏 = 8.862e+11 and the page reports <strong>Mating date 🐑</strong> = 8.735e+11, <strong>initialLambing</strong> = 8.857e+11 and <strong>finalLambing</strong> = 8.866e+11.</li><li>Feed in Lambing date 🐏 = 5.317e+12 and the page reports <strong>Mating date 🐑</strong> = 5.304e+12, <strong>initialLambing</strong> = 5.317e+12 and <strong>finalLambing</strong> = 5.317e+12.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Lambing date 🐏 ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Lambing date 🐏 — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Mating date 🐑 against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Mating date 🐑 follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It counts in whole days.</strong> The differences are counted in whole days, so an answer is a date or a number of days rather than an interval in hours. Expect a day&#039;s uncertainty if the event itself happened at an unknown time.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Lambing date 🐏 is what you already know and Mating date 🐑 and initialLambing is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dna-concentration">DNA concentration</a>, <a href="/biology/dna-copy-number">DNA copy number Calculator</a> and <a href="/biology/dna-molarity-calculator">DNA Molarity Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Sheep gestation is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Sheep gestation calculator work out?', 'a' => 'Mating date 🐑, initialLambing and finalLambing, from Lambing date 🐏. The relationship is Mating date 🐑 = Lambing date 🐏 − 147.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Lambing date 🐏. Enter lambing date 🐏; Mating date 🐑 is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Mating date 🐑, Lambing date 🐏, initialLambing and finalLambing blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Mating date 🐑 = 1.760e+12, initialLambing = 1.772e+12 and finalLambing = 1.773e+12. The figures come from Lambing date 🐏 as the page opens it; they are a starting point, not a fixed answer.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Mating date 🐑 is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Lambing date 🐏 blank and the page solves for it, reporting Mating date 🐑 instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Mating date 🐑 keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dna-concentration', 'name' => 'DNA concentration'],
            ['path' => '/biology/dna-copy-number', 'name' => 'DNA copy number Calculator'],
            ['path' => '/biology/dna-molarity-calculator', 'name' => 'DNA Molarity Calculator'],
        ],
        'authors' => [],
    ],
];
