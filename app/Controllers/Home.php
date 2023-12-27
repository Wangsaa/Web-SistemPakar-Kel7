<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (logged_in()) {
            if (in_groups('admin')) {
                $data['title'] = 'Dashboard';
                return view('admin/dashboard', $data);
            } else if (in_groups('user')) {
                $data['title'] = 'Dashboard';
                return view('user/dashboard', $data);
            }
        } else {
            return view('welcome_message');
        }
    }
}
