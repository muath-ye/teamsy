<?php
/*
|--------------------------------------------------------------------------
| Application Helpers
|--------------------------------------------------------------------------
|
| This the place of your helpers.php
| Add your helpers functions here, so you can call any function in every
| where of your project.
|
*/
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

if (! function_exists('carbon')) {
    function carbon($parseString = null, $tz = null)
    {
        return new Carbon($parseString, $tz);
    }
}

if (! function_exists('disk')) {
    function diskUrl($url, $disk = 's3-public')
    {
        return Storage::disk($disk)->url($url);
    }
}

if (! function_exists('disk')) {
    function diskGet($url, $disk = 's3')
    {
        return Storage::disk($disk)->get($url);
    }
}