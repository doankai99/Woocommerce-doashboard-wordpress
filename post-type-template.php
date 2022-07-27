<?php
wp_head(); 
if(isset($_POST['shoplayout'])){
    update_option('Woomerce_Dashboard',$_POST['shoplayout']);
}
// && current_user_can('level_0') && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' )

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if (isset($_POST['title'])) {
        $post_title = $_POST['title'];
    }
    if (isset($_POST['status'])) {
        $post_status = $_POST['status'];
    }
    if (isset ($_POST['comment'])) {
        $comment = $_POST['comment'];
    }
    if(isset($_POST['date'])){
        $date = $_POST['date'];
    }
    if (isset($_POST['addpost'])){
        $posts = array(
            'post_title'    => $post_title,
            'post_content' => '[shortcode1]',
            'post_status'  => $post_status,
            'comment_count'  => $comment,
            'post_author' => 2,
            'post_date' => $date,
            'post_type' => 'post',
        );
        $insert = wp_insert_post($posts);
    }
}
if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if (isset($_POST['titles'])) {
        $posts_title = $_POST['titles'];
    }
    if (isset($_POST['statuss'])) {
        $posts_status = $_POST['statuss'];
    }
    // if (isset ($_POST['comment'])) {
    //     $comment = $_POST['comment'];
    // }
    if(isset($_POST['dates'])){
        $dates = $_POST['dates'];
    }
    if(isset($_POST['updatepost'])){
        $postt = array(
            'id' => $_GET['id'],
            // 'posts_per_page' => -1,
            'post_title' => $posts_title,
            'post_content' => '[shortcode1]',
            'post_status' => $posts_status,
            'post_date' => $dates,
            'post_type' => 'post',
        );
        echo wp_update_post($postt);
        if(! is_wp_error($postt)){
            echo 'successful';
        }
        // $update = wp_update_term($_GET['id'],'category',(
        // array('post_title' => $post_title,
        //     'post_content' => '[shortcode1]',
        //     'post_status' => $post_status,
        //     'post_date' => $dates,
        //     'post_type' => 'post',)));
        
        }
    }
    
?>

<HTML>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div id="header">
    <a href="http://localhost/wp/kaihavier/"><i class='fas fa-chess-queen'></i>ABCXYZ</a>
</div>
<div id="menu">
        <ul>
            <li><a href="?dashboard=db"><i class='fas fa-chart-line'></i> DoashBoard</a></li>
            <li>
                <a href="#"><i class='far fa-file-alt'></i>Store Listing</a>
                <ul class="menudown">
                    <li><a href="#">Store listing</a></li>
                    <li><a href="#">Add Store</a></li>
                    <li><a href="#">Category</a></li>
                </ul>
            </li>
            <li><a href="#"><i class='fas fa-robot'></i> product</a>
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
            <li><a href="#"><i class='far fa-file-alt'></i> Tare Wallet</a>
                <ul class="menudown">
                    <li><a href="#">Tare Wallet</a></li>
                    <li><a href="#">Transaction</a></li>
                </ul>
            </li>
            <li><a href="#"><i class='far fa-clipboard'></i> wesome Support</a></li>
            <li><a href="#">Customize</a></li>
            <li><a href="#">Withdraw</a></li>
            <li><a href="?optionpage=setting">Setting</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
<div id = "views">
<div class="btm">
        <a href="?addnew=addpost"><i class="fas fa-plus-square"></i> Add New</a>      
</div>

 <!-- Setting  -->
<?php if(isset($_GET['dashboard'])){?>
    <div id = "dashboard">
        abc
    </div>
    <?php } ?>
