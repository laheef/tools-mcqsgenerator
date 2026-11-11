"""Everyday-life specs, batch B: dates, clock time, and the numbers that come
with a house and a car.

A date reaches a formula as a day number, so `end - start` is a count of days and
the calendar helpers (getYear, getMonth, getDate, dateAtYearsOld) read that number
back as a date. A clock time reaches a formula as a fraction of a day, so 06:00
is 0.25.
"""

from __future__ import annotations

from lib import D, F, R, RD, SEL, S, T

SPECS = []

# ------------------------------------------------------------------- add days

SPECS.append(S(
    slug="add-days",
    name="Add Days Calculator",
    title="Add Days to a Date — Day Calculator",
    desc="Add or subtract days from any date and read the date that comes back, the weekday it "
         "lands on and the number of weeks the move covers. The formula is shown.",
    what="A date plus a number of days is another date. The page adds the days, returns the "
         "calendar date and names the weekday, which is the part people usually want and rarely "
         "work out correctly in their heads.",
    fields=[
        D("start", "Start date", "2026-10-23", "The date you are counting from."),
        F("days", "Days to add", "days", 90, "Use a negative number to count backwards."),
    ],
    results=[
        RD("result", "Resulting date", ""),
        R("weekday", "Weekday (0 is Sunday, 5 is Friday)", ""),
        R("weeks", "Weeks covered", "weeks"),
    ],
    formula={
        "result": "start + days",
        "weekday": "mod(start + days + 4, 7)",
        "weeks": "days / 7",
    },
    prose={
        "why": "<p>Adding days to a date is easy across a month boundary and worse across a leap "
               "year. The page works in day numbers, which have no months to confuse them: 23 "
               "October plus ninety days is simply ninety more than the number that stands for "
               "23 October.</p>"
               "<p>The weekday is the same trick. 1 January 1970 was a Thursday, so a day number "
               "turns into a weekday with one remainder and no calendar table at all.</p>",
        "formula_note": "`mod(x, 7)` is the remainder after dividing by seven. Adding four first "
                        "shifts the zero from Thursday to Sunday, so the weekday line reads 0 "
                        "for Sunday, 1 for Monday and 6 for Saturday.",
        "reading": "23 October 2026 plus nineteen days is 11 November. Ninety days is twelve "
                   "weeks and six days, which is why the result does not fall on a Friday like "
                   "the start did: it lands a weekday short.",
        "example_note": "Day numbers make negative additions honest too: minus thirty days gives "
                        "the date a month earlier, with no special case for January.",
        "pitfalls": [
            "<strong>Counting the start date.</strong> Adding one gives the next day, not the "
            "same day twice. A seven-day deadline that includes today is six, not seven.",
            "<strong>Whole days only.</strong> The box takes a number of days, so a half day "
            "rounds down to no change.",
        ],
        "limits": [
            "<li><strong>No working-day rule.</strong> Weekends and public holidays are added "
            "like any other day.</li>",
            "<li><strong>No time of day.</strong> The result is a date, not a moment.</li>",
        ],
        "uses": [
            "<li>Working out a deadline from a notice period.</li>",
            "<li>Checking which weekday a holiday will fall on.</li>",
            "<li>Planning backwards with a negative number.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": "2026-10-23", "days": -30},
             "note": "Backwards thirty days stops in September."},
            {"inputs": {"start": "2026-12-20", "days": 14},
             "note": "Across the year end, where a hand count usually slips."},
        ],
    },
    faq=[
        ("Why is the weekday a number rather than a name?",
         "Because the page returns numbers, and numbers sort. 0 is Sunday, 1 is Monday and 6 is "
         "Saturday."),
        ("Does it handle leap years?",
         "Yes. Leap days live inside the day numbers, so a span across 29 February is a day "
         "longer with no special case."),
    ],
    related=[("/everyday-life/day-counter", "Day counter"),
             ("/everyday-life/days-between-dates", "Days between dates"),
             ("/everyday-life/date", "Date calculator")],
    checks=[
        ({"start": "2026-10-23", "days": 90},
         {"result": 20839, "weekday": 4, "weeks": 12.8571}, 0.01),
        ({"start": "2026-10-23", "days": -30},
         {"result": 20719, "weekday": 3, "weeks": -4.2857}, 0.01),
        ({"start": "2026-12-20", "days": 14},
         {"result": 20821, "weekday": 0, "weeks": 2}, 0.01),
    ],
))

# ---------------------------------------------------------------- day counter

SPECS.append(S(
    slug="day-counter",
    name="Day Counter Calculator",
    title="Day Counter — Day of the Year and Days Left",
    desc="Put in a date and read its position in the year, the days left after it and how far "
         "through the year it falls, in days and as a percentage. Formula shown.",
    what="Every date has a position in its year. The page counts the days from 1 January, the "
         "days remaining to 31 December, and the share of the year that has gone.",
    fields=[
        D("day", "Date", "2026-10-23"),
    ],
    results=[
        R("day_of_year", "Day of the year", "days"),
        R("left", "Days left in the year", "days"),
        R("year_length", "Days in this year", "days"),
        R("percent", "Through the year", "%"),
    ],
    formula={
        "day_of_year": "getDayOfYear(day) + 1",
        "year_length": "dateAtYearsOld(day - getDayOfYear(day), 1) - (day - getDayOfYear(day))",
        "left": "dateAtYearsOld(day - getDayOfYear(day), 1) - (day - getDayOfYear(day)) - getDayOfYear(day) - 1",
        "percent": "(getDayOfYear(day) + 1) / (dateAtYearsOld(day - getDayOfYear(day), 1) - (day - getDayOfYear(day))) * 100",
    },
    prose={
        "why": "<p>This is a page for placing one date against a whole year. Day 296 of 365 feels "
               "different from 69 days left, and both describe the same afternoon.</p>"
               "<p>The year length line is the useful one in February: it says whether the year "
               "you are counting through has 365 days or 366, which decides every count that "
               "follows.</p>",
        "formula_note": "`getDayOfYear` returns a zero-based count, so one is added for the day "
                        "itself. The year's length is measured by asking when the same 1 January "
                        "becomes the following year's 1 January.",
        "reading": "23 October 2026 is day 296 of 365, with 69 days left and 81.1 % of the year "
                   "gone. Week 43 of the year is the last full week of October.",
        "example_note": "The percentage is the line to quote: four fifths of the year behind you "
                        "is easier to picture than day 296.",
        "pitfalls": [
            "<strong>Day of year is not days left.</strong> They add to 365 or 366, never to 100.",
            "<strong>A leap year changes both figures.</strong> Check the year-length line before "
            "quoting a count.",
        ],
        "limits": [
            "<li><strong>Calendar year only.</strong> A fiscal year starting in April is a "
            "different count.</li>",
        ],
        "uses": [
            "<li>Checking a training plan against the calendar.</li>",
            "<li>Seeing how much of a budget year is left.</li>",
        ],
        "scenarios": [
            {"inputs": {"day": "2026-01-01"},
             "note": "The first day of the year: one of 365, with 364 left."},
            {"inputs": {"day": "2024-12-31"},
             "note": "A leap year, so day 366 of 366 and nothing left."},
        ],
    },
    faq=[
        ("Does the count include the date itself?",
         "Yes. 1 January is day one, not day zero, and the days-left figure does not count the "
         "chosen day twice."),
        ("How is the percentage worked out?",
         "Day of the year divided by the length of that year. On 31 December it reads 100 %."),
    ],
    related=[("/everyday-life/week", "Week number"),
             ("/everyday-life/add-days", "Add days"),
             ("/everyday-life/date", "Date calculator")],
    checks=[
        ({"day": "2026-10-23"},
         {"day_of_year": 296, "left": 69, "year_length": 365, "percent": 81.0959}, 0.01),
        ({"day": "2026-01-01"},
         {"day_of_year": 1, "left": 364, "year_length": 365, "percent": 0.274}, 0.01),
        ({"day": "2024-12-31"},
         {"day_of_year": 366, "left": 0, "year_length": 366, "percent": 100}, 0.01),
    ],
))

