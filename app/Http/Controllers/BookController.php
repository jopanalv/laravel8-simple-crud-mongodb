<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Book::all();
        return view('index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);
        $image = $request->file('image');
        $image->storeAs('public/items',$image->hashName());
        $post = Book::create([
            'image' => $image->hashName(),
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock
        ]);
        $post->save();
        if($post){
            //redirect dengan pesan sukses
            return redirect('item')->with('success', 'Data Berhasil Disimpan!');
        }else{
            //redirect dengan pesan error
            return redirect('item')->with('error', 'Data Gagal Disimpan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request,[
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'stock' => 'required'
        ]);
        $book = Book::findOrFail($book->_id);
        if($request->file('image')==""){
            $book->update([
                'name' => $request->name,
                'category' => $request->category,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
        }else{
            Storage::disk('local')->delete('public/items/'.$book->image);
            $image=$request->file('image');
            $image->storeAs('public/items/',$image->hashName());
            $book->update([
                'image' => $image->hashName(),
                'name' => $request->name,
                'category' => $request->category,
                'price' => $request->price,
                'stock' => $request->stock
            ]);
        }
        if($book){
            //redirect dengan pesan sukses
            return redirect('item')->with('success', 'Data Berhasil Diubah!');
        }else{
            //redirect dengan pesan error
            return redirect('item')->with('error', 'Data Gagal Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book=Book::findOrFail($book->_id);
        Storage::disk('local')->delete('public/items/'.$book->image);
        $book->delete();
        if($book){
            //redirect dengan pesan sukses
            return redirect('item')->with('success', 'Data Berhasil Dihapus!');
        }else{
            //redirect dengan pesan error
            return redirect('item')->with('error', 'Data Gagal Dihapus!');
        }
    }
}
