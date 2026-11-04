<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        // Mengarah ke file resources/js/Pages/User/Menu.vue (atau .jsx)
        return inertia('User/Menu'); 
    }
}