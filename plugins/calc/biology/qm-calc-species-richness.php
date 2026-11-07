<?php

/**
 * Species Richness Calculator
 * /biology/species-richness
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Species Richness Calculator',
    'meta' => ['title' => 'Species Richness Calculator — Formula & Results', 'description' => 'Species richness is simply the number of species present — the most basic biodiversity measure and the one every other index is compared with.', 'h1' => 'Species Richness Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'n1',
                            'label' => 'Species 1 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '40',
                        ],
                        [
                            'name' => 'n2',
                            'label' => 'Species 2 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                        [
                            'name' => 'n3',
                            'label' => 'Species 3 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '15',
                        ],
                        [
                            'name' => 'n4',
                            'label' => 'Species 4 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                        [
                            'name' => 'n5',
                            'label' => 'Species 5 count',
                            'type' => 'number',
                            'suffix' => 'individuals',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                        [
                            'name' => 'richness',
                            'label' => 'Species richness S',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'n',
                            'label' => 'Total individuals',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'margalef',
                            'label' => 'Margalef index',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'menhinick',
                            'label' => 'Menhinick index',
                            'type' => 'number',
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
            'title' => 'Richness',
            'results' => ['n' => 'n1+n2+n3+n4+n5', 'richness' => 'min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5))', 'margalef' => '(min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5))-1)/log(n1+n2+n3+n4+n5)', 'menhinick' => '(min(1,max(0,n1))+min(1,max(0,n2))+min(1,max(0,n3))+min(1,max(0,n4))+min(1,max(0,n5)))/sqrt(n1+n2+n3+n4+n5)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Species richness is simply the number of species present — the most basic biodiversity measure and the one every other index is compared with. It returns total individuals, species richness S, margalef index and menhinick index, and the panel shows all of them at once.
        
        This calculator counts them from a list of abundances, adds the Margalef richness index and estimates how many species a larger sample would find.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Species Richness', 'html' => <<<'TXT'
            <p>S = number of species with at least one individual; Margalef = (S − 1) ÷ ln N</p>
            <figure class="calc-figure"><img src="/uploads/biology/species-richness.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Species Richness Calculator — Five species and the individuals counted in each." title="Species Richness Calculator"><figcaption>Five species and the individuals counted in each.</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>S</code></td><td>species richness</td><td>species</td></tr><tr><td><code>N</code></td><td>total individuals counted</td><td>individuals</td></tr><tr><td><code>Margalef</code></td><td>richness corrected for effort</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Species Richness?', 'html' => <<<'TXT'
            <ol><li>Enter the values you already have. Every box accepts a decimal point and a minus sign; thousands separators are ignored.</li><li>The grey boxes are results: they are worked out from your inputs and cannot be typed into.</li><li>Press <strong>Calculate</strong>. </li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: species 1 count of <strong>40</strong> individuals, species 2 count of <strong>25</strong> individuals, species 3 count of <strong>15</strong> individuals, species 4 count of <strong>10</strong> individuals, species 5 count of <strong>6</strong> individuals.</p>
            <p>Substituting them into the formula gives total individuals of <strong>96</strong>, species richness s of <strong>5</strong>, margalef index of <strong>0.8764</strong>, menhinick index of <strong>0.5103</strong>.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li><p>Richness depends on effort: doubling the area or the time almost always adds species, which is why raw S is a poor comparison between studies.</p></li><li><p>Margalef and Menhinick divide by a function of N, so they compare samples of different size — imperfectly, but far better than raw counts.</p></li><li><p>Rarefaction curves plot expected richness against sample size and show when the inventory has plateaued.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Recording zero for a species you simply did not see, then reporting S as complete.</li><li>Comparing richness between a 1 m² quadrat and a 100 m² plot.</li><li>Counting morphospecies as species without saying so.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the difference between richness and diversity?', 'a' => 'Richness counts species; diversity also weighs how evenly individuals are spread among them.'],
            ['q' => 'How many samples do I need before richness stops rising?', 'a' => 'Until the rarefaction curve flattens — on average 20–50 standardised samples for invertebrates, more for plants.'],
            ['q' => 'What does the Species Richness actually calculate?', 'a' => <<<'TXT'
            It returns total individuals, species richness S, margalef index and menhinick index. Each one is derived by the formula on this page, so you can check any figure by hand.
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
