<?php

/**
 * Medullary Index Calculator
 * /biology/medullary-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Medullary Index Calculator',
    'meta' => ['title' => 'Medullary Index Calculator — Formula & Results', 'description' => 'The medullary index is the width of the medulla inside a hair shaft divided by the width of the whole shaft. It returns medullary index, medullary index…', 'h1' => 'Medullary Index Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'medulla',
                            'label' => 'Medulla diameter',
                            'type' => 'number',
                            'suffix' => 'µm',
                            'help' => 'Width of the central medulla',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '8',
                        ],
                        [
                            'name' => 'shaft',
                            'label' => 'Hair shaft diameter',
                            'type' => 'number',
                            'suffix' => 'µm',
                            'help' => 'Total width of the hair, cuticle to cuticle',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '70',
                        ],
                        [
                            'name' => 'index',
                            'label' => 'Medullary index',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'index_pct',
                            'label' => 'Medullary index',
                            'type' => 'number',
                            'suffix' => '%',
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
            'title' => 'Medullary index',
            'results' => ['index' => 'medulla/shaft', 'index_pct' => 'medulla/shaft*100', 'medulla' => 'index*shaft', 'shaft' => 'medulla/index'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The medullary index is the width of the medulla inside a hair shaft divided by the width of the whole shaft. It returns medullary index, medullary index, medulla diameter and hair shaft diameter, and the panel shows all of them at once.
        
        Forensic hair examiners use it to tell human hair from animal hair: human medullae are thin, animal medullae are usually thick.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Medullary Index', 'html' => <<<'TXT'
            <p>Medullary index = medulla diameter ÷ hair shaft diameter</p>
            <figure class="calc-figure"><img src="/uploads/biology/medullary-index.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Medullary Index Calculator — Medulla against shaft: the gap is what the index measures." title="Medullary Index Calculator"><figcaption>Medulla against shaft: the gap is what the index measures.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>medulla</code></td><td>width of the central medullary column</td><td>µm</td></tr><tr><td><code>shaft</code></td><td>total width of the hair</td><td>µm</td></tr><tr><td><code>index</code></td><td>fraction of the shaft taken by the medulla</td><td>—</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> The one-third cut-off is the classical forensic criterion described by Robertson (Forensic Examination of Hair) and used in standard hair atlases.</p>
            TXT],
            ['title' => 'How do I use the Medullary Index?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Substituting them into the formula gives medullary index of <strong>0.1143</strong>, medullary index of <strong>11.43</strong>%, medulla diameter of <strong>8</strong> µm, hair shaft diameter of <strong>70</strong> µm.</p>
            <p>An 8 µm medulla in a 70 µm shaft gives 0.11 — well inside the human range; the same medulla in a 20 µm shaft would already read as animal-like.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>below 0.33</td><td><strong>Human-type</strong></td><td>thin or fragmented medulla — the usual human pattern</td></tr><tr><td>0.33 – 0.50</td><td><strong>Overlapping</strong></td><td>seen in both, so not diagnostic on its own</td></tr><tr><td>above 0.50</td><td><strong>Animal-type</strong></td><td>thick medulla, typical of most non-human mammals</td></tr></tbody></table>
            <ul><li><p>The conventional cut-off is one third: an index below 0.33 is described as human-like, above 0.50 as animal-like, and the middle band is where the measure stops being decisive.</p></li><li><p>Medullation varies along a single hair and between hairs from the same head, so examiners measure several and report a range.</p></li><li><p>A medullary index is a screening observation, not an identification — microscopic hair comparison cannot individualise a sample.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Measuring where the medulla is fragmented or absent and calling it thin.</li><li>Using a shaft width taken at the root, which is wider than the rest of the hair.</li><li>Reporting the index without the magnification and the measurement method.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Can this calculator identify an animal species?', 'a' => 'No. It separates the human pattern from the general mammalian one. Species level identification needs microscopic comparison with a reference collection or DNA.'],
            ['q' => 'Why is human hair medullated so thinly?', 'a' => 'The human medulla is often discontinuous or absent; when present it occupies a much smaller fraction of the shaft than in most other mammals.'],
            ['q' => 'What does the Medullary Index actually calculate?', 'a' => <<<'TXT'
            It returns medullary index, medullary index, medulla diameter and hair shaft diameter. Each one is derived by the formula on this page, so you can check any figure by hand.
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
