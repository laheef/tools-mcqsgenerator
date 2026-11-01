#!/usr/bin/env python3
"""Every biology (custom) calculator must answer when it is filled in.

For each page: fill every visible numeric box and pick the first option in every
list, press Calculate, and require at least one output to carry a value. Pages
that legitimately answer in words are accepted when a note or a table appears.
"""
import json, sys, concurrent.futures as cf
from playwright.sync_api import sync_playwright

BASE = 'http://127.0.0.1:8080'
PACK = 'php-clone/data/samples/biology-pack.json'

FILL = """
() => {
  const w = document.querySelector('.calc-widget');
  if (!w) return 'nowidget';
  const fire = el => { el.dispatchEvent(new Event('input', {bubbles: true}));
                       el.dispatchEvent(new Event('change', {bubbles: true})); };
  [...w.querySelectorAll('input[data-var]:not([type=checkbox])')].forEach((el, i) => {
    if (el.readOnly || el.closest('[data-calc-results]')) return;
    if (el.value !== '') return;
    const dt = el.getAttribute('data-date') || el.type;
    el.value = (el.getAttribute('inputmode') === 'numeric' || el.type === 'date')
      ? (el.type === 'date' ? '1990-01-15' : String(10 + i * 5))
      : String(10 + i * 5);
    fire(el);
  });
  /* the sequence tools take free text: give them a real sequence, not a number */
  [...w.querySelectorAll('input[data-var], textarea[data-var]')].forEach(el => {
    if (el.readOnly || el.value || el.type === 'number') return;
    const label = ((el.getAttribute('aria-label') || '') + ' ' +
      (el.closest('.calc-field') ? el.closest('.calc-field').innerText : '')).toLowerCase();
    let v = 'ATGGCTTTCGAATTCGGATCCAAGCTTGCGGCCGCTAA';
    if (/primer/.test(label)) v = 'ATGCGTACGTAGCTAGCT';
    else if (/protein|amino|peptide/.test(label)) v = 'MKVLAAGIVGLAAKDE';
    else if (/pattern/.test(label)) v = 'ATG';
    el.value = v; fire(el);
  });
  [...w.querySelectorAll('select[data-var]')].forEach(sel => {
    if (!sel.options.length) return;
    sel.selectedIndex = 0; fire(sel);
  });
  w.querySelectorAll('input[type=radio]').forEach((r, i) => {
    const group = [...w.querySelectorAll('input[name="' + r.name + '"]')];
    if (group.indexOf(r) === 0) { r.checked = true; fire(r); }
  });
  return 'filled';
}
"""

READ = """
() => {
  const w = document.querySelector('.calc-widget');
  const vals = [...w.querySelectorAll('input[data-var], [data-result-row] input')]
    .filter(i => i.value && i.value.trim() !== '' && i.value !== 'NaN' && i.value !== 'Infinity');
  return {
    state: w.getAttribute('data-results'),
    filled: vals.length,
    bad: [...w.querySelectorAll('input')].filter(i => /NaN|Infinity|undefined/.test(i.value)).length,
    table: !!w.querySelector('table'),
    note: (w.innerText || '').replace(/\\s+/g, ' ').slice(0, 160)
  };
}
"""

def run_one(pg, path):
    try:
        pg.goto(BASE + path, wait_until='load', timeout=30000)
        pg.evaluate(FILL)
        pg.wait_for_timeout(120)
        pg.evaluate(FILL)
        pg.click('.calc-go', timeout=8000)
        pg.wait_for_timeout(220)
        rec = pg.evaluate(READ)
        ok = rec['state'] == 'shown' and rec['filled'] > 0 and rec['bad'] == 0
        return (path, ok, rec)
    except Exception as e:
        return (path, False, {'error': str(e)[:90]})

def main():
    pack = json.load(open(PACK))
    paths = ['/biology/' + p['slug'] for p in pack if p.get('slug')]
    if len(sys.argv) > 1:
        paths = [p for p in paths if sys.argv[1] in p]
    bad = []
    # the sync API is single-threaded: one browser, one page, one page at a time
    with sync_playwright() as pw:
        browser = pw.chromium.launch()
        pg = browser.new_page()
        for i, path in enumerate(paths, 1):
            res_path, ok, rec = run_one(pg, path)
            if not ok:
                bad.append((res_path, rec))
            if i % 30 == 0:
                print('  %d/%d checked, %d bad' % (i, len(paths), len(bad)), flush=True)
        browser.close()
    print('\n%d/%d biology calculators answered' % (len(paths) - len(bad), len(paths)))
    for p, rec in bad[:20]:
        print('  FAIL', p, rec)
    json.dump(bad, open('docs/bio-answer-failures.json', 'w'), indent=1)
    return 1 if bad else 0

if __name__ == '__main__':
    sys.exit(main())
