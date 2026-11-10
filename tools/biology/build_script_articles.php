<?php
/**
 * Build the article for a page whose working is a script, not a formula.
 *
 * The harvested copy for these pages was written by the formula builder, so it
 * said things that were never true of them: that the sequence box held "a plain
 * number", that a past answer could be typed back in to solve backwards, that
 * the page applied "one relationship". None of it survives here. The text is
 * assembled from two sources only: the page's own form (read out of the file
 * and out of a real Chromium run, kept in script_pages.json) and the
 * hand-written copy in script_copy_*.php.
 *
 *     php tools/biology/build_script_articles.php [slug …]
 */
require __DIR__ . '/../../config.php';

use Onim\CalcFile;

$ROOT = dirname(__DIR__, 2);
$facts = json_decode((string) file_get_contents(__DIR__ . '/script_pages.json'), true);
$copy = [];
foreach (['a', 'b', 'c', 'd', 'z'] as $part) {
    $path = __DIR__ . '/script_copy_' . $part . '.php';
    if (is_file($path)) {
        foreach ((require $path) as $slug => $entry) {
            /* later files may override a single key without repeating the rest */
            $copy[$slug] = array_merge($copy[$slug] ?? [], $entry);
        }
    }
}

$only = array_slice($argv, 1);
$fail = 0;

/** A value shown in the worked example: whole, or shortened when it is a sequence. */
function show_value(string $v): string
{
    $v = trim($v);
    if (mb_strlen($v) <= 64) {
        return $v;
    }
    return mb_substr($v, 0, 48) . '… (' . mb_strlen($v) . ' characters)';
}

/** How a control is described in prose. */
function kind_words(array $f): string
{
    $tag = strtolower((string) ($f['tag'] ?? ''));
    $type = strtolower((string) ($f['type'] ?? ''));
    if ($tag === 'textarea') {
        return 'a text box that takes a whole sequence';
    }
    if ($tag === 'select' || ($f['options'] ?? null)) {
        return 'a drop-down with the choices the page offers';
    }
    if ($type === 'radio') {
        return 'a set of choices, one of which stays selected';
    }
    if ($type === 'checkbox') {
        return 'a tick box';
    }
    if ($type === 'text') {
        return 'a text box';
    }
    return 'a number box';
}

/** The paste paragraph, chosen for what the page actually takes. */
function paste_paragraph(array $inputs): string
{
    $text = 0;
    $seq = 0;
    foreach ($inputs as $f) {
        if (($f['tag'] ?? '') === 'textarea' || ($f['type'] ?? '') === 'text') {
            $text++;
            if (preg_match('~sequence|protein|primer|pattern|proteins~i', (string) $f['name'])) {
                $seq++;
            }
        }
    }
    if ($seq === 0) {
        return '<p>Nothing here is pasted from a file: every box is short enough to type, and '
            . 'the choice lists mean the answer depends on which entry is selected rather than on how it is spelled.</p>';
    }
    return '<p>A sequence box is the one part of this form that fails silently. Header lines, line numbers, '
        . 'spaces and lower case are the four things that change an answer without any warning: a FASTA '
        . 'description line in front of the bases is read as sequence unless it is removed, the numbers down '
        . 'the left of a viewer are read as letters, and case means whatever the page says it means. Paste the '
        . 'bare letters, check the first and last few characters in the box, and only then press Calculate.</p>';
}

function list_section(string $lead, array $items): string
{
    $out = $lead === '' ? '' : '<p>' . $lead . '</p>';
    $out .= '<ul>';
    foreach ($items as $k => $v) {
        $out .= '<li><strong>' . htmlspecialchars((string) $k, ENT_QUOTES) . '</strong> — ' . $v . '</li>';
    }
    return $out . '</ul>';
}


/** One table of labelled values. */
function value_table(array $pairs): string
{
    $out = '<table><tbody>';
    foreach ($pairs as [$label, $value]) {
        $out .= '<tr><th>' . htmlspecialchars((string) $label, ENT_QUOTES) . '</th><td>'
            . htmlspecialchars(show_value((string) $value), ENT_QUOTES) . '</td></tr>';
    }
    return $out . '</tbody></table>';
}

