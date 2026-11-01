"""Does a page answer *any* plausible fill, or none at all?

The sweep's fill is a guess: it types the same ladder of numbers into whichever
boxes it reaches. On a cyclic calculator — every value derived from the others,
one equation per unknown — the guess is almost never a set that satisfies an
equation, so the page honestly says "fill in any one of the boxes" and the
sweep records a fault that does not exist.

This probe answers the question the sweep cannot: **is there a fill this page
does answer?** It walks the subsets (single boxes, pairs, triples, all but one)
under three value profiles — plain numbers, fraction-style text, and small
integers — and stops at the first one that produces results.

    python3 tools/probe_settle.py --paths /tmp/bad43.txt --out docs/settle.json

A page that answers on some subset is *working*: a visitor who knows one pair
of its values gets an answer. A page that answers on none needs a repair.
"""
import argparse
import itertools
import json
import sys
from concurrent.futures import ThreadPoolExecutor

BASE = 'http://127.0.0.1:8080'

FIELDS = """
() => [...document.querySelectorAll('.calc-widget .calc-field')]
  .filter(f => f.getBoundingClientRect().height > 2 && !f.closest('[data-calc-results]'))
  .map(f => {
    const i = f.querySelector('input, select, textarea');
    return {name: f.getAttribute('data-var'), out: f.getAttribute('data-output') === '1',
            type: i ? (i.type || i.tagName) : 'none'};
  })
  .filter(f => f.name && !f.out);
"""

FILL = """
([names, profile]) => {
  const w = document.querySelector('.calc-widget');
  const fire = (el, ev) => el.dispatchEvent(new Event(ev, {bubbles: true}));
  const V = {
    num: [100, 20, 50, 70, 10, 90, 30, 60, 15, 85, 40, 75, 25, 65],
    frac: ['1/2', '3/4', '2/3', '5/6', '1/3', '7/8', '3/2', '5/4'],
    small: [3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41]
  }[profile];
  let k = 0;
  names.forEach(name => {
    const f = document.querySelector('.calc-widget .calc-field[data-var="' + name + '"]');
    if (!f) return;
    const i = f.querySelector('input, select, textarea');
    if (!i || i.readOnly) return;
    if (i.tagName === 'SELECT') {
      const o = [...i.options].find(o => o.value !== '' && !o.disabled);
      if (o) { i.value = o.value; fire(i, 'change'); }
      return;
    }
    if (i.type === 'date') { i.value = '2026-01-05'; }
    else if (i.type === 'datetime-local') { i.value = '2026-01-05T09:00'; }
    else if (i.type === 'checkbox' || i.type === 'radio') {
      if (!i.checked) { i.checked = true; fire(i, 'change'); }
    } else {
      i.value = String(V[k++ % V.length]);
    }
    fire(i, 'input'); fire(i, 'change');
  });
  return true;
}
"""

READ = """
() => {
  const w = document.querySelector('.calc-widget');
  const vis = el => el.getBoundingClientRect().height > 2;
  const rows = [...w.querySelectorAll('[data-result-row]')].filter(r => !r.hidden && vis(r));
  const computed = [...w.querySelectorAll('.calc-input-wrap.is-computed input')]
    .filter(i => String(i.value || '').trim() !== '');
  const sentences = [...w.querySelectorAll('[data-formula-index]')].filter(vis)
    .map(t => (t.innerText || '').replace(/\\s+/g, ' ').trim()).filter(Boolean);
  const extra = w.querySelector('[data-extra-results]');
  const notes = w.querySelector('[data-script-output]');
  const state = w.getAttribute('data-results');
  const status = (w.querySelector('[data-calc-status]') || {}).innerText || '';
  const values = rows.map(r => {
    const i = r.querySelector('input[data-var]');
    return i ? {name: i.getAttribute('data-var'), value: i.value} : null;
  }).filter(Boolean);
  return {
    state, status: status.replace(/\\s+/g, ' ').trim().slice(0, 90),
    rows: rows.length, computed: computed.length, sentences: sentences.length,
    extra: extra ? extra.innerText.replace(/\\s+/g, ' ').trim().slice(0, 80) : '',
    notes: notes ? notes.innerText.replace(/\\s+/g, ' ').trim().slice(0, 80) : '',
    values: values.slice(0, 6)
  };
}
"""


