"""

Everyday-life batch D: the date family.

Fourteen pages built on calendar arithmetic: the fixed-span pages (30, 45, 60,
90, 120, 180 and 100 days), the month-based page that clamps at month ends, the
countdowns, the leap-year check, working days and the two anniversary pages.

A date reaches a formula as a day number, so `date + 30` is thirty days later
and `mod(date + 3, 7)` is its weekday with Monday as zero. None of these
definitions spell a millisecond literal, which is what keeps the day numbers
coming (Solver::formulaUnits).

"""

from __future__ import annotations

from lib import D, F, R, RD, S, SEL

SPECS: list = []


# ---------------------------------------------------------- the fixed spans
#
# Seven pages share one shape: a date in, the date that many days later and
# earlier out, and the weekday the later date falls on. They are separate pages
# because "30 days from now" and "90 days from now" are different questions in
# law, in credit terms and in travel rules, and each article is about its own
# rule rather than about the arithmetic.

def span(slug: str, days: int, name: str, title: str, desc: str, what: str,
         why: str, rule: str, reading: str, example_note: str,
         pitfalls: list, limits: list, uses: list, scenarios: list,
         faq: list, related: list, checks: list) -> dict:
    return S(
        slug=slug,
        name=name,
        title=title,
        desc=desc,
        what=what,
        fields=[D("date", "Starting date", "2026-10-23")],
        results=[
            RD("after", f"{days} days later"),
            RD("before", f"{days} days earlier"),
            R("weekday", f"Weekday {days} days later (1 is Monday)", ""),
        ],
        formula={
            "after": f"date + {days}",
            "before": f"date - {days}",
            "weekday": f"mod(date + {days + 3}, 7) + 1",
        },
        prose={
            "why": why,
            "formula_note": (f"The later date is the starting day number plus {days}; the "
                             f"earlier one is the same subtraction the other way. Both are "
                             f"calendar days, so a month boundary costs nothing: {days} days "
                             f"after 15 January is a date in February whatever February's "
                             f"length happens to be."),
            "reading": reading,
            "example_note": example_note,
            "pitfalls": pitfalls,
            "limits": limits,
            "uses": uses,
            "scenarios": scenarios,
        },
        faq=faq,
        related=related,
        checks=checks,
    )


SPECS.append(span(
    slug="30-day",
    days=30,
    name="30 Days From a Date Calculator",
    title="30 Days From a Date — Date, Weekday and Backwards",
    desc="Thirty days after a date and thirty days before it, with the weekday the later date "
         "falls on, for credit terms, notice and returns written in days. Formula shown.",
    what="The date thirty days from any starting date, the date thirty days before it, and the "
         "weekday the later one lands on. A month boundary changes nothing; the count is days.",
    why="<p>Thirty days is the rhythm of a dozen everyday rules: a credit term, a return "
        "window, a notice period, a doctor's follow-up. The awkward part is never the "
        "arithmetic, it is the calendar. Thirty days after 31 January is in March, and thirty "
        "days after 15 March lands on 14 April, because March has thirty-one days and April "
        "has thirty.</p>"
        "<p>This page works in days, not months. That is the point: a term written as thirty "
        "days is a different promise from a term written as one month, and the two drift apart "
        "four or five days every quarter.</p>",
    rule="",
    reading="30 days after 23 October 2026 is 22 November 2026, a Sunday, and 30 days before "
           "it is 23 September 2026. The count crosses two month boundaries and neither of "
           "them changes the answer by a day.",
    example_note="Written down, a thirty-day term is safest as two dates. \"Within thirty days "
                 "of the invoice\" is the version that gets argued about.",
    pitfalls=[
        "<strong>Reading it as one month.</strong> Thirty days after 30 January is 1 March "
        "in a non-leap year; one month after 30 January is 28 February.",
        "<strong>Counting the starting day.</strong> The span is a subtraction, so the day "
        "you start on is day zero and the thirtieth day is the answer.",
    ],
    limits=[
        "<li><strong>Calendar days, not working days.</strong> Weekends and holidays count; "
        "the working-days page is the other count.</li>",
    ],
    uses=[
        "<li>Dating a credit invoice due in thirty days.</li>",
        "<li>Setting the end of a thirty-day return window.</li>",
    ],
    scenarios=[
        {"inputs": {"date": "2026-01-31"},
         "note": "Thirty days after the last day of January lands on 2 March, because February "
                 "is short: the month boundary is where a hand count goes wrong."},
    ],
    faq=[
        ("Is thirty days the same as one month?",
         "Only in the months that have thirty days. Otherwise the two drift, and a contract "
         "that says both is a contract with two answers."),
        ("Does the starting date count as day one?",
         "No. The answer is thirty days after it, so the starting date is day zero."),
        ("Why show the weekday?",
         "Because a deadline that falls on a Sunday is usually moved, and the weekday is the "
         "first thing you need to know about it."),
    ],
    related=[("/everyday-life/add-days", "Add days"),
             ("/everyday-life/45-day", "45 days from a date"),
             ("/everyday-life/60-day", "60 days from a date")],
    checks=[
        ({"date": "2026-10-23"}, {"after": 20779, "before": 20719, "weekday": 7}, 0.01),
        ({"date": "2026-01-31"}, {"after": 20514, "before": 20454, "weekday": 1}, 0.01),
    ],
))

