"""Everyday-life batch N: dates, anniversaries and the calendar.

The date boxes are calendar-day values; every calculation below is performed on
those values, with leap years and month-end clamping left to the calendar helpers.
"""
from __future__ import annotations

from lib import D, F, R, RD, S, SEL

SPECS: list = []

# A small shared editorial scaffold, then distinct page-specific copy for each
# calculator. The build layer adds worked arithmetic, sensitivity, limits,
# examples, FAQs and the live formula table from each page's own expressions.
def page(slug, name, title, desc, what, fields, results, formula, checks,
         why, reading, formula_note, extra, faq, related, scenarios=(),
         pitfalls=(), limits=(), uses=()):
    SPECS.append(S(
        slug=slug, name=name, title=title, desc=desc, what=what,
        fields=fields, results=results, formula=formula,
        prose={
            "why": why,
            "formula_note": formula_note,
            "reading": reading,
            "example_note": extra.split("</p>")[0].replace("<p>", ""),
            "extra_title": "The calendar detail behind this answer",
            "extra": extra,
            "pitfalls": list(pitfalls) or [
                "<strong>Mixing elapsed days with inclusive dates.</strong> Subtracting dates gives the distance between them. Counting both endpoints adds one, which is right for a list of dates and wrong for nights away.",
                "<strong>Assuming a month is thirty days.</strong> Month lengths vary, and an anniversary can land on the last day of a shorter month.",
            ],
            "limits": list(limits) or [
                "<li><strong>Calendar dates, not local clock hours.</strong> Daylight-saving changes and time zones do not alter a date-only result.</li>",
                "<li><strong>Named conventions matter.</strong> If a contract, school or workplace defines its own first and last day, use that wording rather than guessing.</li>",
            ],
            "uses": list(uses) or [
                "<li>Checking an event or filing date against a calendar.</li>",
                "<li>Comparing a result with a paper diary before relying on it.</li>",
            ],
            "scenarios": list(scenarios),
        },
        faq=list(faq), related=list(related), checks=checks,
    ))

# -------------------------------------------------------------- one date
page(
    "date", "Date Calculator", "Date Calculator — Day, Month and Weekday",
    "Read a calendar date as its year, month, day, weekday and position in the year. Enter one date; the calendar fields come back as separate results, ready to check.",
    "A date is more than a string on a form. This page reads one calendar day and returns its parts, including the weekday and its ordinal place in the year.",
    [D("date", "Calendar date", "2026-10-23")],
    [R("year", "Year"), R("month", "Month number", "1–12"), R("day", "Day of month"),
     R("weekday", "Weekday (Sunday is 0)"), R("day_year", "Day of year", "1–366")],
    {"year": "getYear(date)", "month": "getMonth(date) + 1", "day": "getDate(date)",
     "weekday": "getDayOfWeek(date)", "day_year": "getDayOfYear(date) + 1"},
    [({"date": "2026-10-23"}, {"year": 2026, "month": 10, "day": 23, "weekday": 5, "day_year": 296}, .001),
     ({"date": "2027-02-28"}, {"year": 2027, "month": 2, "day": 28, "weekday": 0, "day_year": 59}, .001)],
    "The date picker stores a day, not a time of day. Splitting it with calendar functions avoids a common trap: the weekday is not safely inferred from the day number in the month. February 28 can be a Sunday in one year and a Wednesday in another. The result also gives the ordinal day, which is useful in logs and schedules that run by year.",
    "For 23 October 2026, the fields are year 2026, month 10, day 23, Friday (5 when Sunday is zero), and day 296 of the year. The next check uses 28 February 2027, a Sunday and the fifty-ninth day.",
    "The calendar functions read the year, zero-based month, day, weekday and zero-based day-of-year from the input. The page adds one to the month and ordinal day because people number both from one.",
    "A date-only field has no timezone attached. If a timestamp near midnight is first converted in another timezone, it may become the previous or following calendar day; this page cannot recover that lost context. For a printed form, use the date as shown in the governing calendar. For a timestamp, convert to the intended local zone first, then use its date. The weekday result follows the Gregorian calendar represented by the browser and server. It does not infer a historical calendar system or a locale-specific week numbering rule. Day-of-year begins at 1 January, so 1 January is day one even in a leap year, and the later dates shift by one after 29 February.",
    [("Does Sunday equal zero?", "Yes. The weekday result uses Sunday 0, Monday 1, through Saturday 6."),
     ("Is day of year zero-based?", "No. It is reported from 1 through 365 or 366; 1 January is day 1."),
     ("Does leap year change the result?", "It changes the ordinal day after 28 February and permits 29 February."),
     ("Does this include a time zone?", "No. The input is a calendar date, without a time or zone." )],
    [("/everyday-life/days-between-dates", "Days between dates"), ("/everyday-life/day-of-the-year", "Day of the year"), ("/everyday-life/calendar", "Calendar calculator")],
)

# ----------------------------------------------------------- date countdown
page(
    "date-countdown", "Date Countdown Calculator", "Date Countdown — Days Until a Date",
    "Count the calendar days from a reference date to a target, then see that same interval in weeks, hours and minutes. Both dates stay visible in the calculation.",
    "A countdown is a difference between two calendar days. Choose the date to count from and the date you are waiting for; the page shows the distance in four units.",
    [D("today", "Count from", "2026-10-23"), D("target", "Target date", "2026-12-25")],
    [R("days", "Days until target", "days"), R("weeks", "Weeks", "weeks"), R("hours", "Hours", "hours"), R("minutes", "Minutes", "minutes")],
    {"days": "target - today", "weeks": "(target - today) / 7", "hours": "(target - today) * 24", "minutes": "(target - today) * 1440"},
    [({"today": "2026-10-23", "target": "2026-12-25"}, {"days": 63, "weeks": 9, "hours": 1512, "minutes": 90720}, .001),
     ({"today": "2026-01-01", "target": "2026-12-31"}, {"days": 364, "weeks": 52, "hours": 8736, "minutes": 524160}, .001)],
    "A countdown needs a start point. A page that silently assumes today becomes stale in a saved link or a printed plan, so both dates are inputs. The result is elapsed calendar days, not a count of named dates with both ends included. Weeks, hours and minutes are unit conversions of that same interval; they do not introduce extra precision into a date-only question.",
    "From 23 October to 25 December 2026 is 63 elapsed days: exactly nine weeks, or 1,512 hours. From 1 January to 31 December is 364 days between the dates, although 365 calendar dates appear if both endpoints are listed.",
    "Subtract the start day number from the target day number. Divide by seven for weeks, then multiply by 24 or 1,440 for hours or minutes. Those are calendar-unit equivalents, not elapsed clock time across a daylight-saving change.",
    "When the countdown is for a deadline, check whether the first day is excluded by the rule that governs it. Many notice periods start the day after service; many informal plans count today as day one. The arithmetic here states the distance, leaving the convention visible instead of choosing one on your behalf. A past target returns a negative interval, which is useful for seeing how late something is. A zero means both fields identify the same date. If the event begins at a particular local time, use a time-aware calculation; multiplying date distance by 24 assumes ordinary 24-hour calendar days.",
    [("Is today counted?", "The answer is elapsed days from the start date; the start date itself is not an extra day."),
     ("Why does a year-end countdown show 364?", "31 December is 364 days after 1 January. Listing both dates gives 365 date labels."),
     ("Can I count down to a past date?", "Yes. The signed result becomes negative, showing the target has passed."),
     ("Are the hours exact across daylight saving?", "They are 24 times the calendar-day interval; they are not a time-zone-aware elapsed-hour count.")],
    [("/everyday-life/days-between-dates", "Days between dates"), ("/everyday-life/birthday-countdown", "Birthday countdown"), ("/everyday-life/deadline", "Deadline calculator")],
)

