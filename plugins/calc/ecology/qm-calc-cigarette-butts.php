<?php

/**
 * Cigarette Butt Litter Calculator
 * /ecology/cigarette-butts
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cigarette Butt Litter Calculator',
    'meta' => ['title' => 'Cigarette Butt Litter Calculator: Weight and Cost', 'description' => 'Count the cigarette filters a smoking habit throws away in a year, then weigh them, add up their residual nicotine and price the cost of street cleaning.', 'h1' => 'Cigarette Butt Litter Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The smoking',
            'fields' => [
                [
                    'name' => 'cigarettes_per_day',
                    'label' => 'Cigarettes smoked per day',
                    'type' => 'number',
                    'default' => '15',
                    'rounding' => ['omni', '0.1'],
                    'min' => '0',
                ],
                [
                    'name' => 'littered_share',
                    'label' => 'Share of butts dropped rather than binned',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '65',
                    'rounding' => ['standard', '0'],
                    'help' => 'Surveys of smokers consistently land between half and three quarters.',
                ],
                [
                    'name' => 'smokers',
                    'label' => 'Smokers counted together',
                    'type' => 'number',
                    'default' => '1',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                    'help' => 'Household, office floor or survey sample.',
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
            'title' => 'What reaches the ground',
            'fields' => [
                [
                    'name' => 'butts',
                    'label' => 'Butts dropped',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'weight_kg',
                    'label' => 'Weight of those butts',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'readonly' => true,
                    'rounding' => ['omni', '0.001'],
                    'help' => 'A smoked filter with its paper weighs about 0.17 grams.',
                ],
                [
                    'name' => 'nicotine_mg',
                    'label' => 'Nicotine left in the filters',
                    'type' => 'number',
                    'suffix' => 'mg',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                    'help' => 'Roughly a milligram survives in each smoked filter.',
                ],
                [
                    'name' => 'cleanup_cost',
                    'label' => 'Street cleaning bill',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                    'help' => 'At three cents per butt, the usual order of magnitude for mechanical sweeping.',
                ],
                [
                    'name' => 'bins_full',
                    'label' => 'Bin bags at 10 kg each',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.001'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Count and weight',
            'results' => ['butts' => 'cigarettes_per_day * littered_share / 100 * smokers * days', 'weight_kg' => 'butts * 0.17 / 1000'],
        ],
        [
            'title' => 'What they cost and carry',
            'results' => ['nicotine_mg' => 'butts', 'cleanup_cost' => 'butts * 0.03', 'bins_full' => 'weight_kg / 10'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Fifteen cigarettes a day, 65 per cent of them dropped rather than binned, comes to 3,559 butts on the ground in a year. Those filters weigh 0.605 kilograms, carry about 3,559 milligrams of residual nicotine, fill 0.06 of a ten-kilogram bin bag, and cost 71.18 to sweep up at two cents apiece. The count is cigarettes × the littered share × smokers × days; everything else divides or multiplies that single number.</p>
        TXT,
        'sections' => [
            ['title' => 'Why the filter is the litter', 'html' => <<<'TXT'
            <p>A cigarette butt is mostly the filter: a bundle of cellulose acetate fibres, wrapped in paper, holding a plug of unburnt tobacco and ash. Cellulose acetate is a plastic. It photodegrades into smaller pieces under sunlight but does not biodegrade in any useful time, and in soil or water it can persist for a decade or more.</p><p>That is why butts dominate litter surveys worldwide. They are small, they are dropped reflexively, and they are light enough to travel with rain into drains and from there into rivers. Coastal cleanups consistently rank them first by count, well ahead of food wrappers and bottles.</p><p>The filter also does something the smoker rarely thinks about: it collects. Tar, nicotine, heavy metals and combustion products concentrate in the fibres, and when the butt gets wet those substances leach out. A single filter in a litre of water is enough to kill small aquatic organisms in laboratory tests.</p>
            TXT],
            ['title' => 'The count, and why the littered share matters most', 'html' => <<<'TXT'
            <p>The formula multiplies four things: cigarettes a day, the share dropped, the number of smokers, and the days in the period. Three of those are facts you can count. The fourth is a behaviour, and it is the one that swings the answer.</p><p>Survey work consistently puts the littered share between 50 and 75 per cent. The form opens at 65. If your household bins every butt, set the box to zero and the answer is a well-behaved nothing; if you smoke outdoors and drop them, set it high.</p><p>The smokers box lets the page scale to a shared flat, an office floor or a survey sample. It assumes everyone in the group smokes the same amount, which is a simplification, but the arithmetic of a group is otherwise the same arithmetic as one person.</p>
            TXT],
            ['title' => 'Fifteen a day for a year, worked through', 'html' => <<<'TXT'
            <p>Start with the items. Fifteen cigarettes multiplied by 0.65 is 9.75 butts a day; multiplied by 365 that is 3,558.75, which the page rounds to 3,559. A filter with its remaining paper weighs about 0.17 grams, so the total weight is 605 grams — 0.605 kilograms, about the weight of a paperback.</p><p>Nicotine is the number that surprises people. Roughly a milligram survives in each smoked filter, so the year's litter holds 3,559 milligrams, or 3.6 grams of a substance that is toxic to insects and aquatic life at concentrations far below anything a human would notice.</p><p>The cleaning bill uses three cents a butt, which is the right order of magnitude for mechanical sweeping and manual picking in a European city. That comes to 106.76 a year for one smoker. The bin-bag box is there mostly for perspective: even at fifteen a day, a year of litter fits in a fifteenth of one bag.</p>
            TXT],
            ['title' => 'What one filter does once it is on the ground', 'html' => <<<'TXT'
            <p>The obvious harm is aesthetic, and the less obvious harm is chemical. A butt sitting in a gutter leaches nicotine, cadmium, lead, arsenic and polycyclic aromatic hydrocarbons into the first rain. From there the water goes to a drain, and in most cities the drain goes to a river rather than to a treatment plant.</p><p>Wildlife encounters them directly. Birds pick up butts as nesting material, and chicks that ingest them show neurological symptoms; dogs and cats eat them and are poisoned. Marine animals mistake them for food, and the fibres lodge in the gut.</p><p>There is a slow-motion aspect to all of this. One butt is trivial. The estimated global figure is in the trillions a year, and the fraction that reaches a watercourse is large because a butt weighs almost nothing and flows easily. That is why several countries now regulate filters as single-use plastics rather than as litter.</p>
            TXT],
            ['title' => 'Who pays for the sweeping', 'html' => <<<'TXT'
            <p>Smokers do not pay for the cleanup; municipalities do, out of general taxation. Street-cleaning budgets in cities with high smoking rates devote a visible share to butt collection, and the cost per item is far higher than a bin bag suggests because the work is manual and the items are tiny.</p><p>That mismatch has produced a policy idea now spreading across Europe: extended producer responsibility for tobacco filters, with manufacturers charged a levy per cigarette to fund collection. The levy is typically a fraction of a cent per cigarette, and it moves the cost from the council tax payer to the product's manufacturer.</p><p>The three-cent figure in the form is a placeholder for that accounting. If your council publishes a street-cleaning cost per item, use it; the answer becomes a statement about your town rather than about litter in general.</p>
            TXT],
            ['title' => 'From one smoker to a hundred thousand', 'html' => <<<'TXT'
            <p>Scale changes the register of the numbers. A hundred thousand people smoking at this rate drop 356 million butts a year, weighing 60.5 tonnes and carrying 356 kilograms of nicotine. The cleaning bill at three cents each is 10.68 million — which is why councils with large smoking populations treat it as a budget line rather than a nuisance.</p><p>Weight stays small even at scale, and that is worth understanding. Sixty tonnes is a few lorry loads; a city's household waste is thousands of tonnes a day. The problem with cigarette litter was never mass. It is distribution: millions of tiny items spread across every street, gutter and beach, where they leach and cannot be collected economically.</p><p>For a household, the useful version of this thought is that your contribution is small in weight and not small in kind. The filters you drop end up somewhere specific, and it is usually the drain at the end of the street.</p>
            TXT],
            ['title' => 'Where the count stops', 'html' => <<<'TXT'
            <p>It counts filters, not the rest of the smoking habit. Cigarette packaging — the cellophane, the foil, the carton — is plastic and is not in the arithmetic. Neither are vapes, which are a worse problem per unit: a disposable vape carries a battery, a circuit board and a plastic shell, and is littered at a rate that has alarmed waste authorities.</p><p>It also says nothing about second-hand smoke, which is a health question rather than a litter one, or about the carbon of growing, curing and transporting tobacco. The page is deliberately one narrow strand of a wider problem.</p><p>What it does well is make the habit concrete. Three and a half thousand objects is a number a smoker can picture, and the picture is more persuasive than the abstract estimate that butts are the most littered item in the world.</p>
            TXT],
            ['title' => 'Cellulose acetate against the alternatives', 'html' => <<<'TXT'
            <p>Filters were added to cigarettes in the mid-twentieth century as a health claim that turned out to be mostly marketing. They do trap some tar, but they also change the smoke chemistry in ways that let smokers inhale more deeply — and they created the litter problem this page counts.</p><p>The material is cellulose acetate, a plastic made by acetylating wood pulp. It is cheap, draws well and holds its shape when wet, which is exactly what you want in a filter and exactly why it does not decay in a gutter.</p><p>Alternatives exist and have not worked well. Paper filters collapse when wet and change the draw; biodegradable filters made from starch or hemp have been trialled and tend to break down too slowly to satisfy regulators. The most effective measure so far is not a better filter but fewer filters, through higher prices and indoor smoking bans.</p><p>Several jurisdictions are now considering bans on single-use filters altogether, on the argument that the only reliable way to stop filter litter is to stop making filters. The industry's counter-argument is that filters reduce harm; public-health researchers are sceptical of that claim.</p>
            TXT],
            ['title' => 'What smokers say and what the bins show', 'html' => <<<'TXT'
            <p>Ask smokers why they drop butts and the answers are consistent: there is no bin, the bin is a general waste bin that might catch fire, the butt is not really litter, everyone does it. The first two are infrastructure problems and the second two are norms.</p><p>Where bins have been placed within a few steps of where smokers stand, litter rates fall sharply. Where they have not, campaigns change little. That is the pattern across every municipal trial: proximity beats persuasion.</p><p>Fire is a real concern, which is why purpose-built butt bins have a metal snuffer rather than an open top. A general waste bin with a hot filter in it is a genuine risk, and smokers know it.</p>
            TXT],
            ['title' => 'Counting litter in your own street', 'html' => <<<'TXT'
            <p>If you want a number rather than an estimate, count. Pick a stretch of pavement — a hundred metres is plenty — and count the butts in it. Repeat a week later without clearing, and you have a rate per hundred metres per week for that spot.</p><p>Multiply by the length of the street and by the weeks in the year, and you have a local total that owes nothing to national averages. Compare it with the page's output for the number of smokers nearby: if the street shows ten times what the households imply, the litter is coming from passers-by rather than residents.</p><p>The method has an obvious bias — busy corners accumulate more — which is why the interesting comparison is between sites rather than against an absolute standard. Do the same count outside a school, a pub and an office and the pattern tells you where a bin would earn its cost.</p>
            TXT],
            ['title' => 'The arithmetic rearranged', 'html' => <<<'TXT'
            <p>Four inputs and five outputs share one chain, so any of them can be recovered. The obvious reverse question is what litter share would be needed to reach a given count, and whether the bill or the weight implies something different about the habit.</p><ul><li><strong>Butts</strong> = cigarettes × share ÷ 100 × smokers × days</li><li><strong>Weight</strong> = butts × 0.17 ÷ 1000</li><li><strong>Nicotine</strong> = butts × 1 milligram</li><li><strong>Cleaning bill</strong> = butts × 0.03</li><li><strong>Littered share</strong> = butts ÷ (cigarettes × smokers × days) × 100</li><li><strong>Cigarettes per day</strong> = butts ÷ (share ÷ 100 × smokers × days)</li></ul><p>The last row is the one to use if you count butts in a fixed area — a doorstep, a car park, a stretch of beach — and want to know how many cigarettes produced them. Divide the count by the group and the days and you have the habit behind the litter.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Do cigarette filters really take years to break down?', 'a' => <<<'TXT'
            Cellulose acetate photodegrades rather than biodegrades: sunlight makes it brittle and it fragments, but the polymer persists. Estimates of full breakdown range from a decade to much longer, and the fragments remain as microplastic in the meantime.
            TXT],
            ['q' => 'How much nicotine is left in a dropped butt?', 'a' => <<<'TXT'
            Around a milligram per smoked filter, with the range across studies spanning roughly 0.5 to 3 milligrams depending on the cigarette and how far it was smoked. The page uses one milligram and treats the result as an order of magnitude.
            TXT],
            ['q' => 'Why does the calculator ask for a littered share?', 'a' => <<<'TXT'
            Because most cigarettes are not dropped. Survey estimates put the proportion between half and three quarters in countries without deposit schemes. Setting the share to zero models a household that bins every butt.
            TXT],
            ['q' => 'Is the cleaning cost per butt realistic?', 'a' => <<<'TXT'
            Two cents is a reasonable European order of magnitude for manual and mechanical sweeping, and individual cities report both higher and lower figures. Use your council's own number if it publishes one.
            TXT],
            ['q' => 'Are disposable vapes worse than cigarette butts?', 'a' => <<<'TXT'
            Per item, yes. A disposable vape contains a lithium battery, a circuit board and plastic, and is thrown away after a few hundred puffs. Butts are more numerous; vapes are heavier and carry a fire risk in waste trucks.
            TXT],
            ['q' => 'What would actually reduce the count?', 'a' => <<<'TXT'
            Bins where smokers actually stand, portable ashtrays, and a filter levy that pays for collection. Bans on filters are being debated in several jurisdictions, and reusable or biodegradable alternatives have so far performed poorly in trials.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
