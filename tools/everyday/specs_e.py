"""

Everyday-life batch E: the age family.

Every page here starts from a date of birth and a reference date and counts the
same span in a different unit. A date is a day number to the formulas, so the
span is a subtraction and every unit below is that subtraction multiplied out.

The shared decision is the leap day: a 29 February birth is clamped to the last
day of February in a year that has no 29th, which is what every calendar does.

"""

from __future__ import annotations

from lib import D, F, R, RD, S

SPECS: list = []

# Completed years: compare the month first, and the day only when they agree.
AGE = ("getYear(today) - getYear(birth) - "
       "if_else(getMonth(today) < getMonth(birth), 1, "
       "if_else(getMonth(today) == getMonth(birth), "
       "if_else(getDate(today) < getDate(birth), 1, 0), 0))")

# Days lived: birth to the reference date, leap days included.
LIVED = "today - birth"

# The same birthday rule, read on a date the visitor supplies rather than today.
AGE_ON = ("getYear(on) - getYear(birth) - "
          "if_else(getMonth(on) < getMonth(birth), 1, "
          "if_else(getMonth(on) == getMonth(birth), "
          "if_else(getDate(on) < getDate(birth), 1, 0), 0))")

# The date of the last birthday, which is what the months-and-days page needs.
LAST = f"dateAtYearsOld(birth, ({AGE}))"


def age_in_years_months_days() -> dict:
    return S(
        slug="age-in-years-months-and-days",
        name="Age in Years, Months and Days",
        title="Age in Years, Months and Days — The Three-Part Age",
        desc="An age written the way a form asks for it: whole years, then months, then days, "
             "counted on the calendar rather than divided out of a day total. Free, no sign-up.",
        what="The three-part age. Years and months are counted on the calendar, and the days are "
             "what is left, so the answer is the form a passport application wants.",
        fields=[
            D("birth", "Date of birth", "1990-05-17"),
            D("today", "As of", "2026-10-23"),
        ],
        results=[
            R("years", "Years", "years"),
            R("months", "Months", "months"),
            R("days", "Days", "days"),
            R("total_days", "Days in total", "days"),
        ],
        formula={
            "years": AGE,
            "months": 'if_else(daysBetween(dateAtMonthsOld(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875) + 2), today) >= 0, floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875) + 2, if_else(daysBetween(dateAtMonthsOld(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875) + 1), today) >= 0, floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875) + 1, floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875)))',
            "days": 'daysBetween(dateAtMonthsOld(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), if_else(daysBetween(dateAtMonthsOld(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875) + 2), today) >= 0, floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875) + 2, if_else(daysBetween(dateAtMonthsOld(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875) + 1), today) >= 0, floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875) + 1, floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875)))), today)',
            "total_days": LIVED,
        },
        prose={
            "why": "<p>\"Thirty-six years, five months and six days\" is three subtractions and "
                   "two clamps, and doing it in your head is how a form gets filled in wrongly. "
                   "The years come off first, then the months from the last birthday, then "
                   "whatever days are left.</p>"
                   "<p>The page does the three steps in order and shows the total day count "
                   "underneath. If the parts look wrong, the total is the line that proves it: "
                   "the three must add up to a span the day count agrees with.</p>",
            "formula_note": "Completed years by the birthday rule; months since the last "
                            "birthday divided by the average month and floored; days as the "
                            "remainder of that division. The total is the raw subtraction and "
                            "is not derived from the parts.",
            "reading": "Born 17 May 1990 and read on 23 October 2026, the age is 36 years, 5 "
                       "months and 6 days, and the raw span is 13 308 days.",
            "example_note": "A day of zero is a real answer: it means the reference date is the "
                            "monthly anniversary itself.",
            "pitfalls": [
                "<strong>Adding the parts and expecting the day total.</strong> A \"month\" in "
                "the middle line is an average, so the parts and the raw day count differ by a "
                "day or two.",
                "<strong>Borrowing days across a month.</strong> The subtraction borrows from "
                "the actual month, not from thirty.",
            ],
            "limits": [
                "<li><strong>Calendar months.</strong> The month line uses an average month, "
                "which is why the days line can look one off against a hand count.</li>",
            ],
            "uses": [
                "<li>A passport or benefits form that asks for the three parts.</li>",
                "<li>Describing a child's age to a clinic.</li>",
            ],
            "scenarios": [
                {"inputs": {"birth": "2020-02-29", "today": "2026-03-01"},
                 "note": "A leap-day birth read the day after the clamped anniversary gives a "
                         "clean year and one day, which is the case that breaks a lazy count."},
            ],
        },
        faq=[
            ("Why do the parts not add to the day total?",
             "Because the middle line counts average months. The total is the raw subtraction, "
             "and the two are allowed to differ by a day."),
            ("What is the months line for a newborn?",
             "Zero, with the days being the whole age. A child under a month has no months."),
            ("Can the days line be more than thirty-one?",
             "It should not be, and if it is the months line has undercounted by one."),
        ],
        related=[("/everyday-life/age", "Age calculator"),
                 ("/everyday-life/age-in-months", "Age in months"),
                 ("/everyday-life/age-in-days", "Age in days")],
        checks=[
            ({"birth": "1990-05-17", "today": "2026-10-23"},
             {"years": 36, "total_days": 13308}, 0.01),
            ({"birth": "2020-02-29", "today": "2026-03-01"},
             {"years": 6, "months": 0, "days": 1, "total_days": 2192}, 0.01),
        ],
    )


