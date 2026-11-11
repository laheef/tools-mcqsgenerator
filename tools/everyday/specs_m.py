"""

Everyday-life batch M: the clock and the timesheet.

Fourteen pages of hours: a pay calculation from clocking in and out, an eight
hour shift that has to end somewhere, the weekdays in a month, takt time from
demand, a deadline turned into hours a day, an order-by date from a lead time,
a use-by date from a shelf life, a data allowance from streaming hours, and
the conversions between hours, minutes, seconds and decimals.

The arithmetic is all of it multiplication and division. The reason the pages
exist is that the units do not match: a timesheet is in hours and minutes, a
payroll in decimals, a lead time in days and a data plan in gigabytes.

"""

from __future__ import annotations

from lib import F, R, S, SEL

SPECS: list = []
# ---------------------------------------------------------------- time card

SPECS.append(S(
    slug="time-card",
    name="Time Card Calculator",
    title="Time Card — Hours Worked and Pay from a Shift",
    desc="Clock-in, clock-out and an unpaid break give the hours on a time card in decimals, the pay at a given rate, and the same shift across a full working week.",
    what="The hours a shift is worth once an unpaid break comes off, the pay at an hourly rate, "
         "and what the same shift is over a five-day week.",
    fields=[
        F("start", "Clock in", "h", 9,
          help="On the twenty-four hour clock: 9 is nine in the morning and 13.5 is half past "
               "one."),
        F("end", "Clock out", "h", 17.5),
        F("break_min", "Unpaid break", "min", 30),
        F("rate", "Hourly rate", "$/h", 22),
    ],
    results=[
        R("hours", "Hours worked", "h"),
        R("pay", "Pay for the shift", "$"),
        R("week_pay", "Five shifts", "$"),
        R("minutes", "Minutes worked", "min"),
    ],
    formula={
        "hours": "end - start - break_min / 60",
        "pay": "(end - start - break_min / 60) * rate",
        "week_pay": "(end - start - break_min / 60) * rate * 5",
        "minutes": "(end - start - break_min / 60) * 60",
    },
    prose={
        "why": "<p>A shift from nine to half past five looks like eight and a half hours and pays "
               "for eight, because half an hour of it was lunch and lunch is not paid.</p>"
               "<p>The decimal matters. Eight hours is 8.00 on a payroll sheet and eight hours "
               "and a half is 8.50, but seven hours and forty minutes is 7.67 — and a timesheet "
               "written as 7.40 is wrong by sixteen minutes, which across a year is a shift.</p>",
        "formula_note": "Clock out less clock in less the break in hours gives the shift. Times "
                        "the rate gives pay, and times five gives a week of the same shift.",
        "reading": "Nine to half past five with a half-hour break is 8.00 hours: 176 a shift and "
                   "880 over five shifts, 480 minutes worked.",
        "example_note": "A shift that finishes at six rather than half past five is 8.50 hours "
                        "and 187 — the half hour is 11 dollars, and it is the half hour people "
                        "forget to claim.",
        "pitfalls": [
            "<strong>Writing 7.40 for seven hours forty.</strong> Decimal hours are not minutes. "
            "Forty minutes is 0.67 of an hour, and a timesheet in minutes and decimals mixed "
            "will always lose somebody money.",
            "<strong>Forgetting the break.</strong> A paid break is not deducted and an unpaid "
            "one is. Getting that the wrong way round in either direction is a payroll error "
            "that repeats every day.</li>",
        ],
        "limits": [
            "<li><strong>Day shifts.</strong> A shift that passes midnight needs the clock-out "
            "read as twenty-four plus the hour, or two separate days.</li>",
        ],
        "uses": [
            "<li>Checking a payslip against the clock.</li>",
            "<li>Working out what an extra half hour a day is worth.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": 9, "end": 18, "break_min": 30, "rate": 22},
             "note": "Finishing at six makes it 8.5 hours and 187 — half an hour a day, 55 a "
                     "week, and 2 860 over a year of 52 weeks."},
        ],
    },
    faq=[
        ("Why is my pay lower than the hours suggest?",
         "Because the break is unpaid, because the timesheet is in decimals and someone entered "
         "minutes, or because the shift crossed a rounding rule at quarter of an hour."),
        ("How do I convert minutes to decimal hours?",
         "Divide by sixty. Ten minutes is 0.17, twenty is 0.33, thirty is 0.50 and forty is "
         "0.67."),
        ("Does the calculator handle overtime?",
         "Not in this page — it prices every hour at the same rate. Overtime is the hours over "
         "the threshold times a multiplier, which is a second run of the sum."),
    ],
    related=[("/everyday-life/8-hour-shift", "Eight-hour shift"),
             ("/everyday-life/hours-to-decimal", "Hours to decimal"),
             ("/everyday-life/time-to-decimal", "Time to decimal")],
    checks=[
        ({"start": 9, "end": 17.5, "break_min": 30, "rate": 22},
         {"hours": 8, "pay": 176, "week_pay": 880, "minutes": 480}, 0.01),
        ({"start": 9, "end": 18, "break_min": 30, "rate": 22},
         {"hours": 8.5, "pay": 187, "week_pay": 935, "minutes": 510}, 0.01),
    ],
))

# ------------------------------------------------------------ eight hour shift

SPECS.append(S(
    slug="8-hour-shift",
    name="8 Hour Shift Calculator",
    title="8 Hour Shift — When an Eight-Hour Shift Ends",
    desc="An eight-hour shift starting at nine ends at half past five, not five: the clock-out time once the unpaid break is added, with hours on site alongside.",
    what="The time a shift ends when eight hours are paid and a break is not, and what the same "
         "shift costs in hours once the break is counted.",
    fields=[
        F("start", "Start time", "h", 9),
        F("paid", "Paid hours", "h", 8),
        F("break_min", "Unpaid break", "min", 30),
    ],
    results=[
        R("end", "Clock out", "h"),
        R("end_min", "Clock out", "min"),
        R("span", "Hours on site", "h"),
        R("paid_min", "Minutes paid", "min"),
    ],
    formula={
        "end": "start + paid + break_min / 60",
        "end_min": "(start + paid + break_min / 60) * 60",
        "span": "paid + break_min / 60",
        "paid_min": "paid * 60",
    },
    prose={
        "why": "<p>Eight paid hours starting at nine ends at half past five, not five, because "
               "the half-hour lunch sits inside the day and outside the pay.</p>"
               "<p>That is why an eight-hour shift is nine and a half hours from the door to the "
               "door once travel is counted, and why a rota built on eight-hour blocks runs "
               "half an hour late by the end of the week.</p>",
        "formula_note": "Start plus the paid hours plus the break in hours gives the clock-out "
                        "time. Minutes are that times sixty, and the span is the paid hours plus "
                        "the break.",
        "reading": "Nine o'clock plus eight paid hours plus a thirty-minute break is half past "
                   "five: 17.5 on the clock, 8.5 hours on site and 480 minutes paid.",
        "example_note": "A one-hour break pushes the clock-out to six, and the same eight paid "
                    "hours then take nine from arrival to departure.",
        "pitfalls": [
            "<strong>Adding eight hours to nine.</strong> That is five o'clock, and it is half an "
            "hour early every single day. The break is part of the day and not part of the pay.",
            "<strong>Assuming the break is unpaid.</strong> Not every job works that way. If the "
            "break is paid, leave the field at zero and the shift ends an hour earlier.</li>",
        ],
        "limits": [
            "<li><strong>One break.</strong> Two breaks and a lunch need to be added together "
            "before they go in the field.</li>",
        ],
        "uses": [
            "<li>Planning a rota backwards from a finish time.</li>",
            "<li>Checking a shift pattern before agreeing to it.</li>",
        ],
        "scenarios": [
            {"inputs": {"start": 9, "paid": 8, "break_min": 60},
             "note": "An hour of break pushes clock-out to six and the time on site to nine "
                     "hours for the same eight paid."},
        ],
    },
    faq=[
        ("Why does an eight-hour shift take nine and a half hours?",
         "Because the unpaid break is inside it and travel is outside it. The paid hours are "
         "eight; the day is longer in both directions."),
        ("What time does an 8 to 5 shift end?",
         "Five o'clock if the break is unpaid — 8 to 5 is nine hours on the clock and eight "
         "paid once an hour comes off."),
        ("Does a night shift change the sum?",
         "It changes the clock reading, not the hours. A start at 22 with eight paid hours and "
         "half an hour of break ends at 6.5, which is half past six the next morning."),
    ],
    related=[("/everyday-life/time-card", "Time card"),
             ("/everyday-life/working-days", "Working days"),
             ("/everyday-life/30-min", "30-minute blocks")],
    checks=[
        ({"start": 9, "paid": 8, "break_min": 30},
         {"end": 17.5, "end_min": 1050, "span": 8.5, "paid_min": 480}, 0.01),
        ({"start": 9, "paid": 8, "break_min": 60},
         {"end": 18, "end_min": 1080, "span": 9}, 0.01),
    ],
))

