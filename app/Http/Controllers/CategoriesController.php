<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function create()
    {
        return view('category.tambah');
    }

    public function store(Request $request)
    {
        //validasi data
        $request->validate([
            'name' => 'required|min:2|max:100',
        ],
        [
            'request' => 'Inputan :attribute harus diisi',
            'min' => 'Inputan :attribute minimal :min karakter',
            'max' => 'Inputan :attribute maximal :max karakter',
        ]);

        //add data ke table di db
        DB::table('catagories')->insert([
            'name' => $request->input('name'),
        ]);
        //redirect ke halaman
        return redirect('/category');
    }

    public function index()
    {
        $categories = Category::all();
        return view('category.tampil', ['categories' => $categories]);
    }

    public function show($id)
    {
        $category = Category::with('listBooks')->find($id);
        return view('category.detail', ['category' => $category]);
    }

    public function edit($id)
    {
        $category = DB::table('catagories')->find($id);
        return view('category.EDIT', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        //validasi data
        $request->validate([
            'name' => 'required|min:2|max:100',
        ],
        [
            'request' => 'Inputan :attribute harus diisi',
            'min' => 'Inputan :attribute minimal :min karakter',
            'max' => 'Inputan :attribute maximal :max karakter',
        ]);

        $affected = DB::table('catagories')
            ->where('id', $id)
            ->update([
                'name' => $request->input('name'),
            ]);
            //redirect ke halaman
            return redirect('/category');
    }

    public function destroy($id)
    {
        DB::table('catagories')->where('id','=', $id)->delete();
        //redirect ke halaman
        return redirect('/category');
    }

}
