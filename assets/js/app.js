/* ==========================================================================
   Site behaviour: search suggestions, collapsible widget groups, copy link,
   print, mobile nav. Progressive enhancement only — nothing here is required
   to read a page or to get a correct calculation.
   ========================================================================== */
(function () {
  'use strict';

  /* ------------------------------------------------- instant search */
  var SEARCH_INDEX = null;
  var indexPromise = null;

  function loadIndex() {
    if (indexPromise) return indexPromise;
    indexPromise = fetch((window.BASE_PATH || '') + '/search-index.json')
      .then(function (r) { return r.ok ? r.json() : []; })
      .then(function (data) { SEARCH_INDEX = data; return data; })
      .catch(function () { return []; });
    return indexPromise;
  }

  function score(item, q) {
    var name = item.n.toLowerCase();
    var desc = (item.d || '').toLowerCase();
    var s = 0;
    if (name === q) s += 200;
    if (name.indexOf(q) === 0) s += 120;
    else if (name.indexOf(q) !== -1) s += 70;
    if (desc.indexOf(q) !== -1) s += 12;
    return s;
  }

  function suggestionsFor(list, q) {
    if (!q) return [];
    q = q.toLowerCase().trim();
    var out = [];
    for (var i = 0; i < list.length; i++) {
      var sc = score(list[i], q);
      if (sc > 0) out.push([sc, list[i]]);
    }
    out.sort(function (a, b) { return b[0] - a[0]; });
    return out.slice(0, 7).map(function (p) { return p[1]; });
  }

  function enhanceSearch(container) {
    var input = container.querySelector('[data-search-input]');
    var box = container.querySelector('.search-suggestions');
    if (!input || !box) return;

    var active = -1;
    var current = [];

    function close() {
      box.hidden = true;
      box.innerHTML = '';
      active = -1;
      input.setAttribute('aria-expanded', 'false');
    }

    function render(items) {
      current = items;
      if (!items.length) { close(); return; }
      box.innerHTML = items.map(function (it, i) {
        return '<a role="option" id="sugg-' + i + '" href="' + (window.BASE_PATH || '') + it.u + '">' +
          '<span class="suggestion-name">' + escapeHtml(it.n) + '</span>' +
          '<span class="suggestion-cat">' + escapeHtml(labelFor(it.c)) + '</span></a>';
      }).join('');
      box.hidden = false;
      input.setAttribute('aria-expanded', 'true');
      active = -1;
    }

    function escapeHtml(s) {
      return String(s).replace(/[&<>"']/g, function (c) {
        return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
      });
    }

    function labelFor(slug) {
      return slug.replace(/-/g, ' ').replace(/\b\w/g, function (c) { return c.toUpperCase(); });
    }

    input.addEventListener('focus', function () {
      loadIndex().then(function (list) {
        if (input.value.trim().length >= 2) render(suggestionsFor(list, input.value));
      });
    });

    input.addEventListener('input', function () {
      var q = input.value;
      if (q.trim().length < 2) { close(); return; }
      loadIndex().then(function (list) { render(suggestionsFor(list, q)); });
    });

    input.addEventListener('keydown', function (ev) {
      if (box.hidden) return;
      var links = [].slice.call(box.querySelectorAll('a'));
      if (ev.key === 'ArrowDown') {
        ev.preventDefault();
        active = Math.min(active + 1, links.length - 1);
      } else if (ev.key === 'ArrowUp') {
        ev.preventDefault();
        active = Math.max(active - 1, -1);
      } else if (ev.key === 'Enter' && active >= 0) {
        ev.preventDefault();
        links[active].click();
        return;
      } else if (ev.key === 'Escape') {
        close();
        return;
      } else {
        return;
      }
      links.forEach(function (l, i) { l.classList.toggle('is-active', i === active); });
      if (active >= 0 && links[active]) {
        input.setAttribute('aria-activedescendant', links[active].id);
        links[active].scrollIntoView({ block: 'nearest' });
      }
    });

    document.addEventListener('click', function (ev) {
      if (!container.contains(ev.target)) close();
    });
  }

  [].slice.call(document.querySelectorAll('.search, .hero-search')).forEach(enhanceSearch);

  /* --------------------------------------------- collapsible groups */
  [].slice.call(document.querySelectorAll('[data-group-toggle]')).forEach(function (btn) {
    btn.addEventListener('click', function () {
      if (btn.hasAttribute('data-static')) return; // nothing to collapse
      var expanded = btn.getAttribute('aria-expanded') === 'true';
      btn.setAttribute('aria-expanded', expanded ? 'false' : 'true');
      var body = document.getElementById(btn.getAttribute('aria-controls'));
      if (body) body.hidden = expanded;
    });
  });

  /* ----------------------------------------------------- copy link */
  [].slice.call(document.querySelectorAll('[data-share="copy"]')).forEach(function (btn) {
    btn.addEventListener('click', function () {
      var label = btn.querySelector('span');
      var done = function (ok) {
        if (!label) return;
        var original = label.textContent;
        label.textContent = ok === false ? 'Press Ctrl+C to copy' : 'Link copied';
        setTimeout(function () { label.textContent = original; }, 1800);
      };
      var fallback = function () {
        var ta = document.createElement('textarea');
        ta.value = window.location.href;
        ta.setAttribute('readonly', '');
        ta.style.position = 'fixed';
        ta.style.opacity = '0';
        document.body.appendChild(ta);
        ta.select();
        var copied = false;
        try { copied = document.execCommand('copy'); } catch (e) { copied = false; }
        document.body.removeChild(ta);
        // Even without clipboard access, confirm the action so the button is
        // never a silent no-op — the URL is also visible in the address bar.
        done(copied);
      };
      if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(window.location.href).then(function () { done(true); }).catch(fallback);
      } else {
        fallback();
      }
    });
  });


  /* ==================================================================
     Engagement: likes, reviews, preferred source.
     Every action talks to /api/... and shows what the server returned —
     nothing is faked locally, so a failed write is visible, not silent.
     ================================================================== */

  function api(path, body) {
    var base = window.BASE_PATH || '';
    var opts = { method: 'POST', credentials: 'same-origin', headers: {} };
    if (body) {
      opts.headers['Content-Type'] = 'application/json';
      opts.body = JSON.stringify(body);
    }
    return fetch(base + '/api/' + path, opts).then(function (r) {
      return r.json().catch(function () { return { ok: false, error: 'Unexpected response.' }; })
        .then(function (data) {
          if (!r.ok) throw data;
          return data;
        });
    });
  }

  /* ------------------------------------------------------------ likes */
  [].slice.call(document.querySelectorAll('[data-like]')).forEach(function (btn) {
    var path = btn.getAttribute('data-like');
    var countEl = btn.querySelector('[data-like-count]');
    var labelEl = btn.querySelector('[data-like-label]');

    btn.addEventListener('click', function () {
      if (btn.disabled) return;
      btn.disabled = true;
      api('like', { path: path }).then(function (data) {
        if (countEl) countEl.textContent = data.likes;
        if (labelEl) {
          labelEl.textContent = data.likes === 1 ? 'person finds this helpful' : 'people find this helpful';
        }
        btn.classList.add('is-liked');
        btn.setAttribute('aria-pressed', 'true');
        btn.classList.add('is-flash');
        setTimeout(function () { btn.classList.remove('is-flash'); }, 900);
        btn.title = data.message || '';
      }).catch(function (err) {
        btn.classList.add('is-error');
        btn.title = (err && err.error) || 'Could not save your vote.';
        setTimeout(function () { btn.classList.remove('is-error'); }, 1600);
      }).then(function () {
        // a second click is harmless (the server refuses duplicates) but the
        // button stays disabled so the count cannot run away in the UI
        setTimeout(function () { btn.disabled = false; }, 600);
      });
    });
  });

  /* -------------------------------------------------------- jump link */
  [].slice.call(document.querySelectorAll('[data-jump]')).forEach(function (btn) {
    btn.addEventListener('click', function () {
      var target = document.getElementById(btn.getAttribute('data-jump'));
      if (!target) return;
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      var field = target.querySelector('input, textarea');
      if (field) setTimeout(function () { field.focus({ preventScroll: true }); }, 400);
    });
  });

  /* ---------------------------------------------------------- reviews */
  var form = document.querySelector('[data-review-form]');
  if (form) {
    var status = form.querySelector('[data-review-status]');
    var list = document.querySelector('[data-review-list]');
    var empty = document.querySelector('[data-review-empty]');
    var submit = form.querySelector('button[type="submit"]');

    function setStatus(text, kind) {
      if (!status) return;
      status.textContent = text || '';
      status.className = 'review-form-status' + (kind ? ' is-' + kind : '');
    }

    function escapeHtml(s) {
      return String(s).replace(/[&<>"']/g, function (c) {
        return { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c];
      });
    }

    function stars(n) {
      var full = '', emptyStar = '';
      for (var i = 0; i < 5; i++) { full += i < n ? '★' : '☆'; }
      return full + emptyStar;
    }

    function prepend(review) {
      if (!list) return;
      var li = document.createElement('li');
      li.className = 'review is-new';
      li.setAttribute('data-review-id', review.id);
      li.innerHTML =
        '<div class="review-head">' +
          '<span class="review-avatar" aria-hidden="true">' + escapeHtml(review.initials) + '</span>' +
          '<span class="review-meta">' +
            '<span class="review-name">' + escapeHtml(review.name) + '</span>' +
            '<span class="review-sub">' +
              '<span class="review-stars">' + stars(review.rating) + '</span>' +
              '<time>' + escapeHtml(review.ago) + '</time>' +
            '</span>' +
          '</span>' +
        '</div>' +
        (review.title ? '<h3 class="review-title">' + escapeHtml(review.title) + '</h3>' : '') +
        '<p class="review-body">' + escapeHtml(review.body).replace(/\n/g, '<br>') + '</p>';
      list.insertBefore(li, list.firstChild);
      if (empty) empty.hidden = true;
    }

    form.addEventListener('submit', function (ev) {
      ev.preventDefault();
      if (submit) submit.disabled = true;
      setStatus('Publishing…', 'pending');

      var data = {
        path: form.querySelector('[name="path"]').value,
        name: form.querySelector('[name="name"]').value,
        title: form.querySelector('[name="title"]').value,
        body: form.querySelector('[name="body"]').value,
        rating: parseInt((form.querySelector('[name="rating"]:checked') || {}).value || '0', 10)
      };

      api('review', data).then(function (res) {
        prepend(res.review);
        form.reset();
        setStatus('Thanks — your review is live.', 'ok');
        var avg = document.querySelector('[data-rating-avg]');
        var cnt = document.querySelector('[data-rating-count]');
        var total = document.querySelector('[data-rating-total]');
        var inline = document.querySelector('[data-rating-avg-inline]');
        if (avg) avg.textContent = res.rating.toFixed(1);
        if (cnt) cnt.textContent = '(' + res.count + ')';
        if (total) total.textContent = res.count;
        if (inline) inline.textContent = res.rating.toFixed(1) + ' out of 5';
        var starsEl = document.querySelector('.rating-btn .rating-stars');
        if (starsEl) starsEl.textContent = stars(Math.round(res.rating));
      }).catch(function (err) {
        var msg = (err && (err.error || (err.errors && Object.values(err.errors)[0]))) || 'Could not publish your review.';
        setStatus(msg, 'error');
      }).then(function () {
        if (submit) submit.disabled = false;
      });
    });
  }

  /* ------------------------------------------- Google preferred source */
  /*
   * There is no public API to register a preferred source from our page, so the
   * honest behaviour is: remember the visitor's choice on this device, tell them
   * what it means, and hand them the Google page that actually controls it.
   * "Add to this device" is real — the setting persists and the page reflects it
   * on every return visit.
   */
  [].slice.call(document.querySelectorAll('[data-preferred]')).forEach(function (btn) {
    var key = 'omni_preferred';
    var label = btn.querySelector('[data-preferred-label]');
    var isSet = function () {
      try { return localStorage.getItem(key) === 'yes'; } catch (e) { return false; }
    };
    var paint = function () {
      var on = isSet();
      btn.classList.toggle('is-active', on);
      btn.setAttribute('aria-pressed', on ? 'true' : 'false');
      if (label) label.textContent = on ? 'Added as preferred on this device' : 'Add as preferred on Google';
    };
    paint();

    btn.addEventListener('click', function () {
      var on = !isSet();
      try { localStorage.setItem(key, on ? 'yes' : 'no'); } catch (e) { /* private mode */ }
      paint();
      var note = document.querySelector('[data-preferred-note]');
      if (!note) {
        note = document.createElement('p');
        note.className = 'preferred-note';
        note.setAttribute('data-preferred-note', '');
        note.setAttribute('role', 'status');
        note.innerHTML = 'Saved on this device. Google decides which sites count as a preferred source — '
          + '<a href="https://www.google.com/preferences/source?q=omnicalculator.com" target="_blank" rel="noopener nofollow">manage it in Google</a>.';
        btn.parentNode.insertBefore(note, btn.nextSibling);
      }
      note.hidden = !on;
    });
  });

  /* ------------------------------------------ calculator column pinning */
  /*
   * The tool column sticks from the bottom, not the top: it stops moving when
   * its own bottom edge reaches the bottom of the viewport, so the results and
   * the last fields stay on screen while the article scrolls past on the left.
   *
   * CSS alone cannot express that. `position: sticky; bottom: 0` does not pin
   * anything (sticky only holds an edge against the direction of scrolling),
   * and a viewport-tall box pinned at `top: 0` gets the bottom edge right only
   * once it has been reached — before that the card hangs off the bottom of the
   * screen. So the pin line is measured: the offset that leaves the card's
   * bottom on the viewport's bottom edge, or 0 when the card is taller than the
   * viewport (it then pins at the top and scrolls inside itself).
   *
   * Without this script the CSS default (`top: 0`) still works — the column
   * sticks, just from the top like every other sticky sidebar.
   */
  /*
   * The header sticks. CSS does the sticking; this only tells it when the page
   * has moved far enough that the compact version is the honest one — a header
   * that shrinks at scroll 0 would look broken on a page that has not moved.
   * One class toggle, updated at most once per frame, no layout read on scroll.
   */
  (function stickyHeader() {
    var header = document.querySelector('.site-header');
    if (!header || !header.classList.contains('is-sticky')) return;
    var stuck = false;
    var queued = false;
    function update() {
      queued = false;
      var now = window.pageYOffset > 120;
      if (now === stuck) return;
      stuck = now;
      header.classList.toggle('is-stuck', now);
      /* Measure rather than assume: the header is two rows on a phone and one
         on a desktop, so a hard-coded 58px would be wrong at one of them. */
      var height = header.offsetHeight;
      document.documentElement.style.setProperty('--header-h', height + 'px');
    }
    window.addEventListener('scroll', function () {
      if (queued) return;
      queued = true;
      window.requestAnimationFrame(update);
    }, { passive: true });
    /* Publish the resting height straight away: the sticky offsets elsewhere on
       the page read this variable before the first scroll happens. */
    document.documentElement.style.setProperty('--header-h', header.offsetHeight + 'px');
    update();
  })();

  (function pinCalculatorColumn() {
    var column = document.querySelector('.calc-widget-column');
    if (!column) return;
    var MIN_TOP = 72;    // never tuck the column's head closer than this

    /*
     * The whole column sticks, by its head, always.
     *
     * It used to switch ends: head-pinned while the card was short, then
     * foot-pinned once the results made it taller than the screen, so the last
     * row stayed just above the fold. That second mode is what a reader sees at
     * the top of a scrolled page — the title of the calculator gone, the form
     * cut through its first field, the card starting in the middle of itself.
     * The answers are no use if the page no longer says what it is answering.
     *
     * So the head is the anchor: the column pins with its title just under the
     * sticky header and stays there, top edge visible for the whole scroll. On
     * a screen too short for the whole card the furniture at the very bottom —
     * the tab strip and the share row — is what goes below the fold, and the
     * page's own scrolling brings it back at the end of the article.
     */
    function headerClearance() {
      var root = getComputedStyle(document.documentElement).getPropertyValue('--header-h');
      var measured = parseFloat(root);
      if (!measured || isNaN(measured)) {
        var header = document.querySelector('.site-header');
        measured = header ? header.offsetHeight : 0;
      }
      return Math.max(Math.round(measured) + 18, MIN_TOP);
    }

    var frame = null;
    function paint() {
      frame = null;
      var clear = headerClearance();
      var height = column.getBoundingClientRect().height;
      var viewport = window.innerHeight;
      if (!height) return;
      var pin = Math.round(clear);
      column.style.setProperty('--calc-pin', pin + 'px');
      column.classList.toggle('is-overfold', height + pin > viewport);
    }
    function queue() {
      if (frame !== null) return;
      frame = window.requestAnimationFrame(paint);
    }

    paint();
    window.addEventListener('scroll', queue, { passive: true });
    window.addEventListener('resize', queue);
    window.addEventListener('load', paint);
    /* The column changes height when the results appear, which is exactly the
       moment the pin has to be reconsidered. */
    if (typeof ResizeObserver === 'function') {
      new ResizeObserver(queue).observe(column);
    }
  })();

  /* ------------------------------------------------ tool-category dropdowns */
  /*
   * The second header row scrolls sideways, so a menu rendered inside it would
   * be clipped the moment it opened. Each dropdown is therefore `fixed` and
   * placed from its own link's rectangle, one at a time.
   *
   * Closing is the part that was wrong. `mouseleave` called close(group), and
   * close() skips the group it is given — so leaving a menu never closed that
   * menu, and it stayed on screen while the visitor scrolled away. The rule is
   * now explicit, and it is the rule a menu is supposed to follow:
   *
   *   - the pointer leaving the link *and* its menu closes it, after a short
   *     grace period so a diagonal move across the gap does not flicker;
   *   - moving between the link and its own menu keeps it open;
   *   - scroll, resize, an outside click, Escape, or focusing away closes it;
   *   - on a touch screen a tap toggles it, because there is no hover to end.
   */
  (function groupMenu() {
    var nav = document.querySelector('.category-nav');
    if (!nav) return;
    var groups = [].slice.call(nav.querySelectorAll('.category-nav-group'));
    if (!groups.length) return;

    var timer = null;
    var openGroup = null;

    function setOpen(group, open) {
      var menu = group.querySelector('.category-dropdown');
      var link = group.querySelector('.category-nav-link');
      if (!menu || !link) return;
      if (open) {
        close(null);
        openGroup = group;
        var box = link.getBoundingClientRect();
        menu.style.left = Math.round(Math.max(8, Math.min(box.left, window.innerWidth - 250))) + 'px';
        menu.style.top = Math.round(box.bottom) + 'px';
        menu.classList.add('is-open');
        link.setAttribute('aria-expanded', 'true');
      } else {
        menu.classList.remove('is-open');
        link.setAttribute('aria-expanded', 'false');
        if (openGroup === group) openGroup = null;
      }
    }

    function close(except) {
      groups.forEach(function (group) {
        var menu = group.querySelector('.category-dropdown');
        if (!menu || group === except) return;
        setOpen(group, false);
      });
    }

    function cancel() {
      if (timer) { clearTimeout(timer); timer = null; }
    }

    function scheduleClose(group) {
      cancel();
      timer = setTimeout(function () {
        timer = null;
        /* Still under the pointer, or focus is inside the menu: keep it. */
        if (group.matches(':hover') || group.contains(document.activeElement)) return;
        setOpen(group, false);
      }, 140);
    }

    groups.forEach(function (group) {
      var link = group.querySelector('.category-nav-link');
      var menu = group.querySelector('.category-dropdown');
      if (!link || !menu) return;

      group.addEventListener('mouseenter', function () { cancel(); setOpen(group, true); });
      group.addEventListener('mouseleave', function () { scheduleClose(group); });

      /* A touch device never fires mouseleave after the tap that opened the
         menu, so the tap itself is the toggle. */
      link.addEventListener('click', function (event) {
        if (window.matchMedia && window.matchMedia('(hover: none)').matches) {
          event.preventDefault();
          setOpen(group, !menu.classList.contains('is-open'));
        }
      });

      link.addEventListener('focus', function () { cancel(); setOpen(group, true); });
      link.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') { setOpen(group, false); link.blur(); }
      });
      /* Tabbing out of the menu closes it, the way the pointer leaving does. */
      group.addEventListener('focusout', function (event) {
        if (!group.contains(event.relatedTarget)) scheduleClose(group);
      });
    });

    window.addEventListener('scroll', function () { cancel(); close(null); }, { passive: true });
    window.addEventListener('resize', function () { cancel(); close(null); });
    document.addEventListener('click', function (event) {
      if (!event.target.closest || !event.target.closest('.category-nav-group')) close(null);
    });
    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape') close(null);
    });
  })();

  /* --------------------------------------------------------- scroll rows */
  /*
   * A row wider than its box gets a pair of arrows at its ends, and a row that
   * fits gets none — the buttons exist in the markup (keyboard reachable, named
   * for a screen reader) but stay hidden until this measures the overflow.
   *
   * Used by the second header row, which carries sixteen sections, and by the
   * home page's shelf rows, which carry one card per category. Both are wired
   * the same way: [data-scrollrow] wraps [data-scroll-track] and the two
   * buttons, so a page can add a third without touching this code.
   */
  (function scrollRows() {
    var rows = [].slice.call(document.querySelectorAll('[data-scrollrow]'));
    if (!rows.length) return;

    rows.forEach(function (row) {
      var track = row.querySelector('[data-scroll-track]');
      var prev = row.querySelector('[data-scroll-prev]');
      var next = row.querySelector('[data-scroll-next]');
      if (!track) return;

      function step() {
        return Math.max(180, Math.round(track.clientWidth * 0.8));
      }

      function paint() {
        var max = track.scrollWidth - track.clientWidth;
        if (max > 2) {
          row.setAttribute('data-overflow', '1');
        } else {
          row.removeAttribute('data-overflow');
        }
        if (prev) {
          prev.disabled = track.scrollLeft <= 2;
          prev.tabIndex = max > 2 ? 0 : -1;
        }
        if (next && prev) {
          next.disabled = track.scrollLeft >= max - 2;
          next.tabIndex = max > 2 ? 0 : -1;
        } else if (next) {
          /* A single end button never disables: at the end it goes back to the
             start, so there is no state in which clicking does nothing. */
          next.disabled = false;
          next.tabIndex = max > 2 ? 0 : -1;
        }
      }

      if (prev) {
        prev.addEventListener('click', function () {
          track.scrollBy({ left: -step(), behavior: 'smooth' });
        });
      }
      if (next) {
        next.addEventListener('click', function () {
          /* One button, at the end of the row. It walks the row rightwards and,
             once the last entry is in view, returns to the start — so a single
             control keeps working however many sections the site grows to,
             instead of stranding a visitor at the end with a dead arrow. */
          var max = track.scrollWidth - track.clientWidth;
          if (track.scrollLeft >= max - 4) {
            track.scrollTo({ left: 0, behavior: 'smooth' });
          } else {
            track.scrollBy({ left: step(), behavior: 'smooth' });
          }
        });
      }

      track.addEventListener('scroll', paint, { passive: true });
      window.addEventListener('resize', paint);
      if (window.ResizeObserver) {
        new ResizeObserver(paint).observe(track);
      }
      paint();
      /*
       * Measure again once everything has actually settled.
       *
       * The first paint happens on a deferred script, before the web font has
       * arrived: the row is measured in the fallback face, it says "this fits",
       * and nothing measures it again — the track's own box never changes size,
       * only the overflow inside it, so the ResizeObserver stays quiet. The
       * result was a row clipped at the right edge with no arrow to reach the
       * rest of it, which is exactly what a reader on a 1280px laptop saw.
       */
      window.addEventListener('load', paint);
      if (document.fonts && document.fonts.ready) {
        document.fonts.ready.then(paint).catch(function () {});
      }
    });
  })();

  /* ------------------------------------------------------- ad slot fitting */
  /*
   * An ad tag is written for one width: 728x90, 300x250, 970x250. On a phone
   * none of those fit, and the slot was `overflow: hidden`, so a leaderboard
   * simply had its right half sliced off — the same clipped-content bug the
   * form had, in a worse place, because a half-visible ad is worthless to the
   * advertiser and looks broken to the reader.
   *
   * The fix is to scale the whole tag down instead of cropping it: the slot
   * keeps the ad's own shape, every pixel of the creative is on screen, and
   * the reserved height shrinks with it so the page does not carry a blank
   * band. A tag that already fits is left completely alone.
   */
  (function fitAdSlots() {
    var slots = [].slice.call(document.querySelectorAll('.ad-slot:not(.ad-slot--preview)'));
    if (!slots.length) return;

    function fit(slot) {
      var inner = slot.firstElementChild;
      if (!inner) return;
      inner.style.transform = '';
      inner.style.transformOrigin = '';
      slot.style.height = '';
      slot.style.minHeight = '';

      var avail = slot.clientWidth;
      var box = inner.getBoundingClientRect();
      /* scrollWidth catches content wider than the box it was put in (an
         iframe with its own width attribute, a 970px div); the rect catches a
         box already squeezed by max-width but holding wider content. */
      var natural = Math.max(box.width, inner.scrollWidth);
      if (!avail || !natural || natural <= avail + 1) return;

      var scale = avail / natural;
      /* Left edge, not centre: the tag is wider than the slot, so its own
         centre is to the right of the slot's centre and centring the transform
         would push the scaled copy off to the right — it fitted in width and
         still hung 325px over the edge of the page. */
      inner.style.transformOrigin = 'top left';
      inner.style.transform = 'scale(' + scale.toFixed(4) + ')';
      slot.style.minHeight = '0px';
      slot.style.height = Math.round(box.height * scale) + 'px';
    }

    function fitAll() { slots.forEach(fit); }
    fitAll();
    window.addEventListener('resize', fitAll);
    window.addEventListener('load', fitAll);
    /* Ad networks fill slots after load; measure again once they have. */
    setTimeout(fitAll, 1200);
    setTimeout(fitAll, 3000);
  })();

  /* ---------------------------------------------------- anchor ad close */
  /*
   * One tap and it is gone for this page view. The bar is the most intrusive
   * thing on the site, so the close button is not decoration: it removes the
   * padding the layout reserved for it as well, otherwise the page keeps a
   * band of white where the ad used to be.
   */
  (function () {
    var bar = document.querySelector('[data-ad-anchor]');
    if (!bar) return;
    var close = bar.querySelector('[data-ad-anchor-close]');
    if (!close) return;
    close.addEventListener('click', function () {
      bar.classList.add('is-closed');
      bar.setAttribute('hidden', '');
      document.body.classList.remove('has-ad-anchor');
    });
  })();

  /* ------------------------------------------------- hero word loop */
  /*
   * "Your life, in percentages" → mortgages → dosages → …
   *
   * The words are all in the markup, so the page says something useful with
   * JavaScript disabled and with the animation suppressed. This only moves the
   * `is-on` class: no timers are started, and nothing is written, when the
   * visitor asked for reduced motion.
   */
  (function () {
    var rot = document.querySelector('[data-hero-rotate]');
    if (!rot) return;
    if (window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    var words = [].slice.call(rot.querySelectorAll('.hero-rotate-word'));
    if (words.length < 2) return;
    var i = 0;
    setInterval(function () {
      if (document.hidden) return;
      words[i].classList.remove('is-on');
      i = (i + 1) % words.length;
      words[i].classList.add('is-on');
    }, 2600);
  })();

  /* --------------------------------------------------------- print */
  [].slice.call(document.querySelectorAll('[data-print]')).forEach(function (btn) {
    btn.addEventListener('click', function () { window.print(); });
  });
})();
