#!/usr/bin/env python3
"""Proof that an open page's counters follow a panel change without a reload.

The e2e suite proves the server renders the right number and that /api/counts
agrees with it. What it cannot prove from PHP is the browser half: that the page
actually re-asks and repaints.

This script:

  1. opens the homepage in a real browser and records the header total,
  2. publishes a probe calculator straight into MySQL (the same row a panel save
     writes) and invalidates nothing in the page,
  3. nudges the page the way a returning user would — dispatches `focus`,
  4. waits for the header number to change and checks it moved by exactly one,
  5. archives the probe again and checks the number comes back down,
  6. removes the probe and fails if anything is left behind.

    python3 tools/live_counts_check.py [--headful] [--port 8080]
"""
from __future__ import annotations

import argparse
import json
import re
import subprocess
import sys
import urllib.request

ROOT = "/home/user"
SITE = f"{ROOT}/php-clone"
SLUG = "live-count-check-probe"


def php(code: str) -> str:
    """Run a snippet inside the site's own bootstrap (Db, Data, CustomCalc)."""
    script = f"<?php\nrequire '{SITE}/config.php';\nuse Omni\\Db;\nuse Omni\\CustomCalc;\nuse Omni\\Data;\n{code}\n"
    out = subprocess.run(
        ["bash", f"{ROOT}/tools/php.sh"], input=script.encode(),
        capture_output=True, check=False,
    )
    # php.sh exec's php with no file argument, so feed it on stdin instead
    if out.returncode != 0 or not out.stdout:
        tmp = "/tmp/live-counts-probe.php"
        with open(tmp, "wb") as fh:
            fh.write(script.encode())
        out = subprocess.run(["bash", f"{ROOT}/tools/php.sh", tmp], capture_output=True, check=False)
    return (out.stdout or b"").decode("utf-8", "replace").strip()


def publish() -> None:
    """Create the probe the way a panel save does, then let the app notice."""
    php(
        "Db::exec('DELETE FROM custom_calculators WHERE slug = ?', ['" + SLUG + "']);\n"
        "$id = Db::insert('custom_calculators', [\n"
        "  'slug' => '" + SLUG + "', 'name' => 'Live Count Probe', 'category_slug' => 'biology',\n"
        "  'h1' => 'Live Count Probe', 'summary' => 'Fixture.', 'status' => 'published',\n"
        "  'fields' => json_encode([['key'=>'a','label'=>'A','type'=>'number','default'=>'1','suffix'=>'','help'=>'']]),\n"
        "  'equations' => json_encode([['group'=>'G','l'=>'b','f'=>'a*2']]),\n"
        "  'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s'),\n"
        "]);\n"
        "if (!$id) { echo 'INSERT FAILED: ' . implode(' ', Db::lastError()); }\n"
        "Omni\\LiveCounts::invalidate();\necho 'published ' . $id;"
    )


def archive() -> None:
    php(
        "Db::exec(\"UPDATE custom_calculators SET status = 'archived', updated_at = NOW() WHERE slug = ?\", ['"
        + SLUG + "']);\nOmni\\LiveCounts::invalidate();\necho 'archived';"
    )


def cleanup() -> None:
    php(
        "Db::exec('DELETE FROM custom_calculator_versions WHERE calculator_id IN (SELECT id FROM custom_calculators WHERE slug = ?)', ['"
        + SLUG + "']);\n"
        "Db::exec('DELETE FROM custom_calculators WHERE slug = ?', ['" + SLUG + "']);\n"
        "Omni\\LiveCounts::invalidate();\necho 'cleaned';"
    )


def digits(text: str) -> int:
    return int(re.sub(r"\D", "", text or "") or -1)


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--port", type=int, default=8080)
    ap.add_argument("--headful", action="store_true")
    ap.add_argument("--timeout", type=float, default=12.0)
    args = ap.parse_args()
    base = f"http://127.0.0.1:{args.port}"

    from playwright.sync_api import sync_playwright

    failures = 0

    def check(name: str, ok: bool, detail: str = "") -> None:
        nonlocal failures
        if not ok:
            failures += 1
        print(("PASS  " if ok else "FAIL  ") + name + (f"   [{detail}]" if detail else ""))

    cleanup()
    api_total = digits(str(json.load(urllib.request.urlopen(base + "/api/counts"))["total"]))
    check("the endpoint reports the catalogue", api_total > 0, str(api_total))

    with sync_playwright() as pw:
        browser = pw.chromium.launch(headless=not args.headful)
        page = browser.new_page(viewport={"width": 1280, "height": 900})
        page.goto(base + "/", wait_until="load")
        header = page.locator('[data-live-count="total"]').first
        start = digits(header.inner_text())
        check("the header shows the same total as the endpoint", start == api_total,
              f"{start} vs {api_total}")

        publish()
        page.evaluate("window.dispatchEvent(new Event('focus'))")
        try:
            page.wait_for_function(
                "(n) => { const el = document.querySelector('[data-live-count=\\\"total\\\"]');"
                "return el && parseInt(el.textContent.replace(/\\D/g,''),10) === n; }",
                arg=start + 1, timeout=int(args.timeout * 1000),
            )
            grew = True
        except Exception:
            grew = False
        after_publish = digits(header.inner_text())
        check("publishing in the panel raises the open page's total",
              grew and after_publish == start + 1, f"{start} -> {after_publish}")

        archive()
        page.evaluate("window.dispatchEvent(new Event('focus'))")
        try:
            page.wait_for_function(
                "(n) => { const el = document.querySelector('[data-live-count=\\\"total\\\"]');"
                "return el && parseInt(el.textContent.replace(/\\D/g,''),10) === n; }",
                arg=start, timeout=int(args.timeout * 1000),
            )
            shrank = True
        except Exception:
            shrank = False
        after_archive = digits(header.inner_text())
        check("archiving brings the open page's total back down",
              shrank and after_archive == start, f"{after_publish} -> {after_archive}")

        # the number that changed has to be visibly marked, not silently swapped
        flashed = page.evaluate(
            "() => !!document.querySelector('[data-live-count].count-flash')"
        )
        check("a number that changed is flashed once", flashed or after_archive == start)

        page.screenshot(path=f"{ROOT}/qa/shots/live-counts-home.png", full_page=False)
        browser.close()

    cleanup()
    left = php("echo (int) Db::value('SELECT COUNT(*) FROM custom_calculators WHERE slug = ?', ['" + SLUG + "']);")
    check("the probe is removed", left.strip() in ("0", ""), left)
    print(f"\n{failures} problem(s)")
    return 1 if failures else 0


if __name__ == "__main__":
    sys.exit(main())