# ------------------------------------------------------------ working days

SPECS.append(S(
    slug="working-days",
    name="Working Days Calculator",
    title="Working Days in a Month — Counting the Weekdays",
    desc="How many weekdays a month contains, from its length and the weekday it starts on, with the weekend days and the count at a four-day week shown beside it.",
    what="How many weekdays a month contains, from its length and the weekday it begins on, with "
         "the weekend days and the count at a four-day week.",
    fields=[
        F("days", "Days in the month", "days", 30),
        F("start", "First day is", "weekday", 3,
          help="Numbered Monday 1 to Sunday 7. A calendar will tell you which the first of the "
               "month is."),
        F("work_week", "Short week, days a week", "days", 4),
    ],
    results=[
        R("weekdays", "Working days", "weekdays"),
        R("weekend", "Weekend days", "weekend days"),
        R("four_day", "At a four-day week", "days"),
        R("weeks", "Full weeks", "weeks"),
    ],
    formula={
        "weekdays": "floor(days / 7) * 5 + if_else(mod(days, 7) > 0, if_else(mod(start - 1, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 1, if_else(mod(start, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 2, if_else(mod(start + 1, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 3, if_else(mod(start + 2, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 4, if_else(mod(start + 3, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 5, if_else(mod(start + 4, 7) < 5, 1, 0), 0)",
        "weekend": "days - (floor(days / 7) * 5 + if_else(mod(days, 7) > 0, if_else(mod(start - 1, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 1, if_else(mod(start, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 2, if_else(mod(start + 1, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 3, if_else(mod(start + 2, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 4, if_else(mod(start + 3, 7) < 5, 1, 0), 0) + if_else(mod(days, 7) > 5, if_else(mod(start + 4, 7) < 5, 1, 0), 0))",
        "four_day": "floor(days / 7) * work_week",
        "weeks": "days / 7",
    },
    prose={
        "why": "<p>A month is four weeks and two or three days, and those days decide whether it "
               "has twenty or twenty-three working days. Thirty days starting on a Wednesday has "
               "twenty-two weekdays; thirty starting on a Saturday has twenty.</p>"
               "<p>The formula counts whole weeks at five each and then adds the weekdays in the "
               "remainder, which is why the weekday the month starts on matters as much as its "
               "length. February is the awkward one: twenty-eight days is exactly four weeks, so "
               "every February has twenty weekdays whatever day it starts on.</p>",
        "formula_note": "Whole weeks give five weekdays each; the remainder of up to six days is "
                        "tested one at a time against the starting weekday. Weekends are the "
                        "month less the weekdays.",
        "reading": "Thirty days starting on a Wednesday is twenty-two weekdays and eight weekend "
                   "days, four full weeks, and sixteen days at a four-day week.",
        "example_note": "The same thirty days starting on a Saturday is twenty weekdays — two "
                    "fewer, which is two days of pay, invoicing or shipping.",
        "pitfalls": [
            "<strong>Assuming twenty-one.</strong> A month has between twenty and twenty-three "
            "weekdays, and the spread is a tenth of a working month.",
            "<strong>Forgetting public holidays.</strong> They are weekdays by this count and "
            "days off in practice. Subtract them by hand.</li>",
        ],
        "limits": [
            "<li><strong>Five-day week.</strong> The weekday count is Monday to Friday. Shift "
            "patterns and seven-day operations need a different count.</li>",
        ],
        "uses": [
            "<li>Pricing a month of work or a month of rent.</li>",
            "<li>Checking a schedule against the days that actually exist.</li>",
        ],
        "scenarios": [
            {"inputs": {"days": 30, "start": 6, "work_week": 5},
             "note": "The same thirty days starting on a Saturday has twenty weekdays — two "
                     "fewer for the same calendar length."},
        ],
    },
    faq=[
        ("How many working days are in a year?",
         "About 260 at five days a week, from 365 less 104 weekend days and a handful of public "
         "holidays."),
        ("Why does February always have twenty?",
         "Because twenty-eight days is exactly four weeks, so every weekday appears four times "
         "and Monday to Friday total twenty."),
        ("Does this count public holidays?",
         "No. Saturday and Sunday are the only exclusions, and holidays vary by country and by "
         "year."),
    ],
    related=[("/everyday-life/time-card", "Time card"),
             ("/everyday-life/8-hour-shift", "Eight-hour shift"),
             ("/everyday-life/business-days", "Business days")],
    checks=[
        ({"days": 30, "start": 3, "work_week": 4},
         {"weekdays": 22, "weekend": 8, "four_day": 16, "weeks": 4.2857}, 0.01),
        ({"days": 30, "start": 6, "work_week": 4},
         {"weekdays": 20, "weekend": 10, "four_day": 16}, 0.01),
    ],
))

# --------------------------------------------------------------- cycle time

