<?php

/**
 * Hand Dryers vs Paper Towels Calculator
 * /ecology/hand-dryers-vs-paper-towels
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Hand Dryers vs Paper Towels Calculator',
    'meta' => ['title' => 'Hand Dryers vs Paper Towels: Carbon per Year', 'description' => 'Compare the electricity a hand dryer uses with the paper towels it replaces, in kilograms of carbon dioxide and in the weight of the paper that is thrown away.', 'h1' => 'Hand Dryers vs Paper Towels Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'Your hand washing',
            'fields' => [
                [
                    'name' => 'dries_per_day',
                    'label' => 'Hand dries per day',
                    'type' => 'number',
                    'default' => '3',
                    'rounding' => ['omni', '0.1'],
                    'min' => '0',
                    'help' => 'Count each visit to a washroom, not each hand.',
                ],
                [
                    'name' => 'days',
                    'label' => 'Days in the period',
                    'type' => 'number',
                    'default' => '365',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                ],
                [
                    'name' => 'towels_per_dry',
                    'label' => 'Paper towels per dry',
                    'type' => 'number',
                    'default' => '2',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'Most people take two; a folded sheet and a half is the usual dispenser behaviour.',
                ],
                [
                    'name' => 'towel_co2',
                    'label' => 'Carbon per paper towel',
                    'type' => 'number',
                    'suffix' => 'g CO₂e',
                    'default' => '5',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'Recycled towel is nearer 3 grams; virgin pulp nearer 7.',
                ],
                [
                    'name' => 'dryer_kwh',
                    'label' => 'Electricity per dry',
                    'type' => 'number',
                    'suffix' => 'kWh',
                    'default' => '0.02',
                    'rounding' => ['omni', '0.001'],
                    'help' => 'A modern high-speed dryer uses 0.01 to 0.03; an old warm-air unit ten times more.',
                ],
                [
                    'name' => 'grid_intensity',
                    'label' => 'Carbon intensity of the grid',
                    'type' => 'number',
                    'suffix' => 'g CO₂/kWh',
                    'default' => '480',
                    'rounding' => ['standard', '0'],
                ],
            ],
        ],
        [
            'title' => 'A year of each',
            'fields' => [
                [
                    'name' => 'dries',
                    'label' => 'Hand dries in the period',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'towels',
                    'label' => 'Paper towels used',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'paper_co2',
                    'label' => 'Paper towels, carbon',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'dryer_co2',
                    'label' => 'Hand dryer, carbon',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'saving',
                    'label' => 'Carbon saved by drying',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                    'help' => 'Positive means the dryer wins; negative means the towels do.',
                ],
                [
                    'name' => 'paper_waste',
                    'label' => 'Paper thrown away',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                    'help' => 'At three grams of paper per towel.',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'How many dries, how many towels',
            'results' => ['dries' => 'dries_per_day * days', 'towels' => 'dries * towels_per_dry'],
        ],
        [
            'title' => 'Carbon on each side',
            'results' => ['paper_co2' => 'towels * towel_co2 / 1000', 'dryer_co2' => 'dries * dryer_kwh * grid_intensity / 1000', 'saving' => 'paper_co2 - dryer_co2', 'paper_waste' => 'towels * 3 / 1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Three hand dries a day for a year is 1,095 visits, 2,190 paper towels at two per dry, and 10.95 kilograms of carbon dioxide — against 10.51 kilograms for the dryer on a grid at 480 grams per kilowatt-hour. The dryer wins by 0.438 kilograms, which is about 3.6 kilometres of driving, and the towels would have thrown away 6.57 kilograms of paper.</p>
        TXT,
        'sections' => [
            ['title' => 'A closer contest than the campaigns suggest', 'html' => <<<'TXT'
            <p>Both sides of this argument have published numbers that make the other look absurd. Dryer manufacturers quote studies where the paper option emits ten times as much; paper companies quote studies where the dryer loses. The difference is almost always the grid, not the machine.</p><p>The arithmetic is genuinely close at European grid intensity. A modern dryer uses about 0.02 kilowatt-hours per dry; two paper towels carry about 10 grams of CO₂ equivalent. Multiply each by a year of washing and the totals land within a few per cent of each other.</p><p>That is why the page shows both and lets the grid box decide. On a French or Norwegian grid the dryer wins comfortably. On a coal-heavy grid the towels win. Neither answer is a general truth.</p>
            TXT],
            ['title' => 'What a paper towel actually costs', 'html' => <<<'TXT'
            <p>A towel weighs about three grams and carries roughly five grams of CO₂ equivalent. The pulp is the largest term: wood, water, cooking chemicals and the energy to dry the sheet, which is the most energy-intensive step in papermaking.</p><p>Recycled towel is better, at around three grams, but it still needs repulping, forming and drying. The fibre loop reduces the forest impact and only modestly reduces the energy.</p><p>Then there is the waste. 6.57 kilograms of used paper a year is not a waste crisis, but it is contaminated with water and soap, so it cannot be recycled and goes to incineration or landfill. The dispensers, the packaging and the transport add a little more that the form does not count.</p>
            TXT],
            ['title' => 'What a hand dryer actually costs', 'html' => <<<'TXT'
            <p>A high-speed dryer runs a 1,000 to 1,600 watt motor for ten to fifteen seconds, which is the 0.02 kilowatt-hours in the form. The energy is all electricity, so the carbon follows the grid exactly.</p><p>At 480 grams per kilowatt-hour, 1,095 dries is 10.51 kilograms. On a French grid at 60 grams it would be 1.3 kilograms; on a Polish grid at 700 it would be 15.3. Same machine, twelvefold difference in the answer.</p><p>Dryer manufacture is a fixed cost of a few hundred kilograms spread across tens of thousands of dries, so it is small per use in a busy washroom and significant in a household that installs one for three visits a day.</p>
            TXT],
            ['title' => 'Three dries a day, worked through', 'html' => <<<'TXT'
            <p>Dries first: three a day for 365 days is 1,095. Towels second: two per dry is 2,190 a year, and at five grams each that is 10.95 kilograms of carbon and 6.57 kilograms of paper.</p><p>Dryer: 1,095 dries at 0.02 kilowatt-hours is 21.9 kilowatt-hours a year, which at 480 grams per kilowatt-hour is 10.51 kilograms. The saving box subtracts one from the other and reports 0.438 kilograms.</p><p>A saving of less than half a kilogram a year is inside the uncertainty of both figures. The honest conclusion at these defaults is that the two options are equivalent in carbon terms, and the choice should be made on other grounds.</p>
            TXT],
            ['title' => 'Old dryers are a different machine', 'html' => <<<'TXT'
            <p>The warm-air dryers of the 1990s used a 2.4 kilowatt heating element for forty seconds or more — 0.03 to 0.05 kilowatt-hours a dry. A modern high-speed unit moves a thin sheet of fast air and does the job without heating it much.</p><p>The difference is a factor of two to three, which is larger than the difference between a paper towel and a modern dryer. If the washroom has an old unit, the towels probably win on grid intensity above about 300 grams.</p><p>This also explains why the studies disagree so much. Each measured a different generation of machine, and the field moved faster than the literature did.</p>
            TXT],
            ['title' => 'The hygiene argument, briefly', 'html' => <<<'TXT'
            <p>Reviews of the hand-hygiene literature find that both methods reduce bacteria when hands are washed properly, and that drying method matters less than hand-washing technique. The studies that show a dryer spreading contamination are usually measuring an old warm-air unit without a HEPA filter in a hospital washroom.</p><p>What does matter is that hands are actually dried. Wet hands transfer microbes far more readily than dry ones, and leaving the washroom with damp hands undoes the hand-washing.</p><p>For a hospital, the decision is made on infection control rather than carbon, and paper is often preferred because it requires no contact and produces no aerosol. The page cannot weigh that, and should not pretend to.</p>
            TXT],
            ['title' => 'What a washroom designer can change', 'html' => <<<'TXT'
            <p>The biggest lever is not the drying method; it is the number of towels per dry. A dispenser that gives one sheet at a time halves the paper total. That single change moves the answer further than switching technologies.</p><p>Sensor activation and shorter run times do the same for the dryer. A machine that stops when hands leave cuts the energy of the habitual over-dryer who stands there for twenty seconds.</p><p>And signage that says 'one towel is enough' has measurable effects in trials, which is a slightly depressing finding about human behaviour and a useful one for a facilities manager.</p>
            TXT],
            ['title' => 'Paper, forests and the fibre loop', 'html' => <<<'TXT'
            <p>Tissue is made from virgin fibre or recovered paper, and the choice matters more for forests than for carbon. Virgin tissue usually comes from certified plantations or from sawmill residues rather than from primary forest, but the certification is uneven and the pulping is chemical.</p><p>Recycled tissue avoids the pulping step and the forest impact, at the cost of de-inking and a shorter fibre that needs more of itself to make a strong sheet. Most European washroom towel now includes a significant recycled fraction, which is why the three-gram figure is defensible.</p><p>The recycling loop for tissue is essentially open, not closed: used towel is contaminated and cannot go back into the mill. The fibre travels one way, which is why the waste weight in the panel is a real number and not a rounding error.</p>
            TXT],
            ['title' => 'Electricity at the hour you use it', 'html' => <<<'TXT'
            <p>The grid intensity in the form is an annual average. The actual carbon of a kilowatt-hour depends on when it is drawn, and a washroom used at the morning peak is drawing on the marginal plant — often gas — rather than on the midday solar surplus.</p><p>For a dryer this matters more than for most appliances because the load is spiky. Ten seconds at 1.4 kilowatts is a small energy total and a noticeable demand pulse, and in a building with a demand charge that pulse has a price the carbon figure ignores.</p><p>If the washroom is in an office with rooftop solar, the honest grid number is close to zero for daytime use, and the dryer wins by an order of magnitude. Change the grid box and see.</p>
            TXT],
            ['title' => 'One household is not a washroom', 'html' => <<<'TXT'
            <p>The economics of this choice flip with scale. A dryer costs several hundred euros and has a service life of five to ten years; a dispenser costs much less and the towels are a running cost that never stops.</p><p>In a busy office washroom with 200 dries a day, the paper bill dwarfs the electricity bill and the dryer pays for itself in a couple of years. In a house with three dries a day, neither the money nor the carbon justifies the machine.</p><p>The page's default is the household case, where the two options are equivalent. Raise the dries per day to 50 and the dryer's advantage grows with every extra dry, because the fixed manufacturing cost is amortised and the paper cost is not.</p>
            TXT],
            ['title' => 'The cost side, in euros', 'html' => <<<'TXT'
            <p>At European prices, a paper towel costs about a cent and a half. Two per dry is three cents; 2,190 towels a year is roughly €33. Electricity at 25 cents a kilowatt-hour makes a year of dryer use cost €5.50.</p><p>Add a €400 machine over eight years and the dryer is still cheaper — but only if it is reliable, and only if nobody has to service it. The maintenance contract is the line item that decides many real installations.</p><p>None of this appears in the carbon calculation, which is why procurement decisions that claim to be environmental usually turn out to be financial decisions with environmental language attached.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Every box on the panel is a multiplication away from the inputs, so the page answers the reverse questions too: the grid intensity at which the two options tie, or the towels per dry that would make paper the better choice.</p><ul><li><strong>Dries</strong> = dries per day × days</li><li><strong>Towels</strong> = dries × towels per dry</li><li><strong>Paper carbon</strong> = towels × grams per towel ÷ 1000</li><li><strong>Dryer carbon</strong> = dries × kWh per dry × grid intensity ÷ 1000</li><li><strong>Saving</strong> = paper carbon − dryer carbon</li><li><strong>Break-even grid intensity</strong> = paper carbon × 1000 ÷ (dries × kWh per dry)</li></ul><p>The last row is the one to quote in an argument. At these defaults the two options tie at about 500 grams per kilowatt-hour, which is close to the world average and above most of Europe.</p>
            TXT],
            ['title' => 'What the page cannot decide', 'html' => <<<'TXT'
            <p>It cannot compare manufacturing. A dryer has a few hundred kilograms of embodied carbon and a dispenser rather less; the paper supply chain carries its own embodied carbon in the sheets, which the form counts only as a per-towel figure.</p><p>It cannot see how the electricity is generated at the hour you use it, or whether the washroom's ventilation has to be increased to remove the moisture a dryer adds — a real cost in a tightly sealed building.</p><p>And it cannot weigh litter. Paper towels in a bin are visible waste; a dryer produces none, and in a public convenience that difference is the whole argument.</p><p>What it can do is stop an argument going in circles. Two people disagreeing about washroom drying usually disagree about which study they read. Put the same grid intensity and the same towels per dry into the form in front of them and the disagreement becomes a single number they can look up.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Are hand dryers better for the environment than paper towels?', 'a' => <<<'TXT'
            On a low-carbon grid, yes; on a coal-heavy one, no. At the page's defaults — 480 grams per kilowatt-hour — the two are within half a kilogram a year of each other, so the answer depends on the grid rather than on the machine.
            TXT],
            ['q' => 'How much energy does one hand dry take?', 'a' => <<<'TXT'
            A modern high-speed dryer uses about 0.02 kilowatt-hours, roughly the electricity of ten minutes of LED lighting. An older warm-air unit uses 0.03 to 0.05, which is two to three times more.
            TXT],
            ['q' => 'How much carbon is in a paper towel?', 'a' => <<<'TXT'
            About five grams of CO₂ equivalent for a virgin-pulp towel, and around three for a recycled one. Most of it is the energy used to dry the sheet during papermaking.
            TXT],
            ['q' => 'Do hand dryers spread bacteria?', 'a' => <<<'TXT'
            Older warm-air models can aerosolise contamination. Modern high-speed dryers with HEPA filters perform far better in studies, and in any case drying hands properly matters more than the method used.
            TXT],
            ['q' => 'Which option produces less waste?', 'a' => <<<'TXT'
            The dryer produces no routine waste, while paper towels generate 6.57 kilograms a year at these defaults. Contaminated towel cannot be recycled, so it goes to incineration or landfill.
            TXT],
            ['q' => 'At what grid intensity do they break even?', 'a' => <<<'TXT'
            About 500 grams of CO₂ per kilowatt-hour at the default settings. Below that the dryer wins; above it, the towels do. The world average is near 480, so most countries are close to the line.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
