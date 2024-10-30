<?php

namespace DIDIPlugin\DIDIBootstrap;

use DIDIPlugin\DIDIAdmin\DIDIChartCustomPostPage;
use DIDIPlugin\DIDISettings\DIDIAdminSettings;
use DIDIPlugin\DIDIShortcodes\DIDIShortcoder;
use DIDIPlugin\DIDICustomPosts\DIDICustomPostsHandler;
use DIDIPlugin\DIDITasks\DIDIChartsTask;

class DIDIBootstrapPlugin
{
    /**
     * DIDIBootstrapPlugin constructor.
     * Review menus Later on
     */
    public function __construct()
    {
        $this->settings = new DIDIAdminSettings();
        $this->shortcoder = new DIDIShortcoder();
        $this->customPostsHandler = new DIDICustomPostsHandler();
        $this->customChartPostPageHandler = new DIDIChartCustomPostPage();
        $this->chartTask = new DIDIChartsTask();
    }
}