# --------------------------------------------------------------- date to date
page(
    "date-to-date", "Date to Date Calculator", "Date to Date — Days, Weeks and Months",
    "Compare two calendar dates as elapsed days and weeks, plus approximate months and years. The day count is exact; the average-month conversions are labelled as estimates.",
    "Two dates can be compared exactly in days, then expressed in weeks, average months and average years. The distinction matters because months do not have a fixed length.",
    [D("date1", "From", "2026-01-01"), D("date2", "To", "2026-12-31")],
    [R("days", "Elapsed days", "days"), R("weeks", "Weeks", "weeks"), R("months", "Approximate months", "months"), R("years", "Approximate years", "years"), R("inclusive", "Dates including both ends", "dates"), R("hours", "Equivalent hours", "hours")],
    {"days": "date2 - date1", "weeks": "(date2 - date1) / 7", "months": "(date2 - date1) / 30.436875", "years": "(date2 - date1) / 365.2425", "inclusive": "date2 - date1 + 1", "hours": "(date2 - date1) * 24"},
    [({"date1": "2026-01-01", "date2": "2026-12-31"}, {"days": 364, "weeks": 52, "months": 11.9589, "years": .9966, "inclusive": 365, "hours": 8736}, .01),
     ({"date1": "2024-02-28", "date2": "2024-03-01"}, {"days": 2, "inclusive": 3, "hours": 48}, .001)],
    "A date range has two legitimate counts. Elapsed days measure the distance from the first date to the second; inclusive dates count every calendar square touched. A stay from Monday to Friday is four nights but five named dates. This page keeps both numbers beside each other, then gives approximate larger units without pretending a month has a universal length.",
    "The 2026 calendar year from 1 January to 31 December spans 364 elapsed days and 365 inclusive dates. That is 52 weeks, 11.9589 average months and 0.9966 average years. A range across leap day is counted by the actual calendar-day difference.",
    "The first two dates are subtracted. The exact difference is divided by seven, 30.436875 average days per Gregorian month, or 365.2425 average days per Gregorian year. Inclusive dates add one to the day difference.",
    "Use the exact day line for booking nights, age intervals or a notice period measured in days. Treat the month and year lines as a conversion for scale, not as anniversary arithmetic. Ten calendar months can contain different numbers of days depending on where they start. To ask how many complete calendar months have passed, use a month-anniversary method instead. The hours line is a mathematical equivalence of 24 hours per date; local clock transitions can make the elapsed wall-clock hours differ by one where daylight-saving rules apply. Always keep the endpoint convention with the number when sharing it.",
    [("Why are months approximate?", "A month can contain 28, 29, 30 or 31 days, so this page divides by an average month length."),
     ("What does inclusive mean?", "It counts both the first and last date as calendar dates, adding one to the elapsed difference."),
     ("Does leap day count?", "Yes. The day subtraction follows the actual Gregorian dates, including 29 February."),
     ("Are years always 365 days here?", "The approximate-year conversion uses 365.2425 days, the Gregorian average.")],
    [("/everyday-life/days-between-dates", "Days between dates"), ("/everyday-life/months-between-dates", "Months between dates"), ("/everyday-life/number-days", "Number of days")],
)

# -------------------------------------------------------------- day countdown
page(
    "day-countdown", "Day Countdown Calculator", "Day Countdown — Days, Weeks and Remainder",
    "Find the elapsed days to a chosen date and split that interval into complete weeks and leftover days. Set the reference date yourself for a repeatable countdown.",
    "This countdown makes the seven-day structure visible: it returns full weeks and the days left over, as well as the total interval.",
    [D("start", "Count from", "2026-10-23"), D("finish", "Count to", "2027-01-01")],
    [R("days", "Total days", "days"), R("weeks", "Complete weeks", "weeks"), R("remainder", "Days after full weeks", "days"), R("hours", "Equivalent hours", "hours")],
    {"days": "finish - start", "weeks": "floor((finish - start) / 7)", "remainder": "(finish - start) - 7 * floor((finish - start) / 7)", "hours": "(finish - start) * 24"},
    [({"start": "2026-10-23", "finish": "2027-01-01"}, {"days": 70, "weeks": 10, "remainder": 0, "hours": 1680}, .001),
     ({"start": "2026-10-23", "finish": "2026-12-25"}, {"days": 63, "weeks": 9, "remainder": 0}, .001)],
    "A total such as 70 days is easier to plan when it is split into weeks. The complete-week result rounds down, while the remainder carries the days that do not make another full seven. It is still elapsed time: a countdown from one date to another does not count the first date as an extra day.",
    "23 October 2026 to 1 January 2027 is 70 days: ten full weeks, no remainder, and 1,680 equivalent hours. If the interval were 72 days, the page would show ten complete weeks and two remaining days.",
    "Subtract start from finish. The number of complete weeks is the floor of that difference divided by seven; subtract those complete weeks from the total to recover the remainder.",
    "The remainder is always the part left after whole weeks, not a day-of-week label. The same date can land on different weekdays in different years, so this page does not assume the week begins on Monday or Sunday. It only groups duration into sevens. The hours line multiplies calendar days by 24; it is useful for rough scheduling but not for a timed event crossing a daylight-saving transition. When counting down to a deadline, check the rules for weekends and holidays separately. A business-day deadline is not the same measure as an ordinary day countdown.",
    [("What does the remainder mean?", "It is the number of days left after removing all complete seven-day weeks."),
     ("Is the first date included?", "No extra inclusive day is added; the result is the elapsed difference."),
     ("Does the week start Sunday or Monday?", "The calculation groups each seven consecutive days; it does not assign weekdays to a named week."),
     ("Can I use it for workdays?", "No. Weekends and holidays are included; use a working-day method for business deadlines.")],
    [("/everyday-life/days-between-dates", "Days between dates"), ("/everyday-life/working-days", "Working days"), ("/everyday-life/date-countdown", "Date countdown")],
)