# ----------------------------------------------------------------------- week

SPECS.append(S(
    slug="week",
    name="Week Calculator",
    title="Week Calculator — Weekday and Week Dates",
    desc="Give the page a date and it returns the weekday, the Monday and Sunday that bracket "
         "it, and its position in the year, so a week can be planned rather than guessed.",
    what="A week is seven days with a fixed beginning and end. The page names the weekday, "
         "returns the Monday and Sunday that bracket the chosen date and places the date inside "
         "the year.",
    fields=[
        D("date", "Date", "2026-10-23"),
    ],
    results=[
        R("weekday", "Weekday (1 is Monday, 7 is Sunday)", ""),
        R("day_of_year", "Day of the year", "days"),
        RD("monday", "Monday of that week", ""),
        RD("sunday", "Sunday of that week", ""),
    ],
    formula={
        "weekday": "mod(date + 3, 7) + 1",
        "day_of_year": "getDayOfYear(date) + 1",
        "monday": "date - mod(date + 3, 7)",
        "sunday": "date - mod(date + 3, 7) + 6",
    },
    prose={
        "why": "<p>Weeks are the unit payroll, schools and delivery schedules run on, and they are "
               "the one calendar unit that refuses to line up with months. A year holds 52 weeks "
               "and a day, or 52 and two in a leap year.</p>"
               "<p>Because the boundaries are fixed, a week can be quoted as two dates: this is "
               "the form that survives being written down and read a month later.</p>"
               "<p>Deliveries are the other place it comes up. A supplier promising “week "
               "commencing Monday” is giving two dates, not a slogan: the Monday and the Sunday "
               "that bracket the delivery are what the warehouse and the customer both read, and "
               "a promise written that way leaves the two of them nothing to argue about.</p>",
        "formula_note": "`mod(date + 3, 7)` turns a day number into a weekday with Monday as zero, "
                        "because 1 January 1970 was a Thursday. Adding one gives the 1-to-7 "
                        "numbering people expect.",
        "reading": "23 October 2026 is a Friday, day 296 of the year, in the week that runs from "
                   "Monday 19 October to Sunday 25 October. Writing the pair is what makes the "
                   "answer usable.",
        "example_note": "The Monday line is the one to copy into a diary. A week number alone is "
                        "a label; a week with its Monday is a plan.",
        "pitfalls": [
            "<strong>Assuming Sunday starts the week.</strong> This page uses Monday, which is "
            "the ISO convention and the working week in most of Europe.",
            "<strong>Quoting a week number without a year.</strong> Week 1 of one year and week "
            "1 of the next are a year apart.",
        ],
        "limits": [
            "<li><strong>No ISO week numbering.</strong> The page gives the weekday and the two "
            "boundary dates, not a week number that can drift across years.</li>",
            "<li><strong>No holiday awareness.</strong> A public holiday is a normal weekday "
            "here.</li>",
        ],
        "uses": [
            "<li>Filing a timesheet by week.</li>",
            "<li>Booking a hotel by the week rather than by nights.</li>",
            "<li>Planning a course across a term.</li>",
        ],
        "scenarios": [
            {"inputs": {"date": "2026-01-01"},
             "note": "New Year's Day 2026 is a Thursday, so its week begins on 29 December 2025."},
        ],
    },
    faq=[
        ("Why does the week start on Monday?",
         "Because that is the ISO convention and the one payroll in most of Europe uses. The "
         "Monday and Sunday lines always agree with the weekday number."),
        ("Can I get the week number?",
         "Not from this page: week numbering depends on rules that move the first week of the "
         "year, and the two dates are the unambiguous answer."),
    ],
    related=[("/everyday-life/day-counter", "Day counter"),
             ("/everyday-life/calendar", "Calendar"),
             ("/everyday-life/working-days", "Working days")],
    checks=[
        ({"date": "2026-10-23"},
         {"weekday": 5, "day_of_year": 296, "monday": 20745, "sunday": 20751}, 0.01),
        ({"date": "2026-01-01"},
         {"weekday": 4, "day_of_year": 1, "monday": 20451, "sunday": 20457}, 0.01),
    ],
))

# -------------------------------------------------------------- month counter

