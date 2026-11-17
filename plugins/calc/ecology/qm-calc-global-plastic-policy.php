<?php

/**
 * Global Plastic Policy Calculator
 * /ecology/global-plastic-policy
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Global Plastic Policy Calculator',
    'meta' => ['title' => 'Global Plastic Policy Calculator: The Recycling Gap', 'description' => 'Project plastic production forward, compare today\'s recycling rate with a policy target, and measure the gap in millions of tonnes and barrels of oil.', 'h1' => 'Global Plastic Policy Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The policy scenario',
            'fields' => [
                [
                    'name' => 'production',
                    'min' => '0.001',
                    'label' => 'Plastic produced per year',
                    'type' => 'number',
                    'suffix' => 'Mt',
                    'default' => '400',
                    'rounding' => ['standard', '0'],
                    'help' => 'World production of primary plastic is near 400 million tonnes.',
                ],
                [
                    'name' => 'recycling_now',
                    'min' => '0',
                    'max' => '100',
                    'label' => 'Share recycled today',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '9',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'Global figure for plastic waste actually recycled, not collected.',
                ],
                [
                    'name' => 'recycling_target',
                    'min' => '0',
                    'max' => '100',
                    'label' => 'Share recycled under the target',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '50',
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'growth',
                    'min' => '-99.9',
                    'label' => 'Yearly growth in production',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '4',
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'years',
                    'label' => 'Years to the target year',
                    'type' => 'number',
                    'default' => '10',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                ],
            ],
        ],
        [
            'title' => 'What the policy has to deliver',
            'fields' => [
                [
                    'name' => 'production_then',
                    'label' => 'Production in the target year',
                    'type' => 'number',
                    'suffix' => 'Mt',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'cumulative',
                    'label' => 'Plastic produced in between',
                    'type' => 'number',
                    'suffix' => 'Mt',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'recycled_today',
                    'label' => 'Recycled now',
                    'type' => 'number',
                    'suffix' => 'Mt',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'recycled_then',
                    'label' => 'Recycled under the target',
                    'type' => 'number',
                    'suffix' => 'Mt',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'gap',
                    'label' => 'Extra recycling the target needs',
                    'type' => 'number',
                    'suffix' => 'Mt',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'oil_mbbl',
                    'label' => 'Oil embodied in the target year',
                    'type' => 'number',
                    'suffix' => 'Mbbl',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                    'help' => 'Roughly twelve barrels of oil equivalent per tonne of plastic.',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Production',
            'results' => ['production_then' => 'production * pow(1 + growth / 100, years)', 'cumulative' => '(growth == 0 ? production * years : production * (pow(1 + growth / 100, years) - 1) / (growth / 100))'],
        ],
        [
            'title' => 'Recycling',
            'results' => ['recycled_today' => 'production * recycling_now / 100', 'recycled_then' => 'production_then * recycling_target / 100', 'gap' => 'recycled_then - recycled_today', 'oil_mbbl' => 'production_then * 12'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>World plastic production near 400 million tonnes a year, growing at 4 per cent, reaches 592.1 million tonnes in ten years — 4,802 million tonnes cumulatively. Recycling 9 per cent today means 36 million tonnes; a 50 per cent target in the target year means 296 million. The gap between those two numbers is 260 million tonnes, and the target year's production embodies 7,105 million barrels of oil.</p>
        TXT,
        'sections' => [
            ['title' => 'What the model does, and what it refuses to do', 'html' => <<<'TXT'
            <p>This is a scenario machine, not a forecast. It takes four claims — how much plastic the world makes, how much is recycled now, how much a policy promises, and how fast production grows — and works out what the policy would have to deliver.</p><p>It deliberately says nothing about whether the growth rate will hold, whether recycling capacity can be built, or whether the target is achievable. Those are the questions the arithmetic is meant to sharpen, not answer.</p><p>The structure is the useful part. Any plastic policy has two levers: make less, or recover more. The page models the second and lets you move the first to see how much of the gap the second has to cover.</p>
            TXT],
            ['title' => 'Why 9 per cent is the right starting point', 'html' => <<<'TXT'
            <p>The most-cited global figure is that about 9 per cent of all plastic ever produced has been recycled, with 12 per cent incinerated and 79 per cent landfilled, dumped or leaked. The OECD puts the current recycling rate for plastic waste at around 9 per cent as well, so the two agree closely enough for a scenario.</p><p>The number is low for a reason that is not laziness. Plastic is not one material: PET, HDPE, LDPE, PP, PS, PVC and a long tail of laminates and composites each need a different stream. Multilayer packaging, which is most of what a supermarket sells, cannot be mechanically separated at all.</p><p>The European rate is higher — around 30 per cent by some measures — and the global average is dragged down by countries with no collection infrastructure. If you are modelling a rich region, put 30 in the box and watch the gap shrink.</p>
            TXT],
            ['title' => 'Compounding: ten years at four per cent', 'html' => <<<'TXT'
            <p>Growth compounds, and that is where scenarios surprise people. Four per cent a year does not add 40 per cent over a decade; it multiplies by 1.04¹⁰, which is 1.48. Four hundred million tonnes becomes 592.1 million.</p><p>Cumulative production is the sum of each year in the projection. At zero growth it is simply the starting annual production multiplied by the number of years; otherwise it is a geometric series.</p><p>Compounding cuts both ways in policy. A target expressed as a percentage of production gets harder every year that production grows, which is why caps on absolute production and targets on recycling rates are not the same policy even when the headlines look similar.</p>
            TXT],
            ['title' => 'Reading the gap in tonnes', 'html' => <<<'TXT'
            <p>Today's 9 per cent of 400 million tonnes is 36 million tonnes. In the target year, 50 per cent of 592.1 million is 296 million. The difference, 260 million tonnes, is the extra recycling the policy has to create.</p><p>That is not a small increment. It is roughly seven times today's total recycling, built in a decade, in a material stream that is getting more mixed rather than less. The capacity — collection, sorting, washing, pelletising — does not exist at that scale.</p><p>Put the gap another way: 260 million tonnes a year is more than the entire annual plastic waste of Europe. A target like this is an industrial programme, not a recycling campaign.</p><p>There is also a quality dimension that tonnage hides. The easiest tonnage — clean, single-polymer, high-value bottles — is already being collected where collection exists. Every additional percentage point is drawn from a harder stream: films, laminates, small rigid items, dirty packaging. The cost per tonne rises as the rate rises, which makes the last ten points the most expensive.</p>
            TXT],
            ['title' => 'What building that capacity would take', 'html' => <<<'TXT'
            <p>Sorting and reprocessing capacity costs money per tonne and takes years to permit and build. A mechanical recycling plant of moderate size handles tens of thousands of tonnes a year; 260 million tonnes implies thousands of them, plus the collection systems to feed them.</p><p>Collection is the harder half. Recycling rates track collection rates almost perfectly, and informal collection — the sector that handles most plastic waste in the global south — is not a system that a target can simply be legislated onto.</p><p>Recycling is a manufacturing process, and manufacturing processes need a steady input. Mixed bales from a kerbside scheme contain what they contain; a plant running below design load has higher costs per tonne. Scale discipline matters more in recycling than in most industries.</p><p>Economics decide what happens to the output. Recyclate competes with virgin polymer made from cheap oil and gas, and it loses whenever oil is cheap. Without a mandated recycled content requirement, capacity built to meet a target has no guaranteed customer.</p>
            TXT],
            ['title' => 'The oil inside the plastic', 'html' => <<<'TXT'
            <p>Plastic is fossil carbon in solid form. Roughly 12 barrels of oil equivalent go into a tonne of plastic once feedstock and process energy are counted, so 592.1 million tonnes embodies 7,105 million barrels.</p><p>That number explains why the petrochemical industry treats plastic as a growth market. As transport demand for oil falls with electrification, plastics are the remaining growth segment for refined products, and producers have planned accordingly.</p><p>It also explains the political economy of the treaty negotiations. A cap on production is a cap on a revenue stream, and the countries with petrochemical industries negotiate accordingly. Recycling targets are easier to agree because they leave production untouched.</p>
            TXT],
            ['title' => 'Caps, targets and the treaty fight', 'html' => <<<'TXT'
            <p>The intergovernmental negotiations have divided roughly into two camps. One wants binding cuts in primary plastic production, with the argument that recycling cannot keep up with growth. The other wants waste management and recycling commitments, with the argument that plastic is essential and the problem is leakage.</p><p>The page lets you test both. Set growth to zero and see the gap shrink; raise the recycling target and see what it costs. The arithmetic does not settle the politics, but it does show that a recycling-only policy has to run faster than production growth just to stand still.</p><p>That is the single most useful output of a scenario like this. A recycling rate rising by two points a year, in a world where production rises by four, loses ground.</p>
            TXT],
            ['title' => 'Why recycling alone struggles', 'html' => <<<'TXT'
            <p>Mechanical recycling degrades polymers. Each cycle shortens the chains and lowers the quality, so food-grade applications need virgin material or chemical recycling that is currently expensive and energy-hungry.</p><p>Mixed and multilayered packaging is the majority of household plastic by item count and the minority by recyclability. A crisp packet has more layers than a laboratory laminate and no route through a kerbside stream.</p><p>And the economic loop is weak. Virgin plastic is cheap because the feedstock is cheap and the externalities are unpriced; recyclate is expensive because collection and sorting are labour-intensive. Policy has to close that gap with mandates or money, which is exactly what a target without an instrument fails to do.</p>
            TXT],
            ['title' => 'The leakage figure the scenario leaves out', 'html' => <<<'TXT'
            <p>Production and recycling are two ends of a pipeline with a leaky middle. An estimated 8 to 12 million tonnes of plastic enters the ocean each year, and the cumulative stock in aquatic environments is now measured in hundreds of millions of tonnes.</p><p>Recycling does not address leakage directly. A tonne recycled is a tonne not landfilled, which reduces the chance of escape, but the items that leak are usually the ones collection never reached — sachets, films, cigarette filters, abandoned fishing gear.</p><p>That is why the treaty debate includes waste management finance for countries without collection. A recycling target in a place with no bins is a number without a mechanism, and the leakage continues while the target is met on paper.</p>
            TXT],
            ['title' => 'What a national government can actually set', 'html' => <<<'TXT'
            <p>Three instruments do most of the work in countries that have raised their rates. Extended producer responsibility charges packaging producers by weight and material, which funds collection and pushes design toward recyclability.</p><p>Deposit return schemes achieve collection rates above 80 per cent for beverage containers, far above kerbside. They work because the value of the deposit travels with the container until it comes back.</p><p>Mandated recycled content closes the loop from the demand side: if a producer must use 30 per cent recyclate, the sorting plant has a customer. Without it, capacity is built and then idled whenever virgin polymer is cheaper.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Four inputs and six outputs share one chain, so each can be recovered. The reverse questions are the policy ones: what growth rate makes a target achievable, or what recycling rate holds the gap at zero.</p><ul><li><strong>Production in the target year</strong> = production × (1 + growth ÷ 100)<sup>years</sup></li><li><strong>Cumulative production</strong> = production × ((1 + growth ÷ 100)<sup>years</sup> − 1) ÷ (growth ÷ 100)</li><li><strong>Recycled today</strong> = production × rate today ÷ 100</li><li><strong>Recycled under the target</strong> = production in the target year × target ÷ 100</li><li><strong>Gap</strong> = recycled under the target − recycled today</li><li><strong>Oil embodied</strong> = production in the target year × 12</li></ul><p>Set the gap to zero and solve for the target rate: it is the rate at which recycled tonnes in the final year equal recycled tonnes today, which is a much more demanding number than the headline target suggests.</p>
            TXT],
            ['title' => 'Where the scenario is optimistic or pessimistic', 'html' => <<<'TXT'
            <p>Optimistic: production growth may slow as regulation bites, mechanical recycling may improve, and chemical recycling may become a real route for mixed waste rather than a pilot plant with a press release.</p><p>Pessimistic: growth in the petrochemical sector has historically beaten forecasts, and the easy-to-recycle fraction is already being recycled in rich countries — the remaining tonnage is harder, not easier.</p><p>The page takes your assumptions at face value, which is the honest thing for a scenario to do. Change one box at a time, watch which one moves the gap most, and you will have learned more about plastic policy than any single forecast can teach.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much plastic does the world produce each year?', 'a' => <<<'TXT'
            About 400 million tonnes of primary plastic, and the figure has been growing at 3 to 4 per cent a year. The page opens at 400 and 4 per cent, which reproduces the trend of the last two decades.
            TXT],
            ['q' => 'What share of plastic is actually recycled?', 'a' => <<<'TXT'
            Around 9 per cent globally, with 12 per cent incinerated and the rest landfilled, dumped or leaked. Europe is higher, near 30 per cent by some measures; countries without collection infrastructure pull the world average down.
            TXT],
            ['q' => 'Why does compounding matter so much here?', 'a' => <<<'TXT'
            Because a percentage target applied to a growing total demands more absolute capacity every year. Four per cent growth turns 400 million tonnes into 592.1 million in a decade, so a fixed recycling rate recovers more tonnes but a fixed tonnage target gets harder.
            TXT],
            ['q' => 'How much oil is in a tonne of plastic?', 'a' => <<<'TXT'
            About 12 barrels of oil equivalent once feedstock and process energy are counted. That is why the petrochemical industry sees plastics as its growth market as transport fuel demand falls.
            TXT],
            ['q' => 'Can recycling alone solve plastic pollution?', 'a' => <<<'TXT'
            Not while production grows faster than recycling capacity. The arithmetic on this page shows the gap widening unless the recycling rate rises by more than the growth rate, which is why production caps are on the negotiating table.
            TXT],
            ['q' => 'Is the target year the same as a treaty deadline?', 'a' => 'It is whatever you set. The form takes a number of years, so you can model a 2030 target, a 2035 target or a 2040 one without changing anything else.'],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
