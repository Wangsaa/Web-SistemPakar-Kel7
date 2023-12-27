<?php

namespace App\Models;

use CodeIgniter\Model;
 
class RuleModel extends Model
{
    protected $table            = 'rule';
    protected $primaryKey       = 'id_rule';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['rule_code', 'id_symptoms', 'id_type', 'type_description'];

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

    public function getRule(){
        return $this->select('rule.*, gejala.symptoms_name, penyakit.type_name, penyakit.type_description')
            ->join('gejala', 'gejala.symptoms_code=rule.id_symptoms')
            ->join('penyakit', 'penyakit.type_code=rule.id_type')
            ->groupBy('rule.rule_code')
            ->findAll();
    }

    public function getAturan($id = null){
        if ($id != null){
            return $this->select('rule.*, gejala.symptoms_code,gejala.symptoms_name, penyakit.type_name, penyakit.type_code')
            ->join('gejala', 'gejala.symptoms_code=rule.id_symptoms')
            ->join('penyakit', 'penyakit.type_code=rule.id_type')
            ->find($id);
        }
        return $this->select('rule.*, gejala.symptoms_code,gejala.symptoms_name, penyakit.type_name, penyakit.type_code')
            ->join('gejala', 'gejala.symptoms_code=rule.id_symptoms')
            ->join('penyakit', 'penyakit.type_code=rule.id_type')
            ->findAll();
    }

    public function getAturans($id = null){
        if ($id != null){
            return $this->select('rule.*, gejala.symptoms_name, penyakit.type_name')
            ->join('gejala', 'gejala.symptoms_code=rule.id_symptoms')
            ->join('penyakit', 'penyakit.type_code=rule.id_type')
            ->find($id);
        }
        return $this->select('rule.*, gejala.symptoms_name, penyakit.type_name')
            ->join('gejala', 'gejala.symptoms_code=rule.id_symptoms')
            ->join('penyakit', 'penyakit.type_code=rule.id_type')
            ->findAll();
    }

    public function getSymptomsByRule($id = null)
    {
        return $this->select('rule.*, gejala.symptoms_name,gejala.symptoms_code, penyakit.type_name')
            ->join('gejala', 'gejala.symptoms_code=rule.id_symptoms')
            ->join('penyakit', 'penyakit.type_code=rule.id_type')
            ->where('rule.rule_code', $id)
            ->find();
    
    }

    public function getRuleGejala()
    {
        return $this->db->table('gejala')
        ->Get()->getResultArray();
    
    }

    public function getRulePenyakit()
    {
        return $this->db->table('penyakit')
        ->Get()->getResultArray();
    
    }

    public function getRuleAturan()
    {
        return $this->db->table('rule')
        ->Get()->getResultArray();
    
    }
    public function updateRule($data, $id){
        return $this->update($id, $data);
    }

    public function deleteRule($id){

        return $this->delete($id);

    }
}