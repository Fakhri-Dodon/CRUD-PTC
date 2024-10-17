<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = book::all();
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun' => 'required|numeric',
            'pilih' => 'required',
        ]);

        Book::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tahun' => $request->tahun,
            'pilih' => $request->pilih,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data buku');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::find($id);

        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'tahun' => 'required|numeric',
            'pilih' => 'required',
        ]);

        Book::where('id', $id)->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'tahun' => $request->tahun,
            'pilih' => $request->pilih,
        ]);

        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Book::where('id', $id)->delete();

        return redirect()->back();
    }
}
