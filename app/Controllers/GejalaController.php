<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\SymptomsModel;
 
class GejalaController extends BaseController
{
    protected $symptomsModel;

    public function __construct()
    {
      
        $this->symptomsModel = new SymptomsModel;
        helper('form');
    }
    public function show($id)
    {
        $gejala = $this->symptomsModel->getUser($id);
        $data['title'] = 'Detail Gejala';


        $data['gejala'] = $gejala;

        return view('admin/table/crud/show_gejala', $data);
    }
    public function add_gejala()
    {
        $data['title'] = 'Add Gejala';
        return view('admin/table/add_gejala',$data);
    }
    public function up_gejala()
    {
        $this->symptomsModel->saveGejala([
            'symptoms_code' => $this->request->getVar('symptoms_code'),
            'symptoms_name' => $this->request->getVar('symptoms_name'),
        ]);
        return redirect()->to('admin/table/gejala');
    } 
    public function edit_gejala($id_symptoms)
    {
        $data['title'] = 'Edit Gejala';
        // Ambil data penyakit berdasarkan ID
        $gejala = $this->symptomsModel->getUser($id_symptoms);
        $data['gejala'] = $gejala;

        return view('admin/table/crud/edit_gejala', $data);
    }

    public function upd_gejala($id_symptoms)
    {
        $data['title'] = 'Detail Penyakit';
        $data = [
            'symptoms_code' => $this->request->getVar('symptoms_code'),
            'symptoms_name' => $this->request->getVar('symptoms_name'),  // Perbaiki typo dari 'password' menjadi 'type_name'
        ];

        $result = $this->symptomsModel->updateGejala($data, $id_symptoms);  // Perbaiki variabel $id_type

        if (!$result) {
            return redirect()->back()->withInput()
                ->with('error', 'Gagal Menyimpan Data!');
        }

        return redirect()->to('admin/table/gejala');
    }

    public function destroy($id_symptoms)
        {
        $result = $this->symptomsModel->deleteGejala($id_symptoms);
                if (!$result) {
                    return redirect()->back()->with('error', 'Gagal menghapus data');
                }
                return redirect()->to(base_url('admin/table/gejala'))
                    ->with('success', 'Berhasil Menghapus data');
        }
}