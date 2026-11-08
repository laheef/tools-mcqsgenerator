"""
Browser QA for the chemistry pack: type the page's own values, press Calculate,
read the result boxes back, and compare with an independent evaluation.

    python3 tools/chemistry/browser_qa.py [slugs]
"""

from __future__ import annotations

import os
import re
import sys

sys.path.insert(0, os.path.dirname(__file__))

from lib import solve  # noqa: E402
import build  # noqa: E402

from playwright.sync_api import sync_playwright  # noqa: E402

BASE = "http://127.0.0.1:8080"


def number(text: str) -> float | None:
    s = (text or "").replace("\u2009", "").replace("\xa0", "").replace(" ", "").strip()
    if s == "":
        return None
    s2 = s.replace("×10^", "e")
    s2 = s2.replace(",", "")
    try:
        return float(s2)
    except ValueError:
        return None


def close(a: float | None, b: float | None) -> bool:
    if a is None or b is None:
        return a is b
    if a == b:
        return True
    return abs(a - b) <= max(5e-4, 6e-4 * abs(b))   # the page prints three decimals


def main() -> int:
    only = ",".join(sys.argv[1:])
    specs = build.load_specs(only)
    failures = 0
    with sync_playwright() as p:
        browser = p.chromium.launch()
        for spec in specs:
            page = browser.new_page(viewport={"width": 1500, "height": 1000}, device_scale_factor=1)
            errors: list[str] = []
            page.on("pageerror", lambda e: errors.append(str(e)))
            page.on("console", lambda m: errors.append(m.text) if m.type == "error" else None)
            problems: list[str] = []
            try:
                page.goto(f"{BASE}/chemistry/{spec.slug}", wait_until="networkidle")
                page.wait_for_timeout(250)
                boxes = page.locator(".calc-widget input[data-var]")
                names = [boxes.nth(i).get_attribute("data-var") for i in range(boxes.count())]
                env = spec.default_env()
                raw = {f["name"]: str(f.get("default", "")) for f in spec.fields}
                for i, name in enumerate(names):
                    if name in env:
                        boxes.nth(i).click()
                        boxes.nth(i).type(raw.get(name) or repr(env[name]), delay=10)
                page.wait_for_timeout(200)
                button = page.locator(".calc-widget button", has_text="Calc").first
                if button.count():
                    button.click()
                    page.wait_for_timeout(350)
                shown = {names[i]: boxes.nth(i).input_value() for i in range(len(names))}
                want = solve(spec, env)
                for r in spec.results:
                    if not close(number(shown.get(r["name"], "")), want.get(r["name"])):
                        problems.append(f"{r['name']}: page {shown.get(r['name'])!r} "
                                        f"vs expected {want.get(r['name'])!r}")
                page.set_viewport_size({"width": 390, "height": 844})
                page.wait_for_timeout(200)
                sizes = page.evaluate("() => [document.documentElement.scrollWidth, document.documentElement.clientWidth]")
                if sizes[0] > sizes[1] + 1:
                    problems.append(f"mobile overflow: {sizes}")
            except Exception as exc:                        # noqa: BLE001
                problems.append(f"crash: {exc}")
            finally:
                page.close()
            if errors:
                problems.append(f"console: {errors[:2]}")
            if problems:
                failures += 1
                print(f"  ✗ {spec.slug}")
                for prob in problems:
                    print(f"      {prob}")
            else:
                print(f"  ✓ {spec.slug}")
    print(f"\n{len(specs) - failures}/{len(specs)} pages clean in the browser")
    return 1 if failures else 0


if __name__ == "__main__":
    raise SystemExit(main())
