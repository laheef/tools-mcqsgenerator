<?php

declare(strict_types=1);

namespace Onim;

/**
 * CalcSeo — the metadata rules for a calculator page, in one place.
 *
 * The rules come from the seo-page skill in AgricIDaniel/claude-seo, which is
 * the checklist this site is held to:
 *
 *   title       50–60 characters, primary keyword first, one per page
 *   description 150–160 characters, complete sentences, never a restatement of
 *               the title and never a stock tail ("a free … calculator with the
 *               formula, units and a worked example")
 *   H1          one, and the same phrase the title opens with
 *   FAQ         present, and answered in the article's own voice
 *
 * Three hundred pages written by hand drift away from rules like these one page
 * at a time; three hundred pages written by a script fail them the same way,
 * which is what had happened here — every description had been cut at 160
 * characters mid-word, and a third of them ended in the same template. So the
 * rules are code: the same function decides every title and every description,
 * and a page that cannot satisfy them is reported rather than quietly passed.
 */
final class CalcSeo
{
    /** Appended by the layout to every <title>. */
    public const BRAND = ' | Onim';
    public const BRAND_LEN = 7;

    public const TITLE_MIN = 50;
    public const TITLE_MAX = 60;
    public const DESC_MIN = 150;
    public const DESC_MAX = 160;

    /**
     * A title of 50–60 characters including the brand.
     *
     * The variants run from the plainest to the most specific; the first that
     * fits wins. "Calculator" is in every one of them because it is the word
     * the page is trying to be found for.
     *
     * @param array<int,array{title?:string,html?:string}> $article
     * @return array{0:string,1:bool} [title, fits]
     */
    public static function title(string $name, string $cat, array $article = []): array
    {
        $name    = self::cleanName($name);
        $catName = self::catName($cat);

        /*
         * A name that already names its own instrument — "Calculator",
         * "Converter", "Finder" — is the phrase people search for, and
         * "Converter Calculator" reads like a machine wrote it. Such a name is
         * kept whole and only extended; a bare noun gets "Calculator" added.
         */
        $hasCalc = stripos($name, 'calculator') !== false
            || preg_match('~\b(converter|generator|checker|finder|builder|estimator|tracker|analyzer|analyser|simulator|solver|culator)\b[^a-z]*$~i', $name) === 1;

        $base = $hasCalc ? $name : (string) preg_replace('~\s+Calculator$~i', '', $name);

        /*
         * Tails, shortest first, so the plainest title that fits the window
         * wins. A name that already says what kind of instrument it is never
         * gets a second "Calculator".
         */
        $tails = [
            '',
            ' — ' . $catName,
            ' (' . $catName . ')',
            ' Calculator',
            ' — Results',
            ' — Formula',
            ' — Formula & Results',
            ': Formula & Results',
            ': Formula, Steps & Results',
            ' — Formula, Steps & Examples',
            ' Calculator — Formula & Results',
            ' Calculator: Formula, Steps & Examples',
            ' — Free Online Calculator',
            ' Calculator for ' . $catName,
            ' for ' . $catName . ' — Formula & Results',
            ' Calculator — Free, With Worked Examples',
            ' Calculator for ' . $catName . ' — Formula & Results',
            ' for ' . $catName . ' — Formula, Steps & Results',
        ];
        if ($hasCalc) {
            $tails = array_values(array_filter($tails, static fn (string $t): bool => !str_contains($t, 'Calculator')));
        }

        $best      = '';
        $bestDelta = PHP_INT_MAX;
        foreach ($tails as $tail) {
            $candidate = $base . $tail;
            $len = mb_strlen($candidate, 'UTF-8') + self::BRAND_LEN;
            if ($len >= self::TITLE_MIN && $len <= self::TITLE_MAX) {
                return [$candidate, true];
            }
            $delta = abs($len - 55);
            if ($delta < $bestDelta && $len <= self::TITLE_MAX + 8) {
                $best = $candidate;
                $bestDelta = $delta;
            }
        }

        /* A name too long for any tail: cut it on a word boundary and add the
           shortest tail that fits. The page keeps its full name in the H1; only
           the <title> is shortened, which is what the 60-character limit is
           for. */
        foreach ($tails as $tail) {
            $room = self::TITLE_MAX - self::BRAND_LEN - mb_strlen($tail, 'UTF-8');
            if ($room < 22) {
                continue;
            }
            $candidate = self::clip($base, $room) . $tail;
            $len = mb_strlen($candidate, 'UTF-8') + self::BRAND_LEN;
            if ($len >= self::TITLE_MIN && $len <= self::TITLE_MAX) {
                return [$candidate, true];
            }
        }

        if ($best === '') {
            $best = self::clip($base . ' Calculator', self::TITLE_MAX - self::BRAND_LEN, false);
        }
        return [$best, false];
    }

