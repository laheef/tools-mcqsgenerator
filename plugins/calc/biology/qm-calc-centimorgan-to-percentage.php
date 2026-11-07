<?php

/**
 * Centimorgan to Percentage Calculator
 * /biology/centimorgan-to-percentage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Centimorgan to Percentage Calculator',
    'meta' => ['title' => 'Centimorgan to Percentage Calculator — Biology', 'description' => 'A centimorgan is one unit of genetic distance: a 1% chance of recombination between two loci per generation. It returns recombination frequency (simple)…', 'h1' => 'Centimorgan to Percentage Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'cm',
                            'label' => 'Map distance',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                        [
                            'name' => 'rf_simple',
                            'label' => 'Recombination frequency (simple)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rf_haldane',
                            'label' => 'Recombination frequency (Haldane)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'rf_kosambi',
                            'label' => 'Recombination frequency (Kosambi)',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'cm_from_rf',
                            'label' => 'cM for 10% recombination',
                            'type' => 'number',
                            'suffix' => 'cM',
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
            'title' => 'Map distance',
            'results' => ['rf_simple' => 'cm', 'rf_haldane' => '0.5*(1-exp(-2*cm/100))*100', 'rf_kosambi' => '0.5*(exp(4*cm/100)-1)/(exp(4*cm/100)+1)*100', 'cm_from_rf' => '0.25*log((1+0.2)/(1-0.2))'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        A centimorgan is one unit of genetic distance: a 1% chance of recombination between two loci per generation. It returns recombination frequency (simple), recombination frequency (Haldane), recombination frequency (Kosambi) and cM for 10% recombination, and the panel shows all of them at once.
        
        Over short distances the map distance in cM and the recombination percentage are the same number; over long ones they diverge, and this calculator applies the mapping functions that account for it.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Centimorgan to Percentage', 'html' => <<<'TXT'
            <p>1 cM ≈ 1% recombination at short distances</p>
            <figure class="calc-figure"><img src="/uploads/biology/centimorgan-to-percentage.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Centimorgan to Percentage Calculator — Map distance against recombination frequency, three models." title="Centimorgan to Percentage Calculator"><figcaption>Map distance against recombination frequency, three models.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>cM</code></td><td>map distance in centimorgans</td><td>cM</td></tr><tr><td><code>rf</code></td><td>observed recombination frequency</td><td>%</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Centimorgan to Percentage?', 'html' => <<<'TXT'
            <p>The form asks only for what the formula needs — nothing is optional decoration.</p>
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: map distance of <strong>20</strong> cM.</p>
            <p>Substituting them into the formula gives recombination frequency (simple) of <strong>20</strong>%, recombination frequency (haldane) of <strong>16.48</strong>%, recombination frequency (kosambi) of <strong>19</strong>%, cm for 10% recombination of <strong>0.1014</strong> cM.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Above about 10 cM the simple 1:1 correspondence breaks down because double crossovers restore the parental configuration and are not counted.</p></li><li><p>Haldane's function assumes crossovers occur at random (no interference); Kosambi's assumes interference and converts a given cM to a smaller recombination percentage.</p></li><li><p>The maximum observable recombination frequency is 50%, which corresponds to independent assortment however far apart the loci are.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p> The usual culprits:</p><ul><li>Treating cM as a physical distance in base pairs — one cM is about a megabase in humans on average, but it varies tenfold.</li><li>Adding recombination percentages directly across a long interval.</li></ul>
            TXT],
            ['title' => 'Calculators that go with this one', 'html' => <<<'TXT'
            <p>If you need the rest of the working, these cover the adjacent quantities:</p><p><a href="/biology/recombination-frequency">Recombination frequency</a>. <a href="/biology/genetic-map-distance">Genetic linkage distance</a>. <a href="/biology/coefficient-of-coincidence">Coefficient of coincidence</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Is 1 cM exactly 1% recombination?', 'a' => 'Only at small distances; at 20 cM the recombination frequency is closer to 18% under Haldane\'s model.'],
            ['q' => 'Why does recombination top out at 50%?', 'a' => 'Because past that point linked loci are indistinguishable from unlinked ones.'],
            ['q' => 'What does the Centimorgan to Percentage actually calculate?', 'a' => <<<'TXT'
            It returns recombination frequency (simple), recombination frequency (Haldane), recombination frequency (Kosambi) and cM for 10% recombination. Each one is derived by the formula on this page, so you can check any figure by hand.
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
