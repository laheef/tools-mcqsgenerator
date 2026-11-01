#!/usr/bin/env bash
#
# setup.sh — put a fresh machine (or a reset sandbox) into the state the test
# suites expect.
#
#   bash tools/setup.sh          # install runtimes + browser, then start the server
#   bash tools/setup.sh --check  # only report what is missing
#
# The site itself needs nothing but PHP: data, images and copy all live in
# php-clone/. Only the *test harness* needs Python + Playwright.

set -euo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
PORT="${PORT:-8080}"
CHECK_ONLY=0
[[ "${1:-}" == "--check" ]] && CHECK_ONLY=1

have() { command -v "$1" >/dev/null 2>&1; }

report() {
    printf '%-22s %s\n' "$1" "$2"
}

report "php" "$(have php && php -r 'echo PHP_VERSION;' || echo MISSING)"
if have php; then
    if php -m | grep -qi '^mbstring$'; then
        report "  mbstring" ok
    else
        report "  mbstring" MISSING
    fi
fi
report "python3" "$(have python3 && python3 -V 2>&1 | cut -d' ' -f2 || echo MISSING)"
if python3 -c 'import playwright' 2>/dev/null; then
    report "playwright (python)" ok
else
    report "playwright (python)" MISSING
fi
if [[ -d "$HOME/.cache/ms-playwright" ]]; then
    report "chromium" "$(ls "$HOME/.cache/ms-playwright" | grep -c chromium) build(s)"
else
    report "chromium" MISSING
fi
if curl -s -o /dev/null "http://127.0.0.1:${PORT}/" 2>/dev/null; then
    report "dev server :${PORT}" up
else
    report "dev server :${PORT}" down
fi

if [[ $CHECK_ONLY -eq 1 ]]; then
    exit 0
fi

if ! have php; then
    echo "-> installing php-cli + mbstring"
    sudo apt-get update -qq
    sudo apt-get install -y php-cli php-mbstring >/dev/null
fi

if ! python3 -c 'import playwright' 2>/dev/null; then
    echo "-> installing playwright"
    pip install --quiet playwright
fi

if [[ ! -d "$HOME/.cache/ms-playwright" ]] || ! ls "$HOME/.cache/ms-playwright" | grep -q chromium; then
    echo "-> installing chromium (with system libraries)"
    python3 -m playwright install --with-deps chromium
fi

if ! curl -s -o /dev/null "http://127.0.0.1:${PORT}/" 2>/dev/null; then
    echo "-> starting the server on 0.0.0.0:${PORT}"
    ( cd "$ROOT/php-clone" && PHP_CLI_SERVER_WORKERS=8 nohup php -S "0.0.0.0:${PORT}" router.php \
        > /tmp/php-server.log 2>&1 & )
    sleep 2
    curl -s -o /dev/null -w "   server answered %{http_code}\n" "http://127.0.0.1:${PORT}/"
fi

echo
echo "Ready. Suites:"
echo "  php php-clone/tests/solver.php"
echo "  python3 tools/crawl_all.py"
echo "  python3 tools/browser_test.py --sample 200 --jobs 6"
echo "  python3 tools/interaction_test.py"
echo "  python3 tools/seo_audit.py"
