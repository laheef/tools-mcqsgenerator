<?php
/**
 * Pagination — the arithmetic plus the markup for every list screen, so page
 * counts, "1–25 of 3,831" and the preserved filter query string behave the same
 * everywhere.
 */

declare(strict_types=1);


namespace Omni\Admin;

// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('OMNI_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

final class Pagination
{
    public int $page;
    public int $perPage;
    public int $total;

    public function __construct(int $total, int $perPage = 25, int $page = 1)
    {
        $this->total   = max(0, $total);
        $this->perPage = max(1, min(200, $perPage));
        $pages = $this->pages();
        $this->page = max(1, min($pages === 0 ? 1 : $pages, $page));
    }

    public function pages(): int
    {
        return (int) ceil($this->total / $this->perPage);
    }

    public function offset(): int
    {
        return ($this->page - 1) * $this->perPage;
    }

    public function from(): int
    {
        return $this->total === 0 ? 0 : $this->offset() + 1;
    }

    public function to(): int
    {
        return min($this->total, $this->offset() + $this->perPage);
    }

    public function summary(): string
    {
        if ($this->total === 0) {
            return 'No results';
        }
        return sprintf('%s–%s of %s', number_format($this->from()), number_format($this->to()), number_format($this->total));
    }

    /** URL for a page number, keeping the current filters. */
    public function url(int $page): string
    {
        $params = $_GET;
        $params['pg'] = $page;
        return '?' . http_build_query($params);
    }

    public function render(): string
    {
        if ($this->pages() <= 1) {
            return '<div class="pagination"><span class="meta">' . e($this->summary()) . '</span></div>';
        }
        $out = ['<nav class="pagination" aria-label="Pagination">'];
        $out[] = $this->page > 1
            ? '<a href="' . e($this->url($this->page - 1)) . '" rel="prev" aria-label="Previous page">‹</a>'
            : '<span class="is-gap" aria-hidden="true">‹</span>';

        $last = 0;
        for ($i = 1; $i <= $this->pages(); $i++) {
            if ($i !== 1 && $i !== $this->pages() && abs($i - $this->page) > 2) {
                if ($last !== 0 && $last !== $i - 1) {
                    $out[] = '<span class="is-gap">…</span>';
                }
                $last = $i;
                continue;
            }
            $out[] = $i === $this->page
                ? '<span class="is-current" aria-current="page">' . $i . '</span>'
                : '<a href="' . e($this->url($i)) . '">' . $i . '</a>';
            $last = $i;
        }

        $out[] = $this->page < $this->pages()
            ? '<a href="' . e($this->url($this->page + 1)) . '" rel="next" aria-label="Next page">›</a>'
            : '<span class="is-gap" aria-hidden="true">›</span>';
        $out[] = '<span class="meta">' . e($this->summary()) . '</span>';
        $out[] = '</nav>';
        return implode('', $out);
    }
}
