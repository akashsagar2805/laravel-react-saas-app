<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsedFeatureResource;
use App\Models\UsedFeature;

class DashboardController extends Controller
{
    public function index()
    {
        $usedFeatures = UsedFeature::query()
            ->with(['feature'])
            ->where('user_id', auth()->user()->id)
            ->latest()
            ->paginate();

        return inertia('Dashboard', [
            'usedFeatures' => UsedFeatureResource::collection($usedFeatures),
        ]);
    }
}
