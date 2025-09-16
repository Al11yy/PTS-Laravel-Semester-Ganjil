@extends('layouts.app')

@section('title', 'Form Peminjaman')

@section('content')
<!-- Complete redesign with glassy dark theme -->
<div class="max-w-4xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
    <div class="bg-black/30 backdrop-blur-xl p-8 rounded-3xl shadow-2xl border border-white/10">
        <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent rounded-3xl"></div>
        
        <div class="relative">
            <div class="text-center mb-8">
                <h2 class="text-4xl font-montserrat font-bold text-white mb-2">Equipment Borrowing Form</h2>
                <p class="text-gray-400 font-open-sans text-lg">Request laboratory equipment for your research</p>
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 rounded-2xl bg-green-500/20 text-green-300 border border-green-500/30 backdrop-blur-sm">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <form action="{{ route('form.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Borrower Name -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-300">Borrower Name</label>
                        <input type="text" 
                               name="nama_peminjam" 
                               class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-silver-400/50 focus:border-silver-400/50 transition-all duration-300" 
                               placeholder="Enter your full name">
                        @error('nama_peminjam') 
                            <p class="text-red-400 text-sm">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Product Selection -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-300">Select Product</label>
                        <select id="produk" 
                                name="produk_id" 
                                class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-silver-400/50 focus:border-silver-400/50 transition-all duration-300">
                            <option value="" class="bg-gray-800">-- Select Product --</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}"
                                    data-nama="{{ $product->nama_barang }}"
                                    data-stok="{{ $product->stok }}"
                                    class="bg-gray-800">
                                    {{ $product->nama_barang }}
                                </option>
                            @endforeach
                        </select>
                        @error('produk_id') 
                            <p class="text-red-400 text-sm">{{ $message }}</p> 
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Product Name (auto-filled) -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-300">Product Name</label>
                        <input type="text" 
                               id="nama_produk" 
                               name="nama_produk" 
                               class="w-full px-4 py-3 bg-gray-700/30 backdrop-blur-sm border border-white/10 rounded-2xl text-gray-400" 
                               readonly>
                    </div>

                    <!-- Available Stock (auto-filled) -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-300">Available Stock</label>
                        <input type="number" 
                               id="stok" 
                               name="stok" 
                               class="w-full px-4 py-3 bg-gray-700/30 backdrop-blur-sm border border-white/10 rounded-2xl text-gray-400" 
                               readonly>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Quantity to Borrow -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-300">Quantity to Borrow</label>
                        <input type="number" 
                               name="jumlah_barang" 
                               class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-silver-400/50 focus:border-silver-400/50 transition-all duration-300" 
                               placeholder="Enter quantity" 
                               min="1">
                        @error('jumlah_barang') 
                            <p class="text-red-400 text-sm">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Borrow Date -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-300">Borrow Date</label>
                        <input type="date" 
                               name="tanggal_pinjam" 
                               class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-silver-400/50 focus:border-silver-400/50 transition-all duration-300">
                        @error('tanggal_pinjam') 
                            <p class="text-red-400 text-sm">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Return Date -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-300">Return Date</label>
                        <input type="date" 
                               name="tanggal_kembali" 
                               class="w-full px-4 py-3 bg-white/10 backdrop-blur-sm border border-white/20 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-silver-400/50 focus:border-silver-400/50 transition-all duration-300">
                        @error('tanggal_kembali') 
                            <p class="text-red-400 text-sm">{{ $message }}</p> 
                        @enderror
                    </div>
                </div>

                <div class="flex gap-4 pt-8">
                    <button type="submit" 
                            class="flex-1 py-4 px-6 bg-gradient-to-r from-silver-500 to-silver-600 text-white font-semibold rounded-2xl shadow-2xl hover:shadow-silver-500/25 transition-all duration-300 transform hover:scale-105 text-lg">
                        Submit Borrowing Request
                    </button>
                    <a href="{{ route('dashboard') }}" 
                    class="flex-1 py-4 px-6 bg-white/10 backdrop-blur-sm border border-white/20 text-gray-300 hover:text-white hover:bg-white/20 font-semibold rounded-2xl transition-all duration-300 text-center text-lg">
                        Cancel
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- Script for auto-fill name & stock --}}
<script>
    const selectProduk = document.getElementById('produk');
    const inputNama = document.getElementById('nama_produk');
    const inputStok = document.getElementById('stok');

    selectProduk.addEventListener('change', function() {
        let selected = this.options[this.selectedIndex];
        inputNama.value = selected.getAttribute('data-nama') || '';
        inputStok.value = selected.getAttribute('data-stok') || '';
    });
</script>
@endsection
