<?php
/**
 * Social distancing — how many people a room holds at a given spacing.
 *
 * The page had no form. The repair treats the room as a grid: if everybody
 * keeps d metres from everybody else, each person occupies a d × d patch, so
 *
 *   capacity = floor(length ÷ d) × floor(width ÷ d)
 *
 * That is the honest geometric answer for a room of chairs; the softer
 * "area ÷ d²" figure is shown beside it because that is what a circular
 * exclusion zone around each person gives.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'room_length' => ['type' => 'numerical'],
        'room_width' => ['type' => 'numerical'],
        'distance' => ['type' => 'numerical'],
        'sd_area' => sup_dep('1'),
        'sd_grid' => sup_dep('0'),
        'sd_circles' => sup_dep('0'),
        'sd_per_person' => sup_dep('2'),
        'sd_density' => sup_dep('3'),
    ],
    'groups' => [
        sup_group('supp-sd-room', 'The room and the spacing', [
            sup_field(sup_num('room_length', 'Length of the room (metres)')),
            sup_field(sup_num('room_width', 'Width of the room (metres)')),
            sup_field(sup_num('distance', 'Distance to keep from each other (metres)')),
        ]),
        sup_group('supp-sd-results', 'Results', [
            sup_field(sup_out('sd_area', 'Floor area (square metres)')),
            sup_field(sup_out('sd_grid', 'People the room holds on a square grid')),
            sup_field(sup_out('sd_circles', 'People by area alone (floor area ÷ distance²)')),
            sup_field(sup_out('sd_per_person', 'Floor area per person (square metres)')),
            sup_field(sup_out('sd_density', 'Density (people per square metre)')),
        ]),
    ],
    'js' => <<<'JS'
function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

omni.onResult(['room_length', 'room_width', 'distance'], function (ctx, v) {
  var length = num('room_length');
  var width = num('room_width');
  var d = num('distance');

  if (length === null || length <= 0) {
    ctx.addUnmetCondition('Enter the length of the room in metres.');
    return;
  }
  if (width === null || width <= 0) {
    ctx.addUnmetCondition('Enter the width of the room in metres.');
    return;
  }
  if (d === null || d <= 0) {
    ctx.addUnmetCondition('Enter the distance people should keep, in metres.');
    return;
  }
  if (d > Math.max(length, width)) {
    ctx.addUnmetCondition('The spacing is wider than the room itself — nobody fits.');
    return;
  }

  var area = length * width;
  /* a person sits on a d × d patch: one row across, one column down */
  var across = Math.floor(length / d);
  var down = Math.floor(width / d);
  if (across < 1 || down < 1) { across = Math.max(across, 0); down = Math.max(down, 0); }
  var grid = across * down;
  var circles = Math.floor(area / (d * d));

  ctx.exportValue('sd_area', sround(area, 1));
  ctx.exportValue('sd_grid', grid);
  ctx.exportValue('sd_circles', circles);
  ctx.exportValue('sd_per_person', sround(area / Math.max(1, grid), 2));
  ctx.exportValue('sd_density', sround(grid / area, 3));

  ctx.addHtml('<p><strong>At ' + snum(d, 2) + ' metres apart, a room of ' + snum(length, 1) + ' × '
    + snum(width, 1) + ' metres holds ' + grid + ' people laid out on a grid — ' + across + ' across and '
    + down + ' deep, each on a patch of ' + snum(d * d, 2) + ' square metres.</strong></p>');

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Room', snum(length, 1) + ' m × ' + snum(width, 1) + ' m'],
    ['Floor area', snum(area, 1) + ' m²'],
    ['Spacing', snum(d, 2) + ' m'],
    ['Patch per person', snum(d * d, 2) + ' m²'],
    ['People across the length', String(across)],
    ['People across the width', String(down)],
    ['Capacity on a grid', String(grid)],
    ['Capacity by area alone', String(circles)],
    ['Floor area per person on the grid', snum(area / Math.max(1, grid), 2) + ' m²'],
    ['Density on the grid', snum(grid / area, 3) + ' people/m²'],
    ['Unused strip along the length', snum(length - across * d, 2) + ' m'],
    ['Unused strip along the width', snum(width - down * d, 2) + ' m']
  ]));

  /* the same room at the distances people actually quote */
  var rows = [1, 1.5, 2, 3, 6].map(function (x) {
    var a = Math.floor(length / x), b2 = Math.floor(width / x);
    return [snum(x, 1) + ' m', String(a * b2), snum(area / Math.max(1, a * b2), 1) + ' m²'];
  });
  ctx.addHtml('<p>The same room at other spacings:</p>');
  ctx.addHtml(stable(['Spacing', 'People', 'Area each'], rows));

  ctx.addHtml('<p class="calc-unmet">Two conventions give different answers and it is worth knowing which '
    + 'one a venue used. The grid figure assumes people stand in rows and columns a full spacing apart in '
    + 'both directions, which is how seats in an auditorium are actually laid out; the area figure assumes '
    + 'each person owns a circle of radius d/2, which packs more in but ignores that a circle leaves '
    + 'corners. Plain "area ÷ distance²" is a third, looser convention that matches neither. Nothing here '
    + 'accounts for doorways, aisles, a stage, tables or the fact that people move: a room that seats '
    + 'forty at two metres can still have sixty people crowded around the entrance. Six feet is 1.83 '
    + 'metres, not 2; a metre is a little over three feet.</p>');
});
JS,
];
