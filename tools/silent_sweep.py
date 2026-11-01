#!/usr/bin/env python3
"""silent_sweep.py — does pressing Calculate actually put something on the page?

`wired_check.py` asks that of the 161 pages with a repair; this asks it of all
4 041, which is the gap the tenth pass left open: a page can end up in the
"shown" state with an empty panel — the class of fault that `/everyday-life/age`
was in before its repair — and nothing in the suite pressed Calculate on every
page to find the others.

Each page gets a generic fill (a number in every empty numeric box, a date in
every date box, the first real option of every drop-down and radio group), then
Calculate. What comes back decides the bucket:

    ok           the panel holds a value, a sentence or a table
    silent       "shown" with nothing visible anywhere — the fault
    refused      pending, with an unmet note or a field error explaining why
    overfilled   pending because the filler filled every box and left no unknown
    stuck        pending, with no explanation at all
    dead-button  no Calculate button and no "nothing to calculate" note
    stale-note   the page notes there is nothing to calculate (should be none)
    error        the browser threw, or the page did not load

Resumable: results are appended to docs/silent-sweep.jsonl and a path already
in the file is skipped, so a run can be stopped and picked up again.

    python3 tools/silent_sweep.py                 # continue where it stopped
    python3 tools/silent_sweep.py --chunk 200 --workers 3
    python3 tools/silent_sweep.py --report        # summarise the jsonl
    python3 tools/silent_sweep.py --only /math/  # one area
"""
from __future__ import annotations

import argparse
import json
import os
import sys
import threading
import urllib.request
from concurrent.futures import ThreadPoolExecutor

BASE = 'http://127.0.0.1:8080'
OUT = 'docs/silent-sweep.jsonl'
LOCK = threading.Lock()

FILL = """
() => {
  const w = document.querySelector('.calc-widget');
  if (!w) return 'nowidget';
  const fire = (el, ev) => el.dispatchEvent(new Event(ev, {bubbles: true}));
  const visible = el => el.getBoundingClientRect().height > 2;

  /* Choices first: a drop-down that names an ingredient redraws the form when
     it changes, and a number typed into the box it replaces is gone. */
  [...w.querySelectorAll('select[data-var]')].forEach(s => {
    if (s.getAttribute('data-unit-select') !== null) return;
    if (s.value) return;
    const opt = [...s.options].find(o => o.value !== '' && !o.disabled);
    if (opt) { s.value = opt.value; fire(s, 'change'); }
  });
  const names = new Set([...w.querySelectorAll('input[type=radio][name]')].map(r => r.name));
  names.forEach(nm => {
    if (nm === 'rating') return;
    const g = [...w.querySelectorAll('input[type=radio][name="' + nm + '"]')].filter(r => !r.disabled);
    if (g.length && !g.some(r => r.checked)) { g[0].checked = true; fire(g[0], 'change'); }
  });
  [...w.querySelectorAll('input[type=checkbox][data-var-check]')].forEach(c => {
    if (c.checked) return;
    c.checked = true; fire(c, 'change');
  });

  /*
   * Text, number, date and time boxes: only the empty ones, only the inputs.
   * The numbers are varied on purpose — a page that compares a sample with its
   * control (or asks for two concentrations) answers nothing when every box
   * holds 30, and that verdict belongs to the filler, not the page. It produced
   * a 207-page "overfilled" bucket in one sweep.
   */
  const VARIANTS = [100, 20, 50, 70, 10, 90, 30, 60, 15, 85, 40, 75, 25, 65, 35, 55];
  const DATES = ['2024-06-15', '2026-12-25', '2025-01-10', '2023-09-05'];
  let k = 0, dk = 0;
  [...w.querySelectorAll('.calc-input, .calc-textarea')].forEach(i => {
    const f = i.closest('.calc-field');
    if (!f || f.hidden || !visible(f) || i.readOnly || i.value) return;
    if (i.closest('[data-calc-results]')) return;
    if (i.getAttribute('data-output') === '1') return;
    if (i.type === 'date') { i.value = DATES[dk++ % DATES.length]; }
    else if (i.type === 'datetime-local') { i.value = DATES[dk++ % DATES.length] + 'T09:00'; }
    else if (i.type === 'month') { i.value = DATES[dk++ % DATES.length].slice(0, 7); }
    else if (i.type === 'week') { i.value = '2024-' + ('0' + (12 + dk++ * 3)).slice(-2); }
    else if (i.type === 'time') { i.value = '09:00'; }
    else if (i.tagName === 'TEXTAREA' || i.getAttribute('data-datetype') === 'text') { i.value = 'Hello World'; }
    else { i.value = String(VARIANTS[k++ % VARIANTS.length]); }
    fire(i, 'input'); fire(i, 'change');
  });
  return 'filled';
}
"""

