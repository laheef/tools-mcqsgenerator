#!/usr/bin/env bash
#
# sandbox-up.sh — bring a fresh (or reset) sandbox back to a working dev state.
#
# A reset wipes installed packages and running processes, but not the workspace.
# This script reinstalls the two things the panel needs (PHP with pdo_mysql, and a
# MariaDB listening on 127.0.0.1:3307), restores the schema and the seed data if
# the database is empty, and reports what state everything is in.
#
#   bash tools/sandbox-up.sh
#
# Production needs none of this: Hostinger ships pdo_mysql and MySQL.

set -uo pipefail

ROOT="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
PORT="${PORT:-8080}"
DB_PORT="${DB_PORT:-3307}"
DB_NAME="${DB_NAME:-omni_cms}"

say() { printf '%-28s %s\n' "$1" "$2"; }

# The workspace snapshot keeps file contents but not permission bits, so after a
# reset every helper script comes back non-executable. Tools that shell out to
# them (tools/admin_e2e.py calls tools/php.sh directly) then fail with EACCES.
chmod +x "$ROOT"/tools/*.sh 2>/dev/null || true

# ---------------------------------------------------------------- packages ---
if ! command -v php >/dev/null 2>&1; then
    echo "-> installing php-cli"
    sudo apt-get update -qq
    sudo apt-get install -y php-cli php-mbstring php-mysql >/dev/null
fi
say "php" "$(php -r 'echo PHP_VERSION;' 2>/dev/null || echo MISSING)"
php -m 2>/dev/null | grep -qi '^pdo_mysql$' || {
    echo "-> installing the mysql driver"
    sudo apt-get install -y php-mysql >/dev/null
}
say "pdo_mysql" "$(php -m | grep -qi '^pdo_mysql$' && echo ok || echo MISSING)"

# --------------------------------------------------------------- playwright ---
# The browser suites (mobile_audit, gate_check, scripting, the biology sweeps)
# need Playwright and its Chromium shell. Both live outside the workspace, so a
# reset removes them even though the tools that use them come back.
if ! python3 -c 'import playwright.sync_api' >/dev/null 2>&1; then
    echo "-> installing playwright"
    pip install -q playwright >/dev/null 2>&1 || pip install -q --break-system-packages playwright >/dev/null 2>&1
fi
if [ -z "$(ls -A "$HOME/.cache/ms-playwright" 2>/dev/null)" ]; then
    echo "-> fetching the chromium shell"
    python3 -m playwright install chromium >/dev/null 2>&1
fi
# ...and its shared libraries (libnspr4, libatk, libcups …), which the shell
# needs before it can start at all.
python3 -m playwright install-deps chromium >/dev/null 2>&1 || true
say "playwright" "$(python3 -c 'import playwright; print("ok")' 2>/dev/null || echo MISSING)"
say "chromium" "$(ls -d "$HOME"/.cache/ms-playwright/chromium* 2>/dev/null | head -1 | sed 's#.*/##' || echo MISSING)"

if ! command -v mariadbd >/dev/null 2>&1 && [ ! -x /usr/sbin/mariadbd ]; then
    echo "-> installing mariadb-server"
    sudo DEBIAN_FRONTEND=noninteractive apt-get install -y mariadb-server >/dev/null
fi

CONFIG_DB="$ROOT/php-clone/config.db.php"
CONFIG_SNAPSHOT=""
if [ -f "$CONFIG_DB" ]; then
    CONFIG_SNAPSHOT="$(mktemp)"
    cp "$CONFIG_DB" "$CONFIG_SNAPSHOT"
    BOUND_DB="$(php -r 'require "'"$ROOT"'/php-clone/config.php"; $c = omni_db_config(); echo $c["name"];' 2>/dev/null)"
    if [ -n "${BOUND_DB:-}" ] && [ "$BOUND_DB" != "$DB_NAME" ]; then
        echo "-> note: the site is bound to '${BOUND_DB}', not '${DB_NAME}'; using '${BOUND_DB}'"
        DB_NAME="$BOUND_DB"
    fi
fi

# ----------------------------------------------------------------- database ---
if ! (exec 3<>/dev/tcp/127.0.0.1/${DB_PORT}) 2>/dev/null; then
    echo "-> starting mariadb on 127.0.0.1:${DB_PORT}"
    sudo mkdir -p /run/mysqld && sudo chown mysql:mysql /run/mysqld
    sudo nohup /usr/sbin/mariadbd --user=mysql --port="${DB_PORT}" --bind-address=127.0.0.1 \
        --socket=/run/mysqld/mysqld.sock >/tmp/mariadb.log 2>&1 &
    for _ in $(seq 1 30); do
        (exec 3<>/dev/tcp/127.0.0.1/${DB_PORT}) 2>/dev/null && break
        sleep 1
    done
fi
sudo mariadb --socket=/run/mysqld/mysqld.sock -u root <<SQL >/dev/null 2>&1
CREATE DATABASE IF NOT EXISTS ${DB_NAME} CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS 'root'@'127.0.0.1' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON *.* TO 'root'@'127.0.0.1' WITH GRANT OPTION;
ALTER USER 'root'@'localhost' IDENTIFIED VIA mysql_native_password USING PASSWORD('');
FLUSH PRIVILEGES;
SQL
say "database" "$(mariadb --protocol=tcp -h 127.0.0.1 -P "${DB_PORT}" -u root -N -e "SELECT 'up (' || VERSION() || ')'" 2>/dev/null | head -1)"

