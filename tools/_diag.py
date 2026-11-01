#!/usr/bin/env python3
"""ad-hoc page diagnosis: fill, press, dump every candidate answer node"""
import json, sys
sys.path.insert(0, 'tools')
from silent_sweep import FILL
from playwright.sync_api import sync_playwright

DUMP = """
() => {
  const w = document.querySelector('.calc-widget');
  const vis = el => el.getBoundingClientRect().height > 2;
  const txt = el => (el.innerText || el.textContent || '').replace(/\\s+/g, ' ').trim();
  const answers = w.querySelector('[data-calc-answers]');
  const res = w.querySelector('[data-calc-results]');
  return {
    state: w.getAttribute('data-results'),
    status: (document.querySelector('[data-calc-status]')||{}).innerText || '',
    answersHTML: answers ? answers.innerHTML.replace(/\\s+/g,' ').slice(0,1200) : null,
    resultsHTML: res ? res.innerHTML.replace(/\\s+/g,' ').slice(0,900) : null,
    formulas: [...w.querySelectorAll('[data-formula-index]')].map(el => ({i: el.getAttribute('data-formula-index'), cls: el.className, vis: vis(el), t: txt(el).slice(0,80)})),
    notes: [...w.querySelectorAll('.calc-note')].length,
    groups: [...w.querySelectorAll('.calc-group')].map(g => ({t: (g.querySelector('.calc-group-title')||{}).textContent, disp: getComputedStyle(g).display, vis: vis(g), h: Math.round(g.getBoundingClientRect().height)})),
    unmet: [...w.querySelectorAll('.calc-unmet')].map(txt),
    errors: [...w.querySelectorAll('.calc-error,[data-field-error]')].map(txt),
  };
}
"""

def run(paths):
    with sync_playwright() as p:
        b = p.chromium.launch()
        pg = b.new_page()
        logs = []
        pg.on('console', lambda m: logs.append(m.type + ': ' + m.text[:160]))
        pg.on('pageerror', lambda e: logs.append('pageerror: ' + str(e)[:200]))
        pg.route('**/*', lambda r: r.abort() if r.request.resource_type in ('font','image','media') else r.continue_())
        for path in paths:
            logs.clear()
            pg.goto('http://127.0.0.1:8080' + path, wait_until='domcontentloaded', timeout=25000)
            f = pg.evaluate(FILL)
            pg.wait_for_timeout(150)
            btn = pg.query_selector('[data-calc-go]')
            if btn: btn.click(); pg.wait_for_timeout(600)
            d = pg.evaluate(DUMP)
            print('='*90)
            print(path, '| fill:', f)
            print(json.dumps(d, indent=1)[:3000])
            if logs: print('LOGS:', logs[:6])
        b.close()

if __name__ == '__main__':
    run(sys.argv[1:])
