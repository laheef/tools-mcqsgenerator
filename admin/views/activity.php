<?php
/**
 * @var array $rows @var \Onim\Admin\Pagination $paginator @var array $actions @var array $users
 * @var string $q @var string $action @var string $user @var int $total
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Csrf;
?>
<div class="card">
    <form method="get" action="<?= e(admin_base() . '/index.php') ?>" class="filters" data-auto-submit>
        <input type="hidden" name="p" value="activity">
        <div class="field grow">
            <label for="q">Search details</label>
            <input id="q" name="q" type="search" value="<?= e($q) ?>" placeholder="Text in the summary…">
        </div>
        <div class="field">
            <label for="action_filter">Action</label>
            <select id="action_filter" name="action_filter">
                <option value="">Any action</option>
                <?php foreach ($actions as $row): ?>
                    <option value="<?= e((string) $row['action']) ?>" <?= $action === $row['action'] ? 'selected' : '' ?>>
                        <?= e((string) $row['action']) ?> (<?= (int) $row['c'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="field">
            <label for="user">User</label>
            <select id="user" name="user">
                <option value="">Anyone</option>
                <?php foreach ($users as $row): ?>
                    <option value="<?= e((string) $row['user_name']) ?>" <?= $user === $row['user_name'] ? 'selected' : '' ?>>
                        <?= e((string) $row['user_name']) ?> (<?= (int) $row['c'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="field"><button class="btn btn-primary" type="submit">Filter</button></div>
    </form>

    <div class="table-wrap">
        <table class="data">
            <thead><tr><th>When</th><th>User</th><th>Action</th><th>Summary</th><th>Entity</th><th>IP</th></tr></thead>
            <tbody>
            <?php if ($rows === []): ?>
                <tr><td colspan="6"><div class="empty"><h3>Nothing logged</h3><p class="small">Sign-ins, saves, deletes and settings changes are recorded here.</p></div></td></tr>
            <?php endif; ?>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td class="small nowrap"><?= e(date('j M Y H:i:s', strtotime((string) $row['created_at']))) ?></td>
                    <td class="small primary"><?= e((string) $row['user_name']) ?></td>
                    <td><span class="badge <?= str_contains((string) $row['action'], 'failed') ? 'badge-err' : 'badge-muted' ?>"><?= e(str_replace('_', ' ', (string) $row['action'])) ?></span></td>
                    <td class="small"><?= e((string) $row['summary']) ?></td>
                    <td class="mono small"><?= e((string) $row['entity']) ?><?= $row['entity_id'] !== '' ? ':' . e(str_limit((string) $row['entity_id'], 34)) : '' ?></td>
                    <td class="mono small muted"><?= e((string) $row['ip']) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $paginator->render() ?>
</div>

<div class="card" style="margin-top:18px">
    <div class="card-head"><h2>Housekeeping</h2></div>
    <div class="card-body">
        <form method="post" action="<?= e(admin_url('activity')) ?>" class="row"
              data-confirm="Delete old log entries? This cannot be undone.">
            <?= Csrf::field() ?>
            <input type="hidden" name="do" value="prune">
            <label class="small muted" for="days">Delete entries older than</label>
            <input id="days" name="days" type="number" min="7" max="730" value="90" style="max-width:100px">
            <span class="small muted">days</span>
            <button class="btn" type="submit">Prune</button>
        </form>
        <p class="small muted" style="margin:10px 0 0">The log is never editable — only appended to and pruned. Expired rate-limit rows are cleaned in the same step.</p>
    </div>
</div>
