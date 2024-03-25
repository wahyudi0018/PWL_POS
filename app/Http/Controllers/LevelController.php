<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LevelModel;
use App\Http\Requests\LevelPostRequest;
Use illuminate\Http\RedirectResponse;

class LevelController extends Controller
{
    public function index()
    {
        // Menambah data
        // DB::insert('insert into m_level(level_kode, level_nama, created_at) values(?, ?, ?)', ['CUS', 'Pelanggan', now()]);
        // return 'Insert data baru berhasil';

        // Mengupdate data
        // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

        // Menghapus data
        // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row . ' baris';

        // Menampilkan data
        $data = DB::select('select * from m_level');
        return view('level', ['data' => $data]);
    }

    public function tambah()
    {
        return view('level_tambah');
    }

    // public function store(Request $request)
    // {
    //     LevelModel::tambah([
    //         'level_kode' => $request->kodeLevel,
    //         'level_nama' => $request->namaLevel,
    //     ]);
    //     return redirect('/level');
    // }

    public function store(LevelPostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated = $request->safe()->only(['level_kode', 'level_nama']);
        $validated = $request->safe()->except(['level_kode', 'level_nama']);

        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama
        ]);

        return redirect('/level');
    }
}
