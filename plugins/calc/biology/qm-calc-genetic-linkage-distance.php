<?php

/**
 * Recombination to Centimorgans
 * /biology/genetic-linkage-distance
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Recombination to Centimorgans',
    'meta' => ['title' => 'Recombination to Centimorgans — Formula & Results', 'description' => 'Recombination frequency undercounts true genetic distance, because a double crossover between two loci reverts the markers to parental type.', 'h1' => 'Recombination to Centimorgans', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'recombinants',
                            'label' => 'Recombinant offspring',
                            'type' => 'number',
                            'help' => 'From a test cross',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '35',
                        ],
                        [
                            'name' => 'total',
                            'label' => 'Total offspring',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '200',
                        ],
                        [
                            'name' => 'use_kosambi',
                            'label' => 'Use Kosambi (interference)',
                            'type' => 'select',
                            'options' => ['Yes' => '1', 'No' => '0'],
                            'help' => 'Untick for Haldane, which assumes crossovers are independent',
                            'default' => 'No',
                        ],
                        [
                            'name' => 'rf',
                            'label' => 'Recombination fraction',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'haldane',
                            'label' => 'Haldane distance',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'kosambi',
                            'label' => 'Kosambi distance',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'corrected',
                            'label' => 'Corrected distance (chosen function)',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'gap',
                            'label' => 'Distance added by the map correction',
                            'type' => 'number',
                            'suffix' => 'cM',
                            'help' => 'Corrected minus raw RF distance',
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
            'title' => 'Distance',
            'results' => [
                'rf' => 'if_else(recombinants/total<0.49,recombinants/total,0.49)',
                'haldane' => '-0.5*log(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))*100',
                'kosambi' => '0.25*log((1+2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))/(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49))))*100',
                'corrected' => <<<'TXT'
                if_else(use_kosambi>0.5,0.25*log((1+2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))/(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49))))*100,-0.5*log(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))*100)
                TXT,
                'gap' => <<<'TXT'
                if_else(use_kosambi>0.5,0.25*log((1+2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))/(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49))))*100,-0.5*log(1-2*(if_else(recombinants/total<0.49,recombinants/total,0.49)))*100)-if_else(recombinants/total<0.49,recombinants/total,0.49)*100
                TXT,
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Recombination frequency undercounts true genetic distance, because a double crossover between two loci reverts the markers to parental type. It returns recombination fraction, haldane distance, kosambi distance and corrected distance (chosen function), and the panel shows all of them at once.
        
        A mapping function corrects for it: Haldane's assumes no interference, Kosambi's assumes some. Both turn a recombination fraction into centimorgans.
        TXT,
        'sections' => [
            ['title' => 'The formula behind the Recombination to Centimorgans', 'html' => <<<'TXT'
            <p>RF = recombinants ÷ total. Haldane: d = −½ ln(1 − 2·RF). Kosambi: d = ¼ ln[(1 + 2RF) ÷ (1 − 2RF)]. Both in Morgans, ×100 for cM</p>
            <figure class="calc-figure"><img src="/uploads/biology/genetic-linkage-distance.svg" width="720" height="300" loading="lazy" alt="Animated diagram: Recombination to Centimorgans — Map distance against recombination fraction" title="Recombination to Centimorgans"><figcaption>Map distance against recombination fraction</figcaption></figure>
            <table><caption>The symbols in the formula</caption><thead><tr><th>Symbol</th><th>What it stands for</th><th>Unit</th></tr></thead><tbody><tr><td><code>RF</code></td><td>recombination fraction, between 0 and 0.5</td><td>—</td></tr><tr><td><code>cM</code></td><td>centimorgan: 1 cM is 1% recombination</td><td>—</td></tr><tr><td><code>interference</code></td><td>the tendency of one crossover to suppress the next nearby</td><td>—</td></tr></tbody></table>
            TXT],
            ['title' => 'How do I use the Recombination to Centimorgans?', 'html' => <<<'TXT'
            <ol><li>Enter the recombinant and total offspring from the cross.</li><li>Tick Kosambi if your organism shows interference — the usual choice outside fungi.</li><li>Read the recombination fraction and the corrected distance in centimorgans.</li></ol>
            TXT],
            ['title' => 'A worked example', 'html' => <<<'TXT'
            <p>Take the default values the page opens with: recombinant offspring of <strong>35</strong>, total offspring of <strong>200</strong>, use kosambi (interference) of <strong>0</strong>.</p>
            <p>Substituting them into the formula gives recombination fraction of <strong>0.175</strong>, haldane distance of <strong>21.54</strong> cM, kosambi distance of <strong>18.27</strong> cM, corrected distance (chosen function) of <strong>21.54</strong> cM, distance added by the map correction of <strong>4.04</strong> cM.</p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <p> These are the bands most often used when the result is quoted in a paper, a report or a label:</p>
            <table><caption>How to read the result</caption><thead><tr><th>Result</th><th>Band</th><th>What it means</th></tr></thead><tbody><tr><td>under 10 cM</td><td><strong>Tightly linked</strong></td><td>few double crossovers; either function works</td></tr><tr><td>10 – 30 cM</td><td><strong>Linked</strong></td><td>the two functions begin to differ</td></tr><tr><td>50 cM or more</td><td><strong>Effectively unlinked</strong></td><td>at RF 0.5 the distance is undefined</td></tr></tbody></table>
            <ul><li><p>Recombination fraction saturates at 0.5: two loci on different chromosomes recombine 50% of the time, and the same is true of two loci far apart on the same chromosome.</p></li><li><p>Haldane's function assumes crossovers are independent; Kosambi's assumes interference, which is closer to what is seen in most eukaryotes.</p></li><li><p>Map distance is not physical distance: recombination hotspots make one megabase worth anywhere from 0.1 to 10 cM.</p></li></ul>
            TXT],
            ['title' => 'What are the common mistakes?', 'html' => <<<'TXT'
            <p>These are the errors that account for almost every wrong answer people bring to this calculator:</p><ul><li>Reporting the recombination fraction as centimorgans for distant loci, which understates the distance badly.</li><li>Using Haldane on data where interference is strong.</li><li>Forgetting that 50% recombination means unlinked, not 50 cM apart.</li></ul>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the difference between Haldane and Kosambi?', 'a' => 'Haldane assumes crossovers are independent; Kosambi assumes they interfere, so it converts the same RF to a shorter distance.'],
            ['q' => 'Why can\'t distance exceed 50 cM?', 'a' => 'Because beyond about 50 cM the recombination fraction stops rising — the loci behave as if unlinked.'],
            ['q' => 'What is one centimorgan?', 'a' => 'A 1% chance of recombination between two loci in a generation.'],
            ['q' => 'What does the Recombination to Centimorgans actually calculate?', 'a' => <<<'TXT'
            It returns recombination fraction, haldane distance, kosambi distance and corrected distance (chosen function). Each one is derived by the formula on this page, so you can check any figure by hand.
            TXT],
            ['q' => 'Do I have to fill in every box?', 'a' => <<<'TXT'
            Fill in the ones you know. The result boxes are computed from them, so you never enter a value the formula can derive — and if you change an input, every result updates with it.
            TXT],
            ['q' => 'Why is the answer different from the one in my protocol?', 'a' => <<<'TXT'
            Nearly always a unit or a rounding difference. This calculator works in the units printed next to each box, keeps full precision internally and only rounds for display, so recomputing from the rounded numbers on screen can differ in the last digit.
            TXT],
        ],
        'related' => [],
    ],
];
