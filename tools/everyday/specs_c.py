"""

Everyday-life batch C: the clock-time family.

Fourteen pages that all come down to adding or subtracting stretches of a day.
A clock time reaches a formula as milliseconds since midnight, so the formulas
here divide by 3 600 000 to reach hours; the same literal also tells the solver
to leave the conversion alone (see Solver::formulaUnits).

"""

from __future__ import annotations

from lib import D, F, R, S, SEL, RT, T

SPECS: list = []

# ------------------------------------------------------------------ add time

SPECS.append(S(
    slug="add-time",
    name="Add Time Calculator",
    title="Add Time Calculator — Add Hours, Minutes and Seconds",
    desc="Add two stretches of time given in hours, minutes and seconds and read the total in "
         "hours, in minutes and in seconds, without converting anything by hand. Formula shown.",
    what="Two spells of time, added in seconds and read back in three units. A lunch break and "
         "an afternoon meeting in the same sum is the usual reason to reach for it.",
    fields=[
        F("h1", "Hours in the first spell", "h", 2),
        F("m1", "Minutes in the first spell", "min", 45),
        F("s1", "Seconds in the first spell", "s", 30),
        F("h2", "Hours in the second spell", "h", 1),
        F("m2", "Minutes in the second spell", "min", 20),
        F("s2", "Seconds in the second spell", "s", 15),
    ],
    results=[
        R("total_hours", "Total hours", "h"),
        R("total_minutes", "Total minutes", "min"),
        R("total_seconds", "Total seconds", "s"),
    ],
    formula={
        "total_seconds": "h1 * 3600 + m1 * 60 + s1 + h2 * 3600 + m2 * 60 + s2",
        "total_minutes": "(h1 * 3600 + m1 * 60 + s1 + h2 * 3600 + m2 * 60 + s2) / 60",
        "total_hours": "(h1 * 3600 + m1 * 60 + s1 + h2 * 3600 + m2 * 60 + s2) / 3600",
    },
    prose={
        "why": "<p>Adding 2 h 45 min to 1 h 20 min is not 3 h 65 min, and that is exactly the "
               "answer a person gets when they add the columns the way they were taught and "
               "forget that the minutes column carries at sixty. Sixty is the awkward base. Your "
               "fingers count in tens and the clock does not.</p>"
               "<p>This page does the carrying for you. Put the two spells in, each with its own "
               "hours, minutes and seconds, and read the same total three ways: hours with a "
               "decimal, whole minutes, whole seconds.</p>",
        "formula_note": "Every box is turned into seconds first, because seconds are the one "
                        "unit all three can be added in. The two division lines are that same "
                        "total read back in minutes and hours, so they cannot disagree with the "
                        "seconds figure above them.",
        "reading": "2 h 45 min 30 s added to 1 h 20 min 15 s is 4 h 05 min 45 s, which is "
                   "14 745 seconds, or 245.75 minutes, or 4.0958 hours. The minutes and hours "
                   "columns carry at sixty, not at a hundred.",
        "example_note": "The seconds figure is the one to quote when the two spells are a "
                        "stopwatch reading; the decimal hours figure is the one a timesheet "
                        "takes.",
        "pitfalls": [
            "<strong>Adding the minutes past sixty.</strong> 45 plus 20 is 65, and 65 minutes "
            "is an hour and five, not one minute of the next hour left over.",
            "<strong>Assuming a decimal hour is minutes.</strong> 4.09 hours is four hours and "
            "about five minutes, not four hours nine minutes.",
        ],
        "limits": [
            "<li><strong>Two spells only.</strong> A rota with six rows needs the time adder, "
            "which sums a whole column.</li>",
        ],
        "uses": [
            "<li>Adding a morning and an afternoon session to one billable figure.</li>",
            "<li>Checking a stopwatch against a hand-written log.</li>",
        ],
        "scenarios": [
            {"inputs": {"h1": 0, "m1": 40, "s1": 0, "h2": 0, "m2": 35, "s2": 0},
             "note": "Forty minutes and thirty-five makes 75 minutes, which is 1.25 hours: the "
                     "carry at sixty is the whole of the difference."},
        ],
    },
    faq=[
        ("Why not just add the hours and minutes separately?",
         "Because the minutes column overflows at sixty. Adding them separately gives 3 h 65 min, "
         "a figure that cannot be written on a clock."),
        ("What happens if a box is left blank?",
         "Nothing is guessed. The total stays blank until all six boxes hold a number, and a "
         "zero is a value you have to type rather than one the page assumes."),
        ("Can a spell be more than 24 hours?",
         "Yes. The hours box has no ceiling, so two long spells add up to a duration longer than "
         "a day, which is what a project log needs."),
    ],
    related=[("/everyday-life/time-adder", "Time adder"),
             ("/everyday-life/hours-to-decimal", "Hours to decimal"),
             ("/everyday-life/time-duration", "Time duration")],
    checks=[
        ({"h1": 2, "m1": 45, "s1": 30, "h2": 1, "m2": 20, "s2": 15},
         {"total_hours": 4.0958, "total_minutes": 245.75, "total_seconds": 14745}, 0.01),
        ({"h1": 0, "m1": 40, "s1": 0, "h2": 0, "m2": 35, "s2": 0},
         {"total_hours": 1.25, "total_minutes": 75, "total_seconds": 4500}, 0.01),
    ],
))

# --------------------------------------------------------------- add minutes

SPECS.append(S(
    slug="add-minutes",
    name="Add Minutes to a Time Calculator",
    title="Add Minutes to a Time — Resulting Clock Time",
    desc="Take a clock time, add a number of minutes, and read the time it lands on, the count "
         "of minutes from midnight and whether the answer crossed into the next day. Formula shown.",
    what="A start time and a number of minutes, added on the 24-hour dial. The page rolls past "
         "midnight rather than returning a time that does not exist.",
    fields=[
        T("start", "Start time", "09:00"),
        F("minutes", "Minutes to add", "min", 90),
    ],
    results=[
        RT("result", "Time after adding"),
        R("minutes_from_midnight", "Minutes from midnight", "min"),
        R("day_shift", "Days past midnight", "days"),
    ],
    formula={
        "result": "mod(start + minutes * 60000, 86400000)",
        "minutes_from_midnight": "(start + minutes * 60000) / 60000",
        "day_shift": "floor((start + minutes * 60000) / 86400000)",
    },
    prose={
        "why": "<p>Ninety minutes after nine o'clock is half past ten, not ten thirty in some "
               "decimal sense. The dial has twenty-four positions and the minutes wrap at the "
               "end of the day, so the arithmetic has to wrap too.</p>"
               "<p>The page gives the landed time, the running count of minutes from midnight, "
               "and how many whole days the addition passed. That last number is the one an "
               "overnight job needs.</p>",
        "formula_note": "Minutes become milliseconds on the way in, the sum is taken modulo one "
                        "day so it lands back inside the dial, and the floor division counts how "
                        "many whole days were crossed. The two are separate answers because one "
                        "wraps and the other does not.",
        "reading": "Nine o'clock plus ninety minutes is 10:30, which is 630 minutes from "
                   "midnight and no full day crossed. Ten minutes to midnight plus twenty-five "
                   "minutes lands at 00:15 on the following day.",
        "example_note": "Adding an oven time or a delay to a wall clock is the everyday use. The "
                        "minutes-from-midnight line is what a machine log stores instead of a "
                        "clock reading.",
        "pitfalls": [
            "<strong>Forgetting the day rollover.</strong> 23:50 plus 25 minutes is 00:15 on "
            "the next day, and a rota that writes only the clock time loses a date.",
            "<strong>Adding minutes as decimal hours.</strong> 1.5 in the minutes box is one "
            "minute and thirty seconds, not ninety minutes.",
        ],
        "limits": [
            "<li><strong>No seconds box.</strong> A clock time here is read to the minute; a "
            "stopwatch answer belongs on the duration page.</li>",
        ],
        "uses": [
            "<li>Working out when a cake comes out of the oven.</li>",
            "<li>Shifting a schedule by a fixed delay.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": "23:50", "minutes": 25},
             "note": "Twenty-five minutes past the last minute of the day rolls into 00:15 and "
                     "counts one day past midnight."},
        ],
    },
    faq=[
        ("What happens past midnight?",
         "The clock time wraps to the small hours and the days-past-midnight line says 1. "
         "Nothing is clipped at 23:59."),
        ("Can I add a negative number of minutes?",
         "Yes. The box takes a minus sign, and the wrap takes the answer back into the previous "
         "day rather than turning it into a negative clock reading."),
        ("Why is there a minutes-from-midnight answer?",
         "Because that count is what a schedule, a script or a spreadsheet actually stores. "
         "630 is easier to do further arithmetic with than 10:30."),
    ],
    related=[("/everyday-life/adding-hours", "Adding hours"),
             ("/everyday-life/adding-hours-and-minutes", "Adding hours and minutes"),
             ("/everyday-life/time-duration", "Time duration")],
    checks=[
        ({"start": "09:00", "minutes": 90},
         {"result": 630, "minutes_from_midnight": 630, "day_shift": 0}, 0.01),
        ({"start": "23:50", "minutes": 25},
         {"result": 15, "minutes_from_midnight": 1455, "day_shift": 1}, 0.01),
    ],
))

