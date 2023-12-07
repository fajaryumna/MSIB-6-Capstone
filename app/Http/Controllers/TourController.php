<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Tour;
 
class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = Tour::orderBy('created_at', 'DESC')->get();
        return view('admin.tour.index', compact('tours'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.tour.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate data
        $validatedData = $request->validate([
            'tour_name' => 'required|string',
            'destination' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'price' => 'required|numeric',
        ]);

        // Handle file upload
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('admin/assets/img/tours'), $imageName);

        $tour = new Tour();
        $tour->tour_name = $validatedData['tour_name'];
        $tour->destination = $validatedData['destination'];
        $tour->image = $imageName;
        $tour->start_date = $validatedData['start_date'];
        $tour->end_date = $validatedData['end_date'];
        $tour->price = $validatedData['price'];
        $tour->save();
        // dd($tour);

        return redirect()->route('data_tour')->with('success', 'Paket wisata berhasil ditambahkan');
    }
  
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $tour = Tour::find($id);
        // dd($tour);
        return view('admin.tour.show', compact('tour'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tour = Tour::find($id);
        return view('admin.tour.edit', compact('tour'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update( $id, Request $request)
    {
        // dd($request->all());
        // Validate data
        $validatedData = $request->validate([
            'tour_name' => 'required|string',
            'destination' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'price' => 'required|numeric',
        ]);

        $tour = Tour::find($id);
        $tour->update($validatedData);

        // Memproses gambar jika ada file baru diunggah
        if ($request->hasFile('image')) {
            // Menghapus gambar lama jika ada
            if ($tour->image) {
                $imagePath = public_path('admin/assets/img/tours/' . $tour->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            // Menyimpan gambar baru
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('admin/assets/img/tours'), $imageName);
            $tour->image = $imageName;
            $tour->save();
        }

        return redirect()->route('data_tour')->with('success', 'Paket wisata berhasil diubah');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tour = Tour::find($id);
        $tour->delete();
        return redirect()->route('data_tour')->with('success', 'Paket wisata berhasil dihapus');
    }

    public function showTotalRows()
    {
    $totalRows = Tour::count();
    return view('admin.dashboard', compact('totalRows'));
    }


}