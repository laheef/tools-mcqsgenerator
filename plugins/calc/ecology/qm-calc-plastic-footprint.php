<?php

/**
 * Plastic Footprint Calculator
 * /ecology/plastic-footprint
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Plastic Footprint Calculator',
    'meta' => ['title' => 'Plastic Footprint Calculator: Annual Waste and CO2', 'description' => 'Turn a weekly bag of plastic waste into a year of kilograms, drink bottles, barrels of oil and carbon dioxide, split by what happens to each kilogram.', 'h1' => 'Plastic Footprint Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'What you throw away',
            'fields' => [
                [
                    'name' => 'weekly_kg',
                    'label' => 'Plastic waste per week',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'default' => '2',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'A full carrier bag of packaging is roughly one kilogram.',
                ],
                [
                    'name' => 'recycled_share',
                    'min' => '0',
                    'max' => '100',
                    'label' => 'Share recycled',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '30',
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'incinerated_share',
                    'min' => '0',
                    'max' => '100',
                    'label' => 'Share burned for energy',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '25',
                    'rounding' => ['standard', '0'],
                    'help' => 'The rest is assumed to go to landfill.',
                ],
            ],
        ],
        [
            'title' => 'A year of it',
            'fields' => [
                [
                    'name' => 'annual_kg',
                    'label' => 'Plastic per year',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'recycled_kg',
                    'label' => 'Recycled per year',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'landfill_kg',
                    'label' => 'Landfilled per year',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'co2_total',
                    'label' => 'Carbon footprint',
                    'type' => 'number',
                    'suffix' => 't CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.001'],
                    'help' => 'Production at six kilograms per kilogram, plus end-of-life treatment.',
                ],
                [
                    'name' => 'bottles',
                    'label' => 'Same plastic as bottles',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                    'help' => 'At 25 grams for a typical drink bottle.',
                ],
                [
                    'name' => 'oil_barrels',
                    'label' => 'Oil embodied',
                    'type' => 'number',
                    'suffix' => 'barrels',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
            ],
        ],
    ],
    'checks' => [
        ['terms' => ['recycled_share', 'incinerated_share'], 'op' => '<=', 'limit' => 100, 'field' => 'incinerated_share', 'msg' => 'Recycled and burned shares together cannot exceed 100%.'],
    ],
    'formula' => [
        [
            'title' => 'Weight and fate',
            'results' => ['annual_kg' => 'weekly_kg * 52', 'recycled_kg' => 'annual_kg * recycled_share / 100', 'landfill_kg' => 'annual_kg * (100 - recycled_share - incinerated_share) / 100'],
        ],
        [
            'title' => 'Carbon and equivalents',
            'results' => ['co2_total' => 'annual_kg * 6 / 1000 + recycled_kg * 0.5 / 1000 + annual_kg * incinerated_share / 100 * 2.7 / 1000 + landfill_kg * 0.05 / 1000', 'bottles' => 'annual_kg / 0.025', 'oil_barrels' => 'annual_kg * 12 / 1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Two kilograms of plastic waste a week is 104 kilograms a year: 31.2 recycled, 26 burned for energy, and 46.8 landfilled. Its lifetime carbon is 0.7121 tonnes — mostly from making the plastic, not from disposing of it — and it is the same plastic as 4,160 drink bottles, made from 1.25 barrels of oil.</p>
        TXT,
        'sections' => [
            ['title' => 'Two kilograms a week', 'html' => <<<'TXT'
            <p>Two kilograms is a full carrier bag of packaging, which is what a European household of three or four produces in a week once bottles, films, trays and wrappers are counted.</p><p>Multiply by 52 and the number becomes impersonal: 104 kilograms a year. That is more than the average person's body weight in plastic, twice over.</p><p>The figure scales linearly with the weekly box, so the page does not care whether your bag is lighter or heavier than the default. It cares that you know which one it is.</p><p>Weighing a week's plastic is a surprisingly clarifying exercise. Most people guess low, because a bag of crisp packets and films feels like air. A kitchen scale settles the question in a minute, and the number that comes out is usually larger than the guess and smaller than the guilt.</p>
            TXT],
            ['title' => 'Where six kilograms of CO₂ per kilogram comes from', 'html' => <<<'TXT'
            <p>Plastic is fossil carbon with a manufacturing cost attached. About half the mass of the material is carbon from oil or gas, and the process energy to polymerise it is the other half of the footprint.</p><p>Polyethylene and polypropylene are around 2 kilograms of CO₂ per kilogram at the cracker gate; the conversion into a bottle or a film adds another 1 to 2; transport and the retail chain a little more. Six is a fair average for packaging as it reaches a household.</p><p>That is why the production term dominates the panel. Disposal can add or subtract tenths; manufacture sets the total before the item is used once.</p>
            TXT],
            ['title' => 'The fate split matters less than it looks', 'html' => <<<'TXT'
            <p>Recycling is credited at about half a kilogram of CO₂ per kilogram, incineration at 2.7 because burning plastic releases the carbon, and landfill at almost nothing because the material sits there.</p><p>So moving a kilogram from landfill to incineration adds 2.65 kilograms, and moving it to recycling saves 0.45. Neither change touches the six kilograms already spent.</p><p>This is the arithmetic that makes recycling feel underwhelming. It is not that recycling does nothing; it is that the decision that mattered happened at the factory, before the bottle existed.</p>
            TXT],
            ['title' => 'A year in numbers', 'html' => <<<'TXT'
            <p>104 kilograms in, split into 31.2 recycled, 26 burned and 46.8 landfilled. The carbon is 0.7121 tonnes, of which 0.62 is production and the rest is disposal.</p><p>In bottle terms, 4,160 drink bottles at 25 grams each. That is the comparison people find easiest to picture, and it is the one that makes the weekly bag look larger than it does in the kitchen.</p><p>In oil terms, 1.25 barrels — twelve barrels of oil equivalent per tonne of plastic, counting feedstock and process energy. A barrel is 159 litres, so the household figure is about 200 litres of oil a year in packaging alone.</p>
            TXT],
            ['title' => 'The bottle comparison is the useful one', 'html' => <<<'TXT'
            <p>A single-use bottle is the emblem because it is the most visible unit of the problem: 25 grams, used for minutes, made from a material that will outlast the user.</p><p>It is also the easiest item to replace. A refillable bottle carries a one-off manufacturing cost of one to two kilograms of CO₂ and then nothing, which pays back within about 40 fills.</p><p>Everything else in the bag — films, trays, sachets — is harder, because the alternatives are bulk buying, loose produce and a shop that will fill your container. That is a systemic problem wearing a household's clothes.</p>
            TXT],
            ['title' => 'Why the global recycling rate is nine per cent', 'html' => <<<'TXT'
            <p>Most plastic ever made has been landfilled, dumped or leaked. The OECD puts the recycling rate for plastic waste near 9 per cent, and the share has barely moved in two decades despite decades of collection policy.</p><p>The reasons are material, not moral. Multilayer laminates cannot be separated, coloured and additive-loaded plastics have few markets, and recyclate competes with virgin polymer that is cheaper whenever oil is cheap.</p><p>A household at 30 per cent is doing better than the world average and still sending 46.8 kilograms a year to burial. The gap between 30 and 9 is infrastructure, not virtue.</p>
            TXT],
            ['title' => 'Packaging is the bulk of household plastic', 'html' => <<<'TXT'
            <p>Around 40 per cent of European plastic demand is packaging, and packaging is what enters a household. Durable goods — appliances, pipes, car parts — last years and never appear in the kitchen bin.</p><p>That is why household waste is dominated by the fraction that is hardest to recycle: films, sachets, composite trays and small rigid items. Bottles are the minority by weight and the majority by recyclability.</p><p>The policy response has followed the material: deposit schemes for bottles, bans on single-use items, and extended producer responsibility for the rest. Each addresses a slice of the same bag.</p>
            TXT],
            ['title' => 'The export question', 'html' => <<<'TXT'
            <p>Recycled in the panel's arithmetic means recycled, but in the real world a bale collected in Europe may be shipped to Asia, sorted there, and partly burned or dumped when it arrives contaminated.</p><p>Since China's import restrictions, the trade has moved to other countries with weaker controls, and studies tracking the material find a significant share does not become new product.</p><p>So the 30 per cent box is an intention rather than a measurement. If you want the pessimistic version, set recycling to 10 per cent and incineration to 45, which is closer to what happens to European plastic as a whole.</p>
            TXT],
            ['title' => 'What this figure leaves out', 'html' => <<<'TXT'
            <p>Microplastics. The page counts the carbon of the plastic, not the particles that abrade off a tyre, a synthetic fleece or a bottle left in the sun. Those have no climate figure and an unknown ecological one.</p><p>Also absent: the water and land used to make the packaging, the additive chemistry that makes recycling harder, and the litter that never reaches a bin at all.</p><p>And it leaves out the second use. A bottle refilled ten times divides its production carbon by ten; the page models the single-use case because that is what most packaging is.</p>
            TXT],
            ['title' => 'The different plastics in one bag', 'html' => <<<'TXT'
            <p>Six polymers account for almost everything in a household bin. PET is bottles and trays, HDPE is milk jugs and detergent, LDPE is films and bags, PP is tubs and lids, PS is yoghurt pots, PVC is pipes and blister packs.</p><p>Each has a different recycling route and a different market value. PET is worth collecting, HDPE pays for itself, films need a dedicated stream that most kerbside schemes do not have, and polystyrene is usually not worth the sorting.</p><p>The result is that a single bag is not one material but a mixture, and the mixed part is what drags the recycling rate down. Sorting technology has improved; the economics have not.</p>
            TXT],
            ['title' => 'The chemical recycling promise', 'html' => <<<'TXT'
            <p>Pyrolysis and gasification break plastic back into oil or gas, which would in principle handle mixed and contaminated waste. The plants exist; the yields are modest and the energy demand is high.</p><p>Most announced capacity in Europe is not operating at nameplate, and the technology competes for the same feedstock as mechanical recycling. Where it works, it works on polyolefins and struggles with PET and PVC.</p><p>It is worth treating as a possible future term rather than a current option. The page uses mechanical recycling figures because they are what actually happens to the bale.</p>
            TXT],
            ['title' => 'Litter is a different problem', 'html' => <<<'TXT'
            <p>Carbon accounting and litter accounting do not overlap much. The items that leak into the environment — sachets, films, cigarette filters, bottle caps — are a small share of the weight and a large share of the visible damage.</p><p>That is why beach-clean data and bin-weight data tell different stories, and why a policy aimed at leakage looks different from one aimed at tonnage.</p><p>A household can reduce both with the same purchase decisions, but the ranking is different: the lightest items are often the most littered, and the heaviest are usually the ones with a recycling route.</p><p>That mismatch explains a lot of environmental messaging that fails. Telling people to recycle their bottles addresses weight; the bottle caps on the beach are a count problem, and a refund scheme on containers addresses it far more directly than a poster.</p>
            TXT],
            ['title' => 'What a household can actually control', 'html' => <<<'TXT'
            <p>Three levers are within reach: buy less packaging, reuse what you can, and sort what is left. In carbon terms they rank in that order, and the first is worth an order of magnitude more than the third.</p><p>Bulk buying, refill shops and loose produce cut the production term, which is where the six kilograms live. Reuse cuts it further by dividing one item's manufacture across many uses.</p><p>Sorting is a civic duty with a small climate reward, and pretending otherwise is why recycling messaging has lost credibility. The page keeps the three terms separate so the ranking stays visible.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Three inputs and six outputs, all of them multiplications and percentage splits.</p><ul><li><strong>Annual weight</strong> = weekly weight × 52</li><li><strong>Recycled</strong> = annual weight × recycled share ÷ 100</li><li><strong>Landfilled</strong> = annual weight × (100 − recycled − incinerated) ÷ 100</li><li><strong>Carbon</strong> = annual × 6 ÷ 1000 + recycled × 0.5 ÷ 1000 + incinerated × 2.7 ÷ 1000 + landfilled × 0.05 ÷ 1000</li><li><strong>Bottles</strong> = annual weight ÷ 0.025</li><li><strong>Barrels</strong> = annual weight × 12 ÷ 1000</li></ul><p>Inverted, the weekly box is the only one you can change without moving house. Everything else is a property of the waste system you happen to live in.</p>
            TXT],
            ['title' => 'What would actually move the number', 'html' => <<<'TXT'
            <p>Buying less packaging moves the production term, which is 90 per cent of the total. That means loose produce, refills, concentrates and a shop that lets you bring a container.</p><p>Reusing moves it too, and more cheaply: a refilled bottle is one bottle's production carbon spread across twenty uses. The page models 52 weeks of single use because that is the default behaviour, not the only one.</p><p>Recycling matters, but at 0.5 kilograms of CO₂ per kilogram it is a rounding term next to the 6 kilograms of manufacture. Treat it as the last step rather than the answer.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much plastic does an average person throw away?', 'a' => <<<'TXT'
            Around 30 to 40 kilograms a year in Europe, or about 0.7 kilograms a week. The page's default of two kilograms a week is a household figure rather than a personal one.
            TXT],
            ['q' => 'How much CO₂ is in a kilogram of plastic?', 'a' => <<<'TXT'
            About 6 kilograms of CO₂ equivalent for packaging as delivered, counting feedstock and process energy. Disposal adds a fraction of that — 2.7 for incineration, 0.5 for recycling, almost nothing for landfill.
            TXT],
            ['q' => 'Does recycling actually reduce the footprint?', 'a' => <<<'TXT'
            Barely, in carbon terms: recycling a kilogram saves about 0.45 kilograms of CO₂ against landfill, on a material that cost 6 kilograms to make. It saves material and litter, which are different problems.
            TXT],
            ['q' => 'How many bottles is that?', 'a' => <<<'TXT'
            104 kilograms is 4,160 bottles at 25 grams each. Bottles are the easiest item to replace with a refillable one, which pays back its manufacturing carbon in about 40 fills.
            TXT],
            ['q' => 'How much oil is in plastic packaging?', 'a' => 'About 12 barrels of oil equivalent per tonne once feedstock and process energy are counted, so 104 kilograms embodies 1.25 barrels — roughly 200 litres.'],
            ['q' => 'Why is the global recycling rate so low?', 'a' => <<<'TXT'
            Because most plastic is multilayered, coloured or contaminated, and recyclate competes with virgin polymer that is cheaper whenever oil is. The OECD figure is near 9 per cent and has barely moved in twenty years.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
