<?php
/**
 * Sunglasses size — which frame width fits the face, and which shapes suit it.
 *
 * The harvested page asked for four face measurements, a jawline description and
 * a gender, and then answered nothing: the page script kept a helper
 * (`get_face_shape`) that took the four measurements and returned a shape, but
 * nothing ever called it, and the frame measurements were never derived at all.
 *
 * The shape test is the one an optician uses — compare the width of the forehead
 * and the cheekbones, and the length of the face against its width:
 *
 *   forehead > cheekbones > jaw, sharp      heart / inverted triangle
 *   all three about equal, sharp jaw        square
 *   all three about equal, soft jaw         round
 *   length > 1.4 × width                    oblong (long)
 *   otherwise                               oval
 *
 * The frame width follows the face: a frame should be about as wide as the
 * widest part of the head, so the arms do not press the temples.
 */
return [
    'hideTexts' => true,
    'remove' => ['face', 'glasses_bridge_width', 'glasses_lens_width', 'glasses_temple_length',
                 'glasses_total_width', 'glasses_unit_width'],
    'vars' => [
        'face_shape' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'frame_width' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'lens_width' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'bridge_width' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'temple_length' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'face_ratio' => ['type' => 'dependent', 'rnd' => ['standard', '2']],
    ],
    'groups' => [[
        'uid' => 'supp-glasses-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'face_shape', 'vt' => 'dependent', 'l' => 'Face shape (1 oval, 2 round, 3 square, 4 heart, 5 oblong)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'frame_width', 'vt' => 'dependent', 'l' => 'Frame width to look for (mm)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'lens_width', 'vt' => 'dependent', 'l' => 'Lens width (mm)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'bridge_width', 'vt' => 'dependent', 'l' => 'Bridge width (mm)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'temple_length', 'vt' => 'dependent', 'l' => 'Temple (arm) length (mm)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'face_ratio', 'vt' => 'dependent', 'l' => 'Face length ÷ width']]]],
        ],
    ]],
    'js' => <<<'JS'
var SHAPES = {
  1: { name: 'oval', fits: 'Most frames suit an oval face — rectangular, round, aviator, wayfarer.',
       avoid: 'Frames that are wider than the cheekbones, which make an oval face look narrow.' },
  2: { name: 'round', fits: 'Angular and rectangular frames add the definition a round face lacks; wayfarers and cat-eyes work too.',
       avoid: 'Small round frames, which emphasise the roundness.' },
  3: { name: 'square', fits: 'Round, oval and aviator frames soften a strong jawline.',
       avoid: 'Sharp rectangular frames, which repeat the angles of the jaw.' },
  4: { name: 'heart (inverted triangle)', fits: 'Bottom-heavy, rimless and light-coloured frames, or a straight top line with a rounded bottom.',
       avoid: 'Heavy decorated top bars and wide temples, which add weight where the face is already widest.' },
  5: { name: 'oblong', fits: 'Deep lenses and frames with a little height — aviators, oversized squares, round frames with depth.',
       avoid: 'Narrow letterbox frames, which make a long face look longer.' }
};

function shapeFrom(forehead, cheek, jaw, length, sharpness) {
  var ratio = length / cheek;
  var sharp = Number(sharpness) > 0.7;
  var soft  = Number(sharpness) < 0.3;

  if (forehead > cheek * 1.03 && cheek > jaw * 1.03) { return { id: 4, ratio: ratio }; }
  if (ratio > 1.4) { return { id: 5, ratio: ratio }; }
  if (Math.abs(forehead - cheek) / cheek < 0.05 && Math.abs(cheek - jaw) / cheek < 0.05) {
    return { id: sharp ? 3 : (soft ? 2 : 1), ratio: ratio };
  }
  if (soft) { return { id: 2, ratio: ratio }; }
  return { id: 1, ratio: ratio };
}

