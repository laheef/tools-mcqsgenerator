<?php
/**
 * Mailer — sends the panel's transactional mail (contact notifications, password
 * resets, the SMTP test) without a mail library.
 *
 * Three transports, chosen in Settings → Email:
 *   smtp  authenticated SMTP with STARTTLS or implicit SSL (Hostinger's
 *         smtp.hostinger.com on 465/587 is the intended production path)
 *   mail  PHP's mail(), for hosts that deliver locally
 *   log   writes to data/cache/mail-<date>.log instead of sending; the default
 *         on a fresh install so nothing is silently lost and nothing mysteriously
 *         "works" on a developer machine
 *
 * Every method returns the same shape, `['ok' => bool, 'error' => string,
 * 'transport' => string]`, so the inbox can show exactly why a notification did
 * not go out instead of pretending it did.
 */

declare(strict_types=1);

namespace Onim;

final class Mailer
{
    /**
     * Send one message.
     *
     * @param array{to:string,subject:string,html?:string,text?:string,reply_to?:string,reply_name?:string} $message
     * @return array{ok:bool,error:string,transport:string}
     */
    public static function send(array $message): array
    {
        $to = trim((string) ($message['to'] ?? ''));
        $subject = trim((string) ($message['subject'] ?? ''));
        if ($to === '' || filter_var($to, FILTER_VALIDATE_EMAIL) === false) {
            return ['ok' => false, 'error' => 'No valid recipient address is configured (Settings → Email → “Send notifications to”).', 'transport' => 'none'];
        }
        if ($subject === '') {
            $subject = Cms::siteName() . ' notification';
        }

        $html = (string) ($message['html'] ?? '');
        $text = (string) ($message['text'] ?? '');
        if ($text === '') {
            $text = trim(html_entity_decode(strip_tags(preg_replace('~<br\s*/?>|</p>~i', "\n", $html) ?? $html), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
        }
        if ($html === '') {
            $html = '<p>' . nl2br(htmlspecialchars($text, ENT_QUOTES, 'UTF-8')) . '</p>';
        }

        $transport = (string) Cms::setting('mail_transport', 'log');
        $fromEmail = (string) Cms::setting('mail_from_email', '');
        if ($fromEmail === '' || filter_var($fromEmail, FILTER_VALIDATE_EMAIL) === false) {
            $fromEmail = 'no-reply@' . self::hostname();
        }
        $fromName = (string) Cms::setting('mail_from_name', Cms::siteName());

        $headers = [
            'From' => self::address($fromEmail, $fromName),
            'MIME-Version' => '1.0',
            'Date' => date('r'),
            'Message-ID' => '<' . bin2hex(random_bytes(12)) . '@' . self::hostname() . '>',
            'X-Mailer' => 'Onim Calculator panel',
        ];
        $replyTo = trim((string) ($message['reply_to'] ?? ''));
        if ($replyTo !== '' && filter_var($replyTo, FILTER_VALIDATE_EMAIL) !== false) {
            $headers['Reply-To'] = self::address($replyTo, (string) ($message['reply_name'] ?? ''));
        }

        $boundary = 'omni-' . bin2hex(random_bytes(8));
        $headers['Content-Type'] = 'multipart/alternative; boundary="' . $boundary . '"';

        $body = "--$boundary\r\nContent-Type: text/plain; charset=UTF-8\r\nContent-Transfer-Encoding: 8bit\r\n\r\n"
            . $text . "\r\n"
            . "--$boundary\r\nContent-Type: text/html; charset=UTF-8\r\nContent-Transfer-Encoding: 8bit\r\n\r\n"
            . $html . "\r\n"
            . "--$boundary--\r\n";

        $encodedSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

        if ($transport === 'smtp') {
            return self::smtp($to, $encodedSubject, $headers, $body);
        }
        if ($transport === 'mail') {
            $headerLines = [];
            foreach ($headers as $name => $value) {
                $headerLines[] = $name . ': ' . $value;
            }
            $ok = @mail($to, $encodedSubject, $body, implode("\r\n", $headerLines));
            return ['ok' => (bool) $ok, 'error' => $ok ? '' : 'PHP mail() returned false. On shared hosting this usually means the sendmail path is not configured — switch to SMTP in Settings → Email.', 'transport' => 'mail'];
        }

        // log transport: keep the message so it can be inspected, never claim it was delivered
        $dir = dirname(__DIR__) . '/data/cache';
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
        $file = $dir . '/mail-' . date('Y-m-d') . '.log';
        $entry = '[' . date('c') . '] transport=log to=' . $to . ' subject=' . $subject . "\n" . $body . "\n\n";
        $written = @file_put_contents($file, $entry, FILE_APPEND);
        return [
            'ok' => $written !== false,
            'error' => $written === false
                ? 'Could not write data/cache/mail-' . date('Y-m-d') . '.log'
                : 'Transport is “log”: the message was written to data/cache/mail-' . date('Y-m-d') . '.log and not emailed. Set an SMTP host in Settings → Email to deliver it.',
            'transport' => 'log',
        ];
    }

    /** Settings → Email → “Send test email” button. */
    public static function test(string $to): array
    {
        return self::send([
            'to' => $to,
            'subject' => 'Test message from ' . Cms::siteName(),
            'html' => '<p>This is a test from the admin panel. If you are reading it in your inbox, mail delivery works.</p>'
                . '<p>Sent ' . date('c') . ' using the “' . self::transportName() . '” transport.</p>',
            'text' => 'This is a test from the admin panel of ' . Cms::siteName() . '.',
        ]);
    }

    public static function transportName(): string
    {
        return (string) Cms::setting('mail_transport', 'log');
    }

    /* ------------------------------------------------------------------ smtp */

    /**
     * Minimal SMTP client: EHLO, optional STARTTLS, AUTH LOGIN/PLAIN, MAIL FROM,
     * RCPT TO, DATA. Binary-safe enough for UTF-8 bodies (8bit is declared and
     * the body is not dot-stuffed with unicode quotes).
     *
     * @param array<string,string> $headers
     * @return array{ok:bool,error:string,transport:string}
     */
    private static function smtp(string $to, string $subject, array $headers, string $body): array
    {
        $host = trim((string) Cms::setting('smtp_host', ''));
        $port = (int) Cms::setting('smtp_port', 587);
        $secure = (string) Cms::setting('smtp_secure', 'tls');
        $user = (string) Cms::setting('smtp_user', '');
        $pass = Cms::decryptSecret((string) Cms::setting('smtp_pass', ''));

        if ($host === '') {
            return ['ok' => false, 'error' => 'SMTP transport is selected but no SMTP host is set (Settings → Email).', 'transport' => 'smtp'];
        }

        $scheme = $secure === 'ssl' ? 'ssl://' : '';
        $errno = 0;
        $errstr = '';
        $socket = @stream_socket_client($scheme . $host . ':' . $port, $errno, $errstr, 15);
        if ($socket === false) {
            return ['ok' => false, 'error' => 'Could not connect to ' . $host . ':' . $port . ' — ' . ($errstr !== '' ? $errstr : 'connection refused or blocked by the host.'), 'transport' => 'smtp'];
        }
        stream_set_timeout($socket, 15);

        try {
            self::expect($socket, '220', 'greeting');
            $hostname = self::hostname();
            self::command($socket, 'EHLO ' . $hostname, '250', 'EHLO');

            if ($secure === 'tls') {
                self::command($socket, 'STARTTLS', '220', 'STARTTLS');
                $method = STREAM_CRYPTO_METHOD_TLS_CLIENT;
                if (!@stream_socket_enable_crypto($socket, true, $method)) {
                    throw new \RuntimeException('Could not start TLS on the SMTP connection.');
                }
                self::command($socket, 'EHLO ' . $hostname, '250', 'EHLO after STARTTLS');
            }

            if ($user !== '') {
                self::command($socket, 'AUTH LOGIN', '334', 'AUTH LOGIN');
                self::command($socket, base64_encode($user), '334', 'SMTP username');
                self::command($socket, base64_encode($pass), '235', 'SMTP password');
            }

            $from = preg_replace('~^From:\s*~i', '', (string) ($headers['From'] ?? '')) ?? '';
            $fromAddress = '';
            if (preg_match('~<([^>]+)>~', $from, $m) === 1) {
                $fromAddress = $m[1];
            } elseif (filter_var(trim($from), FILTER_VALIDATE_EMAIL) !== false) {
                $fromAddress = trim($from);
            }
            if ($fromAddress === '') {
                throw new \RuntimeException('The “From” address is not valid.');
            }

            self::command($socket, 'MAIL FROM:<' . $fromAddress . '>', '250', 'MAIL FROM');
            self::command($socket, 'RCPT TO:<' . $to . '>', '250', 'RCPT TO');
            self::command($socket, 'DATA', '354', 'DATA');

            $data = 'To: ' . $to . "\r\n"
                . 'Subject: ' . $subject . "\r\n";
            foreach ($headers as $name => $value) {
                $data .= $name . ': ' . $value . "\r\n";
            }
            $data .= "\r\n" . $body;
            // dot-stuffing per RFC 5321
            $data = preg_replace('~^\.~m', '..', $data) ?? $data;

            $result = self::command($socket, $data . "\r\n.", '250', 'message body');
            fwrite($socket, "QUIT\r\n");
            fclose($socket);
            return ['ok' => true, 'error' => '', 'transport' => 'smtp'];
        } catch (\Throwable $e) {
            @fwrite($socket, "QUIT\r\n");
            @fclose($socket);
            return ['ok' => false, 'error' => $e->getMessage(), 'transport' => 'smtp'];
        }
    }

    /** @param resource $socket */
    private static function command($socket, string $command, string $expectCode, string $label): void
    {
        @fwrite($socket, $command . "\r\n");
        self::expect($socket, $expectCode, $label);
    }

    /** @param resource $socket */
    private static function expect($socket, string $code, string $label): void
    {
        $response = '';
        while (($line = fgets($socket, 1024)) !== false) {
            $response .= $line;
            if (strlen($line) < 4 || $line[3] !== '-') {
                break;
            }
        }
        if ($response === '') {
            throw new \RuntimeException('The SMTP server closed the connection during ' . $label . '.');
        }
        if (!str_starts_with(ltrim($response), $code)) {
            throw new \RuntimeException('SMTP ' . $label . ' failed: ' . trim($response));
        }
    }

    /* --------------------------------------------------------------- helpers */

    private static function address(string $email, string $name): string
    {
        $name = trim(preg_replace('~[\r\n"<>]~', '', $name) ?? '');
        if ($name === '') {
            return $email;
        }
        return '=?UTF-8?B?' . base64_encode($name) . '?= <' . $email . '>';
    }

    private static function hostname(): string
    {
        $host = (string) ($_SERVER['HTTP_HOST'] ?? '');
        $host = preg_replace('~:\d+$~', '', $host) ?? '';
        $host = preg_replace('~[^a-z0-9.\-]~i', '', $host) ?? '';
        return $host !== '' ? $host : 'localhost';
    }
}
