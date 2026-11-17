<?php

/**
 * Brine
 * /food/brine
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Brine',
    'meta' => ['title' => 'Brine Calculator: Formula, Steps & Examples', 'description' => 'Calculate brine concentration from salt mass and water volume, or solve for a missing amount. The result is not a preservation or curing safety formula.', 'h1' => 'Brine Calculator', 'updated' => '2026-10-23'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => ' You can calculate in any direction - just fill in the fields that you know '],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'custom_brine',
                            'label' => 'Target brine',
                            'type' => 'number',
                            'suffix' => '%',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'water',
                            'label' => 'Water (mL)',
                            'type' => 'number',
                            'unit' => 'omni',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'salt',
                            'label' => 'Salt (g)',
                            'type' => 'number',
                            'unit' => 'omni',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Target brine = salt / water × 100',
            'results' => [
                'custom_brine' => '100*salt/water',
                'salt' => '(1/100)*custom_brine*water',
                'water' => '100*salt/custom_brine',
            ],
        ],
    ],
    'js' => '"use strict";//# sourceURL=customJs.js',
    'article' => [
        'intro' => <<<'TXT'
        Use the Brine calculator to work with a salt concentration, water volume in milliliters and salt mass in grams. Enter two quantities and leave the third blank to solve for it. The displayed percentage is an arithmetic estimate, not a tested preservation recipe or a food-safety check. This form uses fixed units: enter water in mL and salt in g.
        TXT,
        'sections' => [
            ['title' => 'What this brine calculator calculates', 'html' => <<<'TXT'
            <p>The calculator works with three quantities: a target brine concentration, the amount of water and the amount of salt. Enter any two and leave the third empty. For example, you can calculate the concentration from a known salt-and-water mixture, find the salt amount for a chosen concentration and water volume, or find the water volume that matches a known salt amount and concentration.</p>
            <p>The relationship is <strong>concentration (%) = salt in grams ÷ water in milliliters × 100</strong>. Both inputs use fixed units; this page does not convert units. This is a mass-to-volume percentage (grams of salt per 100 milliliters of water), not a percentage by total solution mass. A recipe that defines its brine by weight may therefore use a different convention. Convert measurements yourself before entering them: for example, 1 liter is 1,000 mL and 1 kilogram is 1,000 g.</p>
            <p>The calculator reports the arithmetic implied by its inputs. It does not know what food you will brine, how long it will sit, whether it will remain refrigerated, or whether the recipe needs additional ingredients. Use a tested recipe for the specific food and purpose.</p>
            TXT],
            ['title' => 'How to use the three input fields', 'html' => <<<'TXT'
            <p><strong>Target brine (%)</strong> is the concentration you want to prepare. Leave it blank if you already know both the salt and water amounts and want the calculator to work out the concentration. A target from another recipe is only comparable if that recipe uses the same percentage convention.</p>
            <p><strong>Water (mL)</strong> is the volume of water in the mixture. Enter milliliters only; convert liters by multiplying by 1,000. Do not type a unit into the number box.</p>
            <p><strong>Salt (g)</strong> is the mass of salt. Enter grams only; convert kilograms by multiplying by 1,000. Weigh it where possible. A tablespoon or cup of salt can weigh very different amounts depending on crystal size, brand and how tightly it is packed. If a recipe gives salt by mass, do not substitute an assumed spoon weight without checking it.</p>
            <p>Press Calculate after entering the two values you know. The empty field is the unknown. If all three are filled, clear the one you want the calculator to solve for. Before using the result, check that you entered water in milliliters, salt in grams, and the same percentage convention as the recipe you are following.</p>
            TXT],
            ['title' => 'Worked examples and unit sense checks', 'html' => <<<'TXT'
            <p>Suppose you dissolve 10 grams of salt in 1 liter of water. One liter is 1,000 milliliters, so the mixture contains 10 grams per 1,000 milliliters, or 1 gram per 100 milliliters. Under the calculator’s mass-to-volume convention, that is 1%.</p>
            <p>For a 2% mixture using 1 liter of water, the arithmetic gives 20 grams of salt: 2 grams for each 100 milliliters, multiplied by ten 100-milliliter portions in a liter. For 500 milliliters at the same 2% concentration, the matching salt mass is 10 grams. Halving the water while keeping the salt amount fixed doubles the percentage.</p>
            <p>These examples are checks on the proportion, not instructions for curing, fermenting, canning or brining a particular food. Water is not always exactly 1 kilogram per liter at every temperature, and the percentage definition in a recipe may be different. The calculator’s displayed precision should not be mistaken for laboratory accuracy.</p>
            TXT],
            ['title' => 'What the formula can and cannot tell you', 'html' => <<<'TXT'
            <p>With salt entered in grams and water entered in milliliters, the calculation is salt mass divided by water volume, multiplied by 100. The form does not convert units, so convert any source measurements before typing them. Rearranging the same relationship gives the salt needed for a target percentage or the water volume that corresponds to a known salt amount. Because all three are directly proportional, doubling salt while holding water fixed doubles the computed percentage; doubling both salt and water keeps it unchanged.</p>
            <p>The formula assumes the units represent the quantities described and that the entered values are accurate. It does not determine how much salt will be absorbed by meat or vegetables, how quickly a brine penetrates, or what flavor concentration you will prefer. It also does not include sugar, spices, acids, curing agents or other ingredients unless they are explicitly represented by a field.</p>
            <p>Do not treat the result as a food-preservation validation. A brine percentage by itself does not establish a safe fermentation, curing, pickling or canning process. Those methods depend on tested ingredient ratios, acidity, time, temperature, container and handling steps that this simple calculation does not model.</p>
            TXT],
            ['title' => 'Brining poultry safely', 'html' => <<<'TXT'
            <p>For poultry, follow a current, tested recipe and keep the bird and brine refrigerated. USDA FSIS advises using food-grade plastic, stainless steel or glass containers, fully submerging poultry and keeping the container covered in the refrigerator. Do not use a calculator percentage as a substitute for those handling steps. The agency’s <a href="https://www.fsis.usda.gov/food-safety/safe-food-handling-and-preparation/poultry/poultry-basting-brining-and-marinating">Poultry: Basting, Brining, and Marinating</a> guidance provides a poultry brining example and safe-preparation advice.</p>
            <p>Keep raw poultry and its liquid away from ready-to-eat foods. Wash hands and clean utensils and work surfaces after they contact raw poultry. Discard used brine rather than reusing it as a sauce. Cook poultry to a safe internal temperature of 165°F (74°C), checked with a food thermometer in the thickest parts; a brine calculation cannot tell you whether the meat is cooked.</p>
            <p>Some packaged poultry has already been injected, seasoned or brined. Read the label before adding more salt. If you are following a recipe for a particular bird, use its stated salt, water and time rather than trying to reverse-engineer it from a generic percentage.</p>
            TXT],
            ['title' => 'Fermentation, pickling and curing are different jobs', 'html' => <<<'TXT'
            <p>A kitchen brine used for flavor is not automatically a fermentation brine or a preservation process. Fermented vegetables depend on a tested recipe and controlled conditions. Pickling, water-bath canning and pressure canning each have their own validated requirements. This calculator does not assess acidity, jar processing, fermentation progress or shelf stability.</p>
            <p>Curing meat may involve curing salts that contain nitrite or nitrate. Those products are not interchangeable with ordinary table salt, and a salt-to-water percentage is not a safe cure formula. Never infer curing-salt quantities from this tool. Use an authoritative, tested curing recipe that specifies the exact curing salt and meat weight.</p>
            <p>If the purpose is preservation rather than short-term flavoring, use guidance from a recognized food-safety or home-preservation authority. When a recipe’s method or percentage basis is unclear, do not guess: choose a verified recipe or ask a qualified food-safety professional.</p>
            TXT],
            ['title' => 'Common measurement mistakes', 'html' => <<<'TXT'
            <ul><li><strong>Mixing units.</strong> This form accepts milliliters for water and grams for salt, with no unit conversion. Convert before entering values: one liter is 1,000 mL, and one kilogram is 1,000 g.</li><li><strong>Confusing percent conventions.</strong> This calculator uses salt mass relative to water volume. A recipe expressed as salt by total solution weight is not the same calculation.</li><li><strong>Measuring salt by volume.</strong> Different salts pack differently. If a recipe gives grams, weigh the salt instead of assuming that a spoonful has a fixed mass.</li><li><strong>Using the answer as a preservation guarantee.</strong> The result contains no time, temperature, acidity or process validation.</li><li><strong>Reusing poultry brine.</strong> Brine that has contacted raw poultry should be discarded; avoid cross-contamination and cook the poultry to a measured safe temperature.</li></ul>
            TXT],
            ['title' => 'Plan and mix a batch carefully', 'html' => <<<'TXT'
            <p>Decide on the water amount and the recipe’s target concentration before measuring. If scaling a recipe, multiply both water and salt by the same factor to preserve the same ratio. For instance, making twice the volume at the same concentration requires twice the salt mass; simply adding extra water to an already measured batch weakens it.</p>
            <p>Measure water in a vessel with clear milliliter graduations and weigh salt on a scale set to grams. Convert other units before entering the amounts. Add the salt gradually and stir until it dissolves if the recipe calls for a dissolved brine. This calculator only checks the ratio from the quantities entered; it cannot confirm that a mixture is fully dissolved or that a food is completely submerged.</p>
            <p>Keep any other recipe ingredients separate in your notes. Sugar, spices, acids and aromatics may affect taste, but they do not replace the salt and water values in this calculation. If the recipe specifies a particular salt type, do not switch products and assume the same spoon measure will weigh the same. Recalculate from mass if you change salt type or batch size.</p>
            <p>Before the food goes into the mixture, compare the prepared batch with the tested recipe. Check its food type, concentration basis, timing and refrigeration instructions. If any of those do not match, pause and resolve the difference rather than relying on a mathematically consistent but contextually wrong percentage.</p>
            TXT],
            ['title' => 'Why weighing salt is more dependable', 'html' => <<<'TXT'
            <p>Salt crystals have different shapes and sizes. A spoonful of fine table salt can contain a different mass from the same spoonful of a coarse or flaked salt, and how the spoon is filled changes the amount too. A volume-based recipe may be written for one named salt; replacing it with another by volume can change the actual salt concentration.</p>
            <p>When the recipe gives a mass, use a kitchen scale and convert the amount to grams before entering it. When it gives only a volume, use the same salt type and measuring method the recipe specifies, or consult a reliable conversion for that particular product. Do not use a generic salt density to convert between brands if the result is for a safety-critical process.</p>
            <p>Changing the salt amount is not just a flavor adjustment in every process. Fermentation and curing depend on validated ingredients and procedures, so this page should not be used to improvise their concentrations. For ordinary culinary brining, the calculator can help compare quantities, but taste, texture and absorption still depend on the food and recipe.</p>
            TXT],
            ['title' => 'Source and limits', 'html' => <<<'TXT'
            <p>The arithmetic on this page follows the displayed relationship between salt mass, water volume and concentration. The poultry handling notes summarize USDA FSIS guidance linked above. They do not turn the calculator into a tested recipe, and they should not be applied to fermentation, curing or canning without authoritative instructions for that process.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Brine calculator solve for?', 'a' => 'It relates target brine percentage, salt mass and water volume. Enter any two and leave the third blank. The percentage is mass-to-volume: grams of salt per 100 milliliters of water.'],
            ['q' => 'How much salt makes a 1% brine with 1 liter of water?', 'a' => 'Under this calculator’s mass-to-volume convention, 1% is 1 gram per 100 milliliters. One liter contains ten 100-milliliter portions, so the arithmetic gives 10 grams of salt.'],
            ['q' => 'Is this percentage the same as salt by total solution weight?', 'a' => 'No. The formula compares salt mass with water volume. A weight-by-weight recipe uses a different denominator; follow the recipe’s stated convention rather than assuming the percentages are interchangeable.'],
            ['q' => 'Can I use this calculator for fermenting or canning?', 'a' => 'Not as a safety check. It does not validate acidity, time, temperature, fermentation or canning steps. Use a tested recipe from an authoritative food-preservation source.'],
            ['q' => 'Can this calculate a curing-salt amount?', 'a' => 'No. Curing salt is not interchangeable with ordinary salt, and curing requires an exact, tested formula. Use a trusted curing recipe that specifies the product and meat weight.'],
            ['q' => 'How should I brine poultry safely?', 'a' => 'Follow a tested recipe, keep poultry covered and refrigerated in a food-grade container, discard used brine, prevent cross-contamination and cook to 165°F (74°C) using a food thermometer.'],
        ],
        'related' => [
            ['path' => '/food/bacon-curing', 'name' => 'Bacon recipe batch scaling'],
            ['path' => '/food/turkey-thawing', 'name' => 'Turkey thawing'],
            ['path' => '/food/ham-cooking', 'name' => 'Ham cooking time']
        ],
    ],
];
