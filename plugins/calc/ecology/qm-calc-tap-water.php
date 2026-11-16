<?php

/**
 * Tap Water Calculator
 * /ecology/tap-water
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tap Water Calculator',
    'meta' => ['title' => 'Tap Water Calculator: Litres, Cost and Hot Water', 'description' => 'Add up a household\'s showers and all the other tap use to get the litres, the cubic metres, the annual water bill and the energy that is hidden in hot water.', 'h1' => 'Tap Water Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'What goes down the drain',
            'fields' => [
                [
                    'name' => 'shower_min',
                    'label' => 'Shower minutes per day',
                    'type' => 'number',
                    'suffix' => 'min',
                    'default' => '8',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'For the whole household, added up.',
                ],
                [
                    'name' => 'flow',
                    'label' => 'Shower flow rate',
                    'type' => 'number',
                    'suffix' => 'l/min',
                    'default' => '9',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'A modern head is 8 to 10; an old one 12 to 15.',
                ],
                [
                    'name' => 'other_litres',
                    'label' => 'Other tap use per day',
                    'type' => 'number',
                    'suffix' => 'l',
                    'default' => '60',
                    'rounding' => ['standard', '0'],
                    'help' => 'Drinking, cooking, washing up, cleaning. Toilets not included.',
                ],
                [
                    'name' => 'hot_share',
                    'label' => 'Share that is hot water',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '40',
                    'rounding' => ['standard', '0'],
                ],
            ],
        ],
        [
            'title' => 'Price',
            'fields' => [
                [
                    'name' => 'price',
                    'label' => 'Water and sewerage price',
                    'type' => 'number',
                    'suffix' => '€/m³',
                    'default' => '3.5',
                    'rounding' => ['omni', '0.01'],
                    'help' => 'Combined supply and wastewater charges.',
                ],
            ],
        ],
        [
            'title' => 'Over a year',
            'fields' => [
                [
                    'name' => 'shower_litres',
                    'label' => 'Shower water per day',
                    'type' => 'number',
                    'suffix' => 'l',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'daily_litres',
                    'label' => 'Total water per day',
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
                    'label' => 'Water bill per year',
                    'type' => 'number',
                    'suffix' => '€',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'hot_kwh',
                    'label' => 'Energy to heat the water',
                    'type' => 'number',
                    'suffix' => 'kWh',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                    'help' => 'At 58 watt-hours per litre heated through 50 degrees.',
                ],
                [
                    'name' => 'hot_co2',
                    'label' => 'Carbon from that heating',
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
            'title' => 'Litres',
            'results' => ['shower_litres' => 'shower_min * flow', 'daily_litres' => 'shower_litres + other_litres', 'annual_m3' => 'daily_litres * 365 / 1000'],
        ],
        [
            'title' => 'Cost and heat',
            'results' => ['annual_cost' => 'annual_m3 * price', 'hot_kwh' => 'daily_litres * hot_share / 100 * 0.058 * 365', 'hot_co2' => 'hot_kwh * 0.2'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Eight minutes of showering a day at nine litres a minute is 72 litres, and with 60 litres of other use the household runs 132 litres a day — 48.2 cubic metres a year, 169 euros on the water bill and 1,118 kilowatt-hours of energy to heat the 40 per cent that is hot, emitting 224 kilograms of CO₂.</p>
        TXT,
        'sections' => [
            ['title' => 'Where household water goes', 'html' => <<<'TXT'
            <p>Showers and baths take about a third of domestic water; toilets another third; washing machines, dishwashers and taps the rest. A garden tap adds a seasonal spike that a daily average hides.</p><p>This page counts showers and general tap use, so it undercounts a household with a garden and overcounts one with a water-saving toilet. Both are worth knowing before you trust the annual figure too closely.</p><p>The average European uses 120 to 150 litres a day indoors. The default here is 132, which is deliberately near the average rather than near the target.</p>
            TXT],
            ['title' => 'The shower, in litres and in energy', 'html' => <<<'TXT'
            <p>Flow rate is the number to change. A 9-litre head is a modern standard; an old mixer delivers 12 to 15 and a power shower 20. Eight minutes at 15 litres is 120 litres, nearly the whole household's daily use in one shower.</p><p>A low-flow head at 6 litres a minute halves the water and halves the heating energy, and costs less than a month's water bill. It is the single highest-return change in the page.</p><p>Shower time matters as much as flow. A four-minute shower at 15 litres uses less than a ten-minute shower at 9, which is the arithmetic that makes a timer in the bathroom a genuinely effective gadget rather than a gimmick.</p>
            TXT],
            ['title' => 'One hundred and thirty-two litres a day', 'html' => <<<'TXT'
            <p>72 litres of shower plus 60 of other use is 132 a day, which over 365 days is 48.2 cubic metres — the unit water companies bill in.</p><p>At 3.50 a cubic metre, including sewerage, that is 169 euros a year. In countries where water is metered and expensive — Denmark, Germany, parts of Spain — the figure is higher; in Ireland and much of the UK's unmetered stock, it is not billed at all.</p><p>The water itself is the smaller part of the bill. Sewerage treatment usually costs more per cubic metre than supply, and it is charged on the same volume.</p>
            TXT],
            ['title' => 'The energy hidden in hot water', 'html' => <<<'TXT'
            <p>Heating a litre of water through 50 degrees takes about 58 watt-hours. Forty per cent of 132 litres is 52.8 litres a day, or 1,118 kilowatt-hours a year.</p><p>That is hot water's share of the page: more than the shower's water cost, more than the water bill, and comparable to a small household's entire lighting load.</p><p>On a gas boiler at 200 grams per kilowatt-hour, the carbon is 224 kilograms a year. On a heat pump at 90 grams it is half that; on an electric immersion heater it is worse than the boiler.</p>
            TXT],
            ['title' => 'Why 50 degrees', 'html' => <<<'TXT'
            <p>Cold water arrives at 10 to 15 degrees in a European winter and hot water is stored at 60, so the working difference is about 50 kelvin. The form uses that as a constant because it is close enough for an estimate.</p><p>In summer the cold main is warmer and the energy needed falls by 20 per cent. In a very cold climate it rises. Neither changes the ranking of a low-flow head against a new boiler.</p><p>Legionella control sets the storage temperature at 60 degrees, which is why hot water is not simply heated to the temperature you wash at.</p>
            TXT],
            ['title' => 'The cost of a cubic metre', 'html' => <<<'TXT'
            <p>European water and sewerage charges run from about 1.50 to 6 euros per cubic metre, with Denmark and Germany at the top and Italy and Ireland at the bottom.</p><p>The price is a policy choice as much as a cost: it funds treatment plants, pipe replacement and the leakage programme that keeps non-revenue water below 20 per cent.</p><p>A low price is why water efficiency gets less attention than energy efficiency. The saving from a low-flow head is a few tens of euros a year, which does not pay for a plumber, but the energy saving might.</p>
            TXT],
            ['title' => 'Leaks and the water you pay for twice', 'html' => <<<'TXT'
            <p>A dripping cistern or a leaking garden tap can waste 200 litres a day without anyone noticing, which is 73 cubic metres a year — more than half the household's metered use.</p><p>Read the meter at night with everything off. If it moves, there is a leak. Most are cistern washers, costing a few euros to replace, and the rest are usually an outside tap or a buried supply pipe.</p><p>The page cannot see a leak, and neither can a bill until it arrives. A monthly meter reading is the cheapest diagnostic a household has.</p>
            TXT],
            ['title' => 'Hot water without a tank', 'html' => <<<'TXT'
            <p>A combi boiler heats water on demand and avoids standing losses, which are 1 to 2 kilowatt-hours a day from a poorly insulated cylinder. A well-insulated one loses less than half that.</p><p>Solar thermal panels preheat the cylinder in summer and cut the boiler's work by 50 to 70 per cent between May and September. Photovoltaic panels plus a heat pump do the same job with less plumbing.</p><p>All of these reduce the 1,118 kilowatt-hours rather than the water volume, which is why the page shows both.</p>
            TXT],
            ['title' => 'Water stress and the wider footprint', 'html' => <<<'TXT'
            <p>The carbon in hot water is the part that matters for climate; the water itself matters where it is scarce. Southern Europe's aquifers are under pressure and a household's 48 cubic metres is a small share of a regional problem.</p><p>The larger water footprint is in food, not taps. A kilogram of beef takes 15,000 litres to produce; a kilogram of wheat 1,500. A household's tap use is a rounding error against its diet, and a single beef meal a week outweighs a year of showers in water terms.</p><p>Which is worth saying plainly. Fix the dripping tap because it is easy, not because it is the biggest number in the house.</p>
            TXT],
            ['title' => 'Baths, dishwashers and washing machines', 'html' => <<<'TXT'
            <p>A full bath is 150 to 200 litres — more than a day's total in the panel. A short bath in a shallow tub is 80, which is one long shower.</p><p>A dishwasher uses 9 to 12 litres a cycle, and a modern one uses less than washing up by hand under a running tap, which can reach 40 litres. A washing machine is 40 to 60 litres a cycle, mostly determined by the programme rather than the load.</p><p>Both are counted in the other-use box if you include them, which is why 60 litres is a household figure rather than a personal one.</p>
            TXT],
            ['title' => 'The toilet, the biggest single user', 'html' => <<<'TXT'
            <p>A toilet is a third of indoor water and the page does not count it. An old cistern uses 9 litres a flush; a modern dual-flush uses 4 and 2.5; a family of four at 15 flushes a day can add 60 to 130 litres daily.</p><p>That is why the number in the panel looks low against a metered bill. Add the toilet to the other-use box and the totals line up with what a water company measures.</p><p>A displacement bag in an old cistern saves a litre a flush for almost nothing. A replacement dual-flush costs 100 euros and saves 40 litres a day.</p>
            TXT],
            ['title' => 'Grey water and rainwater', 'html' => <<<'TXT'
            <p>Rainwater harvesting for the garden is straightforward and cheap: a butt on a downpipe collects 1,000 litres from 20 square metres of roof in a wet month.</p><p>Grey-water recycling for toilets needs a treatment unit, a second pipe network and maintenance, and costs several thousand euros. It saves 30 per cent of indoor use, which is the toilet's share.</p><p>Neither reduces the hot-water energy, which is where the carbon is. Both make sense in water-scarce regions and rarely make sense on cost alone elsewhere.</p>
            TXT],
            ['title' => 'What a water company does with the money', 'html' => <<<'TXT'
            <p>Most of a water bill is not water. Treatment, pumping and pipe maintenance dominate, and in countries with ageing networks the leakage programme is the single largest expense.</p><p>Non-revenue water — treated water that never reaches a customer — runs from 5 per cent in the best-run utilities to 40 per cent in the worst. That is a capital problem wearing an operating cost's clothes.</p><p>Which is why domestic efficiency campaigns target a smaller number than they imply. The household's 48 cubic metres is a rounding error next to the network's losses, and both are worth fixing for different reasons.</p>
            TXT],
            ['title' => 'Metered or unmetered', 'html' => <<<'TXT'
            <p>In much of the United Kingdom a household can still pay a fixed charge based on the rateable value of the property rather than on what it uses. A meter almost always wins for a small household and usually loses for a large family with a garden.</p><p>Where meters are compulsory — most of continental Europe — the price is the signal, and the signal is weak because water is cheap relative to income in most countries.</p><p>Which is why the panel's cost box is the least interesting number on the page and the energy box is the most. Water is a bargain; hot water, which carries the carbon, is not.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Five inputs produce six outputs, and the reverse questions are the practical ones.</p><ul><li><strong>Shower water</strong> = minutes × flow rate</li><li><strong>Daily total</strong> = shower water + other use</li><li><strong>Annual volume</strong> = daily total × 365 ÷ 1000</li><li><strong>Bill</strong> = annual volume × price</li><li><strong>Heat energy</strong> = daily total × hot share ÷ 100 × 0.058 × 365</li><li><strong>Heat carbon</strong> = energy × grams per kWh ÷ 1000</li></ul><p>Inverted, the flow box is the useful one: to keep the annual bill under 120 euros at these prices, the household needs a flow rate of about 6 litres a minute.</p>
            TXT],
            ['title' => 'Where the estimate is optimistic or pessimistic', 'html' => <<<'TXT'
            <p>Optimistic: it assumes no leaks, no garden, no bath and a boiler that is serviced. Each of those adds litres the panel never sees.</p><p>Pessimistic: it charges all the water at the metered rate, which is wrong for unmetered households and wrong again where sewerage is billed on a different basis.</p><p>The energy figure is the steadier half of the page, because heating water is a physical process with a known constant, while bills depend on the tariff you happen to be on.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much water does a shower use?', 'a' => 'Eight minutes at nine litres a minute is 72 litres. A low-flow head at six litres halves it, and cutting two minutes off the shower saves another quarter.'],
            ['q' => 'How much does water cost per cubic metre?', 'a' => 'Including sewerage, most of Europe charges 1.50 to 6 euros per cubic metre. The page uses 3.50, which gives 169 euros for 48.2 cubic metres a year.'],
            ['q' => 'How much energy does hot water use?', 'a' => <<<'TXT'
            About 58 watt-hours per litre heated through 50 degrees. At 132 litres a day with 40 per cent hot, that is 1,118 kilowatt-hours and 224 kilograms of CO₂ a year on gas.
            TXT],
            ['q' => 'Is a low-flow shower head worth it?', 'a' => <<<'TXT'
            Usually yes. Going from nine to six litres a minute cuts shower water by a third and the heating energy with it, and the head costs less than the annual saving in most of Europe.
            TXT],
            ['q' => 'Why does my bill not match the calculator?', 'a' => <<<'TXT'
            Because the panel does not know about leaks, garden watering, baths, unmetered supply or a fixed standing charge. Read the meter at night with everything off to rule out the first of those.
            TXT],
            ['q' => 'How much water does a household use per year?', 'a' => <<<'TXT'
            At the page's defaults, 48.2 cubic metres — about 132 litres a day. The European average is 120 to 150 litres per person per day, so a family of four is roughly double this figure.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
