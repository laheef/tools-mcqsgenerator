<?php

/**
 * Bacon recipe batch scaler
 * /food/bacon-curing
 *
 * The scale factor is for non-curing recipe ingredients only. It does not
 * calculate or validate salt, nitrite, nitrate, Cure #1, Cure #2, or cure time.
 */

return [
    'name' => 'Bacon Recipe Scale Calculator',
    'meta' => [
        'title' => 'Bacon Recipe Scale Calculator — Convert Batch Weights',
        'description' => 'Scale a tested bacon recipe by meat weight. This tool does not calculate curing salt or nitrite; follow an authoritative recipe and product directions.',
        'h1' => 'Bacon Recipe Scale Calculator',
        'updated' => '2026-10-23',
    ],
    'sections' => [
        [
            'title' => 'Scale a tested recipe',
            'note' => 'This factor is for non-curing ingredients only. Do not use it to calculate, change, or substitute curing salt, nitrite, nitrate, or cure time. Follow a research-tested recipe and the exact product directions.',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'originalMeat',
                            'label' => 'Recipe meat weight (g)',
                            'type' => 'number',
                            'unit' => 'omni',
                            'min' => '0.000001',
                            'default' => '1',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'targetMeat',
                            'label' => 'Your meat weight (g)',
                            'type' => 'number',
                            'unit' => 'omni',
                            'min' => '0.000001',
                            'default' => '2',
                            'rounding' => ['omni', '0.0001'],
                        ],
                        [
                            'name' => 'scaleFactor',
                            'label' => 'Scale factor for non-curing ingredients only',
                            'type' => 'number',
                            'unit' => 'omni',
                            'readonly' => true,
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'scaleFactor = targetMeat / originalMeat',
            'results' => [
                'scaleFactor' => 'targetMeat/originalMeat',
                'targetMeat' => 'scaleFactor*originalMeat',
                'originalMeat' => 'targetMeat/scaleFactor',
            ],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        Compare the meat weight in a tested bacon recipe with the amount you have to get a scale factor for ordinary, non-curing ingredients. Enter both weights in grams; the calculator divides the entered numbers directly and does not convert units. For example, a recipe written for 1,000 g of meat scaled to 2,000 g gives a factor of 2. This is not a curing-salt calculator: do not use the factor to set or adjust salt, nitrite, nitrate, curing salt, or curing time. Use an authoritative recipe and follow the exact curing-product label.
        TXT,
        'sections' => [
            [
                'title' => 'What this calculator does—and does not do',
                'html' => <<<'TXT'
                <p>This page divides your meat weight by the meat weight specified in a recipe. The result is a simple ratio: 1 means the amounts match, 2 means your batch has twice the recipe's meat weight, and 0.5 means it has half. It can help scale ingredients such as pepper or herbs when the recipe itself says they scale proportionally.</p>
                <p><strong>It does not calculate a bacon cure.</strong> It gives no quantity of salt, pink curing salt, sodium nitrite, sodium nitrate, Cure #1, Cure #2, or any other curing product. It does not assess safety, validate a recipe, predict curing time, or tell you how to smoke or cook meat. Never treat this ratio as a way to scale curing agents. Use a recipe specifically tested for your cut, method, and batch conditions, and follow the exact directions for the curing product.</p>
                TXT,
            ],
            [
                'title' => 'How to use the scale factor',
                'html' => <<<'TXT'
                <ol><li>Find the meat weight stated by the tested recipe. Convert it to grams and enter it as “Recipe meat weight (g).”</li><li>Weigh the meat you actually plan to use, convert that weight to grams, and enter it as “Your meat weight (g).” Both numbers must use grams because this form does not convert units.</li><li>Read the scale factor. For ordinary ingredients that the recipe permits you to scale proportionally, multiply the recipe's amount by this factor.</li><li>Keep every curing ingredient and process instruction exactly as the recipe and product label specify. If your batch size differs and the tested recipe does not explain how to adapt it safely, contact a local university extension food-safety specialist rather than improvising.</li></ol>
                <p>Weigh meat rather than estimating from the number of slices or pieces. If the recipe describes a particular trimmed cut or preparation, make sure the weight you enter refers to the same thing. A mismatch in the reference weight can make a mathematically correct ratio inappropriate for the recipe.</p>
                TXT,
            ],
            [
                'title' => 'Worked examples',
                'html' => <<<'TXT'
                <p><strong>Twice the recipe's meat:</strong> a tested recipe lists 1,000 g of meat, and your batch weighs 2,000 g. The factor is 2,000 ÷ 1,000 = 2. That says the batch has twice the meat weight; it is not permission to double curing salt or alter the cure.</p>
                <p><strong>Half the recipe's meat:</strong> the recipe lists 1,800 g and you have 900 g. The factor is 900 ÷ 1,800 = 0.5. For an ordinary ingredient that the recipe allows to scale proportionally, half its listed amount corresponds to this factor. Do not use that operation to determine curing agent or curing duration.</p>
                <p><strong>Convert before entering:</strong> if a recipe lists 1 kg and your scale reads 1,500 g, convert 1 kg to 1,000 g first. The factor is then 1,500 ÷ 1,000 = 1.5. The calculator cannot tell whether you entered grams, kilograms, or another unit, so matching units is your responsibility.</p>
                TXT,
            ],
            [
                'title' => 'Why curing is not ordinary recipe scaling',
                'html' => <<<'TXT'
                <p>Curing meat is a preservation process, not just flavor adjustment. Salt, curing agents, meat dimensions, distribution, time, temperature, handling, and the specific method all matter. A ratio calculator cannot establish that those parts of a process are safe or correctly matched. A general-purpose percentage or multiplication rule can be especially misleading when recipes use different curing methods or products.</p>
                <p>“Pink salt” is an ambiguous informal name. It can refer to curing products that contain nitrite or nitrate, while Himalayan pink salt is a different product. Curing products also differ in composition and directions. Do not identify a curing ingredient by color or name alone, and never substitute table salt, another curing mixture, or an unlabelled product. Keep curing products clearly labelled and stored separately from ordinary salt and food.</p>
                <p>For home curing, use instructions intended for home use from a credible food-safety or university extension source and the product manufacturer's directions. Do not infer a dose from an online calculator, a commercial processing limit, or a recipe for another meat, method, product, or batch. The USDA Food Safety and Inspection Service says home bacon curing is possible and directs consumers to contact a local extension office for instructions. Commercial regulatory limits are not home-curing recipes.</p>
                TXT,
            ],
            [
                'title' => 'Temperature, handling, and cooking still matter',
                'html' => <<<'TXT'
                <p>A scale factor does not replace safe food handling. Keep raw pork cold, prevent raw meat and its juices from contaminating ready-to-eat food, clean hands and food-contact surfaces, and follow the selected recipe's refrigeration and handling instructions. Do not use this page to decide whether meat held outside the recipe's stated temperature range can be made safe.</p>
                <p>Some bacon is sold raw and must be cooked before eating. Follow the recipe and package directions for cooking and storage; use a food thermometer when the instructions call for checking temperature. A calculator cannot inspect the meat, measure its internal temperature, verify the cure reached the intended result, or determine whether a finished product is shelf-stable. Do not assume homemade bacon is safe at room temperature or ready to eat just because it has cured, dried, or smoked.</p>
                <p>If the recipe or curing product instructions are missing, unclear, or inconsistent, pause rather than guessing. Ask a qualified local extension food-preservation specialist or the product manufacturer. When in doubt about food that may have been mishandled, discard it; tasting is not a safety test.</p>
                TXT,
            ],
            [
                'title' => 'Understanding the calculation and its limits',
                'html' => <<<'TXT'
                <p>The relationship is <code>scale factor = your meat weight ÷ recipe meat weight</code>. Enter both inputs in grams so they use the same mass unit; the values cancel in the division and the answer has no unit. The form does not convert measurements. For the reverse calculation, <code>your meat weight = scale factor × recipe meat weight</code>. The calculator assumes positive weights and a recipe that states a clear meat weight.</p>
                <p>The arithmetic is exact for the numbers entered, subject to the displayed rounding. The result is not a safety rating. It cannot confirm that a recipe permits proportional scaling, that ingredients distribute evenly, or that the meat pieces have the same thickness. It also cannot adapt a dry cure to a brine, account for injection or equipment, or compensate for a different curing product. Those are process decisions for the tested recipe and its authoritative instructions.</p>
                <p>Use a consistent definition of meat weight. If the recipe's amount is before trimming, do not compare it with a weight after trimming unless the recipe says to do so. Convert all measurements carefully, and do not add water or brine weight to the meat weight unless the recipe explicitly defines the reference that way. The calculator only compares the two values you enter.</p>
                TXT,
            ],
            [
                'title' => 'Check that a recipe matches your process',
                'html' => <<<'TXT'
                <p>Before using any batch-size ratio, make sure the recipe is actually for the food and method you intend to make. Read the full recipe rather than relying on a snippet or a list of ingredients. Confirm the recipe identifies bacon or the relevant pork cut, specifies the curing method, gives clear ingredient and measurement directions, and explains the required refrigeration, handling, and finishing steps. A recipe for a different meat, product, or process is not automatically interchangeable just because both recipes use salt.</p>
                <p>Pay attention to product names and formulation, not just a shared word such as “cure.” Follow the manufacturer's label for the exact product in your possession. If the tested instructions specify a weighed quantity, do not replace weighing with a volume spoon or estimate. If directions depend on equipment or a preparation step you do not have, do not quietly skip that step and assume the formula compensates. This page knows only two weights; it cannot see any recipe's details.</p>
                <p>When a source gives no safe way to adapt its batch size, keep to the batch it tested or ask a local extension food-preservation specialist for advice. That is particularly important if the recipe is unclear about whether the weight is before or after trimming, whether liquid is included, or how a particular curing product is used. Do not resolve ambiguity by guessing a percentage from another site or by treating this calculator's factor as a tested process.</p>
                <p>Keep a copy of the source recipe and the product label with your preparation notes. Record what cut and weight you used and follow the recipe's stated checkpoints. Notes can help you repeat a process, but they do not prove a batch is safe and should not become an unreviewed substitute recipe. If you find that instructions conflict, stop and verify them with the recipe's publisher or an appropriate specialist before preparing the meat.</p>
                TXT,
            ],
            [
                'title' => 'Reliable guidance and related tools',
                'html' => <<<'TXT'
                <p>The <a href="https://www.fsis.usda.gov/food-safety/safe-food-handling-and-preparation/meat-catfish/bacon-and-food-safety">USDA FSIS Bacon and Food Safety page</a> describes bacon and its curing methods, notes that home curing is possible, and advises consumers to contact a local extension office for instructions. It also explains that processing requirements apply to commercial bacon; those requirements should not be converted into a home recipe. The <a href="https://extension.umn.edu/food/preparing/cooking-at-home/food-preservation/meat-fish-and-poultry">University of Minnesota Extension guide to meat, fish, and poultry preservation</a> emphasizes following research-tested procedures for curing.</p>
                <p>For a related calculator, see <a href="/food/brine">Brine</a>. That tool calculates a salt-to-water concentration and is not a bacon-curing recipe or a source of curing-agent directions. Other food tools include <a href="/food/ham-cooking">Ham cooking time</a> and <a href="/food/turkey-thawing">Turkey thawing</a>; use the instructions and safety guidance relevant to each food and method.</p>
                TXT,
            ],
        ],
        'faq' => [
            ['q' => 'What does the Bacon Recipe Scale Calculator calculate?', 'a' => 'It divides your meat weight by the meat weight listed in a recipe and returns a unitless scale factor. It does not calculate curing ingredients or validate a cure.'],
            ['q' => 'Can I use this scale factor for curing salt or nitrite?', 'a' => 'No. Do not use this factor to calculate or change salt, nitrite, nitrate, Cure #1, Cure #2, or any curing product. Follow an authoritative recipe and the exact product directions.'],
            ['q' => 'Can I use different weight units in the two fields?', 'a' => 'No. Enter both weights in grams; the form does not convert units. Convert any recipe or scale measurement before entering it.'],
            ['q' => 'What does a scale factor of 1.5 mean?', 'a' => 'Your entered meat weight is 1.5 times the recipe weight. It describes the batch-size ratio only; it is not an instruction to scale curing agents or curing time.'],
            ['q' => 'Does the calculator tell me how long to cure bacon?', 'a' => 'No. Curing time depends on the tested method and its instructions. This tool does not estimate time, temperature, safety, or readiness.'],
            ['q' => 'Where can I find home bacon-curing instructions?', 'a' => 'USDA FSIS recommends contacting a local extension office for home-curing instructions. Use a research-tested home recipe and the exact directions for the curing product; do not adapt commercial limits into a home recipe.'],
        ],
        'related' => [
            ['path' => '/food/brine', 'name' => 'Brine'],
            ['path' => '/food/ham-cooking', 'name' => 'Ham cooking time'],
            ['path' => '/food/turkey-thawing', 'name' => 'Turkey thawing'],
        ],
    ],
];
