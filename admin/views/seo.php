<?php
/**
 * @var string $tab @var array $values @var array $duplicates @var array $redirects
 * @var \Omni\Admin\Pagination $paginator @var string $sitemapPreview @var string $robotsPreview
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Omni\Admin\Csrf;
use Omni\Cms;

$v = static fn (string $key, string $default = ''): string => (string) ($values[$key] ?? $default);
$b = static fn (string $key, bool $default = false): bool => Cms::settingBool($key, $default);
?>
<div class="tabs" data-tabs="seo-tabs">
    <button type="button" data-tab="general">Defaults</button>
    <button type="button" data-tab="redirects">Redirects</button>
    <button type="button" data-tab="duplicates">Duplicate titles (<?= count($duplicates) ?>)</button>
    <button type="button" data-tab="preview">Sitemap &amp; robots</button>
</div>

<div id="seo-tabs">
    <div data-tab-panel="general" hidden>
        <form method="post" action="<?= e(admin_url('seo')) ?>" data-track-dirty>
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="save_settings">
            <div class="card">
                <div class="card-head"><h2>Site-wide defaults</h2></div>
                <div class="card-body">
                    <div class="field">
                        <label for="seo_default_title">Default title template</label>
                        <input id="seo_default_title" name="settings[seo_default_title]" value="<?= e($v('seo_default_title')) ?>" placeholder="{page} | {site}">
                        <div class="hint">Used when a page has no title of its own. <code>{page}</code> and <code>{site}</code> are replaced.</div>
                    </div>
                    <div class="field">
                        <label for="seo_title_suffix">Title suffix</label>
                        <input id="seo_title_suffix" name="settings[seo_title_suffix]" value="<?= e($v('seo_title_suffix')) ?>" placeholder=" | <?= e(Cms::siteName()) ?>">
                        <div class="hint">Appended to page titles that do not already contain the site name.</div>
                    </div>
                    <div class="field">
                        <label for="seo_default_description">Default meta description</label>
                        <textarea id="seo_default_description" name="settings[seo_default_description]" rows="2" maxlength="320"><?= e($v('seo_default_description')) ?></textarea>
                    </div>
                    <div class="field-row">
                        <div class="field">
                            <label for="seo_og_image">Default social image</label>
                            <div class="row tight">
                                <input id="seo_og_image" name="settings[seo_og_image]" value="<?= e($v('seo_og_image')) ?>" placeholder="uploads/media/…/share.png">
                                <button class="btn btn-sm" type="button" data-media-pick="seo_og_image">Pick</button>
                            </div>
                            <div class="hint">1200×630 works everywhere.</div>
                        </div>
                        <div class="field">
                            <label for="seo_twitter_handle">Twitter/X handle</label>
                            <input id="seo_twitter_handle" name="settings[seo_twitter_handle]" value="<?= e($v('seo_twitter_handle')) ?>" placeholder="@yoursite">
                        </div>
                    </div>
                    <hr>
                    <label class="check" style="margin-bottom:12px">
                        <input type="checkbox" name="settings[seo_indexing]" value="1" <?= $b('seo_indexing', true) ? 'checked' : '' ?>>
                        <span>Let search engines index the site <span class="muted small" style="display:block">Turning this off writes <code>Disallow: /</code> in robots.txt. Useful on a staging copy.</span></span>
                    </label>
                    <label class="check" style="margin-bottom:12px">
                        <input type="checkbox" name="settings[seo_sitemap_blog]" value="1" <?= $b('seo_sitemap_blog', true) ? 'checked' : '' ?>>
                        <span>Include the blog in the sitemap</span>
                    </label>
                    <label class="check" style="margin-bottom:12px">
                        <input type="checkbox" name="settings[seo_breadcrumbs]" value="1" <?= $b('seo_breadcrumbs', true) ? 'checked' : '' ?>>
                        <span>Breadcrumbs (visible and in structured data)</span>
                    </label>
                    <label class="check" style="margin-bottom:12px">
                        <input type="checkbox" name="settings[seo_structured_data]" value="1" <?= $b('seo_structured_data', true) ? 'checked' : '' ?>>
                        <span>JSON-LD structured data</span>
                    </label>
                    <div class="field">
                        <label for="seo_robots_extra">Extra robots.txt lines</label>
                        <textarea id="seo_robots_extra" name="settings[seo_robots_extra]" rows="3" class="code"><?= e($v('seo_robots_extra')) ?></textarea>
                    </div>
                </div>
                <div class="card-foot"><button class="btn btn-primary" type="submit">Save SEO defaults</button></div>
            </div>
        </form>
    </div>

    <div data-tab-panel="redirects" hidden>
        <div class="card">
            <div class="card-head"><h2>Redirects</h2><span class="spacer"></span><span class="muted small"><?= number_format($paginator->total) ?> rules</span></div>
            <div class="table-wrap">
                <table class="data">
                    <thead><tr><th>From</th><th>To</th><th>Code</th><th class="num">Hits</th><th>Live</th><th class="actions"></th></tr></thead>
                    <tbody>
                    <?php if ($redirects === []): ?>
                        <tr><td colspan="6"><div class="empty"><h3>No redirects</h3>
                            <p class="small">Changing a calculator or page slug creates one of these automatically.</p></div></td></tr>
                    <?php endif; ?>
                    <?php foreach ($redirects as $rule): ?>
                        <tr>
                            <td class="mono small"><?= e((string) $rule['from_path']) ?></td>
                            <td class="mono small"><?= e((string) $rule['to_path']) ?></td>
                            <td><span class="badge badge-muted"><?= (int) $rule['status_code'] ?></span></td>
                            <td class="num"><?= number_format((int) $rule['hits']) ?></td>
                            <td>
                                <form method="post" action="<?= e(admin_url('seo')) ?>" style="display:inline">
                                    <?= Csrf::field() ?>
                                    <input type="hidden" name="do" value="redirect_toggle">
                                    <input type="hidden" name="id" value="<?= (int) $rule['id'] ?>">
                                    <button class="btn btn-sm" type="submit"><?= $rule['enabled'] ? 'On' : 'Off' ?></button>
                                </form>
                            </td>
                            <td class="actions">
                                <form method="post" action="<?= e(admin_url('seo')) ?>" style="display:inline" data-confirm="Delete this redirect?">
                                    <?= Csrf::field() ?>
                                    <input type="hidden" name="do" value="redirect_delete">
                                    <input type="hidden" name="id" value="<?= (int) $rule['id'] ?>">
                                    <button class="btn btn-sm btn-ghost" type="submit"><?= admin_icon('trash', 15) ?></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?= $paginator->render() ?>
        </div>

        <div class="card" style="margin-top:18px">
            <div class="card-head"><h2>Add a redirect</h2></div>
            <div class="card-body">
                <form method="post" action="<?= e(admin_url('seo')) ?>" class="row">
                    <?= Csrf::field() ?>
                    <input type="hidden" name="do" value="redirect_add">
                    <input name="from_path" placeholder="/old-path" class="mono" required style="max-width:220px">
                    <span aria-hidden="true">→</span>
                    <input name="to_path" placeholder="/new-path or https://…" class="mono" required style="max-width:260px">
                    <select name="status_code" aria-label="Status code" style="width:auto">
                        <option value="301">301 permanent</option>
                        <option value="302">302 temporary</option>
                        <option value="307">307 temporary (keep method)</option>
                        <option value="308">308 permanent (keep method)</option>
                        <option value="410">410 gone</option>
                    </select>
                    <button class="btn" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>

    <div data-tab-panel="duplicates" hidden>
        <div class="card">
            <div class="card-head"><h2>Duplicate SEO titles</h2><span class="spacer"></span><span class="muted small">calculated on every load</span></div>
            <div class="card-body">
                <?php if ($duplicates === []): ?>
                    <div class="notice ok"><div>No two pages share an SEO title. That is what you want.</div></div>
                <?php else: ?>
                    <p class="small muted">Several pages sharing one title compete with each other in the results. Give each one a distinct title.</p>
                    <ul style="padding-left:18px">
                        <?php foreach (array_slice($duplicates, 0, 60) as $dupe): ?>
                            <li style="margin-bottom:10px">
                                <strong><?= e($dupe['title']) ?></strong>
                                <ul style="padding-left:16px;margin:4px 0 0">
                                    <?php foreach ($dupe['items'] as $item): ?>
                                        <li class="small"><a href="<?= e($item['url']) ?>"><?= e($item['label']) ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php if (count($duplicates) > 60): ?>
                        <p class="small muted">…and <?= count($duplicates) - 60 ?> more groups.</p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div data-tab-panel="preview" hidden>
        <div class="grid grid-2">
            <div class="card">
                <div class="card-head"><h2>robots.txt</h2><span class="spacer"></span><a class="btn btn-sm" href="<?= e(site_link('robots.txt')) ?>" target="_blank" rel="noopener">Open live</a></div>
                <div class="card-body"><pre class="small" style="white-space:pre-wrap;margin:0"><?= e($robotsPreview) ?></pre></div>
            </div>
            <div class="card">
                <div class="card-head"><h2>sitemap.xml (start)</h2><span class="spacer"></span><a class="btn btn-sm" href="<?= e(site_link('sitemap.xml')) ?>" target="_blank" rel="noopener">Open live</a></div>
                <div class="card-body"><pre class="small" style="white-space:pre-wrap;margin:0;max-height:420px;overflow:auto"><?= e($sitemapPreview) ?>…</pre></div>
            </div>
        </div>
        <div class="notice info" style="margin-top:18px">
            <div><strong>What is in the sitemap</strong>
                Published calculators (unpublished ones are excluded), published pages, the category indexes and — when enabled —
                the blog and tags. Every URL is the canonical one, with the last modified date where one is known.</div>
        </div>
    </div>
</div>
