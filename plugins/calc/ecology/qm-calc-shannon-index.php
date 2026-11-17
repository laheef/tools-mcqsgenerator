<?php

/**
 * Shannon Index Calculator
 * /ecology/shannon-index
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Shannon Index Calculator',
    'meta' => ['title' => 'Shannon Index Calculator: Diversity From Counts', 'description' => 'Enter the counts of up to five species in a sample and get the Shannon index, the Simpson index, the species richness and Pielou evenness, with the working.', 'h1' => 'Shannon Index Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'Counts in the sample',
            'fields' => [
                [
                    'name' => 'count_a',
                    'min' => '0',
                    'label' => 'Species A',
                    'type' => 'number',
                    'default' => '30',
                    'rounding' => ['standard', '0'],
                    'min' => '0',
                ],
                [
                    'name' => 'count_b',
                    'label' => 'Species B',
                    'type' => 'number',
                    'default' => '20',
                    'rounding' => ['standard', '0'],
                    'min' => '0',
                ],
                [
                    'name' => 'count_c',
                    'label' => 'Species C',
                    'type' => 'number',
                    'default' => '10',
                    'rounding' => ['standard', '0'],
                    'min' => '0',
                ],
                [
                    'name' => 'count_d',
                    'label' => 'Species D',
                    'type' => 'number',
                    'default' => '5',
                    'rounding' => ['standard', '0'],
                    'min' => '0',
                    'help' => 'Leave a box at zero for a species that is absent.',
                ],
                [
                    'name' => 'count_e',
                    'label' => 'Species E',
                    'type' => 'number',
                    'default' => '0',
                    'rounding' => ['standard', '0'],
                    'min' => '0',
                ],
            ],
        ],
        [
            'title' => 'The indices',
            'fields' => [
                [
                    'name' => 'total',
                    'label' => 'Individuals counted',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'richness',
                    'label' => 'Species richness',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                    'help' => 'How many species are present, not how evenly they are split.',
                ],
                [
                    'name' => 'shannon',
                    'label' => 'Shannon index',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.001'],
                    'help' => 'Natural logarithms; the maximum is the log of the species count.',
                ],
                [
                    'name' => 'simpson',
                    'label' => 'Simpson index',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.001'],
                    'help' => 'The probability that two individuals drawn at random are different species.',
                ],
                [
                    'name' => 'evenness',
                    'label' => 'Pielou evenness',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.001'],
                    'help' => 'The Shannon index divided by its maximum for that species count.',
                ],
            ],
        ],
    ],
    'checks' => [
        ['terms' => ['count_a', 'count_b', 'count_c', 'count_d', 'count_e'], 'op' => '>', 'limit' => 0, 'field' => 'count_a', 'msg' => 'Enter at least one individual; an empty sample has no diversity index.'],
    ],
    'formula' => [
        [
            'title' => 'Totals and richness',
            'results' => ['total' => 'count_a + count_b + count_c + count_d + count_e', 'richness' => '(count_a > 0 ? 1 : 0) + (count_b > 0 ? 1 : 0) + (count_c > 0 ? 1 : 0) + (count_d > 0 ? 1 : 0) + (count_e > 0 ? 1 : 0)'],
        ],
        [
            'title' => 'Shannon and Simpson',
            'results' => ['shannon' => <<<'TXT'
            -((count_a > 0 ? count_a / total * ln(count_a / total) : 0) + (count_b > 0 ? count_b / total * ln(count_b / total) : 0) + (count_c > 0 ? count_c / total * ln(count_c / total) : 0) + (count_d > 0 ? count_d / total * ln(count_d / total) : 0) + (count_e > 0 ? count_e / total * ln(count_e / total) : 0))
            TXT, 'simpson' => '1 - ((count_a / total) ^ 2 + (count_b / total) ^ 2 + (count_c / total) ^ 2 + (count_d / total) ^ 2 + (count_e / total) ^ 2)', 'evenness' => 'shannon / (richness > 1 ? ln(richness) : 1)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A sample of 65 individuals split 30, 20, 10 and 5 across four species has a Shannon index of 1.205 and a Simpson index of 0.6627. Richness is 4, evenness 0.8691 — a community that is moderately diverse and far from evenly shared.</p>
        TXT,
        'sections' => [
            ['title' => 'What the Shannon index measures', 'html' => <<<'TXT'
            <p>The index comes from information theory. It asks how surprised you would be, on average, to learn the identity of a randomly drawn individual. A community of one species gives no surprise; a community of many equally common species gives a lot.</p><p>Formally it is the negative sum of each proportional abundance multiplied by its natural logarithm. Proportional abundances, because the index is about the balance between species rather than the size of the sample.</p><p>The maximum is the logarithm of the species count: a sample with four species and equal numbers of each reaches 1.386 and cannot go higher. That ceiling is what makes the index comparable between communities of different richness.</p><p>That is why the same community sampled twice as hard gives the same index. It is a property of the proportions, not the counts, which is the first thing students get confused about.</p>
            TXT],
            ['title' => 'The four species, worked through', 'html' => <<<'TXT'
            <p>65 individuals with proportions of 0.4615, 0.3077, 0.1538 and 0.0769. Take the natural logarithm of each, multiply by the proportion and add: the sum is −1.205, so the index is 1.205.</p><p>Simpson's index is simpler: square each proportion, add them, subtract from one. 0.213 + 0.095 + 0.024 + 0.006 is 0.337, so the index is 0.6627 — a 66 per cent chance that two individuals drawn at random are different species.</p><p>Richness is 4, because the fifth box is zero. Evenness divides the index by the logarithm of the species count, giving 0.8691 out of a possible one.</p>
            TXT],
            ['title' => 'Why there are two indices', 'html' => <<<'TXT'
            <p>Shannon weights rare species more heavily; Simpson weights common ones. A community with one dominant species and twenty rarities barely registers on Simpson and registers clearly on Shannon.</p><p>Neither is right. They answer slightly different questions, and papers that report one without the other are usually reporting the one that supported the conclusion.</p><p>The safe habit is to report richness, both indices and evenness together. Four numbers cost a line of a table and remove most of the room for argument.</p>
            TXT],
            ['title' => 'Evenness, and why it is the honest one', 'html' => <<<'TXT'
            <p>Evenness is the index divided by its maximum. A community of four species perfectly balanced has an index of 1.386 and an evenness of one; the page's community is at 0.8691.</p><p>It is the most interpretable of the three, because it is scale-free: 0.4 means the same thing whether you sampled ten species or a hundred.</p><p>It is also the one that catches disturbance. A polluted stream often keeps its species count and loses its evenness, because one tolerant species takes over. Richness alone would miss the change entirely.</p>
            TXT],
            ['title' => 'Logarithms: base ten or natural?', 'html' => <<<'TXT'
            <p>The Shannon index is defined with any logarithm base, and the base changes the number without changing the ordering. Base two gives bits, base ten gives hartleys, natural logs give nats.</p><p>This page uses natural logarithms, which is the convention in most ecological software and in the original derivation. A base-ten index for the same community would be 0.523.</p><p>Report the base, always. A Shannon index without one is ambiguous by a factor of 2.3, which is enough to make two studies look contradictory when they are not.</p>
            TXT],
            ['title' => 'Sample size and the bias problem', 'html' => <<<'TXT'
            <p>The index is biased downward in small samples, because rare species are likely to be missed. Ten individuals will usually show fewer species than the habitat contains.</p><p>Rarefaction and coverage-based estimators correct for this by standardising on the number of individuals or on sample completeness. They are the right tool when comparing sites sampled with different effort.</p><p>The page takes counts at face value, which is honest for a teaching calculator and wrong for a monitoring programme. If your two sites were sampled for different lengths of time, the comparison is not valid.</p><p>A rule of thumb from the literature: samples of fewer than fifty individuals carry intervals so wide that most differences between sites are unreadable. The default sample here is 65, which is at the low end of usable.</p>
            TXT],
            ['title' => 'Richness versus diversity', 'html' => <<<'TXT'
            <p>Richness is a count and diversity is a distribution. A lawn with three grass species is richer than a meadow with two, and less diverse in every sense that matters.</p><p>That is why indices exist. Richness alone rewards sampling effort and ignores dominance, and dominance is usually the thing a disturbance changes first.</p><p>A hedgerow with forty species and one that covers half the ground is a damaged hedgerow, and its richness figure will not say so.</p><p>For conservation reporting, richness is the headline and diversity is the diagnostic. For a policy target, neither is much use without abundance data behind it.</p>
            TXT],
            ['title' => 'What the index does not tell you', 'html' => <<<'TXT'
            <p>It says nothing about which species. A community of four invasive plants scores the same as four endemics, and a site that lost its specialists while gaining generalists can hold its index steady.</p><p>It says nothing about function. Two communities with the same index can differ in pollination, decomposition and everything else that depends on which species are present.</p><p>And it says nothing about abundance in absolute terms — a hundred individuals and a million with the same proportions give the same number, which is rarely what a manager wants to know.</p><p>Nor does it say anything about rarity in a conservation sense. A species with one individual in the sample and a species with five hundred both enter the calculation as a proportion, and the first may be the one worth protecting.</p>
            TXT],
            ['title' => 'Comparing two sites properly', 'html' => <<<'TXT'
            <p>Equal sampling effort, equal sample size, the same season and the same method. Get those four right and the indices are comparable; miss any one and the difference may be an artefact.</p><p>Then look at the components separately. A fall in richness with a rise in evenness is a very different story from the reverse, and the combined index can hide both.</p><p>The form's five boxes handle small teaching examples. Real survey data has dozens of species, and the arithmetic is the same — only the spreadsheet is longer.</p>
            TXT],
            ['title' => 'A worked comparison: disturbed against intact', 'html' => <<<'TXT'
            <p>An intact meadow might sample as 20, 18, 15, 12 and 10 — five common species, proportions close to equal, an index near 1.6 and an evenness near 1.</p><p>The same meadow after fertiliser application often samples as 60, 12, 5, 2 and 1. Richness survives, evenness collapses, and the index falls to about 1.0.</p><p>That pattern — richness holding while evenness falls — is the signature of eutrophication, and it is invisible if you only report species counts. It is the single most useful thing these indices do in applied ecology.</p>
            TXT],
            ['title' => 'Diversity in a garden or a field survey', 'html' => <<<'TXT'
            <p>The same arithmetic applies to a bird count, a moth trap, a soil invertebrate sample or a pollinator transect. The counts go in, the indices come out, and the interpretation depends on the taxon.</p><p>Birds are usually identified completely and sampled unevenly; insects are sampled evenly and identified incompletely. The bias runs in opposite directions, which is why cross-taxon comparisons are so hard.</p><p>For a garden, the interesting number is not the index but its trend across years. A single season's sample is a snapshot of weather as much as of habitat.</p>
            TXT],
            ['title' => 'Why the fifth box is zero', 'html' => <<<'TXT'
            <p>The default sample has four species, and the fifth box is left at zero to show how absent species are handled: they contribute nothing to the sum and nothing to the richness count.</p><p>Try putting one individual in it. Richness rises to five, the index rises slightly, and evenness falls, because the new species is very rare. That is the behaviour to expect from a singleton in real data.</p><p>Singletons are the classic headache in diversity work: they might be a genuine rare species or a misidentification. Most estimators treat them separately for that reason.</p>
            TXT],
            ['title' => 'Reporting diversity without overclaiming', 'html' => <<<'TXT'
            <p>Give the index, the base, the sample size and the method. Those four make a number reproducible; without them it is decoration.</p><p>Give richness alongside, because they can move in opposite directions and readers will assume they do not.</p><p>And give the uncertainty if the sample is small. A bootstrap interval around a Shannon index is easy to compute and usually wide enough to prevent an argument about a difference that is not there.</p>
            TXT],
            ['title' => 'Other indices you will meet', 'html' => <<<'TXT'
            <p>Berger–Parker is simply the proportion of the commonest species: quick, brutal and easy to explain to a committee. Chao1 estimates the true richness from the number of singletons and doubletons in the sample.</p><p>Simpson's reciprocal and the Gini–Simpson index are rescalings of the same information, and the Hill numbers unify the family by putting every index on a common effective-species scale.</p><p>None of them is a replacement for looking at the data. They are ways of summarising a table, and a table you have not looked at can be summarised into a confident nonsense.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Everything on the panel follows from the proportions, so the reverse questions are answerable.</p><ul><li><strong>Total</strong> = the five counts added</li><li><strong>Proportion</strong> = count ÷ total</li><li><strong>Shannon</strong> = −Σ p × ln p</li><li><strong>Simpson</strong> = 1 − Σ p²</li><li><strong>Richness</strong> = species with a count above zero</li><li><strong>Evenness</strong> = Shannon ÷ ln(richness)</li></ul><p>The maximum for a given richness is ln(richness), which is why evenness is a ratio rather than a difference. For 4 species the ceiling here is 1.386.</p>
            TXT],
            ['title' => 'Where the estimate is optimistic or pessimistic', 'html' => <<<'TXT'
            <p>Optimistic: the sample is complete, every individual was identified to species, and the habitat was sampled evenly. Field data rarely meets all three.</p><p>Pessimistic: cryptic species are lumped, juveniles are unidentifiable, and the sampling method favours large or conspicuous organisms. All of these lower the measured diversity without changing the habitat.</p><p>The index is a description of a sample, not of a place. That distinction is worth holding on to when a report compares one site's number with another's.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is a good Shannon index value?', 'a' => <<<'TXT'
            There is no absolute scale. Values run from zero for a single species to about 4.6 for a very diverse community with natural logarithms, and most field samples sit between 1 and 3. Comparisons are only meaningful between samples collected the same way.
            TXT],
            ['q' => 'Should I use base 2 or base e?', 'a' => <<<'TXT'
            Either, as long as you say which. Natural logarithms are the ecological convention and base two gives bits; the same community scores 0.523 in base ten and 1.205 in natural logs.
            TXT],
            ['q' => 'What is the difference between Shannon and Simpson?', 'a' => <<<'TXT'
            Shannon is more sensitive to rare species, Simpson to dominant ones. A community with one very common species and many rarities scores lower on Simpson than on Shannon, relative to its maximum.
            TXT],
            ['q' => 'How do I calculate evenness?', 'a' => <<<'TXT'
            Divide the Shannon index by the natural logarithm of the species count. The result is 0.8691 for the page's default community, where one would be a perfectly even split.
            TXT],
            ['q' => 'Does sample size matter?', 'a' => 'Yes. Small samples miss rare species and depress both richness and the index. Compare sites with equal effort, or use rarefaction to standardise on sample size.'],
            ['q' => 'Can I use it for more than five species?', 'a' => <<<'TXT'
            The arithmetic extends to any number; the form has five boxes for teaching. Add the remaining proportions into the fifth box if you only need an approximate result.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