# -------------------------------------------------------------- day of year
page(
    "day-of-the-year", "Day of the Year Calculator", "Day of the Year — Ordinal Date and Year Left",
    "See the day number, share of the year elapsed, days remaining and approximate week number for any date as well. Leap years use 366 days rather than 365.",
    "The ordinal date answers where a calendar day sits in its year. This page also shows the fraction of the year elapsed and the number of days still ahead.",
    [D("date", "Date", "2027-02-28")],
    [R("ordinal", "Day of the year", "day"), R("percent", "Year elapsed", "%"), R("left", "Days left after this date", "days"), R("week", "Week number, approximate", "week")],
    {"ordinal": "getDayOfYear(date) + 1", "percent": "(getDayOfYear(date) + 1) / if_else(mod(getYear(date), 400) == 0, 366, if_else(mod(getYear(date), 100) == 0, 365, if_else(mod(getYear(date), 4) == 0, 366, 365))) * 100", "left": "if_else(mod(getYear(date), 400) == 0, 366, if_else(mod(getYear(date), 100) == 0, 365, if_else(mod(getYear(date), 4) == 0, 366, 365))) - getDayOfYear(date) - 1", "week": "floor(getDayOfYear(date) / 7) + 1"},
    [({"date": "2027-02-28"}, {"ordinal": 59, "percent": 16.1644, "left": 306, "week": 9}, .001),
     ({"date": "2024-03-01"}, {"ordinal": 61, "left": 305, "week": 9}, .001)],
    "Ordinal dates are used in manufacturing logs, astronomy notes, project plans and systems that compare records by year. The counting rule is simple but the leap-year rule is not: a leap year has 366 days, and the day number after February shifts. The year share and remaining-day values need that same length to avoid a quiet one-day error.",
    "28 February 2027 is day 59 of a 365-day year: 16.1644 percent has elapsed, 306 days follow it, and the simple seven-day week count is 9. In leap year 2024, 1 March is day 61 because 29 February has already passed.",
    "The calendar helper returns a zero-based ordinal, so one is added for display. The Gregorian leap rule is divisible by four except century years, unless divisible by 400. Remaining days exclude the date itself; the approximate week is groups of seven from 1 January.",
    "This page's week number is an approximate ordinal week, not ISO week numbering. ISO weeks begin on Monday and can place the first days of January in the prior year's week 52 or 53. Here, week 1 begins on 1 January and each new group starts every seven days. The remaining-day count is also exclusive of the selected date: on 31 December it is zero. That definition is handy when asking how many future days remain, but an inclusive schedule may choose a different count. Keep the convention with copied figures, especially in a spreadsheet where one-based and zero-based fields often sit side by side.",
    [("Does this count leap day?", "Yes. 29 February is day 60 in a leap year, shifting later dates by one."),
     ("Is the week number ISO?", "No. It is the ordinal day divided into groups of seven from 1 January."),
     ("Are remaining days inclusive?", "No. The selected date is excluded; 31 December has zero days after it."),
     ("Why does a system show another day number?", "It may use zero-based ordinals or ISO weeks, both of which differ from the labels here.")],
    [("/everyday-life/date", "Date calculator"), ("/everyday-life/days-between-dates", "Days between dates"), ("/everyday-life/calendar", "Calendar calculator")],
)

# ---------------------------------------------------------------- days old
page(
    "days-old", "Days Old Calculator", "Days Old — Age in Days, Weeks and Hours",
    "Calculate how many calendar days have passed since a birth date, then express the same age in weeks and hours. Choose the reference date to reproduce the answer.",
    "Age is usually stated in years, but some milestones are counted in days. Enter a birth date and a reference date to get elapsed days, weeks and equivalent hours.",
    [D("birth", "Date of birth", "2000-01-01"), D("today", "Count through", "2026-10-23")],
    [R("days", "Days old", "days"), R("weeks", "Weeks old", "weeks"), R("hours", "Equivalent hours", "hours")],
    {"days": "today - birth", "weeks": "(today - birth) / 7", "hours": "(today - birth) * 24"},
    [({"birth": "2000-01-01", "today": "2026-10-23"}, {"days": 9792, "weeks": 1398.8571, "hours": 235008}, .01),
     ({"birth": "2026-10-22", "today": "2026-10-23"}, {"days": 1, "weeks": 1/7, "hours": 24}, .001)],
    "A day count gives a different feel for a long age than a year count. It includes the leap days that actually occurred between the dates, rather than multiplying years by 365. The start and end remain visible, so the result can be checked against a calendar or rerun for a future milestone.",
    "From 1 January 2000 to 23 October 2026 is 9,792 elapsed days, or 1,398.8571 weeks and 235,008 equivalent hours. A one-day interval returns exactly one day; the fractions appear only when converting that count into weeks.",
    "Subtract the birth day number from the reference day number. Divide by seven for weeks and multiply by 24 for equivalent hours. Gregorian leap days are already included in the date subtraction.",
    "The word 'old' can mean completed calendar days or the count of dates touched. This page reports completed elapsed days, so someone born yesterday is one day old today, and the birth date itself contributes no completed day at the instant the count begins. A birth time is not captured, so the result cannot distinguish 23 hours from 25 hours around local clock changes. For a medical, legal or official age calculation, use the jurisdiction's stated method and verify the birth record. The weeks figure is a decimal duration, not a number of whole weeks lived.",
    [("Are leap years included?", "Yes. Subtracting calendar days includes every 29 February between the dates."),
     ("Does it count the birth date?", "It reports elapsed days, not an inclusive count of date labels."),
     ("Can I calculate age at a past date?", "Yes, set the reference date to that day."),
     ("Is the hour result exact?", "It is 24 hours per calendar day and does not account for time zones or clock changes.")],
    [("/everyday-life/age", "Age calculator"), ("/everyday-life/birthday-countdown", "Birthday countdown"), ("/everyday-life/date-of-birth", "Date of birth from age")],
)

