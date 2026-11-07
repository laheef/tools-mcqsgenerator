<?php

/**
 * GC Content Calculator
 * /biology/gc-content-calculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'GC Content Calculator',
    'meta' => ['title' => 'GC Content Calculator: Formula, Steps & Results', 'description' => 'GC Content takes Guanine (G), Cytosine (C) and Adenine (A) and returns GC content and AT content. It is a single relationship that reads GC content out of…', 'h1' => 'GC Content Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'g',
                            'label' => 'Guanine (G)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '220',
                        ],
                        [
                            'name' => 'c',
                            'label' => 'Cytosine (C)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '180',
                        ],
                        [
                            'name' => 'a',
                            'label' => 'Adenine (A)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '300',
                        ],
                        [
                            'name' => 't',
                            'label' => 'Thymine (T)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '300',
                        ],
                        [
                            'name' => 'gc',
                            'label' => 'GC content',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'at',
                            'label' => 'AT content',
                            'type' => 'number',
                            'suffix' => '%',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'length',
                            'label' => 'Sequence length',
                            'type' => 'number',
                            'suffix' => 'nt',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'tm',
                            'label' => 'Estimated Tm (GC rule)',
                            'type' => 'number',
                            'suffix' => '°C',
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
            'title' => 'Content',
            'results' => ['gc' => '(g+c)/(g+c+a+t)*100', 'at' => '(a+t)/(g+c+a+t)*100', 'length' => 'g+c+a+t', 'tm' => '64.9+41*((g+c)-16.4)/(g+c+a+t)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        GC Content takes Guanine (G), Cytosine (C) and Adenine (A) and returns GC content and AT content. It is a single relationship that reads GC content out of Guanine (G), not a table of canned results keyed by them. Units for GC content default to % and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the GC Content calculator works', 'html' => <<<'TXT'
            <p>GC Content answers one question from 4 numbers, and the answer is GC content, AT content and Sequence length.</p><p>Written with the labels from the form, GC content = (Guanine (G) + Cytosine (C)) ÷ (Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T)) × 100.</p><p>The answers are GC content, AT content, Sequence length and Estimated Tm (GC rule); they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 4 boxes and the page has everything it needs.</p><ul><li><strong>Guanine (G)</strong> — a plain number, no unit</li><li><strong>Cytosine (C)</strong> — a plain number, no unit</li><li><strong>Adenine (A)</strong> — a plain number, no unit</li><li><strong>Thymine (T)</strong> — a plain number, no unit</li></ul><p>The result boxes are GC content in %, AT content in %, Sequence length in nt, Estimated Tm (GC rule) in °C; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Guanine (G) = 220, Cytosine (C) = 180, Adenine (A) = 300 and Thymine (T) = 300 — through the same formula and the panel reports &lt;strong&gt;GC content&lt;/strong&gt; = 40 %, &lt;strong&gt;AT content&lt;/strong&gt; = 60 %, &lt;strong&gt;Sequence length&lt;/strong&gt; = 1000 nt and &lt;strong&gt;Estimated Tm (GC rule)&lt;/strong&gt; = 80.63 °C.</p><ul><li><strong>GC content</strong> = 40 %</li><li><strong>AT content</strong> = 60 %</li><li><strong>Sequence length</strong> = 1000 nt</li><li><strong>Estimated Tm (GC rule)</strong> = 80.63 °C</li></ul><p>The line behind those figures is <strong>GC content</strong> = <code>(Guanine (G) + Cytosine (C)) ÷ (Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T)) × 100</code> — nothing in it is a constant the page keeps to itself.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;GC content&lt;/strong&gt; = 40, &lt;strong&gt;AT content&lt;/strong&gt; = 60, &lt;strong&gt;Sequence length&lt;/strong&gt; = 1000 and &lt;strong&gt;Estimated Tm (GC rule)&lt;/strong&gt; = 80.63 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: GC content takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>GC content</strong> = <code>(Guanine (G) + Cytosine (C)) ÷ (Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T)) × 100</code></li><li><strong>AT content</strong> = <code>(Adenine (A) + Thymine (T)) ÷ (Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T)) × 100</code></li><li><strong>Sequence length</strong> = <code>Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T)</code></li><li><strong>Estimated Tm (GC rule)</strong> = <code>64.9 + 41 × ((Guanine (G) + Cytosine (C)) − 16.4) ÷ (Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T))</code></li></ul><p>Any one of GC content, AT content and Sequence length can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Guanine (G) from 220 to 440, leaving every other box alone. The panel moves from &lt;strong&gt;GC content&lt;/strong&gt; 40 %, &lt;strong&gt;AT content&lt;/strong&gt; 60 %, &lt;strong&gt;Sequence length&lt;/strong&gt; 1000 nt and &lt;strong&gt;Estimated Tm (GC rule)&lt;/strong&gt; 80.63 °C to &lt;strong&gt;GC content&lt;/strong&gt; 50.82 %, &lt;strong&gt;AT content&lt;/strong&gt; 49.18 %, &lt;strong&gt;Sequence length&lt;/strong&gt; 1220 nt and &lt;strong&gt;Estimated Tm (GC rule)&lt;/strong&gt; 85.18 °C.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. </p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with GC content, AT content and Sequence length are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Measurements mixed across scales.</strong> Convert Guanine (G) to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>The typical use is one direction of the relationship: Guanine (G), Cytosine (C) and Adenine (A) measured, GC content and AT content wanted.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/animal-mortality-rate">Animal mortality rate</a>, <a href="/biology/annealing-temperature">Annealing temperature Calculator</a> and <a href="/biology/aquarium-water-volume">Aquarium Water Volume Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the GC Content calculator work out?', 'a' => <<<'TXT'
            GC content, AT content, Sequence length and Estimated Tm (GC rule), from Guanine (G), Cytosine (C), Adenine (A) and Thymine (T). The relationship is GC content = (Guanine (G) + Cytosine (C)) ÷ (Guanine (G) + Cytosine (C) + Adenine (A) + Thymine (T)) × 100.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => 'Guanine (G), Cytosine (C), Adenine (A), Thymine (T). Fill g, c and a and leave GC content empty if you would rather have that one solved instead.'],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of GC content, AT content, Sequence length and Estimated Tm (GC rule) blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            GC content = 40 %, AT content = 60 %, Sequence length = 1000 nt and Estimated Tm (GC rule) = 80.63 °C. That comes from the page's own defaults, entered in Guanine (G); change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'Internally GC content is not rounded at all; the figure you read is formatted for legibility.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Guanine (G) blank and the page solves for it, reporting GC content instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of GC content keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/animal-mortality-rate', 'name' => 'Animal mortality rate'],
            ['path' => '/biology/annealing-temperature', 'name' => 'Annealing temperature Calculator'],
            ['path' => '/biology/aquarium-water-volume', 'name' => 'Aquarium Water Volume Calculator'],
        ],
        'authors' => [],
    ],
];
