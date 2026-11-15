"""Everyday-life batch O: countdowns, time budgets and rates.

Calendar countdowns keep exact day differences. The time budgets and rates show
explicit assumptions for workdays, repeat frequency, duration and distance.
"""
from __future__ import annotations

from lib import D, F, R, RD, S, SEL, T

SPECS: list = []


def add(slug, name, title, desc, what, fields, results, formula, checks,
        why, reading, formula_note, extra, faq, related, scenarios=(),
        limits=(), uses=(), pitfalls=()):
    SPECS.append(S(
        slug=slug, name=name, title=title, desc=desc, what=what,
        fields=fields, results=results, formula=formula,
        prose={
            "why": why, "reading": reading, "formula_note": formula_note,
            "extra_title": "The assumptions behind the estimate",
            "extra": extra,
            "example_note": extra.split("</p>")[0].replace("<p>", ""),
            "pitfalls": list(pitfalls) or [
                "<strong>Changing the period without changing its unit.</strong> A weekly figure and a yearly figure are comparable only after the number of weeks in the year is stated.",
                "<strong>Treating an estimate as a live clock.</strong> The page calculates from the dates and rates entered; it does not watch the calendar or update a deadline in real time.",
            ],
            "limits": list(limits) or [
                "<li><strong>Inputs define the result.</strong> The page does not fetch calendars, prices or personal records from another service.</li>",
                "<li><strong>Local rules can differ.</strong> Holidays, leap years, time zones and contract definitions may change how a real deadline is counted.</li>",
            ],
            "uses": list(uses) or [
                "<li>Planning a date or recurring activity with the stated assumptions.</li>",
                "<li>Comparing the result with a calendar or record before relying on it.</li>",
            ],
            "scenarios": list(scenarios),
        },
        faq=list(faq), related=list(related), checks=checks,
    ))

# -------------------------------------------------------------- time until
DELTA = "finish_date - start_date + finish_time - start_time"
add(
    "time-until", "Time Until Calculator", "Time Until — Exact Countdown to Date and Time",
    "Count the exact interval between two calendar dates and clock times in days, weeks, hours and minutes. Set both endpoints to make the countdown reproducible.",
    "A date-only countdown cannot distinguish a morning deadline from one later that evening. Enter both dates and both local clock times for a more specific interval.",
    [D("start_date", "Count from date", "2026-10-23"), T("start_time", "Count from time", "12:00"), D("finish_date", "Target date", "2026-12-25"), T("finish_time", "Target time", "09:30")],
    [R("days", "Elapsed days", "days"), R("weeks", "Weeks", "weeks"), R("hours", "Elapsed hours", "hours"), R("minutes", "Elapsed minutes", "minutes")],
    {"days": DELTA, "weeks": f"({DELTA}) / 7", "hours": f"({DELTA}) * 24", "minutes": f"({DELTA}) * 1440"},
    [({"start_date": "2026-10-23", "start_time": "12:00", "finish_date": "2026-12-25", "finish_time": "09:30"}, {"days": 62.8958333333, "weeks": 8.985119, "hours": 1509.5, "minutes": 90570}, .01),
     ({"start_date": "2026-10-23", "start_time": "09:00", "finish_date": "2026-10-23", "finish_time": "17:30"}, {"days": .354166667, "hours": 8.5, "minutes": 510}, .001)],
    "A due date can be only part of the deadline. A submission closing at 17:00 is not the same as one closing at midnight, and a flight departure needs a clock time as well as a date. Both endpoints appear here, so the interval can be checked without relying on the current moment in the browser.",
    "From noon on 23 October 2026 to 09:30 on 25 December is 62.895833 days: 1,510.5 hours or 90,630 minutes. On the same date, 09:00 to 17:30 is an 8.5-hour interval.",
    "The date difference is combined with the fraction-of-day difference between the two clock fields. Multiplying by 24 or 1,440 converts that same interval to hours or minutes.",
    "This is arithmetic on the entered local date and time; it has no location or timezone field. If an interval crosses a daylight-saving change, an elapsed-clock calculation in a named timezone may differ by an hour. For a travel booking or legal filing, use the authoritative local time and verify whether the endpoint is inclusive. The calculator also does not tick down while the page is open: it gives a snapshot from the four values you entered. To refresh it, change the start point. A negative answer means the target is earlier than the starting point, not that the calculator silently swapped the dates.",
    [("Does it count down live?", "No. It calculates the interval between the values in the four fields."),
     ("Are time zones included?", "No. The inputs are local calendar dates and clock times without a zone."),
     ("Why can another timer differ by an hour?", "A timezone-aware timer may account for daylight-saving changes; this calculation does not."),
     ("Can the target be earlier?", "Yes. The result becomes negative rather than reversing the endpoints.")],
    [("/everyday-life/date-countdown", "Date countdown"), ("/everyday-life/hour-countdown", "Hour countdown"), ("/everyday-life/time-between-dates", "Time between dates")],
)

