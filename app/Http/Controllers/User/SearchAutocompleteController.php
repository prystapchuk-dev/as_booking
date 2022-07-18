<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class SearchAutocompleteController extends Controller
{
    public function query(Request $request)
    {



        $data = Offer::select('city')
            ->where('city', 'LIKE', "{$request['query']}%")
            ->groupBy('city')
            ->get();

        return response()->json($data);
    }
}