SPECS.append(S(
    slug="month-counter",
    name="Month Counter",
    title="Month Counter — Months Between Two Dates",
    desc="Count the months between two dates, with the days left over, for leases, notice periods "
         "and anything else written in months rather than in days. Formula shown.",
    what="Months do not divide evenly, so an honest count is whole months plus a remainder in "
         "days. The page returns both, along with the decimal count for comparison.",
    fields=[
        D("start", "Start date", "2026-01-15"),
        D("end", "End date", "2026-10-23"),
    ],
    results=[
        R("months", "Whole months", "months"),
        R("days", "Days left over", "days"),
        R("decimal", "Months, decimal", "months"),
        R("days_total", "Days in total", "days"),
    ],
    formula={
        "months": "floor((end - start) / 30.436875)",
        "days": "end - start - floor((end - start) / 30.436875) * 30.436875",
        "decimal": "(end - start) / 30.436875",
        "days_total": "end - start",
    },
    prose={
        "why": "<p>A tenancy from 15 January to 15 April is three months. A notice period of "
               "ninety days is not. The difference matters whenever a contract uses one and a "
               "calendar uses the other, which is most of the time.</p>"
               "<p>Whole months plus the days left over is the form a person can check against a "
               "calendar, so that is the form the page returns first.</p>"
               "<p>Notice is where the two answers part company in practice. Two months served on "
               "31 January expires on 31 March, not after sixty days, and a clause that lets the "
               "two readings sit side by side is a dispute waiting for a date. Describe the "
               "period in whole months, settle the ending with the dates.</p>",
        "formula_note": "The month used here is 30.436 875 days, the average over the Gregorian "
                        "400-year cycle. A count in average months is an estimate; the day count "
                        "beside it is exact.",
        "reading": "15 January to 23 October is 281 days, which is nine whole months and about "
                   "seven days over. The honest description is nine months and a week.",
        "example_note": "Two dates inside one month give zero whole months and the day count, "
                        "which is the right answer for a short let.",
        "pitfalls": [
            "<strong>Expecting exact calendar months.</strong> February is short and August is "
            "long, and an average cannot follow either.",
            "<strong>Counting the end date twice.</strong> The span is a subtraction, so the "
            "second date is the boundary, not an extra day.",
        ],
        "limits": [
            "<li><strong>It is an average month.</strong> A notice period written in calendar "
            "months needs a calendar, not this page.</li>",
        ],
        "uses": [
            "<li>Describing a tenancy in months.</li>",
            "<li>Checking an instalment schedule.</li>",
            "<li>Working out how many payments a short lease covers.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": "2026-01-15", "end": "2026-04-15"},
             "note": "Three calendar months, and ninety days in the day count."},
        ],
    },
    faq=[
        ("Why is the month count not a round number?",
         "Because months are not a fixed length. The page separates whole months from leftover "
         "days and shows the decimal for comparison only."),
        ("Which count should I put in a contract?",
         "Neither: write the dates. A month count is a description, and the dates are the "
         "agreement."),
    ],
    related=[("/everyday-life/days-between-dates", "Days between dates"),
             ("/everyday-life/months-between-dates", "Months between dates"),
             ("/everyday-life/years-between-dates", "Years between dates")],
    checks=[
        ({"start": "2026-01-15", "end": "2026-10-23"},
         {"months": 9, "days_total": 281, "decimal": 9.2322}, 0.01),
        ({"start": "2026-01-15", "end": "2026-04-15"},
         {"months": 2, "days_total": 90, "decimal": 2.9569}, 0.01),
    ],
))

# ------------------------------------------------------- years between dates

SPECS.append(S(
    slug="years-between-dates",
    name="Years Between Dates",
    title="Years Between Two Dates — Decimal Years",
    desc="The number of years between two dates, as a decimal and as whole years with the days "
         "left over, for anniversaries, service records and ages. Formula shown.",
    what="A span of days becomes years by dividing by the average year. The page also returns "
         "whole years and the leftover days, which is the form people quote.",
    fields=[
        D("start", "From", "1990-05-17"),
        D("end", "To", "2026-10-23"),
    ],
    results=[
        R("years", "Years", "years"),
        R("whole", "Whole years", "years"),
        R("days", "Days after the last whole year", "days"),
        R("total_days", "Days in total", "days"),
    ],
    formula={
        "years": "(end - start) / 365.2425",
        "whole": "floor((end - start) / 365.2425)",
        "days": "end - start - floor((end - start) / 365.2425) * 365.2425",
        "total_days": "end - start",
    },
    prose={
        "why": "<p>Thirty-six years and five months is easier to check than 13 308 days, and both "
               "describe the same span. The page returns three forms so the one you need is "
               "already on screen.</p>"
               "<p>Where this number earns its keep is a service record. A reference letter says "
               "“six years”; the appointment letter is dated 19 April 2019 and the leaving date "
               "is 2 May 2025. The decimal gives 6.04 and the whole years give six, and the days "
               "left over are what turns a rounded-off sentence into a figure a pension "
               "administrator will accept without asking for the dates.</p>",
        "formula_note": "365.242 5 is the mean Gregorian year. Dividing by 365 instead would drift "
                        "by a day every fourth year, which is the whole reason for the extra "
                        "0.2425.",
        "reading": "17 May 1990 to 23 October 2026 is 13 308 days, or 36.44 years, which is 36 "
                   "whole years and 159 days. Quote the whole years and days; use the decimal "
                   "only to compare two spans.",
        "example_note": "A span that ends before the birthday gives one year fewer in the whole "
                        "count, which is the difference between an age and a decimal span.",
        "pitfalls": [
            "<strong>Treating the decimal as an age.</strong> An age counts birthdays, not "
            "average years.",
            "<strong>Rounding the whole years up.</strong> The floor is deliberate: a span of "
            "364 days is zero whole years.",
            "<strong>Counting leap days by hand.</strong> Four leap years in a sixteen-year span "
            "add four days; dividing by 365 rather than 365.2425 turns those four days into a "
            "decimal that disagrees with the calendar.",
        ],
        "limits": [
            "<li><strong>No calendar walk.</strong> The count is days divided by an average year, "
            "not a step through anniversaries.</li>",
        ],
        "uses": [
            "<li>Length of service.</li>",
            "<li>The span between two historical dates.</li>",
            "<li>A warranty that runs for a fixed number of years from the purchase date.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": "2000-01-01", "end": "2001-01-01"},
             "note": "A leap year: 366 days, and 1.0021 in the decimal."},
        ],
    },
    faq=[
        ("Is this the same as an age?",
         "No. An age counts whole birthdays, while this counts elapsed days over an average "
         "year. They agree on the birthday itself."),
        ("Why does the day remainder look odd?",
         "Because it is measured from an average year, not from the last anniversary. The age "
         "page is the one that counts anniversaries."),
    ],
    related=[("/everyday-life/days-between-dates", "Days between dates"),
             ("/everyday-life/age", "Age calculator"),
             ("/everyday-life/anniversary", "Anniversary")],
    checks=[
        ({"start": "1990-05-17", "end": "2026-10-23"},
         {"total_days": 13308, "years": 36.4361, "whole": 36}, 0.01),
        ({"start": "2000-01-01", "end": "2001-01-01"},
         {"total_days": 366, "years": 1.0021, "whole": 1}, 0.01),
    ],
))

# ------------------------------------------------------------------------ age

