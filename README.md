Map of Photos Location
======================

![Elgg 2.3](https://img.shields.io/badge/Elgg-2.3-orange.svg?style=flat-square)

This plugin adds location functionality for photos uploaded with Tidypics plugin.

If photos contain Latitude & Longitude data on exif information, the location of the photo is auto-detected and is saved automatically.

Alternatively the user can set the photo location when editing the images.

On plugin settings, the administrator can run a batch script for existing photos geolocation.

## Installation

Use composer to install this plugin. On site root folder, run the command:
```php
composer require nlybe/photosmap
```

## Requirements

The [amap_maps_api](https://github.com/nlybe/Elgg-MapsAPI) and [tidypics](https://github.com/iionly/tidypics) plugins are required to be installed.

The following keys should be submitted on [amap_maps_api](https://github.com/nlybe/Elgg-MapsAPI) settings:
1. A Google API key for google maps usage
2. A second Google API key which should have access restrictions based on IP address (required for reverse geolocation)

