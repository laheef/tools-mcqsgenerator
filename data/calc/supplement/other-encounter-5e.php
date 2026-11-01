<?php
/**
 * /other/encounter-5e — the rows its script already publishes.
 *
 * The scan in docs/export-mismatch.json found the page script calling
 * ctx.exportValue() for these names and the definition declaring none of
 * them: the answer was computed correctly and then dropped, so the panel
 * stayed empty. This supplement declares the rows and tidies the text the
 * page publishes — the arithmetic is the page's own.
 */
require_once __DIR__ . '/_builder.php';

return [
    'hideTexts' => true,
    'outputs' => [
        'array_deadly' => 'Array deadly',
        'array_easy' => 'Array easy',
        'array_hard' => 'Array hard',
        'array_medium' => 'Array medium',
        'encounter_text' => 'Encounter text',
        'final_XP' => 'Final xp',
        'monster_breakdown1' => 'Monster breakdown1',
        'monster_breakdown10' => 'Monster breakdown10',
        'monster_breakdown11' => 'Monster breakdown11',
        'monster_breakdown12' => 'Monster breakdown12',
        'monster_breakdown13' => 'Monster breakdown13',
        'monster_breakdown14' => 'Monster breakdown14',
        'monster_breakdown15' => 'Monster breakdown15',
        'monster_breakdown2' => 'Monster breakdown2',
        'monster_breakdown3' => 'Monster breakdown3',
        'monster_breakdown4' => 'Monster breakdown4',
        'monster_breakdown5' => 'Monster breakdown5',
        'monster_breakdown6' => 'Monster breakdown6',
        'monster_breakdown7' => 'Monster breakdown7',
        'monster_breakdown8' => 'Monster breakdown8',
        'monster_breakdown9' => 'Monster breakdown9',
        'multiplier' => 'Multiplier',
        'total_XP' => 'Total xp',
        'total_deadly' => 'Total deadly',
        'total_easy' => 'Total easy',
        'total_hard' => 'Total hard',
        'total_medium' => 'Total medium',
        'total_num' => 'Total num',
    ],
    'js' => <<<'JS'
/* The page hook has already run by the time this one does, so the values
   below are its results: tidy the reference site's markup out of them
   before they reach the panel. */
omni.onResult([], function (ctx, values) {
  var rows = [
    'array_deadly',
    'array_easy',
    'array_hard',
    'array_medium',
    'encounter_text',
    'final_XP',
    'monster_breakdown1',
    'monster_breakdown10',
    'monster_breakdown11',
    'monster_breakdown12',
    'monster_breakdown13',
    'monster_breakdown14',
    'monster_breakdown15',
    'monster_breakdown2',
    'monster_breakdown3',
    'monster_breakdown4',
    'monster_breakdown5',
    'monster_breakdown6',
    'monster_breakdown7',
    'monster_breakdown8',
    'monster_breakdown9',
    'multiplier',
    'total_XP',
    'total_deadly',
    'total_easy',
    'total_hard',
    'total_medium',
    'total_num'
  ];
  rows.forEach(function (name) {
    var v = values[name];
    if (typeof v !== 'string' || v.trim() === '') { return; }
    var text = sclean(sdelabel(v));
    ctx.exportValue(name, text === '' ? null : text);
  });
});
JS,
];
