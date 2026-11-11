"""The 262 pages the catalogue builds from a table: pairs, densities, multi-unit
converters, temperature, coins and number words."""

import catalog
import make

SPECS = []

for _slug, (_a, _b) in sorted(catalog.PAIRS.items()):
    SPECS.append(make.pair(_slug, _a, _b))

for _slug, (_a, _b) in sorted(catalog.DENSITY.items()):
    SPECS.append(make.dens(_slug, _a, _b))

for _slug, (_base, _only) in sorted(catalog.MULTI.items()):
    SPECS.append(make.multi(_slug, _base, _only))

for _slug, _from in sorted(catalog.TEMPERATURE.items()):
    SPECS.append(make.temperature(_slug, _from))

for _slug, (_coin, _per) in sorted(catalog.MONEY.items()):
    SPECS.append(make.money(_slug, _coin, _per))

for _slug, _word in sorted(catalog.SCALE.items()):
    SPECS.append(make.scale(_slug, _word))
