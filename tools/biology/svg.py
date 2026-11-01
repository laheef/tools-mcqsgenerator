"""
Animated SVG infographics, one per calculator.

Each file is self-contained (no external references, no scripts), animated with
CSS keyframes, sized 720×300, and carries <title>/<desc> text so a screen reader,
a crawler or a language model can tell what the diagram shows without rendering it.
"""

from __future__ import annotations

import html
import math

from lib import Spec, fmt, label_of

W, H = 720, 300
INK = "#0f172a"
MUTED = "#64748b"
LINE = "#cbd5e1"
BRAND = "#2563eb"
ACCENT = "#0ea5e9"
OK = "#059669"

CSS = """
  .lbl { font: 600 13px ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif; fill: __INK__; }
  .val { font: 700 17px ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif; fill: __INK__; }
  .small { font: 500 11px ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif; fill: __MUTED__; }
  .tag { font: 600 11px ui-sans-serif, system-ui, -apple-system, 'Segoe UI', sans-serif; fill: __BRAND__;
         letter-spacing: .06em; text-transform: uppercase; }
  .box { fill: #f8fafc; stroke: __LINE__; stroke-width: 1.5; rx: 10; }
  .boxout { fill: #eff6ff; stroke: __BRAND__; stroke-width: 2; rx: 10; }
  .arrow { stroke: __LINE__; stroke-width: 2; fill: none; }
  .flow { stroke: __ACCENT__; stroke-width: 2; fill: none; stroke-dasharray: 5 7; animation: dash 1.6s linear infinite; }
  .grow { transform-box: fill-box; transform-origin: bottom; animation: rise .9s cubic-bezier(.2,.8,.2,1) both; }
  .fade { animation: fade 1s ease both; }
  .slide { animation: slide 1.2s cubic-bezier(.2,.8,.2,1) both; }
  .pulse { animation: pulse 2.4s ease-in-out infinite; }
  .widen { transform-box: fill-box; transform-origin: left; animation: widen .8s cubic-bezier(.2,.8,.2,1) both; }
  .sweep { animation: sweepdown 3.2s cubic-bezier(.4,0,.6,1) infinite; }
  .tick { font: 700 12px ui-monospace, 'SF Mono', Menlo, monospace; fill: __MUTED__; }
  @keyframes dash { to { stroke-dashoffset: -24; } }
  @keyframes rise { from { transform: scaleY(.05); opacity: .2; } to { transform: scaleY(1); opacity: 1; } }
  @keyframes fade { from { opacity: 0 } to { opacity: 1 } }
  @keyframes slide { from { transform: translateX(-14px); opacity: 0 } to { transform: translateX(0); opacity: 1 } }
  @keyframes pulse { 0%,100% { opacity: .35 } 50% { opacity: 1 } }
  @keyframes widen { from { transform: scaleX(.02); opacity: .25 } to { transform: scaleX(1); opacity: 1 } }
  /* The band is a hint that the list is being read top to bottom, not data: it
     stays translucent so a screenshot taken mid-animation can never be mistaken
     for another bar in the chart. */
  @keyframes sweepdown { 0% { transform: translateY(0); opacity: 0 }
                         15% { opacity: .16 }
                         85% { opacity: .16 }
                         100% { transform: translateY(__SWEEP__px); opacity: 0 } }
  @media (prefers-reduced-motion: reduce) {
    .flow, .grow, .fade, .slide, .pulse, .widen, .sweep { animation: none; }
  }
"""
CSS = (CSS.replace("__INK__", INK).replace("__MUTED__", MUTED).replace("__LINE__", LINE)
          .replace("__BRAND__", BRAND).replace("__ACCENT__", ACCENT)
          # how far the ranking band travels: one row is 26 px, six rows deep
          .replace("__SWEEP__", "156"))


def _esc(t: str) -> str:
    return html.escape(str(t), quote=True)


