<?php

/**
 * Olympic Games Sustainability Calculator
 * /ecology/olympic-games-sustainability
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Olympic Games Sustainability Calculator',
    'meta' => ['title' => 'Olympic Games Sustainability Calculator: Carbon Split', 'description' => 'Split a games\' carbon budget between construction, operations and spectator travel, then read the total per ticket and see which of the three parts dominates.', 'h1' => 'Olympic Games Sustainability Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The games',
            'fields' => [
                [
                    'name' => 'build_co2',
                    'label' => 'Construction and venues',
                    'type' => 'number',
                    'suffix' => 'kt CO₂e',
                    'default' => '500',
                    'rounding' => ['standard', '0'],
                    'help' => 'New arenas, the village, transport links. Reused venues count near zero.',
                ],
                [
                    'name' => 'operations_co2',
                    'label' => 'Running the games',
                    'type' => 'number',
                    'suffix' => 'kt CO₂e',
                    'default' => '300',
                    'rounding' => ['standard', '0'],
                    'help' => 'Power, temporary structures, broadcasting, catering, waste.',
                ],
                [
                    'name' => 'attendees',
                    'label' => 'Tickets sold',
                    'type' => 'number',
                    'suffix' => 'million',
                    'default' => '6',
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'travel_km',
                    'label' => 'Average round trip per spectator',
                    'type' => 'number',
                    'suffix' => 'km',
                    'default' => '2000',
                    'rounding' => ['standard', '0'],
                    'help' => 'A games draws most of its crowd from its own continent.',
                ],
                [
                    'name' => 'travel_intensity',
                    'label' => 'Carbon per passenger-kilometre',
                    'type' => 'number',
                    'suffix' => 'g CO₂',
                    'default' => '150',
                    'rounding' => ['standard', '0'],
                    'help' => 'A short-haul flight is about 150; a full train nearer 30.',
                ],
            ],
        ],
        [
            'title' => 'Where the carbon goes',
            'fields' => [
                [
                    'name' => 'travel_co2',
                    'label' => 'Spectator travel',
                    'type' => 'number',
                    'suffix' => 'Mt CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'total_co2',
                    'label' => 'Total for the games',
                    'type' => 'number',
                    'suffix' => 'Mt CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'travel_share',
                    'label' => 'Travel share of the total',
                    'type' => 'number',
                    'suffix' => '%',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'build_share',
                    'label' => 'Construction share of the total',
                    'type' => 'number',
                    'suffix' => '%',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'per_ticket',
                    'label' => 'Carbon per ticket',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Travel and total',
            'results' => ['travel_co2' => 'attendees * 1000000 * travel_km * travel_intensity / 1000000000000', 'total_co2' => '(build_co2 + operations_co2) / 1000 + travel_co2'],
        ],
        [
            'title' => 'Shares and per-ticket carbon',
            'results' => ['travel_share' => 'travel_co2 / total_co2 * 100', 'build_share' => 'build_co2 / 1000 / total_co2 * 100', 'per_ticket' => 'total_co2 * 1000 / attendees'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Five hundred kilotonnes of construction, three hundred of operations and six million tickets with an average two-thousand-kilometre round trip at 150 grams per passenger-kilometre adds 1.8 million tonnes of travel carbon to a games that emits 2.6 million tonnes in all. Travel is 69.2 per cent of it, construction 19.2 per cent, and every ticket carries 433 kilograms.</p>
        TXT,
        'sections' => [
            ['title' => 'Why travel dominates every games', 'html' => <<<'TXT'
            <p>A stadium holds 80,000 people and a games sells millions of tickets. The carbon of moving those people is a function of distance and mode, and both are outside the organiser's control once the host city is chosen.</p><p>Long-haul spectators are the outliers that set the total. A single visitor from another continent is 10,000 kilometres at 150 grams — 1.5 tonnes, which is a third of the average person's annual footprint for one trip.</p><p>That is why the travel box moves the answer more than anything else on the page. It is also why host cities that can draw a regional crowd do better than famous ones that draw a global one.</p>
            TXT],
            ['title' => 'Construction: what the venues actually cost', 'html' => <<<'TXT'
            <p>Recent games have reported footprints in the range of one and a half to four million tonnes, and the construction share varies enormously. London 2012 built a park; Paris 2024 used almost entirely existing or temporary venues.</p><p>Concrete and steel dominate embodied carbon. A new 80,000-seat stadium is 100,000 to 300,000 tonnes of CO₂ before anyone enters it; an aquatics centre rather less; the athletes' village often more than either.</p><p>The useful rule is that reuse is worth an order of magnitude. A games that needs one new venue has a construction term in the low hundreds of kilotonnes; one that builds everything has one in the millions of tonnes.</p>
            TXT],
            ['title' => 'Operations and the temporary city', 'html' => <<<'TXT'
            <p>Seventeen days of power, broadcasting, catering, cleaning, security and waste is smaller than construction but not small: a few hundred kilotonnes is typical, dominated by electricity and by the diesel of generators and vehicles.</p><p>Temporary structures are a mixed blessing. A demountable arena avoids a permanent build but its steel and its transport carry emissions too; the standard estimate is a third to a half of a permanent equivalent.</p><p>Broadcasting is the hidden term. A games is a television product as much as a sporting event, and the studios, satellite links and international production travel are counted in the organiser's operations figure if they are counted at all.</p>
            TXT],
            ['title' => 'Six million tickets, worked through', 'html' => <<<'TXT'
            <p>Six million tickets at 2,000 kilometres round trip is twelve billion passenger-kilometres. At 150 grams each that is 1.8 million tonnes of CO₂ — 1.8 megatonnes, in the panel's units.</p><p>Add 500 kilotonnes of construction and 300 of operations, which is 0.8 megatonnes, and the total is 2.6 megatonnes. Travel takes 69.2 per cent and construction 19.2 per cent.</p><p>Divide by the tickets and each one carries 433 kilograms, mostly the journey. That is the number to compare with a return flight to the same city, because for most spectators it is the same thing.</p>
            TXT],
            ['title' => 'The mode of transport decides the games', 'html' => <<<'TXT'
            <p>Set the intensity box to 30 grams — a full train — and the travel term falls to 0.36 megatonnes. The total becomes 1.16 megatonnes and construction rises to two thirds of it. Same games, radically different accounting.</p><p>That is why the European games have a structural advantage: a dense rail network means most spectators can arrive by train, and the ones who cannot are a minority rather than the norm.</p><p>Host cities do not control where their ticket buyers live. They control the transport plan, the ticket allocation and whether the event is marketed as a continental party or a global pilgrimage.</p>
            TXT],
            ['title' => 'Reuse is the only real construction lever', 'html' => <<<'TXT'
            <p>The organising committees that have cut their footprints most did it by not building. Paris 2024 reported around 1.6 million tonnes, with 95 per cent of venues existing or temporary, and put the savings down to that decision alone.</p><p>The counter-example is a games that uses the event as an urban regeneration programme. The construction is then justified by decades of housing and transport, and the carbon gets attributed to the games because that is when it was spent.</p><p>Both arguments are honest. The page cannot tell which one you are looking at, so the construction box is where you record your judgement.</p>
            TXT],
            ['title' => 'Offsets and the accounting trick', 'html' => <<<'TXT'
            <p>Most recent games have claimed to be carbon neutral, usually by buying credits for the residual. The claim depends entirely on the quality of the credits and on whether the reduction happened before or after the offset was purchased.</p><p>The bigger accounting issue is scope. Spectator travel is sometimes excluded on the grounds that the organiser does not control it; construction is sometimes excluded because it counts as urban development. Exclude both and a games looks tiny.</p><p>69.2 per cent of the total in this model is travel. Any footprint declaration that leaves it out is not describing the event's impact, it is describing its organiser's budget.</p>
            TXT],
            ['title' => 'What a host city inherits', 'html' => <<<'TXT'
            <p>The emissions finish when the flame goes out; the buildings do not. A venue that is used for decades spreads its embodied carbon over a useful life, and one that is demolished a decade later does not.</p><p>That is the strongest argument for reuse and the weakest for legacy construction. Athens, Rio and Sochi all built facilities that later struggled for tenants, and the carbon was already spent.</p><p>A page like this cannot model the amortisation, but it can make the question obvious: who uses the building in 2040, and does that use justify the concrete?</p>
            TXT],
            ['title' => 'Winter games are a different case', 'html' => <<<'TXT'
            <p>Winter games are smaller — two to three million tickets — and their construction is skewed toward a handful of expensive venues: a sliding centre, a ski jump, an ice track. Those are hard to reuse and often have no post-games market at all.</p><p>The travel term is also larger per spectator, because the host cities are in mountains and the spectators arrive by air from further away. Beijing 2022 reported about 2 million tonnes with almost no new permanent construction, which is the reuse-heavy model applied to snow.</p><p>Set the tickets to three million and the travel distance to 3,000 kilometres to see the shape of a winter games. The construction share falls, the travel share rises.</p>
            TXT],
            ['title' => 'The spectator who stays at home', 'html' => <<<'TXT'
            <p>Every viewer who watches on television instead of travelling avoids the entire travel term. That is not a policy a host city can run, but it is the honest arithmetic: the broadcast audience is a billion people and the stadium audience is a few million.</p><p>The broadcasting footprint is real but small by comparison — a few tens of kilotonnes for production and transmission, against megatonnes for the travel it replaces.</p><p>This is the same trade-off as any conference or concert. The remote version is almost always lower-carbon, and almost always worse at the thing the event exists for.</p>
            TXT],
            ['title' => 'Temporary venues and what demountability costs', 'html' => <<<'TXT'
            <p>A demountable arena is a steel frame and a fabric skin, assembled for the games and sold or reused afterwards. Its embodied carbon is a third to a half of a permanent building of the same capacity.</p><p>It also avoids the white elephant, which is the larger saving: a building demolished after a decade wastes all of its concrete, while a demountable one gets a second life somewhere else.</p><p>The cost is that temporary venues cannot host the biggest events and often fail the broadcast lighting requirements. Paris solved this with a mix — permanent where the city needed the building anyway, temporary everywhere else.</p>
            TXT],
            ['title' => 'How it compares with other big events', 'html' => <<<'TXT'
            <p>A football World Cup with 64 matches and three million tickets is roughly comparable in travel terms, and often worse in construction because it needs ten stadiums rather than one cluster.</p><p>A music festival with 100,000 attendees is a few thousand tonnes — small enough that the comparison embarrasses the games. Scale is what makes the difference, and there is no way to have a global event without global travel.</p><p>The useful comparison is per attendee rather than per event. 433 kilograms a ticket at these defaults is a return flight and a hotel night, which is what it is.</p>
            TXT],
            ['title' => 'What an organiser can credibly promise', 'html' => <<<'TXT'
            <p>Three promises survive contact with the arithmetic: build nothing that will not be used, put the event where the spectators already are, and buy offsets only for what remains after both.</p><p>Two promises do not: carbon neutrality by offsetting travel that will happen anyway, and a footprint that excludes the flights. Both are accounting choices rather than reductions.</p><p>The page's contribution is to make the split visible before the bid is written. A host that knows travel is two thirds of the total negotiates the transport plan differently from one that thinks it is buying a green stadium.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Five inputs produce five outputs, and the reverse questions are the interesting ones — what travel intensity would hold a games under a given total, for instance.</p><ul><li><strong>Travel carbon</strong> = tickets × 10⁶ × round trip × intensity ÷ 10¹²</li><li><strong>Total</strong> = (construction + operations) ÷ 1000 + travel carbon</li><li><strong>Travel share</strong> = travel carbon ÷ total × 100</li><li><strong>Construction share</strong> = construction ÷ 1000 ÷ total × 100</li><li><strong>Per ticket</strong> = total × 1000 ÷ tickets in millions</li></ul><p>The units are chosen so that megatonnes in and kilograms out are one multiplication apart, which keeps the arithmetic readable at both ends of the scale.</p>
            TXT],
            ['title' => 'Where the estimate is optimistic or pessimistic', 'html' => <<<'TXT'
            <p>Optimistic: construction is counted as the games' share of a regeneration project, travel is excluded, and offsets cancel what remains. That is how a games gets reported at 100,000 tonnes.</p><p>Pessimistic: travel is counted at the actual mix of air and rail, construction at full embodied carbon, and the games is reported at three to four megatonnes — which is the range observed for London and Rio.</p><p>The page's defaults sit between the two and near the Paris 2024 order of magnitude. Move one box and you can produce a headline for any argument you prefer, which is the point of a calculator with visible inputs.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What is the carbon footprint of an Olympic games?', 'a' => <<<'TXT'
            Recent summer games have reported between 1.5 and 4 million tonnes of CO₂ equivalent. The page's defaults give 2.6 megatonnes, with most of it in spectator travel rather than venues.
            TXT],
            ['q' => 'Do the venues really matter less than the travel?', 'a' => <<<'TXT'
            Usually yes. Construction is a one-off few hundred kilotonnes for a reuse-heavy games, while six million spectators flying an average 2,000 kilometres is 1.8 megatonnes — 69.2 per cent of the total.
            TXT],
            ['q' => 'What share of the footprint is flying?', 'a' => <<<'TXT'
            At 150 grams per passenger-kilometre almost all of the travel term is aviation. Drop the intensity to 30 grams for a rail-based games and the travel share falls toward a quarter.
            TXT],
            ['q' => 'Can a games be carbon neutral?', 'a' => <<<'TXT'
            Only with offsets for a residual that cannot be eliminated, and the residual is dominated by flights nobody can cancel. Claims of neutrality usually depend on excluding travel or on credits of uncertain quality.
            TXT],
            ['q' => 'Which games had the lowest footprint?', 'a' => <<<'TXT'
            Paris 2024 reported about 1.6 million tonnes, the lowest of any summer games, and attributed it to using 95 per cent existing or temporary venues and to a regional spectator base.
            TXT],
            ['q' => 'What happens to the venues afterwards?', 'a' => <<<'TXT'
            That is the legacy question, and it decides whether the embodied carbon was worth spending. A venue in use for thirty years amortises its emissions; a white elephant does not.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
