<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!wp_next_scheduled('konnect_collect_money')) {
    wp_schedule_event(time(), 'daily', 'konnect_collect_money');
}

add_action('konnect_collect_money', 'konnect_collect_money_function');

function konnect_collect_money_function()
{

    $month = 8;
    $year = 2018;

    $fields = array('month' => $month, 'year' => $year);

    $data = konnect_rest_php('get', 'https://i.konnect.gr/wp-json/i-konnect-gr/konnect-acommodation-income', $fields);

    if (!empty($data)) {

        $args = array(
            'post_type' => 'easy_finances',
            'post_status' => 'publish',
            'numberposts' => 1,
            'fields' => 'ids',
        );
        $meta_array = array('relation' => 'AND');

        $meta_array[] = array(
            'key' => 'month',
            'value' => array((int) $month, $month),
            'compare' => 'IN',
        );
        $meta_array[] = array(
            'key' => 'year',
            'value' => (int) $year,
            'compare' => '=',
        );

        $args['meta_query'] = $meta_array;

        $posts = get_posts($args);

        if (!empty($posts)) {
            $id = $posts[0];

            delete_field('income', $id);
            $income = array();
            $time = date('d/m/Y', strtotime('now'));
            foreach ($data as $key => $dato) {
              if ($dato['paid']>0)
              {

              
                $new_value = array('date' => $time, 'type' => 17, 'source' => 20, 'amount' => $dato['paid'], 'final' => $dato['paid'], 'income_source' => $dato['title'], 'reason' => 'Konnect Fee - '.$dato['all']);
                update_row('income', $key, $new_value, $id);
                }
                

            }

        }
    }
    return true;
}

add_action('admin_init', function () {
    if (isset($_REQUEST['test_crons'])) {
        konnect_collect_money_function();
    }
}, 10, 1);
