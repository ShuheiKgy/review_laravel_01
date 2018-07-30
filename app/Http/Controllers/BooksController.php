<?php

namespace App\Http\Controllers;

use Auth;
use App\Book;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::where('user_id', Auth::user()->id)->orderBy('created_at', 'asc')->paginate(5);
        return view('books', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'item_name' => 'required|max:255',
            'item_number' => 'required|min:1|max:3',
            'item_amount' => 'required|min:1|max:6',
            'published' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')->withInput()->withErrors($validator);
        }

        $file = $request->file('item_img');
        if (!empty($file)) {
            $filename = $file->getClientOriginalName();
            $move = $file->move('./upload/', $filename);
        } else {
            $filename = "";
        }

        $books = new Book();
        $books->user_id = Auth::user()->id;
        $books->item_name = $request->item_name;
        $books->item_number = $request->item_number;
        $books->item_amount = $request->item_amount;
        $books->item_img = $filename;
        $books->published = $request->published;
        $books->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::where('user_id', Auth::user()->id)->find($id);
        return view('bookedit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'item_name' => 'required|min:3|max:255',
            'item_number' => 'required|min:1|max:3',
            'item_amount' => 'required|min:1|max:6',
            'published' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')->withInput()->withErrors($validator);
        }

        $book = Book::where('user_id', Auth::user()->id)->find($request->id);
        $book->item_name = $request->item_name;
        $book->item_number = $request->item_number;
        $book->item_amount = $request->item_amount;
        $book->published = $request->published;
        $book->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/');
    }
}
