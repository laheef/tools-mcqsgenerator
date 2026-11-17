<?php

/**
 * Benzo(a)pyrene Smog Calculator
 * /ecology/benzoapyrene
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Benzo(a)pyrene Smog Calculator',
    'meta' => ['title' => 'Benzo(a)pyrene Exposure & Lifetime Risk Calculator', 'description' => 'Read airborne benzo(a)pyrene as exposure index per day, as a yearly total, and as the lifetime cancer risk that the same air carries for a million people.', 'h1' => 'Benzo(a)pyrene Smog Calculator', 'updated' => '2026-11-16'],
    'sections' => [
        [
            'title' => 'The air you are breathing',
            'fields' => [
                [
                    'name' => 'concentration',
                    'label' => 'Benzo(a)pyrene in the air',
                    'type' => 'number',
                    'suffix' => 'ng/m³',
                    'default' => '1',
                    'rounding' => ['omni', '0.001'],
                    'help' => 'A clean European city runs near 0.1; a winter smog episode can pass 10.',
                ],
                [
                    'name' => 'hours_outdoor',
                    'label' => 'Hours spent outdoors each day',
                    'type' => 'number',
                    'default' => '8',
                    'rounding' => ['omni', '0.1'],
                    'min' => '0',
                    'max' => '24',
                    'help' => 'Commuting, lunch, sport. Indoors the figure is far lower.',
                ],
                [
                    'name' => 'days',
                    'label' => 'Days in the period',
                    'type' => 'number',
                    'default' => '365',
                    'rounding' => ['standard', '0'],
                    'min' => '1',
                    'help' => '365 for a year, 120 for one heating season.',
                ],
            ],
        ],
        [
            'title' => 'What that air amounts to',
            'fields' => [
                [
                    'name' => 'exposure',
                    'label' => 'Time-weighted concentration',
                    'type' => 'number',
                    'suffix' => 'ng/m³',
                    'readonly' => true,
                    'rounding' => ['omni', '0.001'],
                    'help' => 'The outdoor figure scaled by the share of the day spent in it.',
                ],
                [
                    'name' => 'cigarettes_per_day',
                    'label' => 'Exposure index per day',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.001'],
                ],
                [
                    'name' => 'cigarettes_period',
                    'label' => 'Exposure index over the period',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                ],
                [
                    'name' => 'risk_per_million',
                    'label' => 'Excess lifetime cancers per million people',
                    'type' => 'number',
                    'readonly' => true,
                    'rounding' => ['omni', '0.01'],
                    'help' => 'From the WHO unit risk of 8.7 × 10⁻⁵ per ng/m³ of lifetime exposure.',
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'Exposure',
            'results' => ['exposure' => 'concentration * hours_outdoor / 24', 'cigarettes_per_day' => 'exposure', 'cigarettes_period' => 'exposure * days'],
        ],
        [
            'title' => 'Risk',
            'results' => ['risk_per_million' => 'exposure * 87'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        <p>Air holding one nanogram of benzo(a)pyrene per cubic metre, breathed for eight hours a day, gives a time-weighted concentration of 0.333 ng/m³ and 121.67 exposure-index units across a year. Eight hours is a third of the day, so the time-weighted concentration is 0.333 ng/m³, and the page reads that through the WHO unit risk to give 29 extra lifetime cancers per million people. Three boxes produce all of it: the concentration, the hours outdoors, and the length of the period.</p>
        TXT,
        'sections' => [
            ['title' => 'What benzo(a)pyrene is, and where it comes from', 'html' => <<<'TXT'
            <p>Benzo(a)pyrene is one of the polycyclic aromatic hydrocarbons, a family built by burning things incompletely. It forms whenever carbon and hydrogen are heated without enough oxygen: in a car engine before it warms up, in a coal stove, on a wood fire, in a cigarette, on a charcoal grill, in a diesel engine under load. The molecule is five fused rings, stable enough to travel on soot particles for days and small enough to reach the deep lung.</p><p>Because it rides on particles, its concentration follows the particles. Winter inversions trap both; a valley town burning wood and coal can read ten times the summer level with no change in traffic. The European target value for the annual mean is 1 ng/m³, and the WHO air quality guideline is a tenth of that — which tells you how much headroom the average city has.</p><p>What the page uses is the outdoor concentration. Indoors it can be worse: a wood stove, a candle, frying oil and tobacco all add BaP, and a kitchen with poor ventilation can exceed the street outside.</p>
            TXT],
            ['title' => 'What the exposure index means', 'html' => <<<'TXT'
            <p>The exposure index is the concentration multiplied by the share of the day spent outdoors. It is a compact way to compare scenarios in this calculator, not a cigarette dose, a biological dose measurement, or a clinical risk estimate.</p><p>The separate lifetime-risk output uses an assumed unit-risk coefficient of 87 excess cases per million per ng/m³ of continuous exposure. That coefficient should be checked against the selected health authority’s source and assumptions before the result is used for decisions; it is a population-level extrapolation, not an individual prediction.</p><p>For a seasonal comparison, keep the inputs tied to the same monitoring location and the same averaging period. The index is concentration multiplied by the fraction of a day spent outdoors, then multiplied by the number of days in the period. If you compare two seasons, calculate each period separately and add the period totals; do not add the two concentrations or treat a brief peak as though it lasted all day. This still leaves out breathing rate, indoor exposure and particle deposition, so it is a consistent comparison tool rather than a complete personal-dose model.</p>
            TXT],
            ['title' => 'A day at 1 ng/m³, worked through', 'html' => <<<'TXT'
            <p>Eight hours out of twenty-four is one third, so the time-weighted exposure is 0.333 ng/m³. The comparison field simply repeats this concentration-time exposure index; it is not a validated conversion to cigarette dose or risk. Multiply by 365 and the year holds 121.67 exposure-index units.</p><p>For risk, 0.333 multiplied by 87 is 29 excess cancers per million people over a lifetime of that exposure. Put the same person outdoors for twelve hours instead and the exposure rises to 0.5, the exposure index to 0.5 per day, the annual index to 182.5 and the risk to 43.5 per million. The relationship is linear throughout — no threshold, no safe plateau.</p><p>Raise the concentration to the European target value's tenfold winter episode, 10 ng/m³, and the same eight hours give an exposure index of 3.33 per day, 1,217 over a year and a risk figure of 290 per million. That last number is why the winter numbers get reported at all.</p>
            TXT],
            ['title' => 'Reading the risk figure without panicking', 'html' => <<<'TXT'
            <p>Twenty-nine per million is a small absolute risk applied to a very large population. It also is not a prediction about you. The unit risk behind it comes from occupational cohorts exposed to far higher concentrations than a city street, extrapolated downward with an assumed linear dose-response. The true curve at low doses could be flatter, steeper, or have a threshold, and nobody knows which.</p><p>What the number is good for is comparison. It says a winter smog episode is a bigger deal than a summer afternoon, that a wood stove is a serious indoor source, and that a city at 1 ng/m³ carries roughly ten times the risk of one at 0.1. It does not say whether you personally will be among the 29.</p><p>Population figures also compound. A million people at 29 per million is 29 expected cases; ten million is 290. Public-health arithmetic works at that scale, and individual decisions rarely do.</p>
            TXT],
            ['title' => 'Why the winter number beats the annual one', 'html' => <<<'TXT'
            <p>Air quality limits are written as annual means because they are easy to enforce, and annual means hide the thing that matters. A town at 1 ng/m³ annually might sit at 0.2 all summer and 3 all winter. The person walking to work in January gets the winter figure, not the average, and the difference in exposure-index units is a factor of fifteen.</p><p>Use the page twice a year rather than once. Enter the winter concentration and the winter hours, then the summer pair, and add the two periods separately: 120 days at 3 ng/m³ and 245 at 0.3 is a truer picture than 365 at 1. The page only multiplies what you give it, so give it the right season.</p><p>Wind matters as much as season. A street canyon beside a busy junction can hold several times the concentration measured at the nearest official station, which is usually sited in a park or on a roof. The number on the website is a city's number, not a kerbside one.</p>
            TXT],
            ['title' => 'Comparing towns, streets and seasons', 'html' => <<<'TXT'
            <p>Annual means for benzo(a)pyrene vary by more than a hundredfold across Europe. Atlantic cities with gas heating and clean power sit below 0.1 ng/m³. Industrial regions of central Europe that still burn coal in winter run several times the target value. Asian megacities with heavy coal use can pass 10 ng/m³ as an annual average, which corresponds to a high time-weighted exposure index.</p><p>Within one city the spread is often as large as between cities. A monitoring station on a rooftop records the regional background; a kerbside station near a junction records traffic; a station in a valley suburb records woodsmoke. All three are honest, and all three give different answers when fed into the page.</p><p>The practical instruction is to use the station that resembles the place you actually spend time. If you walk along a main road every day, the rooftop number understates your exposure by a factor that can reach five. If you work from home in a village, the city-centre station overstates it.</p><p>Model estimates fill the gaps where no monitor exists, usually at one-kilometre resolution, and they are better than nothing. Treat them the way you would treat any average over a square kilometre: useful for a neighbourhood, useless for a street corner.</p>
            TXT],
            ['title' => 'The same relationship run backwards', 'html' => <<<'TXT'
            <p>Every box on the form is reachable from the others, so the page also answers the reverse questions. If a health authority sets a risk ceiling, the exposure it allows falls straight out. If you know an exposure-index target, the concentration that fits it drops out of the division.</p><ul><li><strong>Time-weighted exposure</strong> = concentration × hours outdoors ÷ 24</li><li><strong>Exposure index per day</strong> = time-weighted exposure</li><li><strong>Exposure index over the period</strong> = exposure × days</li><li><strong>Excess cases per million</strong> = exposure × 87</li><li><strong>Concentration</strong> = exposure × 24 ÷ hours outdoors</li><li><strong>Hours outdoors</strong> = exposure × 24 ÷ concentration</li></ul><p>The 87 is the only constant, and it is the WHO unit risk expressed per million people rather than per person. Everything else is multiplication or its inverse.</p>
            TXT],
            ['title' => 'Where a single exposure index misleads', 'html' => <<<'TXT'
            <p>First, sidestream smoke is not street air. Cigarettes deliver a mixture that includes irritants and carcinogens benzo(a)pyrene does not represent, so matching on one marker understates what smoking does to a person's lungs.</p><p>Second, particle size differs. Traffic soot is finer than woodsmoke ash, and finer particles reach deeper. Two atmospheres with identical BaP can carry different deposition, and the page knows nothing about size.</p><p>Third, the person is not a lung. Exercise raises minute ventilation fivefold, so an hour of running in smog deposits more than five hours of sitting. The hours box counts time, not breathing rate; if your eight hours include a hard ride, the effective exposure is higher than the arithmetic suggests.</p><p>Last, the risk estimate is about averages over decades. A single bad week changes the year's total by very little; a decade of winters changes it by a lot. That is the scale the risk figure lives on.</p>
            TXT],
            ['title' => 'What to do with the answer', 'html' => <<<'TXT'
            <p>If the exposure index comes out high, the useful response is not to stop going outside. It is to move the hard exercise indoors when the local index is high, to check where the nearest monitoring station actually sits, and to ventilate the kitchen properly, since indoor sources often beat outdoor ones.</p><p>For a building, the lever is filtration. A mechanical system with a fine filter cuts indoor particle concentrations sharply, and BaP rides on the same particles. For a city, the lever is combustion: stoves, old diesel, and open burning, in that order in most European towns.</p><p>The page's job is narrower. It turns a concentration into a time-weighted exposure index and a separate, assumption-dependent population risk scale you can compare across seasons and streets. What you do with the comparison is a different calculation, and a more consequential one.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'Does the calculator convert benzo(a)pyrene to cigarette dose?', 'a' => <<<'TXT'
            No. Its exposure index is not a validated conversion to cigarette dose. The calculator reports a time-weighted concentration index and a separate, assumption-dependent population-risk estimate.
            TXT],
            ['q' => 'Why does the page ask for hours outdoors?', 'a' => <<<'TXT'
            Because exposure is concentration multiplied by time. Eight hours at one nanogram is the same dose as twenty-four hours at a third of a nanogram, and the page scales the outdoor figure by the share of the day you spend in it. Hours indoors are assumed to carry the indoor concentration, which the form leaves out.
            TXT],
            ['q' => 'Where does the 87 per million come from?', 'a' => <<<'TXT'
            From the WHO unit risk for benzo(a)pyrene, 8.7 × 10⁻⁵ extra lifetime cancers per nanogram per cubic metre of continuous exposure. Multiply by a million people and you get 87 cases per million for each nanogram. The page multiplies the time-weighted exposure by that.
            TXT],
            ['q' => 'Does the European limit of 1 ng/m³ mean the air is safe?', 'a' => <<<'TXT'
            It means it is legal. The WHO guideline is 0.1 ng/m³, ten times lower, and the unit risk attached to the limit value still implies tens of extra lifetime cancers per million people. A limit is a compromise between health evidence and what industry can reach quickly.
            TXT],
            ['q' => 'Can indoor air really be worse than a smoggy street?', 'a' => <<<'TXT'
            Often, yes. A wood stove, a coal fire, a candle, a gas hob and frying all produce benzo(a)pyrene indoors, and without ventilation the concentration accumulates. If your kitchen or stove is the source, the outdoor boxes on this page do not describe your exposure.
            TXT],
            ['q' => 'Why does the same concentration give a bigger answer in winter?', 'a' => <<<'TXT'
            It does not, on its own. Winter matters because concentrations are higher in winter, not because the formula changes. Enter the winter concentration and the winter hours separately and the page will show how much of the annual total comes from a few months.
            TXT],
        ],
    ],
    'authors' => [
        ['name' => 'Onim Editorial', 'role' => 'Written and checked'],
    ],
    'authored' => false,
];
