@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<!-- Complete redesign with glassy dark theme -->
<div class="max-w-2xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
    <div class="bg-black/30 backdrop-blur-xl p-8 rounded-3xl shadow-2xl border border-white/10">
        <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent rounded-3xl"></div>
        
        <div class="relative">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-montserrat font-bold text-white mb-2">Add New Product</h2>
                <p class="text-gray-400 font-open-sans">Create a new laboratory equipment entry</p>
            </div>

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-300">Product Name</label>
                    <input type="text" 
                           name="nama_barang" 
                           class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-silver-400/50 focus:border-silver-400/50 transition-all duration-300" 
                           placeholder="Enter product name"
                           required>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-300">Stock Quantity</label>
                    <input type="number" 
                           name="stok" 
                           class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-silver-400/50 focus:border-silver-400/50 transition-all duration-300" 
                           placeholder="Enter stock quantity"
                           required>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-300">Status</label>
                    <select name="status_barang" 
                            class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-silver-400/50 focus:border-silver-400/50 transition-all duration-300" 
                            required>
                        <option value="" class="bg-gray-800">-- Select Status --</option>
                        <option value="Baik" class="bg-gray-800">Good</option>
                        <option value="Rusak" class="bg-gray-800">Damaged</option>
                    </select>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-300">Product Image</label>
                    <input type="file" 
                           name="gambar_barang" 
                           class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-silver-500 file:text-white hover:file:bg-silver-600 transition-all duration-300">
                </div>

                <div class="flex gap-4 pt-6">
                    <!-- Made button text explicitly white and removed any potential gradient conflicts -->
                    <button type="submit" 
                            class="flex-1 py-3 px-6 bg-gradient-to-r from-silver-500 to-silver-600 font-semibold rounded-2xl shadow-2xl hover:shadow-silver-500/25 transition-all duration-300 transform hover:scale-105">
                        <span class="text-white">Save Product</span>
                    </button>
                    <a href="{{ route('dashboard') }}" 
                       class="flex-1 py-3 px-6 bg-white/10 backdrop-blur-sm border border-white/20 text-white hover:text-white hover:bg-white/20 font-semibold rounded-2xl transition-all duration-300 text-center">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
