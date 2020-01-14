<?php 
/*
**
*** Register meta boxes.
**
*/

    function hcf_register_meta_boxes() {
        add_meta_box( 'hcf-1', __( 'Search Fields', 'hcf' ), 'hcf_display_callback', 'Properties' );
    }
    add_action( 'add_meta_boxes', 'hcf_register_meta_boxes' );

/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function hcf_display_callback( $post ) {
    global $post;
    $values = get_post_custom( $post->ID );

    $selected_price = isset( $values['price_field'] ) ? esc_attr( $values['price_field'][0] ) : ”;
    $storey = isset( $values['storey'] ) ? esc_attr( $values['storey'][0] ) : ”;

    $bedroom = isset( $values['bedroom'] ) ? esc_attr( $values['bedroom'][0] ) : ”;
    $bathroom = isset( $values['bathroom'] ) ? esc_attr( $values['bathroom'][0] ) : ”;
    $lotsize = isset( $values['lotsize'] ) ? esc_attr( $values['lotsize'][0] ) : ”;
    
?>
<style scoped>
        .hcf_box{
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .hcf_field{
            display: inline-block;
        }
        .hcf_field_actual{
            display: contents;
        }
    </style>

    <div class="hcf_box">
    
   
    <p class="meta-options hcf_field">
        <label for="price">Price </label>
       
        <select id="price_field" name="price_field"> 
            <option value="500000" <?php selected( $selected_price, '500000' ); ?>>₹ 5,00000</option>
            <option value="1000000" <?php selected( $selected_price, '1000000' ); ?>>₹ 10,00000</option>
            <option value="1500000" <?php selected( $selected_price, '1500000' ); ?>>₹ 15,00000</option>
            <option value="2000000" <?php selected( $selected_price, '2000000' ); ?>>₹ 20,00000</option>
            <option value="2500000" <?php selected( $selected_price, '2500000' ); ?>>₹ 25,00000</option>
            <option value="3000000" <?php selected( $selected_price, '3000000' ); ?>>₹ 30,00000</option>
            <option value="3500000" <?php selected( $selected_price, '3500000' ); ?>>₹ 35,00000</option>
            <option value="4000000" <?php selected( $selected_price, '4000000' ); ?>>₹ 40,00000</option>
            <option value="4500000" <?php selected( $selected_price, '4500000' ); ?>>₹ 45,00000</option>
            <option value="5000000" <?php selected( $selected_price, '5000000' ); ?>>₹ 50,00000</option>
            <option value="5500000" <?php selected( $selected_price, '5500000' ); ?>>₹ 55,00000</option>
            <option value="6000000" <?php selected( $selected_price, '6000000' ); ?>>₹ 60,00000</option>
            <option value="6500000" <?php selected( $selected_price, '6500000' ); ?>>₹ 65,00000</option>
            <option value="7000000" <?php selected( $selected_price, '7000000' ); ?>>₹ 70,00000</option>
            <option value="7500000" <?php selected( $selected_price, '7500000' ); ?>>₹ 75,00000</option>
            <option value="8000000" <?php selected( $selected_price, '8000000' ); ?>>₹ 80,00000</option>
            <option value="8500000" <?php selected( $selected_price, '8500000' ); ?>>₹ 85,00000</option>
            <option value="9000000" <?php selected( $selected_price, '9000000' ); ?>>₹ 90,00000</option>
            <option value="9500000" <?php selected( $selected_price, '9500000' ); ?>>₹ 95,00000</option>
            <option value="10000000" <?php selected( $selected_price, '10000000' ); ?>>₹ 1,00,00000</option>
            <option value="12000000" <?php selected( $selected_price, '12000000' ); ?>>₹ 1,20,00000</option>
            <option value="13000000" <?php selected( $selected_price, '13000000' ); ?>>₹ 1,30,00000</option>
            <option value="14000000" <?php selected( $selected_price, '14000000' ); ?>>₹ 1,40,00000</option>
            <option value="15000000" <?php selected( $selected_price, '15000000' ); ?>>₹ 1,50,00000</option>
            <option value="16000000" <?php selected( $selected_price, '16000000' ); ?>>₹ 1,60,00000</option>
            <option value="17000000" <?php selected( $selected_price, '17000000' ); ?>>₹ 1,70,00000</option>
            <option value="18000000" <?php selected( $selected_price, '18000000' ); ?>>₹ 1,80,00000</option>
            <option value="19000000" <?php selected( $selected_price, '19000000' ); ?>>₹ 1,90,00000</option>
            <option value="20000000" <?php selected( $selected_price, '20000000' ); ?>>₹ 2,00,00000</option>
        </select>
        
    </p>
    <p class="meta-options hcf_field">
        <label for="storey">Storeys </label>
        <input id="storey" type="radio" name="storey" value="1" <?php checked( $storey, '1' ); ?>>1
        <input id="storey" type="radio" name="storey" value="2" <?php checked( $storey, '2' ); ?>>2
    </p>
    <p class="meta-options hcf_field">
        <label for="bedrooms">Bedrooms </label>
        <input id="bedroom" type="radio" name="bedroom" value="2" <?php checked( $bedroom, '2' ); ?>>2
        <input id="bedroom" type="radio" name="bedroom" value="3" <?php checked( $bedroom, '3' ); ?>>3
        <input id="bedroom" type="radio" name="bedroom" value="4" <?php checked( $bedroom, '4' ); ?>>4
        <input id="bedroom" type="radio" name="bedroom" value="5" <?php checked( $bedroom, '5' ); ?>>5
    </p>
    <p class="meta-options hcf_field">
        <label for="bathroom">Bathroom </label>
        <input id="bathroom" type="radio" name="bathroom" value="1" <?php checked( $bathroom, '1' ); ?>>1
        <input id="bathroom" type="radio" name="bathroom" value="2" <?php checked( $bathroom, '2' ); ?>>2
        <input id="bathroom" type="radio" name="bathroom" value="3" <?php checked( $bathroom, '3' ); ?>>3
    </p>
    <p class="meta-options hcf_field">
        <label for="lot-size">Lot Width </label>
        <select id="lotsize" name="lotsize">
            <option value="7.5m to 8m" <?php selected( $lotsize, '7.5m to 8m' ); ?>>7.5m to 8m</option>
            <option value="8.5m to 9m" <?php selected( $lotsize, '8.5m to 9m' ); ?>>8.5m to 9m</option>
            <option value="9.5m to 10m" <?php selected( $lotsize, '9.5m to 10m' ); ?>>9.5m to 10m</option>
            <option value="10.5m to 11m" <?php selected( $lotsize, '10.5m to 11m' ); ?>>10.5m to 11m</option>
            <option value="11.5m to 12m" <?php selected( $lotsize, '11.5m to 12m' ); ?>>11.5m to 12m</option>
            <option value="12.5m to 13m" <?php selected( $lotsize, '12.5m to 13m' ); ?>>12.5m to 13m</option>
            <option value="13.5m to 14m" <?php selected( $lotsize, '13.5m to 14m' ); ?>>13.5m to 14m</option>
            <option value="14.5m to 15m" <?php selected( $lotsize, '14.5m to 15m' ); ?>>14.5m to 15m</option>
            <option value="15.5m to 16m" <?php selected( $lotsize, '15.5m to 16m' ); ?>>15.5m to 16m</option>
            <option value="16m+" <?php selected( $lotsize, '16m+' ); ?>>16m+</option>
        </select>
        
    </p>
    <p class="meta-options hcf_field">
        <label for="date">Date </label>
        <input id="date" type="date" name="date" value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'date', true ) ); ?>">
    </p>
</div>
<?php } ?>