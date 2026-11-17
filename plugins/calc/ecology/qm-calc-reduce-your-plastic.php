<?php

/**
 * Reduce Your Plastic Calculator
 * /ecology/reduce-your-plastic
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Reduce Your Plastic Calculator',
    'meta' => ['title' => 'Reduce Your Plastic Calculator: Single-Use Items', 'description' => 'Add up the single-use plastic a household gets through in a week, then read the annual weight, the carbon dioxide and what each of the four swaps saves.', 'h1' => 'Reduce Your Plastic Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'A week of single-use plastic',
            'fields' => [
                [
                    'name' => 'bottles_week',
                    'label' => 'Drink bottles per week',
                    'type' => 'number',
                    'default' => '7',
                    'rounding' => ['standard', '0'],
                    'help' => 'At 25 grams each.',
                ],
                [
                    'name' => 'bags_week',
                    'label' => 'Carrier bags per week',
                    'type' => 'number',
                    'default' => '5',
                    'rounding' => ['standard', '0'],
                    'help' => 'At six grams each, the thin supermarket kind.',
                ],
                [
                    'name' => 'cups_week',
                    'label' => 'Coffee cups per week',
                    'type' => 'number',
                    'default' => '3',
                    'rounding' => ['standard', '0'],
                    'help' => 'At 12 grams including the lid.',
                ],
                [
                    'name' => 'straws_week',
                    'label' => 'Straws per week',
                    'type' => 'number',
                    'default' => '4',
                    'rounding' => ['standard', '0'],
                    'help' => 'At half a gram each.',
                ],
            ],
        ],
        [
            'title' => 'Over a year',
            'fields' => [
                [
                    'name' => 'items_year',
                    'label' => 'Items per year',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'plastic_kg',
                    'label' => 'Plastic per year',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'co2_kg',
                    'label' => 'Carbon per year',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                    'help' => 'Production and disposal at three kilograms of CO₂ per kilogram.',
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
            'title' => 'Counts and weight',
            'results' => ['items_year' => '(bottles_week + bags_week + cups_week + straws_week) * 52', 'plastic_kg' => '(bottles_week * 0.025 + bags_week * 0.006 + cups_week * 0.012 + straws_week * 0.0005) * 52'],
        ],
        [
            'title' => 'Carbon',
            'results' => ['co2_kg' => 'plastic_kg * 3', 'trees' => 'co2_kg / 21'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Seven bottles, five carrier bags, three coffee cups and four straws a week is 988 items a year and 12.64 kilograms of plastic. In carbon that is 37.9 kilograms a year — small, 1.81 tree-years, and smaller than almost any other swap a household can make.</p>
        TXT,
        'sections' => [
            ['title' => 'Nine hundred and eighty-eight items', 'html' => <<<'TXT'
            <p>The count is the striking number. A thousand pieces of plastic a year from four ordinary habits, none of them unusual, and each one used for minutes.</p><p>Nineteen items a week is on the low side for a household with children. A school-age family can easily reach forty, and the count climbs with takeaway food and bottled drinks.</p><p>Set the four boxes to 20, 10, 8 and 5 and the annual count passes two thousand. That is still only a few kilograms of material, which is the point: the item count and the environmental weight are two different measurements of the same habit.</p><p>The form asks for counts rather than weights because counts are what people can estimate. Nobody knows how many grams a coffee cup lid weighs; everybody knows how many cups they bought last week.</p>
            TXT],
            ['title' => 'The weight is small and the count is large', 'html' => <<<'TXT'
            <p>12.64 kilograms is a fraction of a household's total plastic waste, which the other calculator on this site puts at 100 kilograms or so. Single-use items are a small share of the weight and a large share of the litter.</p><p>That is the honest framing. Giving up straws will not move your carbon footprint; it will move the number of things you leave behind in the world, which matters for a different reason.</p><p>A page that inflates the carbon of a straw to make the swap feel important is not doing the reader a favour. The arithmetic here is deliberately unflattering.</p>
            TXT],
            ['title' => 'What each item weighs', 'html' => <<<'TXT'
            <p>A 500-millilitre drink bottle is about 25 grams. A thin carrier bag is 6 grams, a reusable one 40 to 80, a cotton tote 150 to 300. A coffee cup with its lid is 12 grams of plastic before the paper sleeve.</p><p>A straw is half a gram, which is why the four-a-week habit contributes 0.1 kilograms a year — a figure that makes the paper-straw debate look like what it is.</p><p>The weights in the form are the median of what supermarkets actually sell. A thick bottle or a heavy cup lid doubles the figure, so treat the panel as an order of magnitude rather than a measurement.</p>
            TXT],
            ['title' => 'Carbon at three kilograms per kilogram', 'html' => <<<'TXT'
            <p>Packaging plastics carry about 2 kilograms of CO₂ per kilogram at the factory gate and another kilogram through conversion, so three is the multiplier used here. 12.64 kilograms becomes 37.9 kilograms of CO₂.</p><p>For scale, that is the emissions of about 300 kilometres of driving, spread across a year. It is real and it is small.</p><p>1.81 tree-years is the same number expressed in absorption, and the reason the box exists is to make the size legible rather than to make it look impressive.</p>
            TXT],
            ['title' => 'The four swaps and what they actually save', 'html' => <<<'TXT'
            <p>Bottles are the big one: 182 bottles a year at 25 grams is 4.5 kilograms of plastic. A stainless bottle costs about 1.5 kilograms of CO₂ to make and then carries nothing, so it pays back in a few months.</p><p>Carrier bags are second. A cotton tote has 150 to 300 times the footprint of a thin plastic bag, so it needs 50 to 100 uses to break even — which a weekly shopper reaches in a year and a forgetful one never does.</p><p>Coffee cups: a reusable cup at 100 grams of plastic needs about 20 uses to beat the disposables, and most cafes now discount the drink, which pays back faster than the carbon does.</p><p>Straws: 0.1 kilograms a year. Swap them if you like turtles, not for the climate. The paper alternative is not obviously better either, since a paper straw weighs more than a plastic one and is usually not recyclable.</p>
            TXT],
            ['title' => 'The reusable bottle arithmetic', 'html' => <<<'TXT'
            <p>A one-litre stainless bottle is 200 to 400 grams of steel and 1 to 2 kilograms of embodied CO₂. Against 182 bottles a year at 25 grams each — 4.5 kilograms of plastic and 13.5 kilograms of CO₂ — the payback is a couple of months of daily use.</p><p>Glass is heavier and worse to transport; aluminium is lighter and better recycled; plastic refillables are the lightest of all and the least durable. The differences between them are smaller than the difference between any of them and single use.</p><p>What kills the saving is buying five bottles and losing three. The environmental case depends on use, which is why the honest advice is boring: buy one, keep it.</p>
            TXT],
            ['title' => 'Coffee cups and the discount', 'html' => <<<'TXT'
            <p>Disposable cups are mostly paper with a plastic liner, which makes them hard to recycle and impossible to compost in most systems. The 12 grams in the form is the plastic part; the paper adds a little more carbon.</p><p>A reusable cup is 100 to 200 grams of plastic or a ceramic mug at 500 grams. Either pays back within a few dozen uses, and a cafe discount of 20 or 30 cents pays back in cash long before that.</p><p>Three cups a week is 156 a year, which is enough to make the swap worthwhile and not enough to make it urgent. The page's defaults are chosen to be ordinary.</p>
            TXT],
            ['title' => 'Why the count matters for policy', 'html' => <<<'TXT'
            <p>The EU single-use plastics directive banned straws, cutlery, plates and cotton buds not because of their carbon but because of their presence in beach litter. Item counts drive that kind of regulation.</p><p>Deposit schemes work the same way: they target containers because containers are identifiable, countable and worth money to return. The carbon of the scheme is a secondary benefit.</p><p>So the two numbers in the panel answer different questions. The weight tells you about climate; the count tells you about litter, and about which policies will follow.</p>
            TXT],
            ['title' => 'The bag question, properly', 'html' => <<<'TXT'
            <p>The bag debate is a case study in doing the arithmetic badly. A thin plastic bag has a tiny footprint and a terrible litter record; a cotton tote has a large footprint and a good one, if it is used.</p><p>Reusable plastic bags break even at about 10 uses, non-woven polypropylene at 15 to 20, cotton at 50 to 100, and a paper bag at 4 to 8. All of them beat single use if you actually reuse them.</p><p>Five bags a week in the form is 260 a year. A single tote used for the same 260 trips is unambiguously better; five totes bought and forgotten are not.</p>
            TXT],
            ['title' => 'The takeaway problem', 'html' => <<<'TXT'
            <p>A takeaway meal arrives in four to six pieces of plastic: a container, a lid, a bag, cutlery, a sachet and sometimes a cup. Two takeaways a week adds 500 items a year that the form does not count.</p><p>That is why the count in the panel is a floor rather than a total. Single-use items from food service are the fastest-growing part of the household's plastic and the hardest to avoid without changing where you eat.</p><p>Reusable container schemes exist in some cities, run by the restaurant rather than the customer. Where they exist they work; where they do not, the only lever is frequency.</p>
            TXT],
            ['title' => 'The refill shop question', 'html' => <<<'TXT'
            <p>Refilling a bottle or a jar from a bulk dispenser eliminates the container entirely. The question is whether the shop is close enough to reach without a car, because the journey can outweigh the saving.</p><p>Refill shops also tend to be more expensive per litre, and the products are heavier than concentrates. The carbon case is real but narrower than the enthusiasm suggests.</p><p>For dry goods in a city, refilling works. For liquids bought by car from a shop fifteen kilometres away, the arithmetic is much less favourable than the page implies: a ten-kilometre round trip at 120 grams per kilometre is 1.2 kilograms of CO₂, which is more than a month of the plastic the trip was meant to save.</p>
            TXT],
            ['title' => 'What to change first', 'html' => <<<'TXT'
            <p>If you are going to do one thing, make it the bottle: 4.5 kilograms of plastic and 13 kilograms of CO₂ a year, replaced by one purchase you will use daily.</p><p>Second, keep a bag in the car or the coat pocket. The bag that gets used is better than the bag that gets bought again, and the tote in the cupboard is a monument to good intentions.</p><p>Third, nothing. Cups and straws are worth doing if they are convenient and not worth an extra journey if they are not. The page's numbers are small enough to say so.</p>
            TXT],
            ['title' => 'Why the numbers feel disappointing', 'html' => <<<'TXT'
            <p>Plastic reduction is heavily promoted and lightly consequential in carbon terms. 37.9 kilograms a year is less than a tenth of a return flight to a neighbouring country.</p><p>The promotion is not dishonest; it is aimed at litter, wildlife and the politics of consumption rather than at climate. Confusing the two leads to a household spending its attention where the grams are smallest.</p><p>Which is the argument for a page like this. Once the size of the number is visible, the choice of where to spend effort stops being a matter of fashion.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Four counts in, four outputs out, with fixed per-item weights in the middle.</p><ul><li><strong>Items per year</strong> = (bottles + bags + cups + straws) × 52</li><li><strong>Plastic per year</strong> = (bottles × 0.025 + bags × 0.006 + cups × 0.012 + straws × 0.0005) × 52</li><li><strong>Carbon</strong> = plastic × 3</li><li><strong>Tree-years</strong> = carbon ÷ 21</li></ul><p>The weights are the only constants, and they are the part to argue with. Change 0.025 to 0.04 for heavy bottles and the bottle share of the total rises by half.</p>
            TXT],
            ['title' => 'What the page leaves out', 'html' => <<<'TXT'
            <p>Litter and microplastics, which are the real reason single-use items are regulated. A straw's carbon is negligible; its persistence is not.</p><p>The production of the paper and ceramic alternatives, which the page does not count because it stops at the item being replaced.</p><p>And behaviour. The savings only exist if the reuse actually happens, and a cupboard full of forgotten reusable bags is a common outcome. The arithmetic is a hypothesis about your habits, not a promise.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much plastic does a household use in single-use items?', 'a' => 'At the page\'s defaults, 988 items and 12.64 kilograms a year — 37.9 kilograms of CO₂. Most of the weight is in bottles; most of the items are smaller.'],
            ['q' => 'Does giving up straws matter for the climate?', 'a' => 'Hardly at all. Four straws a week is 0.1 kilograms of plastic a year. Straws are regulated because of litter and wildlife, not because of their carbon.'],
            ['q' => 'How many times must I reuse a cotton bag?', 'a' => <<<'TXT'
            Fifty to a hundred. A thin plastic bag is 6 grams of material; a cotton tote is 150 to 300 grams with a much heavier production footprint. Reusable plastic bags break even at about ten uses.
            TXT],
            ['q' => 'Are reusable coffee cups actually better?', 'a' => <<<'TXT'
            Yes, after 20 to 40 uses. A reusable cup is 100 to 200 grams of plastic or ceramics, against a disposable cup with a plastic liner that cannot be recycled in most systems.
            TXT],
            ['q' => 'What has the biggest effect?', 'a' => 'Bottles. A hundred and eighty-two bottles a year is 4.5 kilograms of plastic, and one stainless bottle replaces the lot after a couple of months of use.'],
            ['q' => 'Is this the same as the household plastic footprint?', 'a' => <<<'TXT'
            No. Single-use items are a small share of the roughly 100 kilograms of packaging a household throws away; the rest is films, trays and wrappers that no swap in this form touches.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
