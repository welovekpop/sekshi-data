<?php

use App\User;

if (!function_exists('duration')) {
    function duration($seconds)
    {
        $hours = floor($seconds / 3600);
        $minutes = floor($seconds % 3600 / 60);
        $seconds = $seconds % 60;

        $time = sprintf('%02d:%02d', $minutes, $seconds);
        if ($hours > 0) {
            $time = $hours . ':' . $time;
        }
        return $time;
    }
}

if (!function_exists('sort_url')) {
    function sort_url($prop, $default)
    {
        static $inverse = [
            'asc' => 'desc',
            'desc' => 'asc'
        ];
        $current = Request::input('sort');
        $order = Request::input('order', $default);
        $query = Request::except('page', 'order');
        if ($current === $prop) {
            $query['order'] = $inverse[$order];
        }
        $query['sort'] = $prop;
        return '?' . http_build_query($query);
    }
}

if (!function_exists('user_url')) {
    function user_url(User $user)
    {
        if (!empty($user->slug)) {
            return url('user', $user->slug);
        }
        return url('user', $user->id);
    }
}