SPECS.append(S(
    slug="cycle-time",
    name="Takt Time Calculator",
    title="Takt Time — The Pace Demand Sets for a Line",
    desc="Four hundred and eighty minutes of production against 240 units is two minutes a unit: takt time, the pace demand sets, and what that asks of an hour.",
    what="The takt time a demand rate sets, in minutes and seconds a unit, with the units an hour "
         "and the capacity a shift delivers at that pace.",
    fields=[
        F("minutes", "Available minutes", "min", 480),
        F("demand", "Units needed", "units", 240),
        F("people", "People on the line", "people", 1),
    ],
    results=[
        R("takt", "Takt time", "min/unit"),
        R("takt_s", "Takt time", "s/unit"),
        R("units_hour", "Units an hour", "units"),
        R("labour", "Labour minutes a unit", "min/unit"),
    ],
    formula={
        "takt": "minutes / demand",
        "takt_s": "minutes / demand * 60",
        "units_hour": "60 / (minutes / demand)",
        "labour": "minutes / demand * people",
    },
    prose={
        "why": "<p>Takt time is the beat demand sets: the available time divided by the units "
               "wanted. Four hundred and eighty minutes for 240 units is one every two minutes, "
               "whether or not the line can do it.</p>"
               "<p>It is a target rather than a measure. If the real cycle time is longer than "
               "the takt, the shortfall is capacity; if it is shorter, the line is waiting. "
               "Either way the number is what the plan implies, and the plan is the thing that "
               "can change.</p>",
        "formula_note": "Available minutes over units gives minutes a unit, times sixty for "
                        "seconds, and sixty over that gives units an hour. Labour content is the "
                        "takt times the people working on the unit at once.",
        "reading": "480 minutes for 240 units is a takt of 2 minutes or 120 seconds, which is 30 "
                   "units an hour, with two labour minutes per unit for a single operator.",
        "example_note": "At 300 units the takt falls to 1.6 minutes and the hour needs 37.5 units "
                        "— a quarter more output from the same shift, which is where overtime "
                        "comes from.",
        "pitfalls": [
            "<strong>Using the scheduled shift instead of available time.</strong> Breaks, "
            "changeovers and planned maintenance come off first, or the takt is optimistic and "
            "the line is late by design.",
            "<strong>Confusing takt with cycle time.</strong> Takt is what demand asks for, "
            "cycle time is what the process delivers. The gap between them is the decision.</li>",
        ],
        "limits": [
            "<li><strong>One product, one demand.</strong> A mixed line needs a weighted takt, "
            "and this page takes a single average.</li>",
        ],
        "uses": [
            "<li>Setting a line pace before a week's production.</li>",
            "<li>Working out whether a shift can meet an order at all.</li>",
        ],
        "scenarios": [
            {"inputs": {"minutes": 480, "demand": 300, "people": 2},
             "note": "Three hundred units is a 1.6-minute takt, 37.5 an hour and 3.2 labour "
                     "minutes a unit with two people — the same shift asked for a quarter more."},
        ],
    },
    faq=[
        ("What is the difference between takt and cycle time?",
         "Takt is the pace required by demand; cycle time is the pace the process achieves. Takt "
         "is a target, cycle time is a measurement."),
        ("Should breaks come off the available time?",
         "Yes, along with changeovers and planned stops. Only the time the line can actually run "
         "counts toward takt."),
        ("What if takt is shorter than the cycle time?",
         "Then capacity is short and the gap has to be closed with people, equipment or a longer "
         "window. The takt number does not create capacity."),
    ],
    related=[("/everyday-life/working-days", "Working days"),
             ("/everyday-life/lead-time", "Lead time"),
             ("/everyday-life/deadline", "Deadline")],
    checks=[
        ({"minutes": 480, "demand": 240, "people": 1},
         {"takt": 2, "takt_s": 120, "units_hour": 30, "labour": 2}, 0.01),
        ({"minutes": 480, "demand": 300, "people": 2},
         {"takt": 1.6, "takt_s": 96, "units_hour": 37.5, "labour": 3.2}, 0.01),
    ],
))
# ------------------------------------------------------------------ deadline

SPECS.append(S(
    slug="deadline",
    name="Deadline Calculator",
    title="Deadline — Hours a Day Needed to Finish in Time",
    desc="Twenty hours of work and five days left is four hours a day, and the page says whether the week you actually have contains those hours or comes up short.",
    what="The hours a day a piece of work needs to be finished by a date, how many hours the "
         "remaining days actually offer, and the shortfall or slack between them.",
    fields=[
        F("days_left", "Days left", "days", 5),
        F("hours_work", "Work remaining", "h", 20),
        F("hours_day", "Hours a day you have", "h", 4),
    ],
    results=[
        R("needed", "Hours a day needed", "h"),
        R("available", "Hours available", "h"),
        R("slack", "Slack or shortfall", "h"),
        R("feasible", "Finishes in time", "yes/no"),
    ],
    formula={
        "needed": "hours_work / days_left",
        "available": "hours_day * days_left",
        "slack": "hours_day * days_left - hours_work",
        "feasible": "if_else(hours_day * days_left >= hours_work, 1, 0)",
    },
    prose={
        "why": "<p>A deadline is a division. Twenty hours of work over five days is four hours a "
               "day, and if the week only contains three, the answer is that it does not fit — "
               "which is worth knowing on the Monday rather than the Thursday.</p>"
               "<p>Twenty hours over five days is 4 a day, which is exactly the four hours "
               "available: feasible with nothing to spare. One lost evening and the slack is "
               "minus four, which is the state most deadlines are actually in.</p>",
        "formula_note": "Work over days gives the daily requirement. The available hours are the "
                        "daily hours times the days, and the slack is that less the work — "
                        "negative when the plan does not fit.",
        "reading": "Twenty hours over five days needs four a day. Five days at four hours is "
                   "twenty available, so the slack is zero and the work finishes with nothing to "
                   "spare.",
        "example_note": "Four days of the same four hours is sixteen against twenty: four hours "
                    "short, which is one evening and the reason a plan needs a fifth day rather "
                    "than more effort.",
        "pitfalls": [
            "<strong>Counting calendar days as working days.</strong> A weekend inside the "
            "window is two days that do not contain hours, and the requirement moves from four "
            "a day to six.",
            "<strong>Assuming the remaining work is fixed.</strong> Half of it might be waiting "
            "on someone else. The page assumes every hour is yours to spend.</li>",
        ],
        "limits": [
            "<li><strong>Even distribution.</strong> Work is not spread evenly — some days are "
            "meetings — and the figure is an average over the window.</li>",
        ],
        "uses": [
            "<li>Saying no to a deadline before it is accepted.</li>",
            "<li>Working out how much of a weekend a project costs.</li>",
        ],
        "scenarios": [
            {"inputs": {"days_left": 4, "hours_work": 20, "hours_day": 4},
             "note": "Four days instead of five needs five hours a day and offers sixteen: a "
                     "shortfall of four hours, which is one more evening."},
        ],
    },
    faq=[
        ("Should the last day be counted?",
         "Count the days that contain working hours. The day of the deadline usually only holds "
         "a morning."),
        ("Is it better to work more hours a day or ask for more days?",
         "More days, almost always. The daily requirement rises steeply as the window shrinks, "
         "and the quality of the last hours falls."),
        ("What if the work is not mine alone?",
         "Add the other people's hours to the total and their availability to the daily figure. "
         "The division is the same and the answer usually changes."),
    ],
    related=[("/everyday-life/lead-time", "Lead time"),
             ("/everyday-life/cycle-time", "Takt time"),
             ("/everyday-life/30-min", "30-minute blocks")],
    checks=[
        ({"days_left": 5, "hours_work": 20, "hours_day": 4},
         {"needed": 4, "available": 20, "slack": 0, "feasible": 1}, 0.01),
        ({"days_left": 4, "hours_work": 20, "hours_day": 4},
         {"needed": 5, "available": 16, "slack": -4, "feasible": 0}, 0.01),
    ],
))

# ---------------------------------------------------------------- lead time

