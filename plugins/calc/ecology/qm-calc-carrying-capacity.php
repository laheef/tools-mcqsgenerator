<?php

/**
 * Carrying Capacity Calculator
 * /ecology/carrying-capacity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Carrying Capacity Calculator',
    'meta' => ['title' => 'Carrying Capacity Calculator: Logistic Growth Limit', 'description' => 'Find the population ceiling a habitat can hold from its current size, its growth rate and the number of individuals it adds to the count in a single year.', 'h1' => 'Carrying Capacity Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The population today',
            'fields' => [
                [
                    'name' => 'population',
                    'label' => 'Current population',
                    'type' => 'number',
                    'suffix' => 'individuals',
                    'default' => '500',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                    'help' => 'The count you have now, not the count you started with.',
                ],
                [
                    'name' => 'growth_rate',
                    'min' => '0.000001',
                    'label' => 'Intrinsic growth rate',
                    'type' => 'number',
                    'default' => '0.4',
                    'rounding' => ['omni', '0.001'],
                    'help' => 'The per-year rate the species would manage with unlimited resources, as a decimal.',
                ],
                [
                    'name' => 'annual_change',
                    'min' => '0',
                    'label' => 'Individuals added this year',
                    'type' => 'number',
                    'suffix' => 'per year',
                    'default' => '50',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'Observed net change over one year. Zero implies the population is at the modelled ceiling.',
                ],
            ],
        ],
        [
            'title' => 'What the habitat can hold',
            'fields' => [
                [
                    'name' => 'carrying_capacity',
                    'label' => 'Carrying capacity',
                    'type' => 'number',
                    'suffix' => 'individuals',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'remaining_room',
                    'label' => 'Room left before the ceiling',
                    'type' => 'number',
                    'suffix' => 'individuals',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'fill_percent',
                    'label' => 'Share of the ceiling already used',
                    'type' => 'number',
                    'suffix' => '%',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'years_to_ceiling',
                    'label' => 'Years to reach 99% of the ceiling',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                    'help' => 'Logistic-model estimate to 99% of capacity; the exact ceiling is approached asymptotically.',
                ],
            ],
        ],
    ],
    'checks' => [
        ['expr' => 'annual_change - growth_rate * population', 'vars' => ['annual_change', 'growth_rate', 'population'], 'op' => '<', 'limit' => 0, 'field' => 'annual_change', 'msg' => 'Annual increase must be less than growth rate × population for a finite positive carrying capacity.'],
    ],
    'formula' => [
        [
            'title' => 'Carrying capacity',
            'results' => ['carrying_capacity' => 'population / (1 - annual_change / (growth_rate * population))', 'remaining_room' => 'carrying_capacity - population', 'fill_percent' => 'population / carrying_capacity * 100', 'years_to_ceiling' => '(annual_change > 0 ? (ln(0.99 / 0.01) - ln(population / (carrying_capacity - population))) / growth_rate : 0)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A population of 500 that adds 50 individuals a year while its intrinsic growth rate is 0.4 has a carrying capacity of 667. The habitat is three quarters full, there is room for 167 more, and the logistic model estimates about 8.7 years to reach 99% of capacity. The formula behind it is K = N ÷ (1 − dN ÷ (r × N)), which is the logistic growth equation solved for the ceiling rather than for the population.</p>
        TXT,
        'sections' => [
            ['title' => 'The logistic curve, one equation at a time', 'html' => <<<'TXT'
            <p>Exponential growth assumes resources are unlimited, so a population grows at rate r forever. Logistic growth adds one brake: as the population N approaches a ceiling K, the realised rate falls. The model writes that as dN/dt = r × N × (1 − N/K). At small N the bracket is close to one and growth looks exponential; as N approaches K the bracket goes to zero and growth stops.</p><p>Three quantities, then: the population you counted, the rate the species would grow at with room to spare, and the change you actually observed over a year. The page takes those three and returns the ceiling the observed growth implies.</p><p>It is worth noticing what the rearrangement means. You are not measuring the habitat's food supply or its nesting sites; you are inferring how much room must be left for the population to have grown by exactly that much. If the growth rate was measured badly, the ceiling moves with it.</p>
            TXT],
            ['title' => 'Where the ceiling comes from in the algebra', 'html' => <<<'TXT'
            <p>Start with dN/dt = r × N × (1 − N/K) and divide both sides by r × N. That gives dN/dt ÷ (r × N) = 1 − N/K. Move the terms around and 1 − dN/dt ÷ (r × N) = N/K, so K = N ÷ (1 − dN/dt ÷ (r × N)). Every symbol on the right is a box on the form.</p><p>The middle term, dN/dt ÷ (r × N), is the fraction of the growth rate that is being used up. In the default example, 50 ÷ (0.4 × 500) = 0.25, which means a quarter of the brake is applied and three quarters of the ceiling remains to be filled. Invert that and 500 ÷ 0.75 = 666.7.</p><p>The structure makes the sensitivity obvious. The ceiling is very sensitive to r when the observed change is close to r × N, and barely sensitive at all when the population is small relative to its ceiling. That asymmetry is worth remembering before quoting a number to two decimal places.</p>
            TXT],
            ['title' => 'Five hundred deer that add fifty a year', 'html' => <<<'TXT'
            <p>Take a deer herd in a fenced reserve. The current count is 500, the species reaches 0.4 per year on good range, and the last twelve months added 50 animals net. The divisor is 1 − 50 ÷ 200 = 0.75, so the ceiling implied by the observation is 667.</p><p>Room left is 167, which is 25 per cent of the ceiling, so 75 per cent of the habitat's capacity is already in use. The displayed time to 99% of capacity is about 8.7 years under a continuous logistic model with a constant carrying capacity and growth rate.</p><p>The exact ceiling is asymptotic: the model approaches it without reaching it in finite time.</p>
            TXT],
            ['title' => 'Why the time-to-99% figure is model-dependent', 'html' => <<<'TXT'
            <p>Logistic growth never quite arrives. The rate falls in proportion to the room that is left, so the last ten per cent of the distance takes longer than the first fifty. Dividing 167 by 50 assumes linear progress and therefore understates the time.</p><p>A better estimate integrates the curve, which for this model gives a tractable expression involving the natural logarithm of (K/N − 1). For the default numbers the estimated time to 99 per cent of capacity is about 8.7 years. The page uses this logistic estimate to 99% of capacity rather than a linear extrapolation to the asymptotic ceiling.</p><p>What the year figure is good for is comparison between habitats and between management choices. The estimate is sensitive to both the growth rate and inferred capacity, so it should be read as a model result rather than a field prediction.</p>
            TXT],
            ['title' => 'When the answer comes out negative or absurd', 'html' => <<<'TXT'
            <p>If the observed change reaches or exceeds r × N, the calculator rejects the combination: it cannot imply a finite positive carrying capacity under this model. Either the growth rate was measured on a different population, or immigration is doing the work that reproduction cannot.</p><p>A fenced reserve without immigration makes the diagnostic clean: if the animals are growing faster than the species' intrinsic rate allows, the rate is wrong. An open population is messier, because animals walk in and the equation has no term for them.</p><p>The other absurd case is a very large ceiling. When the observed change is a tiny fraction of r × N, the denominator is close to one and the ceiling is close to N — but small measurement errors in the change are then amplified into large errors in K. A herd of 500 that adds 2 animals a year and has r = 0.4 gives a ceiling near 506, with a confidence interval wide enough to drive a tractor through.</p>
            TXT],
            ['title' => 'What carrying capacity is not', 'html' => <<<'TXT'
            <p>It is not a constant. K moves with rainfall, with the food supply, with predators, with the winter, and with whatever the neighbouring land is doing. A reserve that supports 667 deer in a wet year may support 400 in a drought, and the model's single K is an average over conditions nobody specified.</p><p>It is also not a target. Management at K means the population is at the point where growth has stopped, which is often the point where body condition, disease resistance and reproductive output are worst. Range managers typically aim for a fraction of K — half or two thirds — because that is where the herd is healthiest and the offtake is sustainable.</p><p>And it is not a moral statement about how many animals or people a place should hold. The equation describes a brake, not an entitlement.</p>
            TXT],
            ['title' => 'Getting r and the observed change right', 'html' => <<<'TXT'
            <p>The intrinsic rate r is the hardest input. Laboratory populations give clean figures; field populations rarely do. What people usually have is a series of counts over several years, from which r can be estimated by fitting the growth curve rather than by dividing one year's growth by the population.</p><p>The observed change needs a full year and a consistent method. A count in June compared with a count in February measures season, not growth. Aerial counts compared with ground counts measure the observers. If your two numbers come from different methods, the ceiling the page returns is mostly method error.</p><p>One more caution: the equation is continuous and the data are annual. Applying it to a single year's difference is legitimate only when the population is well below its ceiling and the year was not unusual. Two or three years of counts, averaged, give a ceiling worth writing down.</p>
            TXT],
            ['title' => 'Maximum sustainable yield sits at half the ceiling', 'html' => <<<'TXT'
            <p>The logistic model is the reason wildlife managers talk about taking half. The growth rate of a logistic population is largest not when the population is largest but when it is at half of K, because that is where the product of N and the remaining room (1 − N/K) peaks.</p><p>In the default example the ceiling is 667, so half of it is 333. A herd held near that size produces roughly r × K ÷ 4 animals a year, which is 67 for r = 0.4 — more than the 50 the population added this year at 500 animals. That is not a paradox: at 500 animals the population is above the maximum-growth point and the brake is already biting.</p><p>Practical management usually sits somewhere between half and two thirds of K, and the exact figure is a judgement about risk. Closer to K gives more animals on the ground and a bigger crash if a bad winter arrives; closer to half gives a smaller herd and more resilience.</p>
            TXT],
            ['title' => 'Two habitats, compared', 'html' => <<<'TXT'
            <p>Suppose a second reserve holds 200 animals, growing at the same r = 0.4, adding 60 a year. Its divisor is 1 − 60 ÷ 80 = 0.25, so the ceiling is 800. The reserve is only a quarter full, has 600 places left, and the naive time to fill them is ten years.</p><p>Put the two side by side and the interesting part is not the ceilings. The first habitat is nearly full and growing slowly; the second is nearly empty and growing fast. Any management decision — culling, supplementary feeding, translocation — depends more on the fill percentage than on the ceiling itself.</p><p>That is why the page prints the fill percentage as a box rather than burying it in the article. It is the number that turns two capacities into a comparison you can act on, and it is the one that moves fastest when a survey is repeated.</p>
            TXT],
            ['title' => 'A ceiling that moves with the weather', 'html' => <<<'TXT'
            <p>Real habitats do not hold a fixed K. Rainfall, fire, disease and the state of the neighbouring land all push the ceiling up and down, sometimes within one season. A population that appeared to be at capacity in a dry year may be well below it the following spring.</p><p>This is why ecologists distinguish the ceiling the environment sets from the level at which the population is observed to stop growing. The first is a property of the habitat, the second is a measurement, and they only coincide in stable systems.</p><p>It follows that a single application of this page is a snapshot. Repeating the calculation each year with fresh counts turns it into a time series, and the drift in the inferred ceiling is more informative than any one value: a ceiling falling year on year is a habitat in trouble, whatever the current population happens to be.</p>
            TXT],
            ['title' => 'The formula rearranged for the other boxes', 'html' => <<<'TXT'
            <p>Because the page holds one relationship, each input can be recovered from the others. Set a target ceiling and ask what growth rate is consistent with it, or ask how many animals could be removed each year without moving the population.</p><ul><li><strong>Carrying capacity</strong> = N ÷ (1 − dN ÷ (r × N))</li><li><strong>Room left</strong> = K − N</li><li><strong>Share used</strong> = N ÷ K × 100</li><li><strong>Growth rate</strong> = dN ÷ (N × (1 − N ÷ K))</li><li><strong>Observed change</strong> = r × N × (1 − N ÷ K)</li><li><strong>Population</strong> = K × (1 − dN ÷ (r × N))</li></ul><p>The population row recovers N from the ceiling and the growth, which is the form you want when a survey gives you K from a habitat assessment and you need to know what the current count implies.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does carrying capacity actually mean?', 'a' => <<<'TXT'
            The population size at which births and deaths balance, given the resources the habitat supplies. In the logistic model it is the ceiling K; in the field it is a moving average that shifts with weather, food and predators.
            TXT],
            ['q' => 'Why does the page need both a growth rate and an observed change?', 'a' => <<<'TXT'
            Because the ceiling is the ratio between them. The growth rate says how fast the population could grow with room to spare; the observed change says how fast it is actually growing. The gap between the two is the brake, and the brake tells you how close to the ceiling you already are.
            TXT],
            ['q' => 'Is the time-to-99% figure reliable?', 'a' => <<<'TXT'
            It is an estimate from the continuous logistic model using the entered growth rate and inferred capacity. Real populations fluctuate and may not follow a constant-capacity logistic curve.
            TXT],
            ['q' => 'What if I get a negative carrying capacity?', 'a' => <<<'TXT'
            The observed change is larger than r × N, which the model says cannot happen without immigration. Either the growth rate is too low for the population, or animals are arriving from outside the area you counted.
            TXT],
            ['q' => 'Should a reserve be managed at carrying capacity?', 'a' => <<<'TXT'
            Usually not. At K the population has stopped growing, and condition, disease resistance and reproduction tend to be poor. Most management aims for half to two thirds of K, where the herd is healthy and offtake is sustainable.
            TXT],
            ['q' => 'Does the calculator work for human populations?', 'a' => <<<'TXT'
            The algebra does, the interpretation does not. Human carrying capacity depends on technology, trade and consumption choices, so a single ceiling inferred from a year's growth describes a demographic transition rather than a resource limit.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
