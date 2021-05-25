<?php session_start(); ?>
<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php st_complete($_SESSION); ?>
<?php perch_layout('header'); ?>
    
<div class="text">
	<div class="restrict">
    <?php
	    echo '<h1>Order Complete</h1>
			  <p>Your order is complete - thanks! We\'ve emailed a copy of your order details to you.</p>';
    ?>
	</div>
</div>

<?php perch_layout('footer'); ?>