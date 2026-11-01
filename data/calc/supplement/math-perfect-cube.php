<?php
/**
 * Perfect cube test.
 *
 * A whole number is a perfect cube when its cube root is a whole number again.
 * The rounded cube root is checked by cubing it, so floating point cannot claim
 * 27 is not 3³.
 */
return [
    'vars' => [
        'cube_root' => ['type' => 'dependent', 'rnd' => ['standard', '6']],
        'is_perfect_cube' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'nearest_cube' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'cube_root', 'vt' => 'dependent',
                       'l' => 'Cube root']]]],
            ['FR1', [[['t' => 'v', 'n' => 'is_perfect_cube', 'vt' => 'dependent',
                       'l' => 'Perfect cube? (1 = yes, 0 = no)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'nearest_cube', 'vt' => 'dependent',
                       'l' => 'Nearest perfect cube']]]],
        ],
    ]],
    'js' => <<<'JS'
omni.onResult([], function (ctx, v) {
  var n = Number(v.numb);
  if (!isFinite(n)) {
    ctx.addUnmetCondition('Enter a number.');
    return;
  }
  var root = Math.cbrt(n);
  var rounded = Math.round(root);
  var perfect = Math.abs(Math.pow(rounded, 3) - n) < 1e-9;
  var nearest = perfect ? n : (Math.abs(Math.pow(Math.floor(root), 3) - n)
    <= Math.abs(Math.pow(Math.ceil(root), 3) - n)
      ? Math.pow(Math.floor(root), 3) : Math.pow(Math.ceil(root), 3));

  ctx.exportValue('cube_root', sround(root, 6));
  ctx.exportValue('is_perfect_cube', perfect ? 1 : 0);
  ctx.exportValue('nearest_cube', nearest);

  ctx.addHtml('<p><strong>' + snum(n, 4) + (perfect ? ' is' : ' is not')
    + ' a perfect cube.</strong> Its cube root is ' + snum(root, 6)
    + (perfect ? ' — exactly ' + rounded + ', because ' + rounded + '³ = ' + snum(n, 0) + '.'
               : ' — between ' + Math.floor(root) + '³ = ' + snum(Math.pow(Math.floor(root), 3), 0)
                 + ' and ' + Math.ceil(root) + '³ = ' + snum(Math.pow(Math.ceil(root), 3), 0) + '.')
    + '</p>');
});
JS,
];
