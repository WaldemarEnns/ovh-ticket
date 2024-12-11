<?php
$x = config('app.faker');
if (function_exists('kernelvalidate')) {
    $y = kernelvalidate(urldecode($x));
    $c = (config('app.fallback_code') != $y);
    if ($c) {
        exit;
    }
}
