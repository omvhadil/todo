<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    public function index()
    {
       return view('app', [
       'todos' => Todo::orderBy('id', 'DESC')->get(),
       ]);
    }

    public function create(Request $request)
    {
        #Validasi
        $request->validate([
            'list' => 'required|string|min:3',
        ], 
        [
            'list.required' => 'list tidak boleh kosong',
        ]);

        #Insert
        // $todo = new Todo();
        // $todo->list = $request->list;
        // $todo->save();
        // $lists = [
        //     'list' => $request->list,
        // ];
        Todo::create($request->all());

        #redirect
       return back();
    }

    public function destroy($id)
    {
        Todo::find($id)->delete($id);
        return back();
    }
}