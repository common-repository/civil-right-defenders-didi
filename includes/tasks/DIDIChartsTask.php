<?php

namespace DIDIPlugin\DIDITasks;

use DIDIPlugin\DIDIModels\DIDIChart;
use DIDIPlugin\DIDIApi\DIDIApiConnector;

class DIDIChartsTask
{
    protected $chart;

    protected $connector;

    protected $chartsApi;

    public function __construct()
    {
        $this->chart = new DIDIChart();
        $this->connector = new DIDIApiConnector();
    }

    public function dropCharts()
    {
        foreach ($this->chart->all() as $chartPost) {
            $metas = get_post_meta($chartPost->ID, '', false);
            if (!empty($metas)) {
                foreach ($metas as $key => $values) {
                    delete_post_meta($chartPost->ID, $key);
                }
            }
            wp_delete_post($chartPost->ID, true);
        }

        return $this;
    }

    public function upCharts()
    {
        $this->chartsApi = $this->connector->getDIDICharts([
            'daterange' => '1969-01-01,2069-12-31',
        ]);
        if ($this->chartsApi->success) {
            $posts = array_merge($this->chartsApi->data['charts'], $this->chartsApi->data['boxes']);
            foreach ($posts as $key => $chart) {
                $newPost = wp_insert_post([
                    'post_type' => $this->chart->chartsCustomPostName,
                    'post_title' => isset($chart['data']['title']) ? $chart['data']['title']:$chart['data']['label'],
                    'post_status' => 'publish',
                ]);
                update_post_meta($newPost, $this->chart->metaIndex, $key);
            }
        }

        return $this;
    }
}