SPECS.append(S(
    slug="lead-time",
    name="Lead Time Calculator",
    title="Lead Time — The Last Day You Can Still Order By",
    desc="A fourteen-day lead time in a thirty-day month means ordering by the fourteenth: the last safe day, the days you are past it and the share of the month gone.",
    what="The latest day of the month an order can go in for goods to arrive by the end of it, "
         "allowing for the supplier's lead time and a buffer, and the days you are past it.",
    fields=[
        F("month_length", "Days in the month", "days", 30),
        F("today", "Today's date", "day of month", 18),
        F("lead_days", "Supplier lead time", "days", 14),
        F("buffer", "Buffer", "days", 2,
          help="Two or three days covers a weekend and a late delivery. A lead time that lands "
               "on the last day has no room for either."),
    ],
    results=[
        R("order_by", "Order by", "day"),
        R("spare", "Days to spare", "days"),
        R("lead_share", "Lead time share of the month", "%"),
        R("missed", "Already too late", "yes/no"),
    ],
    formula={
        "order_by": "month_length - lead_days - buffer",
        "spare": "month_length - lead_days - buffer - today",
        "lead_share": "(lead_days + buffer) / month_length * 100",
        "missed": "if_else(month_length - lead_days - buffer - today < 0, 1, 0)",
    },
    prose={
        "why": "<p>A lead time is a deadline you cannot argue with. If the month has thirty days "
               "and the supplier needs fourteen plus a two-day buffer, the last order day is the "
               "fourteenth — and if today is the eighteenth, the order is four days late before "
               "anybody has picked up the phone.</p>"
               "<p>The percentage is the useful part for planning: sixteen days of thirty is 53 "
               "per cent of the month, so half the calendar is gone before the last order window "
               "closes.</p>",
        "formula_note": "The month length less the lead time and the buffer gives the last order "
                        "day. Subtracting today gives the days to spare, negative when the "
                        "window has closed, and the share is the lead and buffer over the month.",
        "reading": "Thirty days, fourteen of lead time and a two-day buffer: the last order day is "
                   "the fourteenth. On the eighteenth that is four days late, and the lead time "
                   "takes 53 per cent of the month.",
        "example_note": "A seven-day lead time with the same buffer allows ordering by the "
                        "twenty-first — a week more, and the difference between this month and "
                        "next.",
        "pitfalls": [
            "<strong>Counting the arrival day twice.</strong> A fourteen-day lead ordered on the "
            "first arrives on the fifteenth, not the fourteenth. Build the buffer into the "
            "window, not into your hope.",
            "<strong>Forgetting the weekend.</strong> A lead time quoted in working days is "
            "longer in calendar days, and a Friday order adds two days nobody counts.</li>",
        ],
        "limits": [
            "<li><strong>Within one month.</strong> A lead time longer than the month needs the "
            "previous month's calendar, and this page counts a single month from its start.</li>",
        ],
        "uses": [
            "<li>Planning a restock before a busy period.</li>",
            "<li>Working out why last month's order arrived late.</li>",
        ],
        "scenarios": [
            {"inputs": {"month_length": 30, "today": 10, "lead_days": 7, "buffer": 2},
             "note": "A seven-day lead with a two-day buffer allows ordering by the twenty-first, "
                     "which leaves eleven days to spare on the tenth."},
        ],
    },
    faq=[
        ("Is the lead time working days or calendar days?",
         "Ask. Suppliers quote both, and a fourteen-working-day lead is nearly three calendar "
         "weeks once weekends are counted."),
        ("How big should the buffer be?",
         "Two or three days for domestic suppliers and a week for anything crossing a border. A "
         "buffer is cheaper than an air freight."),
        ("What if the lead time is longer than the month?",
         "Then the order has to go in the previous month, and the calculation starts from the "
         "date you need it rather than the end of this one."),
    ],
    related=[("/everyday-life/cycle-time", "Takt time"),
             ("/everyday-life/deadline", "Deadline"),
             ("/everyday-life/expiration-date", "Expiration date")],
    checks=[
        ({"month_length": 30, "today": 18, "lead_days": 14, "buffer": 2},
         {"order_by": 14, "spare": -4, "lead_share": 53.3333, "missed": 1}, 0.01),
        ({"month_length": 30, "today": 10, "lead_days": 7, "buffer": 2},
         {"order_by": 21, "spare": 11, "lead_share": 30, "missed": 0}, 0.01),
    ],
))

# ------------------------------------------------------------ expiration date

SPECS.append(S(
    slug="expiration-date",
    name="Expiration Date Calculator",
    title="Expiration Date — Days Left Once It's Opened",
    desc="A twenty-one-day shelf life opened on the fourth is good until the twenty-fifth: the days remaining, the share already used, and the date it actually runs out.",
    what="How many days a product has left once it is opened, the share of its shelf life used, "
         "and the day number it expires on.",
    fields=[
        F("shelf_days", "Shelf life once opened", "days", 21),
        F("opened", "Opened on", "day", 4),
        F("today", "Today", "day", 15),
    ],
    results=[
        R("remaining", "Days left", "days"),
        R("used", "Days used", "days"),
        R("used_pct", "Shelf life used", "%"),
        R("expires", "Expires on", "day"),
    ],
    formula={
        "remaining": "shelf_days - (today - opened)",
        "used": "today - opened",
        "used_pct": "(today - opened) / shelf_days * 100",
        "expires": "opened + shelf_days",
    },
    prose={
        "why": "<p>Most dates on a packet are about the unopened product. Once it is open the "
               "clock restarts and runs faster: a twenty-one-day life opened on the fourth is "
               "good to the twenty-fifth, whether or not the packet's printed date is later.</p>"
               "<p>On the fifteenth it has ten days left and eleven used, which is 52 per cent. "
               "That percentage is the number to look at when deciding whether to buy the large "
               "tub or the small one.</p>",
        "formula_note": "Days since opening is today minus the day it was opened. The shelf life "
                        "less that is what is left, the ratio is the share used, and the expiry "
                        "day is the opening day plus the shelf life.",
        "reading": "A twenty-one-day life opened on the fourth expires on the twenty-fifth. On the "
                   "fifteenth eleven days are used and ten remain, 52.4 per cent of the life.",
        "example_note": "Opened on the tenth, the same product has sixteen days left on the "
                    "fifteenth rather than ten — five days of difference from where the clock "
                    "started.",
        "pitfalls": [
            "<strong>Using the printed date after opening.</strong> The unopened date assumes a "
            "seal. Once the seal is broken the shorter life applies and the packet does not say "
            "so twice.",
            "<strong>Judging by smell alone.</strong> Some things — dairy, cooked rice, "
            "mayonnaise — are not reliably detectable. The count is the safer test.</li>",
        ],
        "limits": [
            "<li><strong>A stated shelf life.</strong> Storage temperature changes it: a fridge "
            "at eight degrees instead of four can halve the life of an opened product.</li>",
        ],
        "uses": [
            "<li>Checking leftovers against the label rather than the instinct.</li>",
            "<li>Deciding between two tub sizes in a shop.</li>",
        ],
        "scenarios": [
            {"inputs": {"shelf_days": 21, "opened": 10, "today": 15},
             "note": "Opened on the tenth, the same product has sixteen days left on the "
                     "fifteenth — 24 per cent used rather than 52."},
        ],
    },
    faq=[
        ("How long is food good after opening?",
         "Three to five days for cooked food, a week for an opened jar in the fridge, and the "
         "label's own figure for anything with one. The printed date is for the sealed pack."),
        ("Does the fridge temperature matter?",
         "More than the date does. Above five degrees, bacterial growth roughly doubles for every "
         "few degrees, and a warm fridge turns a week into three days."),
        ("Should I count the day it was opened?",
         "No. The day of opening is day zero and the count starts the next day, which is what "
         "the subtraction here does."),
    ],
    related=[("/everyday-life/lead-time", "Lead time"),
             ("/everyday-life/deadline", "Deadline"),
             ("/everyday-life/grocery", "Grocery budget")],
    checks=[
        ({"shelf_days": 21, "opened": 4, "today": 15},
         {"remaining": 10, "used": 11, "used_pct": 52.381, "expires": 25}, 0.01),
        ({"shelf_days": 21, "opened": 10, "today": 15},
         {"remaining": 16, "used": 5, "used_pct": 23.8095, "expires": 31}, 0.01),
    ],
))

# --------------------------------------------------------------- data usage