def age_difference() -> dict:
    return S(
        slug="age-difference",
        name="Age Difference Calculator",
        title="Age Difference Between Two People — Years and Days",
        desc="The gap between two dates of birth in years, months and days, for siblings, "
             "couples and anyone who has ever been asked who is older.",
        what="Two birth dates, one gap. The years and days between them, plus the day count, so "
             "an age gap can be stated precisely instead of in round numbers.",
        fields=[
            D("first", "First date of birth", "1990-05-17"),
            D("second", "Second date of birth", "1994-11-02"),
        ],
        results=[
            R("years", "Difference in years", "years"),
            R("days", "Difference in days", "days"),
            R("months", "Difference in months", "months"),
        ],
        formula={
            "years": ("(daysBetween(first, second) / 365.2425)"),
            "months": ("daysBetween(first, second) / 30.436875"),
            "days": "daysBetween(first, second)",
        },
        prose={
            "why": "<p>An age gap written as \"four years\" hides anything up to a year of "
                   "detail. Nobody means four years and six months by \"four years\", but "
                   "nobody writes four and a half either.</p>"
                   "<p>The page gives the gap in days first, because that is the number that "
                   "cannot be argued with, and then divides it into years and months. The sign "
                   "is meaningful: a negative answer means the first date is the later one, "
                   "which is a quick way to check which order the boxes took.</p>",
            "formula_note": "One subtraction of day numbers, then two divisions by the average "
                            "year and the average month. Nothing is floored, so the answer keeps "
                            "the fraction that makes four years and four point six years "
                            "distinguishable.",
            "reading": "17 May 1990 and 2 November 1994 are 1 630 days apart, which is 4.46 "
                       "years or 53.55 months. Both people share no birthday, so the gap drifts "
                       "by a day at every leap year.",
            "example_note": "For siblings the interesting number is usually not the gap in years "
                            "but whether it is under two, which is what makes school years "
                            "overlap.",
            "pitfalls": [
                "<strong>Subtracting the years only.</strong> 1994 minus 1990 is four, but the "
                "gap is four and a half because of the months.",
                "<strong>Ignoring the sign.</strong> A gap runs from the first box to the "
                "second; put the older person first if you want a positive number.",
            ],
            "limits": [
                "<li><strong>Two dates.</strong> A family of four is three pairs, one at a "
                "time.</li>",
            ],
            "uses": [
                "<li>Working out the gap between siblings.</li>",
                "<li>Checking whether two people are in the same school year.</li>",
            ],
            "scenarios": [
                {"inputs": {"first": "2018-03-01", "second": "2020-03-01"},
                 "note": "Exactly two years, 731 days, because a leap day falls between them."},
            ],
        },
        faq=[
            ("Why is two years 731 days?",
             "Because 2020 was a leap year and the span contains 29 February. Four calendar "
             "years is 1 461 days for the same reason."),
            ("Can I use it for a parent and a child?",
             "Yes, the boxes take any two dates. The answer is the gap in the same three units."),
            ("What does a negative answer mean?",
             "That the first date is the later of the two. It is not an error."),
        ],
        related=[("/everyday-life/age", "Age calculator"),
                 ("/everyday-life/years-between-dates", "Years between dates"),
                 ("/everyday-life/days-between-dates", "Days between dates")],
        checks=[
            ({"first": "1990-05-17", "second": "1994-11-02"},
             {"years": 4.4627, "days": 1630, "months": 53.5538}, 0.01),
            ({"first": "2018-03-01", "second": "2020-03-01"},
             {"years": 2.0017, "days": 731, "months": 24.0172}, 0.01),
        ],
    )


