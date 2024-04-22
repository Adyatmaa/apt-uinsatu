<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('admin_header');
        echo view('admin_nav');
        echo view('welcome_message');
        echo view('admin_footer');
    }
}
