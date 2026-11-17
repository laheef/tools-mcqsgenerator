<?php

/**
 * Bradford factor
 * /finance/bradford-factor
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Bradford factor',
    'meta' => ['title' => 'Bradford factor Calculator — Formula, Units & Example', 'description' => 'Enter # of times absent (S) and Days absent (D) and get Bradford factor (B) back. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Bradford factor Calculator', 'updated' => '2026-09-22'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sessions',
                            'label' => '# of times absent (S)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'days',
                            'label' => 'Days absent (D)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bradfordFactor',
                            'label' => 'Bradford factor (B)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'bradfordFactor<=50 ', 'text' => 'This score is what you can expect of a typical employee . There is no cause for concern.'],
                                ['when' => ' 50<bradfordFactor<=200 ', 'text' => 'Hmmm, that figure is a bit high . You need to monitor this employee to ensure this does not get worst. Consider giving the employee a verbal warning.'],
                                ['when' => ' 200<bradfordFactor<=400 ', 'text' => 'There is cause for concern here . This definitely warrants an investigation. We recommend written warning as a follow up action.'],
                                ['when' => '400<bradfordFactor<=600', 'text' => 'This is serious . You cannot ignore it. A final written warning is required.'],
                                ['when' => 'bradfordFactor>600', 'text' => 'No, no, no, no. This is beyond what is acceptable! It is time to consider terminating this association.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'bradfordFactor = sessions^2*days',
            'results' => ['sessions' => 'sqrt(bradfordFactor/days)', 'days' => 'bradfordFactor/pow(sessions, 2)', 'bradfordFactor' => 'days*pow(sessions, 2)'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Enter # of times absent (S) and Days absent (D) into Bradford factor and the answer comes back as Bradford factor (B). There is no hidden constant here: change bradford factor (B) and # of times absent (S) moves with it.
        TXT,
        'sections' => [
            ['title' => 'How the Bradford factor calculator works', 'html' => <<<'TXT'
            <p>Bradford factor answers one question from 2 numbers, and the answer is Bradford factor (B).</p><p>The relationship it solves reads Bradford factor (B) = Days absent (D) × (# of times absent (S))^(2).</p><p>The answers are Bradford factor (B); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong># of times absent (S)</strong> — a plain number, no unit</li><li><strong>Days absent (D)</strong> — a plain number, no unit</li></ul><p>The answer comes back as Bradford factor (B). The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — # of times absent (S) = 10 and Days absent (D) = 100 — through the same formula and the panel reports <strong>Bradford factor (B)</strong> = 10000.</p><ul><li><strong>Bradford factor (B)</strong> = 10000</li></ul><p>The line behind those figures is <strong>Bradford factor (B)</strong> = <code>Days absent (D) × (# of times absent (S))^(2)</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>Bradford factor (B)</strong> = 10000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Bradford factor (B) is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Bradford factor (B)</strong> = <code>Days absent (D) × (# of times absent (S))^(2)</code></li><li><strong># of times absent (S)</strong> = <code>√(Bradford factor (B) ÷ Days absent (D))</code></li><li><strong>Days absent (D)</strong> = <code>Bradford factor (B) ÷ (# of times absent (S))^(2)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Bradford factor (B)</strong> = <code>Days absent (D) × (# of times absent (S))^(2)</code> — the form to use when Days absent (D) and # of times absent (S) are the values you have.</li><li><strong># of times absent (S)</strong> = <code>√(Bradford factor (B) ÷ Days absent (D))</code> — the form to use when Bradford factor (B) and Days absent (D) are the values you have.</li><li><strong>Days absent (D)</strong> = <code>Bradford factor (B) ÷ (# of times absent (S))^(2)</code> — the form to use when Bradford factor (B) and # of times absent (S) are the values you have.</li></ul><p>Any one of Bradford factor (B), # of times absent (S) and Days absent (D) can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double # of times absent (S) from 10 to 20, leaving every other box alone. The panel moves from <strong>Bradford factor (B)</strong> 10000 to <strong>Bradford factor (B)</strong> 40000.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Bradford factor (B) is a result, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong># of times absent (S) left as a guess.</strong> Anything typed into # of times absent (S) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Days absent (D) left as a guess.</strong> Anything typed into Days absent (D) is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If # of times absent (S) is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Bradford factor form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong># of times absent (S)</strong> takes a plain number with no unit attached. The page reads it when it works out Days absent (D) and Bradford factor (B). Fill it from a measurement rather than a memory — # of times absent (S) is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Days absent (D)</strong> takes a plain number with no unit attached. The page reads it when it works out # of times absent (S) and Bradford factor (B). Fill it from a measurement rather than a memory — Days absent (D) is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Bradford factor (B)</strong> is a plain number and the page's own defaults put it at 10000. It is worked out from Days absent (D) and # of times absent (S). Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>Bradford factor (B)</th></tr></thead><tbody><tr><td><strong># of times absent (S)</strong> +10%</td><td>+21%</td></tr><tr><td><strong>Days absent (D)</strong> +10%</td><td>+10%</td></tr></tbody></table><p>The steepest column belongs to # of times absent (S): ten per cent there moves an answer by about 21 per cent, which is why that is the number to measure twice. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in # of times absent (S) = 5 and Days absent (D) = 50 and the page reports <strong>Bradford factor (B)</strong> = 1250.</li><li>Feed in # of times absent (S) = 30 and Days absent (D) = 100 and the page reports <strong>Bradford factor (B)</strong> = 90000.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have # of times absent (S) and Days absent (D) ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with # of times absent (S) — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Bradford factor (B) against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Because the relationship behind Bradford factor (B) is not linear, doubling an input does not double the answer, and the error from a rounded input grows near the ends of the range. Use the check-by-hand section above at your own numbers rather than extrapolating from the defaults.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are # of times absent (S) and Days absent (D) and the number you are missing is Bradford factor (B).</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/finance/emergency-fund">Emergency fund Calculator</a>, <a href="/finance/emi">EMI Calculator</a> and <a href="/finance/emv">EMV (expected monetary value) Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>Bradford factor is a calculator, not an article with a form attached: the numbers in the panel come from the formulas on this page, applied to whatever is in the boxes, and nothing is looked up in a table.</p><p>Its own defaults are run through its own formulas every time the page is built, so the examples above are not illustrations: if the relationship changed, the numbers in the article would change with it, and a page whose arithmetic stopped agreeing with its text would fail the check rather than quietly drift.</p><p>What the page keeps is nothing. The calculation is unchanged between visits. has no account, no history and no server-side record of what you typed; the fields hold your numbers for as long as the tab is open, and the share button builds a link from them only if you ask it to.</p><p>It belongs to the same catalogue as the rest of the site, and follows the same rule as all of them: the formula is printed, the working is shown, and the answer can be checked by hand if you want to.</p><p>The formula is printed in full above precisely so that the page can be argued with. Compare it with the reference you are working from; if they differ, the difference will be in a constant or a unit, and both are visible in the text.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Bradford factor calculator work out?', 'a' => 'Bradford factor (B), from Days absent (D) and # of times absent (S). The relationship is Bradford factor (B) = Days absent (D) × (# of times absent (S))^(2).'],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            # of times absent (S), Days absent (D). Fill # of times absent (S) and days absent (D) and leave Bradford factor (B) empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Bradford factor (B), # of times absent (S) and Days absent (D) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Bradford factor (B) = 10000. Those are the defaults written into the form — move # of times absent (S) and every result box follows.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Bradford factor (B) is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave # of times absent (S) blank and the page solves for it, reporting Bradford factor (B) instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Bradford factor (B) keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/finance/emergency-fund', 'name' => 'Emergency fund Calculator'],
            ['path' => '/finance/emi', 'name' => 'EMI Calculator'],
            ['path' => '/finance/emv', 'name' => 'EMV (expected monetary value) Calculator'],
        ],
        'authors' => [],
    ],
];
