<?php
namespace App\Controllers;
use App\Models\PenyakitModel;
use App\Controllers\BaseController;
use App\Models\UserModel;



class AdminController extends BaseController
{
    protected $db, $builder;
    protected $penyakitModel;
    public $userModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users'); 
        $this->userModel = new UserModel;

        $this->penyakitModel = new PenyakitModel;
        helper('form');
    }
    public function index(): string
    {
        if (logged_in()) {
            if (in_groups('admin')) {
                $data['title'] = 'Dashboard';
                $this->builder->select('users.id as userid, username, email, name');
                $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
                $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
                $query = $this->builder->get();
                $data['users'] = $query->getResult();
                return view('admin/dashboard', $data);
            } elseif (in_groups('user')) {
                $data['title'] = 'Dashboard';
                return view('user/dashboard', $data);
            } else {
                // Handle other user types or scenarios
                return view('welcome_message');
            }
        } else {
            return view('welcome_message');
        }
    }


    public function tableusers(): string
    {
        if (logged_in()) {
            if (in_groups('admin')) {
                $data['title'] = 'User List';

                $this->builder->select('users.id as userid, username, email, name');
                $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
                $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');

                $query = $this->builder->get();
                $data['users'] = $query->getResult();

                return view('admin/table/users', $data);
            } elseif (in_groups('user')) {
                $data['title'] = 'Dashboard';
                return view('user/dashboard', $data);
            } else {
                // Handle other user types or scenarios
                return view('welcome_message');
            }
        } else {
            return view('welcome_message');
        }
    }

    public function showusers($id){

        $users = $this->userModel->getUsers($id);
        // dd($users);
        $data = [
            'title' => "Edit User",
            'user' => $users,
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/table/profile_users', $data);
          
    }

    public function editusers($id){

        // $builder->select('users.*');
        // $builder->join('users','users.id = rekam_medis.id_pasien');
        // $builder->join('stok','stok.nama = rekam_medis.resep_obat');
        $users = $this->userModel->getUsers($id);
        
        $data = [
            'title' => 'Profile',
            'users' => $users,
        ];
        return view('admin/table/edit_profile_users', $data);
    }

    public function updateusers($id){
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
        $this->userModel->updateUser($data, $id);
        return redirect()->to('/admin/table/users/'. $id);
    }

    public function tablepenyakit(): string
    {
        if (logged_in()) {
            if (in_groups('admin')) {
                $data['title'] = 'Penyakit List';

                // Menggunakan Query Builder
                $db = db_connect();
                $builder = $db->table('penyakit');

                // Add pagination
                $page = $this->request->getVar('page') ?? 1;
                $perPage = 50; // Number of records per page
                $builder->limit($perPage, ($page - 1) * $perPage);

                // Mengambil semua data dari tabel penyakit
                $data['penyakit'] = $builder->get()->getResult();

                // Get the total count of entries
                $totalEntries = count($data['penyakit']);

                // Load pagination library
                $pager = service('pager');
                $data['pager'] = $pager->makeLinks($page, $perPage, $totalEntries, 'custom');

                // Pass totalEntries to the view
                $data['totalEntries'] = $totalEntries;

                return view('admin/table/penyakit', $data);
            } elseif (in_groups('user')) {
                $data['title'] = 'Dashboard';
                return view('user/dashboard', $data);
            } else {
                // Handle other user types or scenarios
                return view('welcome_message');
            }
        } else {
            return view('welcome_message');
        }
    }
    public function tablegejala(): string
    {
        if (logged_in()) {
            if (in_groups('admin')) {
                $data['title'] = 'Gejala List';

                // Menggunakan Query Builder
                $db = db_connect();
                $builder = $db->table('gejala'); 

                // Add pagination
                $page = $this->request->getVar('page') ?? 1;
                $perPage = 50; // Number of records per page
                $builder->limit($perPage, ($page - 1) * $perPage);

                // Mengambil semua data dari tabel gejala
                $data['gejala'] = $builder->get()->getResult();

                // Get the total count of entries
                $totalEntries = count($data['gejala']);

                // Load pagination library
                $pager = service('pager');
                $data['pager'] = $pager->makeLinks($page, $perPage, $totalEntries, 'custom');

                // Pass totalEntries to the view
                $data['totalEntries'] = $totalEntries;

                return view('admin/table/gejala', $data);
            } elseif (in_groups('user')) {
                $data['title'] = 'Dashboard';
                return view('user/dashboard', $data);
            } else {
                // Handle other user types or scenarios
                return view('welcome_message');
            }
        } else {
            return view('welcome_message');
        }
    }
    public function tablerule(): string
    {
        if (logged_in()) {
            if (in_groups('admin')) {
                $data['title'] = 'Rule List';

                // Menggunakan Query Builder
                $db = db_connect();
                $builder = $db->table('rule');

                $builder->select('rule.*, gejala.symptoms_name, penyakit.type_name');
                $builder->join('gejala', 'gejala.symptoms_code = rule.id_symptoms');
                $builder->join('penyakit', 'penyakit.type_code = rule.id_type');

                // Add pagination
                $page = $this->request->getVar('page') ?? 1;
                $perPage = 50; // Number of records per page
                $builder->limit($perPage, ($page - 1) * $perPage); // Corrected line

                $query = $builder->get(); // Corrected line
                $data['rules'] = $query->getResult();

                // Get the total count of entries
                $totalEntries = count($data['rules']);

                // Load pagination library
                $pager = service('pager');
                $data['pager'] = $pager->makeLinks($page, $perPage, $totalEntries, 'custom');

                // Pass totalEntries to the view
                $data['totalEntries'] = $totalEntries;

                return view('admin/table/rule', $data);
            } elseif (in_groups('user')) {
                $data['title'] = 'Dashboard';
                return view('user/dashboard', $data);
            } else {
                // Handle other user types or scenarios
                return view('welcome_message');
            }
        } else {
            return view('welcome_message');
        }
    }
    
    public function show($id)
    {
        $penyakit = $this->penyakitModel->getUser($id);
        $data['title'] = 'Detail Penyakit';


        $data['penyakit'] = $penyakit;

        return view('admin/table/show_penyakit', $data);
    }

    public function add_penyakit()
    {
        $data['title'] = 'add penyakit';
        return view('admin/table/add_penyakit',$data);
    }
    public function up_penyakit()
    {
        $this->penyakitModel->savePenyakit([
            'type_code' => $this->request->getVar('type_code'),
            'type_name' => $this->request->getVar('type_name'),
            'type_description' => $this->request->getVar('type_description'),
        ]);
        return redirect()->to('admin/table/penyakit');
    }

        public function edit_form($id_type)
    {
        $data['title'] = 'Edit Penyakit';
        // Ambil data penyakit berdasarkan ID
        $penyakit = $this->penyakitModel->getUser($id_type);
        $data['penyakit'] = $penyakit;



        // Tampilkan view formulir edit
        return view('admin/table/edit_penyakit', $data);
    }

   
        public function upd_penyakit($id_type)
        {
            $data['title'] = 'Detail Penyakit';
            $data = [
                'type_code' => $this->request->getVar('type_code'),
                'type_name' => $this->request->getVar('type_name'),  // Perbaiki typo dari 'password' menjadi 'type_name'
                'type_description' => $this->request->getVar('type_description'),
            ];

            $result = $this->penyakitModel->updatePenyakit($data, $id_type);  // Perbaiki variabel $id_type

            if (!$result) {
                return redirect()->back()->withInput()
                    ->with('error', 'Gagal Menyimpan Data!');
            }

            return redirect()->to('admin/table/penyakit');
        }
        public function destroy($id)
            {
                $result = $this->penyakitModel->deletePenyakit($id);
                if (!$result) {
                    return redirect()->back()->with('error', 'Gagal menghapus data');
                }
                return redirect()->to(base_url('admin/table/penyakit'))
                    ->with('success', 'Berhasil Menghapus data');
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
                return view('admin/table/profile', $data);
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
                    'title' => 'Edit Profile',
                    'profile' => $query->getResultArray(),
                ];
                return view('admin/table/profile/edit_profile', $data);
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
                return redirect()->to('/admin/profile');
            }

            public function mahasiswa(){
                return view('admin/table/mahasiswa');
            }
}
