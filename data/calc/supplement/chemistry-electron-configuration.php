<?php
/**
 * Electron configuration — the arrangement of electrons for any element.
 *
 * The harvested page had an element picker and three empty boxes: the harvest
 * lost the equation list and with it every answer. The configuration is not a
 * formula with a target to solve for, it is a filling order, so the page builds
 * it here: the aufbau order (1s 2s 2p 3s 3p 4s 3d 4p 5s 4d 5p 6s 4f 5d 6p 7s 5f
 * 6d 7p) up to the element's atomic number, with the twenty-one elements whose
 * ground state breaks that order written out explicitly.
 *
 * The element list is rebuilt here because the harvested options carried random
 * ids rather than atomic numbers, and the page needs the atomic number.
 */
$elements = [
        1 => ['H', 'Hydrogen', 1.008],
        2 => ['He', 'Helium', 4.0026],
        3 => ['Li', 'Lithium', 6.94],
        4 => ['Be', 'Beryllium', 9.0122],
        5 => ['B', 'Boron', 10.81],
        6 => ['C', 'Carbon', 12.011],
        7 => ['N', 'Nitrogen', 14.007],
        8 => ['O', 'Oxygen', 15.999],
        9 => ['F', 'Fluorine', 18.998],
        10 => ['Ne', 'Neon', 20.180],
        11 => ['Na', 'Sodium', 22.990],
        12 => ['Mg', 'Magnesium', 24.305],
        13 => ['Al', 'Aluminium', 26.982],
        14 => ['Si', 'Silicon', 28.085],
        15 => ['P', 'Phosphorus', 30.974],
        16 => ['S', 'Sulfur', 32.06],
        17 => ['Cl', 'Chlorine', 35.45],
        18 => ['Ar', 'Argon', 39.948],
        19 => ['K', 'Potassium', 39.098],
        20 => ['Ca', 'Calcium', 40.078],
        21 => ['Sc', 'Scandium', 44.956],
        22 => ['Ti', 'Titanium', 47.867],
        23 => ['V', 'Vanadium', 50.942],
        24 => ['Cr', 'Chromium', 51.996],
        25 => ['Mn', 'Manganese', 54.938],
        26 => ['Fe', 'Iron', 55.845],
        27 => ['Co', 'Cobalt', 58.933],
        28 => ['Ni', 'Nickel', 58.693],
        29 => ['Cu', 'Copper', 63.546],
        30 => ['Zn', 'Zinc', 65.38],
        31 => ['Ga', 'Gallium', 69.723],
        32 => ['Ge', 'Germanium', 72.630],
        33 => ['As', 'Arsenic', 74.922],
        34 => ['Se', 'Selenium', 78.971],
        35 => ['Br', 'Bromine', 79.904],
        36 => ['Kr', 'Krypton', 83.798],
        37 => ['Rb', 'Rubidium', 85.468],
        38 => ['Sr', 'Strontium', 87.62],
        39 => ['Y', 'Yttrium', 88.906],
        40 => ['Zr', 'Zirconium', 91.224],
        41 => ['Nb', 'Niobium', 92.906],
        42 => ['Mo', 'Molybdenum', 95.95],
        43 => ['Tc', 'Technetium', 98],
        44 => ['Ru', 'Ruthenium', 101.07],
        45 => ['Rh', 'Rhodium', 102.91],
        46 => ['Pd', 'Palladium', 106.42],
        47 => ['Ag', 'Silver', 107.87],
        48 => ['Cd', 'Cadmium', 112.41],
        49 => ['In', 'Indium', 114.82],
        50 => ['Sn', 'Tin', 118.71],
        51 => ['Sb', 'Antimony', 121.76],
        52 => ['Te', 'Tellurium', 127.60],
        53 => ['I', 'Iodine', 126.90],
        54 => ['Xe', 'Xenon', 131.29],
        55 => ['Cs', 'Caesium', 132.91],
        56 => ['Ba', 'Barium', 137.33],
        57 => ['La', 'Lanthanum', 138.91],
        58 => ['Ce', 'Cerium', 140.12],
        59 => ['Pr', 'Praseodymium', 140.91],
        60 => ['Nd', 'Neodymium', 144.24],
        61 => ['Pm', 'Promethium', 145],
        62 => ['Sm', 'Samarium', 150.36],
        63 => ['Eu', 'Europium', 151.96],
        64 => ['Gd', 'Gadolinium', 157.25],
        65 => ['Tb', 'Terbium', 158.93],
        66 => ['Dy', 'Dysprosium', 162.50],
        67 => ['Ho', 'Holmium', 164.93],
        68 => ['Er', 'Erbium', 167.26],
        69 => ['Tm', 'Thulium', 168.93],
        70 => ['Yb', 'Ytterbium', 173.05],
        71 => ['Lu', 'Lutetium', 174.97],
        72 => ['Hf', 'Hafnium', 178.49],
        73 => ['Ta', 'Tantalum', 180.95],
        74 => ['W', 'Tungsten', 183.84],
        75 => ['Re', 'Rhenium', 186.21],
        76 => ['Os', 'Osmium', 190.23],
        77 => ['Ir', 'Iridium', 192.22],
        78 => ['Pt', 'Platinum', 195.08],
        79 => ['Au', 'Gold', 196.97],
        80 => ['Hg', 'Mercury', 200.59],
        81 => ['Tl', 'Thallium', 204.38],
        82 => ['Pb', 'Lead', 207.2],
        83 => ['Bi', 'Bismuth', 208.98],
        84 => ['Po', 'Polonium', 209],
        85 => ['At', 'Astatine', 210],
        86 => ['Rn', 'Radon', 222],
        87 => ['Fr', 'Francium', 223],
        88 => ['Ra', 'Radium', 226],
        89 => ['Ac', 'Actinium', 227],
        90 => ['Th', 'Thorium', 232.04],
        91 => ['Pa', 'Protactinium', 231.04],
        92 => ['U', 'Uranium', 238.03],
        93 => ['Np', 'Neptunium', 237],
        94 => ['Pu', 'Plutonium', 244],
        95 => ['Am', 'Americium', 243],
        96 => ['Cm', 'Curium', 247],
        97 => ['Bk', 'Berkelium', 247],
        98 => ['Cf', 'Californium', 251],
        99 => ['Es', 'Einsteinium', 252],
        100 => ['Fm', 'Fermium', 257],
        101 => ['Md', 'Mendelevium', 258],
        102 => ['No', 'Nobelium', 259],
        103 => ['Lr', 'Lawrencium', 266],
        104 => ['Rf', 'Rutherfordium', 267],
        105 => ['Db', 'Dubnium', 268],
        106 => ['Sg', 'Seaborgium', 269],
        107 => ['Bh', 'Bohrium', 270],
        108 => ['Hs', 'Hassium', 270],
        109 => ['Mt', 'Meitnerium', 278],
        110 => ['Ds', 'Darmstadtium', 281],
        111 => ['Rg', 'Roentgenium', 282],
        112 => ['Cn', 'Copernicium', 285],
        113 => ['Nh', 'Nihonium', 286],
        114 => ['Fl', 'Flerovium', 289],
        115 => ['Mc', 'Moscovium', 290],
        116 => ['Lv', 'Livermorium', 293],
        117 => ['Ts', 'Tennessine', 294],
        118 => ['Og', 'Oganesson', 294],
];

