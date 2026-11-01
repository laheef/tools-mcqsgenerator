#!/usr/bin/env python3
"""
engagement_test.py — prove that likes and reviews are real, not decorative.

Runs against the live site and checks the whole loop:

  * a like changes the stored count, and the same visitor cannot add a second one
  * a review is rejected when it is too short, contains a link, or names a
    calculator that does not exist
  * a valid review is stored, appears in the server-rendered HTML, and updates the
    aggregate rating in the SoftwareApplication JSON-LD
  * the review list endpoint returns the same data
  * in a browser: clicking like / submitting the form updates the page without a
    reload, and both survive a reload

Usage: python3 tools/engagement_test.py [--path /math/percentage]
Exit code 0 = everything behaved, 1 = something did not.
"""
from __future__ import annotations

import argparse
import http.cookiejar
import json
import re
import sys
import urllib.error
import urllib.request
from pathlib import Path

from playwright.async_api import async_playwright
import asyncio

ROOT = Path(__file__).resolve().parent.parent
BASE = "http://127.0.0.1:8080"
RESULTS: list[tuple[str, bool, str]] = []


def check(name: str, ok: bool, detail: str = "") -> None:
    RESULTS.append((name, ok, detail))
    print(f"  {'PASS' if ok else 'FAIL'}  {name}" + (f" — {detail}" if detail else ""))


def parse_count(text: str) -> int:
    """Like counts are formatted for humans ("3 508", "12,407"); strip the separators."""
    digits = re.sub(r"[^0-9]", "", text or "")
    return int(digits) if digits else 0


def opener_with_cookies():
    jar = http.cookiejar.CookieJar()
    return urllib.request.build_opener(urllib.request.HTTPCookieProcessor(jar))


def post_json(opener, path: str, payload: dict):
    req = urllib.request.Request(
        BASE + path,
        data=json.dumps(payload).encode(),
        headers={"Content-Type": "application/json"},
        method="POST",
    )
    try:
        with opener.open(req, timeout=20) as r:
            return r.status, json.loads(r.read().decode())
    except urllib.error.HTTPError as exc:
        body = exc.read().decode() or "{}"
        try:
            return exc.code, json.loads(body)
        except json.JSONDecodeError:
            return exc.code, {"error": body[:120]}


def get_json(path: str):
    with urllib.request.urlopen(BASE + path, timeout=20) as r:
        return json.loads(r.read().decode())


def get_html(path: str) -> str:
    with urllib.request.urlopen(BASE + path, timeout=20) as r:
        return r.read().decode("utf-8", "replace")


def jsonld(html: str):
    out = []
    for m in re.finditer(r'<script type="application/ld\+json">(.*?)</script>', html, re.S):
        try:
            out.append(json.loads(m.group(1)))
        except json.JSONDecodeError:
            pass
    return out