/** The label of a field or result, given its name. */
function label_of(array $rows, string $name): string
{
    foreach ($rows as $r) {
        if (($r['name'] ?? '') === $name) {
            return trim((string) ($r['label'] ?? '')) !== '' ? (string) $r['label'] : $name;
        }
    }
    return $name;
}

foreach ($copy as $slug => $c) {
    if ($only !== [] && !in_array($slug, $only, true)) {
        continue;
    }
    $file = $ROOT . '/plugins/calc/biology/qm-calc-' . $slug . '.php';
    if (!is_file($file) || !isset($facts[$slug])) {
        echo "skip $slug (no file or no facts)\n";
        $fail++;
        continue;
    }
    $def = include $file;
    $fact = $facts[$slug];
    $h1 = (string) ($def['meta']['h1'] ?? $def['name']);

    $def['meta']['title'] = $c['title'];
    $def['meta']['description'] = $c['desc'];
    $def['article']['intro'] = $c['intro'];

    $enter = '';
    foreach ($fact['inputs'] as $f) {
        $line = '<strong>' . htmlspecialchars((string) $f['label'], ENT_QUOTES) . '</strong> — '
            . kind_words($f);
        if (trim((string) ($f['help'] ?? '')) !== '') {
            $line .= '. ' . htmlspecialchars(trim((string) $f['help']), ENT_QUOTES);
        }
        $enter .= '<li>' . $line . '.</li>';
    }
    $backs = [];
    foreach ($fact['results'] as $r) {
        $label = trim((string) $r['label']);
        $suffix = trim((string) ($r['suffix'] ?? ''));
        $backs[] = $suffix === '' ? $label : $label . ' (' . $suffix . ')';
    }
    $backs_list = '';
    foreach ($backs as $b) {
        $backs_list .= '<li>' . htmlspecialchars($b, ENT_QUOTES) . '</li>';
    }
    $back = '<p>The answer comes back as ' . count($backs) . ' boxes: '
        . htmlspecialchars(implode(', ', $backs), ENT_QUOTES)
        . '. They are written by the page, not typed into — there is no second box to fill and nothing to submit.</p>';

    $ex = $fact['example'];
    $exIn = '<table><tbody>';
    foreach ($ex['inputs'] as $k => $v) {
        $label = $k;
        foreach ($fact['inputs'] as $f) {
            if ($f['name'] === $k) {
                $label = $f['label'] !== '' ? $f['label'] : $k;
            }
        }
        $exIn .= '<tr><th>' . htmlspecialchars((string) $label, ENT_QUOTES) . '</th><td>'
            . htmlspecialchars(show_value((string) $v), ENT_QUOTES) . '</td></tr>';
    }
    $exIn .= '</tbody></table>';
    $exOut = '<table><tbody>';
    foreach ($ex['values'] as [$k, $v]) {
        $label = $k;
        $suffix = '';
        foreach ($fact['results'] as $r) {
            if ($r['name'] === $k) {
                $label = $r['label'] !== '' ? $r['label'] : $k;
                $suffix = trim((string) ($r['suffix'] ?? ''));
            }
        }
        $exOut .= '<tr><th>' . htmlspecialchars((string) $label, ENT_QUOTES) . '</th><td>'
            . htmlspecialchars(show_value((string) $v), ENT_QUOTES)
            . ($suffix !== '' ? ' ' . htmlspecialchars($suffix, ENT_QUOTES) : '') . '</td></tr>';
    }
    $exOut .= '</tbody></table>';

    $boxes = '';
    foreach ($fact['inputs'] as $f) {
        $boxes .= '<p><strong>' . htmlspecialchars((string) $f['label'], ENT_QUOTES) . '</strong> is '
            . kind_words($f) . '.';
        if (!empty($f['options'])) {
            $opts = array_map(fn($o) => htmlspecialchars((string) $o, ENT_QUOTES), $f['options']);
            $boxes .= ' The choices are ' . implode(', ', array_slice($opts, 0, -1)) . ' and ' . end($opts) . '.';
        }
        if (trim((string) ($f['help'] ?? '')) !== '') {
            $boxes .= ' ' . htmlspecialchars(trim((string) $f['help']), ENT_QUOTES);
        }
        $boxes .= ' Leave it empty only if you mean to — a blank box is not a zero.</p>';
    }

    $defs = '';
    if (!empty($c['defs'])) {
        $defs = '<ul>';
        foreach ($c['defs'] as $k => $v) {
            $defs .= '<li><strong>' . htmlspecialchars((string) $k, ENT_QUOTES) . '</strong> — ' . $v . '</li>';
        }
        $defs .= '</ul>';
    }

    $second = $fact['second'] ?? null;
    $second_html = '';
    if ($second && !empty($second['values'])) {
        $pairs_in = [];
        foreach ($second['inputs'] as $k => $v) {
            $pairs_in[] = [label_of($fact['inputs'], (string) $k), (string) $v];
        }
        $pairs_out = [];
        foreach ($second['values'] as [$k, $v]) {
            $pairs_out[] = [label_of($fact['results'], (string) $k), (string) $v];
        }
        $changed = 0;
        $first = [];
        foreach ($ex['values'] as [$k, $v]) {
            $first[(string) $k] = (string) $v;
        }
        foreach ($second['values'] as [$k, $v]) {
            if (($first[(string) $k] ?? null) !== (string) $v) {
                $changed++;
            }
        }
        $second_html = '<p>The same page run a second time, with different text in the boxes, is the quickest way '
            . 'to see what the answer is actually made of. This time the inputs were:</p>' . value_table($pairs_in)
            . '<p>and the panel returned:</p>' . value_table($pairs_out)
            . '<p>' . $changed . ' of the ' . count($second['values']) . ' figures moved. That is the point of the '
            . 'exercise: a figure that changes when the paste changes is being computed from it, and a figure that '
            . 'stays put is reporting something else — a setting, a count of what you filled in, or a default.</p>';
    }

    $def['article']['sections'] = [
        [
            'title' => 'How this calculator works',
            'html' => '<p>' . $c['does'] . '</p><p>' . $c['how'] . '</p>',
        ],
        [
            'title' => 'What to enter, and what comes back',
            'html' => '<p>There are ' . count($fact['inputs']) . ' things to fill in, and the order does not matter:</p>'
                . '<ul>' . $enter . '</ul>' . $back,
        ],
        [
            'title' => 'Using it in a hurry',
            'html' => '<ol>'
                . '<li><strong>Put the sequence in.</strong> Paste the letters into the box that asks for them, '
                . 'without a header line, and check the first and last few characters of what landed.</li>'
                . '<li><strong>Set the choices.</strong> Every drop-down and radio has a default. Change the ones '
                . 'that do not describe your case before you press anything.</li>'
                . '<li><strong>Press Calculate once.</strong> The panel fills in every result box at the same time. '
                . 'Nothing is submitted and nothing is uploaded.</li>'
                . '<li><strong>Read the figures in the order they are listed</strong> — the first one is the '
                . 'headline and the rest qualify it. A figure that looks impossible is almost always a paste '
                . 'problem, not a calculation problem.</li>'
                . '<li><strong>Change one thing to check it.</strong> Move a single input and watch which figures '
                . 'move. That tells you what the answer is actually built from.</li>'
                . '</ol>'
                . '<p>The whole page is those five steps. There is no account, no upload and no second screen.</p>',
        ],
        [
            'title' => 'The form, box by box',
            'html' => $boxes,
        ],
        [
            'title' => 'A worked example on this page',
            'html' => '<p>These are real values produced by this page in a browser, not numbers chosen to look tidy. '
                . 'The boxes were filled like this:</p>' . $exIn
                . '<p>and the page reported:</p>' . $exOut
                . '<p>' . $c['example_note'] . '</p>',
        ],
    ];
    if ($second_html !== '') {
        $def['article']['sections'][] = [
            'title' => 'A second run, and what moved',
            'html' => $second_html,
        ];
    }
    $def['article']['sections'] = array_merge($def['article']['sections'], [
        [
            'title' => 'What each result tells you',
            'html' => $defs . '<p>' . $c['read'] . '</p>'
                . '<p>Every figure in the panel is worked out from the same input at the same moment, so they '
                . 'belong together: reading one without the others is how a plausible number gets mistaken for a '
                . 'right one. The figures carry the units shown beside them, and no unit is converted behind your '
                . 'back — a length is the length of the sequence in the box, a percentage is a percentage of that '
                . 'same sequence.</p>',
        ],
        [
            'title' => 'Checking an answer by hand',
            'html' => '<p>' . $c['check'] . '</p>',
        ],
        [
            'title' => 'Where the answer usually goes wrong',
            'html' => list_section('Three things account for most wrong answers on a page like this:', $c['pitfalls'])
                . paste_paragraph($fact['inputs']),
        ],
        [
            'title' => 'Limits worth knowing',
            'html' => list_section('', $c['limits']),
        ],
        [
            'title' => 'How the page computes',
            'html' => '<p>' . $h1 . ' has no formula box, and that is deliberate. Its working is a string '
                . 'transformation — letters in, letters out — and a string transformation does not reduce to '
                . 'arithmetic on numbers. The page carries a script instead of an expression, and the script is '
                . 'the calculator: it reads the boxes above, does the work in your browser, and writes each answer '
                . 'into the box that carries its name.</p>'
                . '<p>That has two consequences worth stating plainly. Nothing is sent anywhere: the text you paste '
                . 'is analysed on your own machine and never leaves the tab. And there is no reverse solve: on a '
                . 'formula page you can type a result back in and solve for a missing input, but a script cannot be '
                . 'run backwards, so the result boxes here are read-only by design.</p>'
                . (isset($c['compute']) ? '<p>' . $c['compute'] . '</p>' : ''),
        ],
        [
            'title' => 'If the answer looks wrong',
            'html' => '<p>Work through these in order; on a page like this one of them usually explains it.</p>'
                . list_section('', [
                    'The paste is not what you think' => 'a header line, a line number or a lower-case block changes '
                        . 'the input without any visible sign. Clear the box, paste again, and look at the first and '
                        . 'last characters before pressing Calculate.',
                    'The choice is still on its default' => 'every drop-down and radio starts on the most common '
                        . 'option. If your case is any other one, set it deliberately.',
                    'A box was left empty' => 'an empty box is not a zero. Fill it or leave the whole question alone; '
                        . 'half a set of inputs produces half an answer, or none.',
                    'The input is too short' => 'below a few dozen characters most of these figures describe the '
                        . 'fragment rather than the molecule. Re-run on the full length.',
                    'The sequence is the wrong molecule' => 'DNA read as protein, protein read as DNA, RNA pasted into '
                        . 'a DNA box — the letters overlap enough that nothing complains, and the numbers are simply '
                        . 'about something else.',
                ])
                . '<p>If none of that explains it, the useful next step is the second-run section above: change one '
                . 'input, read the panel again, and see which figures move. A figure that moves is computed from your '
                . 'input; a figure that does not is reporting a setting.</p>',
        ],
        [
            'title' => 'Where this calculation comes up',
            'html' => '<p>' . $c['uses'] . '</p>' . (isset($c['extra']) ? '<p>' . $c['extra'] . '</p>' : ''),
        ],
    ]);

    $faq = $c['faq'];
    $faq[] = [
        'q' => 'Does ' . $h1 . ' use a formula I can read?',
        'a' => 'No. The working is a script that handles the letters themselves, so there is no single expression '
            . 'to print. What you can check is the output: every result box is named, and every one of them is '
            . 'produced by the script from the inputs above it.',
    ];
    $faq[] = [
        'q' => 'Is the sequence I paste uploaded anywhere?',
        'a' => 'No. The script runs in your browser and the page makes no request with your input. Close the tab '
            . 'and the text is gone.',
    ];
    $def['article']['faq'] = $faq;

    if (mb_strlen($def['meta']['title']) < 50 || mb_strlen($def['meta']['title']) > 60) {
        echo "TITLE $slug: " . mb_strlen($def['meta']['title']) . " chars\n";
        $fail++;
    }
    if (mb_strlen($def['meta']['description']) < 150 || mb_strlen($def['meta']['description']) > 160) {
        echo "DESC  $slug: " . mb_strlen($def['meta']['description']) . " chars\n";
        $fail++;
    }

    file_put_contents($file, CalcFile::render($def, '/biology/' . $slug));
    $words = CalcFile::words($def["article"]);
    echo str_pad($slug, 34), $words, " words\n";
    if ($words < 1500) {
        echo "SHORT $slug: $words\n";
        $fail++;
    }
}

echo $fail === 0 ? "all pages built\n" : "$fail problems\n";
exit($fail === 0 ? 0 : 1);