def subsets(names):
    """Single boxes first, then pairs, triples, then everything-but-one."""
    n = len(names)
    out = []
    for size in (1, 2, 3):
        if size < n:
            out.extend(itertools.combinations(range(n), size))
    if n > 3:
        out.extend(itertools.combinations(range(n), n - 1))
    out.extend(itertools.combinations(range(n), n))
    # de-duplicate while keeping order, and cap the work per page
    seen, capped = set(), []
    for combo in out:
        key = tuple(sorted(combo))
        if key in seen:
            continue
        seen.add(key)
        capped.append([names[i] for i in combo])
        if len(capped) >= 26:
            break
    return capped


def probe(pg, path):
    pg.goto(BASE + path, wait_until='domcontentloaded', timeout=25000)
    try:
        pg.wait_for_selector('[data-calc-go]', state='visible', timeout=4000)
    except Exception:                                                   # noqa: BLE001
        pg.wait_for_timeout(300)
    fields = pg.evaluate(FIELDS)
    names = [f['name'] for f in fields]
    results = []
    for profile, combos in (('num', subsets(names)),
                            ('frac', subsets(names)[:6]),
                            ('small', subsets(names)[:6])):
        for combo in combos:
            try:
                pg.goto(BASE + path, wait_until='domcontentloaded', timeout=25000)
                pg.wait_for_timeout(150)
                pg.evaluate(FILL, [combo, profile])
                pg.wait_for_timeout(120)
                btn = pg.query_selector('[data-calc-go]')
                if btn:
                    btn.evaluate('b => b.click()')
                pg.wait_for_timeout(420)
                rec = pg.evaluate(READ)
            except Exception as exc:                                    # noqa: BLE001
                results.append({'profile': profile, 'fill': combo, 'error': str(exc)[:100]})
                continue
            rec['profile'] = profile
            rec['fill'] = combo
            results.append(rec)
            if rec['state'] == 'shown' and (rec['rows'] or rec['computed'] or rec['sentences'] or rec['extra']):
                return {'path': path, 'ok': True, 'evidence': rec, 'tries': len(results),
                        'fields': names}
    return {'path': path, 'ok': False, 'tries': len(results), 'fields': names,
            'last': results[-1] if results else None}


def work(paths):
    from playwright.sync_api import sync_playwright
    out = []
    with sync_playwright() as p:
        b = p.chromium.launch()
        pg = b.new_page()

        def route(r):
            return r.abort() if r.request.resource_type in ('font', 'image', 'media') else r.continue_()

        pg.route('**/*', route)
        for path in paths:
            out.append(probe(pg, path))
        b.close()
    return out


def main():
    ap = argparse.ArgumentParser()
    ap.add_argument('--paths', default='/tmp/bad43.txt')
    ap.add_argument('--out', default='docs/settle.json')
    ap.add_argument('--workers', type=int, default=2)
    args = ap.parse_args()
    paths = [l.strip() for l in open(args.paths) if l.strip()]
    parts = [paths[i::args.workers] for i in range(args.workers)]
    with ThreadPoolExecutor(args.workers) as pool:
        results = [r for part in pool.map(work, parts) for r in part]
    results.sort(key=lambda r: r['path'])
    with open(args.out, 'w') as fh:
        json.dump(results, fh, indent=1)
    yes = [r for r in results if r['ok']]
    print(f'{len(yes)} of {len(results)} pages answer some plausible fill')
    for r in results:
        mark = 'OK  ' if r['ok'] else 'NONE'
        fill = (r.get('evidence') or {}).get('fill')
        print(f'  {mark} {r["path"]}  after {r["tries"]} tries'
              + (f'  fill={fill}' if fill else ''))
    return 0


if __name__ == '__main__':
    sys.exit(main())
