<?php
namespace App\Http\Controllers\SuperAdmin;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengarah ke resources/js/Pages/SuperAdmin/Dashboard.vue
        return inertia('SuperAdmin/Dashboard');
    }
}