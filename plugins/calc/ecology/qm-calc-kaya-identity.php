<?php

/**
 * Kaya Identity Calculator
 * /ecology/kaya-identity
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Kaya Identity Calculator',
    'meta' => ['title' => 'Kaya Identity Calculator: Four Levers of CO2', 'description' => 'Break a country\'s emissions into population, income per person, energy intensity and carbon intensity, then see which of the four levers moves the total most.', 'h1' => 'Kaya Identity Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The four terms',
            'fields' => [
                [
                    'name' => 'population',
                    'label' => 'Population',
                    'type' => 'number',
                    'suffix' => 'million',
                    'default' => '340',
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'gdp_per_capita',
                    'label' => 'Income per person',
                    'type' => 'number',
                    'suffix' => 'per year',
                    'default' => '40000',
                    'rounding' => ['standard', '0'],
                    'help' => 'Gross domestic product divided by population.',
                ],
                [
                    'name' => 'energy_intensity',
                    'label' => 'Energy per unit of GDP',
                    'type' => 'number',
                    'suffix' => 'kWh/$',
                    'default' => '1.8',
                    'rounding' => ['omni', '0.01'],
                    'help' => 'How much energy an economy burns to produce a dollar of output.',
                ],
                [
                    'name' => 'carbon_intensity',
                    'label' => 'Carbon per unit of energy',
                    'type' => 'number',
                    'suffix' => 'g CO₂/kWh',
                    'default' => '200',
                    'rounding' => ['standard', '0'],
                    'help' => 'The carbon content of the energy mix.',
                ],
            ],
        ],
        [
            'title' => 'The identity, evaluated',
            'fields' => [
                [
                    'name' => 'gdp_total',
                    'label' => 'Total output',
                    'type' => 'number',
                    'suffix' => 'T$',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'energy_twh',
                    'label' => 'Energy use',
                    'type' => 'number',
                    'suffix' => 'TWh',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'co2_gt',
                    'label' => 'Carbon dioxide',
                    'type' => 'number',
                    'suffix' => 'Gt',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'co2_per_capita',
                    'label' => 'Carbon per person',
                    'type' => 'number',
                    'suffix' => 't',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Output and energy',
            'results' => ['gdp_total' => 'population * gdp_per_capita / 1000000', 'energy_twh' => 'gdp_total * energy_intensity * 1000'],
        ],
        [
            'title' => 'Emissions',
            'results' => ['co2_gt' => 'energy_twh * carbon_intensity / 1000000', 'co2_per_capita' => 'co2_gt * 1000 / population'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>The Kaya identity splits a country's carbon dioxide into four terms that multiply out: population, income per person, energy per unit of income and carbon per unit of energy. At the page's defaults — 340 million people on 13.6 trillion dollars of output — it yields 24,480 terawatt-hours of primary energy, 4.9 gigatonnes of CO₂ and 14.4 tonnes per person.</p>
        TXT,
        'sections' => [
            ['title' => 'An identity, not a model', 'html' => <<<'TXT'
            <p>The four terms are chosen so that everything cancels. Population times income per person gives total output; output times energy per unit of output gives energy; energy times carbon per unit of energy gives emissions. Multiply and the intermediate units disappear.</p><p>That makes it true by construction, which is both its strength and its weakness. It cannot be wrong, and it cannot predict. What it does is force a decomposition: any emissions path has to be explained by these four terms, and there is no fifth.</p><p>Each term maps onto a policy lever. Population policy, growth policy, efficiency policy and energy-mix policy. Naming them separately is what makes the identity useful in a negotiation.</p>
            TXT],
            ['title' => 'The four terms in words', 'html' => <<<'TXT'
            <p><strong>Population</strong> is straightforward and slow-moving. It appears in denominators everywhere else, which is why per-person figures flatter countries with fast population growth.</p><p><strong>Income per person</strong> is the term that has driven emissions up for two centuries. Richer people consume more energy, and the relationship only breaks when income is high enough for the economy to be mostly services.</p><p><strong>Energy intensity</strong> is how much energy an economy burns per dollar. It falls as industry gets more efficient and as the economy shifts to services, and it rises with heavy industry and cheap fuel.</p><p><strong>Carbon intensity</strong> is what the energy is made of. It is the only term that can go to near zero without anyone changing their behaviour, which is why decarbonising electricity is the first move in every credible plan.</p>
            TXT],
            ['title' => 'Three hundred and forty million people, worked through', 'html' => <<<'TXT'
            <p>Population times income: 340 million × $40,000 is 13.6 trillion dollars. Times energy intensity of 1.8 kilowatt-hours per dollar is 24,480 terawatt-hours — a quarter of the world's primary energy, which is what a large industrial economy looks like.</p><p>Times 200 grams per kilowatt-hour is 4.9 gigatonnes. Divide back by population and the per-person figure is 14.4 tonnes, near the top of the global range.</p><p>Change one box and the point of the page appears. Halve the carbon intensity and emissions halve; halve the energy intensity and emissions halve again. Those are the same arithmetic move, and they are politically very different.</p>
            TXT],
            ['title' => 'Which lever actually moves', 'html' => <<<'TXT'
            <p>Proportional changes multiply, so a 10 per cent cut in any single term is a 10 per cent cut in emissions. The interesting question is political, not arithmetical: which term is easiest to move?</p><p>Carbon intensity moves fastest where the grid is dirtiest. Replacing coal with gas halves the carbon per kilowatt-hour overnight; replacing gas with wind and solar halves it again over a decade. No other term can be halved so quickly.</p><p>Energy intensity moves slowly and steadily, roughly 1 to 2 per cent a year in mature economies. Income per person is the term no government wants to reduce. Population is the slowest of all.</p>
            TXT],
            ['title' => 'What history says about each term', 'html' => <<<'TXT'
            <p>The last thirty years show the identity in action. China's emissions rose because income per person rose by a factor of ten, even as its energy intensity fell sharply — the growth term swamped the efficiency term.</p><p>Europe's emissions fell because carbon intensity fell with the power sector, and because energy intensity fell as heavy industry moved elsewhere. Some of that fall is offshored rather than avoided.</p><p>The United States is the awkward case: population up, income up, energy intensity down, carbon intensity down, total emissions roughly flat over two decades. The identity explains the stalemate term by term.</p>
            TXT],
            ['title' => 'The consumption-accounting problem', 'html' => <<<'TXT'
            <p>The identity uses territorial emissions: what is burned inside a border. Move a steel mill abroad and the emissions leave the country while the steel keeps arriving.</p><p>Consumption-based accounting assigns emissions to the place the goods are consumed. On that basis, several European countries have reduced less than their territorial figures suggest, and some have barely reduced at all.</p><p>The page cannot switch between the two, because the identity has no trade term. What it can do is make you ask which one a headline is using before you believe a decarbonisation story.</p>
            TXT],
            ['title' => 'Using it below the national level', 'html' => <<<'TXT'
            <p>The same four terms work for a city, a sector or a company, with the denominators adjusted. For a city, population and income per person are the same; energy intensity covers buildings and transport; carbon intensity covers the local grid.</p><p>For a company, replace population with units of output and income per person with revenue per unit. The decomposition then shows whether emissions are falling because of efficiency or because the business shrank — a distinction that sustainability reports sometimes blur.</p><p>That is the practical value of an identity. It refuses to let a total change without an explanation of which term changed.</p>
            TXT],
            ['title' => 'Where the identity is criticised', 'html' => <<<'TXT'
            <p>Gross domestic product is a crude denominator. It counts activity that produces emissions and activity that does not in the same units, and it treats a financial transaction as output.</p><p>The identity also implies that growth and emissions are separable only through the ratio terms, which is arithmetically true and has been used to argue that green growth is guaranteed. It is not guaranteed; it depends on the ratios falling faster than income rises.</p><p>And it has nothing to say about non-CO₂ gases, land use or the difference between a tonne emitted now and a tonne emitted in 2050. It is one equation, and a good one, but not a climate policy.</p>
            TXT],
            ['title' => 'The same identity for the whole world', 'html' => <<<'TXT'
            <p>Feed in the global figures: 8.1 billion people, about $12,000 of output each, 1.85 kilowatt-hours per dollar and 205 grams per kilowatt-hour. Total output is roughly $97 trillion, primary energy about 180,000 terawatt-hours, emissions near 37 gigatonnes, and about 4.5 tonnes per person.</p><p>That average is a third of the page's 14.4 tonnes. The gap is the whole of the climate negotiation in one comparison: the rich world is at 10 to 15 tonnes, the poor world at 1 to 3, and the total is what has to fall.</p><p>Enter the world totals and the identity still balances, which is the reassurance it offers. Any global pathway that adds up has to add up in these four terms.</p>
            TXT],
            ['title' => 'Why intensity numbers are hard to compare', 'html' => <<<'TXT'
            <p>Energy intensity depends on the currency and the exchange rate. Measured at market rates, China looks inefficient; at purchasing power parity it looks much better, because its output is worth more in local prices than the dollar conversion suggests.</p><p>It also depends on whether you count primary or final energy. Primary energy counts the fuel burned at the power station, so a country that generates electricity inefficiently looks more energy-intensive even if its factories are modern.</p><p>And it depends on the industrial mix. A country that smelts aluminium for export carries the energy of other people's consumption, which is the same accounting problem as before in a different place.</p>
            TXT],
            ['title' => 'Net zero, expressed in the four terms', 'html' => <<<'TXT'
            <p>Net zero is what happens when the last term goes to nearly zero. Carbon intensity cannot quite reach zero — there is still agriculture, cement process emissions and air travel — so the residual is balanced by removals.</p><p>That reframes the target usefully. If output per person keeps rising at 2 per cent a year and population is flat, energy intensity has to fall faster than output rises just to hold energy use level. Then carbon intensity has to fall to nearly zero on top of that.</p><p>Run the numbers with growth at 2 per cent a year for thirty years and the requirement becomes visible: output nearly doubles, so the carbon term must fall by more than half again to deliver an absolute cut.</p>
            TXT],
            ['title' => 'Population, the term nobody campaigns on', 'html' => <<<'TXT'
            <p>Population growth is falling almost everywhere, and the global total is expected to peak somewhere in the 2080s. That makes it a slow term in the identity, not a lever anyone can pull within a budget cycle.</p><p>It still matters for per-person arithmetic. A country whose population grows 2 per cent a year has to cut emissions per person by 2 per cent a year just to hold the total flat, which is a useful thing to know before praising a flat national total.</p><p>It also matters for equity. The places with growing populations have the lowest emissions per person, so the arithmetic of a global cap falls hardest on the countries that contributed least to the stock.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Each term can be solved for, which is the exercise worth doing. The page shows the forward direction; here is the reverse.</p><ul><li><strong>Total output</strong> = population × income per person</li><li><strong>Primary energy</strong> = output × energy intensity</li><li><strong>Emissions</strong> = energy × carbon intensity</li><li><strong>Per person</strong> = emissions × 1000 ÷ population</li><li><strong>Carbon intensity needed for a target</strong> = target emissions ÷ energy</li></ul><p>The last row is how national targets get translated into grid targets. If emissions must halve and energy use is flat, carbon intensity must halve; there is no other arithmetic available.</p>
            TXT],
            ['title' => 'A note on units', 'html' => <<<'TXT'
            <p>The form uses kilowatt-hours as the energy unit throughout, in both the intensity term and the carbon term, because the two cancel cleanly. Country statistics often use exajoules or million tonnes of oil equivalent; convert before entering, or the answer will be out by a large factor.</p><p>One exajoule is 278 terawatt-hours. A hundred exajoules — roughly the American primary energy supply — is 27,800 terawatt-hours, which is close to the page's output and a good sanity check on your inputs.</p><p>The income term is in the same currency throughout. Mixing dollars and euros, or nominal and purchasing-power values, is the most common way to get a plausible-looking answer that means nothing.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the Kaya identity?', 'a' => <<<'TXT'
            An equation that decomposes carbon emissions into population, output per person, energy per unit of output and carbon per unit of energy. Because the terms cancel, it is exactly true rather than estimated.
            TXT],
            ['q' => 'Is the Kaya identity a forecast?', 'a' => <<<'TXT'
            No. It has no dynamics and no behaviour; it simply says that emissions must equal the product of the four terms. Scenario work uses it to check that assumptions are internally consistent.
            TXT],
            ['q' => 'Which term matters most for cutting emissions?', 'a' => <<<'TXT'
            In the short run, carbon intensity, because a grid can be decarbonised faster than an economy can be rebuilt. Over decades, energy intensity matters as much, and income per person is the term that keeps pushing the total up.
            TXT],
            ['q' => 'Why does population appear in two places?', 'a' => <<<'TXT'
            Population multiplies income per person to give total output, and it divides emissions to give the per-person figure. The form uses it for both, so the two outputs stay consistent.
            TXT],
            ['q' => 'What units does the calculator expect?', 'a' => <<<'TXT'
            Population in millions, income in dollars per person per year, energy intensity in kilowatt-hours per dollar and carbon intensity in grams per kilowatt-hour. Output appears in trillions of dollars, terawatt-hours and gigatonnes.
            TXT],
            ['q' => 'Can I use it for a company?', 'a' => <<<'TXT'
            Yes, with the denominators changed: replace population with units of output and income per person with revenue per unit. The structure holds, and it makes clear whether a fall in emissions comes from efficiency or from shrinkage.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