# --------------------------------------------------------------- schema/seed ---
#
# config.db.php (written by the installer) outranks the OMNI_DB_* variables, so
# it — not DB_NAME — decides which database the site and the installer really
# talk to. Follow it: a run with a different DB_NAME must not report one
# database while writing to another, and must never leave the live site pointing
# at a throwaway one.
TABLES=$(mariadb --protocol=tcp -h 127.0.0.1 -P "${DB_PORT}" -u root -N -e \
    "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema='${DB_NAME}'" 2>/dev/null || echo 0)
if [ "${TABLES:-0}" -lt 5 ]; then
    echo "-> installing the panel schema and seed data"
    ( cd "$ROOT/php-clone" && OMNI_DB_HOST=127.0.0.1 OMNI_DB_PORT="${DB_PORT}" OMNI_DB_NAME="${DB_NAME}" \
        OMNI_DB_USER=root OMNI_DB_PASS= OMNI_ADMIN_NAME="Site Owner" \
        OMNI_ADMIN_EMAIL=owner@example.com OMNI_ADMIN_PASS='DevPanel2026!' \
        bash "$ROOT/tools/php.sh" admin/install.php >/tmp/install.log 2>&1; echo "   $(tail -2 /tmp/install.log | head -1)" )
fi

say "tables" "$(mariadb --protocol=tcp -h 127.0.0.1 -P "${DB_PORT}" -u root -N -e \
    "SELECT COUNT(*) FROM information_schema.tables WHERE table_schema='${DB_NAME}'" 2>/dev/null)"

# ---------------------------------------------------- biology calculators ---
# The seed ships no custom calculators; the 210 biology pages are imported from
# data/samples/biology-pack.json by their own script. Skipping this step leaves a
# site that looks healthy but reports 3 831 calculators instead of 4 041, so it
# is part of the restore rather than a thing to remember. The import is
# idempotent ("created=0 updated=210" on a second run), so it is safe to repeat.
CUSTOM=$(mariadb --protocol=tcp -h 127.0.0.1 -P "${DB_PORT}" -u root -N -e \
    "SELECT COUNT(*) FROM ${DB_NAME}.custom_calculators" 2>/dev/null || echo 0)
if [ "${CUSTOM:-0}" -lt 5 ]; then
    echo "-> importing the biology calculators"
    ( cd "$ROOT/php-clone" && OMNI_DB_HOST=127.0.0.1 OMNI_DB_PORT="${DB_PORT}" OMNI_DB_NAME="${DB_NAME}" \
        OMNI_DB_USER=root OMNI_DB_PASS= OMNI_ADMIN_NAME="Site Owner" \
        OMNI_ADMIN_EMAIL=owner@example.com OMNI_ADMIN_PASS='DevPanel2026!' \
        bash "$ROOT/tools/php.sh" scripts_import_biology.php 2>&1 | tail -1 | sed 's/^/   /' )
fi
say "calculators" "$(mariadb --protocol=tcp -h 127.0.0.1 -P "${DB_PORT}" -u root -N -e \
    "SELECT COUNT(*) FROM ${DB_NAME}.custom_calculators" 2>/dev/null) custom"

if [ -n "$CONFIG_SNAPSHOT" ] && [ -f "$CONFIG_SNAPSHOT" ]; then
    if ! cmp -s "$CONFIG_SNAPSHOT" "$CONFIG_DB" 2>/dev/null; then
        echo "-> the installer rewrote config.db.php; restoring the previous credentials"
        cp "$CONFIG_SNAPSHOT" "$CONFIG_DB"
    fi
    rm -f "$CONFIG_SNAPSHOT"
fi

# ------------------------------------------------------------------- server ---
if ! curl -s -o /dev/null "http://127.0.0.1:${PORT}/" 2>/dev/null; then
    echo "-> starting the dev server on 0.0.0.0:${PORT}"
    ( cd "$ROOT/php-clone" && PHP_CLI_SERVER_WORKERS=${PHP_CLI_SERVER_WORKERS:-4} nohup bash "$ROOT/tools/serve.sh" \
        >/tmp/php-server.log 2>&1 & )
    for _ in $(seq 1 20); do
        curl -s -o /dev/null "http://127.0.0.1:${PORT}/" && break
        sleep 1
    done
fi
say "dev server :${PORT}" "$(curl -s -o /dev/null -w '%{http_code}' "http://127.0.0.1:${PORT}/")"
say "admin panel" "$(curl -s -o /dev/null -w '%{http_code}' "http://127.0.0.1:${PORT}/admin/index.php")"
say "db the site uses" "$(php -r 'require "'"$ROOT"'/php-clone/config.php"; $c = omni_db_config(); echo ($c["name"] !== "" ? $c["name"] : "none (file data)");' 2>/dev/null || echo unknown)"
TOTAL=$(curl -s "http://127.0.0.1:${PORT}/" 2>/dev/null \
    | grep -o 'data-live-count="total">[0-9 ]*' | head -1 | grep -o '[0-9][0-9 ]*' | tr -d ' ')
say "catalogue total" "${TOTAL:-unknown} calculators served"
if [ -n "${TOTAL:-}" ] && [ "$TOTAL" -lt 4000 ]; then
    echo "!! the catalogue is short of 4 041 — the site is probably not reading"
    echo "   the same database as this script. Check php-clone/config.db.php"
    echo "   (name) against DB_NAME="${DB_NAME}"."
fi
echo
echo "Suites:"
echo "  bash tools/php.sh php-clone/tests/e2e_panel.php    # panel, every screen"
echo "  bash tools/php.sh php-clone/tests/solver.php       # engine"
echo "  python3 tools/admin_e2e.py                        # panel UI + security"
