<?php

use MailPoet\Newsletter\Renderer\Blocks\Button;

/**
 * Plugin Name:       Woocommercedashboard
 * Plugin URI:        https:website.com
 * Description:       Mô tả
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            xuandoan
 * Author URI:        https://xuandoan.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       woocommercedashboard
 * Domain Path:       /languages
 */

function my_shortcode()
{
       ob_start();
?>
<HTML>
<head>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
<body>  
<div id="hearder">
    <div class="addnew">
        <a href="#"><i class="fas fa-plus-square"></i> Add New</a>      
    </div>
</div>
<div id="h-down">
    <div class = "d-down">
    <form action="" method="$_GET">
        <label for="date">Date: </label>
        <select name="options[date]">
        <option value="1">july 2021</option>
        <option>june 2021</option>
        <option>August 2021</option>
        </select>
        </div>
        <button type="submit">Filter</button>
    </form>
	<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
  <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" 
  value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
</form>
</div>
<div id="slt">
    <label>Selected 1 records</label>
    <select>
        <option>Bulk Actions</option>
        <option>Move to trash</option>
    </select>  
</div>
<div id="menu">
        <ul>
            <li><a href="#">DoashBoard</a>
            </li>
            <li>
                <a href="#">Store Listing</a>
                <ul class="menudown">
                    <li><a href="#">Store listing</a></li>
                    <li><a href="#">Add Store</a></li>
                    <li><a href="#">Category</a></li>
                </ul>
            </li>
            <li><a href="#">product</a>
                <ul class="menudown">
                    <li><a href="#">All Product</a></li>
                    <li><a href="#">Publisher</a></li>
                    <li><a href="#">Pending Preview</a></li>
                    <li><a href="#">Draft</a></li>
                    <li><a href="#">Trash</a></li>
                    <li><a href="#">Review</a></li>
                </ul>
            </li>
            <li><a href="#">Articles</a>
                <ul class="menudown">
                    <li><a href="#">All Articles</a></li>
                    <li><a href="#">Published</a></li>
                    <li><a href="#">Draft</a></li>
                    <li><a href="#">Trash</a></li>
                    <li><a href="#">Comment</a></li>
                </ul>
            </li>
            <li><a href="#">Order</a>
                <ul class="menudown">
                    <li><a href="#">All Order</a></li>
                    <li><a href="#">Processing</a></li>
                    <li><a href="#">On Hold</a></li>
                    <li><a href="#">Completed</a></li>
                    <li><a href="#">Cancelled</a></li>
                </ul>
            </li>
            <li><a href="#">Faqs</a>
                <ul class="menudown">
                    <li><a href="#">All FAQs</a></li>
                    <li><a href="#">Add New</a></li>
                </ul>
            </li>
            <li><a href="#">Customer</a></li>
            <li><a href="#">Tare Wallet</a>
                <ul class="menudown">
                    <li><a href="#">Tare Wallet</a></li>
                    <li><a href="#">Transaction</a></li>
                </ul>
            </li>
            <li><a href="#">Awesome Support</a></li>
            <li><a href="#">Customize</a></li>
            <li><a href="#">Withdraw</a></li>
            <li><a href="?optionpage=setting">Setting</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
<div id = "views">
<?php
    if(isset($_GET['optionpage'])){
       ?>       
       <div id="cnt">
           <div class="top">
           <p><i class='fas fa-user-cog'></i> Woocommencer Dashboard setting</p>
               <a><span>Update</span></a>
           </div>
           <form action="<?php $url = site_url('kaihavier?optionpage=setting'); echo $url?>" method="post">
           <div class="main">
               <div class="m1">
                   <ul>
                       <li><a href="#">Generals</a></li>
                       <li><a href="#">Live chart</a></li>
                   </ul>
               </div>
               <div class ="m2">
                    <p>Generals Settings</p><br>
                    <label>Shop layout..:</label>
            
                    <select name="shoplayout">
                        <option value="fullwidth" name = "fulloption">fullwidth</option>
                        <option value="box" name = "boxoption">Box</option>
                    </select><br><br><br>
                    <label>sidebar Mode:</label>
                    <select>
                        <option value="black">Black</option>
                        <option value="white">white</option>
                    </select>

               </div>
           </div>
           <button type="submit" class="sbt">Update</button>
            </form>
       </div>
       <?php
    }
    ?>
    <?php 
    if(!isset($_GET['optionpage'])){?>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Comment</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $args = array(
                        'posts_per_page' => 10,
                        'post_type'   => 'post',
                    );
                    $id = $_GET['post'];
                    $action = $_GET['action'];
                    // echo $action;
                    // echo $id;
                    if($action=='delete'){
                     wp_delete_post($id);
                    }
                    $wp_post = get_posts($args);
                    foreach ($wp_post as $post) : 
                        // var_dump($post) 
                    ?>
                        
                            <tr>
                                <td><input type="checkbox">
                                </input><a href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_title ?></a>
                                <?php if (current_user_can('edit_post', $post->ID)) echo "<a href='" . wp_nonce_url("http://localhost/wp/kaihavier/?action=delete&amp;post=".$post->ID) . "'>Trash</a>" ?>
                            </td>
                                <td><a href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_author?></a></td>
                                <td><a href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->comment_count ?></a></td>
                                <td><a href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_date ?></a></td>
                            </tr>
                <?php endforeach; ?> 
                <?php
                
                ?>
            </tbody>
        </table>
    <?php }?>
</div>
</body>
</head>
</HTML>
<?php return ob_get_clean();
}
add_shortcode('shortcode1', 'my_shortcode');