SPECS.append(S(
    slug="age",
    name="Age Calculator",
    title="Age Calculator — Exact Age in Years and Days",
    desc="Enter a date of birth and a date to measure to and the page returns the age in whole "
         "years, the days since the last birthday and the next birthday date.",
    what="Age is the number of birthdays a person has had, which is not the same as days divided "
         "by 365. The page counts the birthdays properly, then reports the days since the last "
         "one and the date of the next.",
    fields=[
        D("birth", "Date of birth", "1990-05-17"),
        D("on", "Age on this date", "2026-10-23"),
    ],
    results=[
        R("age", "Age in whole years", "years"),
        R("days_since", "Days since the last birthday", "days"),
        R("next_birthday_days", "Days until the next birthday", "days"),
        RD("next_birthday", "Next birthday", ""),
        R("total_days", "Days lived", "days"),
    ],
    formula={
        "age": "getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0))",
        "next_birthday": "dateAtYearsOld(birth, getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)) + 1)",
        "next_birthday_days": "dateAtYearsOld(birth, getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)) + 1) - on",
        "total_days": "on - birth",
        "days_since": "on - dateAtYearsOld(birth, getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))",
    },
    prose={
        "why": "<p>Age is not days divided by 365. It is the number of birthdays that have "
               "happened, which is why a person born on 29 February is a year older on 1 March in "
               "an ordinary year, and why two people born a day apart can differ by a year.</p>"
               "<p>The page counts the birthdays from the two calendar dates, then measures the "
               "distance to the next one. That distance is the number that matters for planning a "
               "party or a renewal.</p>",
        "formula_note": "The age line compares months first and days second, so a birthday later "
                        "in the same month counts as not yet happened. The next-birthday line "
                        "reuses the same count and adds one year.",
        "reading": "Born on 17 May 1990, measured on 23 October 2026: thirty-six years old, 159 "
                   "days past the last birthday, 206 days until the next one on 17 May 2027, and "
                   "13 308 days lived.",
        "example_note": "Move the second date a day back to 16 May and the age drops to "
                        "thirty-five, because the birthday has not happened yet in that calendar "
                        "year.",
        "pitfalls": [
            "<strong>Years instead of birthdays.</strong> Subtracting birth years gives an age "
            "that is wrong for anyone whose birthday has not happened yet.",
            "<strong>Leap-day births.</strong> In an ordinary year the anniversary is treated as "
            "1 March, which is the usual legal convention but not the only one.",
        ],
        "limits": [
            "<li><strong>Dates, not moments.</strong> A time of birth would change the count only "
            "on the birthday itself.</li>",
            "<li><strong>No time zone.</strong> A birth recorded just before midnight in another "
            "zone can shift by a day.</li>",
        ],
        "uses": [
            "<li>Filling an age into a form.</li>",
            "<li>Planning the next birthday.</li>",
            "<li>Working out an age from a family record.</li>",
        ],
        "scenarios": [
            {"inputs": {"birth": "1990-05-17", "on": "2026-05-16"},
             "note": "One day before the birthday: still thirty-five."},
            {"inputs": {"birth": "2000-02-29", "on": "2026-03-01"},
             "note": "A leap-day birth, counted at the start of March."},
        ],
    },
    faq=[
        ("Does it count the birthday itself?",
         "Yes. On 17 May the age increases and the days-until figure becomes 365 or 366."),
        ("Why is the age different from the decimal years?",
         "Because an age counts birthdays and a decimal count divides days by an average year. "
         "The age is the one a form expects."),
    ],
    related=[("/everyday-life/age-in-days", "Age in days"),
             ("/everyday-life/birth-year", "Birth year"),
             ("/everyday-life/age-difference", "Age difference")],
    checks=[
        ({"birth": "1990-05-17", "on": "2026-10-23"},
         {"age": 36, "days_since": 159, "next_birthday_days": 206, "total_days": 13308}, 0.01),
        ({"birth": "1990-05-17", "on": "2026-05-16"},
         {"age": 35, "next_birthday_days": 1}, 0.01),
        ({"birth": "2000-02-29", "on": "2026-03-01"},
         {"age": 26}, 0.01),
    ],
))

# --------------------------------------------------------------- time duration

SPECS.append(S(
    slug="time-duration",
    name="Time Duration Calculator",
    title="Time Duration Calculator — Hours Between Times",
    desc="Put in a start time and an end time and the page returns the duration in hours, in "
         "minutes and in decimal hours, with an option for a shift that runs past midnight.",
    what="A duration is the end time minus the start time. The page returns it in hours, in "
         "minutes and in decimal hours, which is the form a timesheet wants.",
    fields=[
        T("start", "Start time", "09:00"),
        T("end", "End time", "17:30"),
        SEL("overnight", "Does the shift run past midnight?",
            [("No, same day", 0), ("Yes, past midnight", 1)], 0),
    ],
    results=[
        R("hours", "Duration", "h"),
        R("minutes", "Duration in minutes", "min"),
        R("decimal", "Decimal hours", "h"),
        R("breaks", "After a 30-minute break", "h"),
    ],
    formula={
        # A page with clock boxes hands the formulas milliseconds, because the
        # definition spells out 86 400 000 and the solver leaves the conversion
        # to the formula (Solver::formulaUnits). So: difference in ms / 3 600 000.
        "hours": "(end - start + overnight * 86400000) / 3600000",
        "minutes": "(end - start + overnight * 86400000) / 60000",
        "decimal": "(end - start + overnight * 86400000) / 3600000",
        "breaks": "(end - start + overnight * 86400000) / 3600000 - 0.5",
    },
    prose={
        "why": "<p>Clock time is not decimal, which is where most of the mistakes on a timesheet "
               "come from. Half past five is 17.5 hours in decimal and 17:30 on a clock, and a "
               "shift from nine to half past five is eight and a half hours, not eight point "
               "five zero minutes.</p>"
               "<p>The page returns hours, minutes and decimal hours from the same subtraction, "
               "so a timesheet and a rota can be checked against each other.</p>",
        "formula_note": "The two clock times arrive as milliseconds, so the difference is divided "
                        "by 3 600 000 to reach hours and by 60 000 to reach minutes. The "
                        "past-midnight answer adds a whole day's worth of milliseconds first.",
        "reading": "09:00 to 17:30 is 8.5 hours, or 510 minutes, or 8.5 in decimal. Take off a "
                   "half-hour break and it is 8.0, which is the number a payroll system will "
                   "want.",
        "example_note": "A shift from 22:00 to 06:00 needs the past-midnight answer. Without it "
                        "the subtraction is negative, and negative hours are always a sign that "
                        "the day boundary was crossed.",
        "pitfalls": [
            "<strong>Reading 17:30 as 17.30.</strong> Decimal hours are not clock minutes: 30 "
            "minutes is 0.5 of an hour, not 0.3.",
            "<strong>Forgetting the unpaid break.</strong> The fourth line does that subtraction "
            "once; two breaks need the arithmetic done twice.",
        ],
        "limits": [
            "<li><strong>No time zones.</strong> Both times are read on the same clock.</li>",
            "<li><strong>One break only.</strong> The break line assumes thirty minutes.</li>",
        ],
        "uses": [
            "<li>Filling a timesheet.</li>",
            "<li>Working out overtime.</li>",
            "<li>Checking a rota against contracted hours.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": "22:00", "end": "06:00", "overnight": 1},
             "note": "A night shift: eight hours once the day boundary is allowed for."},
            {"inputs": {"start": "09:00", "end": "17:30", "overnight": 0},
             "note": "The default day shift, and eight hours after a break."},
        ],
    },
    faq=[
        ("Why is the duration in decimal hours as well as hours and minutes?",
         "Because payroll multiplies decimal hours by a rate. 8.5 is easy to multiply; 8 h 30 min "
         "is not."),
        ("What if the end time is earlier than the start?",
         "Answer yes to the past-midnight question. Otherwise the page reports a negative "
         "duration, which is honest rather than wrong."),
    ],
    related=[("/everyday-life/hours-to-decimal", "Hours to decimal"),
             ("/everyday-life/add-time", "Add time"),
             ("/everyday-life/8-hour-shift", "8-hour shift")],
    checks=[
        ({"start": "09:00", "end": "17:30", "overnight": 0},
         {"hours": 8.5, "minutes": 510, "decimal": 8.5, "breaks": 8}, 0.01),
        ({"start": "22:00", "end": "06:00", "overnight": 1},
         {"hours": 8, "minutes": 480, "decimal": 8, "breaks": 7.5}, 0.01),
    ],
))