def age_to_birthday() -> dict:
    return S(
        slug="age-to-birthday",
        name="Age at a Date Calculator",
        title="How Old Will I Be — Age on Any Date",
        desc="How old you will be on a chosen date, and how old you were on a past one, with the "
             "birthday count and the days to go, worked out on the calendar to the day.",
        what="The age on a date rather than today. A future birthday, a past anniversary, a "
             "form that asks how old someone was at an event.",
        fields=[
            D("birth", "Date of birth", "1990-05-17"),
            D("on", "Age on this date", "2026-12-25"),
        ],
        results=[
            R("age", "Age on that date", "years"),
            R("turning", "Birthday being turned that year", "years"),
            R("days_to_birthday", "Days until the next birthday from that date", "days"),
        ],
        formula={
            "age": ("getYear(on) - getYear(birth) - "
                    "if_else(getMonth(on) < getMonth(birth), 1, "
                    "if_else(getMonth(on) == getMonth(birth), "
                    "if_else(getDate(on) < getDate(birth), 1, 0), 0))"),
            "turning": ("getYear(on) - getYear(birth)"),
            "days_to_birthday": ("dateAtYearsOld(birth, getYear(on) - getYear(birth) + "
                                 "if_else(getMonth(on) > getMonth(birth), 1, "
                                 "if_else(getMonth(on) == getMonth(birth), "
                                 "if_else(getDate(on) >= getDate(birth), 1, 0), 0))) - on"),
        },
        prose={
            "why": "<p>\"How old was I when\" is a question about a date, not about today, and "
                   "the answer differs from the age now by however many birthdays have passed "
                   "since. Doing it from memory works until the date sits near a birthday.</p>"
                   "<p>The page answers for any date, past or future. The three lines separate "
                   "the three things people confuse: the age on that day, the birthday that "
                   "turns that year, and the wait to the next one.</p>",
            "formula_note": "The age compares the month first and the day only when the months "
                            "match, which is the birthday rule. The days-to-the-next line dates "
                            "the next birthday from the reference date and subtracts it.",
            "reading": "Born 17 May 1990, on 25 December 2026 the age is 36, the birthday turned "
                       "in 2026 was the thirty-sixth, and the next one is 143 days away.",
            "example_note": "Put the reference date one day before a birthday: the age drops by "
                            "one and the wait becomes a single day, which is the check that the "
                            "comparison is by day as well as by month.",
            "pitfalls": [
                "<strong>Subtracting the years only.</strong> The age on a date before the "
                "birthday in that year is one less than the difference of the years.",
                "<strong>Reading the turning line as the age.</strong> The birthday being turned "
                "in a year and the age on a date in that year differ by one if the birthday has "
                "not arrived.",
            ],
            "limits": [
                "<li><strong>One date.</strong> A list of event dates is one pass each.</li>",
            ],
            "uses": [
                "<li>Filling in an age at a date on a form.</li>",
                "<li>Checking an age at the time of a photograph or an event.</li>",
            ],
            "scenarios": [
                {"inputs": {"birth": "2000-02-29", "on": "2026-02-27"},
                 "note": "The day before the clamped birthday in a non-leap year: the age is 25 and "
                         "the wait is one day, because the birthday falls on the 28th."},
            ],
        },
        faq=[
            ("What if the date is in the future?",
             "The answer is the age that person will be then, which is a real number and not a "
             "guess."),
            ("Does the day of the birthday count as the older age?",
             "Yes. On the birthday itself the new age applies from midnight."),
            ("Why show the turning line?",
             "Because \"the thirty-sixth birthday was in 2026\" and \"I was 36 on that date\" are "
             "different statements, and forms ask for both."),
        ],
        related=[("/everyday-life/age", "Age calculator"),
                 ("/everyday-life/birthday-countdown", "Birthday countdown"),
                 ("/everyday-life/how-old-was-i", "How old was I")],
        checks=[
            ({"birth": "1990-05-17", "on": "2026-12-25"},
             {"age": 36, "turning": 36, "days_to_birthday": 143}, 0.01),
            ({"birth": "2000-02-29", "on": "2026-02-27"},
             {"age": 25, "turning": 26, "days_to_birthday": 1}, 0.01),
        ],
    )


