<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php	
	perch_shop_checkout('manual');
	perch_shop_empty_cart();
	echo 'complete';	
?>