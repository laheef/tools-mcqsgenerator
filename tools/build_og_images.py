#!/usr/bin/env python3
"""
build_og_images.py — real share cards for Open Graph / Twitter.

Every page used to point `og:image` at a single **SVG**. Neither Facebook,
LinkedIn nor Twitter render an SVG share image: the card comes out blank, so a
link to any of the 3,831 calculators looked broken wherever it was posted. A
1200x630 PNG is the only format those crawlers accept.

The cards are built offline with Pillow (no GD in the PHP runtime, and rendering
3,831 PNGs per request is not a thing anyway) and committed to
`php-clone/assets/img/og/`:

    og/default.png        the home page, search, and anything without a category
    og/<category>.png     one card per category, with its calculator count

One card per *category* rather than per calculator keeps the repository at ~15
files instead of 3,831 while still giving every page an image that is specific
to it — a percentage calculator and a mortgage calculator no longer advertise
themselves with an identical picture.

Usage: python3 tools/build_og_images.py
"""
from __future__ import annotations

import json
import re
from pathlib import Path

from PIL import Image, ImageDraw, ImageFont

ROOT = Path(__file__).resolve().parent.parent
OUT = ROOT / "php-clone" / "assets" / "img" / "og"
CATS = ROOT / "php-clone" / "data" / "categories.json"
MANIFEST = ROOT / "php-clone" / "data" / "calc" / "manifest.json"

W, H = 1200, 630
BG = (247, 249, 255)
INK = (10, 10, 10)
INK_2 = (33, 36, 39)
MUTED = (75, 82, 89)
BRAND = (59, 104, 252)
BRAND_SOFT = (235, 239, 255)
WHITE = (255, 255, 255)

FONT_DIR = Path("/usr/share/fonts/truetype/dejavu")
BOLD = FONT_DIR / "DejaVuSans-Bold.ttf"
REGULAR = FONT_DIR / "DejaVuSans.ttf"


def font(path: Path, size: int) -> ImageFont.FreeTypeFont:
    try:
        return ImageFont.truetype(str(path), size)
    except Exception:                                            # noqa: BLE001
        return ImageFont.load_default(size)


def wrap(draw: ImageDraw.ImageDraw, text: str, f: ImageFont.FreeTypeFont, width: int) -> list[str]:
    lines, line = [], ""
    for word in text.split():
        candidate = f"{line} {word}".strip()
        if draw.textlength(candidate, font=f) <= width:
            line = candidate
        else:
            if line:
                lines.append(line)
            line = word
    if line:
        lines.append(line)
    return lines


def card(title: str, subtitle: str, footnote: str) -> Image.Image:
    img = Image.new("RGB", (W, H), BG)
    d = ImageDraw.Draw(img)

    # soft brand wash in the corner, the same shape the site uses
    wash = Image.new("RGB", (W, H), BG)
    wd = ImageDraw.Draw(wash)
    wd.ellipse((W - 520, -260, W + 260, 520), fill=BRAND_SOFT)
    img = Image.blend(img, wash, 0.85)
    d = ImageDraw.Draw(img)

    # brand mark: the Onim ring, drawn rather than pasted
    d.rounded_rectangle((80, 74, 156, 150), radius=22, fill=BRAND)
    d.ellipse((98, 92, 138, 132), outline=WHITE, width=8)
    d.ellipse((113, 107, 123, 117), fill=WHITE)
    d.text((176, 96), "Onim", font=font(BOLD, 34), fill=INK_2)

    # Title and subtitle are fitted together: try the big title first and step
    # down until both fit above the footnote strip, so a long title never
    # pushes the subtitle off the card.
    f_sub = font(REGULAR, 34)
    floor, top = H - 150, 210
    lead_s = 48
    chosen = None
    for size in (76, 70, 64, 58, 52):
        f_title = font(BOLD, size)
        lead_t = int(size * 1.22)
        t_lines = wrap(d, title, f_title, W - 320)[:3]
        s_lines = wrap(d, subtitle, f_sub, W - 200)
        avail = floor - top
        max_sub = max(1, (avail - len(t_lines) * lead_t - 20) // lead_s)
        s_lines = s_lines[:max_sub]
        block = len(t_lines) * lead_t + len(s_lines) * lead_s
        if block <= avail and len(s_lines) >= min(2, len(wrap(d, subtitle, f_sub, W - 200))):
            chosen = (f_title, lead_t, t_lines, s_lines)
            break
        chosen = chosen or (f_title, lead_t, t_lines, s_lines)
    f_title, lead_t, t_lines, s_lines = chosen
    block = len(t_lines) * lead_t + len(s_lines) * lead_s
    y = top + max(0, (floor - top - block) // 2)
    for line in t_lines:
        d.text((80, y), line, font=f_title, fill=INK)
        y += lead_t
    y += 6
    for line in s_lines:
        d.text((80, y), line, font=f_sub, fill=MUTED)
        y += lead_s

    # footnote strip
    d.line((80, H - 118, W - 80, H - 118), fill=(223, 226, 235), width=2)
    f_note = font(REGULAR, 28)
    f_dom = font(BOLD, 28)
    domain = "mcqsgenerator.com"
    # measure the domain rather than guessing at it, or the two lines collide
    limit = W - 80 - d.textlength(domain, font=f_dom) - 56
    note = footnote
    while note and d.textlength(note, font=f_note) > limit:
        note = note.rsplit(" ", 1)[0].rstrip(" ·,")
    if note and note != footnote:
        # never leave a dangling conjunction before the ellipsis
        note = re.sub(r"[\s·,]+(and|or|&)$", "", note).rstrip(" ·,") + " …"
    d.text((80, H - 92), note, font=f_note, fill=MUTED)
    d.text((W - 80, H - 92), domain, font=f_dom, fill=BRAND, anchor="ra")
    return img


def main() -> int:
    OUT.mkdir(parents=True, exist_ok=True)
    cats = json.loads(CATS.read_text()) if CATS.is_file() else []
    # live counts, not the reference's (the catalogue has a few hundred retired URLs)
    live: dict[str, int] = {}
    if MANIFEST.is_file():
        for row in json.loads(MANIFEST.read_text()).get("calcs", []):
            live[row[1]] = live.get(row[1], 0) + 1

    card(
        "Your life in free calculators",
        "4,041 unit-aware calculators, each with the formula and a worked example.",
        "Fourteen categories, from math to ecology",
    ).save(OUT / "default.png", optimize=True)

    made = 1
    for cat in cats:
        slug = cat.get("slug") or ""
        name = cat.get("name") or slug.title()
        count = live.get(slug, 0)
        if not slug:
            continue
        card(
            f"{name} calculators",
            (f"{count:,} free {name.lower()} calculators — enter your figures and read the "
             f"result instantly, with the formula shown." if count else
             f"Free {name.lower()} calculators — enter your figures and read the result "
             f"instantly, with the formula shown."),
            "Formula · Units · Worked example · No sign-up",
        ).save(OUT / f"{slug}.png", optimize=True)
        made += 1

    total = sum(f.stat().st_size for f in OUT.glob("*.png"))
    print(f"wrote {made} cards to {OUT} ({total/1024:.0f} KB total)")
    return 0


if __name__ == "__main__":
    raise SystemExit(main())