function post_type()
{
}
add_action('init', 'post_type');
function activation()
{
       post_type();
       flush_rewrite_rules();
}
register_activation_hook(plugin_dir_url(__FILE__) . 'WooCommerceDashboard/WooCommerceDashboard.php', 'post_type');

function deactivation()
{

       flush_rewrite_rules();
}
register_deactivation_hook(plugin_dir_url(__FILE__) . 'WooCommerceDashboard/WooCommerceDashboard.php', 'deactivation');

// function xdoan_insert_post()
// {
//        $str = "";

//        $post_data = array(
//               'post_title' => $str,
//               'post_content' => '[shortcode1]',
//               'post_status' => 'publish',
//               'post_type' => 'post',
//        );

//        $post_id = post_exists($str);
//        if ($post_id == 0) {
//               $post_id = wp_insert_post($post_data);
//        }
// }
// add_action('admin_init', 'xdoan_insert_post');
function style()
{
       wp_enqueue_style('WooCommerceDashboard', plugin_dir_url(__FILE__) . 'CSS/fullwidth.css', array(), false, 'all');
       wp_enqueue_style('WooCommerceDashboard');
}
add_action('init', 'style');

function wporg_xngs_init() {
    register_setting( 'Option', 'wporg_options' );
 
    // Register a new section in the "wporg" page.
    add_settings_section(
        'wporg_section_developers',
        __( 'Delay type show', 'wporg' ), 'wporg_section_developers_callback',
        'wporg'
    );
 
    // Register a new field in the "wporg_section_developers" section, inside the "wporg" page.
    add_settings_field(
        'wporg_field_pill', 
            __( 'Option Box', 'wporg' ),
        'wporg_field_pill_cb',
        'wporg',
        'wporg_section_developers',
        array(
            'label_for'         => 'wporg_field_pill',
            'class'             => 'wporg_row',
            'wporg_custom_data' => 'custom',
        )
    );
    add_option('Woomerce_Dashboard');
}
add_action( 'admin_init', 'wporg_xngs_init' );
function wporg_section_developers_callback( $args ) {
     ?>
     <?php
}
?>
<?php
function wporg_field_pill_cb( $args ) {
    // Get the value of the setting we've registered with register_setting()
    $options = get_option( 'wporg_options' );
    ?>
    <select
            id="<?php echo esc_attr( $args['label_for'] ); ?>"
            data-custom="<?php echo esc_attr( $args['wporg_custom_data'] ); ?>"
            name="wporg_options[<?php echo esc_attr( $args['label_for'] ); ?>]">
        <option value="fullwidth" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'fullwidth', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'fullwitdth', 'wporg' ); ?>
        </option>
        <option value="box" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'box', false ) ) : ( '' ); ?>>
            <?php esc_html_e( 'box', 'wporg' ); ?>
        </option>
    </select>
    <?php
}
function wporg_options_page() {
    add_menu_page(
        'Woomerce Dashboard',
        'setting box',
        'manage_options',
        'wporg',
        'options_page_html'
    );
}
add_action( 'admin_menu', 'wporg_options_page' );

function options_page_html() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    if ( isset( $_GET['settings-updated'] ) ) {
        // add settings saved message with the class of "updated"
        add_settings_error( 'wporg_messages', 'wporg_message', __( 'Settings Saved', 'wporg' ), 'updated' );
    }
 
    // show error/update messages
    settings_errors( 'wporg_messages' );
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'wporg' );
            do_settings_sections( 'wporg' );
            submit_button( 'Change Settings' );
            ?>
        </form>
    </div>
    <?php
}

if(isset($_POST['shoplayout'])){
    update_option('Woomerce_Dashboard',$_POST['shoplayout']);
}
 
function get_custom_post_type_template( $page_template ) {
    global $post;
 
    if ($post->post_type == 'page' ) {
        // echo 'page';
        $page_template = dirname( __FILE__ ) . '/post-type-template.php';
    }
    $shoplayout = get_option('Woomerce_Dashboard','fullwidth');
    if($shoplayout == 'fullwidth' ){
    return $page_template;
   }
}
add_filter( 'page_template', 'get_custom_post_type_template' );
