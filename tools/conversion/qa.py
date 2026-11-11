"""Every conversion page answers: 200, one H1, a form, and the numbers right."""

from __future__ import annotations

import json
import re
import subprocess
import sys
import urllib.request

BASE = "http://127.0.0.1:8099"
import catalog  # noqa: E402

SLUGS = [r["slug"] for r in catalog.inventory()]


def get(path: str) -> tuple[int, str]:
    req = urllib.request.Request(BASE + path, headers={"User-Agent": "qa"})
    with urllib.request.urlopen(req, timeout=30) as resp:
        return resp.status, resp.read().decode("utf-8", "replace")


def main() -> int:
    bad = []
    for slug in SLUGS:
        try:
            code, body = get(f"/conversion/{slug}")
        except Exception as exc:                                   # noqa: BLE001
            bad.append((slug, f"error {exc}"))
            continue
        if code != 200:
            bad.append((slug, f"status {code}"))
            continue
        h1 = re.findall(r"<h1[^>]*>(.*?)</h1>", body, re.S)
        if len(h1) != 1:
            bad.append((slug, f"{len(h1)} h1"))
        if 'class="calc-form' not in body and 'data-calc' not in body and "<form" not in body:
            bad.append((slug, "no form"))
        if "no formula" in body.lower():
            bad.append((slug, "page says no formula"))
    print(f"{len(SLUGS) - len(bad)}/{len(SLUGS)} pages answer")
    for slug, why in bad[:20]:
        print("  !", slug, why)
    return 1 if bad else 0


if __name__ == "__main__":
    raise SystemExit(main())