SPECS.append(S(
    slug="data-usage",
    name="Data Usage Calculator",
    title="Data Usage — Streaming Hours into Gigabytes",
    desc="Two hours a day at 3 GB an hour is 183 GB a month: what a streaming habit costs in data, and how many hours a thousand-gigabyte allowance really lasts.",
    what="The data a streaming habit consumes a day, a month and a year, and how many hours a "
         "monthly allowance lasts at your resolution.",
    fields=[
        F("hours_day", "Hours a day", "h", 2),
        F("mb_hour", "Data an hour", "MB/h", 3000,
          help="Standard definition is about 1 000 MB an hour, HD about 3 000 and 4K about "
               "7 000."),
        F("cap", "Monthly allowance", "GB", 1000),
    ],
    results=[
        R("gb_day", "Data a day", "GB"),
        R("gb_month", "Data a month", "GB"),
        R("gb_year", "Data a year", "GB"),
        R("hours_cap", "Hours an allowance lasts", "h"),
    ],
    formula={
        "gb_day": "hours_day * mb_hour / 1000",
        "gb_month": "hours_day * mb_hour / 1000 * 30.4375",
        "gb_year": "hours_day * mb_hour / 1000 * 365",
        "hours_cap": "cap * 1000 / mb_hour",
    },
    prose={
        "why": "<p>Streaming is the largest line in most household data and the least visible: it "
               "arrives in hours and the allowance is in gigabytes. Three gigabytes an hour at "
               "two hours a day is six a day and 183 a month.</p>"
               "<p>A thousand-gigabyte allowance is 333 hours at HD, which sounds enormous and is "
               "less than six months of two hours a night. At 4K the same allowance is 143 hours, "
               "and that is where a household suddenly notices a cap.</p>",
        "formula_note": "Megabytes an hour times hours gives megabytes a day, divided by a thousand "
                        "for gigabytes. The month uses 30.44 days and the year 365, and the "
                        "allowance in hours is the cap over the hourly rate.",
        "reading": "Two hours at 3 000 MB an hour is 6 GB a day, 182.6 GB a month and 2 190 GB a "
                   "year. A 1 000 GB allowance lasts 333 hours.",
        "example_note": "Four hours a day doubles everything to 365 GB a month, which is a third "
                        "of the allowance spent on one screen in one room.",
        "pitfalls": [
            "<strong>Comparing a cap with a plan's speed.</strong> The cap is a volume and the "
            "speed is a rate. A fast connection reaches the cap sooner, not later.",
            "<strong>Forgetting that the household shares it.</strong> Two screens streaming at "
            "once is two streams' worth of data at the same time, and the total is what the cap "
            "counts.</li>",
        ],
        "limits": [
            "<li><strong>Streaming only.</strong> Downloads, updates, cloud backup and video "
            "calls are separate lines, and on a working-from-home connection they often exceed "
            "the television.</li>",
        ],
        "uses": [
            "<li>Choosing between a capped and an unlimited plan.</li>",
            "<li>Working out why a data allowance runs out in the third week.</li>",
        ],
        "scenarios": [
            {"inputs": {"hours_day": 4, "mb_hour": 3000, "cap": 1000},
             "note": "Four hours a day is 12 GB a day and 365 GB a month, so the allowance lasts "
                     "166 hours — five weeks of the habit rather than five months."},
        ],
    },
    faq=[
        ("How much data does an hour of streaming use?",
         "About 1 GB in standard definition, 3 GB in HD and 7 GB in 4K, depending on the "
         "service and how much the picture moves."),
        ("Does watching on a phone use less?",
         "The screen does not decide it; the resolution does. A phone streaming HD uses the same "
         "as a television streaming HD."),
        ("Is a 1 TB cap unlimited?",
         "For most households, no — a family watching in 4K can pass a terabyte in a couple of "
         "months. The number sounds large because it is measured in a different unit from the "
         "habit."),
    ],
    related=[("/everyday-life/tv-series-duration", "Series duration"),
             ("/everyday-life/binge-watching", "Binge-watching"),
             ("/everyday-life/every-second", "Every second")],
    checks=[
        ({"hours_day": 2, "mb_hour": 3000, "cap": 1000},
         {"gb_day": 6, "gb_month": 182.625, "gb_year": 2190, "hours_cap": 333.3333}, 0.01),
        ({"hours_day": 4, "mb_hour": 3000, "cap": 1000},
         {"gb_day": 12, "gb_month": 365.25, "gb_year": 4380, "hours_cap": 333.3333}, 0.01),
    ],
))
# ---------------------------------------------------------- hours and minutes

SPECS.append(S(
    slug="hours-minutes",
    name="Hours and Minutes Calculator",
    title="Hours and Minutes — Adding Up Four Durations",
    desc="Four durations in hours and minutes add to a total in the same form, as decimal hours and as working days: 2:20 plus 1:50 plus 3:15 plus 0:35 is 8:00.",
    what="The total of four durations, kept in hours and minutes, shown also as decimal hours and "
         "as working days.",
    fields=[
        F("h1", "First duration, hours", "h", 2),
        F("m1", "First duration, minutes", "min", 20),
        F("h2", "Second duration, hours", "h", 1),
        F("m2", "Second duration, minutes", "min", 50),
        F("h3", "Third duration, hours", "h", 3),
        F("m3", "Third duration, minutes", "min", 15),
        F("h4", "Fourth duration, hours", "h", 0),
        F("m4", "Fourth duration, minutes", "min", 35),
    ],
    results=[
        R("total_min", "Total minutes", "min"),
        R("total_hours", "Total, hours and minutes", "h"),
        R("decimal", "Total, decimal hours", "h"),
        R("work_days", "Working days at 8 h", "days"),
    ],
    formula={
        "total_min": "(h1 * 60 + m1) + (h2 * 60 + m2) + (h3 * 60 + m3) + (h4 * 60 + m4)",
        "total_hours": "((h1 * 60 + m1) + (h2 * 60 + m2) + (h3 * 60 + m3) + (h4 * 60 + m4)) / 60",
        "decimal": "((h1 * 60 + m1) + (h2 * 60 + m2) + (h3 * 60 + m3) + (h4 * 60 + m4)) / 60",
        "work_days": "((h1 * 60 + m1) + (h2 * 60 + m2) + (h3 * 60 + m3) + (h4 * 60 + m4)) / 480",
    },
    prose={
        "why": "<p>Adding hours and minutes is not like adding decimal numbers, because sixty "
               "minutes is an hour and a hundred is not. Two hours twenty plus one hour fifty is "
               "four hours ten, not three hours seventy.</p>"
               "<p>The safe method is to turn everything into minutes first, add, and divide once "
               "at the end. The four entries here come to 480 minutes, which is 8.00 hours and "
               "one working day exactly — the kind of round number a timesheet is supposed to "
               "produce and rarely does.</p>",
        "formula_note": "Each duration in minutes is its hours times sixty plus its minutes. The "
                        "four are added, divided by sixty for decimal hours, and by 480 for days "
                        "at eight hours.",
        "reading": "2:20, 1:50, 3:15 and 0:35 come to 480 minutes, which is 8.00 decimal hours "
                   "and exactly one eight-hour day.",
        "example_note": "Drop the last entry and the total is 7.42 hours — 445 minutes — which is "
                    "fifty minutes short of a day and twenty-three minutes short of a shift.",
        "pitfalls": [
            "<strong>Carrying at a hundred.</strong> The usual mistake is writing the minutes as "
            "decimals and adding: 20 + 50 + 15 + 35 is 120 becomes 1.20, which is wrong by forty "
            "minutes.",
            "<strong>Adding hours and minutes separately and carrying late.</strong> It works, "
            "but a minute total over 120 is easy to mis-carry. Minutes first is safer.</li>",
        ],
        "limits": [
            "<li><strong>Positive durations.</strong> Time subtracted needs the larger entry "
            "first; a negative duration is not handled by a straight sum.</li>",
        ],
        "uses": [
            "<li>Totalling a day of jobs for a timesheet or an invoice.</li>",
            "<li>Adding up a week of training sessions.</li>",
        ],
        "scenarios": [
            {"inputs": {"h1": 2, "m1": 20, "h2": 1, "m2": 50, "h3": 3, "m3": 15,
                        "h4": 0, "m4": 0},
             "note": "Without the last entry the total is 7.42 hours — 445 minutes, which is "
                     "fifty minutes short of an eight-hour day."},
        ],
    },
    faq=[
        ("Why can't I just add the minutes?",
         "Because a minute total above sixty becomes an hour. Adding 20 and 50 gives 70, which is "
         "one hour ten and not 0.70."),
        ("How do I convert the total to decimals?",
         "Divide the total minutes by sixty. Forty-five minutes is 0.75, and 480 minutes is 8."),
        ("Does the page handle fractions of a minute?",
         "It takes whole minutes. For seconds, divide the seconds by sixty first and add the "
         "result to the minutes."),
    ],
    related=[("/everyday-life/time-card", "Time card"),
             ("/everyday-life/time-to-decimal", "Time to decimal"),
             ("/everyday-life/8-hour-shift", "Eight-hour shift")],
    checks=[
        ({"h1": 2, "m1": 20, "h2": 1, "m2": 50, "h3": 3, "m3": 15, "h4": 0, "m4": 35},
         {"total_min": 480, "total_hours": 8, "decimal": 8, "work_days": 1}, 0.01),
        ({"h1": 2, "m1": 20, "h2": 1, "m2": 50, "h3": 3, "m3": 15, "h4": 0, "m4": 0},
         {"total_min": 445, "total_hours": 7.4167, "work_days": 0.9271}, 0.01),
    ],
))

