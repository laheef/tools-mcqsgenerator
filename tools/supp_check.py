#!/usr/bin/env python3
"""Fill the hand-repaired pages, press Calculate, and print what came back.

Each entry names one page and the values to type, so the check exercises the
arithmetic rather than just the presence of a form.
"""
import sys, json, multiprocessing as mp
from playwright.sync_api import sync_playwright

BASE = 'http://127.0.0.1:8080'

CASES = {
    '/statistics/pie-chart': ({'group_A': '10', 'group_B': '20', 'group_C': '30'}, 60),
    '/statistics/pie-chart-angle': ({'group_A': '90', 'group_B': '180', 'group_C': '90'}, 90),
    '/statistics/pie-chart-percentage': ({'group_A': '25', 'group_B': '75'}, 25),
    '/statistics/probability-fraction': ({'group_A': '3', 'group_B': '1'}, 3),
    '/statistics/relative-frequency': ({'sample_size': '5', 'n_1': '1', 'n_2': '2', 'n_3': '2',
                                        'n_4': '3', 'n_5': '2'}, 2),
    '/statistics/frequency-distribution': ({'sample_size': '5', 'n_1': '4', 'n_2': '4',
                                            'n_3': '5', 'n_4': '6', 'n_5': '4'}, 4),
    '/statistics/ordering-numbers': ({'how_many': '4', 'course_1': '5', 'course_2': '1',
                                      'course_3': '9', 'course_4': '3'}, 1),
    '/statistics/grouped-data-standard-deviation': ({'ranges': '2', 'r1': '0', 'r1max': '10',
                                                     'f1': '3', 'r2': '10', 'r2max': '20',
                                                     'f2': '2'}, 10),
    '/sports/bike-gear-calculator': ({'chainring_min': '34', 'chainring_max': '50',
                                      'cog_min': '11', 'cog_max': '32',
                                      'wheel_diameter': '622'}, 34),
    '/sports/triathlon-target-heart-rate': ({'mhr': '190', 'rhr': '50'}, 190),
    '/other/harmonic-series': ({'note_name': '9', 'octave': '4', 'number': '6'}, 440),
    '/math/sum-of-digits': ({'n_1': '1234', 'n_2': '99'}, 1234),
    '/math/bessel-function': ({'v': '0', 'x': '2.4048'}, 0),
    '/other/grade-curve': ({'method_VS': 'Linear rescaling',
                             'linear_scale_option_VS': 'Adjust to highest grade',
                             'highest_grade': '100', 'grade1': '60', 'grade2': '70',
                             'grade3': '80', 'grade4': '90'}, 4),
    '/statistics/benfords-law': ({'model': 'A raw sample', 'numbers': '5', 'a0': '123',
                                   'a1': '2345', 'a2': '117', 'a3': '1999', 'a4': '1500'}, 5),
    '/conversion/hardness-conversion': ({'hardness_type': 'Brinell Hardness (HB)', 'hb': '200'}, 15),
    '/statistics/betrand-paradox': ({'number_sim': '100'}, 100),
    '/math/associative-property': ({'operation': 'addition', 'a': '2', 'b': '3', 'c': '4'}, 9),
    '/math/foil': ({'mode_select': 'Linear binomials', 'a1': '2', 'a0': '3',
                    'b1': '4', 'b0': '5'}, 8),
    '/physics/quantum-number': ({'type': 'Principal quantum number', 'n': '3'}, 9),
    '/finance/stock-average': ({'q1': '10', 'p1': '10', 'q2': '1', 'p2': '100'}, 18.1818),
    '/math/perfect-square-trinomial': ({'a': '4', 'b': '12', 'c': '9'}, 0),
    '/math/expanding-logarithms': ({'operation': 'logₙ(a × b)', 'n': '2', 'aMult': '8',
                                    'bMult': '4'}, 5),
    '/math/common-factor': ({'number': '36', 'number2': '60'}, 12),
    '/math/harmonic-number': ({'n': '5'}, 2.2833),
    '/math/graphing-quadratic-inequalities': ({'a': '1', 'b': '-5', 'c': '6'}, 2),
    '/finance/us-income-percentile': ({'income': '60000'}, 60000),
    '/biology/dog-metacam': ({'weight': '10'}, 10),
    '/math/linear-independence': ({'noOfRows': '2', 'noOfColumns': '2', 'a1': '1', 'a2': '2',
                                   'b1': '2', 'b2': '4'}, 1),
    '/math/standard-form-to-slope-intercept-form': ({'calculation_mode': 'Standard form to slope intercept form',
                                                     'coefficient_A': '2', 'coefficient_B': '4',
                                                     'coefficient_C': '-8'}, -0.5),
    '/math/multiply-complex-numbers': ({'form1': 'a + bi', 'form2': 'a + bi', 'a1': '1',
                                        'b1': '2', 'a2': '3', 'b2': '4'}, -5),
    '/math/divide-complex-numbers': ({'form1': 'a + bi', 'form2': 'a + bi', 'a1': '1',
                                      'b1': '2', 'a2': '3', 'b2': '-4'}, -0.2),
    '/other/gender-wage-gap': ({'country': 'Australia', 'sex': 'Woman', 'salary': '50000'}, 11.4),
    '/statistics/coin-flip-streak': ({'flips': '10', 'heads': '3',
                                      'rules': 'exactly'}, 0.117188),
    '/math/line-equation-from-two-points': ({'model': '2D', 'x1': '1', 'y1': '2',
                                             'x2': '3', 'y2': '6'}, 2),
    '/math/systems-of-equations': ({'noOfVars': '2', 'a1': '2', 'b1': '1', 'c1': '5',
                                    'a2': '1', 'b2': '-1', 'c2': '1'}, 2),
    '/math/completing-the-square': ({'a': '1', 'b': '-6', 'c': '5', 'precision': '4'}, 3),
    '/math/completing-the-square-practice': ({'a': '1', 'b': '-6', 'c': '5', 'precision': '4'}, 3),
    '/math/completing-the-square-works': ({'a': '1', 'b': '-6', 'c': '5', 'precision': '4'}, 3),
    '/math/solving-by-completing-the-square': ({'a': '1', 'b': '-6', 'c': '5', 'precision': '4'}, 3),
    '/math/integration-by-completing-the-square': ({'a': '1', 'b': '0', 'c': '4', 'precision': '4'}, 2),
    '/math/scientific-notation-converter': ({'input_decimal': '0.00042'}, 4.2),
    '/math/lowest-term': ({'option_mixed': 'standard form', 'n': '36', 'd': '60'}, 3),
    '/math/line-of-intersection-of-two-planes': ({'a1': '1', 'b1': '1', 'c1': '1', 'd1': '1',
                                                  'a2': '1', 'b2': '-1', 'c2': '1', 'd2': '1'}, -2),
    '/other/vocal-range': ({'low_note': 'E2', 'high_note': 'E4'}, 24),
    '/physics/resistor-color-code': ({'number': 'Four', 'band1': '1 - Brown', 'band2': '0 - Black',
                                      'multiplier': 'x100Ω - Red', 'tolerance': '±1% - Brown'}, 1000),
    '/math/simplify-radicals': ({'option': 'Basic radical', 'a_var': '1', 'b_var': '72',
                                 'n_var': '2'}, 6),
    '/math/vertex-form': ({'options_VS': 'Convert from standard to vertex form',
                           'a_standard': '1', 'b': '-6', 'c': '5'}, 3),
    '/math/polynomial-graphing': ({'degP': '2', 'a0': '-6', 'a1': '1', 'a2': '1'}, -6),
    '/math/chinese-remainder': ({'noOfEqs': '2', 'a1': '2', 'n1': '3', 'a2': '3', 'n2': '5'}, 8),
    '/math/cubic-equation': ({'a3': '1', 'a2': '-6', 'a1': '11', 'a0': '-6', 'precision': '4'}, 1),
    '/other/key-signature': ({'option': 'key signature', 'accidentals_type': 'Sharps',
                              'accidentals': '2', 'key_quality': 'Major'}, 2),
    '/conversion/coordinates-converter': ({'what_to_convert': 'DD - decimal degrees',
                                            'lat_dd': '54.6872', 'long_dd': '25.2797'}, 54.6872),
    '/everyday-life/week': ({'firstDay': '2026-01-01', 'lastDay': '2026-03-01'}, 59),
    '/everyday-life/palindrome-date': ({'start_date': '2020-01-01', 'end_date': '2020-12-31',
                                        'date_format_VS': 'Day-Month-Year (D-M-Y)',
                                        'choice_VS': 'find all palindrome dates between…',
                                        'dates_with_leading_zeros_checkbox': 'Show dates with leading 0s'}, 1),
    '/math/interval-notation': ({'type': 'Inequality to interval', 'sides': 'Two-sided',
                                 'two_sided': 'a < x < b', 'aa_var': '2', 'bb_var': '7'}, 2),
    '/math/inequality-to-interval-notation': ({'type': 'Interval to inequality',
                                               'interval': '(a, b]', 'c': '3', 'd': '9'}, 3),
    '/math/intersection-of-two-lines': ({'dim': '2D', 'form1': 'Slope-intercept (y = ax + b)',
                                         'A1': '2', 'C1': '1', 'form2': 'Slope-intercept (y = ax + b)',
                                         'A2': '-1', 'C2': '4'}, 1),
    '/everyday-life/glove-size': ({'gender': '♂ Man / Unisex', 'hand_circumference': '9.0 in or 23.0 cm'}, 9),
    '/everyday-life/dress-size': ({'bust': '86-89 cm (33.5-35 in)', 'waist': '69-72 cm (26.5-28 in)',
                                   'hips': '95-97 cm (37-38 in)'}, 38),
    '/statistics/critical-value': ({'which_test': 'Z (standard normal)', 'alt': 'Two-tailed',
                                    'alpha': '0.05'}, 1.959964),
    '/health/water-intake': ({'child_adult': 'Adult', 'gender': 'Male'}, 3.7),
    '/health/blood-donor': ({'action': 'donate', 'material': 'Blood', 'blood_type': '0-'}, 8),
    '/health/alzheimers-life-expectancy': ({'stage': 'Moderate cognitive decline'}, 2),
    '/food/steak-cook-time': ({'method': 'Grill', 'doneness': 'Medium Rare', 'thickness': '1" (2.54 cm)'}, 3),
    '/food/cake-serving': ({'people_number': '20', 'cake_shape_VS': 'round'}, 39.1),
    '/health/benadryl': ({'age': '30', 'type': 'Benadryl® Allergy ULTRATAB'}, 25),
    '/construction/boiler-size': ({'boiler': 'Combi', 'age': '2000 onwards (well insulated)',
                                   'bedroomBaths': '3 bedrooms + 2 bathrooms'}, 15.5),
    '/physics/slenderness-ratio': ({'L': '3000', 'end_condition': 'Pinned - Pinned',
                                    'inertia_select': 'Rectangle', 'b_rectangle': '100',
                                    'h_rectangle': '200'}, 3000),
    '/math/latus-rectum': ({'Shape': 'Ellipse', 'ellA': '5', 'ellB': '3'}, 3.6),
    '/math/prime-number': ({'number': '97'}, 97),
    '/math/perfect-cube': ({'numb': '27'}, 27),
    '/math/powers-of-i': ({'n': '18'}, 18),
    '/math/greater-less': ({'first_number': '5', 'second_number': '2'}, 5),
    '/math/triangle-inequality': ({'side_length_a': '3', 'side_length_b': '4',
                                   'side_length_c': '5'}, 3),
    '/math/multiplicative-inverse-modulo': ({'a': '3', 'm': '11'}, 3),
    '/math/linear-combination': ({'a1': '2', 'b1': '1', 'c1': '5', 'a2': '1',
                                  'b2': '-1', 'c2': '1'}, 2),
    '/sports/bench-press-pyramid': ({'rep_max': '100', 'pyramid_type': 'Ascending',
                                     'no_sets_single': '4'}, 100),
    '/everyday-life/bed-size': ({'height': '180', 'us_eu': 'Europe (cm)'}, 200),
    '/finance/off-day': ({'country': 'United Kingdom', 'contract': 'Part-time',
                          'hours_per_week': '20'}, 112),
    '/health/pecarn': ({'age': '<2 years', 'gcsBasilar': 'No', 'gcsSkull': 'No',
                        'hematoma': 'Yes', 'historyOf': 'No'}, 4.4),
    '/ecology/eco-friendly-bags': ({'bag_type': 'cotton / material bag', 'times': '60',
                                    'thrown': '10'}, 131),
    '/chemistry/electron-configuration': ({'element': 'Iron (Fe)'}, 26),
    '/health/baby-formula': ({'age': '3', 'weight': '6'}, 900),
    '/biology/dog-life-expectancy': ({'dog_age': '4',
        'breed_size': 'Medium — 10 to 25 kg (Border collie, Labrador)'}, 32.6),
    '/construction/bolt-circle': ({'radius': '100', 'n': '6', 'a': '10'}, 100),
    '/math/magic-square': ({'size': '3'}, 15),
    '/math/scatter-plot': ({'points': '5', 'x1': '1', 'y1': '2', 'x2': '2', 'y2': '4.1',
                            'x3': '3', 'y3': '5.9', 'x4': '4', 'y4': '8.2',
                            'x5': '5', 'y5': '9.8'}, 1.97),
    '/physics/universe-expansion': ({'h0': '67.4', 'distance_mpc': '100'}, 6740),
    '/everyday-life/binge-watching': ({'episodes': '10', 'minutes_per_episode': '50',
                                       'hours_per_day': '2.5'}, 8.3),
    '/everyday-life/quarantine-books': ({'pages_per_day': '40', 'days': '14',
                                         'pages_per_book': '320'}, 1.8),
    '/health/ireland-vaccine-queue': ({'supp_population': '1000000', 'supp_doses_per_day': '20000',
                                       'supp_doses_per_person': 'Two doses per person'}, 2000000),
    '/everyday-life/age': ({'start_date': '1990-05-10', 'end_date': '2026-10-31'}, 36),
    '/health/baby-percentile': ({'Age': '0.5', 'Weight': '6.5', 'Height': '64',
                                 'head_circumference': '41.5', 'Sex': 'girl'}, 15.9),
    '/other/chord-finder': ({'note1_VS': 'C', 'note2_VS': 'E', 'note3_VS': 'G'}, 3),
    '/other/chord-transposer': ({'chord_root': 'C', 'chord_shape': 'Major (maj)',
                                 'interval': 'Perfect fourth (5)'}, 5),
    '/other/zombie-invasion': ({'initial_humans': '1000000', 'initial_zombies': '1',
                                'attack_frequency': '3', 'human_conversion_rate': '90',
                                'zombie_resurrection_rate': '20'}, 999999),
    '/other/humans-vs-vampires': ({'initial_human': '1000000', 'initial_vampire': '100',
                                   'initial_slayer': '500', 'b_scale': '50'}, 999003),
    '/finance/interest-rate': ({'payment_subject_VS': 'interest rate on deposit', 'payment_term': '5',
                                'initial_deposit': '10000', 'current_balance': '12000',
                                'compound_frequency_VS': 'Yearly'}, 3.7137),
    '/other/music-transposer': ({'transposition_mode': 'by interval (semitones).',
                                 'interval': 'Perfect fourth (5)', 'up_down': 'Up',
                                 'note1': 'C ', 'note2': 'D ', 'note3': 'E ',
                                 'numb_of_notes': '3'}, 5),
    '/math/corner-point': ({'px': '3', 'py': '2', 'min_max': 'Maximize', 'n_constraints': '2',
                            'a1': '1', 'b1': '1', 'c1': '4', 'i1': '≤',
                            'a2': '1', 'b2': '3', 'c2': '6', 'i2': '≤'}, 12),
    '/health/baby-eye-color': ({'mother': 'Blue ', 'father': 'Blue '}, 100),
    '/food/coffee-kick': ({'wake_up_time': '07:00', 'dose_time1': '08:00', 'dose_time2': '14:00',
                           'sleep_length': '7 hours'}, 147),
    '/food/chilled-drink': ({'drink_type_VS': 'Beer',
                             'initial_temperature_VS': 'Hot summer day (30 °C/86 °F)',
                             'ambient_temperature_VS': 'Fridge (4 °C/39 °F)'}, 82),
    '/statistics/parrondo-paradox': ({'order': 'A, B, A, B, A, ...', 'numberOfGames': '100',
                                      'totalRuns': '1000'}, 0.42),
    '/sports/triathlon-training': ({'target_distance': 'Olympic',
                                    'athletic_background': 'Modest background',
                                    'race_goal': 'Finish'}, 4),
    '/everyday-life/sunglasses': ({'forehead_width': '140', 'cheeks_width': '145',
                                    'jawline_length': '120', 'face_length': '190',
                                    'sharpness': 'Sharp', 'gender': 'Female'}, 56),
    '/health/tylenol-dosage': ({'usage': 'Headache and muscle pain'}, 3250),
    '/finance/student-loan-forgiveness': ({'annual_income': '45000',
                                           'student_debt_outstanding': '30000',
                                           'filing_status': 'Single'}, 40.78),
    '/other/school-age': ({'birthdayDate': '2019-04-15', 'country_VS': 'United States (USA)',
                           'state_VS': 'Texas'}, 19967),
    '/statistics/boy-or-girl-paradox': ({'prob_mode': 'Select', 'question': 'Question 1',
                                         'chance_list_1': '50%'}, 0.3333),
}

