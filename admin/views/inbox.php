<?php
/** @var array $rows @var \Onim\Admin\Pagination $paginator @var array $counts @var string $q @var string $status */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Csrf;
?>
<div class="grid grid-4" style="margin-bottom:18px">
    <div class="stat is-brand"><div class="label">Unread</div><div class="value"><?= number_format($counts['unread']) ?></div><div class="hint">waiting for an answer</div></div>
    <div class="stat"><div class="label">Read</div><div class="value"><?= number_format($counts['read']) ?></div><div class="hint">seen, not closed</div></div>
    <div class="stat"><div class="label">Resolved</div><div class="value"><?= number_format($counts['resolved']) ?></div><div class="hint">answered and closed</div></div>
    <div class="stat <?= $counts['failed'] > 0 ? 'is-brand' : '' ?>"><div class="label">Email failed</div><div class="value"><?= number_format($counts['failed']) ?></div><div class="hint">stored, not delivered</div></div>
</div>

<?php if ($counts['failed'] > 0): ?>
    <div class="notice warn">
        <div><strong>Some notifications could not be emailed</strong>
            The messages themselves are safe in this inbox. Check <a href="<?= e(admin_url('settings', ['tab' => 'email'])) ?>">Settings → Email</a>,
            then open the message and press “Send again”.</div>
    </div>
<?php endif; ?>

<div class="card">
    <form method="get" action="<?= e(admin_base() . '/index.php') ?>" class="filters" data-auto-submit>
        <input type="hidden" name="p" value="inbox">
        <div class="field grow">
            <label for="q">Search</label>
            <input id="q" name="q" type="search" value="<?= e($q) ?>" placeholder="Name, email, subject or text…">
        </div>
        <div class="field">
            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="">Everything</option>
                <?php foreach (['unread' => 'Unread (' . $counts['unread'] . ')', 'read' => 'Read', 'resolved' => 'Resolved', 'spam' => 'Spam', 'failed' => 'Email failed'] as $key => $label): ?>
                    <option value="<?= $key ?>" <?= $status === $key ? 'selected' : '' ?>><?= e($label) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="field"><button class="btn btn-primary" type="submit">Filter</button></div>
    </form>

    <form method="post" action="<?= e(admin_url('inbox')) ?>" data-bulk-form>
        <?= Csrf::field() ?>
        <input type="hidden" name="do" value="bulk">
        <div class="row" style="padding:12px 18px;border-bottom:1px solid var(--border)">
            <select name="bulk_status" aria-label="Bulk action" style="width:auto">
                <option value="">Bulk action…</option>
                <option value="read">Mark read</option>
                <option value="unread">Mark unread</option>
                <option value="resolved">Mark resolved</option>
                <option value="spam">Mark spam</option>
                <option value="delete">Delete</option>
            </select>
            <button class="btn" type="submit">Apply</button>
            <span class="spacer"></span>
            <span class="muted small"><?= e($paginator->summary()) ?></span>
        </div>

        <div class="table-wrap">
            <table class="data">
                <thead><tr>
                    <th style="width:34px"><input type="checkbox" data-select-all aria-label="Select all"></th>
                    <th>From</th><th>Subject</th><th>Status</th><th>Email delivery</th><th>Received</th><th class="actions"></th>
                </tr></thead>
                <tbody>
                <?php if ($rows === []): ?>
                    <tr><td colspan="7"><div class="empty">
                        <h3>Nothing here</h3>
                        <p class="small">Messages sent through the contact form land in this inbox — and are emailed to you when mail is configured.</p>
                    </div></td></tr>
                <?php endif; ?>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td><input type="checkbox" name="ids[]" value="<?= (int) $row['id'] ?>" aria-label="Select message"></td>
                        <td class="primary">
                            <a href="<?= e(admin_url('inbox', ['action' => 'view', 'id' => (int) $row['id']])) ?>">
                                <?= e($row['name'] !== '' ? (string) $row['name'] : '(no name)') ?>
                            </a>
                            <span class="sub"><?= e((string) $row['email']) ?></span>
                        </td>
                        <td>
                            <?= e(str_limit($row['subject'] !== '' ? (string) $row['subject'] : (string) $row['body'], 70)) ?>
                        </td>
                        <td>
                            <span class="badge <?= $row['status'] === 'unread' ? 'badge-brand' : ($row['status'] === 'resolved' ? 'badge-ok' : ($row['status'] === 'spam' ? 'badge-err' : 'badge-muted')) ?>">
                                <?= e((string) $row['status']) ?>
                            </span>
                        </td>
                        <td>
                            <span class="badge <?= $row['mail_status'] === 'sent' ? 'badge-ok' : ($row['mail_status'] === 'failed' ? 'badge-err' : 'badge-muted') ?>">
                                <?= e((string) $row['mail_status']) ?>
                            </span>
                        </td>
                        <td class="small muted nowrap"><?= e(date('j M, H:i', strtotime((string) $row['created_at']))) ?></td>
                        <td class="actions">
                            <a class="btn btn-sm" href="<?= e(admin_url('inbox', ['action' => 'view', 'id' => (int) $row['id']])) ?>">Open</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </form>
    <?= $paginator->render() ?>
</div>
