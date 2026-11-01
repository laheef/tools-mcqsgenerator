#!/usr/bin/env python3
"""Press Calculate on every page that has a supplement, and report what came back.

A generic filler: numbers get a plausible value, dates a fixed one, selects and
radio groups their first option. That is enough to prove a page answers; the
numbers themselves are checked by tools/supp_check.py, which knows what to
expect.
"""
import glob, json, os, sys, multiprocessing as mp
from playwright.sync_api import sync_playwright

BASE = 'http://127.0.0.1:8080'

FILL = """
() => {
  const w = document.querySelector('.calc-widget');
  if (!w) return false;
  const fire = (el, ev) => el.dispatchEvent(new Event(ev, {bubbles: true}));
  [...w.querySelectorAll('.calc-input, .calc-textarea')].forEach(i => {
    const f = i.closest('.calc-field');
    if (!f || f.hidden || i.readOnly || i.value) return;
    if (i.closest('[data-calc-results]')) return;   // a result, not an input
    if (i.type === 'date') { i.value = '2000-06-15'; }
    else if (i.type === 'time') { i.value = '09:00'; }
    else if (i.tagName === 'TEXTAREA' || i.getAttribute('data-datetype') === 'text') { i.value = 'Hello World'; }
    else { i.value = '30'; }
    fire(i, 'input'); fire(i, 'change');
  });
  [...w.querySelectorAll('select[data-var]')].forEach(s => {
    if (s.value && s.selectedIndex > 0) return;
    if (s.options.length) { s.selectedIndex = 1 < s.options.length ? 1 : 0; fire(s, 'change'); }
  });
  const names = new Set([...w.querySelectorAll('input[type=radio]')].map(r => r.name));
  names.forEach(nm => {
    if (nm === 'rating') return;
    const g = [...w.querySelectorAll(`input[type=radio][name="${nm}"]`)];
    if (g.length && !g.some(r => r.checked)) { g[0].checked = true; fire(g[0], 'change'); }
  });
  return true;
}
"""

READ = """
() => {
  const w = document.querySelector('.calc-widget');
  const vis = el => el.getBoundingClientRect().height > 0;
  return {
    state: w ? w.getAttribute('data-results') : 'nowidget',
    rows: [...w.querySelectorAll('[data-result-row] input')]
      .filter(i => i.value !== '' && i.value !== null)
      .map(i => i.getAttribute('data-var') + '=' + i.value).slice(0, 8),
    computed: [...w.querySelectorAll('.calc-input-wrap.is-computed input')]
      .filter(i => i.value !== '').map(i => i.getAttribute('data-var') + '=' + i.value).slice(0, 6),
    table: [...w.querySelectorAll('.calc-script-output table')].filter(vis).length,
    notes: [...w.querySelectorAll('.calc-note')].filter(e => vis(e) && e.innerText.trim())
      .map(e => e.innerText.trim().slice(0, 80)).slice(0, 2),
    unmet: [...w.querySelectorAll('.calc-unmet')].filter(vis).map(n => n.innerText.trim()).slice(0, 2)
  };
}
"""

def check(pg, path):
    rec = {'path': path}
    try:
        pg.goto(BASE + path, wait_until='load', timeout=30000)
        pg.evaluate(FILL)
        pg.wait_for_timeout(120)
        pg.eval_on_selector('.calc-go', 'e => e.click()')
        pg.wait_for_timeout(250)
        rec.update(pg.evaluate(READ))
        rec['ok'] = rec['state'] == 'shown' and bool(rec['rows'] or rec['computed'] or rec['table'])
    except Exception as exc:
        rec['ok'] = False
        rec['error'] = str(exc)[:140]
    return rec

def work(chunk):
    with sync_playwright() as p:
        b = p.chromium.launch(); pg = b.new_page(); out = []
        for path in chunk:
            out.append(check(pg, path))
        b.close()
    return out

def supplement_paths():
    '''The page each supplement file belongs to, read from the harvested data.'''
    import re
    keys = {os.path.basename(f)[:-4] for f in glob.glob('php-clone/data/calc/supplement/*.php')}
    paths = []
    for f in glob.glob('php-clone/data/calc/batch-*.ndjson'):
        for line in open(f, encoding='utf-8'):
            try:
                rec = json.loads(line)
            except json.JSONDecodeError:
                continue
            path = rec.get('path') or ''
            parts = [p for p in path.strip('/').split('/') if p]
            if len(parts) >= 2 and parts[-2] + '-' + parts[-1] in keys:
                paths.append(path)
    return sorted(set(paths))


def main():
    only = sys.argv[1:]
    paths = only or supplement_paths()
    groups = [paths[i::3] for i in range(min(3, len(paths)))]
    with mp.Pool(len(groups)) as pool:
        recs = [r for part in pool.map(work, groups) for r in part]
    recs.sort(key=lambda r: r['path'])
    with open('docs/wired-check.json', 'w') as fh:
        json.dump(recs, fh, indent=1)
    bad = 0
    for r in recs:
        if r['ok']:
            print('ok   ', r['path'], '|', ', '.join(r['rows'] or r['computed'])[:100])
        else:
            bad += 1
            print('FAIL ', r['path'], r.get('state'), (r.get('unmet') or r.get('notes') or [r.get('error', '')])[:1])
    print(f'\n{len(recs) - bad}/{len(recs)} answer')

if __name__ == '__main__':
    main()
