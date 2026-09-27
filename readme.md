# Map 0.1.1

Embed a map from OpenStreetMap. Developed by Liam Perlaki.

There is no official map extension for Datenstrom Yellow, this is a small one: a shortcut that puts
the OpenStreetMap embed into a page, no API key, no tracking scripts, no map library.

## How to install an extension

[Download ZIP file](https://github.com/pfadfinder26/yellow-map/archive/refs/heads/main.zip) and copy it into your `system/extensions` folder. [Learn more about extensions](https://github.com/annaesvensson/yellow-update).

## How to add a map

    [map 48.2266 16.3466]

The arguments are latitude, longitude, zoom and the label of the link below the map:

    [map 48.2266 16.3466 16 "Größere Karte auf OpenStreetMap"]

Coordinates of an address are on [openstreetmap.org](https://www.openstreetmap.org), right click,
"show address". `MapZoom` and `MapAspectRatio` in `system/extensions/yellow-system.ini` set the
defaults, `16` and `16:9`.

The map is an `<iframe>` in a `<div class="map flexible">`, your theme decides how it looks, and the
`flexible` class of most themes keeps the aspect ratio on phones. The frame is loaded lazily.

**Data protection:** the map is loaded from the servers of the OpenStreetMap Foundation, which see
the IP address of your visitors. Say so on your privacy page.

Do you have questions? [Get help](https://datenstrom.se/yellow/help/).
