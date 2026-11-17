<?php

/**
 * Beer pong
 * /food/beer-pong
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Beer pong',
    'meta' => ['title' => 'Beer pong Calculator: Formula, Steps & Examples', 'description' => 'Work out beer-pong games, teams and beer needs from the number of players and setup. Check units and follow the recipe or package directions.', 'h1' => 'Beer pong Calculator', 'updated' => '2026-07-30'],
    'sections' => [
        [
            'title' => 'Setup',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'players_per_team',
                            'label' => 'Players per team',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '2',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'no_of_teams',
                            'label' => 'Teams',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'no_of_tables',
                            'label' => 'Tables',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '1',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'no_of_games',
                            'label' => 'Games to play',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cups_per_team',
                            'label' => 'Cups per team per game',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beer_per_team_per_game',
                            'label' => 'Beer per team per game',
                            'type' => 'number',
                            'unit' => '70',
                            'unit_default' => 'lb500',
                            'rounding' => ['omni', '0.0001'],
                            'defaults' => [
                                ['value' => '2', 'when' => null],
                                ['value' => '3', 'when' => 'userUsesImperialUnits()'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beer_in_cup',
                            'label' => 'Beer per cup',
                            'type' => 'number',
                            'unit' => '70',
                            'unit_default' => 'lb500',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_of_game',
                            'label' => 'Time per game',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '20',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_of_tournament',
                            'label' => 'Tournament duration',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrsmin',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Shopping',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beer_per_tournament',
                            'label' => 'Beer needed',
                            'type' => 'number',
                            'unit' => '70',
                            'unit_default' => 'lb500',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cost_of_beer',
                            'label' => 'Price of beer',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'beer_costs',
                            'label' => 'Total beer expenses',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'entrance_fee',
                            'label' => 'Expenses per person',
                            'type' => 'number',
                            'suffix' => '/player',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'How drunk can you get?',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'sex',
                            'label' => 'Sex',
                            'type' => 'select',
                            'options' => ['Male' => '0', 'Female' => '1'],
                            'dataset' => 'sex',
                            'default' => 'Male',
                        ],
                        [
                            'name' => 'body_weight',
                            'label' => 'Body weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'max_beer_per_person',
                            'label' => 'How much you drank',
                            'type' => 'number',
                            'unit' => '70',
                            'unit_default' => 'lb500',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'percentage_content',
                            'label' => 'Alcohol content of beer',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '5',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'alcohol_weight',
                            'label' => 'Raw alcohol',
                            'type' => 'number',
                            'unit' => '20',
                            'unit_default' => 'ml',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bac',
                            'label' => 'Blood alcohol content',
                            'type' => 'number',
                            'unit' => '37',
                            'unit_default' => 'permille',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'beer_costs  = no_of_teams * players_per_team * entrance_fee',
            'results' => ['beer_costs' => 'entrance_fee*no_of_teams*players_per_team', 'entrance_fee' => 'beer_costs/(no_of_teams*players_per_team)', 'no_of_teams' => 'beer_costs/(entrance_fee*players_per_team)', 'players_per_team' => 'beer_costs/(entrance_fee*no_of_teams)'],
        ],
        [
            'title' => 'beer_per_tournament = beer_in_cup * cups_per_team * 2 * no_of_games ',
            'results' => ['beer_in_cup' => '(1/2)*beer_per_tournament/(cups_per_team*no_of_games)', 'beer_per_tournament' => '2*beer_in_cup*cups_per_team*no_of_games', 'cups_per_team' => '(1/2)*beer_per_tournament/(beer_in_cup*no_of_games)', 'no_of_games' => '(1/2)*beer_per_tournament/(beer_in_cup*cups_per_team)'],
        ],
        [
            'title' => 'beer_costs = beer_per_tournament *cost_of_beer',
            'results' => ['beer_costs' => 'beer_per_tournament*cost_of_beer', 'beer_per_tournament' => 'beer_costs/cost_of_beer', 'cost_of_beer' => 'beer_costs/beer_per_tournament'],
        ],
        [
            'title' => 'no_of_games =no_of_teams - 1',
            'results' => ['no_of_teams' => 'no_of_games + 1', 'no_of_games' => 'no_of_teams - 1'],
        ],
        [
            'title' => 'beer_per_team_per_game = beer_in_cup *cups_per_team',
            'results' => ['beer_in_cup' => 'beer_per_team_per_game/cups_per_team', 'beer_per_team_per_game' => 'beer_in_cup*cups_per_team', 'cups_per_team' => 'beer_per_team_per_game/beer_in_cup'],
        ],
        [
            'title' => 'bac = max(0, get_bac(alcohol_weight*1000, body_weight, sex, time_of_tournament))',
            'results' => ['bac' => 'max(0, get_bac(1000*alcohol_weight, body_weight, sex, time_of_tournament))'],
        ],
        [
            'title' => 'max_beer_per_person = beer_per_team_per_game /players_per_team *ceil(log(no_of_teams)/log(2))',
            'results' => ['beer_per_team_per_game' => 'max_beer_per_person*players_per_team/ceil(log(no_of_teams)/log(2))', 'players_per_team' => 'beer_per_team_per_game*ceil(log(no_of_teams)/log(2))/max_beer_per_person', 'max_beer_per_person' => 'beer_per_team_per_game*ceil(log(no_of_teams)/log(2))/players_per_team'],
        ],
        [
            'title' => 'alcohol_weight = max_beer_per_person  * percentage_content',
            'results' => ['percentage_content' => 'alcohol_weight/max_beer_per_person', 'alcohol_weight' => 'max_beer_per_person*percentage_content', 'max_beer_per_person' => 'alcohol_weight/percentage_content'],
        ],
        [
            'title' => 'time_of_tournament = get_tables(no_of_teams,no_of_tables) * time_of_game',
            'results' => ['time_of_game' => 'time_of_tournament/get_tables(no_of_teams, no_of_tables)', 'time_of_tournament' => 'time_of_game*get_tables(no_of_teams, no_of_tables)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_bac",function(alcohol_weight,body_weight,sex,time){var bw=[0.58,0.49],mr=[0.015,0.017],bac;bac=(0.806*1.2*alcohol_weight/17/(bw[sex]*body_weight)-mr[sex]*time)/100;return bac});omni.define("get_tables",function(teams,tables){var time=0;while(teams>1){time=time+Math.ceil(Math.floor(teams/2)/tables);teams=Math.ceil(teams/2)}return time});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Beer pong turns Players per team, Teams and Expenses per person into Games to play and Cups per team per game. Nothing is looked up on this page: games to play is computed from players per team and the other boxes, so an unusual pair of values gives an honest answer rather than an error.
        TXT,
        'sections' => [
            ['title' => 'How the Beer pong calculator works', 'html' => <<<'TXT'
            <p>The Beer pong calculator applies one relationship to 3 numbers and reports Games to play, Cups per team per game and Beer per team per game.</p><p>The relationship it solves reads Total beer expenses = Expenses per person × Teams × Players per team.</p><p>The result panel carries Games to play, Cups per team per game, Beer per team per game and Beer per cup, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 3 boxes and the page has everything it needs.</p><ul><li><strong>Players per team</strong> — a plain number, no unit</li><li><strong>Teams</strong> — a plain number, no unit</li><li><strong>Expenses per person</strong> — in /player</li></ul><p>What you get back is Games to play, Cups per team per game, Beer per team per game in 500 ml, Beer per cup in 500 ml, Time per game in minutes, Tournament duration in hours / minutes, Beer needed in 500 ml, Price of beer in USD, Total beer expenses in USD, How much you drank in 500 ml, Alcohol content of beer in percent, Raw alcohol in milliliters, Blood alcohol content in permille, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Beer per team per game offers 14 units and opens on 500 ml, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Total beer expenses</strong> = <code>Expenses per person × Teams × Players per team</code></li><li><strong>Expenses per person</strong> = <code>Total beer expenses ÷ (Teams × Players per team)</code></li><li><strong>Teams</strong> = <code>Total beer expenses ÷ (Expenses per person × Players per team)</code></li><li><strong>Players per team</strong> = <code>Total beer expenses ÷ (Expenses per person × Teams)</code></li><li><strong>Beer needed</strong> = <code>2 × Beer per cup × Cups per team per game × Games to play</code></li><li><strong>Beer per cup</strong> = <code>(1 ÷ 2) × Beer needed ÷ (Cups per team per game × Games to play)</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Total beer expenses</strong> = <code>Expenses per person × Teams × Players per team</code> — the form to use when Expenses per person, Teams and Players per team are the values you have.</li><li><strong>Expenses per person</strong> = <code>Total beer expenses ÷ (Teams × Players per team)</code> — the form to use when Total beer expenses, Teams and Players per team are the values you have.</li><li><strong>Teams</strong> = <code>Total beer expenses ÷ (Expenses per person × Players per team)</code> — the form to use when Total beer expenses, Expenses per person and Players per team are the values you have.</li><li><strong>Players per team</strong> = <code>Total beer expenses ÷ (Expenses per person × Teams)</code> — the form to use when Total beer expenses, Expenses per person and Teams are the values you have.</li><li><strong>Beer needed</strong> = <code>2 × Beer per cup × Cups per team per game × Games to play</code> — the form to use when Beer per cup, Cups per team per game and Games to play are the values you have.</li><li><strong>Beer per cup</strong> = <code>(1 ÷ 2) × Beer needed ÷ (Cups per team per game × Games to play)</code> — the form to use when Beer needed, Cups per team per game and Games to play are the values you have.</li><li><strong>Cups per team per game</strong> = <code>(1 ÷ 2) × Beer needed ÷ (Beer per cup × Games to play)</code> — the form to use when Beer needed, Beer per cup and Games to play are the values you have.</li><li><strong>Games to play</strong> = <code>(1 ÷ 2) × Beer needed ÷ (Beer per cup × Cups per team per game)</code> — the form to use when Beer needed, Beer per cup and Cups per team per game are the values you have.</li></ul><p>Any one of Total beer expenses, Expenses per person and Teams can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Games to play, Cups per team per game and Beer per team per game are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Players per team left as a guess.</strong> If Players per team is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Teams left as a guess.</strong> If Teams is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Expenses per person left as a guess.</strong> If Expenses per person is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> If Players per team is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Players per team</strong> takes a plain number with no unit attached. Change it and Total beer expenses, Expenses per person and Teams changes with it. Check the field label and unit before calculating.</li><li><strong>Teams</strong> takes a plain number with no unit attached. Change it and Total beer expenses, Expenses per person and Players per team changes with it. Check the field label and unit before calculating.</li><li><strong>Expenses per person</strong> is measured in /player. Change it and Total beer expenses, Teams and Players per team changes with it. Check the field label and unit before calculating.</li></ul><p>None of the boxes has to be filled in a particular order. </p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Players per team, Teams and Expenses per person. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Players per team into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare Games to play with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It does not scale in a straight line.</strong> Games to play is computed through a relationship that is not a simple proportion, so the size of an error depends on where in the range you are. The defaults are a starting point, not a scale factor.</li><li><strong>Only the listed units.</strong> The chips cover 500 ml, minutes and percent. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> </li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Players per team, Teams and Expenses per person and the number you are missing is Games to play and Cups per team per game.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p><p>If the answer you need is a step further on, the nearest pages are <a href="/food/grams-to-tbsp">Grams to tablespoons Calculator</a>, <a href="/food/grams-to-tsp">Grams to teaspoons Calculator</a> and <a href="/food/ham-cooking">Ham cooking time Calculator</a>.</p>
            TXT],
            ['title' => 'Limits and data handling', 'html' => <<<'TXT'
            <p>This calculator applies the relationships and assumptions shown on the page to the values entered. It cannot verify ingredient labels, measurements, equipment or conditions that are not represented in the form. Check the selected units and consult recipe, product or safety instructions where they apply.</p>
            <p>The result is a calculation, not a measurement of the food or drink. Use a scale, thermometer or product label when the real-world quantity or safety status matters.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Beer pong calculator work out?', 'a' => <<<'TXT'
            Games to play, Cups per team per game, Beer per team per game and Beer per cup, from Expenses per person, Teams and Players per team. The relationship is Total beer expenses = Expenses per person × Teams × Players per team.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            Players per team, Teams, Expenses per person (/player). Enter players per team, teams and expenses per person; Games to play is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Total beer expenses, Expenses per person, Teams and Players per team blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'How precise is the result?', 'a' => 'The arithmetic runs at full precision and only the display of Games to play is rounded.'],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Players per team left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Games to play keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/food/party-drink', 'name' => 'Party drink'],
            ['path' => '/food/wedding-alcohol', 'name' => 'Wedding alcohol'],
            ['path' => '/food/chilled-drink', 'name' => 'Chilled drink']
        ],
    ],
];
