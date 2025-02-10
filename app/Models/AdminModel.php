<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table      = 'aem_admin';
    protected $primaryKey = 'aem_id_admin';

    protected $allowedFields = [
        'aem_admin_name',
        'aem_admin_email',
        'aem_admin_password',
        'aem_admin_phone_number'
    ];

    public function getAdminById($id)
    {
        return $this->find($id);
    }

    public function getAllAdmins()
    {
        return $this->findAll();
    }

    public function getAdminByEmail($email)
    {
        return $this->where('aem_admin_email', $email)->first();
    }

    public function countAdmins()
    {
        return $this->countAll();
    }

    public function insertAdmin($data)
    {
        return $this->insert($data);
    }

    public function updateAdmin($id, $data)
    {
        return $this->update($id, $data);
    }

    public function saveAdmin($data)
    {
        return $this->save($data);
    }

    public function deleteAdmin($id)
    {
        return $this->delete($id);
    }

    public function exist($field, $value)
    {
        $builder = $this->db->table($this->table);
        $query = $builder->getWhere([$field => $value]);
        $result = $query->getResultArray();
        return $result;
    }


    public function validLogin($email, $password)
    {
        $builder = $this->db->table($this->table);
        $admin = $builder->where('aem_admin_phone_number', $email)
            ->where('aem_admin_password', $password)
            ->get()
            ->getRowArray();
        return $admin ? $admin : null;
    }
}
