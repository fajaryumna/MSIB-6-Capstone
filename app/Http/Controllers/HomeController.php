<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class HomeController extends Controller
{
    public function index()
    {
        $tours = Tour::all();
        return view('landingpage.home', compact('tours'));
    }
    public function package()
    {
        $tours = Tour::all();
        return view('landingpage.package', compact('tours'));
    }
    public function search(Request $request)
    {
        $keyword = $request->search;
        $tours = Tour::where('destination', 'like', "%" . $keyword . "%")->paginate(5);
        return view('landingpage.package', compact('tours'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function about()
    {
        $tours = Tour::all();
        return view('landingpage.about', compact('tours'));
    }
}
