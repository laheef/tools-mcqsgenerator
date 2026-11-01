#!/usr/bin/env python3
"""Wire harvested page scripts whose functions were never connected to anything.

On 74 pages the reference's own JavaScript survived the harvest but the equation
list did not, so `omni.define("get_n_operated", function (n1, d1, n2, d2, operator) …)`
sat there unused: the form could be filled in and the Calculate button answered
nothing.

This script reads those definitions and writes a supplement with `eq` entries,
one per function whose name (or name minus its get_/solve_ prefix) matches a
variable in the page and whose parameters are all variables of the page. The
parameter names are the reference's own, so an entry that names them wrongly is
visibly wrong rather than silently so — and every generated page is checked in a
browser afterwards by tools/supp_check.py.

Usage:  python3 tools/gen_eq.py [--write] [path …]
"""
import glob
import json
import os
import re
import sys

RECORD_GLOB = 'php-clone/data/calc/batch-*.ndjson'
SUPPLEMENT_DIR = 'php-clone/data/calc/supplement'
PREFIXES = ('get', 'solve', 'find', 'calc', 'compute')


def load_records():
    recs = {}
    for path in glob.glob(RECORD_GLOB):
        for line in open(path, encoding='utf-8'):
            try:
                rec = json.loads(line)
            except json.JSONDecodeError:
                continue
            recs[rec.get('path')] = rec
    return recs


def functions(js):
    """Every omni.define(name, function (a, b) …) in a page script."""
    out = []
    pattern = re.compile(r'omni\.define\(\s*"([^"]+)"\s*,\s*function\s*\(([^)]*)\)')
    for name, args in pattern.findall(js or ''):
        params = [a.strip() for a in args.split(',') if a.strip()]
        if params and all(re.fullmatch(r'[A-Za-z_][A-Za-z0-9_]*', p) for p in params):
            out.append((name, params))
    return out


def normalise(name):
    low = name.lower().replace('_', '')
    for prefix in PREFIXES:
        if low.startswith(prefix) and len(low) > len(prefix) + 1:
            return low[len(prefix):]
    return low


def matches(fn_name, var_names):
    """Which page variable does this function compute, if any?"""
    by_key = {normalise(v): v for v in var_names}
    hit = by_key.get(normalise(fn_name))
    if hit:
        return hit
    # `from_hb_to_hrc` computes `hb_to_hrc`: the converter names read "from A
    # to B", the variable it fills is called "A_to_B".
    m = re.match(r'from_?([a-z0-9]+)_?to_?([a-z0-9]+)$', fn_name, re.I)
    if m:
        hit = by_key.get(normalise('%s_to_%s' % (m.group(1), m.group(2))))
        if hit:
            return hit
    return None


def resolve_param(param, var_names):
    """The field a function parameter means, if the page has one.

    `_startDate` is a parameter name with a leading underscore, `type` is the
    reference's short name for `hardness_type`: both name a real field, and a
    guess is only made when exactly one field can be meant.
    """
    if param in var_names:
        return param
    bare = param.lstrip('_')
    if bare in var_names:
        return bare
    key = normalise(bare)
    hits = [v for v in var_names if normalise(v) == key]
    if len(hits) == 1:
        return hits[0]
    hits = [v for v in var_names if normalise(v).endswith(key) or normalise(v).startswith(key)]
    if len(hits) == 1 and len(key) >= 3:
        return hits[0]
    return None


#: Functions whose name says nothing about the variable they fill. Each one was
#: read in the page script and the target identified by hand; the entry is only
#: used when the parameters resolve to real fields.
MANUAL = {
    '/math/harmonic-number': {'H0': 'num', 'H1': 'denum', 'Hround': 'rounded'},
    '/sports/triathlon-training': {'getMonths': 'trainingMonths'},
    '/math/graphing-quadratic-inequalities': {'solveCuadratic_1stRoot': 'root1',
                                              'solveCuadratic_2ndRoot': 'root2'},
    '/finance/us-income-percentile': {'getIndPerc': 'inc_per_ind',
                                      'getHouseholdPerc': 'inc_per_household'},
    '/health/baby-percentile': {'firstWeightPercentile': 'weightPercentile',
                                'secondWeightPercentile': 'weightPercentile2',
                                'firstHeightPercentile': 'heightPercentile',
                                'secondHeightPercentile': 'heightPercentile2'},
    '/biology/dog-metacam': {'get_tablets_1': 'tabletsMaintain1',
                             'get_tablets_25': 'tabletsMaintain25'},
}


def field_names(rec):
    '''Every variable that already renders as a box somewhere in the form.'''
    names = set()
    for group in rec.get('groups') or []:
        for matrix in group.get('m') or []:
            for column in (matrix[1] if len(matrix) > 1 else []):
                for field in column or []:
                    if isinstance(field, dict) and field.get('n'):
                        names.add(field['n'])
    return names