    /**
     * A description of 150–160 characters, built from the page's own first
     * sentences and ending on a full stop.
     *
     * @param array{intro?:string,sections?:array} $article
     * @return array{0:string,1:bool} [description, fits]
     */
    public static function description(string $name, array $article, array $facts = []): array
    {
        /*
         * A meta description is a whole thought, not the first 160 characters of
         * one.
         *
         * The previous pass assembled the page's own sentences and, when the
         * window filled up mid-sentence, cut there and added an ellipsis. That
         * produced 223 descriptions in 320 ending in "…" — every one of them a
         * sentence the reader can see is broken, and every one of them the same
         * shape as its neighbours. A description that stops mid-clause is worse
         * than a shorter one that ends.
         *
         * So the composer only ever joins COMPLETE sentences, and when the
         * article's own sentences do not add up to the window it writes a
         * sentence from the page's facts instead (its inputs, its answers, its
         * units, its worked example). Both routes end on a full stop and land
         * inside 150–160 characters, and the route is chosen per page so the
         * catalogue does not read as one template.
         */
        $clean = static function (string $text): string {
            $text = trim((string) preg_replace('~\s+~', ' ', $text));
            return $text;
        };

        /* ---------------------------------------------------------- the pool */
        /*
         * A description has to stand on its own. The page's prose is full of
         * sentences that only make sense where they sit ("Compare it with the
         * defaults above before trusting it"), so the only ones quoted here are
         * the ones that name the calculator — those read correctly with nothing
         * around them.
         */
        $pool = [];
        $intro = self::stripTemplate(strip_tags((string) ($article['intro'] ?? '')));
        $pool[] = $intro;
        foreach (array_slice((array) ($article['sections'] ?? []), 0, 6) as $section) {
            $pool[] = trim(strip_tags((string) ($section['html'] ?? '')));
        }

        $cleanName = self::cleanName($name);
        $nameKey   = mb_strtolower($cleanName, 'UTF-8');
        $uiWords = [' the button', 'the box', 'boxes', 'the panel', 'press calculate', 'the form',
            'grey boxes', 'click', 'dropdown', 'the field', 'results panel', 'type in', 'typing',
            'on the page', 'copy out', 'this calculator', 'the calculator does', 'fields on this form',
            'this form are a', 'the unit chip', 'it opens in', 'results leave', 'leave the screen',
            'the defaults above', 'this page', 'the page', 'above'];

        $quotable = [];
        foreach ($pool as $block) {
            foreach (self::sentences($block) as $sentence) {
                $len = mb_strlen($sentence, 'UTF-8');
                if ($len < 60 || $len > 230) {
                    continue;
                }
                $lower = mb_strtolower($sentence, 'UTF-8');
                if (!str_contains($lower, $nameKey)) {
                    continue;                       // does not name the subject
                }
                foreach ($uiWords as $ui) {
                    if (str_contains($lower, $ui)) {
                        continue 2;
                    }
                }
                if (preg_match('~^[a-z]~u', $sentence) === 1
                    || preg_match('~[=×√]~u', $sentence) === 1
                    || substr_count($sentence, ' and ') > 6) {
                    continue;
                }
                $quotable[$sentence] = true;
            }
        }
        $quotable = array_keys($quotable);

        /* ------------------------------------------------------ candidates */
        $candidates = [];
        $asserted = [];
        $add = static function (array $parts, bool $fromFacts = false) use (&$candidates, &$asserted, $clean): void {
            $parts = array_values(array_filter(array_map($clean, $parts), static fn (string $p): bool => $p !== ''));
            if ($parts === []) {
                return;
            }
            $text = implode(' ', $parts);
            if (!preg_match('~[.!?]$~u', $text)) {
                $text .= '.';
            }
            $len = mb_strlen($text, 'UTF-8');
            if ($len >= self::DESC_MIN && $len <= self::DESC_MAX) {
                $candidates[] = $text;
                if ($fromFacts) {
                    $asserted[] = $text;
                }
            }
        };

        $tails = self::factTails($facts);
        foreach ($quotable as $sentence) {
            $add([$sentence]);
            foreach ($tails as $variants) {
                foreach ($variants as $tail) {
                    $add([$sentence, $tail]);
                }
            }
        }
        foreach (self::factSentences($name, $article, $facts) as $sentences) {
            $add($sentences, true);
            foreach ($tails as $t1 => $variants) {
                foreach ($variants as $tail) {
                    $add(array_merge($sentences, [$tail]), true);
                    /* Two clauses from different topics make one longer
                       description: a page whose answer has a one-word name
                       needs both to reach the window. */
                    foreach ($tails as $t2 => $others) {
                        if ($t2 === $t1) {
                            continue;
                        }
                        foreach ($others as $second) {
                            $add(array_merge($sentences, [$tail, $second]), true);
                        }
                    }
                }
            }
        }

        /* A sentence written from the form — what goes in, what comes back —
           says more about the page than a line lifted from its prose, which is
           generic by nature ("Units for X default to Celsius and can be changed
           on the answer itself"). Facts first; quoted sentences when the facts
           cannot fill the window. */
        if ($asserted !== []) {
            $candidates = $asserted;
        }

        if ($candidates !== []) {
            /* The page's own name once is enough. A description that says it a
               second time wastes the window on the words the title already
               spent: "Annealing temperature returns annealing temperature (Tₐ)". */
            $needle = mb_strtolower($cleanName, 'UTF-8');
            if ($needle !== '') {
                $once = array_values(array_filter($candidates, static fn (string $c): bool => substr_count(mb_strtolower($c, 'UTF-8'), $needle) <= 1));
                if ($once !== []) {
                    $candidates = $once;
                }
            }
            /* Fewest sentences wins: "X works out Y from Z. The formula is
               printed in the form's own words." is a description; three clauses
               where two will do read like a keyword list. */
            $least = PHP_INT_MAX;
            foreach ($candidates as $candidate) {
                $least = min($least, substr_count($candidate, '. ') + 1);
            }
            $candidates = array_values(array_filter(
                $candidates,
                static fn (string $c): bool => substr_count($c, '. ') + 1 === $least
            ));
            /* Deterministic per page, so a re-run produces the same metadata. */
            $pick = (int) (hexdec(substr(sha1($cleanName), 0, 4)) % count($candidates));
            $text = self::fixLabelCase($candidates[$pick]);
            $len = mb_strlen($text, 'UTF-8');
            $fits = $len >= self::DESC_MIN && $len <= self::DESC_MAX
                && mb_strtoupper(rtrim($text, '.')) !== mb_strtoupper($cleanName);
            return [$text, $fits];
        }

        /*
         * Nothing fit: say the plainest true thing about the page, and then
         * extend it with as many clauses as it takes to fill the window. This is
         * the route for a page whose answers have no labels at all — its sums
         * run in a page script, so there is nothing to name.
         */
        $plain = $cleanName . ' works out its answer from the values you enter'
            . (isset($facts['unit']) && (string) $facts['unit'] !== '' ? ', in ' . $facts['unit'] : '')
            . '.';
        $flat = [];
        foreach ($tails as $variants) {
            foreach ($variants as $tail) {
                $flat[$tail] = true;
            }
        }
        $flat = array_keys($flat);
        $built = [];
        foreach ($flat as $i => $one) {
            $add([$plain, $one]);
            foreach ($flat as $j => $two) {
                if ($j !== $i) {
                    $add([$plain, $one, $two]);
                }
            }
        }
        if ($candidates !== []) {
            $pick = (int) (hexdec(substr(sha1($cleanName . '|plain'), 0, 4)) % count($candidates));
            $text = self::fixLabelCase($candidates[$pick]);
            $len = mb_strlen($text, 'UTF-8');
            return [$text, $len >= self::DESC_MIN && $len <= self::DESC_MAX];
        }
        return [$plain, false];
    }

