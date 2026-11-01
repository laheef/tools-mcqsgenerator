<?php
/**
 * Inline SVG icon set for the panel (24×24, stroke-based, currentColor).
 * Inline rather than an icon font so the panel works with no network access.
 */

declare(strict_types=1);

if (!function_exists('admin_icon')) {
    /**
     * @param array<int,string> $paths
     */
    function admin_icon_paths(): array
    {
        static $paths = null;
        if ($paths !== null) {
            return $paths;
        }
        return $paths = [
            'dashboard'  => '<rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/><rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>',
            'calculator' => '<rect x="4" y="2.5" width="16" height="19" rx="2.5"/><rect x="7.5" y="6" width="9" height="4" rx="1"/><path d="M8 14h.01M12 14h.01M16 14h.01M8 17.5h.01M12 17.5h.01M16 17.5h.01"/>',
            'file'       => '<path d="M14 2.5H7a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7.5z"/><path d="M14 2.5v5h5"/><path d="M9 13h6M9 17h4"/>',
            'folder'     => '<path d="M3 7.5A2 2 0 0 1 5 5.5h4l2 2.5h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>',
            'grid'       => '<rect x="3" y="3" width="8" height="8" rx="1.5"/><rect x="13" y="3" width="8" height="8" rx="1.5"/><rect x="3" y="13" width="8" height="8" rx="1.5"/><rect x="13" y="13" width="8" height="8" rx="1.5"/>',
            'home'       => '<path d="M3.5 10.5 12 3.5l8.5 7"/><path d="M5.5 9.5V20a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1V9.5"/><path d="M10 21v-6h4v6"/>',
            'menu'       => '<path d="M3 6h18M3 12h18M3 18h18"/>',
            'layout'     => '<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9.5h18M9 9.5V20"/>',
            'page'       => '<path d="M6 2.5h8l4 4v15H6z"/><path d="M14 2.5v4h4"/><path d="M9 12h6M9 15.5h6M9 8.5h2"/>',
            'blog'       => '<path d="M4 20h4l10.5-10.5a2.1 2.1 0 0 0-3-3L5 17z"/><path d="M13.5 6.5l3 3"/><path d="M4 20l1-4"/>',
            'tag'        => '<path d="M11 3.5H4.5v6.5l9 9 6.5-6.5z"/><circle cx="7.5" cy="7" r="1.4"/>',
            'image'      => '<rect x="3" y="4" width="18" height="16" rx="2"/><circle cx="8.5" cy="9.5" r="1.8"/><path d="M21 16l-5-5-6 6-3-3-4 4"/>',
            'mail'       => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3.5 6.5 12 13l8.5-6.5"/>',
            'search'     => '<circle cx="11" cy="11" r="6.5"/><path d="M16 16l4.5 4.5"/>',
            'palette'    => '<path d="M12 3a9 9 0 1 0 0 18c1.2 0 1.8-.9 1.8-1.9 0-1.6-1.4-1.9-1.4-3 0-1 .8-1.6 1.9-1.6H17a4 4 0 0 0 4-4C21 5.6 17 3 12 3z"/><circle cx="7.5" cy="10" r="1.2"/><circle cx="10.5" cy="7" r="1.2"/><circle cx="14.5" cy="7.5" r="1.2"/>',
            'settings'   => '<circle cx="12" cy="12" r="3.2"/><path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-2.9 1.2 2 2 0 1 1-4 0 1.7 1.7 0 0 0-2.9-1.2l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1A1.7 1.7 0 0 0 3 15a2 2 0 1 1 0-4 1.7 1.7 0 0 0 1.2-2.9l-.1-.1a2 2 0 1 1 2.8-2.8l.1.1A1.7 1.7 0 0 0 10 4.2a2 2 0 1 1 4 0 1.7 1.7 0 0 0 2.9 1.2l.1-.1a2 2 0 1 1 2.8 2.8l-.1.1A1.7 1.7 0 0 0 21 11a2 2 0 1 1 0 4z"/>',
            'users'      => '<circle cx="9" cy="8" r="3.4"/><path d="M2.8 20a6.2 6.2 0 0 1 12.4 0"/><path d="M16 4.6a3.4 3.4 0 0 1 0 6.8"/><path d="M17.5 14.4A6.2 6.2 0 0 1 21.2 20"/>',
            'user'       => '<circle cx="12" cy="8" r="3.6"/><path d="M4.5 20.5a7.5 7.5 0 0 1 15 0"/>',
            'database'   => '<ellipse cx="12" cy="6" rx="8" ry="3.2"/><path d="M4 6v6c0 1.8 3.6 3.2 8 3.2s8-1.4 8-3.2V6"/><path d="M4 12v6c0 1.8 3.6 3.2 8 3.2s8-1.4 8-3.2v-6"/>',
            'activity'   => '<path d="M3 12h4l2.5-7 4 14 2.5-7h5"/>',
            'logout'     => '<path d="M15 4.5H6.5a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2H15"/><path d="M18 8.5l3.5 3.5-3.5 3.5"/><path d="M11 12h10"/>',
            'plus'       => '<path d="M12 5v14M5 12h14"/>',
            'edit'       => '<path d="M4 20h4L20 8a2.8 2.8 0 0 0-4-4L4 16z"/><path d="M14.5 5.5l4 4"/>',
            'trash'      => '<path d="M4 7h16"/><path d="M9.5 7V4.5h5V7"/><path d="M6 7l1 13h10l1-13"/><path d="M10.5 11v5.5M13.5 11v5.5"/>',
            'eye'        => '<path d="M2.5 12S6 5.5 12 5.5 21.5 12 21.5 12 18 18.5 12 18.5 2.5 12 2.5 12z"/><circle cx="12" cy="12" r="3"/>',
            'external'   => '<path d="M14 4h6v6"/><path d="M20 4l-8.5 8.5"/><path d="M18 14v4.5a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 4 18.5v-11A1.5 1.5 0 0 1 5.5 6H10"/>',
            'check'      => '<path d="M4.5 12.5l5 5 10-11"/>',
            'warning'    => '<path d="M12 3.5 22 20H2z"/><path d="M12 9.5v5"/><path d="M12 17.5h.01"/>',
            'info'       => '<circle cx="12" cy="12" r="9"/><path d="M12 11v5.5"/><path d="M12 7.8h.01"/>',
            'up'         => '<path d="M12 19V5"/><path d="M6 11l6-6 6 6"/>',
            'down'       => '<path d="M12 5v14"/><path d="M18 13l-6 6-6-6"/>',
            'copy'       => '<rect x="9" y="9" width="11" height="11" rx="2"/><path d="M15 6.5V5a2 2 0 0 0-2-2H5.5a2 2 0 0 0-2 2V12a2 2 0 0 0 2 2H7"/>',
            'download'   => '<path d="M12 4v10"/><path d="M7.5 10.5 12 15l4.5-4.5"/><path d="M4.5 19.5h15"/>',
            'upload'     => '<path d="M12 16V6"/><path d="M7.5 9.5 12 5l4.5 4.5"/><path d="M4.5 19.5h15"/>',
            'x'          => '<path d="M6 6l12 12M18 6 6 18"/>',
            'link'       => '<path d="M10 13.5a4.2 4.2 0 0 0 6 0l2.5-2.5a4.2 4.2 0 0 0-6-6L11 6.5"/><path d="M14 10.5a4.2 4.2 0 0 0-6 0L5.5 13a4.2 4.2 0 0 0 6 6l1.5-1.5"/>',
            'filter'     => '<path d="M3 5h18l-7 8v6l-4-2v-4z"/>',
            'code'       => '<path d="M9 7.5 4 12l5 4.5"/><path d="M15 7.5 20 12l-5 4.5"/>',
            'star'       => '<path d="M12 3.8l2.6 5.4 5.9.8-4.3 4.1 1 5.9-5.2-2.8-5.2 2.8 1-5.9L3.5 10l5.9-.8z"/>',
            'clock'      => '<circle cx="12" cy="12" r="9"/><path d="M12 7.5V12l3.5 2"/>',
            'shield'     => '<path d="M12 3l7.5 3v6c0 4.6-3.2 7.9-7.5 9-4.3-1.1-7.5-4.4-7.5-9V6z"/><path d="M9 12l2.2 2.2L15.5 10"/>',
            'chart'      => '<path d="M4 20V4"/><path d="M4 20h16"/><rect x="7" y="12" width="3.2" height="5"/><rect x="12" y="8" width="3.2" height="9"/><rect x="17" y="5" width="3.2" height="12"/>',
            'inbox'      => '<path d="M3.5 12.5 6 5h12l2.5 7.5V19a1.5 1.5 0 0 1-1.5 1.5H5A1.5 1.5 0 0 1 3.5 19z"/><path d="M3.5 12.5h4l1 2.5h7l1-2.5h4"/>',
        ];
    }

    function admin_icon(string $name, int $size = 18, string $class = 'ico'): string
    {
        $paths = admin_icon_paths();
        $body = $paths[$name] ?? $paths['info'];
        return sprintf(
            '<svg class="%s" width="%d" height="%d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">%s</svg>',
            htmlspecialchars($class, ENT_QUOTES, 'UTF-8'),
            $size,
            $size,
            $body
        );
    }
}