# ------------------------------------------------------------ hours to decimal

SPECS.append(S(
    slug="hours-to-decimal",
    name="Hours to Decimal Calculator",
    title="Hours to Decimal — Time in Decimal Hours",
    desc="Turn hours, minutes and seconds into decimal hours, decimal minutes and a total in "
         "seconds, which is the form timesheets and invoices multiply by. Formula shown.",
    what="Decimal time is clock time with the base sixty taken out. The page converts hours, "
         "minutes and seconds into one number, and returns the same span in minutes and seconds "
         "so it can be checked.",
    fields=[
        F("h", "Hours", "h", 2, "Whole hours."),
        F("m", "Minutes", "min", 45, "Minutes beyond the whole hours."),
        F("s", "Seconds", "s", 30, "Seconds beyond the minutes."),
    ],
    results=[
        R("decimal", "Decimal hours", "h"),
        R("minutes", "Total minutes", "min"),
        R("seconds", "Total seconds", "s"),
        R("pay", "Pay at 18.50 an hour", ""),
    ],
    formula={
        "decimal": "h + m / 60 + s / 3600",
        "minutes": "h * 60 + m + s / 60",
        "seconds": "h * 3600 + m * 60 + s",
        "pay": "(h + m / 60 + s / 3600) * 18.5",
    },
    prose={
        "why": "<p>A timesheet wants one number, and a clock gives three. Converting 2 h 45 min to "
               "2.75 is the step that decides whether a week's pay is right, and it is the step "
               "most often done by adding the wrong part.</p>"
               "<p>The pay line is the conversion multiplied by a rate, which is exactly what "
               "payroll software does with the decimal figure.</p>",
        "formula_note": "Minutes are divided by sixty and seconds by three thousand six hundred, "
                        "because both are fractions of an hour. The total-seconds line multiplies "
                        "the hours by 3 600 and adds the rest.",
        "reading": "2 h 45 min 30 s is 2.7583 decimal hours, or 165.5 minutes, or 9 930 seconds. "
                   "At 18.50 an hour that is 51.03.",
        "example_note": "Read the decimal to four places before rounding: 2.758 rounds to 2.76, "
                        "and a fortnight of small roundings is a visible difference on a "
                        "payslip.",
        "pitfalls": [
            "<strong>Writing 2.45 for 2 h 45 min.</strong> The decimal equivalent is 2.75, "
            "because 45 minutes is three quarters of an hour.",
            "<strong>Rounding each day before adding.</strong> Add the decimal hours first and "
            "round the total, or the error compounds.",
        ],
        "limits": [
            "<li><strong>No unpaid breaks.</strong> Subtract them from the minutes before you "
            "type, or use the duration page.</li>",
        ],
        "uses": [
            "<li>Turning a clock reading into a timesheet figure.</li>",
            "<li>Checking a payroll line.</li>",
            "<li>Converting a film or meeting length into decimal hours.</li>",
        ],
        "scenarios": [
            {"inputs": {"h": 0, "m": 90, "s": 0},
             "note": "Ninety minutes is one and a half decimal hours."},
        ],
    },
    faq=[
        ("Why not just write 2.45?",
         "Because 45 minutes is 0.75 of an hour. Writing 2.45 understates the time by eighteen "
         "minutes."),
        ("Which figure should go on an invoice?",
         "Decimal hours, to two places. The minutes line is for checking, not for billing."),
    ],
    related=[("/everyday-life/time-duration", "Time duration"),
             ("/everyday-life/hours-minutes", "Hours and minutes"),
             ("/everyday-life/time-to-decimal", "Time to decimal")],
    checks=[
        ({"h": 2, "m": 45, "s": 30},
         {"decimal": 2.7583, "minutes": 165.5, "seconds": 9930, "pay": 51.0292}, 0.01),
        ({"h": 0, "m": 90, "s": 0},
         {"decimal": 1.5, "minutes": 90, "seconds": 5400, "pay": 27.75}, 0.01),
    ],
))

# ---------------------------------------------------------------- hair growth

SPECS.append(S(
    slug="hair-growth",
    name="Hair Growth Calculator",
    title="Hair Growth Calculator — Length per Month",
    desc="How much hair grows in a given number of months at a chosen rate, in centimetres and "
         "inches, with the length you would reach from a starting haircut. Formula shown.",
    what="Hair grows at about a centimetre a month, more in summer and less with age. The page "
         "multiplies a chosen rate by a number of months and returns the length gained and the "
         "length you would end up with.",
    fields=[
        F("rate", "Growth per month", "cm/month", 1.25,
          "1.25 cm is the usual adult average; 1.0 is conservative."),
        F("months", "Months", "months", 12),
        F("current", "Current length", "cm", 5, "The length you are starting from."),
    ],
    results=[
        R("grown", "Length gained", "cm"),
        R("inches", "Length gained", "in"),
        R("total", "Total length", "cm"),
        R("per_year", "Growth per year", "cm"),
    ],
    formula={
        "grown": "rate * months",
        "inches": "rate * months / 2.54",
        "total": "current + rate * months",
        "per_year": "rate * 12",
    },
    prose={
        "why": "<p>Hair grows about 1.25 cm a month, which is 15 cm a year, or six inches. That "
               "single fact settles most arguments about how long a style will take to grow "
               "out.</p>"
               "<p>The rate is a box rather than a constant because it varies: children grow "
               "faster, older scalps slower, and summer is slightly quicker than winter.</p>",
        "formula_note": "The inch conversion is the exact one: 2.54 cm to the inch. The yearly "
                        "line multiplies the monthly rate by twelve and makes no allowance for "
                        "the extra days in a leap year.",
        "reading": "At 1.25 cm a month, a year adds 15 cm, which is just under six inches. From a "
                   "five-centimetre cut that is twenty centimetres in total, roughly shoulder "
                   "length on most adults.",
        "example_note": "Use 1.0 cm a month if you want a conservative estimate for a haircut you "
                        "cannot undo, and 1.5 for a child or a summer season.",
        "pitfalls": [
            "<strong>Measuring from the root.</strong> Curly hair measures shorter stretched than "
            "it looks, and the growth rate is unchanged.",
            "<strong>Expecting the rate to hold for years.</strong> Growth slows with age and "
            "with damage; the box is a rate, not a promise.",
        ],
        "limits": [
            "<li><strong>No trimming.</strong> The length gained is net of nothing: a trim "
            "removes what this page adds.</li>",
            "<li><strong>No breakage.</strong> Damaged hair loses length at the ends faster than "
            "it grows at the root.</li>",
        ],
        "uses": [
            "<li>Planning a grow-out from a short cut.</li>",
            "<li>Estimating when a style will reach the shoulders.</li>",
        ],
        "scenarios": [
            {"inputs": {"rate": 1.0, "months": 6, "current": 0},
             "note": "A conservative six months: six centimetres, or 2.36 inches."},
        ],
    },
    faq=[
        ("How fast does hair actually grow?",
         "About 1.25 cm a month on average, or half an inch. Scalp hair grows faster than body "
         "hair, and summer is slightly faster than winter."),
        ("Why does the page ask for a starting length?",
         "Because total length is what people plan with. The gain on its own does not say whether "
         "you will reach a style."),
    ],
    related=[("/everyday-life/age", "Age calculator"),
             ("/everyday-life/bed-size", "Bed size"),
             ("/everyday-life/beauty-products", "Beauty products")],
    checks=[
        ({"rate": 1.25, "months": 12, "current": 5},
         {"grown": 15, "inches": 5.9055, "total": 20, "per_year": 15}, 0.01),
        ({"rate": 1.0, "months": 6, "current": 0},
         {"grown": 6, "inches": 2.3622, "total": 6, "per_year": 12}, 0.01),
    ],
))

