<?php

/**
 * Passive House Calculator
 * /ecology/passive-house
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Passive House Calculator',
    'meta' => ['title' => 'Passive House Calculator: Heating Demand Saved', 'description' => 'Compare the heating energy of a certified passive house with that of a conventional home of the same size, in kilowatt-hours, carbon dioxide and annual cost.', 'h1' => 'Passive House Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The two houses',
            'fields' => [
                [
                    'name' => 'floor_area',
                    'label' => 'Treated floor area',
                    'type' => 'number',
                    'unit' => '28',
                    'unit_default' => 'm2',
                    'default' => '120',
                    'rounding' => ['standard', '0'],
                    'help' => 'The heated envelope, not the plot and not the garage.',
                ],
                [
                    'name' => 'ph_demand',
                    'label' => 'Passive house heating demand',
                    'type' => 'number',
                    'suffix' => 'kWh/m²/yr',
                    'default' => '15',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'The certification limit is 15; well-built examples reach 10.',
                ],
                [
                    'name' => 'conv_demand',
                    'label' => 'Conventional house demand',
                    'type' => 'number',
                    'suffix' => 'kWh/m²/yr',
                    'default' => '100',
                    'rounding' => ['standard', '0'],
                    'help' => 'A pre-1990 European house is 120 to 180; a modern build 50 to 70.',
                ],
                [
                    'name' => 'fuel',
                    'label' => 'Heating fuel',
                    'type' => 'select',
                    'options' => [
                        'Gas boiler' => '200',
                        'Oil boiler' => '270',
                        'Heat pump, average grid' => '90',
                        'Heat pump, clean grid' => '30',
                        'District heat' => '120',
                    ],
                    'help' => 'Grams of CO₂ per kilowatt-hour of delivered heat.',
                ],
                [
                    'name' => 'price',
                    'label' => 'Price of heat',
                    'type' => 'number',
                    'suffix' => '€/kWh',
                    'default' => '0.12',
                    'rounding' => ['omni', '0.001'],
                ],
            ],
        ],
        [
            'title' => 'What the difference is worth',
            'fields' => [
                [
                    'name' => 'ph_energy',
                    'label' => 'Passive house, per year',
                    'type' => 'number',
                    'suffix' => 'kWh',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'conv_energy',
                    'label' => 'Conventional house, per year',
                    'type' => 'number',
                    'suffix' => 'kWh',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'saving_energy',
                    'label' => 'Energy saved per year',
                    'type' => 'number',
                    'suffix' => 'kWh',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'saving_co2',
                    'label' => 'Carbon saved per year',
                    'type' => 'number',
                    'suffix' => 't CO₂',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'saving_cost',
                    'label' => 'Heating bill saved',
                    'type' => 'number',
                    'suffix' => '€',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Heating energy',
            'results' => ['ph_energy' => 'floor_area * ph_demand', 'conv_energy' => 'floor_area * conv_demand', 'saving_energy' => 'conv_energy - ph_energy'],
        ],
        [
            'title' => 'Carbon and cost',
            'results' => ['saving_co2' => 'saving_energy * fuel / 1000000', 'saving_cost' => 'saving_energy * price'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A certified passive house of 120 square metres needs no more than 15 kilowatt-hours per square metre for heating — 1,800 kilowatt-hours a year, against 12,000 for a conventional house of the same size at 100. The 10,200 kilowatt-hours saved is 2.04 tonnes of carbon on a gas boiler and 1,224 euros off the heating bill at 12 cents a kilowatt-hour.</p>
        TXT,
        'sections' => [
            ['title' => 'What a passive house actually is', 'html' => <<<'TXT'
            <p>A passive house is a building standard, not a style. It sets a limit on how much energy a building needs for heating, and it reaches that limit with insulation, airtightness and heat recovery rather than with a smaller boiler.</p><p>The name is slightly misleading. A passive house is not a house with no heating system; it is a house where the heating demand is small enough to be met by the ventilation air, a towel rail or a single small heat pump.</p><p>The standard was developed in Darmstadt in the 1990s and is certified by the Passive House Institute. It applies to offices, schools and factories as readily as to dwellings, and the certification is a design check rather than a performance guarantee.</p>
            TXT],
            ['title' => 'The five principles', 'html' => <<<'TXT'
            <p>Continuous insulation wraps the building without gaps. A wall rated at 0.15 watts per square metre per kelvin lets through a third of the heat of a typical modern wall, and the thickness is 250 to 400 millimetres.</p><p>Airtightness is measured as air changes per hour at 50 pascals. The standard demands 0.6; a conventional house is closer to 4 to 8, and every one of those air changes is warm air leaving through a crack.</p><p>Thermal bridges — balconies, window reveals, wall-to-floor junctions — are designed out or wrapped, because a single uninsulated steel balcony can undo a wall.</p><p>Triple glazing with insulated frames brings the window close to the wall's performance, and a mechanical ventilation unit with heat recovery supplies fresh air while keeping most of the heat.</p>
            TXT],
            ['title' => 'One hundred and twenty square metres, worked through', 'html' => <<<'TXT'
            <p>The passive house: 120 square metres at 15 kilowatt-hours each is 1,800 kilowatt-hours a year. That is less than a typical refrigerator and a tumble dryer together.</p><p>The conventional house: the same 120 square metres at 100 kilowatt-hours is 12,000. The difference, 10,200 kilowatt-hours, is what the extra insulation is buying every year for the life of the building.</p><p>At 200 grams of CO₂ per kilowatt-hour of gas, the saving is 2.04 tonnes a year; at 12 cents a kilowatt-hour it is 1,224 euros. Over thirty years that is 60 tonnes and a five-figure sum, before any change in energy prices.</p>
            TXT],
            ['title' => 'Why fifteen kilowatt-hours is the number', 'html' => <<<'TXT'
            <p>The certification limit is 15 kilowatt-hours per square metre of treated floor area per year for space heating, or alternatively a peak load of 10 watts per square metre. Both are design values, calculated in a modelling tool rather than measured.</p><p>It is also, roughly, the point at which the ventilation system can carry the heating load. Below 15, warm supply air is enough; above it, you need radiators, and the building is no longer passive in any meaningful sense.</p><p>Well-built examples reach 8 to 12. The limit is a ceiling that competent design clears, not a target that requires heroics, which is why the standard has survived thirty years of construction practice.</p>
            TXT],
            ['title' => 'Airtightness, the number nobody quotes', 'html' => <<<'TXT'
            <p>A building that leaks is a building with an uncontrolled ventilation system, and in winter that system runs at full rate all the time. The 0.6 air-change limit at 50 pascals is the single most demanding requirement in the standard.</p><p>It is demanding because it is about workmanship, not specification. A good membrane, a taped window and a service penetration sealed properly are cheap; missing any of them fails the test.</p><p>The test itself is simple: pressurise the house with a fan door and measure the airflow needed to hold 50 pascals. A house that fails is not ruined — it can usually be fixed by finding the leak with a smoke pencil — but the fixing costs more than the sealing would have.</p>
            TXT],
            ['title' => 'The heat pump changes the carbon, not the energy', 'html' => <<<'TXT'
            <p>Change the fuel box from a gas boiler to a heat pump on an average grid and the carbon saving falls to about 0.92 tonnes, because the grid is cleaner per kilowatt-hour than a boiler's flame.</p><p>On a clean grid it falls to 0.31 tonnes. The energy saving is identical in all three cases; only the carbon per kilowatt-hour moved.</p><p>That is why a passive house and a heat pump are complements rather than substitutes. The fabric reduces the demand, and the heat pump reduces the carbon of what remains. Doing one without the other leaves most of the benefit on the table.</p>
            TXT],
            ['title' => 'Money: what the extra fabric costs', 'html' => <<<'TXT'
            <p>The premium over a conventional build is usually quoted at 5 to 15 per cent of construction cost, or a few hundred euros per square metre. For a 120-square-metre house that is €25,000 to €60,000.</p><p>Against that, 1,224 euros a year of heating is a long payback on the energy alone. The financial case rests on the other things the fabric buys: no boiler, no radiators, better comfort, and a house that holds its value as efficiency standards tighten.</p><p>In a new build the marginal cost is much lower than in a retrofit, because the insulation goes in during construction rather than through a demolished wall. That is the cheapest passive house anyone will ever build, and it is the one most people do not get to choose.</p>
            TXT],
            ['title' => 'Summer overheating', 'html' => <<<'TXT'
            <p>A highly insulated, airtight house holds heat in both directions. The standard requires the indoor temperature to stay below 25 degrees for no more than 10 per cent of the year, and meeting that in a warming climate is the harder half of the design.</p><p>The tools are external shading, night-time purge ventilation through openable windows, and a bypass on the ventilation unit. Mechanical cooling is allowed but it rather defeats the purpose.</p><p>This is where a passive house built to a 2010 climate model can fail in a 2025 summer. Orientation and shading matter more than they used to, and the certification now asks for them.</p>
            TXT],
            ['title' => 'Retrofit: EnerPHit and what is achievable', 'html' => <<<'TXT'
            <p>Existing buildings cannot usually reach 15. The retrofit standard, EnerPHit, sets 25 kilowatt-hours per square metre for heating, or a demand reduction to a quarter of the original — still a transformation for a pre-war terraced house.</p><p>The constraint is geometry. Internal insulation loses floor area, external insulation changes the facade and may not be permitted on a listed building, and windows in a thick wall need deep reveals.</p><p>The economics are also different: a retrofit is done once every thirty years, when the roof or the boiler needs replacing anyway. Do the insulation at that moment and it is affordable; do it separately and it is not.</p>
            TXT],
            ['title' => 'The ventilation question', 'html' => <<<'TXT'
            <p>An airtight house needs mechanical ventilation, and a heat-recovery unit recovers 80 to 90 per cent of the heat from the outgoing air. It also filters pollen and particulate matter, which is a health benefit the energy calculation ignores.</p><p>The unit uses 30 to 60 watts continuously, which is 260 to 520 kilowatt-hours a year — noticeable against a 1,800-kilowatt-hour heating demand, and included in the standard's primary energy limit rather than the heating limit.</p><p>Filters need changing once or twice a year, and ducts need cleaning. That maintenance is the part of passive house living that surprises people most, and the part that gets neglected.</p>
            TXT],
            ['title' => 'What the fifteen excludes', 'html' => <<<'TXT'
            <p>The heating limit says nothing about hot water, lighting or appliances. A household's total energy use is dominated by those, which is why a passive house with an electric resistance water heater can still have a poor overall footprint.</p><p>The standard's primary energy limit — 120 kilowatt-hours per square metre of renewable primary energy — does capture the whole building, and it is the number to check if you care about total impact rather than heating alone.</p><p>The page models space heating only. Add a hot-water figure if you want a household comparison, and expect it to be larger than the heating demand in a well-built passive house.</p>
            TXT],
            ['title' => 'How a passive house behaves in winter', 'html' => <<<'TXT'
            <p>The interior stays within a degree or two across the whole house. There are no cold corners, no draughts from the floor, and the temperature at ankle height is close to the temperature at head height — which is the comfort claim the standard actually sells.</p><p>Radiators are unnecessary, so the walls are free for furniture and the rooms are quieter without a boiler cycling. In a well-built house you can put a hand on the inside of an external wall in January and it is warm.</p><p>The trade is slower response. A passive house takes a day to warm up and a day to cool down, because the mass is inside the insulation. That is fine for a home and awkward for a holiday let.</p>
            TXT],
            ['title' => 'What changed since the standard was written', 'html' => <<<'TXT'
            <p>Three things. Photovoltaic panels became cheap, so a passive house can now be a net-positive building rather than merely a low-demand one. Heat pumps became standard, so the remaining heat can come from electricity rather than gas.</p><p>And summers became hotter. The 1990s German climate model that set the shading assumptions no longer describes a central European July, which is why overheating criteria now carry more weight in certification.</p><p>The result is a standard that has aged well in its principles and needed updating in its details — which is roughly what a thirty-year-old building standard should look like.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Two multiplications and two more set the panel, and every one of them inverts cleanly.</p><ul><li><strong>Passive energy</strong> = floor area × passive demand</li><li><strong>Conventional energy</strong> = floor area × conventional demand</li><li><strong>Energy saved</strong> = conventional − passive</li><li><strong>Carbon saved</strong> = energy saved × grams per kWh ÷ 1,000,000</li><li><strong>Cost saved</strong> = energy saved × price</li></ul><p>Inverted, the area box answers the question a self-builder asks: how large a house can I have and still keep the heating bill under a given figure? At 15 kilowatt-hours and 12 cents, each square metre costs about €1.80 a year to heat.</p>
            TXT],
            ['title' => 'Where the estimate is optimistic', 'html' => <<<'TXT'
            <p>Design values are not metered values. Occupants open windows, dry laundry indoors and run the heating at 23 degrees; measured consumption in certified houses is often 20 to 50 per cent above the modelled figure, though still far below a conventional house.</p><p>The comparison house matters just as much. A 1970s house at 150 kilowatt-hours makes the saving look enormous; a 2020 building-regulation house at 50 makes it look modest.</p><p>And the carbon figure depends on the fuel you assume, which is the whole point of the select box. The page is a comparison between two buildings, not a prediction of your bill.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much heating does a passive house need?', 'a' => <<<'TXT'
            The certification limit is 15 kilowatt-hours per square metre per year, and good examples achieve 10 to 12. For 120 square metres that is 1,800 kilowatt-hours a year at the limit.
            TXT],
            ['q' => 'How much does a passive house save compared with a normal house?', 'a' => 'At the page\'s defaults the saving is 10,200 kilowatt-hours a year — 2.04 tonnes of carbon on gas and 1,224 euros of heating bill.'],
            ['q' => 'Does a passive house need a heating system?', 'a' => <<<'TXT'
            Usually a small one: a heat pump or a post-heater in the ventilation duct. The load is low enough that warm supply air can carry it, which is why radiators are rare.
            TXT],
            ['q' => 'What is the airtightness requirement?', 'a' => <<<'TXT'
            0.6 air changes per hour at a pressure difference of 50 pascals, verified with a blower door test. A conventional house is typically 4 to 8, and the gap is where most of the heat goes.
            TXT],
            ['q' => 'Is a passive house worth the extra cost?', 'a' => <<<'TXT'
            On heating bills alone the payback is long. On comfort, resilience to energy prices, and the resale value of a high-performance building, the case is stronger — and much stronger in a new build than in a retrofit.
            TXT],
            ['q' => 'Can an old house be made passive?', 'a' => <<<'TXT'
            Rarely to the full standard. The EnerPHit retrofit standard allows 25 kilowatt-hours per square metre, which is achievable for most masonry buildings with external insulation and new windows.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
