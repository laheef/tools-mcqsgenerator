<?php
/**
 * Contact form fields — the form on the contact page is data, not markup.
 *
 * Add, rename, reorder, mark required, switch type (text, email, tel, textarea,
 * select, checkbox) and disable. The public form, its validation and the inbox
 * all read this list.
 */

declare(strict_types=1);
// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}


use Onim\Admin\Activity;
use Onim\Admin\Csrf;
use Onim\Admin\Flash;
use Onim\Db;

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    Csrf::requirePost();
    Csrf::assert();
    $do = post('do', 'save') ?? 'save';

    if ($do === 'delete') {
        $id = post_int('id');
        Db::delete('contact_fields', 'id = ?', [$id]);
        Activity::log('contact_field_deleted', 'contact', (string) $id, 'Deleted a contact form field');
        Flash::success('Field removed from the form.');
        redirect_to(admin_url('forms'));
    }

    if ($do === 'add') {
        $label = trim((string) (post('label', '') ?? ''));
        $type = (string) (post('ftype', 'text') ?? 'text');
        if ($label === '') {
            Flash::error('The field needs a label.');
            redirect_to(admin_url('forms'));
        }
        if (!in_array($type, ['text', 'email', 'tel', 'textarea', 'select', 'checkbox'], true)) {
            $type = 'text';
        }
        $key = \Onim\Cms::slugify($label);
        $key = str_replace('-', '_', $key);
        if ($key === '') {
            $key = 'field_' . substr(bin2hex(random_bytes(3)), 0, 5);
        }
        $existing = Db::one('SELECT id FROM contact_fields WHERE fkey = ?', [$key]);
        if ($existing !== null) {
            $key .= '_' . substr(bin2hex(random_bytes(2)), 0, 4);
        }
        $max = (int) Db::value('SELECT COALESCE(MAX(sort_order), 0) FROM contact_fields', [], 0);
        Db::insert('contact_fields', [
            'fkey' => $key, 'label' => mb_substr($label, 0, 120), 'ftype' => $type,
            'placeholder' => '', 'options' => null, 'required' => 0, 'sort_order' => $max + 10, 'enabled' => 1,
        ]);
        Activity::log('contact_field_added', 'contact', $key, 'Added the field ' . $label);
        Flash::success('Field added.');
        redirect_to(admin_url('forms'));
    }

    if ($do === 'save') {
        $fields = post_deep('fields');
        $saved = 0;
        foreach ($fields as $id => $data) {
            $id = (int) $id;
            if ($id <= 0) {
                continue;
            }
            $options = null;
            if (trim((string) ($data['options'] ?? '')) !== '') {
                $options = json_encode(array_values(array_filter(array_map('trim', explode("\n", (string) $data['options'])))), JSON_UNESCAPED_UNICODE);
            }
            Db::update('contact_fields', [
                'label'       => mb_substr(trim((string) ($data['label'] ?? '')), 0, 120) ?: 'Field',
                'ftype'       => in_array($data['ftype'] ?? 'text', ['text', 'email', 'tel', 'textarea', 'select', 'checkbox'], true) ? (string) $data['ftype'] : 'text',
                'placeholder' => mb_substr(trim((string) ($data['placeholder'] ?? '')), 0, 190),
                'options'     => $options,
                'required'    => !empty($data['required']) ? 1 : 0,
                'sort_order'  => (int) ($data['sort_order'] ?? 0),
                'enabled'     => !empty($data['enabled']) ? 1 : 0,
            ], 'id = :id', [':id' => $id]);
            $saved++;
        }
        Activity::log('contact_fields_saved', 'contact', '', 'Saved ' . $saved . ' contact field(s)');
        Flash::success($saved . ' field' . ($saved === 1 ? '' : 's') . ' saved.');
        redirect_to(admin_url('forms'));
    }

    redirect_to(admin_url('forms'));
}

$fields = Db::all('SELECT * FROM contact_fields ORDER BY sort_order, id');
$pageTitle = 'Contact form';
$title = $pageTitle;
$wide = true;
render('forms', compact('fields', 'pageTitle', 'title', 'wide'));
