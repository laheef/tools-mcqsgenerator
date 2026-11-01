<?php
/**
 * CalcRepo — the panel's view of the calculator catalogue.
 *
 * The catalogue itself is the 39 NDJSON shards (formulas, units, equations);
 * this class merges them with the `calculators` override table and with the
 * generated article files, so the panel can answer the questions an editor asks:
 * is it published, does its article file exist, what does its SEO look like,
 * who changed it last.
 *
 * Saving never rewrites a shard. It writes an override row and, when the slug
 * moves, a redirect so the old URL keeps working.
 */

declare(strict_types=1);


namespace Onim\Admin;

// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Onim\Cms;
use Onim\Data;
use Onim\Db;

final class CalcRepo
{
    /** Slugs that would collide with the site's own routes. */
    private const RESERVED = [
        'admin', 'api', 'assets', 'uploads', 'search', 'sitemap', 'sitemap.xml', 'robots.txt',
        'blog', 'tag', 'page', 'feed', 'contact', 'login', 'logout', 'install', 'index',
    ];

    /**
     * Every calculator, catalogue + override + file status.
     *
     * @return array<int,array<string,mixed>>
     */
    public static function rows(): array
    {
        static $rows = null;
        if ($rows !== null) {
            return $rows;
        }
        $overrides = self::overrideMap();
        $out = [];
        foreach (Data::allRows() as $row) {
            $source = (string) ($row['sourcePath'] ?? $row['path']);
            $file = Data::path('content/' . ($row['sourceCat'] ?? $row['cat']) . '/' . ($row['sourceSlug'] ?? $row['slug']) . '.json');
            $exists = is_file($file);
            $override = $overrides[$source] ?? null;
            $out[] = [
                'sourcePath'    => $source,
                'path'          => (string) $row['path'],
                'originalPath'  => '/' . (string) ($row['sourceCat'] ?? $row['cat']) . '/' . (string) ($row['sourceSlug'] ?? $row['slug']),
                'sourceCat'     => (string) ($row['sourceCat'] ?? $row['cat']),
                'sourceSlug'    => (string) ($row['sourceSlug'] ?? $row['slug']),
                'cat'           => (string) $row['cat'],
                'slug'          => (string) $row['slug'],
                'name'          => (string) $row['name'],
                'description'   => (string) ($row['description'] ?? ''),
                'status'        => (string) ($row['status'] ?? 'published'),
                'featured'      => (bool) ($row['featured'] ?? false),
                'sortOrder'     => (int) ($row['sortOrder'] ?? 0),
                'hasOverride'   => $override !== null,
                'cmsId'         => $override === null ? 0 : (int) $override['id'],
                'hasContent'    => $exists,
                'contentBytes'  => $exists ? (int) filesize($file) : 0,
                'updatedAt'     => $override['updated_at'] ?? null,
                'metaTitle'     => (string) ($override['meta_title'] ?? ''),
                'icon'          => (string) ($override['icon'] ?? ''),
                'thumbnail'     => (string) ($override['thumbnail'] ?? ''),
            ];
        }
        return $rows = $out;
    }

    /** @return array<string,array<string,mixed>> raw override rows by source path */
    public static function overrideMap(): array
    {
        static $map = null;
        if ($map !== null) {
            return $map;
        }
        $map = [];
        if (Cms::enabled() && Db::hasTable('calculators')) {
            foreach (Db::all('SELECT * FROM calculators') as $row) {
                $map[(string) $row['source_path']] = $row;
            }
        }
        return $map;
    }

    /** @return array<string,mixed>|null */
    public static function find(string $sourcePath): ?array
    {
        foreach (self::rows() as $row) {
            if ($row['sourcePath'] === $sourcePath) {
                return $row;
            }
        }
        return null;
    }

