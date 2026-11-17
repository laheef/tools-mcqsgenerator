<?php

/**
 * Cryptocurrency Footprint Calculator
 * /ecology/cryptocurrency-footprint
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Cryptocurrency Footprint Calculator',
    'meta' => ['title' => 'Cryptocurrency Footprint Calculator: Energy per Coin', 'description' => 'Turn your transactions into kilowatt-hours and carbon dioxide, then read the total back as household-days of electricity and kilometres in a petrol car.', 'h1' => 'Cryptocurrency Footprint Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'Transactions',
            'fields' => [
                [
                    'name' => 'transactions',
                    'label' => 'Transactions per year',
                    'type' => 'number',
                    'default' => '100',
                    'rounding' => ['standard', '0'],
                    'min' => '0',
                    'help' => 'Sends, receives, trades and withdrawals you make yourself.',
                ],
                [
                    'name' => 'energy_per_transaction',
                    'label' => 'Energy per transaction',
                    'type' => 'number',
                    'suffix' => 'kWh',
                    'default' => '700',
                    'rounding' => ['omni', '0.1'],
                    'help' => 'A Bitcoin transfer is measured in hundreds of kilowatt-hours; a post-merge Ethereum transfer in hundredths.',
                ],
                [
                    'name' => 'grid_intensity',
                    'label' => 'Carbon intensity of the grid',
                    'type' => 'number',
                    'suffix' => 'g CO₂/kWh',
                    'default' => '480',
                    'rounding' => ['standard', '0'],
                    'help' => 'World average is near 480; a coal-heavy grid passes 800, a nuclear one sits near 12.',
                ],
            ],
        ],
        [
            'title' => 'What the chain spent',
            'fields' => [
                [
                    'name' => 'energy_kwh',
                    'label' => 'Electricity',
                    'type' => 'number',
                    'suffix' => 'kWh',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'co2_kg',
                    'label' => 'Carbon dioxide',
                    'type' => 'number',
                    'suffix' => 'kg',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'household_days',
                    'label' => 'Household-days of electricity',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                    'help' => 'A European household draws about 10.5 kWh a day.',
                ],
                [
                    'name' => 'car_km',
                    'label' => 'Same carbon as a petrol car',
                    'type' => 'number',
                    'suffix' => 'km',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                    'help' => 'At 0.12 kg of CO₂ per kilometre.',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Electricity and carbon',
            'results' => ['energy_kwh' => 'transactions * energy_per_transaction', 'co2_kg' => 'energy_kwh * grid_intensity / 1000'],
        ],
        [
            'title' => 'Everyday comparisons',
            'results' => ['household_days' => 'energy_kwh / 10.5', 'car_km' => 'co2_kg / 0.12'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A hundred cryptocurrency transactions at 700 kilowatt-hours each draw 70,000 kilowatt-hours and emit 33,600 kilograms of carbon dioxide on a grid at 480 grams per kilowatt-hour. That is 6,666.7 household-days of electricity — about eighteen years of a European home — and the same carbon as 280,000 kilometres in a petrol car. Three boxes produce it: how many transactions, how much energy each one takes, and how dirty the electricity is.</p>
        TXT,
        'sections' => [
            ['title' => 'What one transaction actually costs', 'html' => <<<'TXT'
            <p>A proof-of-work blockchain does not spend energy on your transaction. It spends energy on securing the whole ledger, continuously, whether or not anyone is sending coins. The network's annual electricity is divided by its annual transaction count to give a per-transaction figure, and that division is the source of every number on this page.</p><p>For Bitcoin the result has run between several hundred and a thousand kilowatt-hours per transaction, depending on the year and on how busy the chain was. For Ethereum, which moved to proof of stake in 2022, the figure fell by more than 99.9 per cent, to something like a hundredth of a kilowatt-hour.</p><p>Those two numbers describe technologies that are not comparable in kind, which is why the form opens at 700 — a proof-of-work figure — and why the help line tells you to put a much smaller number in if you are counting a proof-of-stake chain.</p>
            TXT],
            ['title' => 'Which energy figure belongs in the box', 'html' => <<<'TXT'
            <p>There are three defensible ways to answer the question and they give different numbers. The first is the network average: total electricity divided by total transactions. The second is the marginal figure: what an additional transaction costs the network, which for a proof-of-work chain is close to zero because the mining happens anyway.</p><p>The third is the fee-based allocation: the share of the network's energy that your fee bought. It sits between the two and is the fairest of the three, but almost nobody publishes it.</p><p>The page uses the network average because it is the only figure a user can look up. Read the answer as 'my share of a system's total', not as 'the energy my click triggered'. The distinction matters when you are deciding whether to use the chain at all; it matters much less when you are estimating a personal footprint.</p>
            TXT],
            ['title' => 'A hundred transactions, worked through', 'html' => <<<'TXT'
            <p>Multiply first: 100 transactions at 700 kilowatt-hours is 70,000 kilowatt-hours, which is 70,000 units on a domestic meter. Multiply by the grid's 480 grams per kilowatt-hour and divide by a thousand, and the carbon is 33,600 kilograms — 33,600 kilos, or a bit over 33 tonnes when written the way emissions are usually written.</p><p>Divide the electricity by 10.5 kilowatt-hours, the daily draw of a European household, and you get 6,666.7 days. Divide the carbon by 0.12 kilograms per kilometre and you get 280,000 kilometres, which is more than seven times around the equator.</p><p>Both comparisons exist for the same reason: 70,000 kilowatt-hours is not a quantity anyone can feel. Eighteen years of a home's electricity is, and so is a number of kilometres large enough to cross an ocean a few dozen times.</p><p>Run the same three boxes for a proof-of-stake chain and the answer collapses. At 0.01 kilowatt-hours per transaction, a hundred transactions cost one kilowatt-hour and less than half a kilogram of carbon — the household-days box reads 0.095 and the car box reads 4 kilometres. Same habit, four orders of magnitude apart.</p>
            TXT],
            ['title' => 'Why the grid figure moves the answer so much', 'html' => <<<'TXT'
            <p>The same kilowatt-hour is not the same carbon everywhere. A coal-heavy grid emits around 800 to 1,000 grams per kilowatt-hour; the European average is near 250; France, with its nuclear fleet, sits near 60; Sweden and Norway are under 30; Iceland is close to zero on geothermal and hydro.</p><p>That matters for mining because miners move to cheap power, and cheap power is often either hydro or coal. A mining farm beside a Siberian coal plant and one beside a Norwegian waterfall consume the same electricity and emit sixty times different carbon.</p><p>The form's 480 grams is a world average. If you know where your chain's hash rate sits, put a better figure in: the answer will change by a factor of three in either direction, which is more than any of the other boxes can do.</p>
            TXT],
            ['title' => 'What household-days hide', 'html' => <<<'TXT'
            <p>The household comparison is a translation, not a moral equivalence. A household uses electricity for heat, light, cooking and appliances; the network uses it to run hash functions and fans. Same meter, different purpose.</p><p>It is a useful translation because domestic electricity is the one quantity most people have a feel for. A heat pump household in Finland uses perhaps 12,000 kilowatt-hours a year; 70,000 kilowatt-hours is nearly six of those households, for one person's hundred transactions.</p><p>The comparison also exposes the scale problem. A single chain's annual consumption is measured in tens of terawatt-hours, which is the electricity of a small country. Dividing by transactions produces a per-unit figure that sounds manageable and hides the aggregate.</p>
            TXT],
            ['title' => 'Proof of work, proof of stake, and the space between', 'html' => <<<'TXT'
            <p>Proof of work asks miners to burn electricity to earn the right to add a block. Security comes from the cost of the burn, which is why the energy use is a feature rather than a bug in that design.</p><p>Proof of stake asks validators to lock capital instead. Security comes from the value at risk rather than the energy spent, and consumption falls to the level of ordinary servers. Ethereum's switch in 2022 is the largest single energy reduction in the sector's history.</p><p>Between the two lie hybrids, delegated stake, and chains that are essentially databases with a token attached. If you are choosing a chain on environmental grounds, the consensus mechanism is the only question that matters; everything else is rounding.</p>
            TXT],
            ['title' => 'What a wallet can change, and what it cannot', 'html' => <<<'TXT'
            <p>Batching helps. One transaction that pays ten recipients uses the chain once rather than ten times, and on a proof-of-work chain that is a real division by ten. Layer-2 systems do the same thing more thoroughly by settling thousands of transfers in one on-chain record.</p><p>Offsets do not help in the way people hope. Buying a carbon credit for your transactions moves money; it does not reduce the electricity the network drew, and the credit may be of dubious quality. The page's arithmetic does not change when you offset it.</p><p>What actually changes the number is not sending the transaction, or sending it on a chain that does not burn power to agree on a ledger. That is a decision about which network to use, and it dwarfs anything a user can do inside one.</p>
            TXT],
            ['title' => 'The parts the kilowatt-hours leave out', 'html' => <<<'TXT'
            <p>Electricity is not the whole footprint of a mining operation. Application-specific mining machines are replaced every two to four years, which makes a steady stream of electronic waste: racks of silicon that cannot be repurposed and are rarely recycled well.</p><p>Cooling adds water in dry regions, the same way data centres do. Noise is a neighbourhood issue where farms sit near towns, and several municipalities have used planning rules rather than carbon rules to keep them out.</p><p>None of that is in the page's arithmetic, which counts only the meter. It is worth knowing because a chain can lower its grid intensity by moving to a hydro region while simultaneously increasing its hardware churn and its water draw — a smaller carbon number attached to a larger environmental footprint.</p>
            TXT],
            ['title' => 'Auditing a published footprint', 'html' => <<<'TXT'
            <p>Chains and exchanges publish sustainability pages with a per-transaction figure and a percentage reduction. Two checks tell you most of what you need to know.</p><p>First, divide their claimed annual electricity by their claimed transaction count and see whether the per-transaction number is arithmetic or marketing. It is common for the two to disagree by a factor of ten because one uses settled transactions and the other counts internal transfers.</p><p>Second, look at what the electricity is compared against. A claim of '99 per cent renewable' usually refers to purchased certificates rather than to hours matched, and the same grid still has to absorb the load. If a footprint page does not distinguish the two, it is a press release.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Three inputs, four outputs, one chain of multiplication. Each box can be recovered from the others, which is what makes the page useful for the reverse questions: how many transactions a carbon budget allows, or what energy per transaction a claimed footprint implies.</p><ul><li><strong>Electricity</strong> = transactions × energy per transaction</li><li><strong>Carbon dioxide</strong> = electricity × grid intensity ÷ 1000</li><li><strong>Household-days</strong> = electricity ÷ 10.5</li><li><strong>Car kilometres</strong> = carbon ÷ 0.12</li><li><strong>Transactions</strong> = electricity ÷ energy per transaction</li><li><strong>Energy per transaction</strong> = carbon × 1000 ÷ (grid intensity × transactions)</li></ul><p>The last row is the audit test. Feed in a published footprint for a set of transactions and the row tells you what energy per transaction the claim assumes — which is usually the quickest way to see whether a marketing number is credible.</p>
            TXT],
            ['title' => 'Where the estimate is weakest', 'html' => <<<'TXT'
            <p>Attribution is the weak point. The network would run with or without your transaction, so the marginal carbon of one send is near zero and the average is large. Both are true, and they answer different questions: the average answers 'what does this system cost per unit', the marginal answers 'what changes if I stop'.</p><p>Grid accounting adds a second layer. Miners often use power that would otherwise be curtailed — hydro in a wet season, gas that is flared at an oil well. Counting that electricity as if it carried average grid intensity overstates the carbon; counting it as zero understates the opportunity cost.</p><p>Finally, transaction counts are politically loaded. A chain that batches payments internally can report a tiny per-transaction figure while consuming the same terawatt-hours. The page cannot see through that, so treat any per-transaction number, including this one, as an average with an agenda.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much energy does one Bitcoin transaction use?', 'a' => <<<'TXT'
            Hundreds to about a thousand kilowatt-hours on network-average accounting, depending on the year and the chain's total consumption. The page opens at 700, which is a reasonable middle for the last few years.
            TXT],
            ['q' => 'Why is Ethereum\'s figure so much lower?', 'a' => <<<'TXT'
            Because it moved from proof of work to proof of stake in 2022, replacing electricity with locked capital as the security mechanism. Its per-transaction energy fell by more than 99.9 per cent, to roughly a hundredth of a kilowatt-hour.
            TXT],
            ['q' => 'Does my own transaction really consume that much?', 'a' => <<<'TXT'
            No, and yes. The network would run without you, so the marginal energy of your send is close to zero. But your share of the system's total is what the figure reports, and it is the only number anyone can attribute to a user.
            TXT],
            ['q' => 'Do carbon offsets make a transaction neutral?', 'a' => <<<'TXT'
            They move money rather than reduce electricity. Offsetting does not change the kilowatt-hours the network draws, and the quality of the credits varies enormously. The page's arithmetic is unaffected.
            TXT],
            ['q' => 'What is a household-day of electricity?', 'a' => <<<'TXT'
            One day of a typical European home's consumption, taken here as 10.5 kilowatt-hours. It includes heating, hot water, cooking and appliances, so it is a much larger unit than the electricity a laptop or a phone uses.
            TXT],
            ['q' => 'Which grid intensity should I use?', 'a' => <<<'TXT'
            The one where the mining happens, if you know it. World average is near 480 grams per kilowatt-hour; France is around 60, Sweden under 30, and a coal-heavy grid can pass 900. The choice changes the answer by a factor of three.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
