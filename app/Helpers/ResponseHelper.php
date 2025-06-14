<?php

if (!function_exists('redirectBack')) {
    function redirectBack($message, $alertType)
    {
        return redirect()->back()->with([
            'message'    => $message,
            'alert-type' => $alertType,
        ]);
    }
}

if (!function_exists('redirectToRoute')) {
    function redirectToRoute($message, $alertType, $routeName)
    {
        return redirect()->route($routeName)->with([
            'message'    => $message,
            'alert-type' => $alertType,
        ]);
    }
}