# -------------------------------------------------------------- adding hours

SPECS.append(S(
    slug="adding-hours",
    name="Adding Hours Calculator",
    title="Adding Hours to a Clock Time — End Time Calculator",
    desc="Add a number of hours, whole or fractional, to a clock time and see the time it lands "
         "on, the minutes added and whether it crossed midnight, all on one page. Formula shown.",
    what="A clock time plus hours, including half hours. The answer is the clock reading, not a "
         "duration, so a shift that ends after midnight shows a morning time and one day past.",
    fields=[
        T("start", "Start time", "09:00"),
        F("hours", "Hours to add", "h", 3.5, "Half hours are fine: 3.5 is three and a half hours."),
    ],
    results=[
        RT("result", "Time after adding"),
        R("day_shift", "Days past midnight", "days"),
        R("minutes_later", "Minutes later", "min"),
    ],
    formula={
        "result": "mod(start + hours * 3600000, 86400000)",
        "day_shift": "floor((start + hours * 3600000) / 86400000)",
        "minutes_later": "hours * 60",
    },
    prose={
        "why": "<p>Hours are the easy unit until they are not. Three hours after nine in the "
               "morning is noon and nobody needs a page for that. Half past ten at night plus "
               "four is where people reach for one, because the answer is a morning time and "
               "the date has moved on underneath it.</p>"
               "<p>The page accepts a fractional hour, so three and a half goes in as 3.5 and "
               "lands half an hour into the fourth hour without a second box to fill.</p>",
        "formula_note": "The hours box is multiplied by 3 600 000 to reach milliseconds, added to "
                        "the start time and taken modulo one day. The fractional part of the "
                        "hours box survives that multiplication, which is why 3.5 is exact and "
                        "not rounded to three.",
        "reading": "Nine in the morning plus three and a half hours is 12:30, with no day "
                   "crossed and 210 minutes added. Ten at night plus four hours is 02:00 the "
                   "next morning and one day past midnight.",
        "example_note": "A night shift ending after midnight is the case this page exists for. "
                        "Write the end time as the clock shows it and read the day count "
                        "separately.",
        "pitfalls": [
            "<strong>Reading 02:00 as an earlier time.</strong> It is the next morning, which "
            "is what the days-past-midnight line is telling you.",
            "<strong>Typing 3:30 for three and a half hours.</strong> The box wants a decimal; "
            "3:30 would be read as three and three tenths.",
        ],
        "limits": [
            "<li><strong>Hours, not hours and minutes.</strong> For a spell written as 7 h 50 "
            "min, the hours-and-minutes page takes both boxes.</li>",
        ],
        "uses": [
            "<li>A shift that finishes after midnight.</li>",
            "<li>A flight time written as a duration.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": "22:00", "hours": 4},
             "note": "Ten at night plus four hours lands at 02:00, one day past midnight: the "
                     "clock reading alone would look like an earlier time."},
        ],
    },
    faq=[
        ("Can the hours box take half an hour?",
         "Yes. 0.5 is thirty minutes and 3.5 is three and a half hours. The box reads a decimal, "
         "so write a half as 0.5 rather than as 30."),
        ("What if the answer should be on the previous day?",
         "Add a negative number of hours. The wrap then goes back through midnight and the day "
         "line reads −1."),
        ("Does the page account for daylight saving?",
         "No. It adds to a clock reading, not to a moment in a time zone, so an hour that a "
         "clock skips or repeats is a normal hour here."),
    ],
    related=[("/everyday-life/adding-hours-and-minutes", "Adding hours and minutes"),
             ("/everyday-life/add-minutes", "Add minutes"),
             ("/everyday-life/subtract-time", "Subtract time")],
    checks=[
        ({"start": "09:00", "hours": 3.5},
         {"result": 750, "day_shift": 0, "minutes_later": 210}, 0.01),
        ({"start": "22:00", "hours": 4},
         {"result": 120, "day_shift": 1, "minutes_later": 240}, 0.01),
    ],
))

# -------------------------------------------- adding hours and minutes

