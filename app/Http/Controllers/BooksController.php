<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Books;
use Illuminate\Support\Facades\File;

class BooksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();
        return view('books.tampil', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.tambah', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'category_id' => 'exists:catagories,id',
            'image' => 'required|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Mengubah nama file menjadi unik
        $newNameImage = time() . '.' . $request->image->extension();
        
        // Menyimpan file
        $request->image->move(public_path('uploads'), $newNameImage);

        $books = new Books;

        $books->title = $request->input('title');
        $books->summary = $request->input('summary');
        $books->image = $newNameImage;
        $books->stock = $request->input('stock');
        $books->category_id = $request->input('category_id');

        $books->save();

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Books::find($id);
        return view('books.detail', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $books = Books::find($id);
        $categories = Category::all();

        return view('books.edit', compact('books', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'category_id' => 'exists:catagories,id',
            'image' => 'mimes:jpeg,png,jpg|max:2048',
        ]);

        $books = Books::find($id);

        if($request->has('image')){
            //file dihapus
            File::delete('uploads/'.$books->image);

            //add File baru
            $newNameImage = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $newNameImage);
            $books->image = $newNameImage;
        }
        $books->title = $request->input('title');
        $books->summary = $request->input('summary');
        $books->stock = $request->input('stock');
        $books->category_id = $request->input('category_id');
        $books->save();

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $books = Books::find($id);
        if($books->image){
            //file dihapus
            File::delete('uploads/'.$books->image);
        }
        $books->delete();
        return redirect('/books');
    }
}
