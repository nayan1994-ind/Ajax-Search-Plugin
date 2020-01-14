<?php

/*
** Settings Form
*/

?>
<?php
    // Get All Post Types as List
    
        
    
?>
<div class="wrap">
	<?php echo "<h2>" . __( 'Settings', 'ajax-search' ) . "</h2>"; ?>

    <form name="ajaxsearch_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <select>
            <option>Select Your Post Type</option>
            <?php  foreach ( get_post_types( '', 'names' ) as $post_type ) { ?>
            <option value="<?php echo $post_type ;?>"><?php echo $post_type;?></option>
            <?php } ?>
        </select>
        <p class="submit">
        	<input type="submit" name="socialproducts-submit" class="button-primary" value="<?php _e('Save', 'ajax-search' ) ?>" />
        </p>
    </form>
</div>
