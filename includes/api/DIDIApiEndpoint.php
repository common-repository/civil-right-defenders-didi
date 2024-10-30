<?php

namespace DIDIPlugin\DIDIApi;

use DIDIPlugin\DIDISettings\DIDISettings;

class DIDIApiEndpoint
{
    public function __construct()
    {
        $this->settings = new DIDISettings();
    }

    public function getDashboardEndpoint($params = [])
    {
        return $this->settings->getApiBaseUrl() . '/api/dashboards?dashboard=crd.incidents&'.http_build_query($params);
    }
}