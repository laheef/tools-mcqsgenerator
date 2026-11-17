<?php

/**
 * Vegan Footprint Calculator
 * /ecology/vegan-footprint
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Vegan Footprint Calculator',
    'meta' => ['title' => 'Vegan Footprint Calculator: Diet Change in CO2', 'description' => 'Compare the annual food carbon of one diet with another, then read the saving as car kilometres, as tree-years and as a whole decade of eating differently.', 'h1' => 'Vegan Footprint Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'Two diets',
            'fields' => [
                [
                    'name' => 'diet_now',
                    'label' => 'Your diet now',
                    'type' => 'select',
                    'options' => [
                        'Heavy red meat' => '3.3',
                        'Average omnivore' => '2.5',
                        'Poultry-led' => '1.9',
                        'Pescatarian' => '1.7',
                        'Vegetarian' => '1.4',
                        'Vegan' => '1.0',
                    ],
                    'rounding' => ['omni', '0.1'],
                    'help' => 'Tonnes of CO₂ equivalent per person per year, from food only.',
                ],
                [
                    'name' => 'diet_new',
                    'label' => 'The diet you are considering',
                    'type' => 'select',
                    'options' => [
                        'Heavy red meat' => '3.3',
                        'Average omnivore' => '2.5',
                        'Poultry-led' => '1.9',
                        'Pescatarian' => '1.7',
                        'Vegetarian' => '1.4',
                        'Vegan' => '1.0',
                    ],
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'years',
                    'label' => 'Years to look ahead',
                    'type' => 'number',
                    'default' => '10',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                ],
            ],
        ],
        [
            'title' => 'What the change is worth',
            'fields' => [
                [
                    'name' => 'co2_now',
                    'label' => 'Carbon now',
                    'type' => 'number',
                    'suffix' => 't/yr',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'co2_new',
                    'label' => 'Carbon after the change',
                    'type' => 'number',
                    'suffix' => 't/yr',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'saving',
                    'label' => 'Saving per year',
                    'type' => 'number',
                    'suffix' => 't CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'decade',
                    'label' => 'Saving over the period',
                    'type' => 'number',
                    'suffix' => 't CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
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
                    'label' => 'Tree-years to absorb a year\'s saving',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'The two diets',
            'results' => ['co2_now' => 'diet_now', 'co2_new' => 'diet_new'],
        ],
        [
            'title' => 'The difference',
            'results' => ['saving' => 'co2_now - co2_new', 'decade' => 'saving * years', 'car_km' => 'saving * 1000 / 0.12', 'trees' => 'saving * 1000 / 21'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>An average omnivore's food emits about 2.5 tonnes of CO₂ equivalent a year; a vegan diet about 1. The change saves 1.5 tonnes a year, 15 tonnes over a decade — 12,500 kilometres of driving a year, and 71.4 tree-years of absorption.</p>
        TXT,
        'sections' => [
            ['title' => 'Where the six diet figures come from', 'html' => <<<'TXT'
            <p>The numbers in the select boxes are per-person food emissions for the whole diet, built from the largest life-cycle meta-analysis of food production — roughly 38,000 farms in 119 countries.</p><p>Heavy red meat at 3.3 tonnes a year, average omnivore 2.5, poultry-led 1.9, pescatarian 1.7, vegetarian 1.4 and vegan 1.0. Food only; flights, heating and clothing are elsewhere.</p><p>The spread between the extremes is 3.3 to 1.0, which is a factor of three. That is large enough to matter and small enough that it is not the whole of a carbon footprint.</p>
            TXT],
            ['title' => 'Food is about a quarter of the total', 'html' => <<<'TXT'
            <p>Global food systems account for 26 to 34 per cent of greenhouse gas emissions depending on where the boundary is drawn: land use change, methane from livestock, fertiliser, transport, processing, retail and waste.</p><p>For an individual in a rich country, food is typically 15 to 25 per cent of the footprint, behind housing and travel. It is the lever most directly under personal control, which is why it attracts attention out of proportion to its share.</p><p>The comparison in the panel is a fair one because both sides count the same things — production, land use change and processing, but not the shopping trip. A diet comparison that includes transport on one side and not the other is not a comparison.</p>
            TXT],
            ['title' => 'Omnivore to vegan, worked through', 'html' => <<<'TXT'
            <p>2.5 tonnes to 1 is 1.5 tonnes a year. Divided by 0.12 kilograms per kilometre, that is 12,500 kilometres — more than most people drive.</p><p>Over the ten-year period in the form it is 15 tonnes, which is roughly the annual footprint of four Europeans, or one and a half round trips to Australia.</p><p>Expressed in trees, 71.4 mature trees working for a year would absorb one year's saving. Expressed in money, plant proteins are usually cheaper per gram, so the saving is financial as well as atmospheric — and unlike most carbon measures, this one pays for itself at the supermarket.</p>
            TXT],
            ['title' => 'Most of the win is in the first step', 'html' => <<<'TXT'
            <p>Omnivore to poultry-led saves 0.6 tonnes, a quarter of the total. Poultry-led to vegetarian saves another 0.5. Vegetarian to vegan saves 0.4.</p><p>Which means a household that simply stops eating beef and lamb gets most of the benefit with the least change. The last step — dropping dairy and eggs — is the hardest socially and the smallest arithmetically, which is the opposite of how the public argument usually runs.</p><p>Anyone arguing about which diet is best is usually arguing about the last 0.4 tonnes. The first 1.5 are not controversial.</p>
            TXT],
            ['title' => 'What a vegan diet still emits', 'html' => <<<'TXT'
            <p>1 tonnes is not zero. It is the emissions of growing, processing, packaging, transporting and refrigerating plants, plus the land-use change behind some of them.</p><p>Air-freighted asparagus, out-of-season tomatoes from a heated greenhouse, and deforestation-linked soy all carry more than their field would suggest. A vegan diet of flown produce can beat a vegetarian diet of local dairy only narrowly.</p><p>The rule is the same as everywhere else in food: what the thing is matters more than how far it travelled, and how it was grown matters most of all.</p>
            TXT],
            ['title' => 'Land is the bigger difference', 'html' => <<<'TXT'
            <p>Food carbon and food land are correlated but not identical. Livestock uses about 77 per cent of agricultural land and produces 18 per cent of calories.</p><p>A vegan diet needs 1,500 to 2,000 square metres of land per person per year; an average omnivore diet needs 4,000 to 5,000. The difference is the pasture and the feed crop.</p><p>That land figure is why dietary change keeps appearing in biodiversity scenarios. It is the mechanism by which a diet spares habitat, and the panel's carbon boxes only gesture at it.</p>
            TXT],
            ['title' => 'The nutrition question', 'html' => <<<'TXT'
            <p>A well-planned vegan diet meets protein needs easily — pulses, grains, nuts and soy together provide more than enough. Vitamin B12 is the one nutrient that must be supplemented or taken from fortified food.</p><p>Iron and zinc are less bioavailable from plants, and iron intake needs to be higher. Calcium comes from fortified plant milks and from greens; iodine from fortified salt.</p><p>None of this is an argument against the diet; all of it is an argument against doing it carelessly. The carbon saving is real, the nutritional risk is manageable with information, and a doctor or a dietitian is the right person to ask rather than a calculator.</p>
            TXT],
            ['title' => 'The rebound trap', 'html' => <<<'TXT'
            <p>Dietary change frees money and attention, and both can be spent on something worse. The classic rebound is cheese: a vegetarian who replaces meat with dairy can end up with a higher footprint than before.</p><p>Cheese carries 21 kilograms of CO₂ per kilogram because it takes ten litres of milk to make one. Butter is worse. A diet of pasta and cheese is not a low-carbon diet.</p><p>The other trap is air-freighted produce and heavily packaged convenience food. The label on the diet is less important than the plate.</p>
            TXT],
            ['title' => 'Cost, and who can afford the change', 'html' => <<<'TXT'
            <p>Plant proteins are cheaper per gram of protein in most countries: lentils and beans cost a fraction of beef. A shift toward them reduces a household's food bill in almost every market.</p><p>The expensive part of a plant-based diet is the substitutes — the imitation meats and the specialty dairy alternatives, which are processed foods with prices to match.</p><p>Which means the climate case and the budget case point the same way, and the processed alternatives point the other way. Beans are the answer to both, and a bag of lentils is the least glamorous climate intervention on the market.</p>
            TXT],
            ['title' => 'The decade view', 'html' => <<<'TXT'
            <p>15 tonnes over ten years is a meaningful quantity, but it is worth being honest about what it is not. It is not a reduction in the atmosphere's stock of CO₂; it is a slowing of the flow.</p><p>It is also not guaranteed. Diets revert, and a household that changes for a year and changes back has saved 1.5 tonnes and no more — which is why the durable changes are the ones that start as swaps rather than as resolutions.</p><p>The panel's per-year figure is the honest one. Multiply it by the years you actually sustain the change, and that is the saving — not the figure you could have achieved in a perfect year you never had.</p>
            TXT],
            ['title' => 'What a household actually buys', 'html' => <<<'TXT'
            <p>Diet categories are abstractions; shopping baskets are not. A basket is 60 to 80 items a week, and the emissions are concentrated in a handful of them: beef, lamb, cheese, butter and air-freighted produce.</p><p>If you want to know your own figure rather than a category, take the annual food spend and look at the meat and dairy lines. In most European households those two are 30 to 40 per cent of the food bill and 70 to 80 per cent of the food carbon.</p><p>That mismatch is the practical lever. The carbon is where the money is not, which is why the changes that matter are also the ones that save the most at the till.</p>
            TXT],
            ['title' => 'Why food emissions are hard to see', 'html' => <<<'TXT'
            <p>Electricity arrives with a meter and a bill; food arrives with a label that lists weight, price and provenance but never emissions. The information asymmetry is complete.</p><p>Labels exist in pilot form in a few countries and have struggled: the range within a single product category is often larger than the difference between categories, which makes a single number misleading.</p><p>Until labelling arrives, rules of thumb are what a shopper has. Ruminant meat is the expensive one; chicken and pork are in the middle; plants are cheap in carbon as well as money.</p>
            TXT],
            ['title' => 'Food waste multiplies all of it', 'html' => <<<'TXT'
            <p>A third of food is wasted between field and plate, and the emissions were spent anyway. In a household, 10 to 20 per cent of the food bought is thrown away.</p><p>That is a straightforward multiplier: if a tenth of your food is wasted, your diet's footprint is 11 per cent higher than the box says, and cutting waste is a 10 per cent reduction with no dietary change at all.</p><p>It is also the cheapest intervention in the kitchen. Meal planning and a freezer outperform most carbon calculators at reducing a household's food emissions.</p>
            TXT],
            ['title' => 'How the change looks over a lifetime', 'html' => <<<'TXT'
            <p>Forty years at 1.5 tonnes is 60 tonnes. That is more than a household's annual heating emissions several times over, and it accumulates quietly without anyone noticing.</p><p>Set the years box to 40 and the panel shows the lifetime figure. It is the same arithmetic, and it makes the point that sustained small changes beat dramatic temporary ones, which is a more useful lesson than any single number on the page.</p><p>There is a limit to how much weight such figures can carry: the atmosphere responds to cumulative emissions, so a tonne saved in 2026 is worth more than a tonne saved in 2050 for any temperature target.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Three inputs, six outputs, and the arithmetic is deliberately simple so the assumptions stay visible.</p><ul><li><strong>Now</strong> = the first diet's annual figure</li><li><strong>After</strong> = the second diet's annual figure</li><li><strong>Saving</strong> = now − after</li><li><strong>Over the period</strong> = saving × years</li><li><strong>Car kilometres</strong> = saving × 1000 ÷ 0.12</li><li><strong>Tree-years</strong> = saving × 1000 ÷ 21</li></ul><p>Inverted, the years box answers the practical question: how long must I keep this up to save the equivalent of a return flight to New York? About 1.2 years, at these figures.</p>
            TXT],
            ['title' => 'Where the figures are contested', 'html' => <<<'TXT'
            <p>Grass-fed beef is claimed to offset its methane with soil carbon; most studies find the offset partial and the accounting sensitive to the baseline. Regenerative systems are better than feedlots and rarely carbon-neutral.</p><p>Transport is often over-weighted by consumers and under-weighted by the data: sea freight is efficient, air freight is not, and most food travels by ship.</p><p>And the diet categories are averages across countries and production systems. Your actual food has a footprint somewhere in a range around each box, which is why the panel is a comparison rather than a measurement.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much CO₂ does a vegan diet save?', 'a' => 'About 1.5 tonnes a year compared with an average omnivore diet — 15 tonnes over a decade, equivalent to 12,500 kilometres of driving each year.'],
            ['q' => 'Is veganism the only diet that matters?', 'a' => 'No. Cutting beef and lamb gets most of the benefit: a poultry-led diet at 1.9 tonnes is already below the vegetarian figure of some cheese-heavy diets.'],
            ['q' => 'Does food really matter compared with flying?', 'a' => <<<'TXT'
            Yes. Food is 15 to 25 per cent of a rich-country footprint and it is a daily decision, while a flight is annual. The saving here is more than a return flight to New York every year.
            TXT],
            ['q' => 'What about cheese and dairy?', 'a' => <<<'TXT'
            Cheese is about 21 kilograms of CO₂ per kilogram, higher than pork, because it takes ten litres of milk to make one. A vegetarian diet built on cheese can beat an omnivore diet only narrowly.
            TXT],
            ['q' => 'Is a plant-based diet cheaper?', 'a' => <<<'TXT'
            Usually, if it is built on beans, lentils and grains. The expensive version is built on processed meat and dairy substitutes, which cost more and carry more processing emissions.
            TXT],
            ['q' => 'Can I get enough protein without meat?', 'a' => <<<'TXT'
            Easily, from pulses, soy, grains and nuts. The nutrients to watch are B12, which needs supplementation, and iron and zinc, which are less bioavailable from plants.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
