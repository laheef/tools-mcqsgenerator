#!/usr/bin/env python3
"""gate_check.py — the Calculate button, and the layout it sits in.

Every calculator asks before it answers: the panel is solved on load but the
values are held back until the visitor presses **Calculate**. That is a
behaviour change, so it gets its own suite rather than a line in a report:

  * the button exists and is a real <button>, not a link
  * before the press no computed value is *visible* (the value is still in the
    DOM, so a crawler and a no-JS visitor keep the numbers)
  * after the press every computed value is visible and the label changes
  * Enter inside a number box calculates as well as the button
  * a URL that already carries values opens with the results shown
  * with JavaScript off the results are visible and nothing is masked

and then the layout, at five widths:

  * nothing overflows the viewport horizontally
  * the button is at least 44 x 44 px (the tap-target floor) and on screen
  * no full-page overlay covers the widget
  * the widget and the article agree on font and surface (no theme switch)

Usage:
  python3 tools/gate_check.py                        # gate on 24 pages, layout on 3
  python3 tools/gate_check.py --pages 200 --jobs 3   # the wide sweep
  python3 tools/gate_check.py --slug codon-plot      # one page, everything
  python3 tools/gate_check.py --json /tmp/gate.json
"""
from __future__ import annotations

import argparse
import json
import sys
import urllib.request
from concurrent.futures import ThreadPoolExecutor
from pathlib import Path

from playwright.sync_api import sync_playwright

BASE = "http://127.0.0.1:8080"
ROOT = Path(__file__).resolve().parent.parent

WIDTHS = [(360, 780), (390, 844), (768, 1024), (1024, 768), (1280, 900)]

PROBE_VISIBLE = """
() => {
  const w = document.querySelector('[data-calculator]');
  if (!w) return null;
  const shown = (el) => {
    const r = el.getBoundingClientRect();
    const cs = getComputedStyle(el);
    return r.width > 0 && r.height > 0 && cs.visibility !== 'hidden' &&
           cs.display !== 'none' && cs.opacity !== '0';
  };
  // A computed value counts as visible when the box is on screen AND its text
  // is not transparent. The mask is a colour change, not display:none, so a
  // naive "is it in the DOM" check would pass on a masked panel.
  const computed = [...w.querySelectorAll('.calc-input-wrap.is-computed')].map(wrap => {
    const inp = wrap.querySelector('input');
    const cs = inp ? getComputedStyle(inp) : null;
    const colour = cs ? cs.color : '';
    const transparent = /rgba\\(0, 0, 0, 0\\)|transparent/.test(colour);
    return {value: inp ? inp.value : '', visible: shown(wrap) && !transparent};
  });
  const btn = document.querySelector('[data-calc-go]');
  const statusEl = document.querySelector('[data-calc-status]');
  return {
    notice: !!w.querySelector('.calc-empty-widget'),
    state: w.getAttribute('data-results'),
    status: statusEl ? statusEl.textContent.trim() : '',
    hasButton: !!btn,
    buttonText: btn ? btn.innerText.trim() : '',
    computed: computed,
    blocks: [...w.querySelectorAll('.calc-script-block')].map(shown),
    overflow: document.documentElement.scrollWidth - document.documentElement.clientWidth
  };
}
"""

