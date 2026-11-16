<?php

/**
 * Social media ban impact
 * /everyday-life/social-media-ban-impact
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Social media ban impact',
    'meta' => ['title' => 'Social media ban impact — Free Online Calculator', 'description' => 'Social media ban impact works out daily time spent using social media and time wasted using social media from age, age limit and customised age limit.', 'h1' => 'Social media ban impact Calculator', 'updated' => '2026-08-29'],
    'sections' => [
        [
            'title' => 'Which social media does your kid use?',
            'note' => 'Select all the social media that your kid uses daily.',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'TikTok',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['TikTok' => '65', '' => '0'],
                            'dataset' => 'time_TikTok',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Snapchat',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Snapchat' => '49', '' => '0'],
                            'dataset' => 'time_Snapchat',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'YouTube',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['YouTube' => '48', '' => '0'],
                            'dataset' => 'time_YouTube',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Instagram',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Instagram' => '37', '' => '0'],
                            'dataset' => 'time_Instagram',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                    ],
                ],
                [
                    'columns' => 2,
                    'grid' => 'FR2_FR3',
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'Other',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Other' => '', '' => '0'],
                            'dataset' => 'Other',
                            'control' => 'CHECKBOX',
                            'default' => '',
                        ],
                        [
                            'name' => 'time_other_sm',
                            'label' => 'Other social-media time per day',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'help' => 'Enter additional time in hours per day. Leave at zero if the selected platforms cover your usage.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_daily',
                            'label' => 'Daily time spent using social media',
                            'type' => 'number',
                            'suffix' => '/day',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_year',
                            'label' => 'Time wasted using social media',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'hidden_2',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_TikTok',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_Snapchat',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_YouTube',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_Instagram',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_Other',
                            'label' => '',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Time using Social Media ',
            'note' => 'Enter your child’s age to compute the time saved after the ban.',
            'blocks' => [
                [
                    'columns' => 2,
                    'place' => [0, 1],
                    'fields' => [
                        [
                            'name' => 'age',
                            'label' => 'Age',
                            'type' => 'number',
                            'help' => 'This value must be less than the age limit for the social media ban.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'age_ban',
                            'label' => 'Age limit',
                            'type' => 'select',
                            'options' => ['16 years' => '16', '15 years' => '15', 'Customize' => ''],
                            'dataset' => 'age_ban',
                            'control' => 'DROPDOWN',
                            'help' => 'The legal age for accessing social media.',
                            'default' => '16 years',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'upper_age',
                            'label' => 'Customised age limit',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'help' => 'This is filled from the age-limit choice; enter a custom age here when you select Customize.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'ban_bonus',
                            'label' => 'Time saved after social media ban',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Spending the time saved',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => '(isNaN(age) or isNaN(time_daily) or ban_bonus <= 0) or time_daily > 12', 'text' => 'Enter your child’s age and the time spent in social media to explore this section.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'upper_age - age <= 1', 'text' => ' By saving this time your kid can:  complete {{GCSE_bonus.formattedValue}} High School/GCSE courses after the ban ;&nbsp;'],
                                ['when' => 'upper_age - age > 1', 'text' => <<<'TXT'
                                 By saving this time your kid can:  complete {{GCSE.formattedValue}} High School/GCSE courses per year, and a total of {{GCSE_bonus.formattedValue}} courses after the ban ;&nbsp;
                                TXT],
                                ['when' => 'upper_age - age <= 1', 'text' => 'read {{books_read.formattedValue}} books after the ban ;&nbsp;'],
                                ['when' => 'upper_age - age > 1', 'text' => 'read {{books_year.formattedValue}} books per year, and a total of {{books_read.formattedValue}} books after the ban ;&nbsp;'],
                                ['when' => null, 'text' => 'watch {{podcast.formattedValue}} poadcasts per day ;&nbsp;'],
                                ['when' => 'upper_age - age <= 1', 'text' => 'make {{tracks.formattedValue}} biking trips per week, covering {{distance_cycled.formattedValue}} km/month after the ban ; or&nbsp;'],
                                ['when' => 'upper_age - age > 1', 'text' => 'make {{tracks_one_year.formattedValue}} biking trips per week, covering {{distance_cycled_total.formattedValue}} km after the ban ; or&nbsp;'],
                                ['when' => 'mastery > 0 and mastery < 0.3', 'text' => 'reach the basic level of mastering a new skill (like piano, violin, or coding) .'],
                                ['when' => 'mastery >= 0.3 and mastery < 0.7', 'text' => 'reach the intermediary level of mastering a new skill (like piano, violin, or coding) .'],
                                ['when' => 'mastery >= 0.7 and mastery < 1', 'text' => 'reach advanced level of mastering a new skill (like piano, violin, or coding) .'],
                                ['when' => 'mastery >= 1', 'text' => 'master a new skill (like piano, violin, or coding) .'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'distance_cycled',
                            'label' => 'Distance cycled',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'km',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'distance_cycled_one_year',
                            'label' => 'Distance cycled one year',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'km',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'distance_cycled_total',
                            'label' => 'Distance cycled total',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'km',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tracks',
                            'label' => 'Biking trips ',
                            'type' => 'number',
                            'suffix' => 'per week',
                            'help' => 'Considering a distance of 15 km.',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'tracks_one_year',
                            'label' => 'Tracks one year',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'GCSE',
                            'label' => 'High School / GCSE courses ',
                            'type' => 'number',
                            'help' => 'The total number of GCSE or high school 120-hour courses your child could complete.',
                            'unit' => '71',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'GCSE_bonus',
                            'label' => 'Gcse bonus',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'books_year',
                            'label' => 'Books year',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'books_read',
                            'label' => 'Books read ',
                            'type' => 'number',
                            'help' => 'The total number of 240-page books your child could read.',
                            'unit' => '19',
                            'unit_default' => 'yrs',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'podcast',
                            'label' => 'Podcasts ',
                            'type' => 'number',
                            'help' => 'The number of 45-minute podcasts that your child could watch.',
                            'unit' => '19',
                            'unit_default' => 'days',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mastery',
                            'label' => 'Mastering a new skill ',
                            'type' => 'number',
                            'suffix' => 'of 6000 hrs',
                            'help' => 'Progress toward mastering a new skill (like piano, violin, or coding). This calculation assumes a threshold of 6,000 hours of dedication.',
                            'unit' => '37',
                            'unit_default' => 'perc',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'learning_hours',
                            'label' => 'Learning hours per course',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '120',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'pages_per_book',
                            'label' => 'Pages per book',
                            'type' => 'number',
                            'suffix' => 'pages',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '240',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'words_per_page',
                            'label' => 'Words per page',
                            'type' => 'number',
                            'suffix' => 'words',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '250',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'words_per_minute',
                            'label' => 'Words per minute',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_podcast',
                            'label' => 'Podcast length',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'min',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '45',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'skill_hours',
                            'label' => 'Hours of practice',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'time_wasted',
                            'label' => 'Time wasted',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'hrs',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'upper_age = age_ban * 31,557,600 seconds per year',
            'results' => ['upper_age' => '31557600*age_ban', 'age_ban' => 'upper_age/31557600'],
        ],
        [
            'title' => 'time_TikTok = TikTok',
            'results' => ['time_TikTok' => 'TikTok'],
        ],
        [
            'title' => 'time_Snapchat = Snapchat',
            'results' => ['time_Snapchat' => 'Snapchat'],
        ],
        [
            'title' => 'time_YouTube = YouTube',
            'results' => ['time_YouTube' => 'YouTube'],
        ],
        [
            'title' => 'time_Instagram = Instagram',
            'results' => ['time_Instagram' => 'Instagram'],
        ],
        [
            'title' => 'time_year = time_daily * 365.25',
            'results' => ['time_year' => '(1461/4)*time_daily', 'time_daily' => '(4/1461)*time_year'],
        ],
        [
            'title' => 'ban_bonus = (upper_age - age) / 31,557,600 * time_year (convert the age difference from seconds to years)',
            'results' => ['ban_bonus' => '(time_year*(-age + upper_age)/31557600)', 'age' => 'upper_age-31557600*ban_bonus/time_year', 'upper_age' => 'age+31557600*ban_bonus/time_year', 'time_year' => '31557600*ban_bonus/(upper_age-age)'],
        ],
        [
            'title' => 'GCSE = one_way(floor(time_year/learning_hours))',
            'results' => ['GCSE' => '(floor(time_year/learning_hours))'],
        ],
        [
            'title' => 'GCSE_bonus = floor(ban_bonus/learning_hours)',
            'results' => ['GCSE_bonus' => 'floor(ban_bonus/learning_hours)'],
        ],
        [
            'title' => 'books_read = floor(ban_bonus*words_per_minute/(3600*pages_per_book*words_per_page))',
            'results' => ['books_read' => 'floor(ban_bonus*words_per_minute/(3600*pages_per_book*words_per_page))'],
        ],
        [
            'title' => 'books_year = floor(time_year*words_per_minute/(3600*pages_per_book*words_per_page))',
            'results' => ['books_year' => 'floor(time_year*words_per_minute/(3600*pages_per_book*words_per_page))'],
        ],
        [
            'title' => 'podcast = one_way(floor(time_daily/time_podcast))',
            'results' => ['podcast' => '(floor(time_daily/time_podcast))'],
        ],
        [
            'title' => 'mastery = ban_bonus/skill_hours',
            'results' => ['mastery' => 'ban_bonus/skill_hours'],
        ],
        [
            'title' => 'distance_cycled = ban_bonus/3600*4.5 (hours saved times 4.5 km/h)',
            'results' => ['distance_cycled' => 'ban_bonus*4.5/3600'],
        ],
        [
            'title' => 'distance_cycled_one_year = time_daily*365.25/3600*4.5',
            'results' => ['distance_cycled_one_year' => 'time_daily*365.25*4.5/3600'],
        ],
        [
            'title' => 'distance_cycled_total = ban_bonus/3600*4.5',
            'results' => ['distance_cycled_total' => 'ban_bonus*4.5/3600'],
        ],
        [
            'title' => 'tracks = ceil(distance_cycled/60) (60 km per track)',
            'results' => ['tracks' => 'ceil(distance_cycled/60)'],
        ],
        [
            'title' => 'tracks_one_year = ceil(distance_cycled_one_year/60)',
            'results' => ['tracks_one_year' => 'ceil(distance_cycled_one_year/60)'],
        ],
        [
            'title' => 'time_wasted = time_daily',
            'results' => ['time_wasted' => 'time_daily', 'time_daily' => 'time_wasted'],
        ],
        [
            'title' => 'time_other_sm defaults to 0 when no additional daily time is entered',
            'results' => ['time_other_sm' => '0'],
        ],
        [
            'title' => 'time_daily = 60*(time_TikTok+time_Snapchat+time_YouTube+time_Instagram) + time_other_sm (seconds per day)',
            'results' => [
                'time_Snapchat' => '(1/60)*time_daily - time_Instagram - time_TikTok - time_YouTube - (1/60)*time_other_sm',
                'time_other_sm' => 'time_daily-60*(time_Instagram+time_Snapchat+time_TikTok+time_YouTube)',
                'time_Instagram' => '(1/60)*time_daily - time_Snapchat - time_TikTok - time_YouTube - (1/60)*time_other_sm',
                'time_daily' => '60*(time_Instagram+time_Snapchat+time_TikTok+time_YouTube)+time_other_sm',
                'time_TikTok' => '(1/60)*time_daily - time_Instagram - time_Snapchat - time_YouTube - (1/60)*time_other_sm',
                'time_YouTube' => '(1/60)*time_daily - time_Instagram - time_Snapchat - time_TikTok - (1/60)*time_other_sm',
            ],
        ],
    ],
    'article' => [
        'intro' => 'Give the Social media ban impact calculator the daily time spent using social media and the age and it returns <strong>time wasted using social media</strong>.',
        'sections' => [
            ['title' => 'How does the Social media ban impact calculator work?', 'html' => <<<'TXT'
            <p>The Social media ban impact calculator takes the values in the form, applies the relationship described below and reports <strong>time wasted using social media</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the age limit); then you type in the daily time spent using social media, the age, the learning hours per course and the pages per book.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A single on/off switch — tick it for &ldquo;TikTok&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>A single on/off switch — tick it for &ldquo;Snapchat&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>A single on/off switch — tick it for &ldquo;YouTube&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>A single on/off switch — tick it for &ldquo;Instagram&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>A single on/off switch — tick it for &ldquo;Other&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li><li>A measured quantity, entered by default in hours. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in years. The unit chip switches it to any of the 27 supported units.</li><li>Pick the option that matches your case — 3 options, such as 16 years, 15 years and customize. </li><li>A measured quantity, entered by default in hours. The unit chip switches it to any of the 27 supported units.</li><li>A number, expressed in pages.</li><li>A number, expressed in words.</li><li>A measured quantity, entered by default in minutes. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in minutes. The unit chip switches it to any of the 27 supported units.</li><li>A measured quantity, entered by default in hours. The unit chip switches it to any of the 27 supported units.</li></ul><p>6 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Daily time spent using social media</strong></td><td>A measured quantity, 27 units available.</td><td>hours</td><td>You supply it</td></tr><tr><td><strong>Time wasted using social media</strong></td><td>A measured quantity, 27 units available.</td><td>hours</td><td>Calculated</td></tr><tr><td><strong>Age</strong></td><td>A measured quantity, 27 units available.</td><td>years</td><td>You supply it</td></tr><tr><td><strong>Age limit</strong></td><td>One of 3 options, such as 16 years, 15 years and customize.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Customised age limit</strong></td><td>A number stated in yrs.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Time saved after social media ban</strong></td><td>A measured quantity, 27 units available.</td><td>hours</td><td>Calculated</td></tr><tr><td><strong>Distance cycled</strong></td><td>A measured quantity, 34 units available.</td><td>kilometers</td><td>Calculated</td></tr><tr><td><strong>Distance cycled one year</strong></td><td>A measured quantity, 34 units available.</td><td>kilometers</td><td>Calculated</td></tr><tr><td><strong>Distance cycled total</strong></td><td>A measured quantity, 34 units available.</td><td>kilometers</td><td>Calculated</td></tr><tr><td><strong>Biking trips</strong></td><td>A number stated in per week.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Tracks one year</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>High School / GCSE courses</strong></td><td>A measured quantity, 7 units available.</td><td>years</td><td>Calculated</td></tr><tr><td><strong>Gcse bonus</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Books year</strong></td><td>A measured quantity, 27 units available.</td><td>years</td><td>Calculated</td></tr><tr><td><strong>Books read</strong></td><td>A measured quantity, 27 units available.</td><td>years</td><td>Calculated</td></tr><tr><td><strong>Podcasts</strong></td><td>A measured quantity, 27 units available.</td><td>days</td><td>Calculated</td></tr><tr><td><strong>Mastering a new skill</strong></td><td>A measured quantity, 6 units available.</td><td>percent</td><td>Calculated</td></tr><tr><td><strong>Learning hours per course</strong></td><td>A measured quantity, 27 units available.</td><td>hours</td><td>You supply it</td></tr><tr><td><strong>Pages per book</strong></td><td>A number stated in pages.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Words per page</strong></td><td>A number stated in words.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Words per minute</strong></td><td>A measured quantity, 27 units available.</td><td>minutes</td><td>You supply it</td></tr><tr><td><strong>Podcast length</strong></td><td>A measured quantity, 27 units available.</td><td>minutes</td><td>You supply it</td></tr><tr><td><strong>Hours of practice</strong></td><td>A measured quantity, 27 units available.</td><td>hours</td><td>You supply it</td></tr><tr><td><strong>Time wasted</strong></td><td>A measured quantity, 27 units available.</td><td>hours</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Social media ban impact calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Time wasted using social media</span><span class="formula-eq">=</span><span class="formula-rhs">(1461 ÷ 4) × daily time spent using social media</span></div><div class="formula-row"><span class="formula-lhs">Time saved after social media ban</span><span class="formula-eq">=</span><span class="formula-rhs">(time wasted using social media × (-age + customised age limit))</span></div><div class="formula-row"><span class="formula-lhs">High School / GCSE courses</span><span class="formula-eq">=</span><span class="formula-rhs">(rounded down, (time wasted using social media ÷ learning hours per course))</span></div><div class="formula-row"><span class="formula-lhs">Gcse bonus</span><span class="formula-eq">=</span><span class="formula-rhs">(rounded down, ((time wasted using social media × (-age + customised age limit)) ÷ learning hours per course))</span></div><div class="formula-row"><span class="formula-lhs">Books read</span><span class="formula-eq">=</span><span class="formula-rhs">(rounded down, (60 × words per minute × (time wasted using social media × (-age + customised age limit)) ÷ (pages per book × words per page)))</span></div><div class="formula-row"><span class="formula-lhs">Books year</span><span class="formula-eq">=</span><span class="formula-rhs">(rounded down, (60 × time wasted using social media × words per minute ÷ (pages per book × words per page)))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in hours, and convertible to any of the 27 units on that chip.</li><li>Shown in hours, and convertible to any of the 27 units on that chip.</li><li>Shown in years, and convertible to any of the 7 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>Shown in years, and convertible to any of the 27 units on that chip.</li><li>Shown in years, and convertible to any of the 27 units on that chip.</li><li>Shown in days, and convertible to any of the 27 units on that chip.</li><li>Shown in percent, and convertible to any of the 6 units on that chip.</li><li>Shown in kilometers, and convertible to any of the 34 units on that chip.</li><li>Shown in kilometers, and convertible to any of the 34 units on that chip.</li><li>Shown in kilometers, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in hours</li><li>Time, opening in hours</li><li>Time, opening in hours</li><li>Time, opening in years</li><li>Time, opening in hours</li><li>Length, opening in kilometers</li><li>Length, opening in kilometers</li><li>Length, opening in kilometers</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Social media ban impact calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 2 figures keep coming back — the daily time spent using social media and the age — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/email-alternatives">Email alternatives</a>, <a href="/everyday-life/engine-hours-to-miles-converter">Engine hours to miles converter</a> and <a href="/everyday-life/english-learning">English learning time</a>.</p>
            TXT],
            ['title' => 'A worked example with these formulas', 'html' => <<<'TXT'
            <p> Enter TikTok = 0, Snapchat = 0, YouTube = 0, Instagram = 0, Other = 0, Age = 3 and Age limit = 16. The calculator returns <strong>Daily time spent using social media</strong> = 0 /day, <strong>Time wasted using social media</strong> = 0 and <strong>Time saved after social media ban</strong> = 0.</p><p>The relationship behind those numbers is <strong>Time wasted using social media</strong> = <code>(1461/4) × time_daily</code>. </p>
            TXT],
            ['title' => 'Detailed use notes', 'html' => <<<'TXT'
            <p>Start with the platforms that are actually used on a typical day. The page assigns time values to selected services and lets you enter a separate daily amount for other social media. The total converts minutes per day into longer-period totals, so even a modest daily habit becomes a larger weekly or yearly number. Check whether you selected each platform once and whether the “other” field overlaps with time already counted.</p><p>The ban scenario compares the current age with a selected age limit and estimates the interval remaining before that threshold. The time-saved result assumes the daily usage pattern continues unchanged throughout that interval. Reading, cycling, study and other activity equivalents are illustrative conversions based on the page’s stated assumptions; they are not guaranteed outcomes of a policy.</p><p>This model does not establish what a law requires, whether a platform blocks access, or how a young person will use the time instead. Real use can change, and family rules, enforcement and individual circumstances matter. Treat the results as a way to visualize scale, not as evidence that a restriction will cause a specific behavior or benefit. Check the selected age and time units before comparing scenarios.</p>
            TXT],
            ['title' => 'Before using the estimate', 'html' => <<<'TXT'
            <p>Use a typical daily estimate rather than the longest day or a single unusual session. The platform controls represent the page’s built-in usage assumptions; choose the services used, then add other social-media time only for activity not already represented. The total time per day is the basis for the annual and age-limit projections, so double-counted minutes inflate every downstream result.</p><p>The ban interval is determined by the child’s age and the selected limit. For a custom limit, enter the intended age in the custom field and check that the unit is years. The time-saved estimate assumes the same daily pattern throughout that interval. Other outputs—such as books, study, podcasts or cycling—translate time into illustrative alternatives using the assumptions printed on the page; they are not guaranteed outcomes.</p><p>This calculator is not a legal interpretation of a social-media age rule and does not predict behavior. Access, enforcement, family decisions and usage habits can all change. Use the answer to understand scale, then discuss the actual policy and alternatives with the people affected. Do not treat a numerical projection as proof that a restriction will produce a particular educational, health or social benefit.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Social media ban impact calculator work out?', 'a' => 'It returns time wasted using social media, derived from the daily time spent using social media and the age.'],
            ['q' => 'What do I need to enter to use the Social media ban impact calculator?', 'a' => 'The form asks for the daily time spent using social media and the age, which is 14 fields in total.'],
            ['q' => 'Can I enter time other sm in a different unit?', 'a' => 'Yes. Time other sm opens in hours and the chip beside it offers 27 units.'],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => 'There are several choices to make (6 in total), and each one selects a different case rather than scaling the result.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Daily time spent using social media = 0 hrs.'],
        ],
        'related' => [
            ['path' => '/everyday-life/email-alternatives', 'name' => 'Email alternatives'],
            ['path' => '/everyday-life/engine-hours-to-miles-converter', 'name' => 'Engine hours to miles converter'],
            ['path' => '/everyday-life/english-learning', 'name' => 'English learning time'],
        ],
    ],
];
