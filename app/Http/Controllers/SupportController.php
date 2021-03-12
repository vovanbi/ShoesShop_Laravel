<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends FrontendController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function support()
    {
        return view('info.support');
    }
}
