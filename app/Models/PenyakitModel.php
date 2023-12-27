<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyakitModel extends Model
{
    protected $table = 'penyakit'; // Nama tabel di database
    protected $primaryKey = 'id_type '; // Kolom kunci utama tabel

    protected $allowedFields = ['type_code', 'type_name', 'type_description']; // Kolom yang diizinkan untuk diisi

    // Tambahan jika ingin menggunakan timestamps
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    
    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function getUser($id = null){
        if($id != null){
            return $this->find($id);
        }
        return $this->findAll();
    }
    public function savePenyakit ($data){
        $this->insert($data);
    }

    public function updatePenyakit($data, $id){
        return $this->update($id, $data);
    }

    public function deletePenyakit($id){

        return $this->delete($id);

    }
}