def how_old_was_i() -> dict:
    return S(
        slug="how-old-was-i",
        name="How Old Was I Calculator",
        title="How Old Was I On a Date — Years, Months and Days",
        desc="How old you were on a given day in years, months and days, for a memory, a photograph, "
             "a school record or any form that wants an age at a particular moment.",
        what="The age on a past date, written in three parts, plus the days elapsed since. The "
         "question behind \"how old was I when that happened\".",
        fields=[
            D("birth", "Date of birth", "1990-05-17"),
            D("on", "On this date", "2010-06-12"),
        ],
        results=[
            R("years", "Years", "years"),
            R("months", "Months", "months"),
            R("days", "Days", "days"),
        ],
        formula={
            "years": AGE_ON,
            "months": 'if_else(daysBetween(dateAtMonthsOld(dateAtYearsOld(birth, (getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))), floor((daysBetween(dateAtYearsOld(birth, (getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))), on)) / 30.436875) + 2), on) >= 0, floor((daysBetween(dateAtYearsOld(birth, (getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))), on)) / 30.436875) + 2, if_else(daysBetween(dateAtMonthsOld(dateAtYearsOld(birth, (getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))), floor((daysBetween(dateAtYearsOld(birth, (getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))), on)) / 30.436875) + 1), on) >= 0, floor((daysBetween(dateAtYearsOld(birth, (getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))), on)) / 30.436875) + 1, floor((daysBetween(dateAtYearsOld(birth, (getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))), on)) / 30.436875)))',
            "days": 'daysBetween(dateAtMonthsOld(dateAtYearsOld(birth, (getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))), if_else(daysBetween(dateAtMonthsOld(dateAtYearsOld(birth, (getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))), floor((daysBetween(dateAtYearsOld(birth, (getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))), on)) / 30.436875) + 2), on) >= 0, floor((daysBetween(dateAtYearsOld(birth, (getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))), on)) / 30.436875) + 2, if_else(daysBetween(dateAtMonthsOld(dateAtYearsOld(birth, (getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))), floor((daysBetween(dateAtYearsOld(birth, (getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))), on)) / 30.436875) + 1), on) >= 0, floor((daysBetween(dateAtYearsOld(birth, (getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))), on)) / 30.436875) + 1, floor((daysBetween(dateAtYearsOld(birth, (getYear(on) - getYear(birth) - if_else(getMonth(on) < getMonth(birth), 1, if_else(getMonth(on) == getMonth(birth), if_else(getDate(on) < getDate(birth), 1, 0), 0)))), on)) / 30.436875)))), on)',
        },
        prose={
            "why": "<p>Memory rounds ages to the year and the year is often the wrong one. "
                   "\"I was eleven when we moved\" is remembered as a school year, and the move "
                   "can be eleven years and nine months or ten and two.</p>"
                   "<p>This page answers for a date rather than for today. The years come off "
                   "first, then the months from the last birthday before that date, then the "
                   "days left over, which is the form a form asks for and the form a memory can "
                   "be checked against.</p>",
            "formula_note": "Completed years on the reference date, then the days since that "
                            "birthday divided by an average month for the months line, with the "
                            "remainder in days. The reference date can be in the past or the "
                            "future.",
            "reading": "Born 17 May 1990, on 12 June 2010 the age was 20 years, 0 months and 26 "
                       "days: the twentieth birthday had passed three and a half weeks earlier.",
            "example_note": "A date before the birthday in its own year gives the lower age, "
                            "which is the case people get wrong by subtracting the years.",
            "pitfalls": [
                "<strong>Subtracting the years.</strong> 2010 minus 1990 is twenty, and the age "
                "was twenty only because the birthday had already passed.",
                "<strong>Treating the month line as calendar months.</strong> It is days since "
                "the last birthday over an average month, which is why the day line can differ "
                "from a hand count by one.",
            ],
            "limits": [
                "<li><strong>One date.</strong> Two events need two passes.</li>",
            ],
            "uses": [
                "<li>Dating a photograph by the age of the person in it.</li>",
                "<li>Checking an age at the time of a school record.</li>",
            ],
            "scenarios": [
                {"inputs": {"birth": "1990-05-17", "on": "1990-05-16"},
                 "note": "The day before the birth is a negative age, which the page reports "
                         "rather than hiding."},
            ],
        },
        faq=[
            ("Can the date be in the future?",
             "Yes, and the answer is the age on that future date, which is a forecast only in "
             "the sense that it depends on a birthday arriving."),
            ("Why is the month count sometimes zero?",
             "Because the reference date is close to a birthday. A fortnight after the birthday "
             "is zero months and fourteen days."),
            ("Does it use the time of day?",
             "No. Ages change at midnight, so a birth time does not move any answer here."),
        ],
        related=[("/everyday-life/age", "Age calculator"),
                 ("/everyday-life/age-to-birthday", "Age at a date"),
                 ("/everyday-life/age-in-years-months-and-days", "Years, months and days")],
        checks=[
            ({"birth": "1990-05-17", "on": "2010-06-12"},
             {"years": 20, "months": 0, "days": 26}, 0.01),
            ({"birth": "1990-05-17", "on": "2010-05-16"},
             {"years": 19, "months": 11, "days": 29}, 0.01),
        ],
    )


