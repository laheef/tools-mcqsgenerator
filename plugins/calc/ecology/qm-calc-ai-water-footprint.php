<?php

/**
 * AI Water Footprint Calculator
 * /ecology/ai-water-footprint
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'AI Water Footprint Calculator',
    'meta' => ['title' => 'AI Water Footprint Calculator: Litres Per Prompt', 'description' => 'Turn your daily prompts into litres of water over a year, then read that volume as half-litre bottles, eight-minute showers and household-days of use.', 'h1' => 'AI Water Footprint Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'Your prompts',
            'fields' => [
                [
                    'name' => 'prompts_per_day',
                    'label' => 'Prompts sent per day',
                    'type' => 'number',
                    'default' => '25',
                    'rounding' => ['standard', '0'],
                    'min' => '0',
                    'help' => 'A question, a rewrite, a summary: each one counts once.',
                ],
                [
                    'name' => 'water_per_prompt',
                    'label' => 'Water used per prompt',
                    'type' => 'number',
                    'unit' => '20',
                    'unit_default' => 'ml',
                    'default' => '10',
                    'rounding' => ['omni', '0.01'],
                    'help' => 'Vendor and research figures run from a few millilitres to half a litre.',
                ],
                [
                    'name' => 'days',
                    'label' => 'Days in the period',
                    'type' => 'number',
                    'default' => '365',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                    'help' => '365 for a year, 30 for a month, 7 for a week.',
                ],
            ],
        ],
        [
            'title' => 'What the prompts add up to',
            'fields' => [
                [
                    'name' => 'daily_water',
                    'label' => 'Water per day',
                    'type' => 'number',
                    'unit' => '20',
                    'unit_default' => 'liters',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'period_water',
                    'label' => 'Water over the period',
                    'type' => 'number',
                    'unit' => '20',
                    'unit_default' => 'liters',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'bottles',
                    'label' => 'Half-litre bottles filled',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['standard', '0'],
                ],
                [
                    'name' => 'showers',
                    'label' => 'Eight-minute showers',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                    'help' => 'A shower head at 8 litres a minute, so 64 litres a shower.',
                ],
                [
                    'name' => 'household_days',
                    'label' => 'Household-days of water',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                    'help' => 'One household-day is 150 litres, a common indoor use figure.',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Prompt water',
            'results' => ['daily_water' => 'prompts_per_day * water_per_prompt', 'period_water' => 'daily_water * days'],
        ],
        [
            'title' => 'The same volume, in everyday units',
            'results' => ['bottles' => 'period_water / 0.0005', 'showers' => 'period_water / 0.064', 'household_days' => 'period_water / 0.15'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Twenty-five prompts a day at ten millilitres each comes to 250 millilitres of water a day, and 91.25 litres across a year — roughly 183 half-litre bottles. The arithmetic is prompts × water per prompt × days, with one conversion from millilitres into litres at the end. The page prints that volume again as eight-minute showers and as household-days, because a figure in litres is hard to judge and a figure in showers is not.</p>
        TXT,
        'sections' => [
            ['title' => 'What the AI water footprint counts', 'html' => <<<'TXT'
            <p>The water footprint of a prompt is the water that had to be withdrawn and not returned so that the answer could be produced. Two parts dominate, and they sit in different places. The first is on-site: server halls shed heat, and in a data centre built around evaporative cooling that heat leaves with water vapour. The second is off-site, at the power station, where generating the electricity the chips draw took water of its own — through a cooling tower, a river, or a reservoir behind a turbine.</p><p>Neither part appears on your bill, and nobody meters it per query. What is metered is the site total: litres per day, litres per megawatt-hour, litres per rack. Turning that into a number per prompt means dividing by traffic, which is why the estimate moves whenever utilisation moves.</p><p>The shape of this page follows from that: you choose the per-prompt figure, and the page multiplies. It cannot know what your provider did on the day you asked.</p>
            TXT],
            ['title' => 'Choosing a number for water per prompt', 'html' => <<<'TXT'
            <p>Reported intensities for large language models mostly fall between one and fifty millilitres per response, and the spread is real rather than sloppy. A small model answered from a cache costs almost nothing; a long reasoning run on a big model in a hot climate can cost a hundred times more. Evaporative cooling in Arizona consumes water that a closed-loop system in Norway does not, and a coal-heavy grid spends more water per kilowatt-hour than a wind-heavy one.</p><p>Ten millilitres is a defensible middle for a chat assistant used at ordinary length: short answers, mixed models, a provider that publishes partial data. If your provider discloses a figure, use it and skip the guesswork. If it does not, run the page twice with a low and a high value — one millilitre and fifty — and treat the two answers as the honest range rather than picking the one you prefer.</p><ul><li><strong>1 mL</strong> — cached or tiny-model answers, closed-loop cooling</li><li><strong>10 mL</strong> — a general chat assistant, mixed workloads</li><li><strong>50 mL</strong> — long generations on a frontier model, evaporative cooling</li></ul>
            TXT],
            ['title' => 'A year at 25 prompts a day, worked through', 'html' => <<<'TXT'
            <p>Start with the daily volume. Twenty-five prompts multiplied by ten millilitres is 250 millilitres, which is a quarter of a litre. Multiply by 365 days and the year comes to 91.25 litres. The unit chip on the first box is millilitres, so the page converts to cubic metres before any arithmetic happens and converts back for display; entering 0.01 litres instead of 10 millilitres gives exactly the same answer.</p><p>The three comparison boxes then divide that 91.25 litres. Half-litre bottles: 183. Eight-minute showers at eight litres a minute, so 64 litres each: 1.43. Household-days at 150 litres of indoor use a day: 0.61. None of those divisions is a new estimate — they are the same volume wearing different clothes.</p><p>Double the prompts to fifty and every result doubles: half a litre a day, 182.5 litres a year, 2.85 showers. That proportional response is the point of the page. There is no threshold hiding in the formula.</p>
            TXT],
            ['title' => 'Reading 91 litres against things you know', 'html' => <<<'TXT'
            <p>A person drinks around two litres of water a day, which is 730 litres a year. On that scale, a year of moderate prompting is 45 days of drinking water — noticeable, small. A toilet flush takes six litres, so the same year is fifteen flushes. A full bath is nearer eighty litres: one bath, plus a bit.</p><p>The comparison changes character as usage climbs. A hundred prompts a day at fifty millilitres is five litres daily, or 1,825 litres a year, which is 12 per cent of the 150 litres a person typically uses indoors in a day, every day, forever. At that level the water stops being a rounding error and starts being a habit worth naming.</p><p>The shower comparison carries its own assumption, so read it as a scale rather than a measurement. A low-flow head delivers five litres a minute, an old one twelve, and the page fixes the figure at eight. If your shower runs at five, an eight-minute shower is 40 litres rather than 64, and every shower the page reports is about half as many again as the truth.</p><p>Household-days are the clearest of the three comparisons because they already include everything a person does at home: washing, cooking, flushing, drinking. Fractional household-days are not silly. They are the honest way to say that a habit is a small share of one person's water rather than none of it.</p>
            TXT],
            ['title' => 'Where the water goes, and which part is consumed', 'html' => <<<'TXT'
            <p>Water engineers separate withdrawal from consumption. Withdrawal is water taken from a river, lake or aquifer and mostly put back, warmer and cleaner than it left. Consumption is water that does not return: evaporated in a cooling tower, lost to the atmosphere, gone from the local catchment. A footprint that adds the two together inflates the figure; a footprint that counts only consumption can look flattering in a region where the withdrawal still competes with farmland.</p><p>Data centre cooling leans towards consumption when it is evaporative, because the whole design is to let heat leave with water vapour. Closed-loop and liquid-immersion designs cut consumption sharply and raise electricity use slightly, which moves the burden to the power station. That trade is why two providers with identical energy figures can report water footprints ten times apart.</p><p>The off-site share is set by the grid. A kilowatt-hour from a once-through coastal plant withdraws a lot of water and consumes little; the same kilowatt-hour from a coal plant with a cooling tower consumes more; from wind or solar it consumes almost none. Averages hide this, and the page's single per-prompt figure is an average.</p>
            TXT],
            ['title' => 'The same arithmetic run the other way', 'html' => <<<'TXT'
            <p>Three quantities, one relationship, so any one of them can be the unknown. If you know the water you are willing to spend and want to know how many prompts it buys, divide the litres by the per-prompt figure and the days. If you know your yearly litres and your prompt count, the per-prompt figure falls out as the quotient.</p><ul><li><strong>Water per day</strong> = prompts × water per prompt</li><li><strong>Water over the period</strong> = water per day × days</li><li><strong>Prompts per day</strong> = water over the period ÷ (water per prompt × days)</li><li><strong>Water per prompt</strong> = water over the period ÷ (prompts × days)</li><li><strong>Days</strong> = water over the period ÷ water per day</li></ul><p>Every row uses the same three symbols. The millilitre-to-litre factor of a thousand is the only constant the page keeps, and it is visible in the formulas rather than buried in the code.</p>
            TXT],
            ['title' => 'What the estimate cannot tell you', 'html' => <<<'TXT'
            <p>It cannot tell you what happened on the day you typed. Requests are routed to whichever region has capacity, batches are packed with other people's requests, and cached answers cost a fraction of fresh ones. A provider's water figure is an annual average across millions of users, and applying it to one person is a reasonable approximation rather than a measurement.</p><p>It also cannot tell you whether the water mattered where it was used. A litre evaporated in a catchment under drought stress is not the same litre as one evaporated where rivers run high. If you want the version of this number that reflects that, weight it by local water stress — the Aqueduct baseline water stress score for the region is the usual starting point — and treat the result as a different question rather than a better answer.</p><p>Finally, it says nothing about your own tap. The page counts the water behind the answer, not the water you drink while waiting for it. Those are separate budgets, and only one of them is metered in your building.</p>
            TXT],
            ['title' => 'From one person to a whole user base', 'html' => <<<'TXT'
            <p>Personal figures stay small for a reason, and the reason is arithmetic. A million people sending 25 prompts a day at ten millilitres use 250 cubic metres of water a day between them, which is a tenth of an Olympic swimming pool and roughly what a small town draws. A hundred million people do that thirty times over: 25,000 cubic metres a day, nine million cubic metres a year.</p><p>That multiplication is where the attention belongs. Per-request numbers invite arguments about millilitres; fleet numbers decide how much water a region has to find. If you are estimating for an organisation rather than a person, count seats and daily prompts, multiply, and compare the result with the water the local utility reports for the same catchment instead of with a bottle.</p><p>There is also a utilisation effect that runs the other way. A data centre that is half empty still cools its halls, so the same site water serves half the answers. Measured per prompt, idle capacity looks like waste; measured per site, it looks like the reserve that keeps latency low. Both descriptions are true at once.</p>
            TXT],
            ['title' => 'What actually moves the number down', 'html' => <<<'TXT'
            <p>Shorter answers are the largest lever you control directly. A reply of a hundred words keeps a GPU busy for a fraction of the time a reply of a thousand words does, and both cooling and electricity follow busy time. Asking for a summary instead of an essay is not a moral gesture; it is a smaller computation.</p><p>Reusing an answer beats regenerating it. Cached responses, saved outputs and a shared document all spend the water once. So does batching: ten questions asked in one prompt usually cost less than ten separate conversations, because the model reads the context once.</p><p>Provider and region matter, though you rarely see them. A provider running closed-loop cooling on a low-carbon grid reports a very different litres-per-kilowatt-hour from one running evaporative towers in a desert. When a provider publishes a water intensity figure, that figure already contains those choices, which is why using it beats guessing at millilitres.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Is this the same as the water one ChatGPT or Gemini answer uses?', 'a' => <<<'TXT'
            It is the same question, answered with your number rather than the provider's. Put the provider's published per-request figure into the middle box and the page becomes their estimate applied to your usage. Leave the box at ten millilitres and it becomes a middle-of-the-range guess, which is all anyone outside the company can offer.
            TXT],
            ['q' => 'Does a longer prompt use more water?', 'a' => <<<'TXT'
            A little, at the input stage, but the output length dominates. Generating a thousand tokens keeps a GPU busy for far longer than reading a thousand tokens, and water tracks busy time through both cooling and electricity. If your prompts produce long answers, raise the per-prompt figure rather than counting words in what you typed.
            TXT],
            ['q' => 'Why is the per-prompt figure so uncertain?', 'a' => <<<'TXT'
            Because it is a division, not a measurement. Providers meter litres per site, not per request, so the per-request number depends on how busy the site was, which model answered, how the cooling works and what generated the power. Published estimates range over two orders of magnitude for those reasons, not because one of them is careless.
            TXT],
            ['q' => 'Is the water consumed or only borrowed?', 'a' => <<<'TXT'
            Part of each. Evaporative cooling consumes it — the vapour leaves the catchment. Once-through cooling borrows it and returns it warmer. The page's single figure blends the two, so treat it as water that had to be available, which is the quantity that competes with other users.
            TXT],
            ['q' => 'How many prompts before the water matches a shower?', 'a' => <<<'TXT'
            At ten millilitres each, 6,400 prompts fill a 64-litre eight-minute shower. At one prompt a day that is more than seventeen years; at a hundred a day it is about two months. The box labelled eight-minute showers on the results panel does that division for whatever numbers you enter.
            TXT],
            ['q' => 'Does the number include the water used to make the chips?', 'a' => <<<'TXT'
            No, and it should not be read as if it did. Fabricating a processor is water-intensive, but that water belongs to the hardware's lifetime rather than to any one query. Dividing it across billions of prompts would need a device-lifetime model the page does not have.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
