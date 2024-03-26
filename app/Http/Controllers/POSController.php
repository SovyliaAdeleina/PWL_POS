<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\m_user;
use App\Models\m_userModel;

class POSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $useri = m_userModel::all();
        return view('m_user.index', compact('useri'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('m_user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'max 20',
            'username' => 'required',
            'nama' => 'required',
        ]);

        m_userModel::create($request->all());

        return redirect()->route('m_user.index')
        ->with('success', 'user berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, m_userModel $useri)
    {
        $useri = m_userModel::findOrFail($id);
        return view('m_user.show', compact('useri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $useri = m_userModel::find($id);
        return view('m_user.edit', compact('useri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username'=> 'required',
            'nama'=> 'required',
            'password'=> 'required',
        ]);
        m_userModel::find($id)->update($request->all());
        return redirect()->route('m_user.index')
        ->with('success','Data user Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $useri = m_userModel::findOrFail($id)->delete();
        return redirect()->route('m_user.index')
        ->with('success','Data User berhasil dihapus');
    }
}