# ----------------------------------------------------------- hour countdown
HOURS_DELTA = "end_date - start_date + end_time - start_time"
add(
    "hour-countdown", "Hour Countdown Calculator", "Hour Countdown — Hours Between Two Times",
    "Find the total hours between two date-and-time points, including whole days, and see the remaining hours and total minutes. Use the same local clock convention at both ends.",
    "This calculator measures a span in hours rather than just calendar days. Choose a start and finish date and time; the answer includes the remainder after complete days.",
    [D("start_date", "Start date", "2026-10-23"), T("start_time", "Start time", "08:30"), D("end_date", "End date", "2026-10-24"), T("end_time", "End time", "17:15")],
    [R("total_hours", "Total hours", "hours"), R("whole_days", "Complete 24-hour days", "days"), R("remaining_hours", "Hours after complete days", "hours"), R("minutes", "Total minutes", "minutes")],
    {"total_hours": f"({HOURS_DELTA}) * 24", "whole_days": f"floor({HOURS_DELTA})", "remaining_hours": f"(({HOURS_DELTA}) - floor({HOURS_DELTA})) * 24", "minutes": f"({HOURS_DELTA}) * 1440"},
    [({"start_date": "2026-10-23", "start_time": "08:30", "end_date": "2026-10-24", "end_time": "17:15"}, {"total_hours": 32.75, "whole_days": 1, "remaining_hours": 8.75, "minutes": 1965}, .001),
     ({"start_date": "2026-10-23", "start_time": "09:00", "end_date": "2026-10-23", "end_time": "17:30"}, {"total_hours": 8.5, "whole_days": 0, "remaining_hours": 8.5, "minutes": 510}, .001)],
    "A shift, a rental period and a service window are often billed by the hour, even when they cross midnight. The date pair handles that crossing; the clock pair preserves the part of a day that a date-only count would lose.",
    "08:30 on 23 October to 17:15 on 24 October spans 32.75 hours: one complete day plus 8.75 hours, or 1,965 minutes. Same-day 09:00 to 17:30 is 8.5 hours.",
    "The two date numbers and two time fractions form one duration in days. Multiplying by 24 gives total hours; floor separates complete days from the fractional remainder.",
    "The word 'hour' here means a 60-minute unit in the arithmetic. The page does not know which timezone the timestamps belong to, so the result will not account for spring-forward or fall-back clock transitions. For a work shift that crosses midnight, enter the actual later calendar date rather than forcing a finish time that appears earlier on the clock. For a billing dispute, compare the result with the agreement's rounding rule; this page preserves fractions instead of rounding up to a whole billable hour.",
    [("Can it handle an overnight interval?", "Yes. Enter the next calendar date in the End date field."),
     ("Does it round billable time up?", "No. It returns the computed duration; apply a contract's rounding rule separately."),
     ("Does daylight saving affect it?", "Timezone transitions are not modelled because no timezone is entered."),
     ("Why show complete days too?", "It separates long intervals into 24-hour blocks and leftover hours.")],
    [("/everyday-life/time-until", "Time until"), ("/everyday-life/time-between-dates", "Time between dates"), ("/everyday-life/time-card", "Time card")],
)

