<?php

namespace DIDIPlugin\DIDIAdmin;

use DIDIPlugin\DIDIModels\DIDIChart;
use DIDIPlugin\DIDISettings\DIDISettings;
use DIDIPlugin\DIDITasks\DIDIChartsTask;

class DIDIChartCustomPostPage
{
    function __construct()
    {
        $this->chart = new DIDIChart();
        $this->settings = new DIDISettings();
        add_action( 'admin_init', [$this, 'refreshCharts']);
        add_filter('manage_' . $this->chart->chartsCustomPostName . '_posts_columns', [
            $this,
            'addNewColumnsOnChartAdminScreen',
        ], 100, 2);
        add_action('manage_' . $this->chart->chartsCustomPostName . '_posts_custom_column', [
            $this,
            'displayChartDataOnAdminTable',
        ], 100, 2);
    }

    public function refreshCharts()
    {
        if (isset($_REQUEST['post_type']) && $_REQUEST['post_type'] === 'crd-didi-charts') {
            (new DIDIChartsTask())->dropCharts()->upCharts();
        }
    }

    public function addNewColumnsOnChartAdminScreen($defaults)
    {
        return [
            'title' => 'Title',
            'shortcode' => 'Shortcode',
        ];
    }

    public function displayChartDataOnAdminTable($columnName, $postId)
    {
        $index = get_post_meta($postId, $this->chart->metaIndex, true);
        if ($columnName === 'shortcode') {
            echo '[didi_chart index=' . $index . ' font=' . $this->settings->getGraphicsFont() . ']';
        }
    }
}