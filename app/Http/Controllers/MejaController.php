<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

/**
 * Class MejaController
 *
 * Mengatur CRUD untuk Meja
 */
class MejaController extends Controller
{
    /**
     * Menampilkan daftar semua meja
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $meja = Meja::all();
        return view('meja.index', compact('meja'));
    }

    /**
     * Menampilkan form untuk menambah meja baru
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('meja.create');
    }

    /**
     * Menyimpan data meja baru ke database
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nomor_meja' => 'required|integer',
            'status' => 'required'
        ]);

        Meja::create($request->all());

        return redirect()->route('meja.index')->with('success', 'Meja berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit meja
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $meja = Meja::findOrFail($id);
        return view('meja.edit', compact('meja'));
    }

    /**
     * Memperbarui data meja
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_meja' => 'required|integer',
            'status' => 'required'
        ]);

        $meja = Meja::findOrFail($id);
        $meja->update($request->all());

        return redirect()->route('meja.index')->with('success', 'Meja berhasil diperbarui!');
    }

    /**
     * Menghapus meja dari database
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $meja = Meja::findOrFail($id);
        $meja->delete();

        return redirect()->route('meja.index')->with('success', 'Meja berhasil dihapus!');
    }
}