# ----------------------------------------------------------- countdown pages
COUNTDOWN_CONTENT = {
    "pregnancy-countdown": (
        "Pregnancy Countdown Calculator", "Pregnancy Countdown — Days Until Due Date",
        "Estimate the calendar days and weeks from a chosen date to an entered due date, with equivalent hours for planning. The date is user-supplied; no clinical due date is inferred.",
        "A due date is an estimate, not a promise. Enter the date supplied by a clinician and a reference day to count the calendar interval.",
        "From 23 October 2026 to 10 March 2027 is 138 days: 19 complete weeks and five days, or 3,312 equivalent hours.",
        "Subtract the reference date from the due date. Complete weeks use floor division by seven, and the remainder is the days not contained in those full weeks.",
        "A countdown cannot estimate fetal development or predict when birth will occur. Due dates are approximate and may be revised by a clinician. The calculator only displays the distance between the two dates entered. Its hours line treats every calendar day as 24 hours and is not a medical measurement. Use the date in your care plan, and contact a qualified clinician for questions about symptoms, timing or changes to the due date. If the chosen reference date is later than the due date, the signed day count becomes negative; that does not mean anything about the pregnancy itself.",
        [("Does this calculate a due date?", "No. Enter the due date you were given; the page only counts to it."),
         ("Is the due date exact?", "No. A due date is an estimate and can change."),
         ("Does the week result show gestational age?", "No. It is only the weeks remaining between the two entered dates."),
         ("Can I use it for medical advice?", "No. Ask your clinician about care or symptoms.")],
        [("/everyday-life/date-countdown", "Date countdown"), ("/everyday-life/days-between-dates", "Days between dates"), ("/everyday-life/birthday-countdown", "Birthday countdown")]),
    "retirement-countdown": (
        "Retirement Countdown Calculator", "Retirement Countdown — Days to a Planned Date",
        "Count calendar days and weeks to a planned retirement date, with an approximate year scale and equivalent hours. Enter a reference date to keep the result repeatable.",
        "A retirement date may be a personal goal, an eligibility date or a plan still subject to change. This page measures the calendar distance to the date you enter.",
        "From 23 October 2026 to 23 October 2035 is 3,287 days, or 469 complete weeks plus no remainder, and about nine average years.",
        "Subtract the reference date from the planned date. Divide days by seven for weeks and by 365.2425 for an approximate Gregorian year count.",
        "The date in a financial plan can move. This calculator does not read pension rules, birth records, benefit thresholds or account balances, and it cannot say whether retirement is affordable. The years value is an average conversion; the day count is exact for the two date fields. A real retirement decision may depend on a jurisdiction's eligibility age, vesting, taxes and employer terms. Verify those separately. Change the reference date when you revisit the plan so that comparisons over time use a clear baseline rather than a hidden notion of 'today'.",
        [("Does this tell me when I qualify?", "No. It counts to the planned date you enter; eligibility rules must be checked separately."),
         ("Are the day counts exact?", "Yes, for the Gregorian dates entered."),
         ("Why is the year result approximate?", "It converts days using 365.2425 days per average year."),
         ("Does it use my birth date?", "No. There is no personal record lookup.")],
        [("/everyday-life/date-countdown", "Date countdown"), ("/everyday-life/date-of-birth", "Date of birth from age"), ("/everyday-life/days-old", "Days old")]),
    "vacation-countdown": (
        "Vacation Countdown Calculator", "Vacation Countdown — Days Until Your Trip",
        "Count the days and weeks from a reference date to the first day of a vacation, then see equivalent hours. Set both dates explicitly for a countdown you can check later.",
        "A trip countdown is easier to trust when it says which day it starts from. Enter the date you are counting from and the first day of the vacation.",
        "A vacation beginning on 25 December 2026 is 63 days after 23 October: exactly nine weeks and 1,512 equivalent hours.",
        "Subtract the count-from date from the vacation date. Convert the same difference into weeks and 24-hour day equivalents.",
        "This page counts calendar dates only. It does not include flight departure times, hotel check-in, travel across time zones, or the day you return unless you enter that as the target. A holiday from 25 December through 2 January can be described as eight nights or nine named dates; choose the endpoint that answers your question. The calculator does not check tickets, weather or travel advisories. Its job is the date difference, not the trip itself. Once plans change, update the target date and keep the reference date visible when sharing the number.",
        [("Is the return date included?", "Only if you set the target to the return date; the page compares the two dates entered."),
         ("Does it count nights?", "No. It reports elapsed calendar days, which often corresponds to nights for a stay."),
         ("Does it update by itself?", "No. Set a new reference date to refresh a saved calculation."),
         ("Does it include travel time zones?", "No. It is date-only arithmetic.")],
        [("/everyday-life/date-countdown", "Date countdown"), ("/everyday-life/time-until", "Time until"), ("/everyday-life/calendar-countdown", "Calendar countdown")]),
    "wedding-countdown": (
        "Wedding Countdown Calculator", "Wedding Countdown — Days Until the Wedding Date",
        "Find the days and weeks to a wedding date, plus equivalent hours and minutes. Enter a reference date so the countdown can be repeated without relying on a changing default.",
        "The date on an invitation is the anchor. This calculator counts from a chosen day to that date and gives the interval in several readable units.",
        "A wedding on 12 June 2027 is 232 days after 23 October 2026: 33.1429 weeks, or 5,568 equivalent hours.",
        "Subtract the reference date from the wedding date. Weeks, hours and minutes are conversions of that same elapsed-day difference.",
        "The countdown will not plan a venue, confirm a booking or resolve different local ceremony times. It reports a simple interval between calendar dates. If the ceremony begins at a particular hour, use a date-and-time countdown. For a destination wedding, consider the time zone where the event takes place and the local date shown on the invitation. The calculator deliberately keeps that information out of its result, so the date entered remains the source of truth. A past date yields a negative interval, which can help compare what was planned with when the event occurred.",
        [("Can I count to a ceremony time?", "Use a date-and-time calculator when the event's local clock time matters."),
         ("Does it include the wedding day?", "It reports elapsed days to the date; it does not add an inclusive day."),
         ("Can the date be in the past?", "Yes. The signed difference becomes negative."),
         ("Does it know the venue timezone?", "No. Enter the event's calendar date yourself.")],
        [("/everyday-life/date-countdown", "Date countdown"), ("/everyday-life/calendar-countdown", "Calendar countdown"), ("/everyday-life/time-until", "Time until")]),
}
for slug, c in COUNTDOWN_CONTENT.items():
    date_key = "due_date" if slug == "pregnancy-countdown" else "event_date"
    event_default = {"pregnancy-countdown": "2027-03-10", "retirement-countdown": "2035-10-23", "vacation-countdown": "2026-12-25", "wedding-countdown": "2027-06-12"}[slug]
    delta = f"{date_key} - today"
    add(slug, c[0], c[1], c[2], c[3],
        [D("today", "Count from", "2026-10-23"), D(date_key, "Due date" if slug == "pregnancy-countdown" else "Target date", event_default)],
        [R("days", "Days remaining", "days"), R("weeks", "Complete weeks", "weeks"), R("extra_days", "Days after full weeks", "days"), R("hours", "Equivalent hours", "hours")],
        {"days": delta, "weeks": f"floor(({delta}) / 7)", "extra_days": f"({delta}) - 7 * floor(({delta}) / 7)", "hours": f"({delta}) * 24"},
        [({"today": "2026-10-23", date_key: event_default}, {"days": {"pregnancy-countdown": 138, "retirement-countdown": 3287, "vacation-countdown": 63, "wedding-countdown": 232}[slug], "weeks": {"pregnancy-countdown": 19, "retirement-countdown": 469, "vacation-countdown": 9, "wedding-countdown": 33}[slug], "extra_days": {"pregnancy-countdown": 5, "retirement-countdown": 4, "vacation-countdown": 0, "wedding-countdown": 1}[slug]}, .001),
         ({"today": "2026-10-23", date_key: "2026-10-23"}, {"days": 0, "weeks": 0, "extra_days": 0, "hours": 0}, .001)],
        c[3], c[4], c[5], c[6], c[7], c[8])

