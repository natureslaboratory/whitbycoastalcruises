<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>
<?php perch_layout('header'); ?>
<?php perch_content('Page'); ?>
<div class="book">
    <div class="restrict"><?php st_events(); ?></div>
</div>
<?php perch_content('Page Lower'); ?>
<?php perch_layout('footer'); ?>