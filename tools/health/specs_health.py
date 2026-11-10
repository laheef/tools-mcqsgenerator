"""The health category's authored specs.

A spec belongs to the category its page lives in. `mean-arterial-pressure` was
written in the biology set although its page is /health/mean-arterial-pressure,
so no biology build ever wrote it and the health page stayed a harvested shell
with no equations at all. It lives here now, next to the page it describes.

    python3 tools/health/build_page.py
"""

from __future__ import annotations

import sys
from pathlib import Path

sys.path.insert(0, str(Path(__file__).resolve().parents[1] / "biology"))

from lib import Spec, num, d  # noqa: E402,F401

SPECS: list[Spec] = []


def add(spec: Spec) -> None:
    spec.category = "health"
    SPECS.append(spec)


add(Spec(
    name="Mean Arterial Pressure Calculator",
    slug="mean-arterial-pressure",
    summary=("Mean arterial pressure is the average pressure driving blood through the organs across "
             "the cardiac cycle. Because diastole lasts about twice as long as systole it sits closer "
             "to the diastolic value, which is why MAP ≈ (SBP + 2 × DBP) ÷ 3."),
    fields=[
        num("sbp", "Systolic pressure", 120, "mmHg", ""),
        num("dbp", "Diastolic pressure", 80, "mmHg", ""),
        num("map_mmhg", "Mean arterial pressure", "", "mmHg", "", output=True),
        num("pulse", "Pulse pressure", "", "mmHg", "", output=True),
        num("hypo", "Distance above the 65 mmHg perfusion floor", "", "mmHg", "", output=True),
        num("rate_pressure", "Rate-pressure product", "", "", "", output=True),
    ],
    dirs=[
        d("Pressure", "map_mmhg", "(sbp+2*dbp)/3"),
        d("Pressure", "pulse", "sbp-dbp"),
        d("Pressure", "hypo", "(sbp+2*dbp)/3-65"),
        d("Pressure", "rate_pressure", "sbp*70"),
    ],
    formula="MAP = (SBP + 2 × DBP) ÷ 3",
    symbols=[("SBP", "systolic pressure", "mmHg"),
             ("DBP", "diastolic pressure", "mmHg"),
             ("MAP", "mean arterial pressure", "mmHg")],
    bands=[("below 65 mmHg", "Inadequate perfusion", "organ hypoperfusion; the usual resuscitation target is 65"),
           ("65 – 70", "Minimum target", "accepted in most critically ill adults"),
           ("70 – 100", "Normal", "typical resting range"),
           ("above 100", "Elevated", "hypertension or increased vascular resistance")],
    notes=[
        "The two-thirds weight on diastolic pressure is an approximation of the shape of the arterial "
        "waveform, not a physical average.",
        "MAP is what organs actually see; a systolic of 90 with a diastolic of 60 gives a MAP of 70, "
        "which is adequate, while 160/50 gives 87 with a very different physiology.",
        "Pulse pressure (SBP − DBP) rises with arterial stiffness and is itself a cardiovascular risk "
        "marker in older adults.",
    ],
    mistakes=[
        "Averaging systolic and diastolic with equal weight.",
        "Using a cuff that is too small, which overestimates both pressures.",
        "Treating MAP as a substitute for clinical assessment of perfusion.",
    ],
    sources=["The (SBP + 2·DBP)/3 approximation is the standard clinical estimate of mean arterial "
             "pressure."],
    faq=[
        ("What is a normal MAP?",
         "About 70–100 mmHg at rest; 65 mmHg is the usual floor for organ perfusion."),
        ("Why not use the true average?",
         "It requires the arterial waveform; the weighted formula is close enough for clinical use."),
    ],
    related=[("/health/blood-pressure", "Blood pressure"),
             ("/biology/acid-base-balance", "Acid-base balance"),
             ("/health/ecg-heart-rate", "ECG heart rate")],
    svg=("gauge", {"caption": "Systolic, diastolic and the mean that drives perfusion."}),
    icon="heart",
))

# The page that uses this spec.
BY_SLUG = {s.slug: s for s in SPECS}
