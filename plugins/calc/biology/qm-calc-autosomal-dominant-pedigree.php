<?php

/**
 * Autosomal Dominant Pedigree Analyzer
 * /biology/autosomal-dominant-pedigree
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Autosomal Dominant Pedigree Analyzer',
    'meta' => ['title' => 'Autosomal Dominant Pedigree Analyzer Calculator', 'description' => 'Autosomal Dominant Pedigree Analyzer turns Parent 1 genotype, Parent 2 genotype and Penetrance into Chance of an affected child and Chance of an unaffected…', 'h1' => 'Autosomal Dominant Pedigree Analyzer', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'parent1',
                            'label' => 'Parent 1 genotype',
                            'type' => 'select',
                            'options' => ['AA — affected homozygote' => '1', 'Aa — affected heterozygote' => '0.5', 'aa — unaffected' => '0'],
                            'default' => 'Aa — affected heterozygote',
                        ],
                        [
                            'name' => 'parent2',
                            'label' => 'Parent 2 genotype',
                            'type' => 'select',
                            'options' => ['AA — affected homozygote' => '1', 'Aa — affected heterozygote' => '0.5', 'aa — unaffected' => '0'],
                            'default' => 'aa — unaffected',
                        ],
                        [
                            'name' => 'penetrance',
                            'label' => 'Penetrance',
                            'type' => 'number',
                            'suffix' => '%',
                            'help' => 'Below 100% if carriers can appear unaffected',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                        [
                            'name' => 'affected',
                            'label' => 'Chance of an affected child',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'unaffected',
                            'label' => 'Chance of an unaffected child',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'carriers',
                            'label' => 'Chance the child carries the allele',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'generations',
                            'label' => 'Expected affected fraction at generation 5',
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
            'title' => 'Pedigree',
            'results' => ['affected' => '(1-(1-parent1)*(1-parent2))*penetrance/100*100', 'unaffected' => '(1-(1-(1-parent1)*(1-parent2))*penetrance/100)*100', 'carriers' => '(parent1*(1-parent2)+(1-parent1)*parent2)*penetrance/100*100', 'generations' => 'pow(1-(1-parent1)*(1-parent2),5)*penetrance/100*100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Autosomal Dominant Pedigree Analyzer turns Parent 1 genotype, Parent 2 genotype and Penetrance into Chance of an affected child and Chance of an unaffected child. There is no hidden constant here: change Chance of an affected child and Parent 1 genotype moves with it. The main result, Chance of an affected child, is reported in %.
        TXT,
        'sections' => [
            ['title' => 'How the Autosomal Dominant Pedigree Analyzer calculator works', 'html' => <<<'TXT'
            <p>The Autosomal Dominant Pedigree Analyzer calculator applies one relationship to 3 numbers and reports Chance of an affected child, Chance of an unaffected child and Chance the child carries the allele.</p><p>In the form&#039;s own words, Chance of an affected child = (1 − (1 − Parent 1 genotype) × (1 − Parent 2 genotype)) × Penetrance ÷ 100 × 100.</p><p>The result panel carries Chance of an affected child, Chance of an unaffected child, Chance the child carries the allele and Expected affected fraction at generation 5, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 3 boxes, and nothing else.</p><ul><li><strong>Parent 1 genotype</strong> — a plain number, no unit</li><li><strong>Parent 2 genotype</strong> — a plain number, no unit</li><li><strong>Penetrance</strong> — in %. Below 100% if carriers can appear unaffected</li></ul><p>What you get back is Chance of an affected child in %, Chance of an unaffected child in %, Chance the child carries the allele in %, Expected affected fraction at generation 5 in %, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Parent 1 genotype = 0.5, Parent 2 genotype = 0 and Penetrance = 100 % — through the same formula and the panel reports &lt;strong&gt;Chance of an affected child&lt;/strong&gt; = 50 %, &lt;strong&gt;Chance of an unaffected child&lt;/strong&gt; = 50 %, &lt;strong&gt;Chance the child carries the allele&lt;/strong&gt; = 50 % and &lt;strong&gt;Expected affected fraction at generation 5&lt;/strong&gt; = 3.13 %.</p><ul><li><strong>Chance of an affected child</strong> = 50 %</li><li><strong>Chance of an unaffected child</strong> = 50 %</li><li><strong>Chance the child carries the allele</strong> = 50 %</li><li><strong>Expected affected fraction at generation 5</strong> = 3.13 %</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Chance of an affected child</strong> = <code>(1 − (1 − Parent 1 genotype) × (1 − Parent 2 genotype)) × Penetrance ÷ 100 × 100</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Chance of an affected child&lt;/strong&gt; = 50, &lt;strong&gt;Chance of an unaffected child&lt;/strong&gt; = 50, &lt;strong&gt;Chance the child carries the allele&lt;/strong&gt; = 50 and &lt;strong&gt;Expected affected fraction at generation 5&lt;/strong&gt; = 3.13 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Chance of an affected child takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>Chance of an affected child</strong> = <code>(1 − (1 − Parent 1 genotype) × (1 − Parent 2 genotype)) × Penetrance ÷ 100 × 100</code></li><li><strong>Chance of an unaffected child</strong> = <code>(1 − (1 − (1 − Parent 1 genotype) × (1 − Parent 2 genotype)) × Penetrance ÷ 100) × 100</code></li><li><strong>Chance the child carries the allele</strong> = <code>(Parent 1 genotype × (1 − Parent 2 genotype) + (1 − Parent 1 genotype) × Parent 2 genotype) × Penetrance ÷ 100 × 100</code></li><li><strong>Expected affected fraction at generation 5</strong> = <code>(1 − (1 − Parent 1 genotype) × (1 − Parent 2 genotype))^(5) × Penetrance ÷ 100 × 100</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>Chance of an affected child</strong> = <code>(1 − (1 − Parent 1 genotype) × (1 − Parent 2 genotype)) × Penetrance ÷ 100 × 100</code> — the form to use when Parent 1 genotype, Parent 2 genotype and Penetrance are the values you have.</li><li><strong>Chance of an unaffected child</strong> = <code>(1 − (1 − (1 − Parent 1 genotype) × (1 − Parent 2 genotype)) × Penetrance ÷ 100) × 100</code> — the form to use when Parent 1 genotype, Parent 2 genotype and Penetrance are the values you have.</li><li><strong>Chance the child carries the allele</strong> = <code>(Parent 1 genotype × (1 − Parent 2 genotype) + (1 − Parent 1 genotype) × Parent 2 genotype) × Penetrance ÷ 100 × 100</code> — the form to use when Parent 1 genotype, Parent 2 genotype and Penetrance are the values you have.</li><li><strong>Expected affected fraction at generation 5</strong> = <code>(1 − (1 − Parent 1 genotype) × (1 − Parent 2 genotype))^(5) × Penetrance ÷ 100 × 100</code> — the form to use when Parent 1 genotype, Parent 2 genotype and Penetrance are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of Chance of an affected child, Chance of an unaffected child and Chance the child carries the allele can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Parent 1 genotype from 0.5 to 1, leaving every other box alone. The panel moves from &lt;strong&gt;Chance of an affected child&lt;/strong&gt; 50 %, &lt;strong&gt;Chance of an unaffected child&lt;/strong&gt; 50 %, &lt;strong&gt;Chance the child carries the allele&lt;/strong&gt; 50 % and &lt;strong&gt;Expected affected fraction at generation 5&lt;/strong&gt; 3.13 % to &lt;strong&gt;Chance of an affected child&lt;/strong&gt; 100 %, &lt;strong&gt;Chance of an unaffected child&lt;/strong&gt; 0 %, &lt;strong&gt;Chance the child carries the allele&lt;/strong&gt; 100 % and &lt;strong&gt;Expected affected fraction at generation 5&lt;/strong&gt; 100 %.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Chance of an affected child, Chance of an unaffected child and Chance the child carries the allele are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Parent 1 genotype left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Parent 1 genotype is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Parent 2 genotype left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Parent 2 genotype is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Penetrance left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Penetrance is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Parent 1 genotype is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Autosomal Dominant Pedigree Analyzer form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Parent 1 genotype</strong> takes a plain number with no unit attached. It feeds Chance of an affected child, Chance of an unaffected child and Chance the child carries the allele. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Parent 1 genotype is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Parent 2 genotype</strong> takes a plain number with no unit attached. It feeds Chance of an affected child, Chance of an unaffected child and Chance the child carries the allele. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — Parent 2 genotype is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Penetrance</strong> is measured in %. Below 100% if carriers can appear unaffected. It feeds Chance of an affected child, Chance of an unaffected child and Chance the child carries the allele. Fill it from a measurement rather than a memory — Penetrance is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Chance of an affected child</strong> is a plain number and the page's own defaults put it at 50. It is computed from Parent 1 genotype, Parent 2 genotype and Penetrance, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Chance of an unaffected child</strong> is a plain number and the page's own defaults put it at 50. It is computed from Parent 1 genotype, Parent 2 genotype and Penetrance, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Chance the child carries the allele</strong> is a plain number and the page's own defaults put it at 50. It is computed from Parent 1 genotype, Parent 2 genotype and Penetrance, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li><li><strong>Expected affected fraction at generation 5</strong> is a plain number and the page's own defaults put it at 3.13. It is computed from Parent 1 genotype, Parent 2 genotype and Penetrance, so it changes the moment any of them does. Treat the first significant digit as the answer and the rest as information about precision — the last digits move when an input moves, and that is normal. It can be typed back into as well as read from, which is how the same page solves backwards when you know the answer and want the input.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Chance of an affected child</th><th>Chance of an unaffected child</th><th>Chance the child carries the allele</th><th>Expected affected fraction at generation 5</th></tr></thead><tbody><tr><td><strong>Parent 1 genotype</strong> +10%</td><td>+10%</td><td>-10%</td><td>+10%</td><td>+61.05%</td></tr><tr><td><strong>Penetrance</strong> +10%</td><td>+10%</td><td>-10%</td><td>+10%</td><td>+10%</td></tr></tbody></table><p>Ranked by leverage, Parent 1 genotype sits at the top — a ten per cent error in that box shows up as roughly 61.1 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Chance of an affected child is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Parent 1 genotype, Parent 2 genotype and Penetrance are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Parent 1 genotype, Parent 2 genotype and Penetrance is what you already know and Chance of an affected child and Chance of an unaffected child is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/dog-pregnancy">Dog pregnancy Calculator</a>, <a href="/biology/dog-quality-of-life">Dog quality of life</a> and <a href="/biology/dog-raisin-toxicity">Dog raisin toxicity Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Autosomal Dominant Pedigree Analyzer calculator work out?', 'a' => <<<'TXT'
            Chance of an affected child, Chance of an unaffected child, Chance the child carries the allele and Expected affected fraction at generation 5, from Parent 1 genotype, Parent 2 genotype and Penetrance. The relationship is Chance of an affected child = (1 − (1 − Parent 1 genotype) × (1 − Parent 2 genotype)) × Penetrance ÷ 100 × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Parent 1 genotype, Parent 2 genotype, Penetrance (%). Enter parent1, parent2 and penetrance; Chance of an affected child is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            Yes. Chance of an affected child, Chance of an unaffected child, Chance the child carries the allele and Expected affected fraction at generation 5 can each be the answer: the page works out which box is empty and rearranges the relationship for it.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Chance of an affected child = 50 %, Chance of an unaffected child = 50 %, Chance the child carries the allele = 50 % and Expected affected fraction at generation 5 = 3.13 %. Those are the defaults written into the form — move Parent 1 genotype and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally Chance of an affected child is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Parent 1 genotype blank and the page solves for it, reporting Chance of an affected child instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Chance of an affected child keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/dog-pregnancy', 'name' => 'Dog pregnancy Calculator'],
            ['path' => '/biology/dog-quality-of-life', 'name' => 'Dog quality of life'],
            ['path' => '/biology/dog-raisin-toxicity', 'name' => 'Dog raisin toxicity Calculator'],
        ],
        'authors' => [],
    ],
];
