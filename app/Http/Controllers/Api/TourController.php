<?php

namespace App\Http\Controllers\Api;

use App\Models\Tour;
use App\Models\Travel;
use App\Http\Controllers\Controller;
use App\Http\Resources\TourResource;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index(Travel $travel)
    {
        // return Tour::where('travel_id', $travel->id)->orderBy('start_date')->get();
        $tours = $travel->tours()
            ->orderBy('start_date')
            ->paginate(5);
        return TourResource::collection($tours);

    }
}
