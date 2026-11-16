<?php

/**
 * Windsock
 * /everyday-life/windsock
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Windsock',
    'meta' => ['title' => 'Windsock Calculator: Formula, Steps & Examples', 'description' => 'Windsock takes number of segments (n) and returns speed and speed [imperial]. Each box lists the units it accepts, and the answer converts between them.', 'h1' => 'Windsock Calculator', 'updated' => '2026-08-25'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'how_many',
                            'label' => 'Number of segments (n)',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'speed_knots',
                            'label' => 'Speed',
                            'type' => 'number',
                            'unit' => '32',
                            'unit_default' => 'knot',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'speed_imperial',
                            'label' => 'Speed [imperial]',
                            'type' => 'number',
                            'unit' => '32',
                            'unit_default' => 'mph',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'speed_metric',
                            'label' => 'Speed [metric]',
                            'type' => 'number',
                            'unit' => '32',
                            'unit_default' => 'kmph',
                            'rounding' => ['omni', '0.01'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'image', 'url' => 'windsock_00.png'],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'speed_knots = 3*how_many knots (converted to the engine base unit, m/s)',
            'results' => ['speed_knots' => '(463/900)*(3*how_many)'],
        ],
        [
            'title' => 'speed_imperial = the same speed, displayed in the selected imperial unit',
            'results' => ['speed_imperial' => '(463/900)*(3*how_many)'],
        ],
        [
            'title' => 'speed_metric = the same speed, displayed in the selected metric unit',
            'results' => ['speed_metric' => '(463/900)*(3*how_many)'],
        ],
    ],
    'article' => [
        'intro' => <<<'TXT'
        The Windsock calculator is a free, no-sign-up everyday life tool. Fill in the field it asks for and it works out <strong>speed</strong> straight away, with the formula shown underneath.
        TXT,
        'sections' => [
            ['title' => 'How does the Windsock calculator work?', 'html' => <<<'TXT'
            <p>The Windsock calculator takes the values in the form, applies the relationship described below and reports <strong>speed</strong> in the results panel.</p>
            <p>Working from the top of the form: you type in number of segments (n).</p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Number of segments (n)</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Speed</strong></td><td>A measured quantity, 25 units available.</td><td>knots</td><td>Calculated</td></tr><tr><td><strong>Speed [imperial]</strong></td><td>A measured quantity, 25 units available.</td><td>miles per hour</td><td>Calculated</td></tr><tr><td><strong>Speed [metric]</strong></td><td>A measured quantity, 25 units available.</td><td>kilometers per hour</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Windsock calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Speed</span><span class="formula-eq">=</span><span class="formula-rhs">(3 × number of segments (n))</span></div><div class="formula-row"><span class="formula-lhs">Speed [imperial]</span><span class="formula-eq">=</span><span class="formula-rhs">((2877 ÷ 2500) × (3 × number of segments (n)))</span></div><div class="formula-row"><span class="formula-lhs">Speed [metric]</span><span class="formula-eq">=</span><span class="formula-rhs">((463 ÷ 250) × (3 × number of segments (n)))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Number of segments (n)</strong> = 10. At 3 knots per segment, the calculator returns <strong>Speed</strong> = 30 kn, <strong>Speed [imperial]</strong> = 34.524 mph and <strong>Speed [metric]</strong> = 55.56 km/h.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the number of segments.</li><li>Read the three equivalent speeds in knots, miles per hour and kilometers per hour.</li><li>Sanity-check the conversion: 30 kn × 1.1508 = 34.524 mph and 30 kn × 1.852 = 55.56 km/h.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in knots, and convertible to any of the 25 units on that chip.</li><li>Shown in miles per hour, and convertible to any of the 25 units on that chip.</li><li>Shown in kilometers per hour, and convertible to any of the 25 units on that chip.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Speed, opening in knots</li><li>Speed, opening in miles per hour</li><li>Speed, opening in kilometers per hour</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Windsock calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Turning a rough idea into a number you can act on</li><li>Any time the same 1 figures keep coming back — number of segments — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Windsock calculator, these are the ones that matter:</p>
            <ul><li>The unit chips cover the units listed on the page. A historical or regional unit that is missing can still be used by converting it to a listed unit first.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'How do you check the answer yourself?', 'html' => <<<'TXT'
            <ul><li>Change one input at a time — number of segments for instance — and watch which results move. A result that stays put does not depend on it.</li><li>Try a round value you can work out in your head. If the answer matches your mental arithmetic, the inputs are on the scale you assumed.</li><li>Switch the units to the ones you normally use and confirm the numbers are unchanged apart from their label; if they are not, a chip was on the wrong setting.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/lead-time">Lead time</a>, <a href="/everyday-life/leap-year">Leap year</a> and <a href="/everyday-life/led-savings">LED savings</a>.</p>
            TXT],
            ['title' => 'Using the segment estimate as a wind indicator', 'html' => <<<'TXT'
            <p>The Windsock calculator applies a simple rule to the number of visible segments: each segment corresponds to an approximate three-knot increment in the model, then the result can be displayed in other speed units. It is a quick interpretation aid, not an instrument reading. The actual relationship between a windsock’s shape and wind speed depends on its design, mounting, fabric, local airflow and the observation conditions.</p>
            <p>Count only the segments the calculator’s instructions intend you to count. A partially inflated segment can be difficult to classify, and a windsock may flutter, twist or be obstructed by nearby structures. If the field expects a whole segment count, do not enter an approximate fraction unless the form permits it. Use the result as an approximate range rather than a precise measurement.</p>
            <p>Check the output unit. Knots, miles per hour, kilometers per hour and meters per second describe the same speed on different scales. A number can look plausible while using the wrong unit, especially when comparing with a weather report or aviation source. Convert the result to the unit used by the procedure you are following and verify the label beside it.</p>
            <p>Windsocks are visual indicators and may be used in settings with formal operating rules. The calculator cannot establish whether conditions are safe for aviation, marine activity, construction or another operation. Follow the relevant official procedures and use an approved wind instrument where required. Do not rely on an estimated segment count for a safety-critical go/no-go decision.</p>
            <p>Wind varies with gusts and time. Observe the sock over a short interval and note whether the estimate is steady or changing. Buildings, trees and terrain can create turbulence or shelter, so a sock at one location may not describe conditions elsewhere. A weather station or nearby forecast can also differ from a local reading, but neither should be treated as interchangeable without considering location and height.</p>
            <p>For a useful record, note the segment count, observation time, location, sock condition and unit shown. If the result differs from an anemometer, check the counting method and the instrument’s calibration rather than assuming one source is automatically correct. This page translates a simple visual cue into a speed estimate; it does not replace measured wind data or trained judgment.</p>
            <p>Use it for learning or a rough check where the method is appropriate. If you need a precise speed, use a properly maintained instrument and follow local guidance. The uncertainty in the visual input is often larger than the number of decimal places on the display.</p>
            TXT],
            ['title' => 'What can change a visual windsock reading?', 'html' => <<<'TXT'
            <p>Segment count is only a rough cue when the sock is correctly installed and freely exposed to the wind. A short, damaged or waterlogged sock may not inflate normally. A cord, pole or nearby roof can alter the airflow, and a sock pointed by a gust may not reflect the average over a longer period. Observe the sock from a safe position and do not climb or approach a rotating or powered installation to improve the reading.</p><p>The calculator applies a simple increment per segment, but it does not know the sock’s manufacturer, length, opening size, calibration or wind direction. Different designs may respond differently. If the display has faded segment markings or the sock is only partly open, the count itself is uncertain, so reporting several decimal places would be misleading. A rough range is more honest than a falsely precise number.</p><p>Speed units are especially important in operational contexts. Knots are common in aviation and marine reporting, while weather apps may use kilometers per hour or miles per hour. Check the unit required by the rule or document you are following, and use the correct conversion before comparing values. A speed can appear dramatically different simply because the unit label was missed.</p><p>For aviation or other regulated use, rely on the approved equipment and published procedure, not a guessed segment count. Wind conditions may vary across a runway or worksite, and a single sock cannot describe the full environment. Follow training, local rules and official observations for any decision where people or equipment could be at risk.</p><p>If you want to learn the model, compare a sock estimate with a calibrated anemometer in the same location and at the same time. Record the count, measured speed, sock type and exposure. Repeated observations can show how that particular sock behaves, but they do not certify it for safety-critical use without a suitable method and calibration.</p>
            TXT],
            ['title' => 'Record a useful observation', 'html' => <<<'TXT'
            <p>When you make a non-critical estimate, note the time, site, number of segments and the displayed unit. If you later compare it with a weather station, make sure both readings refer to roughly the same time and exposure. A station several kilometers away or at another height may report a different wind without either value being a calculation error.</p><p>Check the sock’s condition periodically. Torn fabric, a stiff swivel, a clogged opening or a slack mounting can prevent it from responding normally. Replace or service it according to the maker’s instructions rather than compensating for damage by changing the segment count in the calculator.</p><p>If the input count is uncertain, give a range rather than reporting a precise decimal. The formula may calculate many decimal places, but the visual count and the calibration are approximate. Match the precision of your report to the quality of the observation.</p>
            TXT],
            ['title' => 'Match precision to the visible cue', 'html' => <<<'TXT'
            <p>If the sock sits between two segment positions or moves with gusts, report an approximate range. A result with four decimal places does not make an uncertain visual count more exact.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the Windsock calculator?', 'a' => 'The form asks for number of segments, which is a single field.'],
            ['q' => 'Can I enter speed in a different unit?', 'a' => 'Yes. Speed opens in knots and the chip beside it offers 25 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With 10 segments, the calculator reports Speed = 30 kn, or 34.524 mph and 55.56 km/h.'],
        ],
        'related' => [
            ['path' => '/everyday-life/lead-time', 'name' => 'Lead time'],
            ['path' => '/everyday-life/leap-year', 'name' => 'Leap year'],
            ['path' => '/everyday-life/led-savings', 'name' => 'LED savings'],
        ],
    ],
];
