/* ==========================================================================
   All-calculators page: filter without a round trip.

   The page already works without this file — every filter is a link or a GET
   form and the server renders the list. This only saves the reload: typing in the
   search box, changing the sort, or clicking a category/letter chip fetches the
   same markup from the same place (`?partial=1`) and swaps it in, so the URL, the
   result count and the list always agree with what the server would have said.

   Deliberately not done: filtering the rows already on screen. That would make
   "12 results" mean "12 results on this page", which is a smaller answer than the
   one the page promises.
   ========================================================================== */
(function () {
  'use strict';

  var root = document.querySelector('.browse-shell');
  if (!root) return;

  var form = root.querySelector('[data-browse-form]');
  var input = root.querySelector('[data-browse-input]');
  var sort = root.querySelector('[data-browse-sort]');
  var cats = root.querySelector('.browse-cats');
  var alpha = root.querySelector('.browse-alpha');
  var results = document.getElementById('browse-results');
  var status = document.querySelector('[data-browse-status]');
  if (!form || !input || !results) return;

  /* The catalogue moved from /calculators to /all-calculators, and this line
     did not follow it. Every chip's own href failed to parse against the old
     base, so every chip read as "the current category" and the whole filter
     row rendered as selected. The links the script writes were also pointing
     at the old address, which only worked because that URL redirects. */
  var BASE = (window.BASE_PATH || '') + '/all-calculators';
  var timer = null;
  var controller = null;
  var inFlight = 0;

  /* ---------------------------------------------------------------- helpers */

  function merge(a, b) {
    var out = {}, key;
    for (key in a) if (Object.prototype.hasOwnProperty.call(a, key)) out[key] = a[key];
    for (key in b) if (Object.prototype.hasOwnProperty.call(b, key)) out[key] = b[key];
    return out;
  }

  function clean(params) {
    var qs = [];
    ['q', 'cat', 'letter', 'sort', 'page'].forEach(function (key) {
      var value = params[key];
      if (!value) return;
      if (key === 'page' && String(value) === '1') return;
      /* the server drops a default sort from the URL; match it here or a click
         through the list grows a redundant ?sort=az */
      if (key === 'sort' && (value === 'az' || value === 'relevant')) return;
      qs.push(encodeURIComponent(key) + '=' + encodeURIComponent(value));
    });
    return BASE + (qs.length ? '?' + qs.join('&') : '');
  }

  function paramsFromSearch() {
    var p = new URLSearchParams(location.search);
    return {
      q: p.get('q') || '',
      cat: p.get('cat') || '',
      letter: p.get('letter') || '',
      sort: p.get('sort') || (sort ? sort.value : ''),
      page: p.get('page') || '1'
    };
  }

  function paramsFromUrl(href) {
    var url;
    try { url = new URL(href, location.origin); } catch (e) { return null; }
    if (url.pathname.replace(/\/$/, '') !== BASE) return null;
    return {
      q: url.searchParams.get('q') || '',
      cat: url.searchParams.get('cat') || '',
      letter: url.searchParams.get('letter') || '',
      sort: url.searchParams.get('sort') || (sort ? sort.value : ''),
      page: url.searchParams.get('page') || '1'
    };
  }

  function setBusy(busy) {
    results.setAttribute('aria-busy', busy ? 'true' : 'false');
  }

  /* ------------------------------------------------------------------ state */

  /* Category and letter chips sit outside #browse-results, so after a swap their
     active state and their URLs have to be rewritten by hand. */
  function syncControls(params) {
    if (cats) {
      Array.prototype.forEach.call(cats.querySelectorAll('a[href]'), function (chip) {
        var own = paramsFromUrl(chip.getAttribute('href')) || {};
        var isActive = (own.cat || '') === (params.cat || '');
        chip.classList.toggle('is-active', isActive);
        if (isActive) chip.setAttribute('aria-current', 'page');
        else chip.removeAttribute('aria-current');
        chip.setAttribute('href', clean(merge(params, { cat: own.cat || '', page: '1' })));
      });
    }
    if (alpha) {
      Array.prototype.forEach.call(alpha.querySelectorAll('a[href]'), function (link) {
        var own = paramsFromUrl(link.getAttribute('href')) || {};
        if (link.textContent.trim() === 'All') own.letter = '';
        var isActive = (own.letter || '') === (params.letter || '');
        link.classList.toggle('is-active', isActive);
        if (isActive) link.setAttribute('aria-current', 'page');
        else link.removeAttribute('aria-current');
        link.setAttribute('href', clean(merge(params, { letter: own.letter || '', page: '1' })));
      });
    }
  }

  /* ------------------------------------------------------------------- load */

  function load(params, push) {
    var url = clean(params);
    var id = ++inFlight;

    if (controller) controller.abort();
    controller = (typeof AbortController !== 'undefined') ? new AbortController() : null;

    setBusy(true);

    fetch(url + (url.indexOf('?') === -1 ? '?' : '&') + 'partial=1', {
      signal: controller ? controller.signal : undefined,
      headers: { 'X-Requested-With': 'fetch' },
      credentials: 'same-origin'
    })
      .then(function (response) {
        if (!response.ok) throw new Error('HTTP ' + response.status);
        return response.text();
      })
      .then(function (html) {
        if (id !== inFlight) return;            // a newer keystroke already won

        var wrapper = document.createElement('div');
        wrapper.innerHTML = html;

        var freshStatus = wrapper.querySelector('[data-browse-status]');
        if (status && freshStatus) {
          status.innerHTML = freshStatus.innerHTML;
          freshStatus.remove();
        }

        results.innerHTML = wrapper.innerHTML;
        setBusy(false);

        if (push) history.replaceState({ page: 'browse' }, '', url);
        syncControls(params);
        announce();
      })
      .catch(function (error) {
        if (error && error.name === 'AbortError') return;
        setBusy(false);
        // the plain GET always works; let the browser do it
        window.location.href = url;
      });
  }

  /* Read the count back out of the swapped status line, so a screen reader hears
     "24 calculators" after a filter instead of silence. */
  function announce() {
    if (!status) return;
    var total = status.querySelector('[data-browse-total]');
    var line = status.textContent.replace(/\s+/g, ' ').trim();
    var live = document.getElementById('browse-live');
    if (!live) {
      live = document.createElement('p');
      live.id = 'browse-live';
      live.className = 'sr-only';
      live.setAttribute('role', 'status');
      status.parentNode.appendChild(live);
    }
    live.textContent = total ? line : line;
  }

  /* ------------------------------------------------------------- listeners */

  input.addEventListener('input', function () {
    clearTimeout(timer);
    timer = setTimeout(function () {
      load(merge(paramsFromSearch(), { q: input.value.trim(), page: '1' }), true);
    }, 220);
  });

  form.addEventListener('submit', function (event) {
    event.preventDefault();
    clearTimeout(timer);
    load(merge(paramsFromSearch(), { q: input.value.trim(), page: '1' }), true);
  });

  if (sort) {
    sort.addEventListener('change', function () {
      load(merge(paramsFromSearch(), { sort: sort.value, page: '1' }), true);
    });
  }

  function interceptClicks(container) {
    if (!container) return;
    container.addEventListener('click', function (event) {
      if (event.metaKey || event.ctrlKey || event.shiftKey || event.altKey || event.button !== 0) return;
      var link = event.target.closest('a[href]');
      if (!link) return;
      var next = paramsFromUrl(link.getAttribute('href'));
      if (!next) return;                        // not a filter link: let it navigate
      event.preventDefault();
      if (input) input.value = next.q;
      if (sort && next.sort) sort.value = next.sort;
      load(next, true);
    });
  }

  interceptClicks(cats);
  interceptClicks(alpha);
  interceptClicks(root.querySelector('.browse-active'));
  interceptClicks(document.getElementById('browse-results'));

  /* pagination scrolls back to the top of the list, like a page load would */
  var list = document.getElementById('browse-results');
  if (list) {
    list.addEventListener('click', function (event) {
      if (!event.target.closest('.browse-pagination a[href]')) return;
      var top = root.getBoundingClientRect().top + window.scrollY - 16;
      window.scrollTo({ top: top, behavior: 'smooth' });
    });
  }

  syncControls(paramsFromSearch());
}());