SPECS.append(span(
    slug="45-day",
    days=45,
    name="45 Days From a Date Calculator",
    title="45 Days From a Date — Date, Weekday and Six Weeks",
    desc="The date forty-five days after any day, the date forty-five days before it and the "
         "weekday it lands on, for notice periods and six-week deadlines. Formula shown.",
    what="Forty-five days forward and back from a date. Six weeks and three days, which is why "
         "a notice period is often written this way: it is long enough to be a real period and "
         "short enough to be enforceable.",
    why="<p>Forty-five days is six weeks and three days, and that half week is the whole reason "
        "the number appears in contracts. A period written in weeks always lands on the same "
        "weekday; forty-five days drifts by three every time, so the deadline moves through the "
        "calendar and nobody can claim it was chosen to suit one side.</p>"
        "<p>Used in tenancy notice, in some employment notice periods and in construction "
        "payment rules, the count has to be exact to the day. This page gives the date both "
        "ways round and the weekday it falls on.</p>",
    rule="",
    reading="45 days after 23 October 2026 is 7 December 2026, a Monday; 45 days before it is "
           "8 September 2026. The forward count crosses the end of the year only if you start "
           "in November.",
    example_note="If a notice period has to expire on a weekday, start counting from the "
                 "receiving date and check the weekday line before you send anything.",
    pitfalls=[
        "<strong>Confusing it with six weeks.</strong> Forty-five days is three days longer. "
        "From a Monday, six weeks lands on a Monday and forty-five days lands on a Thursday.",
        "<strong>Counting the day of service.</strong> Most rules exclude it; the page treats "
        "the starting date as day zero, which matches the usual reading.",
    ],
    limits=[
        "<li><strong>Calendar days throughout.</strong> A period that pauses for holidays is a "
        "different rule and needs a calendar, not this page.</li>",
    ],
    uses=[
        "<li>Dating the expiry of a forty-five day notice period.</li>",
        "<li>Checking a six-week deadline written as a day count.</li>",
    ],
    scenarios=[
        {"inputs": {"date": "2026-12-01"},
         "note": "45 days after 1 December is 15 January, so the count runs over the new year "
                 "and the year in the answer is not the year you started in."},
    ],
    faq=[
        ("Is forty-five days six weeks?",
         "No, it is six weeks and three days. If a rule says six weeks, forty-five days is "
         "three days too long."),
        ("Why does the holiday period matter?",
         "Because calendar days keep counting through it. Only a rule that names working days "
         "stops at weekends."),
        ("Can I count backwards for a reminder date?",
         "Yes. The earlier date line is the same calculation in reverse, which is how a "
         "diary reminder is set."),
    ],
    related=[("/everyday-life/30-day", "30 days from a date"),
             ("/everyday-life/60-day", "60 days from a date"),
             ("/everyday-life/add-days", "Add days")],
    checks=[
        ({"date": "2026-10-23"}, {"after": 20794, "before": 20704, "weekday": 1}, 0.01),
        ({"date": "2026-12-01"}, {"after": 20833, "before": 20743, "weekday": 5}, 0.01),
    ],
))

SPECS.append(span(
    slug="60-day",
    days=60,
    name="60 Days From a Date Calculator",
    title="60 Days From a Date — Date, Weekday and Returns",
    desc="Sixty days after and sixty days before any date, with the weekday of the later one, "
         "for return windows, cooling-off periods and two-month deadlines. Formula shown.",
    what="Two months' worth of calendar days from a starting date, both directions, with the "
         "weekday the later date falls on. Sixty days, not two months: the page is deliberate "
         "about which one it computes.",
    why="<p>Sixty days is what a rule says when the drafters wanted two months but did not want "
        "the calendar deciding which two. Sixty days after 31 March is 30 May; two months after "
        "31 March is 31 May. The page gives the day count so the answer cannot depend on which "
        "months the span happens to touch.</p>"
        "<p>Return windows, cooling-off periods and insurance deadlines are the usual places it "
        "turns up. Both directions are on the page because the second direction is how you find "
        "out whether a deadline that has already passed was inside the window.</p>",
    rule="",
    reading="60 days after 23 October 2026 is 22 December 2026, a Tuesday, and 60 days before it "
           "is 24 August 2026. The forward direction crosses two month ends; the backward one "
           "crosses three.",
    example_note="A return window is usually counted from delivery, not from order, so the "
                 "starting date to type is the delivery date.",
    pitfalls=[
        "<strong>Using the order date.</strong> Most windows run from delivery or receipt, "
        "which is days later than the order.",
        "<strong>Reading it as two calendar months.</strong> The difference is a day or two, "
        "and a day or two is exactly what a disputed deadline turns on.",
    ],
    limits=[
        "<li><strong>No working-day pause.</strong> Every day counts, including public "
        "holidays.</li>",
    ],
    uses=[
        "<li>Dating the end of a sixty-day return window.</li>",
        "<li>Checking whether a cooling-off period has expired.</li>",
    ],
    scenarios=[
        {"inputs": {"date": "2026-03-31"},
         "note": "Sixty days after 31 March is 30 May, where two months would give 31 May: a "
                 "single day, and the kind of day that decides an argument."},
    ],
    faq=[
        ("Why not just say two months?",
         "Because months are not a fixed length. Sixty days is a promise; two months is a "
         "promise with a variable in it."),
        ("Does a weekend at the end extend the deadline?",
         "Only if the rule says so. This page returns the day itself, weekend or not."),
        ("Can it count from a future date?",
         "Yes. The starting date is whatever you type, so a reminder can be dated from the "
         "expected delivery."),
    ],
    related=[("/everyday-life/45-day", "45 days from a date"),
             ("/everyday-life/90-day", "90 days from a date"),
             ("/everyday-life/add-days", "Add days")],
    checks=[
        ({"date": "2026-10-23"}, {"after": 20809, "before": 20689, "weekday": 2}, 0.01),
        ({"date": "2026-03-31"}, {"after": 20603, "before": 20483, "weekday": 6}, 0.01),
    ],
))

SPECS.append(span(
    slug="90-day",
    days=90,
    name="90 Days From a Date Calculator",
    title="90 Days From a Date — Date, Weekday and Quarter",
    desc="Ninety days after and before a date, with the weekday it lands on, for travel rules, "
         "probation periods and any deadline written as a quarter. Formula shown.",
    what="A quarter of a year counted in days rather than months, in both directions. Ninety "
         "days is the number a customs officer, a probation clause and a clinical trial all use "
         "for the same reason: it is long enough to matter and short enough to enforce.",
    why="<p>Ninety days is the most quoted number in travel after thirty. A visitor staying "
        "ninety days in a rolling period is not the same as three months, because three months "
        "can be ninety-two days and the rule is written in days.</p>"
        "<p>Probation periods and payment terms use the same figure. The page returns the date "
        "ninety days forward and ninety days back, with the weekday, so a deadline can be "
        "checked against a diary rather than counted on fingers.</p>",
    rule="",
    reading="90 days after 23 October 2026 is 21 January 2027, a Thursday, and 90 days before it "
           "is 25 July 2026. A quarter of a year, near enough, but never exactly a calendar "
           "quarter.",
    example_note="For a rolling travel rule, the ninety days are counted back from the day of "
                 "entry rather than forward from the first visit, so the earlier date line is "
                 "the one to read.",
    pitfalls=[
        "<strong>Treating ninety days as three months.</strong> A quarter can be ninety or "
        "ninety-two days, and only one of them matches the rule.",
        "<strong>Counting the first day of the stay.</strong> Most rules count nights or "
        "arrival-day-excluded days, which is one day less than a naive count.",
    ],
    limits=[
        "<li><strong>One span at a time.</strong> The rolling version of the travel rule adds "
        "up several spans, which needs a calendar.</li>",
    ],
    uses=[
        "<li>Dating the end of a ninety-day probation.</li>",
        "<li>Checking a ninety-day payment term.</li>",
    ],
    scenarios=[
        {"inputs": {"date": "2026-11-05"},
         "note": "90 days after 5 November is 3 February, which shows the year changing under "
                 "the count."},
    ],
    faq=[
        ("Is ninety days three months?",
         "Approximately. January to March is ninety days in a non-leap year, February to April "
         "is ninety-two. The rule is written in days for that reason."),
        ("Does the page handle a stay that starts at a time of day?",
         "It counts whole days. A rule counted to the hour belongs on the time-between-dates "
         "page."),
        ("What about the return date for a visa?",
         "Count forward from the entry date, or back from the day you intend to leave. Both "
         "lines are on the page."),
    ],
    related=[("/everyday-life/60-day", "60 days from a date"),
             ("/everyday-life/120-day", "120 days from a date"),
             ("/everyday-life/add-days", "Add days")],
    checks=[
        ({"date": "2026-10-23"}, {"after": 20839, "before": 20659, "weekday": 4}, 0.01),
        ({"date": "2026-11-05"}, {"after": 20852, "before": 20672, "weekday": 3}, 0.01),
    ],
))