JS_FILL = """
(args) => {
  const [values, count] = args;
  const w = document.querySelector('.calc-widget');
  if (!w) return false;
  const set = (sel, v) => {
    const el = w.querySelector(sel);
    if (!el) return false;
    el.value = v;
    el.dispatchEvent(new Event('input', {bubbles: true}));
    el.dispatchEvent(new Event('change', {bubbles: true}));
    return true;
  };
  Object.keys(values).forEach(name => {
    // a two-state valueSelect is drawn as a checkbox, not a text box
    const box = w.querySelector('input[data-var-check="' + name + '"]');
    if (box) {
      box.checked = values[name] !== '' && values[name] !== 'no';
      box.dispatchEvent(new Event('change', {bubbles: true}));
      return;
    }
    if (set('input[data-var="' + name + '"]', values[name])) return;
    const radios = [...w.querySelectorAll('input[type=radio][name="' + name + '"]')];
    if (radios.length) {
      const norm = t => (t || '').replace(/\s+/g, ' ').trim();
      const hit = radios.find(r => norm(r.parentNode.innerText) === norm(values[name]))
        || radios.find(r => r.value === values[name])
        || (/^\d+$/.test(values[name]) ? radios[Number(values[name])] : null);
      if (hit) { hit.checked = true; hit.dispatchEvent(new Event('change', {bubbles: true})); }
      return;
    }
    const sel = w.querySelector('select[data-var="' + name + '"]');
    if (!sel) return;
    const opt = [...sel.options].find(o => o.value === values[name])
      || [...sel.options].find(o => o.text.trim() === String(values[name]).trim());
    if (opt) { sel.value = opt.value; sel.dispatchEvent(new Event('change', {bubbles: true})); }
  });
  /*
   * A choice with no stored default now opens unanswered — the brief's "no
   * default values" — so a case that only lists the text boxes leaves the radio
   * group empty and Calculate answers with a Required note. Pick the first
   * option of any group the case did not name, which is what a visitor does.
   */
  const seen = {};
  [...w.querySelectorAll('input[type=radio][name]')].forEach(r => {
    if (seen[r.name]) return;
    seen[r.name] = true;
    const group = [...w.querySelectorAll('input[type=radio][name="' + r.name + '"]')];
    if (group.some(x => x.checked)) return;
    const first = group.filter(x => !x.disabled)[0];
    if (first) { first.checked = true; first.dispatchEvent(new Event('change', {bubbles: true})); }
  });
  return true;
}
"""