SPECS.append(S(
    slug="adding-hours-and-minutes",
    name="Adding Hours and Minutes Calculator",
    title="Adding Hours and Minutes — Resulting Clock Time",
    desc="Add hours and minutes to a clock time and read the time it lands on, how many minutes "
         "went by and whether the answer crossed midnight. Both boxes, one answer. Formula shown.",
    what="A clock time plus a spell written the way people say it: seven hours and fifty "
         "minutes. The page returns the landed reading and the elapsed minutes behind it.",
    fields=[
        T("start", "Start time", "08:15"),
        F("hours", "Hours to add", "h", 7),
        F("minutes", "Minutes to add", "min", 50),
    ],
    results=[
        RT("result", "Time after adding"),
        R("day_shift", "Days past midnight", "days"),
        R("elapsed_minutes", "Minutes added in total", "min"),
    ],
    formula={
        "result": "mod(start + hours * 3600000 + minutes * 60000, 86400000)",
        "day_shift": "floor((start + hours * 3600000 + minutes * 60000) / 86400000)",
        "elapsed_minutes": "hours * 60 + minutes",
    },
    prose={
        "why": "<p>Most durations in the real world arrive as two numbers: seven hours and "
               "fifty minutes, two hours and twenty. Adding them to a start time in your head "
               "means carrying the minutes past sixty and remembering the hour you carried.</p>"
               "<p>Put both numbers in and the page does the carrying. The elapsed line is the "
               "same spell in a single unit, which is useful when the minutes part is not a "
               "round number and the clock reading alone does not tell you how far it moved.</p>",
        "formula_note": "Hours and minutes become milliseconds separately and are added to the "
                        "start time before the wrap. The elapsed line multiplies the hours by "
                        "sixty and adds the minutes, so it is the size of the move rather than "
                        "the place it landed.",
        "reading": "A quarter past eight plus seven hours fifty minutes is 16:05, 470 minutes "
                   "later and no day crossed. Half past nine at night plus three forty-five is "
                   "01:15 the following morning.",
        "example_note": "A meeting that overruns its booked slot is the usual case: the start "
                        "time is on the invite and the overrun is a spell, not an end time.",
        "pitfalls": [
            "<strong>Putting the minutes in the hours box.</strong> Seven hours fifty minutes "
            "is 7 and 50, not 7.5 and 0; 7.5 would be half past the seventh hour.",
            "<strong>Losing the day when the minutes carry.</strong> The clock wraps quietly "
            "and the day line is the only place the date shows.",
        ],
        "limits": [
            "<li><strong>No seconds box.</strong> The page works to the minute, which is the "
            "resolution a rota or a booking is written in.</li>",
        ],
        "uses": [
            "<li>A meeting that overran its slot.</li>",
            "<li>Planning the end of a journey from its start and its driving time.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": "21:30", "hours": 3, "minutes": 45},
             "note": "Three forty-five after half past nine at night crosses midnight by an hour "
                     "and a quarter: the day line reads 1."},
        ],
    },
    faq=[
        ("Why are there separate hours and minutes boxes?",
         "Because that is how the spell is written down. Keeping them apart means 7 h 50 min "
         "goes in exactly as it appears on the rota, with no conversion first."),
        ("What does the elapsed line add?",
         "It is the size of the move in minutes. 7 h 50 min is 470 minutes, which is easier to "
         "compare with a 480-minute shift than the clock reading is."),
        ("Can the minutes box hold more than 60?",
         "Yes. Ninety minutes is accepted and carries into the hours, so a page cannot be "
         "spoiled by a box holding a slightly wrong unit."),
    ],
    related=[("/everyday-life/adding-hours", "Adding hours"),
             ("/everyday-life/add-minutes", "Add minutes"),
             ("/everyday-life/time-adder", "Time adder")],
    checks=[
        ({"start": "08:15", "hours": 7, "minutes": 50},
         {"result": 965, "day_shift": 0, "elapsed_minutes": 470}, 0.01),
        ({"start": "21:30", "hours": 3, "minutes": 45},
         {"result": 75, "day_shift": 1, "elapsed_minutes": 225}, 0.01),
    ],
))

# ------------------------------------------------------------- subtract time

SPECS.append(S(
    slug="subtract-time",
    name="Subtract Time Calculator",
    title="Subtract Time — Clock Time Minus Hours and Minutes",
    desc="Subtract hours and minutes from a clock time and read the time it lands on, the day "
         "it falls back to and the minutes from midnight that follow. Formula shown.",
    what="A clock time minus a spell. Going back through midnight is handled by the wrap, so a "
         "morning meeting worked backwards from noon stays a morning time.",
    fields=[
        T("start", "Start time", "17:30"),
        F("hours", "Hours to subtract", "h", 1),
        F("minutes", "Minutes to subtract", "min", 45),
    ],
    results=[
        RT("result", "Time after subtracting"),
        R("day_shift", "Days relative to the start day", "days"),
        R("minutes_from_midnight", "Minutes from midnight", "min"),
    ],
    formula={
        "result": "mod(start - hours * 3600000 - minutes * 60000 + 86400000, 86400000)",
        "day_shift": "floor((start - hours * 3600000 - minutes * 60000) / 86400000)",
        "minutes_from_midnight": "mod(start - hours * 3600000 - minutes * 60000 + 86400000, 86400000) / 60000",
    },
    prose={
        "why": "<p>Subtracting is where clock arithmetic stops being obvious. Half past five "
               "minus one forty-five is obvious enough. Eight in the morning minus nine and a "
               "half is not, because the answer belongs to the day before and the clock reading "
               "alone says 22:30, which reads like the evening of the same day.</p>"
               "<p>The page returns the reading, the day it belongs to, and the count of minutes "
               "from midnight so the three cannot be read out of step with each other.</p>",
        "formula_note": "One day of milliseconds is added before the wrap so that a negative "
                        "result comes back as a time inside the dial rather than as a number "
                        "before zero. The day line uses the unadjusted difference, which is why "
                        "it can read −1 while the clock reads a perfectly ordinary time.",
        "reading": "Half past five minus one forty-five is 15:45, 945 minutes from midnight on "
                   "the same day. Eight in the morning minus nine and a half hours is 22:30 on "
                   "the previous day.",
        "example_note": "Working backwards from a deadline is the common use: the meeting is at "
                        "ten, the travel is an hour and ten, so leave at a quarter to nine.",
        "pitfalls": [
            "<strong>Reading a wrapped time as the same day.</strong> 22:30 after subtracting "
            "nine and a half hours from 08:00 is the evening before, not the evening after.",
            "<strong>Subtracting the minutes in the wrong direction.</strong> The two boxes are "
            "both subtracted; there is no box for minutes to add back.",
        ],
        "limits": [
            "<li><strong>No seconds.</strong> The page works in whole minutes, which is the "
            "resolution a travel plan or a rota is written in.</li>",
        ],
        "uses": [
            "<li>Finding a departure time from an arrival time.</li>",
            "<li>Working back from the end of a shift to its start.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": "08:00", "hours": 9, "minutes": 30},
             "note": "Nine and a half hours before eight in the morning is 22:30 the previous "
                     "evening: the negative day line is the part that carries the date."},
        ],
    },
    faq=[
        ("Why does the day line say −1?",
         "Because the answer fell on the day before the start date. The clock reading has "
         "wrapped back into the dial and the day line is what keeps the date attached to it."),
        ("Can I subtract a spell longer than a day?",
         "Yes. The day line counts how many days back the answer sits, so thirty-six hours "
         "before nine in the morning reads as −2 days and a clock time."),
        ("What if I want to add instead?",
         "Use the adding page. The two are separate on purpose: a page that both adds and "
         "subtracts needs a sign the visitor has to remember."),
    ],
    related=[("/everyday-life/adding-hours", "Adding hours"),
             ("/everyday-life/adding-hours-and-minutes", "Adding hours and minutes"),
             ("/everyday-life/time-difference", "Time difference")],
    checks=[
        ({"start": "17:30", "hours": 1, "minutes": 45},
         {"result": 945, "day_shift": 0, "minutes_from_midnight": 945}, 0.01),
        ({"start": "08:00", "hours": 9, "minutes": 30},
         {"result": 1350, "day_shift": -1, "minutes_from_midnight": 1350}, 0.01),
    ],
))

# ---------------------------------------------------------------- time adder

