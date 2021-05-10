<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php
if($_POST['state']=='captured'){
   perch_shop_checkout('manual');
   perch_shop_empty_cart();
} else {
   header("Location: /fail/");
   exit;
}
?>
<?php perch_layout('header'); ?>
    
<div class="text">
	<div class="restrict">
    <?php
	    if (perch_shop_order_successful()) {
		    echo '<h1>Order Complete</h1>
				  <p>Your order is complete - thanks! You can view your order details below, a copy has also been emailed to you.</p>';
			if (perch_member_is_passwordless()) {
				echo '<h2>Set a Password</h2>';
				echo '<p>Make it easier and quicker to checkout next time.</p>';
				perch_member_form('set_password');
			}
			perch_shop_order_items(
				perch_shop_successful_order_id()
			);
		}else{
			echo '<h1>Sorry - there was a problem with your order.</h1>';
		}  
    ?>
	</div>
</div>

<?php perch_layout('footer'); ?>