    /**
     * Editable defaults for the editor: the override if there is one, otherwise
     * what the article file currently says. This is what makes "edit" start from
     * the real content instead of an empty form.
     *
     * @return array<string,mixed>
     */
    public static function formValues(string $sourcePath): array
    {
        $row = self::find($sourcePath);
        if ($row === null) {
            return [];
        }
        $original = Data::content((string) $row['sourceCat'], (string) $row['sourceSlug']) ?? [];
        $override = self::overrideMap()[$sourcePath] ?? null;

        $sections = [];
        foreach ($original['sections'] ?? [] as $section) {
            $sections[] = [
                'title' => (string) ($section['title'] ?? ''),
                'html'  => (string) ($section['html'] ?? ''),
            ];
        }
        $faq = [];
        foreach ($original['faq'] ?? [] as $pair) {
            $faq[] = ['q' => (string) ($pair['q'] ?? ''), 'a' => (string) ($pair['a'] ?? '')];
        }

        $values = [
            'source_path'      => $sourcePath,
            'slug'             => (string) $row['slug'],
            'category_slug'    => (string) $row['cat'],
            'name'             => (string) $row['name'],
            'h1'               => (string) ($original['h1'] ?? $row['name'] . ' Calculator'),
            'meta_title'       => (string) ($original['seoTitle'] ?? ''),
            'meta_description' => (string) ($original['seoDesc'] ?? $row['description']),
            'summary'          => (string) ($original['summary'] ?? ''),
            'sections'         => $sections,
            'faq'              => $faq,
            'related'          => array_map(static fn (array $r): string => (string) $r['path'], $original['related'] ?? []),
            'icon'             => (string) $row['icon'],
            'thumbnail'        => (string) $row['thumbnail'],
            'status'           => (string) $row['status'],
            'is_featured'      => (int) $row['featured'],
            'sort_order'       => (string) $row['sortOrder'],
            'canonical_url'    => '',
            'noindex'          => 0,
            'is_override'      => $override !== null,
            'words'            => (int) ($original['words'] ?? 0),
        ];

        if ($override !== null) {
            foreach (['slug', 'category_slug', 'h1', 'meta_title', 'meta_description', 'summary', 'icon', 'thumbnail', 'status', 'canonical_url'] as $key) {
                if (trim((string) ($override[$key] ?? '')) !== '') {
                    $values[$key] = (string) $override[$key];
                }
            }
            $values['name'] = trim((string) ($override['name'] ?? '')) !== '' ? (string) $override['name'] : $values['name'];
            $values['is_featured'] = (int) $override['is_featured'];
            $values['sort_order'] = (string) (int) $override['sort_order'];
            $values['noindex'] = (int) $override['noindex'];
            if (trim((string) ($override['sections'] ?? '')) !== '') {
                $parsed = Cms::decode((string) $override['sections']);
                $values['sections'] = array_map(static fn (array $s): array => [
                    'title' => (string) ($s['title'] ?? ''),
                    'html'  => (string) ($s['html'] ?? ''),
                ], array_filter($parsed, 'is_array'));
            }
            if (trim((string) ($override['faq'] ?? '')) !== '') {
                $parsed = Cms::decode((string) $override['faq']);
                $values['faq'] = array_map(static fn (array $p): array => [
                    'q' => (string) ($p['q'] ?? ''),
                    'a' => (string) ($p['a'] ?? ''),
                ], array_filter($parsed, 'is_array'));
            }
            if (trim((string) ($override['related'] ?? '')) !== '') {
                $values['related'] = array_values(array_filter(Cms::decode((string) $override['related']), 'is_string'));
            }
        }

        return $values;
    }

