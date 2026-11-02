<?php
/**
 * The rich-text toolbar.
 *
 * One partial, included by every editor in the panel (blog posts, pages and the
 * two description fields on a custom calculator), so the buttons a writer learns
 * in one place are the ones they get everywhere. The behaviour lives in
 * admin/assets/admin.js under `[data-editor]`; this file is only the controls.
 *
 * Buttons carry `data-cmd` (a document.execCommand name) or `data-action` (one
 * of the few things execCommand cannot do — inserting a figure, wrapping a code
 * block, toggling the HTML source, focus mode). `data-value` is the argument.
 */

declare(strict_types=1);

/** @var string $editorLabel  aria-label for the editable area, e.g. "Post content" */
$editorLabel = $editorLabel ?? 'Content';
?>
<div class="editor-toolbar" role="toolbar" aria-label="Formatting">
    <div class="editor-group">
        <button type="button" class="editor-btn" data-cmd="undo" title="Undo (Ctrl+Z)" aria-label="Undo">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M9 7 4.5 11.5 9 16"/><path d="M4.5 11.5H14a5 5 0 0 1 0 10h-3"/></svg>
        </button>
        <button type="button" class="editor-btn" data-cmd="redo" title="Redo (Ctrl+Shift+Z)" aria-label="Redo">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="m15 7 4.5 4.5L15 16"/><path d="M19.5 11.5H10a5 5 0 0 0 0 10h3"/></svg>
        </button>
    </div>

    <div class="editor-group">
        <label class="editor-select-wrap">
            <span class="sr-only">Text style</span>
            <select class="editor-select" data-block-select>
                <option value="p">Paragraph</option>
                <option value="h2">Heading 2</option>
                <option value="h3">Heading 3</option>
                <option value="h4">Heading 4</option>
                <option value="blockquote">Quote</option>
                <option value="pre">Code block</option>
            </select>
        </label>
    </div>

    <div class="editor-group">
        <button type="button" class="editor-btn" data-cmd="bold" title="Bold (Ctrl+B)" aria-label="Bold"><strong>B</strong></button>
        <button type="button" class="editor-btn" data-cmd="italic" title="Italic (Ctrl+I)" aria-label="Italic"><em>I</em></button>
        <button type="button" class="editor-btn" data-cmd="underline" title="Underline (Ctrl+U)" aria-label="Underline"><span style="text-decoration:underline">U</span></button>
        <button type="button" class="editor-btn" data-cmd="strikeThrough" title="Strikethrough" aria-label="Strikethrough"><span style="text-decoration:line-through">S</span></button>
        <button type="button" class="editor-btn" data-action="inline-code" title="Inline code" aria-label="Inline code">&lt;/&gt;</button>
        <button type="button" class="editor-btn" data-cmd="superscript" title="Superscript" aria-label="Superscript">x²</button>
        <button type="button" class="editor-btn" data-cmd="subscript" title="Subscript" aria-label="Subscript">x₂</button>
    </div>

    <div class="editor-group">
        <button type="button" class="editor-btn" data-cmd="insertUnorderedList" title="Bulleted list" aria-label="Bulleted list">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"><path d="M9 6h11M9 12h11M9 18h11"/><circle cx="5" cy="6" r="1.2" fill="currentColor" stroke="none"/><circle cx="5" cy="12" r="1.2" fill="currentColor" stroke="none"/><circle cx="5" cy="18" r="1.2" fill="currentColor" stroke="none"/></svg>
        </button>
        <button type="button" class="editor-btn" data-cmd="insertOrderedList" title="Numbered list" aria-label="Numbered list">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round"><path d="M10 6h10M10 12h10M10 18h10"/><path d="M4 5h1v4M4 13h2l-2 3h2" stroke-width="1.6"/></svg>
        </button>
        <button type="button" class="editor-btn" data-cmd="outdent" title="Decrease indent" aria-label="Decrease indent">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M10 6h10M10 12h10M10 18h10"/><path d="m6 9-3 3 3 3"/></svg>
        </button>
        <button type="button" class="editor-btn" data-cmd="indent" title="Increase indent" aria-label="Increase indent">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M10 6h10M10 12h10M10 18h10"/><path d="m3 9 3 3-3 3"/></svg>
        </button>
    </div>

    <div class="editor-group">
        <button type="button" class="editor-btn" data-action="link" title="Link (Ctrl+K)" aria-label="Insert link"><?= admin_icon('link', 16) ?></button>
        <button type="button" class="editor-btn" data-cmd="unlink" title="Remove link" aria-label="Remove link">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M9.5 14.5 14.5 9.5"/><path d="M7.8 12.2 5.9 14a3.4 3.4 0 0 0 4.8 4.8l1.8-1.8"/><path d="M16.2 11.8l1.9-1.8a3.4 3.4 0 0 0-4.8-4.8l-1.8 1.8"/><path d="M4 4l16 16"/></svg>
        </button>
        <button type="button" class="editor-btn" data-action="image" title="Insert image from the media library" aria-label="Insert image"><?= admin_icon('image', 16) ?></button>
        <button type="button" class="editor-btn" data-action="hr" title="Divider" aria-label="Divider">&#8213;</button>
    </div>

    <div class="editor-group">
        <button type="button" class="editor-btn" data-cmd="removeFormat" title="Clear formatting" aria-label="Clear formatting"><?= admin_icon('x', 15) ?></button>
        <button type="button" class="editor-btn editor-btn-text" data-action="clean-paste" title="Paste the clipboard as clean paragraphs" aria-label="Paste as plain text">Paste clean</button>
    </div>

    <div class="editor-group editor-group-end">
        <button type="button" class="editor-btn editor-btn-text" data-action="fullscreen" title="Focus mode — the editor fills the window" aria-label="Focus mode" aria-pressed="false">Focus</button>
        <button type="button" class="editor-btn editor-btn-text" data-toggle-source title="Edit the HTML directly" aria-pressed="false">HTML</button>
    </div>
</div>
