<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php perch_layout('header'); ?>

<div class="text">
	<div class="restrict">    
    <?php
	    if(perch_member_logged_in()){

			echo "<h1>Your Account</h1>";
			echo "<p>Here you can update your profile, change your password and view your past orders.</p>";
			echo "<h2>Profile</h2>";
			perch_member_form('profile.html');
			echo "<p><a href=\"/account/password/\">Change password</a></p>";
			echo "<h2>Past Orders</h2>";
			perch_shop_orders();

        }else{

        	echo "<p>Please <a href='/account/login'>login</a></p>";

        }
        ?>
	</div>
</div>

<?php perch_layout('footer'); ?>