<?php

/**
 * Plug-in Hybrid Economy Calculator
 * /ecology/phev-economy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Plug-in Hybrid Economy Calculator',
    'meta' => ['title' => 'Plug-in Hybrid Calculator: Electric vs Petrol', 'description' => 'Work out what a plug-in hybrid costs to run on electricity and on petrol, per hundred kilometres and per year, and how much carbon the battery really saves.', 'h1' => 'Plug-in Hybrid Economy Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The car',
            'fields' => [
                [
                    'name' => 'ev_range',
                    'min' => '0.001',
                    'label' => 'Electric range',
                    'type' => 'number',
                    'suffix' => 'km',
                    'default' => '60',
                    'rounding' => ['standard', '0'],
                    'help' => 'The usable electric range, not the brochure figure.',
                ],
                [
                    'name' => 'battery',
                    'min' => '0.001',
                    'label' => 'Usable battery capacity',
                    'type' => 'number',
                    'suffix' => 'kWh',
                    'default' => '12',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'A plug-in hybrid typically has 10 to 18 kilowatt-hours.',
                ],
                [
                    'name' => 'fuel_use',
                    'min' => '0.001',
                    'label' => 'Petrol consumption with an empty battery',
                    'type' => 'number',
                    'suffix' => 'l/100 km',
                    'default' => '6',
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'annual_km',
                    'min' => '0.001',
                    'label' => 'Distance driven per year',
                    'type' => 'number',
                    'suffix' => 'km',
                    'default' => '15000',
                    'rounding' => ['standard', '0'],
                ],
            ],
        ],
        [
            'title' => 'Energy prices',
            'fields' => [
                [
                    'name' => 'electricity_price',
                    'min' => '0.001',
                    'label' => 'Electricity price',
                    'type' => 'number',
                    'suffix' => '€/kWh',
                    'default' => '0.25',
                    'rounding' => ['omni', '0.001'],
                ],
                [
                    'name' => 'petrol_price',
                    'min' => '0.001',
                    'label' => 'Petrol price',
                    'type' => 'number',
                    'suffix' => '€/l',
                    'default' => '1.7',
                    'rounding' => ['omni', '0.01'],
                ],
            ],
        ],
        [
            'title' => 'The comparison',
            'fields' => [
                [
                    'name' => 'ev_kwh',
                    'label' => 'Electric consumption',
                    'type' => 'number',
                    'suffix' => 'kWh/100 km',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'ev_cost',
                    'label' => 'Electric cost',
                    'type' => 'number',
                    'suffix' => '€/100 km',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'fuel_cost',
                    'label' => 'Petrol cost',
                    'type' => 'number',
                    'suffix' => '€/100 km',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'saving',
                    'label' => 'Saving per 100 km',
                    'type' => 'number',
                    'suffix' => '€',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'annual_saving',
                    'label' => 'Saving per year',
                    'type' => 'number',
                    'suffix' => '€',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'co2_saved',
                    'label' => 'Carbon saved per year',
                    'type' => 'number',
                    'suffix' => 'kg CO₂',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                    'help' => 'At 2.31 kilograms per litre of petrol and 400 grams per kilowatt-hour.',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Energy per hundred kilometres',
            'results' => ['ev_kwh' => 'battery / ev_range * 100', 'ev_cost' => 'ev_kwh * electricity_price', 'fuel_cost' => 'fuel_use * petrol_price'],
        ],
        [
            'title' => 'Savings',
            'results' => ['saving' => 'fuel_cost - ev_cost', 'annual_saving' => 'saving * annual_km / 100', 'co2_saved' => '(fuel_use * 2.31 - ev_kwh * 0.4) * annual_km / 100'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A plug-in hybrid with a 12 kilowatt-hour battery and 60 kilometres of electric range uses 20 kilowatt-hours per hundred kilometres — 5 euros of electricity against 10.2 euros of petrol for the same distance. Drive 780 euros a year better on the electric side at 15,000 kilometres, and emit 879 kilograms less carbon, if you actually plug it in.</p>
        TXT,
        'sections' => [
            ['title' => 'Why the official economy figure is fiction', 'html' => <<<'TXT'
            <p>A plug-in hybrid is type-approved at one and a half litres per hundred kilometres. No owner achieves that, because the test assumes the battery starts full and is depleted over a short cycle that is mostly electric.</p><p>The official figure is not a lie, it is a description of a driving pattern: a commute shorter than the electric range, repeated with a full battery. That is a real pattern for some drivers and a fantasy for most.</p><p>The page avoids the argument entirely by asking for both halves separately. What does the car use on electricity, and what does it use on petrol? The ratio between them is a driving habit, not a specification.</p>
            TXT],
            ['title' => 'The battery\'s real consumption', 'html' => <<<'TXT'
            <p>Twelve kilowatt-hours over 60 kilometres is 20 kilowatt-hours per hundred kilometres — 20 in the panel. A purpose-built electric car of the same size uses 15 to 18, because it carries no engine, gearbox or fuel tank.</p><p>That inefficiency is the price of the hybrid layout. The car drags a second powertrain around whenever it is running on electricity, and drags a battery around whenever it is running on petrol.</p><p>Charging losses add about 10 per cent: the meter measures more than the battery stores, and the difference is heat in the cable and the charger.</p>
            TXT],
            ['title' => 'Cost per hundred kilometres, both ways', 'html' => <<<'TXT'
            <p>Electric: 20 kilowatt-hours at 25 cents is 5 euros. Petrol: six litres at 1.70 is 10.2 euros. The difference is 5.2 euros per hundred kilometres, a saving of about half.</p><p>That gap depends entirely on the two prices. At a home tariff of 12 cents the electric cost halves; at a public rapid charger of 60 cents it more than doubles and the saving disappears.</p><p>Petrol at 1.70 a litre is a European price. At American fuel prices the petrol side falls to about six euros, and the case for charging weakens considerably.</p>
            TXT],
            ['title' => 'The annual figure depends on how you drive', 'html' => <<<'TXT'
            <p>The 780 euro annual saving assumes every kilometre is driven on electricity, which is only true for a driver whose daily distance is inside the range and who charges every night.</p><p>The industry measure is the utility factor: the share of distance driven electric. Type approval assumes 70 to 80 per cent. Real-world studies of privately owned plug-in hybrids find 40 to 50, and company cars lower still.</p><p>Halve the electric share and the saving halves. Set it to zero and the car is worse than a plain petrol model, because it is carrying a battery it never uses.</p>
            TXT],
            ['title' => 'The carbon comparison', 'html' => <<<'TXT'
            <p>A litre of petrol emits 2.31 kilograms of CO₂ when burned, so six litres per hundred kilometres is 13.86 kilograms. Electricity at 400 grams per kilowatt-hour makes 20 kilowatt-hours 8 kilograms.</p><p>Across 15,000 kilometres the difference is 879 kilograms a year, roughly the emissions of a short-haul flight. On a French grid it would be more than twice that; on a coal-heavy grid the electric side can be worse than the petrol one.</p><p>The carbon box is therefore a grid question disguised as a car question. Change the electricity price and you change the money; change the grid and you change the climate case.</p>
            TXT],
            ['title' => 'Why the car is heavy', 'html' => <<<'TXT'
            <p>A plug-in hybrid carries an engine, a gearbox, a fuel tank, a battery and an electric motor. The result is 150 to 250 kilograms more than an equivalent petrol car and 200 to 400 more than a battery-electric one of the same size.</p><p>Weight costs energy in acceleration and rolling resistance, which is why the petrol consumption with an empty battery is often worse than the non-hybrid version of the same car.</p><p>This is the structural argument against the layout: it optimises a test cycle rather than a vehicle. A smaller battery in a lighter car, or a larger battery in a dedicated electric platform, both beat it on physics.</p>
            TXT],
            ['title' => 'Charging habits decide everything', 'html' => <<<'TXT'
            <p>A plug-in hybrid that is never plugged in is a heavy petrol car with a small regenerative brake. Several European studies have found that a significant share of company-owned plug-ins are charged rarely or never.</p><p>That is not entirely the driver's fault. A car parked on a street with no driveway has nowhere to charge overnight, and a 12-kilowatt-hour battery is not worth a detour to a rapid charger.</p><p>Which is why the honest advice is conditional: if you can charge at home or at work, the layout works; if you cannot, buy the conventional hybrid or the full electric car instead.</p>
            TXT],
            ['title' => 'The company-car problem', 'html' => <<<'TXT'
            <p>Tax rules across Europe reward low official CO₂, and official CO₂ for a plug-in hybrid is measured on the optimistic test. The result has been a boom in plug-in hybrid company cars and a much smaller boom in plug-in hybrid charging.</p><p>The subsidies were designed to push a technology and instead pushed a label. Several countries have since tightened the rules, and the share of plug-ins in new registrations has fallen where they did.</p><p>The page cannot fix an incentive, but it can show the arithmetic the incentive ignores: the car's benefit depends on a behaviour that the tax code never asked about.</p>
            TXT],
            ['title' => 'When a full electric car is the better answer', 'html' => <<<'TXT'
            <p>Fifteen thousand kilometres a year is 41 kilometres a day, inside the electric range of most plug-in hybrids and comfortably inside the range of any battery-electric car.</p><p>A dedicated electric car uses 15 to 18 kilowatt-hours per hundred kilometres instead of 20, needs no petrol at all, and has no engine to service. The only reason to choose the hybrid is the long journey you take twice a year.</p><p>If those journeys are the deciding factor, rent a car for them. The arithmetic usually favours the electric car plus two rentals over the hybrid's compromise every day of the year.</p>
            TXT],
            ['title' => 'What the petrol engine is still for', 'html' => <<<'TXT'
            <p>Two uses survive the electrification of the commute: motorway journeys beyond the battery's range, and anything that needs sustained power — towing, a full car on a mountain pass, a roof box at speed.</p><p>On a motorway the engine is doing what it does well, running at a steady load in its efficient band. Consumption there is close to the non-hybrid figure, which is why long distance driving is where the plug-in's advantage evaporates.</p><p>For a household with one car that must do everything, that is a genuine argument. For a two-car household, one electric car and one petrol car for the long trips is the cheaper and lower-carbon arrangement.</p>
            TXT],
            ['title' => 'Servicing and depreciation', 'html' => <<<'TXT'
            <p>A plug-in hybrid has two powertrains to maintain: oil, filters, belts and exhaust on one side, battery cooling and power electronics on the other. Service costs land between a petrol car and an electric one, closer to the petrol end.</p><p>Depreciation has been the unpleasant surprise. Early plug-in hybrids lost value faster than either pure petrol or pure electric cars, because buyers doubted the battery and distrusted the complexity.</p><p>The battery warranty is usually eight years or 160,000 kilometres to 70 per cent capacity. Check it before buying used, and check whether the previous owner ever plugged the car in — the battery's history is the car's history.</p>
            TXT],
            ['title' => 'The second-hand question', 'html' => <<<'TXT'
            <p>A used plug-in hybrid is often the cheapest way into electric driving, and the riskiest. Battery degradation shows up as a shorter electric range, which is the thing you were buying.</p><p>Ask for the state of health from the car's own diagnostic port, not the dashboard guess. A battery at 85 per cent after five years is normal; one at 70 per cent has been abused or is about to fail.</p><p>Then repeat the page's arithmetic with the degraded range. Forty-five kilometres instead of sixty raises consumption to 27 kilowatt-hours per hundred, and the saving shrinks accordingly.</p>
            TXT],
            ['title' => 'How to test the claim before you buy', 'html' => <<<'TXT'
            <p>Ask for the car for a week and drive your normal week in it. Charge it every night, then note how often the engine started. That single observation tells you your utility factor, which is the only number in this page you cannot look up.</p><p>Then change the annual distance box to your real figure and the electricity price to your real tariff. The saving that appears is the one you would actually bank.</p><p>If the result is small and the car costs several thousand more than the petrol version, you have your answer. The arithmetic is not on the side of the badge, it is on the side of the charging cable.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Six inputs produce six outputs, and the reverse questions are the ones a buyer actually asks.</p><ul><li><strong>Electric consumption</strong> = battery ÷ range × 100</li><li><strong>Electric cost</strong> = consumption × electricity price</li><li><strong>Petrol cost</strong> = litres per 100 km × petrol price</li><li><strong>Saving per 100 km</strong> = petrol cost − electric cost</li><li><strong>Annual saving</strong> = saving × annual distance ÷ 100</li><li><strong>Carbon saved</strong> = (litres × 2.31 − consumption × 0.4) × distance ÷ 100</li></ul><p>The break-even electricity price is the one where the two costs meet: at six litres and 1.70 a litre, any tariff below 51 cents keeps the electric side cheaper. Most public chargers are below that; some are not.</p>
            TXT],
            ['title' => 'Where the estimate is optimistic or pessimistic', 'html' => <<<'TXT'
            <p>Optimistic: charging losses are ignored, the battery is assumed to deliver its full usable capacity in all weather, and every kilometre is electric.</p><p>Pessimistic: cold weather cuts electric range by 20 to 30 per cent, the engine starts for cabin heat, and the petrol consumption with a flat battery is worse than the figure entered because the car is heavy.</p><p>The useful way to use the page is to enter the electric share you will honestly achieve, then multiply. Half the annual saving is still a saving; a tenth of it is a reason to buy something else.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much does a plug-in hybrid cost to run on electricity?', 'a' => 'At the page\'s defaults, 20 kilowatt-hours per hundred kilometres costs 5 euros, against 10.2 euros for petrol — a saving of 5.2 euros per hundred kilometres.'],
            ['q' => 'Why is the official fuel consumption so low?', 'a' => <<<'TXT'
            The type-approval test starts with a full battery and covers a short distance, so most of it is driven electrically. Real-world consumption is two to four times the official figure unless the car is charged daily.
            TXT],
            ['q' => 'Is a plug-in hybrid better than a full electric car?', 'a' => <<<'TXT'
            Only if you regularly drive beyond the electric range. A battery-electric car uses less energy per kilometre and needs no petrol, so for a daily commute inside 40 kilometres the hybrid is a compromise with no benefit.
            TXT],
            ['q' => 'What is the utility factor?', 'a' => <<<'TXT'
            The share of total distance driven on electricity. Type approval assumes 70 to 80 per cent; real-world studies of privately owned cars find 40 to 50 per cent, and lower for company cars.
            TXT],
            ['q' => 'How much CO₂ does a plug-in hybrid save?', 'a' => <<<'TXT'
            At 400 grams per kilowatt-hour and 2.31 kilograms per litre, 879 kilograms a year over 15,000 kilometres — if every kilometre is electric. On a cleaner grid the saving is larger; on a coal-heavy one it can disappear.
            TXT],
            ['q' => 'Do I need a home charger?', 'a' => <<<'TXT'
            Practically, yes. A 12-kilowatt-hour battery recharges overnight from a domestic socket, and without off-street parking the car will mostly run on petrol, which is the worst of both worlds.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