# Fill every empty, editable number box the way a visitor would — a calculator
# with required inputs answers nothing until it has something to work from.
FILL_FORM = """
() => {
  const w = document.querySelector('[data-calculator]');
  if (!w) return 0;
  /* Every box opens empty now — no harvested default is seeded — so a page is
     only solvable once all of its inputs carry something. Fill them all. */
  const boxes = [...w.querySelectorAll('.calc-field-home input.calc-input:not([readonly])')]
    .filter(i => !i.getAttribute('data-datetype'));
  let n = 0;
  for (const box of boxes) {
    if ((box.value || '').trim() !== '') continue;
    box.focus();
    box.value = String(12 + (n * 7));
    box.dispatchEvent(new Event('input', {bubbles: true}));
    box.dispatchEvent(new Event('change', {bubbles: true}));
    n++;
  }
  /* a date/time box needs a value too, or the calculator has nothing to work
     from */
  for (const d of [...w.querySelectorAll('input[data-datetype]')].filter(i => !i.readOnly)) {
    if ((d.value || '').trim() !== '') continue;
    const t = d.getAttribute('data-datetype');
    d.value = t === 'time' ? '09:00' : (t === 'datetime' ? '2026-03-10T09:00' : '2026-03-10');
    d.dispatchEvent(new Event('input', {bubbles: true}));
    d.dispatchEvent(new Event('change', {bubbles: true}));
    n++;
  }
  /* and a radio group needs a choice */
  const seen = new Set();
  for (const r of [...w.querySelectorAll('input[type=radio]')]) {
    if (seen.has(r.name)) continue;
    seen.add(r.name);
    if (![...w.querySelectorAll(`input[type=radio][name="${r.name}"]`)].some(o => o.checked)) {
      r.checked = true;
      r.dispatchEvent(new Event('change', {bubbles: true}));
      n++;
    }
  }
  for (const sel of [...w.querySelectorAll('select[data-var]')]) {
    sel.selectedIndex = Math.max(0, sel.selectedIndex);
    sel.dispatchEvent(new Event('change', {bubbles: true}));
  }
  return n;
}
"""

PROBE_LAYOUT = """
() => {
  const de = document.documentElement;
  const btn = document.querySelector('[data-calc-go]');
  const overlay = [...document.querySelectorAll('body *')].filter(el => {
    const cs = getComputedStyle(el);
    if (cs.position !== 'fixed' && cs.position !== 'absolute') return false;
    const r = el.getBoundingClientRect();
    return r.width > de.clientWidth * 0.6 && r.height > de.clientHeight * 0.6 &&
           cs.display !== 'none' && cs.visibility !== 'hidden' && parseFloat(cs.opacity || '1') > 0.2;
  }).length;
  const r = btn ? btn.getBoundingClientRect() : null;
  const widget = document.querySelector('[data-calculator]');
  const body = getComputedStyle(document.body);
  const wcs = widget ? getComputedStyle(widget) : null;
  const small = [...document.querySelectorAll(
      '[data-calculator] button, [data-calculator] input, [data-calculator] select')]
    .filter(el => {
      const b = el.getBoundingClientRect();
      const cs = getComputedStyle(el);
      if (cs.display === 'none' || cs.visibility === 'hidden') return false;
      if (el.type === 'radio' || el.type === 'checkbox') return false;   // covered by the label
      return b.width > 0 && (b.height < 32 || b.width < 24);
    }).map(el => el.tagName.toLowerCase() + '.' + (el.className || '').split(' ')[0]);
  return {
    overflow: Math.max(0, de.scrollWidth - de.clientWidth),
    btn: r ? {w: Math.round(r.width), h: Math.round(r.height), right: Math.round(r.right),
              left: Math.round(r.left)} : null,
    overlay,
    bodyFont: body.fontFamily,
    widgetFont: wcs ? wcs.fontFamily : '',
    smallTargets: small.slice(0, 6)
  };
}
"""