    /** "Minimum_dose_tablets" -> "Minimum dose tablets". */
    private static function humanName(string $var): string
    {
        $words = (string) preg_replace('~[_\-]+~', ' ', $var);
        $words = trim((string) preg_replace('~(?<=[a-z0-9])(?=[A-Z])~', ' ', $words));
        if ($words === '') {
            return '';
        }
        return mb_strtoupper(mb_substr($words, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($words, 1, null, 'UTF-8');
    }

    /**
     * True, page-specific extra sentences a description can end on.
     *
     * They are not a stock call to action — none of them asks the reader to do
     * anything — they state what the page contains. Each topic carries several
     * lengths because the window is narrow, and two clauses on the same topic
     * are never joined: "with a worked example. The formula and a worked example
     * are on the page." says one thing twice.
     *
     * @return array<string,array<int,string>> topic => sentences, shortest first
     */
    private static function factTails(array $facts): array
    {
        $unit = trim((string) ($facts['unit'] ?? ''));
        $out = [];
        /* Only a symbol reads correctly in a sentence ("88 °C", "24 kg"); a
           unit spelled out ("hectare") would need its own grammar. */
        if ($unit !== '' && mb_strlen($unit, 'UTF-8') <= 6 && mb_strlen($unit, 'UTF-8') > 1
            && preg_match('~\p{L}~u', $unit) === 1) {
            $out['unit'] = ['The answer is shown in ' . $unit . '.', 'Results come back in ' . $unit . ', with any other unit a click away.'];
        }
        $out['formula'] = [
            'The formula is printed in the form\'s own words.',
            'The formula is printed in the form\'s own words, so the arithmetic can be checked.',
        ];
        $out['solve'] = [
            'Any box can be the unknown.',
            'Every box can be solved for, not only the one in the title.',
        ];
        $out['compute'] = [
            'Every figure is computed.',
            'Each figure is computed from the boxes you fill, never read from a table.',
        ];
        $out['example'] = [
            'A worked example follows.',
            'A worked example walks through the arithmetic with this page\'s own numbers.',
        ];
        $out['units'] = [
            'Each box lists the units it accepts, and the answer converts between them.',
        ];
        return $out;
    }

    /**
     * Complete sentences built from the calculator's own facts.
     *
     * Each entry is a list of sentences to join. Several lengths are offered
     * because the window is narrow: a short answer needs another clause, a long
     * one needs fewer.
     *
     * @return array<int,array<int,string>>
     */
    private static function factSentences(string $name, array $article, array $facts): array
    {
        $list = static function (array $items, int $max): string {
            $items = array_values(array_unique(array_filter(array_map('trim', $items), static fn (string $i): bool => $i !== '')));
            $items = array_slice($items, 0, $max);
            if ($items === []) {
                return '';
            }
            if (count($items) === 1) {
                return $items[0];
            }
            $last = array_pop($items);
            return implode(', ', $items) . ' and ' . $last;
        };
        $lower = static fn (string $s): string => self::inSentence($s);

        $outs = array_map($lower, (array) ($facts['outputs'] ?? []));
        $ins  = array_map($lower, (array) ($facts['inputs'] ?? []));

        /* A page must not be described as reporting its own title: "Annealing
           temperature reports annealing temperature (Tₐ)" tells a reader
           nothing. When the calculator has other answers they are named
           instead. */
        $self = mb_strtolower((string) preg_replace('~\s+(calculator|converter|generator)$~i', '', trim($name)), 'UTF-8');
        $self = mb_strtolower(self::cleanName($self), 'UTF-8');
        $others = array_values(array_filter($outs, static function (string $o) use ($self): bool {
            $o = (string) preg_replace('~\s*\([^)]*\)\s*$~u', '', $o);
            return $o !== '' && !str_starts_with($o, $self) && !str_contains($self, $o);
        }));
        if ($others !== []) {
            $outs = $others;
        }
        $unit = trim((string) ($facts['unit'] ?? ''));
        $answer = trim((string) ($facts['answer'] ?? ''));

        $outList = $list($outs, 2);
        $inList  = $list($ins, 3);
        $outAll  = $list($outs, 4);
        $inAll   = $list($ins, 5);

        $out = [];
        /* A page whose relationship is written without a subject (C1V1 = C2V2)
           has no answers to name — every box can be the unknown, so say that. */
        if ($outs === [] && $ins !== []) {
            $threeIn = $list($ins, 3);
            $allIn   = $list($ins, 5);
            if ($threeIn !== '') {
                $out[] = [sprintf('%s works out whichever of %s is left blank.', $name, $threeIn)];
                $out[] = [sprintf('%s solves for any one of %s, given the rest.', $name, $threeIn)];
            }
            if ($allIn !== '') {
                $out[] = [sprintf('%s works out the missing figure from %s.', $name, $allIn)];
            }
        }
        $oneOut = $list($outs, 1);
        $twoOut = count($outs) >= 2 ? $list($outs, 2) : '';
        $oneIn  = $list($ins, 1);
        $twoIn  = count($ins) >= 2 ? $list($ins, 2) : '';

        if ($outList !== '' && $inList !== '') {
            $out[] = [sprintf('%s works out %s from %s.', $name, $outList, $inList)];
            $out[] = [sprintf('%s takes %s and returns %s.', $name, $inList, $outList)];
            $out[] = [sprintf('Enter %s and %s returns %s.', $inList, $name, $outList)];
            $out[] = [sprintf('%s turns %s into %s.', $name, $inList, $outList)];
        }
        /* Shorter forms, for a long name or a long label list: the window is
           150–160 characters and a description that has to be cut to fit is a
           description that ends mid-sentence. */
        if ($twoOut !== '' && $twoIn !== '') {
            $out[] = [sprintf('%s works out %s from %s.', $name, $twoOut, $twoIn)];
            $out[] = [sprintf('%s turns %s into %s.', $name, $twoIn, $twoOut)];
        }
        if ($oneOut !== '' && $twoIn !== '') {
            $out[] = [sprintf('%s works out %s from %s.', $name, $oneOut, $twoIn)];
            $out[] = [sprintf('%s turns %s into %s.', $name, $twoIn, $oneOut)];
        }
        if ($oneOut !== '' && $oneIn !== '') {
            $out[] = [sprintf('%s works out %s from %s.', $name, $oneOut, $oneIn)];
            $out[] = [sprintf('%s takes %s and returns %s.', $name, $oneIn, $oneOut)];
        }
        if ($twoOut !== '') {
            $out[] = [sprintf('%s reports %s.', $name, $twoOut)];
            $out[] = [sprintf('%s works out %s and reports both.', $name, $twoOut)];
        }
        if ($oneOut !== '') {
            /* When the answer is named after the page, a sentence with both in it
               says the name twice — "Annealing temperature returns annealing
               temperature (Tₐ)". The verb-first form drops it to one. */
            $outKey = mb_strtolower($oneOut, 'UTF-8');
            $isSelf = $outKey !== '' && (str_starts_with($outKey, $self) || str_starts_with($self, $outKey));
            /* No "Work out X from Y with <name>": a page name dropped after
               "with" reads as a colleague, not a calculator. */
            if ($isSelf && $twoIn !== '') {
                $out[] = [sprintf('Enter %s and get %s back.', $twoIn, self::inSentence($oneOut))];
            }
            $out[] = [sprintf('%s works out %s.', $name, $oneOut)];
        }
        if ($outAll !== '') {
            $out[] = [sprintf('%s reports %s.', $name, $outAll)];
        }
        if ($answer !== '') {
            if ($inList !== '' && $outList !== '') {
                $out[] = [sprintf('With %s as the starting point, %s returns %s. It also shows the formula and a worked example.', $inList, $name, $answer)];
            }
            $out[] = [sprintf('%s, with a worked example that lands on %s.', ucfirst($outList ?: 'the answer'), $answer)];
        }
        return $out;
    }

    /**
     * Labels are printed inside sentences, so a sentence-case label loses its
     * capital there: "works out Anion gap" -> "works out anion gap". Acronyms
     * and proper names keep theirs (see inSentence).
     */
    private static function fixLabelCase(string $text): string
    {
        /* Only the words that follow "works out / returns / from / into / as"
           are labels in practice; a blanket lowercase would wreck the title
           words the sentence legitimately capitalises. */
        return (string) preg_replace_callback(
            '~\b(works out|returns|reads|turns|takes|from|into|with|as|reports)\s+([A-Z][a-z])~u',
            static fn (array $m): string => $m[1] . ' ' . mb_strtolower($m[2], 'UTF-8'),
            $text
        );
    }

    /**
     * The facts a description can be written from, read off the calculator's
     * own record: what the reader enters, what comes back, in which unit.
     *
     * @return array{inputs:array<int,string>,outputs:array<int,string>,unit:string,answer:string}
     */
    public static function factsFromShape(array $shape): array
    {
        $declared = [];
        foreach ((array) ($shape['equations'] ?? []) as $eq) {
            $formula = trim((string) ($eq['formula'] ?? ''));
            if (preg_match('~^([A-Za-z_][A-Za-z0-9_]*)\s*=~', $formula, $m) === 1) {
                $declared[$m[1]] = true;
                continue;
            }
            if (preg_match('~=\s*([A-Za-z_][A-Za-z0-9_]*)\s*$~', $formula, $m) === 1) {
                $declared[$m[1]] = true;
            }
        }

        $inputs = [];
        $outputs = [];
        $unit = '';
        foreach ((array) ($shape['groups'] ?? []) as $group) {
            foreach ($group['matrices'] ?? [] as $matrix) {
                foreach ($matrix['columns'] ?? [] as $column) {
                    foreach ($column as $field) {
                        if (($field['type'] ?? '') !== 'variable' || empty($field['var'])) {
                            continue;
                        }
                        $label = trim((string) ($field['label'] ?? ''));
                        if ($label === '') {
                            continue;
                        }
                        $var = (string) $field['var'];
                        $isOut = !empty($field['outputOnly']) || isset($declared[$var]);
                        if ($isOut) {
                            $outputs[$var] = $label;
                            if ($unit === '' && !empty($field['unitDefault'])) {
                                $unit = (string) $field['unitDefault'];
                            }
                        } else {
                            $inputs[$var] = $label;
                        }
                    }
                }
            }
        }
        /* A box that is also an answer is not something the reader supplies. */
        foreach (array_keys($outputs) as $var) {
            unset($inputs[$var]);
        }
        /*
         * A page can compute a dozen values without giving any of them a box:
         * the tramadol dose is worked out into a sentence, and every field on
         * the form is an input. Those answers are still what the page is for, so
         * they are named from the equations themselves rather than leaving the
         * description with nothing to say.
         */
        if ($outputs === []) {
            foreach (array_keys($declared) as $var) {
                if (isset($inputs[$var]) || $var === '') {
                    continue;
                }
                $label = trim((string) ($shape['variables'][$var]['label'] ?? ''));
                $outputs[$var] = $label !== '' ? $label : self::humanName($var);
            }
        }
        return [
            'inputs'  => array_values($inputs),
            'outputs' => array_values($outputs),
            'unit'    => $unit,
            'answer'  => '',
        ];
    }

    /** A field label as it reads inside a sentence. */
    public static function inSentence(string $label): string
    {
        $label = trim($label);
        if ($label === '' || preg_match('~^[^\p{L}]~u', $label) === 1) {
            return $label;
        }
        $first = mb_substr($label, 0, 1, 'UTF-8');
        $rest  = mb_substr($label, 1, null, 'UTF-8');
        if ($first === mb_strtolower($first, 'UTF-8')) {
            return $label;                       // already lower-case
        }
        /* Any capital after the first letter means the label is a name or an
           acronym — "pH", "PaCO₂", "DNA copy number" — and it is left alone.
           Only a plain sentence-case label ("Primer melting temperature") loses
           its capital in running prose. */
        if (preg_match('~\p{Lu}~u', $rest) === 1) {
            return $label;
        }
        return mb_strtolower($first, 'UTF-8') . $rest;
    }

    /**
     * Clauses of a sentence: the runs between commas and semicolons.
     *
     * @return array<int,string>
     */
    public static function clauses(string $text): array
    {
        $parts = preg_split('~(?<=[,;:])\s+~u', trim($text)) ?: [];
        $out = [];
        foreach ($parts as $p) {
            $p = trim($p);
            if ($p !== '') {
                $out[] = $p;
            }
        }
        return $out;
    }

    /**
     * Sentences, cut at real sentence ends.
     *
     * The intros are plain prose; a naive split on "." breaks on decimals and
     * abbreviations, so a full stop only ends a sentence when it is followed by
     * a space and a capital, and the sentence is not a numbered step.
     *
     * @return array<int,string>
     */
    public static function sentences(string $text): array
    {
        $text = trim((string) preg_replace('~\s+~', ' ', $text));
        if ($text === '') {
            return [];
        }
        $parts = preg_split('~(?<=[.!?])\s+(?=[A-Z0-9"\'(])~u', $text) ?: [];
        $out = [];
        foreach ($parts as $p) {
            $p = trim($p);
            if ($p === '') {
                continue;
            }
            if (!preg_match('~[.!?]$~u', $p)) {
                $p = rtrim($p, " ,;:—-");
                /* A block that simply stops is a truncated block: drop it rather
                   than ship half a sentence as a meta description. */
                if (!preg_match('~[.!?]$~u', $p)) {
                    continue;
                }
            }
            $out[] = $p;
        }
        return $out;
    }

    /** Remove the stock tail the old generator appended to every description. */
    public static function stripTemplate(string $text): string
    {
        $patterns = [
            /* The frames the old generator used on every page. A sentence that
               opens this way says nothing about *this* calculator, and 320 of
               them reading alike is what the metadata check is looking for. */
            '~\s*The [A-Za-z0-9 &\-–]{0,40} calculator takes the numbers you enter and reports[^.]*\.?~u',
            '~\s*Give the [A-Za-z0-9 &\-–]{0,50} calculator [^.]*\.?~u',
            '~\s*It returns [^.]{0,80} and the panel shows all of them at once\.?~u',
            '~\s*(A|a) free [a-z &-]{0,30}calculator[^.]*\.?~u',
            '~\s*Free [a-z &-]{0,30}calculator[^.]*\.?~u',
            '~\s*with the formula, units and a worked example[^.]*\.?~iu',
            '~\s*with the formula spelled out[^.]*\.?~iu',
            '~\s*[A-Za-z ]{0,40}: a free [a-z &-]{0,30}calculator[^.]*\.?~u',
        ];
        foreach ($patterns as $p) {
            $text = (string) preg_replace($p, ' ', $text);
        }
        return trim((string) preg_replace('~\s+~', ' ', $text));
    }

    /**
     * One plain sentence about what the page computes, from its own field
     * labels: "X works out A and B from C and D."
     *
     * Used only when the article has nothing quotable, which is the state the
     * bulk-written pages are in until their prose is rewritten.
     */
    public static function facts(string $name, array $article): string
    {
        $inputs = [];
        $outputs = [];
        foreach ((array) ($article['fields'] ?? []) as $field) {
            $label = trim((string) ($field['label'] ?? ''));
            if ($label === '') {
                continue;
            }
            if (($field['type'] ?? '') === 'result') {
                $outputs[] = mb_strtolower($label, 'UTF-8');
            } elseif (($field['type'] ?? '') !== 'note' && ($field['type'] ?? '') !== 'image') {
                $inputs[] = mb_strtolower($label, 'UTF-8');
            }
        }
        if ($outputs === []) {
            return '';
        }
        $list = static function (array $items, int $max): string {
            $items = array_slice(array_values(array_unique($items)), 0, $max);
            if (count($items) <= 1) {
                return (string) ($items[0] ?? '');
            }
            $last = array_pop($items);
            return implode(', ', $items) . ' and ' . $last;
        };
        $out = self::cleanName($name) . ' works out ' . $list($outputs, 3);
        if ($inputs !== []) {
            $out .= ' from ' . $list($inputs, 4);
        }
        return rtrim($out, ' .') . '.';
    }

    /** Trim to a length on a word boundary. */
    public static function clip(string $text, int $max, bool $ellipsis = true): string
    {
        $text = trim($text);
        if (mb_strlen($text, 'UTF-8') <= $max) {
            return $text;
        }
        $cut = mb_substr($text, 0, $max, 'UTF-8');
        $space = mb_strrpos($cut, ' ', 0, 'UTF-8');
        if ($space !== false) {
            $cut = mb_substr($cut, 0, $space, 'UTF-8');
        }
        return rtrim($cut, " ,;:—–-.") . ($ellipsis ? '' : '');
    }

    /** "Daily light integral (DLI)" — tidy capitalisation for a title. */
    public static function cleanName(string $name): string
    {
        $name = trim((string) preg_replace('~\s+~', ' ', $name));
        // "Raw dog food" -> "Raw dog food" (names are mostly fine as they are);
        // only an all-lowercase name gets its first letter raised.
        if ($name !== '' && mb_strtolower($name, 'UTF-8') === $name) {
            $name = mb_strtoupper(mb_substr($name, 0, 1, 'UTF-8'), 'UTF-8') . mb_substr($name, 1, null, 'UTF-8');
        }
        return $name;
    }

    public static function catName(string $cat): string
    {
        return match ($cat) {
            'biology' => 'Biology',
            'chemistry' => 'Chemistry',
            'physics' => 'Physics',
            'math' => 'Math',
            'statistics' => 'Statistics',
            'finance' => 'Finance',
            'health' => 'Health',
            'food' => 'Food',
            'sports' => 'Sports',
            'construction' => 'Construction',
            'ecology' => 'Ecology',
            'conversion' => 'Conversion',
            'everyday-life' => 'Everyday Life',
            default => ucfirst(str_replace('-', ' ', $cat)),
        };
    }
}
