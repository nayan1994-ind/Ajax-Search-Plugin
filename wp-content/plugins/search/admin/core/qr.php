<?php
/*
**
*** Query Section
**
*/
function pro_search_scripts_callback(){
    header('Content-type: application/json;');
    
   $minprice = 0;
    if(isset($_GET['min_price']))
    	$minprice = sanitize_text_field($_GET['min_price']);   
    	
    $maxprice = 0;
    if(isset($_GET['maxprice']))
    	$maxprice = sanitize_text_field($_GET['maxprice']);   

    $storeys = 0;
    if(isset($_GET['storey']))
    	$storey = sanitize_text_field($_GET['storey']);
    	
    $bedrooms = 0;
    if(isset($_GET['bedroom']))
    	$bedrooms = sanitize_text_field($_GET['bedroom']);
    	
    $bathrooms = 0;
    if(isset($_GET['bathroom']))
    	$bathrooms = sanitize_text_field($_GET['bathroom']);
    	
    $lotsize = 0;
    if(isset($_GET['lotsize']))
    	$lotsize = sanitize_text_field($_GET['lotsize']);	
    
     
     
    $result = array();
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
    'post_type' => 'properties',
    'paged' => $paged
 );
$args['meta_query'][]=array(
    'relation' => 'OR',
    array(
        'key' => 'price_field',
        'value' =>$minprice,
        'compare' => ">="
    ),
    array(
        'key' => 'price_field',
        'value' =>$maxprice,
        'compare' => "<="
    ),
   
    array(
        'key' => 'storey',
        'value' =>$storey,
        'compare' => "IN"
    ),
    array(
            'key' => 'bedroom',
            'value' => $bedrooms,
            'compare' => "="
    ),
    array(
            'key' => 'bathroom',
            'value' =>$bathrooms,
            'compare' => "="
    ),
    array(
            'key' => 'lotsize',
            'value' =>$lotsize,
            'compare' => "="
    ),
); 

$the_querys = new WP_Query( $args );
    //print_r($the_querys->request);
    $posts_r = $the_querys->posts;
    foreach($posts_r as $post){
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hh-gallery-2' );
        //$price = get_post_meta( $post->ID, 'actual_price') ;
        $storey = get_post_meta( $post->ID, 'storey') ;
        $beds_rooms_details = get_post_meta( $post->ID, 'bedroom') ;
        $bathrooms_details = get_post_meta( $post->ID, 'bathroom') ;
        $price = get_post_meta( $post->ID, 'price_field') ;
        $date = get_post_meta( $post->ID, 'date') ;
        array_push($result,array(
    	        "id" => $post->ID,
    			"title" => $post->post_title,
    			"permalink" => get_permalink($post),
    			"image_url" => $image[0],
    			"bedroom" => $beds_rooms_details ,
    			"bathroom" => $bathrooms_details,
    			"storey" => $storey,
    			"price" =>$price,
    			"date" => $date
    	));
    }
    
	if(count($result)>0){
        echo json_encode($result);
	}else{
	    echo 0;
	}
    wp_die();
}