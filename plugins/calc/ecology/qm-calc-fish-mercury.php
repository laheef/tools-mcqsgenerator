<?php

/**
 * Fish Mercury Calculator
 * /ecology/fish-mercury
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Fish Mercury Calculator',
    'meta' => ['title' => 'Fish Mercury Calculator: Safe Portions per Week', 'description' => 'Convert mercury concentration and portion size into a daily intake per kilogram of body weight, then compare it with the reference dose for methylmercury.', 'h1' => 'Fish Mercury Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The fish and the eater',
            'fields' => [
                [
                    'name' => 'body_weight',
                    'label' => 'Body weight',
                    'type' => 'number',
                    'unit' => '22',
                    'unit_default' => 'kg',
                    'default' => '70',
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'portion_size',
                    'label' => 'Size of one portion',
                    'type' => 'number',
                    'unit' => '22',
                    'unit_default' => 'g',
                    'default' => '150',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'A fillet portion is usually 120 to 180 grams.',
                ],
                [
                    'name' => 'mercury',
                    'label' => 'Mercury in the fish',
                    'type' => 'number',
                    'suffix' => 'mg/kg',
                    'default' => '0.5',
                    'rounding' => ['omni', '0.01'],
                    'help' => 'Cod is near 0.1, tuna 0.5, swordfish and shark above 1.',
                ],
                [
                    'name' => 'portions_per_week',
                    'label' => 'Portions eaten per week',
                    'type' => 'number',
                    'default' => '2',
                    'rounding' => ['omni', '0.1'],
                    'min' => '0',
                ],
            ],
        ],
        [
            'title' => 'What that comes to',
            'fields' => [
                [
                    'name' => 'mercury_per_portion',
                    'label' => 'Mercury in one portion',
                    'type' => 'number',
                    'suffix' => 'µg',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'intake_per_day',
                    'label' => 'Average intake per day',
                    'type' => 'number',
                    'suffix' => 'µg',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'intake_per_kg',
                    'label' => 'Intake per kilogram of body weight',
                    'type' => 'number',
                    'suffix' => 'µg/kg',
                    'readonly' => true,
                    'rounding' => ['omni', '0.0001'],
                    'help' => 'The reference dose is 0.1 µg per kilogram per day.',
                ],
                [
                    'name' => 'weekly_allowance',
                    'label' => 'Weekly allowance at the reference dose',
                    'type' => 'number',
                    'suffix' => 'µg',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'safe_portions',
                    'label' => 'Portions this fish allows per week',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'One portion, and one day',
            'results' => ['mercury_per_portion' => 'portion_size * mercury * 1000', 'intake_per_day' => 'mercury_per_portion * portions_per_week / 7', 'intake_per_kg' => 'intake_per_day / body_weight'],
        ],
        [
            'title' => 'Against the reference dose',
            'results' => ['weekly_allowance' => 'body_weight * 0.7', 'safe_portions' => 'weekly_allowance / mercury_per_portion'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Two 150-gram portions of fish at 0.5 milligrams of mercury per kilogram delivers 75 micrograms per portion, or 21.43 micrograms a day averaged over the week. For a 70-kilogram adult that is 0.3061 micrograms per kilogram of body weight per day, against a reference dose of 0.1 — three times over. The weekly allowance at that dose is 49 micrograms, which buys 0.6533 portions of this particular fish.</p>
        TXT,
        'sections' => [
            ['title' => 'Why mercury concentrates in fish', 'html' => <<<'TXT'
            <p>Mercury enters water from coal burning, mining and waste incineration, and bacteria convert it to methylmercury, the form that living tissue absorbs. Plankton take it up, small fish eat the plankton, larger fish eat the small ones, and at each step the mercury is retained rather than excreted.</p><p>The result is biomagnification: a tuna at the top of a long food chain carries concentrations thousands of times higher than the water it swam in. Age matters because the accumulation is cumulative, which is why a large old tuna is worse than a small young one of the same species.</p><p>Those top predators are exactly the fish people pay most for. That is the tension the page is about: the fish with the best texture and the strongest flavour are usually the ones with the most mercury, because they are the oldest and the highest on the chain.</p>
            TXT],
            ['title' => 'The reference dose on the page', 'html' => <<<'TXT'
            <p>The figure of 0.1 micrograms per kilogram of body weight per day is the US Environmental Protection Agency's reference dose for methylmercury. It is derived by taking the lowest dose at which effects appeared in studies and dividing by an uncertainty factor of ten to protect sensitive people.</p><p>The World Health Organization uses a provisional tolerable weekly intake of 1.6 micrograms per kilogram, which is slightly more permissive than the EPA's figure worked out weekly. Both are in the same place: a fraction of a microgram per kilogram per day.</p><p>A reference dose is not a threshold below which nothing happens. It is a level at which no effect has been demonstrated with the evidence available, with a margin built in. Exceeding it occasionally is not an emergency; exceeding it habitually for years is the pattern the dose is designed to catch.</p>
            TXT],
            ['title' => 'Two portions of tuna a week, worked through', 'html' => <<<'TXT'
            <p>A 150-gram portion at 0.5 milligrams per kilogram holds 75 micrograms: 0.15 kilograms times 0.5 milligrams is 0.075 milligrams, and a milligram is a thousand micrograms. Two portions a week is 150 micrograms, or 21.43 micrograms a day.</p><p>Divide by 70 kilograms and the intake is 0.3061 micrograms per kilogram per day. The reference dose allows 0.1, so the habit sits at about three times the level.</p><p>The allowance box goes the other way: 70 kilograms times 0.1 micrograms times 7 days is 49 micrograms a week. Divide by the 75 micrograms in a portion and you get 0.6533 portions of this fish per week — which is to say that tuna at this concentration is not a twice-weekly habit for a 70-kilogram adult.</p>
            TXT],
            ['title' => 'Which fish fit, and which do not', 'html' => <<<'TXT'
            <p>The range across species is enormous. Salmon, sardines, mackerel and anchovies sit between 0.01 and 0.05 milligrams per kilogram and are rich in the omega-3 fats that motivate fish advice in the first place. Cod and haddock are around 0.1. Tuna is 0.3 to 1.0 depending on the species and the cut. Swordfish, shark, marlin and king mackerel exceed 1.0.</p><p>Run the numbers and the practical rule writes itself. Small oily fish at the bottom of the chain can be eaten three or four times a week without approaching the reference dose; large predators should be an occasional choice rather than a staple.</p><p>Canned fish is the cheap end of the same ladder and is mostly small fish: skipjack tuna, sardines, anchovies, mackerel. That is why a sardine habit clears the reference dose with room to spare while a bluefin habit does not.</p><p>Freshwater fish are their own case. Mercury deposition affects lakes and rivers far from any source, and a large pike or perch from a boreal lake can carry more than a tuna steak. Local advisories exist for exactly this reason and are worth checking before a fishing trip becomes a weekly dinner.</p>
            TXT],
            ['title' => 'Who needs to be more careful', 'html' => <<<'TXT'
            <p>Methylmercury crosses the placenta and reaches the developing brain, and fetuses and young children are the group the reference dose is designed to protect. Advice for pregnant and breastfeeding women is generally to avoid the large predators entirely and to limit tuna to one or two portions a week.</p><p>Children take a smaller absolute dose for the same portion because their body weight is lower, which is why the per-kilogram calculation matters more than the portion size. A 20-kilogram child eating a 150-gram tuna portion takes five times the dose per kilogram that an adult does.</p><p>For healthy adults, the evidence of harm at ordinary intakes is weak. The page is not a warning; it is a way to see where a habit sits relative to a line drawn by regulators.</p><p>Older adults add a further wrinkle. The cohort studies that found cardiovascular benefit from fish were mostly in populations eating two or more portions a week, and the benefit did not disappear when the species were mixed. A calculator cannot weigh a trial result against a reference dose, and this one does not try.</p>
            TXT],
            ['title' => 'The selenium counter-argument', 'html' => <<<'TXT'
            <p>Some researchers argue that selenium, which fish also contain, binds mercury and reduces its toxicity, and that the ratio between the two matters more than the mercury concentration alone. On that argument, most ocean fish are safer than their mercury figure suggests because they carry more selenium than mercury.</p><p>The hypothesis is plausible and not settled. Regulators have not adopted it, partly because the mechanism is complex and partly because the epidemiological evidence is mixed.</p><p>It is a reason to read the page's answer as one view rather than the last word. If your diet is otherwise low in fish, the cardiovascular benefit of eating it may well outweigh a mercury intake slightly above the reference dose — a judgement the calculator cannot make for you.</p>
            TXT],
            ['title' => 'Keeping fish in the diet', 'html' => <<<'TXT'
            <p>Vary the species. Rotating between salmon, sardines, cod and the occasional tuna keeps the average intake low without giving up variety, and it spreads demand across stocks rather than concentrating it on one.</p><p>Choose smaller fish within a species where you can. A small tuna has accumulated less than a large one, and the same is true of pike, perch and halibut.</p><p>Watch the portion. A 200-gram restaurant steak is a third more mercury than the 150-gram portion the form assumes, and the per-kilogram box is where that difference shows up.</p><p>Eat the skin and the brown meat if you like them, but do not imagine either changes the mercury; it is distributed through the muscle. What changes it is the species, the size of the individual fish, and how much of it you eat.</p>
            TXT],
            ['title' => 'Methylmercury, not the metal on the periodic table', 'html' => <<<'TXT'
            <p>The mercury in a coal plume is inorganic and poorly absorbed. What makes fish a concern is the bacterial conversion to methylmercury in sediments and the resulting fat-soluble compound that crosses cell membranes, the gut wall and the blood-brain barrier.</p><p>That is why the toxicology is about methylmercury and the page's box asks for the concentration of mercury as usually reported — which in fish tissue is nearly all methylmercury. If you have a laboratory certificate quoting total mercury, using it here is right.</p><p>The distinction also explains why fish advisories vary so much between water bodies with similar total mercury inputs. Acidity, organic matter and oxygen determine how much of the load becomes methylated, and a bog lake can produce more than a chalk stream receiving the same deposition.</p>
            TXT],
            ['title' => 'Reading a supermarket label for mercury', 'html' => <<<'TXT'
            <p>Most European retailers do not print mercury figures, because the regulation sets maximum levels rather than requiring disclosure. What you get instead is a legal ceiling per species and, occasionally, a country of origin.</p><p>The ceiling is a useful starting point. Tuna is capped at 1.0 milligrams per kilogram in the EU, swordfish and shark at the same, and most white fish at 0.3. A product at the ceiling is not typical, and a product at half of it is common.</p><p>Certification schemes do not address mercury at all — they cover stock sustainability and fishing method. If mercury is your concern, species is the only reliable signal on the packet.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Every quantity on the panel is a multiplication or division away from the inputs, so the page answers the reverse questions too: what concentration would fit a weekly habit, or how much fish a given allowance buys.</p><ul><li><strong>Mercury per portion</strong> = portion weight × concentration × 1000</li><li><strong>Intake per day</strong> = portion mercury × portions ÷ 7</li><li><strong>Intake per kilogram</strong> = intake per day ÷ body weight</li><li><strong>Weekly allowance</strong> = body weight × 0.1 × 7</li><li><strong>Portions allowed</strong> = weekly allowance ÷ mercury per portion</li><li><strong>Concentration allowed</strong> = weekly allowance ÷ (portion weight × 1000 × portions)</li></ul><p>The last row is the one to use in a fishmonger's: given your weight and how often you want to eat the fish, what concentration keeps you under the line? Compare that with the published figure for the species.</p>
            TXT],
            ['title' => 'What the calculation cannot see', 'html' => <<<'TXT'
            <p>Concentrations vary within a species by region, season, size and cut. The 0.5 milligrams per kilogram in the form is a middle value for tuna; a belly cut from a large bluefin is far higher, a canned skipjack far lower.</p><p>Cooking does not remove mercury. It concentrates it slightly by driving off water, which means a grilled fillet weighs less and carries the same mercury.</p><p>And the page knows nothing about the rest of your diet. Mercury also arrives in rice, in some freshwater fish and in a few supplements; the fish boxes are not the whole intake, only the part you can count.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much mercury is safe in fish?', 'a' => <<<'TXT'
            The reference dose used here is 0.1 micrograms per kilogram of body weight per day, which for a 70-kilogram adult is 49 micrograms a week. That allows roughly 0.6533 portions of a fish at 0.5 milligrams per kilogram, or many more of a low-mercury species.
            TXT],
            ['q' => 'Is canned tuna different from fresh?', 'a' => <<<'TXT'
            Usually lower. Skipjack, which fills most cans, is a smaller fish with less accumulated mercury — often around 0.1 to 0.2 milligrams per kilogram, against 0.5 or more for fresh bluefin or yellowfin.
            TXT],
            ['q' => 'Does cooking remove mercury?', 'a' => <<<'TXT'
            No. Mercury binds to protein and stays. Grilling or frying removes water, which raises the concentration per gram of what is left, so the total in the portion is unchanged.
            TXT],
            ['q' => 'Should pregnant women avoid fish entirely?', 'a' => <<<'TXT'
            No — they should avoid the large predators and limit tuna. Oily fish is recommended in pregnancy for omega-3s, and the advice is to choose salmon, sardines and mackerel rather than swordfish, shark or marlin.
            TXT],
            ['q' => 'Is the selenium argument accepted?', 'a' => <<<'TXT'
            Not by regulators. The selenium-mercury ratio is an active research question and may soften the risk estimate, but public advice still uses the reference dose and the species lists derived from it.
            TXT],
            ['q' => 'What about freshwater fish?', 'a' => <<<'TXT'
            They can be higher than ocean fish because mercury deposition reaches remote lakes. Large predatory freshwater species such as pike and walleye are the usual concern, and local advisories give the numbers for your water body.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