def api_checks(path: str) -> None:
    print("API behaviour")
    op = opener_with_cookies()

    before = get_json(f"/api/reviews?path={path}")["likes"]
    status, data = post_json(op, "/api/like", {"path": path})
    check("like is accepted", status == 200 and data.get("ok") is True, f"status {status}")
    after = data.get("likes")
    check("like increments the stored count", after == before + 1, f"{before} -> {after}")

    status, data = post_json(op, "/api/like", {"path": path})
    check("a second like from the same visitor is refused",
          data.get("changed") is False and data.get("likes") == after,
          data.get("message", ""))

    status, data = post_json(op, "/api/like", {"path": "/no/such-calculator"})
    check("like on an unknown calculator is rejected", status == 404, f"status {status}")

    status, data = post_json(op, "/api/review", {
        "path": path, "name": "Test", "body": "too short", "rating": 5})
    check("short review is rejected", status == 422 and "body" in data.get("errors", {}),
          data.get("error", ""))

    status, data = post_json(op, "/api/review", {
        "path": path, "name": "Spammer",
        "body": "Look at https://spam.example for a much better calculator than this one",
        "rating": 5})
    check("review containing a link is rejected", status == 422, data.get("error", ""))

    status, data = post_json(op, "/api/review", {
        "path": "/nope/nope", "name": "Test",
        "body": "This calculator does not exist so the review must be refused.", "rating": 5})
    check("review on an unknown calculator is rejected", status == 422, data.get("error", ""))

    marker = "Rendered by the automated engagement test to prove reviews persist."
    status, data = post_json(op, "/api/review", {
        "path": path, "name": "Engagement Test", "title": "Automated check",
        "body": marker, "rating": 4})
    check("valid review is published", status == 201 and data.get("ok") is True,
          f"status {status}")
    if not data.get("ok"):
        return

    review_id = data["review"]["id"]
    listing = get_json(f"/api/reviews?path={path}")
    check("review comes back from the list endpoint",
          any(r["id"] == review_id for r in listing["reviews"]))
    check("aggregate rating was recalculated",
          listing["count"] >= 1 and 1 <= listing["rating"] <= 5,
          f"{listing['rating']} from {listing['count']}")

    html = get_html(path)
    check("review is in the server-rendered HTML (crawlable)", marker in html)
    node = next((n for n in jsonld(html) if n.get("@type") == "SoftwareApplication"), None)
    agg = (node or {}).get("aggregateRating")
    check("JSON-LD carries a real AggregateRating",
          agg is not None and agg.get("reviewCount", 0) >= 1
          and agg.get("ratingValue") == f"{listing['rating']:.1f}",
          f"{agg}")


async def browser_checks(path: str) -> None:
    print("browser behaviour")
    async with async_playwright() as p:
        browser = await p.chromium.launch(args=["--no-sandbox"])
        ctx = await browser.new_context(viewport={"width": 1280, "height": 900})
        page = await ctx.new_page()
        errors: list[str] = []
        page.on("pageerror", lambda e: errors.append(str(e)))
        await page.goto(BASE + path, wait_until="networkidle")

        before = parse_count(await page.inner_text("[data-like-count]"))
        await page.click("[data-like]")
        await page.wait_for_timeout(900)
        after = parse_count(await page.inner_text("[data-like-count]"))
        check("clicking like updates the count without a reload",
              after in (before, before + 1), f"{before} -> {after}")

        reviews_before = await page.eval_on_selector_all(".review", "els => els.length")
        text = "Typed through the automated browser test, which proves the form posts and re-renders."
        await page.fill("#review-name", "Browser Test")
        await page.fill("#review-body", text)
        await page.click("label[for=star-5]")
        await page.click("[data-review-form] button[type=submit]")
        await page.wait_for_timeout(1400)
        status = (await page.inner_text("[data-review-status]")).strip()
        reviews_after = await page.eval_on_selector_all(".review", "els => els.length")
        check("form publishes a review in place",
              reviews_after == reviews_before + 1 and "live" in status.lower(),
              f"{reviews_before} -> {reviews_after}, status '{status}'")

        await page.reload(wait_until="networkidle")
        check("the review survives a reload",
              text in (await page.content()))
        await page.click("[data-preferred]")
        await page.wait_for_timeout(250)
        label = await page.inner_text("[data-preferred-label]")
        await page.reload(wait_until="networkidle")
        check("preferred-source choice persists",
              (await page.inner_text("[data-preferred-label]")) == label
              and "device" in label.lower(), label)

        check("no JavaScript errors", not errors, str(errors[:2]))
        await browser.close()


def main() -> int:
    ap = argparse.ArgumentParser()
    ap.add_argument("--path", default="/math/percentage")
    args = ap.parse_args()

    api_checks(args.path)
    asyncio.run(browser_checks(args.path))

    failed = [r for r in RESULTS if not r[1]]
    print(f"\n{len(RESULTS) - len(failed)} passed, {len(failed)} failed")

    out = ROOT / "docs" / "engagement-results.json"
    out.write_text(json.dumps(
        [{"check": n, "ok": ok, "detail": d} for n, ok, d in RESULTS], indent=1))
    return 1 if failed else 0


if __name__ == "__main__":
    sys.exit(main())