# ------------------------------------------------------------------ cord wood

SPECS.append(S(
    slug="cord-wood",
    name="Cord of Wood Calculator",
    title="Cord of Wood Calculator — Stack Volume",
    desc="Work out the volume of a stack of firewood in cubic feet and in cords, from its length, "
         "height and depth, with the loose volume in cubic metres beside it.",
    what="A cord of firewood is a stack 8 feet long, 4 feet high and 4 feet deep, which is 128 "
         "cubic feet. The page measures your stack and says how many cords it holds.",
    fields=[
        F("length", "Stack length", "ft", 8),
        F("height", "Stack height", "ft", 4),
        F("depth", "Log length (stack depth)", "ft", 4,
          "The length of the logs themselves, which is how deep the stack is."),
        F("price", "Price per cord", "", 320),
    ],
    results=[
        R("volume", "Stack volume", "ft³"),
        R("cords", "Cords", "cords"),
        R("cubic_metres", "Volume", "m³"),
        R("cost", "Cost of this stack", ""),
    ],
    formula={
        "volume": "length * height * depth",
        "cords": "length * height * depth / 128",
        "cubic_metres": "length * height * depth * 0.0283168",
        "cost": "length * height * depth / 128 * price",
    },
    prose={
        "why": "<p>Firewood is sold in cords, and a cord is a volume rather than a weight: 128 "
               "cubic feet of stacked wood. Because logs are round, a stack of that size holds "
               "rather less solid wood, which is why the same cord can look different at two "
               "suppliers.</p>"
               "<p>The page measures the stack you have, not the one you were promised. A stack "
               "8 by 4 by 4 is one cord; a stack 8 by 4 by 2 is half a cord, and the arithmetic "
               "is three multiplications.</p>",
        "formula_note": "128 is eight times four times four: the definition of a cord written as "
                        "a number. The cubic metre line uses 0.028 316 8, the exact conversion "
                        "from cubic feet.",
        "reading": "A full cord is 8 × 4 × 4 ft, so 128 ft³, or 3.62 m³. At 320 a cord, a stack "
                   "half that size is 160.",
        "example_note": "A face cord is a stack 8 feet long and 4 feet high but only one log "
                        "deep. If a supplier quotes face cords, ask for the depth: the page "
                        "cannot guess it.",
        "pitfalls": [
            "<strong>Measuring the logs, not the stack.</strong> Depth is the length of the log "
            "plus the gaps in the stack, so measure the whole depth.",
            "<strong>Buying by the truckload.</strong> A loose cubic metre and a stacked one are "
            "different quantities; this page measures stacked volume.",
        ],
        "limits": [
            "<li><strong>Stacked volume, not solid wood.</strong> Gaps between logs mean a cord "
            "is roughly 70 to 80 per cent solid timber.</li>",
            "<li><strong>No moisture.</strong> Seasoned and green wood occupy the same space and "
            "burn very differently.</li>",
        ],
        "uses": [
            "<li>Checking a delivery against what was paid for.</li>",
            "<li>Working out how much wood a stove will need for a winter.</li>",
        ],
        "scenarios": [
            {"inputs": {"length": 8, "height": 4, "depth": 2, "price": 320},
             "note": "Half a cord: 64 ft³, 1.81 m³, and 160 at the same price per cord."},
        ],
    },
    faq=[
        ("What is a cord of wood?",
         "128 cubic feet of stacked firewood: a stack 8 ft long, 4 ft high and 4 ft deep. It is a "
         "volume, not a weight."),
        ("Is a face cord the same as a cord?",
         "No. A face cord is one log deep, so its volume depends on the log length. A full cord "
         "needs the depth to be 4 feet."),
    ],
    related=[("/everyday-life/well-volume", "Well volume"),
             ("/everyday-life/bean-bag-filling", "Bean bag filling"),
             ("/everyday-life/bag", "Bag size")],
    checks=[
        ({"length": 8, "height": 4, "depth": 4, "price": 320},
         {"volume": 128, "cords": 1, "cubic_metres": 3.6246, "cost": 320}, 0.01),
        ({"length": 8, "height": 4, "depth": 2, "price": 320},
         {"volume": 64, "cords": 0.5, "cubic_metres": 1.8123, "cost": 160}, 0.01),
    ],
))

# -------------------------------------------------------------- dilution ratio

