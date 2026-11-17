<?php

/**
 * Hydroelectric Power Calculator
 * /ecology/hydroelectric-power
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hydroelectric Power Calculator',
    'meta' => ['title' => 'Hydroelectric Power Calculator: Output From Flow', 'description' => 'Work out the electricity a hydro scheme produces from its flow, its head and its turbine efficiency, then read the output as homes and avoided carbon.', 'h1' => 'Hydroelectric Power Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The scheme',
            'fields' => [
                [
                    'name' => 'flow',
                    'label' => 'Water flow',
                    'type' => 'number',
                    'suffix' => 'm³/s',
                    'default' => '10',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'A small river in spate; a garden stream is nearer 0.05.',
                ],
                [
                    'name' => 'head',
                    'label' => 'Head',
                    'type' => 'number',
                    'unit' => '4',
                    'unit_default' => 'm',
                    'default' => '20',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'The vertical drop between intake and turbine.',
                ],
                [
                    'name' => 'efficiency',
                    'label' => 'Overall efficiency',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '85',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'Large turbines reach 90 per cent; a small pelton wheel nearer 70.',
                ],
            ],
        ],
        [
            'title' => 'What it generates',
            'fields' => [
                [
                    'name' => 'power_kw',
                    'label' => 'Electric power',
                    'type' => 'number',
                    'suffix' => 'kW',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'annual_mwh',
                    'label' => 'Electricity per year',
                    'type' => 'number',
                    'suffix' => 'MWh',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'households',
                    'label' => 'Households supplied',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                    'help' => 'At 3,500 kWh a year per household, a European average.',
                ],
                [
                    'name' => 'co2_avoided',
                    'label' => 'Carbon avoided per year',
                    'type' => 'number',
                    'suffix' => 't',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                    'help' => 'Against a grid at 480 grams per kilowatt-hour.',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Power',
            'results' => ['power_kw' => '9.81 * flow * head * efficiency / 100'],
        ],
        [
            'title' => 'Over a year',
            'results' => ['annual_mwh' => 'power_kw * 8760 / 1000', 'households' => 'annual_mwh * 1000 / 3500', 'co2_avoided' => 'annual_mwh * 480 / 1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Water falling twenty metres at ten cubic metres a second carries about 1.96 megawatts of kinetic power; at 85 per cent overall efficiency the turbine delivers 1,667.7 kilowatts, which is 14,609 megawatt-hours in a year of running. That is 4,174 households and 7,012 tonnes of carbon dioxide avoided against a grid at 480 grams per kilowatt-hour.</p>
        TXT,
        'sections' => [
            ['title' => 'The physics, in one line', 'html' => <<<'TXT'
            <p>A kilogram of water falling one metre releases 9.81 joules. Multiply by the mass flow — a cubic metre a second is a thousand kilograms a second — and by the head in metres, and you have the hydraulic power arriving at the turbine.</p><p>Nothing in that is an assumption. The assumptions all sit in the efficiency term, which is where the water that bypasses the runner, the friction in the penstock and the losses in the generator are collected.</p><p>This is why hydro is the easiest renewable resource to estimate from a map. Solar needs irradiance data and wind needs a wind atlas; a river needs a flow gauge and a surveyor's level.</p>
            TXT],
            ['title' => 'What head means in practice', 'html' => <<<'TXT'
            <p>Head is not the height of the hill; it is the vertical difference between the water surface at the intake and the water surface at the outlet, measured along the pipe. A fall of twenty metres on a map may be fifteen once the penstock route is drawn.</p><p>Low-head schemes, below about five metres, need large turbines and big flows to make anything, and are dominated by civil works. High-head schemes in mountains need a long pipe but a small turbine, and produce respectable power from a stream you could step across.</p><p>The form multiplies flow by head, so the two trade off linearly. Halving the head and doubling the flow gives the same power and a completely different engineering project: one is a big pipe and a small turbine, the other a short channel and a wide runner.</p><p>Head is also the term that makes small schemes worth doing at all. A stream of 30 litres a second is nothing on flat ground — under five metres it is one kilowatt of gross power. The same stream dropping 200 metres in a mountain gully is 60 kilowatts, which is a business.</p>
            TXT],
            ['title' => 'Ten cubic metres a second at twenty metres', 'html' => <<<'TXT'
            <p>Flow first: 9.81 × 10 × 20 = 1,962 kilowatts of hydraulic power. The 85 per cent efficiency leaves 1,667.7 kilowatts at the terminals — a mid-sized community scheme, or a dozen small ones.</p><p>A year of continuous running is 8,760 hours, so 14,609 megawatt-hours. Divide by 3,500 kilowatt-hours — a typical European household — and you get 4,174 homes.</p><p>The carbon figure assumes the electricity displaces grid power at 480 grams per kilowatt-hour, giving 7,012 tonnes a year. On a cleaner grid the avoided carbon shrinks; the generation does not.</p>
            TXT],
            ['title' => 'Where the 15 per cent goes', 'html' => <<<'TXT'
            <p>Penstock friction is the largest single loss in a small scheme: water tumbling down a pipe loses energy to turbulence, and a pipe that is too small for the flow loses a lot. Oversizing the pipe is the standard fix and the standard cost.</p><p>The turbine itself is efficient at its design point and poor away from it. A pelton wheel can reach 90 per cent; a cross-flow turbine 80; a water wheel 60 to 70. Part-load operation is where small schemes lose the most.</p><p>The generator and transformer take another 3 to 8 per cent, and the trash rack and intake a little more. A realistic overall figure for a well-built small scheme is 70 to 85 per cent, which is where the default sits.</p>
            TXT],
            ['title' => 'Run-of-river, storage and the environmental flow', 'html' => <<<'TXT'
            <p>A run-of-river scheme takes what the river gives and has no reservoir; output follows the hydrograph, and a dry August produces a fraction of the spring peak. A storage scheme holds water back and sells it at the peak price.</p><p>Almost every permit requires a minimum environmental flow — water left in the channel for fish and downstream users. That water is subtracted from the flow box before the power calculation, and in a small river it can be a third of the total.</p><p>The form takes the flow you give it. If the gauging record says ten cubic metres a second on average and the permit leaves three in the river, the number to enter is seven.</p>
            TXT],
            ['title' => 'The carbon of a reservoir', 'html' => <<<'TXT'
            <p>Hydropower is low-carbon, not zero-carbon. Reservoirs flood vegetation and soil, which decompose and release methane and carbon dioxide for years after filling; the methane matters because it is a far more potent greenhouse gas than CO₂.</p><p>The emissions vary enormously with climate and depth. Reservoirs in tropical lowlands can emit more per kilowatt-hour than a gas plant; cold mountain reservoirs emit very little. A run-of-river scheme with a small pond has almost no flooded area and almost no emissions.</p><p>Building the dam is the other term — concrete is a significant source of process CO₂. For a large dam that carbon is amortised over decades of generation; for a small scheme it is a modest fixed cost.</p>
            TXT],
            ['title' => 'Fish, sediment and the permit', 'html' => <<<'TXT'
            <p>A dam interrupts a river's continuity. Migratory fish lose their route, sediment settles in the impoundment instead of reaching the delta, and the downstream channel adjusts to cleaner water by scouring its bed.</p><p>Fish passes work for some species and not others; eels and sturgeon are much harder than salmon. Sediment flushing is possible but sends a pulse downstream that can suffocate spawning gravels.</p><p>None of that appears in the kilowatt figure, and all of it decides whether a scheme is actually built. The hydraulic calculation is the easy part of a hydro project, which is why the permitting takes longer than the construction.</p>
            TXT],
            ['title' => 'Flow is not constant, so the year is not 8,760 hours', 'html' => <<<'TXT'
            <p>14,609 megawatt-hours assumes the turbine runs at design output every hour of the year. Real run-of-river plant achieves a capacity factor of 30 to 60 per cent; reservoir plant can exceed 50 and pumped storage is a different question entirely.</p><p>At a 45 per cent capacity factor the annual figure falls by more than half, and the household count with it. The carbon figure falls in proportion, because it is derived from the same kilowatt-hours.</p><p>For a planning estimate, multiply the annual box by the capacity factor you expect and treat the result as the honest number. The form's output is a ceiling, not a forecast.</p>
            TXT],
            ['title' => 'Pumped storage is a battery, not a river', 'html' => <<<'TXT'
            <p>The largest form of energy storage in the world is water pumped uphill and let back down. Round-trip efficiency is 70 to 80 per cent, and the point is not generation but shifting cheap surplus electricity to the hours that need it.</p><p>As grids take more wind and solar, the value of that shifting rises. A pumped scheme that lost money on arbitrage a decade ago can be the most profitable asset on the system when midday power is free and evening power is expensive.</p><p>The formula on this page still applies — flow, head, efficiency — but the carbon accounting does not, because the energy in was generated somewhere else and the emissions belong upstream.</p>
            TXT],
            ['title' => 'What it costs to build', 'html' => <<<'TXT'
            <p>Small hydro capital costs run from €2,000 to €5,000 per installed kilowatt, with civil works and the grid connection often exceeding the turbine itself. At 1,667.7 kilowatts that is a multi-million-euro project before a single sale.</p><p>Running costs are low: a well-maintained scheme spends 1 to 2 per cent of capital a year on maintenance, and the fuel is free forever. That is why the levelised cost falls as the asset ages, unlike a gas plant.</p><p>Permitting is the schedule risk. Environmental assessment, fish studies, water rights and grid connection can take five years, and the flow record you need for a bankable estimate takes several years to accumulate.</p>
            TXT],
            ['title' => 'The grid connection and the last kilometre', 'html' => <<<'TXT'
            <p>1,667.7 kilowatts has to reach a grid that can accept it. A rural distribution line may already be at its thermal limit, and reinforcing it can cost more than the turbine.</p><p>Small generators also have to meet protection and power-quality requirements — voltage and frequency ride-through, anti-islanding — which are cheap in equipment terms and expensive in study time.</p><p>Off-grid, the calculation changes completely: the alternative is a diesel generator, and displacing diesel at 700 grams of CO₂ per kilowatt-hour makes the avoided-carbon box several times larger. Change the intensity and watch.</p>
            TXT],
            ['title' => 'Micro-hydro for one house', 'html' => <<<'TXT'
            <p>A household needs a kilowatt or two, and a stream falling thirty metres at 20 litres a second delivers about 5 kilowatts gross — 4 after losses, more than enough. The difficulty is not the physics but the water rights, the intake maintenance and the seasonality.</p><p>Micro-hydro has one property that solar does not: it produces through the night and through the winter, when a northern house needs the most power. It also produces in floods and droughts, which solar does not have to survive.</p><p>A battery, a small turbine and a penstock of 200 metres is a real system for a remote house, and the hours of autonomy are limited only by the stream.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Every output is one multiplication from the inputs, so the reverse questions are quick: what head do I need for a given output, or what flow.</p><ul><li><strong>Power</strong> = 9.81 × flow × head × efficiency ÷ 100</li><li><strong>Annual energy</strong> = power × 8,760 ÷ 1,000</li><li><strong>Households</strong> = annual energy × 1,000 ÷ 3,500</li><li><strong>Avoided carbon</strong> = annual energy × 480 ÷ 1,000</li><li><strong>Flow for a target</strong> = power × 100 ÷ (9.81 × head × efficiency)</li></ul><p>Worked backwards, a 100-kilowatt scheme on a 20-metre head needs about 0.6 cubic metres a second at 85 per cent — a stream, not a river. That is the scale most community hydro actually occupies.</p>
            TXT],
            ['title' => 'Where the estimate is optimistic or pessimistic', 'html' => <<<'TXT'
            <p>Optimistic: the flow is the annual mean rather than a dry-season figure, the efficiency is a manufacturer's peak rather than a part-load average, and the capacity factor is treated as 100.</p><p>Pessimistic: it ignores the value of the scheme beyond carbon — flood attenuation, grid services, the fact that the fuel arrives free and does not need a supply chain.</p><p>The page is a hydraulic calculation with an energy conversion on top. Use it to size a turbine and to sanity-check a feasibility study, not to promise a village its electricity.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much power does a small hydro scheme produce?', 'a' => <<<'TXT'
            It depends almost entirely on head and flow. Ten cubic metres a second falling twenty metres gives 1,667.7 kilowatts at 85 per cent efficiency; a mountain stream of 0.1 cubic metres a second falling 100 metres gives about 83 kilowatts.
            TXT],
            ['q' => 'What efficiency can a water turbine reach?', 'a' => <<<'TXT'
            Large pelton and francis turbines reach 90 per cent at their design point. Small schemes with penstock losses, part-load operation and generator losses typically achieve 70 to 85 per cent overall.
            TXT],
            ['q' => 'Why does the calculator assume 8,760 hours?', 'a' => <<<'TXT'
            Because it is the physical maximum and the easiest baseline. Real run-of-river plant runs at 30 to 60 per cent of capacity across a year, so multiply the annual energy by your expected capacity factor.
            TXT],
            ['q' => 'Is hydropower really zero-carbon?', 'a' => <<<'TXT'
            No. Reservoirs emit methane from flooded vegetation, especially in the tropics, and concrete carries process emissions. Run-of-river schemes with small ponds are close to zero; large tropical reservoirs can be worse than gas.
            TXT],
            ['q' => 'How much water must be left in the river?', 'a' => <<<'TXT'
            Permits usually set a minimum environmental flow, often a fraction of the natural low-flow. Subtract it from the flow before calculating, because the turbine only gets what the permit allows.
            TXT],
            ['q' => 'How many homes does a kilowatt serve?', 'a' => <<<'TXT'
            At European consumption of about 3,500 kilowatt-hours a year, one kilowatt of continuous output serves roughly 2.5 homes. The form uses that figure for its household count.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
