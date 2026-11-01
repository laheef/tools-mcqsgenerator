<?php
/**
 * /sports/elo — the rows its script already publishes.
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
        'games_number' => 'Games number',
        'opponent_rating_difference_multiple_games' => 'Opponent rating difference multiple games',
        'opponent_rating_difference_single_game' => 'Opponent rating difference single game',
        'opponent_total_score' => 'Opponent total score',
        'rating_difference_multiple_games' => 'Rating difference multiple games',
        'rating_difference_single_game' => 'Rating difference single game',
        'rating_opponent_multiple_games' => 'Rating opponent multiple games',
        'rating_player_multiple_games' => 'Rating player multiple games',
        'total_score' => 'Total score',
    ],
    'js' => <<<'JS'
/* The page hook has already run by the time this one does, so the values
   below are its results: tidy the reference site's markup out of them
   before they reach the panel. */
omni.onResult([], function (ctx, values) {
  var rows = [
    'games_number',
    'opponent_rating_difference_multiple_games',
    'opponent_rating_difference_single_game',
    'opponent_total_score',
    'rating_difference_multiple_games',
    'rating_difference_single_game',
    'rating_opponent_multiple_games',
    'rating_player_multiple_games',
    'total_score'
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
