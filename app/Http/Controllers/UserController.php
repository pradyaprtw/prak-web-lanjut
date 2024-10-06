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
            'title' => 'Create User',
            'users' => $this->userModel->getUser(),
            'kelas' => $this->userModel->getUser(),
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
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'kelas_id' => $request->input('kelas_id'),         
            'npm' => $request->input('npm'),
        ]);

        return redirect()->to('/user');

        // $user = UserModel::create($validatedData);

        // $user->load ('kelas');

        // return view('profile', [
        //     'nama' => $user->nama,
        //     'nama_kelas' => $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan',
        //     'npm' => $user->npm,
        // ]);
    }
}