<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RuleModel;
use App\Models\SymptomsModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    public $userModel;
    public function __construct(){
        $this->userModel = new UserModel;
    }
    public function index()
    {
        //
    }

    public function detect()
    {
        $symptomsModel = new SymptomsModel();
        $data = [
            'symptoms' => $symptomsModel->getSymptoms(),
        ];
        return view('user/detect', $data);
    }
    public function store()
    {
        if (!service('authentication')->check()) {
            return redirect()->to('login')->with('error', 'You need to log in first.');
        }
        $symptomsModel = new SymptomsModel();

        $ruleModel = new RuleModel();
        $symptoms = $this->request->getVar('symptoms');
        $filteredSymptoms = array_filter($symptoms, function ($value) {
            return $value === '1';
        });

        $facts = array_keys($filteredSymptoms);
        $ruleDetected = false;
        $rulesFromDatabase = $ruleModel->getRule();

        foreach ($rulesFromDatabase as $rule) {
            $ruleConditions = $ruleModel->getSymptomsByRule($rule['rule_code']);
            $matchedConditions = 0;
            foreach ($ruleConditions as $condition) {
                if (in_array($condition['id_symptoms'], $facts)) {
                    $matchedConditions++;
                }
            }
            $detectedDisease = "";
            if ($matchedConditions === count($ruleConditions)) {
                $detectedDisease = $rule['type_description'];
                $ruleDetected = true;
                break;
            }
        }
        if (!$ruleDetected) {
            $detectedDisease = "Jika gejala terus berlanjut atau memburuk, disarankan untuk berkonsultasi dengan dokter untuk evaluasi lebih lanjut.";
        }
        $data = [
            'symptoms' => [],
            'detected_disease' => ($ruleDetected) ? $detectedDisease : "Maaf, hasil diagnosa tidak dapat ditentukan karena keterbatasan rule gejala atau anda tidak mengisikan gejala yang dialami",
        ];
        return view('user/hasil', $data);
    }
    public function profile(){
        $db         = \Config\Database::connect();
        $builder    = $db->table('users');
        // $builder->select('users.*');
        // $builder->join('users','users.id = rekam_medis.id_pasien');
        // $builder->join('stok','stok.nama = rekam_medis.resep_obat');
        $builder->where('id', user_id());
        $query      = $builder->get();
        $data = [
            'title' => 'Profile',
            'profile' => $query->getResultArray(),
        ];
        return view('user/profile', $data);
    }
    public function edit_profile(){
        $db         = \Config\Database::connect();
        $builder    = $db->table('users');
        // $builder->select('users.*'); 
        // $builder->join('users','users.id = rekam_medis.id_pasien');
        // $builder->join('stok','stok.nama = rekam_medis.resep_obat');
        $builder->where('id', user_id());
        $query      = $builder->get(); 
        $data = [
            'title' => 'Profile',
            'profile' => $query->getResultArray(),
        ];
        return view('user/edit_profile', $data);
    }
    public function update_profile(){
        $path='assets/uploads/images/';
        $foto=$this->request->getFile('foto');
        $data = [
            'fullname' => $this->request->getVar('fullname'),
            // 'email' => $this->request->getVar('email'),
            'telpon' => $this->request->getVar('telpon'),
            'alamat' => $this->request->getVar('alamat')
        ];
        if($foto->isValid()){
            $name = $foto->getRandomName();
            if($foto->move($path, $name)){
                $foto = base_url($path . $name);
                $data['user_image']=$foto;
            }
        }
        $this->userModel->updateUser($data, user_id());
        return redirect()->to('/user/profile');
    }
    public function logout()
    {
        $session = session();

        
        $session->remove(['id', 'email', 'username']);

        
        $session->destroy();

        
        return redirect()->to('login');

    }
}
