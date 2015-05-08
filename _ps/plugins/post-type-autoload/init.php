<?php
$ptd = get_template_directory()."/inc/post-types/*.php";
foreach (glob($ptd) as $filename) {
    include $filename;
}