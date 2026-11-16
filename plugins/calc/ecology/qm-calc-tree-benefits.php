<?php

/**
 * Tree Benefits Calculator
 * /ecology/tree-benefits
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Tree Benefits Calculator',
    'meta' => ['title' => 'Tree Benefits Calculator: Carbon, Water, Shade', 'description' => 'Estimate the carbon a stand of trees stores and adds each year, using trunk diameter rather than a flat per-tree figure, plus the rain they intercept.', 'h1' => 'Tree Benefits Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The trees',
            'fields' => [
                [
                    'name' => 'trees',
                    'label' => 'Number of trees',
                    'type' => 'number',
                    'default' => '10',
                    'rounding' => ['standard', '0'],
                    'min' => '0',
                ],
                [
                    'name' => 'diameter',
                    'label' => 'Trunk diameter at chest height',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '30',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'Measured 1.3 metres above the ground.',
                ],
                [
                    'name' => 'growth',
                    'label' => 'Diameter growth per year',
                    'type' => 'number',
                    'suffix' => 'cm',
                    'default' => '0.5',
                    'rounding' => ['omni', '0.01'],
                    'help' => 'Street trees manage 0.3 to 0.8; a young oak in good soil more.',
                ],
                [
                    'name' => 'years',
                    'label' => 'Years ahead',
                    'type' => 'number',
                    'default' => '10',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                ],
                [
                    'name' => 'canopy',
                    'label' => 'Crown area per tree',
                    'type' => 'number',
                    'suffix' => 'm²',
                    'default' => '25',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'A mature street tree is 20 to 50 square metres.',
                ],
            ],
        ],
        [
            'title' => 'What they do',
            'fields' => [
                [
                    'name' => 'biomass',
                    'label' => 'Above-ground biomass now',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'co2_stored',
                    'label' => 'Carbon dioxide stored',
                    'type' => 'number',
                    'suffix' => 't',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                    'help' => 'Half of dry biomass is carbon, and each kilogram of carbon is 3.67 of CO₂.',
                ],
                [
                    'name' => 'co2_per_year',
                    'label' => 'Carbon dioxide added per year',
                    'type' => 'number',
                    'suffix' => 't',
                    'readonly' => true,
                    'rounding' => ['omni', '0.001'],
                ],
                [
                    'name' => 'canopy_total',
                    'label' => 'Crown area in total',
                    'type' => 'number',
                    'suffix' => 'm²',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'rain',
                    'label' => 'Rain intercepted per year',
                    'type' => 'number',
                    'suffix' => 'litres',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                    'help' => 'At 350 litres per square metre of crown, a temperate figure.',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Biomass from diameter',
            'results' => ['biomass' => 'trees * 0.25 * diameter ^ 2.5', 'co2_stored' => 'biomass * 0.5 * 3.67 / 1000'],
        ],
        [
            'title' => 'Growth and services',
            'results' => ['co2_per_year' => '(trees * 0.25 * (diameter + growth * years) ^ 2.5 - biomass) * 0.5 * 3.67 / 1000 / years', 'canopy_total' => 'trees * canopy', 'rain' => 'trees * canopy * 350'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Ten trees with 30-centimetre trunks hold 12,324 kilograms of above-ground biomass and 22.61 tonnes of carbon dioxide. If each trunk thickens half a centimetre a year for ten years they add 1.063 tonnes a year, and their 250 square metres of crown intercept 87,500 litres of rain.</p>
        TXT,
        'sections' => [
            ['title' => 'Why diameter, not a flat per-tree number', 'html' => <<<'TXT'
            <p>Most tree calculators multiply a count by a fixed figure — 20 kilograms of CO₂ a year, say — and that figure is wrong for almost every tree. A sapling and a mature oak differ by three orders of magnitude in biomass.</p><p>Diameter is the variable that carries the information. A tree's mass scales roughly with the 2.5 power of its trunk diameter, so a 40-centimetre tree holds twice what a 30-centimetre one does, not 1.3 times.</p><p>Measure at chest height, on the uphill side, in centimetres. For a multi-stemmed tree, measure each stem and treat them as separate trees. It takes a tape and a minute, and it turns a guess into a figure you can defend.</p>
            TXT],
            ['title' => 'The allometry equation', 'html' => <<<'TXT'
            <p>The form uses above-ground dry biomass = 0.25 × diameter<sup>2.5</sup> kilograms, with diameter in centimetres. It is a common generalised allometric equation for temperate trees and sits within about 30 per cent of species-specific equations.</p><p>Half of dry biomass is carbon, and each kilogram of carbon is 3.67 kilograms of CO₂ once the oxygen is counted. So 12,324 kilograms of biomass holds 6,162 of carbon and 22.61 tonnes of CO₂.</p><p>Roots are not included. They typically add 20 to 30 per cent to total biomass, so the true figure is higher — and much harder to verify without digging a tree up, which is why nobody does it except in a research forest with a very large spade.</p>
            TXT],
            ['title' => 'Ten trees at thirty centimetres, worked through', 'html' => <<<'TXT'
            <p>0.25 × 30<sup>2.5</sup> is 1,232 kilograms per tree, so ten trees hold 12,324 kilograms. Times 0.5 for carbon and 3.67 for the CO₂ equivalent gives 22.61 tonnes.</p><p>That is the standing stock, not the annual benefit. A mature tree is mostly a warehouse; a young tree is mostly a factory.</p><p>Reported twice, these two numbers are usually confused. Planting a tree does not remove 22.61 tonnes this year; it starts a process that will, over decades, if the tree survives and if nothing eats it, cuts it or builds on its roots.</p>
            TXT],
            ['title' => 'Growth: half a centimetre a year', 'html' => <<<'TXT'
            <p>Ten years at 0.5 centimetres takes the trunk to 35, and 0.25 × 35<sup>2.5</sup> is 1,812 kilograms per tree. The stand gains 5,795 kilograms of biomass, which is 10.6 tonnes of CO₂ — 1.063 tonnes a year.</p><p>That is the same order as the flat figures often quoted, which is reassuring. A growing tree of that size really does take up a tonne a year.</p><p>But the uptake is not linear. A tree growing from 10 to 20 centimetres adds less biomass than one growing from 30 to 40, because the exponent works on the size rather than the increment.</p>
            TXT],
            ['title' => 'Young and old trees are different instruments', 'html' => <<<'TXT'
            <p>A young, fast-growing tree sequesters more per year. An old tree stores more in total and sequesters slowly, but it also holds soil carbon, supports fungi and provides the cavities that wildlife uses.</p><p>Planting a sapling to offset emissions is therefore a promise about the 2050s, not about this year. Claims that a few hundred saplings offset a flight in the same decade are arithmetic fiction.</p><p>Protecting an existing mature tree is usually worth more, in carbon terms, than planting twenty saplings — and it happens immediately rather than in thirty years.</p>
            TXT],
            ['title' => 'Rain interception and the drain', 'html' => <<<'TXT'
            <p>A crown intercepts rain on its leaves and branches, some of which evaporates before it reaches the ground. In a temperate city the figure is roughly 350 litres per square metre of crown per year.</p><p>250 square metres is 87,500 litres — 87.5 cubic metres that does not enter the storm drain. That is a real benefit for a city with a combined sewer that overflows in heavy rain.</p><p>The figure varies with rainfall: 600 millimetres a year over a 25-square-metre crown is 15,000 litres before any interception efficiency is applied. The 350 figure already discounts for the rain that gets through.</p>
            TXT],
            ['title' => 'Shade, and the energy it saves', 'html' => <<<'TXT'
            <p>A tree shading a west-facing wall cuts afternoon heat gain enough to reduce air conditioning by 10 to 30 per cent in a warm climate. In a cool climate the same tree can increase heating demand by blocking winter sun.</p><p>Deciduous trees are the standard solution: leaves in summer, bare branches in winter. Evergreens on the south side are a mistake in a heating climate and a benefit in a cooling one.</p><p>The energy effect is hard to generalise and easy to overstate. It is worth a paragraph in a planning document and not worth a precise number in a calculator.</p>
            TXT],
            ['title' => 'Where the equation fails', 'html' => <<<'TXT'
            <p>Species differ. A poplar is less dense than an oak of the same diameter; a fast-grown plantation tree is less dense than a slow-grown one, and density is exactly what the equation ignores.</p><p>Urban stress matters too. Street trees grow more slowly than park trees, and a compacted root zone can halve the growth rate entered in the form.</p><p>And the equation describes above-ground biomass only. Roots, litter and the soil carbon around the tree are all real and all outside the calculation.</p>
            TXT],
            ['title' => 'What a tree is worth beyond carbon', 'html' => <<<'TXT'
            <p>Air filtration, shade, habitat, water management and — in the studies that try to price it — a measurable effect on property values and on the temperature of a street on a hot afternoon.</p><p>None of that enters a carbon calculator, and all of it enters a decision about whether to plant a tree or put a car park there.</p><p>The carbon case for urban trees is modest. The argument for urban trees is not primarily a carbon argument, and pretending otherwise weakens it: a tree that is sold as a carbon offset and delivers shade is a tree that gets planted for the wrong reason and cut down when the ledger is audited.</p>
            TXT],
            ['title' => 'Measuring a tree without hurting it', 'html' => <<<'TXT'
            <p>Diameter at breast height is measured 1.3 metres above the ground on the uphill side. A fabric tape around the trunk gives the circumference; divide by 3.14 for the diameter.</p><p>On a slope, measure from the uphill ground line. On a leaning tree, measure perpendicular to the trunk. On a forked tree below chest height, treat each stem as its own tree.</p><p>Growth rate is harder. A dendrometer band measures a few millimetres of change directly; otherwise use an increment borer, which takes a core and is best left to a forester with a permit and a steady hand.</p>
            TXT],
            ['title' => 'Species, density and the 30 per cent error', 'html' => <<<'TXT'
            <p>Wood density runs from about 350 kilograms per cubic metre for poplar to 900 for oak. The generalised equation splits the difference, which is why it carries a 20 to 30 per cent error against species-specific equations.</p><p>For a rough calculation that is fine. For a carbon project that issues credits, it is not: the difference between 20 and 30 per cent of a stand's biomass is the difference between a viable project and an overstated one.</p><p>Published allometric equations exist for most commercial and common species. Use the general one to size a project and a specific one to report it.</p>
            TXT],
            ['title' => 'Shade, heat and the street', 'html' => <<<'TXT'
            <p>The urban heat island is worth 2 to 5 degrees on a summer night, and street trees are one of the few measures that reduces it without using energy.</p><p>Transpiration cools the air around a crown, and shade cools the surface below it. The measured effect is a few degrees in the shade and a fraction of a degree at street scale, which sounds small until you multiply by a heatwave.</p><p>This is the benefit that keeps urban forestry funded, and it is not the carbon benefit. The panel does not model it.</p>
            TXT],
            ['title' => 'Planting for survival', 'html' => <<<'TXT'
            <p>A planted tree in a city has a hard life: compacted soil, restricted roots, salt in winter, drought in summer and a strimmer at the base. Survival to maturity in urban planting schemes is often 50 to 70 per cent.</p><p>Bigger nursery stock survives better than whips and costs ten times more. A tree pit with proper volume — 6 to 12 cubic metres of soil — matters more than the size of the tree put in it.</p><p>Which is why the carbon arithmetic of planting is so uncertain. The equation assumes the tree lives, and the planting budget should assume some of them do not.</p>
            TXT],
            ['title' => 'Soil, roots and the part nobody counts', 'html' => <<<'TXT'
            <p>Beneath every tree is a fungal network and a layer of soil carbon that took decades to accumulate. Some studies find that soil carbon under a mature tree rivals the tree's own biomass.</p><p>It is also easy to lose. Disturbance, compaction or a change of land use releases it in a season, which is why protecting a tree's root zone matters as much as protecting the trunk.</p><p>The page counts above-ground biomass because that is what can be measured with a tape. Treat the total as a floor rather than an estimate.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Five inputs, five outputs, one exponent.</p><ul><li><strong>Biomass</strong> = trees × 0.25 × diameter<sup>2.5</sup></li><li><strong>Stored CO₂</strong> = biomass × 0.5 × 3.67 ÷ 1000</li><li><strong>Annual uptake</strong> = (biomass at diameter + growth × years − biomass) × 0.5 × 3.67 ÷ 1000 ÷ years</li><li><strong>Crown area</strong> = trees × crown area per tree</li><li><strong>Rain intercepted</strong> = crown area × 350</li></ul><p>Inverted, the diameter box answers the useful question: how big does a tree need to be before it stores a tonne of CO₂? About 19 centimetres, which is a tree of fifteen to twenty years.</p>
            TXT],
            ['title' => 'Should you plant trees to offset?', 'html' => <<<'TXT'
            <p>Planting is cheap, slow and uncertain. A sapling has perhaps a 60 per cent chance of reaching maturity in an urban setting, and the carbon arrives in the 2040s.</p><p>Reducing emissions is immediate and certain. The order should be: emit less, then protect existing forest, then plant — and only claim the sequestration when the trees are measurably there.</p><p>The page gives the arithmetic for a stand of trees that already exists. That is the honest use of it: a measurement of standing biomass, not a promise about the future of a sapling in a car park.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much CO₂ does a tree absorb in a year?', 'a' => <<<'TXT'
            A healthy tree of 30 to 40 centimetres trunk diameter takes up roughly half a tonne to a tonne a year at the growth rates in the form. A young sapling absorbs a few kilograms.
            TXT],
            ['q' => 'How much CO₂ is stored in a mature tree?', 'a' => <<<'TXT'
            At 30 centimetres the equation gives about 2.3 tonnes of CO₂ per tree, and 22.61 tonnes for the ten trees on the page. A large mature oak can hold ten times that.
            TXT],
            ['q' => 'Why use trunk diameter rather than height?', 'a' => <<<'TXT'
            Because biomass scales with diameter to a power of about 2.5, which is a strong, measurable relationship. Height is harder to measure accurately and correlates less tightly with mass.
            TXT],
            ['q' => 'Does the calculator include roots?', 'a' => 'No. It models above-ground dry biomass. Roots and soil carbon add roughly 20 to 30 per cent, so the true figure is somewhat higher than the panel shows.'],
            ['q' => 'How much rain does a tree intercept?', 'a' => 'About 350 litres per square metre of crown per year in a temperate climate. 250 square metres of crown intercepts 87,500 litres.'],
            ['q' => 'Can tree planting offset a flight?', 'a' => <<<'TXT'
            Eventually and approximately. A one-tonne flight needs a tonne of uptake, which is one mature tree for a year or a stand of saplings for decades — with a survival rate that is not 100 per cent.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