READ = """
() => {
  const w = document.querySelector('.calc-widget');
  const vis = el => el.getBoundingClientRect().height > 0;
  return {
    state: w ? w.getAttribute('data-results') : 'nowidget',
    rows: [...w.querySelectorAll('[data-result-row]')].filter(vis)
      .map(r => r.innerText.replace(/\\s+/g, ' ').trim()).slice(0, 8),
    values: [...w.querySelectorAll('[data-result-row] input')].map(i => i.value).slice(0, 8),
    tables: [...w.querySelectorAll('.calc-script-output table')].filter(vis)
      .map(t => t.innerText.replace(/\\s+/g, ' ').trim()).slice(0, 2),
    notes: [...w.querySelectorAll('.calc-script-output .calc-unmet')].filter(vis)
      .map(n => n.innerText.trim()).slice(0, 2),
    unmet: [...w.querySelectorAll('.calc-unmet')].filter(vis).map(n => n.innerText.trim()).slice(0, 3),
    errors: [...w.querySelectorAll('.calc-error')].filter(vis).map(e => e.textContent.trim()).slice(0, 4)
  };
}
"""

def check(pg, path):
    values, count = CASES[path]
    rec = {'path': path}
    try:
        pg.goto(BASE + path, wait_until='load', timeout=30000)
        pg.evaluate(JS_FILL, [values, count])
        # A field that changes how many boxes the page shows rebuilds those
        # boxes, so the second pass types into the real ones.
        pg.wait_for_timeout(120)
        pg.evaluate(JS_FILL, [values, count])
        pg.eval_on_selector('.calc-go', 'e => e.click()')
        pg.wait_for_timeout(250)
        rec.update(pg.evaluate(READ))
        rec['ok'] = rec['state'] == 'shown'
    except Exception as exc:                                   # pragma: no cover
        rec['ok'] = False
        rec['error'] = str(exc)[:160]
    return rec

def work(paths):
    with sync_playwright() as p:
        b = p.chromium.launch()
        pg = b.new_page()
        out = [check(pg, x) for x in paths]
        b.close()
        return out

def main():
    paths = sys.argv[1:] or list(CASES)
    groups = [paths[i::3] for i in range(3)] if len(paths) > 3 else [paths]
    with mp.Pool(len(groups)) as pool:
        results = [r for part in pool.map(work, groups) for r in part]
    bad = 0
    for rec in sorted(results, key=lambda r: r['path']):
        if not rec['ok']:
            bad += 1
            print('FAIL', rec['path'], rec.get('state'), rec.get('errors') or rec.get('error'))
            continue
        print('ok  ', rec['path'], '|', ' / '.join(rec['values'])[:90])
        for t in rec['tables']:
            print('        table:', t[:170])
        for n in rec['notes']:
            print('        note :', n[:170])
    print(f"\n{len(results) - bad}/{len(results)} answered")
    return 1 if bad else 0

if __name__ == '__main__':
    raise SystemExit(main())
