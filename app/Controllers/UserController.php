<?php

namespace App\Controllers;

use App\Models\UserModel;

use function PHPUnit\Framework\assertNotNull;

class UserController extends BaseController
{
    public function enrollement(): string
    {
        return view('enrollement');
    }
    public function register()
    {
        $userModel = new \App\Models\UserModel();
        $name = $this->request->getPost('name');
        $first_name = $this->request->getPost('first_name');
        $country = $this->request->getPost('country');
        $city = $this->request->getPost('city');

        $photo = $this->request->getFile('photo');
        $photosPath = 'assets/images/' . $photo->getName();
        if ($name == null) {
            echo "null";
        }
        // $data = [
        //     'aem_name'      => $name,
        //     'aem_first_name' => $first_name,
        //     'aem_country'    => $country,
        //     'aem_city'       => $city,
        //     'aem_photos' => $photosPath
        // ];


        // if ($userModel->insert($data)) {
        //     echo "Login";
        // }
    }
}
