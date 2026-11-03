<?php
/**
 * German labels for the tool widgets.
 *
 * A tool never holds its own translations: it prints every visitor-visible
 * string through Toolkit::t('Key', 'Default'), and this map — the one for the
 * site's current locale — supplies the wording. Delete this file and the tools
 * go back to English without a single line of tool code changing.
 *
 * Keys are the English defaults, so a missing row falls back to that default
 * rather than printing an empty box. Add a row per string; there is no order
 * to keep and no need to translate a string twice.
 */

declare(strict_types=1);

return [
    /* Shared */
    'Calculate'     => 'Berechnen',

    /* Percentage of a number */
    'Percentage'    => 'Prozent',
    'Number'        => 'Zahl',
    'of'            => 'von',
    'of it'         => 'davon',
    'Answer'        => 'Ergebnis',
    'Tip: the answer updates as you type.' => 'Tipp: Das Ergebnis aktualisiert sich beim Tippen.',

    /* Tip and bill splitter */
    'Bill'            => 'Rechnung',
    'Tip'             => 'Trinkgeld',
    'Common tip rates' => 'Übliche Trinkgeld-Sätze',
    'Split between'   => 'Aufteilen auf',
    'Total'           => 'Gesamt',
    'Each person pays' => 'Jede Person zahlt',
    'Of which tip, per person' => 'Davon Trinkgeld pro Person',
    'Amounts are rounded to the nearest cent; the total is not re-split to hide the remainder.'
        => 'Beträge sind auf den Cent gerundet; die Summe wird nicht neu aufgeteilt, um den Rest zu verstecken.',

    /* Word and character counter */
    'Your text'      => 'Ihr Text',
    'Paste or type here…' => 'Hier einfügen oder tippen…',
    'Count'          => 'Zählen',
    'Words'          => 'Wörter',
    'Characters'     => 'Zeichen',
    'Without spaces' => 'Ohne Leerzeichen',
    'Sentences'      => 'Sätze',
    'Paragraphs'     => 'Absätze',
    'Minute read'    => 'Min. Lesezeit',
    'Words you lean on' => 'Häufige Wörter',
    'No word is repeated yet.' => 'Noch kein Wort wiederholt.',

    /* ------------------------------------------------------------
       Added with the nineteen shipped tools: one row per string the new
       widgets print. The keys are the English defaults the tool files
       pass to Toolkit::t().
       ------------------------------------------------------------ */

    /* Audio — tone generator */
    'Frequency' => 'Frequenz',
    'Waveform' => 'Wellenform',
    'Show the note' => 'Note anzeigen',
    'Play 2 seconds' => '2 Sekunden abspielen',
    'Download WAV' => 'WAV herunterladen',
    'Plays in this page. Nothing is uploaded, nothing is recorded.' => 'Läuft in dieser Seite. Nichts wird hochgeladen, nichts aufgezeichnet.',

    /* Video — frame grabber */
    'Open a video from this device' => 'Video von diesem Gerät öffnen',
    'MP4, WebM and MOV usually work. Nothing is uploaded — the file is read by this page only.' => 'MP4, WebM und MOV funktionieren meist. Nichts wird hochgeladen — die Datei liest nur diese Seite.',
    'Timestamp' => 'Zeitpunkt',
    'Grab frame' => 'Einzelbild holen',
    'The grabbed frame is shown here.' => 'Das geholte Einzelbild erscheint hier.',
    'Download this frame as PNG' => 'Dieses Einzelbild als PNG herunterladen',
    'Pick a file to see its length, resolution and frame rate.' => 'Eine Datei wählen, um Länge, Auflösung und Bildrate zu sehen.',
    'A 30-second clip at 30 fps' => 'Ein 30-Sekunden-Clip bei 30 fps',
    'Frame 1 000 of that clip' => 'Bild 1 000 dieses Clips',
    'A 12-second clip at 60 fps' => 'Ein 12-Sekunden-Clip bei 60 fps',
    'frames' => 'Bilder',

    /* Image — compressor, converter, resizer, base64 */
    'Choose an image' => 'Bild auswählen',
    'JPG, PNG, WebP, GIF or AVIF. Read in this page — nothing is uploaded.' => 'JPG, PNG, WebP, GIF oder AVIF. Wird in dieser Seite gelesen — nichts wird hochgeladen.',
    'Quality' => 'Qualität',
    'Save as' => 'Speichern als',
    'Same as the original' => 'Wie das Original',
    'The compressed picture appears here with its new size.' => 'Das komprimierte Bild erscheint hier mit seiner neuen Größe.',
    'Original' => 'Original',
    'Compressed' => 'Komprimiert',
    'Saved' => 'Gespart',
    'Dimensions' => 'Abmessungen',
    'Download the compressed image' => 'Komprimiertes Bild herunterladen',
    'Rule of thumb: {in} → {out} at quality 80, about {pct}% smaller. A PNG has no quality setting — it is lossless — so this tool saves PNGs as WebP and tells you.' => 'Faustregel: {in} → {out} bei Qualität 80, rund {pct}% kleiner. Ein PNG hat keine Qualitätsstufe — es ist verlustfrei — deshalb speichert dieses Werkzeug PNGs als WebP und sagt es dazu.',
    'Convert to' => 'Umwandeln in',
    'Quality for lossy formats' => 'Qualität für verlustbehaftete Formate',
    'The converted picture appears here.' => 'Das umgewandelte Bild erscheint hier.',
    'From' => 'Von',
    'To' => 'Nach',
    'Size' => 'Größe',
    'Download the converted image' => 'Umgewandeltes Bild herunterladen',
    'Formats are encoded by this browser. If it cannot write the one you pick, it says so instead of quietly saving a different file.' => 'Die Formate kodiert dieser Browser. Kann er das gewählte nicht schreiben, sagt er das, statt still eine andere Datei zu speichern.',
    'Width (px)' => 'Breite (px)',
    'Height (px)' => 'Höhe (px)',
    'Or percentage' => 'Oder Prozent',
    'Keep the proportions' => 'Seitenverhältnis beibehalten',
    'The resized picture appears here.' => 'Das skalierte Bild erscheint hier.',
    'New size' => 'Neue Größe',
    'File size' => 'Dateigröße',
    'Download the resized image' => 'Skaliertes Bild herunterladen',
    'For example: {ow} × {oh} resized to {w} px wide becomes {w} × {h} px, and keeps {pct}% of its pixels.' => 'Zum Beispiel: {ow} × {oh}, auf {w} px Breite skaliert, ergibt {w} × {h} px und behält {pct}% der Bildpunkte.',
    'Image → Base64' => 'Bild → Base64',
    'Base64 → image' => 'Base64 → Bild',
    'Data URI' => 'Data-URI',
    'Copy' => 'Kopieren',
    'Copy as CSS' => 'Als CSS kopieren',
    'The data URI appears here.' => 'Die Data-URI erscheint hier.',
    'Paste a data URI or bare base64' => 'Data-URI oder reines Base64 einfügen',
    'Show the image and download it' => 'Bild anzeigen und herunterladen',
    'Base64 length' => 'Länge in Base64',
    'Overhead' => 'Zusatzgröße',
    'Every 3 bytes become 4 characters, so a {kb} KB image is about {b64} KB of text — worth it for a 2 KB icon, not for a hero image.' => 'Aus 3 Byte werden 4 Zeichen, aus einem Bild von {kb} KB also rund {b64} KB Text — sinnvoll bei einem Icon von 2 KB, nicht bei einem Titelbild.',

    /* PDF — images to PDF */
    'Choose images, in the order you want them' => 'Bilder auswählen, in der gewünschten Reihenfolge',
    'JPG, PNG, WebP or screenshots. Read in this page — nothing is uploaded.' => 'JPG, PNG, WebP oder Screenshots. Wird in dieser Seite gelesen — nichts wird hochgeladen.',
    'Page size' => 'Seitengröße',
    'A4 portrait' => 'A4 hoch',
    'A4 landscape' => 'A4 quer',
    'Fit the image' => 'An das Bild angepasst',
    'Margin' => 'Rand',
    'None' => 'Keiner',
    '12 mm' => '12 mm',
    '19 mm' => '19 mm',
    'Images' => 'Bilder',
    'Page' => 'Seite',
    'PDF size' => 'PDF-Größe',
    'Download the PDF' => 'PDF herunterladen',
    'One image per page, scaled to fit and centred. A4 is {w} × {h} points — 210 × 297 mm at 72 points per inch.' => 'Ein Bild pro Seite, eingepasst und zentriert. A4 ist {w} × {h} Punkt — 210 × 297 mm bei 72 Punkt pro Zoll.',

    /* Developer — subnet and search preview */
    'Address or CIDR block' => 'Adresse oder CIDR-Block',
    'Work it out' => 'Ausrechnen',
    'Network' => 'Netzwerk',
    'Page title' => 'Seitentitel',
    'Meta description' => 'Meta-Beschreibung',
    'Address' => 'Adresse',
    'Check it' => 'Prüfen',
    'Words in the description' => 'Wörter in der Beschreibung',
    'Title' => 'Titel',
    'Description' => 'Beschreibung',
    'Pixels are estimated at {px} px per character — an average, not a measurement. A title of narrow letters fits more, a title in capitals fits less. A search engine may rewrite a title it thinks is padded, so a shorter honest one is the safer bet.' => 'Die Pixel sind mit {px} px pro Zeichen geschätzt — ein Mittelwert, keine Messung. Ein Titel aus schmalen Buchstaben passt weiter, einer in Großbuchstaben weniger weit. Eine Suchmaschine kann einen aufgeblähten Titel umschreiben; ein kürzerer, ehrlicher ist die sicherere Wahl.',

    /* Converters — number base */
    'Base' => 'Basis',
    'In decimal' => 'Dezimal',
    'Same number in another base (2–36)' => 'Dieselbe Zahl in einer anderen Basis (2–36)',
    'A byte is 8 bits, so 255 is the largest value one byte holds and 0xFF is the same number written in hex. Bases above 10 use the letters A–Z for the digits after 9.' => 'Ein Byte sind 8 Bit, also ist 255 der größte Wert in einem Byte, und 0xFF ist dieselbe Zahl in Hexadezimal. Ab Basis 10 kommen für die Ziffern nach der 9 die Buchstaben A–Z dazu.',

    /* Security — password generator */
    'Length' => 'Länge',
    'Generate another' => 'Neues erzeugen',
    'Characters in the pool' => 'Zeichen im Vorrat',
    'Combinations' => 'Kombinationen',
    'Strong' => 'Stark',
    'At 10 billion guesses a second' => 'Bei 10 Milliarden Versuchen pro Sekunde',
    'bits of entropy' => 'Bit Entropie',
    'Made with crypto.getRandomValues() — a cryptographic random source, not a seeded PRNG. It is generated in this page and never sent anywhere. The look-alike characters l, I, O, 0 and 1 are left out so a password can be read aloud and typed once.' => 'Erzeugt mit crypto.getRandomValues() — einer kryptografischen Zufallsquelle, keinem gesetzten PRNG. Das Passwort entsteht in dieser Seite und wird nirgendwohin gesendet. Die verwechselbaren Zeichen l, I, O, 0 und 1 fehlen, damit man es vorlesen und einmal abtippen kann.',

    /* Gaming — sensitivity converter */
    'Mouse DPI' => 'Maus-DPI',
    'In-game sensitivity' => 'Empfindlichkeit im Spiel',
    'You play' => 'Du spielst',
    'You want' => 'Du willst',
    'Convert' => 'Umrechnen',
    'Type this into' => 'Das hier eintragen in',
    'Sensitivity' => 'Empfindlichkeit',
    'cm per 360°' => 'cm pro 360°',
    'eDPI' => 'eDPI',
    'Counts per turn' => 'Zählschritte pro Umdrehung',
    'Mouse pad needed' => 'Benötigtes Mauspad',
    'Game' => 'Spiel',
    'Yaw values used: CS2, Apex and Rust 0.022° per count · Valorant 0.07° · Overwatch 2 0.0066° · Rainbow Six Siege 0.00573°. Every game scales the same mouse count differently, which is exactly why sensitivity numbers do not travel between them and cm/360 does.' => 'Verwendete Yaw-Werte: CS2, Apex und Rust 0,022° pro Zählschritt · Valorant 0,07° · Overwatch 2 0,0066° · Rainbow Six Siege 0,00573°. Jedes Spiel skaliert denselben Mausschritt anders — genau deshalb lassen sich Empfindlichkeiten nicht übertragen, cm/360 aber schon.',

    /* Compressors — text compressor */
    'Text to compress' => 'Zu komprimierender Text',
    'Compress it' => 'Komprimieren',
    'gzip keeps' => 'gzip behält',
    'gzip (level 9)' => 'gzip (Stufe 9)',
    'deflate (raw)' => 'deflate (roh)',
    'Download .gz' => '.gz herunterladen',
    'Download .txt' => '.txt herunterladen',
    'gzip is deflate plus a header, so the two sizes are always within a few bytes of each other. Repetitive text (prose, JSON, HTML) shrinks to a quarter or a third; already-compressed data (base64, a random hash) grows by a few bytes and nothing more can be done about it.' => 'gzip ist deflate plus Kopf, deshalb liegen beide Größen immer nur wenige Byte auseinander. Wiederholender Text (Prosa, JSON, HTML) schrumpft auf ein Viertel bis ein Drittel; bereits komprimierte Daten (Base64, ein zufälliger Hash) wachsen um ein paar Byte, und daran ändert sich nichts.',

    /* Productivity — pomodoro */
    'Focus' => 'Fokus',
    'Start' => 'Start',
    'Reset' => 'Zurücksetzen',
    'Break' => 'Pause',
    'Time left' => 'Verbleibende Zeit',
    'Rounds that fit' => 'Passende Runden',
    'Focus time' => 'Fokuszeit',
    'Break time' => 'Pausenzeit',
    'Best round length here' => 'Beste Rundenlänge hier',
    'Completed this visit' => 'In diesem Besuch abgeschlossen',
    'Press start. The tab can go in the background — the timer counts real seconds, not ticks.' => 'Auf Start drücken. Der Tab darf in den Hintergrund — der Timer zählt echte Sekunden, keine Ticks.',
    'A 25-minute round is not magic — it is long enough to get into a task and short enough that starting one is not intimidating. The break is the part people skip, and it is the part that makes the next round possible.' => 'Eine Runde von 25 Minuten ist keine Magie: lang genug, um in eine Aufgabe hineinzukommen, und kurz genug, dass der Anfang nicht abschreckt. Die Pause lassen die meisten weg — und genau sie macht die nächste Runde möglich.',

    /* Design — box shadow */
    'Your card' => 'Deine Karte',
    'Offset X' => 'Versatz X',
    'Offset Y' => 'Versatz Y',
    'Blur' => 'Weichzeichnen',
    'Spread' => 'Ausbreitung',
    'Opacity' => 'Deckkraft',
    'Inset (a shadow inside the edge)' => 'Innen (Schatten an der Innenkante)',
    'Copy the CSS' => 'CSS kopieren',
    'The order is offset-x, offset-y, blur, spread. A negative spread shrinks the shadow; a large blur with no offset is a glow rather than a shadow. Two layers — a tight one and a wide one — is what makes a card look lifted rather than blurred.' => 'Die Reihenfolge ist offset-x, offset-y, Weichzeichnen, Ausbreitung. Eine negative Ausbreitung schrumpft den Schatten; viel Weichzeichnen ohne Versatz ergibt einen Schein statt eines Schattens. Zwei Ebenen — eine enge und eine weite — lassen eine Karte abgehoben statt verwischt wirken.',

    /* Text — case converter */
    'Small words — a, an, the, of, and, or, to, in, for, on — stay lower-case in Title Case unless they open or close the string. Identifiers are built from words split on spaces, punctuation, underscores and the seam between a lower-case letter and a capital.' => 'Kleine Wörter (a, an, the, of, and, or, to, in, for, on) bleiben in Title Case klein, außer am Anfang oder Ende. Bezeichner entstehen aus Wörtern, die an Leerzeichen, Satzzeichen, Unterstrichen und an der Naht zwischen Klein- und Großbuchstaben getrennt werden.',

    /* Art — colour converter */
    'Hex colour' => 'Hex-Farbe',
    'Contrast on white' => 'Kontrast auf Weiß',
    'Contrast on black' => 'Kontrast auf Schwarz',
    'Tints (towards white)' => 'Tönungen (Richtung Weiß)',
    'Shades (towards black)' => 'Schattierungen (Richtung Schwarz)',
    'Luminance is not the average of the channels: each one is un-gamma-corrected first, so pure green is far brighter than pure blue. A ratio of 4.5:1 is the WCAG AA floor for body text, 3:1 for large text, and 7:1 is AAA. Tap a swatch to load it into the box.' => 'Helligkeit ist nicht der Mittelwert der Kanäle: jeder wird zuerst ent-gammakorrigiert, deshalb ist reines Grün viel heller als reines Blau. Ein Verhältnis von 4,5:1 ist die WCAG-AA-Grenze für Fließtext, 3:1 für große Schrift, 7:1 ist AAA. Ein Farbfeld antippen, um es zu übernehmen.',

    /* Social — post length */
    'Your caption' => 'Dein Beitrag',
    'Check every platform' => 'Alle Plattformen prüfen',
    'Reading time' => 'Lesezeit',
    'Hashtags' => 'Hashtags',
    'Links' => 'Links',
    'Every limit above is enforced by the platform, not a suggestion. The number that decides whether anyone reads past the first line is smaller: about 125 characters on Instagram, 210 on LinkedIn, 100 on TikTok.' => 'Jede Grenze oben setzt die Plattform durch, sie ist keine Empfehlung. Die Zahl, die entscheidet, ob jemand über die erste Zeile hinausliest, ist kleiner: etwa 125 Zeichen bei Instagram, 210 bei LinkedIn, 100 bei TikTok.',

    /* Fun — random picker */
    'One entry per line' => 'Ein Eintrag pro Zeile',
    'Winners' => 'Gewinner',
    'Pick' => 'Ziehen',
    'Add at least one line, then press Pick.' => 'Mindestens eine Zeile eingeben, dann ziehen.',
    'Entries' => 'Einträge',
    'Chance per entry' => 'Chance pro Eintrag',
    'Duplicates removed' => 'Doppelte Einträge',
    'Orders possible' => 'Mögliche Reihenfolgen',
    'line' => 'Zeile',
    'The draw is a Fisher–Yates shuffle seeded from crypto.getRandomValues() — every line has the same chance and nothing can be drawn twice. The server draw uses random_int(), so pressing Pick with the script off also gives a fresh, fair result.' => 'Gezogen wird mit einem Fisher-Yates-Mischen aus crypto.getRandomValues(): jede Zeile hat dieselbe Chance, nichts kommt doppelt. Die Ziehung auf dem Server nutzt random_int(), also liefert auch Klicken ohne Skript ein frisches, faires Ergebnis.',

    /* Shared wording */
    'Read in this page — nothing is uploaded.' => 'Wird in dieser Seite gelesen — nichts wird hochgeladen.',
    'auto' => 'automatisch',
    'is' => 'ist',

    /* ------------------------------------------------------------
       Second German pass (round 58): the labels, unit phrases and
       whole sentences the widgets used to print in English because
       they were assembled in the template or rebuilt by the script.
       ------------------------------------------------------------ */
    'Passes for text' => 'Reicht für Text',
    'Fails for body text' => 'Reicht nicht für Fließtext',
    '{hz} Hz is exactly on {name} — {name} sits at {noteHz} Hz.' => '{hz} Hz liegt genau auf {name} — {name} liegt bei {noteHz} Hz.',
    '{hz} Hz is {cents} cents above {name} — {name} sits at {noteHz} Hz.' => '{hz} Hz liegt {cents} Cent über {name} — {name} liegt bei {noteHz} Hz.',
    '{hz} Hz is {cents} cents below {name} — {name} sits at {noteHz} Hz.' => '{hz} Hz liegt {cents} Cent unter {name} — {name} liegt bei {noteHz} Hz.',
    '{hz} Hz is' => '{hz} Hz ist',
    'Type a frequency between 1 and 20 000 Hz.' => 'Gib eine Frequenz zwischen 1 und 20 000 Hz ein.',
    'Compression finds repetition. This sentence repeats itself: compression finds repetition, compression finds repetition.' => 'Komprimierung findet Wiederholung. Dieser Satz wiederholt sich: Komprimierung findet Wiederholung, Komprimierung findet Wiederholung.',
    'gzip looks back over the last 32 KB for a sequence it has already seen and stores a pointer instead of the text.' => 'gzip schaut 32 KB zurück nach einer Folge, die es schon gesehen hat, und speichert einen Zeiger statt des Textes.',
    'That is why prose shrinks to about a third and a random hex string does not shrink at all.' => 'Darum schrumpft Fließtext auf etwa ein Drittel, während eine zufällige Hex-Zeichenkette gar nicht kleiner wird.',
    '{in} → {out}, {pct}% smaller.' => '{in} → {out}, {pct}% kleiner.',
    'This browser cannot compress locally; the server answer above still stands.' => 'Dieser Browser kann nicht lokal komprimieren; die Serverantwort oben gilt weiterhin.',
    'Decimal' => 'Dezimal',
    'Hexadecimal' => 'Hexadezimal',
    'Octal' => 'Oktal',
    'Binary' => 'Binär',
    'Base 36' => 'Basis 36',
    'Bits' => 'Bits',
    'Bytes' => 'Bytes',
    'Empty' => 'Leer',
    'Too long — the end will be cut' => 'Zu lang — das Ende wird abgeschnitten',
    'Full — right at the limit' => 'Voll — genau an der Grenze',
    'Fits with room to spare' => 'Passt mit Luft nach oben',
    'Google shows about {chars} characters / {px} px' => 'Google zeigt etwa {chars} Zeichen / {px} px',
    '{n} chars · {px} px' => '{n} Zeichen · {px} px',
    'Broadcast' => 'Broadcast',
    'Subnet mask' => 'Subnetzmaske',
    'Wildcard' => 'Wildcard',
    'First usable' => 'Erste nutzbare Adresse',
    'Last usable' => 'Letzte nutzbare Adresse',
    'Usable hosts' => 'Nutzbare Hosts',
    'Addresses in block' => 'Adressen im Block',
    'Address class' => 'Adressklasse',
    'Private range' => 'Privater Bereich',
    'Multicast / reserved' => 'Multicast / reserviert',
    'Class A' => 'Klasse A',
    'Class B' => 'Klasse B',
    'Class C' => 'Klasse C',
    'Yes — RFC 1918' => 'Ja — RFC 1918',
    'No' => 'Nein',
    '{n} hosts' => '{n} Hosts',
    'address' => 'Adresse',
    'mask' => 'Maske',
    'AND → network' => 'AND → Netzwerk',
    'inverted' => 'invertiert',
    'OR  → broadcast' => 'OR  → Broadcast',
    '“{given}” is not an IPv4 address. The numbers below are the example block 192.168.1.130/26, not an answer about what you typed.' => '„{given}“ ist keine IPv4-Adresse. Die Zahlen unten gehören zum Beispielblock 192.168.1.130/26, nicht zu deiner Eingabe.',
    'This is a private address, so it is not routed on the internet — which is why every home router hands out 192.168.x.x.' => 'Das ist eine private Adresse und wird deshalb nicht im Internet geroutet — darum verteilt jeder Heimrouter 192.168.x.x.',
    'This is a public address: whoever holds it is reachable from the internet, unless a firewall says otherwise.' => 'Das ist eine öffentliche Adresse: Wer sie hält, ist aus dem Internet erreichbar, sofern keine Firewall etwas anderes sagt.',
    'A /{bits} point-to-point block has no network and broadcast pair — both addresses are usable.' => 'Ein /{bits}-Punkt-zu-Punkt-Block hat kein Netzwerk-/Broadcast-Paar — beide Adressen sind nutzbar.',
    'That is not an IPv4 address, so the numbers below are still the last good block — 192.168.1.130/26. Type four numbers 0–255 and an optional /0–/32.' => 'Das ist keine IPv4-Adresse, daher zeigen die Zahlen unten weiterhin den letzten gültigen Block — 192.168.1.130/26. Gib vier Zahlen 0–255 und optional /0–/32 ein.',
    '{sens} in {game} is {cm} cm per 360°.' => '{sens} in {game} entspricht {cm} cm pro 360°.',
    '{focus} min focus + {break} min break in {block} minutes = 1 round, {spare} minutes spare.' => '{focus} min Fokus + {break} min Pause ergeben in {block} Minuten 1 Runde, {spare} Minuten bleiben übrig.',
    '{focus} min focus + {break} min break in {block} minutes = {rounds} rounds, {spare} minutes spare.' => '{focus} min Fokus + {break} min Pause ergeben in {block} Minuten {rounds} Runden, {spare} Minuten bleiben übrig.',
    'Pause' => 'Pause',
    'under a second' => 'unter einer Sekunde',
    '{n} minutes' => '{n} Minuten',
    '{n} years' => '{n} Jahre',
    '{n} thousand years' => '{n} tausend Jahre',
    '{n} million years' => '{n} Millionen Jahre',
    '{n} billion years' => '{n} Milliarden Jahre',
    'longer than the universe has existed' => 'länger, als das Universum existiert',
    'Tick at least one kind of character.' => 'Wähle mindestens eine Zeichenart.',
    'Twelve tools that do one thing each, free, with the working shown.' => 'Zwölf Werkzeuge, jedes für eine Sache, kostenlos und mit nachvollziehbarem Rechenweg.',
    '{n} characters, {w} words.' => '{n} Zeichen, {w} Wörter.',
    '{n} over' => '{n} zu viel',
    '{n} left of {limit}' => '{n} von {limit} übrig',

    /* Labels written as literal keys in the third pass, so the coverage test
       can see them: waveform names, character classes, platform names. */
    'Sine' => 'Sinus',
    'Square' => 'Rechteck',
    'Triangle' => 'Dreieck',
    'Sawtooth' => 'Sägezahn',
    'Lower-case letters (no l)' => 'Kleinbuchstaben (ohne l)',
    'Capital letters (no I or O)' => 'Großbuchstaben (ohne I und O)',
    'Digits (no 0 or 1)' => 'Ziffern (ohne 0 und 1)',
    'Symbols' => 'Sonderzeichen',
    'X (Twitter)' => 'X (Twitter)',
    'Instagram caption' => 'Instagram-Bildunterschrift',
    'LinkedIn post' => 'LinkedIn-Beitrag',
    'TikTok caption' => 'TikTok-Bildunterschrift',
    'Threads' => 'Threads',
    'YouTube title' => 'YouTube-Titel',
    'Pinterest description' => 'Pinterest-Beschreibung',
];