def days_alive() -> dict:
    return S(
        slug="how-many-days-have-i-been-alive",
        name="How Many Days Have I Been Alive",
        title="How Many Days Have I Been Alive — Exact Day Count",
        desc="The exact number of days you have been alive, with the hours, the weekends and "
             "the birthdays that fit inside the count.",
        what="A day count from birth to a chosen date, with the weekends inside it and the "
             "birthdays passed. The number people want on a birthday card, and the arithmetic "
             "behind it.",
        fields=[
            D("birth", "Date of birth", "1990-05-17"),
            D("today", "Today", "2026-10-23"),
        ],
        results=[
            R("days", "Days alive", "days"),
            R("weekends", "Weekend days inside", "days"),
            R("birthdays", "Birthdays passed", "years"),
        ],
        formula={
            "days": LIVED,
            # Saturdays and Sundays inside a span that starts on a known weekday:
            # the first of each falls (weekday - start) days in, so each count is a
            # floor of the span minus that offset
            "weekends": (f"floor((({LIVED}) - mod(5 - mod(birth + 3, 7), 7) + 6) / 7)"
                         f" + floor((({LIVED}) - mod(6 - mod(birth + 3, 7), 7) + 6) / 7)"),
            "birthdays": AGE,
        },
        prose={
            "why": "<p>The day count is the honest answer to the question, and the reason it is "
                   "asked is usually that a year is a poor unit for a long life: thirty-six "
                   "birthdays and thirteen thousand days are the same span and feel different.</p>"
                   "<p>The weekends line divides the count by seven with the starting weekday "
                   "taken into account, so it is the number of Saturdays and Sundays inside the "
                   "span rather than an estimate.</p>",
            "formula_note": "One subtraction for the days. The weekends use the weekday of the "
                            "birth date to place the first Saturday and Sunday in the span, "
                            "which is what stops the division by seven from drifting by a day.",
            "reading": "Born 17 May 1990 and read on 23 October 2026: 13 308 days alive, of "
                       "which 3 802 are weekend days, and 36 birthdays have passed.",
            "example_note": "Weekend days come to about two sevenths of the total. If they come "
                            "out far from that, the birth weekday has been used wrongly.",
            "pitfalls": [
                "<strong>Multiplying years by 365.</strong> Nine or ten leap days go missing, "
                "and the count is short by that much.",
                "<strong>Expecting exactly two sevenths of the days to be weekends.</strong> The "
                "span rarely divides by seven, so the fraction is close and never exact.",
            ],
            "limits": [
                "<li><strong>No holiday list.</strong> Public holidays are ordinary days here.</li>",
            ],
            "uses": [
                "<li>A birthday card with a real number in it.</li>",
                "<li>Checking a long service record in days.</li>",
            ],
            "scenarios": [
                {"inputs": {"birth": "2026-10-16", "today": "2026-10-23"},
                 "note": "One week is seven days, and exactly two of them are weekend days, "
                         "which is the smallest case that tests the weekday offset."},
            ],
        },
        faq=[
            ("Do the weekends include holidays?",
             "No. Only Saturday and Sunday are counted, which is the definition of a weekend "
             "before any holiday list is applied."),
            ("Why do the weekends not come to two sevenths exactly?",
             "Because a span of days is not a multiple of seven. The count is exact even when "
             "the fraction is not."),
            ("Does the count include today?",
             "No. It runs from birth to the date you give, so today's own day is not yet "
             "counted."),
        ],
        related=[("/everyday-life/age-in-days", "Age in days"),
                 ("/everyday-life/business-days", "Business days"),
                 ("/everyday-life/day-counter", "Day counter")],
        checks=[
            ({"birth": "1990-05-17", "today": "2026-10-23"},
             {"days": 13308, "weekends": 3802, "birthdays": 36}, 0.01),
            ({"birth": "2026-10-16", "today": "2026-10-23"},
             {"days": 7, "weekends": 2, "birthdays": 0}, 0.01),
        ],
    )


def korean_age() -> dict:
    return S(
        slug="korean-age",
        name="Korean Age Calculator",
        title="Korean Age Calculator — Traditional, Calendar and Legal Age",
        desc="Korean age, the year-based count and the international age side by side, for the "
             "three numbers a Korean form can ask for and the rule that changed in 2023.",
        what="Three ages at once. Korean age counts the year of birth as year one and adds a "
             "year at every new year; the legal age counts birthdays; the year age is the "
             "difference of the years.",
        fields=[
            D("birth", "Date of birth", "1990-05-17"),
            D("today", "Today", "2026-10-23"),
        ],
        results=[
            R("korean_age", "Korean age (traditional)", "years"),
            R("year_age", "Age by year only", "years"),
            R("international_age", "International age", "years"),
        ],
        formula={
            "korean_age": "getYear(today) - getYear(birth) + 1",
            "year_age": "getYear(today) - getYear(birth)",
            "international_age": AGE,
        },
        prose={
            "why": "<p>Korea had three ages in common use at once, and they disagreed by up to "
                   "two years. Korean age gives a newborn one year at birth and adds another "
                   "every first of January, so a baby born on 31 December is two the next "
                   "morning. The year age simply subtracts the birth year. The international "
                   "age counts birthdays.</p>"
               "<p>Since June 2023 the legal age on official documents is the international "
                   "one, but Korean age is still used socially and the year age still appears "
                   "in some rules. The page shows all three so a form can be answered without "
                   "guessing which one it wants.</p>",
            "formula_note": "Korean age is the difference of the calendar years plus one. The "
                            "year age is that difference without the one. The international age "
                            "compares the month and the day, which is the birthday rule.",
            "reading": "Born 17 May 1990 and read on 23 October 2026: Korean age 37, year age "
                       "36, international age 36. Before 17 May 2026 the three would read 37, "
                       "36 and 35.",
            "example_note": "A birth date late in December shows the largest gap: the Korean "
                            "age jumps on 1 January, not on the birthday.",
            "pitfalls": [
                "<strong>Using Korean age on a legal form.</strong> Since 2023 the statutory "
                "age is the international one; the older count has no legal standing.",
                "<strong>Assuming Korean age is always two years more.</strong> It is two "
                "before the birthday and one after it, which is why the difference moves "
                "through the year.",
            ],
            "limits": [
                "<li><strong>The modern rule.</strong> Some traditional contexts still add the "
                "year at the lunar new year rather than 1 January.</li>",
            ],
            "uses": [
                "<li>Answering a Korean acquaintance who asks the age socially.</li>",
                "<li>Checking which of the three an older form is asking for.</li>",
            ],
            "scenarios": [
                {"inputs": {"birth": "2025-12-31", "today": "2026-01-01"},
                 "note": "A baby one day old reads Korean age 2, year age 1 and international "
                         "age 0, which is the whole difference in three numbers."},
            ],
        },
        faq=[
            ("Is Korean age still used?",
             "Socially, yes. On documents and in law Korea moved to the international age in "
             "June 2023."),
            ("Why is a newborn one year old?",
             "Because the year of birth counts as the first year of life in the traditional "
             "count, and everyone gains a year at the new year."),
            ("What is the year age for?",
             "Some administrative rules and school-year questions use the difference of the "
             "calendar years, which ignores the birthday."),
        ],
        related=[("/everyday-life/lunar-age", "Lunar age"),
                 ("/everyday-life/age", "Age calculator"),
                 ("/everyday-life/chronological-age", "Chronological age")],
        checks=[
            ({"birth": "1990-05-17", "today": "2026-10-23"},
             {"korean_age": 37, "year_age": 36, "international_age": 36}, 0.01),
            ({"birth": "2025-12-31", "today": "2026-01-01"},
             {"korean_age": 2, "year_age": 1, "international_age": 0}, 0.01),
        ],
    )


