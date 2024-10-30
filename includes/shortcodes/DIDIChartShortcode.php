<?php

namespace DIDIPlugin\DIDIShortcodes;

use DIDIPlugin\DIDIApi\DIDIApiConnector;
use DIDIPlugin\DIDISettings\DIDISettings;

class DIDIChartShortcode
{
    public function __construct()
    {
        $this->connector = new DIDIApiConnector();
        $this->charts = [];
        $this->settings = new DIDISettings();
        add_shortcode('didi_chart', [$this, 'displayShortcode']);
    }

    public function displayShortcode($atts)
    {
        $atts = shortcode_atts([
            'index' => '',
            'font' => '',
            'daterange' => '1969-01-01,2069-12-31',
            'country_code' => '',
            'region' => '',
            'municipality' => '',
            'incident_types' => '',
            'violated_rights' => '',
            'responsible_authorities' => '',
            'incident_date' => '',
            'tags' => '',
            'reporting_date' => '',
        ], $atts, 'hq_didi_chart');

        $query = array_merge(array_filter($atts), ['font' => $atts['font']]);
        foreach ($_GET as $key => $value) {
            $query[$key] = $value;
        }
        $this->charts = $this->connector->getDIDICharts($query);
        if ($this->charts->success) {
            if (isset($this->charts->data['charts'][$atts['index']])) {
                $chart = $this->charts->data['charts'][$atts['index']];
            } else {
                $chart = $this->charts->data['boxes'][$atts['index']];
            }

            return implode([
                '<link rel="stylesheet" href="' . $this->charts->data['fonts'] . '" type="text/css"/>',
                '<link rel="stylesheet" href="' . $this->charts->data['font-awesome'] . '" type="text/css"/>',
                '<script src="' . $this->charts->data['jquery'] . '"></script>',
                $this->charts->data['assets'],
                '<div class="hq-chart-wrapper">',
                $chart['html'],
                '</div>'
            ]);
        }
    }
}