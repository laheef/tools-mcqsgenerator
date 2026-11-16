<?php

/**
 * Water Demand Calculator
 * /ecology/water-demand
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Water Demand Calculator',
    'meta' => ['title' => 'Water Demand Calculator: Household Use Per Year', 'description' => 'Work out a household\'s daily and annual water demand from its people, its habits and its garden, then price it and count the energy that is in hot water.', 'h1' => 'Water Demand Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The household',
            'fields' => [
                [
                    'name' => 'people',
                    'label' => 'People in the household',
                    'type' => 'number',
                    'default' => '4',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                ],
                [
                    'name' => 'per_person',
                    'label' => 'Indoor use per person',
                    'type' => 'number',
                    'suffix' => 'l/day',
                    'default' => '140',
                    'rounding' => ['standard', '0'],
                    'help' => 'European average is 120 to 150; a low-use household 90.',
                ],
                [
                    'name' => 'garden',
                    'label' => 'Garden watering per week',
                    'type' => 'number',
                    'suffix' => 'l',
                    'default' => '200',
                    'rounding' => ['standard', '0'],
                    'help' => 'A watering can is 10 litres; a hose uses 500 in five minutes.',
                ],
            ],
        ],
        [
            'title' => 'Price and heat',
            'fields' => [
                [
                    'name' => 'price',
                    'label' => 'Water and sewerage price',
                    'type' => 'number',
                    'suffix' => '€/m³',
                    'default' => '3.5',
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'hot_share',
                    'label' => 'Share of indoor use that is hot',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '40',
                    'rounding' => ['standard', '0'],
                ],
            ],
        ],
        [
            'title' => 'The demand',
            'fields' => [
                [
                    'name' => 'daily_litres',
                    'label' => 'Total per day',
                    'type' => 'number',
                    'suffix' => 'l',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'annual_m3',
                    'label' => 'Water per year',
                    'type' => 'number',
                    'suffix' => 'm³',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'annual_cost',
                    'label' => 'Annual bill',
                    'type' => 'number',
                    'suffix' => '€',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'hot_kwh',
                    'label' => 'Energy for hot water',
                    'type' => 'number',
                    'suffix' => 'kWh',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'hot_co2',
                    'label' => 'Carbon from that energy',
                    'type' => 'number',
                    'suffix' => 'kg CO₂',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                    'help' => 'A gas boiler emits about 200 grams per kilowatt-hour.',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Daily and annual demand',
            'results' => ['daily_litres' => 'people * per_person + garden / 7', 'annual_m3' => 'daily_litres * 365 / 1000', 'annual_cost' => 'annual_m3 * price'],
        ],
        [
            'title' => 'Hot water',
            'results' => ['hot_kwh' => 'people * per_person * hot_share / 100 * 0.058 * 365', 'hot_co2' => 'hot_kwh * 0.2'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Four people at 140 litres a day plus 200 litres a week on the garden is 588.6 litres a day and 214.8 cubic metres a year, which costs 752 euros at 3.50 a cubic metre. Heating the 40 per cent that is hot takes 4,742 kilowatt-hours, or 948 kilograms of carbon on a gas boiler.</p>
        TXT,
        'sections' => [
            ['title' => 'What five hundred and eighty-eight litres looks like', 'html' => <<<'TXT'
            <p>588.6 litres a day is about six full baths, or a little under three wheelie bins. For four people that is 147 litres each, which is squarely in the European range.</p><p>It is also roughly what a single person in a water-scarce country uses in a week. The same volume means very different things depending on where the pipe comes from.</p><p>The page's job is to make the household figure concrete. Once you know your number, the abstract advice about shorter showers acquires a denominator.</p>
            TXT],
            ['title' => 'Where the per-person figure comes from', 'html' => <<<'TXT'
            <p>European indoor use runs 120 to 150 litres per person per day: 40 to 60 for showers and baths, 30 to 40 for toilets, 10 to 20 for laundry, 10 for dishes, and the rest for drinking, cooking and cleaning.</p><p>Efficiency moves all of those. A dual-flush toilet saves 40 litres a day for a family; an efficient washing machine 20; a low-flow shower head 25.</p><p>Enter your own consumption if you have a meter and a bill. Enter 140 if you do not, and treat the result as the average household rather than as yours.</p>
            TXT],
            ['title' => 'The garden is seasonal, and the page is not', 'html' => <<<'TXT'
            <p>Two hundred litres a week spread across the year is 28 litres a day, which is what the panel does. In reality it is 600 litres a week in July and nothing in January, when the tap is off and the rain does the work.</p><p>A hose delivers 500 litres in five minutes, so a weekly garden soak can easily be a cubic metre — a third of the month's indoor use in an afternoon.</p><p>If you want the summer figure rather than the annual average, set the garden box to 900 and read the daily total as a July day rather than as a year.</p>
            TXT],
            ['title' => 'Two hundred and fifteen cubic metres', 'html' => <<<'TXT'
            <p>214.8 cubic metres a year is the number on the bill, and it is the number water companies plan with. A cubic metre is 1,000 litres, or a tonne of water.</p><p>For comparison, the average European household uses 150 to 200 cubic metres, a low-consumption household 90 to 120, and an unmetered one often has no idea at all.</p><p>The form's default is slightly above average because it includes a garden. Take the garden out and the figure falls to 204 cubic metres, which is where most of the national statistics sit.</p>
            TXT],
            ['title' => 'The bill, and why it is small', 'html' => <<<'TXT'
            <p>752 euros a year at 3.50 a cubic metre is a rounding error next to heating, electricity or a car. That is why water efficiency campaigns struggle.</p><p>In Denmark and parts of Germany, where the price doubles, the bill is significant and the consumption is lower. Price does what exhortation does not.</p><p>The pipe replacement programme behind the bill is genuinely expensive: a water utility spends most of its revenue on treatment and on the network, not on the water.</p>
            TXT],
            ['title' => 'The energy hidden in the hot half', 'html' => <<<'TXT'
            <p>Heating a litre of water through 50 degrees takes 58 watt-hours. Forty per cent of four people's 560 indoor litres is 224 litres a day, and a year of that is 4,742 kilowatt-hours.</p><p>That is more energy than the household's lighting and appliances together in many homes, and it is invisible because it arrives as a boiler firing for twenty minutes.</p><p>On gas at 200 grams per kilowatt-hour the carbon is 948 kilograms. On a heat pump at 90 grams it halves; on an electric immersion heater it is worse than the boiler.</p>
            TXT],
            ['title' => 'Why forty per cent is hot', 'html' => <<<'TXT'
            <p>Showers, baths, hand-washing, dishwashing and laundry all use warm water. Toilets, garden taps and drinking water do not. Across a household the split lands near 40 per cent of indoor use.</p><p>A household with a hot-fill washing machine, or one that washes dishes under a hot tap, runs higher. One with a cold-fill machine and a low-flow shower runs lower.</p><p>The box is the least certain input on the page and the one with the largest effect on the energy output, because it multiplies straight through.</p>
            TXT],
            ['title' => 'Showers, toilets and the two easy wins', 'html' => <<<'TXT'
            <p>Showers are the largest single use at 25 to 35 per cent. Toilets are next at 20 to 30, and both have cheap fixes: a 6-litre head and a dual-flush cistern.</p><p>Together they save 60 to 100 litres a day in a family of four, which is 15 to 25 per cent of the panel's total. The hardware costs less than a year's bill in most of Europe.</p><p>Neither requires behaviour change beyond the first week. That is why utilities give them away rather than advertising them.</p>
            TXT],
            ['title' => 'Laundry, dishes and the machine you already own', 'html' => <<<'TXT'
            <p>A washing machine uses 40 to 60 litres a cycle, mostly determined by the programme. A 30-degree eco cycle uses half of a 60-degree cotton cycle, and the drum is full either way.</p><p>A dishwasher uses 9 to 12 litres and beats hand-washing under a running tap, which can reach 40. The counter-intuitive result appears consistently across studies.</p><p>Running full loads rather than half loads halves the total, and that is a scheduling behaviour rather than a purchase.</p>
            TXT],
            ['title' => 'Peak demand, and why the network cares', 'html' => <<<'TXT'
            <p>A utility must size pipes and treatment works for the peak hour, not the annual average. A hot dry Sunday afternoon in July sets the summer peak and a frosty morning the winter one.</p><p>Garden watering is the worst offender because it is instant and simultaneous: half a street filling paddling pools drops the pressure at the end of the main.</p><p>Water butts and drip irrigation move the demand off the peak, which is worth more to the network than the same volume saved in February.</p>
            TXT],
            ['title' => 'Rainwater and grey water', 'html' => <<<'TXT'
            <p>A 200-litre butt on a downpipe collects a cubic metre from 20 square metres of roof in a wet month. For garden use that is the cheapest efficiency measure available.</p><p>Grey-water systems that recycle bath water to the toilet need treatment, a second pipe run and maintenance, and cost several thousand euros for a 30 per cent saving.</p><p>Neither reduces the hot-water energy, which is where the carbon is. Both are worth it in a water-scarce region and rarely worth it on cost alone elsewhere.</p>
            TXT],
            ['title' => 'What a drought order actually changes', 'html' => <<<'TXT'
            <p>Restrictions in a drought typically ban hosepipes and the filling of pools, which targets the peak rather than the volume. The saving is 10 to 20 per cent of household demand in a normal week and much more in a heatwave.</p><p>They work because they are visible and enforceable, and because the alternative — a reservoir running dry — is worse.</p><p>The page cannot model a restriction, but it can show the size of the garden term. Set the garden box to zero and read the difference.</p>
            TXT],
            ['title' => 'Water stress is a regional fact', 'html' => <<<'TXT'
            <p>Southern Europe, the south-east of England and much of the Mediterranean are under aquifer stress; Scotland, Norway and much of France are not.</p><p>The same 215 cubic metres is a sustainability problem in one place and a billing detail in another. That is why national averages are such a poor guide to a household's water behaviour.</p><p>The larger water footprint is in food anyway: a kilogram of beef takes 15,000 litres to produce, so a week's diet dwarfs a month of showers.</p>
            TXT],
            ['title' => 'Metered, unmetered and the standing charge', 'html' => <<<'TXT'
            <p>A metered bill has two parts: a standing charge for the connection and a volumetric charge for what you use. The standing charge does not move when you save water, which means the panel's bill is the part you can influence.</p><p>In an unmetered property, nothing you do changes the bill. The environmental case for efficiency survives; the financial one does not.</p><p>That is why water companies install meters when properties change hands. Consumption falls 10 to 15 per cent in the first year after a meter goes in, which is a large effect for a small piece of hardware.</p>
            TXT],
            ['title' => 'What the utility\'s own numbers show', 'html' => <<<'TXT'
            <p>Water companies publish consumption per property, and the variation between neighbouring streets is larger than the variation between regions. Occupancy explains most of it; a four-person house uses twice what a single occupant does, not four times.</p><p>The fixed part of demand — flushing, drinking, basic hygiene — is about 50 litres per person. Everything above that is discretionary, and that is where the savings live.</p><p>Which is why occupancy is the first box on the page. It is the strongest predictor of demand and the one thing a household cannot change.</p>
            TXT],
            ['title' => 'The carbon, in context', 'html' => <<<'TXT'
            <p>948 kilograms of CO₂ a year from hot water compares with 2 to 4 tonnes from space heating and 1 to 3 from a car. Water heating is the third-largest energy use in a typical home.</p><p>Reducing it means reducing the hot volume — shorter showers, a low-flow head, an efficient machine — or reducing the carbon per kilowatt-hour, which means a heat pump or solar thermal.</p><p>The panel does neither calculation for you, but the hot-water output is the input to both. Halve it and the boiler's work halves with it.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Five inputs, five outputs, and every one can be inverted to answer a design question.</p><ul><li><strong>Daily total</strong> = people × per-person use + garden ÷ 7</li><li><strong>Annual volume</strong> = daily total × 365 ÷ 1000</li><li><strong>Bill</strong> = annual volume × price</li><li><strong>Hot-water energy</strong> = people × per-person use × hot share ÷ 100 × 0.058 × 365</li><li><strong>Carbon</strong> = energy × 0.2</li></ul><p>Inverted, the per-person box answers the target question: to hold the household under 150 cubic metres a year with a garden, indoor use must fall to about 95 litres per person.</p>
            TXT],
            ['title' => 'Where the estimate is optimistic or pessimistic', 'html' => <<<'TXT'
            <p>Optimistic: no leaks, no paddling pool, no second home and a garden that only gets watered in July.</p><p>Pessimistic: it charges all the water at the metered rate, ignores the standing charge and assumes a boiler efficiency that an old installation does not have.</p><p>The energy figure is the steadier half of the page. The volume depends on habits the form cannot see, and on a network that loses a fifth of its water before it arrives.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much water does a family of four use a year?', 'a' => 'At 140 litres per person per day, 204 cubic metres indoors. With a garden watered weekly, the page\'s default reaches 214.8 cubic metres, costing 752 euros.'],
            ['q' => 'How much energy goes into hot water?', 'a' => <<<'TXT'
            About 4,742 kilowatt-hours a year for four people at these defaults, which emits 948 kilograms of CO₂ on a gas boiler — more than the household's lighting and appliances combined.
            TXT],
            ['q' => 'What is the biggest water user in a home?', 'a' => 'Showers and baths at 25 to 35 per cent, then toilets at 20 to 30. Both can be cut with cheap hardware: a low-flow head and a dual-flush cistern.'],
            ['q' => 'Is a dishwasher or hand-washing better?', 'a' => 'A full dishwasher uses 9 to 12 litres a cycle; washing up under a running tap can use 40. The dishwasher wins if it is full and loses if it is half empty.'],
            ['q' => 'Does a garden hose really matter?', 'a' => 'A hose delivers about 500 litres in five minutes. A weekly soak can be a cubic metre, which is a third of the household\'s indoor use for a month.'],
            ['q' => 'Is rainwater harvesting worth it?', 'a' => <<<'TXT'
            For the garden, yes — a 200-litre butt costs little and collects a cubic metre a month from 20 square metres of roof. For indoor use it needs treatment and a second pipe run, which rarely pays back.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
