<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function enrollement(): string
    {
        return view('enrollement');
    }
}
