<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TravelResource;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        // if we want to add pagination, we replace the get() method with paginate() because it adds some additional headers, such as links for the previous and next page
        $travels = Travel::where('is_public', true)->paginate(15);
        return TravelResource::collection($travels);
    }
}
