<?php
/**
 * Modules — extra UI and logic for individual calculator pages.
 *
 * The site's calculator pages are all rendered by one template fed by a
 * definition, which is what makes 3,800 of them maintainable. Occasionally a
 * single tool needs something that is not a list of fields: a benchmark strip, a
 * chart, a slider, a table of live rates, a second result panel.
 *
 * A module is the smallest thing that can add that without forking the template:
 *
 *   modules/aim-benchmarks/
 *     module.json          ← which page(s), which slot, in what order
 *     partials/strip.php   ← ordinary PHP + HTML, rendered inside that page
 *
 * The partial is included inside templates/calculator.php, so it sees exactly
 * what the page sees — `$calc`, `$solver`, `$resultRows`, `$groups` — and can
 * call the same Widget/Solver/Format helpers the template uses. It is plain PHP
 * on the server, so there is no client-side sandbox to escape and no eval.
 *
 * `module.json`:
 *   {
 *     "name": "Aim benchmarks",
 *     "description": "…",
 *     "version": "1.0.0",
 *     "paths": ["/gaming/valorant-headshot-percentage"],   // exact paths
 *     "categories": ["gaming"],                             // or whole categories
 *     "slots": {"widget_bottom": "partials/strip.php"},
 *     "enabled": true,                                      // default state
 *     "priority": 10                                        // lower draws first
 *   }
 *
 * Slots, in the order they appear on the page:
 *   widget_top      inside the calculator card, above the first field group
 *   widget_bottom   inside the calculator card, below the hint line
 *   article_head    in the article, under the title and byline
 *   article_foot    after the article body, before the FAQ
 *   page_foot       at the very end of the calculator page
 *
 * A module is files on disk, like a template: installing one is a deploy, not an
 * upload. The panel lists what is installed, validates each manifest, shows which
 * pages it affects, and can switch it off without deleting it.
 */

declare(strict_types=1);

namespace Omni;

final class Modules
{
    public const SLOTS = ['widget_top', 'widget_bottom', 'article_head', 'article_foot', 'page_foot'];

    /** @var array<string,array>|null discovered modules, keyed by slug */
    private static ?array $modules = null;

    public static function dir(): string
    {
        return (defined('DATA_PATH') ? dirname(DATA_PATH) : dirname(__DIR__)) . '/modules';
    }

    /**
     * Every installed module, whether enabled or not.
     *
     * @return array<string,array{slug:string,name:string,description:string,version:string,paths:array<int,string>,categories:array<int,string>,slots:array<string,string>,enabled:bool,priority:int,dir:string,errors:array<int,string>,warnings:array<int,string>}>
     */
    public static function all(): array
    {
        if (self::$modules !== null) {
            return self::$modules;
        }
        self::$modules = [];
        $base = self::dir();
        if (!is_dir($base)) {
            return self::$modules;
        }
        $entries = scandir($base) ?: [];
        foreach ($entries as $slug) {
            if ($slug === '.' || $slug === '..' || !is_dir($base . '/' . $slug)) {
                continue;
            }
            $module = self::load((string) $slug);
            if ($module !== null) {
                self::$modules[(string) $slug] = $module;
            }
        }
        uasort(self::$modules, static fn (array $a, array $b): int => ($a['priority'] <=> $b['priority']) ?: strcasecmp($a['name'], $b['name']));
        return self::$modules;
    }

    /** One module by folder name, or null when it is missing or unusable. */
    public static function load(string $slug): ?array
    {
        $slug = preg_replace('~[^a-z0-9._-]~i', '', $slug) ?? '';
        if ($slug === '') {
            return null;
        }
        $dir = self::dir() . '/' . $slug;
        if (!is_dir($dir)) {
            return null;
        }
        $manifestFile = $dir . '/module.json';
        $manifest = is_file($manifestFile)
            ? json_decode((string) file_get_contents($manifestFile), true)
            : null;

        $module = [
            'slug'        => $slug,
            'name'        => $slug,
            'description' => '',
            'version'     => '',
            'paths'       => [],
            'categories'  => [],
            'slots'       => [],
            'enabled'     => true,
            'priority'    => 50,
            'dir'         => $dir,
            'errors'      => [],
            'warnings'    => [],
        ];

        if (!is_array($manifest)) {
            $module['errors'][] = is_file($manifestFile)
                ? 'module.json is not valid JSON.'
                : 'There is no module.json in this folder.';
            return $module + ['disabled_reason' => 'broken'];
        }

        $module['name'] = self::text($manifest['name'] ?? $slug, 120) ?: $slug;
        $module['description'] = self::text($manifest['description'] ?? '', 400);
        $module['version'] = self::text($manifest['version'] ?? '', 20);
        $module['enabled'] = ($manifest['enabled'] ?? true) !== false;
        $module['priority'] = (int) ($manifest['priority'] ?? 50);

        foreach ((array) ($manifest['paths'] ?? []) as $path) {
            $path = '/' . ltrim(self::text((string) $path, 190), '/');
            if ($path !== '/' && preg_match('~^/[a-z0-9][a-z0-9/_-]*$~i', $path)) {
                $module['paths'][] = $path;
            } else {
                $module['warnings'][] = 'Ignored an unusable path: “' . (string) $path . '”.';
            }
        }
        foreach ((array) ($manifest['categories'] ?? []) as $cat) {
            $cat = strtolower(self::text((string) $cat, 80));
            if (preg_match('~^[a-z0-9][a-z0-9-]*$~', $cat)) {
                $module['categories'][] = $cat;
            }
        }

        foreach ((array) ($manifest['slots'] ?? []) as $slot => $file) {
            if (!in_array($slot, self::SLOTS, true)) {
                $module['warnings'][] = 'Ignored unknown slot “' . (string) $slot . '”.';
                continue;
            }
            $file = self::safeFile($dir, (string) $file);
            if ($file === null) {
                $module['errors'][] = 'The partial for “' . $slot . '” is missing or outside the module folder.';
                continue;
            }
            $module['slots'][$slot] = $file;
        }

        if ($module['slots'] === [] && $module['errors'] === []) {
            $module['errors'][] = 'This module has no partials, so it would do nothing.';
        }
        if ($module['paths'] === [] && $module['categories'] === []) {
            $module['errors'][] = 'This module does not say which pages it applies to (paths or categories).';
        }

        return $module;
    }

