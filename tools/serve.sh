#!/bin/bash
# Dev server for this sandbox. Production (Hostinger) needs none of this
# wrapper: pdo_mysql is compiled in there.
# PHP_CLI_SERVER_WORKERS defaults to 4: a worker holds ~350 MB while it builds
# the sitemap (it decodes all 3.8k definitions), so 8 of them plus MariaDB push a
# 2 GB sandbox into swap and every request starts timing out. Override with the
# environment variable when the box has the memory.
D=$(ls -d /home/user/.cache/deps/root/usr/lib/php/*/ 2>/dev/null | head -1)
cd /home/user/php-clone || exit 1
if [ -n "$D" ]; then
  PHP_CLI_SERVER_WORKERS=${PHP_CLI_SERVER_WORKERS:-4} exec /usr/bin/php \
    -d extension="${D}mysqlnd.so" -d extension="${D}pdo_mysql.so" \
    -d upload_max_filesize=8M -d post_max_size=12M \
    -S 0.0.0.0:8080 router.php
fi
PHP_CLI_SERVER_WORKERS=${PHP_CLI_SERVER_WORKERS:-4} exec /usr/bin/php \
  -d upload_max_filesize=8M -d post_max_size=12M \
  -S 0.0.0.0:8080 router.php