SPECS.append(S(
    slug="time-adder",
    name="Time Adder",
    title="Time Adder — Add Four Spells of Hours and Minutes",
    desc="Four rows of hours and minutes added into one total, reported in decimal hours, in "
         "minutes and in seconds, for a rota, a log or a week of short jobs. Formula shown.",
    what="A column of four durations summed. The total is the same figure in three units, so a "
         "timesheet, a spreadsheet and a stopwatch can all be checked against it.",
    fields=[
        F("h1", "Row 1, hours", "h", 1),
        F("m1", "Row 1, minutes", "min", 30),
        F("h2", "Row 2, hours", "h", 2),
        F("m2", "Row 2, minutes", "min", 15),
        F("h3", "Row 3, hours", "h", 0),
        F("m3", "Row 3, minutes", "min", 45),
        F("h4", "Row 4, hours", "h", 3),
        F("m4", "Row 4, minutes", "min", 0),
    ],
    results=[
        R("total_hours", "Total hours", "h"),
        R("total_minutes", "Total minutes", "min"),
        R("total_seconds", "Total seconds", "s"),
    ],
    formula={
        "total_seconds": "(h1 * 60 + m1 + h2 * 60 + m2 + h3 * 60 + m3 + h4 * 60 + m4) * 60",
        "total_minutes": "h1 * 60 + m1 + h2 * 60 + m2 + h3 * 60 + m3 + h4 * 60 + m4",
        "total_hours": "(h1 * 60 + m1 + h2 * 60 + m2 + h3 * 60 + m3 + h4 * 60 + m4) / 60",
    },
    prose={
        "why": "<p>A timesheet is a column of spells, and the column is where the errors live. "
               "Four rows, four carries at sixty, and by the third one most people are adding "
               "sixty-five to a total they wrote down as sixty. The mistakes are small and they "
               "repeat every week.</p>"
               "<p>This page is that column. Four rows of hours and minutes go in, one total "
               "comes out, and the same total is shown in hours, minutes and seconds so it can "
               "be copied into whichever sheet is waiting for it.</p>",
        "formula_note": "Each row is worth its hours times sixty plus its minutes, and the four "
                        "are added in that unit before anything is divided. Adding in minutes "
                        "first is what stops a rounded hour from leaking into the total.",
        "reading": "1 h 30, 2 h 15, 0 h 45 and 3 h 00 come to 7.5 hours, which is 450 minutes "
                   "or 27 000 seconds. A row of zeros is a row you have not used, and it costs "
                   "the total nothing.",
        "example_note": "Leave the unused rows at zero rather than deleting them; the label "
                        "keeps the sheet aligned with the one the hours came from.",
        "pitfalls": [
            "<strong>Adding hours and minutes as two separate columns.</strong> The minutes "
            "column overflows at sixty, and the hours column never learns about the overflow.",
            "<strong>Rounding each row first.</strong> Three rows rounded to a quarter hour can "
            "leave the total a quarter hour away from the truth.",
        ],
        "limits": [
            "<li><strong>Four rows.</strong> A fortnight of shifts needs the total split across "
            "several passes or a spreadsheet; this page is for a day or a week.</li>",
        ],
        "uses": [
            "<li>Adding a day of short jobs into one billable figure.</li>",
            "<li>Checking a rota column against a payroll figure.</li>",
        ],
        "scenarios": [
            {"inputs": {"h1": 2, "m1": 0, "h2": 2, "m2": 0, "h3": 2, "m3": 0, "h4": 2, "m4": 0},
             "note": "Four rows of two hours come to eight, which is the check that the page is "
                     "adding hours rather than minutes."},
        ],
    },
    faq=[
        ("Why four rows?",
         "Because four fits a morning, an afternoon and two extras without scrolling, and the "
         "column on a timesheet is usually four or five lines."),
        ("Should the minutes be written as decimals?",
         "No. The minutes box holds whole minutes, so forty-five minutes goes in as 45. The "
         "decimal version of the total is one of the answers."),
        ("What does the seconds line add for a rota?",
         "Nothing. It is there for the case where the rows come from a stopwatch, and it costs "
         "nothing to show."),
    ],
    related=[("/everyday-life/add-time", "Add time"),
             ("/everyday-life/hours-to-decimal", "Hours to decimal"),
             ("/everyday-life/time-duration", "Time duration")],
    checks=[
        ({"h1": 1, "m1": 30, "h2": 2, "m2": 15, "h3": 0, "m3": 45, "h4": 3, "m4": 0},
         {"total_hours": 7.5, "total_minutes": 450, "total_seconds": 27000}, 0.01),
        ({"h1": 2, "m1": 0, "h2": 2, "m2": 0, "h3": 2, "m3": 0, "h4": 2, "m4": 0},
         {"total_hours": 8, "total_minutes": 480, "total_seconds": 28800}, 0.01),
    ],
))

# ------------------------------------------------------------ time difference

SPECS.append(S(
    slug="time-difference",
    name="Time Difference Calculator",
    title="Time Difference Calculator — Seconds Between Two Times",
    desc="The gap between two clock times in seconds, minutes and hours, with a switch for an "
         "end that falls after midnight. Exact to the second, with the formula shown.",
    what="Two clock readings and the distance between them, in three units at once. The "
         "seconds line is exact, which is what a log or a stopwatch check needs.",
    fields=[
        T("start", "First time", "09:00"),
        T("end", "Second time", "17:30"),
        SEL("overnight", "Does the second time fall on the next day?",
            [("No, same day", 0), ("Yes, past midnight", 1)], 0),
    ],
    results=[
        R("diff_seconds", "Difference in seconds", "s"),
        R("diff_minutes", "Difference in minutes", "min"),
        R("diff_hours", "Difference in hours", "h"),
    ],
    formula={
        "diff_seconds": "(end - start + overnight * 86400000) / 1000",
        "diff_minutes": "(end - start + overnight * 86400000) / 60000",
        "diff_hours": "(end - start + overnight * 86400000) / 3600000",
    },
    prose={
        "why": "<p>Two clock readings are easy to subtract until the second one is smaller than "
               "the first. Then the subtraction gives a negative number, and a negative duration "
               "is not something a log can store or a shift can pay.</p>"
               "<p>The overnight switch resolves it. Tick it and the page adds a full day before "
               "subtracting, which is what actually happened: the second reading belongs to the "
               "next morning. The three answers are the same gap counted in seconds, minutes and "
               "hours.</p>",
        "formula_note": "Both readings arrive as milliseconds, so the difference is already in "
                        "that unit. A ticked overnight box adds 86 400 000 before the division, "
                        "and the three lines divide by 1 000, 60 000 and 3 600 000.",
        "reading": "09:00 to 17:30 is 30 600 seconds, or 510 minutes, or 8.5 hours. 22:00 to "
                   "06:00 with the overnight box ticked is 28 800 seconds, the same as eight "
                   "hours.",
        "example_note": "A log timestamped to the second is the case the seconds line exists for; "
                        "a rota only needs the hours line.",
        "pitfalls": [
            "<strong>Leaving the switch alone.</strong> Without it, 22:00 to 06:00 reads as a "
            "negative gap, which is true arithmetic and useless on a timesheet.",
            "<strong>Reading 8.5 hours as 8 h 50 min.</strong> The decimal is eight and a half "
            "hours, which is 8 h 30.",
        ],
        "limits": [
            "<li><strong>One day at most.</strong> The switch adds a single day, so a gap of "
            "two days belongs to the date-based page.</li>",
        ],
        "uses": [
            "<li>Checking two timestamps in a log.</li>",
            "<li>Timing a night shift that crosses midnight.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": "22:00", "end": "06:00", "overnight": 1},
             "note": "Eight hours across midnight, with the switch doing the work the clock "
                     "reading cannot do on its own."},
        ],
    },
    faq=[
        ("What if the second time is earlier than the first?",
         "Tick the overnight box if it fell on the next day. If it really is an earlier time on "
         "the same day, the page returns a negative gap, which is the honest answer."),
        ("Why give seconds as well as hours?",
         "Because logs and stopwatches record seconds and a rounded hour hides the difference "
         "between 8.49 and 8.51."),
        ("Does it handle 24-hour and 12-hour input?",
         "The picker is a 24-hour dial. Half past five in the afternoon is 17:30, and a quarter "
         "past midnight is 00:15."),
    ],
    related=[("/everyday-life/time-duration", "Time duration"),
             ("/everyday-life/hours-between-two-times", "Hours between two times"),
             ("/everyday-life/clock-duration", "Clock duration")],
    checks=[
        ({"start": "09:00", "end": "17:30", "overnight": 0},
         {"diff_seconds": 30600, "diff_minutes": 510, "diff_hours": 8.5}, 0.01),
        ({"start": "22:00", "end": "06:00", "overnight": 1},
         {"diff_seconds": 28800, "diff_minutes": 480, "diff_hours": 8}, 0.01),
    ],
))

