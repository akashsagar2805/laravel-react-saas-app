<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
