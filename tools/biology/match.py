"""Work out which of the requested biology tools the catalogue already has."""
import json, glob, re, sys, difflib

ROOT = '/home/user/php-clone'

def norm(s):
    s = s.lower()
    s = s.replace('µ', 'u').replace('μ', 'u').replace('–', '-').replace('—', '-')
    s = re.sub(r'\(.*?\)', ' ', s)                 # parenthetical qualifiers
    s = re.sub(r'\bcalculator\b|\btool\b|\bconverter\b|\bfinder\b|\bchecker\b|\bplot\b', ' ', s)
    s = re.sub(r'[^a-z0-9]+', ' ', s)
    return ' '.join(s.split())

# words that carry no identity
STOP = {'of', 'the', 'to', 'from', 'for', 'a', 'an', 'and', 'per', 'in', 'by', 'with', 'at', 'on'}

def tokens(s):
    return {w for w in norm(s).split() if w not in STOP}

catalogue = []
for f in sorted(glob.glob(ROOT + '/data/calc/*.ndjson')):
    for line in open(f):
        line = line.strip()
        if not line:
            continue
        r = json.loads(line)
        catalogue.append({'slug': r['slug'], 'name': r['name'], 'cat': r['cat'], 'path': r['path']})

wanted = [l.strip() for l in open('/home/user/uploads/biology_tool_names.txt') if l.strip()]

# hand-checked equivalences: requested tool -> catalogue slug (or None to force new)
ALIAS = {
    'bird age calculator': 'bird-age',
    'cow gestation calculator': 'cow-gestation',
    'dog pregnancy calculator': 'dog-pregnancy',
    'dry matter intake calculator': 'dry-matter',
    'fcr calculator': 'fcr',
    'feed conversion ratio calculator': 'fcr',
    'goat years calculator': 'goat-gestation',       # placeholder, corrected below
    'goldfish years to human years calculator': 'guinea-pig-age',  # placeholder
    'mouse to human age calculator': 'dog-age',      # placeholder
    'compost application rate calculator': 'compost',
    'corn yield calculator': 'corn-yield',
    'growing degree days calculator': 'gdu',
    'basal area calculator': 'basal-area',
    'cedar tree value calculator': 'tree-value',
    'plants per hectare / planting density calculator': 'plant-population',
    'solute potential calculator': 'water-potential',
    'water potential calculator': 'water-potential',
    'fish tank stocking calculator': 'turtle-tank',   # placeholder
    'allele frequency calculator': 'allele-frequency',
    'hwe calculator': 'hardy-weinberg-equilibrium',
    'dihybrid cross calculator': 'dihybrid-cross-punnett-square',
    'mutation rate calculator': 'mutation-rate',
    'cell doubling time calculator': 'cell-doubling-time',
    'dna molecular weight calculator': 'dna-concentration',
    'protein molecular weight calculator': 'protein-molecular-weight',
    'log reduction calculator': 'log-reduction',
    'bacterial growth curve (lag/log phase) calculator': 'bacteria-growth',
    'bacteria growth': 'bacteria-growth',
    'ligation molar ratio (insert:vector) calculator': 'ligation',
    'neb ligation calculator': 'ligation',
    'cell dilution': 'cell-dilution',
    'dilution calculator (c1v1=c2v2)': 'cell-dilution',
    'mrna': 'dna-to-mrna',
    'dna to mrna': 'dna-to-mrna',
    'rna to protein (translation) calculator': 'dna-to-mrna',
}
# these placeholders above are wrong on purpose-clearing: remove ones we do not want
for k in ['goat years calculator', 'goldfish years to human years calculator',
          'mouse to human age calculator', 'fish tank stocking calculator',
          'dna molecular weight calculator', 'rna to protein (translation) calculator',
          'mrna', 'dna to mrna', 'cell dilution', 'dilution calculator (c1v1=c2v2)',
          'liga tion']:
    ALIAS.pop(k, None)

by_slug = {c['slug']: c for c in catalogue}
by_norm = {}
for c in catalogue:
    by_norm.setdefault(norm(c['name']), c)
    by_norm.setdefault(norm(c['slug']), c)

plan = []
seen_slugs = set()
for name in wanted:
    key = norm(name)
    hit = None
    if key in ALIAS and ALIAS[key] in by_slug:
        hit = by_slug[ALIAS[key]]
    elif key in by_norm:
        hit = by_norm[key]
    else:
        wt = tokens(name)
        best, score = None, 0.0
        for c in catalogue:
            ct = tokens(c['name'])
            if not ct or not wt:
                continue
            j = len(wt & ct) / len(wt | ct)
            if j > score:
                best, score = c, j
        # an exact token-set match is trustworthy; a partial one is a candidate only
        if best is not None and score == 1.0:
            hit = best
        elif best is not None and score >= 0.75:
            hit = best
            plan.append({'kind': 'maybe', 'name': name,
                         'catalogue': best['name'], 'slug': best['slug'], 'score': round(score, 2)})
            continue
    status = 'exists' if hit else 'new'
    if hit:
        seen_slugs.add(hit['slug'])
    plan.append({'kind': status, 'name': name,
                 'catalogue': hit['name'] if hit else '', 'slug': hit['slug'] if hit else '',
                 'cat': hit['cat'] if hit else '', 'path': hit['path'] if hit else ''})

json.dump(plan, open('/home/user/tools/biology/plan.json', 'w'), indent=1)
ex = [p for p in plan if p['kind'] == 'exists']
nw = [p for p in plan if p['kind'] == 'new']
mb = [p for p in plan if p['kind'] == 'maybe']
print(f'requested {len(wanted)}  exists {len(ex)}  maybe {len(mb)}  new {len(nw)}')
print('\n--- EXISTS ---')
for p in ex: print(f"  {p['name']:55s} -> {p['slug']} ({p['cat']})")
print('\n--- MAYBE (needs a human eye) ---')
for p in mb: print(f"  {p['name']:55s} ~ {p['catalogue']} ({p['slug']}) {p['score']}")
