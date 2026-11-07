<?php

/**
 * Femur to Foot Ratio Calculator
 * /biology/femur-to-foot-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Femur to Foot Ratio Calculator',
    'meta' => ['title' => 'Femur to Foot Ratio Calculator — Formula & Results', 'description' => 'The femur-to-foot ratio compares thigh-bone length with foot length. It returns femur to foot ratio, foot length as % of femur, femur length and foot length…', 'h1' => 'Femur to Foot Ratio Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'femur',
                            'label' => 'Femur length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Maximum length of the femur',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '45',
                        ],
                        [
                            'name' => 'foot',
                            'label' => 'Foot length',
                            'type' => 'number',
                            'suffix' => 'cm',
                            'help' => 'Heel to the tip of the longest toe',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '26',
                        ],
                        [
                            'name' => 'ratio',
                            'label' => 'Femur to foot ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'foot_pct',
                            'label' => 'Foot length as % of femur',
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
            'title' => 'Ratio',
            'results' => ['ratio' => 'femur/foot', 'foot_pct' => 'foot/femur*100', 'femur' => 'ratio*foot', 'foot' => 'femur/ratio'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The femur-to-foot ratio compares thigh-bone length with foot length. It returns femur to foot ratio, foot length as % of femur, femur length and foot length, and the panel shows all of them at once.
        
        It is used in osteology to check that bones from the same individual are consistent, in forensic work when only part of a skeleton is recovered, and in comparative anatomy as a measure of how a species carries its weight.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Femur to Foot Ratio', 'html' => <<<'TXT'
            <p>Femur-to-foot ratio = femur length ÷ foot length</p>
            <figure class="calc-figure"><img src="/uploads/biology/femur-to-foot-ratio.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Femur to Foot Ratio Calculator — Femur, foot and the gap between them, drawn to scale from your figures." title="Femur to Foot Ratio Calculator"><figcaption>Femur, foot and the gap between them, drawn to scale from your figures.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>femur</code></td><td>maximum length of the femur</td><td>cm</td></tr><tr><td><code>foot</code></td><td>heel to longest toe</td><td>cm</td></tr><tr><td><code>ratio</code></td><td>how many foot lengths fit into one femur</td><td>—</td></tr></tbody></table>
            <p><strong>Where the relationship comes from.</strong> Range follows standard osteometric practice; femur and foot lengths are both taken from the left side where available.</p>
            TXT],
            ['title' => 'How do I use the Femur to Foot Ratio?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Substituting them into the formula gives femur to foot ratio of <strong>1.73</strong>, foot length as % of femur of <strong>57.78</strong>%, femur length of <strong>45</strong> cm, foot length of <strong>26</strong> cm.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> The usual bands are:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>1.55 – 1.80</td><td><strong>Typical adult</strong></td><td>the usual range for modern humans</td></tr><tr><td>below 1.55</td><td><strong>Long foot</strong></td><td>foot long relative to the thigh bone</td></tr><tr><td>above 1.80</td><td><strong>Short foot</strong></td><td>foot short relative to the thigh bone</td></tr></tbody></table>
            <ul><li><p>For modern adults the ratio usually lands near 1.7: a 45 cm femur and a 26 cm foot give 1.73.</p></li><li><p>The ratio is a consistency check rather than an estimator. A pair of bones far outside the band more often comes from two different people than from an unusual one.</p></li><li><p>In quadrupeds the femur is long relative to the foot; in humans the foot is disproportionately large because it has to absorb the whole body's landing force.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>Before blaming the formula, check these — they explain nearly every mismatch:</p><ul><li>Measuring foot length with shoes on, or with the foot bearing weight when the reference measurement was taken non-weight-bearing.</li><li>Mixing the anatomical femur length (with the head) with a measurement taken on an X-ray, where magnification changes it by a few per cent.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'Can I estimate height from the ratio?', 'a' => 'Not directly — the ratio cancels size. Use femur length in the bone-length-to-height calculator instead, which uses the Trotter–Gleser equations.'],
            ['q' => 'What does the Femur to Foot Ratio actually calculate?', 'a' => <<<'TXT'
            It returns femur to foot ratio, foot length as % of femur, femur length and foot length. Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
            ['q' => 'Can I use it with the numbers straight from a datasheet?', 'a' => 'Yes. Every box states its unit, and nothing is converted behind your back, so a figure copied from a datasheet, a kit insert or a protocol goes in as printed.'],
            ['q' => 'Does it work in both directions?', 'a' => <<<'TXT'
            Where the maths allows it, yes: the page states which values it solves for and which you supply. A field marked as a result is always computed, never typed into.
            TXT],
        ],
        'related' => [],
    ],
];