<?php
    if(isset($_GET['optionpage'])){
       ?>       
       <div id="cnt">
           <div class="top">
           <p><i class='fas fa-user-cog'></i> Woocommencer Dashboard setting</p>
           </div>
           <form action="<?php echo site_url('kaihavier?optionpage=setting');?>" method="post">
           <div class="main">
               <div class="m1">
                   <ul>
                       <li><a href="#">Generals</a></li>
                       <li><a href="#">Live chart</a></li>
                   </ul>
               </div>
               <div class ="m2">
                   <div class = "container">
                       <div class ="row">
                    <p>Generals Settings</p><br>
                        </div>
                        <div class="row">
                    <label>Shop layout:</label>
                    <select name="shoplayout">
                        <option value="fullwidth" name = "fulloption">fullwidth</option>
                        <option value="box" name = "boxoption">Box</option>
                    </select>
                    </div>
                    <!-- <label>sidebar Mode:</label>
                    <select>
                        <option value="black">Black</option>
                        <option value="white">white</option>
                    </select> -->
                    </div>
               </div>
           </div>
           <button type="submit" class="sbt">Update</button>
            </form>
       </div>

       <!-- Add bài viết -->
       <?php } ?>
    <?php if(isset($_GET['addnew'])){
    ?>
    <div id="addnew">
    <div class = "row">
        <p>Add New Post</p>
    </div>
    <div class ="container">
    <form action="<?php echo site_url("kaihavier")?>" method="post" name="addneww">
    <div class = "row">
        <label>Title</label>
        <input type="text" name="title" placeholder="Enter title here">
    </div>
    <div class = "row">
        <label>status</label>
        <select name="status" method = "post">
            <option>publish</option>
            <option>draft</option>
        </select>
    </div>
    <div class = "row">
        <label>Comment</label>
        <input type="text" name="comment" placeholder="Enter Name comment">
    </div>
    <div class = 'row'>
        <input type="date" name="date">
    </div>
    <div class = "row">
    <button type="submit" name="addpost">Create Posts</button>
    </div>
    </form>
    </div>
    </div>

    <!-- edit bài viet -->
    <?php } ?>
    <?php if(isset($_GET['editpost'])){ ?>
        <div id="editpost">
            <div class = "row">
                <p>Update Post</p>
            </div>
            <div class = "container">
                <form action="<?php echo site_url('kaihavier')?>" method="post">
                <div class = "row">
                    <p>Edit title</p>
                    <input type="text" name="titles" placeholder="Enter the title">
                </div>
                <div class = "row">
                    <p>status</p>
                    <select name="statuss" method = "post">
                        <option>publish</option>
                        <option>draft</option>
                    </select>
                </div>
                <div class ="row">
                    <p>Date</p>
                    <input type="date" name="dates">
                </div>
                <button type="submit" name="updatepost">update</button>
                </form>
            </div>
        </div>
    <?php } ?>
    <?php 
    if(!isset($_GET['optionpage']) && !isset($_GET['addnew']) && !isset($_GET['dashboard']) && !isset($_GET['editpost'])){?>
    <div class="addnew">
    </div>
    <div id="h-down">
    <div class = "d-down">
        <form action="<?php echo site_url('kaihavier') ?>" method="post">
            <input type="search" name="s-title" placeholder="Search posts" value="<?php the_search_query();?>">
        </form>
        </div>
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
                    if($action=='delete'){
                     wp_delete_post($id);
                    }
                    $wp_post = new WP_Query($args);
                    if(isset($_POST['shoplayout'])){
                        update_option('optionn',$_POST['shoplayout']);
                    }
                    if(isset($_POST['s-title'])){
                    $wp_post = new WP_Query(array('s'=> $_POST['s-title']));
                    }
                    // $total_result = $wp_post->found_posts ? $wp_post -> found_posts : 0;
                    if($wp_post->have_posts()):
                    while ( $wp_post->have_posts()) : $wp_post->the_post();
                    // $wp_post = get_posts($args);
                    // foreach ($wp_post as $post): 
                    ?>
                            <tr>
                                <td><a href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_title ?></a><br>
                                <?php if (current_user_can('edit_post', $post->ID)) echo "<a href='" . wp_nonce_url("http://localhost/wp/kaihavier/?action=delete&amp;post=".$post->ID) . "'>Trash</a>" ?>
                                <?php //echo"<a href='?editpost=e?id=$post->ID'>Update</a>"?>
                            </td>
                                <td><a href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_author?></a></td>
                                <td><a href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->comment_count ?></a></td>
                                <td><a href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_date ?></a></td>
                            </tr>
                <?php   endwhile;   endif; wp_reset_postdata();?> 
            </tbody>
        </table>
    <?php }?>
</div>
<?php wp_footer();?>
</body>
</HTML>