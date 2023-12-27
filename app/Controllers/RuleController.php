<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\RuleModel;
use App\Models\SymptomsModel;
use App\Models\PenyakitModel;


class RuleController extends BaseController
{
    protected $ruleModel;
    protected $gejalaModel;
    protected $penyakitModel;
    protected $builder, $db;


    public function __construct()
    {
        $this->ruleModel = new RuleModel;
        $this->gejalaModel = new SymptomsModel;
        $this->penyakitModel = new PenyakitModel;
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('rule');

        helper('form');
    }
    public function show($id)
    {
        $rule = $this->ruleModel->getAturans($id);
        $gejala = $this->gejalaModel->getUser();
        $penyakit = $this->penyakitModel->getUser();

        $data =[
            'title' => 'Detail Rule',
            'rule' => $rule,
            'gejala' => $gejala,
            'penyakit' => $penyakit

        ];
        
        // $data['title'] = 'Detail Rule';
        // $data['rule'] = $rule;
        // $data['gejala'] = $gejala;
        // $data['penyakit'] = $penyakit;

        return view('admin/table/rule/show_rule', $data);
    }
    
    public function add_gejala()
    {
        $data['title'] = 'Add Gejala';
        return view('admin/table/add_gejala',$data);
    }
    public function up_gejala()
    {
        $this->ruleModel->saveGejala([
            'symptoms_code' => $this->request->getVar('symptoms_code'),
            'symptoms_name' => $this->request->getVar('symptoms_name'),
        ]);
        return redirect()->to('admin/table/gejala');
    }
    public function edit_rule($id)
    {
        $data['title'] = 'Edit Gejala';
        // Ambil data penyakit berdasarkan ID
        $gejala = $this->ruleModel->getAturan($id);
        $data['gejala'] = $gejala;

        return view('admin/table/edit_rule', $data);
    }

    public function upd_rule($id)
    {
        $data['title'] = 'Detail Penyakit';
        $data = [
            'rule_code' => $this->request->getVar('rule_code'),
            'symptoms_code' => $this->request->getVar('symptoms_code'),
            'id_type' => $this->request->getVar('id_type'),  // Perbaiki typo dari 'password' menjadi 'type_name'
        ];

        $result = $this->ruleModel->updateRule($data, $id);  // Perbaiki variabel $id_type// Perbaiki variabel $id_type

        if (!$result) {
            return redirect()->back()->withInput()
                ->with('error', 'Gagal Menyimpan Data!');
        }

        return redirect()->to('admin/table/rule');
    }

    public function destroy($id)
        {
        $result = $this->ruleModel->deleteRule($id);
                if (!$result) {
                    return redirect()->back()->with('error', 'Gagal menghapus data');
                }
                return redirect()->to(base_url('admin/table/gejala'))
                    ->with('success', 'Berhasil Menghapus data');
        }
}