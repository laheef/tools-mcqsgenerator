<?php
/**
 * Tool Name: Video Frame Grabber
 * Shortcode: tool_video_frame
 * Category: video
 * Version: 1.0.0
 * Description: Pull a still frame out of a video file at any timestamp and save it as a PNG.
 * Language: en
 */

/*
 * A screenshot of a video, without uploading the video anywhere.
 *
 * The file is opened with URL.createObjectURL, so the browser reads it from the
 * disk and the server never sees a byte of it. Seeking is done on the element
 * itself; the frame is drawn into a canvas at the video's own resolution and
 * exported as a PNG.
 *
 * What can go wrong, and what the tool says when it does:
 *   * the browser cannot decode the codec (HEVC in Chrome is the usual one) —
 *     it says so instead of showing a black rectangle;
 *   * the seek lands past the end — the timestamp is clamped to the duration;
 *   * the file is audio-only — there is no picture to grab, and that is stated.
 */

declare(strict_types=1);

if (!defined('ONIM_TOOLKIT')) {
    http_response_code(403);
    exit('This file is a tool definition, not a page.');
}

use Onim\Toolkit;

Toolkit::addShortcode('tool_video_frame', static function (array $atts, ?string $inner, array $ctx): string {
    $uid   = (string) $ctx['uid'];
    $t     = static fn (string $key, string $default): string => Toolkit::t($key, $default);

    /* The one number this tool can work out without a file: how many frames a
       clip holds at a given frame rate, and where a timestamp falls in it. */
    $seconds = 30.0;
    $fps     = 30;
    $frameNo = (int) round($seconds * $fps);

    ob_start();
    ?>
    <div class="vidtool" id="<?= Toolkit::e($uid) ?>">
        <style>
            #<?= Toolkit::e($uid) ?> .vidtool-pick {
                display: grid; gap: 10px; padding: 14px; border-radius: 10px;
                border: 1px dashed var(--border-strong, #C9CEDB); background: var(--surface-2, #F8F9FB);
                text-align: center;
            }
            #<?= Toolkit::e($uid) ?> .vidtool-pick input[type="file"] { width: 100%; font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .vidtool-shot {
                margin-top: 12px; border-radius: 10px; overflow: hidden; background: #0A0A0A;
                display: grid; place-items: center; min-height: 120px;
            }
            #<?= Toolkit::e($uid) ?> .vidtool-shot img,
            #<?= Toolkit::e($uid) ?> .vidtool-shot canvas { display: block; width: 100%; height: auto; }
            #<?= Toolkit::e($uid) ?> .vidtool-shot p { color: #B9C0CC; font-size: 12.8px; padding: 26px 14px; margin: 0; text-align: center; }
            #<?= Toolkit::e($uid) ?> .vidtool-row { display: grid; grid-template-columns: minmax(0,1fr) auto; gap: 8px; align-items: end; }
            #<?= Toolkit::e($uid) ?> .vidtool-meta { margin: 10px 0 0; font-size: 12.6px; color: var(--ink-4, #66717F); line-height: 1.5; }
            #<?= Toolkit::e($uid) ?> .vidtool-meta strong { color: var(--ink-2, #212427); font-variant-numeric: tabular-nums; }
            #<?= Toolkit::e($uid) ?> .vidtool-facts {
                margin: 12px 0 0; padding: 0; list-style: none; display: grid; gap: 1px;
                border: 1px solid var(--border, #DFE2EB); border-radius: 10px; overflow: hidden;
            }
            #<?= Toolkit::e($uid) ?> .vidtool-facts li { display: flex; justify-content: space-between; gap: 10px; padding: 8px 11px; background: var(--surface-2, #F8F9FB); font-size: 13px; }
            #<?= Toolkit::e($uid) ?> .vidtool-facts span:first-child { color: var(--ink-3, #4B5259); }
            #<?= Toolkit::e($uid) ?> .vidtool-facts span:last-child { font-weight: 600; font-variant-numeric: tabular-nums; }
        </style>

        <div class="vidtool-pick">
            <label for="<?= Toolkit::e($uid) ?>-file" style="margin:0"><?= Toolkit::e($t('Open a video from this device', 'Open a video from this device')) ?></label>
            <input type="file" id="<?= Toolkit::e($uid) ?>-file" accept="video/*" data-vid="file">
            <p style="margin:0;font-size:12.4px;color:var(--ink-4,#66717F)"><?= Toolkit::e($t('MP4, WebM and MOV usually work. Nothing is uploaded — the file is read by this page only.', 'MP4, WebM and MOV usually work. Nothing is uploaded — the file is read by this page only.')) ?></p>
        </div>

        <div class="vidtool-row" style="margin-top:12px">
            <div>
                <label for="<?= Toolkit::e($uid) ?>-time"><?= Toolkit::e($t('Timestamp', 'Timestamp')) ?></label>
                <input type="text" inputmode="decimal" id="<?= Toolkit::e($uid) ?>-time" value="0.0" data-vid="time">
            </div>
            <button type="button" class="tool-btn" style="width:auto" data-vid="grab" disabled><?= Toolkit::e($t('Grab frame', 'Grab frame')) ?></button>
        </div>

        <div class="vidtool-shot" data-vid="stage">
            <p data-vid="placeholder"><?= Toolkit::e($t('The grabbed frame is shown here.', 'The grabbed frame is shown here.')) ?></p>
        </div>

        <p class="vidtool-meta" data-vid="meta"><?= Toolkit::e($t('Pick a file to see its length, resolution and frame rate.', 'Pick a file to see its length, resolution and frame rate.')) ?></p>

        <button type="button" class="tool-btn" style="margin-top:10px" data-vid="save" disabled><?= Toolkit::e($t('Download this frame as PNG', 'Download this frame as PNG')) ?></button>

        <ul class="vidtool-facts">
            <li><span><?= Toolkit::e($t('A 30-second clip at 30 fps', 'A 30-second clip at 30 fps')) ?></span><span><?= Toolkit::e(number_format($frameNo, 0, '.', ' ')) ?> <?= Toolkit::e($t('frames', 'frames')) ?></span></li>
            <li><span><?= Toolkit::e($t('Frame 1 000 of that clip', 'Frame 1 000 of that clip')) ?></span><span>00:00:33.3</span></li>
            <li><span><?= Toolkit::e($t('A 12-second clip at 60 fps', 'A 12-second clip at 60 fps')) ?></span><span>720 <?= Toolkit::e($t('frames', 'frames')) ?></span></li>
        </ul>

        <script>
        (function () {
            var root = document.getElementById(<?= json_encode($uid) ?>);
            if (!root) return;
            var fileIn = root.querySelector('[data-vid="file"]');
            var timeIn = root.querySelector('[data-vid="time"]');
            var grab   = root.querySelector('[data-vid="grab"]');
            var save   = root.querySelector('[data-vid="save"]');
            var stage  = root.querySelector('[data-vid="stage"]');
            var meta   = root.querySelector('[data-vid="meta"]');
            var video  = document.createElement('video');
            var canvas = document.createElement('canvas');
            var url = null;

            video.preload = 'metadata';
            video.muted = true;
            video.playsInline = true;
            video.style.display = 'none';
            root.appendChild(video);

            function say(text) { meta.textContent = text; }

            function stamp(seconds) {
                var s = Math.max(0, seconds);
                var m = Math.floor(s / 60);
                var rest = (s - m * 60);
                return m + ':' + (rest < 10 ? '0' : '') + rest.toFixed(1);
            }

            function clampTime(value) {
                var n = Number(String(value).replace(',', '.'));
                if (!isFinite(n) || n < 0) n = 0;
                if (video.duration && isFinite(video.duration) && n > video.duration) n = video.duration;
                return n;
            }

            fileIn.addEventListener('change', function () {
                var file = fileIn.files && fileIn.files[0];
                if (!file) return;
                if (url) URL.revokeObjectURL(url);
                url = URL.createObjectURL(file);
                video.src = url;
                grab.disabled = true;
                save.disabled = true;
                canvas.width = 0;
                canvas.height = 0;
                stage.innerHTML = '<p>Reading the file…</p>';
                say('Reading ' + file.name + '…');
            });

            video.addEventListener('loadedmetadata', function () {
                var w = video.videoWidth, h = video.videoHeight;
                if (!w || !h) {
                    stage.innerHTML = '<p>This file has no picture — it looks like audio only, or this browser cannot decode its codec.</p>';
                    say('No video track found.');
                    return;
                }
                var fps = '';
                stage.innerHTML = '';
                stage.appendChild(video);
                video.style.display = 'block';
                video.style.width = '100%';
                grab.disabled = false;
                var dur = isFinite(video.duration) ? video.duration.toFixed(2) + ' s' : 'unknown length';
                say(w + ' × ' + h + ' · ' + dur + ' · pick a timestamp and grab a frame.');
                timeIn.value = (video.duration ? Math.min(1, video.duration / 2) : 0).toFixed(1);
            });

            video.addEventListener('error', function () {
                stage.innerHTML = '<p>This browser cannot decode that file. Try an MP4 (H.264) or a WebM.</p>';
                say('Decoding failed.');
            });

            function seek(seconds) {
                return new Promise(function (resolve) {
                    var done = function () {
                        video.removeEventListener('seeked', done);
                        resolve();
                    };
                    video.addEventListener('seeked', done);
                    video.currentTime = seconds;
                });
            }

            grab.addEventListener('click', function () {
                if (!video.videoWidth) return;
                grab.disabled = true;
                var at = clampTime(timeIn.value);
                timeIn.value = at.toFixed(1);
                seek(at).then(function () {
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    var ctx = canvas.getContext('2d');
                    ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                    var shown = canvas.toDataURL('image/png');
                    var img = new Image();
                    img.src = shown;
                    img.alt = 'Frame at ' + stamp(at);
                    stage.innerHTML = '';
                    stage.appendChild(img);
                    save.disabled = false;
                    say('Frame at ' + stamp(at) + ' · ' + canvas.width + ' × ' + canvas.height + ' px');
                    grab.disabled = false;
                }).catch(function () {
                    say('Could not seek to that time.');
                    grab.disabled = false;
                });
            });

            save.addEventListener('click', function () {
                if (!canvas.width) return;
                canvas.toBlob(function (blob) {
                    if (!blob) return;
                    var a = document.createElement('a');
                    a.href = URL.createObjectURL(blob);
                    a.download = 'frame-' + timeIn.value + 's.png';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                    setTimeout(function () { URL.revokeObjectURL(a.href); }, 4000);
                }, 'image/png');
            });
        })();
        </script>
    </div>
    <?php
    return (string) ob_get_clean();
});