# -------------------------------------------------------- time between dates

SPECS.append(S(
    slug="time-between-dates",
    name="Time Between Dates Calculator",
    title="Time Between Dates — Days, Hours and Minutes",
    desc="Two dates and two clock times subtracted into whole days, total hours and total "
         "minutes, for a delivery window, a deadline or any span that starts and ends mid-day.",
    what="A start date and time and an end date and time, with the gap reported three ways. The "
         "whole days come first because that is how a long span gets described out loud.",
    fields=[
        D("date1", "Start date", "2026-01-15"),
        T("time1", "Start time", "09:00"),
        D("date2", "End date", "2026-10-23"),
        T("time2", "End time", "17:30"),
    ],
    results=[
        R("whole_days", "Whole days", "days"),
        R("total_hours", "Total hours", "h"),
        R("total_minutes", "Total minutes", "min"),
    ],
    formula={
        "whole_days": "floor((date2 - date1 + time2 - time1) / 86400000)",
        "total_hours": "(date2 - date1 + time2 - time1) / 3600000",
        "total_minutes": "(date2 - date1 + time2 - time1) / 60000",
    },
    prose={
        "why": "<p>A contract that runs from nine in the morning on one date to half past five "
               "on another is a number of days plus eight and a half hours, and doing that in "
               "your head is where the off-by-one lives. Count the start day, count the end day, "
               "argue about whether either counts.</p>"
               "<p>The page subtracts the dates and the times together and reports the same span "
               "in days, hours and minutes, so a window written in days can be checked against a "
               "schedule written in hours.</p>",
        "formula_note": "A date and a clock time both arrive as milliseconds, so the two pairs "
                        "subtract directly. The whole-day line takes the floor of that span over "
                        "86 400 000 and the other two lines divide it by an hour and a minute.",
        "reading": "15 January at 09:00 to 23 October at 17:30 is 281 whole days, which is "
                   "6 752.5 hours or 405 150 minutes. The half day is the eight and a half hours "
                   "between the two clock times.",
        "example_note": "The decimal in the hours line is the leftover part of a day, not a "
                        "rounding error: 6 752.5 hours is 6 752 hours and 30 minutes.",
        "pitfalls": [
            "<strong>Ignoring the clock times.</strong> Two dates alone give a whole number of "
            "days; the times are what turn it into a span with a half day in it.",
            "<strong>Counting both end dates.</strong> The span is a subtraction, so the second "
            "date is a boundary rather than an extra day.",
        ],
        "limits": [
            "<li><strong>No working-day count.</strong> Every calendar day counts, weekends "
            "included; the working-days page is the other question.</li>",
        ],
        "uses": [
            "<li>A deadline that runs to a time of day.</li>",
            "<li>Converting a contract term into billable hours.</li>",
        ],
        "scenarios": [
            {"inputs": {"date1": "2020-01-01", "time1": "00:00",
                        "date2": "2020-01-02", "time2": "06:00"},
             "note": "One day and six hours is 30 hours total: the day line reads 1 and the "
                     "hours line keeps the extra six."},
        ],
    },
    faq=[
        ("Why give both days and hours?",
         "Because a long span is described in days and a short one in hours, and the same "
         "subtraction produces both. Neither is more correct than the other."),
        ("Are the clock times optional?",
         "No. Leave one blank and nothing is computed, rather than the page quietly assuming "
         "midnight."),
        ("Does it handle a span that ends before it starts?",
         "Yes. A negative span comes back as a negative number of hours, which is the honest "
         "answer and a sign the dates were swapped."),
    ],
    related=[("/everyday-life/days-between-dates", "Days between dates"),
             ("/everyday-life/time-duration", "Time duration"),
             ("/everyday-life/day-counter", "Day counter")],
    checks=[
        ({"date1": "2026-01-15", "time1": "09:00", "date2": "2026-10-23", "time2": "17:30"},
         {"whole_days": 281, "total_hours": 6752.5, "total_minutes": 405150}, 0.01),
        ({"date1": "2020-01-01", "time1": "00:00", "date2": "2020-01-02", "time2": "06:00"},
         {"whole_days": 1, "total_hours": 30, "total_minutes": 1800}, 0.01),
    ],
))

# ------------------------------------------------- hours between two times

SPECS.append(S(
    slug="hours-between-two-times",
    name="Hours Between Two Times Calculator",
    title="Hours Between Two Times — Paid Hours With a Break",
    desc="The hours between two clock times with a break taken off, reported as paid hours, "
         "paid minutes and the gross span, for a shift, a sitting or a session. Formula shown.",
    what="A shift length minus a break. The gross figure is there to check the subtraction, and "
         "the paid figure is the one that goes on the sheet.",
    fields=[
        T("start", "Start time", "09:00"),
        T("end", "End time", "17:30"),
        F("break_minutes", "Break taken", "min", 30),
        SEL("overnight", "Does the shift end after midnight?",
            [("No, same day", 0), ("Yes, next morning", 1)], 0),
    ],
    results=[
        R("paid_hours", "Paid hours", "h"),
        R("paid_minutes", "Paid minutes", "min"),
        R("gross_hours", "Gross hours before the break", "h"),
    ],
    formula={
        "gross_hours": "mod(end - start + overnight * 86400000, 86400000) / 3600000",
        "paid_hours": "mod(end - start + overnight * 86400000, 86400000) / 3600000 - break_minutes / 60",
        "paid_minutes": "mod(end - start + overnight * 86400000, 86400000) / 60000 - break_minutes",
    },
    prose={
        "why": "<p>An unpaid break is the small print of every shift. The clock says nine to "
               "half past five, which is eight and a half hours, and the payslip says eight, "
               "because half an hour was not worked. Both figures are true and only one is "
               "payable.</p>"
               "<p>The page keeps them apart. Gross hours is what the clock says, paid hours is "
               "what is left after the break, and the minutes line is the same figure in the "
               "unit a payroll system stores.</p>",
        "formula_note": "The span is the difference between the two readings, wrapped into one "
                        "day when the shift crosses midnight. The break is converted from "
                        "minutes into hours only on the paid-hours line, which is why the gross "
                        "line stays whole.",
        "reading": "09:00 to 17:30 is 8.5 hours gross. Take off thirty minutes and the paid "
                   "figure is 8.0 hours, or 480 minutes. A night shift of 22:00 to 06:00 with a "
                   "forty-five minute break pays 7.25 hours.",
        "example_note": "The gross line is worth keeping in view: a paid figure that looks wrong "
                        "is usually a break typed as 3 instead of 30.",
        "pitfalls": [
            "<strong>Typing the break in hours.</strong> The box asks for minutes, so half an "
            "hour is 30 and not 0.5.",
            "<strong>Forgetting the overnight switch.</strong> A shift ending at 06:00 is a "
            "negative span without it, which pays nothing.",
        ],
        "limits": [
            "<li><strong>One break per shift.</strong> Two breaks are one figure added together "
            "in the box before it goes in.</li>",
        ],
        "uses": [
            "<li>A shift with an unpaid lunch break.</li>",
            "<li>A tutoring or care session with a pause in the middle.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": "22:00", "end": "06:00", "break_minutes": 45, "overnight": 1},
             "note": "A night shift of eight gross hours pays seven and a quarter once the "
                     "forty-five minute break is off."},
        ],
    },
    faq=[
        ("Is the break taken off the clock time or the paid time?",
         "The paid time. Gross hours stay as the clock reads, and the break is subtracted from "
         "the answer rather than moved around the dial."),
        ("What if the break is paid?",
         "Put zero in the break box. The paid figure then matches the gross figure."),
        ("Why does the answer have four decimals?",
         "Because a paid hour can be a fraction of an hour and payroll usually wants it to two "
         "decimals. Round it there rather than here."),
    ],
    related=[("/everyday-life/time-duration", "Time duration"),
             ("/everyday-life/count-hours", "Count hours"),
             ("/everyday-life/hours-to-decimal", "Hours to decimal")],
    checks=[
        ({"start": "09:00", "end": "17:30", "break_minutes": 30, "overnight": 0},
         {"paid_hours": 8, "paid_minutes": 480, "gross_hours": 8.5}, 0.01),
        ({"start": "22:00", "end": "06:00", "break_minutes": 45, "overnight": 1},
         {"paid_hours": 7.25, "paid_minutes": 435, "gross_hours": 8}, 0.01),
    ],
))

