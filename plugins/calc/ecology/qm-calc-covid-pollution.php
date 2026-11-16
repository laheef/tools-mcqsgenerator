<?php

/**
 * COVID-19 Waste Calculator
 * /ecology/covid-pollution
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'COVID-19 Waste Calculator',
    'meta' => ['title' => 'COVID-19 Waste Calculator: Masks and Gloves by Year', 'description' => 'Add up the masks and gloves a household or a community throws away in a year, counted as items, as kilos, as ten-kilo bin bags and as whole lorry loads.', 'h1' => 'COVID-19 Waste Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'Protective equipment used',
            'fields' => [
                [
                    'name' => 'masks_per_day',
                    'label' => 'Masks per person per day',
                    'type' => 'number',
                    'default' => '1',
                    'rounding' => ['omni', '0.1'],
                    'min' => '0',
                ],
                [
                    'name' => 'gloves_per_day',
                    'label' => 'Gloves per person per day',
                    'type' => 'number',
                    'default' => '0.6',
                    'rounding' => ['omni', '0.1'],
                    'min' => '0',
                ],
                [
                    'name' => 'people',
                    'label' => 'People',
                    'type' => 'number',
                    'default' => '4',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                ],
                [
                    'name' => 'days',
                    'label' => 'Days in the period',
                    'type' => 'number',
                    'default' => '365',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                ],
            ],
        ],
        [
            'title' => 'Weights',
            'fields' => [
                [
                    'name' => 'mask_weight',
                    'label' => 'Weight of one mask',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '3.5',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'A three-layer surgical mask weighs three to four grams.',
                ],
                [
                    'name' => 'glove_weight',
                    'label' => 'Weight of one glove',
                    'type' => 'number',
                    'suffix' => 'g',
                    'default' => '2.5',
                    'rounding' => ['omni', '0.1'],
                ],
            ],
        ],
        [
            'title' => 'What the year produces',
            'fields' => [
                [
                    'name' => 'items',
                    'label' => 'Items thrown away',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'waste_kg',
                    'label' => 'Weight of that waste',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'bin_bags',
                    'label' => 'Bin bags at 10 kg each',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'community_tonnes',
                    'label' => 'A town of 100,000 people',
                    'type' => 'number',
                    'suffix' => 't',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                    'help' => 'The same habit multiplied across a hundred thousand people.',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Items',
            'results' => ['items' => '(masks_per_day + gloves_per_day) * people * days'],
        ],
        [
            'title' => 'Weight',
            'results' => ['waste_kg' => '(masks_per_day * mask_weight + gloves_per_day * glove_weight) * people * days / 1000', 'bin_bags' => 'waste_kg / 10', 'community_tonnes' => 'waste_kg / people * 100000 / 1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Four people wearing one mask a day each and 0.6 of a glove apiece produce 2,336 items in a year: 7.3 kilograms of surgical mask and nitrile glove. That is 0.73 of a ten-kilogram bin bag for the household, and 182.5 tonnes if the same habit were repeated across a town of a hundred thousand people. The arithmetic is (masks + gloves) × people × days for the items, and a weighted average of the two item weights for the mass.</p>
        TXT,
        'sections' => [
            ['title' => 'What the pandemic added to the waste stream', 'html' => <<<'TXT'
            <p>Before 2020, surgical masks were a clinical consumable. Within a few months they became a domestic one, worn in shops, schools and queues and then dropped in a general waste bin or, too often, on the pavement. Estimates of the extra plastic entering the environment during the first two years of the pandemic run into millions of tonnes.</p><p>The composition is what makes it awkward. A three-layer surgical mask is polypropylene non-woven fabric, with ear loops of elastic and a wire nose clip. Nitrile gloves are a synthetic rubber. Neither is recyclable in a normal kerbside stream, and both are light enough to blow out of bins and skips.</p><p>This page counts one narrow slice of that: the routine, household-scale use of masks and gloves. It does not count tests, clinical waste, packaging, or the disposable vapes that arrived in the same period and created a parallel problem of their own.</p><p>Which is the reason the form asks for a rate rather than a total. Rates are what people can report honestly; totals are what municipalities publish, and the two rarely match because household bins and street litter are counted by different departments.</p>
            TXT],
            ['title' => 'Counting items per person', 'html' => <<<'TXT'
            <p>The form asks for a daily rate per person, because that is the figure people can actually estimate. One mask a day is a full-time habit; half a glove a day models someone who wears gloves for shopping twice a week rather than in a clinical setting.</p><p>Multiplying by people and days converts a rate into a count. The page keeps the two item types separate until the end, because their weights differ by only a gram and mixing them early would hide which one dominates.</p><p>If your household is mixed — one person in a clinical job wearing masks and gloves all day, three people working from home — run the page twice with the two rates and add the results. That is more honest than averaging the rates into a figure that describes nobody.</p>
            TXT],
            ['title' => 'A household of four, worked through', 'html' => <<<'TXT'
            <p>Items: 1 mask plus 0.6 gloves is 1.6 items per person per day, times four people is 6.4 items a day, times 365 is 2,336. That is twenty-eight masks a week across the household, which matches what a family of four in a mask mandate actually gets through.</p><p>Mass: one mask at 3.5 grams plus 0.6 of a glove at 2.5 grams is 3.5 + 1.5 = 5.0 grams per person per day. Times four people is 20 grams a day, times 365 is 7.3 kilograms. A bin bag holds ten kilos, so the household produces 0.73 bags of this waste in a year — less than one bag, which is why the problem is distribution rather than volume.</p><p>The community box scales the same habit to a hundred thousand people: 7.3 kilograms divided by four people is 1.825 kilograms per person per year, times a hundred thousand is 182.5 tonnes. That is seven lorry loads, and it is only the household-scale use.</p>
            TXT],
            ['title' => 'What a mask is made of, and what that means', 'html' => <<<'TXT'
            <p>Three layers of melt-blown and spun-bond polypropylene, welded at the edges, with elastic ear loops and a strip of aluminium or coated steel across the nose. The whole thing weighs three to four grams, which is a tenth of a plastic bag and a fraction of a bottle.</p><p>Polypropylene is recyclable in principle and almost never recycled in practice, because collection systems are not set up for small, potentially contaminated items. The material's fate is incineration with energy recovery or landfill, and in too many places it is litter.</p><p>Degradation is slow. Polypropylene does not biodegrade; sunlight makes it brittle and it fragments into microplastics. The ear loops are worse in one specific way: they catch around wildlife, and there are documented cases of birds and small mammals entangled in them.</p>
            TXT],
            ['title' => 'Where the waste went', 'html' => <<<'TXT'
            <p>Three destinations, in rough order of volume: general municipal waste, clinical waste where the item was used in a health setting, and the environment. The third is smaller by mass and larger by consequence, because a mask in a river is not inert.</p><p>Municipal incinerators handle polypropylene well — it burns hot and cleanly, and the energy is recoverable. Landfill is less good and locks the material away for decades. The environmental fraction is the one that produces the photographs, and beach-clean data shows masks appearing in surveys within months of the first mandates.</p><p>Clinical waste is a separate and more tightly regulated stream. Its carbon and cost are higher per kilogram because it is incinerated at high temperature with dedicated logistics, which is appropriate: the reason to treat it differently is infection, not material.</p>
            TXT],
            ['title' => 'The community multiplier', 'html' => <<<'TXT'
            <p>Scaling from a household to a town is where the numbers stop being domestic. A hundred thousand people at these rates produce 173 tonnes a year; a city of ten million produces 17,350 tonnes, which starts to compete with the municipal budget for street cleaning and waste collection.</p><p>The multiplier also exposes the shape of the problem. Household mask waste is one bag a year per family — invisible in a bin audit. Public litter is a different matter: masks dropped at bus stops and shop doors are collected by hand, and the cost per item is an order of magnitude above the cost per tonne of bin collection.</p><p>That is why cities that coped well during mask mandates did two things at once: free bins at transport hubs, and public messaging that a mask belongs in a bin rather than on a bench.</p>
            TXT],
            ['title' => 'Reducing it without giving up protection', 'html' => <<<'TXT'
            <p>The first lever is reuse where it is safe. A cloth mask worn for a morning and washed is a different object from a surgical mask used once, and in low-risk settings it does the job with a fraction of the plastic.</p><p>The second is correct disposal. A mask in a general waste bin is fine; a mask in a recycling bin contaminates the stream; a mask on the pavement becomes litter. Cutting the ear loops before binning removes the entanglement risk for wildlife at no cost.</p><p>The third is procurement at scale. Hospitals and care homes that switched to reusable masks and gowns cut their consumable volume substantially, and the infection evidence for reusable surgical gowns is better than most people assume.</p>
            TXT],
            ['title' => 'How this compares with a household\'s other waste', 'html' => <<<'TXT'
            <p>A person in Europe generates roughly 500 kilograms of municipal waste a year. At 1.7 kilograms, the mask and glove habit is three tenths of one per cent of that — far too small to matter in a tonnage report.</p><p>Two things make it matter anyway. The first is that the material is not recyclable and does not degrade, so it is a permanent addition rather than a circulating one. The second is that a large share of it escapes the waste system entirely, and escaped waste costs far more per item to collect than binned waste does.</p><p>Put the two halves together and the pattern is familiar from cigarette butts and plastic bags: negligible mass, disproportionate cost, because the object is small, light and used away from a bin.</p>
            TXT],
            ['title' => 'What the river surveys found', 'html' => <<<'TXT'
            <p>Within a year of the first mask mandates, masks were appearing in urban litter surveys and in river cleanup tallies. A widely cited estimate put the pandemic's additional plastic entering the environment at several million tonnes, with medical waste the largest single contributor.</p><p>The mechanism is mundane. A mask dropped on a street is light enough to be lifted by wind and washed into a drain by rain; from the drain it reaches a watercourse, where it fragments into microfibres over months. Polypropylene microfibres are already a major component of microplastic in rivers, and masks add a concentrated local source.</p><p>The ear loops do a specific kind of harm. They are exactly the size to slip over a bird's head or a small mammal's body, and entanglement cases were reported in several cities during the mandate period. Cutting the loops before disposal costs nothing and removes that risk.</p>
            TXT],
            ['title' => 'What a council can actually do', 'html' => <<<'TXT'
            <p>Three measures have evidence behind them. Bins at transport hubs and shop entrances, because proximity beats messaging. Public messaging that names the bin rather than the virtue, because a mask on a bench reads as normal until someone says otherwise. And collection contracts that anticipate the volume, since a litter-picking crew that arrives weekly cannot keep up with a daily accumulation.</p><p>None of these is expensive relative to the cost of not doing them. A mask in a drain costs more to remove than a mask in a bin, and a mask in a river cannot be removed at all.</p><p>For a household, the equivalent is a small bin by the front door. Most mask litter is not indifference; it is the absence of a bin at the moment the mask comes off.</p>
            TXT],
            ['title' => 'The arithmetic rearranged', 'html' => <<<'TXT'
            <p>Any box on the form can be the unknown. The reverse questions are mostly about budgets and targets: how many items a waste contract must handle, or what daily rate a given tonnage implies.</p><ul><li><strong>Items</strong> = (masks + gloves) × people × days</li><li><strong>Weight</strong> = (masks × mask weight + gloves × glove weight) × people × days ÷ 1000</li><li><strong>Bin bags</strong> = weight ÷ 10</li><li><strong>Community tonnes</strong> = weight ÷ people × 100,000 ÷ 1000</li><li><strong>Masks per day</strong> = (weight ÷ (people × days) × 1000 − gloves × glove weight) ÷ mask weight</li><li><strong>Days</strong> = items ÷ ((masks + gloves) × people)</li></ul><p>The masks-per-day row is the useful one in a waste audit: weigh a week's collected material, and the row tells you what daily rate produced it.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much waste does one person\'s mask habit create?', 'a' => <<<'TXT'
            At one surgical mask a day, about 1.28 kilograms a year — 365 items of three and a half grams. That is small per person and large across a city, which is why the page prints both a household figure and a hundred-thousand-person figure.
            TXT],
            ['q' => 'Are surgical masks recyclable?', 'a' => <<<'TXT'
            In principle the polypropylene is, in practice almost never. They are small, potentially contaminated and not accepted by kerbside schemes, so they go to incineration or landfill. Putting them in a recycling bin contaminates the other material.
            TXT],
            ['q' => 'Is a reusable cloth mask better for the environment?', 'a' => <<<'TXT'
            Generally yes, after a few dozen wears, because the plastic is spent once rather than daily. The comparison depends on washing: a cloth mask washed at high temperature after every use carries a carbon cost of its own, though it remains below the disposable route.
            TXT],
            ['q' => 'Why does the calculator separate masks from gloves?', 'a' => <<<'TXT'
            Because the two have different weights, different usage rates and different disposal routes. Keeping them apart until the totals lets you model a household where one person wears gloves and the others do not.
            TXT],
            ['q' => 'Does this include test kits and vaccines packaging?', 'a' => <<<'TXT'
            No. Lateral flow tests, vaccine vials, syringes and their packaging are a separate stream with its own mass and its own clinical-waste handling, and the page's two boxes cannot express them.
            TXT],
            ['q' => 'How should a used mask be thrown away?', 'a' => <<<'TXT'
            Into general waste, ideally in a closed bag, with the ear loops cut. Not into recycling, and not on the ground. For a household with an infection, double-bagging and a sealed bin are the usual advice.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
