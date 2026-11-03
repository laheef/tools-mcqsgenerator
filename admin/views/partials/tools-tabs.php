<?php
/**
 * The tab bar for the tools area.
 *
 * Adding a tool, filing it under a section and managing the file it renders
 * from are three steps of one job, but they were three unrelated entries in the
 * sidebar — "Custom calculators", "Tool plugins", "Tool groups" — with the
 * calculator "Categories" screen listing tool sections a fourth time. Nothing
 * said they belonged together, so the panel read as three overlapping features.
 *
 * This bar is the one place that says it: Tools (the pages), Sections (where
 * they are filed) and Tool files (the .php behind them).
 *
 * @var string $toolsTab  'tools' | 'sections' | 'files'
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

$toolsTab = (string) ($toolsTab ?? 'tools');
$tabs = [
    'tools'     => ['label' => 'Tools', 'page' => 'custom-calculators', 'icon' => 'star'],
    'files'     => ['label' => 'Tool files', 'page' => 'tool-plugins', 'icon' => 'code'],
    'libraries' => ['label' => 'Libraries', 'page' => 'libraries', 'icon' => 'download'],
    'sections'  => ['label' => 'Sections', 'page' => 'tool-groups', 'icon' => 'grid'],
];
?>
<nav class="tools-tabs" aria-label="Tools">
    <?php foreach ($tabs as $key => $tab): ?>
        <a class="tools-tab<?= $toolsTab === $key ? ' is-active' : '' ?>"
           href="<?= e(admin_url($tab['page'])) ?>"
           <?= $toolsTab === $key ? 'aria-current="page"' : '' ?>>
            <?= admin_icon($tab['icon'], 15) ?>
            <?= e($tab['label']) ?>
        </a>
    <?php endforeach; ?>
    <span class="tools-tabs-hint">
        A tool is a page here. It is filed under a section, and it renders from a file.
    </span>
</nav>
<style>
    /* Scoped to the bar so it cannot leak into the panel's other screens. */
    .tools-tabs {
        display: flex; flex-wrap: wrap; align-items: center; gap: 6px;
        margin: 0 0 18px; padding: 6px; border: 1px solid var(--border, #E5E9F2);
        border-radius: 12px; background: var(--surface, #fff);
    }
    .tools-tab {
        display: inline-flex; align-items: center; gap: 7px;
        padding: 8px 14px; border-radius: 8px;
        font-size: 13.4px; font-weight: 600; color: var(--ink-3, #55607A);
    }
    .tools-tab:hover { background: var(--brand-soft, #EBEFFF); color: var(--brand-ink, #2C4BD8); text-decoration: none; }
    .tools-tab.is-active { background: var(--brand, #3B68FC); color: #fff; }
    .tools-tab.is-active svg { opacity: .9; }
    .tools-tabs-hint {
        margin-left: auto; padding-right: 8px;
        font-size: 12.4px; color: var(--ink-4, #7A849B);
    }
    @media (max-width: 900px) { .tools-tabs-hint { display: none; } }
</style>
