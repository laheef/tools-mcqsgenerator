<?php
/**
 * Contact — validates and stores public contact-form submissions.
 *
 * Rules, all enforced server-side regardless of what the browser sends:
 *   * the CSRF token must be valid for this visitor (lib/Csrf.php);
 *   * the honeypot field must be empty and the form must have been on screen
 *     for at least three seconds;
 *   * one IP gets five submissions per hour, then a fifteen-minute cool-off;
 *   * name, email and message are required; extra configured fields are checked
 *     against their own type and required flag;
 *   * the message is stored in MySQL first, then the notification is attempted,
 *     and the mail result is recorded on the row — a failed send never loses the
 *     message and is visible in the panel's inbox.
 */

declare(strict_types=1);

namespace Onim;

final class Contact
{
    /**
     * Handle a POSTed contact form.
     *
     * @return array{ok:bool,error:string,id:int,mail:string}
     */
    public static function handle(): array
    {
        $fail = static fn (string $message): array => ['ok' => false, 'error' => $message, 'id' => 0, 'mail' => ''];

        if (!Cms::enabled()) {
            return $fail('The contact form is not available on this installation yet.');
        }
        if (!Cms::settingBool('contact_form_enabled', true)) {
            return $fail('The contact form is switched off.');
        }
        if (!Csrf::valid()) {
            return $fail('Your session expired before the form was sent. Please try again — the message was not lost.');
        }

        // honeypot: a real visitor never sees this field
        if (trim((string) ($_POST['website'] ?? '')) !== '') {
            return $fail('That submission was rejected as automated.');
        }
        $started = (int) ($_POST['started'] ?? 0);
        if ($started > 0 && time() - $started < 3) {
            return $fail('That was very fast — please take a moment and send again.');
        }

        $name = self::line((string) ($_POST['name'] ?? ''), 120);
        $email = self::line((string) ($_POST['email'] ?? ''), 190);
        $phone = self::line((string) ($_POST['phone'] ?? ''), 60);
        $subject = self::line((string) ($_POST['subject'] ?? ''), 190);
        // The panel's field list decides what the form asks for: the message may
        // be named `message` (built-in) or `body` (the seeded field).
        $body = trim((string) ($_POST['message'] ?? $_POST['body'] ?? ''));

        if ($name === '') {
            return $fail('Please tell us your name.');
        }
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            return $fail('That email address does not look right.');
        }
        if (mb_strlen($body) < 10) {
            return $fail('Please write at least a sentence so we can help.');
        }
        if (mb_strlen($body) > 6000) {
            return $fail('That message is too long (6,000 characters max).');
        }

        // extra fields configured in the panel
        $extra = [];
        $missing = '';
        foreach (Cms::contactFields() as $field) {
            $key = (string) $field['fkey'];
            if (in_array($key, ['name', 'email', 'phone', 'subject', 'message', 'body'], true)) {
                continue;
            }
            $value = $_POST[$key] ?? '';
            if (is_array($value)) {
                $value = implode(', ', array_map('strval', $value));
            }
            $value = self::line((string) $value, 1000);
            if ($key === 'phone' && $value !== '') {
                $phone = $value;
            }
            if ($field['required'] && $value === '') {
                $missing = (string) $field['label'];
                break;
            }
            if ($value !== '') {
                $extra[(string) $field['label']] = $value;
            }
        }
        if ($missing !== '') {
            return $fail('“' . $missing . '” is required.');
        }

        // throttle: 5 per hour per address, then a 15 minute cool-off
        $ip = self::ip();
        if (!self::throttle($ip)) {
            return $fail('You have sent several messages already. Please wait a while before sending another.');
        }

