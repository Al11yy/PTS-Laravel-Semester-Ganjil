<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10); // pakai pagination
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang'    => 'required|string|max:255',
            'stok'           => 'required|integer|min:0',
            'status_barang'  => 'required|string|max:100',
            'gambar_barang'  => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar_barang')) {
            $gambarPath = $request->file('gambar_barang')->store('products', 'public');
        }

        Product::create([
            'nama_barang'    => $request->nama_barang,
            'stok'           => $request->stok,
            'status_barang'  => $request->status_barang,
            'gambar_barang'  => $gambarPath,
        ]);

        return redirect()->route('products.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'nama_barang'   => 'required|string|max:255',
            'stok'          => 'required|integer|min:0',
            'status_barang' => 'required|string|max:100',
            'gambar_barang' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('gambar_barang')) {
            if ($product->gambar_barang) {
                Storage::disk('public')->delete($product->gambar_barang);
            }
            $gambarPath = $request->file('gambar_barang')->store('products', 'public');
            $product->gambar_barang = $gambarPath;
        }

        $product->nama_barang   = $request->nama_barang;
        $product->stok          = $request->stok;
        $product->status_barang = $request->status_barang;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Barang berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        if ($product->gambar_barang) {
            Storage::disk('public')->delete($product->gambar_barang);
        }   
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Barang berhasil dihapus!');
    }
}
