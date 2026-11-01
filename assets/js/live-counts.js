/*
 * Live counters.
 *
 * The header total, the category tiles and the "N calculators in this category"
 * line are rendered once, server-side, from the catalogue. That is correct at
 * the moment the page is generated and wrong the moment somebody publishes or
 * archives a calculator, which is exactly what happens while an editor has the
 * site open in another tab.
 *
 * So: ask /api/counts when the page is shown, when the tab regains focus and
 * when the browser comes back online. Nothing is cached (the endpoint says
 * no-store), the response carries a stamp so an unchanged catalogue costs no
 * DOM work, and a changed number flashes once so the reader can see that it is
 * live rather than static.
 */
(function () {
  'use strict';

  /* the layout sets window.BASE_PATH so the same file works at the domain
     root and in a subdirectory (/tool) */
  var ENDPOINT = (window.BASE_PATH || '') + '/api/counts';
  var INTERVAL = 20000;
  var stamp = null;
  var timer = null;
  var running = false;

  function nodes() {
    return document.querySelectorAll('[data-live-count]');
  }

  function format(n) {
    // Same grouping the server uses: a thin space between thousands.
    var s = String(n);
    if (s.length <= 3) return s;
    return s.replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
  }

  function apply(data) {
    if (!data || !data.categories) return;
    var changed = false;
    var list = nodes();
    for (var i = 0; i < list.length; i++) {
      var key = list[i].getAttribute('data-live-count');
      var value = key === 'total' ? data.total : data.categories[key];
      if (typeof value !== 'number') continue;
      var next = format(value);
      if (list[i].textContent !== next) {
        list[i].textContent = next;
        changed = true;
        if (list[i].classList) {
          list[i].classList.remove('count-flash');
          void list[i].offsetWidth;      /* restart the animation */
          list[i].classList.add('count-flash');
        }
      }
    }
    if (changed) {
      document.documentElement.setAttribute('data-catalogue-stamp', data.stamp || '');
    }
  }

  function refresh() {
    if (running || !nodes().length) return;
    if (document.visibilityState === 'hidden') return;
    running = true;
    var url = ENDPOINT + '?t=' + Date.now();
    fetch(url, { credentials: 'same-origin', cache: 'no-store', headers: { Accept: 'application/json' } })
      .then(function (r) { return r.ok ? r.json() : null; })
      .then(function (data) {
        if (!data) return;
        if (stamp !== data.stamp || stamp === null) {
          stamp = data.stamp;
          apply(data);
        }
      })
      .catch(function () { /* offline: keep the numbers we already have */ })
      .then(function () { running = false; });
  }

  function start() {
    if (timer) return;
    timer = window.setInterval(refresh, INTERVAL);
  }

  function stop() {
    if (!timer) return;
    window.clearInterval(timer);
    timer = null;
  }

  document.addEventListener('visibilitychange', function () {
    if (document.visibilityState === 'visible') { refresh(); start(); } else { stop(); }
  });
  window.addEventListener('online', refresh);
  window.addEventListener('focus', refresh);
  // A panel action in another tab may post a message so this one updates at once.
  window.addEventListener('message', function (e) {
    if (e && e.data && e.data.type === 'omni:catalogue-changed') { stamp = null; refresh(); }
  });

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function () { refresh(); start(); });
  } else {
    refresh(); start();
  }
})();