# ------------------------------------------------------ days until December
page(
    "days-until-december", "Days Until December Calculator", "Days Until December — Count to 1 December",
    "Count calendar days until the next 1 December from any date. The target rolls to the following year after 1 December, with weeks and hours shown for scale.",
    "The target is fixed at 1 December. Enter a date and the page selects the next occurrence, whether December is still ahead or has already begun.",
    [D("today", "Count from", "2026-11-30")],
    [RD("next_december", "Next 1 December"), R("days", "Days until December", "days"), R("weeks", "Weeks", "weeks"), R("hours", "Equivalent hours", "hours")],
    {"next_december": "dateAtYearsOld(20788, getYear(today) - 2026 + if_else(dateAtYearsOld(20788, getYear(today) - 2026) <= today, 1, 0))", "days": "dateAtYearsOld(20788, getYear(today) - 2026 + if_else(dateAtYearsOld(20788, getYear(today) - 2026) <= today, 1, 0)) - today", "weeks": "(dateAtYearsOld(20788, getYear(today) - 2026 + if_else(dateAtYearsOld(20788, getYear(today) - 2026) <= today, 1, 0)) - today) / 7", "hours": "(dateAtYearsOld(20788, getYear(today) - 2026 + if_else(dateAtYearsOld(20788, getYear(today) - 2026) <= today, 1, 0)) - today) * 24"},
    [({"today": "2026-11-30"}, {"next_december": 20788, "days": 1, "weeks": 1/7, "hours": 24}, .001),
     ({"today": "2026-12-01"}, {"next_december": 21153, "days": 365, "hours": 8760}, .001)],
    "A seasonal countdown needs a rule for the target day. This page means the next 1 December, not the start of the current month if that date has passed. The roll-forward is deliberate: on 30 November the answer is one day; on 1 December it points to the following year's first day of December.",
    "From 30 November 2026, the next 1 December is one day away, or 24 equivalent hours. On 1 December itself, the next occurrence is 1 December 2027, 365 days later.",
    "The calculator builds 1 December in the input year, compares it with the selected date, and advances one year if that target is today or earlier. It then subtracts the reference day number.",
    "The exact-target rule matters. A countdown normally means the next occurrence strictly after the reference day, so selecting 1 December does not return zero; it returns the next year's event. If you need a countdown that treats today as the event day, change that convention explicitly. The hour line is a date-based 24-hour equivalent. It does not know the event's local start time, location or time zone. The target is a calendar marker, not a promise that a seasonal event, holiday or business closure follows the same date in every country.",
    [("Does it count to this December or next December?", "It uses the next 1 December strictly after the date entered."),
     ("What happens on 1 December?", "The target rolls to 1 December the following year."),
     ("Is December 1 the start of the month?", "Yes, that is the fixed target date used here."),
     ("Are hours timezone-aware?", "No. They are 24 times the calendar-day distance.")],
    [("/everyday-life/days-until-june", "Days until June"), ("/everyday-life/date-countdown", "Date countdown"), ("/everyday-life/calendar", "Calendar calculator")],
)

# ----------------------------------------------------------- days until June
page(
    "days-until-june", "Days Until June Calculator", "Days Until June — Count to 1 June",
    "Find the days from a chosen date to the next 1 June, rolling into the next year when June has arrived. Weeks and equivalent hours make the distance easier to plan.",
    "This page uses 1 June as its target. Set any date; if 1 June has passed or is today, the next year's date is used.",
    [D("today", "Count from", "2026-05-31")],
    [RD("next_june", "Next 1 June"), R("days", "Days until June", "days"), R("weeks", "Weeks", "weeks"), R("hours", "Equivalent hours", "hours")],
    {"next_june": "dateAtYearsOld(20605, getYear(today) - 2026 + if_else(dateAtYearsOld(20605, getYear(today) - 2026) <= today, 1, 0))", "days": "dateAtYearsOld(20605, getYear(today) - 2026 + if_else(dateAtYearsOld(20605, getYear(today) - 2026) <= today, 1, 0)) - today", "weeks": "(dateAtYearsOld(20605, getYear(today) - 2026 + if_else(dateAtYearsOld(20605, getYear(today) - 2026) <= today, 1, 0)) - today) / 7", "hours": "(dateAtYearsOld(20605, getYear(today) - 2026 + if_else(dateAtYearsOld(20605, getYear(today) - 2026) <= today, 1, 0)) - today) * 24"},
    [({"today": "2026-05-31"}, {"next_june": 20605, "days": 1, "weeks": 1/7, "hours": 24}, .001),
     ({"today": "2026-06-01"}, {"next_june": 20970, "days": 365, "hours": 8760}, .001)],
    "June begins on a fixed calendar date, but a countdown needs a reference date too. The rule here is to use the next 1 June, strictly after the date entered. That makes 31 May one day away and 1 June itself a year away, which is predictable for recurring annual plans.",
    "On 31 May 2026, 1 June is one day away. On 1 June 2026, the next occurrence is 1 June 2027, 365 days later.",
    "The reference year supplies a candidate 1 June. If it is not later than the selected date, the target is moved forward by one calendar year; the difference is then reported in days, weeks and equivalent hours.",
    "Do not use this page for a June deadline that is not on the first. Choose a date-specific countdown instead. Nor does the calculation know whether June is a school term, a financial year boundary or a local holiday; those meanings change by country and institution. The date is the anchor, and the label stays literal. If the reference date falls in a leap year, the interval to the following June can contain the extra leap day; the output uses actual calendar dates and does not assume every year has 365 days.",
    [("Does it count to 1 June?", "Yes. The target is the first day of June."),
     ("What if today is 1 June?", "It returns the next 1 June, in the following year."),
     ("Does a leap year affect the count?", "Yes, if the interval crosses 29 February."),
     ("Can I change the target day?", "Not on this page; use a general date countdown for another date.")],
    [("/everyday-life/days-until-december", "Days until December"), ("/everyday-life/date-countdown", "Date countdown"), ("/everyday-life/days-between-dates", "Days between dates")],
)

# ------------------------------------------------------- birth from death date
page(
    "birth-from-death-date", "Birth Date from Death Date Calculator", "Birth Date from Death Date and Age",
    "Estimate a birth date from a death date and age at death, then calculate days lived and days since death. Month-end dates follow the calendar's clamping rule.",
    "When a record gives a death date and age but not a birth date, subtract the completed years to estimate the anniversary date. This page also reports the day counts around it.",
    [D("death", "Date of death", "2026-01-15"), F("age", "Age at death", "years", 60), D("today", "Reference date", "2026-10-23")],
    [RD("birth", "Estimated birth date"), R("lived", "Calendar days from birth to death", "days"), R("since", "Days since death", "days")],
    {"birth": "dateAtYearsOld(death, -age)", "lived": "death - dateAtYearsOld(death, -age)", "since": "today - death"},
    [({"death": "2026-01-15", "age": 60, "today": "2026-10-23"}, {"birth": -1447, "lived": 21915, "since": 281}, .001),
     ({"death": "2024-02-29", "age": 10, "today": "2026-10-23"}, {"birth": 16129, "lived": 3653, "since": 967}, .001)],
    "An age stated at death does not always reveal an exact birth date. If someone died a day before their birthday, the birth year implied by subtracting completed years can differ from the calendar-year subtraction. This calculator provides an anniversary-based estimate and makes that assumption visible; official records may need a different interpretation.",
    "A death on 15 January 2026 at age 60 gives an estimated date of birth of 15 January 1966. The span is 21,915 calendar days, and 281 days had passed by 23 October 2026.",
    "Move the death date backward by the completed age in whole calendar years. The calendar helper clamps a date such as 29 February to the last valid day in a non-leap year. The day counts are plain date differences.",
    "Age at death is usually completed years, not a precise duration. Without the person's birthday or birth time, the true birth date could fall within a range around the estimated anniversary. Historical records may also use a different calendar system, while this page uses Gregorian dates. Treat the answer as a lead for research, not proof of identity or a substitute for a birth certificate. The days-lived result uses the estimated date, so its apparent precision is greater than the source information warrants.",
    [("Is the birth date exact?", "Not necessarily. It is estimated by subtracting whole completed years from the death date."),
     ("What if the death date is 29 February?", "The date helper clamps to the last valid day when the destination year has no leap day."),
     ("Does age at death include the birthday?", "Enter the completed age stated by the record; the calculation does not infer it."),
     ("Can this verify a genealogy record?", "No. Use it as an estimate and confirm against primary records.")],
    [("/everyday-life/days-old", "Days old"), ("/everyday-life/date-of-birth", "Date of birth from age"), ("/everyday-life/age", "Age calculator")],
)