READ = """
() => {
  const w = document.querySelector('.calc-widget');
  if (!w) return {state: 'nowidget'};
  const vis = el => el.getBoundingClientRect().height > 2;
  const txt = el => (el.innerText || el.textContent || '').replace(/\\s+/g, ' ').trim();

  const rows = [...w.querySelectorAll('[data-result-row] input')]
    .filter(i => vis(i) && String(i.value || '').trim() !== '')
    .map(i => i.getAttribute('data-var') + '=' + i.value);

  const computed = [...w.querySelectorAll('.calc-input-wrap.is-computed input')]
    .filter(i => vis(i) && String(i.value || '').trim() !== '')
    .map(i => i.getAttribute('data-var') + '=' + i.value);

  /* a sentence the client filled in after the press */
  const sentences = [...w.querySelectorAll('[data-formula-index]')]
    .filter(el => vis(el) && txt(el) !== '')
    .map(el => txt(el).slice(0, 120));

  /* anything a page script injected */
  const script = txt(w.querySelector('[data-script-output]') || document.createElement('div'));

  const unmet = [...w.querySelectorAll('.calc-unmet')].filter(vis).map(txt).slice(0, 2);
  const errors = [...w.querySelectorAll('.calc-error, [data-field-error]')]
    .map(txt).filter(Boolean).slice(0, 2);
  const status = (document.querySelector('[data-calc-status]') || {}).innerText || '';
  const goBtn = w.querySelector('[data-calc-go]');
  const hasResults = !!w.querySelector('[data-calc-results]');

  return {
    state: w.getAttribute('data-results'),
    rows: rows.slice(0, 8),
    computed: computed.slice(0, 8),
    sentences: sentences.slice(0, 4),
    scriptLen: script.length,
    script: script.slice(0, 120),
    unmet, errors,
    status: status.trim().slice(0, 160),
    hasButton: !!goBtn,
    hasResults,
    nothingNote: /nothing to calculate/i.test(w.innerText || '')
  };
}
"""


def catalogue() -> list[str]:
    with urllib.request.urlopen(BASE + '/search-index.json', timeout=120) as r:
        index = json.loads(r.read().decode())
    return sorted({e['u'] for e in index})


def done() -> set[str]:
    seen = set()
    if os.path.exists(OUT):
        with open(OUT) as fh:
            for line in fh:
                try:
                    seen.add(json.loads(line)['path'])
                except Exception:                                   # noqa: BLE001
                    continue
    return seen


def classify(rec: dict) -> str:
    if rec.get('error'):
        return 'error'
    if rec.get('state') == 'nowidget':
        return 'no-widget'
    if rec.get('nothingNote'):
        return 'stale-note'
    content = bool(rec.get('rows') or rec.get('computed') or rec.get('sentences')
                   or (rec.get('scriptLen') or 0) > 0)
    if rec.get('state') == 'shown':
        return 'ok' if content else 'silent'
    if rec.get('state') == 'pending':
        if rec.get('unmet') or rec.get('errors'):
            return 'refused'
        if 'nothing left to work out' in (rec.get('status') or ''):
            return 'overfilled'          # every box filled: an explained refusal
        return 'stuck'
    if not rec.get('hasButton'):
        return 'dead-button'
    return 'other'


def work(chunk: list[str]) -> list[dict]:
    from playwright.sync_api import sync_playwright
    out = []
    with sync_playwright() as p:
        b = p.chromium.launch()
        pg = b.new_page()
        # Fonts and pictures are most of the bytes and none of the answer; a
        # sweep of 4 000 pages cannot afford them. The stylesheet is kept,
        # because "is this element on screen" is a question about CSS.
        def route(r):
            if r.request.resource_type in ('font', 'image', 'media'):
                return r.abort()
            return r.continue_()
        pg.route('**/*', route)
        for path in chunk:
            rec = _visit(pg, path)
            rec.setdefault('path', path)
            out.append(rec)
            # Written the moment it is known, not at the end of the chunk. A
            # page whose own script loops forever wedges the browser, and the
            # parent kills this process; whatever was finished has to survive
            # that kill, or the next run starts the chunk again from zero.
            with LOCK, open(OUT, 'a') as fh:
                fh.write(json.dumps(rec, ensure_ascii=False) + '\n')
                fh.flush()
                os.fsync(fh.fileno())
        b.close()
    return out


