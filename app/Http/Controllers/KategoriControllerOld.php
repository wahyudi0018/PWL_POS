<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\KategoriModel;
Use illuminate\Http\RedirectResponse;
use illuminate\View\View;

class KategoriController extends Controller
{
    // public function index()
    // {
    //     // Menambah data
    //     // $data = [
    //     //     'kategori_kode' => 'SNK',
    //     //     'kategori_nama' => 'Snack/Makanan Ringan',
    //     //     'created_at' => now()
    //     // ];
    //     // DB::table('m_kategori')->insert($data);
    //     // return 'Insert data baru berhasil';

    //     // Mengupdate data
    //     // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
    //     // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

    //     // Menghapus data
    //     // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
    //     // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row . ' baris';


    //     // Menampilkan data
    //     $data = DB::table('m_kategori')->get();
    //     return view('kategori', ['data' => $data]);
    // }

    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    // public function create()
    // {
    //     return view('kategori.create');
    // }


    // public function store(Request $request)
    // {
    //     KategoriModel::create([
    //         'kategori_kode' => $request->kodeKategori,
    //         'kategori_nama' => $request->namaKategori,
    //     ]);
    //     return redirect('/kategori');
    // }

    // public function update($id)
    // {
    //     $kategori = KategoriModel::find($id);
    //     return view('kategori.update', compact('kategori'));
    // }

    // public function saveUpdate($id, Request $request)
    // {
    //     $kategori = KategoriModel::find($id);
    //     if (!$kategori) {
    //         return redirect()->back();
    //     }

    //     $kategori->kategori_kode = $request->kodeKategori;
    //     $kategori->kategori_nama = $request->namaKategori;
    //     $kategori->save();

    //     return redirect('/kategori');
    // }

    // public function destroy($id)
    // {
    //     KategoriModel::destroy($id);
    //     return redirect('/kategori');
    // }

    public function create()
    {
        return view('kategori.create');
    }

    // public function store(Request $request): RedirectResponse
    // {
    //     $validated =  $request->validate([
    //         'kategori_kode' => 'required',
    //         'kategori_nama' => 'required',
    //     ]);

    //     return redirect('/kategori');
    // }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $validated = $request->safe()->only(['kategori_kode', 'kategori_nama']);
        $validated = $request->safe()->except(['kategori_kode', 'kategori_nama']);

        return redirect('/kategori');
    }
}
