# Map 0.1.1

Bettet eine Karte von OpenStreetMap ein. Entwickelt von Liam Perlaki.

Für Datenstrom Yellow gibt es keine offizielle Karten-Erweiterung, das hier ist eine kleine: ein
Shortcut, der die OpenStreetMap-Einbettung in eine Seite stellt, ohne API-Schlüssel, ohne
Trackingskripte, ohne Kartenbibliothek.

## Wie man eine Erweiterung installiert

[ZIP-Datei herunterladen](https://github.com/pfadfinder26/yellow-map/archive/refs/heads/main.zip) und in den Ordner `system/extensions` kopieren. [Mehr über Erweiterungen](https://github.com/annaesvensson/yellow-update).

## Wie man eine Karte einfügt

    [map 48.2266 16.3466]

Die Argumente sind Breitengrad, Längengrad, Zoom und die Beschriftung des Links unter der Karte:

    [map 48.2266 16.3466 16 "Größere Karte auf OpenStreetMap"]

Die Koordinaten einer Adresse findet man auf [openstreetmap.org](https://www.openstreetmap.org),
Rechtsklick, „Adresse anzeigen“. `MapZoom` und `MapAspectRatio` in
`system/extensions/yellow-system.ini` setzen die Voreinstellungen, `16` und `16:9`.

Die Karte ist ein `<iframe>` in einem `<div class="map flexible">`, das Aussehen bestimmt das Theme,
die Klasse `flexible` der meisten Themes hält das Seitenverhältnis am Handy. Der Rahmen wird erst
geladen, wenn er gebraucht wird.

**Datenschutz:** die Karte kommt von den Servern der OpenStreetMap Foundation, die dabei die
IP-Adresse der Besucher*innen sehen. Das gehört auf die Datenschutzseite.

Hast du Fragen? [Hier gibt's Hilfe](https://datenstrom.se/yellow/help/).
