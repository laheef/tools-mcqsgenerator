<?php

/**
 * FWHR (Facial Width-to-Height Ratio) Calculator
 * /biology/fwhr-facial-width-to-height-ratio
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'FWHR (Facial Width-to-Height Ratio) Calculator',
    'meta' => ['title' => 'FWHR (Facial Width-to-Height Ratio) Calculator', 'description' => <<<'TXT'
    The arithmetic is the whole method: Facial width-to-height ratio is worked out from Bizygomatic width by one formula, applied once. Fill it from a measurement…
    TXT, 'h1' => 'FWHR (Facial Width-to-Height Ratio) Calculator', 'updated' => '2026-10-29'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'fields' => [
                        [
                            'name' => 'width',
                            'label' => 'Bizygomatic width',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Widest point of the face, cheekbone to cheekbone',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '138',
                        ],
                        [
                            'name' => 'height',
                            'label' => 'Upper face height',
                            'type' => 'number',
                            'suffix' => 'mm',
                            'help' => 'Brow (nasion) to the upper lip (prosthion)',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '98',
                        ],
                        [
                            'name' => 'fwhr',
                            'label' => 'Facial width-to-height ratio',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'fwhr_100',
                            'label' => 'FWHR scaled ×100',
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
            'title' => 'FWHR',
            'results' => ['fwhr' => 'width/height', 'fwhr_100' => 'width/height*100', 'width' => 'fwhr*height', 'height' => 'width/fwhr'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        FWHR (Facial Width-to-Height Ratio) takes Bizygomatic width and Upper face height and returns Facial width-to-height ratio and FWHR scaled ×100. The arithmetic is the whole method: Facial width-to-height ratio is worked out from Bizygomatic width by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the FWHR (Facial Width-to-Height Ratio) calculator works', 'html' => <<<'TXT'
            <p>FWHR (Facial Width-to-Height Ratio) answers one question from 2 numbers, and the answer is Facial width-to-height ratio and FWHR scaled ×100.</p><p>The relationship it solves reads Facial width-to-height ratio = Bizygomatic width ÷ Upper face height.</p><p>The result panel carries Facial width-to-height ratio and FWHR scaled ×100, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Bizygomatic width</strong> — in mm. Widest point of the face, cheekbone to cheekbone</li><li><strong>Upper face height</strong> — in mm. Brow (nasion) to the upper lip (prosthion)</li></ul><p>The result boxes are Facial width-to-height ratio, FWHR scaled ×100; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Bizygomatic width = 138 mm and Upper face height = 98 mm — through the same formula and the panel reports &lt;strong&gt;Facial width-to-height ratio&lt;/strong&gt; = 1.41 and &lt;strong&gt;FWHR scaled ×100&lt;/strong&gt; = 141.</p><ul><li><strong>Facial width-to-height ratio</strong> = 1.41</li><li><strong>FWHR scaled ×100</strong> = 141</li></ul><p>Spelled out with this form's labels, the arithmetic is <strong>Facial width-to-height ratio</strong> = <code>Bizygomatic width ÷ Upper face height</code>.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Treat the size of a result as part of the answer: &lt;strong&gt;Facial width-to-height ratio&lt;/strong&gt; = 1.41 and &lt;strong&gt;FWHR scaled ×100&lt;/strong&gt; = 141 is what this page produces from its own defaults, so a figure several orders of magnitude away from that is worth a second look at the inputs.</p><p>None of the boxes on this page carries a unit chip: Facial width-to-height ratio takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Facial width-to-height ratio</strong> = <code>Bizygomatic width ÷ Upper face height</code></li><li><strong>FWHR scaled ×100</strong> = <code>Bizygomatic width ÷ Upper face height × 100</code></li><li><strong>Bizygomatic width</strong> = <code>Facial width-to-height ratio × Upper face height</code></li><li><strong>Upper face height</strong> = <code>Bizygomatic width ÷ Facial width-to-height ratio</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Facial width-to-height ratio</strong> = <code>Bizygomatic width ÷ Upper face height</code> — the form to use when Bizygomatic width and Upper face height are the values you have.</li><li><strong>FWHR scaled ×100</strong> = <code>Bizygomatic width ÷ Upper face height × 100</code> — the form to use when Bizygomatic width and Upper face height are the values you have.</li><li><strong>Bizygomatic width</strong> = <code>Facial width-to-height ratio × Upper face height</code> — the form to use when Facial width-to-height ratio and Upper face height are the values you have.</li><li><strong>Upper face height</strong> = <code>Bizygomatic width ÷ Facial width-to-height ratio</code> — the form to use when Bizygomatic width and Facial width-to-height ratio are the values you have.</li></ul><p>Any one of Facial width-to-height ratio, FWHR scaled ×100 and Bizygomatic width can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Change one box only — Bizygomatic width, from 138 to 276 — and the answers go from &lt;strong&gt;Facial width-to-height ratio&lt;/strong&gt; 1.41 and &lt;strong&gt;FWHR scaled ×100&lt;/strong&gt; 141 to &lt;strong&gt;Facial width-to-height ratio&lt;/strong&gt; 2.82 and &lt;strong&gt;FWHR scaled ×100&lt;/strong&gt; 282.</p><p>That is the check worth doing before a result is trusted: move each input by a factor you can hold in your head and see that the answer moves the way the formula says it should.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Facial width-to-height ratio and FWHR scaled ×100 are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Bizygomatic width left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Bizygomatic width is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Upper face height left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Upper face height is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Bizygomatic width is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the FWHR (Facial Width-to-Height Ratio) form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>Bizygomatic width</strong> is measured in mm. Widest point of the face, cheekbone to cheekbone. Change it and Facial width-to-height ratio, FWHR scaled ×100 and Upper face height changes with it. Fill it from a measurement rather than a memory — Bizygomatic width is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Upper face height</strong> is measured in mm. Brow (nasion) to the upper lip (prosthion). Change it and Facial width-to-height ratio, FWHR scaled ×100 and Bizygomatic width changes with it. Fill it from a measurement rather than a memory — Upper face height is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>Each box below is a different question about the same calculation. Read them in this order:</p><ul><li><strong>Facial width-to-height ratio</strong> is a plain number and the page's own defaults put it at 1.41. The value follows from Bizygomatic width and Upper face height. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li><li><strong>FWHR scaled ×100</strong> is a plain number and the page's own defaults put it at 141. The value follows from Bizygomatic width and Upper face height. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>Which box should you measure most carefully? The table answers it. Each row raises one input by ten per cent from the page&#039;s own defaults and records what happens to every answer:</p><table class="calc-table"><thead><tr><th>Box</th><th>Facial width-to-height ratio</th><th>FWHR scaled ×100</th></tr></thead><tbody><tr><td><strong>Bizygomatic width</strong> +10%</td><td>+10%</td><td>+10%</td></tr><tr><td><strong>Upper face height</strong> +10%</td><td>-9.09%</td><td>-9.09%</td></tr></tbody></table><p>Ranked by leverage, Bizygomatic width sits at the top — a ten per cent error in that box shows up as roughly 10 per cent in the answer. Every box on the form carries some of the answer; none of them can be estimated without moving the result.</p><p>The numbers above come from the page&#039;s defaults, not a general rule of thumb. Re-run them with your own figures in the boxes — a box that is harmless at the defaults can dominate at the values you actually work with.</p>
            TXT],
            ['title' => 'Two more scenarios, worked through', 'html' => <<<'TXT'
            <p>Two further runs, at numbers you are more likely to meet than the defaults:</p><ul><li>Feed in Bizygomatic width = 69 mm and Upper face height = 49 mm and the page reports <strong>Facial width-to-height ratio</strong> = 1.41 and <strong>FWHR scaled ×100</strong> = 141.</li><li>Feed in Bizygomatic width = 414 mm and Upper face height = 98 mm and the page reports <strong>Facial width-to-height ratio</strong> = 4.22 and <strong>FWHR scaled ×100</strong> = 422.</li></ul><p>The three runs together say more than any one of them: doubling one box while leaving the rest alone is how you check that you understand which way the formula leans.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> Have Bizygomatic width and Upper face height ready and all in one unit. The page will convert whatever a chip says it is; it cannot tell that one of the numbers was measured in something else.</li><li><strong>Enter them and press Calculate.</strong> Fill the form — starting with Bizygomatic width — and press Calculate. The panel updates in place, and the fields you typed into keep your numbers.</li><li><strong>Read the answer against the defaults.</strong> Check Facial width-to-height ratio against the worked example above. If the two disagree by a round factor, the chip or the decimal separator is the place to look first.</li><li><strong>Change one box to check your understanding.</strong> Double one input, leaving the rest alone, and press Calculate again. The direction the answer moves tells you whether that box sits in the numerator or the denominator — and whether the number you got a moment ago was plausible.</li></ol><p>That is the whole procedure. Everything else on this page is the reasoning behind it.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Facial width-to-height ratio follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Bizygomatic width and Upper face height are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when Bizygomatic width and Upper face height is what you already know and Facial width-to-height ratio and FWHR scaled ×100 is what you need — the reverse of that situation is what the rearranged form is for.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>Related work in the same category: <a href="/biology/od260-nucleic-acid-concentration">OD260 to Nucleic Acid Concentration Calculator</a>, <a href="/biology/od600-to-cell-density">OD600 to Cell Density Calculator</a> and <a href="/biology/genetic-odds-ratio">Odds Ratio for Genetics Calculator</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the FWHR (Facial Width-to-Height Ratio) calculator work out?', 'a' => <<<'TXT'
            Facial width-to-height ratio and FWHR scaled ×100, from Bizygomatic width and Upper face height. The relationship is Facial width-to-height ratio = Bizygomatic width ÷ Upper face height.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Bizygomatic width (mm), Upper face height (mm). Enter width and height; Facial width-to-height ratio is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Facial width-to-height ratio, FWHR scaled ×100, Bizygomatic width and Upper face height blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            Facial width-to-height ratio = 1.41 and FWHR scaled ×100 = 141. Those are the defaults written into the form — move Bizygomatic width and every result box follows.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Facial width-to-height ratio is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave Bizygomatic width blank and the page solves for it, reporting Facial width-to-height ratio instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Facial width-to-height ratio keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/od260-nucleic-acid-concentration', 'name' => 'OD260 to Nucleic Acid Concentration Calculator'],
            ['path' => '/biology/od600-to-cell-density', 'name' => 'OD600 to Cell Density Calculator'],
            ['path' => '/biology/genetic-odds-ratio', 'name' => 'Odds Ratio for Genetics Calculator'],
        ],
        'authors' => [],
    ],
];
