<?php

/**
 * Drip Faucet Calculator
 * /ecology/drip-faucet
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Drip Faucet Calculator',
    'meta' => ['title' => 'Drip Faucet Calculator: Litres Lost and What It Costs', 'description' => 'Count the drips per minute, size one drop, and see the litres a leaking tap wastes in a year, the bottles they fill and the money they add to the bill.', 'h1' => 'Drip Faucet Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The leak',
            'fields' => [
                [
                    'name' => 'drips_per_minute',
                    'label' => 'Drips per minute',
                    'type' => 'number',
                    'default' => '20',
                    'rounding' => ['omni', '0.1'],
                    'min' => '0',
                    'help' => 'Time ten drips with a phone and multiply by six.',
                ],
                [
                    'name' => 'drop_volume',
                    'label' => 'Volume of one drop',
                    'type' => 'number',
                    'unit' => '20',
                    'unit_default' => 'ml',
                    'default' => '0.05',
                    'rounding' => ['omni', '0.001'],
                    'help' => 'A water drop is about 0.05 millilitres; a fat one from a worn washer is nearer 0.1.',
                ],
                [
                    'name' => 'days',
                    'label' => 'Days the tap has been dripping',
                    'type' => 'number',
                    'default' => '365',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                ],
                [
                    'name' => 'water_price',
                    'label' => 'Price of water',
                    'type' => 'number',
                    'suffix' => 'per m³',
                    'default' => '3.5',
                    'rounding' => ['omni', '0.01'],
                    'help' => 'Includes the sewerage charge if your bill adds one.',
                ],
            ],
        ],
        [
            'title' => 'What the drip costs',
            'fields' => [
                [
                    'name' => 'litres_per_day',
                    'label' => 'Water lost per day',
                    'type' => 'number',
                    'unit' => '20',
                    'unit_default' => 'liters',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'litres_total',
                    'label' => 'Water lost over the period',
                    'type' => 'number',
                    'unit' => '20',
                    'unit_default' => 'liters',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'bottles',
                    'label' => 'Half-litre bottles filled',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'buckets',
                    'label' => 'Ten-litre buckets filled',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'cost',
                    'label' => 'Added to the bill',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Volume',
            'results' => ['litres_per_day' => 'drips_per_minute * 60 * 24 * drop_volume', 'litres_total' => 'litres_per_day * days'],
        ],
        [
            'title' => 'The same water, and the bill',
            'results' => ['bottles' => 'litres_total / 0.0005', 'buckets' => 'litres_total / 0.01', 'cost' => 'litres_total * water_price'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Twenty drips a minute, at a twentieth of a millilitre each, is 1.44 litres a day and 525.6 litres across a year. That fills 1,051 half-litre bottles, or 52.56 ten-litre buckets, and adds 1.84 to the water bill at 3.50 per cubic metre. Four boxes decide it: the drip rate, the size of a drop, the days it has been running, and the price of water.</p>
        TXT,
        'sections' => [
            ['title' => 'What one drip is worth', 'html' => <<<'TXT'
            <p>A water drop from a tap is about 0.05 millilitres — a twentieth of a teaspoon roughly. That is small enough that a single drip seems to make no difference, and large enough that twenty a minute is 1.44 litres a day.</p><p>The multiplication is worth doing in the head: 20 drips a minute is 1,200 an hour, which is 28,800 in a day. At 0.05 millilitres each that is 1,440 millilitres, so roughly a litre and a half. Every step is a multiplication by sixty or twenty-four, and the result arrives faster than intuition expects.</p><p>The drop size is the box people get wrong. A worn washer can produce a fatter drop, nearer 0.1 millilitres, which doubles everything downstream. If you can catch twenty drips in a measuring spoon, you can measure it directly instead of guessing.</p>
            TXT],
            ['title' => 'Measuring a drip rate without special kit', 'html' => <<<'TXT'
            <p>Put a cup under the tap, start a stopwatch, and count drips for a minute. Twenty is the figure the form opens with, and it is the sound most people describe as 'a bit annoying' rather than 'a leak'.</p><p>If counting for a minute is too dull, count for fifteen seconds and multiply by four, or count the seconds between drips and divide sixty by that number. Three seconds between drips is twenty a minute; one second between drips is sixty, which is the point where the litre counter starts moving visibly.</p><p>For the drop volume, weigh or measure: fifty drips into a spoon is about 2.5 millilitres, which is enough to see against the markings. Kitchen measures are not laboratory glassware, but the answer only needs to be right to within a factor of two. If you have a kitchen scale, weigh a hundred drips instead: a gram is a millilitre, and the scale reads to a tenth of a gram.</p><p>Write the two figures down before you fix the tap. The measurement takes five minutes, and afterwards you cannot repeat it without dismantling the repair.</p>
            TXT],
            ['title' => 'A year of dripping, worked through', 'html' => <<<'TXT'
            <p>Volume: 1.44 litres a day times 365 days is 525.6 litres. Half-litre bottles comes to 1,051; ten-litre buckets comes to 52.56.</p><p>Money: 525.6 litres is 0.5256 cubic metres, and at 3.50 per cubic metre that is 1.84. If your bill adds a sewerage charge at the same rate, double it, because waste water is charged on the volume you draw whether or not it goes down the drain.</p><p>None of these numbers is alarming on its own. That is exactly the point of putting them side by side: 1.84 a year is less than a coffee, and 52.56 buckets is a visible amount of water to carry. The two facts are the same fact.</p>
            TXT],
            ['title' => 'Why the money looks trivial and the water does not', 'html' => <<<'TXT'
            <p>Water is cheap in most of Europe, which is why leaks survive. A cubic metre costs between one and five euros depending on the country, so a tap wasting half a cubic metre a year is not a financial problem for anyone.</p><p>Water scarcity is a different ledger. In a city that draws from an aquifer, every litre not leaked is a litre not pumped, and the energy and treatment that go with it are saved too. In a drought year, the marginal value of water is set by restriction rather than by tariff.</p><p>There is also the hot-water version of the same leak, which the page does not calculate. A dripping hot tap wastes water that has already been heated: raising 525.6 litres by 40 kelvin takes about 24 kilowatt-hours, which is a few kilograms of carbon and rather more money than the water itself.</p>
            TXT],
            ['title' => 'Why taps drip, and what stops them', 'html' => <<<'TXT'
            <p>Before the mechanics, the physics: a tap drips when the seal between the water and the air is incomplete. Pressure pushes water through the gap, surface tension holds it in a bead until its weight exceeds the tension, and a drop falls. The rate therefore depends on pressure as well as on the gap, which is why leaks look worse at night when mains pressure rises.</p><p>Two designs, two failure modes. A traditional tap uses a rubber or fibre washer pressed against a seat; the washer hardens, the seat scores, and the tap drips. A ceramic cartridge tap uses two polished discs; wear, grit or limescale lets a trickle past, and the cartridge is replaced as a unit.</p><p>Hard water accelerates both. Calcium carbonate deposits on the seat or the discs and prevents a clean seal, which is why dripping is more common in limestone regions.</p><p>The repair is cheap in parts and usually cheap in labour: a washer costs pennies, a cartridge a few euros, and both take minutes. The reason taps keep dripping is not cost but attention — nobody hears a leak in a spare bathroom.</p>
            TXT],
            ['title' => 'Scaling to a building', 'html' => <<<'TXT'
            <p>Before scaling, notice what the building's meter already knows. A small hotel with forty outlets and a monthly consumption figure can compare its own use against a per-bed benchmark and see whether the plumbing is broadly sound or losing water somewhere structural.</p><p>One dripping tap is 525.6 litres a year. A hundred — a school, a small hotel, an office block with a habit of worn washers — is 52,560 cubic metres, which is twenty Olympic swimming pools and a line item in a water audit.</p><p>That is why commercial buildings check taps on a schedule rather than when someone complains. A quarterly walk-round with a dry tissue under every outlet finds the leaks that a busy maintenance team never hears about.</p><p>The arithmetic also sets priorities. A single drip at twenty a minute is small; a failed flush valve losing a litre a minute is 525 cubic metres a year, which is a thousand times the drip. Leak surveys exist because the distribution of leak sizes is wildly skewed, and the biggest one is rarely the one you can hear.</p>
            TXT],
            ['title' => 'Finding the leaks you cannot hear', 'html' => <<<'TXT'
            <p>Read your meter at night with everything off, then again in the morning before anyone uses water. A change on the smallest dial means something is flowing. That test catches toilet cisterns, garden taps and the pipe under the floor that a dripping kitchen tap distracts you from.</p><p>Toilet cisterns are the usual culprit. A failed flapper lets water trickle down the back of the pan silently, at rates from a drip to several litres an hour. Put a few drops of food colouring in the cistern and see whether the pan water colours without a flush.</p><p>Outdoors, the meter test is the only reliable method. A buried irrigation line can lose hundreds of litres a day without a visible puddle if the ground drains well.</p>
            TXT],
            ['title' => 'What a cubic metre costs to produce', 'html' => <<<'TXT'
            <p>Water arriving at a tap has been abstracted, screened, often filtered, disinfected, pumped and metered, and the waste water leaving has been collected and treated. That chain costs between 0.3 and 1.5 kilowatt-hours per cubic metre in most European systems.</p><p>So 525.6 litres of leak is not only half a cubic metre of water. It is also a few hundred watt-hours of pumping and treatment, plus the chemicals, plus the share of the network's maintenance the tariff pays for.</p><p>The tariff is the part consumers see, and it is usually below the full cost. Municipal water is subsidised nearly everywhere, which is why the money box on this page always looks small: the price of the water is not the price of supplying it.</p>
            TXT],
            ['title' => 'Drought rules change the arithmetic', 'html' => <<<'TXT'
            <p>In an ordinary year, half a cubic metre is invisible in a utility's balance sheet. In a drought, utilities impose restrictions on outdoor use and sometimes on filling pools, because the marginal litre is all they have.</p><p>At that point a leak is not a cost question but a compliance one. Several municipalities now require landlords to repair leaks within a set period once a meter test shows continuous flow, and the fine for ignoring it is much larger than the water bill.</p><p>For a household, the practical version is the same either way: fix it during the quiet months and you never find out what it would have cost in July.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Everything on the panel comes from one multiplication, so any box can be recovered from the others. The reverse questions are practical ones: what drip rate explains a meter reading, or what drop size a measured volume implies.</p><ul><li><strong>Litres per day</strong> = drips per minute × 60 × 24 × drop volume</li><li><strong>Litres over the period</strong> = litres per day × days</li><li><strong>Bottles</strong> = litres ÷ 0.5</li><li><strong>Buckets</strong> = litres ÷ 10</li><li><strong>Cost</strong> = cubic metres × price per cubic metre</li><li><strong>Drips per minute</strong> = litres per day ÷ (60 × 24 × drop volume)</li></ul><p>The last row is how a measured overnight volume becomes a drip rate: catch the water for an hour, divide, and the drip count falls out.</p>
            TXT],
            ['title' => 'What the count leaves out', 'html' => <<<'TXT'
            <p>It assumes the tap drips at a constant rate, which taps do not. A worn washer drips faster when the pressure rises at night; a ceramic cartridge may drip only when the tap is left in a particular position.</p><p>It ignores evaporation and splashing, both trivial at these volumes. It ignores the sewerage charge unless you add it to the price box, and it ignores the energy in hot water unless you multiply by hand as the section above does.</p><p>Most importantly, it counts only the tap you are looking at. A house with one dripping tap usually has another that is worse, and the meter test is the only way to find out.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much water does a dripping tap waste in a year?', 'a' => <<<'TXT'
            At twenty drips a minute and a twentieth of a millilitre per drop, 525.6 litres — about half a cubic metre. At sixty drips a minute the figure triples, which is why the drip rate is the box worth measuring carefully.
            TXT],
            ['q' => 'Why is my tap dripping after I changed the washer?', 'a' => <<<'TXT'
            Usually a scored valve seat or grit under the washer. The seat can be resurfaced with a seat reamer or replaced. In a ceramic cartridge tap the cartridge itself is the wear item, and changing the washer will not help.
            TXT],
            ['q' => 'Is the money worth fixing a drip for?', 'a' => <<<'TXT'
            Not on the water alone — 1.84 a year is small. The case for fixing it is the water and the energy if it is a hot tap, plus the fact that a dripping tap usually signals a washer that will fail properly soon.
            TXT],
            ['q' => 'How do I measure the drip rate accurately?', 'a' => <<<'TXT'
            Count drips for fifteen seconds and multiply by four, or time the gap between drips and divide sixty by it. For the drop volume, catch fifty drips in a measuring spoon: about 2.5 millilitres is typical.
            TXT],
            ['q' => 'Does a dripping hot tap cost more?', 'a' => <<<'TXT'
            Considerably. The water is already heated, so the waste includes the energy: about 24 kilowatt-hours to heat 525.6 litres by 40 kelvin, which usually costs more than the water itself.
            TXT],
            ['q' => 'How do I find a leak I cannot hear?', 'a' => <<<'TXT'
            Read the water meter at night with every tap and appliance off, then read it again in the morning. Any movement means water is flowing somewhere. A dye test in the toilet cistern rules the usual suspect in or out.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
