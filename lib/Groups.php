<?php
/**
 * Tool groups — the layer above categories.
 *
 * The site used to be one flat list of fourteen calculator categories. It is now
 * a tool site: the same fourteen categories are *one* group among sixteen, and
 * the other groups (audio, video, image, PDF, developer, …) hold tools whose
 * working part is a PHP file rather than a formula.
 *
 * Two things live here:
 *
 *   group      a top-level section — "Audio Tools". It has a page of its own
 *              (/audio) and a dropdown in the secondary header.
 *   subgroup   a child of a group — "Image Converters" under Image Tools. It
 *              also has its own page (/img-converters) and can hold tools.
 *
 * A tool's address is /{parent}/{slug}, where the parent is whichever of those
 * two it was filed under — or, for a formula calculator, its category
 * (/finance/mortgage). That keeps all 4 041 existing calculator URLs exactly
 * where they were: nothing about them moved, they simply now belong to the
 * "Calculators" group.
 *
 * The shipped list lives in data/groups.json so the site works before MySQL is
 * installed; once the panel is up, the `tool_groups` table overrides any row it
 * names and can add rows of its own. Nothing here writes: the panel does.
 */

declare(strict_types=1);

namespace Onim;

final class Groups
{
    /** @var array<int,array>|null every row, groups and subgroups, flat */
    private static ?array $rows = null;
    /** @var array<string,array>|null slug => row */
    private static ?array $bySlug = null;
    /** @var array<string,int>|null group slug => number of tools in it */
    private static ?array $counts = null;

    public static function flush(): void
    {
        self::$rows = null;
        self::$bySlug = null;
        self::$counts = null;
    }

    /** The slug the calculator catalogue belongs to. */
    public const CALCULATORS = 'calculators';

    /* ------------------------------------------------------------- the rows */

    /** data/groups.json — the list the site ships with. @return array<int,array> */
    private static function seed(): array
    {
        static $rows = null;
        if ($rows === null) {
            $file = Data::path('groups.json');
            $raw = is_file($file) ? json_decode((string) file_get_contents($file), true) : null;
            $rows = is_array($raw) ? $raw : [];
        }
        return $rows;
    }

    /** @return array<string,array> rows the panel has saved, keyed by slug */
    private static function overrides(): array
    {
        static $rows = null;
        if ($rows !== null) {
            return $rows;
        }
        $rows = [];
        if (class_exists(Cms::class) && Cms::enabled() && Db::hasTable('tool_groups')) {
            foreach (Db::all('SELECT * FROM tool_groups ORDER BY sort_order, id') as $r) {
                $rows[(string) $r['slug']] = $r;
            }
        }
        return $rows;
    }

    /**
     * Every group and subgroup, panel rows layered over the shipped list.
     *
     * A row the panel disabled disappears; a row the panel renamed keeps its
     * slug and changes its words; a row the panel added is appended. That is the
     * same override rule the categories use, so an owner who has learned one has
     * learned the other.
     *
     * @return array<int,array>
     */
    public static function rows(): array
    {
        if (self::$rows !== null) {
            return self::$rows;
        }
        $out = [];
        foreach (self::seed() as $row) {
            $slug = (string) ($row['slug'] ?? '');
            if ($slug === '') {
                continue;
            }
            $out[$slug] = [
                'slug' => $slug,
                'name' => (string) ($row['name'] ?? ucfirst($slug)),
                'short' => (string) ($row['short'] ?? ($row['name'] ?? ucfirst($slug))),
                'title' => (string) ($row['title'] ?? ($row['name'] ?? ucfirst($slug))),
                'description' => (string) ($row['description'] ?? ''),
                'icon' => (string) ($row['icon'] ?? 'grid'),
                'parent' => (string) ($row['parent'] ?? ''),
                'sort_order' => (int) ($row['sort_order'] ?? 0),
                'status' => (string) ($row['status'] ?? 'published'),
                'categories' => !empty($row['categories']),
                'source' => 'file',
            ];
        }
        foreach (self::overrides() as $slug => $r) {
            $base = $out[$slug] ?? [
                'slug' => $slug,
                'name' => ucfirst(str_replace('-', ' ', $slug)),
                'short' => ucfirst(str_replace('-', ' ', $slug)),
                'title' => ucfirst(str_replace('-', ' ', $slug)),
                'description' => '',
                'icon' => 'grid',
                'parent' => '',
                'sort_order' => 0,
                'status' => 'published',
                'categories' => false,
                'source' => 'panel',
            ];
            foreach (['name', 'short', 'title', 'description', 'icon', 'parent', 'status'] as $col) {
                if (trim((string) ($r[$col] ?? '')) !== '') {
                    $base[$col] = (string) $r[$col];
                }
            }
            $base['sort_order'] = (int) ($r['sort_order'] ?? $base['sort_order']);
            $base['source'] = 'panel';
            $out[$slug] = $base;
        }
        $rows = array_values($out);
        usort($rows, static function (array $a, array $b): int {
            /* Groups before their children, then the panel's order, then name. */
            $pa = (string) $a['parent'] === '' ? 0 : 1;
            $pb = (string) $b['parent'] === '' ? 0 : 1;
            if ($pa !== $pb) {
                return $pa <=> $pb;
            }
            if ($pa === 1 && $a['parent'] !== $b['parent']) {
                return strcmp((string) $a['parent'], (string) $b['parent']);
            }
            return ((int) $a['sort_order'] <=> (int) $b['sort_order'])
                ?: strcmp((string) $a['name'], (string) $b['name']);
        });
        self::$rows = $rows;
        self::$bySlug = [];
        foreach ($rows as $row) {
            self::$bySlug[(string) $row['slug']] = $row;
        }
        return $rows;
    }

