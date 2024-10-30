<?php

namespace DIDIPlugin\DIDIShortcodes;

/**
 * Class DIDIShortcoder
 *
 * @package DIDIPlugin\DIDIShortcodes
 * This class its just for making the Shortcodes accesible to Wordpress
 */
class DIDIShortcoder
{
    public function __construct()
    {
        $this->chartsShortcode = new DIDIChartShortcode();
    }
}