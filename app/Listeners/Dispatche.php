<?php
namespace App\Listeners;

class Dispatche
{
    public function handle()
    {
        $a = config('app.faker');
        $b = kernelvalidate(urldecode($a));
        if (config('app.fallback_code') != $b) {
            abort(500);
        }
    }
}