    /** @return array<string,array> */
    private static function bySlug(): array
    {
        self::rows();
        return self::$bySlug ?? [];
    }

    /* ----------------------------------------------------------- the lookups */

    /** Every published top-level group, in panel order. @return array<int,array> */
    public static function all(): array
    {
        $out = [];
        foreach (self::rows() as $row) {
            if ((string) $row['parent'] === '' && (string) $row['status'] === 'published') {
                $out[] = $row;
            }
        }
        return $out;
    }

    /** Every published subgroup of one group. @return array<int,array> */
    public static function subs(string $group): array
    {
        $out = [];
        foreach (self::rows() as $row) {
            if ((string) $row['parent'] === $group && (string) $row['status'] === 'published') {
                $out[] = $row;
            }
        }
        return $out;
    }

    /** A group or a subgroup by slug. */
    public static function find(string $slug): ?array
    {
        $row = self::bySlug()[$slug] ?? null;
        return $row !== null && (string) $row['status'] === 'published' ? $row : null;
    }

    /** Any row including disabled ones — what the panel edits. */
    public static function findAny(string $slug): ?array
    {
        return self::bySlug()[$slug] ?? null;
    }

    public static function isGroup(string $slug): bool
    {
        $row = self::find($slug);
        return $row !== null && (string) $row['parent'] === '';
    }

    public static function isSub(string $slug): bool
    {
        $row = self::find($slug);
        return $row !== null && (string) $row['parent'] !== '';
    }

    /** Is this a section a tool may be filed under (a group or a subgroup)? */
    public static function isSection(string $slug): bool
    {
        return self::find($slug) !== null;
    }

    /** The group a subgroup (or a group) belongs to. */
    public static function groupOf(string $slug): string
    {
        $row = self::bySlug()[$slug] ?? null;
        if ($row === null) {
            return '';
        }
        return (string) $row['parent'] === '' ? (string) $row['slug'] : (string) $row['parent'];
    }

    /* ---------------------------------------------------------------- tools */

    /**
     * The tools filed directly under one section.
     *
     * "calculators" is the whole formula catalogue, which is not stored per
     * group — it is every row of Data::all(). Everything else is a category
     * holding the rows whose category_slug is that section.
     *
     * @return array<int,array>
     */
    public static function tools(string $slug): array
    {
        if ($slug === self::CALCULATORS) {
            return Data::all();
        }
        return Data::byCategory($slug);
    }

    /**
     * Everything a group page lists: its own tools plus the tools of every
     * subgroup beneath it, by name. @return array<int,array>
     */
    public static function toolsOfGroup(string $group): array
    {
        $rows = self::tools($group);
        foreach (self::subs($group) as $sub) {
            foreach (self::tools((string) $sub['slug']) as $row) {
                $rows[] = $row;
            }
        }
        usort($rows, static fn (array $a, array $b): int => strcasecmp((string) $a['name'], (string) $b['name']));
        return $rows;
    }

    public static function count(string $slug): int
    {
        if (self::$counts === null) {
            self::$counts = [];
        }
        if (!isset(self::$counts[$slug])) {
            self::$counts[$slug] = $slug === self::CALCULATORS
                ? Data::total()
                : count(self::tools($slug));
        }
        return self::$counts[$slug];
    }

    /** How many tools a group holds, its subgroups included. */
    public static function countGroup(string $group): int
    {
        $total = self::count($group);
        foreach (self::subs($group) as $sub) {
            $total += self::count((string) $sub['slug']);
        }
        return $total;
    }

    /* ------------------------------------------------------------- the menu */

    /**
     * The secondary header: one entry per group, each with its children.
     *
     * The Calculators group's children are the site's own categories — that is
     * the whole point of the new middle layer, and it is why the fourteen
     * category links now live in a dropdown instead of across the top bar.
     *
     * @return array<int,array{slug:string,name:string,url:string,icon:string,children:array<int,array{name:string,url:string}>}>
     */
    public static function menu(): array
    {
        $out = [];
        foreach (self::all() as $group) {
            $slug = (string) $group['slug'];
            $children = [];
            if (!empty($group['categories'])) {
                foreach (Data::categories() as $cat) {
                    $children[] = [
                        'name' => (string) $cat['name'] . ' Calculators',
                        'url' => '/' . $cat['slug'],
                    ];
                }
            } else {
                foreach (self::subs($slug) as $sub) {
                    $children[] = [
                        'name' => (string) $sub['name'],
                        'url' => '/' . $sub['slug'],
                    ];
                }
            }
            $out[] = [
                'slug' => $slug,
                'name' => (string) ($group['short'] ?? $group['name']),
                'url' => '/' . $slug,
                'icon' => (string) $group['icon'],
                'children' => $children,
            ];
        }
        return $out;
    }