        $now = date('Y-m-d H:i:s');
        $id = Db::insert('messages', [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject !== '' ? $subject : 'Contact form message',
            'body' => $body,
            'extra' => $extra === [] ? null : json_encode($extra, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'status' => 'unread',
            'ip' => $ip,
            'user_agent' => mb_substr((string) ($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 255),
            'referer' => mb_substr(self::currentUrl(), 0, 255),
            'mail_status' => 'pending',
            'created_at' => $now,
        ]);
        if ($id <= 0) {
            return $fail('The message could not be saved. Please email us directly instead.');
        }

        $result = self::notify($name, $email, $subject, $body, $extra, $id);
        Db::update('messages', [
            'mail_status' => $result['ok'] ? 'sent' : 'failed',
            'mail_error' => mb_substr($result['error'], 0, 500),
        ], 'id = :id', [':id' => $id]);

        return ['ok' => true, 'error' => '', 'id' => $id, 'mail' => $result['ok'] ? 'sent' : $result['error']];
    }

    /**
     * Email the notification to the address configured in Settings → Email.
     *
     * @param array<string,string> $extra
     * @return array{ok:bool,error:string,transport:string}
     */
    private static function notify(string $name, string $email, string $subject, string $body, array $extra, int $id): array
    {
        $to = (string) Cms::setting('mail_to', Cms::setting('contact_email', ''));
        $site = Cms::siteName();
        $lines = ['New message #' . $id . ' from ' . $site, '', 'Name:  ' . $name, 'Email: ' . $email];
        foreach ($extra as $label => $value) {
            $lines[] = str_pad($label . ':', 7) . ' ' . $value;
        }
        $lines[] = '';
        $lines[] = $body;
        $lines[] = '';
        $lines[] = 'Reply to this email to answer ' . $name . ' directly.';

        $html = '<h2 style="font:600 18px system-ui,sans-serif;margin:0 0 12px">New message #' . $id . '</h2>'
            . '<table style="font:14px system-ui,sans-serif;border-collapse:collapse">'
            . '<tr><td style="padding:2px 12px 2px 0;color:#64748b">Name</td><td>' . htmlspecialchars($name, ENT_QUOTES) . '</td></tr>'
            . '<tr><td style="padding:2px 12px 2px 0;color:#64748b">Email</td><td>' . htmlspecialchars($email, ENT_QUOTES) . '</td></tr>';
        foreach ($extra as $label => $value) {
            $html .= '<tr><td style="padding:2px 12px 2px 0;color:#64748b">' . htmlspecialchars($label, ENT_QUOTES) . '</td><td>'
                . nl2br(htmlspecialchars($value, ENT_QUOTES)) . '</td></tr>';
        }
        $html .= '</table><hr style="border:none;border-top:1px solid #e2e8f0;margin:16px 0">'
            . '<div style="font:15px/1.6 system-ui,sans-serif">' . nl2br(htmlspecialchars($body, ENT_QUOTES)) . '</div>';

        return Mailer::send([
            'to' => $to,
            'subject' => ($subject !== '' ? $subject : 'Contact form message') . ' — ' . $name,
            'html' => $html,
            'text' => implode("\n", $lines),
            'reply_to' => $email,
            'reply_name' => $name,
        ]);
    }

    /* --------------------------------------------------------------- helpers */

    private static function line(string $value, int $limit): string
    {
        $value = str_replace(["\r", "\n", "\0"], ' ', $value);
        $value = trim(preg_replace('~\s+~', ' ', $value) ?? '');
        return mb_substr($value, 0, $limit);
    }

    private static function ip(): string
    {
        $ip = (string) ($_SERVER['REMOTE_ADDR'] ?? '');
        return filter_var($ip, FILTER_VALIDATE_IP) !== false ? $ip : '0.0.0.0';
    }

    private static function currentUrl(): string
    {
        $path = (string) ($_SERVER['REQUEST_URI'] ?? '/');
        return mb_substr($path, 0, 255);
    }

    /**
     * Five submissions per hour per IP, then a fifteen-minute cool-off.
     *
     * Uses the same `rate_limits` table as the panel's login throttling, so the
     * numbers are visible in Activity → housekeeping. Without a database it falls
     * back to an hourly file counter.
     */
    private static function throttle(string $ip): bool
    {
        if (!Db::available() || !Db::hasTable('rate_limits')) {
            return self::fileLimit($ip);
        }
        $key = mb_substr('contact:' . $ip, 0, 190);
        $row = Db::one('SELECT * FROM rate_limits WHERE rkey = ?', [$key]);
        $now = time();
        if ($row === null) {
            Db::insert('rate_limits', ['rkey' => $key, 'hits' => 1, 'window_start' => date('Y-m-d H:i:s', $now)]);
            return true;
        }
        if (!empty($row['blocked_until']) && strtotime((string) $row['blocked_until']) > $now) {
            return false;
        }
        $start = strtotime((string) $row['window_start']) ?: $now;
        if ($now - $start > 3600) {
            Db::exec('UPDATE rate_limits SET hits = 1, window_start = ?, blocked_until = NULL WHERE rkey = ?', [date('Y-m-d H:i:s', $now), $key]);
            return true;
        }
        $hits = (int) $row['hits'] + 1;
        $blocked = $hits > 5 ? date('Y-m-d H:i:s', $now + 900) : null;
        Db::exec('UPDATE rate_limits SET hits = ?, blocked_until = ? WHERE rkey = ?', [$hits, $blocked, $key]);
        return $hits <= 5;
    }

    /** Fallback throttle for the file-based site (no database yet). */
    private static function fileLimit(string $ip): bool
    {
        $dir = dirname(__DIR__) . '/data/cache';
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
        $file = $dir . '/contact-' . date('Ymd-H') . '.json';
        $data = is_file($file) ? json_decode((string) file_get_contents($file), true) : [];
        $data = is_array($data) ? $data : [];
        $count = (int) ($data[$ip] ?? 0);
        if ($count >= 5) {
            return false;
        }
        $data[$ip] = $count + 1;
        @file_put_contents($file, json_encode($data), LOCK_EX);
        return true;
    }
}