SPECS.append(span(
    slug="120-day",
    days=120,
    name="120 Days From a Date Calculator",
    title="120 Days From a Date — Date, Weekday and Four Months",
    desc="The date 120 days after and before any day, with the weekday it lands on, for "
         "four-month terms, extension windows and project milestones. Formula shown.",
    what="Four months' worth of days in both directions. Used where a rule wants a third of a "
         "year without the calendar deciding which third.",
    why="<p>One hundred and twenty days is the number behind a good deal of paperwork: an "
        "application window, an extension notice, a milestone in a schedule, a retention "
        "period. It is also the point where people stop counting on fingers and start guessing, "
        "which is where a deadline quietly moves by a week.</p>"
        "<p>The page gives both directions. Forwards is when something expires; backwards is "
        "when it must have started in order to expire now, which is the question that actually "
        "comes up in an audit.</p>",
    rule="",
    reading="120 days after 23 October 2026 is 20 February 2027, a Saturday, and 120 days before "
           "it is 25 June 2026. Four calendar months would be 23 February, three days later.",
    example_note="A Saturday landing is worth noticing: an extension clause that says \"120 days\" "
                 "without saying what happens at a weekend leaves the last three days in doubt.",
    pitfalls=[
        "<strong>Assuming four months.</strong> The gap grows by a day for every month that has "
        "thirty rather than thirty-one.",
        "<strong>Counting from the wrong event.</strong> An extension window usually runs from "
        "notice given, not from the original deadline.",
    ],
    limits=[
        "<li><strong>Days only.</strong> A term written as \"four calendar months\" is the "
        "six-month page's neighbour and clamps at month ends.</li>",
    ],
    uses=[
        "<li>Dating the end of a four-month extension window.</li>",
        "<li>Working out when a 120-day process must have begun.</li>",
    ],
    scenarios=[
        {"inputs": {"date": "2026-02-28"},
         "note": "120 days after the last day of February is 28 June, which is the check that "
                 "the count does not stumble over the short month."},
    ],
    faq=[
        ("Is 120 days the same as four months?",
         "No. Four calendar months is 120 to 123 days, depending on which months they are."),
        ("Why does the weekday matter?",
         "Because a deadline that falls on a weekend often moves by rule, and you need the "
         "weekday to know whether that applies."),
        ("Can I use it for a project milestone?",
         "Yes. Type the start date and read the later date; the day count is the same whether "
         "the span is contractual or personal."),
    ],
    related=[("/everyday-life/90-day", "90 days from a date"),
             ("/everyday-life/180-day", "180 days from a date"),
             ("/everyday-life/6-month", "Six months from a date")],
    checks=[
        ({"date": "2026-10-23"}, {"after": 20869, "before": 20629, "weekday": 6}, 0.01),
        ({"date": "2026-02-28"}, {"after": 20632, "before": 20392, "weekday": 7}, 0.01),
    ],
))

SPECS.append(span(
    slug="180-day",
    days=180,
    name="180 Days From a Date Calculator",
    title="180 Days From a Date — Date, Weekday and Half Year",
    desc="Half a year counted in days, forwards and back, with the weekday the later date "
         "falls on, for six-month rules, visitor stays and half-year terms. Formula shown.",
    what="180 days either side of a starting date. The half-year that tax rules, visa rules and "
         "warranty terms actually mean when they write the period in days.",
    why="<p>A half year sounds exact and is not. Six calendar months run from 181 to 184 days, "
        "and a rule that means half a year often writes 180 to avoid the argument. Tax "
        "residency tests, warranty periods and visitor rules all use the day count.</p>"
        "<p>The page gives the date half a year forward in days and the date that is half a year "
        "behind, which is how you check whether a period that ends today began inside the "
        "window.</p>",
    rule="",
    reading="180 days after 23 October 2026 is 21 April 2027, a Wednesday, and 180 days before it "
           "is 26 April 2026. Six calendar months would be 23 April, two days later.",
    example_note="Half-year terms are common in rentals and warranties; both are better dated "
                 "than counted, and the earlier date line is what makes the second date "
                 "checkable.",
    pitfalls=[
        "<strong>Assuming six months.</strong> Two extra days is enough to fall outside a "
        "180-day rule that a six-month reading would have met.",
        "<strong>Forgetting a leap day.</strong> A span that contains 29 February is a day "
        "longer in calendar terms and no different in day count.",
    ],
    limits=[
        "<li><strong>One span.</strong> A rolling 180-day rule across several stays needs a "
        "calendar, not a single subtraction.</li>",
    ],
    uses=[
        "<li>Dating the end of a six-month warranty written in days.</li>",
        "<li>Checking whether a half-year period has expired.</li>",
    ],
    scenarios=[
        {"inputs": {"date": "2026-01-01"},
         "note": "Half a year in days from 1 January is 30 June, not 1 July: the day count and "
                 "the month count disagree at exactly this point."},
    ],
    faq=[
        ("Why 180 and not 182?",
         "Because 180 is the number legislators and insurers settled on, and a rule is only "
         "as good as the number written in it."),
        ("Does it include the starting day?",
         "No. The starting date is day zero and the answer is 180 days later."),
        ("Can I count backwards to a start?",
         "Yes, that is what the earlier date line is for."),
    ],
    related=[("/everyday-life/120-day", "120 days from a date"),
             ("/everyday-life/6-month", "Six months from a date"),
             ("/everyday-life/add-days", "Add days")],
    checks=[
        ({"date": "2026-10-23"}, {"after": 20929, "before": 20569, "weekday": 3}, 0.01),
        ({"date": "2026-01-01"}, {"after": 20634, "before": 20274, "weekday": 2}, 0.01),
    ],
))

