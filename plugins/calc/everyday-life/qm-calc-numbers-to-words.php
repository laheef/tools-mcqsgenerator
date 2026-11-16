<?php

/**
 * Numbers to words
 * /everyday-life/numbers-to-words
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Numbers to words',
    'meta' => ['title' => 'Numbers to words — Formula, Steps & Examples', 'description' => 'Numbers to words reports whole Number Checker, Decimal Checker and Full Checker. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Numbers to words Calculator', 'updated' => '2026-07-13'],
    'sections' => [
        [
            'title' => '',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'numero',
                            'label' => 'Convert this number:',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        ['type' => 'note', 'text' => 'The converter will start to truncate and may round numbers of this length.'],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'modee',
                            'label' => 'To:',
                            'type' => 'select',
                            'options' => ['Words' => '1', 'Check writing' => '2'],
                            'dataset' => 'to',
                            'default' => 'Words',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'money',
                            'label' => 'Currency',
                            'type' => 'select',
                            'options' => [
                                'None' => '99',
                                'Dollars' => '1',
                                'Pounds' => '2',
                                'Euros' => '3',
                                'Yen' => '5',
                                'Yuans' => '6',
                                'Francs' => '4',
                                'Rupees' => '7',
                                'Won' => '8',
                                'Pesos' => '9',
                                'Rubles' => '10',
                                'Reais' => '11',
                                'Dinars' => '12',
                                'Liras' => '13',
                                'Kronor' => '14',
                                'Kroner' => '15',
                                'Złote' => '16',
                                'Custom' => '-1',
                            ],
                            'dataset' => 'currency',
                            'control' => 'DROPDOWN',
                            'default' => 'Dollars',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'custom',
                            'label' => 'Custom currency',
                            'type' => 'number',
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
                                ['when' => 'modee==1', 'text' => 'Answer: {{numberInWords.valueMarkdown}}'],
                                ['when' => 'modee==2 and letters==1 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords.valueMarkdown}} {{currency.uiValue}}'],
                                ['when' => 'modee==2 and letters==2 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords.valueMarkdown}} {{CURRENCY_UPPER.uiValue}}'],
                                ['when' => 'modee==2 and money==99 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords.valueMarkdown}}&nbsp;'],
                                ['when' => 'modee==2 and money==-1 and letters ==1 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords.valueMarkdown}} {{custom_lower.valueMarkdown}}&nbsp;'],
                                ['when' => 'modee==2 and money==-1 and letters ==2 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords.valueMarkdown}} {{custom_UPPER.valueMarkdown}}&nbsp;'],
                                ['when' => 'modee==2 and abs(numero) > 99999999999999', 'text' => 'The magnitude of the number is too large for the check-writing mode.'],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Formatting',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'letters',
                            'label' => 'Letter case',
                            'type' => 'select',
                            'options' => ['lowercase' => '1', 'UPPERCASE' => '2'],
                            'dataset' => 'case',
                            'default' => 'lowercase',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Hidden variable',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'currency',
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
                            'name' => 'CURRENCY_UPPER',
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
                            'name' => 'validInputs',
                            'label' => '',
                            'type' => 'select',
                            'options' => ['Only digits and a period is allowed in this input.' => '1'],
                            'dataset' => 'Exported string',
                            'control' => 'DROPDOWN',
                            'default' => 'Only digits and a period is allowed in this input.',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'decimalChecker',
                            'label' => 'Decimal checker',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'wholeNumberChecker',
                            'label' => 'Whole number checker',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'fullChecker',
                            'label' => 'Full checker',
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
            'title' => 'wholeNumberChecker = count(string(floor(abs(numero))))',
            'results' => ['wholeNumberChecker' => 'count(string(floor(abs(numero))))'],
        ],
        [
            'title' => 'decimalChecker = count(string(abs(numero) - floor(abs(numero))))-2',
            'results' => ['decimalChecker' => 'count(string(abs(numero) - floor(abs(numero)))) - 2'],
        ],
        [
            'title' => 'fullChecker =  count(string(floor(abs(numero)))) + count(string(abs(numero) - floor(abs(numero))))',
            'results' => ['fullChecker' => 'count(string(abs(numero) - floor(abs(numero)))) + count(string(floor(abs(numero))))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var dict_numbers={0:"",1:"one",2:"two",3:"three",4:"four",5:"five",6:"six",7:"seven",8:"eight",9:"nine",10:"ten",11:"eleven",12:"twelve",13:"thirteen",14:"fourteen",15:"fifteen",16:"sixteen",17:"seventeen",18:"eighteen",19:"nineteen"};var decas={2:"twenty",3:"thirty",4:"forty",5:"fifty",6:"sixty",7:"seventy",8:"eighty",9:"ninety"};var aftercommaSI={1:"tenths",2:"hundredths",3:"thousandths",4:"ten-thousandths",5:"hundred-thousandths",6:"millionths",7:"ten-millionths",8:"hundred-millionths",9:"billionths",10:"ten-billionths",11:"hundred-billionths"};omni.onResult([],function(ctx,_ref){var letters=_ref.letters,modee=_ref.modee;var input=ctx.getRawInput("numero");var custom=ctx.getRawInput("custom");if(custom===undefined||custom===null){ctx.exportValue("custom_UPPER","");ctx.exportValue("custom_lower","")}else{ctx.exportValue("custom_UPPER",custom.toUpperCase());ctx.exportValue("custom_lower",custom.toLowerCase())}var numberInWords="";if(input===undefined||input===null){ctx.exportValue("numberInWords","");return}var num=Number(input);if(isNaN(num)){ctx.exportValue("numberInWords",ctx.getRawInput("validInput"));return}if(modee===1){numberInWords=convertNumberToWords(num)}else{if(mathjs.abs(num)>99999999999999){return}numberInWords=convertNumberToCheck(num)}if(letters===1){ctx.exportValue("numberInWords",numberInWords.toLowerCase())}else{ctx.exportValue("numberInWords",numberInWords.toUpperCase())}});function convertNumberToCheck(num){var isNegative=num<0;var absNum_raw=Math.abs(num);var absNum=absNum_raw.toFixed(2);var parts=String(absNum).split(".");var beforeNum=parts[0];var afterNum=parts[1];console.log(num);var string_return="";if(Number(beforeNum)===0){string_return="zero"}else{var beforeReversed=beforeNum.split("").reverse();var tripletNames=[""," thousand"," million"," billion"," trillion"," quadrillion"];var result="";for(var i=0;i<beforeReversed.length;i+=3){var triplet=[Number(beforeReversed[i])||0,Number(beforeReversed[i+1])||0,Number(beforeReversed[i+2])||0];var tripletStr="";if(triplet[2]!==0){tripletStr+=dict_numbers[triplet[2]]+" hundred "}if(triplet[1]===1){tripletStr+=dict_numbers[10+triplet[0]]+" "}else{if(triplet[1]>1){tripletStr+=decas[triplet[1]]+(triplet[0]!==0?"-":"")}if(triplet[0]!==0){tripletStr+=dict_numbers[triplet[0]]+" "}}if(tripletStr.trim()!==""){tripletStr+=tripletNames[i/3]+" ";result=tripletStr+result}}string_return=result.trim()}if(afterNum.length>0){string_return+=" and "+afterNum+"/100"}if(isNegative){string_return="minus "+string_return}return string_return.charAt(0).toUpperCase()+string_return.slice(1)}function convertNumberToWords(num){var isNegative=num<0;var absNum=Math.abs(num);var parts=String(absNum).split(".");var beforeNum=parts[0];var afterNum=parts[1]||"";var string_return="";if(Number(beforeNum)===0){string_return="zero"}else{var beforeReversed=beforeNum.split("").reverse();var tripletNames=[""," thousand"," million"," billion"," trillion"," quadrillion"];var result="";for(var i=0;i<beforeReversed.length;i+=3){var triplet=[Number(beforeReversed[i])||0,Number(beforeReversed[i+1])||0,Number(beforeReversed[i+2])||0];var tripletStr="";if(triplet[2]!==0){tripletStr+=dict_numbers[triplet[2]]+" hundred "}if(triplet[1]===1){tripletStr+=dict_numbers[10+triplet[0]]+" "}else{if(triplet[1]>1){tripletStr+=decas[triplet[1]]+(triplet[0]!==0?"-":"")}if(triplet[0]!==0){tripletStr+=dict_numbers[triplet[0]]+" "}}if(tripletStr.trim()!==""){tripletStr+=tripletNames[i/3]+" ";result=tripletStr+result}}string_return=result.trim()}if(afterNum.length>0){var afterNumber=Number(afterNum);var decimalString="";if(afterNumber===0){decimalString="zero"}else{var afterReversed=afterNum.split("").reverse();var _tripletNames=[""," thousand"," million"," billion"," trillion"," quadrillion"];var _result="";for(var _i=0;_i<afterReversed.length;_i+=3){var _triplet=[Number(afterReversed[_i])||0,Number(afterReversed[_i+1])||0,Number(afterReversed[_i+2])||0];var _tripletStr="";if(_triplet[2]!==0){_tripletStr+=dict_numbers[_triplet[2]]+" hundred "}if(_triplet[1]===1){_tripletStr+=dict_numbers[10+_triplet[0]]+" "}else{if(_triplet[1]>1){_tripletStr+=decas[_triplet[1]]+(_triplet[0]!==0?"-":"")}if(_triplet[0]!==0){_tripletStr+=dict_numbers[_triplet[0]]+" "}}if(_tripletStr.trim()!==""){var tripletIndex=Math.floor(_i/3);if(_tripletNames[tripletIndex]){_tripletStr+=_tripletNames[tripletIndex]+" "}_result=_tripletStr+_result}}decimalString=_result.trim()}string_return+=" and "+decimalString+" "+aftercommaSI[afterNum.length]}if(isNegative){string_return="minus "+string_return}return string_return.charAt(0).toUpperCase()+string_return.slice(1)}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => 'The Numbers to words calculator takes the numbers you enter and reports <strong>whole number checker</strong> immediately.',
        'sections' => [
            ['title' => 'How does the Numbers to words calculator work?', 'html' => <<<'TXT'
            <p>The Numbers to words calculator takes the values in the form, applies the relationship described below and reports <strong>whole number checker</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the currency and the letter case); then you type in the custom currency.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A plain number with no unit attached.</li><li>Pick the option that matches your case — 2 options, such as words and check writing. </li><li>Pick the option that matches your case — 18 options, such as none, dollars and pounds. </li><li>A plain number with no unit attached.</li><li>Pick the option that matches your case — 2 options, such as lowercase and UPPERCASE. </li><li>A single on/off switch — tick it for &ldquo;Only digits and a period is allowed in this input&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li></ul><p>4 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Currency</strong></td><td>One of 18 options, such as none, dollars and pounds.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Custom currency</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Letter case</strong></td><td>One of 2 options, such as lowercase and UPPERCASE.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Decimal checker</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Whole number checker</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Full checker</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Numbers to words calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Whole number checker</span><span class="formula-eq">=</span><span class="formula-rhs">((rounded down, (the absolute value of (convert this number))))</span></div><div class="formula-row"><span class="formula-lhs">Decimal checker</span><span class="formula-eq">=</span><span class="formula-rhs">((the absolute value of (convert this number) − rounded down, (the absolute value of (convert this number)))) − 2</span></div><div class="formula-row"><span class="formula-lhs">Full checker</span><span class="formula-eq">=</span><span class="formula-rhs">((the absolute value of (convert this number) − rounded down, (the absolute value of (convert this number)))) + ((rounded down, (the absolute value of (convert this number))))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Numbers to words calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Turning a rough idea into a number you can act on</li><li>Checking a figure someone else quoted</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 1 figures keep coming back — the custom currency — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'What are the limits worth knowing?', 'html' => <<<'TXT'
            <p>Every tool draws a boundary somewhere. For the Numbers to words calculator, these are the ones that matter:</p>
            <ul><li>The 4 drop-downs on this page offer a fixed list of cases. A value that is not on the list cannot be entered, and the nearest option is not always a good substitute.</li><li>The calculator reports what the relationship implies; it does not judge whether the inputs themselves are sensible, so a figure that is out by a factor of ten will produce an answer that is out by the same factor.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/cleaning-cost">House cleaning cost</a>, <a href="/everyday-life/clock-duration">Clock duration</a> and <a href="/everyday-life/cm-to-mm-ring-size-converter">cm to mm ring size converter</a>.</p>
            TXT],
            ['title' => 'Converting a number into readable wording', 'html' => <<<'TXT'
            <p>This calculator changes a numeric value into words and can use a plain-number mode or a check-writing mode with a selected currency. Before interpreting the output, choose the mode that matches the task. A number written for a sentence is not necessarily formatted the same way as an amount on a cheque or invoice. The currency setting affects the names of the main unit and its minor unit, while a custom option puts spelling and plural forms in your hands.</p>
            <p>Enter the value in the format the page expects. Check the decimal separator and grouping marks: commas and periods have different meanings in different regions. If you paste a number from a spreadsheet or another locale, first verify that the calculator reads the intended whole and fractional parts. A separator error can change the amount by a factor of one hundred or one thousand while leaving the result grammatical.</p>
            <p>For currency wording, check how the page treats the digits after the decimal point and whether it uses the selected currency’s minor-unit name. Not every currency uses the same subunit or number of decimal places. A custom currency label may be useful for a specialized draft, but you should confirm its spelling, capitalization, singular and plural forms, and the preferred wording for fractions.</p>
            <p>Number-to-word conventions also vary. Some styles include “and” between hundreds and tens; others omit it. Large-number names can vary by language or region, and formal documents can prescribe a specific phrase. The calculator follows the options available on the page; it does not determine the legally required style for a particular country, bank or contract.</p>
            <p>Use the result as a proofreading aid for forms, learning exercises or drafts. For a cheque, legal agreement or official payment record, compare the written amount with the digits and follow the document’s instructions. Keep the final numeric value and words together. If the number is being rounded for payment, round it first according to the relevant policy and then convert that final amount.</p>
            <p>When checking the output, compare the whole-number portion by groups—millions, thousands, hundreds and units—then verify the fraction and currency. Pay special attention to zeros, trailing decimals and very large values. If a custom label is used, read it aloud to catch a spelling or pluralization error. A correctly spelled result can still be wrong if the input was interpreted with the wrong separators.</p>
            <p>This tool does not verify a transaction, exchange rate, tax, or whether the selected currency is the one owed. It turns the entered number into text under a chosen convention. If you are unsure about the wording for a formal document, use the recipient’s instructions or get a qualified review instead of relying on a generic conversion alone.</p>
            TXT],
            ['title' => 'Check format, locale and purpose', 'html' => <<<'TXT'
            <p>Before using a result on a financial document, confirm the locale and wording style required by the recipient. A cheque-writing convention may place the currency name before the amount, use a specific phrase for the fractional portion or require a line through unused space. A general text conversion may not apply those conventions. The output can help with spelling and order, but it cannot establish whether the wording meets a bank’s or organization’s rules.</p><p>Large numbers are easiest to verify by grouping the digits from the right in threes, then checking each named group against the written result. For instance, inspect millions, thousands and the final three digits separately. This catches a misplaced separator or omitted group more reliably than reading a long string as a whole. For decimals, compare each fractional digit with the number of minor units the selected currency uses.</p><p>Negative values, zero amounts and values with more decimal places than the currency normally uses can require special handling. Check how the calculator displays these edge cases and follow the task’s rounding rule. If an amount must be rounded to a minor unit, use the official numeric amount first, then generate the words from that amount; do not expect a text converter to decide a financial rounding policy.</p><p>For educational use, compare plain-word mode with check-writing mode using the same number. The contrast can help explain how one quantity receives different wording in different contexts. For professional or legal use, verify the final text with the institution or a qualified reviewer. The calculator’s role is to express an input, not to certify it.</p>
            TXT],
            ['title' => 'Proofread the amount in its destination format', 'html' => <<<'TXT'
            <p>The final text should be checked where it will appear. A cheque may require the amount to fit a line; an invoice may use a currency code, and an educational exercise may expect plain words with no currency wording. Paste the result into a draft first and inspect punctuation, capitalization and spacing. If the recipient provides a sample or house style, follow it even if the calculator’s default phrase is different.</p><p>When a payment includes a fractional amount, verify that the written fraction represents the exact minor units after rounding. For example, if an accounting system rounds to two decimal places, convert the rounded value rather than a longer intermediate decimal. The calculator cannot decide the appropriate rounding rule for your transaction.</p>
            TXT],
            ['title' => 'Use the matching output mode', 'html' => <<<'TXT'
            <p>If you only need a sentence, use plain-word mode. If the amount is for a financial document, select the check-writing option and currency that match that document, then review the result against its instructions. Do not assume that selecting a currency validates the transaction or its legal wording.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I write a number in words?', 'a' => 'Enter the number, choose the output mode and currency options if applicable, then review the generated whole-number, decimal or full wording.'],
            ['q' => 'Can I convert currency amounts?', 'a' => 'Use the currency selector or custom-currency option shown in the form. Confirm the currency name and decimal convention, since those choices affect how the amount is written.'],
            ['q' => 'Why should I review the generated wording?', 'a' => 'Large numbers, decimal conventions and regional wording can vary. Check that the output matches the value and locale you need before using it in a document.'],
        ],
        'related' => [
            ['path' => '/everyday-life/cleaning-cost', 'name' => 'House cleaning cost'],
            ['path' => '/everyday-life/clock-duration', 'name' => 'Clock duration'],
            ['path' => '/everyday-life/cm-to-mm-ring-size-converter', 'name' => 'cm to mm ring size converter'],
        ],
    ],
];