omni.onResult(['forehead_width', 'cheeks_width', 'jawline_length', 'face_length', 'sharpness',
               'gender'], function (ctx, v) {
  var forehead = Number(v.forehead_width);
  var cheek = Number(v.cheeks_width);
  var jaw = Number(v.jawline_length);
  var length = Number(v.face_length);

  var missing = [forehead, cheek, jaw, length].some(function (n) { return !isFinite(n) || n <= 0; });
  if (missing) {
    ctx.addUnmetCondition('Enter all four measurements of the face.');
    return;
  }
  if (cheek < 80 || cheek > 220) {
    ctx.addUnmetCondition('A face ' + snum(cheek, 0) + ' mm wide is outside the range this rule covers '
      + '(80-220 mm) — measure in millimetres.');
    return;
  }
  if (length < 100 || length > 280) {
    ctx.addUnmetCondition('A face ' + snum(length, 0) + ' mm long is outside the range this rule covers — '
      + 'measure from the hairline to the bottom of the chin, in millimetres.');
    return;
  }

  var shape = shapeFrom(forehead, cheek, jaw, length, v.sharpness);
  var info = SHAPES[shape.id];
  var male = Math.round(Number(v.gender)) === 1;

  /*
   * Frame width: as wide as the widest part of the head. The arms sit just
   * outside the temples, so the frame is a few millimetres wider than the
   * cheekbones — and a little wider again on a man's heavier head.
   */
  var widest = Math.max(forehead, cheek, jaw);
  var frameWidth = widest + (male ? 4 : 2);
  /* a standard bridge, nudged by the width of the face */
  var bridge = (male ? 18 : 16) + Math.round((cheek - 140) / 40);
  bridge = Math.max(13, Math.min(24, bridge));
  /* the printed size is lens + bridge + lens; the rim adds about 10 mm a side */
  var lens = Math.round((frameWidth - bridge) / 2 - 10);
  lens = Math.max(38, Math.min(62, lens));
  /* arms: about three-quarters of the length of the face, in the usual band */
  var temple = Math.round(length * 0.78 / 5) * 5;
  temple = Math.max(130, Math.min(155, temple));

  ctx.exportValue('face_shape', shape.id);
  ctx.exportValue('frame_width', frameWidth);
  ctx.exportValue('lens_width', lens);
  ctx.exportValue('bridge_width', bridge);
  ctx.exportValue('temple_length', temple);
  ctx.exportValue('face_ratio', sround(shape.ratio, 2));

  ctx.addHtml('<p><strong>Your face is ' + info.name + ' (length ' + snum(length, 0) + ' mm against a '
    + snum(cheek, 0) + ' mm width, a ratio of ' + snum(shape.ratio, 2) + '). Look for a frame about '
    + frameWidth + ' mm wide, printed as ' + lens + '&#9633;' + bridge + '&#8211;' + temple
    + '.</strong></p>');

  ctx.addHtml('<p>' + info.fits + ' ' + info.avoid + '</p>');

  var rows = [
    ['Forehead', snum(forehead, 0) + ' mm'],
    ['Cheekbones', snum(cheek, 0) + ' mm'],
    ['Jawline', snum(jaw, 0) + ' mm'],
    ['Face length', snum(length, 0) + ' mm'],
    ['Face shape', info.name],
    ['Frame width', frameWidth + ' mm'],
    ['Lens width', lens + ' mm'],
    ['Bridge', bridge + ' mm'],
    ['Temple length', temple + ' mm'],
    ['That is printed as', lens + '&#9633;' + bridge + '&#8211;' + temple],
    ['Typical lens width for a ' + (male ? 'man' : 'woman'), (male ? '54-58' : '50-54') + ' mm'],
    ['Typical total width', (male ? '140-150' : '130-140') + ' mm']
  ];
  ctx.addHtml(stable(['Measurement', 'Your face'], rows));

  /* the ratio test, so a near miss is visible */
  var checks = [
    ['Forehead wider than the cheekbones by more than 3 %', forehead > cheek * 1.03 ? 'yes' : 'no'],
    ['Cheekbones wider than the jawline by more than 3 %', cheek > jaw * 1.03 ? 'yes' : 'no'],
    ['Forehead and cheekbones within 5 %', Math.abs(forehead - cheek) / cheek < 0.05 ? 'yes' : 'no'],
    ['Cheekbones and jawline within 5 %', Math.abs(cheek - jaw) / cheek < 0.05 ? 'yes' : 'no'],
    ['Length more than 1.4 × the width', shape.ratio > 1.4 ? 'yes' : 'no']
  ];
  ctx.addHtml('<p>How the shape was decided:</p>');
  ctx.addHtml(stable(['Test', 'Result'], checks));

  ctx.addHtml('<p class="calc-unmet">Measure across the widest part of the forehead, across the '
    + 'cheekbones, across the jaw at its widest point, and from the hairline to the bottom of the chin, '
    + 'all in millimetres and all on the same head. The three numbers printed inside the arm of any pair '
    + 'of glasses are lens&#9633;bridge&#8211;temple, so the size above can be compared with a pair you '
    + 'already own: within 2 mm in any of the three is close enough. Two people with the same face shape '
    + 'still differ in which frame they like, and the fit that actually matters is the arm length and '
    + 'where the bridge sits on the nose — try the pair on if you can. Prescription lenses, wrap frames '
    + 'and very curved styles change the fit, so ask the optician when you order.</p>');
});
JS,
];