SPECS.append(span(
    slug="100-day",
    days=100,
    name="100 Days From a Date Calculator",
    title="100 Days From a Date — Date, Weekday and Countdown",
    desc="One hundred days after a date and one hundred before it, with the weekday it lands "
         "on, for school terms, projects and the 100-day countdown. Formula shown.",
    what="A round hundred days in both directions from any date. The countdown shape is the "
         "familiar one: a hundred days from a first day of term, a launch or a diagnosis.",
    why="<p>A hundred days is a round number that does not sit on any calendar boundary, which "
        "is why it turns up in schools, in politics and in personal countdowns. It is also "
        "fourteen weeks and two days, so a hundred-day plan never lands on the same weekday it "
        "started on.</p>"
        "<p>Both directions are on the page. Forward is the milestone; backward answers the "
        "question \"what was day one, if today is day one hundred\".</p>",
    rule="",
    reading="100 days after 23 October 2026 is 31 January 2027, a Sunday, and 100 days before it "
           "is 15 July 2026. The forward date is four days short of a third of a year.",
    example_note="Day one is usually the first full day, so a countdown that starts on a partial "
                 "day is a day behind by the end. Type the first full day.",
    pitfalls=[
        "<strong>Counting the launch day as day one.</strong> If day one is day zero, the "
        "hundredth day is the date this page returns.",
        "<strong>Expecting the same weekday.</strong> A hundred days is fourteen weeks and two "
        "days, so the weekday moves by two.",
    ],
    limits=[
        "<li><strong>No working-day count.</strong> School terms are often written in days but "
        "counted in school days, which is a different figure.</li>",
    ],
    uses=[
        "<li>A hundred-day plan from a start date.</li>",
        "<li>Finding day one when today is day one hundred.</li>",
    ],
    scenarios=[
        {"inputs": {"date": "2026-09-01"},
         "note": "A hundred days from 1 September is 10 December, which is how a term-length "
                 "countdown is dated."},
    ],
    faq=[
        ("Is a hundred days fourteen weeks?",
         "Fourteen weeks and two days. That is why the weekday of the finish line differs from "
         "the start."),
        ("Do I count the first day?",
         "The page counts the starting date as day zero. If your convention makes it day one, "
         "the hundredth day is one day earlier than the answer."),
        ("Can I use it for a school term?",
         "Yes, though a term counted in school days will come out shorter, because weekends do "
         "not count."),
    ],
    related=[("/everyday-life/90-day", "90 days from a date"),
             ("/everyday-life/120-day", "120 days from a date"),
             ("/everyday-life/add-days", "Add days")],
    checks=[
        ({"date": "2026-10-23"}, {"after": 20849, "before": 20649, "weekday": 7}, 0.01),
        ({"date": "2026-09-01"}, {"after": 20797, "before": 20597, "weekday": 4}, 0.01),
    ],
))

# ------------------------------------------------------------------ 6 months

SPECS.append(S(
    slug="6-month",
    name="Six Months From a Date Calculator",
    title="Six Months From a Date — Calendar Months, Not Days",
    desc="Six calendar months after a date and six before it, with the weekday, and the day "
         "clamped when the target month is shorter. The calendar-honest half year.",
    what="Six calendar months, not 180 days. The page keeps the day of the month and clamps it "
         "at the end of a short month, which is how a contract counts a half year.",
    fields=[
        D("date", "Starting date", "2026-10-23"),
    ],
    results=[
        RD("after", "Six months later"),
        RD("before", "Six months earlier"),
        R("weekday", "Weekday six months later (1 is Monday)", ""),
    ],
    formula={
        "after": "dateAtMonthsOld(date, 6)",
        "before": "dateAtMonthsOld(date, -6)",
        "weekday": "mod(dateAtMonthsOld(date, 6) + 3, 7) + 1",
    },
    prose={
        "why": "<p>A half-year tenancy that starts on the thirty-first has to end on a date that "
               "exists. Six months after 31 August is the end of February, not a thirty-first of "
               "February, and every calendar library in the world clamps the same way.</p>"
               "<p>This page keeps the day of the month and clamps only when it has to, which is "
               "the rule a contract means when it says \"six months\". The 180-day page is the "
               "one to use when the rule is written in days instead.</p>",
        "formula_note": "The month is moved by six and the day is kept, unless the target month "
                        "is shorter, in which case the day is clamped to the last day of that "
                        "month. Moving back six months uses the same rule in the other "
                        "direction.",
        "reading": "Six months after 23 October 2026 is 23 April 2027, a Friday, and six months "
                   "earlier is 23 April 2026. Starting on 31 August gives 28 February, because "
                   "February has no thirty-first.",
        "example_note": "The clamp is the interesting case: type 31 August and watch the later "
                        "date come back as the last day of February rather than an error.",
        "pitfalls": [
            "<strong>Expecting a thirty-first every time.</strong> February, April, June, "
            "September and November never have one.",
            "<strong>Confusing it with 180 days.</strong> A half year in months is 181 to 184 "
            "days; a rule written in days does not move.",
        ],
        "limits": [
            "<li><strong>Whole months only.</strong> A period of six months and two weeks needs "
            "the add-days page after this one.</li>",
        ],
        "uses": [
            "<li>A six-month tenancy or licence.</li>",
            "<li>A warranty period written as six months.</li>",
        ],
        "scenarios": [
            {"inputs": {"date": "2026-08-31"},
             "note": "31 August plus six months is 28 February: the day is clamped to the end "
                     "of the shorter month rather than spilling into March."},
        ],
    },
    faq=[
        ("Why not just add 180 days?",
         "Because a contract that says six months means six calendar months. The day count and "
         "the month count differ by a day or four depending on which months they cross."),
        ("What happens on 29 February?",
         "Six months after 29 February is 29 August, which exists. The clamp only bites when "
         "the target month is shorter than the starting day."),
        ("Does moving back six months clamp the same way?",
         "Yes. 31 March back six months is 30 September, because September has thirty days."),
    ],
    related=[("/everyday-life/180-day", "180 days from a date"),
             ("/everyday-life/month-counter", "Month counter"),
             ("/everyday-life/add-days", "Add days")],
    checks=[
        ({"date": "2026-10-23"}, {"after": 20931, "before": 20566, "weekday": 5}, 0.01),
        ({"date": "2026-08-31"}, {"after": 20877, "before": 20512, "weekday": 7}, 0.01),
    ],
))

