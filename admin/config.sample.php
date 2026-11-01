<?php
/**
 * Copy this file to /home/<user>/domains/<domain>/public_html/config.db.php
 * (i.e. the site root, next to config.php) and fill in the Hostinger database
 * details. The web installer (admin/install.php) writes this file for you — this
 * sample is for hosts that block PHP file writes, where you create it by hand.
 *
 * Never commit the real file: config.db.php is git-ignored and blocked by
 * .htaccess.
 */

return [
    'host'    => 'localhost',              // Hostinger: usually "localhost"
    'port'    => 3306,
    'name'    => 'u123456789_omni',        // hPanel → Databases → MySQL Databases
    'user'    => 'u123456789_omni',
    'pass'    => 'the-database-password',
    'charset' => 'utf8mb4',

    /*
     * Application key: 64 hex characters. It encrypts the SMTP password and
     * signs preview links, so keep it secret and keep it stable — changing it
     * invalidates stored secrets and any preview link already handed out.
     *
     * Generate one with:  php -r "echo bin2hex(random_bytes(32));"
     */
    'app_key' => 'paste-64-hex-characters-here',
];
