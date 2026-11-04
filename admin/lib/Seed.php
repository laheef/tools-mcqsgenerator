<?php
/**
 * Seed — the defaults an installed panel starts with.
 *
 * Everything written here is real content the site can serve immediately:
 * settings that match the current design, the navigation the front page already
 * has, five legal/info pages, and one welcome post. Nothing is placeholder text
 * and nothing is re-seeded if a row already exists, so running it twice is safe.
 */

declare(strict_types=1);


namespace Onim\Admin;

// Refuse direct HTTP requests: this file is only ever included by the panel.
if (!defined('ONIM_PANEL')) {
    http_response_code(403);
    exit('Forbidden');
}

use Onim\Cms;
use Onim\Data;
use Onim\Db;

final class Seed
{
    /**
     * @param array{name:string,email:string,pass:string} $admin
     * @return array{ok:bool,errors:array<int,string>,created:array<int,string>}
     */
    public static function run(array $admin): array
    {
        $errors = [];
        $created = [];

        try {
            Db::begin();

            /* ------------------------------------------------------- admin */
            $existing = Db::one('SELECT id FROM users WHERE email = ? LIMIT 1', [mb_strtolower($admin['email'])]);
            if ($existing === null) {
                Db::insert('users', [
                    'name'          => $admin['name'],
                    'email'         => mb_strtolower($admin['email']),
                    'password_hash' => Auth::hash($admin['pass']),
                    'role'          => 'administrator',
                    'status'        => 'active',
                    'bio'           => '',
                ]);
                $created[] = 'administrator account';
            }
            $adminId = (int) Db::value('SELECT id FROM users WHERE email = ?', [mb_strtolower($admin['email'])], 0);

            /* ---------------------------------------------------- settings */
            foreach (self::settings() as $key => $value) {
                if (Db::value('SELECT COUNT(*) FROM settings WHERE skey = ?', [$key], 0) > 0) {
                    continue;
                }
                Db::insert('settings', [
                    'skey'     => $key,
                    'svalue'   => (string) $value,
                    'sgroup'   => self::groupFor($key),
                    'is_secret' => 0,
                ]);
            }
            /* Every named ad slot starts empty, one row each. Seeding them means
               the panel shows "empty" from a real row and a slot added to the
               registry later is picked up by the next install. */
            foreach (\Onim\Ads::slots() as $slotKey => $slotMeta) {
                $key = 'ads_slot_' . $slotKey;
                if (Db::value('SELECT COUNT(*) FROM settings WHERE skey = ?', [$key], 0) > 0) {
                    continue;
                }
                Db::insert('settings', [
                    'skey'      => $key,
                    'svalue'    => '',
                    'sgroup'    => 'analytics',
                    'is_secret' => 0,
                ]);
            }
            $created[] = 'settings';

            /* -------------------------------------------------- categories */
            foreach (Data::allCategories() as $i => $cat) {
                $slug = (string) ($cat['slug'] ?? '');
                if ($slug === '' || Db::value('SELECT COUNT(*) FROM categories WHERE slug = ?', [$slug], 0) > 0) {
                    continue;
                }
                Db::insert('categories', [
                    'slug'             => $slug,
                    'name'             => (string) ($cat['name'] ?? ucfirst($slug)),
                    'title'            => (string) ($cat['title'] ?? ''),
                    'description'      => (string) ($cat['description'] ?? ''),
                    'icon'             => (string) ($cat['icon'] ?? ''),
                    'meta_title'       => (string) ($cat['title'] ?? ''),
                    'meta_description' => mb_substr((string) ($cat['description'] ?? ''), 0, 320),
                    'sort_order'       => $i,
                    'status'           => 'published',
                ]);
            }
            $created[] = 'categories';

            /* ------------------------------------------------ home sections */
            if (Db::value('SELECT COUNT(*) FROM homepage_sections', [], 0) === 0) {
                $sections = [
                    ['hero', 'hero', '', '', [
                        'eyebrow' => 'Your life in',
                        'title'   => '{count} free calculators',
                        'note'    => '',
                        'search'  => 1,
                        'cta_label' => '',
                        'cta_url'   => '',
                    ], 10],
                    ['categories', 'category_grid', '', '', ['heading' => 'Browse calculators by category'], 20],
                    ['directory', 'calc_directory', 'All calculators, by category',
                     'Every category on the site, with a few of its calculators — or open the full catalogue and filter it.',
                     ['per_category' => 6], 25],
                    ['popular', 'popular', 'Most popular calculators', 'The ones people open most often', ['limit' => 12], 30],
                    ['howitworks', 'howto', 'What every calculator on this site actually does',
                     'Not a form with a number at the end — an equation you can turn around, with the working shown.', [], 45],
                    ['how', 'rich_text', 'How these calculators work', '', [
                        'html' => '<ol class="how-steps">'
                            . '<li class="how-step"><span class="how-num">1</span><h3>Fill the values you know</h3>'
                            . '<p>Every calculator is a set of equations rather than a fixed form. Type into any field — the empty ones are solved for you.</p></li>'
                            . '<li class="how-step"><span class="how-num">2</span><h3>Read the units you work in</h3>'
                            . '<p>Switch between metric and imperial, percent and decimal, currencies and prefix scales without retyping a number.</p></li>'
                            . '<li class="how-step"><span class="how-num">3</span><h3>Check the formula</h3>'
                            . '<p>The live formula line under each section shows the equation that produced your result, with your own values substituted in.</p></li>'
                            . '</ol>',
                    ], 40],
                ];
                foreach ($sections as [$key, $type, $title, $subtitle, $config, $order]) {
                    Db::insert('homepage_sections', [
                        'skey'       => $key,
                        'stype'      => $type,
                        'title'      => $title,
                        'subtitle'   => $subtitle,
                        'config'     => json_encode($config, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
                        'sort_order' => $order,
                        'enabled'    => 1,
                    ]);
                }
                $created[] = 'homepage sections';
            }

            /* ---------------------------------------------- header navigation */
            if (Db::value("SELECT COUNT(*) FROM menu_items WHERE location = 'header'", [], 0) === 0) {
                $order = 0;
                foreach (Data::categories() as $cat) {
                    Db::insert('menu_items', [
                        'location'   => 'header',
                        'label'      => (string) $cat['name'],
                        'url'        => '/' . $cat['slug'],
                        'sort_order' => $order += 10,
                        'enabled'    => 1,
                    ]);
                }
                $created[] = 'header menu';
            }

            /* ------------------------------------------------ footer columns */
            if (Db::value('SELECT COUNT(*) FROM footer_columns', [], 0) === 0) {
                $order = 0;
                foreach (Data::categories() as $cat) {
                    $colId = Db::insert('footer_columns', [
                        'skey'       => 'cat-' . $cat['slug'],
                        'title'      => (string) $cat['name'],
                        'sort_order' => $order += 10,
                        'enabled'    => 1,
                    ]);
                    $linkOrder = 0;
                    foreach (array_slice(Data::byCategory((string) $cat['slug']), 0, 4) as $row) {
                        Db::insert('menu_items', [
                            'location'         => 'footer_column',
                            'footer_column_id' => $colId,
                            'label'            => (string) $row['name'],
                            'url'              => (string) $row['path'],
                            'sort_order'       => $linkOrder += 10,
                            'enabled'          => 1,
                        ]);
                    }
                }
                $created[] = 'footer columns';
            }

            /* -------------------------------------------------------- pages */
            $pages = self::pages();
            foreach ($pages as $slug => $page) {
                if (Db::value('SELECT COUNT(*) FROM pages WHERE slug = ?', [$slug], 0) > 0) {
                    continue;
                }
                Db::insert('pages', [
                    'slug'             => $slug,
                    'title'            => $page['title'],
                    'excerpt'          => mb_substr($page['excerpt'], 0, 320),
                    'content'          => $page['content'],
                    'template'         => $page['template'] ?? 'default',
                    'status'           => 'published',
                    'meta_title'       => $page['meta_title'] ?? $page['title'],
                    'meta_description' => mb_substr($page['meta_description'] ?? $page['excerpt'], 0, 320),
                    'show_in_header'   => 0,
                    'show_in_footer'   => 1,
                    'author_id'        => $adminId,
                ]);
            }
            $created[] = 'pages';

            /* ---------------------------------------------------- contact */
            if (Db::value('SELECT COUNT(*) FROM contact_fields', [], 0) === 0) {
                $fields = [
                    ['name', 'Your name', 'text', 'Jane Doe', null, 1, 10],
                    ['email', 'Your email', 'email', 'jane@example.com', null, 1, 20],
                    ['phone', 'Phone (optional)', 'tel', '+370 600 00000', null, 0, 30],
                    ['topic', 'What is this about?', 'select', '', ['Calculator bug', 'Missing calculator', 'Advertising', 'Something else'], 0, 40],
                    ['body', 'Message', 'textarea', 'Tell us what happened, and which calculator page you were on…', null, 1, 50],
                ];
                foreach ($fields as [$key, $label, $type, $placeholder, $options, $required, $order]) {
                    Db::insert('contact_fields', [
                        'fkey'        => $key,
                        'label'       => $label,
                        'ftype'       => $type,
                        'placeholder' => $placeholder,
                        'options'     => $options === null ? null : json_encode($options, JSON_UNESCAPED_UNICODE),
                        'required'    => $required,
                        'sort_order'  => $order,
                        'enabled'     => 1,
                    ]);
                }
                $created[] = 'contact form fields';
            }

            /* ------------------------------------------------------- blog */
            if (Db::value('SELECT COUNT(*) FROM posts', [], 0) === 0) {
                $tagId = Db::insert('tags', ['slug' => 'how-to', 'name' => 'How to', 'description' => 'Guides to reading and checking a calculator result.']);
                $postId = Db::insert('posts', [
                    'slug'             => 'how-to-read-a-calculator-result',
                    'title'            => 'How to read a calculator result without trusting it blindly',
                    'excerpt'          => 'Every calculator here shows its formula. This is a five-minute routine for checking that the number on screen actually answers your question.',
                    'content'          => self::welcomePost(),
                    'status'           => 'published',
                    'published_at'     => date('Y-m-d H:i:s'),
                    'author_id'        => $adminId,
                    'meta_title'       => 'How to read a calculator result',
                    'meta_description' => 'A short routine for sanity-checking any calculator result: units, order of magnitude, boundary cases and the formula behind the answer.',
                ]);
                Db::insert('post_tags', ['post_id' => $postId, 'tag_id' => $tagId]);
                $created[] = 'welcome post';
            }

            Db::commit();
        } catch (\Throwable $e) {
            Db::rollback();
            $errors[] = $e->getMessage();
        }

        Cms::flush();
        return ['ok' => $errors === [], 'errors' => $errors, 'created' => $created];
    }

    /** @return array<string,string> */
    private static function settings(): array
    {
        $defaults = [
            /* general */
            'site_name'           => SITE_NAME,
            'site_tagline'        => SITE_TAGLINE,
            'site_description'    => SITE_DESCRIPTION,
            'site_url'            => '',
            'logo_path'           => '',
            'favicon_path'        => '',
            'contact_email'       => '',
            'contact_phone'       => '',
            'contact_address'     => '',
            'locale'              => 'en_US',
            'timezone'            => 'UTC',
            'date_format'         => 'j M Y',
            'calculators_per_page' => '48',
            'posts_per_page'      => '9',
            /* header */
            'header_sticky'         => '1',
            'header_search_enabled' => '1',
            'header_show_count'     => '1',
            'header_cta_label'      => '',
            'header_cta_url'        => '',
            'header_notice'         => '',
            /* footer */
            'footer_about'          => 'Every calculator here shows its formula, its units and a worked example. No sign-up, no paywall, no invented numbers.',
            'footer_copyright'      => '',
            'footer_show_notice'    => '1',
            'newsletter_enabled'    => '0',
            'newsletter_note'       => 'One short email when new calculators land. No spam.',
            'social_links'          => '[]',
            /* appearance */
            'brand_primary'         => '#1a73e8',
            'brand_accent'          => '#ff6b35',
            'color_mode'            => 'light',
            'font_heading'          => 'system',
            'font_body'             => 'system',
            'radius_scale'          => 'medium',
            'container_width'       => '1200',
            'button_style'          => 'solid',
            'heading_weight'        => '700',
            /* seo */
            'seo_default_title'     => '',
            'seo_default_description' => '',
            'seo_title_suffix'      => ' | ' . SITE_NAME,
            'seo_og_image'          => '',
            'seo_twitter_handle'    => '',
            'seo_indexing'          => '1',
            'seo_robots_extra'      => '',
            'seo_sitemap_blog'      => '1',
            'seo_breadcrumbs'       => '1',
            'seo_structured_data'   => '1',
            /* analytics + ads */
            'analytics_provider'        => 'none',
            'analytics_id'              => '',
            'analytics_custom_head'     => '',
            'analytics_internal_tracking' => '1',
            'ads_enabled'               => '0',
            'ads_head_code'             => '',
            'ads_inline_code'           => '',
            'ads_txt'                   => '',
            /* One empty row per named slot, so the panel's "empty" badge is a
               stored fact rather than a missing key. Generated from the
               registry: see Ads::slots(). */
            /* mail */
            'mail_transport'      => 'mail',
            'mail_from_name'      => SITE_NAME,
            'mail_from_email'     => '',
            'mail_to'             => '',
            'smtp_host'           => '',
            'smtp_port'           => '587',
            'smtp_user'           => '',
            'smtp_pass'           => '',
            'smtp_secure'         => 'tls',
            /* contact */
            'contact_form_enabled'   => '1',
            'contact_success'        => 'Thanks — your message is in. We reply to everything that needs an answer.',
            'contact_captcha'        => '1',
            'contact_privacy_note'   => 'We use your message to answer you. Nothing else.',
            /* system */
            'cache_enabled'       => '1',
            'cache_ttl'           => '300',
            'pagination_style'    => 'numbers',
            'admin_theme'         => 'light',
        ];
        return $defaults;
    }

    private static function groupFor(string $key): string
    {
        foreach (['site_', 'contact_'] as $prefix) {
            if (str_starts_with($key, $prefix)) {
                return 'general';
            }
        }
        foreach (['header_', 'footer_', 'newsletter_', 'social_'] as $prefix) {
            if (str_starts_with($key, $prefix)) {
                return 'layout';
            }
        }
        foreach (['brand_', 'color_', 'font_', 'radius_', 'container_', 'button_', 'heading_', 'admin_'] as $prefix) {
            if (str_starts_with($key, $prefix)) {
                return 'appearance';
            }
        }
        if (str_starts_with($key, 'seo_')) {
            return 'seo';
        }
        if (str_starts_with($key, 'analytics_') || str_starts_with($key, 'ads_')) {
            return 'analytics';
        }
        if (str_starts_with($key, 'mail_') || str_starts_with($key, 'smtp_')) {
            return 'mail';
        }
        return 'system';
    }

    /** @return array<string,array<string,string>> */
    private static function pages(): array
    {
        return [
            'about' => [
                'title' => 'About Onim',
                'excerpt' => 'A free library of 4,000+ calculators and file tools, built so that every answer comes with the working that produced it.',
                'meta_title' => 'About Onim — every tool shows its working',
                'meta_description' => 'Who builds Onim, how the 4,000 calculators and file tools are made and checked, how the site is funded, and what it does with the data you type.',
                'content' => <<<'HTML'
<p><strong>Onim</strong> is a free library of calculators and browser tools. You type a number or drop in a file, you get an answer, and the page shows the formula or the method that produced it. There is no account, no paywall and no “unlock the result” step. If a page cannot explain how it reached its answer, that page is not finished.</p><h2>What is here</h2><p>The site is organised in fifteen sections — from Biology and Chemistry to Design &amp; CSS and Text &amp; Writing — and holds two kinds of tool:</p><ul>
<li><strong>Calculators.</strong> A page with inputs, a result and the equation it used. Roughly four thousand of them: percentages, loans, units, health, geometry, date arithmetic and a great deal of science.</li>
<li><strong>File tools.</strong> Converters, compressors, resizers, encoders and formatters that work on a file you hand them — an image, a PDF, a spreadsheet. The file is processed in the page; it is never uploaded to a server.</li>
</ul><h2>How a page is built</h2><p>Each calculator is described by the relationships between its inputs. Those equations are what the page runs on — once on the server while the page is drawn, and again in your browser the moment you press Calculate, so the two can be compared. Where a problem needs more than arithmetic (a table lookup, an iterative solve, a piecewise rule, a tax band), that logic is written out step by step instead of being hidden in a black box.</p><p>Every page carries the same furniture, because a result without context is not much use: the formula with its variables defined, a worked example with real numbers, the assumptions the answer rests on, a table of neighbouring results, and the questions people ask about it.</p><h2>How the answers are checked</h2><p>Each calculator is tested against worked examples whose results are stated independently of the code: the answer is computed by hand or taken from an authoritative source, then the page has to reproduce it. A calculator that disagrees with its worked example is a bug, and it is fixed rather than annotated. File tools are tested on files with known properties — a 1200 pixel image that has to come back 1200 pixels wide, a PDF whose page count must not change.</p><h2>What happens to what you type</h2><p>Calculations run in your browser and on this server while the page is being drawn. We do not store your inputs, we do not build profiles, and we do not sell data to anyone. Uploaded files are read in your browser and never leave it. The only information we keep is what you deliberately send — a message through the contact form — and we keep that only as long as it takes to answer it. The <a href="/privacy">privacy policy</a> spells this out in detail.</p><h2>How the site is paid for</h2><p>Onim is free to use and costs money to run. It is funded by advertising: a small number of clearly marked placements, never inside a result and never between you and an answer. Advertisers do not see your inputs, cannot influence a result, and get no access to the calculators. If advertising is turned off on this deployment, nothing else changes.</p><h2>Who builds it</h2><p>Onim is written and maintained by a small independent team. The calculators exist because people kept needing one more of them: a conversion no site explained, a formula buried in a textbook, a tool that wanted an account for a two-second job. If something is missing, <a href="/contact">ask for it</a> — requests from readers are where a good share of the library came from.</p><h2>Getting in touch</h2><p>Bug reports, corrections and requests all go to the same place. The <a href="/contact">contact page</a> has the form and says what makes a report easy to act on. If a result looks wrong, the calculator name, the values you entered and the answer you expected is usually enough to reproduce it.</p>
HTML,
            ],
            'privacy' => [
                'title' => 'Privacy policy',
                'excerpt' => 'What this site collects, why, and how to have it removed.',
                'meta_title' => 'Privacy policy',
                'meta_description' => 'The data this calculator site collects, how long it is kept, and how to request deletion.',
                'content' => <<<'HTML'
<p>This policy explains what this site does with data. It applies to the calculator pages, the blog and the contact form.</p>
<h2>Calculator pages</h2>
<p>Values you type into a calculator are used to compute your result. They are not written to a database and they are not attached to you in any way. When you reload the page, they are gone.</p>
<h2>Server logs</h2>
<p>The web server records requests in the standard way: IP address, timestamp, requested URL and browser identifier. Logs exist to keep the service running and to spot abuse, and they are rotated on a short schedule.</p>
<h2>Aggregate page counts</h2>
<p>To know which calculators are worth improving, the site keeps a daily counter per page — a number, not a person. It stores the page path and the date. There is no visitor identifier, no cookie and no cross-site tracking.</p>
<h2>Contact form</h2>
<p>When you send a message we store the name, email address and text you submit, plus the IP address used to send it, so we can answer you and block spam. Messages are kept until the question is settled and then deleted on request. Message content is never used for marketing.</p>
<h2>Cookies</h2>
<p>The public site sets no tracking cookies. The admin area sets one session cookie, which is required to stay signed in and is not used for anything else.</p>
<h2>Third parties</h2>
<p>If the site owner enables an analytics provider or advertising network, that provider may set its own cookies and is named in the consent banner the owner enables. This deployment runs its own counters and nothing else unless the owner changes that.</p>
<h2>Your rights</h2>
<p>Write to the contact address on the contact page to ask what we hold about you, to correct it, or to have it deleted. You do not need to give a reason.</p>
HTML,
            ],
            'terms' => [
                'title' => 'Terms of use',
                'excerpt' => 'The short version: use the calculators freely, check anything important, and do not abuse the service.',
                'meta_title' => 'Terms of use',
                'meta_description' => 'The terms that apply to using these free calculators and the content on this site.',
                'content' => <<<'HTML'
<p>By using this site you agree to these terms. They are deliberately short.</p>
<h2>The calculators are a tool, not advice</h2>
<p>Results are produced by the formulas documented on each page. They are general-purpose: they do not know your tax residency, your lender's fees, your medical history or your local building code. For decisions with money, health or safety consequences, confirm the result with a qualified professional or with the primary source (the tax office, the lender, the clinician, the code).</p>
<h2>Accuracy and availability</h2>
<p>We test every calculator and fix disagreements between the documented formula and the result. We cannot promise the site will never be wrong or never be down, and we do not accept liability for decisions taken on the strength of a result alone.</p>
<h2>Acceptable use</h2>
<p>Do not scrape the site at a rate that degrades it for other people, do not use the contact form to send unsolicited advertising, and do not attempt to reach the administration area or other users' data.</p>
<h2>Content</h2>
<p>The explanatory text on this site was written for it. You may quote a passage with a link back; you may not republish whole articles. Calculator definitions and interface patterns are provided for study and reuse by their respective authors.</p>
<h2>Changes</h2>
<p>These terms may change as the site does. The current version is always this page.</p>
HTML,
            ],
            'disclaimer' => [
                'title' => 'Disclaimer',
                'excerpt' => 'Financial, medical and legal results are estimates — here is exactly what that means.',
                'meta_title' => 'Disclaimer',
                'meta_description' => 'What the results on this site are and are not: estimates that need checking against a professional or a primary source.',
                'content' => <<<'HTML'
<p>Every calculator on this site is an estimate built from a documented formula. This page says, plainly, where the limits are.</p>
<h2>Money</h2>
<p>Loan, mortgage, investment and tax calculators reproduce standard formulas. Real statements differ: interest accrues on your lender's schedule, fees are charged in ways the formula cannot see, and tax rules change and depend on where you live. Treat the output as a planning figure and compare it with an official statement before committing to anything.</p>
<h2>Health</h2>
<p>Health calculators (BMI, dosage, pregnancy dates, risk scores) are educational. They use population-level formulas, not your individual clinical picture. They are not a diagnosis, a prescription or a substitute for a clinician who has examined you.</p>
<h2>Engineering, construction and safety</h2>
<p>Material, structural and electrical calculators give estimates from simplified models. Loads, tolerances and codes vary by jurisdiction and by product. Anything that bears weight, conducts current or holds back water needs a qualified professional and the manufacturer's data.</p>
<h2>No professional relationship</h2>
<p>Using this site does not create a professional relationship of any kind. No result here constitutes financial, legal, medical or engineering advice.</p>
HTML,
            ],
            'faq' => [
                'title' => 'Frequently asked questions',
                'excerpt' => 'How the calculators work, why a field is blank, and what to do when a result looks wrong.',
                'template' => 'faq',
                'meta_title' => 'Frequently asked questions',
                'meta_description' => 'Answers about units, blank fields, accuracy, privacy and reporting a wrong result on this calculator site.',
                'content' => <<<'HTML'
<h2>Why is one field blank?</h2>
<p>Most calculators work out whichever value you leave empty. Fill in the ones you know, leave the one you want, and the result appears. If every field is filled, the page still shows the result for the equation you selected.</p>
<h2>Do the units matter?</h2>
<p>Yes, and they are handled for you. The chip next to each field changes the unit without changing the number you typed — 5 inches stays 5 as a number and becomes 12.7 cm internally. Mixed units in one form are fine.</p>
<h2>Why does the result differ from another site?</h2>
<p>Usually because of a different assumption: a different day count in a date calculation, a different rounding step, or a different definition of the same word (a "month" of 30 days rather than a calendar month). Each page states its assumptions.</p>
<h2>Can I link to a result?</h2>
<p>Yes. The address bar holds the whole form state, so a copied URL opens the page with the same values and the same answer.</p>
<h2>How do I report a wrong answer?</h2>
<p>Use the contact form, include the calculator's name, the values you entered and the answer you expected. A wrong result is a bug and gets fixed.</p>
HTML,
            ],
            'contact' => [
                'title' => 'Contact',
                'excerpt' => 'A wrong result, a missing calculator, a file format we do not handle yet — this is the page for all three.',
                'template' => 'contact',
                'meta_title' => 'Contact Onim — bug reports, corrections and requests',
                'meta_description' => 'How to reach the team behind Onim: report a wrong result, ask for a calculator, request a file format, or ask about privacy and advertising.',
                'content' => <<<'HTML'
<p>Every message on this page is read by a person. There is no ticket robot and no autoresponder; the answer comes from whoever looked into the problem.</p><h2>What to include</h2><ul>
<li><strong>A wrong result.</strong> Name the calculator, paste the values you entered, and say what answer you expected. If you know where the expected answer comes from — a textbook, a standard, a spreadsheet — say so, and the fix is usually quick.</li>
<li><strong>A calculator that should exist.</strong> Say what you were trying to work out and what you had in hand. “I have a room's measurements and I want paint litres by coat” is worth more than “please add a paint calculator”.</li>
<li><strong>A file the tools will not open.</strong> Tell us the format and, if you can, what produced it. Do not send the file itself unless we ask — the tools run in your browser and we would rather keep it that way.</li>
<li><strong>Privacy, advertising or licensing.</strong> Ask away. The <a href="/privacy">privacy policy</a> and the <a href="/terms">terms</a> answer the usual questions first.</li>
</ul><h2>What happens next</h2><p>Bug reports are answered first, usually with a fix rather than a reply. Requests for new calculators are collected and built in batches; when one you asked for goes live, that is the end of it. Anything about a particular page is answered by someone who has opened that page.</p><h2>Before you write</h2><p>Two things settle a good number of messages on their own: <a href="/faq">the FAQ</a> covers units, blank fields, rounding and how to cite a result, and the note under any calculator explains the assumptions behind its answer. If neither answers it, the form below is the fastest route to us.</p>
HTML,
            ],
        ];
    }

    private static function welcomePost(): string
    {
        return <<<'HTML'
<p>A calculator result is only useful if you know what it is a result <em>of</em>. The same number can be right arithmetic and wrong answer, because the formula you picked did not match the situation you are in. This is a short routine for telling the difference, in about five minutes.</p>
<h2>1. Name the quantity, not just the number</h2>
<p>"£684.03" is not an answer. "£684.03 is the monthly payment on a £135,000 loan at 4.5% over 30 years, principal and interest only" is an answer. Before you use the number anywhere, say out loud what it is. If you cannot finish that sentence, the field you filled in probably was not the field you wanted.</p>
<h2>2. Check the units, then check them again</h2>
<p>Most errors that survive to a final answer are unit errors. A rate of 4.5 is 450% if the box wanted a decimal and 4.5% if it wanted a percentage — a factor-of-100 mistake that still looks plausible. Every calculator here shows the unit next to the field and converts when you switch; use the switch to see whether the answer moves the way you expect.</p>
<h2>3. Sanity-check the order of magnitude</h2>
<p>Round hard and do the arithmetic in your head. A 30-year loan of £135,000 at roughly 5% costs roughly £135,000 × 0.05 × 30 ≈ £200,000 in payments, so a total of about £246,000 including interest is believable and a total of £24,000 is not. If your head-maths and the page disagree by a factor of ten, the page is not the problem.</p>
<h2>4. Test a boundary</h2>
<p>Push an input to zero, or to a very large number, and see whether the behaviour still makes sense. Zero interest should collapse to principal divided by the number of payments. A zero-length side should give a zero area. Boundary behaviour is where formulas that are merely memorised fall apart.</p>
<h2>5. Read the formula on the page</h2>
<p>Every calculator here prints the relationship it used. You do not need to check the algebra line by line; you need to confirm the <em>shape</em> of it. If the answer should grow with an input but the formula divides by it, that is the bug — and you can describe it to us in one sentence.</p>
<h2>What to do when it disagrees</h2>
<p>Send the calculator name, the inputs and the result you expected. Those three facts turn a vague report into a reproducible case, which is the only kind we can fix.</p>
HTML;
    }
}
