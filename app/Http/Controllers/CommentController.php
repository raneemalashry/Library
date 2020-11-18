<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request,$id){
        $this->validate($request,[
            'comment'=>'required'
        ]);
        $book=  Book::findorFail($id);
        $comment=new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = auth()->user()->id;
        $comment->book_id = $book->id;
        $comment->save();
        return redirect()->back()->with('msg','The Comment Is Added Succesfully');
    }
}