def lunar_age() -> dict:
    return S(
        slug="lunar-age",
        name="Lunar Age Calculator",
        title="Lunar Age — East Asian Count and the Birthday Rule",
        desc="The traditional East Asian age, counted from the lunar year, beside the age by "
             "birthdays, with the difference between the two spelled out.",
        what="The traditional count that starts at one and gains a year at the lunar new year, "
             "shown against the birthday count so the gap is visible rather than assumed.",
        fields=[
            D("birth", "Date of birth", "1990-05-17"),
            D("today", "Today", "2026-10-23"),
        ],
        results=[
            R("lunar_age", "Traditional age", "years"),
            R("international_age", "Age by birthdays", "years"),
            R("difference", "Years between the two", "years"),
        ],
        formula={
            "lunar_age": "getYear(today) - getYear(birth) + 1",
            "international_age": AGE,
            "difference": ("getYear(today) - getYear(birth) + 1 - "
                           "getYear(today) + getYear(birth) + "
                           "if_else(getMonth(today) < getMonth(birth), 1, "
                           "if_else(getMonth(today) == getMonth(birth), "
                           "if_else(getDate(today) < getDate(birth), 1, 0), 0))"),
        },
        prose={
            "why": "<p>The traditional count and the birthday count differ by one or two years, "
                   "and which one it is depends on where the date sits in the year. Before the "
                   "birthday the gap is two; on or after it the gap is one.</p>"
                   "<p>This page shows both and the gap between them, which is the number people "
                   "actually want when they ask why a Korean friend insists on being two years "
                   "older than the passport says.</p>",
            "formula_note": "The traditional count is the difference of the calendar years plus "
                            "one. The difference line is that figure minus the birthday count, "
                            "so it comes out at one or two and never anything else.",
            "reading": "Born 17 May 1990 and read on 23 October 2026: traditional age 37, "
                       "birthday age 36, a gap of one. Read in March 2026 the same person is 37 "
                       "and 35, a gap of two.",
            "example_note": "The gap line is the quickest test of the page: it can only ever be "
                            "one or two.",
            "pitfalls": [
                "<strong>Treating the traditional count as a legal age.</strong> It is not; "
            "documents use the birthday count.",
            "<strong>Assuming the gap is fixed.</strong> It changes on the birthday, not "
            "on the new year, and the two dates are months apart.",
            ],
            "limits": [
                "<li><strong>Gregorian years.</strong> The true lunar count moves at the lunar "
                "new year, which falls between late January and late February.</li>",
            ],
            "uses": [
                "<li>Explaining the two-year gap to somebody meeting it for the first time.</li>",
                "<li>Checking a form that asks for the traditional age.</li>",
            ],
            "scenarios": [
                {"inputs": {"birth": "1990-05-17", "today": "2026-03-01"},
                 "note": "Before the birthday the gap is two, which is the case that makes the "
                         "traditional count look inconsistent."},
            ],
        },
        faq=[
            ("Why is the gap sometimes two?",
             "Because the traditional count gains a year at the new year while the birthday "
             "count waits for the birthday. Between January and the birthday both apply."),
            ("Does this use the real lunar calendar?",
             "No. It uses the Gregorian year, which is what the common version of the rule "
             "does in everyday use."),
            ("Which age do documents use?",
             "The birthday count. The traditional count is social."),
        ],
        related=[("/everyday-life/korean-age", "Korean age"),
                 ("/everyday-life/age", "Age calculator"),
                 ("/everyday-life/chronological-age", "Chronological age")],
        checks=[
            ({"birth": "1990-05-17", "today": "2026-10-23"},
             {"lunar_age": 37, "international_age": 36, "difference": 1}, 0.01),
            ({"birth": "1990-05-17", "today": "2026-03-01"},
             {"lunar_age": 37, "international_age": 35, "difference": 2}, 0.01),
        ],
    )


