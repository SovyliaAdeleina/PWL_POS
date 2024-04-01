<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\User;
use App\Models\LevelModel;
use App\Models\m_user;
use App\Models\m_userModel;
use App\Models\UserModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

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
    // Ambil data user dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $user =User::select('user_id', 'username', 'nama', 'level_id')
        ->with('level');
        
        return DataTables::of($user)
        
        ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
        ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
        $btn = '<a href="'.url('/user/' . $user->user_id).'" class="btn btn-info btn-sm">Detail</a> ';
        $btn .= '<a href="'.url('/user/' . $user->user_id . '/edit').'" 
class="btn btn-warning btn-sm">Edit</a> ';
$btn .= '<form class="d-inline-block" method="POST" action="'. 
url('/user/'.$user->user_id).'">'
            . csrf_field() . method_field('DELETE') . 
'<button type="submit" class="btn btn-danger btn-sm" 
onclick="return confirm(\'Apakah Anda yakin menghapus data 
ini?\');">Hapus</button></form>'; 
            return $btn;
        })
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        ->make(true);
}
// Praktikum 3, Jobsheet 7
public function create()
{
    $breadcrumb = (object)[
        'title' => 'Tambah User',
        'list' => ['Home', 'User', 'Tambah']
    ];

    $page = (object)[
        'title' => 'Tambah User Baru',
    ];

    $level = LevelModel::all();
    $activeMenu = 'user';

    return view('user.create', [
        'breadcrumb' => $breadcrumb,
        'page' => $page,
        'level' => $level,
        'activeMenu' => $activeMenu
    ]);
}

//menyimpan data user baru
public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:3|unique:m_user,username',
            'nama'     => 'required|string|max:100',
            'password' => 'required|min:5',
            'level_id' => 'required|integer',
        ]);

        UserModel::create([
            'username'  => $request->username,
            'nama'      => $request->nama,
            'password'  => bcrypt($request->password),
            'level_id'  => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user baru telah ditambahkan');
    }

    public function show(string $id)
    {
        $user = UserModel::with('level')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail User',
            'list'  => ['Home', 'User', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail User'
        ];

        $activeMenu = 'user';

        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }
    public function edit(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit User',
            'list'  => ['Home', 'User', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit User'
        ];
        $activeMenu = 'user';

        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'level' => $level, 'activeMenu' => $activeMenu]);
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'username'  => 'required|string|min:3|unique:m_user,username,' . $id . ',user_id',
            'nama'      => 'required|string|max:100',
            'password'  => 'nullable|min:5',
            'level_id'  => 'required|integer',
        ]);

        UserModel::find($id)->update([
            'username'  => $request->username,
            'nama'      => $request->nama,
            'password'  => $request->password ? bcrypt($request->password) : UserModel::find($id)->password,
            'level_id'  => $request->level_id
        ]);

        return redirect('/user')->with('success', 'Data user berhasil diubah');
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