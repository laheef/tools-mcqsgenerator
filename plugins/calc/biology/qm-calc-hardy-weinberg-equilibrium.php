<?php

/**
 * Hardy-Weinberg equilibrium
 * /biology/hardy-weinberg-equilibrium
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hardy-Weinberg equilibrium',
    'meta' => ['title' => 'Hardy-Weinberg equilibrium Calculator: Steps & Units', 'description' => 'Hardy-Weinberg equilibrium takes allele counts for two to five alleles and returns genotype frequencies and carrier risk. Risk follows from the same counts.', 'h1' => 'Hardy-Weinberg equilibrium Calculator', 'updated' => '2026-07-17'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'model',
                            'label' => 'What do you want to calculate?',
                            'type' => 'select',
                            'options' => ['Genotype frequencies' => '1', 'Carrier frequency and disease risk' => '2'],
                            'dataset' => 'mode',
                            'default' => 'Genotype frequencies',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'number',
                            'label' => 'Number of alleles',
                            'type' => 'select',
                            'options' => ['2 alleles (p, q)' => '2', '3 alleles (p, q, r)' => '3', '4 alleles (p, q, r, s)' => '4', '5 alleles (p, q, r, s, t)' => '5'],
                            'default' => '2 alleles (p, q)',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q_risk',
                            'label' => 'Enter how many people in the population are affected, expressed as “1 in N”',
                            'type' => 'number',
                            'prefix' => '1 in',
                            'suffix' => 'people',
                            'help' => 'Enter how common is the recessive trait.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Allele frequencies',
            'note' => 'The allele frequencies need to add up to 1 for the calculation to be correct!',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p',
                            'label' => 'p',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q',
                            'label' => 'q',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'r',
                            'label' => 'r',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 's',
                            'label' => 's',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't',
                            'label' => 't',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The above frequencies don\'t add up to 1. Try reloading the calculator and trying again.'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Genotype frequencies',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'genotypes',
                            'label' => 'Genotypes',
                            'type' => 'number',
                            'help' => 'Number of genotypes for a given number of alleles.',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pp',
                            'label' => 'Homozygous AA — p^^2^^',
                            'type' => 'number',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pq',
                            'label' => 'Heterozygous AB — 2pq',
                            'type' => 'number',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'qq',
                            'label' => 'Homozygous BB — q^^2^^',
                            'type' => 'number',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pr',
                            'label' => 'Heterozygous AC — 2pr',
                            'type' => 'number',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'qr',
                            'label' => 'Heterozygous BC — 2qr',
                            'type' => 'number',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rr',
                            'label' => 'Homozygous CC — r^^2^^',
                            'type' => 'number',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ps',
                            'label' => 'Heterozygous AD — 2ps',
                            'type' => 'number',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'qs',
                            'label' => 'Heterozygous BD — 2qs',
                            'type' => 'number',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rs',
                            'label' => 'Heterozygous CD — 2rs',
                            'type' => 'number',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ss',
                            'label' => 'Homozygous DD — s^^2^^',
                            'type' => 'number',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pt',
                            'label' => 'Heterozygous AE — 2pt',
                            'type' => 'number',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'qt',
                            'label' => 'Heterozygous BE — 2qt',
                            'type' => 'number',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'rt',
                            'label' => 'Heterozygous CE — 2rt',
                            'type' => 'number',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'st',
                            'label' => 'Heterozygous DE — 2st',
                            'type' => 'number',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tt',
                            'label' => 'Homozygous EE — t^^2^^',
                            'type' => 'number',
                            'rounding' => ['standard', '3'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Carrier frequency',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pq_risk',
                            'label' => 'Carrier (Aa)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p_risk2',
                            'label' => 'Unaffected, non-carrier (AA)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'Carrier frequency in population: {{carrier_perc.value}}% This means that approximately 1 in {{carrier_1_in.value}} people carry this trait without knowing it.'],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'p_risk',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'carrier_perc',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'carrier_1_in',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'pp= p*p',
            'results' => ['pp' => 'pow(p, 2)', 'p' => 'sqrt(pp)'],
        ],
        [
            'title' => 'pq= 2*p*q',
            'results' => ['q' => '(1/2)*pq/p', 'pq' => '2*p*q', 'p' => '(1/2)*pq/q'],
        ],
        [
            'title' => 'qq=q*q',
            'results' => ['q' => 'sqrt(qq)', 'qq' => 'pow(q, 2)'],
        ],
        [
            'title' => 'genotypes=(number*(number+1))/2',
            'results' => ['genotypes' => '(1/2)*number*(number + 1)', 'number' => '(1/2)*sqrt(8*genotypes + 1) - 1/2'],
        ],
        [
            'title' => 'pr = 2*p*r',
            'results' => ['r' => '(1/2)*pr/p', 'p' => '(1/2)*pr/r', 'pr' => '2*p*r'],
        ],
        [
            'title' => 'qr = 2*q*r',
            'results' => ['q' => '(1/2)*qr/r', 'r' => '(1/2)*qr/q', 'qr' => '2*q*r'],
        ],
        [
            'title' => 'rr= r*r',
            'results' => ['r' => 'sqrt(rr)', 'rr' => 'pow(r, 2)'],
        ],
        [
            'title' => 'ps=2*p*s',
            'results' => ['ps' => '2*p*s', 's' => '(1/2)*ps/p', 'p' => '(1/2)*ps/s'],
        ],
        [
            'title' => 'qs=2*q*s',
            'results' => ['q' => '(1/2)*qs/s', 's' => '(1/2)*qs/q', 'qs' => '2*q*s'],
        ],
        [
            'title' => 'rs=2*r*s',
            'results' => ['s' => '(1/2)*rs/r', 'rs' => '2*r*s', 'r' => '(1/2)*rs/s'],
        ],
        [
            'title' => 'ss=s*s',
            'results' => ['ss' => 'pow(s, 2)', 's' => 'sqrt(ss)'],
        ],
        [
            'title' => 'pt=2*p*t',
            'results' => ['t' => '(1/2)*pt/p', 'p' => '(1/2)*pt/t', 'pt' => '2*p*t'],
        ],
        [
            'title' => 'qt=2*q*t',
            'results' => ['q' => '(1/2)*qt/t', 't' => '(1/2)*qt/q', 'qt' => '2*q*t'],
        ],
        [
            'title' => 'rt=2*r*t',
            'results' => ['t' => '(1/2)*rt/r', 'rt' => '2*r*t', 'r' => '(1/2)*rt/t'],
        ],
        [
            'title' => 'st=2*s*t',
            'results' => ['s' => '(1/2)*st/t', 't' => '(1/2)*st/s', 'st' => '2*s*t'],
        ],
        [
            'title' => 'tt=t*t',
            'results' => ['t' => 'sqrt(tt)', 'tt' => 'pow(t, 2)'],
        ],
        [
            'title' => 'p + q = 1',
            'results' => ['q' => '1 - p', 'p' => '1 - q'],
        ],
        [
            'title' => 'p + q + r = 1',
            'results' => ['q' => '-p - r + 1', 'r' => '-p - q + 1', 'p' => '-q - r + 1'],
        ],
        [
            'title' => 'p + q + r + s = 1',
            'results' => ['s' => '-p - q - r + 1', 'r' => '-p - q - s + 1', 'p' => '-q - r - s + 1', 'q' => '-p - r - s + 1'],
        ],
        [
            'title' => 'p + q + r + s + t = 1',
            'results' => [
                's' => '-p - q - r - t + 1',
                'p' => '-q - r - s - t + 1',
                'q' => '-p - r - s - t + 1',
                't' => '-p - q - r - s + 1',
                'r' => '-p - q - s - t + 1',
            ],
        ],
        [
            'title' => 'p_risk2 = p_risk *p_risk',
            'results' => ['p_risk2' => 'pow(((1 - sqrt(1/q_risk))), 2)'],
        ],
        [
            'title' => 'pq_risk = 2 * p_risk * sqrt(1/q_risk)',
            'results' => ['pq_risk' => '2*sqrt(1/q_risk)*((1 - sqrt(1/q_risk)))', 'q_risk' => '4*pow(((1 - sqrt(1/q_risk))), 2)/pow(pq_risk, 2)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Hardy-Weinberg equilibrium takes What do you want to calculate?, Number of alleles and Enter how many people in the population are affected, expressed as “1 in N” and returns Genotypes. Nothing is looked up on this page: genotypes is computed from what do you want to calculate? and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Hardy-Weinberg equilibrium calculator works', 'html' => <<<'TXT'
            <p>The Hardy-Weinberg equilibrium calculator applies one relationship to 25 numbers and reports Genotypes.</p><p>In the form&#039;s own words, Homozygous AA — p^^2^^ = (p)^(2).</p><p>The result panel carries Genotypes, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 25 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>What do you want to calculate?</strong> — a plain number, no unit</li><li><strong>Number of alleles</strong> — a plain number, no unit</li><li><strong>Enter how many people in the population are affected, expressed as “1 in N”</strong> — in people. Enter how common is the recessive trait.</li><li><strong>p</strong> — a plain number, no unit</li><li><strong>q</strong> — a plain number, no unit</li><li><strong>r</strong> — a plain number, no unit</li><li><strong>s</strong> — a plain number, no unit</li><li><strong>t</strong> — a plain number, no unit</li><li><strong>Homozygous AA — p^^2^^</strong> — a plain number, no unit</li><li><strong>Heterozygous AB — 2pq</strong> — a plain number, no unit</li><li><strong>Homozygous BB — q^^2^^</strong> — a plain number, no unit</li><li><strong>Heterozygous AC — 2pr</strong> — a plain number, no unit</li><li><strong>Heterozygous BC — 2qr</strong> — a plain number, no unit</li><li><strong>Homozygous CC — r^^2^^</strong> — a plain number, no unit</li><li><strong>Heterozygous AD — 2ps</strong> — a plain number, no unit</li><li><strong>Heterozygous BD — 2qs</strong> — a plain number, no unit</li><li><strong>Heterozygous CD — 2rs</strong> — a plain number, no unit</li><li><strong>Homozygous DD — s^^2^^</strong> — a plain number, no unit</li><li><strong>Heterozygous AE — 2pt</strong> — a plain number, no unit</li><li><strong>Heterozygous BE — 2qt</strong> — a plain number, no unit</li><li><strong>Heterozygous CE — 2rt</strong> — a plain number, no unit</li><li><strong>Heterozygous DE — 2st</strong> — a plain number, no unit</li><li><strong>Homozygous EE — t^^2^^</strong> — a plain number, no unit</li><li><strong>Carrier (Aa)</strong> — a plain number, no unit</li><li><strong>Unaffected, non-carrier (AA)</strong> — a plain number, no unit</li></ul><p>The answer comes back as Genotypes. The page writes that box; there is nothing to submit or save before you can read it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — What do you want to calculate? = 1 — through the same formula and the panel reports <strong>Number of alleles</strong> = 2 and <strong>Genotypes</strong> = 3.</p><ul><li><strong>Number of alleles</strong> = 2</li><li><strong>Genotypes</strong> = 3</li></ul><p>That is <strong>Homozygous AA — p^^2^^</strong> = <code>(p)^(2)</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: <strong>Number of alleles</strong> = 2 and <strong>Genotypes</strong> = 3 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Genotypes takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Homozygous AA — p^^2^^</strong> = <code>(p)^(2)</code></li><li><strong>p</strong> = <code>√(Homozygous AA — p^^2^^)</code></li><li><strong>Heterozygous AB — 2pq</strong> = <code>2 × p × q</code></li><li><strong>q</strong> = <code>(1 ÷ 2) × Heterozygous AB — 2pq ÷ p</code></li><li><strong>Homozygous BB — q^^2^^</strong> = <code>(q)^(2)</code></li><li><strong>Genotypes</strong> = <code>(1 ÷ 2) × Number of alleles × (Number of alleles + 1)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Homozygous AA — p^^2^^</strong> = <code>(p)^(2)</code> — the form to use when p are the values you have.</li><li><strong>p</strong> = <code>√(Homozygous AA — p^^2^^)</code> — the form to use when Homozygous AA — p^^2^^ are the values you have.</li><li><strong>Heterozygous AB — 2pq</strong> = <code>2 × p × q</code> — the form to use when q and p are the values you have.</li><li><strong>q</strong> = <code>(1 ÷ 2) × Heterozygous AB — 2pq ÷ p</code> — the form to use when Heterozygous AB — 2pq and p are the values you have.</li><li><strong>p</strong> = <code>(1 ÷ 2) × Heterozygous AB — 2pq ÷ q</code> — the form to use when q and Heterozygous AB — 2pq are the values you have.</li><li><strong>Homozygous BB — q^^2^^</strong> = <code>(q)^(2)</code> — the form to use when q are the values you have.</li><li><strong>q</strong> = <code>√(Homozygous BB — q^^2^^)</code> — the form to use when Homozygous BB — q^^2^^ are the values you have.</li><li><strong>Genotypes</strong> = <code>(1 ÷ 2) × Number of alleles × (Number of alleles + 1)</code> — the form to use when Number of alleles are the values you have.</li></ul><p>Any one of Homozygous AA — p^^2^^, p and Heterozygous AB — 2pq can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — What do you want to calculate?, from 1 to 2 — and the answers go from <strong>Number of alleles</strong> 2 and <strong>Genotypes</strong> 3 to <strong>Number of alleles</strong> 2 and <strong>Genotypes</strong> 3.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Genotypes is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>What do you want to calculate? left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If What do you want to calculate? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Number of alleles left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Number of alleles is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Enter how many people in the population are affected, expressed as “1 in N” left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Enter how many people in the population are affected, expressed as “1 in N” is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert What do you want to calculate? to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need What do you want to calculate?, Number of alleles, Enter how many people in the population are affected, expressed as “1 in N” and p. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type What do you want to calculate? into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Genotypes with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Genotypes is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: What do you want to calculate?, Number of alleles and Enter how many people in the population are affected, expressed as “1 in N” measured, Genotypes wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/biology/goldfish-years-to-human-years">Goldfish Years to Human Years Calculator</a>, <a href="/biology/ghk-membrane-potential">Goldman–Hodgkin–Katz Membrane Potential Calculator</a> and <a href="/biology/grain-bin">Grain bin Calculator</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Hardy-Weinberg equilibrium is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put What do you want to calculate?, Number of alleles, Enter how many people in the population are affected, expressed as “1 in N” and p beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            What do you want to calculate?, Number of alleles, Enter how many people in the population are affected, expressed as “1 in N” (people), p, q. Enter what do you want to calculate?, number of alleles and enter how many people in the population are affected, expressed as “1 in N”; Genotypes is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Homozygous AA — p^^2^^, p, Heterozygous AB — 2pq and q blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Number of alleles = 2 and Genotypes = 3. That comes from the page's own defaults, entered in What do you want to calculate?; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Genotypes is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With What do you want to calculate? left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'Only for display. Genotypes keeps its decimals behind the panel, and a figure copied out is the rounded one shown.'],
        ],
        'related' => [
            ['path' => '/biology/goldfish-years-to-human-years', 'name' => 'Goldfish Years to Human Years Calculator'],
            ['path' => '/biology/ghk-membrane-potential', 'name' => 'Goldman–Hodgkin–Katz Membrane Potential Calculator'],
            ['path' => '/biology/grain-bin', 'name' => 'Grain bin Calculator'],
        ],
    ],
];
