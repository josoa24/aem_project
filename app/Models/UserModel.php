<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'aem_user';
    protected $primaryKey = 'aem_id';

    protected $allowedFields = ['aem_name', 'aem_first_name', 'aem_address', 'aem_country', 'aem_city', 'aem_photos'];

    public function getUserById($id)
    {
        return $this->find($id);
    }

    public function getAllUsers()
    {
        return $this->findAll();
    }

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function countUsers()
    {
        return $this->countAll();
    }

    public function countActiveUsers()
    {
        return $this->where('status', 'active')->countAllResults();
    }

    public function insertUser($data)
    {
        return $this->insert($data);
    }

    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function saveUser($data)
    {
        return $this->save($data);
    }

    public function updateMultipleUsers($users)
    {
        return $this->updateBatch($users, 'id');
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }

    public function deleteInactiveUsers()
    {
        return $this->where('status', 'inactive')->delete();
    }

    public function getUsersByCustomQuery()
    {
        return $this->db->query("SELECT * FROM users WHERE status = 'active'")->getResult();
    }

    public function searchUsersByName($name)
    {
        return $this->like('name', $name)->findAll();
    }

    public function getUsersSortedByDate()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }
}
