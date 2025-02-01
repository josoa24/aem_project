<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';  // Nom de la table
    protected $primaryKey = 'id';     // Clé primaire

    protected $allowedFields = ['name', 'email', 'password']; // Champs autorisés

    /**
     * 🚀 1. Récupérer des Données
     */

    // Trouver un utilisateur par son ID
    public function getUserById($id)
    {
        return $this->find($id);
    }

    // Récupérer tous les utilisateurs
    public function getAllUsers()
    {
        return $this->findAll();
    }

    // Récupérer un utilisateur avec une condition WHERE
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    // Récupérer le nombre total d'utilisateurs
    public function countUsers()
    {
        return $this->countAll();
    }

    // Compter les utilisateurs avec une condition WHERE
    public function countActiveUsers()
    {
        return $this->where('status', 'active')->countAllResults();
    }

    /**
     * 🚀 2. Insérer et Mettre à Jour des Données
     */

    // Insérer un utilisateur
    public function insertUser($data)
    {
        return $this->insert($data);
    }

    // Mettre à jour un utilisateur
    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    // Sauvegarder (insert ou update automatiquement)
    public function saveUser($data)
    {
        return $this->save($data);
    }

    // Mettre à jour plusieurs utilisateurs en une seule requête
    public function updateMultipleUsers($users)
    {
        return $this->updateBatch($users, 'id');
    }

    /**
     * 🚀 3. Supprimer des Données
     */

    // Supprimer un utilisateur par son ID
    public function deleteUser($id)
    {
        return $this->delete($id);
    }

    // Supprimer tous les utilisateurs avec une condition
    public function deleteInactiveUsers()
    {
        return $this->where('status', 'inactive')->delete();
    }

    /**
     * 🚀 4. Utilisation Avancée
     */

    // Requête personnalisée avec query()
    public function getUsersByCustomQuery()
    {
        return $this->db->query("SELECT * FROM users WHERE status = 'active'")->getResult();
    }

    // Utilisation de "like" pour chercher un nom
    public function searchUsersByName($name)
    {
        return $this->like('name', $name)->findAll();
    }

    // Trier les utilisateurs par date de création
    public function getUsersSortedByDate()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }
}
