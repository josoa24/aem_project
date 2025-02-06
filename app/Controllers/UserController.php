<?php

namespace App\Controllers;

use App\Models\PayementModel;
use App\Models\UserModel;

use function PHPUnit\Framework\assertNotNull;

class UserController extends BaseController
{
    private $userModel;
    private $payementModel;
    private $db;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->payementModel = new PayementModel();
        $this->db = \Config\Database::connect();
    }

    public function enrollement(): string
    {
        return view('enrollement');
    }

    public function login()
    {
        return view('login');
    }
    public function register()
    {
        $name = $this->request->getPost('name');
        $first_name = $this->request->getPost('first_name');
        $date_of_birth = $this->request->getPost('date_of_birth');
        $place_of_birth = $this->request->getPost('place_of_birth');
        $id_number = $this->request->getPost('id_number');
        $id_issue_date = $this->request->getPost('id_issue_date');
        $id_issue_place = $this->request->getPost('id_issue_place');
        $state = $this->request->getPost('state');
        $sex = $this->request->getPost('sex');
        $phoneNumber = $this->request->getPost('phone_number');
        $country = $this->request->getPost('country');
        $city = $this->request->getPost('city');
        $identity_photo = $this->request->getFile('identity_photo');
        $photo = $this->request->getFile('photo');
        $photosPath = FCPATH . "/public/assets/images/";

        $identityPhotosName =   uniqid() . $identity_photo->getName();
        $photosName =  uniqid() . $photo->getName();
        if (!$this->verifierNomPrenom($name)) {
            return view("enrollement", ["erreur" => "Veuillez verifier votre nom"]);
        }
        if (!$this->verifierNomPrenom($first_name)) {
            return view("enrollement", ["erreur" => "Veuillez verifier votre votre prénnom"]);
        }
        if (!$this->isValidCIN($id_number)) {
            return view("enrollement", ["erreur" => "Veuillez verifier votre numero CIN"]);
        }
        if (!$this->isValidPhoneNumber($phoneNumber)) {
            return view("enrollement", ["erreur" => "Veuillez verifier votre numero de téléphone"]);
        }

        $validationRules = [
            'identity_photo' => [
                'label' => 'Identity Photo',
                'rules' => 'uploaded[identity_photo]|is_image[identity_photo]|mime_in[identity_photo,image/jpg,image/jpeg,image/png,image/gif]',
            ],
            'photo' => [
                'label' => 'Photo',
                'rules' => 'uploaded[photo]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png,image/gif]',
            ],
        ];

        $data = [
            'aem_name'              => $name,
            'aem_first_name'        => $first_name,
            'aem_date_of_birth'     => $date_of_birth,
            'aem_place_of_birth'    => $place_of_birth,
            'aem_id_number'         => $id_number,
            'aem_id_issue_date'     => $id_issue_date,
            'aem_id_issue_place'    => $id_issue_place,
            'aem_country'           => $country,
            'aem_state'             => $state,
            'aem_city'              => $city,
            'aem_identity_photo'    => "assets/images/" . $identityPhotosName,
            'aem_payment_screenshot'            => "assets/images/" . $photosName,
            'aem_sex' => $sex,
            'aem_phone_number' => $phoneNumber,
            'aem_user_password' => $this->generatePassword(6)
        ];


        $this->userModel->insert($data);
        $lastID = $this->userModel->insertID();
        $this->payementModel->insertPayement(['aem_id_user' => $lastID]);
        $this->db->transComplete();
        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
        } else {
            if (!$this->validate($validationRules)) {
                $errors = $this->validator->getErrors();
                return redirect()->back()->withInput()->with('errors', $errors);
            }
            if ($identity_photo->isValid() && !$identity_photo->hasMoved()) {
                $identity_photo->move($photosPath, $identityPhotosName);
            }

            if ($photo->isValid() && !$photo->hasMoved()) {
                $photo->move($photosPath, $photosName);
            }
            $this->db->transCommit();
            return view("enrollement", ["succes" => "Votre inscription a été envoyée avec succès. Vous serez informé lorsque votre inscription sera validée."]);
        }
    }

    function isValidCIN($cin)
    {
        $cinPatterns = [
            "/^\d{6,18}$/",
            "/^[A-Z]{2}\d{6,12}$/",
            "/^[A-Z]{3}\d{6,8}[A-Z]?$/",
            "/^\d{11}$/",
            "/^\d{12}$/",
            "/^\d{9}$/",
            "/^[0-9XYZ]\d{7}[A-Z]$/",
        ];

        foreach ($cinPatterns as $pattern) {
            if (preg_match($pattern, $cin)) {
                return true;
            }
        }

        return false;
    }

    public  function verifierNomPrenom(string $nom): bool
    {
        if (strlen($nom) < 2 || strlen($nom) > 50) {
            return false;
        }

        if (!preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ -]+$/u', $nom)) {
            return false;
        }
        if (preg_match('/^[- ]|[- ]$/', $nom)) {
            return false;
        }
        return true;
    }


    function isValidPhoneNumber($phoneNumber)
    {
        $pattern = "/^(\+|\d{0})\d{1,4}[ -]?\(?\d{1,4}?\)?[ -]?\d{1,4}[ -]?\d{1,4}$/";

        if (preg_match($pattern, $phoneNumber)) {
            $cleanNumber = preg_replace('/\D/', '', $phoneNumber);

            if (strlen($cleanNumber) == 9 && (substr($cleanNumber, 0, 3) == "033" || substr($cleanNumber, 0, 4) == "2613")) {
                return true;
            }

            if (strlen($cleanNumber) >= 8 && strlen($cleanNumber) <= 15) {
                return true;
            }
        }

        return false;
    }

    function isValidCity($city)
    {
        return preg_match("/^[a-zA-Z\s]+$/", $city);
    }

    function generatePassword($length = 6)
    {
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $specialChars = '!@#$%^&*()-_=+[{]}\\|;:\'",<.>/?';

        $allChars = $uppercase . $lowercase . $numbers . $specialChars;

        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $allChars[rand(0, strlen($allChars) - 1)];
        }

        return $password;
    }
}
