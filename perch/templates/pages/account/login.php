<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php
	if(perch_member_logged_in()){
		header("location:/account");
	}	
?>
<?php perch_layout('header'); ?>

<div class="text">
	<div class="restrict">
	<h1>Login</h1>
    <?php perch_members_login_form(); ?>
	</div>
</div>

<?php perch_layout('footer'); ?>