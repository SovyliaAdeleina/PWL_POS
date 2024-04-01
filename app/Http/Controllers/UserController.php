<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
// use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Praktikum 3 Jobsheet 7
    // Menampilkan halaman awal user
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list'  => ['Home', 'User']
        ];

        $page = (object) [
            'title' => 'Daftar user terdaftar dalam sistem'
        ];

        $activeMenu = 'user'; // set menu yang sedang aktif

        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }

}

    // {  
    //     $user = UserModel::with('level')->get();
    //     dd($user);
        
    //     // tambah data user dengan Eloquent Model
    //     // $data = [
    //     //     'level_id' => 2,
    //     //     'username' => 'manager_tiga',
    //     //     'nama' => 'Manager 3',
    //     //     'password' => Hash::make('12345'),
            
    //     // ];
    //     // UserModel::create($data);
        
    //     //coba akses model UserModel

    //     $user = UserModel::all();
    //     return view('user', ['data' => $user]);
    //     }

    //     public function tambah()
    //     {
    //         return view('user_tambah');
    //     }

    //     public function tambah_simpan(Request $request)
    //     {
    //         UserModel::create([
    //             'username' => $request->username,
    //             'nama' => $request->nama,
    //             'password'=> Hash::make('$request->password'),
    //             'level_id' => $request->level_id
    //         ]);
    //         return redirect('/user');
    //     }

    //     public function ubah($id)
    //     {
    //         $user = UserModel::find($id);
    //         return view('user_ubah', ['data' => $user]);
    //     }

    //     public function ubah_simpan($id, Request $request)
    //     {
    //         $user = UserModel::find($id);

    //         $user->username = $request->username;
    //         $user->nama = $request->nama;
    //         $user->password = Hash::make('$request->password');
    //         $user->level_id = $request->level_id;

    //         $user->save();
            
    //         return redirect('/user');
    //     }

    //     public function hapus($id)
    //     {
    //         $user = UserModel::find($id);
    //         $user->delete();

    //         return redirect('/user');
    //     }

      
     
        // $user = UserModel::create([
                // 'username' => 'manager11',
                // 'nama' => 'Manager11',
                // 'password'=> Hash::make('12345'),
                // 'level_id' => 2
            
        //     ],
        // ); 

        // $user->username = 'manager12';

        // $user->isDirty(); //true
        // $user->isDirty('username'); //true
        // $user->isDirty('nama'); //false
        // $user->isDirty(['nama', 'username']); //true

        // $user->isClean(); //false
        // $user->isClean('username'); //false
        // $user->isClean('nama'); //true
        // $user->isClean(['nama', 'username']); //false

        // $user->save();

        // $user->wasChanged(); // true
        // $user->wasChanged('username'); //true
        // $user->wasChanged(['username', 'level_id']); //true
        // $user->wasChanged('nama');//false
        // dd($user->wasChanged(['nama', 'username']));//true

        // $user->isDirty(); //false
        // $user->isClean(); //true 
        // dd($user->isDirty());
        //ambil semua data dari m_user
        // dd($user);

        // return view('user', ['data' => $user]);
// }