# ------------------------------------------------------------- reverse time
add(
    "reverse-time", "Reverse Time Calculator", "Reverse Time — Convert an Interval to a Rate",
    "Turn a repeat interval into a frequency per second, hour, day, week, month and year. Choose the interval unit; month and year outputs use stated average lengths.",
    "If something happens once every few days or weeks, its rate per day or year is the reciprocal interval. Enter the interval and its unit to compare scales.",
    [F("interval", "One event every", "", 2), SEL("unit_days", "Interval unit", [("Seconds", 1/86400), ("Minutes", 1/1440), ("Hours", 1/24), ("Days", 1), ("Weeks", 7), ("Months (average)", 30.436875), ("Years (average)", 365.2425)], 1)],
    [R("per_second", "Events per second", "events/s"), R("per_hour", "Events per hour", "events/h"), R("per_day", "Events per day", "events/day"), R("per_week", "Events per week", "events/week"), R("per_month", "Events per average month", "events/month"), R("per_year", "Events per average year", "events/year"), R("seconds_between", "Seconds between events", "s")],
    {"per_second": "1 / (interval * unit_days * 86400)", "per_hour": "3600 / (interval * unit_days * 86400)", "per_day": "1 / (interval * unit_days)", "per_week": "7 / (interval * unit_days)", "per_month": "30.436875 / (interval * unit_days)", "per_year": "365.2425 / (interval * unit_days)", "seconds_between": "interval * unit_days * 86400"},
    [({"interval": 2, "unit_days": 1}, {"per_second": 1/172800, "per_hour": 1/48, "per_day": .5, "per_week": 3.5, "per_month": 15.2184375, "per_year": 182.62125, "seconds_between": 172800}, .001),
     ({"interval": 30, "unit_days": 1/1440}, {"per_hour": 2, "per_day": 48, "seconds_between": 1800}, .001)],
    "A rate can be phrased either as events per unit of time or as a time gap between events. The reciprocal connects those readings. This page accepts the gap and changes it into rates at several scales, useful when a small interval is hard to picture over a week or year.",
    "One event every two days is 0.5 per day, 3.5 per week and about 182.621 events per average year. The same interval is 172,800 seconds. A 30-minute interval is two events an hour and 48 a day.",
    "Convert the selected interval to days, then divide the chosen period length by that interval. Seconds between events is the interval in days times 86,400.",
    "Rates per month and year are averages, not calendar schedules. The month uses 30.436875 days and the year 365.2425 days. If events occur on particular calendar dates, actual counts depend on the months and leap years crossed. The interval field must be positive; zero has no reciprocal. Repeating events can also be irregular in real life, and the page assumes the gap stays constant. The output is a mathematical rate, not a forecast of when a sporadic event will occur.",
    [("Why does it say 0.5 events per day?", "An event every two days averages half an event per day."),
     ("Are months exact?", "No. The monthly result uses a 30.436875-day average month."),
     ("What happens for a zero interval?", "A zero gap has no defined reciprocal; enter a positive interval."),
     ("Does it predict an event date?", "No. It converts a repeated interval to rates.")],
    [("/everyday-life/time-between-dates", "Time between dates"), ("/everyday-life/days-between-dates", "Days between dates"), ("/everyday-life/hour-countdown", "Hour countdown")],
)

# --------------------------------------------------------------- slack time
add(
    "slack-time", "Slack Time Calculator", "Slack Time — Date Window Between Two Starts",
    "Measure the calendar slack between an earliest possible start and a latest acceptable start. Read the same window in days, weeks and equivalent hours for project planning.",
    "Project slack is the room between two dates: the earliest a task can start and the latest it can start without moving a later milestone.",
    [D("earliest", "Earliest possible start", "2026-10-23"), D("latest", "Latest acceptable start", "2026-10-30")],
    [R("days", "Slack window", "days"), R("weeks", "Weeks", "weeks"), R("hours", "Equivalent hours", "hours")],
    {"days": "latest - earliest", "weeks": "(latest - earliest) / 7", "hours": "(latest - earliest) * 24"},
    [({"earliest": "2026-10-23", "latest": "2026-10-30"}, {"days": 7, "weeks": 1, "hours": 168}, .001),
     ({"earliest": "2026-10-23", "latest": "2026-11-01"}, {"days": 9, "weeks": 9/7, "hours": 216}, .001)],
    "Slack is not spare time in every sense. In a schedule, it is the delay available before a downstream date is affected. The useful quantity is the gap between the earliest workable start and the latest start that still protects the milestone.",
    "An earliest start of 23 October and latest acceptable start of 30 October leave seven calendar days, exactly one week or 168 equivalent hours. Moving the latest date to 1 November gives nine days.",
    "Subtract the earliest start from the latest acceptable start. Weeks and hours are conversions of that date difference; no holidays or work calendars are removed.",
    "This simple slack value is a calendar-day window, not a critical-path network analysis. Dependencies, task durations, resource availability and working-day calendars can all change project float. If a project counts only business days, use those dates with a working-day calculation instead. The result can be negative when the latest date is earlier than the earliest; that signals the window has already been exceeded under the two dates entered. Keep the milestone assumption beside the number when reporting it, because a gap alone does not state what work it protects.",
    [("Is slack the same as task duration?", "No. It is the gap between two possible start dates."),
     ("Are weekends counted?", "Yes. These are calendar days, not business days."),
     ("Can slack be negative?", "Yes. A negative result means the latest date precedes the earliest date."),
     ("Does this calculate a critical path?", "No. It compares only the two dates supplied.")],
    [("/everyday-life/working-days", "Working days"), ("/everyday-life/deadline", "Deadline calculator"), ("/everyday-life/calendar", "Calendar calculator")],
)

