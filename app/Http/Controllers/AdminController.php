<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //


    
    public function index()
    {
        $books = Book::orderBy('created_at' , 'DESC')->get();
        return view('padmin.index')->with('books',$books);
    }

    public function create()
    {
            return view('admin.create');
       
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' =>  'required',
            'descriptiont' =>  'required',
            'cover' =>  'required|image',
        ]);

        $cover = $request->cover;
        $newCover = time().$cover->getClientOriginalName();
        $cover->move('uploads/books',$newCover);

        $book = Book::create([
            'title' =>  $request->title,
            'description' =>   $request->description,
            'cover' =>  'uploads/books/'.$newCover,
        ]);


        return redirect()->back() ;

    }

    public function update(Request $request,  $id)
    {
        $book = book::find( $id ) ;
        $this->validate($request,[
            'title' =>  'required',
            'description' =>  'required'
        ]);

    if ($request->has('cover')) {
        $cover = $request->cover;
        $newCover = time().$cover->getClientOriginalName();
        $cover->move('uploads/covers',$newCover);
        $book->$cover ='uploads/coverss/'.$newCover ;
    }

    $book->title = $request->title;
    $book->content = $request->content;
    $book->save();
    return redirect()->back() ;

    }

    public function destroy( $id)
    {
       
        $book = Book::where('id' , $id )->first();
       

        $book->delete($id);
        return redirect()->back() ;
    }

}
