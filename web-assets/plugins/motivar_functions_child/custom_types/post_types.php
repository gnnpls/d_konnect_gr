<?php
if (!defined('ABSPATH'))
    exit;
function motivar_get_my_custom_posts($post_type)
{

    /*how it should look

    array('post'=>'sbp_room','sn'=>'Room','pl'=>'Rooms','args'=>array( 'title', 'revisions','editor'),'chk'=>true,'mnp'=>3,'icn'=>'','slug'=>get_option('sbp_room_slug') ?: 'rooms','en_slg'=>1,'new'=>'Νέα','edit'=>'Επεξεργασία',$n['view'].' '=>'Προβολή','search'=>'Αναζήτηση','no'=>'Δεν υπάρχει','no_trushed'=>'Δεν υπάρχουν διεγραμμένα','parent'=>'Γονέας','desc'=>'')

    */

    /*put the posts inside*/
    $all = array();
    if ($post_type == 'all') {
        $msg = $all;
    } else {
        foreach ($all as $k) {
            $posttype = $k['post'];
            if ($posttype == $post_type) {
                $msg = $k;
            }
        }
    }
    return $msg;
}

add_action('init', 'motivar_register_my_cpts');

function motivar_register_my_cpts()
{
    $names = motivar_get_my_custom_posts('all');
    if (!empty($names)) {
        foreach ($names as $n) {
            $chk          = $n['chk'];
            $hierarchical = '';
            if ($chk == 'true') {
                $hierarchical == 'false';
            } else {
                $hierarchical == 'true';
            }
            $labels = $args = array();
            $labels = array(
                'name' => __($n['pl']),
                'singular_name' => __($n['sn']),
                'menu_name' => __($n['pl']),
                'add_new' => __($n['new'].' ' . $n['sn']),
                'add_new_item' => __($n['new'].' '. $n['sn']),
                'edit' => __($n['edit']),
                'edit_item' => __($n['edit'].' ' . $n['sn']),
                'new_item' => __($n['new'].' '. $n['sn']),
                'view' => __($n['view'].' ' . $n['sn']),
                'view_item' => __($n['view'].' ' . $n['sn']),
                'search_items' => __($n['search'].' ' . $n['sn']),
                'not_found' => __($n['no'].' ' . $n['pl']),
                'not_found_in_trash' => __($n['no_trushed'].' ' . $n['pl']),
                'parent' => __($n['parent'].' ' . $n['sn'])
            );
            $args   = array(
                'labels' => $labels,
                'description' => __($n['desc'].' '.$n['pl']),
                'public' => $n['chk'],
                'show_ui' => true,
                'has_archive' => $n['chk'],
                'show_in_menu' => true,
                'exclude_from_search' => $n['chk'],
                'capability_type' => 'post',
                'map_meta_cap' => true,
                'hierarchical' => $hierarchical,
                'rewrite' => array(
                    'slug' => $n['post'],
                    'with_front' => true
                ),
                'query_var' => true,
                'supports' => $n['args']
            );

            if (!empty($n['slug'])) {
                $args['rewrite']['slug'] = $n['slug'];
            }

            if (!empty($n['mnp'])) {
                $args['menu_position'] = $n['mnp'];
            }

            if (!empty($n['icn'])) {
                $args['menu_icon'] = $n['icn'];
            }
            register_post_type($n['post'], $args);

            if (isset($n['en_slg']) && $n['en_slg'] == 1) {
                add_action('load-options-permalink.php', function($views) use ($n)
                {
                    if (isset($_POST[$n['post'] . '_slug'])) {
                        update_option($n['post'] . '_slug', sanitize_title_with_dashes($_POST[$n['post'] . '_slug']));
                    }

                    add_settings_field($n['post'] . '_slug', __($n['pl'] . ' Slug'), function($views) use ($n)
                    {
                        $value = get_option($n['post'] . '_slug');
                        echo '<input type="text" value="' . esc_attr($value) . '" name="' . $n['post'] . '_slug' . '" id="' . $n['post'] . '_slug' . '" class="regular-text" placeholder="' . $n['slug'] . '"/>';

                    }, 'permalink', 'optional');
                });

            }


        }
    }
}