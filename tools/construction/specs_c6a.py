"""Batch 6a — heating, cooling and airflow."""

from __future__ import annotations

from lib import F, R, S

SPECS = [

    S(
        slug="ac-tonnage",
        name="AC tonnage",
        title="AC Tonnage Calculator: Btu Load and Tons of Cooling",
        desc="Size an air conditioner from the room area and a load per square foot: the Btu load, the tonnage it needs and what that equipment costs.",
        what=("<p><strong>Btu = area × load per ft² × (1 + safety)</strong>, and <strong>tons = Btu ÷ 12 000</strong>.</p>"),
        fields=[
            F("length", "Room length", "ft", 20, "One side"),
            F("width", "Room width", "ft", 15, "The other"),
            F("btu_per_ft2", "Cooling load", "Btu/ft²", 25, "Twenty five for a normal room"),
            F("safety", "Allowance", "%", 10, "For sun and appliances"),
            F("price_per_ton", "Price", "$/ton", 1200, "Installed equipment"),
        ],
        results=[
            R("area_ft2", "Area", "ft²"),
            R("btu", "Cooling load", "Btu/h"),
            R("tons", "Tonnage", "ton"),
            R("cost", "Cost", "$"),
        ],
        formula={
            "area_ft2": "length*width",
            "btu": "length*width*btu_per_ft2*(1+safety/100)",
            "tons": "length*width*btu_per_ft2*(1+safety/100)/12000",
            "cost": "length*width*btu_per_ft2*(1+safety/100)/12000*price_per_ton",
            "length": "area_ft2/width",
            "width": "area_ft2/length",
            "btu_per_ft2": "btu/(length*width*(1+safety/100))",
            "price_per_ton": "cost/tons",
        },
        prose={
            "why": ("<p>Air conditioners are sold in tons, and a ton of cooling is not a weight — it is twelve "
                    "thousand Btu per hour, the old name for the heat a ton of ice absorbs in a day. Getting "
                    "from a room's size to a tonnage is the first step in every equipment quote.</p>"),
            "formula_note": ("<p>The area carries a load per square foot, which is a rule of thumb for the "
                             "climate and the room, and the allowance lifts it for sun, people and appliances. "
                             "Dividing by twelve thousand converts Btu to tons, the unit the equipment is sold "
                             "in.</p>"),
            "example_note": ("<p>{area_ft2|unit} at {btu_per_ft2|unit} with a {safety|unit} allowance is "
                             "{btu|unit} of cooling, or {tons} tons. The equipment costs {cost} at the price "
                             "shown.</p>"),
            "reading": ("<p>Read the tonnage against the area: about one ton per four hundred square feet is "
                        "typical for a home in a temperate climate. A figure near one ton per hundred square "
                        "feet means the load per square foot has been entered for a commercial kitchen.</p>"),
            "scenarios": [
                {"inputs": {"length": 30, "width": 20, "btu_per_ft2": 30},
                 "note": "A large sunlit room with a heavier load per foot."},
                {"inputs": {"length": 12, "width": 10, "safety": 0},
                 "note": "A small bedroom with no allowance at all."},
                {"inputs": {"length": 12, "width": 10, "safety": 0},
                 "note": "A small bedroom with no allowance at all."},
            ],
            "pitfalls": [
                "<strong>Tons assumed to be weight.</strong> They are 12 000 Btu/h each.",
                "<strong>Area taken from the floor plan with closets.</strong> Use the cooled space.",
                "<strong>Load copied from another house.</strong> Shade and insulation differ.",
            ],
            "units_note": ("<p>Room dimensions in feet, load in Btu per square foot, capacity in tons of "
                           "cooling.</p>"),
            "limits": [
                "<strong>Rule of thumb, not a Manual J.</strong> A real load calculation is room by room.",
                "<strong>No duct or line losses.</strong> Those are added by the installer.",
            ],
            "uses": [
                "<li>Sizing a window unit.</li>",
                "<li>Checking a contractor's tonnage.</li>",
                "<li>Budgeting equipment for a new room.</li>",
            ],
        },
        faq=[
            ("How many square feet does a ton cool?",
             "About four hundred in a normal home, less in a hot climate or a poorly insulated room."),
            ("How many Btu is a ton of cooling?",
             "Twelve thousand per hour."),
        ],
        related=[("/construction/furnace-size", "Furnace size"),
                 ("/construction/heat-loss", "Heat loss"),
                 ("/construction/cfm", "CFM")],
    ),

    S(
        slug="air-changes-per-hour",
        name="Air changes per hour",
        title="Air Changes per Hour Calculator: Room Volume and CFM",
        desc="Work out how many air changes an hour a room gets from its volume and the airflow through it, with the air moved per hour and per minute.",
        what=("<p><strong>Air changes per hour = cfm × 60 ÷ room volume</strong>.</p>"),
        fields=[
            F("length", "Room length", "ft", 15, "One side"),
            F("width", "Room width", "ft", 12, "The other"),
            F("height", "Room height", "ft", 8, "Floor to ceiling"),
            F("cfm", "Airflow", "cfm", 200, "Through the room"),
        ],
        results=[
            R("volume_ft3", "Room volume", "ft³"),
            R("air_per_hour", "Air moved per hour", "ft³/h"),
            R("ach", "Air changes", "ACH"),
            R("minutes_per_change", "Minutes per change", "min"),
        ],
        formula={
            "volume_ft3": "length*width*height",
            "air_per_hour": "cfm*60",
            "ach": "cfm*60/(length*width*height)",
            "minutes_per_change": "length*width*height/(cfm*60)*60",
            "cfm": "ach*length*width*height/60",
            "length": "volume_ft3/(width*height)",
            "height": "volume_ft3/(length*width)",
        },
        prose={
            "why": ("<p>Air changes per hour is the one number that compares ventilation between rooms of "
                    "different size. A bathroom fan and a whole-house system move very different volumes, but "
                    "if both give six air changes an hour the air in each room is replaced at the same rate.</p>"),
            "formula_note": ("<p>The room volume is length times width times height in feet. The airflow in "
                             "cubic feet per minute, multiplied by sixty, is the volume moved in an hour, and "
                             "dividing that by the room volume gives the changes. Its reciprocal, times sixty, "
                             "is how many minutes one change takes.</p>"),
            "example_note": ("<p>A {length|unit} by {width|unit} room with a {height|unit} ceiling holds "
                             "{volume_ft3|unit}. At {cfm|unit} the air moves {air_per_hour|unit} an hour, which "
                             "is {ach} air changes — one every {minutes_per_change|unit}.</p>"),
            "reading": ("<p>Read the number against the room type: four to six changes suits a bedroom, six to "
                        "eight a kitchen, and ten or more a bathroom or a workshop with dust. Below two the "
                        "room will feel stale whatever the temperature.</p>"),
            "scenarios": [
                {"inputs": {"cfm": 50, "length": 8, "width": 5, "height": 8},
                 "note": "A small bathroom fan: a high change rate in a tiny volume."},
                {"inputs": {"cfm": 2000, "length": 40, "width": 30, "height": 10},
                 "note": "A workshop with an extractor: fewer changes in a large volume."},
                {"inputs": {"cfm": 100, "length": 20, "width": 20, "height": 8},
                 "note": "A large room with a small fan: barely two changes an hour."},
            ],
            "pitfalls": [
                "<strong>Volume in square feet.</strong> Height has to be included.",
                "<strong>Fan rating taken as delivered airflow.</strong> Ducts lose a share.",
                "<strong>Changes assumed to be fresh air.</strong> Recirculation is not ventilation.",
            ],
            "units_note": ("<p>Room dimensions in feet, volume in cubic feet, airflow in cfm, changes per "
                           "hour.</p>"),
            "limits": [
                "<strong>One well-mixed room.</strong> A room with a closed door behaves differently.",
                "<strong>No duct design.</strong> Pressure loss is a separate calculation.",
            ],
            "uses": [
                "<li>Checking a bathroom fan.</li>",
                "<li>Sizing ventilation for a workshop.</li>",
                "<li>Comparing rooms of different size.</li>",
            ],
        },
        faq=[
            ("What is a good air changes per hour rate?",
             "Four to six for living space, more for kitchens, bathrooms and workshops."),
            ("How do I convert cfm to air changes?",
             "Multiply the cfm by sixty and divide by the room volume in cubic feet."),
        ],
        related=[("/construction/cfm", "CFM"),
                 ("/construction/heat-loss", "Heat loss"),
                 ("/construction/ac-tonnage", "AC tonnage")],
    ),

    S(
        slug="air-conditioner-room-size",
        name="Air conditioner room size",
        title="Air Conditioner Room Size Calculator: Area per Ton",
        desc="Work out how much floor area an air conditioner can cool from its tonnage and a load per square foot, in square feet and square metres.",
        what=("<p><strong>Btu = tons × 12 000</strong>, and the area it serves is <strong>Btu ÷ load per "
              "ft²</strong>.</p>"),
        fields=[
            F("tons", "Capacity", "ton", 1.5, "Rated cooling capacity"),
            F("btu_per_ft2", "Cooling load", "Btu/ft²", 25, "Twenty five for a normal room"),
            F("safety", "Allowance", "%", 10, "For sun and appliances"),
        ],
        results=[
            R("btu", "Capacity", "Btu/h"),
            R("area_ft2", "Area served", "ft²"),
            R("area_m2", "Area served", "m²"),
            R("kw", "Capacity", "kW"),
        ],
        formula={
            "btu": "tons*12000",
            "area_ft2": "tons*12000/(btu_per_ft2*(1+safety/100))",
            "area_m2": "tons*12000/(btu_per_ft2*(1+safety/100))/10.7639",
            "kw": "tons*12000/3412.14",
            "tons": "btu/12000",
            "btu_per_ft2": "btu/(area_ft2*(1+safety/100))",
            "safety": "(btu/area_ft2/btu_per_ft2-1)*100",
        },
        prose={
            "why": ("<p>The question is usually the other way round from the tonnage calculator: the unit is "
                    "already chosen, and the job is to know what it will actually cool. Working from the "
                    "capacity backwards keeps the answer honest about the allowance and the load.</p>"),
            "formula_note": ("<p>The rated tonnage converts to Btu at twelve thousand an hour, and the "
                             "allowance means the real load per square foot is higher than the nominal one, so "
                             "the served area is the capacity divided by the lifted load. Square metres are "
                             "the same area divided by ten point seven six.</p>"),
            "example_note": ("<p>A {tons|unit} unit is {btu|unit}, or {kw|unit}. At {btu_per_ft2|unit} with a "
                             "{safety|unit} allowance it serves {area_ft2|unit}, which is {area_m2|unit}.</p>"),
            "reading": ("<p>Read the area against the tonnage: a ton per four hundred square feet of served "
                        "floor is the familiar rule. A much larger area for the same tonnage means the "
                        "allowance has been set to zero and the room will not keep up on a hot day.</p>"),
            "scenarios": [
                {"inputs": {"tons": 2, "btu_per_ft2": 30, "safety": 5},
                 "note": "A larger unit in a hotter room: the area served shrinks."},
                {"inputs": {"tons": 0.75, "safety": 0},
                 "note": "A small window unit with no allowance."},
            ],
            "pitfalls": [
                "<strong>Capacity taken from the model number.</strong> Check the rated Btu.",
                "<strong>Open-plan space measured as separate rooms.</strong> Air moves between them.",
                "<strong>Tall ceilings ignored.</strong> Volume, not floor, carries the heat.",
            ],
            "units_note": ("<p>Capacity in tons and Btu per hour, area in square feet and square metres, "
                           "cooling in kW.</p>"),
            "limits": [
                "<strong>Rule of thumb.</strong> A room-by-room load calculation is more accurate.",
                "<strong>No duct losses.</strong> Delivered capacity is lower than rated.",
            ],
            "uses": [
                "<li>Checking a unit before buying.</li>",
                "<li>Converting a model's tonnage to a room size.</li>",
                "<li>Comparing metric and imperial listings.</li>",
            ],
        },
        faq=[
            ("What size room will a 1.5 ton unit cool?",
             "Around six hundred and fifty square feet at a normal load with a ten per cent allowance."),
            ("How many kW is a ton of cooling?",
             "About three and a half kilowatts of cooling capacity."),
        ],
        related=[("/construction/ac-tonnage", "AC tonnage"),
                 ("/construction/heat-loss", "Heat loss"),
                 ("/construction/furnace-size", "Furnace size")],
    ),

    S(
        slug="boiler-size",
        name="Boiler size",
        title="Boiler Size Calculator: Heat Load, Output and kW",
        desc="Size a boiler from the heated floor area and a heat load per square foot, with the gross load, the output after efficiency and the kW rating.",
        what=("<p><strong>Load = area × Btu per ft²</strong>; <strong>boiler output = load ÷ efficiency</strong>.</p>"),
        fields=[
            F("heated_area", "Heated area", "ft²", 2000, "Conditioned floor area"),
            F("btu_per_ft2", "Heat load", "Btu/ft²", 40, "Forty for an older house"),
            F("efficiency", "Efficiency", "%", 85, "Seasonal efficiency"),
        ],
        results=[
            R("load_btu", "Heat load", "Btu/h"),
            R("output_btu", "Boiler output", "Btu/h"),
            R("load_kw", "Heat load", "kW"),
            R("output_kw", "Output", "kW"),
        ],
        formula={
            "load_btu": "heated_area*btu_per_ft2",
            "output_btu": "heated_area*btu_per_ft2/(efficiency/100)",
            "load_kw": "heated_area*btu_per_ft2/3412.14",
            "output_kw": "heated_area*btu_per_ft2/(efficiency/100)/3412.14",
            "heated_area": "load_btu/btu_per_ft2",
            "btu_per_ft2": "load_btu/heated_area",
            "efficiency": "load_btu/output_btu*100",
        },
        prose={
            "why": ("<p>A boiler is rated on its output, but the house needs a load. The gap between the two is "
                    "the efficiency: a boiler that is eighty five per cent efficient has to burn more than the "
                    "house loses, and the difference is what goes up the flue.</p>"),
            "formula_note": ("<p>The heated area times the load per square foot gives the heat the house loses "
                             "on the design day. Dividing that by the seasonal efficiency gives the output the "
                             "boiler must be capable of, and both are converted to kilowatts at three thousand "
                             "four hundred and twelve Btu per kilowatt hour.</p>"),
            "example_note": ("<p>{heated_area|unit} at {btu_per_ft2|unit} is a {load_btu|unit} load — "
                             "{load_kw|unit}. At {efficiency|unit} efficiency the boiler must deliver "
                             "{output_btu|unit}, which is {output_kw|unit}.</p>"),
            "reading": ("<p>Read the output against the load: they differ by the efficiency. Much more than a "
                        "fifth and the efficiency is low enough that the fuel bill, not the boiler, is the "
                        "problem to fix first.</p>"),
            "scenarios": [
                {"inputs": {"heated_area": 1200, "btu_per_ft2": 30, "efficiency": 92},
                 "note": "A small, well insulated house with a condensing boiler."},
                {"inputs": {"heated_area": 3500, "btu_per_ft2": 50},
                 "note": "A large older house in a cold climate."},
            ],
            "pitfalls": [
                "<strong>Output read as input.</strong> The rating plate gives the output.",
                "<strong>Efficiency taken as a hundred.</strong> Nothing is lossless.",
                "<strong>Domestic hot water left out.</strong> It can size the boiler on its own.",
            ],
            "units_note": ("<p>Area in square feet, load in Btu per square foot, capacity in Btu per hour and "
                           "kilowatts, efficiency in per cent.</p>"),
            "limits": [
                "<strong>Steady state only.</strong> Cycling losses are separate.",
                "<strong>No pipework or radiator sizing.</strong>",
            ],
            "uses": [
                "<li>Sizing a replacement boiler.</li>",
                "<li>Checking a quote against the load.</li>",
                "<li>Comparing kW ratings across models.</li>",
            ],
        },
        faq=[
            ("How big a boiler do I need for 2 000 square feet?",
             "About eighty thousand Btu of load, so a little over ninety thousand of output at eighty five per cent."),
            ("Should the boiler be oversized?",
             "No — a boiler that is too large cycles and wastes fuel."),
        ],
        related=[("/construction/heat-loss", "Heat loss"),
                 ("/construction/furnace-size", "Furnace size"),
                 ("/construction/ac-tonnage", "AC tonnage")],
    ),

    S(
        slug="cfm",
        name="CFM",
        title="CFM Calculator: Airflow from Duct Size and Velocity",
        desc="Work out the cubic feet per minute moving through a rectangular duct from its width, height and the air velocity, with the area it passes through.",
        what=("<p><strong>CFM = duct area in ft² × velocity in ft/min</strong>.</p>"),
        fields=[
            F("duct_width", "Duct width", "in", 12, "Inside dimension"),
            F("duct_height", "Duct height", "in", 8, "Inside dimension"),
            F("velocity", "Air velocity", "ft/min", 800, "Face velocity in the duct"),
        ],
        results=[
            R("area_ft2", "Duct area", "ft²"),
            R("cfm", "Airflow", "cfm"),
            R("m3h", "Airflow", "m³/h"),
            R("velocity_fps", "Velocity", "ft/s"),
        ],
        formula={
            "area_ft2": "duct_width*duct_height/144",
            "cfm": "duct_width*duct_height/144*velocity",
            "m3h": "duct_width*duct_height/144*velocity*1.69901",
            "velocity_fps": "velocity/60",
            "duct_width": "area_ft2*144/duct_height",
            "duct_height": "area_ft2*144/duct_width",
            "velocity": "cfm/area_ft2",
        },
        prose={
            "why": ("<p>Airflow is a volume, not a speed, and a duct only carries a volume because it has an "
                    "area. That is why the same fan moves far more air through a short wide duct than a long "
                    "narrow one, and why sizing a duct is really a question about velocity.</p>"),
            "formula_note": ("<p>The width and height in inches are divided by a hundred and forty four to give "
                             "square feet, then multiplied by the velocity in feet per minute. Multiply by "
                             "1.699 to reach cubic metres an hour, and divide by sixty for feet per "
                             "second.</p>"),
            "example_note": ("<p>A {duct_width|unit} by {duct_height|unit} duct has {area_ft2|unit} of face. At "
                             "{velocity|unit} it carries {cfm|unit}, which is {m3h|unit} or a velocity of "
                             "{velocity_fps|unit}.</p>"),
            "reading": ("<p>Read the velocity: below six hundred feet per minute a supply duct is quiet, eight "
                        "hundred is normal, and above twelve hundred the noise becomes noticeable in a "
                        "bedroom. High velocity in a small duct is how whistling systems happen.</p>"),
            "scenarios": [
                {"inputs": {"duct_width": 20, "duct_height": 8, "velocity": 600},
                 "note": "A wide shallow duct at low velocity: quiet and low loss."},
                {"inputs": {"duct_width": 6, "duct_height": 6, "velocity": 1200},
                 "note": "A small branch at high velocity: noisy but space saving."},
                {"inputs": {"duct_width": 24, "duct_height": 12, "velocity": 500},
                 "note": "A main trunk at low velocity: quiet and cheap to run."},
            ],
            "pitfalls": [
                "<strong>Round duct treated as square.</strong> Use the circular area.",
                "<strong>Outside dimensions used.</strong> Insulation is not air.",
                "<strong>Velocity in feet per second.</strong> The form wants feet per minute.",
            ],
            "units_note": ("<p>Duct dimensions in inches, area in square feet, airflow in cfm and cubic metres "
                           "per hour, velocity in feet per minute and per second.</p>"),
            "limits": [
                "<strong>Average velocity.</strong> A real duct has a velocity profile.",
                "<strong>No pressure loss.</strong> Friction is a separate calculation.",
            ],
            "uses": [
                "<li>Sizing a supply or return duct.</li>",
                "<li>Checking a fan's delivered airflow.</li>",
                "<li>Converting cfm to metric units.</li>",
            ],
        },
        faq=[
            ("How do I calculate cfm from duct size?",
             "Multiply the face area in square feet by the velocity in feet per minute."),
            ("What velocity should a duct run at?",
             "Six to eight hundred feet per minute for quiet residential supply air."),
        ],
        related=[("/construction/air-changes-per-hour", "Air changes per hour"),
                 ("/construction/gallons-per-minute", "Gallons per minute"),
                 ("/construction/furnace-size", "Furnace size")],
    ),

    S(
        slug="fire-flow",
        name="Fire flow",
        title="Fire Flow Calculator: Hydrant Flow from a Pitot Reading",
        desc="Estimate the flow a hydrant delivers from its nozzle diameter, the pitot pressure and the discharge coefficient, in gallons per minute.",
        what=("<p><strong>GPM = 29.83 × C × d² × √P</strong>, with the nozzle diameter in inches and the "
              "pressure in psi.</p>"),
        fields=[
            F("coefficient", "Discharge coefficient", "", 0.9, "About 0.9 for a smooth nozzle"),
            F("nozzle_diameter", "Nozzle diameter", "in", 2.5, "Inside diameter"),
            F("pressure", "Pitot pressure", "psi", 50, "Gauge reading at the stream"),
        ],
        results=[
            R("gpm", "Flow", "gpm"),
            R("lpm", "Flow", "L/min"),
            R("flow_per_psi", "Flow per psi", "gpm/psi"),
            R("nozzle_area", "Nozzle area", "in²"),
        ],
        formula={
            "gpm": "29.83*coefficient*pow(nozzle_diameter,2)*sqrt(pressure)",
            "lpm": "29.83*coefficient*pow(nozzle_diameter,2)*sqrt(pressure)*3.78541",
            "flow_per_psi": "29.83*coefficient*pow(nozzle_diameter,2)*(sqrt(pressure+1)-sqrt(pressure))",
            "nozzle_area": "pi/4*pow(nozzle_diameter,2)",
            "nozzle_diameter": "sqrt(gpm/(29.83*coefficient*sqrt(pressure)))",
            "coefficient": "gpm/(29.83*pow(nozzle_diameter,2)*sqrt(pressure))",
            "pressure": "pow(gpm/(29.83*coefficient*pow(nozzle_diameter,2)),2)",
        },
        prose={
            "why": ("<p>Fire flow testing is how a water system proves it can supply a fire. The pitot tube "
                    "measures the pressure at the centre of the stream, and the nozzle diameter turns that "
                    "pressure into a flow through the standard orifice equation.</p>"),
            "formula_note": ("<p>The coefficient accounts for the shape of the nozzle, the diameter squared is "
                             "the orifice area, and the square root of the pressure is the velocity term. The "
                             "constant 29.83 folds the unit conversions together so the answer lands in gallons "
                             "per minute.</p>"),
            "example_note": ("<p>A {nozzle_diameter|unit} nozzle at {pressure|unit} with a coefficient of "
                             "{coefficient} flows {gpm|unit}, which is {lpm|unit}. The nozzle face is "
                             "{nozzle_area|unit}.</p>"),
            "reading": ("<p>Read the flow against the nozzle: a two and a half inch nozzle at fifty psi is "
                        "close to twelve hundred gallons a minute, which is the benchmark a hydrant test "
                        "quotes. Half of that means the mains, not the nozzle, are the limit.</p>"),
            "scenarios": [
                {"inputs": {"nozzle_diameter": 2, "pressure": 30},
                 "note": "A smaller nozzle at lower pressure: a test on a weak main."},
                {"inputs": {"pressure": 80, "coefficient": 0.97},
                 "note": "A smooth nozzle on a strong system."},
            ],
            "pitfalls": [
                "<strong>Static pressure used.</strong> The pitot reads the flowing stream.",
                "<strong>Nozzle measured outside.</strong> Use the inside diameter.",
                "<strong>Coefficient left at one.</strong> Real nozzles are below it.",
            ],
            "units_note": ("<p>Nozzle diameter in inches, pressure in psi, flow in gallons per minute and "
                           "litres per minute.</p>"),
            "limits": [
                "<strong>Smooth-bore nozzle.</strong> Fog nozzles have a different coefficient.",
                "<strong>No residual pressure.</strong> System adequacy is tested separately.",
            ],
            "uses": [
                "<li>Recording a hydrant flow test.</li>",
                "<li>Checking a sprinkler supply.</li>",
                "<li>Comparing nozzle sizes.</li>",
            ],
        },
        faq=[
            ("What is the formula for hydrant flow?",
             "Twenty nine point eight three times the coefficient times the diameter squared times the square "
             "root of the pitot pressure."),
            ("How much does a 2.5 inch nozzle flow at 50 psi?",
             "Around eleven hundred and ninety gallons a minute with a coefficient of 0.9."),
        ],
        related=[("/construction/gallons-per-minute", "Gallons per minute"),
                 ("/construction/liters-per-minute", "Litres per minute"),
                 ("/construction/cfm", "CFM")],
    ),

    S(
        slug="furnace-size",
        name="Furnace size",
        title="Furnace Size Calculator: Btu Output from Airflow",
        desc="Size a furnace from the airflow and the temperature rise it is designed for, with the output, the input fuel and the kilowatt equivalent.",
        what=("<p><strong>Output = cfm × 1.08 × temperature rise</strong>.</p>"),
        fields=[
            F("cfm", "Airflow", "cfm", 1200, "Through the furnace"),
            F("temp_rise", "Temperature rise", "°F", 40, "Return to supply"),
            F("efficiency", "Efficiency", "%", 80, "AFUE of the furnace"),
        ],
        results=[
            R("output_btu", "Output", "Btu/h"),
            R("input_btu", "Input", "Btu/h"),
            R("output_kw", "Output", "kW"),
            R("cfm_per_ton", "Airflow per ton", "cfm/ton"),
        ],
        formula={
            "output_btu": "cfm*1.08*temp_rise",
            "input_btu": "cfm*1.08*temp_rise/(efficiency/100)",
            "output_kw": "cfm*1.08*temp_rise/3412.14",
            "cfm_per_ton": "cfm/(cfm*1.08*temp_rise/12000)",
            "cfm": "output_btu/(1.08*temp_rise)",
            "temp_rise": "output_btu/(cfm*1.08)",
            "efficiency": "output_btu/input_btu*100",
        },
        prose={
            "why": ("<p>A furnace is matched to its ductwork, not the other way round. The same cabinet can "
                    "deliver very different heat depending on how much air moves through it and how much the "
                    "air is allowed to warm, which is why the rating plate lists a rise range.</p>"),
            "formula_note": ("<p>1.08 is the heat carried by a cubic foot of air per minute per degree — the "
                             "density and specific heat rolled together. Airflow times the rise gives the "
                             "output, and dividing by the efficiency gives the gas or oil input the burner must "
                             "supply.</p>"),
            "example_note": ("<p>{cfm|unit} of air rising {temp_rise|unit} carries {output_btu|unit} — "
                             "{output_kw|unit}. At {efficiency|unit} efficiency the burner input is "
                             "{input_btu|unit}, and the airflow is {cfm_per_ton|unit} of cooling "
                             "equivalent.</p>"),
            "reading": ("<p>Read the rise against the plate range: most furnaces want thirty five to sixty five "
                        "degrees. A rise above seventy means too little air, and the heat exchanger will "
                        "suffer for it.</p>"),
            "scenarios": [
                {"inputs": {"cfm": 800, "temp_rise": 55},
                 "note": "Low airflow in a small duct system: a high rise for the heat."},
                {"inputs": {"cfm": 1600, "temp_rise": 35, "efficiency": 96},
                 "note": "A condensing furnace moving a lot of gentle air."},
            ],
            "pitfalls": [
                "<strong>Rise measured at one register.</strong> Measure at the plenum.",
                "<strong>Airflow taken from the fan curve.</strong> Measure it.",
                "<strong>Output read as input.</strong> The two differ by the efficiency.",
            ],
            "units_note": ("<p>Airflow in cfm, rise in Fahrenheit degrees, capacity in Btu per hour and "
                           "kilowatts, efficiency in per cent.</p>"),
            "limits": [
                "<strong>Steady state.</strong> Cyclic losses reduce the seasonal average.",
                "<strong>No duct losses.</strong> Heat lost to an attic never reaches a room.",
            ],
            "uses": [
                "<li>Checking a furnace against its ductwork.</li>",
                "<li>Sizing a replacement in an existing system.</li>",
                "<li>Working out the temperature rise.</li>",
            ],
        },
        faq=[
            ("What temperature rise should a furnace have?",
             "Typically thirty five to sixty five degrees Fahrenheit on the rating plate range."),
            ("How many cfm per ton of cooling?",
             "About four hundred, which the form reports from your own airflow and rise."),
        ],
        related=[("/construction/heat-loss", "Heat loss"),
                 ("/construction/boiler-size", "Boiler size"),
                 ("/construction/cfm", "CFM")],
    ),

    S(
        slug="gallons-per-minute",
        name="Gallons per minute",
        title="Gallons per Minute Calculator: Flow Rate and Units",
        desc="Turn a volume and a time into a flow rate in gallons per minute, with the same flow in litres per minute and litres per second.",
        what=("<p><strong>GPM = gallons ÷ minutes</strong>.</p>"),
        fields=[
            F("gallons", "Volume", "gal", 500, "Total collected"),
            F("minutes", "Time", "min", 20, "Duration of the run"),
        ],
        results=[
            R("gpm", "Flow", "gpm"),
            R("lpm", "Flow", "L/min"),
            R("lps", "Flow", "L/s"),
            R("gallons_per_hour", "Flow", "gal/h"),
        ],
        formula={
            "gpm": "gallons/minutes",
            "lpm": "gallons/minutes*3.78541",
            "lps": "gallons/minutes*3.78541/60",
            "gallons_per_hour": "gallons/minutes*60",
            "gallons": "gpm*minutes",
            "minutes": "gallons/gpm",
        },
        prose={
            "why": ("<p>Flow is a rate, and a rate only means something with both a volume and a time attached. "
                    "A well that yields five gallons a minute sounds modest until it is compared with a "
                    "fixture drawing two and a half — the point is that the units have to be sorted before the "
                    "numbers can be compared at all.</p>"),
            "formula_note": ("<p>Total gallons divided by total minutes is the rate in gallons per minute. The "
                             "litre figure multiplies by three point seven eight five, and the litres per "
                             "second figure divides that by sixty, so the same flow can be read against a pump "
                             "curve, a metric datasheet or a bucket test.</p>"),
            "example_note": ("<p>{gallons|unit} in {minutes|unit} is {gpm|unit}, which is {lpm|unit}, "
                             "{lps|unit}, or {gallons_per_hour|unit}.</p>"),
            "reading": ("<p>Read the rate against the fixtures: a shower draws about two and a half gallons a "
                        "minute, a garden tap five to ten. A whole-house flow below three will be noticed at "
                        "the second shower.</p>"),
            "scenarios": [
                {"inputs": {"gallons": 5, "minutes": 1},
                 "note": "The bucket test: five gallons in one minute."},
                {"inputs": {"gallons": 2400, "minutes": 60},
                 "note": "A well test over an hour."},
                {"inputs": {"gallons": 15, "minutes": 10},
                 "note": "A slow garden tap: one and a half gallons a minute."},
            ],
            "pitfalls": [
                "<strong>Time in seconds.</strong> The form wants minutes.",
                "<strong>Imperial gallons.</strong> A UK gallon is 4.55 litres.",
                "<strong>Average flow used as peak.</strong> Instantaneous demand is higher.",
            ],
            "units_note": ("<p>Volume in US gallons, time in minutes, flow in gallons per minute, litres per "
                           "minute and litres per second.</p>"),
            "limits": [
                "<strong>Steady flow.</strong> A pump's rate varies with head.",
                "<strong>No pressure.</strong> Flow and pressure are different measurements.",
            ],
            "uses": [
                "<li>Recording a well yield.</li>",
                "<li>Checking a pump against demand.</li>",
                "<li>Converting a metric flow rate.</li>",
            ],
        },
        faq=[
            ("How do I calculate gallons per minute?",
             "Divide the gallons collected by the minutes it took to collect them."),
            ("How many litres per minute is 5 gpm?",
             "About eighteen point nine litres a minute."),
        ],
        related=[("/construction/liters-per-minute", "Litres per minute"),
                 ("/construction/fire-flow", "Fire flow"),
                 ("/construction/cfm", "CFM")],
    ),

    S(
        slug="heat-loss",
        name="Heat loss",
        title="Heat Loss Calculator: U-Value, Area and Temperature",
        desc="Work out the transmission heat loss through a wall, roof or window from its area, U-value and the temperature difference across it.",
        what=("<p><strong>Heat loss = U × area × ΔT</strong>.</p>"),
        fields=[
            F("area", "Area", "ft²", 2000, "Surface being measured"),
            F("u_value", "U-value", "Btu/ft²·h·°F", 0.1, "The assembly's conductance"),
            F("delta_t", "Temperature difference", "°F", 50, "Inside minus outside"),
        ],
        results=[
            R("loss_btu", "Heat loss", "Btu/h"),
            R("loss_kw", "Heat loss", "kW"),
            R("loss_per_ft2", "Loss per ft²", "Btu/ft²"),
            R("r_value", "R-value", "ft²·h·°F/Btu"),
        ],
        formula={
            "loss_btu": "u_value*area*delta_t",
            "loss_kw": "u_value*area*delta_t/3412.14",
            "loss_per_ft2": "u_value*delta_t",
            "r_value": "1/u_value",
            "area": "loss_btu/(u_value*delta_t)",
            "u_value": "loss_btu/(area*delta_t)",
            "delta_t": "loss_btu/(u_value*area)",
        },
        prose={
            "why": ("<p>Heat leaves a building through its surfaces at a rate set by three things: how big the "
                    "surface is, how well it insulates, and how cold it is outside. The U-value folds the "
                    "whole wall assembly — sheathing, cavity, plasterboard — into one number.</p>"),
            "formula_note": ("<p>U-value times area times the temperature difference gives Btu per hour. The "
                             "U-value is the reciprocal of the R-value that insulation is sold by, so a wall of "
                             "R-13 is about U-0.077 before the framing and air films are counted.</p>"),
            "example_note": ("<p>{area|unit} at U-{u_value} across {delta_t|unit} loses {loss_btu|unit}, which "
                             "is {loss_kw|unit} — {loss_per_ft2|unit} for every square foot. That U-value is an "
                             "R-value of {r_value|unit}.</p>"),
            "reading": ("<p>Read the loss per square foot against the temperature difference: ten Btu an hour "
                        "for each square foot per fifty degrees is a reasonable wall. A figure three times that "
                        "is an uninsulated assembly or a single-glazed window.</p>"),
            "scenarios": [
                {"inputs": {"area": 200, "u_value": 0.5, "delta_t": 50},
                 "note": "Two hundred square feet of single glazing: the loss dominates the wall."},
                {"inputs": {"area": 1500, "u_value": 0.03},
                 "note": "A well insulated roof with a low U-value."},
                {"inputs": {"area": 600, "u_value": 0.08, "delta_t": 70},
                 "note": "A cold snap on an older wall: the same assembly loses far more."},
            ],
            "pitfalls": [
                "<strong>R-value entered as U-value.</strong> They are reciprocals.",
                "<strong>Indoor temperature taken as the thermostat.</strong> Use the air temperature.",
                "<strong>Bridging ignored.</strong> Studs and joists conduct.",
            ],
            "units_note": ("<p>Area in square feet, U-value in Btu per square foot per hour per Fahrenheit "
                           "degree, temperatures in Fahrenheit, loss in Btu per hour and kilowatts.</p>"),
            "limits": [
                "<strong>Steady state.</strong> Thermal mass delays and flattens the real curve.",
                "<strong>Conduction only.</strong> Air leakage is usually a separate and larger loss.",
            ],
            "uses": [
                "<li>Comparing wall assemblies.</li>",
                "<li>Sizing a heating system.</li>",
                "<li>Checking whether new glazing pays.</li>",
            ],
        },
        faq=[
            ("What is a good U-value?",
             "Below 0.2 for a wall in a cold climate; single glazing is about 1.0."),
            ("How do I convert R-value to U-value?",
             "Divide one by the R-value."),
        ],
        related=[("/construction/boiler-size", "Boiler size"),
                 ("/construction/insulation", "Insulation"),
                 ("/construction/furnace-size", "Furnace size")],
    ),
]
