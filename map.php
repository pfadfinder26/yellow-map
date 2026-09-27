<?php
// Map extension, https://github.com/pfadfinder26/yellow-map
// Based on Datenstrom Yellow, https://datenstrom.se/yellow/

class YellowMap {
    const VERSION = "0.1.1";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
        $this->yellow->system->setDefault("mapZoom", "16");
        $this->yellow->system->setDefault("mapAspectRatio", "16:9");
    }
    
    // Handle page content element
    public function onParseContentElement($page, $name, $text, $attributes, $type) {
        $output = null;
        if ($name=="map" && ($type=="block" || $type=="inline")) {
            list($latitude, $longitude, $zoom, $label) = $this->yellow->toolbox->getTextArguments($text);
            if (!is_numeric($latitude) || !is_numeric($longitude)) return $this->getErrorHtml($text);
            if (!is_numeric($zoom)) $zoom = $this->yellow->system->get("mapZoom");
            if (is_string_empty($label)) $label = "OpenStreetMap";
            list($width, $height) = $this->yellow->toolbox->getTextList($this->yellow->system->get("mapAspectRatio"), ":", 2);
            $ratio = $width>0 && $height>0 ? $height/$width : 0.5625;
            $spanLongitude = 3*360/pow(2, $zoom);
            $spanLatitude = $spanLongitude*$ratio*cos(deg2rad($latitude));
            $boundingBox = ($longitude-$spanLongitude/2).",".($latitude-$spanLatitude/2).",".
                ($longitude+$spanLongitude/2).",".($latitude+$spanLatitude/2);
            $urlEmbed = "https://www.openstreetmap.org/export/embed.html?bbox=".rawurlencode($boundingBox).
                "&layer=mapnik&marker=".rawurlencode("$latitude,$longitude");
            $urlMap = "https://www.openstreetmap.org/?mlat=$latitude&mlon=$longitude#map=$zoom/$latitude/$longitude";
            $output = "<div class=\"map flexible\">";
            $output .= "<iframe src=\"".htmlspecialchars($urlEmbed)."\" title=\"".htmlspecialchars($label)."\"";
            $output .= " loading=\"lazy\" referrerpolicy=\"no-referrer\"></iframe>";
            $output .= "</div>\n";
            $output .= "<p class=\"map-link\"><a href=\"".htmlspecialchars($urlMap)."\">".htmlspecialchars($label)."</a></p>\n";
        }
        return $output;
    }
    
    // Return error message for authors
    public function getErrorHtml($text) {
        return "<p class=\"error\">Map: '".htmlspecialchars($text)."' needs a latitude and a longitude!</p>\n";
    }
}