# --------------------------------------------------------------------- minute

SPECS.append(S(
    slug="minute",
    name="Minute Calculator",
    title="Minute Calculator — Minutes into Hours and Days",
    desc="Ninety minutes is one and a half hours, 5 400 seconds and 0.0625 of a day, with the same length of time written out in each of those three units in turn.",
    what="Any number of minutes converted to hours, seconds, days and a decimal day, with the "
         "hour and minute form written out.",
    fields=[
        F("minutes", "Minutes", "min", 90),
    ],
    results=[
        R("hours", "Hours", "h"),
        R("seconds", "Seconds", "s"),
        R("days", "Days", "days"),
        R("day_share", "Share of a day", "%"),
    ],
    formula={
        "hours": "minutes / 60",
        "seconds": "minutes * 60",
        "days": "minutes / 1440",
        "day_share": "minutes / 1440 * 100",
    },
    prose={
        "why": "<p>A minute is a unit that hides how long it is. Ninety minutes sounds like a "
               "meeting and is an hour and a half; a thousand minutes sounds like a short task "
               "and is sixteen hours and forty, which is two working days.</p>"
               "<p>The conversion is one division and one multiplication: divide by sixty for "
               "hours, multiply by sixty for seconds, divide by 1 440 for days because a day is "
               "twenty-four hours of sixty minutes.</p>",
        "formula_note": "Minutes over sixty gives hours, times sixty gives seconds, over 1 440 "
                        "gives days, and the share of a day is that times a hundred.",
        "reading": "Ninety minutes is 1.5 hours, 5 400 seconds and 0.0625 of a day — 6.25 per "
                   "cent of the twenty-four.",
        "example_note": "A thousand minutes is 16.67 hours and 0.694 of a day, which is the "
                    "difference between an afternoon and two working days.",
        "pitfalls": [
            "<strong>Reading 100 minutes as 1.40 hours.</strong> It is 1.67. Minutes and hundredths "
            "of an hour are different units, and the difference over a month of shifts is money.",
            "<strong>Forgetting that a day is 1 440 minutes.</strong> Multiplying by twenty-four "
            "gives hours, not days, and the decimal then looks reasonable and is not.</li>",
        ],
        "limits": [
            "<li><strong>Whole minutes.</strong> Seconds are accepted through the seconds result, "
            "not as an input. A duration of 90.5 minutes needs the half minute written as 30 "
            "seconds separately.</li>",
        ],
        "uses": [
            "<li>Turning a length in minutes into hours for a schedule.</li>",
            "<li>Checking whether a task fits in the working day.</li>",
        ],
        "scenarios": [
            {"inputs": {"minutes": 1000},
             "note": "A thousand minutes is 16.67 hours — two working days and forty minutes, "
                     "which is rarely what a plan means by a thousand minutes."},
        ],
    },
    faq=[
        ("How many minutes are in a day?",
         "1 440. Twenty-four hours of sixty minutes, which is also the divisor this page uses."),
        ("What is 90 minutes in hours?",
         "One and a half. Divide by sixty: 90 over 60 is 1.5, and in hours and minutes that is "
         "1:30."),
        ("How do I convert minutes to hours and minutes?",
         "The whole hours are the minutes divided by sixty, rounded down, and the remainder is "
         "the minutes. 135 is 2:15."),
    ],
    related=[("/everyday-life/hours-minutes", "Hours and minutes"),
             ("/everyday-life/time-to-decimal", "Time to decimal"),
             ("/everyday-life/deadline", "Deadline")],
    checks=[
        ({"minutes": 90},
         {"hours": 1.5, "seconds": 5400, "days": 0.0625, "day_share": 6.25}, 0.01),
        ({"minutes": 1000},
         {"hours": 16.6667, "seconds": 60000, "days": 0.694444, "day_share": 69.4444}, 0.01),
    ],
))

# ------------------------------------------------------------- time to decimal

SPECS.append(S(
    slug="time-to-decimal",
    name="Time to Decimal Calculator",
    title="Time to Decimal — Seven Hours Forty-Eight as 7.80",
    desc="Seven hours forty-eight minutes and thirty seconds is 7.8083 decimal hours: the figure a payroll sheet wants, with the minute and second shares alongside.",
    what="A duration given as hours, minutes and seconds written as decimal hours, decimal "
         "minutes and total seconds.",
    fields=[
        F("hours", "Hours", "h", 7),
        F("minutes", "Minutes", "min", 48),
        F("seconds", "Seconds", "s", 30),
    ],
    results=[
        R("decimal_hours", "Decimal hours", "h"),
        R("decimal_minutes", "Decimal minutes", "min"),
        R("total_seconds", "Total seconds", "s"),
        R("seconds_share", "Seconds share of the hour", "%"),
    ],
    formula={
        "decimal_hours": "hours + minutes / 60 + seconds / 3600",
        "decimal_minutes": "hours * 60 + minutes + seconds / 60",
        "total_seconds": "hours * 3600 + minutes * 60 + seconds",
        "seconds_share": "(minutes / 60 + seconds / 3600) * 100",
    },
    prose={
        "why": "<p>Decimal time is the language of payroll and invoicing, and clock time is the "
               "language of everybody else. Seven hours forty-eight is 7.80 on a timesheet, and "
               "writing 7.48 is a third of an hour short.</p>"
               "<p>Each part converts on its own denominator: minutes over sixty, seconds over "
               "three thousand six hundred. Forty-eight minutes is 0.80 and thirty seconds is "
               "0.0083, so the total is 7.8083 hours.</p>",
        "formula_note": "Hours plus minutes over sixty plus seconds over 3 600 gives decimal "
                        "hours. Times sixty gives decimal minutes and times 3 600 gives the total "
                        "in seconds.",
        "reading": "7 hours 48 minutes 30 seconds is 7.8083 decimal hours, 468.5 decimal minutes "
                   "and 28 110 seconds.",
        "example_note": "Drop the half minute and the figure is 7.80 — the round number a "
                    "timesheet usually shows, and the one payroll will accept.",
        "pitfalls": [
            "<strong>Writing the minutes after the point.</strong> 7:48 is 7.80, not 7.48. The "
            "point is a decimal point, and the digits after it are not minutes.",
            "<strong>Rounding each part before adding.</strong> Forty-eight minutes rounds to "
            "0.80 and thirty seconds to 0.01, and the total is then out by a minute. Round "
            "once, at the end.</li>",
        ],
        "limits": [
            "<li><strong>Less than a day.</strong> The conversion is a duration and not a clock "
            "time. Twenty-five hours stays 25, it does not wrap to one.</li>",
        ],
        "uses": [
            "<li>Filling in a timesheet from a hand-written note.</li>",
            "<li>Converting a stopwatch reading for an invoice.</li>",
        ],
        "scenarios": [
            {"inputs": {"hours": 7, "minutes": 48, "seconds": 0},
             "note": "Without the seconds the same shift is 7.80 decimal hours exactly — the "
                     "figure that appears on most timesheets."},
        ],
    },
    faq=[
        ("What is 7 hours 48 minutes in decimals?",
         "7.80. Forty-eight minutes is four-fifths of an hour, so the fraction is exact."),
        ("Why is 30 minutes 0.5 and not 0.30?",
         "Because the decimal counts hundredths of an hour and the minute counts sixtieths. Thirty "
         "over sixty is a half."),
        ("How do I convert back?",
         "The whole number is the hours; multiply the fraction by sixty for minutes and the "
         "remainder by sixty again for seconds."),
    ],
    related=[("/everyday-life/hours-minutes", "Hours and minutes"),
             ("/everyday-life/decimal-time-conversion", "Decimal time conversion"),
             ("/everyday-life/time-card", "Time card")],
    checks=[
        ({"hours": 7, "minutes": 48, "seconds": 30},
         {"decimal_hours": 7.8083, "decimal_minutes": 468.5, "total_seconds": 28110,
          "seconds_share": 80.8333}, 0.01),
        ({"hours": 7, "minutes": 48, "seconds": 0},
         {"decimal_hours": 7.8, "decimal_minutes": 468, "total_seconds": 28080}, 0.01),
    ],
))

