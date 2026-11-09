<?php

/**
 * Catculator
 * /biology/catculator
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Catculator',
    'meta' => ['title' => 'Catculator Calculator: Formula, Steps & Example', 'description' => 'Catculator works out cat1 Index from how do you show affection? and what’s your ideal bed?. Every box can be solved for, not only the one in the title.', 'h1' => 'Catculator Calculator', 'updated' => '2025-02-18'],
    'sections' => [
        [
            'title' => 'Affection',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q1',
                            'label' => 'How do you show affection? ',
                            'type' => 'select',
                            'options' => [
                                'By ignoring people' => '1',
                                'Depends on my mood' => '2',
                                'I don’t do it often, or by running away' => '3',
                                'Running up, giving a hug, jumping around all excited' => '4',
                                'Whatever the other person looks like they want' => '5',
                            ],
                            'dataset' => 'question1',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q1-1.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q1-2.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q1-3.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q1-4.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q1-5.gif'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Sleeping habits',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q2',
                            'label' => 'What’s your ideal bed? ',
                            'type' => 'select',
                            'options' => [
                                'Wherever I like, preferably somebody’s bed' => '1',
                                'I can sleep anywhere' => '2',
                                'Only in my bed, a safe place' => '3',
                                'Sleep?' => '4',
                                'You can have my bed, I\'ll take the sofa, it\'s okay' => '5',
                            ],
                            'dataset' => 'question2',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q2-1.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q2-2.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q2-3.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q2-4.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q2-5.gif'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Food',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q3',
                            'label' => 'What do you like to eat? ',
                            'type' => 'select',
                            'options' => [
                                'Whatever’s on someone else\'s plate' => '1',
                                'Whatever\'s in the fridge, I like strange combinations' => '2',
                                'The same thing every day' => '3',
                                'I like to eat out' => '4',
                                'Whatever\'s put in front of me, I wouldn\'t want to offend' => '5',
                            ],
                            'dataset' => 'question3',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q3-1.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q3-2.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q3-3.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q3-4.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q3-5.gif'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Drinking behavior&nbsp;',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q4',
                            'label' => 'What do you do when you’re drunk? ',
                            'type' => 'select',
                            'options' => [
                                'Puke on someone’s doormat' => '1',
                                'Eat and drink even more' => '2',
                                'I’m never drunk' => '3',
                                'Screaming in the middle of the night' => '4',
                                'Socialize, telling my friends I love them' => '5',
                            ],
                            'dataset' => 'question4',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q4-1.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q4-2.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q4-3.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q4-4.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q4-5.gif'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Vacations',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'q5',
                            'label' => 'What would you do on vacation? ',
                            'type' => 'select',
                            'options' => [
                                'Take A LOT of selfies' => '1',
                                'Extreme sports!' => '2',
                                'Holidays make me anxious' => '3',
                                'Try new things' => '4',
                                'Party with my friends' => '5',
                            ],
                            'dataset' => 'question5',
                            'control' => 'DROPDOWN',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q5-1.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q5-2.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q5-3.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q5-4.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-q5-5.gif'],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Result',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'cat1Index == 0', 'text' => 'You\'re not a specific type of cat! Truly speaking, we can\'t say anything about how catsome you are. Maybe you\'re a doggo? &nbsp;'],
                                ['when' => 'cat1Index == 1 and cat2Index == 0', 'text' => 'Hey, you\'re a dominant cat.&nbsp;'],
                                ['when' => 'cat1Index == 2 and cat2Index == 0', 'text' => 'Hey, you\'re an unpredictable cat.&nbsp;'],
                                ['when' => 'cat1Index == 3 and cat2Index == 0', 'text' => 'Hey, you\'re a shy cat.&nbsp;'],
                                ['when' => 'cat1Index == 4 and cat2Index == 0', 'text' => 'Hey, you\'re an extroverted cat.&nbsp;'],
                                ['when' => 'cat1Index == 5 and cat2Index == 0', 'text' => 'Hey, you\'re an agreeable cat.&nbsp;'],
                                ['when' => 'cat1Index == 1 and cat2Index == 0.5', 'text' => 'Hey, you\'re a dominant cat, but the difference between other cat types is quite small.&nbsp;'],
                                ['when' => 'cat1Index == 2 and cat2Index == 0.5', 'text' => 'Hey, you\'re an unpredictable cat, but the difference between other cat types is quite small.&nbsp;'],
                                ['when' => 'cat1Index == 3 and cat2Index == 0.5', 'text' => 'Hey, you\'re a shy cat, but the difference between other cat types is quite small.&nbsp;'],
                                ['when' => 'cat1Index == 4 and cat2Index == 0.5', 'text' => 'Hey, you\'re an extroverted cat, but the difference between other cat types is quite small.&nbsp;'],
                                ['when' => 'cat1Index == 5 and cat2Index == 0.5', 'text' => 'Hey, you\'re an agreeable cat, but the difference between other cat types is quite small.&nbsp;'],
                                ['when' => 'cat1Index == 1 and cat2Index == 2', 'text' => '"It\'s a tie! You\'re partly a dominant cat and partly an unpredictable cat.&nbsp;'],
                                ['when' => 'cat1Index == 1 and cat2Index == 3', 'text' => '"It\'s a tie! You\'re partly a dominant cat and partly a shy cat.&nbsp;'],
                                ['when' => 'cat1Index == 1 and cat2Index == 4', 'text' => '"It\'s a tie! You\'re partly a dominant cat and partly an extroverted cat.&nbsp;'],
                                ['when' => 'cat1Index == 1 and cat2Index == 5', 'text' => '"It\'s a tie! You\'re partly a dominant cat and partly an agreeable cat.&nbsp;'],
                                ['when' => 'cat1Index == 2 and cat2Index == 3', 'text' => '"It\'s a tie! You\'re partly an unpredictable cat and partly a shy cat.&nbsp;'],
                                ['when' => 'cat1Index == 2 and cat2Index == 4', 'text' => '"It\'s a tie! You\'re partly an unpredictable cat and partly an extroverted cat.&nbsp;'],
                                ['when' => 'cat1Index == 2 and cat2Index == 5', 'text' => '"It\'s a tie! You\'re partly an unpredictable cat and partly an agreeable cat.&nbsp;'],
                                ['when' => 'cat1Index == 3 and cat2Index == 4', 'text' => '"It\'s a tie! You\'re partly a shy cat and partly an extroverted cat.&nbsp;'],
                                ['when' => 'cat1Index == 3 and cat2Index == 5', 'text' => '"It\'s a tie! You\'re partly a shy cat and partly an agreeable cat.&nbsp;'],
                                ['when' => 'cat1Index == 4 and cat2Index == 5', 'text' => '"It\'s a tie! You\'re partly an extroverted cat and partly an agreeable cat.'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/doggo.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-final-1.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-final-2.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-final-3.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-final-4.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => '/cats/cat-final-5.gif'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'What traits do you have?'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'cat1Index == 1', 'text' => 'Wants what other people have Your words have weight People want to get on your good side&nbsp;'],
                                ['when' => 'cat1Index == 2 or cat2Index == 2', 'text' => 'Creative Huge payoff for new ideas Keeps life interesting&nbsp;'],
                                ['when' => 'cat1Index == 3 or cat2Index == 3', 'text' => 'More self-aware Strong need to help others Emotional depth&nbsp;'],
                                ['when' => 'cat1Index == 4 or cat2Index == 4', 'text' => 'Conversation comes easily Life and soul of the party Happier overall&nbsp;'],
                                ['when' => 'cat1Index == 5 or cat2Index == 5', 'text' => 'Passionate about people Forms strong bonds Respectful'],
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
                                ['when' => 'cat1Index == 1', 'text' => 'Can walk over people Might not be well liked Constant struggle to stay on top&nbsp;'],
                                ['when' => 'cat1Index == 2 or cat2Index == 2', 'text' => 'Some new ideas come with high risk Disrupted routine May worry the people around you&nbsp;'],
                                ['when' => 'cat1Index == 3 or cat2Index == 3', 'text' => 'Harsher self-criticism Potential anxiety Risk of mood disorders&nbsp;'],
                                ['when' => 'cat1Index == 4 or cat2Index == 4', 'text' => 'Easily bored Struggles to be alone Can talk over others&nbsp;'],
                                ['when' => 'cat1Index == 5 or cat2Index == 5', 'text' => 'Passive Conflict avoider Can get hurt by others&nbsp;'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variables',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cat1Index',
                            'label' => 'Cat1 index',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'cat2Index',
                            'label' => 'Cat2 index',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'domCat',
                            'label' => 'Dom cat',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'agreeableCat',
                            'label' => 'Agreeable cat',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'extrovertCat',
                            'label' => 'Extrovert cat',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'shyCat',
                            'label' => 'Shy cat',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'unpredictableCat',
                            'label' => 'Unpredictable cat',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'cat1Index = getCatType(q1, q2, q3, q4 ,q5)',
            'results' => ['cat1Index' => 'getCatType(q1, q2, q3, q4, q5)'],
        ],
        [
            'title' => 'cat2Index = getCat2Type(cat1Index)',
            'results' => ['cat2Index' => 'getCat2Type(getCatType(q1, q2, q3, q4, q5))'],
        ],
        [
            'title' => 'domCat = getDomCat(cat1Index)',
            'results' => ['domCat' => 'getDomCat(getCatType(q1, q2, q3, q4, q5))'],
        ],
        [
            'title' => 'unpredictableCat = getUnpredictableCat(cat1Index)',
            'results' => ['unpredictableCat' => 'getUnpredictableCat(getCatType(q1, q2, q3, q4, q5))'],
        ],
        [
            'title' => 'shyCat = getShyCat(cat1Index)',
            'results' => ['shyCat' => 'getShyCat(getCatType(q1, q2, q3, q4, q5))'],
        ],
        [
            'title' => 'extrovertCat = getExtrovertCat(cat1Index)',
            'results' => ['extrovertCat' => 'getExtrovertCat(getCatType(q1, q2, q3, q4, q5))'],
        ],
        [
            'title' => 'agreeableCat = getAgreeableCat(cat1Index)',
            'results' => ['agreeableCat' => 'getAgreeableCat(getCatType(q1, q2, q3, q4, q5))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var catTypes=[1,2,3,4,5];var k;var domCat=0;var unpredictableCat=0;var shyCat=0;var extrovertCat=0;var agreeableCat=0;omni.define("getCatType",function(q1,q2,q3,q4,q5){var catGenes=[q1,q2,q3,q4,q5];domCat=0;unpredictableCat=0;shyCat=0;extrovertCat=0;agreeableCat=0;for(var g=0;g<catGenes.length;g++){var catGene=catGenes[g];switch(catGene){case 1:domCat+=1;break;case 2:unpredictableCat+=1;break;case 3:shyCat+=1;break;case 4:extrovertCat+=1;break;case 5:agreeableCat+=1;break}}var counts=[0,0,0,0,0];if(q1!==undefined){counts[q1-1]++}if(q2!==undefined){counts[q2-1]++}if(q3!==undefined){counts[q3-1]++}if(q4!==undefined){counts[q4-1]++}if(q5!==undefined){counts[q5-1]++}var countVariables=counts.reduce(function(a,b){return a*b},1);if(countVariables!=1){var j=counts.indexOf(Math.max.apply(Math,counts));var freq={};for(var i=0;i<counts.length;i++){var num=counts[i];freq[num]=freq[num]?freq[num]+1:1}if(freq[3]==undefined&&freq[2]==1){k=0.5;return catTypes[j]}else if(freq[2]==2){counts[j]=0;k=counts.indexOf(Math.max.apply(Math,counts));return catTypes[j]}else{return catTypes[j]}}else{return 0}});omni.define("getCat2Type",function(value){if(value&&k>=1&&k<=5){return catTypes[k]}else if(k){return k}else{return 0}});omni.define("getDomCat",function(value){if(value||!value){return domCat*20}});omni.define("getUnpredictableCat",function(value){if(value||!value){return unpredictableCat*20}});omni.define("getShyCat",function(value){if(value||!value){return shyCat*20}});omni.define("getExtrovertCat",function(value){if(value||!value){return extrovertCat*20}});omni.define("getAgreeableCat",function(value){if(value||!value){return agreeableCat*20}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Catculator turns How do you show affection?, What’s your ideal bed? and What do you like to eat? into Cat1 index and Cat2 index. The arithmetic is the whole method: cat1 index is worked out from how do you show affection? by one formula, applied once.
        TXT,
        'sections' => [
            ['title' => 'How the Catculator calculator works', 'html' => <<<'TXT'
            <p>Catculator answers one question from 5 numbers, and the answer is Cat1 index, Cat2 index and Dom cat.</p><p>In the form&#039;s own words, Cat1 index = getCatType(How do you show affection?, What’s your ideal bed?, What do you like to eat?, What do you do when you’re drunk?, What would you do on vacation?).</p><p>The answers are Cat1 index, Cat2 index, Dom cat and Agreeable cat; they are reported together because a single calculation usually settles more than one question.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 5 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>How do you show affection?</strong> — a plain number, no unit</li><li><strong>What’s your ideal bed?</strong> — a plain number, no unit</li><li><strong>What do you like to eat?</strong> — a plain number, no unit</li><li><strong>What do you do when you’re drunk?</strong> — a plain number, no unit</li><li><strong>What would you do on vacation?</strong> — a plain number, no unit</li></ul><p>The result boxes are Cat1 index, Cat2 index, Dom cat, Agreeable cat, Extrovert cat, Shy cat, Unpredictable cat; they fill in as soon as the inputs allow it, and they are updated rather than accumulated — change a number and the answers change with it.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => '<p>None of the boxes on this page carries a unit chip: Cat1 index takes a plain number and the answer inherits whatever scale the inputs were measured in.</p>'],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul><li><strong>Cat1 index</strong> = <code>getCatType(How do you show affection?, What’s your ideal bed?, What do you like to eat?, What do you do when you’re drunk?, What would you do on vacation?)</code></li><li><strong>Cat2 index</strong> = <code>getCat2Type(getCatType(How do you show affection?, What’s your ideal bed?, What do you like to eat?, What do you do when you’re drunk?, What would you do on vacation?))</code></li><li><strong>Dom cat</strong> = <code>getDomCat(getCatType(How do you show affection?, What’s your ideal bed?, What do you like to eat?, What do you do when you’re drunk?, What would you do on vacation?))</code></li><li><strong>Unpredictable cat</strong> = <code>getUnpredictableCat(getCatType(How do you show affection?, What’s your ideal bed?, What do you like to eat?, What do you do when you’re drunk?, What would you do on vacation?))</code></li><li><strong>Shy cat</strong> = <code>getShyCat(getCatType(How do you show affection?, What’s your ideal bed?, What do you like to eat?, What do you do when you’re drunk?, What would you do on vacation?))</code></li><li><strong>Extrovert cat</strong> = <code>getExtrovertCat(getCatType(How do you show affection?, What’s your ideal bed?, What do you like to eat?, What do you do when you’re drunk?, What would you do on vacation?))</code></li></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul><li><strong>Cat1 index</strong> = <code>getCatType(How do you show affection?, What’s your ideal bed?, What do you like to eat?, What do you do when you’re drunk?, What would you do on vacation?)</code> — the form to use when How do you show affection?, What’s your ideal bed?, What do you like to eat? and What do you do when you’re drunk? are the values you have.</li><li><strong>Cat2 index</strong> = <code>getCat2Type(getCatType(How do you show affection?, What’s your ideal bed?, What do you like to eat?, What do you do when you’re drunk?, What would you do on vacation?))</code> — the form to use when How do you show affection?, What’s your ideal bed?, What do you like to eat? and What do you do when you’re drunk? are the values you have.</li><li><strong>Dom cat</strong> = <code>getDomCat(getCatType(How do you show affection?, What’s your ideal bed?, What do you like to eat?, What do you do when you’re drunk?, What would you do on vacation?))</code> — the form to use when How do you show affection?, What’s your ideal bed?, What do you like to eat? and What do you do when you’re drunk? are the values you have.</li><li><strong>Unpredictable cat</strong> = <code>getUnpredictableCat(getCatType(How do you show affection?, What’s your ideal bed?, What do you like to eat?, What do you do when you’re drunk?, What would you do on vacation?))</code> — the form to use when How do you show affection?, What’s your ideal bed?, What do you like to eat? and What do you do when you’re drunk? are the values you have.</li><li><strong>Shy cat</strong> = <code>getShyCat(getCatType(How do you show affection?, What’s your ideal bed?, What do you like to eat?, What do you do when you’re drunk?, What would you do on vacation?))</code> — the form to use when How do you show affection?, What’s your ideal bed?, What do you like to eat? and What do you do when you’re drunk? are the values you have.</li><li><strong>Extrovert cat</strong> = <code>getExtrovertCat(getCatType(How do you show affection?, What’s your ideal bed?, What do you like to eat?, What do you do when you’re drunk?, What would you do on vacation?))</code> — the form to use when How do you show affection?, What’s your ideal bed?, What do you like to eat? and What do you do when you’re drunk? are the values you have.</li><li><strong>Agreeable cat</strong> = <code>getAgreeableCat(getCatType(How do you show affection?, What’s your ideal bed?, What do you like to eat?, What do you do when you’re drunk?, What would you do on vacation?))</code> — the form to use when How do you show affection?, What’s your ideal bed?, What do you like to eat? and What do you do when you’re drunk? are the values you have.</li></ul><p>Any one of Cat1 index, Cat2 index and Dom cat can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => '<p>A result here can always be checked: enter it in its own box, leave a different one empty, and the page should hand the first value back.</p>'],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with Cat1 index, Cat2 index and Dom cat are results filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>How do you show affection? left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If How do you show affection? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>What’s your ideal bed? left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If What’s your ideal bed? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>What do you like to eat? left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If What do you like to eat? is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert How do you show affection? to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>How do you show affection?</strong> takes a plain number with no unit attached. The page reads it when it works out Cat1 index, Cat2 index and Dom cat. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: How do you show affection? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>What’s your ideal bed?</strong> takes a plain number with no unit attached. The page reads it when it works out Cat1 index, Cat2 index and Dom cat. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: What’s your ideal bed? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>What do you like to eat?</strong> takes a plain number with no unit attached. The page reads it when it works out Cat1 index, Cat2 index and Dom cat. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: What do you like to eat? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>What do you do when you’re drunk?</strong> takes a plain number with no unit attached. The page reads it when it works out Cat1 index, Cat2 index and Dom cat. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: What do you do when you’re drunk? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>What would you do on vacation?</strong> takes a plain number with no unit attached. The page reads it when it works out Cat1 index, Cat2 index and Dom cat. It is picked from a list, and the list matters — the options are not labels for the same number. Have it to hand before you start: What would you do on vacation? is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> Cat1 index follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are How do you show affection?, What’s your ideal bed? and What do you like to eat? and the number you are missing is Cat1 index and Cat2 index.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Catculator calculator work out?', 'a' => <<<'TXT'
            Cat1 index, Cat2 index, Dom cat and Agreeable cat, from How do you show affection?, What’s your ideal bed?, What do you like to eat? and What do you do when you’re drunk?. The relationship is Cat1 index = getCatType(How do you show affection?, What’s your ideal bed?, What do you like to eat?, What do you do when you’re drunk?, What would you do on vacation?).
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            How do you show affection?, What’s your ideal bed?, What do you like to eat?, What do you do when you’re drunk?, What would you do on vacation?. With how do you show affection?, what’s your ideal bed? and what do you like to eat? in place, Cat1 index can stay blank and the page will work it out.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => 'It can. Leave any of Cat1 index, Cat2 index, Dom cat and Unpredictable cat blank and the page solves for that one instead — nothing has to be switched first.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Cat1 index is computed at full precision and rounded once at the end, so what you read is a view of the number the formula produced rather than a second calculation from a rounded one.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With How do you show affection? left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Cat1 index keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/guinea-pig-age', 'name' => 'Guinea pig years to human years'],
            ['path' => '/biology/gypsum-application-rate', 'name' => 'Gypsum Application Rate Calculator'],
            ['path' => '/biology/hamster-age', 'name' => 'Hamster age Calculator'],
        ],
        'authors' => [],
    ],
];
