#!/usr/bin/env python3
"""verify_page.py — fill named fields, press Calculate, print what the panel holds.

    python3 tools/verify_page.py /math/trig-degree '{"angle": "30"}'
    python3 tools/verify_page.py /path '{}'            # just press the button

Values are matched to controls in this order: a drop-down (by option label or
value), a text/number box, then a radio group (by label or value). Nothing is
filled that the caller did not name, so the "required" path stays testable.
"""
from __future__ import annotations

import json
import sys

from playwright.sync_api import sync_playwright

BASE = 'http://127.0.0.1:8080'

TYPE = """
(fills) => {
  const w = document.querySelector('.calc-widget');
  const set = (el, v) => {
    el.value = String(v);
    el.dispatchEvent(new Event('input', {bubbles: true}));
    el.dispatchEvent(new Event('change', {bubbles: true}));
  };
  Object.keys(fills).forEach(function (name) {
    const v = String(fills[name]);
    const sel = w.querySelector('select[data-var="' + name + '"]');
    if (sel) {
      const opt = [...sel.options].find(o => (o.text || '').trim() === v || o.value === v);
      if (opt) {
        sel.value = opt.value;
        sel.dispatchEvent(new Event('change', {bubbles: true}));
      }
      return;
    }
    const box = w.querySelector('input[data-var="' + name + '"], textarea[data-var="' + name + '"]');
    if (box) { set(box, v); return; }
    const radios = [...w.querySelectorAll('input[type=radio][name="' + name + '"]')];
    if (radios.length) {
      const hit = radios.find(r => r.value === v)
        || radios.find(r => ((r.closest('label') || r.parentNode).textContent || '').trim() === v);
      if (hit) {
        (hit.closest('label') || hit.parentNode).click();
        hit.checked = true;
        hit.dispatchEvent(new Event('change', {bubbles: true}));
      }
      return;
    }
    const cb = w.querySelector('input[data-var-check="' + name + '"]');
    if (cb) { cb.checked = !(v === '' || v === 'no' || v === '0'); cb.dispatchEvent(new Event('change', {bubbles: true})); }
  });
  return true;
}
"""

READ = """
() => {
  const w = document.querySelector('.calc-widget');
  const vis = el => el.getBoundingClientRect().height > 2;
  const txt = el => (el.innerText || el.textContent || '').replace(/\\s+/g, ' ').trim();
  const rows = [...w.querySelectorAll('[data-result-row]')]
    .filter(r => !r.hidden && vis(r))
    .map(r => {
      const i = r.querySelector('input[data-var]');
      return i ? (i.getAttribute('data-var') + ' = ' + i.value) : txt(r).replace(/ Copy$/, '');
    });
  return {
    state: w.getAttribute('data-results'),
    status: (document.querySelector('[data-calc-status]') || {}).innerText || '',
    rows,
    lines: [...w.querySelectorAll('[data-formula-index]')].filter(vis).map(txt).filter(Boolean),
    out: txt(w.querySelector('[data-script-output]') || document.createElement('div')).slice(0, 2400),
    unmet: [...w.querySelectorAll('.calc-unmet')].filter(vis).map(txt),
    errors: [...w.querySelectorAll('.calc-error,[data-field-error]')].map(txt).filter(Boolean).slice(0, 6)
  };
}
"""


def main() -> int:
    path = sys.argv[1]
    fills = json.loads(sys.argv[2]) if len(sys.argv) > 2 else {}
    with sync_playwright() as p:
        browser = p.chromium.launch()
        page = browser.new_page()
        noise: list[str] = []

        def route(r):
            if r.request.resource_type in ('font', 'image', 'media'):
                return r.abort()
            return r.continue_()

        page.on('pageerror', lambda e: noise.append('pageerror: ' + str(e)[:240]))
        page.on('console', lambda m: noise.append('console.error: ' + m.text[:200]) if m.type == 'error' else None)
        page.route('**/*', route)
        page.goto(BASE + path, wait_until='domcontentloaded', timeout=30000)
        page.wait_for_timeout(250)
        if fills:
            page.evaluate(TYPE, fills)
            page.wait_for_timeout(120)
        button = page.query_selector('[data-calc-go]')
        if button:
            # a long form puts the button far below the fold; a JS click avoids
            # Playwright's scroll-and-stability retry loop, which stalls on the
            # 50-date pages (business-days, working-days)
            button.evaluate('b => b.click()')
        page.wait_for_timeout(600)
        rec = page.evaluate(READ)
        print('PATH', path)
        print('state:', rec['state'], '| status:', rec['status'].strip())
        if rec['rows']:
            print('rows:', json.dumps(rec['rows'], ensure_ascii=False))
        if rec['lines']:
            print('lines:', json.dumps(rec['lines'], ensure_ascii=False)[:900])
        if rec['out']:
            print('script output:', rec['out'])
        if rec['unmet']:
            print('unmet:', rec['unmet'])
        if rec['errors']:
            print('errors:', rec['errors'])
        real = [n for n in noise if 'ERR_FAILED' not in n and 'cdn.tailwindcss' not in n]
        if real:
            print('CONSOLE:', real[:4])
        browser.close()
    return 0


if __name__ == '__main__':
    raise SystemExit(main())
