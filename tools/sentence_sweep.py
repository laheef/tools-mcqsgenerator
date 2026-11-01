#!/usr/bin/env python3
"""Load every page that used to have no formula, fill it, press Calculate, and
say whether an answer appeared. Reports a per-page line plus buckets."""
import json, sys, multiprocessing as mp
from playwright.sync_api import sync_playwright

BASE = 'http://127.0.0.1:8080'
paths = [l.strip() for l in open('docs/no-formula-pages.txt') if l.strip()]

JS_FILL = """
() => {
  const w = document.querySelector('.calc-widget');
  if (!w) return {form:0};
  const inputs = [...w.querySelectorAll('.calc-input')].filter(i=>!i.closest('[hidden]'));
  let n = 0;
  inputs.forEach(i => {
    if (i.readOnly || i.value) return;
    const v = i.getAttribute('data-var')||'';
    if (/date/.test(i.type)) { i.value='2000-01-01'; }
    else i.value='30';
    i.dispatchEvent(new Event('input',{bubbles:true}));
    i.dispatchEvent(new Event('change',{bubbles:true}));
    n++;
  });
  // any unchecked radio group: pick the first option
  const names = new Set([...w.querySelectorAll('input[type=radio]')].map(r=>r.name));
  names.forEach(nm => {
    const g=[...w.querySelectorAll(`input[type=radio][name="${nm}"]`)];
    if (g.length && !g.some(r=>r.checked)) g[0].checked = true;
  });
  return {form:1, filled:n};
}
"""

def check(pg, path):
    rec = {'path': path}
    try:
        pg.goto(BASE+path, wait_until='load', timeout=25000)
        r = pg.evaluate(JS_FILL)
        rec['has_widget'] = bool(r.get('form'))
        rec['fields'] = pg.eval_on_selector_all('.calc-input','e=>e.length')
        pg.eval_on_selector('.calc-go','e=>e.click()')
        pg.wait_for_timeout(250)
        rec['state'] = pg.eval_on_selector('.calc-widget','e=>e.getAttribute("data-results")')
        rec['texts'] = [t.strip() for t in pg.eval_on_selector_all(
            '.calc-note,.calc-formula','e=>e.filter(x=>x.getBoundingClientRect().height>0&&x.innerText.trim()).map(x=>x.innerText)')][:4]
        rec['results'] = [t.strip()[:70] for t in pg.eval_on_selector_all(
            '[data-result-row] input','e=>e.filter(x=>x.value&&x.getBoundingClientRect().height>0).map(x=>x.value)')][:6]
        rec['errors'] = [t.strip()[:60] for t in pg.eval_on_selector_all('.calc-error','e=>e.map(x=>x.textContent)')][:4]
        rec['ok'] = rec['state']=='shown'
    except Exception as e:
        rec['ok']=False; rec['error']=str(e)[:120]
    return rec

def work(chunk):
    with sync_playwright() as p:
        b = p.chromium.launch()
        pg = b.new_page()
        res = []
        for x in chunk:
            rec = check(pg, x)
            res.append(rec)
            with open('docs/sentence-sweep.jsonl','a') as f:
                f.write(json.dumps(rec)+'\n')
        b.close(); return res

def main():
    open('docs/sentence-sweep.jsonl','w').close()
    chunks = [paths[i::3] for i in range(3)]
    with mp.Pool(3) as pool:
        out = [r for res in pool.map(work, chunks) for r in res]
    out.sort(key=lambda r: r['path'])
    ok=[r for r in out if r['ok']]; bad=[r for r in out if not r['ok']]
    print(f"{len(ok)}/{len(out)} press through to a shown state")
    for r in bad: print(' -', r['path'], r.get('state'), r.get('errors'), r.get('error',''))

if __name__=='__main__': main()
