<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengarah ke resources/js/Pages/Admin/Dashboard.vue
        return inertia('Admin/Dashboard');
    }
}