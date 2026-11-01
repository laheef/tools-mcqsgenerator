<?php
/**
 * Boy or girl paradox — the two-child problem, worked out.
 *
 * The harvested page carried a probability picker, a "select or insert" mode and
 * two questions, and then computed nothing. The arithmetic is the one that makes
 * the puzzle famous:
 *
 *   "at least one of two children is a boy"  ->  P(both boys) = p / (2 - p)
 *   "the elder child is a boy"               ->  P(both boys) = p
 *   "at least one boy was born on a Tuesday" ->  P(both boys) = p (2d - 1) / (2d - p)
 *
 * With p = 1/2 those are 1/3, 1/2 and 13/27.
 */
return [
    'hideTexts' => true,
    /*
     * The two "Probability" boxes are the Insert mode. They are hidden while the
     * picker is in use — an empty box that the page demands a value for would stop
     * the calculation for no reason — and chance_2 belongs to the second question,
     * which this page answers from the same three formulas.
     */
    'showIf' => [
        'chance_1' => 'prob_mode == 1',
        'chance_2' => '1 == 0',
    ],
    'vars' => [
        'p_boy' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'answer' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'p_at_least_one' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'p_elder' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'p_with_day' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
    ],
    'groups' => [[
        'uid' => 'supp-paradox-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'p_boy', 'vt' => 'dependent', 'l' => 'Chance a child is a boy']]]],
            ['FR1', [[['t' => 'v', 'n' => 'answer', 'vt' => 'dependent', 'l' => 'Answer to the question you picked (probability both are boys)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'p_at_least_one', 'vt' => 'dependent', 'l' => 'If you only know that at least one is a boy']]]],
            ['FR1', [[['t' => 'v', 'n' => 'p_elder', 'vt' => 'dependent', 'l' => 'If you know the elder child is a boy']]]],
            ['FR1', [[['t' => 'v', 'n' => 'p_with_day', 'vt' => 'dependent', 'l' => 'If at least one is a boy born on a Tuesday']]]],
        ],
    ]],
    'js' => <<<'JS'
var DAYS = 7;   /* "born on a Tuesday" — any one of the seven days does the same job */

omni.onResult(['prob_mode', 'question', 'chance_list_1'], function (ctx, v) {
  /*
   * The form offers the chance of a boy either as a picker of common values or as
   * a box to type it in. The picker is a percentage, the box is a percentage too.
   */
  var mode = Math.round(Number(v.prob_mode));
  var chosen = mode === 1 ? Number(ctx.getRawInput('chance_1')) : Number(v.chance_list_1) * 100;
  if (!isFinite(chosen)) {
    ctx.addUnmetCondition('Choose the chance that a child is a boy.');
    return;
  }
  if (chosen <= 0 || chosen >= 100) {
    ctx.addUnmetCondition('The chance has to be between 0 % and 100 %.');
    return;
  }
  var p = chosen / 100;

  var q = Math.round(Number(v.question)) || 1;

  var atLeastOne = p / (2 - p);
  var elder = p;
  var withDay = p * (2 * DAYS - 1) / (2 * DAYS - p);
  var answer = q === 2 ? elder : atLeastOne;

  ctx.exportValue('p_boy', sround(p, 4));
  ctx.exportValue('answer', sround(answer, 4));
  ctx.exportValue('p_at_least_one', sround(atLeastOne, 4));
  ctx.exportValue('p_elder', sround(elder, 4));
  ctx.exportValue('p_with_day', sround(withDay, 4));

  var pct = function (x) { return snum(x * 100, 2) + ' %'; };
  var which = q === 2 ? 'the elder child is a boy' : 'at least one of the two is a boy';

  ctx.addHtml('<p><strong>You told the calculator that ' + which + '. The probability that both '
    + 'children are boys is ' + pct(answer) + (p < 1 ? ' — ' + sfrac(Math.round(answer * 3600), 3600) : '') + '.</strong></p>');

  var rows = [
    ['Chance a child is a boy', pct(p)],
    ['At least one is a boy &rarr; both boys', pct(atLeastOne)],
    ['The elder is a boy &rarr; both boys', pct(elder)],
    ['At least one boy born on a Tuesday &rarr; both boys', pct(withDay)],
    ['Answer to the question you picked', pct(answer)]
  ];
  ctx.addHtml(stable(['Situation', 'Probability both are boys'], rows));

  var tree = [
    ['boy, boy', p * p], ['boy, girl', p * (1 - p)],
    ['girl, boy', (1 - p) * p], ['girl, girl', (1 - p) * (1 - p)]
  ].map(function (row) { return [row[0], pct(row[1])]; });
  ctx.addHtml('<p>All four equally likely families, with your chance of a boy:</p>');
  ctx.addHtml(stable(['Older, younger', 'Probability'], tree));

  ctx.addHtml('<p class="calc-unmet">Why the two answers differ: saying "the elder is a boy" '
    + 'rules out two of the four families, and the two that remain (boy-boy and boy-girl) are equally '
    + 'likely, so the answer is 1/2. Saying "at least one is a boy" rules out only girl-girl, and the '
    + 'three that remain (boy-boy, boy-girl, girl-boy) are equally likely, so only one of them is boy-boy '
    + 'and the answer is 1/3. The extra fact that the boy was born on a Tuesday sounds irrelevant but it '
    + 'is not: it splits boy-boy into 49 equally likely cases, two of which are excluded, which is why the '
    + 'answer moves from 1/3 to 13/27. Everything here assumes the two children are independent and that '
    + 'the information was obtained without any rule about which child the person would mention.</p>');
});
JS,
];
