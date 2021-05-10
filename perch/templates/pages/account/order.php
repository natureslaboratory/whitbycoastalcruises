<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php perch_layout('header'); ?>

<div class="text">
	<div class="restrict">    
    <?php
	    if(perch_member_logged_in()){

	        echo '<h2>Your Order</h2>';
	        perch_shop_order(perch_get('id'));
	        echo '<div class="address-wrap">';
	        echo '<div><h2>Shipping Address</h2>';
	        $order = perch_shop_order(perch_get('id'),['skip-template'=>true]);
	        perch_shop_customer_address($order[0]['orderShippingAddress']);
	        echo '</div><div><h2 class="billing">Billing Address</h2>';
	        perch_shop_customer_address($order[0]['orderBillingAddress']);
	        echo '</div></div>';
	
	      }else{
	
	        echo "<p>Please <a href='/account/login'>login</a></p>";
	
	      }
        ?>
	</div>
</div>

<?php perch_layout('footer'); ?>