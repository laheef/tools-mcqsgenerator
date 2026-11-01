<?php
/**
 * Per-calculator iconography.
 *
 * Every calculator gets its own glyph chosen from its name/slug, so a page for
 * "Mortgage" does not show the generic Finance symbol. Resolution order:
 *
 *   1. keyword rules  — ordered, most specific first (dna before bio, mortgage
 *                       before money), matched against the name and slug
 *   2. category glyph — from the calculator's category
 *   3. monogram       — first letter, for the rare name nothing matches
 *
 * Alongside the glyph each calculator gets a stable accent hue derived from a
 * hash of its path, so a grid of 3,898 cards still looks varied while staying
 * inside the design palette.
 */

declare(strict_types=1);

namespace Onim;

final class Icons
{
    /**
     * Ordered keyword rules: [regex fragment, glyph key].
     * Matched against "name slug" lowercased. First hit wins, so put narrow
     * terms above broad ones.
     */
    private const RULES = [
        // --- documents, money, business -------------------------------------
        ['mortgage|home loan|house payment', 'home'],
        ['rent|landlord', 'key'],
        ['\\bloan\\b|\\bemi\\b|installment|repay|amorti', 'hand-coin'],
        ['credit card|apr', 'card'],
        ['interest|compound|apy|savings', 'sprout'],
        ['invest|stock|portfolio|dividend|roi', 'chart-up'],
        ['retire|401k|pension|annuity', 'umbrella'],
        ['\\btax\\b|\\birs\\b|income tax|\\bvat\\b|\\bgst\\b', 'receipt'],
        ['salary|wage|\\bpay\\b|income|hourly|paycheck', 'wallet'],
        ['invoice|billing|quote', 'invoice'],
        ['budget|expense|spending|cash flow', 'pie'],
        ['profit|revenue|margin|markup|break.even', 'trending'],
        ['discount|sale price|markdown|coupon', 'tag'],
        ['tip|gratuity', 'tip'],
        ['currency|exchange rate|forex|usd|eur', 'exchange'],
        ['inflation|cpi|cost of living|purchasing', 'balloon'],
        ['depreciation|amortiz', 'decline'],
        ['mortgage refinance|refinanc', 'repeat'],
        ['crypto|bitcoin|ethereum', 'coin'],
        ['dividend yield|earnings per share|eps', 'stocks'],

        // --- health & body ---------------------------------------------------
        ['bmi|body mass', 'scale'],
        ['calorie|kcal|tdee|bmr|energy need', 'flame'],
        ['protein|carb|fat intake|macro', 'drumstick'],
        ['ideal weight|lean body|body fat|obesity|bmi|\\bweight\\b', 'weight'],
        ['height|growth chart|stature', 'ruler-vertical'],
        ['pregnan|due date|gestation|ovulat|conception|fertility', 'baby'],
        ['blood|hemoglobin|platelet|cholesterol|glucose|a1c', 'blood'],
        ['heart|cardiac|pulse|blood pressure|hypertension', 'heart-pulse'],
        ['sleep|insomnia|circadian', 'moon'],
        ['water intake|hydration|fluid', 'droplet'],
        ['dose|dosage|medicine|drug|mg per', 'pill'],
        ['alcohol|bac|blood alcohol', 'glass'],
        ['smok|cigarette|nicotine', 'smoke'],
        ['vision|eye|contact lens', 'eye'],
        ['hearing|decibel|noise', 'ear'],
        ['lung|respirat|oxygen|spiromet', 'lungs'],
        ['kidney|renal|creatinine|gfr', 'kidney'],
        ['shoe size|clothing size|ring size|bra size', 'tshirt'],
        ['period|menstru|cycle', 'calendar-heart'],

        // --- math ------------------------------------------------------------
        ['percentage|percent|%', 'percent'],
        ['fraction|decimal|ratio|proportion', 'fraction'],
        ['average|mean|median|mode', 'bars'],
        ['standard deviation|variance|z.score|p.value|confidence|significan|hypothes', 'distribution'],
        ['correlation|regression|r squared|linear fit', 'scatter'],
        ['probability|odds|chance|permutation|combination|bayes', 'dice'],
        ['logarithm|\blog\b|ln ', 'log'],
        ['square root|sqrt|radical', 'root'],
        ['exponent|power of|squared|cubed', 'superscript'],
        ['triangle|pythagor|hypotenuse|heron', 'triangle'],
        ['circle|circumfer|radius|diameter|arc', 'circle'],
        ['sphere|volume of a ball', 'sphere'],
        ['cylinder|tube', 'cylinder'],
        ['cone|pyramid', 'cone'],
        ['cube|box|rectangular prism|volume', 'cube'],
        ['rectangle|square footage|area of', 'square'],
        ['slope|gradient|rise over run|line equation', 'slope'],
        ['distance|midpoint|coordinate', 'route'],
        ['angle|degree|radian|trigonometr|sine|cosine|tangent', 'angle'],
        ['matrix|determinant|vector', 'grid'],
        ['prime|factor|gcd|lcm|divisor|multiple', 'factor'],
        ['sequence|series|fibonacci|arithmetic progression', 'sequence'],
        ['round|significant figure|truncat', 'target'],
        ['binary|hex|octal|base conversion', 'binary'],
        ['scientific notation|standard form', 'superscript'],
        ['integer|whole number|parity|even odd', 'hash'],
        ['number of days|\\bdate\\b|\\bage\\b|birthday|countdown|duration|days between', 'calendar'],
        ['time zone|clock|hour|minute|second', 'clock'],
        ['random|dice roll|lottery', 'dice'],
        ['equation|quadratic|polynomial|algebra', 'equals'],
        ['bit|byte|data storage|bandwidth', 'database'],

        // --- physics ---------------------------------------------------------
        ['ohm|resistance|current|voltage|ampere', 'resistor'],
        ['capacit|farad', 'capacitor'],
        ['induct|henry|coil', 'coil'],
        ['power|watt|kilowatt', 'bolt'],
        ['energy|joule|kinetic|potential energy|work', 'battery'],
        ['force|newton|pressure|pascal|stress', 'force'],
        ['torque|moment|lever|pulley|inclined plane', 'gear'],
        ['speed|velocity|acceleration|kinematic|free fall|projectile', 'speedometer'],
        ['friction|drag|air resistance', 'friction'],
        ['gravity|orbit|escape velocity|satellite', 'orbit'],
        ['density|mass|specific gravity|buoyancy|displacement', 'balance'],
        ['temperature|celsius|fahrenheit|kelvin|heat', 'thermometer'],
        ['light|wavelength|photon|lux|lumen|optics|refraction', 'light'],
        ['sound|frequency|wavelength of sound|acoustic', 'wave'],
        ['magnet|flux|tesla|induction', 'magnet'],
        ['radioactiv|decay|half life|isotope|dose equivalent', 'radiation'],
        ['gas|ideal gas|mole|pressure volume|thermodynam', 'gas'],
        ['fluid|flow|viscosity|reynolds|hydraulic', 'flow'],
        ['ideal weight|terminal velocity', 'parachute'],
        ['momentum|impulse|collision|elastic', 'collision'],
        ['capacitance|rc circuit|frequency of', 'circuit'],

        // --- chemistry -------------------------------------------------------
        ['molar|mole|avogadro|stoichiometr|reagent', 'flask'],
        ['\\bph\\b|ph level|acidity|alkalin|\\bpka\\b|buffer', 'ph'],
        ['dilut|concentration|solution|normality|molality', 'beaker'],
        ['titration|equivalence point', 'dropper'],
        ['periodic|element|atomic mass|electron config', 'atom'],
        ['bond|valen|oxidation|redox', 'bond'],
        ['enthalpy|entropy|gibbs|equilibrium constant', 'thermo'],
        ['crystal|lattice|unit cell', 'crystal'],

        // --- biology & ecology ----------------------------------------------
        ['dna|gene|allele|genetic|heredity|punnett|karyotype', 'dna'],
        ['cell|mitosis|meiosis|organelle', 'cell'],
        ['enzyme|michaelis|kinetic', 'enzyme'],
        ['bacteria|microb|colony|cfu', 'microbe'],
        ['ecosystem|carbon footprint|emission|renewable|solar panel', 'leaf'],
        ['population|carrying capacity|growth rate of a population', 'people'],
        ['animal|dog|cat|horse|cattle|livestock|pet|poultry', 'paw'],
        ['fish|aquarium|pond', 'fish'],
        ['bird|chicken|egg', 'bird'],
        ['bee|pollinat|hive', 'bee'],
        ['tree|forest|timber|basal area|wood', 'tree'],
        ['soil|compost|fertiliz|nitrogen|crop|yield|acre', 'sprout'],
        ['water quality|rainfall|runoff', 'rain'],
        ['aquarium|tank size', 'fish'],

        // --- food ------------------------------------------------------------
        ['pizza|dough', 'pizza'],
        ['coffee|caffeine', 'coffee'],
        ['cake|bake|recipe|ingredient|flour', 'cake'],
        ['sugar|sweetener', 'candy'],
        ['salt|sodium|brine', 'salt'],
        ['alcohol|beer|wine|cocktail|abv', 'beer'],
        ['cooking|serving|portion|plate', 'utensils'],
        ['macros|nutrition|food label', 'apple'],
        ['butter|oil|fat', 'butter'],
        ['meat|steak|protein source', 'meat'],
        ['pasta|rice|grain', 'wheat'],
        ['milk|dairy|cheese', 'milk'],

        // --- construction ----------------------------------------------------
        ['concrete|cement|mortar|grout', 'concrete'],
        ['paint|coverage|wallpaper', 'paint'],
        ['tile|flooring|laminate|parquet', 'tile'],
        ['roof|shingle|gutter', 'roof'],
        ['brick|block|wall', 'brick'],
        ['lumber|board|beam|deck|joist', 'lumber'],
        ['gravel|sand|mulch|dirt|topsoil', 'gravel'],
        ['fence|post|railing', 'fence'],
        ['stairs|staircase|rise and run', 'stairs'],
        ['drywall|insulation|plaster', 'wall'],
        ['asphalt|paving|road', 'road'],
        ['pipe|plumbing|drainage', 'pipe'],
        ['solar|panel', 'solar'],

        // --- conversion ------------------------------------------------------
        ['length|meter|foot|inch|yard|mile|centimeter|kilometer|millimeter', 'ruler'],
        ['weight|kilogram|pound|ounce|gram|ton|stone', 'weight'],
        ['volume|liter|gallon|quart|pint|cup|milliliter', 'jug'],
        ['area|hectare|acre|square meter|square foot', 'square'],
        ['speed|mph|km/h|knot', 'speedometer'],
        ['temperature conversion', 'thermometer'],
        ['pressure conversion|bar|psi|atmosphere', 'gauge'],
        ['energy conversion|joule|calorie|btu', 'battery'],
        ['angle conversion', 'angle'],
        ['cooking conversion|kitchen', 'utensils'],
        ['shoe size|clothing', 'tshirt'],
        ['roman numeral|number to words|spell', 'abacus'],

        // --- everyday & travel ----------------------------------------------
        ['fuel|gas mileage|mpg|petrol|consumption', 'fuel'],
        ['car|vehicle|tire|drive', 'car'],
        ['flight|plane|airport|altitude of', 'plane'],
        ['train|rail|transit', 'train'],
        ['bike|bicycle|cycling', 'bike'],
        ['walk|step|stride|pedometer', 'footsteps'],
        ['trip|travel|vacation|itinerar', 'luggage'],
        ['time difference|jet lag', 'globe'],
        ['electricity|kwh|utility', 'plug'],
        ['phone|battery life|screen', 'device'],
        ['cook time|turkey|roast', 'utensils'],
        ['gift|holiday|christmas', 'gift'],

        // --- sports ----------------------------------------------------------
        ['running|marathon|pace|race time', 'run'],
        ['swim|pool length', 'swim'],
        ['basketball|nba', 'basketball'],
        ['football|soccer|goal', 'football'],
        ['tennis|racket', 'tennis'],
        ['golf|handicap', 'golf'],
        ['one.rep max|1rm|lifting|weights', 'dumbbell'],
        ['cycling|ftp|watts per kilo', 'bike'],
        ['vo2|aerobic|fitness age', 'lungs'],
        ['calories burned|activity', 'flame'],
        ['skate|ski|snowboard', 'ski'],
        ['baseball|cricket|batting', 'baseball'],
    ];

