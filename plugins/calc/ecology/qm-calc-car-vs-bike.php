<?php

/**
 * Car vs Bike Calculator
 * /ecology/car-vs-bike
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Car vs Bike Calculator',
    'meta' => ['title' => 'Car vs Bike Calculator: Commute Cost and CO2', 'description' => 'Put a year of driving to work beside the same trips by bicycle: fuel, fixed running costs, carbon dioxide and the calories the pedalling quietly replaces.', 'h1' => 'Car vs Bike Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The commute',
            'fields' => [
                [
                    'name' => 'commute_distance',
                    'label' => 'One-way distance to work',
                    'type' => 'number',
                    'unit' => '4',
                    'unit_default' => 'km',
                    'default' => '8',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'Two trips a day are counted, so this is one leg.',
                ],
                [
                    'name' => 'days_per_week',
                    'label' => 'Commuting days per week',
                    'type' => 'number',
                    'default' => '5',
                    'rounding' => ['standard', '0'],
                    'min' => '0',
                    'max' => '7',
                ],
                [
                    'name' => 'weeks',
                    'label' => 'Weeks per year',
                    'type' => 'number',
                    'default' => '48',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                    'max' => '52',
                    'help' => '48 allows for holidays and sick leave.',
                ],
            ],
        ],
        [
            'title' => 'The car',
            'fields' => [
                [
                    'name' => 'car_consumption',
                    'label' => 'Fuel consumption',
                    'type' => 'number',
                    'unit' => '27',
                    'unit_default' => 'l100km',
                    'default' => '7.5',
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'fuel_price',
                    'label' => 'Fuel price',
                    'type' => 'number',
                    'suffix' => 'per litre',
                    'default' => '1.65',
                    'rounding' => ['omni', '0.001'],
                    'help' => 'Convert to your own currency; the page only multiplies.',
                ],
                [
                    'name' => 'car_fixed_cost',
                    'label' => 'Extra yearly cost of keeping the car',
                    'type' => 'number',
                    'default' => '600',
                    'rounding' => ['standard', '0'],
                    'help' => 'Parking at work, servicing, tyres and depreciation — the part fuel does not cover.',
                ],
            ],
        ],
        [
            'title' => 'A year of commuting',
            'fields' => [
                [
                    'name' => 'distance_year',
                    'label' => 'Distance driven per year',
                    'type' => 'number',
                    'suffix' => 'km',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'fuel_litres',
                    'label' => 'Fuel burned per year',
                    'type' => 'number',
                    'suffix' => 'L',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'fuel_cost',
                    'label' => 'Fuel cost per year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'co2_kg',
                    'label' => 'Carbon dioxide per year',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                    'help' => '2.31 kg of CO₂ per litre of petrol.',
                ],
                [
                    'name' => 'saving',
                    'label' => 'Money saved by cycling',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'calories',
                    'label' => 'Extra calories burned per year',
                    'type' => 'number',
                    'suffix' => 'kcal',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                    'help' => 'About 25 kcal per kilometre at commuting pace.',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Distance and fuel',
            'results' => ['distance_year' => '2 * commute_distance * days_per_week * weeks / 1000', 'fuel_litres' => 'distance_year / 100 * car_consumption'],
        ],
        [
            'title' => 'Cost and carbon',
            'results' => ['fuel_cost' => 'fuel_litres * fuel_price', 'co2_kg' => 'fuel_litres * 2.31', 'saving' => 'fuel_cost + car_fixed_cost', 'calories' => 'distance_year * 25'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>An eight-kilometre commute driven both ways, five days a week, forty-eight weeks a year, comes to 3,840 kilometres. At 7.5 litres per hundred kilometres that is 288 litres of petrol, 475.20 in fuel, 665.3 kilograms of carbon dioxide — and about 1,075 a year once parking and servicing are added. The same trips by bicycle spend none of that and burn roughly 96,000 kilocalories instead.</p>
        TXT,
        'sections' => [
            ['title' => 'What the page compares, and what it ignores', 'html' => <<<'TXT'
            <p>The comparison is deliberately narrow. It counts the fuel a car burns on the commute, the carbon in that fuel, and the yearly costs that only exist because the car exists: parking at work, servicing, tyres, the share of depreciation that distance brings. Against that it puts a bicycle, whose running carbon is close enough to zero to write as zero.</p><p>Ignored on the car side: the car's manufacture, insurance, the road space it occupies and the congestion it contributes to. Ignored on the bike side: the bicycle's own manufacture, the extra food the rider eats, and the trips a bicycle cannot make. Each omission is defensible for a commuting comparison and indefensible if you try to use the answer as a total footprint.</p><p>That is the honest frame. This is a question about a habit — how you get to work — not a verdict on whether you should own a car. Most households that cycle to work still keep one for everything else.</p>
            TXT],
            ['title' => 'The distance, and why it doubles', 'html' => <<<'TXT'
            <p>The form asks for one-way distance because that is how people think about a commute. The formula doubles it, because you come back. Eight kilometres each way is sixteen a day; sixteen a day for five days is eighty a week; eighty a week for forty-eight weeks is 3,840 a year.</p><p>Forty-eight weeks rather than fifty-two is not pessimism. Holidays, illness, working from home and the days the car stays parked because of a train strike all come off the total. If you commute all fifty-two weeks, change the box and the answer rises by about eight per cent.</p><p>Short commutes surprise people. A three-kilometre trip sounds trivial, but it is six kilometres a day, thirty a week, 1,440 a year — 108 litres of fuel if the engine never warms up properly, which is exactly what a three-kilometre trip guarantees. Cold engines are thirsty engines, and the form's single consumption figure quietly assumes a warm one.</p>
            TXT],
            ['title' => 'Fuel, money and carbon on the car side', 'html' => <<<'TXT'
            <p>Fuel burned is distance divided by a hundred, multiplied by the litres-per-hundred figure. At 3,840 kilometres and 7.5 litres per hundred, that is 288 litres. Multiply by the price at the pump — 1.65 here — and the fuel bill is 475.20. Multiply by 2.31 kilograms per litre, the standard figure for petrol, and the carbon is 665.3 kilograms.</p><p>Diesel carries about 2.68 kilograms per litre, so a diesel doing the same distance on 5.5 litres per hundred would emit roughly 566 kilograms while spending less at the pump. The page's 2.31 is petrol; if you drive a diesel, expect the carbon box to read a little low and the cost box to read a little high.</p><p>An electric car changes the shape entirely. Its carbon depends on the grid, not the tank: 3,840 kilometres at 18 kilowatt-hours per hundred is about 690 kilowatt-hours, which is somewhere between 100 and 400 kilograms of CO₂ depending on where you plug in. The page cannot express that, so treat its car numbers as petrol numbers.</p>
            TXT],
            ['title' => 'The fixed costs people forget', 'html' => <<<'TXT'
            <p>Fuel is the visible part of driving and rarely the largest. Parking at a city centre can cost more per year than the fuel bill. Servicing, tyres, road tax and the depreciation that every additional kilometre accelerates all attach to the commute whether or not you notice them.</p><p>The box opens at 600 a year, which is conservative for a car parked in a paid space and generous for one kept on a driveway. If you pay 150 a month for parking alone, put 2,400 in the box and watch the saving box jump to nearly 2,900.</p><p>Depreciation is the awkward one. A car loses value with age and with distance, and which matters more depends on the car. For a high-mileage commuter the distance term dominates; for a low-mileage one the calendar does. The box asks for a single number because a form has to, but the number is a judgement, not a measurement.</p>
            TXT],
            ['title' => 'What a year of pedalling actually costs', 'html' => <<<'TXT'
            <p>Ninety-six thousand kilocalories sounds enormous until it is converted. At 2,500 kilocalories a day, it is thirty-eight days of eating — and eating is not free, either in money or in carbon. If the extra food comes from beef and dairy, the cycling saving shrinks; if it comes from bread, rice and vegetables, it stays close to the full amount.</p><p>The literature on this is genuinely divided. Studies that assume a cyclist eats more find the bike's advantage narrowed by a third or more; studies that assume the rider was going to eat the same amount anyway find it nearly intact. The page sides with the second assumption, which is the common case for a commute of this length.</p><p>What is not divided is the money. A bicycle that costs 600 and needs 100 a year in maintenance pays for itself within the first year against a car commute of this size, and the figure excludes the health costs the car imposes on everyone else.</p>
            TXT],
            ['title' => 'Time, weather, and the trips a bike cannot do', 'html' => <<<'TXT'
            <p>The honest objection is time. Eight kilometres by bike is twenty-five minutes; by car in free flow it is fifteen, and in a city at eight in the morning it is often twenty-five as well. The gap is smaller than people expect, and it narrows further once you subtract the walk from the car park and the time spent looking for a space.</p><p>Weather is a real constraint in northern Europe for perhaps thirty days a year. Rain gear, mudguards and a change of clothes handle most of it; ice does not. Nothing in the page's arithmetic accounts for the days you take the bus instead, which is why the saving it reports is a ceiling rather than a promise.</p><p>Then there are the trips that are not commuting: the weekly shop, a child's dentist appointment, a delivery. A cargo bike handles some of them, a trailer and a pannier more. The page compares one route, not a whole household's mobility.</p>
            TXT],
            ['title' => 'When the comparison swings the other way', 'html' => <<<'TXT'
            <p>Cycling loses to a car that is already parked and barely used. If the car exists for weekend trips and the commute is five kilometres, the marginal cost of driving it to work is small, and the fixed-cost box is mostly spent anyway. Set that box to zero and the saving collapses to the fuel and carbon figures.</p><p>It also loses on cargo and on passengers. Two adults and two children on a school run are not a cycling problem the page can solve, and pretending otherwise makes the whole comparison easy to dismiss.</p><p>And it loses where the alternative is not a car but a train. A commuter rail line beats both on carbon per passenger-kilometre, and the decision then is about the walk to the station, not the pedals.</p>
            TXT],
            ['title' => 'The same numbers solved for something else', 'html' => <<<'TXT'
            <p>Every box on the form can be the unknown, so the page answers the reverse questions as readily. Ask what fuel price makes cycling worth it and the answer is any price above zero; ask what distance justifies a folding bike and the arithmetic gives you a number to argue with.</p><ul><li><strong>Yearly distance</strong> = 2 × one-way distance × days × weeks</li><li><strong>Fuel burned</strong> = distance ÷ 100 × litres per hundred</li><li><strong>Fuel cost</strong> = litres × price</li><li><strong>Carbon</strong> = litres × 2.31</li><li><strong>Saving</strong> = fuel cost + fixed cost</li><li><strong>Calories</strong> = yearly distance × 25</li></ul><p>Two constants carry all of it: 2.31 kilograms per litre of petrol and 25 kilocalories per kilometre. Both are averages, both are visible in the page's formulas, and neither is a secret the calculator keeps to itself.</p>
            TXT],
            ['title' => 'The bicycle is not quite zero', 'html' => <<<'TXT'
            <p>Every kilogram of bicycle carries a few kilograms of carbon from mining, welding, painting and shipping. A simple city bike of 15 kilograms lands somewhere between 100 and 250 kilograms of CO₂ equivalent; a cargo bike is higher, an e-bike higher still because of the battery.</p><p>Spread over a decade of commuting, that is 10 to 25 kilograms a year — 2 to 4 per cent of the car's 665. That is why the page writes the bike's running carbon as zero without embarrassment: the omission is smaller than the uncertainty in the car's consumption figure.</p><p>Maintenance is a similar story. Chains, tyres, brake pads and cables cost money and carry carbon, and a well-used commuter bike consumes a few kilograms of both per year. Compare that with tyres and oil for a car doing the same distance and the ratio stays absurdly wide.</p><p>Where the bike's manufacture matters is the marginal case: buying a bicycle you hardly ride is worse than not buying it. The same logic that makes a library card beat an e-reader applies here.</p>
            TXT],
            ['title' => 'Scaling up from one commuter to a street', 'html' => <<<'TXT'
            <p>One person's 665 kilograms is a curiosity; a street's is a policy. A thousand commuters making this trip by car emit 665 tonnes a year, spend 1.08 million on fuel and fixed costs, and occupy road space at the rate of roughly ten square metres per moving car.</p><p>Swap a fifth of them onto bicycles and the carbon falls by 133 tonnes, the queues shorten for everybody left, and the parking that no longer has to be built is the largest single saving in the account. Cities that have done this — Utrecht, Copenhagen, Seville — did not do it by persuasion alone; they did it by making the car trip expensive and the bike trip short.</p><p>None of that is in the page's arithmetic, which stops at one household. But it is the reason the comparison is interesting beyond the household: the same equation scales, and the numbers get large quickly.</p>
            TXT],
            ['title' => 'What to take from the answer', 'html' => <<<'TXT'
            <p>If the saving box reads in the low hundreds, the argument for cycling is health and parking, not money. If it reads in the thousands, the commute is a serious line in the household budget and the bicycle pays for itself in a season. If the carbon box reads under a tonne, the commute is a small part of a household's footprint and the attention belongs elsewhere — flights, heating, diet.</p><p>That last point is worth keeping. A 3,840-kilometre commute emits less than a single return flight to the Mediterranean, and much less than a year of gas heating in a poorly insulated house. Cycling to work is worth doing; it is not where the largest tonnes are.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much does cycling to work really save?', 'a' => <<<'TXT'
            On this page's defaults — eight kilometres each way, five days a week — about 1,075 a year in fuel and fixed costs, and 665 kilograms of CO₂. Longer commutes scale the money linearly and the carbon with it.
            TXT],
            ['q' => 'Doesn\'t the cyclist eat more, cancelling the saving?', 'a' => <<<'TXT'
            Partly, for some diets. Ninety-six thousand kilocalories is thirty-eight days of food, and beef-heavy food carries real carbon. Studies that assume extra eating narrow the bike's advantage by a third; studies that assume the rider eats the same either way leave it intact.
            TXT],
            ['q' => 'Is an e-bike still better than a car?', 'a' => <<<'TXT'
            Yes, by a wide margin. An e-bike uses roughly ten to twenty watt-hours per kilometre, which for this commute is about 60 kilowatt-hours a year — a few tens of kilograms of CO₂ at most, against 665 for the car.
            TXT],
            ['q' => 'Why does the page use 2.31 kilograms per litre?', 'a' => <<<'TXT'
            That is the standard carbon content of petrol when burned: about 2.31 kilograms of CO₂ per litre. Diesel is roughly 2.68. The figure counts the exhaust, not the refining or the extraction, so a full well-to-wheel accounting would be higher.
            TXT],
            ['q' => 'What if I only cycle some days?', 'a' => <<<'TXT'
            Reduce the commuting-days box to the number you actually pedal. Three days a week at the same distance saves three fifths of the total. The page treats the split as a fraction rather than as two separate commutes.
            TXT],
            ['q' => 'Should I include insurance and depreciation?', 'a' => <<<'TXT'
            Only the part that changes with the commute. Insurance is usually fixed, so leave it out. Depreciation rises with distance, so include an estimate if you plan to keep the car for years. The fixed-cost box is a judgement call, and the page labels it as one.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
