<?php

/**
 * Wind Turbine Calculator
 * /ecology/wind-turbine
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Wind Turbine Calculator',
    'meta' => ['title' => 'Wind Turbine Calculator: Power From Rotor and Wind', 'description' => 'Estimate a wind turbine\'s output from its rotor diameter, the wind speed and the efficiency of the drivetrain, then read it as homes and avoided carbon.', 'h1' => 'Wind Turbine Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The machine',
            'fields' => [
                [
                    'name' => 'diameter',
                    'label' => 'Rotor diameter',
                    'type' => 'number',
                    'unit' => '4',
                    'unit_default' => 'm',
                    'default' => '80',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'A 2-megawatt turbine is 80 to 100 metres across.',
                ],
                [
                    'name' => 'wind_speed',
                    'label' => 'Wind speed at hub height',
                    'type' => 'number',
                    'suffix' => 'm/s',
                    'default' => '8',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'A good onshore site averages 7 to 9.',
                ],
                [
                    'name' => 'efficiency',
                    'label' => 'Overall efficiency',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '40',
                    'rounding' => ['standard', '0'],
                    'help' => 'The Betz limit is 59 per cent; real turbines reach 45 to 50 at the design point.',
                ],
                [
                    'name' => 'density',
                    'label' => 'Air density',
                    'type' => 'number',
                    'suffix' => 'kg/m³',
                    'default' => '1.225',
                    'rounding' => ['omni', '0.001'],
                    'help' => 'Sea level at 15 degrees; 1.0 at 2,000 metres.',
                ],
            ],
        ],
        [
            'title' => 'Over a year',
            'fields' => [
                [
                    'name' => 'capacity_factor',
                    'label' => 'Capacity factor',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '30',
                    'rounding' => ['standard', '0'],
                    'help' => 'Onshore 25 to 40; offshore 40 to 55.',
                ],
                [
                    'name' => 'swept_area',
                    'label' => 'Swept area',
                    'type' => 'number',
                    'suffix' => 'm²',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'power_kw',
                    'label' => 'Electric power at that wind',
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
                    'help' => 'At 3,500 kilowatt-hours a year per household.',
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
            'title' => 'The rotor',
            'results' => ['swept_area' => 'PI * (diameter / 2) ^ 2', 'power_kw' => '0.5 * density * swept_area * wind_speed ^ 3 * efficiency / 100 / 1000'],
        ],
        [
            'title' => 'The year',
            'results' => ['annual_mwh' => 'power_kw * capacity_factor / 100 * 8760 / 1000', 'households' => 'annual_mwh * 1000 / 3500', 'co2_avoided' => 'annual_mwh * 480 / 1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>An 80-metre rotor sweeps 5,027 square metres. In an 8 metre per second wind, at 40 per cent overall efficiency, that rotor delivers 630.5 kilowatts of electricity. At a 30 per cent capacity factor it generates 1,657 megawatt-hours a year, enough for 473 households and 795 tonnes of avoided carbon.</p>
        TXT,
        'sections' => [
            ['title' => 'The physics: half rho A v cubed', 'html' => <<<'TXT'
            <p>The power in a moving fluid is half the density times the area times the cube of the speed. Every term matters, and one of them matters enormously.</p><p>Area grows with the square of the rotor diameter, which is why turbines have got bigger rather than more numerous. Doubling the diameter quadruples the power.</p><p>The cube of the wind speed is the term that decides site viability. Going from 6 to 8 metres a second nearly doubles the available power; going from 8 to 10 doubles it again.</p>
            TXT],
            ['title' => 'Why efficiency sits near forty per cent', 'html' => <<<'TXT'
            <p>The Betz limit says no turbine can capture more than 59.3 per cent of the kinetic energy in the wind, because the air must keep moving to leave the rotor.</p><p>Real turbines reach 45 to 50 per cent of Betz at their design tip-speed ratio, and lose more away from it. Forty per cent overall, including gearbox and generator losses, is a fair figure for a modern machine.</p><p>That sounds inefficient and is not. A wind turbine extracts a much larger share of the energy passing through its disc than a solar panel extracts of the sunlight falling on it, and comparing the two percentages directly is a category error.</p>
            TXT],
            ['title' => 'Eighty metres across, worked through', 'html' => <<<'TXT'
            <p>A radius of 40 metres gives an area of 5,027 square metres — 5,027 in the panel. At 1.225 kilograms per cubic metre and 8 metres a second, the wind carries 1,576 kilowatts through that disc.</p><p>Forty per cent of it is 630.5 kilowatts. That is one turbine, at the design wind speed, on a good day.</p><p>The rotor does not produce that most of the time. Output rises with the cube of wind speed until the rated power is reached, which is why the annual figure is a third of the theoretical maximum.</p>
            TXT],
            ['title' => 'Capacity factor: the number that decides the economics', 'html' => <<<'TXT'
            <p>A capacity factor of 30 per cent means the turbine produces, over a year, 30 per cent of what it would produce at full output continuously — 1,657 megawatt-hours instead of 5,523.</p><p>Onshore sites in Europe run 25 to 40 per cent. Offshore runs 40 to 55 because the wind is steadier and stronger. A poor site at 20 per cent is a bad investment whatever the turbine.</p><p>That is why wind farms are sited on hills, coasts and ridgelines rather than near the towns that use the power. The resource, not the customer, decides the location.</p>
            TXT],
            ['title' => 'The cubic law in practice', 'html' => <<<'TXT'
            <p>Triple the wind speed and you multiply the power by 27. That is why a storm is a problem rather than a bonus: turbines must shut down above about 25 metres a second or the loads destroy them.</p><p>It also means a small change in hub height matters. Wind speed rises with height, typically 10 per cent per 100 metres in open country, and the cube turns that into a third more power.</p><p>Modern onshore towers are 100 to 150 metres at the hub for that reason, and the blades are longer than a football pitch because area is the other lever.</p>
            TXT],
            ['title' => 'What a hundred and fifty megawatts of wind looks like', 'html' => <<<'TXT'
            <p>1,657 megawatt-hours a year against a household's 3.5 is 473 homes, which is a village or a small town. A 2-megawatt machine on a good site is a power station the size of a bus.</p><p>Sixteen of them make a small wind farm of 32 megawatts, occupying perhaps a square kilometre of hillside with the turbines spread out to avoid each other's wake.</p><p>The land between them stays farmland or moorland, grazed or cropped as before. Wind's land use is measured in the turbine foundations and access tracks, not the fence line, which is why a wind farm and a sheep farm occupy the same field without argument.</p>
            TXT],
            ['title' => 'Air density, altitude and temperature', 'html' => <<<'TXT'
            <p>Cold air is denser and carries more power — about 3 per cent more per 10 degrees of cooling. A turbine on a cold ridge produces measurably more than the same machine in warm air at the same speed.</p><p>Altitude does the opposite. At 2,000 metres the density is 1.0 rather than 1.225, which costs 18 per cent of the power. Mountain sites need bigger rotors for the same output.</p><p>In practice the wind resource dominates all of this. A dense lowland site beats a thin-aired mountain one unless the mountain is genuinely windier.</p>
            TXT],
            ['title' => 'Small wind is not a scaled-down version', 'html' => <<<'TXT'
            <p>A 3-metre rotor on a rooftop produces less than a kilowatt at 8 metres a second, and urban wind is turbulent and slow. Most small wind installations underperform their quoted figures by a wide margin.</p><p>The physics explains it: the area is 50 times smaller than a utility rotor, and the wind at roof height is half the speed. Both penalties multiply.</p><p>For a house, solar is usually the better renewable. For a farm or a remote site with a genuinely windy exposure, a taller tower and no shading from buildings, small wind can work — and it produces in the dark, which solar does not.</p>
            TXT],
            ['title' => 'The carbon payback', 'html' => <<<'TXT'
            <p>A 2-megawatt turbine carries several hundred tonnes of embodied CO₂ in steel, concrete, copper and composite blades. At 795 tonnes a year of avoided grid carbon, it repays that in under a year.</p><p>Over a 25-year life it avoids 20,000 tonnes, which is two orders of magnitude more than it took to build. Wind is one of the few technologies where the ratio is that favourable.</p><p>The figure falls on a very clean grid, and the embodied carbon does not. That is why wind's climate case is strongest where it displaces coal.</p>
            TXT],
            ['title' => 'What the panel leaves out', 'html' => <<<'TXT'
            <p>Wake losses between turbines, availability (95 to 98 per cent), curtailment when the grid cannot take the power, and icing or lightning shutdowns.</p><p>There is also the seasonal pattern: wind is stronger in winter in the northern hemisphere, which matches heating demand and is one of its advantages over solar.</p><p>And there are the birds and the bats, the visual impact and the noise. The page calculates electricity, not planning consent.</p>
            TXT],
            ['title' => 'What the grid does with the output', 'html' => <<<'TXT'
            <p>Wind output varies on a timescale of minutes and weather patterns on a scale of days. A single turbine is a fluctuation; a hundred spread over a region is a smoother resource.</p><p>Grid operators manage this with forecasts, interconnection and flexible plant. The cost of that flexibility is real and it is not in the panel, which prices generation only at the point of production.</p><p>In systems with a lot of wind, prices go negative on windy nights. That is not a failure of wind; it is a signal that storage and interconnection are the next investment.</p>
            TXT],
            ['title' => 'Why turbine blades keep getting longer', 'html' => <<<'TXT'
            <p>Power scales with the square of diameter, so a 30 per cent increase in blade length is a 70 per cent increase in swept area and in energy capture from the same wind.</p><p>Blades have grown from 20 metres in the 1990s to over 100 metres offshore. A single blade now needs a special ship to move it, which is why blade factories are built at ports.</p><p>Longer blades also reach steadier wind at greater height, so the gain is larger than the area alone suggests. That is the economics of wind in one sentence.</p>
            TXT],
            ['title' => 'The materials and the recycling problem', 'html' => <<<'TXT'
            <p>A turbine is mostly steel — the tower, the nacelle, the reinforcement — which is recycled at end of life. The blades are glass or carbon fibre in an epoxy matrix and have historically gone to landfill or cement kilns.</p><p>Newer blades use resins designed to be separated, and several manufacturers now offer recycling routes. The volume is small next to the steel, but it is the part of the machine that made headlines.</p><p>Foundations are concrete and mostly stay in the ground. Decommissioning terms are increasingly written into the lease.</p>
            TXT],
            ['title' => 'Noise, birds and the local argument', 'html' => <<<'TXT'
            <p>Modern turbines are quiet at a distance — 35 to 45 decibels at 300 metres, which is a library — but the amplitude modulation of the blades can be audible and annoying at night.</p><p>Bird mortality is real and site-dependent. Well-sited turbines kill far fewer birds per gigawatt-hour than cats, cars or buildings; badly sited ones on migration routes are a genuine problem.</p><p>These are the reasons planning takes years and why a project can be technically excellent and still refused. The physics is settled; the local negotiation is not, and it does not become easier with a better capacity factor.</p>
            TXT],
            ['title' => 'Offshore, and why it costs more', 'html' => <<<'TXT'
            <p>An offshore site has a steadier, stronger wind, which lifts the capacity factor to 40 or 55 per cent and the annual energy by half. It also needs a foundation in the seabed and a cable to shore.</p><p>Capital cost runs 2,000 to 3,500 euros per kilowatt against 1,200 onshore. The levelised cost is now competitive because the capacity factor is so much better and the machines are so much larger.</p><p>Floating platforms have opened deep water, where the wind is stronger still. The engineering is younger and the costs are falling faster than the onshore equivalent.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Six inputs, five outputs, and one exponent of three.</p><ul><li><strong>Swept area</strong> = π × (diameter ÷ 2)²</li><li><strong>Power</strong> = 0.5 × density × area × speed³ × efficiency ÷ 100 ÷ 1000</li><li><strong>Annual energy</strong> = power × capacity factor ÷ 100 × 8,760 ÷ 1,000</li><li><strong>Households</strong> = annual energy × 1,000 ÷ 3,500</li><li><strong>Avoided carbon</strong> = annual energy × 480 ÷ 1,000</li></ul><p>Inverted, the diameter box is the design question: for a 1-megawatt machine at this site, the rotor needs to be about 100 metres across.</p>
            TXT],
            ['title' => 'Where the estimate is optimistic', 'html' => <<<'TXT'
            <p>The power figure is the output at one wind speed, not an average. At 6 metres a second the same turbine produces 630.5 × (6/8)³ — about 266 kilowatts, less than half.</p><p>The capacity factor box is where the honest annual estimate lives, and it is the one number a developer spends years measuring.</p><p>Use the page to understand the relationships, not to size an investment. For that you need a wind atlas, a met mast and a year of data.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much power does an 80-metre-rotor turbine produce?', 'a' => 'At 8 metres a second and 40 per cent efficiency, 630.5 kilowatts. Averaged over a year at a 30 per cent capacity factor, that is 1,657 megawatt-hours.'],
            ['q' => 'Why does wind speed matter so much?', 'a' => <<<'TXT'
            Because power rises with the cube of the speed. Going from 6 to 8 metres a second nearly doubles the available energy, which is why site selection matters more than turbine choice.
            TXT],
            ['q' => 'What is the maximum efficiency of a wind turbine?', 'a' => <<<'TXT'
            The Betz limit is 59.3 per cent of the kinetic energy in the wind, and no machine can exceed it. Modern turbines reach 45 to 50 per cent of that limit at their design point, or about 40 per cent overall.
            TXT],
            ['q' => 'What capacity factor should I assume?', 'a' => '25 to 40 per cent onshore in Europe and 40 to 55 offshore. The page uses 30, which suits a decent onshore site; a poor one is below 25.'],
            ['q' => 'How many homes does one turbine power?', 'a' => 'At 1,657 megawatt-hours and 3,500 kilowatt-hours per household, 473 homes. A modern 3-megawatt turbine on a good site supplies about 2,000.'],
            ['q' => 'Is small wind worth it for a house?', 'a' => <<<'TXT'
            Rarely. A rooftop turbine has a small swept area and slow, turbulent wind, and most installations produce a fraction of their quoted output. Solar is usually the better domestic option.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
