<?php
/**
 * What size cake to order.
 *
 * Each guest eats a slice, so the cake has to offer the total slice area: the
 * number of people multiplied by the area of one slice. That area is turned back
 * into a diameter (round) or a side (square), and the same figure is given for
 * the usual slice sizes so the size can be judged at a glance.
 */
return [
    'hideTexts' => true,
    'vars' => [
        'cake_diameter_cm' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'cake_side_cm' => ['type' => 'dependent', 'rnd' => ['standard', '1']],
        'slice_area_cm2' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'total_area_cm2' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'cake_diameter_cm', 'vt' => 'dependent', 'l' => 'Round cake diameter (cm)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'cake_side_cm', 'vt' => 'dependent', 'l' => 'Square cake side (cm)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'slice_area_cm2', 'vt' => 'dependent', 'l' => 'Slice area used (cm²)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'total_area_cm2', 'vt' => 'dependent', 'l' => 'Cake area needed (cm²)']]]],
        ],
    ]],
    'showIf' => [
        'slice_finger_area' => 'custom_slices_sizes_checkbox == 1',
        'slice_small_area' => 'custom_slices_sizes_checkbox == 1',
        'slice_medium_area' => 'custom_slices_sizes_checkbox == 1',
        'slice_big_area' => 'custom_slices_sizes_checkbox == 1',
    ],
    'js' => <<<'JS'
/* the usual slice sizes, in square centimetres of cake surface */
var SLICES = { finger: 12, small: 30, medium: 60, big: 90 };

omni.onResult([], function (ctx, v) {
  var people = Number(v.people_number);
  if (v.people_number === '' || !isFinite(people) || people < 1) {
    ctx.addUnmetCondition('How many people are coming?');
    return;
  }
  people = Math.ceil(people);
  var square = Math.round(Number(v.cake_shape_VS)) === 1;
  var custom = String(v.custom_slices_sizes_checkbox) === '1';

  var areas = { finger: SLICES.finger, small: SLICES.small, medium: SLICES.medium, big: SLICES.big };
  if (custom) {
    var keys = ['finger', 'small', 'medium', 'big'];
    for (var i = 0; i < keys.length; i++) {
      var raw = v['slice_' + keys[i] + '_area'];
      if (raw === '' || raw === undefined || !isFinite(Number(raw)) || Number(raw) <= 0) {
        ctx.addUnmetCondition('Each custom slice size needs a positive area in cm².');
        return;
      }
      areas[keys[i]] = Number(raw);
    }
  }

  /* the party is fed by the standard dessert slice unless the visitor says otherwise */
  var used = custom ? (areas.medium || SLICES.medium) : SLICES.medium;
  var total = people * used;
  var diameter = 2 * Math.sqrt(total / Math.PI);
  var side = Math.sqrt(total);

  ctx.exportValue('slice_area_cm2', sround(used, 0));
  ctx.exportValue('total_area_cm2', sround(total, 0));
  ctx.exportValue('cake_diameter_cm', sround(diameter, 1));
  ctx.exportValue('cake_side_cm', sround(side, 1));

  var rows = Object.keys(areas).map(function (k) {
    var need = people * areas[k];
    return [k.charAt(0).toUpperCase() + k.slice(1) + ' slice (' + snum(areas[k], 0) + ' cm²)',
            snum(need / Math.PI, 0) ? snum(2 * Math.sqrt(need / Math.PI), 1) + ' cm round'
              : '', snum(Math.sqrt(need), 1) + ' cm square'];
  });

  ctx.addHtml('<p><strong>For ' + people + ' people you need about ' + snum(total, 0) + ' cm² of cake — a '
    + snum(diameter, 1) + ' cm round tin or a ' + snum(side, 1) + ' cm square one.</strong></p>');
  ctx.addHtml(stable(['Slice size', 'Round cake', 'Square cake'], rows));
  ctx.addHtml('<p class="calc-unmet">' + (square ? 'You chose a square cake, so the side is the figure to '
    + 'order. ' : 'You chose a round cake, so the diameter is the figure to order. ')
    + 'A standard dessert slice is about 60 cm²; finger food is a quarter of that and a generous party slice '
    + 'half again as big. For a tiered cake each tier is ' + snum(Number(v.tier_diameter_difference_VS) === 1 ? 5 : 7.5, 1)
    + ' cm smaller than the one below, and the sizes above apply to the largest tier.</p>');
});
JS,
];
