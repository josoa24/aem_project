<?php

namespace App\Models;

use CodeIgniter\Model;

class PayementModel extends Model
{
    protected $table      = 'aem_payment';
    protected $primaryKey = 'aem_id_payment';
    protected $db;
    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }
    protected $allowedFields = [
        'aem_id_payment',
        'aem_id_user',
        'aem_validation'
    ];

    public function getPayementById($id)
    {
        return $this->find($id);
    }

    public function getAllPayement()
    {


        $builder = $this->db->table('aem_payment');
        $builder->select('*');
        $builder->orderBy('aem_id_payment', 'DESC');
        $builder->join('aem_user', 'aem_payment.aem_id_user = aem_user.aem_id_user');
        $query = $builder->get();
        $result = $query->getResultArray();

        return $result;
    }



    public function insertPayement($data)
    {
        return $this->insert($data);
    }

    public function comfirmPayment($id_payment)
    {
        return $this->update($id_payment, ['aem_validation' => 1]);
    }
}
