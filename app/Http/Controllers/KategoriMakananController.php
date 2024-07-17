<?php

namespace App\Http\Controllers;

use App\Models\kategoriMakanan;
use App\Http\Requests\StorekategoriMakananRequest;
use App\Http\Requests\UpdatekategoriMakananRequest;
use Illuminate\Http\Request;

class KategoriMakananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = kategoriMakanan::query();
        return view("kategoriMakanan.KategoriMakanan", [
            "title" => "Kategori Makanan",
            "categories" => $categories->paginate(15),
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("kategoriMakanan.tambah", [
            "title" => "Tambah Kategori Makanan",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorekategoriMakananRequest $request)
    {
        $validatedData = $request->validate([
            'kode' => ['required','unique:kategori_makanans'],
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        
        kategoriMakanan::create($validatedData);
        return redirect('/kategori-makanan')->with('success','Data Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategoriMakanan $kategoriMakanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategoriMakanan $kategoriMakanan)
    {
        return view("kategoriMakanan.edit", [
            "title" => "Tambah Kategori Makanan",
            "kategori" => $kategoriMakanan,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekategoriMakananRequest $request, kategoriMakanan $kategoriMakanan)
    {
        $check = KategoriMakanan::where('id', 'LIKE', '%' . $request->id . '%')->first();
        if($kategoriMakanan->kode==$check->kode){
            $validatedData = $request->validate([
                'kode' => 'required',
                'nama' => 'required',
                'keterangan' => 'required',
            ]);
        }else{
            $validatedData = $request->validate([
                'kode' => ['required','unique:kategori_makanans'],
                'nama' => 'required',
                'keterangan' => 'required',
            ]);
        }
        kategoriMakanan::where('id',$kategoriMakanan->id)
                    ->update($validatedData);
        return redirect('/kategori-makanan')->with('edit','Data diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        kategoriMakanan::destroy($request->delete);
        return redirect('/kategori-makanan')->with('danger','Data Dihapus');
    }
}
