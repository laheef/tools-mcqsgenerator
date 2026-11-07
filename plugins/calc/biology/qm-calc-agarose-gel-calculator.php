<?php

/**
 * Agarose Gel Calculator (gel percentage and loading)
 * /biology/agarose-gel-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Agarose Gel Calculator (gel percentage and loading)',
    'meta' => ['title' => 'Agarose Gel (gel percentage and loading) Calculator', 'description' => 'The agarose percentage decides which fragment sizes resolve, and the number of lanes decides how much gel and buffer you need. It returns agarose to weigh…', 'h1' => 'Agarose Gel Calculator (gel percentage and loading)', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'percent',
                            'label' => 'Agarose percentage',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => '1% for 0.5–10 kb',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                        [
                            'name' => 'volume',
                            'label' => 'Gel volume',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'help' => 'Depends on the tray',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'lanes',
                            'label' => 'Number of lanes',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '16',
                        ],
                        [
                            'name' => 'sample_vol',
                            'label' => 'Sample volume per lane',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'dye_x',
                            'label' => 'Loading dye stock',
                            'type' => 'number',
                            'suffix' => '×',
                            'help' => '6× is standard',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'agarose_g',
                            'label' => 'Agarose to weigh out',
                            'type' => 'number',
                            'suffix' => 'g',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'dye_vol',
                            'label' => 'Loading dye per sample',
                            'type' => 'number',
                            'suffix' => 'µL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'buffer_vol',
                            'label' => 'Running buffer',
                            'type' => 'number',
                            'suffix' => 'mL',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'total_sample',
                            'label' => 'Total volume needed',
                            'type' => 'number',
                            'suffix' => 'µL',
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
            'title' => 'Gel',
            'results' => ['agarose_g' => 'volume*percent/100', 'dye_vol' => 'sample_vol/dye_x', 'buffer_vol' => 'volume*5', 'total_sample' => 'lanes*sample_vol'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The agarose percentage decides which fragment sizes resolve, and the number of lanes decides how much gel and buffer you need. It returns agarose to weigh out, loading dye per sample, running buffer and total volume needed, and the panel shows all of them at once.
        
        This calculator gives the grams of agarose, the buffer volume, the loading dye and the ladder volume for your gel.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Agarose Gel (gel percentage and loading)', 'html' => <<<'TXT'
            <p>Agarose (g) = % × gel volume (mL) ÷ 100; dye volume = sample volume ÷ dye fold</p>
            <figure class="calc-figure"><img src="/uploads/biology/agarose-gel-calculator.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Agarose Gel Calculator (gel percentage and loading) — Agarose, buffer, dye and sample for one gel." title="Agarose Gel Calculator (gel percentage and loading)"><figcaption>Agarose, buffer, dye and sample for one gel.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>percent</code></td><td>agarose concentration</td><td>% w/v</td></tr><tr><td><code>volume</code></td><td>gel volume</td><td>mL</td></tr><tr><td><code>agarose</code></td><td>mass to weigh</td><td>g</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Agarose Gel (gel percentage and loading)?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: agarose percentage of <strong>1</strong>%, gel volume of <strong>100</strong> mL, number of lanes of <strong>16</strong>, sample volume per lane of <strong>10</strong> µL, loading dye stock of <strong>6</strong> ×.</p>
            <p>Substituting them into the formula gives agarose to weigh out of <strong>1</strong> g, loading dye per sample of <strong>1.67</strong> µL, running buffer of <strong>500</strong> mL, total volume needed of <strong>160</strong> µL.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>0.5 – 0.8%</td><td><strong>Large fragments</strong></td><td>1–20 kb; resolves genomic digests</td></tr><tr><td>1 – 1.5%</td><td><strong>Most PCR products</strong></td><td>200 bp – 5 kb</td></tr><tr><td>2 – 3%</td><td><strong>Small fragments</strong></td><td>20–200 bp; needs high-resolution agarose</td></tr></tbody></table>
            <ul><li><p>Migration is roughly logarithmic in size: a 1% gel resolves 0.5–10 kb well, and every increase in percentage shifts the useful window downward.</p></li><li><p>Use the same buffer for the gel and the tank. TAE gives better resolution on large fragments, TBE better buffering capacity for long runs.</p></li><li><p>Let the gel cool to about 55 °C before pouring — hotter warps the tray, cooler sets it before you pour.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Weighing agarose into a wet flask and forgetting the water already there.</li><li>Overloading lanes so the bands merge into a smear.</li><li>Running at a voltage that heats the gel enough to distort the bands.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What percentage gel do I need?', 'a' => '1% for most PCR products, 2% for fragments under 300 bp, 0.7% for genomic digests.'],
            ['q' => 'How much dye do I add to a 10 µL sample with 6× dye?', 'a' => 'About 1.7 µL, or adjust the sample so the final volume is convenient.'],
            ['q' => 'What does the Agarose Gel (gel percentage and loading) actually calculate?', 'a' => <<<'TXT'
            It returns agarose to weigh out, loading dye per sample, running buffer and total volume needed. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
        ],
        'related' => [],
    ],
];
