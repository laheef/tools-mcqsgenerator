#!/bin/bash
# sweep_all.sh — run silent_sweep.py chunk after chunk until every page is recorded.
#
# A page whose own script loops for ever wedges the browser, and page.evaluate
# never returns. Each chunk therefore runs under a hard timeout; when it fires,
# the pages finished so far are already in the jsonl (the sweep writes each
# result as it gets it) and mark_poison.py retires the next unrecorded path, so
# every kill moves the frontier forward instead of replaying the same chunk.
cd /home/user || exit 1
CHUNK="${CHUNK:-400}"
WORKERS="${WORKERS:-3}"
for i in $(seq 1 60); do
  out=$(timeout 300 python3 tools/silent_sweep.py --chunk "$CHUNK" --workers "$WORKERS" 2>&1)
  code=$?
  echo "$out" | tail -6
  if [ $code -ne 0 ]; then
    echo "chunk timed out (exit $code) — retiring the page it was on"
    python3 tools/mark_poison.py
  fi
  echo "$out" | grep -q "to do 0" && break
  python3 -c "
import sys; sys.path.insert(0,'/home/user/tools')
import silent_sweep as ss
if not [p for p in ss.catalogue() if p not in ss.done()]: print('ALL DONE')
" | grep -q "ALL DONE" && break
done
echo "SWEEP DONE"