# ---------------------------------------------------------------- days until

SPECS.append(S(
    slug="days-until",
    name="Days Until Calculator",
    title="Days Until a Date — Days, Weeks and the Weekday",
    desc="How many days until any date, with the weeks and days left over and the weekday it "
         "falls on, for holidays, deadlines and the date you keep counting to.",
    what="The distance from one date to a later one, in days and in weeks, with the weekday of "
         "the target. A negative answer means the date has already passed.",
    fields=[
        D("today", "From", "2026-10-23"),
        D("target", "Until", "2027-01-01"),
    ],
    results=[
        R("days", "Days until", "days"),
        R("weeks", "Weeks until", "weeks"),
        R("weekday", "Weekday of the target (1 is Monday)", ""),
    ],
    formula={
        "days": "target - today",
        "weeks": "(target - today) / 7",
        "weekday": "mod(target + 3, 7) + 1",
    },
    prose={
        "why": "<p>Counting to a date is the one calculation everybody does badly in their head. "
               "The mistake is not the subtraction, it is the month boundaries: three days at "
               "the end of January plus the whole of February is not a number anyone carries "
               "accurately.</p>"
               "<p>The page takes two dates and returns the distance, the same distance in "
               "weeks, and the weekday of the target. The weekday matters more than it looks: "
               "a deadline that falls on a Sunday is usually moved by a day, and a holiday that "
               "falls on a Monday is a long weekend.</p>",
        "formula_note": "A date is a day number, so the distance is a subtraction and the weeks "
                        "line is that subtraction divided by seven. The weekday comes from the "
                        "day number modulo seven, offset so that Monday is one.",
        "reading": "From 23 October 2026 to 1 January 2027 is 70 days, or 10 weeks exactly, and "
                   "the first of January is a Friday.",
        "example_note": "Ten weeks exactly is a rare clean answer, which makes this pair a good "
                        "first test of the page.",
        "pitfalls": [
            "<strong>Counting both dates.</strong> The distance is a subtraction, so the answer "
            "is the number of days between them and not one more.",
            "<strong>Reading a negative answer as an error.</strong> It is not: it means the "
            "target is behind you, and the size of the number is how far.",
        ],
        "limits": [
            "<li><strong>Calendar days.</strong> Weekends count; the working-days page is the "
            "other count.</li>",
        ],
        "uses": [
            "<li>Counting down to a holiday or a deadline.</li>",
            "<li>Checking how long is left before a renewal date.</li>",
        ],
        "scenarios": [
            {"inputs": {"today": "2026-12-20", "target": "2026-12-25"},
             "note": "Five days to Christmas from the twentieth, and the weekday line says "
                     "which day of the week the holiday falls on."},
        ],
    },
    faq=[
        ("Does it include the target date?",
         "No. The answer is how many days until it, so the target is the day after the last "
         "full day counted."),
        ("What if the date has passed?",
         "The answer is negative, which is the honest reading: minus twenty days means twenty "
         "days ago."),
        ("Can I use today's date?",
         "Set the From box to today. The page does not read the clock, so the answer is "
         "reproducible tomorrow."),
    ],
    related=[("/everyday-life/day-counter", "Day counter"),
             ("/everyday-life/countdown", "Countdown"),
             ("/everyday-life/days-between-dates", "Days between dates")],
    checks=[
        ({"today": "2026-10-23", "target": "2027-01-01"},
         {"days": 70, "weeks": 10, "weekday": 5}, 0.01),
        ({"today": "2026-12-20", "target": "2026-12-25"},
         {"days": 5, "weeks": 0.7143, "weekday": 5}, 0.01),
    ],
))

# ------------------------------------------------------------------ countdown

SPECS.append(S(
    slug="countdown",
    name="Countdown Calculator",
    title="Countdown Calculator — Days, Hours and Minutes to Go",
    desc="A countdown from any date to the one you are waiting for, in days, in hours and in "
         "minutes, so the same event can be quoted at three levels of patience.",
    what="The distance to a date in three units. A year reads as 365 days, 8 760 hours, 525 600 "
         "minutes, which is the sort of number that makes a countdown feel real.",
    fields=[
        D("today", "Counting from", "2026-10-23"),
        D("target", "Counting to", "2026-12-25"),
    ],
    results=[
        R("days", "Days to go", "days"),
        R("hours", "Hours to go", "h"),
        R("minutes", "Minutes to go", "min"),
    ],
    formula={
        "days": "target - today",
        "hours": "(target - today) * 24",
        "minutes": "(target - today) * 1440",
    },
    prose={
        "why": "<p>Every countdown is the same subtraction read at a different scale. The days "
               "line is what a calendar shows; the hours line is what a shift worker counts; the "
               "minutes line is what makes a long wait look long.</p>"
               "<p>Because all three come from one subtraction, they cannot disagree. That is "
               "worth saying out loud, because the versions that do disagree are the ones built "
               "by adding three separate counters and letting them drift.</p>",
        "formula_note": "One subtraction of day numbers gives the day count; multiplying by "
                        "twenty-four and by 1 440 gives the same span in hours and minutes. "
                        "Nothing is rounded anywhere, so the three lines are exact multiples of "
                        "each other.",
        "reading": "23 October to 25 December 2026 is 63 days, which is 1 512 hours or 90 720 "
                   "minutes. Divide the minutes by 60 and you are back at hours; divide the "
                   "hours by 24 and you are back at days.",
        "example_note": "The minutes line is the one to quote when the wait feels longer than "
                        "the day count suggests.",
        "pitfalls": [
            "<strong>Adding hours as if a day had twenty-four usable hours.</strong> The "
            "countdown measures the calendar, not the waking day.",
            "<strong>Forgetting the time of day.</strong> A target dated only runs from "
            "midnight to midnight, so an event at nine in the evening has a day less by "
            "breakfast time.",
        ],
        "limits": [
            "<li><strong>Dates, not moments.</strong> For an answer to the hour, the "
            "time-between-dates page takes a clock time as well.</li>",
        ],
        "uses": [
            "<li>A countdown to a holiday or a launch.</li>",
            "<li>Showing how many working hours remain before a deadline.</li>",
        ],
        "scenarios": [
            {"inputs": {"today": "2026-01-01", "target": "2026-12-31"},
             "note": "A year in a non-leap year reads 364 days from the first to the "
                     "thirty-first, which is one short of the year people expect."},
        ],
    },
    faq=[
        ("Why is a year 364 days here?",
         "Because the count runs from one date to the other, and the day you start on is not "
         "part of the distance. Add one if your convention counts the first day."),
        ("Do the three lines ever disagree?",
         "They cannot. All three are the same subtraction multiplied out, not three separate "
         "counters."),
        ("Can the countdown go backwards?",
         "Yes. A past target gives negative days, and the hours and minutes follow it."),
    ],
    related=[("/everyday-life/days-until", "Days until"),
             ("/everyday-life/day-counter", "Day counter"),
             ("/everyday-life/days-between-dates", "Days between dates")],
    checks=[
        ({"today": "2026-10-23", "target": "2026-12-25"},
         {"days": 63, "hours": 1512, "minutes": 90720}, 0.01),
        ({"today": "2026-01-01", "target": "2026-12-31"},
         {"days": 364, "hours": 8736, "minutes": 524160}, 0.01),
    ],
))