# ---------------------------------------------- minutes between two times

SPECS.append(S(
    slug="minutes-between-two-times",
    name="Minutes Between Two Times Calculator",
    title="Minutes Between Two Times — Total and Hours Left Over",
    desc="The gap between two clock times counted in minutes, with the whole hours and the "
         "minutes left over shown beside it. Handles a gap that runs past midnight. Formula shown.",
    what="One gap, three readings: the total in minutes, the whole hours inside it and the "
         "minutes left over. The shape a timer, a parking meter or a meeting room booking uses.",
    fields=[
        T("start", "First time", "09:00"),
        T("end", "Second time", "17:30"),
        SEL("overnight", "Does the second time fall on the next day?",
            [("No, same day", 0), ("Yes, past midnight", 1)], 0),
    ],
    results=[
        R("total_minutes", "Total minutes", "min"),
        R("full_hours", "Whole hours", "h"),
        R("extra_minutes", "Minutes left over", "min"),
    ],
    formula={
        "total_minutes": "mod(end - start + overnight * 86400000, 86400000) / 60000",
        "full_hours": "floor(mod(end - start + overnight * 86400000, 86400000) / 3600000)",
        "extra_minutes": "mod(end - start + overnight * 86400000, 86400000) / 60000 - floor(mod(end - start + overnight * 86400000, 86400000) / 3600000) * 60",
    },
    prose={
        "why": "<p>Minutes are the unit that fits on a meter. A parking stay, a room booking and "
               "a cooking time are all counted in minutes, and all three get read back to a "
               "person as hours and minutes. The two readings describe the same gap and the page "
               "gives both.</p>"
               "<p>The leftover line is the one that catches people out. 510 minutes is eight "
               "hours thirty, not eight hours fifty, and the split makes that impossible to "
               "misread.</p>",
        "formula_note": "The gap arrives in milliseconds. Dividing by 60 000 gives the total in "
                        "minutes; the floor division by 3 600 000 gives the whole hours; the "
                        "leftover is the total minus those hours brought back to minutes.",
        "reading": "09:00 to 17:30 is 510 minutes, which is eight whole hours and thirty "
                   "minutes left over. 22:00 to 06:00 with the overnight switch ticked is 480 "
                   "minutes, eight hours exactly, with nothing left over.",
        "example_note": "A booking written as \"up to 8 hours\" is 480 minutes; anything past "
                        "that is the overtime line on the meter.",
        "pitfalls": [
            "<strong>Reading the total as hours.</strong> 510 minutes is not 5 h 10; it is "
            "eight and a half hours.",
            "<strong>Leaving the switch off across midnight.</strong> The gap comes out "
            "negative and the leftover line looks absurd.",
        ],
        "limits": [
            "<li><strong>One day at most.</strong> The overnight switch adds a single day; a "
            "longer gap needs the date-based pages.</li>",
        ],
        "uses": [
            "<li>Checking a parking meter against a booking.</li>",
            "<li>Splitting a long session into hours and minutes for a log.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": "23:15", "end": "00:45", "overnight": 1},
             "note": "Ninety minutes across midnight: one whole hour and thirty minutes left "
                     "over, with the switch carrying the day."},
        ],
    },
    faq=[
        ("Why show the total and the split?",
         "Because the total is what a meter or a spreadsheet stores and the split is what a "
         "person says out loud. One line cannot serve both."),
        ("What happens when the minutes divide exactly?",
         "The leftover line reads zero. That is a real answer, not a missing one."),
        ("Can the total be more than 1 440?",
         "Not without a second day, which the overnight switch does not provide. Use the "
         "date-based page for anything longer."),
    ],
    related=[("/everyday-life/hours-between-two-times", "Hours between two times"),
             ("/everyday-life/time-difference", "Time difference"),
             ("/everyday-life/add-minutes", "Add minutes")],
    checks=[
        ({"start": "09:00", "end": "17:30", "overnight": 0},
         {"total_minutes": 510, "full_hours": 8, "extra_minutes": 30}, 0.01),
        ({"start": "23:15", "end": "00:45", "overnight": 1},
         {"total_minutes": 90, "full_hours": 1, "extra_minutes": 30}, 0.01),
    ],
))

# -------------------------------------------------------------- clock duration

