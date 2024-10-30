<?php

namespace DIDIPlugin\DIDICustomPosts;

use DIDIPlugin\DIDIModels\DIDIChart;

class DIDICustomPostsHandler
{
    public function __construct()
    {
        $this->chart = new DIDIChart();
        add_action('init', [$this, 'registerAllHQRentalsCustomPosts']);
    }

    public function registerAllHQRentalsCustomPosts()
    {
        register_post_type($this->chart->chartsCustomPostName, $this->chart->argsRegistration);
    }
}