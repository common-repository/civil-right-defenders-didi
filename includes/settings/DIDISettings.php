<?php

namespace DIDIPlugin\DIDISettings;

class DIDISettings
{
    public $api_user_token = 'hq_crd_api_user_token_key_option';

    public $api_tenant_token = 'hq_crd_api_tenant_token_key_option';

    public $api_encoded_token = 'hq_crd_api_encoded_token_option';

    public $api_base_url = 'hq_crd_api_base_url_option';

    public $graphic_font = 'hq_crd_graphics_font';

    public function getApiUserToken()
    {
        return get_option($this->api_user_token);
    }

    public function getApiTenantToken()
    {
        return get_option($this->api_tenant_token);
    }

    public function getApiDecodedToken()
    {
        return get_option($this->api_encoded_token);
    }

    public function getApiBaseUrl()
    {
        return get_option($this->api_base_url, 'https://api.didi.crd.org');
    }

    public function getApiEncodedToken()
    {
        return get_option($this->api_encoded_token);
    }

    public function getGraphicsFont()
    {
        return get_option($this->graphic_font);
    }

    public function saveApiBaseUrl($newApiUrl)
    {
        update_option($this->api_base_url, $newApiUrl);
    }

    public function saveApiUserToken($token)
    {
        update_option($this->api_user_token, $token);
    }

    public function saveApiTenantToken($token)
    {
        update_option($this->api_tenant_token, $token);
    }

    public function saveEncodedApiKey($tenantKey, $userKey)
    {
        update_option($this->api_encoded_token, base64_encode($tenantKey . ':' . $userKey));
    }

    public function saveGraphicsFont($newFont)
    {
        update_option($this->graphic_font, $newFont);
    }

    public function updateSettings($postDataFromSettings)
    {
        if (isset($postDataFromSettings[$this->api_base_url])) {
            $this->saveApiBaseUrl($postDataFromSettings[$this->api_base_url]);
        }
        if (isset($postDataFromSettings[$this->api_tenant_token])) {
            $this->saveApiTenantToken($postDataFromSettings[$this->api_tenant_token]);
        }
        if (isset($postDataFromSettings[$this->api_user_token])) {
            $this->saveApiUserToken($postDataFromSettings[$this->api_user_token]);
        }
        if (isset($postDataFromSettings[$this->graphic_font])) {
            $this->saveGraphicsFont($postDataFromSettings[$this->graphic_font]);
        }
        $this->saveEncodedApiKey($this->getApiTenantToken(), $this->getApiUserToken());
    }
}
