# Engagement data

Written at runtime by `lib/Engagement.php` and `api.php`.

| File | Contents |
| --- | --- |
| `likes.json` | calculator path => like count |
| `reviews.jsonl` | one published review per line (append-only) |
| `visitors.json` | anonymous visitor token => which paths it liked / when it reviewed |

The directory must be writable by the web user. If it is not, the site still
renders — likes and reviews report that they cannot be saved instead of pretending.

Deleting `likes.json` or `reviews.jsonl` resets the counters; nothing else references them.
