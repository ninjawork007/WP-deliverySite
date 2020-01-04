<?php
	
function resocore_price_symbol($price){
	$currency_symbol = cs_get_option('dishes_menu_currency');
	$currency_option = cs_get_option('dishes_menu_currency_position');	
	switch ( $currency_option ) {
		case 'left':
			$price_symbol = '<span class="currency">' . $currency_symbol . '</span>' . $price;
			break;
		case 'right':
			$price_symbol = $price . '<span class="currency">' . $currency_symbol . '</span>';
			break;
		case 'left_space':
			$price_symbol = '<span class="currency">' . $currency_symbol . '</span> ' . $price;
			break;
		case 'right_space':
			$price_symbol = $price . ' <span class="currency">' . $currency_symbol . '</span>';
			break;
		default: $price_symbol = $price;
	}
	echo $price_symbol;	
}

function restocore_dishes_price() {
	$post_meta = get_post_meta( get_the_ID(), 'dishes_menu_data', true );
	if(empty($post_meta['price_selector']) || $post_meta['price_selector'] == 'single' && $post_meta['price']) {
		resocore_price_symbol($post_meta['price']);
	} else {
		if( $muliple_prices = $post_meta['multiple_prices'] ) {
			$prices = array_column( $muliple_prices, 'price' );
			$min_price = $prices[0];		
			$max_price = array_pop($prices);
			if($min_price != $max_price) {
				resocore_price_symbol( $min_price );
				echo '/';
				resocore_price_symbol( $max_price );				
			} else {
				resocore_price_symbol( $min_price );
			}
		}
	}	
}

function restocore_product_price(){
	$post_meta = get_post_meta( get_the_ID(), 'dishes_menu_data', true );
	if(isset($post_meta['price_selector']) && $post_meta['price_selector'] == 'multiple') {
		$multiple_prices = $post_meta['multiple_prices'];
		?>
		<ul class="multiple-prices">
			<?php foreach( $multiple_prices as $price ): ?>
				<li>
					<span class="label"><?php echo esc_html($price['label']) ?></span>
					-
					<span class="price color-pr-tx"><?php resocore_price_symbol($price['price']); ?></span>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php
	}
}
if (! function_exists('restocore_link_to_product')) {
function restocore_link_to_product(){
	$post_meta = get_post_meta( get_the_ID(), '_dishes_menu_wc', true );
	if(!empty($post_meta['order_button'])) { ?>
		<a href="<?php the_permalink( $post_meta['link_to_product']); ?>" class="link-to-shop btn btn-transparent btn-mn"><?php esc_html_e('Order', 'cristiano'); ?></a>	
	<?php }				
	}
}
if (! function_exists('restocore_highlight_text')) {
	function restocore_highlight_text() {
		$post_meta = get_post_meta( get_the_ID(), 'dishes_menu_data', true );
		if(!empty($post_meta['highlight'])) { ?>
			<span class="highlight-text color-pr-bg"><?php echo $post_meta['highlight']; ?></span>
		<?php }
	}
}

// restocore_top_menu - depricated from version 2.9.3
function restocore_top_menu() {
	$post_meta = get_post_meta( get_the_ID(), 'dishes_menu_data', true );
	if(!empty($post_meta['top_menu'])) {
		return $post_meta['top_menu'];
	}
}

function restocore_get_menu_cat_img($term) {
	$term = get_term_by( 'id', $term, 'dishes_categories' );	
	$term_data = get_term_meta( $term->term_id, '_restocore_our_menu_taxonomy_options', true );
	if( !empty($term_data) ) {
		$img_id = $term_data['restocore_menu_cat_img'];
		$img = wp_get_attachment_image_src($img_id, 'custom-header' );	
		return $img[0];			
	}
}

function restocore_dishes_img_size($term){
	$term = get_term_by( 'id', $term, 'dishes_categories' );		
	$term_data = get_term_meta( $term->term_id, '_restocore_our_menu_taxonomy_options', true );
	if(isset($term_data['restocore_menu_img_size'])) {
		echo $term_data['restocore_menu_img_size'] . ' ';
	}
	if(isset($term_data['restocore_menu_img_style'])) {
		echo $term_data['restocore_menu_img_style'] . ' ';
	}
	if(isset($term_data['restocore_menu_cols'])) {
		echo $term_data['restocore_menu_cols'];
	} else {
		echo 'cols-2';
	}
}

// Array Column Aternatiove for php 5.2 - 5.5
if (! function_exists('array_column')) {
    function array_column(array $input, $columnKey, $indexKey = null) {
        $array = array();
        foreach ($input as $value) {
            if ( ! isset($value[$columnKey])) {
                trigger_error("Key \"$columnKey\" does not exist in array");
                return false;
            }
            if (is_null($indexKey)) {
                $array[] = $value[$columnKey];
            }
            else {
                if ( ! isset($value[$indexKey])) {
                    trigger_error("Key \"$indexKey\" does not exist in array");
                    return false;
                }
                if ( ! is_scalar($value[$indexKey])) {
                    trigger_error("Key \"$indexKey\" does not contain scalar value");
                    return false;
                }
                $array[$value[$indexKey]] = $value[$columnKey];
            }
        }
        return $array;
    }
}