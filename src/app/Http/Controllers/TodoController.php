<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use App\Models\Category;

class TodoController extends Controller
{
    // public function index()
    // {

    //     $todos = Todo::all();
    //     return view('index',compact('todos'));
    // }

    // public function store(Request $request){

    //     $todo = $request->only(['content']);
    //     Todo::create($todo);

    //     return redirect('/')->with('message','Todoを作成しました');
    // }

    public function index(){
        $todos =  Todo::all();
        $categories = Category::all();
        return view('index', compact('todos','categories'));
        }

    public function store(TodoRequest $request){
        $todo = $request->only(['category_id','content']);
        Todo::create($todo);
        return redirect('/')->with('message','Todoを作成しました');
    }

    public function update(TodoRequest $request){
        $todo = $request->only(['content']);
        Todo::find($request->id)->update($todo);
        return redirect('/')->with('message','Todoを更新しました');
    }

    public function destroy(Request $request){
        $todo = Todo::find($request->id)->delete();
        return redirect('/')->with('message','Todoを削除しました');
    }

    public function search(Request $request)
    {
        $todos = Todo::with('category')->categorySearch($request->category_id)->keywordSearch($request->keyword)->get();
        $categories = Category::all();

        return view('index', compact('todos', 'categories'));
    }
}