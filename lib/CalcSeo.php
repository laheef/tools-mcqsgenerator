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
    public static function description(string $name, array $article): array
    {
        /*
         * The description is the page's own opening, cut to the window when it
         * runs long and extended with its own next sentences when it runs short.
         *
         * Two rules matter more than the exact length. It must not begin by
         * restating the title, and it must not end mid-word — a description that
         * stops at "…with the" is what the old generator produced on all 320
         * pages. So a cut always lands on a word boundary and says so with an
         * ellipsis, and a sentence that ends inside the window is kept whole.
         */
        $intro = self::stripTemplate(strip_tags((string) ($article['intro'] ?? '')));
        $pool  = [$intro];
        foreach (array_slice((array) ($article['sections'] ?? []), 0, 8) as $section) {
            $pool[] = trim(strip_tags((string) ($section['html'] ?? '')));
        }
        foreach (array_slice((array) ($article['faq'] ?? []), 0, 8) as $qa) {
            $pool[] = trim((string) ($qa['a'] ?? ''));
        }

        /*
         * Which sentences are worth 160 characters of a search result.
         *
         * A page about the acid–base balance has sentences about the anion gap
         * and sentences about where the Calculate button is. Both are true; only
         * one belongs in a meta description. So a sentence that names the thing
         * the page is about is preferred, a sentence that talks about boxes and
         * buttons is dropped, and the rest keep their order.
         */
        $nameWords = [];
        foreach (preg_split('~[^a-z0-9]+~', mb_strtolower(self::cleanName($name), 'UTF-8')) ?: [] as $word) {
            if (mb_strlen($word, 'UTF-8') >= 4 && !in_array($word, ['calculator', 'converter', 'generator', 'this', 'that', 'with', 'from', 'your'], true)) {
                $nameWords[$word] = true;
            }
        }
        $uiWords = [' the button', 'the box', 'boxes', 'the panel', 'press calculate', 'the form',
            'grey boxes', 'click', 'dropdown', 'the field', 'results panel', 'type in', 'typing',
            'on the page', 'below', 'copy out', 'this calculator', 'the calculator does',
            'fields on this form', 'this form are a', 'the unit chip', 'it opens in'];

        $topic = [];
        $other = [];
        foreach ($pool as $block) {
            foreach (self::sentences($block) as $sentence) {
                $len = mb_strlen($sentence, 'UTF-8');
                if ($len < 30) {
                    continue;
                }
                $lower = mb_strtolower($sentence, 'UTF-8');
                foreach ($uiWords as $ui) {
                    if (str_contains($lower, $ui)) {
                        continue 2;
                    }
                }
                /* Not a sentence a search result can open with: a fragment that
                   lost its subject to a <strong> tag, a formula, or a list of
                   form controls. */
                if (preg_match('~^[a-z]~u', $sentence) === 1
                    || str_contains($sentence, 'rearranged')
                    || str_contains($sentence, 'options, such as')
                    || preg_match('~[=×√]~u', $sentence) === 1) {
                    continue;
                }
                $hit = false;
                foreach ($nameWords as $word => $_) {
                    if (str_contains($lower, (string) $word)) {
                        $hit = true;
                        break;
                    }
                }
                if ($hit) {
                    $topic[] = $sentence;
                } else {
                    $other[] = $sentence;
                }
            }
        }
        $ordered = array_merge($topic, $other);

        $text = '';
        foreach ([$topic, $other] as $group) {
            foreach ($group as $sentence) {
                $len = mb_strlen($sentence, 'UTF-8');
                if (mb_strlen($text, 'UTF-8') + ($text === '' ? 0 : 1) + $len <= self::DESC_MAX) {
                    $text .= ($text === '' ? '' : ' ') . $sentence;
                    if (mb_strlen($text, 'UTF-8') >= self::DESC_MIN) {
                        break 2;
                    }
                    continue;
                }
                if (mb_strlen($text, 'UTF-8') < self::DESC_MIN) {
                    $room = self::DESC_MAX - 1 - mb_strlen($text, 'UTF-8') - ($text === '' ? 0 : 1);
                    $cut  = self::clip($sentence, max(0, $room));
                    if (mb_strlen($cut, 'UTF-8') >= 25) {
                        $text .= ($text === '' ? '' : ' ') . $cut . '…';
                        break 2;
                    }
                }
            }
        }

        /* Still short: add what the calculator does, in the plainest words the
           page allows, and cut that clause on a word boundary to land inside
           the window rather than stopping at 145. */
        if (mb_strlen($text, 'UTF-8') < self::DESC_MIN) {
            $fact = self::facts($name, $article);
            if ($fact !== '') {
                $join = $text === '' ? '' : ' ';
                if (mb_strlen($text . $join . $fact, 'UTF-8') <= self::DESC_MAX) {
                    $text = trim($text . $join . $fact);
                } else {
                    $room = self::DESC_MAX - mb_strlen($text, 'UTF-8') - mb_strlen($join, 'UTF-8');
                    if ($room >= 40) {
                        $text = trim($text . $join . self::clip($fact, $room));
                    }
                }
            }
        }

        /*
         * Last resort: a page whose best sentences all failed the readability
         * filters still needs 150 characters. Relaxed here — the interface
         * words are allowed back in, because a description that mentions the
         * form is better than one that stops halfway.
         */
        if (mb_strlen($text, 'UTF-8') < self::DESC_MIN) {
            foreach ($pool as $block) {
                foreach (self::sentences($block) as $sentence) {
                    if (mb_strlen($sentence, 'UTF-8') < 25 || str_contains($sentence, $text)) {
                        continue;
                    }
                    if (preg_match('~[=×√]~u', $sentence) === 1 || preg_match('~^[a-z]~u', $sentence) === 1) {
                        continue;
                    }
                    if (mb_strlen($text . ' ' . $sentence, 'UTF-8') <= self::DESC_MAX) {
                        $text = trim($text . ' ' . $sentence);
                        if (mb_strlen($text, 'UTF-8') >= self::DESC_MIN) {
                            break 2;
                        }
                    }
                }
            }
        }

        /*
         * Still under the window: give the description its subject. A reader
         * scanning results sees "Cell dilution: …" and knows what the page is
         * before reading a word of it; the phrase is the page's own name, not a
         * stock opener.
         */
        if (mb_strlen($text, 'UTF-8') < self::DESC_MIN && $text !== '') {
            $subject = self::cleanName($name);
            $lower = mb_strtolower($text, 'UTF-8');
            if ($subject !== '' && !str_starts_with($lower, mb_strtolower($subject, 'UTF-8'))) {
                $withSubject = $subject . ': ' . $text;
                if (mb_strlen($withSubject, 'UTF-8') <= self::DESC_MAX) {
                    $text = $withSubject;
                } else {
                    /* Drop whole sentences from the end until the longer text
                       fits: a complete sentence is worth more than one more
                       clause and an ellipsis. */
                    $sentences = self::sentences($text);
                    $keep = '';
                    foreach ($sentences as $sentence) {
                        $candidate = trim($keep . ' ' . $sentence);
                        if (mb_strlen($subject . ': ' . $candidate, 'UTF-8') > self::DESC_MAX) {
                            break;
                        }
                        $keep = $candidate;
                        if (mb_strlen($subject . ': ' . $keep, 'UTF-8') >= self::DESC_MIN) {
                            break;
                        }
                    }
                    if (mb_strlen($subject . ': ' . $keep, 'UTF-8') >= self::DESC_MIN) {
                        $text = $subject . ': ' . $keep;
                    }
                }
            }
        }

        $text = trim($text);
        if ($text === '') {
            $text = self::cleanName($name) . ' — the formula, the units and a worked example.';
        }
        if (!preg_match('~[.!?…]$~u', $text)) {
            $text = rtrim($text, " ,;:—-") . '.';
        }

        $len  = mb_strlen($text, 'UTF-8');
        $fits = $len >= self::DESC_MIN && $len <= self::DESC_MAX;

        if (mb_strtoupper(rtrim($text, '.')) === mb_strtoupper(self::cleanName($name))) {
            $fits = false;
        }
        return [$text, $fits];
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