    /**
     * Glyphs as SVG body markup on a 24x24 grid, stroke = currentColor.
     * Kept deliberately simple and legible at 20–34 px.
     */
    private const GLYPHS = [
        'home' => '<path d="M4 10.5 12 4l8 6.5V20a1 1 0 0 1-1 1h-4v-6H9v6H5a1 1 0 0 1-1-1z"/>',
        'key' => '<circle cx="8" cy="8" r="4"/><path d="m11 11 9 9M17 17l2-2M14 14l2-2"/>',
        'hand-coin' => '<path d="M3 14h4l3-3 4 1 6 3"/><path d="M3 20h12a3 3 0 0 0 3-3"/><circle cx="8.5" cy="6.5" r="3"/>',
        'card' => '<rect x="3" y="5.5" width="18" height="13" rx="2.5"/><path d="M3 10h18M7 15h3"/>',
        'sprout' => '<path d="M12 20v-7"/><path d="M12 13c0-3 2.2-5.2 5-5.2 0 3-2 5.2-5 5.2z"/><path d="M12 15c0-2.6-2-4.5-4.5-4.5 0 2.6 1.9 4.5 4.5 4.5z"/><path d="M8 21h8"/>',
        'chart-up' => '<path d="M4 19V5"/><path d="M4 19h16"/><path d="m7 15 4-5 3 3 5-7"/>',
        'umbrella' => '<path d="M3 12a9 9 0 0 1 18 0z"/><path d="M12 12v7a2.5 2.5 0 0 0 5 0"/>',
        'receipt' => '<path d="M6 3h12v18l-3-2-3 2-3-2-3 2z"/><path d="M9 8h6M9 12h6M9 16h3"/>',
        'wallet' => '<rect x="3" y="6" width="18" height="13" rx="2.5"/><path d="M3 10h18"/><circle cx="17" cy="14.5" r="1.2"/>',
        'invoice' => '<path d="M6 3h9l4 4v14H6z"/><path d="M15 3v4h4"/><path d="M9 12h6M9 16h6"/>',
        'pie' => '<circle cx="12" cy="12" r="8.5"/><path d="M12 3.5V12h8.5"/>',
        'trending' => '<path d="m3 17 5-5 3.5 3.5L21 7"/><path d="M15 7h6v6"/>',
        'tag' => '<path d="M4 11.5V4.5h7L21 14.5 14.5 21z"/><circle cx="8.5" cy="8.5" r="1.4"/>',
        'tip' => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7.5v5l3 1.8"/>',
        'exchange' => '<path d="M4 8h13l-3-3M20 16H7l3 3"/>',
        'balloon' => '<path d="M12 15a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11z"/><path d="M12 15v2M12 20.5l-1.5 1.5M12 20.5 13.5 22"/>',
        'decline' => '<path d="m3 7 5 5 3.5-3.5L21 17"/><path d="M15 17h6v-6"/>',
        'repeat' => '<path d="M4 9a5 5 0 0 1 5-5h9l-3-3M20 15a5 5 0 0 1-5 5H6l3 3"/>',
        'coin' => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7v10M9.5 10h5M9.5 14h5M9.5 10a2.5 2.5 0 0 1 0 4M14.5 10a2.5 2.5 0 0 0 0 4"/>',
        'stocks' => '<path d="M4 20V9M9 20V5M14 20v-7M19 20V3"/><path d="M3 20h18"/>',

        'scale' => '<rect x="3.5" y="14" width="17" height="6" rx="2.5"/><path d="M8 17.5h8"/><path d="M12 4v6M8 7h8"/>',
        'flame' => '<path d="M12 21c3.6 0 6-2.4 6-5.6 0-3.6-3-5.1-4-8.4-1 1.8-2 2.4-3 3.4-.8-1-1.4-2.2-1.6-3.9C7 8.4 6 11 6 15.4 6 18.6 8.4 21 12 21z"/>',
        'drumstick' => '<path d="M14.5 3.5a4 4 0 0 1 5.6 5.6l-6.4 6.4-5.6-5.6z"/><path d="m8 10-3.5 3.5a2.5 2.5 0 1 0 3.5 3.5z"/>',
        'weight' => '<path d="M6.5 8h11l2 12h-15z"/><circle cx="12" cy="5" r="2.6"/>',
        'ruler-vertical' => '<rect x="8" y="2.5" width="8" height="19" rx="1.5"/><path d="M8 7h3M8 11h4M8 15h3M8 19h4"/>',
        'baby' => '<circle cx="12" cy="9" r="5"/><path d="M9.5 8.5h.01M14.5 8.5h.01"/><path d="M10 11.2a2.6 2.6 0 0 0 4 0"/><path d="M7 21c1-2.6 2.8-4 5-4s4 1.4 5 4"/>',
        'blood' => '<path d="M12 3s6 6.4 6 10.4A6 6 0 0 1 6 13.4C6 9.4 12 3 12 3z"/>',
        'heart-pulse' => '<path d="M12 20.2S3.6 15.4 3.6 9.6A4.6 4.6 0 0 1 12 6.9a4.6 4.6 0 0 1 8.4 2.7c0 5.8-8.4 10.6-8.4 10.6z"/><path d="M6.8 12h2.4l1.2-2 1.8 4 1.2-2h2.6"/>',
        'moon' => '<path d="M20 14.5A8.5 8.5 0 0 1 9.5 4a8.5 8.5 0 1 0 10.5 10.5z"/>',
        'droplet' => '<path d="M12 3s6 6.4 6 10.4A6 6 0 0 1 6 13.4C6 9.4 12 3 12 3z"/>',
        'pill' => '<rect x="3" y="9" width="18" height="6" rx="3" transform="rotate(-45 12 12)"/><path d="m9 9 6 6"/>',
        'glass' => '<path d="M5 4h14l-7 8z"/><path d="M12 12v7M8 21h8"/>',
        'smoke' => '<path d="M4 20h7v-4H4z"/><path d="M13 16h4v-4h-4z"/><path d="M11 12h3V8h-3z"/><path d="M15 8h3V5h-3z"/>',
        'eye' => '<path d="M2.5 12S6 6.5 12 6.5 21.5 12 21.5 12 18 17.5 12 17.5 2.5 12 2.5 12z"/><circle cx="12" cy="12" r="3"/>',
        'ear' => '<path d="M7 9a5 5 0 0 1 10 0c0 3-2.5 3.6-2.5 6A2.8 2.8 0 0 1 9 15"/><path d="M11 9a1.6 1.6 0 0 1 3 0"/>',
        'lungs' => '<path d="M12 4v9"/><path d="M12 8c-1.5 0-2.6.8-3.4 2.2C7.6 12.2 7 15 7 17c0 1.6.6 2.5 2 2.5 1.6 0 2.6-1.4 2.6-3.6V11"/><path d="M12 8c1.5 0 2.6.8 3.4 2.2.9 2 1.5 4.8 1.5 6.8 0 1.6-.6 2.5-2 2.5-1.6 0-2.6-1.4-2.6-3.6V11"/>',
        'kidney' => '<path d="M9 5c3 0 5 2.5 5 7s-2 7-5 7-4.5-2-4.5-4.5S6 11 7 10s2-1.6 2-5z"/><path d="M14 7c1.6 1.6 2 4 2 6s-.4 4.4-2 6"/>',
        'tshirt' => '<path d="M8 4 4 7l2 3 2-1v11h8V9l2 1 2-3-4-3-2 1z"/>',
        'calendar-heart' => '<rect x="3" y="5" width="18" height="16" rx="2.5"/><path d="M3 10h18M8 3v4M16 3v4"/><path d="M12 17.2s-2.6-1.6-2.6-3.2a1.4 1.4 0 0 1 2.6-.7 1.4 1.4 0 0 1 2.6.7c0 1.6-2.6 3.2-2.6 3.2z"/>',

        'percent' => '<path d="m6 18 12-12"/><circle cx="7.5" cy="7.5" r="2.5"/><circle cx="16.5" cy="16.5" r="2.5"/>',
        'fraction' => '<path d="M5 12h14M6 8.5 8.5 5M17.5 19 20 15.5"/><circle cx="8.5" cy="5.5" r="2"/><circle cx="18" cy="18" r="2"/>',
        'bars' => '<path d="M4 20V13M9 20V7M14 20v-5M19 20V4"/>',
        'distribution' => '<path d="M3 19c3 0 3.5-12 9-12s6 12 9 12"/><path d="M3 19h18"/>',
        'scatter' => '<path d="M4 4v16h16"/><circle cx="8" cy="15" r="1.3"/><circle cx="11" cy="11" r="1.3"/><circle cx="15" cy="13" r="1.3"/><circle cx="18" cy="7" r="1.3"/>',
        'dice' => '<rect x="3.5" y="3.5" width="17" height="17" rx="3.5"/><circle cx="9" cy="9" r="1.3"/><circle cx="15" cy="9" r="1.3"/><circle cx="9" cy="15" r="1.3"/><circle cx="15" cy="15" r="1.3"/><circle cx="12" cy="12" r="1.3"/>',
        'log' => '<path d="M4 18h16"/><path d="M5 18c0-7 3.5-11 7-11"/><path d="M12 7h6"/>',
        'root' => '<path d="M3 13h3l2.5 6L14 4h7"/>',
        'superscript' => '<path d="M4 19h9M8.5 19V8h-3"/><path d="m15 10 4-5M19 10l-4-5"/>',
        'triangle' => '<path d="M12 4 21 19H3z"/>',
        'circle' => '<circle cx="12" cy="12" r="8.5"/><path d="M12 12h8.5"/>',
        'sphere' => '<circle cx="12" cy="12" r="8.5"/><ellipse cx="12" cy="12" rx="8.5" ry="3.4"/>',
        'cylinder' => '<ellipse cx="12" cy="6" rx="7" ry="2.8"/><path d="M5 6v12c0 1.5 3.1 2.8 7 2.8s7-1.3 7-2.8V6"/>',
        'cone' => '<path d="M12 3 20 19"/><path d="M12 3 4 19"/><ellipse cx="12" cy="19" rx="8" ry="2.6"/>',
        'cube' => '<path d="M12 3 21 8v8l-9 5-9-5V8z"/><path d="M3 8l9 5 9-5M12 13v8"/>',
        'square' => '<rect x="3.5" y="3.5" width="17" height="17" rx="2"/>',
        'slope' => '<path d="M3 19h18"/><path d="M3 19 21 6"/><path d="M14 19v-5.4h6"/>',
        'route' => '<circle cx="6" cy="18" r="2.5"/><circle cx="18" cy="6" r="2.5"/><path d="M8.5 18h4a3 3 0 0 0 0-6h-1a3 3 0 0 1 0-6h4"/>',
        'angle' => '<path d="M4 19h16"/><path d="M4 19 18 6"/><path d="M9 19a6 6 0 0 0-1.6-4"/>',
        'grid' => '<rect x="3.5" y="3.5" width="17" height="17" rx="1.5"/><path d="M3.5 9.2h17M3.5 14.8h17M9.2 3.5v17M14.8 3.5v17"/>',
        'factor' => '<path d="M12 4v16M4 12h16M6.3 6.3l11.4 11.4M17.7 6.3 6.3 17.7"/>',
        'sequence' => '<circle cx="4" cy="12" r="1.6"/><circle cx="10" cy="12" r="1.6"/><circle cx="16" cy="12" r="1.6"/><path d="M18.5 12h3"/>',
        'target' => '<circle cx="12" cy="12" r="8.5"/><circle cx="12" cy="12" r="4.5"/><circle cx="12" cy="12" r="1"/>',
        'binary' => '<path d="M6 8h2v8M6 16h4"/><path d="M16 8h2v8M16 16h4"/>',
        'hash' => '<path d="M9 3 7 21M17 3l-2 18M4 9h16M3 15h16"/>',
        'calendar' => '<rect x="3" y="5" width="18" height="16" rx="2.5"/><path d="M3 10h18M8 3v4M16 3v4"/><path d="M7 14h3M14 14h3M7 17.5h3"/>',
        'clock' => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7v5.2l3.4 2"/>',
        'equals' => '<path d="M5 9h14M5 15h14"/>',
        'database' => '<ellipse cx="12" cy="6" rx="7.5" ry="3"/><path d="M4.5 6v12c0 1.7 3.4 3 7.5 3s7.5-1.3 7.5-3V6"/><path d="M4.5 12c0 1.7 3.4 3 7.5 3s7.5-1.3 7.5-3"/>',

        'resistor' => '<path d="M2 12h4l1.5-4 3 8 3-8 1.5 4H22"/>',
        'capacitor' => '<path d="M2 12h7M15 12h7"/><path d="M9 6v12M15 6v12"/>',
        'coil' => '<path d="M2 12h3c1.5-6 4-6 4 0s2.5 6 4 0 2.5-6 4 0h5"/>',
        'bolt' => '<path d="M13 2 4 14h6l-1 8 9-12h-6z"/>',
        'battery' => '<rect x="2" y="7" width="17" height="10" rx="2.5"/><path d="M21 10.5v3M6 10v4M10 10v4"/>',
        'force' => '<path d="M4 12h9"/><path d="m14 7 6 5-6 5z"/><path d="M4 8v8"/>',
        'gear' => '<circle cx="12" cy="12" r="3.2"/><path d="M12 2.5v3M12 18.5v3M2.5 12h3M18.5 12h3M5.2 5.2l2.1 2.1M16.7 16.7l2.1 2.1M18.8 5.2l-2.1 2.1M7.3 16.7l-2.1 2.1"/>',
        'speedometer' => '<path d="M3.5 17a8.5 8.5 0 1 1 17 0"/><path d="m12 17 4.5-5.5"/><circle cx="12" cy="17" r="1.4"/>',
        'friction' => '<path d="M3 16h18"/><rect x="7" y="7" width="10" height="6" rx="1.5"/><path d="M10 10h.01M14 10h.01"/>',
        'orbit' => '<circle cx="12" cy="12" r="3"/><ellipse cx="12" cy="12" rx="9.5" ry="4.5" transform="rotate(-25 12 12)"/>',
        'balance' => '<path d="M12 3v18M8 21h8"/><path d="M4 8h16"/><path d="M4 8 2 14h4zM20 8l-2 6h4z"/>',
        'thermometer' => '<path d="M14 14.5V5a2 2 0 1 0-4 0v9.5a4 4 0 1 0 4 0z"/><path d="M12 17.5v-6"/>',
        'light' => '<circle cx="12" cy="12" r="3.5"/><path d="M12 2.5v2.5M12 19v2.5M2.5 12H5M19 12h2.5M5.2 5.2 7 7M17 17l1.8 1.8M18.8 5.2 17 7M7 17l-1.8 1.8"/>',
        'wave' => '<path d="M2 12c2 0 2-6 4-6s2 12 4 12 2-12 4-12 2 6 4 6h4"/>',
        'magnet' => '<path d="M6 3v8a6 6 0 0 0 12 0V3"/><path d="M6 8h4M14 8h4"/>',
        'radiation' => '<circle cx="12" cy="12" r="2.2"/><path d="M12 9.8c-.6-4 .4-6.8 1.6-6.8M10.1 13.1c-3.4 2.2-6.3 2.6-7-.6M13.9 13.1c3.4 2.2 6.3 2.6 7-.6"/>',
        'gas' => '<path d="M8 3h8v18H8z"/><path d="M8 8h8"/><path d="M16 6h2.5v10"/>',
        'flow' => '<path d="M3 7h10a3 3 0 0 1 0 6H7a3 3 0 0 0 0 6h14"/>',
        'parachute' => '<path d="M3 11a9 9 0 0 1 18 0z"/><path d="M12 11v8"/><path d="M8 11v7M16 11v7"/>',
        'collision' => '<circle cx="8" cy="12" r="4"/><circle cx="16" cy="12" r="4"/><path d="m11 10 2 2-2 2"/>',
        'circuit' => '<circle cx="6" cy="12" r="3"/><path d="M9 12h3l2-4 2 8 2-4h3"/>',

        'flask' => '<path d="M9 3h6M10 3v6.2L5.4 17.4A2 2 0 0 0 7.1 20h9.8a2 2 0 0 0 1.7-2.6L14 9.2V3"/><path d="M7.2 14.5h9.6"/>',
        'ph' => '<path d="M6 19V5h4a4 4 0 0 1 0 8H6"/><path d="M14 19v-6a3 3 0 0 1 6 0v6"/>',
        'beaker' => '<path d="M6 3h12v14a4 4 0 0 1-4 4h-4a4 4 0 0 1-4-4z"/><path d="M6 12h12"/>',
        'dropper' => '<path d="M9 14V5a2 2 0 1 1 4 0v9"/><path d="M8 14h6v3a3 3 0 0 1-6 0z"/><path d="M11 20.5v1"/>',
        'atom' => '<circle cx="12" cy="12" r="2"/><ellipse cx="12" cy="12" rx="9" ry="3.8"/><ellipse cx="12" cy="12" rx="9" ry="3.8" transform="rotate(60 12 12)"/><ellipse cx="12" cy="12" rx="9" ry="3.8" transform="rotate(120 12 12)"/>',
        'bond' => '<circle cx="5" cy="12" r="2.5"/><circle cx="19" cy="12" r="2.5"/><path d="M7.5 12h9M7.5 10.5h9"/>',
        'thermo' => '<path d="M3 17c3 0 4-9 9-9s6 9 9 9"/><path d="M3 20h18"/>',
        'crystal' => '<path d="m12 2 8 6-3 12H7L4 8z"/><path d="M4 8h16M8 8l4-6 4 6M8 8l3 12M16 8l-3 12"/>',

        'dna' => '<path d="M8 3c0 4 8 6 8 9s-8 5-8 9"/><path d="M16 3c0 4-8 6-8 9s8 5 8 9"/><path d="M9.2 8.5h5.6M9.2 15.5h5.6"/>',
        'cell' => '<circle cx="12" cy="12" r="8.5"/><circle cx="10.5" cy="10.5" r="2.5"/><circle cx="15" cy="15" r="1.8"/>',
        'enzyme' => '<path d="M6 20a4 4 0 0 1 0-8c4 0 4-4 8-4a4 4 0 0 1 0 8"/><circle cx="9" cy="8" r="1.5"/>',
        'microbe' => '<ellipse cx="9" cy="14" rx="5.5" ry="3.5" transform="rotate(-25 9 14)"/><circle cx="18" cy="8" r="2"/><path d="M5 9 3.5 7M13 19l1 2"/>',
        'leaf' => '<path d="M4 20c0-9 6-15 16-16 0 10-6 16-16 16z"/><path d="M4 20C8 15 11 12 16 9"/>',
        'people' => '<circle cx="9" cy="8" r="3.2"/><path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6"/><circle cx="17.5" cy="9" r="2.4"/><path d="M15.5 14.4c2.8.3 5 2.7 5 5.6"/>',
        'paw' => '<ellipse cx="12" cy="16" rx="5" ry="4"/><circle cx="6.5" cy="10" r="1.9"/><circle cx="10.5" cy="7" r="1.9"/><circle cx="15" cy="7" r="1.9"/><circle cx="18.5" cy="10.5" r="1.9"/>',
        'fish' => '<path d="M3 12c3-4 6-5 9-5s5 2 5 5-2 5-5 5-6-1-9-5z"/><path d="M17 12l4-4v8z"/><circle cx="8" cy="11" r=".9"/>',
        'bird' => '<path d="M4 18c2.5 0 3.5-3 6-3s3 3 6 3 4-2 4-4-3-2-3-5-3-4-6-2-3 4-6 4-3 3-1 7z"/><path d="M14 8h.01"/>',
        'bee' => '<ellipse cx="12" cy="14" rx="4.5" ry="5.5"/><path d="M7.5 12h9M8 16h8"/><path d="M12 4v4M9 6l3 3M15 6l-3 3"/>',
        'tree' => '<path d="M12 3 5 12h4l-3 5h12l-3-5h4z"/><path d="M12 17v4"/>',
        'rain' => '<path d="M6 14a4 4 0 1 1 1-7.9A5 5 0 0 1 17 8a3.5 3.5 0 0 1 1 6.9"/><path d="M8 17l-1 3M12 17l-1 3M16 17l-1 3"/>',

        'pizza' => '<path d="M12 3 21 20a25 25 0 0 1-18 0z"/><circle cx="10" cy="12" r="1.4"/><circle cx="14.5" cy="14.5" r="1.4"/><circle cx="12" cy="17.5" r="1.2"/>',
        'coffee' => '<path d="M4 8h13v6a5 5 0 0 1-5 5H9a5 5 0 0 1-5-5z"/><path d="M17 9h2a2.5 2.5 0 0 1 0 5h-2"/><path d="M7 4.5V3M11 4.5V3"/>',
        'cake' => '<path d="M4 20h16v-6a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3z"/><path d="M4 15c2 0 2 1.6 4 1.6S10 15 12 15s2 1.6 4 1.6S18 15 20 15"/><path d="M12 11V7"/><circle cx="12" cy="5.5" r="1.4"/>',
        'candy' => '<path d="M7 12a5 5 0 1 1 10 0 5 5 0 0 1-10 0z"/><path d="M7 12 2.5 9v6zM17 12l4.5-3v6z"/>',
        'salt' => '<path d="M8 3h8l1 6H7z"/><path d="M7 9v11a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V9"/><path d="M10 14h.01M14 14h.01M12 17h.01"/>',
        'beer' => '<path d="M5 5h10v15H5z"/><path d="M15 8h2.5a2.5 2.5 0 0 1 0 5H15"/><path d="M5 5c0-1.4 2.2-2 5-2s5 .6 5 2"/>',
        'utensils' => '<path d="M6 3v8a2 2 0 0 0 4 0V3"/><path d="M8 11v10"/><path d="M16 3c-2 2-2 5-2 7s.6 2.5 2 2.5V21"/>',
        'apple' => '<path d="M12 8c-1-1.5-3-2-4.6-1C5 8 4.5 11 5.5 14c.8 2.4 2.4 5 4 5 1 0 1.6-.6 2.5-.6s1.5.6 2.5.6c1.6 0 3.2-2.6 4-5 1-3 .5-6-1.9-7C15 6 13 6.5 12 8z"/><path d="M12 8V5a2 2 0 0 1 2-2"/>',
        'butter' => '<path d="M3 10h18v8H3z"/><path d="M6 10V7h12v3"/><path d="M3 14h18"/>',
        'meat' => '<path d="M16.5 3.5a5 5 0 0 1 4 4c.6 3-2 5.5-5 5-1.5-.3-2.5-1-3.5-2s-1.7-2-2-3.5c-.5-3 2-5.6 5-5.5z"/><path d="m11 13-6 6a2 2 0 0 0 3 3l6-6"/>',
        'wheat' => '<path d="M12 21V8"/><path d="M12 8c-2 0-3-1.5-3-3.5 2 0 3 1.5 3 3.5zM12 8c2 0 3-1.5 3-3.5-2 0-3 1.5-3 3.5z"/><path d="M12 13c-2 0-3-1.5-3-3.5 2 0 3 1.5 3 3.5zM12 13c2 0 3-1.5 3-3.5-2 0-3 1.5-3 3.5z"/><path d="M12 18c-2 0-3-1.5-3-3.5 2 0 3 1.5 3 3.5zM12 18c2 0 3-1.5 3-3.5-2 0-3 1.5-3 3.5z"/>',
        'milk' => '<path d="M9 3h6v3l2 3v12H7V9l2-3z"/><path d="M7 12h10"/>',

        'concrete' => '<path d="M3 15h18v6H3z"/><path d="M6 15V9h5v6M14 15V6h4v9"/><path d="M3 21h18"/>',
        'paint' => '<path d="M4 4h9v7H4z"/><path d="M8.5 11v4H15a3 3 0 0 1 0 6h-1"/><path d="M17 6h3v4h-3z"/>',
        'tile' => '<path d="M3 3h8v8H3zM13 3h8v8h-8zM3 13h8v8H3zM13 13h8v8h-8z"/>',
        'roof' => '<path d="M2 12 12 4l10 8"/><path d="M5 12v8h14v-8"/><path d="M10 20v-4h4v4"/>',
        'brick' => '<path d="M3 6h18v12H3z"/><path d="M3 12h18M9 6v6M15 6v6M6 12v6M12 12v6M18 12v6"/>',
        'lumber' => '<rect x="3" y="7" width="18" height="10" rx="1.5" transform="rotate(-8 12 12)"/><path d="M7 8.6 8 16M12 8 13 15.4M17 7.4l1 7.4"/>',
        'gravel' => '<circle cx="7" cy="15" r="2.5"/><circle cx="13" cy="17" r="2"/><circle cx="18" cy="13" r="2.6"/><circle cx="10" cy="9" r="2.4"/><circle cx="16.5" cy="7.5" r="1.8"/>',
        'fence' => '<path d="M4 20V8l2-3 2 3v12M16 20V8l2-3 2 3v12"/><path d="M2 11h20M2 16h20"/>',
        'stairs' => '<path d="M3 20h4v-4h4v-4h4V8h6"/>',
        'wall' => '<rect x="3" y="4" width="18" height="16" rx="1.5"/><path d="M3 12h18M9 4v8M15 4v8M6 12v8M12 12v8M18 12v8"/>',
        'road' => '<path d="M6 21 9 3M18 21 15 3"/><path d="M12 6v3M12 12v3M12 18v3"/>',
        'pipe' => '<path d="M3 9h5v6H3z"/><path d="M8 12h8"/><path d="M16 9h5v6h-5z"/>',
        'solar' => '<path d="M3 16 6 7h12l3 9z"/><path d="M12 3v2M5 5l1.4 1.4M19 5l-1.4 1.4"/><path d="M12 16v5M8 21h8"/>',

        'ruler' => '<rect x="2" y="8" width="20" height="8" rx="1.5"/><path d="M6 8v3M10 8v4M14 8v3M18 8v4"/>',
        'jug' => '<path d="M6 4h9l-1 4h2v12H5V8h2z"/><path d="M11 4V2h3v2"/>',
        'gauge' => '<circle cx="12" cy="12" r="8.5"/><path d="M12 12l4-3"/><path d="M12 3.5v2"/>',
        'abacus' => '<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9.5h18M3 15h18"/><circle cx="8" cy="9.5" r="1.3"/><circle cx="15" cy="15" r="1.3"/>',

        'fuel' => '<path d="M5 21V5a2 2 0 0 1 2-2h5a2 2 0 0 1 2 2v16"/><path d="M3 21h13"/><path d="M5 9h9"/><path d="M14 8h3a2 2 0 0 1 2 2v7a1.5 1.5 0 0 0 3 0V9l-3-3"/>',
        'car' => '<path d="M3 16v-4l2-5h14l2 5v4"/><path d="M3 16h18v3H3z"/><circle cx="7" cy="16" r="1.6"/><circle cx="17" cy="16" r="1.6"/>',
        'plane' => '<path d="M10 3.5 12 3l2 8 7 3v2l-7-1-1 5 3 1.5V23l-4-1-4 1v-1.5L11 20l-1-5-7 1v-2l7-3z"/>',
        'train' => '<rect x="5" y="3" width="14" height="13" rx="3"/><path d="M5 10h14"/><circle cx="9" cy="13" r="1.2"/><circle cx="15" cy="13" r="1.2"/><path d="m8 20-2 2M16 20l2 2M8 16l-1 4h10l-1-4"/>',
        'bike' => '<circle cx="6" cy="17" r="3.5"/><circle cx="18" cy="17" r="3.5"/><path d="M9 17h5l-3-8h-3M14 9h3l1 8"/>',
        'footsteps' => '<ellipse cx="8" cy="8" rx="2.5" ry="3.5"/><ellipse cx="16" cy="16" rx="2.5" ry="3.5"/><path d="M6 15v3M14 5v3"/>',
        'luggage' => '<rect x="5" y="7" width="14" height="13" rx="2.5"/><path d="M10 7V4h4v3M10 11v5M14 11v5"/>',
        'globe' => '<circle cx="12" cy="12" r="8.5"/><path d="M3.5 12h17M12 3.5c2.4 2.5 3.6 5.4 3.6 8.5s-1.2 6-3.6 8.5c-2.4-2.5-3.6-5.4-3.6-8.5S9.6 6 12 3.5z"/>',
        'plug' => '<path d="M9 3v6M15 3v6"/><path d="M6 9h12v3a6 6 0 0 1-12 0z"/><path d="M12 18v3"/>',
        'device' => '<rect x="7" y="2.5" width="10" height="19" rx="2.5"/><path d="M10.5 5.5h3"/><circle cx="12" cy="18" r="1"/>',
        'gift' => '<rect x="3" y="9" width="18" height="12" rx="2"/><path d="M3 13h18M12 9v12"/><path d="M12 9C10 9 7 8 7 5.5A2.5 2.5 0 0 1 12 5a2.5 2.5 0 0 1 5 .5C17 8 14 9 12 9z"/>',

        'run' => '<circle cx="15" cy="4.5" r="2"/><path d="m9 21 2-5-3-3 3-3 3 3 3 1"/><path d="m5 12 3-2M12 16l3 5"/>',
        'swim' => '<circle cx="8" cy="7" r="2"/><path d="M3 13c2 0 2-1.5 4-1.5S9 13 11 13s2-1.5 4-1.5S17 13 19 13"/><path d="M3 18c2 0 2-1.5 4-1.5S9 18 11 18s2-1.5 4-1.5S17 18 19 18"/>',
        'basketball' => '<circle cx="12" cy="12" r="8.5"/><path d="M3.5 12h17M12 3.5v17"/><path d="M6 5.5c3 2.5 3 10.5 0 13M18 5.5c-3 2.5-3 10.5 0 13"/>',
        'football' => '<circle cx="12" cy="12" r="8.5"/><path d="m12 7 3.4 2.5-1.3 4h-4.2l-1.3-4z"/><path d="M12 7V3.5M8.7 9.5 5 8M15.3 9.5 19 8M9.9 13.5 7.5 17M14.1 13.5l2.4 3.5"/>',
        'tennis' => '<circle cx="9.5" cy="9.5" r="6.5"/><path d="M14 14l6 6"/><path d="M5 6.5c2.5 2 2.5 4 0 6"/>',
        'golf' => '<path d="M12 21V3l7 3-7 3"/><ellipse cx="10" cy="21" rx="6" ry="1.6"/>',
        'dumbbell' => '<path d="M4 12h16"/><rect x="2" y="9" width="3" height="6" rx="1"/><rect x="19" y="9" width="3" height="6" rx="1"/><rect x="6" y="7.5" width="3" height="9" rx="1"/><rect x="15" y="7.5" width="3" height="9" rx="1"/>',
        'ski' => '<path d="M2 20h20"/><path d="m7 4 4 12M13 4l4 12"/><path d="M6 16h10"/>',
        'baseball' => '<circle cx="12" cy="12" r="8.5"/><path d="M6 5.5c2 1.8 3 4 3 6.5s-1 4.7-3 6.5M18 5.5c-2 1.8-3 4-3 6.5s1 4.7 3 6.5"/>',

        'star' => '<path d="m12 3.6 2.6 5.4 5.9.8-4.3 4.1 1 5.9-5.2-2.8-5.2 2.8 1-5.9L3.5 9.8l5.9-.8z"/>',
        'info' => '<circle cx="12" cy="12" r="9"/><path d="M12 11v5.5M12 7.8v.4"/>',
    ];