# ------------------------------------------------------ decimal time conversion

SPECS.append(S(
    slug="decimal-time-conversion",
    name="Decimal Time Converter",
    title="Decimal Time — Turning 7.35 Back into Hours",
    desc="7.35 decimal hours is 7 hours 21 minutes, not 7:35: the conversion back to clock time, with the parts separated and the cost of a wrong reading shown.",
    what="A decimal number of hours converted back into hours, minutes and seconds, with the "
         "decimal minutes and the error a wrong reading would cause.",
    fields=[
        F("decimal", "Decimal hours", "h", 7.35),
    ],
    results=[
        R("whole_hours", "Whole hours", "h"),
        R("minutes", "Minutes", "min"),
        R("seconds", "Seconds", "s"),
        R("clock", "Clock time", "h"),
    ],
    formula={
        "whole_hours": "floor(decimal)",
        "minutes": "floor((decimal - floor(decimal)) * 60)",
        "seconds": "round(((decimal - floor(decimal)) * 60 - floor((decimal - floor(decimal)) * 60)) * 60)",
        "clock": "decimal",
    },
    prose={
        "why": "<p>The conversion one way is familiar; the way back catches people. 7.35 hours "
               "is not seven hours thirty-five. The 0.35 is thirty-five hundredths of an hour, "
               "and that is twenty-one minutes.</p>"
               "<p>So 7.35 reads back as 7:21, and the fourteen minutes between the wrong reading "
               "and the right one is a quarter of an hour on every entry of a timesheet.</p>",
        "formula_note": "The whole number is the hours. The fraction times sixty gives minutes, "
                        "and the fraction of that times sixty gives seconds.",
        "reading": "7.35 decimal hours is 7 hours 21 minutes and 0 seconds — a clock reading of "
                   "7:21, not 7:35.",
        "example_note": "8.10 decimal hours is 8:06, a six-minute entry, and 0.10 of an hour is "
                    "the smallest unit most payroll systems store.",
        "pitfalls": [
            "<strong>Reading the decimal as minutes.</strong> 7.35 is 7:21. The digits after the "
            "point are hundredths of an hour, and only a coincidence makes 0.50 the same as "
            "thirty minutes.",
            "<strong>Rounding twice.</strong> Minutes rounded up and then seconds rounded up can "
            "add a minute. Round the seconds and let the minutes that come from them stand.</li>",
        ],
        "limits": [
            "<li><strong>Positive values.</strong> A negative decimal would need the whole part "
            "treated as a floor toward zero, and this page assumes a duration.</li>",
        ],
        "uses": [
            "<li>Reading a payroll export back into clock times.</li>",
            "<li>Checking a timesheet that was entered in decimals.</li>",
        ],
        "scenarios": [
            {"inputs": {"decimal": 8.1},
             "note": "8.10 decimal hours is 8:06 — six minutes, which is the smallest entry many "
                     "payroll systems can store."},
        ],
    },
    faq=[
        ("Is 7.5 hours 7:30?",
         "Yes, and it is the only one that looks right by accident. Half an hour is 0.5, but "
         "0.25 is fifteen minutes and 0.75 is forty-five."),
        ("How do I convert 7.35 hours to minutes?",
         "Multiply by sixty: 441 minutes, which is 7:21. The same answer as taking the whole hours "
         "and converting the fraction."),
        ("Why does payroll use decimals at all?",
         "Because multiplying decimal hours by a rate is one multiplication, and multiplying "
         "hours and minutes by a rate needs a conversion at every step."),
    ],
    related=[("/everyday-life/time-to-decimal", "Time to decimal"),
             ("/everyday-life/time-to-hours-conversion", "Time to hours"),
             ("/everyday-life/minutes-between-two-times", "Minutes between two times")],
    checks=[
        ({"decimal": 7.35},
         {"whole_hours": 7, "minutes": 21, "seconds": 0, "clock": 7.35}, 0.01),
        ({"decimal": 8.1},
         {"whole_hours": 8, "minutes": 6, "seconds": 0}, 0.01),
    ],
))

# ------------------------------------------------------- time to hours (payroll)

