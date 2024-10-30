<?php

namespace DIDIPlugin\DIDISettings;

use DIDIPlugin\DIDIApi\DIDIApiConnector;

class DIDIAdminSettings
{
    protected $settingsPageTitle = "DiDi – Defenders' Database";
    protected $settingsMenuTitle = 'DiDi – Settings';
    protected $settingsSlug = 'hq-crd-settings';

    /**
     * @var \DIDIPlugin\DIDISettings\DIDISettings
     */
    private $settings;

    /**
     * @var \DIDIPlugin\DIDIApi\DIDIApiConnector
     */
    private $connector;

    function __construct()
    {
        $this->settings = new DIDISettings();
        $this->connector = new DIDIApiConnector();
        add_action('admin_menu', array($this, 'setAdminMenuOptions'));
    }

    public function setAdminMenuOptions()
    {
        add_options_page(
            $this->settingsPageTitle,
            $this->settingsMenuTitle,
            'manage_options',
            $this->settingsSlug,
            array($this, 'displaySettingsPage')
        );
    }

    public function displaySettingsPage()
    {
        if (!empty($_POST)) {
            $this->settings->updateSettings($_POST);
            $result = $this->connector->getDIDICharts();
        }

        include CRD_DIDI_PLUGIN_DIR.'/includes/views/settings.php';
    }
}