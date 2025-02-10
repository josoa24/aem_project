<?php

namespace App\Controllers;

use App\Models\PayementModel;
use App\Models\UserModel;
use App\Models\CountryModel;

use DateTime;

class UserController extends BaseController
{
    private $userModel;
    private $payementModel;
    private $db;
    private $countryModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->payementModel = new PayementModel();
        $this->countryModel = new CountryModel();
        $this->db = \Config\Database::connect();
    }

    public function enrollement()
    {
        $country = $this->countryModel->getAllCountries();
        $place_of_birth = $this->userModel->getPlace('aem_place_of_birth');
        $issue_place = $this->userModel->getPlace('aem_id_issue_place');
        $state = $this->userModel->getPlace('aem_state');
        $city = $this->userModel->getPlace('aem_city');

        return view('enrollement', [
            'country' => $country,
            'place_of_birth' => $place_of_birth,
            'issue_place' => $issue_place,
            'state' => $state,
            'city' => $city
        ]);
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
        $photosPath = FCPATH . "assets/images/";
        $identityPhotosName = uniqid() . $identity_photo->getName();
        $photosName = uniqid() . $photo->getName();
        $valid = true;
        $error = array();

        if (!$this->verifyName($name)) {
            $valid = false;
            $error['name']['message'] = "Le nom doit comporter entre 2 et 50 caractères et ne doit contenir que des lettres, des espaces ou des tirets.";
        }
        $error['name']['value'] = $name;
        if (!$this->verifyName($first_name)) {
            $valid = false;
            $error['first_name']['message'] = "Le prénom doit comporter entre 2 et 50 caractères et ne doit contenir que des lettres, des espaces ou des tirets.";
        }
        $error['first_name']['value'] = $first_name;
        if (!$this->isValidDate($date_of_birth)) {
            $valid = false;
            $error['date_of_birth']['message'] = "La date de naissance doit être au format AAAA-MM-JJ.";
        }
        $error['date_of_birth']['value'] = $date_of_birth;
        if (!$this->isValidCIN($id_number)) {
            $valid = false;
            $error['id_number']['message'] = "Le numéro CIN doit correspondre à l'un des formats valides.";
        }
        $error['id_number']['value'] = $id_number;
        if (!$this->isValidPhoneNumber($phoneNumber)) {
            $valid = false;
            $error['phone_number']['message'] = "Le numéro de téléphone doit être valide et contenir entre 8 et 15 chiffres.";
        }
        $error['phone_number']['value'] = $phoneNumber;
        if (!$this->isValidDate($id_issue_date)) {
            $valid = false;
            $error['id_issue_date']['message'] = "La date doit être au format AAAA-MM-JJ.";
        }
        $error['id_issue_date']['value'] = $id_issue_date;
        if (!$this->isValidCity($place_of_birth)) {
            $valid = false;
            $error['place_of_birth']['message'] = "Le lieu de naissance ne doit contenir que des lettres et des espaces.";
        }
        $error['place_of_birth']['value'] = $place_of_birth;
        if (!$this->isValidCity($id_issue_place)) {
            $valid = false;
            $error['id_issue_place']['message'] = "Le lieu d'émission ne doit contenir que des lettres et des espaces.";
        }
        $error['id_issue_place']['value'] = $id_issue_place;
        if (!$this->isValidCity($state)) {
            $valid = false;
            $error['state']['message'] = "L'état ne doit contenir que des lettres et des espaces.";
        }
        $error['state']['value'] = $state;
        if (!$this->isValidCity($country)) {
            $valid = false;
            $error['country']['message'] = "Le pays ne doit contenir que des lettres et des espaces.";
        } else if (($countryId = $this->countryModel->getCountryIdByName($country)) == null) {
            $valid = false;
            $error['country']['message'] = "Le pays spécifié n'existe pas.";
        }
        $error['country']['value'] = $country;
        if (!$this->isValidSex($sex, ['M', 'F'])) {
            $valid = false;
            $error['sex']['message'] = "Le sexe doit être 'M' pour masculin ou 'F' pour féminin.";
        }

        $error['sex']['value'] = $sex;
        if (!$this->isValidCity($city)) {
            $valid = false;
            $error['city']['message'] = "La ville ne doit contenir que des lettres et des espaces.";
        }
        $error['city']['value'] = $city;
        if (count($this->userModel->exist("aem_id_number", $id_number)) > 0) {
            $valid = false;
            $error['id_number']['message'] = "Le numéro CIN existe déjà.";
        }
        $error['id_number']['value'] = $id_number;

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($identity_photo->getExtension(), $allowedExtensions)) {
            $valid = false;
            $error['identity_photo']['message'] = "Le fichier d'identité doit être une image (jpg, jpeg, png, gif).";
        }
        if (!in_array($photo->getExtension(), $allowedExtensions)) {
            $valid = false;
            $error['photo']['message'] = "La photo doit être une image (jpg, jpeg, png, gif).";
        }
        if (!$valid) {
            return redirect()->to("/")->with("error", $error);
        } else {
        }


        $data = [
            'aem_name'              => $name,
            'aem_first_name'        => $first_name,
            'aem_date_of_birth'     => $date_of_birth,
            'aem_place_of_birth'    => $place_of_birth,
            'aem_id_number'         => $id_number,
            'aem_id_issue_date'     => $id_issue_date,
            'aem_id_issue_place'    => $id_issue_place,
            'aem_country'           => $countryId,
            'aem_state'             => $state,
            'aem_city'              => $city,
            'aem_identity_photo'    => "assets/images/" . $identityPhotosName,
            'aem_payment_screenshot' => "assets/images/" . $photosName,
            'aem_sex'               => $sex,
            'aem_phone_number'      => $phoneNumber,
            'aem_user_password'     => $this->generatePassword(6)
        ];

        $this->userModel->insert($data);
        $lastID = $this->userModel->insertID();
        $this->payementModel->insertPayement(['aem_id_user' => $lastID]);
        $this->db->transComplete();
        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
        } else {
            if ($identity_photo->isValid() && !$identity_photo->hasMoved()) {
                $identity_photo->move($photosPath, $identityPhotosName);
            }
            if ($photo->isValid() && !$photo->hasMoved()) {
                $photo->move($photosPath, $photosName);
            }
            $this->db->transCommit();
            return redirect()->to("/")->with("succes", "Votre inscription a été envoyée avec succès. Vous serez informé lorsque votre inscription sera validée.");
        }
    }



    function isValidSex($sexe, $options = ['M', 'F']): bool
    {
        return in_array(strtoupper($sexe), $options, true);
    }

    function isValidDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
    private function isValidCIN($cin)
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

    public  function verifyName(string $nom): bool
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


    private    function isValidPhoneNumber($phoneNumber)
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

    private  function isValidCity($city)
    {
        return preg_match("/^[a-zA-Z\s]+$/", $city);
    }

    private function generatePassword($length = 6)
    {
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $allChars = $uppercase . $lowercase . $numbers;

        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $allChars[rand(0, strlen($allChars) - 1)];
        }

        return $password;
    }

    public function loginUser()
    {
        $numero = $this->request->getPost('number');
        $password = $this->request->getPost('motDePasse');
        $error = [];
        $valid = true;
        if (count($this->userModel->exist('aem_phone_number', $numero)) == 0) {
            $error['number']['message'] = "Vérifiez votre numéro";
            $valid = false;
        }
        $error['number']['value'] = $numero;
        if (count($this->userModel->exist('aem_user_password', $password)) == 0) {
            $error['motDePasse']['message'] = "Vérifiez votre mot de passe";
            $valid = false;
        }
        $error['motDePasse']['value'] = $password;
        if (($user = $this->userModel->validLogin($numero, $password)) == null) {
            $valid = false;
        }
        if (!$valid) {
            return redirect()->to("/login")->with("error", $error);
        }
        session()->set('user', $user);
        helper('barcode');
        $barcode = generate_barcode(str_pad($user['aem_id_user'], 4, '0', STR_PAD_LEFT));
        return view("/acceuil", ['page_name' => 'profil', 'barcode' => $barcode]);
    }
}
