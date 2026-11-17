<?php

/**
 * Meat Footprint Calculator
 * /ecology/meat-footprint
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Meat Footprint Calculator',
    'meta' => ['title' => 'Meat Footprint Calculator: Beef Against Beans', 'description' => 'Compare a year of meat servings with the same meals built from plants, in kilograms of carbon dioxide, in car kilometres and in tree-years of absorption.', 'h1' => 'Meat Footprint Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'Your plate',
            'fields' => [
                [
                    'name' => 'servings',
                    'label' => 'Meat servings per week',
                    'type' => 'number',
                    'default' => '5',
                    'rounding' => ['omni', '0.1'],
                    'min' => '0',
                ],
                [
                    'name' => 'portion',
                    'label' => 'Meat in one serving',
                    'type' => 'number',
                    'unit' => '22',
                    'unit_default' => 'g',
                    'default' => '150',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'A supermarket steak is 150 to 225 grams; a stir-fry portion nearer 100.',
                ],
                [
                    'name' => 'meat',
                    'label' => 'Which meat',
                    'type' => 'select',
                    'options' => [
                        'Beef' => '60',
                        'Lamb' => '39',
                        'Pork' => '12',
                        'Chicken' => '6.9',
                        'Farmed salmon' => '5',
                        'Tofu' => '3',
                    ],
                    'help' => 'Kilograms of CO₂ equivalent per kilogram of food.',
                ],
                [
                    'name' => 'alternative',
                    'label' => 'What replaces it',
                    'type' => 'select',
                    'options' => ['Beans and pulses' => '2', 'Tofu' => '3', 'Chicken' => '6.9', 'Vegetables' => '1.5'],
                ],
            ],
        ],
        [
            'title' => 'A year of each',
            'fields' => [
                [
                    'name' => 'meat_co2',
                    'label' => 'Meat, per year',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'alt_co2',
                    'label' => 'Alternative, per year',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'saving',
                    'label' => 'Carbon saved per year',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
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
                    'label' => 'Tree-years to absorb the saving',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Yearly carbon',
            'results' => ['meat_co2' => 'servings * 52 * portion * meat', 'alt_co2' => 'servings * 52 * portion * alternative'],
        ],
        [
            'title' => 'The difference',
            'results' => ['saving' => 'meat_co2 - alt_co2', 'car_km' => 'saving / 0.12', 'trees' => 'saving / 21'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Five 150-gram servings of beef a week is 39 kilograms of meat a year and 2,340 kilograms of carbon dioxide equivalent. Swap those servings for beans and the same meals emit 78 kilograms, a saving of 2,262. That is 18,850 kilometres in a petrol car, or 107.7 tree-years of absorption at 21 kilograms a year.</p>
        TXT,
        'sections' => [
            ['title' => 'Why beef is 60 and beans are 2', 'html' => <<<'TXT'
            <p>The figure people quote for beef is around 60 kilograms of CO₂ equivalent per kilogram of meat. It is not one number but a chain of them: land converted to pasture, feed grown and shipped, ruminant digestion, manure, processing and refrigeration.</p><p>Ruminant methane dominates. A cow ferments grass in a four-chambered stomach and exhales methane, which is a far more powerful greenhouse gas than CO₂ over the twenty years that matter for warming rates. That single biological fact explains most of the gap between beef and chicken.</p><p>Beans are two because a legume fixes its own nitrogen, needs no feed chain, and can be dried and stored without refrigeration. The difference is a factor of thirty, which is larger than the difference between almost any two other choices a household makes.</p>
            TXT],
            ['title' => 'The numbers behind the select boxes', 'html' => <<<'TXT'
            <p>The values in the form are rounded medians from the large life-cycle assessment literature: beef 60, lamb 39, pork 12, chicken 6.9, farmed salmon 5, tofu 3, beans 2, vegetables 1.5, in kilograms of CO₂ equivalent per kilogram of food.</p><p>Cheese, which belongs in this comparison and is not on the list, sits around 21 — higher than pork, because it takes ten litres of milk to make a kilogram. Nuts vary enormously: almonds are water-intensive, walnuts less so, and both are low-carbon.</p><p>Every figure is a median with a wide range. Pasture-raised beef in a country with rain-fed grass might be 30; beef from cleared tropical forest might be 200. The form picks the middle because the middle is what a supermarket purchase represents.</p>
            TXT],
            ['title' => 'Five servings a week, worked through', 'html' => <<<'TXT'
            <p>Five servings a week is 260 servings a year. At 150 grams each — a modest steak or a generous stir-fry — that is 39 kilograms of meat, and at 60 kilograms of CO₂ per kilogram it is 2,340 kilograms.</p><p>The same 39 kilograms of beans is 78 kilograms, because the factor is 2. The saving of 2,262 kilograms is equivalent to 18,850 kilometres of driving at 120 grams per kilometre.</p><p>Tree absorption makes the figure tangible at human scale: 107.7 mature trees working for a year would take up the difference, which is a reminder of how much land a meat-heavy diet implicitly needs.</p>
            TXT],
            ['title' => 'Not all meat is equal', 'html' => <<<'TXT'
            <p>Chicken at 6.9 is a tenth of beef. A household that switches from beef to chicken gets most of the carbon benefit of going vegetarian without changing much else, which is why poultry consumption has risen as red meat has fallen.</p><p>Pork at 12 sits in between, and lamb at 39 is close to beef because it is also a ruminant on pasture. The ruminant–monogastric split explains more of the variation than the country of origin does.</p><p>Farmed salmon at 5 is low per kilogram but has its own problems: feed made from wild fish, disease, and the concentration of waste under the pens. A single number cannot carry all of that.</p>
            TXT],
            ['title' => 'What replaces the meat matters less than the swap itself', 'html' => <<<'TXT'
            <p>Beans at 2, tofu at 3, vegetables at 1.5 — the plant options are all so low that the choice between them is a rounding error next to the choice of beef. That is the useful insight the form makes visible.</p><p>It also means the debate about whether tofu is better than beans is a distraction. Both are an order of magnitude below beef, and the difference between them is smaller than the uncertainty in the beef figure.</p><p>What does vary is nutrition and land. Beans and lentils deliver protein and fibre on land that would otherwise grow feed; nuts and avocado carry a lot of water. The carbon box is one axis of a comparison with several.</p>
            TXT],
            ['title' => 'The protein question', 'html' => <<<'TXT'
            <p>Per gram of protein, beef is still the most carbon-intensive common food. Beef carries about 20 grams of protein per 100 grams, so the carbon per gram of protein is around 300 grams; chicken is around 60; beans about 20.</p><p>That ranking holds across the literature and is why nutritionists and climate scientists have converged on the same advice: eat less red meat, more pulses, and treat the change as a swap rather than a sacrifice.</p><p>The form does not model protein, because it is a carbon calculator. If you want to compare diets properly, multiply servings by protein content as well as by the factor in the select box.</p>
            TXT],
            ['title' => 'Land, water and the rest of the footprint', 'html' => <<<'TXT'
            <p>Carbon is one impact among several. Livestock uses about four-fifths of agricultural land, counting pasture and feed, and produces a fraction of the world's calories. That land-use ratio is the strongest argument for dietary change, stronger than the carbon number.</p><p>Water matters too, though mostly as rainfall rather than irrigation; the blue-water footprint of beef is lower than headlines suggest in rain-fed systems and much higher in irrigated feedlots.</p><p>And biodiversity loss runs through the same land. Clearing for pasture and soy is the largest driver of tropical deforestation, and soy is mostly fed to animals rather than eaten directly.</p>
            TXT],
            ['title' => 'Where the figures are contested', 'html' => <<<'TXT'
            <p>Grass-fed beef is often claimed to be carbon-neutral because pasture sequesters carbon in soil. Some studies find net sequestration on well-managed land; most find it insufficient to offset methane, and the accounting depends on the baseline you choose.</p><p>Regenerative grazing claims are hard to verify because soil carbon changes slowly and varies by field. A single farm can be a net sink for a decade and then saturate.</p><p>The honest position is that the ranking between beef and beans survives every defensible correction. The absolute number in the box is a median, not a measurement of your dinner.</p>
            TXT],
            ['title' => 'How much meat the world eats', 'html' => <<<'TXT'
            <p>Global meat production is around 360 million tonnes a year, roughly 45 kilograms per person, and it has been rising for fifty years. Rich countries eat two to three times that average; the growth now is in middle-income countries.</p><p>Food systems account for roughly a quarter of global greenhouse emissions, and livestock for most of that quarter. Within the livestock share, beef and dairy dominate even where they are a minority of the meat eaten.</p><p>That is why dietary change keeps appearing in climate scenarios. It is one of the few levers a household holds directly, alongside flying and home heating, and it is cheaper than either.</p>
            TXT],
            ['title' => 'The serving-size trap', 'html' => <<<'TXT'
            <p>Portion size moves the answer linearly, and most people underestimate their own. A restaurant steak is 225 to 300 grams; a burger patty is 120 to 150; a portion of lasagne might contain 80 grams of beef and a litre of milk.</p><p>The compound dishes are the ones the form handles badly, and the ones people eat most. If you are estimating a week, count the beef in the bolognese as well as the beef on the plate.</p><p>A quick calibration: one kilogram of beef a week per person is 3,120 kilograms of CO₂ a year, which is more than the entire annual carbon footprint of an average person in most of the world. Two kilograms a week is more than a transatlantic return flight.</p><p>Set the portion box to 100 grams and the same five servings fall to 1,560 kilograms a year — still a large number, which is the point. Shrinking the portion is not a way out of the arithmetic, only a way of slowing it.</p>
            TXT],
            ['title' => 'Food waste is the same calculation', 'html' => <<<'TXT'
            <p>A third of food produced is wasted, and the emissions of wasted food are emitted anyway. Throwing away a beef portion wastes the same 9 kilograms of CO₂ as eating it, with nothing to show for it.</p><p>That makes waste reduction the cheapest dietary intervention available: no change of diet, no new products, just buying what gets eaten. In the identity of food emissions, waste is a multiplier on everything else.</p><p>The form has no waste box. If a tenth of your meat is thrown away, add 10 per cent to the meat total and the saving scales with it.</p>
            TXT],
            ['title' => 'Why the comparison is worth making anyway', 'html' => <<<'TXT'
            <p>Individual action arguments are often dismissed on the grounds that system change matters more. Both are true at different scales: a household cannot decarbonise the grid, and a grid cannot shrink the demand for beef.</p><p>What the form offers is a size. 2,262 kilograms a year is a real quantity, comparable to a short-haul flight or a month of home heating, and it is the kind of number that makes a decision legible.</p><p>Whether you act on it is a separate question. The arithmetic does not require you to, and a page like this is a measuring instrument rather than a sermon.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Four multiplications and two divisions run the panel, and each can be inverted to answer a different question.</p><ul><li><strong>Meat carbon</strong> = servings × 52 × portion ÷ 1,000 × factor</li><li><strong>Alternative carbon</strong> = the same with the other factor</li><li><strong>Saving</strong> = meat carbon − alternative carbon</li><li><strong>Car kilometres</strong> = saving ÷ 0.12</li><li><strong>Tree-years</strong> = saving ÷ 21</li></ul><p>Inverted, the portion box answers a question people ask more often: how much beef can I eat and still match a vegetarian year? At the defaults, one serving a week of beef is 468 kilograms, which is still more than a year of chicken at five servings.</p>
            TXT],
            ['title' => 'What the page cannot tell you', 'html' => <<<'TXT'
            <p>It cannot see your shopping. A supermarket mince is a blend of many farms; a farmers-market steak has a traceable chain and an unknown average. The select box is a category, and categories are what the literature can support.</p><p>It cannot weigh animal welfare, rural livelihoods or the cultural place of meat, all of which are real and none of which are grams of CO₂.</p><p>What it can do is make a comparison visible. Two people arguing about diet can put the same portions into the form and see whether they are disagreeing about the science or about the portions.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much CO₂ is in a kilogram of beef?', 'a' => <<<'TXT'
            About 60 kilograms of CO₂ equivalent as a global median, with a range from roughly 30 for grass-fed pasture systems to over 200 where forest was cleared. Ruminant methane is the largest single term.
            TXT],
            ['q' => 'Is chicken much better than beef?', 'a' => <<<'TXT'
            Yes. Chicken is about 6.9 kilograms of CO₂ per kilogram against 60 for beef, because birds are not ruminants and convert feed far more efficiently. Pork at 12 sits in between.
            TXT],
            ['q' => 'How much does going vegetarian save?', 'a' => 'At the page\'s defaults, five 150-gram beef servings a week replaced by beans saves 2,262 kilograms of CO₂ a year, equivalent to 18,850 kilometres of driving.'],
            ['q' => 'Do beans and tofu really differ?', 'a' => 'Barely. Beans are about 2 kilograms of CO₂ per kilogram and tofu about 3, a difference far smaller than the uncertainty in the beef figure they replace.'],
            ['q' => 'Is grass-fed beef carbon-neutral?', 'a' => <<<'TXT'
            Rarely. Well-managed pasture can sequester some soil carbon, but most studies find the sequestration does not offset ruminant methane, and the result depends heavily on the baseline chosen.
            TXT],
            ['q' => 'What does tree-years mean here?', 'a' => <<<'TXT'
            The number of mature trees that would absorb the saved carbon in a year, at roughly 21 kilograms per tree. It is a scale device, not a proposal to plant that many.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