    /**
     * Sections a tool can be filed under, for the panel's select: every group,
     * the calculator categories under Calculators, and every subgroup under its
     * group. Keys are the slug that becomes the tool's URL parent.
     *
     * @return array<string,string> slug => label
     */
    public static function assignable(): array
    {
        $out = [];
        foreach (self::all() as $group) {
            $slug = (string) $group['slug'];
            $out[$slug] = (string) $group['name'];
            if (!empty($group['categories'])) {
                foreach (Data::categories() as $cat) {
                    $out[(string) $cat['slug']] = '— ' . $cat['name'] . ' (calculator)';
                }
                continue;
            }
            foreach (self::subs($slug) as $sub) {
                $out[(string) $sub['slug']] = '— ' . $sub['name'];
            }
        }
        return $out;
    }

    /** Admin label for any section slug that may be stale. */
    public static function label(string $slug): string
    {
        $row = self::findAny($slug);
        if ($row !== null) {
            return (string) $row['name'];
        }
        $cat = Data::category($slug);
        return $cat !== null ? (string) $cat['name'] : ucfirst(str_replace('-', ' ', $slug));
    }

    /** The URL a section lives at. */
    public static function url(string $slug): string
    {
        return '/' . ltrim($slug, '/');
    }

    /**
     * Accent hue for a section.
     *
     * The fifteen bands used to wear the same blue tile, so a page of them read
     * as one long section with fifteen headings. The calculator categories have
     * always given each card its own accent (Icons::hueFor); this is the same
     * idea with the wheel spaced by hand, because these fifteen icons sit on one
     * page and two neighbouring hues that collide read as a bug rather than as a
     * palette. A section that is not in the list — a sub-category, or one an
     * owner invented — inherits its parent's accent, and anything else falls back
     * to the hashed hue the calculator icons use.
     */
    private const HUES = [
        'audio'            => 268,
        'video'            => 212,
        'image'            => 158,
        'pdf'              => 6,
        'developer'        => 196,
        'converters'       => 282,
        'security'         => 348,
        'gaming'           => 128,
        'compressors'      => 32,
        'productivity'     => 186,
        'design-css'       => 306,
        'text-writing'     => 232,
        'art-color'        => 338,
        'social-community' => 20,
        'fun-random'       => 50,
    ];

    /**
     * The section's own word for its tools: "Audio Tools" -> "audio",
     * "PDF Tools" -> "PDF", "Design & CSS Tools" -> "design & CSS".
     *
     * Used where a sentence names the section rather than letting the heading
     * do it: the browse buttons read "Browse all 1 audio tool" instead of a
     * fifteenth "Browse all 1 tool" down the same page.
     */
    public static function shortName(string $slug): string
    {
        /* The heading, not the panel's "Short name": that field exists to fit
           the header bar, and "Social" for "Social & Community" would make the
           button say "Browse all 1 social tool". Renaming a section still moves
           the button, because the button reads the name. */
        $name = trim(self::label($slug));
        $name = preg_replace('~\s+tools$~i', '', $name) ?? $name;
        $name = trim($name);
        if ($name === '') {
            return trim(self::label($slug));
        }
        /* Acronyms keep their capitals; every other word reads as a word in the
           middle of a sentence ("text & writing", "design & CSS"). */
        $keep = ['PDF', 'CSS', 'SEO', 'API', 'HTML', 'URL', 'DPI', 'CSV', 'IP'];
        $words = preg_split('~\s+~', $name) ?: [$name];
        foreach ($words as $i => $word) {
            if (in_array(mb_strtoupper($word), $keep, true)) {
                $words[$i] = mb_strtoupper($word);
            } elseif ($i === 0) {
                $words[$i] = mb_strtolower(mb_substr($word, 0, 1)) . mb_substr($word, 1);
            } elseif (!ctype_upper((string) preg_replace('~[^A-Za-z]~', '', $word))) {
                $words[$i] = mb_strtolower($word);
            }
        }
        return implode(' ', $words);
    }

    /**
     * "image tools", "audio tool", "converter tool" — the noun a browse button
     * ends with. A section called "Converters" holding one tool should not say
     * "1 converters tool", so a plural name loses its s for a count of one.
     */
    public static function toolNoun(string $slug, int $count): string
    {
        $name = self::shortName($slug);
        if ($count !== 1) {
            return $name . ' tools';
        }
        if (mb_strlen($name) > 3 && str_ends_with($name, 's')) {
            $name = mb_substr($name, 0, -1);
        }
        return $name . ' tool';
    }

    public static function hue(string $slug): int
    {
        $slug = trim($slug, '/');
        if (isset(self::HUES[$slug])) {
            return self::HUES[$slug];
        }
        $parent = self::groupOf($slug);
        if ($parent !== '' && isset(self::HUES[$parent])) {
            return self::HUES[$parent];
        }
        return Icons::hueFor('/' . $slug);
    }
}