def build(rec):
    var_names = list((rec.get('vars') or {}).keys())
    rendered = field_names(rec)
    out = []
    manual = MANUAL.get(rec.get('path') or '', {})
    for name, params in functions(rec.get('js')):
        target = manual.get(name) or matches(name, var_names)
        if target is None:
            continue
        mapped = [resolve_param(p, var_names) for p in params]
        if any(m is None for m in mapped):
            continue
        if target in mapped:
            continue          # would be solving the output from itself
        # A `presentation` output is normally promoted to a result row. If it is
        # also rendered as a box, promoting it would put the same field on the
        # page twice — the duplicate the brief forbids.
        if (rec.get('vars', {}).get(target) or {}).get('type') == 'presentation' and target in rendered:
            continue
        out.append((target, name, mapped, params))
    return out


def humanise(name):
    """A label for a result row: `total_interest` → `Total interest`."""
    text = re.sub(r'([a-z0-9])([A-Z])', r'\1 \2', name).replace('_', ' ').strip()
    return text[:1].upper() + text[1:]


def php_rows(entries, rec):
    """Result rows for outputs the page only ever used inside its own text.

    A `presentation` variable is never printed as a box and the harvested
    sentences hold no placeholder for it, so a computed value would disappear.
    Promoting it to a dependent result gives the answer somewhere to land.
    """
    vars_ = rec.get('vars') or {}
    rows, overrides = [], []
    for target, macro, params, _raw in entries:
        if (vars_.get(target) or {}).get('type') != 'presentation':
            continue
        overrides.append("        '%s' => ['type' => 'dependent', 'rnd' => ['standard', '4']],"
                         % target)
        rows.append("            ['FR1', [[['t' => 'v', 'n' => '%s', 'vt' => 'dependent', "
                    "'l' => '%s']]]]," % (target, humanise(target)))
    return overrides, rows


def php_array(entries):
    lines = []
    for target, macro, params, _raw in entries:
        args = ', '.join(params)
        lines.append(
            "        ['formula' => '%s = %s(%s)', 'var' => [["
            "'l' => '%s', 'f' => '%s(%s)', 'r' => [%s]]]],"
            % (target, macro, args, target, macro, args,
               ', '.join("'%s'" % p for p in params)))
    return "\n".join(lines)


def write(path, entries, rec):
    key = path.strip('/').replace('/', '-')
    overrides, rows = php_rows(entries, rec)
    extra = ''
    if overrides:
        extra += "    'vars' => [\n%s\n    ],\n" % "\n".join(overrides)
    if rows:
        extra += ("    'groups' => [[\n        'uid' => 'supp-results', 'title' => 'Results', "
                  "'desc' => '',\n        'm' => [\n%s\n        ],\n    ]],\n" % "\n".join(rows))
    php = """<?php
/**
 * %s — the page script was harvested, the equation list was not.
 *
 * Every line below calls a function the page already defines, with the
 * arguments that function itself names. Generated by tools/gen_eq.py, then
 * checked in a browser by tools/supp_check.py.
 */
return [
%s    'eq' => [
%s
    ],
];
""" % (path, extra, php_array(entries))
    dest = os.path.join(SUPPLEMENT_DIR, key + '.php')
    with open(dest, 'w', encoding='utf-8') as fh:
        fh.write(php)
    return dest


def main(argv):
    do_write = '--write' in argv
    only = [a for a in argv if not a.startswith('-')]
    recs = load_records()
    # Only pages whose equation list is genuinely empty: adding an equation to a
    # page that already computes would give it two answers.
    recs = {k: v for k, v in recs.items() if not (v.get('eq') or [])}
    if only:
        recs = {k: v for k, v in recs.items() if k in only}
    total = 0
    for path in sorted(recs):
        rec = recs[path]
        entries = build(rec)
        if not entries:
            continue
        total += len(entries)
        dest = os.path.join(SUPPLEMENT_DIR, path.strip('/').replace('/', '-') + '.php')
        state = 'exists' if os.path.exists(dest) else ('write' if do_write else 'ready')
        print(f'{path:52s} {len(entries):2d} equation(s)  [{state}]')
        for target, macro, params, raw in entries:
            note = '' if params == raw else '   [' + ', '.join(raw) + ']'
            print(f'    {target} = {macro}({", ".join(params)}){note}')
        if do_write and not os.path.exists(dest):
            write(path, entries, rec)
    print(f'\n{total} equations across {len([1 for p in recs if build(recs[p])])} pages')
    if not do_write:
        print('(dry run — pass --write to create the supplement files)')


if __name__ == '__main__':
    main(sys.argv[1:])
