/* ==========================================================================
   Admin panel behaviour — no dependencies, no build step.
   Everything here is progressive: the forms work without it (plain POSTs),
   the script only adds the conveniences (toolbars, pickers, confirmations).
   ========================================================================== */
(function () {
    'use strict';

    var base = document.body.getAttribute('data-admin-base') || '/admin';
    var $  = function (sel, root) { return (root || document).querySelector(sel); };
    var $$ = function (sel, root) { return Array.prototype.slice.call((root || document).querySelectorAll(sel)); };

    /* ---------------------------------------------------------- sidebar */
    var toggle = $('[data-nav-toggle]');
    if (toggle) {
        toggle.addEventListener('click', function () {
            document.body.classList.toggle('nav-open');
            toggle.setAttribute('aria-expanded', document.body.classList.contains('nav-open') ? 'true' : 'false');
        });
        document.addEventListener('click', function (ev) {
            if (!document.body.classList.contains('nav-open')) { return; }
            if (ev.target.closest('.sidebar') || ev.target.closest('[data-nav-toggle]')) { return; }
            document.body.classList.remove('nav-open');
        });
    }

    /* ----------------------------------------------------------- toasts */
    $$('.toast').forEach(function (toast, i) {
        var close = function () {
            toast.style.transition = 'opacity .18s';
            toast.style.opacity = '0';
            setTimeout(function () { toast.remove(); }, 200);
        };
        var btn = $('button', toast);
        if (btn) { btn.addEventListener('click', close); }
        setTimeout(close, 6000 + i * 400);
    });

    /* ------------------------------------------------------ confirmations */
    document.addEventListener('submit', function (ev) {
        var form = ev.target;
        var msg = form.getAttribute('data-confirm');
        if (msg && !window.confirm(msg)) {
            ev.preventDefault();
            ev.stopPropagation();
            return false;
        }
        // disable the submit button once to stop double posts
        var btn = form.querySelector('[type="submit"]');
        if (btn && form.getAttribute('data-allow-repeat') !== '1') {
            setTimeout(function () { btn.classList.add('is-disabled'); btn.disabled = true; }, 10);
            setTimeout(function () { btn.classList.remove('is-disabled'); btn.disabled = false; }, 8000);
        }
    }, true);

    $$('a[data-confirm]').forEach(function (a) {
        a.addEventListener('click', function (ev) {
            if (!window.confirm(a.getAttribute('data-confirm'))) { ev.preventDefault(); }
        });
    });

    /* ---------------------------------------------------------- auto slug */
    $$('[data-slug-source]').forEach(function (input) {
        var target = document.getElementById(input.getAttribute('data-slug-target'));
        if (!target) { return; }
        var manual = target.value !== '' && target.value !== target.getAttribute('data-initial');
        target.addEventListener('input', function () { manual = true; });
        input.addEventListener('blur', function () {
            if (manual || target.value !== '') { return; }
            target.value = slugify(input.value);
        });
    });

    function slugify(text) {
        return String(text).normalize('NFKD').replace(/[\u0300-\u036f]/g, '')
            .replace(/[’']/g, '').toLowerCase()
            .replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
    }

    $$('[data-slugify]').forEach(function (btn) {
        btn.addEventListener('click', function (ev) {
            ev.preventDefault();
            var src = document.getElementById(btn.getAttribute('data-slugify'));
            var dst = document.getElementById(btn.getAttribute('data-slug-target'));
            if (src && dst) { dst.value = slugify(src.value); dst.focus(); }
        });
    });

    /* ------------------------------------------------------ char counters */
    $$('[data-counter]').forEach(function (input) {
        var out = document.getElementById(input.getAttribute('data-counter'));
        if (!out) { return; }
        var max = parseInt(input.getAttribute('maxlength') || '0', 10);
        var update = function () {
            var len = input.value.length;
            out.textContent = len + (max ? ' / ' + max : '') + ' characters';
            out.style.color = max && len > max * 0.95 ? 'var(--warn)' : '';
        };
        input.addEventListener('input', update);
        update();
    });

    /* --------------------------------------------------- repeatable rows */
    document.addEventListener('click', function (ev) {
        var add = ev.target.closest('[data-repeat-add]');
        if (add) {
            ev.preventDefault();
            var wrap = document.getElementById(add.getAttribute('data-repeat-add'));
            if (!wrap) { return; }
            var tpl = wrap.querySelector('template[data-repeat-template]');
            if (!tpl) { return; }
            var index = parseInt(wrap.getAttribute('data-repeat-next') || String(wrap.children.length), 10);
            var html = tpl.innerHTML.replace(/__INDEX__/g, String(index));
            var holder = document.createElement('div');
            holder.innerHTML = html.trim();
            var node = holder.firstElementChild;
            wrap.appendChild(node);
            wrap.setAttribute('data-repeat-next', String(index + 1));
            var first = node.querySelector('input, textarea');
            if (first) { first.focus(); }
            renumberRepeat(wrap);
            return;
        }

        var remove = ev.target.closest('[data-repeat-remove]');
        if (remove) {
            ev.preventDefault();
            if (!window.confirm('Remove this item?')) { return; }
            var item = remove.closest('.repeat-item');
            var parent = item ? item.parentElement : null;
            if (item) { item.remove(); }
            if (parent) { renumberRepeat(parent); }
            return;
        }

        var up = ev.target.closest('[data-move-up]');
        var down = ev.target.closest('[data-move-down]');
        if (up || down) {
            ev.preventDefault();
            var row = (up || down).closest('.repeat-item');
            if (!row) { return; }
            if (up && row.previousElementSibling) {
                row.parentElement.insertBefore(row, row.previousElementSibling);
            } else if (down && row.nextElementSibling) {
                row.parentElement.insertBefore(row.nextElementSibling, row);
            }
            renumberRepeat(row.parentElement);
        }
    });

    function renumberRepeat(wrap) {
        $$('.repeat-item', wrap).forEach(function (item, i) {
            var num = item.querySelector('[data-repeat-number]');
            if (num) { num.textContent = '#' + (i + 1); }
        });
    }

    /* ------------------------------------------------------------- tabs */
    $$('[data-tabs]').forEach(function (group) {
        var buttons = $$('[data-tab]', group);
        var panels = $$('[data-tab-panel]', document.getElementById(group.getAttribute('data-tabs')) || document);
        var activate = function (key, push) {
            buttons.forEach(function (b) { b.classList.toggle('is-active', b.getAttribute('data-tab') === key); b.setAttribute('aria-selected', b.getAttribute('data-tab') === key ? 'true' : 'false'); });
            panels.forEach(function (p) { p.hidden = p.getAttribute('data-tab-panel') !== key; });
            if (push && history.replaceState) {
                var url = new URL(window.location.href);
                url.searchParams.set('tab', key);
                history.replaceState({}, '', url);
            }
        };
        buttons.forEach(function (b) {
            b.addEventListener('click', function () { activate(b.getAttribute('data-tab'), true); });
        });
        var initial = new URL(window.location.href).searchParams.get('tab');
        var valid = buttons.map(function (b) { return b.getAttribute('data-tab'); });
        activate(initial && valid.indexOf(initial) !== -1 ? initial : buttons[0].getAttribute('data-tab'), false);
    });

    /* -------------------------------------------------- rich text editor */
    /*
     * A real editor for the long fields: blog posts, pages, calculator notes.
     *
     * It is still a contenteditable area over a hidden input — the form posts
     * exactly what it posted before — but the controls now cover what writing a
     * post actually needs: headings, lists, quotes, code, links, images from the
     * media library, undo/redo, a focus mode and an HTML view for the times a
     * writer needs one.
     *
     * Two rules matter more than the buttons:
     *   1. pasted content is cleaned before it lands. Copying from Word or a
     *      Google Doc brings a kilo of inline styles and <o:p> tags that fight
     *      the site's own CSS, and the old editor pasted all of it.
     *   2. the hidden input is synced on input, on blur and on submit, so a
     *      save can never post a stale copy of the body.
     */
    var ALLOWED_PASTE = {
        P: 1, BR: 1, STRONG: 1, B: 1, EM: 1, I: 1, U: 1, S: 1, STRIKE: 1, SUB: 1, SUP: 1,
        A: 1, UL: 1, OL: 1, LI: 1, H2: 1, H3: 1, H4: 1, H5: 1, H6: 1,
        BLOCKQUOTE: 1, PRE: 1, CODE: 1, HR: 1, FIGURE: 1, FIGCAPTION: 1,
        IMG: 1, TABLE: 1, THEAD: 1, TBODY: 1, TR: 1, TH: 1, TD: 1
    };
    var KEEP_ATTR = {
        A: { href: 1, title: 1, target: 1, rel: 1 },
        IMG: { src: 1, alt: 1, width: 1, height: 1 }
    };

    /**
     * Tidy what the editor produced before it is posted.
     *
     * contenteditable leaves litter: a bare text node with no <p>, a trailing
     * empty paragraph from the last Enter, `<b><br></b>` where someone pressed
     * Enter inside a bold run. None of it is visible, all of it ends up in the
     * article body.
     */
    var BLOCK_TAGS = { P: 1, H2: 1, H3: 1, H4: 1, H5: 1, H6: 1, UL: 1, OL: 1, BLOCKQUOTE: 1, PRE: 1, FIGURE: 1, TABLE: 1, HR: 1, DIV: 1 };
    function tidyHtml(html) {
        var box = document.createElement('div');
        box.innerHTML = html;

        /* loose text and inline elements become their own paragraph */
        var run = null;
        [].slice.call(box.childNodes).forEach(function (node) {
            var isBlock = node.nodeType === 1 && BLOCK_TAGS[node.tagName];
            if (isBlock) { run = null; return; }
            if (!run) {
                run = document.createElement('p');
                box.insertBefore(run, node);
            }
            run.appendChild(node);
        });

        /* empty paragraphs and bold-wrapped line breaks */
        [].slice.call(box.querySelectorAll('p')).forEach(function (p) {
            if (!p.textContent.trim() && !p.querySelector('img,hr,table,br')) { p.remove(); }
        });
        [].slice.call(box.querySelectorAll('b,strong,em,i,u,s')).forEach(function (el) {
            if (!el.textContent.trim() && !el.querySelector('img')) { el.remove(); }
            else if (el.children.length === 1 && el.firstChild.tagName === 'BR' && !el.textContent.trim()) { el.remove(); }
        });
        while (box.lastChild && box.lastChild.nodeType === 1 && !box.lastChild.textContent.trim()
               && !box.lastChild.querySelector('img,hr,table')) {
            box.removeChild(box.lastChild);
        }
        return box.innerHTML.trim();
    }

    /** Strip everything the site's stylesheet does not know how to render. */
    function cleanHtml(html) {
        var doc = document.createElement('div');
        doc.innerHTML = html;
        (function walk(node) {
            var children = [].slice.call(node.childNodes);
            children.forEach(function (child) {
                if (child.nodeType === 3) { return; }
                if (child.nodeType !== 1) { node.removeChild(child); return; }
                var tag = child.tagName;
                if (!ALLOWED_PASTE[tag]) {
                    /* Unwrap rather than delete: the words inside a <span> or a
                       Word <div class="MsoNormal"> are the writer's words. */
                    walk(child);
                    while (child.firstChild) { node.insertBefore(child.firstChild, child); }
                    node.removeChild(child);
                    return;
                }
                var keep = KEEP_ATTR[tag] || {};
                [].slice.call(child.attributes).forEach(function (attr) {
                    if (!keep[attr.name]) { child.removeAttribute(attr.name); }
                });
                if (tag === 'A') {
                    var href = child.getAttribute('href') || '';
                    if (/^(javascript|data):/i.test(href)) { child.removeAttribute('href'); }
                    if (/^https?:/i.test(href)) {
                        child.setAttribute('rel', 'noopener');
                        if (!child.getAttribute('target')) { child.setAttribute('target', '_blank'); }
                    }
                }
                if (tag === 'IMG') {
                    var src = child.getAttribute('src') || '';
                    if (!src || /^javascript:/i.test(src)) { node.removeChild(child); return; }
                }
                walk(child);
            });
        })(doc);
        return doc.innerHTML;
    }

    $$('[data-editor]').forEach(function (host) {
        var area = $('.editor-area', host);
        var source = $('.editor-source', host);
        /* The media input is a hidden input too and sits earlier in the DOM, so
           name the field we actually post to instead of taking the first match. */
        var hidden = $('[data-editor-value]', host) || $('input[type="hidden"]', host);
        var counter = $('[data-editor-count]', host);
        if (!area || !hidden) { return; }

        var savedRange = null;
        try { document.execCommand('defaultParagraphSeparator', false, 'p'); } catch (e) {}
        if (!area.getAttribute('data-placeholder')) {
            area.setAttribute('data-placeholder', 'Start writing…');
        }

        var sync = function () {
            hidden.value = tidyHtml(area.innerHTML);
            if (counter) {
                var text = area.textContent.replace(/\u00a0/g, ' ').trim();
                var words = text ? text.split(/\s+/).filter(Boolean).length : 0;
                counter.textContent = words + (words === 1 ? ' word · ' : ' words · ')
                    + text.length + ' characters';
            }
            area.classList.toggle('is-empty', area.textContent.trim() === '' && !area.querySelector('img,hr,table'));
        };
        area.addEventListener('input', sync);
        area.addEventListener('blur', function () { saveRange(); sync(); });

        function saveRange() {
            var sel = window.getSelection();
            if (sel && sel.rangeCount && area.contains(sel.anchorNode)) {
                savedRange = sel.getRangeAt(0).cloneRange();
            }
        }
        function restoreRange() {
            /* Focus first, range second. Focusing after addRange() collapses the
               selection to the start of the box in Chrome, which is why a
               heading chosen from the dropdown used to land on the wrong block. */
            area.focus();
            var sel = window.getSelection();
            if (!savedRange || !area.contains(savedRange.startContainer)) {
                var r = document.createRange();
                r.selectNodeContents(area);
                r.collapse(false);
                sel.removeAllRanges();
                sel.addRange(r);
                savedRange = r.cloneRange();
                return;
            }
            sel.removeAllRanges();
            sel.addRange(savedRange);
        }
        function insertNode(node) {
            restoreRange();
            var sel = window.getSelection();
            if (!sel || !sel.rangeCount) { area.appendChild(node); sync(); return; }
            var range = sel.getRangeAt(0);
            range.deleteContents();
            range.insertNode(node);
            range.setStartAfter(node);
            range.collapse(true);
            sel.removeAllRanges();
            sel.addRange(range);
            saveRange();
            sync();
        }
        function insertHtml(html) {
            restoreRange();
            var ok = false;
            try { ok = document.execCommand('insertHTML', false, html); } catch (e) { ok = false; }
            if (!ok) {
                var wrap = document.createElement('div');
                wrap.innerHTML = html;
                while (wrap.firstChild) { area.appendChild(wrap.firstChild); }
            }
            sync();
        }

        area.addEventListener('keyup', saveRange);
        area.addEventListener('mouseup', saveRange);
        document.addEventListener('selectionchange', function () {
            if (document.activeElement === area) { saveRange(); paintActive(); }
        });

        /* Keep the toolbar honest about where the caret is. */
        function paintActive() {
            $$('[data-cmd]', host).forEach(function (btn) {
                var cmd = btn.getAttribute('data-cmd');
                if (['undo', 'redo', 'removeFormat', 'unlink', 'outdent', 'indent', 'insertHorizontalRule'].indexOf(cmd) !== -1) { return; }
                var on = false;
                try { on = document.queryCommandState(cmd); } catch (e) { on = false; }
                btn.classList.toggle('is-active', !!on);
            });
            var block = $('[data-block-select]', host);
            if (block) {
                var tag = '';
                try { tag = (document.queryCommandValue('formatBlock') || '').toLowerCase(); } catch (e) { tag = ''; }
                var map = { '': 'p', 'div': 'p', 'p': 'p', 'h1': 'h2', 'h2': 'h2', 'h3': 'h3', 'h4': 'h4', 'blockquote': 'blockquote', 'pre': 'pre' };
                block.value = map[tag] || 'p';
            }
        }

        /* ---- commands ------------------------------------------------- */
        $$('[data-block-select]', host).forEach(function (sel) {
            sel.addEventListener('change', function () {
                /* Focus alone puts the caret somewhere arbitrary (often the
                   start), so a heading applied "to the current block" landed
                   nowhere. The saved range is the one the writer left. */
                restoreRange();
                document.execCommand('formatBlock', false, sel.value);
                saveRange();
                sync();
            });
        });

        $$('[data-cmd]', host).forEach(function (btn) {
            /* mousedown, not click: pressing a button must not steal the
               selection before the command runs. */
            btn.addEventListener('mousedown', function (ev) { ev.preventDefault(); });
            btn.addEventListener('click', function (ev) {
                ev.preventDefault();
                var cmd = btn.getAttribute('data-cmd');
                var value = btn.getAttribute('data-value') || null;
                restoreRange();
                if (cmd === 'createLink') {
                    value = window.prompt('Link address', 'https://');
                    if (!value) { return; }
                    if (!/^(https?:|\/|#|mailto:|tel:)/i.test(value)) { value = 'https://' + value; }
                }
                document.execCommand(cmd, false, value);
                saveRange();
                sync();
                paintActive();
            });
        });

        var mediaInput = $('.editor-media', host);
        if (mediaInput && !mediaInput.id) { mediaInput.id = 'editor-media-' + Math.random().toString(36).slice(2, 8); }

        $$('[data-action]', host).forEach(function (btn) {
            btn.addEventListener('mousedown', function (ev) { ev.preventDefault(); });
            btn.addEventListener('click', function (ev) {
                ev.preventDefault();
                var action = btn.getAttribute('data-action');

                if (action === 'image') {
                    if (!mediaInput) { return; }
                    saveRange();
                    btn.setAttribute('data-media-pick', mediaInput.id);
                    var url = window.prompt('Image address — or leave blank to pick from the media library', '');
                    if (url) {
                        insertHtml('<figure><img src="' + url.replace(/"/g, '&quot;') + '" alt=""></figure>');
                        return;
                    }
                    btn.click(); /* the delegated picker handler opens the modal */
                    return;
                }

                if (action === 'link') {
                    saveRange();
                    var href = window.prompt('Link address', 'https://');
                    if (!href) { return; }
                    if (!/^(https?:|\/|#|mailto:|tel:)/i.test(href)) { href = 'https://' + href; }
                    var label = '';
                    var sel = window.getSelection();
                    if (sel && sel.toString()) { label = sel.toString(); }
                    var attrs = ' href="' + href.replace(/"/g, '&quot;') + '"';
                    if (/^https?:/i.test(href)) { attrs += ' target="_blank" rel="noopener"'; }
                    insertHtml('<a' + attrs + '>' + (label ? label : href) + '</a>');
                    return;
                }

                if (action === 'inline-code') {
                    var choice = window.getSelection();
                    var text = choice ? choice.toString() : '';
                    insertHtml('<code>' + (text || 'code') + '</code>');
                    return;
                }

                if (action === 'hr') {
                    /* execCommand writes <hr id="null"> when handed null — even
                       that stray attribute ends up in the published body. */
                    restoreRange();
                    var hr = document.createElement('hr');
                    insertNode(hr);
                    var spacer = document.createElement('p');
                    spacer.innerHTML = '<br>';
                    insertNode(spacer);
                    return;
                }

                if (action === 'clean-paste') {
                    if (navigator.clipboard && navigator.clipboard.readText) {
                        navigator.clipboard.readText().then(function (text) {
                            insertHtml(text.split(/\n{2,}/).map(function (para) {
                                var clean = para.trim().replace(/[<>&]/g, function (c) {
                                    return { '<': '&lt;', '>': '&gt;', '&': '&amp;' }[c];
                                });
                                return clean ? '<p>' + clean.replace(/\n/g, '<br>') + '</p>' : '';
                            }).join(''));
                        }).catch(function () {
                            window.alert('The browser would not let the panel read the clipboard. Paste into the editor directly — it is cleaned automatically.');
                        });
                    } else {
                        window.alert('Paste into the editor directly; pasted formatting is cleaned automatically.');
                    }
                    return;
                }

                if (action === 'fullscreen') {
                    var on = host.classList.toggle('is-fullscreen');
                    btn.setAttribute('aria-pressed', on ? 'true' : 'false');
                    btn.textContent = on ? 'Close focus' : 'Focus';
                    document.body.classList.toggle('editor-locked', on);
                    return;
                }
            });
        });

        /* ---- paste: clean it before it lands -------------------------- */
        area.addEventListener('paste', function (ev) {
            var cd = ev.clipboardData || window.clipboardData;
            if (!cd) { return; }
            var html = cd.getData('text/html');
            var text = cd.getData('text/plain');
            ev.preventDefault();
            if (html) {
                insertHtml(cleanHtml(html));
            } else if (text) {
                insertHtml(text.split(/\n{2,}/).map(function (para) {
                    var clean = para.trim().replace(/[<>&]/g, function (c) {
                        return { '<': '&lt;', '>': '&gt;', '&': '&amp;' }[c];
                    });
                    return clean ? '<p>' + clean.replace(/\n/g, '<br>') + '</p>' : '';
                }).join(''));
            }
        });

        /* ---- images picked from the media library --------------------- */
        if (mediaInput) {
            mediaInput.addEventListener('media:picked', function (ev) {
                var item = ev.detail || {};
                var url = item.url || mediaInput.value;
                if (!url) { return; }
                var alt = (item.name || '').replace(/\.[a-z0-9]+$/i, '').replace(/"/g, '&quot;');
                insertHtml('<figure><img src="' + String(url).replace(/"/g, '&quot;') + '" alt="' + alt + '">'
                    + (alt ? '<figcaption>' + alt + '</figcaption>' : '') + '</figure>');
                mediaInput.value = '';
            });
        }

        /* ---- shortcuts ------------------------------------------------ */
        area.addEventListener('keydown', function (ev) {
            var mod = ev.ctrlKey || ev.metaKey;
            if (!mod) { return; }
            var key = ev.key.toLowerCase();
            if (key === 'k') { ev.preventDefault(); var linkBtn = $('[data-action="link"]', host); if (linkBtn) { linkBtn.click(); } }
            if (key === 's') { ev.preventDefault(); }   /* the form's own Save wins */
        });

        /* ---- HTML view ------------------------------------------------ */
        var htmlBtn = $('[data-toggle-source]', host);
        if (htmlBtn && source) {
            htmlBtn.addEventListener('click', function (ev) {
                ev.preventDefault();
                if (source.hidden) {
                    source.value = area.innerHTML;
                    source.hidden = false;
                    area.hidden = true;
                    htmlBtn.textContent = 'Visual';
                    htmlBtn.setAttribute('aria-pressed', 'true');
                    source.focus();
                } else {
                    area.innerHTML = source.value;
                    source.hidden = true;
                    area.hidden = false;
                    htmlBtn.textContent = 'HTML';
                    htmlBtn.setAttribute('aria-pressed', 'false');
                    sync();
                }
            });
            source.addEventListener('input', function () {
                area.innerHTML = source.value;
                sync();
            });
        }

        var form = host.closest('form');
        if (form) { form.addEventListener('submit', sync); }
        sync();
        paintActive();
    });

    /* ------------------------------------------------------- media picker */
    var picker = null;
    function openPicker(targetInput, filter) {
        if (!picker) { return; }
        picker.dataset.target = targetInput.id || '';
        picker.classList.add('is-open');
        loadPicker('');
        var focusable = picker.querySelector('input[type="search"]');
        if (focusable) { setTimeout(function () { focusable.focus(); }, 30); }
    }
    function closePicker() {
        if (picker) { picker.classList.remove('is-open'); }
    }
    function loadPicker(query) {
        var grid = $('#media-picker-grid');
        if (!grid) { return; }
        grid.innerHTML = '<p class="muted small">Loading…</p>';
        fetch(base + '/index.php?p=media&action=json&q=' + encodeURIComponent(query || ''), { headers: { 'X-Requested-With': 'fetch' } })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (!data.items || !data.items.length) {
                    grid.innerHTML = '<p class="muted small">No media yet. Upload a file in the media library first.</p>';
                    return;
                }
                grid.innerHTML = '';
                data.items.forEach(function (item) {
                    var card = document.createElement('button');
                    card.type = 'button';
                    card.className = 'media-card';
                    card.style.textAlign = 'left';
                    card.innerHTML = '<span class="thumb"><img src="' + item.url + '" alt="" loading="lazy"></span>' +
                        '<span class="meta"><span class="name">' + item.name + '</span><span class="muted small">' + item.dimensions + '</span></span>';
                    card.addEventListener('click', function () {
                        var target = document.getElementById(picker.dataset.target);
                        if (target) {
                            target.value = item.path;
                            var preview = document.querySelector('[data-preview-for="' + picker.dataset.target + '"]');
                            if (preview) {
                                preview.src = item.url;
                                preview.hidden = false;
                            }
                        }
                        /* The editor listens for this on its own hidden
                           input; every other field just takes the value. */
                        try {
                            target.dispatchEvent(new CustomEvent('media:picked', { bubbles: true, detail: item }));
                        } catch (e) {}
                        closePicker();
                    });
                    grid.appendChild(card);
                });
            })
            .catch(function () { grid.innerHTML = '<p class="muted small">Could not load the media library.</p>'; });
    }
    document.addEventListener('click', function (ev) {
        var open = ev.target.closest('[data-media-pick]');
        if (open) {
            ev.preventDefault();
            picker = picker || $('#media-picker');
            openPicker(document.getElementById(open.getAttribute('data-media-pick')), open.getAttribute('data-media-filter'));
            return;
        }
        if (ev.target.closest('[data-media-close]') || ev.target.classList.contains('modal-backdrop')) {
            closePicker();
            $$('.modal.is-open').forEach(function (m) { m.classList.remove('is-open'); });
        }
        var copy = ev.target.closest('[data-copy]');
        if (copy) {
            ev.preventDefault();
            var text = copy.getAttribute('data-copy');
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text).then(function () { flashButton(copy, 'Copied'); });
            } else {
                var tmp = document.createElement('textarea');
                tmp.value = text;
                document.body.appendChild(tmp);
                tmp.select();
                document.execCommand('copy');
                tmp.remove();
                flashButton(copy, 'Copied');
            }
        }
    });
    var pickerSearch = $('#media-picker-search');
    if (pickerSearch) {
        var t = null;
        pickerSearch.addEventListener('input', function () {
            clearTimeout(t);
            t = setTimeout(function () { loadPicker(pickerSearch.value); }, 220);
        });
    }
    document.addEventListener('keydown', function (ev) {
        if (ev.key === 'Escape') {
            closePicker();
            $$('.modal.is-open').forEach(function (m) { m.classList.remove('is-open'); });
        }
    });

    function flashButton(btn, label) {
        var original = btn.textContent;
        btn.textContent = label;
        btn.classList.add('is-disabled');
        setTimeout(function () { btn.textContent = original; btn.classList.remove('is-disabled'); }, 1300);
    }

    /* ---------------------------------------------------- select all rows */
    $$('[data-select-all]').forEach(function (box) {
        box.addEventListener('change', function () {
            $$('input[name="ids[]"]').forEach(function (cb) {
                cb.checked = box.checked;
                var tr = cb.closest('tr');
                if (tr) { tr.classList.toggle('is-selected', box.checked); }
            });
        });
    });
    document.addEventListener('change', function (ev) {
        if (ev.target.matches && ev.target.matches('input[name="ids[]"]')) {
            var tr = ev.target.closest('tr');
            if (tr) { tr.classList.toggle('is-selected', ev.target.checked); }
        }
    });

    /* --------------------------------------------- bulk action needs rows */
    $$('[data-bulk-form]').forEach(function (form) {
        form.addEventListener('submit', function (ev) {
            var checked = form.querySelectorAll('input[name="ids[]"]:checked').length;
            if (!checked) {
                ev.preventDefault();
                window.alert('Select at least one row first.');
                return;
            }
            var action = form.querySelector('[name="bulk_action"]');
            if (action && action.value === 'delete' && !window.confirm('Delete ' + checked + ' item(s)? This cannot be undone.')) {
                ev.preventDefault();
            }
        });
    });

    /* -------------------------------------------------- unsaved warning */
    var dirty = false;
    $$('form[data-track-dirty]').forEach(function (form) {
        form.addEventListener('input', function () { dirty = true; });
        form.addEventListener('submit', function () { dirty = false; });
    });
    window.addEventListener('beforeunload', function (ev) {
        if (!dirty) { return; }
        ev.preventDefault();
        ev.returnValue = '';
    });

    /* --------------------------------------------------------- auto-submit */
    $$('[data-auto-submit] select').forEach(function (sel) {
        sel.addEventListener('change', function () { sel.form.submit(); });
    });

    /* ------------------------------------------------------- collapse panels */
    /* A button that shows/hides one panel — used by "New file" and the
       advanced blocks in the calculator editor. Nothing is ever hidden without
       a visible way back to it. */
    $$('[data-toggle-target]').forEach(function (btn) {
        var target = document.querySelector(btn.getAttribute('data-toggle-target'));
        if (!target) { return; }
        btn.addEventListener('click', function () {
            var opening = target.hasAttribute('hidden');
            if (opening) {
                target.removeAttribute('hidden');
            } else {
                target.setAttribute('hidden', '');
            }
            btn.setAttribute('aria-expanded', opening ? 'true' : 'false');
            btn.textContent = opening ? 'Hide' : 'Show';
            if (opening) {
                var first = target.querySelector('input, textarea, select');
                if (first && first.type !== 'hidden') { first.focus(); }
            }
        });
    });

    /* --------------------------------------------------- keyboard shortcut */
    document.addEventListener('keydown', function (ev) {
        if ((ev.metaKey || ev.ctrlKey) && ev.key.toLowerCase() === 's') {
            var form = document.querySelector('form[data-primary-form]');
            if (form) {
                ev.preventDefault();
                form.requestSubmit ? form.requestSubmit() : form.submit();
            }
        }
    });
})();
