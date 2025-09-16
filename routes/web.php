<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FormController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

// Halaman utama (public)
Route::get('/', function () {
    $products = Product::all();
    return view('welcome', compact('products'));
});

// Dashboard (public)
Route::get('/dashboard', function () {
    $products = Product::latest()->get();
    return view('dashboard', compact('products'));
})->name('dashboard');

// --- FORM (PUBLIC) ---
// form/create -> tampilkan form peminjaman
// form -> simpan data peminjaman
Route::resource('form', FormController::class)->only(['create', 'store']);

// --- ROUTE YANG BUTUH LOGIN ---
Route::middleware(['auth'])->group(function () {
    // Approve & Decline (admin only)
    Route::put('form/{id}/approve', [FormController::class, 'approve'])->name('form.approve');
    Route::put('form/{id}/decline', [FormController::class, 'decline'])->name('form.decline');

    // Sisanya dari FormController (index, show, edit, update, destroy)
    Route::resource('form', FormController::class)->except(['create', 'store']);

    // CRUD Produk (admin only)
    Route::resource('products', ProductController::class);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