SPECS.append(S(
    slug="time-to-hours-conversion",
    name="Time to Hours Calculator",
    title="Time to Hours — A Shift in Decimals with Pay",
    desc="Six hours fifty minutes becomes 6.83 decimal hours and 157.17 of pay at 23 an hour, with the shift length in minutes and a whole week of the same shift priced.",
    what="A shift written in hours and minutes turned into decimal hours, priced at an hourly "
         "rate, and averaged over a working week.",
    fields=[
        F("hours", "Hours", "h", 6),
        F("minutes", "Minutes", "min", 50),
        F("rate", "Hourly rate", "$/h", 23),
        F("days_week", "Days a week", "days", 5),
    ],
    results=[
        R("decimal", "Decimal hours", "h"),
        R("pay", "Pay for the shift", "$"),
        R("week_pay", "Pay for the week", "$"),
        R("total_min", "Minutes worked", "min"),
    ],
    formula={
        "decimal": "hours + minutes / 60",
        "pay": "(hours + minutes / 60) * rate",
        "week_pay": "(hours + minutes / 60) * rate * days_week",
        "total_min": "hours * 60 + minutes",
    },
    prose={
        "why": "<p>Six hours fifty is 6.8333 in decimals, and a payroll sheet that reads 6.50 pays "
               "for six and a half hours — twenty minutes short, every day, for as long as nobody "
               "checks.</p>"
               "<p>The multiplication is trivial and the conversion is where the money goes. At 23 "
               "an hour the shift is 157.17, and the twenty minutes nobody claimed is 7.67 a "
               "day.</p>",
        "formula_note": "Hours plus minutes over sixty gives decimal hours. Times the rate gives "
                        "the shift, times the days a week the week, and the minutes are the "
                        "duration in a single unit.",
        "reading": "Six hours fifty minutes is 6.83 decimal hours, 157.17 a shift and 785.83 for "
                   "five days — 410 minutes a shift.",
        "example_note": "Six and a half hours reads 6.50 and pays 149.50: the same twenty minutes "
                    "is 7.67 a shift and 38 a week.",
        "pitfalls": [
            "<strong>Entering minutes as hundredths.</strong> Fifty minutes is 0.83, not 0.50. It "
            "is the single most common payroll error and it always pays less than the truth.",
            "<strong>Rounding the rate instead of the hours.</strong> Convert and multiply, then "
            "round to the cent. Rounding 6.8333 to 6.83 first loses a few cents a shift, which is "
            "a few dollars a year.</li>",
        ],
        "limits": [
            "<li><strong>A regular shift.</strong> The week multiplies one shift by the days. "
            "Different shifts each day need each one converted and then added.</li>",
        ],
        "uses": [
            "<li>Converting a shift for a payroll submission.</li>",
            "<li>Quoting an hourly job from its length.</li>",
        ],
        "scenarios": [
            {"inputs": {"hours": 6, "minutes": 30, "rate": 23, "days_week": 5},
             "note": "Six and a half hours is 6.50 decimal hours and 149.50 a shift: twenty "
                     "minutes a day less than the same shift at six fifty."},
        ],
    },
    faq=[
        ("What is 6 hours 50 minutes in decimal hours?",
         "6.83. The fifty minutes are five-sixths of an hour, which is 0.8333."),
        ("Do employers round the minutes?",
         "Many round to the nearest quarter of an hour. That is a policy, not a conversion — the "
         "decimal figure is what the policy then rounds."),
        ("Does a break come off before the conversion?",
         "Yes. Subtract the unpaid break first, then convert, or the pay includes time that was "
         "not worked."),
    ],
    related=[("/everyday-life/time-card", "Time card"),
             ("/everyday-life/time-to-decimal", "Time to decimal"),
             ("/everyday-life/decimal-time-conversion", "Decimal time conversion")],
    checks=[
        ({"hours": 6, "minutes": 50, "rate": 23, "days_week": 5},
         {"decimal": 6.8333, "pay": 157.1667, "week_pay": 785.8333, "total_min": 410}, 0.01),
        ({"hours": 6, "minutes": 30, "rate": 23, "days_week": 5},
         {"decimal": 6.5, "pay": 149.5, "week_pay": 747.5}, 0.01),
    ],
))

# --------------------------------------------------------------------- hours

SPECS.append(S(
    slug="hours",
    name="Hours Calculator",
    title="Hours — A Week of Shifts and What the Overtime Is",
    desc="Thirty-eight weekday hours, five on Saturday and two on Sunday is forty-five: the week "
         "total, the hours over the threshold and what the overtime pays.",
    what="A week of hours added up from the days worked, with the hours past a threshold priced "
         "at a higher rate and the two parts of the pay kept apart.",
    fields=[
        F("weekday_hours", "Total weekday hours", "h", 38),
        F("saturday_hours", "Saturday hours", "h", 5),
        F("sunday_hours", "Sunday hours", "h", 2),
        F("threshold", "Overtime after", "h", 40),
        F("rate", "Hourly rate", "$/h", 21),
    ],
    results=[
        R("total_hours", "Hours this week", "h"),
        R("overtime", "Hours of overtime", "h"),
        R("regular_pay", "Regular pay", "$"),
        R("overtime_pay", "Overtime pay", "$"),
        R("total_pay", "Total pay", "$"),
    ],
    formula={
        "total_hours": "weekday_hours + saturday_hours + sunday_hours",
        "overtime": "max(0, weekday_hours + saturday_hours + sunday_hours - threshold)",
        "regular_pay": "min(weekday_hours + saturday_hours + sunday_hours, threshold) * rate",
        "overtime_pay": "max(0, weekday_hours + saturday_hours + sunday_hours - threshold) * rate * 1.5",
        "total_pay": "min(weekday_hours + saturday_hours + sunday_hours, threshold) * rate + max(0, weekday_hours + saturday_hours + sunday_hours - threshold) * rate * 1.5",
    },
    prose={
        "why": "<p>A week of hours is a single sum, and the pay on top of it is not. The first "
               "forty hours are paid at the rate; the five past forty are paid at time and a "
               "half, and the two figures have to be kept apart because they are taxed and "
               "recorded differently.</p>"
               "<p>In this week the days come to 45, so forty hours are regular and five are "
               "overtime. At 21 an hour that is 840 plus 157.50, and the 997.50 is not the same "
               "number as 45 hours at 21 — which would be 945, understating the overtime by "
               "52.50.</p>",
        "formula_note": "The three day totals add to the week. Anything over the threshold is "
                        "overtime, paid at one and a half times the rate, and the rest is paid "
                        "at the rate.",
        "reading": "38 weekday hours, 5 on Saturday and 2 on Sunday come to 45. Five are "
                   "overtime: 840 regular pay, 157.50 overtime and 997.50 for the week.",
        "example_note": "Drop Sunday and the week is 43 hours with three of overtime, 861.50 in "
                    "total — two hours of Sunday pays 63, which is the rate doing the arithmetic.",
        "pitfalls": [
            "<strong>Paying every hour at the rate.</strong> Forty-five hours at 21 is 945, and "
            "the overtime owed is 52.50 more than that. The error is always in the employee's "
            "favour and it is always wrong.",
            "<strong>Assuming the threshold is daily.</strong> Some jurisdictions count overtime "
            "after eight hours a day rather than forty a week, and a long Tuesday then has "
            "overtime in it even if the week does not.</li>",
        ],
        "limits": [
            "<li><strong>One multiplier.</strong> Weekend rates, night rates and public holidays "
            "often differ from the time and a half used here.</li>",
        ],
        "uses": [
            "<li>Checking a weekly payslip before it is queried.</li>",
            "<li>Deciding whether a Saturday shift is worth taking.</li>",
        ],
        "scenarios": [
            {"inputs": {"weekday_hours": 38, "saturday_hours": 5, "sunday_hours": 0,
                        "threshold": 40, "rate": 21},
             "note": "Without Sunday the week is 43 hours, three of overtime, and 861.50 — the "
                     "two Sunday hours were worth 63."},
        ],
    },
    faq=[
        ("What is time and a half on 21 an hour?",
         "31.50. Multiply the rate by one and a half, and check the overtime line against it "
         "rather than the base rate."),
        ("Does overtime start after eight hours a day or forty a week?",
         "It depends where you work. The United States uses forty a week federally, several "
         "states use eight a day, and most of Europe has no weekly overtime threshold at all."),
        ("Is overtime taxed more?",
         "No. It is taxed at the same rates, but a larger payslip can cross a withholding band "
         "and appear to be taxed more."),
    ],
    related=[("/everyday-life/time-card", "Time card"),
             ("/everyday-life/time-to-hours-conversion", "Time to hours"),
             ("/everyday-life/8-hour-shift", "Eight-hour shift")],
    checks=[
        ({"weekday_hours": 38, "saturday_hours": 5, "sunday_hours": 2,
          "threshold": 40, "rate": 21},
         {"total_hours": 45, "overtime": 5, "regular_pay": 840, "overtime_pay": 157.5,
          "total_pay": 997.5}, 0.01),
        ({"weekday_hours": 38, "saturday_hours": 5, "sunday_hours": 0,
          "threshold": 40, "rate": 21},
         {"total_hours": 43, "overtime": 3, "regular_pay": 840, "overtime_pay": 94.5,
          "total_pay": 934.5}, 0.01),
    ],
))
