<?php
/**
 * A search box for a list that is already on the page.
 *
 * Category and section pages list everything they hold, and a page of 320
 * calculators had no way to ask it a question — the only search on the site
 * lived in the header and on the full catalogue. This is that missing control.
 *
 * It works twice over:
 *
 *   - the form is a GET form, so `?q=dose` narrows the list on the server and
 *     the answer is a link that can be bookmarked, crawled and opened with the
 *     script off;
 *   - the inline script narrows what is already rendered as you type, so a
 *     keystroke does not cost a round trip, and it keeps the form's action in
 *     sync so submitting does the same thing on the server.
 *
 * @var string $action    the path to post to — the page it sits on
 * @var string $q         the search the server already applied
 * @var int    $total     how many the page holds before filtering
 * @var int    $shown     how many are rendered right now
 * @var string $noun      "calculator" or "tool", for the placeholder
 * @var string $scope     the category or section name, for the placeholder
 */

declare(strict_types=1);

use Onim\Format;
use Onim\View;

$scope = trim((string) ($scope ?? ''));
$total = (int) $total;
/* "1 calculator", not "1 calculators" — the count is in the sentence. */
if ($total === 1 && str_ends_with($noun, 's')) {
    $noun = substr($noun, 0, -1);
}
$placeholder = 'Search ' . Format::count($total) . ' ' . $noun
    . ($scope !== '' ? ' in ' . $scope : '') . '…';
?>
<form class="list-search" method="get" action="<?= View::escape(View::url($action)) ?>"
      role="search" data-list-search autocomplete="off">
    <label class="sr-only" for="list-search-q"><?= View::escape($placeholder) ?></label>
    <div class="browse-search-field">
        <?= View::icon('search', 20) ?>
        <input id="list-search-q" type="search" name="q" value="<?= View::escape($q) ?>"
               placeholder="<?= View::escape($placeholder) ?>" data-list-input>
    </div>
    <button type="submit" class="btn btn-soft">Search</button>
    <?php if ($q !== ''): ?>
        <a class="list-search-clear" href="<?= View::escape(View::url($action)) ?>">
            Clear<span class="sr-only"> the search</span>
        </a>
    <?php endif; ?>
    <?php /* The page head already says how many there are; this line only
             earns its place once it can say how many still match. */ ?>
    <p class="list-search-count" data-list-count aria-live="polite"<?= $q === '' ? ' hidden' : '' ?>>
        <?= View::escape(Format::count((int) $shown)) ?> of <?= View::escape(Format::count((int) $total)) ?>
        match “<?= View::escape($q) ?>”
    </p>
</form>
<script>
(function () {
    var form = document.querySelector('[data-list-search]');
    if (!form) return;
    var input = form.querySelector('[data-list-input]');
    var count = form.querySelector('[data-list-count]');
    if (!input) return;

    /* The list is rendered after this box, so the items cannot be collected at
       parse time — they are looked up on every pass instead. */
    function items() {
        return Array.prototype.slice.call(document.querySelectorAll('[data-search-item]'));
    }

    function apply() {
        var list = items();
        if (!list.length) return;
        var q = input.value.trim().toLowerCase();
        var shown = 0;
        list.forEach(function (item) {
            var hit = q === '' || item.textContent.toLowerCase().indexOf(q) !== -1;
            item.hidden = !hit;
            if (hit) shown++;
        });
        /* A heading with nothing under it is noise: hide the block while a
           search is running, and bring it back when the box is cleared. */
        Array.prototype.forEach.call(document.querySelectorAll('[data-search-group]'), function (group) {
            var any = group.querySelector('[data-search-item]:not([hidden])');
            group.hidden = q !== '' && !any;
        });
        /* The A-Z jump bar is a map of the list: a letter with nothing left
           under it is a dead link, so it goes away with its section. */
        Array.prototype.forEach.call(document.querySelectorAll('.alpha-nav a[href^="#letter-"]'), function (link) {
            var target = document.getElementById(link.getAttribute('href').slice(1));
            link.hidden = !!target && target.hidden;
        });
        if (count) {
            count.hidden = q === '';
            count.textContent = q === ''
                ? list.length + ' on this page'
                : shown + ' of ' + list.length + ' match \u201c' + input.value.trim() + '\u201d';
        }
    }

    input.addEventListener('input', apply);
    form.addEventListener('submit', function (event) {
        /* Nothing to ask the server: the list is already here and already
           filtered exactly the way the server would filter it. */
        event.preventDefault();
        apply();
    });
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', apply);
    } else {
        apply();
    }
})();
</script>
