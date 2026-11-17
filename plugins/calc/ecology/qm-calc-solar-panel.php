<?php

/**
 * Solar Panel Calculator
 * /ecology/solar-panel
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Solar Panel Calculator',
    'meta' => ['title' => 'Solar Panel Calculator: Output, Savings, Payback', 'description' => 'Estimate the annual output of a rooftop solar array, its bill saving, the carbon dioxide avoided and the simple payback period, from its size and yield.', 'h1' => 'Solar Panel Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The array',
            'fields' => [
                [
                    'name' => 'kwp',
                    'min' => '0.001',
                    'label' => 'System size',
                    'type' => 'number',
                    'suffix' => 'kWp',
                    'default' => '4',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'Ten panels of 400 watts is 4 kilowatts peak.',
                ],
                [
                    'name' => 'yield',
                    'min' => '0.001',
                    'label' => 'Specific yield',
                    'type' => 'number',
                    'suffix' => 'kWh/kWp/yr',
                    'default' => '950',
                    'rounding' => ['standard', '0'],
                    'help' => 'Northern Europe 850 to 1,000; Spain 1,400 to 1,600.',
                ],
                [
                    'name' => 'self_use',
                    'min' => '0',
                    'max' => '100',
                    'label' => 'Share used in the house',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '50',
                    'rounding' => ['standard', '0'],
                    'help' => 'The rest is exported; a battery raises this figure.',
                ],
                [
                    'name' => 'cost',
                    'min' => '0',
                    'label' => 'Installed cost',
                    'type' => 'number',
                    'suffix' => '€',
                    'default' => '6000',
                    'rounding' => ['standard', '0'],
                ],
            ],
        ],
        [
            'title' => 'Prices and value',
            'fields' => [
                [
                    'name' => 'price',
                    'min' => '0',
                    'label' => 'Electricity price',
                    'type' => 'number',
                    'suffix' => '€/kWh',
                    'default' => '0.25',
                    'rounding' => ['omni', '0.001'],
                ],
                [
                    'name' => 'export_price',
                    'min' => '0',
                    'label' => 'Export price',
                    'type' => 'number',
                    'suffix' => '€/kWh',
                    'default' => '0.07',
                    'rounding' => ['omni', '0.001'],
                ],
            ],
        ],
        [
            'title' => 'Over a year',
            'fields' => [
                [
                    'name' => 'annual_kwh',
                    'label' => 'Generation',
                    'type' => 'number',
                    'suffix' => 'kWh',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'self_kwh',
                    'label' => 'Used in the house',
                    'type' => 'number',
                    'suffix' => 'kWh',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'export_kwh',
                    'label' => 'Exported',
                    'type' => 'number',
                    'suffix' => 'kWh',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'saving',
                    'label' => 'Value per year',
                    'type' => 'number',
                    'suffix' => '€',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'payback',
                    'label' => 'Simple payback (0 = none)',
                    'type' => 'number',
                    'suffix' => 'years',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                    'help' => 'Zero means annual bill savings are zero, so there is no finite payback.',
                ],
                [
                    'name' => 'co2_saved',
                    'label' => 'Carbon avoided',
                    'type' => 'number',
                    'suffix' => 't CO₂',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                    'help' => 'At 400 grams per kilowatt-hour of grid electricity.',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Generation and split',
            'results' => ['annual_kwh' => 'kwp * yield', 'self_kwh' => 'annual_kwh * self_use / 100', 'export_kwh' => 'annual_kwh - self_kwh'],
        ],
        [
            'title' => 'Value',
            'results' => ['saving' => 'self_kwh * price + export_kwh * export_price', 'payback' => '(saving > 0 ? cost / saving : 0)', 'co2_saved' => 'annual_kwh * 0.4 / 1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Four kilowatts peak at a specific yield of 950 kilowatt-hours per kilowatt gives 3,800 kilowatt-hours a year, of which 1,900 is used in the house and 1,900 is exported. That is 608 euros of value, a simple payback of 9.9 years on a 6,000-euro system and 1.52 tonnes of carbon avoided annually.</p>
        TXT,
        'sections' => [
            ['title' => 'What four kilowatts peak means', 'html' => <<<'TXT'
            <p>Peak capacity is the output under standard test conditions: 1,000 watts per square metre of irradiance, 25 degrees, no shading. A 4-kilowatt array therefore produces 4 kilowatts on a cold clear noon in April and much less at any other time.</p><p>Its annual energy is the peak capacity multiplied by the hours of equivalent full sun. In northern Europe that is 850 to 1,000; in southern Spain, 1,500 or more.</p><p>The distinction matters because panels are sold by peak capacity and paid for by kilowatt-hours. Two identical arrays in Vilnius and Seville differ by 50 per cent in income.</p>
            TXT],
            ['title' => 'Specific yield, the only site-specific number', 'html' => <<<'TXT'
            <p>Yield bundles irradiance, orientation, tilt, shading and temperature into a single figure per installed kilowatt. It is the number to get right, and it is the number sellers are most tempted to flatter.</p><p>A south-facing roof at 35 degrees in central Europe is around 950 to 1,050. East-west gives 10 to 15 per cent less. A shaded chimney can take 20 per cent off the panels near it — and a string inverter loses the whole string, not just the shaded panel.</p><p>Online yield calculators use satellite irradiance and are accurate to about 5 per cent for an unshaded roof. Use one, then reduce the figure for the shading you can see with your own eyes.</p>
            TXT],
            ['title' => 'Three thousand eight hundred kilowatt-hours, worked through', 'html' => <<<'TXT'
            <p>4 kilowatts times 950 is 3,800 kilowatt-hours. Spread across a year that is about 10.4 a day, with 25 a day in June and 2 in December.</p><p>Half of it, 1,900, is consumed behind the meter and displaces electricity at the retail price of 25 cents. The other half, 1,900, is sold at 7 cents.</p><p>The money follows: 475 euros of avoided import plus 133 euros of export is 608. Divide the 6,000-euro cost by that and the simple payback is 9.9 years.</p>
            TXT],
            ['title' => 'Self-consumption decides the money', 'html' => <<<'TXT'
            <p>Self-consumed electricity is worth three to four times exported electricity, so the self-consumption share is the most valuable number on the panel after the yield.</p><p>A household that is out all day and does not shift loads will self-consume 25 to 35 per cent. One with a heat pump or an electric car charging at midday can reach 60 to 70.</p><p>Set the share to 30 per cent and the saving falls to about 480 euros; set it to 70 and it rises to about 800. Same panels, same sun, different behaviour.</p>
            TXT],
            ['title' => 'Export rates are a policy, not a price', 'html' => <<<'TXT'
            <p>Seven cents is a typical post-subsidy export tariff in Europe. Feed-in tariffs were once four times that, guaranteed for twenty years, and they built the industry.</p><p>Those schemes have mostly closed to new applicants, and what replaced them — net metering, smart export guarantees, time-of-use tariffs — varies by country and changes with every government.</p><p>Which is why the page separates the two prices. A calculator that bundles them into one number stops being useful the year the tariff changes, and the tariffs have changed in most European countries at least twice since 2020.</p>
            TXT],
            ['title' => 'The carbon payback is faster than the money', 'html' => <<<'TXT'
            <p>A rooftop array carries 1 to 2 tonnes of embodied CO₂: polysilicon, glass, aluminium frame, inverter. At 1.52 tonnes a year of avoided grid carbon, it repays that in a year or two.</p><p>Over a 25-year life the array avoids 35 to 40 tonnes, which is an order of magnitude more than it took to build. Panels are one of the few products where the lifetime benefit dwarfs the manufacturing cost by a wide margin.</p><p>On a very clean grid the avoided carbon per kilowatt-hour falls and the payback lengthens. The panels still make sense; the climate argument just gets smaller.</p>
            TXT],
            ['title' => 'Payback, properly', 'html' => <<<'TXT'
            <p>Simple payback ignores the time value of money, panel degradation, inverter replacement and electricity price rises. A discounted calculation at 4 per cent gives roughly 9.9 to 12 years, depending on which of those you believe.</p><p>Electricity prices have been volatile enough that the assumption dominates the result. At 40 cents a kilowatt-hour the payback falls to six years; at 15 it stretches past fifteen.</p><p>The inverter is the one certain cost: it fails at year 12 to 15 and costs 10 to 15 per cent of the original system. Budget for it and the surprise disappears.</p>
            TXT],
            ['title' => 'Do batteries pay?', 'html' => <<<'TXT'
            <p>A battery raises self-consumption from 50 to 70 or 80 per cent, which converts exported electricity at 7 cents into avoided import at 25. The gain is 18 cents per kilowatt-hour shifted.</p><p>A 5-kilowatt-hour battery cycling daily shifts about 1,800 kilowatt-hours a year, worth around 320 euros. Against a cost of 4,000 to 6,000 euros, the payback is longer than the warranty.</p><p>Batteries make sense where export is worthless or the grid unreliable. Where export pays reasonably and the grid is stable, they are a comfort purchase rather than an investment.</p>
            TXT],
            ['title' => 'Degradation and real-world output', 'html' => <<<'TXT'
            <p>Panels lose 0.4 to 0.6 per cent of output a year. After 25 years a good array is at 85 per cent, which the page's single annual figure does not show.</p><p>Soiling cuts a few per cent in most climates and much more in dusty ones; snow covers the array for days in a northern winter. Neither is in the yield figure unless the calculator you used models it.</p><p>Total lifetime generation for a 4-kilowatt system is 80,000 to 90,000 kilowatt-hours. That is the number to compare with the embodied carbon, and with the 6,000 euros.</p>
            TXT],
            ['title' => 'Roof, orientation, shading', 'html' => <<<'TXT'
            <p>South at 30 to 40 degrees is optimal in the northern hemisphere. East or west costs 10 to 20 per cent of annual yield but spreads production into morning and evening, which can raise self-consumption enough to compensate.</p><p>Flat roofs need tilted mounting, which costs space and wind loading. A 4-kilowatt array needs 20 to 25 square metres of flat roof against 18 of pitched roof.</p><p>Shading is the killer, and it is seasonal: a deciduous tree is a problem in April and a benefit in August. Model it in winter, when the sun is low and the leaves are gone.</p>
            TXT],
            ['title' => 'The inverter and the grid connection', 'html' => <<<'TXT'
            <p>A 4-kilowatt array usually gets a 3.6 to 4-kilowatt inverter, since oversizing the DC side by 10 to 30 per cent captures more of the shoulder hours without clipping much at noon.</p><p>The grid connection is a formality in most of Europe up to 10 kilowatts, and a negotiation above it. The limit is usually the local transformer, not the paperwork.</p><p>Modern inverters also provide grid services — voltage support, frequency response — which is why the standards keep changing and why a cheap unapproved inverter is a false economy.</p>
            TXT],
            ['title' => 'What a quote should tell you', 'html' => <<<'TXT'
            <p>Panel model and wattage, inverter model, mounting system, and the estimated annual generation with the assumptions behind it. A quote that gives none of these is a price, not a proposal.</p><p>Check the yield against a public calculator for your postcode. If the quote is 15 per cent above what the satellite data says, the shading assumption or the panel count is wrong somewhere.</p><p>Ask for the commissioning report: string voltages, insulation resistance and an IV curve trace. It takes twenty minutes and it is the only evidence that the array was installed correctly rather than merely installed.</p>
            TXT],
            ['title' => 'Why the price fell and what is left', 'html' => <<<'TXT'
            <p>Module prices fell by more than 90 per cent between 2010 and 2023. A 4-kilowatt system that cost 20,000 euros in Germany in 2010 costs 6,000 now, and most of the remaining cost is scaffolding, mounting and labour rather than silicon.</p><p>That is why small systems have a worse price per kilowatt than large ones: the fixed costs — scaffold, inverter, connection, paperwork — do not scale with panel count.</p><p>It also explains why the economics differ so much between countries. The hardware is global; the labour, the permits and the electricity price are not.</p>
            TXT],
            ['title' => 'Solar in a rented flat or a shaded street', 'html' => <<<'TXT'
            <p>Not everyone has a roof. A balcony system — one or two panels plugged into a socket through a micro-inverter — produces 400 to 800 kilowatt-hours a year and has become legal in several European countries.</p><p>The economics are modest and the self-consumption share is high, because a small array is usually fully used in the flat below it. Payback runs to ten or fifteen years.</p><p>For everyone else, the answer is a community scheme or a green tariff. The page can size a roof, but a third of Europeans do not have one to size.</p>
            TXT],
            ['title' => 'What the panels do to the grid', 'html' => <<<'TXT'
            <p>A single 4-kilowatt array is invisible to the network. A street of them, all exporting at noon on a sunny Sunday, is a voltage problem for the local transformer.</p><p>That is why some countries now curtail domestic export or pay less for it at peak generation hours, and why batteries and heat pumps are being pushed as a way to keep the electricity local.</p><p>None of this changes the arithmetic for one household. It changes the tariff, which is the box you should update every year, and it changes the value of a battery, which is why the two questions are usually asked together.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Six inputs, six outputs, and the reverse questions are what buyers actually ask.</p><ul><li><strong>Generation</strong> = size × specific yield</li><li><strong>Self-used</strong> = generation × self-consumption ÷ 100</li><li><strong>Exported</strong> = generation − self-used</li><li><strong>Value</strong> = self-used × retail price + exported × export price</li><li><strong>Payback</strong> = cost ÷ value</li><li><strong>Carbon avoided</strong> = generation × 0.4 ÷ 1000</li></ul><p>Inverted, the cost box answers the sizing question: a system that must pay back in eight years at these prices can cost about 4,900 euros for each 4 kilowatts.</p>
            TXT],
            ['title' => 'Where the estimate is optimistic or pessimistic', 'html' => <<<'TXT'
            <p>Optimistic: the yield comes from an unshaded ideal roof, the self-consumption share assumes someone is home all day, and the electricity price is the peak retail rate rather than the average one.</p><p>Pessimistic: it ignores degradation, inverter replacement and the fact that a kilowatt-hour exported at noon may be worth less than the tariff on a sunny Sunday.</p><p>The page is a first-pass estimate with visible assumptions. Put your own yield and your own tariff in it and it becomes a reasonable business case; leave the defaults and it is a sanity check on a quote.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much electricity does a 4 kW solar system produce?', 'a' => 'About 3,800 kilowatt-hours a year at a specific yield of 950, which suits central Europe. In southern Europe the same array produces 5,500 to 6,000.'],
            ['q' => 'How long until solar panels pay for themselves?', 'a' => 'At the page\'s defaults, 9.9 years on a 6,000-euro system saving 608 euros a year. Cheap electricity or a low self-consumption share stretches that considerably.'],
            ['q' => 'Is self-consumption better than exporting?', 'a' => <<<'TXT'
            Yes, usually three to four times better, because imported electricity costs 25 cents against an export tariff of 7. Using the power in the house beats selling it.
            TXT],
            ['q' => 'Do solar panels produce more carbon than they save?', 'a' => <<<'TXT'
            No. A rooftop array carries 1 to 2 tonnes of embodied CO₂ and avoids 1.52 tonnes a year, so it repays its manufacturing carbon in a year or two of a 25-year life.
            TXT],
            ['q' => 'Is a battery worth adding?', 'a' => <<<'TXT'
            Rarely on economics alone. Shifting a kilowatt-hour from export to self-use is worth about 18 cents, and a home battery's cost per cycle is usually higher than that unless you have a time-of-use tariff or no export payment.
            TXT],
            ['q' => 'How much roof do I need for 4 kW?', 'a' => 'About 18 to 20 square metres of pitched roof for ten 400-watt panels, or 20 to 25 square metres of flat roof once the rows are spaced for winter shading.'],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