SPECS.append(S(
    slug="dilution-ratio",
    name="Dilution Ratio Calculator",
    title="Dilution Ratio Calculator — Product and Water",
    desc="Split a bottle into product and water at a chosen dilution ratio, so a 1:4 mix in a "
         "500 ml bottle gives the exact amounts of each rather than a guess.",
    what="A dilution of 1 to n means one part product to n parts water. The page splits a "
         "container into those parts, so the bottle ends up the size you wanted rather than the "
         "size the arithmetic happened to produce.",
    fields=[
        F("parts", "Parts water", "parts", 4, "The n in a 1:n dilution. Use 9 for 1:10."),
        F("container", "Container size", "ml", 500),
        F("product_price", "Price of the product per litre", "", 8.5,
          "Optional: used for the cost line."),
    ],
    results=[
        R("product", "Product", "ml"),
        R("water", "Water", "ml"),
        R("ratio_percent", "Product concentration", "%"),
        R("cost", "Cost of product in this mix", ""),
    ],
    formula={
        "product": "container / (parts + 1)",
        "water": "container - container / (parts + 1)",
        "ratio_percent": "1 / (parts + 1) * 100",
        "cost": "container / (parts + 1) / 1000 * product_price",
    },
    prose={
        "why": "<p>A ratio of 1:4 is five parts in total, not four. That single fact is behind "
               "most diluted bottles that come out too strong, because adding 100 ml of product to "
               "400 ml of water gives 500 ml, while filling a 500 ml bottle with 100 ml and then "
               "topping it up gives the same thing and is easier to do.</p>"
               "<p>The page works from the container size backwards, which is how a bottle is "
               "actually filled.</p>",
        "formula_note": "The container is divided by the parts plus one, because the product "
                        "itself makes up the extra part. The concentration line is that same "
                        "fraction as a percentage.",
        "reading": "A 1:4 mix in 500 ml is 100 ml of product and 400 ml of water, which is 20 % "
                   "product. At 8.50 a litre, the product in that bottle costs 0.85.",
        "example_note": "For a 1:10 mix, put 9 in the parts box. Ten parts in total, so a 500 ml "
                        "bottle takes 45 ml of product.",
        "pitfalls": [
            "<strong>Reading 1:4 as 4 parts total.</strong> It is five, and the page divides by "
            "the total.",
            "<strong>Mixing by eye.</strong> A mark on the bottle is worth more than a judgement; "
            "measure the product, then fill to the line.",
        ],
        "limits": [
            "<li><strong>Volume only.</strong> Some products are mixed by weight, and this page "
            "assumes millilitres throughout.</li>",
            "<li><strong>No manufacturer's instructions.</strong> The ratio is yours to type; the "
            "label always wins.</li>",
        ],
        "uses": [
            "<li>Filling a spray bottle at the label's ratio.</li>",
            "<li>Working out how much concentrate a job needs.</li>",
        ],
        "scenarios": [
            {"inputs": {"parts": 9, "container": 500, "product_price": 8.5},
             "note": "A 1:10 mix: 45 ml of product and 455 ml of water."},
        ],
    },
    faq=[
        ("Is 1:4 the same as 25 % product?",
         "No. 1:4 is one part in five, which is 20 %. 25 % would be 1:3."),
        ("Can I mix a larger batch at the same ratio?",
         "Yes: the ratio does not change with the container, and the page scales with it."),
    ],
    related=[("/everyday-life/cleaning-cost", "Cleaning cost"),
             ("/everyday-life/pool-shock", "Pool shock"),
             ("/chemistry/dilution-factor", "Dilution factor")],
    checks=[
        ({"parts": 4, "container": 500, "product_price": 8.5},
         {"product": 100, "water": 400, "ratio_percent": 20, "cost": 0.85}, 0.01),
        ({"parts": 9, "container": 500, "product_price": 8.5},
         {"product": 50, "water": 450, "ratio_percent": 10, "cost": 0.425}, 0.01),
    ],
))

# ------------------------------------------------------------------ fuel cost

SPECS.append(S(
    slug="fuel-cost",
    name="Fuel Cost Calculator",
    title="Fuel Cost Calculator — Trip Cost from Consumption",
    desc="Work out what a journey costs in fuel from the distance, the car's consumption and the "
         "price at the pump, with the cost per hundred kilometres beside it.",
    what="A trip's fuel cost is the litres it burns times the price. The page returns the litres, "
         "the cost of the trip and the cost of a hundred kilometres, which is the figure that "
         "compares two cars.",
    fields=[
        F("distance", "Distance", "km", 500),
        F("consumption", "Fuel consumption", "L/100 km", 6.5,
          "Use the car's real average, not the brochure figure."),
        F("price", "Fuel price", "per litre", 1.75),
    ],
    results=[
        R("litres", "Fuel used", "L"),
        R("cost", "Cost of the trip", ""),
        R("per_km", "Cost per kilometre", ""),
        R("per_100", "Cost per 100 km", ""),
    ],
    formula={
        "litres": "distance / 100 * consumption",
        "cost": "distance / 100 * consumption * price",
        "per_km": "consumption / 100 * price",
        "per_100": "consumption * price",
    },
    prose={
        "why": "<p>Fuel cost is two multiplications: litres used, then litres times the price. "
               "The useful part is knowing the litres, because that is the number that changes "
               "when the route changes and stays the same when the price does.</p>"
               "<p>The cost per hundred kilometres is the comparison figure. Two cars with "
               "different consumption can be compared on one number, whatever the length of the "
               "trip.</p>",
        "formula_note": "Consumption in litres per hundred kilometres is divided by a hundred to "
                        "get litres per kilometre. A car quoted in miles per gallon needs "
                        "converting first; the fuel-consumption page does that.",
        "reading": "500 km at 6.5 L/100 km is 32.5 litres. At 1.75 a litre the trip costs 56.88, "
                   "which is 11.38 per hundred kilometres, or 11 cents a kilometre.",
        "example_note": "The per-kilometre line is the one to keep for a mileage claim, because it "
                        "does not change with the length of the journey.",
        "pitfalls": [
            "<strong>The brochure figure.</strong> Real consumption is usually ten to twenty per "
            "cent higher, especially on short trips.",
            "<strong>Rounding the litres.</strong> Cost is computed from the unrounded figure, so "
            "multiplying the printed litres by the price by hand can differ by a cent.",
        ],
        "limits": [
            "<li><strong>Fuel only.</strong> Tyres, depreciation and tolls are outside the "
            "multiplication.</li>",
            "<li><strong>One consumption figure.</strong> A trip with a loaded roof box burns "
            "more, and the page cannot know.</li>",
        ],
        "uses": [
            "<li>Splitting the fuel cost of a shared drive.</li>",
            "<li>Comparing a route with a detour.</li>",
            "<li>Budgeting a holiday by distance.</li>",
        ],
        "scenarios": [
            {"inputs": {"distance": 100, "consumption": 6.5, "price": 1.75},
             "note": "A hundred kilometres: 6.5 litres, 11.38."},
        ],
    },
    faq=[
        ("Does it work in miles per gallon?",
         "Not directly. Convert mpg to L/100 km first, or use the fuel-consumption page, which "
         "returns both."),
        ("Why is the per-kilometre cost so small?",
         "Because it is one kilometre. Multiply by the distance and it matches the trip cost."),
    ],
    related=[("/everyday-life/fuel-consumption", "Fuel consumption"),
             ("/everyday-life/drive-time", "Drive time"),
             ("/everyday-life/cost-per-mile", "Cost per mile")],
    checks=[
        ({"distance": 500, "consumption": 6.5, "price": 1.75},
         {"litres": 32.5, "cost": 56.875, "per_km": 0.11375, "per_100": 11.375}, 0.01),
        ({"distance": 100, "consumption": 6.5, "price": 1.75},
         {"litres": 6.5, "cost": 11.375}, 0.01),
    ],
))

# ------------------------------------------------------------ fuel consumption

