#!/usr/bin/env python3
"""No page may render the same variable twice (round-32 item 2).

Checks every supplemented page for a repeated `data-var` among the controls that
are visible, and reports the pairs.
"""
import glob, json, multiprocessing as mp, os
from playwright.sync_api import sync_playwright

BASE = 'http://127.0.0.1:8080'

JS = """
() => {
  const seen = {}, dups = [];
  document.querySelectorAll('.calc-field').forEach(f => {
    if (f.hidden) return;
    const name = f.getAttribute('data-var');
    seen[name] = (seen[name] || 0) + 1;
  });
  Object.keys(seen).forEach(n => { if (seen[n] > 1) dups.push(n + ' ×' + seen[n]); });
  return dups;
}
"""

def paths():
    return sorted({json.loads(line).get('path') for f in glob.glob('php-clone/data/calc/batch-*.ndjson')
                   for line in open(f, encoding='utf-8')
                   if os.path.basename(f) and line.strip()})

def supplement_records():
    keys = {os.path.basename(f)[:-4] for f in glob.glob('php-clone/data/calc/supplement/*.php')}
    out = []
    for f in glob.glob('php-clone/data/calc/batch-*.ndjson'):
        for line in open(f, encoding='utf-8'):
            try:
                rec = json.loads(line)
            except json.JSONDecodeError:
                continue
            parts = [p for p in (rec.get('path') or '').strip('/').split('/') if p]
            if len(parts) >= 2 and parts[-2] + '-' + parts[-1] in keys:
                out.append(rec['path'])
    return sorted(set(out))

def work(chunk):
    with sync_playwright() as p:
        b = p.chromium.launch(); pg = b.new_page(); out = []
        for path in chunk:
            try:
                pg.goto(BASE + path, wait_until='load', timeout=30000)
                out.append((path, pg.evaluate(JS)))
            except Exception as exc:
                out.append((path, ['error: ' + str(exc)[:60]]))
        b.close()
    return out

def main():
    pages = supplement_records()
    groups = [pages[i::3] for i in range(min(3, len(pages)))]
    with mp.Pool(len(groups)) as pool:
        res = [r for part in pool.map(work, groups) for r in part]
    bad = [(p, d) for p, d in res if d]
    for p, d in sorted(bad):
        print('DUP ', p, d)
    print(f'{len(res) - len(bad)}/{len(res)} supplemented pages render each field once')

if __name__ == '__main__':
    main()
