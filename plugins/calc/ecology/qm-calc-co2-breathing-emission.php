<?php

/**
 * CO2 Breathing Emission Calculator
 * /ecology/co2-breathing-emission
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'CO2 Breathing Emission Calculator',
    'meta' => ['title' => 'Breathing CO2 Calculator: Kilograms Exhaled per Day', 'description' => 'Turn breaths per minute, tidal volume and hours into the carbon dioxide one person exhales, then read it as car kilometres and as tree-years of absorption.', 'h1' => 'CO2 Breathing Emission Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The breathing',
            'fields' => [
                [
                    'name' => 'people',
                    'label' => 'People breathing',
                    'type' => 'number',
                    'default' => '1',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                ],
                [
                    'name' => 'breaths_per_minute',
                    'label' => 'Breaths per minute',
                    'type' => 'number',
                    'default' => '14',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'Twelve to sixteen at rest; twenty or more while walking.',
                ],
                [
                    'name' => 'tidal_volume',
                    'label' => 'Air in each breath',
                    'type' => 'number',
                    'unit' => '20',
                    'unit_default' => 'ml',
                    'default' => '500',
                    'rounding' => ['omni', '0.01'],
                    'help' => 'Half a litre at rest, about two litres in hard exercise.',
                ],
                [
                    'name' => 'hours',
                    'label' => 'Hours of breathing',
                    'type' => 'number',
                    'default' => '24',
                    'rounding' => ['omni', '0.1'],
                    'min' => '0',
                    'max' => '24',
                ],
                [
                    'name' => 'exhaled_co2',
                    'label' => 'Carbon dioxide in exhaled air',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '4',
                    'rounding' => ['omni', '0.01'],
                    'help' => 'Inhaled air holds about 0.04 per cent.',
                ],
            ],
        ],
        [
            'title' => 'What comes out',
            'fields' => [
                [
                    'name' => 'air_litres',
                    'label' => 'Air breathed',
                    'type' => 'number',
                    'suffix' => 'L',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'co2_kg',
                    'label' => 'Carbon dioxide exhaled',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'readonly' => true,
                    'rounding' => ['omni', '0.001'],
                ],
                [
                    'name' => 'car_km',
                    'label' => 'Same carbon as a petrol car',
                    'type' => 'number',
                    'suffix' => 'km',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                    'help' => 'A modern petrol car emits about 0.12 kg per kilometre.',
                ],
                [
                    'name' => 'trees',
                    'label' => 'Trees needed for a year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                    'help' => 'A mature tree absorbs about 21 kg of CO₂ a year.',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Air breathed',
            'results' => ['air_litres' => 'people * breaths_per_minute * tidal_volume * 60 * hours * 1000'],
        ],
        [
            'title' => 'Carbon dioxide',
            'results' => ['co2_kg' => 'air_litres * (exhaled_co2 - 0.04) / 100 / 24.05 * 44.01 / 1000', 'car_km' => 'co2_kg / 0.12', 'trees' => 'co2_kg * 365 / 21'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Fourteen breaths a minute at half a litre each, across twenty-four hours, moves 10,080 litres of air through one pair of lungs. Raising its carbon dioxide from 0.04 per cent to 4 per cent adds 0.7305 kilograms of CO₂ — the same carbon as 6.1 kilometres in a petrol car, and about what 12.7 mature trees absorb in a year. None of it is fossil carbon; the page is a unit conversion, not an accusation.</p>
        TXT,
        'sections' => [
            ['title' => 'What the calculation claims, and what it does not', 'html' => <<<'TXT'
            <p>Breathing adds carbon dioxide to the air. It does not add carbon to the atmosphere in the sense that matters for climate, because the carbon in your breath came from food, and the food came from plants, and the plants took it out of the air this year or last. The loop is short and closed.</p><p>What the page computes is the size of the loop for one person: the volume of air moved, the fraction of it that is CO₂ on the way out, and the mass that fraction represents. That mass is a real quantity and it is worth knowing, because it sets the ventilation requirements of every room you sit in.</p><p>The car and tree comparisons are there to make the kilograms legible, not to imply equivalence. A car's carbon was underground for a hundred million years; yours was in the atmosphere last summer. Same mass, entirely different ledger.</p>
            TXT],
            ['title' => 'The chemistry of one breath', 'html' => <<<'TXT'
            <p>Atmospheric air is 0.04 per cent carbon dioxide — about 420 parts per million. Air leaving healthy lungs is roughly 4 per cent, a hundredfold increase, because the body is continuously producing CO₂ from metabolism and dumping it into the blood and from there into the alveoli.</p><p>Tidal volume at rest is about half a litre, or seven millilitres per kilogram of body weight. A minute of resting breathing therefore moves seven litres of air, of which roughly 280 millilitres is CO₂ — five and a half grams. Over a day that is around 0.7 to 1 kilogram, which is what the page reports.</p><p>The conversion from litres of gas to grams of substance needs a molar volume. The form uses 24.05 litres per mole, the figure at 20 °C, and 44.01 grams per mole for CO₂. Change the temperature and the mass changes by a few per cent, nowhere near enough to matter here.</p>
            TXT],
            ['title' => 'A day of breathing, worked through', 'html' => <<<'TXT'
            <p>Volume first: 1 person × 14 breaths × 0.5 litres × 60 minutes × 24 hours gives 10,080 litres of air. Of that, the difference between 4 per cent exhaled and 0.04 per cent inhaled is 3.96 percentage points, so the CO₂ added is 399 litres.</p><p>Convert: 399 litres divided by 24.05 is 16.6 moles, and 16.6 moles at 44 grams each is 730 grams — 0.73 kilograms. Divide by 0.12 kilograms per kilometre and the car comparison gives 6.1 kilometres. Multiply by 365 and divide by 21 and the tree box gives 12.7 trees for a year.</p><p>Every number on the results panel follows from those four computations. Nothing is looked up, nothing is fitted, and no part of the answer depends on which person is doing the breathing.</p>
            TXT],
            ['title' => 'Why 0.73 kilograms a day is not a climate problem', 'html' => <<<'TXT'
            <p>If breathing were a net emission, the planet would have warmed measurably when the human population doubled. It has not, for the reason in the first section: the carbon in your breath was fixed by photosynthesis from the same atmosphere within the last growing season.</p><p>The accounting distinction is between biogenic and fossil carbon. Wood, food and biofuel are biogenic; coal, oil and gas are fossil. Only the second moves carbon from a long-term store into the atmosphere, and only the second is counted in national inventories.</p><p>There is a real climate argument about the food system, but it is about land use, fertiliser and methane from livestock, not about the CO₂ you exhale. Confusing the two produces headlines about breathing that are arithmetically right and analytically silly.</p>
            TXT],
            ['title' => 'How activity changes the number', 'html' => <<<'TXT'
            <p>Exercise moves both factors. A brisk walk takes breathing to about 20 per minute with a tidal volume near a litre, which doubles the minute volume over rest. Hard cycling reaches 40 breaths a minute at two litres, which is eight times the resting volume.</p><p>Eight times 0.73 is 5.8 kilograms a day, if you could sustain it for twenty-four hours. Nobody can, which is why the hours box matters: an hour of hard exercise adds roughly 0.2 kilograms on top of the day's resting total, not eight times it.</p><p>Elite endurance athletes do reach five litres a minute of ventilation for hours at a time, and on a long mountain stage their output is several times a sedentary person's day. That is still biogenic carbon, but it explains why the riders eat thousands of calories and why their ventilation is measured in tens of litres a minute rather than the seven this page opens with.</p><p>The interesting consequence is not the carbon. It is that exercise in a closed room raises the CO₂ concentration fast, and that is the number ventilation engineers care about. One person exercising hard in a small unventilated room can push it past 3,000 parts per million within an hour.</p>
            TXT],
            ['title' => 'The same arithmetic as a ventilation rule', 'html' => <<<'TXT'
            <p>Indoor air quality guidelines converge on 1,000 parts per million of CO₂ as the point where a room stops feeling fresh. That is 0.1 per cent, so the gap between outdoor air and a stuffy room is a tenth of a percentage point.</p><p>Divide a person's output by that gap and you get the fresh-air requirement: about 0.73 kilograms a day is 0.03 kilograms an hour, which is roughly 17 litres of CO₂ an hour. To hold the room at 1,000 parts per million you need to supply about 17,000 litres of outdoor air per person per hour — eight to ten litres a second.</p><p>That figure is close to the 10 litres per second per person in most building standards, which is not a coincidence. The ventilation standard was derived, in part, from exactly this calculation, long before anyone worried about how it reads as a carbon number.</p>
            TXT],
            ['title' => 'How the comparison with a car should be read', 'html' => <<<'TXT'
            <p>Saying a day's breathing equals six kilometres of driving is a sentence about mass, not about responsibility. It is useful because 6.1 kilometres is a quantity people can picture, and because it shows how small a kilogram of CO₂ is when you are counting it in tonnes.</p><p>It is misleading if you stop there. A car emitting 0.12 kilograms per kilometre does so by burning fuel that was underground; the driver also produces the same 0.73 kilograms the passenger does. The right comparison for a journey is the car's tailpipe against the alternative transport, not against the people inside.</p><p>Keep the conversion in its place: a yardstick for one kilogram. Nothing you breathe belongs in a carbon budget, and nothing you drive belongs anywhere else.</p>
            TXT],
            ['title' => 'Eight billion people, multiplied out', 'html' => <<<'TXT'
            <p>One person's 0.73 kilograms a day is a curiosity. Multiply by eight billion and the figure is 5.8 billion kilograms a day, or about 2.1 billion tonnes a year. That is a real quantity — roughly five per cent of global fossil carbon emissions, and larger than the annual emissions of most countries.</p><p>It is also the number that makes the biogenic argument unavoidable. Humanity has always exhaled at roughly this rate; the population has grown fourfold in a century, and atmospheric CO₂ has risen in step with fossil fuel use rather than with population. If breath were the driver, the isotope record would show it, and it does not.</p><p>The 2.1 billion tonnes figure comes from the same arithmetic as the single-person case, and it is worth keeping in mind when somebody claims that breathing is the real problem. The mass is large; the source is last year's photosynthesis; the two facts sit together comfortably.</p>
            TXT],
            ['title' => 'What a carbon dioxide meter shows in a meeting room', 'html' => <<<'TXT'
            <p>A cheap NDIR sensor on the wall reads the balance between what the people in the room produce and what the ventilation removes. Watch it through a meeting and the curve is a clean demonstration of this page's arithmetic.</p><p>Six people in a 30-square-metre room with the door shut will take the concentration from 420 parts per million to over 2,000 within an hour if nothing moves the air. Open a window and it falls within minutes; run the mechanical system and it plateaus somewhere near the design figure.</p><p>That plateau is the useful reading. A steady 800 means the ventilation is matching the occupancy; a rising slope means it is not. The same sensor that tells you the room is stuffy also tells you, with a little arithmetic, how many people are in it.</p>
            TXT],
            ['title' => 'Altitude, diving and the sleeping body', 'html' => <<<'TXT'
            <p>At 3,000 metres the air is thinner, so each breath carries fewer molecules. Breathing rate and depth rise to compensate, and the total volume of air moved per day goes up by roughly a fifth while the CO₂ produced stays the same — metabolism has not changed, only the price of oxygen.</p><p>Sleep lowers both factors. Breathing becomes slower and shallower, and the metabolic rate falls by about ten per cent, so a night's exhalation is a little under a third of the day's total rather than half.</p><p>Divers and climbers meet the same arithmetic with different numbers: a closed-circuit rebreather scrubs the CO₂ a diver produces, and the scrubber canister is sized in moles per minute, which is the same quantity this page reports in kilograms per day.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Because the chain is multiplication and division throughout, each box can be the unknown. The reverse questions are mostly about rooms and crowds: how many people fill a space, how long before the air goes stale, how much fresh air a meeting needs.</p><ul><li><strong>Air breathed</strong> = people × breaths per minute × tidal volume × 60 × hours × 1000</li><li><strong>CO₂ exhaled</strong> = air × (exhaled % − 0.04) ÷ 100 ÷ 24.05 × 44.01 ÷ 1000</li><li><strong>Car kilometres</strong> = CO₂ ÷ 0.12</li><li><strong>Trees for a year</strong> = CO₂ × 365 ÷ 21</li><li><strong>Hours</strong> = air ÷ (people × breaths × tidal volume × 60 × 1000)</li><li><strong>Breaths per minute</strong> = air ÷ (people × tidal volume × 60 × hours × 1000)</li></ul><p>The last two rows are how a measured CO₂ rise in a room becomes an estimate of how many people were in it and for how long — the same arithmetic run in the opposite direction.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Does human breathing contribute to climate change?', 'a' => <<<'TXT'
            Not in the way fossil fuel does. The carbon you exhale was taken from the atmosphere by plants within the last year or so, so breathing moves it around a short cycle rather than adding to it. Food production has a real climate cost; the exhalation itself does not.
            TXT],
            ['q' => 'Why is exhaled air four per cent carbon dioxide?', 'a' => <<<'TXT'
            Because the body produces CO₂ continuously and the lungs equilibrate blood gas with alveolar air. Four per cent is the typical mixed exhaled figure at rest; it rises with exercise and falls with hyperventilation.
            TXT],
            ['q' => 'How much CO₂ does one person exhale in a day?', 'a' => <<<'TXT'
            Around 0.7 to 1 kilogram, depending on body size, activity and diet. The page's defaults give 0.73 kilograms, which corresponds to a resting adult producing about 200 millilitres of CO₂ a minute.
            TXT],
            ['q' => 'Is the comparison with a car fair?', 'a' => <<<'TXT'
            As a unit conversion, yes: 0.73 kilograms is 6.1 kilometres of petrol driving. As a statement about responsibility, no: the car's carbon came from fossil fuel, and biogenic carbon is counted separately in every inventory.
            TXT],
            ['q' => 'Can I use this to check my room\'s ventilation?', 'a' => <<<'TXT'
            Yes, in reverse. Measure the CO₂ concentration, subtract the outdoor level, and divide a person's hourly output by the difference. That gives the fresh-air flow per person; anything under about 8 litres a second means the room is under-ventilated.
            TXT],
            ['q' => 'Does the temperature of the air matter?', 'a' => <<<'TXT'
            Slightly. The molar volume used here is for 20 °C; cold air is denser and the same number of moles occupies less space, which shifts the mass by a few per cent. That is well inside the uncertainty in tidal volume.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
