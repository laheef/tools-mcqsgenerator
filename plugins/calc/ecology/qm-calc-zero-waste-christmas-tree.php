<?php

/**
 * Zero-Waste Christmas Tree Calculator
 * /ecology/zero-waste-christmas-tree
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Zero-Waste Christmas Tree Calculator',
    'meta' => ['title' => 'Christmas Tree Calculator: Real, Delivered or Plastic', 'description' => 'Compare a real Christmas tree with an artificial one across all the years you keep it, including the drive to fetch it, and find their break-even year.', 'h1' => 'Zero-Waste Christmas Tree Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The tree',
            'fields' => [
                [
                    'name' => 'tree',
                    'label' => 'Which tree',
                    'type' => 'select',
                    'options' => ['Real, grown nearby' => '3.5', 'Real, trucked far' => '16', 'Artificial, plastic' => '40'],
                    'rounding' => ['omni', '0.1'],
                    'help' => 'Kilograms of CO₂ equivalent to produce one tree.',
                ],
                [
                    'name' => 'years',
                    'label' => 'Years you keep it',
                    'type' => 'number',
                    'default' => '10',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                    'help' => 'A cut tree is used once; an artificial one lasts a decade or more.',
                ],
                [
                    'name' => 'trip_km',
                    'label' => 'Distance to fetch it',
                    'type' => 'number',
                    'suffix' => 'km',
                    'default' => '8',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'One way; a walk to the corner shop is zero.',
                ],
                [
                    'name' => 'trips',
                    'label' => 'Trips per year',
                    'type' => 'number',
                    'default' => '2',
                    'rounding' => ['standard', '0'],
                    'help' => 'Out and back counts as two.',
                ],
            ],
        ],
        [
            'title' => 'Per year of use',
            'fields' => [
                [
                    'name' => 'annual_co2',
                    'label' => 'Your tree, per year',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'real_co2',
                    'label' => 'A local real tree, per year',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'difference',
                    'label' => 'Difference',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                    'help' => 'Positive means your choice emits more.',
                ],
                [
                    'name' => 'car_km',
                    'label' => 'Same carbon as a petrol car',
                    'type' => 'number',
                    'suffix' => 'km',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'trees',
                    'label' => 'Tree-years to absorb it',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Per-year carbon',
            'results' => ['annual_co2' => 'tree / years + trips * trip_km * 0.12', 'real_co2' => '3.5 + trips * trip_km * 0.12', 'difference' => 'annual_co2 - real_co2'],
        ],
        [
            'title' => 'Equivalents',
            'results' => ['car_km' => 'difference / 0.12', 'trees' => 'difference / 21'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>An artificial tree carrying 40 kilograms of CO₂, kept ten years and collected by car twice a year, costs 5.92 kilograms a year. A locally grown real tree costs 5.42. The difference is 0.5 kilograms — 4 kilometres of driving, and 0.02381 tree-years of absorption.</p>
        TXT,
        'sections' => [
            ['title' => 'The comparison almost nobody does properly', 'html' => <<<'TXT'
            <p>Both sides of this argument usually compare the wrong things. The real tree is counted at its planting emissions and nothing else; the artificial one is counted at its manufacturing emissions and divided by however long the owner claims to keep it.</p><p>The fair version needs three numbers: what the tree costs to make, how many years you use it, and what the trip to fetch it emits. The page asks for exactly those.</p><p>At the defaults the answer is a dead heat, which is not the answer either camp expected. The difference is half a kilogram a year — about four kilometres of driving.</p>
            TXT],
            ['title' => 'What a real tree costs', 'html' => <<<'TXT'
            <p>A Christmas tree is a crop. It is planted, pruned for six to ten years, cut and replaced, and the field it grew on holds carbon while it grows and after it is replanted.</p><p>Life-cycle studies put a locally grown tree at 3 to 5 kilograms of CO₂ equivalent, including the diesel for pruning and the disposal — which is usually burning or composting, both of which return the carbon within a year or two.</p><p>A tree trucked across a continent is 10 to 20 kilograms, because a tree is mostly air and water and there is very little of it per cubic metre of lorry.</p>
            TXT],
            ['title' => 'What an artificial tree costs', 'html' => <<<'TXT'
            <p>A plastic tree is steel or aluminium wire wrapped in PVC or polyethylene needles, made in a factory in Asia and shipped in a container. The embodied carbon is 20 to 50 kilograms, with 40 a fair middle.</p><p>The material is not recyclable in practice: the metal and the plastic are fused and most kerbside schemes will not take it. When it goes to landfill after a decade, the carbon was already spent.</p><p>It is also a product that is mostly air. A two-metre tree fills a large box and weighs under ten kilos, which is why shipping it from Shenzhen is cheaper than making it in Europe.</p>
            TXT],
            ['title' => 'Forty kilograms over ten years', 'html' => <<<'TXT'
            <p>40 ÷ 10 is 4 kilograms a year, and two trips of eight kilometres at 120 grams each add 1.92. That is 5.92 kilograms for the artificial tree.</p><p>A local real tree is 3.5 plus the same 1.92 of driving, which is 5.42. The difference is 0.5 kilograms, and it is entirely inside the uncertainty of both figures.</p><p>Two conclusions follow. The tree itself barely matters; the drive matters as much. And an artificial tree kept twelve years beats a real one that is driven to a garden centre and back every December.</p>
            TXT],
            ['title' => 'Keep it longer and the artificial tree wins', 'html' => <<<'TXT'
            <p>Set the years box to 15 and the artificial tree falls to 2.67 kilograms plus the drive. Set it to 5 and it rises to 8 plus the drive, which is clearly worse than a real tree.</p><p>The break-even is around eleven years at these defaults. That is longer than most people keep a fake tree, and shorter than the tree will physically last.</p><p>Which is why the honest advice is not 'buy real' or 'buy fake' but 'decide how long you will keep it before you buy it, and then actually keep it that long'.</p>
            TXT],
            ['title' => 'The drive is the wildcard', 'html' => <<<'TXT'
            <p>Two eight-kilometre trips is 1.92 kilograms — half the annual footprint of a real tree. A thirty-kilometre round trip to a pick-your-own farm is 7.2 kilograms, triple the tree.</p><p>A tree bought on foot or by bicycle is close to zero. A tree delivered in a van with thirty others on the same route is not much worse than that, because the trip is shared.</p><p>The form makes this visible in a way that tree-versus-plastic arguments never do. The transport box is the one that moves the answer most for most people.</p>
            TXT],
            ['title' => 'Renting, replanting and the potted tree', 'html' => <<<'TXT'
            <p>A potted tree that lives in the garden all year and comes in for a fortnight is the lowest-carbon option if it survives. The catch is that most houseplant conifers do not survive repeated warm spells indoors.</p><p>Tree rental schemes exist in several European cities: a grower delivers a potted tree, collects it in January and reuses it for years. The transport is pooled and the tree is reused, which is close to the best of both.</p><p>If neither is available, a real tree from a local grower, chipped or composted in January, is a defensible choice and the page shows why.</p>
            TXT],
            ['title' => 'What happens to the tree in January', 'html' => <<<'TXT'
            <p>A real tree in landfill decomposes without oxygen and releases methane, which is why some studies give it a worse disposal figure than burning. Chipping and composting does not.</p><p>Most European municipalities collect trees in the first two weeks of January and chip them for parks or biomass. That is the good path and it is usually free.</p><p>A tree left in a back garden to rot is fine too. A tree put in the general waste bin is the one to avoid, and it is the most common outcome in cities without a collection.</p>
            TXT],
            ['title' => 'The rest of the Christmas footprint', 'html' => <<<'TXT'
            <p>The tree is a rounding error next to the other parts of the holiday. A return flight home for the family, a new appliance, or the food waste from a large dinner each dwarf it by an order of magnitude.</p><p>Food is the biggest: Christmas dinner for eight with a large joint of beef is 20 kilograms of CO₂ before the trimmings, and the waste afterwards adds more.</p><p>Which is worth saying because the tree is the visible symbol and the invisible things are larger. Fix the tree because it is easy, not because it is the biggest number.</p>
            TXT],
            ['title' => 'Lights, wrapping and the things that last', 'html' => <<<'TXT'
            <p>LED fairy lights on a timer use a few kilowatt-hours over the season — under a kilogram of CO₂ on a European grid. Old incandescent sets use ten times that.</p><p>Wrapping paper that is foil-laminated cannot be recycled; plain paper can. Reusable fabric wraps and gift bags avoid the question entirely and last decades.</p><p>The general rule for the whole holiday is the same as for the tree: buy once, keep it, and do not drive far to fetch it.</p>
            TXT],
            ['title' => 'The carbon in one tree-year', 'html' => <<<'TXT'
            <p>0.02381 tree-years is a tiny number, and that is the honest result. A single mature tree absorbs about 21 kilograms a year, so half a kilogram is a fortnight of one tree's work.</p><p>Expressed that way, the tree question looks what it is: a small decision that attracts a lot of moral energy. The page exists to stop the argument taking more carbon than the tree saves.</p><p>4 kilometres is the same point in the other unit. Four kilometres, one short errand, and the difference between the two trees is gone.</p>
            TXT],
            ['title' => 'What the numbers are not counting', 'html' => <<<'TXT'
            <p>Neither figure includes the land the plantation uses, which is farmland either way, or the water, which is rainfall. Both are small.</p><p>Neither includes the packaging the tree arrives in, the net it is wrapped in or the stand it sits in. A plastic stand is another half-kilogram of embodied carbon and another object that never degrades.</p><p>And neither includes the second-hand market, which is where most artificial trees actually come from. A tree inherited or bought used divides its manufacturing carbon by however many owners it passes through.</p>
            TXT],
            ['title' => 'The tree in a circular economy', 'html' => <<<'TXT'
            <p>A real tree is a stored-carbon product that is grown, used and returned. Chipped, it becomes mulch or biomass; composted, it feeds next year's planting.</p><p>An artificial tree is a durable good that becomes waste. Its materials are technically recoverable and practically not, because separating wire from polyethylene needles at scale is uneconomic.</p><p>That distinction survives every reasonable change to the numbers. Even when the carbon is identical, the material fate is not, and that is the argument a carbon-only calculator cannot make.</p>
            TXT],
            ['title' => 'Why the question is asked every December', 'html' => <<<'TXT'
            <p>The tree is a decision people make once a year, in public, with children watching. It is the most visible environmental choice in the calendar.</p><p>Which is why it attracts so much advice and so little consequence. The same household will fly somewhere in July without a second thought, and agonise in December over four kilograms.</p><p>The page cannot fix that asymmetry. It can at least give the tree its true size: about the same as a short drive, and rather less than the turkey.</p>
            TXT],
            ['title' => 'A practical checklist', 'html' => <<<'TXT'
            <p>Real tree: buy it locally, walk or cycle if you can, and put it out for the January collection. That is close to the minimum available.</p><p>Artificial tree: buy it once, keep it at least a decade, and buy second-hand if the choice is between that and new.</p><p>Either way: do not replace a working tree because this year's model is a nicer shape. The greenest tree is the one in the loft.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Four inputs and five outputs, all of them simple.</p><ul><li><strong>Your tree per year</strong> = tree carbon ÷ years kept + trips × distance × 0.12</li><li><strong>Local real tree</strong> = 3.5 + trips × distance × 0.12</li><li><strong>Difference</strong> = your tree − real tree</li><li><strong>Car kilometres</strong> = difference ÷ 0.12</li><li><strong>Tree-years</strong> = difference ÷ 21</li></ul><p>Inverted, the years box answers the decision question: how many Christmases must I get out of a plastic tree to beat a real one? About eleven, at these trip lengths.</p>
            TXT],
            ['title' => 'Where the estimate is uncertain', 'html' => <<<'TXT'
            <p>The 40 kilograms for the artificial tree is a median across studies that range from 20 to 60 depending on size and origin. The 3.5 for a local real tree is similarly a middle figure.</p><p>Neither includes the shelf life of a real tree cut in November and bought in mid-December, or the disposal emissions, or the land use of the plantation.</p><p>Which is why the page's answer at the defaults is 'about the same'. Any calculation that produces a decisive result from these numbers is being driven by the assumptions rather than by the trees.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Is a real or artificial Christmas tree better for the environment?', 'a' => <<<'TXT'
            At the page's defaults they are within half a kilogram of each other: 5.92 kilograms a year for an artificial tree kept ten years, 5.42 for a locally grown real one.
            TXT],
            ['q' => 'How many years must I keep an artificial tree?', 'a' => 'Around eleven at these trip lengths. Kept fifteen years it is clearly the lower-carbon choice; kept five it is clearly worse than a real tree.'],
            ['q' => 'Does the drive to the garden centre matter?', 'a' => <<<'TXT'
            Yes, often more than the tree. Two eight-kilometre trips add 1.92 kilograms — more than half the annual footprint of a real tree. A tree bought on foot is close to zero.
            TXT],
            ['q' => 'What is the greenest option of all?', 'a' => 'A potted or rented tree that is reused for years and delivered with others on a pooled route. After that, a locally grown real tree chipped in January.'],
            ['q' => 'Should I burn my tree or bin it?', 'a' => <<<'TXT'
            Chip or compost it. A tree in landfill decomposes without oxygen and releases methane, which is worse than burning. Most municipalities collect trees for chipping in January.
            TXT],
            ['q' => 'How much CO₂ does a Christmas tree produce?', 'a' => 'A local real tree is 3 to 5 kilograms including delivery; a trucked one 10 to 20; an artificial one 20 to 50 to manufacture, spread over the years it is used.'],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
