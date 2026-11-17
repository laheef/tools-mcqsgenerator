<?php

/**
 * Solar Panel Wattage Calculator
 * /ecology/solar-panel-wattage
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Solar Panel Wattage Calculator',
    'meta' => ['title' => 'Solar Panel Wattage Calculator: Size for Your Use', 'description' => 'Size a solar array from a daily electricity need: how many kilowatts peak it must be, how many panels that takes and how much roof area the system needs.', 'h1' => 'Solar Panel Wattage Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'What you need',
            'fields' => [
                [
                    'name' => 'daily_kwh',
                    'min' => '0.001',
                    'label' => 'Electricity used per day',
                    'type' => 'number',
                    'suffix' => 'kWh',
                    'default' => '10',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'A European household of three or four is 8 to 12.',
                ],
                [
                    'name' => 'sun_hours',
                    'min' => '0.001',
                    'label' => 'Peak sun hours per day',
                    'type' => 'number',
                    'suffix' => 'h',
                    'default' => '3.5',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'An annual average; northern Europe 2.5 to 3.5.',
                ],
                [
                    'name' => 'losses',
                    'min' => '0',
                    'max' => '99.9',
                    'label' => 'System losses',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '15',
                    'rounding' => ['standard', '0'],
                    'help' => 'Inverter, cabling, dirt, heat and mismatch.',
                ],
                [
                    'name' => 'panel_watt',
                    'min' => '1',
                    'label' => 'Panel rating',
                    'type' => 'number',
                    'suffix' => 'W',
                    'default' => '400',
                    'rounding' => ['standard', '0'],
                ],
            ],
        ],
        [
            'title' => 'What that means for the roof',
            'fields' => [
                [
                    'name' => 'kwp',
                    'label' => 'Array size needed',
                    'type' => 'number',
                    'suffix' => 'kWp',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'panels',
                    'label' => 'Panels needed',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                    'help' => 'Rounded up to whole panels.',
                ],
                [
                    'name' => 'area',
                    'label' => 'Roof area',
                    'type' => 'number',
                    'suffix' => 'm²',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                    'help' => 'At 1.7 square metres per panel, including the gaps between rows.',
                ],
                [
                    'name' => 'annual_kwh',
                    'label' => 'Generation per year',
                    'type' => 'number',
                    'suffix' => 'kWh',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Size',
            'results' => ['kwp' => 'daily_kwh / (sun_hours * (1 - losses / 100))', 'panels' => 'ceil(kwp * 1000 / panel_watt)', 'area' => 'panels * 1.7'],
        ],
        [
            'title' => 'Generation',
            'results' => ['annual_kwh' => 'panels * panel_watt / 1000 * sun_hours * 365 * (1 - losses / 100)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Ten kilowatt-hours a day, 3.5 peak sun hours and 15 per cent of losses need an array of 3.36 kilowatts peak. At 400 watts a panel that is 9 panels, 15.3 square metres of roof, producing about 3,909 kilowatt-hours over the year at the stated panel count and losses.</p>
        TXT,
        'sections' => [
            ['title' => 'Size from consumption, not from budget', 'html' => <<<'TXT'
            <p>The usual mistake is to start with a budget and work backwards. That produces an array sized to a price rather than to a roof, and a household that still imports electricity in June.</p><p>Start with the annual bill, divide by the price per kilowatt-hour, and you have the consumption. Divide again by 365 for the daily figure the form asks for.</p><p>Then decide how much of it you want to generate. Covering 100 per cent of annual consumption does not mean importing nothing, because summer and winter do not coincide — but it is the standard target for a grid-connected house.</p>
            TXT],
            ['title' => 'Peak sun hours, explained without jargon', 'html' => <<<'TXT'
            <p>A peak sun hour is one hour at 1,000 watts per square metre. A June day in Berlin might deliver 5 of them; a December day, 0.7. The annual average is around 3.</p><p>It is not the length of the day. It is the day's total irradiance divided by 1,000, which flattens the curve into a rectangle of equivalent full-power hours.</p><p>The unit is deliberately physical. It makes a Spanish roof and a Scottish roof comparable, which a latitude on its own does not.</p><p>Typical annual averages: 2.5 in northern Scotland, 3.5 in central Europe, 4.5 in southern France, 5.5 in southern Spain. Use the annual figure for an annual calculation and a winter figure if you are sizing an off-grid system.</p><p>The winter figure matters more than people expect. In December central Europe delivers 0.5 to 1 peak sun hour, so a system that balances on the annual average produces almost nothing during the weeks of highest demand.</p>
            TXT],
            ['title' => 'Ten kilowatt-hours a day, worked through', 'html' => <<<'TXT'
            <p>Divide 10 by 3.5 to get 2.857 kilowatts, then divide by 0.85 for the losses: 3.36 kilowatts peak. Round up to the next whole panel and the system is 3.6 kilowatts.</p><p>9 panels of 400 watts is 3.6 kilowatts, which at 1.7 square metres each needs 15.3 square metres of roof including the gaps between rows.</p><p>The annual check is the easy one: the demand is 3,650 kilowatt-hours a year; the rounded-up 3.6-kilowatt array produces about 3,909 kilowatt-hours at these assumptions, leaving a small sizing margin.</p>
            TXT],
            ['title' => 'Why 15 per cent of losses', 'html' => <<<'TXT'
            <p>The losses are real and they are not optional: 3 to 5 per cent in the inverter, 2 to 3 in the cabling, 2 to 4 from dirt and soiling, 3 to 8 from heat, and 1 to 2 from mismatch between panels.</p><p>Together that is 12 to 20 per cent, with 15 a fair middle. A well-installed system with short DC runs and a good inverter sits at the low end.</p><p>Do not use the loss box to model shading. Shading is not a percentage of the whole array; it is a local problem that can take out a whole string, and it needs a site survey rather than a fudge factor.</p>
            TXT],
            ['title' => 'Rounding up to whole panels', 'html' => <<<'TXT'
            <p>Panels come in fixed sizes, so the array is always slightly larger than the calculation. 3.36 kilowatts becomes 3.6, which is 7 per cent more capacity and 7 per cent more generation.</p><p>That margin is useful. It covers degradation in the first years, a dirtier roof than assumed and a colder winter than the average.</p><p>It also means the inverter should be sized to the array, not to the load: a 3.6- kilowatt inverter on a 3.6-kilowatt array is correctly matched, and oversizing the inverter wastes money on capacity that is never used.</p>
            TXT],
            ['title' => 'Roof area, and how much you actually have', 'html' => <<<'TXT'
            <p>A modern 400-watt panel is about 1.7 square metres, which is 235 watts per square metre of panel. The roof needs more area than the panels because of walkways, vent pipes and the gap between rows on a flat roof.</p><p>Pitched roof: multiply the panel area by 1.1. Flat roof: multiply by 1.4 to 1.6, because the rows must be spaced far enough apart not to shade each other in December.</p><p>Useful reality check: a typical European terraced house has 25 to 40 square metres of usable south-facing roof, enough for 5 to 9 kilowatts, which is more than most households need. A detached house usually has more roof and less consumption per square metre, so the surplus is larger.</p>
            TXT],
            ['title' => 'Winter is the sizing month', 'html' => <<<'TXT'
            <p>An annual sizing calculation is fine for a grid-connected house, where the grid absorbs the winter deficit. For an off-grid system, December sets the size.</p><p>In central Europe, December delivers about 20 per cent of June's yield, and cloudy December days deliver less than that. A system sized on the annual average would run a battery flat in a week.</p><p>The battery then sets a second constraint: two to three days of autonomy at the December daily need, which for a 10-kilowatt-hour household is 20 to 30 kilowatt-hours of storage — several times the size of a typical domestic battery.</p><p>Off-grid sizing multiplies the array by three to five and the battery by two to three days of autonomy. That is why off-grid solar costs several times more per kilowatt-hour than rooftop solar.</p>
            TXT],
            ['title' => 'East-west roofs and the shape of the day', 'html' => <<<'TXT'
            <p>A pure east-west roof produces 10 to 15 per cent less over the year, but the curve is flatter: more in the morning and evening, less at noon. For a household with a battery or a heat pump, that shape can be worth more than the lost yield.</p><p>Split arrays — some panels east, some west, on one inverter — smooth the output and reduce clipping without spending anything extra on electronics.</p><p>What does not work is a north-facing roof in the northern hemisphere. It produces 40 to 50 per cent less and rarely pays back.</p>
            TXT],
            ['title' => 'The inverter ratio', 'html' => <<<'TXT'
            <p>Inverters are rated in kilowatts of AC output, and the array's DC capacity is usually 10 to 30 per cent higher. The ratio is deliberate: the array rarely reaches peak output, and a smaller inverter costs less and runs more efficiently at part load.</p><p>On a 3.6-kilowatt array a 3.0-kilowatt inverter is a reasonable match in northern Europe and would clip too much in Spain.</p><p>Clipping at 2 per cent of annual generation is the usual target. More than that and the saved inverter cost is being paid back in lost kilowatt-hours.</p>
            TXT],
            ['title' => 'What the daily box should contain', 'html' => <<<'TXT'
            <p>Your average daily consumption, not your peak. A household that uses 20 kilowatt-hours on a winter Sunday and 6 on a summer Tuesday averages about 10, and it is the average that the annual calculation needs.</p><p>If you are adding a heat pump or an electric car, size for the future figure. Retrofit panels later is possible but the inverter and the mounting rarely allow a clean doubling.</p><p>The meter reading is the honest source. Take two readings a month apart and divide by the days; the bill's annual figure divided by 365 is the next best thing.</p>
            TXT],
            ['title' => 'Working from a bill, a meter or an app', 'html' => <<<'TXT'
            <p>Three sources of the daily figure, in increasing order of accuracy: the annual bill divided by 365; the utility's online annual summary; and two meter readings taken a month apart.</p><p>The bill is usually a band rather than a number, because it is estimated rather than read. The app is better if the meter is smart, and a fortnight of readings is better still.</p><p>Whatever you use, separate the heating and hot water if they are electric. An all-electric house with a heat pump uses 15,000 to 20,000 kilowatt-hours a year, and an array that covers that is a commercial-sized installation.</p>
            TXT],
            ['title' => 'How much a panel actually produces', 'html' => <<<'TXT'
            <p>One 400-watt panel at 3.5 peak sun hours and 85 per cent efficiency produces about 1.19 kilowatt-hours a day, or 435 over a year. Nine panels therefore produce about 3,909 kilowatt-hours annually.</p><p>The number varies with the weather by 10 to 15 per cent between years, and with the latitude by much more. A panel in Oslo produces half of one in Athens.</p><p>This is why quotes are given in annual kilowatt-hours rather than in panel counts, and why comparing two quotes by panel number alone is meaningless.</p>
            TXT],
            ['title' => 'Roof, garden and balcony options', 'html' => <<<'TXT'
            <p>A pitched roof is the standard site. Ground-mounted arrays in a garden work if there is space and no shading, and are easier to clean and to expand.</p><p>A balcony system is a quarter of a normal array: one or two panels, a micro-inverter and a plug. It covers a fridge and a laptop rather than a house, and it needs no scaffolding.</p><p>Whichever you have, measure the unshaded area at noon in December rather than in June. The winter shadow of a neighbouring building is the constraint that decides the array.</p>
            TXT],
            ['title' => 'Why the roof box can be the binding constraint', 'html' => <<<'TXT'
            <p>Most households find the roof is big enough and the budget is not. The exception is a flat or a terraced house with a small south-facing slope, where 15.3 square metres may simply not exist.</p><p>In that case, orient the panels on the best available plane and accept a lower yield, or split them across two roof faces with separate string inputs.</p><p>The form does not model orientation, so reduce the peak sun hours box instead: an east-facing roof at 45 degrees is about 15 per cent down, which takes 3.5 hours to 3.0.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Four inputs and four outputs, and every one can be inverted.</p><ul><li><strong>Array size</strong> = daily need ÷ (peak sun hours × (1 − losses ÷ 100))</li><li><strong>Panels</strong> = ceiling of (size × 1,000 ÷ panel watts)</li><li><strong>Area</strong> = panels × 1.7</li><li><strong>Annual generation</strong> = daily need × 365</li></ul><p>Inverted, the panel box answers a different question: at 500 watts per panel this system needs eight instead of nine, and a tenth of a square metre less roof.</p>
            TXT],
            ['title' => 'Where the estimate is optimistic or pessimistic', 'html' => <<<'TXT'
            <p>Optimistic: the peak sun hours are an annual average applied to a system that must work in December, and the loss factor ignores snow, shade and ageing.</p><p>Pessimistic: it ignores that a slightly oversized array costs little extra, since the mounting and labour are already paid for.</p><p>The page is a first-pass sizing tool. Use it to check a quote or to see whether your roof is big enough, then have the installer do the shade analysis.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many solar panels do I need for 10 kWh a day?', 'a' => 'About 9 panels of 400 watts — an array of 3.36 kilowatts peak, taking 15.3 square metres of roof, at 3.5 peak sun hours and 15 per cent losses.'],
            ['q' => 'What are peak sun hours?', 'a' => <<<'TXT'
            The day's total solar irradiance expressed as hours at 1,000 watts per square metre. Central Europe averages 3 to 3.5 a year, southern Spain 5 to 6, and December is a fraction of June.
            TXT],
            ['q' => 'How much roof do I need per kilowatt?', 'a' => <<<'TXT'
            About 5 square metres per kilowatt of panels, plus 10 per cent for walkways on a pitched roof. Flat roofs need 40 to 60 per cent more because the rows must be spaced against winter shading.
            TXT],
            ['q' => 'Why does the calculator add 15 per cent for losses?', 'a' => <<<'TXT'
            Inverter, cabling, soiling, heat and mismatch together cost 12 to 20 per cent of the theoretical output. Fifteen is a fair middle for a well-installed domestic system.
            TXT],
            ['q' => 'Is the annual figure the same as the daily times 365?', 'a' => <<<'TXT'
            Almost. 3,650 kilowatt-hours assumes an average day all year, but real production is seasonal: about 40 per cent of the annual total arrives in the four months around midsummer.
            TXT],
            ['q' => 'Can I add panels later?', 'a' => <<<'TXT'
            Sometimes, if the inverter has spare capacity and the roof has space. Plan for it at the start: oversizing the inverter by 20 per cent costs a little now and saves a replacement later.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
