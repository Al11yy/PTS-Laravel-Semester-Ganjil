<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Product;
use Illuminate\Http\Request;

class FormController extends Controller
{
    // Tampilkan semua peminjaman
    public function index()
    {
        $form = Form::latest()->paginate(10);
        return view('form.index', compact('form'));
    }

    // Form tambah peminjaman
    public function create()
    {
        $products = Product::all();
        return view('form.create', compact('products'));
    }

    // Simpan peminjaman baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam'   => 'required|string|max:255',
            'nama_produk'     => 'required|string|max:255',
            'jumlah_barang'   => 'required|integer|min:1',
            'tanggal_pinjam'  => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        Form::create([
            'nama_peminjam'   => $request->nama_peminjam,
            'nama_produk'     => $request->nama_produk,
            'jumlah_barang'   => $request->jumlah_barang,
            'tanggal_pinjam'  => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status_barang'   => 1, // default = pending
        ]);

        return redirect()->route('form.index')->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    // Edit peminjaman
    public function edit(Form $form)
    {
        return view('form.edit', compact('form'));
    }

    // Update peminjaman
    public function update(Request $request, Form $form)
    {
        $request->validate([
            'nama_peminjam'   => 'required|string|max:255',
            'nama_produk'     => 'required|string|max:255',
            'jumlah_barang'   => 'required|integer|min:1',
            'tanggal_pinjam'  => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        $form->update([
            'nama_peminjam'   => $request->nama_peminjam,
            'nama_produk'     => $request->nama_produk,
            'jumlah_barang'   => $request->jumlah_barang,
            'tanggal_pinjam'  => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        return redirect()->route('form.index')->with('success', 'Peminjaman berhasil diperbarui!');
    }

    // Hapus peminjaman
    public function destroy(Form $form)
    {
        $form->delete();
        return redirect()->route('form.index')->with('success', 'Data berhasil dihapus');
    }

    // Approve peminjaman
    public function approve($id)
    {
        $form = Form::findOrFail($id);
        $form->update(['status_barang' => 0]); // 0 = Approved
        return redirect()->route('form.index')->with('success', 'Data berhasil disetujui');
    }

    // Decline peminjaman
    public function decline($id)
    {
        $form = Form::findOrFail($id);
        $form->update(['status_barang' => 2]); // 2 = Declined
        return redirect()->route('form.index')->with('success', 'Data berhasil ditolak');
    }
}
