#!/bin/bash
# CLI PHP. On this sandbox pdo_mysql is installed system-wide; if a locally
# built driver lives under .cache/deps it takes precedence (older sandboxes).
D=$(ls -d /home/user/.cache/deps/root/usr/lib/php/*/ 2>/dev/null | head -1)
if [ -n "$D" ]; then
  exec /usr/bin/php -d extension="${D}mysqlnd.so" -d extension="${D}pdo_mysql.so" "$@"
fi
exec /usr/bin/php "$@"
