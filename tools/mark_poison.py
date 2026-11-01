"""Record the page a hung sweep was working on, so the next run can skip it.

`silent_sweep.py` writes every result the moment it knows it, so after the
parent kills a wedged browser the jsonl names exactly how far the chunk got.
The first catalogue path that is still missing is the page that wedged it (or
one of the few beside it): recording it as `timeout` guarantees forward
progress — each kill retires one page instead of replaying the same chunk for
ever. Those pages are then examined by hand and repaired, not swept again.
"""
import json
import sys

sys.path.insert(0, '/home/user/tools')
import silent_sweep as ss                                            # noqa: E402

paths = ss.catalogue()
seen = ss.done()
todo = [p for p in paths if p not in seen]
if not todo:
    print('nothing left')
    raise SystemExit(0)

victim = todo[0]
rec = {'path': victim, 'bucket': 'timeout', 'error': 'page did not finish; recorded by mark_poison.py'}
with ss.LOCK, open(ss.OUT, 'a') as fh:
    fh.write(json.dumps(rec, ensure_ascii=False) + '\n')
print('marked', victim)
