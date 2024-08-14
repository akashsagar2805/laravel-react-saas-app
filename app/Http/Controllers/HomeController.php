<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index()
    {
        $features = Feature::where('active', true)->get();
        return Inertia::render('Welcome', [
            'features' => $features,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }
}