# ----------------------------------------------------------------- birthday
AGE_EXPR = "getYear(today) - getYear(birth) - if_else(today < dateAtYearsOld(birth, getYear(today) - getYear(birth)), 1, 0)"
NEXT_BDAY = f"dateAtYearsOld(birth, ({AGE_EXPR}) + 1)"
page(
    "birthday", "Birthday Calculator", "Birthday Calculator — Age and Next Birthday",
    "Work out completed age, the next birthday date, its weekday and how many days remain. Enter the date of birth and a reference date rather than relying on today's setting.",
    "A birthday calculator needs to know whether this year's anniversary has already passed. These results show the completed age and the next birthday from a chosen reference date.",
    [D("birth", "Date of birth", "2001-12-25"), D("today", "Count from", "2026-10-23")],
    [R("age", "Completed age", "years"), RD("next", "Next birthday"), R("days", "Days until birthday", "days"), R("weekday", "Weekday (Sunday is 0)")],
    {"age": AGE_EXPR, "next": NEXT_BDAY, "days": f"{NEXT_BDAY} - today", "weekday": f"getDayOfWeek({NEXT_BDAY})"},
    [({"birth": "2001-12-25", "today": "2026-10-23"}, {"age": 24, "next": 20812, "days": 63, "weekday": 5}, .001),
     ({"birth": "1990-05-17", "today": "2026-10-23"}, {"age": 36, "next": 20955, "days": 206, "weekday": 1}, .001),
     ({"birth": "2000-02-29", "today": "2026-02-28"}, {"age": 26, "next": 20877, "days": 365, "weekday": 0}, .001)],
    "The birthday's month and day decide whether a person has reached their next age this year. A simple subtraction of years is one too high before the anniversary and right on or after it. This page tests that boundary, then finds the next anniversary and its weekday so a party date can be checked without mental calendar arithmetic.",
    "Someone born 25 December 2001 is 24 on 23 October 2026. The next birthday is 25 December, 63 days away, and falls on Friday (5 when Sunday is zero). A May birthday has already happened by the reference date, so the next one lies in May 2027.",
    "Completed age is the year difference minus one when the birthday month and day are still ahead. The next birthday is the birth date moved forward by one more completed year; subtracting today's day number gives the countdown.",
    "Leap-day birthdays need a declared convention in non-leap years. The date helper clamps 29 February to 28 February when it moves into a year without that date. Some institutions instead observe 1 March; this page does not choose that legal or cultural rule. If the birthday is used for an official age threshold, check the governing jurisdiction. For ordinary planning, the calculated weekday and count are a useful prompt to verify the date on the calendar before sending invitations.",
    [("How is completed age calculated?", "The year difference is reduced by one if this year's calendar anniversary has not yet arrived."),
     ("Does it use today's date automatically?", "No. A reference date field makes the result repeatable."),
     ("How are 29 February birthdays handled?", "They clamp to 28 February in a non-leap year; local rules may differ."),
     ("What is weekday zero?", "Sunday is 0, Monday 1, through Saturday 6.")],
    [("/everyday-life/birthday-countdown", "Birthday countdown"), ("/everyday-life/age", "Age calculator"), ("/everyday-life/date-of-birth", "Date of birth from age")],
)

# ------------------------------------------------------------------- calendar
page(
    "calendar", "Calendar Calculator", "Calendar Calculator — Add or Subtract Date Units",
    "Move a start date forward or backward by calendar years, months, weeks and days. The result includes the new date, exact day difference and weekday for each move.",
    "Add or subtract several date units from a start date. Years and months move as calendar anniversaries, while weeks and days are added as fixed day counts, each way.",
    [D("start", "Start date", "2026-01-01"), SEL("direction", "Move", [("Add", 1), ("Subtract", -1)], 1), F("years", "Years", "years", 0), F("months", "Months", "months", 15), F("weeks", "Weeks", "weeks", 0), F("days", "Days", "days", 19)],
    [RD("result", "Resulting date"), R("elapsed", "Days moved", "days"), R("weekday", "Weekday (Sunday is 0)")],
    {"result": "dateAtMonthsOld(dateAtYearsOld(start, direction * years), direction * months) + direction * (weeks * 7 + days)", "elapsed": "dateAtMonthsOld(dateAtYearsOld(start, direction * years), direction * months) + direction * (weeks * 7 + days) - start", "weekday": "getDayOfWeek(dateAtMonthsOld(dateAtYearsOld(start, direction * years), direction * months) + direction * (weeks * 7 + days))"},
    [({"start": "2026-01-01", "direction": 1, "years": 0, "months": 15, "weeks": 0, "days": 19}, {"result": 20928, "elapsed": 474, "weekday": 2}, .001),
     ({"start": "2026-01-31", "direction": 1, "years": 0, "months": 1, "weeks": 0, "days": 0}, {"result": 20512, "elapsed": 28}, .001)],
    "Calendar arithmetic is not the same as adding a fixed number of days. One month after 31 January has no 31st day in February, so the date lands on February's last day. Weeks and days, by contrast, have fixed lengths. This calculator applies each part in order and makes that order explicit.",
    "Starting on 1 January 2026, adding 15 months reaches 1 April 2027, then adding 19 days gives 20 April 2027. The result is 474 days after the start and falls on Tuesday. One month after 31 January clamps to 28 February 2026.",
    "The selected direction multiplies each amount by positive one or negative one. Whole years and months use calendar anniversary helpers; weeks become seven days and the day amount is added last. A month-end anniversary clamps to the destination month's final day.",
    "When combining years and months, the page moves years first, then months, then fixed weeks and days. This order can matter near month ends: adding a month and then a day is not always equivalent to adding a day and then a month. The calculation keeps the units separate rather than replacing every month with 30 days. If you need a contract date, check whether its wording means calendar months, a fixed number of days, or a business-day adjustment. The result does not skip weekends or holidays. Negative amounts can also be supplied, but using the direction control is clearer when the intention is to move back through the calendar.",
    [("Is a month treated as 30 days?", "No. Months move by calendar anniversary and clamp at the destination month's last day."),
     ("What happens on 31 January plus one month?", "It lands on the last valid February date: 28 or 29."),
     ("Are weekends skipped?", "No. Weeks and days are ordinary calendar units."),
     ("Can I subtract time?", "Yes. Choose Subtract; the same unit sequence moves backward.")],
    [("/everyday-life/months-between-dates", "Months between dates"), ("/everyday-life/date-countdown", "Date countdown"), ("/everyday-life/days-between-dates", "Days between dates")],
)

