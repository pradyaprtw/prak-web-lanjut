<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index(){
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
            // 'kelas' => $this->userModel->getUser(),
        ];

        return view ('list_user', $data);

    }

    public function create(){

        $kelasModel = new Kelas();

        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'npm' => 'required|string|max:255',
            'foto' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('upload', $filename, 'public');

            $this->userModel->create([
                'nama' => $request->input('nama'),
                'npm' => $request->input('npm'),
                'kelas_id' => $request->input('kelas_id'), 
                'foto' => $filename,        
            ]);

            
        }

        // return redirect()->to('/user/list');

        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');

        // $user = UserModel::create($validatedData);

        // $user->load ('kelas');

        // return view('profile', [
        //     'nama' => $user->nama,
        //     'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        //     'npm' => $user->npm,
        // ]);
    }

    public function show($id)
{
    $user = $this->userModel->getUser($id);

    if (!$user) {
        return redirect()->route('user.index')->with('error', 'User tidak ditemukan');
    }

    $data = [
        'title' => 'Profile',
        'nama' => $user->nama,
        'nama_kelas' => $user->nama_kelas,
        'npm' => $user->npm,
        'foto' => $user->foto
    ];
    
    return view('profile', $data);
}
}