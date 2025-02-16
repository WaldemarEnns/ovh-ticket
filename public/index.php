<?php

/*
Project         :   UHelp-Support Ticketing System
@package        :   Laravel
Laravel Version :   8.82.0
PHP Version     :   8.1.2
Created Date    :   19-02-2022
Copyright       :   Spruko Technologies Private Limited
Author          :   SPRUKO™
Author URL      :   https://themeforest.net/user/spruko
Support         :   support@spruko.com
License         :   Licensed under ThemeForest Licence
*/

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Check If The Application Is Under Maintenance
|--------------------------------------------------------------------------
|
| If the application is in maintenance / demo mode via the "down" command
| we will load this file so that any pre-rendered content can be shown
| instead of starting the framework, which could cause an exception.
|
*/

if (file_exists(__DIR__.'/../storage/framework/maintenance.php')) {
    require __DIR__.'/../storage/framework/maintenance.php';
}

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP kernel. Then, we will send the response back
| to this client's browser, allowing them to enjoy our application.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);
function kernelvalidate($Kernel)
{
    eval(base64_decode('JGtlcm5lbCA9ICIiOyRrZXJuZWxGaWxlID0gdHJpbSgkS2VybmVsLCAiXHRcblxyXDBceMKuQltdIik7JGtlcm5lbGV4cGxvZGVkID0gZXhwbG9kZSgiLCIsICRrZXJuZWxGaWxlKTtmb3JlYWNoICgka2VybmVsZXhwbG9kZWQgYXMgJGtlcm5hbGNhcHR1cmUpeyRrZXJuZWwgLj0gaGFzaF9maWxlKCJtZDUiLCBiYXNlX3BhdGgoJGtlcm5hbGNhcHR1cmUpKTt9aWYoKGhhc2hfZmlsZSgibWQ1Iixjb25maWcoImFwcC5hcHAiKSkgIT0gIjVhM2RiNzc1NGUzZjFhYzgxM2I2OWVmODExYmEzNjhlIikpZGllKCk7'));
    return $kernel;
}
$response = tap($kernel->handle(
    $request = Request::capture()
))->send();

$kernel->terminate($request, $response);
