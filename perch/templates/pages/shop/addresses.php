<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php perch_layout('header'); ?>

<div class="text">
	<div class="restrict">
		<h1>Addresses</h1>
		<?php
		if(!perch_member_logged_in()){
		
			echo "<p>Please <a href='/account/login'>login</a></p>";
		
		}else{
	
			echo "<h2>Your Addresses</h2>";			
			perch_shop_order_address_form();
			echo "<h2>Add a New Address</h2>";
			perch_shop_edit_address_form();

		}
     	?>
	</div>
</div>

<?php perch_layout('footer'); ?>