SPECS.append(S(
    slug="clock-duration",
    name="Clock Duration Calculator",
    title="Clock Duration — Hours, Minutes and Seconds Between Times",
    desc="Start and end clock times read as a duration in whole hours, whole minutes and total "
         "seconds, so an odd-minute gap can be written down the way a clock shows it.",
    what="A gap written as a clock duration: how many hours, how many minutes into the hour, "
         "and the exact count of seconds underneath both.",
    fields=[
        T("start", "Start time", "09:13"),
        T("end", "End time", "17:47"),
        SEL("overnight", "Does the end time fall on the next day?",
            [("No, same day", 0), ("Yes, past midnight", 1)], 0),
    ],
    results=[
        R("hours_part", "Whole hours", "h"),
        R("minutes_part", "Minutes into the hour", "min"),
        R("total_seconds", "Total seconds", "s"),
    ],
    formula={
        "total_seconds": "mod(end - start + overnight * 86400000, 86400000) / 1000",
        "hours_part": "floor(mod(end - start + overnight * 86400000, 86400000) / 3600000)",
        "minutes_part": "floor(mod(mod(end - start + overnight * 86400000, 86400000) / 60000, 60))",
    },
    prose={
        "why": "<p>A duration has two habits. A person says eight hours thirty-four; a machine "
               "stores 30 840 seconds. Both are right, and a page that gives only one of them "
               "makes the other a conversion somebody does in their head at the end of a day.</p>"
               "<p>The three lines here are the clock reading and its exact total. The minutes "
               "line is minutes into the hour, not the total count, so 8 h 34 min reads as 8 and "
               "34 rather than 8 and 514.</p>",
        "formula_note": "The gap is taken in milliseconds and wrapped into one day. Dividing by "
                        "3 600 000 and taking the floor gives whole hours; the remainder divided "
                        "by 60 000 and taken modulo sixty gives the minutes into that hour.",
        "reading": "09:13 to 17:47 is 8 h 34 min, which is 30 840 seconds. Forty minutes before "
                   "midnight to twenty-five past is 45 minutes across the day line.",
        "example_note": "Odd start times are the reason this page exists: a quarter past nine to "
                        "a quarter past five is the easy case, and the odd minutes are where "
                        "people reach for paper.",
        "pitfalls": [
            "<strong>Reading the minutes line as a total.</strong> It is minutes into the last "
            "whole hour, so it never goes above fifty-nine.",
            "<strong>Forgetting the seconds line when a stopwatch is involved.</strong> The "
            "rounded duration can be a minute short of the exact one.",
        ],
        "limits": [
            "<li><strong>No date.</strong> A duration longer than a day needs the date-based "
            "page, because this one wraps at midnight.</li>",
        ],
        "uses": [
            "<li>Writing an odd-minute gap onto a log.</li>",
            "<li>Checking a timed exam or a race against the clock reading.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": "23:40", "end": "00:25", "overnight": 1},
             "note": "Forty-five minutes across midnight comes out as 0 hours, 45 minutes and "
                     "2 700 seconds."},
        ],
    },
    faq=[
        ("Why are there three answers for one gap?",
         "Because a clock reading, a rounded duration and an exact stopwatch count are three "
         "different things a person can need from the same subtraction."),
        ("What does the minutes line do with a gap of 8 h 34 min?",
         "It reports 34 — minutes into the last whole hour — rather than 514, which is the "
         "total and belongs on the other page."),
        ("Can the start time be later than the end time?",
         "Only with the overnight switch. Without it the subtraction is negative and the page "
         "wraps the clock reading in a way that will not match the day you had in mind."),
    ],
    related=[("/everyday-life/time-difference", "Time difference"),
             ("/everyday-life/minutes-between-two-times", "Minutes between two times"),
             ("/everyday-life/time-duration", "Time duration")],
    checks=[
        ({"start": "09:13", "end": "17:47", "overnight": 0},
         {"hours_part": 8, "minutes_part": 34, "total_seconds": 30840}, 0.01),
        ({"start": "23:40", "end": "00:25", "overnight": 1},
         {"hours_part": 0, "minutes_part": 45, "total_seconds": 2700}, 0.01),
    ],
))

# --------------------------------------------------------------- elapsed time

SPECS.append(S(
    slug="elapsed-time",
    name="Elapsed Time Calculator",
    title="Elapsed Time Calculator — With a Break Taken Off",
    desc="Elapsed time from a start and an end clock time, minus a break, reported as decimal "
         "hours, minutes and the duration written on the clock face. Formula shown.",
    what="How long something took, once a pause is taken out. The duration itself is shown as a "
         "clock value as well as in hours and minutes, so it can be copied straight into a log.",
    fields=[
        T("start", "Start time", "08:00"),
        T("end", "End time", "16:30"),
        F("break_minutes", "Pause to take off", "min", 45),
        SEL("overnight", "Does the end time fall on the next day?",
            [("No, same day", 0), ("Yes, past midnight", 1)], 0),
    ],
    results=[
        R("elapsed_hours", "Elapsed hours", "h"),
        R("elapsed_minutes", "Elapsed minutes", "min"),
        RT("elapsed_clock", "Elapsed time on the clock"),
    ],
    formula={
        "elapsed_minutes": "mod(end - start + overnight * 86400000, 86400000) / 60000 - break_minutes",
        "elapsed_hours": "mod(end - start + overnight * 86400000, 86400000) / 3600000 - break_minutes / 60",
        "elapsed_clock": "mod(end - start + overnight * 86400000, 86400000) - break_minutes * 60000",
    },
    prose={
        "why": "<p>Elapsed time is what a job actually took, and the pause in the middle is what "
               "makes the subtraction awkward. A start at eight, an end at half past four and a "
               "forty-five minute stop is not a subtraction you want to do twice.</p>"
               "<p>The page takes the pause out and shows the rest three ways: as a decimal, as "
               "minutes, and as a clock value like 07:45 that can be written straight onto a "
               "sheet.</p>",
        "formula_note": "The clock difference is wrapped into one day, the pause is converted "
                        "from minutes into milliseconds and subtracted on every line, and the "
                        "clock line leaves the answer in milliseconds so the page can draw it as "
                        "a duration rather than a number.",
        "reading": "Eight in the morning to half past four is eight and a half hours; take off "
                   "forty-five minutes and the elapsed time is 7.75 hours, 465 minutes or 07:45 "
                   "on the clock.",
        "example_note": "The clock line is the one to copy: it is already in the form a "
                        "time sheet holds, with no decimal point to argue about.",
        "pitfalls": [
            "<strong>Taking the pause off twice.</strong> It is subtracted on every line at once, "
            "so it should be typed once and not adjusted for.",
            "<strong>Assuming the clock line is an arrival time.</strong> It is a duration, so "
            "07:45 means seven and three-quarter hours, not a quarter to eight.",
        ],
        "limits": [
            "<li><strong>One pause.</strong> Several pauses go in as their sum.</li>",
        ],
        "uses": [
            "<li>Timing a repair that included a parts run.</li>",
            "<li>Recording study time with a break in the middle.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": "09:00", "end": "12:30", "break_minutes": 15, "overnight": 0},
             "note": "Three and a half hours less a quarter of an hour is 3.25 hours, written "
                     "as 03:15 on the clock line."},
        ],
    },
    faq=[
        ("Why is the elapsed time shown on a clock face?",
         "Because the form people copy onto paper is 07:45, not 7.75. The decimal is there for "
         "the multiplication that comes next."),
        ("Does a zero pause break anything?",
         "No. Zero means the elapsed time is the whole span, and the clock line matches the "
         "start-to-end difference exactly."),
        ("Can the end be on the next day?",
         "Yes, with the overnight switch. A shift that finishes at 02:00 then reports the hours "
         "actually worked."),
    ],
    related=[("/everyday-life/hours-between-two-times", "Hours between two times"),
             ("/everyday-life/time-duration", "Time duration"),
             ("/everyday-life/clock-duration", "Clock duration")],
    checks=[
        ({"start": "08:00", "end": "16:30", "break_minutes": 45, "overnight": 0},
         {"elapsed_hours": 7.75, "elapsed_minutes": 465, "elapsed_clock": 465}, 0.01),
        ({"start": "09:00", "end": "12:30", "break_minutes": 15, "overnight": 0},
         {"elapsed_hours": 3.25, "elapsed_minutes": 195, "elapsed_clock": 195}, 0.01),
    ],
))

# --------------------------------------------------------------- time in between