# -------------------------------------------------------- birthday countdown

SPECS.append(S(
    slug="birthday-countdown",
    name="Birthday Countdown Calculator",
    title="Birthday Countdown — Days Until the Next Birthday",
    desc="Days until the next birthday, the date it falls on, the weekday and the age that "
         "birthday turns, worked out from a date of birth and any reference date.",
    what="The next birthday, how far away it is, which day of the week it lands on and how old "
         "the person will be. The weekday is the part a party needs.",
    fields=[
        D("birth", "Date of birth", "1990-05-17"),
        D("today", "Count from", "2026-10-23"),
    ],
    results=[
        RD("next_birthday", "Next birthday"),
        R("days_until", "Days until it", "days"),
        R("weekday", "Weekday (1 is Monday)", ""),
        R("turning", "Age on that birthday", "years"),
    ],
    formula={
        "turning": ("getYear(today) - getYear(birth) - "
                    "if_else(getMonth(today) < getMonth(birth), 1, "
                    "if_else(getMonth(today) == getMonth(birth), "
                    "if_else(getDate(today) < getDate(birth), 1, 0), 0)) + 1"),
        "next_birthday": ("dateAtYearsOld(birth, getYear(today) - getYear(birth) - "
                          "if_else(getMonth(today) < getMonth(birth), 1, "
                          "if_else(getMonth(today) == getMonth(birth), "
                          "if_else(getDate(today) < getDate(birth), 1, 0), 0)) + 1)"),
        "days_until": ("dateAtYearsOld(birth, getYear(today) - getYear(birth) - "
                       "if_else(getMonth(today) < getMonth(birth), 1, "
                       "if_else(getMonth(today) == getMonth(birth), "
                       "if_else(getDate(today) < getDate(birth), 1, 0), 0)) + 1) - today"),
        "weekday": ("mod(dateAtYearsOld(birth, getYear(today) - getYear(birth) - "
                    "if_else(getMonth(today) < getMonth(birth), 1, "
                    "if_else(getMonth(today) == getMonth(birth), "
                    "if_else(getDate(today) < getDate(birth), 1, 0), 0)) + 1) + 3, 7) + 1"),
    },
    prose={
        "why": "<p>Counting to a birthday is easy in the month and hard in the last week. The "
               "month is right; the day drifts because the birthday has to be moved to this "
               "year before it can be subtracted, and a birthday in a leap year has to survive "
               "the move.</p>"
               "<p>This page moves it properly. It takes the birth date and a reference date, "
               "works out how old the person is today, then dates the next birthday and counts "
               "the days to it. The weekday and the age on that day come out of the same step, "
               "so a party invitation can be written from one press.</p>",
        "formula_note": "The age turns on whether this year's birthday has happened yet, which "
                        "is a comparison of month and then of day. The next birthday is the "
                        "birth date moved forward to that age plus one, and the day count is "
                        "the distance from the reference date to it.",
        "reading": "Born on 17 May 1990 and counting from 23 October 2026, the next birthday is "
                   "17 May 2027, a Monday: 206 days away and the thirty-seventh. The last one, "
                   "in May 2026, already happened, which is why the count jumped a year.",
        "example_note": "A birthday that fell yesterday sends the count almost a full year "
                        "forward. That is correct and is the fastest way to check the page.",
        "pitfalls": [
            "<strong>Counting to this year's birthday after it has passed.</strong> It is "
            "already gone; the next one is next year and the page says so.",
            "<strong>Assuming the same weekday every year.</strong> A birthday moves by one "
            "weekday each year and by two after a leap day.",
        ],
        "limits": [
            "<li><strong>One date at a time.</strong> A list of birthdays needs one pass per "
            "person.</li>",
        ],
        "uses": [
            "<li>Dating a party and checking which day it falls on.</li>",
            "<li>Working out whether a birthday has already passed this year.</li>",
        ],
        "scenarios": [
            {"inputs": {"birth": "2000-02-29", "today": "2026-10-23"},
             "note": "A leap-day birth is dated to 28 February in a non-leap year: the day is "
                     "clamped rather than skipped."},
        ],
    },
    faq=[
        ("What happens for a 29 February birthday?",
         "In a non-leap year the birthday is dated to 28 February, which is the clamp the "
         "calendar applies. Some people celebrate on 1 March; the date here is the last day of "
         "February."),
        ("Does it give the age today as well?",
         "No, it gives the age on the next birthday. Subtract one to get the age today, unless "
         "the birthday is today."),
        ("Why is the weekday shown?",
         "Because a party is booked on a day of the week, not on a calendar date."),
    ],
    related=[("/everyday-life/age", "Age calculator"),
             ("/everyday-life/half-birthday", "Half birthday"),
             ("/everyday-life/anniversary", "Anniversary")],
    checks=[
        ({"birth": "1990-05-17", "today": "2026-10-23"},
         {"next_birthday": 20955, "days_until": 206, "weekday": 1, "turning": 37}, 0.01),
        ({"birth": "2000-02-29", "today": "2026-10-23"},
         {"next_birthday": 20877, "days_until": 128, "weekday": 7, "turning": 27}, 0.01),
    ],
))

# ----------------------------------------------------------------- leap year

