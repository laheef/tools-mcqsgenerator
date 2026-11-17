<?php

/**
 * Money supply
 * /finance/money-supply
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Money supply',
    'meta' => ['title' => 'Money supply Calculator — Formula, Units & Example', 'description' => 'Enter notes in circulation, coins and Federal Reserve deposits and Money supply returns m0 and monetary base. The formula is printed in the form\'s own words.', 'h1' => 'Money supply Calculator', 'updated' => '2026-09-08'],
    'sections' => [
        [
            'title' => 'M0 money supply',
            'note' => 'The total of all physical currency, including coinage.',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'notes',
                            'label' => 'Notes in circulation',
                            'type' => 'number',
                            'help' => 'Federal Reserve Notes and U.S. Notes in circulation.',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2050000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'coins',
                            'label' => 'Coins',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '50000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm0',
                            'label' => 'M0',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Monetary base (MB)',
            'note' => 'The total of all physical currency plus Federal Reserve deposits.',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fed_deposit',
                            'label' => 'Federal Reserve deposits',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4050000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'monetary_base',
                            'label' => 'Monetary base',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'M1 money supply',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'demand_deposit',
                            'label' => 'Demand deposit',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4500000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'travelers_checks',
                            'label' => 'Travelers checks',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1600',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'checkable_deposits',
                            'label' => 'Checkable deposits',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4800',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'savings_accounts',
                            'label' => 'Savings accounts',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '11400000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm1',
                            'label' => 'M1',
                            'type' => 'number',
                            'help' => 'M1 = M0 + Demand deposits + Travelers checks + Checkable deposits + Savings account',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'M2 money supply',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'money_market_mutual_funds',
                            'label' => 'Money market mutual funds',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '4540000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_deposits',
                            'label' => 'Time deposits under $100,000',
                            'type' => 'number',
                            'help' => 'CDs under $100,000.',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '94200',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm2',
                            'label' => 'M2',
                            'type' => 'number',
                            'help' => 'M2 = M1 + Money market accounts + Retail money market mutual funds + Time deposits (CDs) under $100,000',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Money Zero Maturity (MZM)',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_deposits_minus',
                            'label' => 'Time deposits (minus)',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mzm',
                            'label' => 'MZM',
                            'type' => 'number',
                            'help' => 'MZM = M2 - time deposits + money market funds',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'M3 money supply',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_deposits_large',
                            'label' => 'Time deposits over $100,000',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1420',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'eurodollars_deposits',
                            'label' => 'Eurodollars deposits',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'repo_agreements',
                            'label' => 'Repurchase agreements',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1438',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm3',
                            'label' => 'M3',
                            'type' => 'number',
                            'help' => 'M3 = M2 + Time deposits (CDs) above $100,000',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'M4 money supply',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'commercial_papers',
                            'label' => 'Commercial papers',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm4_minus',
                            'label' => 'M4-',
                            'type' => 'number',
                            'help' => 'M4- = M3 + Commercial Paper',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 't_bills',
                            'label' => 'T-Bills',
                            'type' => 'number',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'm4',
                            'label' => 'M4',
                            'type' => 'number',
                            'help' => 'M4 = M4- + T-Bills',
                            'unit' => '521',
                            'unit_default' => 'million',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'm0 = notes + coins',
            'results' => ['m0' => 'coins + notes', 'notes' => '-coins + m0', 'coins' => 'm0 - notes'],
        ],
        [
            'title' => 'monetary_base =  m0 + fed_deposit',
            'results' => ['m0' => '-fed_deposit + monetary_base', 'fed_deposit' => '-m0 + monetary_base', 'monetary_base' => 'fed_deposit + m0'],
        ],
        [
            'title' => 'm1 = m0 + demand_deposit + travelers_checks + checkable_deposits + savings_accounts',
            'results' => [
                'm0' => '-checkable_deposits - demand_deposit + m1 - savings_accounts - travelers_checks',
                'travelers_checks' => '-checkable_deposits - demand_deposit - m0 + m1 - savings_accounts',
                'savings_accounts' => '-checkable_deposits - demand_deposit - m0 + m1 - travelers_checks',
                'demand_deposit' => '-checkable_deposits - m0 + m1 - savings_accounts - travelers_checks',
                'checkable_deposits' => '-demand_deposit - m0 + m1 - savings_accounts - travelers_checks',
                'm1' => 'checkable_deposits + demand_deposit + m0 + savings_accounts + travelers_checks',
            ],
        ],
        [
            'title' => 'm2 = m1  + money_market_mutual_funds + time_deposits',
            'results' => ['m2' => 'm1 + money_market_mutual_funds + time_deposits', 'time_deposits' => '-m1 + m2 - money_market_mutual_funds', 'money_market_mutual_funds' => '-m1 + m2 - time_deposits', 'm1' => 'm2 - money_market_mutual_funds - time_deposits'],
        ],
        [
            'title' => 'mzm = m2 - time_deposits_minus + money_market_mutual_funds ',
            'results' => ['m2' => '-money_market_mutual_funds + mzm + time_deposits_minus', 'mzm' => 'm2 + money_market_mutual_funds - time_deposits_minus', 'money_market_mutual_funds' => '-m2 + mzm + time_deposits_minus', 'time_deposits_minus' => 'm2 + money_market_mutual_funds - mzm'],
        ],
        [
            'title' => 'time_deposits_minus = time_deposits + time_deposits_large ',
            'results' => ['time_deposits' => '-time_deposits_large + time_deposits_minus', 'time_deposits_large' => '-time_deposits + time_deposits_minus', 'time_deposits_minus' => 'time_deposits + time_deposits_large'],
        ],
        [
            'title' => 'm3 = m2 + time_deposits_large +eurodollars_deposits + repo_agreements',
            'results' => [
                'm2' => '-eurodollars_deposits + m3 - repo_agreements - time_deposits_large',
                'time_deposits_large' => '-eurodollars_deposits - m2 + m3 - repo_agreements',
                'm3' => 'eurodollars_deposits + m2 + repo_agreements + time_deposits_large',
                'eurodollars_deposits' => '-m2 + m3 - repo_agreements - time_deposits_large',
                'repo_agreements' => '-eurodollars_deposits - m2 + m3 - time_deposits_large',
            ],
        ],
        [
            'title' => 'm4_minus = m3 + commercial_papers',
            'results' => ['m3' => '-commercial_papers + m4_minus', 'm4_minus' => 'commercial_papers + m3', 'commercial_papers' => '-m3 + m4_minus'],
        ],
        [
            'title' => 'm4 = m4_minus + t_bills',
            'results' => ['t_bills' => 'm4 - m4_minus', 'm4' => 'm4_minus + t_bills', 'm4_minus' => 'm4 - t_bills'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Money supply works out M0 and Federal Reserve deposits from Notes in circulation and Coins. It is a single relationship that reads m0 out of notes in circulation, not a table of canned results keyed by them. Units for M0 default to millions and can be changed on the answer itself.
        TXT,
        'sections' => [
            ['title' => 'How the Money supply calculator works', 'html' => <<<'TXT'
            <p>The Money supply calculator applies one relationship to 2 numbers and reports M0, Federal Reserve deposits and Monetary base.</p><p>The relationship it solves reads M0 = Coins + Notes in circulation.</p><p>What comes back is M0, Federal Reserve deposits, Monetary base and Demand deposit — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>The form asks for 2 boxes, and nothing else.</p><ul><li><strong>Notes in circulation</strong> — in millions. Federal Reserve Notes and U.S. Notes in circulation.</li><li><strong>Coins</strong> — in millions</li></ul><p>What you get back is M0 in millions, Federal Reserve deposits in millions, Monetary base in millions, Demand deposit in millions, Travelers checks in millions, Checkable deposits in millions, Savings accounts in millions, M1 in millions, Money market mutual funds in millions, Time deposits under $100,000 in millions, M2 in millions, Time deposits (minus) in millions, MZM in millions, Time deposits over $100,000 in millions, Eurodollars deposits in millions, Repurchase agreements in millions, M3 in millions, Commercial papers in millions, M4- in millions, T-Bills in millions, M4 in millions, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — Notes in circulation = 2.050e+6 million, Coins = 50000 million, Federal Reserve deposits = 4.050e+6 million, Monetary base = 10 million, Demand deposit = 4.500e+6 million, Travelers checks = 1600 million, Checkable deposits = 4800 million, Savings accounts = 1.140e+7 million, M1 = 1000 million, Money market mutual funds = 4.540e+6 million, Time deposits under $100,000 = 94200 million, M2 = 1000 million, Time deposits (minus) = 10 million, MZM = 100 million, Time deposits over $100,000 = 1420 million, Eurodollars deposits = 10000 million, Repurchase agreements = 1438 million, M3 = 1000 million, Commercial papers = 10 million, M4- = 100 million, T-Bills = 1000 million and M4 = 10 million — through the same formula and the panel reports <strong>M0</strong> = 2.100e+6 million.</p><ul><li><strong>M0</strong> = 2.100e+6 million</li></ul><p>That is <strong>M0</strong> = <code>Coins + Notes in circulation</code>, with each symbol replaced by one of the boxes above.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>M0</strong> = 2.100e+6. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>The unit chip on M0 lists 3 options and opens on millions. Moving it changes the conversion applied to that row, not the number stored behind it.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>M0</strong> = <code>Coins + Notes in circulation</code></li><li><strong>Notes in circulation</strong> = <code>− Coins + M0</code></li><li><strong>Coins</strong> = <code>M0 − Notes in circulation</code></li><li><strong>Monetary base</strong> = <code>Federal Reserve deposits + M0</code></li><li><strong>Federal Reserve deposits</strong> = <code>− M0 + Monetary base</code></li><li><strong>M1</strong> = <code>Checkable deposits + Demand deposit + M0 + Savings accounts + Travelers checks</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>M0</strong> = <code>Coins + Notes in circulation</code> — the form to use when Coins and Notes in circulation are the values you have.</li><li><strong>Notes in circulation</strong> = <code>− Coins + M0</code> — the form to use when Coins and M0 are the values you have.</li><li><strong>Coins</strong> = <code>M0 − Notes in circulation</code> — the form to use when M0 and Notes in circulation are the values you have.</li><li><strong>Monetary base</strong> = <code>Federal Reserve deposits + M0</code> — the form to use when Federal Reserve deposits and M0 are the values you have.</li><li><strong>M0</strong> = <code>− Federal Reserve deposits + Monetary base</code> — the form to use when Federal Reserve deposits and Monetary base are the values you have.</li><li><strong>Federal Reserve deposits</strong> = <code>− M0 + Monetary base</code> — the form to use when M0 and Monetary base are the values you have.</li><li><strong>M1</strong> = <code>Checkable deposits + Demand deposit + M0 + Savings accounts + Travelers checks</code> — the form to use when Checkable deposits, Demand deposit, M0 and Savings accounts are the values you have.</li><li><strong>M0</strong> = <code>− Checkable deposits − Demand deposit + M1 − Savings accounts − Travelers checks</code> — the form to use when Checkable deposits, Demand deposit, M1 and Savings accounts are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of M0, Notes in circulation and Coins can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double Notes in circulation from 2.050e+6 to 4.100e+6, leaving every other box alone. The panel moves from <strong>M0</strong> 2.100e+6 million to <strong>M0</strong> 4.150e+6 million.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> Notes in circulation and Coins carry a unit chip, and it is easy to type a value in one unit while the chip says another. The conversion happens silently, so the answer comes back wrong by exactly the ratio between the two.</li><li><strong>The answer typed back in.</strong> M0, Federal Reserve deposits and Monetary base are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>Notes in circulation left as a guess.</strong> Anything typed into Notes in circulation is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Coins left as a guess.</strong> Anything typed into Coins is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert Notes in circulation to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Notes in circulation</strong> is a millions quantity: the page opens it in million and converts anything else you pick before the formula runs. Federal Reserve Notes and U.S. Notes in circulation. Change it and M0 and Coins changes with it. Have it to hand before you start: Notes in circulation is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Coins</strong> is a millions quantity: the page opens it in million and converts anything else you pick before the formula runs. Change it and M0 and Notes in circulation changes with it. Have it to hand before you start: Coins is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Notes in circulation and Coins. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Notes in circulation into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare M0 in million with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind M0 is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>Only the listed units.</strong> The unit tables here are millions and nothing beyond them. There is no &quot;other&quot; option, so an unusual unit has to be converted by hand first.</li><li><strong>It is a formula, not a model of your case.</strong> The page assumes Notes in circulation and Coins are measured, independent and in the unit the chip says. It has no way to know that one of them was estimated, that two were taken at different times of day, or that the relationship shifts at the extremes of its range.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Notes in circulation and Coins and the number you are missing is M0 and Federal Reserve deposits.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Two more from the same section come up alongside this one: <a href="/finance/prorated-salary">Prorated salary</a>, <a href="/finance/put-call-parity">Put-call parity Calculator</a> and <a href="/finance/pvifa">PVIFA</a>.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Money supply calculator work out?', 'a' => 'M0, Federal Reserve deposits, Monetary base and Demand deposit, from Coins and Notes in circulation. The relationship is M0 = Coins + Notes in circulation.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Notes in circulation (millions), Coins (millions). Enter notes in circulation and coins; M0 is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. M0, Notes in circulation, Coins and Monetary base can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'What answer do the default values give?', 'a' => 'M0 = 2.100e+6 million. That comes from the page\'s own defaults, entered in Notes in circulation; change one of them and the whole set is recomputed.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            M0 is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Notes in circulation left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of M0 keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/prorated-salary', 'name' => 'Prorated salary'],
            ['path' => '/finance/put-call-parity', 'name' => 'Put-call parity Calculator'],
            ['path' => '/finance/pvifa', 'name' => 'PVIFA'],
        ],
        'authors' => [],
    ],
];