    private const CATEGORY_FALLBACK = [
        // --- biology round: animal, plant and bench-specific glyphs ----------
        'bacteria' => '<ellipse cx="11" cy="12" rx="7" ry="4.5" transform="rotate(-20 11 12)"/><path d="M18 9.5c1.6.4 2.4 1.6 2.2 3M17.6 14.6c1.4.6 1.8 2 1.2 3.2"/>',
        'bone' => '<path d="M7.5 16.5 16.5 7.5"/><circle cx="6" cy="15" r="2.2"/><circle cx="9" cy="18" r="2.2"/><circle cx="18" cy="9" r="2.2"/><circle cx="15" cy="6" r="2.2"/>',
        'chart' => '<path d="M4 20V4M4 20h16"/><rect x="7" y="12" width="3" height="5"/><rect x="12" y="8" width="3" height="9"/><rect x="17" y="14" width="3" height="3"/>',
        'charts' => '<path d="M4 20V4M4 20h16"/><rect x="7" y="12" width="3" height="5"/><rect x="12" y="8" width="3" height="9"/><rect x="17" y="14" width="3" height="3"/>',
        'chicken' => '<path d="M14 8a4 4 0 1 1-4 4c0-2.2 1.8-4 4-4z"/><path d="M14 4.5c.8-1 2.2-1 3 0M10.2 9.6 7 8l1.6 3.2"/><path d="M13 15v3l-2 2M16 14.6v3.4l2 2"/>',
        'dog' => '<path d="M7 9c0-2.5 2-4 5-4s5 1.5 5 4v5a4 4 0 0 1-4 4h-2a4 4 0 0 1-4-4z"/><path d="M7 9 5 5.5l2.6-.6M17 9l2-3.5-2.6-.6"/><circle cx="10" cy="11" r="0.9"/><circle cx="14" cy="11" r="0.9"/><path d="M12 14v1.4M12 15.4c-.8 0-1.4-.5-1.4-1"/>',
        'drop' => '<path d="M12 3.5c3 4 5.5 6.6 5.5 9.6a5.5 5.5 0 0 1-11 0c0-3 2.5-5.6 5.5-9.6z"/>',
        'egg' => '<path d="M12 3.5c3.2 0 5.5 4.6 5.5 8.6A5.5 5.5 0 0 1 12 20a5.5 5.5 0 0 1-5.5-7.9C6.5 8.1 8.8 3.5 12 3.5z"/>',
        'face' => '<circle cx="12" cy="12" r="8.5"/><circle cx="9.2" cy="10.2" r="0.9"/><circle cx="14.8" cy="10.2" r="0.9"/><path d="M8.6 14.4c1 1.4 2.2 2 3.4 2s2.4-.6 3.4-2"/>',
        'feed' => '<path d="M6 11h12l-1.4 8.5H7.4z"/><path d="M12 11V6M12 8c-1.8 0-3-1.2-3-2.8 1.8 0 3 1.2 3 2.8zM12 8c1.8 0 3-1.2 3-2.8-1.8 0-3 1.2-3 2.8z"/>',
        'gel' => '<rect x="4.5" y="3.5" width="15" height="17" rx="2"/><path d="M8 7h8M8 11h8M8 15h8M8 19h8"/><path d="M10 7.6h1.6M13.4 11.6h1.6M10.6 15.6h1.6"/>',
        'goat' => '<path d="M8 10a4 4 0 0 1 8 0v4a4 4 0 0 1-8 0z"/><path d="M8.6 6.8C7.4 4.6 7.8 3 9.4 2.6c.6 1.6.4 3-.8 4.2M15.4 6.8c1.2-2.2.8-3.8-.8-4.2-.6 1.6-.4 3 .8 4.2"/><path d="M11 14.4h2"/>',
        'grass' => '<path d="M12 21V9"/><path d="M12 13c-2.6 0-4.4-1.6-4.4-3.8C10 9.2 12 10.8 12 13z"/><path d="M12 11c2.6 0 4.4-1.6 4.4-3.8C14 7.2 12 8.8 12 11z"/><path d="M7 21h10"/>',
        'hand' => '<path d="M8 12V8a1.5 1.5 0 0 1 3 0v4"/><path d="M11 12V6.5a1.5 1.5 0 0 1 3 0V12"/><path d="M14 12V8a1.5 1.5 0 0 1 3 0v6a5 5 0 0 1-5 5h-1.5A5.5 5.5 0 0 1 5 13.5V11"/>',
        'heart' => '<path d="M12 20s-7-4.4-7-9.2A4 4 0 0 1 12 8a3.7 3.7 0 0 1 7 2.8C19 15.6 12 20 12 20z"/>',
        'microscope' => '<path d="M9 4h4l1.6 6H9.6z"/><path d="M8 10h7.5"/><path d="M11 13v3"/><path d="M6 20h12"/><path d="M8 16h6a4 4 0 0 0 4-4"/>',
        'mitochondria' => '<ellipse cx="12" cy="12" rx="8.5" ry="5"/><path d="M6 12c1.6-2.4 3.2 2.4 4.8 0S14.4 14.4 16 12s1.6 1.4 2.4.6"/>',
        'mouse' => '<path d="M6 12a6 6 0 0 1 12 0v2a4 4 0 0 1-4 4h-4a4 4 0 0 1-4-4z"/><circle cx="7.5" cy="7.5" r="2.4"/><circle cx="16.5" cy="7.5" r="2.4"/><path d="M6 16c-2 1-3 3-2 4"/><circle cx="10" cy="13" r="0.8"/>',
        'pcr' => '<path d="M9 3h6v9a3 3 0 0 1-6 0z"/><path d="M9 7h6"/><path d="M12 19v2"/><path d="M15.5 5c2 1 3 2.6 3 4.4"/>',
        'petri' => '<circle cx="12" cy="12" r="8.5"/><circle cx="12" cy="12" r="6"/><circle cx="10" cy="11" r="1"/><circle cx="14" cy="13" r="0.9"/><circle cx="12.6" cy="9.6" r="0.7"/>',
        'pig' => '<path d="M5 10a7 7 0 0 1 14 0v3a7 7 0 0 1-14 0z"/><ellipse cx="12" cy="13" rx="3" ry="2.2"/><circle cx="11" cy="13" r="0.6"/><circle cx="13" cy="13" r="0.6"/><path d="M7 6 5.5 3.5M17 6l1.5-2.5"/>',
        'pipette' => '<path d="M14.5 3.5h6v3h-6z"/><path d="M17.5 6.5v7l-4 4h-2l-2 3-2-2 3-2v-2l4-4h3"/>',
        'plate' => '<rect x="3.5" y="4.5" width="17" height="15" rx="2"/><path d="M7 8h2M11 8h2M15 8h2M7 12h2M11 12h2M15 12h2M7 16h2M11 16h2M15 16h2"/>',
        'protein' => '<path d="M6 6c4 0 3 4 6 4s2-4 6-4"/><path d="M6 18c4 0 3-4 6-4s2 4 6 4"/><path d="M12 10v4"/>',
        'satellite' => '<rect x="9" y="9" width="6" height="6" rx="1"/><path d="M9 12H4M15 12h5M12 9V4M12 15v5"/><circle cx="6" cy="6" r="1.6"/><circle cx="18" cy="18" r="1.6"/>',
        'spectrophotometer' => '<rect x="3.5" y="7" width="17" height="11" rx="2"/><path d="M7 7V4h4v3"/><path d="M3.5 15h6"/><circle cx="16" cy="12" r="2"/>',
        'water' => '<path d="M3 8c2-1.6 4-1.6 6 0s4 1.6 6 0 4-1.6 6 0"/><path d="M3 13c2-1.6 4-1.6 6 0s4 1.6 6 0 4-1.6 6 0"/><path d="M3 18c2-1.6 4-1.6 6 0s4 1.6 6 0 4-1.6 6 0"/>',
        'biology' => 'dna',
        'chemistry' => 'flask',
        'construction' => 'brick',
        'conversion' => 'exchange',
        'ecology' => 'leaf',
        'everyday-life' => 'clock',
        'finance' => 'wallet',
        'food' => 'utensils',
        'health' => 'heart-pulse',
        'math' => 'equals',
        'physics' => 'atom',
        'sports' => 'dumbbell',
        'statistics' => 'distribution',
        'other' => 'star',
        'discover' => 'light',
    ];

