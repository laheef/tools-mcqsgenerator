<?php

declare(strict_types=1);

namespace Onim;

/**
 * OtherTools — the row of tools under the reviews.
 *
 * A calculator page used to end at the review form. A reader who had just got
 * their answer had nowhere to go except back to the category list, so the ~20
 * file tools on the site (the ones that never upload a file anywhere) were only
 * ever found by people who went looking for the Tools menu.
 *
 * This picks four of them per page. The choice is:
 *
 *   · the same pick on every page of a category, so it reads as a shelf rather
 *     than a lottery — the seed is the category slug, not the page;
 *   · never a tool the page already links to;
 *   · weighted towards the tools a reader of this category is most likely to
 *     want next (an image page gets the image tools), without turning into a
 *     hard-coded table nobody can change: the category slug is matched against
 *     the tool's group and subgroup first, then the rest by name.
 *
 * What it returns is what the template renders: name, path, description, the
 * group it belongs to, and the icon key the icon set already knows.
 */
final class OtherTools
{
    /**
     * Tools whose group matches the category get first refusal: "image" tools
     * on an image page, "developer" tools next to a calculator someone is
     * quoting in a bug report.
     */
    private const AFFINITY = [
        'biology'   => ['image', 'pdf', 'developer'],
        'health'    => ['image', 'developer'],
        'finance'   => ['pdf', 'image'],
        'math'      => ['developer', 'pdf'],
        'everyday'  => ['image', 'pdf'],
    ];

    /**
     * @param array  $calc the page being rendered (path + cat are read)
     * @param array  $skip paths already linked on this page
     * @return array<int,array{name:string,path:string,description:string,group:string,groupName:string,icon:string}>
     */
    public static function pick(array $calc, array $skip = [], int $want = 4): array
    {
        $rows = self::rows();
        if ($rows === []) {
            return [];
        }

        $cat = (string) ($calc['cat'] ?? '');
        $skipMap = [];
        foreach (array_merge([(string) ($calc['path'] ?? '')], $skip) as $path) {
            $skipMap[(string) $path] = true;
        }

        $affinity = self::AFFINITY[$cat] ?? [];
        $score = static function (array $row) use ($affinity): int {
            $group = (string) ($row['group'] ?? '');
            $at = array_search($group, $affinity, true);
            return $at === false ? 50 : (int) $at;
        };

        usort($rows, static function (array $a, array $b) use ($score): int {
            $diff = $score($a) <=> $score($b);
            return $diff !== 0 ? $diff : strcasecmp((string) $a['name'], (string) $b['name']);
        });

        /* Stable per category: rotate the shelf by the category's own hash, so
           "biology" and "health" do not show the same four in the same order. */
        $seed = abs((int) crc32($cat . '|other-tools'));
        $pool = $rows;
        if ($pool !== []) {
            $offset = $seed % count($pool);
            $pool = array_merge(array_slice($pool, $offset), array_slice($pool, 0, $offset));
        }

        $out = [];
        foreach ($pool as $row) {
            if (isset($skipMap[(string) $row['path']])) {
                continue;
            }
            $out[] = $row;
            if (count($out) >= $want) {
                break;
            }
        }
        return $out;
    }

    /** Every file tool on the site, in the shape the card needs. */
    private static function rows(): array
    {
        static $cache = null;
        if ($cache !== null) {
            return $cache;
        }
        $out = [];
        foreach (Groups::all() as $group) {
            $slug = (string) ($group['slug'] ?? '');
            if ($slug === '' || $slug === Groups::CALCULATORS) {
                continue;
            }
            foreach (Groups::toolsOfGroup($slug) as $row) {
                $path = (string) ($row['path'] ?? '');
                $name = trim((string) ($row['name'] ?? ''));
                if ($path === '' || $name === '') {
                    continue;
                }
                if (($row['kind'] ?? '') === 'calculator' || str_starts_with($path, '/biology')) {
                    continue;
                }
                $out[$path] = [
                    'name'        => $name,
                    'path'        => $path,
                    'description' => (string) ($row['description'] ?? ''),
                    'group'       => $slug,
                    'groupName'   => (string) ($group['name'] ?? $slug),
                    'icon'        => self::iconFor($slug),
                    /* The icon the tool's own page shows, so the shelf and the
                       tool agree — and a group key that does not exist in the
                       glyph set never reaches the template. */
                    'svg'         => self::svgFor($row, $slug),
                ];
            }
        }
        return $cache = array_values($out);
    }

    /**
     * The glyph the tool's own card uses, rendered now rather than in the
     * template: Icons::forTool() already knows how to fall back when a stored
     * icon key is not in the set.
     */
    private static function svgFor(array $row, string $group): string
    {
        return Icons::forTool($row, self::iconFor($group), 22, 'calc-glyph');
    }

    /** The icon key the site's icon set already carries for a group. */
    private static function iconFor(string $slug): string
    {
        $map = [
            'audio'     => 'audio',
            'video'     => 'video',
            'image'     => 'image',
            'pdf'       => 'pdf',
            'developer' => 'code',
            'security'  => 'shield',
            'gaming'    => 'gamepad',
            'compressors' => 'archive',
            'productivity' => 'clock',
            'converters' => 'swap',
        ];
        return $map[$slug] ?? 'tools';
    }
}
