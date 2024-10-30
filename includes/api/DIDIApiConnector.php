<?php

namespace DIDIPlugin\DIDIApi;

use DIDIPlugin\DIDIApi\DIDIApiResponse as ApiResponse;

class DIDIApiConnector
{
    /*
     * Constructor
     */
    public function __construct()
    {
        $this->endpoints = new DIDIApiEndpoint();
        $this->configuration = new DIDIApiConfiguration();
    }

    /*
     * Resolved Api Calls
     */
    public function resolveDashboardApiCall($response)
    {
        if (is_wp_error($response)) {
            return new ApiResponse($response->get_error_message(), false, null, $response->get_error_message());
        } elseif (!(json_decode($response['body'])->success)) {
            $result = json_decode($response['body']);
            $errors = isset($result->errors) ? $result->errors:[];
            $message = isset($result->errors->error_message) ? $result->errors->error_message:(isset($result->messagge) ? $result->message:'');

            return new ApiResponse($errors, false, null, $message);
        } else {
            return new ApiResponse(null, true, json_decode($response['body'], true)['data']);
        }
    }

    public function getDIDICharts($params = [])
    {
        $response =
            wp_remote_get($this->endpoints->getDashboardEndpoint($params), $this->configuration->getBasicApiConfiguration());

        return $this->resolveDashboardApiCall($response);
    }
}