<?php

namespace App\Models;

use CodeIgniter\Model;

class CountryModel extends Model
{
    protected $table      = 'aem_country';
    protected $primaryKey = 'aem_id_country';

    protected $allowedFields = [
        'aem_country'
    ];

    public function getCountryById($id)
    {
        return $this->find($id);
    }

    public function getAllCountries()
    {
        return $this->findAll();
    }

    public function insertCountry($data)
    {
        return $this->insert($data);
    }

    public function updateCountry($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteCountry($id)
    {
        return $this->delete($id);
    }

    public function getCountryIdByName($name)
    {
        $country = $this->where('aem_country', $name)->first();
        return $country ? $country['aem_id_country'] : null;
    }
}
