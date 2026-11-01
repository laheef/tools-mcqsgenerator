<?php
/**
 * /everyday-life/generator-wattage — the rows its script already publishes.
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
        'total_rated_W'            => ['label' => 'Total rated load, W', 'precision' => '0'],
        'total_rated_kW'           => ['label' => 'Total rated load, kW', 'precision' => '3'],
        'total_surge_W'            => ['label' => 'Total starting (surge) load, W', 'precision' => '0'],
        'total_surge_kW'           => ['label' => 'Total starting (surge) load, kW', 'precision' => '3'],
        'apparent_power'           => ['label' => 'Apparent power, VA', 'precision' => '0'],
        'required_generator_power' => ['label' => 'Generator size to buy, W', 'precision' => '0'],
    ],
    'js' => <<<'JS'
/* The page hook has already run by the time this one does, so the values
   below are its results: tidy the reference site's markup out of them
   before they reach the panel. */
omni.onResult([], function (ctx, values) {
  var rows = [
    'total_rated_W',
    'total_rated_kW',
    'total_surge_W',
    'total_surge_kW',
    'apparent_power',
    'required_generator_power'
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
