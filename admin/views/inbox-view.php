<?php
/** @var array $message @var array $notes @var array $extra */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Csrf;
?>
<div class="grid grid-sidebar">
    <div class="stack" style="gap:18px">
        <div class="card">
            <div class="card-head">
                <h2><?= e($message['subject'] !== '' ? (string) $message['subject'] : 'Contact form message') ?></h2>
                <span class="spacer"></span>
                <span class="badge badge-muted"><?= e((string) $message['status']) ?></span>
            </div>
            <div class="card-body">
                <dl class="kv" style="margin-bottom:16px">
                    <dt>From</dt><dd><?= e((string) $message['name']) ?> &lt;<?= e((string) $message['email']) ?>&gt;</dd>
                    <?php if ($message['phone'] !== ''): ?><dt>Phone</dt><dd><?= e((string) $message['phone']) ?></dd><?php endif; ?>
                    <dt>Received</dt><dd><?= e(date('j M Y, H:i', strtotime((string) $message['created_at']))) ?></dd>
                    <dt>IP address</dt><dd class="mono small"><?= e((string) $message['ip']) ?></dd>
                    <dt>Page</dt><dd class="mono small"><?= e((string) $message['referer']) ?></dd>
                    <dt>Browser</dt><dd class="small muted"><?= e(str_limit((string) $message['user_agent'], 90)) ?></dd>
                </dl>

                <?php foreach ($extra as $key => $value): ?>
                    <?php if (!is_scalar($value) || trim((string) $value) === '') { continue; } ?>
                    <p class="small" style="margin:0 0 6px"><strong><?= e(ucfirst((string) $key)) ?>:</strong> <?= e((string) $value) ?></p>
                <?php endforeach; ?>

                <div style="white-space:pre-wrap;background:var(--surface-2);border:1px solid var(--border);border-radius:10px;padding:14px;margin-top:12px"><?= e((string) $message['body']) ?></div>

                <div class="row" style="margin-top:16px">
                    <a class="btn btn-primary" href="mailto:<?= e((string) $message['email']) ?>?subject=<?= rawurlencode('Re: ' . ($message['subject'] !== '' ? (string) $message['subject'] : 'your message')) ?>">
                        <?= admin_icon('mail', 15) ?> Reply by email
                    </a>
                    <form method="post" action="<?= e(admin_url('inbox')) ?>">
                        <?= Csrf::field() ?>
                        <input type="hidden" name="do" value="status">
                        <input type="hidden" name="id" value="<?= (int) $message['id'] ?>">
                        <input type="hidden" name="back" value="view">
                        <select name="status" aria-label="Set status" style="width:auto">
                            <?php foreach (['unread' => 'Unread', 'read' => 'Read', 'resolved' => 'Resolved', 'spam' => 'Spam'] as $key => $label): ?>
                                <option value="<?= $key ?>" <?= $message['status'] === $key ? 'selected' : '' ?>><?= $label ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="btn" type="submit">Update</button>
                    </form>
                    <form method="post" action="<?= e(admin_url('inbox')) ?>" data-confirm="Delete this message permanently?">
                        <?= Csrf::field() ?>
                        <input type="hidden" name="do" value="delete">
                        <input type="hidden" name="id" value="<?= (int) $message['id'] ?>">
                        <button class="btn btn-danger" type="submit"><?= admin_icon('trash', 15) ?> Delete</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-head"><h2>Internal notes</h2><span class="spacer"></span><span class="muted small">never sent to the sender</span></div>
            <div class="card-body">
                <?php if ($notes === []): ?>
                    <p class="small muted" style="margin:0 0 12px">No notes yet.</p>
                <?php else: ?>
                    <ul style="list-style:none;padding:0;margin:0 0 14px">
                        <?php foreach ($notes as $note): ?>
                            <li style="padding:10px 0;border-bottom:1px solid var(--border)">
                                <div class="small muted"><?= e((string) ($note['author'] ?? 'unknown')) ?> · <?= e(date('j M Y H:i', strtotime((string) $note['created_at']))) ?></div>
                                <div style="white-space:pre-wrap;margin-top:4px"><?= e((string) $note['note']) ?></div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <form method="post" action="<?= e(admin_url('inbox')) ?>">
                    <?= Csrf::field() ?>
                    <input type="hidden" name="do" value="note">
                    <input type="hidden" name="id" value="<?= (int) $message['id'] ?>">
                    <div class="field">
                        <label for="note">Add a note</label>
                        <textarea id="note" name="note" rows="3" placeholder="What did you do about this?"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">Save note</button>
                </form>
            </div>
        </div>
    </div>

    <div class="stack" style="gap:18px">
        <div class="card">
            <div class="card-head"><h2>Email delivery</h2></div>
            <div class="card-body">
                <p class="small">
                    Status:
                    <span class="badge <?= $message['mail_status'] === 'sent' ? 'badge-ok' : ($message['mail_status'] === 'failed' ? 'badge-err' : 'badge-muted') ?>">
                        <?= e((string) $message['mail_status']) ?>
                    </span>
                </p>
                <?php if ($message['mail_error'] !== ''): ?>
                    <p class="small" style="color:var(--err)"><?= e((string) $message['mail_error']) ?></p>
                <?php endif; ?>
                <form method="post" action="<?= e(admin_url('inbox')) ?>">
                    <?= Csrf::field() ?>
                    <input type="hidden" name="do" value="resend">
                    <input type="hidden" name="id" value="<?= (int) $message['id'] ?>">
                    <button class="btn" type="submit"><?= admin_icon('mail', 15) ?> Send notification again</button>
                </form>
                <p class="small muted" style="margin:10px 0 0">The message is stored in MySQL either way — email is a convenience, not the record.</p>
            </div>
        </div>

        <div class="card">
            <div class="card-head"><h2>Navigation</h2></div>
            <div class="card-body stack" style="gap:8px">
                <?php
                $ids = \Onim\Db::all('SELECT id FROM messages ORDER BY id');
                $index = null;
                foreach ($ids as $i => $row) {
                    if ((int) $row['id'] === (int) $message['id']) {
                        $index = $i;
                    }
                }
                $prev = $index !== null && isset($ids[$index - 1]) ? (int) $ids[$index - 1]['id'] : null;
                $next = $index !== null && isset($ids[$index + 1]) ? (int) $ids[$index + 1]['id'] : null;
                ?>
                <?php if ($prev !== null): ?>
                    <a class="btn" href="<?= e(admin_url('inbox', ['action' => 'view', 'id' => $prev])) ?>"><?= admin_icon('up', 14) ?> Previous message</a>
                <?php endif; ?>
                <?php if ($next !== null): ?>
                    <a class="btn" href="<?= e(admin_url('inbox', ['action' => 'view', 'id' => $next])) ?>"><?= admin_icon('down', 14) ?> Next message</a>
                <?php endif; ?>
                <a class="btn btn-ghost" href="<?= e(admin_url('inbox')) ?>">Back to the inbox</a>
            </div>
        </div>
    </div>
</div>
