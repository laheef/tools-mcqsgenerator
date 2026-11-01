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
    $$('[data-editor]').forEach(function (host) {
        var area = $('.editor-area', host);
        var source = $('.editor-source', host);
        var hidden = $('input[type="hidden"], textarea[data-editor-value]', host);
        var counter = $('[data-editor-count]', host);
        if (!area || !hidden) { return; }

        var sync = function () {
            hidden.value = area.innerHTML.trim();
            if (counter) {
                var words = area.textContent.trim().split(/\s+/).filter(Boolean).length;
                counter.textContent = words + ' words · ' + area.textContent.trim().length + ' characters';
            }
        };
        area.addEventListener('input', sync);
        area.addEventListener('blur', sync);

        $$('[data-cmd]', host).forEach(function (btn) {
            btn.addEventListener('click', function (ev) {
                ev.preventDefault();
                var cmd = btn.getAttribute('data-cmd');
                var value = btn.getAttribute('data-value') || null;
                area.focus();
                if (cmd === 'createLink') {
                    value = window.prompt('Link address', 'https://');
                    if (!value) { return; }
                    if (!/^(https?:|\/|#|mailto:)/i.test(value)) { value = 'https://' + value; }
                }
                if (cmd === 'formatBlock' && value) {
                    document.execCommand('formatBlock', false, value);
                } else {
                    document.execCommand(cmd, false, value);
                }
                sync();
            });
        });

        var htmlBtn = $('[data-toggle-source]', host);
        if (htmlBtn && source) {
            htmlBtn.addEventListener('click', function (ev) {
                ev.preventDefault();
                if (source.hidden) {
                    source.value = area.innerHTML;
                    source.hidden = false;
                    area.hidden = true;
                    htmlBtn.textContent = 'Visual';
                } else {
                    area.innerHTML = source.value;
                    source.hidden = true;
                    area.hidden = false;
                    htmlBtn.textContent = 'HTML';
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
