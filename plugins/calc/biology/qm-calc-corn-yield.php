<?php

/**
 * Corn yield
 * /biology/corn-yield
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Corn yield',
    'meta' => ['title' => 'Corn yield Calculator — Formula, Units & Example', 'description' => 'The page has no way to flag an estimate, and the answer will read exactly as confidently either way.Yield per acre left as a guess. Anything typed into Yield…', 'h1' => 'Corn yield Calculator', 'updated' => '2026-08-12'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => '🌽 You will need the results of a 1/1000 acre sample to use this calculator. 💲 Expand the Profit section to find out your total profit!'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'kpe',
                            'label' => 'Kernels per ear',
                            'type' => 'number',
                            'help' => 'The average number of kernels per ear based on your sample. A typical ear has around 800 kernels.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '800',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ears',
                            'label' => 'Ears in a sample',
                            'type' => 'number',
                            'help' => 'Number of ears of corn in a 1/1000 acre sample.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'area',
                            'label' => 'Size of the field',
                            'type' => 'number',
                            'unit' => '28',
                            'unit_default' => 'acre',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'size',
                            'label' => 'Size of the kernels',
                            'type' => 'select',
                            'options' => ['Small' => '120000', 'Medium' => '90000', 'Large' => '80000'],
                            'dataset' => 'sizeDS',
                            'default' => 'Medium',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'corn',
                            'label' => 'Yield per acre',
                            'type' => 'number',
                            'suffix' => 'bushels',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_yield',
                            'label' => 'Total yield',
                            'type' => 'number',
                            'suffix' => 'bushels',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Profit',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'price',
                            'label' => 'Price per bushel',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'profit',
                            'label' => 'Profit 💵',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => '(kpe * ears * 1000) / (size) = corn',
            'results' => ['size' => '1000*ears*kpe/corn', 'kpe' => '(1/1000)*corn*size/ears', 'ears' => '(1/1000)*corn*size/kpe', 'corn' => '1000*ears*kpe/size'],
        ],
        [
            'title' => 'corn * area = total_yield',
            'results' => ['total_yield' => 'area*corn', 'area' => 'total_yield/corn', 'corn' => 'total_yield/area'],
        ],
        [
            'title' => 'total_yield * price = profit',
            'results' => ['price' => 'profit/total_yield', 'total_yield' => 'profit/price', 'profit' => 'price*total_yield'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Corn yield works out Size of the field and Size of the kernels from Kernels per ear, Ears in a sample and Yield per acre. The arithmetic is the whole method: Size of the field is worked out from Kernels per ear by one formula, applied once. Size of the field comes back in acres unless you switch the unit chip beside the box.
        TXT,
        'sections' => [
            ['title' => 'How the Corn yield calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Corn yield: it takes 3 numbers and reports Size of the field, Size of the kernels and Total yield.</p><p>Written with the labels from the form, Size of the kernels = 1000 × Ears in a sample × Kernels per ear ÷ Yield per acre.</p><p>What comes back is Size of the field, Size of the kernels, Total yield and Price per bushel — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Kernels per ear</strong> — a plain number, no unit. The average number of kernels per ear based on your sample. A typical ear has around 800 kernels.</li><li><strong>Ears in a sample</strong> — a plain number, no unit. Number of ears of corn in a 1/1000 acre sample.</li><li><strong>Yield per acre</strong> — in bushels</li></ul><p>The answers come back as Size of the field in acres, Size of the kernels, Total yield in bushels, Price per bushel in USD, Profit 💵. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Kernels per ear = 800, Ears in a sample = 100, Size of the field = 1000 acre, Yield per acre = 10 bushels, Total yield = 100 bushels, Price per bushel = 1000 USD and Profit 💵 = 10 — through the same formula and the panel reports &lt;strong&gt;Size of the kernels&lt;/strong&gt; = 90000.</p><ul><li><strong>Size of the kernels</strong> = 90000</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Size of the kernels</strong> = <code>1000 × Ears in a sample × Kernels per ear ÷ Yield per acre</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give &lt;strong&gt;Size of the kernels&lt;/strong&gt; = 90000. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on Size of the field lists 24 options and opens on acres. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Size of the kernels</strong> = <code>1000 × Ears in a sample × Kernels per ear ÷ Yield per acre</code></li><li><strong>Kernels per ear</strong> = <code>(1 ÷ 1000) × Yield per acre × Size of the kernels ÷ Ears in a sample</code></li><li><strong>Ears in a sample</strong> = <code>(1 ÷ 1000) × Yield per acre × Size of the kernels ÷ Kernels per ear</code></li><li><strong>Yield per acre</strong> = <code>1000 × Ears in a sample × Kernels per ear ÷ Size of the kernels</code></li><li><strong>Total yield</strong> = <code>Size of the field × Yield per acre</code></li><li><strong>Size of the field</strong> = <code>Total yield ÷ Yield per acre</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Size of the kernels</strong> = <code>1000 × Ears in a sample × Kernels per ear ÷ Yield per acre</code> — the form to use when Ears in a sample, Kernels per ear and Yield per acre are the values you have.</li><li><strong>Kernels per ear</strong> = <code>(1 ÷ 1000) × Yield per acre × Size of the kernels ÷ Ears in a sample</code> — the form to use when Yield per acre, Size of the kernels and Ears in a sample are the values you have.</li><li><strong>Ears in a sample</strong> = <code>(1 ÷ 1000) × Yield per acre × Size of the kernels ÷ Kernels per ear</code> — the form to use when Yield per acre, Size of the kernels and Kernels per ear are the values you have.</li><li><strong>Yield per acre</strong> = <code>1000 × Ears in a sample × Kernels per ear ÷ Size of the kernels</code> — the form to use when Ears in a sample, Kernels per ear and Size of the kernels are the values you have.</li><li><strong>Total yield</strong> = <code>Size of the field × Yield per acre</code> — the form to use when Size of the field and Yield per acre are the values you have.</li><li><strong>Size of the field</strong> = <code>Total yield ÷ Yield per acre</code> — the form to use when Total yield and Yield per acre are the values you have.</li><li><strong>Yield per acre</strong> = <code>Total yield ÷ Size of the field</code> — the form to use when Total yield and Size of the field are the values you have.</li><li><strong>Price per bushel</strong> = <code>Profit 💵 ÷ Total yield</code> — the form to use when Profit 💵 and Total yield are the values you have.</li></ul><p>Any one of Size of the kernels, Kernels per ear and Ears in a sample can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Kernels per ear, from 800 to 1600 — and the answers go from &lt;strong&gt;Size of the kernels&lt;/strong&gt; 90000 to &lt;strong&gt;Size of the kernels&lt;/strong&gt; 90000.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Size of the field, Size of the kernels and Total yield are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Kernels per ear left as a guess.</strong> Anything typed into Kernels per ear is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Ears in a sample left as a guess.</strong> Anything typed into Ears in a sample is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Yield per acre left as a guess.</strong> Anything typed into Yield per acre is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Kernels per ear to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Kernels per ear</strong> takes a plain number with no unit attached. The average number of kernels per ear based on your sample. A typical ear has around 800 kernels. Change it and Size of the kernels, Ears in a sample and Yield per acre changes with it. Have it to hand before you start: Kernels per ear is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Ears in a sample</strong> takes a plain number with no unit attached. Number of ears of corn in a 1/1000 acre sample. Change it and Size of the kernels, Kernels per ear and Yield per acre changes with it. Have it to hand before you start: Ears in a sample is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Yield per acre</strong> is measured in bushels. Change it and Size of the kernels, Kernels per ear and Ears in a sample changes with it. Have it to hand before you start: Yield per acre is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Size of the field</strong> is a acres figure. It is worked out from Total yield and Yield per acre. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Size of the kernels</strong> is a plain number and the page's own defaults put it at 90000. It is worked out from Ears in a sample, Kernels per ear and Yield per acre. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total yield</strong> is a plain number. It is worked out from Size of the field and Yield per acre. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Price per bushel</strong> is a plain number. It is worked out from Profit 💵 and Total yield. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Profit 💵</strong> is a plain number. It is worked out from Price per bushel and Total yield. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>acres</strong> — 24 units. It opens in <em>acre</em>, and the chip also carries ac, m², ft², cm², in² and a. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Size of the field is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The chips cover acres. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Kernels per ear, Ears in a sample and Yield per acre is what you already know and Size of the field and Size of the kernels is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/biology/bird-age">Bird age</a>, <a href="/biology/bod-load">BOD Load Calculator</a> and <a href="/biology/bone-length-to-body-height">Bone Length to Body Height Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Corn yield calculator work out?', 'a' => <<<'TXT'
            Size of the field, Size of the kernels, Total yield and Price per bushel, from Ears in a sample, Kernels per ear and Yield per acre. The relationship is Size of the kernels = 1000 × Ears in a sample × Kernels per ear ÷ Yield per acre.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Kernels per ear, Ears in a sample, Yield per acre (bushels). Fill kpe, ears and corn and leave Size of the field empty if you would rather have that one solved instead.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Size of the kernels, Kernels per ear, Ears in a sample and Yield per acre blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => 'Size of the kernels = 90000. The figures come from Kernels per ear as the page opens it; they are a starting point, not a fixed answer.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Size of the field is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Kernels per ear left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Size of the field keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/bird-age', 'name' => 'Bird age'],
            ['path' => '/biology/bod-load', 'name' => 'BOD Load Calculator'],
            ['path' => '/biology/bone-length-to-body-height', 'name' => 'Bone Length to Body Height Calculator'],
        ],
        'authors' => [],
    ],
];
