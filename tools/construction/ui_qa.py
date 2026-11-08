"""UI + error-handling audit over the construction pack.

For each slug:
  * letters refused with a visible warning under the field
  * the page's own defaults compute every result box
  * no result prints more than three decimals
  * the tool column is sticky and has no inner scrollbar
  * zero console errors
"""
from __future__ import annotations

import json
import re
import sys

from playwright.sync_api import sync_playwright

BASE = "http://127.0.0.1:8080/construction/"


def decimals(text: str) -> int:
    t = (text or "").replace("\u2009", "").replace("\xa0", "").replace(" ", "")
    m = re.search(r"\.(\d+)", t)
    return len(m.group(1)) if m else 0


def run(slugs: list[str]) -> int:
    bad: list[str] = []
    with sync_playwright() as p:
        browser = p.chromium.launch()
        page = browser.new_page(viewport={"width": 1280, "height": 900})
        page.set_default_timeout(15000)
        errs: list[str] = []
        page.on("console", lambda m: errs.append(m.text) if m.type == "error" else None)
        page.on("pageerror", lambda e: errs.append(str(e)))
        for slug in slugs:
            errs.clear()
            problems: list[str] = []

            page.goto(BASE + slug, wait_until="networkidle")

            # 1. letters refused, message below the field
            first = page.query_selector(".calc-widget-column input.calc-input:not([readonly])")
            if first is None:
                problems.append("no input")
            else:
                first.click()
                page.keyboard.type("abc")
                page.wait_for_timeout(120)
                if first.input_value() != "":
                    problems.append(f"letters accepted: {first.input_value()!r}")
                box = first.evaluate("e => e.closest('.calc-field') && e.closest('.calc-field').querySelector('.calc-error') && e.closest('.calc-field').querySelector('.calc-error').textContent.trim()")
                if not box:
                    problems.append("no visible letter warning under the field")

            # 2. defaults compute
            page.reload(wait_until="networkidle")
            defaults = page.evaluate("""() => {
                const v = window.__calc.def.vars, out = {};
                for (const k in v) {
                    const d = v[k].defaults && v[k].defaults[0];
                    if (d && d.value !== '' && d.value !== null && d.value !== undefined) out[k] = String(d.value);
                }
                return out;}""")
            inputs = page.eval_on_selector_all(
                ".calc-widget-column input.calc-input[data-var]:not([readonly])",
                "els => els.map(e => e.getAttribute('data-var'))")
            for name in inputs:
                if name in defaults:
                    try:
                        page.fill(f"#{'f-' + name}", defaults[name])
                    except Exception:
                        page.fill(f"[data-var='{name}']", defaults[name])
            button = page.query_selector("button:has-text('Calculate')")
            if button:
                button.click()
            page.wait_for_timeout(450)
            results = page.eval_on_selector_all(
                ".calc-widget-column input.calc-input[readonly]",
                "els => els.map(e => [e.id, e.value])")
            blank = [i for i, v in results if v.strip() == ""]
            if blank:
                problems.append("blank results: " + ",".join(blank))
            for ident, val in results:
                if decimals(val) > 3:
                    problems.append(f"{ident} too many decimals: {val}")
                if "unit" in val or "NaN" in val or "Infinity" in val:
                    problems.append(f"{ident} prints {val!r}")

            # 3. layout
            layout = page.evaluate("""() => {
                const col = document.querySelector('.calc-widget-column');
                if (!col) return null;
                const cs = getComputedStyle(col);
                return {pos: cs.position, oy: cs.overflowY, sh: col.scrollHeight, ch: col.clientHeight};}""")
            if not layout:
                problems.append("no widget column")
            else:
                if layout["pos"] != "sticky":
                    problems.append("column not sticky")
                if layout["oy"] not in ("visible", "clip") or layout["sh"] > layout["ch"] + 1:
                    problems.append(f"inner scroll {layout}")

            if errs:
                problems.append("console: " + "; ".join(errs[:2]))

            if problems:
                bad.append(slug)
                print(f"  x {slug}: " + " | ".join(problems))
            errs.clear()
        browser.close()
    print(f"{len(slugs) - len(bad)}/{len(slugs)} clean")
    return 0 if not bad else 1


if __name__ == "__main__":
    names = [s.strip() for s in open(sys.argv[1]) if s.strip()]
    raise SystemExit(run(names))
