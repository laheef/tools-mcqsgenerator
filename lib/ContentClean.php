<?php

declare(strict_types=1);

namespace Onim;

/**
 * ContentClean — the boilerplate filter for calculators written in bulk.
 *
 * Every page in this section was generated from the same template in an
 * earlier round: the same three sentences about grey boxes, the same paragraph
 * about units, the same aside about decimals. Alone, none of them is wrong. On
 * eleven hundred pages they are the page — 5 900 of 11 400 sentences in the
 * Biology section appeared on five or more pages, and a search engine reading
 * 320 pages that share half their text sees one page and 319 thin copies of it.
 *
 * The tell is frequency, so that is what this class measures: a sentence that
 * turns up on five or more pages of a category is boilerplate and is removed,
 * while everything specific to a page — its formula, its worked example, its
 * mistakes, its numbers — stays exactly where it was. The sentences are removed
 * verbatim: they were written without markup, so an exact match never takes a
 * nested tag with it, and a sentence that cannot be found whole is left alone
 * rather than cut in the middle.
 *
 * This is a *filter*, not a writer. It can only remove what is repeated; it
 * cannot invent what a page is missing. The rewritten articles are written in
 * the batch pass (see docs/calc-files.md).
 */
final class ContentClean
{
    /** A sentence must be at least this long to count as boilerplate. */
    public const MIN_SENTENCE = 40;

    /** ...and on at least this many pages of the category. */
    public const MIN_PAGES = 5;

    /**
     * Sentences, from plain text.
     *
     * @return array<int,string>
     */
    public static function sentences(string $text): array
    {
        $text = trim((string) preg_replace('~\s+~', ' ', strip_tags($text)));
        if ($text === '') {
            return [];
        }
        $out = [];
        foreach (preg_split('~(?<=[.!?])\s+~u', $text) ?: [] as $s) {
            $s = trim($s);
            if (mb_strlen($s, 'UTF-8') >= self::MIN_SENTENCE) {
                $out[] = $s;
            }
        }
        return $out;
    }

    /**
     * How many pages of a corpus each sentence appears on.
     *
     * @param array<int,array{intro?:string,sections?:array}> $articles
     * @return array<string,int>
     */
    public static function frequencies(array $articles): array
    {
        $pages = [];
        foreach ($articles as $i => $article) {
            $text = (string) ($article['intro'] ?? '');
            foreach ((array) ($article['sections'] ?? []) as $s) {
                $text .= ' ' . (string) ($s['html'] ?? '');
            }
            foreach (self::sentences($text) as $sentence) {
                $pages[$sentence][$i] = true;
            }
        }
        $freq = [];
        foreach ($pages as $sentence => $set) {
            $freq[$sentence] = count($set);
        }
        arsort($freq);
        return $freq;
    }

    /**
     * The sentences that are too common to be worth keeping.
     *
     * @param array<string,int> $frequencies
     * @return array<string,true>
     */
    public static function boilerplate(array $frequencies): array
    {
        $out = [];
        foreach ($frequencies as $sentence => $count) {
            if ($count >= self::MIN_PAGES) {
                $out[$sentence] = true;
            }
        }
        return $out;
    }

    /**
     * Remove every boilerplate sentence from one article.
     *
     * @param array{intro?:string,sections?:array} $article
     * @param array<string,true>                  $boilerplate
     * @return array{article:array,removed:int,words:int}
     */
    public static function clean(array $article, array $boilerplate): array
    {
        $removed = 0;

        $intro = (string) ($article['intro'] ?? '');
        $intro = self::strip($intro, $boilerplate, $removed);
        $sections = [];
        foreach ((array) ($article['sections'] ?? []) as $section) {
            $html = self::strip((string) ($section['html'] ?? ''), $boilerplate, $removed);
            $words = str_word_count(strip_tags($html));
            /* A heading over two words of leftovers is worse than no section. */
            if ($words < 20) {
                continue;
            }
            $sections[] = ['title' => (string) ($section['title'] ?? ''), 'html' => self::tidy($html)];
        }
        $article['intro'] = self::tidy($intro);
        $article['sections'] = $sections;

        $text = $article['intro'];
        foreach ($sections as $s) {
            $text .= ' ' . $s['html'];
        }
        return [
            'article' => $article,
            'removed' => $removed,
            'words'   => str_word_count(strip_tags($text)),
        ];
    }

    /**
     * Cut the boilerplate sentences out of one block of HTML.
     *
     * @param array<string,true> $boilerplate
     */
    public static function strip(string $html, array $boilerplate, int &$removed = 0): string
    {
        foreach ($boilerplate as $sentence => $_) {
            $count = substr_count($html, $sentence);
            if ($count === 0) {
                continue;
            }
            $html = str_replace($sentence, '', $html);
            $removed += $count;
        }
        return $html;
    }

    /** Word count of an article (intro + sections), for the thin-page check. */
    public static function words(array $article): int
    {
        $text = (string) ($article['intro'] ?? '');
        foreach ((array) ($article['sections'] ?? []) as $s) {
            $text .= ' ' . (string) ($s['html'] ?? '');
        }
        return str_word_count(strip_tags($text));
    }

    /** Close the gaps a removal leaves: empty tags, stray spaces, blank paragraphs. */
    public static function tidy(string $html): string
    {
        $html = (string) preg_replace('~<p>\s*</p>~u', '', $html);
        $html = (string) preg_replace('~<li>\s*</li>~u', '', $html);
        $html = (string) preg_replace('~<ul>\s*</ul>~u', '', $html);
        $html = (string) preg_replace('~[ \t]{2,}~u', ' ', $html);
        $html = (string) preg_replace('~\s+([.,;:!?])~u', '$1', $html);
        $html = (string) preg_replace('~(</p>)\s*(</p>)~u', '$1$2', $html);
        return trim((string) preg_replace('~>\s{2,}<~u', '><', $html));
    }
}
