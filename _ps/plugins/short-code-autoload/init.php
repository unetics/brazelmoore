<?php
$ptd = get_template_directory()."/inc/short-codes/*.php";
foreach (glob($ptd) as $filename) {
    include $filename;
}