<?php

/**
 * Dog BMI
 * /biology/dog-bmi
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dog BMI',
    'meta' => ['title' => 'Dog BMI Calculator: Formula, Steps & Example', 'description' => 'Enter breed, height and weight and Dog BMI returns BMI. Every figure is computed. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Dog BMI Calculator', 'updated' => '2026-05-22'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'breed',
                            'label' => 'Breed',
                            'type' => 'select',
                            'options' => [
                                'Other/mixed' => '1',
                                'Affenpinscher' => '2',
                                'Afghan Hound' => '3',
                                'Airedale Terrier' => '4',
                                'Akita' => '5',
                                'Alaskan Malamite' => '6',
                                'American Bulldog' => '7',
                                'American Eskimo' => '8',
                                'American Foxhound' => '9',
                                'American Pitbull Terrier' => '10',
                                'American Staffordshire Terrier' => '11',
                                'American Water Spaniel' => '12',
                                'Australian Cattle Dog' => '13',
                                'Australian Kelpie' => '14',
                                'Australian Shepherd' => '15',
                                'Australian Terrier' => '16',
                                'Bassenji' => '17',
                                'Basset Hound' => '18',
                                'Beagle' => '19',
                                'Bearded Collie' => '20',
                                'Beauceron' => '21',
                                'Bedlington Terrier' => '22',
                                'Belgian Sheepdog' => '23',
                                'Bernese Mountain Dog' => '24',
                                'Bichon Frise' => '25',
                                'Black Russian Terrier' => '26',
                                'Bloodhound' => '27',
                                'Boerboel' => '28',
                                'Border Collie' => '29',
                                'Border Terrier' => '30',
                                'Borzoi' => '31',
                                'Boston Terrier' => '32',
                                'Bouvier des Flandres' => '33',
                                'Boxer' => '34',
                                'Briard' => '35',
                                'Brittany' => '36',
                                'Brussels Griffon' => '37',
                                'Bull Terrier' => '38',
                                'Bullmastiff' => '39',
                                'Cairn Terrier' => '40',
                                'Canaan Dog' => '41',
                                'Cardigan Welsh Corgi' => '42',
                                'Cavalier King Charles' => '43',
                                'Cesky Terrier' => '44',
                                'Chesapeake Bay Retriever' => '45',
                                'Chihuahua' => '46',
                                'Chinese Crested' => '47',
                                'Chinese Shar Pei' => '48',
                                'Chow Chow' => '49',
                                'Clumber Spaniel' => '50',
                                'Cocker Spaniel' => '51',
                                'Collie' => '52',
                                'Corton de Tulear' => '53',
                                'Curly-Coated Retriever' => '54',
                                'Dachshund' => '55',
                                'Dalmatian' => '56',
                                'Dandie Dinmont Terrier' => '57',
                                'Doberman Pinscher' => '58',
                                'Dogue de Bordeaux' => '59',
                                'English Cocker Spaniel' => '60',
                                'English Foxhound' => '61',
                                'English Setter' => '62',
                                'English Springer Spaniel' => '63',
                                'English Toy Spaniel' => '64',
                                'Estrela Mountain Dog' => '65',
                                'Eurasier' => '66',
                                'Field Spaniel' => '67',
                                'Finnish Spitz' => '68',
                                'Flat Coated Retriever' => '69',
                                'French Bulldog' => '70',
                                'German Pinscher' => '71',
                                'German Shepherd' => '72',
                                'German Shorthaired Pointer' => '73',
                                'German Spitz' => '74',
                                'German Wirehaired Pointer' => '75',
                                'Giant Schnauzer' => '76',
                                'Golden Retriever' => '77',
                                'Gordon Setter' => '78',
                                'Great Dane' => '79',
                                'Great Pyrenee' => '80',
                                'Greater Swiss Mountain Dog' => '81',
                                'Greyhound' => '82',
                                'Harrier' => '83',
                                'Havanese' => '84',
                                'Ibizan Hound' => '85',
                                'Irish Setter' => '86',
                                'Irish Terrier' => '87',
                                'Irish Water Spaniel' => '88',
                                'Irish Wolfhound' => '89',
                                'Italian Greyhound' => '90',
                                'Japanese Chin' => '91',
                                'Keeshond' => '92',
                                'Kerry Blue Terrier' => '93',
                                'Komondor' => '94',
                                'Kuvasz' => '95',
                                'Labrador' => '96',
                                'Lakeland Terrier' => '97',
                                'Lhasa Apso' => '98',
                                'Lowchen' => '99',
                                'Maltese' => '100',
                                'Manchester Terrier' => '101',
                                'Mastiff' => '102',
                                'Miniature American Shepherd' => '103',
                                'Miniature Bull Terrier' => '104',
                                'Miniature Pinscher' => '105',
                                'Miniature Schnauzer' => '106',
                                'Mudi' => '107',
                                'Neopolitan Mastiff' => '108',
                                'Newfoundland' => '109',
                                'Norfolk Terrier' => '110',
                                'Norwegian Buhund' => '111',
                                'Norwegian Elkhound' => '112',
                                'Norwich Terrier' => '113',
                                'Old English Sheepdog' => '114',
                                'Otterhound' => '115',
                                'Papillon' => '116',
                                'Pekingese' => '117',
                                'Pembroke Welsh Corgi' => '118',
                                'Pharaoh Hound' => '119',
                                'Pointer' => '120',
                                'Pomeranian' => '121',
                                'Portugese Water Dog' => '122',
                                'Pug' => '123',
                                'Puli' => '124',
                                'Rat Terrier' => '125',
                                'Redbone Coonhound' => '126',
                                'Rhodesian Ridgeback' => '127',
                                'Rottweiler' => '128',
                                'Saint Bernard' => '129',
                                'Saluki' => '130',
                                'Samoyed' => '131',
                                'Schipperke' => '132',
                                'Scottish Deerhound' => '133',
                                'Scottish Terrier' => '134',
                                'Sealyham Terrier' => '135',
                                'Shetland Sheepdog' => '136',
                                'Shiba Inu' => '137',
                                'Shih Tzu' => '138',
                                'Siberian Husky' => '139',
                                'Silky Terrier' => '140',
                                'Skye Terrier' => '141',
                                'Staffordshire Bull Terrier' => '142',
                                'Standard Poodle' => '143',
                                'Sussex Spaniel' => '144',
                                'Swedish Vallhund' => '145',
                                'Thai Ridgeback' => '146',
                                'Tibetan Mastiff' => '147',
                                'Tibetan Spaniel' => '148',
                                'Tibetan Terrier' => '149',
                                'Toy Fox Terrier' => '150',
                                'Toy Poodle' => '151',
                                'Vizsla' => '152',
                                'Weimaraner' => '153',
                                'Welsh Corgi' => '154',
                                'Welsh Terrier' => '155',
                                'West Highland White Terrier' => '156',
                                'Whippet' => '157',
                                'Wirehaired Pointing Griffon' => '158',
                                'Wirehaired Terrier' => '159',
                                'Xoloitzcuintli' => '160',
                                'Yorkshire Terrier' => '161',
                            ],
                            'dataset' => 'dogs_breed_DS',
                            'control' => 'DROPDOWN',
                            'help' => 'If your dog\'s breed isn\'t listed, pick "Other/mixed" at the beginning of this list.',
                            'default' => 'Affenpinscher',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'height',
                            'label' => 'Height',
                            'type' => 'number',
                            'help' => 'Measured from the top of your dog\'s shoulders.',
                            'unit' => '4',
                            'unit_default' => 'cm',
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'mass',
                            'label' => 'Weight',
                            'type' => 'number',
                            'unit' => '22',
                            'unit_default' => 'kg',
                            'rounding' => ['standard', '1'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'bmi',
                            'label' => 'BMI',
                            'type' => 'number',
                            'help' => 'Canine Body Mass Index.',
                            'rounding' => ['standard', '2'],
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
                        ['type' => 'note', 'text' => <<<'TXT'
                        Generally, your dog's BMI should be below 3, but it depends on the size of the dog  We recommend that you verify the result with the body condition score and/or consult a vet 
                        TXT],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'bmi > upper', 'text' => 'This BMI suggests that your dog may be overweight.'],
                                ['when' => 'bmi < bottom', 'text' => 'This BMI suggests that your dog may be underweight.'],
                                ['when' => 'bottom <= bmi <= upper', 'text' => 'This BMI suggests that your dog\'s weight is healthy.'],
                                ['when' => null, 'text' => <<<'TXT'
                                The estimated healthy BMI range for this breed is from {{bottom.formattedValue}} to {{upper.formattedValue}}  Remember that this result is just a guide and you should always consult your vet if in doubt.
                                TXT],
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
                            'name' => 'bottom',
                            'label' => 'Bottom',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'upper',
                            'label' => 'Upper',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'bmi = (mass/0.45) / (height/2.54)',
            'results' => ['height' => '(254/45)*mass/bmi', 'mass' => '(45/254)*bmi*height', 'bmi' => '(254/45)*mass/height'],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => 'Dog BMI takes Height and Weight and returns BMI. It is a single relationship that reads BMI out of height, not a table of canned results keyed by them.',
        'sections' => [
            ['title' => 'How the Dog BMI calculator works', 'html' => <<<'TXT'
            <p>There is one relationship behind Dog BMI: it takes 2 numbers and reports BMI.</p><p>In the form&#039;s own words, BMI = (254 ÷ 45) × Weight ÷ Height.</p><p>The result panel carries BMI, each in a box of its own rather than buried in a sentence.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>Fill in 2 boxes and the page has everything it needs.</p><ul><li><strong>Height</strong> — in centimeters. Measured from the top of your dog&#039;s shoulders.</li><li><strong>Weight</strong> — in kilograms</li></ul><p>What you get back is BMI, shown next to the form rather than on a page of its own.</p>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>Units are handled before the formula runs: Height offers 7 units and opens on centimeters, so a value typed in another one is converted on the way in and the arithmetic always happens in a single base unit.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>The relationship is shown here as the page solves it, with the form&#039;s labels standing where the variable names would.</p><ul><li><strong>BMI</strong> = <code>(254 ÷ 45) × Weight ÷ Height</code></li><li><strong>Height</strong> = <code>(254 ÷ 45) × Weight ÷ BMI</code></li><li><strong>Weight</strong> = <code>(45 ÷ 254) × BMI × Height</code></li></ul><p>Each line below is the same relationship arranged for a different unknown. That is what makes the page work in both directions, and it is worth knowing which line the page used for your answer:</p><ul><li><strong>BMI</strong> = <code>(254 ÷ 45) × Weight ÷ Height</code> — the form to use when Weight and Height are the values you have.</li><li><strong>Height</strong> = <code>(254 ÷ 45) × Weight ÷ BMI</code> — the form to use when Weight and BMI are the values you have.</li><li><strong>Weight</strong> = <code>(45 ÷ 254) × BMI × Height</code> — the form to use when BMI and Height are the values you have.</li></ul><p>Because the equation is written once per variable, the page works in either direction: any one of BMI, Height and Weight can be the unknown.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>There is one relationship on this page, so any answer can be checked by putting it back into the box that owns it and seeing whether the remaining ones agree.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>Units left where they were.</strong> The chip beside Height and Weight is part of the input. A figure entered in millimetres while the chip reads centimetres is out by a factor of ten, and nothing on the page will warn you.</li><li><strong>The answer typed back in.</strong> A result box can be typed into, and doing so changes the question rather than the arithmetic: with BMI is a result filled in, the page solves for a different variable instead. Check which box is blank before reading the panel.</li><li><strong>Height left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Height is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Weight left as a guess.</strong> A figure entered here because the box had to have something in it is the single most common way a correct formula produces a wrong answer. If Weight is unknown, solve for it instead of estimating it — leave it blank.</li><li><strong>Measurements mixed across scales.</strong> A calculation cannot tell a measured value from an estimated one. If Height is an estimate, the answer is only as good as that number, whatever precision the panel displays.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>Before the arithmetic, the form itself. Each box below is named the way it is named on the page, with the unit it opens on and the error it invites if it is filled in carelessly.</p><ul><li><strong>Height</strong> is a centimeters quantity: the page opens it in cm and converts anything else you pick before the formula runs. Measured from the top of your dog&#039;s shoulders. It feeds Weight and BMI. Have it to hand before you start: Height is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li><li><strong>Weight</strong> is a kilograms quantity: the page opens it in kg and converts anything else you pick before the formula runs. It feeds Height and BMI. Have it to hand before you start: Weight is read the moment another box is filled, and a placeholder typed to see what happens becomes an answer.</li></ul><p>None of the boxes has to be filled in a particular order. The page reads them together and works out which single value is missing, so the last one you fill is the one it answers from.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 1 value. Here is what each one is for, and what to compare it against.</p><ul><li><strong>BMI</strong> is a plain number. The value follows from Weight and Height. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. Nothing about it is saved, so if the figure matters, copy it out — the page will not remember it for you.</li></ul>
            TXT],
            ['title' => 'The units this page accepts', 'html' => <<<'TXT'
            <p>Each chip on this page is a table of units of the same quantity. The tables, with the unit each box opens in:</p><ul><li><strong>centimeters</strong> — opens in <em>cm</em>, and the chip also carries cm, m, in, ft, yd and μm. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li><li><strong>kilograms</strong> — opens in <em>kg</em>, and the chip also carries g, lb, oz, st, t and US ton. Every one of them is converted to a single base unit before the formula sees the number, so the answer is the same quantity whichever chip you leave it on.</li></ul><p>The consequence worth remembering is that a chip set to the wrong unit is silent. Nothing on the page can tell a centimetre from an inch once the chip says centimetre, so the check is yours: read the chip before you read the answer.</p>
            TXT],
            ['title' => 'Getting an answer, step by step', 'html' => <<<'TXT'
            <ol><li><strong>Collect the inputs.</strong> You need Height and Weight. Write them down in the unit the chip shows before you type, because the conversion happens inside the page and a mixed set of units is the commonest wrong answer.</li><li><strong>Enter them and press Calculate.</strong> Type Height into the form and press the button. The results appear in the panel; nothing is submitted anywhere and no account is needed.</li><li><strong>Read the answer against the defaults.</strong> Compare BMI with the figure the page&#039;s own defaults give. A result of the same order of magnitude is credible; one that is ten or a hundred times out is almost always a unit or a decimal point.</li><li><strong>Change one box to check your understanding.</strong> The last step is a check, not a calculation: move one box and see that the answer moves the way the formula says it should. When it does, the answer is yours to use.</li></ol><p>Nothing above needs an account, a download or a second visit: the page works the same way the first time and the hundredth.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> BMI follows from a proportional relationship, so a percentage error in one input passes through as roughly the same percentage error in the answer.</li><li><strong>Only the listed units.</strong> The chips cover centimeters and kilograms. A measurement in anything else has to be converted before it is typed in — the page will accept the number, but it will read it as the unit the chip shows.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Use it whenever the numbers you have are Height and Weight and the number you are missing is BMI.</p><p>Because nothing is stored between visits, the page is safe for one-off sums and for repeated ones — there is no history to clear and no account to keep.</p>
            TXT],
            ['title' => 'About this page', 'html' => <<<'TXT'
            <p>The page you are reading is built around one calculation. The form, the formula and the worked examples all describe the same relationship, and the panel is the only place the answer exists — it is computed when you press the button, not fetched.</p><p>Every figure quoted in the article above was produced by this page&#039;s formulas, with the inputs listed beside it. That is deliberate — it is the only way a reader can check the page without trusting it.</p><p>Nothing you enter is stored. The form is local to the page, the calculation runs on it, and the only way your numbers travel anywhere is if you copy the link that carries them.</p><p>The page is one of a catalogue that works the same way: every calculator prints the relationship it uses, runs a worked example from its own defaults, and lets you solve for any one of its variables rather than only the one in the title.</p><p>If a figure here disagrees with a source you trust, the useful thing to check first is the unit on each box, then the formula shown above, and only then the arithmetic — in that order, because that is the order mistakes happen in.</p>
            TXT],
            ['title' => 'Putting the answer to work', 'html' => <<<'TXT'
            <p>Getting the figure is half the job. The other half is what Dog BMI is for, and what it is not.</p><ul><li><strong>Record the inputs with the answer.</strong> If the result is going into a note or a report, put Height and Weight beside it. That is what makes the figure something a colleague can verify rather than take on trust.</li><li><strong>Re-run it when a measurement changes.</strong> There is no stored state to update and nothing to reconcile. If a measurement is revised, type the new value and the page recomputes from scratch.</li><li><strong>Keep the formula with the figure.</strong> The relationship is printed above, so a figure copied into a report can be defended later: the reader can see which inputs produced it and which relationship was applied. That is the difference between a number and a calculation.</li><li><strong>Compare rather than convert.</strong> The page is at its most useful when it is run twice — your case and the reference case — and the two answers compared. A single number is hard to judge; a pair shows which direction the difference lies in and roughly how big it is.</li></ul><p>None of that needs an account, and none of it leaves a record on this site: the fields are the only place your numbers exist, and closing the tab ends them. If the answer matters, the copy button under the panel is there for exactly that reason.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Dog BMI calculator work out?', 'a' => 'BMI, from Weight and Height. The relationship is BMI = (254 ÷ 45) × Weight ÷ Height.'],
            ['q' => 'Which values do I need before I start?', 'a' => 'Height (centimeters), Weight (kilograms). Enter height and weight; BMI is the box to leave alone unless it is the value you came for.'],
            ['q' => 'Can it solve for a different variable?', 'a' => 'Yes. BMI, Height and Weight can each be the answer: the page works out which box is empty and rearranges the relationship for it.'],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            Internally BMI is not rounded at all; the figure you read is formatted for legibility. Chaining it into another calculation is fine, but expect the last digit to move.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => <<<'TXT'
            A blank box is the question. With Height left empty the page rearranges the relationship and returns that value; fill everything and it has nothing to solve for.
            TXT],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of BMI keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/biology/cedar-tree-value', 'name' => 'Standing Timber Value Calculator'],
            ['path' => '/biology/stems-per-hectare', 'name' => 'Stems Per Hectare Calculator'],
            ['path' => '/biology/stomatal-density', 'name' => 'Stomatal Density Calculator'],
        ],
        'authors' => [],
    ],
];