    /**
     * Validate and store an override.
     *
     * @param array<string,mixed> $input sanitised by the caller (arrays already decoded)
     * @return array{ok:bool,errors:array<string,string>,message:string}
     */
    public static function save(string $sourcePath, array $input, int $userId): array
    {
        $row = self::find($sourcePath);
        if ($row === null) {
            return ['ok' => false, 'errors' => ['source_path' => 'Unknown calculator.'], 'message' => 'Unknown calculator.'];
        }
        $errors = [];

        $slug = Cms::slugify((string) ($input['slug'] ?? ''));
        if ($slug === '') {
            $errors['slug'] = 'The slug cannot be empty.';
        } elseif (strlen($slug) > 120) {
            $errors['slug'] = 'Keep the slug under 120 characters.';
        } elseif (in_array($slug, self::RESERVED, true)) {
            $errors['slug'] = '“' . $slug . '” is used by the site itself.';
        } elseif (($clash = self::slugClash($slug, (string) ($input['category_slug'] ?? $row['cat']), $sourcePath)) !== null) {
            $errors['slug'] = 'That address is already taken by ' . $clash . '.';
        }

        $cat = Cms::slugify((string) ($input['category_slug'] ?? ''));
        if ($cat === '') {
            $errors['category_slug'] = 'Choose a category.';
        }

        $name = trim((string) ($input['name'] ?? ''));
        if ($name === '') {
            $errors['name'] = 'The calculator name is required.';
        }
        $h1 = trim((string) ($input['h1'] ?? ''));
        $metaTitle = trim((string) ($input['meta_title'] ?? ''));
        if (mb_strlen($metaTitle) > 190) {
            $errors['meta_title'] = 'Keep the SEO title under 190 characters (the panel recommends 60).';
        }
        $metaDesc = trim((string) ($input['meta_description'] ?? ''));
        if (mb_strlen($metaDesc) > 320) {
            $errors['meta_description'] = 'Keep the meta description under 320 characters.';
        }
        $canonical = trim((string) ($input['canonical_url'] ?? ''));
        if ($canonical !== '' && filter_var($canonical, FILTER_VALIDATE_URL) === false) {
            $errors['canonical_url'] = 'Enter a full URL (https://…) or leave it blank.';
        }

        $status = (string) ($input['status'] ?? 'published');
        if (!in_array($status, ['published', 'draft', 'archived'], true)) {
            $status = 'published';
        }

        if ($errors !== []) {
            return ['ok' => false, 'errors' => $errors, 'message' => 'Fix the highlighted fields.'];
        }

        /*
         * What the page shows today, so a save that only touches part of the
         * record can carry everything else through untouched. Without this a
         * save that omits a repeater silently blanks it for every visitor.
         */
        $current  = Data::content($cat, $slug) ?? [];
        $override = self::overrideMap()[$sourcePath] ?? null;

        $existingFaq = [];
        foreach ($current['faq'] ?? [] as $pair) {
            if (is_array($pair) && isset($pair['q'], $pair['a'])) {
                $existingFaq[] = ['q' => (string) $pair['q'], 'a' => (string) $pair['a']];
            }
        }
        $existingSections = [];
        foreach ($current['sections'] ?? [] as $section) {
            if (is_array($section)) {
                $existingSections[] = [
                    'title' => (string) ($section['title'] ?? ''),
                    'html'  => (string) ($section['html'] ?? ''),
                ];
            }
        }

        $sections = [];
        foreach ($input['sections'] ?? [] as $section) {
            $title = trim((string) ($section['title'] ?? ''));
            $html  = clean_html((string) ($section['html'] ?? ''));
            if ($title === '' && trim(strip_tags($html)) === '') {
                continue;
            }
            $sections[] = ['title' => $title, 'html' => $html];
        }
        /*
         * Same rule as the FAQ below: a form that does not render the article
         * body must not be able to erase it. Only an editor who actually posts
         * the section repeater can change what is in it.
         */
        if ($sections === [] && empty($input['sections_submitted'])) {
            $sections = $existingSections;
        }
        $faq = [];
        foreach ($input['faq'] ?? [] as $pair) {
            $q = trim((string) ($pair['q'] ?? ''));
            $a = trim((string) ($pair['a'] ?? ''));
            if ($q === '' || $a === '') {
                continue;
            }
            $faq[] = ['q' => $q, 'a' => clean_html($a)];
        }
        /*
         * A submission that never carried the FAQ repeater keeps the questions
         * that are already there. Saving a calculator from a form that does not
         * render the rows — which is exactly what a scripted save does — used to
         * write `faq: []`, and the page silently lost its FAQ section and its
         * FAQPage structured data. An editor who really wants them gone submits
         * the repeater with its rows removed, and that still clears them.
         */
        if ($faq === [] && empty($input['faq_submitted'])) {
            $faq = $existingFaq;
        }
        $related = [];
        foreach ($input['related'] ?? [] as $path) {
            $path = trim((string) $path);
            if ($path !== '' && $path !== $row['path']) {
                $related[] = $path;
            }
        }
        $related = array_values(array_unique(array_slice($related, 0, 8)));
        // The related-links repeater is prefilled from the page itself, so an
        // unposted one means "leave them alone", not "remove every link".
        if ($related === [] && empty($input['related_submitted'])) {
            foreach ($current['related'] ?? [] as $rel) {
                $relPath = is_array($rel) ? (string) ($rel['path'] ?? '') : (string) $rel;
                if ($relPath !== '' && $relPath !== $row['path']) {
                    $related[] = $relPath;
                }
            }
            $related = array_values(array_unique(array_slice($related, 0, 8)));
        }

        $payload = [
            'source_path'      => $sourcePath,
            'slug'             => $slug,
            'category_slug'    => $cat,
            'name'             => $name,
            'h1'               => $h1,
            'meta_title'       => $metaTitle,
            'meta_description' => $metaDesc,
            'summary'          => clean_html((string) ($input['summary'] ?? '')),
            'sections'         => json_encode($sections, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'faq'              => json_encode($faq, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'related'          => json_encode($related, JSON_UNESCAPED_SLASHES),
            'icon'             => empty($input['icon_submitted'])
                ? (string) ($override['icon'] ?? '')
                : trim((string) ($input['icon'] ?? '')),
            'thumbnail'        => empty($input['thumbnail_submitted'])
                ? (string) ($override['thumbnail'] ?? '')
                : trim((string) ($input['thumbnail'] ?? '')),
            'status'           => $status,
            'is_featured'      => !empty($input['is_featured']) ? 1 : 0,
            'sort_order'       => (int) ($input['sort_order'] ?? 0),
            'canonical_url'    => $canonical,
            'noindex'          => !empty($input['noindex']) ? 1 : 0,
            'updated_by'       => $userId,
            'updated_at'       => date('Y-m-d H:i:s'),
        ];

        if ($override === null) {
            $payload['created_at'] = date('Y-m-d H:i:s');
            Db::insert('calculators', $payload);
        } else {
            Db::update('calculators', $payload, 'source_path = :sp', [':sp' => $sourcePath]);
        }

        // Keep old URLs alive when the address changed.
        $oldRoute = $row['originalPath'];
        $newRoute = '/' . $cat . '/' . $slug;
        $redirectNote = '';
        if ($oldRoute !== $newRoute && !self::routeTaken($oldRoute, $sourcePath)) {
            self::upsertRedirect($oldRoute, $newRoute, 301, 'Calculator slug changed');
            $redirectNote = ' Old URL ' . $oldRoute . ' now redirects to ' . $newRoute . '.';
        }
        /*
         * If an address that used to be redirected away from is now this
         * calculator's own address again (a slug was changed back), the old
         * redirect would bounce visitors off the live page. Drop it.
         */
        Db::delete('redirects', 'from_path = ?', [$newRoute]);

        Cms::flush();
        Activity::log($override === null ? 'calculator_override_created' : 'calculator_updated', 'calculator', $sourcePath, 'Saved ' . $name . ' (' . $status . ')' . $redirectNote);

        $message = 'Saved “' . $name . '”.' . $redirectNote;
        if ($status !== 'published') {
            $message .= ' It is not public while the status is ' . $status . '.';
        }
        return ['ok' => true, 'errors' => [], 'message' => $message];
    }

    /** Publish / unpublish without opening the editor. */
    public static function setStatus(string $sourcePath, string $status, int $userId): bool
    {
        if (!in_array($status, ['published', 'draft', 'archived'], true)) {
            return false;
        }
        $row = self::find($sourcePath);
        if ($row === null) {
            return false;
        }
        $existing = self::overrideMap()[$sourcePath] ?? null;
        if ($existing === null) {
            $values = self::formValues($sourcePath);
            $input = $values;
            $input['status'] = $status;
            $result = self::save($sourcePath, $input, $userId);
            return $result['ok'];
        }
        Db::update('calculators', ['status' => $status, 'updated_by' => $userId, 'updated_at' => date('Y-m-d H:i:s')], 'source_path = :sp', [':sp' => $sourcePath]);
        Cms::flush();
        Activity::log('calculator_status', 'calculator', $sourcePath, 'Status → ' . $status);
        return true;
    }

    public static function setFeatured(string $sourcePath, bool $featured, int $userId): bool
    {
        $existing = self::overrideMap()[$sourcePath] ?? null;
        if ($existing === null) {
            $input = self::formValues($sourcePath);
            $input['is_featured'] = $featured ? 1 : 0;
            return self::save($sourcePath, $input, $userId)['ok'];
        }
        Db::update('calculators', ['is_featured' => $featured ? 1 : 0, 'updated_by' => $userId, 'updated_at' => date('Y-m-d H:i:s')], 'source_path = :sp', [':sp' => $sourcePath]);
        Cms::flush();
        Activity::log('calculator_featured', 'calculator', $sourcePath, $featured ? 'Featured' : 'Unfeatured');
        return true;
    }

    /** Remove the override, so the calculator goes back to the harvested text. */
    public static function resetOverride(string $sourcePath): bool
    {
        $existing = self::overrideMap()[$sourcePath] ?? null;
        if ($existing === null) {
            return false;
        }
        Db::delete('calculators', 'source_path = ?', [$sourcePath]);
        Cms::flush();
        Activity::log('calculator_override_deleted', 'calculator', $sourcePath, 'Reverted to harvested defaults');
        return true;
    }

    /**
     * Is this slug + category combination free?
     *
     * @return string|null the name of the thing occupying it
     */
    public static function slugClash(string $slug, string $cat, string $exceptPath): ?string
    {
        foreach (self::rows() as $row) {
            if ($row['sourcePath'] === $exceptPath) {
                continue;
            }
            if ($row['slug'] === $slug && $row['cat'] === $cat) {
                return '“' . $row['name'] . '”';
            }
        }
        if (Db::hasTable('pages')) {
            $page = Db::one('SELECT title FROM pages WHERE slug = ? LIMIT 1', [$slug]);
            if ($page !== null) {
                return 'the page “' . $page['title'] . '”';
            }
        }
        return null;
    }

    /** Is a full route ("/cat/slug") already served by something else? */
    public static function routeTaken(string $route, string $exceptPath): bool
    {
        $route = trim($route, '/');
        foreach (self::rows() as $row) {
            if ($row['sourcePath'] !== $exceptPath && trim($row['path'], '/') === $route) {
                return true;
            }
        }
        return false;
    }

    public static function upsertRedirect(string $from, string $to, int $code = 301, string $note = ''): void
    {
        if (!Db::hasTable('redirects') || $from === $to) {
            return;
        }
        $existing = Db::one('SELECT id FROM redirects WHERE from_path = ?', [$from]);
        if ($existing === null) {
            Db::insert('redirects', ['from_path' => $from, 'to_path' => $to, 'status_code' => $code, 'enabled' => 1, 'note' => $note]);
        } else {
            Db::update('redirects', ['to_path' => $to, 'status_code' => $code, 'enabled' => 1, 'note' => $note], 'id = :id', [':id' => (int) $existing['id']]);
        }
    }

    /** @return array<string,int> */
    public static function stats(): array
    {
        $rows = self::rows();
        $published = 0;
        $drafts = 0;
        $featured = 0;
        $overrides = 0;
        $missing = 0;
        foreach ($rows as $row) {
            if ($row['status'] === 'published') {
                $published++;
            } else {
                $drafts++;
            }
            $featured += $row['featured'] ? 1 : 0;
            $overrides += $row['hasOverride'] ? 1 : 0;
            $missing += $row['hasContent'] ? 0 : 1;
        }
        return [
            'total'     => count($rows),
            'published' => $published,
            'drafts'    => $drafts,
            'featured'  => $featured,
            'overrides' => $overrides,
            'missing'   => $missing,
            'categories' => count(Data::categories()),
        ];
    }

    /** @return array<int,array<string,mixed>> rows whose article file is absent */
    public static function missingFiles(): array
    {
        return array_values(array_filter(self::rows(), static fn (array $r): bool => !$r['hasContent']));
    }

    /**
     * Filter + sort + paginate the catalogue in memory.
     *
     * @param array{q?:string,cat?:string,status?:string,flag?:string,sort?:string} $filters
     * @return array{rows:array<int,array<string,mixed>>,total:int,categories:array<string,int>}
     */
    public static function query(array $filters): array
    {
        $q = mb_strtolower(trim((string) ($filters['q'] ?? '')));
        $cat = (string) ($filters['cat'] ?? '');
        $status = (string) ($filters['status'] ?? '');
        $flag = (string) ($filters['flag'] ?? '');
        $sort = (string) ($filters['sort'] ?? 'name');

        $out = [];
        $catCounts = [];
        foreach (self::rows() as $row) {
            $catCounts[$row['cat']] = ($catCounts[$row['cat']] ?? 0) + 1;
            if ($cat !== '' && $row['cat'] !== $cat) {
                continue;
            }
            if ($status !== '' && $row['status'] !== $status) {
                continue;
            }
            if ($flag === 'missing' && $row['hasContent']) {
                continue;
            }
            if ($flag === 'featured' && !$row['featured']) {
                continue;
            }
            if ($flag === 'edited' && !$row['hasOverride']) {
                continue;
            }
            if ($q !== '') {
                $haystack = mb_strtolower($row['name'] . ' ' . $row['slug'] . ' ' . $row['path'] . ' ' . $row['description']);
                if (mb_strpos($haystack, $q) === false) {
                    continue;
                }
            }
            $out[] = $row;
        }

        usort($out, static function (array $a, array $b) use ($sort): int {
            return match ($sort) {
                'slug'    => strcmp($a['slug'], $b['slug']),
                'cat'     => [$a['cat'], $a['name']] <=> [$b['cat'], $b['name']],
                'status'  => [$a['status'], $a['name']] <=> [$b['status'], $b['name']],
                'updated' => strcmp((string) ($b['updatedAt'] ?? ''), (string) ($a['updatedAt'] ?? '')),
                default   => strcasecmp($a['name'], $b['name']),
            };
        });

        return ['rows' => $out, 'total' => count($out), 'categories' => $catCounts];
    }
}