# ------------------------------------------------------------ miles per year
add(
    "miles-per-year", "Miles per Year Calculator", "Miles per Year — Annual Driving Distance",
    "Estimate annual driving distance from miles per driving day, days driven each week and driving weeks per year. Weekly, monthly and five-year totals use those same inputs.",
    "A daily commute or regular trip can be expanded into a year once the number of driving days and active weeks is stated.",
    [F("miles_day", "Miles per driving day", "mi", 32), F("days_week", "Driving days per week", "days", 5), F("weeks_year", "Driving weeks per year", "weeks", 50)],
    [R("weekly", "Miles per week", "mi"), R("annual", "Miles per year", "mi"), R("monthly", "Average miles per month", "mi"), R("five_year", "Miles over five years", "mi")],
    {"weekly": "miles_day * days_week", "annual": "miles_day * days_week * weeks_year", "monthly": "miles_day * days_week * weeks_year / 12", "five_year": "miles_day * days_week * weeks_year * 5"},
    [({"miles_day": 32, "days_week": 5, "weeks_year": 50}, {"weekly": 160, "annual": 8000, "monthly": 8000/12, "five_year": 40000}, .01),
     ({"miles_day": 20, "days_week": 5, "weeks_year": 48}, {"weekly": 100, "annual": 4800, "monthly": 400, "five_year": 24000}, .001)],
    "Annual mileage is a habit multiplied by a calendar. A number per day is not a year until the days driven and the weeks off are accounted for. This page keeps both inputs visible instead of assuming the car moves every day of all 52 weeks.",
    "Thirty-two miles on five driving days for 50 weeks gives 160 miles a week and 8,000 a year. Spread evenly across 12 months, that is 666.667 miles per month; five years at the same pace is 40,000 miles.",
    "Multiply miles per driving day by driving days per week for the weekly distance. Multiply again by driving weeks per year for the annual total; monthly is that total divided by twelve.",
    "The result is a planning estimate. Holidays, vacations, remote-work days, extra trips and changes in route all move actual mileage. The monthly result is an even average, not a prediction for each month. Use the number from an odometer log or insurer statement when an official estimate is required. The five-year total assumes the pattern stays unchanged throughout the period; it does not account for a vehicle replacement or a change of job. The miles-per-driving-day field should already include the distance driven on that day, including return trips if relevant.",
    [("Does it assume 52 driving weeks?", "No. Enter the weeks you expect to drive; the default leaves two weeks out."),
     ("Is monthly mileage exact?", "No. It is the annual estimate divided evenly across 12 months."),
     ("Should daily miles include the return trip?", "Yes, use the total distance driven on each driving day."),
     ("Does this read an odometer?", "No. It only uses the values entered.")],
    [("/everyday-life/fuel-mileage", "Fuel mileage"), ("/everyday-life/fuel-distance", "Fuel distance"), ("/everyday-life/commute", "Commute calculator")],
)

# ---------------------------------------------------------------- commute
add(
    "commute", "Commute Calculator", "Commute Calculator — Annual Miles, Hours and Fuel",
    "Estimate yearly commute distance, time and fuel cost from one-way distance, average speed, workdays, weeks, fuel economy and price. The trip is counted as a round trip.",
    "A commute's yearly cost depends on more than distance. Enter the one-way route, average speed and work schedule to estimate miles, hours and fuel.",
    [F("one_way", "One-way distance", "mi", 18), F("speed", "Average driving speed", "mph", 36), F("days_week", "Commute days per week", "days", 5), F("weeks_year", "Working weeks per year", "weeks", 48), F("mpg", "Fuel economy", "mpg", 30), F("fuel_price", "Fuel price", "$/gal", 3.5)],
    [R("daily", "Round-trip miles per day", "mi"), R("annual_miles", "Annual commute miles", "mi"), R("annual_hours", "Hours driving per year", "h"), R("fuel_gallons", "Fuel per year", "gal"), R("annual_cost", "Fuel cost per year", "$"), R("weekly_cost", "Fuel cost per working week", "$" )],
    {"daily": "2 * one_way", "annual_miles": "2 * one_way * days_week * weeks_year", "annual_hours": "2 * one_way * days_week * weeks_year / speed", "fuel_gallons": "2 * one_way * days_week * weeks_year / mpg", "annual_cost": "2 * one_way * days_week * weeks_year / mpg * fuel_price", "weekly_cost": "2 * one_way * days_week / mpg * fuel_price"},
    [({"one_way": 18, "speed": 36, "days_week": 5, "weeks_year": 48, "mpg": 30, "fuel_price": 3.5}, {"daily": 36, "annual_miles": 8640, "annual_hours": 240, "fuel_gallons": 288, "annual_cost": 1008, "weekly_cost": 21}, .001),
     ({"one_way": 10, "speed": 40, "days_week": 4, "weeks_year": 50, "mpg": 25, "fuel_price": 4}, {"daily": 20, "annual_miles": 4000, "annual_hours": 100, "annual_cost": 640, "weekly_cost": 12.8}, .001)],
    "A route that looks short each morning accumulates across a working year. The estimate needs a round trip, the days actually driven and a realistic number of working weeks. Fuel economy and price turn that distance into a cost, while average speed gives a simple driving-time estimate.",
    "An 18-mile one-way commute, five days a week for 48 weeks, is 8,640 miles a year. At 36 mph average speed that is 240 hours; at 30 mpg and 3.50 per gallon, estimated fuel costs 1,008 for the year.",
    "The one-way distance is doubled for a return journey. Annual distance multiplies that daily total by workdays and weeks; time divides by speed, and fuel cost divides miles by mpg then multiplies by price.",
    "Traffic rarely holds one average speed all year. The time figure is an estimate from a single speed value and excludes parking, walking, tolls and delays. Fuel cost assumes one fuel price and one fuel-economy figure; cold starts, congestion, terrain and vehicle load can change consumption. The weeks field is how many weeks you commute, not necessarily 52. For a hybrid schedule, choose the average number of commute days per week. The answer is a budgeting aid, not a reimbursement or tax calculation; verify any official mileage rate separately.",
    [("Is the route round trip?", "Yes. The one-way distance is doubled in daily and annual totals."),
     ("Does it include traffic delays?", "Only through the average speed you enter; it has no live traffic data."),
     ("How many work weeks should I use?", "Enter the weeks you actually expect to commute, accounting for leave or remote work."),
     ("Does it calculate wear and tear?", "No. Only fuel is priced.")],
    [("/everyday-life/miles-per-year", "Miles per year"), ("/everyday-life/fuel-cost", "Fuel cost"), ("/everyday-life/drive-time", "Drive time")],
)

