<?php

namespace App\Controllers;

use App\Models\PayementModel;

class AdminController extends BaseController
{
    private $payementModel;
    public function __construct()
    {
        $this->payementModel = new PayementModel();
    }
    public function admin()
    {
        $result = $this->payementModel->getAllPayement();
        return view('admin', ["page_name" => "inProgressDemand", "payement" => $result]);
    }
}
