<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Models\MahasiswaModel;

class MahasiswaController extends BaseController
{
    protected $model;
    protected $format = 'json';
    use ResponseTrait;

   public function __construct()
    {
        
        $this->model = new MahasiswaModel();
    }

    public function index()
    {
        // $model = new MahasiswaModel();
        // $mahasiswa = $model->findAll();
        $data = [
            'message' => 'success',
            'mahasiswa' => $this->model->findAll()
        ];

        return $this->respond($data, 200);
    }

    public function show($id = null)
    {
        $data = [
            'message' => 'success',
            'mahasiswa_id' => $this->model->find($id)
        ];

        if($data['mahasiswa_id'] == null){
            return $this->failNotFound('Tidak Ada Data Mahasiswa');
        }
        return $this->respond($data, 200);
    }

    public function create()
    {
        // $model = new MahasiswaModel();
        // $data = $this->request->getJSON();

        // if ($model->insert($data)) {
        //     return $this->respondCreated($data);
        // } else {
        //     return $this->fail($model->errors());
        // }
        $this->model->insert([
            
            'NPM'   => esc($this->request->getVar('NPM')),
            'Nama'   => esc($this->request->getVar('Nama')),
            'Semester'   => esc($this->request->getVar('Semester')),
            'IPK'   => esc($this->request->getVar('IPK')),
            'Alamat'   => esc($this->request->getVar('Alamat')),
            'id'    =>  esc($this->request->getVar('id')),
        ]);

        $response =[
            'message'   => 'data Mahasiswa berhasil ditambah'
        ];

        return $this->respondCreated($response);
    }

    public function update($id = null)
    {
        // $model = new MahasiswaModel();
        // $data = $this->request->getJSON();

        // if ($model->update($id, $data)) {
        //     return $this->respond($data);
        // } else {
        //     return $this->fail($model->errors());
        // }
        $this->model->update($id, [
            'NPM'   => esc($this->request->getVar('NPM')),
            'Nama'   => esc($this->request->getVar('Nama')),
            'Semester'   => esc($this->request->getVar('Semester')),
            'IPK'   => esc($this->request->getVar('IPK')),
            'Alamat'   => esc($this->request->getVar('Alamat')),
        ]);

        $response =[
            'message'   => 'data Mahasiswa berhasil diubah'
        ];
        return $this->respondCreated($response, 200);
    }

    public function delete($id = null)
    {
        // $model = new MahasiswaModel();
        // $deleted = $model->delete($id);

        // if ($deleted) {
        //     return $this->respondDeleted(['id' => $id]);
        // } else {
        //     return $this->fail($model->errors());
        // }
        $this->model->delete($id);

        $response = [
            'message'   => 'Data Mahasiswa berhasil dihapus'
        ];

        return $this->respondDeleted($response);
    }
}