# --------------------------------------------------------- keystrokes/hour
add(
    "keystrokes-per-hour", "Keystrokes per Hour Calculator", "Keystrokes per Hour — Gross and Net Rate",
    "Calculate gross keystrokes per hour, net rate after errors, per-minute speed and accuracy from a timed sample. Use the same counting method for each test.",
    "A timed typing sample can be expressed as a gross rate or adjusted for mistakes. Enter the count, errors and time to compare both readings.",
    [F("keystrokes", "Keystrokes entered", "keys", 18000), F("errors", "Incorrect keystrokes", "keys", 180), F("hours", "Time spent", "hours", 3)],
    [R("gross", "Gross keystrokes per hour", "keys/h"), R("net", "Net keystrokes per hour", "keys/h"), R("per_minute", "Gross keystrokes per minute", "keys/min"), R("accuracy", "Keystroke accuracy", "%")],
    {"gross": "keystrokes / hours", "net": "(keystrokes - errors) / hours", "per_minute": "keystrokes / hours / 60", "accuracy": "(keystrokes - errors) / keystrokes * 100"},
    [({"keystrokes": 18000, "errors": 180, "hours": 3}, {"gross": 6000, "net": 5940, "per_minute": 100, "accuracy": 99}, .001),
     ({"keystrokes": 12000, "errors": 600, "hours": 2}, {"gross": 6000, "net": 5700, "per_minute": 100, "accuracy": 95}, .001)],
    "A single speed number hides whether mistakes were counted. Gross rate divides every entered keystroke by time; net rate removes the errors first. Showing both makes two timed tests easier to compare, provided they count keys the same way.",
    "18,000 keystrokes in three hours is 6,000 per hour, or 100 per minute. With 180 incorrect keys, the net rate is 5,940 per hour and accuracy is 99 percent.",
    "Gross speed is total keystrokes divided by hours. Net speed subtracts errors before dividing; accuracy is correct keystrokes as a share of all keystrokes.",
    "Keystroke counting is not standardized across software. Some tests count backspaces and corrections, while others score only the final text. Use the same test and error rule if you are comparing practice sessions. A high rate with many errors may not mean useful output, and this calculator does not assess ergonomics, fatigue or accessibility. The time field must be greater than zero. If the session lasted minutes, convert that duration to a decimal hour before entering it: 30 minutes is 0.5 hour.",
    [("How do I enter 30 minutes?", "Enter 0.5 in the hours field."),
     ("What is net keystrokes per hour?", "It subtracts the incorrect keystrokes before dividing by time."),
     ("Are corrections counted as errors?", "That depends on the typing test; use its stated scoring rule."),
     ("Does this measure words per minute?", "No. Keystrokes and words are different measures.")],
    [("/everyday-life/gwam", "Gross words per minute"), ("/everyday-life/words-per-minute", "Words per minute"), ("/everyday-life/reading-time", "Reading time")],
)