def _wrap(text: str, limit: int, max_lines: int = 2) -> list[str]:
    """Break a label into at most `max_lines` lines of about `limit` characters.

    Cut at word boundaries and mark a truncated label with an ellipsis: a
    mid-word chop ("Total DNA in the r") reads like a rendering bug rather than
    an abbreviation.
    """
    words = str(text).split()
    lines: list[str] = []
    cur = ""
    for w in words:
        if len(cur) + len(w) + 1 > limit and cur:
            lines.append(cur)
            cur = w
            if len(lines) == max_lines:
                break
        else:
            cur = (cur + " " + w).strip()
    if len(lines) < max_lines and cur:
        lines.append(cur)
    if not lines:
        return [""]
    if len(" ".join(lines)) < len(" ".join(words)):
        lines[-1] = lines[-1][: max(1, limit - 1)].rstrip() + "…"
    return lines[:max_lines]


def _short(v) -> str:
    if v is None:
        return "—"
    try:
        return fmt(float(v))
    except (TypeError, ValueError):
        return _esc(str(v))


def _shell(spec: Spec, title: str, desc: str, body: str) -> str:
    return (
        f'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 {W} {H}" width="{W}" height="{H}" '
        f'role="img" aria-labelledby="t d">\n'
        f"<title id=\"t\">{_esc(title)}</title>\n<desc id=\"d\">{_esc(desc)}</desc>\n"
        f"<style>{CSS}</style>\n"
        f'<rect width="{W}" height="{H}" fill="#ffffff"/>\n{body}\n</svg>\n'
    )


# ------------------------------------------------------------------ layouts

def chain(spec: Spec, ex: dict, caption: str = "") -> str:
    """Inputs on the left, the formula in the middle, the answer on the right."""
    inputs = [(f["key"], f["label"], ex["all"].get(f["key"]), f.get("suffix", ""))
              for f in spec.fields if f["key"] not in ex["outputs"] or not f.get("output")]
    inputs = inputs[:4]
    outs = [(k, label_of(spec, k), v, next((f.get("suffix", "") for f in spec.fields
                                            if f["key"] == k), ""))
            for k, v in ex["outputs"].items()][:2]

    body = [f'<text class="tag" x="28" y="30">Inputs</text>',
            f'<text class="tag" x="452" y="30">Result</text>']
    y = 52
    for i, (key, label, value, unit) in enumerate(inputs):
        body.append(f'<g class="slide" style="animation-delay:{0.08 * i:.2f}s">')
        body.append(f'<rect class="box" x="28" y="{y}" width="212" height="44"/>')
        body.append(f'<text class="lbl" x="40" y="{y + 19}">{_esc(label)}</text>')
        body.append(f'<text class="val" x="40" y="{y + 36}">{_short(value)}'
                    f'<tspan class="small"> {_esc(unit)}</tspan></text>')
        body.append("</g>")
        y += 52
    # the formula spine
    body.append('<path class="flow" d="M250 120 H300"/>')
    body.append(f'<rect x="300" y="70" width="132" height="100" rx="12" fill="#f1f5f9" stroke="{LINE}"/>')
    for i, line in enumerate(_wrap(spec.formula.replace("×", "×").split("=")[-1].strip(), 18)):
        body.append(f'<text class="small" x="366" y="{104 + i * 15}" text-anchor="middle">{_esc(line)}</text>')
    body.append(f'<text class="small" x="366" y="152" text-anchor="middle">worked out for you</text>')
    body.append('<path class="flow" d="M432 120 H480" style="animation-delay:.3s"/>')
    yy = 56
    for i, (key, label, value, unit) in enumerate(outs):
        body.append(f'<g class="fade" style="animation-delay:{0.5 + 0.15 * i:.2f}s">')
        body.append(f'<rect class="boxout" x="480" y="{yy}" width="212" height="{76 if len(outs) == 1 else 64}"/>')
        body.append(f'<text class="lbl" x="494" y="{yy + 22}">{_esc(label)}</text>')
        body.append(f'<text class="val" x="494" y="{yy + 46}" font-size="22">{_short(value)}'
                    f'<tspan class="small"> {_esc(unit)}</tspan></text>')
        body.append("</g>")
        yy += 74
    desc = (f"{spec.name}: the inputs ({', '.join(l for _, l, _, _ in inputs)}) are combined by the "
            f"formula {spec.formula} to give {', '.join(l for _, l, _, _ in outs)}.")
    return _shell(spec, f"{spec.name} — how the answer is built", desc, "\n".join(body))


