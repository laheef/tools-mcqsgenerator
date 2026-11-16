<?php

/**
 * cm to ring size converter
 * /everyday-life/cm-to-ring-size-converter
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'cm to ring size converter',
    'meta' => ['title' => 'Cm to ring size converter — Formula & Results', 'description' => 'cm to ring size converter works out inside circumference from inside diameter. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'cm to ring size converter Calculator', 'updated' => '2024-12-06'],
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
                            'unit_default' => 'cm',
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
                            'unit_default' => 'cm',
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
                                ['when' => 'size == 1', 'text' => 'US &amp; Canada size: 0000 UK &amp; Australia size: - France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
                                ['when' => 'size == 2', 'text' => 'US &amp; Canada size: 00 UK &amp; Australia size: - France &amp; Russia size: - Germany size: - Switzerland size: - Japan size: -&nbsp;'],
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
                                This tool can only convert up to the UK &amp; Australia ring size of Z+6, which has an inside diameter of 2.427&nbsp;cm (0.9555&nbsp;in) or an inside circumference of 7.625&nbsp;cm (3.002&nbsp;in). You may have to check with your favorite ring store if they offer larger ring sizes for you.&nbsp;
                                TXT],
                                ['when' => 'size == 0', 'text' => <<<'TXT'
                                The smallest ring size available is the US &amp; Canada ring size of 0000, which has an inside diameter of 0.991&nbsp;cm (0.39016&nbsp;in) or an inside circumference of 3.1133&nbsp;cm (1.2257&nbsp;in). You may have to check with your favorite ring store to see if they can custom-make a smaller-sized ring for you.&nbsp;
                                TXT],
                                ['when' => 'not(hasValue(size))', 'text' => 'US &amp; Canada size:&nbsp; UK &amp; Australia size:&nbsp; France &amp; Russia size:&nbsp; Germany size:&nbsp; Switzerland size:&nbsp; Japan size:&nbsp;'],
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
                            'dataset' => 'Converter part',
                            'control' => 'DROPDOWN',
                            'default' => 'US & Canada',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dataset_US',
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
                            'name' => 'dataset_UK',
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
                            'name' => 'dataset_France',
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
                            'name' => 'dataset_Germany',
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
                            'name' => 'dataset_Switzerland',
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
                            'name' => 'dataset_Japan',
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
                                ['when' => null, 'text' => 'Equivalent ring sizes'],
                                ['when' => 'convert_from == 1', 'text' => <<<'TXT'
                                {{first.uiValue}} size: {{US1.uiValue}} {{second.uiValue}} size: {{US2.uiValue}} {{third.uiValue}} size: {{US3.uiValue}} {{fourth.uiValue}} size: {{US4.uiValue}} {{fifth.uiValue}} size: {{US5.uiValue}}&nbsp;
                                TXT],
                                ['when' => 'convert_from == 2', 'text' => <<<'TXT'
                                {{first.uiValue}} size: {{UK1.uiValue}} {{second.uiValue}} size: {{UK2.uiValue}} {{third.uiValue}} size: {{UK3.uiValue}} {{fourth.uiValue}} size: {{UK4.uiValue}} {{fifth.uiValue}} size: {{UK5.uiValue}}&nbsp;
                                TXT],
                                ['when' => 'convert_from == 3', 'text' => <<<'TXT'
                                {{first.uiValue}} size: {{France1.uiValue}} {{second.uiValue}} size: {{France2.uiValue}} {{third.uiValue}} size: {{France3.uiValue}} {{fourth.uiValue}} size: {{France4.uiValue}} {{fifth.uiValue}} size: {{France5.uiValue}}&nbsp;
                                TXT],
                                ['when' => 'convert_from == 4', 'text' => <<<'TXT'
                                {{first.uiValue}} size: {{Germany1.uiValue}} {{second.uiValue}} size: {{Germany2.uiValue}} {{third.uiValue}} size: {{Germany3.uiValue}} {{fourth.uiValue}} size: {{Germany4.uiValue}} {{fifth.uiValue}} size: {{Germany5.uiValue}}&nbsp;
                                TXT],
                                ['when' => 'convert_from == 5', 'text' => <<<'TXT'
                                {{first.uiValue}} size: {{Switzerland1.uiValue}} {{second.uiValue}} size: {{Switzerland2.uiValue}} {{third.uiValue}} size: {{Switzerland3.uiValue}} {{fourth.uiValue}} size: {{Switzerland4.uiValue}} {{fifth.uiValue}} size: {{Switzerland5.uiValue}}&nbsp;
                                TXT],
                                ['when' => 'convert_from == 6', 'text' => <<<'TXT'
                                {{first.uiValue}} size: {{Japan1.uiValue}} {{second.uiValue}} size: {{Japan2.uiValue}} {{third.uiValue}} size: {{Japan3.uiValue}} {{fourth.uiValue}} size: {{Japan4.uiValue}} {{fifth.uiValue}} size: {{Japan5.uiValue}}
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
                            'name' => 'US1',
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
                            'name' => 'US2',
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
                            'name' => 'US3',
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
                            'name' => 'US4',
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
                            'name' => 'US5',
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
                            'name' => 'UK1',
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
                            'name' => 'UK2',
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
                            'name' => 'UK3',
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
                            'name' => 'UK4',
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
                            'name' => 'UK5',
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
                            'name' => 'France1',
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
                            'name' => 'France2',
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
                            'name' => 'France3',
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
                            'name' => 'France4',
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
                            'name' => 'France5',
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
                            'name' => 'Germany1',
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
                            'name' => 'Germany2',
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
                            'name' => 'Germany3',
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
                            'name' => 'Germany4',
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
                            'name' => 'Germany5',
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
                            'name' => 'Switzerland1',
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
                            'name' => 'Switzerland2',
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
                            'name' => 'Switzerland3',
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
                            'name' => 'Switzerland4',
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
                            'name' => 'Switzerland5',
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
                            'name' => 'Japan1',
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
                            'name' => 'Japan2',
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
                            'name' => 'Japan3',
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
                            'name' => 'Japan4',
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
                            'name' => 'Japan5',
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
            'results' => ['diameter' => 'circumference/PI', 'circumference' => 'PI*diameter'],
        ],
        [
            'title' => 'size = get_size(diameter)',
            'results' => ['size' => 'get_size(diameter)'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";omni.define("get_size",function(diameter){if(diameter<=8){return 0}else if(diameter>8&&diameter<=9.91){return 1}else if(diameter>9.91&&diameter<=10.72){return 2}else if(diameter>10.72&&diameter<=11.53){return 3}else if(diameter>11.53&&diameter<=11.95){return 4}else if(diameter>11.95&&diameter<=12.18){return 5}else if(diameter>12.18&&diameter<=12.37){return 6}else if(diameter>12.37&&diameter<=12.6){return 7}else if(diameter>12.6&&diameter<=12.78){return 8}else if(diameter>12.78&&diameter<=13){return 9}else if(diameter>13&&diameter<=13.21){return 10}else if(diameter>13.21&&diameter<=13.41){return 11}else if(diameter>13.41&&diameter<=13.61){return 12}else if(diameter>13.61&&diameter<=13.83){return 13}else if(diameter>13.83&&diameter<=14.05){return 14}else if(diameter>14.05&&diameter<=14.15){return 15}else if(diameter>14.15&&diameter<=14.25){return 16}else if(diameter>14.25&&diameter<=14.36){return 17}else if(diameter>14.36&&diameter<=14.45){return 18}else if(diameter>14.45&&diameter<=14.56){return 19}else if(diameter>14.56&&diameter<=14.65){return 20}else if(diameter>14.65&&diameter<=14.86){return 21}else if(diameter>14.86&&diameter<=15.04){return 22}else if(diameter>15.04&&diameter<=15.27){return 23}else if(diameter>15.27&&diameter<=15.4){return 24}else if(diameter>15.4&&diameter<=15.53){return 25}else if(diameter>15.53&&diameter<=15.7){return 26}else if(diameter>15.7&&diameter<=15.8){return 27}else if(diameter>15.8&&diameter<=15.9){return 28}else if(diameter>15.9&&diameter<=16){return 29}else if(diameter>16&&diameter<=16.1){return 30}else if(diameter>16.1&&diameter<=16.3){return 31}else if(diameter>16.3&&diameter<=16.41){return 32}else if(diameter>16.41&&diameter<=16.51){return 33}else if(diameter>16.51&&diameter<=16.71){return 34}else if(diameter>16.71&&diameter<=16.92){return 35}else if(diameter>16.92&&diameter<=17.13){return 36}else if(diameter>17.13&&diameter<=17.35){return 37}else if(diameter>17.35&&diameter<=17.45){return 38}else if(diameter>17.45&&diameter<=17.75){return 39}else if(diameter>17.75&&diameter<=17.97){return 40}else if(diameter>17.97&&diameter<=18.19){return 41}else if(diameter>18.19&&diameter<=18.35){return 42}else if(diameter>18.35&&diameter<=18.53){return 43}else if(diameter>18.53&&diameter<=18.61){return 44}else if(diameter>18.61&&diameter<=18.69){return 45}else if(diameter>18.69&&diameter<=18.8){return 46}else if(diameter>18.8&&diameter<=18.89){return 47}else if(diameter>18.89&&diameter<=19.1){return 48}else if(diameter>19.1&&diameter<=19.22){return 49}else if(diameter>19.22&&diameter<=19.31){return 50}else if(diameter>19.31&&diameter<=19.41){return 51}else if(diameter>19.41&&diameter<=19.51){return 52}else if(diameter>19.51&&diameter<=19.62){return 53}else if(diameter>19.62&&diameter<=19.84){return 54}else if(diameter>19.84&&diameter<=20.02){return 55}else if(diameter>20.02&&diameter<=20.2){return 56}else if(diameter>20.2&&diameter<=20.32){return 57}else if(diameter>20.32&&diameter<=20.44){return 58}else if(diameter>20.44&&diameter<=20.68){return 59}else if(diameter>20.68&&diameter<=20.76){return 60}else if(diameter>20.76&&diameter<=20.85){return 61}else if(diameter>20.85&&diameter<=20.94){return 62}else if(diameter>20.94&&diameter<=21.08){return 63}else if(diameter>21.08&&diameter<=21.18){return 64}else if(diameter>21.18&&diameter<=21.24){return 65}else if(diameter>21.24&&diameter<=21.3){return 66}else if(diameter>21.3&&diameter<=21.49){return 67}else if(diameter>21.49&&diameter<=21.69){return 68}else if(diameter>21.69&&diameter<=21.89){return 69}else if(diameter>21.89&&diameter<=22.1){return 70}else if(diameter>22.1&&diameter<=22.33){return 71}else if(diameter>22.33&&diameter<=22.6){return 72}else if(diameter>22.6&&diameter<=22.69){return 73}else if(diameter>22.69&&diameter<=22.92){return 74}else if(diameter>22.92&&diameter<=23.06){return 75}else if(diameter>23.06&&diameter<=23.24){return 76}else if(diameter>23.24&&diameter<=23.47){return 77}else if(diameter>23.47&&diameter<=23.55){return 78}else if(diameter>23.55&&diameter<=23.87){return 79}else if(diameter>23.87&&diameter<=24.27){return 80}else if(diameter>22.6){return 81}});//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => 'The cm to ring size converter takes the numbers you enter and reports <strong>inside diameter</strong> immediately.',
        'sections' => [
            ['title' => 'How does the cm to ring size converter calculator work?', 'html' => <<<'TXT'
            <p>The cm to ring size converter takes the values in the form, applies the relationship described below and reports <strong>inside diameter</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the ring size (Ring size equivalents), the ring size (Ring size equivalents) and the ring size (Ring size equivalents)); then you type in the inside circumference.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>Pick the option that matches your case — 6 options, such as US & Canada, UK & Australia and france & Russia. </li><li>Pick the option that matches your case — 72 options, such as 0000, 00 and 0. </li><li>Pick the option that matches your case — 77 options, such as A, A 1/2 and B. </li><li>Pick the option that matches your case — 23 options, such as 41 1/2, 42 3/4 and 44. </li><li>Pick the option that matches your case — 24 options, such as 13 1/2, 13 3/4 and 14. </li><li>Pick the option that matches your case — 23 options, such as 1 1/2, 2 3/4 and 4. </li><li>Pick the option that matches your case — 26 options, such as 1, 2 and 3. </li></ul><p>7 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Inside circumference</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>You supply it</td></tr><tr><td><strong>Inside diameter</strong></td><td>A measured quantity, 34 units available.</td><td>centimeters</td><td>Calculated</td></tr><tr><td><strong>Ring size (Ring size equivalents)</strong></td><td>One of 72 options, such as 0000, 00 and 0.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Ring size (Ring size equivalents)</strong></td><td>One of 77 options, such as A, A 1/2 and B.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Ring size (Ring size equivalents)</strong></td><td>One of 23 options, such as 41 1/2, 42 3/4 and 44.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Ring size (Ring size equivalents)</strong></td><td>One of 24 options, such as 13 1/2, 13 3/4 and 14.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Ring size (Ring size equivalents)</strong></td><td>One of 23 options, such as 1 1/2, 2 3/4 and 4.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Ring size (Ring size equivalents)</strong></td><td>One of 26 options, such as 1, 2 and 3.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Size</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the cm to ring size converter calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Inside diameter</span><span class="formula-eq">=</span><span class="formula-rhs">inside circumference ÷ PI</span></div><div class="formula-row"><span class="formula-lhs">Size</span><span class="formula-eq">=</span><span class="formula-rhs">(inside diameter)</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What is a worked example?', 'html' => <<<'TXT'
            <p>Take <strong>Inside circumference</strong> = 30 cm, <strong>Convert from</strong> set to US & Canada and <strong>Ring size</strong> set to 6. The calculator returns <strong>Inside diameter</strong> = 9.5493 cm.</p><p>The point of the example is the scale, not the particular digits: swap in your own figures and the same relationship produces your answer.</p><ol><li>Enter the values listed above, matching the units each box asks for.</li><li>Read off the result. Any field you leave empty is the one the calculator solves for.</li><li>Sanity-check the number against the relationship: <strong>Inside diameter</strong> = 9.5493 cm should be roughly the size you expected from <strong>Inside circumference</strong> = 30 cm and <strong>Convert from</strong> set to US & Canada.</li></ol>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>Shown in centimeters, and convertible to any of the 34 units on that chip.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>If a number looks wrong, check three things in this order: that the units match what you had in mind, that no drop-down is still on its default, and that the value you entered is on the same scale as the rest — a rate typed as 5 rather than 0.05 is the classic mistake. </p>
            TXT],
            ['title' => 'How are units and precision handled?', 'html' => <<<'TXT'
            <ul><li>Length, opening in centimeters</li><li>Length, opening in centimeters</li></ul>
            <p>Display rounding is separate from calculation rounding: the digits you see are shortened, the value behind them is not. </p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The cm to ring size converter earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 1 figures keep coming back — the inside circumference — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li>Filling in more than one box is fine. </li><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/standing-desk-height">Standing desk height</a>, <a href="/everyday-life/star-wars-marathon">Star wars marathon</a> and <a href="/everyday-life/subtract-time">Subtract time</a>.</p>
            TXT],
            ['title' => 'Converting centimeters into a ring size', 'html' => <<<'TXT'
            <p>This calculator bridges a metric measurement and several regional ring-size tables. Start by confirming which field you measured: the inside diameter of a ring or the circumference around its inner edge. Diameter is the straight distance through the center of the opening; circumference runs around the opening. Entering circumference as diameter (or the reverse) creates a large error even if the unit is correct. The form may accept a size label as well as a measurement, so use the label only when you know which country or chart it belongs to.</p>
            <p>If your ruler shows centimeters, check whether the input expects centimeters or whether the unit selector has been changed. One centimeter equals ten millimeters. Keep the original reading in your notes rather than rounding it to a whole ring size before conversion. A ring mandrel or caliper can give a more repeatable measurement than a quick ruler reading, but an oval or damaged ring may still produce different values in different directions.</p>
            <p>For an existing ring, measure the inside opening across its center without including the band. For a finger, measure around the spot where the ring will rest with a flexible tape or sizing strip. Keep the strip snug but do not compress the skin, and check that it can pass over the knuckle. A jeweler can measure the finger with a proper sizing set, which is helpful when buying an important, wide or custom ring.</p>
            <p>Select the regional system used by the seller. The available charts can use numbers, letters or circumference-based labels, and they do not all round at the same boundaries. A result in one country’s scale is not a guarantee that another retailer uses an identical chart. If you are buying internationally, compare the returned label with the seller’s own size guide and confirm whether it expects a diameter, circumference or a named size.</p>
            <p>Fit depends on the ring as well as the measurement. A broad band may feel tighter than a narrow one; a comfort-fit interior can feel different from a flat interior. Knuckle size, temperature, hand activity and personal preference also matter. If the converter returns a borderline size, consider trying adjacent sizes or asking a jeweler how that specific design should fit rather than automatically rounding.</p>
            <p>To avoid compounding error, convert directly from the original measurement each time you compare charts. Do not convert a rounded US label into a UK label and then that label into another system if the raw measurement is available. Keep the measurement type, unit, chosen region and result together. That makes a disagreement easier to troubleshoot and gives a retailer useful information without treating the converter as a guarantee of comfort.</p>
            TXT],
            ['title' => 'Check measurement units and conversions', 'html' => <<<'TXT'
            <p>If you start with a centimeter measurement, keep its precision but do not confuse the decimal point with a millimeter value. For example, 1.8 cm is 18 mm; it is not 1.8 mm. If the calculator’s chip can accept centimeters, set it deliberately and verify the displayed unit before reading the answer. When comparing a value from a jeweler, ask whether it is the inner diameter, inner circumference or a regional ring label. Each describes a different stage of the conversion.</p><p>Regional charts may place two adjacent sizes close together, and their rounding thresholds can differ. If the tool gives a borderline result, compare the underlying centimeter or millimeter value with the retailer’s chart rather than rounding the label again. A professional ring gauge is preferable when the purchase is valuable, the ring is wide, or the finger measurement is hard to repeat. Save both the raw measurement and the selected region so the result can be checked later.</p>
            TXT],
            ['title' => 'When to rely on a jeweler’s gauge', 'html' => <<<'TXT'
            <p>A home measurement is most useful for narrowing the possibilities. If a ring is a gift, has an unusual shape or cannot be resized easily, have a jeweler measure the intended finger and check the band design. Ask which sizing region the shop uses and whether the band width changes its recommendation. This avoids assuming that a precise-looking decimal automatically selects the right fit.</p><p>Keep the measurement separate from the label when you save your notes. If the first chart rounds down and the next rounds up, the original metric value makes the difference visible. Enter that original value again rather than relying on a size copied from a different region.</p>
            TXT],
            ['title' => 'Compare the original measurement at the final step', 'html' => <<<'TXT'
            <p>Before making a purchase, compare the raw centimeter reading with the retailer’s chart and confirm that the chart uses the same measurement definition. If the size lies between entries, ask the jeweler how that band design is normally fitted. A converted label is a useful shortlist, not a substitute for checking the actual ring on the intended finger.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What do I need to enter to use the cm to ring size converter calculator?', 'a' => 'The form asks for the inside circumference, which is 8 fields in total.'],
            ['q' => 'Can I enter inside circumference in a different unit?', 'a' => 'Yes. Inside circumference opens in centimeters and the chip beside it offers 34 units.'],
            ['q' => 'What is a typical result?', 'a' => 'With the values the page starts from, the calculator reports Inside diameter = 9.5493 cm.'],
        ],
        'related' => [
            ['path' => '/everyday-life/standing-desk-height', 'name' => 'Standing desk height'],
            ['path' => '/everyday-life/star-wars-marathon', 'name' => 'Star wars marathon'],
            ['path' => '/everyday-life/subtract-time', 'name' => 'Subtract time'],
        ],
    ],
];