# ----------------------------------------------------------- time in email
add(
    "email-alternatives", "Email Time Calculator", "Email Time — Work Hours and Other Uses",
    "Turn daily minutes spent on email into annual and multi-year hours, days and reading-book equivalents. Enter workdays and working weeks rather than assuming every day is alike.",
    "A few minutes in an inbox can add up across a work year. This page converts daily email time into longer totals and a couple of concrete comparisons.",
    [F("minutes_day", "Minutes on email per workday", "min", 120), F("days_week", "Workdays per week", "days", 5), F("weeks_year", "Working weeks per year", "weeks", 48), F("years", "Years measured", "years", 10), F("book_hours", "Hours to read one book", "h/book", 6)],
    [R("annual_hours", "Email hours per year", "h"), R("total_hours", "Email hours over period", "h"), R("total_days", "Equivalent full days", "days"), R("books", "Six-hour book equivalents", "books")],
    {"annual_hours": "minutes_day / 60 * days_week * weeks_year", "total_hours": "minutes_day / 60 * days_week * weeks_year * years", "total_days": "minutes_day / 60 * days_week * weeks_year * years / 24", "books": "minutes_day / 60 * days_week * weeks_year * years / book_hours"},
    [({"minutes_day": 120, "days_week": 5, "weeks_year": 48, "years": 10, "book_hours": 6}, {"annual_hours": 480, "total_hours": 4800, "total_days": 200, "books": 800}, .001),
     ({"minutes_day": 60, "days_week": 5, "weeks_year": 50, "years": 1, "book_hours": 5}, {"annual_hours": 250, "total_hours": 250, "total_days": 250/24, "books": 50}, .001)],
    "An inbox is usually measured in interruptions, not hours. Multiplying minutes by working days makes the time visible across a year, then across a longer horizon. The book comparison is only a unit conversion, but it gives the total a scale most people recognize.",
    "Two hours of email on each of five workdays for 48 weeks is 480 hours a year. Over ten years that is 4,800 hours, or 200 full days; at six hours per book, the same time is 800 reading sessions of that size.",
    "Convert daily minutes to hours, multiply by workdays and working weeks, then extend across years. Divide the result by 24 for days or by the entered reading time for book equivalents.",
    "The model assumes the same email time on each workday and no email on non-workdays. Real schedules include busy periods, leave, weekends and meetings that shift the average. The book comparison is illustrative; books vary widely in length and reading speed. This page does not claim that all inbox time could be removed or converted into leisure. If a time audit gives a different average, use that measured value. Changing workdays or weeks can move the total more than changing the comparison unit, so state those assumptions when sharing the result.",
    [("Does this count weekend email?", "Only if you include weekend days in the workdays field."),
     ("Why ask how long a book takes?", "It converts the total hours into an optional comparison, not a promise of books finished."),
     ("Does it assume the same routine for ten years?", "Yes. The horizon multiplies the entered weekly pattern unchanged."),
     ("Can it tell me how much time I can recover?", "No. It measures the time entered; it does not judge which messages are necessary.")],
    [("/everyday-life/reading-time", "Reading time"), ("/everyday-life/meeting-cost", "Meeting cost"), ("/everyday-life/social-media-time-alternatives", "Social media time alternatives")],
)

# ------------------------------------------------------ social media time
add(
    "social-media-time-alternatives", "Social Media Time Calculator", "Social Media Time — Hours Across the Years Estimated",
    "Translate daily social-media minutes into multi-year hours and equivalent full days, then compare the total with reading time. Set the years and daily average yourself.",
    "Daily screen time is easier to interpret over a longer span. Enter a daily average and a number of years to see the total hours and an optional reading comparison.",
    [F("minutes_day", "Minutes per day", "min", 150), F("years", "Years at this average", "years", 5), F("book_hours", "Hours per book", "h/book", 6)],
    [R("hours", "Hours over period", "h"), R("days", "Equivalent full days", "days"), R("books", "Book-time equivalents", "books"), R("minutes", "Total minutes", "min")],
    {"hours": "minutes_day * 365 * years / 60", "days": "minutes_day * 365 * years / 1440", "books": "minutes_day * 365 * years / 60 / book_hours", "minutes": "minutes_day * 365 * years"},
    [({"minutes_day": 150, "years": 5, "book_hours": 6}, {"hours": 4562.5, "days": 190.1041667, "books": 760.4167, "minutes": 273750}, .01),
     ({"minutes_day": 60, "years": 1, "book_hours": 5}, {"hours": 365, "days": 15.2083333, "books": 73, "minutes": 21900}, .01)],
    "A daily average looks small because it resets every morning. Multiplying it by 365 and then by years reveals the cumulative hours. The comparison is a prompt for reflection, not a claim that every minute would otherwise become reading or work.",
    "Two and a half hours per day for five years is 4,562.5 hours, or about 190 full days. If a book takes six hours, that is roughly 760 book-length blocks of time.",
    "Daily minutes times 365 times years gives total minutes. Divide by 60 for hours, by 1,440 for full days, or by the entered book duration for equivalent reading blocks.",
    "This estimate holds the daily average constant and uses 365 days in every year. A leap day, changing habits, holidays and time spent on multiple devices are not modelled. The book comparison is a time equivalence only; reading speed and book length vary. If you want a more representative figure, use a screen-time report averaged across several ordinary weeks rather than a single unusual day. The calculator does not store or inspect device activity.",
    [("Does it use actual phone data?", "No. Enter an average from your own tracking if you want a measured estimate."),
     ("Are leap days included?", "The estimate uses 365 days per year, so a leap day is not added."),
     ("Are book equivalents literal?", "No. They are total hours divided by the comparison hours per book."),
     ("Does it make a recommendation?", "No. It converts the time value you enter.")],
    [("/everyday-life/tiktok-time-alternatives", "TikTok time alternatives"), ("/everyday-life/email-alternatives", "Email time"), ("/everyday-life/reading-time", "Reading time")],
)