# --------------------------------------------------------- calendar countdown
page(
    "calendar-countdown", "Calendar Countdown Calculator", "Calendar Countdown — Days to a Target Date Today",
    "Count calendar days and equivalent weeks, hours and minutes between a reference date and a target date. Both dates are editable for events, trips and deadlines.",
    "A calendar countdown answers how far away a target lies from a chosen day. Its dates are editable, so a saved plan can be checked without changing the meaning of today.",
    [D("start", "Count from", "2026-10-23"), D("target", "Target date", "2027-04-20")],
    [R("days", "Calendar days", "days"), R("weeks", "Weeks", "weeks"), R("hours", "Equivalent hours", "hours"), R("minutes", "Equivalent minutes", "minutes")],
    {"days": "target - start", "weeks": "(target - start) / 7", "hours": "(target - start) * 24", "minutes": "(target - start) * 1440"},
    [({"start": "2026-10-23", "target": "2027-04-20"}, {"days": 179, "weeks": 25.5714, "hours": 4296, "minutes": 257760}, .01),
     ({"start": "2026-01-01", "target": "2026-01-01"}, {"days": 0, "weeks": 0, "hours": 0, "minutes": 0}, .001)],
    "A calendar countdown is useful for plans that start on a date rather than at a minute. Both endpoints are visible, and all four answers come from the same date difference. This avoids the familiar off-by-one argument: elapsed days and inclusive date labels are different questions.",
    "From 23 October 2026 to 20 April 2027 is 179 days, or 25.5714 weeks and 4,296 equivalent hours. If the dates match, every result is zero.",
    "Subtract the start date from the target date. Weeks are days divided by seven, while hours and minutes use 24 and 1,440 units per calendar day.",
    "The hours and minutes are expanded day counts, not stopwatch precision. A calendar interval can contain a daylight-saving shift, so 179 local midnights need not equal 4,296 elapsed clock hours in every timezone. For a flight, appointment or timed release, include the time and zone in the calculation. The plain-date answer remains useful for countdown boards, travel day planning and date-based reminders. If the target precedes the start, the signed result is negative rather than silently reversing the dates.",
    [("How is this different from a timer?", "It compares calendar dates; it does not track hours, minutes or seconds from the current moment."),
     ("Does it include the target day?", "It returns elapsed date difference, without adding an inclusive endpoint."),
     ("Why are hours approximate?", "Each date is treated as 24 hours; timezone clock changes are not represented."),
     ("Can the target be in the past?", "Yes. The difference is signed and becomes negative.")],
    [("/everyday-life/date-countdown", "Date countdown"), ("/everyday-life/days-between-dates", "Days between dates"), ("/everyday-life/deadline", "Deadline calculator")],
)

# --------------------------------------------------------- months between dates
MONTH_DIFF = "(getYear(date2) - getYear(date1)) * 12 + getMonth(date2) - getMonth(date1)"
WHOLE = f"{MONTH_DIFF} - if_else(dateAtMonthsOld(date1, {MONTH_DIFF}) > date2, 1, 0)"
page(
    "months-between-dates", "Months Between Dates Calculator", "Months Between Dates — Whole Months and Days",
    "Find complete calendar months between two dates, leftover days after the last anniversary, and an approximate decimal-month total. Month-end dates are clamped to the calendar.",
    "A decimal month count is useful for rough comparisons, but anniversaries need calendar arithmetic. This page gives both: complete months plus leftover days, and an approximate decimal total.",
    [D("date1", "From", "2025-11-30"), D("date2", "To", "2026-10-23")],
    [R("whole", "Complete months", "months"), R("extra_days", "Days after last month anniversary", "days"), R("decimal", "Approximate months", "months"), R("years", "Approximate years", "years")],
    {"whole": WHOLE, "extra_days": f"date2 - dateAtMonthsOld(date1, {WHOLE})", "decimal": f"{WHOLE} + (date2 - dateAtMonthsOld(date1, {WHOLE})) / 30.436875", "years": f"({WHOLE} + (date2 - dateAtMonthsOld(date1, {WHOLE})) / 30.436875) / 12"},
    [({"date1": "2025-11-30", "date2": "2026-10-23"}, {"whole": 10, "extra_days": 23, "decimal": 10.7556, "years": .8963}, .01),
     ({"date1": "2026-01-31", "date2": "2026-02-28"}, {"whole": 1, "extra_days": 0, "decimal": 1, "years": 1/12}, .001)],
    "There is no single number of days in a month. A contract that says ten months usually points to calendar anniversaries, while a scientific comparison may prefer an average month. This page shows each interpretation separately. It advances by whole month anniversaries, counts the remaining days, and also converts that span to an average-month decimal.",
    "From 30 November 2025 to 23 October 2026, ten whole month anniversaries have passed, followed by 23 days. Using 30.436875 average days per month, that is 10.7556 months or 0.8963 years. From 31 January to 28 February, one calendar month has passed.",
    "The year-month difference is reduced by one if the corresponding anniversary falls after the end date. The leftover days are measured from that last anniversary. Decimal months add those days divided by 30.436875.",
    "The anniversary helper clamps month ends: a 31 January start reaches 28 February in an ordinary year and 29 February in a leap year. That is a convention, not a universal legal rule. Some agreements define a month as a fixed number of days; others use the same numbered day or the final day of a month. The calculator's labels keep the exact day count and average conversion distinct so neither can be mistaken for the other. The formula assumes the end date is on or after the start date. Reverse the inputs for a forward span rather than interpreting negative month remnants.",
    [("Why are there two month answers?", "Complete calendar months plus days answer an anniversary question; decimal months use an average-length conversion."),
     ("How long is the average month?", "The decimal calculation uses 30.436875 days."),
     ("What happens from 31 January to February?", "The anniversary clamps to the last valid day of February."),
     ("Does it count backward ranges?", "The intended use is a forward range; put the earlier date in From.")],
    [("/everyday-life/calendar", "Calendar calculator"), ("/everyday-life/date-to-date", "Date to date"), ("/everyday-life/days-between-dates", "Days between dates")],
)

