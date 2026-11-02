<?php
/**
 * @var array<string,array{label:string,where:string,size:string,pages:string}> $slots
 * @var bool $enabled
 * @var array<string,array{w:int,h:int,shape:string}> $sizes
 * @var int $filled
 * @var string $headCode
 * @var string $adsTxt
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Csrf;

$total = count($slots);

/** Where each position sits, so the list reads in page order rather than alphabetically. */
$groups = [
    'Calculator pages' => ['calc_top', 'calc_mid', 'calc_inline', 'calc_below', 'calc_side', 'calc_reviews_top', 'calc_reviews_bottom'],
    'Blog'             => ['blog_top', 'blog_list', 'blog_inline', 'blog_side_top', 'blog_side_bottom', 'category_top'],
    'Everywhere'       => ['header', 'footer', 'anchor'],
    'Homepage'         => ['home_mid'],
];
// A slot added later must still appear even if nobody has filed it under a heading.
$placed = array_merge(...array_values($groups));
$other = array_values(array_diff(array_keys($slots), $placed));
if ($other !== []) {
    $groups['Other positions'] = $other;
}
?>
<div class="ad-summary">
    <p class="muted">
        <?= $filled ?> of <?= $total ?> positions carry a tag.
        <?php if (!$enabled && $filled > 0): ?>
            The tags are saved; they print as soon as advertising is switched on.
        <?php elseif ($enabled && $filled === 0): ?>
            Advertising is on, but every box is empty, so nothing shows yet.
        <?php endif; ?>
    </p>
</div>

<form method="post" action="<?= e(admin_url('ads')) ?>" class="card">
    <?= Csrf::field() ?>
    <input type="hidden" name="do" value="toggle">
    <div class="card-body ad-switch">
        <label class="switch" title="<?= $enabled ? 'Switch advertising off' : 'Switch advertising on' ?>">
            <input type="checkbox" name="ads_enabled" value="1" <?= $enabled ? 'checked' : '' ?>
                   onchange="this.form.requestSubmit ? this.form.requestSubmit() : this.form.submit()">
            <span class="track"></span>
            <span class="sr-only">Advertising is on</span>
        </label>
        <div>
            <strong>Advertising is <?= $enabled ? 'live' : 'off' ?></strong>
            <div class="hint">
                <?php if (!$enabled): ?>
                    Nothing is printed anywhere while this is off, whatever is pasted below.
                <?php else: ?>
                    Filled positions print on the pages they belong to.
                <?php endif; ?>
            </div>
        </div>
        <span class="spacer"></span>
        <noscript><button class="btn btn-sm" type="submit" name="set" value="<?= $enabled ? '0' : '1' ?>">
            <?= $enabled ? 'Switch off' : 'Switch on' ?></button></noscript>
    </div>
</form>

<div class="notice info">
    <div>
        <strong>Match the box to the creative</strong>
        Each position reserves the width × height you set here, so the article does not jump when the tag loads. Leave the
        size blank and the position falls back to the standard shape for its slot.
    </div>
</div>

<?php foreach ($groups as $groupLabel => $keys): ?>
    <?php
    $keys = array_values(array_filter($keys, static fn (string $k): bool => isset($slots[$k])));
    if ($keys === []) {
        continue;
    }
    ?>
    <h2 class="section-title"><?= e($groupLabel) ?></h2>
    <div class="ad-grid">
        <?php foreach ($keys as $key):
            $meta = $slots[$key];
            $code = (string) (\Onim\Cms::setting('ads_slot_' . $key, '') ?? '');
            $has = trim($code) !== '';
            $dim = $sizes[$key] ?? ['w' => 728, 'h' => 90, 'shape' => 'leaderboard'];
            $custom = trim((string) (\Onim\Cms::setting('ads_size_' . $key, '') ?? '')) !== '';
            ?>
            <div class="card ad-card<?= $has ? ' has-code' : '' ?>" id="<?= e($key) ?>">
                <div class="card-head">
                    <h2><?= e($meta['label']) ?></h2>
                    <span class="spacer"></span>
                    <span class="badge <?= $has ? 'badge-ok' : 'badge-muted' ?>"><?= $has ? 'filled' : 'empty' ?></span>
                    <span class="badge badge-brand"><?= (int) $dim['w'] ?> × <?= (int) $dim['h'] ?></span>
                </div>
                <div class="card-body ad-card-body">
                    <p class="hint ad-where"><?= e($meta['where']) ?></p>

                    <form method="post" action="<?= e(admin_url('ads')) ?>" data-track-dirty>
                        <?= Csrf::field() ?>
                        <input type="hidden" name="do" value="save">
                        <input type="hidden" name="slot" value="<?= e($key) ?>">
                        <label class="sr-only" for="code-<?= e($key) ?>">Ad tag for <?= e($meta['label']) ?></label>
                        <textarea id="code-<?= e($key) ?>" name="code" rows="4" class="code ad-code" spellcheck="false"
                                  placeholder="&lt;ins class=&quot;adsbygoogle&quot; ...&gt;&lt;/ins&gt;"><?= e($code) ?></textarea>
                        <div class="ad-card-actions">
                            <button class="btn btn-sm" type="submit">Save tag</button>
                            <span class="mono small muted"><?= e(\Onim\Ads::settingKey($key)) ?></span>
                        </div>
                    </form>

                    <form method="post" action="<?= e(admin_url('ads')) ?>" class="ad-size-form">
                        <?= Csrf::field() ?>
                        <input type="hidden" name="do" value="size">
                        <input type="hidden" name="slot" value="<?= e($key) ?>">
                        <label for="size-<?= e($key) ?>">Box size</label>
                        <input id="size-<?= e($key) ?>" name="size" value="<?= e($custom ? $dim['w'] . 'x' . $dim['h'] : '') ?>"
                               inputmode="numeric" placeholder="<?= (int) $dim['w'] ?>x<?= (int) $dim['h'] ?>" size="10">
                        <span class="muted small">px, width × height</span>
                        <button class="btn btn-ghost btn-sm" type="submit">Set size</button>
                    </form>
                    <?php if ($has): ?>
                        <form method="post" action="<?= e(admin_url('ads')) ?>" class="ad-clear-form">
                            <?= Csrf::field() ?>
                            <input type="hidden" name="do" value="clear">
                            <input type="hidden" name="slot" value="<?= e($key) ?>">
                            <button class="btn btn-ghost btn-sm ad-clear" type="submit" formnovalidate
                                    onclick="return confirm('Empty this position? Its tag is deleted.')">Clear this position</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>

<div class="card">
    <div class="card-head"><h2>Site-wide code</h2></div>
    <div class="card-body">
        <div class="kv-row"><span class="kv-key">Head code</span>
            <span class="kv-value"><?= $headCode === '' ? '<span class="muted">empty</span>' : '<span class="badge badge-ok">set</span>' ?></span></div>
        <div class="kv-row"><span class="kv-key">ads.txt</span>
            <span class="kv-value"><?= $adsTxt === '' ? '<span class="muted">empty — /ads.txt returns 404</span>' : '<span class="badge badge-ok">set</span>' ?></span></div>
        <p class="hint">Both are edited in <a href="<?= e(admin_url('settings', ['tab' => 'analytics'])) ?>">Settings → Analytics</a>,
            next to the consent and analytics fields they belong with.</p>
    </div>
</div>