# ------------------------------------------------------------- TikTok time
add(
    "tiktok-time-alternatives", "TikTok Time Alternatives Calculator", "TikTok Time — Hours Reclaimed by Cutting Back",
    "Estimate hours spent at a daily TikTok average over several years and how many could be reclaimed by reducing that time. The alternative is a time conversion, not a prediction.",
    "A daily minutes estimate can be translated into total hours across years. A reduction field then shows the time difference if the daily average changes.",
    [F("minutes_day", "Minutes per day now", "min", 90), F("cut_percent", "Daily time reduction", "%", 50), F("years", "Years measured", "years", 5), F("book_hours", "Hours per book", "h/book", 6)],
    [R("current_hours", "Hours at current average", "h"), R("reclaimed_hours", "Hours freed by reduction", "h"), R("reclaimed_days", "Equivalent full days freed", "days"), R("books", "Book-time equivalents", "books")],
    {"current_hours": "minutes_day * 365 * years / 60", "reclaimed_hours": "minutes_day * cut_percent / 100 * 365 * years / 60", "reclaimed_days": "minutes_day * cut_percent / 100 * 365 * years / 1440", "books": "minutes_day * cut_percent / 100 * 365 * years / 60 / book_hours"},
    [({"minutes_day": 90, "cut_percent": 50, "years": 5, "book_hours": 6}, {"current_hours": 2737.5, "reclaimed_hours": 1368.75, "reclaimed_days": 57.03125, "books": 228.125}, .01),
     ({"minutes_day": 60, "cut_percent": 25, "years": 1, "book_hours": 5}, {"current_hours": 365, "reclaimed_hours": 91.25, "reclaimed_days": 3.8020833, "books": 18.25}, .01)],
    "The alternative to a screen-time estimate is not automatically productive work. Still, a percentage reduction gives a concrete comparison: it shows how many hours would be freed if a daily habit changed by that amount over the chosen period.",
    "Ninety minutes a day for five years is 2,737.5 hours at the same average. Cutting that time in half would free 1,368.75 hours, a little over 57 full days or 228 six-hour book blocks.",
    "Current hours use daily minutes times 365 days per year. Reclaimed time multiplies that total by the reduction percentage; days and book blocks are conversions of the reclaimed hours.",
    "The reduction is a scenario, not a forecast. The calculation assumes the change happens immediately and holds for every day of the selected period. It uses a 365-day year and ignores leap days. The comparison in books is not a promise that someone will read that many books; it only expresses the same number of hours using the chosen book duration. Use a device's screen-time report for a better baseline, and treat a small sample as an estimate. The page neither reads device data nor tells you what an appropriate daily limit should be.",
    [("Does this track my TikTok use?", "No. It uses the daily minutes you enter."),
     ("What does reclaimed time mean?", "It is the arithmetic difference under the reduction scenario, not a prediction of how the time will be spent."),
     ("Are books actually completed?", "No. Book values are time equivalents only."),
     ("Does it use a leap year?", "No. The horizon uses 365 days per year.")],
    [("/everyday-life/social-media-time-alternatives", "Social media time"), ("/everyday-life/email-alternatives", "Email time"), ("/everyday-life/reading-time", "Reading time")],
)

# ----------------------------------------------------------------------- GWAM
add(
    "gwam", "GWAM Calculator", "GWAM — Gross and Net Words per Minute",
    "Calculate gross and net words per minute after errors, plus typing accuracy from a timed test. Enter sample length in minutes and use the test's scoring rule.",
    "Gross words per minute counts every word typed. Net speed subtracts mistakes first, so a test can show both pace and accuracy rather than pace alone.",
    [F("words", "Words typed", "words", 210), F("errors", "Errors", "words", 5), F("minutes", "Test duration", "min", 3)],
    [R("gross", "Gross words per minute", "GWAM"), R("net", "Net words per minute", "NWPM"), R("accuracy", "Accuracy", "%"), R("words_per_hour", "Gross words per hour", "words/h")],
    {"gross": "words / minutes", "net": "(words - errors) / minutes", "accuracy": "(words - errors) / words * 100", "words_per_hour": "words / minutes * 60"},
    [({"words": 210, "errors": 5, "minutes": 3}, {"gross": 70, "net": 68.3333333, "accuracy": 97.6190476, "words_per_hour": 4200}, .01),
     ({"words": 120, "errors": 12, "minutes": 2}, {"gross": 60, "net": 54, "accuracy": 90, "words_per_hour": 3600}, .001)],
    "A typing test often reports gross words per minute, or GWAM. That number can flatter a fast but error-prone run. Net speed shows what remains after mistakes are removed, while accuracy says how much of the sample was correct.",
    "210 words in three minutes gives 70 gross words per minute. Five errors reduce the net rate to 68.3333, and 205 correct words out of 210 produce 97.619 percent accuracy.",
    "Gross rate is words divided by minutes. Net rate subtracts errors before that division; accuracy is correct words divided by the total entered words.",
    "Typing tests do not all define a word or an error the same way. Some count a fixed character group as a word, and some penalize errors differently. Follow the test's own method when comparing a result with a published benchmark. This calculator treats the error count as incorrect words and assumes it does not exceed the total. It measures a single sample, not sustained speed, comprehension or workplace productivity. A zero-minute test cannot produce a rate. For repeat practice, use the same passage length and correction rules each time.",
    [("What does GWAM stand for?", "Gross words per minute: the total typed words divided by test minutes."),
     ("How is net speed different?", "It removes the entered errors before calculating words per minute."),
     ("Are typing-test words standardized?", "No. Tests may use different word-length and error rules."),
     ("Does this measure accuracy independently?", "It reports correct words as a percentage of the entered total.")],
    [("/everyday-life/words-per-minute", "Words per minute"), ("/everyday-life/keystrokes-per-hour", "Keystrokes per hour"), ("/everyday-life/reading-time", "Reading time")],
)
