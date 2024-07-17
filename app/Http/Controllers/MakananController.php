<?php

namespace App\Http\Controllers;

use App\Models\makanan;
use App\Http\Requests\StoremakananRequest;
use App\Http\Requests\UpdatemakananRequest;
use App\Models\kategoriMakanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foods = Makanan::with('kategoriMakanan');
        return view("makanan.makanan", [
            "title" => "Makanan",
            "foods" => $foods->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $foodCategories = kategoriMakanan::all();
        return view("makanan.tambah", [
            "title" => "Tambah Makanan",
            "foodCategories" => $foodCategories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoremakananRequest $request)
    {
        $validatedData = $request->validate([
            'kode' => ['required', 'unique:makanans'],
            'nama' => 'required',
            'harga' => 'required|numeric', 
            'keterangan' => 'required',
            'kategori_makanan_id' => 'required|exists:kategori_makanans,id', 
        ]);
        
        makanan::create($validatedData);
        return redirect('/makanan')->with('success','Data Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(makanan $makanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(makanan $makanan)
    {
        $foodCategories = kategoriMakanan::all();
        return view("makanan.edit", [
            "title" => "Tambah Kategori Makanan",
            "foodCategories" => $foodCategories,
            "makanan" => $makanan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemakananRequest $request, makanan $makanan)
    {
        $check = makanan::where('id', 'LIKE', '%' . $request->id . '%')->first();
        if($makanan->kode==$check->kode){
            $validatedData = $request->validate([
                'kode' => 'required',
                'nama' => 'required',
                'harga' => 'required|numeric', 
                'keterangan' => 'required',
                'kategori_makanan_id' => 'required|exists:kategori_makanans,id', 
            ]);
        }else{
            $validatedData = $request->validate([
                'kode' => ['required', 'unique:makanans'],
                'nama' => 'required',
                'harga' => 'required|numeric', 
                'keterangan' => 'required',
                'kategori_makanan_id' => 'required|exists:kategori_makanans,id', 
            ]);
        }
        makanan::where('id',$makanan->id)
                    ->update($validatedData);
        return redirect('/makanan')->with('edit','Data diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        makanan::destroy($request->delete);
        return redirect('/makanan')->with('danger','Data Dihapus');
    }
}
