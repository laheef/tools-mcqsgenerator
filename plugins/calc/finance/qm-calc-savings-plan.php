<?php

/**
 * Savings plan
 * /finance/savings-plan
 *
 * One calculator, one file. Edit the form, the formulas or the
 * article here; the page is rebuilt from this file on the next
 * request. See docs/calc-files.md for the format.
 */

return [
    'name' => 'Savings plan',
    'meta' => ['title' => 'Savings plan Calculator — Formula, Units & Example', 'description' => 'Savings plan works out final balance and deposit in each period and reports both. Each figure is computed from the boxes you fill, never read from a table.', 'h1' => 'Savings plan Calculator', 'updated' => '2026-09-02'],
    'sections' => [
        [
            'title' => 'Your savings plan\'s target',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'myPlan',
                            'label' => 'I\'d like to make a ...',
                            'type' => 'select',
                            'options' => ['daily savings plan' => '1', 'weekly savings plan' => '2', 'bi-weekly savings plan' => '3', 'monthly savings plan' => '4'],
                            'dataset' => 'Plan',
                            'control' => 'DROPDOWN',
                            'default' => 'weekly savings plan',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Days',
                            'label' => 'Planning for...',
                            'type' => 'number',
                            'suffix' => 'days',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '100',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Weeks',
                            'label' => 'Planning for...',
                            'type' => 'number',
                            'suffix' => 'weeks',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '52',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Months',
                            'label' => 'Planning for...',
                            'type' => 'number',
                            'suffix' => 'months',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '6',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Years',
                            'label' => 'Planning for...',
                            'type' => 'number',
                            'suffix' => 'years',
                            'rounding' => ['omni', '0.0001'],
                            'default' => '10',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Mode',
                            'label' => 'I\'d like to plan with a...',
                            'type' => 'select',
                            'options' => ['fixed or growing deposit' => '1', 'given final balance' => '2'],
                            'dataset' => 'Mode',
                            'default' => 'fixed or growing deposit',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'FinBal',
                            'label' => 'My savings plan\'s target',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '10000',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'PerDep',
                            'label' => 'I\'m planning to put aside...',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '100',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'DepAdd',
                            'label' => 'Repeatedly increased by...',
                            'type' => 'number',
                            'help' => 'You can also set a negative value here if you would like to decrease the saving amount periodically.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '0',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [],
        ],
        [
            'title' => 'Hidden',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'savingsPlan',
                            'label' => 'Savings plan',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'headingPeriodText',
                            'label' => 'headingPeriodText',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'countPeriodText',
                            'label' => 'countPeriodText',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'colPeriodText',
                            'label' => 'colPeriodText',
                            'type' => 'result',
                            'help' => 'Use this field if you already have some savings.',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                            'default' => '0',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarMode',
                            'label' => 'Var mode',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarRep',
                            'label' => 'Var rep',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'VarPlan',
                            'label' => 'Var plan',
                            'type' => 'result',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'DepFirst',
                            'label' => 'Dep first',
                            'type' => 'number',
                            'rounding' => ['omni', '0.0001'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalBalance',
                            'label' => 'Final balance',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'initialDeposit',
                            'label' => 'Initial deposit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periodicDeposit',
                            'label' => 'Periodic deposit',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Dep1',
                            'label' => 'Deposit #1',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '100',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Dep2',
                            'label' => 'Deposit #2',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '200',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Dep3',
                            'label' => 'Deposit #3',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '300',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Dep4',
                            'label' => 'Deposit #4',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '400',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Dep5',
                            'label' => 'Deposit #5',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '500',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Dep6',
                            'label' => 'Deposit #6',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '600',
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'Dep7',
                            'label' => 'Deposit #7',
                            'type' => 'number',
                            'unit' => '663',
                            'unit_default' => 'USD',
                            'rounding' => ['standard', '2'],
                            'default' => '700',
                        ],
                    ],
                ],
            ],
        ],
        [
            'title' => 'Results',
            'note' => '',
            'blocks' => [
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'finalBalance',
                            'label' => 'Final balance',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'periodicDeposit',
                            'label' => 'Deposit in each period',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                            'min' => 2,
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'deposit_count',
                            'label' => 'Number of deposits',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'total_deposited',
                            'label' => 'Total put aside',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '2'],
                        ],
                    ],
                ],
                [
                    'columns' => 1,
                    'fields' => [
                        [
                            'name' => 'plan_length',
                            'label' => 'Planning period, days',
                            'type' => 'number',
                            'readonly' => true,
                            'rounding' => ['standard', '0'],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'formula' => [
        [
            'title' => 'savingsPlan = getSavingsPlan(FinBal,PerDep,VarRep,VarPlan,VarMode,Days,Weeks,Months,DepAdd,Dep1,Dep2,Dep3,Dep4,Dep5,Dep6,Dep7)',
            'results' => ['savingsPlan' => 'getSavingsPlan(FinBal, PerDep, VarRep, VarPlan, VarMode, Days, Weeks, Months, DepAdd, Dep1, Dep2, Dep3, Dep4, Dep5, Dep6, Dep7)'],
        ],
        [
            'title' => 'finalBalance = getFinalBalance(savingsPlan)',
            'results' => ['finalBalance' => 'getFinalBalance(getSavingsPlan(FinBal, PerDep, VarRep, VarPlan, VarMode, Days, Weeks, Months, DepAdd, Dep1, Dep2, Dep3, Dep4, Dep5, Dep6, Dep7))'],
        ],
        [
            'title' => 'periodicDeposit = getPeriodicDeposit(savingsPlan)',
            'results' => ['periodicDeposit' => 'getPeriodicDeposit(getSavingsPlan(FinBal, PerDep, VarRep, VarPlan, VarMode, Days, Weeks, Months, DepAdd, Dep1, Dep2, Dep3, Dep4, Dep5, Dep6, Dep7))'],
        ],
        [
            'title' => 'initialDeposit = getInitialDeposit(savingsPlan)',
            'results' => ['initialDeposit' => 'getInitialDeposit(getSavingsPlan(FinBal, PerDep, VarRep, VarPlan, VarMode, Days, Weeks, Months, DepAdd, Dep1, Dep2, Dep3, Dep4, Dep5, Dep6, Dep7))'],
        ],
        [
            'title' => 'DepFirst = getDebtFirst(savingsPlan)',
            'results' => ['DepFirst' => 'getDebtFirst(getSavingsPlan(FinBal, PerDep, VarRep, VarPlan, VarMode, Days, Weeks, Months, DepAdd, Dep1, Dep2, Dep3, Dep4, Dep5, Dep6, Dep7))'],
        ],
    ],
    'js' => <<<'TXT'
    "use strict";var finalBalance=0;var periodicDeposit=0;var initialDeposit=0;var DepFirst=0;omni.define("getSavingsPlan",function(_FinBal,_PerDep,_VarRep,_VarPlan,_VarMode,_Days,_Weeks,_Months,_DepAdd,_Dep1,_Dep2,_Dep3,_Dep4,_Dep5,_Dep6,_Dep7){var FinBal=Number(_FinBal);var PerDep=Number(_PerDep);var VarRep=Number(_VarRep);var VarPlan=Number(_VarPlan);var VarMode=Number(_VarMode);var Days=Number(_Days);var Weeks=Number(_Weeks);var Months=Number(_Months);var DepAdd=Number(_DepAdd);var Dep1=Number(_Dep1);var Dep2=Number(_Dep2);var Dep3=Number(_Dep3);var Dep4=Number(_Dep4);var Dep5=Number(_Dep5);var Dep6=Number(_Dep6);var Dep7=Number(_Dep7);var q=VarPlan;var periods;if(VarPlan===365){periods=Days}else if(VarPlan===52){periods=Weeks}else if(VarPlan===26){periods=Weeks/2}else if(VarPlan===12){periods=Months}var FinBalRound=VarMode===2?FinBal:0;var DepBalHalf=0;var noDep=0;if(VarPlan===365){noDep=7}else if(VarPlan!==365&&VarPlan!==12){noDep=4}else if(VarPlan===12){noDep=3}var periodHalf=mathjs.floor(periods/2);if(periods%2!==0){periodHalf=periodHalf+1}var SeqSum=(periodHalf-1)/2*(1+(periodHalf-1));var count=mathjs.floor(periodHalf/noDep);if(VarMode===1){DepBalHalf=periodHalf*PerDep+SeqSum*DepAdd}DepFirst=0;if(VarMode===2){var Seq=(periods-1)/2*(1+(periods-1));var DepBalEq=FinBal;PerDep=(DepBalEq-Seq*DepAdd)/periods;DepFirst=PerDep;DepBalHalf=periodHalf*PerDep+SeqSum*DepAdd}if(VarMode===3){var halfRem=periodHalf%noDep;var countDep1=halfRem>0?count+1:count;var countDep2=halfRem>1?count+1:count;var countDep3=halfRem>2?count+1:count;var countDep4=halfRem>3?count+1:count;var countDep5=halfRem>4?count+1:count;var countDep6=halfRem>5?count+1:count;if(VarPlan!==365&&VarPlan!==12){DepBalHalf=countDep1*Dep1+countDep2*Dep2+countDep3*Dep3+count*Dep4}if(VarPlan===365){DepBalHalf=countDep1*Dep1+countDep2*Dep2+countDep3*Dep3+countDep4*Dep4+countDep5*Dep5+countDep6*Dep6+count*Dep7}if(VarPlan===12){DepBalHalf=countDep1*Dep1+countDep2*Dep2+count*Dep3}}var PerDep2=0;var DepBal2sum=0;var periodsChart=periodHalf;var DepBalPart1=0;var i2=periodHalf-1;for(var i=0;i<=periodsChart;i++){i2+=1;if(i>0){if(VarMode===3){if(q===365){if(i%7===1){PerDep=Dep1}if(i%7===2){PerDep=Dep2}if(i%7===3){PerDep=Dep3}if(i%7===4){PerDep=Dep4}if(i%7===5){PerDep=Dep5}if(i%7===6){PerDep=Dep6}if(i%7===0){PerDep=Dep7}}if(q!==365&&q!==12){if(i%4===1){PerDep=Dep1}if(i%4===2){PerDep=Dep2}if(i%4===3){PerDep=Dep3}if(i%4===0){PerDep=Dep4}}if(q===12){if(i%3===1){PerDep=Dep1}if(i%3===2){PerDep=Dep2}if(i%3===0){PerDep=Dep3}}if(q===365){if(i2%7===1){PerDep2=Dep1}if(i2%7===2){PerDep2=Dep2}if(i2%7===3){PerDep2=Dep3}if(i2%7===4){PerDep2=Dep4}if(i2%7===5){PerDep2=Dep5}if(i2%7===6){PerDep2=Dep6}if(i2%7===0){PerDep2=Dep7}}if(q!==365&&q!==12){if(i2%4===1){PerDep2=Dep1}if(i2%4===2){PerDep2=Dep2}if(i2%4===3){PerDep2=Dep3}if(i2%4===0){PerDep2=Dep4}}if(q===12){if(i2%3===1){PerDep2=Dep1}if(i2%3===2){PerDep2=Dep2}if(i2%3===0){PerDep2=Dep3}}}if(VarMode<3&&i>1){PerDep=PerDep+DepAdd}if(VarMode<3){PerDep2=PerDep+periodHalf*DepAdd}if(i2>periods){PerDep2=0}DepBal2sum+=PerDep2;FinBal=DepBalHalf+DepBal2sum;if(FinBalRound>9999||DepBalPart1>9999){DepBalPart1=mathjs.round(PerDep,0)}else{DepBalPart1=mathjs.round(PerDep,2)}if(i<=periods){}}}var hide=0;if(DepFirst<=0&&VarMode===2&&DepAdd>0){hide=1}if(mathjs.abs(FinBal)<100000){if((VarRep===2||VarRep===3)&&hide===0){}}for(var _i=0;_i<=periods;_i++){if(_i>0){if(VarMode===3){if(q===365){if(_i%7===1){PerDep=Dep1}if(_i%7===2){PerDep=Dep2}if(_i%7===3){PerDep=Dep3}if(_i%7===4){PerDep=Dep4}if(_i%7===5){PerDep=Dep5}if(_i%7===6){PerDep=Dep6}if(_i%7===0){PerDep=Dep7}}if(q!==365&&q!==12){if(_i%4===1){PerDep=Dep1}if(_i%4===2){PerDep=Dep2}if(_i%4===3){PerDep=Dep3}if(_i%4===0){PerDep=Dep4}}if(q===12){if(_i%3===1){PerDep=Dep1}if(_i%3===2){PerDep=Dep2}if(_i%3===0){PerDep=Dep3}}}if(VarMode<3&&_i>1){PerDep=PerDep+DepAdd}}}if(VarMode===1||VarMode===3){finalBalance=mathjs.round(DepBalHalf+DepBal2sum,2)}if(VarMode===2&&DepAdd===0){periodicDeposit=mathjs.round(DepFirst,2)}if(DepFirst>0&&VarMode===2&&DepAdd>0){initialDeposit=mathjs.round(DepFirst,2)}if(DepFirst<=0&&VarMode===2&&DepAdd>0){}return 1});omni.define("getFinalBalance",function(savingsPlan){if(savingsPlan==1){return finalBalance}});omni.define("getPeriodicDeposit",function(savingsPlan){if(savingsPlan==1){return periodicDeposit}});omni.define("getInitialDeposit",function(savingsPlan){if(savingsPlan==1){return initialDeposit}});omni.define("getDebtFirst",function(savingsPlan){if(savingsPlan==1){return DepFirst}});//# sourceURL=customJs.js
    /*
     * Shared helpers for the hand-written repairs in data/calc/supplement/.
     *
     * Every supplement script is evaluated in its own closed scope, so anything the
     * repairs have in common has to travel with each one. Supplement::apply()
     * prepends this file to every page script it merges.
     */
    
    /**
     * The numbers in one free-text box: "1, 2, 3", "1 2 3", "1;2;3" or one per line.
     *
     * A statistics page that asked for fifty separate boxes now asks for one, and
     * the visitor types a list the way they would in a spreadsheet cell. Anything
     * that is not a number is ignored rather than turned into NaN — a stray comma
     * or an accidental letter must not poison the whole set.
     */
    function snumlist(text) {
      if (typeof text !== 'string' || text.trim() === '') return [];
      var out = [];
      text.split(/[\s,;]+/).forEach(function (piece) {
        if (piece === '') return;
        var n = Number(piece.replace(/(\d),(?=\d{3}\b)/g, '$1'));
        if (isFinite(n)) out.push(n);
      });
      return out;
    }
    
    /** Median of an already sorted array of numbers. */
    function smedian(sorted) {
      var n = sorted.length;
      if (!n) return NaN;
      var mid = Math.floor(n / 2);
      return n % 2 ? sorted[mid] : (sorted[mid - 1] + sorted[mid]) / 2;
    }
    
    /** The numbers a visitor actually typed, in field order, skipping blanks. */
    function snumbers(values, pattern, limit) {
      var out = [];
      for (var i = 1; i <= limit; i++) {
        var key = pattern.replace('%d', i);
        var raw = values[key];
        if (raw === undefined || raw === null || raw === '') continue;
        var n = Number(raw);
        if (!isFinite(n)) continue;
        out.push({ key: key, n: n });
      }
      return out;
    }
    
    /** A plain number, no trailing zeros, at most `d` decimals. */
    function snum(n, d) {
      if (!isFinite(n)) return '—';
      var v = Number(n.toFixed(d === undefined ? 4 : d));
      return String(v);
    }
    
    /** Round to `d` decimals but keep it a number. */
    function sround(n, d) {
      var f = Math.pow(10, d === undefined ? 2 : d);
      return Math.round(n * f) / f;
    }
    
    /** Greatest common divisor of two whole numbers. */
    function sgcd(x, y) {
      x = Math.abs(Math.round(x));
      y = Math.abs(Math.round(y));
      return y === 0 ? x : sgcd(y, x % y);
    }
    
    /** "10" / "1/3" — a fraction reduced to lowest terms. */
    function sfrac(part, whole) {
      if (!whole) return '—';
      var a = Math.round(part), b = Math.round(whole);
      var g = sgcd(a, b) || 1;
      if (g > 1) { a = a / g; b = b / g; }
      return b === 1 ? String(a) : a + '/' + b;
    }
    
    /** Minimal escape for text that came out of the definition or a label. */
    function sesc(s) {
      return String(s).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    }
    
    /**
     * A table from a header list and rows of cells. Cells are printed as they are
     * given, so a caller can pass a pre-formatted string.
     */
    function stable(head, rows, foot) {
      var html = '<table><thead><tr>';
      head.forEach(function (h) { html += '<th>' + h + '</th>'; });
      html += '</tr></thead><tbody>';
      rows.forEach(function (r) {
        html += '<tr>';
        r.forEach(function (c) { html += '<td>' + c + '</td>'; });
        html += '</tr>';
      });
      if (foot) {
        html += '<tr>';
        foot.forEach(function (c) { html += '<th>' + c + '</th>'; });
        html += '</tr>';
      }
      return html + '</tbody></table>';
    }
    
    /** Turn a list of [label, value] pairs into "A: 3, B: 4" style prose. */
    function slist(pairs) {
      return pairs.map(function (p) { return p[0] + ': ' + p[1]; }).join(', ');
    }
    
    /**
     * Tidy a value a page script published.
     *
     * The harvested scripts speak the reference site's front-end dialect: `==2==`
     * for a subscript, `**bold**`, `<br>` between lines, and often a trailing
     * comma or a dangling colon left where a second half of a sentence used to
     * follow. Our panel prints the string as plain text, so those markers would
     * land on screen as punctuation soup. This turns them into something readable
     * without changing the value itself.
     */
    function sclean(value) {
      var s = value === null || value === undefined ? '' : String(value);
      var sub = {'0': '₀', '1': '₁', '2': '₂', '3': '₃', '4': '₄',
                 '5': '₅', '6': '₆', '7': '₇', '8': '₈', '9': '₉'};
      s = s.replace(/==(\d+)==/g, function (all, d) {
        return d.split('').map(function (c) { return sub[c] || c; }).join('');
      });
      /* the same convention for superscripts: "^^+^^" is a charge, "^^2^^" an index */
      var sup = {'0': '⁰', '1': '¹', '2': '²', '3': '³', '4': '⁴',
                 '5': '⁵', '6': '⁶', '7': '⁷', '8': '⁸', '9': '⁹',
                 '+': '⁺', '-': '⁻'};
      s = s.replace(/\^\^([0-9+-]+)\^\^/g, function (all, d) {
        return d.split('').map(function (c) { return sup[c] || c; }).join('');
      });
      s = s.replace(/\*\*(.+?)\*\*/g, '$1');
      s = s.replace(/<br\s*\/?>/gi, ' ');
      s = s.replace(/<\/(p|div|li)>/gi, ' ');
      s = s.replace(/<[^>]+>/g, '');
      s = s.replace(/&nbsp;/g, ' ').replace(/&lt;/g, '<').replace(/&gt;/g, '>').replace(/&amp;/g, '&');
      /* invisible characters the reference used as "this line is blank": an Arabic
         letter mark, a zero-width space, a byte-order mark. They render as nothing
         and would otherwise keep an empty row looking filled. */
      s = s.replace(/[\u061C\u200B\u200C\u200D\uFEFF\u00AD]/g, '');
      s = s.replace(/\s+/g, ' ').trim();
      s = s.replace(/[,;:\-–—]\s*$/, '').trim();
      return s;
    }
    
    /**
     * Turn a drop-down option's id back into its label.
     *
     * Several harvested scripts publish `ctx.getRawInput("…")` of a select, which
     * is the option's uid (`z3nTqAbVhlMSz-B46c7Xk`) and not the words the visitor
     * picked. The uid is in the page markup as an option value or a radio value,
     * so the label is one lookup away.
     */
    function sdelabel(value) {
      if (typeof value !== 'string' || !/[A-Za-z0-9_-]{20,28}/.test(value)) { return value; }
      var one = function (id) {
        if (!/^[A-Za-z0-9_-]{20,28}$/.test(id)) { return id; }
        var el = document.querySelector('[value="' + id + '"]');
        if (!el) { return id; }
        if (el.tagName === 'OPTION') { return (el.textContent || '').trim() || id; }
        var lab = el.closest ? el.closest('label') : null;
        return lab ? ((lab.textContent || '').trim() || id) : id;
      };
      /* a published value can be several ids joined by commas ("Possibilities,
         MD4, NTLM"), so map each piece rather than the whole string */
      return value.split(/\s*,\s*/).map(one).join(', ');
    }
    
    omni.onResult(['myPlan', 'Mode'], function (ctx, values) {
      var plan = Number(values.myPlan);          /* 1 daily … 4 monthly */
      var mode = Number(values.Mode);            /* 1 fixed/growing, 2 given balance */
      var days = Number(values.Days || 0), weeks = Number(values.Weeks || 0);
      var months = Number(values.Months || 0), years = Number(values.Years || 0);
      var target = Number(values.FinBal || 0), deposit = Number(values.PerDep || 0);
      var rise = Number(values.DepAdd || 0);
    
      if (!plan) {
        ctx.addUnmetCondition('Choose a savings plan: daily, weekly, bi-weekly or monthly.');
        return;
      }
      if (!mode) {
        ctx.addUnmetCondition('Choose how you want to plan: with a fixed deposit, or towards a given final balance.');
        return;
      }
      var totalDays = days + weeks * 7 + months * 30.4375 + years * 365.25;
      if (!(totalDays > 0)) {
        ctx.addUnmetCondition('Say how long you are planning for — days, weeks, months or years.');
        return;
      }
      var per = plan === 1 ? 1 : plan === 2 ? 7 : plan === 3 ? 14 : 30.4375;
      var n = Math.floor(totalDays / per);
      if (n < 1) {
        ctx.addUnmetCondition('That planning period is shorter than one deposit period.');
        return;
      }
      var growth = rise * n * (n - 1) / 2;
      var final, each;
      if (mode === 1) {
        if (!(deposit > 0)) {
          ctx.addUnmetCondition('Enter how much you are putting aside in each period.');
          return;
        }
        final = n * deposit + growth;
        each = deposit;
      } else {
        if (!(target > 0)) {
          ctx.addUnmetCondition('Enter the final balance you are aiming for.');
          return;
        }
        each = (target - growth) / n;
        if (!(each > 0)) {
          ctx.addUnmetCondition('The deposit growth alone overshoots that final balance — lower the increase or raise the target.');
          return;
        }
        final = target;
      }
      ctx.exportValue('finalBalance', sround(final, 2));
      ctx.exportValue('periodicDeposit', sround(each, 2));
      ctx.exportValue('deposit_count', n);
      ctx.exportValue('total_deposited', sround(n * each + growth, 2));
      ctx.exportValue('plan_length', Math.round(totalDays));
    
      var unit = plan === 1 ? 'day' : plan === 2 ? 'week' : plan === 3 ? 'two weeks' : 'month';
      ctx.addHtml('<p><strong>' + (mode === 1
        ? snum(each, 2) + ' every ' + unit + ' for ' + n + ' deposits comes to ' + snum(final, 2) + '.'
        : 'To have ' + snum(target, 2) + ' you need ' + snum(each, 2) + ' every ' + unit + ' for ' + n + ' deposits.')
        + '</strong></p>');
      ctx.addHtml(stable(['Item', 'Value'], [
        ['Planning period', Math.round(totalDays) + ' days'],
        ['Deposit period', 'every ' + unit],
        ['Number of deposits', String(n)],
        ['Deposit in the first period', snum(each, 2)],
        ['Deposit in the last period', snum(each + rise * (n - 1), 2)],
        ['Increase per period', snum(rise, 2)],
        ['Total put aside', snum(n * each + growth, 2)],
        ['Final balance', snum(final, 2)]
      ]));
      ctx.addHtml('<p class="calc-note">This is a plan, not a savings account: there is no interest rate on the page, '
        + 'so nothing here is compounded and the final balance is simply what you put in. The period you plan in '
        + '(daily, weekly, bi-weekly, monthly) decides how many deposits there are — a month counts as 30.4375 days, '
        + 'the average over the Gregorian year, and a part-period at the end is dropped because you cannot make '
        + 'half a deposit. "Repeatedly increased by" raises each deposit by that amount over the one before it.</p>');
    });
    TXT,
    'article' => [
        'intro' => <<<'TXT'
        Enter I'd like to make a …, Planning for… and Planning for… into Savings plan and the answer comes back as Final balance and Deposit in each period. It is a single relationship that reads final balance out of i'd like to make a …, not a table of canned results keyed by them.
        TXT,
        'sections' => [
            ['title' => 'How the Savings plan calculator works', 'html' => <<<'TXT'
            <p>The Savings plan calculator applies one relationship to 9 numbers and reports Final balance, Deposit in each period and Number of deposits.</p><p>What comes back is Final balance, Deposit in each period, Number of deposits and Total put aside — each answer is a box on the form, so you read it beside the numbers that produced it.</p>
            TXT],
            ['title' => 'What to enter, and what comes back', 'html' => <<<'TXT'
            <p>There are 9 boxes to fill in; every one of them is used by the formula.</p><ul><li><strong>I&#039;d like to make a …</strong> — a plain number, no unit</li><li><strong>Planning for…</strong> — in days</li><li><strong>Planning for…</strong> — in weeks</li><li><strong>Planning for…</strong> — in months</li><li><strong>Planning for…</strong> — in years</li><li><strong>I&#039;d like to plan with a…</strong> — a plain number, no unit</li><li><strong>My savings plan&#039;s target</strong> — in USD</li><li><strong>I&#039;m planning to put aside…</strong> — in USD</li><li><strong>Repeatedly increased by…</strong> — in USD. You can also set a negative value here if you would like to decrease the saving amount periodically.</li></ul><p>The answers come back as Final balance, Deposit in each period, Number of deposits, Total put aside, Planning period, days. Those boxes are written by the page, not by you, so there is nothing to submit.</p>
            TXT],
            ['title' => 'A worked example with numbers from this page', 'html' => <<<'TXT'
            <p>Run the numbers the page opens with — I&amp;#039;d like to make a … = 2, Planning for… = 100 days, Planning for… = 52 weeks, Planning for… = 6 months, Planning for… = 10 years, I&amp;#039;d like to plan with a… = 1, My savings plan&amp;#039;s target = 10000 USD, I&amp;#039;m planning to put aside… = 100 USD and Repeatedly increased by… = 9 USD — through the same formula and the panel reports <strong>colPeriodText</strong> = 0, <strong>Deposit #1</strong> = 100, <strong>Deposit #2</strong> = 200, <strong>Deposit #3</strong> = 300, <strong>Deposit #4</strong> = 400, <strong>Deposit #5</strong> = 500, <strong>Deposit #6</strong> = 600 and <strong>Deposit #7</strong> = 700.</p><ul><li><strong>colPeriodText</strong> = 0</li><li><strong>Deposit #1</strong> = 100</li><li><strong>Deposit #2</strong> = 200</li><li><strong>Deposit #3</strong> = 300</li><li><strong>Deposit #4</strong> = 400</li><li><strong>Deposit #5</strong> = 500</li><li><strong>Deposit #6</strong> = 600</li><li><strong>Deposit #7</strong> = 700</li></ul>
            TXT],
            ['title' => 'Reading the answer', 'html' => <<<'TXT'
            <p>A sanity check costs one glance: the page&#039;s defaults give <strong>colPeriodText</strong> = 0, <strong>Deposit #1</strong> = 100, <strong>Deposit #2</strong> = 200, <strong>Deposit #3</strong> = 300, <strong>Deposit #4</strong> = 400, <strong>Deposit #5</strong> = 500, <strong>Deposit #6</strong> = 600 and <strong>Deposit #7</strong> = 700. An answer far from that is more often a unit entered on the wrong row than a formula that has stopped working.</p><p>As far as Final balance is concerned the numbers are unitless — it neither converts nor guesses a unit, so enter every value in the same scale you intend to read the answer in.</p>
            TXT],
            ['title' => 'The formula, and what turns it round', 'html' => <<<'TXT'
            <p>Below is the arithmetic in full. Every symbol on the right of an equals sign is one of the boxes on the form.</p><ul></ul><p>The rearrangements, with the case each one is for — the line the page picked is the one whose left-hand side was the empty box:</p><ul></ul><p>Any one of Savings plan, Final balance and Deposit in each period can be left empty: the page checks which box is blank and rearranges the relationship for it, which is why it converts as well as it calculates.</p>
            TXT],
            ['title' => 'Checking an answer by hand', 'html' => <<<'TXT'
            <p>Take the example above and double I&#039;d like to make a ... from 2 to 4, leaving every other box alone. The panel moves from <strong>colPeriodText</strong> 0, <strong>Deposit #1</strong> 100, <strong>Deposit #2</strong> 200, <strong>Deposit #3</strong> 300, <strong>Deposit #4</strong> 400, <strong>Deposit #5</strong> 500, <strong>Deposit #6</strong> 600 and <strong>Deposit #7</strong> 700 to <strong>colPeriodText</strong> 0, <strong>Deposit #1</strong> 100, <strong>Deposit #2</strong> 200, <strong>Deposit #3</strong> 300, <strong>Deposit #4</strong> 400, <strong>Deposit #5</strong> 500, <strong>Deposit #6</strong> 600 and <strong>Deposit #7</strong> 700.</p><p>Repeating that one input at a time is how a spreadsheet model of the same calculation gets audited. The direction of each move tells you whether a box sits in the numerator or the denominator, and how sensitive the answer is to it.</p>
            TXT],
            ['title' => 'Where the numbers usually go wrong', 'html' => <<<'TXT'
            <ul><li><strong>The answer typed back in.</strong> Final balance, Deposit in each period and Number of deposits are results, and each can be typed into. Putting a past answer back into one of them turns the calculation round and solves for whichever box is then empty — useful, but only if that is what you meant to do.</li><li><strong>I&#039;d like to make a … left as a guess.</strong> Anything typed into I&amp;#039;d like to make a … is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Planning for… left as a guess.</strong> Anything typed into Planning for… is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Planning for… left as a guess.</strong> Anything typed into Planning for… is treated as measured. The page has no way to flag an estimate, and the answer will read exactly as confidently either way.</li><li><strong>Measurements mixed across scales.</strong> Two numbers measured in different units, or one taken at the start of a season and one at the end, are the commonest source of an answer that is internally consistent and still wrong. Convert I&#039;d like to make a ... to one scale before entering anything.</li></ul>
            TXT],
            ['title' => 'What each box means', 'html' => <<<'TXT'
            <p>The boxes on the Savings plan form, one at a time: what each one wants, how it is measured, and what the page does if you leave it empty.</p><ul><li><strong>I&#039;d like to make a …</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — I&#039;d like to make a … is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Planning for…</strong> is measured in days. It feeds Savings plan, Final balance and Deposit in each period. Fill it from a measurement rather than a memory — Planning for… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Planning for…</strong> is measured in weeks. It feeds Savings plan, Final balance and Deposit in each period. Fill it from a measurement rather than a memory — Planning for… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Planning for…</strong> is measured in months. It feeds Savings plan, Final balance and Deposit in each period. Fill it from a measurement rather than a memory — Planning for… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Planning for…</strong> is measured in years. Fill it from a measurement rather than a memory — Planning for… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>I&#039;d like to plan with a…</strong> takes a plain number with no unit attached. This one is a choice rather than a measurement: pick the option that matches your case, because the page applies a different relationship for each. Fill it from a measurement rather than a memory — I&#039;d like to plan with a… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>My savings plan&#039;s target</strong> takes a plain number with no unit attached. It feeds Savings plan, Final balance and Deposit in each period. Fill it from a measurement rather than a memory — My savings plan&#039;s target is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>I&#039;m planning to put aside…</strong> takes a plain number with no unit attached. It feeds Savings plan, Final balance and Deposit in each period. Fill it from a measurement rather than a memory — I&#039;m planning to put aside… is the kind of value that gets estimated once and then copied from page to page for years.</li><li><strong>Repeatedly increased by…</strong> takes a plain number with no unit attached. You can also set a negative value here if you would like to decrease the saving amount periodically. It feeds Savings plan, Final balance and Deposit in each period. Fill it from a measurement rather than a memory — Repeatedly increased by… is the kind of value that gets estimated once and then copied from page to page for years.</li></ul><p>Every one of those boxes is optional in a sense: fill all but one and the page solves for the one you left. It is only when two are blank that the page has nothing to choose between.</p>
            TXT],
            ['title' => 'What each result tells you', 'html' => <<<'TXT'
            <p>The panel reports 5 values. Here is what each one is for, and what to compare it against.</p><ul><li><strong>Final balance</strong> is a plain number. The value follows from My savings plan's target, I'm planning to put aside…, Var rep and Var plan. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Deposit in each period</strong> is a plain number. The value follows from My savings plan's target, I'm planning to put aside…, Var rep and Var plan. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Number of deposits</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Total put aside</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li><li><strong>Planning period, days</strong> is a plain number. The page computes it from the form as a whole rather than from one line of the formula. Compare it with the defaults above before trusting it. A figure far from that range is worth checking against a hand calculation. It is not stored, logged or carried to the next page: change a box and you get a new number, close the tab and it is gone.</li></ul>
            TXT],
            ['title' => 'How much each input moves the answer', 'html' => <<<'TXT'
            <p>A percentage change tells you where the answer is most fragile. Take the defaults this page opens with, raise one box by ten per cent, and re-solve:</p><table class="calc-table"><thead><tr><th>Box</th><th>colPeriodText</th><th>Deposit #1</th><th>Deposit #2</th><th>Deposit #3</th><th>Deposit #4</th><th>Deposit #5</th><th>Deposit #6</th><th>Deposit #7</th></tr></thead><tbody><tr><td><strong>I&#039;d like to make a …</strong> +10%</td><td>—</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Planning for…</strong> +10%</td><td>—</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Planning for…</strong> +10%</td><td>—</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Planning for…</strong> +10%</td><td>—</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Planning for…</strong> +10%</td><td>—</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>I&#039;d like to plan with a…</strong> +10%</td><td>—</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>My savings plan&#039;s target</strong> +10%</td><td>—</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>I&#039;m planning to put aside…</strong> +10%</td><td>—</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr><tr><td><strong>Repeatedly increased by…</strong> +10%</td><td>—</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td><td>+0%</td></tr></tbody></table><p>The steepest column belongs to I&#039;d like to make a …: ten per cent there moves an answer by about 0 per cent, which is why that is the number to measure twice. By contrast, I&#039;d like to make a …, Planning for… and Planning for… barely move the answers at all, so a rough figure there costs you little.</p><p>This is the same arithmetic a spreadsheet model would do, done here with the page&#039;s own formulas. It is worth repeating at your own numbers rather than the defaults: sensitivity is a property of the formula, but the size of the effect depends where on the curve you are.</p>
            TXT],
            ['title' => 'Limits worth knowing', 'html' => <<<'TXT'
            <ul><li><strong>It scales in a straight line.</strong> The relationship behind Final balance is a straight-line one: proportionally more input gives proportionally more output, which is what makes the sensitivity table above a set of constants rather than a curve.</li><li><strong>It is a formula, not a model of your case.</strong> Nothing here corrects for measurement error, correlation between the inputs, or conditions outside the range the relationship was written for. Those are assumptions a reader brings; the arithmetic simply does what it says.</li></ul>
            TXT],
            ['title' => 'Where this calculation comes up', 'html' => <<<'TXT'
            <p>Reach for this page when I&#039;d like to make a …, Planning for… and Planning for… is what you already know and Final balance and Deposit in each period is what you need — the reverse of that situation is what the rearranged form is for.</p><p>It is worth having the calculation written down even when you only need the answer once: an entered figure can be checked, and a remembered one cannot.</p><p>Related work in the same category: <a href="/finance/national-insurance-uk">National insurance UK</a>, <a href="/finance/natural-rate-of-unemployment">Natural rate of unemployment Calculator</a> and <a href="/finance/nav">Net asset value (NAV)</a>.</p>
            TXT],
        ],
        'faq' => [
            ['q' => 'What does the Savings plan calculator work out?', 'a' => <<<'TXT'
            Final balance, Deposit in each period, Number of deposits and Total put aside, from My savings plan's target, I'm planning to put aside…, Var rep and Var plan.
            TXT],
            ['q' => 'Which values do I need before I start?', 'a' => <<<'TXT'
            I'd like to make a …, Planning for… (days), Planning for… (weeks), Planning for… (months), Planning for… (years). Enter i'd like to make a …, planning for… and planning for…; Final balance is the box to leave alone unless it is the value you came for.
            TXT],
            ['q' => 'Can it solve for a different variable?', 'a' => <<<'TXT'
            It can. Leave any of Savings plan, Final balance, Deposit in each period and Initial deposit blank and the page solves for that one instead — nothing has to be switched first.
            TXT],
            ['q' => 'What answer do the default values give?', 'a' => <<<'TXT'
            colPeriodText = 0, Deposit #1 = 100, Deposit #2 = 200, Deposit #3 = 300, Deposit #4 = 400, Deposit #5 = 500, Deposit #6 = 600 and Deposit #7 = 700. That comes from the page's own defaults, entered in I'd like to make a ...; change one of them and the whole set is recomputed.
            TXT],
            ['q' => 'How precise is the result?', 'a' => <<<'TXT'
            The arithmetic runs at full precision and only the display of Final balance is rounded. Rounding twice — once by hand, once by the page — is what makes two answers that should match differ in the last digit.
            TXT],
            ['q' => 'What happens if I leave a box empty?', 'a' => 'The empty box becomes the unknown: leave I\'d like to make a ... blank and the page solves for it, reporting Final balance instead of the usual answer.'],
            ['q' => 'Does it round to the nearest whole number?', 'a' => 'It rounds for display only; the underlying value of Final balance keeps more digits than the panel prints.'],
        ],
        'related' => [
            ['path' => '/finance/national-insurance-uk', 'name' => 'National insurance UK'],
            ['path' => '/finance/natural-rate-of-unemployment', 'name' => 'Natural rate of unemployment Calculator'],
            ['path' => '/finance/nav', 'name' => 'Net asset value (NAV)'],
        ],
        'authors' => [],
    ],
];
