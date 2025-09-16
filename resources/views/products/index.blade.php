@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<!-- Complete redesign with glassy dark theme matching dashboard style -->
<div class="max-w-7xl mx-auto mt-10 space-y-8 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
        <div class="space-y-2">
            <h1 class="text-4xl font-montserrat font-black text-white bg-gradient-to-r from-white to-silver-300 bg-clip-text text-transparent">
                Product List
            </h1>
            <p class="text-gray-400 text-lg font-open-sans">Manage all laboratory equipment</p>
        </div>
                <a href="{{ route('products.create') }}" 
           class="group relative px-6 py-3 bg-gradient-to-r from-silver-500 to-silver-600 text-white font-semibold rounded-2xl shadow-2xl hover:shadow-silver-500/25 transition-all duration-300 transform hover:scale-105 backdrop-blur-sm border border-white/20">
            <span class="flex items-center space-x-2 text-white">
                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                </svg>
                <span class="text-white">Tambah Produk</span>
            </span>
        </a>
    </div>

    @if(session('success'))
        <div class="p-4 rounded-2xl bg-green-500/20 text-green-300 border border-green-500/30 shadow-2xl backdrop-blur-sm">
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="bg-black/30 backdrop-blur-xl shadow-2xl rounded-3xl overflow-hidden border border-white/10">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-black/50 backdrop-blur-sm">
                    <tr class="border-b border-white/10">
                        <th class="p-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">#</th>
                        <th class="p-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Product Name</th>
                        <th class="p-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Stock</th>
                        <th class="p-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Status</th>
                        <th class="p-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Image</th>
                        <th class="p-4 text-center text-sm font-semibold text-gray-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse($products as $product)
                    <tr class="hover:bg-white/5 transition-all duration-200 group">
                        <td class="p-4 text-gray-300 font-medium">{{ $loop->iteration }}</td>
                        <td class="p-4 font-semibold text-white group-hover:text-silver-300 transition-colors">{{ $product->nama_barang }}</td>
                        <td class="p-4 text-gray-300">{{ $product->stok }}</td>
                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold backdrop-blur-sm
                                @if($product->status_barang == 'Baik') bg-green-500/20 text-green-300 border border-green-500/30
                                @elseif($product->status_barang == 'Rusak') bg-red-500/20 text-red-300 border border-red-500/30
                                @else bg-gray-500/20 text-gray-300 border border-gray-500/30 @endif">
                                {{ $product->status_barang }}
                            </span>
                        </td>
                        <td class="p-4">
                            @if($product->gambar_barang)
                                <img src="{{ asset('storage/'.$product->gambar_barang) }}" 
                                     class="w-16 h-16 object-cover rounded-2xl border border-white/20 shadow-lg">
                            @else
                                <div class="w-16 h-16 bg-gray-700/50 rounded-2xl border border-white/10 flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('products.edit', $product->id) }}" 
                                   class="px-4 py-2 bg-yellow-500/20 text-yellow-300 rounded-xl hover:bg-yellow-500/30 border border-yellow-500/30 hover:border-yellow-500/50 transition-all duration-200 backdrop-blur-sm font-medium">
                                    Edit
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-4 py-2 bg-red-500/20 text-red-300 rounded-xl hover:bg-red-500/30 border border-red-500/30 hover:border-red-500/50 transition-all duration-200 backdrop-blur-sm font-medium">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center p-12">
                            <div class="flex flex-col items-center space-y-4">
                                <div class="w-16 h-16 bg-gray-700/50 rounded-2xl flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                                    </svg>
                                </div>
                                <p class="text-gray-400 text-lg font-medium">No products available</p>
                                <p class="text-gray-500 text-sm">Start by adding your first product</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>
@endsection
