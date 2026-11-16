<?php

/**
 * Sex frequency
 * /everyday-life/sex
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Sex frequency',
    'meta' => ['title' => 'Sex frequency Calculator — Formula, Units & Example', 'description' => 'Sex frequency turns how often do you have sex? and age into age std and sex acts age. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Sex frequency Calculator', 'updated' => '2025-03-17'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sex',
                            'label' => 'How often do you have sex?',
                            'type' => 'number',
                            'unit' => '19',
                            'unit_default' => 'mos',
                            'rounding' => ['standard', '0'],
                            'default' => '6',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'age',
                            'label' => 'Age',
                            'type' => 'number',
                            'help' => 'Enter your age.',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '25',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gender',
                            'label' => 'Sex',
                            'type' => 'select',
                            'options' => ['Man' => '1', 'Woman' => '2'],
                            'dataset' => 'gender',
                            'default' => 'Man',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'race',
                            'label' => 'Ethnicity',
                            'type' => 'select',
                            'options' => ['Caucasian' => '1', 'African American' => '2', 'Other' => '3'],
                            'dataset' => 'race',
                            'default' => 'Other',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'marital',
                            'label' => 'Marital status',
                            'type' => 'select',
                            'options' => ['Never married' => '1', 'Married' => '2', 'Divorced' => '3', 'Widowed' => '4'],
                            'dataset' => 'mnarital_status',
                            'default' => 'Never married',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'education',
                            'label' => 'Education',
                            'type' => 'select',
                            'options' => ['High school degree or less' => '1', '2-year college degree or more' => '2'],
                            'dataset' => 'education',
                            'default' => 'High school degree or less',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'result >= -100 and result < -90', 'text' => 'There are a few things in this life that are worse than having very little sex, one of them is having a lot of bad sex. So don\'t worry.'],
                                ['when' => 'result >= -90 and result < -80', 'text' => <<<'TXT'
                                Looks like you have some serious catching up to do. As Woody Allen said, "Sex without love is a meaningless experience, but as far as meaningless experiences go it's pretty damn good."
                                TXT],
                                ['when' => 'result >= -80 and result < -65', 'text' => 'It’s about quality, not quantity, but surely, higher quantity wouldn\'t hurt, eh?'],
                                ['when' => 'result >= -65 and result < -50', 'text' => 'Nothing wrong with not having tons of sex. Make sure that when it happens you make it count!'],
                                ['when' => 'result >= -50 and result < -35', 'text' => 'You\'re not having as much sex as other people... yet!'],
                                ['when' => 'result >= -35 and result < -20', 'text' => 'You\'re doing okay-ish. You might wanna aim for great-ish.'],
                                ['when' => 'result >= -20 and result < -10', 'text' => 'You\'re slightly below average... more Netflix and Chill?'],
                                ['when' => 'result >= -10 and result < 0', 'text' => 'There\'s a thin line between average and below average, you’re standing with your feet on both sides.'],
                                ['when' => 'result >= 0 and result < 20', 'text' => 'Congratulations, you\'re better than most. Barely. Still, I\'d brag about it.'],
                                ['when' => 'result >= 20 and result < 40', 'text' => 'You\'re ahead of the pack, gotta pump up those numbers though.'],
                                ['when' => 'result >=40 and result < 55', 'text' => 'Nice job!'],
                                ['when' => 'result >= 55 and result < 70', 'text' => 'You\'re way above the ground level, but for you, the sky is the limit.'],
                                ['when' => 'result >= 70 and result < 85', 'text' => 'That\'s a good count. Hope you’re making it count, too.'],
                                ['when' => 'result >= 85 and result < 100', 'text' => 'Wow that\'s a lot, hope there’s enough time for other chores.'],
                                ['when' => 'result >= 100 and result < 200', 'text' => 'Whoa! It isn\'t common to have that much sex, but if it\'s going great for you, keep it up!'],
                                ['when' => 'result >= 200', 'text' => 'John Updike once said, "Sex is like money: only too much is enough!"'],
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
                                ['when' => 'sex > user_mean', 'text' => 'You\'re having sex {{compare_more.formattedValue}}% more frequently than people like you.'],
                                ['when' => 'sex <= user_mean', 'text' => 'You\'re having sex {{compare_less.formattedValue}}% less frequently than people like you.'],
                                ['when' => null, 'text' => 'Also:'],
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
                                ['when' => 'age <= 69 and stats_age < 50', 'text' => '{{stats_age_high.formattedValue}}% of 60-69 year old Americans have more sex than you.'],
                                ['when' => 'age <= 69 and stats_age >= 50', 'text' => '{{stats_age.formattedValue}}% of 60-69 year old Americans have more sex than you.'],
                                ['when' => 'age <= 59 and stats_age >= 50', 'text' => '{{stats_age.formattedValue}}% of 50-59 year old Americans have more sex than you.'],
                                ['when' => 'age <= 59 and stats_age < 50', 'text' => '{{stats_age_high.formattedValue}}% of 50-59 year old Americans have more sex than you.'],
                                ['when' => 'age <= 49 and stats_age >= 50', 'text' => '{{stats_age.formattedValue}}% of 40-49 year old Americans have more sex than you.'],
                                ['when' => 'age <= 49 and stats_age < 50', 'text' => '{{stats_age_high.formattedValue}}% of 40-49 year old Americans have more sex than you.'],
                                ['when' => 'age <= 39 and stats_age < 50', 'text' => '{{stats_age_high.formattedValue}}% of 30-39 year old Americans have more sex than you.'],
                                ['when' => 'age <= 39 and stats_age >= 50', 'text' => '{{stats_age.formattedValue}}% of 30-39 year old Americans have more sex than you.'],
                                ['when' => 'age <= 29 and stats_age < 50', 'text' => '{{stats_age_high.formattedValue}}% of 18-29 year old Americans have more sex than you.'],
                                ['when' => 'age <= 29 and stats_age >= 50', 'text' => '{{stats_age.formattedValue}}% of 18-29 year old Americans have less sex than you.'],
                                ['when' => 'age >= 70 and stats_age < 50', 'text' => '{{stats_age_high.formattedValue}}% of over 70 year old Americans have more sex than you.'],
                                ['when' => 'age >= 70 and stats_age >= 50', 'text' => '{{stats_age.formattedValue}}% of over 70 year old Americans have more sex than you.'],
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
                                ['when' => 'gender == 1 and stats_gender < 50', 'text' => '{{stats_gender_high.formattedValue}}% of Americans men have more sex than you.'],
                                ['when' => 'gender == 1 and stats_gender >= 50', 'text' => '{{stats_gender.formattedValue}}% of Americans men have less sex than you.'],
                                ['when' => 'gender == 2 and stats_gender < 50', 'text' => '{{stats_gender_high.formattedValue}}% of Americans women have more sex than you.'],
                                ['when' => 'gender == 2 and stats_gender >= 50', 'text' => '{{stats_gender.formattedValue}}% of Americans women have more sex than you.'],
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
                                ['when' => 'race == 1 and stats_race < 50', 'text' => '{{stats_race_high.formattedValue}}% of Caucasian Americans have more sex than you.'],
                                ['when' => 'race == 1 and stats_race >= 50', 'text' => '{{stats_race.formattedValue}}% of Caucasian Americans have less sex than you.'],
                                ['when' => 'race == 2 and stats_race < 50', 'text' => '{{stats_race_high.formattedValue}}% of African Americans have more sex than you.'],
                                ['when' => 'race == 2 and stats_race >= 50', 'text' => '{{stats_race.formattedValue}}% of African Americans have less sex than you.'],
                                ['when' => 'race == 3 and stats_race < 50', 'text' => '{{stats_race_high.formattedValue}}% of other ethnicity than Caucasian or African Americans have more sex than you.'],
                                ['when' => 'race == 3 and stats_race >= 50', 'text' => '{{stats_race.formattedValue}}% of other ethnicity than Caucasian or African Americans have less sex than you.'],
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
                                ['when' => 'marital == 1 and stats_marital < 50', 'text' => '{{stats_marital_high.formattedValue}}% of never married Americans have more sex than you.'],
                                ['when' => 'marital == 1 and stats_marital >= 50', 'text' => '{{stats_marital.formattedValue}}% of never married Americans have less sex than you.'],
                                ['when' => 'marital == 2 and stats_marital < 50', 'text' => '{{stats_marital_high.formattedValue}}% of married Americans have more sex than you.'],
                                ['when' => 'marital == 2 and stats_marital >= 50', 'text' => '{{stats_marital.formattedValue}}% of married Americans have less sex than you.'],
                                ['when' => 'marital == 3 and stats_marital < 50', 'text' => '{{stats_marital_high.formattedValue}}% of divorced Americans have more sex than you.'],
                                ['when' => 'marital == 3 and stats_marital >= 50', 'text' => '{{stats_marital.formattedValue}}% of divorced Americans have less sex than you.'],
                                ['when' => 'marital == 4 and stats_marital < 50', 'text' => '{{stats_marital_high.formattedValue}}% of widowed Americans have more sex than you.'],
                                ['when' => 'marital == 4 and stats_marital >= 50', 'text' => '{{stats_marital.formattedValue}}% of widowed Americans have less sex than you.'],
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
                                ['when' => 'education == 1 and stats_education < 50', 'text' => '{{stats_education_high.formattedValue}}% of Americans who have high school degree or less, have more sex than you.'],
                                ['when' => 'race == 1 and stats_education >= 50', 'text' => '{{stats_education.formattedValue}}% of Americans who have high school degree or less, have less sex than you.'],
                                ['when' => 'education == 2 and stats_education < 50', 'text' => '{{stats_education_high.formattedValue}}% of Americans who have 2-year college degree or more, have more sex than you.'],
                                ['when' => 'race == 2 and stats_education >= 50', 'text' => '{{stats_education.formattedValue}}% of Americans who 2-year college degree or more, have less sex than you.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sex_acts_race',
                            'label' => 'Sex acts race',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sex_acts_gender',
                            'label' => 'Sex acts gender',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sex_acts_marital',
                            'label' => 'Sex acts marital status',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sex_acts_education',
                            'label' => 'Sex acts education',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sex_acts_age',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'gender_std',
                            'label' => 'Gender std',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'race_std',
                            'label' => 'Race std',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'marital_std',
                            'label' => 'Marital status std',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'education_std',
                            'label' => 'Education std',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'age_std',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'global_mean',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'user_mean',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'result',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'compare_more',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'compare_less',
                            'label' => '',
                            'type' => 'presentation',
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
                            'name' => 'stats_age',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stats_gender',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stats_race',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stats_education',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stats_marital',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stats_age_high',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stats_gender_high',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stats_race_high',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stats_marital_high',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'stats_education_high',
                            'label' => '',
                            'type' => 'presentation',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'age_std',
                            'label' => 'Age std',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'sex_acts_age',
                            'label' => 'Sex acts age',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'user_mean',
                            'label' => 'User mean',
                            'type' => 'result',
                            'rounding' => ['standard', '4'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'age_std = get_age_std(age)',
            'results' => ['age_std' => 'get_age_std(age)'],
        ],
        [
            'title' => 'sex_acts_age = get_sex_acts_age(age)',
            'results' => ['sex_acts_age' => 'get_sex_acts_age(age)'],
        ],
        [
            'title' => 'user_mean = get_user_mean(global_mean, sex_acts_age, sex_acts_gender, sex_acts_race, sex_acts_marital, sex_acts_education)',
            'results' => ['user_mean' => 'get_user_mean(global_mean, sex_acts_age, sex_acts_gender, sex_acts_race, sex_acts_marital, sex_acts_education)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_age_std",function(age){if(isNaN(age)){return NaN}if(age<18){return-1}if(age<30){return 47.05}if(age<40){return 35.48}if(age<50){return 35.39}if(age<60){return 27.66}if(age<70){return 23.92}return 16.09});omni.define("get_sex_acts_age",function(age){if(isNaN(age)){return NaN}if(age<18){return-1}if(age<30){return 78.5}if(age<40){return 77.84}if(age<50){return 63.22}if(age<60){return 38.29}if(age<70){return 25.03}return 10.88});omni.define("get_user_mean",function(global_mean,sex_acts_age,sex_acts_gender,sex_acts_race,sex_acts_marital,sex_acts_education){var user_mean=1;if(sex_acts_age){user_mean*=sex_acts_age/global_mean}if(sex_acts_gender){user_mean*=sex_acts_gender/global_mean}if(sex_acts_race){user_mean*=sex_acts_race/global_mean}if(sex_acts_marital){if(sex_acts_marital==10.19){user_mean*=global_mean/sex_acts_marital}user_mean*=sex_acts_marital/global_mean}if(sex_acts_education){user_mean*=sex_acts_education/global_mean}user_mean*=global_mean;return user_mean});omni.define("get_p_value",function(x,mean,std){var z=(x-mean)/std;return 1/2+1/2*mathjs.erf(z/Math.sqrt(2))});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        The Sex frequency calculator is a free, no-sign-up everyday life tool. Fill in the 6 fields it asks for and it works out <strong>sex acts race</strong> straight away, with the formula shown underneath.
        TXT,
        'sections' => [
            ['title' => 'How does the Sex frequency calculator work?', 'html' => <<<'TXT'
            <p>The Sex frequency calculator takes the values in the form, applies the relationship described below and reports <strong>sex acts race</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the sex, the ethnicity and the marital status); then you type in the age.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in months. The unit chip switches it to any of the 27 supported units.</li><li>A plain number with no unit attached.</li><li>Pick the option that matches your case — 2 options, such as man and woman. </li><li>Pick the option that matches your case — 3 options, such as caucasian, african American and other. </li><li>Pick the option that matches your case — 4 options, such as never married, married and divorced. </li><li>Pick the option that matches your case — 2 options, such as high school degree or less and 2-year college degree or more. </li></ul><p>4 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Age</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>How often do you have sex?</strong></td><td>One of 2 options, such as man and woman.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Ethnicity</strong></td><td>One of 3 options, such as caucasian, african American and other.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Marital status</strong></td><td>One of 4 options, such as never married, married and divorced.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Education</strong></td><td>One of 2 options, such as high school degree or less and 2-year college degree or more.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Sex acts race</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Sex acts gender</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Sex acts marital status</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Sex acts education</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Gender std</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Race std</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Marital status std</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Education std</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Time, opening in months</li><li>%, opening in percent</li><li>%, opening in percent</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Sex frequency calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Checking a figure someone else quoted</li><li>Any time the same 1 figures keep coming back — the age — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/dollars-in-words">Dollars in words</a>, <a href="/everyday-life/drake-equation-for-love">Drake equation for love</a> and <a href="/everyday-life/dress-size">Dress size</a>.</p>
            TXT],
            ['title' => 'Interpreting a population-based frequency estimate carefully', 'html' => <<<'TXT'
            <p>This calculator uses demographic selections and a reference data model to show a comparison for sexual frequency. The result is a broad statistical estimate shaped by the categories and assumptions built into the tool; it is not a measurement of an individual, a prediction of what a person should do or a score of relationship quality. People and relationships vary widely, and a population average does not describe every person in that group.</p>
            <p>Read the selected demographic inputs carefully. Age units, category labels and any comparison settings influence which reference value is used. The data may come from a particular survey, population, time period or question wording; responses to surveys are affected by how participants interpret and report behavior. The calculator does not observe anyone’s private life and cannot verify that a selected category fits a person’s circumstances.</p>
            <p>Use the output only as context for the model’s comparison. A difference from a displayed average does not imply a problem, a need to change behavior or a diagnosis. Sexual frequency is influenced by many factors, including health, stress, relationship dynamics, opportunity, personal preference and changing life circumstances. These are not all represented in the calculator’s inputs.</p>
            <p>Demographic group labels are simplified and may not reflect a person’s identity or lived experience. They should not be used to stereotype individuals or to make assumptions about a partner. If a category feels inaccurate, the model cannot compensate for that limitation. Aggregate data describe group summaries; applying them to a specific person can be misleading.</p>
            <p>Do not use the result to pressure yourself or someone else. Consent, comfort, communication and mutual preference matter more than matching a statistical average. If you have a health question, pain, distress or concern about a change in sexual function, consult a qualified healthcare professional. If a relationship question is causing distress, a counselor or sex therapist may help; a frequency calculator cannot resolve those concerns.</p>
            <p>For an educational comparison, record the selected inputs and the model’s output, and note that it is an estimate from reference data. If you compare two runs, change one selection at a time and remember that the differences reflect the model’s categories, not a causal explanation. The calculator is not a substitute for a research source, clinical assessment or a conversation between partners.</p>
            <p>Privacy matters for this subject. Do not enter identifiable personal information into a page unless you understand how it is handled; this calculator needs only the selections shown in its form. The result should be treated as private and interpreted without judgment. Its purpose is descriptive comparison, not instruction or evaluation.</p>
            TXT],
            ['title' => 'Why a group average is not a personal target', 'html' => <<<'TXT'
            <p>Averages summarize a group; they do not describe every person within it. Individuals can be far above or below a reported mean while having a healthy, consensual and satisfying relationship. The calculator cannot see context such as whether someone is partnered, whether partners live together, what they prefer or how they define an “act.” Those differences can make survey comparisons less meaningful than the number suggests.</p><p>Survey responses also depend on recall and willingness to answer personal questions. Reference datasets may reflect a particular country, age range, survey year and question wording. If the tool exposes categories for age, gender, race, education or marital status, those are simplified comparison fields, not causal explanations for behavior. The calculator does not establish that any demographic feature causes a frequency difference.</p><p>Use the output only if you understand what the comparison represents, and avoid sharing it as a claim about a group. A difference between selected categories may reflect sample size, measurement choices or other confounding factors that the calculator does not show. It is not evidence for stereotypes, judgments about a partner or expectations that anyone should meet.</p><p>If you are concerned about a change in desire, pain, medication effects or sexual health, a healthcare professional can discuss the relevant factors privately. If the concern is about communication or mismatched preferences, a respectful conversation or qualified counselor may be more useful than a population statistic. Consent and well-being are not measured by frequency.</p>
            TXT],
            ['title' => 'Interpret categories without making assumptions', 'html' => <<<'TXT'
            <p>Demographic categories in a survey model are not a complete description of identity, relationships or behavior. A category match does not make the average personally predictive, and a mismatch does not indicate that anyone is outside a healthy range. The data are descriptive at most; they are not a standard that a person or couple should try to meet.</p><p>Use the calculator privately and avoid using its output to confront, rank or pressure a partner. If you discuss the result together, focus on each person’s comfort, consent and preferences rather than the model’s comparison.</p>
            TXT],
            ['title' => 'Averages do not define well-being', 'html' => <<<'TXT'
            <p>Sexual well-being is not measured by matching a frequency average. The calculator does not evaluate consent, satisfaction, safety or relationship quality, and its output should not be used as a clinical benchmark.</p>
            TXT],
            ['title' => 'Use support for personal concerns', 'html' => <<<'TXT'
            <p>If the result raises a personal concern, a qualified healthcare professional can discuss health questions, and a counselor can help with relationship communication. A group statistic cannot tell you what is right for an individual or couple.</p>
            TXT],
            ['title' => 'Keep the result within its intended scope', 'html' => <<<'TXT'
            <p>The tool is a descriptive comparison only. It should not be used to pressure a partner, judge someone’s identity or decide whether a relationship is successful. Personal preferences and mutual consent matter more than any average.</p>
            TXT],
            ['title' => 'Remember the limits of survey data', 'html' => <<<'TXT'
            <p>Survey definitions and sampling affect a population estimate. A reported average can change with the question wording, response group and collection period, so it should not be treated as a timeless standard for private behavior.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Can I enter how often do you have sex? in a different unit?', 'a' => 'Yes. How often do you have sex? opens in months and the chip beside it offers 27 units.'],
            ['q' => 'How much do the drop-down choices change the answer?', 'a' => 'There are several choices to make (4 in total), and each one selects a different case rather than scaling the result.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Sex acts race = 0.'],
        ],
        'related' => [
            ['path' => '/everyday-life/dollars-in-words', 'name' => 'Dollars in words'],
            ['path' => '/everyday-life/drake-equation-for-love', 'name' => 'Drake equation for love'],
            ['path' => '/everyday-life/dress-size', 'name' => 'Dress size'],
        ],
    ],
];
