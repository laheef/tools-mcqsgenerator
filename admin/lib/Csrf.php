<?php
/**
 * Csrf — one token per session, compared with hash_equals on every state
 * changing request. GET requests never mutate data anywhere in this panel.
 */

declare(strict_types=1);


namespace Omni\Admin;

// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

final class Csrf
{
    public static function token(): string
    {
        if (empty($_SESSION['csrf']) || !is_string($_SESSION['csrf'])) {
            $_SESSION['csrf'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf'];
    }

    /** Hidden input for a form. */
    public static function field(): string
    {
        return '<input type="hidden" name="_token" value="' . htmlspecialchars(self::token(), ENT_QUOTES, 'UTF-8') . '">';
    }

    public static function valid(): bool
    {
        $sent = $_POST['_token'] ?? ($_SERVER['HTTP_X_CSRF_TOKEN'] ?? '');
        if (!is_string($sent) || $sent === '') {
            return false;
        }
        return hash_equals(self::token(), $sent);
    }

    /** Abort the request when the token is missing or wrong. */
    public static function assert(): void
    {
        if (self::valid()) {
            return;
        }
        http_response_code(419);
        Activity::log('csrf_failed', 'security', '', 'Rejected a request with an invalid CSRF token');
        render_plain('error', [
            'code' => 419,
            'message' => 'This form has expired. Go back, reload the page and submit it again.',
        ]);
        exit;
    }

    /** Only POST may change state; anything else is a programming error. */
    public static function requirePost(): void
    {
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
            return;
        }
        http_response_code(405);
        header('Allow: POST');
        render_plain('error', ['code' => 405, 'message' => 'This action must be submitted as a form POST.']);
        exit;
    }
}