SPECS.append(S(
    slug="fuel-consumption",
    name="Fuel Consumption Calculator",
    title="Fuel Consumption Calculator — L/100 km and MPG",
    desc="Turn a distance and the litres it took into litres per hundred kilometres, miles per "
         "gallon and kilometres per litre, so two cars can be compared in one unit.",
    what="Consumption is fuel divided by distance, and the unit you divide into decides the "
         "number. The page returns the three units people actually quote, from the same two "
         "boxes.",
    fields=[
        F("distance", "Distance", "km", 500),
        F("litres", "Fuel used", "L", 32.5),
    ],
    results=[
        R("l100", "Consumption", "L/100 km"),
        R("mpg", "Consumption", "mpg (US)"),
        R("kmpl", "Consumption", "km/L"),
        R("range", "Range on a 50-litre tank", "km"),
    ],
    formula={
        "l100": "litres / distance * 100",
        "mpg": "235.214583 / (litres / distance * 100)",
        "kmpl": "distance / litres",
        "range": "50 / (litres / distance) ",
    },
    prose={
        "why": "<p>Three units describe the same car and none of them agree on which way is "
               "better. Litres per hundred kilometres falls as the car improves; miles per gallon "
               "rises. Converting between them is the only way to read a foreign review without "
               "guessing.</p>"
               "<p>The range line turns the same consumption into a distance, which is what "
               "matters on a long drive with a small tank.</p>",
        "formula_note": "235.214 583 is 100 divided by 0.425 143 848, the number of US gallons in "
                        "a litre times the kilometres in a mile. It is the constant that turns "
                        "L/100 km into US mpg, and it is exact to the definition.",
        "reading": "500 km on 32.5 litres is 6.5 L/100 km, which is 36.2 US mpg, or 15.4 km/L. A "
                   "50-litre tank at that consumption covers 769 km.",
        "example_note": "Imperial gallons are larger than US ones, so a UK mpg figure is about "
                        "twenty per cent higher for the same car. Check which gallon a review "
                        "means.",
        "pitfalls": [
            "<strong>Mixing US and imperial gallons.</strong> The page uses US gallons, the "
            "common figure in reviews.",
            "<strong>Filling once.</strong> One tank is not a measurement; average three fills "
            "for a figure worth quoting.",
        ],
        "limits": [
            "<li><strong>No driving mix.</strong> Town and motorway consumption differ, and this "
            "page reports the average of what you entered.</li>",
            "<li><strong>No trip computer correction.</strong> Most overstate by a few per cent.</li>",
        ],
        "uses": [
            "<li>Checking a car's real consumption against its claim.</li>",
            "<li>Converting a foreign review into units you know.</li>",
        ],
        "scenarios": [
            {"inputs": {"distance": 100, "litres": 6.5},
             "note": "The same car over a hundred kilometres: 6.5 L/100 km, 36.2 mpg."},
        ],
    },
    faq=[
        ("Which unit is best for comparing cars?",
         "One unit at a time. Litres per hundred kilometres is the easiest to reason about "
         "because it is linear in fuel used."),
        ("Why is mpg inverted?",
         "Because it measures distance per fuel rather than fuel per distance. Higher is better, "
         "which is why the two figures move in opposite directions."),
    ],
    related=[("/everyday-life/fuel-cost", "Fuel cost"),
             ("/everyday-life/mpg", "MPG calculator"),
             ("/everyday-life/cost-per-mile", "Cost per mile")],
    checks=[
        ({"distance": 500, "litres": 32.5},
         {"l100": 6.5, "mpg": 36.1869, "kmpl": 15.3846, "range": 769.2308}, 0.01),
        ({"distance": 100, "litres": 6.5},
         {"l100": 6.5, "mpg": 36.1869}, 0.01),
    ],
))

# ----------------------------------------------------------------- drive time

SPECS.append(S(
    slug="drive-time",
    name="Drive Time Calculator",
    title="Drive Time Calculator — Hours from Distance",
    desc="Turn a distance and an average speed into driving time in hours and minutes, with the "
         "time a ten per cent slower average would add.",
    what="Driving time is distance divided by average speed. The page returns hours, minutes and "
         "the extra time a slower average costs, which is the number that decides whether a "
         "detour is worth it.",
    fields=[
        F("distance", "Distance", "km", 250),
        F("speed", "Average speed", "km/h", 90,
          "Motorway average including junctions is usually 80 to 100."),
        F("breaks", "Break time", "min", 30),
    ],
    results=[
        R("hours", "Driving time", "h"),
        R("minutes", "Driving time", "min"),
        R("total", "Total with breaks", "h"),
        R("slower", "Extra time at 10 % slower", "min"),
    ],
    formula={
        "hours": "distance / speed",
        "minutes": "distance / speed * 60",
        "total": "distance / speed + breaks / 60",
        "slower": "distance / (speed * 0.9) * 60 - distance / speed * 60",
    },
    prose={
        "why": "<p>An average speed is not a speed limit. A 250 km motorway trip at a 90 km/h "
               "average takes 2 h 47 min, and the same trip at 100 takes 2 h 30 min: ten "
               "kilometres an hour buys seventeen minutes, not the twenty-five the arithmetic "
               "suggests.</p>"
               "<p>The slower line makes that trade explicit. It is the difference between a "
               "route with roadworks and the same route without.</p>",
        "formula_note": "Distance divided by speed gives hours. Multiplying by sixty gives "
                        "minutes, and the break is added in hours so the total is one number.",
        "reading": "250 km at 90 km/h is 2.78 hours, or 167 minutes, which is 3.28 hours with a "
                   "thirty-minute break. Slowing to 81 km/h adds 19 minutes.",
        "example_note": "The break box is separate because driving time and elapsed time are "
                        "different questions, and a passenger asks the second one.",
        "pitfalls": [
            "<strong>Using the speed limit.</strong> Junctions, traffic and weather pull the "
            "average well below the sign.",
            "<strong>Forgetting the return trip.</strong> The distance box is one way; double it "
            "for a there-and-back journey.",
        ],
        "limits": [
            "<li><strong>No traffic model.</strong> The average is yours, and it is the only thing "
            "the answer depends on.</li>",
            "<li><strong>No rest rules.</strong> Legal driving limits are outside this "
            "arithmetic.</li>",
        ],
        "uses": [
            "<li>Planning a departure time from an arrival time.</li>",
            "<li>Deciding whether a detour is worth twenty minutes.</li>",
        ],
        "scenarios": [
            {"inputs": {"distance": 250, "speed": 100, "breaks": 30},
             "note": "A hundred kilometres an hour: 2.5 hours of driving, 3.0 with the break."},
        ],
    },
    faq=[
        ("What average speed should I use?",
         "For a motorway trip, 80 to 100 km/h including junctions. For mixed roads, 50 to 60. "
         "The page is only as good as that number."),
        ("Does it include the return journey?",
         "No. Put the round-trip distance in if that is what you want."),
    ],
    related=[("/everyday-life/speed", "Speed calculator"),
             ("/everyday-life/fuel-cost", "Fuel cost"),
             ("/everyday-life/commute", "Commute")],
    checks=[
        ({"distance": 250, "speed": 90, "breaks": 30},
         {"hours": 2.7778, "minutes": 166.6667, "total": 3.2778, "slower": 18.5185}, 0.01),
        ({"distance": 250, "speed": 100, "breaks": 30},
         {"hours": 2.5, "minutes": 150, "total": 3}, 0.01),
    ],
))
