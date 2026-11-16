<?php

/**
 * mm to ring size converter
 * /everyday-life/mm-to-ring-size-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'mm to ring size converter',
    'meta' => ['title' => 'Mm to ring size converter — Formula & Results', 'description' => 'mm to ring size converter works out inside circumference from inside diameter. The formula is printed in the form\'s own words, so the arithmetic can be checked.', 'h1' => 'mm to ring size converter Calculator', 'updated' => '2025-01-19'],
    'sections' => [
        [
            'title' => 'Measurements to ring size',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'circumference',
                            'label' => 'Inside circumference',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'mm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'diameter',
                            'label' => 'Inside diameter',
                            'type' => 'number',
                            'unit' => '4',
                            'unit_default' => 'mm',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'not(hasValue(size))', 'text' => 'US &amp; Canada size:&nbsp; UK &amp; Australia size:&nbsp; France &amp; Russia size:&nbsp; Germany size:&nbsp; Switzerland size:&nbsp; Japan size:&nbsp;'],
                                ['when' => 'size == 0', 'text' => <<<'TXT'
                                The smallest ring size available is the US &amp; Canada ring size of 0000, which has an inside diameter of 9.91 mm (0.39016 in) or an inside circumference of 31.133 mm (1.2257 in). You may have to check with your favorite ring store to see if they can custom-make a smaller-sized ring for you.&nbsp;
                                TXT],
                                ['when' => 'size == 1', 'text' => 'US &amp; Canada size: 0000 UK &amp; Australia size: - France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 2', 'text' => 'US &amp; Canada size: 0 UK &amp; Australia size: - France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 3', 'text' => 'US &amp; Canada size: 0 UK &amp; Australia size: - France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 4', 'text' => 'US &amp; Canada size: 1/2 UK &amp; Australia size: A France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 5', 'text' => 'US &amp; Canada size: 3/4 UK &amp; Australia size: A&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 6', 'text' => 'US &amp; Canada size: 1 UK &amp; Australia size: B France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: 1&nbsp;'],
                                ['when' => 'size == 7', 'text' => 'US &amp; Canada size: 1&nbsp;1/4 UK &amp; Australia size: B&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 8', 'text' => 'US &amp; Canada size: 1&nbsp;1/2 UK &amp; Australia size: C France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 9', 'text' => 'US &amp; Canada size: 1&nbsp;3/4 UK &amp; Australia size: C&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 10', 'text' => <<<'TXT'
                                US &amp; Canada size: 2 UK &amp; Australia size: D France &amp; Russia size: 41&nbsp;1/2 Germany size: 13&nbsp;1/2 Switzerland size: 1&nbsp;1/2 Japan size: 2&nbsp;
                                TXT],
                                ['when' => 'size == 11', 'text' => 'US &amp; Canada size: 2&nbsp;1/4 UK &amp; Australia size: D&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 12', 'text' => <<<'TXT'
                                US &amp; Canada size: 2&nbsp;1/2 UK &amp; Australia size: E France &amp; Russia size: 42&nbsp;3/4 Germany size: 13&nbsp;3/4 Switzerland size: 2&nbsp;3/4 Japan size: 3&nbsp;
                                TXT],
                                ['when' => 'size == 13', 'text' => 'US &amp; Canada size: 2&nbsp;3/4 UK &amp; Australia size: E&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 14', 'text' => 'US &amp; Canada size: 3 UK &amp; Australia size: F France &amp; Russia size: 44 Germany size: 14 Switzerland size: 4 Japan size: 4&nbsp;'],
                                ['when' => 'size == 15', 'text' => 'US &amp; Canada size: 3&nbsp;1/8 UK &amp; Australia size: F&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 16', 'text' => 'US &amp; Canada size: 3&nbsp;1/4 UK &amp; Australia size: F&nbsp;3/4 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 17', 'text' => <<<'TXT'
                                US &amp; Canada size: 3&nbsp;3/8 UK &amp; Australia size: G France &amp; Russia size: 45&nbsp;1/4 Germany size: - Switzerland size: 5&nbsp;1/4 Japan size: 5&nbsp;
                                TXT],
                                ['when' => 'size == 18', 'text' => <<<'TXT'
                                "US &amp; Canada size: 3&nbsp;1/2 UK &amp; Australia size: G&nbsp;1/4 France &amp; Russia size: - Germany size: 14&nbsp;1/2 Switzerland size: - Japan size: -&nbsp;
                                TXT],
                                ['when' => 'size == 19', 'text' => 'US &amp; Canada size: 3&nbsp;5/8 UK &amp; Australia size: G&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: 6&nbsp;'],
                                ['when' => 'size == 20', 'text' => <<<'TXT'
                                US &amp; Canada size: 3&nbsp;3/4 UK &amp; Australia size: H France &amp; Russia size: 46&nbsp;1/2 Germany size: - Switzerland size: 6&nbsp;1/2 Japan size: -&nbsp;
                                TXT],
                                ['when' => 'size == 21', 'text' => 'US &amp; Canada size: 4 UK &amp; Australia size: H&nbsp;1/2 France &amp; Russia size: - Germany size: 15 Switzerland size: - Japan size: 7&nbsp;'],
                                ['when' => 'size == 22', 'text' => <<<'TXT'
                                US &amp; Canada size: 4&nbsp;1/4 UK &amp; Australia size: I France &amp; Russia size: 47&nbsp;3/4 Germany size: - Switzerland size: 7&nbsp;3/4 Japan size: -&nbsp;
                                TXT],
                                ['when' => 'size == 23', 'text' => <<<'TXT'
                                US &amp; Canada size: 4&nbsp;1/2 UK &amp; Australia size: I&nbsp;1/2 France &amp; Russia size: - Germany size: 15&nbsp;1/4 Switzerland size: - Japan size: 8&nbsp;
                                TXT],
                                ['when' => 'size == 24', 'text' => 'US &amp; Canada size: 4&nbsp;5/8 UK &amp; Australia size: J France &amp; Russia size: 49 Germany size: 15&nbsp;1/2 Switzerland size: 9 Japan size: -&nbsp;'],
                                ['when' => 'size == 25', 'text' => 'US &amp; Canada size: 4&nbsp;3/4 UK &amp; Australia size: J&nbsp;1/4 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 26', 'text' => 'US &amp; Canada size: 5 UK &amp; Australia size: J&nbsp;1/2 France &amp; Russia size: - Germany size: 15&nbsp;3/4 Switzerland size: - Japan size: 9&nbsp;'],
                                ['when' => 'size == 27', 'text' => 'US &amp; Canada size: 5&nbsp;1/8 UK &amp; Australia size: K France &amp; Russia size: 50 Germany size: - Switzerland size: 10 Japan size: -&nbsp;'],
                                ['when' => 'size == 28', 'text' => 'US &amp; Canada size: 5&nbsp;1/4 UK &amp; Australia size: K&nbsp;1/4 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 29', 'text' => 'US &amp; Canada size: 5&nbsp;3/8 UK &amp; Australia size: K&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: 10&nbsp;'],
                                ['when' => 'size == 30', 'text' => <<<'TXT'
                                US &amp; Canada size: 5&nbsp;1/2 UK &amp; Australia size: L France &amp; Russia size: 51&nbsp;3/4 Germany size: 16 Switzerland size: 11&nbsp;3/4 Japan size: -&nbsp;
                                TXT],
                                ['when' => 'size == 31', 'text' => 'US &amp; Canada size: 5&nbsp;3/4 UK &amp; Australia size: L&nbsp;1/4 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 32', 'text' => 'US &amp; Canada size: 5&nbsp;7/8 UK &amp; Australia size: L&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 33', 'text' => <<<'TXT'
                                US &amp; Canada size: 6 UK &amp; Australia size: M France &amp; Russia size: 52&nbsp;3/4 Germany size: 16&nbsp;1/2 Switzerland size: 12&nbsp;3/4 Japan size: 12&nbsp;
                                TXT],
                                ['when' => 'size == 34', 'text' => 'US &amp; Canada size: 6&nbsp;1/4 UK &amp; Australia size: M&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 35', 'text' => 'US &amp; Canada size: 6&nbsp;1/2 UK &amp; Australia size: N France &amp; Russia size: 54 Germany size: 17 Switzerland size: 14 Japan size: 13&nbsp;'],
                                ['when' => 'size == 36', 'text' => 'US &amp; Canada size: 6&nbsp;3/4 UK &amp; Australia size: N&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 37', 'text' => <<<'TXT'
                                US &amp; Canada size: 7 UK &amp; Australia size: O France &amp; Russia size: 55&nbsp;1/4 Germany size: 17&nbsp;1/4 Switzerland size: 15&nbsp;1/4 Japan size: 14&nbsp;
                                TXT],
                                ['when' => 'size == 38', 'text' => 'US &amp; Canada size: 7&nbsp;1/4 UK &amp; Australia size: O&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 39', 'text' => <<<'TXT'
                                US &amp; Canada size: 7&nbsp;1/2 UK &amp; Australia size: P France &amp; Russia size: 56&nbsp;1/2 Germany size: 17&nbsp;3/4 Switzerland size: 16&nbsp;1/2 Japan size: 15&nbsp;
                                TXT],
                                ['when' => 'size == 40', 'text' => 'US &amp; Canada size: 7&nbsp;3/4 UK &amp; Australia size: P&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 41', 'text' => 'US &amp; Canada size: 8 UK &amp; Australia size: Q France &amp; Russia size: 57&nbsp;3/4 Germany size: 18 Switzerland size: 17&nbsp;3/4 Japan size: 16&nbsp;'],
                                ['when' => 'size == 42', 'text' => 'US &amp; Canada size: 8&nbsp;1/4 UK &amp; Australia size: Q&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 43', 'text' => <<<'TXT'
                                US &amp; Canada size: 8&nbsp;1/2 UK &amp; Australia size: Q&nbsp;3/4 France &amp; Russia size: - Germany size: 18&nbsp;1/2 Switzerland size: - Japan size: 17&nbsp;
                                TXT],
                                ['when' => 'size == 44', 'text' => 'US &amp; Canada size: 8&nbsp;5/8 UK &amp; Australia size: R France &amp; Russia size: 59 Germany size: - Switzerland size: 19 Japan size: -&nbsp;'],
                                ['when' => 'size == 45', 'text' => 'US &amp; Canada size: 8&nbsp;3/4 UK &amp; Australia size: R&nbsp;1/4 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 46', 'text' => 'US &amp; Canada size: 8&nbsp;7/8 UK &amp; Australia size: R&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 47', 'text' => 'US &amp; Canada size: 9 UK &amp; Australia size: R&nbsp;3/4 France &amp; Russia size: - Germany size: 19 Switzerland size: - Japan size: 18&nbsp;'],
                                ['when' => 'size == 48', 'text' => <<<'TXT'
                                US &amp; Canada size: 9&nbsp;1/8 UK &amp; Australia size: S France &amp; Russia size: 60&nbsp;1/4 Germany size: - Switzerland size: 20&nbsp;1/4 Japan size: -&nbsp;
                                TXT],
                                ['when' => 'size == 49', 'text' => 'US &amp; Canada size: 9&nbsp;1/4 UK &amp; Australia size: S&nbsp;1/4 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 50', 'text' => 'US &amp; Canada size: 9&nbsp;3/8 UK &amp; Australia size: S&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 51', 'text' => <<<'TXT'
                                US &amp; Canada size: 9&nbsp;1/2 UK &amp; Australia size: S&nbsp;3/4 France &amp; Russia size: - Germany size: 19&nbsp;1/2 Switzerland size: - Japan size: 19&nbsp;
                                TXT],
                                ['when' => 'size == 52', 'text' => <<<'TXT'
                                US &amp; Canada size: 9&nbsp;5/8 UK &amp; Australia size: T France &amp; Russia size: 61&nbsp;1/2 Germany size: - Switzerland size: 21&nbsp;1/2 Japan size: -&nbsp;
                                TXT],
                                ['when' => 'size == 53', 'text' => 'US &amp; Canada size: 9&nbsp;3/4 UK &amp; Australia size: T&nbsp;1/4 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 54', 'text' => 'US &amp; Canada size: 10 UK &amp; Australia size: T&nbsp;1/2 France &amp; Russia size: - Germany size: 20 Switzerland size: - Japan size: 20&nbsp;'],
                                ['when' => 'size == 55', 'text' => <<<'TXT'
                                US &amp; Canada size: 10&nbsp;1/4 UK &amp; Australia size: U France &amp; Russia size: 62&nbsp;3/4 Germany size: - Switzerland size: 22&nbsp;3/4 Japan size: 21&nbsp;
                                TXT],
                                ['when' => 'size == 56', 'text' => <<<'TXT'
                                US &amp; Canada size: 10&nbsp;1/2 UK &amp; Australia size: U&nbsp;1/2 France &amp; Russia size: - Germany size: 20&nbsp;1/4 Switzerland size: - Japan size: 22&nbsp;
                                TXT],
                                ['when' => 'size == 57', 'text' => 'US &amp; Canada size: 10&nbsp;5/8 UK &amp; Australia size: V France &amp; Russia size: 63 Germany size: - Switzerland size: 23&nbsp;3/4 Japan size: -&nbsp;'],
                                ['when' => 'size == 58', 'text' => 'US &amp; Canada size: 10&nbsp;3/4 UK &amp; Australia size: V&nbsp;1/4 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 59', 'text' => 'US &amp; Canada size: 11 UK &amp; Australia size: V&nbsp;1/2 France &amp; Russia size: - Germany size: 20&nbsp;3/4 Switzerland size: - Japan size: 23&nbsp;'],
                                ['when' => 'size == 60', 'text' => 'US &amp; Canada size: 11&nbsp;1/8 UK &amp; Australia size: W France &amp; Russia size: 65 Germany size: - Switzerland size: 25 Japan size: -&nbsp;'],
                                ['when' => 'size == 61', 'text' => 'US &amp; Canada size: 11&nbsp;1/4 UK &amp; Australia size: W&nbsp;1/4 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 62', 'text' => 'US &amp; Canada size: 11&nbsp;3/8 UK &amp; Australia size: W&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 63', 'text' => 'US &amp; Canada size: 11&nbsp;1/2 UK &amp; Australia size: W&nbsp;3/4 France &amp; Russia size: - Germany size: 21 Switzerland size: - Japan size: 24&nbsp;'],
                                ['when' => 'size == 64', 'text' => <<<'TXT'
                                US &amp; Canada size: 11&nbsp;5/8 UK &amp; Australia size: X France &amp; Russia size: 66&nbsp;1/4 Germany size: - Switzerland size: 26&nbsp;1/4 Japan size: -&nbsp;
                                TXT],
                                ['when' => 'size == 65', 'text' => 'US &amp; Canada size: 11&nbsp;3/4 UK &amp; Australia size: X&nbsp;1/4 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 66', 'text' => 'US &amp; Canada size: 11&nbsp;7/8 UK &amp; Australia size: X&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 67', 'text' => <<<'TXT'
                                US &amp; Canada size: 12 UK &amp; Australia size: Y France &amp; Russia size: 67&nbsp;1/2 Germany size: 21&nbsp;1/4 Switzerland size: 27&nbsp;1/2 Japan size: 25&nbsp;
                                TXT],
                                ['when' => 'size == 68', 'text' => 'US &amp; Canada size: 12&nbsp;1/4 UK &amp; Australia size: Y&nbsp;1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 69', 'text' => <<<'TXT'
                                US &amp; Canada size: 12&nbsp;1/2 UK &amp; Australia size: Z France &amp; Russia size: 68&nbsp;3/4 Germany size: 21&nbsp;3/4 Switzerland size: 28&nbsp;3/4 Japan size: 26&nbsp;
                                TXT],
                                ['when' => 'size == 70', 'text' => 'US &amp; Canada size: 12&nbsp;3/4 UK &amp; Australia size: Z+1/2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 71', 'text' => 'US &amp; Canada size: 13 UK &amp; Australia size: Z+1 France &amp; Russia size: - Germany size: 22 Switzerland size: - Japan size: 27&nbsp;'],
                                ['when' => 'size == 72', 'text' => 'US &amp; Canada size: 13 1/2 UK &amp; Australia size: Z+1.5 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 73', 'text' => 'US &amp; Canada size: - UK &amp; Australia size: Z+2 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 74', 'text' => 'US &amp; Canada size: - UK &amp; Australia size: Z+2.5 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 75', 'text' => 'US &amp; Canada size: - UK &amp; Australia size: Z+3 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 76', 'text' => 'US &amp; Canada size: - UK &amp; Australia size: Z+3.5 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 77', 'text' => 'US &amp; Canada size: - UK &amp; Australia size: Z+4 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 78', 'text' => 'US &amp; Canada size: - UK &amp; Australia size: Z+4.5 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 79', 'text' => 'US &amp; Canada size: - UK &amp; Australia size: Z+5 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 80', 'text' => 'US &amp; Canada size: - UK &amp; Australia size: Z+6 France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 81', 'text' => <<<'TXT'
                                This tool can only convert up to the UK &amp; Australia ring size of Z+6, which has an inside diameter of 24.27 mm (0.9555 in) or an inside circumference of 76.25 mm (3.002 in). You may have to check with your favorite ring store if they offer larger ring sizes for you.&nbsp;
                                TXT],
                                ['when' => <<<'TXT'
                                not(size == 0 or size == 10 or  size == 12 or  size == 14 or  size == 33 or  size == 35 or  size == 37 or  size == 39 or  size == 41 or  size == 67 or  size == 69 or size == 81)
                                TXT, 'text' => 'Not every ring size has its equivalent in other countries. In that case, check out neighboring sizes.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Ring size equivalents',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'convert_from',
                            'label' => 'Convert from...',
                            'type' => 'select',
                            'options' => [
                                'US & Canada' => '1',
                                'UK & Australia' => '2',
                                'France & Russia' => '3',
                                'Germany' => '4',
                                'Switzerland' => '5',
                                'Japan' => '6',
                            ],
                            'dataset' => 'converter',
                            'control' => 'DROPDOWN',
                            'default' => 'US & Canada',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'convert_us',
                            'label' => 'Ring size',
                            'type' => 'select',
                            'options' => [
                                '0000' => '1',
                                '00' => '2',
                                '0' => '3',
                                '1/2' => '4',
                                '3/4' => '5',
                                '1' => '6',
                                '1 1/4' => '7',
                                '1 1/2' => '8',
                                '1 3/4' => '9',
                                '2' => '10',
                                '2 1/4' => '11',
                                '2 1/2' => '12',
                                '2 3/4' => '13',
                                '3' => '14',
                                '3 1/8' => '15',
                                '3 1/4' => '16',
                                '3 3/8' => '17',
                                '3 1/2' => '18',
                                '3 5/8' => '19',
                                '3 3/4' => '20',
                                '4' => '21',
                                '4 1/4' => '22',
                                '4 1/2' => '23',
                                '4 5/8' => '24',
                                '4 3/4' => '25',
                                '5' => '26',
                                '5 1/8' => '27',
                                '5 1/4' => '28',
                                '5 3/8' => '29',
                                '5 1/2' => '30',
                                '5 3/4' => '31',
                                '5 7/8' => '32',
                                '6' => '33',
                                '6 1/4' => '34',
                                '6 1/2' => '35',
                                '6 3/4' => '36',
                                '7' => '37',
                                '7 1/4' => '38',
                                '7 1/2' => '39',
                                '7 3/4' => '40',
                                '8' => '41',
                                '8 1/4' => '42',
                                '8 1/2' => '43',
                                '8 5/8' => '44',
                                '8 3/4' => '45',
                                '8 7/8' => '46',
                                '9' => '47',
                                '9 1/8' => '48',
                                '9 1/4' => '49',
                                '9 3/8' => '50',
                                '9 1/2' => '51',
                                '9 5/8' => '52',
                                '9 3/4' => '53',
                                '10' => '54',
                                '10 1/4' => '55',
                                '10 1/2' => '56',
                                '10 5/8' => '57',
                                '10 3/4' => '58',
                                '11' => '59',
                                '11 1/8' => '60',
                                '11 1/4' => '61',
                                '11 3/8' => '62',
                                '11 1/2' => '63',
                                '11 5/8' => '64',
                                '11 3/4' => '65',
                                '11 7/8' => '66',
                                '12' => '67',
                                '12 1/4' => '68',
                                '12 1/2' => '69',
                                '12 3/4' => '70',
                                '13' => '71',
                                '13 1/2' => '72',
                            ],
                            'dataset' => 'US & Canada',
                            'control' => 'DROPDOWN',
                            'default' => '6',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'convert_uk',
                            'label' => 'Ring size',
                            'type' => 'select',
                            'options' => [
                                'A' => '1',
                                'A 1/2' => '2',
                                'B' => '3',
                                'B 1/2' => '4',
                                'C' => '5',
                                'C 1/2' => '6',
                                'D' => '7',
                                'D 1/2' => '8',
                                'E' => '9',
                                'E 1/2' => '10',
                                'F' => '11',
                                'F 1/2' => '12',
                                'F 3/4' => '13',
                                'G' => '14',
                                'G 1/4' => '15',
                                'G 1/2' => '16',
                                'H' => '17',
                                'H 1/2' => '18',
                                'I' => '19',
                                'I 1/2' => '20',
                                'J' => '21',
                                'J 1/4' => '22',
                                'J 1/2' => '23',
                                'K' => '24',
                                'K 1/4' => '25',
                                'K 1/2' => '26',
                                'L' => '27',
                                'L 1/4' => '28',
                                'L 1/2' => '29',
                                'M' => '30',
                                'M 1/2' => '31',
                                'N' => '32',
                                'N 1/2' => '33',
                                'O' => '34',
                                'O 1/2' => '35',
                                'P' => '36',
                                'P 1/2' => '37',
                                'Q' => '38',
                                'Q 1/2' => '39',
                                'Q 3/4' => '40',
                                'R' => '41',
                                'R 1/4' => '42',
                                'R 1/2' => '43',
                                'R 3/4' => '44',
                                'S' => '45',
                                'S 1/4' => '46',
                                'S 1/2' => '47',
                                'S 3/4' => '48',
                                'T' => '49',
                                'T 1/4' => '50',
                                'T 1/2' => '51',
                                'U' => '52',
                                'U 1/2' => '53',
                                'V' => '54',
                                'V 1/4' => '55',
                                'V 1/2' => '56',
                                'W' => '57',
                                'W 1/4' => '58',
                                'W 1/2' => '59',
                                'W 3/4' => '60',
                                'X' => '61',
                                'X 1/4' => '62',
                                'X 1/2' => '63',
                                'Y' => '64',
                                'Y 1/2' => '65',
                                'Z' => '66',
                                'Z +1/2' => '67',
                                'Z+1' => '68',
                                'Z+1.5' => '69',
                                'Z+2' => '70',
                                'Z+2.5' => '71',
                                'Z+3' => '72',
                                'Z+3.5' => '73',
                                'Z+4' => '74',
                                'Z+4.5' => '75',
                                'Z+5' => '76',
                                'Z+6' => '77',
                            ],
                            'dataset' => 'UK & Australia',
                            'control' => 'DROPDOWN',
                            'default' => 'M',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'convert_fr',
                            'label' => 'Ring size',
                            'type' => 'select',
                            'options' => [
                                '41 1/2' => '1',
                                '42 3/4' => '2',
                                '44' => '3',
                                '45 1/4' => '4',
                                '46 1/2' => '5',
                                '47 3/4' => '6',
                                '49' => '7',
                                '50' => '8',
                                '51 3/4' => '9',
                                '52 3/4' => '10',
                                '54' => '11',
                                '55 1/4' => '12',
                                '56 1/2' => '13',
                                '57 3/4' => '14',
                                '59' => '15',
                                '60 1/4' => '16',
                                '61 1/2' => '17',
                                '62 3/4' => '18',
                                '63' => '19',
                                '65' => '20',
                                '66 1/4' => '21',
                                '67 1/2' => '22',
                                '68 3/4' => '23',
                            ],
                            'dataset' => 'France & Russia',
                            'control' => 'DROPDOWN',
                            'default' => '52 3/4',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'convert_de',
                            'label' => 'Ring size',
                            'type' => 'select',
                            'options' => [
                                '13 1/2' => '1',
                                '13 3/4' => '2',
                                '14' => '3',
                                '14 1/2' => '4',
                                '15' => '5',
                                '15 1/4' => '6',
                                '15 1/2' => '7',
                                '15 3/4' => '8',
                                '16' => '9',
                                '16 1/2' => '10',
                                '17' => '11',
                                '17 1/4' => '12',
                                '17 3/4' => '13',
                                '18' => '14',
                                '18 1/2' => '15',
                                '19' => '16',
                                '19 1/2' => '17',
                                '20' => '18',
                                '20 1/4' => '19',
                                '20 3/4' => '20',
                                '21' => '21',
                                '21 1/4' => '22',
                                '21 3/4' => '23',
                                '22' => '24',
                            ],
                            'dataset' => 'Germany',
                            'control' => 'DROPDOWN',
                            'default' => '16 1/2',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'convert_swiss',
                            'label' => 'Ring size',
                            'type' => 'select',
                            'options' => [
                                '1 1/2' => '1',
                                '2 3/4' => '2',
                                '4' => '3',
                                '5 1/4' => '4',
                                '6 1/2' => '5',
                                '7 3/4' => '6',
                                '9' => '7',
                                '10' => '8',
                                '11 3/4' => '9',
                                '12 3/4' => '10',
                                '14' => '11',
                                '15 1/4' => '12',
                                '16 1/2' => '13',
                                '17 3/4' => '14',
                                '19' => '15',
                                '20 1/4' => '16',
                                '21 1/2' => '17',
                                '22 3/4' => '18',
                                '23 3/4' => '19',
                                '25' => '20',
                                '26 1/4' => '21',
                                '27 1/2' => '22',
                                '28 3/4' => '23',
                            ],
                            'dataset' => 'Switzerland',
                            'control' => 'DROPDOWN',
                            'default' => '12 3/4',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'convert_jp',
                            'label' => 'Ring size',
                            'type' => 'select',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                '7' => '7',
                                '8' => '8',
                                '9' => '9',
                                '10' => '10',
                                '12' => '11',
                                '13' => '12',
                                '14' => '13',
                                '15' => '14',
                                '16' => '15',
                                '17' => '16',
                                '18' => '17',
                                '19' => '18',
                                '20' => '19',
                                '21' => '20',
                                '22' => '21',
                                '23' => '22',
                                '24' => '23',
                                '25' => '24',
                                '26' => '25',
                                '27' => '26',
                            ],
                            'dataset' => 'Japan',
                            'control' => 'DROPDOWN',
                            'default' => '12',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => null, 'text' => 'Equivalent ring sizes:'],
                                ['when' => 'convert_from == 1', 'text' => <<<'TXT'
                                {{first.uiValue}} size: {{us1.uiValue}} {{second.uiValue}} size: {{us2.uiValue}} {{third.uiValue}} size: {{us3.uiValue}} {{fourth.uiValue}} size: {{us4.uiValue}} {{fifth.uiValue}} size: {{us5.uiValue}}&nbsp;
                                TXT],
                                ['when' => 'convert_from == 2', 'text' => <<<'TXT'
                                {{first.uiValue}} size: {{uk1.uiValue}} {{second.uiValue}} size: {{uk2.uiValue}} {{third.uiValue}} size: {{uk3.uiValue}} {{fourth.uiValue}} size: {{uk4.uiValue}} {{fifth.uiValue}} size: {{uk5.uiValue}}&nbsp;
                                TXT],
                                ['when' => 'convert_from == 3', 'text' => <<<'TXT'
                                {{first.uiValue}} size: {{France1.uiValue}} {{second.uiValue}} size: {{France2.uiValue}} {{third.uiValue}} size: {{France3.uiValue}} {{fourth.uiValue}} size: {{France4.uiValue}} {{fifth.uiValue}} size: {{France5.uiValue}}&nbsp;
                                TXT],
                                ['when' => 'convert_from == 4', 'text' => <<<'TXT'
                                {{first.uiValue}} size: {{de1.uiValue}} {{second.uiValue}} size: {{de2.uiValue}} {{third.uiValue}} size: {{de3.uiValue}} {{fourth.uiValue}} size: {{de4.uiValue}} {{fifth.uiValue}} size: {{de5.uiValue}}&nbsp;
                                TXT],
                                ['when' => 'convert_from == 5', 'text' => <<<'TXT'
                                {{first.uiValue}} size: {{swiss1.uiValue}} {{second.uiValue}} size: {{swiss2.uiValue}} {{third.uiValue}} size: {{swiss3.uiValue}} {{fourth.uiValue}} size: {{swiss4.uiValue}} {{fifth.uiValue}} size: {{swiss5.uiValue}}&nbsp;
                                TXT],
                                ['when' => 'convert_from == 6', 'text' => <<<'TXT'
                                {{first.uiValue}} size: {{jp1.uiValue}} {{second.uiValue}} size: {{jp2.uiValue}} {{third.uiValue}} size: {{jp3.uiValue}} {{fourth.uiValue}} size: {{jp4.uiValue}} {{fifth.uiValue}} size: {{jp5.uiValue}}
                                TXT],
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
                            'name' => 'size',
                            'label' => 'Size',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'first',
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
                            'name' => 'second',
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
                            'name' => 'third',
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
                            'name' => 'fourth',
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
                            'name' => 'fifth',
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
                            'name' => 'us1',
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
                            'name' => 'us2',
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
                            'name' => 'us3',
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
                            'name' => 'us4',
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
                            'name' => 'us5',
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
                            'name' => 'uk1',
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
                            'name' => 'uk2',
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
                            'name' => 'uk3',
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
                            'name' => 'uk4',
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
                            'name' => 'uk5',
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
                            'name' => 'fr1',
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
                            'name' => 'fr2',
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
                            'name' => 'fr3',
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
                            'name' => 'fr4',
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
                            'name' => 'fr5',
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
                            'name' => 'de1',
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
                            'name' => 'de2',
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
                            'name' => 'de3',
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
                            'name' => 'de4',
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
                            'name' => 'de5',
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
                            'name' => 'swiss1',
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
                            'name' => 'swiss2',
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
                            'name' => 'swiss3',
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
                            'name' => 'swiss4',
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
                            'name' => 'swiss5',
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
                            'name' => 'jp1',
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
                            'name' => 'jp2',
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
                            'name' => 'jp3',
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
                            'name' => 'jp4',
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
                            'name' => 'jp5',
                            'label' => '',
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
            'title' => 'circumference = pi * diameter',
            'results' => ['circumference' => 'PI*diameter', 'diameter' => 'circumference/PI'],
        ],
        [
            'title' => 'size = get_size(diameter) ',
            'results' => ['size' => 'get_size(diameter)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_size",function(diameter){if(diameter<=8){return 0}else if(diameter>8&&diameter<=9.91){return 1}else if(diameter>9.91&&diameter<=10.72){return 2}else if(diameter>10.72&&diameter<=11.53){return 3}else if(diameter>11.53&&diameter<=11.95){return 4}else if(diameter>11.95&&diameter<=12.18){return 5}else if(diameter>12.18&&diameter<=12.37){return 6}else if(diameter>12.37&&diameter<=12.6){return 7}else if(diameter>12.6&&diameter<=12.78){return 8}else if(diameter>12.78&&diameter<=13){return 9}else if(diameter>13&&diameter<=13.21){return 10}else if(diameter>13.21&&diameter<=13.41){return 11}else if(diameter>13.41&&diameter<=13.61){return 12}else if(diameter>13.61&&diameter<=13.83){return 13}else if(diameter>13.83&&diameter<=14.05){return 14}else if(diameter>14.05&&diameter<=14.15){return 15}else if(diameter>14.15&&diameter<=14.25){return 16}else if(diameter>14.25&&diameter<=14.36){return 17}else if(diameter>14.36&&diameter<=14.45){return 18}else if(diameter>14.45&&diameter<=14.56){return 19}else if(diameter>14.56&&diameter<=14.65){return 20}else if(diameter>14.65&&diameter<=14.86){return 21}else if(diameter>14.86&&diameter<=15.04){return 22}else if(diameter>15.04&&diameter<=15.27){return 23}else if(diameter>15.27&&diameter<=15.4){return 24}else if(diameter>15.4&&diameter<=15.53){return 25}else if(diameter>15.53&&diameter<=15.7){return 26}else if(diameter>15.7&&diameter<=15.8){return 27}else if(diameter>15.8&&diameter<=15.9){return 28}else if(diameter>15.9&&diameter<=16){return 29}else if(diameter>16&&diameter<=16.1){return 30}else if(diameter>16.1&&diameter<=16.3){return 31}else if(diameter>16.3&&diameter<=16.41){return 32}else if(diameter>16.41&&diameter<=16.51){return 33}else if(diameter>16.51&&diameter<=16.71){return 34}else if(diameter>16.71&&diameter<=16.92){return 35}else if(diameter>16.92&&diameter<=17.13){return 36}else if(diameter>17.13&&diameter<=17.35){return 37}else if(diameter>17.35&&diameter<=17.45){return 38}else if(diameter>17.45&&diameter<=17.75){return 39}else if(diameter>17.75&&diameter<=17.97){return 40}else if(diameter>17.97&&diameter<=18.19){return 41}else if(diameter>18.19&&diameter<=18.35){return 42}else if(diameter>18.35&&diameter<=18.53){return 43}else if(diameter>18.53&&diameter<=18.61){return 44}else if(diameter>18.61&&diameter<=18.69){return 45}else if(diameter>18.69&&diameter<=18.8){return 46}else if(diameter>18.8&&diameter<=18.89){return 47}else if(diameter>18.89&&diameter<=19.1){return 48}else if(diameter>19.1&&diameter<=19.22){return 49}else if(diameter>19.22&&diameter<=19.31){return 50}else if(diameter>19.31&&diameter<=19.41){return 51}else if(diameter>19.41&&diameter<=19.51){return 52}else if(diameter>19.51&&diameter<=19.62){return 53}else if(diameter>19.62&&diameter<=19.84){return 54}else if(diameter>19.84&&diameter<=20.02){return 55}else if(diameter>20.02&&diameter<=20.2){return 56}else if(diameter>20.2&&diameter<=20.32){return 57}else if(diameter>20.32&&diameter<=20.44){return 58}else if(diameter>20.44&&diameter<=20.68){return 59}else if(diameter>20.68&&diameter<=20.76){return 60}else if(diameter>20.76&&diameter<=20.85){return 61}else if(diameter>20.85&&diameter<=20.94){return 62}else if(diameter>20.94&&diameter<=21.08){return 63}else if(diameter>21.08&&diameter<=21.18){return 64}else if(diameter>21.18&&diameter<=21.24){return 65}else if(diameter>21.24&&diameter<=21.3){return 66}else if(diameter>21.3&&diameter<=21.49){return 67}else if(diameter>21.49&&diameter<=21.69){return 68}else if(diameter>21.69&&diameter<=21.89){return 69}else if(diameter>21.89&&diameter<=22.1){return 70}else if(diameter>22.1&&diameter<=22.33){return 71}else if(diameter>22.33&&diameter<=22.6){return 72}else if(diameter>22.6&&diameter<=22.69){return 73}else if(diameter>22.69&&diameter<=22.92){return 74}else if(diameter>22.92&&diameter<=23.06){return 75}else if(diameter>23.06&&diameter<=23.24){return 76}else if(diameter>23.24&&diameter<=23.47){return 77}else if(diameter>23.47&&diameter<=23.55){return 78}else if(diameter>23.55&&diameter<=23.87){return 79}else if(diameter>23.87&&diameter<=24.27){return 80}else if(diameter>22.6){return 81}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => 'The mm to ring size converter returns <strong>inside circumference</strong> from the 8 fields on the form.',
        'sections' => [
            ['title' => 'How does the mm to ring size converter calculator work?', 'html' => <<<'TXT'
            <p>The mm to ring size converter takes the values in the form, applies the relationship described below and reports <strong>inside circumference</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the ring size (Ring size equivalents), the ring size (Ring size equivalents) and the ring size (Ring size equivalents)); then you type in the inside diameter.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A measured quantity, entered by default in millimeters. </li><li>Pick the option that matches your case — 6 options, such as US & Canada, UK & Australia and france & Russia. </li><li>Pick the option that matches your case — 72 options, such as 0000, 00 and 0. </li><li>Pick the option that matches your case — 77 options, such as A, A 1/2 and B. </li><li>Pick the option that matches your case — 23 options, such as 41 1/2, 42 3/4 and 44. </li><li>Pick the option that matches your case — 24 options, such as 13 1/2, 13 3/4 and 14. </li><li>Pick the option that matches your case — 23 options, such as 1 1/2, 2 3/4 and 4. </li><li>Pick the option that matches your case — 26 options, such as 1, 2 and 3. </li></ul><p>7 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Inside circumference</strong></td><td>A measured quantity, 34 units available.</td><td>millimeters</td><td>Calculated</td></tr><tr><td><strong>Inside diameter</strong></td><td>A measured quantity, 34 units available.</td><td>millimeters</td><td>You supply it</td></tr><tr><td><strong>Ring size (Ring size equivalents)</strong></td><td>One of 72 options, such as 0000, 00 and 0.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Ring size (Ring size equivalents)</strong></td><td>One of 77 options, such as A, A 1/2 and B.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Ring size (Ring size equivalents)</strong></td><td>One of 23 options, such as 41 1/2, 42 3/4 and 44.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Ring size (Ring size equivalents)</strong></td><td>One of 24 options, such as 13 1/2, 13 3/4 and 14.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Ring size (Ring size equivalents)</strong></td><td>One of 23 options, such as 1 1/2, 2 3/4 and 4.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Ring size (Ring size equivalents)</strong></td><td>One of 26 options, such as 1, 2 and 3.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Size</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the mm to ring size converter calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Inside circumference</span><span class="formula-eq">=</span><span class="formula-rhs">PI × inside diameter</span></div><div class="formula-row"><span class="formula-lhs">Size</span><span class="formula-eq">=</span><span class="formula-rhs">(inside diameter)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Suppose <strong>Inside diameter</strong> = 30 mm, <strong>Convert from</strong> set to US & Canada and <strong>Ring size</strong> set to 6. Working through the relationship above gives <strong>Inside circumference</strong> = 94.2478 mm.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Inside circumference</strong> = 94.2478 mm should be roughly the size you expected from <strong>Inside diameter</strong> = 30 mm and <strong>Convert from</strong> set to US & Canada.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in millimeters, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in millimeters</li><li>Length, opening in millimeters</li></ul>
            <p>Results are rounded for display but computed at full precision, so chaining one result into the next does not accumulate error. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The mm to ring size converter earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 1 figures keep coming back — the inside diameter — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/brake-specific-fuel-consumption">Brake specific fuel consumption</a>, <a href="/everyday-life/business-days">Business days</a> and <a href="/everyday-life/calendar">Calendar</a>.</p>
            TXT],
            ['title' => 'Measure first, convert once', 'html' => <<<'TXT'
            <p>The millimeter-to-ring-size page brings together two different kinds of information: a physical measurement and a size label from a selected regional chart. Start with the measurement the form asks for—inside diameter or circumference—and make sure you have not mixed the two. Diameter is the straight distance across the opening through its center; circumference is the distance around the inside edge. They describe the same opening but are not interchangeable numbers. For a circular opening, circumference is approximately pi times diameter, which is why a modest diameter corresponds to a much larger circumference value.</p>
            <p>If you are measuring an existing ring, measure across the inside only. Keep the ruler or caliper level and do not include the thickness of the metal. A ring mandrel can provide another check. If the band is bent or oval, take readings in more than one direction and treat the result as uncertain. For finger sizing, measure where the ring will sit with a flexible strip that is snug without compressing the skin; check that it can pass over the knuckle. A jeweler can measure both the finger and the actual ring style more reliably than a quick home measurement.</p>
            <p>Choose the country or sizing convention used by the retailer. Numeric, letter-based and circumference-based systems do not share one universal sequence. A table may include half sizes or quarter sizes, while another chart rounds to whole numbers. If you are buying internationally, verify that the seller’s chart uses the same convention named in the converter. Keep your original millimeter reading so you can compare it directly with a second chart without converting a rounded size back and forth.</p>
            <p>Precision matters most near a size boundary. A household ruler may only resolve whole millimeters, while a small measurement difference can change which chart entry is closest. Do not add false precision by typing extra decimals that you did not measure. Repeat the measurement, compare with a ring that fits, and consider the tool’s resolution. Room temperature, activity and normal finger-size variation may also affect a comfortable fit, so use repeated measurements as a guide rather than assuming one reading is absolute.</p>
            <p>A converted size does not account for band width, interior profile, knuckle shape or preference for a snug versus loose fit. Wide bands often need an in-person fit check, and some ring designs cannot be resized easily. If the output is between available sizes, consult the jeweler or retailer’s recommendation for that specific design rather than automatically rounding. For an important gift or a custom piece, check resizing and exchange terms before ordering.</p>
            <p>For a clean comparison, note the raw measurement, whether it is diameter or circumference, the unit, the selected sizing system and the returned label. If two sources disagree, first confirm that both started from the same measurement definition and region; then inspect their rounding rules. This calculator helps translate measurements between charts. It cannot guarantee comfort or replace a professional fitting, and it should not be used to infer anything beyond jewelry sizing.</p>
            TXT],
            ['title' => 'Check the unit and chart before interpreting the label', 'html' => <<<'TXT'
            <p>If your measurement was taken in centimeters, convert it to millimeters accurately before entering it or use the unit selector if the form offers the original unit. A unit mistake can be a factor of ten, while confusing radius with diameter creates a factor of two. These are easy errors to spot if you compare the result with a ring known to fit or with a jeweler’s measurement.</p><p>When a size table offers several nearby options, note whether it rounds to the closest listed size or uses boundaries that differ by region. The converter’s label is a lookup result; it cannot standardize every shop’s chart. Confirm the label at checkout and retain the raw measurement for any follow-up.</p>
            TXT],
            ['title' => 'Keep a note of the measurement method', 'html' => <<<'TXT'
            <p>Write down whether the input came from an existing ring, a finger strip or a professional tool. That context helps explain why two measurements differ and makes a later comparison more useful than keeping only the final size label.</p>
            TXT],
            ['title' => 'Use the seller’s sizing convention', 'html' => <<<'TXT'
            <p>Check the seller’s product page for the named system and any half-size guidance. A chart’s country label should match the retailer’s convention, not merely the place where the ring was manufactured.</p>
            TXT],
            ['title' => 'Confirm the measurement definition', 'html' => <<<'TXT'
            <p>Before reusing a number from another chart, check whether it describes the inner diameter, the finger circumference or a nominal size. Matching the definition is necessary before comparing two results.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the mm to ring size converter calculator?', 'a' => 'The form asks for the inside diameter, which is 8 fields in total.'],
            ['q' => 'Can I enter inside circumference in a different unit?', 'a' => 'Yes. Inside circumference opens in millimeters and the chip beside it offers 34 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Inside circumference = 94.2478 mm.'],
        ],
        'related' => [
            ['path' => '/everyday-life/brake-specific-fuel-consumption', 'name' => 'Brake specific fuel consumption'],
            ['path' => '/everyday-life/business-days', 'name' => 'Business days'],
            ['path' => '/everyday-life/calendar', 'name' => 'Calendar'],
        ],
    ],
];
