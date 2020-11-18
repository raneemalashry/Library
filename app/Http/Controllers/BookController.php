<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(){
        $books=Book::latest()->paginate(6);
        return view('welcome')->with('books',$books);
    }
   public function create()
   {
      
       return view('books.create');

   }
   public function upload(Request $request){
       $this->validate($request,[
           'title'=>'required',
           'author'=>'required',
           'category'=>'required',
           'image'=>'required|image',
           'book'=>'required|mimes:pdf'
       ]);
       if($request->hasFile('image'))
       {
           $imgext=$request->file('image')->getClientOriginalExtension();
           $imagname=time().'thumbanil'.'.'. $imgext;
           $request->file('image')->storeAs('thumbnails',$imagname);
       }
       if($request->hasFile('book'))
       {
           $bookext=$request->file('book')->getClientOriginalExtension();
           $bookname=time().'.'.$bookext;
           $request->file('book')->storeAs('books',$bookname);
       }
       $book=new Book();
       $book->title = $request->title;
       $book->author = $request->author;
       $book->info = $request->info;
       $book->image =  $imagname;
       $book->book =  $bookname;
       $book->user_id = Auth()->user()->id;
       $book->category_id = $request->category;
       $book->save();
       return redirect()->route('book.create')->with('msg','Book Upload Successfully');

   }

   public function showBooksInCategory($categoryid)
   {
    $category= Category::find($categoryid);
   
    return view('viewcategory')->with('category',$category);

   }
   public function showBookInfo($bookid)
   {
       
    $book= Book::findorfail($bookid);
    
   
    return view('bookinfo')->with('book',$book);

   }
}