# --------------------------------------------------------------- number days
page(
    "number-days", "Number of Days Calculator", "Number of Days — Elapsed and Inclusive Count",
    "Count elapsed days between two dates and compare them with an inclusive count that includes both endpoints. Weeks and approximate months provide useful scale.",
    "The number of days between dates depends on whether the question asks for elapsed time or for the number of dates in a list. Both answers are shown, with a switch for the inclusive convention.",
    [D("start", "Start date", "2026-01-01"), D("end", "End date", "2026-12-31"), SEL("include_end", "Include the end date?", [("Yes", 1), ("No", 0)], 1)],
    [R("days", "Counted days", "days"), R("elapsed", "Elapsed difference", "days"), R("weeks", "Counted weeks", "weeks"), R("months", "Approximate months", "months")],
    {"elapsed": "end - start", "days": "end - start + include_end", "weeks": "(end - start + include_end) / 7", "months": "(end - start + include_end) / 30.436875"},
    [({"start": "2026-01-01", "end": "2026-12-31", "include_end": 1}, {"days": 365, "elapsed": 364, "weeks": 52.1429, "months": 11.9921}, .01),
     ({"start": "2026-01-01", "end": "2026-01-31", "include_end": 0}, {"days": 30, "elapsed": 30}, .001)],
    "The same two dates can produce 364 or 365 depending on what is being counted. Subtraction gives elapsed days; including both the first and last date adds one to count the date labels. This page places those figures together so a booking, prescription or filing period does not hide its endpoint rule.",
    "1 January to 31 December 2026 is 364 elapsed days. With the end date included, the count is 365; that is 52.1429 weeks or about 11.9921 average months. The option changes the counted span, not the underlying subtraction.",
    "Elapsed days equal end minus start. The include-end switch adds one when selected; weeks and average months convert that chosen count.",
    "For overnight stays, the elapsed difference is usually the number of nights. For a date-by-date checklist, inclusive counting is often more useful. Neither answer is inherently wrong; the intended convention decides. The approximate-month figure uses the chosen day count and the Gregorian average month, so it is a scale estimate rather than a count of anniversaries. Weekends and public holidays remain in the total. If a legal or medical instruction specifies how to count the first dose or final day, follow that instruction instead of relying on a generic default.",
    [("What does the switch change?", "It adds one day when you want the end date counted as a date in the span."),
     ("Which answer is right for hotel nights?", "Usually the elapsed difference, because checkout day is not another overnight stay."),
     ("Are months exact?", "No. The month value uses the average length of 30.436875 days."),
     ("Are weekends removed?", "No. Every calendar day is counted.")],
    [("/everyday-life/days-between-dates", "Days between dates"), ("/everyday-life/date-countdown", "Date countdown"), ("/everyday-life/working-days", "Working days")],
)

# ------------------------------------------------------------ palindrome date
CODE = "getYear(date) * 10000 + (getMonth(date) + 1) * 100 + getDate(date)"
REVERSED = "mod(code, 10) * 10000000 + mod(floor(code / 10), 10) * 1000000 + mod(floor(code / 100), 10) * 100000 + mod(floor(code / 1000), 10) * 10000 + mod(floor(code / 10000), 10) * 1000 + mod(floor(code / 100000), 10) * 100 + mod(floor(code / 1000000), 10) * 10 + floor(code / 10000000)"
DIGSUM = "mod(code,10) + mod(floor(code/10),10) + mod(floor(code/100),10) + mod(floor(code/1000),10) + mod(floor(code/10000),10) + mod(floor(code/100000),10) + mod(floor(code/1000000),10) + floor(code/10000000)"
page(
    "palindrome-date", "Palindrome Date Calculator", "Palindrome Date — Reverse and Compare YYYYMMDD",
    "Format a date as eight YYYYMMDD digits, reverse them and compare the result. The page also totals the digits; it does not remove leading zeroes from the formatted date.",
    "A palindrome date reads the same backward as forward under a chosen numeric format. This page uses YYYYMMDD, reverses the eight digits, and reports whether the values match.",
    [D("date", "Date", "2020-02-02")],
    [R("code", "Date as YYYYMMDD"), R("reversed", "Digits reversed"), R("palindrome", "Palindrome? (1 yes, 0 no)"), R("digit_sum", "Digit sum")],
    {"code": CODE, "reversed": REVERSED, "palindrome": "if_else(code == " + REVERSED + ", 1, 0)", "digit_sum": DIGSUM},
    [({"date": "2020-02-02"}, {"code": 20200202, "reversed": 20200202, "palindrome": 1, "digit_sum": 8}, .001),
     ({"date": "2026-10-23"}, {"code": 20261023, "reversed": 32016202, "palindrome": 0, "digit_sum": 16}, .001)],
    "Palindrome dates depend on the order used to write a date. The same day can look symmetrical in one format and ordinary in another. This calculator chooses YYYYMMDD, keeps all eight positions in the arithmetic and compares the reversed digits with the original code.",
    "2 February 2020 becomes 20200202 and reverses to the same number, so it is a palindrome under this format. 23 October 2026 becomes 20261023, which reverses to 32016202; the digits sum to 16.",
    "The date is assembled from year, month and day into an eight-digit code. Each decimal place is extracted and rebuilt in reverse order; the equality test returns 1 for a match and 0 otherwise.",
    "A numeric result cannot display a leading zero, so dates early in a year may appear shorter than eight characters when copied from the result box. The arithmetic still uses the fixed YYYYMMDD positions. If you are checking a different convention, such as DDMMYYYY, the palindrome status may change; this page does not claim a format-independent property. The digit sum is a separate checksum-like curiosity, not a date validity test. The date input itself is validated by the calendar control before the code is built.",
    [("What date format does it use?", "The digits are ordered year, month, day: YYYYMMDD."),
     ("Can a date be a palindrome in another format only?", "Yes. Reordering year, month and day can change the result."),
     ("Why can the code appear shorter?", "A numeric field drops leading zeroes when displayed; the calculation still reserves the date positions."),
     ("Does the digit sum validate a date?", "No. It is only the sum of the eight digits.")],
    [("/everyday-life/date", "Date calculator"), ("/everyday-life/day-of-the-year", "Day of the year"), ("/everyday-life/calendar", "Calendar calculator")],
)

# -------------------------------------------------------------- half birthday
HALF = "dateAtMonthsOld(birth, 6)"
NEXT_HALF = f"dateAtYearsOld({HALF}, getYear(today) - getYear({HALF}) + if_else(dateAtYearsOld({HALF}, getYear(today) - getYear({HALF})) <= today, 1, 0))"
page(
    "half-birthday", "Half Birthday Calculator", "Half Birthday — Date Six Months After Birth",
    "Find the six-month calendar anniversary of a birth date and the next half-birthday after a chosen reference date. The result includes its weekday and days remaining.",
    "A half-birthday is commonly treated as the date six calendar months after a birthday. This page shows that anniversary and, if it has passed, the next year's occurrence.",
    [D("birth", "Date of birth", "2026-02-14"), D("today", "Count from", "2026-10-23")],
    [RD("half", "Half-birthday date in birth year"), RD("next", "Next half-birthday"), R("days", "Days until next half-birthday", "days"), R("weekday", "Weekday (Sunday is 0)")],
    {"half": HALF, "next": NEXT_HALF, "days": f"{NEXT_HALF} - today", "weekday": f"getDayOfWeek({NEXT_HALF})"},
    [({"birth": "2026-02-14", "today": "2026-10-23"}, {"half": 20679, "next": 21044, "days": 295, "weekday": 6}, .001),
     ({"birth": "2000-01-31", "today": "2026-05-01"}, {"half": 11169, "days": 91}, .001)],
    "There is no formal universal definition of a half-birthday. Many people use the date six calendar months after the birth date, rather than exactly half of a year's 365 or 366 days. Calendar months vary, so 14 February leads to 14 August, while a date near a month end may be clamped.",
    "A 14 February birthday has a 14 August half-birthday. From 23 October 2026, that year's date has passed; the next is 14 August 2027, 295 days away, on Saturday.",
    "The first result moves the birth date forward six calendar months. The next-date result uses that date if it is still ahead; otherwise it moves forward another twelve months. The countdown is a date subtraction.",
    "Some families define the halfway point by days, which can land a day earlier or later than a six-month anniversary. Others celebrate on the last day of the destination month when the birth date does not exist there. This calculator follows the site's calendar helper: it clamps to the last valid day. The result is a planning convention, not an official age milestone. If the half-birthday is used for a school or benefit cutoff, confirm the local rule. It also does not adjust for the time of birth, which is not part of a date-only input.",
    [("How is a half-birthday defined here?", "As six calendar months after the birth date."),
     ("What if the date is the 31st?", "It clamps to the last valid day of the destination month."),
     ("Why does it show next year?", "If this year's half-birthday is today or earlier, the next occurrence is used."),
     ("Is it exactly half a year in days?", "No. It is a calendar-month anniversary, not half of 365 or 366 days.")],
    [("/everyday-life/birthday", "Birthday calculator"), ("/everyday-life/birthday-countdown", "Birthday countdown"), ("/everyday-life/calendar", "Calendar calculator")],
)

