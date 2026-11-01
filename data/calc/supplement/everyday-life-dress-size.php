<?php
/**
 * Women's dress size from bust, waist and hips.
 *
 * Each measurement is entered as a band, and its option id is already the
 * European size (30, 32, 34 …), so the size is the largest of the three bands —
 * a garment has to fit the widest part. The US and UK equivalents run four and
 * two sizes below the European number respectively.
 */
return [
    'vars' => [
        'dress_size_eu' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'dress_size_us' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'dress_size_uk' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'dress_size_int' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'dress_size_eu', 'vt' => 'dependent', 'l' => 'European size']]]],
            ['FR1', [[['t' => 'v', 'n' => 'dress_size_us', 'vt' => 'dependent', 'l' => 'US size']]]],
            ['FR1', [[['t' => 'v', 'n' => 'dress_size_uk', 'vt' => 'dependent', 'l' => 'UK size']]]],
            ['FR1', [[['t' => 'v', 'n' => 'dress_size_int', 'vt' => 'dependent',
                       'l' => 'International size (1 = XXS … 6 = XXL)']]]],
        ],
    ]],
    'js' => <<<'JS'
var INT_NAMES = ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL'];

omni.onResult([], function (ctx, v) {
  var need = [['bust', 'bust'], ['waist', 'waist'], ['hips', 'hips']];
  var sizes = [];
  for (var i = 0; i < need.length; i++) {
    var raw = v[need[i][0]];
    if (raw === '' || raw === undefined || !isFinite(Number(raw))) {
      ctx.addUnmetCondition('Choose your ' + need[i][1] + ' measurement.');
      return;
    }
    sizes.push(Math.round(Number(raw)));
  }
  var eu = Math.max.apply(null, sizes);       /* the widest part decides the size */
  var us = eu - 32;                            /* EU 38 = US 6 */
  var uk = eu - 28;                            /* EU 38 = UK 10 */
  var intIndex = Math.max(0, Math.min(6, Math.round((eu - 32) / 2)));

  ctx.exportValue('dress_size_eu', eu);
  ctx.exportValue('dress_size_us', us);
  ctx.exportValue('dress_size_uk', uk);
  ctx.exportValue('dress_size_int', intIndex + 1);

  ctx.addHtml('<p><strong>European ' + eu + ', US ' + us + ', UK ' + uk + ' — '
    + INT_NAMES[intIndex] + '</strong>. Your largest measurement sets the size, so a garment will be loose '
    + 'where it is not the deciding one.</p>');
  ctx.addHtml(stable(['System', 'Size'], [
    ['Europe (DE/AT/NL/SE)', String(eu)],
    ['US', String(us)],
    ['UK', String(uk)],
    ['International', INT_NAMES[intIndex]],
    ['Bust band chosen', String(sizes[0])],
    ['Waist band chosen', String(sizes[1])],
    ['Hips band chosen', String(sizes[2])]
  ]));
  ctx.addHtml('<p class="calc-unmet">Sizes are not interchangeable between brands — the table is a starting '
    + 'point for a first fitting, not a guarantee.</p>');
});
JS,
];
