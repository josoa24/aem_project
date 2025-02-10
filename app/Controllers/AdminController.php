<?php

namespace App\Controllers;

use App\Models\PayementModel;
use App\Models\AdminModel;

class AdminController extends BaseController
{
    private $payementModel;
    private $adminModel;
    public function __construct()
    {
        $this->payementModel = new PayementModel();
        $this->adminModel = new AdminModel();
    }

    public function admin()
    {
        return view('loginAdmin');
    }

    public function dashboard()
    {
        $result = $this->payementModel->getAllPayement();
        return view('admin', ['page_name' => 'inProgressDemand', 'payement' => $result]);
    }
    public function loginAdmin()
    {
        $numero = $this->request->getPost('number');
        $password = $this->request->getPost('motDePasse');
        $error = [];
        $valid = true;
        if (count($this->adminModel->exist('aem_admin_phone_number', $numero)) == 0) {
            $error['number']['message'] = "Vérifiez votre numéro";
            $valid = false;
        }
        $error['number']['value'] = $numero;
        if (count($this->adminModel->exist('aem_admin_password', $password)) == 0) {
            $error['motDePasse']['message'] = "Vérifiez votre mot de passe";
            $valid = false;
        }
        $error['motDePasse']['value'] = $password;
        if (($admin = $this->adminModel->validLogin($numero, $password)) == null) {
            $valid = false;
        }
        if (!$valid) {
            return redirect()->to("admin")->with("error", $error);
        }
        session()->set('user', $admin);
        return $this->dashboard();
    }

    public function validDemand()
    {
        $id_payment = $this->request->getGet('id_aem_validation');
        $this->payementModel->comfirmPayment($id_payment);
        return $this->dashboard();
    }
}
