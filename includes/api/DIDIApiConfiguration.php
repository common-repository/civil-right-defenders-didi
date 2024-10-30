<?php

namespace DIDIPlugin\DIDIApi;

use DIDIPlugin\DIDISettings\DIDISettings;

class DIDIApiConfiguration
{
    public function __construct()
    {
        $this->settings = new DIDISettings();
        $this->endpoints = new DIDIApiEndpoint();
    }

    public function getBasicApiConfiguration()
    {
        return [
            'timeout' => 30,
            'headers' => [
                'Authorization' => 'Basic ' . $this->settings->getApiEncodedToken(),
            ],
        ];
    }

    public function getApiConfigurationWithParams($params)
    {
        return array_merge(
            $this->getBasicApiConfiguration(),
            [
                'body' => $params,
            ]
        );
    }
}