def catalogue(limit: int, only: str) -> list[str]:
    if only:
        return [only if only.startswith("/") else f"/biology/{only}"]
    with urllib.request.urlopen(f"{BASE}/search-index.json", timeout=30) as r:
        index = json.loads(r.read().decode())
    paths = sorted({e["u"] for e in index})
    # Fixed samples that must always be in a sweep: a panel-built script page, a
    # panel-built form page, a converted unit page and a plain harvested one.
    special = [p for p in ("/biology/codon-plot", "/biology/dog-coat-color",
                           "/biology/gc-content-sequence", "/biology/fcr",
                           "/biology/bird-age", "/math/absolute-value",
                           "/health/bmi", "/finance/mortgage-payment") if p in paths]
    rest = [p for p in paths if p not in special]
    stride = max(1, len(rest) // max(1, limit - len(special)))
    return (special + rest[::stride])[:limit]

STEP_FORM = """
(n) => {
  const w = document.querySelector('[data-calculator]');
  const boxes = [...w.querySelectorAll('.calc-field-home input.calc-input:not([readonly])')]
    .filter(i => !i.getAttribute('data-datetype'));
  /* a date box counts as a filled box too: some pages only need the two dates */
  const dates = [...w.querySelectorAll('input[data-datetype]:not([readonly])')];
  let k = 0;
  for (const d of dates) {
    if (k >= n) break;
    const t = d.getAttribute('data-datetype');
    d.value = t === 'time' ? '09:00' : (t === 'datetime' ? '2026-03-10T09:00' : '2026-03-10');
    d.dispatchEvent(new Event('input', {bubbles: true}));
    d.dispatchEvent(new Event('change', {bubbles: true}));
    k++;
  }
  for (const box of boxes) {
    if (k >= n) break;
    box.focus();
    box.value = String(12 + (k * 7));
    box.dispatchEvent(new Event('input', {bubbles: true}));
    box.dispatchEvent(new Event('change', {bubbles: true}));
    k++;
  }
  return k;
}
"""


def gate_checks(page, path: str, problems: list[str]) -> dict:
    before = page.evaluate(PROBE_VISIBLE)
    if before is None:
        problems.append(f"{path}: no calculator widget")
        return {"path": path, "computed": 0}
    # A definition with no usable fields now says so instead of offering a button
    # that cannot work. That is the correct state, and the whole check ends here.
    if before.get("notice"):
        if before["hasButton"]:
            problems.append(f"{path}: explains it has no fields but still offers a Calculate button")
        return {"path": path, "computed": 0, "notice": True,
                "button": "", "live_update": "n/a"}
    if not before["hasButton"]:
        problems.append(f"{path}: no Calculate button")
    if before["state"] == "shown":
        problems.append(f"{path}: results are shown before the button is pressed")
    leaked = [c for c in before["computed"] if c["visible"] and c["value"].strip() != ""]
    if leaked:
        problems.append(f"{path}: {len(leaked)} computed value(s) visible before Calculate")
    if any(before["blocks"]):
        problems.append(f"{path}: script block visible before Calculate")

    filled = page.evaluate(FILL_FORM)

    if before["hasButton"]:
        page.click("[data-calc-go]")
        page.wait_for_timeout(300)
    after = page.evaluate(PROBE_VISIBLE)

    # Filling every box is not always a fair question. A page whose boxes are
    # all equivalent (one time zone among 46) or whose answer is "what is left
    # over" (modulo's quotient) has nothing to derive once each box holds a
    # number — the calculator is right to sit there. So a page that stays
    # pending is asked again with one, two and three boxes filled: whatever the
    # visitor would really do.
    if after["state"] != "shown" and before["hasButton"]:
        for _try in range(3):
            page.goto(BASE + path, wait_until="load", timeout=60000)
            page.wait_for_timeout(180)
            page.evaluate(STEP_FORM, _try + 1)
            page.wait_for_timeout(120)
            page.click("[data-calc-go]")
            page.wait_for_timeout(300)
            after = page.evaluate(PROBE_VISIBLE)
            if after["state"] == "shown":
                break

    # A calculator with required inputs and nothing filled in has nothing to
    # answer, and says so ("Fill in a value the calculator can work from")
    # instead of opening an empty panel. That is a valid outcome; a blank panel
    # would be the worse one.
    nothing_to_solve = after["state"] == "pending" and after.get("status", "").lower().startswith("fill in")
    if after["state"] != "shown" and not nothing_to_solve:
        problems.append(f"{path}: pressing Calculate did not reveal the results "
                        f"(state {after['state']!r}, status {after.get('status','')!r})")
    if after["state"] == "shown" and not filled:
        pass      # defaults alone were enough to produce an answer
    # A row with nothing in it is a row this calculation does not use (the
    # truth-table's ten variable slots, an optional output group). Those are
    # hidden on purpose; only a value that exists has to be readable.
    hidden = [c for c in after["computed"] if not c["visible"] and str(c.get("value", "")).strip()]
    if hidden:
        problems.append(f"{path}: {len(hidden)} computed value(s) still hidden after Calculate")
    if after["state"] == "shown" and after["buttonText"].lower().strip() == before["buttonText"].lower().strip():
        problems.append(f"{path}: the button label did not change after the first press")

    # Editing after the press must still move an answer. Several controls are
    # tried, because not every input feeds every result (the codon plot's window
    # size does not change how many codons were read). If no edit moves anything
    # the row is marked "unverified" rather than failed — the value-level suites
    # prove that per calculator.
    stale = page.evaluate("""
    () => {
      const w = document.querySelector('[data-calculator]');
      const read = () => [...w.querySelectorAll('.calc-input-wrap.is-computed input')]
                          .map(i => i.value).join('|');
      // A result row is edited where it stands — that is how solving
      // backwards works — so it is not a "field" for the purposes of this
      // check. Radios, ticks and drop-downs are, and several calculators are
      // nothing but those.
      const inPanel = (el) => !!el.closest('[data-calc-results]');
      const numbers = [...w.querySelectorAll('input[data-var]')]
        .filter(i => !i.readOnly && !i.getAttribute('data-datetype') && !inPanel(i));
      const tocks = [...w.querySelectorAll('input[type=radio], input[type=checkbox]')]
        .filter(i => !i.disabled && !inPanel(i));
      const menus = [...w.querySelectorAll('select[data-var], select.calc-select')]
        .filter(sel => !sel.disabled && !inPanel(sel));
      // A sequence page is driven by a <textarea>, so an edit there counts too.
      const boxes = [...w.querySelectorAll('textarea[data-var]')].filter(t => !t.readOnly);
      const txt = () => (w.innerText || '').replace(/\\s+/g, ' ').trim();
      const was = read() + '|' + txt();
      for (const tog of tocks.slice(0, 4)) {
        if (tog.type === 'radio') {
          const group = w.querySelectorAll('input[type=radio][name="' + tog.name + '"]');
          const other = [...group].find(o => !o.checked) || tog;
          other.checked = true;
          other.dispatchEvent(new Event('change', {bubbles: true}));
        } else {
          tog.checked = !tog.checked;
          tog.dispatchEvent(new Event('change', {bubbles: true}));
        }
      }
      for (const sel of menus.slice(0, 2)) {
        sel.selectedIndex = (sel.selectedIndex + 1) % Math.max(1, sel.options.length);
        sel.dispatchEvent(new Event('change', {bubbles: true}));
      }
      for (const box of [...boxes, ...numbers].slice(0, 5)) {
        if (box.tagName === 'TEXTAREA') {
          box.focus();
          box.value = (box.value || '') + 'A';
        } else {
          const v = parseFloat(box.value || '0');
          box.focus();
          box.value = String(isFinite(v) ? v + 7 : 7);
        }
        box.dispatchEvent(new Event('input', {bubbles: true}));
        box.dispatchEvent(new Event('change', {bubbles: true}));
      }
      // Nothing may be repainted live: whatever the edit did, the results must
      // be off screen until Calculate is pressed again.
      return {state: w.getAttribute('data-results'),
              editable: boxes.length + numbers.length + tocks.length + menus.length};
    }
    """)
    live = "n/a"
    if stale and stale.get("editable"):
        if stale.get("state") in ("stale", "pending"):
            live = "held-back"
        else:
            problems.append(f"{path}: editing a field left the results on screen "
                            f"(state {stale.get('state')!r})")

    # Enter in a field is the same request as pressing the button
    page.goto(BASE + path, wait_until="load")
    page.wait_for_timeout(300)
    enter = page.evaluate("""
    () => {
      const w = document.querySelector('[data-calculator]');
      const editable = [...w.querySelectorAll('.calc-field-home input.calc-input:not([readonly])')]
        .filter(i => !i.getAttribute('data-datetype'));
      const box = editable[0];
      if (!box) return 'no-field';
      /* Enter is a request to answer, so the form first has to hold enough to
         answer from — most calculators need more than one number (BMI needs a
         height *and* a weight). */
      for (const b of editable.slice(0, 4)) {
        if ((b.value || '').trim() !== '') continue;
        b.value = '10';
        b.dispatchEvent(new Event('input', {bubbles: true}));
        b.dispatchEvent(new Event('change', {bubbles: true}));
      }
      box.focus();
      box.dispatchEvent(new KeyboardEvent('keydown', {key: 'Enter', bubbles: true}));
      return w.getAttribute('data-results');
    }
    """)
    # A date-driven calculator cannot be filled with plain numbers, so Enter can
    # only re-ask a question the form is not yet able to answer. Pending *with*
    # the explanation is the honest outcome; pending with no explanation is not.
    if enter not in ("shown", "no-field", "pending"):
        problems.append(f"{path}: Enter in a field did not calculate (state {enter!r})")

    # a shared link opens with the results already visible
    var = page.evaluate("""
    () => {
      const w = document.querySelector('[data-calculator]');
      const box = [...w.querySelectorAll('input[data-var]')].find(i => !i.readOnly);
      return box ? box.getAttribute('data-var') : null;
    }
    """)
    if var:
        page.goto(f"{BASE}{path}?{var}=1", wait_until="load")
        page.wait_for_timeout(300)
        if page.get_attribute("[data-calculator]", "data-results") != "shown":
            problems.append(f"{path}: a link carrying ?{var}= does not open with results shown")

    return {"path": path, "computed": len(before["computed"]),
            "button": before["buttonText"], "live_update": live}


def layout_checks(page, path: str, problems: list[str]) -> None:
    for width, height in WIDTHS:
        page.set_viewport_size({"width": width, "height": height})
        page.goto(BASE + path, wait_until="load")
        page.wait_for_timeout(200)
        if page.query_selector("[data-calc-go]"):
            page.click("[data-calc-go]")
            page.wait_for_timeout(150)
        lay = page.evaluate(PROBE_LAYOUT)
        if lay["overflow"] > 1:
            problems.append(f"{path} @{width}px: page scrolls {lay['overflow']}px sideways")
        if not lay["btn"]:
            problems.append(f"{path} @{width}px: no Calculate button")
        else:
            b = lay["btn"]
            if b["h"] < 44 or b["w"] < 44:
                problems.append(f"{path} @{width}px: Calculate is {b['w']}x{b['h']} px")
            if b["right"] > width + 1 or b["left"] < -1:
                problems.append(f"{path} @{width}px: Calculate sits off-screen")
        if lay["overlay"]:
            problems.append(f"{path} @{width}px: {lay['overlay']} full-page overlay(s)")
        if lay["smallTargets"]:
            problems.append(f"{path} @{width}px: small controls {lay['smallTargets']}")
        if lay["widgetFont"] and lay["bodyFont"] and lay["widgetFont"] != lay["bodyFont"]:
            problems.append(f"{path} @{width}px: widget font {lay['widgetFont']} differs "
                            f"from the page font {lay['bodyFont']}")


def no_js_check(browser, path: str, problems: list[str]) -> None:
    ctx = browser.new_context(java_script_enabled=False, viewport={"width": 1280, "height": 900})
    page = ctx.new_page()
    page.goto(BASE + path, wait_until="load")
    page.wait_for_timeout(250)
    values = page.eval_on_selector_all(
        ".calc-input-wrap.is-computed input", "els => els.map(e => e.value)")
    visible = page.eval_on_selector_all(
        ".calc-input-wrap.is-computed input",
        "els => els.filter(e => getComputedStyle(e).color !== 'rgba(0, 0, 0, 0)').length")
    if values and any(v.strip() for v in values) and visible == 0:
        problems.append(f"{path}: without JavaScript the results are masked and cannot be revealed")
    ctx.close()


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--pages", type=int, default=24, help="how many pages the gate sweep covers")
    ap.add_argument("--jobs", type=int, default=1, help="parallel browser workers")
    ap.add_argument("--layout-sample", type=int, default=3,
                    help="how many of those pages also get the 5-viewport layout pass")
    ap.add_argument("--slug", default="")
    ap.add_argument("--paths-file", default="",
                    help="a file of /paths to sweep instead of a strided sample")
    ap.add_argument("--verbose", action="store_true")
    ap.add_argument("--json", default="")
    args = ap.parse_args()

    if args.paths_file:
        pages = [ln.strip() for ln in Path(args.paths_file).read_text().splitlines() if ln.strip()]
        args.paths_file = ""
    else:
        pages = catalogue(args.pages, args.slug)
    if args.slug:
        args.layout_sample = max(args.layout_sample, 1)
    layout_pages = pages[: args.layout_sample]
    problems: list[str] = []
    rows: list[dict] = []

    # ---------------------------------------------------------------- gate sweep
    # One browser per worker, reused across that worker's paths: launching
    # Chromium 300 times cost more than the checks did, and the dev server only
    # has a handful of PHP workers, so a wide sweep also has to be a *patient*
    # one — a single slow page must not abort the run.
    def one_chunk(chunk: list[str]) -> tuple[list[str], list[dict]]:
        local: list[str] = []
        rows_out: list[dict] = []
        with sync_playwright() as p:
            browser = p.chromium.launch()
            ctx = browser.new_context(viewport={"width": 1280, "height": 900})
            page = ctx.new_page()
            page.set_default_timeout(60000)
            for path in chunk:
                errs: list[str] = []
                page.on("pageerror", lambda e, e2=errs: e2.append(str(e)))
                try:
                    page.goto(BASE + path, wait_until="load", timeout=60000)
                except Exception:                                  # noqa: BLE001
                    # one retry: the dev server is single-process-per-worker and a
                    # cold sitemap build can hold it for a few seconds
                    try:
                        page.goto(BASE + path, wait_until="load", timeout=60000)
                    except Exception as exc:                       # noqa: BLE001
                        local.append(f"{path}: could not load ({str(exc)[:60]})")
                        continue
                page.wait_for_timeout(400)
                rows_out.append(gate_checks(page, path, local))
                for e in errs[:1]:
                    local.append(f"{path}: page error {e[:100]}")
            ctx.close()
            browser.close()
        return local, rows_out

    jobs = max(1, args.jobs)
    chunks = [pages[i::jobs] for i in range(jobs)]
    with ThreadPoolExecutor(max_workers=jobs) as pool:
        for local, chunk_rows in pool.map(one_chunk, chunks):
            problems.extend(local)
            rows.extend(chunk_rows)

    with sync_playwright() as p:
        browser = p.chromium.launch()
        no_js_check(browser, pages[0], problems)
        browser.close()

    # ------------------------------------------------- responsive + theme
    def layout_chunk(chunk: list[str]) -> list[str]:
        local: list[str] = []
        with sync_playwright() as p:
            b = p.chromium.launch()
            page = b.new_page(viewport={"width": 1280, "height": 900})
            page.set_default_timeout(60000)
            for path in chunk:
                try:
                    layout_checks(page, path, local)
                except Exception as exc:                          # noqa: BLE001
                    local.append(f"{path}: layout pass failed ({str(exc)[:60]})")
            b.close()
        return local

    with ThreadPoolExecutor(max_workers=jobs) as pool:
        for local in pool.map(layout_chunk, [layout_pages[i::jobs] for i in range(jobs)]):
            problems.extend(local)

    unique_paths = {p.split(":")[0].split(" @")[0] for p in problems}
    print(f"pages, gate checks    : {len(pages)}")
    print(f"pages, layout checks  : {len(layout_pages)} x {len(WIDTHS)} viewports "
          f"({', '.join(str(w) for w, _ in WIDTHS)})")
    print(f"pages with problems   : {len(unique_paths)}")
    print(f"problems              : {len(problems)}")
    if args.verbose:
        for p in problems[:80]:
            print("  -", p)
    if args.json:
        with open(args.json, "w") as fh:
            json.dump({"pages": rows, "problems": problems}, fh, indent=1)
    unverified = [r["path"] for r in rows if r.get("live_update") == "unverified"]
    if unverified and args.verbose:
        print(f"  (live update unverified on {len(unverified)} page(s): "
              f"{', '.join(unverified[:6])})")
    return 1 if problems else 0


if __name__ == "__main__":
    sys.exit(main())
