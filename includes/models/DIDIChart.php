<?php

namespace DIDIPlugin\DIDIModels;

class DIDIChart
{
    public $customPostSlug = 'crd-didi-charts';

    public $chartsCustomPostName = 'crd-didi-charts';

    public $metaIndex = 'crd_didi_charts_meta_index';

    public function __construct()
    {
        $this->labels = [
            'name' => _x('DiDi - Charts', 'post type general name', 'crd-didi'),
            'singular_name' => _x('DiDi - Chart', 'post type singular name', 'crd-didi'),
            'menu_name' => _x('DiDi - Charts', 'admin menu', 'crd-didi'),
            'name_admin_bar' => _x('DiDi - Chart', 'add new on admin bar', 'crd-didi'),
        ];
        $this->argsRegistration = [
            'labels' => $this->labels,
            'public' => false,
            'show_in_admin_bar' => true,
            'publicly_queryable' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'query_var' => true,
            'rewrite' => ['slug' => $this->customPostSlug],
            'has_archive' => false,
            'hierarchical' => false,
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-chart-pie',
            'menu_position' => 2,
            'capability_type' => 'post',
            'capabilities' => [
                'create_posts' => 'do_not_allow',
                'delete_posts' => 'do_not_allow',
            ],
        ];
    }

    public function all()
    {
        return (new \WP_Query([
            'post_type' => $this->chartsCustomPostName,
            'posts_per_page' => -1,
        ]))->posts;
    }
}