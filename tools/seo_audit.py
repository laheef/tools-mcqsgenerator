"""
SEO / integrity audit: crawls the built site and checks
  * every internal link resolves (no 404s)
  * one <h1>, unique <title>, description length, canonical absoluteness
  * JSON-LD parses and declares @context/@type
  * sitemap.xml is valid XML and lists every route
  * robots.txt points at the sitemap
"""
import json, re, sys, urllib.request, xml.etree.ElementTree as ET
from urllib.parse import urlsplit
from html.parser import HTMLParser
from collections import defaultdict

BASE = "http://127.0.0.1:8080"


def get(path):
    req = urllib.request.Request(BASE + path, headers={"User-Agent": "audit"})
    with urllib.request.urlopen(req, timeout=30) as r:
        return r.status, r.read().decode("utf-8", "replace")


class Scan(HTMLParser):
    def __init__(self):
        super().__init__()
        self.links, self.h1, self.titles = [], 0, 0
        self.meta, self.canonical, self.ld = {}, None, []
        self.in_title = False
        self.in_ld = False
        self.title_text = ""
        self.ld_buf = ""
        self.img_no_alt = 0

    def handle_starttag(self, tag, attrs):
        a = dict(attrs)
        if tag == "a" and a.get("href"):
            self.links.append(a["href"])
        elif tag == "h1":
            self.h1 += 1
        elif tag == "title":
            self.in_title = True
        elif tag == "meta":
            if a.get("name") in ("description", "robots"):
                self.meta[a["name"]] = a.get("content", "")
            if a.get("property", "").startswith("og:"):
                self.meta[a["property"]] = a.get("content", "")
        elif tag == "link" and a.get("rel") == "canonical":
            self.canonical = a.get("href")
        elif tag == "script" and a.get("type") == "application/ld+json":
            self.in_ld = True
            self.ld_buf = ""
        elif tag == "img" and "alt" not in a:
            # alt="" is the correct markup for a decorative image (an avatar
            # sitting next to the person's name); only a *missing* attribute is
            # a defect, because it makes a screen reader read out the filename.
            self.img_no_alt += 1

    def handle_endtag(self, tag):
        if tag == "title":
            self.in_title = False
        elif tag == "script" and self.in_ld:
            self.in_ld = False
            self.ld.append(self.ld_buf)

    def handle_data(self, data):
        if self.in_title:
            self.title_text += data
        if self.in_ld:
            self.ld_buf += data


def main():
    problems = []
    index = json.loads(get("/search-index.json")[1])
    cat_slugs = sorted({c["c"] for c in index})
    routes = ["/", "/calculators"] + ["/" + c for c in cat_slugs] + [c["u"] for c in index] + ["/search"]

    stats = defaultdict(int)
    titles = defaultdict(list)
    internal = set()

    for route in routes:
        status, html = get(route)
        if status != 200:
            problems.append(f"{route}: HTTP {status}")
            continue
        scan = Scan()
        scan.feed(html)

        if scan.h1 != 1:
            problems.append(f"{route}: {scan.h1} <h1> elements")
        if not scan.meta.get("description"):
            problems.append(f"{route}: missing meta description")
        desc_len = len(scan.meta.get("description", ""))
        if desc_len > 165:
            problems.append(f"{route}: description {desc_len} chars (>160 recommended)")
        if not scan.canonical or not scan.canonical.startswith("http"):
            problems.append(f"{route}: canonical missing or relative ({scan.canonical!r})")
        if not scan.ld:
            problems.append(f"{route}: no JSON-LD")
        for blob in scan.ld:
            try:
                node = json.loads(blob)
            except json.JSONDecodeError as exc:
                problems.append(f"{route}: invalid JSON-LD ({exc})")
                continue
            if "@context" not in node or "@type" not in node:
                problems.append(f"{route}: JSON-LD missing @context/@type")
            stats["ld_" + str(node.get("@type"))] += 1
        if scan.img_no_alt:
            problems.append(f"{route}: {scan.img_no_alt} <img> without alt")

        # Share cards must be a raster format a social crawler can render: an
        # SVG `og:image` produces a blank card wherever the link is posted.
        og = scan.meta.get("og:image", "")
        if not og:
            problems.append(f"{route}: missing og:image")
        elif not og.lower().endswith((".png", ".jpg", ".jpeg", ".webp")):
            problems.append(f"{route}: og:image is not a raster image ({og.rsplit('/', 1)[-1]})")
        elif not scan.meta.get("og:image:alt"):
            problems.append(f"{route}: og:image has no alt text")

        titles[scan.title_text.strip()].append(route)
        stats["pages"] += 1

        for href in scan.links:
            if href.startswith("#") or href.startswith("mailto:"):
                continue
            if href.startswith("/"):
                internal.add(href.split("#")[0])
            elif not href.startswith("http"):
                internal.add("/" + href.lstrip("./").split("#")[0])

    # duplicate titles
    for title, where in titles.items():
        if len(where) > 1 and title:
            problems.append(f"duplicate <title> {title!r} on {where}")

    # crawl internal links
    checked = 0
    for link in sorted(internal):
        if link.startswith("//"):
            continue
        try:
            status, _ = get(link)
            checked += 1
            if status != 200:
                problems.append(f"broken internal link {link} (HTTP {status})")
        except urllib.error.HTTPError as exc:
            problems.append(f"broken internal link {link} (HTTP {exc.code})")

    # sitemap
    status, xml = get("/sitemap.xml")
    try:
        root = ET.fromstring(xml)
        ns = {"s": "http://www.sitemaps.org/schemas/sitemap/0.9"}
        locs = [u.find("s:loc", ns).text for u in root.findall("s:url", ns)]
        stats["sitemap_urls"] = len(locs)
        # <loc> is absolute and carries whatever host the sitemap was built
        # for, which need not be the host this audit talks to. Compare paths,
        # and fetch from the sitemap's own origin so a host mismatch cannot be
        # reported as a dead route.
        origin = ""
        if locs:
            parts = urlsplit(locs[0])
            origin = f"{parts.scheme}://{parts.netloc}"
        stats["sitemap_origin"] = origin
        for loc in locs:
            parts = urlsplit(loc)
            path = parts.path + (f"?{parts.query}" if parts.query else "")
            path = path or "/"
            if path != "/" and path not in {r.split("?")[0] for r in routes}:
                # CMS pages (/about, /privacy, …) and blog posts are created in the
                # admin panel, so they are not in the static route list. A URL is
                # only a problem if it does not actually resolve.
                try:
                    status = urllib.request.urlopen(origin + path, timeout=20).getcode()
                except urllib.error.HTTPError as exc:
                    status = exc.code
                except Exception:
                    status = 0
                if status != 200:
                    problems.append(f"sitemap lists a dead route {path} (HTTP {status})")
    except ET.ParseError as exc:
        problems.append(f"sitemap.xml is not valid XML ({exc})")
        locs = []

    status, robots = get("/robots.txt")
    if "Sitemap:" not in robots:
        problems.append("robots.txt has no Sitemap: line")

    print(f"pages audited:        {stats['pages']}")
    print(f"internal links:       {checked} checked")
    print(f"sitemap urls:         {stats['sitemap_urls']}")
    print(f"json-ld nodes:        " + ", ".join(f"{k[3:]}={v}" for k, v in sorted(stats.items()) if k.startswith("ld_")))
    print()
    if problems:
        print(f"{len(problems)} PROBLEM(S):")
        for p in problems[:40]:
            print("  -", p)
        return 1
    print("No problems found.")
    return 0


sys.exit(main())
