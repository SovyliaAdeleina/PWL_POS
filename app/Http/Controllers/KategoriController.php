<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

// use App\Models\KategoriModel;
// use Illuminate\Http\Request;
// use App\DataTables\KategoriDataTable;

// class KategoriController extends Controller
// {
//     public function index(KategoriDataTable $DataTable)
//     {
//         // /*$data = [
//         //     'kategori_kode' => 'SNK',
//         //     'kategori_nama' => 'Snack/Makanan Ringan',
//         //     'created_at' => now()
//         // ];
//         // DB::table('m_kategori')->insert($data);
//         // return 'Insert data baru berhasil'; */

//         // // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
//         // // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row.' baris';  

//         // // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
//         // // return 'Delete data berhasil. Jumlah data yang dihapus: '. $row.' baris'; 

//         // $data = DB::select('select * from m_kategori');
//         // return view('kategori', ['data' => $data]);

//         return $DataTable->render('kategori.index');
//     }

//     public function create()
//     {
//         return view('kategori.create');
//     }

//     public function ubah()
//     {
//         return view('kategori.ubah');
//     }

//     public function store(Request $request)
//     {
//         KategoriModel::create([
//             'kategori_kode' => $request->kodeKategori,
//             'kategori_nama' => $request->namaKategori,
//         ]);

//         KategoriModel::ubah([
//             'kategori_kode' => $request->kodeKategori,
//             'kategori_nama' => $request->namaKategori,
//             'kategori_id' => $request->IDKategori,
//         ]);
//         return redirect('/kategori');
//     }
// }

// Jobsheet 6 
class KategoriController extends Controller
{
    /**
     *  Show the form to create a new post.
     */

     public function create(): View
     {
        return view('kategori.create');
     }
     /**
      * Store a new post.
      */

    public function store(Request $request): RedirectResponse
    {
    $validatedData = $request->validateWithBag('post', [
        // 'kategori_kode' => 'required',
        // 'kategori_nama' => 'required',

        'title' => ['required', 'unique:posts', 'max:255'],
        'body' => ['required'],
    ]);

    // The post is valid...

    return redirect('/kategori');
    }
}