    /**
     * Accent hues: one degree per step around the wheel — 360 accents, which
     * together with ~160 glyphs gives far more combinations than calculators, so
     * every page and every card can have its own. Every accent sits at the same
     * saturation and lightness, so the grids stay calm.
     */
    private const HUE_COUNT = 360;
    private const HUE_START = 0;

    /** Icon key for a calculator — memoised per request. */
    public static function keyFor(string $path, string $name = '', string $category = ''): string
    {
        static $cache = [];
        if (isset($cache[$path])) {
            return $cache[$path];
        }
        $haystack = mb_strtolower($name . ' ' . str_replace(['/', '-'], ' ', $path));
        foreach (self::RULES as [$pattern, $glyph]) {
            if (preg_match('~' . str_replace('~', '\~', $pattern) . '~i', $haystack)) {
                return $cache[$path] = $glyph;
            }
        }
        return $cache[$path] = (self::CATEGORY_FALLBACK[$category] ?? 'star');
    }

    /** Stable accent for a calculator, so grids stay varied but on-brand. */
    public static function hueFor(string $path): int
    {
        $step = intdiv(360, self::HUE_COUNT);
        return self::HUE_START + (abs(crc32($path)) % self::HUE_COUNT) * $step;
    }

    /** Render a calculator's icon as inline SVG. */
    public static function forCalculator(array $row, int $size = 24, string $class = 'calc-glyph'): string
    {
        /*
         * A calculator built in the panel carries the icon the author picked in
         * its `icon` column. That choice used to be ignored here — the glyph was
         * always guessed from the name — so an author's "flask" came out as a pH
         * symbol. Honour the stored icon when it names a glyph that exists, and
         * fall back to the keyword rules for everything else (every harvested
         * page, which has no icon column at all).
         */
        $stored = trim((string) ($row['icon'] ?? ''));
        $key = ($stored !== '' && self::has($stored))
            ? $stored
            : self::keyFor((string) ($row['path'] ?? ''), (string) ($row['name'] ?? ''), (string) ($row['cat'] ?? ''));
        return self::svg($key, $size, $class, self::hueFor((string) ($row['path'] ?? '')));
    }

    /**
     * Inline SVG for a glyph. `$hue` tints the stroke through a CSS custom
     * property so one stylesheet rule can theme every icon.
     */
    public static function svg(string $key, int $size = 24, string $class = '', ?int $hue = null): string
    {
        $body = self::GLYPHS[$key] ?? self::GLYPHS['star'];
        $style = $hue === null ? '' : ' style="--icon-hue:' . $hue . '"';
        return sprintf(
            '<svg class="%s"%s width="%d" height="%d" viewBox="0 0 24 24" fill="none" '
            . 'stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" '
            . 'aria-hidden="true" focusable="false">%s</svg>',
            htmlspecialchars($class, ENT_QUOTES),
            $style,
            $size,
            $size,
            $body
        );
    }

    public static function has(string $key): bool
    {
        return isset(self::GLYPHS[$key]);
    }

    /** Used by the icon audit: every rule must point at a real glyph. */
    public static function rules(): array
    {
        return self::RULES;
    }

    public static function glyphKeys(): array
    {
        return array_keys(self::GLYPHS);
    }
}
