<?php

namespace App\Models;

use CodeIgniter\Model;
 
class SymptomsModel extends Model
{
    protected $table            = 'gejala';
    protected $primaryKey       = 'id_symptoms';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['symptoms_code', 'symptoms_name'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getSymptoms(){
        return $this->findAll();
    }

    public function getUser($id = null){
        if($id != null){
            return $this->find($id);
        }
        return $this->findAll();
    }
    public function saveGejala ($data){
        $this->insert($data);
    }

    public function updateGejala($data, $id){
        return $this->update($id, $data);
    }

    public function deleteGejala($id){

        return $this->delete($id);

    }
}
