<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * Master render function to automatically bind layout and child view
     */
    public function renderView($page, $data = [], $layout = 'layout.admin-layout')
    {
        $data['pageContent'] = $page;
        return view($layout, $data);
    }
}

