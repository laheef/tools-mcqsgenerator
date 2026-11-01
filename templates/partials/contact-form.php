<?php
/**
 * The public contact form.
 *
 * Fields come from the panel (Contact form screen): name/email/subject/message
 * are always present, and any extra fields the administrator configured are
 * rendered from their row and validated on the server. Nothing here trusts the
 * browser: the controller re-validates every field, rejects too-fast submissions
 * (a hidden timestamp), a filled honeypot, and repeats from one IP.
 *
 * @var array  $fields   extra configured fields (Cms::contactFields())
 * @var string $contactError  validation message from a rejected submission
 * @var array  $contactOld    what the visitor typed, so nothing is lost
 */

declare(strict_types=1);

use Onim\Cms;
use Onim\View;

$fields = $fields ?? [];
$enabled = Cms::settingBool('contact_form_enabled', true);
$sent = isset($_GET['sent']);
$problem = (string) ($contactError ?? '');
$old = is_array($contactOld ?? null) ? $contactOld : [];
$privacy = (string) (Cms::setting('contact_privacy_note', '') ?? '');
// The message box is drawn once: from the panel's field list when it defines
// one, otherwise from the built-in fallback below.
$hasBodyField = false;
foreach ($fields as $field) {
    if (in_array((string) $field['fkey'], ['body', 'message'], true)) {
        $hasBodyField = true;
        break;
    }
}
?>
<section class="contact-block" id="contact-form" aria-labelledby="contact-heading">
    <h2 class="section-title" id="contact-heading">Send a message</h2>

    <?php if (!$enabled): ?>
        <p class="empty-state">The contact form is switched off at the moment.
            <?php $address = (string) (Cms::setting('contact_email', '') ?? ''); ?>
            <?php if ($address !== ''): ?>
                You can still email <a href="mailto:<?= View::escape($address) ?>"><?= View::escape($address) ?></a>.
            <?php endif; ?>
        </p>
    <?php else: ?>
        <?php if ($sent): ?>
            <p class="form-success" role="status">
                <?= View::escape((string) (Cms::setting('contact_success', 'Thank you — your message is in. We reply to most messages within two working days.') ?? '')) ?>
            </p>
        <?php endif; ?>
        <?php if ($problem !== ''): ?>
            <p class="form-error" role="alert"><?= View::escape($problem) ?></p>
        <?php endif; ?>

        <form class="contact-form" method="post" action="<?= View::escape(View::url('/contact')) ?>" novalidate>
            <?= \Onim\Csrf::field() ?>
            <input type="hidden" name="action" value="contact">
            <input type="hidden" name="started" value="<?= (int) time() ?>">
            <div class="form-hp" aria-hidden="true">
                <label for="contact-website">Website</label>
                <input id="contact-website" type="text" name="website" tabindex="-1" autocomplete="off">
            </div>

            <div class="form-row">
                <div class="field">
                    <label class="field-label" for="contact-name">Your name <span class="field-optional">required</span></label>
                    <input class="field-input" id="contact-name" type="text" name="name" required maxlength="120"
                           value="<?= View::escape((string) ($old['name'] ?? '')) ?>" autocomplete="name">
                </div>
                <div class="field">
                    <label class="field-label" for="contact-email">Email address <span class="field-optional">required</span></label>
                    <input class="field-input" id="contact-email" type="email" name="email" required maxlength="190"
                           value="<?= View::escape((string) ($old['email'] ?? '')) ?>" autocomplete="email">
                </div>
            </div>

            <div class="field">
                <label class="field-label" for="contact-subject">Subject</label>
                <input class="field-input" id="contact-subject" type="text" name="subject" maxlength="190"
                       value="<?= View::escape((string) ($old['subject'] ?? '')) ?>">
            </div>

            <?php foreach ($fields as $field): ?>
                <?php
                $key = (string) $field['fkey'];
                $type = (string) $field['ftype'];
                $id = 'contact-' . preg_replace('~[^a-z0-9-]~', '-', $key);
                $value = (string) ($old[$key] ?? ($key === 'body' ? ($old['message'] ?? '') : ''));
                ?>
                <?php if ($type === 'checkbox'): ?>
                    <div class="field field-check">
                        <label class="field-check-label" for="<?= View::escape($id) ?>">
                            <input id="<?= View::escape($id) ?>" type="checkbox" name="<?= View::escape($key) ?>" value="1"
                                <?= $field['required'] ? 'required' : '' ?>>
                            <?= View::escape((string) $field['label']) ?>
                        </label>
                    </div>
                <?php elseif ($type === 'textarea'): ?>
                    <div class="field">
                        <label class="field-label" for="<?= View::escape($id) ?>"><?= View::escape((string) $field['label']) ?><?= $field['required'] ? ' <span class="field-optional">required</span>' : '' ?></label>
                        <textarea class="field-textarea" id="<?= View::escape($id) ?>" name="<?= View::escape($key) ?>" rows="4"
                                  placeholder="<?= View::escape((string) $field['placeholder']) ?>"<?= $field['required'] ? ' required' : '' ?>><?= View::escape($value) ?></textarea>
                    </div>
                <?php elseif ($type === 'select'): ?>
                    <div class="field">
                        <label class="field-label" for="<?= View::escape($id) ?>"><?= View::escape((string) $field['label']) ?><?= $field['required'] ? ' <span class="field-optional">required</span>' : '' ?></label>
                        <select class="field-input" id="<?= View::escape($id) ?>" name="<?= View::escape($key) ?>"<?= $field['required'] ? ' required' : '' ?>>
                            <option value="">Choose…</option>
                            <?php foreach ((array) ($field['options'] ?? []) as $option): ?>
                                <option value="<?= View::escape((string) $option) ?>"<?= $value === (string) $option ? ' selected' : '' ?>><?= View::escape((string) $option) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php else: ?>
                    <div class="field">
                        <label class="field-label" for="<?= View::escape($id) ?>"><?= View::escape((string) $field['label']) ?><?= $field['required'] ? ' <span class="field-optional">required</span>' : '' ?></label>
                        <input class="field-input" id="<?= View::escape($id) ?>" type="<?= View::escape($type === 'tel' ? 'tel' : ($type === 'email' ? 'email' : 'text')) ?>"
                               name="<?= View::escape($key) ?>" placeholder="<?= View::escape((string) $field['placeholder']) ?>"
                               value="<?= View::escape($value) ?>"<?= $field['required'] ? ' required' : '' ?>>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php if (!$hasBodyField): ?>
                <div class="field">
                    <label class="field-label" for="contact-message">Message <span class="field-optional">required</span></label>
                    <textarea class="field-textarea" id="contact-message" name="message" rows="7" required minlength="10"
                              maxlength="6000"><?= View::escape((string) ($old['message'] ?? '')) ?></textarea>
                </div>
            <?php endif; ?>

            <?php if ($privacy !== ''): ?>
                <p class="field-hint"><?= View::escape($privacy) ?></p>
            <?php endif; ?>

            <div class="form-actions">
                <button class="btn btn-primary" type="submit">Send message</button>
                <span class="field-hint">Your details are stored on this server so we can reply. No third parties.</span>
            </div>
        </form>
    <?php endif; ?>
</section>
