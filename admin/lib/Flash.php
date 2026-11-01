<?php
/** Flash — one-shot messages rendered as toasts after a redirect. */

declare(strict_types=1);


namespace Onim\Admin;

// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

final class Flash
{
    public static function add(string $type, string $message): void
    {
        $_SESSION['_flash'][] = ['type' => $type, 'message' => $message];
    }

    public static function success(string $message): void
    {
        self::add('success', $message);
    }

    public static function error(string $message): void
    {
        self::add('error', $message);
    }

    public static function info(string $message): void
    {
        self::add('info', $message);
    }

    /** Worked, but not all of it — used by the bulk import. */
    public static function warning(string $message): void
    {
        self::add('warning', $message);
    }

    /** @return array<int,array{type:string,message:string}> */
    public static function pull(): array
    {
        $list = $_SESSION['_flash'] ?? [];
        unset($_SESSION['_flash']);
        return is_array($list) ? $list : [];
    }
}
