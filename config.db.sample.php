<?php
/**
 * SAMPLE — copy to config.db.php and fill in your Hostinger database details.
 *
 * You normally do not create this file by hand: /tool/admin/install.php writes it
 * after you enter the database name, user, password and the first administrator
 * account. Use this sample only when the host blocks PHP from writing files, or
 * when you prefer to set things up by hand.
 *
 * On Hostinger:  hPanel → Databases → MySQL Databases
 *   Database name : u123456789_tool      (the u… prefix is added by Hostinger)
 *   User name     : u123456789_tool
 *   Password      : the one you set there
 *   Host          : localhost
 *
 * Generate the application key with:
 *   php -r "echo bin2hex(random_bytes(32));"
 * or any 64-character hexadecimal string. Keep it secret and keep it stable:
 * it encrypts the SMTP password and signs the "preview draft" links.
 */

return [
    'host'    => 'localhost',
    'port'    => 3306,
    'name'    => 'u123456789_tool',
    'user'    => 'u123456789_tool',
    'pass'    => 'the-database-password',
    'charset' => 'utf8mb4',
    'app_key' => 'paste-64-hex-characters-here',
];
