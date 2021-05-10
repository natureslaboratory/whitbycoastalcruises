<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php perch_layout('header'); ?>

<div class="text">
	<div class="restrict">
    <?php perch_shop_cart(); ?>
	</div>
</div>

<?php perch_layout('footer'); ?>