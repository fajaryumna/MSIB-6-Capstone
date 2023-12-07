<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function show(Tour $tour){
        return view('landingpage.show', compact('tour'));
    }
}