SPECS.append(S(
    slug="time-in-between",
    name="Time in Between Calculator",
    title="Time in Between — The Midpoint of Two Clock Times",
    desc="The time exactly halfway between two clock times, with the length of each half in "
         "hours and minutes, for splitting a shift or meeting in the middle. Formula shown.",
    what="The midpoint of two readings on the dial, and the distance from each end to it. "
         "Halfway between nine and half past five is a quarter past one.",
    fields=[
        T("start", "First time", "09:00"),
        T("end", "Second time", "17:30"),
        SEL("overnight", "Does the second time fall on the next day?",
            [("No, same day", 0), ("Yes, past midnight", 1)], 0),
    ],
    results=[
        RT("middle", "Time halfway between"),
        R("gap_hours", "Length of each half", "h"),
        R("gap_minutes", "Length of each half", "min"),
    ],
    formula={
        "middle": "mod(start + mod(end - start + overnight * 86400000, 86400000) / 2, 86400000)",
        "gap_hours": "mod(end - start + overnight * 86400000, 86400000) / 7200000",
        "gap_minutes": "mod(end - start + overnight * 86400000, 86400000) / 120000",
    },
    prose={
        "why": "<p>Meeting in the middle of a gap sounds like a division until the gap crosses "
               "midnight, and then it is a division and a wrap. Two people four and a half hours "
               "apart meet two and a quarter hours from each end, and the clock time that comes "
               "out is not the average of the two numbers on its face.</p>"
               "<p>The page returns the midpoint as a clock reading and the length of each half, "
               "so a split shift or a handover can be timed without a spreadsheet.</p>",
        "formula_note": "The gap is taken modulo one day, halved, and added to the start before "
                        "the result is wrapped back onto the dial. Halving before adding is what "
                        "keeps the midpoint inside the day the gap belongs to.",
        "reading": "Halfway between 09:00 and 17:30 is 13:15, which is four and a quarter hours "
                   "from each end. Halfway between 22:00 and 06:00 is 02:00, four hours from "
                   "each.",
        "example_note": "The half-length line is the one to check: add it to the start and "
                        "you are at the midpoint, add it again and you are at the end.",
        "pitfalls": [
            "<strong>Averaging the two readings.</strong> Nine and seventeen and a half is not "
            "thirteen unless the half has been added properly to the start.",
            "<strong>Ignoring the midnight crossing.</strong> Halfway between ten at night and "
            "six in the morning is two, and the switch is what says so.",
        ],
        "limits": [
            "<li><strong>Two ends only.</strong> A handover between three people is two runs of "
            "this page, one gap at a time.</li>",
        ],
        "uses": [
            "<li>Splitting a long shift between two people.</li>",
            "<li>Timing a handover halfway through a night watch.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": "22:00", "end": "06:00", "overnight": 1},
             "note": "The midpoint of a night that runs ten to six is two in the morning, four "
                     "hours from either end."},
        ],
    },
    faq=[
        ("Why is the answer a clock time rather than a number?",
         "Because the question is where the middle falls on the dial, not how long it is. The "
         "two length lines answer the second question."),
        ("What if the gap is an odd number of minutes?",
         "The midpoint lands on a half minute and the clock line rounds to the minute the picker "
         "can show. The length lines keep the exact figure."),
        ("Does it work across midnight?",
         "Yes, with the overnight switch ticked. Without it, ten to six reads as a negative gap "
         "and the midpoint has no meaning."),
    ],
    related=[("/everyday-life/time-difference", "Time difference"),
             ("/everyday-life/time-duration", "Time duration"),
             ("/everyday-life/minutes-between-two-times", "Minutes between two times")],
    checks=[
        ({"start": "09:00", "end": "17:30", "overnight": 0},
         {"middle": 795, "gap_hours": 4.25, "gap_minutes": 255}, 0.01),
        ({"start": "22:00", "end": "06:00", "overnight": 1},
         {"middle": 120, "gap_hours": 4, "gap_minutes": 240}, 0.01),
    ],
))

# ----------------------------------------------------------------- count hours

SPECS.append(S(
    slug="count-hours",
    name="Count Hours Calculator",
    title="Count Hours — Total Hours Over a Number of Days",
    desc="The hours in one day's shift, repeated over a number of days, reported as hours per "
         "day, total hours and total minutes, for a payslip, a course or a project. Formula shown.",
    what="One day's hours multiplied out over a run of days. A break is taken off before the "
         "multiplication, so the total is paid time rather than clock time.",
    fields=[
        T("start", "Shift start", "09:00"),
        T("end", "Shift end", "17:30"),
        F("break_minutes", "Break each day", "min", 30),
        F("days", "Days worked", "days", 20),
    ],
    results=[
        R("hours_per_day", "Hours per day", "h"),
        R("total_hours", "Total hours", "h"),
        R("total_minutes", "Total minutes", "min"),
    ],
    formula={
        # the wrap is in the line so a shift can never read past a day, and the
        # millisecond literal also tells the solver the boxes arrive raw
        "hours_per_day": "mod(end - start - break_minutes * 60000, 86400000) / 3600000",
        "total_hours": "days * mod(end - start - break_minutes * 60000, 86400000) / 3600000",
        "total_minutes": "days * mod(end - start - break_minutes * 60000, 86400000) / 60000",
    },
    prose={
        "why": "<p>A month of shifts is one multiplication, and the multiplication is only right "
               "if the daily figure is right. Nine to half past five less half an hour is eight "
               "hours; twenty of those is a hundred and sixty, not a hundred and seventy.</p>"
               "<p>The page shows the daily figure beside the total for that reason. If the total "
               "looks wrong the daily line usually shows why, and a break typed as three instead "
               "of thirty is visible there and invisible in the total.</p>",
        "formula_note": "The day's span is taken from the two clock readings and the break is "
                        "converted from minutes and subtracted. Both totals are that daily "
                        "figure multiplied by the day count, one in hours and one in minutes.",
        "reading": "Nine to half past five with a thirty-minute break is eight hours a day: "
                   "twenty days come to 160 hours, or 9 600 minutes. Five days of the same shift "
                   "come to 40 hours.",
        "example_note": "The day count is a count of shifts worked, not calendar days, so a "
                        "month with a week off is 15 rather than 20.",
        "pitfalls": [
            "<strong>Counting calendar days.</strong> The box asks for days worked; weekends and "
            "leave are not shifts.",
            "<strong>Leaving the break at zero on a shift that has one.</strong> The total then "
            "runs high by the break times the days, which is the error nobody notices.",
        ],
        "limits": [
            "<li><strong>Identical days.</strong> A pattern with different hours each day needs "
            "the time adder, one line per shift.</li>",
        ],
        "uses": [
            "<li>Converting a rota into a monthly figure.</li>",
            "<li>Costing a course that runs the same hours daily.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": "08:00", "end": "16:00", "break_minutes": 0, "days": 5},
             "note": "Eight hours with no break over five days is 40 hours, the standard week "
                     "the page is usually checked against."},
        ],
    },
    faq=[
        ("Are the days calendar days or shifts?",
         "Shifts. Five rows on the rota is 5, whatever the calendar says."),
        ("Can the total go over a month?",
         "Yes. The day count has no ceiling, so a six-week placement is 30 shifts rather than a "
         "second calculation."),
        ("Why show minutes as well as hours?",
         "Because payroll systems store minutes, and a total of 160 hours is 9 600 minutes when "
         "it is asked for in the other unit."),
    ],
    related=[("/everyday-life/hours-between-two-times", "Hours between two times"),
             ("/everyday-life/hours-to-decimal", "Hours to decimal"),
             ("/everyday-life/time-duration", "Time duration")],
    checks=[
        ({"start": "09:00", "end": "17:30", "break_minutes": 30, "days": 20},
         {"hours_per_day": 8, "total_hours": 160, "total_minutes": 9600}, 0.01),
        ({"start": "08:00", "end": "16:00", "break_minutes": 0, "days": 5},
         {"hours_per_day": 8, "total_hours": 40, "total_minutes": 2400}, 0.01),
    ],
))
