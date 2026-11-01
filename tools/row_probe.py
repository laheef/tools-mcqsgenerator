#!/usr/bin/env python3
"""row_probe.py — fill a page with sample values, press Calculate, list the rows.

    python3 tools/row_probe.py /a /b /c              # one line per page
    python3 tools/row_probe.py --json /a /b          # machine-readable

Text boxes get "Hello World", numbers get 10 (the first numeric box gets 100),
date boxes get today, drop-downs take their first non-empty option, radios
their first option. The point is not a meaningful answer: it is to see which
declared rows actually receive something when the page's own script runs.
"""
from __future__ import annotations

import json
import sys
import datetime

from playwright.sync_api import sync_playwright

BASE = 'http://127.0.0.1:8080'

FILL = """
() => {
  const w = document.querySelector('.calc-widget');
  const fire = (el, t) => {
    el.dispatchEvent(new Event(t, {bubbles: true}));
  };
  const today = new Date().toISOString().slice(0, 10);
  let nums = 0;
  w.querySelectorAll('input[data-var], textarea[data-var]').forEach(el => {
    if (el.readOnly || el.closest('[data-calc-results]')) return;
    if (el.getAttribute('data-output') === '1') return;
    if (el.closest('.calc-field[data-output="1"]')) return;
    if (String(el.value).trim() !== '') return;
    const dt = el.getAttribute('data-datetype');
    if (dt && dt !== 'text') { el.value = today; fire(el, 'input'); fire(el, 'change'); return; }
    if (dt === 'text' || el.tagName === 'TEXTAREA') {
      el.value = 'Hello World';
    } else {
      nums += 1;
      el.value = nums === 1 ? '100' : '10';
    }
    fire(el, 'input'); fire(el, 'change');
  });
  w.querySelectorAll('select[data-var]').forEach(sel => {
    if (String(sel.value) !== '') return;
    const opt = [...sel.options].find(o => String(o.value) !== '');
    if (opt) { sel.value = opt.value; fire(sel, 'change'); }
  });
  const groups = {};
  w.querySelectorAll('input[type=radio]').forEach(r => { (groups[r.name] = groups[r.name] || []).push(r); });
  Object.keys(groups).forEach(name => {
    const g = groups[name];
    if (g.some(r => r.checked)) return;
    (g[0].closest('label') || g[0].parentNode).click();
    g[0].checked = true;
    fire(g[0], 'change');
  });
  w.querySelectorAll('input[type=checkbox]').forEach(c => {
    if (c.checked) return;
    c.checked = true;
    fire(c, 'change');
  });
  return true;
}
"""

READ = """
() => {
  const w = document.querySelector('.calc-widget');
  const vis = el => el.getBoundingClientRect().height > 2;
  const txt = el => (el.innerText || el.textContent || '').replace(/\\s+/g, ' ').trim();
  const rows = {};
  w.querySelectorAll('[data-result-row]').forEach(r => {
    if (r.hidden || !vis(r)) return;
    const i = r.querySelector('input[data-var]');
    const v = i ? String(i.value) : '';
    if (v.trim() !== '') rows[i.getAttribute('data-var')] = v.slice(0, 60);
  });
  const out = txt(w.querySelector('[data-script-output]') || document.createElement('div'));
  return {
    state: w.getAttribute('data-results'),
    status: (document.querySelector('[data-calc-status]') || {}).innerText || '',
    rows: rows,
    outLen: out.length,
    out: out.slice(0, 300),
    unmet: [...w.querySelectorAll('.calc-unmet')].filter(vis).map(txt).slice(0, 3)
  };
}
"""


def probe(page, path: str) -> dict:
    page.goto(BASE + path, wait_until='domcontentloaded', timeout=30000)
    page.wait_for_timeout(200)
    page.evaluate(FILL)
    page.wait_for_timeout(150)
    btn = page.query_selector('[data-calc-go]')
    if btn:
        btn.evaluate('b => b.click()')
    page.wait_for_timeout(500)
    return page.evaluate(READ)


def main() -> int:
    args = sys.argv[1:]
    as_json = '--json' in args
    paths = [a for a in args if not a.startswith('--')]
    out = {}
    with sync_playwright() as p:
        browser = p.chromium.launch()
        page = browser.new_page()

        def route(r):
            return r.abort() if r.request.resource_type in ('font', 'image', 'media') else r.continue_()

        page.route('**/*', route)
        for path in paths:
            try:
                rec = probe(page, path)
            except Exception as exc:                      # noqa: BLE001
                rec = {'error': str(exc)[:160]}
            out[path] = rec
            if as_json:
                continue
            if 'error' in rec:
                print(f'{path}: ERROR {rec["error"]}')
                continue
            filled = ', '.join(f'{k}={v}' for k, v in rec['rows'].items())
            print(f'{path}: {rec["state"]} | rows {len(rec["rows"])} | {filled[:220]}'
                  + (f' | out {rec["outLen"]}ch' if rec['outLen'] else '')
                  + (f' | unmet {rec["unmet"]}' if rec['unmet'] else ''))
        browser.close()
    if as_json:
        json.dump(out, sys.stdout, indent=1)
    return 0


if __name__ == '__main__':
    raise SystemExit(main())