def _visit(pg, path: str) -> dict:
    rec = {'path': path}
    try:
        pg.goto(BASE + path, wait_until='domcontentloaded', timeout=25000)
        # The form is laid out by the stylesheet, and everything the
        # filler measures is a box height: fill it before the first
        # paint and every field reads as zero pixels tall, so nothing is
        # typed and the page is recorded as "required" or "silent".
        try:
            pg.wait_for_selector('[data-calc-go]', state='visible', timeout=4000)
        except Exception:                                      # noqa: BLE001
            pg.wait_for_timeout(300)
        filled = pg.evaluate(FILL)
        rec['filled'] = filled
        pg.wait_for_timeout(80)
        btn = pg.query_selector('[data-calc-go]')
        if btn:
            # a JS click: Playwright's own click waits for the button to
            # be stable, and on a long form it never is
            btn.evaluate('b => b.click()')
            pg.wait_for_timeout(320)
        rec.update(pg.evaluate(READ))
    except Exception as exc:                                # noqa: BLE001
        rec['error'] = str(exc)[:160]
    rec['bucket'] = classify(rec)
    # A page can be slow to start rather than broken: the script only
    # runs once the vendored math library has loaded, and a hard `load`
    # plus a short wait can beat it. Anything that looks silent gets one
    # more chance, unhurried, before it is recorded as a fault.
    if rec['bucket'] == 'silent':
        try:
            pg.goto(BASE + path, wait_until='networkidle', timeout=45000)
            pg.wait_for_timeout(300)
            pg.evaluate(FILL)
            pg.wait_for_timeout(400)
            btn = pg.query_selector('[data-calc-go]')
            if btn:
                btn.click()
                pg.wait_for_timeout(900)
            again = {'path': path}
            again.update(pg.evaluate(READ))
            again['bucket'] = classify(again)
            again['retried'] = True
            rec = again
        except Exception:                                   # noqa: BLE001
            pass
    rec['bucket'] = classify(rec)
    return rec


def report() -> None:
    recs = []
    with open(OUT) as fh:
        for line in fh:
            try:
                recs.append(json.loads(line))
            except Exception:                                       # noqa: BLE001
                continue
    counts: dict[str, int] = {}
    for r in recs:
        counts[r['bucket']] = counts.get(r['bucket'], 0) + 1
    print(f'pages recorded : {len(recs)}')
    for k in sorted(counts, key=lambda x: -counts[x]):
        print(f'  {k:12s} {counts[k]}')
    for r in recs:
        if r['bucket'] in ('silent', 'stuck', 'dead-button', 'stale-note', 'error'):
            print(f'  {r["bucket"]:11s} {r["path"]}')


def main() -> None:
    ap = argparse.ArgumentParser()
    ap.add_argument('--chunk', type=int, default=150)
    ap.add_argument('--workers', type=int, default=3)
    ap.add_argument('--report', action='store_true')
    ap.add_argument('--only', default='')
    args = ap.parse_args()

    if args.report:
        report()
        return

    paths = catalogue()
    if args.only:
        paths = [p for p in paths if args.only in p]
    seen = done()
    todo = [p for p in paths if p not in seen]
    print(f'catalogue {len(paths)}, done {len(paths) - len(todo)}, to do {len(todo)}')
    if not todo:
        report()
        return

    chunk = todo[:args.chunk]
    parts = [chunk[i::args.workers] for i in range(min(args.workers, len(chunk)))]
    with ThreadPoolExecutor(len(parts)) as pool:
        results = [r for part in pool.map(work, parts) for r in part]
    results.sort(key=lambda r: r['path'])
    counts: dict[str, int] = {}
    for r in results:
        counts[r['bucket']] = counts.get(r['bucket'], 0) + 1
    print('chunk:', ', '.join(f'{k} {v}' for k, v in sorted(counts.items())))
    for r in results:
        if r['bucket'] in ('silent', 'stuck', 'dead-button', 'stale-note', 'error'):
            print(f'  {r["bucket"]:11s} {r["path"]}')


if __name__ == '__main__':
    main()