def gauge(spec: Spec, ex: dict, caption: str = "", scale: tuple[float, float] = (0, 100),
          bands: list[tuple[float, float, str]] | None = None) -> str:
    """A banded scale with a marker gliding to the computed result."""
    lo, hi = scale
    first = next(iter(ex["outputs"].values()), 0.0)
    frac = 0.0 if hi == lo else max(0.0, min(1.0, (first - lo) / (hi - lo)))
    x0, x1, yb = 60, 660, 170
    body = [f'<text class="tag" x="28" y="34">Where the answer sits</text>']
    segs = bands or [(lo, hi, "")]
    for a, b, name in segs:
        xa = x0 + (x1 - x0) * ((a - lo) / (hi - lo) if hi != lo else 0)
        xb = x0 + (x1 - x0) * ((b - lo) / (hi - lo) if hi != lo else 1)
        body.append(f'<rect x="{xa:.1f}" y="{yb}" width="{max(2, xb - xa):.1f}" height="30" '
                    f'fill="#e2e8f0" stroke="#ffffff"/>')
        if name:
            body.append(f'<text class="small" x="{(xa + xb) / 2:.1f}" y="{yb + 48}" '
                        f'text-anchor="middle">{_esc(name)}</text>')
    marker_x = x0 + (x1 - x0) * frac
    body.append(f'<g class="fade" style="animation-delay:.2s">')
    body.append(f'<line x1="{marker_x:.1f}" y1="{yb - 34}" x2="{marker_x:.1f}" y2="{yb + 34}" '
                f'stroke="{BRAND}" stroke-width="3" stroke-linecap="round"/>')
    body.append(f'<circle class="pulse" cx="{marker_x:.1f}" cy="{yb + 15}" r="7" fill="{BRAND}"/>')
    body.append(f'<text class="val" x="{marker_x:.1f}" y="{yb - 44}" text-anchor="middle">'
                f'{_short(first)}</text>')
    body.append("</g>")
    body.append(f'<text class="small" x="{x0}" y="{yb + 74}">{lo:g}</text>')
    body.append(f'<text class="small" x="{x1}" y="{yb + 74}" text-anchor="end">{hi:g}</text>')
    desc = (f"{spec.name}: the computed value {_short(first)} placed on a scale from {lo:g} to {hi:g}"
            + (f", banded as {', '.join(n for _, _, n in bands) if bands else ''}." if bands else "."))
    return _shell(spec, f"{spec.name} — reading the result", desc, "\n".join(body))


