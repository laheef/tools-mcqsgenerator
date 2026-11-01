<?php
/**
 * Bolt circle — hole coordinates around a circle.
 *
 * The page had five variables (the bolt circle's radius, the number of holes and
 * the centre) and no group to put them in, so it rendered "nothing to calculate
 * here". The repair places them and adds the arithmetic a machinist needs: the
 * angular step, the straight-line distance between neighbouring holes, and the
 * coordinates of every hole from the centre.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'vars' => [
        'bolt_pitch' => sup_dep('3'),
        'bolt_step' => sup_dep('2'),
        'bolt_arc' => sup_dep('3'),
        'bolt_holes' => sup_dep('0'),
    ],
    'groups' => [
        sup_group('supp-bolt-inputs', 'The bolt circle', [
            sup_field(sup_num('radius', 'Radius of the bolt circle (mm)')),
            sup_field(sup_num('n', 'Number of holes')),
            sup_field(sup_num('a', 'Diameter of each hole (mm)')),
            sup_row(
                sup_num('offsetx', 'Centre X offset (mm)'),
                sup_num('offsety', 'Centre Y offset (mm)')
            ),
        ]),
        sup_group('supp-bolt-results', 'Results', [
            sup_field(sup_out('bolt_pitch', 'Distance between neighbouring holes (mm)')),
            sup_field(sup_out('bolt_step', 'Angle between neighbouring holes (degrees)')),
            sup_field(sup_out('bolt_arc', 'Arc length between holes along the circle (mm)')),
            sup_field(sup_out('bolt_holes', 'Holes placed')),
        ]),
    ],
    'js' => <<<'JS'
function num(name) {
  var el = document.querySelector('input[data-var="' + name + '"]');
  if (!el || String(el.value).trim() === '') { return null; }
  var n = Number(el.value);
  return isFinite(n) ? n : null;
}

/* only the two required boxes are listed; the optional ones are read below,
   because a hook does not run until every field it names holds a value */
omni.onResult(['radius', 'n'], function (ctx, v) {
  var r = num('radius');
  var count = num('n');
  var hole = num('a');
  var cx = num('offsetx');
  var cy = num('offsety');

  if (r === null || r <= 0) {
    ctx.addUnmetCondition('Enter the radius of the bolt circle.');
    return;
  }
  if (count === null || count < 2) {
    ctx.addUnmetCondition('A bolt circle needs at least two holes.');
    return;
  }
  if (count > 100) {
    ctx.addUnmetCondition('That is ' + snum(count, 0) + ' holes — this page draws up to 100.');
    return;
  }
  if (hole !== null && hole >= 2 * r) {
    ctx.addUnmetCondition('A hole wider than the bolt circle cannot sit on it.');
    return;
  }
  if (cx === null) { cx = 0; }
  if (cy === null) { cy = 0; }

  var step = 360 / count;
  var pitch = 2 * r * Math.sin(Math.PI / count);
  var arc = 2 * Math.PI * r / count;

  ctx.exportValue('bolt_pitch', sround(pitch, 3));
  ctx.exportValue('bolt_step', sround(step, 2));
  ctx.exportValue('bolt_arc', sround(arc, 3));
  ctx.exportValue('bolt_holes', Math.round(count));

  ctx.addHtml('<p><strong>' + Math.round(count) + ' holes on a bolt circle of radius ' + snum(r, 2)
    + ' mm sit ' + snum(step, 2) + '&deg; apart, ' + snum(pitch, 3) + ' mm measured straight across from '
    + 'neighbour to neighbour (' + snum(arc, 3) + ' mm along the arc).</strong></p>');

  /* the coordinates, measured from the centre (or from the offsets given) */
  var rows = [];
  var decimals = pitch < 10 ? 3 : 2;
  for (var i = 0; i < count; i++) {
    var deg = i * step;
    var rad = deg * Math.PI / 180;
    rows.push([
      String(i + 1),
      snum(deg, 2) + '&deg;',
      snum(cx + r * Math.cos(rad), decimals),
      snum(cy + r * Math.sin(rad), decimals)
    ]);
  }
  ctx.addHtml('<p>Hole positions, with 0&deg; to the right and angles measured anticlockwise '
    + '(swap the sine sign if your machine reads them clockwise):</p>');
  ctx.addHtml(stable(['Hole', 'Angle', 'X (mm)', 'Y (mm)'], rows));

  ctx.addHtml(stable(['Item', 'Value'], [
    ['Bolt circle radius', snum(r, 3) + ' mm'],
    ['Bolt circle diameter', snum(2 * r, 3) + ' mm'],
    ['Holes', Math.round(count)],
    ['Hole diameter', hole === null ? 'not given' : snum(hole, 3) + ' mm'],
    ['Centre', '(' + snum(cx, 2) + ', ' + snum(cy, 2) + ') mm'],
    ['Angular step', snum(step, 4) + '&deg;'],
    ['Chord between holes', snum(pitch, 4) + ' mm'],
    ['Arc between holes', snum(arc, 4) + ' mm'],
    ['Circumference of the circle', snum(2 * Math.PI * r, 3) + ' mm']
  ]));

  if (hole !== null) {
    var edgeToEdge = pitch - hole;
    ctx.addHtml('<p>With ' + snum(hole, 3) + ' mm holes, the metal left between two neighbouring holes '
      + 'is ' + snum(edgeToEdge, 3) + ' mm at the closest point. Anything under about one hole diameter '
      + 'is asking a lot of the material, and under half is a part that will crack at the first torque.</p>');
  }

  ctx.addHtml('<p class="calc-unmet">The pitch is the straight chord, not the arc: two holes 30&deg; apart '
    + 'on a 100 mm circle are 51.76 mm apart across the chord and 52.36 mm along the arc, and it is the '
    + 'chord that a caliper measures. Coordinates are trigonometric — the first hole sits at 0&deg; unless '
    + 'your drawing puts it somewhere else, in which case add the starting angle to every entry by hand. '
    + 'Nothing here allows for drilling tolerance, hole clearance or the counterbore; a bolt circle is '
    + 'usually drilled from a jig or on a rotary table, and the coordinates are for checking the layout, '
    + 'not for replacing the jig.</p>');
});
JS,
];
