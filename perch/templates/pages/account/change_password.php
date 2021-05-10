<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php perch_layout('header'); ?>

<div class="text">
	<div class="restrict">    
    <?php
	    if(perch_member_logged_in()){

			echo "<h1>Change Password</h1>";
			perch_member_form('password.html');

        }else{

        	echo "<p>Please <a href='/account/login'>login</a></p>";

        }
        ?>
	</div>
</div>

<?php perch_layout('footer'); ?>