SPECS.append(S(
    slug="leap-year",
    name="Leap Year Calculator",
    title="Leap Year Calculator — Is a Year a Leap Year?",
    desc="Whether a year is a leap year, how many days it holds and when the next leap year "
         "falls, with the four, one hundred and four hundred year rules all applied.",
    what="The leap-year test, the length of the year and the next leap year after it. The "
         "century rule is the part that catches people: 1900 was not a leap year and 2000 was.",
    fields=[
        F("year", "Year", "", 2026),
    ],
    results=[
        R("is_leap", "Is a leap year (1 yes, 0 no)", ""),
        R("days", "Days in the year", "days"),
        R("next_leap", "Next leap year", ""),
    ],
    formula={
        "is_leap": ("if_else(mod(year, 400) == 0, 1, "
                    "if_else(mod(year, 100) == 0, 0, "
                    "if_else(mod(year, 4) == 0, 1, 0)))"),
        "days": ("365 + if_else(mod(year, 400) == 0, 1, "
                 "if_else(mod(year, 100) == 0, 0, "
                 "if_else(mod(year, 4) == 0, 1, 0)))"),
        "next_leap": ("if_else(mod(year + 4 - mod(year, 4), 400) == 0, year + 4 - mod(year, 4), "
                      "if_else(mod(year + 4 - mod(year, 4), 100) == 0, year + 8 - mod(year, 4), "
                      "year + 4 - mod(year, 4)))"),
    },
    prose={
        "why": "<p>The leap-year rule is four, except every hundred, except every four hundred. "
               "Most people remember the first clause and stop, which is why 1900 gets called a "
               "leap year in quizzes and 2000 does not.</p>"
               "<p>This page applies all three clauses in order and returns a plain one or "
               "zero, the length of the year, and the next year that qualifies. That last "
               "answer is where the century rule bites: the leap year after 1896 is 1904, not "
               "1900.</p>",
        "formula_note": "Divisible by four makes a leap year; divisible by a hundred takes it "
                        "away again; divisible by four hundred puts it back. The next-leap line "
                        "tests the candidate as well, so a century that fails the test is "
                        "skipped rather than offered.",
        "reading": "2026 is not a leap year: 365 days, and the next leap year is 2028. 1900 was "
                   "not one, 2000 was, and 2100 will not be.",
        "example_note": "Type 1900 and then 2000. The two answers together are the whole rule, "
                        "and they are the pair that most people get wrong.",
        "pitfalls": [
            "<strong>Stopping at \"divisible by four\".</strong> That alone makes 1900 and 2100 "
            "leap years, which they are not.",
            "<strong>Assuming the next leap year is always four years on.</strong> It is, "
            "except across a century that fails the test.",
        ],
        "limits": [
            "<li><strong>The Gregorian rule only.</strong> A historical date before 1582 may "
            "follow a different calendar in your jurisdiction.</li>",
        ],
        "uses": [
            "<li>Checking a date of birth in a quiz or a form.</li>",
            "<li>Working out whether a February has twenty-nine days.</li>",
        ],
        "scenarios": [
            {"inputs": {"year": 1900},
             "note": "1900 is divisible by four and by a hundred, so it is not a leap year, and "
                     "the next leap year after it is 1904."},
        ],
    },
    faq=[
        ("Why is 1900 not a leap year?",
         "Because it is divisible by a hundred and not by four hundred. The century rule "
         "removes it."),
        ("Is 2000 a leap year?",
         "Yes. Divisible by four hundred, so the removal does not apply."),
        ("What is the next leap year?",
         "2028 from 2026. The page answers for whatever year you type, including centuries "
         "where the answer is not four years away."),
    ],
    related=[("/everyday-life/day-of-the-year", "Day of the year"),
             ("/everyday-life/add-days", "Add days"),
             ("/everyday-life/years-between-dates", "Years between dates")],
    checks=[
        ({"year": 2026}, {"is_leap": 0, "days": 365, "next_leap": 2028}, 0.01),
        ({"year": 1900}, {"is_leap": 0, "days": 365, "next_leap": 1904}, 0.01),
        ({"year": 2000}, {"is_leap": 1, "days": 366, "next_leap": 2004}, 0.01),
    ],
))

# -------------------------------------------------------------- business days

SPECS.append(S(
    slug="business-days",
    name="Business Days Calculator",
    title="Business Days Between Dates — Weekdays Only",
    desc="Working days between two dates, with the weekend days counted separately and an "
         "option to include the last date, for delivery estimates and payment terms.",
    what="The weekdays between two dates, Monday to Friday, with the Saturdays and Sundays "
         "taken out and shown so the subtraction can be checked.",
    fields=[
        D("date1", "From", "2026-01-01"),
        D("date2", "To", "2026-01-15"),
        SEL("include_end", "Count the last date as a working day?",
            [("Yes, include it", 1), ("No, stop the day before", 0)], 1),
    ],
    results=[
        R("business_days", "Business days", "days"),
        R("weekend_days", "Weekend days inside the span", "days"),
        R("total_days", "Days counted in all", "days"),
    ],
    formula={
        "total_days": "date2 - date1 + include_end",
        "weekend_days": "floor(((date2 - date1 + include_end) - mod(5 - mod(date1 + 3, 7), 7) + 6) / 7) + floor(((date2 - date1 + include_end) - mod(6 - mod(date1 + 3, 7), 7) + 6) / 7)",
        "business_days": "(date2 - date1 + include_end) - floor(((date2 - date1 + include_end) - mod(5 - mod(date1 + 3, 7), 7) + 6) / 7) - floor(((date2 - date1 + include_end) - mod(6 - mod(date1 + 3, 7), 7) + 6) / 7)",
    },
    prose={
        "why": "<p>\"Five working days\" is not five days. A courier quoting it, a bank clearing "
               "a payment and a payroll department all mean Monday to Friday, which is five days "
               "in a normal week and seven if the span crosses a weekend.</p>"
               "<p>This page counts the weekdays in a span and shows the weekend days beside "
               "them. The weekend figure is not decoration: it is how you check the weekday "
               "count without trusting it, because the two must add up to the total.</p>",
        "formula_note": "A span of days from a known weekday contains a whole number of each "
                        "weekday that depends on how many times seven divides it. Counting the "
                        "Saturdays and Sundays that way costs two floors, and subtracting them "
                        "from the span leaves Monday to Friday.",
        "reading": "1 to 15 January 2026 counted with the last date included is 15 days, of "
                   "which four are weekend days: 11 business days. Drop the last date and it is "
                   "14 days, 4 weekend days and 10 business days.",
        "example_note": "Public holidays are not weekends and this page does not know them, so a "
                        "bank holiday inside the span has to be subtracted by hand.",
        "pitfalls": [
            "<strong>Using it for bank holidays.</strong> A holiday falls on a weekday and stays "
            "in the count, which is why a delivery estimate always slips at Christmas.",
            "<strong>Leaving the last-date option on by default.</strong> The option exists "
            "because both conventions are in use; check which one your rule means.",
        ],
        "limits": [
            "<li><strong>No holiday calendar.</strong> Only Saturday and Sunday are excluded.</li>",
        ],
        "uses": [
            "<li>Checking a five-working-day delivery estimate.</li>",
            "<li>Counting payable days in a payment term.</li>",
        ],
        "scenarios": [
            {"inputs": {"date1": "2026-12-21", "date2": "2026-12-28", "include_end": 1},
             "note": "A week over Christmas is 8 days and 2 weekend days, giving 6 business "
                     "days unless the holidays themselves are taken out."},
        ],
    },
    faq=[
        ("Does it know about public holidays?",
         "No. Only Saturday and Sunday are excluded, which is the definition of a working day "
         "in most rules before the holiday list is applied."),
        ("Why does the total differ by one?",
         "Because of the include option. Counting the last date as a working day adds exactly "
         "one day to every figure on the page."),
        ("Can the answer be zero?",
         "Yes. A Saturday to a Sunday with the last date excluded is a span of one day and no "
         "working days, which is the correct answer."),
        ("What if I put the dates the wrong way round?",
         "The span comes back negative, and the weekday counts with it. That is the page "
         "telling you the From date is the later one rather than quietly returning a zero."),
    ],
    related=[("/everyday-life/days-between-dates", "Days between dates"),
             ("/everyday-life/day-counter", "Day counter"),
             ("/everyday-life/week", "Week calculator")],
    checks=[
        ({"date1": "2026-01-01", "date2": "2026-01-15", "include_end": 1},
         {"business_days": 11, "weekend_days": 4, "total_days": 15}, 0.01),
        ({"date1": "2026-01-01", "date2": "2026-01-15", "include_end": 0},
         {"business_days": 10, "weekend_days": 4, "total_days": 14}, 0.01),
        ({"date1": "2026-12-21", "date2": "2026-12-28", "include_end": 1},
         {"business_days": 6, "weekend_days": 2, "total_days": 8}, 0.01),
    ],
))