def chronological_age() -> dict:
    return S(
        slug="chronological-age",
        name="Chronological Age Calculator",
        title="Chronological Age — Years, Months and Days for Forms",
        desc="Chronological age in years, months and days from a date of birth, as developmental and "
             "medical forms ask for it, with the exact day total sitting behind the three parts.",
        what="The age a clinic writes down: exact to the day, in the three-part form, with the "
             "raw day count available to check the parts against.",
        fields=[
            D("birth", "Date of birth", "1990-05-17"),
            D("today", "Date of assessment", "2026-10-23"),
        ],
        results=[
            R("years", "Years", "years"),
            R("months", "Months", "months"),
            R("days", "Days", "days"),
            R("total_days", "Chronological age in days", "days"),
        ],
        formula={
            "years": AGE,
            "months": 'if_else(daysBetween(dateAtMonthsOld(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875) + 2), today) >= 0, floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875) + 2, if_else(daysBetween(dateAtMonthsOld(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875) + 1), today) >= 0, floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875) + 1, floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875)))',
            "days": 'daysBetween(dateAtMonthsOld(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), if_else(daysBetween(dateAtMonthsOld(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875) + 2), today) >= 0, floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875) + 2, if_else(daysBetween(dateAtMonthsOld(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875) + 1), today) >= 0, floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875) + 1, floor((daysBetween(dateAtYearsOld(birth, (getYear(today) - getYear(birth) - if_else(getMonth(today) < getMonth(birth), 1, if_else(getMonth(today) == getMonth(birth), if_else(getDate(today) < getDate(birth), 1, 0), 0)))), today)) / 30.436875)))), today)',
            "total_days": LIVED,
        },
        prose={
            "why": "<p>Chronological age is the age a developmental assessment uses, and it is "
                   "written in years, months and days rather than rounded to the nearest year. A "
                   "test scored against a child of six years and two months means something "
                   "different from one scored against six years exactly.</p>"
                   "<p>The page gives the three-part form and the day total behind it. The day "
                   "total is what the three parts are checked against, and it is also the figure "
                   "a corrected-age calculation starts from for a premature baby.</p>",
            "formula_note": "Years by the birthday rule, months from the last birthday over an "
                            "average month, days as the remainder. The day total is the raw "
                            "subtraction of the two dates and is not derived from the parts.",
            "reading": "Born 17 May 1990 and assessed on 23 October 2026: six days past the "
                       "monthly anniversary of the thirty-sixth year, and 13 308 days in total.",
            "example_note": "For a premature baby the corrected age subtracts the weeks early "
                            "from this figure; the day total is the number to start from.",
            "pitfalls": [
                "<strong>Rounding to whole years.</strong> An assessment is scored against "
                "months for exactly this reason.",
                "<strong>Using the day total as the age in days for a form that wants parts.</strong> "
                "Both are on the page and they answer different questions.",
            ],
            "limits": [
                "<li><strong>Gestational correction is excluded.</strong> The page counts from "
                "the birth date you type, so a corrected age needs the due date instead.</li>",
            ],
            "uses": [
                "<li>Filling in a developmental assessment form.</li>",
                "<li>Recording an age at an examination date.</li>",
            ],
            "scenarios": [
                {"inputs": {"birth": "2024-01-10", "today": "2026-10-23"},
                 "note": "Two years, nine months and thirteen days, which is the form a "
                         "paediatric form wants rather than a rounded three."},
            ],
        },
        faq=[
            ("Why days as well as months?",
             "Because a form written to the day is reproducible and a form written to the month "
             "is not. The day total underneath makes the rounding visible."),
            ("Can I use it for an adult?",
             "Yes. The arithmetic does not care about age; a clinic simply stops asking for "
             "months past a certain point."),
            ("How does corrected age work?",
             "Subtract the weeks a baby was early from the day total. The page gives the total; "
             "the correction is a subtraction you supply."),
        ],
        related=[("/everyday-life/age-in-years-months-and-days", "Years, months and days"),
                 ("/everyday-life/age", "Age calculator"),
                 ("/everyday-life/baby-age", "Baby age")],
        checks=[
            ({"birth": "1990-05-17", "today": "2026-10-23"},
             {"years": 36, "months": 5, "days": 6, "total_days": 13308}, 0.01),
            ({"birth": "2024-01-10", "today": "2026-10-23"},
             {"years": 2, "months": 9, "days": 13, "total_days": 1017}, 0.01),
        ],
    )


