#!/usr/bin/env python3
"""Second pass over the pages that used to have no formula.

The first pass filled every box with "30", which is meaningless on a page whose
condition is `height > 1.4 and height <= 2.2` metres. This one tries a handful
of plausible value sets per page and remembers the first that produces an
answer, so "pending" here really means "still answers nothing".
"""
import json, multiprocessing as mp
from playwright.sync_api import sync_playwright

BASE = 'http://127.0.0.1:8080'
paths = [l.strip() for l in open('docs/no-formula-pages.txt') if l.strip()]
CANDIDATES = ['30', '1.75', '100', '7', '0.5', '2', '2020-01-01', '45']

FILL = """
(v) => {
  const w = document.querySelector('.calc-widget');
  if (!w) return false;
  [...w.querySelectorAll('.calc-input')].forEach(i => {
    if (i.closest('[hidden]') || i.readOnly) return;
    if (i.type === 'date') { i.value = '2020-01-01'; }
    else i.value = v;
    i.dispatchEvent(new Event('input',{bubbles:true}));
    i.dispatchEvent(new Event('change',{bubbles:true}));
  });
  const names = new Set([...w.querySelectorAll('input[type=radio]')].map(r=>r.name));
  names.forEach(nm => {
    const g=[...w.querySelectorAll(`input[type=radio][name="${nm}"]`)];
    if (g.length && !g.some(r=>r.checked)) g[0].checked = true;
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
    texts: [...w.querySelectorAll('.calc-note,.calc-formula')].filter(e=>vis(e)&&e.innerText.trim()).map(e=>e.innerText.trim()).slice(0,3),
    results: [...w.querySelectorAll('[data-result-row] input')].filter(i=>vis(i)&&i.value).map(i=>i.value).slice(0,4),
    errors: [...w.querySelectorAll('.calc-error')].map(e=>e.textContent.trim()).slice(0,3)
  };
}
"""

def check(pg, path):
    rec = {'path': path}
    try:
        pg.goto(BASE+path, wait_until='load', timeout=30000)
        if not pg.evaluate(FILL, '30'):
            rec['ok'] = False; rec['state'] = 'nowidget'; return rec
        best = None
        for v in CANDIDATES:
            pg.evaluate(FILL, v)
            pg.eval_on_selector('.calc-go', 'e=>e.click()')
            pg.wait_for_timeout(180)
            r = pg.evaluate(READ)
            if r['state'] == 'shown':
                r['value'] = v
                best = r
                break
            best = best or r
        rec.update(best or {'state': 'none'})
        rec['ok'] = rec.get('state') == 'shown'
    except Exception as e:
        rec['ok'] = False; rec['error'] = str(e)[:140]
    return rec

def work(chunk):
    with sync_playwright() as p:
        b = p.chromium.launch(); pg = b.new_page(); out = []
        for x in chunk:
            rec = check(pg, x); out.append(rec)
            with open('docs/sentence-sweep2.jsonl', 'a') as f:
                f.write(json.dumps(rec, ensure_ascii=False)+'\n')
        b.close(); return out

def main():
    open('docs/sentence-sweep2.jsonl','w').close()
    chunks = [paths[i::3] for i in range(3)]
    with mp.Pool(3) as pool:
        out = [r for res in pool.map(work, chunks) for r in res]
    ok = [r for r in out if r['ok']]
    print(f"{len(ok)}/{len(out)} answered after the press")
    for r in sorted(out, key=lambda r: r['path']):
        if not r['ok']:
            print(' -', r['path'], r.get('state'), (r.get('errors') or '')[:1])

if __name__ == '__main__':
    main()
