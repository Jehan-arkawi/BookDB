<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $books = Book::orderBy('created_at' , 'DESC')->paginate(6);
        $genres = Genre::all();
        return view('books.index')->with('books',$books)->with('genres',$genres);
    }

    public function search (Request $request){

         $search=$request->search;
         $author=Author::all();
         $books = Book::where('title','like','%'.$search.'%')
                    ->orWhere('description','like','%'.$search.'%')
                
                    // ->orWhere(author->'name','like','%'.$search.'%')
                    ->get();
                       
                    
         return view('books.search')->with('books',$books);             
    }
    public function selectedGenere($id)
    {   

        $books=Book::with('genre')->paginate(6);

    
         return view('books.selectedGenre')->with('books',$books);
    }
}
