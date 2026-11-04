<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\User\MenuController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboard;

// Halaman awal (Landing Page)
Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

// Route setelah login (Berdasarkan Role)
Route::middleware(['auth'])->group(function () {
    
    // Redirect default setelah login (Kita timpa dengan logika di bawah)
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;
        if ($role === 'super_admin') return redirect()->route('superadmin.dashboard');
        if ($role === 'admin') return redirect()->route('admin.dashboard');
        return redirect()->route('user.menu');
    })->name('dashboard');

    // Rute untuk User Biasa (Pelanggan/Pemesan)
    Route::middleware(['role:user'])->group(function () {
        Route::get('/menu', [MenuController::class, 'index'])->name('user.menu');
    });

    // Rute untuk Admin (Kasir)
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
    });

    // Rute untuk Super Admin (IT/Atasan)
    Route::middleware(['role:super_admin'])->group(function () {
        Route::get('/superadmin/dashboard', [SuperAdminDashboard::class, 'index'])->name('superadmin.dashboard');
    });
});

// Panggil route auth bawaan Starter Kit
// require __DIR__.'/auth.php';