@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
<!-- Complete redesign with glassy dark theme matching dashboard style -->
<div class="max-w-7xl mx-auto mt-10 space-y-8 px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center space-y-4 sm:space-y-0">
        <div class="space-y-2">
            <h1 class="text-4xl font-montserrat font-black text-white bg-gradient-to-r from-white to-silver-300 bg-clip-text text-transparent">
                Borrowing Requests
            </h1>
            <p class="text-gray-400 text-lg font-open-sans">Manage all equipment borrowing requests</p>
        </div>
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
                        <th class="p-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Borrower Name</th>
                        <th class="p-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Product Name</th>
                        <th class="p-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Borrow Date</th>
                        <th class="p-4 text-left text-sm font-semibold text-gray-300 uppercase tracking-wider">Return Date</th>
                        <th class="p-4 text-center text-sm font-semibold text-gray-300 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10">
                    @forelse($form as $item)
                    <tr class="hover:bg-white/5 transition-all duration-200 group">
                        <td class="p-4 text-gray-300 font-medium">{{ $loop->iteration }}</td>
                        <td class="p-4 font-semibold text-white group-hover:text-silver-300 transition-colors">{{ $item->nama_peminjam }}</td>
                        <td class="p-4 text-gray-300">{{ $item->nama_produk }}</td>
                        <td class="p-4 text-gray-300">{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') }}</td>
                        <td class="p-4 text-gray-300">{{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y') }}</td>
                       
                        <td class="p-4">
                            <div class="flex gap-2 justify-center">
                                @if($item->status_barang == 1)
                                    @if(Auth::check() && Auth::user()->id == 1)
                                        {{-- Approve Button --}}
                                        <form action="{{ route('form.approve', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" 
                                                    class="px-4 py-2 bg-green-500/20 text-green-300 rounded-xl hover:bg-green-500/30 border border-green-500/30 hover:border-green-500/50 transition-all duration-200 backdrop-blur-sm font-medium">
                                                Approve
                                            </button>
                                        </form>

                                        {{-- Decline Button --}}
                                        <form action="{{ route('form.decline', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" 
                                                    class="px-4 py-2 bg-red-500/20 text-red-300 rounded-xl hover:bg-red-500/30 border border-red-500/30 hover:border-red-500/50 transition-all duration-200 backdrop-blur-sm font-medium">
                                                Decline
                                            </button>
                                        </form>
                                    @endif
                                @elseif($item->status_barang == 0)
                                    <span class="px-4 py-2 bg-green-500/20 text-green-300 rounded-xl border border-green-500/30 backdrop-blur-sm font-medium">
                                        Approved
                                    </span>
                                @elseif($item->status_barang == 2)
                                    <span class="px-4 py-2 bg-red-500/20 text-red-300 rounded-xl border border-red-500/30 backdrop-blur-sm font-medium">
                                        Declined
                                    </span>
                                @endif
                            </div>
                        </td>


                        
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center p-12">
                            <div class="flex flex-col items-center space-y-4">
                                <div class="w-16 h-16 bg-gray-700/50 rounded-2xl flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm0 2h12v8H4V6z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <p class="text-gray-400 text-lg font-medium">No borrowing requests</p>
                                <p class="text-gray-500 text-sm">Borrowing requests will appear here</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $form->links() }}
    </div>
</div>
@endsection
