<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php	
perch_shop_product(perch_get('id'), [
    'template' => 'products/shop_product_book.html'
]);
?>