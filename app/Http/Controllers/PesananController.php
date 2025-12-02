<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pelanggan;
use App\Models\Meja;
use Illuminate\Http\Request;

/**
 * Class PesananController
 *
 * Mengatur CRUD untuk Pesanan
 */
class PesananController extends Controller
{
    /**
     * Menampilkan daftar semua pesanan
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pesanans = Pesanan::with(['pelanggan','meja'])->get();
        return view('pesanan.index', compact('pesanans'));
    }

    /**
     * Menampilkan form tambah pesanan
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $pelanggans = Pelanggan::all();
        $mejas = Meja::where('status', 'tersedia')->get();
        return view('pesanan.create', compact('pelanggans','mejas'));
    }

    /**
     * Menyimpan pesanan baru ke database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'meja_id' => 'required',
            'tanggal_pesan' => 'required',
            'total_dp' => 'required|integer'
        ]);

        Pesanan::create($request->all());

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit pesanan
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pelanggans = Pelanggan::all();
        $mejas = Meja::all();
        return view('pesanan.edit', compact('pesanan','pelanggans','mejas'));
    }

    /**
     * Memperbarui data pesanan
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'meja_id' => 'required',
            'tanggal_pesan' => 'required',
            'total_dp' => 'required|integer'
        ]);

        Pesanan::findOrFail($id)->update($request->all());

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil diupdate!');
    }

    /**
     * Menghapus pesanan dari database
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Pesanan::findOrFail($id)->delete();
        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus!');
    }
}