# ----------------------------------------------------------------- anniversary

SPECS.append(S(
    slug="anniversary",
    name="Anniversary Calculator",
    title="Anniversary Calculator — Which One, and How Far Off",
    desc="How many years since a date, which anniversary comes next, the date it falls on, the "
         "weekday and the days until it, for weddings and service records alike.",
    what="Completed years since a date, the next anniversary of it and the wait in days. Works "
         "for a wedding, a first day at work or a company's founding.",
    fields=[
        D("start", "The date to count from", "2019-04-19"),
        D("today", "Count from", "2026-10-23"),
    ],
    results=[
        R("years", "Completed years", "years"),
        RD("next", "Next anniversary"),
        R("days_until", "Days until it", "days"),
        R("weekday", "Weekday of the next one (1 is Monday)", ""),
    ],
    formula={
        "years": ("getYear(today) - getYear(start) - "
                  "if_else(getMonth(today) < getMonth(start), 1, "
                  "if_else(getMonth(today) == getMonth(start), "
                  "if_else(getDate(today) < getDate(start), 1, 0), 0))"),
        "next": ("dateAtYearsOld(start, getYear(today) - getYear(start) - "
                 "if_else(getMonth(today) < getMonth(start), 1, "
                 "if_else(getMonth(today) == getMonth(start), "
                 "if_else(getDate(today) < getDate(start), 1, 0), 0)) + 1)"),
        "days_until": ("dateAtYearsOld(start, getYear(today) - getYear(start) - "
                       "if_else(getMonth(today) < getMonth(start), 1, "
                       "if_else(getMonth(today) == getMonth(start), "
                       "if_else(getDate(today) < getDate(start), 1, 0), 0)) + 1) - today"),
        "weekday": ("mod(dateAtYearsOld(start, getYear(today) - getYear(start) - "
                    "if_else(getMonth(today) < getMonth(start), 1, "
                    "if_else(getMonth(today) == getMonth(start), "
                    "if_else(getDate(today) < getDate(start), 1, 0), 0)) + 1) + 3, 7) + 1"),
    },
    prose={
        "why": "<p>An anniversary is a birthday with a different label: the same rule of comparing "
               "month and day to decide whether this year's has happened, the same move of the "
               "date to the coming year, the same count of days to it.</p>"
               "<p>The number that trips people is the name of the anniversary. Seven completed "
               "years means the seventh has passed and the eighth is coming, and a silver "
               "wedding is the twenty-fifth, which is twenty-four completed years plus one day "
               "away from being the twenty-fifth.</p>",
        "formula_note": "Completed years compare the month first and the day only when the "
                        "months agree, which is the rule an age uses. The next anniversary is "
                        "the start date moved forward to that number plus one, and the day "
                        "count is the distance to it.",
        "reading": "From 19 April 2019 to 23 October 2026 is seven completed years, so the next "
                   "anniversary is 19 April 2027, a Monday, 178 days away. The seventh "
                   "anniversary itself fell in April 2026.",
        "example_note": "A date that has just passed gives a number close to a full year, which "
                        "is the fastest check that the page is reading the months correctly.",
        "pitfalls": [
            "<strong>Calling the next one by the completed count.</strong> Seven completed means "
            "the eighth is next, not the seventh.",
            "<strong>Assuming the weekday repeats.</strong> It moves by one a year, and by two "
            "after a leap day, so a Saturday anniversary can become a Monday in one step.",
        ],
        "limits": [
            "<li><strong>One date.</strong> A calendar of several anniversaries is one pass per "
            "date.</li>",
        ],
        "uses": [
            "<li>Dating a silver or golden anniversary.</li>",
            "<li>Checking the length of service on a reference letter.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": "2019-04-19", "today": "2026-04-19"},
             "note": "On the day itself the count reads seven completed years and the next "
                     "anniversary is a year away, which is what makes the day itself belong to "
                     "the seventh."},
        ],
    },
    faq=[
        ("Which anniversary comes next?",
         "The one after the completed count. Seven years completed in October means the eighth "
         "is next in April."),
        ("Does it use the same day of the month?",
         "Yes, clamped at the end of a short month, so a 29 February anniversary lands on the "
         "28th in a non-leap year."),
        ("Can it count from any date?",
         "Any date at all: a wedding, a first day, a company's founding, the day a book was "
         "published."),
    ],
    related=[("/everyday-life/age", "Age calculator"),
             ("/everyday-life/birthday-countdown", "Birthday countdown"),
             ("/everyday-life/years-between-dates", "Years between dates")],
    checks=[
        ({"start": "2019-04-19", "today": "2026-10-23"},
         {"years": 7, "next": 20927, "days_until": 178, "weekday": 1}, 0.01),
        ({"start": "2019-04-19", "today": "2026-04-19"},
         {"years": 7, "next": 20927, "days_until": 365, "weekday": 1}, 0.01),
    ],
))
