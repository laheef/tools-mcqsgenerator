<?php
/**
 * Centre of mass — where the balance point of a set of masses is.
 *
 * The page has ten slots for masses and ten each for x, y and z, and its own
 * script never reached them: its hook bails out when `T` is null, and the one
 * result it published (`result`) was not a declared row, so Calculate came back
 * with "every field already has a value". What it did show — 266.67 for masses
 * of 1 and 2 at x = 0 and x = 4 — was the right centroid converted into
 * centimetres without saying so.
 *
 * The repair computes the centroid here from the boxes that hold a number, and
 * reports each coordinate, the total mass and how many objects went in.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'result'      => ['label' => 'Centre of mass, x', 'precision' => '4'],
        'x_centre'    => ['label' => 'x of the centre of mass', 'precision' => '4'],
        'y_centre'    => ['label' => 'y of the centre of mass', 'precision' => '4'],
        'z_centre'    => ['label' => 'z of the centre of mass', 'precision' => '4'],
        'total_mass'  => ['label' => 'Total mass', 'precision' => '4'],
        'objects'     => ['label' => 'Objects included', 'precision' => '0'],
    ],
    'js' => <<<'JS'
function cmNum(ctx, name) {
  var raw = String(ctx.getRawInput(name) || '').trim();
  if (raw === '') { return null; }
  var n = Number(raw.replace(/\s/g, '').replace(',', '.'));
  return isFinite(n) ? n : null;
}

omni.onResult([], function (ctx, values) {
  var count = cmNum(ctx, 'T');
  if (count === null) {
    ctx.addUnmetCondition('Say how many masses you are balancing (the number of objects).');
    return;
  }
  if (count < 1) {
    ctx.addUnmetCondition('The number of objects has to be at least 1.');
    return;
  }
  if (count > 10) {
    ctx.addUnmetCondition('This page holds ten objects — anything past the tenth box has nowhere to go.');
    return;
  }

  var total = 0, sx = 0, sy = 0, sz = 0, used = 0, haveY = false, haveZ = false;
  for (var i = 1; i <= count; i++) {
    var m = cmNum(ctx, 'm' + i);
    var x = cmNum(ctx, 'x' + i);
    if (m === null || x === null) { continue; }
    var y = cmNum(ctx, 'y' + i);
    var z = cmNum(ctx, 'z' + i);
    total += m;
    sx += m * x;
    if (y !== null) { sy += m * y; haveY = true; }
    if (z !== null) { sz += m * z; haveZ = true; }
    used++;
  }

  if (!used || total === 0) {
    ctx.addUnmetCondition('Give at least one object a mass and an x position — the centre of mass is a mass-'
      + 'weighted average and needs both.');
    return;
  }

  var xBar = sx / total;
  ctx.exportValue('result', sround(xBar, 6));
  ctx.exportValue('x_centre', sround(xBar, 6));
  ctx.exportValue('y_centre', haveY ? sround(sy / total, 6) : null);
  ctx.exportValue('z_centre', haveZ ? sround(sz / total, 6) : null);
  ctx.exportValue('total_mass', sround(total, 6));
  ctx.exportValue('objects', used);

  var where = 'x = ' + snum(xBar, 4)
    + (haveY ? ', y = ' + snum(sy / total, 4) : '')
    + (haveZ ? ', z = ' + snum(sz / total, 4) : '');
  ctx.addHtml('<p><strong>The centre of mass sits at ' + where + '</strong>, from ' + used + ' object'
    + (used === 1 ? '' : 's') + ' with a total mass of ' + snum(total, 4) + '.</p>');
  ctx.addHtml(stable(['Quantity', 'Value'], [
    ['Objects included', String(used)],
    ['Total mass', snum(total, 4)],
    ['x of the centre', snum(xBar, 4)],
    ['y of the centre', haveY ? snum(sy / total, 4) : 'not given'],
    ['z of the centre', haveZ ? snum(sz / total, 4) : 'not given']
  ]));
  ctx.addHtml('<p class="calc-note">The centre of mass is the mass-weighted average of the positions: multiply '
    + 'each object\'s mass by its coordinate, add those up and divide by the total mass. It is not the point '
    + 'half-way between the objects — a heavy object pulls it towards itself, which is why two masses of 1 and '
    + '2 at x = 0 and x = 4 balance at x = 2.67 and not at 2. Leave the y or z boxes empty for a one- or '
    + 'two-dimensional problem; they are reported only when you use them. Coordinates are read in whatever '
    + 'unit you type them in, and the answer comes back in the same unit.</p>');
});
JS,
];
