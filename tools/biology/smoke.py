#!/usr/bin/env python3
"""Runtime smoke test for the biology CustomCalc pages.

For every calculator it:
  * loads the page and checks it renders its inputs and infographic,
  * types a value into each editable field on its own (single-field pass),
  * types into every field in pairs (fill two, check every output),
  * clears each editable field and checks the page recovers,
  * watches for console errors, uncaught exceptions, NaN/Infinity in any box,
  * checks that every output box is read-only.

Usage:  python3 tools/biology/smoke.py [--slugs a,b] [--limit N] [--shots]
"""
from __future__ import annotations

import argparse
import json
import os
import re
import sys

from playwright.sync_api import sync_playwright

BASE = "http://localhost:8080"
PACK = "/home/user/php-clone/data/samples/biology-pack.json"
SHOTS = "/home/user/qa/shots"

VALUES = [0, 1, 7, 100, 1e9]


def slugs_from_pack() -> list[str]:
    with open(PACK) as fh:
        return [c["slug"] for c in json.load(fh)]


def check_state(page) -> list[str]:
    """Return a list of problems in the current field state."""
    bad = []
    boxes = page.eval_on_selector_all(
        "input[data-var]", "els=>els.map(e=>[e.dataset.var, e.value, e.readOnly])")
    for name, value, ro in boxes:
        if re.search(r"(?i)\b(nan|infinity|-infinity|undefined|null)\b", value or ""):
            bad.append(f"{name}={value!r}")
        if re.match(r"^-?\d+(\.\d+)?e[+-]?\d+$", (value or "").strip()):
            bad.append(f"{name}={value!r} (exponent leak)")
    return bad


def outputs_readonly(page) -> list[str]:
    """A box the solver fills must be read-only — unless it is also a source.

    Some converters offer two equivalent quantities (mass and molar amount,
    pmol/µL and µg/mL). Both are writable on purpose: the visitor types the one
    they have and the solver derives the other. Telling those apart from a pure
    output needs the equation graph, so this reads it from the page definition:
    a variable that appears on the right-hand side of any formula can be typed
    into, and anything else the solver computes must be locked.
    """
    sources = set(page.evaluate(
        """() => {
            const def = JSON.parse(document.getElementById('calc-definition').textContent);
            const names = new Set();
            (def.eq || []).forEach(variants => (variants || []).forEach(v => {
                (v.rhs || []).forEach(n => names.add(n));
            }));
            return [...names];
        }"""))
    bad = []
    rows = page.eval_on_selector_all(
        "input[data-var]", "els=>els.map(e=>[e.dataset.var, e.readOnly])")
    for name, ro in rows:
        wrap = page.eval_on_selector(
            f'input[data-var="{name}"]',
            "e=>{const w=e.closest('.calc-input-wrap');return w?w.className:''}")
        if "is-computed" in (wrap or "") and not ro and name not in sources:
            bad.append(name)
    return bad


def run(only: list[str] | None, limit: int | None, shots: bool) -> int:
    slugs = slugs_from_pack()
    if only:
        slugs = [s for s in slugs if s in only]
    if limit:
        slugs = slugs[:limit]

    problems: list[str] = []
    with sync_playwright() as p:
        browser = p.chromium.launch()
        for slug in slugs:
            page = browser.new_page()
            errors: list[str] = []
            page.on("console", lambda m, e=errors: e.append(m.text) if m.type == "error" else None)
            page.on("pageerror", lambda ex, e=errors: e.append("pageerror: " + str(ex)))
            url = f"{BASE}/biology/{slug}"
            resp = page.goto(url, wait_until="load")
            if resp is None or resp.status != 200:
                problems.append(f"{slug}: HTTP {resp.status if resp else 'none'}")
                page.close()
                continue
            page.wait_for_timeout(350)
            # Press Calculate before looking at the panel: results are held back
            # until the button is pressed, exactly as a visitor sees them.
            page.evaluate("() => { const b = document.querySelector('[data-calc-go]'); if (b) b.click(); }")
            page.wait_for_timeout(200)

            if not page.query_selector("input[data-var]"):
                problems.append(f"{slug}: no inputs")
            if not page.query_selector("figure svg, .calc-figure svg, svg"):
                problems.append(f"{slug}: no infographic")

            order = page.eval_on_selector_all(
                "input[data-var]:not([readonly])", "els=>els.map(e=>e.dataset.var)")
            for bad_ro in outputs_readonly(page):
                problems.append(f"{slug}: output {bad_ro} is editable")

            # single-field pass: one value in, everything else at defaults
            for name in order:
                for v in VALUES:
                    page.fill(f'input[data-var="{name}"]', str(v))
                    page.wait_for_timeout(30)
                    for b in check_state(page):
                        problems.append(f"{slug}: [{name}={v}] {b}")
                    page.fill(f'input[data-var="{name}"]', "")
                    page.wait_for_timeout(20)

            # pair pass: two fields set in opposite corners of the value range
            for i, a in enumerate(order):
                for b in order[i + 1:]:
                    for va, vb in ((1, 100), (100, 1), (0.0001, 1e9)):
                        page.fill(f'input[data-var="{a}"]', str(va))
                        page.fill(f'input[data-var="{b}"]', str(vb))
                        page.wait_for_timeout(25)
                        for bad in check_state(page):
                            problems.append(f"{slug}: [{a}={va},{b}={vb}] {bad}")

            # recovery pass: clear every field, page must not strand the user
            for name in order:
                page.fill(f'input[data-var="{name}"]', "")
                page.wait_for_timeout(30)
                page.eval_on_selector(f'input[data-var="{name}"]', "e=>e.blur()")
                page.wait_for_timeout(60)
                vals = page.eval_on_selector_all(
                    "input[data-var]", "els=>els.map(e=>e.value)")
                if all(v == "" for v in vals):
                    problems.append(f"{slug}: blank after clearing {name}")

            if shots:
                os.makedirs(SHOTS, exist_ok=True)
                page.screenshot(path=os.path.join(SHOTS, f"bio-{slug}.png"), full_page=False)

            if errors:
                problems.append(f"{slug}: console {errors[:3]}")
            page.close()
        browser.close()

    print(f"checked {len(slugs)} calculators")
    if problems:
        print(f"{len(problems)} problems")
        for pr in problems[:60]:
            print("  !", pr)
        return 1
    print("0 problems")
    return 0


if __name__ == "__main__":
    ap = argparse.ArgumentParser()
    ap.add_argument("--slugs")
    ap.add_argument("--limit", type=int)
    ap.add_argument("--shots", action="store_true")
    a = ap.parse_args()
    sys.exit(run(a.slugs.split(",") if a.slugs else None, a.limit, a.shots))
