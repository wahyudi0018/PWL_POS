<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\DetailPenjualanModel;
use App\Models\PenjualanModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Transaksi',
            'list' => ['Home', 'Transaksi Penjualan']
        ];

        $page = (object)[
            'title' => 'Daftar Transaksi Penjualan yang terdaftar dalam sistem'
        ];

        $activeMenu = 'penjualan';

        $user = UserModel::all();
        return view('penjualan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $penjualans = PenjualanModel::select('penjualan_id', 'penjualan_kode', 'penjualan_tanggal', 'user_id', 'pembeli')
            ->with('user');

        if ($request->user_id) {
            $penjualans->where('user_id', $request->user_id);
        }

        return DataTables::of($penjualans)
            ->addIndexColumn()
            ->addColumn('aksi', function ($penjualans) {
                $btn = '<a href="' . url('/penjualan/' . $penjualans->penjualan_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/penjualan/' . $penjualans->penjualan_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/penjualan/' . $penjualans->penjualan_id) . '">'
                    . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object)[
            'title' => 'Tambah Transaksi',
            'list' => ['Home', 'Transaksi', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Transaksi baru'
        ];

        $users = UserModel::all();
        $barangs = BarangModel::all();
        $activeMenu = 'penjualan';

        return view('penjualan.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'users' => $users, 'barangs' => $barangs, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'penjualan_kode' => 'required|string|max:255',
            'pembeli' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'user' => 'required|exists:m_user,user_id',
            'barang' => 'required|array',
            'barang.*' => 'exists:m_barang,barang_id',
            'jumlah' => 'required|array',
            'jumlah.*' => 'nullable|integer|min:1',
        ]);

        $penjualan = new PenjualanModel();
        $penjualan->penjualan_kode = $validatedData['penjualan_kode'];
        $penjualan->pembeli = $validatedData['pembeli'];
        $penjualan->penjualan_tanggal = $validatedData['tanggal'];
        $penjualan->user_id = $validatedData['user'];
        $penjualan->save();

        foreach ($validatedData['barang'] as $barangId => $value) {
            $jumlah = $validatedData['jumlah'][$barangId] ?? 0;
            if ($jumlah > 0) {
                $barang = BarangModel::find($barangId);
                $detailPenjualan = new DetailPenjualanModel();
                $detailPenjualan->penjualan_id = $penjualan->penjualan_id;
                $detailPenjualan->barang_id = $barangId;
                $detailPenjualan->jumlah = $jumlah;
                $detailPenjualan->harga = $barang->harga_jual * $jumlah;
                $detailPenjualan->save();
            }
        }

        return redirect('/penjualan')->with('success', 'Transaksi berhasil disimpan.');
    }
    public function show(string $id)
    {
        $penjualan = PenjualanModel::with(['detail', 'user'])->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Transaksi Penjualan ',
            'list' => ['Home', 'Transaksi Penjualan ', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Transaksi Penjualan '
        ];

        $activeMenu = 'penjualan';

        return view('penjualan.show', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'penjualan' => $penjualan,
            'activeMenu' => $activeMenu
        ]);
    }

    public function edit(string $id)
    {
        $breadcrumb = (object)[
            'title' => 'Edit Transaksi Penjualan ',
            'list' => ['Home', 'Transaksi Penjualan ', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Transaksi Penjualan '
        ];

        $penjualan = PenjualanModel::findOrFail($id);
        $users = UserModel::all();
        $barangs = BarangModel::all();
        $penjualanBarangIds = $penjualan->details ? $penjualan->details->pluck('barang_id')->toArray() : [];

        $activeMenu = 'penjualan';

        return view('penjualan.edit', compact('breadcrumb', 'page', 'penjualan', 'users', 'barangs', 'penjualanBarangIds', 'activeMenu'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'pembeli' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'user' => 'required|exists:m_user,user_id',
            'barang.*' => 'nullable|exists:m_barang,barang_id',
            'jumlah.*' => 'nullable|integer|min:0',
        ]);

        $penjualanTanggal = \Carbon\Carbon::parse($request->tanggal . ' ' . $request->waktu);

        $penjualan = PenjualanModel::findOrFail($request->penjualan_id);
        $penjualan->pembeli = $validatedData['pembeli'];
        $penjualan->penjualan_tanggal = $penjualanTanggal;
        $penjualan->user_id = $validatedData['user'];
        $penjualan->save();

        DB::transaction(function () use ($penjualan, $validatedData) {
            $penjualan->details()->delete();

            foreach ($validatedData['barang'] as $barangId => $value) {
                if ($value > 0) {
                    $penjualan->details()->create([
                        'barang_id' => $barangId,
                        'jumlah' => $validatedData['jumlah'][$barangId]
                    ]);
                }
            }
        });

        return redirect('/penjualan')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $penjualan = PenjualanModel::find($id);
        if (!$penjualan) {
            return redirect('/penjualan')->with('error', 'Data Transaksi tidak ditemukan');
        }
        try {
            $penjualan->detail()->delete();
            $penjualan->delete();

            return redirect('/penjualan')->with('success', 'Data Transaksi berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/penjualan')->with('error', 'Data barang gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
