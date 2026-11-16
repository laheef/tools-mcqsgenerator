<?php

/**
 * Dollars in words
 * /everyday-life/dollars-in-words
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Dollars in words',
    'meta' => ['title' => 'Dollars in words — Formula, Steps & Examples', 'description' => 'Dollars in words turns amount to be expressed in words and currency into dec. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Dollars in words Calculator', 'updated' => '2026-08-18'],
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
                            'label' => 'Amount to be expressed in words',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                                'Dollars' => '1',
                                'Pounds' => '2',
                                'Euros' => '3',
                                'Yen' => '-5',
                                'Yuans' => '6',
                                'Francs' => '4',
                                'Rupees' => '7',
                                'Won' => '-8',
                                'Pesos' => '9',
                                'Rubles' => '10',
                                'Reais' => '11',
                                'Dinars' => '12',
                                'Liras' => '13',
                                'Kronor' => '14',
                                'Kroner' => '15',
                                'Złote' => '16',
                                'Other / None' => '99',
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
                            'name' => 'letters',
                            'label' => 'Letter case',
                            'type' => 'select',
                            'options' => ['lowercase' => '1', 'UPPERCASE' => '2'],
                            'dataset' => 'case',
                            'default' => 'lowercase',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'type' => 'note',
                            'cases' => [
                                ['when' => 'isInteger(numero) and letters==1 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{currency.uiValue}}&nbsp;'],
                                ['when' => 'not isInteger(numero) and letters==1 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{currency.uiValue}} and {{numberInWords2.valueMarkdown}} {{currency2.uiValue}}&nbsp;'],
                                ['when' => 'isInteger(numero) and letters==2 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{CURRENCY_UPPER.uiValue}}'],
                                ['when' => 'not isInteger(numero) and letters==2 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{CURRENCY_UPPER.uiValue}} AND {{numberInWords2.valueMarkdown}} {{CURRENCY2_UPPER.uiValue}}&nbsp;'],
                                ['when' => 'money==99 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords1.valueMarkdown}}&nbsp;'],
                                ['when' => 'money==-1 and letters ==1 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{custom_lower.valueMarkdown}}&nbsp;'],
                                ['when' => 'money==-1 and letters ==2 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{custom_UPPER.valueMarkdown}}&nbsp;'],
                                ['when' => 'abs(numero) > 99999999999999', 'text' => 'The magnitude of the number is too large for the conversion to words.'],
                                ['when' => 'floor(abs(numero))==1 and letters==1 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{unit.uiValue}} and {{numberInWords2.valueMarkdown}} {{currency2.uiValue}}&nbsp;'],
                                ['when' => 'abs(numero)!=1 and dec ==0.01 and letters==1 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{currency.uiValue}} and {{numberInWords2.valueMarkdown}} {{unit2.uiValue}}&nbsp;'],
                                ['when' => 'floor(abs(numero))==1 and dec ==0.01 and letters==1 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{unit.uiValue}} and {{numberInWords2.valueMarkdown}} {{unit2.uiValue}}&nbsp;'],
                                ['when' => 'abs(numero)==1 and letters==1 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{unit.uiValue}}'],
                                ['when' => 'abs(numero)==1 and letters==2 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{UNIT_UPPER.uiValue}}'],
                                ['when' => 'floor(abs(numero))==1 and letters==2 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{UNIT_UPPER.uiValue}} AND {{numberInWords2.valueMarkdown}} {{CURRENCY2_UPPER.uiValue}}&nbsp;'],
                                ['when' => 'abs(numero)!=1 and dec ==0.01 and letters==2 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{CURRENCY_UPPER.uiValue}} AND {{numberInWords2.valueMarkdown}} {{UNIT2_UPPER.uiValue}}&nbsp;'],
                                ['when' => 'floor(abs(numero))==1 and dec ==0.01 and letters==2 and abs(numero) <= 99999999999999', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{UNIT_UPPER.uiValue}} AND {{numberInWords2.valueMarkdown}} {{UNIT2_UPPER.uiValue}}&nbsp;'],
                                ['when' => 'letters==1 and abs(numero) <= 99999999999999 and money<-2', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{currency.uiValue}}'],
                                ['when' => 'floor(abs(numero))==1 and letters==1 and abs(numero) <= 99999999999999 and money<-2', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{unit.uiValue}}'],
                                ['when' => 'letters==2 and abs(numero) <= 99999999999999 and money<-2', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{CURRENCY_UPPER.uiValue}}'],
                                ['when' => 'floor(abs(numero))==1 and letters==2 and abs(numero) <= 99999999999999 and money<-2', 'text' => 'Answer: {{numberInWords1.valueMarkdown}} {{UNIT_UPPER.uiValue}}'],
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
                                ['when' => 'not hasValue(numero)', 'text' => 'Answer: Input a number...'],
                            ],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'dec',
                            'label' => 'Dec',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
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
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'currency2',
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
                            'name' => 'CURRENCY2_UPPER',
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
                            'name' => 'unit',
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
                            'name' => 'unit2',
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
                            'name' => 'UNIT_UPPER',
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
                            'name' => 'UNIT2_UPPER',
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
        [
            'title' => 'dec = round((abs(numero)- floor(abs(numero))) * 100) / 100',
            'results' => ['dec' => '(1/100)*round(100*abs(numero) - 100*floor(abs(numero)))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var dict_numbers={0:"",1:"one",2:"two",3:"three",4:"four",5:"five",6:"six",7:"seven",8:"eight",9:"nine",10:"ten",11:"eleven",12:"twelve",13:"thirteen",14:"fourteen",15:"fifteen",16:"sixteen",17:"seventeen",18:"eighteen",19:"nineteen"};var decas={2:"twenty",3:"thirty",4:"forty",5:"fifty",6:"sixty",7:"seventy",8:"eighty",9:"ninety"};omni.onResult([],function(ctx,_ref){var numero=_ref.numero,letters=_ref.letters;var numberInWords1="";var numberInWords2="";if(numero===undefined||numero===null){ctx.exportValue("numberInWords","");return}var num=Number(numero);if(isNaN(num)){ctx.exportValue("numberInWords",ctx.getRawInput("validInput"));return}if(mathjs.abs(num)>99999999999999){return}else{var absNum=Math.abs(num);var integerPart=split(absNum).integer;var decimalPart=split(absNum).decimal;numberInWords1=convertNumberToWords(integerPart);numberInWords2=convertNumberToWords(decimalPart)}var sign="";if(num<0){sign="negative "}if(letters===1){ctx.exportValue("numberInWords1",sign+numberInWords1.toLowerCase());ctx.exportValue("numberInWords2",numberInWords2.toLowerCase())}else{ctx.exportValue("numberInWords1",sign.toUpperCase()+numberInWords1.toUpperCase());ctx.exportValue("numberInWords2",numberInWords2.toUpperCase())}});function split(num){var rounded=Math.round(num*100)/100;var integerPart=Math.floor(rounded).toString();var decimalPart=Math.round((rounded-integerPart)*100).toString().padStart(2,"0");return{integer:integerPart,decimal:decimalPart}}function convertNumberToWords(num){var string_return="";if(Number(num)===0){string_return="zero"}else{var beforeReversed=num.split("").reverse();var tripletNames=[""," thousand"," million"," billion"," trillion"," quadrillion"];var result="";for(var i=0;i<beforeReversed.length;i+=3){var triplet=[Number(beforeReversed[i])||0,Number(beforeReversed[i+1])||0,Number(beforeReversed[i+2])||0];var tripletStr="";if(triplet[2]!==0){tripletStr+=dict_numbers[triplet[2]]+" hundred "}if(triplet[1]===1){tripletStr+=dict_numbers[10+triplet[0]]+" "}else{if(triplet[1]>1){tripletStr+=decas[triplet[1]]+(triplet[0]!==0?"-":"")}if(triplet[0]!==0){tripletStr+=dict_numbers[triplet[0]]+" "}}if(tripletStr.trim()!==""){tripletStr+=tripletNames[i/3]+" ";result=tripletStr+result}}string_return=result.trim()}return string_return.charAt(0).toUpperCase()+string_return.slice(1)}//# sourceURL=customJs.js
    TXT,
    'article' => [
        'intro' => 'Give the Dollars in words calculator the amount to be expressed in words and the custom currency and it returns <strong>whole number checker</strong>.',
        'sections' => [
            ['title' => 'How does the Dollars in words calculator work?', 'html' => <<<'TXT'
            <p>The Dollars in words calculator takes the values in the form, applies the relationship described below and reports <strong>whole number checker</strong> in the results panel.</p>
            <p>Working from the top of the form: you choose the option that describes your case (the currency and the letter case); then you type in the amount to be expressed in words and the custom currency.</p>
            TXT],
            ['title' => 'What do you need to enter?', 'html' => <<<'TXT'
            <ul><li>A plain number with no unit attached.</li><li>Pick the option that matches your case — 17 options, such as dollars, pounds and euros. </li><li>A plain number with no unit attached.</li><li>Pick the option that matches your case — 2 options, such as lowercase and UPPERCASE. </li><li>A single on/off switch — tick it for &ldquo;Only digits and a period is allowed in this input&rdquo;, leave it clear for the other case. It changes which relationship the calculator applies, not just a multiplier.</li></ul><p>3 fields on this form are a choice rather than a number. </p>
            TXT],
            ['title' => 'What are the variables at a glance?', 'html' => <<<'TXT'
            <table><thead><tr><th>Field</th><th>What it is</th><th>Unit</th><th>Role</th></tr></thead><tbody><tr><td><strong>Amount to be expressed in words</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Currency</strong></td><td>One of 17 options, such as dollars, pounds and euros.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Custom currency</strong></td><td>A plain number, with no unit.</td><td>—</td><td>You supply it</td></tr><tr><td><strong>Letter case</strong></td><td>One of 2 options, such as lowercase and UPPERCASE.</td><td>choice</td><td>You supply it</td></tr><tr><td><strong>Dec</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Decimal checker</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Whole number checker</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr><tr><td><strong>Full checker</strong></td><td>A plain number, with no unit.</td><td>—</td><td>Calculated</td></tr></tbody></table>
            TXT],
            ['title' => 'The formula behind the Dollars in words calculator', 'html' => <<<'TXT'
            <p> Each one can be rearranged for any of its variables, which is what makes the calculator work in both directions:</p><div class="formula-block"><div class="formula-row"><span class="formula-lhs">Whole number checker</span><span class="formula-eq">=</span><span class="formula-rhs">((rounded down, (the absolute value of (amount to be expressed in words))))</span></div><div class="formula-row"><span class="formula-lhs">Decimal checker</span><span class="formula-eq">=</span><span class="formula-rhs">((the absolute value of (amount to be expressed in words) − rounded down, (the absolute value of (amount to be expressed in words)))) − 2</span></div><div class="formula-row"><span class="formula-lhs">Full checker</span><span class="formula-eq">=</span><span class="formula-rhs">((the absolute value of (amount to be expressed in words) − rounded down, (the absolute value of (amount to be expressed in words)))) + ((rounded down, (the absolute value of (amount to be expressed in words))))</span></div><div class="formula-row"><span class="formula-lhs">Dec</span><span class="formula-eq">=</span><span class="formula-rhs">(1 ÷ 100) × rounded, (100 × the absolute value of (amount to be expressed in words) − 100 × rounded down, (the absolute value of (amount to be expressed in words)))</span></div></div><p>Read it as an ordinary equation. </p>
            TXT],
            ['title' => 'What does the result mean?', 'html' => <<<'TXT'
            <ul><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li><li>A number, filled in as soon as the inputs allow it.</li></ul><p>Before doubting the arithmetic, check the inputs: a unit chip on the wrong setting, a drop-down left at its default, or a percentage typed as a whole number rather than a decimal will each shift the answer by a clean power of ten.</p>
            TXT],
            ['title' => 'When should you use it?', 'html' => <<<'TXT'
            <p>The Dollars in words calculator earns its place in the middle of a task, not instead of one. It is most useful when:</p><ul><li>Checking a figure someone else quoted</li><li>Turning a rough idea into a number you can act on</li><li>Testing how sensitive an answer is to one input</li><li>Any time the same 2 figures keep coming back — the amount to be expressed in words and the custom currency — and you would rather not repeat the arithmetic by hand each time.</li></ul>
            TXT],
            ['title' => 'What else is worth knowing?', 'html' => <<<'TXT'
            <ul><li> Switching to a neighbouring option is the quickest way to see how much that factor matters.</li><li>Some options are backed by reference tables that ship with the page, so the values are fixed data rather than a live lookup.</li></ul>
            TXT],
            ['title' => 'Which calculators go with this one?', 'html' => <<<'TXT'
            <p>If this one is part of a bigger problem, these everyday life calculators cover the neighbouring steps: <a href="/everyday-life/us-uk-shoe-size">US to UK shoe size converter</a>, <a href="/everyday-life/vacation-countdown">Vacation countdown</a> and <a href="/everyday-life/wedding-countdown">Wedding countdown</a>.</p>
            TXT],
            ['title' => 'Writing an amount clearly in words', 'html' => <<<'TXT'
            <p>This tool converts a numeric amount into a written form using the currency and custom wording options available on the page. Start by entering the amount exactly as it appears in your source, then select the currency that belongs with it. The words are useful for checking a draft, preparing a note or understanding how an amount may be expressed, but the correct convention can depend on the document, jurisdiction and organization. For a cheque, contract, tax filing or legal instrument, follow the required wording and have the final document reviewed by the responsible party.</p>
            <p>Pay attention to the decimal portion. A value such as 14.25 contains a whole-unit amount and a fractional part; the currency setting determines how the fractional unit is named. Do not assume every currency uses “cents,” two decimal places or the same minor-unit name. Some currencies have different subdivisions or precision rules. The converter can only apply the choices and assumptions built into this page, so verify that the selected currency matches the transaction.</p>
            <p>Custom currency fields allow wording that is not represented by a standard preset, but they make spelling and pluralization your responsibility. Check singular and plural forms, capitalization and whether the minor unit is named consistently. If the output is intended for a formal record, compare it with your organization’s style guide. A number-to-words conversion cannot decide which legal phrasing is valid in your country or contract.</p>
            <p>Before relying on the result, compare it with the digits. Read the numerical amount aloud, check the decimal separator and confirm that no thousands separator has been mistaken for a decimal mark. Different regions use commas and periods differently in written numbers. The calculator expects a specific input format; if the amount is large or includes punctuation, remove ambiguity by entering it in the page’s accepted format and checking the interpreted value.</p>
            <p>For bookkeeping, retain both forms together so another person can reconcile them. This is especially helpful for amounts with many digits or recurring decimals. If your policy rounds to the nearest minor unit, apply that rule before converting and keep a record of the rounded numeric value. The written output should correspond to the amount that will actually be paid, not to a value before fees, exchange rates or adjustments.</p>
            <p>Use the output as a proofreading aid rather than an authority on financial documentation. Verify currency, decimal interpretation, custom unit names and the required style for the destination. A mismatch between the digits and the words should be resolved before signing, submitting or sending the document. This page helps express an amount; it does not verify the transaction, exchange rate, tax treatment or legal sufficiency of the wording.</p>
            TXT],
            ['title' => 'Proofread both the numeric and written amounts', 'html' => <<<'TXT'
            <p>For formal use, compare the words with the original digits one group at a time: thousands, hundreds, tens and the fractional portion. Confirm that the decimal component has not been dropped or interpreted as a grouping mark. If the document requires a particular phrase such as “and no/100,” check the instructions for that document rather than assuming the calculator supplies it.</p><p>Also verify the currency name and unit forms. The same numeric amount can be expressed differently across currencies and regional conventions, and custom wording may contain spelling errors even when the number itself is parsed correctly. A second person’s review is worthwhile for a payment or signed record.</p>
            TXT],
            ['title' => 'Currency conventions can change the wording', 'html' => <<<'TXT'
            <p>Currency names and minor-unit terms vary by language and region, and many financial documents prescribe a particular style. The same decimal can be written as cents, pence or another subdivision depending on the selected currency. Some styles use “and” between whole and fractional amounts; others do not. This converter follows its available settings, so review the final wording against the destination document’s convention.</p><p>If the document is for an international payment, do not rely on words alone to identify the currency. Keep the three-letter currency code or other required identifier with the digits where appropriate. The written amount supplements the numeric amount; it does not establish an exchange rate or confirm which currency a contract requires.</p>
            TXT],
            ['title' => 'Make the written amount match the payment amount', 'html' => <<<'TXT'
            <p>Before sending a document, compare the written text with the final payable amount after any agreed adjustments. Fees, discounts or exchange calculations should be settled in the numeric amount first, then converted. If the result is being copied into a cheque or form with its own layout, follow that form’s instructions about punctuation, capitalization and how to show an unused fractional part.</p><p>Keep a copy of the exact digits used for the conversion. That small record makes later reconciliation easier if the amount is questioned.</p>
            TXT],
            ['title' => 'Check that separators were read as intended', 'html' => <<<'TXT'
            <p>Pay special attention to amounts copied from spreadsheets or international invoices. A comma can mark a decimal in one convention and a thousands group in another. Re-enter the amount in the calculator’s expected format and confirm that the displayed interpretation matches the source before using the words.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'How do I convert an amount to words?', 'a' => 'Enter the amount, select the currency or provide a custom currency name, and review the generated whole-number and decimal wording before copying it.'],
            ['q' => 'How are decimal places handled?', 'a' => 'The calculator uses the decimal digits and currency settings shown on the page to form the result. Check the displayed decimal and whole-number outputs against the amount you intended to write.'],
            ['q' => 'Can I use the wording on a financial document?', 'a' => 'Treat it as a drafting aid. Check the amount, currency name and required legal wording yourself; document rules and conventions can vary by country and institution.'],
        ],
        'related' => [
            ['path' => '/everyday-life/us-uk-shoe-size', 'name' => 'US to UK shoe size converter'],
            ['path' => '/everyday-life/vacation-countdown', 'name' => 'Vacation countdown'],
            ['path' => '/everyday-life/wedding-countdown', 'name' => 'Wedding countdown'],
        ],
    ],
];