    /**
     * Resolve a partial inside the module folder.
     * Only a plain relative filename that really exists, inside the folder.
     */
    private static function safeFile(string $dir, string $file): ?string
    {
        $file = ltrim(str_replace('\\', '/', trim($file)), '/');
        if ($file === '' || str_contains($file, '..') || !str_ends_with($file, '.php')) {
            return null;
        }
        if (!preg_match('~^[A-Za-z0-9._/-]+$~', $file)) {
            return null;
        }
        $absolute = realpath($dir . '/' . $file);
        $base = realpath($dir);
        if ($absolute === false || $base === false || !is_file($absolute)) {
            return null;
        }
        if (!str_starts_with($absolute, $base . '/')) {
            return null;
        }
        return $absolute;
    }

    /* ------------------------------------------------------------- runtime */

    /**
     * Modules that should render on this calculator page, for one slot.
     * Disabled and broken modules are never returned.
     *
     * @return array<int,array{slug:string,file:string,name:string}>
     */
    public static function partials(string $path, string $slot): array
    {
        if (!in_array($slot, self::SLOTS, true)) {
            return [];
        }
        $out = [];
        foreach (self::all() as $slug => $module) {
            if ($module['errors'] !== [] || !self::isEnabled($slug, $module)) {
                continue;
            }
            if (!isset($module['slots'][$slot])) {
                continue;
            }
            if (!self::matches($module, $path)) {
                continue;
            }
            $out[] = ['slug' => (string) $slug, 'file' => $module['slots'][$slot], 'name' => $module['name']];
        }
        return $out;
    }

    public static function matches(array $module, string $path): bool
    {
        if (in_array($path, $module['paths'], true)) {
            return true;
        }
        foreach ($module['categories'] as $cat) {
            if (str_starts_with($path, '/' . $cat . '/')) {
                return true;
            }
        }
        return false;
    }

    /**
     * Is this module switched on? The panel stores its decision as a list of
     * slugs in one setting, so a module added by a deploy keeps its manifest
     * default until someone flips it.
     */
    public static function isEnabled(string $slug, ?array $module = null): bool
    {
        $module ??= self::all()[$slug] ?? null;
        $default = $module['enabled'] ?? true;

        $raw = class_exists(Cms::class) ? (string) (Cms::setting('modules_off', '') ?? '') : '';
        if ($raw === '') {
            return (bool) $default;
        }
        $off = array_filter(array_map('trim', explode(',', $raw)), static fn (string $s): bool => $s !== '');
        return !in_array($slug, $off, true);
    }

    /** @return array<int,string> slugs currently switched off in the panel */
    public static function switchedOff(): array
    {
        $raw = class_exists(Cms::class) ? (string) (Cms::setting('modules_off', '') ?? '') : '';
        return array_values(array_filter(array_map('trim', explode(',', $raw)), static fn (string $s): bool => $s !== ''));
    }

    /** Record a switch. Keeps disabled slugs even if the folder is later removed. */
    public static function setSwitchedOff(array $slugs): void
    {
        $slugs = array_values(array_unique(array_filter(array_map(
            static fn (string $s): string => preg_replace('~[^a-z0-9._-]~i', '', $s) ?? '',
            $slugs
        ), static fn (string $s): bool => $s !== '')));
        if (!class_exists(Db::class) || !Db::available()) {
            return;
        }
        Db::exec(
            'INSERT INTO settings (skey, svalue, sgroup) VALUES (?, ?, ?)
             ON DUPLICATE KEY UPDATE svalue = VALUES(svalue), updated_at = NOW()',
            ['modules_off', implode(',', $slugs), 'system']
        );
        if (class_exists(Cms::class)) {
            Cms::flush();
        }
    }

    /** How many pages a module touches, for the panel. */
    public static function pageCount(array $module): int
    {
        $count = 0;
        foreach (Data::all() as $row) {
            if (self::matches($module, (string) $row['path'])) {
                $count++;
            }
        }
        return $count;
    }

    private static function text(mixed $value, int $max): string
    {
        if (!is_scalar($value)) {
            return '';
        }
        $text = trim((string) $value);
        return mb_substr($text, 0, $max);
    }
}
