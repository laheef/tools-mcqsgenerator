<?php

/**
 * Wind Turbine Profit Calculator
 * /ecology/wind-turbine-profit
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Wind Turbine Profit Calculator',
    'meta' => ['title' => 'Wind Turbine Profit Calculator: Revenue and Payback', 'description' => 'Model a wind turbine\'s annual revenue, running costs, payback and levelised cost of electricity from its capacity, capacity factor, price and capital cost.', 'h1' => 'Wind Turbine Profit Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The machine and the site',
            'fields' => [
                [
                    'name' => 'capacity',
                    'min' => '0.001',
                    'label' => 'Rated capacity',
                    'type' => 'number',
                    'suffix' => 'kW',
                    'default' => '2000',
                    'rounding' => ['standard', '0'],
                    'help' => 'A single modern onshore turbine is 2 to 5 megawatts.',
                ],
                [
                    'name' => 'capacity_factor',
                    'min' => '0.001',
                    'max' => '100',
                    'label' => 'Capacity factor',
                    'type' => 'number',
                    'suffix' => '%',
                    'default' => '35',
                    'rounding' => ['standard', '0'],
                    'help' => 'Onshore 25 to 40; offshore 40 to 55.',
                ],
                [
                    'name' => 'price',
                    'min' => '0',
                    'label' => 'Price received',
                    'type' => 'number',
                    'suffix' => '€/MWh',
                    'default' => '70',
                    'rounding' => ['omni', '0.1'],
                ],
            ],
        ],
        [
            'title' => 'Costs',
            'fields' => [
                [
                    'name' => 'capex',
                    'min' => '0',
                    'label' => 'Capital cost',
                    'type' => 'number',
                    'suffix' => '€',
                    'default' => '2400000',
                    'rounding' => ['standard', '0'],
                    'help' => 'About 1,200 euros per kilowatt installed onshore.',
                ],
                [
                    'name' => 'opex',
                    'min' => '0',
                    'label' => 'Running cost per year',
                    'type' => 'number',
                    'suffix' => '€',
                    'default' => '30000',
                    'rounding' => ['standard', '0'],
                    'help' => 'Service, insurance, land lease, grid charges.',
                ],
                [
                    'name' => 'years',
                    'label' => 'Operating life',
                    'type' => 'number',
                    'suffix' => 'years',
                    'default' => '20',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                ],
            ],
        ],
        [
            'title' => 'The business case',
            'fields' => [
                [
                    'name' => 'annual_mwh',
                    'label' => 'Generation per year',
                    'type' => 'number',
                    'suffix' => 'MWh',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'revenue',
                    'label' => 'Revenue per year',
                    'type' => 'number',
                    'suffix' => '€',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'net',
                    'label' => 'Net income per year',
                    'type' => 'number',
                    'suffix' => '€',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'payback',
                    'label' => 'Simple payback (0 = none)',
                    'type' => 'number',
                    'suffix' => 'years',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'lcoe',
                    'label' => 'Levelised cost',
                    'help' => 'Capital plus lifetime running cost, divided by lifetime generation. Payback is zero when net income is not positive.',
                    'type' => 'number',
                    'suffix' => '€/MWh',
                    'readonly' => true,
                    'rounding' => ['omni', '0.1'],
                ],
                [
                    'name' => 'lifetime_net',
                    'label' => 'Net over the life',
                    'type' => 'number',
                    'suffix' => '€',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Generation and revenue',
            'results' => ['annual_mwh' => 'capacity * capacity_factor / 100 * 8760 / 1000', 'revenue' => 'annual_mwh * price', 'net' => 'revenue - opex'],
        ],
        [
            'title' => 'Returns',
            'results' => ['payback' => '(net > 0 ? capex / net : 0)', 'lcoe' => '(capex + opex * years) / (annual_mwh * years)', 'lifetime_net' => 'net * years - capex'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>A 2-megawatt turbine at a 35 per cent capacity factor generates 6,132 megawatt-hours a year and earns 429,240 euros at 70 euros a megawatt-hour. After 30,000 euros of running costs the net is 399,240, which pays back the 2.4-million-euro capital cost in 6 years and leaves 5,584,800 over twenty — at a levelised cost of 24.5 euros per megawatt-hour.</p>
        TXT,
        'sections' => [
            ['title' => 'Six numbers and one equation', 'html' => <<<'TXT'
            <p>Wind economics are unusually simple: capacity times capacity factor times hours gives generation, generation times price gives revenue, revenue minus costs gives cash.</p><p>Everything that decides a project's fate lives in two of those numbers — the capacity factor, which is a property of the site, and the price, which is a property of the market.</p><p>The rest is engineering and accounting. That is why wind farms are financed on measured wind data and a power purchase agreement rather than on a turbine brochure.</p>
            TXT],
            ['title' => 'Six thousand one hundred and thirty-two megawatt-hours', 'html' => <<<'TXT'
            <p>2,000 kilowatts at 35 per cent of 8,760 hours is 6,132 megawatt-hours — 6,132 in the panel. That is the output of about 1,750 European households.</p><p>The same machine at 25 per cent produces 4,380; at 45 per cent, 7,884. The capacity factor moves revenue by 80 per cent across a plausible range of sites.</p><p>Which is why a wind farm is bought with a wind study attached. Two identical turbines ten kilometres apart can differ by a third in annual income.</p>
            TXT],
            ['title' => 'Price: merchant, contract or subsidy', 'html' => <<<'TXT'
            <p>Seventy euros a megawatt-hour is roughly the European wholesale average of the last few years, with a wide range: 20 euros in a windy spring afternoon and 300 in a cold still evening.</p><p>A merchant project takes that price and its volatility. A project with a power purchase agreement takes a fixed price and gives up the upside. A contract for difference takes a strike price and returns the difference.</p><p>Almost every wind farm built in Europe is financed on one of the last two. Merchant risk is for the very large or the very brave.</p>
            TXT],
            ['title' => 'Two point four million euros, and where it goes', 'html' => <<<'TXT'
            <p>Onshore wind costs 1,000 to 1,500 euros per kilowatt installed, so a 2-megawatt machine is 2.4 million. The turbine itself is about half; foundations, roads, cabling and the grid connection are the rest.</p><p>That is a capital-heavy business: the fuel is free and the maintenance is low, so nearly all the cost is paid before the first kilowatt-hour.</p><p>It is also why finance cost matters so much. A project at 8 per cent interest pays back in 6 years; the same project at 4 per cent pays back in five and is worth far more.</p>
            TXT],
            ['title' => 'Running costs', 'html' => <<<'TXT'
            <p>Thirty thousand euros a year is about 15 per cent of revenue — service contract, insurance, land lease, grid charges and minor repairs.</p><p>Older turbines cost more to maintain as they age, and a gearbox replacement in year twelve can be 10 per cent of the original capital. Manufacturers now offer full-service contracts for the first ten to fifteen years.</p><p>Land lease is usually 3 to 5 per cent of revenue to the landowner, which is why rural communities that host turbines have a stake in their output — and why a farmer with two turbines can earn more from the wind than from the sheep.</p>
            TXT],
            ['title' => 'Payback in six years, or fifteen', 'html' => <<<'TXT'
            <p>6 years of simple payback on a 20-year asset looks comfortable, and it is — for the price assumed. Cut the price to 40 euros and the payback stretches to 6 years at the same site.</p><p>Simple payback also ignores the discount rate. A proper calculation discounts the future cash flows, which lengthens the payback and lowers the net present value.</p><p>The number in the panel is the screening figure a developer uses before spending money on a wind study, not the number a bank lends against. Banks want a discounted cash flow, a debt service cover ratio and a sensitivity table.</p>
            TXT],
            ['title' => 'Levelised cost, and why it is the right comparison', 'html' => <<<'TXT'
            <p>24.5 euros per megawatt-hour is the capital plus lifetime running cost divided by lifetime generation. It is the price at which the project breaks even over its life.</p><p>Gas plant is 60 to 120 depending on the fuel price; nuclear is 100 to 150; offshore wind is 60 to 90 and falling. Onshore wind at 25 to 45 is among the cheapest electricity available.</p><p>Levelised cost ignores when the power arrives, which is the criticism that matters: cheap electricity at 3 a.m. is worth less than expensive electricity at 6 p.m.</p>
            TXT],
            ['title' => 'The system costs the project does not pay', 'html' => <<<'TXT'
            <p>A grid with a lot of wind needs backup, interconnection and storage. Those costs are real and are carried by the system rather than by the wind farm.</p><p>That is not an argument against wind; it is an argument for pricing system costs honestly, which no market does completely. Gas plant also imposes costs that its price does not reflect.</p><p>The practical consequence is that a high-wind system costs more than the sum of its levelised costs, by an amount that depends on how much storage and interconnection it builds.</p>
            TXT],
            ['title' => 'Repowering and the second life', 'html' => <<<'TXT'
            <p>After twenty years a turbine is at the end of its design life but its site, foundation and grid connection are not. Repowering — replacing the machine with a larger one — is usually the best economics in the industry.</p><p>A modern 4-megawatt machine on an old foundation can double the output for half the cost of a new site, because the connection already exists.</p><p>That is why the old wind farms of the 2000s are being rebuilt rather than decommissioned, and why the installed capacity keeps rising without new land.</p>
            TXT],
            ['title' => 'What could go wrong', 'html' => <<<'TXT'
            <p>The wind is lower than the study said. The price collapses because the grid is saturated at the wrong hours. The grid connection is delayed two years. A gearbox fails outside warranty.</p><p>Any one of those can halve a project's return. Lenders respond with stricter terms, which raises the cost of capital, which lengthens the payback.</p><p>Which is why the honest version of this page is a set of boxes rather than a number. Change the capacity factor and the price and watch the payback move; that sensitivity is the actual analysis.</p>
            TXT],
            ['title' => 'How wind farms are actually financed', 'html' => <<<'TXT'
            <p>Twenty per cent equity, eighty per cent debt is the standard structure. The debt is secured on the power purchase agreement and the wind study, and it is repaid over fifteen years from revenue.</p><p>That debt load is why the cost of capital dominates. A one-point rise in the interest rate cuts a project's return by more than a one-point fall in the price it receives, because the capital is most of the cost.</p><p>It is also why the industry's levelised costs fell so sharply as turbines got cheaper and as lenders learned to price wind risk. Both moved at once.</p>
            TXT],
            ['title' => 'The auction prices that surprised everyone', 'html' => <<<'TXT'
            <p>Several European auctions have cleared at prices that imply zero subsidy — the developer sells at the wholesale price and takes the merchant risk, or signs a private contract.</p><p>That works when the site is excellent, the capital is cheap and the price is high enough. It fails when those three coincide less well, which is what happened to offshore projects in 2022 and 2023 when interest rates and supply chain costs rose together.</p><p>No bids at all were received in one British offshore round. The arithmetic had moved, and no amount of policy enthusiasm could move it back.</p>
            TXT],
            ['title' => 'Community ownership and the local share', 'html' => <<<'TXT'
            <p>Denmark requires 20 per cent community ownership of new wind projects; Scotland has a similar expectation in its planning guidance. The effect on returns is small and the effect on consent is large.</p><p>A community that receives a share of the revenue argues differently about noise and shadow flicker than one that receives only a lease payment to a distant landowner.</p><p>It also changes the project's politics: wind farms are popular in the abstract and contested in the particular, and ownership is the variable that predicts which.</p>
            TXT],
            ['title' => 'When to walk away', 'html' => <<<'TXT'
            <p>Three numbers kill a project: a capacity factor below 25 per cent, a price below 40 euros without a contract, and a grid connection cost above 20 per cent of capital.</p><p>Any two of those together and the payback exceeds the asset's life, which is the point at which a developer stops spending money.</p><p>The page lets you test each one in a minute. Set the capacity factor to 20 and the payback stretches past twenty years; that is a site you decline.</p>
            TXT],
            ['title' => 'What the price actually is', 'html' => <<<'TXT'
            <p>Wholesale electricity prices are set hourly by the most expensive plant needed to meet demand. When the wind blows, that plant is often a gas turbine running at part load, and the price falls.</p><p>The effect is called cannibalisation: the more wind on the system, the lower the price wind receives. A project underwritten at today's average price may find that its own output has devalued the very market it sells into.</p><p>Which is why contracts for difference exist. They pay a fixed strike price and claw back the difference when the market price rises above it, removing the cannibalisation risk that no individual developer can hedge.</p>
            TXT],
            ['title' => 'The formula rearranged', 'html' => <<<'TXT'
            <p>Six inputs and six outputs, all of them plain arithmetic.</p><ul><li><strong>Generation</strong> = capacity × capacity factor ÷ 100 × 8,760 ÷ 1,000</li><li><strong>Revenue</strong> = generation × price</li><li><strong>Net</strong> = revenue − running cost</li><li><strong>Payback</strong> = capital ÷ net</li><li><strong>Levelised cost</strong> = (capital + running cost × years) ÷ (generation × years)</li><li><strong>Net over life</strong> = net × years − capital</li></ul><p>Inverted, the price box answers the threshold question: at what price does this site pay back in ten years? About 45 euros a megawatt-hour at these costs.</p>
            TXT],
            ['title' => 'Where the estimate is optimistic', 'html' => <<<'TXT'
            <p>It ignores inflation, tax, depreciation, debt service and the cost of connecting to a grid that may require reinforcement.</p><p>It assumes the turbine runs at its capacity factor for twenty years without a major failure and without curtailment.</p><p>And it assumes the price holds. The 70 euros in the box is an average of a volatile series, and a project financed on the average can still fail in a bad year.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How much profit does a wind turbine make?', 'a' => 'At the page\'s defaults, 399,240 euros a year after running costs on 6,132 megawatt-hours — 5,584,800 over twenty years against a 2.4-million-euro investment.'],
            ['q' => 'What is the payback period for a wind turbine?', 'a' => 'About 6 years at 70 euros a megawatt-hour and a 35 per cent capacity factor. At 40 euros the payback roughly doubles; a better site shortens it.'],
            ['q' => 'What is levelised cost of electricity?', 'a' => <<<'TXT'
            The lifetime cost divided by lifetime generation, which for this project is 24.5 euros per megawatt-hour. It is the standard way to compare technologies with different capital and fuel profiles.
            TXT],
            ['q' => 'Why does the capacity factor matter so much?', 'a' => <<<'TXT'
            Because it multiplies generation directly. Going from 30 to 40 per cent adds a third to revenue without adding to capital cost, which is why site selection is the most valuable decision in the project.
            TXT],
            ['q' => 'Is onshore wind profitable without subsidy?', 'a' => <<<'TXT'
            In good sites and good markets, yes. At 25 to 45 euros per megawatt-hour levelised cost against wholesale prices of 60 to 80, the arithmetic works — which is why auctions now clear at zero subsidy in several countries.
            TXT],
            ['q' => 'What happens to a turbine after twenty years?', 'a' => <<<'TXT'
            Usually it is repowered: the old machine is replaced with a larger one on the same foundation and grid connection, which is cheaper than a new site and doubles the output.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