def baby_age() -> dict:
    return S(
        slug="baby-age",
        name="Baby Age Calculator",
        title="Baby Age Calculator — Weeks, Months and Days",
        desc="A baby's age in weeks, in months and in days, side by side, with the days since "
             "birth and the date of the next monthly milestone.",
        what="Three readings of one small age. A newborn is counted in days, then weeks, then "
             "months, and each switch happens at a different moment.",
        fields=[
            D("birth", "Date of birth", "2026-06-10"),
            D("today", "Today", "2026-10-23"),
        ],
        results=[
            R("days", "Days old", "days"),
            R("weeks", "Weeks old", "weeks"),
            R("months", "Months old", "months"),
            RD("next_month", "Date of the next monthly milestone"),
        ],
        formula={
            "days": LIVED,
            "weeks": f"floor(({LIVED}) / 7)",
            "months": (f"if_else(daysBetween(dateAtMonthsOld(birth, floor(({LIVED}) / 30.436875) + 1), today) >= 0, "
                       f"floor(({LIVED}) / 30.436875) + 1, floor(({LIVED}) / 30.436875))"),
            "next_month": (f"dateAtMonthsOld(birth, if_else(daysBetween(dateAtMonthsOld(birth, floor(({LIVED}) / 30.436875) + 1), today) >= 0, "
                           f"floor(({LIVED}) / 30.436875) + 1, floor(({LIVED}) / 30.436875)) + 1)"),
        },
        prose={
            "why": "<p>A baby's age is three different numbers and the clinic expects all three. "
                   "Days for the first fortnight, weeks for the first few months, months from "
                   "about eight weeks on.</p>"
                   "<p>The page gives them together with the date of the next monthly "
                   "milestone, which is the date a vaccination or a check-up is booked against. "
                   "Whole weeks are floored, so a baby of eleven weeks and six days is eleven "
                   "weeks old and not twelve.</p>",
            "formula_note": "Days by subtraction, weeks by flooring the days over seven, months "
                            "by testing the next monthly anniversary against the date and "
                            "stepping back if it has not arrived. The milestone line is that "
                            "anniversary plus one.",
            "reading": "A baby born on 10 June 2026 is 135 days old on 23 October, which is 19 "
                       "weeks, or four months by the calendar, with the fifth month on 10 "
                       "November.",
            "example_note": "The month line counts monthly anniversaries, so a baby born on the "
                            "31st is a month old on the last day of a shorter month.",
            "pitfalls": [
                "<strong>Rounding weeks up.</strong> Nineteen weeks and two days is nineteen "
                "weeks; the second number is not a week.",
                "<strong>Reading the months line as days over thirty.</strong> It counts "
                "anniversaries, which is why the milestone date is the useful line.",
            ],
            "limits": [
                "<li><strong>No corrected age.</strong> A premature baby's corrected age needs "
                "the due date, not the birth date.</li>",
            ],
            "uses": [
                "<li>Answering the midwife's question in the unit she expects.</li>",
                "<li>Dating the next monthly check-up.</li>",
            ],
            "scenarios": [
                {"inputs": {"birth": "2026-10-22", "today": "2026-10-23"},
                 "note": "One day old is zero weeks and zero months, which is the case that "
                         "shows the floors doing their job."},
            ],
        },
        faq=[
            ("Why three ages?",
             "Because clinics switch units as a baby grows and each form asks in the unit of "
             "the moment. Having all three avoids a conversion at the desk."),
            ("When do I stop counting in weeks?",
             "Usually around three months, when a form starts asking for months. The weeks line "
             "keeps working after that."),
            ("Does the milestone date account for short months?",
             "Yes. It lands on the same day of the month, clamped at the end of a short one."),
        ],
        related=[("/everyday-life/age-in-weeks", "Age in weeks"),
                 ("/everyday-life/age-in-months", "Age in months"),
                 ("/everyday-life/chronological-age", "Chronological age")],
        checks=[
            ({"birth": "2026-06-10", "today": "2026-10-23"},
             {"days": 135, "weeks": 19, "months": 4, "next_month": 20767}, 0.01),
            ({"birth": "2026-10-22", "today": "2026-10-23"},
             {"days": 1, "weeks": 0, "months": 0, "next_month": 20779}, 0.01),
        ],
    )


SPECS.extend([
    age_in_years_months_days(), age_difference(), age_to_birthday(), how_old_was_i(),
    days_alive(), korean_age(), lunar_age(), chronological_age(), baby_age(),
])
