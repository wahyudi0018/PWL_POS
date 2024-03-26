<?php

namespace App\Http\Controllers;

use App\Models\m_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class POSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //fungsi eloquent menampilkan data menggunakan pagination
        $useri = m_user::all(); // Mengambil semua isi tabel
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
        //melakukan validasi data
        $request->validate([
            'user_id' => 'max 20',
            'username' => 'required',
            'nama' => 'required',
            'level_id' => 'required',
            'password' => 'required',
        ]);

        $input = $request->all();
        $input['level_id'] = $request->input('level_id');
        $input['password'] = Hash::make($request->input('password'));

        //fungsi eloquent untuk menambah data
        m_user::create($input);

        return redirect()->route('m_user.index')
        ->with('success', 'User Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, m_user $useri)
    {
        $useri = m_user::findOrFail($id);
        return view('m_user.show', compact('useri'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $useri = m_user::find($id);
        return view('m_user.edit', compact('useri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required',
            'level_id' => 'required',
            ]);

        $input = $request->all();
        $input['level_id'] = $request->input('level_id');
        $input['password'] = Hash::make($request->input('password'));

        //fungsi eloquent untuk menambah data
        m_user::find($id)->update($input);

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('m_user.index')
        ->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $useri= m_user::findOrFail($id)->delete();
        return \redirect()->route('m_user.index')

        -> with('success', 'Data Berhasil Dihapus');
    }
}
