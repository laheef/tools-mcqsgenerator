"""Crawl every listing page that carries a search box or a browse button.

    python3 tools/crawl-listings.py http://127.0.0.1:8080 ""
    python3 tools/crawl-listings.py https://mcqsgenerator.com /tool

Failures are exactly what round 60 has to guarantee: a section or category page
without its search box, a browse button that does not name what it lists, or a
catalogue that quietly grew one. It reads data/groups.json and
data/categories.json, so a section added in the panel is crawled after the next
deploy without editing this file.
"""
import json, os, re, sys, urllib.error, urllib.request

root = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
base = sys.argv[1] if len(sys.argv) > 1 else "http://127.0.0.1:8080"
prefix = sys.argv[2] if len(sys.argv) > 2 else ""


def get(path):
    try:
        with urllib.request.urlopen(base + prefix + path, timeout=30) as r:
            return r.status, r.read().decode("utf-8", "replace")
    except urllib.error.HTTPError as e:
        return e.code, e.read().decode("utf-8", "replace")


groups = json.load(open(os.path.join(root, "data/groups.json")))
sections = [g for g in groups if g["slug"] != "calculators" and not g.get("parent")]
subs = [g for g in groups if g.get("parent")]
cats = [c for c in json.load(open(os.path.join(root, "data/categories.json"))) if c["slug"] != "discover"]

problems = []


def listing(path, want_search, want_button):
    code, html = get(path)
    if code != 200:
        problems.append(f"{path} -> HTTP {code}")
        return
    if want_search != ('class="list-search"' in html):
        problems.append(f"{path} -> search box {'missing' if want_search else 'unexpected'}")
    if not want_button:
        return
    m = re.search(r"Browse all [0-9 ,]*[^<]*", html)
    if not m:
        problems.append(f"{path} -> no Browse all button")
        return
    label = re.sub(r"\s+", " ", m.group(0)).strip()
    parts = re.match(r"Browse all ([\d,]+) (.+)$", label)
    if not parts:
        problems.append(f"{path} -> button does not start with a count: {label!r}")
        return
    rest = parts.group(2).strip()
    # "Browse all 4 tools" names nothing. "Browse all 4 image tools" and
    # "Browse all 5 converters" both do.
    if rest in ("tool", "tools") or len(rest) < 5:
        problems.append(f"{path} -> button does not name the section: {label!r}")


for g in sections:
    listing("/" + g["slug"], True, True)
for s in subs:
    listing("/" + s["slug"], True, True)
for c in cats:
    listing("/" + c["slug"], True, False)
listing("/all-tools", False, False)
for g in sections:
    listing("/all-tools/" + g["slug"], False, False)
listing("/all-calculators", False, False)
listing("/", False, False)

print(f"sections={len(sections)} subs={len(subs)} categories={len(cats)} problems={len(problems)}")
for p in problems[:30]:
    print("  ", p)
sys.exit(1 if problems else 0)
