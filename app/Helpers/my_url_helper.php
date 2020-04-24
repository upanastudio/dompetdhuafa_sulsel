<?php

namespace App\Helpers;

if (!function_exists('login_url')) {
    function login_url($url = NULL)
    {
        $link = ($url) ? '/' . $url : '';
        return site_url('auth/login') . $link;
    }
}

if (!function_exists('logout_url')) {
    function logout_url($url = NULL)
    {
        $link = ($url) ? '/' . $url : '';
        return site_url('auth/logout') . $link;
    }
}

if (!function_exists('admin_url')) {
    function admin_url($url = NULL)
    {
        $link = ($url) ? '/' . $url : '';
        return site_url('admin') . $link;
    }
}

if (!function_exists('homepage_url')) {
    function homepage_url($url = NULL)
    {
        $link = ($url) ? '/' . $url : '';
        return site_url('donatur') . $link;
    }
}

if (!function_exists('upload_path')) {
    function upload_path($path = NULL)
    {
        $link = ($path) ? $path . '/' : '';
        return 'writable/uploads/receipt/' . $link;
    }
}

if (!function_exists('upload_url')) {
    function upload_url($url = NULL)
    {
        $link = ($url) ? $url . '/' : '';
        return site_url(upload_path()) . $link;
    }
}

if (!function_exists('assets')) {
    function assets($url = NULL)
    {
        $link = ($url) ? '/' . $url : '/';
        return site_url('template/assets') . $link;
    }
}
