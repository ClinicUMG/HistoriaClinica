<?php

if (!function_exists('active_class')) {
    function active_class($url)
    {
        $current_url = url()->current();
        if ($url == $current_url) {
            return 'active';
        }
    }
}

if(!function_exists('user'))
    {
        function user()
        {
            return auth()->user();
        }
    }