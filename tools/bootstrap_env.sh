#!/bin/bash
# bootstrap_env.sh — rebuild the sandbox after a reset.
#
# The workspace files survive between sessions but the machine does not: PHP,
# MariaDB, the CMS database and the Playwright browser all have to be put back.
# Run this once after a reset, then start the two servers with
#
#   /usr/sbin/mariadbd --datadir=/var/lib/mysql-omni --port=3307 \
#       --bind-address=127.0.0.1 --socket=/var/run/mysqld/mysqld.sock --user=user
#   bash tools/serve.sh
#
# and `python3 -m playwright install chromium` for the browser suites.
set -e

echo "1/4 apt packages"
if ! command -v php >/dev/null; then
  sudo -n apt-get update -qq
  sudo -n apt-get install -y -qq php-cli php-mysql php-mbstring php-xml php-gd \
      php-curl php-zip mariadb-server >/dev/null
fi

echo "2/4 mariadb data directory"
if [ ! -d /var/lib/mysql-omni/mysql ]; then
  sudo -n mkdir -p /var/lib/mysql-omni /var/run/mysqld
  sudo -n chown -R user:user /var/lib/mysql-omni /var/run/mysqld
  sudo -n mariadb-install-db --user=user --datadir=/var/lib/mysql-omni \
      --auth-root-authentication-method=normal >/dev/null
fi
mkdir -p /var/run/mysqld 2>/dev/null || sudo -n mkdir -p /var/run/mysqld

echo "3/4 start mariadb (if it is not already up)"
if ! mysqladmin --protocol=tcp -h 127.0.0.1 -P 3307 -u root ping >/dev/null 2>&1; then
  /usr/sbin/mariadbd --datadir=/var/lib/mysql-omni --port=3307 \
      --bind-address=127.0.0.1 --socket=/var/run/mysqld/mysqld.sock --user=user \
      >/tmp/mariadb.log 2>&1 &
  for _ in $(seq 1 40); do
    mysqladmin --protocol=tcp -h 127.0.0.1 -P 3307 -u root ping >/dev/null 2>&1 && break
    sleep 0.5
  done
fi

echo "4/4 database and schema"
mysql --protocol=tcp -h 127.0.0.1 -P 3307 -u root \
      -e "CREATE DATABASE IF NOT EXISTS omni_cms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;" \
      2>/dev/null
for f in "$(dirname "$0")/../php-clone"/admin/migrations/*.sql; do
  mysql --protocol=tcp -h 127.0.0.1 -P 3307 -u root omni_cms < "$f" 2>/dev/null || true
done

python3 -c "import playwright" 2>/dev/null || python3 -m pip install --quiet playwright
echo
echo "ready. tables: $(mysql --protocol=tcp -h 127.0.0.1 -P 3307 -u root omni_cms \
      -Nse 'SELECT COUNT(*) FROM information_schema.tables WHERE table_schema="omni_cms"' 2>/dev/null)"