def curve(spec: Spec, ex: dict, caption: str = "", samples: list[tuple[float, float]] | None = None,
          axis: tuple[str, str] = ("", "")) -> str:
    """An x–y curve with the current point marked."""
    pts = samples or [(0, 0), (1, 1)]
    xs = [p[0] for p in pts]
    ys = [p[1] for p in pts]
    xmin, xmax, ymin, ymax = min(xs), max(xs), min(ys), max(ys)
    px0, px1, py0, py1 = 70, 650, 60, 240
    def sx(x: float) -> float:
        return px0 + (px1 - px0) * (0 if xmax == xmin else (x - xmin) / (xmax - xmin))
    def sy(y: float) -> float:
        return py1 - (py1 - py0) * (0 if ymax == ymin else (y - ymin) / (ymax - ymin))
    path = "M" + " L".join(f"{sx(x):.1f} {sy(y):.1f}" for x, y in pts)
    body = [f'<path d="M{px0} {py0} V{py1} H{px1}" stroke="{LINE}" fill="none" stroke-width="1.5"/>',
            f'<path d="{path}" stroke="{BRAND}" fill="none" stroke-width="3" stroke-linecap="round" '
            f'class="fade"/>']
    cx, cy = pts[len(pts) // 2]
    body.append(f'<circle class="pulse" cx="{sx(cx):.1f}" cy="{sy(cy):.1f}" r="6" fill="{ACCENT}"/>')
    body.append(f'<text class="small" x="{px0}" y="{py1 + 22}">{_esc(axis[0])}</text>')
    body.append(f'<text class="small" x="{px0 - 8}" y="{py0 - 12}" text-anchor="start">{_esc(axis[1])}</text>')
    desc = (f"{spec.name}: {caption or 'the shape of the relationship'} — "
            f"{axis[1]} against {axis[0]}.")
    return _shell(spec, f"{spec.name} — the shape of the relationship", desc, "\n".join(body))


def bars(spec: Spec, ex: dict, caption: str = "", series: list[tuple[str, float]] | None = None) -> str:
    """Bars that grow, for anything comparative."""
    data = series or [(label_of(spec, k), v) for k, v in ex["outputs"].items()][:5]
    top = max((abs(v) for _, v in data), default=1) or 1
    body = [f'<text class="tag" x="28" y="32">{_esc(caption or "Result in context")}</text>']
    slot = 560 / max(1, len(data))
    for i, (label, value) in enumerate(data):
        h = 150 * abs(value) / top
        x = 80 + i * slot
        body.append(f'<rect class="grow" style="animation-delay:{0.1 * i:.2f}s" x="{x:.1f}" '
                    f'y="{210 - h:.1f}" width="{slot * 0.56:.1f}" height="{h:.1f}" rx="6" fill="{BRAND}" opacity="0.9"/>')
        body.append(f'<text class="val" x="{x + slot * 0.28:.1f}" y="{200 - h:.1f}" text-anchor="middle">'
                    f'{_short(value)}</text>')
        # Labels wrap onto at most two lines and are cut at a word boundary:
        # a mid-word chop ("Total DNA in the r") reads like a rendering bug.
        lines = _wrap(label, 16, 2)
        spans = "".join(
            f'<tspan x="{x + slot * 0.28:.1f}" dy="{0 if i == 0 else 13}">{_esc(t)}</tspan>'
            for i, t in enumerate(lines))
        body.append(f'<text class="small" x="{x + slot * 0.28:.1f}" y="232" text-anchor="middle">'
                    f'{spans}</text>')
    body.append(f'<line x1="60" y1="210" x2="660" y2="210" stroke="{LINE}" stroke-width="1.5"/>')
    desc = (f"{spec.name}: {caption or 'results compared'} — "
            + "; ".join(f"{l} = {_short(v)}" for l, v in data) + ".")
    return _shell(spec, f"{spec.name} — results compared", desc, "\n".join(body))


def grid(spec: Spec, ex: dict, caption: str = "", cells: list[list[str]] | None = None) -> str:
    """A small matrix: Punnett squares, genotype tables, dilution grids."""
    data = cells or [["", "A", "a"], ["A", "AA", "Aa"], ["a", "Aa", "aa"]]
    size = 64
    ox, oy = 250, 70
    body = [f'<text class="tag" x="28" y="32">{_esc(caption or "The cross, square by square")}</text>']
    for r, row in enumerate(data):
        for c, cell in enumerate(row):
            x, y = ox + c * size, oy + r * size
            fill = "#f1f5f9" if r == 0 or c == 0 else "#eff6ff"
            stroke = LINE if r == 0 or c == 0 else BRAND
            body.append(f'<rect class="fade" style="animation-delay:{(r + c) * 0.06:.2f}s" x="{x}" y="{y}" '
                        f'width="{size}" height="{size}" fill="{fill}" stroke="{stroke}" stroke-width="1.4"/>')
            body.append(f'<text class="val" x="{x + size / 2}" y="{y + size / 2 + 6}" text-anchor="middle">'
                        f'{_esc(cell)}</text>')
    desc = f"{spec.name}: a grid of {len(data) - 1} by {len(data[0]) - 1} outcomes."
    return _shell(spec, f"{spec.name} — outcomes in a grid", desc, "\n".join(body))



def rows(spec: Spec, ex: dict, caption: str = "", series: list[tuple[str, float]] | None = None,
         sort: bool = True) -> str:
    """Ranked horizontal bars — the second animation style.

    The vertical `bars` chart is fine for three or four values. These tools
    produce lists of six to ten (enzymes, codons, candidates), and at that
    length a column chart forces the labels onto two cramped lines and makes the
    reader compare heights across a gap. A ranked row chart sorts them, writes
    the value at the end of each bar, and animates differently: every bar grows
    from the left in rank order while a translucent band sweeps down the list,
    so the eye is led through the ranking instead of waiting for the tallest
    column to finish rising.
    """
    data = series or [(label_of(spec, k), v) for k, v in ex["outputs"].items()]
    # A series whose labels are positions ("1–30", "31–60") must keep the order
    # it was given, or the chart tells a different story than the data.
    if sort:
        data = sorted(data, key=lambda kv: -abs(kv[1]))
    data = data[:6]
    top = max((abs(v) for _, v in data), default=1) or 1
    body = [f'<text class="tag" x="28" y="30">{_esc(caption or "Ranked, largest first")}</text>']
    row_h, gap, x0, width = 20, 6, 220, 380
    height = len(data) * (row_h + gap)
    body.append(f'<rect class="sweep" x="{x0 - 20}" y="46" width="{width + 20}" height="{row_h + 4}" '
                f'rx="6" fill="{ACCENT}" opacity="0"/>')
    for i, (label, value) in enumerate(data):
        y = 52 + i * (row_h + gap)
        w = width * abs(value) / top
        lines = _wrap(label, 26, 1)
        body.append(f'<text class="lbl" x="28" y="{y + 15}" text-anchor="start">{_esc(lines[0])}</text>')
        body.append(f'<rect x="{x0}" y="{y}" width="{width}" height="{row_h}" rx="5" fill="#f1f5f9"/>')
        # A zero draws no bar at all: a 2 px stub next to a "0" reads as a
        # rendering artefact rather than as "none of these".
        if w >= 1:
            body.append(f'<rect class="widen" style="animation-delay:{0.09 * i:.2f}s" x="{x0}" y="{y}" '
                        f'width="{w:.1f}" height="{row_h}" rx="5" fill="{BRAND}" opacity="0.92"/>')
        body.append(f'<text class="val" x="{x0 + max(w, 0) + 10:.1f}" y="{y + 16}">{_short(value)}</text>')
    body.append(f'<text class="tick" x="{x0}" y="{52 + height + 18}">0</text>')
    body.append(f'<text class="tick" x="{x0 + width}" y="{52 + height + 18}" text-anchor="end">'
                f'{_short(top)}</text>')
    desc = (f"{spec.name}: {caption or 'ranked largest first'} — "
            + "; ".join(f"{l} {_short(v)}" for l, v in data) + ".")
    return _shell(spec, f"{spec.name} — ranked, largest first", desc, "\n".join(body))


RENDERERS = {"chain": chain, "gauge": gauge, "curve": curve, "bars": bars, "grid": grid,
             "rows": rows}


def render(spec: Spec, ex: dict) -> str:
    kind, opts = spec.svg
    fn = RENDERERS.get(kind, chain)
    kwargs = {k: v for k, v in opts.items() if k in fn.__code__.co_varnames}
    return fn(spec, ex, **kwargs)