# -------------------------------------------------------------------- BC to AD
page(
    "bc-to-ad", "BC to AD Year Calculator", "BC to AD — Years Across the Era Boundary",
    "Convert a BC year to elapsed years before an AD year without inventing a year zero. An optional average-day conversion gives scale, not exact historical dates.",
    "BC and AD numbering has no year zero in the traditional system. This calculator counts across the boundary using that convention and reports an average-day equivalent.",
    [F("bc", "Starting year (BC)", "BC", 100), F("ad", "Ending year (AD)", "AD", 2026)],
    [R("years", "Years elapsed", "years"), R("days", "Approximate days", "days"), R("weeks", "Approximate weeks", "weeks")],
    {"years": "bc + ad - 1", "days": "(bc + ad - 1) * 365.2425", "weeks": "(bc + ad - 1) * 365.2425 / 7"},
    [({"bc": 100, "ad": 2026}, {"years": 2125, "days": 776140.3125, "weeks": 110877.1875}, .01),
     ({"bc": 1, "ad": 1}, {"years": 1, "days": 365.2425}, .001)],
    "The traditional BC/AD year labels jump from 1 BC to AD 1. There is no year zero between them, so subtracting the labels directly misses a year. The formula accounts for that gap. Its day count is an average-duration illustration, not a reconstruction of exact historical calendar days.",
    "From 100 BC to AD 2026 is 2,125 years by the no-year-zero convention. At 365.2425 days per average Gregorian year, that is approximately 776,140.3125 days.",
    "Years elapsed equal the BC year plus the AD year minus one. Multiplying by 365.2425 supplies an average-day estimate; dividing by seven converts that estimate to weeks.",
    "Historical year systems are not uniform. The Julian calendar was used before the Gregorian reform, and its adoption date varied by country. Astronomers often use astronomical year numbering, which includes year zero; this page does not. The day figure therefore should not be used to date a historical event to a precise day. It is a scale conversion based on a modern average year. If the question is about chronology, specify the calendar, location and era convention before comparing dates.",
    [("Was there a year zero?", "Not in the BC/AD convention used here; 1 BC is followed by AD 1."),
     ("Why subtract one?", "The no-year-zero boundary means the elapsed-year count is BC + AD − 1."),
     ("Are the day totals historically exact?", "No. They multiply by a modern average Gregorian year."),
     ("Does it support astronomical numbering?", "No. Astronomical numbering includes year zero and needs a different conversion.")],
    [("/everyday-life/date-to-date", "Date to date"), ("/everyday-life/days-between-dates", "Days between dates"), ("/everyday-life/day-of-the-year", "Day of the year")],
)

# ------------------------------------------------------------- date of birth
AGE_DAYS = "today - dateAtYearsOld(today, -age)"
DOB = "dateAtYearsOld(today, -age)"
page(
    "date-of-birth", "Date of Birth from Age Calculator", "Date of Birth from Age — Calendar Estimate Tool",
    "Estimate the birth date for someone at a completed age on a chosen reference date. The page also reports days alive and the date and distance to the next birthday.",
    "If you know a person's completed age on a particular date, this page estimates the matching birth anniversary and the next birthday. It cannot infer the unknown month and day from age alone.",
    [D("today", "Age measured on", "2026-10-23"), F("age", "Completed age", "years", 30)],
    [RD("birth", "Estimated date of birth"), R("days_alive", "Days from estimated birth date", "days"), RD("next_birthday", "Next birthday"), R("days_to_next", "Days until next birthday", "days")],
    {"birth": DOB, "days_alive": AGE_DAYS, "next_birthday": "dateAtYearsOld(today, 1)", "days_to_next": "dateAtYearsOld(today, 1) - today"},
    [({"today": "2026-10-23", "age": 30}, {"birth": 9792, "days_alive": 10957, "next_birthday": 21114, "days_to_next": 365}, .001),
     ({"today": "2026-10-23", "age": 0}, {"birth": 20749, "days_alive": 0, "next_birthday": 21114, "days_to_next": 365}, .001)],
    "A completed age does not identify a unique date of birth. At age 30 on 23 October, the birthday could already have happened earlier in the year or still be ahead. This page makes a calendar-anniversary estimate by placing the birth date on the same month and day thirty years earlier. Use it as an estimate, not as evidence about a person.",
    "At age 30 on 23 October 2026, the anniversary estimate is 23 October 1996. The date difference is 10,957 days because seven leap days fall in that thirty-year interval. The next anniversary is 23 October 2027, 365 days away.",
    "The calculator moves the reference date backward by the completed age in whole calendar years. Days alive are the date difference from that estimate to the reference date; the next birthday moves the reference date forward one year.",
    "The true birth date for someone of a given completed age lies within an interval bounded by birthdays, not at a single guaranteed day. This estimate assumes the birthday matches the reference month and day. A 29 February reference or birth date may be clamped in a non-leap year. The days-alive total is exact for the estimated date but inherits that assumption. For forms, identity checks, medical use or legal eligibility, use a recorded date of birth rather than reverse-engineering one from age.",
    [("Can age alone reveal a birth date?", "No. Many dates are compatible with the same completed age; this page provides an anniversary estimate."),
     ("Why are there 10,957 days in 30 years?", "The span includes seven leap days, so it is longer than 30 × 365."),
     ("What does completed age mean?", "The number of birthdays already reached on the reference date."),
     ("Is this suitable for official records?", "No. Verify against an original record.")],
    [("/everyday-life/birthday", "Birthday calculator"), ("/everyday-life/days-old", "Days old"), ("/everyday-life/birth-from-death-date", "Birth date from age at death")],
)
