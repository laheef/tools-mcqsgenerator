<?php

/**
 * Flight Emissions Calculator
 * /ecology/flight-emissions
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Flight Emissions Calculator',
    'meta' => ['title' => 'Flight Emissions Calculator: Carbon per Trip', 'description' => 'Turn a flight distance, a cabin class and a yearly trip count into kilograms of carbon dioxide, then read that figure as tree-years and as car kilometres.', 'h1' => 'Flight Emissions Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The journey',
            'fields' => [
                [
                    'name' => 'distance',
                    'label' => 'Distance flown',
                    'type' => 'number',
                    'unit' => '4',
                    'unit_default' => 'km',
                    'default' => '1500',
                    'rounding' => ['standard', '0'],
                    'help' => 'Great-circle distance for one leg; the return adds another leg.',
                ],
                [
                    'name' => 'trips',
                    'label' => 'Flights per year',
                    'type' => 'number',
                    'default' => '2',
                    'rounding' => ['standard', '0'],
                    'min' => '0',
                    'help' => 'Count each take-off separately, so a return trip is two.',
                ],
                [
                    'name' => 'passengers',
                    'label' => 'People travelling',
                    'type' => 'number',
                    'default' => '1',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                ],
                [
                    'name' => 'cabin',
                    'label' => 'Cabin class',
                    'type' => 'select',
                    'options' => ['Economy' => '1', 'Premium economy' => '1.6', 'Business' => '2.9', 'First' => '4'],
                    'default' => 'Economy',
                    'help' => 'A premium seat occupies more of the cabin, so it carries more of the fuel.',
                ],
            ],
        ],
        [
            'title' => 'The per-kilometre figure',
            'fields' => [
                [
                    'name' => 'intensity',
                    'label' => 'Carbon per passenger-kilometre',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'default' => '0.15',
                    'rounding' => ['omni', '0.001'],
                    'help' => 'A short-haul economy seat runs 0.15 to 0.25; a long-haul widebody nearer 0.10.',
                ],
            ],
        ],
        [
            'title' => 'What the flights emit',
            'fields' => [
                [
                    'name' => 'co2_trip',
                    'label' => 'Carbon per flight',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'co2_year',
                    'label' => 'Carbon over the year',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'tree_years',
                    'label' => 'Tree-years to absorb it',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                    'help' => 'A mature tree takes up about 21 kg of CO₂ a year.',
                ],
                [
                    'name' => 'car_km',
                    'label' => 'Same carbon as a petrol car',
                    'type' => 'number',
                    'suffix' => 'km',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Carbon per flight and per year',
            'results' => ['co2_trip' => 'distance / 1000 * intensity * cabin', 'co2_year' => 'co2_trip * trips * passengers'],
        ],
        [
            'title' => 'Comparisons',
            'results' => ['tree_years' => 'co2_year / 21', 'car_km' => 'co2_year / 0.12'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A 1,500-kilometre flight in economy emits 225 kilograms of carbon dioxide per passenger. Two of them in a year is 450 kilograms — 21.4 tree-years of absorption, and the same carbon as 3,750 kilometres in a petrol car. The arithmetic is distance × 0.15 kilograms per passenger-kilometre × the cabin factor, then × trips × passengers.</p>
        TXT,
        'sections' => [
            ['title' => 'What the 0.15 kilograms includes', 'html' => <<<'TXT'
            <p>The figure covers the carbon dioxide from burning jet fuel, divided by the number of passengers. It starts from kerosene's carbon content — about 3.16 kilograms of CO₂ per kilogram of fuel — and divides total trip fuel by seats occupied.</p><p>It does not include the non-CO₂ effects of flying high: nitrogen oxides that form ozone, contrails and cirrus cloud, and water vapour in the stratosphere. Those are estimated to multiply the climate impact by 1.5 to 3, depending on the study and the route.</p><p>The page leaves them out because they are uncertain and because most published per-kilometre figures do. If you want the fuller number, multiply the answer by two and treat it as a range rather than a measurement.</p>
            TXT],
            ['title' => 'Distance, legs and the return trip', 'html' => <<<'TXT'
            <p>The form asks for one leg. A return journey is two flights, so either enter twice the distance or set the trips box to two — both give the same answer, which is a useful check that the model is linear.</p><p>Great-circle distance is what the airline's figure is based on, and it is longer than the map suggests on a flat projection. A flight from London to New York is about 5,570 kilometres; London to Lisbon, 1,585; Vilnius to Berlin, 800.</p><p>Air traffic control routing adds a few per cent on top of the great circle — vectoring, weather avoidance, holding — and the fuel is burned over the route actually flown rather than the ideal one. Five per cent is a reasonable allowance for European airspace on a busy day.</p><p>Connections count in full. A journey with a stop is two take-offs and two climbs, which is why it emits more than a direct flight of the same total distance.</p>
            TXT],
            ['title' => 'Why a business seat costs three times an economy one', 'html' => <<<'TXT'
            <p>An aircraft burns roughly the same fuel whatever the seating configuration; what changes is how much floor space each passenger occupies. A business seat takes three to four times the area of an economy seat, so it carries three to four times the fuel per person.</p><p>The multipliers on the form — 1.6 for premium economy, 2.9 for business, 4 for first — come from that allocation. They are averages across fleets and routes, and they assume the cabin is full; an empty premium cabin has the same fuel and fewer people to share it with.</p><p>The consequence is worth stating plainly. The greenest seat on a plane is the one with the least space around it, and the difference between cabins is larger than the difference between most aircraft types.</p><p>Airlines know this, which is why the premium cabins are where the revenue is and why the emissions per revenue-passenger-kilometre is a metric they dislike publishing. One business seat can carry the carbon of three economy seats while paying five times the fare, and the two ratios do not move together.</p><p>For a traveller the practical upshot is unglamorous. If you fly, sit in economy; if you want the largest single reduction available to you, fly less often rather than buying a more efficient seat.</p>
            TXT],
            ['title' => 'Two flights, worked through', 'html' => <<<'TXT'
            <p>One leg, with Economy chosen: 1,500 kilometres divided by a thousand is 1.5, times 0.15 kilograms per kilometre is 0.225, and the economy factor of one leaves 225 kilograms for the flight.</p><p>Two flights for one passenger is 450 kilograms a year. Divide by 21 kilograms per tree per year and it takes 21.4 tree-years to absorb. Divide by 0.12 kilograms per car kilometre and the same carbon is 3,750 kilometres.</p><p>Fly the same route in business and the year becomes 1,305 kilograms, which is more than a household's annual electricity. That is not a moral point about the seat; it is arithmetic about floor area.</p>
            TXT],
            ['title' => 'Short-haul is worse per kilometre', 'html' => <<<'TXT'
            <p>Take-off and climb burn disproportionately: an aircraft at 3,000 feet is using far more fuel per kilometre than the same aircraft at cruise. A 500-kilometre flight therefore emits more per kilometre than a 5,000-kilometre one, often by a factor of two.</p><p>The form's single intensity figure cannot express that, which is why the help line gives 0.15 to 0.25 for short haul and nearer 0.10 for a long-haul widebody. If you are modelling a short domestic hop, put the higher number in.</p><p>This is also the reason rail substitution works so well. On a route where the train takes three hours and the plane two including security, the flight emits five to ten times as much per passenger — and on a 400-kilometre route, more than ten.</p>
            TXT],
            ['title' => 'The non-CO₂ caveat, in numbers', 'html' => <<<'TXT'
            <p>Contrails form when hot humid exhaust meets cold air, and they persist as cirrus cloud that traps outgoing radiation. Night flights warm more than day flights; flights over the tropics less than flights over the North Atlantic.</p><p>Estimates of the total effect range widely — a multiplier of 1.5 at the cautious end and nearly 3 at the top, with the newest research suggesting the contrail share may be larger than earlier models assumed.</p><p>Regulators have not settled on a factor, which is why ticket calculators leave it out. A personal estimate that doubles the page's answer is defensible; one that pretends the effect is zero is not.</p><p>The practical consequence is that the numbers on this page understate the climate effect of flying relative to almost any other activity you might compare it with. A train journey has no contrail line; a car's exhaust products do not form cloud at eight kilometres. The comparison is fair on carbon and incomplete on everything else.</p>
            TXT],
            ['title' => 'What actually lowers the number', 'html' => <<<'TXT'
            <p>Fewer flights beats everything else. One return trip avoided is worth more than any efficiency measure available to a passenger, because aviation has no equivalent of switching to a heat pump or a bicycle.</p><p>Longer stays help, since the flight is amortised over more nights. Two weeks in one place emits less than two weeks spread across two continents, even though the holiday feels similar.</p><p>Rail where it exists, economy where it does not, and direct routes rather than connections. Sustainable aviation fuel reduces the carbon of the fuel burned by up to 80 per cent on paper, but supply is a fraction of a per cent of demand, so the seat you buy almost certainly is not using it.</p>
            TXT],
            ['title' => 'Offsets, and why the page forgets them', 'html' => <<<'TXT'
            <p>The page reports emissions, not a net position after purchasing. That is deliberate: an offset is a payment for a claimed reduction elsewhere, and the quality of those claims varies from solid to worthless.</p><p>Aviation offsets have a mixed record. Forestry projects have burned, cookstove credits have overstated savings, and the cheapest credits on the market cost a few euros per tonne precisely because nobody is confident they work.</p><p>If you buy offsets, buy them as a supplement to flying less rather than as a substitute, and expect to pay 30 to 80 euros a tonne for something with a paper trail.</p>
            TXT],
            ['title' => 'One long-haul return, for scale', 'html' => <<<'TXT'
            <p>A return from Europe to Southeast Asia is about 18,000 kilometres flown. At 0.10 kilograms per passenger-kilometre — the long-haul figure — that is 1,800 kilograms per person, and it is one trip.</p><p>Compare that with the annual totals people usually quote as their footprint. A European household's electricity is 2,000 to 3,000 kilograms a year; a car doing 12,000 kilometres is about 1,440. The single long-haul return outweighs either.</p><p>That is why flight calculators matter out of proportion to their use. Most of the annual carbon of a frequent flyer is not in their house, their car or their diet; it is in a handful of days spent in the air, and the page makes those days countable.</p>
            TXT],
            ['title' => 'How airlines report, and how to read it', 'html' => <<<'TXT'
            <p>Airlines publish emissions per passenger-kilometre on their sustainability pages, usually for economy and often excluding the non-CO₂ effects. The figures cluster between 0.08 and 0.20 kilograms depending on fleet age and route length.</p><p>Two adjustments matter when you compare them. Load factor: a carrier reporting per available seat-kilometre rather than per passenger-kilometre will look better than it is. And cabin: a business-heavy configuration raises the airline's average while leaving economy's share unchanged.</p><p>The useful test is arithmetic. Divide the claimed emissions for a route by the distance, and see whether the result is plausible for the class you are booking. Airlines with modern fleets and high load factors earn their numbers; the rest are inheriting a good average from a dense route.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Everything is multiplication, so each box can be recovered. The reverse questions are the useful ones for planning: how far a carbon budget goes, or what distance a yearly allowance buys.</p><ul><li><strong>Carbon per flight</strong> = distance ÷ 1000 × intensity × cabin factor</li><li><strong>Carbon per year</strong> = per flight × trips × passengers</li><li><strong>Tree-years</strong> = yearly carbon ÷ 21</li><li><strong>Car kilometres</strong> = yearly carbon ÷ 0.12</li><li><strong>Distance affordable</strong> = budget ÷ (intensity × cabin factor ÷ 1000)</li><li><strong>Intensity implied</strong> = carbon × 1000 ÷ (distance × cabin factor)</li></ul><p>The last row is how to check an airline's claim: divide its stated emissions for a route by the distance and the cabin factor, and see what per-kilometre figure it assumes.</p>
            TXT],
            ['title' => 'Where the estimate is softest', 'html' => <<<'TXT'
            <p>Load factor matters and is invisible. A full aircraft divides its fuel across more people than a half-empty one, and the same seat emits twice as much on the emptier flight.</p><p>Aircraft type matters less than people expect — a modern widebody and an older one differ by 20 to 30 per cent per seat-kilometre, which is smaller than the cabin multiplier and much smaller than the non-CO₂ uncertainty.</p><p>Cargo allocation is a genuine grey area. Freight in the hold shares the flight's fuel; most calculators assign it all to passengers, which slightly overstates the passenger figure on cargo-heavy routes.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much CO₂ does a flight emit per passenger?', 'a' => <<<'TXT'
            About 0.15 kilograms per passenger-kilometre in economy on a typical short-haul route, so a 1,500-kilometre flight is 225 kilograms. Long-haul is nearer 0.10 per kilometre; business class multiplies by roughly three.
            TXT],
            ['q' => 'Does the calculator include contrails?', 'a' => <<<'TXT'
            No. It counts carbon dioxide from fuel only. Non-CO₂ effects — contrails, cirrus, ozone from nitrogen oxides — are estimated to multiply the climate impact by 1.5 to 3, so doubling the answer is a defensible personal estimate.
            TXT],
            ['q' => 'Why is business class so much worse?', 'a' => <<<'TXT'
            Because the aircraft burns the same fuel and the seat occupies three to four times the floor area. The multiplier allocates fuel by space, so a business passenger carries about 2.9 times the economy passenger's share.
            TXT],
            ['q' => 'Is it better to fly direct or with a stop?', 'a' => <<<'TXT'
            Direct, almost always. A connection adds a take-off and a climb, the two most fuel-intensive phases of flight, so the same total distance flown in two legs emits more than in one.
            TXT],
            ['q' => 'Do offsets make a flight carbon neutral?', 'a' => <<<'TXT'
            They pay for a claimed reduction elsewhere rather than removing the emissions. Quality varies enormously, and the cheapest credits are cheap because their claims are weak. Treat offsets as a supplement to flying less.
            TXT],
            ['q' => 'How does flying compare with driving the same distance?', 'a' => <<<'TXT'
            For one person, flying is usually worse per kilometre: 0.15 kilograms against about 0.12 for a petrol car with one occupant. Fill the car with four people and the car wins clearly; fly long-haul in economy and the comparison tightens.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
