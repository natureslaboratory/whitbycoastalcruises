<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php perch_layout('header'); ?>
<?php perch_content('Page'); ?>
<div class="text">
    <div class="restrict">
<?php
	  st_event(perch_get('id'));
?>
	</div>
</div>
<?php perch_content('Page Lower'); ?>
<?php perch_layout('footer'); ?>