<?php
/**
 * Nothing to see here.
 *
 * The folder is blocked over HTTP twice over — by the RewriteRule in the root
 * .htaccess and by router.php — but a directory listing would still be a map
 * of the site's source if either of those were ever missing. A 404 is cheaper
 * than an explanation.
 */

http_response_code(404);
header('Content-Type: text/plain; charset=utf-8');
echo "Not found\n";
