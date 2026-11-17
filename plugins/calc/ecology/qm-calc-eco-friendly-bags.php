<?php

/**
 * Eco-Friendly Bags Calculator
 * /ecology/eco-friendly-bags
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Eco-Friendly Bags Calculator',
    'meta' => ['title' => 'Eco-Friendly Bags Calculator: Reuses to Break Even', 'description' => 'Work out how many times a reusable bag must be used before it beats single-use bags on carbon, and what a full year of either habit weighs in plastic waste.', 'h1' => 'Eco-Friendly Bags Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'Your shopping',
            'fields' => [
                [
                    'name' => 'bags_per_week',
                    'label' => 'Bags used per week',
                    'type' => 'number',
                    'default' => '10',
                    'rounding' => ['omni', '0.1'],
                    'min' => '0',
                    'help' => 'One weekly shop is usually four to eight bags.',
                ],
                [
                    'name' => 'single_bag_co2',
                    'label' => 'Carbon per single-use bag',
                    'type' => 'number',
                    'suffix' => 'g CO₂e',
                    'default' => '33',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'A thin HDPE carrier bag, from oil extraction to the till.',
                ],
                [
                    'name' => 'reusable_bag_co2',
                    'label' => 'Carbon per reusable bag',
                    'type' => 'number',
                    'suffix' => 'g CO₂e',
                    'default' => '1500',
                    'rounding' => ['standard', '0'],
                    'help' => 'A thick LDPE bag of the kind sold at the till; a cotton tote is three to five times more.',
                ],
                [
                    'name' => 'reuses',
                    'label' => 'Times each reusable bag is used',
                    'type' => 'number',
                    'default' => '60',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                    'help' => 'Be honest: bags left in a cupboard count zero.',
                ],
            ],
        ],
        [
            'title' => 'The comparison',
            'fields' => [
                [
                    'name' => 'uses_to_match',
                    'label' => 'Uses needed to break even',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                    'help' => 'Reuses per bag before the reusable option has repaid its manufacture.',
                ],
                [
                    'name' => 'single_year_co2',
                    'label' => 'A year of single-use bags',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'reusable_year_co2',
                    'label' => 'A year of reusable bags',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'saving',
                    'label' => 'Carbon saved per year',
                    'type' => 'number',
                    'suffix' => 'kg CO₂e',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'plastic_saved',
                    'label' => 'Plastic kept out of the waste stream',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                    'help' => 'At 5.5 grams of plastic in each single-use bag.',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Break-even',
            'results' => ['uses_to_match' => 'reusable_bag_co2 / single_bag_co2'],
        ],
        [
            'title' => 'A year of each habit',
            'results' => ['single_year_co2' => 'bags_per_week * 52 * single_bag_co2 / 1000', 'reusable_year_co2' => 'bags_per_week * 52 / reuses * reusable_bag_co2 / 1000', 'saving' => 'single_year_co2 - reusable_year_co2', 'plastic_saved' => 'bags_per_week * 52 * 5.5 / 1000'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A reusable bag carrying 1,500 grams of manufacturing carbon breaks even with single-use bags after 45.5 trips. Use one sixty times and the year works out at 17.16 kilograms for disposable bags against 13 for reusables — a saving of 4.16 kilograms, and 2.86 kilograms of plastic kept out of the waste stream. The critical box is not the bag; it is the number of reuses.</p>
        TXT,
        'sections' => [
            ['title' => 'What the break-even really compares', 'html' => <<<'TXT'
            <p>Every bag carries a manufacturing debt before it carries anything home. A thin carrier bag's debt is about 33 grams of CO₂ equivalent; a thick reusable bag's is around 1,500; a cotton tote's is several thousand. Break-even is simply one debt divided by the other: how many disposable bags one reusable bag has to replace before the totals cross.</p><p>That framing explains why the answer feels different from the marketing. The question is never 'is reusable better' in the abstract; it is 'will this particular bag, with this particular debt, be used often enough to repay it'.</p><p>It also explains why the bag you already own is the best bag. Its debt has been paid, so its marginal carbon is zero and every use is pure saving. Buying a new reusable bag you barely use is the worst of both worlds.</p>
            TXT],
            ['title' => 'The single-use side of the ledger', 'html' => <<<'TXT'
            <p>A typical supermarket carrier is high-density polyethylene, about 5.5 grams of plastic, made from natural gas or oil. Its 33 grams of CO₂ equivalent mostly come from the polymer, with a smaller share from forming, printing and transport.</p><p>The bag is also a container for a supply chain. Resin is cracked from naphtha, extruded into film, printed, cut, welded and packed, then shipped in cartons that are themselves heavier than the bags. Each step is small; together they are the 33 grams.</p><p>Denser 'bags for life' sit in between: 40 to 80 grams of plastic, a debt of several hundred grams of CO₂, and a use phase that often lasts a handful of trips before being repurposed as a bin liner. That repurposing is not a failure — it displaces a purchased bin bag — but it does mean the bag-for-life is not really reusable in the sense the calculator assumes.</p><p>Paper carriers are a third case. Their manufacturing carbon is higher than a plastic carrier, their weight is higher, and their advantage is recyclability rather than carbon. A paper bag used once is worse than a plastic bag used once on every metric the page measures.</p>
            TXT],
            ['title' => 'The reusable side, and the cotton problem', 'html' => <<<'TXT'
            <p>A thick low-density polyethylene bag of the kind sold at the till carries about 1,500 grams of CO₂ equivalent. It is durable, waterproof and recyclable in principle, and it will survive a hundred trips if it is not lost.</p><p>A cotton tote is a different proposition. Growing, spinning, weaving, dyeing and shipping cotton can put 5,000 to 15,000 grams of CO₂ equivalent into one bag, depending on the study, the fibre origin and the weight of the fabric. At 10,000 grams, break-even against 33-gram carriers is over 300 uses.</p><p>Organic cotton does not change that arithmetic much. The carbon is in the energy of spinning and finishing and in the fertiliser and irrigation of the crop, and a certification label addresses pesticide use more than emissions.</p>
            TXT],
            ['title' => 'Ten bags a week, worked through', 'html' => <<<'TXT'
            <p>Disposable: ten bags a week is 520 a year, at 33 grams each that is 17,160 grams, or 17.16 kilograms. Reusable: 520 trips divided by 60 uses per bag is 8.67 bags a year, at 1,500 grams each that is 13 kilograms.</p><p>The difference, 4.16 kilograms, is about the carbon of a 35-kilometre drive. That is the whole climate case for switching bags, and it is modest — which is why the plastic argument usually carries more weight than the carbon one.</p><p>Plastic: 520 carrier bags at 5.5 grams is 2.86 kilograms a year. Small in mass, large in item count, and unlike the carbon it is a permanent addition to the waste stream unless it is incinerated.</p>
            TXT],
            ['title' => 'Why the break-even is the only honest number', 'html' => <<<'TXT'
            <p>Published break-even figures for reusable bags range from about 20 uses to more than 300. The spread comes from three choices: which bags are compared, what the cotton debt is assumed to be, and whether the study counts the disposable bag's second life as a bin liner.</p><p>Any single number printed in an article is therefore a claim about those choices. The calculation on this page has the advantage of showing them: change the bag type and the debt, and the break-even moves in front of you.</p><p>The conclusion worth keeping is the ranking, not the figure. A bag used a hundred times beats a bag used once, whatever the material. A bag used three times does not beat anything.</p>
            TXT],
            ['title' => 'What bag charges actually changed', 'html' => <<<'TXT'
            <p>Ireland's plastic bag levy, introduced in 2002, cut carrier bag use by more than 90 per cent within months and raised the reuse rate of bags brought from home. Similar charges followed across Europe, and the EU's single-use plastics directive pushed member states toward bans or pricing.</p><p>The unintended effect was a rise in purchased bin liners. Households that had reused carrier bags for rubbish started buying purpose-made liners, which are heavier and are used exactly once. Studies of the levy found the bag reduction partly offset by that substitution.</p><p>None of this argues against the charge. It argues for counting the whole system rather than one product, which is what the substitution effect makes difficult.</p>
            TXT],
            ['title' => 'The litter argument, which is not about carbon', 'html' => <<<'TXT'
            <p>A carrier bag weighs five grams and blows away. That is why bags dominate beach litter counts and why they appear in the stomachs of marine animals: a floating bag looks like a jellyfish to a turtle.</p><p>On a mass basis the ocean's plastic problem is mostly fishing gear and packaging, not carrier bags. On an item basis the bag is everywhere, and the harm per item is disproportionate because of its shape.</p><p>The 2.86 kilograms a year that the page reports is therefore a small mass with a specific meaning: it is 520 fewer objects that can blow off a bin lorry, reach a drain and end up in the sea.</p>
            TXT],
            ['title' => 'The bag in the boot, and why behaviour beats material', 'html' => <<<'TXT'
            <p>Every reuse study finds the same gap between intention and practice. People own reusable bags; they leave them at home. A bag in the hallway cupboard is used twice a month, which is nowhere near the break-even for anything heavier than a carrier.</p><p>The interventions that work are logistical rather than moral. A bag kept in the car, the coat pocket or the bike pannier gets used because it is there at the moment of need. A bag that must be remembered gets bought again at the till.</p><p>This is where the calculator's honesty box does its work. Setting reuses to five and watching the saving turn negative is more instructive than any campaign, because it says plainly that the environmental case for a reusable bag is a case about behaviour.</p>
            TXT],
            ['title' => 'What a shop can change that a shopper cannot', 'html' => <<<'TXT'
            <p>Retailers control the default. A checkout that asks 'do you need a bag' at every transaction trains a habit; one that assumes you brought one, with bags sold from a separate stand, breaks it. The levy experiments worked partly because they changed the default from free to chosen.</p><p>Packaging design matters too. A shop that packs groceries into crates and lets customers transfer them to their own bags removes the carrier entirely rather than pricing it.</p><p>None of this is a household decision, and the calculator is a household tool. It is worth remembering anyway: the difference between a 90 per cent reduction and a 5 per cent one was made at the checkout, not in the kitchen.</p>
            TXT],
            ['title' => 'How bags compare with the rest of a shopping trip', 'html' => <<<'TXT'
            <p>The carbon of a week's groceries dwarfs the carbon of the bags that carry them. A kilogram of beef carries tens of kilograms of CO₂ equivalent; the bag holding it carries 33 grams. Even a year of carrier bags — 17.16 kilograms — is smaller than one beef roast.</p><p>That proportion is worth keeping in view when a supermarket puts the bag at the centre of its sustainability page. Bags are visible, countable and easy to price; food is none of those things, and the emissions are two orders of magnitude larger.</p><p>It does not make the bag irrelevant. It makes it a small, tractable item in a problem where the large items are much harder to change — which is exactly why it gets so much attention.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>The chain is short enough to hold in your head, which is the point of a page like this. Every box can be recovered from the others.</p><ul><li><strong>Uses to break even</strong> = reusable debt ÷ single-use debt</li><li><strong>A year of single-use</strong> = bags × 52 × debt ÷ 1000</li><li><strong>A year of reusable</strong> = bags × 52 ÷ reuses × debt ÷ 1000</li><li><strong>Saving</strong> = single-use year − reusable year</li><li><strong>Plastic avoided</strong> = bags × 52 × 5.5 ÷ 1000</li><li><strong>Reuses needed</strong> = (bags × 52) ÷ (saving target ÷ reusable debt × 1000)</li></ul><p>The last row answers the practical question: if you want a given saving, how many uses per bag does it take? The answer is often higher than the number of shopping trips a bag survives before it is left in a cupboard.</p>
            TXT],
            ['title' => 'Where these numbers are softest', 'html' => <<<'TXT'
            <p>Manufacturing carbon for textiles is the weakest figure here. Cotton's debt depends on where it grew, how it was spun and how far it travelled, and published estimates for a single tote span a factor of three.</p><p>Reuse counts are behavioural, not physical. A bag's paper debt is fixed; its actual uses depend on whether it lives in the car boot or the hall cupboard. Every study that measures this finds the median well below the headline claim.</p><p>End-of-life is nearly ignored. A bag that is incinerated with energy recovery is credited slightly; one that reaches a river is not counted at all. The page treats both as identical, which is honest about what it does not know.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How many times do I need to reuse a bag before it is worth it?', 'a' => <<<'TXT'
            For a thick plastic reusable bag at 1,500 grams of CO₂ against a 33-gram carrier, 45.5 uses. For a cotton tote the figure is several hundred, and for a bag you already own it is once.
            TXT],
            ['q' => 'Are paper bags better than plastic ones?', 'a' => <<<'TXT'
            Not on carbon. A paper carrier is heavier and takes more energy to make, so a single-use paper bag is worse than a single-use plastic one. Its advantage is that it recycles and degrades, which is a litter argument rather than an emissions one.
            TXT],
            ['q' => 'Is a cotton tote worse than plastic?', 'a' => <<<'TXT'
            Only if it is barely used. A tote at 10,000 grams of CO₂ needs around 300 trips to repay itself against 33-gram carriers. Used weekly for six years it wins comfortably; bought as a freebie and forgotten it loses badly.
            TXT],
            ['q' => 'Do bag charges actually reduce waste?', 'a' => <<<'TXT'
            Yes, sharply — Ireland's levy cut carrier bag use by more than 90 per cent. The caveat is substitution: households bought more bin liners, which offset part of the gain in mass terms.
            TXT],
            ['q' => 'Should I count the bag\'s second life as a bin liner?', 'a' => <<<'TXT'
            If it displaces a purchased liner, yes: the bag's debt is shared between two uses. The page does not model that, so its single-use figure is a slight overestimate for households that reuse carrier bags for rubbish.
            TXT],
            ['q' => 'Which bag is genuinely best?', 'a' => <<<'TXT'
            The one that already exists and gets used. A worn bag kept in the car for years has a marginal carbon cost of zero; a new bag of any material that is used twice is worse than the carrier it replaced.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
