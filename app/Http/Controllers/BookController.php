<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Http\Requests;
use Auth;
use App\Book;
use Input;
use Redirect;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $books = Book::all();
        
        return View::make('books.index')
            ->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = $request->input('book');
        
       /* return Book::create([
            'text' => $book,
            'user_id' => Auth::guard('api')->id()
        ]);
        */
            $nerd = new Book;
            $nerd->text       = Input::get('text');
            $nerd->user_id      = 1;
            $nerd->save();
        
        return Redirect::back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  
           $book = Book::where('id', $id)
            ->first();
            
        
        return View::make('books.show')
            ->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $book = Book::where('id', $id)
            ->first();
            
        return View::make('books.edit')
            ->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $book = Book::find($id);
            $book->text       = Input::get('text');
            
            $book->save();
        
            return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->delete();
        
        return Redirect::back();
    }
}