$options = [];
foreach ($elements as $z => $el) {
    $options[] = ['uid' => 'sup-el-' . $z, 'label' => $el[1] . ' (' . $el[0] . ')', 'value' => (string) $z];
}

/* the three lookups the page script needs, written as JS literals */
$names = $symbols = $masses = [];
foreach ($elements as $z => $el) {
    $symbols[] = $z . ": '" . $el[0] . "'";
    $names[]   = $z . ": '" . $el[1] . "'";
    $masses[]  = $z . ': ' . $el[2];
}
$bySymbol = [];
foreach ($elements as $z => $el) {
    $bySymbol[] = $el[0] . ': ' . $z;
}
$jsData = "var ELEMENT_SYMBOL = {" . implode(', ', $symbols) . "};\n"
        . "var ELEMENT_NAME = {" . implode(', ', $names) . "};\n"
        . "var ATOMIC_MASS = {" . implode(', ', $masses) . "};\n"
        . "var SYMBOL_TO_Z = {" . implode(', ', $bySymbol) . "};\n";

return [
    'hideTexts' => true,
    /* the two blank text boxes go; the picker stays and is re-pointed at the new list */
    'remove' => ['conf_long', 'conf_short'],
    'datasets' => [
        'supp_elements' => ['type' => 'list', 'uiType' => 'DROPDOWN', 'options' => $options],
    ],
    'vars' => [
        'element' => ['type' => 'valueSelect', 'datasetUid' => 'supp_elements'],
        'atomic_number' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'atomic_mass' => ['type' => 'dependent', 'rnd' => ['standard', '4']],
        'outer_electrons' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
        'shells' => ['type' => 'dependent', 'rnd' => ['standard', '0']],
    ],
    'groups' => [[
        'uid' => 'supp-el-results', 'title' => 'Results', 'desc' => '',
        'm' => [
            ['FR1', [[['t' => 'v', 'n' => 'atomic_number', 'vt' => 'dependent', 'l' => 'Atomic number Z']]]],
            ['FR1', [[['t' => 'v', 'n' => 'atomic_mass', 'vt' => 'dependent', 'l' => 'Standard atomic weight (u)']]]],
            ['FR1', [[['t' => 'v', 'n' => 'outer_electrons', 'vt' => 'dependent', 'l' => 'Electrons in the outermost shell']]]],
            ['FR1', [[['t' => 'v', 'n' => 'shells', 'vt' => 'dependent', 'l' => 'Number of occupied shells']]]],
        ],
    ]],
    'js' => $jsData . <<<'JS'
/* the order electrons fill in, and how many each subshell holds */
var ORDER = ['1s', '2s', '2p', '3s', '3p', '4s', '3d', '4p', '5s', '4d', '5p',
             '6s', '4f', '5d', '6p', '7s', '5f', '6d', '7p'];
var CAP = { s: 2, p: 6, d: 10, f: 14 };
var ORB = ['s', 'p', 'd', 'f'];

/* ground-state configurations that the filling order does not produce */
var EXCEPTIONS = {
  24: '1s2 2s2 2p6 3s2 3p6 3d5 4s1',
  29: '1s2 2s2 2p6 3s2 3p6 3d10 4s1',
  41: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d4 5s1',
  42: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d5 5s1',
  44: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d7 5s1',
  45: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d8 5s1',
  46: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d10',
  47: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d10 5s1',
  57: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d10 5s2 5p6 5d1 6s2',
  58: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d10 5s2 5p6 4f1 5d1 6s2',
  64: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d10 5s2 5p6 4f7 5d1 6s2',
  78: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d10 5s2 5p6 4f14 5d9 6s1',
  79: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d10 5s2 5p6 4f14 5d10 6s1',
  89: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d10 5s2 5p6 4f14 5d10 6s2 6p6 6d1 7s2',
  90: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d10 5s2 5p6 4f14 5d10 6s2 6p6 6d2 7s2',
  91: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d10 5s2 5p6 4f14 5d10 6s2 6p6 5f2 6d1 7s2',
  92: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d10 5s2 5p6 4f14 5d10 6s2 6p6 5f3 6d1 7s2',
  93: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d10 5s2 5p6 4f14 5d10 6s2 6p6 5f4 6d1 7s2',
  96: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d10 5s2 5p6 4f14 5d10 6s2 6p6 5f7 6d1 7s2',
  103: '1s2 2s2 2p6 3s2 3p6 3d10 4s2 4p6 4d10 5s2 5p6 4f14 5d10 6s2 6p6 5f14 7s2 7p1'
};

/* the noble gas each shorthand starts from */
var NOBLE = [[2, 'He'], [10, 'Ne'], [18, 'Ar'], [36, 'Kr'], [54, 'Xe'], [86, 'Rn']];

function fill(z) {
  var left = z;
  var out = [];
  for (var i = 0; i < ORDER.length && left > 0; i++) {
    var sub = ORDER[i];
    var cap = CAP[sub.charAt(1)];
    var n = Math.min(cap, left);
    out.push(sub + n);
    left -= n;
  }
  return out;
}

/* Which element is chosen: the harvested option ids are not atomic numbers, so
   the picker's own label — "Iron (Fe)" — is read back and mapped to Z. */
function chosenZ(values) {
  var sel = document.querySelector('select[data-var="element"]');
  if (sel && sel.selectedIndex >= 0) {
    var text = sel.options[sel.selectedIndex].text || '';
    var sym = (text.match(/\(([A-Za-z]{1,2})\)/) || [])[1];
    if (sym && SYMBOL_TO_Z[sym]) { return SYMBOL_TO_Z[sym]; }
  }
  var raw = Number(values.element);
  return isFinite(raw) && raw >= 1 && raw <= 118 ? Math.round(raw) : null;
}

omni.onResult(['element'], function (ctx, v) {
  var z = chosenZ(v);
  if (z === null) {
    ctx.addUnmetCondition('Choose an element.');
    return;
  }

  var config = EXCEPTIONS[z] ? EXCEPTIONS[z].split(' ') : fill(z);

  /* Convention writes a configuration by principal quantum number, not by filling
     order: 3d6 4s2 rather than 4s2 3d6. Sorting is only cosmetic, and it happens
     after the filling, so the shells still count correctly. */
  function sortTerms(list) {
    return list.slice().sort(function (a, b) {
      var na = Number(a.charAt(0)), nb = Number(b.charAt(0));
      if (na !== nb) { return na - nb; }
      return ORB.indexOf(a.charAt(1)) - ORB.indexOf(b.charAt(1));
    });
  }
  function subshellOf(term) { return term.charAt(0) + term.charAt(1); }
  config = sortTerms(config);

  /* electrons per shell, from the principal quantum number in each term */
  var shells = [];
  var outerEnergy = 0;
  config.forEach(function (term) {
    var n = Number(term.charAt(0));
    var count = Number(term.slice(2));
    shells[n - 1] = (shells[n - 1] || 0) + count;
    if (n > outerEnergy) { outerEnergy = n; }
  });
  var occupied = shells.filter(function (x) { return x; }).length;
  var outer = shells[outerEnergy - 1] || 0;

  /* the shorthand: everything up to the largest noble gas below Z */
  var core = null;
  for (var i = 0; i < NOBLE.length; i++) {
    if (NOBLE[i][0] < z) { core = NOBLE[i]; }
  }
  var shortForm = config.join(' ');
  if (core) {
    var coreConfig = sortTerms(EXCEPTIONS[core[0]] ? EXCEPTIONS[core[0]].split(' ') : fill(core[0]));
    var coreNames = {};
    coreConfig.forEach(function (t) { coreNames[subshellOf(t)] = true; });
    var rest = config.filter(function (t) { return !coreNames[subshellOf(t)]; });
    shortForm = '[' + core[1] + '] ' + rest.join(' ');
  }

  /*
   * Which block of the periodic table. The block is the subshell the element's
   * own period is filling — the last one in filling order — except in the two f
   * rows, where the f subshell is the block even when a 5d electron is present.
   */
  var block = 's';
  if ((z >= 57 && z <= 71) || (z >= 89 && z <= 103)) {
    block = 'f';
  } else {
    var best = -1;
    config.forEach(function (t) {
      var idx = ORDER.indexOf(subshellOf(t));
      if (idx > best && Number(t.slice(2)) > 0) { best = idx; block = t.charAt(1); }
    });
  }
  var noble = z === 2 || z === 10 || z === 18 || z === 36 || z === 54 || z === 86 || z === 118;

  ctx.exportValue('atomic_number', z);
  ctx.exportValue('atomic_mass', ATOMIC_MASS[z]);
  ctx.exportValue('outer_electrons', outer);
  ctx.exportValue('shells', occupied);

  ctx.addHtml('<p><strong>Z = ' + z + ': ' + shortForm + '</strong> — written out in full, '
    + config.join(' ') + '.</p>');

  var rows = [
    ['Element', ELEMENT_NAME[z] + ' (' + ELEMENT_SYMBOL[z] + ')'],
    ['Atomic number', String(z)],
    ['Standard atomic weight', snum(ATOMIC_MASS[z], 4) + ' u'],
    ['Full configuration', config.join(' ')],
    ['Shorthand', shortForm],
    ['Electrons per shell', shells.join(', ')],
    ['Outermost shell', outer + ' electron' + (outer === 1 ? '' : 's')],
    ['Block', block + '-block'],
    ['Group', noble ? '18 (noble gas)' : 'see the periodic table for Z = ' + z]
  ];
  ctx.addHtml(stable(['Item', 'Value'], rows));

  ctx.addHtml('<p class="calc-unmet">Electrons fill the lowest available subshell first: '
    + '1s 2s 2p 3s 3p 4s 3d 4p 5s 4d 5p 6s 4f 5d 6p 7s 5f 6d 7p, each s holding 2, p 6, d 10 and f 14. '
    + '4s fills before 3d, which is why the fourth period starts at potassium and not at scandium. '
    + 'Twenty-one elements do not follow the order in their ground state — chromium and copper are the '
    + 'familiar ones, a half-filled or full d subshell being worth more than the strict sequence — and '
    + 'those are written out here rather than filled. Atomic weights are the standard values; for the '
    + 'elements with no stable isotope the mass number of the longest-lived isotope is used.</p>');
});
JS,
];
