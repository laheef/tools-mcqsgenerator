<?php
/**
 * Activity — the audit trail.
 *
 * Every create, update, delete, publish, login and failed login writes one row.
 * The log is append-only from the panel (no edit or delete screen) and is what
 * makes "who unpublished the mortgage calculator" answerable.
 */

declare(strict_types=1);


namespace Omni\Admin;

// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Omni\Db;

final class Activity
{
    public static function log(string $action, string $entity = '', string $entityId = '', string $summary = ''): void
    {
        if (!Db::available() || !Db::hasTable('activity_log')) {
            return;
        }
        $user = Auth::user();
        Db::insert('activity_log', [
            'user_id'    => $user === null ? null : (int) $user['id'],
            'user_name'  => $user === null ? 'guest' : (string) $user['name'],
            'action'     => mb_substr($action, 0, 60),
            'entity'     => mb_substr($entity, 0, 60),
            'entity_id'  => mb_substr($entityId, 0, 60),
            'summary'    => mb_substr($summary, 0, 500),
            'ip'         => mb_substr(client_ip(), 0, 45),
            'user_agent' => mb_substr((string) ($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 255),
        ]);
    }

    /** @return array<int,array<string,mixed>> */
    public static function recent(int $limit = 20): array
    {
        if (!Db::available() || !Db::hasTable('activity_log')) {
            return [];
        }
        return Db::all('SELECT * FROM activity_log ORDER BY id DESC LIMIT ' . max(1, min(500, $limit)));
    }

    /** @return array{total:int,errors:int} */
    public static function counts(): array
    {
        if (!Db::available() || !Db::hasTable('activity_log')) {
            return ['total' => 0, 'errors' => 0];
        }
        return [
            'total'  => (int) Db::value('SELECT COUNT(*) FROM activity_log', [], 0),
            'errors' => (int) Db::value("SELECT COUNT(*) FROM activity_log WHERE action LIKE '%failed%'", [], 0),
        ];
    }
}
